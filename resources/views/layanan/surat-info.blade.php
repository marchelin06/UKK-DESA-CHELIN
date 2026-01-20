@extends('layouts.app')

@section('content')
<div style="padding: 40px 20px;">
    <div style="max-width: 800px; margin: 0 auto;">
        {{-- Back Button --}}
        <a href="{{ route('layanan.publik') }}" style="display: inline-flex; align-items: center; gap: 8px; margin-bottom: 20px; padding: 10px 24px; background: linear-gradient(135deg, #1b5e20 0%, #2d7d32 100%); color: white; text-decoration: none; font-weight: 600; border-radius: 30px; font-size: 14px; transition: all 0.3s ease;">
            <i class="fas fa-chevron-left"></i> Kembali ke Layanan Publik
        </a>

        {{-- Header --}}
        <div style="background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); color: white; padding: 40px; border-radius: 12px; text-align: center; margin-bottom: 40px;">
            <div style="font-size: 64px; margin-bottom: 20px;">📄</div>
            <h1 style="font-size: 32px; font-weight: 700; margin-bottom: 15px;">Surat Menyurat Digital</h1>
            <p style="font-size: 16px; opacity: 0.95; line-height: 1.6;">Layanan pengurusan surat digital dengan proses cepat dan transparan</p>
        </div>

        {{-- Content --}}
        <div style="background: white; border-radius: 12px; padding: 32px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); margin-bottom: 30px;">
            <h2 style="font-size: 24px; font-weight: 600; color: #1b5e20; margin-bottom: 20px;">Tentang Layanan Ini</h2>
            <p style="font-size: 15px; color: #666; line-height: 1.8; margin-bottom: 20px;">
                Layanan Surat Menyurat Digital adalah saluran resmi Desa Bangah untuk memproses berbagai jenis surat yang dibutuhkan oleh warga masyarakat. Dengan sistem digital ini, proses pengurusan surat menjadi lebih efisien, transparan, dan dapat dipantau secara real-time.
            </p>

            <h3 style="font-size: 18px; font-weight: 600; color: #1b5e20; margin-top: 30px; margin-bottom: 15px;">Jenis-jenis Surat yang Tersedia:</h3>
            <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    ✓ <strong>Surat Keterangan Domisili</strong> - Bukti tinggal resmi di desa
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    ✓ <strong>Surat Keterangan Usaha</strong> - Untuk keperluan izin usaha
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    ✓ <strong>Surat Keterangan Tidak Mampu</strong> - Untuk keperluan bantuan sosial
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    ✓ <strong>Surat Rekomendasi</strong> - Untuk berbagai keperluan administratif
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555;">
                    ✓ <strong>Surat Lainnya</strong> - Sesuai kebutuhan dan peraturan yang berlaku
                </li>
            </ul>

            <h3 style="font-size: 18px; font-weight: 600; color: #1b5e20; margin-top: 30px; margin-bottom: 15px;">Prosedur Pengajuan:</h3>
            <ol style="padding-left: 20px; margin: 0;">
                <li style="padding: 10px 0; font-size: 15px; color: #555; line-height: 1.6;">
                    <strong>Login</strong> ke akun Anda atau daftar terlebih dahulu
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555; line-height: 1.6;">
                    <strong>Pilih jenis surat</strong> yang Anda butuhkan
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555; line-height: 1.6;">
                    <strong>Isi formulir</strong> dengan data diri dan informasi yang diperlukan
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555; line-height: 1.6;">
                    <strong>Tunggu persetujuan</strong> dari admin desa
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555; line-height: 1.6;">
                    <strong>Ambil surat</strong> atau cetak melalui sistem
                </li>
            </ol>

            <h3 style="font-size: 18px; font-weight: 600; color: #1b5e20; margin-top: 30px; margin-bottom: 15px;">Keuntungan Menggunakan Layanan Ini:</h3>
            <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    ⚡ <strong>Cepat</strong> - Proses pengurusan yang lebih singkat
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    📊 <strong>Transparansi</strong> - Pantau status surat Anda kapan saja
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    💻 <strong>Mudah</strong> - Akses dari mana saja tanpa harus ke kantor desa
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    📱 <strong>Digital</strong> - Semua dokumen tersimpan aman dan terorganisir
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555;">
                    🔒 <strong>Aman</strong> - Data pribadi terlindungi dengan enkripsi
                </li>
            </ul>
        </div>

        {{-- CTA Box --}}
        @guest
        <div style="background: linear-gradient(135deg, #e8f5e9 0%, #f1f8f5 100%); border-left: 4px solid #1b5e20; border-radius: 8px; padding: 16px; text-align: center;">
            <p style="font-size: 13px; color: #666; margin-bottom: 12px; line-height: 1.5; margin-top: 0;">
                Siap menggunakan layanan surat menyurat digital? 
            </p>
            <a href="{{ route('login') }}" style="display: inline-block; background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); color: white; padding: 8px 20px; border-radius: 6px; text-decoration: none; font-weight: 600; margin-right: 8px; font-size: 12px;">
                Login Sekarang
            </a>
            <a href="{{ route('register') }}" style="display: inline-block; background: #43a047; color: white; padding: 8px 20px; border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 12px;">
                Daftar Akun
            </a>
        </div>
        @endguest
    </div>
</div>
@endsection
