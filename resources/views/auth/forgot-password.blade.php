@extends('layouts.auth')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #e8f5e9 0%, #f1f8f5 100%);
        min-height: 100vh;
    }

    .forgot-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        padding: 20px;
    }

    .forgot-container {
        width: 100%;
        max-width: 500px;
    }

    .forgot-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 12px 40px rgba(27, 94, 32, 0.15);
        padding: 48px;
        border: 1px solid rgba(67, 160, 71, 0.1);
    }

    .forgot-title {
        text-align: center;
        margin-bottom: 15px;
        font-size: 28px;
        font-weight: 700;
        color: #1b5e20;
        letter-spacing: -0.5px;
    }

    .forgot-subtitle {
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

    .btn-send {
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

    .btn-send:hover {
        background: linear-gradient(135deg, #2e7d32 0%, #43a047 100%);
        box-shadow: 0 8px 24px rgba(67, 160, 71, 0.4);
        transform: translateY(-3px);
    }

    .btn-send:active {
        transform: translateY(-1px);
    }

    .forgot-footer {
        text-align: center;
        margin-top: 24px;
        font-size: 14px;
        color: #666;
    }

    .forgot-footer a {
        color: #1a7f5a;
        text-decoration: none;
        font-weight: 700;
        transition: all 0.2s ease;
    }

    .forgot-footer a:hover {
        color: #145c42;
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

    .info-box {
        background: linear-gradient(135deg, #e3f2fd 0%, #f3e5f5 100%);
        border-left: 4px solid #1b5e20;
        padding: 16px;
        border-radius: 8px;
        margin-bottom: 24px;
        font-size: 13px;
        color: #555;
        line-height: 1.6;
    }

    @media (max-width: 600px) {
        .forgot-card {
            padding: 32px 24px;
        }

        .forgot-title {
            font-size: 24px;
            margin-bottom: 12px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .btn-send {
            padding: 12px 16px;
            font-size: 15px;
        }
    }
</style>

<div class="forgot-wrapper">
    <div class="forgot-container">
        <div class="forgot-card">
            <h2 class="forgot-title">Lupa Password?</h2>
            <p class="forgot-subtitle">
                Masukkan email Anda dan kami akan mengirimkan link untuk mengatur ulang password.
            </p>

            {{-- Info Box --}}
            <div class="info-box">
                <strong>💡 Catatan:</strong> Anda akan menerima email dengan link reset password yang berlaku selama 60 menit.
            </div>

            {{-- Notifikasi Success --}}
            @if (session('success'))
                <div class="alert alert-success">
                    ✓ {{ session('success') }}
                </div>
            @endif

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

            <form action="{{ route('password.email') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input 
                        type="email" 
                        id="email"
                        name="email" 
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="Masukkan email Anda"
                        value="{{ old('email') }}" 
                        required
                        autofocus>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn-send">
                    Kirim Link Reset Password
                </button>
            </form>

            <div class="forgot-footer">
                Ingat password Anda? <a href="{{ route('login') }}">Kembali ke Login</a>
            </div>
        </div>
    </div>
</div>

@endsection
