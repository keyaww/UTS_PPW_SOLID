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
| **Keya** | Frontend Auth | `views/login.php`, `views/register.php` | Desain form Login dan Register. |
| **Dzammar** | Frontend Dashboard & Feed | `views/dashboard.php`, `views/feed.php` | Mendesain Halaman Dashboard (publik & status login) serta Feed Media Sosial. |

---

## 🔄 Alur Navigasi Rute (Workflow)

```text
Dashboard (Akses awal / Publik, bisa dibuka even belum login)
   │
   ├── [Jika Belum Login] ──> Klik Masuk ──> Route Login (?page=login)
   │                                               │
   │                                         (Submit Valid)
   │                                               ▼
   └── [Jika Sudah Login] <────────────────────────┘ (Langsung ke Dashboard)
          │
          ├── Menampilkan pesan "Anda Berhasil Login!" & Ringkasan Akun
          │
          └── Klik Tombol "Buka Halaman Feed" ──> Route Feed (?page=feed)
```

---

## 🛣️ Dokumentasi Routing (Backend Router)

Seluruh navigasi diatur secara terpusat oleh **`index.php`** menggunakan parameter query `?page=...` (default ke `dashboard`). Sistem ini juga dilengkapi jalan pintas file langsung (*direct URL*).

| Parameter Rute | Direct URL Shortcut | Metode | Akses | File Tampilan | Keterangan |
| :--- | :--- | :--- | :--- | :--- | :--- |
| `?page=dashboard` | `dashboard.php` / `index.php` | `GET` | **Publik** | `views/dashboard.php` | **Halaman Dashboard**. Bisa diakses *even belum login* (status tamu) maupun setelah login (status aktif + tombol ke feed). |
| `?page=login` | `login.php` | `GET` / `POST` | Tamu | `views/login.php` | **Masuk Akun** (Tugas Keya). Memverifikasi kredensial. Jika sukses, langsung diarahkan ke `dashboard`. |
| `?page=register` | `register.php` | `GET` / `POST` | Tamu | `views/register.php` | **Pendaftaran Akun** (Tugas Keya). Menyimpan akun baru ke `data/users.json`. |
| `?page=feed` | `feed.php` | `GET` | **Wajib Login** | `views/feed.php` | **Halaman Feed** (Tugas Dzammar). Menampilkan postingan, cerita, sidebar, dan interaksi medsos. |
| `?page=logout` | `logout.php` | `GET` | Member | - | Menghapus session dan mengarahkan kembali ke dashboard / login. |

### Proteksi Rute (Route Guard):
* **Halaman Dashboard**: Dapat diakses oleh **siapa saja (even belum login)**. Jika belum login, tampil status tamu dan opsi masuk/daftar. Jika sudah login, tampil ucapan selamat *"Anda Berhasil Login!"* dan tombol ke feed.
* **Halaman Feed**: Wajib login (`require_auth`). Jika pengguna yang **belum login** mencoba mengakses, sistem otomatis me-redirect ke `login.php` dengan pesan error: *"Silakan masuk ke akun Anda terlebih dahulu!"*.
* **Halaman Login & Register**: Khusus tamu (`require_guest`). Jika user yang **sudah login** mencoba membuka, sistem otomatis mengarahkannya langsung ke `dashboard.php`.

---

## 📂 Struktur Folder

```text
UTS_PPW_SOLID/
├── index.php             # Router utama (default rute: dashboard)
├── dashboard.php         # Akses langsung dashboard (?page=dashboard)
├── login.php             # Akses langsung login (?page=login)
├── register.php          # Akses langsung register (?page=register)
├── feed.php              # Akses langsung feed (?page=feed)
├── logout.php            # Akses langsung logout (?page=logout)
├── style.css             # File stylesheet CSS utama
├── README.md             # Dokumentasi proyek & alur rute
│
├── includes/
│   ├── auth.php          # Manajemen session, proteksi rute, dan notifikasi flash
│   └── db.php            # Helper flat-file database (baca/tulis data/users.json)
│
├── data/
│   └── users.json        # File JSON penyimpan data akun pengguna
│
└── views/
    ├── dashboard.php     # Template Halaman Dashboard (Publik & Status Login)
    ├── login.php         # [TUGAS KEYA] Template Form Login
    ├── register.php      # [TUGAS KEYA] Template Form Register
    └── feed.php          # [TUGAS DZAMMAR] Template Halaman Feed Medsos
```

---

## 🚀 Cara Menjalankan Proyek di XAMPP

1. Buka **XAMPP Control Panel**, lalu klik **Start** pada modul **Apache** *(MySQL tidak perlu dijalankan)*.
2. Buka browser dan akses:
   ```
   http://localhost/UTS-PPW/UTS_PPW_SOLID/
   ```
   *(Secara default akan langsung membuka halaman Dashboard)*.
3. Akun pengujian default:
   * **Email**: `demo@unj.ac.id` *(atau username: `mahasiswa_unj`)*
   * **Password**: `password123`
