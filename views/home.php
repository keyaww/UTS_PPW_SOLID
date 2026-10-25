<?php
// Ini tugas Sakha
$currentUser = is_logged_in() ? get_current_user_data() : null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Awal</title>
  <link rel="stylesheet" href="style.css?v=<?= time() ?>">
</head>
<body class="full-layout">

  <!-- Navbar -->
  <header class="site-navbar">
    <div class="navbar-container">
      <a href="index.php?page=home" class="brand-logo">SolidMedia</a>

      <nav class="navbar-nav">
        <a href="index.php?page=home" class="nav-link">Beranda</a>
        
        <?php if ($currentUser): ?>
          <a href="index.php?page=dashboard" class="nav-link">Dashboard</a>
          <a href="index.php?page=feed" class="nav-btn-primary">Ke Feed</a>
          <a href="index.php?page=logout" class="nav-btn-outline" style="color: #dc2626;">Keluar</a>
        <?php else: ?>
          <a href="index.php?page=login" class="nav-btn-outline">Masuk</a>
          <a href="index.php?page=register" class="nav-btn-primary">Daftar</a>
        <?php endif; ?>
      </nav>
    </div>
  </header>

  <!-- Bagian Hero / Konten Utama -->
  <main style="max-width: 900px; margin: 40px auto; padding: 0 20px;">
    
    <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 40px 30px; text-align: center; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
      <h1 style="font-size: 26px; color: #111827; margin-bottom: 12px;">Selamat Datang di SolidMedia</h1>
      <p style="font-size: 13px; color: #6b7280; max-width: 500px; margin: 0 auto 24px; line-height: 1.6;">
        Platform media sosial mahasiswa Ilmu Komputer UNJ. Silakan masuk atau buat akun baru untuk mulai terhubung.
      </p>

      <div style="display: flex; gap: 10px; justify-content: center;">
        <?php if ($currentUser): ?>
          <a href="index.php?page=dashboard" class="nav-btn-outline" style="height: 32px; display: inline-flex; align-items: center; padding: 0 16px;">Ke Dashboard</a>
          <a href="index.php?page=feed" class="btn-submit" style="height: 32px; padding: 0 20px; font-size: 12px;">Buka Halaman Feed &rarr;</a>
        <?php else: ?>
          <a href="index.php?page=register" class="btn-submit" style="height: 32px; padding: 0 20px; font-size: 12px;">Daftar Akun Baru</a>
          <a href="index.php?page=login" class="nav-btn-outline" style="height: 32px; display: inline-flex; align-items: center; padding: 0 20px;">Masuk</a>
        <?php endif; ?>
      </div>
    </div>

    <!-- Area tugas Sakha -->

  </main>

  <!-- Footer -->
  <footer class="site-footer">
    <p>&copy; 2026 SolidMedia - UTS Perancangan dan Pemrograman Website</p>
  </footer>

</body>
</html>
