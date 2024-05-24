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
function truncate_text($text, $limit)
{
  $words = explode(' ', $text);
  if (count($words) > $limit) {
    return implode(' ', array_slice($words, 0, $limit)) . ' ...';
  } else {
    return $text;
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Artikel Admin</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="globals.css" />
  <link rel="stylesheet" href="styleguide.css" />
  <link rel="stylesheet" href="style-artikel-admin.css" />
</head>

<body>
  <div class="artikel">
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
        <li class="item"><a class="label" href="home.php">Home</a></li>
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
          <a href="<?php echo ($_SESSION['level'] == 'petugas') ? 'artikel-admin.php' : 'artikel-user.php'; ?>" class="label-2">Informasi</a>
        </li>
        <li class="item"><a class="label" href="petugas/kepengurusan/kepengurusan.php">Kepengurusan</a></li>
        <li class="item"><a class="label" href="#tentang">Tentang</a></li>
        <li class="item"><a class="label" href="fitur_feedback.php">Feedback</a></li>
      </div>
      <div class="frame">
        <div class="button" id="dropdownButton">
          <div class="text-2">
            <?php $username = $_SESSION['username'];
            echo "$username"; ?>
          </div>
          <img class="img" src="img/vuesax-outline-arrow-down-2.svg" />
        </div>
        <ul class="dropdown-menu-log" id="dropdownMenu">
          <li><a href="logout.php" class="label">Logout</a></li>
        </ul>
      </div>
    </nav>

    <div class="frame-2-1">
      <div class="BG-wrapper"><img class="BG" src="img/bg.png" /></div>
      <div class="paragraph-container">
        <p class="heading">Kelola Artikel Untuk <br />informasi Terbaru</p>
        <p class="description">Mengelola artikel untuk menyajikan informasi terbaru kepada pengguna.</p>
      </div>
      <form class="form-isi" id="articleForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <div class="frame-3">

          <div class="div-2">
            <div class="frame-4">
              <div class="text-wrapper-2">Nama Penulis</div>
              <div class="field-form-isi">
                <input type="text" class="form-input" placeholder="Otomatis oleh sistem" name="username" value="<?= $nama ?>" disabled>
              </div>
            </div>
            <div class="frame-4">
              <div class="text-wrapper-2">Kategori</div>
              <div class="field-form-dropdown">
                <select class="form-dropdown" id="kategori" name="kategori" required>
                  <option value="" disabled selected>Pilih kategori</option>
                  <option value="bansos">Bansos</option>
                  <option value="keamanan">Keamanan</option>
                </select>
                <span class="dropdown-icon"></span>
              </div>
            </div>
            <div class="frame-4">
              <div class="text-wrapper-2">Link</div>
              <div class="field-form-isi">
                <input type="text" class="form-input" id="link" name="link" placeholder="Masukkan link jika menuju ke halaman eksternal" required>
              </div>
            </div>
            <div class="frame-4">
              <div class="text-wrapper-2">Gambar</div>
              <div class="field-up">
                <div class="smithy-weber-wrapper">
                  <label for="gambar" class="file-label">Choose file</label>
                  <input type="file" class="file-input" id="gambar" name="gambar" accept="image/*" required>
                </div>
                <div class="frame-6">
                  <div class="smithy-weber" id="file-chosen">No file chosen</div>
                </div>
              </div>
            </div>

            <script>
              document.getElementById('gambar').addEventListener('change', function(event) {
                const input = event.target;
                const fileName = input.files.length > 0 ? input.files[0].name : 'No file chosen';
                const fileChosenElement = document.getElementById('file-chosen');
                fileChosenElement.textContent = fileName;
                fileChosenElement.classList.add('form-input2');
              });
            </script>

            <div class="frame-4">
              <div class="text-wrapper-2">Judul</div>
              <div class="field-form-isi">
                <input type="text" class="form-input" placeholder="Masukkan judul artikel" id="judul" name="judul" required>
              </div>
            </div>
            <div class="frame-4">
              <div class="text-wrapper-2">Deskripsi (Minimal 500 kata)</div>
              <div class="field-form-isi">
                <textarea type="text" class="form-input" style="resize: vertical; width: 100%; max-width: 100%; min-width: 100%; min-height: 180px;" placeholder="Masukkan deskripsi minimal 200 kata" id="deskripsi" name="deskripsi" required></textarea>
              </div>
            </div>
            <div class="frame-7">
              <button type="submit" class="button" onclick="return validateForm()">
                <div class="text-3">Tambahkan</div>
              </button>
              <button class="button-2" type="button" id="resetButton"><span class="text-4">Reset Data</span></button>
              <script>
                $(document).ready(function() {
                  $("#dropdownButton").click(function() {
                    $("#dropdownMenu").toggle();
                  });

                  $("#resetButton").click(function() {
                    $("#articleForm")[0].reset();
                  });

                  // Handle selected value in edit mode
                  var selectedCategory = "<?php echo isset($kategori) ? $kategori : ''; ?>";
                  if (selectedCategory) {
                    $("#kategori").val(selectedCategory);
                  }
                });
              </script>
            </div>
          </div>

        </div>
      </form>
    </div>
    <div class="frame-8" id="lihat-artikel">
      <div class="div-3">
        <div class="heading-2">Daftar Artikel</div>
        <p class="p">
          Tulisan yang menyajikan informasi yang relevan dan dapat menjadi sumber pengetahuan yang berharga.
        </p>
      </div>
      <div class="category">
        <button type="button" data-category="bansos" onclick="changeCategory('bansos')" class="button-no">
          <div class="text-5">Bantuan Sosial</div>
        </button>
        <button type="button" data-category="Keamanan" onclick="changeCategory('Keamanan')" class="button-4">
          <div class="text-6">Keamanan</div>
        </button>
      </div>
      <div class="frame-wrapper">
        <div class="frame-9">
          <div class="list-artikel2">
            <?php
            // Kategori default
            $selected_category = isset($_POST['category']) ? $_POST['category'] : "bansos";

            // Query untuk mengambil artikel berdasarkan kategori
            $query = "SELECT * FROM artikel WHERE kategori = '$selected_category'";
            $result = $koneksi->query($query);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '<div class="frame-11">
                              <img class="mask-group" src="' . $row['gambar'] . '" />
                              <div class="frame-12">
                                  <div class="div-3">
                                      <div class="frame-13">
                                          <div class="penulis">' . (empty($row["nama"]) ? $row['userId'] : $row["nama"]) . '</div>
                                          <div class="text-wrapper-3">' . $row['tanggal'] . '</div>
                                      </div>
                                      <div class="frame-14">
                                          <p class="element-rules-of">' . $row['judul'] . '</p>
                                          <p class="text-wrapper-4">';
                // Batasi deskripsi maksimal 20 kata
                $deskripsi = $row['deskripsi'];
                $deskripsi = implode(' ', array_slice(explode(' ', $deskripsi), 0, 20));
                echo $deskripsi . '...';
                echo '
                                          </p>
                                      </div>
                                  </div>';
                // Periksa apakah link kosong atau tidak valid
                if (!empty($row['link']) && filter_var($row['link'], FILTER_VALIDATE_URL)) {
                  echo '<a href="' . $row['link'] . '" class="link-detail">Selengkapnya ...</a>';
                } else {
                  echo '<a href="detail-artikel.php?id=' . $row['id'] . '" class="link-detail">Selengkapnya ...</a>';
                }
                echo '  
                                  <div class="frame-15">
                                      <button type="button" class="button-edit" onclick="openModal(' . $row['id'] . ')">
                                          <img class="icon" src="img/vuesax-outline-edit-3.svg" />
                                      </button>
                      
                                      <!-- Modal untuk edit artikel -->
                                      <div class="modal" id="editArticleModal' . $row['id'] . '">
                                          
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="element-rules-of">Edit Artikel</h5>
                                                      <button type="button" class="btn-close" onclick="closeModal(' . $row['id'] . ')">&times;</button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <!-- Form untuk edit artikel -->
                                                      <form id="editArticleForm' . $row['id'] . '" method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" enctype="multipart/form-data">
                                                          <input type="hidden" name="artikel_id" value="' . $row['id'] . '">
                                                          <div class="frame-modal-4">
                                                            <div class="text-wrapper-2">Kategori</div>
                                                            <div class="field-form-dropdown">
                                                              <select class="form-dropdown" id="kategori" name="kategori" required>
                                                                  <option value="" disabled selected>Pilih kategori</option>
                                                                  <option value="bansos" ' . ($row['kategori'] == 'bansos' ? 'selected' : '') . '>Bansos</option>
                                                                  <option value="keamanan" ' . ($row['kategori'] == 'keamanan' ? 'selected' : '') . '>Keamanan</option>
                                                              </select>
                                                              <span class="dropdown-icon"></span>
                                                            </div>
                                                          </div>
                                                          <div class="frame-modal-4">
                                                            <div for="link" class="text-wrapper-2">Link</div>
                                                            <div class="field-form-isi">
                                                            <input type="text" class="form-input" id="link" name="link" value="' . $row['link'] . '" required>
                                                            </div>
                                                          </div>
                                                          <div class="frame-modal-4">
                                                            <div for="gambar_edit" class="text-wrapper-2">Gambar</div>
                                                            <div class="field-form-isi-2">
                                                                  <div class="me-3">
                                                                      <img src="' . $row['gambar'] . '" class="img-thumbnail" alt="Current Image" style="max-width: 200px; max-height: 150px;">
                                                                  </div>
                                                                  <div class="flex-grow-1">
                                                                      <input type="file" class="form-control2" id="gambar_edit" name="gambar_edit" accept="image/*">
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="frame-modal-4">
                                                            <div for="judul" class="text-wrapper-2">Judul</div>
                                                            <div class="field-form-isi">
                                                              <input type="text" class="form-input" id="judul" name="judul" value="' . $row['judul'] . '" required>
                                                            </div>
                                                          </div>
                                                          <div class="frame-modal-4">
                                                          <div for="deskripsi" class="text-wrapper-2">Deskripsi (Minimal 500 kata)</div>
                                                          <div class="field-form-isi">
                                                            <textarea type="text" class="form-input" style="resize: vertical; width: 100%; max-width: 100%; min-width: 100%; min-height: 180px;" id="deskripsi" name="deskripsi"rows="5" required>' . $row['deskripsi'] . '</textarea>
                                                          </div>
                                                        </div>
                                                          <!-- Button submit untuk menyimpan perubahan -->
                                                          <div class="d-grid">
                                                              <button type="submit" class="button"><div class="text-3">Simpan Perubahan</div></button>
                                                          </div>
                                                      </form>
                                                  </div>
                                              </div>
                                          
                                      </div>
                                      <form method="post" action="artikel-admin.php" onsubmit="return confirm(\'Apakah Anda yakin ingin menghapus artikel ini?\')">
                                          <input type="hidden" name="hapus_artikel_id" value="' . $row['id'] . '">
                                          <button type="submit" class="button-trash">
                                              <img class="icon" src="img/vuesax-outline-trash-3.svg" />
                                          </button>
                                      </form>
                                  </div>
                              </div>
                          </div>';
              }
            } else {
              echo '<p>Tidak ada artikel ditemukan untuk kategori ini.</p>';
            }
            ?>
            <script>
              function openModal(id) {
                document.getElementById('editArticleModal' + id).style.display = 'block';
              }

              function closeModal(id) {
                document.getElementById('editArticleModal' + id).style.display = 'none';
              }

              // Close the modal if the user clicks outside of it
              window.onclick = function(event) {
                var modals = document.getElementsByClassName('modal');
                for (var i = 0; i < modals.length; i++) {
                  if (event.target == modals[i]) {
                    modals[i].style.display = 'none';
                  }
                }
              }
            </script>
          </div>

          <script>
            // Fungsi untuk mengubah kategori artikel
            function changeCategory(category) {
              $.ajax({
                type: "POST",
                url: "",
                data: {
                  category: category
                },
                success: function(response) {
                  $('.list-artikel2').html($(response).find('.list-artikel2').html()).slideDown('fast');

                  // Mengubah gaya tombol
                  $('.category button').each(function() {
                    var buttonCategory = $(this).data('category');
                    if (buttonCategory === category) {
                      $(this).removeClass('button-4').addClass('button-no');
                      $(this).find('.text-6').removeClass('text-6').addClass('text-5');
                    } else {
                      $(this).removeClass('button-no').addClass('button-4');
                      $(this).find('.text-5').removeClass('text-5').addClass('text-6');
                    }
                  });

                  $('.category button').removeClass('active');
                  $('.category button[data-category="' + category + '"]').addClass('active');
                }
              });
            }
          </script>

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
</body>

</html>