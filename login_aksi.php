<?php
error_reporting(0);
include 'koneksi.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $psw = md5($_POST['psw']);

    $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND `password`='$psw'");
    $cek = mysqli_num_rows($sql);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($sql);
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['level'] = $data['level'];
        
        echo "<script>
            alert('Login berhasil!');
            window.location.href='home.php';
        </script>";
    } else {
        echo "<script>
            alert('Login gagal! Username atau password salah.');
            window.location.href='index.php?alert=gagal';
        </script>";
    }
} else {
    if (isset($_GET['alert'])) {
        if ($_GET['alert'] == "gagal") {
            echo "<script>alert('Maaf! username & password salah');</script>";
        } elseif ($_GET['alert'] == "belum_login") {
            echo "<script>alert('Anda Harus Login terlebih dahulu!');</script>";
        } elseif ($_GET['alert'] == "logout") {
            echo "<script>alert('Anda telah logout!');</script>";
        }
    }
}
?>
