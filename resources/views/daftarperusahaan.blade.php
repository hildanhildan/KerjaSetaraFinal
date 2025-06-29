<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lowongan Kerja</title>
    <!-- Hapus salah satu dari dua CDN berikut -->
    <!-- <link rel="stylesheet" href="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ secure_asset('css/dp.css') }}">

</head>
<body>

    <    <header>
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <h1><a href="{{ route('kerjasetara') }}">Kerja<span>Setara</span></a></h1>
                </div>
                <ul class="nav-links">
                    <li><a href="{{ route('lowongan') }}" >Cari Lowongan</a></li> 
                    <li><a href="{{ route('daftarperusahaan') }}" class="active" >Daftar Perusahaan</a></li>
                    <li><a href="{{ route('tips') }}">Tips Karir</a></li>
                    <li><a href="{{ route('penyedia') }}">Penyedia Kerja</a></li>
                </ul>
                <div class="user-actions">
                    @guest
                        <a href="{{ route('masuk') }}" class="btn btn-outline">Masuk</a>
                        <a href="{{ route('daftar') }}" class="btn btn-primary">Daftar</a>
                    @else
                        <a href="{{ route('dashboardperusahaan') }}" class="btn btn-outline">Dashboard</a>
                        <div class="avatar">
                            <!-- Display the user avatar -->
                            <img src="{{ Auth::user()->avatar ?? asset('images/default-avatar.png') }}" alt="User Avatar">
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </header>
    
    <div class="container">
        <section class="search-section">
            <h1>
                PENCARIAN
                                        </h1>
            
            <div class="search-form">
                <div class="form-group">
                    <select id="sektor" name="sektor">
                        <option value="">Semua Sektor</option>
                        <option value="teknologi">Teknologi Informasi</option>
                        <option value="retail">Retail</option>
                        <option value="pelayanan">Pelayanan Pelanggan</option>
                    </select>
                    <i class="fas fa-chevron-down"></i>
                </div>
                
                <div class="form-group">
                    <select id="provinsi" name="provinsi">
                        <option value="">Provinsi</option>
                        <option value="jakarta">Jakarta</option>
                        <option value="yogyakarta">Yogyakarta</option>
                        <option value="bandung">Bandung</option>
                        <option value="surabaya">Surabaya</option>
                    </select>
                    <i class="fas fa-chevron-down"></i>
                </div>
                
                <div class="form-group">
                    <input type="text" id="keyword" name="keyword" placeholder="Sektor atau Nama Perusahaan">
                </div>
                
                <button type="submit" class="search-button">CARI</button>
            </div>
        </section>
        
        <div class="divider"></div>
        
        <section class="companies-section">
            <h2>Semua Perusahaan</h2>
            
            <div class="companies-grid">
         
                <div class="company-card">
                    <div class="company-image">
                        <img src="company1.jpg" alt="PT Abadi Bina Indonesia">
                        <div class="company-logo">
                            <img src="abi-logo.png" alt="ABI Logo">
                        </div>
                    </div>
                    <div class="company-info">
                        <h3>PT Abadi Bina Indonesia</h3>
                        <p>Pelayanan Pelanggan | Bantul - Yogyakarta</p>
                        <a href="#" class="more-link">SELENGKAPNYA <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                

                <div class="company-card">
                    <div class="company-image">
                        <img src="company2.jpg" alt="PT Birdi Indonesia">
                        <div class="company-logo">
                            <img src="birdi-logo.png" alt="Birdi Logo">
                        </div>
                    </div>
                    <div class="company-info">
                        <h3>PT Birdi Indonesia</h3>
                        <p>Retail | Jakarta Pusat - Jakarta</p>
                        <a href="#" class="more-link">SELENGKAPNYA <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                
                <div class="company-card">
                    <div class="company-image">
                        <img src="company2.jpg" alt="PT Birdi Indonesia">
                        <div class="company-logo">
                            <img src="birdi-logo.png" alt="Birdi Logo">
                        </div>
                    </div>
                    <div class="company-info">
                        <h3>PT Birdi Indonesia</h3>
                        <p>Retail | Jakarta Pusat - Jakarta</p>
                        <a href="#" class="more-link">SELENGKAPNYA <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>

                <div class="company-card">
                    <div class="company-image">
                        <img src="company3.jpg" alt="PT Mitracomm Ekasarana">
                        <div class="company-logo">
                            <img src="mitracomm-logo.png" alt="Mitracomm Logo">
                        </div>
                    </div>
                    <div class="company-info">
                        <h3>PT Mitracomm Ekasarana</h3>
                        <p>Teknologi Informasi | Jakarta Selatan - Jakarta</p>
                        <a href="#" class="more-link">SELENGKAPNYA <i class="fas fa-chevron-right"></i></a>
                    </div>
                    
                </div>
            </div>
        </section>
    </div> 
</body>
</html>