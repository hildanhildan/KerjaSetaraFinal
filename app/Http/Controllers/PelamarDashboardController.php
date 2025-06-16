<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Lowongan; // <-- IMPORT MODEL LOWONGAN

class PelamarDashboardController extends Controller
{
    /**
     * Menampilkan dashboard untuk pelamar kerja.
     */
    public function index(): View
    {
        // Ambil 6 lowongan pekerjaan terbaru yang statusnya 'Aktif'
        $lowongans = Lowongan::where('status', 'Aktif')
                             ->latest() // Urutkan dari yang paling baru
                             ->take(6)    // Ambil maksimal 6 lowongan
                             ->get();

        // Kirim data lowongan ke view
        return view('dashboard_pelamar', compact('lowongans'));
    }
}
