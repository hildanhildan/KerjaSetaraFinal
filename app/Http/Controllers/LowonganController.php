<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    public function index()
    {
        $lowongans = Lowongan::all(); // Atau filter by perusahaan yang login
        return view('lowonganperusahaan', compact('lowongans'));
    }

    public function edit($id)
    {
        // Ambil data lowongan berdasarkan ID dari database
        $lowongan = Lowongan::find($id);

        // Jika lowongan tidak ditemukan, kembalikan ke halaman sebelumnya atau tampilkan error
        if (!$lowongan) {
            return redirect()->route('lowonganperusahaan')->with('error', 'Lowongan tidak ditemukan');
        }

        // Kirim data lowongan ke view editlowongan
        return view('editlowongan', compact('lowongan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang dikirimkan
        $request->validate([
            'judul' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'jenisDisabilitas' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'pelamar' => 'required|integer',
        ]);

        // Temukan lowongan berdasarkan ID
        $lowongan = Lowongan::findOrFail($id);

        // Perbarui data lowongan
        $lowongan->update($request->all());

        return redirect()->route('lowonganperusahaan')->with('success', 'Lowongan berhasil diperbarui');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
            'jenisDisabilitas' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        Lowongan::create([
            'judul' => $request->judul,
            'perusahaan' => $request->perusahaan,
            'jenisDisabilitas' => $request->jenisDisabilitas,
            'lokasi' => $request->lokasi,
            'status' => $request->status,
            'pelamar' => 0
        ]);

        return redirect()->route('lowonganperusahaan')->with('success', 'Lowongan berhasil disimpan.');
    }

    public function destroy($id)
{
    $lowongan = Lowongan::findOrFail($id);
    $lowongan->delete();

    return redirect()->route('lowonganperusahaan')->with('success', 'Lowongan berhasil dihapus');
}


}

