<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MechanicAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            /** @var User $user */
            $user = auth()->user();

            if ($user->hasRole('receptionist')) {
                return redirect(route('/'));
            }else if ($user->hasRole('mechanic')) {
                return $next($request);
            }
        }

        abort(403);  // permission denied error
    }
}
