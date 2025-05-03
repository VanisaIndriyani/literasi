@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section dengan Background -->
<div class="hero-section position-relative">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/banner/banner01.jpeg') }}" class="d-block w-100" alt="Banner 1" style="height: 100vh; object-fit: cover;">
                <div class="carousel-caption">
                    <h2 class="display-4 fw-bold">Selamat Datang di Ruang Literasi</h2>
                    <p class="lead">Temukan ribuan koleksi buku untuk menambah wawasanmu</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banner/banner02.jpg') }}" class="d-block w-100" alt="Banner 2" style="height: 100vh; object-fit: cover;">
                <div class="carousel-caption">
                    <h2 class="display-4 fw-bold">Suasana Nyaman</h2>
                    <p class="lead">Nikmati suasana membaca yang nyaman dengan pemandangan alam Kaliurang</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banner/banner03.jpg') }}" class="d-block w-100" alt="Banner 3" style="height: 100vh; object-fit: cover;">
                <div class="carousel-caption">
                    <h2 class="display-4 fw-bold">Fasilitas Lengkap</h2>
                    <p class="lead">Dilengkapi dengan wifi gratis dan area diskusi</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<!-- Statistik Section -->
<div class="container py-5">
    <div class="row g-4">
        <div class="col-md-3">
            <div class="card border-0 bg-primary bg-gradient text-white text-center p-4 rounded-4">
                <i class="fas fa-book-open fa-3x mb-3"></i>
                <h3 class="counter">10,000+</h3>
                <p class="mb-0">Koleksi Buku</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 bg-success bg-gradient text-white text-center p-4 rounded-4">
                <i class="fas fa-users fa-3x mb-3"></i>
                <h3 class="counter">5,000+</h3>
                <p class="mb-0">Anggota Aktif</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 bg-info bg-gradient text-white text-center p-4 rounded-4">
                <i class="fas fa-clock fa-3x mb-3"></i>
                <h3>08:00-17:00</h3>
                <p class="mb-0">Jam Operasional</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 bg-warning bg-gradient text-white text-center p-4 rounded-4">
                <i class="fas fa-wifi fa-3x mb-3"></i>
                <h3>GRATIS</h3>
                <p class="mb-0">Fasilitas WiFi</p>
            </div>
        </div>
    </div>
</div>

