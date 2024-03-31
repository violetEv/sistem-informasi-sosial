<?php
include "koneksi.php";
if (empty($_SESSION))
  session_start();

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit;
}

$nama = $_SESSION['nama'];

// Cek apakah halaman diakses untuk edit artikel
if (isset($_GET['hal']) && $_GET['hal'] == 'edit' && isset($_GET['id'])) {
  $id_artikel = $_GET['id'];
  
  // Ambil data artikel dari database berdasarkan ID
  $query_artikel = "SELECT * FROM artikel WHERE id = '$id_artikel'";
  $result_artikel = $koneksi->query($query_artikel);

  // Periksa apakah artikel ditemukan
  if ($result_artikel->num_rows > 0) {
      $data_artikel = $result_artikel->fetch_assoc();
      // Isi nilai-nilai default pada form
      $kategori = $data_artikel['kategori'];
      $link = $data_artikel['link'];
      $judul = $data_artikel['judul'];
      $deskripsi = $data_artikel['deskripsi'];
      ?>

  <?php
  } else {
      echo "Artikel tidak ditemukan.";
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['artikel_id'])) {
    $artikel_id = $_POST['artikel_id'];
    $kategori = $_POST['kategori'];
    $link = $_POST['link'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar_edit']['name'];

    if (!empty($gambar)) {
        $gambar_tmp = $_FILES['gambar_edit']['tmp_name'];
        $gambar_path = "uploads-gambar/" . $gambar;
        if (move_uploaded_file($gambar_tmp, $gambar_path)) {
            $sql_update = "UPDATE artikel SET kategori = '$kategori', link = '$link', judul = '$judul', deskripsi = '$deskripsi', gambar = '$gambar_path' WHERE id = '$artikel_id'";
        } else {
            $sql_update = "UPDATE artikel SET kategori = '$kategori', link = '$link', judul = '$judul', deskripsi = '$deskripsi' WHERE id = '$artikel_id'";
        }
    } else {
        $sql_update = "UPDATE artikel SET kategori = '$kategori', link = '$link', judul = '$judul', deskripsi = '$deskripsi' WHERE id = '$artikel_id'";
    }

    if ($koneksi->query($sql_update) === TRUE) {
        echo "<script>alert('Artikel berhasil diperbarui.');</script>";
    } else {
        echo "<script>alert('Error: Artikel gagal diperbarui.');</script>";
    }
  } elseif (isset($_POST['hapus_artikel_id'])) {
      $artikel_id = $_POST['hapus_artikel_id'];
      $sql_delete = "DELETE FROM artikel WHERE id = '$artikel_id'";

      if ($koneksi->query($sql_delete) === TRUE) {
          echo "<script>alert('Artikel berhasil dihapus.');</script>";
      } else {
          echo "<script>alert('Error: Artikel gagal dihapus.');</script>";
      }
  } elseif (isset($_POST['kategori']) && isset($_POST['link']) && isset($_POST['judul']) && isset($_POST['deskripsi']) && isset($_FILES['gambar'])) {
      $kategori = $_POST['kategori'];
      $link = $_POST['link'];
      $judul = $_POST['judul'];
      $deskripsi = $_POST['deskripsi'];

      $gambar = $_FILES['gambar']['name'];
      $gambar_tmp = $_FILES['gambar']['tmp_name'];
      $gambar_path = "uploads-gambar/" . $gambar; 

      if (move_uploaded_file($gambar_tmp, $gambar_path)) {
          // Insert data into the database
          $userId = $_SESSION['username'];
          $sql_insert = "INSERT INTO artikel (userId, nama, kategori, link, gambar, judul, deskripsi, tanggal) VALUES ('$userId', '$nama', '$kategori', '$link', '$gambar_path', '$judul', '$deskripsi', NOW())";
          if ($koneksi->query($sql_insert) === TRUE) {
              echo "<script>alert('Artikel berhasil ditambahkan.');</script>";
          } else {
              echo "<script>alert('Error: Artikel gagal ditambahkan.');</script>";
          }
      } else {
          echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
      }
  }

}

// Fetch existing data from the database
$query = "SELECT * FROM artikel";
$result = $koneksi->query($query);

