-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Inang: 127.9.87.2:3306
-- Waktu pembuatan: 11 Feb 2016 pada 17.45
-- Versi Server: 5.5.45
-- Versi PHP: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `dbadmin_codeigniter`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agama`
--

CREATE TABLE IF NOT EXISTS `agama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `agama`
--

INSERT INTO `agama` (`id`, `nama`) VALUES
(1, 'Islam'),
(2, 'Kristen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `halamanStatik`
--

CREATE TABLE IF NOT EXISTS `halamanStatik` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `halamanStatik`
--

INSERT INTO `halamanStatik` (`id`, `nama`, `content`) VALUES
(1, 'about', '<div>\r\n<h2>INDOZONE - INDOZONEMEDIA</h2>\r\n\r\n<p>TEMPAT NGUMPUL PALING ASYIK!</p>\r\n\r\n<p>Business Inquiries :</p>\r\n\r\n<p>E-Mail: indozonemedia@gmail.com</p>\r\n\r\n<p>Line: indozone</p>\r\n</div>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `iklan`
--

CREATE TABLE IF NOT EXISTS `iklan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(100) NOT NULL,
  `penanggung_jawab` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(16) NOT NULL,
  `link` text NOT NULL,
  `file` varchar(200) NOT NULL,
  `tglMulai` datetime NOT NULL,
  `tglAkhir` datetime NOT NULL,
  `deskripsi` text NOT NULL,
  `status` enum('y','n') NOT NULL DEFAULT 'n',
  `waktu_buat` datetime NOT NULL,
  `waktu_ubah` datetime NOT NULL,
  `pelaku` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `iklan`
--

INSERT INTO `iklan` (`id`, `nama_perusahaan`, `penanggung_jawab`, `alamat`, `telp`, `link`, `file`, `tglMulai`, `tglAkhir`, `deskripsi`, `status`, `waktu_buat`, `waktu_ubah`, `pelaku`) VALUES
(1, 'SNEAKERS - FILE CREATIVE', 'File Creative 1', '', '', 'https://www.instagram.com/filecreative1/', '1-SNEAKERS-FILECREATIVE.jpg', '2016-02-06 17:20:25', '2016-02-06 17:20:25', '', 'y', '2016-02-06 17:20:25', '2016-02-06 17:20:35', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `individu`
--

CREATE TABLE IF NOT EXISTS `individu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) CHARACTER SET latin1 NOT NULL,
  `jenis_kelamin` int(2) NOT NULL DEFAULT '1' COMMENT '0=perempuan,1=laki-laki',
  `tgl_lahir` datetime NOT NULL,
  `agama` int(2) NOT NULL DEFAULT '1',
  `alamat` text NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tlp` varchar(16) DEFAULT NULL,
  `photo` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `waktu_buat` datetime NOT NULL,
  `waktu_ubah` datetime NOT NULL,
  `pelaku` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agama` (`agama`),
  KEY `agama_2` (`agama`),
  KEY `agama_3` (`agama`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `individu`
--

INSERT INTO `individu` (`id`, `nama`, `jenis_kelamin`, `tgl_lahir`, `agama`, `alamat`, `email`, `tlp`, `photo`, `waktu_buat`, `waktu_ubah`, `pelaku`) VALUES
(1, 'angga', 1, '1991-04-07 00:00:00', 1, 'Jalan Besar , kabupaten Aceh Tamiang,adf', 'jiwana.sp@gmail.com', '082161192244', '1-.jpg', '2015-12-02 22:49:25', '2015-12-17 23:02:34', 1),
(2, 'admin', 1, '2015-12-18 00:00:00', 1, 'Medan', 'contoh@gmail.com', '08210000', '2-.jpg', '2015-12-18 00:00:00', '2015-12-28 21:38:38', 2),
(3, 'editor', 1, '2015-12-18 00:00:00', 1, 'medan', 'contoh@gmail.com', '08210000', '3-.jpg', '2015-12-18 00:00:00', '2015-12-28 23:10:12', 3),
(4, 'editor', 1, '2015-12-18 00:00:00', 1, 'medan', 'contoh@gmail.com', '08210000', NULL, '2015-12-18 00:00:00', '2015-12-18 21:37:59', 1),
(5, 'author', 1, '2015-12-18 00:00:00', 1, 'medan', 'contoh@gmail.com', '08210000', NULL, '2015-12-18 00:00:00', '2015-12-18 21:38:36', 1),
(6, 'author', 1, '2015-12-18 00:00:00', 1, 'medan', 'contoh@gmail.com', '08210000', NULL, '2015-12-18 00:00:00', '2015-12-18 21:39:13', 1),
(7, 'author', 1, '2015-12-18 00:00:00', 1, 'medan', 'contoh@gmail.com', '08210000', NULL, '2015-12-18 00:00:00', '2015-12-18 21:40:12', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `pemalink` varchar(100) NOT NULL,
  `nomor` int(50) NOT NULL,
  `link` text NOT NULL,
  `status` enum('y','n') NOT NULL DEFAULT 'y',
  `waktu_buat` datetime NOT NULL,
  `waktu_ubah` datetime NOT NULL,
  `pelaku` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `pemalink`, `nomor`, `link`, `status`, `waktu_buat`, `waktu_ubah`, `pelaku`) VALUES
(13, 'Home', '', 1, '', 'y', '0000-00-00 00:00:00', '2016-02-06 16:51:59', 2),
(14, 'About', '', 6, 'about', 'y', '0000-00-00 00:00:00', '2016-02-06 16:51:59', 2),
(16, 'Education', 'education', 3, '', 'y', '2016-01-29 23:08:52', '2016-02-06 16:51:59', 2),
(17, 'Tourism', 'tourism', 4, '', 'y', '2016-01-29 23:09:58', '2016-02-06 16:51:59', 2),
(18, 'Community', 'community', 5, '', 'y', '2016-01-29 23:10:12', '2016-02-06 16:51:59', 2),
(20, 'News', 'news', 2, '', 'y', '2016-01-29 23:10:31', '2016-02-06 16:51:59', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `pemalink` varchar(100) NOT NULL,
  `waktu_publish` datetime NOT NULL,
  `deskripsi` text NOT NULL,
  `file` varchar(200) NOT NULL,
  `link` text,
  `type` varchar(50) NOT NULL,
  `jenis` int(2) NOT NULL COMMENT '0=image,1=video',
  `id_kategori` int(11) NOT NULL,
  `id_subkategori` int(11) NOT NULL,
  `status` enum('y','n') NOT NULL DEFAULT 'n',
  `created` int(11) NOT NULL,
  `setWaktu` datetime NOT NULL,
  `waktu_buat` datetime NOT NULL,
  `waktu_ubah` datetime NOT NULL,
  `pelaku` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kategori` (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id`, `judul`, `pemalink`, `waktu_publish`, `deskripsi`, `file`, `link`, `type`, `jenis`, `id_kategori`, `id_subkategori`, `status`, `created`, `setWaktu`, `waktu_buat`, `waktu_ubah`, `pelaku`) VALUES
(3, 'Mahasiswi ini merasa dibohongi dan menuntut cokelat gratis', 'mahasiswiArrayiniArraymerasaArraydibohongiArraydan.html', '2016-02-06 17:02:49', '<p style="text-align:justify"><span style="font-size:16px">Seorang mahasiswi bernama Saima Ahmad kini menuntut keadilan kepada pihak produsen cokelat terkenal KitKat, setelah menemukan salah satu produknya tidak berisikan wafer, hanya batangan cokelat.<br />\r\n<br />\r\nMahasiswi jurusan hukum yang masih berusia 20 tahun asal London tersebut kini meminta pihak Nestle untuk memberikan persediaan cokelat KitKat seumur hidup, menurut laporan ITV.<br />\r\n<br />\r\nAwalnya, Ahmad membeli delapan KitKat seharga US$4, dan kini ia mengancam akan melayangkan aksi legal jika tuntutannya tidak mendapati tanggapan. Dukungan klaim atas kerugian &#39;uang dan perasaan&#39; atas insiden tersebut ia dapatkan dengan mengutip kasus hukum serupa pada tahun 1930-an.<br />\r\n<br />\r\n&quot;Inti dari permasalahan ini adalah; produsen seharusnya bertugas untuk memberikan kepedulian terhadap konsumen,&quot; tertulis dalam suratnya kepada Nestle.<br />\r\n<br />\r\n&quot;Mereka memiliki tugas khusus untuk memberikan konsistensi terhadap proses pembuatan produk tersebut. Kegagalan dalam menjalani proses dengan baik telah menghasilkan sebuah produk tidak sesuai.&quot; Atas hasilnya tersebut, aku merasa telah disesatkan dalam pengunaan uang dan pembelian produk yang tidak sesuai dengan apa yang telah dipasarkan oleh Nestle.<br />\r\n<br />\r\nMahasiswi King College mengatakan kepada ITV bahwa ia sedang &quot;menjajal peruntungannya&quot; tapi ia juga mengungkapkan, &quot;jika tidak meminta, Anda tidak akan mendapatkannya&quot;.<br />\r\n<br />\r\n&quot;Mereka terus mengatakan memiliki konsep unik dalam setiap KitKat, tapi aku merasa dikecewakan dengan apa yang telah kubeli,&quot; ungkapnya.<br />\r\n<br />\r\n&quot;Jelas, jika aku ingin beli batang cokelat murni, aku akan beli cokelat Galaxy,&quot; ungkapnya.<br />\r\n<br />\r\n&quot;Aku tidak akan ragu untuk melangkah lebih jauh dengan kasus ini jika Nestle tidak memberikan permintaan maaf atau kompensasi yang layak,&quot; lanjutnya.<br />\r\n<br />\r\nWuihh, tuntutan menerima coklat seumur hidup.. It&#39;s THUG LIFE guys!</span></p>\r\n', '3-Mahasiswiinimerasadibohongidanmenuntutcokelatgratis-x.jpg', NULL, 'jpg', 0, 20, 0, 'y', 2, '2016-02-06 16:55:00', '2016-02-06 17:02:49', '2016-02-06 17:02:49', 2),
(4, 'Robot Tank Karya Anak Bangsa', 'robot-tank-karya-anak-bangsa.html', '2016-02-06 17:11:37', '<p style="text-align: justify;"><span style="font-size:16px">Mahasiswa Institut Teknologi 10 November (ITS), Bachtiar Dumais Laksana (23) rupanya tak mau tinggal diam jika Indonesia tertinggal di bidang teknologi, utamanya pertahanan dan keamanan. Atas alasan itu pula, bersama Adhitya Whisnu Pratama dan Muhammad Iqbal membuat kendaraan taktis mini tanpa awak pertama.<br />\r\n<br />\r\nTank robot yang dikendalikan lewat remote control ini dirancang, dirakit dan diproduksi sendiri oleh ketiganya. Produk tersebut belum diproduksi massal, masih berupa purwarupa. Tank ini diberi nama War-V1.<br />\r\n<br />\r\nUntuk mendukung aktivitasnya, mereka mendirikan perusahaan sendiri yang diberi nama BDL-Tech. Produknya tersebut sudah dilirik oleh Kodam Kodam VI/Mulawarman di Balikpapan, serta Batalyon Kavaleri 8 Divisi Infantri 2 Kostrad di Bandung.<br />\r\n<br />\r\n&quot;Saya sendiri direkturnya, bertiga, pengerjaan sudah makan waktu setahun lebih, kira-kira 13 bulan. Lengkap dengan desain, mekanik, rancang kendali elektronis. Kami memang kebetulan dari awal mau menyusun perusahaan yang bergerak di bidang hankam dan pendidikan,&quot; beber Bachtiar saat berbincang dengan merdeka.com, Senin (1/2) kemarin.<br />\r\n<br />\r\nPembuatan tank robot tersebut bermula dari hobi ketiganya di dunia militer, dengan latar belakang sebagai lulusan elektro sejak SMK, mereka mulai mencoba merealisasikan mimpinya. Desain dan model tank buatannya tersebut berasal dari robot yang digunakan oleh militer Jepang.</span><br />\r\n<br />\r\n<span style="font-size:16px">&quot;Kemudian kami coba, itungannya nekat. Saya tanya ke Batalion Kavaleri sampai Kodam, yang berikan tanggapan positif Kodam Mulawarman dan Batalion Kavaleri 8. Jadi kemudian dengan konsep yang ada, kendaraannya saya sendiri inginnya berfungsi sebagai back up, di lapangan sebagai sweeper atau penyapu, setelah infantri masuk mampu di back up unit ini. Makanya mulai dari senjata sistem kami sesuaikan dengan tujuan aplikasi,&quot; terangnya.<br />\r\n<br />\r\nDalam proses pembuatannya, Bachtiar dan kedua rekannya belum mendapatkan bantuan dana dari pihak manapun, termasuk pemerintah. Alhasil pembelian komponen dan alat pendukung lainnya masih menggunakan modal pribadi.<br />\r\n<br />\r\n&quot;Ini masih modal pribadi, saya sendiri masih ikut orangtua, belum lulus dari kampus. Termasuk pendirian CV dan segala macam,&quot; lanjut dia.</span></p>\r\n', '4-RobotTankKaryaAnakBangsa-x.jpg', NULL, 'jpg', 0, 20, 0, 'y', 2, '2016-02-06 17:10:00', '2016-02-06 17:11:37', '2016-02-06 17:11:37', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roleid`
--

CREATE TABLE IF NOT EXISTS `roleid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `roleid`
--

INSERT INTO `roleid` (`id`, `nama`) VALUES
(1, 'Developer'),
(2, 'Super Admin'),
(3, 'Admin'),
(4, 'Editor'),
(5, 'Author');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkategori`
--

CREATE TABLE IF NOT EXISTS `subkategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `pemalink` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `status` enum('y','n') NOT NULL DEFAULT 'y',
  `waktu_buat` datetime NOT NULL,
  `waktu_ubah` datetime NOT NULL,
  `pelaku` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kategori` (`id_kategori`),
  KEY `id_kategori_2` (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `subkategori`
--

INSERT INTO `subkategori` (`id`, `nama`, `pemalink`, `deskripsi`, `id_kategori`, `status`, `waktu_buat`, `waktu_ubah`, `pelaku`) VALUES
(13, 'Sport', 'sport', '', 18, 'y', '2016-01-29 23:26:29', '2016-02-06 16:53:33', 2),
(14, 'Automotive', 'automotive', '', 18, 'y', '2016-01-29 23:26:47', '2016-02-06 16:52:51', 2),
(15, 'Indonesia', 'indonesia', 'Segala Sesuatu Tentang Keindahan Indonesia', 17, 'y', '2016-01-29 23:27:04', '2016-01-30 01:35:03', 2),
(16, 'Luar Negeri', 'luarnegeri', '', 17, 'y', '2016-01-29 23:27:20', '2016-01-30 01:34:09', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `id_individu` int(11) NOT NULL,
  `id_roleId` int(11) NOT NULL,
  `awal_login` datetime NOT NULL,
  `akhir_login` datetime NOT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `status` enum('y','n') NOT NULL DEFAULT 'y',
  `waktu_ubah` datetime NOT NULL,
  `pelaku` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_individu` (`id_individu`),
  KEY `id_roleId` (`id_roleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `id_individu`, `id_roleId`, `awal_login`, `akhir_login`, `ip`, `status`, `waktu_ubah`, `pelaku`) VALUES
(1, 'developer', 'e684d5ebfe5e3bf71b1874a603a37349', 1, 1, '2016-01-31 01:35:25', '2016-01-31 01:38:32', '112.215.124.72', 'y', '2015-12-18 21:21:24', 1),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 2, 3, '2016-02-09 01:30:19', '2016-02-04 10:19:36', '112.215.148.47', 'y', '2015-12-18 21:24:51', 1),
(3, 'editor1', '5aee9dbd2a188839105073571bee1b1f', 3, 4, '2015-12-28 23:09:52', '2015-12-28 23:10:20', '::1', 'y', '2015-12-18 21:28:08', 1),
(4, 'editor2', '5aee9dbd2a188839105073571bee1b1f', 4, 4, '2015-12-28 23:10:30', '2015-12-28 23:10:37', '::1', 'y', '2015-12-18 21:29:30', 1),
(5, 'author1', '02bd92faa38aaa6cc0ea75e59937a1ef', 5, 5, '2015-12-28 23:10:45', '2015-12-28 23:10:51', '::1', 'y', '2015-12-18 21:31:04', 1),
(6, 'author2', '02bd92faa38aaa6cc0ea75e59937a1ef', 6, 5, '2015-12-28 23:11:03', '2015-12-29 01:58:42', '::1', 'y', '2015-12-18 21:39:24', 1),
(7, 'author3', '02bd92faa38aaa6cc0ea75e59937a1ef', 7, 5, '2015-12-18 21:39:50', '2015-12-18 21:43:09', '0', 'y', '2015-12-18 21:40:23', 1);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `individu`
--
ALTER TABLE `individu`
  ADD CONSTRAINT `individu_ibfk_1` FOREIGN KEY (`agama`) REFERENCES `agama` (`id`);

--
-- Ketidakleluasaan untuk tabel `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`);

--
-- Ketidakleluasaan untuk tabel `subkategori`
--
ALTER TABLE `subkategori`
  ADD CONSTRAINT `subkategori_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_roleId`) REFERENCES `roleid` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_individu`) REFERENCES `individu` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
