<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;         // <-- Pastikan ini di-import
use Illuminate\Support\Facades\Auth; // <-- Pastikan ini di-import
// use App\Providers\RouteServiceProvider; // Kamu mungkin butuh ini untuk redirect, atau gunakan route name langsung

class PenyediaLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('penyedia');
    }

    /**
     * Handle an incoming authentication request for penyedia kerja.
     * INI METHOD YANG PERLU KAMU TAMBAHKAN/PERIKSA:
     */
    public function login(Request $request)
    {
        // 1. Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        // 2. Coba autentikasi pengguna
        if (Auth::attempt($credentials)) {
            // 3. Cek apakah pengguna yang login adalah 'penyedia_kerja'
            if (Auth::user()->role === 'penyedia_kerja') {
                $request->session()->regenerate();

                // Arahkan ke dashboard penyedia kerja
                // Pastikan route 'dashboardperusahaan' sudah ada dan diberi nama
                return redirect()->intended(route('dashboardperusahaan'));
            } else {
                // Jika role tidak sesuai (misalnya pelamar mencoba login di sini),
                // logout pengguna tersebut dan kirim error
                Auth::logout(); // Logout dari guard default (web)
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors([
                    'email' => 'Akses ditolak. Akun ini bukan akun penyedia kerja.',
                ])->onlyInput('email');
            }
        }

        // 4. Jika autentikasi gagal (email/password salah)
        return back()->withErrors([
            'email' => 'Email atau password yang diberikan tidak cocok.',
        ])->onlyInput('email');
    }
}