<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function show()
    {
        $users = User::all();
        return view('auth.register', compact('users'));
    }

    public function processRegistration(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:3',
            'role' => 'required|in:admin,director,secretary,komitetim,umum,medis,mppm,mkk,ksmmanajer,tkmmanajer,msu,mak,tkit,kains,kep,ksm,tkm,kabagsdi,kabaghumas,kabagipsrs,kabagadm,tku',
        ]);

        // Buat pengguna baru dengan peran yang dipilih
        $user = User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'password' => bcrypt($validatedData['password']), // Hash password menggunakan bcrypt
            'role' => $validatedData['role'], // Atur peran pengguna sesuai pilihan
        ]);

        // Redirect ke halaman beranda atau halaman lain setelah pendaftaran berhasil
        Session::flash('success', 'Registration successful!');

        // Redirect ke halaman login
        return redirect()->route('register');
    }
}