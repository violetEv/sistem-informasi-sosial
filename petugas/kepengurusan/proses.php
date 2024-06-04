<?php
include('../../koneksi.php');

$kode = $_POST['id'];
$nama = $_POST['nama'];
$nip = $_POST['nip'];
$jabatan = $_POST['jabatan'];
$file_name = $_FILES['foto']['name'];
$direktori = "../../uploads-gambar/";

if (!empty($kode) && !empty($nama) && !empty($nip) && !empty($jabatan) && !empty($file_name)) {
    $ekstensi_boleh = array('png', 'jpg', 'jpeg');
    $x = explode('.', $file_name);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $file_name;

    if (in_array($ekstensi, $ekstensi_boleh)) {
        move_uploaded_file($file_tmp, $direktori . $nama_gambar_baru);

        $query = "INSERT INTO kepengurusan (id, nip, foto, nama, jabatan)
                 values ('" . $kode . "','" . $nip . "','" . $nama_gambar_baru . "','" . $nama . "','" . $jabatan . "')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "<script>alert('Berhasil Mengirim Aturan Layanan!'); window.location.href='kepengurusan.php';</script>";
        } else {
            echo "<script>alert('Query Error: " . mysqli_error($koneksi) . "');</script>";
        }
    } else {
        echo "<script>alert('Ekstensi gambar hanya bisa jpg dan png');</script>";
        echo "<script>window.location.href='kepengurusan.php';</script>";
    }
} else {
    echo "<script>alert('Ada Input Kosong!');</script>";
    echo "<script>history.back()</script>";
}
