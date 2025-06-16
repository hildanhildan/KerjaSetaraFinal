<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use App\Models\User; // Tidak perlu jika Anda tidak membuat user di sini

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * * Menjalankan semua seeder yang diperlukan untuk aplikasi.
     */
    public function run(): void
    {
        // Panggil seeder lain yang ingin Anda jalankan di sini.
        // Saat ini, kita hanya menjalankan TipsKarirSeeder.
        $this->call([
            TipsKarirSeeder::class,
            // Anda bisa menambahkan seeder lain di sini di masa depan, contoh:
            // PerusahaanSeeder::class,
        ]);
    }
}
