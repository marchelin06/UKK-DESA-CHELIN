@extends('layouts.app')

@section('content')
<div style="padding: 40px 20px;">
    <div style="max-width: 1100px; margin: 0 auto;">
        {{-- Header --}}
        <div style="text-align: center; margin-bottom: 50px;">
            <h1 style="font-size: 36px; font-weight: 700; color: #1b5e20; margin-bottom: 15px;">
                Layanan Publik Desa Bangah
            </h1>
            <p style="font-size: 16px; color: #666; line-height: 1.6;">
                Akses semua layanan publik yang tersedia di Desa Bangah. Pilih layanan yang Anda butuhkan di bawah ini.
            </p>
        </div>

        {{-- Services Grid with actual links --}}
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; margin-bottom: 40px;">
            
            {{-- Surat Menyurat --}}
            <div style="background: #fff; border-radius: 12px; border: 2px solid #e8f5e9; padding: 24px; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.1); cursor: pointer;" 
                 onmouseover="this.style.borderColor='#43a047'; this.style.boxShadow='0 8px 20px rgba(67, 160, 71, 0.2)'; this.style.transform='translateY(-4px)';"
                 onmouseout="this.style.borderColor='#e8f5e9'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.1)'; this.style.transform='translateY(0)';"
                 style="transition: all 0.3s ease;">
                <div style="font-size: 48px; margin-bottom: 16px; text-align: center;">📄</div>
                <h3 style="font-size: 18px; font-weight: 600; color: #1b5e20; margin-bottom: 12px; text-align: center;">
                    Surat Menyurat Digital
                </h3>
                <p style="font-size: 14px; color: #666; margin-bottom: 20px; line-height: 1.6; text-align: center;">
                    Pengajuan surat digital dengan proses yang cepat dan transparan.
                </p>
                <a href="{{ route('surat.index') }}" style="display: inline-block; width: 100%; text-align: center; background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); color: white; padding: 12px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                    Akses Layanan
                </a>
            </div>

            {{-- Inventaris Aset --}}
            <div style="background: #fff; border-radius: 12px; border: 2px solid #e8f5e9; padding: 24px; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.1); cursor: pointer;" 
                 onmouseover="this.style.borderColor='#43a047'; this.style.boxShadow='0 8px 20px rgba(67, 160, 71, 0.2)'; this.style.transform='translateY(-4px)';"
                 onmouseout="this.style.borderColor='#e8f5e9'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.1)'; this.style.transform='translateY(0)';"
                 style="transition: all 0.3s ease;">
                <div style="font-size: 48px; margin-bottom: 16px; text-align: center;">🏛️</div>
                <h3 style="font-size: 18px; font-weight: 600; color: #1b5e20; margin-bottom: 12px; text-align: center;">
                    Inventaris Aset Desa
                </h3>
                <p style="font-size: 14px; color: #666; margin-bottom: 20px; line-height: 1.6; text-align: center;">
                    Informasi lengkap tentang aset dan inventaris desa.
                </p>
                <a href="{{ route('inventaris.public') }}" style="display: inline-block; width: 100%; text-align: center; background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); color: white; padding: 12px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                    Akses Layanan
                </a>
            </div>

            {{-- Kegiatan Desa --}}
            <div style="background: #fff; border-radius: 12px; border: 2px solid #e8f5e9; padding: 24px; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.1); cursor: pointer;" 
                 onmouseover="this.style.borderColor='#43a047'; this.style.boxShadow='0 8px 20px rgba(67, 160, 71, 0.2)'; this.style.transform='translateY(-4px)';"
                 onmouseout="this.style.borderColor='#e8f5e9'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.1)'; this.style.transform='translateY(0)';"
                 style="transition: all 0.3s ease;">
                <div style="font-size: 48px; margin-bottom: 16px; text-align: center;">🎉</div>
                <h3 style="font-size: 18px; font-weight: 600; color: #1b5e20; margin-bottom: 12px; text-align: center;">
                    Kegiatan Desa
                </h3>
                <p style="font-size: 14px; color: #666; margin-bottom: 20px; line-height: 1.6; text-align: center;">
                    Program dan kegiatan pembangunan desa untuk masyarakat.
                </p>
                <a href="{{ route('kegiatan.index') }}" style="display: inline-block; width: 100%; text-align: center; background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); color: white; padding: 12px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                    Akses Layanan
                </a>
            </div>

            {{-- Pengaduan Masyarakat --}}
            <div style="background: #fff; border-radius: 12px; border: 2px solid #e8f5e9; padding: 24px; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.1); cursor: pointer;" 
                 onmouseover="this.style.borderColor='#43a047'; this.style.boxShadow='0 8px 20px rgba(67, 160, 71, 0.2)'; this.style.transform='translateY(-4px)';"
                 onmouseout="this.style.borderColor='#e8f5e9'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.1)'; this.style.transform='translateY(0)';"
                 style="transition: all 0.3s ease;">
                <div style="font-size: 48px; margin-bottom: 16px; text-align: center;">💬</div>
                <h3 style="font-size: 18px; font-weight: 600; color: #1b5e20; margin-bottom: 12px; text-align: center;">
                    Pengaduan Masyarakat
                </h3>
                <p style="font-size: 14px; color: #666; margin-bottom: 20px; line-height: 1.6; text-align: center;">
                    Saluran komunikasi untuk menyampaikan masukan dan keluhan.
                </p>
                <a href="{{ route('pengaduan.create') }}" style="display: inline-block; width: 100%; text-align: center; background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); color: white; padding: 12px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                    Akses Layanan
                </a>
            </div>
        </div>

        {{-- Additional Info Box --}}
        <div style="background: linear-gradient(135deg, #e8f5e9 0%, #f1f8f5 100%); border-left: 4px solid #1b5e20; border-radius: 8px; padding: 24px;">
            <h3 style="font-size: 16px; font-weight: 600; color: #1b5e20; margin-bottom: 12px; margin-top: 0;">
                ℹ️ Informasi Lengkap Layanan
            </h3>
            <p style="font-size: 14px; color: #666; margin-bottom: 10px; line-height: 1.6;">
                Untuk informasi detail mengenai setiap layanan, silakan klik pada layanan yang Anda pilih. Anda dapat melihat deskripsi lengkap, prosedur, dan keuntungan setiap layanan.
            </p>
            <p style="font-size: 14px; color: #666; margin: 0; line-height: 1.6;">
                Jika memiliki pertanyaan atau mengalami kesulitan, silakan hubungi admin desa melalui menu Pengaduan Masyarakat.
            </p>
        </div>
    </div>
</div>
@endsection
