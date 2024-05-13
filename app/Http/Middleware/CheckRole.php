<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Periksa apakah pengguna sedang masuk
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Periksa apakah peran pengguna sesuai dengan yang diizinkan
        foreach ($roles as $role) {
            if (Auth::user()->role === $role) {
                return $next($request);
            }
        }

        // Jika peran pengguna tidak sesuai, arahkan ke halaman yang sesuai atau tampilkan pesan kesalahan
        return redirect('/')->with('error', 'Unauthorized access.');
    }
}
