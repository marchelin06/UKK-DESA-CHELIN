# Fitur Lupa Password - Panduan Implementasi

## Deskripsi Fitur

Fitur "Lupa Password" memungkinkan user yang lupa password mereka untuk mengatur ulang password dengan aman melalui email yang terdaftar di sistem.

## Komponen yang Ditambahkan

### 1. Routes (routes/web.php)
```php
// Tampil form lupa password
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');

// Kirim link reset ke email
Route::post('/forgot-password', [AuthController::class, 'sendPasswordResetLink'])->name('password.email');

// Tampil form reset password
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');

// Proses reset password
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
```

### 2. Views (resources/views/auth/)
- **forgot-password.blade.php** - Form untuk input email
- **reset-password.blade.php** - Form untuk input password baru

### 3. Database Migration
- **2026_01_19_000000_create_password_reset_tokens_table.php**
  - Menyimpan token reset password untuk setiap user
  - Token berlaku selama 60 menit

### 4. Controller Methods (AuthController)
```php
showForgotPasswordForm()           // Tampil form lupa password
sendPasswordResetLink($request)    // Kirim email dengan link reset
showResetPasswordForm($token)      // Tampil form reset password
resetPassword($request)            // Proses reset password
getPasswordResetEmailHTML()        // Generate HTML email
```

## Flow Proses Reset Password

```
1. User klik "Lupa Password?" di halaman login
   ↓
2. User masukkan email dan klik "Kirim Link Reset Password"
   ↓
3. System validasi email ada di database
   ↓
4. Generate token random dan hash
   ↓
5. Simpan token ke tabel password_reset_tokens
   ↓
6. Kirim email dengan link reset + token
   ↓
7. User klik link di email (berlaku 60 menit)
   ↓
8. Tampilkan form reset password
   ↓
9. User masukkan password baru + konfirmasi
   ↓
10. Validasi & update password di database
   ↓
11. Hapus token dari database
   ↓
12. Redirect ke login dengan pesan sukses
```

## Penggunaan

### Untuk User:

1. **Akses Lupa Password**
   - Klik link "Lupa Password?" di halaman login
   - URL: `http://localhost:8000/forgot-password`

2. **Isi Email**
   - Masukkan email yang terdaftar di sistem
   - Klik "Kirim Link Reset Password"

3. **Cek Email**
   - Cek email yang masuk (folder inbox atau spam)
   - Klik link "Atur Ulang Password" dalam email

4. **Buat Password Baru**
   - Masukkan password baru (minimal 6 karakter)
   - Ulangi password untuk konfirmasi
   - Klik "Atur Ulang Password"

5. **Login Dengan Password Baru**
   - Redirect otomatis ke halaman login
   - Login dengan password baru

### Untuk Developer:

#### Konfigurasi Email (di .env)

Development (menggunakan log):
```
MAIL_MAILER=log
```

Production (menggunakan SMTP):
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@desabangah.id
MAIL_FROM_NAME="Desa Bangah"
```

#### Testing Email (untuk development)

1. Jalankan aplikasi dan lakukan forgot password
2. Cek file `storage/logs/laravel.log` untuk melihat email yang dikirim
3. Alternatif: gunakan Mailtrap.io untuk testing SMTP

## Validasi & Keamanan

### Validasi Input
- Email harus format valid dan terdaftar
- Password minimal 6 karakter
- Konfirmasi password harus sama

### Keamanan Token
- Token di-hash menggunakan `Hash::make()` sebelum disimpan
- Token hanya diperiksa saat user submit form reset
- Token otomatis dihapus setelah berhasil digunakan
- Token otomatis dihapus setelah 60 menit (expired)

### Rate Limiting (Opsional)
Untuk mencegah abuse, bisa menambahkan rate limiting di route:

```php
Route::post('/forgot-password', [AuthController::class, 'sendPasswordResetLink'])
    ->middleware('throttle:3,1')  // Max 3 requests per minute
    ->name('password.email');
```

## File yang Dibuat/Dimodifikasi

### File Baru:
- `resources/views/auth/forgot-password.blade.php`
- `resources/views/auth/reset-password.blade.php`
- `database/migrations/2026_01_19_000000_create_password_reset_tokens_table.php`

### File Dimodifikasi:
- `app/Http/Controllers/AuthController.php` (tambah 6 methods)
- `routes/web.php` (tambah 4 routes)
- `resources/views/auth/login.blade.php` (tambah link "Lupa Password?")

## Testing Checklist

- [ ] Akses halaman lupa password tanpa error
- [ ] Form validasi email (wajib dan harus ada di database)
- [ ] Email terkirim dengan link yang valid
- [ ] Link reset password berfungsi dan tampil form
- [ ] Validasi password (minimal 6 karakter, konfirmasi cocok)
- [ ] Password berhasil diupdate di database
- [ ] Token dihapus setelah digunakan
- [ ] Token expired setelah 60 menit
- [ ] User bisa login dengan password baru
- [ ] Pesan error ditampilkan dengan baik

## Troubleshooting

### Email tidak terkirim
- Cek konfigurasi MAIL di .env
- Jika menggunakan SMTP, pastikan credentials benar
- Cek `storage/logs/laravel.log` untuk error details

### Token error "Token tidak valid"
- Pastikan token dalam URL sesuai dengan yang dikirim
- Jangan copy-paste link, gunakan klik langsung dari email
- Token hanya berlaku 60 menit

### Email tidak diterima user
- Cek folder spam
- Pastikan email address yang didaftarkan benar
- Cek log untuk memastikan email terkirim

## Pengembangan Lebih Lanjut

### Fitur Tambahan yang Bisa Ditambahkan:
1. Resend Email - User bisa meminta link dikirim ulang
2. Multiple Reset Attempts - Track berapa kali user mencoba reset
3. Notification - Notifikasi ketika ada attempt reset password
4. Two-Factor Authentication - Tambahan keamanan dengan kode OTP
5. Password History - Cegah penggunaan password lama
6. Email Verification - Pastikan email sudah verified sebelum reset

## Catatan Penting

- Token disimpan dengan di-hash untuk keamanan
- Email content bisa dikustomisasi sesuai branding desa
- Durasi token (60 menit) bisa diatur di method `resetPassword()`
- Untuk production, gunakan SMTP mail driver yang aman
