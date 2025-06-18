@extends('layouts.main')

@section('title', 'Layanan')

@section('content')
<!-- Hero Section dengan Wave -->
<div class="hero-section position-relative" style="background: linear-gradient(45deg, #8B4513, #A0522D);">
    <div class="container py-5">
        <div class="row align-items-start pt-5">
            <div class="col-lg-6 mt-4">
                <div class="hero-content p-4">
                    <h1 class="display-4 fw-bold mb-4 animate-up text-white text-shadow">Layanan Perpustakaan</h1>
                    <p class="lead mb-4 animate-up-delay text-white text-shadow-sm">Temukan berbagai layanan yang kami sediakan untuk mendukung kegiatan literasi Anda.</p>
                    <a href="#services" class="btn btn-warning btn-lg rounded-pill shadow-lg animate-up-delay-2 px-4">
                        <i class="fas fa-arrow-down me-2"></i>Lihat Layanan
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

<!-- Services Section -->
<div id="services" class="container py-5">
    <div class="row g-4">
        @forelse($services as $service)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-hover bg-gradient-light">
                <div class="card-body text-center p-4">
                    @if($service->icon)
                        <i class="{{ $service->icon }} fa-3x text-primary mb-3"></i>
                    @endif
                    <h4 class="card-title mb-3">{{ $service->title }}</h4>
                    <p class="card-text">{{ $service->description }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle me-2"></i>
                Belum ada layanan yang tersedia saat ini.
            </div>
        </div>
        @endforelse
    </div>
</div>

<!-- Additional Info Section -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Informasi Tambahan</h3>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-clock fa-2x text-primary me-3"></i>
                                <div>
                                    <h5 class="mb-1">Jam Operasional</h5>
                                    <p class="mb-0">Senin - Minggu: 09:30 - 21:00 WIB</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-phone fa-2x text-primary me-3"></i>
                                <div>
                                    <h5 class="mb-1">Kontak</h5>
                                    <p class="mb-0">Hubungi kami untuk informasi lebih lanjut</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

.wave-bottom {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
}

.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 15px;
}

.shadow-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 3rem rgba(0,0,0,0.2) !important;
}

.bg-gradient-light {
    background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);
}

.text-primary {
    color: var(--medium-brown) !important;
}

.btn-warning {
    background: var(--medium-brown);
    border-color: var(--medium-brown);
    color: var(--cream-color);
}

.btn-warning:hover {
    background: var(--dark-brown);
    border-color: var(--dark-brown);
    color: var(--cream-color);
}

:root {
    --cream-color: #FFF8DC;
    --light-brown: #DEB887;
    --medium-brown: #D2691E;
    --dark-brown: #8B4513;
    --accent-brown: #A0522D;
}
</style>
@endsection 