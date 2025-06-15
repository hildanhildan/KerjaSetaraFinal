<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Pastikan Auth di-import
use Symfony\Component\HttpFoundation\Response; // Import Response

class CheckRole // <--- PASTIKAN NAMA CLASS INI BENAR
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            abort(403, 'AKSES DITOLAK: ANDA TIDAK MEMILIKI PERAN YANG SESUAI.');
        }
        return $next($request);
    }
}
