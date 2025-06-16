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
        // Membuat tabel dengan nama singular 'tips_karir'
        Schema::create('tips_karir', function (Blueprint $table) {
            $table->id();
            $table->string('judul'); // Judul artikel
            $table->string('link'); // Link ke artikel asli
            $table->string('sumber'); // Sumber artikel (misal: MySkill.id, Tempo.co)
            $table->string('gambar_url')->nullable(); // URL gambar thumbnail (opsional)
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menghapus tabel dengan nama yang sama, yaitu 'tips_karir'
        Schema::dropIfExists('tips_karir');
    }
};
