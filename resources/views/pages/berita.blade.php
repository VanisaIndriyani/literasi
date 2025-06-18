@extends('layouts.main')

@section('title', 'Berita')

@section('content')
<!-- Hero Section with Wave -->
<div class="hero-section position-relative" style="background: linear-gradient(135deg, #8B4513, #A0522D);">
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
            <path fill="#ffffff" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L0,320Z"></path>
        </svg>
    </div>
</div>

<div class="container py-5">
    <!-- Featured News -->
    @if($beritaUtama)
    <div class="featured-news mb-5">
        <div class="card border-0 shadow-lg">
            <div class="row g-0">
                <div class="col-md-4">
                    @if($beritaUtama->image)
                        <img src="{{ asset('storage/' . $beritaUtama->image) }}" class="img-fluid rounded-start featured-news-image" alt="{{ $beritaUtama->title }}">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center h-100">
                            <i class="fas fa-newspaper fa-4x text-muted"></i>
                        </div>
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card-body p-4">
                        <h2 class="card-title mb-3">{{ $beritaUtama->title }}</h2>
                        <p class="text-muted small mb-3">
                            <i class="fas fa-calendar-alt me-2"></i>{{ \Carbon\Carbon::parse($beritaUtama->created_at)->translatedFormat('d F Y') }}
                        </p>
                        <p class="card-text">{{ Str::limit(strip_tags($beritaUtama->content), 200) }}</p>
                        <a href="{{ route('berita.show', $beritaUtama->id) }}" class="btn btn-primary rounded-pill px-4">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Latest News -->
    <div class="latest-news">
        <h3 class="section-title mb-4">Berita Terbaru</h3>
        <div class="row g-4">
            @foreach($beritaTerbaru as $berita)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-hover news-card">
                    <div class="card-img-wrapper p-3 text-center" style="min-height: 200px; display: flex; align-items: center; justify-content: center;">
                        @if($berita->image)
                            <img src="{{ asset('storage/' . $berita->image) }}" class="img-fluid news-card-image" alt="{{ $berita->title }}">
                        @else
                            <i class="fas fa-newspaper fa-4x text-muted"></i>
                        @endif
                    </div>
                    <div class="card-body p-4">
                        <h5 class="card-title mb-3">{{ $berita->title }}</h5>
                        <p class="text-muted small mb-0">
                            <i class="fas fa-calendar-alt me-2"></i>{{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-0 p-4 pt-0">
                        <a href="{{ route('berita.show', $berita->id) }}" class="btn btn-outline-primary rounded-pill w-100">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5">
            {{ $beritaTerbaru->links() }}
        </div>
    </div>
</div>

<style>
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
    background: var(--primary-color);
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
    from { transform: translateY(30px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}
.card {
    border-radius: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.shadow-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}
.featured-news-image, .news-card-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style>
@endsection
