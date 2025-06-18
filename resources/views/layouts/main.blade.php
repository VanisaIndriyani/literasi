<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruang Literasi Kaliurang - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #8B4513;    /* Dark brown */
            --secondary-color: #DEB887;   /* Burlywood */
            --accent-color: #D2691E;      /* Chocolate */
            --dark-color: #654321;        /* Saddle brown */
            --cream-color: #FFF8DC;       /* Cornsilk */
            --light-brown: #DEB887;       /* Burlywood */
            --gradient-brown: linear-gradient(135deg, #8B4513, #A0522D);
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            padding-top: 76px;
            background-color: var(--cream-color);
        }

        .navbar {
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 6px rgba(139, 69, 19, 0.1);
            padding: 1rem 0;
            background: rgba(139, 69, 19, 0.95) !important; /* Brown navbar */
        }

        .navbar-brand .brand-icon {
            font-size: 2.2rem;
            background: linear-gradient(45deg, var(--cream-color), var(--light-brown));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-member {
            background: linear-gradient(45deg, var(--accent-color), var(--primary-color));
            border: none;
            color: var(--cream-color);
            font-weight: 600;
            padding: 0.6rem 1.5rem;
            transition: all 0.4s ease;
        }

        .btn-member:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 69, 19, 0.3);
        }

        footer.bg-dark {
            background-color: var(--dark-color) !important;
        }

        .btn-primary {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: var(--cream-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: var(--cream-color);
        }

        .nav-link {
            color: var(--cream-color) !important;
        }

        .nav-link:hover {
            background: rgba(222, 184, 135, 0.2);
        }

        .nav-link.active {
            background: rgba(222, 184, 135, 0.3);
        }

        .btn-outline-success {
            color: var(--light-brown);
            border-color: var(--light-brown);
        }

        .btn-outline-success:hover {
            background-color: var(--light-brown);
            border-color: var(--light-brown);
            color: var(--dark-color);
        }

        .text-warning {
            color: var(--light-brown) !important;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: rgba(31, 41, 55, 0.98);">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('beranda') }}">
                <i class="fas fa-book-reader brand-icon me-2"></i>
                <div class="d-flex flex-column">
                    <span class="d-none d-md-inline" style="font-size: 1.3rem;">PUSTAKA ANGKU NAVIS</span>
                    <span class="d-none d-md-inline small text-warning" style="margin-top: -5px;">RLK</span>
                    <span class="d-inline d-md-none">PAN</span>
                </div>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center gap-2">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}" href="{{ route('beranda') }}">
                            <i class="fas fa-home me-2"></i>Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('informasi') ? 'active' : '' }}" href="{{ route('informasi') }}">
                            <i class="fas fa-info-circle me-2"></i>Informasi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('berita') ? 'active' : '' }}" href="{{ route('berita.index') }}">
                            <i class="fas fa-newspaper me-2"></i>Berita
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('bantuan') ? 'active' : '' }}" href="{{ route('bantuan') }}">
                            <i class="fas fa-question-circle me-2"></i>Bantuan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pustakawan') ? 'active' : '' }}" href="{{ route('pustakawan') }}">
                            <i class="fas fa-user-tie me-2"></i>Pustakawan
                        </a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-member" href="/login">
                            <i class="fas fa-sign-in-alt me-2"></i>Area Anggota
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-4 mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-book-reader fa-2x text-warning me-2"></i>
                        <div class="d-flex flex-column">
                            <span class="fs-5">PUSTAKA ANGKU NAVIS</span>
                            <span class="small text-warning">RLK</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('informasi') }}" class="text-white text-decoration-none d-block mb-2">Informasi</a>
                        <a href="{{ route('layanan') }}" class="text-white text-decoration-none d-block mb-2">Layanan</a>
                        <a href="{{ route('pustakawan') }}" class="text-white text-decoration-none d-block mb-2">Pustakawan</a>
                        <a href="/login" class="text-white text-decoration-none d-block">Area Anggota</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Tentang Kami</h5>
                    <p class="text-light">
                        Perpustakaan Ruang Literasi Kaliurang berisi 10.000-an judul buku dari berbagai genre, 
                        mulai sejarah, seni-budaya, sosial, politik, agama, sastra hingga buku-buku terbitan luar negeri.
                    </p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Cari</h5>
                    <p class="text-light mb-3">masukkan satu atau lebih kata kunci dari judul, pengarang, atau subjek</p>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Masukkan kata kunci">
                        <button class="btn btn-primary" type="button">Cari Koleksi</button>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-success" type="button">
                            <i class="fas fa-heart me-2"></i>Donasi untuk SLIMS
                        </button>
                        <button class="btn btn-outline-light" type="button">
                            <i class="fas fa-code me-2"></i>Kontribusi untuk SLIMS?
                        </button>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; 2025 — Senayan Developer Community</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Ditenagai oleh <span class="text-danger">SLiMS</span></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleLanguage() {
            // Implementasi pergantian bahasa
            console.log('Toggle language');
        }
    </script>
</body>
</html>