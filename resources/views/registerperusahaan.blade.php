<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Penyedia Kerja</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <div class="register-container">
        <div class="register-form">
            <h2>Daftar Penyedia Kerja</h2>

            {{-- Menampilkan error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Menampilkan pesan sukses --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('registerperusahaan') }}" method="POST">
                @csrf

                <input type="hidden" name="role" value="penyedia_kerja">
                
                <div class="input-group">
                    <label for="name">Nama Perusahaan</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Masukkan nama perusahaan">
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="Masukkan email perusahaan">
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Masukkan password">
                </div>

                <div class="input-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Ulangi password">
                </div>

                <button type="submit" class="btn-register">Daftar</button>
            </form>

            <div class="footer-text">
                <p>Sudah punya akun? <a href="{{ route('penyedia') }}">Login di sini</a></p>
            </div>
        </div>
    </div>
</body>
</html>