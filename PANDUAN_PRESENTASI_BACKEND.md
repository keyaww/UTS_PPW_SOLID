# 🎤 Panduan & Naskah Presentasi: Bagian Backend (UTS PPW)
**Proyek:** SolidMedia - Platform Media Sosial Mahasiswa Ilmu Komputer UNJ  
**Mata Kuliah:** Perancangan & Pemrograman Website (PPW) &mdash; S1 Ilmu Komputer UNJ  
**Peran:** Backend Lead & System Architect (`index.php`, `includes/*`, `data/*`)  

---

## 📌 1. Gambaran Umum Tugas Backend Anda
Sebagai **Backend Developer**, fokus utama Anda adalah **fondasi, logika bisnis, keamanan, dan arsitektur data** aplikasi tanpa mengandalkan framework atau database SQL, sesuai ketentuan ketat ujian:
1. **Front Controller Pattern (Routing Terpusat)** di `index.php`.
2. **Flat-File JSON Database System** di `includes/db.php` & `data/users.json` (Pengganti MySQL).
3. **State & Session Management** di `includes/auth.php` (Session lifecycle, Route Guard, Flash Message).
4. **Keamanan Otentikasi** (Bcrypt `password_hash`, `password_verify`, Sanitasi input XSS).

---

## 🗂️ 2. Poin-Poin Utama yang Harus Anda Bahas (Struktur Presentasi)

| Urutan | Topik Bahasan | File Relevan | Inti yang Disampaikan ke Dosen |
| :---: | :--- | :--- | :--- |
| **1** | **Arsitektur Front Controller & Routing** | `index.php`, direct URL shortcuts | Mengapa navigasi dipusatkan lewat `index.php?page=...`, bagaimana fallback bekerja, dan shortcut file langsung (`dashboard.php`, `login.php`, dll). |
| **2** | **Flat-File JSON Database Engine** | `includes/db.php`, `data/users.json` | Cara sistem membaca, menulis, dan memvalidasi duplikasi data tanpa SQL sesuai batasan tugas. |
| **3** | **Keamanan Otentikasi & Enkripsi** | `includes/db.php`, `index.php` | Penggunaan hashing industri standar `PASSWORD_DEFAULT` (Bcrypt) dan verifikasi aman dari timing attack. |
| **4** | **Route Guard & Session Management** | `includes/auth.php` | Cara kerja proteksi rute (`require_auth()`, `require_guest()`), pembersihan sesi saat logout, dan flash message one-time. |
| **5** | **Alur Sistem & Alasan Desain Rute** | `index.php`, `README.md` | Mengapa alur rute dari Dashboard (publik) &rarr; Login &rarr; Dashboard (status login) &rarr; Feed. |

---

## 🗣️ 3. Naskah Presentasi Lengkap (Script Kata Demi Kata)

### 🔹 Bagian A: Pembukaan (Opening) & Peran
> *"Selamat pagi/siang Bapak/Ibu dosen penguji serta rekan-rekan sekalian.*  
> *Perkenalkan, nama saya **[Nama Anda]**, dan dalam proyek tugas besar UTS PPW SolidMedia ini, peran saya adalah sebagai **Backend Developer & System Architect**.*  
> 
> *Tanggung jawab utama saya adalah merancang arsitektur sistem dari nol murni menggunakan **Native PHP**, memastikan seluruh batasan ujian terpenuhi—yaitu **100% tanpa database SQL, tanpa JavaScript, dan tanpa framework**—namun tetap menghasilkan sistem yang aman, modular, dan handal."*

---

### 🔹 Bagian B: Pembahasan Teknis 1 &mdash; Front Controller Architecture
> *"Pertama, dari segi arsitektur kode di **`index.php`**:*  
> *Kami tidak menggunakan cara lama di mana setiap halaman PHP berdiri sendiri dan rawan duplikasi kode. Sebaliknya, saya mengimplementasikan pola **Front Controller Pattern**.*  
> 
> *Seluruh request pengguna diarahkan ke satu pintu masuk utama, yaitu `index.php`, yang kemudian mendistribusikan halaman melalui query parameter `?page=...`.*  
> *Keunggulannya:*
> 1. *Manajemen session dan koneksi data hanya perlu diinisialisasi satu kali di baris teratas `index.php`.*
> 2. *Jika ada rute yang tidak dikenal atau manipulasi URL, sistem memiliki `default fallback` yang aman mengarahkan kembali ke dashboard.*
> 3. *Kami juga menyediakan direct shortcut wrapper seperti `dashboard.php` dan `feed.php` agar pengguna bisa mengakses URL bersih tanpa merusak mekanisme router terpusat."*

