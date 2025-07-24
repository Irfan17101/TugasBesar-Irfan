<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pengecekan: Apakah pengguna sudah login DAN rolenya adalah 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            // Jika ya, izinkan permintaan untuk melanjutkan ke tujuan (controller)
            return $next($request);
        }

        // Jika tidak, hentikan permintaan dan tampilkan halaman error 403 (Forbidden)
        // dengan pesan yang jelas.
        abort(403, 'AKSES DITOLAK. HALAMAN INI HANYA UNTUK ADMIN.');
    }
}