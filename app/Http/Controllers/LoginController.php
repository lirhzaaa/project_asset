<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function loginAuth(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Mengambil input username dan password
        $credentials = $request->only('username', 'password');

        // Cek apakah autentikasi berhasil
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            // Redirect kembali ke halaman login dengan pesan error
            return redirect()->back()->with('error', 'Proses login gagal, silahkan coba lagi dengan username dan password yang benar');
        }
    }

    public function index()
    {
        return view('login');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
