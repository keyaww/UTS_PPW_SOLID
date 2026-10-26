<?php
// Ini tugas Sakha
$currentUser = is_logged_in() ? get_current_user_data() : null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SolidMedia - Ruang kumpul anak Ilkom UNJ</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Instrument+Sans:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body class="full-layout home-page">

  <!-- Navbar -->
  <header class="site-navbar">
    <div class="navbar-container">
      <a href="index.php?page=home" class="brand-logo">SolidMedia</a>

      <nav class="navbar-nav">
        <a href="index.php?page=home" class="nav-link">Beranda</a>
        <a href="#isi" class="nav-link hm-nav-anchor">Isi</a>
        <a href="#mulai" class="nav-link hm-nav-anchor">Mulai</a>
        <a href="#tanya" class="nav-link hm-nav-anchor">Tanya</a>

        <?php if ($currentUser): ?>
          <a href="index.php?page=dashboard" class="nav-btn-primary">Ke Dashboard</a>
          <a href="index.php?page=logout" class="nav-btn-outline">Keluar</a>
        <?php else: ?>
          <a href="index.php?page=login" class="nav-btn-outline">Masuk</a>
          <a href="index.php?page=register" class="nav-btn-primary">Daftar</a>
        <?php endif; ?>
      </nav>
    </div>
  </header>

  <main class="hm-main">

    <!-- [Area Tugas Sakha]  HERO -->
    <section class="hm-hero">
      <div class="hm-wrap hm-hero-grid">

        <div class="hm-hero-text">
          <p class="hm-mono hm-kicker">Ilmu Komputer &middot; Universitas Negeri Jakarta</p>
          <h1 class="hm-title">
            Tempat anak Ilkom saling <em>tukar kabar</em>, bukan sekadar scroll.
          </h1>
          <p class="hm-lead">
            SolidMedia adalah media sosial kecil untuk satu jurusan. Tulis
            catatan, tanya soal tugas, dan lihat apa yang sedang dikerjakan
            teman seangkatan, satu feed - satu kabar.
          </p>

          <div class="hm-cta-row">
            <?php if ($currentUser): ?>
              <a href="index.php?page=dashboard" class="hm-btn hm-btn-solid">
                Lanjut ke feed, <?= htmlspecialchars($currentUser['name']) ?>
              </a>
            <?php else: ?>
              <a href="index.php?page=register" class="hm-btn hm-btn-solid">Buat akun</a>
              <a href="index.php?page=login" class="hm-btn hm-btn-line">Sudah punya akun? Masuk</a>
            <?php endif; ?>
          </div>
        </div>

        <!-- Contoh tampilan feed -->
        <figure class="hm-preview" aria-label="Contoh tampilan feed">
          <figcaption class="hm-mono">contoh tampilan feed</figcaption>

          <article class="hm-post">
            <header>
              <span class="hm-initial">R</span>
              <div>
                <strong>Rani</strong>
                <span class="hm-mono">@rani &middot; 14.02</span>
              </div>
            </header>
            <p>Catatan session PHP minggu ini sudah saya rapikan. Ada yang mau salin sebelum UTS?</p>
            <footer class="hm-mono">
              <span>12 suka</span><span>4 balasan</span>
            </footer>
          </article>

          <article class="hm-post hm-post-reply">
            <header>
              <span class="hm-initial">B</span>
              <div>
                <strong>Bagas</strong>
                <span class="hm-mono">@bagas &middot; 14.09</span>
              </div>
            </header>
            <p>Mau banget. Boleh dikirim ke feed saja biar yang lain juga lihat?</p>
          </article>
        </figure>

      </div>
    </section>

    <!-- ISI -->
    <section id="isi" class="hm-section">
      <div class="hm-wrap hm-split">
        <div class="hm-split-head">
          <p class="hm-mono hm-kicker">01 &mdash; isi</p>
          <h2>Yang kamu dapat di dalamnya</h2>
          <p class="hm-muted">Sengaja sedikit. Setiap fitur ada karena dipakai sehari-hari di kelas.</p>
        </div>

        <ol class="hm-list">
          <li>
            <span class="hm-num hm-mono">01</span>
            <div>
              <h3>Postingan singkat</h3>
              <p>Tulis kabar, pertanyaan, atau pengumuman kelas. Tampil berurutan di feed, yang terbaru di atas.</p>
            </div>
            <span class="hm-tag hm-mono">feed</span>
          </li>
          <li>
            <span class="hm-num hm-mono">02</span>
            <div>
              <h3>Balasan di bawah postingan</h3>
              <p>Diskusi tugas tetap berada di satu tempat, tidak tercecer di grup chat yang panjang.</p>
            </div>
            <span class="hm-tag hm-mono">diskusi</span>
          </li>
          <li>
            <span class="hm-num hm-mono">03</span>
            <div>
              <h3>Suka dan bagikan</h3>
              <p>Beri tanda untuk catatan yang berguna supaya mudah ditemukan teman lain.</p>
            </div>
            <span class="hm-tag hm-mono">apresiasi</span>
          </li>
          <li>
            <span class="hm-num hm-mono">04</span>
            <div>
              <h3>Profil sederhana</h3>
              <p>Nama, username, dan email. Cukup untuk saling kenal tanpa mengisi formulir panjang.</p>
            </div>
            <span class="hm-tag hm-mono">akun</span>
          </li>
          <li>
            <span class="hm-num hm-mono">05</span>
            <div>
              <h3>Halaman pribadi yang terkunci</h3>
              <p>Dashboard hanya bisa dibuka setelah masuk. Kalau belum login, kamu diarahkan ke halaman masuk.</p>
            </div>
            <span class="hm-tag hm-mono">sesi</span>
          </li>
        </ol>
      </div>
    </section>

    <!-- How To Start -->
    <section id="mulai" class="hm-section hm-section-ink">
      <div class="hm-wrap">
        <p class="hm-mono hm-kicker">02 &mdash; mulai</p>
        <h2 class="hm-h2-lg">Tiga langkah, lalu kamu sudah di dalam.</h2>

        <ol class="hm-steps">
          <li>
            <span class="hm-mono">langkah 01</span>
            <h3>Daftar</h3>
            <p>Isi nama, username, email, dan kata sandi.</p>
          </li>
          <li>
            <span class="hm-mono">langkah 02</span>
            <h3>Masuk</h3>
            <p>Login dengan akunmu. Sesi dijaga sampai kamu keluar.</p>
          </li>
          <li>
            <span class="hm-mono">langkah 03</span>
            <h3>Ikut ngobrol</h3>
            <p>Buka feed, baca kabar teman, lalu tulis kabarmu sendiri.</p>
          </li>
        </ol>
      </div>
    </section>

    <!--  FAQ  -->
    <section id="tanya" class="hm-section">
      <div class="hm-wrap hm-split">
        <div class="hm-split-head">
          <p class="hm-mono hm-kicker">03 &mdash; tanya</p>
          <h2>Pertanyaan yang sering muncul</h2>
        </div>

        <div class="hm-faq-list">
          <details class="hm-faq" open>
            <summary>Apakah SolidMedia berbayar?</summary>
            <p>Tidak. Ini proyek kuliah, jadi semua fitur bisa dipakai tanpa biaya.</p>
          </details>
          <details class="hm-faq">
            <summary>Siapa yang boleh bergabung?</summary>
            <p>Dibuat untuk mahasiswa Ilmu Komputer UNJ, tetapi pendaftaran terbuka untuk siapa saja yang ingin mencoba.</p>
          </details>
          <details class="hm-faq">
            <summary>Di mana data akun disimpan?</summary>
            <p>Di sebuah file JSON pada server proyek. Tidak ada database SQL, sesuai ketentuan tugas.</p>
          </details>
          <details class="hm-faq">
            <summary>Dibangun dengan apa?</summary>
            <p>HTML5, CSS3, dan PHP native. Tanpa JavaScript dan tanpa framework.</p>
          </details>
        </div>
      </div>
    </section>

    <!-- AJAKAN  -->
    <section class="hm-wrap">
      <div class="hm-cta-block">
        <h2>Ada kabar dari kelas hari ini?<br><em>Mulai dari sini.</em></h2>
        <?php if ($currentUser): ?>
          <a href="index.php?page=dashboard" class="hm-btn hm-btn-accent">Buka dashboard</a>
        <?php else: ?>
          <a href="index.php?page=register" class="hm-btn hm-btn-accent">Buat akun sekarang</a>
        <?php endif; ?>
      </div>
    </section>

  </main>
  

  <footer class="hm-footer">
    <div class="hm-wrap hm-footer-grid">
      <div>
        <a href="index.php?page=home" class="brand-logo">SolidMedia</a>
        <p class="hm-muted">Media sosial mahasiswa Ilmu Komputer UNJ.</p>
      </div>
      <nav aria-label="Jelajahi">
        <h4 class="hm-mono">jelajahi</h4>
        <a href="#isi">Isi</a>
        <a href="#mulai">Mulai</a>
        <a href="#tanya">Tanya</a>
      </nav>
      <nav aria-label="Akun">
        <h4 class="hm-mono">akun</h4>
        <?php if ($currentUser): ?>
          <a href="index.php?page=dashboard">Dashboard</a>
          <a href="index.php?page=logout">Keluar</a>
        <?php else: ?>
          <a href="index.php?page=login">Masuk</a>
          <a href="index.php?page=register">Daftar</a>
        <?php endif; ?>
      </nav>
    </div>
    <p class="hm-copy hm-mono">&copy; <?= date('Y') ?> SolidMedia &mdash; UTS Perancangan dan Pemrograman Website</p>
  </footer>

</body>
</html>e