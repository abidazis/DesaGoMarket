<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // <-- PASTIKAN BARIS INI JUGA BENAR

class PenjualMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek jika user sudah login DAN rolenya adalah 'penjual'
        if (Auth::check() && Auth::user()->role === 'penjual') {
            return $next($request);
        }

        // Jika tidak, tendang ke halaman utama atau halaman login
        return redirect('/');
    }
}