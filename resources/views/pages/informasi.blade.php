@extends('layouts.main')

@section('title', 'Informasi')

@section('content')
<!-- Hero Section with Wave -->
<div class="hero-section position-relative" style="background: linear-gradient(45deg, #8B4513, #A0522D);">
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

<style>
body {
    background-color: var(--cream-color);
}

.wave-bottom {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
}
</style>

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

<!-- Informasi Umum Section -->
<div class="container py-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 fw-bold text-primary">Informasi Umum</h6>
        </div>
        <div class="card-body">
            @if($information->content)
                {!! $information->content !!}
            @else
                <p>Belum ada informasi umum yang tersedia. Silakan tambahkan melalui panel admin.</p>
            @endif
        </div>
    </div>
</div>

<!-- Info Cards Section -->
<div id="info-cards" class="container py-5">
    <div class="row g-4 justify-content-center">
        <!-- Jam Operasional -->
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-hover bg-gradient-light">
                <div class="card-body text-center p-4">
                    <i class="fas fa-clock fa-2x text-primary mb-3"></i>
                    <h4>Jam Operasional</h4>
                    <div class="time-display border-0 bg-transparent">
                        <span class="day">Senin - Minggu</span>
                        <span class="time">09:30 - 21:00</span>
                    </div>
                    <div class="info-alert border-0 bg-transparent mt-3">
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Waktu layanan dapat berubah pada hari libur nasional atau saat ada acara khusus
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Keanggotaan -->
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-hover bg-gradient-light">
                <div class="card-body text-center p-4">
                    <i class="fas fa-id-card fa-2x text-success mb-3"></i>
                    <h4>Keanggotaan</h4>
                    <ul class="list-unstyled mt-3">
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Gratis pendaftaran
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Data identitas valid
                        </li>
                    </ul>
                    <small class="text-muted">
                        <i class="fas fa-info-circle me-1"></i>
                        Keanggotaan berlaku untuk semua pengunjung
                    </small>
                </div>
            </div>
        </div>

        <!-- Fasilitas -->
       <div class="col-md-4">
    <div class="card h-100 border-0 shadow-hover bg-gradient-light">
        <div class="card-body text-center p-4">
            <i class="fas fa-star fa-2x text-warning mb-3"></i>
            <h4>Fasilitas</h4>
            <div class="row g-2 mt-3">
                <div class="col-6">
                    <div class="p-2">
                        <i class="fas fa-book-reader text-warning mb-2"></i>
                        <div>Area Baca</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-2">
                        <i class="fas fa-box text-warning mb-2"></i>
                        <div>Loker</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-2">
                        <i class="fas fa-restroom text-warning mb-2"></i>
                        <div>Toilet</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
:root {
    --cream-color: #FFF8DC;
    --light-brown: #DEB887;
    --medium-brown: #D2691E;
    --dark-brown: #8B4513;
    --accent-brown: #A0522D;
}

.info-card {
    background: var(--cream-color);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(139, 69, 19, 0.1);
}

.card-header {
    padding: 2rem 1.5rem;
    background: var(--light-brown);
    color: var(--dark-brown);
}

.time-display {
    background: rgba(222, 184, 135, 0.3);
    color: var(--dark-brown);
}

.time-display .time {
    color: var(--medium-brown);
    font-weight: bold;
}

.info-alert {
    background: rgba(222, 184, 135, 0.2);
    color: var(--dark-brown);
}

.info-alert.success {
    background: rgba(210, 105, 30, 0.1);
}

.feature-list li {
    background: rgba(222, 184, 135, 0.3);
    color: var(--dark-brown);
}

.feature-list li i {
    color: var(--medium-brown);
}

.facility-item {
    background: rgba(222, 184, 135, 0.3);
    color: var(--dark-brown);
}

.facility-item i {
    color: var(--medium-brown);
}

.facility-item:hover {
    background: rgba(222, 184, 135, 0.5);
}

.bg-gradient-light {
    background: linear-gradient(145deg, var(--cream-color) 0%, var(--light-brown) 100%);
}

.text-primary {
    color: var(--medium-brown) !important;
}

.text-success {
    color: var(--dark-brown) !important;
}

