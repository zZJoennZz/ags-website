<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Admin
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
        if (!Auth::check()) {
            Session::flush();
            Auth::logout();
            return redirect()->route('login')->withErrors(['Please login to access the system']);
        }

        if (!Auth::user()->is_active) {
            Session::flush();
            Auth::logout();
            return redirect()->route('login')->withErrors(['Your account is not active. Please contact the administrator.']);
        }

        if (Auth::user()->account_Type === "STAFF") {
            return redirect()->route('dashboard');
        }

        if (Auth::user()->account_type === "ADMIN") {
            return $next($request);
        }

        abort(403);
    }
}
