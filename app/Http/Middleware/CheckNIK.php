<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class CheckNIK
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa apakah pengguna telah memasukkan NIK
        if (Auth::check() && is_null(Auth::user()->nik)) {
            Alert::warning('Peringatan', 'Anda harus mengisi NIK terlebih dahulu.');
            // Redirect ke halaman input NIK
            return redirect()->route('profile-peminjam.edit', Auth::user()->id); // Ganti 'input_nik' dengan nama route halaman input NIK
        }

        return $next($request);
    }
}
