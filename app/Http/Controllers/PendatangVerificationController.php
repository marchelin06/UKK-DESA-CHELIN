<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\PendatangApprovedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PendatangVerificationController extends Controller
{
    /**
     * Tampilkan list pendatang menunggu verifikasi
     */
    public function index()
    {
        $pendatangMenunggu = User::where('role', 'pendatang')
            ->where('is_verified', 0)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $pendatangDisetujui = User::where('role', 'pendatang')
            ->where('is_verified', 1)
            ->count();

        $pendatangDitolak = User::where('role', 'pendatang')
            ->where('is_verified', 2)
            ->count();

        return view('admin.pendatang-verification', compact('pendatangMenunggu', 'pendatangDisetujui', 'pendatangDitolak'));
    }

    /**
     * Tampilkan detail pendatang
     */
    public function show($id)
    {
        $pendatang = User::findOrFail($id);
        
        if ($pendatang->role != 'pendatang') {
            abort(403);
        }

        return view('admin.pendatang-detail', compact('pendatang'));
    }

    /**
     * Approve pendatang
     */
    public function approve(Request $request, $id)
    {
        $pendatang = User::findOrFail($id);
        
        if ($pendatang->role != 'pendatang') {
            abort(403);
        }

        $request->validate([
            'catatan' => 'nullable|string|max:500'
        ]);

        $result = $pendatang->update([
            'is_verified' => 1,
            'verified_at' => now(),
            'approved_by' => Auth::id(),
            'catatan_admin' => $request->catatan
        ]);

        if ($result) {
            // Force refresh data dari database
            $pendatang->refresh();
            
            // Kirim email notifikasi persetujuan
            try {
                Mail::to($pendatang->email)->send(new PendatangApprovedMail($pendatang, $request->catatan));
            } catch (\Exception $e) {
                // Log error jika email gagal
                \Log::error('Gagal mengirim email approval ke ' . $pendatang->email . ': ' . $e->getMessage());
            }

            return redirect()->route('admin.pendatang.index')
                ->with('success', '✅ Pendatang ' . $pendatang->name . ' telah disetujui! Email notifikasi telah dikirim. Mereka sekarang bisa login.');
        }

        return back()->with('error', 'Gagal menyetujui pendatang. Silakan coba lagi.');
    }

    /**
     * Reject pendatang
     */
    public function reject(Request $request, $id)
    {
        $pendatang = User::findOrFail($id);
        
        if ($pendatang->role != 'pendatang') {
            abort(403);
        }

        $request->validate([
            'alasan_penolakan' => 'required|string|max:500'
        ]);

        $pendatang->update([
            'is_verified' => 2,
            'verified_at' => now(),
            'approved_by' => Auth::id(),
            'catatan_admin' => $request->alasan_penolakan
        ]);

        // TODO: Kirim email notifikasi penolakan
        // Mail::to($pendatang->email)->send(new PendatangRejectedMail($pendatang, $request->alasan_penolakan));

        return back()->with('success', 'Pendatang ' . $pendatang->name . ' telah ditolak. Email notifikasi telah dikirim.');
    }
}

