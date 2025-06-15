<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View; // <-- PASTIKAN 'View' SUDAH DI-IMPORT DI ATAS

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view (default Breeze).
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Display the penyedia kerja registration view.
     * INI METHOD YANG PERLU KAMU TAMBAHKAN ATAU PERIKSA:
     */
    public function showPenyediaRegistrationForm(): View
    {
        // Pastikan file 'registerperusahaan.blade.php' ada di 'resources/views/'
        return view('registerperusahaan');
    }

    /**
     * Handle an incoming registration request.
     * (Method ini sudah dimodifikasi sebelumnya untuk mengatur 'role' => 'penyedia_kerja')
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'penyedia_kerja',
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Pastikan route 'dashboardperusahaan' sudah ada dan diberi nama
        return redirect(route('dashboardperusahaan'));
    }
}