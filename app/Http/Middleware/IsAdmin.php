<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user yang sedang login adalah admin (usertype == 1)
        if (Auth::check() && Auth::user()->usertype == 1) {
            return $next($request);
        }

        // Redirect jika bukan admin
        return redirect()->route('dashboard')->with('error', 'You are not authorized to access this page.');
    }
}