@extends('layouts.main')

@section('title', 'Pustakawan')

@section('content')
<style>
    .librarian-header {
        background: linear-gradient(45deg, #1a2a6c, #2B4C7E);
        padding: 100px 0 120px;
        color: white;
        border-radius: 0 0 100px 100px;
        box-shadow: 0 10px 30px rgba(26, 42, 108, 0.2);
        position: relative;
        overflow: hidden;
    }

    .librarian-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.05)" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
        background-position: center bottom;
        background-repeat: no-repeat;
        opacity: 0.1;
    }

    .librarian-card {
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.4s ease;
    }

    .librarian-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(26, 42, 108, 0.15) !important;
    }

    .librarian-img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        border: 5px solid #fff;
        box-shadow: 0 5px 15px rgba(26, 42, 108, 0.1);
    }

    .social-link {
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .social-link:hover {
        transform: translateY(-3px);
    }

    .schedule-card {
        border-radius: 15px;
        transition: all 0.3s ease;
    }

    .schedule-card:hover {
        transform: translateY(-5px);
    }
</style>

<div class="librarian-header mb-5">
    <div class="container">
        <h1 class="text-center display-4 fw-bold mb-4" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.1)">Tim Pustakawan</h1>
        <p class="text-center lead mb-0" style="font-size: 1.25rem; opacity: 0.9">Kenali tim profesional kami yang siap membantu Anda</p>
    </div>
</div>

<div class="container">
    <!-- Team Section -->
    <div class="row g-4 mb-5">
        <!-- Pustakawan 1 -->
        <div class="col-md-4">
            <!-- Replace the img tag with icon in each librarian card -->
            <div class="librarian-card card border-0 shadow-sm text-center h-100">
                <div class="card-body p-4">
                    <div class="librarian-img d-flex align-items-center justify-content-center mb-4 mx-auto bg-light">
                        <i class="fas fa-user-tie fa-3x text-primary"></i>
                    </div>
                    <h4>Budi Santoso, M.Lib</h4>
                    <p class="text-muted mb-3">Kepala Pustakawan</p>
                    <p class="small text-muted mb-4">Spesialisasi dalam manajemen perpustakaan digital dan pengembangan koleksi</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="#" class="social-link btn btn-outline-primary"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link btn btn-outline-info"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link btn btn-outline-danger"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pustakawan 2 -->
        <div class="col-md-4">
            <div class="librarian-card card border-0 shadow-sm text-center h-100">
                <div class="card-body p-4">
                    <div class="librarian-img d-flex align-items-center justify-content-center mb-4 mx-auto bg-light">
                        <i class="fas fa-user-graduate fa-3x text-success"></i>
                    </div>
                    <h4>Siti Rahayu, S.IP</h4>
                    <p class="text-muted mb-3">Pustakawan Layanan</p>
                    <p class="small text-muted mb-4">Ahli dalam pelayanan referensi dan literasi informasi</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="#" class="social-link btn btn-outline-primary"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link btn btn-outline-info"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link btn btn-outline-danger"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pustakawan 3 -->
        <div class="col-md-4">
            <div class="librarian-card card border-0 shadow-sm text-center h-100">
                <div class="card-body p-4">
                    <div class="librarian-img d-flex align-items-center justify-content-center mb-4 mx-auto bg-light">
                        <i class="fas fa-user-cog fa-3x text-warning"></i>
                    </div>
                    <h4>Ahmad Faisal, S.IP</h4>
                    <p class="text-muted mb-3">Pustakawan Teknis</p>
                    <p class="small text-muted mb-4">Fokus pada pengembangan sistem dan teknologi perpustakaan</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="#" class="social-link btn btn-outline-primary"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link btn btn-outline-info"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link btn btn-outline-danger"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jadwal Section -->
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="text-center mb-5">Jadwal Layanan</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="schedule-card card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4"><i class="fas fa-clock text-primary me-2"></i>Jam Operasional</h5>
                            <ul class="list-unstyled">
                                <li class="mb-3">Senin - Jumat: 08:00 - 16:00</li>
                                <li class="mb-3">Sabtu: 09:00 - 14:00</li>
                                <li>Minggu & Hari Libur: Tutup</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="schedule-card card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4"><i class="fas fa-calendar-alt text-success me-2"></i>Layanan Khusus</h5>
                            <ul class="list-unstyled">
                                <li class="mb-3">Konsultasi Penelitian: Senin & Rabu (09:00 - 12:00)</li>
                                <li class="mb-3">Pelatihan Literasi: Jumat (13:00 - 15:00)</li>
                                <li>Bimbingan Pengguna: Setiap hari kerja (dengan perjanjian)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="text-center mb-5">
        <div class="bg-light p-5 rounded-4 shadow-sm">
            <h3 class="mb-4">Hubungi Pustakawan</h3>
            <p class="text-muted mb-4">Kami siap membantu Anda dengan berbagai kebutuhan informasi</p>
            <div class="row justify-content-center g-3">
                <div class="col-md-4">
                    <a href="#" class="card text-decoration-none border-0 shadow-sm h-100 schedule-card">
                        <div class="card-body p-4">
                            <i class="fas fa-phone-alt fa-2x text-primary mb-3"></i>
                            <h5>Telepon</h5>
                            <p class="text-muted mb-0">(021) 1234-5678</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="card text-decoration-none border-0 shadow-sm h-100 schedule-card">
                        <div class="card-body p-4">
                            <i class="fas fa-envelope fa-2x text-success mb-3"></i>
                            <h5>Email</h5>
                            <p class="text-muted mb-0">pustakawan@perpus.com</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="card text-decoration-none border-0 shadow-sm h-100 schedule-card">
                        <div class="card-body p-4">
                            <i class="fab fa-whatsapp fa-2x text-warning mb-3"></i>
                            <h5>WhatsApp</h5>
                            <p class="text-muted mb-0">+62 812-3456-7890</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- Update the CSS for librarian-img -->
<style>
    .librarian-img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        border: 5px solid #fff;
        box-shadow: 0 5px 15px rgba(26, 42, 108, 0.1);
        background: rgba(26, 42, 108, 0.05);
        transition: all 0.3s ease;
    }

    .librarian-card:hover .librarian-img {
        transform: scale(1.05);
        box-shadow: 0 8px 25px rgba(26, 42, 108, 0.15);
    }
    
    /* ... rest of your styles ... */
</style>
