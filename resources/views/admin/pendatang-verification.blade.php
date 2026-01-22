@extends('layouts.app')

@section('content')
<div style="max-width: 1200px; margin: 40px auto; padding: 0 20px;">
    {{-- Header --}}
    <div style="margin-bottom: 40px;">
        <h1 style="font-size: 32px; font-weight: 700; color: #1b5e20; margin: 0 0 10px 0;">
            🔍 Verifikasi Pendatang
        </h1>
        <p style="color: #666; margin: 0; font-size: 15px;">
            Kelola dan setujui permohonan pendatang yang ingin mengakses sistem
        </p>
    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div style="background: linear-gradient(135deg, #c8e6c9 0%, #a5d6a7 100%); color: #1b5e20; padding: 16px 20px; border-radius: 12px; border-left: 4px solid #2e7d32; margin-bottom: 24px; font-weight: 500;">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Statistics --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 32px;">
        {{-- Menunggu --}}
        <div style="background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%); padding: 24px; border-radius: 16px; border: 1px solid #ffc107; box-shadow: 0 4px 12px rgba(255, 193, 7, 0.15);">
            <div style="font-size: 14px; color: #856404; font-weight: 600; margin-bottom: 8px;">
                ⏳ Menunggu Persetujuan
            </div>
            <div style="font-size: 36px; font-weight: 700; color: #856404;">
                {{ $pendatangMenunggu->total() }}
            </div>
            <p style="color: #856404; font-size: 13px; margin: 8px 0 0 0;">
                Permohonan baru yang perlu ditinjau
            </p>
        </div>

        {{-- Disetujui --}}
        <div style="background: linear-gradient(135deg, #c8e6c9 0%, #a5d6a7 100%); padding: 24px; border-radius: 16px; border: 1px solid #81c784; box-shadow: 0 4px 12px rgba(67, 160, 71, 0.15);">
            <div style="font-size: 14px; color: #1b5e20; font-weight: 600; margin-bottom: 8px;">
                ✅ Disetujui
            </div>
            <div style="font-size: 36px; font-weight: 700; color: #2e7d32;">
                {{ $pendatangDisetujui }}
            </div>
            <p style="color: #1b5e20; font-size: 13px; margin: 8px 0 0 0;">
                Pendatang yang sudah aktif
            </p>
        </div>

        {{-- Ditolak --}}
        <div style="background: linear-gradient(135deg, #ffcccc 0%, #ffaaaa 100%); padding: 24px; border-radius: 16px; border: 1px solid #ef5350; box-shadow: 0 4px 12px rgba(239, 83, 80, 0.15);">
            <div style="font-size: 14px; color: #b71c1c; font-weight: 600; margin-bottom: 8px;">
                ❌ Ditolak
            </div>
            <div style="font-size: 36px; font-weight: 700; color: #d32f2f;">
                {{ $pendatangDitolak }}
            </div>
            <p style="color: #b71c1c; font-size: 13px; margin: 8px 0 0 0;">
                Permohonan yang ditolak
            </p>
        </div>
    </div>

    {{-- Tabel Pendatang Menunggu --}}
    @if ($pendatangMenunggu->count() > 0)
        <div style="background: white; border-radius: 16px; box-shadow: 0 4px 16px rgba(0,0,0,0.08); overflow: hidden;">
            <div style="background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); padding: 20px; color: white;">
                <h2 style="margin: 0; font-size: 18px; font-weight: 700;">
                    📋 Permohonan Menunggu Persetujuan
                </h2>
            </div>

            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
                    <thead>
                        <tr style="background: #f5f5f5; border-bottom: 2px solid #e0e0e0;">
                            <th style="padding: 16px; text-align: left; font-weight: 600; color: #1b5e20;">Nama</th>
                            <th style="padding: 16px; text-align: left; font-weight: 600; color: #1b5e20;">Email</th>
                            <th style="padding: 16px; text-align: left; font-weight: 600; color: #1b5e20;">Tujuan</th>
                            <th style="padding: 16px; text-align: left; font-weight: 600; color: #1b5e20;">Asal</th>
                            <th style="padding: 16px; text-align: left; font-weight: 600; color: #1b5e20;">Tanggal Daftar</th>
                            <th style="padding: 16px; text-align: center; font-weight: 600; color: #1b5e20;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendatangMenunggu as $pendatang)
                            <tr style="border-bottom: 1px solid #e8e8e8; transition: background 0.2s ease;">
                                <td style="padding: 16px; font-weight: 600; color: #333;">
                                    {{ $pendatang->name }}
                                </td>
                                <td style="padding: 16px; color: #666;">
                                    {{ $pendatang->email }}
                                </td>
                                <td style="padding: 16px; color: #666;">
                                    <span style="background: #e3f2fd; color: #1565c0; padding: 6px 12px; border-radius: 8px; font-size: 12px; font-weight: 600; display: inline-block;">
                                        {{ $pendatang->alasan_kunjungan ?? '-' }}
                                    </span>
                                </td>
                                <td style="padding: 16px; color: #666;">
                                    {{ $pendatang->asal_daerah ?? '-' }}
                                </td>
                                <td style="padding: 16px; color: #999; font-size: 13px;">
                                    {{ $pendatang->created_at->format('d M Y H:i') }}
                                </td>
                                <td style="padding: 16px; text-align: center;">
                                    <a href="{{ route('admin.pendatang.show', $pendatang->id) }}" 
                                       style="background: linear-gradient(135deg, #43a047 0%, #66bb6a 100%); color: white; padding: 8px 16px; border-radius: 8px; text-decoration: none; font-weight: 600; display: inline-block; transition: all 0.3s ease; font-size: 13px;">
                                        Tinjau
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($pendatangMenunggu->hasPages())
                <div style="padding: 20px; border-top: 1px solid #e8e8e8; display: flex; justify-content: center;">
                    {{ $pendatangMenunggu->links() }}
                </div>
            @endif
        </div>
    @else
        <div style="background: linear-gradient(135deg, #c8e6c9 0%, #a5d6a7 100%); padding: 40px 30px; border-radius: 16px; text-align: center; border: 2px solid #81c784;">
            <div style="font-size: 48px; margin-bottom: 12px;">🎉</div>
            <h3 style="color: #1b5e20; margin: 0 0 8px 0; font-size: 20px; font-weight: 700;">Tidak Ada Permohonan Menunggu</h3>
            <p style="color: #2e7d32; margin: 0; font-size: 14px;">
                Semua pendatang telah diverifikasi. Selamat!
            </p>
        </div>
    @endif
</div>

<style>
    table tbody tr:hover {
        background: #f9f9f9;
    }

    a:hover {
        box-shadow: 0 6px 16px rgba(67, 160, 71, 0.3);
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        div[style*="grid-template-columns"] {
            grid-template-columns: 1fr !important;
        }

        table {
            font-size: 12px !important;
        }

        table th, table td {
            padding: 12px !important;
        }
    }
</style>
@endsection
