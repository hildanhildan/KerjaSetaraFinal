<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;
use Illuminate\View\View;

class JobListingController extends Controller
{
    /**
     * Menampilkan halaman pencarian lowongan untuk publik.
     */
    public function index(Request $request): View
    {
        // Logika pencarian sederhana
        $query = Lowongan::where('status', 'Aktif')->latest();

        if ($request->has('q')) {
            $query->where('judul', 'like', '%' . $request->input('q') . '%')
                  ->orWhere('perusahaan', 'like', '%' . $request->input('q') . '%');
        }

        $lowongans = $query->paginate(9); // Tampilkan 9 lowongan per halaman

        return view('lowongan.index', compact('lowongans'));
    }

    /**
     * Menampilkan halaman detail untuk satu lowongan pekerjaan.
     */
    public function show(Lowongan $lowongan): View
    {
        return view('lowongan.show', compact('lowongan'));
    }
}