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
        Schema::table('lowongans', function (Blueprint $table) {
            // Tambahkan kolom user_id setelah kolom 'id'
            // dan hubungkan ke tabel 'users'
            $table->foreignId('user_id')
                  ->after('id') // Opsional, agar posisi kolom rapi
                  ->constrained('users')
                  ->onDelete('cascade'); // Jika user dihapus, lowongannya juga ikut terhapus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lowongans', function (Blueprint $table) {
            // Hapus foreign key constraint terlebih dahulu sebelum menghapus kolomnya
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};