<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $beritaUtama = Berita::orderBy('created_at', 'desc')->first();
        $beritaTerbaru = Berita::latest()->paginate(6);
        return view('pages.berita', compact('beritaUtama', 'beritaTerbaru'));
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('pages.berita-detail', compact('berita'));
    }

    public function create()
    {
        return view('pages.berita-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imageName = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('images/berita'), $imageName);

        Berita::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'gambar' => $imageName
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('pages.berita-edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);
        
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images/berita'), $imageName);
            
            // Delete old image
            if (file_exists(public_path('images/berita/'.$berita->gambar))) {
                unlink(public_path('images/berita/'.$berita->gambar));
            }
            
            $berita->gambar = $imageName;
        }

        $berita->judul = $request->judul;
        $berita->konten = $request->konten;
        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        
        // Delete image
        if (file_exists(public_path('images/berita/'.$berita->gambar))) {
            unlink(public_path('images/berita/'.$berita->gambar));
        }
        
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus');
    }
}