---

### 🔹 Bagian C: Pembahasan Teknis 2 &mdash; Flat-File Database JSON (`includes/db.php`)
> *"Kedua, mengenai penyimpanan data pengguna:*  
> *Sesuai ketentuan ujian bahwa proyek dilarang menggunakan MySQL/SQL, saya merancang **Flat-File Database Engine** di dalam file `includes/db.php` dengan media penyimpanan berkas `data/users.json`.*  
> 
> *Beberapa fungsi inti yang saya bangun:*
> - *`get_all_users()`: Membaca berkas JSON secara aman dan mengonversinya menjadi array asosiatif PHP menggunakan `json_decode(..., true)`.*
> - *`save_all_users()`: Mengunci dan menulis array ke JSON dengan format rapi `JSON_PRETTY_PRINT`.*
> - *`check_user_exists()` & `find_user()`: Fitur validasi sebelum registrasi untuk mencegah duplikasi email dan username. Pencarian login juga bersifat fleksibel, di mana pengguna dapat login menggunakan alamat email maupun username secara case-insensitive.*
> - *Auto-healing: Jika folder `data/` atau file `users.json` belum ada, fungsi otomatis membuat direktori dan file kosong dengan izin akses yang tepat tanpa membuat web error."*

---

### 🔹 Bagian D: Pembahasan Teknis 3 &mdash; Keamanan & Otentikasi Sesi
> *"Ketiga, dari aspek keamanan:*  
> *Meskipun ini proyek native tanpa framework, standar keamanan tetap menjadi prioritas utama:*
> 1. * **Hashing Password Modern**: Kami tidak menyimpan password mentah (plain text) atau MD5 yang rentan. Kami menggunakan fungsi native PHP `password_hash($password, PASSWORD_DEFAULT)` yang berbasis algoritma **Bcrypt** dengan salt otomatis, dan memverifikasinya menggunakan `password_verify()`.*
> 2. * **Sanitasi XSS**: Setiap string input disaring menggunakan `htmlspecialchars(..., ENT_QUOTES, 'UTF-8')` sebelum disimpan.*
> 3. * **Route Protection (Access Control)** di `includes/auth.php`:*
>    - *Fungsi `require_auth()`: Melindungi rute privat seperti `feed.php`. Jika belum login, request langsung dicegat dan diarahkan ke halaman login.*
>    - *Fungsi `require_guest()`: Mencegah pengguna yang sudah login untuk membuka form pendaftaran atau form login kembali.*
> 4. * **Flash Message One-Time**: Sistem notifikasi pesan sukses atau error disimpan di sesi dan langsung dihapus setelah satu kali ditampilkan menggunakan pola `PRG (Post/Redirect/Get)` agar terhindar dari form resubmission saat refresh."*

---

### 🔹 Bagian E: Pembahasan Teknis 4 &mdash; Alur Navigasi Dashboard & Feed
> *"Keempat, mengenai alur aplikasi yang baru saja kami finalisasi:*  
> - *Halaman **Dashboard** dirancang fleksibel: dapat diakses secara publik bahkan sebelum login (sebagai etalase informasi dan status tamu), maupun setelah login.*  
> - *Ketika pengguna masuk via form login, sistem memvalidasi data ke JSON, men-generate sesi aktif, lalu mengarahkan ke Dashboard dengan kartu status **'Anda Berhasil Login!'**.*  
> - *Dari Dashboard tersebut, tersedia tombol utama yang jelas untuk menuju ke **Halaman Feed**, di mana seluruh konten media sosial rekan-rekan ditampilkan.*  
> - *Saat pengguna logout, fungsi `logout_user()` secara tuntas mengosongkan array `$_SESSION`, mematikan session cookie di browser, dan menghancurkan sesi di server."*

---

### 🔹 Bagian F: Penutup (Closing) & Oper ke Anggota Tim
> *"Demikian arsitektur backend, manajemen database flat-file, dan sistem keamanan yang telah saya bangun untuk proyek SolidMedia.*  
> *Selanjutnya, untuk implementasi antarmuka form Login/Register akan dijelaskan oleh rekan saya **Keya**, dan desain interaktif Feed Medsos akan dipaparkan oleh **Dzammar**.*  
> *Terima kasih."*

