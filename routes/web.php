<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\BerandaController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\BantuanController;
use App\Http\Controllers\Admin\PustakawanController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\PengunjungController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Admin\BookController as AdminBookController;

Route::get('/', [MainController::class, 'beranda'])->name('beranda');
Route::get('/informasi', [MainController::class, 'informasi'])->name('informasi');
Route::resource('berita', BeritaController::class)->names([
    'index' => 'berita.index',
    'create' => 'berita.create',
    'store' => 'berita.store',
    'show' => 'berita.show',
    'edit' => 'berita.edit',
    'update' => 'berita.update',
    'destroy' => 'berita.destroy',
]);
Route::get('/bantuan', [MainController::class, 'bantuan'])->name('bantuan');
Route::get('/pustakawan', [MainController::class, 'pustakawan'])->name('pustakawan');
Route::get('/layanan', [MainController::class, 'layanan'])->name('layanan');
// Public Books Route
Route::get('/books', [BookController::class, 'index'])->name('books.index');

// Authentication Routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/process', [AuthController::class, 'loginProcess'])->name('login.process');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/process', [AuthController::class, 'registerProcess'])->name('register.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // Page Management Routes
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda.index');
    Route::post('/beranda', [BerandaController::class, 'store'])->name('beranda.store');
    Route::post('/beranda/categories', [BerandaController::class, 'storeCategory'])->name('beranda.categories.store');
    Route::put('/beranda/categories/{category}', [BerandaController::class, 'updateCategory'])->name('beranda.categories.update');
    Route::delete('/beranda/categories/{category}', [BerandaController::class, 'deleteCategory'])->name('beranda.categories.delete');
    Route::post('/beranda/popular-books', [BerandaController::class, 'storePopularBook'])->name('beranda.popular_books.store');
    Route::put('/beranda/popular-books/{popularBook}', [BerandaController::class, 'updatePopularBook'])->name('beranda.popular_books.update');
    Route::delete('/beranda/popular-books/{popularBook}', [BerandaController::class, 'deletePopularBook'])->name('beranda.popular_books.delete');
    Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi.index');
    Route::post('/informasi', [InformasiController::class, 'store'])->name('informasi.store');

    // Menggunakan Route::resource untuk manajemen berita
    Route::resource('berita', App\Http\Controllers\Admin\BeritaController::class);

    Route::get('/bantuan', [BantuanController::class, 'index'])->name('bantuan.index');
    Route::post('/bantuan', [BantuanController::class, 'store'])->name('bantuan.store');
    Route::post('/bantuan/faqs', [BantuanController::class, 'storeFaq'])->name('bantuan.faqs.store');
    Route::put('/bantuan/faqs/{faq}', [BantuanController::class, 'updateFaq'])->name('bantuan.faqs.update');
    Route::delete('/bantuan/faqs/{faq}', [BantuanController::class, 'deleteFaq'])->name('bantuan.faqs.delete');
    Route::get('/pustakawan', [PustakawanController::class, 'index'])->name('pustakawan.index');
    Route::post('/pustakawan', [PustakawanController::class, 'store'])->name('pustakawan.store');
    Route::post('/pustakawan/librarians', [PustakawanController::class, 'storeLibrarian'])->name('pustakawan.librarians.store');
    Route::put('/pustakawan/librarians/{librarian}', [PustakawanController::class, 'updateLibrarian'])->name('pustakawan.librarians.update');
    Route::delete('/pustakawan/librarians/{librarian}', [PustakawanController::class, 'deleteLibrarian'])->name('pustakawan.librarians.delete');
    
    // Visitor Management Routes
    Route::get('/pengunjung', [PengunjungController::class, 'index'])->name('pengunjung.index');
    Route::post('/pengunjung', [PengunjungController::class, 'store'])->name('pengunjung.store');
    Route::put('/pengunjung/{visitor}', [PengunjungController::class, 'update'])->name('pengunjung.update');
    Route::delete('/pengunjung/{visitor}', [PengunjungController::class, 'destroy'])->name('pengunjung.destroy');
    
    Route::get('/members', [AdminController::class, 'members'])->name('admin.members');
    // Books Admin routes (re-add the correct admin route for books if needed, or if it was resource route before)
    // The original admin books routes seems to be a resource or specific routes for create, store, etc.
    // Since the original was Route::get('/books', [App\Http\Controllers\Admin\BookController::class, 'index'])->name('books');
    // I will replace it with the correct Admin\BookController index route.
    Route::resource('books', AdminBookController::class);
    // Loans routes
    Route::get('/loans', [App\Http\Controllers\Admin\LoanController::class, 'index'])->name('loans');
    Route::post('/loans', [App\Http\Controllers\Admin\LoanController::class, 'store'])->name('loans.store');
    Route::put('/loans/{loan}', [App\Http\Controllers\Admin\LoanController::class, 'update'])->name('loans.update');
    Route::delete('/loans/{loan}', [App\Http\Controllers\Admin\LoanController::class, 'destroy'])->name('loans.destroy');
    // Settings routes
    Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings');
    Route::post('/settings', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
    Route::post('/layanan', [LayananController::class, 'store'])->name('layanan.store');
    Route::put('/layanan/{service}', [LayananController::class, 'update'])->name('layanan.update');
    Route::delete('/layanan/{service}', [LayananController::class, 'destroy'])->name('layanan.destroy');
    Route::post('/layanan/update-order', [LayananController::class, 'updateOrder'])->name('layanan.update-order');
});
