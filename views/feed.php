<?php
$currentUser = get_current_user_data();

$userName   = $currentUser['name'] ?? 'Mahasiswa UNJ';
$userHandle = $currentUser['username'] ?? 'mahasiswa';
$userEmail  = $currentUser['email'] ?? 'demo@unj.ac.id';
$userBio    = !empty($currentUser['bio']) ? $currentUser['bio'] : 'Mahasiswa Ilmu Komputer UNJ angkatan 2024/2026. Belajar web development murni PHP, HTML, CSS!';
$userAvatar = !empty($currentUser['avatar']) ? $currentUser['avatar'] : 'https://ui-avatars.com/api/?name=' . urlencode($userName) . '&background=6ab7ff&color=ffffff&size=150';
$userJoined = !empty($currentUser['created_at']) ? date('d M Y', strtotime($currentUser['created_at'])) : 'Oktober 2026';

if (!function_exists('icon')) {
  function icon($name, $size = 18) {
    static $icons = [
      'logo'       => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><path d="M8.59 13.51l6.83 3.98M15.41 6.51l-6.82 3.98"/></svg>',
      'search'     => '<circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>',
      'home'       => '<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>',
      'globe'      => '<polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/>',
      'bell'       => '<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/>',
      'mail'       => '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>',
      'users'      => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
      'bookmark'   => '<path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/>',
      'save'       => '<path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/>',
      'settings'   => '<circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>',
      'plus'       => '<line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>',
      'media'      => '<rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/>',
      'tag'        => '<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/>',
      'smile'      => '<circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/>',
      'heart'      => '<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>',
      'heart-fill' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="#ef4444" stroke="#ef4444" stroke-width="1.8"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>',
      'comment'    => '<path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>',
      'share'      => '<line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/>',
      'dots'       => '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="5" r="2"/><circle cx="12" cy="12" r="2"/><circle cx="12" cy="19" r="2"/></svg>',
      'verified'   => '<svg width="13" height="13" viewBox="0 0 24 24" fill="#0284c7"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>'
    ];
    if (!isset($icons[$name])) return '';
    return str_starts_with($icons[$name], '<svg') 
      ? $icons[$name] 
      : "<svg width=\"$size\" height=\"$size\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.8\" stroke-linecap=\"round\" stroke-linejoin=\"round\">{$icons[$name]}</svg>";
  }
}

$navMenus = [
  ['icon' => 'home',     'label' => 'Feed Utama',        'url' => 'index.php?page=feed', 'active' => true],
  ['icon' => 'verified', 'label' => 'Dashboard Status',  'url' => 'index.php?page=dashboard'],
  ['icon' => 'bell',     'label' => 'Notifikasi',        'url' => '#notifikasi', 'badge' => 3, 'badge_bg' => '#ef4444'],
  ['icon' => 'mail',     'label' => 'Pesan Kampus',      'url' => '#pesan',      'badge' => 1, 'badge_bg' => '#0284c7'],
  ['icon' => 'users',    'label' => 'Komunitas Ilkom',   'url' => '#komunitas'],
  ['icon' => 'bookmark', 'label' => 'Tersimpan',         'url' => '#tersimpan'],
  ['icon' => 'settings', 'label' => 'Pengaturan',        'url' => '#pengaturan'],
];

