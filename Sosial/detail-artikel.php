<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

// Periksa apakah parameter 'id' ada di URL dan tidak kosong
if(isset($_GET['id']) && !empty(trim($_GET['id']))) {
    // Siapkan pernyataan SQL untuk mengambil detail artikel berdasarkan ID
    $sql = "SELECT * FROM artikel WHERE id = ?";
    
    if($stmt = $koneksi->prepare($sql)) {
        // Bind parameter ke pernyataan yang telah disiapkan
        $stmt->bind_param("i", $param_id);
        
        // Tetapkan nilai parameter
        $param_id = trim($_GET["id"]);
        
        // Cobalah untuk menjalankan pernyataan yang telah disiapkan
        if($stmt->execute()) {
            // Simpan hasil
            $result = $stmt->get_result();
            
            if($result->num_rows == 1) {
                // Ambil detail artikel
                $row = $result->fetch_assoc();
                $judul = $row["judul"];
                $gambar = $row["gambar"];
                $deskripsi = $row["deskripsi"];
                $kategori = $row["kategori"];
                $nama = $row["nama"]; // Menyimpan nama penulis
                $tanggal = $row["tanggal"];
            } 
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Tutup pernyataan
        $stmt->close();
    }
    
    // Tutup koneksi
    $koneksi->close();
} else {
    // Alihkan ke halaman error jika parameter 'id' tidak ada
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Artikel</title>
    <!-- Tambahkan stylesheet atau CSS tambahan di sini jika diperlukan -->
    <style>
        .container {
            text-align: center;
            margin-top: 50px;
        }
        .card {
            width: 50%;
            margin: auto;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .card img {
            width: 100%;
            height: auto;
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .card-text {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .card-text:last-child {
            margin-bottom: 0;
        }
        .card-info {
            font-size: 16px;
            font-style: italic;
            color: #666;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $judul; ?></h1>
        <div class="card">
            <img src="<?php echo $gambar; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="card-info">
                    <p><strong>Penulis:</strong> <?php echo $nama; ?></p> <!-- Menggunakan $nama untuk menampilkan nama penulis -->
                    <p><strong>Kategori:</strong> <?php echo $kategori; ?></p>
                    <p><strong>Publish pada:</strong> <?php echo $tanggal; ?></p>
                </div>
                <p class="card-text"><?php echo $deskripsi; ?></p>
            </div>
        </div>
    </div>
</body>
</html>
