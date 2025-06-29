<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KerjaSetara - Portal Lowongan Kerja Inklusif</title>
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
                    <h1><a href="{{ route('kerjasetara') }}">Kerja<span>Setara</span></a></h1>
                </div>
                <ul class="nav-links">
                    <li><a href="{{ route('lowongan') }}">Cari Lowongan</a></li>
                    <li><a href="{{ route('daftarperusahaan') }}">Daftar Perusahaan</a></li>
                    <li><a href="{{ route('tips') }}">Tips Karir</a></li>
                </ul>
                <div class="user-actions">
                    <a href="{{ route('penyedia') }}" style="margin-right: 15px; font-weight: 600; color: #495057; text-decoration:none;">Penyedia Kerja</a>
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-outline">Masuk</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                    @else
                        <a href="{{ Auth::user()->role == 'pelamar' ? route('dashboard.pelamar') : route('dashboardperusahaan') }}" class="btn btn-primary">Dashboard</a>
                    @endguest
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
                    <h2>Cari Lowongan Berdasarkan Keunikanmu</h2>
                    <p>Apapun masalahmu, pasti ada solusi. Temukan peluang karir inklusif di sini.</p>
                    <form action="{{ route('lowongan') }}" method="GET">
                        <div class="search-box">
                            <input type="text" name="q" placeholder="Ketik posisi, perusahaan, atau keahlian...">
                            <button type="submit">Cari Lowongan</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        {{-- Content Section --}}
        <div class="container">
            <!-- Lowongan Terbaru -->
            <section>
                <div class="section-header">
                    <h3>Lowongan Terbaru</h3>
                    <a href="{{ route('lowongan') }}">Lihat Semua &rarr;</a>
                </div>
                
                <div class="job-container">
                    @forelse($lowongans as $lowongan)
                        <div class="job-card">
                            <div class="job-header">
                                <img src="https://placehold.co/600x400/563D7C/ffffff?text={{ urlencode($lowongan->perusahaan) }}" alt="Logo Perusahaan" class="job-image">
                            </div>
                            <div class="job-content">
                                <div class="company-name">{{ $lowongan->perusahaan }}</div>
                                <h3 class="job-title">{{ $lowongan->judul }}</h3>
                                <div class="job-info">
                                    <div><i class="fas fa-briefcase"></i><span>{{ $lowongan->tipe_pekerjaan }}</span></div>
                                    <div><i class="fas fa-wheelchair"></i><span>{{ $lowongan->jenisDisabilitas }}</span></div>
                                    <div><i class="fas fa-map-marker-alt"></i><span>{{ $lowongan->lokasi }}</span></div>
                                </div>
                                <div class="job-footer">
                                    <span class="deadline">Diposting: {{ $lowongan->created_at->diffForHumans() }}</span>
                                    <a href="{{ route('lowongan.show', $lowongan->id) }}" class="more-link">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Saat ini belum ada lowongan terbaru.</p>
                    @endforelse
                </div>
            </section>

            <!-- Tips Karir -->
            <section>
                <div class="section-header">
                    <h3>Tips Karir</h3>
                    <a href="{{ route('tips') }}">Lihat Semua &rarr;</a>
                </div>
                
                <div class="tips-container">
                    @forelse ($tips as $tip)
                        <div class="tip-card">
                            <div class="tip-image">
                                <img src="{{ $tip->gambar_url }}" alt="Gambar Artikel" class="job-image">
                            </div>
                            <div class="tip-content">
                                <div class="tip-source">{{ $tip->sumber }}</div>
                                <h3 class="tip-title">{{ Str::limit($tip->judul, 70) }}</h3>
                                <div class="tip-footer">
                                    <a href="{{ $tip->link }}" target="_blank" rel="noopener noreferrer" class="read-more">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Belum ada tips karir yang ditambahkan.</p>
                    @endforelse
                </div>
            </section>
        </div>
    </main>
</body>
</html>
