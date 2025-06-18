@extends('layouts.admin')

@section('title', 'Kelola Buku')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Buku</h1>
        <a href="{{ route('admin.books.create') }}" class="btn btn-primary px-4 py-2 rounded-4">
            <i class="fas fa-plus me-2"></i>Tambah Buku
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow p-4 rounded-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Icon</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <td>
                            @if($book->icon)
                                <i class="{{ $book->icon }} fa-2x"></i>
                            @else
                                <i class="fas fa-book fa-2x text-muted"></i>
                            @endif
                        </td>
                        <td><strong>{{ $book->title }}</strong></td>
                        <td>{{ $book->category->name ?? 'Tidak Ada' }}</td>
                        <td>{{ $book->stock }}</td>
                        <td>
                            <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-warning btn-sm rounded-3">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-danger btn-sm rounded-3" data-bs-toggle="modal" data-bs-target="#deleteBookModal" data-id="{{ $book->id }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    @if($books->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada buku.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end mt-4">
            {{ $books->links() }}
        </div>
    </div>

    <!-- Delete Book Modal -->
    <div class="modal fade" id="deleteBookModal" tabindex="-1" aria-labelledby="deleteBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-4 rounded-4">
                <h5 class="modal-title mb-3" id="deleteBookModalLabel">Hapus Buku</h5>
                <form id="deleteBookForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <p>Apakah Anda yakin ingin menghapus buku ini? Tindakan ini tidak dapat dibatalkan.</p>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2 rounded-4" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger rounded-4">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var deleteBookModal = document.getElementById('deleteBookModal');
    deleteBookModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var bookId = button.getAttribute('data-id');
        var deleteBookForm = deleteBookModal.querySelector('#deleteBookForm');
        deleteBookForm.action = '{{ url('admin/books') }}/' + bookId;
    });
});
</script>
@endsection 