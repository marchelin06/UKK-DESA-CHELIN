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
            <div style="font-size: 64px; margin-bottom: 20px;">🎉</div>
            <h1 style="font-size: 32px; font-weight: 700; margin-bottom: 15px;">Kegiatan Desa</h1>
            <p style="font-size: 16px; opacity: 0.95; line-height: 1.6;">Program dan kegiatan pembangunan desa untuk kemajuan masyarakat</p>
        </div>

        {{-- Content --}}
        <div style="background: white; border-radius: 12px; padding: 32px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); margin-bottom: 30px;">
            <h2 style="font-size: 24px; font-weight: 600; color: #1b5e20; margin-bottom: 20px;">Tentang Layanan Ini</h2>
            <p style="font-size: 15px; color: #666; line-height: 1.8; margin-bottom: 20px;">
                Layanan Kegiatan Desa menyediakan informasi lengkap tentang berbagai program, acara, dan kegiatan yang diselenggarakan oleh pemerintah Desa Bangah untuk kesejahteraan dan pembangunan masyarakat. Warga dapat mengetahui detail setiap kegiatan dan turut serta dalam upaya kemajuan desa.
            </p>

            <h3 style="font-size: 18px; font-weight: 600; color: #1b5e20; margin-top: 30px; margin-bottom: 15px;">Jenis-jenis Kegiatan:</h3>
            <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    ✓ <strong>Kegiatan Pembangunan</strong> - Proyek infrastruktur dan pembangunan desa
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    ✓ <strong>Kegiatan Sosial</strong> - Program kesehatan, pendidikan, dan pemberdayaan masyarakat
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    ✓ <strong>Kegiatan Budaya</strong> - Acara budaya, tradisional, dan perayaan desa
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    ✓ <strong>Kegiatan Ekonomi</strong> - Program pengembangan UMKM dan ekonomi lokal
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555;">
                    ✓ <strong>Kegiatan Lainnya</strong> - Program khusus dan kegiatan insidental lainnya
                </li>
            </ul>

            <h3 style="font-size: 18px; font-weight: 600; color: #1b5e20; margin-top: 30px; margin-bottom: 15px;">Informasi yang Dapat Dilihat:</h3>
            <ol style="padding-left: 20px; margin: 0;">
                <li style="padding: 10px 0; font-size: 15px; color: #555; line-height: 1.6;">
                    <strong>Jadwal kegiatan</strong> dan tanggal pelaksanaan
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555; line-height: 1.6;">
                    <strong>Lokasi kegiatan</strong> dan tempat pelaksanaan
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555; line-height: 1.6;">
                    <strong>Deskripsi lengkap</strong> tujuan dan manfaat kegiatan
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555; line-height: 1.6;">
                    <strong>Peserta & target</strong> kelompok masyarakat
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555; line-height: 1.6;">
                    <strong>Dokumentasi</strong> foto dan laporan kegiatan yang sudah selesai
                </li>
            </ol>

            <h3 style="font-size: 18px; font-weight: 600; color: #1b5e20; margin-top: 30px; margin-bottom: 15px;">Keuntungan Menggunakan Layanan Ini:</h3>
            <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    📅 <strong>Informasi Terkini</strong> - Dapatkan update kegiatan desa terbaru
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    🤝 <strong>Partisipasi Aktif</strong> - Ketahui cara turut serta dalam kegiatan
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    📊 <strong>Transparansi Kemajuan</strong> - Lihat perkembangan pembangunan desa
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    💪 <strong>Pemberdayaan Masyarakat</strong> - Kesempatan mengembangkan diri melalui kegiatan
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555;">
                    🎓 <strong>Edukasi & Pelatihan</strong> - Akses informasi program pembelajaran dari desa
                </li>
            </ul>
        </div>

        {{-- CTA Box --}}
        @guest
        <div style="background: linear-gradient(135deg, #e8f5e9 0%, #f1f8f5 100%); border-left: 4px solid #1b5e20; border-radius: 8px; padding: 24px; text-align: center;">
            <p style="font-size: 15px; color: #666; margin-bottom: 20px; line-height: 1.6;">
                Ingin mengetahui kegiatan desa yang akan datang? Login sekarang!
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
