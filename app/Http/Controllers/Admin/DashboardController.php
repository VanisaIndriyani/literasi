<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Member;
use App\Models\Category;
use App\Models\Berita;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik Buku
        $totalBooks = Book::count();
        $totalStock = Book::sum('stock');
        
        // Statistik Pengunjung
        $totalVisitors = Visitor::count();
        $todayVisitors = Visitor::whereDate('visit_date', today())->count();
        $thisMonthVisitors = Visitor::whereMonth('visit_date', now()->month)
                                   ->whereYear('visit_date', now()->year)
                                   ->count();
        
        // Statistik Kategori
        $categories = Category::withCount('books')->get();
        $categoryData = $categories->map(function($category) {
            // Always show at least 1 per category for the donut chart
            return [
                'name' => $category->name,
                'count' => max($category->books_count, 1)
            ];
        });
        
        // Statistik Bulanan Pengunjung
        $monthlyVisitors = Visitor::selectRaw('MONTH(visit_date) as month, COUNT(*) as count')
            ->whereYear('visit_date', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->mapWithKeys(function($item) {
                $monthNames = [
                    1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
                    5 => 'Mei', 6 => 'Jun', 7 => 'Jul', 8 => 'Ags',
                    9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des'
                ];
                return [$monthNames[$item->month] => $item->count];
            });
        
        // Data untuk diagram kategori
        $categoryChartData = [
            'labels' => $categoryData->pluck('name')->toArray(),
            'data' => $categoryData->pluck('count')->toArray(),
            'colors' => ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40']
        ];
        
        // Data untuk diagram pengunjung bulanan
        $visitorChartData = [
            'labels' => $monthlyVisitors->keys()->toArray(),
            'data' => $monthlyVisitors->values()->toArray()
        ];
        
        // Pengunjung terkini
        $recentVisitors = Visitor::orderBy('visit_date', 'desc')
                                ->orderBy('visit_time', 'desc')
                                ->limit(10)
                                ->get();
        
        // Statistik pengunjung berdasarkan institusi
        $institutionStats = Visitor::selectRaw('institution, COUNT(*) as count')
                                  ->groupBy('institution')
                                  ->orderBy('count', 'desc')
                                  ->limit(5)
                                  ->get();

        return view('admin.dashboard', compact(
            'totalBooks',
            'totalStock', 
            'totalVisitors',
            'todayVisitors',
            'thisMonthVisitors',
            'categoryChartData',
            'visitorChartData',
            'recentVisitors',
            'institutionStats'
        ));
    }
}