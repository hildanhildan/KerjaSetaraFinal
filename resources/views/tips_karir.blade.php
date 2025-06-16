<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tips Karir - KerjaSetara</title>
    <link rel="stylesheet" href="{{ asset('css/kerjasetara.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    {{-- Logo mengarah ke landing page jika belum login, atau ke dashboard jika sudah --}}
                    <h1><a href="{{ auth()->check() ? (auth()->user()->role == 'pelamar' ? route('dashboard.pelamar') : route('dashboardperusahaan')) : route('kerjasetara') }}">Kerja<span>Setara</span></a></h1>
                </div>
                <ul class="nav-links">
                    {{-- Tampilkan link yang relevan --}}
                    <li><a href="#">Cari Lowongan</a></li>
                    @if(auth()->check() && auth()->user()->role == 'pelamar')
                        <li><a href="{{ route('lamaran.riwayat') }}">Lamaran Saya</a></li>
                    @endif
                    <li><a href="{{ route('tips') }}" class="active">Tips Karir</a></li>
                </ul>
                <div class="user-actions">
                    @guest
                        {{-- Tampilan untuk pengunjung yang belum login --}}
                        <a href="{{ route('login') }}" class="btn btn-outline">Masuk</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                    @else
                        {{-- Tampilan untuk pengguna yang sudah login --}}
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
                    @endguest
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <section style="padding: 50px 0;">
                <div class="section-header" style="text-align: center; display: block;">
                    <h3>Temukan Wawasan untuk Karir Impian Anda</h3>
                    <p style="margin-top: 10px; color: #6c757d;">Kumpulan artikel dan tips untuk membantu perjalanan karir Anda.</p>
                </div>
                
                <div class="job-container" style="margin-top: 40px;">
                    @forelse ($tips as $tip)
                        <div class="job-card">
                            <div class="job-header">
                                <img src="{{ $tip->gambar_url }}" alt="Gambar Artikel" class="job-image">
                            </div>
                            <div class="job-content">
                                <div class="company-name">{{ $tip->sumber }}</div>
                                <h3 class="job-title" style="min-height: 80px;">{{ $tip->judul }}</h3>
                                <div class="job-footer">
                                    <a href="{{ $tip->link }}" target="_blank" rel="noopener noreferrer" class="more-link">Baca Selengkapnya &rarr;</a>
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
