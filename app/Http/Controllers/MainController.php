<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function beranda()
    {
        return view('pages.beranda');
    }

    public function informasi()
    {
        return view('pages.informasi');
    }

    public function berita()
    {
        return view('pages.berita');
    }

    public function bantuan()
    {
        return view('pages.bantuan');
    }

    public function pustakawan()
    {
        return view('pages.pustakawan');
    }

    public function login()
    {
        return view('pages.area-anggota.login');
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'member_id' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'member_id' => 'ID Anggota atau kata sandi salah.',
        ]);
    }
}