---

## 🎯 4. Antisipasi Pertanyaan Dosen (Q&A Defense)

Siapkan jawaban-jawaban ini jika dosen menguji pemahaman backend Anda:

### ❓ Pertanyaan 1: *"Kenapa tidak pakai file `.php` terpisah saja untuk setiap halaman, kenapa harus lewat `index.php`?"*
> **Jawaban:**  
> *"Dengan arsitektur **Front Controller** di `index.php`, kami memiliki satu titik kontrol terpusat (single entry point). Ini mencegah celah keamanan di mana pengguna mengakses file view langsung tanpa melewati pengecekan sesi. Selain itu, dependensi seperti `auth.php` dan session handling cukup di-*load* satu kali di awal, sehingga kode jauh lebih rapi, terstruktur (DRY - Don't Repeat Yourself), dan mudah dimaintenance."*

---

### ❓ Pertanyaan 2: *"Bagaimana kalian menjamin keamanan password di dalam file JSON?"*
> **Jawaban:**  
> *"Kami menggunakan fungsi bawaan PHP 8 yaitu `password_hash($password, PASSWORD_DEFAULT)` yang menerapkan algoritma hashing **Bcrypt**. Hashing ini satu arah (one-way), menggunakan cost factor adaptif, dan secara otomatis menghasilkan random cryptographic salt untuk setiap akun. Jadi, sekalipun file `users.json` terbaca, password asli tidak dapat didekripsi atau di-crack menggunakan rainbow table sederhana."*

---

### ❓ Pertanyaan 3: *"Apa itu Flash Message dan bagaimana cara kerjanya tanpa JavaScript?"*
> **Jawaban:**  
> *"Flash message adalah mekanisme pesan sekali pakai yang disimpan sementara di dalam `$_SESSION['flash']`. Ketika halaman berikutnya dimuat, fungsi `get_flash()` mengambil isi pesan tersebut dan langsung memanggil `unset($_SESSION['flash'])`. Ketika halaman di-refresh untuk kedua kalinya, pesan sudah otomatis hilang murni dengan siklus hidup PHP Native tanpa bantuan library atau script JS apa pun."*

---

### ❓ Pertanyaan 4: *"Bagaimana cara kerja logout yang benar di PHP native?"*
> **Jawaban:**  
> *"Logout yang aman tidak cukup hanya `session_destroy()`. Di fungsi `logout_user()` pada `includes/auth.php`, kami melakukan 4 tahapan:*  
> 1. *Mengosongkan variabel sesi di memori: `$_SESSION = []`.*  
> 2. *Menghapus cookie sesi dari browser klien dengan menyetel masa kedaluwarsanya ke waktu lampau (`time() - 42000`).*  
> 3. *Menghancurkan data sesi di server dengan `session_destroy()`.*  
> 4. *Membuat sesi baru yang bersih untuk menaruh flash info 'Anda telah berhasil keluar' sebelum redirect ke login."*

---

## 💻 5. Checklist Demo Live Saat Presentasi

Saat giliran Anda mendemokan bagian backend di hadapan dosen:
1. **Buka file `data/users.json` di VS Code**:
   - Tunjukkan struktur JSON yang rapi.
   - Sorot kolom password yang sudah berupa hash Bcrypt (`$2y$10$...`), jelaskan bahwa password terenkripsi aman.
2. **Uji Coba Validasi**:
   - Coba login dengan password salah &rarr; tunjukkan pesan flash error warna merah muncul tanpa error sistem.
   - Coba register dengan email yang sudah ada &rarr; tunjukkan sistem menolak duplikasi email/username.
3. **Uji Coba Route Guard**:
   - Logout terlebih dahulu.
   - Coba ketik URL langsung di browser: `http://localhost/UTS-PPW/UTS_PPW_SOLID/feed.php` &rarr; tunjukkan bahwa sistem otomatis menolak dan me-redirect ke login dengan pesan *"Silakan masuk ke akun Anda terlebih dahulu!"*.
   - Login kembali &rarr; tunjukkan bahwa pengguna diarahkan ke Dashboard dengan status *"Anda Berhasil Login!"*, lalu klik tombol *"Buka Halaman Feed"* untuk membuktikan hak akses terbuka.
