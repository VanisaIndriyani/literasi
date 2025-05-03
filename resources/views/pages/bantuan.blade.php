@extends('layouts.main')

@section('title', 'Bantuan')

@section('content')
<style>
    .help-header {
        background: linear-gradient(45deg, #1a2a6c, #2B4C7E);
        padding: 100px 0 120px;
        margin-bottom: 70px;
        color: white;
        border-radius: 0 0 100px 100px;
        box-shadow: 0 10px 30px rgba(26, 42, 108, 0.2);
        position: relative;
        overflow: hidden;
    }

    .help-header::before {
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

    .search-container {
        max-width: 700px;
        margin: -40px auto 60px;
    }

    .search-box {
        background: white;
        padding: 15px;
        border-radius: 20px;
        box-shadow: 0 15px 30px rgba(26, 42, 108, 0.1);
    }

    .category-card {
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        border-radius: 20px;
        overflow: hidden;
    }

    .category-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 20px 40px rgba(26, 42, 108, 0.15) !important;
    }

    .category-icon {
        height: 90px;
        width: 90px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin: 0 auto 25px;
        transition: all 0.4s ease;
        position: relative;
    }

    .category-icon::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: inherit;
        opacity: 0.3;
        transform: scale(0);
        transition: all 0.4s ease;
    }

    .category-card:hover .category-icon::after {
        transform: scale(1.4);
    }

    .accordion-button {
        border-radius: 15px !important;
        padding: 25px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .accordion-button:not(.collapsed) {
        background: linear-gradient(45deg, rgba(26, 42, 108, 0.05), rgba(43, 76, 126, 0.05));
        color: #1a2a6c;
    }

    .accordion-body {
        padding: 25px 30px;
    }

    .accordion-body ol li {
        margin-bottom: 12px;
        line-height: 1.6;
    }

    .contact-button {
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        border-radius: 15px;
        padding: 15px 30px;
        font-weight: 500;
    }

    .contact-button:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(26, 42, 108, 0.15);
    }

    .section-title {
        position: relative;
        display: inline-block;
        margin-bottom: 30px;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 50%;
        height: 3px;
        background: linear-gradient(45deg, #1a2a6c, #2B4C7E);
        border-radius: 2px;
    }
</style>

<!-- Update the header content -->
<div class="help-header">
    <div class="container">
        <h1 class="text-center display-4 fw-bold mb-4" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.1)">Pusat Bantuan</h1>
        <p class="text-center lead mb-0" style="font-size: 1.25rem; opacity: 0.9">Temukan jawaban untuk setiap pertanyaan Anda di sini</p>
    </div>
</div>

<div class="container">
    <!-- Search Bar -->
    <div class="search-container">
        <div class="search-box">
            <div class="input-group">
                <input type="text" class="form-control border-0 py-3" placeholder="Apa yang ingin Anda ketahui?">
                <button class="btn btn-primary px-4" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- FAQ Categories -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="category-card card h-100 border-0 shadow-sm">
                <div class="card-body text-center p-4">
                    <div class="category-icon bg-primary bg-opacity-10">
                        <i class="fas fa-book-reader fa-2x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Peminjaman Buku</h4>
                    <p class="text-muted mb-4">Informasi tentang cara meminjam, mengembalikan, dan memperpanjang buku</p>
                    <a href="#peminjaman" class="btn btn-outline-primary rounded-pill px-4">Pelajari Lebih Lanjut</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="category-card card h-100 border-0 shadow-sm">
                <div class="card-body text-center p-4">
                    <div class="category-icon bg-success bg-opacity-10">
                        <i class="fas fa-user-circle fa-2x text-success"></i>
                    </div>
                    <h4 class="mb-3">Keanggotaan</h4>
                    <p class="text-muted mb-4">Panduan mendaftar, memperbarui, dan mengelola akun anggota</p>
                    <a href="#keanggotaan" class="btn btn-outline-success rounded-pill px-4">Pelajari Lebih Lanjut</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="category-card card h-100 border-0 shadow-sm">
                <div class="card-body text-center p-4">
                    <div class="category-icon bg-warning bg-opacity-10">
                        <i class="fas fa-search fa-2x text-warning"></i>
                    </div>
                    <h4 class="mb-3">Pencarian Koleksi</h4>
                    <p class="text-muted mb-4">Cara mencari dan menemukan buku dalam koleksi perpustakaan</p>
                    <a href="#pencarian" class="btn btn-outline-warning rounded-pill px-4">Pelajari Lebih Lanjut</a>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Sections -->
    <div class="accordion" id="faqAccordion">
        <!-- Peminjaman Section -->
        <div class="mb-4" id="peminjaman">
            <h3 class="mb-4">Peminjaman Buku</h3>
            <div class="accordion-item border-0 shadow-sm">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        Bagaimana cara meminjam buku?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <ol>
                            <li>Pastikan Anda sudah terdaftar sebagai anggota perpustakaan</li>
                            <li>Cari buku yang ingin dipinjam melalui katalog online atau rak buku</li>
                            <li>Bawa buku ke meja sirkulasi</li>
                            <li>Tunjukkan kartu anggota Anda</li>
                            <li>Petugas akan memproses peminjaman</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Keanggotaan Section -->
        <div class="mb-4" id="keanggotaan">
            <h3 class="mb-4">Keanggotaan</h3>
            <div class="accordion-item border-0 shadow-sm">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        Bagaimana cara mendaftar sebagai anggota?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <ol>
                            <li>Siapkan dokumen yang diperlukan (KTP/Kartu Pelajar)</li>
                            <li>Kunjungi perpustakaan pada jam operasional</li>
                            <li>Isi formulir pendaftaran</li>
                            <li>Serahkan dokumen dan formulir ke petugas</li>
                            <li>Tunggu proses verifikasi</li>
                            <li>Ambil kartu anggota</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pencarian Section -->
        <div class="mb-4" id="pencarian">
            <h3 class="mb-4">Pencarian Koleksi</h3>
            <div class="accordion-item border-0 shadow-sm">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                        Bagaimana cara mencari buku?
                    </button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <ol>
                            <li>Gunakan katalog online di website perpustakaan</li>
                            <li>Masukkan kata kunci (judul, pengarang, atau subjek)</li>
                            <li>Pilih filter yang sesuai (tahun, bahasa, dll)</li>
                            <li>Catat nomor panggil buku</li>
                            <li>Temukan buku di rak sesuai nomor panggil</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="text-center my-5 py-5">
        <div class="bg-light p-5 rounded-4 shadow-sm">
            <h3 class="mb-4">Masih Butuh Bantuan?</h3>
            <p class="text-muted mb-4">Tim kami siap membantu Anda melalui berbagai channel komunikasi</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="#" class="contact-button btn btn-outline-primary">
                    <i class="fas fa-envelope me-2"></i>Email
                </a>
                <a href="#" class="contact-button btn btn-outline-success">
                    <i class="fab fa-whatsapp me-2"></i>WhatsApp
                </a>
                <a href="#" class="contact-button btn btn-outline-info">
                    <i class="fab fa-telegram me-2"></i>Telegram
                </a>
            </div>
        </div>
    </div>
</div>
@endsection