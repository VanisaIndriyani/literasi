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
                    <p class="lead">Dilengkapi dengan loker dan area diskusi</p>
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
            <div class="card border-0 bg-dark bg-gradient text-white text-center p-4 rounded-4">
                <i class="fas fa-box fa-3x mb-3"></i>
                <h3>TERSEDIA</h3>
                <p class="mb-0">Loker Pribadi</p>
            </div>
        </div>
    </div>
</div>

<!-- Kategori Section -->
<div class="container py-5">
    <h2 class="text-center mb-2">Pilih Subjek yang Menarik bagi Anda</h2>
    <p class="text-center text-muted mb-5">Temukan berbagai kategori buku sesuai minat Anda</p>
    <div class="row g-4 justify-content-center">
        @foreach($categories as $category)
        <div class="col-6 col-md-2">
            <div class="card h-100 border-0 shadow-sm category-card">
                <div class="card-body text-center">
                    <div class="category-image-wrapper mb-3">
                        @if($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="img-fluid category-image">
                        @else
                            <!-- Fallback if no image is available -->
                            <i class="fas fa-book fa-3x text-primary"></i>
                        @endif
                    </div>
                    <h6 class="mb-0">{{ $category->name }}</h6>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<style>
    .category-image-wrapper {
        height: 64px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .category-image {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
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
          @foreach($popularBooks as $book)
            <div class="col-6 col-md-2">
                <div class="card h-100 border-0 shadow-sm book-card text-center">
                    <div class="position-relative book-cover-wrapper">
                        @if($book->cover)
                            <img src="{{ asset('storage/'.$book->cover) }}" class="img-fluid book-cover" alt="{{ $book->title }}">
                        @else
                            <i class="fas fa-book book-icon text-white bg-{{ $book->color ?? 'secondary' }}"></i>
                        @endif
                        <div class="popular-badge">
                            <i class="fas fa-star"></i> Populer
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title mb-2 book-title">{{ $book->title }}</h6>
                        <p class="text-muted small mb-0 author">{{ $book->author }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    .book-cover-wrapper {
        padding: 1rem;
        position: relative;
        overflow: hidden;
        border-radius: 15px 15px 0 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 150px; /* Adjust as needed */
    }

    .book-cover {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .book-icon {
        font-size: 4rem;
        transition: all 0.4s ease;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px 15px 0 0;
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

<!-- Koleksi Populer section ends -->

<!-- Daftar Koleksi Lengkap Section -->
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="position-relative d-inline-block mb-2">
            Daftar Koleksi Lengkap
            <span class="position-absolute w-50 h-2 bg-primary" style="bottom: -5px; left: 25%; transform: translateX(-50%);"></span>
        </h2>
        <p class="text-muted">Jelajahi seluruh koleksi buku yang tersedia di Ruang Literasi</p>
    </div>

    <!-- Search Form -->
    <form method="GET" action="{{ route('beranda') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Cari judul buku..." value="{{ request('q') }}">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search"></i> Cari
            </button>
        </div>
    </form>

    @if($books->isEmpty())
        <div class="alert alert-info" role="alert">
            Belum ada buku yang tersedia dalam koleksi lengkap.
        </div>
    @else
        <div class="row g-4">
            @foreach($books as $book)
            <div class="col-6 col-md-2">
                <div class="card h-100 border-0 shadow-sm book-card text-center">
                    <div class="position-relative book-cover-wrapper">
                        <i class="fas fa-book book-icon text-white bg-{{ $book->color ?? 'secondary' }}"></i> <!-- Default icon -->
                    </div>
                    <div class="card-body">
                        <h6 class="card-title mb-2 book-title">{{ $book->title ?? 'N/A' }}</h6>
                        <p class="text-muted small mb-0 stock">Stok: {{ $book->stock ?? 'N/A' }}</p>
                        <p class="text-muted small mb-0 description">{{ Str::limit($book->description, 50) ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>

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
