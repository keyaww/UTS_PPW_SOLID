<?php
$currentUser = get_current_user_data();

$userName   = $currentUser['name'] ?? 'Mahasiswa UNJ';
$userHandle = $currentUser['username'] ?? 'mahasiswa';
$userEmail  = $currentUser['email'] ?? 'demo@unj.ac.id';
$userBio    = !empty($currentUser['bio']) ? $currentUser['bio'] : 'Mahasiswa Ilmu Komputer UNJ';
$userAvatar = !empty($currentUser['avatar']) ? $currentUser['avatar'] : 'https://ui-avatars.com/api/?name=' . urlencode($userName) . '&background=6ab7ff&color=ffffff&size=150';
$userJoined = !empty($currentUser['created_at']) ? date('d M Y', strtotime($currentUser['created_at'])) : date('d M Y');

if (!function_exists('icon')) {
  function icon($name, $size = 18) {
    static $icons = [
      'logo'       => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><path d="M8.59 13.51l6.83 3.98M15.41 6.51l-6.82 3.98"/></svg>',
      'home'       => '<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>',
      'check'      => '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>',
      'arrow'      => '<line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>',
      'mail'       => '<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>',
      'shield'     => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>'
    ];
    if (!isset($icons[$name])) return '';
    return str_starts_with($icons[$name], '<svg') 
      ? $icons[$name] 
      : "<svg width=\"$size\" height=\"$size\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\">{$icons[$name]}</svg>";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Berhasil Login - SolidMedia</title>
  <link rel="stylesheet" href="style.css?v=<?= time() ?>">
</head>
<body class="full-layout">

  <!-- Navbar -->
  <header class="site-navbar">
    <div class="navbar-container">
      <a href="index.php?page=home" class="brand-logo" title="SolidMedia">
        <?= icon('logo') ?>
        <span>SolidMedia</span>
      </a>

      <nav class="navbar-nav">
        <a href="index.php?page=home" class="nav-link">Beranda</a>
        <a href="index.php?page=dashboard" class="nav-link" style="color:#0284c7;font-weight:600;">Dashboard</a>
        <a href="index.php?page=feed" class="nav-link">Feed</a>

        <a href="index.php?page=dashboard" class="nav-user-badge" title="Profil <?= htmlspecialchars($userName) ?>">
          <img src="<?= htmlspecialchars($userAvatar) ?>" alt="<?= htmlspecialchars($userName) ?>" class="nav-user-avatar">
          <span style="max-width:130px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"><?= htmlspecialchars($userName) ?></span>
        </a>

        <a href="index.php?page=logout" class="nav-btn-outline" style="color:#dc2626;border-color:#fca5a5;" title="Keluar">Keluar</a>
      </nav>
    </div>
  </header>

  <!-- Konten Utama Dashboard -->
  <main class="dashboard-welcome-container" style="max-width: 560px; margin: 40px auto; padding: 0 20px;">

    <?php if (!empty($flash)): ?>
      <div class="alert-box alert-<?= htmlspecialchars($flash['type']) ?>" style="margin-bottom: 20px; border-radius: 8px;">
        <?= htmlspecialchars($flash['message']) ?>
      </div>
    <?php endif; ?>

    <div class="dashboard-welcome-card" style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 16px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06); padding: 36px 28px; text-align: center;">

      <!-- Icon Sukses -->
      <div class="dashboard-success-badge-wrap" style="width: 64px; height: 64px; border-radius: 50%; background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%); border: 2px solid #86efac; display: inline-flex; align-items: center; justify-content: center; margin: 0 auto 18px; color: #16a34a;" title="Berhasil Masuk">
        <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
          <polyline points="22 4 12 14.01 9 11.01"></polyline>
        </svg>
      </div>

      <!-- Pesan Utama Berhasil Login -->
      <h1 class="dashboard-success-title" style="font-size: 22px; font-weight: 700; color: #111827; margin-bottom: 8px; letter-spacing: -0.3px;">
        Anda Berhasil Login!
      </h1>
      <p class="dashboard-success-subtitle" style="font-size: 13px; color: #4b5563; line-height: 1.6; max-width: 440px; margin: 0 auto 24px;">
        Selamat datang kembali di platform <strong>SolidMedia</strong>! Akun Anda telah berhasil diautentikasi dan sesi Anda kini aktif.
      </p>

      <!-- Informasi Pengguna / Sesi Aktif -->
      <div class="dashboard-user-card-inner" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 14px 18px; margin-bottom: 24px; display: flex; align-items: center; gap: 14px; text-align: left;">
        <img src="<?= htmlspecialchars($userAvatar) ?>" alt="<?= htmlspecialchars($userName) ?>" class="dashboard-user-avatar" style="width: 52px; height: 52px; border-radius: 50%; object-fit: cover; border: 2px solid #6ab7ff; flex-shrink: 0;">
        <div class="dashboard-user-info" style="flex: 1; min-width: 0;">
          <div class="dashboard-user-info-name" style="font-size: 14px; font-weight: 700; color: #0f172a; margin-bottom: 2px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
            <?= htmlspecialchars($userName) ?>
          </div>
          <div class="dashboard-user-info-handle" style="font-size: 11.5px; color: #64748b; margin-bottom: 6px;">
            @<?= htmlspecialchars($userHandle) ?>
          </div>
          <div class="dashboard-user-info-badges" style="display: flex; flex-wrap: wrap; gap: 6px; font-size: 10.5px;">
            <span class="dashboard-pill-active" style="display: inline-flex; align-items: center; gap: 4px; background: #dcfce7; color: #15803d; font-weight: 600; padding: 2px 8px; border-radius: 12px;">
              <svg width="7" height="7" viewBox="0 0 24 24" fill="#16a34a"><circle cx="12" cy="12" r="12"/></svg>
              Sesi Aktif
            </span>
            <span class="dashboard-pill-email" style="display: inline-flex; align-items: center; gap: 4px; background: #f1f5f9; color: #475569; padding: 2px 8px; border-radius: 12px;">
              <?= icon('mail', 12) ?>
              <?= htmlspecialchars($userEmail) ?>
            </span>
          </div>
        </div>
      </div>

      <!-- Tombol Utama Direct ke Feed -->
      <a href="index.php?page=feed" class="dashboard-btn-cta-feed" style="display: inline-flex; align-items: center; justify-content: center; gap: 8px; width: 100%; max-width: 320px; background: linear-gradient(90deg, #6ab7ff 0%, #6effbf 100%); color: #1f2937; border: 1px solid #93c5fd; border-radius: 8px; height: 42px; font-size: 13px; font-weight: 700; text-decoration: none; box-shadow: 0 4px 14px rgba(106, 183, 255, 0.28); margin: 0 auto; transition: all 0.2s;">
        <span>Buka Halaman Feed</span>
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
          <line x1="5" y1="12" x2="19" y2="12"></line>
          <polyline points="12 5 19 12 12 19"></polyline>
        </svg>
      </a>

      <!-- Tombol Sekunder -->
      <div class="dashboard-secondary-links" style="display: flex; justify-content: center; gap: 10px; margin-top: 18px;">
        <a href="index.php?page=home" class="nav-btn-outline" style="height: 32px; display: inline-flex; align-items: center; padding: 0 16px; font-size: 11.5px;">Ke Halaman Awal</a>
        <a href="index.php?page=logout" class="nav-btn-outline" style="height: 32px; display: inline-flex; align-items: center; padding: 0 16px; font-size: 11.5px; color: #dc2626; border-color: #fca5a5;">Keluar Akun</a>
      </div>

    </div>

  </main>

  <footer class="site-footer">
    <p>&copy; 2026 SolidMedia - UTS Perancangan dan Pemrograman Website • S1 Ilmu Komputer Universitas Negeri Jakarta</p>
  </footer>

</body>
</html>
