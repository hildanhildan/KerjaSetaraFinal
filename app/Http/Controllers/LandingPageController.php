<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;
use App\Models\TipsKarir;
use Illuminate\View\View;

class LandingPageController extends Controller
{
/**
* Menampilkan halaman utama (landing page).
*/
public function index(): View
{
// Ambil 6 lowongan pekerjaan terbaru yang statusnya 'Aktif'
$lowongans = Lowongan::where('status', 'Aktif')
->latest()
->take(6)
->get();

    // Ambil 3 tips karir terbaru
    $tips = TipsKarir::latest()
                     ->take(3)
                     ->get();

    // Kirim data lowongan dan tips ke view 'kerjasetara'
    return view('kerjasetara', compact('lowongans', 'tips'));
}

}
