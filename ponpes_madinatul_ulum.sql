-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 03 Sep 2023 pada 21.06
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
  `role` enum('admin','pimpinan') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `nama`, `email`, `no_telp`, `password`, `foto`, `role`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', '628323332', '$2y$10$yRVNJ8SP0jxuU0wR98icJuUIBQSbEAvrQaRgmrmBgxjOH.t96y1ea', '1680968438_fa05fcfaa9a1fe5e326b.png', 'admin', '1', '2023-02-25 13:59:10', '2023-04-15 04:52:24'),
(2, 'pimpinan', 'Pimpinan Pondok', 'pimpinan@gmail.com', '628323380', '$2y$10$yRVNJ8SP0jxuU0wR98icJuUIBQSbEAvrQaRgmrmBgxjOH.t96y1ea', '1678891178_4f5e0b49866c3d947d0d.png', 'pimpinan', '1', '2023-02-25 13:59:10', '2023-04-09 06:13:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kelas`
--

CREATE TABLE `data_kelas` (
  `id_data_kelas` int NOT NULL,
  `nis` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `id_kelas` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_kelas`
--

INSERT INTO `data_kelas` (`id_data_kelas`, `nis`, `id_kelas`, `created_at`, `updated_at`) VALUES
(4, '123456789212', 11, '2023-09-03 07:42:22', '2023-09-03 07:42:22'),
(5, '123456789223', 11, '2023-09-03 07:42:25', '2023-09-03 07:42:25'),
(7, '12345678922', 15, '2023-09-03 09:13:36', '2023-09-03 09:13:36');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int NOT NULL,
  `nama_kelas` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `wali_kelas` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_tahun_ajaran` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `wali_kelas`, `id_tahun_ajaran`, `created_at`, `updated_at`) VALUES
(6, 'X PA', 'Edi Supriadi', 1, '2023-09-01 15:46:46', '2023-09-01 15:46:46'),
(7, 'X PI', 'Desmiati Sundari,S.E', 1, '2023-09-01 15:46:58', '2023-09-01 15:46:58'),
(8, 'XI PA', 'Ibnu Khairi,S.Pd.I', 1, '2023-09-01 15:47:09', '2023-09-01 15:47:09'),
(9, 'XI PI', 'Nini Karlina, S.Pd', 1, '2023-09-01 15:47:23', '2023-09-01 15:47:23'),
(10, 'XII PA', 'M.Amin, S.Pd.I', 1, '2023-09-01 15:47:34', '2023-09-01 15:47:34'),
(11, 'XII PI', 'Abdul Haris, S.Pd.I', 1, '2023-09-01 15:47:34', '2023-09-02 15:31:15'),
(12, 'VII / PA', '', 1, '2023-09-01 15:50:03', '2023-09-01 15:50:03'),
(13, 'VII / PI', '', 1, '2023-09-01 15:50:53', '2023-09-01 15:51:09'),
(14, 'VIII / PA', '', 1, '2023-09-01 15:51:21', '2023-09-01 15:51:21'),
(15, 'VIII / PI', '', 1, '2023-09-01 15:51:31', '2023-09-01 15:51:31'),
(16, 'IX / PA', '', 1, '2023-09-01 15:51:42', '2023-09-01 15:51:42'),
(17, 'IX / PI', '', 1, '2023-09-01 15:52:17', '2023-09-01 15:52:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `kd_mapel` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_mapel` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`kd_mapel`, `nama_mapel`, `created_at`, `updated_at`) VALUES
('akidahakhlak', 'Akidah Akhlak', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('bahasaarab', 'Bahasa Arab', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('bindonesia', 'B. Indonesia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('binggris', 'B. Inggris', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('biologi1', 'Biologi 1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('ekoakun', 'Ekonomi/ Akuntasi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('fisika1', 'Fisika 1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('geografi', 'Geografi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('informatika', 'INFORMATIKA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('kimia1', 'Kimia 1', '0000-00-00 00:00:00', '2023-09-01 14:25:30'),
('mtk', 'Matematika', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('piqihumum', 'Piqih Umum', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('ppkn', 'PPKn', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('quranhadist', 'Quran Hadist', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('sejarah', 'Sejarah', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('ski', 'SKI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('sosiologi', 'Sosiologi', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mengajar`
--

CREATE TABLE `mengajar` (
  `id_mengajar` int NOT NULL,
  `kd_ustadz` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `id_kelas` int NOT NULL,
  `kd_mapel` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mengajar`
--

INSERT INTO `mengajar` (`id_mengajar`, `kd_ustadz`, `id_kelas`, `kd_mapel`, `created_at`, `updated_at`) VALUES
(4, 'IT', 6, 'bindonesia', '2023-09-03 07:45:36', '2023-09-03 07:45:36'),
(5, 'DS', 6, 'ekoakun', '2023-09-03 07:45:53', '2023-09-03 07:45:53'),
(6, 'RN', 6, 'binggris', '2023-09-03 07:46:19', '2023-09-03 07:46:19'),
(7, 'SU', 6, 'biologi1', '2023-09-03 07:46:40', '2023-09-03 07:46:40'),
(8, 'NN', 6, 'ski', '2023-09-03 07:46:55', '2023-09-03 07:46:55'),
(9, 'SU', 6, 'kimia1', '2023-09-03 07:47:08', '2023-09-03 07:47:08'),
(10, 'SU', 6, 'geografi', '2023-09-03 07:47:22', '2023-09-03 07:47:22'),
(11, 'SW', 6, 'mtk', '2023-09-03 07:47:44', '2023-09-03 07:47:44'),
(12, 'ND', 6, 'akidahakhlak', '2023-09-03 07:47:56', '2023-09-03 07:47:56'),
(13, 'RA', 6, 'informatika', '2023-09-03 07:48:18', '2023-09-03 07:48:18'),
(14, 'IS', 6, 'sosiologi', '2023-09-03 07:48:42', '2023-09-03 07:48:42'),
(15, 'SU', 6, 'fisika1', '2023-09-03 07:49:18', '2023-09-03 07:49:18'),
(16, 'KM', 6, 'ppkn', '2023-09-03 07:49:35', '2023-09-03 07:49:35'),
(17, 'FT', 6, 'sejarah', '2023-09-03 07:49:51', '2023-09-03 07:49:51'),
(18, 'KM', 11, 'ppkn', '2023-09-03 08:25:55', '2023-09-03 08:25:55'),
(19, 'SU', 11, 'geografi', '2023-09-03 08:26:05', '2023-09-03 08:26:05'),
(20, 'NN', 11, 'ski', '2023-09-03 08:26:22', '2023-09-03 08:26:22'),
(21, 'SW', 11, 'mtk', '2023-09-03 08:26:34', '2023-09-03 08:26:34'),
(22, 'MA', 11, 'bahasaarab', '2023-09-03 08:26:49', '2023-09-03 08:26:49'),
(23, 'IT', 11, 'bindonesia', '2023-09-03 08:27:04', '2023-09-03 08:27:04'),
(24, 'DS', 11, 'ekoakun', '2023-09-03 08:27:18', '2023-09-03 08:27:18'),
(25, 'KM', 11, 'sosiologi', '2023-09-03 08:27:32', '2023-09-03 08:27:32'),
(26, 'IB', 11, 'quranhadist', '2023-09-03 08:27:47', '2023-09-03 08:27:47'),
(27, 'AH', 11, 'piqihumum', '2023-09-03 08:27:58', '2023-09-03 08:27:58'),
(28, 'NN', 11, 'akidahakhlak', '2023-09-03 08:28:08', '2023-09-03 08:28:08'),
(29, 'IT', 11, 'sejarah', '2023-09-03 08:28:23', '2023-09-03 08:28:23'),
(30, 'RA', 11, 'informatika', '2023-09-03 08:28:42', '2023-09-03 08:28:42'),
(31, 'RN', 11, 'binggris', '2023-09-03 08:28:52', '2023-09-03 08:28:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int NOT NULL,
  `id_data_kelas` int NOT NULL,
  `kd_mapel` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nilai` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_data_kelas`, `kd_mapel`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 4, 'bahasaarab', 80, '2023-09-03 09:24:40', '2023-09-03 09:24:40'),
(2, 4, 'ppkn', 80, '2023-09-03 09:24:40', '2023-09-03 14:02:26'),
(3, 5, 'ppkn', 85, '2023-09-03 14:02:35', '2023-09-03 14:02:35'),
(4, 5, 'sosiologi', 86, '2023-09-03 14:03:01', '2023-09-03 14:03:01'),
(5, 4, 'sosiologi', 85, '2023-09-03 14:03:08', '2023-09-03 14:03:08');

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
(2, 1, '2147483647', 80, 'dddddafdfd', '2023-05-22 14:48:46', '2023-05-22 15:46:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id`, `logo`, `nama_aplikasi`, `nama_pondok`, `alamat_pondok`, `telepon_pondok`, `email_pondok`, `lokasi_pondok`, `sejarah`, `visi`, `misi`, `struktur_pondok`, `peraturan_pondok`, `pembayaran`, `created_at`, `updated_at`) VALUES
(1, '1680861998_872c521f703ffe240828.png', 'Ponpes', 'Ponpes Madinatul U\'lum', 'VGCM+F3X, Pamenang, Merangin Regency, Jambi 37352', '0820983923', 'ponpesmadinatul@gmail.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15948.259472377551!2d102.53273770000003!3d-2.1287507999999966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2e38d4657ddcdb%3A0x5f3704b8d0d00e42!2sPONDOK%20PESANTREN%20MADINATU%20\'ULUM%20KEMANG%20MANIS%20PAMENANG!5e0!3m2!1sen!2sid!4v1680817848874!5m2!1sen!2sid', '<p style=\"margin-bottom: 15px; line-height: 1.7; font-size: 18px; color: rgb(48, 48, 48); font-family: Amiri !important;\">Pondok Pesantren Madinatul „Ulum didirikan pada tanggal 16 September \r\n2012 dengan dana Swadaya Masyarakat Kelurahan Pamenang. Tanah yang di \r\ngunakan oleh Pesantren ini merupakan wakaf dari H. Sulaiman Abdul Rauf dan \r\nsekarang sudah menjadi milik Yayasan Pendidikan Madinatul Ulum.Berdirinya \r\nPondok Pesantren ini atas permintaan masyarakat Pamenang agar adanya lembaga \r\npendidikan berbasis pesantren di Kecamatan Pamenang khususnya di Kelurahan \r\nPamenang, sehingga masyarakat tidak lagi harus menempuh jarak yang jauh \r\napabila hendak memasukan anaknya ke Pondok Pesantren.</p><p style=\"margin-bottom: 15px; line-height: 1.7; font-size: 18px; color: rgb(48, 48, 48); font-family: Amiri !important;\">&nbsp; &nbsp; &nbsp;Alasan yang kuat mengapa pondok pesantren modern madinatul‟ulum \r\ndidirikan pertama, khususnya wilayah pamenang itu banyak pondok yang \r\nsalafiyah ketika itu ada 2 pondok salfiyah di pamenang ini. Saya melihat di \r\npamenang ini belum ada pondok yang asriyah atau modern maka dari itu saya \r\ningin mendirikan pondok pesantren ini menjadi pondok pesantren yang modern \r\nberbeda dari yang lainnya.kedua, pondok pesantren ini didirikan atas swadaya \r\nmasyarakat di kecamatan pamennang karna waktu itu kami tidak memiliki dana \r\nyang banyak untuk mendirikan pondok pesantren ini.&nbsp;</p>', 'Menjadi lembaga pendidikan Islam yang berkualitas sebagai \r\nkontributor terdepan dalam mencetak sumber daya muslim yang sholeh, \r\nmuslih (reformer) dan kader ummat dan khusyu‟ berzikir, cerdas berpikir \r\ndan terampil dalam ilmu kemasyarakatan.', '<p>a. Transformasi ilmu pengetahuan.\r\n</p><p>b. Menanamkan akhlakul karimah dan nilai-nilai Islam.\r\n</p><p>c. Berakidah benar sesuai dengan manhaj Ahlu Sunnah Wal Jama’ah.\r\n</p><p>d. Mampu berkomunikasi dalam bahasa Arab dan Inggris.\r\n</p><p>e. Memiliki talenta dalam berda‟wah dan mengarahkan masyarakat \r\nmenuju kehidupan yang Islami.\r\n</p><p>f. Menghasilkan siswa siswi yang teladan dan berakhlakul karimah.\r\n</p><p>g. Mencetak siswa siswi yang terampil dalam ilmu kemasyarakatan baik \r\nagama maupun umum.&nbsp;</p>', '1684292870_02e344d6422f38fe4cf2.png', '<ol><li>peraturan 1</li></ol>', 'Silahkan lakukan pembayaran pendaftaran sebesar Rp.250.000 ke rekening PONPES 1234567890', '2023-06-20 11:51:04', '2023-06-20 11:51:04');

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
('123456789212', 'Santri 1 MA', 'L', '2023-05-27', 'dsafdsf', 'Aktif', 2147483647, 'wali', 'jambi', '2023-05-27', 'MA', '$2y$10$lNLVitRoAwOuIZpRMGfMq.XuEOXIEEtJud.vn3B89Ebb93yTxAFa2', '2023-05-27 16:06:46', '2023-09-03 06:49:25'),
('12345678922', 'Santri1  MTS', 'L', '2023-05-27', 'dfafddasfddddddddd', 'Aktif', 832984324, 'wali', 'jambi', '2023-05-27', 'MTS', '$2y$10$L4RQsVUeY4mNa3oUVQSAMOdH0A3o.Cy7Uy7SYo.ToB0dmOrImRw1C', '2023-05-27 15:05:25', '2023-09-03 06:49:06'),
('123456789223', 'Santri 2 MA', 'L', '2023-05-27', 'dsfaf', 'Aktif', 2147483647, 'wali', 'jambi', '2023-05-27', 'MA', '$2y$10$TPYTusHZp34T.ry/6dHTje7fg.DRnr47zA.tSjJUnlc.3lYkZ9e66', '2023-05-27 15:49:36', '2023-09-03 06:49:39');

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
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahun_ajaran` int NOT NULL,
  `semester` set('Ganjil','Genap') COLLATE utf8mb4_general_ci NOT NULL,
  `tahun_ajaran` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun_ajaran`, `semester`, `tahun_ajaran`, `created_at`, `updated_at`) VALUES
(1, 'Ganjil', '2023/2024', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Genap', '2023/2024', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ustadz`
--

INSERT INTO `ustadz` (`kd_ustadz`, `nama_ustadz`, `jk`, `status`, `alamat`, `tgl_lahir`, `no_telp`, `password`, `created_at`, `updated_at`) VALUES
('AH', 'Abdul Haris, S.Pd.I', 'L', 'Aktif', '1', '2023-08-30', 80808, '$2y$10$TwEbsnoDVahxgWLCoZXe9uf0B4DOM6tlKfXYh6K8G/FiZ.1Io/7Ke', '2023-08-30 12:41:21', '2023-08-30 12:49:12'),
('DS', 'Desmiati Sundari,S.E', 'L', 'Aktif', '1', '2023-08-30', 0, '$2y$10$TwEbsnoDVahxgWLCoZXe9uf0B4DOM6tlKfXYh6K8G/FiZ.1Io/7Ke', '2023-08-30 12:41:21', '2023-08-30 12:41:21'),
('ED', 'Edi Supriadi', 'L', 'Aktif', '1', '2023-08-30', 0, '$2y$10$TwEbsnoDVahxgWLCoZXe9uf0B4DOM6tlKfXYh6K8G/FiZ.1Io/7Ke', '2023-08-30 12:41:21', '2023-08-30 12:41:21'),
('FT', 'Fatmawati, S.Pd', 'L', 'Aktif', '1', '2023-08-30', 0, '$2y$10$TwEbsnoDVahxgWLCoZXe9uf0B4DOM6tlKfXYh6K8G/FiZ.1Io/7Ke', '2023-08-30 12:41:21', '2023-08-30 12:41:21'),
('IB', 'Ibnu Khairi ,S.Pd.I', 'L', 'Aktif', '1', '2023-08-30', 0, '$2y$10$TwEbsnoDVahxgWLCoZXe9uf0B4DOM6tlKfXYh6K8G/FiZ.1Io/7Ke', '2023-08-30 12:41:21', '2023-08-30 12:41:21'),
('IS', 'Islamiarti, S.Pd', 'L', 'Aktif', '1', '2023-08-30', 0, '$2y$10$TwEbsnoDVahxgWLCoZXe9uf0B4DOM6tlKfXYh6K8G/FiZ.1Io/7Ke', '2023-08-30 12:41:21', '2023-08-30 12:41:21'),
('IT', 'Istiyarni, S.Pd.', 'L', 'Aktif', '1', '2023-08-30', 0, '$2y$10$TwEbsnoDVahxgWLCoZXe9uf0B4DOM6tlKfXYh6K8G/FiZ.1Io/7Ke', '2023-08-30 12:41:21', '2023-08-30 12:41:21'),
('KM', 'Kurnaini, S.PdI           \r\n', 'L', 'Aktif', '1', '2023-08-30', 0, '$2y$10$TwEbsnoDVahxgWLCoZXe9uf0B4DOM6tlKfXYh6K8G/FiZ.1Io/7Ke', '2023-08-30 12:41:21', '2023-08-30 12:41:21'),
('MA', 'M.Amin, S.Pd.I', 'L', 'Aktif', '1', '2023-08-30', 0, '$2y$10$TwEbsnoDVahxgWLCoZXe9uf0B4DOM6tlKfXYh6K8G/FiZ.1Io/7Ke', '2023-08-30 12:41:21', '2023-08-30 12:41:21'),
('ND', 'Hasnatun Nadia,M.Pd', 'L', 'Aktif', '1', '2023-08-30', 0, '$2y$10$TwEbsnoDVahxgWLCoZXe9uf0B4DOM6tlKfXYh6K8G/FiZ.1Io/7Ke', '2023-08-30 12:41:21', '2023-08-30 12:41:21'),
('NN', 'Nini Karlina, S.H', 'L', 'Aktif', '1', '2023-08-30', 0, '$2y$10$TwEbsnoDVahxgWLCoZXe9uf0B4DOM6tlKfXYh6K8G/FiZ.1Io/7Ke', '2023-08-30 12:41:21', '2023-08-30 12:41:21'),
('PR', 'Pronika Puji A, S.Pd.I', 'L', 'Aktif', '1', '2023-08-30', 0, '$2y$10$TwEbsnoDVahxgWLCoZXe9uf0B4DOM6tlKfXYh6K8G/FiZ.1Io/7Ke', '2023-08-30 12:41:21', '2023-08-30 12:41:21'),
('RA', 'Rina, S.Kom.', 'L', 'Aktif', '1', '2023-08-30', 0, '$2y$10$TwEbsnoDVahxgWLCoZXe9uf0B4DOM6tlKfXYh6K8G/FiZ.1Io/7Ke', '2023-08-30 12:41:21', '2023-08-30 12:41:21'),
('RN', 'Rahmi Novellia, S.Pd\r\n', 'P', 'Aktif', '1', '2023-08-30', 0, '$2y$10$TwEbsnoDVahxgWLCoZXe9uf0B4DOM6tlKfXYh6K8G/FiZ.1Io/7Ke', '2023-08-30 12:41:21', '2023-08-30 12:41:21'),
('SU', 'Sri Wulandari,S.Pd.', 'L', 'Aktif', '1', '2023-08-30', 0, '$2y$10$TwEbsnoDVahxgWLCoZXe9uf0B4DOM6tlKfXYh6K8G/FiZ.1Io/7Ke', '2023-08-30 12:41:21', '2023-08-30 12:41:21'),
('SW', 'Syamsi Warnis,S.Pd.', 'L', 'Aktif', '1', '2023-08-30', 0, '$2y$10$TwEbsnoDVahxgWLCoZXe9uf0B4DOM6tlKfXYh6K8G/FiZ.1Io/7Ke', '2023-08-30 12:41:21', '2023-08-30 12:41:21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `data_kelas`
--
ALTER TABLE `data_kelas`
  ADD PRIMARY KEY (`id_data_kelas`);

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
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kd_mapel`);

--
-- Indeks untuk tabel `mengajar`
--
ALTER TABLE `mengajar`
  ADD PRIMARY KEY (`id_mengajar`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

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
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

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
-- AUTO_INCREMENT untuk tabel `data_kelas`
--
ALTER TABLE `data_kelas`
  MODIFY `id_data_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id_kegiatan_keasramaan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `mengajar`
--
ALTER TABLE `mengajar`
  MODIFY `id_mengajar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `nilai_keasramaan`
--
ALTER TABLE `nilai_keasramaan`
  MODIFY `id_nilai_keasramaan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun_ajaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
