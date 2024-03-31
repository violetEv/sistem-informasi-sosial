-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 12:35 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_sosial`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrasi`
--

CREATE TABLE `administrasi` (
  `id` int(11) NOT NULL,
  `userId` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `data` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrasi`
--

INSERT INTO `administrasi` (`id`, `userId`, `nama`, `jenis`, `deskripsi`, `data`, `tanggal`) VALUES
(2, 'warga1', 'Warga sini', 'Surat Keterangan Ahli Waris', 'ini deskripsi', 'Case Time Management.pdf', '2022-06-12 12:11:59'),
(5, 'levi', 'cobaaa', 'Surat Keterangan Tidak Mampu', 'sdcvg', 'sk aktif.pdf', '2024-03-24 18:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `userId` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `kategori` enum('bansos','keamanan') NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `deskripsi` longtext CHARACTER SET utf8mb4 NOT NULL,
  `tanggal` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `userId`, `nama`, `kategori`, `link`, `gambar`, `judul`, `deskripsi`, `tanggal`) VALUES
(11, 'levi000', NULL, 'bansos', 'https://translate.google.co.id/?hl=en&sl=id&tl=en&op=translate', 'uploads-gambar/Screenshot (876).png', 'linkkk-oke', '22221', NULL),
(17, 'levi000', NULL, 'keamanan', 'mmm', 'uploads-gambar/Screenshot (876).png', 'ddd', 'http://localhost/project/sosial/form-artikel.php', NULL),
(53, 'levi000', NULL, 'bansos', '.', 'uploads-gambar/Screenshot (876).png', 'ENTAHH2HMMMM', 'Judul: Peran Teknologi dalam Meningkatkan Kualitas Pendidikan di Indonesia\r\n\r\nPendidikan merupakan salah satu aspek kunci dalam pembangunan suatu negara. Di Indonesia, upaya untuk meningkatkan kualitas pendidikan telah menjadi prioritas dalam rangka menciptakan sumber daya manusia yang kompeten dan berkualitas. Dalam era globalisasi yang serba cepat ini, teknologi memiliki peran yang sangat penting dalam meningkatkan kualitas pendidikan. Artikel ini akan membahas peran teknologi dalam meningkatkan kualitas pendidikan di Indonesia.\r\n\r\nPertama-tama, teknologi memberikan akses pendidikan yang lebih luas bagi masyarakat Indonesia. Melalui internet, pendidikan jarak jauh atau e-learning menjadi lebih mudah diakses oleh semua lapisan masyarakat, terlepas dari lokasi geografis mereka. Hal ini memungkinkan siswa di daerah terpencil atau kurang berkembang untuk mendapatkan akses ke materi-materi pendidikan yang sama dengan siswa di daerah perkotaan.\r\n\r\nSelain itu, teknologi juga memperkaya metode pembelajaran. Berbagai aplikasi dan platform belajar daring menyediakan beragam konten pendidikan, mulai dari teks, video, hingga simulasi interaktif. Metode pembelajaran yang inovatif seperti ini dapat memotivasi siswa untuk belajar dengan cara yang lebih menarik dan menyenangkan, sehingga meningkatkan tingkat pemahaman dan retensi materi pelajaran.\r\n\r\nLebih jauh lagi, teknologi memungkinkan adanya personalisasi dalam pendidikan. Dengan menggunakan algoritma pembelajaran mesin, platform pembelajaran dapat menganalisis kebutuhan dan kemampuan individu setiap siswa secara lebih akurat. Hal ini memungkinkan guru untuk memberikan bimbingan yang lebih tepat dan efektif sesuai dengan kebutuhan masing-masing siswa, sehingga potensi mereka dapat dioptimalkan.\r\n\r\nTidak hanya bagi siswa, teknologi juga memfasilitasi kemajuan para pendidik. Dengan adanya platform pembelajaran dan kolaborasi daring, guru dapat berbagi pengalaman dan sumber daya dengan sesama guru di seluruh negeri. Ini membuka peluang untuk pertukaran ide dan praktik terbaik dalam mengajar, sehingga meningkatkan profesionalisme dan kualitas pengajaran secara keseluruhan.\r\n\r\nNamun, meskipun memiliki potensi besar, penggunaan teknologi dalam pendidikan juga menghadapi beberapa tantangan. Salah satunya adalah kesenjangan akses. Masih ada sebagian masyarakat yang tidak memiliki akses terhadap teknologi, baik karena keterbatasan infrastruktur maupun keterbatasan ekonomi. Oleh karena itu, diperlukan upaya lebih lanjut untuk memastikan bahwa semua masyarakat dapat memanfaatkan teknologi dalam pendidikan.\r\n\r\nSelain itu, perlu juga perhatian khusus terhadap keamanan dan privasi data dalam penggunaan teknologi pendidikan. Dengan semakin banyaknya data yang dikumpulkan melalui platform pembelajaran daring, perlindungan data pribadi siswa dan guru menjadi sangat penting untuk dijamin guna mencegah penyalahgunaan informasi.\r\n\r\nDalam konteks Indonesia, pemerintah memiliki peran kunci dalam mempromosikan penggunaan teknologi dalam pendidikan. Langkah-langkah seperti penyediaan infrastruktur internet yang merata, pelatihan guru dalam pemanfaatan teknologi, serta pengembangan regulasi yang mendukung penggunaan teknologi dalam pendidikan dapat membantu menciptakan lingkungan yang kondusif bagi pengembangan pendidikan yang berkualitas.\r\n\r\nSecara keseluruhan, teknologi memiliki peran yang sangat penting dalam meningkatkan kualitas pendidikan di Indonesia. Dengan memanfaatkan potensi teknologi secara optimal, diharapkan Indonesia dapat menciptakan sistem pendidikan yang inklusif, inovatif, dan berdaya saing global.\r\n\r\nJudul: Peran Teknologi dalam Meningkatkan Kualitas Pendidikan di Indonesia\r\n\r\nPendidikan merupakan salah satu aspek kunci dalam pembangunan suatu negara. Di Indonesia, upaya untuk meningkatkan kualitas pendidikan telah menjadi prioritas dalam rangka menciptakan sumber daya manusia yang kompeten dan berkualitas. Dalam era globalisasi yang serba cepat ini, teknologi memiliki peran yang sangat penting dalam meningkatkan kualitas pendidikan. Artikel ini akan membahas peran teknologi dalam meningkatkan kualitas pendidikan di Indonesia.\r\n\r\nPertama-tama, teknologi memberikan akses pendidikan yang lebih luas bagi masyarakat Indonesia. Melalui internet, pendidikan jarak jauh atau e-learning menjadi lebih mudah diakses oleh semua lapisan masyarakat, terlepas dari lokasi geografis mereka. Hal ini memungkinkan siswa di daerah terpencil atau kurang berkembang untuk mendapatkan akses ke materi-materi pendidikan yang sama dengan siswa di daerah perkotaan.\r\n\r\nSelain itu, teknologi juga memperkaya metode pembelajaran. Berbagai aplikasi dan platform belajar daring menyediakan beragam konten pendidikan, mulai dari teks, video, hingga simulasi interaktif. Metode pembelajaran yang inovatif seperti ini dapat memotivasi siswa untuk belajar dengan cara yang lebih menarik dan menyenangkan, sehingga meningkatkan tingkat pemahaman dan retensi materi pelajaran.\r\n\r\nLebih jauh lagi, teknologi memungkinkan adanya personalisasi dalam pendidikan. Dengan menggunakan algoritma pembelajaran mesin, platform pembelajaran dapat menganalisis kebutuhan dan kemampuan individu setiap siswa secara lebih akurat. Hal ini memungkinkan guru untuk memberikan bimbingan yang lebih tepat dan efektif sesuai dengan kebutuhan masing-masing siswa, sehingga potensi mereka dapat dioptimalkan.\r\n\r\nTidak hanya bagi siswa, teknologi juga memfasilitasi kemajuan para pendidik. Dengan adanya platform pembelajaran dan kolaborasi daring, guru dapat berbagi pengalaman dan sumber daya dengan sesama guru di seluruh negeri. Ini membuka peluang untuk pertukaran ide dan praktik terbaik dalam mengajar, sehingga meningkatkan profesionalisme dan kualitas pengajaran secara keseluruhan.\r\n\r\nNamun, meskipun memiliki potensi besar, penggunaan teknologi dalam pendidikan juga menghadapi beberapa tantangan. Salah satunya adalah kesenjangan akses. Masih ada sebagian masyarakat yang tidak memiliki akses terhadap teknologi, baik karena keterbatasan infrastruktur maupun keterbatasan ekonomi. Oleh karena itu, diperlukan upaya lebih lanjut untuk memastikan bahwa semua masyarakat dapat memanfaatkan teknologi dalam pendidikan.\r\n\r\nSelain itu, perlu juga perhatian khusus terhadap keamanan dan privasi data dalam penggunaan teknologi pendidikan. Dengan semakin banyaknya data yang dikumpulkan melalui platform pembelajaran daring, perlindungan data pribadi siswa dan guru menjadi sangat penting untuk dijamin guna mencegah penyalahgunaan informasi.\r\n\r\nDalam konteks Indonesia, pemerintah memiliki peran kunci dalam mempromosikan penggunaan teknologi dalam pendidikan. Langkah-langkah seperti penyediaan infrastruktur internet yang merata, pelatihan guru dalam pemanfaatan teknologi, serta pengembangan regulasi yang mendukung penggunaan teknologi dalam pendidikan dapat membantu menciptakan lingkungan yang kondusif bagi pengembangan pendidikan yang berkualitas.\r\n\r\nSecara keseluruhan, teknologi memiliki peran yang sangat penting dalam meningkatkan kualitas pendidikan di Indonesia. Dengan memanfaatkan potensi teknologi secara optimal, diharapkan Indonesia dapat menciptakan sistem pendidikan yang inklusif, inovatif, dan berdaya saing global.\r\n\r\nJudul: Peran Teknologi dalam Meningkatkan Kualitas Pendidikan di Indonesia\r\n\r\nPendidikan merupakan salah satu aspek kunci dalam pembangunan suatu negara. Di Indonesia, upaya untuk meningkatkan kualitas pendidikan telah menjadi prioritas dalam rangka menciptakan sumber daya manusia yang kompeten dan berkualitas. Dalam era globalisasi yang serba cepat ini, teknologi memiliki peran yang sangat penting dalam meningkatkan kualitas pendidikan. Artikel ini akan membahas peran teknologi dalam meningkatkan kualitas pendidikan di Indonesia.\r\n\r\nPertama-tama, teknologi memberikan akses pendidikan yang lebih luas bagi masyarakat Indonesia. Melalui internet, pendidikan jarak jauh atau e-learning menjadi lebih mudah diakses oleh semua lapisan masyarakat, terlepas dari lokasi geografis mereka. Hal ini memungkinkan siswa di daerah terpencil atau kurang berkembang untuk mendapatkan akses ke materi-materi pendidikan yang sama dengan siswa di daerah perkotaan.\r\n\r\nSelain itu, teknologi juga memperkaya metode pembelajaran. Berbagai aplikasi dan platform belajar daring menyediakan beragam konten pendidikan, mulai dari teks, video, hingga simulasi interaktif. Metode pembelajaran yang inovatif seperti ini dapat memotivasi siswa untuk belajar dengan cara yang lebih menarik dan menyenangkan, sehingga meningkatkan tingkat pemahaman dan retensi materi pelajaran.\r\n\r\nLebih jauh lagi, teknologi memungkinkan adanya personalisasi dalam pendidikan. Dengan menggunakan algoritma pembelajaran mesin, platform pembelajaran dapat menganalisis kebutuhan dan kemampuan individu setiap siswa secara lebih akurat. Hal ini memungkinkan guru untuk memberikan bimbingan yang lebih tepat dan efektif sesuai dengan kebutuhan masing-masing siswa, sehingga potensi mereka dapat dioptimalkan.\r\n\r\nTidak hanya bagi siswa, teknologi juga memfasilitasi kemajuan para pendidik. Dengan adanya platform pembelajaran dan kolaborasi daring, guru dapat berbagi pengalaman dan sumber daya dengan sesama guru di seluruh negeri. Ini membuka peluang untuk pertukaran ide dan praktik terbaik dalam mengajar, sehingga meningkatkan profesionalisme dan kualitas pengajaran secara keseluruhan.\r\n\r\nNamun, meskipun memiliki potensi besar, penggunaan teknologi dalam pendidikan juga menghadapi beberapa tantangan. Salah satunya adalah kesenjangan akses. Masih ada sebagian masyarakat yang tidak memiliki akses terhadap teknologi, baik karena keterbatasan infrastruktur maupun keterbatasan ekonomi. Oleh karena itu, diperlukan upaya lebih lanjut untuk memastikan bahwa semua masyarakat dapat memanfaatkan teknologi dalam pendidikan.\r\n\r\nSelain itu, perlu juga perhatian khusus terhadap keamanan dan privasi data dalam penggunaan teknologi pendidikan. Dengan semakin banyaknya data yang dikumpulkan melalui platform pembelajaran daring, perlindungan data pribadi siswa dan guru menjadi sangat penting untuk dijamin guna mencegah penyalahgunaan informasi.\r\n\r\nDalam konteks Indonesia, pemerintah memiliki peran kunci dalam mempromosikan penggunaan teknologi dalam pendidikan. Langkah-langkah seperti penyediaan infrastruktur internet yang merata, pelatihan guru dalam pemanfaatan teknologi, serta pengembangan regulasi yang mendukung penggunaan teknologi dalam pendidikan dapat membantu menciptakan lingkungan yang kondusif bagi pengembangan pendidikan yang berkualitas.\r\n\r\nSecara keseluruhan, teknologi memiliki peran yang sangat penting dalam meningkatkan kualitas pendidikan di Indonesia. Dengan memanfaatkan potensi teknologi secara optimal, diharapkan Indonesia dapat menciptakan sistem pendidikan yang inklusif, inovatif, dan berdaya saing global.', NULL),
(54, 'levi000', 'sdfg', 'bansos', 'https://kitabisa.com/campaign/berdayakanumkmpejuangnafkah', 'uploads-gambar/kitabisa1.avif', 'Raih Berkah Ramadhan: Berbagi 100 Gerobak Gratis', 'â€œNgojek juga gak bebas pak, karena harus menjaga anak saya yg ABK (Anak Berkebutuhan Khusus).... \" Tutur Pak Amin\r\nPak Amin sempat kena PHK di awal pandemi 2020 silam. Setelahnya, ia bekerja jadi tukang ojek online demi keluarganya bisa makan dan memenuhi kebutuhan yang dibutuhkan anaknya yang merupakan ABK.\r\nHarga-harga semua semakin mahal, bahkan baru-baru ini harga beras pun naik. Di jalan pulang dan pergi kerja, yang mereka pikirkan adalah:\r\n\r\nâ€œBagaimana anak dan istri bisa makan? Bagaimana anak-anak harus putus sekolah?â€\r\n\r\nPernah terbayang gak, kalau kita kasih sebuah gerobak gratis dan pengetahuan tentang jualan, akan sebesar apa dampak bagi keluarganya?\r\n\r\nBisa mulai lagi menabung untuk dana darurat, bayar biaya berobat anak, tidak perlu khawatir anaknya akan putus sekolah, dan bisa sesekali membelikan anaknya jajan. Makan pun jadi 3 kali sehariâ€¦\r\n\r\nTernyata masa tua tidak menjadi jaminan, seseorang bisa berhenti mencari nafkah dan hidup layak. Di sekitar kita, masih ada lansia yang masih melakukan banyak pekerjaan demi bisa makan dan bertahan hidup.  \r\n\r\nBelakangan ini, fenomena mendadak di-PHK dialami oleh banyak para ayah. Keputusan yang harus diterima tapi sulit dijalani. Mereka satu-satunya tulang punggung keluarga! Berjualan jadi jalan agar uang rumah tetap ada sambil menunggu pekerjaan tetap memanggil kembali.\r\nAda juga kepala keluarga yang merupakan pekerja harian dimana tidak setiap hari mereka akan mendapatkan upah. Punya banyak sumber penghasilan menjadi satu-satunya jalan agar anak dan istri bisa makan.\r\n\r\n***\r\nKini, setelah mendapatkan gerobak gratis dan memulai usahanya, ia bisa dapat bekerja sekaligus memantau anaknya. Karena tempatnya berjualan tidak jauh dari rumahnya.\r\n\r\n\"Alhamdulillah jadi bisa tetap mengawasi dan memantau anak saya\" ucap Pak Amin, ia mengucap syukur atas kesempatan yang diberikan untuk membuka usaha bantuan dari orang-orang baik.\r\n\r\nâ€œIni ngebantu sekali, ayamnya pun bisa untuk dimakanâ€¦â€, cerita salah satu penerima manfaat â€œSaya berharap program ini terus berlanjut dan bisa bantu lebih banyak orang lagiâ€\r\nKarena berjualan dengan #GerobakGratis darimu, banyak keluarga yang kini pendapatannya naik sekitar 80% dari sebelumnya.\r\n\r\nPaling penting adalah mereka tidak perlu takut rugi. Karena modal usaha seperti; gerobak gratis, fasilitas perlengkapan masak, training masak dan pendampingan bisnis datangnya dari bantuanmu, #OrangBaik!\r\n\r\nMari kita jaga keluarga-keluarga dhuafa dari kelaparan dan putus sekolah dengan berbagi gerobak gratis dan bantuan lainnya dengan cara:\r\n\r\n1. Klik tombol \"DONASI SEKARANG\";\r\n\r\n2. Isi nominal donasi yang ingin diberikan;\r\n\r\n3. Pilih metode pembayaran GO-PAY/Mandiri/BCA/BNI/BNI Syariah/BRI dan kartu kredit;\r\n\r\n4. Dapat laporan via email.\r\n\r\nTidak hanya berdonasi, teman-teman juga bisa membantu dengan cara menyebarkan halaman galang dana ini ke orang-orang terdekat agar semakin banyak orang yang ikut membantu.\r\n\r\nTerima kasih, \r\n\r\nKitabisa\r\n\r\nâ€œNgojek juga gak bebas pak, karena harus menjaga anak saya yg ABK (Anak Berkebutuhan Khusus).... \" Tutur Pak Amin\r\nPak Amin sempat kena PHK di awal pandemi 2020 silam. Setelahnya, ia bekerja jadi tukang ojek online demi keluarganya bisa makan dan memenuhi kebutuhan yang dibutuhkan anaknya yang merupakan ABK.\r\nHarga-harga semua semakin mahal, bahkan baru-baru ini harga beras pun naik. Di jalan pulang dan pergi kerja, yang mereka pikirkan adalah:\r\n\r\nâ€œBagaimana anak dan istri bisa makan? Bagaimana anak-anak harus putus sekolah?â€\r\n\r\nPernah terbayang gak, kalau kita kasih sebuah gerobak gratis dan pengetahuan tentang jualan, akan sebesar apa dampak bagi keluarganya?\r\n\r\nBisa mulai lagi menabung untuk dana darurat, bayar biaya berobat anak, tidak perlu khawatir anaknya akan putus sekolah, dan bisa sesekali membelikan anaknya jajan. Makan pun jadi 3 kali sehariâ€¦\r\n\r\nTernyata masa tua tidak menjadi jaminan, seseorang bisa berhenti mencari nafkah dan hidup layak. Di sekitar kita, masih ada lansia yang masih melakukan banyak pekerjaan demi bisa makan dan bertahan hidup.  \r\n\r\nBelakangan ini, fenomena mendadak di-PHK dialami oleh banyak para ayah. Keputusan yang harus diterima tapi sulit dijalani. Mereka satu-satunya tulang punggung keluarga! Berjualan jadi jalan agar uang rumah tetap ada sambil menunggu pekerjaan tetap memanggil kembali.\r\nAda juga kepala keluarga yang merupakan pekerja harian dimana tidak setiap hari mereka akan mendapatkan upah. Punya banyak sumber penghasilan menjadi satu-satunya jalan agar anak dan istri bisa makan.\r\n\r\n***\r\nKini, setelah mendapatkan gerobak gratis dan memulai usahanya, ia bisa dapat bekerja sekaligus memantau anaknya. Karena tempatnya berjualan tidak jauh dari rumahnya.\r\n\r\n\"Alhamdulillah jadi bisa tetap mengawasi dan memantau anak saya\" ucap Pak Amin, ia mengucap syukur atas kesempatan yang diberikan untuk membuka usaha bantuan dari orang-orang baik.\r\n\r\nâ€œIni ngebantu sekali, ayamnya pun bisa untuk dimakanâ€¦â€, cerita salah satu penerima manfaat â€œSaya berharap program ini terus berlanjut dan bisa bantu lebih banyak orang lagiâ€\r\nKarena berjualan dengan #GerobakGratis darimu, banyak keluarga yang kini pendapatannya naik sekitar 80% dari sebelumnya.\r\n\r\nPaling penting adalah mereka tidak perlu takut rugi. Karena modal usaha seperti; gerobak gratis, fasilitas perlengkapan masak, training masak dan pendampingan bisnis datangnya dari bantuanmu, #OrangBaik!\r\n\r\nMari kita jaga keluarga-keluarga dhuafa dari kelaparan dan putus sekolah dengan berbagi gerobak gratis dan bantuan lainnya dengan cara:\r\n\r\n1. Klik tombol \"DONASI SEKARANG\";\r\n\r\n2. Isi nominal donasi yang ingin diberikan;\r\n\r\n3. Pilih metode pembayaran GO-PAY/Mandiri/BCA/BNI/BNI Syariah/BRI dan kartu kredit;\r\n\r\n4. Dapat laporan via email.\r\n\r\nTidak hanya berdonasi, teman-teman juga bisa membantu dengan cara menyebarkan halaman galang dana ini ke orang-orang terdekat agar semakin banyak orang yang ikut membantu.\r\n\r\nTerima kasih, \r\n\r\nKitabisa', NULL),
(55, 'levi000', 'sdfg', 'keamanan', 'cobaaaa22266', 'uploads-gambar/Screenshot (722).png', 'iniii66', 'â€œNgojek juga gak bebas pak, karena harus menjaga anak saya yg ABK (Anak Berkebutuhan Khusus).... \" Tutur Pak Amin\r\nPak Amin sempat kena PHK di awal pandemi 2020 silam. Setelahnya, ia bekerja jadi tukang ojek online demi keluarganya bisa makan dan memenuhi kebutuhan yang dibutuhkan anaknya yang merupakan ABK.\r\nHarga-harga semua semakin mahal, bahkan baru-baru ini harga beras pun naik. Di jalan pulang dan pergi kerja, yang mereka pikirkan adalah:\r\n\r\nâ€œBagaimana anak dan istri bisa makan? Bagaimana anak-anak harus putus sekolah?â€\r\n\r\nPernah terbayang gak, kalau kita kasih sebuah gerobak gratis dan pengetahuan tentang jualan, akan sebesar apa dampak bagi keluarganya?\r\n\r\nBisa mulai lagi menabung untuk dana darurat, bayar biaya berobat anak, tidak perlu khawatir anaknya akan putus sekolah, dan bisa sesekali membelikan anaknya jajan. Makan pun jadi 3 kali sehariâ€¦\r\n\r\nTernyata masa tua tidak menjadi jaminan, seseorang bisa berhenti mencari nafkah dan hidup layak. Di sekitar kita, masih ada lansia yang masih melakukan banyak pekerjaan demi bisa makan dan bertahan hidup.  \r\n\r\nBelakangan ini, fenomena mendadak di-PHK dialami oleh banyak para ayah. Keputusan yang harus diterima tapi sulit dijalani. Mereka satu-satunya tulang punggung keluarga! Berjualan jadi jalan agar uang rumah tetap ada sambil menunggu pekerjaan tetap memanggil kembali.\r\nAda juga kepala keluarga yang merupakan pekerja harian dimana tidak setiap hari mereka akan mendapatkan upah. Punya banyak sumber penghasilan menjadi satu-satunya jalan agar anak dan istri bisa makan.\r\n\r\n***\r\nKini, setelah mendapatkan gerobak gratis dan memulai usahanya, ia bisa dapat bekerja sekaligus memantau anaknya. Karena tempatnya berjualan tidak jauh dari rumahnya.\r\n\r\n\"Alhamdulillah jadi bisa tetap mengawasi dan memantau anak saya\" ucap Pak Amin, ia mengucap syukur atas kesempatan yang diberikan untuk membuka usaha bantuan dari orang-orang baik.\r\n\r\nâ€œIni ngebantu sekali, ayamnya pun bisa untuk dimakanâ€¦â€, cerita salah satu penerima manfaat â€œSaya berharap program ini terus berlanjut dan bisa bantu lebih banyak orang lagiâ€\r\nKarena berjualan dengan #GerobakGratis darimu, banyak keluarga yang kini pendapatannya naik sekitar 80% dari sebelumnya.\r\n\r\nPaling penting adalah mereka tidak perlu takut rugi. Karena modal usaha seperti; gerobak gratis, fasilitas perlengkapan masak, training masak dan pendampingan bisnis datangnya dari bantuanmu, #OrangBaik!\r\n\r\nMari kita jaga keluarga-keluarga dhuafa dari kelaparan dan putus sekolah dengan berbagi gerobak gratis dan bantuan lainnya dengan cara:\r\n\r\n1. Klik tombol \"DONASI SEKARANG\";\r\n\r\n2. Isi nominal donasi yang ingin diberikan;\r\n\r\n3. Pilih metode pembayaran GO-PAY/Mandiri/BCA/BNI/BNI Syariah/BRI dan kartu kredit;\r\n\r\n4. Dapat laporan via email.\r\n\r\nTidak hanya berdonasi, teman-teman juga bisa membantu dengan cara menyebarkan halaman galang dana ini ke orang-orang terdekat agar semakin banyak orang yang ikut membantu.\r\n\r\nTerima kasih, \r\n\r\nKitabisa\r\nâ€œNgojek juga gak bebas pak, karena harus menjaga anak saya yg ABK (Anak Berkebutuhan Khusus).... \" Tutur Pak Amin\r\nPak Amin sempat kena PHK di awal pandemi 2020 silam. Setelahnya, ia bekerja jadi tukang ojek online demi keluarganya bisa makan dan memenuhi kebutuhan yang dibutuhkan anaknya yang merupakan ABK.\r\nHarga-harga semua semakin mahal, bahkan baru-baru ini harga beras pun naik. Di jalan pulang dan pergi kerja, yang mereka pikirkan adalah:\r\n\r\nâ€œBagaimana anak dan istri bisa makan? Bagaimana anak-anak harus putus sekolah?â€\r\n\r\nPernah terbayang gak, kalau kita kasih sebuah gerobak gratis dan pengetahuan tentang jualan, akan sebesar apa dampak bagi keluarganya?\r\n\r\nBisa mulai lagi menabung untuk dana darurat, bayar biaya berobat anak, tidak perlu khawatir anaknya akan putus sekolah, dan bisa sesekali membelikan anaknya jajan. Makan pun jadi 3 kali sehariâ€¦\r\n\r\nTernyata masa tua tidak menjadi jaminan, seseorang bisa berhenti mencari nafkah dan hidup layak. Di sekitar kita, masih ada lansia yang masih melakukan banyak pekerjaan demi bisa makan dan bertahan hidup.  \r\n\r\nBelakangan ini, fenomena mendadak di-PHK dialami oleh banyak para ayah. Keputusan yang harus diterima tapi sulit dijalani. Mereka satu-satunya tulang punggung keluarga! Berjualan jadi jalan agar uang rumah tetap ada sambil menunggu pekerjaan tetap memanggil kembali.\r\nAda juga kepala keluarga yang merupakan pekerja harian dimana tidak setiap hari mereka akan mendapatkan upah. Punya banyak sumber penghasilan menjadi satu-satunya jalan agar anak dan istri bisa makan.\r\n\r\n***\r\nKini, setelah mendapatkan gerobak gratis dan memulai usahanya, ia bisa dapat bekerja sekaligus memantau anaknya. Karena tempatnya berjualan tidak jauh dari rumahnya.\r\n\r\n\"Alhamdulillah jadi bisa tetap mengawasi dan memantau anak saya\" ucap Pak Amin, ia mengucap syukur atas kesempatan yang diberikan untuk membuka usaha bantuan dari orang-orang baik.\r\n\r\nâ€œIni ngebantu sekali, ayamnya pun bisa untuk dimakanâ€¦â€, cerita salah satu penerima manfaat â€œSaya berharap program ini terus berlanjut dan bisa bantu lebih banyak orang lagiâ€\r\nKarena berjualan dengan #GerobakGratis darimu, banyak keluarga yang kini pendapatannya naik sekitar 80% dari sebelumnya.\r\n\r\nPaling penting adalah mereka tidak perlu takut rugi. Karena modal usaha seperti; gerobak gratis, fasilitas perlengkapan masak, training masak dan pendampingan bisnis datangnya dari bantuanmu, #OrangBaik!\r\n\r\nMari kita jaga keluarga-keluarga dhuafa dari kelaparan dan putus sekolah dengan berbagi gerobak gratis dan bantuan lainnya dengan cara:\r\n\r\n1. Klik tombol \"DONASI SEKARANG\";\r\n\r\n2. Isi nominal donasi yang ingin diberikan;\r\n\r\n3. Pilih metode pembayaran GO-PAY/Mandiri/BCA/BNI/BNI Syariah/BRI dan kartu kredit;\r\n\r\n4. Dapat laporan via email.\r\n\r\nTidak hanya berdonasi, teman-teman juga bisa membantu dengan cara menyebarkan halaman galang dana ini ke orang-orang terdekat agar semakin banyak orang yang ikut membantu.\r\n\r\nTerima kasih, \r\n\r\nKitabisa\r\nâ€œNgojek juga gak bebas pak, karena harus menjaga anak saya yg ABK (Anak Berkebutuhan Khusus).... \" Tutur Pak Amin\r\nPak Amin sempat kena PHK di awal pandemi 2020 silam. Setelahnya, ia bekerja jadi tukang ojek online demi keluarganya bisa makan dan memenuhi kebutuhan yang dibutuhkan anaknya yang merupakan ABK.\r\nHarga-harga semua semakin mahal, bahkan baru-baru ini harga beras pun naik. Di jalan pulang dan pergi kerja, yang mereka pikirkan adalah:\r\n\r\nâ€œBagaimana anak dan istri bisa makan? Bagaimana anak-anak harus putus sekolah?â€\r\n\r\nPernah terbayang gak, kalau kita kasih sebuah gerobak gratis dan pengetahuan tentang jualan, akan sebesar apa dampak bagi keluarganya?\r\n\r\nBisa mulai lagi menabung untuk dana darurat, bayar biaya berobat anak, tidak perlu khawatir anaknya akan putus sekolah, dan bisa sesekali membelikan anaknya jajan. Makan pun jadi 3 kali sehariâ€¦\r\n\r\nTernyata masa tua tidak menjadi jaminan, seseorang bisa berhenti mencari nafkah dan hidup layak. Di sekitar kita, masih ada lansia yang masih melakukan banyak pekerjaan demi bisa makan dan bertahan hidup.  \r\n\r\nBelakangan ini, fenomena mendadak di-PHK dialami oleh banyak para ayah. Keputusan yang harus diterima tapi sulit dijalani. Mereka satu-satunya tulang punggung keluarga! Berjualan jadi jalan agar uang rumah tetap ada sambil menunggu pekerjaan tetap memanggil kembali.\r\nAda juga kepala keluarga yang merupakan pekerja harian dimana tidak setiap hari mereka akan mendapatkan upah. Punya banyak sumber penghasilan menjadi satu-satunya jalan agar anak dan istri bisa makan.\r\n\r\n***\r\nKini, setelah mendapatkan gerobak gratis dan memulai usahanya, ia bisa dapat bekerja sekaligus memantau anaknya. Karena tempatnya berjualan tidak jauh dari rumahnya.\r\n\r\n\"Alhamdulillah jadi bisa tetap mengawasi dan memantau anak saya\" ucap Pak Amin, ia mengucap syukur atas kesempatan yang diberikan untuk membuka usaha bantuan dari orang-orang baik.\r\n\r\nâ€œIni ngebantu sekali, ayamnya pun bisa untuk dimakanâ€¦â€, cerita salah satu penerima manfaat â€œSaya berharap program ini terus berlanjut dan bisa bantu lebih banyak orang lagiâ€\r\nKarena berjualan dengan #GerobakGratis darimu, banyak keluarga yang kini pendapatannya naik sekitar 80% dari sebelumnya.\r\n\r\nPaling penting adalah mereka tidak perlu takut rugi. Karena modal usaha seperti; gerobak gratis, fasilitas perlengkapan masak, training masak dan pendampingan bisnis datangnya dari bantuanmu, #OrangBaik!\r\n\r\nMari kita jaga keluarga-keluarga dhuafa dari kelaparan dan putus sekolah dengan berbagi gerobak gratis dan bantuan lainnya dengan cara:\r\n\r\n1. Klik tombol \"DONASI SEKARANG\";\r\n\r\n2. Isi nominal donasi yang ingin diberikan;\r\n\r\n3. Pilih metode pembayaran GO-PAY/Mandiri/BCA/BNI/BNI Syariah/BRI dan kartu kredit;\r\n\r\n4. Dapat laporan via email.\r\n\r\nTidak hanya berdonasi, teman-teman juga bisa membantu dengan cara menyebarkan halaman galang dana ini ke orang-orang terdekat agar semakin banyak orang yang ikut membantu.\r\n\r\nTerima kasih, \r\n\r\nKitabisa\r\nâ€œNgojek juga gak bebas pak, karena harus menjaga anak saya yg ABK (Anak Berkebutuhan Khusus).... \" Tutur Pak Amin\r\nPak Amin sempat kena PHK di awal pandemi 2020 silam. Setelahnya, ia bekerja jadi tukang ojek online demi keluarganya bisa makan dan memenuhi kebutuhan yang dibutuhkan anaknya yang merupakan ABK.\r\nHarga-harga semua semakin mahal, bahkan baru-baru ini harga beras pun naik. Di jalan pulang dan pergi kerja, yang mereka pikirkan adalah:\r\n\r\nâ€œBagaimana anak dan istri bisa makan? Bagaimana anak-anak harus putus sekolah?â€\r\n\r\nPernah terbayang gak, kalau kita kasih sebuah gerobak gratis dan pengetahuan tentang jualan, akan sebesar apa dampak bagi keluarganya?\r\n\r\nBisa mulai lagi menabung untuk dana darurat, bayar biaya berobat anak, tidak perlu khawatir anaknya akan putus sekolah, dan bisa sesekali membelikan anaknya jajan. Makan pun jadi 3 kali sehariâ€¦\r\n\r\nTernyata masa tua tidak menjadi jaminan, seseorang bisa berhenti mencari nafkah dan hidup layak. Di sekitar kita, masih ada lansia yang masih melakukan banyak pekerjaan demi bisa makan dan bertahan hidup.  \r\n\r\nBelakangan ini, fenomena mendadak di-PHK dialami oleh banyak para ayah. Keputusan yang harus diterima tapi sulit dijalani. Mereka satu-satunya tulang punggung keluarga! Berjualan jadi jalan agar uang rumah tetap ada sambil menunggu pekerjaan tetap memanggil kembali.\r\nAda juga kepala keluarga yang merupakan pekerja harian dimana tidak setiap hari mereka akan mendapatkan upah. Punya banyak sumber penghasilan menjadi satu-satunya jalan agar anak dan istri bisa makan.\r\n\r\n***\r\nKini, setelah mendapatkan gerobak gratis dan memulai usahanya, ia bisa dapat bekerja sekaligus memantau anaknya. Karena tempatnya berjualan tidak jauh dari rumahnya.\r\n\r\n\"Alhamdulillah jadi bisa tetap mengawasi dan memantau anak saya\" ucap Pak Amin, ia mengucap syukur atas kesempatan yang diberikan untuk membuka usaha bantuan dari orang-orang baik.\r\n\r\nâ€œIni ngebantu sekali, ayamnya pun bisa untuk dimakanâ€¦â€, cerita salah satu penerima manfaat â€œSaya berharap program ini terus berlanjut dan bisa bantu lebih banyak orang lagiâ€\r\nKarena berjualan dengan #GerobakGratis darimu, banyak keluarga yang kini pendapatannya naik sekitar 80% dari sebelumnya.\r\n\r\nPaling penting adalah mereka tidak perlu takut rugi. Karena modal usaha seperti; gerobak gratis, fasilitas perlengkapan masak, training masak dan pendampingan bisnis datangnya dari bantuanmu, #OrangBaik!\r\n\r\nMari kita jaga keluarga-keluarga dhuafa dari kelaparan dan putus sekolah dengan berbagi gerobak gratis dan bantuan lainnya dengan cara:\r\n\r\n1. Klik tombol \"DONASI SEKARANG\";\r\n\r\n2. Isi nominal donasi yang ingin diberikan;\r\n\r\n3. Pilih metode pembayaran GO-PAY/Mandiri/BCA/BNI/BNI Syariah/BRI dan kartu kredit;\r\n\r\n4. Dapat laporan via email.\r\n\r\nTidak hanya berdonasi, teman-teman juga bisa membantu dengan cara menyebarkan halaman galang dana ini ke orang-orang terdekat agar semakin banyak orang yang ikut membantu.\r\n\r\nTerima kasih, \r\n\r\nKitabisa', NULL),
(57, 'levi000', 'sdfg', 'bansos', 'coba tgl', 'uploads-gambar/Screenshot (722).png', 'iiiii', 'Teks di atas menggambarkan inisiatif luar biasa yang diambil oleh sekelompok individu atau organisasi dalam meraih berkah Ramadan dengan memberikan 100 gerobak secara gratis. Inisiatif ini bukan hanya sekedar tindakan kebaikan biasa, tetapi juga mencerminkan semangat solidaritas, kepedulian, dan empati terhadap sesama, terutama dalam bulan suci Ramadan.\r\n\r\nDalam konteks masyarakat Muslim, Ramadan adalah bulan yang dianggap suci dan penuh berkah. Salah satu aspek penting dari Ramadan adalah spirit berbagi dan peduli terhadap sesama, terutama yang kurang mampu. Dalam hal ini, pemberian 100 gerobak secara gratis dapat dipandang sebagai bentuk nyata dari nilai-nilai tersebut.\r\n\r\nPemberian 100 gerobak gratis juga memiliki dampak sosial dan ekonomi yang signifikan. Gerobak dapat menjadi sarana bagi mereka yang kurang mampu untuk memulai atau mengembangkan usaha kecil-kecilan, seperti jualan makanan atau barang dagangan lainnya. Dengan adanya gerobak ini, diharapkan dapat memberikan peluang ekonomi bagi para penerima sehingga mereka dapat meningkatkan taraf hidup mereka.\r\n\r\nSelain aspek ekonomi, inisiatif ini juga memiliki dampak psikologis yang positif. Penerima gerobak akan merasakan dukungan dan perhatian dari komunitas mereka, yang dapat meningkatkan rasa percaya diri dan harga diri mereka. Hal ini dapat membantu mereka untuk lebih optimis dalam menghadapi tantangan dan mengembangkan potensi mereka.\r\n\r\nSelain itu, pemberian 100 gerobak gratis juga dapat menjadi inspirasi bagi orang lain untuk melakukan tindakan baik serupa. Inisiatif ini dapat memicu efek domino di mana semakin banyak orang tergerak untuk melakukan kebaikan, sehingga menciptakan lingkungan yang lebih baik dan harmonis.\r\n\r\nNamun, untuk menjalankan inisiatif ini dengan sukses, diperlukan perencanaan dan koordinasi yang matang. Langkah-langkah yang perlu dilakukan antara lain adalah identifikasi penerima yang membutuhkan, pemilihan jenis gerobak yang sesuai dengan kebutuhan mereka, serta penyediaan bantuan tambahan seperti pelatihan usaha kecil dan bantuan modal awal.\r\n\r\nSelain itu, penting juga untuk melibatkan berbagai pihak, termasuk pemerintah, lembaga swadaya masyarakat, dan donatur potensial lainnya, agar inisiatif ini dapat berjalan lancar dan berkelanjutan. Dengan adanya dukungan dari berbagai pihak, diharapkan pemberian 100 gerobak gratis dapat memberikan dampak yang lebih luas dan berkelanjutan bagi masyarakat.\r\n\r\nSecara keseluruhan, inisiatif pemberian 100 gerobak gratis ini merupakan contoh nyata dari bagaimana Ramadan dapat menjadi momentum untuk melakukan kebaikan dan berbagi dengan sesama. Melalui tindakan konkret ini, diharapkan dapat tercipta masyarakat yang lebih peduli, solidaritas yang lebih kuat, dan berkah yang lebih melimpah dalam bulan Ramadan dan di luar itu pun.\r\nTeks di atas menggambarkan inisiatif luar biasa yang diambil oleh sekelompok individu atau organisasi dalam meraih berkah Ramadan dengan memberikan 100 gerobak secara gratis. Inisiatif ini bukan hanya sekedar tindakan kebaikan biasa, tetapi juga mencerminkan semangat solidaritas, kepedulian, dan empati terhadap sesama, terutama dalam bulan suci Ramadan.\r\n\r\nDalam konteks masyarakat Muslim, Ramadan adalah bulan yang dianggap suci dan penuh berkah. Salah satu aspek penting dari Ramadan adalah spirit berbagi dan peduli terhadap sesama, terutama yang kurang mampu. Dalam hal ini, pemberian 100 gerobak secara gratis dapat dipandang sebagai bentuk nyata dari nilai-nilai tersebut.\r\n\r\nPemberian 100 gerobak gratis juga memiliki dampak sosial dan ekonomi yang signifikan. Gerobak dapat menjadi sarana bagi mereka yang kurang mampu untuk memulai atau mengembangkan usaha kecil-kecilan, seperti jualan makanan atau barang dagangan lainnya. Dengan adanya gerobak ini, diharapkan dapat memberikan peluang ekonomi bagi para penerima sehingga mereka dapat meningkatkan taraf hidup mereka.\r\n\r\nSelain aspek ekonomi, inisiatif ini juga memiliki dampak psikologis yang positif. Penerima gerobak akan merasakan dukungan dan perhatian dari komunitas mereka, yang dapat meningkatkan rasa percaya diri dan harga diri mereka. Hal ini dapat membantu mereka untuk lebih optimis dalam menghadapi tantangan dan mengembangkan potensi mereka.\r\n\r\nSelain itu, pemberian 100 gerobak gratis juga dapat menjadi inspirasi bagi orang lain untuk melakukan tindakan baik serupa. Inisiatif ini dapat memicu efek domino di mana semakin banyak orang tergerak untuk melakukan kebaikan, sehingga menciptakan lingkungan yang lebih baik dan harmonis.\r\n\r\nNamun, untuk menjalankan inisiatif ini dengan sukses, diperlukan perencanaan dan koordinasi yang matang. Langkah-langkah yang perlu dilakukan antara lain adalah identifikasi penerima yang membutuhkan, pemilihan jenis gerobak yang sesuai dengan kebutuhan mereka, serta penyediaan bantuan tambahan seperti pelatihan usaha kecil dan bantuan modal awal.\r\n\r\nSelain itu, penting juga untuk melibatkan berbagai pihak, termasuk pemerintah, lembaga swadaya masyarakat, dan donatur potensial lainnya, agar inisiatif ini dapat berjalan lancar dan berkelanjutan. Dengan adanya dukungan dari berbagai pihak, diharapkan pemberian 100 gerobak gratis dapat memberikan dampak yang lebih luas dan berkelanjutan bagi masyarakat.\r\n\r\nSecara keseluruhan, inisiatif pemberian 100 gerobak gratis ini merupakan contoh nyata dari bagaimana Ramadan dapat menjadi momentum untuk melakukan kebaikan dan berbagi dengan sesama. Melalui tindakan konkret ini, diharapkan dapat tercipta masyarakat yang lebih peduli, solidaritas yang lebih kuat, dan berkah yang lebih melimpah dalam bulan Ramadan dan di luar itu pun.', '2024-03-31 14:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `aturan_layanan`
--

CREATE TABLE `aturan_layanan` (
  `id` int(10) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `aturan` longtext NOT NULL,
  `template_data` varchar(500) CHARACTER SET latin1 NOT NULL,
  `petugas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aturan_layanan`
--

INSERT INTO `aturan_layanan` (`id`, `id_layanan`, `aturan`, `template_data`, `petugas`) VALUES
(1, 2, '- Surat pengantar dan keterangan RT hingga dukuh setempat;\r\n- Surat pernyataan belum terekam pada DTKS (Data Terpadu Kesejahteraan Sosial);\r\n- Rincian pembiayaan biaya pendidikan atau biaya rumah sakit;\r\n- Fotokopi Kartu Keluarga dan menunjukkan yang asli;\r\n- Fotokopi dan e-KTP asli;\r\n- Beberapa daerah akan diminta membuat surat pernyataan tidak mampu yang diketahui RT dan 2 orang saksi;\r\n- Tanda lunas Pajak Bumi dan Bangunan (PBB);\r\n- Pas foto rumah yang bersangkutan dari posisi depan dan samping rumah masing-masing ukuran 5R.', '3d animasi apresiasimu.pdf', ''),
(13, 4, 'cekcek', 'Document 8.pdf', 'Administrator1'),
(14, 1, 'ini aturan', 'sk aktif.pdf', 'sdfg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `userId` varchar(100) NOT NULL,
  `tanggapan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `userId`, `tanggapan`) VALUES
