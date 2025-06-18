<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InformationSetting;

class InformasiController extends Controller
{
    public function index()
    {
        $information = InformationSetting::firstOrCreate([]);
        return view('admin.informasi.index', compact('information'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'nullable|string',
        ]);

        $information = InformationSetting::firstOrNew([]);
        $information->fill($request->all());
        $information->save();

        return redirect()->route('admin.informasi.index')->with('success', 'Konten informasi berhasil diperbarui!');
    }
} 