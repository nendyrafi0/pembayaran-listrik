# ⚡ Aplikasi Pembayaran Listrik Pascabayar

Aplikasi web Laravel untuk mengelola pembayaran listrik pascabayar. Mendukung tiga level pengguna: `superadmin`, `admin`, dan `pengguna` (pelanggan).

---

## 🧩 Fitur Utama

### 👑 Superadmin
- Mengelola akun admin
- Melihat semua data pengguna dan transaksi

### 🛠️ Admin
- Menambahkan & mengelola data pelanggan
- Input data penggunaan listrik (per bulan)
- Membuat & mengelola tagihan otomatis
- Mencatat pembayaran dari pengguna
- Mencetak laporan penggunaan dan pembayaran

### 👤 Pengguna (Pelanggan)
- Melihat daftar tagihan listrik bulanan
- Melakukan pembayaran tagihan secara langsung
- Melihat riwayat pembayaran
- Mencetak bukti pembayaran

---

## ⚙️ Teknologi Digunakan

- **Framework**: Laravel
- **Templating**: Blade + Tailwind CSS
- **Database**: MySQL/MariaDB
- **Autentikasi**: Laravel Auth
- **Middleware**: Role-based access control (`IsSuperadmin`, `IsAdmin`, `IsPelanggan`)

