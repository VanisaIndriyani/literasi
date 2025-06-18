@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Berita</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 fw-bold text-primary">Form Edit Berita</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.berita.update', $beritum->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Berita</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $beritum->title) }}" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Konten Berita</label>
                    <textarea class="form-control" id="content" name="content" rows="8" required>{{ old('content', $beritum->content) }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Berita</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <small class="text-muted">Opsional. Format yang didukung: JPG, PNG, GIF. Maksimal ukuran: 2MB</small>
                    @if($beritum->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $beritum->image) }}" alt="Current Image" style="max-width: 150px; height: auto;">
                            <p class="text-muted mt-1">Gambar saat ini</p>
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Perbarui Berita</button>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection 