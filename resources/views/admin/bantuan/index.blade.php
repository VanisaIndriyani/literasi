@extends('layouts.admin')

@section('title', 'Kelola Bantuan')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Bantuan</h1>
    </div>

    <div class="card shadow p-4 rounded-4 mb-4">
        <h5 class="mb-4">Manajemen Konten Bantuan</h5>
        <p>Di sini Anda dapat mengelola pertanyaan yang sering diajukan dan jawabannya, serta informasi kontak bantuan.</p>
        <form action="{{ route('admin.bantuan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="contactEmail" class="form-label">Email Kontak Bantuan</label>
                <input type="email" class="form-control rounded-3 @error('contact_email') is-invalid @enderror" id="contactEmail" name="contact_email" value="{{ old('contact_email', $settings->contact_email) }}">
                @error('contact_email')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary px-4 py-2 rounded-4">Simpan Perubahan Kontak Bantuan</button>
        </form>
        
        <hr class="my-4">

        <form action="{{ route('admin.bantuan.store') }}" method="POST">
            @csrf
            <h5 class="mt-4 mb-3">Pengaturan Header Halaman Bantuan</h5>
            <div class="mb-3">
                <label for="headerTitle" class="form-label">Judul Header</label>
                <input type="text" class="form-control rounded-3 @error('header_title') is-invalid @enderror" id="headerTitle" name="header_title" value="{{ old('header_title', $settings->header_title) }}">
                @error('header_title')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="headerSubtitle" class="form-label">Sub-judul Header</label>
                <textarea class="form-control rounded-3 @error('header_subtitle') is-invalid @enderror" id="headerSubtitle" name="header_subtitle" rows="2">{{ old('header_subtitle', $settings->header_subtitle) }}</textarea>
                @error('header_subtitle')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>

            <hr class="my-4">

            <h5 class="mt-4 mb-3">Pengaturan Kategori FAQ</h5>
            <div class="row">
                <div class="col-md-4">
                    <h6>Kategori 1 (Peminjaman Buku)</h6>
                    <div class="mb-3">
                        <label for="category1Title" class="form-label">Judul Kategori 1</label>
                        <input type="text" class="form-control rounded-3 @error('category_1_title') is-invalid @enderror" id="category1Title" name="category_1_title" value="{{ old('category_1_title', $settings->category_1_title) }}">
                        @error('category_1_title')
                            <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category1Description" class="form-label">Deskripsi Kategori 1</label>
                        <textarea class="form-control rounded-3 @error('category_1_description') is-invalid @enderror" id="category1Description" name="category_1_description" rows="3">{{ old('category_1_description', $settings->category_1_description) }}</textarea>
                        @error('category_1_description')
                            <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <h6>Kategori 2 (Keanggotaan)</h6>
                    <div class="mb-3">
                        <label for="category2Title" class="form-label">Judul Kategori 2</label>
                        <input type="text" class="form-control rounded-3 @error('category_2_title') is-invalid @enderror" id="category2Title" name="category_2_title" value="{{ old('category_2_title', $settings->category_2_title) }}">
                        @error('category_2_title')
                            <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category2Description" class="form-label">Deskripsi Kategori 2</label>
                        <textarea class="form-control rounded-3 @error('category_2_description') is-invalid @enderror" id="category2Description" name="category_2_description" rows="3">{{ old('category_2_description', $settings->category_2_description) }}</textarea>
                        @error('category_2_description')
                            <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <h6>Kategori 3 (Pencarian Koleksi)</h6>
                    <div class="mb-3">
                        <label for="category3Title" class="form-label">Judul Kategori 3</label>
                        <input type="text" class="form-control rounded-3 @error('category_3_title') is-invalid @enderror" id="category3Title" name="category_3_title" value="{{ old('category_3_title', $settings->category_3_title) }}">
                        @error('category_3_title')
                            <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category3Description" class="form-label">Deskripsi Kategori 3</label>
                        <textarea class="form-control rounded-3 @error('category_3_description') is-invalid @enderror" id="category3Description" name="category_3_description" rows="3">{{ old('category_3_description', $settings->category_3_description) }}</textarea>
                        @error('category_3_description')
                            <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <h5 class="mt-4 mb-3">Pengaturan Bagian Kontak</h5>
            <div class="mb-3">
                <label for="contactSectionTitle" class="form-label">Judul Bagian Kontak</label>
                <input type="text" class="form-control rounded-3 @error('contact_section_title') is-invalid @enderror" id="contactSectionTitle" name="contact_section_title" value="{{ old('contact_section_title', $settings->contact_section_title) }}">
                @error('contact_section_title')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="contactSectionSubtitle" class="form-label">Sub-judul Bagian Kontak</label>
                <textarea class="form-control rounded-3 @error('contact_section_subtitle') is-invalid @enderror" id="contactSectionSubtitle" name="contact_section_subtitle" rows="2">{{ old('contact_section_subtitle', $settings->contact_section_subtitle) }}</textarea>
                @error('contact_section_subtitle')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="contactWhatsappLink" class="form-label">Link WhatsApp (e.g., https://wa.me/6281234567890)</label>
                <input type="url" class="form-control rounded-3 @error('contact_whatsapp_link') is-invalid @enderror" id="contactWhatsappLink" name="contact_whatsapp_link" value="{{ old('contact_whatsapp_link', $settings->contact_whatsapp_link) }}">
                @error('contact_whatsapp_link')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="contactTelegramLink" class="form-label">Link Telegram (e.g., https://t.me/username)</label>
                <input type="url" class="form-control rounded-3 @error('contact_telegram_link') is-invalid @enderror" id="contactTelegramLink" name="contact_telegram_link" value="{{ old('contact_telegram_link', $settings->contact_telegram_link) }}">
                @error('contact_telegram_link')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary px-4 py-2 rounded-4">Simpan Perubahan Pengaturan Halaman Bantuan</button>
        </form>
        
        <hr class="my-4">

        <h5 class="mb-4">Daftar FAQ yang Ada:</h5>
        <form action="{{ route('admin.bantuan.faqs.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="mb-3">
                <label for="faqQuestion" class="form-label">Pertanyaan FAQ</label>
                <input type="text" class="form-control rounded-3 @error('question') is-invalid @enderror" id="faqQuestion" name="question" required>
                @error('question')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="faqAnswer" class="form-label">Jawaban FAQ</label>
                <textarea class="form-control rounded-3 @error('answer') is-invalid @enderror" id="faqAnswer" name="answer" rows="3" required></textarea>
                @error('answer')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary px-4 py-2 rounded-4">Tambah FAQ Baru</button>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Pertanyaan</th>
                        <th>Jawaban</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($faqs as $faq)
                    <tr>
                        <td><strong>Q:</strong> {{ $faq->question }}</td>
                        <td><strong>A:</strong> {{ $faq->answer }}</td>
                        <td>
                            <button class="btn btn-danger btn-sm rounded-3" data-bs-toggle="modal" data-bs-target="#deleteFaqModal" data-id="{{ $faq->id }}">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                    @if($faqs->isEmpty())
                    <tr>
                        <td colspan="3" class="text-center text-muted">Belum ada FAQ.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete FAQ Modal -->
    <div class="modal fade" id="deleteFaqModal" tabindex="-1" aria-labelledby="deleteFaqModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-4 rounded-4">
                <h5 class="modal-title mb-3" id="deleteFaqModalLabel">Hapus FAQ</h5>
                <form id="deleteFaqForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <p>Apakah Anda yakin ingin menghapus FAQ ini? Tindakan ini tidak dapat dibatalkan.</p>
                    <input type="hidden" name="_faq_id" id="deleteFaqId">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2 rounded-4" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger rounded-4">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Script for Delete FAQ Modal
    var deleteFaqModal = document.getElementById('deleteFaqModal');
    deleteFaqModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var faqId = button.getAttribute('data-id');

        var deleteFaqIdInput = deleteFaqModal.querySelector('#deleteFaqId');
        var deleteFaqForm = deleteFaqModal.querySelector('#deleteFaqForm');

        deleteFaqIdInput.value = faqId;
        deleteFaqForm.action = '{{ url('admin/bantuan/faqs') }}/' + faqId;
    });
});
</script>
@endsection 