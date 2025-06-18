@extends('layouts.admin')

@section('title', 'Kelola Beranda')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Beranda</h1>
    </div>

   
  
    <!-- Kategori Section Management -->
    <div class="card shadow p-4 rounded-4 mb-4">
        <h5 class="mb-4">Manajemen Kategori</h5>
        <p>Di sini Anda dapat menambahkan, mengedit, atau menghapus kategori buku.</p>
        <form action="{{ route('admin.beranda.categories.store') }}" method="POST" class="mb-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="categoryName" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control rounded-3 @error('name') is-invalid @enderror" id="categoryName" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="categoryImage" class="form-label">Ikon Kategori (Font Awesome Class)</label>
                <select name="icon" id="categoryIcon" class="form-control rounded-3 @error('icon') is-invalid @enderror" required>
                    <option value="" disabled selected>Pilih ikon</option>
                    <option value="fas fa-book">Buku</option>
                    <option value="fas fa-folder">Folder</option>
                    <option value="fas fa-graduation-cap">Edukasi</option>
                    <option value="fas fa-flask">Sains</option>
                    <option value="fas fa-laptop-code">Teknologi</option>
                    <option value="fas fa-lightbulb">Ide</option>
                    <option value="fas fa-palette">Seni</option>
                    <option value="fas fa-music">Musik</option>
                    <option value="fas fa-film">Film</option>
                    <option value="fas fa-utensils">Kuliner</option>
                    <option value="fas fa-heartbeat">Kesehatan</option>
                    <option value="fas fa-globe">Dunia</option>
                    <option value="fas fa-gavel">Hukum</option>
                    <option value="fas fa-leaf">Alam</option>
                    <option value="fas fa-shopping-cart">Belanja</option>
                    <option value="fas fa-users">Sosial</option>
                    <option value="fas fa-handshake">Bisnis</option>
                    <option value="fas fa-car">Otomotif</option>
                    <option value="fas fa-bicycle">Olahraga</option>
                </select>
                @error('icon')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary px-4 py-2 rounded-4">Tambah Kategori Baru</button>
        </form>

        <h5 class="mb-4">Daftar Kategori yang Ada:</h5>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Ikon</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>
                            @if($category->icon)
                            <i class="{{ $category->icon }} fa-2x"></i>
                            @endif
                        </td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <button class="btn btn-danger btn-sm rounded-3" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal" data-id="{{ $category->id }}">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                    @if($categories->isEmpty())
                    <tr>
                        <td colspan="3" class="text-center text-muted">Belum ada kategori.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Category Modal -->
    <div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-4 rounded-4">
                <h5 class="modal-title mb-3" id="deleteCategoryModalLabel">Hapus Kategori</h5>
                <form id="deleteCategoryForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <p>Apakah Anda yakin ingin menghapus kategori ini? Tindakan ini tidak dapat dibatalkan.</p>
                    <input type="hidden" name="_category_id" id="deleteCategoryId">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2 rounded-4" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger rounded-4">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Koleksi Populer Section Management -->
    <div class="card shadow p-4 rounded-4 mb-4">
        <h5 class="mb-4">Manajemen Koleksi Populer</h5>
        <p>Di sini Anda dapat menentukan buku-buku yang muncul di bagian Koleksi Populer.</p>
        <form action="{{ route('admin.beranda.popular_books.store') }}" method="POST" class="mb-4" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="bookTitle" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control rounded-3 @error('title') is-invalid @enderror" id="bookTitle" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="bookAuthor" class="form-label">Pengarang</label>
                    <input type="text" class="form-control rounded-3 @error('author') is-invalid @enderror" id="bookAuthor" name="author" value="{{ old('author') }}" required>
                    @error('author')
                        <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="bookIcon" class="form-label">Ikon Buku (Font Awesome Class)</label>
                    <select name="icon" id="bookIcon" class="form-control rounded-3 @error('icon') is-invalid @enderror" required>
                        <option value="" disabled selected>Pilih ikon</option>
                        <option value="fas fa-book">Buku</option>
                        <option value="fas fa-book-open">Buku Terbuka</option>
                        <option value="fas fa-bookmark">Bookmark</option>
                        <option value="fas fa-scroll">Gulungan</option>
                        <option value="fas fa-atlas">Atlas</option>
                        <option value="fas fa-globe">Globe</option>
                        <option value="fas fa-newspaper">Koran</option>
                        <option value="fas fa-file-alt">File Teks</option>
                        <option value="fas fa-laptop-code">Laptop Kode</option>
                        <option value="fas fa-lightbulb">Bohlam (Ide)</option>
                        <option value="fas fa-graduation-cap">Topi Wisuda</option>
                        <option value="fas fa-pencil-alt">Pensil</option>
                        <option value="fas fa-feather-alt">Bulu</option>
                        <option value="fas fa-quote-right">Kutipan</option>
                        <option value="fas fa-search">Cari</option>
                        <option value="fas fa-history">Riwayat</option>
                        <option value="fas fa-info-circle">Info</option>
                        <option value="fas fa-question-circle">Pertanyaan</option>
                        <option value="fas fa-exclamation-triangle">Peringatan</option>
                    </select>
                    @error('icon')
                        <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="bookColor" class="form-label">Warna (Bootstrap Color)</label>
                    <select name="color" id="bookColor" class="form-control rounded-3 @error('color') is-invalid @enderror" required>
                        <option value="primary">Biru</option>
                        <option value="success">Hijau</option>
                        <option value="danger">Merah</option>
                        <option value="warning">Kuning</option>
                        <option value="info">Cyan</option>
                        <option value="purple">Ungu</option>
                    </select>
                    @error('color')
                        <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3 px-4 py-2 rounded-4">Tambah Buku Populer Baru</button>
        </form>

        <h5 class="mb-4">Daftar Koleksi Populer yang Ada:</h5>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Ikon</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Warna</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($popularBooks as $book)
                    <tr>
                        <td>
                            @if($book->icon)
                            <i class="{{ $book->icon }} fa-2x"></i>
                            @endif
                        </td>
                        <td><strong>{{ $book->title }}</strong></td>
                        <td>{{ $book->author }}</td>
                        <td><span class="badge bg-{{ $book->color }}">{{ ucfirst($book->color) }}</span></td>
                        <td>
                            <button class="btn btn-danger btn-sm rounded-3" data-bs-toggle="modal" data-bs-target="#deletePopularBookModal" data-id="{{ $book->id }}">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                    @if($popularBooks->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada buku populer.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Popular Book Modal -->
    <div class="modal fade" id="deletePopularBookModal" tabindex="-1" aria-labelledby="deletePopularBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-4 rounded-4">
                <h5 class="modal-title mb-3" id="deletePopularBookModalLabel">Hapus Buku Populer</h5>
                <form id="deletePopularBookForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <p>Apakah Anda yakin ingin menghapus buku populer ini? Tindakan ini tidak dapat dibatalkan.</p>
                    <input type="hidden" name="_popular_book_id" id="deletePopularBookId">
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
    // Script for Delete Category Modal
    var deleteCategoryModal = document.getElementById('deleteCategoryModal');
    deleteCategoryModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var categoryId = button.getAttribute('data-id');

        var deleteCategoryIdInput = deleteCategoryModal.querySelector('#deleteCategoryId');
        var deleteCategoryForm = deleteCategoryModal.querySelector('#deleteCategoryForm');

        deleteCategoryIdInput.value = categoryId;
        deleteCategoryForm.action = '{{ url('admin/beranda/categories') }}/' + categoryId;
    });

    // Script for Delete Popular Book Modal
    var deletePopularBookModal = document.getElementById('deletePopularBookModal');
    deletePopularBookModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var bookId = button.getAttribute('data-id');

        var deletePopularBookIdInput = deletePopularBookModal.querySelector('#deletePopularBookId');
        var deletePopularBookForm = deletePopularBookModal.querySelector('#deletePopularBookForm');

        deletePopularBookIdInput.value = bookId;
        deletePopularBookForm.action = '{{ url('admin/beranda/popular-books') }}/' + bookId;
    });
});
</script>
@endsection 