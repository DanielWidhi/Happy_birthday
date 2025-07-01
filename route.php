<?php
// Router sederhana
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'admin':
        require 'admin.php';
        break;
    case 'home':
        require 'index.php';
        break;
    // Tambahkan route lain di sini jika perlu
    default:
        echo '<h2>404 - Halaman tidak ditemukan</h2>';
        break;
}
