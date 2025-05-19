<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $table = 'lowongans'; // ← Tambahkan ini

    protected $fillable = [
        'judul',
        'perusahaan',
        'jenisDisabilitas',
        'lokasi',
        'status',
        'pelamar',
    ];
}
