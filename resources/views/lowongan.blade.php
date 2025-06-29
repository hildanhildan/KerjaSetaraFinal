<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lowongan Kerja</title>
    <!-- Hapus salah satu dari dua CDN berikut -->
    <!-- <link rel="stylesheet" href="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ secure_asset('css/stylelow.css') }}">
</head>
<body>

    <header>
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <h1><a href="{{ route('kerjasetara') }}">Kerja<span>Setara</span></a></h1>
                </div>
                <ul class="nav-links">
                    <li><a href="{{ route('lowongan') }}" class="active">Cari Lowongan</a></li> <!-- Aktif di sini -->
                    <li><a href="{{ route('daftarperusahaan') }}">Daftar Perusahaan</a></li>
                    <li><a href="{{ route('tips') }}">Tips Karir</a></li>
                    <li><a href="{{ route('penyedia') }}">Penyedia Kerja</a></li>
                </ul>
                <div class="user-actions">
                    <a href="{{ route('masuk') }}" class="btn btn-outline">Masuk</a>
                    <a href="{{ route('daftar') }}" class="btn btn-primary">Daftar</a>
                    <div class="avatar"></div>
                </div>
            </div>
        </div>
    </header>

    <section class="job-container">
        <div class="job-card">
            <div class="job-header">
                <img src="{{ asset('images/close-up-hand-moving-wheel.jpg') }}" alt="Person in wheelchair" class="job-image">
            </div>
            
            <div class="job-content">
                <div class="company-name">MILENIALS RADIO</div>
                
                <h2 class="job-title">Producer On Air INTERN</h2>
                
                <div class="job-info">
                    <div class="job-category">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span>Editing, Media Dan Informasi</span>
                    </div>
                    
                    <div class="job-disability">
                        <i class="fa-solid fa-wheelchair"></i>
                        <span>Beberapa Jenis Disabilitas</span>
                    </div>
                    
                    <div class="job-location">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Tangerang (Kabupaten) - Banten</span>
                    </div>
                </div>
                
                <div class="job-footer">
                    <div class="deadline">Tutup: 1 minggu lagi!</div>
                    <button class="favorite-btn" onclick="toggleFavorite(this)">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                
                <a href="{{ route('detail-lowongan') }}" class="more-link">SELENGKAPNYA <i class="fas fa-angle-right"></i></a>
            </div>
        </div>
        
        <div class="job-card">
            <div class="job-header">
                <img src="{{ asset('images/close-up-hand-moving-wheel.jpg') }}" alt="Person in wheelchair" class="job-image">
            </div>
            
            <div class="job-content">
                <div class="company-name">MILENIALS RADIO</div>
                
                <h2 class="job-title">Producer On Air INTERN</h2>
                
                <div class="job-info">
                    <div class="job-category">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span>Editing, Media Dan Informasi</span>
                    </div>
                    
                    <div class="job-disability">
                        <i class="fa-solid fa-wheelchair"></i>
                        <span>Beberapa Jenis Disabilitas</span>
                    </div>
                    
                    <div class="job-location">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Tangerang (Kabupaten) - Banten</span>
                    </div>
                </div>
                
                <div class="job-footer">
                    <div class="deadline">Tutup: 1 minggu lagi!</div>
                    <button class="favorite-btn" onclick="toggleFavorite(this)">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                
                <a href="{{ route('detail-lowongan') }}" class="more-link">SELENGKAPNYA <i class="fas fa-angle-right"></i></a>
            </div>
        </div>
    </section>

</body>
</html>
