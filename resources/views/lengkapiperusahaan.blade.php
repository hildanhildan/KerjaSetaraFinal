<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lengkapi Profil Perusahaan</title>
    <link rel="stylesheet" href="{{ secure_asset('css/lengkapiperusahaan.css') }}">
</head>
<body>
    <div class="form-container">
        <h2>Lengkapi Profil Perusahaan</h2>

        <!-- Check if there is a success message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form action is now pointing to a route, assumed to be a POST method -->
        <form action="{{ route('lengkapiperusahaan.submit') }}" method="POST">
            @csrf <!-- CSRF protection -->
            
            <div class="input-group">
                <label for="alamat">Alamat Perusahaan</label>
                <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap" required>
            </div>
        
            <div class="input-group">
                <label for="telepon">No. Telepon</label>
                <input type="tel" id="telepon" name="telepon" placeholder="08xxxxxxxxxx" required>
            </div>
        
            <div class="input-group">
                <label for="bidang">Bidang Industri</label>
                <input type="text" id="bidang" name="bidang" placeholder="Contoh: Teknologi, Kesehatan, dll" required>
            </div>
        
            <div class="input-group">
                <label for="deskripsi">Deskripsi Perusahaan</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" placeholder="Ceritakan tentang perusahaan Anda..." required></textarea>
            </div>
        
            <button type="submit" class="btn-lengkapi">Simpan</button>
        </form>        
    </div>
</body>
</html>
