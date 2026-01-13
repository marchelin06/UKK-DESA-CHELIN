<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak Surat - {{ $surat->jenis_surat }}</title>
    <style>
        @page {
            margin: 2cm;
            size: A4;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
            line-height: 1.3;
        }

        .header-table {
            width: 100%;
            border-bottom: 3px double black;
            margin-bottom: 10px;
            padding-bottom: 5px;
        }

        .logo {
            width: 75px;
            height: auto;
        }

        .header-text {
            text-align: center;
            vertical-align: middle;
        }

        .header-text h3,
        .header-text h4,
        .header-text p {
            margin: 0;
        }

        .letter-title {
            text-align: center;
            margin-bottom: 10px;
        }

        .letter-title h4 {
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 3px;
            font-size: 13pt;
        }

        .letter-title p {
            margin: 0;
            font-size: 11pt;
        }

        .content {
            margin-top: 15px;
            text-align: justify;
        }

        .data-table {
            margin-left: 30px;
            margin-top: 10px;
            margin-bottom: 10px;
            width: 100%;
        }

        .data-table td {
            padding: 1px 0;
            vertical-align: top;
        }

        .data-table td:first-child {
            width: 180px;
            white-space: nowrap;
        }

        .data-table td:nth-child(2) {
            width: 20px;
            text-align: center;
        }

        .footer-table {
            margin-top: 20px;
            width: 100%;
        }

        .signature-section {
            text-align: center;
        }

        .signature-section p {
            margin-bottom: 70px;
        }

        .signature-section .nama-kades {
            font-weight: bold;
            text-decoration: underline;
        }

        /* Helper for specific letters */
        .agenda-list {
            padding-left: 20px;
            margin-top: 5px;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>

    <table class="header-table">
        <tr>
            <td style="width: 100px;">
                <img src="{{ public_path('images/logo-sidoarjo.png') }}" alt="Logo Kabupaten Sidoarjo" class="logo">
            </td>
            <td class="header-text">
                <h3>PEMERINTAH KABUPATEN SIDOARJO</h3>
                <h4>KECAMATAN KREMBUNG</h4>
                <h3>KEPALA DESA KEDUNGRAWAN</h3>
                <p style="font-size: 11pt;">Jl. Raya Kedungrawan No. 12, Krembung, Sidoarjo, 61275</p>
            </td>
        </tr>
    </table>

    <div class="letter-title">
        <h4>{{ strtoupper($surat->jenis_surat) }}</h4>
        <p>Nomor: 470 / {{ $surat->id }} / 35.15.11.2011 / {{ \Carbon\Carbon::now()->year }}</p>
    </div>

    <div class="content">
        <p>Yang bertanda tangan di bawah ini Kepala Desa Kedungrawan, Kecamatan Krembung, Kabupaten Sidoarjo,
            menerangkan dengan sebenarnya bahwa:</p>

        {{-- ====================================================================== --}}
        {{-- KONTEN SPESIFIK UNTUK SETIAP JENIS SURAT --}}
        {{-- ====================================================================== --}}

        @switch($surat->jenis_surat)
        {{-- SURAT DOMISILI --}}
        @case('Surat Domisili')
        <table class="data-table">
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>{{ $surat->user->name }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $detail['nik'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Alamat Asal (KTP)</td>
                <td>:</td>
                <td>{{ $detail['alamat_ktp'] ?? '-' }}</td>
            </tr>
        </table>
        <p>
            Orang tersebut di atas adalah benar-benar penduduk Desa Kedungrawan yang saat ini berdomisili di:
        </p>
        <table class="data-table">
            <tr>
                <td>Alamat Domisili</td>
                <td>:</td>
                <td>{{ $detail['alamat_domisili'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>RT / RW</td>
                <td>:</td>
                <td>{{ $detail['rt_domisili'] ?? '-' }} / {{ $detail['rw_domisili'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Dusun</td>
                <td>:</td>
                <td>{{ $detail['dusun_domisili'] ?? '-' }}</td>
            </tr>
        </table>
        <p>
            Surat keterangan ini dibuat untuk keperluan
            <strong>{{ $surat->keterangan ?? ($detail['alasan_domisili'] ?? '-') }}</strong>.
        </p>
        @break

        {{-- SURAT KETERANGAN TIDAK MAMPU (SKTM) --}}
        @case('Surat Keterangan Tidak Mampu')
        <table class="data-table">
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>{{ $detail['nama_sktm'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $detail['nik_sktm'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{ $detail['status_pekerjaan'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $detail['alamat_sktm'] ?? '-' }}</td>
            </tr>
        </table>
        <p>
            Berdasarkan pengamatan dan data yang ada pada kami, orang tersebut di atas adalah benar penduduk Desa
            Kedungrawan yang tergolong dalam keluarga kurang mampu/miskin.
        </p>
        <p>
            Surat keterangan ini akan dipergunakan untuk
            <strong>{{ $detail['tujuan_sktm'] ?? ($surat->keterangan ?? 'keperluan yang semestinya') }}</strong>
            pada
            <strong>{{ $detail['instansi_sktm'] ?? 'instansi terkait' }}</strong>.
        </p>
        @break

        {{-- SURAT KETERANGAN USAHA --}}
        @case('Surat Keterangan Usaha')
        <table class="data-table">
            <tr>
                <td>Nama Pemilik</td>
                <td>:</td>
                <td>{{ $surat->user->name }}</td>
            </tr>
            <tr>
                <td>NIK Pemilik</td>
                <td>:</td>
                <td>{{ $detail['nik_usaha'] ?? '-' }}</td>
            </tr>
           
        </table>
        <p>
            Orang tersebut di atas adalah benar penduduk Desa Kedungrawan yang memiliki usaha sebagai berikut:
        </p>
        <table class="data-table">
            <tr>
                <td>Nama Usaha</td>
                <td>:</td>
                <td>{{ $detail['nama_usaha'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Jenis Usaha</td>
                <td>:</td>
                <td>{{ $detail['jenis_usaha'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Alamat Usaha</td>
                <td>:</td>
                <td>{{ $detail['alamat_usaha'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Lama Usaha</td>
                <td>:</td>
                <td>{{ $detail['lama_usaha'] ?? '-' }} bulan</td>
            </tr>
        </table>
        <p>
            Surat keterangan ini dibuat sebagai bukti bahwa yang bersangkutan benar memiliki usaha tersebut di
            wilayah Desa Kedungrawan dan akan dipergunakan untuk
            <strong>{{ $surat->keterangan ?? 'keperluan yang semestinya' }}</strong>.
        </p>
        @break

        {{-- SURAT PENGANTAR KTP --}}
        @case('Surat Pengantar KTP')
        <table class="data-table">
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>{{ $detail['nama_ktp'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $detail['nik_ktp'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $detail['tempat_lahir_ktp'] ?? '-' }},
                    {{ $detail['tanggal_lahir_ktp'] ? \Carbon\Carbon::parse($detail['tanggal_lahir_ktp'])->translatedFormat('d F Y') : '-' }}
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $detail['jenis_kelamin_ktp'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>{{ $detail['agama_ktp'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{ $detail['pekerjaan_ktp'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Status Perkawinan</td>
                <td>:</td>
                <td>{{ $detail['status_perkawinan_ktp'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $detail['alamat_ktp_ktp'] ?? '-' }}</td>
            </tr>
        </table>
        <p>
            Orang tersebut di atas adalah benar penduduk Desa Kedungrawan yang mengajukan permohonan pengantar untuk
            pembuatan/pengurusan KTP dengan keperluan: <strong>{{ $detail['jenis_permohonan'] ?? '-' }}</strong>.
        </p>
        <p>
            Surat pengantar ini kami berikan untuk proses lebih lanjut di Kantor Kecamatan dan Dinas Kependudukan
            dan Pencatatan Sipil Kabupaten Sidoarjo.
        </p>
        @break

        {{-- SURAT KELAHIRAN --}}
        @case('Surat Kelahiran')
        <p>Menerangkan bahwa pada:</p>
        <table class="data-table">
            <tr>
                <td>Hari / Tanggal</td>
                <td>:</td>
                <td>{{ $detail['tanggal_lahir_bayi'] ? \Carbon\Carbon::parse($detail['tanggal_lahir_bayi'])->translatedFormat('l, d F Y') : '-' }}
                </td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td>{{ $detail['tempat_lahir_bayi'] ?? '-' }}</td>
            </tr>
        </table>
        <p>Telah lahir seorang anak {{ $detail['jenis_kelamin_bayi'] ?? '-' }} dengan data sebagai berikut:</p>
        <table class="data-table">
            <tr>
                <td>Nama Bayi</td>
                <td>:</td>
                <td><strong>{{ $detail['nama_bayi'] ?? '-' }}</strong></td>
            </tr>
            <tr>
                <td>Berat/Panjang</td>
                <td>:</td>
                <td>{{ $detail['berat_bayi'] ?? '-' }} gram / {{ $detail['panjang_bayi'] ?? '-' }} cm</td>
            </tr>
        </table>
        <p>Anak tersebut adalah anak dari pasangan suami-istri:</p>
        <table class="data-table">
            <tr>
                <td>Nama Ayah</td>
                <td>:</td>
                <td>{{ $detail['nama_ayah'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>NIK Ayah</td>
                <td>:</td>
                <td>{{ $detail['nik_ayah'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Nama Ibu</td>
                <td>:</td>
                <td>{{ $detail['nama_ibu'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>NIK Ibu</td>
                <td>:</td>
                <td>{{ $detail['nik_ibu'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $detail['alamat_orangtua'] ?? '-' }}</td>
            </tr>
        </table>
        <p>
            Surat keterangan kelahiran ini dibuat sebagai pengantar untuk pengurusan Akta Kelahiran di Dinas
            Kependudukan dan Pencatatan Sipil.
        </p>
        @break

        {{-- SURAT KEMATIAN --}}
        @case('Surat Kematian')
        <p>Menerangkan bahwa orang di bawah ini:</p>
        <table class="data-table">
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>{{ $detail['nama_almarhum'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $detail['nik_almarhum'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Usia</td>
                <td>:</td>
                <td>{{ $detail['umur_almarhum'] ?? '-' }} Tahun</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $detail['alamat_almarhum'] ?? '-' }}</td>
            </tr>
        </table>
        <p>Telah meninggal dunia pada:</p>
        <table class="data-table">
            <tr>
                <td>Hari / Tanggal</td>
                <td>:</td>
                <td>{{ $detail['tanggal_meninggal'] ? \Carbon\Carbon::parse($detail['tanggal_meninggal'])->translatedFormat('l, d F Y') : '-' }}
                </td>
            </tr>
            <tr>
                <td>Tempat Meninggal</td>
                <td>:</td>
                <td>{{ $detail['tempat_meninggal'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Penyebab</td>
                <td>:</td>
                <td>{{ $detail['sebab_meninggal'] ?? '-' }}</td>
            </tr>
        </table>
        <p>
            Surat keterangan kematian ini dibuat berdasarkan laporan dari Sdr/i {{ $surat->user->name }} (Hubungan:
            {{ $detail['hubungan_pemohon'] ?? '-' }}) dan akan dipergunakan sebagaimana mestinya.
        </p>
        @break

        {{-- SURAT UNDANGAN RAPAT --}}
        @case('Surat Undangan Rapat')
        <p>Dengan hormat,</p>
        <p>
            Sehubungan dengan akan dilaksanakannya <strong>{{ $detail['judul_rapat'] ?? 'Rapat Desa' }}</strong>,
            kami mengundang Bapak/Ibu/Saudara/i untuk dapat hadir pada:
        </p>
        <table class="data-table">
            <tr>
                <td>Hari, Tanggal</td>
                <td>:</td>
                <td>{{ $detail['tanggal_rapat'] ? \Carbon\Carbon::parse($detail['tanggal_rapat'])->translatedFormat('l, d F Y') : '-' }}
                </td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td>:</td>
                <td>{{ $detail['waktu_rapat'] ?? '-' }} WIB - Selesai</td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td>:</td>
                <td>{{ $detail['tempat_rapat'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Agenda</td>
                <td>:</td>
                <td>
                    <div class="agenda-list">
                        {!! nl2br(e($detail['agenda_rapat'] ?? '-')) !!}
                    </div>
                </td>
            </tr>
        </table>
        <p>
            Mengingat pentingnya acara tersebut, kami sangat mengharapkan kehadiran Bapak/Ibu/Saudara/i tepat pada
            waktunya.
        </p>
        <p>
            Demikian surat undangan ini kami sampaikan. Atas perhatian dan kehadirannya, kami ucapkan terima kasih.
        </p>
        @break

        {{-- SURAT PENGANTAR KUA --}}
        @case('Surat Pengantar KUA')
        <p>Menerangkan bahwa calon pengantin di bawah ini:</p>
        <table class="data-table">
            <tr>
                <td>Nama Calon Suami</td>
                <td>:</td>
                <td>{{ $detail['nama_calon_suami'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>NIK Calon Suami</td>
                <td>:</td>
                <td>{{ $detail['nik_calon_suami'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Nama Calon Istri</td>
                <td>:</td>
                <td>{{ $detail['nama_calon_istri'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>NIK Calon Istri</td>
                <td>:</td>
                <td>{{ $detail['nik_calon_istri'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Rencana Tanggal Nikah</td>
                <td>:</td>
                <td>{{ $detail['tanggal_nikah'] ? \Carbon\Carbon::parse($detail['tanggal_nikah'])->translatedFormat('l, d F Y') : '-' }}</td>
            </tr>
            <tr>
                <td>Tempat Akad Nikah</td>
                <td>:</td>
                <td>{{ $detail['tempat_nikah'] ?? '-' }}</td>
            </tr>
        </table>
        <p>
            Adalah benar penduduk Desa Kedungrawan yang akan melaksanakan pernikahan dan memerlukan pengantar untuk
            proses administrasi di Kantor Urusan Agama (KUA) Kecamatan Krembung.
        </p>
        <p>
            Surat pengantar ini dibuat berdasarkan pengajuan yang dilakukan oleh yang bersangkutan dan akan
            dipergunakan sebagaimana mestinya di KUA Kecamatan Krembung.
        </p>
        @break

        {{-- SURAT KETERANGAN BELUM MENIKAH --}}
        @case('Surat Keterangan Belum Menikah')
        <table class="data-table">
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>{{ $detail['nama_belum_menikah'] ?? $surat->user->name }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $detail['nik_belum_menikah'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $detail['alamat_belum_menikah'] ?? '-' }}</td>
            </tr>
        </table>
        <p>
            Berdasarkan catatan dan data kepemilikan kami, orang tersebut di atas adalah benar penduduk Desa
            Kedungrawan yang sampai saat ini belum pernah melakukan pernikahan (status belum menikah).
        </p>
        <p>
            Surat keterangan ini dibuat untuk keperluan
            <strong>{{ $surat->keterangan ?? ($detail['tujuan_belum_menikah'] ?? 'keperluan yang semestinya') }}</strong>
            @if($detail['instansi_belum_menikah'] ?? false)
            di <strong>{{ $detail['instansi_belum_menikah'] }}</strong>
            @endif
            dan akan dipergunakan sebagaimana mestinya.
        </p>
        @break

        {{-- SURAT KETERANGAN TANAH --}}
        @case('Surat Keterangan Tanah')
        <p>Menerangkan bahwa kami telah melakukan verifikasi terhadap tanah milik:</p>
        <table class="data-table">
            <tr>
                <td>Nama Pemilik</td>
                <td>:</td>
                <td>{{ $surat->user->name }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $detail['nik'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Alamat Pemilik</td>
                <td>:</td>
                <td>{{ $detail['alamat'] ?? '-' }}</td>
            </tr>
        </table>
        <p>Dengan rincian tanah sebagai berikut:</p>
        <table class="data-table">
            <tr>
                <td>Lokasi Tanah</td>
                <td>:</td>
                <td>{{ $detail['lokasi_tanah'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Luas Tanah</td>
                <td>:</td>
                <td>{{ $detail['luas_tanah'] ?? '-' }} m²</td>
            </tr>
            <tr>
                <td>Peruntukan Tanah</td>
                <td>:</td>
                <td>{{ $detail['peruntukan'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Status Kepemilikan</td>
                <td>:</td>
                <td>{{ $detail['status_tanah'] ?? '-' }}</td>
            </tr>
        </table>
        <p>Batas-batas tanah tersebut adalah sebagai berikut:</p>
        <table class="data-table">
            <tr>
                <td>Batas Utara</td>
                <td>:</td>
                <td>{{ $detail['batas_utara'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Batas Selatan</td>
                <td>:</td>
                <td>{{ $detail['batas_selatan'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Batas Timur</td>
                <td>:</td>
                <td>{{ $detail['batas_timur'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Batas Barat</td>
                <td>:</td>
                <td>{{ $detail['batas_barat'] ?? '-' }}</td>
            </tr>
        </table>
        <p>
            Berdasarkan pengamatan lapangan dan data yang ada pada kami, surat keterangan ini menerangkan bahwa tanah
            tersebut berada di wilayah Desa Kedungrawan dengan kondisi dan status kepemilikan sebagaimana tersebut
            di atas. Surat ini dibuat untuk keperluan {{ $surat->keterangan ?? 'keperluan yang semestinya' }}.
        </p>
        @break

        @default
        <p>Jenis surat tidak valid atau template belum tersedia.</p>
        <p>Keterangan: {{ $surat->keterangan ?? '-' }}</p>
        @endswitch

        {{-- ====================================================================== --}}
        {{-- BAGIAN PENUTUP DAN TANDA TANGAN --}}
        {{-- ====================================================================== --}}

        @if ($surat->jenis_surat !== 'Surat Undangan Rapat')
        <p style="margin-top: 20px;">
            Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana
            mestinya.
        </p>
        @endif
    </div>

    <table class="footer-table">
        <tr>
            <td style="width: 50%;"></td>
            <td class="signature-section">
                <p>
                    Kedungrawan, {{ $surat->updated_at->translatedFormat('d F Y') }}<br>
                    Kepala Desa Kedungrawan
                </p>
                <p class="nama-kades">( H. M. NUR ROFIQ )</p>
            </td>
        </tr>
    </table>

</body>

</html>