(5, 'levi000', 'bbbb'),
(6, 'levi', 'apaaa');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_administrasi`
--

CREATE TABLE `hasil_administrasi` (
  `id` int(11) NOT NULL,
  `administrasiId` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `file` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tanggal` date NOT NULL,
  `petugas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_administrasi`
--

INSERT INTO `hasil_administrasi` (`id`, `administrasiId`, `nama`, `deskripsi`, `file`, `tanggal`, `petugas`) VALUES
(2, 5, 'cobaaa', 'okeee', 'Kartu Ujian.pdf', '2024-03-24', 'sdfg');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_pengaduan`
--

CREATE TABLE `hasil_pengaduan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pengaduanId` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `file` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tanggal` date NOT NULL,
  `petugas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_pengaduan`
--

INSERT INTO `hasil_pengaduan` (`id`, `nama`, `pengaduanId`, `deskripsi`, `file`, `tanggal`, `petugas`) VALUES
(1, 'sdfg', 315, 'okeee', 'Kartu Ujian.pdf', '2024-03-26', 'sdfg'),
(5, 'cobaaa', 319, 'siapp', 'Kartu Ujian.pdf', '2024-03-26', 'sdfg');

-- --------------------------------------------------------

--
-- Table structure for table `kepengurusan`
--

CREATE TABLE `kepengurusan` (
  `id` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kepengurusan`
--

INSERT INTO `kepengurusan` (`id`, `nip`, `foto`, `nama`, `jabatan`) VALUES
(1, '123456789098765432', '852-mleyot-removebg-preview.png', 'Bambang Eka', 'Kepala Desa'),
(18, '888888888888888888', '480-himatif_store.png', 'coba', 'Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id` int(10) NOT NULL,
  `jenis` enum('Pengaduan','Administrasi') NOT NULL,
  `spesifikasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id`, `jenis`, `spesifikasi`) VALUES
