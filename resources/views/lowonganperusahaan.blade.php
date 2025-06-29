<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Lowongan Perusahaan - JobInklusif</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="{{ secure_asset('css/dashboardperusahaan.css') }}">
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
        <h1>Lowongan Pekerjaan</h1>
        <a href="{{ route('buatlowongan') }}" class="btn-tambah">Tambahkan Lowongan</a>
      </div>
        <section class="job-cards">
          @forelse($lowongans as $l)
            <div class="job-card">
              <h3>{{ $l->judul }} - Ramah {{ $l->jenisDisabilitas }}</h3>
              <p><strong>Perusahaan:</strong> {{ $l->perusahaan }}</p>
              <p><strong>Lokasi:</strong> {{ $l->lokasi }}</p>
              <p><strong>Status:</strong> {{ $l->status }}</p>
              <p><strong>Pelamar:</strong> {{ $l->pelamar }}</p>
              <div class="job-actions">
                <a href="{{ route('lowongan.edit', $l->id) }}" class="btn-edit">Edit</a>
              </div>
            </div>
          @empty
            <p>Belum ada lowongan yang ditambahkan.</p>
          @endforelse
        </section>
    </main>
  </div>

  <script>
    const container = document.getElementById("jobCardsContainer");
    const daftarLowongan = JSON.parse(sessionStorage.getItem("daftarLowongan") || "[]");

    if (daftarLowongan.length === 0) {
      container.innerHTML = "<p>Belum ada lowongan yang ditambahkan.</p>";
    } else {
      container.innerHTML = daftarLowongan.map(l => `
        <div class="job-card">
          <h3>${l.judul} - Ramah ${l.jenisDisabilitas}</h3>
          <p><strong>Perusahaan:</strong> ${l.perusahaan}</p>
          <p><strong>Lokasi:</strong> ${l.lokasi}</p>
          <p><strong>Jenis Disabilitas:</strong> ${l.jenisDisabilitas}</p>
          <p><strong>Status:</strong> ${l.status || 'Aktif'}</p>
          <p><strong>Pelamar:</strong> ${l.pelamar || 0} orang</p>
          <div class="job-actions">
            <a href="#" class="btn-detail">Lihat Detail</a>
            <!-- Membuat URL untuk Edit Lowongan dengan ID -->
            <a href="/editlowongan/${l.id}" class="btn-edit">Edit</a>
          </div>
        </div>
      `).join("");
    }
  </script>
</body>
</html>
