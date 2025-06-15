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
        // Menggunakan 'perusahaan' sebagai nama tabel.
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->id(); // Kolom ID utama

            // Foreign key untuk menghubungkan ke tabel 'users'
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade'); // Jika user dihapus, data perusahaan terkait juga dihapus

            $table->string('nama_resmi_perusahaan')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('alamat_lengkap')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos', 10)->nullable();
            $table->string('telepon_perusahaan', 20)->nullable();
            $table->string('email_perusahaan')->nullable()->unique();
            $table->string('website')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('bidang_usaha')->nullable();
            $table->string('npwp', 25)->nullable()->unique();
            
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan');
    }
};
