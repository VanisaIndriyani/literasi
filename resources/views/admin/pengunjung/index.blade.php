@extends('layouts.admin')

@section('title', 'Kelola Pengunjung')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Pengunjung</h1>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow p-4 rounded-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-users fa-3x text-gray-500 me-4"></i>
                    <div>
                        <h5 class="text-gray-500">Total Pengunjung</h5>
                        <h3>{{ $totalVisitors }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow p-4 rounded-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-calendar-day fa-3x text-gray-500 me-4"></i>
                    <div>
                        <h5 class="text-gray-500">Pengunjung Hari Ini</h5>
                        <h3>{{ $todayVisitors }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow p-4 rounded-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-calendar-alt fa-3x text-gray-500 me-4"></i>
                    <div>
                        <h5 class="text-gray-500">Pengunjung Bulan Ini</h5>
                        <h3>{{ $thisMonthVisitors }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Visitor Card -->
    <div class="card shadow p-4 rounded-4 mb-4">
        <h5 class="mb-4">Tambah Pengunjung Baru</h5>
        <form action="{{ route('admin.pengunjung.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Pengunjung</label>
                        <input type="text" id="name" name="name" class="form-control rounded-3" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="institution" class="form-label">Institusi</label>
                        <input type="text" id="institution" name="institution" class="form-control rounded-3" value="{{ old('institution') }}" required>
                        @error('institution')
                            <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="phone" class="form-label">No. Telepon</label>
                        <input type="text" id="phone" name="phone" class="form-control rounded-3" value="{{ old('phone') }}" required>
                        @error('phone')
                            <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="purpose" class="form-label">Tujuan Kunjungan</label>
                        <textarea id="purpose" name="purpose" rows="3" class="form-control rounded-3" required>{{ old('purpose') }}</textarea>
                        @error('purpose')
                            <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary px-4 py-2 rounded-4">Simpan Pengunjung</button>
        </form>
    </div>

    <!-- List of Visitors Card -->
    <div class="card shadow p-4 rounded-4 mb-4">
        <h5 class="mb-4">Daftar Pengunjung</h5>
        <div class="table-responsive">
            <table class="table table-hover align-middle" id="visitorsTable">
                <thead class="table-light">
                    <tr>
                        <th>Nama</th>
                        <th>Institusi</th>
                        <th>Tujuan</th>
                        <th>No. Telepon</th>
                        <th>Tanggal Kunjungan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visitors as $visitor)
                        <tr>
                            <td>{{ $visitor->name }}</td>
                            <td>{{ $visitor->institution }}</td>
                            <td>{{ $visitor->purpose }}</td>
                            <td>{{ $visitor->phone }}</td>
                            <td>{{ $visitor->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                               <form action="{{ route('admin.pengunjung.destroy', $visitor->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm rounded-3" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class=" mt-4">
                {{ $visitors->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Delete Visitor Modal -->
<div class="modal fade" id="deleteVisitorModal" tabindex="-1" aria-labelledby="deleteVisitorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-4 rounded-4">
            <h5 id="deleteVisitorModalLabel" class="modal-title">Hapus Data Pengunjung</h5>
            <form id="deleteVisitorForm" method="POST">
                @csrf
                @method('DELETE')
                <p>Apakah Anda yakin ingin menghapus data pengunjung ini? Tindakan ini tidak dapat dibatalkan.</p>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary me-2 rounded-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger rounded-4">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize DataTable
       $('#visitorsTable').DataTable({ 
            "paging": false,
            "searching": true,
            "ordering": true,
            "info": false
        });

        // Delete Visitor Modal
        document.getElementById('deleteVisitorModal').addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;

            var id = button.dataset.id;
            console.log('Delete form Visitor ID:', id);

            var form = this.querySelector("#deleteVisitorForm");

            form.action = '{{ url('admin/pengunjung') }}/' + id;
            console.log('Delete form action set to:', form.action);
        });
    });
</script>
@endpush

@endsection
