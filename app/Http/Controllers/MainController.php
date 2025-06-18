<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\InformationSetting;
use App\Models\HelpPageSetting;
use App\Models\Faq;
use App\Models\Service;
use App\Models\Berita;
use App\Models\Book;
use App\Models\Category;
use App\Models\PopularBook;

class MainController extends Controller
{
  public function beranda(Request $request) {
    $popularBooks = PopularBook::all();
    $categories = Category::all();
    $query = Book::query();

    if ($request->has('q') && $request->q) {
        $query->where('title', 'like', '%' . $request->q . '%');
    }

    $books = $query->get();
    return view('pages.beranda', compact('popularBooks','categories', 'books'));
}

    public function informasi()
    {
        $information = InformationSetting::firstOrCreate([]);
        return view('pages.informasi', compact('information'));
    }

    public function berita()
    {
        $beritaUtama = Berita::orderBy('created_at', 'desc')->first();
        $beritaTerbaru = Berita::orderBy('created_at', 'desc')->paginate(6);
        return view('pages.berita', compact('beritaUtama', 'beritaTerbaru'));
    }

    public function bantuan()
    {
        $settings = HelpPageSetting::firstOrCreate([]);
        $faqs = Faq::all();
        return view('pages.bantuan', compact('settings', 'faqs'));
    }

    public function pustakawan()
    {
        $librarians = \App\Models\Librarian::all();
        $settings = \App\Models\LibrarianSetting::firstOrCreate([]);
        return view('pages.pustakawan', compact('librarians', 'settings'));
    }

    public function layanan()
    {
        $services = Service::where('is_active', true)->orderBy('order')->get();
        return view('pages.layanan', compact('services'));
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