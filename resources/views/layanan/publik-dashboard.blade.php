@extends('layouts.app')

@section('content')
<div style="padding: 40px 20px;">
    <div style="max-width: 1100px; margin: 0 auto;">
        {{-- Header --}}
        <div style="text-align: left; margin-bottom: 40px;">
            <h1 style="font-size: 32px; font-weight: 700; color: #1b5e20; margin-bottom: 12px; margin-top: 0;">
                Halo, {{ explode(' ', Auth::user()->name)[0] }} 👋
            </h1>
            <p style="font-size: 15px; color: #888; line-height: 1.6; margin-top: 0;">
                Selamat datang di dashboard Anda. Kelola layanan desa dengan mudah.
            </p>
        </div>

        {{-- Services Grid with actual links --}}
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; margin-bottom: 40px;">
            
            {{-- Surat Menyurat --}}
            <div style="background: #fff; border-radius: 12px; border: 2px solid #e8f5e9; padding: 16px; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.1); cursor: pointer;" 
                 onmouseover="this.style.borderColor='#43a047'; this.style.boxShadow='0 8px 20px rgba(67, 160, 71, 0.2)'; this.style.transform='translateY(-4px)';"
                 onmouseout="this.style.borderColor='#e8f5e9'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.1)'; this.style.transform='translateY(0)';"
                 style="transition: all 0.3s ease;">
                <div style="font-size: 32px; margin-bottom: 10px; text-align: center;">📄</div>
                <h3 style="font-size: 14px; font-weight: 700; color: #1b5e20; margin-bottom: 8px; text-align: center; margin-top: 0;">
                    Surat Menyurat Digital
                </h3>
                <p style="font-size: 12px; color: #888; margin-bottom: 12px; line-height: 1.4; text-align: center; margin-top: 0;">
                    Pengajuan surat digital dengan proses yang cepat dan transparan.
                </p>
                <a href="{{ route('surat.index') }}" style="display: inline-block; width: 100%; text-align: center; background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); color: white; padding: 8px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease; font-size: 13px;">
                    Akses Layanan
                </a>
            </div>

            <div style="background: #fff; border-radius: 12px; border: 2px solid #e8f5e9; padding: 16px; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.1); cursor: pointer;" 
                 onmouseover="this.style.borderColor='#43a047'; this.style.boxShadow='0 8px 20px rgba(67, 160, 71, 0.2)'; this.style.transform='translateY(-4px)';"
                 onmouseout="this.style.borderColor='#e8f5e9'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.1)'; this.style.transform='translateY(0)';"
                 style="transition: all 0.3s ease;">
                <div style="font-size: 32px; margin-bottom: 10px; text-align: center;">🏛️</div>
                <h3 style="font-size: 14px; font-weight: 700; color: #1b5e20; margin-bottom: 8px; text-align: center; margin-top: 0;">
                    Inventaris Aset Desa
                </h3>
                <p style="font-size: 12px; color: #888; margin-bottom: 12px; line-height: 1.4; text-align: center; margin-top: 0;">
                    Informasi lengkap tentang aset dan inventaris desa.
                </p>
                <a href="{{ route('inventaris.public') }}" style="display: inline-block; width: 100%; text-align: center; background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); color: white; padding: 8px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease; font-size: 13px;">
                    Akses Layanan
                </a>
            </div>

            {{-- Kegiatan Desa --}}
            <div style="background: #fff; border-radius: 12px; border: 2px solid #e8f5e9; padding: 16px; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.1); cursor: pointer;" 
                 onmouseover="this.style.borderColor='#43a047'; this.style.boxShadow='0 8px 20px rgba(67, 160, 71, 0.2)'; this.style.transform='translateY(-4px)';"
                 onmouseout="this.style.borderColor='#e8f5e9'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.1)'; this.style.transform='translateY(0)';"
                 style="transition: all 0.3s ease;">
                <div style="font-size: 32px; margin-bottom: 10px; text-align: center;">🎉</div>
                <h3 style="font-size: 14px; font-weight: 700; color: #1b5e20; margin-bottom: 8px; text-align: center; margin-top: 0;">
                    Kegiatan Desa
                </h3>
                <p style="font-size: 12px; color: #888; margin-bottom: 12px; line-height: 1.4; text-align: center; margin-top: 0;">
                    Program dan kegiatan pembangunan desa untuk masyarakat.
                </p>
                <a href="{{ route('kegiatan.index') }}" style="display: inline-block; width: 100%; text-align: center; background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); color: white; padding: 8px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease; font-size: 13px;">
                    Akses Layanan
                </a>
            </div>

            {{-- Pengaduan Masyarakat --}}
            <div style="background: #fff; border-radius: 12px; border: 2px solid #e8f5e9; padding: 16px; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.1); cursor: pointer;" 
                 onmouseover="this.style.borderColor='#43a047'; this.style.boxShadow='0 8px 20px rgba(67, 160, 71, 0.2)'; this.style.transform='translateY(-4px)';"
                 onmouseout="this.style.borderColor='#e8f5e9'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.1)'; this.style.transform='translateY(0)';"
                 style="transition: all 0.3s ease;">
                <div style="font-size: 32px; margin-bottom: 10px; text-align: center;">💬</div>
                <h3 style="font-size: 14px; font-weight: 700; color: #1b5e20; margin-bottom: 8px; text-align: center; margin-top: 0;">
                    Pengaduan Masyarakat
                </h3>
                <p style="font-size: 12px; color: #888; margin-bottom: 12px; line-height: 1.4; text-align: center; margin-top: 0;">
                    Saluran komunikasi untuk menyampaikan masukan dan keluhan.
                </p>
                <a href="{{ route('pengaduan.create') }}" style="display: inline-block; width: 100%; text-align: center; background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); color: white; padding: 8px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease; font-size: 13px;">
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
