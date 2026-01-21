# 🆘 TROUBLESHOOTING GUIDE

Panduan lengkap untuk mengatasi masalah yang mungkin terjadi setelah clone project.

---

## 1️⃣ DATABASE ERRORS

### Error: "Unable to locate a fixture file"
**Penyebab**: Database file tidak ditemukan  
**Solusi**:
```bash
touch database/database.sqlite
php artisan migrate
```

### Error: "SQLSTATE[HY000]: General error"
**Penyebab**: Database corrupted atau permission issue  
**Solusi**:
```bash
# Windows
php artisan migrate:fresh

# Linux/Mac
chmod -R 775 database/
php artisan migrate:fresh
```

### Error: "Column not found in database"
**Penyebab**: Belum menjalankan migration  
**Solusi**:
```bash
php artisan migrate
php artisan migrate:status  # Cek status
```

---

## 2️⃣ AUTHENTICATION ERRORS

### Error: "Email atau password salah, atau Anda tidak memiliki akses admin"
**Penyebab**: Admin user belum ada atau credentials salah  
**Solusi**:
```bash
# Check database sudah ada admin
php artisan tinker
>>> User::where('role', 'admin')->get();

# Jika kosong, seed admin
php artisan db:seed --class=AdminSeeder
```

### Error: "User not found" saat login
**Penyebab**: Email tidak terdaftar  
**Solusi**:
```bash
# Verify email di database
php artisan tinker
>>> User::all();

# Atau register user baru di /register
```

### Error: "Login tidak redirect ke dashboard"
**Penyebab**: Session tidak tersimpan  
**Solusi**:
```bash
# Clear session
php artisan session:table
php artisan migrate

# Atau edit .env
SESSION_DRIVER=file  # Pastikan file, bukan database
```

---

## 3️⃣ CONFIGURATION ERRORS

### Error: "No application encryption key has been specified"
**Penyebab**: APP_KEY tidak set di .env  
**Solusi**:
```bash
php artisan key:generate
php artisan key:show  # Verify
```

### Error: "Class not found" / "Cannot find controller"
**Penyebab**: Autoloader cache stale  
**Solusi**:
```bash
composer dump-autoload
php artisan clear-compiled
php artisan config:clear
```

### Error: "Route not defined"
**Penyebab**: Routes belum di-cache atau ada typo  
**Solusi**:
```bash
php artisan route:cache
php artisan route:list  # Verify routes
```

---

## 4️⃣ VIEW/TEMPLATE ERRORS

### Error: "View not found" atau "Blade syntax error"
**Penyebab**: Cache view stale atau file tidak ada  
**Solusi**:
```bash
php artisan view:clear
# Verify file ada di resources/views/
```

### Error: "{{$variable}} tidak muncul"
**Penyebab**: Variable tidak di-pass dari controller  
**Solusi**:
```php
// Di controller, pastikan:
return view('nama-view', compact('variable'));
// Atau
return view('nama-view', ['variable' => $value]);
```

---

## 5️⃣ FILE UPLOAD ERRORS

### Error: "File not found" atau "403 Forbidden" untuk files
**Penyebab**: Storage symlink tidak ada  
**Solusi**:
```bash
php artisan storage:link
# Verify
ls -la public/storage  # Linux
dir public\storage    # Windows
```

### Error: Permission denied saat upload
**Penyebab**: Storage folder permission salah  
**Solusi**:
```bash
# Linux/Mac
chmod -R 775 storage/
chmod -R 775 public/storage/

# Windows (Run as Administrator)
icacls storage /grant Users:F /T
icacls public\storage /grant Users:F /T
```

---

## 6️⃣ NOTIFICATION SYSTEM ERRORS

### Error: "Notification not created" atau notification tidak muncul
**Penyebab**: Notifications table tidak exist atau event tidak trigger  
**Solusi**:
```bash
# Verify table
php artisan migrate
php artisan db:table notifications

# Check notification file
ls app/Notifications/
```

### Error: "Queue job failed"
**Penyebab**: Queue driver belum dikonfigurasi  
**Solusi**:
```bash
# .env configuration
QUEUE_CONNECTION=sync  # Untuk development

# Atau check queue
php artisan queue:failed
```

---

## 7️⃣ COMPOSER ERRORS

### Error: "Class declaration error" atau "Package not found"
**Penyebab**: Dependencies belum installed  
**Solusi**:
```bash
composer install
composer update  # Jika ada conflict
```

### Error: "Memory limit reached"
**Penyebab**: Memory tidak cukup untuk composer  
**Solusi**:
```bash
# Increase memory limit
composer install --no-interaction --memory-limit=512M
# Atau di .ini file
php -d memory_limit=-1 -r "require 'vendor/autoload.php'"
```

