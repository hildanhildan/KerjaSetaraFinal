<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Lowongan</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="{{ asset('css/dashboardperusahaan.css') }}">
</head>
<body>
  <div class="dashboard">
    <aside class="sidebar">
      <h2><a href="{{ route('dashboardperusahaan') }}">Kerja<span>Setara</span></a></h2>
      <nav>
        <a href="{{ route('profilperusahaan') }}" class="{{ request()->routeIs('profilperusahaan') ? 'active' : '' }}">🏠 Profil Perusahaan</a>
        <a href="{{ route('lowonganperusahaan') }}" class="{{ request()->routeIs('lowonganperusahaan') ? 'active' : '' }}">📄 Lowongan Saya</a>
        <a href="{{ route('buatlowongan') }}" class="{{ request()->routeIs('buatlowongan') ? 'active' : '' }}">➕ Buat Lowongan</a>
        <a href="{{ route('lamaran') }}" class="{{ request()->routeIs('lamaran') ? 'active' : '' }}">📨 Lamaran Masuk</a>

        <!-- Logout POST -->
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
        <h1>Edit Lowongan</h1>
      </div>

      <!-- Form Update -->
      <form class="card" method="POST" action="{{ route('updateLowongan', ['id' => $lowongan->id]) }}">
        @csrf
        @method('PUT')
        
        <div style="margin-bottom: 1rem;">
          <label for="judul">Judul Lowongan</label>
          <input type="text" id="judul" name="judul" value="{{ $lowongan->judul }}" class="form-input" required />
        </div>

        <div style="margin-bottom: 1rem;">
          <label for="perusahaan">Perusahaan</label>
          <input type="text" id="perusahaan" name="perusahaan" value="{{ $lowongan->perusahaan }}" class="form-input" required />
        </div>

        <div style="margin-bottom: 1rem;">
          <label for="lokasi">Lokasi</label>
          <input type="text" id="lokasi" name="lokasi" value="{{ $lowongan->lokasi }}" class="form-input" required />
        </div>

        <div style="margin-bottom: 1rem;">
          <label for="jenisDisabilitas">Jenis Disabilitas</label>
          <input type="text" id="jenisDisabilitas" name="jenisDisabilitas" value="{{ $lowongan->jenisDisabilitas }}" class="form-input" required />
        </div>

        <div style="margin-bottom: 1rem;">
          <label for="status">Status</label>
          <input type="text" id="status" name="status" value="{{ $lowongan->status }}" class="form-input" required />
        </div>

        <div style="margin-bottom: 1rem;">
          <label for="pelamar">Jumlah Pelamar</label>
          <input type="number" id="pelamar" name="pelamar" value="{{ $lowongan->pelamar }}" class="form-input" required />
        </div>

        <button type="submit" class="btn-primary"> Perbarui Lowongan</button>
      </form>

      <!-- Form Delete (Pisah dari form update) -->
      <form method="POST" action="{{ route('hapusLowongan', ['id' => $lowongan->id]) }}" onsubmit="return confirm('Yakin ingin menghapus lowongan ini?');" style="margin-top: 1rem;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-danger"> Hapus Lowongan</button>
      </form>
    </main>
  </div>
</body>
</html>
