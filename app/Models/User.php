<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens; // Jika kamu menggunakan Sanctum

class User extends Authenticatable // implements MustVerifyEmail (jika kamu pakai verifikasi email)
{
    use HasFactory, Notifiable; // HasApiTokens (jika pakai Sanctum)

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Pastikan 'role' masih ada di sini
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * TAMBAHKAN METHOD RELASI INI:
     * Mendapatkan profil perusahaan yang terkait dengan user (penyedia kerja).
     * Ini adalah relasi one-to-one: satu User memiliki satu Perusahaan.
     */
    public function perusahaan()
    {
        // Pastikan namespace model Perusahaan sudah benar (App\Models\Perusahaan)
        return $this->hasOne(Perusahaan::class);
    }

    public function profilPerusahaan()
    {
        return $this->hasOne(ProfilPerusahaan::class); // Pastikan ini ProfilPerusahaan::class
    }
}