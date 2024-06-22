<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notificacion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NotificacionController extends Controller
{
    public function getNotificationes(){
        $notificaciones = Notificacion::where('user_id', auth()->id())
        ->where('leido', 0)
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

        return response()->json($notificaciones);
    }

    public function markAllAsRead (){
        Notificacion::where('user_id', auth()->id())
            ->where('leido', 0)
            ->update(['leido' => 1]);

        return response()->json(['message' => 'All notifications marked as read.']);
    }

    public function getAllNotifications (){
        $user = Auth::user();
        if ($user->hasRole('Administrador')) {
            $userRole='Administrador'; 
        } elseif ($user->hasRole('Psicologo')) {
            $userRole='Psicologo'; 
        } else if ($user->hasRole('Paciente')) {
            $userRole='Paciente'; 
        }
        //dd($userRole);

        $routes = [
            'admin' => route('listadoAllSesiones'),
            //'Tutor' => route('editor.dashboard'),
            'paciente' => route('homePacienteSesiones'),
            'psicologo' => route('psicologo.sesiones')
        ];

        $notifications = Notificacion::where('user_id', $user->id)->get();
        return view('notificaciones', compact('notifications', 'userRole', 'routes'));
    }
}
