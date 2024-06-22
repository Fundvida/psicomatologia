<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Paciente;
use Illuminate\Support\Facades\Auth;
use App\Models\Sesion;
use App\Models\Psicologo;
use Illuminate\Support\Facades\Log;
use App\Models\Notificacion;
use App\Models\Tutor;
use App\Models\Paciente_tutor;
use Illuminate\Database\QueryException;

class PacienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index_registrar()
    {
        return view('');
    }

    public function homePacienteSesiones (){
        return view('homePacienteSesiones');
    }

    public function store(Request $request)
    {
        // "tipoUsuario": "menor",

        //TODO revisar tutor en las tabla no cuenta con ocupacion
        // "ocupacion": "trabajador", 

        $userL = Auth::user();
        $psicologo = Psicologo::where('user_id', $userL->id)->first();
        $psicologo_id = $psicologo ? $psicologo->id : null;
        //return response()->json($request);
        try{
            if($request->tipoUsuario == "menor"){
                // PACIENTE MENOR DE EDAD
                if($request->paciente_id == ""){
                    $user_tutor = new User();
                    $user_tutor->name                 = $request->nombres_tutor;
                    $user_tutor->apellidos            = $request->apellidos_tutor;
                    $user_tutor->email                = $request->correoElectronico;
                    $user_tutor->password             = $request->contrasena;
                    $user_tutor->contador_bloqueos    = 0;
                    $user_tutor->fecha_nacimiento     = $request->fechaNacimientoTutor;
                    $user_tutor->ci                   = $request->ci_tutor;
                    //$user_tutor->codigo_pais_telefono = $request->codigo_pais;
                    $user_tutor->telefono             = $request->telefono;
                    $user_tutor->pregunta_seguridad_a = $request->preguntaSeguridad;
                    $user_tutor->respuesta_seguridad_a = $request->respuestaSeguridad;
                    
                    $user_tutor->assignRole('Tutor');
        
                    $user_tutor->save();

                    $user_paciente = new User();
                    $user_paciente->name = $request->nombres;
                    $user_paciente->apellidos = $request->apellidos;
                    $user_paciente->fecha_nacimiento = $request->fechaNacimiento;
                    $user_paciente->ci = $request->numeroCI;
                    $user_paciente->email = "No provided";
                    $user_paciente->password = "No provided";
                    $user_paciente->save();
                    //$user_paciente->assignRole('Paciente');

                    $tutor = new Tutor();
                    $tutor->user_id = $user_tutor->id;
                    $tutor->save();

                    $paciente = new Paciente();
                    $paciente->user_id = $user_paciente->id;
                    $paciente->tipo_paciente = $request->tipoUsuario;
                    //$paciente->ocupacion = $request->ocupacion;
                    $paciente->isAlta = false;
                    $paciente->estado = "ACTIVO";
                    //$paciente->psicologo_id = $psicologo_id;
                    $paciente->save();

                    $paciente_tutor = new Paciente_tutor();
                    $paciente_tutor->tutor_id = $tutor->id;
                    $paciente_tutor->paciente_id = $paciente->id;
                    $paciente_tutor->save();
                    //return "paciente menor de edad creado";
                }else{

                }

            }else {
                // PACIENTE MAYOR DE EDAD
                if ($request->paciente_id == "") {
                    $user = new User();
                    $user->name                 = $request->nombres;
                    $user->apellidos            = $request->apellidos;
                    $user->email                = $request->correoElectronico;
                    $user->password             = $request->contrasena;
                    $user->contador_bloqueos    = 0;
                    $user->fecha_nacimiento     = $request->fechaNacimiento;
                    $user->ci                   = $request->numeroCI;
                    $user->codigo_pais_telefono = $request->codigo_pais;
                    $user->telefono             = $request->telefono;
                    $user->pregunta_seguridad_a = $request->preguntaSeguridad;
                    $user->respuesta_seguridad_a = $request->respuestaSeguridad;
                    
                    $user->assignRole('Paciente');
        
                    $user->save();
        
                    $paciente = new Paciente();
                    $paciente->user_id = $user->id;
                    $paciente->tipo_paciente = $request->tipoUsuario;
                    $paciente->ocupacion = $request->ocupacion;
                    $paciente->isAlta = false;
                    $paciente->estado = "ACTIVO";
                    //$paciente->psicologo_id = $psicologo_id;
        
                    $paciente->save();
                    return redirect()->route('listaPaciente')->with('resultado', "registrado");
                } else {
                    $paciente = Paciente::findOrFail($request->paciente_id);
                    //$paciente->tipo_paciente = $request->tipoUsuario;
                    $paciente->ocupacion = $request->ocupacion;
                    $paciente->isAlta = false;
                    //$paciente->psicologo_id = $psicologo_id;
                    $paciente->save();
        
                    $user = User::findOrFail($paciente->user_id);
                    $user->name                 = $request->nombres;
                    $user->apellidos            = $request->apellidos;
                    $user->email                = $request->correoElectronico;
                    //$user->password             = $request->contrasena;
                    $user->contador_bloqueos    = 0;
                    $user->fecha_nacimiento     = $request->fechaNacimiento;
                    $user->ci                   = $request->numeroCI;
                    $user->codigo_pais_telefono = $request->codigo_pais;
                    $user->telefono             = $request->telefono;
                    $user->pregunta_seguridad_a = $request->preguntaSeguridad;
                    $user->respuesta_seguridad_a = $request->respuestaSeguridad;
                    $user->save();
        
                    return redirect()->route('listaPaciente')->with('resultado', "actualizado");
                }
            }
            }catch(QueryException $e){
            if ($e->getCode() == 23000) {
                return redirect()->route('listaPaciente')->with('resultado', 'error');
            }
        }
    }

    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        $user = User::findOrFail($paciente->user_id);
        $tutor = null;

        if($paciente->tipo_paciente == 'menor'){
            //join('pacientes', 'users.id', '=', 'pacientes.user_id')
            $tutor = Paciente_tutor::where('paciente_id', $paciente->id)
            ->join('tutors as t', 'paciente_tutor.tutor_id','=','t.id')
            ->join('users as u', 't.user_id', '=', 'u.id')
            ->select('t.id as tutor_id', 'u.name as nombre_tutor', 'u.apellidos as apellido_tutor',
            'u.telefono', 'u.respuesta_seguridad_a as resp_tutor', 'u.pregunta_seguridad_a as preg_tutor',
            'u.ci', 'u.fecha_nacimiento', 'u.ocupacion', 'u.email')
            ->first();
        }

        return [
            'paciente' => $paciente,
            'user' => $user,
            'tutor' => $tutor
        ];
    }

    public function delete(Request $request)
    {
        Log::info('Solicitud recibida para eliminar paciente', $request->all());
        $paciente = Paciente::findOrFail($request->paciente_id);

        Sesion::where('paciente_id', $paciente->id)->delete();

        $paciente->estado = "INACTIVO";
        $paciente->motivo = $request->justificacion;
        
        $paciente->save();
    }

    public function listarSesiones()
    {
        $user = Auth::user();
        $paciente = Paciente::where('user_id', $user->id)->first();
        $sesiones = $paciente->sesiones()->orderBy('created_at', 'desc')->get();
        $pagos = [];

        foreach ($sesiones as $sesion) {
            $pagos[] = $sesion->pagos;
        }

        $datos = [
            'user' => $user,
            'paciente' => $paciente,
            'sesiones' => $sesiones,
            'pagos' => $pagos
        ];

        return response()->json($datos);
    }

    public function cancelarSesion (Request $request){
        $user = Auth::user();
        $paciente = Paciente::select('id')
                    ->where('user_id', $user->id)->first();
        if($paciente){ // Si el usuario es un paciente
            $sesion = Sesion::where('id', $request->sesion_id)
                ->where('paciente_id', $paciente->id)->first();
            $psicologo = Psicologo::where('id', $sesion->psicologo_id)->first();
            Notificacion::create([ // Notificacion para el usuario actual
                'descripcion' => 'Un paciente a cancelado una sesión.',
                'user_id' => $psicologo->user_id,
                'sesion_id' => $request->sesion_id,
            ]);
        }else { // Si es un psicologo
            $sesion = Sesion::where('id', $request->sesion_id)->first();
            $paciente = Paciente::where('id', $sesion->paciente_id)->first();
            Notificacion::create([ // Notificacion para el usuario actual
                'descripcion' => 'Tu psicologo canceló la sesión.',
                'user_id' => $paciente->user_id,
                'sesion_id' => $request->sesion_id,
            ]);
        }

        $sesion->estado = 'Cancelado';
        $sesion->justificacion = $request->justificacion;
        $sesion->save();
        
        Notificacion::create([ // Notificacion para el usuario actual
            'descripcion' => 'Usted ha cancelado una sesión.',
            'user_id' => $user->id,
            'sesion_id' => $request->sesion_id,
        ]);

        return response()->json($request);
    }

    public function listaPaciente()
    {
        $pacientes = Paciente::all();
        return view('listaPaciente', compact('pacientes'));
    }

    public function listaPacienteXpsicologo_()
    {
        //$pacientes = Paciente::all();
        return view('listaPacienteXPsicologo');
    }

    public function listaPacienteXRol (Request $request){
        $user = Auth::user();
        $psicologo = Psicologo::where('user_id', $user->id)->first();

        $roles = $user->getRoleNames(); // Obtiene los roles del usuario autenticado
        $nombreRol = $roles->isNotEmpty() ? $roles->first() : 'Sin rol';

        $query = User::join('pacientes', 'users.id', '=', 'pacientes.user_id')
                 ->where('pacientes.estado', 'ACTIVO');

        if ($psicologo) {
            $query->where('pacientes.psicologo_id', $psicologo->id);
        }

        // Aplicar filtros si están presentes en la solicitud
        if ($request->filled('nombre')) {
            $query->where('users.name', 'LIKE', '%' . $request->nombre . '%');
        }

        if ($request->filled('ci')) {
            $query->where('users.ci', 'LIKE', '%' . $request->ci . '%');
        }

        // if ($request->tipo !== 'todos') {
        //     if ($request->tipo == 'mayor') {
        //         $query->where('pacientes.tipo_paciente', 'mayor');
        //     } elseif ($request->tipo == 'menor') {
        //         $query->where('pacientes.tipo_paciente', 'menor');
        //     }
        // }

        $datos = $query->select('users.*', 'pacientes.*')->get();

        // if($psicologo){
        //     $datos = User::join('pacientes', 'users.id', '=', 'pacientes.user_id')
        //           ->where('pacientes.psicologo_id', $psicologo->id) 
        //           ->where('pacientes.estado', 'ACTIVO')
        //           ->select('users.*', 'pacientes.*') 
        //           ->get();
        // } else {
        //     $datos = User::join('pacientes', 'users.id', '=', 'pacientes.user_id')
        //           ->where('pacientes.estado', 'ACTIVO')
        //           ->select('users.*', 'pacientes.*') 
        //           ->get();
        // }

        // return response()->json($datos);
        $respuesta = [
            'datos' => $datos,
            'rol' => $nombreRol
        ];
        return response()->json($respuesta);
    }

    public function getPacienteNombre (Request $request){
        $term = $request->get('term');

        $querys = User::where('name', 'like', '%' . $term . '%')
                ->whereHas('paciente')
                ->get();

        $data = [];
        foreach($querys as $query){
            $data[] = [
                'label'=> $query->name
            ];
        }

        return $data;
    }

    public function getPacienteCi (Request $request){
        $term = $request->get('term');

        $querys = User::where('ci', 'like', '%' . $term . '%')
                ->whereHas('paciente')
                ->get();

        $data = [];
        foreach($querys as $query){
            $data[] = [
                'label'=> $query->ci
            ];
        }

        return $data;
    }

    public function bloquear($paciente_id){
        $paciente = Paciente::where('id', $paciente_id)->first();
        $paciente->psicologo_id = null;

        $paciente_user = User::where('id', $paciente->user_id)->first();

        $paciente_user->contador_bloqueos += 1;

        if ($paciente_user->contador_bloqueos > 2) {
            $paciente->estado = "INACTIVO";

            $administradores = User::role('Administrador')->get();
            // Crear la notificación para cada administrador
            foreach ($administradores as $admin) {
                Notificacion::create([
                    'descripcion' => 'Se hizo un bloqueo permanente al paciente ' . $paciente_user->name . ' ' . $paciente_user->apellidos . ', con CI: ' . $paciente_user->ci,
                    'user_id' => $admin->id
                ]);
            }
        }

        $paciente->save();
        $paciente_user->save();

        return response()->json($paciente_user);
    }

    public function darAlta($paciente_id){
        $paciente = Paciente::where('id', $paciente_id)->first();
        $paciente->isAlta = 1; // 1 = isAlta = SI, 0 = isAlta = NO 
        $paciente->psicologo_id = null;
        $paciente->save();

        $paciente_user = User::where('id', $paciente->user_id)->first();

        $administradores = User::role('Administrador')->get();
        // Crear la notificación para cada administrador
        foreach ($administradores as $admin) {
            Notificacion::create([
                'descripcion' => 'El paciente ' . $paciente_user->name . ' ' . $paciente_user->apellidos . ', con CI: ' . $paciente_user->ci . " ha sido dado de alta.",
                'user_id' => $admin->id
            ]);
        }

        Notificacion::create([
            'descripcion' => "Fuiste dado de alta!",
            'user_id' => $paciente->user_id
        ]);

        return response()->json("paciente alta con id " . $paciente_id);
    }

    public function programarSesion (){
        return view('programarSesionPaciente');
    }

    public function getPsicologoId(){
        $user = Auth::user();
        $psicologo_id = Paciente::select('psicologo_id')
                        ->where('user_id', $user->id)->first();
        return response()->json($psicologo_id);
    }
}
