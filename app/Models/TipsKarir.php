<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipsKarir extends Model
    {
    use HasFactory;

    // Eksplisit mendefinisikan nama tabel agar sesuai dengan migrasi
    protected $table = 'tips_karir'; 

    protected $fillable = [
        'judul',
        'link',
        'sumber',
        'gambar_url',
    ];

    }