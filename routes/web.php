<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Auth;

// ==========================
// 🏠 Halaman Utama
// ==========================
Route::get('/', fn() => view('beranda'))->name('home');

// ==========================
// 🔐 Halaman Pilih Login
// ==========================
// /login → halaman untuk memilih login user/admin
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// ==========================
// 🔵 LOGIN USER
// ==========================
Route::get('/login/user', [AuthController::class, 'showLoginForm'])->name('login.user');
Route::post('/login/user', [AuthController::class, 'login'])->name('login.user.post');

// ==========================
// 🔴 LOGIN ADMIN
// ==========================
Route::get('/login/admin', [AdminAuthController::class, 'loginForm'])->name('login.admin');
Route::post('/login/admin', [AdminAuthController::class, 'login'])->name('login.admin.post');

// ==========================
// 📝 REGISTER USER
// ==========================
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// ==========================
// 📊 DASHBOARD USER (auth:web)
// ==========================
Route::middleware('auth:web')->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    })->name('dashboard');
});

// ==========================
// 📊 DASHBOARD ADMIN (auth:admin)
// ==========================
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', function () {
        $admin = Auth::guard('admin')->user();
        return view('admin.dashboard', compact('admin'));
    })->name('admin.dashboard');
});

