<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\FacadesAuth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PendatangVerificationController;

use Illuminate\Support\Facades\Auth;

// --------------------------
// BERANDA
// --------------------------
Route::get('/', function () {
    return view('beranda');
})->name('home');

// --------------------------
// LAYANAN PUBLIK (PUBLIC - UNTUK SEMUA GUEST)
// --------------------------
Route::get('/layanan-publik', function () {

    return view('layanan.publik-index');
})->name('layanan.publik');

Route::get('/layanan-publik/surat', function () {
    return view('layanan.surat-info');
})->name('layanan.surat.public');

Route::get('/layanan-publik/inventaris', function () {
    return view('layanan.inventaris-info');
})->name('layanan.inventaris.public');

Route::get('/layanan-publik/kegiatan', function () {
    return view('layanan.kegiatan-info');
})->name('layanan.kegiatan.public');

Route::get('/layanan-publik/pengaduan', function () {
    return view('layanan.pengaduan-info');
})->name('layanan.pengaduan.public');

// --------------------------
// LOGIN & REGISTER
// --------------------------
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/login/admin', [AdminAuthController::class, 'loginForm'])->name('login.admin');
Route::post('/login/admin', [AdminAuthController::class, 'login'])->name('login.admin.post');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// --------------------------
// FORGOT & RESET PASSWORD
// --------------------------
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendPasswordResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

Route::middleware(['auth'])->group(function() {
    Route::get('/surat/{surat}/cetak', [SuratController::class, 'cetak'])->name('surat.cetak');
});

// --------------------------
// WARGA
// --------------------------
Route::middleware(['auth', 'role:warga', 'check.profile'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard', ['user' => Auth::user()]);
    })->name('dashboard');

    // Surat untuk warga
    Route::get('/surat', [SuratController::class, 'index'])->name('surat.index');
    Route::post('/surat', [SuratController::class, 'store'])->name('surat.store');

    // Inventaris (WARGA HANYA BISA LIHAT)
    Route::get('/inventaris', [InventarisController::class, 'publicIndex'])
        ->name('inventaris.public');
});

// --------------------------
// PENDATANG (SUDAH DISETUJUI)
// --------------------------
Route::middleware(['auth', 'role:pendatang'])->group(function () {

    Route::get('/dashboard-pendatang', function () {
        $user = Auth::user();
        if ($user->is_verified != 1) {
            return redirect()->route('home')->with('error', 'Akun Anda belum disetujui admin.');
        }
        return view('dashboard.pendatang', ['user' => $user]);
    })->name('dashboard.pendatang');

    // Layanan Surat - view only untuk pendatang
    Route::get('/layanan/surat', [SuratController::class, 'indexPendatang'])->name('layanan.surat');

    // Layanan Inventaris - view only untuk pendatang
    Route::get('/layanan/inventaris', [InventarisController::class, 'indexPendatang'])->name('layanan.inventaris');

    // Kegiatan - semua user bisa lihat
    Route::get('/layanan/kegiatan', [KegiatanController::class, 'index'])->name('layanan.kegiatan');

    // Pengaduan - info only untuk pendatang
    Route::get('/layanan/pengaduan', function () {
        return view('layanan.pengaduan-info');
    })->name('layanan.pengaduan.pendatang');
});

// --------------------------
// KEGIATAN (UNTUK SEMUA AUTHENTICATED USER)
// --------------------------
Route::middleware('auth')->group(function () {
    Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
    Route::get('/kegiatan/{kegiatan}', [KegiatanController::class, 'show'])->name('kegiatan.show');
});

