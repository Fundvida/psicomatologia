<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Sesion;
use App\Models\Horario;
use App\Models\Paciente;
use App\Models\Psicologo;
use Illuminate\Http\Request;
use App\Traits\AddsToastTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use App\Models\Pago;
use Illuminate\Support\Facades\Auth;
use App\Models\Notificacion;
use App\Models\Paciente_tutor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\Tutor;

class SesionController extends Controller
{
    use AddsToastTrait;

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index()
    {
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
    }

    public function destroy($id)
    {
    }

    protected function convertValidationExceptionToResponse(ValidationException $exception, $request)
    {
        return response()->json([
            'message' => 'The given data was invalid.',
            'errors' => $exception->errors(),
        ], $exception->status);
    }

    public function saveSesion(Request $request)
    {
        return DB::transaction(function () use ($request) {
            try {
                $validatedData = $request->validate([

                    'adicional_info' => 'required|string',
                    'apellidos' => 'required|string',
                    'email' => 'required|email',
                    'password' => 'required|string',
                    'name' => 'required|string',
                    'psicologo_id' => 'required',
                    'servicio' => 'required|string',
                    'telefono' => 'required',
                    'fecha_hora_inicio'=>'required|date',
                    'fecha_hora_fin'=>'required|date',
                    'turno'=>'required|string',
                    'dia'=>'required|string',
                    'pago_tipo'=>'string',
                    'adicional_info'=>'string',
                ]);
            } catch (ValidationException $exception) {
                return $this->convertValidationExceptionToResponse($exception, $request);
            }

            $user = User::create([
                'name' => $request->input('name'),
                'apellidos' => $request->input('apellidos'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'telefono' => $request->input('telefono'),
                'activated' => 1,
            ]);
            try {
                $user->assignRole('paciente');
            } catch (QueryException $e) {
                throw new Exception("Error assigning rol psicologo: " . $e->getMessage());
            }
            try {

                $paciente = new Paciente();
                if ($user->id != null) {
                    $paciente->user_id = $user->id;
                    $paciente->psicologo_id = $request->input('psicologo_id');
                    $paciente->isAlta = '0';
                    $paciente->estado = 'ACTIVO';
                    $paciente->tipo_paciente = 'mayor';
                    $paciente->ocupacion = 'no especificado';
                    $paciente->save();
                }
            } catch (QueryException $e) {
                throw new Exception("Error creating Paciente record: " . $e->getMessage());
            }

            try {
                $sesion = new Sesion();
                if ($paciente->id != null) {
                    $sesion->estado = 'activo';
                    $sesion->pago_confirmado = 0;
                    $sesion->paciente_id = $paciente->id;
                    $sesion->psicologo_id= $request->input('psicologo_id');
                    $sesion->descripcion_sesion=$request->input('adicional_info');
                    $sesion->solicitante= $paciente->id;
                    $fecha_hora_inicio = Carbon::parse($request->input('fecha_hora_inicio'));
                    $fecha_hora_fin = Carbon::parse($request->input('fecha_hora_fin'));

                    // Sumar 7 horas a ambas fechas
                    $fecha_hora_inicio->addHours(7);
                    $fecha_hora_fin->addHours(7);

                    $sesion->fecha_hora_inicio = $fecha_hora_inicio;
                    $sesion->fecha_hora_fin = $fecha_hora_fin;
                    // $sesion->fecha_hora_inicio = $request->input('fecha_hora_inicio');
                    // $sesion->fecha_hora_fin =$request->input('fecha_hora_fin');

                    $sesion->save();
                }
            } catch (QueryException $e) {
                throw new Exception("Error assigning sesión: " . $e->getMessage());
            }
            $pago = new Pago();
            if ($sesion->id != null) {
                $pago->servicio = $request->input('servicio');
                $pago->sesion_id = $sesion->id;
                $pago->institucion='';
                $pago->convenio='';
                $pago->isTerminado = 0;
                $pago->pago_tipo=$request->input('pago_tipo');
                $pago->save();
            }

            $psicologo_selected = Psicologo::where('id', $sesion->psicologo_id)->first();
            Notificacion::create([
                'descripcion' => 'Usted tiene una nueva sesión programada.',
                'user_id' => $psicologo_selected->user_id,
                'sesion_id' => $sesion->id,
            ]);

            // return $user;
            return response()->json([
                'message' => 'Sesión registrada exitosamente',
                'sesion' => $sesion,
                'status' => 'success',
            ],200);
        }, 5);        
    }
    public function SesionCancelledCount($id)
    {
        $sesions_counts = Sesion::join('pacientes', 'pacientes.id', '=', 'sesions.paciente_id')
            ->where('pacientes.user_id', '=', $id)
            ->where('sesions.estado', '=', 'cancelada')
            ->count();
        return $sesions_counts;
    }

    public function checkPendingSesions($id)
    {
        $sesions_counts = Sesion::join('pacientes', 'pacientes.id', '=', 'sesions.paciente_id')
            ->where('pacientes.user_id', '=', $id)
            ->where(function ($query) {
                $query->where('sesions.estado', '=', 'solicitada')
                    ->orWhere('sesions.estado', '=', 'pagada')
                    ->orWhere('sesions.estado', '=', 'pendiente')
                    ->orWhere('sesions.estado', '=', 'futura')
                    ->orWhere('sesions.estado', '=', 'compensada');
            })
            ->count();
        return $sesions_counts;
    }
    public function getEstadoSesions($id)
    {
        $sesions_estados = Sesion::join('pacientes', 'pacientes.id', '=', 'sesions.paciente_id')
            ->select('sesions.estado')
            ->where('pacientes.user_id', '=', $id)
            ->get();
        $sesions_estados;
    }
    public function renderBasedOnEstado($estado)
    {
        switch ($estado) {
            case 'solicitada':
                break;
            case 'pendiente':
                break;
            case 'pagada':
                break;
            case 'compensada':
                break;
            case 'cancelada':
                break;
            case 'concluida':
                break;
            case 'futura':
                break;
        }
    }
    public function checkIfUserHasDoctor($id)
    {

        $paciente = Paciente::select('pacientes.psicologo_id')
            ->where('pacientes.user_id', '=', $id)
            ->where('pacientes.isAlta', '=', 0)
            ->first();
        return $paciente ? $paciente : -1;
    }
    public function checkIfDoctorExists($psicologo_id)
    {
        $psicologo_count = Psicologo::where('id', '=', $psicologo_id)
            ->where('estado', '<>', 'inactivo')
            ->where('estado', '<>', 'ausente')
            ->count();

        return $psicologo_count > 0 ? true : false;
    }
    public function getDoctor($psicologo_id)
    {
        $psicologo = Psicologo::join('users', 'users.id', '=', 'psicologos.user_id')
            ->select('users.name', 'users.apellidos', 'users.email', 'psicologos.id', 'psicologos.universidad', 'psiscologos.foto', 'psicologos.pais_residencia', 'psicologos.descripcion_cv')
            ->where('id', '=', $psicologo_id)
            ->where('estado', '=', 'activo')
            ->first();
        return $psicologo;
    }

    public function listPsicologos()
    {
        $psicologos = Psicologo::join('users', 'users.id', '=', 'psicologos.user_id')
            ->select('psicologos.id', 'users.name', 'users.apellidos', 'users.email', 'psicologos.universidad', 'psicologos.foto', 'psicologos.pais_residencia', 'psicologos.descripcion_cv')
            ->where('psicologos.estado', '=', 'activo')
            ->where('users.activated', '=', 1)
            ->get();
        return $psicologos;
    }

    public function getHorarios($psicologo_id)
    {
        if ($psicologo_id) {
            $currentDate = date('Y-m-d'); // Get the current date in 'YYYY-MM-DD' format
            $horarios_psicologo = Horario::select('id', 'fecha_hora_inicio', 'fecha_hora_fin')
                ->where('isDisponible', '=', 1)
                ->where('psicologo_id', '=', $psicologo_id)
                //$query->whereBetween('age', [$ageFrom, $ageTo]);
                ->whereDate('fecha_hora_inicio', '>=', $currentDate) // Filter by the current date
                ->get();
            return $horarios_psicologo;
        }

        return [];
    }


    public function getSchedule($psicologo_id)
    {
        if ($psicologo_id) {
            $horarios_psicologo = $this->getHorarios($psicologo_id);
            if (count($horarios_psicologo) > 0) {
                $message = "El psicologo seleccionado tiene horarios disponibles";
                $toast = [
                    'title'      => 'Horarios Disponibles',
                    'message'    => $message,
                    'type'       => 'success',
                    'alwaysShow' => false
                ];
                return response()->json([
                    'horarios' => $horarios_psicologo,
                    'toast' => $toast,
                ]);
            } else {
                $message = "El psicologo seleccionado no tiene horarios disponibles";
                $toast = [
                    'title'      => 'Sin horarios',
                    'message'    => $message,
                    'type'       => 'warning',
                    'alwaysShow' => false
                ];
                return response()->json([
                    'horarios' => $horarios_psicologo,
                    'toast' => $toast,
                ]);

            }

        }
    }

    public function listadoAllSesiones (){
        return view('homeAdminSesiones');
    }

    public function psicologoSesiones (){
        $user = Auth::user();
        $psicologo_id = Psicologo::where('user_id', $user->id)->value('id');

        // estado= ACTIVO, isAlta = 0
        // $pacientes = Paciente::select('users.ci','users.name', 'users.apellidos','users.id as user_id', 'pacientes.id as paciente_id')
        //                     ->join('users', 'pacientes.user_id', '=', 'users.id')
        //                     ->where('pacientes.psicologo_id', $psicologo_id)
        //                     ->where('pacientes.estado', '=', 'ACTIVO')
        //                     ->where('pacientes.isAlta', '=', '0')
        //                     ->get();
        
        // $pacientes_menor = Paciente::select('u.ci','u.name', 'u.apellidos','u.id as user_id', 'pacientes.id as paciente_id')
        //                     ->join('pacienteMenor u', 'pacientes.usermenor_id', '=', 'u.id')
        //                     ->where('pacientes.psicologo_id', $psicologo_id)
        //                     ->where('pacientes.estado', '=', 'ACTIVO')
        //                     ->where('pacientes.isAlta', '=', '0')
        //                     ->get();

        DB::listen(function ($query) {
            Log::info($query->sql, $query->bindings);
        });

        // return view('psicologoSesiones', compact('pacientes_menor'));
        // Primera consulta
        $pacientes_mayor = DB::table('pacientes')
                            ->select('users.ci', 'users.name', 'users.apellidos', 'users.id as user_id', 'pacientes.id as paciente_id')
                            ->join('users', 'pacientes.user_id', '=', 'users.id')
                            ->where('pacientes.psicologo_id', $psicologo_id)
                            ->where('pacientes.estado', '=', 'ACTIVO')
                            ->where('pacientes.isAlta', '=', '0');

        Log::info('SQL de pacientes:', [$pacientes_mayor->toSql()]);

        // Segunda consulta
        $pacientes_menor = DB::table('pacientes')
                            ->select('pacienteMenor.ci', 'pacienteMenor.name', 'pacienteMenor.apellidos', 'pacienteMenor.id as user_id', 'pacientes.id as paciente_id')
                            ->join('pacienteMenor', 'pacientes.usermenor_id', '=', 'pacienteMenor.id')
                            ->where('pacientes.psicologo_id', $psicologo_id)
                            ->where('pacientes.estado', '=', 'ACTIVO')
                            ->where('pacientes.isAlta', '=', '0');

        Log::info('SQL de pacientes_menor:', [$pacientes_menor->toSql()]);

        // Combinar ambas consultas usando union
        $pacientes = $pacientes_mayor->union($pacientes_menor)->get();


        // Retornar la vista con los datos combinados
        return view('psicologoSesiones', compact('pacientes'));
    }

    public function psicologoSesionesProgramadas (Request $request){
        $user = Auth::user();
        $psicologo = Psicologo::where('user_id', $user->id)->first();

        // $query = Sesion::select('sesions.estado', 'sesions.descripcion_sesion', 'sesions.calificacion_descripcion', 
        // 'sesions.calificacion', 'sesions.fecha_hora_inicio', 'sesions.fecha_hora_fin', 'sesions.id as sesion_id',
        // 'sesions.modalidad','users.ci', 'users.name', 'users.apellidos', 
        // 'pagos.isTerminado', 'pacientes.id as id_paciente')
        // ->join('pacientes', 'sesions.paciente_id', '=', 'pacientes.id')
        // ->join('users', 'pacientes.user_id', '=', 'users.id')
        // ->join('pagos', 'sesions.id', '=', 'pagos.sesion_id')
        // ->where('sesions.psicologo_id', $psicologo->id);

        // Aplicar filtros si están presentes en la solicitud
        // if ($request->filled('nombre')) {
        //     $query->where('users.name', 'LIKE', '%' . $request->nombre . '%');
        // }

        // if ($request->filled('ci')) {
        //     $query->where('users.ci', 'LIKE', '%' . $request->ci . '%');
        // }

        // $sessions = $query->orderBy('sesion_id', 'desc')->get();
        $sesiones_mayores = DB::table('sesions')
        ->select(
            'sesions.estado', 
            'sesions.descripcion_sesion', 
            'sesions.calificacion_descripcion', 
            'sesions.calificacion', 
            'sesions.fecha_hora_inicio', 
            'sesions.fecha_hora_fin', 
            'sesions.id as sesion_id', 
            'sesions.modalidad', 
            'users.ci', 
            'users.name', 
            'users.apellidos', 
            'pagos.isTerminado', 
            'pacientes.id as id_paciente'
        )
        ->join('pacientes', 'sesions.paciente_id', '=', 'pacientes.id')
        ->join('users', 'pacientes.user_id', '=', 'users.id')
        ->join('pagos', 'sesions.id', '=', 'pagos.sesion_id')
        ->where('sesions.psicologo_id', $psicologo->id);

        if ($request->filled('nombre')) {
            $sesiones_mayores->where('users.name', 'LIKE', '%' . $request->nombre . '%');
        }
    
        if ($request->filled('ci')) {
            $sesiones_mayores->where('users.ci', 'LIKE', '%' . $request->ci . '%');
        }

        // Consulta para sesiones de pacientes menores de edad
        $sesiones_menores = DB::table('sesions')
            ->select(
                'sesions.estado', 
                'sesions.descripcion_sesion', 
                'sesions.calificacion_descripcion', 
                'sesions.calificacion', 
                'sesions.fecha_hora_inicio', 
                'sesions.fecha_hora_fin', 
                'sesions.id as sesion_id', 
                'sesions.modalidad', 
                'pacienteMenor.ci', 
                'pacienteMenor.name', 
                'pacienteMenor.apellidos', 
                'pagos.isTerminado', 
                'pacientes.id as id_paciente'
            )
            ->join('pacientes', 'sesions.paciente_id', '=', 'pacientes.id')
            ->join('pacienteMenor', 'pacientes.usermenor_id', '=', 'pacienteMenor.id')
            ->join('pagos', 'sesions.id', '=', 'pagos.sesion_id')
            ->where('sesions.psicologo_id', $psicologo->id);

        if ($request->filled('nombre')) {
            $sesiones_menores->where('pacienteMenor.name', 'LIKE', '%' . $request->nombre . '%');
        }
    
        if ($request->filled('ci')) {
            $sesiones_menores->where('pacienteMenor.ci', 'LIKE', '%' . $request->ci . '%');
        }

        // Combinar ambas consultas usando union
        $sessions = $sesiones_mayores->union($sesiones_menores)->orderBy('sesion_id', 'desc')->get();

        return response()->json($sessions);
    }

    public function nuevaSesion (Request $request) {
        // id_horario_dia" value="1" 1: mañana, 2: tarde 
        if($request->id_horario_dia == 1){
            $horaInicio = $request->horaInicio;
            $horaFin = $request->horaFin;
            $fechaAgenda = $request->fechaAgendaManiana;
        } else {
            $horaInicio = $request->horaInicioT;
            $horaFin = $request->horaFinT;
            $fechaAgenda = $request->fechaAgendaTarde;
        }

        $diaSinTilde = getDateLiteral($fechaAgenda);

        $psicologo = Psicologo::where('user_id', $request->user_id)->first();

        $horario = Horario::where('dia', $diaSinTilde)
            ->where('psicologo_id', $psicologo->id)
            ->first();

        if($request->id_horario_dia == 1 && $horario->isDisponibleManiana == 0) { // MAÑANA
            return response()->json(['error' => "Error en tu horario marcaste que no estas disponible el dia " . $diaSinTilde . " por la mañana"], 400);
        } elseif ($request->id_horario_dia == 2 && $horario->isDisponibleTarde == 0){ // TARDE
            return response()->json(['error' => "Error en tu horario marcaste que no estas disponible el dia " . $diaSinTilde . " por la tarde"], 400);
        }

        if($request->id_horario_dia == 1){
            $validator = Validator::make($request->all(), [
                'horaInicio' => 'required|date_format:H:i',
                'horaFin' => 'required|date_format:H:i'
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'horaInicioT' => 'required|date_format:H:i',
                'horaFinT' => 'required|date_format:H:i'
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Validar que horaInicio y horaFin estén dentro del rango permitido
        $horaInicioTimestamp = strtotime($horaInicio);
        $horaFinTimestamp = strtotime($horaFin);
        if($request->id_horario_dia == 1){
            $horaInicioManianaValidate = strtotime($horario->hora_inicio_maniana);
            $horaFinTardeValidate = strtotime($horario->hora_fin_maniana);
        } else {
            $horaInicioManianaValidate = strtotime($horario->hora_inicio_tarde);
            $horaFinTardeValidate = strtotime($horario->hora_fin_tarde);
        }

        if ($horaInicioTimestamp < $horaInicioManianaValidate || $horaFinTimestamp > $horaFinTardeValidate) {
            if($request->id_horario_dia == 1){ // MAÑANA
                return response()->json(['error' => "Error los horario inicio " . $horaInicio . ' y fin ' . $horaFin . ' no estan entre el rango establecido que es inicio ' 
                . $horario->hora_inicio_maniana . ' y fin ' . $horario->hora_fin_maniana], 400);
            } else { // TARDE
                return response()->json(['error' => "Error los horario inicio " . $horaInicio . ' y fin ' . $horaFin . ' no estan entre el rango establecido que es inicio ' 
                . $horario->hora_inicio_tarde . ' y fin ' . $horario->hora_fin_tarde], 400);
            }
        }

        if($request->id_horario_dia == 1){
            $paciente_id = $request->paciente_id_m;
        }else {
            $paciente_id = $request->paciente_id_t; 
        }

        // verificar si un paciente tiene una sesion pendiente, si tiene una pendiente el psicologo no puede programar
        // una con ese paciente
        $past_sesion = Sesion::where('paciente_id', $paciente_id)->latest()->first();
        $paciente_user = Paciente::where('id', $paciente_id)
                        ->select('user_id')
                        ->first();
        $paciente_user_id = (int) $paciente_user->user_id;

        if($past_sesion){
            if($past_sesion->estado!='activo' && $past_sesion->estado!='Activa' && ($past_sesion->estado=='Cancelado' || $past_sesion->estado=='Terminada')){
                // registra sesion
                //return response()->json($request);
                $servicio = Pago::where('sesion_id', $past_sesion->id)
                            ->select('servicio')
                            ->first();

                $sesion = new Sesion();

                $sesion->estado = 'activo';
                $sesion->pago_confirmado = 0;
                $sesion->paciente_id = $paciente_id;
                $sesion->psicologo_id= $psicologo->id;
                $sesion->descripcion_sesion= $request->desc_sesion;
                $sesion->solicitante = $psicologo->id;
                $sesion->fecha_hora_inicio = $fechaAgenda . ' ' . $horaInicio . ':00';
                $sesion->fecha_hora_fin = $fechaAgenda . ' ' . $horaFin . ':00';

                $sesion->save();

                $notificacion = new Notificacion();
                $notificacion->descripcion = 'Usted tiene una nueva sesión programada.';
                $notificacion->user_id = $paciente_user_id;
                $notificacion->sesion_id = $sesion->id;
                $notificacion->save();

                $pago = new Pago();
                $pago->servicio = $servicio;
                $pago->sesion_id = $sesion->id;
                $pago->institucion='';
                $pago->convenio='';
                $pago->isTerminado = 0;

                $pago->save();
                
            } else {
                return response()->json(['error' => "El paciente tiene una sesion pendiente, no puedes programar una nueva sesion hasta que dicha sesión culmine."], 400);
            }
        }else {
            $sesion = new Sesion();

            $sesion->estado = 'activo';
            $sesion->pago_confirmado = 0;
            $sesion->paciente_id = $paciente_id;
            $sesion->psicologo_id= $psicologo->id;
            $sesion->descripcion_sesion= $request->desc_sesion;
            $sesion->solicitante = $psicologo->id;
            $sesion->fecha_hora_inicio = $fechaAgenda . ' ' . $horaInicio . ':00';
            $sesion->fecha_hora_fin = $fechaAgenda . ' ' . $horaFin . ':00';
            $sesion->save();

            $notificacion = new Notificacion();
            $notificacion->descripcion = 'Usted tiene una nueva sesión programada.';
            $notificacion->user_id = $paciente_user_id;
            $notificacion->sesion_id = $sesion->id;
            $notificacion->save();

            $pago = new Pago();
            $pago->servicio = "Primera consulta"; // TODO Arreglar
            $pago->sesion_id = $sesion->id;
            $pago->institucion='';
            $pago->convenio='';
            $pago->isTerminado = 0;

            $pago->save();
        }
    }

    public function editarSesion(Request $request){
        $horaInicio = $request->input('editarHoraInicio');
        $horaFin = $request->input('editarHoraFin');
        $fechaAgenda = $request->input('editarFechaSesion');
        $diagnostico = $request->input('editarDiagnostico');
        $descripcion = $request->input('editarDescripcionSesion');
        $sesion_id = $request->input('sesion_id_');
        $isTarde = null;

        $horaInicioArray = explode(':', $horaInicio);
        $horaFinArray = explode(':', $horaFin);

        $horaInicioNumero = intval($horaInicioArray[0]);
        $horaFinNumero = intval($horaFinArray[0]);

        // Comparar si ambas horas son mayores a 12:00
        if ($horaInicioNumero > 12 && $horaFinNumero > 12) {
            // Si ambas horas son mayores a 12:00, retorna "horario tarde"
            $isTarde = true;
            //return "horario tarde";
        } else {
            // Si al menos una de las horas es menor o igual a 12:00, retorna "horario mañana"
            $isTarde = false;
            //return "horario mañana";
        }

        $diaSinTilde = getDateLiteral($fechaAgenda);
        $psicologo = Psicologo::where('user_id', $request->user_id)->first();

        $horario = Horario::where('dia', $diaSinTilde)
            ->where('psicologo_id', $psicologo->id)
            ->first();

        if($isTarde && $horario->isDisponibleTarde == 0){
            return response()->json(['error' => "Error en tu horario marcaste que no estas disponible el dia " . $diaSinTilde . " por la Tarde"], 400);
        }elseif($horario->isDisponibleManiana == 0){
            return response()->json(['error' => "Error en tu horario marcaste que no estas disponible el dia " . $diaSinTilde . " por la Mañana"], 400);
        }

        $validator = Validator::make($request->all(), [
            'editarHoraInicio' => 'required|date_format:H:i',
            'editarHoraFin' => 'required|date_format:H:i'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Validar que horaInicio y horaFin estén dentro del rango permitido
        $horaInicioTimestamp = strtotime($horaInicio);
        $horaFinTimestamp = strtotime($horaFin);
        if($isTarde){
            $horaInicioManianaValidate = strtotime($horario->hora_inicio_tarde);
            $horaFinTardeValidate = strtotime($horario->hora_fin_tarde);
        } else {
            $horaInicioManianaValidate = strtotime($horario->hora_inicio_maniana);
            $horaFinTardeValidate = strtotime($horario->hora_fin_maniana);
        }

        if ($horaInicioTimestamp < $horaInicioManianaValidate || $horaFinTimestamp > $horaFinTardeValidate) {
            if($isTarde){ // TARDE
                return response()->json(['error' => "Error los horario inicio " . $horaInicio . ' y fin ' . $horaFin . ' no estan entre el rango establecido que es inicio ' 
                . $horario->hora_inicio_tarde . ' y fin ' . $horario->hora_fin_tarde], 400);
            } else { // MAÑANA
                return response()->json(['error' => "Error los horario inicio " . $horaInicio . ' y fin ' . $horaFin . ' no estan entre el rango establecido que es inicio ' 
                . $horario->hora_inicio_maniana . ' y fin ' . $horario->hora_fin_maniana], 400);
            }
        }

        $sesion = Sesion::where('id', $sesion_id)->first();
        $dateSesionFormated = date('Y-m-d', strtotime($sesion->fecha_hora_inicio));
        $horaSesion = date('H:i', strtotime($sesion->fecha_hora_inicio));
        $paciente = Paciente::select("user_id")
                            ->where("id", $sesion->paciente_id)
                            ->first();
        //return response()->json($paciente_user_id);

        if($horaInicio != $horaSesion){
            $notificacion = new Notificacion();
            $notificacion->descripcion = 'Tu psicologo reprogramó hora de atención de tu sesión programada.';
            $notificacion->user_id = $paciente->user_id;
            $notificacion->sesion_id = $sesion->id;
            $notificacion->save();
            //return response()->json('Tu psicologo reprogramo el horario de atención de tu sesion programada');
        } 
        if($dateSesionFormated != $fechaAgenda){
            $notificacion = new Notificacion();
            $notificacion->descripcion = 'Tu psicologo reprogramo el día de atención de tu sesion programada.';
            $notificacion->user_id = $paciente->user_id;
            $notificacion->sesion_id = $sesion->id;
            $notificacion->save();
            //return response()->json('Tu psicologo reprogramo el día de atención de tu sesion programada');
        }
        
        $sesion->calificacion_descripcion = $diagnostico; // TODO revisar
        $sesion->descripcion_sesion = $descripcion;
        $sesion->fecha_hora_inicio = $fechaAgenda . ' ' . $horaInicio . ':00';
        $sesion->fecha_hora_fin = $fechaAgenda . ' ' . $horaFin . ':00';

        $sesion->save();

    }

    public function getSesionPacienteNombre (Request $request){
        $term = $request->get('term');
        $user = Auth::user();
        $psicologo = Psicologo::where('user_id', $user->id)->first();

        $querys = Sesion::select('users.name')
            ->join('pacientes', 'sesions.paciente_id', '=', 'pacientes.id')
            ->join('users', 'pacientes.user_id', '=', 'users.id')
            ->join('pagos', 'sesions.id', '=', 'pagos.sesion_id')
            ->where('users.name', 'like', '%'.$term.'%')
            ->where('sesions.psicologo_id', $psicologo->id)
            ->orderBy('sesion_id', 'desc')
            ->get();

        $data = [];
        foreach($querys as $query){
            $data[] = [
                'label'=> $query->name
            ];
        }

        return $data;
    }

    public function getSesionPacienteCi (Request $request){
        $term = $request->get('term');
        $user = Auth::user();
        $psicologo = Psicologo::where('user_id', $user->id)->first();

        $querys = Sesion::select('users.ci')
            ->join('pacientes', 'sesions.paciente_id', '=', 'pacientes.id')
            ->join('users', 'pacientes.user_id', '=', 'users.id')
            ->join('pagos', 'sesions.id', '=', 'pagos.sesion_id')
            ->where('users.ci', 'like', '%'.$term.'%')
            ->where('sesions.psicologo_id', $psicologo->id)
            ->orderBy('sesion_id', 'desc')
            ->get();

        $data = [];
        foreach($querys as $query){
            $data[] = [
                'label'=> $query->ci
            ];
        }

        return $data;
    }

    public function nuevaSesionPaciente(Request $request){
        $fechaAgenda = $request->fechaAgenda;
        $horaInicio = $request->horaInicio;
        $horaFin = $request->horaFin;

        $paciente = Paciente::where('user_id', $request->user_id)->first();
        $sesion_anterior = Sesion::where('paciente_id', $paciente->id)
                            ->where('estado', 'activo')->first();

        
        if(!$sesion_anterior){
            //return response()->json(["message"=> "sesion programada"]);
            if ($paciente->id != null) {
                $psicologo_user_id = Psicologo::select('user_id')->where('id', $paciente->psicologo_id)->first();
                
                $sesion = new Sesion();
                $sesion->estado = 'activo';
                $sesion->pago_confirmado = 0;
                $sesion->paciente_id = $paciente->id;
                $sesion->psicologo_id= $paciente->psicologo_id;
                $sesion->descripcion_sesion=$request->desc_sesion;
                $sesion->solicitante= $paciente->id;
                $sesion->modalidad = $request->modalidad;

                $fechaHoraInicio = $fechaAgenda . ' ' . $horaInicio . ':00';
                $fechaHoraFin = $fechaAgenda . ' ' . $horaFin . ':00';
                
                $sesion->fecha_hora_inicio = $fechaHoraInicio;
                $sesion->fecha_hora_fin = $fechaHoraFin;

                $sesion->save();

                $pago = new Pago();
                $pago->servicio = "";
                $pago->sesion_id = $sesion->id;
                $pago->institucion='';
                $pago->convenio='';
                $pago->isTerminado = 0;
                $pago->pago_tipo='';
                $pago->save();

                Notificacion::create([
                    'descripcion' => 'Usted tiene una nueva sesión programada.',
                    'user_id' => $psicologo_user_id->user_id,
                    'sesion_id' => $sesion->id,
                ]);

                return response()->json(["message"=> "sesion programada"]);
            }
        }

        return response()->json(["message"=> "sesion pendiente"]);
    }

    public function nuevaSesionPsicologo (Request $request){
        $fechaAgenda = $request->fechaAgenda;
        $horaInicio = $request->horaInicio;
        $horaFin = $request->horaFin;

        $psicologo = Psicologo::where('user_id', $request->user_id)->first();
        $sesion_anterior = Sesion::where('paciente_id', $request->paciente_id)
                            ->where('estado', 'activo')->first();
        if(!$sesion_anterior){
            $paciente = Paciente::where('id', $request->paciente_id)->first();
                
            $sesion = new Sesion();
            $sesion->estado = 'activo';
            $sesion->pago_confirmado = 0;
            $sesion->paciente_id = $request->paciente_id;
            $sesion->psicologo_id= $psicologo->id;
            $sesion->descripcion_sesion=$request->desc_sesion;
            $sesion->solicitante= $psicologo->id;
            $sesion->modalidad = $request->modalidad;

            $fechaHoraInicio = $fechaAgenda . ' ' . $horaInicio . ':00';
            $fechaHoraFin = $fechaAgenda . ' ' . $horaFin . ':00';
            
            $sesion->fecha_hora_inicio = $fechaHoraInicio;
            $sesion->fecha_hora_fin = $fechaHoraFin;

            $sesion->save();

            $pago = new Pago();
            $pago->servicio = "";
            $pago->sesion_id = $sesion->id;
            $pago->institucion='';
            $pago->convenio='';
            $pago->isTerminado = 0;
            $pago->pago_tipo='';
            $pago->save();

            if($paciente->tipo_paciente == "menor"){
                $paciente_tutor = Paciente_tutor::where('paciente_id', $paciente->id)->first();
                $tutor = Tutor::where('id', $paciente_tutor->tutor_id)->first();

                Notificacion::create([
                    'descripcion' => 'Su psicologo acaba de programar una nueva sesión con su paciente.',
                    'user_id' => $tutor->user_id,
                    'sesion_id' => $sesion->id,
                ]);
            }else {
                Notificacion::create([
                    'descripcion' => 'Su psicologo acaba de programar una nueva sesión.',
                    'user_id' => $paciente->user_id,
                    'sesion_id' => $sesion->id,
                ]);
            }

            return "exito";
        }
        
        return "err";
    }

    public function terminarSesion ($sesion_id){
        $sesion = Sesion::where('id', $sesion_id)->first();
        if($sesion){
            $sesion->estado = 'Terminada';
            $sesion->save();
        }

        return response()->json($sesion);
    }

    public function estadoSesion ($sesion_id){
        $sesion = Sesion::select('estado')->where('id', $sesion_id)->first();
        return $sesion;
    }
}
