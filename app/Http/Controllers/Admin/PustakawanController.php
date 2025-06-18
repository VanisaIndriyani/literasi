<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LibrarianSetting;
use App\Models\Librarian;
use Illuminate\Support\Facades\Storage;

class PustakawanController extends Controller
{
    public function index()
    {
        $settings = LibrarianSetting::firstOrCreate([]);
        $librarians = Librarian::all();
        return view('admin.pustakawan.index', compact('settings', 'librarians'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'header_title' => 'nullable|string|max:255',
            'header_subtitle' => 'nullable|string|max:255',
            'operational_hours_mf' => 'nullable|string|max:255',
            'operational_hours_s' => 'nullable|string|max:255',
            'operational_hours_sh' => 'nullable|string|max:255',
            'special_service_consultation' => 'nullable|string|max:255',
            'special_service_training' => 'nullable|string|max:255',
            'special_service_guidance' => 'nullable|string|max:255',
            'contact_section_title' => 'nullable|string|max:255',
            'contact_section_subtitle' => 'nullable|string|max:255',
        ]);

        $settings = LibrarianSetting::firstOrNew([]);
        $settings->fill($request->all());
        $settings->save();

        return redirect()->route('admin.pustakawan.index')->with('success', 'Pengaturan Pustakawan berhasil diperbarui!');
    }

    public function storeLibrarian(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'linkedin' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('librarian_images', 'public');
        }

        Librarian::create(array_merge($request->except('image'), ['image' => $imagePath]));

        return redirect()->route('admin.pustakawan.index')->with('success', 'Pustakawan berhasil ditambahkan!');
    }

    public function updateLibrarian(Request $request, Librarian $librarian)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'linkedin' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        $imagePath = $librarian->image;
        if ($request->hasFile('image')) {
            if ($librarian->image) {
                Storage::disk('public')->delete($librarian->image);
            }
            $imagePath = $request->file('image')->store('librarian_images', 'public');
        }

        $librarian->update(array_merge($request->except('image'), ['image' => $imagePath]));

        return redirect()->route('admin.pustakawan.index')->with('success', 'Pustakawan berhasil diperbarui!');
    }

    public function deleteLibrarian(Librarian $librarian)
    {
        if ($librarian->image) {
            Storage::disk('public')->delete($librarian->image);
        }
        $librarian->delete();

        return redirect()->route('admin.pustakawan.index')->with('success', 'Pustakawan berhasil dihapus!');
    }
} 