<?php
$currentUser = get_current_user_data();

$userName   = $currentUser['name'] ?? 'Mahasiswa UNJ';
$userHandle = $currentUser['username'] ?? 'mahasiswa';
$userEmail  = $currentUser['email'] ?? 'demo@unj.ac.id';
$userAvatar = !empty($currentUser['avatar']) ? $currentUser['avatar'] : 'https://ui-avatars.com/api/?name=' . urlencode($userName) . '&background=6ab7ff&color=ffffff&size=150';

if (!function_exists('icon')) {
  function icon($name, $size = 18) {
    static $icons = [
      'logo'       => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><path d="M8.59 13.51l6.83 3.98M15.41 6.51l-6.82 3.98"/></svg>',
      'media'      => '<rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/>',
      'tag'        => '<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/>',
      'smile'      => '<circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/>',
      'heart'      => '<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>',
      'heart-fill' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="#ef4444" stroke="#ef4444" stroke-width="1.8"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>',
      'comment'    => '<path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>'
    ];
    if (!isset($icons[$name])) return '';
    return str_starts_with($icons[$name], '<svg') 
      ? $icons[$name] 
      : "<svg width=\"$size\" height=\"$size\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.8\" stroke-linecap=\"round\" stroke-linejoin=\"round\">{$icons[$name]}</svg>";
  }
}

