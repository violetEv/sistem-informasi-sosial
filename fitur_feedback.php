<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit;
}

$kode = isset($_GET['id']) ? $_GET['id'] : null;
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : null;
$tanggapan = isset($_POST['tanggapan']) ? $_POST['tanggapan'] : null;

// Query untuk mengambil feedback yang sudah ada dalam database
$query_feedback = "SELECT * FROM feedback";
$result_feedback = $koneksi->query($query_feedback);

$query_pengaduan = "SELECT * FROM pengaduan";
$result_feedback = $koneksi->query($query_feedback);

// Fungsi untuk menghapus feedback
if (isset($_GET['hapus'])) {
  $id_feedback = $_GET['hapus'];
  $sql_delete = "DELETE FROM feedback WHERE id='$id_feedback'";
  $koneksi->query($sql_delete);
  echo "<script>alert('Feedback berhasil dihapus');</script>";
  header("refresh:0;url=feedback.php");
}

if (isset($_POST['simpan'])) {
  if (empty($tanggapan) != true) {
    $sql = "INSERT INTO feedback (userId, tanggapan)
             values ('" . $username . "','" . $tanggapan . "')";
    $a = $koneksi->query($sql);
    if ($a === true) {
      echo "<script>alert('Berhasil Memberi Feedback!');</script>";
      header("refresh:2;url=feedback.php");
    } else {
      echo "<script>alert('Gagal Mengirim Feedback!');</script>";
      header("refresh:2;url=feedback.php");
    }
  } else {
    echo "<script>alert('Ada Input yang Kosong!');</script>";
    echo "<script>location('feedback.php?status=gagal');</script>";
  }
} else {
  echo "<script>location('feedback.php');</script>";
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
  <link rel="stylesheet" href="style-fitur-feedback.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <div class="feedback">
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

        <li class="item"><a class="label" href="#">Informasi</a></li>
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
      <div class="paragraph-container">
        <p class="heading">Feedback Platform<br />SosialNet</p>
        <p class="description">Berikan feedback mengenai pengalaman Anda dengan layanan kami, sehingga kami dapat terus memperbaiki dan menyempurnakan kinerja kami di masa depan!</p>
      </div>

      <form class="form-isi" id="aturanForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <?php
        $a = mysqli_query($koneksi, "select * from user where username='$_SESSION[username]'");
        $tampil = mysqli_fetch_array($a);
        ?>
        <div class="frame-3">
          <div class="div-2">
            <div class="alert alert-warning" role="alert" style="width:98.5%;">
              Beri Review atau feedback terkait kinerja kami, agar menjadi bahan evaluasi kami kedepannya:)
            </div>
            <div class="frame-4">
              <div class="text-wrapper-3">Username</div>
              <div class="field-form-isi">
                <input type="text" class="form-input" placeholder="Otomatis oleh sistem" name="username" value="<?= $nama ?>" disabled>
              </div>
            </div>
            <div class="frame-4">
              <div class="text-wrapper-3">Tangggapan</div>
              <div class="field-form-isi">
                <textarea type="text" class="form-input" style="resize: vertical; width: 100%; max-width: 100%; min-width: 100%; min-height: 180px;" value="<?= @$vdesk ?>" placeholder="Masukkan tanggapan minimal 200 kata" <?= @$vdesk ?> name="deskripsi" required></textarea>
              </div>
            </div>
            <div class=" frame-7">
              <button type="submit" class="button" onclick="return validateForm()">
                <div class="text-3">Simpan</div>
              </button>
              <button class="button-2" type="button" id="resetButton"><span class="text-4">Reset</span></button>
            </div>
          </div>
      </form>
    </div>
    <br>
    <?php if ($_SESSION['level'] == 'petugas' || $_SESSION['level'] == 'warga') { ?>
      <div class="heading-2">Daftar Feedback </div>
      <div class="frame-3">
        <div class="div-2" style="width: 100%;">
          <?php while ($row = mysqli_fetch_assoc($result_feedback)) { ?>
            <div class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><?= $row['userId'] ?></h5>
              </div>
              <p class="mb-1"><?= $row['tanggapan'] ?></p>
              <!-- Tampilkan tombol hapus hanya jika level pengguna adalah 'warga' -->
              <?php $isOwner = $row['userId'] == $username = $_SESSION['username']; ?>
              <?php if ($isOwner) { ?>
                <a href="?hapus=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
              <?php } ?>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php } ?>
  </div>


  <footer class="footer">
    <div class="frame-16">
      <div class="logo-2">
        <img class="group" src="img/group-1-3.png" />
        <div class="text">
          <div class="g">
            <div class="text-7">Sosial</div>
          </div>
          <div class="div-wrapper">
            <div class="div">Net</div>
          </div>
        </div>
      </div>
      <div class="frame-17">
        <div class="menu-2">
          <div class="heading-3">Fitur</div>
          <div class="div-2">
            <div class="item-2">Home</div>
            <div class="item-3">Layanan</div>
            <div class="item-3">Kepengurusan</div>
            <div class="item-3">Tentang</div>
            <div class="item-3">Artikel</div>
            <div class="item-3">Feedback</div>
          </div>
        </div>
        <div class="menu-2">
          <div class="heading-3">Jenis Layanan</div>
          <div class="div-2">
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