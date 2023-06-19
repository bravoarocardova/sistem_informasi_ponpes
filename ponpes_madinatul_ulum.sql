-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 19 Jun 2023 pada 21.32
-- Versi server: 8.0.32-0ubuntu0.22.04.2
-- Versi PHP: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ponpes_madinatul_ulum`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'default.jpg',
  `role` enum('admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `nama`, `email`, `no_telp`, `password`, `foto`, `role`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', '08323332', '$2y$10$yRVNJ8SP0jxuU0wR98icJuUIBQSbEAvrQaRgmrmBgxjOH.t96y1ea', '1680968438_fa05fcfaa9a1fe5e326b.png', 'admin', '1', '2023-02-25 13:59:10', '2023-04-15 04:52:24'),
(2, 'Admin2', 'Admin 2', 'admin2@gmail.com', '0008323332323', '$2y$10$nVtT8jP.UAQ5nLbzCBiVCOvcXvF5DlvvNeuENWya17gjgO.6H2Z.q', '1678891178_4f5e0b49866c3d947d0d.png', 'admin', '1', '2023-02-25 13:59:10', '2023-04-09 06:13:47'),
(3, 'Admin3', 'Admin 3', 'admin3@gmail.com', '08323332323', '$2y$10$MPLiipuiWyWLgn9C8SxcVuEIkHr9DaeNp3nHRS8xo0PNQ9xMG5Oum', 'default.jpg', 'admin', '1', '2023-02-25 13:59:10', '2023-03-12 14:18:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galery`
--

CREATE TABLE `galery` (
  `id_galery` int NOT NULL,
  `file` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tipe` enum('foto','video') COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `galery`
--

INSERT INTO `galery` (`id_galery`, `file`, `caption`, `tipe`, `created_at`, `updated_at`) VALUES
(4, '1682087377_8f4004fbc1f787c3d3f8.png', 'galeryi 1', 'foto', '2023-04-08 14:14:01', '2023-04-21 14:29:37'),
(5, '1682087383_765faa4589cca8eca109.png', 'galery2', 'foto', '2023-04-08 14:14:21', '2023-04-21 14:29:43'),
(6, '1682087389_a624486d1120240dcc50.png', 'galery3', 'foto', '2023-04-08 14:15:10', '2023-04-21 14:29:49'),
(7, '1682087395_088e3ff1544a2c38671d.png', 'galery4', 'foto', '2023-04-08 14:15:33', '2023-04-21 14:29:55'),
(8, '1682087401_cca81362dada6ff3f8ab.png', 'galery5', 'foto', '2023-04-08 14:15:48', '2023-04-21 14:30:01'),
(9, '1680963363_cab39c0151f1d82a53bb.png', 'galery6', 'foto', '2023-04-08 14:16:03', '2023-04-08 14:16:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int NOT NULL,
  `hari_kegiatan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `kegiatan` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `hari_kegiatan`, `kegiatan`, `created_at`, `updated_at`) VALUES
