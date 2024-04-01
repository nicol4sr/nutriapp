<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\ConsultaNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ConsultaEspecialistaRespuestaListener
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
        $usuario = User::find($event->consulta->usuario_id);
        $usuario->notify(new ConsultaNotification($event->consulta));
    }
}
