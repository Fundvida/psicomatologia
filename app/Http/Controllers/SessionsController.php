<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Http\Request;

class SessionsController extends Controller {
    
    public function create() {
        
        return view('auth.login');
    }

    public function store() {
        
        if(auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'Credenciales incorrectas intente de nuevo.',
            ]);

        } else {
            $user = auth()->user();
            if($user->role == 'admin') {
                return redirect()->route('admin.index');
            } elseif($user->role == 'paciente') {
                return redirect()->route('paciente.index');
            } elseif($user->role == 'tutor') {
                return redirect()->route('tutor.index');
            } elseif($user->role == 'psicologo') {
                $psicologo = $user->psicologo;
                
                if ($psicologo && $psicologo->estado == 'ACTIVO') {
                    return redirect()->route('psicologo.index');
                } else {
                    return redirect()->to('/login');
                }
            } else {
                return redirect()->to('/login');
            }
        }
    }

    public function destroy() {

        auth()->logout();

        return redirect()->to('/login');
    }

    public function createUser(Request $request) {
        $user = new User();
        $user->name                 = $request->nombre;
        $user->apellidos            = $request->apellido;
        $user->email                = $request->email;
        $user->password             = $request->password;
        $user->role                 = $request->tipo_usuario;
        $user->contador_bloqueos    = 0;
        $user->fecha_nacimiento     = $request->fecha_na;
        $user->ci                   = $request->ci;
        $user->codigo_pais_telefono = $request->codigo_pais;
        $user->telefono             = $request->numero_telefono;
        $user->pregunta_seguridad_a = $request->preg_uno;
        $user->pregunta_seguridad_b= $request->preg_dos;
        $user->assignRole($request->tipo_usuario);

        $user->save();

        if($request->tipo_usuario == 'paciente'){
            $paciente = new Paciente();
            $paciente->user_id = $user->id;
            $paciente->isAlta = false;

            $paciente->save();
        }else {
            $tutor = new Tutor();
            $tutor->user_id = $user->id;
            $tutor->save();
        }

        return redirect()->to('/login');
        //return $request->all();
    }
}