// --------------------------
// ADMIN
// --------------------------
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('dashboard.admin', ['admin' => Auth::user()]);
    })->name('admin.dashboard');

    // Surat untuk admin
    Route::get('/admin/surat', [SuratController::class, 'adminIndex'])->name('admin.surat');

    // DETAIL SURAT + KEPUTUSAN
    Route::get('/admin/surat/{id}', [SuratController::class, 'show'])->name('admin.surat.show');
    Route::post('/admin/surat/{id}/keputusan', [SuratController::class, 'updateStatus'])->name('admin.surat.keputusan');

    // opsi cepat (kalau masih dipakai)
    Route::post('/admin/surat/{id}/setujui', [SuratController::class, 'setujui'])->name('admin.surat.setujui');
    Route::post('/admin/surat/{id}/tolak',   [SuratController::class, 'tolak'])->name('admin.surat.tolak');

    // MANAJEMEN INVENTARIS — CRUD khusus admin
    Route::get('/admin/inventaris', [InventarisController::class, 'index'])->name('inventaris.index');
    Route::get('/admin/inventaris/create', [InventarisController::class, 'create'])->name('inventaris.create');
    Route::post('/admin/inventaris', [InventarisController::class, 'store'])->name('inventaris.store');
    Route::get('/admin/inventaris/{id}', [InventarisController::class, 'show'])->name('inventaris.show');

    Route::get('/admin/inventaris/{id}/edit', [InventarisController::class, 'edit'])->name('inventaris.edit');
    Route::put('/admin/inventaris/{id}', [InventarisController::class, 'update'])->name('inventaris.update');

    Route::delete('/admin/inventaris/{id}', [InventarisController::class, 'destroy'])->name('inventaris.destroy');

    // MANAJEMEN PENGADUAN — ADMIN MELIHAT DAFTAR PENGADUAN
    Route::get('/admin/pengaduan', [PengaduanController::class, 'adminIndex'])->name('pengaduan.index');
    Route::get('/admin/pengaduan/{id}', [PengaduanController::class, 'show'])->name('pengaduan.show');

    // MANAJEMEN KEGIATAN — CRUD khusus admin
    Route::get('/admin/kegiatan', [KegiatanController::class, 'index'])->name('admin.kegiatan');
    Route::get('/admin/kegiatan/create', [KegiatanController::class, 'create'])->name('admin.kegiatan.create');
    Route::post('/admin/kegiatan', [KegiatanController::class, 'store'])->name('admin.kegiatan.store');
    Route::get('/admin/kegiatan/{kegiatan}', [KegiatanController::class, 'show'])->name('admin.kegiatan.show');
    Route::get('/admin/kegiatan/{kegiatan}/edit', [KegiatanController::class, 'edit'])->name('admin.kegiatan.edit');
    Route::put('/admin/kegiatan/{kegiatan}', [KegiatanController::class, 'update'])->name('admin.kegiatan.update');
    Route::delete('/admin/kegiatan/{kegiatan}', [KegiatanController::class, 'destroy'])->name('admin.kegiatan.destroy');

    // NOTIFIKASI — ADMIN MELIHAT NOTIFIKASI
    Route::get('/admin/notifikasi', [NotificationController::class, 'index'])->name('notification.index');
    Route::post('/admin/notifikasi/{id}/read', [NotificationController::class, 'markAsRead'])->name('notification.read');
    Route::post('/admin/notifikasi/read-all', [NotificationController::class, 'markAllAsRead'])->name('notification.readAll');
    Route::post('/admin/notifikasi/{id}/dismiss', [NotificationController::class, 'dismissNotification'])->name('notification.dismiss');
    Route::delete('/admin/notifikasi/{id}', [NotificationController::class, 'destroy'])->name('notification.destroy');
    Route::delete('/admin/notifikasi/{id}', [NotificationController::class, 'destroy'])->name('notification.destroy');
    Route::get('/admin/notifikasi/api/unread', [NotificationController::class, 'getUnreadCount'])->name('notification.unread');

    // VERIFIKASI PENDATANG
    Route::get('/admin/pendatang', [PendatangVerificationController::class, 'index'])->name('admin.pendatang.index');
    Route::get('/admin/pendatang/{id}', [PendatangVerificationController::class, 'show'])->name('admin.pendatang.show');
    Route::post('/admin/pendatang/{id}/approve', [PendatangVerificationController::class, 'approve'])->name('admin.pendatang.approve');
    Route::post('/admin/pendatang/{id}/reject', [PendatangVerificationController::class, 'reject'])->name('admin.pendatang.reject');
});

// --------------------------
// LAYANAN PUBLIK (WARGA)
// --------------------------

// Pengaduan - HANYA UNTUK WARGA
Route::middleware(['auth', 'role:warga', 'check.profile'])->group(function () {
    Route::get('/layanan/pengaduan', [PengaduanController::class, 'create'])->name('pengaduan.create');
    Route::post('/layanan/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
    Route::get('/layanan/riwayat-pengaduan', [PengaduanController::class, 'riwayat'])->name('pengaduan.riwayat');
});

// --------------------------
// LOGOUT
// --------------------------
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --------------------------
// PROFILE
// --------------------------
// Semua authenticated user bisa lihat profil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
});

// Edit profile hanya untuk warga
Route::middleware(['auth', 'role:warga'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
