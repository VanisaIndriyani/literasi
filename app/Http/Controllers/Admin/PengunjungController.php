<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;

class PengunjungController extends Controller
{
    public function index()
    {
        $visitors = Visitor::orderBy('created_at', 'desc')->paginate(10);
        $totalVisitors = Visitor::count();
        $todayVisitors = Visitor::whereDate('created_at', Carbon::today())->count();
        $thisMonthVisitors = Visitor::whereMonth('created_at', Carbon::now()->month)->count();
        
        return view('admin.pengunjung.index', compact('visitors', 'totalVisitors', 'todayVisitors', 'thisMonthVisitors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'purpose' => 'required|string',
            'phone' => 'required|string|max:20',
        ]);

        $visitorData = $request->all();
        $visitorData['visit_date'] = now()->toDateString();
        $visitorData['visit_time'] = now()->toTimeString();

        Visitor::create($visitorData);

        return redirect()->route('admin.pengunjung.index')
            ->with('success', 'Data pengunjung berhasil ditambahkan!');
    }

    public function update(Request $request, Visitor $visitor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'purpose' => 'required|string',
            'phone' => 'required|string|max:20',
        ]);

        $visitor->update($request->all());

        return redirect()->route('admin.pengunjung.index')
            ->with('success', 'Data pengunjung berhasil diperbarui!');
    }

    public function destroy(Visitor $visitor)
    {
        $visitor->delete();

        return redirect()->route('admin.pengunjung.index')
            ->with('success', 'Data pengunjung berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $visitors = Visitor::where('name', 'like', "%{$query}%")
            ->orWhere('institution', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->latest()
            ->paginate(10);

        return view('admin.pengunjung.index', compact('visitors'));
    }
} 