@extends('layouts.main')

@section('title', 'Informasi')

@section('content')
<!-- Hero Section with Wave -->
<div class="hero-section position-relative" style="background: linear-gradient(45deg, #1a2a6c, #2B4C7E);">
    <div class="container py-5">
        <div class="row align-items-start pt-5">
            <div class="col-lg-6 mt-4">
                <div class="hero-content p-4">
                    <h1 class="display-4 fw-bold mb-4 animate-up text-white text-shadow">Informasi Perpustakaan</h1>
                    <!-- <p class="lead mb-4 animate-up-delay text-white text-shadow-sm">Temukan berbagai informasi terkait layanan, fasilitas, dan kegiatan di Perpustakaan Ruang Literasi Kaliurang.</p> -->
                    <a href="#info-cards" class="btn btn-warning btn-lg rounded-pill shadow-lg animate-up-delay-2 px-4">
                        <i class="fas fa-arrow-down me-2"></i>Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center animate-up">
                <div class="hero-icon-wrapper floating">
                    <i class="fas fa-book-reader fa-8x text-warning opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="wave-bottom">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
</div>

<!-- Add these new styles -->
<style>
.hero-section {
    position: relative;
    overflow: hidden;
    padding: 2rem 0;
}

.hero-content {
    position: relative;
    z-index: 2;
}

.text-shadow {
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
}

.text-shadow-sm {
    text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
}

.floating {
    animation: floating 3s ease-in-out infinite;
}

@keyframes floating {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
    100% { transform: translateY(0px); }
}

