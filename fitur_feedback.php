<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="styleguide.css" />
    <link rel="stylesheet" href="style-feedback.css" />
</head>
<body>
    <div class="kepengurusan">
    <nav class="navigation">
        <div class="logo">
          <img class="group" src="img/group-1-2.png" />
          <div class="text">
            <div class="g"><div class="text-wrapper">Sosial</div></div>
            <div class="div-wrapper"><div class="div">Net</div></div>
          </div>
        </div>
        <div class="menu">
          <li class="item"><a class="label-2" href="home.php">Home</a></li>
          <li class="item layanan">
              <a class="label" href="#">Layanan</a>
              <ul class="dropdown-menu">
                  <li>
                      <a class="label" href="petugas/aturan_layanan.php">
                          <?php if ($_SESSION['level'] == 'petugas') { ?>
                              Input Aturan Layanan
                          <?php } else { ?>
                              Aturan Layanan
                          <?php } ?>
                      </a>
                  </li>
                  <li><a class="label" href="petugas/layanan.php">Spesifikasi Layanan</a></li>
              </ul>
          </li>

          <li class="item"><a class="label" href="#">Informasi</a></li>
          <li class="item"><a class="label" href="petugas/kepengurusan/staff.php">Kepengurusan</a></li>
          <li class="item"><a class="label" href="#tentang">Tentang</a></li>
          <li class="item"><a class="label" href="pengguna/feedback.php">Feedback</a></li>
        </div>
        <div class="frame">
            <div class="button" id="dropdownButton">
                <div class="text-2">
                  <?php $username = $_SESSION['username'];
                  echo "$username"; ?>
                </div>
                <img class="vuesax-outline-arrow" src="img/vuesax-outline-arrow-down-2.svg" />
            </div>
            <ul class="dropdown-menu-log" id="dropdownMenu">
                <li><a href="logout.php" class="label">Logout</a></li>
            </ul>
        </div>
      </nav>

      <div></div>

      
      <footer class="footer">
        <div class="frame-12">
          <div class="logo-2">
            <img class="group" src="img/group-1-3.png" />
            <div class="text">
              <div class="g"><div class="text-3">Sosial</div></div>
              <div class="div-wrapper"><div class="div">Net</div></div>
            </div>
          </div>
          <div class="frame-13">
            <div class="menu-2">
              <div class="heading-2">Fitur</div>
              <div class="list">
                <div class="item-2">Home</div>
                <div class="item-3">Layanan</div>
                <div class="item-3">Kepengurusan</div>
                <div class="item-3">Tentang</div>
                <div class="item-3">Artikel</div>
                <div class="item-3">Feedback</div>
              </div>
            </div>
            <div class="menu-2">
              <div class="heading-2">Jenis Layanan</div>
              <div class="list">
                <div class="item-2">Laporkan Pengaduan</div>
                <div class="item-3">Pengajuan Administrasi</div>
                <div class="item-3">Permintaan Layanan</div>
                <div class="item-3">Informasi Umum</div>
              </div>
            </div>
          </div>
        </div>
        <div class="link-wrapper">
          <div class="link">
            <img class="ic-baseline" src="img/ic-baseline-copyright.svg" />
            <p class="item-4">2024. All right reserved by: Della Fitria Lestari, Ninda, Irvianti Dwityara Sany</p>
          </div>
        </div>
      </footer>

    </div>
    
</body>
</html>