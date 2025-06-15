use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Perusahaan;

class PerusahaanAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.perusahaan.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('perusahaan')->attempt($credentials)) {
            return redirect()->intended('/perusahaan/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout()
    {
        Auth::guard('perusahaan')->logout();
        return redirect()->route('perusahaan.login');
    }
}
