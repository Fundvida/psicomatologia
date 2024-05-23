<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notificacion;

class NotificacionController extends Controller
{
    public function getNotificationes(){
        $notificaciones = Notificacion::where('user_id', auth()->id())
        ->where('leido', 0)
        ->orderBy('created_at', 'desc')
        ->get();

        return response()->json($notificaciones);
    }
}
