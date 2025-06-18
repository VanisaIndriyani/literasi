<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.area-anggota.login');
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'member_id' => 'required',
            'password' => 'required'
        ], [
            'member_id.required' => 'ID Anggota harus diisi',
            'password.required' => 'Kata sandi harus diisi'
        ]);

        // Hanya mencoba autentikasi sebagai Admin (menggunakan 'web' guard, yang terhubung ke App\Models\User)
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        // Jika login admin gagal
        return back()->withErrors([
            'member_id' => 'ID Anggota atau kata sandi salah.',
            'error_details' => 'Silakan periksa kembali ID Anggota dan kata sandi Anda.'
        ])->withInput($request->except('password'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function register()
    {
        return view('pages.area-anggota.register');
    }

    public function registerProcess(Request $request)
    {
        $validatedData = $request->validate([
            'member_id' => 'required|string|max:255|unique:users,member_id',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'member_id' => $validatedData['member_id'],
            'password' => Hash::make($validatedData['password']),
            'role' => 'admin',
        ]);

        if (Auth::guard('web')->attempt($validatedData)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with('success', 'Akun admin berhasil dibuat dan Anda telah masuk!');
        }

        return redirect()->route('login')->with('success', 'Registrasi admin berhasil! Silakan masuk dengan akun yang baru dibuat.');
    }
}