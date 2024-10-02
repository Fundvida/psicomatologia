<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next, string ...$guards): Response
    // {
    //     $guards = empty($guards) ? [null] : $guards;

    //     foreach ($guards as $guard) {
    //         if (Auth::guard($guard)->check()) {
    //             return redirect(RouteServiceProvider::HOME);
    //         }
    //     }

    //     return $next($request);
    // }

    public function handle($request, Closure $next, ...$guards)
    {
        /**@var \App\Models\User **/
        $user = Auth::user();

        if ($user) {
            if ($user->hasRole('Administrador')) {
                return redirect()->route('home');
            } elseif ($user->hasRole('Psicologo')) {
                return redirect()->route('homePsicologo');
            } else if ($user->hasRole('Paciente')) {
                return redirect()->route('homePaciente');
            }

            // Default redirection if no roles match
            return redirect('/login');
        }

        return $next($request);
    }
}
