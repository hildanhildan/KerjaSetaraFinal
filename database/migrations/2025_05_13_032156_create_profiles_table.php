<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('pekerjaan_sekarang');
            $table->string('nama_perusahaan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('provinsi');
            $table->text('detail_hambatan');
            $table->string('nomor_telepon');
            $table->string('alat_bantu')->nullable();
            $table->json('disabilitas')->nullable();  // Store the disabilities as JSON
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}

