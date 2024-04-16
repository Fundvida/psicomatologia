<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Psicologo;
use App\Models\User;

class AdminController extends Controller {
    
    public function index() {

        return view('admin.index');
    }

    public function mntPsicologo() {
        $psicologos = Psicologo::all();
        //return $psicologos;
        return view('admin.mntPsicologo', compact('psicologos'));
    }

    public function store(Request $request) {
        $user = new User();
        $user->name                 = $request->nombre;
        $user->apellidos            = $request->apellido;
        $user->email                = $request->email;
        $user->password             = $request->password;
        $user->role                 = "psicologo";
        $user->contador_bloqueos    = 0;
        $user->fecha_nacimiento     = $request->fecha_na;
        $user->ci                   = $request->ci;
        $user->codigo_pais_telefono = $request->codigo_pais;
        $user->telefono             = $request->numero_telefono;
        $user->pregunta_seguridad_a = $request->preg_uno;
        $user->pregunta_seguridad_b= $request->preg_dos;
        $user->assignRole('psicologo');

        $user->save();

        $psicologo = new Psicologo();
        $psicologo->user_id                 = $user->id; // Recuperamos el ultimo id creado
        $psicologo->estado                  = "ACTIVO";
        $psicologo->fecha_funcion_titulo    = $request->fecha_titulo;
        $psicologo->universidad             = $request->universidad;
        $psicologo->ciudad_residencia       = $request->c_recidencia;
        $psicologo->departamento_residencia = $request->d_residencia;
        $psicologo->pais_residencia         = $request->p_residencia;

        $psicologo->save();
        return redirect()->route('admin.index');
    }

    public function edit($id){
        $psicologo = Psicologo::findOrFail($id);
        return $psicologo;
    }
}
