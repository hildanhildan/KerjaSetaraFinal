<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profil Perusahaan</title>
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
        <h1 id="form-title">Profil Perusahaan</h1>
      </div>

      <form class="card" id="profile-form" style="max-width: 100000px;">
        <div style="margin-bottom: 1rem;">
          <label for="nama" style="display: block; margin-bottom: 0.5rem;">Nama Perusahaan</label>
          <input type="text" id="nama" name="nama" class="form-input" placeholder="Contoh: PT Inklusif Jaya" required />
        </div>

        <div style="margin-bottom: 1rem;">
          <label for="provinsi" style="display: block; margin-bottom: 0.5rem;">Provinsi</label>
          <select id="provinsi" name="provinsi" class="form-input" required>
            <option value="">-- Pilih Provinsi --</option>
            <option value="jatim">Jawa Timur</option>
            <option value="jateng">Jawa Tengah</option>
            <option value="jabar">Jawa Barat</option>
            <option value="jakarta">Jakarta</option>
          </select>
        </div>

        <div style="margin-bottom: 1rem;">
          <label for="kota" style="display: block; margin-bottom: 0.5rem;">Kota/Kabupaten</label>
          <select id="kota" name="kota" class="form-input" required>
            <option value="">-- Pilih Kota/Kabupaten --</option>
          </select>
        </div>

        <div style="margin-bottom: 1rem;">
          <label for="sektor" style="display: block; margin-bottom: 0.5rem;">Sektor Perusahaan</label>
          <select id="sektor" name="sektor" class="form-input" required>
            <option value="">-- Pilih Sektor --</option>
            <option value="it">Teknologi Informasi</option>
            <option value="retail">Retail</option>
            <option value="pelayanan">Pelayanan Pelanggan</option>
          </select>
        </div>

        <div style="margin-bottom: 1rem;">
          <label for="email" style="display: block; margin-bottom: 0.5rem;">Email Perusahaan</label>
          <input type="email" id="email" name="email" class="form-input" placeholder="email@perusahaan.com" required />
        </div>

        <div style="margin-bottom: 1rem;">
          <label for="telepon" style="display: block; margin-bottom: 0.5rem;">Telepon</label>
          <input type="text" id="telepon" name="telepon" class="form-input" placeholder="08123456789" required />
        </div>

        <div style="margin-bottom: 1rem;">
          <label for="deskripsi" style="display: block; margin-bottom: 0.5rem;">Deskripsi Perusahaan</label>
          <textarea id="deskripsi" name="deskripsi" class="form-input" rows="4" placeholder="Ceritakan secara singkat tentang perusahaan Anda..." required></textarea>
        </div>

        <button type="submit" id="submit-btn" class="btn-primary">Simpan Profil</button>
      </form>
    </main>
  </div>

  <script>
    const kotaOptions = {
      jatim: ['Surabaya', 'Malang', 'Kediri', 'Bojonegoro', 'Jombang'],
      jabar: ['Bandung', 'Bekasi', 'Bogor', 'Depok'],
      jateng: ['Batang', 'Kajen', 'Klaten', 'Purbalingga', 'Purwokerto', 'Solo'],
      jakarta: ['Jakarta Timur', 'Jakarta Utara', 'Jakarta Selatan', 'Jakarta Pusat', 'Jakarta Barat']
    };
  
    const provinsiSelect = document.getElementById('provinsi');
    const kotaSelect = document.getElementById('kota');
  
    provinsiSelect.addEventListener('change', function () {
      const selectedProvinsi = this.value;
      const kotaList = kotaOptions[selectedProvinsi] || [];
  
      kotaSelect.innerHTML = '<option value="">-- Pilih Kota/Kabupaten --</option>';
      kotaList.forEach(kota => {
        const option = document.createElement('option');
        option.value = kota.toLowerCase().replace(/\s+/g, '-');
        option.textContent = kota;
        kotaSelect.appendChild(option);
      });
    });
  
    const form = document.getElementById('profile-form');
    const submitBtn = document.getElementById('submit-btn');
    const formTitle = document.getElementById('form-title');
  
    form.addEventListener('submit', function (e) {
      e.preventDefault();
  
      const savedData = {
        nama: document.getElementById('nama').value,
        provinsi: document.getElementById('provinsi').value,
        kota: document.getElementById('kota').value,
        sektor: document.getElementById('sektor').value,
        email: document.getElementById('email').value,
        telepon: document.getElementById('telepon').value,
        deskripsi: document.getElementById('deskripsi').value
      };
  
      // Simpan ke sessionStorage
      sessionStorage.setItem('profilPerusahaan', JSON.stringify(savedData));
  
      formTitle.textContent = 'Edit Profil Perusahaan';
      submitBtn.textContent = 'Perbarui Profil';
  
      alert('Data berhasil disimpan!');
    });
  
    // Saat reload halaman, cek sessionStorage
    window.addEventListener('load', () => {
      const stored = sessionStorage.getItem('profilPerusahaan');
      if (stored) {
        const savedData = JSON.parse(stored);
  
        document.getElementById('nama').value = savedData.nama;
        document.getElementById('provinsi').value = savedData.provinsi;
        provinsiSelect.dispatchEvent(new Event('change')); // isi kota
        document.getElementById('kota').value = savedData.kota;
        document.getElementById('sektor').value = savedData.sektor;
        document.getElementById('email').value = savedData.email;
        document.getElementById('telepon').value = savedData.telepon;
        document.getElementById('deskripsi').value = savedData.deskripsi;
  
        formTitle.textContent = 'Edit Profil Perusahaan';
        submitBtn.textContent = 'Perbarui Profil';
      }
    });
  </script>
  
</body>
</html>
