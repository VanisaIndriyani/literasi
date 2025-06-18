@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Berita</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 fw-bold text-primary">Manajemen Berita dan Artikel</h6>
        </div>
        <div class="card-body">
            <p>Di sini Anda dapat menambahkan, mengedit, atau menghapus berita dan artikel.</p>
            <a href="{{ route('admin.berita.create') }}" class="btn btn-primary mb-3">Tambah Berita Baru</a>
            
            <div class="row g-4">
                @foreach($news as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-hover news-card">
                        <div class="card-img-wrapper p-3 text-center" style="min-height: 200px; display: flex; align-items: center; justify-content: center;">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid news-card-image" alt="{{ $item->title }}">
                            @else
                                <i class="fas fa-newspaper fa-4x text-muted"></i> <!-- Fallback icon -->
                            @endif
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title mb-3">{{ $item->title }}</h5>
                            <p class="text-muted small mb-0">
                                <i class="fas fa-calendar-alt me-2"></i>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-0 d-flex justify-content-end gap-2 p-4 pt-0">
                            <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteNewsModal" data-id="{{ $item->id }}">Hapus</button>
                        </div>
                    </div>
                </div>
                @endforeach
                @if($news->isEmpty())
                <div class="col-12">
                    <p class="text-center text-muted">Belum ada berita.</p>
                </div>
                @endif
            </div>

            <!-- Pagination -->
            <nav class="mt-5">
                <ul class="pagination justify-content-center gap-2">
                    {{ $news->links() }}
                </ul>
            </nav>
            
        </div>
    </div>
</div>

<!-- Delete News Modal -->
<div class="modal fade" id="deleteNewsModal" tabindex="-1" aria-labelledby="deleteNewsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteNewsModalLabel">Hapus Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus berita ini? Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <form id="deleteNewsForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var deleteNewsModal = document.getElementById('deleteNewsModal');
        deleteNewsModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var newsId = button.getAttribute('data-id');
            var deleteNewsForm = deleteNewsModal.querySelector("#deleteNewsForm");
            deleteNewsForm.action = "{{ url('admin/berita') }}/" + newsId;
        });
    });
</script>


<style>
.news-card .card-img-wrapper {
    background-color: #f8f9fa; /* Light background for image area */
    border-bottom: 1px solid #e9ecef;
}
.news-card-image {
    max-width: 100%;
    max-height: 180px;
    object-fit: contain;
}
.news-card .card-body {
    padding-bottom: 0;
}
.news-card .card-footer {
    background-color: #fff;
    border-top: none;
}
</style>
@endsection 