// Function to truncate text
function truncate_text($text, $limit) {
  $words = explode(' ', $text);
  if (count($words) > $limit) {
      return implode(' ', array_slice($words, 0, $limit)) . ' ...';
  } else {
      return $text;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
    <style>
        .tambah-artikel {
            background-color: #f0f0f0;
            padding: 50px 0;
        }

        .existing-data {
            background-color: #f9f9f9;
            padding: 50px 0;
        }

        .card {
            margin-bottom: 20px;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <!-- Your navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-lg fixed-top" style="background-color: #68A7AD;">
    <div class="container-fluid">
      <a class="navbar-brand" href="home.php">S I L A D U</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item layanan">
            <a class="nav-link" href="#" aria-current="page">Layanan</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="petugas/aturan_layanan.php">
                <?php if ($_SESSION['level'] == 'petugas') { ?>
                  Input Aturan Layanan
                <?php } else{?>
                  Aturan Layanan
                <?php }?>
              </a></li>
              <li><a class="dropdown-item" href="petugas/layanan.php">Spesifikasi Layanan</a></li>
            </ul>
          </li>
          <li class="nav-item layanan">
            <a class="nav-link" href="petugas/kepengurusan/staff.php">Kepengurusan</a>
          </li>
          <li class="nav-item about">
            <a class="nav-link" href="#tentang">Tentang</a>
          </li>
          <li class="nav-item feedback">
            <a class="nav-link" href="pengguna/feedback.php">Feedback</a>
          </li>
        </ul>
        <span class="navbar-profile">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php $username = $_SESSION['username'];
                echo "$username"; ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </span>
      </div>
    </div>
  </nav>
   
    <!-- Add Article Section -->    
    <div class="row justify-content-center" style="margin-top: 70px;">
    <div class="card-body">
    <div class="col-md-8 mx-auto">
        <h2 class="card-title text-center mb-4">Tambah Artikel</h2>
        <form id="articleForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="col-sm-3 col-form-label text-start">Nama Penulis</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="username" value="<?= $nama ?>" disabled>
                </div>
            </div>
            <div class="mb-3">
                <label class="col-sm-3 col-form-label text-start">Kategori</label>
                <div class="col-sm-9">
                    <select class="form-select" name="kategori" id="kategori">
                        <option selected disabled>Pilih Kategori</option>
                        <option value="bansos">Bansos</option>
                        <option value="keamanan">Keamanan</option>
                    </select>
                </div>
            </div>
            <!-- Sisipkan input field untuk nama penulis -->
            <input type="hidden" name="nama" value="<?= $nama ?>">
            <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <input type="text" class="form-control" id="link" name="link" required>
            </div>
            <div class="mb-3">
                 <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi (Minimal 500 Karakter)</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" onclick="return validateForm()">Tambah</button>
            </div>
        </form>
      </div>  
      </div>            
    </div>

    <!-- Display existing data -->
    <?php
    $kategori_list = array('bansos', 'keamanan');

    foreach ($kategori_list as $kategori) {
        $query_kategori = "SELECT * FROM artikel WHERE kategori = '$kategori'";
        $result_kategori = $koneksi->query($query_kategori);
    ?>

    <div class="container-fluid existing-data">
        <div class="container">
            <h2 class="display-6 fw-bold">Data Artikel Kategori <?php echo ucfirst($kategori); ?></h2>
            <div class="row">
                <?php
                while ($row_kategori = $result_kategori->fetch_assoc()) {
                    ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?php echo $row_kategori['gambar']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row_kategori['judul']; ?></h5>
                                <p class="card-text"><?php echo truncate_text($row_kategori['deskripsi'], 20); ?></p>
                                <?php if (!empty($row_kategori['link']) && filter_var($row_kategori['link'], FILTER_VALIDATE_URL)) { ?>
                                    <a href="<?php echo $row_kategori['link']; ?>" class="btn btn-primary">Read More</a>
                                <?php } else { ?>
                                    <a href="http://localhost/project/sosial/detail-artikel.php?id=<?php echo $row_kategori['id']; ?>" class="btn btn-primary">Read More</a>
                                <?php } ?>

                                <?php if ($_SESSION['level'] == 'petugas') { ?>
                                    <!-- Tombol Edit -->
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editArticleModal<?php echo $row_kategori['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <!-- Modal untuk edit artikel -->
                                    <div class="modal fade" id="editArticleModal<?php echo $row_kategori['id']; ?>" tabindex="-1" aria-labelledby="editArticleModalLabel<?php echo $row_kategori['id']; ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editArticleModalLabel<?php echo $row_kategori['id']; ?>">Edit Artikel</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Form untuk edit artikel -->
                                                    <!-- Isi nilai-nilai default pada form -->
                                                    <form id="editArticleForm<?php echo $row_kategori['id']; ?>" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                                                        <!-- Input fields untuk data artikel -->
                                                        <input type="hidden" name="artikel_id" value="<?php echo $row_kategori['id']; ?>">
                                                        <div class="mb-3">
                                                            <label for="kategori" class="form-label">Kategori</label>
                                                            <select class="form-select" name="kategori" id="kategori">
                                                                <option value="bansos" <?php if ($row_kategori['kategori'] == 'bansos') echo 'selected'; ?>>Bansos</option>
                                                                <option value="keamanan" <?php if ($row_kategori['kategori'] == 'keamanan') echo 'selected'; ?>>Keamanan</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="link" class="form-label">Link</label>
                                                            <input type="text" class="form-control" id="link" name="link" value="<?php echo $row_kategori['link']; ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="gambar_edit" class="form-label">Gambar</label>
                                                            <div class="d-flex align-items-center">
                                                                <div class="me-3">
                                                                    <img src="<?php echo $row_kategori['gambar']; ?>" class="img-thumbnail" alt="Current Image" style="max-width: 200px; max-height: 150px;">
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <input type="file" class="form-control" id="gambar_edit" name="gambar_edit" accept="image/*">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="judul" class="form-label">Judul</label>
                                                            <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $row_kategori['judul']; ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="deskripsi" class="form-label">Deskripsi</label>
                                                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required><?php echo $row_kategori['deskripsi']; ?></textarea>
                                                        </div>
                                                        <!-- Button submit untuk menyimpan perubahan -->
                                                        <div class="d-grid">
                                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tombol Hapus -->
                                    <form method="post" action="form-artikel.php" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                        <input type="hidden" name="hapus_artikel_id" value="<?php echo $row_kategori['id']; ?>">
                                        <button type="submit" class="btn btn-danger mt-2">Hapus</button>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>

  <script>
        function validateForm() {
            var kategori = document.getElementById("kategori").value;
            var link = document.getElementById("link").value;
            var gambar = document.getElementById("gambar").value;
            var judul = document.getElementById("judul").value;
            var deskripsi = document.getElementById("deskripsi").value;

            if (kategori == "" || link == "" || gambar == "" || judul == "" || deskripsi == "") {
                alert("Semua field harus diisi!");
                return false;
            }

            var jumlahKata = deskripsi.split(/\s+/).length;

            if (jumlahKata < 500) {
                alert("Deskripsi harus memiliki minimal 500 kata.");
                return false;
            }

            return true;
        }
    </script>  
  <!-- Your other HTML content -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
