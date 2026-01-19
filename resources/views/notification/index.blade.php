@extends('layouts.app')

@section('content')
<style>
    .page-notification {
        max-width: 1000px;
        margin: 0 auto;
        padding: 30px 20px;
        font-family: 'Poppins', sans-serif;
    }

    .notification-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        gap: 15px;
        flex-wrap: wrap;
    }

    .notification-title {
        font-size: 32px;
        font-weight: 700;
        color: #1b5e20;
    }

    .notification-actions {
        display: flex;
        gap: 10px;
    }

    .btn-action {
        background: linear-gradient(135deg, #43a047 0%, #66bb6a 100%);
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        border: none;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    .btn-action:hover {
        background: linear-gradient(135deg, #2e7d32 0%, #43a047 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(67, 160, 71, 0.3);
    }

    .btn-back {
        background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%);
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        border: none;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    .btn-back:hover {
        background: linear-gradient(135deg, #145c42 0%, #1b5e20 100%);
    }

    .notification-list {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .notification-item {
        background: #ffffff;
        border-radius: 12px;
        border: 2px solid #e8f5e9;
        padding: 20px;
        transition: all 0.3s ease;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }

    .notification-item:hover {
        border-color: #43a047;
        box-shadow: 0 4px 12px rgba(67, 160, 71, 0.15);
    }

    .notification-item.unread {
        background: linear-gradient(135deg, #f1f8f6 0%, #e8f5e9 100%);
        border-left: 5px solid #43a047;
    }

    .notification-item.read {
        opacity: 0.7;
    }

    .notification-content {
        flex: 1;
        min-width: 250px;
    }

    .notification-badge-type {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 6px;
    }

    .notification-badge-type.surat {
        background: #c8e6c9;
        color: #1b5e20;
    }

    .notification-badge-type.pengaduan {
        background: #ffe0b2;
        color: #e65100;
    }

    .notification-item-title {
        font-size: 16px;
        font-weight: 700;
        color: #1b5e20;
        margin-bottom: 4px;
    }

    .notification-item-message {
        font-size: 14px;
        color: #666;
        margin-bottom: 4px;
    }

    .notification-item-time {
        font-size: 12px;
        color: #999;
    }

    .notification-item-actions {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .btn-small {
        padding: 6px 12px;
        border-radius: 6px;
        border: none;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .btn-view {
        background: linear-gradient(135deg, #43a047 0%, #66bb6a 100%);
        color: white;
    }

    .btn-view:hover {
        background: linear-gradient(135deg, #2e7d32 0%, #43a047 100%);
    }

    .btn-delete {
        background: #ffcdd2;
        color: #c62828;
    }

    .btn-delete:hover {
        background: #ef9a9a;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #999;
    }

    .empty-state-icon {
        font-size: 64px;
        margin-bottom: 16px;
    }

    .empty-state-title {
        font-size: 20px;
        font-weight: 700;
        color: #1b5e20;
        margin-bottom: 8px;
    }

    .empty-state-desc {
        font-size: 14px;
        color: #999;
    }

    .badge-unread {
        display: inline-block;
        background: #43a047;
        color: white;
        padding: 2px 8px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 700;
        margin-left: 8px;
    }

    .filter-section {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .filter-btn {
        padding: 8px 14px;
        border-radius: 6px;
        border: 2px solid #e8f5e9;
        background: white;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
        color: #666;
        transition: all 0.3s ease;
    }

    .filter-btn.active {
        background: #43a047;
        color: white;
        border-color: #43a047;
    }

    .filter-btn:hover {
        border-color: #43a047;
    }
</style>

<div class="page-notification">
    {{-- HEADER --}}
    <div class="notification-header">
        <h1 class="notification-title">📬 Notifikasi Admin</h1>
        <div class="notification-actions">
            @if(Illuminate\Support\Facades\DB::table('notifications')->where('is_read', false)->count() > 0)
            <form method="POST" action="{{ route('notification.readAll') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn-action">Tandai Semua Dibaca</button>
            </form>
            @endif
            <a href="{{ route('admin.dashboard') }}" class="btn-back">← Kembali ke Dashboard</a>
        </div>
    </div>

    {{-- NOTIFIKASI LIST --}}
    @if($notifications->count() > 0)
        <div class="notification-list">
            @foreach($notifications as $notification)
                <div class="notification-item {{ !$notification->is_read ? 'unread' : 'read' }}">
                    <div class="notification-content">
                        <span class="notification-badge-type {{ $notification->type }}">
                            {{ $notification->type === 'surat' ? '📋 Surat' : '💬 Pengaduan' }}
                        </span>
                        <div class="notification-item-title">
                            {{ $notification->title }}
                            @if(!$notification->is_read)
                                <span class="badge-unread">BARU</span>
                            @endif
                        </div>
                        <div class="notification-item-message">
                            {{ $notification->message }}
                        </div>
                        <div class="notification-item-time">
                            {{ $notification->created_at->format('d M Y H:i') }}
                        </div>
                    </div>

                    <div class="notification-item-actions">
                        @if($notification->type === 'surat')
                            <a href="{{ route('admin.surat.show', $notification->reference_id) }}" class="btn-small btn-view">
                                Lihat Surat
                            </a>
                        @elseif($notification->type === 'pengaduan')
                            <a href="{{ route('pengaduan.show', $notification->reference_id) }}" class="btn-small btn-view">
                                Lihat Pengaduan
                            </a>
                        @endif

                        <form method="POST" action="{{ route('notification.destroy', $notification->id) }}" style="display: inline;" onsubmit="return confirm('Hapus notifikasi ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-small btn-delete">🗑️</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- PAGINATION --}}
        <div style="margin-top: 30px;">
            {{ $notifications->links() }}
        </div>
    @else
        <div class="empty-state">
            <div class="empty-state-icon">✨</div>
            <div class="empty-state-title">Tidak Ada Notifikasi</div>
            <div class="empty-state-desc">Anda tidak memiliki notifikasi baru. Periksa kembali nanti untuk pembaruan terbaru.</div>
        </div>
    @endif
</div>

@endsection
