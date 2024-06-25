<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Psicologo;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Horario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Sesion;
use App\Models\Especialidad;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Paciente;
use Illuminate\Database\QueryException;



class PsicologoController extends Controller
{

    public function index_registrar()
    {
        return view('');
    }


    public function homePsicologoHorario (){
        return view('homePsicologoHorario');
    }

    public function programarSesion (){
        $user = Auth::user();
        $psicologo_id = Psicologo::where('user_id', $user->id)->value('id');

        // estado= ACTIVO, isAlta = 0
        // $pacientes = Paciente::select('users.ci','users.name', 'users.apellidos','users.id as user_id', 'pacientes.id as paciente_id')
        //                     ->join('users', 'pacientes.user_id', '=', 'users.id')
        //                     ->where('pacientes.psicologo_id', $psicologo_id)
        //                     ->where('pacientes.estado', '=', 'ACTIVO')
        //                     ->where('pacientes.isAlta', '=', '0')
        //                     ->get();
        $pacientes_mayor = DB::table('pacientes')
        ->select('users.ci', 'users.name', 'users.apellidos', 'users.id as user_id', 'pacientes.id as paciente_id')
        ->join('users', 'pacientes.user_id', '=', 'users.id')
        ->where('pacientes.psicologo_id', $psicologo_id)
        ->where('pacientes.estado', '=', 'ACTIVO')
        ->where('pacientes.isAlta', '=', '0');

        $pacientes_menor = DB::table('pacientes')
                            ->select('pacienteMenor.ci', 'pacienteMenor.name', 'pacienteMenor.apellidos', 'pacienteMenor.id as user_id', 'pacientes.id as paciente_id')
                            ->join('pacienteMenor', 'pacientes.usermenor_id', '=', 'pacienteMenor.id')
                            ->where('pacientes.psicologo_id', $psicologo_id)
                            ->where('pacientes.estado', '=', 'ACTIVO')
                            ->where('pacientes.isAlta', '=', '0');

        $pacientes = $pacientes_mayor->union($pacientes_menor)->get();

        return view('programarSesionPsicologo', compact('pacientes'));
    }

    public function getPsicologoId (){
        $user = Auth::user();
        $psicologo = Psicologo::select('id')->where('user_id',$user->id)->first();
        return $psicologo;
    }

    public function store(Request $request)
    {
        //return response()->json($request);
        try{
            if ($request->psicologo_id == "") {
                    $user = new User();
                    $user->name                 = $request->nombres;
                    $user->apellidos            = $request->apellidos;
                    $user->email                = $request->correoElectronico;
                    $user->password             = $request->contrasena;
                    //$user->role                 = "psicologo";
                    $user->contador_bloqueos     = 0;
                    $user->fecha_nacimiento      = $request->fechaNacimiento;
                    $user->ci                    = $request->ci;
                    $user->codigo_pais_telefono  = $request->codigo_pais;
                    $user->telefono              = $request->telefono;
                    $user->pregunta_seguridad_a  = $request->preguntaSeguridad;
                    $user->respuesta_seguridad_a = $request->respuestaSeguridad;
                    $user->assignRole('psicologo');

                    $user->save();
                    // TODO FALTAN "archivos":["Screenshot_1.png"], "metodoConfirmacion":"sms" 
                    $psicologo = new Psicologo();
                    $psicologo->user_id                 = $user->id; // Recuperamos el ultimo id creado
                    $psicologo->estado                  = "ACTIVO";
                    $psicologo->fecha_funcion_titulo    = $request->fechaFuncion;
                    $psicologo->universidad             = $request->universidad;
                    $psicologo->ciudad_residencia       = $request->ciudadResidencia;
                    $psicologo->pais_residencia         = $request->paisResidencia;
                    $psicologo->descripcion_cv          = $request->descripcionCV;

                    $psicologo->save();

                    foreach ($request->especialidad as $especialidadNombre) {
                        $especialidad = new Especialidad();
                        $especialidad->psico_id = $psicologo->id;
                        $especialidad->especialidad = $especialidadNombre;
                        
                        $especialidad->save();
                    }

                    $diasSemana = ["lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo"];
                    foreach ($diasSemana as $dia) {
                        $horario = new Horario();
                        $horario->psicologo_id = $psicologo->id;
                        $horario->isDisponibleManiana = false;
                        $horario->isDisponibleTarde = false;
                        $horario->dia = $dia;
                        $horario->save();
                    }

                    //return redirect()->route('mntPsicologo.index')->with('resultado', "registrado");
                    return redirect()->route('listaPsicologo')->with('resultado', "registrado");
                
            } else {
                $psicologo = Psicologo::findOrFail($request->psicologo_id);

                $psicologo->fecha_funcion_titulo    = $request->fechaFuncion;
                $psicologo->universidad             = $request->universidad;
                $psicologo->ciudad_residencia       = $request->ciudadResidencia;
                $psicologo->pais_residencia         = $request->paisResidencia;
                $psicologo->descripcion_cv          = $request->descripcionCV;

                $psicologo->save();

                $user = User::findOrFail($psicologo->user_id);

                $user->name                 = $request->nombres;
                $user->apellidos            = $request->apellidos;
                $user->email                = $request->correoElectronico;
                //$user->password             = $request->contrasena;
                $user->contador_bloqueos    = 0;
                $user->fecha_nacimiento     = $request->fechaNacimiento;
                $user->ci                   = $request->ci;
                $user->codigo_pais_telefono = $request->codigo_pais;
                $user->telefono             = $request->telefono;
                $user->pregunta_seguridad_a = $request->preguntaSeguridad;
                $user->respuesta_seguridad_a = $request->respuestaSeguridad;
                $user->save();

                // Eliminar las especialidades existentes
                Especialidad::where('psico_id', $psicologo->id)->delete();

                // Iterar sobre las especialidades recibidas y crear un nuevo registro para cada una
                foreach ($request->especialidad as $especialidadNombre) {
                    $especialidad = new Especialidad();
                    $especialidad->psico_id = $psicologo->id;
                    $especialidad->especialidad = $especialidadNombre;
                    $especialidad->save();
                    return redirect()->route('listaPsicologo')->with('resultado', "actualizado");
            }
            }
        }catch(QueryException $e){
            if ($e->getCode() == 23000) {
                return redirect()->route('listaPsicologo')->with('resultado', 'error');
            }
        }

        //return response()->json($request);
    }