(1, 'Pengaduan', 'Pengaduan Listrik'),
(2, 'Administrasi', 'Surat Keterangan Tidak Mampu'),
(4, 'Administrasi', 'Surat Keterangan Ahli Waris'),
(5, 'Pengaduan', 'Pengaduan Sembako'),
(6, 'Administrasi', 'Surat Keterangan Miskin'),
(7, 'Administrasi', 'Surat Keterangan Kematian');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(10) NOT NULL,
  `userId` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `data` varchar(255) NOT NULL DEFAULT '-',
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `userId`, `nama`, `jenis`, `deskripsi`, `data`, `tanggal`) VALUES
(289, 'warga1', 'Warga sini', 'Pengaduan Listrik', 'ini deskripsi', 'surat izin ortu 001.pdf', '2022-06-12 19:51:48'),
(315, 'levi000', 'sdfg', 'Pengaduan Listrik', 'bbbb', 'Kartu Ujian.pdf', '2024-03-25 10:48:47'),
(319, 'levi', 'cobaaa', 'Pengaduan Listrik', 'gimanaaa', 'sk aktif.pdf', '2024-03-26 13:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `userId` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` enum('Pengaduan','Administrasi') NOT NULL,
  `request` varchar(100) NOT NULL,
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `userId`, `nama`, `jenis`, `request`, `alasan`) VALUES
(4, 'levi', 'cobaaa', 'Pengaduan', 'aduannnn', '12345u');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `level` enum('admin','petugas','warga') NOT NULL,
  `nip` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `email`, `alamat`, `tlp`, `level`, `nip`) VALUES
