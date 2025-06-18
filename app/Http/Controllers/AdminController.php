<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function members()
    {
        return view('admin.members');
    }

    public function books()
    {
        return view('admin.books');
    }

    public function loans()
    {
        return view('admin.loans');
    }

    public function news()
    {
        return view('admin.news');
    }

    public function settings()
    {
        return view('admin.settings');
    }
}