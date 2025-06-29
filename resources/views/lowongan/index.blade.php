<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Lowongan - KerjaSetara</title>
    <link rel="stylesheet" href="{{ secure_asset('css/kerjasetara.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .search-hero { padding: 4rem 0; background-color: #007bff; color: #fff; text-align: center; }
        .pagination-container { margin-top: 2rem; display: flex; justify-content: center; }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <h1><a href="{{ route('kerjasetara') }}">Kerja<span>Setara</span></a></h1>
                </div>
                <ul class="nav-links">
                    <li><a href="{{ route('lowongan') }}" class="active">Cari Lowongan</a></li>
                    <li><a href="{{ route('daftarperusahaan') }}">Daftar Perusahaan</a></li>
                    <li><a href="{{ route('tips') }}">Tips Karir</a></li>
                </ul>
                <div class="user-actions">
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-outline">Masuk</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                    @else
                        <a href="{{ Auth::user()->role == 'pelamar' ? route('dashboard.pelamar') : route('dashboardperusahaan') }}" class="btn btn-outline">Dashboard</a>
                    @endguest
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="search-hero">
            <div class="container">
                <div class="hero-content">
                    <h2>Temukan Pekerjaan Impian Anda</h2>
                    <p>Jelajahi ribuan lowongan kerja inklusif di seluruh Indonesia.</p>
                    <form action="{{ route('lowongan') }}" method="GET">
                        <div class="search-box" style="margin-top: 2rem;">
                            <input type="text" name="q" placeholder="Ketik posisi atau perusahaan..." value="{{ request('q') }}">
                            <button type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <div class="container">
            <section style="padding: 50px 0;">
                <div class="section-header">
                    <h3>Menampilkan Hasil Pencarian</h3>
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
                        <p>Tidak ada lowongan yang ditemukan dengan kriteria Anda.</p>
                    @endforelse
                </div>
                
                <div class="pagination-container">
                    {{ $lowongans->links() }}
                </div>
            </section>
        </div>
    </main>
</body>
</html>
