<!-- //EDIT -->
  <!-- if ($_GET['hal'] == "edit") {
    $query = "UPDATE artikel SET
 kategori = '$kategori',
 link = '$link',
 gambar = '$gambar_path',
 judul = '$judul'
 deskripsi = '$deskripsi'
 WHERE artikel.id = '$artikel_id'";
    $edit = mysqli_query($koneksi, $query) or die("Error in query: $query");

    if ($edit) {
        move_uploaded_file($_FILES['data']['tmp_name'], $direktori . $file_name);
        echo "<script>alert('Berhasil Memperbarui administrasi!');</script>";
        header("refresh:2;url=administrasi.php");
    } else {
        echo "<script>alert('Edit Data Gagal!');</script>";
        header("refresh:2;url=administrasi.php");
    }
}
} -->