<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipsKarir; // Import model
use Illuminate\View\View;

class TipsController extends Controller
{
    public function index(): View
    {
        // Ambil semua data tips karir dari database
        $tips = TipsKarir::latest()->get();

        // Tampilkan view dan kirim data tips
        return view('tips_karir', compact('tips'));
    }
}
