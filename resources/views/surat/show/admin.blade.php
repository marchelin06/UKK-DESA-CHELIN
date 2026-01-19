{{-- resources/views/surat/show/admin.blade.php --}}
@extends('layouts.app')

@section('title', 'Detail Surat')

@section('content')
<div class="container mt-4">
    <h1>Detail Surat</h1>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">{{ $surat->jenis_surat }}</h5>

            <p><strong>ID:</strong> {{ $surat->id }}</p>
            <p><strong>Nama Pemohon:</strong> {{ $surat->user->name ?? '-' }}</p>
            <p><strong>Keterangan:</strong> {{ $surat->keterangan }}</p>
            <p><strong>Status:</strong> {{ ucfirst($surat->status) }}</p>
            <p><strong>Tipe Pengajuan:</strong> {{ ucfirst($surat->tipe_pengajuan) }}</p>

            @php
                // kalau di model sudah di-cast ke array, ini aman
                $data = is_array($surat->data_tambahan) ? $surat->data_tambahan : json_decode($surat->data_tambahan ?? '[]', true);
                $lampiran = $data['lampiran'] ?? null;
            @endphp

            @if(!empty($data) || $lampiran)
                <hr>
                
                {{-- LAMPIRAN --}}
                @if($lampiran)
                    <h6 style="color: #1b5e20; font-weight: 600; margin-bottom: 12px;">Lampiran Dokumen</h6>
                    <div style="margin-bottom: 20px; padding: 12px; background: #f9f9f9; border-radius: 8px; border-left: 4px solid #1b5e20;">
                        <p style="margin: 0 0 8px 0; font-size: 13px; color: #666;">
                            <strong>File Lampiran:</strong>
                        </p>
                        
                        @php
                            $lampiranUrl = asset('storage/' . $lampiran);
                            $fileExt = strtolower(pathinfo($lampiran, PATHINFO_EXTENSION));
                            $isImage = in_array($fileExt, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                        @endphp
                        
                        @if($isImage)
                            <div style="margin-bottom: 12px; text-align: center;">
                                <img src="{{ $lampiranUrl }}" alt="Lampiran" style="max-width: 100%; max-height: 400px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                            </div>
                        @endif
                        
                        <a href="{{ $lampiranUrl }}" target="_blank" download style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 12px; background: #1b5e20; color: white; border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 13px; transition: all 0.3s ease;">
                            <i class="fas fa-download"></i> Lihat / Download Lampiran
                        </a>
                    </div>
                @endif

                {{-- DATA TAMBAHAN LAINNYA --}}
                @php
                    $excludeKeys = ['lampiran', 'lampiran_kelahiran', 'lampiran_kematian', 'lampiran_nikah', 'lampiran_cerai', 'lampiran_domisili', 'lampiran_usaha', 'lampiran_ktp', 'lampiran_skck', 'lampiran_catin'];
                    $filteredData = array_filter($data, function($key) use ($excludeKeys) {
                        return !in_array($key, $excludeKeys);
                    }, ARRAY_FILTER_USE_KEY);
                @endphp

                @if(!empty($filteredData))
                    <h6 style="color: #1b5e20; font-weight: 600; margin-bottom: 12px;">Data Tambahan</h6>
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach($filteredData as $key => $value)
                            <li style="margin-bottom: 8px;"><strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</li>
                        @endforeach
                    </ul>
                @endif
            @endif
        </div>
    </div>

    <div class="mt-3 d-flex gap-2">
        {{-- Tombol setujui --}}
        <form action="{{ route('admin.surat.setujui', $surat->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success"
                    onclick="return confirm('Setujui surat ini?')">
                Setujui
            </button>
        </form>

        {{-- Tombol tolak --}}
        <form action="{{ route('admin.surat.tolak', $surat->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Tolak surat ini?')">
                Tolak
            </button>
        </form>

        <a href="{{ route('admin.surat') }}" class="btn btn-secondary">
            <i class="fas fa-chevron-left"></i> Kembali ke daftar
        </a>
    </div>
</div>
@endsection
