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
      <h2><a href="dashboardperusahaan.html">Kerja<span>Setara</span></a></h2>
      <nav>
        <a href="profilperusahaan.html">🏠 Profil Perusahaan</a>
        <a href="lowonganperusahaan.html">📄 Lowongan Saya</a>
        <a href="buatlowongan.html">➕ Buat Lowongan</a>
        <a href="lamaran.html" class="active">📨 Lamaran Masuk</a>
        <a href="pengaturan.html">⚙️ Pengaturan</a>
        <a href="#">🚪 Keluar</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="main">
      <div class="header">
        <h1>Lamaran Masuk</h1>
      </div>

      <!-- Card Lamaran -->
      <div class="job-cards">
        <div class="job-card">
          <h3>Nama: Budi Santoso</h3>
          <p><strong>Nama Belakang:</strong> Santoso</p>
          <p><strong>Tanggal Mulai:</strong> 2023-01-01</p>
          <p><strong>Tanggal Selesai:</strong> 2023-12-31</p>
          <p><strong>Provinsi:</strong> Jawa Barat</p>
          <p><strong>Jenis Hambatan:</strong> Tuna Daksa</p>
          <p><strong>Detail Hambatan:</strong> Hambatan fisik pada bagian kaki kanan</p>
          <p><strong>Nomor Telepon:</strong> 081234567890</p>
          <p><strong>Alat Bantu:</strong> Kaki Palsu</p>
          <p><strong>Jenis Kelamin:</strong> Laki-laki</p>
          <p><strong>Email:</strong> budi@example.com</p>
          <p><strong>Password:</strong> *********</p>
          <p><strong>Ketentuan Disabilitas:</strong> Sesuai UU No.8 Tahun 2016</p>
          <p><strong>Pekerjaan Sekarang:</strong> Freelance Designer</p>
          <p><strong>Nama Perusahaan:</strong> PT Inklusif Maju</p>

          <div class="job-actions">
            <button class="btn-detail" onclick="terimaLamaran(this)">Terima</button>
            <button class="btn-edit" onclick="tolakLamaran(this)">Tolak</button>
          </div>
        </div>

        <!-- Duplikat card ini untuk setiap pelamar -->
        <!-- Bisa di-loop dengan JS atau server-side nanti -->
      </div>
    </main>
  </div>

  <script>
    function terimaLamaran(button) {
      const card = button.closest('.job-card');
      card.style.border = '2px solid green';
      card.style.opacity = '0.7';
      alert("Lamaran diterima!");
    }
  
    function tolakLamaran(button) {
      const card = button.closest('.job-card');
      card.style.border = '2px solid red';
      card.style.opacity = '0.7';
      alert("Lamaran ditolak.");
    }
  </script>
  
</body>
</html>