<!-- Kategori Section -->
<div class="container py-5">
    <h2 class="text-center mb-2">Pilih Subjek yang Menarik bagi Anda</h2>
    <p class="text-center text-muted mb-5">Temukan berbagai kategori buku sesuai minat Anda</p>
    <div class="row g-4 justify-content-center">
        <div class="col-6 col-md-2">
            <div class="card h-100 border-0 shadow-sm category-card">
                <div class="card-body text-center">
                    <div class="category-icon mb-3">
                        <i class="fas fa-book text-primary"></i>
                        <i class="fas fa-apple-alt text-danger position-relative" style="left: -8px; bottom: -5px; font-size: 0.8em;"></i>
                    </div>
                    <h6 class="mb-0">Kesusastraan</h6>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="card h-100 border-0 shadow-sm category-card">
                <div class="card-body text-center">
                    <div class="category-icon mb-3">
                        <i class="fas fa-scroll text-info"></i>
                        <i class="fas fa-certificate text-warning position-relative" style="left: -8px; bottom: -5px; font-size: 0.8em;"></i>
                    </div>
                    <h6 class="mb-0">Ilmu-ilmu Sosial</h6>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="card h-100 border-0 shadow-sm category-card">
                <div class="card-body text-center">
                    <div class="category-icon mb-3">
                        <i class="fas fa-atom text-success"></i>
                    </div>
                    <h6 class="mb-0">Ilmu-ilmu Terapan</h6>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="card h-100 border-0 shadow-sm category-card">
                <div class="card-body text-center">
                    <div class="category-icon mb-3">
                        <i class="fas fa-palette text-warning"></i>
                        <i class="fas fa-running text-info position-relative" style="left: -8px; bottom: -5px; font-size: 0.8em;"></i>
                    </div>
                    <h6 class="mb-0">Kesenian, Hiburan, dan Olahraga</h6>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="card h-100 border-0 shadow-sm category-card">
                <div class="card-body text-center">
                    <div class="category-icon mb-3">
                        <i class="fas fa-th text-secondary"></i>
                    </div>
                    <h6 class="mb-0">Lihat lainnya...</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .category-icon {
        font-size: 2.5rem;
        height: 64px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .category-card {
        background: #ffffff;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .category-card h6 {
        font-size: 0.9rem;
        color: #666;
    }
</style>

<!-- Koleksi Populer -->
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="position-relative d-inline-block mb-2">
            Koleksi Populer
            <span class="position-absolute w-50 h-2 bg-warning" style="bottom: -5px; left: 25%; transform: translateX(-50%);"></span>
        </h2>
        <p class="text-muted">Buku-buku yang sering dipinjam</p>
    </div>

    <div class="d-flex justify-content-end mb-4">
        <div class="d-flex gap-2">
            <button class="btn btn-outline-warning rounded-circle control-btn" id="prevBook">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="btn btn-outline-warning rounded-circle control-btn" id="nextBook">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
    
    <div class="book-slider">
        <div class="row g-4">
            @php
                $books = [
                    ['title' => 'Laskar Pelangi', 'author' => 'Andrea Hirata', 'icon' => 'book-open-reader', 'color' => 'primary'],
                    ['title' => 'Bumi Manusia', 'author' => 'Pramoedya Ananta Toer', 'icon' => 'book-bookmark', 'color' => 'success'],
                    ['title' => 'Dilan 1990', 'author' => 'Pidi Baiq', 'icon' => 'book', 'color' => 'danger'],
                    ['title' => 'Pulang', 'author' => 'Tere Liye', 'icon' => 'book-atlas', 'color' => 'info'],
                    ['title' => '5 cm', 'author' => 'Donny Dhirgantoro', 'icon' => 'book-medical', 'color' => 'warning'],
                    ['title' => 'Negeri 5 Menara', 'author' => 'Ahmad Fuadi', 'icon' => 'book-journal-whills', 'color' => 'purple']
                ];
            @endphp

            @foreach($books as $book)
            <div class="col-6 col-md-2">
                <div class="card h-100 border-0 shadow-sm book-card text-center">
                    <div class="position-relative book-icon-wrapper bg-{{ $book['color'] }}">
                        <i class="fas fa-{{ $book['icon'] }} book-icon text-white"></i>
                        <div class="popular-badge">
                            <i class="fas fa-star"></i> Populer
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title mb-2 book-title">{{ $book['title'] }}</h6>
                        <p class="text-muted small mb-0 author">{{ $book['author'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    .book-icon-wrapper {
        padding: 3rem 2rem;
        position: relative;
        overflow: hidden;
        border-radius: 15px 15px 0 0;
    }

    .book-icon {
        font-size: 4rem;
        transition: all 0.4s ease;
    }

    .book-card {
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .book-card:hover {
        transform: translateY(-10px);
    }

    .book-card:hover .book-icon {
        transform: scale(1.1) rotate(-5deg);
    }

    .popular-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: rgba(255, 255, 255, 0.9);
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        color: var(--primary-color);
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .book-title {
        font-weight: 600;
        color: #2c3e50;
        line-height: 1.3;
    }

    .author {
        color: #6c757d;
    }

    .control-btn {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .control-btn:hover {
        background: var(--warning);
        color: white;
        transform: scale(1.1);
    }

    .bg-purple {
        background: #6f42c1;
    }

    .h-2 {
        height: 3px;
    }
</style>

@section('styles')
<style>
    /* Hero Section Styles */
    .hero-section {
        height: 100vh;
        margin-top: -76px;
        overflow: hidden;
    }

    .carousel-caption {
        background: rgba(0, 0, 0, 0.5);
        border-radius: 20px;
        padding: 2rem;
        max-width: 800px;
        margin: 0 auto;
        backdrop-filter: blur(5px);
    }

    .hero-slider img {
        height: 100vh;
        object-fit: cover;
        filter: brightness(0.6);
    }

    /* Card Styles */
    .stat-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.4s ease;
    }

    .stat-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }

    .stat-card i {
        font-size: 3.5rem;
        margin-bottom: 1rem;
        opacity: 0.9;
    }

    .counter {
        font-size: 2.8rem;
        font-weight: 700;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
    }

    /* Category Section */
    .category-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 20px;
        padding: 3rem 0;
        margin: 2rem 0;
    }

    .category-card {
        background: white;
        border-radius: 15px;
        transition: all 0.4s ease;
        border: none;
    }

    .category-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.1);
    }

    /* Book Section */
    .book-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.4s ease;
    }

    .book-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.1);
    }

    .book-card img {
        height: 280px;
        object-fit: cover;
        transition: all 0.4s ease;
    }

    .book-card:hover img {
        transform: scale(1.05);
    }

    .badge {
        font-size: 0.8rem;
        padding: 0.5rem 1rem;
        border-radius: 20px;
    }

    /* Location Section */
    .location-card {
        border-radius: 20px;
        overflow: hidden;
    }

    .social-btn {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        font-size: 1.2rem;
    }

    .social-btn:hover {
        transform: translateY(-5px);
    }

    .stars {
        color: #ffd700;
        font-size: 1.2rem;
    }

    /* Carousel Controls */
    .carousel-control-prev, .carousel-control-next {
        width: 5%;
        opacity: 0;
        transition: all 0.3s ease;
    }

    .carousel:hover .carousel-control-prev,
    .carousel:hover .carousel-control-next {
        opacity: 1;
    }

    .carousel-indicators {
        bottom: 40px;
    }

    .carousel-indicators button {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        margin: 0 5px;
    }

    .book-icon-wrapper {
        padding: 2rem;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }

    .book-icon {
        font-size: 5rem;
        color: var(--primary-color);
        opacity: 0.8;
        transition: all 0.4s ease;
    }

    .book-card:hover .book-icon {
        transform: scale(1.1);
        opacity: 1;
        color: var(--secondary-color);
    }
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi carousel
    new bootstrap.Carousel(document.querySelector('#heroCarousel'), {
        interval: 5000,
        ride: true
    });
});
</script>
@endsection

