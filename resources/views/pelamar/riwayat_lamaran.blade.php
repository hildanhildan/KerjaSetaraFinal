<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Lamaran Saya - KerjaSetara</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ secure_asset('css/kerjasetara.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Anda bisa memindahkan style ini ke file CSS utama jika diperlukan */
        .main .container {
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .table-container { 
            background-color: #fff; 
            border-radius: 12px; 
            padding: 2rem; 
            box-shadow: 0 4px 20px rgba(0,0,0,0.07); 
            overflow-x: auto; /* Agar tabel bisa di-scroll di layar kecil */
        }
        .application-table { 
            width: 100%; 
            border-collapse: collapse; 
            min-width: 600px; /* Lebar minimum untuk tabel */
        }
        .application-table th, .application-table td { 
            padding: 1rem; 
            text-align: left; 
            border-bottom: 1px solid #e9ecef; 
        }
        .application-table th { 
            font-weight: 600; 
            color: #495057; 
            font-size: 14px; 
            text-transform: uppercase; 
        }
        .status { 
            padding: 5px 12px; 
            border-radius: 20px; 
            font-weight: 600; 
            font-size: 12px; 
            text-align: center; 
            display: inline-block; 
            white-space: nowrap;
        }
        .status-terkirim { background-color: #e0f2fe; color: #0c4a6e; }
        .status-diterima { background-color: #dcfce7; color: #166534; }
        .status-ditolak { background-color: #fee2e2; color: #991b1b; }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <h1><a href="{{ route('dashboard.pelamar') }}">Kerja<span>Setara</span></a></h1>
                </div>
                <ul class="nav-links">
                    <li><a href="#">Cari Lowongan</a></li>
                    <li><a href="{{ route('lamaran.riwayat') }}" class="active">Lamaran Saya</a></li>
                    <li><a href="{{ route('tips') }}">Tips Karir</a></li>
                </ul>
                <div class="user-actions">
                    @auth
                        <a href="#" class="btn btn-outline">Profil Saya</a>
                        <div class="avatar">
                            <span>{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-primary">Keluar</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <section>
                <div class="section-header">
                    <h3>Riwayat Lamaran Pekerjaan Saya</h3>
                </div>
                
                <div class="table-container">
                    <table class="application-table">
                        <thead>
                            <tr>
                                <th>Posisi</th>
                                <th>Perusahaan</th>
                                <th>Tanggal Melamar</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($lamaranSaya as $lamaran)
                                <tr>
                                    <td>
                                        <strong>{{ $lamaran->lowongan->judul ?? 'Lowongan Tidak Tersedia' }}</strong>
                                        <div style="font-size: 14px; color: #6c757d; margin-top: 4px;">{{ $lamaran->lowongan->lokasi ?? '' }}</div>
                                    </td>
                                    <td>{{ $lamaran->lowongan->perusahaan ?? '' }}</td>
                                    <td>{{ $lamaran->created_at->format('d F Y') }}</td>
                                    <td>
                                        @if($lamaran->status == 'Diterima')
                                            <span class="status status-diterima">Diterima</span>
                                        @elseif($lamaran->status == 'Ditolak')
                                            <span class="status status-ditolak">Ditolak</span>
                                        @else
                                            <span class="status status-terkirim">Terkirim</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" style="text-align: center; padding: 3rem;">Anda belum pernah mengajukan lamaran.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
