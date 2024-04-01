<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\EspecialistaNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ConsultaEspecialistaListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $usuario = User::find($event->consulta->especialista_id);
        $usuario->notify(new EspecialistaNotification($event->consulta));
    }
}
