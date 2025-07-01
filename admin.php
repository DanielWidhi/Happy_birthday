<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login & CRUD Gambar</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background: #f4f4f4;
        margin: 0;
        padding: 0;
      }
      .container {
        max-width: 400px;
        margin: 40px auto;
        background: #fff;
        padding: 24px;
        border-radius: 8px;
        box-shadow: 0 2px 8px #0001;
      }
      h2 {
        text-align: center;
      }
      input,
      button {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        border-radius: 4px;
        border: 1px solid #ccc;
      }
      button {
        background: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
      }
      button:hover {
        background: #0056b3;
      }
      .hidden {
        display: none;
      }
      .gambar-list img {
        max-width: 100px;
        margin: 4px;
      }
      .gambar-item {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 8px;
      }
      .gambar-item button {
        width: auto;
        padding: 4px 8px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div id="login-section">
        <h2>Login Admin</h2>
        <input type="text" id="username" placeholder="Username" required />
        <input type="password" id="password" placeholder="Password" required />
        <button onclick="loginAdmin()">Login</button>
        <div id="login-error" style="color: red"></div>
      </div>

      <div id="dashboard-section" class="hidden">
        <h2>Dashboard Admin</h2>
        <button onclick="logoutAdmin()" style="background: #dc3545">Logout</button>
        <hr />
        <h3>Tambah Gambar</h3>
        <input type="text" id="judul" placeholder="Judul" required />
        <input type="text" id="deskripsi" placeholder="Deskripsi" required />
        <input type="file" id="file" accept="image/*" required />
        <button onclick="tambahGambar()">Tambah</button>
        <div id="crud-error" style="color: red"></div>
        <hr />
        <h3>Daftar Gambar</h3>
        <div id="gambar-list"></div>
      </div>
    </div>

    <script>
      // Cek login dari localStorage (simulasi session)
      if (localStorage.getItem("admin_logged_in") === "true") {
        showDashboard();
      }

      function loginAdmin() {
        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;
        // Static username & password
        const staticUser = "admin";
        const staticPass = "password123";
        if (username === staticUser && password === staticPass) {
          localStorage.setItem("admin_logged_in", "true");
          showDashboard();
        } else {
          document.getElementById("login-error").innerText = "Username atau password salah!";
        }
      }

      function logoutAdmin() {
        localStorage.removeItem("admin_logged_in");
        fetch("admin.php?ajax=1&action=logout");
        document.getElementById("dashboard-section").classList.add("hidden");
        document.getElementById("login-section").classList.remove("hidden");
      }

      function showDashboard() {
        document.getElementById("login-section").classList.add("hidden");
        document.getElementById("dashboard-section").classList.remove("hidden");
        loadGambar();
      }

      function tambahGambar() {
        const judul = document.getElementById("judul").value;
        const deskripsi = document.getElementById("deskripsi").value;
        const fileInput = document.getElementById("file");
        if (!fileInput.files[0]) {
          document.getElementById("crud-error").innerText = "Pilih file gambar!";
          return;
        }
        const formData = new FormData();
        formData.append("ajax", "1");
        formData.append("action", "tambah");
        formData.append("judul", judul);
        formData.append("deskripsi", deskripsi);
        formData.append("file", fileInput.files[0]);
        fetch("admin.php", {
          method: "POST",
          body: formData,
        })
          .then((res) => res.json())
          .then((data) => {
            if (data.success) {
              loadGambar();
              document.getElementById("judul").value = "";
              document.getElementById("deskripsi").value = "";
              document.getElementById("file").value = "";
              document.getElementById("crud-error").innerText = "";
            } else {
              document.getElementById("crud-error").innerText = data.message || "Gagal menambah gambar";
            }
          });
      }

      function loadGambar() {
        fetch("admin.php?ajax=1&action=list")
          .then((res) => res.json())
          .then((data) => {
            const list = document.getElementById("gambar-list");
            list.innerHTML = "";
            if (data.gambar && data.gambar.length > 0) {
              data.gambar.forEach((g, idx) => {
                // g.foto adalah nama file gambar di folder uploads
                list.innerHTML += `<div class='gambar-item'>
                        <img src='uploads/${g.foto}' alt='' />
                        <b>${g.judul}</b> - <span>${g.deskripsi}</span>
                        <button onclick='hapusGambar(${idx})' style='background:#dc3545;'>Hapus</button>
                    </div>`;
              });
            } else {
              list.innerHTML = "<i>Belum ada gambar</i>";
            }
          });
      }

      function hapusGambar(idx) {
        fetch("admin.php", {
          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          body: `ajax=1&action=hapus&idx=${idx}`,
        })
          .then((res) => res.json())
          .then((data) => {
            if (data.success) {
              loadGambar();
            } else {
              alert(data.message || "Gagal menghapus gambar");
            }
          });
      }
    </script>
  </body>
</html>
