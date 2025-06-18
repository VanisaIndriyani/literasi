@extends('layouts.admin')

@section('title', 'Kelola Informasi')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Informasi</h1>
    </div>

    <div class="card shadow p-4 rounded-4 mb-4">
        <h5 class="mb-4">Manajemen Konten Informasi</h5>
        <p>Di sini Anda dapat mengelola berbagai informasi yang ditampilkan di halaman Informasi.</p>
        <form action="{{ route('admin.informasi.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="infoContent" class="form-label">Konten Informasi</label>
                <textarea class="form-control rounded-3 @error('content') is-invalid @enderror" id="infoContent" name="content" rows="10">{{ old('content', $information->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary px-4 py-2 rounded-4">Simpan Perubahan Informasi</button>
        </form>
    </div>
</div>
@endsection