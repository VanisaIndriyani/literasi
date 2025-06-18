@extends('layouts.admin')

@section('title', 'Kelola Layanan')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Layanan</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 fw-bold text-primary">Tambah Layanan Baru</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.layanan.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Layanan</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="icon" class="form-label">Ikon (Font Awesome Class)</label>
                    <input type="text" class="form-control" id="icon" name="icon" placeholder="e.g., fas fa-book">
                    <small class="text-muted">Gunakan kelas Font Awesome untuk ikon. Contoh: fas fa-book, fas fa-users, dll.</small>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" checked>
                        <label class="form-check-label" for="is_active">Aktif</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="order" class="form-label">Urutan</label>
                    <input type="number" class="form-control" id="order" name="order" value="0" min="0">
                </div>
                <button type="submit" class="btn btn-primary">Tambah Layanan</button>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 fw-bold text-primary">Daftar Layanan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="servicesTable">
                    <thead>
                        <tr>
                            <th style="width: 50px">Urutan</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Ikon</th>
                            <th>Status</th>
                            <th style="width: 150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                        <tr data-id="{{ $service->id }}">
                            <td>
                                <input type="number" class="form-control form-control-sm order-input" 
                                       value="{{ $service->order }}" min="0" style="width: 60px">
                            </td>
                            <td>{{ $service->title }}</td>
                            <td>{{ Str::limit($service->description, 100) }}</td>
                            <td>
                                @if($service->icon)
                                    <i class="{{ $service->icon }}"></i>
                                    <span class="ms-2">{{ $service->icon }}</span>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-{{ $service->is_active ? 'success' : 'danger' }}">
                                    {{ $service->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-info me-2" data-bs-toggle="modal" 
                                        data-bs-target="#editServiceModal" 
                                        data-service="{{ $service->toJson() }}">
                                    Edit
                                </button>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" 
                                        data-bs-target="#deleteServiceModal" 
                                        data-id="{{ $service->id }}">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Edit Service Modal -->
<div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editServiceForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editServiceModalLabel">Edit Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_title" class="form-label">Judul Layanan</label>
                        <input type="text" class="form-control" id="edit_title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="edit_description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_icon" class="form-label">Ikon (Font Awesome Class)</label>
                        <input type="text" class="form-control" id="edit_icon" name="icon">
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="edit_is_active" name="is_active" value="1">
                            <label class="form-check-label" for="edit_is_active">Aktif</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_order" class="form-label">Urutan</label>
                        <input type="number" class="form-control" id="edit_order" name="order" min="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Service Modal -->
<div class="modal fade" id="deleteServiceModal" tabindex="-1" aria-labelledby="deleteServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteServiceForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteServiceModalLabel">Hapus Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus layanan ini? Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle Edit Modal
    const editServiceModal = document.getElementById('editServiceModal');
    editServiceModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const service = JSON.parse(button.getAttribute('data-service'));
        const form = this.querySelector('#editServiceForm');
        
        form.action = `{{ url('admin/layanan') }}/${service.id}`;
        form.querySelector('#edit_title').value = service.title;
        form.querySelector('#edit_description').value = service.description;
        form.querySelector('#edit_icon').value = service.icon;
        form.querySelector('#edit_is_active').checked = service.is_active;
        form.querySelector('#edit_order').value = service.order;
    });

    // Handle Delete Modal
    const deleteServiceModal = document.getElementById('deleteServiceModal');
    deleteServiceModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const serviceId = button.getAttribute('data-id');
        const form = this.querySelector('#deleteServiceForm');
        form.action = `{{ url('admin/layanan') }}/${serviceId}`;
    });

    // Handle Order Updates
    const orderInputs = document.querySelectorAll('.order-input');
    orderInputs.forEach(input => {
        input.addEventListener('change', function() {
            const serviceId = this.closest('tr').getAttribute('data-id');
            const newOrder = this.value;

            fetch('{{ route("admin.layanan.update-order") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    orders: {
                        [serviceId]: newOrder
                    }
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    // Optionally refresh the page or update the UI
                    window.location.reload();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memperbarui urutan.');
            });
        });
    });
});
</script>
@endpush
@endsection 