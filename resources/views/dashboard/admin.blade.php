{{-- resources/views/dashboard/admin.blade.php --}}
@extends('layouts.app')

@section('content')
<style>
    .page-dashboard {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px 20px;
        font-family: 'Poppins', sans-serif;
    }

    .dash-header {
        margin-bottom: 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }

    .btn-back {
        background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%);
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }

    .btn-back:hover {
        background: linear-gradient(135deg, #145c42 0%, #1b5e20 100%);
        color: white;
        transform: translateX(-3px);
    }

    .dash-greeting {
        font-size: 36px;
        font-weight: 700;
        color: #1b5e20;
        margin-bottom: 8px;
    }

    .dash-subtext {
        font-size: 15px;
        color: #666;
    }

    .dash-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }

    .quick-action-card {
        background: linear-gradient(135deg, #fff 0%, #f9fbf7 100%);
        border-radius: 16px;
        border: 2px solid #e8f5e9;
        padding: 28px;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(27, 94, 32, 0.08);
        cursor: pointer;
        text-decoration: none;
        color: inherit;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
    }

    .quick-action-card:hover {
        border-color: #43a047;
        box-shadow: 0 8px 24px rgba(67, 160, 71, 0.15);
        transform: translateY(-6px);
    }

    .quick-action-icon {
        font-size: 40px;
        height: 40px;
    }

    .quick-action-title {
        font-size: 15px;
        font-weight: 700;
        color: #1b5e20;
    }

    .quick-action-desc {
        font-size: 12px;
        color: #888;
        line-height: 1.4;
    }

    .section-title {
        font-size: 22px;
        font-weight: 700;
        color: #1b5e20;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-title::before {
        content: '';
        width: 4px;
        height: 28px;
        background: linear-gradient(180deg, #43a047 0%, #66bb6a 100%);
        border-radius: 2px;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }

    .info-card {
        background: #ffffff;
        border-radius: 14px;
        border: 1px solid rgba(67, 160, 71, 0.1);
        padding: 20px;
        box-shadow: 0 4px 12px rgba(27, 94, 32, 0.08);
        transition: all 0.3s ease;
    }

    .info-card:hover {
        box-shadow: 0 8px 20px rgba(27, 94, 32, 0.12);
    }

    .info-label {
        font-size: 12px;
        color: #999;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
    }

    .info-value {
        font-size: 16px;
        font-weight: 700;
        color: #1b5e20;
        word-break: break-word;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 16px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: linear-gradient(135deg, #43a047 0%, #66bb6a 100%);
        border-radius: 12px;
        padding: 16px;
        color: white;
        text-align: center;
        box-shadow: 0 4px 12px rgba(67, 160, 71, 0.3);
    }

    .stat-number {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .stat-label {
        font-size: 12px;
        opacity: 0.9;
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 16px;
        margin-bottom: 40px;
    }

    .service-card {
        background: #ffffff;
        border-radius: 14px;
        border: 2px solid #e8f5e9;
        padding: 18px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(27, 94, 32, 0.08);
        display: flex;
        flex-direction: column;
    }

    .service-card:hover {
        border-color: #43a047;
        box-shadow: 0 8px 20px rgba(67, 160, 71, 0.15);
        transform: translateY(-4px);
    }

    .service-icon {
        font-size: 32px;
        margin-bottom: 8px;
    }

    .service-title {
        font-size: 14px;
        font-weight: 700;
        color: #1b5e20;
        margin-bottom: 6px;
    }

    .service-desc {
        font-size: 12px;
        color: #666;
        margin-bottom: 12px;
        line-height: 1.5;
        flex-grow: 1;
    }

    .service-link {
        font-size: 13px;
        font-weight: 700;
        color: #1a7f5a;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
    }

    .service-link:hover {
        color: #145c42;
        transform: translateX(4px);
    }

    .badge-info {
        display: inline-block;
        background: linear-gradient(135deg, #c8e6c9 0%, #a5d6a7 100%);
        color: #1b5e20;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .info-box {
        background: linear-gradient(135deg, #fff9c4 0%, #fff59d 100%);
        border-left: 4px solid #fbc02d;
        border-radius: 12px;
        padding: 16px;
        margin-bottom: 20px;
        font-size: 14px;
        color: #856404;
    }

    /* NOTIFICATION STYLES */
    .notification-box {
        background: linear-gradient(135deg, #ffebee 0%, #ffcdd2 100%);
        border-left: 5px solid #e53935;
        border-radius: 12px;
        padding: 18px;
        margin-bottom: 20px;
        font-size: 14px;
        color: #c62828;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }

    .notification-box.warning {
        background: linear-gradient(135deg, #fff3e0 0%, #ffe0b2 100%);
        border-left-color: #f57c00;
        color: #e65100;
    }

    .notification-content {
        flex: 1;
        min-width: 200px;
    }

    .notification-title {
        font-weight: 700;
        font-size: 15px;
        margin-bottom: 4px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .notification-desc {
        font-size: 13px;
        opacity: 0.85;
        margin-top: 4px;
    }

    .notification-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #e53935;
        color: white;
        border-radius: 50%;
        min-width: 32px;
        height: 32px;
        font-weight: 700;
        font-size: 14px;
    }

    .notification-badge.warning {
        background: #f57c00;
    }

    .notification-action {
        display: inline-flex;
        gap: 10px;
    }

    .notification-button {
        background: #e53935;
        color: white;
        padding: 8px 14px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .notification-button:hover {
        background: #d32f2f;
        transform: translateX(2px);
    }

    .notification-button.warning {
        background: #f57c00;
    }

    .notification-button.warning:hover {
        background: #e65100;
    }

    @media (max-width: 768px) {
        .page-dashboard {
            padding: 20px 15px;
        }

        .dash-greeting {
            font-size: 26px;
        }

        .dash-grid {
            gap: 16px;
            grid-template-columns: repeat(2, 1fr);
        }

        .section-title {
            font-size: 18px;
        }

        .notification-box {
            flex-direction: column;
            align-items: flex-start;
        }

        .notification-action {
            width: 100%;
        }

        .notification-button {
            width: 100%;
            text-align: center;
        }
    }
</style>

@php
    $admin = $admin ?? Auth::user();
    
    // Hitung pengajuan surat yang pending
    use App\Models\Surat;
    use App\Models\Pengaduan;
    use App\Models\Notification;
    
    $suratPending = Surat::where('status', 'menunggu')->count();
    
    // Hitung notifikasi pengaduan yang belum dibaca (bukan status pengaduan)
    $pengaduanNotifications = Notification::where('type', 'pengaduan')
                                          ->where('is_read', false)
                                          ->count();
@endphp

<div class="page-dashboard">
    {{-- GREETING HEADER --}}
    <div class="dash-header">
        <div>
            <div class="dash-greeting">
                Halo, {{ explode(' ', $admin->name ?? 'Admin')[0] }} 👋
            </div>
            <div class="dash-subtext">
                Selamat datang. Kelola sistem desa dengan efisien.
            </div>
        </div>
    </div>

    {{-- NOTIFIKASI TERBARU DARI DATABASE --}}
    @php
        $latestNotifications = \App\Models\Notification::where('is_read', false)
                                                        ->orderByDesc('created_at')
                                                        ->limit(3)
                                                        ->get();
    @endphp

    @foreach($latestNotifications as $notification)
        <div class="notification-box {{ $notification->type === 'pengaduan' ? 'warning' : '' }}" id="notification-{{ $notification->id }}">
            <div class="notification-content">
                <div class="notification-title">
                    {{ $notification->type === 'surat' ? '📋' : '💬' }} {{ $notification->title }}
                </div>
                <div class="notification-desc">
                    {{ $notification->message }}
                </div>
            </div>
            <div class="notification-action">
                @if($notification->type === 'surat')
                    <a href="{{ route('admin.surat.show', $notification->reference_id) }}" class="notification-button" onclick="dismissAndNavigate(event, {{ $notification->id }}, this.href)">
                        Lihat Surat →
                    </a>
                @elseif($notification->type === 'pengaduan')
                    <a href="{{ route('pengaduan.show', $notification->reference_id) }}" class="notification-button {{ $notification->type === 'pengaduan' ? 'warning' : '' }}" onclick="dismissAndNavigate(event, {{ $notification->id }}, this.href)">
                        Lihat Pengaduan →
                    </a>
                @endif
                <button type="button" class="notification-button" style="background: #888; margin-left: 8px;" onclick="dismissNotification({{ $notification->id }})">
                    ✕ Tutup
                </button>
            </div>
        </div>
    @endforeach

    @if($latestNotifications->count() > 0 && \App\Models\Notification::where('is_read', false)->count() > 3)
        <div style="text-align: center; margin-bottom: 20px;">
            <a href="{{ route('notification.index') }}" style="color: #43a047; font-weight: 600; text-decoration: none;">
                Lihat semua notifikasi ({{ \App\Models\Notification::where('is_read', false)->count() }}) →
            </a>
        </div>
    @endif

    {{-- NOTIFIKASI PENGAJUAN SURAT PENDING --}}
    @if($suratPending > 0)
    <div class="notification-box">
        <div class="notification-content">
            <div class="notification-title">
                ⚠️ Ada Pengajuan Surat yang Menunggu
            </div>
            <div class="notification-desc">
                {{ $suratPending }} pengajuan surat dari warga menunggu untuk diproses. Segera periksa dan ambil tindakan!
            </div>
        </div>
        <div class="notification-action">
            <div class="notification-badge">{{ $suratPending }}</div>
            <a href="{{ route('admin.surat') }}" class="notification-button">
                Lihat Pengajuan
            </a>
        </div>
    </div>
    @endif

    {{-- NOTIFIKASI PENGADUAN BARU (DARI DATABASE, BELUM DIBACA) --}}
    @if($pengaduanNotifications > 0)
    <div class="notification-box warning">
        <div class="notification-content">
            <div class="notification-title">
                📢 Ada Pengaduan Masyarakat yang Baru
            </div>
            <div class="notification-desc">
                {{ $pengaduanNotifications }} pengaduan baru dari warga. Pastikan untuk ditinjau dan ditindaklanjuti.
            </div>
        </div>
        <div class="notification-action">
            <div class="notification-badge warning">{{ $pengaduanNotifications }}</div>
            <a href="{{ route('pengaduan.index') }}" class="notification-button warning">
                Lihat Pengaduan
            </a>
        </div>
    </div>
    @endif

    {{-- REMINDER BOX --}}
    <div class="info-box">
        <strong>💡 Reminder:</strong> Pastikan status surat diperbarui dan estimasi selesai diisi dengan jelas agar warga tahu kapan harus datang ke kantor desa.
    </div>

    {{-- LAYANAN YANG DIKELOLA --}}
    <h3 class="section-title">Layanan yang Dikelola</h3>
    <div class="services-grid">
        <div class="service-card">
            <div class="service-icon">📋</div>
            <div class="service-title">Surat-Menyurat</div>
            <div class="service-desc">
                Kelola pengajuan surat domisili, SKTM, pengantar KTP, kelahiran, kematian, dan lainnya.
            </div>
            <a href="{{ route('admin.surat') }}" class="service-link">Buka daftar →</a>
        </div>

        <div class="service-card">
            <div class="service-icon">🏛️</div>
            <div class="service-title">Inventaris Aset</div>
            <div class="service-desc">
                Kelola barang milik desa, peralatan, fasilitas umum, dan aset penting lainnya.
            </div>
            <a href="{{ route('inventaris.index') }}" class="service-link">Kelola →</a>
        </div>

        <div class="service-card">
            <div class="service-icon">🎉</div>
            <div class="service-title">Kegiatan Desa</div>
            <div class="service-desc">
                Kelola kegiatan desa, acara, dan program-program penting yang melibatkan masyarakat.
            </div>
            <a href="{{ route('admin.kegiatan') }}" class="service-link">Kelola kegiatan →</a>
        </div>

        <div class="service-card">
            <div class="service-icon">💬</div>
            <div class="service-title">Pengaduan Masyarakat</div>
            <div class="service-desc">
                Pantau pengaduan dan masukan dari warga tentang layanan atau fasilitas desa.
            </div>
            <a href="{{ route('pengaduan.index') }}" class="service-link">Lihat pengaduan →</a>
        </div>
    </div>
</div>

<script>
    function dismissNotification(notificationId) {
        const notificationElement = document.getElementById('notification-' + notificationId);
        if (notificationElement) {
            // Fade out animation
            notificationElement.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
            notificationElement.style.opacity = '0';
            notificationElement.style.transform = 'translateX(20px)';
            
            // Remove from DOM after animation
            setTimeout(() => {
                notificationElement.remove();
            }, 300);
            
            // Mark as read di database via AJAX
            fetch('{{ url("/admin/notifikasi") }}/' + notificationId + '/dismiss', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || document.querySelector('input[name="_token"]')?.value || '',
                    'Content-Type': 'application/json',
                }
            }).catch(error => console.log('Error:', error));
        }
    }

    function dismissAndNavigate(event, notificationId, url) {
        event.preventDefault();
        
        const notificationElement = document.getElementById('notification-' + notificationId);
        if (notificationElement) {
            // Fade out animation
            notificationElement.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
            notificationElement.style.opacity = '0';
            notificationElement.style.transform = 'translateX(20px)';
            
            // Remove from DOM after animation
            setTimeout(() => {
                notificationElement.remove();
            }, 300);
        }
        
        // Mark as read di database via AJAX dan navigate
        fetch('{{ url("/admin/notifikasi") }}/' + notificationId + '/dismiss', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || document.querySelector('input[name="_token"]')?.value || '',
                'Content-Type': 'application/json',
            }
        }).then(() => {
            // Navigate setelah AJAX berhasil
            window.location.href = url;
        }).catch(error => {
            console.log('Error:', error);
            // Navigate tetap jalan meski error
            window.location.href = url;
        });
    }
</script>

@endsection
