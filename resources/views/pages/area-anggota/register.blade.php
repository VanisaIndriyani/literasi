@extends('layouts.main')

@section('title', 'Daftar Anggota')

@section('content')
<style>
    .register-header {
        background: linear-gradient(45deg, #8B4513, #A0522D);
        padding: 80px 0;
        color: white;
        border-radius: 0 0 100px 100px;
        box-shadow: 0 10px 30px rgba(139, 69, 19, 0.2);
        position: relative;
        overflow: hidden;
    }

    .register-card {
        max-width: 500px;
        margin: -50px auto 0;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(139, 69, 19, 0.1);
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

    .btn-register {
        padding: 12px 30px;
        border-radius: 10px;
        background: linear-gradient(45deg, #8B4513, #A0522D);
        border: none;
        transition: all 0.3s ease;
    }

    .btn-register:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(139, 69, 19, 0.2);
    }
</style>

<div class="register-header">
    <div class="container">
        <h1 class="text-center display-4 fw-bold mb-3">Daftar Anggota</h1>
        <p class="text-center lead mb-0">Bergabunglah dengan Perpustakaan Ruang Literasi Kaliurang</p>
    </div>
</div>

<div class="container py-5">
    <div class="register-card card border-0">
        <div class="card-body p-5">
            <div class="text-center mb-4">
                <i class="fas fa-user-plus fa-3x text-primary mb-3"></i>
                <h4 class="mb-0">Formulir Pendaftaran</h4>
                <p class="text-muted">Buat akun anggota baru</p>
            </div>

            <form action="{{ route('register.process') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="member_id" class="form-label">ID Anggota</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0">
                            <i class="fas fa-id-card text-muted"></i>
                        </span>
                        <input type="text" class="form-control @error('member_id') is-invalid @enderror" id="member_id" name="member_id" value="{{ old('member_id') }}" required>
                    </div>
                    @error('member_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0">
                            <i class="fas fa-lock text-muted"></i>
                        </span>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        <span class="input-group-text bg-light border-0 password-toggle" onclick="togglePassword('password', 'toggleIcon1')">
                            <i class="far fa-eye" id="toggleIcon1"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0">
                            <i class="fas fa-lock text-muted"></i>
                        </span>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        <span class="input-group-text bg-light border-0 password-toggle" onclick="togglePassword('password_confirmation', 'toggleIcon2')">
                            <i class="far fa-eye" id="toggleIcon2"></i>
                        </span>
                    </div>
                </div>

                <button type="submit" class="btn btn-register text-white w-100 mb-4">
                    <i class="fas fa-user-plus me-2"></i>Daftar
                </button>

                <div class="text-center">
                    <p class="text-muted mb-0">
                        Sudah memiliki akun? 
                        <a href="{{ route('login') }}" class="text-decoration-none">Masuk di sini</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function togglePassword(inputId, iconId) {
        const passwordInput = document.getElementById(inputId);
        const toggleIcon = document.getElementById(iconId);
        
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