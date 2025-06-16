<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terkait dengan model.
     * Laravel akan mengasumsikan 'job_applications' jika ini tidak ada.
     * @var string
     */
    // protected $table = 'job_applications'; // Uncomment jika nama tabel Anda berbeda

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',      // <-- Tambahkan ini
        'lowongan_id',  // <-- Tambahkan ini
        'status',       // <-- Tambahkan ini
        // Tambahkan kolom lain yang mungkin Anda isi dengan create()
    ];

    /**
     * Mendefinisikan relasi bahwa lamaran ini dimiliki oleh satu User (pelamar).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mendefinisikan relasi bahwa lamaran ini ditujukan untuk satu Lowongan.
     */
    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }
}
