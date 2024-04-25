<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Horario;
use Illuminate\Http\Request;
use App\Models\Psicologo;
use App\Models\User;

class PacienteController extends Controller
{
    public function index() {
        $psicologos = Psicologo::all();
        return view('paciente.index', compact('psicologos'));
        //return view('paciente.index');
    }

    public function getPsicologo ($id_psicologo){
        $psicologo = Psicologo::findOrFail($id_psicologo);
        $user = User::findOrFail($psicologo->user_id);
        $horarios = Horario::where('psicologo_id', $psicologo->id)
        ->select('hora_inicio_maniana', 'hora_fin_maniana', 'hora_inicio_tarde', 'hora_fin_tarde', 'dia')
        ->get();

        return [
            'psicologo' => $psicologo,
            'user' => $user,
            'horarios' => $horarios,
        ];
    }

    public function addSesion (Request $request){
        dd($request);
    }

    public function mostrarPsicologo ($id_psicologo){
        $psicologo = Psicologo::findOrFail($id_psicologo);
        $user = User::findOrFail($psicologo->user_id);
        $horarios = Horario::where('psicologo_id', $psicologo->id)
        ->select('hora_inicio_maniana', 'hora_fin_maniana', 'hora_inicio_tarde', 'hora_fin_tarde', 'dia')
        ->get();

        return view('paciente.nuevaSesion', 
        [
            'psicologo' => $psicologo,
            'user' => $user,
            'horarios' => $horarios,
        ]); 
        
    }
}
