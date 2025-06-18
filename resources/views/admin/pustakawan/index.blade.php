@extends('layouts.admin')

@section('title', 'Kelola Pustakawan')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Pustakawan</h1>
    </div>

    <div class="card shadow p-4 rounded-4 mb-4">
        <h5 class="mb-4">Pengaturan Halaman Pustakawan</h5>
        <p>Di sini Anda dapat mengelola teks umum, jam operasional, dan informasi kontak.</p>
        <form action="{{ route('admin.pustakawan.store') }}" method="POST">
            @csrf
            <h5 class="mt-4 mb-3">Pengaturan Header Halaman</h5>
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

            <h5 class="mt-4 mb-3">Pengaturan Jam Operasional</h5>
            <div class="mb-3">
                <label for="operationalHoursMF" class="form-label">Senin - Jumat</label>
                <input type="text" class="form-control rounded-3 @error('operational_hours_mf') is-invalid @enderror" id="operationalHoursMF" name="operational_hours_mf" value="{{ old('operational_hours_mf', $settings->operational_hours_mf) }}" placeholder="Contoh: 08:00 - 16:00">
                @error('operational_hours_mf')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="operationalHoursS" class="form-label">Sabtu</label>
                <input type="text" class="form-control rounded-3 @error('operational_hours_s') is-invalid @enderror" id="operationalHoursS" name="operational_hours_s" value="{{ old('operational_hours_s', $settings->operational_hours_s) }}" placeholder="Contoh: 09:00 - 14:00">
                @error('operational_hours_s')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="operationalHoursSH" class="form-label">Minggu & Hari Libur</label>
                <input type="text" class="form-control rounded-3 @error('operational_hours_sh') is-invalid @enderror" id="operationalHoursSH" name="operational_hours_sh" value="{{ old('operational_hours_sh', $settings->operational_hours_sh) }}" placeholder="Contoh: Tutup">
                @error('operational_hours_sh')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>

            <hr class="my-4">

            <h5 class="mt-4 mb-3">Pengaturan Layanan Khusus</h5>
            <div class="mb-3">
                <label for="specialServiceConsultation" class="form-label">Konsultasi Penelitian</label>
                <input type="text" class="form-control rounded-3 @error('special_service_consultation') is-invalid @enderror" id="specialServiceConsultation" name="special_service_consultation" value="{{ old('special_service_consultation', $settings->special_service_consultation) }}" placeholder="Contoh: Senin & Rabu (09:00 - 12:00)">
                @error('special_service_consultation')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="specialServiceTraining" class="form-label">Pelatihan Literasi</label>
                <input type="text" class="form-control rounded-3 @error('special_service_training') is-invalid @enderror" id="specialServiceTraining" name="special_service_training" value="{{ old('special_service_training', $settings->special_service_training) }}" placeholder="Contoh: Jumat (13:00 - 15:00)">
                @error('special_service_training')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="specialServiceGuidance" class="form-label">Bimbingan Pengguna</label>
                <input type="text" class="form-control rounded-3 @error('special_service_guidance') is-invalid @enderror" id="specialServiceGuidance" name="special_service_guidance" value="{{ old('special_service_guidance', $settings->special_service_guidance) }}" placeholder="Contoh: Setiap hari kerja (dengan perjanjian)">
                @error('special_service_guidance')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
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
                <label for="phone" class="form-label">Telepon</label>
                <input type="text" class="form-control rounded-3 @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $settings->phone) }}">
                @error('phone')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control rounded-3 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $settings->email) }}">
                @error('email')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="whatsapp" class="form-label">WhatsApp</label>
                <input type="text" class="form-control rounded-3 @error('whatsapp') is-invalid @enderror" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $settings->whatsapp) }}">
                @error('whatsapp')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary px-4 py-2 rounded-4">Simpan Perubahan Pengaturan</button>
        </form>
    </div>

    <div class="card shadow p-4 rounded-4 mb-4">
        <h5 class="mb-4">Manajemen Profil Pustakawan</h5>
        <p>Tambah, edit, atau hapus profil pustakawan yang akan ditampilkan di halaman depan.</p>
        <form action="{{ route('admin.pustakawan.librarians.store') }}" method="POST" class="mb-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="librarianName" class="form-label">Nama Pustakawan</label>
                <input type="text" class="form-control rounded-3 @error('name') is-invalid @enderror" id="librarianName" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="librarianPosition" class="form-label">Jabatan</label>
                <input type="text" class="form-control rounded-3 @error('position') is-invalid @enderror" id="librarianPosition" name="position" value="{{ old('position') }}">
                @error('position')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="librarianDescription" class="form-label">Deskripsi Singkat</label>
                <textarea class="form-control rounded-3 @error('description') is-invalid @enderror" id="librarianDescription" name="description" rows="3">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="librarianImage" class="form-label">Gambar Pustakawan</label>
                <input type="file" class="form-control rounded-3 @error('image') is-invalid @enderror" id="librarianImage" name="image" accept="image/*">
                <small class="text-muted">Format: JPG, PNG, GIF. Maks: 2MB</small>
                @error('image')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
                <div id="librarianImagePreview" class="mt-2"></div>
            </div>
            <div class="mb-3">
                <label for="librarianLinkedin" class="form-label">Link LinkedIn</label>
                <input type="url" class="form-control rounded-3 @error('linkedin') is-invalid @enderror" id="librarianLinkedin" name="linkedin" value="{{ old('linkedin') }}">
                @error('linkedin')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="librarianTwitter" class="form-label">Link Twitter</label>
                <input type="url" class="form-control rounded-3 @error('twitter') is-invalid @enderror" id="librarianTwitter" name="twitter" value="{{ old('twitter') }}">
                @error('twitter')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="librarianEmail" class="form-label">Email Pustakawan</label>
                <input type="email" class="form-control rounded-3 @error('email') is-invalid @enderror" id="librarianEmail" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary px-4 py-2 rounded-4">Tambah Pustakawan Baru</button>
        </form>

        <hr class="my-4">

        <h5 class="mb-4">Daftar Pustakawan yang Ada:</h5>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Kontak</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($librarians as $librarian)
                    <tr>
                        <td>
                            @if($librarian->image)
                            <img src="{{ asset('storage/' . $librarian->image) }}" alt="{{ $librarian->name }}" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                            <i class="fas fa-user-circle fa-2x text-muted"></i>
                            @endif
                        </td>
                        <td><strong>{{ $librarian->name }}</strong></td>
                        <td>{{ $librarian->position }}</td>
                        <td>
                            @if($librarian->email) Email: {{ $librarian->email }}<br> @endif
                            @if($librarian->linkedin) LinkedIn: <a href="{{ $librarian->linkedin }}" target="_blank">Link</a><br> @endif
                            @if($librarian->twitter) Twitter: <a href="{{ $librarian->twitter }}" target="_blank">Link</a> @endif
                        </td>
                        <td><em><small>{{ $librarian->description }}</small></em></td>
                        <td>
                            <button class="btn btn-info btn-sm rounded-3 me-2" data-bs-toggle="modal" data-bs-target="#editLibrarianModal"
                                    data-id="{{ $librarian->id }}"
                                    data-name="{{ $librarian->name }}"
                                    data-position="{{ $librarian->position }}"
                                    data-description="{{ $librarian->description }}"
                                    data-image="{{ $librarian->image }}"
                                    data-linkedin="{{ $librarian->linkedin }}"
                                    data-twitter="{{ $librarian->twitter }}"
                                    data-email="{{ $librarian->email }}">Edit</button>
                            <button class="btn btn-danger btn-sm rounded-3" data-bs-toggle="modal" data-bs-target="#deleteLibrarianModal" data-id="{{ $librarian->id }}">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                    @if($librarians->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada pustakawan.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Edit Librarian Modal -->
    <div class="modal fade" id="editLibrarianModal" tabindex="-1" aria-labelledby="editLibrarianModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-4 rounded-4">
                <h5 class="modal-title mb-3" id="editLibrarianModalLabel">Edit Pustakawan</h5>
                <form id="editLibrarianForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="_librarian_id" id="editLibrarianId">
                    <div class="mb-3">
                        <label for="editLibrarianName" class="form-label">Nama Pustakawan</label>
                        <input type="text" class="form-control rounded-3" id="editLibrarianName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editLibrarianPosition" class="form-label">Jabatan</label>
                        <input type="text" class="form-control rounded-3" id="editLibrarianPosition" name="position">
                    </div>
                    <div class="mb-3">
                        <label for="editLibrarianDescription" class="form-label">Deskripsi Singkat</label>
                        <textarea class="form-control rounded-3" id="editLibrarianDescription" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editLibrarianImage" class="form-label">Gambar Pustakawan</label>
                        <input type="file" class="form-control rounded-3" id="editLibrarianImage" name="image" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, GIF. Maks: 2MB</small>
                        <div id="currentLibrarianImage" class="mt-2">
                            <img src="" alt="Current Image" class="rounded-circle" style="max-width: 100px; max-height: 100px; object-fit: cover; display: none;">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="editLibrarianLinkedin" class="form-label">Link LinkedIn</label>
                        <input type="url" class="form-control rounded-3" id="editLibrarianLinkedin" name="linkedin">
                    </div>
                    <div class="mb-3">
                        <label for="editLibrarianTwitter" class="form-label">Link Twitter</label>
                        <input type="url" class="form-control rounded-3" id="editLibrarianTwitter" name="twitter">
                    </div>
                    <div class="mb-3">
                        <label for="editLibrarianEmail" class="form-label">Email Pustakawan</label>
                        <input type="email" class="form-control rounded-3" id="editLibrarianEmail" name="email">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2 rounded-4" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary rounded-4">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Librarian Modal -->
    <div class="modal fade" id="deleteLibrarianModal" tabindex="-1" aria-labelledby="deleteLibrarianModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-4 rounded-4">
                <h5 class="modal-title mb-3" id="deleteLibrarianModalLabel">Hapus Pustakawan</h5>
                <form id="deleteLibrarianForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <p>Apakah Anda yakin ingin menghapus profil pustakawan ini? Tindakan ini tidak dapat dibatalkan.</p>
                    <input type="hidden" name="_librarian_id" id="deleteLibrarianId">
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
    // Script for Edit Librarian Modal
    var editLibrarianModal = document.getElementById('editLibrarianModal');
    editLibrarianModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var librarianId = button.getAttribute('data-id');
        var librarianName = button.getAttribute('data-name');
        var librarianPosition = button.getAttribute('data-position');
        var librarianDescription = button.getAttribute('data-description');
        var librarianImage = button.getAttribute('data-image');
        var librarianLinkedin = button.getAttribute('data-linkedin');
        var librarianTwitter = button.getAttribute('data-twitter');
        var librarianEmail = button.getAttribute('data-email');

        var modalTitle = editLibrarianModal.querySelector('.modal-title');
        var librarianIdInput = editLibrarianModal.querySelector('#editLibrarianId');
        var librarianNameInput = editLibrarianModal.querySelector('#editLibrarianName');
        var librarianPositionInput = editLibrarianModal.querySelector('#editLibrarianPosition');
        var librarianDescriptionInput = editLibrarianModal.querySelector('#editLibrarianDescription');
        var currentLibrarianImage = editLibrarianModal.querySelector('#currentLibrarianImage img');
        var librarianLinkedinInput = editLibrarianModal.querySelector('#editLibrarianLinkedin');
        var librarianTwitterInput = editLibrarianModal.querySelector('#editLibrarianTwitter');
        var librarianEmailInput = editLibrarianModal.querySelector('#editLibrarianEmail');
        var editLibrarianForm = editLibrarianModal.querySelector('#editLibrarianForm');

        modalTitle.textContent = 'Edit Pustakawan: ' + librarianName;
        librarianIdInput.value = librarianId;
        librarianNameInput.value = librarianName;
        librarianPositionInput.value = librarianPosition;
        librarianDescriptionInput.value = librarianDescription;
        
        if (librarianImage) {
            currentLibrarianImage.src = '{{ asset('storage/') }}/' + librarianImage;
            currentLibrarianImage.style.display = 'block';
        } else {
            currentLibrarianImage.style.display = 'none';
        }

        librarianLinkedinInput.value = librarianLinkedin;
        librarianTwitterInput.value = librarianTwitter;
        librarianEmailInput.value = librarianEmail;
        editLibrarianForm.action = '{{ url('admin/pustakawan/librarians') }}/' + librarianId;
    });

    document.getElementById('librarianImage').addEventListener('change', function(e) {
        if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var preview = document.createElement('img');
                preview.src = e.target.result;
                preview.style.maxWidth = '100px';
                preview.style.maxHeight = '100px';
                preview.style.marginTop = '10px';
                preview.style.objectFit = 'cover';
                preview.classList.add('rounded-3'); // Add rounded-3 class
                
                var container = document.getElementById('librarianImagePreview');
                container.innerHTML = '';
                container.appendChild(preview);
            }
            reader.readAsDataURL(e.target.files[0]);
        } else {
            document.getElementById('librarianImagePreview').innerHTML = '';
        }
    });

    document.getElementById('editLibrarianImage').addEventListener('change', function(e) {
        if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var preview = document.getElementById('currentLibrarianImage').querySelector('img');
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(e.target.files[0]);
        } else {
            document.getElementById('currentLibrarianImage').querySelector('img').style.display = 'none';
        }
    });

    var deleteLibrarianModal = document.getElementById('deleteLibrarianModal');
    deleteLibrarianModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var librarianId = button.getAttribute('data-id');

        var deleteLibrarianIdInput = deleteLibrarianModal.querySelector('#deleteLibrarianId');
        var deleteLibrarianForm = deleteLibrarianModal.querySelector('#deleteLibrarianForm');

        deleteLibrarianIdInput.value = librarianId;
        deleteLibrarianForm.action = '{{ url('admin/pustakawan/librarians') }}/' + librarianId;
    });
});
</script>
@endsection 