<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Lowongan: {{ $lowongan->judul }}</title>
    <link rel="stylesheet" href="{{ secure_asset('css/kerjasetara.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        .detail-container { padding: 40px 0; }
        .detail-card { background: #fff; border-radius: 12px; padding: 30px 40px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        .detail-header h1 { font-size: 32px; font-weight: 700; margin-bottom: 10px; color: #212529; }
        .detail-header .company-name { font-size: 18px; color: #6c757d; margin-bottom: 30px; }
        .job-details-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 40px; }
        .job-description h3 { font-size: 20px; font-weight: 600; margin-bottom: 15px; border-bottom: 2px solid #e9ecef; padding-bottom: 10px; }
        .job-description p, .job-description ul { line-height: 1.7; white-space: pre-wrap; } /* pre-wrap menjaga format paragraf */
        .job-summary-card { background: #f8f9fa; border-radius: 8px; padding: 25px; }
        .job-summary-card h4 { font-size: 18px; margin-bottom: 20px; }
        .job-summary-card .info-item { display: flex; align-items: flex-start; gap: 15px; margin-bottom: 15px; }
        .job-summary-card .info-item i { font-size: 18px; color: #007bff; margin-top: 3px; }
        .apply-button-container { margin-top: 30px; }
        .btn-apply { display: inline-block; width: 100%; text-align: center; background-color: #28a745; color: #fff; padding: 15px; border-radius: 8px; font-size: 18px; font-weight: 600; text-decoration: none; border: none; cursor: pointer; transition: background-color 0.3s; }
        .btn-apply:hover { background-color: #218838; }
        .alert { padding: 15px; margin-bottom: 20px; border: 1px solid transparent; border-radius: .25rem; }
        .alert-success { color: #155724; background-color: #d4edda; border-color: #c3e6cb; }
        .alert-error { color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; }
    </style>
</head>
<body>
    {{-- Kode Header/Navigasi disalin dari dashboard_pelamar.blade.php --}}
    <header>
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    {{-- Logo bisa mengarah ke landing page atau dashboard pelamar --}}
                    <h1><a href="{{ Auth::check() && Auth::user()->role == 'pelamar' ? route('dashboard.pelamar') : route('kerjasetara') }}">Kerja<span>Setara</span></a></h1>
                </div>
                <ul class="nav-links">
                    <li><a href="#">Cari Lowongan</a></li>
                    @auth
                        <li><a href="#">Lamaran Saya</a></li>
                    @endauth
                    <li><a href="#">Tips Karir</a></li>
                </ul>
                <div class="user-actions">
                    @auth
                        <a href="#" class="btn btn-outline">Profil Saya</a>
                        <div class="avatar">
                            <span>{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="btn btn-primary">
                           Keluar
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline">Masuk</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <div class="container detail-container">
        {{-- Notifikasi --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        <div class="detail-card">
            <div class="detail-header">
                <h1>{{ $lowongan->judul }}</h1>
                <p class="company-name">di {{ $lowongan->perusahaan }}</p>
            </div>
            <div class="job-details-grid">
                <div class="job-description">
                    <h3>Deskripsi Pekerjaan</h3>
                    <p>{{ $lowongan->deskripsi }}</p>
                </div>
                <div class="job-summary">
                    <div class="job-summary-card">
                        <h4>Ringkasan Lowongan</h4>
                        <div class="info-item">
                            <i class="fas fa-briefcase"></i>
                            <div><strong>Tipe Pekerjaan</strong><br>{{ $lowongan->tipe_pekerjaan }}</div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div><strong>Lokasi</strong><br>{{ $lowongan->lokasi }}</div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-wheelchair"></i>
                            <div><strong>Kategori Disabilitas</strong><br>{{ $lowongan->jenisDisabilitas }}</div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-clock"></i>
                            <div><strong>Diposting</strong><br>{{ $lowongan->created_at->diffForHumans() }}</div>
                        </div>
                        
                        <div class="apply-button-container">
                            {{-- Form untuk melamar, hanya muncul jika user adalah pelamar --}}
                            @auth
                                @if(Auth::user()->role == 'pelamar')
                                    <form action="{{ route('lamaran.apply', $lowongan->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn-apply">Lamar Sekarang</button>
                                    </form>
                                @endif
                            @else
                                {{-- Jika belum login, arahkan ke halaman login --}}
                                <a href="{{ route('login') }}" class="btn-apply">Login untuk Melamar</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
