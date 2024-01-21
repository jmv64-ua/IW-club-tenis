<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if ($request->user()) {
            // Verifica si el rol del usuario está en la lista de roles permitidos
            if (in_array($request->user()->rol, $roles)) {
                return $next($request);
            }
        }

        abort(403, 'Acceso no autorizado.');
    }
}
