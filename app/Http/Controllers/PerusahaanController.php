<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  // Pastikan sudah terimport
use App\Models\Perusahaan;  // Pastikan model yang digunakan sesuai
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PerusahaanController extends Controller
{
    // Menampilkan halaman form untuk mengisi profil perusahaan
    public function showForm()
    {
        return view('registerperusahaan');
    }

    // Proses Registrasi
    public function register(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:perusahaans,email',
            'password' => 'required|string|min:6',
        ]);

        // Simpan data perusahaan ke database
        $perusahaan = new Perusahaan();  // Menggunakan model Perusahaan
        $perusahaan->name = $validated['name'];
        $perusahaan->email = $validated['email'];
        $perusahaan->password = Hash::make($validated['password']); // Hash password
        $perusahaan->save();

        // Login langsung setelah registrasi
        Auth::login($perusahaan);  // Login otomatis setelah registrasi

        // Redirect ke halaman dashboard setelah login
        return redirect()->route('dashboard.perusahaan')->with('success', 'Akun perusahaan berhasil dibuat dan Anda telah login.');
    }

    // Proses Login


public function login(Request $request)
{
    Log::info('Login attempt', ['email' => $request->email]);

    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    // Login pakai guard perusahaan
    if (Auth::guard('perusahaan')->attempt([
        'email' => $request->email,
        'password' => $request->password,
    ])) {
        Log::info('Login successful', ['email' => $request->email]);

        // Regenerasi session untuk keamanan
        $request->session()->regenerate();

        return redirect()->route('dashboard.perusahaan');
    }

    Log::warning('Login failed', ['email' => $request->email]);

    return back()->with('error', 'Email atau password salah');
}


    // Menampilkan dashboard perusahaan
    public function dashboard()
    {
        return view('dashboardperusahaan'); // Halaman dashboard perusahaan
    }

    // Menyimpan data profil perusahaan
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'bidang' => 'required|string|max:100',
            'deskripsi' => 'required|string',
        ]);

        // Simpan data profil perusahaan ke database
        Perusahaan::create([
            'alamat' => $validated['alamat'],
            'bidang' => $validated['bidang'],
            'telepon' => $validated['telepon'],
            'deskripsi' => $validated['deskripsi'],
        ]);

        // Redirect ke halaman dashboard perusahaan dengan pesan sukses
        return redirect()->route('dashboardperusahaan')->with('success', 'Profil perusahaan berhasil disimpan!');
    }
}
