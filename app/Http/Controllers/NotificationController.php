<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    /**
     * Menampilkan semua notifikasi untuk admin
     */
    public function index()
    {
        $notifications = Notification::orderByDesc('created_at')->paginate(20);
        return view('notification.index', compact('notifications'));
    }

    /**
     * Menandai notifikasi sebagai sudah dibaca
     */
    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->update(['is_read' => true]);

        // Redirect ke detail surat atau pengaduan berdasarkan tipe
        if ($notification->type === 'surat') {
            return redirect()->route('admin.surat.show', $notification->reference_id);
        } elseif ($notification->type === 'pengaduan') {
            return redirect()->route('pengaduan.show', $notification->reference_id);
        }

        return redirect()->back();
    }

    /**
     * Menandai semua notifikasi sebagai sudah dibaca
     */
    public function markAllAsRead()
    {
        Notification::where('is_read', false)->update(['is_read' => true]);
        return redirect()->back()->with('success', 'Semua notifikasi telah ditandai sebagai dibaca');
    }

    /**
     * Menghapus notifikasi
     */
    public function destroy($id)
    {
        Notification::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Notifikasi telah dihapus');
    }

    /**
     * Get notifikasi yang belum dibaca (untuk AJAX/API)
     */
    public function getUnreadCount()
    {
        $count = Notification::where('is_read', false)->count();
        return response()->json([
            'unread_count' => $count,
            'notifications' => Notification::where('is_read', false)
                                            ->orderByDesc('created_at')
                                            ->limit(5)
                                            ->get()
        ]);
    }

    /**
     * Dismiss notifikasi (mark as read dan return JSON)
     */
    public function dismissNotification($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->update(['is_read' => true]);
        
        return response()->json([
            'success' => true,
            'message' => 'Notifikasi telah ditutup',
            'unread_count' => Notification::where('is_read', false)->count()
        ]);
    }
}
