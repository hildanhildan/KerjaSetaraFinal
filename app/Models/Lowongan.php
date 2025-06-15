<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $table = 'lowongans'; 

    protected $fillable = [
        'user_id', // <-- PASTIKAN INI ADA
        'judul',
        'perusahaan',
        'deskripsi',
        'jenisDisabilitas',
        'lokasi',
        'tipe_pekerjaan',
        'status',
        'pelamar',
    ];
}
