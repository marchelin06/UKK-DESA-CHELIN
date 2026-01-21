# Setup Panduan Pengembangan - Sistem Informasi Desa

Dokumentasi ini dibuat untuk memastikan setup yang mudah setelah clone repository.

## ✅ Verifikasi Status Proyek

**Tanggal Check**: 21 Januari 2026

### Hasil Validasi:
- ✅ **Composer**: Valid (composer.json & composer.lock OK)
- ✅ **PHP Syntax**: Semua file PHP bersih dari syntax error
  - 7 Model files ✅
  - 10 Controller files ✅
  - 10 Config files ✅
- ✅ **Routes**: 81 routes terdefenisi dengan benar
- ✅ **Database Migrations**: 15 migrations semua sudah dijalankan
- ✅ **Database Connection**: SQLite database OK (114.7 KB)
- ✅ **Views**: 44 Blade template files
- ✅ **Configuration**: Framework bootstrap & config cached
- ✅ **Storage**: Symlink sudah terbuat

---

## 🚀 Setup Setelah Clone

Ikuti langkah-langkah berikut untuk setup lokal development:

### 1. Install Dependencies PHP
```bash
composer install
```

### 2. Setup Environment File
```bash
cp .env.example .env
```
Atau jika .env.example tidak ada, pastikan .env sudah ada dengan:
- `APP_KEY` sudah terisi (base64:CsNUCzK06w18ipLl2SW26SOmVd7SuEUWfZb7VSRxsP0=)
- `DB_CONNECTION=sqlite`
- `APP_DEBUG=true` (untuk development)

### 3. Generate/Verify APP_KEY
```bash
php artisan key:generate
```

### 4. Create/Migrate Database
```bash
php artisan migrate
```

### 5. Seed Default Data (Opsional)
Untuk membuat admin default:
```bash
php artisan db:seed --class=AdminSeeder
```

Kredensial admin yang dibuat:
- Email: `ekamarchel@gmail.com`
- Password: `marchelin123`

Atau dari migration (sudah otomatis):
- Email: `admin@example.com`
- Password: `admin123`

### 6. Install NPM Dependencies (Opsional - untuk frontend build)
```bash
npm install
```

### 7. Generate Production Key (Production Only)
```bash
php artisan key:generate --show
```

### 8. Run Development Server
```bash
# Terminal 1: PHP Server
php artisan serve

# Terminal 2: Vite Dev Server (opsional)
npm run dev
```

Aplikasi akan tersedia di: `http://localhost:8000`

---

## 📋 Struktur Database

### Users Table
- **id** (integer, autoincrement)
- **name** (varchar)
- **email** (varchar, unique)
- **password** (varchar)
- **role** (varchar: 'warga', 'admin')
- **username** (varchar, nullable)
- **nik** (varchar, nullable)
- **no_hp** (varchar, nullable)
- **email_verified_at** (datetime, nullable)
- **created_at**, **updated_at**

### Tabel Utama Lainnya:
- **surat** - Data pengajuan surat desa
- **inventaris** - Data inventaris aset desa
- **pengaduan** - Data pengaduan masyarakat
- **kegiatan** - Data kegiatan desa
- **notifications** - Notifikasi sistem
- **password_reset_tokens** - Token reset password

---

## 🔒 Login Credentials

### Admin Default (Dari Migration)
```
Email: admin@example.com
Password: admin123
Login: /login/admin
```

### Admin Dari Seeder (Jika Dijalankan)
```
Email: ekamarchel@gmail.com
Password: marchelin123
Login: /login/admin
```

### Warga (User Normal)
Harus register di: `/register`

---

## 🛠️ Development Commands

### Artisan Commands Penting
```bash
# Database
php artisan migrate              # Jalankan semua migrations
php artisan migrate:rollback     # Batalkan migrations terakhir
php artisan migrate:refresh      # Reset & jalankan ulang
php artisan db:seed              # Jalankan semua seeders
php artisan db:seed --class=AdminSeeder  # Jalankan seeder tertentu

# Cache
php artisan config:cache         # Cache konfigurasi
php artisan route:cache          # Cache routes
php artisan view:cache           # Cache views
php artisan cache:clear          # Clear semua cache

# Server
php artisan serve                # Jalankan dev server
php artisan tinker               # Interactive shell

# Development
php artisan optimize             # Optimize aplikasi
php artisan storage:link         # Buat storage symlink
```

---

## 📦 Dependencies

### PHP Packages (Key)
- Laravel Framework 11.x
- Doctrine DBAL
- DomPDF
- Mail integration

### NPM Packages (Key)
- Tailwind CSS 4.0
- Vite 7.0
- Laravel Vite Plugin 2.0
- Axios

---

## 🔍 File Struktur Penting

```
sistem-informasi-desa/
├── app/
│   ├── Http/
│   │   ├── Controllers/         # Business logic
│   │   └── Middleware/          # Route middleware
│   ├── Models/                  # Database models
│   └── Providers/               # Service providers
├── routes/
│   ├── web.php                  # Web routes (utama)
│   └── console.php              # Console commands
├── database/
│   ├── migrations/              # Schema migrations
│   ├── seeders/                 # Database seeders
│   └── database.sqlite          # SQLite database
├── resources/
│   ├── views/                   # Blade templates
│   ├── css/                     # Stylesheets
│   └── js/                      # JavaScript
├── config/                      # Konfigurasi aplikasi
├── .env                         # Environment variables
├── composer.json                # PHP dependencies
└── package.json                 # NPM dependencies
```

---

## ⚠️ Troubleshooting

### Database Connection Error
```bash
# Pastikan database file ada:
touch database/database.sqlite

# Jalankan migrations:
php artisan migrate
```

### Storage Permission Error
```bash
# Di Linux/Mac
chmod -R 775 storage bootstrap/cache
chmod -R 775 public/storage
```

### Class Not Found Error
```bash
# Dump autoloader
composer dump-autoload

# Clear config cache
php artisan config:clear
php artisan cache:clear
```

### Blade Template Error
```bash
# Clear view cache
php artisan view:clear
```

---

## ✨ Quality Checks Terakhir

Semua checks dilakukan pada **21 Januari 2026**:
- ✅ Syntax check: OK
- ✅ Database migration: OK
- ✅ Routes configuration: OK
- ✅ File structure: OK
- ✅ Dependencies: OK
- ✅ Configuration caching: OK

**Status: SIAP UNTUK CLONE & DEVELOPMENT** 🎉

---

## 📞 Support & Notes

Jika mengalami masalah:
1. Baca documentation di file markdown lainnya (NOTIFICATION_SYSTEM.md, dll)
2. Check `.env` configuration
3. Clear semua cache: `php artisan cache:clear && php artisan config:clear`
4. Jalankan `php artisan migrate:fresh --seed` untuk reset total

---

**Dokumentasi dibuat dengan ❤️ untuk memudahkan development.**
