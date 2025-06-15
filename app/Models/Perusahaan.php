<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    // Nama tabel jika tidak mengikuti konvensi jamak (misal, jika tabelmu bernama 'perusahaan' bukan 'perusahaans')
    // protected $table = 'perusahaan'; 

    protected $table = 'perusahaan';

    protected $fillable = [
        'user_id',
        'nama_resmi_perusahaan',
        'deskripsi',
        'alamat_lengkap',
        'kota',
        'provinsi',
        'kode_pos',
        'telepon_perusahaan',
        'email_perusahaan',
        'website',
        'logo_path',
        'bidang_usaha',
        'npwp',
        // tambahkan kolom lain yang ada di migrasi dan form kamu
    ];

    /**
     * Mendapatkan user (penyedia kerja) yang memiliki profil perusahaan ini.
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}