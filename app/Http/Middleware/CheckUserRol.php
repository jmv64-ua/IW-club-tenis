<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UserRol;

class CheckUserRol
{
    public function handle(Request $request, Closure $next, ...$allowedRoles)
    {
        $user = auth()->user();

        // Verifica si el usuario está autenticado y tiene un rol permitido
        if ($user && in_array($user->rol, $allowedRoles)) {
            return $next($request);
        }
        
        return $next($request);
    }
}
