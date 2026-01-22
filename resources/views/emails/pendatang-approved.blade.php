<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Disetujui</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%);
            color: white;
            padding: 40px 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .header h2 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
        }
        .header p {
            margin: 8px 0 0 0;
            opacity: 0.95;
            font-size: 14px;
        }
        .content {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 16px;
            color: #333;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .message {
            font-size: 15px;
            color: #666;
            line-height: 1.8;
            margin-bottom: 30px;
        }
        .info-box {
            background: linear-gradient(135deg, #e8f5e9 0%, #f1f8f5 100%);
            border-left: 4px solid #1b5e20;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 4px;
        }
        .info-box h4 {
            margin: 0 0 12px 0;
            color: #1b5e20;
            font-size: 14px;
            font-weight: 600;
        }
        .info-item {
            font-size: 13px;
            color: #666;
            margin-bottom: 8px;
            line-height: 1.6;
        }
        .info-item strong {
            color: #333;
            display: inline-block;
            min-width: 100px;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #43a047 0%, #66bb6a 100%);
            color: white;
            padding: 14px 32px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(67, 160, 71, 0.3);
        }
        .cta-button:hover {
            background: linear-gradient(135deg, #2e7d32 0%, #43a047 100%);
            text-decoration: none;
        }
        .link-section {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 30px;
        }
        .link-section p {
            margin: 0 0 8px 0;
            font-size: 13px;
            color: #999;
        }
        .link-section a {
            color: #1b5e20;
            text-decoration: none;
            word-break: break-all;
            font-size: 13px;
        }
        .warning-box {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 30px;
        }
        .warning-box strong {
            color: #856404;
            display: block;
            margin-bottom: 8px;
        }
        .warning-box p {
            margin: 0;
            font-size: 13px;
            color: #856404;
            line-height: 1.6;
        }
        .footer {
            background: #f5f5f5;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #999;
            border-top: 1px solid #e0e0e0;
        }
        .footer p {
            margin: 0 0 8px 0;
        }
        .signature {
            font-style: italic;
            color: #666;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>✅ Akun Disetujui!</h2>
            <p>Sistem Informasi Desa Bangah</p>
        </div>

        <div class="content">
            <div class="greeting">
                Halo <strong>{{ $pendatang->name }}</strong>,
            </div>

            <div class="message">
                Selamat! Akun pendatang Anda telah <strong>disetujui oleh Admin Desa Bangah</strong>. 
                Anda sekarang dapat mengakses semua layanan yang tersedia di sistem informasi desa kami.
            </div>

            <div class="info-box">
                <h4>📋 Detail Persetujuan</h4>
                <div class="info-item">
                    <strong>Nama:</strong> {{ $pendatang->name }}
                </div>
                <div class="info-item">
                    <strong>Email:</strong> {{ $pendatang->email }}
                </div>
                @if ($pendatang->alasan_kunjungan)
                <div class="info-item">
                    <strong>Tujuan:</strong> {{ $pendatang->alasan_kunjungan }}
                </div>
                @endif
                @if ($pendatang->durasi_tinggal)
                <div class="info-item">
                    <strong>Durasi:</strong> {{ $pendatang->durasi_tinggal }}
                </div>
                @endif
                <div class="info-item">
                    <strong>Disetujui:</strong> {{ $pendatang->verified_at->format('d M Y, H:i') }}
                </div>
                @if ($catatan)
                <div class="info-item">
                    <strong>Catatan:</strong> {{ $catatan }}
                </div>
                @endif
            </div>

            <center>
                <a href="http://127.0.0.1:8000/login" class="cta-button">
                    🔐 Login Sekarang
                </a>
            </center>

            <div class="link-section">
                <p>Atau salin dan paste link ini di browser Anda:</p>
                <a href="http://127.0.0.1:8000/login">http://127.0.0.1:8000/login</a>
            </div>

            <div style="background: #f0f8ff; border-left: 4px solid #2196F3; padding: 15px; border-radius: 4px; margin-bottom: 30px;">
                <strong style="color: #1565c0; display: block; margin-bottom: 8px;">💡 Layanan yang Dapat Diakses:</strong>
                <ul style="margin: 0; padding-left: 20px; font-size: 13px; color: #1565c0; line-height: 1.8;">
                    <li>Surat Menyurat Digital</li>
                    <li>Informasi Inventaris Aset Desa</li>
                    <li>Informasi Kegiatan Desa</li>
                    <li>Pengaduan Masyarakat</li>
                </ul>
            </div>

            <div class="warning-box">
                <strong>⚠️ Keamanan Akun:</strong>
                <p>
                    Jangan bagikan password Anda kepada siapapun. Admin desa tidak akan pernah meminta password Anda 
                    melalui email atau pesan apapun. Jika ada yang mencurigakan, hubungi admin kami segera.
                </p>
            </div>

            <div class="signature">
                Jika Anda memiliki pertanyaan, silakan hubungi admin kami melalui halaman kontak atau datang langsung ke kantor desa.
            </div>
        </div>

        <div class="footer">
            <p>© {{ date('Y') }} Sistem Informasi Desa Bangah. Semua Hak Dilindungi.</p>
            <p>Pesan ini dikirim otomatis. Harap jangan balas email ini.</p>
        </div>
    </div>
</body>
</html>
