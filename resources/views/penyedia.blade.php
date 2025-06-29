<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sebagai Penyedia Kerja</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ secure_asset('css/penyedia.css') }}">
</head>
<body>

    <div class="login-container">
        <div class="login-form">
            <h2>Login Sebagai Penyedia Kerja</h2>

            <!-- Form Login -->
            <form action="{{ url('/login-penyedia') }}" method="POST" id="loginForm">
                @csrf
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Masukkan email">
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Masukkan password">
                </div>
                <button type="submit" class="btn-login">Login</button>
            </form>           

            <div class="footer-text">
                <p>Belum punya akun? <span id="registerLink">Daftar di sini</span></p>
            </div>
        </div>
    </div>

    <script>
        // Redirect ke halaman register jika link diklik
        document.getElementById('registerLink').addEventListener('click', function () {
            window.location.href = "{{ route('registerperusahaan') }}"; // Ganti dengan route registrasi perusahaan
        });
    </script>

</body>
</html>
