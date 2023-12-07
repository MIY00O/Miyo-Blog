-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 12:36 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `caraousel`
--

CREATE TABLE `caraousel` (
  `id_caraousel` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caraousel`
--

INSERT INTO `caraousel` (`id_caraousel`, `judul`, `foto`) VALUES
(27, 'Kenikmatan Gudeg Yogyakarta', '20231204013657.jpg'),
(28, 'Khasiat Jamu Tradisional', '20231204013736.jpg'),
(29, 'Kemerdekaan Indonesia', '20231204013751.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(13, 'Sejarah'),
(16, 'Bahasa Jawa'),
(18, 'Berita'),
(19, 'Pengumuman');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `judul_web` varchar(200) NOT NULL,
  `profil_web` text NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_wa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `judul_web`, `profil_web`, `instagram`, `facebook`, `email`, `alamat`, `no_wa`) VALUES
(1, 'Miyo Blog', '<p>Sebuah website yang dibuat sepenuh hati oleh <strong>Miyo Suzuya</strong>, Dibuat dengan berbagai keribetan didalamnya yang berisi tentang berbagai hal yang saya sukai dan cintai.</p>', 'https://www.instagram.com/julino.tin/', 'https://web.facebook.com/profile.php?id=100040727631114', 'damchongkun@gmail.com', 'TegalKecil, Tasikpahit KarangLawas', '082266819224');

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `id_konten` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id_konten`, `judul`, `keterangan`, `foto`, `slug`, `id_kategori`, `tanggal`, `username`) VALUES
(45, 'Kenikmatan Gudeg Yogyakarta', '<p class=\"MsoNormal\" style=\"text-align: justify; text-justify: inter-ideograph;\"><span lang=\"EN-US\" style=\"font-size: 12.0pt; line-height: 107%; mso-ansi-language: EN-US;\">&nbsp; &nbsp;Gudeg yaiku panganan khas soko Yogyakarta, Indonesia. Ing perkembangane, masyarakat ngenal Yogyakarta dadi Kota Gudeg saking terkenale gudeg. Sejarah gudeg ing Yogyakarta barengan soko dibangune Kerajaan Mataram Islam ing alas Mentaok daerah Kotagede taun 1500-an.</span></p>\r\n<p class=\"MsoNormal\" style=\"text-align: justify; text-justify: inter-ideograph;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"text-align: justify; text-justify: inter-ideograph;\"><span lang=\"EN-US\" style=\"font-size: 12.0pt; line-height: 107%; mso-ansi-language: EN-US;\">&nbsp; &nbsp;Gudeg sejatine ora soko kerajaan naming soko masyarakat. Amarga dimasake suwe, ing abad 19 urung akeh sing dodolan gudeg. Gudeg mula mula populer ing taun 1940-an pas Presiden Sukarno mbangun Universitas Gajah Mada(UGM).</span></p>\r\n<p>&nbsp;</p>\r\n<p><span lang=\"EN-US\" style=\"font-size: 12.0pt; line-height: 107%; mso-ansi-language: EN-US;\">&nbsp; &nbsp;Gudeg digawe soko nangka muda mentah(Gori) sing direbus beberapa jam nganggo gula aren, santan lan rempah rempah kaya bawang putih, bawang abang, kemiri, ketumbar, lengkuas, daun salam lan daun jati ben menehi warna coklat keabangan. Soko campuran bumbu mau, gudeg bisa terasa manis ing lidah lan duwe rasa khas lan enak miturut selera wong jowo.</span></p>\r\n<p class=\"MsoNormal\" style=\"text-align: justify; text-justify: inter-ideograph;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"text-align: justify; text-justify: inter-ideograph;\"><span lang=\"EN-US\" style=\"font-size: 12.0pt; line-height: 107%; mso-ansi-language: EN-US;\">&nbsp; &nbsp;Gudeg biasane dirumantekne karo sego putih, opor telur, lan tahu tempe. Ana beberapa jenis gudeg, koyo gudeg kering, basah khas Yogyakarta, khas Solo lan khas Jawa Timur. Gudeg kering biasane duwe sedikit santan sehingga duwe sedikit saus, bedane karo gudeg basah sing duwe akeh santan.</span></p>\r\n<p class=\"MsoNormal\" style=\"text-align: justify; text-justify: inter-ideograph;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"text-align: justify; text-justify: inter-ideograph;\"><span lang=\"EN-US\" style=\"font-size: 12.0pt; line-height: 107%; mso-ansi-language: EN-US;\">&nbsp; &nbsp;Gudeg Yogyakarta biasane luwih manis, luwih kering lan wernone keabangan. Gudeg Solo soko Kota Surakarta luwih berair lan pekat. gudeg Yogyakarta biasane disebut &ldquo;Gudeg Merah&rdquo;, lan gudeg Solo biasane disebut &ldquo;Gudeg Putih&rdquo;. Gudeg Jawa Timur biasane rasane luwih pedes lan panas dibandingke gudeg Yogyakarta sing manis.</span></p>', '20231204012859.jpg', 'Kenikmatan-Gudeg-Yogyakarta', '16', '2023-12-04', 'Kurniawan'),
(46, 'Khasiat Jamu Tradisional', '<p><span class=\"OYPEnA text-decoration-none text-strikethrough-none\">&nbsp; &nbsp;Jamu yaiku wedang kas indonesia ingkang wiwit rumiyin dipunpitados saged njagi kesarasan. Jamu tradisional kadamel saking bahan - bahan sugih badhe khasiat, wiwit saking jahe, kunyit, temulawak, meniran, kajeng manis lan ron sedhah. </span><span class=\"OYPEnA text-decoration-none text-strikethrough-none\">Niki jamu pilihan kasil saking nyambut damel kelompok kita yaiku :</span></p>\r\n<p class=\"cvGsUA direction-ltr align-justify para-style-body\">&nbsp;</p>\r\n<p><span style=\"font-size: 14pt;\"><strong>1. Jamu Saking Kunyit</strong></span></p>\r\n<p>Resep :<br>500ml Air<br>&nbsp;1 Jari telunjuk kunyit<br>&nbsp;40g Gula aren</p>\r\n<p>Manfaatipun, angsal nginggahaken daya tahan badan. Amargi kunyit ngandhut zat kurkumin ingkang nyambut damel nginggahaken daya tahan badan.</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-size: 14pt;\"><strong>2. Jamu Roh Kates</strong></span></p>\r\n<p>Resep :<br>1 1/2 Lembar daun pepaya<br>500ml air hangat</p>\r\n<p style=\"line-height: 1.5;\">Ron kates kathah ngandhut vitamin D ingkang angsal nyegah kedadosipun penyakit emfisema (penyakit kronis akibat kerisakan ing alveolus). Kejawi manfaat wonten inggil kates ugi ngandhut enzim papain. Enzim papain inggih punika enzim proteolitik ingkang diekstrak saking buah kates.</p>\r\n<p style=\"line-height: 1.5;\">&nbsp;</p>\r\n<p><span style=\"font-size: 14pt;\"><strong>3. Jamu Beras Kencur</strong></span></p>\r\n<p>Resep :<br>500ml Air<br>125g kencur<br>5 ruas jahe<br>150g gula jawa</p>\r\n<p>salah sijining kandhutan ingkang wonten ing kencur yaiku antioksida. kandhutan puniki angsasl ngandhapaken kadar glukosa ing darah, lan nyegah diabetes.</p>', '20231204012953.jpg', 'Khasiat-Jamu-Tradisional', '16', '2023-12-04', 'Kurniawan'),
(47, 'Kemerdekaan Indonesia', '<p style=\"text-align: justify;\">&nbsp; &nbsp;Sejarah proklamasi kemerdekaan Indonesia dimulai pada tanggal 17 Agustus 1945, ketika bangsa Indonesia secara resmi menyatakan kemerdekaannya. Meskipun kekalahan Jepang dalam Perang Dunia II menjadi salah satu latar belakang penting yang mempercepat proses tersebut, kemerdekaan Indonesia bukanlah sebuah hadiah yang diberikan langsung oleh Jepang.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">&nbsp; &nbsp;Pada tanggal 6 Agustus 1945, sebuah bom atom dijatuhkan di atas kota Hiroshima, Jepang oleh Amerika Serikat, yang menurunkan moral dan semangat tentara Jepang di seluruh dunia. Tiga hari kemudian, pada tanggal 9 Agustus 1945, bom atom kedua dijatuhkan di atas Nagasaki, memaksa Jepang untuk menyerah kepada Amerika Serikat dan sekutunya. Momen ini dimanfaatkan oleh Indonesia untuk memproklamasikan kemerdekaannya.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">&nbsp; &nbsp;Pada tanggal 10 Agustus 1945, Soekarno, Hatta, dan Radjiman Wedyodiningrat diterbangkan ke Dalat, Vietnam, untuk bertemu dengan Marsekal Terauchi. Mereka diberitahu bahwa pasukan Jepang berada di ambang kekalahan dan akan memberikan kemerdekaan kepada Indonesia. Pada tanggal 12 Agustus 1945, Marsekal Terauchi mengumumkan kepada Soekarno, Hatta, dan Radjiman bahwa pemerintah Jepang akan segera memberikan kemerdekaan kepada Indonesia dan proklamasi kemerdekaan dapat dilaksanakan dalam beberapa hari.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">&nbsp; &nbsp;Dua hari setelah pertemuan di Dalat, saat Soekarno, Hatta, dan Radjiman kembali ke tanah air dari Dalat, Sutan Syahrir mendesak Soekarno untuk segera memproklamasikan kemerdekaan. Namun, Soekarno belum yakin bahwa Jepang benar-benar telah menyerah dan proklamasi kemerdekaan pada saat itu dapat menimbulkan konflik yang besar. Pada tanggal 14 Agustus 1945, Jepang menyerah kepada Sekutu, namun masih memegang kekuasaan di Indonesia.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">&nbsp; &nbsp;Pada tanggal 16 Agustus 1945, peristiwa Rengasdengklok terjadi. Para pemuda pejuang, termasuk Chaerul Saleh, Sukarni, Wikana, Shodanco Singgih, dan lainnya membawa Soekarno, Fatmawati, dan Guntur (anak mereka yang baru berusia 9 bulan) ke Rengasdengklok. Tujuannya adalah agar Soekarno dan Hatta tidak terpengaruh oleh Jepang. Di sana, mereka meyakinkan Soekarno bahwa Jepang telah menyerah dan para pejuang Indonesia siap untuk melawan Jepang.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">&nbsp; &nbsp;Setelah peristiwa Rengasdengklok, Soekarno dan Hatta kembali ke Jakarta. Mereka bertemu dengan Mayor Jenderal Oosugi Nishimura, Kepala Departemen Urusan Umum pemerintahan militer Jepang. Nishimura mengemukakan bahwa Jepang harus menjaga status quo dan tidak dapat memberi izin untuk mempersiapkan proklamasi kemerdekaan Indonesia seperti yang dijanjikan oleh Marsekal Terauchi di Dalat. Soekarno dan Hatta menyesali keputusan tersebut dan menuju ke rumah Laksamana Maeda untuk melakukan rapat guna menyiapkan teks Proklamasi.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">&nbsp; &nbsp;Penyusunan teks Proklamasi dilakukan oleh Soekarno, M. Hatta, Achmad Soebardjo, dan disaksikan oleh Soekardi, B.M. Diah, Sudiro, dan Sayuti Melik. Teks Proklamasi ditulis oleh Ir. Soekarno sendiri. Setelah selesai disepakati, Sayuti Melik menyalin dan mengetik teks tersebut menggunakan mesin tik milik Mayor Dr. Hermanto Kusumobroto (dari kantor perwakilan Angkatan Laut Jerman).</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">&nbsp; &nbsp;Pada pagi hari tanggal 17 Agustus 1945, di kediaman Soekarno di Jalan Pegangsaan Timur 56 (sekarang Jl. Proklamasi No.1), acara Proklamasi dimulai. Pukul 10 pagi, Soekarno membacakan teks Proklamasi dan pidato singkat setelahnya. Kemudian, bendera Merah Putih, yang dijahit oleh Ibu Fatmawati, dikibarkan oleh seorang prajurit PETA bernama Latief Hendraningrat yang dibantu oleh Soepardjo dan seorang pemudi yang membawa nampan berisi bendera Merah Putih. Setelah bendera berkibar, lagu Indonesia Raya dinyanyikan oleh semua hadirin. Bendera pusaka tersebut masih disimpan di Museum Tugu Proklamasi Nasional hingga saat ini.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">&nbsp; &nbsp;Pada tanggal 18 Agustus 1945, Panitia Persiapan Kemerdekaan Indonesia (PPKI) mengadakan rapat dan mengesahkan Undang-Undang Dasar sebagai dasar negara Republik Indonesia, yang kemudian dikenal sebagai UUD 45. Dengan demikian, terbentuklah Pemerintahan Negara Kesatuan Indonesia yang berbentuk Republik (NKRI) dengan kedaulatan di tangan rakyat yang dilakukan secara sukarela oleh Majelis Permusyawaratan Rakyat (MPR) yang akan dibentuk kemudian.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">&nbsp; &nbsp;Setelah usulan dari Mohammad Hatta dan persetujuan dari PPKI, Soekarno dan Mohammad Hatta terpilih sebagai Presiden dan Wakil Presiden Republik Indonesia yang pertama. Presiden dan Wakil Presiden akan diambil sumpahnya oleh sebuah Komite Nasional.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">&nbsp; &nbsp;Dengan demikian, proklamasi kemerdekaan Indonesia pada tanggal 17 Agustus 1945 menjadi tonggak bersejarah dalam perjalanan bangsa Indonesia menuju kemerdekaan. Teks Proklamasi yang disusun dengan cermat dan kesungguhan para pemimpin pada saat itu menjadi landasan dasar pembentukan negara Republik Indonesia. Proklamasi kemerdekaan merupakan momen penting yang harus dihargai dan diingat oleh setiap generasi Indonesia sebagai simbol perjuangan dan semangat kebangsaan.</p>', '20231204013033.jpg', 'Kemerdekaan-Indonesia', '13', '2023-12-04', 'Kurniawan'),
(48, 'Lorem', 'test', '20231204033320.jpg', 'Lorem', '19', '2023-12-04', 'Kurniawan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL,
  `last_login` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `name`, `password`, `level`, `last_login`) VALUES
(14, 'Bamb', 'Bamb', 'ee11cbb19052e40b07aac0ca060c23ee', 'Kontributor', '2023-12-04 09:16:01'),
(16, 'Kurniawan', 'Kurniawan', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '2023-12-04 10:17:23'),
(20, 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', 'Kontributor', '0'),
(21, 'test1', 'test1', '5a105e8b9d40e1329780d62ea2265d8a', 'Kontributor', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caraousel`
--
ALTER TABLE `caraousel`
  ADD PRIMARY KEY (`id_caraousel`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caraousel`
--
ALTER TABLE `caraousel`
  MODIFY `id_caraousel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `id_konten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