<!-- Koleksi Populer section ends -->

<!-- Location Maps Section -->
<div class="container-fluid py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="text-center text-lg-start">
                    <h2 class="position-relative d-inline-block mb-4">
                        Lokasi Kami
                        <span class="position-absolute w-50 h-2 bg-warning" style="bottom: -5px; left: 25%; transform: translateX(-50%);"></span>
                    </h2>
                    <div class="location-info">
                        <p class="lead mb-4">Kunjungi Ruang Literasi Kaliurang di:</p>
                        <div class="d-flex align-items-start mb-3">
                            <i class="fas fa-map-marker-alt text-primary mt-1 me-3 fa-lg"></i>
                            <p class="mb-0">Bondosari, Harjobinangun, Kec. Pakem,<br>Kabupaten Sleman, Daerah Istimewa Yogyakarta</p>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-phone text-primary me-3 fa-lg"></i>
                            <p class="mb-0">(0274) XXXXXXX</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-envelope text-primary me-3 fa-lg"></i>
                            <p class="mb-0">info@ruangliterasi.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="map-container shadow-lg rounded-4 overflow-hidden">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.9129844433764!2d110.40356759999999!3d-7.6924875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5f004dc4ea8d%3A0x32141dd28c0ea274!2sRuang%20Literasi%20Kaliurang!5e0!3m2!1sid!2sid!4v1746242905461!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Maps Section Styles */
    .map-container {
        position: relative;
        padding: 10px;
        background: white;
        transition: all 0.3s ease;
    }

    .map-container:hover {
        transform: translateY(-5px);
    }

    .location-info {
        background: white;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .location-info i {
        width: 25px;
    }
</style>
@endsection
