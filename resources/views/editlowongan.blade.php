<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Edit Lowongan - KerjaSetara</title>
    <link rel="stylesheet" href="{{ asset('css/dashboardperusahaan.css') }}">
    {{-- Anda bisa menambahkan style dari buatlowongan.css jika sudah ada --}}
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2><a href="{{ route('dashboardperusahaan') }}">Kerja<span>Setara</span></a></h2>
            <nav>
                <a href="{{ route('profilperusahaan') }}">🏠 Profil Perusahaan</a>
                <a href="{{ route('lowonganperusahaan') }}" class="active">📄 Lowongan Saya</a>
                <a href="{{ route('buatlowongan') }}">➕ Buat Lowongan</a>
                <a href="{{ route('lamaran') }}">📨 Lamaran Masuk</a>

                <!-- Logout -->
                <form id="logout-form" action="{{ route('logout.perusahaan') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    🚪 Keluar
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main">
            <div class="header">
                <h1>Edit Lowongan Pekerjaan</h1>
            </div>

            <form action="{{ route('lowongan.update', $lowongan->id) }}" method="POST" class="form-lowongan">
                @csrf
                @method('PUT') {{-- Method spoofing untuk update --}}

                <div>
                    <label for="judul">Judul Pekerjaan</label>
                    <input type="text" id="judul" name="judul" value="{{ old('judul', $lowongan->judul) }}" required>
                </div>

                <div>
                    <label for="deskripsi">Deskripsi Pekerjaan</label>
                    <textarea id="deskripsi" name="deskripsi" rows="6" required>{{ old('deskripsi', $lowongan->deskripsi) }}</textarea>
                </div>

                <div>
                    <label for="jenisDisabilitas">Kategori Disabilitas</label>
                    <select id="jenisDisabilitas" name="jenisDisabilitas" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Semua Jenis Disabilitas" {{ old('jenisDisabilitas', $lowongan->jenisDisabilitas) == 'Semua Jenis Disabilitas' ? 'selected' : '' }}>Semua Jenis Disabilitas</option>
                        <option value="Tunadaksa" {{ old('jenisDisabilitas', $lowongan->jenisDisabilitas) == 'Tunadaksa' ? 'selected' : '' }}>Tunadaksa</option>
                        <option value="Tunanetra" {{ old('jenisDisabilitas', $lowongan->jenisDisabilitas) == 'Tunanetra' ? 'selected' : '' }}>Tunanetra</option>
                        <option value="Tunarungu" {{ old('jenisDisabilitas', $lowongan->jenisDisabilitas) == 'Tunarungu' ? 'selected' : '' }}>Tunarungu</option>
                        {{-- Tambahkan opsi lain sesuai kebutuhan --}}
                    </select>
                </div>

                <div>
                    <label for="tipe_pekerjaan">Tipe Pekerjaan</label>
                    <select id="tipe_pekerjaan" name="tipe_pekerjaan" required>
                        <option value="">-- Pilih Tipe --</option>
                        <option value="Penuh Waktu" {{ old('tipe_pekerjaan', $lowongan->tipe_pekerjaan) == 'Penuh Waktu' ? 'selected' : '' }}>Penuh Waktu</option>
                        <option value="Paruh Waktu" {{ old('tipe_pekerjaan', $lowongan->tipe_pekerjaan) == 'Paruh Waktu' ? 'selected' : '' }}>Paruh Waktu</option>
                        <option value="Magang" {{ old('tipe_pekerjaan', $lowongan->tipe_pekerjaan) == 'Magang' ? 'selected' : '' }}>Magang</option>
                        <option value="Kontrak" {{ old('tipe_pekerjaan', $lowongan->tipe_pekerjaan) == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                    </select>
                </div>

                <div>
                    <label for="status">Status Publikasi</label>
                    <select id="status" name="status" required>
                        <option value="Aktif" {{ old('status', $lowongan->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Draft" {{ old('status', $lowongan->status) == 'Draft' ? 'selected' : '' }}>Draft</option>
                        <option value="Ditutup" {{ old('status', $lowongan->status) == 'Ditutup' ? 'selected' : '' }}>Ditutup</option>
                    </select>
                </div>

                <button type="submit" class="btn-tambah">Perbarui Lowongan</button>
            </form>
        </main>
    </div>
</body>
</html>
