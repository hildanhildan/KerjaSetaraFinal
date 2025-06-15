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
            // Tambahkan kolom untuk deskripsi setelah kolom 'judul' (atau sesuaikan)
            $table->text('deskripsi')->after('judul')->nullable();

            // Tambahkan kolom untuk tipe pekerjaan setelah kolom 'jenisDisabilitas' (atau sesuaikan)
            $table->string('tipe_pekerjaan')->after('jenisDisabilitas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lowongans', function (Blueprint $table) {
            $table->dropColumn('deskripsi');
            $table->dropColumn('tipe_pekerjaan');
        });
    }
};