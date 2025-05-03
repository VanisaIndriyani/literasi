@extends('layouts.main')

@section('title', 'Berita')

@section('content')
<!-- Hero Section with Wave -->
<div class="hero-section position-relative" style="background: linear-gradient(135deg, #1a2a6c, #2B4C7E);">
    <div class="container py-5">
        <div class="row align-items-center justify-content-between" style="min-height: 50vh;">
            <div class="col-lg-7">
                <div class="hero-content p-4">
                    <h1 class="display-4 fw-bold mb-4 animate-up text-white text-shadow">Berita & Informasi</h1>
                    <p class="lead mb-4 animate-up-delay text-white-50">Ikuti perkembangan terbaru dari Perpustakaan Ruang Literasi Kaliurang untuk mendapatkan informasi terkini seputar kegiatan dan layanan kami.</p>
                    <div class="search-container bg-white p-3 rounded-pill shadow-lg animate-up">
                        <div class="input-group">
                            <input type="text" class="form-control border-0 px-4" placeholder="Cari berita...">
                            <button class="btn btn-primary rounded-pill px-4">
                                <i class="fas fa-search me-2"></i>Cari
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center animate-up d-none d-lg-block">
                <div class="hero-icon-wrapper floating">
                    <i class="fas fa-newspaper fa-8x text-white opacity-25"></i>
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

<div class="container py-5">
    <!-- Category Filter -->
    <div class="category-filter mb-5 text-center">
        <div class="d-flex justify-content-center flex-wrap gap-2">
            <button class="btn btn-outline-primary rounded-pill px-4 active">Semua</button>
            <button class="btn btn-outline-primary rounded-pill px-4">Event</button>
            <button class="btn btn-outline-primary rounded-pill px-4">Workshop</button>
            <button class="btn btn-outline-primary rounded-pill px-4">Pengumuman</button>
            <button class="btn btn-outline-primary rounded-pill px-4">Fasilitas</button>
        </div>
    </div>

    <!-- Featured News -->
    <div class="featured-news mb-5">
        <h2 class="section-title mb-4">Berita Utama</h2>
        <div class="card border-0 shadow-lg overflow-hidden">
            <div class="row g-0">
                <div class="col-lg-6 bg-primary bg-opacity-10 d-flex align-items-center justify-content-center p-5">
                    <i class="fas fa-laptop-code fa-8x text-primary opacity-75 floating"></i>
                </div>
                <div class="col-lg-6">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-primary me-2">Event</span>
                            <small class="text-muted"><i class="fas fa-calendar-alt me-2"></i>15 Januari 2024</small>
                        </div>
                        <h2 class="card-title h3 mb-3">Pekan Literasi Digital 2024</h2>
                        <p class="card-text text-muted mb-4">Bergabunglah dalam rangkaian acara literasi digital yang akan diselenggarakan sepanjang minggu dengan berbagai workshop menarik.</p>
                        <a href="#" class="btn btn-primary rounded-pill px-4">
                            <i class="fas fa-arrow-right me-2"></i>Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest News -->
    <div class="latest-news mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">Berita Terbaru</h2>
            <a href="#" class="btn btn-outline-primary rounded-pill px-4">Lihat Semua</a>
        </div>
        <div class="row g-4">
            <!-- News Cards here (your existing cards with updated styling) -->
            @foreach($berita as $item)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-hover">
                    <div class="card-img-wrapper bg-{{ $item->category_color }} bg-opacity-10 p-4 text-center">
                        <i class="fas fa-{{ $item->icon }} fa-4x text-{{ $item->category_color }} floating"></i>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-{{ $item->category_color }} me-2">{{ $item->category }}</span>
                            <small class="text-muted">
                                <i class="fas fa-calendar-alt me-2"></i>{{ $item->date }}
                            </small>
                        </div>
                        <h5 class="card-title mb-3">{{ $item->title }}</h5>
                        <p class="card-text text-muted">{{ $item->excerpt }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 p-4 pt-0">
                        <a href="#" class="btn btn-link text-primary p-0">
                            Baca Selengkapnya<i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Updated Pagination -->
    <nav class="mt-5">
        <ul class="pagination justify-content-center gap-2">
            {{ $berita->links() }}
        </ul>
    </nav>
</div>

<style>
/* Add these new styles */
.hero-section {
    margin-bottom: 0;
    background-size: cover;
    background-position: center;
}

.section-title {
    position: relative;
    padding-left: 1rem;
    font-weight: 600;
}

.section-title::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 4px;
    height: 24px;
    background: #1a2a6c;
    border-radius: 2px;
}

.floating {
    animation: floating 3s ease-in-out infinite;
}

@keyframes floating {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
    100% { transform: translateY(0px); }
}

.animate-up {
    animation: slideUp 0.5s ease-out forwards;
}

.animate-up-delay {
    animation: slideUp 0.5s ease-out 0.2s forwards;
    opacity: 0;
}

@keyframes slideUp {
    from {
        transform: translateY(30px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

/* Update existing styles */
.card {
    border-radius: 20px;
}

.badge {
    padding: 8px 16px;
    font-weight: 500;
    border-radius: 30px;
}

.btn-outline-primary {
    border-width: 2px;
}

.btn-outline-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(26, 42, 108, 0.15);
}
</style>
@endsection