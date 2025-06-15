<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Perusahaan; // Memastikan kita menggunakan model Perusahaan
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule; // Diperlukan untuk validasi 'in'

class LowonganController extends Controller
{
    /**
     * Menampilkan daftar lowongan milik penyedia kerja yang sedang login.
     * Terhubung dengan route 'lowonganperusahaan'.
     */
    public function index(): View
    {
        $userId = Auth::id();
        $lowongans = Lowongan::where('user_id', $userId)->latest()->get();
        return view('lowonganperusahaan', compact('lowongans'));
    }

    /**
     * Menampilkan form untuk membuat lowongan baru.
     * Terhubung dengan route 'buatlowongan'.
     */
    public function create(): View|RedirectResponse
    {
        $user = Auth::user();

        // Menggunakan relasi 'perusahaan' yang ada di model User
        $perusahaan = $user->perusahaan; 

        // Jika penyedia kerja belum melengkapi profil perusahaannya,
        // arahkan ke halaman profil terlebih dahulu.
        if (!$perusahaan || !$perusahaan->nama_resmi_perusahaan) {
            return redirect()->route('profilperusahaan')->with('error', 'Harap lengkapi profil perusahaan Anda sebelum membuat lowongan.');
        }

        // Kirim data perusahaan ke view 'buatlowongan'
        return view('buatlowongan', compact('perusahaan'));
    }

    /**
     * Menyimpan lowongan yang baru dibuat ke database.
     * Terhubung dengan route 'lowongan.store'.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi data dari form. Pastikan atribut 'name' di form
        // sesuai dengan kunci validasi di sini.
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jenisDisabilitas' => 'required|string|max:255',
            'tipe_pekerjaan' => 'required|string|max:255',
            'status' => ['required', 'string', Rule::in(['Aktif', 'Draft'])],
        ]);
        
        // Ambil data profil perusahaan dari user yang login
        $perusahaan = Auth::user()->perusahaan;

        // Tambahkan data yang tidak berasal dari form
        $validatedData['user_id'] = Auth::id();
        $validatedData['perusahaan'] = $perusahaan->nama_resmi_perusahaan;
        $validatedData['lokasi'] = ($perusahaan->kota ?? '') . ', ' . ($perusahaan->provinsi ?? '');
        $validatedData['pelamar'] = 0; // Inisialisasi jumlah pelamar
        
        // Buat record baru di tabel lowongan
        // PENTING: Pastikan semua kunci di $validatedData ada di properti $fillable model Lowongan
        Lowongan::create($validatedData);

        return redirect()->route('lowonganperusahaan')->with('success', 'Lowongan berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit lowongan yang ada.
     */
    public function edit(Lowongan $lowongan): View|RedirectResponse
    {
        // Otorisasi: Pastikan lowongan ini milik user yang sedang login
        if ($lowongan->user_id !== Auth::id()) {
            abort(403, 'AKSES DITOLAK.');
        }

        return view('editlowongan', compact('lowongan'));
    }

    /**
     * Memperbarui lowongan yang ada di database.
     */
    public function update(Request $request, Lowongan $lowongan): RedirectResponse
    {
        // Otorisasi: Pastikan lowongan ini milik user yang sedang login
        if ($lowongan->user_id !== Auth::id()) {
            abort(403, 'AKSES DITOLAK.');
        }

        // Validasi data
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jenisDisabilitas' => 'required|string|max:255',
            'tipe_pekerjaan' => 'required|string|max:255',
            'status' => ['required', 'string', Rule::in(['Aktif', 'Draft', 'Ditutup'])],
        ]);

        // Update lowongan dengan data yang sudah divalidasi
        $lowongan->update($validatedData);

        return redirect()->route('lowonganperusahaan')->with('success', 'Lowongan berhasil diperbarui.');
    }

    /**
     * Menghapus lowongan dari database.
     */
    public function destroy(Lowongan $lowongan): RedirectResponse
    {
        // Otorisasi: Pastikan lowongan ini milik user yang sedang login
        if ($lowongan->user_id !== Auth::id()) {
            abort(403, 'AKSES DITOLAK.');
        }

        $lowongan->delete();

        return redirect()->route('lowonganperusahaan')->with('success', 'Lowongan berhasil dihapus.');
    }
}
