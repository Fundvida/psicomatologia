<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Psicologo;

class AdminController extends Controller {
    
    public function index() {

        return view('admin.index');
    }

    public function registrarPsicologo() {
        return view('admin.registrarPsicologo');
    }

    public function store(Request $request) {
        $psicologo = new Psicologo();

        $psicologo->user_id                 = 1;
        $psicologo->estado                  = "1";
        $psicologo->fecha_funcion_titulo    = $request->fecha_titulo;
        $psicologo->universidad             = $request->universidad;
        $psicologo->ciudad_residencia       = $request->c_recidencia;
        $psicologo->departamento_residencia = $request->d_residencia;
        $psicologo->pais_residencia         = $request->p_residencia;

        $psicologo->save();
        return redirect()->route('admin.index');
    }
}
