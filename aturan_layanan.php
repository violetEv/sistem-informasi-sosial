<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit;
}

$kode = isset($_GET['id']) ? $_GET['id'] : null;
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : null;
$jenis = isset($_POST['jenis']) ? $_POST['jenis'] : null;
$deskripsi = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : null;
$file_name = isset($_FILES['data']['name']) ? $_FILES['data']['name'] : null;
$file_tmp = isset($_FILES['data']['tmp_name']) ? $_FILES['data']['tmp_name'] : null;
$direktori = "template/";
$linkberkas = $direktori . $file_name;

if (isset($_POST['simpan'])) {
  if (!empty($jenis) && !empty($deskripsi) && !empty($file_name)) {
    if (isset($_GET['hal']) && $_GET['hal'] == "edit") {
      $query = "UPDATE aturan_layanan SET
           id_layanan = '$jenis',
           aturan = '$deskripsi',
           template_data = '$file_name',
           petugas = '$nama'
           WHERE aturan_layanan.id = '$kode'";
      $edit = mysqli_query($koneksi, $query) or die("Error in query: $query");
      $terupload = move_uploaded_file($file_tmp, $linkberkas);

      if ($edit && $terupload) {
        echo "<script>alert('Berhasil Memperbarui Pengaduan!');</script>";
        // echo "<script>location.replace('aturan_layanan.php');</script>";
        header("refresh:2;url=aturan_layanan.php");
      } else {
        echo "<script>alert('Edit Data Gagal!');</script>";
        // echo "<script>location.replace('aturan_layanan.php');</script>";
        header("refresh:2;url=aturan_layanan.php");
      }
    } else {

      $sql = "INSERT INTO aturan_layanan (id_layanan, aturan, template_data,petugas)
           values ('" . $jenis . "','" . $deskripsi . "','" . $file_name . "','" . $nama . "')";
      $a = $koneksi->query($sql);
      if ($a === true) {
        move_uploaded_file($file_tmp, $linkberkas);
        echo "<script>alert('Berhasil Mengirim Aturan Layanan!');</script>";
        // echo "<script>location('aturan_layanan.php?status=sukses');</script>";
        header("refresh:2;url=aturan_layanan.php");
      } else {
        echo "<script>alert('Gagal Mengirim Aturan!');</script>";
        // echo "<script>location('aturan_layanan.php?status=gagal');</script>";
        header("refresh:2;url=aturan_layanan.php");
      }
    }
  } else {
    echo "<script>alert('Ada Input yang Kosong!');</script>";
    echo "<script>history.back();</script>";
    // echo "<script>location('aturan_layanan.php?status=gagal');</script>";
  }
} else {
  // echo "<script>alert('Isi Form / Gagal Mengirim Pengaduan!');</script>";
  echo "<script>location('aturan_layanan.php');</script>";
}

