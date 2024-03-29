<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        // Obtener todos los roles
        $roles = explode('|', $roles);
        // Obtener el usuario actual
        $user = $request->user();
        // Obtener el nombre del rol del usuario
        $userRole = $user->rol->rol;

        // Validar si el usuario tiene alguno de los roles definidos
        if (!in_array($userRole, $roles)) {
            return redirect()->back();
        }

        return $next($request);
    }
}
