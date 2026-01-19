## Panduan Penggunaan Sistem Notifikasi Admin 📬

Sistem notifikasi telah berhasil diterapkan untuk membantu admin mengetahui ketika ada warga yang mengirimkan pengajuan surat atau pengaduan.

### 📍 Di Mana Notifikasi Ditampilkan?

#### 1. **Sidebar/Menu Utama** (Paling Mudah Dilihat)
- Di menu lateral (kiri), ada menu baru bernama "🔔 Notifikasi"
- Jika ada notifikasi belum dibaca, akan ada **badge merah dengan angka** di sampingnya
- Contoh: **Notifikasi 5** = ada 5 notifikasi belum dibaca

#### 2. **Dashboard Admin** (Halaman Utama)
- Saat admin login, akan langsung melihat **3 notifikasi terbaru**
- Setiap notifikasi menampilkan:
  - Tipe: 📋 untuk Surat atau 💬 untuk Pengaduan
  - Judul dan pesan singkat
  - Tombol "Lihat Surat" atau "Lihat Pengaduan" untuk langsung membuka detail

#### 3. **Halaman Notifikasi Lengkap** (`/admin/notifikasi`)
- Klik menu "Notifikasi" di sidebar
- Lihat **semua notifikasi** dengan detail lengkap
- Bisa menandai notifikasi sebagai "sudah dibaca"
- Bisa menghapus notifikasi yang tidak diperlukan

### 🔔 Kapan Notifikasi Dibuat?

**Notifikasi otomatis dibuat ketika:**

1. **Warga mengajukan surat**
   - Tipe: Surat Domisili, SKTM, Pengantar KTP, Kelahiran, Kematian, dll
   - Notifikasi: "Pengajuan Surat Baru - {Nama Warga} telah mengajukan {Jenis Surat}"

2. **Warga mengirim pengaduan**
   - Notifikasi: "Pengaduan Baru - {Nama Pengirim} telah mengirimkan pengaduan tentang..."

### 🎯 Cara Menggunakan

#### **Melihat Notifikasi Baru**
1. Login sebagai admin
2. Lihat sidebar kiri → menu "Notifikasi"
3. Atau di dashboard akan langsung ada 3 notifikasi terbaru

#### **Membuka Detail Surat/Pengaduan**
1. Dari notifikasi, klik tombol "Lihat Surat" atau "Lihat Pengaduan"
2. Atau klik judul notifikasi
3. Langsung dibuka halaman detail

#### **Menandai Notifikasi sebagai Dibaca**
1. Klik menu "Notifikasi" untuk ke halaman lengkap
2. Setiap notifikasi punya tombol atau bisa diklik langsung
3. Badge count akan berkurang otomatis

#### **Menandai Semua Notifikasi sebagai Dibaca**
1. Di halaman notifikasi, klik tombol "Tandai Semua Dibaca"
2. Semua notifikasi akan berubah status menjadi dibaca
3. Badge count akan hilang

#### **Menghapus Notifikasi**
1. Di halaman notifikasi lengkap, klik tombol 🗑️ (sampah)
2. Notifikasi akan dihapus dari sistem

### 💡 Tips Penggunaan

**✅ Cara terbaik menggunakan notifikasi:**
1. Periksa notifikasi secara berkala (setiap jam kerja)
2. Klik notifikasi untuk langsung membuka detail surat/pengaduan
3. Proses pengajuan dengan cepat
4. Tandai sebagai dibaca setelah ditinjau

**❌ Hal yang tidak perlu:**
- Tidak perlu membuka menu Surat/Pengaduan terpisah, notifikasi sudah link ke situ
- Tidak perlu menyimpan notifikasi, semua riwayat tersimpan di database

### 📊 Status Notifikasi

- **Belum Dibaca** (BARU)
  - Tampilan lebih terang/highlight
  - Termasuk dalam perhitungan badge counter
  - Prioritas utama untuk ditinjau

- **Sudah Dibaca**
  - Tampilan lebih pudar
  - Tidak termasuk dalam badge counter
  - Tetap tersimpan untuk referensi

### 🔄 Auto-Refresh (Opsional)

Untuk update otomatis notifikasi tanpa perlu refresh halaman, admin bisa:
1. Membuka halaman notifikasi di tab terpisah
2. Sistem akan menampilkan notifikasi terbaru saat ada pengajuan baru

### 📞 Troubleshooting

**Q: Badge notifikasi tidak hilang meski sudah dibaca**
A: Coba refresh halaman atau clear browser cache

**Q: Link notifikasi error/tidak bisa dibuka**
A: Pastikan data surat/pengaduan masih ada di database

**Q: Notifikasi tidak muncul sama sekali**
A: Cek apakah sudah ada pengajuan surat/pengaduan baru dari warga

---

**Sistem ini dirancang untuk membuat admin lebih responsif dan efisien dalam melayani warga! 👍**
