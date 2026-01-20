@extends('layouts.auth')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #e8f5e9 0%, #f1f8f5 100%);
        min-height: 100vh;
    }

    .reset-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        padding: 20px;
    }

    .reset-container {
        width: 100%;
        max-width: 500px;
    }

    .reset-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 12px 40px rgba(27, 94, 32, 0.15);
        padding: 48px;
        border: 1px solid rgba(67, 160, 71, 0.1);
    }

    .reset-title {
        text-align: center;
        margin-bottom: 15px;
        font-size: 28px;
        font-weight: 700;
        color: #1b5e20;
        letter-spacing: -0.5px;
    }

    .reset-subtitle {
        text-align: center;
        margin-bottom: 32px;
        font-size: 14px;
        color: #666;
        line-height: 1.6;
    }

    .form-group {
        margin-bottom: 24px;
    }

    .form-group label {
        display: block;
        margin-bottom: 10px;
        font-weight: 600;
        color: #1b5e20;
        font-size: 15px;
        letter-spacing: 0.3px;
    }

    .form-control {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid #e8f5e9;
        border-radius: 12px;
        font-size: 15px;
        font-family: 'Poppins', sans-serif;
        transition: all 0.3s ease;
        background: #f9fbf7;
    }

    .form-control:focus {
        outline: none;
        border-color: #43a047;
        background: #ffffff;
        box-shadow: 0 0 0 5px rgba(67, 160, 71, 0.12);
    }

    .form-control::placeholder {
        color: #a5d6a7;
    }

    .alert {
        padding: 14px 16px;
        border-radius: 12px;
        margin-bottom: 20px;
        font-size: 14px;
        animation: slideIn 0.3s ease;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .alert-success {
        background: linear-gradient(135deg, #c8e6c9 0%, #a5d6a7 100%);
        color: #1b5e20;
        border: 1px solid #81c784;
    }

    .alert-danger {
        background: linear-gradient(135deg, #ffcdd2 0%, #ef9a9a 100%);
        color: #c62828;
        border: 1px solid #ef5350;
    }

    .alert-warning {
        background: linear-gradient(135deg, #fff9c4 0%, #fff59d 100%);
        color: #856404;
        border: 1px solid #fbc02d;
    }

    .btn-reset {
        width: 100%;
        background: linear-gradient(135deg, #43a047 0%, #66bb6a 100%);
        color: white;
        padding: 14px 20px;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 16px rgba(67, 160, 71, 0.3);
        letter-spacing: 0.5px;
        margin-top: 8px;
    }

    .btn-reset:hover {
        background: linear-gradient(135deg, #2e7d32 0%, #43a047 100%);
        box-shadow: 0 8px 24px rgba(67, 160, 71, 0.4);
        transform: translateY(-3px);
    }

    .btn-reset:active {
        transform: translateY(-1px);
    }

    .reset-footer {
        text-align: center;
        margin-top: 24px;
        font-size: 14px;
        color: #666;
    }

    .reset-footer a {
        color: #2e7d32;
        text-decoration: none;
        font-weight: 700;
        transition: all 0.2s ease;
    }

    .reset-footer a:hover {
        color: #0d3a1a;
        text-decoration: underline;
    }

    .error-message {
        color: #d32f2f;
        margin-top: 6px;
        display: block;
        font-size: 13px;
        font-weight: 500;
    }

    .form-control.is-invalid {
        border-color: #ef5350;
    }

    .form-control.is-invalid:focus {
        box-shadow: 0 0 0 5px rgba(239, 83, 80, 0.12);
    }

    .password-info {
        background: linear-gradient(135deg, #f3e5f5 0%, #e3f2fd 100%);
        border-left: 4px solid #1b5e20;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 13px;
        color: #555;
    }

    .password-info ul {
        margin: 0;
        padding-left: 18px;
    }

    .password-info li {
        margin-bottom: 4px;
    }

    @media (max-width: 600px) {
        .reset-card {
            padding: 32px 24px;
        }

        .reset-title {
            font-size: 24px;
            margin-bottom: 12px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .btn-reset {
            padding: 12px 16px;
            font-size: 15px;
        }
    }
</style>

<div class="reset-wrapper">
    <div class="reset-container">
        <div class="reset-card">
            <h2 class="reset-title">Atur Ulang Password</h2>
            <p class="reset-subtitle">
                Masukkan password baru Anda untuk menyelesaikan proses reset password.
            </p>

            {{-- Info Box --}}
            <div class="password-info">
                <strong>📋 Persyaratan Password:</strong>
                <ul>
                    <li>Minimal 6 karakter</li>
                    <li>Kombinasi huruf, angka, dan simbol lebih aman</li>
                    <li>Jangan gunakan password yang mudah ditebak</li>
                </ul>
            </div>

            {{-- Notifikasi Error --}}
            @if (session('error'))
                <div class="alert alert-danger">
                    ✕ {{ session('error') }}
                </div>
            @endif

            {{-- Error Validasi --}}
            @if ($errors->any())
                <div class="alert alert-warning">
                    <ul style="margin: 0; padding-left: 18px;">
                        @foreach ($errors->all() as $error)
                            <li style="margin-bottom: 6px;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('password.update') }}" method="POST">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input 
                        type="email" 
                        id="email"
                        name="email" 
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="Masukkan email Anda"
                        value="{{ old('email', $email ?? '') }}" 
                        required
                        autofocus>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input 
                        type="password" 
                        id="password"
                        name="password" 
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Masukkan password baru"
                        required>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input 
                        type="password" 
                        id="password_confirmation"
                        name="password_confirmation" 
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="Ulangi password baru"
                        required>
                    @error('password_confirmation')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn-reset">
                    Atur Ulang Password
                </button>
            </form>

            <div class="reset-footer">
                <a href="{{ route('login') }}"><i class="fas fa-chevron-left"></i> Kembali ke Login</a>
            </div>
        </div>
    </div>
</div>

@endsection
