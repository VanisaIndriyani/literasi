@extends('layouts.main')

@section('title', 'Area Anggota')

@section('content')
<style>
    .login-header {
        background: linear-gradient(45deg, #8B4513, #A0522D);
        padding: 80px 0;
        color: white;
        border-radius: 0 0 100px 100px;
        box-shadow: 0 10px 30px rgba(139, 69, 19, 0.2);
        position: relative;
        overflow: hidden;
    }

    .login-header::before {
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

    .login-card {
        max-width: 500px;
        margin: -50px auto 0;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(26, 42, 108, 0.1);
    }

    .form-control {
        padding: 12px 20px;
        border-radius: 10px;
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(139, 69, 19, 0.15);
    }

    .btn-login {
        padding: 12px 30px;
        border-radius: 10px;
        background: linear-gradient(45deg, #8B4513, #A0522D);
        border: none;
        transition: all 0.3s ease;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(139, 69, 19, 0.2);
    }

    .text-primary {
        color: var(--primary-color) !important;
    }

    .help-text {
        font-size: 0.9rem;
        color: var(--dark-color);
        opacity: 0.8;
    }

    a {
        color: var(--primary-color);
    }

    a:hover {
        color: var(--accent-color);
    }

    .form-check-input:checked {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }
</style>

<div class="login-header">
    <div class="container">
        <h1 class="text-center display-4 fw-bold mb-3">Area Anggota</h1>
        <p class="text-center lead mb-0">Masuk untuk mengakses layanan perpustakaan</p>
    </div>
</div>

<div class="container py-5">
    <div class="login-card card border-0">
        <div class="card-body p-5">
            <div class="text-center mb-4">
                <i class="fas fa-user-circle fa-3x text-primary mb-3"></i>
                <h4 class="mb-0">Masuk ke Akun Anda</h4>
                <p class="text-muted">Gunakan ID anggota dan kata sandi Anda</p>
            </div>

            <form action="{{ route('login.process') }}" method="POST">
                @csrf
                <!-- After the form opening tag -->
                @if($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mb-4">
                    <label for="member_id" class="form-label">ID Anggota</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0">
                            <i class="fas fa-id-card text-muted"></i>
                        </span>
                        <input type="text" class="form-control" id="member_id" name="member_id" placeholder="Masukkan ID anggota">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0">
                            <i class="fas fa-lock text-muted"></i>
                        </span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata sandi">
                        <span class="input-group-text bg-light border-0 password-toggle" onclick="togglePassword()">
                            <i class="far fa-eye" id="toggleIcon"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Ingat saya</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-login text-white w-100 mb-4">
                    <i class="fas fa-sign-in-alt me-2"></i>Masuk
                </button>

                <div class="text-center">
                    <p class="text-muted mb-0">
                        Belum memiliki akun? 
                        <a href="{{ route('register') }}" class="text-decoration-none">Daftar di sini</a>
                    </p>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.className = 'far fa-eye-slash';
        } else {
            passwordInput.type = 'password';
            toggleIcon.className = 'far fa-eye';
        }
    }
</script>
@endsection