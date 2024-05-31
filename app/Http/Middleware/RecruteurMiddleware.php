<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\Recruteur;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RecruteurMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('recruteur')->check()) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}

