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
| **Dzammar** | Frontend Dashboard & Feed | `views/dashboard.php`, `views/feed.php` | Mendesain Halaman Dashboard (ringkasan status) dan Feed Media Sosial. |

---

## 🔄 Alur Navigasi Rute (Workflow)

```text
Halaman Awal / Beranda (views/home.php)
   │
   ├── [Jika Belum Login] ──> Masuk (views/login.php) / Daftar (views/register.php)
   │                               │
   │                         (Submit Valid)
   │                               ▼
   └── [Jika Sudah Login] ──> Dashboard (views/dashboard.php)
                                   │
                                   └── Klik "Buka Halaman Feed" ──> Feed Medsos (views/feed.php)
```

---

## 🛣️ Dokumentasi Routing (Backend Router)

Seluruh navigasi diatur secara terpusat oleh **`index.php`** menggunakan parameter query `?page=...` (default ke `home`). Sistem ini juga dilengkapi jalan pintas file langsung (*direct URL*).

| Parameter Rute | Direct URL Shortcut | Metode | Akses | File Tampilan | Keterangan |
| :--- | :--- | :--- | :--- | :--- | :--- |
| `?page=home` | `home.php` / `index.php` | `GET` | **Publik** | `views/home.php` | **Halaman Awal** (Tugas Sakha). Halaman pembuka website. |
| `?page=dashboard` | `dashboard.php` | `GET` | **Publik** | `views/dashboard.php` | **Halaman Dashboard** (Tugas Dzammar). Menampilkan status selamat datang & ringkasan akun. |
| `?page=login` | `login.php` | `GET` / `POST` | Tamu | `views/login.php` | **Masuk Akun** (Tugas Keya). Memverifikasi kredensial. Jika sukses, diarahkan ke `dashboard`. |
| `?page=register` | `register.php` | `GET` / `POST` | Tamu | `views/register.php` | **Pendaftaran Akun** (Tugas Keya). Menyimpan akun baru ke `data/users.json`. |
| `?page=feed` | `feed.php` | `GET` | **Wajib Login** | `views/feed.php` | **Halaman Feed** (Tugas Dzammar). Menampilkan feed medsos, cerita, komentar, dan trending. |
| `?page=logout` | `logout.php` | `GET` | Member | - | Menghapus session dan mengarahkan kembali ke halaman awal / login. |

### Proteksi Rute (Route Guard):
* **Halaman Feed**: Wajib login (`require_auth`). Jika pengguna yang **belum login** mencoba mengakses, sistem otomatis me-redirect ke `login.php` dengan pesan error: *"Silakan masuk ke akun Anda terlebih dahulu!"*.
* **Halaman Login & Register**: Khusus tamu (`require_guest`). Jika user yang **sudah login** mencoba membuka, sistem otomatis mengarahkannya langsung ke `dashboard.php`.
* **Halaman Beranda & Dashboard**: Dapat diakses publik (*even belum login*) dengan tampilan yang responsif menyesuaikan status sesi login pengguna.

---

## 📂 Struktur Folder

```text
UTS_PPW_SOLID/
├── index.php             # Router utama & pengendali rute (default ke home)
├── home.php              # Akses langsung beranda (?page=home)
├── login.php             # Akses langsung login (?page=login)
├── register.php          # Akses langsung register (?page=register)
├── dashboard.php         # Akses langsung dashboard (?page=dashboard)
├── feed.php              # Akses langsung feed (?page=feed)
├── logout.php            # Akses langsung logout (?page=logout)
├── style.css             # File stylesheet CSS utama (terintegrasi)
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
    ├── home.php          # [TUGAS SAKHA] Template Halaman Awal / Beranda
    ├── login.php         # [TUGAS KEYA] Template Form Login
    ├── register.php      # [TUGAS KEYA] Template Form Register
    ├── dashboard.php     # [TUGAS DZAMMAR] Template Halaman Status Dashboard
    └── feed.php          # [TUGAS DZAMMAR] Template Halaman Feed Medsos
```

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
