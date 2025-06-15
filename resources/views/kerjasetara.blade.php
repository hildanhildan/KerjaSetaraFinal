<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KerjaSetara - Portal Lowongan Kerja Inklusif</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            color: #333;
            background-color: #f9f9f9;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Header Styles */
        header {
            background-color: #ffffff;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }


        .logo {
            display: flex;
            align-items: center;
        }

        .logo a {
            text-decoration: none;
            color: inherit;
        }


        .logo img {
            height: 40px;
        }

        .logo h1 {
            font-size: 28px;
            font-weight: 600;
        }

        .logo span {
            color: #4a90e2;
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin: 0 15px;
        }

        .nav-links a {
            color: #666;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .nav-links a:hover {
            color: #4a90e2;
        }

        .user-actions {
            display: flex;
            align-items: center;
        }

        .user-actions .btn {
            padding: 8px 20px;
            margin-left: 10px;
            border-radius: 4px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-outline {
            border: 1px solid #ccc;
            color: #666;
            background-color: transparent;
        }

        .btn-primary {
            background-color: #003b5c;
            color: white;
            border: none;
        }

        .btn-outline:hover {
            background-color: #f1f1f1;
        }

        .btn-primary:hover {
            background-color: #00263a;
        }

        .avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: #e0e0e0;
            margin-left: 15px;
        }

        /* Hero Section */
        .hero {
            position: relative;
            height: 500px;
            background: url('https://source.unsplash.com/random/1200x400/?workspace') center/cover;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('close-up-hand-moving-wheel.jpg'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            z-index: -1;
}
.hero-background:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, 
                rgba(255, 255, 255, 0.5) 75%, 
                rgba(255, 255, 255, 0) 100%);
}

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.7);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            width: 100%;
            padding: 0 15px;
        }

        .hero h2 {
            font-size: 32px;
            color: #003b5c;
            margin-bottom: 15px;
        }

        .hero p {
            font-size: 18px;
            color: #555;
            margin-bottom: 25px;
        }

        .search-box {
            display: flex;
            max-width: 600px;
        }

        .search-box input {
            flex: 1;
            padding: 12px 15px;
            border: 1px solid #ccc;
            border-right: none;
            border-radius: 4px 0 0 4px;
            font-size: 16px;
        }

        .search-box button {
            padding: 12px 25px;
            background-color: #003b5c;
            color: white;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            font-size: 16px;
        }

        .search-box button:hover {
            background-color: #00263a;
        }

        /* Section Headers */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 40px 0 20px;
        }

        .section-header h3 {
            font-size: 24px;
            color: #444;
        }

        .section-header a {
            color: #fff;
            background-color: #e74c3c;
            padding: 8px 15px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
        }

        /* Job Listings */
        .job-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
}

        .job-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
        max-width: 300px;
        padding: 20px;
        position: relative;
        text-align: left;
}

.job-header {
  width: 100%;
}

.job-image {
  width: 100%;
  height: auto;
  object-fit: cover;
}

