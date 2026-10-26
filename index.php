<?php
require_once __DIR__ . '/includes/auth.php';

$page = isset($_GET['page']) ? trim($_GET['page']) : 'dashboard';

switch ($page) {

    // Dashboard (Bisa diakses publik / belum login maupun sudah login)
    case 'dashboard':
        $flash = get_flash();
        require_once __DIR__ . '/views/dashboard.php';
        break;
        
        // Beranda / Landing Page (Publik, Tugas Sakha)
    case 'home':
        $flash = get_flash();
        require_once __DIR__ . '/views/home.php';
        break;

    // Pendaftaran Akun (Tamu)
    case 'register':
        require_guest();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name             = isset($_POST['name']) ? trim($_POST['name']) : '';
            $username         = isset($_POST['username']) ? trim($_POST['username']) : '';
            $email            = isset($_POST['email']) ? trim($_POST['email']) : '';
            $password         = isset($_POST['password']) ? $_POST['password'] : '';
            $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

            if (empty($email) || empty($password) || empty($confirm_password)) {
                set_flash('error', 'Semua kolom wajib diisi!');
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                set_flash('error', 'Format email tidak valid!');
            } elseif (strlen($password) < 6) {
                set_flash('error', 'Password minimal 6 karakter!');
            } elseif ($password !== $confirm_password) {
                set_flash('error', 'Konfirmasi password tidak cocok!');
            } else {
                $result = create_user($name, $username, $email, $password);
                if ($result['success']) {
                    set_flash('success', 'Akun berhasil dibuat! Silakan masuk.');
                    header('Location: index.php?page=login');
                    exit;
                } else {
                    set_flash('error', $result['message']);
                }
            }
        }

        $flash = get_flash();
        require_once __DIR__ . '/views/register.php';
        break;

    // Masuk Akun (Tamu)
    case 'login':
        require_guest();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $identifier = isset($_POST['email']) ? trim($_POST['email']) : '';
            $password   = isset($_POST['password']) ? $_POST['password'] : '';

            if (empty($identifier) || empty($password)) {
                set_flash('error', 'Email dan password wajib diisi!');
            } else {
                $user = find_user($identifier);

                if ($user && password_verify($password, $user['password'])) {
                    $_SESSION['user'] = [
                        'id'         => $user['id'],
                        'name'       => $user['name'],
                        'username'   => $user['username'],
                        'email'      => $user['email'],
                        'bio'        => $user['bio'] ?? 'Mahasiswa Ilmu Komputer UNJ',
                        'avatar'     => $user['avatar'] ?? 'https://ui-avatars.com/api/?name=' . urlencode($user['name']) . '&background=6ab7ff&color=ffffff',
                        'created_at' => $user['created_at'] ?? date('Y-m-d')
                    ];

                    set_flash('success', 'Selamat datang kembali, ' . $user['name'] . '!');
                    header('Location: index.php?page=dashboard');
                    exit;
                } else {
                    set_flash('error', 'Email atau password salah!');
                }
            }
        }

        $flash = get_flash();
        require_once __DIR__ . '/views/login.php';
        break;

    // Feed Media Sosial (Wajib Login)
    case 'feed':
        require_auth();

        $flash = get_flash();
        require_once __DIR__ . '/views/feed.php';
        break;

    // Logout
    case 'logout':
        logout_user();
        break;

    default:
        header('Location: index.php?page=dashboard');
        exit;
}
