<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function get_all_users() {
    $default_users = [
        [
            'id' => 1,
            'name' => 'Mahasiswa UNJ',
            'username' => 'mahasiswa_unj',
            'email' => 'demo@unj.ac.id',
            'password' => '$2y$10$jWh4w1bST3RGz.w3e882eu.OnyLrdq1tLym7DS.TuuNA6a2vP1EYS',
            'bio' => 'Mahasiswa S1 Ilmu Komputer UNJ. Belajar web development murni PHP Session, HTML, CSS!',
            'avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80',
            'created_at' => '2026-10-24 12:00:00'
        ]
    ];

    if (!isset($_SESSION['registered_users']) || !is_array($_SESSION['registered_users'])) {
        $_SESSION['registered_users'] = [];
    }

    return array_merge($default_users, $_SESSION['registered_users']);
}

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
    
    if (!isset($_SESSION['registered_users']) || !is_array($_SESSION['registered_users'])) {
        $_SESSION['registered_users'] = [];
    }
    
    $_SESSION['registered_users'][] = $newUser;
    
    return ['success' => true, 'message' => 'Akun berhasil dibuat! Silakan masuk.', 'user' => $newUser];
}