(1, 'Senin', '<ul><li>Kegiatan di sini hari senin</li><li>Kegiatan Lagi</li><li>Kegiatan Trus</li><li>Pokoknya kegiatan</li></ul>', '2023-05-15 12:02:42', '2023-05-15 12:57:05'),
(2, 'Selasa', '<p>Hari Selasa</p>', '2023-05-15 12:03:00', '2023-05-15 12:03:00'),
(3, 'Rabu', '<p>Hari Rabu</p>', '2023-05-15 12:03:10', '2023-05-15 12:03:10'),
(4, 'Kamis', '<p>Hari Kamis</p>', '2023-05-15 12:03:21', '2023-05-15 12:03:21'),
(5, 'Jumat', '<p>Hari Jumat</p>', '2023-05-15 12:03:30', '2023-05-15 12:03:30'),
(6, 'Sabtu', '<p>Hari Sabtu</p>', '2023-05-15 12:03:40', '2023-05-15 12:03:40'),
(7, 'Minggu', '<p>Hari Minggu</p>', '2023-05-15 12:03:51', '2023-05-15 12:03:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_keasramaan`
--

CREATE TABLE `kegiatan_keasramaan` (
  `id_kegiatan_keasramaan` int NOT NULL,
  `nama_kegiatan_keasramaan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `kd_ustadz` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kegiatan_keasramaan`
--

INSERT INTO `kegiatan_keasramaan` (`id_kegiatan_keasramaan`, `nama_kegiatan_keasramaan`, `kd_ustadz`, `created_at`, `updated_at`) VALUES
(1, 'Setoran Hafalan', 'abcdddd', '2023-05-22 13:05:53', '2023-05-22 14:00:37'),
(4, 'Menghafal Setoran lagi', 'abcdddd', '2023-05-22 13:50:16', '2023-05-22 13:50:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_keasramaan`
--

CREATE TABLE `nilai_keasramaan` (
  `id_nilai_keasramaan` int NOT NULL,
  `id_kegiatan_keasramaan` int NOT NULL,
  `nis` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nilai` int NOT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilai_keasramaan`
--

INSERT INTO `nilai_keasramaan` (`id_nilai_keasramaan`, `id_kegiatan_keasramaan`, `nis`, `nilai`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 1, '2147483647', 80, 'dddddafdfd', '2023-05-22 14:48:46', '2023-05-22 15:46:00'),
(4, 1, '12345678922', 80, 'kerangan', '2023-05-22 15:29:44', '2023-05-22 15:29:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jk` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci NOT NULL,
  `asal_sekolah` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `lulus_tahun` year NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `jenjang_sekolah` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `id_admin` int DEFAULT NULL,
  `bukti_pembayaran` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `nama`, `photo`, `jk`, `no_telp`, `email`, `tempat_lahir`, `tgl_lahir`, `alamat`, `asal_sekolah`, `lulus_tahun`, `status`, `jenjang_sekolah`, `id_admin`, `bukti_pembayaran`, `created_at`, `updated_at`) VALUES
('PDS-00000000', 'tes', '1684757654_dccfbb65297f175e24e0.jpg', 'L', '080808', 'popo@gmail.com', 'jambi', '2023-05-23', 'sdfasd', 'sma', 2004, 'Lulus', 'MA', 1, NULL, '2023-05-22 12:10:19', '2023-05-22 12:41:15'),
('PDS-00000001', 'bro', '1684756538_7522e70b09af3b5453fa.jpg', 'L', '123456', 'bro@gmail.com', 'Jambi', '2023-05-22', 'sdfa', 'sma', 2004, '', 'MA', NULL, '1687184584_9846cfad16535f98e569.jpg', '2023-05-22 11:55:38', '2023-06-19 14:23:04'),
('PDS-00000002', 'popo', '1684758071_32564211e29bc3d45f1c.jpg', 'L', '123222', 'user1@mail.com', 'jambi', '2023-05-22', 'dsafd', 'sma', 2004, 'Tidak Lulus', 'MA', 1, NULL, '2023-05-22 12:21:11', '2023-06-01 08:27:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `isi` text COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `penulis` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `kategori` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul`, `isi`, `gambar`, `penulis`, `kategori`, `created_at`, `updated_at`) VALUES
(8, 'Bejat! Pengasuh Pesantren Cabuli Belasan Santriwati, Modus Dijanjikan Dapat Karomah', '<p>sdfaf</p><table class=\"table table-bordered\"><tbody><tr><td>sdf</td><td>sd</td></tr></tbody></table><p>ccddd d</p>', '1682087870_7d27a6e166cbf4ba703d.png', 'Admin', 'kelulusan', '2023-04-06 22:58:01', '2023-05-27 15:20:18'),
(9, 'Garap Suara NU di Jateng, Relawan Anies Mulai Bergerilya ke Brebes', '<p>oijasodifjiodsjfo dsojf iodjsaofijio sajiofj ajfpji jsd af dfad f a  fds </p>', '1682087287_197bb7ee4921707d8d16.png', 'Admin', 'berita', '2023-04-08 14:16:51', '2023-05-27 15:19:33'),
(10, 'Sandiaga Ajak Santri Ciptakan Lapangan Kerja: Bisa Membuka UMKM', '<p>opksjdafkjopsd fdsopf kopdskpofa dsfds fd ad a df </p>', '1682087301_356acf44bac7e2932bfc.png', 'Admin', 'berita', '2023-04-08 14:17:06', '2023-05-27 15:19:37'),
(11, 'DaerahBelajar Wirausaha, Santri Al-Manshuriyah Ikut Pelatihan Menjahit', '<p>fds fsad fasd fds af sd af</p>', '1682087312_6c85dcf758216b1c2986.png', 'Admin', 'berita', '2023-04-08 14:17:17', '2023-05-27 15:19:41'),
(12, 'TGS Ganjar Sumut Tanamkan Pentingnya Akhlakul Karimah Remaja Masjid', '<p>fds fsad fsda fsdaf asdf sdf ewfe wsaf wef ew weq</p>', '1682087322_b2871d8318ebe5d1407c.png', 'Admin', 'berita', '2023-04-08 14:17:29', '2023-05-27 15:19:45'),
(13, 'Perluas Jaringan, Relawan SDG Lebarkan Sayap hingga NTB', '<p>f adsf sdaf sda fsda few qtr ewqrt ewtfg rytryh gy erwtgft</p>', '1682087343_f3c56f1a7fa15aec1465.png', 'Admin', 'berita', '2023-04-08 14:17:43', '2023-05-27 15:19:50'),
(14, 'Bekali Santri Ponpes Darul Ma\'arif, SDG Adakan Pelatihan Menjahit', '<p>fsad f weqt ew weqtwea  asdf sda</p>', '1682087352_72a5085a11af4352ade3.png', 'Admin', 'berita', '2023-04-08 14:17:54', '2023-05-27 15:19:54'),
(15, 'Meriahkan Ramadan, SDG Gelar Kreasi Santri di Ponpes Al-Aqsha', '<p>sd fa ewq wqeruj iopew jioioqwju ieojoq jioeju iorejwio j<span style=\"font-size: 1rem;\">sd fa ewq wqeruj iopew jioioqwju ieojoq jioeju iorejwio j</span><span style=\"font-size: 1rem;\">sd fa ewq wqeruj iopew jioioqwju ieojoq jioeju iorejwio j</span><span style=\"font-size: 1rem;\">sd fa ewq wqeruj iopew jioioqwju ieojoq jioeju iorejwio j</span><span style=\"font-size: 1rem;\">sd fa ewq wqeruj iopew jioioqwju ieojoq jioeju iorejwio j</span><span style=\"font-size: 1rem;\">sd fa ewq wqeruj iopew jioioqwju ieojoq jioeju iorejwio j</span><span style=\"font-size: 1rem;\">sd fa ewq wqeruj iopew jioioqwju ieojoq jioeju iorejwio j</span><span style=\"font-size: 1rem;\">sd fa ewq wqeruj iopew jioioqwju ieojoq jioeju iorejwio jssssssssssssssssssssssssssss</span></p>', '1682087363_21bbc571709a644fea6d.png', 'Admin', 'berita', '2023-04-08 14:18:17', '2023-05-27 15:19:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id` int NOT NULL,
  `logo` varchar(100) NOT NULL,
  `nama_aplikasi` varchar(100) NOT NULL,
  `nama_pondok` varchar(255) NOT NULL,
  `alamat_pondok` text NOT NULL,
  `telepon_pondok` varchar(15) NOT NULL,
  `email_pondok` varchar(255) NOT NULL,
  `lokasi_pondok` text NOT NULL,
  `sejarah` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `struktur_pondok` varchar(255) NOT NULL,
  `peraturan_pondok` text NOT NULL,
  `pembayaran` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id`, `logo`, `nama_aplikasi`, `nama_pondok`, `alamat_pondok`, `telepon_pondok`, `email_pondok`, `lokasi_pondok`, `sejarah`, `visi`, `misi`, `struktur_pondok`, `peraturan_pondok`, `pembayaran`, `created_at`, `updated_at`) VALUES
(1, '1680861998_872c521f703ffe240828.png', 'Ponpes', 'Ponpes Madinatul U\'lum', 'VGCM+F3X, Pamenang, Merangin Regency, Jambi 37352', '0820983923', 'ponpesmadinatul@gmail.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15948.259472377551!2d102.53273770000003!3d-2.1287507999999966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2e38d4657ddcdb%3A0x5f3704b8d0d00e42!2sPONDOK%20PESANTREN%20MADINATU%20\'ULUM%20KEMANG%20MANIS%20PAMENANG!5e0!3m2!1sen!2sid!4v1680817848874!5m2!1sen!2sid', '<p style=\"margin-bottom: 15px; line-height: 1.7; font-size: 18px; color: rgb(48, 48, 48); font-family: Amiri !important;\">Pondok Pesantren Madinatul „Ulum didirikan pada tanggal 16 September \r\n2012 dengan dana Swadaya Masyarakat Kelurahan Pamenang. Tanah yang di \r\ngunakan oleh Pesantren ini merupakan wakaf dari H. Sulaiman Abdul Rauf dan \r\nsekarang sudah menjadi milik Yayasan Pendidikan Madinatul Ulum.Berdirinya \r\nPondok Pesantren ini atas permintaan masyarakat Pamenang agar adanya lembaga \r\npendidikan berbasis pesantren di Kecamatan Pamenang khususnya di Kelurahan \r\nPamenang, sehingga masyarakat tidak lagi harus menempuh jarak yang jauh \r\napabila hendak memasukan anaknya ke Pondok Pesantren.</p><p style=\"margin-bottom: 15px; line-height: 1.7; font-size: 18px; color: rgb(48, 48, 48); font-family: Amiri !important;\">&nbsp; &nbsp; &nbsp;Alasan yang kuat mengapa pondok pesantren modern madinatul‟ulum \r\ndidirikan pertama, khususnya wilayah pamenang itu banyak pondok yang \r\nsalafiyah ketika itu ada 2 pondok salfiyah di pamenang ini. Saya melihat di \r\npamenang ini belum ada pondok yang asriyah atau modern maka dari itu saya \r\ningin mendirikan pondok pesantren ini menjadi pondok pesantren yang modern \r\nberbeda dari yang lainnya.kedua, pondok pesantren ini didirikan atas swadaya \r\nmasyarakat di kecamatan pamennang karna waktu itu kami tidak memiliki dana \r\nyang banyak untuk mendirikan pondok pesantren ini.&nbsp;</p>', 'Menjadi lembaga pendidikan Islam yang berkualitas sebagai \r\nkontributor terdepan dalam mencetak sumber daya muslim yang sholeh, \r\nmuslih (reformer) dan kader ummat dan khusyu‟ berzikir, cerdas berpikir \r\ndan terampil dalam ilmu kemasyarakatan.', '<p>a. Transformasi ilmu pengetahuan.\r\n</p><p>b. Menanamkan akhlakul karimah dan nilai-nilai Islam.\r\n</p><p>c. Berakidah benar sesuai dengan manhaj Ahlu Sunnah Wal Jama’ah.\r\n</p><p>d. Mampu berkomunikasi dalam bahasa Arab dan Inggris.\r\n</p><p>e. Memiliki talenta dalam berda‟wah dan mengarahkan masyarakat \r\nmenuju kehidupan yang Islami.\r\n</p><p>f. Menghasilkan siswa siswi yang teladan dan berakhlakul karimah.\r\n</p><p>g. Mencetak siswa siswi yang terampil dalam ilmu kemasyarakatan baik \r\nagama maupun umum.&nbsp;</p>', '1684292870_02e344d6422f38fe4cf2.png', '<ol><li>peraturan 1</li></ol>', 'silahkan lakukan pembayaran pendaftaran sebesar Rp.250.000 ke rekening PONPES 1234567890', '2023-06-19 14:24:48', '2023-06-19 14:24:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `santri`
--

CREATE TABLE `santri` (
  `nis` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_santri` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_masuk` date NOT NULL,
  `alamat_lengkap` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('Aktif','Tidak Aktif','Alumni') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp_wali` int NOT NULL,
  `wali` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenjang_sekolah` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `santri`
--

INSERT INTO `santri` (`nis`, `nama_santri`, `jk`, `tgl_masuk`, `alamat_lengkap`, `status`, `no_telp_wali`, `wali`, `tempat_lahir`, `tgl_lahir`, `jenjang_sekolah`, `password`, `created_at`, `updated_at`) VALUES
('123456789212', 'Santri', 'L', '2023-05-27', 'dsafdsf', 'Tidak Aktif', 2147483647, 'wali', 'jambi', '2023-05-27', 'MA', '$2y$10$7PJ7KMSbtVutuiwxWncGuOq7oFLsDPyY27873zMfLnfdTptnWcqim', '2023-05-27 16:06:46', '2023-06-19 13:26:19'),
('12345678922', 'Santri', 'L', '2023-05-27', 'dfafddasfddddddddd', 'Aktif', 832984324, 'wali', 'jambi', '2023-05-27', 'MTS', '$2y$10$a35DP7fp6.K2UoNLD9GQg.l2K4cGyBkXqMq7B7L6NmhZ/HEfUI4Ry', '2023-05-27 15:05:25', '2023-05-28 01:39:11'),
('123456789223', 'Santriddd', 'L', '2023-05-27', 'dsfaf', 'Alumni', 2147483647, 'wali', 'jambi', '2023-05-27', 'MA', '$2y$10$aB.dnG5A8sYe9vyqjzw/q.QshS8iFhCCds2SXF38PsffsFcCmP0iS', '2023-05-27 15:49:36', '2023-06-19 13:26:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slideshow`
--

CREATE TABLE `slideshow` (
  `id_slideshow` int NOT NULL,
  `slideshow` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `caption` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `align` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `slideshow`
--

INSERT INTO `slideshow` (`id_slideshow`, `slideshow`, `judul`, `caption`, `align`, `created_at`, `updated_at`) VALUES
(8, '1684155086_b8126617a1dca0a5158c.jpg', 'judul', 'fsd', 'start', '2023-04-06 23:33:01', '2023-05-15 12:51:26'),
(9, '1684155093_c885115d93fe877f86d9.jpeg', '', '', '', '2023-04-08 14:12:26', '2023-05-15 12:51:33'),
(10, '1684155101_018c179962e30c296f30.jpg', 'Judul', 'oijoi', 'end', '2023-04-08 14:16:27', '2023-05-15 12:51:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ustadz`
--

CREATE TABLE `ustadz` (
  `kd_ustadz` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_ustadz` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jk` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ustadz`
--

INSERT INTO `ustadz` (`kd_ustadz`, `nama_ustadz`, `jk`, `status`, `alamat`, `tgl_lahir`, `no_telp`, `created_at`, `updated_at`) VALUES
('abcdddd', 'abde', 'L', 'Aktif', 'aafds', '2023-04-04', 123456222, '2023-04-02 05:04:47', '2023-05-27 16:10:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id_galery`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `kegiatan_keasramaan`
--
ALTER TABLE `kegiatan_keasramaan`
  ADD PRIMARY KEY (`id_kegiatan_keasramaan`);

--
-- Indeks untuk tabel `nilai_keasramaan`
--
ALTER TABLE `nilai_keasramaan`
  ADD PRIMARY KEY (`id_nilai_keasramaan`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id_slideshow`);

--
-- Indeks untuk tabel `ustadz`
--
ALTER TABLE `ustadz`
  ADD PRIMARY KEY (`kd_ustadz`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `galery`
--
ALTER TABLE `galery`
  MODIFY `id_galery` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_keasramaan`
--
ALTER TABLE `kegiatan_keasramaan`
  MODIFY `id_kegiatan_keasramaan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `nilai_keasramaan`
--
ALTER TABLE `nilai_keasramaan`
  MODIFY `id_nilai_keasramaan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id_slideshow` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
