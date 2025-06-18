<?php
// app/Http/Controllers/Admin/BerandaController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner; // dst

class BerandaController extends Controller
{
    public function index() {
        $banners = Banner::all();
        // Ambil data lain juga
        return view('admin.beranda.index', compact('banners'));
    }
    // Tambah fungsi create, store, edit, update, destroy sesuai kebutuhan
}