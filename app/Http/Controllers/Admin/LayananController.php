<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class LayananController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->get();
        return view('admin.layanan.index', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'integer|min:0'
        ]);

        Service::create($request->all());

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'integer|min:0'
        ]);

        $service->update($request->all());

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil diperbarui!');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil dihapus!');
    }

    public function updateOrder(Request $request)
    {
        $request->validate([
            'orders' => 'required|array',
            'orders.*' => 'required|integer|min:0'
        ]);

        foreach ($request->orders as $id => $order) {
            Service::where('id', $id)->update(['order' => $order]);
        }

        return response()->json(['message' => 'Urutan layanan berhasil diperbarui']);
    }
} 