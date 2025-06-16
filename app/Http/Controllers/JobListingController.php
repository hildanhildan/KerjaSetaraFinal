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

    if ($request->filled('q')) { // Gunakan filled() untuk mengecek apakah input pencarian diisi
        $search = $request->input('q');
        $query->where(function($q) use ($search) {
            $q->where('judul', 'like', '%' . $search . '%')
              ->orWhere('perusahaan', 'like', '%' . $search . '%')
              ->orWhere('lokasi', 'like', '%' . $search . '%');
        });
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