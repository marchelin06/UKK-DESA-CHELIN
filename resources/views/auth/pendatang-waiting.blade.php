@extends('layouts.auth')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #e8f5e9 0%, #f1f8f5 100%);
        min-height: 100vh;
    }

    .waiting-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        padding: 20px;
    }

    .waiting-container {
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
    }

    .waiting-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 12px 40px rgba(27, 94, 32, 0.15);
        padding: 48px;
        border: 1px solid rgba(67, 160, 71, 0.1);
        text-align: center;
    }

    .waiting-icon {
        font-size: 64px;
        margin-bottom: 20px;
        animation: spin 3s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .waiting-title {
        font-size: 28px;
        font-weight: 700;
        color: #1b5e20;
        margin-bottom: 12px;
    }

    .waiting-subtitle {
        font-size: 16px;
        color: #666;
        line-height: 1.6;
        margin-bottom: 30px;
    }

    .info-box {
        background: linear-gradient(135deg, #e8f5e9 0%, #f1f8f5 100%);
        border-left: 4px solid #1b5e20;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 24px;
        text-align: left;
    }

    .info-box h4 {
        font-size: 14px;
        font-weight: 600;
        color: #1b5e20;
        margin-bottom: 12px;
    }

    .info-box p {
        font-size: 13px;
        color: #666;
        margin-bottom: 8px;
        line-height: 1.5;
    }

    .info-box p:last-child {
        margin-bottom: 0;
    }

    .info-label {
        font-weight: 600;
        color: #333;
        display: inline-block;
        min-width: 120px;
    }

    .info-value {
        color: #1b5e20;
    }

    .action-buttons {
        display: flex;
        gap: 12px;
        justify-content: center;
        margin-top: 24px;
    }

    .btn-action {
        display: inline-block;
        padding: 12px 24px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn-check {
        background: linear-gradient(135deg, #43a047 0%, #66bb6a 100%);
        color: white;
        box-shadow: 0 4px 16px rgba(67, 160, 71, 0.3);
    }

    .btn-check:hover {
        background: linear-gradient(135deg, #2e7d32 0%, #43a047 100%);
        box-shadow: 0 8px 24px rgba(67, 160, 71, 0.4);
        transform: translateY(-2px);
    }

    .btn-home {
        background: #f0f0f0;
        color: #666;
    }

    .btn-home:hover {
        background: #e0e0e0;
    }

    .timeline {
        margin-top: 30px;
        text-align: left;
    }

    .timeline-item {
        display: flex;
        gap: 12px;
        margin-bottom: 16px;
        font-size: 13px;
    }

    .timeline-icon {
        color: #1b5e20;
        font-weight: bold;
        min-width: 24px;
    }

    .timeline-text {
        color: #666;
        flex: 1;
    }

    .timeline-text strong {
        color: #333;
    }

    .step-active {
        color: #43a047;
    }

    .step-pending {
        color: #999;
    }

    @media (max-width: 600px) {
        .waiting-card {
            padding: 32px 24px;
        }

        .waiting-title {
            font-size: 24px;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn-action {
            width: 100%;
        }
    }
</style>

<div class="waiting-wrapper">
    <div class="waiting-container">
        <div class="waiting-card">
            <div class="waiting-icon">⏳</div>
            <h1 class="waiting-title">Sedang Diproses</h1>
            <p class="waiting-subtitle">
                Akun Anda sedang menunggu verifikasi dari Admin Desa Bangah
            </p>

            <div class="info-box">
                <h4>📋 Data Anda</h4>
                <p>
                    <span class="info-label">Nama:</span>
                    <span class="info-value">{{ Auth::check() ? Auth::user()->name : 'N/A' }}</span>
                </p>
                <p>
                    <span class="info-label">Email:</span>
                    <span class="info-value">{{ Auth::check() ? Auth::user()->email : 'N/A' }}</span>
                </p>
                @if (Auth::check() && Auth::user()->alasan_kunjungan)
                <p>
                    <span class="info-label">Tujuan:</span>
                    <span class="info-value">{{ Auth::user()->alasan_kunjungan }}</span>
                </p>
                @endif
                @if (Auth::check() && Auth::user()->durasi_tinggal)
                <p>
                    <span class="info-label">Durasi:</span>
                    <span class="info-value">{{ Auth::user()->durasi_tinggal }}</span>
                </p>
                @endif
                <p>
                    <span class="info-label">Terdaftar:</span>
                    <span class="info-value">{{ Auth::check() ? Auth::user()->created_at->format('d M Y, H:i') : 'N/A' }}</span>
                </p>
            </div>

            <div class="timeline">
                <h4 style="font-size: 14px; font-weight: 600; color: #1b5e20; margin-bottom: 12px;">📍 Tahap Verifikasi</h4>
                <div class="timeline-item">
                    <div class="timeline-icon step-active">✓</div>
                    <div class="timeline-text"><strong>Akun Terdaftar</strong><br><small>Selesai</small></div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-icon step-active">⌚</div>
                    <div class="timeline-text"><strong>Menunggu Verifikasi Admin</strong><br><small>Estimasi 1-2 hari kerja</small></div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-icon step-pending">→</div>
                    <div class="timeline-text"><strong>Akun Aktif</strong><br><small>Menunggu approval</small></div>
                </div>
            </div>

            <div style="background: #fff3cd; border-left: 4px solid #ffc107; border-radius: 8px; padding: 16px; margin-top: 24px; text-align: left;">
                <p style="font-size: 13px; color: #856404; margin: 0;">
                    <strong>💡 Info:</strong> Anda akan menerima email notifikasi ketika akun Anda disetujui atau ditolak. Pastikan email Anda aktif dan cek folder spam jika tidak menemukan email notifikasi.
                </p>
            </div>

            <div class="action-buttons">
                <a href="{{ route('home') }}" class="btn-action btn-home">
                    ← Kembali ke Beranda
                </a>
                <a href="javascript:location.reload()" class="btn-action btn-check">
                    🔄 Cek Status
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