.job-content {
  padding: 24px;
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.company-name {
  color: #888;
  font-size: 16px;
  font-weight: 500;
  text-transform: uppercase;
}

.job-title {
  color: #333;
  font-size: 28px;
  font-weight: 600;
  margin: 0;
  line-height: 1.2;
}

.job-info {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.job-category, .job-disability, .job-location {
  display: flex;
  align-items: center;
  gap: 10px;
  line-height: 1.4;
}

.job-category i {
  color: #4285f4;
  font-size: 20px;
}

.job-disability {
  color: #e74c3c;
}

.job-disability i {
  font-size: 20px;
}

.job-location {
  color: #666;
}

.job-location i {
  color: #888;
  font-size: 20px;
}

.job-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 10px;
}

.deadline {
  background-color: #2c3e50;
  color: white;
  padding: 8px 12px;
  border-radius: 5px;
  font-size: 14px;
  font-weight: 500;
}

.favorite-btn {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 24px;
    color: white; /* Default warna putih */
    position: absolute;
    right: 20px;
    bottom: 20px;
    transition: color 0.3s;
}

.more-link {
  color: #e74c3c;
  text-decoration: none;
  font-weight: 500;
  display: flex;
  align-items: center;
  gap: 5px;
  margin-top: 5px;
  font-size: 16px;
}

.more-link i {
  transition: transform 0.2s;
}

.more-link:hover i {
  transform: translateX(3px);
}

        .company-logo {
            width: 100%;
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
            background-color: #f5f5f5;
        }

        .company-logo img {
            max-width: 100%;
            max-height: 100%;
        }

        .company-name {
            font-size: 14px;
            color: #888;
            margin: 10px 0;
        }

        .job-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #333;
        }

        .job-tags {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }

        .job-tag {
            display: flex;
            align-items: center;
            margin-right: 15px;
            margin-bottom: 10px;
            font-size: 13px;
            color: #666;
        }

        .job-tag i {
            margin-right: 5px;
            color: #4a90e2;
        }

        .disability-tag {
            color: #e74c3c;
        }

        .disability-tag i {
            color: #e74c3c;
        }

        .job-location {
            display: flex;
            align-items: center;
            color: #666;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .job-location i {
            margin-right: 5px;
            color: #888;
        }

        .job-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .deadline {
            background-color: #2c3e50;
            color: white;
            padding: 8px 12px;
            font-size: 12px;
            border-radius: 4px;
        }

        .save-job {
            background: none;
            border: none;
            color: #e74c3c;
            font-size: 22px;
            cursor: pointer;
        }

        .job-link {
            color: #e74c3c;
            text-decoration: none;
            font-size: 14px;
            display: flex;
            align-items: center;
        }

        .job-link i {
            margin-left: 5px;
        }

        /* Tips Section */
        .tips-container {
            margin-top: 60px;
            padding: 40px 0;
        }

        .tips-header {
            margin-bottom: 30px;
        }

        .tips-cards {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -15px;
        }

        .tip-card {
            flex: 0 0 calc(33.333% - 30px);
            margin: 15px;
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

        .tip-image {
            height: 200px;
            overflow: hidden;
        }

        .tip-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .tip-content {
            padding: 20px;
        }

        .tip-title {
            font-size: 16px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 15px;
            min-height: 50px;
        }

        .tip-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }

        .share-btn {
            color: #888;
            font-size: 18px;
            background: none;
            border: none;
            cursor: pointer;
        }

        .read-more {
            display: inline-block;
            padding: 8px 15px;
            background-color: #fff;
            color: #4a90e2;
            border: 1px solid #4a90e2;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .read-more:hover {
            background-color: #4a90e2;
            color: #fff;
        }

        /* Accessibility */
        .accessibility-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #2c3e50;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 100;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }

        .accessibility-btn i {
            font-size: 24px;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .job-card, .tip-card {
                flex: 0 0 calc(50% - 30px);
            }
        }

        @media (max-width: 768px) {
            .job-card, .tip-card {
                flex: 0 0 100%;
            }
            .nav-links {
                display: none;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="navbar">
                <                <div class="logo">
                    <h1><a href="{{ route('kerjasetara') }}">Kerja<span>Setara</span></a></h1>
                </div>
                <ul class="nav-links">
                    <li><a href="{{ route('lowongan') }}">Cari Lowongan</a></li>
                    <li><a href="{{ route('daftarperusahaan') }}">Daftar Perusahaan</a></li>
                    <li><a href="{{ route('tips') }}">Tips Karir</a></li>
                    <li><a href="{{ route('penyedia') }}">Penyedia Kerja</a></li>
                </ul>
                <div class="user-actions">
                    @guest
                        <!-- If the user is not logged in, show the login and register buttons -->
                        <a href="{{ route('login') }}" class="btn btn-outline">Masuk</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                    @else
                        <!-- If the user is logged in, show the avatar and dashboard link -->
                        <a href="{{ route('dashboardperusahaan') }}" class="btn btn-outline">Dashboard</a>
                        <div class="avatar">
                            <!-- Display user avatar or placeholder if not set -->
                            <img src="{{ Auth::user()->avatar ?? 'path/to/default-avatar.jpg' }}" alt="User Avatar">
                        </div>
                    @endguest
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="hero-background"></div>
        <div class="container">
            <div class="hero-content">
                <h2>Cari Lowongan Berdasarkkan Keunikanmu</h2>
                <p>Apapun masalahmu, pasti ada solusi.</p>
                <div class="search-box">
                    <input type="text" placeholder="Posisi, Perusahaan">
                    <button type="submit">CARI</button>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="section-header">
            <h3>LOWONGAN TERBARU</h3>
            <a href="lowongan.html">LEBIH BANYAK</a>
        </div>

        <section class="job-container">
            <div class="job-card">
                <div class="job-header">
                  <img src="close-up-hand-moving-wheel.jpg" alt="Person in wheelchair" class="job-image">
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
                  
                  <a href="detail-lowongan.html" class="more-link">SELENGKAPNYA <i class="fas fa-angle-right"></i></a>
                </div>
              </div>
            </div>
            
            <div class="job-card">
                <div class="job-header">
                  <img src="close-up-hand-moving-wheel.jpg" alt="Person in wheelchair" class="job-image">
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
                  
                  <a href="#" class="more-link">SELENGKAPNYA <i class="fa-solid fa-angle-right"></i></a>
                </div>
              </div>
            </div>
        </section>
    </section>

    <section class="tips-container">
        <div class="container">
            <div class="section-header tips-header">
                <h3>TIPS KARIR</h3>
                <a href="tips.html">LEBIH BANYAK TIPS</a>
            </div>

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

    <div class="accessibility-btn">
        <i class="fas fa-universal-access"></i>
    </div>

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