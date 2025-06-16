<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule; // <-- PASTIKAN CLASS Rule DI-IMPORT
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Menampilkan form registrasi standar (untuk pelamar).
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Menampilkan form registrasi khusus untuk penyedia kerja.
     */
    public function showPenyediaRegistrationForm(): View
    {

        return view('registerperusahaan');
    }

    /**
     * Menangani permintaan registrasi yang masuk untuk kedua peran.
     * Ini adalah versi yang sudah diperbaiki.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi input, termasuk 'role' yang dikirim dari form
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', Rule::in(['pelamar', 'penyedia_kerja'])],
        ]);

        // 2. Buat user baru dengan role yang dinamis dari request
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // <-- Mengambil role dari input form, tidak lagi hardcoded
        ]);

        event(new Registered($user));

        Auth::login($user);

        // 3. Arahkan pengguna ke dashboard yang sesuai berdasarkan peran mereka
        if ($request->role === 'penyedia_kerja') {
            // Jika yang mendaftar adalah penyedia kerja, arahkan ke dashboard perusahaan
            return redirect(route('dashboardperusahaan'));
        }

        // Jika tidak, berarti yang mendaftar adalah pelamar, arahkan ke dashboard pelamar
        // Pastikan Anda sudah membuat route bernama 'dashboard.pelamar' seperti di panduan sebelumnya
        return redirect(route('dashboard.pelamar'));
    }
}
