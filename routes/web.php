<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\TipsController;
use App\Http\Controllers\Auth\PenyediaLoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardPerusahaanController;
use App\Http\Controllers\ProfilPerusahaanController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PelamarDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\RiwayatLamaranController;
use App\Http\Controllers\LandingPageController;

// --- Rute Umum (untuk semua pengguna atau publik) ---


Route::get('/', [LandingPageController::class, 'index'])->name('kerjasetara');

Route::get('/lowongan', [JobListingController::class, 'index'])->name('lowongan');
Route::get('/daftar-perusahaan', [PerusahaanController::class, 'index'])->name('daftarperusahaan');
Route::get('/tips-karir', [TipsController::class, 'index'])->name('tips');

Route::get('/info-penyedia-kerja', function() {
    return view('info_penyedia');
})->name('penyedia'); // Nama rute yang lebih spesifik jika ini memang dimaksudkan untuk info penyedia

// --- Rute Autentikasi Pelamar/Pengguna Biasa ---

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); // Dashboard standar Breeze

// --- Rute Autentikasi Penyedia Kerja/Perusahaan ---

// Login Penyedia Kerja
Route::get('/login-penyedia', [PenyediaLoginController::class, 'showLoginForm'])->name('penyedia'); // Nama rute dikembalikan ke 'penyedia'
Route::post('/login-penyedia', [PenyediaLoginController::class, 'login']);

// Registrasi Penyedia Kerja/Perusahaan
Route::get('/register-penyedia', [RegisteredUserController::class, 'showPenyediaRegistrationForm'])->name('registerperusahaan'); // Nama rute dikembalikan ke 'registerperusahaan'
Route::post('/register-penyedia', [RegisteredUserController::class, 'store'])->name('registerperusahaan.submit'); // Menjaga submit yang lebih spesifik


// --- Rute yang Membutuhkan Autentikasi dan Role 'penyedia_kerja' ---

Route::middleware(['auth', 'role:penyedia_kerja'])->group(function () {
    // Dashboard dan Profil Perusahaan
    Route::get('/dashboard-perusahaan', [DashboardPerusahaanController::class, 'index'])->name('dashboardperusahaan'); // Nama rute dikembalikan ke 'dashboardperusahaan'
    Route::get('/profil-perusahaan', [ProfilPerusahaanController::class, 'show'])->name('profilperusahaan'); // Nama rute dikembalikan ke 'profilperusahaan'
    Route::put('/profil-perusahaan/update', [ProfilPerusahaanController::class, 'update'])->name('profilperusahaan.update'); // Nama rute dikembalikan ke 'profilperusahaan.update'

    // Manajemen Lowongan
    Route::get('/lowongan-saya', [LowonganController::class, 'index'])->name('lowonganperusahaan');
    Route::get('/buat-lowongan', [LowonganController::class, 'create'])->name('buatlowongan');
    Route::post('/lowongan', [LowonganController::class, 'store'])->name('lowongan.store');

    // Manajemen Lamaran Masuk
    Route::get('/lamaran-masuk', [LamaranController::class, 'index'])->name('lamaran');
    Route::post('/lamaran/{applicationId}/accept', [LamaranController::class, 'acceptLamaran'])->name('lamaran.accept');
    Route::post('/lamaran/{applicationId}/reject', [LamaranController::class, 'rejectLamaran'])->name('lamaran.reject');

    // Logout Khusus Penyedia
    Route::post('/logout-penyedia', [AuthenticatedSessionController::class, 'destroy'])->name('logout.perusahaan');

    Route::get('/lowongan-saya/{lowongan}/edit', [App\Http\Controllers\LowonganController::class, 'edit'])->name('lowongan.edit');

    // TAMBAHKAN ROUTE INI UNTUK MEMPROSES UPDATE LOWONGAN
    Route::put('/lowongan-saya/{lowongan}', [App\Http\Controllers\LowonganController::class, 'update'])->name('lowongan.update');
});

// --- Rute Profil Pengguna (Standar Breeze) ---
// Ini adalah rute standar yang kemungkinan besar berada di auth.php,
// tetapi jika Anda ingin menempatkannya di web.php, ini adalah strukturnya.
// Saya akan biarkan ini di sini dan juga memastikan require __DIR__.'/auth.php' tetap ada.
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/lowongan-saya/{lowongan}/edit', [App\Http\Controllers\LowonganController::class, 'edit'])->name('lowongan.edit');
});

Route::middleware(['auth', 'role:pelamar'])->group(function () {
    Route::get('/dashboard-pelamar', [PelamarDashboardController::class, 'index'])->name('dashboard.pelamar');
    // Tambahkan route lain khusus pelamar di sini nanti (misal: halaman profil pelamar, riwayat lamaran)
    Route::post('/lowongan/{lowongan}/apply', [LamaranController::class, 'apply'])->name('lamaran.apply');
    Route::get('/lamaran-saya', [RiwayatLamaranController::class, 'index'])->name('lamaran.riwayat');
});

Route::get('/lowongan/{lowongan}', [JobListingController::class, 'show'])->name('lowongan.show');

Route::get('/tips-karir', [TipsController::class, 'index'])->name('tips');
// Memuat rute autentikasi standar Breeze
require __DIR__.'/auth.php';
