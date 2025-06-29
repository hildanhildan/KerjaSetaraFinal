<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Lamaran Masuk - KerjaSetara</title>
    <link rel="stylesheet" href="{{ secure_asset('css/dashboardperusahaan.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Anda bisa memindahkan style ini ke file CSS utama Anda jika mau */
        .table-container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .application-table {
            width: 100%;
            border-collapse: collapse;
        }
        .application-table th, .application-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        .application-table th {
            font-weight: 600;
            color: #4a5568;
            background-color: #f7fafc;
        }
        .status-terkirim { color: #2b6cb0; font-weight: bold; }
        .status-diterima { color: #2f855a; font-weight: bold; }
        .status-ditolak { color: #c53030; font-weight: bold; }
        .btn-action {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            margin-right: 0.5rem;
        }
        .btn-accept { background-color: #38a169; color: white; }
        .btn-accept:hover { background-color: #2f855a; }
        .btn-reject { background-color: #e53e3e; color: white; }
        .btn-reject:hover { background-color: #c53030; }
    </style>
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2><a href="{{ route('dashboardperusahaan') }}">Kerja<span>Setara</span></a></h2>
            <nav>
                <a href="{{ route('profilperusahaan') }}">🏠 Profil Perusahaan</a>
                <a href="{{ route('lowonganperusahaan') }}">📄 Lowongan Saya</a>
                <a href="{{ route('buatlowongan') }}">➕ Buat Lowongan</a>
                <a href="{{ route('lamaran') }}" class="active">📨 Lamaran Masuk</a>

                <!-- Logout -->
                <form id="logout-form" action="{{ route('logout.perusahaan') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    🚪 Keluar
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main">
            <div class="header">
                <h1>Lamaran Masuk</h1>
            </div>

            {{-- Menampilkan Notifikasi --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="table-container">
                <table class="application-table">
                    <thead>
                        <tr>
                            <th>Nama Pelamar</th>
                            <th>Posisi yang Dilamar</th>
                            <th>Tanggal Melamar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($applications as $app)
                            <tr>
                                <td>{{ $app->user->name }}</td>
                                <td>{{ $app->lowongan->judul }}</td>
                                <td>{{ $app->created_at->format('d M Y') }}</td>
                                <td>
                                    @if($app->status == 'Terkirim')
                                        <span class="status-terkirim">{{ $app->status }}</span>
                                    @elseif($app->status == 'Diterima')
                                        <span class="status-diterima">{{ $app->status }}</span>
                                    @elseif($app->status == 'Ditolak')
                                        <span class="status-ditolak">{{ $app->status }}</span>
                                    @else
                                        <span>{{ $app->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- Tombol hanya muncul jika status masih 'Terkirim' --}}
                                    @if($app->status == 'Terkirim')
                                        <form action="{{ route('lamaran.accept', $app->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn-action btn-accept">Terima</button>
                                        </form>
                                        <form action="{{ route('lamaran.reject', $app->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn-action btn-reject">Tolak</button>
                                        </form>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center;">Belum ada lamaran yang masuk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
