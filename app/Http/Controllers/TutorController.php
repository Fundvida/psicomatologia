<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TutorController extends Controller
{
    public function getViewSesionList(){
        return view('homeTutorSesiones');
    }

    public function programarSesionView(){
        $user = Auth::user();

        $pacientes = DB::table('pacientes as p')
            ->join('pacientemenor as pm', 'p.usermenor_id', '=', 'pm.id')
            ->join('paciente_tutor as pt', 'pt.paciente_id', '=', 'p.id')
            ->join('tutors as t', 't.id', '=', 'pt.tutor_id')
            ->join('users as u', 'u.id', '=', 't.user_id')
            ->join('psicologos as ps', 'ps.id', '=', 'p.psicologo_id')
            ->where('u.id', $user->id)
            ->select('pm.*', 'p.psicologo_id')
            ->get();
        

        return view('programarSesionTutor', compact('pacientes'));
    }

    public function getSesiones(){
        $user = Auth::user();

        $sesiones = DB::table('sesions as s')
            ->join('pacientes as p', 'p.id','=', 's.paciente_id')
            ->join('pacientemenor as pm', 'p.usermenor_id', '=', 'pm.id')
            ->join('paciente_tutor as pt', 'pt.paciente_id', '=', 'p.id')
            ->join('tutors as t', 't.id', '=', 'pt.tutor_id')
            ->join('users as u', 'u.id', '=', 't.user_id')
            ->select('pm.name', 'pm.apellidos', 's.*')
            ->where('u.id', $user->id)
            ->get();
        
        return response()->json($sesiones);
    }
}