.card {
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.shadow-hover:hover {
    transform: translateY(-10px);
    box-shadow: 0 1rem 3rem rgba(0,0,0,0.2) !important;
}

.icon-box {
    width: 70px;
    height: 70px;
    border-radius: 15px;
    transition: all 0.3s ease;
}

.rule-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

.rule-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.rule-icon {
    width: 90px;
    height: 90px;
    background: linear-gradient(45deg, #f8f9fa, #e9ecef);
    transition: all 0.3s ease;
}

.facility-item {
    padding: 1rem;
    border-radius: 10px;
    background: rgba(255,255,255,0.05);
    transition: all 0.3s ease;
}

.facility-item:hover {
    background: rgba(255,255,255,0.1);
    transform: translateY(-5px);
}

/* Enhance animations */
.animate-up {
    animation: fadeInUp 0.7s ease-out;
}

.animate-up-delay {
    animation: fadeInUp 0.7s ease-out 0.3s both;
}

.animate-up-delay-2 {
    animation: fadeInUp 0.7s ease-out 0.6s both;
}
</style>

<!-- Info Cards Section -->
<div id="info-cards" class="container py-5">
    <div class="row g-4">
        <!-- Jam Operasional -->
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-hover">
                <div class="card-body p-4">
                    <div class="icon-box bg-custom-soft rounded-4 mb-4">
                        <i class="fas fa-clock text-dark"></i>
                    </div>
                    <h4 class="card-title mb-4 text-dark">Jam Operasional</h4>
                    <div class="schedule-list">
                        <div class="d-flex justify-content-between mb-3">
                            <span class="day text-dark">Senin - Jumat</span>
                            <span class="time text-dark fw-bold">08:00 - 17:00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="day">Sabtu</span>
                            <span class="time text-primary">09:00 - 15:00</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="day">Minggu</span>
                            <span class="time text-danger">Tutup</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Keanggotaan -->
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-hover">
                <div class="card-body p-4">
                    <div class="icon-box bg-success-soft rounded-4 mb-4">
                        <i class="fas fa-id-card text-success"></i>
                    </div>
                    <h4 class="card-title mb-4">Keanggotaan</h4>
                    <div class="membership-list">
                        <div class="feature-item mb-3">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            <span>Gratis pendaftaran</span>
                        </div>
                        <div class="feature-item mb-3">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            <span>KTP/Kartu Pelajar</span>
                        </div>
                        <div class="feature-item mb-3">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            <span>Foto 3x4 (2 lembar)</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            <span>Masa berlaku 1 tahun</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fasilitas -->
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-hover">
                <div class="card-body p-4">
                    <div class="icon-box bg-warning-soft rounded-4 mb-4">
                        <i class="fas fa-wifi text-warning"></i>
                    </div>
                    <h4 class="card-title mb-4">Fasilitas</h4>
                    <div class="facility-grid">
                        <div class="facility-item">
                            <i class="fas fa-wifi text-warning mb-2"></i>
                            <span>WiFi Gratis</span>
                        </div>
                        <div class="facility-item">
                            <i class="fas fa-desktop text-warning mb-2"></i>
                            <span>Komputer</span>
                        </div>
                        <div class="facility-item">
                            <i class="fas fa-print text-warning mb-2"></i>
                            <span>Printer</span>
                        </div>
                        <div class="facility-item">
                            <i class="fas fa-coffee text-warning mb-2"></i>
                            <span>Kafetaria</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tata Tertib Section -->
<div class="rules-section py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">
            <span class="border-bottom border-primary border-3 pb-2">Tata Tertib Perpustakaan</span>
        </h2>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="rule-card text-center">
                    <div class="rule-icon bg-white rounded-circle shadow-sm mb-4">
                        <i class="fas fa-id-card text-primary"></i>
                    </div>
                    <h5>Kartu Anggota</h5>
                    <p class="text-muted">Wajib menunjukkan kartu anggota perpustakaan yang masih berlaku</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="rule-card text-center">
                    <div class="rule-icon bg-white rounded-circle shadow-sm mb-4">
                        <i class="fas fa-tshirt text-primary"></i>
                    </div>
                    <h5>Pakaian</h5>
                    <p class="text-muted">Berpakaian rapi, sopan, dan tidak menggunakan sandal jepit</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="rule-card text-center">
                    <div class="rule-icon bg-white rounded-circle shadow-sm mb-4">
                        <i class="fas fa-volume-mute text-primary"></i>
                    </div>
                    <h5>Ketertiban</h5>
                    <p class="text-muted">Menjaga ketenangan dan tidak membuat gaduh di dalam perpustakaan</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="rule-card text-center">
                    <div class="rule-icon bg-white rounded-circle shadow-sm mb-4">
                        <i class="fas fa-broom text-primary"></i>
                    </div>
                    <h5>Kebersihan</h5>
                    <p class="text-muted">Dilarang membawa makanan dan minuman ke dalam ruang perpustakaan</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.bg-gradient-custom {
    background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
}

.bg-custom-soft { 
    background-color: rgba(44, 62, 80, 0.1); 
}

.text-dark {
    color: #2c3e50 !important;
}

.schedule-list .time {
    color: #2c3e50;
}

.feature-item {
    color: #2c3e50;
}

.facility-item span {
    color: #2c3e50;
}

.min-vh-50 {
    min-height: 50vh;
}

.wave-bottom {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
}

.animate-up {
    animation: fadeInUp 0.5s ease-out;
}

.animate-up-delay {
    animation: fadeInUp 0.5s ease-out 0.2s both;
}

.animate-up-delay-2 {
    animation: fadeInUp 0.5s ease-out 0.4s both;
}

.shadow-hover {
    transition: all 0.3s ease;
    border-radius: 1rem;
}

.shadow-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
}

.icon-box {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.bg-primary-soft { background-color: rgba(var(--primary-rgb), 0.1); }
.bg-success-soft { background-color: rgba(var(--success-rgb), 0.1); }
.bg-warning-soft { background-color: rgba(var(--warning-rgb), 0.1); }

.facility-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
}

.facility-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.rule-icon {
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    margin: 0 auto;
}

.rule-card {
    padding: 2rem;
    transition: all 0.3s ease;
}

.rule-card:hover .rule-icon {
    transform: scale(1.1);
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endsection