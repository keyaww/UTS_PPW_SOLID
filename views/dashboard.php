<?php
// Ini tugas Dzammar
$currentUser = get_current_user_data();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - SolidMedia</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="full-layout">

  <!-- Navbar -->
  <header class="site-navbar">
    <div class="navbar-container">
      <a href="index.php?page=dashboard" class="brand-logo">SolidMedia</a>

      <nav class="navbar-nav">
        <a href="index.php?page=home" class="nav-link">Beranda</a>
        <span class="nav-link" style="color: #111827; font-weight: 600;">Halo, <?= htmlspecialchars($currentUser['name']) ?></span>
        <a href="index.php?page=logout" class="nav-btn-outline" style="color: #dc2626; border-color: #fca5a5;">Keluar</a>
      </nav>
    </div>
  </header>

  <main style="max-width: 800px; margin: 30px auto; padding: 0 16px;">

    <!-- Notifikasi Flash -->
    <?php if (!empty($flash)): ?>
      <div class="alert-box alert-<?= htmlspecialchars($flash['type']) ?>">
        <?= htmlspecialchars($flash['message']) ?>
      </div>
    <?php endif; ?>

    <!-- Ringkasan Akun Login -->
    <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 20px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
      <h2 style="font-size: 16px; color: #111827; margin-bottom: 6px;">Status: Berhasil Masuk</h2>
      <p style="font-size: 11.5px; color: #6b7280; margin-bottom: 12px;">Data akun diambil langsung dari session dan file JSON pengguna:</p>
      
      <div style="font-size: 12px; color: #374151; line-height: 1.8;">
        <div><strong>Nama:</strong> <?= htmlspecialchars($currentUser['name']) ?></div>
        <div><strong>Username:</strong> @<?= htmlspecialchars($currentUser['username']) ?></div>
        <div><strong>Email:</strong> <?= htmlspecialchars($currentUser['email']) ?></div>
      </div>
    </div>

    <!-- Area tugas Dzammar -->

  </main>

  <!-- Footer -->
  <footer class="site-footer">
    <p>&copy; 2026 SolidMedia - UTS Perancangan dan Pemrograman Website</p>
  </footer>

</body>
</html>