.text-warning {
    color: var(--accent-brown) !important;
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

.btn-outline-primary {
    color: var(--medium-brown);
    border-color: var(--medium-brown);
}

.btn-outline-primary:hover {
    background: var(--medium-brown);
    border-color: var(--medium-brown);
    color: var(--cream-color);
}
</style>

<!-- Tata Tertib Ringkas -->
<div class="container py-5">
    <h2 class="text-center mb-4">Tata Tertib Utama</h2>
    <div class="row g-4">
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-hover bg-gradient-light">
                <div class="card-body text-center p-4">
                    <i class="fas fa-box-archive fa-2x text-primary mb-3"></i>
                    <h5 class="card-title">Simpan Barang</h5>
                    <p class="card-text small">Tas dan jaket wajib disimpan di loker yang disediakan</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-hover bg-gradient-light">
                <div class="card-body text-center p-4">
                    <i class="fas fa-volume-xmark fa-2x text-danger mb-3"></i>
                    <h5 class="card-title">Jaga Ketenangan</h5>
                    <p class="card-text small">Ponsel dalam mode senyap dan hindari kegaduhan</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-hover bg-gradient-light">
                <div class="card-body text-center p-4">
                    <i class="fas fa-book-heart fa-2x text-success mb-3"></i>
                    <h5 class="card-title">Rawat Buku</h5>
                    <p class="card-text small">Dilarang mencoret atau merusak koleksi perpustakaan</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-hover bg-gradient-light">
                <div class="card-body text-center p-4">
                    <i class="fas fa-utensils fa-2x text-warning mb-3"></i>
                    <h5 class="card-title">Area Bebas Makanan</h5>
                    <p class="card-text small">Tidak membawa makanan & minuman ke dalam perpustakaan</p>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-4">
        <a href="#full-rules" class="btn btn-outline-primary rounded-pill" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="full-rules">
            <i class="fas fa-chevron-down me-2"></i>Lihat Tata Tertib Lengkap
        </a>
    </div>
    
    <!-- Full Rules Collapse Section -->
    <div class="collapse mt-4" id="full-rules">
        <div class="card card-body border-0 shadow-sm">
            <h5 class="border-bottom pb-2 mb-3">Ketentuan Pustaka Ruang Literasi Kaliurang</h5>
            
            <div class="rules-section">
                <h6 class="fw-bold mb-2">1. Waktu Operasional</h6>
                <ul class="list-unstyled ps-3 mb-4">
                    <li class="mb-2">• Senin - Minggu pukul 09.30 - 21.00 WIB</li>
                    <li>• Waktu layanan dapat berubah jika ada acara khusus atau pada hari libur nasional</li>
                </ul>

                <h6 class="fw-bold mb-2">2. Pendaftaran dan Keanggotaan</h6>
                <ul class="list-unstyled ps-3 mb-4">
                    <li class="mb-2">• Pengunjung wajib menjadi anggota Pustaka RLK untuk mendapatkan akses ke koleksi buku pustaka</li>
                    <li>• Keanggotaan perpustakaan tidak di pungut biaya, cukup dengan memberikan data identitas yang valid</li>
                </ul>

                <h6 class="fw-bold mb-2">3. Tata Tertib Perpustakaan</h6>
                <ul class="list-unstyled ps-3">
                    <li class="mb-2">• Pengunjung wajib menyimpan tas, jaket atau mantel di loker yang telah disediakan</li>
                    <li class="mb-2">• Pengunjung hanya diperbolehkan membawa laptop, buku catatan, dompet, ponsel, kunci kendaraan dan barang berharga lainnya ke dalam perpustakaan</li>
                    <li class="mb-2">• Koleksi pustaka hanya boleh untuk dibaca di area perpustakaan</li>
                    <li class="mb-2">• Pelihara buku selama digunakan. Jangan mencoret, menggambar atau merusak buku</li>
                    <li class="mb-2">• Dilarang membuat kegaduhan yang dapat mengganggu pengunjung pustaka lainnya</li>
                    <li class="mb-2">• Penggunaan ponsel diatur dalam mode senyap</li>
                    <li class="mb-2">• Makanan dan minuman tidak diperbolehkan dibawa masuk ke dalam ruang perpustakaan</li>
                    <li class="mb-2">• Pengunjung yang telah selesai membaca wajib meletakkan buku di keranjang yang telah disediakan</li>
                    <li class="mb-2">• Pengunjung wajib menjaga kebersihan selama berada di area perpustakaan</li>
                    <li class="mb-2">• Barang pribadi harus dijaga dengan baik. Pihak perpustakaan tidak bertanggung jawab atas kehilangan barang</li>
                    <li>• Pengunjung dapat menanyakan ke Pustakawan terkait koleksi buku di Pustaka RLK</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-gradient-light {
        background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);
    }
    
    .icon-box {
        width: 80px;
        height: 80px;
        box-shadow: 0 0 20px rgba(0,0,0,0.05);
    }
    
    .hover-light:hover {
        background-color: rgba(0,0,0,0.02);
        transition: all 0.3s ease;
    }
    
    .shadow-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
    }
    
    .facility-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }
    
    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
    }
</style>