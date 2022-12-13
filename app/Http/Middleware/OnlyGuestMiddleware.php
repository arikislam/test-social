<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class OnlyGuestMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()) {
            return $next($request);
        }

        return redirect()->to('/keywords');

    }
}