$stories = [
  ['name' => 'Cerita Anda', 'avatar' => $userAvatar, 'is_user' => true],
  ['name' => 'keya_unj',    'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=120&auto=format&fit=crop&q=80'],
  ['name' => 'sakha_putra', 'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=120&auto=format&fit=crop&q=80', 'ring' => 'story-unj'],
  ['name' => 'daffa_ilkom', 'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=120&auto=format&fit=crop&q=80'],
  ['name' => 'sarah_az',    'avatar' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=120&auto=format&fit=crop&q=80', 'ring' => 'story-unj'],
  ['name' => 'dimas_code',  'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=120&auto=format&fit=crop&q=80'],
  ['name' => 'hima_unj',    'avatar' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=120&auto=format&fit=crop&q=80', 'ring' => 'story-unj'],
];

$posts = [
  [
    'name'     => 'Mahasiswa UNJ',
    'role'     => 'S1 Ilmu Komputer',
    'avatar'   => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80',
    'verified' => true,
    'time'     => '2 jam yang lalu • Kampus A Rawamangun',
    'caption'  => 'Alhamdulillah diskusi kelompok tugas besar UTS Perancangan dan Pemrograman Website (PPW) selesai! 💻✨ Semua modul dirancang murni dengan <strong>HTML5</strong>, <strong>CSS3</strong>, dan <strong>Native PHP</strong> tanpa framework sesuai ketentuan dosen. Semangat semuanya!<br><br><a href="#ppw" class="post-hashtag">#UTS_PPW</a> <a href="#unj" class="post-hashtag">#IlmuKomputerUNJ</a> <a href="#solidmedia" class="post-hashtag">#PureCode</a>',
    'image'    => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=1080&auto=format&fit=crop&q=80',
    'liked'    => true,
    'likes'    => 'Disukai oleh sakha_putra, keya_unj, dan 48 lainnya',
    'comments' => [
      ['user' => 'sakha_putra', 'text' => 'Mantap banget kelompok kita! Tampilan feed responsifnya keren banget Dzammar 🔥'],
      ['user' => 'keya_unj',    'text' => 'Halaman login dan register juga udah rapi dan siap dipresentasikan 👏']
    ],
    'more_comments' => 'Lihat semua 9 komentar...'
  ],
  [
    'name'     => 'Sakha Putra',
    'role'     => 'Frontend Enthusiast',
    'avatar'   => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=120&auto=format&fit=crop&q=80',
    'verified' => false,
    'time'     => '4 jam yang lalu',
    'box_style'=> 'background:linear-gradient(180deg,#fff,#f8fafc);padding:16px;border-radius:8px;margin:0 16px 12px;border-left:3px solid #6ab7ff;',
    'caption'  => '💡 <strong>Tips CSS Responsif untuk Tugas Kuliah:</strong><br>Gunakan CSS Grid dengan <code>grid-template-columns</code> yang adaptif, lalu sembunyikan sidebar sekunder pada viewport HP (<code>@media (max-width: 768px)</code>). Feed utama jadi tetap nyaman dibaca tanpa horizontal overflow!<br><br><a href="#csstips" class="post-hashtag">#WebDevelopment</a> <a href="#responsive" class="post-hashtag">#CSSGrid</a>',
    'liked'    => false,
    'likes'    => '36 suka • 5 komentar'
  ],
  [
    'name'     => 'Keya Ramadhani',
    'role'     => 'Mahasiswa Ilkom \'24',
    'avatar'   => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=120&auto=format&fit=crop&q=80',
    'verified' => false,
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
    'verified' => true,
    'time'     => '1 hari yang lalu',
    'caption'  => '📢 <strong>[PENGUMUMAN PRESENTASI PROYEK UTS PPW]</strong><br><br>Halo Rekan Mahasiswa! Presentasi projek UTS PPW akan diadakan sesuai jadwal kelas. Pastikan repository Git kelompok rapi, terdokumentasi di <code>README.md</code>, serta memenuhi syarat 100% murni HTML/CSS/PHP tanpa framework.<br><br>Salam hangat, <em>Divisi Akademik HIMA Ilkom</em>',
    'liked'    => true,
    'likes'    => '74 suka • 12 komentar • 18 dibagikan'
  ]
];

$suggestions = [
  ['name' => 'Daffa Ramadhan', 'sub' => 'Ilmu Komputer \'24',   'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&auto=format&fit=crop&q=80'],
  ['name' => 'Sarah Azzahra',  'sub' => 'Sistem Informasi \'24', 'avatar' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&auto=format&fit=crop&q=80'],
  ['name' => 'Dimas Pratama',  'sub' => 'Ilmu Komputer \'23',   'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&auto=format&fit=crop&q=80'],
  ['name' => 'Nadya Kusuma',   'sub' => 'Pendidikan TIK \'24',  'avatar' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=100&auto=format&fit=crop&q=80'],
];

$trends = [
  ['tag' => '#UTS_PPW',          'cat' => 'Perkuliahan • Populer', 'count' => '1.480 postingan'],
  ['tag' => '#SolidMedia',       'cat' => 'Teknologi Web • Tren',  'count' => '852 postingan'],
  ['tag' => '#IlmuKomputerUNJ',  'cat' => 'Kampus A Rawamangun',   'count' => '620 postingan'],
  ['tag' => '#NativePHP',        'cat' => 'Coding & Praktikum',    'count' => '415 postingan']
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

      <div class="navbar-search">
        <span class="navbar-search-icon"><?= icon('search', 15) ?></span>
        <input type="text" class="navbar-search-input" placeholder="Cari mahasiswa, postingan, atau topik..." aria-label="Cari">
      </div>

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

  <main class="dashboard-layout">

    <aside class="dashboard-sidebar-left">
      <div class="left-nav-card">
        <div class="left-user-summary">
          <img src="<?= htmlspecialchars($userAvatar) ?>" alt="<?= htmlspecialchars($userName) ?>" class="left-user-avatar">
          <div class="left-user-meta">
            <div class="left-user-name"><?= htmlspecialchars($userName) ?></div>
            <div class="left-user-handle">@<?= htmlspecialchars($userHandle) ?></div>
          </div>
        </div>

        <ul class="nav-menu-list">
          <?php foreach ($navMenus as $menu): ?>
            <li>
              <a href="<?= htmlspecialchars($menu['url']) ?>" class="nav-menu-item <?= !empty($menu['active']) ? 'active' : '' ?>">
                <span class="nav-menu-link-content">
                  <span class="nav-menu-icon"><?= icon($menu['icon']) ?></span>
                  <span><?= htmlspecialchars($menu['label']) ?></span>
                </span>
                <?php if (isset($menu['badge'])): ?>
                  <span class="nav-badge-pill" style="<?= !empty($menu['badge_color']) ? 'background:'.$menu['badge_color'] : '' ?>">
                    <?= $menu['badge'] ?>
                  </span>
                <?php endif; ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>

        <a href="#buat-postingan" class="btn-quick-post">
          <?= icon('plus', 15) ?>
          <span>Buat Postingan</span>
        </a>
      </div>
    </aside>

    <section class="dashboard-feed-center">

      <?php if (!empty($flash)): ?>
        <div class="alert-box alert-<?= htmlspecialchars($flash['type']) ?>" style="margin-bottom:18px;">
          <?= htmlspecialchars($flash['message']) ?>
        </div>
      <?php endif; ?>

      <div class="stories-bar" aria-label="Cerita Mahasiswa">
        <?php foreach ($stories as $s): ?>
          <div class="story-item" title="<?= htmlspecialchars($s['name']) ?>">
            <div class="story-ring <?= $s['ring'] ?? (!empty($s['is_user']) ? 'story-create' : '') ?>">
              <img src="<?= htmlspecialchars($s['avatar']) ?>" alt="<?= htmlspecialchars($s['name']) ?>" class="story-avatar">
              <?php if (!empty($s['is_user'])): ?>
                <span class="story-add-badge">+</span>
              <?php endif; ?>
            </div>
            <span class="story-username"><?= htmlspecialchars($s['name']) ?></span>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="create-post-card" id="buat-postingan">
        <div class="create-post-top">
          <img src="<?= htmlspecialchars($userAvatar) ?>" alt="<?= htmlspecialchars($userName) ?>" class="create-post-avatar">
          <input type="text" class="create-post-input" placeholder="Apa yang sedang Anda pikirkan, <?= htmlspecialchars($userName) ?>?" aria-label="Tulis postingan">
        </div>
        <hr class="create-post-divider">
        <div class="create-post-bottom">
          <div class="create-post-actions">
            <a href="#media" class="post-action-chip" style="color:#10b981"><?= icon('media') ?> <span>Foto/Media</span></a>
            <a href="#tag" class="post-action-chip" style="color:#0284c7"><?= icon('tag') ?> <span>Tag Teman</span></a>
            <a href="#aktivitas" class="post-action-chip" style="color:#f59e0b"><?= icon('smile') ?> <span>Aktivitas</span></a>
          </div>
          <button type="button" class="btn-publish-post">Posting</button>
        </div>
      </div>

      <?php foreach ($posts as $p): ?>
        <article class="post-card">
          <header class="post-header">
            <div class="post-author">
              <img src="<?= htmlspecialchars($p['avatar']) ?>" alt="<?= htmlspecialchars($p['name']) ?>" class="author-avatar">
              <div class="author-info">
                <div class="author-name-row">
                  <span class="author-name"><?= htmlspecialchars($p['name']) ?></span>
                  <?= !empty($p['verified']) ? icon('verified') : '' ?>
                  <span class="author-role">• <?= htmlspecialchars($p['role']) ?></span>
                </div>
                <span class="post-time"><?= htmlspecialchars($p['time']) ?></span>
              </div>
            </div>
            <button type="button" class="post-more-btn" aria-label="Opsi"><?= icon('dots') ?></button>
          </header>

          <div class="post-caption-top" style="<?= $p['box_style'] ?? '' ?>"><?= $p['caption'] ?></div>

          <?php if (!empty($p['image'])): ?>
            <div class="post-media">
              <img src="<?= htmlspecialchars($p['image']) ?>" alt="Post image" loading="lazy">
            </div>
          <?php endif; ?>

          <div class="post-actions">
            <div class="action-buttons-left">
              <button type="button" class="action-icon-btn <?= !empty($p['liked']) ? 'liked' : '' ?>" aria-label="Suka">
                <?= icon(!empty($p['liked']) ? 'heart-fill' : 'heart', 22) ?>
              </button>
              <button type="button" class="action-icon-btn" aria-label="Komentar"><?= icon('comment', 22) ?></button>
              <button type="button" class="action-icon-btn" aria-label="Bagikan"><?= icon('share', 22) ?></button>
            </div>
            <button type="button" class="action-icon-btn" aria-label="Simpan"><?= icon('save', 21) ?></button>
          </div>

          <div class="post-details">
            <div class="likes-count"><?= htmlspecialchars($p['likes']) ?></div>
            
            <?php if (!empty($p['comments'])): ?>
              <div class="comments-list">
                <?php foreach ($p['comments'] as $c): ?>
                  <div class="comment-row">
                    <span class="comment-user"><?= htmlspecialchars($c['user']) ?></span>
                    <span><?= htmlspecialchars($c['text']) ?></span>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <?php if (!empty($p['more_comments'])): ?>
              <a href="#komentar" class="view-all-comments"><?= htmlspecialchars($p['more_comments']) ?></a>
            <?php endif; ?>

            <div class="comment-input-wrapper">
              <input type="text" class="comment-input-field" placeholder="Tulis komentar..." aria-label="Komentar">
              <button type="button" class="comment-send-btn">Kirim</button>
            </div>
          </div>
        </article>
      <?php endforeach; ?>

    </section>

    <aside class="dashboard-sidebar-right">

      <div class="sidebar-user-card">
        <div class="sidebar-profile">
          <img src="<?= htmlspecialchars($userAvatar) ?>" alt="<?= htmlspecialchars($userName) ?>" class="sidebar-avatar">
          <div>
            <div class="sidebar-name"><?= htmlspecialchars($userName) ?></div>
            <div class="sidebar-username">@<?= htmlspecialchars($userHandle) ?></div>
          </div>
        </div>
        <div class="sidebar-bio"><?= htmlspecialchars($userBio) ?></div>

        <div class="sidebar-meta-info">
          <div class="sidebar-meta-row">
            <span style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">📧 <?= htmlspecialchars($userEmail) ?></span>
          </div>
          <div class="sidebar-meta-row">
            <span>📅 Bergabung <?= htmlspecialchars($userJoined) ?></span>
          </div>
          <div class="sidebar-meta-row" style="color:#10b981;font-weight:600;">
            <span>🟢 Sesi: Aktif (Login)</span>
          </div>
        </div>

        <a href="index.php?page=logout" class="sidebar-logout-btn">Keluar dari Akun</a>
      </div>

      <div class="suggestions-card">
        <div class="suggestions-title">
          <span>Saran Teman Mahasiswa</span>
          <a href="#semua">Lihat Semua</a>
        </div>
        <?php foreach ($suggestions as $s): ?>
          <div class="suggestion-item">
            <a href="#profil" class="suggestion-user">
              <img src="<?= htmlspecialchars($s['avatar']) ?>" alt="<?= htmlspecialchars($s['name']) ?>" class="suggestion-avatar">
              <div class="suggestion-info">
                <span class="suggestion-name"><?= htmlspecialchars($s['name']) ?></span>
                <span class="suggestion-sub"><?= htmlspecialchars($s['sub']) ?></span>
              </div>
            </a>
            <a href="#ikuti" class="btn-follow">Ikuti</a>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="trending-card">
        <div class="trending-header">Topik Hangat di UNJ</div>
        <div class="trending-list">
          <?php foreach ($trends as $t): ?>
            <a href="#tren" class="trending-item">
              <span class="trending-category"><?= htmlspecialchars($t['cat']) ?></span>
              <span class="trending-tag"><?= htmlspecialchars($t['tag']) ?></span>
              <span class="trending-count"><?= htmlspecialchars($t['count']) ?></span>
            </a>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="sidebar-footer-links">
        <a href="#tentang">Tentang</a> • <a href="#bantuan">Bantuan</a> • <a href="#privasi">Privasi</a> • <a href="#ketentuan">Ketentuan</a><br>
        &copy; 2026 SolidMedia • UTS PPW Kelompok 5
      </div>

    </aside>

  </main>

  <footer class="site-footer">
    <p>&copy; 2026 SolidMedia - UTS Perancangan dan Pemrograman Website • S1 Ilmu Komputer Universitas Negeri Jakarta</p>
  </footer>

</body>
</html>
