<?php
session_start();
include "../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (!isset($_SESSION['username'])) {
    die("Anda belum login, klik <a href=\"../index.php\">disini</a> untuk login");
} else {
    $username = $_SESSION['username'];
}

$kode = $_GET['id'];
$username = $_SESSION['username'];
$tanggapan = $_POST['tanggapan'];

// Query untuk mengambil feedback yang sudah ada dalam database
$query_feedback = "SELECT * FROM feedback";
$result_feedback = $koneksi->query($query_feedback);

// Fungsi untuk menghapus feedback
if(isset($_GET['hapus'])){
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
    <title>Permintaan Pelayanan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
        h1 {
            margin-top: 80px;
            text-align: center;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .layanan:hover>.dropdown-menu {
            display: block;
        }

        button {
            background-color: #2d2d44;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #fa736b;
        }

        .navbar-brand {
            font-weight: bold;
            color: #cdc2ae;
        }

        .kinerja {
            width: 80%;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-lg fixed-top" style="background-color: #68A7AD;">
        <div class="container-fluid">
            <a class="navbar-brand" href="../home.php">S I L A D U</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../home.php">Home</a>
                    </li>
                    <li class="nav-item layanan">
                        <a class="nav-link" href="#" aria-current="page">Layanan</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="../petugas/aturan_layanan.php">
                                    <?php if ($_SESSION['level'] == 'petugas') { ?>
                                        Input Aturan Layanan
                                    <?php } else { ?>
                                        Aturan Layanan
                                    <?php } ?>
                                </a></li>
                            <li><a class="dropdown-item" href="../petugas/layanan.php">Spesifikasi Layanan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item kepengurusan">
                        <a class="nav-link" aria-current="page" href="../petugas/kepengurusan/staff.php">Kepengurusan</a>
                    </li>
                    <li class="nav-item about">
                        <a class="nav-link" href="../home.php#tentang">Tentang</a>
                    </li>
                    <li class="nav-item feedback">
                        <a class="nav-link active" href="../pengguna/feedback.php">Feedback</a>
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
                                <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </span>
            </div>
        </div>
    </nav>


    <div class="container-fluid kinerja">
        <h1 class="pt-5">FEEDBACK</h1>
        <div class="card-wrap mt-5">
            <div class="card request-form">
                <div class="card-body">
                    <div class="alert alert-warning" role="alert">
                        Beri Review atau feedback terkait kinerja kami, agar menjadi bahan evaluasi kami kedepannya:)
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <?php
                        $a = mysqli_query($koneksi, "select * from user where username='$_SESSION[username]'");
                        $tampil = mysqli_fetch_array($a);
                        ?>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label text-start">Username</label>
                            <div class="col-sm-9 ">
                                <input type="text" class="form-control" name="username" value="<?= $tampil['nama'] ?>" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label text-start">Tanggapan</label>
                            <div class="col-sm-9 ">
                                <textarea class="form-control" name="tanggapan" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="button-align text-end">
                            <button type="submit" name="simpan" class="btn btn-success">SIMPAN</button>
                            <button type="reset" name="reset" class="btn btn-danger">RESET</button>
                        </div>
                    </form>
                    
                    <!-- Tampilkan daftar feedback -->
                    <?php if ($_SESSION['level'] == 'petugas' || $_SESSION['level'] == 'warga') { ?>
                        <h2 class="mt-5">Daftar Feedback:</h2>
                        <div class="list-group mt-3">
                            <?php while ($row = mysqli_fetch_assoc($result_feedback)) { ?>
                                <div class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><?= $row['userId'] ?></h5>
                                        <small><?= $row['tanggal'] ?></small>
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
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <br><br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
