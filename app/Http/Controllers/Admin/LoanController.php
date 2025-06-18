<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loan;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Implementasi untuk menampilkan daftar peminjaman
        return view('admin.loans.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Implementasi untuk menyimpan peminjaman baru
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        // Implementasi untuk menampilkan detail peminjaman
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
        // Implementasi untuk memperbarui peminjaman
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        // Implementasi untuk menghapus peminjaman
    }
} 