('levi', '5623a9bfaa9fdd31dc845be686f4f200', 'cobaaa', 'a710219074@student.ums.ac.id', 'ini alamat', '2345', 'warga', ''),
('levi000', '5623a9bfaa9fdd31dc845be686f4f200', 'sdfg', 'iniii@dewareff.com', 'ini alamat', 'sdfgh', 'petugas', '000000000000000000'),
('levi888', '5623a9bfaa9fdd31dc845be686f4f200', 'cobaaa9999', 'a710219074@student.ums.ac.id', 'ini alamat\r\nHalloo', '2345', 'petugas', '000000000000000000'),
('warga1', '8bee83f98002668cb8f55ba3ba2a6d3b', 'Warga sini', 'warga@gmail.con', 'disini', '0123', 'warga', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrasi`
--
ALTER TABLE `administrasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `aturan_layanan`
--
ALTER TABLE `aturan_layanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_layanan` (`id_layanan`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `hasil_administrasi`
--
ALTER TABLE `hasil_administrasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `administrasiId` (`administrasiId`);

--
-- Indexes for table `hasil_pengaduan`
--
ALTER TABLE `hasil_pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengaduanId` (`pengaduanId`);

--
-- Indexes for table `kepengurusan`
--
ALTER TABLE `kepengurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrasi`
--
ALTER TABLE `administrasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `aturan_layanan`
--
ALTER TABLE `aturan_layanan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hasil_administrasi`
--
ALTER TABLE `hasil_administrasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hasil_pengaduan`
--
ALTER TABLE `hasil_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=320;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrasi`
--
ALTER TABLE `administrasi`
  ADD CONSTRAINT `administrasi_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`username`);

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`username`);

--
-- Constraints for table `aturan_layanan`
--
ALTER TABLE `aturan_layanan`
  ADD CONSTRAINT `aturan_layanan_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`username`);

--
-- Constraints for table `hasil_administrasi`
--
ALTER TABLE `hasil_administrasi`
  ADD CONSTRAINT `hasil_administrasi_ibfk_1` FOREIGN KEY (`administrasiId`) REFERENCES `administrasi` (`id`);

--
-- Constraints for table `hasil_pengaduan`
--
ALTER TABLE `hasil_pengaduan`
  ADD CONSTRAINT `hasil_pengaduan_ibfk_1` FOREIGN KEY (`pengaduanId`) REFERENCES `pengaduan` (`id`);

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`username`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