$posts = [
  [
    'name'     => 'Mahasiswa UNJ',
    'role'     => 'S1 Ilmu Komputer',
    'avatar'   => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80',
    'time'     => '2 jam yang lalu • Kampus A Rawamangun',
    'caption'  => 'Alhamdulillah diskusi kelompok tugas besar UTS Perancangan dan Pemrograman Website (PPW) selesai! 💻✨ Semua modul dirancang murni dengan <strong>HTML5</strong>, <strong>CSS3</strong>, dan <strong>Native PHP</strong> tanpa framework sesuai ketentuan dosen. Semangat semuanya!<br><br><a href="#ppw" class="post-hashtag">#UTS_PPW</a> <a href="#unj" class="post-hashtag">#IlmuKomputerUNJ</a> <a href="#solidmedia" class="post-hashtag">#PureCode</a>',
    'image'    => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=1080&auto=format&fit=crop&q=80',
    'liked'    => true,
    'likes'    => 'Disukai oleh sakha_putra, keya_unj, dan 48 lainnya',
    'comments' => [
      ['user' => 'sakha_putra', 'text' => 'Mantap banget kelompok kita! Tampilan responsifnya keren 🔥'],
      ['user' => 'keya_unj',    'text' => 'Halaman login dan register juga udah rapi dan siap dipresentasikan 👏']
    ]
  ],
  [
    'name'     => 'Sakha Putra',
    'role'     => 'Frontend Enthusiast',
    'avatar'   => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=120&auto=format&fit=crop&q=80',
    'time'     => '4 jam yang lalu',
    'caption'  => '💡 <strong>Tips CSS Responsif untuk Tugas Kuliah:</strong><br>Gunakan layout fleksibel dengan <code>max-width</code> adaptif agar konten tetap nyaman dibaca pada layar HP tanpa ada horizontal scroll!<br><br><a href="#csstips" class="post-hashtag">#WebDevelopment</a> <a href="#responsive" class="post-hashtag">#PureCSS</a>',
    'liked'    => false,
    'likes'    => '36 suka • 5 komentar'
  ],
  [
    'name'     => 'Keya Ramadhani',
    'role'     => 'Mahasiswa Ilkom \'24',
    'avatar'   => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=120&auto=format&fit=crop&q=80',
    'time'     => 'Kemarin pukul 16:45 • Gedung IDB UNJ',
    'caption'  => 'Suasana ruang praktikum Gedung IDB sore ini ramai rekan-rekan yang lagi eksplorasi Native PHP dan session management. Semangat ngoding bareng ya guys! Jangan lupa istirahat dan jaga kesehatan ☕💻',
    'image'    => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=1080&auto=format&fit=crop&q=80',
    'liked'    => true,
    'likes'    => 'Disukai oleh ' . htmlspecialchars($userName) . ' dan 52 lainnya'
  ],
  [
    'name'     => 'HIMA Ilmu Komputer UNJ',
    'role'     => 'Pengumuman Resmi',
    'avatar'   => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=120&auto=format&fit=crop&q=80',
    'time'     => '1 hari yang lalu',
    'caption'  => '📢 <strong>[PENGUMUMAN PRESENTASI PROYEK UTS PPW]</strong><br><br>Halo Rekan Mahasiswa! Presentasi projek UTS PPW akan diadakan sesuai jadwal kelas. Pastikan repository Git kelompok rapi, terdokumentasi di <code>README.md</code>, serta memenuhi syarat 100% murni HTML/CSS/PHP tanpa framework.<br><br>Salam hangat, <em>Divisi Akademik HIMA Ilkom</em>',
    'liked'    => true,
    'likes'    => '74 suka • 12 komentar • 18 dibagikan'
  ]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feed Mahasiswa - SolidMedia</title>
  <link rel="stylesheet" href="style.css?v=<?= time() ?>">
</head>
<body class="full-layout">

  <header class="site-navbar">
    <div class="navbar-container">
      <a href="index.php?page=feed" class="brand-logo" title="SolidMedia">
        <?= icon('logo') ?>
        <span>SolidMedia</span>
      </a>

      <nav class="navbar-nav">
        <a href="index.php?page=home" class="nav-link">Beranda</a>
        <a href="index.php?page=dashboard" class="nav-link">Dashboard</a>
        <a href="index.php?page=feed" class="nav-link" style="color:#0284c7;font-weight:600;">Feed</a>

        <a href="index.php?page=dashboard" class="nav-user-badge" title="Profil <?= htmlspecialchars($userName) ?>">
          <img src="<?= htmlspecialchars($userAvatar) ?>" alt="<?= htmlspecialchars($userName) ?>" class="nav-user-avatar">
          <span style="max-width:130px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"><?= htmlspecialchars($userName) ?></span>
        </a>

        <a href="index.php?page=logout" class="nav-btn-outline" style="color:#dc2626;border-color:#fca5a5;" title="Keluar">Keluar</a>
      </nav>
    </div>
  </header>

  <main class="feed-container">

    <?php if (!empty($flash)): ?>
      <div class="alert-box alert-<?= htmlspecialchars($flash['type']) ?>" style="margin-bottom:18px;">
        <?= htmlspecialchars($flash['message']) ?>
      </div>
    <?php endif; ?>

    <div class="create-post-card">
      <div class="create-post-top">
        <img src="<?= htmlspecialchars($userAvatar) ?>" alt="<?= htmlspecialchars($userName) ?>" class="create-post-avatar">
        <input type="text" class="create-post-input" placeholder="Apa kabar dari kelas hari ini, <?= htmlspecialchars($userName) ?>?" aria-label="Tulis postingan">
      </div>
      <div class="create-post-bottom">
        <div class="create-post-actions">
          <a href="#media" class="post-action-chip" style="color:#10b981"><?= icon('media', 16) ?> <span>Media</span></a>
          <a href="#tag" class="post-action-chip" style="color:#0284c7"><?= icon('tag', 16) ?> <span>Tag</span></a>
          <a href="#aktivitas" class="post-action-chip" style="color:#f59e0b"><?= icon('smile', 16) ?> <span>Kabar</span></a>
        </div>
        <button type="button" class="btn-publish-post">Posting</button>
      </div>
    </div>

    <?php foreach ($posts as $p): ?>
      <article class="post-card">
        <header class="post-header">
          <img src="<?= htmlspecialchars($p['avatar']) ?>" alt="<?= htmlspecialchars($p['name']) ?>" class="author-avatar">
          <div class="author-info">
            <div class="author-name-row">
              <span class="author-name"><?= htmlspecialchars($p['name']) ?></span>
              <span class="author-role">• <?= htmlspecialchars($p['role']) ?></span>
            </div>
            <span class="post-time"><?= htmlspecialchars($p['time']) ?></span>
          </div>
        </header>

        <div class="post-content">
          <p><?= $p['caption'] ?></p>
        </div>

        <?php if (!empty($p['image'])): ?>
          <div class="post-media">
            <img src="<?= htmlspecialchars($p['image']) ?>" alt="Post image" loading="lazy">
          </div>
        <?php endif; ?>

        <div class="post-actions">
          <button type="button" class="action-btn <?= !empty($p['liked']) ? 'liked' : '' ?>" aria-label="Suka">
            <?= icon(!empty($p['liked']) ? 'heart-fill' : 'heart', 18) ?>
            <span><?= htmlspecialchars($p['likes']) ?></span>
          </button>
          <button type="button" class="action-btn" aria-label="Komentar">
            <?= icon('comment', 18) ?>
            <span>Balas</span>
          </button>
        </div>

        <?php if (!empty($p['comments'])): ?>
          <div class="post-comments">
            <?php foreach ($p['comments'] as $c): ?>
              <div class="comment-row">
                <strong><?= htmlspecialchars($c['user']) ?></strong> <?= htmlspecialchars($c['text']) ?>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <div class="comment-box">
          <input type="text" class="comment-input" placeholder="Tulis balasan...">
          <button type="button" class="comment-btn">Kirim</button>
        </div>
      </article>
    <?php endforeach; ?>

  </main>

  <footer class="site-footer">
    <p>&copy; <?= date('Y') ?> SolidMedia - UTS Perancangan dan Pemrograman Website • S1 Ilmu Komputer Universitas Negeri Jakarta</p>
  </footer>

</body>
</html>
