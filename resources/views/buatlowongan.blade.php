<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Buat Lowongan - KerjaSetara</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/dashboardperusahaan.css') }}">
    {{-- Anda bisa menambahkan style tambahan untuk form di sini jika perlu --}}
    <style>
        .form-lowongan .text-danger {
            color: #e3342f;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .form-lowongan input[readonly], .form-lowongan textarea[readonly] {
            background-color: #e9ecef;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2><a href="{{ route('dashboardperusahaan') }}">Kerja<span>Setara</span></a></h2>
            <nav>
                <a href="{{ route('profilperusahaan') }}">🏠 Profil Perusahaan</a>
                <a href="{{ route('lowonganperusahaan') }}">📄 Lowongan Saya</a>
                <a href="{{ route('buatlowongan') }}" class="active">➕ Buat Lowongan</a>
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
                <h1>Buat Lowongan Pekerjaan Baru</h1>
            </div>

            {{-- Menampilkan Notifikasi Sukses atau Error Global dari Session --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('lowongan.store') }}" method="POST" class="form-lowongan" id="formLowongan">
                @csrf

                <div>
                    <label for="judul">Judul Pekerjaan</label>
                    <input type="text" id="judul" name="judul" value="{{ old('judul') }}" required placeholder="Contoh: Staff Administrasi Inklusif">
                    @error('judul') <p class="text-danger">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="deskripsi">Deskripsi Pekerjaan</label>
                    <textarea id="deskripsi" name="deskripsi" rows="6" required placeholder="Jelaskan tanggung jawab, kualifikasi, dan detail pekerjaan lainnya...">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <p class="text-danger">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="perusahaan">Nama Perusahaan</label>
                    {{-- Diisi otomatis dari profil perusahaan dan tidak bisa diubah --}}
                    <input type="text" id="perusahaan" name="perusahaan" 
                           value="{{ $perusahaan->nama_resmi_perusahaan ?? 'Lengkapi Profil Anda' }}" readonly />
                </div>

                <div>
                    <label for="lokasi">Lokasi Kerja</label>
                    {{-- Diisi otomatis dari profil perusahaan --}}
                    <input type="text" id="lokasi" name="lokasi" 
                           value="{{ ($perusahaan->kota ?? '') . ', ' . ($perusahaan->provinsi ?? 'Lengkapi Profil Anda') }}" readonly />
                </div>

                <div>
                    <label for="jenisDisabilitas">Kategori Disabilitas yang Sesuai</label>
                    <select id="jenisDisabilitas" name="jenisDisabilitas" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Semua Jenis Disabilitas" {{ old('jenisDisabilitas') == 'Semua Jenis Disabilitas' ? 'selected' : '' }}>Semua Jenis Disabilitas</option>
                        <option value="Tunadaksa" {{ old('jenisDisabilitas') == 'Tunadaksa' ? 'selected' : '' }}>Tunadaksa</option>
                        <option value="Tunanetra" {{ old('jenisDisabilitas') == 'Tunanetra' ? 'selected' : '' }}>Tunanetra</option>
                        <option value="Tunarungu" {{ old('jenisDisabilitas') == 'Tunarungu' ? 'selected' : '' }}>Tunarungu</option>
                        <option value="Tunagrahita" {{ old('jenisDisabilitas') == 'Tunagrahita' ? 'selected' : '' }}>Tunagrahita</option>
                        <option value="Tunalaras" {{ old('jenisDisabilitas') == 'Tunalaras' ? 'selected' : '' }}>Tunalaras</option>
                        <option value="Autisme/ADHD/ADD" {{ old('jenisDisabilitas') == 'Autisme/ADHD/ADD' ? 'selected' : '' }}>Autisme/ADHD/ADD</option>
                    </select>
                    @error('jenisDisabilitas') <p class="text-danger">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="tipe_pekerjaan">Tipe Pekerjaan</label>
                    <select id="tipe_pekerjaan" name="tipe_pekerjaan" required>
                        <option value="">-- Pilih Tipe --</option>
                        <option value="Penuh Waktu" {{ old('tipe_pekerjaan') == 'Penuh Waktu' ? 'selected' : '' }}>Penuh Waktu (Full-time)</option>
                        <option value="Paruh Waktu" {{ old('tipe_pekerjaan') == 'Paruh Waktu' ? 'selected' : '' }}>Paruh Waktu (Part-time)</option>
                        <option value="Magang" {{ old('tipe_pekerjaan') == 'Magang' ? 'selected' : '' }}>Magang (Internship)</option>
                        <option value="Kontrak" {{ old('tipe_pekerjaan') == 'Kontrak' ? 'selected' : '' }}>Kontrak (Contract)</option>
                        <option value="Lepas" {{ old('tipe_pekerjaan') == 'Lepas' ? 'selected' : '' }}>Lepas (Freelance)</option>
                    </select>
                    @error('tipe_pekerjaan') <p class="text-danger">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="status">Status Publikasi</label>
                    <select id="status" name="status" required>
                        <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif (Langsung dipublikasikan)</option>
                        <option value="Draft" {{ old('status') == 'Draft' ? 'selected' : '' }}>Draft (Simpan sebagai draf)</option>
                    </select>
                    @error('status') <p class="text-danger">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="btn-tambah">Simpan Lowongan</button>
            </form>
        </main>
    </div>

    {{-- JavaScript tidak lagi diperlukan untuk mengisi form, karena data diisi oleh Blade --}}
    {{-- Script untuk fungsi lain bisa diletakkan di sini jika ada --}}
</body>
</html>
