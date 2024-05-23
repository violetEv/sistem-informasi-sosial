<?php
include "koneksi.php";
if (empty($_SESSION))
  session_start();

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit;
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Home</title>
  <link rel="stylesheet" href="globals.css" />
  <link rel="stylesheet" href="styleguide.css" />
  <link rel="stylesheet" href="style-home.css" />
</head>

<body>
  <div class="home">
    <nav class="navigation">
      <div class="logo">
        <img class="group" src="img/group-1-2.png" />
        <div class="text">
          <div class="g">
            <div class="text-wrapper">Sosial</div>
          </div>
          <div class="div-wrapper">
            <div class="div">Net</div>
          </div>
        </div>
      </div>
      <div class="menu">
        <li class="item"><a class="label-2" href="home.php">Home</a></li>
        <li class="item layanan">
          <a class="label" href="#">Layanan</a>
          <ul class="dropdown-menu">
            <li>
              <a class="label" href="aturan_layanan.php">
                <?php if ($_SESSION['level'] == 'petugas') { ?>
                  Input Aturan Layanan
                <?php } else { ?>
                  Aturan Layanan
                <?php } ?>
              </a>
            </li>
            <li><a class="label" href="spesifikasi_layanan.php">Spesifikasi Layanan</a></li>
          </ul>
        </li>
        <li class="item">
          <a href="<?php echo ($_SESSION['level'] == 'petugas') ? 'artikel-admin.php' : 'artikel-user.php'; ?>" class="label">Informasi</a>
        </li>
        <li class="item"><a class="label" href="petugas/kepengurusan/staff.php">Kepengurusan</a></li>
        <li class="item"><a class="label" href="#tentang">Tentang</a></li>
        <li class="item"><a class="label" href="fitur_feedback.php">Feedback</a></li>
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
    <div class="frame-2-1">
      <div class="BG-wrapper"><img class="BG" src="img/bg.png" /></div>
      <div class="container">
        <div class="container-2">
          <p class="heading">Platform Informasi dan Pelayanan Publik</p>
          <p class="description">
            Platform pelayanan publik yang mengabdi untuk kesejahteraan bersama, bersuara untuk perubahan positif
          </p>
        </div>
        <a class="button-2" href="#target-card2">
          <div class="text-3">Jelajahi Sekarang</div>
        </a>
      </div>
      <div class="card">
        <div class="div-2">
          <div class="switch-container-wrapper">
            <div class="div-2"><img class="switch" src="img/switch.png" /></div>
          </div>
        </div>
      </div>

    </div>

    <div id="target-card2" class="card-2">
      <div class="paragraph-container">
        <div class="pre-title">Layanan</div>
        <div class="heading-2">Suara Anda, Prioritas Kami!</div>
        <p class="p">
          Layanan untuk pelaporan masalah dan pengajuan administratif, serta permintaan terkait pelayanan yang belum
          tersedia, memudahkan mengungkapkan kebutuhan dan aspirasi melalui pengelolaan pelayanan yang lebih baik.
        </p>
      </div>
      <div class="vertical-container">
        <div class="card-3">
          <div class="div-3">
            <img class="img" src="img/vuesax-outline-edit-1.svg" />
            <div class="div-4">
              <div class="heading-3">Laporkan Aduan</div>
              <p class="p">Laporkan keresahanmu dan sertakan bukti, kemudian dapatkan respon cepat.</p>
            </div>
            <button class="button"><a href="pengguna/pengaduan.php" class="text-4">Tambah</a></button>
          </div>
          <div class="div-3">
            <img class="img" src="img/vuesax-outline-document-copy-1.svg" />
            <div class="div-4">
              <div class="heading-3">Ajukan Administrasi</div>
              <p class="p">Isi persyaratan yang diminta dan pastikan biodata kamu benar.</p>
            </div>
            <button class="button"><a href="pengguna/administrasi.php" class="text-4">Tambah</a></button>
          </div>
        </div>
        <div class="card-4">
          <div class="div-3">
            <img class="img" src="img/vuesax-outline-clipboard-export-1.svg" />
            <div class="div-4">
              <div class="heading-3">Ajukan Layanan</div>
              <p class="p">Ingin layanan yang belum tersedia? Segera beri tahu kami!</p>
            </div>
            <button class="button"><a href="pengguna/tambahan.php" class="text-4">Tambah</a></button>
          </div>
          <div class="div-3">
            <img class="img" src="img/vuesax-outline-clipboard-text-1.svg" />
            <div class="div-4">
              <div class="heading-3">Cek Hasil Layanan</div>
              <p class="p">Lihat hasil layanan Anda yang telah direspon petugas.</p>
            </div>
            <button class="button"><a href="#" class="text-4">Tambah</a></button>
          </div>
        </div>
      </div>
    </div>
    <div class="frame-2">
      <div class="paragraph-container-2">
        <div class="heading-4">Informasi Sosial Dan <br />keamanan</div>
        <p class="description-2">
          Isu-isu sosial dan keamanan untuk memahami dinamika masyarakat dan upaya perlindungan.
        </p>
        <div class="frame-3">
          <?php if ($_SESSION['level'] == 'petugas') { ?>
            <button class="button"><a href="artikel-admin.php" class="text-4">Kelola Informasi</a></button>
          <?php } ?>
          <?php if ($_SESSION['level'] == 'warga') { ?>
            <button class="button">
              <div class="text-4">Jelajahi Informasi</div>
            </button>
          <?php } ?>
          <a href="<?php echo ($_SESSION['level'] == 'petugas') ? 'artikel-admin.php#lihat-artikel' : 'artikel-user.php'; ?>" class="button-3">
            <div class="text-5">Lihat Semua</div>
          </a>
        </div>
      </div>
      <div class="frame-4">
        <div class="frame-5">
          <?php
          // Fetch existing data from the database for Kategori
          $query_1 = "SELECT * FROM artikel WHERE kategori IN ('bansos', 'keamanan') ORDER BY tanggal ASC LIMIT 1";
          $result_1 = $koneksi->query($query_1);
          while ($row_1 = $result_1->fetch_assoc()) { ?>
            <img class="image-placeholder" src="<?php echo $row_1['gambar']; ?>" />
            <div class="frame-6">
              <div class="frame-7">
                <div class="frame-8">
                  <div class="penulis"><?php echo empty($row_1["nama"]) ? $row_1['userId'] : $row_1["nama"]; ?></div>
                  <div class="text-wrapper-5"><?php echo $row_1['tanggal']; ?></div>
                </div>
                <div class="frame-9">
                  <p class="how-to-make-a-game">
                    <?php echo $row_1['judul']; ?>
                  </p>
                  <p class="text-wrapper-3">
                    <?php
                    // Limit deskripsi maksimal 3 kalimat
                    $deskripsi_1 = $row_1['deskripsi'];
                    $deskripsi_1 = implode(' ', array_slice(explode(' ', $deskripsi_1), 0, 20));
                    echo $deskripsi_1 . "...";
                    ?>
                  </p>
                </div>
              </div>
              <?php
              // Periksa apakah link kosong atau tidak valid
              if (!empty($row_1['link']) && filter_var($row_1['link'], FILTER_VALIDATE_URL)) { ?>
                <a href="<?php echo $row_1['link']; ?>" class="button-3">Selengkapnya ...</a>
              <?php } else { ?>
                <a href="detail-artikel.php?id=<?php echo $row_1['id']; ?>" class="button-3">Selengkapnya ...</a>
              <?php } ?>
            </div>
          <?php } ?>
        </div>
        <div class="frame-11">
          <div class="text-wrapper-4">Bantuan Sosial</div>
        </div>
        <div class="frame-12">
          <?php
          // Fetch existing data from the database for Kategori Bansos
          $query_bansos = "SELECT * FROM artikel WHERE kategori = 'bansos' ORDER BY tanggal DESC LIMIT 3";
          $result_bansos = $koneksi->query($query_bansos);
          while ($row_bansos = $result_bansos->fetch_assoc()) { ?>
            <div class="frame-13">
              <img class="mask-group" src="<?php echo $row_bansos['gambar']; ?>" />
              <div class="frame-14">
                <div class="div-5">
                  <div class="frame-8">
                    <div class="penulis"><?php echo empty($row_bansos["nama"]) ? $row_bansos['userId'] : $row_bansos["nama"]; ?></div>
                    <div class="text-wrapper-5"><?php echo $row_bansos['tanggal']; ?></div>
                  </div>
                  <div class="frame-15">
                    <p class="element-rules-of"><?php echo $row_bansos['judul']; ?></p>
                    <p class="text-wrapper-6">
                      <?php
                      // Limit deskripsi maksimal 3 kalimat
                      $deskripsi_bansos = $row_bansos['deskripsi'];
                      $deskripsi_bansos = implode(' ', array_slice(explode(' ', $deskripsi_bansos), 0, 20));
                      echo $deskripsi_bansos . "...";
                      ?>
                    </p>
                  </div>
                </div>
                <?php
                // Periksa apakah link kosong atau tidak valid
                if (!empty($row_bansos['link']) && filter_var($row_bansos['link'], FILTER_VALIDATE_URL)) { ?>
                  <a href="<?php echo $row_bansos['link']; ?>" class="link-detail">Selengkapnya ...</a>
                <?php } else { ?>
                  <a href="detail-artikel.php?id=<?php echo $row_bansos['id']; ?>" class="link-detail">Selengkapnya ...</a>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        </div>
        <div class="frame-4">
          <div class="frame-11">
            <div class="text-wrapper-4">Keamanan</div>
          </div>
          <div class="frame-12">
            <?php
            // Fetch existing data from the database for Kategori Keamanan
            $query_keamanan = "SELECT * FROM artikel WHERE kategori = 'keamanan' ORDER BY tanggal DESC LIMIT 3";
            $result_keamanan = $koneksi->query($query_keamanan);
            while ($row_keamanan = $result_keamanan->fetch_assoc()) { ?>
              <div class="frame-13">
                <img class="mask-group" src="<?php echo $row_keamanan['gambar']; ?>" />
                <div class="frame-14">
                  <div class="div-5">
                    <div class="frame-8">
                      <div class="penulis"><?php echo empty($row_keamanan["nama"]) ? $row_keamanan['userId'] : $row_keamanan["nama"]; ?></div>
                      <div class="text-wrapper-5"><?php echo $row_keamanan['tanggal']; ?></div>
                    </div>
                    <div class="frame-15">
                      <p class="element-rules-of"><?php echo $row_keamanan['judul']; ?></p>
                      <p class="text-wrapper-6">
                        <?php
                        // Limit deskripsi maksimal 3 kalimat
                        $deskripsi_keamanan = $row_keamanan['deskripsi'];
                        $deskripsi_keamanan = implode(' ', array_slice(explode(' ', $deskripsi_keamanan), 0, 20));
                        echo $deskripsi_keamanan . "...";
                        ?>
                      </p>
                    </div>
                  </div>
                  <?php
                  // Periksa apakah link kosong atau tidak valid
                  if (!empty($row_keamanan['link']) && filter_var($row_keamanan['link'], FILTER_VALIDATE_URL)) { ?>
                    <a href="<?php echo $row_keamanan['link']; ?>" class="link-detail">Selengkapnya ...</a>
                  <?php } else { ?>
                    <a href="detail-artikel.php?id=<?php echo $row_keamanan['id']; ?>" class="link-detail">Selengkapnya ...</a>
                  <?php } ?>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="checkbox" id="tentang">
      <div class="vertical-container-2">
        <div class="div-5">
          <div class="heading-5">Sosialnet Platform</div>
          <p class="p">
            Membantu masyarakat mendapatkan informasi terbaru serta menangani pengaduan dan administrasi tanpa
            mengganggu aktivitas sehari-hari.
          </p>
        </div>
        <div class="div-4">
          <div class="div-6">
            <div class="vuesax-outline-check">
              <img class="vuesax-outline-check-2" src="img/vuesax-outline-check-1.svg" />
            </div>
            <div class="description-3">Meningkatkan aksesibilitas dan efisiensi</div>
          </div>
          <div class="div-6">
            <img class="vuesax-outline-check" src="img/vuesax-outline-check-4.svg" />
            <p class="description-3">Menangani pengaduan serta layanan administrasi</p>
          </div>
          <div class="div-6">
            <img class="vuesax-outline-check" src="img/vuesax-outline-check-4.svg" />
            <div class="description-3">Memberikan informasi terbaru</div>
          </div>
          <div class="div-6">
            <img class="vuesax-outline-check" src="img/vuesax-outline-check-4.svg" />
            <p class="description-3">Pemahaman yang lebih baik tentang prosedur</p>
          </div>
        </div>
      </div>
      <div class="image-wrapper"><img class="image" src="img/image.png" /></div>
    </div>
    <footer class="footer">
      <div class="frame-16">
        <div class="logo-2">
          <img class="group" src="img/group-1-3.png" />
          <div class="text">
            <div class="g">
              <div class="text-6">Sosial</div>
            </div>
            <div class="div-wrapper">
              <div class="div">Net</div>
            </div>
          </div>
        </div>
        <div class="frame-17">
          <div class="menu-2">
            <div class="heading-6">Fitur</div>
            <div class="div-4">
              <div class="item-2">Home</div>
              <div class="item-3">Layanan</div>
              <div class="item-3">Kepengurusan</div>
              <div class="item-3">Tentang</div>
              <div class="item-3">Artikel</div>
              <div class="item-3">Feedback</div>
            </div>
          </div>
          <div class="menu-2">
            <div class="heading-6">Jenis Layanan</div>
            <div class="div-4">
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