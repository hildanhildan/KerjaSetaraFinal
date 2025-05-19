<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Perusahaan extends Authenticatable
{
    use HasFactory;

    // Pastikan atribut yang bisa diisi dengan mass assignment
    protected $fillable = ['email', 'password', 'name'];
}

