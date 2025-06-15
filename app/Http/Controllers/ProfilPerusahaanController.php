<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Perusahaan; // <-- PASTIKAN MODEL PERUSAHAAN DI-IMPORT
use Illuminate\Support\Facades\Storage; // <-- DITAMBAHKAN untuk menghapus logo lama

class ProfilPerusahaanController extends Controller
{
    /**
     * Menampilkan halaman profil perusahaan untuk dilihat atau diedit.
     */
    public function show(): View
    {
        $user = Auth::user();
        // Ambil data perusahaan terkait user.
        // Jika belum ada, buat record baru dengan user_id yang terkait.
        // Parameter kedua firstOrCreate adalah data yang akan diisi JIKA record baru dibuat.
        $profilPerusahaan = $user->perusahaan()->firstOrCreate(
            ['user_id' => $user->id], // Kondisi untuk mencari atau membuat
            // Data default jika record BARU dibuat (opsional, bisa diisi dari form saat update pertama)
            // Misalnya, jika nama perusahaan awal diambil dari nama user:
            // ['nama_resmi_perusahaan' => $user->name] 
        );

        // Pastikan view 'profilperusahaan.blade.php' ada di resources/views/
        return view('profilperusahaan', compact('profilPerusahaan'));
    }

    /**
     * Memperbarui profil perusahaan di database.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();
        // Dapatkan instance Perusahaan yang terkait dengan user, atau buat jika belum ada.
        $profilPerusahaan = $user->perusahaan()->firstOrCreate(
            ['user_id' => $user->id]
        );

        // Validasi data dari request. Pastikan nama field di sini
        // SESUAI dengan atribut 'name' pada input di form Blade kamu.
        $validatedData = $request->validate([
            'nama_resmi_perusahaan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat_lengkap' => 'nullable|string',
            'kota' => 'nullable|string|max:255',
            'provinsi' => 'nullable|string|max:255',
            'kode_pos' => 'nullable|string|max:10',
            'telepon_perusahaan' => 'nullable|string|max:20',
            // Validasi email unik, kecuali untuk record saat ini
            'email_perusahaan' => 'nullable|email|max:255|unique:perusahaan,email_perusahaan,' . $profilPerusahaan->id,
            'website' => 'nullable|url|max:255',
            'bidang_usaha' => 'nullable|string|max:255',
            // Validasi NPWP unik, kecuali untuk record saat ini
            'npwp' => 'nullable|string|max:25|unique:perusahaan,npwp,' . $profilPerusahaan->id,
            // Contoh validasi untuk upload logo. Sesuaikan nama input 'logo' dengan form kamu.
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // max 2MB
        ]);


        // Logika untuk menangani upload file logo
        if ($request->hasFile('logo')) {
            // 1. Hapus logo lama jika ada dan bukan logo default
            if ($profilPerusahaan->logo_path && Storage::disk('public')->exists($profilPerusahaan->logo_path)) {
                Storage::disk('public')->delete($profilPerusahaan->logo_path);
            }
            // 2. Simpan logo baru
            $path = $request->file('logo')->store('logos_perusahaan', 'public');
            // 3. Tambahkan path logo ke data yang akan disimpan
            $validatedData['logo_path'] = $path;
        }

        // Update data profil perusahaan dengan data yang sudah divalidasi
        // PENTING: Pastikan semua field di $validatedData ada di properti $fillable model Perusahaan
        $profilPerusahaan->update($validatedData);

        return redirect()->route('profilperusahaan')->with('success', 'Profil perusahaan berhasil diperbarui!');
    }
}
