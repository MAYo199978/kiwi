<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckSingleSession
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
        if (Auth::check()) {
            $user = Auth::user();

            // Si el usuario tiene un session_id guardado y es diferente al actual
            if ($user->session_id && $user->session_id !== session()->getId()) {
                // Invalidar la sesión actual y hacer logout
                Auth::logout();
                Session::invalidate();
                Session::regenerateToken();

                return redirect('/login')->with('error', 'Tu sesión ha sido cerrada porque iniciaste sesión desde otro lugar.');
            }
        }

        return $next($request);
    }
}