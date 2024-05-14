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
            <div class="g"><div class="text-wrapper">Sosial</div></div>
            <div class="div-wrapper"><div class="div">Net</div></div>
          </div>
        </div>
        <div class="menu">
          <li class="item"><a class="label" href="home.php">Home</a></li>
          <li class="item layanan">
              <a class="label" href="#">Layanan</a>
              <ul class="dropdown-menu">
                  <li>
                      <a class="label" href="petugas/aturan_layanan.php">
                          <?php if ($_SESSION['level'] == 'petugas') { ?>
                              Input Aturan Layanan
                          <?php } else { ?>
                              Aturan Layanan
                          <?php } ?>
                      </a>
                  </li>
                  <li><a class="label" href="petugas/layanan.php">Spesifikasi Layanan</a></li>
              </ul>
          </li>
          <li class="item">
            <a href="<?php echo ($_SESSION['level'] == 'petugas') ? 'artikel-admin.php' : 'artikel-user.php'; ?>" class="label-2">Informasi</a>
          </li>
          <li class="item"><a class="label" href="petugas/kepengurusan/staff.php">Kepengurusan</a></li>
          <li class="item"><a class="label" href="#tentang">Tentang</a></li>
          <li class="item"><a class="label" href="pengguna/feedback.php">Feedback</a></li>
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
          <div class="frame-3">
            <div class="div-2">
              <div class="frame-4">
                <div class="text-wrapper-2">Nama Penulis</div>
                <div class="field-form-isi">
                  <input type="text" class="form-input" placeholder="Otomatis oleh sistem">
                </div>
              </div>
              <div class="frame-4">
                <div class="text-wrapper-2">Kategori</div>
                <div class="field-form-dropdown">
                  <select class="form-dropdown" id="kategori" name="kategori">
                    <option value="" disabled selected>Pilih kategori</option>
                    <option value="kategori1">Kategori 1</option>
                    <option value="kategori2">Kategori 2</option>
                    <option value="kategori3">Kategori 3</option>
                  </select>
                  <span class="dropdown-icon"></span>
                </div>
              </div>
              <div class="frame-4">
                <div class="text-wrapper-2">Link</div>
                <div class="field-form-isi">
                  <input type="text" class="form-input" placeholder="Masukkan link jika menuju ke halaman eksternal">
                </div>
              </div>                 
              <div class="frame-4">
                <div class="text-wrapper-2">Gambar</div>
                <div class="field-up">
                  <div class="smithy-weber-wrapper">
                    <label for="file-upload" class="file-label">Chose file</label>
                    <input type="file" id="file-upload" class="file-input" accept="image/*">
                  </div>
                  <div class="frame-6">
                    <div class="smithy-weber">No file chosen</div>
                  </div>
                </div>
              </div>    
              <div class="frame-4">
                <div class="text-wrapper-2">Judul</div>
                <div class="field-form-isi">
                  <input type="text" class="form-input" placeholder="Masukkan judul artikel">
                </div>
              </div>
              <div class="frame-4">
                <div class="text-wrapper-2">Deskripsi</div>
                <div class="field-form-isi">
                  <textarea type="text" class="form-input" style="resize: vertical; width: 100%; max-width: 100%; min-width: 100%; min-height: 180px;" placeholder="Masukkan deskripsi minimal 200 kata"></textarea>
                </div>
              </div>
              <div class="frame-7">
                <button class="button"><div class="text-3">Tambahkan</div></button>
                <button class="button-2"><div class="text-4">Reset Data</div></button>
              </div>
            </div>
          </div>
      </div>
      <div class="frame-8">
        <div class="div-3">
          <div class="heading-2">Daftar Artikel</div>
          <p class="p">
            Tulisan yang menyajikan informasi yang relevan dan dapat menjadi sumber pengetahuan yang berharga.
          </p>
        </div>
        <div class="category">
          <button type="button" data-category="bansos" onclick="changeCategory('bansos')" class="button"><div class="text-5">Bantuan Sosial</div></button>
          <button type="button" data-category="Keamanan" onclick="changeCategory('Keamanan')" class="button-4"><div class="text-6">Keamanan</div></button>
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
                                <button class="button-edit">
                                  <img class="icon" src="img/vuesax-outline-edit-3.svg" />
                                </button>
                                <button class="button-trash">
                                  <img class="icon" src="img/vuesax-outline-trash-3.svg" />
                                </button>
                              </div>
                            </div>
                          </div>';
                      }
                    } else {
                      echo '<p>Tidak ada artikel ditemukan untuk kategori ini.</p>';
                }
                ?>
              </div>

              <script>
                // Fungsi untuk mengubah kategori artikel
                function changeCategory(category) {
                  $.ajax({
                    type: "POST",
                    url: "",
                    data: { category: category },
                    success: function(response) {
                      $('.list-artikel2').html($(response).find('.list-artikel2').html()).slideDown('fast');
                      
                      // Mengubah gaya tombol
                      $('.category button').each(function() {
                        var buttonCategory = $(this).data('category');
                        if (buttonCategory === category) {
                          $(this).removeClass('button-4').addClass('button');
                          $(this).find('.text-6').removeClass('text-6').addClass('text-5');
                        } else {
                          $(this).removeClass('button').addClass('button-4');
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
              <div class="g"><div class="text-7">Sosial</div></div>
              <div class="div-wrapper"><div class="div">Net</div></div>
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
