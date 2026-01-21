# 📖 PANDUAN CLONE & SETUP

Dokumentasi lengkap untuk clone dan setup project di environment baru.

---

## 🎯 PRASYARAT

Sebelum clone, pastikan sudah install:

### Windows
- [ ] **Git** - https://git-scm.com/download/win
- [ ] **PHP 8.1+** - https://www.php.net/downloads
- [ ] **Composer** - https://getcomposer.org/download/
- [ ] **Node.js (opsional)** - https://nodejs.org/

Verifikasi:
```powershell
php --version
composer --version
git --version
```

### Linux/Mac
```bash
# Ubuntu/Debian
sudo apt update
sudo apt install php php-curl php-mbstring composer git

# macOS
brew install php composer git
```

Verifikasi:
```bash
php -v
composer -v
git --version
```

---

## 📥 LANGKAH 1: CLONE REPOSITORY

```bash
# Navigate ke folder project
cd C:\your-projects  # atau /home/user/projects

# Clone repository
git clone https://github.com/your-username/sistem-informasi-desa.git
cd sistem-informasi-desa

# Atau jika copy folder
# Copy folder ke project directory
# cd sistem-informasi-desa
```

---

## 🔧 LANGKAH 2: SETUP ENVIRONMENT

### 2.1 Copy Environment File
```bash
# Copy .env template jika ada
cp .env.example .env

# Atau jika tidak ada, buat file baru
# (Sudah ada di repository, cukup verify)
```

### 2.2 Verify .env Configuration
```bash
# Buka .env dan pastikan:
# - APP_NAME=Laravel (atau nama app)
# - APP_ENV=local (untuk development)
# - APP_DEBUG=true (untuk development)
# - APP_KEY=base64:... (sudah ada)
# - DB_CONNECTION=sqlite
```

---

## 📦 LANGKAH 3: INSTALL DEPENDENCIES

### 3.1 PHP Dependencies
```bash
# Install composer packages
composer install

# Atau dengan no-interaction flag
composer install --no-interaction
```

Tunggu beberapa menit hingga selesai. Output akan terlihat seperti:
```
Installing dependencies from lock file
...
</generating autoload files
✓ Done!
```

### 3.2 Generate APP_KEY (Jika Perlu)
```bash
php artisan key:generate
```

Verify:
```bash
php artisan config:show APP_KEY
```

### 3.3 NPM Dependencies (Opsional)
Hanya perlu jika ingin build frontend assets:
```bash
npm install
```

---

## 🗄️ LANGKAH 4: SETUP DATABASE

### 4.1 Jalankan Migrations
```bash
# Jalankan semua pending migrations
php artisan migrate

# Verify status
php artisan migrate:status
```

Expected output:
```
  Migration name ................................................... Batch / Status
  0001_01_01_000000_create_users_table ................................... [1] Ran
  0001_01_01_000001_create_cache_table ................................... [1] Ran
  ...
  2026_01_19_add_status_to_pengaduan ..................................... [1] Ran
```

### 4.2 Seed Default Data
```bash
# Seed admin default (opsional)
php artisan db:seed --class=AdminSeeder

# Atau seed semua
php artisan db:seed
```

Verify:
```bash
php artisan tinker
>>> User::all();
```

---

## 🚀 LANGKAH 5: JALANKAN APPLICATION

### 5.1 Start Development Server
```bash
php artisan serve
```

Output akan terlihat seperti:
```
  INFO  Server running on [http://127.0.0.1:8000].

  Press Ctrl+C to quit.
```

### 5.2 Buka di Browser
```
http://localhost:8000
```

Atau jika port 8000 sudah terpakai:
```bash
php artisan serve --port=8001
# Akses: http://localhost:8001
```

### 5.3 Start Vite Dev Server (Opsional, untuk frontend)
Di terminal berbeda:
```bash
npm run dev
```

---

## 🔐 LANGKAH 6: LOGIN & VERIFY

### 6.1 Akses Aplikasi
```
Home: http://localhost:8000/
Admin Login: http://localhost:8000/login/admin
User Login: http://localhost:8000/login
```

### 6.2 Login Admin Default
Credentials dari migration (auto-created):
```
Email: admin@example.com
Password: admin123
```

Atau jika di-seed:
```
Email: ekamarchel@gmail.com
Password: marchelin123
```

### 6.3 Verify Features
- [ ] Admin login berhasil
- [ ] Dashboard dapat diakses
- [ ] Inventaris dapat diakses
- [ ] Surat dapat diakses
- [ ] Pengaduan dapat diakses

---

## 📊 STORAGE SETUP (Jika Diperlukan)

