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
            <div style="font-size: 64px; margin-bottom: 20px;">🏛️</div>
            <h1 style="font-size: 32px; font-weight: 700; margin-bottom: 15px;">Inventaris Aset Desa</h1>
            <p style="font-size: 16px; opacity: 0.95; line-height: 1.6;">Informasi transparan mengenai aset dan inventaris desa</p>
        </div>

        {{-- Content --}}
        <div style="background: white; border-radius: 12px; padding: 32px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); margin-bottom: 30px;">
            <h2 style="font-size: 24px; font-weight: 600; color: #1b5e20; margin-bottom: 20px;">Tentang Layanan Ini</h2>
            <p style="font-size: 15px; color: #666; line-height: 1.8; margin-bottom: 20px;">
                Layanan Inventaris Aset Desa memberikan informasi lengkap dan transparan mengenai seluruh aset dan peralatan yang dimiliki oleh Desa Bangah. Dengan sistem ini, warga dapat mengetahui kondisi, lokasi, dan penggunaan dari setiap aset desa secara detail.
            </p>

            <h3 style="font-size: 18px; font-weight: 600; color: #1b5e20; margin-top: 30px; margin-bottom: 15px;">Jenis-jenis Aset yang Dikelola:</h3>
            <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    ✓ <strong>Bangunan & Infrastruktur</strong> - Gedung desa, kantor, sekolah, rumah ibadat, dll
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    ✓ <strong>Peralatan & Mesin</strong> - Peralatan pertanian, mesin produksi, kendaraan desa
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    ✓ <strong>Tanah & Properti</strong> - Tanah milik desa, hak atas tanah, dan lokasi strategis
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    ✓ <strong>Koleksi Barang</strong> - Buku, dokumen, koleksi sejarah, dan benda berharga lainnya
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555;">
                    ✓ <strong>Aset Lainnya</strong> - Sesuai dengan kepemilikan dan penggunaan desa
                </li>
            </ul>

            <h3 style="font-size: 18px; font-weight: 600; color: #1b5e20; margin-top: 30px; margin-bottom: 15px;">Informasi yang Dapat Dilihat:</h3>
            <ol style="padding-left: 20px; margin: 0;">
                <li style="padding: 10px 0; font-size: 15px; color: #555; line-height: 1.6;">
                    <strong>Daftar lengkap</strong> semua aset yang dimiliki desa
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555; line-height: 1.6;">
                    <strong>Kondisi aset</strong> dan tahun perolehan
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555; line-height: 1.6;">
                    <strong>Lokasi aset</strong> di wilayah desa
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555; line-height: 1.6;">
                    <strong>Status penggunaan</strong> dan perawatan aset
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555; line-height: 1.6;">
                    <strong>Riwayat pemeliharaan</strong> dan perbaikan aset
                </li>
            </ol>

            <h3 style="font-size: 18px; font-weight: 600; color: #1b5e20; margin-top: 30px; margin-bottom: 15px;">Keuntungan Menggunakan Layanan Ini:</h3>
            <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    📊 <strong>Transparansi</strong> - Warga dapat mengetahui aset desa secara detail
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    🔍 <strong>Pencarian Mudah</strong> - Cari aset berdasarkan kategori, kondisi, atau lokasi
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    📱 <strong>Akses Online</strong> - Lihat informasi dari perangkat apa saja kapan saja
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    💼 <strong>Manajemen Efisien</strong> - Membantu administrasi aset desa lebih terorganisir
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555;">
                    🛡️ <strong>Akuntabilitas</strong> - Meningkatkan kepercayaan publik terhadap pengelolaan aset
                </li>
            </ul>
        </div>

        {{-- CTA Box --}}
        @guest
        <div style="background: linear-gradient(135deg, #e8f5e9 0%, #f1f8f5 100%); border-left: 4px solid #1b5e20; border-radius: 8px; padding: 24px; text-align: center;">
            <p style="font-size: 15px; color: #666; margin-bottom: 20px; line-height: 1.6;">
                Ingin melihat inventaris aset desa secara detail? Login sekarang!
            </p>
            <a href="{{ route('login') }}" style="display: inline-block; background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); color: white; padding: 12px 32px; border-radius: 8px; text-decoration: none; font-weight: 600; margin-right: 12px;">
                Login Sekarang
            </a>
            <a href="{{ route('register') }}" style="display: inline-block; background: #43a047; color: white; padding: 12px 32px; border-radius: 8px; text-decoration: none; font-weight: 600;">
                Daftar Akun
            </a>
        </div>
        @endguest
    </div>
</div>
@endsection
