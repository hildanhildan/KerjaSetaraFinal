<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelamar - KerjaSetara</title>
    {{-- Memuat Font Awesome untuk ikon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    {{-- Memuat file CSS utama dari folder public --}}
    <link rel="stylesheet" href="{{ secure_asset('css/kerjasetara.css') }}">
    {{-- Font Google --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    {{-- Logo mengarah ke dashboard pelamar --}}
                    <h1><a href="{{ route('dashboard.pelamar') }}">Kerja<span>Setara</span></a></h1>
                </div>
                <ul class="nav-links">
                    {{-- Navigasi untuk Pelamar --}}
                    <li><a href="#">Cari Lowongan</a></li>
                    <li><a href="{{ route('lamaran.riwayat') }}">Lamaran Saya</a></li>
                    <li><a href="{{ route('tips') }}">Tips Karir</a></li> 
                </ul>
                <div class="user-actions">
                    {{-- Tampilkan tombol Profil dan Logout karena pengguna sudah login --}}
                    @auth
                        <a href="#" class="btn btn-outline">Profil Saya</a>

                        <div class="avatar">
                            {{-- Menampilkan inisial nama pengguna --}}
                            <span>{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                        </div>

                        {{-- Form Logout --}}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="btn btn-primary">
                           Keluar
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main>
        {{-- Hero Section --}}
        <section class="hero">
            <div class="hero-background"></div>
            <div class="container">
                <div class="hero-content">
                    {{-- Menyapa pengguna yang login --}}
                    <h2>Selamat Datang Kembali, {{ Auth::user()->name }}!</h2>
                    <p>Temukan peluang karir inklusif yang menantimu di sini.</p>
                    <div class="search-box">
                        <input type="text" placeholder="Ketik posisi, perusahaan, atau keahlian...">
                        <button type="submit">Cari Lowongan</button>
                    </div>
                </div>
            </div>
        </section>

        {{-- Content Section --}}
        <div class="container">
            <section>
                <div class="section-header">
                    <h3>Rekomendasi Lowongan Untuk Anda</h3>
                    <a href="#">Lihat Semua &rarr;</a>
                </div>
                
                <div class="job-container">
                    {{-- Loop melalui setiap lowongan yang dikirim dari controller --}}
                    @forelse($lowongans as $lowongan)
                        <div class="job-card">
                            <div class="job-header">
                                {{-- Gunakan placeholder jika tidak ada gambar --}}
                                <img src="https://placehold.co/600x400/563D7C/ffffff?text={{ urlencode($lowongan->perusahaan) }}" alt="Logo Perusahaan" class="job-image">
                            </div>
                            <div class="job-content">
                                <div class="company-name">{{ $lowongan->perusahaan }}</div>
                                <h3 class="job-title">{{ $lowongan->judul }}</h3>
                                <div class="job-info">
                                    {{-- Menampilkan data dari kolom yang sesuai --}}
                                    <div><i class="fas fa-briefcase"></i><span>{{ $lowongan->tipe_pekerjaan }}</span></div>
                                    <div><i class="fas fa-wheelchair"></i><span>{{ $lowongan->jenisDisabilitas }}</span></div>
                                    <div><i class="fas fa-map-marker-alt"></i><span>{{ $lowongan->lokasi }}</span></div>
                                </div>
                                <div class="job-footer">
                                    {{-- Menampilkan kapan lowongan dibuat --}}
                                    <span class="deadline">Diposting: {{ $lowongan->created_at->diffForHumans() }}</span>
                                    <a href="{{ route('lowongan.show', $lowongan->id) }}" class="more-link">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        {{-- Tampilkan pesan ini jika tidak ada lowongan aktif --}}
                        <p>Saat ini belum ada lowongan yang tersedia. Silakan cek kembali nanti.</p>
                    @endforelse
                </div>
            </section>
        </div>
    </main>
</body>
</html>