Symlink sudah dibuat, tapi jika perlu membuat ulang:

```bash
# Buat storage symlink
php artisan storage:link

# Verify
ls -la public/storage  # Linux/Mac
dir public\storage     # Windows
```

---

## 🔍 VERIFIKASI SETUP

Jalankan checks untuk memastikan setup OK:

```bash
# Check database connection
php artisan tinker
>>> DB::connection()->getPDO()
# Should output: PDOStatement

# Check users
>>> User::all()
# Should show admin user

# Check cache
>>> Cache::put('test', 'works')
>>> Cache::get('test')
# Should output: "works"

# Exit tinker
>>> exit
```

---

## 📝 DEVELOPMENT WORKFLOW

### Sehari-hari Development:

1. **Start Server**
   ```bash
   php artisan serve
   ```

2. **Start Frontend Build (Opsional)**
   ```bash
   npm run dev
   ```

3. **Make Changes**
   - Edit PHP code, view akan auto-reload
   - Edit CSS/JS, perlu build dengan Vite

4. **Test Changes**
   - Buka browser: http://localhost:8000
   - Test fitur yang diubah

5. **Stop Server**
   ```bash
   Ctrl+C
   ```

---

## 🐛 DEBUGGING

### Enable Debug Mode
Pastikan di .env:
```env
APP_DEBUG=true
LOG_LEVEL=debug
```

### Check Logs
```bash
# Real-time tail (Linux/Mac)
tail -f storage/logs/laravel.log

# Windows PowerShell
Get-Content -Tail 50 storage/logs/laravel.log -Wait
```

### Laravel Tinker
```bash
php artisan tinker

# Explore
>>> User::all()
>>> User::first()
>>> DB::table('users')->first()
>>> exit
```

---

## 🔄 COMMON TASKS

### Reset Database
```bash
# Rollback all migrations
php artisan migrate:rollback

# Run migrations again
php artisan migrate

# Or one command
php artisan migrate:refresh
```

### Full Fresh Start
```bash
php artisan migrate:fresh --seed
```

### Clear All Caches
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

### Generate Assets (Production)
```bash
npm run build
```

---

## 🚨 TROUBLESHOOTING

### Error: "Connection refused"
```bash
# Pastikan server running
php artisan serve

# Atau check port
php artisan serve --port=8001
```

### Error: "Database not found"
```bash
# Create database file
touch database/database.sqlite

# Run migrations
php artisan migrate
```

### Error: "Call to undefined method"
```bash
# Clear autoloader
composer dump-autoload

# Clear all cache
php artisan config:clear
```

### Error: "No such file or directory"
```bash
# Verify folder structure
ls app/Http/Controllers
ls resources/views

# Check .env
cat .env | grep APP_NAME
```

---

## 📚 DOKUMENTASI LEBIH LANJUT

Baca dokumentasi tambahan:
- **SETUP_DEVELOPMENT.md** - Panduan development detail
- **TROUBLESHOOTING.md** - Solusi common issues
- **PROJECT_VALIDATION_REPORT.md** - Validation report
- **README.md** - Project overview
- **NOTIFICATION_SYSTEM.md** - Notification setup

---

## 💡 TIPS & TRICKS

### 1. Port Berbeda
```bash
php artisan serve --host=0.0.0.0 --port=8000
# Akses dari device lain di network yang sama
# http://your-ip:8000
```

### 2. Database Browser
```bash
# Inspect database dengan command
php artisan db:table users
php artisan db:table surat
```

### 3. Route Listing
```bash
php artisan route:list | grep -i surat
```

### 4. Backup Database
```bash
# Copy database file
cp database/database.sqlite database/database.backup.sqlite
```

### 5. Quick Test User Creation
```bash
php artisan tinker
>>> User::create(['name' => 'Test', 'email' => 'test@example.com', 'password' => Hash::make('password'), 'role' => 'warga'])
>>> exit
```

---

## 🎓 NEXT STEPS

1. ✅ Clone project
2. ✅ Setup environment
3. ✅ Install dependencies
4. ✅ Migrate database
5. ✅ Start server
6. 📝 Read other documentation
7. 💻 Start development
8. 🚀 Deploy to production

---

## 📞 BANTUAN

Jika mengalami masalah:

1. **Check logs**: `storage/logs/laravel.log`
2. **Read docs**: TROUBLESHOOTING.md
3. **Test database**: `php artisan tinker`
4. **Clear cache**: `php artisan cache:clear`
5. **Fresh install**: `php artisan migrate:fresh --seed`

---

**Happy Coding! 🚀**

*Last Updated: 21 Januari 2026*
