<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        if (Auth::check() && Auth::user()->role_id == 'f5504d7f-8f40-4508-907f-48fb119813c6') {
            return redirect('/admin'); 
        }

        if (Auth::check() && Auth::user()->role_id == '1e0ba8e6-0c99-4bd3-9e9c-b89f33ed0fe0') {
            return redirect('/client'); 
        }

        return $next($request);
    }
}
