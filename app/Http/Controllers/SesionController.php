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
use Illuminate\Support\Facades\Validator;

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
                    $sesion->fecha_hora_inicio = "2024-05-22 15:44:18";
                    $sesion->fecha_hora_fin = "2024-05-22 15:44:18";

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
        $pacientes = Paciente::select('users.ci','users.name', 'users.apellidos','users.id as user_id', 'pacientes.id as paciente_id')
                            ->join('users', 'pacientes.user_id', '=', 'users.id')
                            ->where('pacientes.psicologo_id', $psicologo_id)
                            ->where('pacientes.estado', '=', 'ACTIVO')
                            ->where('pacientes.isAlta', '=', '0')
                            ->get();

        return view('psicologoSesiones', compact('pacientes'));
    }

    public function psicologoSesionesProgramadas (){
        $user = Auth::user();
        $psicologo = Psicologo::where('user_id', $user->id)->first();

        $sessions = Sesion::select('sesions.estado', 'sesions.descripcion_sesion', 'sesions.calificacion_descripcion', 
        'sesions.calificacion', 'sesions.fecha_hora_inicio', 'sesions.fecha_hora_fin', 'sesions.id as sesion_id',
            'users.ci', 'users.name', 'users.apellidos', 
            'pagos.isTerminado', 'pacientes.id as id_paciente')
            ->join('pacientes', 'sesions.paciente_id', '=', 'pacientes.id')
            ->join('users', 'pacientes.user_id', '=', 'users.id')
            ->join('pagos', 'sesions.id', '=', 'pagos.sesion_id')
            ->where('sesions.psicologo_id', $psicologo->id)
            ->orderBy('sesion_id', 'desc')
            ->get();

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
            //return "Error en tu horario marcaste que no estas disponible el dia " . $diaSinTilde . " por la mañana";
            return response()->json(['error' => "Error en tu horario marcaste que no estas disponible el dia " . $diaSinTilde . " por la mañana"], 400);
        } elseif ($request->id_horario_dia == 2 && $horario->isDisponibleTarde == 0){ // TARDE
            //return "Error en tu horario marcaste que no estas disponible el dia " . $diaSinTilde . " por la tarde";
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

        // Validar que la horaInicio y horaFin estén dentro del rango permitido
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
                // return "Error los horario inicio " . $horaInicio . ' y fin ' . $horaFin . ' no estan entre el rango establecido que es inicio ' 
                // . $horario->hora_inicio_maniana . ' y fin ' . $horario->hora_fin_maniana;
                return response()->json(['error' => "Error los horario inicio " . $horaInicio . ' y fin ' . $horaFin . ' no estan entre el rango establecido que es inicio ' 
                . $horario->hora_inicio_maniana . ' y fin ' . $horario->hora_fin_maniana], 400);
            } else { // TARDE
                // return "Error los horario inicio " . $horaInicio . ' y fin ' . $horaFin . ' no estan entre el rango establecido que es inicio ' 
                // . $horario->hora_inicio_tarde . ' y fin ' . $horario->hora_fin_tarde;
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
            if($past_sesion->estado!='activo' && $past_sesion->estado!='Activa' && ($past_sesion->estado=='Cancelado' ||$past_sesion->estado=='Terminada')){
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
                //return "el paciente tiene una sesion pendiente, no puedes programar una nueva sesion hasta que la sesion culmine";
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

        //return response()->json($request);
    }
}
