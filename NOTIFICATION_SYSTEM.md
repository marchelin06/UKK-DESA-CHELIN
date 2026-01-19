# Sistem Notifikasi Admin - Dokumentasi

## Deskripsi
Sistem notifikasi telah diimplementasikan untuk memberikan pemberitahuan kepada admin ketika ada warga yang mengirimkan:
1. **Pengajuan Surat** (Surat Domisili, SKTM, Pengantar KTP, dll)
2. **Pengaduan Masyarakat**

## Fitur Utama

### 1. Database Notifications
- **Tabel:** `notifications`
- **Fields:**
  - `id` - ID notifikasi
  - `type` - Jenis notifikasi ('surat' atau 'pengaduan')
  - `reference_id` - ID dari surat atau pengaduan yang direferensikan
  - `title` - Judul notifikasi
  - `message` - Pesan notifikasi
  - `is_read` - Status apakah notifikasi sudah dibaca
  - `created_at`, `updated_at` - Timestamp

### 2. Model & Controller
- **Model:** `App\Models\Notification`
- **Controller:** `App\Http\Controllers\NotificationController`

### 3. Trigger Notifikasi
Notifikasi otomatis dibuat ketika:

#### a. Pengajuan Surat (SuratController@store)
```php
Notification::create([
    'type'         => 'surat',
    'reference_id' => $surat->id,
    'title'        => 'Pengajuan Surat Baru',
    'message'      => "{nama_warga} telah mengajukan {jenis_surat}",
    'is_read'      => false,
]);
```

#### b. Pengaduan Baru (PengaduanController@store)
```php
Notification::create([
    'type'         => 'pengaduan',
    'reference_id' => $pengaduan->id,
    'title'        => 'Pengaduan Baru',
    'message'      => "{nama_pengirim} telah mengirimkan pengaduan tentang...",
    'is_read'      => false,
]);
```

### 4. Rute Notifikasi
Semua rute notifikasi hanya dapat diakses oleh admin:
```
GET    /admin/notifikasi                 - Lihat semua notifikasi
POST   /admin/notifikasi/{id}/read       - Tandai notifikasi sebagai dibaca
POST   /admin/notifikasi/read-all        - Tandai semua notifikasi sebagai dibaca
DELETE /admin/notifikasi/{id}            - Hapus notifikasi
GET    /admin/notifikasi/api/unread      - API untuk mendapatkan jumlah notifikasi belum dibaca
```

### 5. Tampilan Notifikasi

#### a. Di Navbar/Sidebar
- Menu **Notifikasi** muncul di sidebar admin
- Menampilkan badge dengan jumlah notifikasi belum dibaca
- Link ke halaman notifikasi lengkap

#### b. Di Dashboard Admin
- Menampilkan **3 notifikasi terbaru** yang belum dibaca
- Setiap notifikasi menampilkan:
  - Icon tipe (📋 untuk surat, 💬 untuk pengaduan)
  - Judul notifikasi
  - Pesan detail
  - Tombol untuk langsung membuka detail surat/pengaduan
- Link ke halaman notifikasi lengkap jika ada lebih dari 3 notifikasi

#### c. Halaman Notifikasi Lengkap
- URL: `/admin/notifikasi`
- Menampilkan semua notifikasi dengan pagination
- Fitur:
  - Tandai notifikasi sebagai dibaca
  - Tandai semua notifikasi sebagai dibaca
  - Hapus notifikasi
  - Filter berdasarkan tipe (Surat/Pengaduan)
  - Status baca/belum baca

## File-File yang Dimodifikasi/Dibuat

### File Baru:
1. `app/Models/Notification.php` - Model Notification
2. `app/Http/Controllers/NotificationController.php` - Controller untuk notifikasi
3. `database/migrations/2026_01_19_054208_create_notifications_table.php` - Migrasi tabel
4. `resources/views/notification/index.blade.php` - View halaman notifikasi

### File yang Dimodifikasi:
1. `app/Http/Controllers/SuratController.php`
   - Import model Notification
   - Tambah kode trigger notifikasi di method `store()`

2. `app/Http/Controllers/PengaduanController.php`
   - Import model Notification
   - Tambah kode trigger notifikasi di method `store()`

3. `routes/web.php`
   - Tambah import NotificationController
   - Tambah 5 rute notifikasi dalam middleware admin

4. `resources/views/layouts/navbar.blade.php`
   - Tambah menu Notifikasi di sidebar admin
   - Menampilkan badge count notifikasi belum dibaca

5. `resources/views/dashboard/admin.blade.php`
   - Tambah section untuk menampilkan notifikasi terbaru dari database
   - Link ke halaman notifikasi lengkap

## Cara Kerja

### Flow Pengajuan Surat:
1. Warga mengisi form pengajuan surat
2. Warga submit form
3. SuratController@store:
   - Validasi data
   - Simpan ke tabel `surat` dengan status 'menunggu'
   - **Buat notifikasi otomatis** dengan tipe 'surat'
4. Admin melihat notifikasi baru di:
   - Dashboard (3 notifikasi terbaru)
   - Sidebar (badge count)
   - Halaman notifikasi lengkap

### Flow Pengaduan:
1. Warga mengisi form pengaduan
2. Warga submit form
3. PengaduanController@store:
   - Validasi data
   - Simpan ke tabel `pengaduan`
   - **Buat notifikasi otomatis** dengan tipe 'pengaduan'
4. Admin melihat notifikasi baru (sama seperti surat)

## Status Notifikasi

- **Belum dibaca (is_read = false):**
  - Ditampilkan dengan highlight khusus
  - Dihitung di badge counter
  - Prioritas tinggi di halaman notifikasi

- **Sudah dibaca (is_read = true):**
  - Ditampilkan dengan opacity lebih rendah
  - Tidak dihitung di badge counter
  - Tetap disimpan di database untuk riwayat

## Fitur Bonus

### 1. API Endpoint
```
GET /admin/notifikasi/api/unread
```
Mengembalikan JSON:
```json
{
  "unread_count": 5,
  "notifications": [
    {
      "id": 1,
      "type": "surat",
      "title": "Pengajuan Surat Baru",
      "message": "...",
      "created_at": "2026-01-19 12:34:56"
    }
  ]
}
```

### 2. Kustomisasi
Untuk mengubah styling notifikasi, edit file CSS di:
- `resources/views/dashboard/admin.blade.php` (section NOTIFICATION STYLES)
- `resources/views/notification/index.blade.php` (section style)

## Testing

### Test Manual:
1. Login sebagai warga
2. Ajukan surat atau pengaduan baru
3. Login sebagai admin
4. Lihat notifikasi baru muncul di:
   - Badge di sidebar
   - Dashboard
   - Halaman `/admin/notifikasi`

### Test Database:
```php
// Check notification count
\App\Models\Notification::count();

// Check unread notifications
\App\Models\Notification::where('is_read', false)->count();

// Check specific type
\App\Models\Notification::where('type', 'surat')->get();
```

## Troubleshooting

### Notifikasi tidak muncul?
1. Pastikan migrasi sudah dijalankan: `php artisan migrate:status`
2. Cek apakah data ada di tabel: `SELECT * FROM notifications;`
3. Clear cache: `php artisan cache:clear`

### Badge count tidak update?
1. Hard refresh page (Ctrl+Shift+R)
2. Cek apakah ada notifikasi belum dibaca: `\App\Models\Notification::where('is_read', false)->count()`

### Link notifikasi error 404?
1. Pastikan route sudah benar: `php artisan route:list | grep notification`
2. Cek apakah reference_id ada di tabel surat/pengaduan