// tombol edit tabel
if (isset($_GET['hal'])) {
  if ($_GET['hal'] == "edit") {
    $b = mysqli_query($koneksi, "SELECT * FROM aturan_layanan WHERE id='$kode'");
    $data = mysqli_fetch_array($b);
    if ($data) {
      $vjenis = $data['id_layanan'];
      $vdesk = $data['aturan'];
      $vdata = $data['template_data'];
    }
  } elseif ($_GET['hal'] == "hapus") {
    $hapus = mysqli_query($koneksi, "DELETE FROM aturan_layanan WHERE id='$kode'");
    if ($hapus) {
      echo "<script>
              alert('Hapus Data Sukses!');
              location='aturan_layanan.php';
              </script>";
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>Aturan Layanan</title>
  <link rel="stylesheet" href="globals.css" />
  <link rel="stylesheet" href="styleguide.css" />
  <link rel="stylesheet" href="style-aturan-layanan.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
  <div class="aturan-layanan">
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
        <p class="heading">Aturan Pelayanan <br />SosialNet</p>
        <p class="description">Panduan yang mengatur prosedur pengaduan dan layanan administrasi yang memastikan keteraturan dan pemahaman yang jelas.</p>
      </div>
      <?php
      $a = mysqli_query($koneksi, "select * from user where username='$_SESSION[username]'");
      $tampil = mysqli_fetch_array($a); ?>


      <?php if ($_SESSION['level'] == 'petugas') { ?>
        <form class="form-isi" id="aturanForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
          <div class="frame-3">

            <div class="div-2">
              <div class="frame-4">
                <div class="text-wrapper-3">Pelayanan</div>
                <div class="field-form-dropdown">
                  <select class="form-dropdown" name="jenis" value="<?= $vjenis ?>" required>
                    <?php
                    include "../koneksi.php";
                    $a = "SELECT * FROM layanan";
                    $b = mysqli_query($koneksi, $a);
                    while ($c = $b->fetch_array()) { ?>
                      <option value="<?php echo $c['id']; ?>"> <?php echo $c['spesifikasi']; ?></option>
                    <?php } ?>
                  </select>
                  <span class="dropdown-icon"></span>
                </div>
              </div>
              <div class="frame-4">
                <div class="text-wrapper-3">Aturan dasar</div>
                <div class="field-form-isi">
                  <textarea type="text" class="form-input" style="resize: vertical; width: 100%; max-width: 100%; min-width: 100%; min-height: 180px;" value="<?= @$vdesk ?>" placeholder="Masukkan deskripsi minimal 200 kata" <?= @$vdesk ?> name="deskripsi" required></textarea>
                </div>
              </div>
              <div class="frame-4">
                <div class="text-wrapper-3">Data pendukung</div>
                <div class="field-up">
                  <div class="smithy-weber-wrapper">
                    <label for="datar" class="file-label">Choose file</label>
                    <input type="file" class="file-input" name="data" value="<?= @$vdata ?>" id="formFileMultiple" accept="" required>
                  </div>
                  <div class="frame-6">
                    <div class="smithy-weber" ">No file chosen</div>
                  </div>
                </div>
              </div>

              <div class=" frame-7">
                      <button type="submit" class="button" onclick="return validateForm()">
                        <div class="text-3">Simpan</div>
                      </button>
                      <button class="button-2" type="button" id="resetButton"><span class="text-4">Reset</span></button>
                    </div>
                  </div>
                </div>
        </form>
      <?php } ?>
      <br>
      <div class="heading-2">Daftar Persyaratan & Aturan</div>
      <div class="frame-3">
        <div class="wrapper-table">
          <table class="table">
            <tr class="text-wrapper-2" style="background-color: var(  --stroke); border-radius:30%">
              <th class="text-wrapper-2">No.</th>
              <th class="text-wrapper-2">Pelayanan</th>
              <th class="text-wrapper-2">Spesifikasi</th>
              <th class="text-wrapper-2" style="width: 28%;">Syarat dan ketentuan</th>
              <th class="text-wrapper-2">Format Pendukung</th>
              <?php if ($_SESSION['level'] == 'petugas') { ?>
                <th class="text-wrapper-2">Aksi</th>
              <?php } ?>
            </tr>
            <?php
            $no = 1;
            $a = mysqli_query($koneksi, "SELECT aturan_layanan.id,layanan.jenis,spesifikasi,aturan,template_data FROM aturan_layanan
                                                INNER JOIN layanan ON aturan_layanan.id_layanan=layanan.id");
            while ($tampil = mysqli_fetch_array($a)) : ?>
              <tr>
                <td class="text-wrapper-2"><?= $no++ ?></td>
                <td class="text-wrapper-2"><?= $tampil['jenis'] ?></td>
                <td class="text-wrapper-2"><?= $tampil['spesifikasi'] ?></td>
                <td class="text-wrapper-2" style="text-align: justify; white-space: pre-wrap;"><?= nl2br($tampil['aturan'])  ?></td>
                <td class="text-wrapper-2"><a href="downloadfile.php?url=<?= $tampil['template_data']; ?>"><?php echo $tampil['template_data']; ?></a></td>
                <!-- <td><?= $tampil['template_data'] ?></td> -->
                <?php if ($_SESSION['level'] == 'petugas') { ?>
                  <td class="text-wrapper-2">
                    <a href="aturan_layanan.php?hal=edit&id=<?= $tampil['id'] ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="aturan_layanan.php?hal=hapus&id=<?= $tampil['id'] ?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')" name="hapus" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                  </td>
                <?php } ?>
              </tr>
            <?php endwhile; ?>
          </table>
        </div>
      </div>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>