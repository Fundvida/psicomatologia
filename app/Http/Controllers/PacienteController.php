<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Pago;
use Illuminate\Support\Facades\Auth;
use App\Models\Sesion;

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
        if ($request->paciente_id == "") {
            $user = new User();
            $user->name                 = $request->nombres;
            $user->apellidos            = $request->apellidos;
            $user->email                = $request->correoElectronico;
            $user->password             = $request->contrasena;
            //$user->role                 = "psicologo";
            $user->contador_bloqueos    = 0;
            $user->fecha_nacimiento     = $request->fechaNacimiento;
            $user->ci                   = $request->numeroCI;
            $user->codigo_pais_telefono = $request->codigo_pais;
            $user->telefono             = $request->telefono;
            $user->pregunta_seguridad_a = $request->preguntaSeguridad1;
            $user->pregunta_seguridad_b = $request->preguntaSeguridad2;
            $user->assignRole('Paciente');

            $user->save();

            $paciente = new Paciente();
            $paciente->user_id = $user->id;
            $paciente->tipo_paciente = $request->tipoUsuario;
            $paciente->ocupacion = $request->ocupacion;
            $paciente->isAlta = false;
            $paciente->estado = "ACTIVO";

            $paciente->save();
            return redirect()->route('listaPaciente')->with('resultado', "registrado");
        } else {
            $paciente = Paciente::findOrFail($request->paciente_id);
            $paciente->tipo_paciente = $request->tipoUsuario;
            $paciente->ocupacion = $request->ocupacion;
            $paciente->isAlta = false;
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
            $user->pregunta_seguridad_a = $request->preguntaSeguridad1;
            $user->pregunta_seguridad_b = $request->preguntaSeguridad2;
            $user->save();

            return redirect()->route('listaPaciente')->with('resultado', "actualizado");
        }
    }

    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        $user = User::findOrFail($paciente->user_id);

        return [
            'paciente' => $paciente,
            'user' => $user,
        ];
    }

    public function delete($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->estado = "INACTIVO";
        $paciente->save();

        return redirect()->route('listaPaciente')->with('resultado', "eliminado");
    }

    public function listarSesiones()
    {
        // Fecha	Hora Inicio/Hora Fin	
        // CI Paciente	Nombre(s)	Apellidos	
        // Descripción de la Sesión	
        // Diagnòstico	Archivos Adjuntos	
        // Estado de la Sesión,	Estado de Pago	
        // Pagar Sesión	Cancelar Sesión
        $user = Auth::user();
        $paciente = Paciente::where('user_id', $user->id)->first();
        $sesiones = $paciente->sesiones;
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

        $sesion = Sesion::where('id', $request->sesion_id)
        ->where('paciente_id', $paciente->id)->first();

        $sesion->estado = 'Cancelado';
        $sesion->save();

        return response()->json($request);
    }

    public function listaPaciente()
    {
        $pacientes = Paciente::all();
        return view('listaPaciente', compact('pacientes'));
    }
}
