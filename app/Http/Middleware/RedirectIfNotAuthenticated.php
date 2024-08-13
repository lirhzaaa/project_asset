<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAuthenticated
{
    public function handle($request, Closure $next)
    {
        if (Auth::guest()) {
            return redirect()->route('login')->with('message', 'Anda harus login terlebih dahulu!!!');
        }

        return $next($request);
    }
}
