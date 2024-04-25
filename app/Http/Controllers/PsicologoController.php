<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Psicologo;

class PsicologoController extends Controller
{
    public function index() {
        return view('psicologo.index');
    }
    
    public function addHorario(Request $request) {
        $diasSeleccionados  = $request->input('dias');
        $horaInicio         = date('H:i:s', strtotime($request->horaInicio));
        $horaFin            = date('H:i:s', strtotime($request->horaFin));
        $horaInicioT        = date('H:i:s', strtotime($request->horaInicioT));
        $horaFinT           = date('H:i:s', strtotime($request->horaFinT));
    
        $psicologo = Psicologo::where('user_id', $request->user_id)->firstOrFail(); // SOLO PARA OBTENER EL ID psicologo
    
        foreach ($diasSeleccionados as $dia) {
            Horario::updateOrCreate(
                [
                    'psicologo_id'  => $psicologo->id,
                    'dia'           => $dia,
                ],
                [

                    'hora_inicio_maniana'   => $horaInicio,
                    'hora_fin_maniana'      => $horaFin,
                    'hora_inicio_tarde'     => $horaInicioT,
                    'hora_fin_tarde'        => $horaFinT,
                    'isDisponible'          => true,
                ]
            );
        }
    
        //return response()->json(['message' => 'Horarios guardados exitosamente']);
        return redirect()->route('psicologo.index')->with('resultado', "horario registrado");
    }
}
