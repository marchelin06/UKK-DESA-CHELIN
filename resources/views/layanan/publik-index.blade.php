@extends('layouts.app')

@section('content')
<div style="padding: 40px 20px;">
    <div style="max-width: 1000px; margin: 0 auto;">
        {{-- Header --}}
        <div style="text-align: center; margin-bottom: 50px;">
            <h1 style="font-size: 32px; font-weight: 700; color: #1b5e20; margin-bottom: 15px;">
                Layanan Publik Desa Bangah
            </h1>
            @guest
            <p style="font-size: 16px; color: #666; line-height: 1.6;">
                Berikut adalah layanan-layanan publik yang tersedia di Desa Bangah. 
                Silakan lihat informasi layanan untuk mengetahui lebih lanjut, dan lakukan login untuk mengakses layanan.
            </p>
            @endguest
        </div>

        {{-- Services Grid --}}
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 24px;">
            {{-- Surat Menyurat --}}
            <div style="background: #fff; border-radius: 12px; border: 2px solid #e8f5e9; padding: 24px; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                <div style="font-size: 48px; margin-bottom: 16px; text-align: center;">📄</div>
                <h3 style="font-size: 18px; font-weight: 600; color: #1b5e20; margin-bottom: 12px; text-align: center;">
                    Surat Menyurat Digital
                </h3>
                <p style="font-size: 14px; color: #666; margin-bottom: 20px; line-height: 1.6;">
                    Layanan pengurusan surat digital seperti surat keterangan, surat usaha, dan surat lainnya dengan proses yang cepat dan transparan.
                </p>
                <a href="{{ route('layanan.surat') }}" style="display: inline-block; width: 100%; text-align: center; background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); color: white; padding: 12px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                    Lihat Detail
                </a>
            </div>

            {{-- Inventaris Aset --}}
            <div style="background: #fff; border-radius: 12px; border: 2px solid #e8f5e9; padding: 24px; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                <div style="font-size: 48px; margin-bottom: 16px; text-align: center;">🏛️</div>
                <h3 style="font-size: 18px; font-weight: 600; color: #1b5e20; margin-bottom: 12px; text-align: center;">
                    Inventaris Aset Desa
                </h3>
                <p style="font-size: 14px; color: #666; margin-bottom: 20px; line-height: 1.6;">
                    Informasi mengenai aset dan inventaris desa yang dikelola secara transparan dan terstruktur dengan baik.
                </p>
                <a href="{{ route('layanan.inventaris') }}" style="display: inline-block; width: 100%; text-align: center; background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); color: white; padding: 12px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                    Lihat Detail
                </a>
            </div>

            {{-- Kegiatan Desa --}}
            <div style="background: #fff; border-radius: 12px; border: 2px solid #e8f5e9; padding: 24px; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                <div style="font-size: 48px; margin-bottom: 16px; text-align: center;">🎉</div>
                <h3 style="font-size: 18px; font-weight: 600; color: #1b5e20; margin-bottom: 12px; text-align: center;">
                    Kegiatan Desa
                </h3>
                <p style="font-size: 14px; color: #666; margin-bottom: 20px; line-height: 1.6;">
                    Informasi kegiatan dan acara yang diselenggarakan oleh pemerintah desa untuk kemajuan masyarakat.
                </p>
                <a href="{{ route('layanan.kegiatan') }}" style="display: inline-block; width: 100%; text-align: center; background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); color: white; padding: 12px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                    Lihat Detail
                </a>
            </div>

            {{-- Pengaduan Masyarakat --}}
            <div style="background: #fff; border-radius: 12px; border: 2px solid #e8f5e9; padding: 24px; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                <div style="font-size: 48px; margin-bottom: 16px; text-align: center;">💬</div>
                <h3 style="font-size: 18px; font-weight: 600; color: #1b5e20; margin-bottom: 12px; text-align: center;">
                    Pengaduan Masyarakat
                </h3>
                <p style="font-size: 14px; color: #666; margin-bottom: 20px; line-height: 1.6;">
                    Saluran komunikasi untuk masyarakat menyampaikan masukan, keluhan, atau saran kepada pemerintah desa.
                </p>
                <a href="{{ route('layanan.pengaduan') }}" style="display: inline-block; width: 100%; text-align: center; background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); color: white; padding: 12px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                    Lihat Detail
                </a>
            </div>
        </div>

        {{-- Info Box (HANYA UNTUK GUEST) --}}
        @guest
        <div style="margin-top: 50px; background: linear-gradient(135deg, #e8f5e9 0%, #f1f8f5 100%); border-left: 4px solid #1b5e20; border-radius: 8px; padding: 24px;">
            <h4 style="font-size: 16px; font-weight: 600; color: #1b5e20; margin-bottom: 12px;">
                ℹ️ Informasi Penting
            </h4>
            <p style="font-size: 14px; color: #666; margin-bottom: 10px; line-height: 1.6;">
                Untuk mengakses atau menggunakan layanan-layanan di atas, Anda perlu melakukan <strong>login</strong> terlebih dahulu.
            </p>
            <p style="font-size: 14px; color: #666; margin: 0; line-height: 1.6;">
                Jika belum memiliki akun, silakan <strong>registrasi</strong> sebagai warga desa terlebih dahulu.
            </p>
            <div style="margin-top: 16px;">
                <a href="{{ route('login') }}" style="display: inline-block; background: #1b5e20; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; margin-right: 12px;">
                    Login
                </a>
                <a href="{{ route('register') }}" style="display: inline-block; background: #43a047; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600;">
                    Register
                </a>
            </div>
        </div>
        @endguest
    </div>
</div>
@endsection
