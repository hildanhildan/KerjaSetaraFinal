<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lowongan Kerja</title>
    <!-- Hapus salah satu dari dua CDN berikut -->
    <!-- <link rel="stylesheet" href="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/dp.css') }}">
</head>
<body>

    <header>
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <h1><a href="{{ url('/kerjasetara') }}">Kerja<span>Setara</span></a></h1>
                </div>
                <ul class="nav-links">
                    <li><a href="{{ url('/lowongan') }}" >Cari Lowongan</a></li> 
                    <li><a href="{{ url('/daftarperusahaan') }}">Daftar Perusahaan</a></li>
                    <li><a href="{{ url('/tips') }}" class="active">Tips Karir</a></li>
                    <li><a href="{{ url('/penyedia') }}">Penyedia Kerja</a></li>
                </ul>
                <div class="user-actions">
                    <a href="{{ url('/masuk') }}" class="btn btn-outline">Masuk</a>
                    <a href="{{ url('/daftar') }}" class="btn btn-primary">Daftar</a>
                    <div class="avatar"></div>
                </div>
            </div>
        </div>
    </header>

    <section class="tips-container">
        <div class="tips-cards">       
    
            <div class="tips-cards">
                <div class="tip-card">
                    <div class="tip-image">
                        <img src="close-up-hand-moving-wheel.jpg" alt="Job Fair Tips">
                    </div>
                    <div class="tip-content">
                        <h4 class="tip-title">Bekal yang Harus Dibawa Sebelum ke Job Fair</h4>
                        <div class="tip-actions">
                            <a href="#" class="read-more">SELENGKAPNYA</a>
                            <button class="share-btn" onclick="shareContent()"><i class="fas fa-share-alt"></i></button>
                        </div>
                    </div>
                </div>

                <div class="tip-card">
                    <div class="tip-image">
                        <img src="close-up-hand-moving-wheel.jpg" alt="Accessibility Tips">
                    </div>
                    <div class="tip-content">
                        <h4 class="tip-title">Maksimalkan Akhir Minggumu untuk Memaksimalkan Pekerjaanmu</h4>
                        <div class="tip-actions">
                            <a href="#" class="read-more">SELENGKAPNYA</a>
                            <button class="share-btn" onclick="shareContent()"><i class="fas fa-share-alt"></i></button>
                        </div>
                    </div>
                </div>

                <div class="tip-card">
                    <div class="tip-image">
                        <img src="close-up-hand-moving-wheel.jpg" alt="Job Fair Tips">
                    </div>
                    <div class="tip-content">
                        <h4 class="tip-title">Bekal yang Harus Dibawa Sebelum ke Job Fair</h4>
                        <div class="tip-actions">
                            <a href="#" class="read-more">SELENGKAPNYA</a>
                            <button class="share-btn" onclick="shareContent()"><i class="fas fa-share-alt"></i></button>
                        </div>
                    </div>
                </div>

                <div class="tip-card">
                    <div class="tip-image">
                        <img src="close-up-hand-moving-wheel.jpg" alt="Autism Interaction">
                    </div>
                    <div class="tip-content">
                        <h4 class="tip-title">Cara Asyik Berinteraksi dengan Orang dengan Autisme</h4>
                        <div class="tip-actions">
                            <a href="#" class="read-more">SELENGKAPNYA</a>
                            <button class="share-btn" onclick="shareContent()"><i class="fas fa-share-alt"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    // Fungsi untuk membagikan konten ke berbagai platform
    function shareContent() {
        // Mendapatkan URL halaman dan judul konten
        const url = window.location.href;
        const title = document.querySelector('.tip-title').innerText;

        // URL berbagi ke Facebook
        const facebookUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}&quote=${encodeURIComponent(title)}`;

        // URL berbagi ke Twitter
        const twitterUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`;

        // URL berbagi ke WhatsApp
        const whatsappUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(title)}%20${encodeURIComponent(url)}`;

        // Memilih platform untuk berbagi
        const platform = prompt("Pilih platform untuk berbagi:\n1: Facebook\n2: Twitter\n3: WhatsApp");

        switch(platform) {
            case '1':
                window.open(facebookUrl, '_blank', 'width=600,height=400');
                break;
            case '2':
                window.open(twitterUrl, '_blank', 'width=600,height=400');
                break;
            case '3':
                window.open(whatsappUrl, '_blank', 'width=600,height=400');
                break;
            default:
                alert('Pilihan tidak valid, berbagi dibatalkan!');
        }
    }
    </script>

</body>
</html>