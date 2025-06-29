<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Lengkapi Profil - KerjaSetara</title>
  <link rel="stylesheet" href="{{ secure_asset('css/lengkapi.css') }}">
</head>
<body>
  <div class="container">
    <h2>2 / 2 - Lengkapi Profilmu</h2>

    <!-- Form action will post to a Laravel route -->
    <form action="{{ route('lengkapiprofil.submit') }}" method="POST">
      @csrf <!-- CSRF protection -->
      
      <div class="form-group">
        <label>Pekerjaan Sekarang</label>
        <input type="text" name="pekerjaan_sekarang" placeholder="Contoh: Staf Administrasi" required>
      </div>
      
      <div class="form-group">
        <label>Nama Perusahaan</label>
        <input type="text" name="nama_perusahaan" placeholder="Contoh: PT Maju Sejahtera" required>
      </div>
      
      <div class="form-group">
        <label>Tanggal Mulai</label>
        <input type="date" name="tanggal_mulai" required>
      </div>
      
      <div class="form-group">
        <label>Tanggal Selesai</label>
        <input type="date" name="tanggal_selesai" required>
      </div>
      
      <div class="form-group">
        <label>Provinsi</label>
        <select name="provinsi" required>
          <option value="">Pilih Provinsi</option>
          <option>DKI Jakarta</option>
          <option>Jawa Barat</option>
          <option>Jawa Tengah</option>
          <option>Jawa Timur</option>
        </select>
      </div>

      <div class="form-group">
        <label>Jenis Hambatan/Disabilitas</label>
        <div id="disabilityContainer" class="checkbox-list"></div>
      </div>

      <div class="form-group">
        <label>Detail hambatan yang dialami</label>
        <textarea name="detail_hambatan" placeholder="Ceritakan hambatanmu dengan singkat" rows="4" required></textarea>
      </div>

      <div class="form-group">
        <label>Nomor Telepon</label>
        <input type="tel" name="nomor_telepon" placeholder="Contoh: 081234567890" required>
      </div>

      <div class="form-group">
        <label>Alat bantu yang digunakan (jika ada)</label>
        <input type="text" name="alat_bantu">
      </div>

      <div class="form-footer">
        <button type="button" class="btn" onclick="window.history.back()">Kembali</button>
        <button type="submit" class="btn">Daftar</button>
      </div>
    </form>
  </div>

  <script>
    // JavaScript code to dynamically add disability options remains here
  </script>
</body>
</html>
