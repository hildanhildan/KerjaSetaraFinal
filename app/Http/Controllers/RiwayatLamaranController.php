<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\JobApplication; // Import model JobApplication

class RiwayatLamaranController extends Controller
{
    /**
     * Menampilkan riwayat lamaran pekerjaan milik pengguna.
     */
    public function index(): View
    {
        // Dapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // Ambil semua lamaran (JobApplication) yang memiliki user_id yang sama.
        // Gunakan 'with('lowongan')' untuk mengambil juga data lowongan terkait
        // agar lebih efisien (menghindari N+1 query problem).
        $lamaranSaya = JobApplication::where('user_id', $userId)
                                     ->with('lowongan') // Eager load relasi 'lowongan'
                                     ->latest() // Urutkan dari yang terbaru
                                     ->get();

        // Kirim data ke view
        return view('pelamar.riwayat_lamaran', compact('lamaranSaya'));
    }
}