---

## 8️⃣ NPM/VITE ERRORS

### Error: "npm not found" atau "node_modules missing"
**Penyebab**: Node.js/npm tidak installed  
**Solusi**:
```bash
npm install
npm run dev  # Development
npm run build  # Production
```

### Error: "ENOENT: no such file" pada vite.config.js
**Penyebab**: File vite.config.js missing  
**Solusi**:
```bash
# Verify file exists
ls vite.config.js

# Atau regenerate
npm init -y
npm install vite laravel-vite-plugin
```

---

## 9️⃣ PAGINATION ERRORS

### Error: "Method links does not exist"
**Penyebab**: Pagination tidak di-paginate di controller  
**Solusi**:
```php
// Di controller
$items = Model::paginate(15);  // Bukan all()

// Di view
{{ $items->links() }}
```

---

## 🔟 PERMISSION & ACCESS ERRORS

### Error: "Unauthorized" atau 403 Forbidden
**Penyebab**: User tidak punya role yang tepat atau middleware error  
**Solusi**:
```php
// Check middleware di routes
Route::middleware(['auth', 'role:admin'])->group(function() {
    // Admin routes
});

// Verify user role di database
php artisan tinker
>>> Auth::user()->role
```

### Error: "This action is unauthorized"
**Penyebab**: Authorization policy tidak pass  
**Solusi**:
```php
// Di controller, debug authorization
if (Auth::check()) {
    dump(Auth::user()->role);
}
```

---

## 1️⃣1️⃣ GENERAL TROUBLESHOOTING

### Error: "500 Internal Server Error"
**Solusi Umum**:
```bash
# 1. Clear all cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# 2. Check logs
tail -f storage/logs/laravel.log

# 3. Enable debug
APP_DEBUG=true  # di .env

# 4. Check PHP errors
php -l artisan  # Syntax check
```

### Error: "Connection timed out"
**Solusi**:
```bash
# 1. Restart artisan server
php artisan serve

# 2. Check port
php artisan serve --port=8001

# 3. Check firewall/antivirus blocking
```

### "White screen" atau tidak ada output
**Solusi**:
```bash
# 1. Enable error display
php artisan env  # Check APP_ENV

# 2. Check error log
tail -f storage/logs/laravel.log

# 3. Verify PHP version
php -v  # Minimal 8.1
```

---

## 1️⃣2️⃣ QUICK FIX COMMANDS

Kumpulan commands untuk quick fix:

```bash
# Full reset (HATI-HATI! Akan reset database)
php artisan migrate:fresh --seed

# Clear everything
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Optimize for production
php artisan optimize
php artisan config:cache
php artisan route:cache

# Check health
php artisan tinker
>>> DB::connection()->getPDO();
>>> Cache::put('test', 'works');
>>> Cache::get('test');
>>> Auth::check();

# Re-migrate
php artisan migrate:rollback
php artisan migrate
php artisan db:seed --class=AdminSeeder
```

---

## 1️⃣3️⃣ DEBUG MODE

### Aktifkan debugging:
```bash
# .env
APP_DEBUG=true
LOG_LEVEL=debug

# Jangan lupa di production:
APP_DEBUG=false
```

### Check logs:
```bash
# Real-time
tail -f storage/logs/laravel.log  # Linux/Mac
Get-Content -Tail 50 storage/logs/laravel.log -Wait  # Windows

# Dump debug
dd($variable);  # Halt & dump
dump($variable);  # Dump & continue
```

---

## 1️⃣4️⃣ COMMON ISSUES CHECKLIST

Sebelum cari help, pastikan:
- [ ] .env sudah setup dengan benar
- [ ] Database migrate sudah dijalankan
- [ ] Composer dependencies sudah installed
- [ ] Storage symlink sudah dibuat
- [ ] PHP version minimal 8.1
- [ ] All cache sudah di-clear
- [ ] Database permission OK
- [ ] No syntax error di code Anda

---

## 🆘 JIKA MASIH ERROR

1. **Check logs**: `storage/logs/laravel.log`
2. **Run diagnose**: `php artisan tinker`
3. **Test database**: 
   ```bash
   php artisan tinker
   >>> DB::connection()->getPDO();
   >>> User::all();
   ```
4. **Reset complete**:
   ```bash
   composer install
   php artisan migrate:fresh
   php artisan db:seed --class=AdminSeeder
   ```

---

**Jika semua masih tidak bisa, copy error message lengkap dari `storage/logs/laravel.log`** 📋

---

*Last Updated: 21 January 2026*
