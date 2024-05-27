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
}
