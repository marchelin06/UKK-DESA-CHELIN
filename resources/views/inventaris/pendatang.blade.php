@extends('layouts.app')

@section('title', 'Inventaris Desa - Sistem Informasi Desa')

@section('content')
<div style="max-width: 1200px; margin: 40px auto; padding: 0 20px;">
    {{-- Header --}}
    <div style="margin-bottom: 40px;">
        <h1 style="font-size: 32px; font-weight: 700; color: #1b5e20; margin: 0 0 10px 0;">
            🏢 Inventaris Desa
        </h1>
        <p style="color: #666; margin: 0; font-size: 15px;">
            Daftar aset dan fasilitas umum yang dimiliki desa
        </p>
    </div>

    {{-- Informasi untuk Pendatang --}}
    <div style="background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%); padding: 20px; border-radius: 12px; border-left: 5px solid #1976d2; margin-bottom: 24px;">
        <div style="color: #1565c0; font-weight: 600;">ℹ️ Informasi</div>
        <p style="margin: 8px 0 0 0; color: #1565c0; font-size: 14px;">
            Berikut adalah daftar lengkap inventaris (aset dan fasilitas) yang dimiliki desa untuk melayani masyarakat.
        </p>
    </div>

    {{-- Tabel Inventaris --}}
    @if($data->count() > 0)
        <div style="background: white; border-radius: 16px; box-shadow: 0 4px 16px rgba(0,0,0,0.08); overflow: hidden;">
            <div style="background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); padding: 20px; color: white;">
                <h2 style="margin: 0; font-size: 18px; font-weight: 700;">
                    📋 Daftar Inventaris
                </h2>
            </div>

            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
                    <thead>
                        <tr style="background: #f5f5f5; border-bottom: 2px solid #e0e0e0;">
                            <th style="padding: 16px; text-align: left; font-weight: 600; color: #1b5e20;">Nama Barang</th>
                            <th style="padding: 16px; text-align: left; font-weight: 600; color: #1b5e20;">Kategori</th>
                            <th style="padding: 16px; text-align: center; font-weight: 600; color: #1b5e20;">Jumlah</th>
                            <th style="padding: 16px; text-align: left; font-weight: 600; color: #1b5e20;">Kondisi</th>
                            <th style="padding: 16px; text-align: left; font-weight: 600; color: #1b5e20;">Lokasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr style="border-bottom: 1px solid #e8e8e8; transition: background 0.2s ease;">
                                <td style="padding: 16px; font-weight: 600; color: #333;">
                                    {{ $item->nama_barang }}
                                </td>
                                <td style="padding: 16px; color: #666;">
                                    <span style="background: #e3f2fd; color: #1565c0; padding: 4px 12px; border-radius: 8px; font-size: 12px; font-weight: 600; display: inline-block;">
                                        {{ $item->kategori }}
                                    </span>
                                </td>
                                <td style="padding: 16px; text-align: center; color: #333; font-weight: 600;">
                                    {{ $item->jumlah }}
                                </td>
                                <td style="padding: 16px; color: #666;">
                                    <span style="
                                        @if($item->kondisi === 'Baik')
                                            background: #c8e6c9; color: #1b5e20;
                                        @elseif($item->kondisi === 'Rusak Ringan')
                                            background: #fff9c4; color: #856404;
                                        @else
                                            background: #ffcccc; color: #b71c1c;
                                        @endif
                                        padding: 4px 12px; border-radius: 8px; font-size: 12px; font-weight: 600; display: inline-block;
                                    ">
                                        {{ $item->kondisi }}
                                    </span>
                                </td>
                                <td style="padding: 16px; color: #666;">
                                    {{ $item->lokasi }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($data->hasPages())
                <div style="padding: 20px; border-top: 1px solid #e8e8e8; display: flex; justify-content: center;">
                    {{ $data->links() }}
                </div>
            @endif
        </div>
    @else
        <div style="background: linear-gradient(135deg, #f1f8f5 0%, #e8f5e9 100%); padding: 40px 30px; border-radius: 16px; text-align: center; border: 2px solid #c8e6c9;">
            <div style="font-size: 48px; margin-bottom: 12px;">🏢</div>
            <h3 style="color: #1b5e20; margin: 0 0 8px 0; font-size: 20px; font-weight: 700;">Tidak Ada Data</h3>
            <p style="color: #2e7d32; margin: 0; font-size: 14px;">
                Inventaris belum tersedia.
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
