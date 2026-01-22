@extends('layouts.app')

@section('content')
<div style="max-width: 900px; margin: 40px auto; padding: 0 20px;">
    {{-- Back Button --}}
    <a href="{{ route('admin.pendatang.index') }}" 
       style="display: inline-block; color: #2e7d32; text-decoration: none; font-weight: 600; margin-bottom: 30px; transition: all 0.2s ease;">
        ← Kembali ke Daftar
    </a>

    {{-- Header --}}
    <div style="margin-bottom: 40px;">
        <h1 style="font-size: 32px; font-weight: 700; color: #1b5e20; margin: 0 0 10px 0;">
            📝 Detail Permohonan Pendatang
        </h1>
        <p style="color: #666; margin: 0; font-size: 15px;">
            Tinjau data dan ambil keputusan persetujuan
        </p>
    </div>

    {{-- Error Message --}}
    @if ($errors->any())
        <div style="background: linear-gradient(135deg, #ffcccc 0%, #ffaaaa 100%); color: #b71c1c; padding: 16px 20px; border-radius: 12px; border-left: 4px solid #d32f2f; margin-bottom: 24px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li style="margin-bottom: 6px;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Success Message --}}
    @if (session('success'))
        <div style="background: linear-gradient(135deg, #c8e6c9 0%, #a5d6a7 100%); color: #1b5e20; padding: 16px 20px; border-radius: 12px; border-left: 4px solid #2e7d32; margin-bottom: 24px; font-weight: 500;">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
        {{-- Kolom Kiri: Data Pribadi --}}
        <div>
            <div style="background: white; border-radius: 16px; box-shadow: 0 4px 16px rgba(0,0,0,0.08); overflow: hidden; margin-bottom: 24px;">
                <div style="background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); padding: 20px; color: white;">
                    <h2 style="margin: 0; font-size: 16px; font-weight: 700;">
                        👤 Data Pribadi
                    </h2>
                </div>
                <div style="padding: 24px;">
                    <div style="margin-bottom: 20px;">
                        <label style="font-size: 12px; color: #999; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                            Nama Lengkap
                        </label>
                        <p style="margin: 8px 0 0 0; font-size: 16px; font-weight: 600; color: #333;">
                            {{ $pendatang->name }}
                        </p>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="font-size: 12px; color: #999; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                            Email
                        </label>
                        <p style="margin: 8px 0 0 0; font-size: 14px; color: #555; word-break: break-all;">
                            {{ $pendatang->email }}
                        </p>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="font-size: 12px; color: #999; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                            Username
                        </label>
                        <p style="margin: 8px 0 0 0; font-size: 14px; color: #555;">
                            @if($pendatang->username)
                                {{ $pendatang->username }}
                            @else
                                <span style="color: #ccc; font-style: italic;">Tidak ada</span>
                            @endif
                        </p>
                    </div>

                    <div style="margin-bottom: 0;">
                        <label style="font-size: 12px; color: #999; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                            Tanggal Pendaftaran
                        </label>
                        <p style="margin: 8px 0 0 0; font-size: 14px; color: #555;">
                            {{ $pendatang->created_at->format('d M Y H:i') }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Info Pendatang --}}
            <div style="background: white; border-radius: 16px; box-shadow: 0 4px 16px rgba(0,0,0,0.08); overflow: hidden;">
                <div style="background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); padding: 20px; color: white;">
                    <h2 style="margin: 0; font-size: 16px; font-weight: 700;">
                        🌍 Informasi Kunjungan
                    </h2>
                </div>
                <div style="padding: 24px;">
                    <div style="margin-bottom: 20px;">
                        <label style="font-size: 12px; color: #999; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                            Alasan/Tujuan
                        </label>
                        <p style="margin: 8px 0 0 0;">
                            @if($pendatang->alasan_kunjungan)
                                <span style="background: #e3f2fd; color: #1565c0; padding: 8px 14px; border-radius: 8px; font-size: 13px; font-weight: 600; display: inline-block;">
                                    {{ $pendatang->alasan_kunjungan }}
                                </span>
                            @else
                                <span style="color: #ccc; font-style: italic;">Tidak ada data</span>
                            @endif
                        </p>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="font-size: 12px; color: #999; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                            Durasi Tinggal
                        </label>
                        <p style="margin: 8px 0 0 0; font-size: 14px; color: #555;">
                            @if($pendatang->durasi_tinggal)
                                {{ $pendatang->durasi_tinggal }}
                            @else
                                <span style="color: #ccc; font-style: italic;">Tidak ada data</span>
                            @endif
                        </p>
                    </div>

                    <div style="margin-bottom: 0;">
                        <label style="font-size: 12px; color: #999; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                            Asal Daerah/Negara
                        </label>
                        <p style="margin: 8px 0 0 0; font-size: 14px; color: #555;">
                            @if($pendatang->asal_daerah)
                                {{ $pendatang->asal_daerah }}
                            @else
                                <span style="color: #ccc; font-style: italic;">Tidak ada data</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kolom Kanan: Form Approval/Rejection --}}
        <div>
            {{-- Approval Form --}}
            <form action="{{ route('admin.pendatang.approve', $pendatang->id) }}" method="POST" 
                  style="background: linear-gradient(135deg, #c8e6c9 0%, #a5d6a7 100%); border-radius: 16px; box-shadow: 0 4px 16px rgba(0,0,0,0.08); overflow: hidden; margin-bottom: 24px;">
                @csrf
                <div style="background: #2e7d32; padding: 20px; color: white;">
                    <h2 style="margin: 0; font-size: 16px; font-weight: 700;">
                        ✅ Setujui Pendatang
                    </h2>
                </div>
                <div style="padding: 24px;">
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 12px; color: #1b5e20; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">
                            Catatan (Opsional)
                        </label>
                        <textarea name="catatan" 
                                  style="width: 100%; padding: 12px 14px; border: 2px solid #81c784; border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 14px; resize: vertical; min-height: 100px; background: white; box-sizing: border-box; transition: all 0.3s ease;"
                                  placeholder="Contoh: Pendatang ini sudah kami verifikasi..."
                                  rows="4"></textarea>
                        <small style="color: #1b5e20; font-size: 12px; margin-top: 6px; display: block;">
                            Catatan untuk file internal admin
                        </small>
                    </div>

                    <button type="submit" 
                            style="width: 100%; background: #2e7d32; color: white; padding: 12px 20px; border: none; border-radius: 8px; font-size: 15px; font-weight: 700; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(46, 125, 50, 0.25);">
                        ✅ Setujui Pendatang
                    </button>
                </div>
            </form>

            {{-- Rejection Form --}}
            <form action="{{ route('admin.pendatang.reject', $pendatang->id) }}" method="POST" 
                  style="background: linear-gradient(135deg, #ffcccc 0%, #ffaaaa 100%); border-radius: 16px; box-shadow: 0 4px 16px rgba(0,0,0,0.08); overflow: hidden;">
                @csrf
                <div style="background: #d32f2f; padding: 20px; color: white;">
                    <h2 style="margin: 0; font-size: 16px; font-weight: 700;">
                        ❌ Tolak Pendatang
                    </h2>
                </div>
                <div style="padding: 24px;">
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 12px; color: #b71c1c; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">
                            Alasan Penolakan *
                        </label>
                        <textarea name="alasan_penolakan" 
                                  style="width: 100%; padding: 12px 14px; border: 2px solid #ef5350; border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 14px; resize: vertical; min-height: 100px; background: white; box-sizing: border-box; transition: all 0.3s ease;"
                                  placeholder="Tuliskan alasan penolakan permohonan ini..."
                                  rows="4"
                                  required></textarea>
                        <small style="color: #b71c1c; font-size: 12px; margin-top: 6px; display: block;">
                            Wajib diisi. Pendatang akan menerima email dengan alasan ini.
                        </small>
                    </div>

                    <button type="submit" 
                            style="width: 100%; background: #d32f2f; color: white; padding: 12px 20px; border: none; border-radius: 8px; font-size: 15px; font-weight: 700; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(211, 47, 47, 0.25);"
                            onclick="return confirm('Yakin ingin menolak pendatang ini? Mereka akan menerima email notifikasi.');">
                        ❌ Tolak Pendatang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    textarea:focus {
        outline: none;
        box-shadow: 0 0 0 4px rgba(67, 160, 71, 0.15);
    }

    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(67, 160, 71, 0.35) !important;
    }

    @media (max-width: 768px) {
        div[style*="grid-template-columns"] {
            grid-template-columns: 1fr !important;
        }
    }
</style>
@endsection
