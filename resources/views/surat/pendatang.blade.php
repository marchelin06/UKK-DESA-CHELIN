@extends('layouts.app')

@section('title', 'Daftar Surat - Sistem Informasi Desa')

@section('content')
<div style="max-width: 1200px; margin: 40px auto; padding: 0 20px;">
    {{-- Header --}}
    <div style="margin-bottom: 40px;">
        <h1 style="font-size: 32px; font-weight: 700; color: #1b5e20; margin: 0 0 10px 0;">
            📄 Daftar Surat Publik
        </h1>
        <p style="color: #666; margin: 0; font-size: 15px;">
            Informasi tentang layanan surat masyarakat yang telah diproses
        </p>
    </div>

    {{-- Informasi untuk Pendatang --}}
    <div style="background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%); padding: 20px; border-radius: 12px; border-left: 5px solid #1976d2; margin-bottom: 24px;">
        <div style="color: #1565c0; font-weight: 600;">ℹ️ Informasi</div>
        <p style="margin: 8px 0 0 0; color: #1565c0; font-size: 14px;">
            Sebagai pendatang, Anda dapat melihat daftar surat yang telah diproses. Untuk membuat permohonan surat, silakan hubungi admin desa.
        </p>
    </div>

    {{-- Tabel Surat --}}
    @if($surat->count() > 0)
        <div style="background: white; border-radius: 16px; box-shadow: 0 4px 16px rgba(0,0,0,0.08); overflow: hidden;">
            <div style="background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); padding: 20px; color: white;">
                <h2 style="margin: 0; font-size: 18px; font-weight: 700;">
                    📋 Daftar Surat
                </h2>
            </div>

            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
                    <thead>
                        <tr style="background: #f5f5f5; border-bottom: 2px solid #e0e0e0;">
                            <th style="padding: 16px; text-align: left; font-weight: 600; color: #1b5e20;">Nomor Surat</th>
                            <th style="padding: 16px; text-align: left; font-weight: 600; color: #1b5e20;">Jenis Surat</th>
                            <th style="padding: 16px; text-align: left; font-weight: 600; color: #1b5e20;">Pemohon</th>
                            <th style="padding: 16px; text-align: left; font-weight: 600; color: #1b5e20;">Tanggal Selesai</th>
                            <th style="padding: 16px; text-align: center; font-weight: 600; color: #1b5e20;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surat as $s)
                            <tr style="border-bottom: 1px solid #e8e8e8; transition: background 0.2s ease;">
                                <td style="padding: 16px; font-weight: 600; color: #333;">
                                    {{ $s->nomor_surat ?? 'N/A' }}
                                </td>
                                <td style="padding: 16px; color: #666;">
                                    {{ $s->jenis_surat }}
                                </td>
                                <td style="padding: 16px; color: #666;">
                                    {{ $s->user->name ?? 'N/A' }}
                                </td>
                                <td style="padding: 16px; color: #999; font-size: 13px;">
                                    {{ $s->updated_at->format('d M Y') }}
                                </td>
                                <td style="padding: 16px; text-align: center;">
                                    <span style="background: #c8e6c9; color: #1b5e20; padding: 6px 12px; border-radius: 12px; font-size: 12px; font-weight: 600; display: inline-block;">
                                        ✓ Selesai
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($surat->hasPages())
                <div style="padding: 20px; border-top: 1px solid #e8e8e8; display: flex; justify-content: center;">
                    {{ $surat->links() }}
                </div>
            @endif
        </div>
    @else
        <div style="background: linear-gradient(135deg, #f1f8f5 0%, #e8f5e9 100%); padding: 40px 30px; border-radius: 16px; text-align: center; border: 2px solid #c8e6c9;">
            <div style="font-size: 48px; margin-bottom: 12px;">📄</div>
            <h3 style="color: #1b5e20; margin: 0 0 8px 0; font-size: 20px; font-weight: 700;">Tidak Ada Data</h3>
            <p style="color: #2e7d32; margin: 0; font-size: 14px;">
                Saat ini belum ada surat publik yang tersedia.
            </p>
        </div>
    @endif
</div>

<style>
    table tbody tr:hover {
        background: #f9f9f9;
    }

    @media (max-width: 768px) {
        table {
            font-size: 12px !important;
        }

        table th, table td {
            padding: 12px !important;
        }
    }
</style>
@endsection
