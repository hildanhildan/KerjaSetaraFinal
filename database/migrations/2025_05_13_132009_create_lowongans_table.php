<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('lowongans', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('perusahaan');
        $table->string('lokasi');
        $table->string('jenisDisabilitas');
        $table->string('status')->default('Aktif');
        $table->integer('pelamar')->default(0);
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('lowongans');
}

};
