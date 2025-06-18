@extends('layouts.admin')

@section('title', 'Edit Buku')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Buku</h1>
        <a href="{{ route('admin.books.index') }}" class="btn btn-secondary px-4 py-2 rounded-4">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="card shadow p-4 rounded-4">
        <form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-12">
                    <label for="title" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control rounded-3 @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $book->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select name="category_id" id="category_id" class="form-control rounded-3 @error('category_id') is-invalid @enderror">
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="stock" class="form-label">Stok</label>
                    <input type="number" class="form-control rounded-3 @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock', $book->stock) }}" required min="0">
                    @error('stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="icon" class="form-label">Icon Buku (Font Awesome)</label>
                    <select name="icon" id="icon" class="form-control rounded-3 @error('icon') is-invalid @enderror">
                        <option value="fas fa-book" {{ old('icon', $book->icon) == 'fas fa-book' ? 'selected' : '' }}>Buku</option>
                        <option value="fas fa-book-open" {{ old('icon', $book->icon) == 'fas fa-book-open' ? 'selected' : '' }}>Buku Terbuka</option>
                        <option value="fas fa-bookmark" {{ old('icon', $book->icon) == 'fas fa-bookmark' ? 'selected' : '' }}>Bookmark</option>
                        <option value="fas fa-scroll" {{ old('icon', $book->icon) == 'fas fa-scroll' ? 'selected' : '' }}>Gulungan</option>
                        <option value="fas fa-atlas" {{ old('icon', $book->icon) == 'fas fa-atlas' ? 'selected' : '' }}>Atlas</option>
                        <option value="fas fa-globe" {{ old('icon', $book->icon) == 'fas fa-globe' ? 'selected' : '' }}>Globe</option>
                        <option value="fas fa-newspaper" {{ old('icon', $book->icon) == 'fas fa-newspaper' ? 'selected' : '' }}>Koran</option>
                        <option value="fas fa-file-alt" {{ old('icon', $book->icon) == 'fas fa-file-alt' ? 'selected' : '' }}>File Teks</option>
                        <option value="fas fa-laptop-code" {{ old('icon', $book->icon) == 'fas fa-laptop-code' ? 'selected' : '' }}>Laptop Kode</option>
                        <option value="fas fa-lightbulb" {{ old('icon', $book->icon) == 'fas fa-lightbulb' ? 'selected' : '' }}>Bohlam (Ide)</option>
                        <option value="fas fa-graduation-cap" {{ old('icon', $book->icon) == 'fas fa-graduation-cap' ? 'selected' : '' }}>Topi Wisuda</option>
                        <option value="fas fa-pencil-alt" {{ old('icon', $book->icon) == 'fas fa-pencil-alt' ? 'selected' : '' }}>Pensil</option>
                        <option value="fas fa-feather-alt" {{ old('icon', $book->icon) == 'fas fa-feather-alt' ? 'selected' : '' }}>Bulu</option>
                        <option value="fas fa-quote-right" {{ old('icon', $book->icon) == 'fas fa-quote-right' ? 'selected' : '' }}>Kutipan</option>
                        <option value="fas fa-search" {{ old('icon', $book->icon) == 'fas fa-search' ? 'selected' : '' }}>Cari</option>
                        <option value="fas fa-history" {{ old('icon', $book->icon) == 'fas fa-history' ? 'selected' : '' }}>Riwayat</option>
                        <option value="fas fa-info-circle" {{ old('icon', $book->icon) == 'fas fa-info-circle' ? 'selected' : '' }}>Info</option>
                        <option value="fas fa-question-circle" {{ old('icon', $book->icon) == 'fas fa-question-circle' ? 'selected' : '' }}>Pertanyaan</option>
                        <option value="fas fa-exclamation-triangle" {{ old('icon', $book->icon) == 'fas fa-exclamation-triangle' ? 'selected' : '' }}>Peringatan</option>
                    </select>
                    @error('icon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4 px-4 py-2 rounded-4">Update Buku</button>
        </form>
    </div>
</div>
@endsection 