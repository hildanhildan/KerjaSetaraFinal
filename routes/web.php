<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Authentication & Register Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('kerjasetara');
});


Route::get('/masuk', fn() => view('masuk'))->name('masuk');
Route::get('/daftar', fn() => view('daftar'))->name('daftar');
Route::get('/penyedia', fn() => view('penyedia'))->name('penyedia');

// Register Perusahaan
Route::get('/registerperusahaan', [PerusahaanController::class, 'showForm'])->name('registerperusahaan');
Route::post('/registerperusahaan', [PerusahaanController::class, 'register']);

// Route untuk menampilkan halaman login perusahaan
Route::get('/login-penyedia', function () {
    return view('penyedia'); // Menampilkan halaman login penyedia (penyedia.blade.php)
});

// Route untuk menangani login dan verifikasi data
Route::post('/login-penyedia', [PerusahaanController::class, 'login'])->name('penyedia.login');

// Route untuk dashboard perusahaan, hanya bisa diakses setelah login
Route::get('/dashboard-perusahaan', [PerusahaanController::class, 'dashboard'])
    ->name('dashboard.perusahaan')
    ->middleware('auth:perusahaan');

// Logout
Route::post('/logout-perusahaan', function () {
    Auth::guard('perusahaan')->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/penyedia')->with('success', 'Berhasil logout.');
})->name('logout.perusahaan');


/*
|--------------------------------------------------------------------------
| Halaman Umum
|--------------------------------------------------------------------------
*/

Route::get('/kerjasetara', fn() => view('kerjasetara'))->name('kerjasetara');
Route::get('/syarat-ketentuan', fn() => view('syarat-ketentuan'))->name('syarat-ketentuan');
Route::get('/tips', fn() => view('tips'))->name('tips');

/*
|--------------------------------------------------------------------------
| Lowongan Kerja
|--------------------------------------------------------------------------
*/

Route::get('/lowongan', fn() => view('lowongan'))->name('lowongan');
Route::get('/buatlowongan', fn() => view('buatlowongan'))->name('buatlowongan');
Route::get('/editlowongan', fn() => view('editlowongan'))->name('editlowongan');
Route::get('/detail-lowongan', fn() => view('detail-lowongan'))->name('detail-lowongan');

/*
|--------------------------------------------------------------------------
| Perusahaan (Company)
|--------------------------------------------------------------------------
*/

// Dashboard, Profil, dan Daftar
Route::get('/dashboardperusahaan', [PerusahaanController::class, 'dashboard'])->name('dashboardperusahaan');
Route::get('/daftarperusahaan', fn() => view('daftarperusahaan'))->name('daftarperusahaan');
Route::get('/profilperusahaan', fn() => view('profilperusahaan'))->name('profilperusahaan');
Route::get('/lowonganperusahaan', fn() => view('lowonganperusahaan'))->name('lowonganperusahaan');
Route::get('/lowongan', fn() => view('lowongan'))->name('lowongan');


// Lengkapi Profil Perusahaan
Route::get('/lengkapiperusahaan', [PerusahaanController::class, 'showForm'])->name('lengkapiperusahaan');
Route::post('/lengkapiperusahaan', [PerusahaanController::class, 'store'])->name('lengkapiperusahaan.submit');

/*
|--------------------------------------------------------------------------
| Profil Pencari Kerja
|--------------------------------------------------------------------------
*/

Route::get('/lengkapi', fn() => view('lengkapi'))->name('lengkapi');
Route::post('/lengkapi-profil', [ProfilController::class, 'store'])->name('lengkapiprofil.submit');

/*
|--------------------------------------------------------------------------
| Lamaran Kerja
|--------------------------------------------------------------------------
*/

Route::get('/lamaran', [LamaranController::class, 'showLamaran'])->name('lamaran');
Route::post('/lamaran/{id}/accept', [LamaranController::class, 'accept'])->name('lamaran.accept');
Route::post('/lamaran/{id}/reject', [LamaranController::class, 'reject'])->name('lamaran.reject');


use App\Http\Controllers\LowonganController;

Route::get('/editlowongan/{id}', [LowonganController::class, 'edit'])->name('editlowongan');
Route::get('/lowongan/{id}/edit', [LowonganController::class, 'edit'])->name('lowongan.edit');
Route::put('/updateLowongan/{id}', [LowonganController::class, 'update'])->name('updateLowongan');
Route::post('/lowonganperusahaan', [LowonganController::class, 'store'])->name('lowongan.store');
Route::get('/lowonganperusahaan', [LowonganController::class, 'index'])->name('lowonganperusahaan');
Route::delete('/lowonganperusahaan/{id}', [LowonganController::class, 'destroy'])->name('hapusLowongan');



