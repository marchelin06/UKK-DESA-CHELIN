@extends('layouts.auth')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #e8f5e9 0%, #f1f8f5 100%);
    }

    .register-wrapper {
        display: block;
        padding: 60px 20px;
    }

    .register-container {
        width: 100%;
        max-width: 550px;
        margin: 0 auto;
    }

    .register-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 12px 40px rgba(27, 94, 32, 0.15);
        padding: 40px;
        border: 1px solid rgba(67, 160, 71, 0.1);
    }

    .register-title {
        text-align: center;
        margin-bottom: 28px;
        margin-top: 0;
        font-size: 28px;
        font-weight: 700;
        color: #1b5e20;
        letter-spacing: -0.5px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #1b5e20;
        font-size: 14px;
        letter-spacing: 0.2px;
    }

    .form-control {
        width: 100%;
        padding: 12px 14px;
        border: 2px solid #e8f5e9;
        border-radius: 12px;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
        transition: all 0.3s ease;
        background: #f9fbf7;
        box-sizing: border-box;
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
        font-size: 13px;
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

    .alert-warning {
        background: linear-gradient(135deg, #fff9c4 0%, #fff59d 100%);
        color: #856404;
        border: 1px solid #fbc02d;
    }

    .alert ul {
        margin: 0;
        padding-left: 18px;
    }

    .alert li {
        margin-bottom: 6px;
    }

    .btn-register {
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

    .btn-register:hover {
        background: linear-gradient(135deg, #2e7d32 0%, #43a047 100%);
        box-shadow: 0 8px 24px rgba(67, 160, 71, 0.4);
        transform: translateY(-3px);
    }

    .btn-register:active {
        transform: translateY(-1px);
    }

    .register-footer {
        text-align: center;
        margin-top: 24px;
        font-size: 14px;
        color: #666;
    }

    .register-footer a {
        color: #2e7d32;
        text-decoration: none;
        font-weight: 700;
        transition: all 0.2s ease;
    }

    .register-footer a:hover {
        color: #0d3a1a;
        text-decoration: underline;
    }

    .form-info {
        font-size: 12px;
        color: #999;
        margin-top: 4px;
    }

    .error-message {
        color: #d32f2f;
        margin-top: 4px;
        display: block;
        font-size: 12px;
        font-weight: 500;
    }

    .form-control.is-invalid {
        border-color: #ef5350;
    }

    .form-control.is-invalid:focus {
        box-shadow: 0 0 0 5px rgba(239, 83, 80, 0.12);
    }

    .recaptcha-error {
        color: #d32f2f;
        font-size: 13px;
        margin-top: 8px;
        display: block;
        font-weight: 500;
    }

    .g-recaptcha {
        margin: 20px 0;
        display: flex;
        justify-content: center;
    }

    @media (max-width: 600px) {
        .register-card {
            padding: 32px 24px;
        }

        .register-title {
            font-size: 28px;
            margin-bottom: 24px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .btn-register {
            padding: 12px 16px;
            font-size: 15px;
        }
    }
</style>

<div class="register-wrapper">
    <div class="register-container">
        <div class="register-card">
            <h2 class="register-title">Register</h2>

            {{-- Error Validasi --}}
            @if ($errors->any())
                <div class="alert alert-warning">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.post') }}" method="POST">
                @csrf

                {{-- Nama Lengkap --}}
                <div class="form-group">
                    <label for="name">Nama Lengkap *</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Username --}}
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror"
                        placeholder="Masukkan username (opsional)" value="{{ old('username') }}">
                    <small class="form-info">Opsional</small>
                    @error('username')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Masukkan email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label for="password">Password *</label>
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Masukkan password (min 6 karakter)" required>
                    <small class="form-info">Minimal 6 karakter</small>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Konfirmasi Password --}}
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password *</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" 
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="Konfirmasi password" required>
                    @error('password_confirmation')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Divider untuk Info Pendatang --}}
                <div style="margin: 24px 0; border-top: 1px solid #e8f5e9; padding-top: 20px;">
                    <p style="font-size: 13px; color: #666; margin-bottom: 16px; text-align: center;">
                        ℹ️ <strong>Apakah Anda Pendatang?</strong><br>
                        <span style="font-size: 12px;">Isi informasi di bawah jika Anda bukan warga asli desa</span>
                    </p>
                </div>

                {{-- Alasan Kunjungan --}}
                <div class="form-group">
                    <label for="alasan_kunjungan">Alasan/Tujuan Kunjungan (Opsional)</label>
                    <select id="alasan_kunjungan" name="alasan_kunjungan" class="form-control @error('alasan_kunjungan') is-invalid @enderror">
                        <option value="">-- Pilih Alasan --</option>
                        <option value="Wisata" {{ old('alasan_kunjungan') == 'Wisata' ? 'selected' : '' }}>Wisata</option>
                        <option value="Kerja" {{ old('alasan_kunjungan') == 'Kerja' ? 'selected' : '' }}>Kerja</option>
                        <option value="Bisnis" {{ old('alasan_kunjungan') == 'Bisnis' ? 'selected' : '' }}>Bisnis</option>
                        <option value="Keluarga" {{ old('alasan_kunjungan') == 'Keluarga' ? 'selected' : '' }}>Keluarga</option>
                        <option value="Pendidikan" {{ old('alasan_kunjungan') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                        <option value="Lainnya" {{ old('alasan_kunjungan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    <small class="form-info">Opsional</small>
                    @error('alasan_kunjungan')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Durasi Tinggal --}}
                <div class="form-group">
                    <label for="durasi_tinggal">Durasi Tinggal (Opsional)</label>
                    <input type="text" id="durasi_tinggal" name="durasi_tinggal" class="form-control @error('durasi_tinggal') is-invalid @enderror"
                        placeholder="Contoh: 1-2 minggu, 1 bulan" value="{{ old('durasi_tinggal') }}">
                    <small class="form-info">Opsional</small>
                    @error('durasi_tinggal')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Asal Daerah --}}
                <div class="form-group">
                    <label for="asal_daerah">Asal Daerah/Negara (Opsional)</label>
                    <input type="text" id="asal_daerah" name="asal_daerah" class="form-control @error('asal_daerah') is-invalid @enderror"
                        placeholder="Contoh: Jakarta, Indonesia" value="{{ old('asal_daerah') }}">
                    <small class="form-info">Opsional</small>
                    @error('asal_daerah')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                {{-- reCAPTCHA v2 Checkbox --}}
                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                @if ($errors->has('g-recaptcha-response'))
                    <span class="recaptcha-error">{{ $errors->first('g-recaptcha-response') }}</span>
                @endif

                <button type="submit" class="btn-register">
                    Register
                </button>
            </form>

            <div class="register-footer">
                Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
            </div>
        </div>
    </div>
</div>

@endsection

<script src="https://www.google.com/recaptcha/api.js" async defer></script>