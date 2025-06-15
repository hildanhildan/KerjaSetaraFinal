<?php
namespace App\Http\Controllers; // Typo, should be App\Http\Controllers

use Illuminate\Http\Request;
use Illuminate\View\View; // Import View

class DashboardPerusahaanController extends Controller
{
    public function index(): View
    {
        // Pastikan view 'dashboardperusahaan.blade.php' ada di resources/views/
        // Kamu bisa passing data apa pun yang dibutuhkan oleh dashboard di sini
        return view('dashboardperusahaan');
    }
}