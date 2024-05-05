<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Paciente;

class PacienteController extends Controller
{
    public function index_registrar()
    {
        return view('');
    }

    public function store(Request $request) {
        if($request->paciente_id == ""){
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
            $user->pregunta_seguridad_b= $request->preguntaSeguridad2;
            $user->assignRole('Paciente');

            $user->save();

            $paciente = new Paciente();
            $paciente->user_id = $user->id;
            $paciente->tipo_paciente = $request->tipoUsuario;
            $paciente->ocupacion = $request->ocupacion;
            $paciente->isAlta = false;
            $paciente->estado = "ACTIVO";

            $paciente->save();
            return redirect()->route('listaPaciente');
        }else {
            $paciente = Paciente::findOrFail($request->paciente_id);
            $paciente->tipo_paciente = $request->tipoUsuario;
            $paciente->ocupacion = $request->ocupacion;
            $paciente->isAlta = false;
            $paciente->save();

            $user = User::findOrFail($paciente->user_id);
            $user->name                 = $request->nombres;
            $user->apellidos            = $request->apellidos;
            $user->email                = $request->correoElectronico;
            $user->password             = $request->contrasena;
            $user->contador_bloqueos    = 0;
            $user->fecha_nacimiento     = $request->fechaNacimiento;
            $user->ci                   = $request->numeroCI;
            $user->codigo_pais_telefono = $request->codigo_pais;
            $user->telefono             = $request->telefono;
            $user->pregunta_seguridad_a = $request->preguntaSeguridad1;
            $user->pregunta_seguridad_b= $request->preguntaSeguridad2;
            $user->save();

            return redirect()->route('listaPaciente');
        }
    }

    public function edit ($id){
        $paciente = Paciente::findOrFail($id);
        $user = User::findOrFail($paciente->user_id);
    
        return [
            'paciente' => $paciente,
            'user' => $user,
        ];
    }

    public function delete ($id){
        $paciente = Paciente::findOrFail($id);
        $paciente->estado = "INACTIVO";
        $paciente->save();

        return redirect()->route('listaPaciente');
    }
}
