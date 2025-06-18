@extends('layouts.admin')

@section('title', 'Tambah Berita Baru')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Berita Baru</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 fw-bold text-primary">Form Tambah Berita</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Berita</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Konten Berita</label>
                    <textarea class="form-control" id="content" name="content" rows="8" required>{{ old('content') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Berita</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <small class="text-muted">Opsional. Format yang didukung: JPG, PNG, GIF. Maksimal ukuran: 2MB</small>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Berita</button>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection 