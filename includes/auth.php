<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/db.php';

// Simpan pesan flash
function set_flash($type, $message) {
    $_SESSION['flash'] = [
        'type' => $type,
        'message' => $message
    ];
}

// Ambil pesan flash
function get_flash() {
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}

// Cek apakah user sedang login
function is_logged_in() {
    return isset($_SESSION['user']) && !empty($_SESSION['user']);
}

// Ambil data user aktif
function get_current_user_data() {
    return is_logged_in() ? $_SESSION['user'] : null;
}

// Proteksi halaman: harus login
function require_auth() {
    if (!is_logged_in()) {
        set_flash('error', 'Silakan masuk ke akun Anda terlebih dahulu!');
        header('Location: index.php?page=login');
        exit;
    }
}

// Kalau sudah login langsung ke dashboard
function require_guest() {
    if (is_logged_in()) {
        header('Location: index.php?page=dashboard');
        exit;
    }
}

// Logout user
function logout_user() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION = [];
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
    
    session_start();
    set_flash('info', 'Anda telah berhasil keluar.');
    header('Location: index.php?page=login');
    exit;
}
