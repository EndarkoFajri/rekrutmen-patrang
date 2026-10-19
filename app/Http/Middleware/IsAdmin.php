<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Jika user login TAPI emailnya bukan admin, lempar paksa ke halaman depan
        if (Auth::check() && Auth::user()->email !== 'a@gmail.com') {
            return redirect('/')->with('error', 'Akses ditolak! Anda bukan admin.');
        }

        return $next($request);
    }
}
