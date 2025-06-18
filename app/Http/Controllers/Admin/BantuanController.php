<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HelpPageSetting;
use App\Models\Faq;

class BantuanController extends Controller
{
    public function index()
    {
        $settings = HelpPageSetting::firstOrCreate([]);
        $faqs = Faq::all();
        return view('admin.bantuan.index', compact('settings', 'faqs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'contact_email' => 'nullable|email|max:255',
            'header_title' => 'nullable|string|max:255',
            'header_subtitle' => 'nullable|string|max:255',
            'category_1_title' => 'nullable|string|max:255',
            'category_1_description' => 'nullable|string',
            'category_2_title' => 'nullable|string|max:255',
            'category_2_description' => 'nullable|string',
            'category_3_title' => 'nullable|string|max:255',
            'category_3_description' => 'nullable|string',
            'contact_section_title' => 'nullable|string|max:255',
            'contact_section_subtitle' => 'nullable|string|max:255',
            'contact_whatsapp_link' => 'nullable|string|max:255',
            'contact_telegram_link' => 'nullable|string|max:255',
        ]);

        $settings = HelpPageSetting::firstOrNew([]);
        $settings->fill($request->all());
        $settings->save();

        return redirect()->route('admin.bantuan.index')->with('success', 'Pengaturan Bantuan berhasil diperbarui!');
    }

    public function storeFaq(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        Faq::create($request->all());

        return redirect()->route('admin.bantuan.index')->with('success', 'FAQ berhasil ditambahkan!');
    }

    public function updateFaq(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        $faq->update($request->all());

        return redirect()->route('admin.bantuan.index')->with('success', 'FAQ berhasil diperbarui!');
    }

    public function deleteFaq(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.bantuan.index')->with('success', 'FAQ berhasil dihapus!');
    }
} 