<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function ver_todas()
    {
        $notificaciones = auth()->user()->notifications->whereNotNull('read_at');
        return view('profile.notifications', compact('notificaciones'));
    }

    public function marcar_todas()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    public function marcar_una($notificacion_id)
    {
        auth()->user()->unreadNotifications
            ->when($notificacion_id, function ($query) use ($notificacion_id) {
                return $query->where('id', $notificacion_id);
            })->markAsRead();
        return redirect()->back();
    }
}
