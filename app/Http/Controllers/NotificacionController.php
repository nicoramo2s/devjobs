<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $notificaciones = Auth::user()->unreadNotifications;

        // Limpiar notificaciones
        Auth::user()->unreadNotifications->markAsread();
        

        return view("notificaciones.index", [
            "notificaciones"=> $notificaciones,
        ]);
    }
}
