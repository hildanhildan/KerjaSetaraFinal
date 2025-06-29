<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Lamaran Masuk</title>
  <link rel="stylesheet" href="{{ secure_asset('css/dashboardperusahaan.css') }}">
</head>
<body>
  <div class="dashboard">
    <!-- Sidebar -->
    <aside class="sidebar">
      <h2><a href="{{ route('dashboardperusahaan') }}">Kerja<span>Setara</span></a></h2>
      <nav>
        <a href="{{ route('profilperusahaan') }}">🏠 Profil Perusahaan</a>
        <a href="{{ route('lowonganperusahaan') }}">📄 Lowongan Saya</a>
        <a href="{{ route('buatlowongan') }}">➕ Buat Lowongan</a>
        <a href="{{ route('lamaran') }}" class="active">📨 Lamaran Masuk</a>
        <a href="{{ route('dashboardperusahaan') }}">⚙️ Pengaturan</a>

        <!-- Link Logout sebagai tombol POST -->
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
        <h1>Lamaran Masuk</h1>
      </div>

      <!-- Notifikasi -->
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif

      <!-- Card Lamaran -->

    </main>
  </div>
</body>
</html>
