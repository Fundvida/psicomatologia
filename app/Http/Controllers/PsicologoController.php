<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Psicologo;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Horario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class PsicologoController extends Controller
{
    public function index_registrar()
    {
        return view('');
    }

    // public function store(Request $request){
    //     $data = $request->all();

    //     return response()->json($data);
    // }

    public function store(Request $request)
    {

        if ($request->psicologo_id == "") {
            $user = new User();
            $user->name                 = $request->nombres;
            $user->apellidos            = $request->apellidos;
            $user->email                = $request->correoElectronico;
            $user->password             = $request->contrasena;
            //$user->role                 = "psicologo";
            $user->contador_bloqueos    = 0;
            $user->fecha_nacimiento     = $request->fechaNacimiento;
            $user->ci                   = $request->ci;
            $user->codigo_pais_telefono = $request->codigo_pais;
            $user->telefono             = $request->telefono;
            $user->pregunta_seguridad_a = $request->preguntaSeguridad1;
            $user->pregunta_seguridad_b = $request->preguntaSeguridad2;
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

            $diasSemana = ["lunes", "martes", "miercoles", "jueves", "viernes"];
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
            $user->pregunta_seguridad_a = $request->preguntaSeguridad1;
            $user->pregunta_seguridad_b = $request->preguntaSeguridad2;
            $user->save();

            //return redirect()->route('mntPsicologo.index')->with('resultado', "actualizado");
            return redirect()->route('listaPsicologo')->with('resultado', "actualizado");
        }
    }

    public function edit($id)
    {
        $psicologo = Psicologo::findOrFail($id);
        $user = User::findOrFail($psicologo->user_id);

        return [
            'psicologo' => $psicologo,
            'user' => $user,
        ];
    }

    public function delete($id)
    {
        $psicologo = Psicologo::findOrFail($id);
        $psicologo->estado = "INACTIVO";
        $psicologo->save();

        return redirect()->route('listaPsicologo')->with('resultado', "eliminado");
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
}
