<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/db.php';

function set_flash($type, $message) {
    $_SESSION['flash'] = [
        'type' => $type,
        'message' => $message
    ];
}

function get_flash() {
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}

function is_logged_in() {
    return isset($_SESSION['user']) && !empty($_SESSION['user']);
}

function get_current_user_data() {
    return is_logged_in() ? $_SESSION['user'] : null;
}

function require_auth() {
    if (!is_logged_in()) {
        set_flash('error', 'Silakan masuk ke akun Anda terlebih dahulu!');
        header('Location: index.php?page=login');
        exit;
    }
}

function require_guest() {
    if (is_logged_in()) {
        header('Location: index.php?page=dashboard');
        exit;
    }
}

function logout_user() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    unset($_SESSION['user']);
    set_flash('info', 'Anda telah berhasil keluar.');
    header('Location: index.php?page=login');
    exit;
}
