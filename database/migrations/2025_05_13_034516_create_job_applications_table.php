<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nama_belakang');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('provinsi');
            $table->string('jenis_hambatan');
            $table->text('detail_hambatan');
            $table->string('nomor_telepon');
            $table->string('alat_bantu');
            $table->string('jenis_kelamin');
            $table->string('email');
            $table->string('password');
            $table->string('ketentuan_disabilitas');
            $table->string('pekerjaan_sekarang');
            $table->string('nama_perusahaan');
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending'); // default status
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_applications');
    }
}
