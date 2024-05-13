<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            // Pengecekan peran pengguna
            switch (Auth::user()->role) {
                case 'admin':
                    return redirect()->route('admin.admin');
                    break;
                case 'director':
                    return redirect()->route('director.director');
                    break;
                case 'secretary':
                    return redirect()->route('sekertaris.sekertaris');
                    break;
                case 'komitetim':
                    return redirect()->route('komitetim.komite');
                    break;
                case 'umum':
                    return redirect()->route('dirum.index');
                    break;
                case 'medis':
                    return redirect()->route('dirmed.index');
                    break;
                case 'mppm':
                    return redirect()->route('manajer.pelayanan.index');
                    break;
                case 'mkk':
                    return redirect()->route('manajer.keperawatan.index');
                    break;
                case 'ksmmanajer':
                    return redirect()->route('manajer.ksm.index');
                    break;
                case 'tkmmanajer':
                    return redirect()->route('manajer.timkhususmedis.index');
                    break;
                case 'msu':
                    return redirect()->route('manajer.sdi&umum.index');
                    break;
                case 'mak':
                    return redirect()->route('manajer.adm&keu.index');
                    break;
                case 'tkit':
                    return redirect()->route('manajer.timkhususit.index');
                    break;
                case 'kains':
                    return redirect()->route('kains.index');
                    break;
                case 'kep':
                    return redirect()->route('keperawatan.index');
                    break;
                case 'ksm':
                    return redirect()->route('list.index');
                    break;
                case 'tkm':
                    return redirect()->route('list.index');
                    break;
                case 'kabagsdi':
                    return redirect()->route('SDI.index');
                    break;
                case 'kabaghumas':
                    return redirect()->route('humas.index');
                    break;
                case 'kabagipsrs':
                    return redirect()->route('ipsrs.index');
                    break;
                case 'kabagadm':
                    return redirect()->route('administrasi.index');
                    break;
                case 'tku':
                    return redirect()->route('it.index');
                    break;                    
                default:
                    return redirect('/'); // Arahkan ke halaman default jika peran tidak sesuai
            }
        }

        // Jika autentikasi gagal, kembali ke form login dengan pesan error
        throw ValidationException::withMessages([
            'username' => ['Invalid username or password'],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Melakukan logout
        $request->session()->invalidate(); // Menghapus sesi
        $request->session()->regenerateToken(); // Regenerasi token sesi

        return redirect('/'); // Redirect ke halaman utama setelah logout
    }
}
