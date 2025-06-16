<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LamaranController extends Controller
{
    /**
     * Menampilkan daftar lamaran yang masuk untuk lowongan milik penyedia kerja.
     * Ini adalah method yang dipanggil oleh route 'lamaran'.
     */
    public function index(): View
    {
        // Dapatkan ID pengguna (penyedia kerja) yang sedang login
        $userId = Auth::id();

        // Ambil semua lamaran yang ditujukan untuk lowongan-lowongan
        // yang dibuat oleh user yang sedang login.
        $applications = JobApplication::whereHas('lowongan', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->with('user', 'lowongan')->latest()->get(); // 'with' untuk eager loading data pelamar & lowongan

        // Tampilkan view 'lamaranmasuk.blade.php' dengan data lamaran
        return view('lamaranmasuk', compact('applications'));
    }

    /**
     * Memproses dan menyimpan lamaran pekerjaan baru dari seorang pelamar.
     * Ini adalah method yang dipanggil oleh route 'lamaran.apply'.
     */
    public function apply(Request $request, Lowongan $lowongan): RedirectResponse
    {
        $user = Auth::user();

        // Cek apakah pelamar sudah pernah melamar lowongan ini sebelumnya
        $existingApplication = JobApplication::where('user_id', $user->id)
                                             ->where('lowongan_id', $lowongan->id)
                                             ->exists();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'Anda sudah pernah melamar lowongan ini.');
        }

        // Buat lamaran baru
        JobApplication::create([
            'user_id' => $user->id,
            'lowongan_id' => $lowongan->id,
            'status' => 'Terkirim', // Status awal lamaran
        ]);

        return redirect()->route('dashboard.pelamar')->with('success', 'Lamaran Anda berhasil dikirim!');
    }

    /**
     * Menerima sebuah lamaran pekerjaan.
     * Dipanggil oleh route 'lamaran.accept'.
     */
    public function accept(JobApplication $jobApplication): RedirectResponse
    {
        // Otorisasi: Pastikan yang bisa menerima adalah pemilik lowongan
        $this->authorize('update', $jobApplication);

        $jobApplication->status = 'Diterima';
        $jobApplication->save();

        return redirect()->route('lamaran')->with('success', 'Lamaran berhasil diterima!');
    }

    /**
     * Menolak sebuah lamaran pekerjaan.
     * Dipanggil oleh route 'lamaran.reject'.
     */
    public function reject(JobApplication $jobApplication): RedirectResponse
    {
        // Otorisasi: Pastikan yang bisa menolak adalah pemilik lowongan
        $this->authorize('update', $jobApplication);
        
        $jobApplication->status = 'Ditolak';
        $jobApplication->save();
        
        return redirect()->route('lamaran')->with('success', 'Lamaran berhasil ditolak.');
    }
}
