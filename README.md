# Project UTS - Perancangan & Pemrograman Website

Project Ujian Tengah Semester (UTS) Ganjil 125 - S1 Ilmu Komputer, Universitas Negeri Jakarta.

---

## ⚠️ Batasan & Ketentuan Pengerjaan
Sesuai instruksi soal ujian:
* ❌ **Tanpa JavaScript sama sekali**
* ❌ **Tanpa Database SQL** (MySQL, SQLite, PostgreSQL, dll)
* ❌ **Tanpa Framework** (Bootstrap, Tailwind, Laravel, dll)
* ✔️ **100% Pure HTML5, Pure CSS3, dan Pure Native PHP**

---

## 👥 Pembagian Tugas Kelompok

| Anggota | Peran | File Tugas | Deskripsi Pekerjaan |
| :--- | :--- | :--- | :--- |
| **Backend Lead** | Backend & Routing | `index.php`, `includes/*`, `data/*` | Mengatur arsitektur rute, proteksi sesi, validasi form, dan database JSON. |
| **Keya** | Frontend Auth | `views/login.php`, `views/register.php` | Desain form Login dan Register (UI Card murni HTML & CSS). |
| **Sakha** | Frontend Landing | `views/home.php` | Mendesain Halaman Awal / Beranda pengenalan website. |
| **Dzammar** | Frontend Feed | `views/dashboard.php` | Mendesain Halaman Berhasil Login (Feed medsos ala Instagram/Facebook). |

---

## 🛣️ Dokumentasi Routing (Backend Router)

Seluruh navigasi diatur secara terpusat oleh **`index.php`** menggunakan parameter query `?page=...`. Sistem ini juga dilengkapi jalan pintas file langsung (*direct URL*).

| Parameter Rute | Direct URL Shortcut | Metode | Akses | File Tampilan | Keterangan |
| :--- | :--- | :--- | :--- | :--- | :--- |
| `?page=home` | `index.php` | `GET` | Publik | `views/home.php` | **Halaman Awal** (Tugas Sakha). Halaman pembuka website. |
| `?page=register` | `register.php` | `GET` / `POST` | Tamu | `views/register.php` | **Pendaftaran Akun** (Tugas Keya). Menyimpan akun baru ke `data/users.json`. |
| `?page=login` | `login.php` | `GET` / `POST` | Tamu | `views/login.php` | **Masuk Akun** (Tugas Keya). Memverifikasi kredensial dan set session. |
| `?page=dashboard` | `dashboard.php` | `GET` | **Wajib Login** | `views/dashboard.php` | **Halaman Berhasil Login** (Tugas Dzammar). Menampilkan feed pengguna. |
| `?page=logout` | `logout.php` | `GET` | Member | - | Menghapus session dan mengarahkan kembali ke login. |

### Proteksi Rute (Route Guard):
* **Halaman Dashboard**: Jika user yang **belum login** mencoba membuka `dashboard.php`, sistem otomatis menolak akses dan me-redirect ke `login.php` dengan pesan error: *"Silakan masuk ke akun Anda terlebih dahulu!"*.
* **Halaman Login & Register**: Jika user yang **sudah login** mencoba membuka halaman ini, sistem otomatis mengarahkannya langsung ke `dashboard.php`.

---

## 📂 Struktur Folder

```text
UTS_PPW_SOLID/
├── index.php             # Router utama & pengendali rute
├── login.php             # Akses langsung login (?page=login)
├── register.php          # Akses langsung register (?page=register)
├── dashboard.php         # Akses langsung dashboard (?page=dashboard)
├── logout.php            # Akses langsung logout (?page=logout)
├── style.css             # File stylesheet CSS utama
├── README.md             # Dokumentasi proyek & rute
│
├── includes/
│   ├── auth.php          # Manajemen session, proteksi rute, dan notifikasi flash
│   └── db.php            # Helper flat-file database (baca/tulis data/users.json)
│
├── data/
│   └── users.json        # File JSON penyimpan data akun pengguna
│
└── views/
    ├── home.php          # [TUGAS SAKHA] Template Halaman Awal
    ├── login.php         # [TUGAS KEYA] Template Form Login
    ├── register.php      # [TUGAS KEYA] Template Form Register
    └── dashboard.php     # [TUGAS DZAMMAR] Template Halaman Berhasil Login
```

---

## 🛠️ Panduan Untuk Anggota Tim

### 1. Untuk Sakha (Halaman Awal):
* Buka file: **`views/home.php`**.
* Silakan kembangkan desain beranda di area yang sudah ditandai `[Area Tugas Sakha]`.
* Tambahkan informasi fitur platform, tagline menarik, banner, atau elemen visual lainnya.
* Styling CSS bisa ditambahkan di file `style.css`.

### 2. Untuk Dzammar (Halaman Berhasil Login):
* Buka file: **`views/dashboard.php`**.
* Silakan buat tampilan feed media sosial di area yang sudah ditandai `[Area Tugas Dzammar]`.
* Anda bisa mencontoh layout Instagram / Facebook (misal: Stories lingkaran di atas, kartu postingan dengan gambar, tombol like/komentar, dan sidebar kanan).
* Data akun pengguna yang sedang login tersedia di variabel PHP: `$currentUser['name']`, `$currentUser['username']`, dan `$currentUser['email']`.

---

## 🚀 Cara Menjalankan Proyek di XAMPP

1. Buka **XAMPP Control Panel**, lalu klik **Start** pada modul **Apache** *(MySQL tidak perlu dijalankan)*.
2. Buka browser dan akses:
   ```
   http://localhost/UTS-PPW/UTS_PPW_SOLID/
   ```
3. Akun pengujian default:
   * **Email**: `demo@unj.ac.id` *(atau username: `mahasiswa_unj`)*
   * **Password**: `password123`
