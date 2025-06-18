<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('category')->latest()->paginate(10); // Fetch books with their categories
        $categories = Category::all(); // Fetch all categories for dropdown
        return view('admin.books.index', compact('books', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'isbn' => 'nullable|string|max:255',
            'year_published' => 'nullable|integer|min:1000|max:9999',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'stock' => 'nullable|integer|min:0',
            'location' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'media_type' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        Book::create($validatedData);

        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'isbn' => 'nullable|string|max:255',
            'year_published' => 'nullable|integer|min:1000|max:9999',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'stock' => 'nullable|integer|min:0',
            'location' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'media_type' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        $book->update($validatedData);

        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil dihapus!');
    }
} 