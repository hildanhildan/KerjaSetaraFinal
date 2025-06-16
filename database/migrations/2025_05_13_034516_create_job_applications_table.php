<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Laravel akan otomatis mencari tabel 'job_applications'
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id(); // ID unik untuk setiap lamaran

            // Foreign key untuk menghubungkan ke pelamar (tabel 'users')
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade'); // Jika user dihapus, lamarannya juga ikut terhapus

            // Foreign key untuk menghubungkan ke lowongan yang dilamar (tabel 'lowongans')
            $table->foreignId('lowongan_id')
                  ->constrained('lowongans')
                  ->onDelete('cascade'); // Jika lowongan dihapus, lamarannya juga ikut terhapus
            
            // Kolom untuk menyimpan status lamaran
            $table->string('status')->default('Terkirim'); // Contoh status awal

            // Menambahkan constraint agar satu user hanya bisa melamar satu lowongan satu kali
            $table->unique(['user_id', 'lowongan_id']);

            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
