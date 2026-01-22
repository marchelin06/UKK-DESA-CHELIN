@extends('layouts.app')

@section('title', 'Dashboard Pendatang - Sistem Informasi Desa')

@section('content')
<div style="max-width: 1200px; margin: 40px auto; padding: 0 20px;">
    {{-- Header Selamat Datang --}}
    <div style="background: linear-gradient(135deg, #c8e6c9 0%, #a5d6a7 100%); padding: 40px; border-radius: 16px; margin-bottom: 40px; border-left: 5px solid #2e7d32;">
        <h1 style="margin: 0 0 10px 0; font-size: 32px; font-weight: 700; color: #1b5e20;">
            🎉 Selamat Datang, {{ $user->name }}!
        </h1>
        <p style="margin: 0; color: #2e7d32; font-size: 15px;">
            Akun Anda telah disetujui admin. Anda sekarang bisa mengakses layanan publik desa.
        </p>
    </div>

    {{-- Info Status --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 40px;">
        {{-- Status Verifikasi --}}
        <div style="background: white; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); padding: 24px; border-left: 5px solid #2e7d32;">
            <div style="font-size: 14px; color: #999; font-weight: 600; text-transform: uppercase; margin-bottom: 12px;">
                ✅ Status Verifikasi
            </div>
            <p style="margin: 0; font-size: 18px; font-weight: 700; color: #2e7d32;">
                Disetujui
            </p>
            <small style="color: #999; margin-top: 8px; display: block;">
                {{ $user->verified_at ? 'Disetujui ' . $user->verified_at->format('d M Y') : 'Menunggu konfirmasi' }}
            </small>
        </div>

        {{-- Data Kunjungan --}}
        <div style="background: white; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); padding: 24px; border-left: 5px solid #1565c0;">
            <div style="font-size: 14px; color: #999; font-weight: 600; text-transform: uppercase; margin-bottom: 12px;">
                🌍 Tujuan Kunjungan
            </div>
            <p style="margin: 0; font-size: 18px; font-weight: 700; color: #1565c0;">
                {{ $user->alasan_kunjungan ?? 'Tidak ada' }}
            </p>
            <small style="color: #999; margin-top: 8px; display: block;">
                Durasi: {{ $user->durasi_tinggal ?? 'Tidak ditentukan' }}
            </small>
        </div>

        {{-- Asal --}}
        <div style="background: white; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); padding: 24px; border-left: 5px solid #f57c00;">
            <div style="font-size: 14px; color: #999; font-weight: 600; text-transform: uppercase; margin-bottom: 12px;">
                📍 Asal Daerah
            </div>
            <p style="margin: 0; font-size: 18px; font-weight: 700; color: #f57c00;">
                {{ $user->asal_daerah ?? 'Tidak ada' }}
            </p>
            <small style="color: #999; margin-top: 8px; display: block;">
                Lokasi asal kunjungan
            </small>
        </div>
    </div>

    {{-- Layanan Tersedia --}}
    <div style="margin-bottom: 40px;">
        <h2 style="font-size: 24px; font-weight: 700; color: #1b5e20; margin: 0 0 24px 0;">
            📋 Layanan yang Tersedia
        </h2>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px;">
            {{-- Surat --}}
            <a href="{{ route('layanan.surat') }}" 
               style="background: white; border-radius: 12px; padding: 24px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); text-decoration: none; transition: all 0.3s ease; border-top: 4px solid #2e7d32; display: flex; flex-direction: column; align-items: center; text-align: center;">
                <div style="font-size: 40px; margin-bottom: 12px;">📄</div>
                <h3 style="margin: 0 0 8px 0; font-size: 16px; font-weight: 700; color: #1b5e20;">
                    Layanan Surat
                </h3>
                <p style="margin: 0; color: #666; font-size: 13px;">
                    Informasi tentang surat masyarakat
                </p>
            </a>

            {{-- Inventaris --}}
            <a href="{{ route('layanan.inventaris') }}" 
               style="background: white; border-radius: 12px; padding: 24px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); text-decoration: none; transition: all 0.3s ease; border-top: 4px solid #1565c0; display: flex; flex-direction: column; align-items: center; text-align: center;">
                <div style="font-size: 40px; margin-bottom: 12px;">🏢</div>
                <h3 style="margin: 0 0 8px 0; font-size: 16px; font-weight: 700; color: #1565c0;">
                    Inventaris Desa
                </h3>
                <p style="margin: 0; color: #666; font-size: 13px;">
                    Daftar aset dan fasilitas desa
                </p>
            </a>

            {{-- Kegiatan --}}
            <a href="{{ route('layanan.kegiatan') }}" 
               style="background: white; border-radius: 12px; padding: 24px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); text-decoration: none; transition: all 0.3s ease; border-top: 4px solid #f57c00; display: flex; flex-direction: column; align-items: center; text-align: center;">
                <div style="font-size: 40px; margin-bottom: 12px;">🎉</div>
                <h3 style="margin: 0 0 8px 0; font-size: 16px; font-weight: 700; color: #f57c00;">
                    Kegiatan Desa
                </h3>
                <p style="margin: 0; color: #666; font-size: 13px;">
                    Event dan program desa
                </p>
            </a>

            {{-- Pengaduan --}}
            <a href="/layanan-publik/pengaduan" 
               style="background: white; border-radius: 12px; padding: 24px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); text-decoration: none; transition: all 0.3s ease; border-top: 4px solid #d32f2f; display: flex; flex-direction: column; align-items: center; text-align: center;">
                <div style="font-size: 40px; margin-bottom: 12px;">📢</div>
                <h3 style="margin: 0 0 8px 0; font-size: 16px; font-weight: 700; color: #d32f2f;">
                    Pengaduan Masyarakat
                </h3>
                <p style="margin: 0; color: #666; font-size: 13px;">
                    Sampaikan aspirasi Anda
                </p>
            </a>
        </div>
    </div>

    {{-- Info Penting --}}
    <div style="background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%); padding: 24px; border-radius: 12px; border-left: 5px solid #ff9800; margin-bottom: 24px;">
        <div style="font-weight: 700; color: #856404; margin-bottom: 12px;">
            ℹ️ Informasi Penting
        </div>
        <ul style="margin: 0; padding-left: 20px; color: #856404; font-size: 14px;">
            <li style="margin-bottom: 8px;">Layanan sebatas viewing informasi publik sebagai pendatang</li>
            <li style="margin-bottom: 8px;">Untuk kebutuhan layanan tertentu, silakan hubungi admin desa</li>
            <li>Durasi akses Anda: <strong>{{ $user->durasi_tinggal ?? 'Tidak ditentukan' }}</strong></li>
        </ul>
    </div>

    {{-- Data Profil --}}
    <div style="background: white; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); padding: 24px;">
        <h3 style="margin: 0 0 20px 0; font-size: 18px; font-weight: 700; color: #1b5e20;">
            👤 Data Profil Anda
        </h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
            <div>
                <label style="font-size: 12px; color: #999; font-weight: 600; text-transform: uppercase;">Nama</label>
                <p style="margin: 8px 0 0 0; color: #333; font-size: 15px;">{{ $user->name }}</p>
            </div>
            <div>
                <label style="font-size: 12px; color: #999; font-weight: 600; text-transform: uppercase;">Email</label>
                <p style="margin: 8px 0 0 0; color: #333; font-size: 15px;">{{ $user->email }}</p>
            </div>
            <div>
                <label style="font-size: 12px; color: #999; font-weight: 600; text-transform: uppercase;">Status</label>
                <p style="margin: 8px 0 0 0; color: #333; font-size: 15px;">
                    <span style="background: #c8e6c9; color: #1b5e20; padding: 4px 12px; border-radius: 12px; font-weight: 600; display: inline-block; font-size: 13px;">
                        Pendatang ✓
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>

<style>
    a:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.12) !important;
    }

    @media (max-width: 768px) {
        div[style*="grid-template-columns"] {
            grid-template-columns: 1fr !important;
        }
    }
</style>
@endsection
