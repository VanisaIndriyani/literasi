<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePageSetting;
use App\Models\Category;
use App\Models\PopularBook;
use Illuminate\Support\Facades\Storage;

class BerandaController extends Controller
{
    public function index()
    {
        $settings = HomePageSetting::firstOrCreate([]);
        $categories = Category::all();
        $popularBooks = PopularBook::all();
        return view('admin.beranda.index', compact('settings', 'categories', 'popularBooks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'required|string|max:255',
            'total_collections' => 'required|integer|min:0',
            'active_members' => 'required|integer|min:0',
            'operational_hours' => 'required|string|max:255',
            'wifi_facility' => 'required|string|max:255',
            'location_address' => 'nullable|string',
            'location_phone' => 'nullable|string|max:255',
            'location_email' => 'nullable|email|max:255',
            'map_embed_code' => 'nullable|string',
        ]);

        $settings = HomePageSetting::firstOrNew([]);
        $settings->fill($request->all());
        $settings->save();

        return redirect()->route('admin.beranda.index')->with('success', 'Pengaturan Beranda berhasil diperbarui!');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'icon' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
            'icon' => $request->icon,
        ]);

        return redirect()->route('admin.beranda.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function updateCategory(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'icon' => 'nullable|string|max:255',
        ]);

        $category->update([
            'name' => $request->name,
            'icon' => $request->icon,
        ]);

        return redirect()->route('admin.beranda.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.beranda.index')->with('success', 'Kategori berhasil dihapus!');
    }

    public function storePopularBook(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'color' => 'required|string|max:255',
        ]);

        PopularBook::create([
            'title' => $request->title,
            'author' => $request->author,
            'icon' => $request->icon,
            'color' => $request->color,
        ]);

        return redirect()->route('admin.beranda.index')->with('success', 'Buku populer berhasil ditambahkan!');
    }

    public function updatePopularBook(Request $request, PopularBook $popularBook)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'color' => 'required|string|max:255',
        ]);

        $popularBook->update([
            'title' => $request->title,
            'author' => $request->author,
            'icon' => $request->icon,
            'color' => $request->color,
        ]);

        return redirect()->route('admin.beranda.index')->with('success', 'Buku populer berhasil diperbarui!');
    }

    public function deletePopularBook(PopularBook $popularBook)
    {
        $popularBook->delete();
        return redirect()->route('admin.beranda.index')->with('success', 'Buku populer berhasil dihapus!');
    }
} 