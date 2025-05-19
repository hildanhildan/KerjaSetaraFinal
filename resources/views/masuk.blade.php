<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KERJABILITAS - Portal Kerja</title>
    <link rel="stylesheet" href="{{ asset('css/masuk.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <h1>Raih peluangmu dengan KerjaSetara !</h1>
        </header>
        
        <main>
            <div class="features-section">
                <div class="feature">
                    <div class="feature-icon">
                        <img src="email-icon.svg" alt="Email Icon">
                    </div>
                    <div class="feature-text">
                        <h3>Selalu didepan</h3>
                        <p>Peluang kerja baru dikirm lewat email setiap hari</p>
                    </div>
                </div>
                
                <div class="feature">
                    <div class="feature-icon">
                        <img src="paper-plane-icon.svg" alt="Paper Plane Icon">
                    </div>
                    <div class="feature-text">
                        <h3>Melamar Cepat</h3>
                        <p>Dengan aplikasi lamaran yang sudah dilengkapi lebih dulu</p>
                    </div>
                </div>
                
                <div class="feature">
                    <div class="feature-icon">
                        <img src="phone-icon.svg" alt="Phone Icon">
                    </div>
                    <div class="feature-text">
                        <h3>Mudah dihubungi</h3>
                        <p>Oleh penyedia kerja dan peluang yang sesuai kualifikasi kamu</p>
                    </div>
                </div>
            </div>
            
            <div class="login-section">
                <div class="login-box">
                    <h2>Masuk Sebagai Pencari Kerja</h2>
                    
                    <form action="#" method="post">
                        <div class="form-group">
                            <input id="email" name="email" placeholder="Email" required>
                        </div>
                        
                        <div class="form-group">
                            <input type="password" id="password" name="password" placeholder="Password" required>
                        </div>
                        
                        <div class="help-links">
                            <a href="#" class="forgot-password">Lupa Password ?</a>
                        </div>
                        
                        <div class="remember-me">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Tetap Masuk</label>
                        </div>
                        
                        <button type="submit" class="login-button">MASUK</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>