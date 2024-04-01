<?php

namespace App\Http\Middleware;

use App\Models\DatosUsuario;
use App\Models\Pregunta;
use Closure;
use Illuminate\Http\Request;

class PreventUserContinueBeforeAddHisData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $usuario = auth()->user();

        if ($usuario->hasRole('Usuario')) {
            $preguntas = Pregunta::all()->count();
            $preguntas_respondidas = DatosUsuario::join('preguntas', 'preguntas.id', '=', 'pregunta_id')
                ->where('usuario_id', '=', $usuario->id)
                ->count();

            if ($preguntas_respondidas !== $preguntas) {
                return redirect()->route('preguntas.usuario');
            }
        }

        return $next($request);
    }
}
