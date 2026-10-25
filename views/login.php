<?php
// Ini tugas Keya
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masuk Akun - Solid Media</title>
  <link rel="stylesheet" href="style.css?v=<?= time() ?>">
</head>
<body>

  <div class="auth-card">
    <h1 class="auth-title">Masuk Akun</h1>

    <?php if (!empty($flash)): ?>
      <div class="alert-box alert-<?= htmlspecialchars($flash['type']) ?>">
        <?= htmlspecialchars($flash['message']) ?>
      </div>
    <?php endif; ?>

    <form action="index.php?page=login" method="POST">
      <div class="form-group">
        <label for="email">Email atau Username</label>
        <div class="input-wrapper">
          <input 
            type="text" 
            id="email" 
            name="email" 
            class="input-field" 
            placeholder="Masukkan Email atau Username" 
            value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>"
            required
          >
        </div>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <div class="input-wrapper has-icon">
          <input 
            type="password" 
            id="password" 
            name="password" 
            class="input-field" 
            placeholder="Masukkan Password" 
            required
          >
          <span class="eye-icon-btn">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#788686" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
              <circle cx="12" cy="12" r="3"></circle>
            </svg>
          </span>
        </div>
      </div>

      <div class="btn-row-right">
        <button type="submit" class="btn-submit">Masuk</button>
      </div>

      <p class="auth-footer">
        Belum memiliki akun? <a href="index.php?page=register">Buat sekarang disini.</a>
      </p>

      <p class="auth-footer" style="margin-top: 8px;">
        <a href="index.php?page=dashboard" style="color: #6b7280; font-size: 9.5px;">&larr; Kembali ke Dashboard</a>
      </p>
    </form>
  </div>

</body>
</html>
