<!-- resources/views/profilperusahaan.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profil Perusahaan</title>
  <link rel="stylesheet" href="{{ secure_asset('css/dashboardperusahaan.css') }}">
</head>
<body>
  <div class="dashboard">
    <aside class="sidebar">
      <h2><a href="{{ route('dashboardperusahaan') }}">Kerja<span>Setara</span></a></h2>
      <nav>
        <a href="{{ route('profilperusahaan') }}" class="active">🏠 Profil Perusahaan</a>
        <a href="{{ route('lowonganperusahaan') }}">📄 Lowongan Saya</a>
        <a href="{{ route('buatlowongan') }}">➕ Buat Lowongan</a>
        <a href="{{ route('lamaran') }}">📨 Lamaran Masuk</a>

        <form id="logout-form" action="{{ route('logout.perusahaan') }}" method="POST" style="display: none;">
          @csrf
        </form>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">🚪 Keluar</a>
      </nav>
    </aside>

    <main class="main">
      <div class="header">
        <h1>Edit Profil Perusahaan</h1>
      </div>

      <form class="card" action="{{ route('profilperusahaan.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 1rem;">
          <label>Nama Perusahaan</label>
          <input type="text" name="nama_resmi_perusahaan" value="{{ old('nama_resmi_perusahaan', $profilPerusahaan->nama_resmi_perusahaan) }}" required>
        </div>

        <div style="margin-bottom: 1rem;">
          <label>Provinsi</label>
          <input type="text" name="provinsi" value="{{ old('provinsi', $profilPerusahaan->provinsi) }}">
        </div>

        <div style="margin-bottom: 1rem;">
          <label>Kota/Kabupaten</label>
          <input type="text" name="kota" value="{{ old('kota', $profilPerusahaan->kota) }}">
        </div>

        <div style="margin-bottom: 1rem;">
          <label>Alamat Lengkap</label>
          <textarea name="alamat_lengkap">{{ old('alamat_lengkap', $profilPerusahaan->alamat_lengkap) }}</textarea>
        </div>

        <div style="margin-bottom: 1rem;">
          <label>Kode Pos</label>
          <input type="text" name="kode_pos" value="{{ old('kode_pos', $profilPerusahaan->kode_pos) }}">
        </div>

        <div style="margin-bottom: 1rem;">
          <label>Bidang Usaha</label>
          <input type="text" name="bidang_usaha" value="{{ old('bidang_usaha', $profilPerusahaan->bidang_usaha) }}">
        </div>

        <div style="margin-bottom: 1rem;">
          <label>Email Perusahaan</label>
          <input type="email" name="email_perusahaan" value="{{ old('email_perusahaan', $profilPerusahaan->email_perusahaan) }}">
        </div>

        <div style="margin-bottom: 1rem;">
          <label>Telepon</label>
          <input type="text" name="telepon_perusahaan" value="{{ old('telepon_perusahaan', $profilPerusahaan->telepon_perusahaan) }}">
        </div>

        <div style="margin-bottom: 1rem;">
          <label>Website</label>
          <input type="url" name="website" value="{{ old('website', $profilPerusahaan->website) }}">
        </div>

        <div style="margin-bottom: 1rem;">
          <label>NPWP</label>
          <input type="text" name="npwp" value="{{ old('npwp', $profilPerusahaan->npwp) }}">
        </div>

        <div style="margin-bottom: 1rem;">
          <label>Deskripsi Perusahaan</label>
          <textarea name="deskripsi" rows="4">{{ old('deskripsi', $profilPerusahaan->deskripsi) }}</textarea>
        </div>

        <div style="margin-bottom: 1rem;">
          <label>Logo Perusahaan (Opsional)</label><br>
          @if ($profilPerusahaan->logo_path)
            <img src="{{ asset('storage/' . $profilPerusahaan->logo_path) }}" alt="Logo" style="max-width: 100px;"><br>
          @endif
          <input type="file" name="logo" accept="image/*">
        </div>

        <button type="submit" class="btn-primary">Simpan Profil</button>
      </form>
    </main>
  </div>
</body>
</html>
