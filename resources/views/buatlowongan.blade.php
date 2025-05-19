<!DOCTYPE html> 
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Buat Lowongan - JobInklusif</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="{{ asset('css/dashboardperusahaan.css') }}">
</head>
<body>
  <div class="dashboard">
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

    <main class="main">
      <div class="header">
        <h1>Buat Lowongan Pekerjaan</h1>
      </div>

      <form action="{{ route('lowongan.store') }}" method="POST" class="form-lowongan" id="formLowongan">
        @csrf
        <label for="judul">Judul Pekerjaan</label>
        <input type="text" id="judul" name="judul" required />

        <label for="perusahaan">Nama Perusahaan</label>
        <input type="text" id="perusahaan" name="perusahaan" value="{{ auth()->user()->nama_perusahaan ?? '' }}" readonly />

        <label for="jenisDisabilitas">Jenis Disabilitas</label>
        <select id="jenisDisabilitas" name="jenisDisabilitas" required>
          <option value="">-- Pilih --</option>
          <option value="Tunadaksa">Tunadaksa</option>
          <option value="Tunanetra">Tunanetra</option>
          <option value="Tunarungu">Tunarungu</option>
          <option value="Tunagrahita">Tunagrahita</option>
          <option value="Tunalaras">Tunalaras</option>
          <option value="Autism-ADD-ADHD">Autism-ADD-ADHD</option>
        </select>

        <label for="lokasi">Lokasi</label>
        <input type="text" id="lokasi" name="lokasi" value="{{ auth()->user()->lokasi ?? '' }}" readonly />

        <label for="status">Status</label>
        <select id="status" name="status" required>
          <option value="Aktif">Aktif</option>
          <option value="Ditutup">Ditutup</option>
        </select>

        <button type="submit" class="btn-tambah">Simpan Lowongan</button>
      </form>

      <!-- Notifikasi -->
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif
    </main>
  </div>

  <script>
    window.addEventListener("load", () => {
      const profil = JSON.parse(sessionStorage.getItem("profilPerusahaan"));
      if (profil) {
        if (profil.nama) {
          document.getElementById("perusahaan").value = profil.nama;
        }

        if (profil.kota && profil.provinsi) {
          const namaProvinsi = {
            jatim: "Jawa Timur",
            jateng: "Jawa Tengah",
            jabar: "Jawa Barat",
            jakarta: "Jakarta"
          };
          const provinsiFull = namaProvinsi[profil.provinsi] || profil.provinsi;
          const lokasi = `${capitalizeWords(profil.kota.replace(/-/g, " "))}, ${provinsiFull}`;
          document.getElementById("lokasi").value = lokasi;
        }
      }
    });

    function capitalizeWords(str) {
      return str.replace(/\b\w/g, c => c.toUpperCase());
    }
  </script>
</body>
</html>
