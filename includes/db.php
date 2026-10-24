<?php
define('DATA_FILE', __DIR__ . '/../data/users.json');

// Ambil semua user dari file JSON
function get_all_users() {
    if (!file_exists(DATA_FILE)) {
        if (!is_dir(dirname(DATA_FILE))) {
            mkdir(dirname(DATA_FILE), 0777, true);
        }
        file_put_contents(DATA_FILE, json_encode([], JSON_PRETTY_PRINT));
        return [];
    }
    
    $content = file_get_contents(DATA_FILE);
    $users = json_decode($content, true);
    return is_array($users) ? $users : [];
}

// Simpan data user ke file JSON
function save_all_users($users) {
    if (!is_dir(dirname(DATA_FILE))) {
        mkdir(dirname(DATA_FILE), 0777, true);
    }
    $json = json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    return file_put_contents(DATA_FILE, $json) !== false;
}

// Cari user berdasarkan email atau username
function find_user($identifier) {
    $users = get_all_users();
    $lower = strtolower(trim($identifier));
    
    foreach ($users as $user) {
        if (strtolower($user['email']) === $lower || (isset($user['username']) && strtolower($user['username']) === $lower)) {
            return $user;
        }
    }
    return null;
}

// Cek apakah email/username sudah pernah didaftarkan
function check_user_exists($email, $username = '') {
    $users = get_all_users();
    $lowerEmail = strtolower(trim($email));
    $lowerUser = strtolower(trim($username));
    
    foreach ($users as $user) {
        if (strtolower($user['email']) === $lowerEmail) {
            return true;
        }
        if (!empty($lowerUser) && isset($user['username']) && strtolower($user['username']) === $lowerUser) {
            return true;
        }
    }
    return false;
}

// Tambah user baru ke JSON
function create_user($name, $username, $email, $password) {
    $email = trim($email);
    $username = trim($username);
    $name = trim($name);
    
    if (empty($name)) {
        $name = explode('@', $email)[0];
    }
    if (empty($username)) {
        $username = strtolower(preg_replace('/[^a-zA-Z0-9_]/', '', explode('@', $email)[0]));
    }
    
    if (check_user_exists($email, $username)) {
        return ['success' => false, 'message' => 'Email atau Username sudah terdaftar! Gunakan yang lain.'];
    }
    
    $users = get_all_users();
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $newUser = [
        'id' => count($users) + 1,
        'name' => htmlspecialchars($name, ENT_QUOTES, 'UTF-8'),
        'username' => htmlspecialchars($username, ENT_QUOTES, 'UTF-8'),
        'email' => htmlspecialchars($email, ENT_QUOTES, 'UTF-8'),
        'password' => $hashedPassword,
        'bio' => 'Mahasiswa Ilmu Komputer UNJ',
        'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=6ab7ff&color=ffffff&size=150',
        'created_at' => date('Y-m-d H:i:s')
    ];
    
    $users[] = $newUser;
    
    if (save_all_users($users)) {
        return ['success' => true, 'message' => 'Pendaftaran akun berhasil!', 'user' => $newUser];
    } else {
        return ['success' => false, 'message' => 'Gagal menyimpan data akun.'];
    }
}
