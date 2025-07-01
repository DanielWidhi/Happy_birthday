<?php
    session_start();

    // Konfigurasi login admin (hardcode)
    $ADMIN_USER = 'admin';
    $ADMIN_PASS = 'password123';

    // Fungsi cek login
    function is_logged_in()
    {
        return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
    }

    // Proses login
    if (isset($_POST['login'])) {
        $user = $_POST['username'] ?? '';
        $pass = $_POST['password'] ?? '';
        if ($user === $ADMIN_USER && $pass === $ADMIN_PASS) {
            $_SESSION['admin_logged_in'] = true;
            header('Location: admin.php');
            exit;
        } else {
            $error = 'Username atau password salah!';
        }
    }

    // Proses logout
    if (isset($_GET['logout'])) {
        session_destroy();
        header('Location: admin.php');
        exit;
    }

    // Jika belum login, tampilkan form login
    if (! is_logged_in()) {
    ?>
    <h2>Login Admin</h2>
    <?php if (! empty($error)) {
                echo '<p style="color:red">' . $error . '</p>';
            }
        ?>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit" name="login">Login</button>
    </form>
    <?php
        exit;
        }

        // Setelah login, tampilkan dashboard CRUD gambar
    ?>
<h2>Dashboard Admin - CRUD Gambar</h2>
<a href="?logout=1">Logout</a>
<hr>

<!-- Form tambah gambar -->
<h3>Tambah Gambar</h3>
<form method="post" enctype="multipart/form-data" action="admin.php">
    <input type="text" name="judul" placeholder="Judul" required><br><br>
    <input type="text" name="deskripsi" placeholder="Deskripsi" required><br><br>
    <input type="text" name="url" placeholder="URL Gambar" required><br><br>
    <button type="submit" name="tambah">Tambah</button>
</form>

<!-- Daftar gambar (akan diambil dari Google Spreadsheet) -->
<h3>Daftar Gambar</h3>
<div id="gambar-list">
    <p>Integrasi Google Spreadsheet akan ditambahkan di langkah berikutnya.</p>
</div>
