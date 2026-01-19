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
            <div style="font-size: 64px; margin-bottom: 20px;">💬</div>
            <h1 style="font-size: 32px; font-weight: 700; margin-bottom: 15px;">Pengaduan Masyarakat</h1>
            <p style="font-size: 16px; opacity: 0.95; line-height: 1.6;">Saluran komunikasi untuk penyampaian masukan dan keluhan masyarakat</p>
        </div>

        {{-- Content --}}
        <div style="background: white; border-radius: 12px; padding: 32px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); margin-bottom: 30px;">
            <h2 style="font-size: 24px; font-weight: 600; color: #1b5e20; margin-bottom: 20px;">Tentang Layanan Ini</h2>
            <p style="font-size: 15px; color: #666; line-height: 1.8; margin-bottom: 20px;">
                Layanan Pengaduan Masyarakat adalah saluran resmi Desa Bangah untuk menampung masukan, keluhan, kritik, dan saran dari warga masyarakat. Layanan ini dirancang untuk meningkatkan komunikasi dua arah antara pemerintah desa dan masyarakat, sehingga setiap suara warga dapat didengar dan ditindaklanjuti dengan baik.
            </p>

            <h3 style="font-size: 18px; font-weight: 600; color: #1b5e20; margin-top: 30px; margin-bottom: 15px;">Jenis-jenis Pengaduan yang Dapat Disampaikan:</h3>
            <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    ✓ <strong>Keluhan Pelayanan</strong> - Keluhan terkait pelayanan publik desa
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    ✓ <strong>Masalah Infrastruktur</strong> - Laporan kerusakan jalan, fasilitas publik, dll
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    ✓ <strong>Masalah Sosial</strong> - Laporan masalah kesejahteraan, pendidikan, kesehatan
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    ✓ <strong>Saran & Masukan</strong> - Ide dan saran untuk kemajuan desa
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555;">
                    ✓ <strong>Pengaduan Lainnya</strong> - Berbagai permasalahan yang perlu ditindaklanjuti
                </li>
            </ul>

            <h3 style="font-size: 18px; font-weight: 600; color: #1b5e20; margin-top: 30px; margin-bottom: 15px;">Prosedur Pengaduan:</h3>
            <ol style="padding-left: 20px; margin: 0;">
                <li style="padding: 10px 0; font-size: 15px; color: #555; line-height: 1.6;">
                    <strong>Login</strong> ke akun Anda terlebih dahulu
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555; line-height: 1.6;">
                    <strong>Buka layanan pengaduan</strong> dari menu layanan publik
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555; line-height: 1.6;">
                    <strong>Isi formulir pengaduan</strong> dengan detail dan deskripsi lengkap
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555; line-height: 1.6;">
                    <strong>Kirimkan pengaduan</strong> dan dapatkan nomor referensi
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555; line-height: 1.6;">
                    <strong>Pantau status</strong> pengaduan Anda melalui sistem
                </li>
            </ol>

            <h3 style="font-size: 18px; font-weight: 600; color: #1b5e20; margin-top: 30px; margin-bottom: 15px;">Keuntungan Menggunakan Layanan Ini:</h3>
            <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    🔒 <strong>Aman & Terlindungi</strong> - Data pengaduan terjamin keamanannya
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    📝 <strong>Tercatat Resmi</strong> - Semua pengaduan tercatat dan terdokumentasi dengan baik
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    ⏱️ <strong>Penindakan Cepat</strong> - Pengaduan ditindaklanjuti sesuai prosedur
                </li>
                <li style="padding: 10px 0; border-bottom: 1px solid #e0e0e0; font-size: 15px; color: #555;">
                    📊 <strong>Transparansi Status</strong> - Pantau perkembangan pengaduan Anda kapan saja
                </li>
                <li style="padding: 10px 0; font-size: 15px; color: #555;">
                    🤝 <strong>Komunikasi Dua Arah</strong> - Dialog konstruktif dengan pemerintah desa
                </li>
            </ul>

            <div style="background: #fff3cd; border-left: 4px solid #ffc107; padding: 16px; border-radius: 6px; margin-top: 30px;">
                <h4 style="color: #856404; margin-bottom: 8px; margin-top: 0;">⚠️ Catatan Penting</h4>
                <p style="font-size: 14px; color: #856404; margin: 0; line-height: 1.6;">
                    Pengaduan yang bersifat pribadi dan memuat data sensitif akan dijaga kerahasiaannya oleh pemerintah desa. Namun, pengaduan tentang kepentingan publik mungkin akan ditampilkan secara umum untuk keperluan transparansi.
                </p>
            </div>
        </div>

        {{-- CTA Box --}}
        <div style="background: linear-gradient(135deg, #e8f5e9 0%, #f1f8f5 100%); border-left: 4px solid #1b5e20; border-radius: 8px; padding: 24px; text-align: center;">
            <p style="font-size: 15px; color: #666; margin-bottom: 20px; line-height: 1.6;">
                Memiliki keluhan atau saran untuk desa? Sampaikan melalui layanan pengaduan kami.
            </p>
            <a href="{{ route('login') }}" style="display: inline-block; background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); color: white; padding: 12px 32px; border-radius: 8px; text-decoration: none; font-weight: 600; margin-right: 12px;">
                Login Sekarang
            </a>
            <a href="{{ route('register') }}" style="display: inline-block; background: #43a047; color: white; padding: 12px 32px; border-radius: 8px; text-decoration: none; font-weight: 600;">
                Daftar Akun
            </a>
        </div>
    </div>
</div>
@endsection