    public function edit($id)
    {
        $psicologo = Psicologo::findOrFail($id);
        $user = User::findOrFail($psicologo->user_id);
        $especialidades = Especialidad::select('especialidad')
                        ->where('psico_id', $psicologo->id)->get();

        return [
            'psicologo' => $psicologo,
            'user' => $user,
            'especialidad' => $especialidades
        ];
    }

    public function delete(Request $request)
    {
        Log::info('Solicitud recibida para eliminar psicólogo', $request->all());
        $psicologo = Psicologo::findOrFail($request->psicologo_id);

        Sesion::where('psicologo_id', $psicologo->id)->delete();

        Paciente::where('psicologo_id', $psicologo->id)->update(['psicologo_id' => null]);

        $psicologo->estado = "INACTIVO";
        $psicologo->motivo = $request->justificacion;

        $psicologo->save();
    }

    protected function convertValidationExceptionToResponse(ValidationException $exception, $request)
    {
        return response()->json([
            'message' => 'The given data was invalid.',
            'errors' => $exception->errors(),
        ], $exception->status);
    }
    public function getPsicologos(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'especialidad' => 'required|string',
            ]);
        } catch (ValidationException $exception) {
            return $this->convertValidationExceptionToResponse($exception, $request);
        }

        $especialidad = $request->input('especialidad');
        $psicologo = Psicologo::join('especialidades', 'especialidades.psico_id', '=', 'psicologos.id')
            ->join('users', 'users.id', '=', 'psicologos.user_id')
            ->where('especialidades.especialidad', '=', $especialidad)
            ->select('psicologos.*', 'users.name', 'users.apellidos', 'users.profile_photo_path', 'especialidades.especialidad')
            ->get();

        if (!$psicologo) {
            return response()->json([
                'message' => 'There is no psicologos',
                'status' => 'error',
            ], 409);
        }
        return response()->json([
            'message' => 'Psicologos Found',
            'especialidad' => $especialidad,
            'psicologos' => $psicologo,
            'status' => 'success',
        ]);
    }

    public function addHorario(Request $request)
    {
        //return response()->json($request);
        if ($request->editDia == "si") {
            $psicologo = Psicologo::where('user_id', $request->user_id)->firstOrFail();
            $horario = Horario::where('psicologo_id', $psicologo->id)
                                ->where('dia', $request->diaEdit)
                                ->firstOrFail();

            if ($request->id_horario_dia == 1) {
                $horario->hora_inicio_maniana = $request->horaInicio;
                $horario->hora_fin_maniana = $request->horaFin;
                $horario->isDisponibleManiana = 1;
            } else {
                $horario->hora_inicio_tarde = $request->horaInicioT;
                $horario->hora_fin_tarde = $request->horaFinT;
                $horario->isDisponibleTarde = 1;
            }
            $horario->save();

        } else if ($request->editDia == "no") {
            // Obtener los datos de la solicitud
            $horario_dia = $request->id_horario_dia;
            $diasSeleccionados = $request->input('dias');
            $horaInicio = date('H:i:s', strtotime($request->horaInicio));
            $horaFin = date('H:i:s', strtotime($request->horaFin));
            $horaInicioT = date('H:i:s', strtotime($request->horaInicioT));
            $horaFinT = date('H:i:s', strtotime($request->horaFinT));
            $psicologo = Psicologo::where('user_id', $request->user_id)->firstOrFail(); // SOLO PARA OBTENER EL ID psicologo

            // Obtener todos los horarios del psicologo
            $horarios = Horario::where('psicologo_id', $psicologo->id)->get();

            // Iterar sobre los horarios
            foreach ($horarios as $horario) {
                // Verificar si el día está seleccionado en el formulario
                if (in_array($horario->dia, $diasSeleccionados)) {
                    // Si está seleccionado, actualizar los campos correspondientes
                    $horario->hora_inicio_maniana = $horaInicio;
                    $horario->hora_fin_maniana = $horaFin;
                    $horario->hora_inicio_tarde = $horaInicioT;
                    $horario->hora_fin_tarde = $horaFinT;
                    if ($horario_dia == 1) {
                        $horario->isDisponibleManiana = true;
                    } else {
                        $horario->isDisponibleTarde = true;
                    }
                } else {
                    // Si no está seleccionado, marcar como no disponible
                    if ($horario_dia == 1) {
                        $horario->isDisponibleManiana = false;
                    } else {
                        $horario->isDisponibleTarde = false;
                    }
                }
                if (!$horario->save()) {
                    // Si no se puede guardar un horario, marcar como error
                    $error = true;
                }
            }
        }

        return redirect()->route('homePsicologoHorario')->with('resultado', 'actualizado');
    }

    public function getHorario()
    {
        $user = Auth::user();
        $psicologo = Psicologo::where('user_id', $user->id)->first();
        $horarios = Horario::where('psicologo_id', $psicologo->id)
            ->where(function ($query) {
                $query->where('isDisponibleManiana', 1)
                    ->orWhere('isDisponibleTarde', 1);
            })
            ->select('id', 'dia', 'hora_inicio_maniana', 'hora_fin_maniana', 'hora_inicio_tarde', 'hora_fin_tarde', 'isDisponibleManiana', 'isDisponibleTarde')
            ->get();

        $fechaActual = Carbon::now();
        Carbon::setLocale('es');

        $diaSemana = $fechaActual->dayOfWeek;

        $diasRestantes = 7 - $diaSemana;

        $diasSemana = [];

        $diasSemana[] = [
            'year' => $fechaActual->year,
            'month' => $fechaActual->translatedFormat('F'),
            'day' => $fechaActual->dayName,
            'dayInteger' => $fechaActual->day,
        ];

        for ($i = 1; $i < $diasRestantes; $i++) {
            $nuevaFecha = $fechaActual->copy()->addDays($i);
            $diasSemana[] = [
                'year' => $nuevaFecha->year,
                'month' => $nuevaFecha->translatedFormat('F'),
                'day' => $nuevaFecha->dayName,
                'dayInteger' => $nuevaFecha->day,
            ];
        }

        $data = [
            'diasRestantes' => $diasSemana,
            'horarios' => $horarios
        ];

        return response()->json($data);
    }

    public function inhabilitarHorario (Request $request){
        $psicologo = Psicologo::where('user_id', $request->user_id)->first();
        $horario = Horario::where('psicologo_id', $psicologo->id)
                            ->where('dia', $request->dia)->first();

        if($request->horario_dia == 1){
            $horario->isDisponibleManiana = false;
        }else {
            $horario->isDisponibleTarde = false;
        }
        $horario->save();
        
        return response()->json($request);
    }

    public function getNotificaciones(){
        $user = Auth::user();
        $psicologo = Psicologo::where('user_id', $user->id)->first();
        
        if (!$psicologo) {
            return response()->json(['error' => 'No se encontró el psicólogo'], 404);
        }

        $notificaciones = Sesion::where('psicologo_id', $psicologo->id)
                                ->where('pago_confirmado', 1)
                                ->get();

        return response()->json($notificaciones);
    }

    public function listaPsicologo()
    {
        $psicologos = Psicologo::all();

        return view('listaPsicologo', compact('psicologos'));
    }

    public function getPsicologosL(Request $request) {
        $query = User::join('psicologos', 'users.id', '=', 'psicologos.user_id')
                        ->where('psicologos.estado', 'ACTIVO');
    
        // Aplicar filtros si están presentes en la solicitud
        if ($request->filled('nombre')) {
            $query->where('users.name', 'LIKE', '%' . $request->nombre . '%');
        }
    
        if ($request->filled('ci')) {
            $query->where('users.ci', 'LIKE', '%' . $request->ci . '%');
        }
    
        // Filtrar por tipo de psicólogo/a
        if ($request->filled('tipo')) {
            if ($request->tipo !== 'todos') {
                $query->where('psicologos.tipo', $request->tipo);
            }
        }
    
        $psicologos = $query->select('users.*', 'psicologos.*')->get();
    
        return response()->json($psicologos);
    }

    public function getAllSesiones(){

        // $resultados = DB::table('sesions')
        //     ->join('pacientes as pas', 'sesions.paciente_id', '=' , 'pas.id')
        //     ->join('psicologos as psi', 'sesions.psicologo_id', '=' , 'psi.id')
        //     ->join('users as pu', 'pas.user_id', '=', 'pu.id')
        //     ->join('users as ps', 'psi.user_id', '=', 'ps.id')
        //     ->select('pu.name as nombre_paciente', 'pu.apellidos as apellido_paciente',
        //     'ps.name as nombre_psicologo', 'ps.apellidos as apellido_psicologo',
        //     'sesions.estado', 'sesions.pago_confirmado', 'sesions.modalidad', 'sesions.id as sesion_id',
        //     'pu.id as paciente_user_id')
        //     ->get();
            
        // return response()->json($resultados);
        $sesiones_mayores = DB::table('sesions')
        ->join('pacientes as pas', 'sesions.paciente_id', '=', 'pas.id')
        ->join('psicologos as psi', 'sesions.psicologo_id', '=', 'psi.id')
        ->join('users as pu', 'pas.user_id', '=', 'pu.id')
        ->join('users as ps', 'psi.user_id', '=', 'ps.id')
        ->select(
            'pu.name as nombre_paciente', 
            'pu.apellidos as apellido_paciente',
            'ps.name as nombre_psicologo', 
            'ps.apellidos as apellido_psicologo',
            'sesions.estado', 
            'sesions.pago_confirmado', 
            'sesions.modalidad', 
            'sesions.id as sesion_id',
            'pu.id as paciente_user_id'
        );

        // Consulta para sesiones de pacientes menores de edad
        $sesiones_menores = DB::table('sesions')
            ->join('pacientes as pas', 'sesions.paciente_id', '=', 'pas.id')
            ->join('psicologos as psi', 'sesions.psicologo_id', '=', 'psi.id')
            ->join('pacienteMenor as pm', 'pas.usermenor_id', '=', 'pm.id')
            ->join('users as ps', 'psi.user_id', '=', 'ps.id')
            ->select(
                'pm.name as nombre_paciente', 
                'pm.apellidos as apellido_paciente',
                'ps.name as nombre_psicologo', 
                'ps.apellidos as apellido_psicologo',
                'sesions.estado', 
                'sesions.pago_confirmado', 
                'sesions.modalidad', 
                'sesions.id as sesion_id',
                'pm.id as paciente_user_id'
            );

        $resultados = $sesiones_mayores->union($sesiones_menores)->get();

        return response()->json($resultados);
    }

    public function getPsicologoNombre (Request $request){
        $term = $request->get('term');

        $querys = User::where('name', 'like', '%' . $term . '%')
                ->whereHas('psicologo')
                ->get();

        $data = [];
        foreach($querys as $query){
            $data[] = [
                'label'=> $query->name
            ];
        }

        return $data;
    }

    public function getPsicologoCi (Request $request){
        $term = $request->get('term');

        $querys = User::where('ci', 'like', '%' . $term . '%')
                ->whereHas('psicologo')
                ->get();

        $data = [];
        foreach($querys as $query){
            $data[] = [
                'label'=> $query->ci
            ];
        }

        return $data;
    }

    public function getPsicologosEspecialidades(){
        $resultados = DB::table('psicologos')
            ->join('users as u', 'psicologos.user_id', '=', 'u.id')
            ->join('especialidades as es', 'psicologos.id', '=', 'es.psico_id')
            ->select('u.name as nombre', 'u.apellidos as apellido', 'psicologos.id', 'es.especialidad')
            ->get();

        $psicologos = [];

        foreach ($resultados as $resultado) {
            $psicologoId = $resultado->id;
            if (!isset($psicologos[$psicologoId])) {
                $psicologos[$psicologoId] = [
                    'nombre' => $resultado->nombre,
                    'apellido' => $resultado->apellido,
                    'id' => $psicologoId,
                    'especialidades' => []
                ];
            }
            $psicologos[$psicologoId]['especialidades'][] = $resultado->especialidad;
        }

        return response()->json(array_values($psicologos));
    }

    public function designarPsicologo($paciente_id, $psicologo_id){
        $paciente = Paciente::where('id', $paciente_id)->first();
        if($paciente){
            $paciente->psicologo_id = $psicologo_id;
            $paciente->save();
        }
    }
}
