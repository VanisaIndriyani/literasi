<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BeritaController;

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
// Add both GET and POST routes for login
Route::get('/login', [App\Http\Controllers\MainController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\MainController::class, 'loginProcess'])->name('login.process');
