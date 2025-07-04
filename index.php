<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Selamat Ulang Tahun!</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <style>
      html {
        scroll-behavior: smooth;
      }
      /* Custom CSS untuk background cover dan overlay */
      .hero-section {
        background-image: url("https://source.unsplash.com/random/1920x1080?birthday"); /* Ganti dengan gambar ulang tahun Anda */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
      }
      .hero-section::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5); /* Overlay hitam transparan */
        z-index: 1;
      }
      .hero-content {
        position: relative;
        z-index: 2;
      }
      #navbar-menu {
        transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: hidden;
        max-height: 0;
      }
      #navbar-menu.show {
        max-height: 300px; /* Sesuaikan dengan tinggi menu */
      }
    </style>
  </head>
  <body class="font-sans antialiased bg-gray-100 text-gray-800">
    <!-- Navbar -->
    <nav class="bg-white shadow fixed w-full z-50 top-0 left-0">
      <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
          <div class="flex-shrink-0 font-bold text-pink-600 text-xl">Happy Birthday</div>
          <div class="hidden md:flex space-x-1">
            <a href="#home" class="text-gray-700 hover:text-pink-600 px-3 py-2 rounded transition">Home</a>
            <a href="#form" class="text-gray-700 hover:text-pink-600 px-3 py-2 rounded transition">Form</a>
            <a href="#ucapan" class="text-gray-700 hover:text-pink-600 px-3 py-2 rounded transition">Ucapan</a>
            <a href="admin.html" class="text-gray-700 hover:text-pink-600 px-3 py-2 rounded transition">Admin</a>
          </div>
          <!-- Hamburger -->
          <div class="md:hidden flex items-center">
            <button id="navbar-toggle" class="text-pink-600 hover:text-pink-800 focus:outline-none">
              <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
          </div>
        </div>
      </div>
      <!-- Mobile Menu -->
      <div id="navbar-menu" class="">
        <a href="#home" class="block text-center text-gray-700 hover:text-pink-600 px-3 py-2 rounded transition">Home</a>
        <a href="#form" class="block text-center text-gray-700 hover:text-pink-600 px-3 py-2 rounded transition">Form</a>
        <a href="#ucapan" class="block text-center text-gray-700 hover:text-pink-600 px-3 py-2 rounded transition">Ucapan</a>
        <a href="admin.html" class="block text-center text-gray-700 hover:text-pink-600 px-3 py-2 rounded transition">Admin</a>
      </div>
    </nav>
    <div class="h-16"></div>
    <!-- Spacer for fixed navbar -->

    <section id="home" class="hero-section min-h-screen flex items-center justify-center text-white py-16 px-4">
      <div class="hero-content text-center" data-aos="fade-up" data-aos-duration="1500">
        <h1 class="text-4xl md:text-6xl font-bold mb-4 leading-tight">Selamat Ulang Tahun, [Nama Orang yang Ultah]!</h1>
        <p class="text-xl md:text-2xl mb-8">Semoga hari istimewa ini dipenuhi dengan kebahagiaan dan tawa.</p>
        <button id="openMessageBtn" class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transition duration-300 transform hover:scale-105">Buka Pesan Spesial</button>
      </div>
    </section>

    <section id="form" class="py-16 px-4 bg-white">
      <div class="max-w-2xl mx-auto" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-6">Kirim Pesan Ucapan</h2>
        <form class="space-y-6" name="submit-to-google-sheet">
          <div>
            <label for="nama" class="block text-left text-gray-700 font-semibold mb-2">Nama</label>
            <input type="text" id="nama" name="nama" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400" />
          </div>
          <div>
            <label for="email" class="block text-left text-gray-700 font-semibold mb-2">Email</label>
            <input type="email" id="email" name="email" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400" />
          </div>
          <div>
            <label for="pesan" class="block text-left text-gray-700 font-semibold mb-2">Pesan</label>
            <textarea id="pesan" name="pesan" rows="4" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"></textarea>
          </div>
          <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transition duration-300 transform hover:scale-105 w-full">Kirim</button>
        </form>
      </div>
    </section>

    <section id="ucapan" class="py-16 px-4 bg-gray-50">
      <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-10" data-aos="fade-down" data-aos-duration="1000">Momen-momen Indah</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
          <div class="bg-white rounded-lg shadow-md overflow-hidden" data-aos="zoom-in" data-aos-duration="1000">
            <img src="https://source.unsplash.com/random/400x300?birthday-party-1" alt="Gambar Ulang Tahun 1" class="w-full h-48 object-cover" />
            <div class="p-4 text-center">
              <p class="text-gray-700">Kenangan Manis</p>
            </div>
          </div>
          <div class="bg-white rounded-lg shadow-md overflow-hidden" data-aos="zoom-in" data-aos-duration="1200">
            <img src="https://source.unsplash.com/random/400x300?birthday-cake-2" alt="Gambar Ulang Tahun 2" class="w-full h-48 object-cover" />
            <div class="p-4 text-center">
              <p class="text-gray-700">Kue Favorit</p>
            </div>
          </div>
          <div class="bg-white rounded-lg shadow-md overflow-hidden" data-aos="zoom-in" data-aos-duration="1400">
            <img src="https://source.unsplash.com/random/400x300?birthday-friends-3" alt="Gambar Ulang Tahun 3" class="w-full h-48 object-cover" />
            <div class="p-4 text-center">
              <p class="text-gray-700">Bersama Sahabat</p>
            </div>
          </div>
          <div class="bg-white rounded-lg shadow-md overflow-hidden" data-aos="zoom-in" data-aos-duration="1600">
            <img src="https://source.unsplash.com/random/400x300?birthday-gifts-4" alt="Gambar Ulang Tahun 4" class="w-full h-48 object-cover" />
            <div class="p-4 text-center">
              <p class="text-gray-700">Hadiah Spesial</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-16 px-4 bg-pink-500 text-white text-center">
      <div class="max-w-4xl mx-auto" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Terima Kasih!</h2>
        <p class="text-xl">Semoga hari Anda penuh kebahagiaan dan kenangan yang tak terlupakan.</p>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      // Inisialisasi AOS
      AOS.init();

      // SweetAlert2
      document.getElementById("openMessageBtn").addEventListener("click", function () {
        Swal.fire({
          title: "Pesan Spesial Untukmu!",
          html: "Hai [Nama Orang yang Ultah], Selamat ulang tahun yang ke-XX! 🎉 Semoga semua impianmu tercapai, selalu diberi kesehatan, dan kebahagiaan selalu menyertaimu. Kami sangat menyayangimu!",
          imageUrl: "https://source.unsplash.com/random/600x400?birthday-card", // Ganti dengan gambar kartu ucapan
          imageWidth: 400,
          imageHeight: 200,
          imageAlt: "Kartu Ulang Tahun",
          confirmButtonText: "Terima Kasih!",
          confirmButtonColor: "#EC4899", // Warna pink
          backdrop: `
                    rgba(0,0,123,0.4)
                    url("https://sweetalert2.github.io/images/nyan-cat.gif")
                    left top
                    no-repeat
                `,
        });
      });

      //   document.querySelector("form").addEventListener("submit", function (e) {
      //     e.preventDefault();
      //     Swal.fire({
      //       icon: "success",
      //       title: "Pesan Terkirim!",
      //       text: "Terima kasih atas ucapan dan doanya 😊",
      //       confirmButtonColor: "#EC4899",
      //     });
      //     this.reset();
      //   });

      // Navbar mobile toggle
      document.getElementById("navbar-toggle").addEventListener("click", function () {
        var menu = document.getElementById("navbar-menu");
        menu.classList.toggle("show");
      });
    </script>

    <script>
      const scriptURL = "https://script.google.com/macros/s/AKfycbxDhe7AfICZL7A9rHTnVNnH58r0lh6K7D54Dp23yaR7mzF0ulkpjOEKTlKMP8z5INs4dQ/exec";
      const form = document.forms["submit-to-google-sheet"];
      const submitBtn = form.querySelector('button[type="submit"]');
      // Buat tombol loading (hidden by default)
      let loadingBtn = form.querySelector(".loading-btn");
      if (!loadingBtn) {
        loadingBtn = document.createElement("button");
        loadingBtn.type = "button";
        loadingBtn.className = "bg-pink-600 loading-btn text-white font-bold py-3 px-8 rounded-full shadow-lg w-full flex items-center justify-center";
        loadingBtn.style.display = "none";
        loadingBtn.innerHTML = `
      <svg class="mr-3 animate-spin" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="white" stroke-width="4"></circle>
        <path class="opacity-75" fill="white" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
      </svg>
      Processing…
    `;
        submitBtn.parentNode.appendChild(loadingBtn);
      }

      form.addEventListener("submit", (e) => {
        e.preventDefault();
        // Tampilkan tombol loading, sembunyikan tombol submit
        submitBtn.style.display = "none";
        loadingBtn.style.display = "flex";

        fetch(scriptURL, { method: "POST", body: new FormData(form) })
          .then((response) => {
            // Sukses: tampilkan SweetAlert2, reset form, tombol kembali normal
            Swal.fire({
              icon: "success",
              title: "Pesan Terkirim!",
              text: "Terima kasih atas ucapan dan doanya 😊",
              confirmButtonColor: "#EC4899",
            });
            form.reset();
          })
          .catch((error) => {
            Swal.fire({
              icon: "error",
              title: "Gagal!",
              text: "Pesan gagal dikirim. Silakan coba lagi.",
              confirmButtonColor: "#EC4899",
            });
          })
          .finally(() => {
            // Kembalikan tombol submit, sembunyikan tombol loading
            submitBtn.style.display = "block";
            loadingBtn.style.display = "none";
          });
      });
    </script>
  </body>
</html>
