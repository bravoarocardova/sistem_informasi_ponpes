-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 15 Apr 2023 pada 12.23
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
(2, 'Admin2', 'Nama Admin 2', 'kasir@gmail.com', '0008323332323', '$2y$10$nVtT8jP.UAQ5nLbzCBiVCOvcXvF5DlvvNeuENWya17gjgO.6H2Z.q', '1678891178_4f5e0b49866c3d947d0d.png', 'admin', '1', '2023-02-25 13:59:10', '2023-04-09 06:13:47'),
(3, 'teknisi', 'Nama Teknisi', 'teknisi@gmail.com', '08323332323', '$2y$10$MPLiipuiWyWLgn9C8SxcVuEIkHr9DaeNp3nHRS8xo0PNQ9xMG5Oum', 'default.jpg', 'admin', '1', '2023-02-25 13:59:10', '2023-03-12 14:18:58');

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
(4, '1680963241_14ae39051a3c118cd419.png', 'galeryi 1', 'foto', '2023-04-08 14:14:01', '2023-04-08 14:14:01'),
(5, '1680963261_039bba1610dde9effb0c.png', 'galery2', 'foto', '2023-04-08 14:14:21', '2023-04-08 14:14:21'),
(6, '1680963310_8973769c223c7ec9ac5f.png', 'galery3', 'foto', '2023-04-08 14:15:10', '2023-04-08 14:15:10'),
(7, '1680963333_dab07529dab6685ddfd1.png', 'galery4', 'foto', '2023-04-08 14:15:33', '2023-04-08 14:15:33'),
(8, '1680963348_b5ec4c4f1d5937581bc6.png', 'galery5', 'foto', '2023-04-08 14:15:48', '2023-04-08 14:15:48'),
(9, '1680963363_cab39c0151f1d82a53bb.png', 'galery6', 'foto', '2023-04-08 14:16:03', '2023-04-08 14:16:03');

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
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul`, `isi`, `gambar`, `penulis`, `created_at`, `updated_at`) VALUES
(8, 'Bejat! Pengasuh Pesantren Cabuli Belasan Santriwati, Modus Dijanjikan Dapat Karomah', '<p>cc</p>', '1680821881_4470ed9957f5900fb4b8.png', 'Admin', '2023-04-06 22:58:01', '2023-04-15 04:53:28'),
(9, 'Garap Suara NU di Jateng, Relawan Anies Mulai Bergerilya ke Brebes', '<p>oijasodifjiodsjfo dsojf iodjsaofijio sajiofj ajfpji jsd af dfad f a  fds </p>', '1680963411_b756aea4d151ac8dea34.png', 'Admin', '2023-04-08 14:16:51', '2023-04-15 04:53:42'),
(10, 'Sandiaga Ajak Santri Ciptakan Lapangan Kerja: Bisa Membuka UMKM', '<p>opksjdafkjopsd fdsopf kopdskpofa dsfds fd ad a df </p>', '1680963426_83abc42bf2dab56487f6.png', 'Admin', '2023-04-08 14:17:06', '2023-04-15 04:54:04'),
(11, 'DaerahBelajar Wirausaha, Santri Al-Manshuriyah Ikut Pelatihan Menjahit', '<p>fds fsad fasd fds af sd af</p>', '1680963437_c99e889e757369c3f2d9.png', 'Admin', '2023-04-08 14:17:17', '2023-04-15 04:54:21'),
(12, 'TGS Ganjar Sumut Tanamkan Pentingnya Akhlakul Karimah Remaja Masjid', '<p>fds fsad fsda fsdaf asdf sdf ewfe wsaf wef ew weq</p>', '1680963449_5fbfc40d81e44b4a7065.png', 'Admin', '2023-04-08 14:17:29', '2023-04-15 04:54:31'),
(13, 'Perluas Jaringan, Relawan SDG Lebarkan Sayap hingga NTB', '<p>f adsf sdaf sda fsda few qtr ewqrt ewtfg rytryh gy erwtgft</p>', '1680963463_00a0e0d7729a33232038.png', 'Admin', '2023-04-08 14:17:43', '2023-04-15 04:55:35'),
(14, 'Bekali Santri Ponpes Darul Ma\'arif, SDG Adakan Pelatihan Menjahit', '<p>fsad f weqt ew weqtwea  asdf sda</p>', '1680963474_3e712006923d5a1bf578.png', 'Admin', '2023-04-08 14:17:54', '2023-04-15 04:55:46'),
(15, 'Meriahkan Ramadan, SDG Gelar Kreasi Santri di Ponpes Al-Aqsha', '<p>sd fa ewq wqeruj iopew jioioqwju ieojoq jioeju iorejwio j<span style=\"font-size: 1rem;\">sd fa ewq wqeruj iopew jioioqwju ieojoq jioeju iorejwio j</span><span style=\"font-size: 1rem;\">sd fa ewq wqeruj iopew jioioqwju ieojoq jioeju iorejwio j</span><span style=\"font-size: 1rem;\">sd fa ewq wqeruj iopew jioioqwju ieojoq jioeju iorejwio j</span><span style=\"font-size: 1rem;\">sd fa ewq wqeruj iopew jioioqwju ieojoq jioeju iorejwio j</span><span style=\"font-size: 1rem;\">sd fa ewq wqeruj iopew jioioqwju ieojoq jioeju iorejwio j</span><span style=\"font-size: 1rem;\">sd fa ewq wqeruj iopew jioioqwju ieojoq jioeju iorejwio j</span><span style=\"font-size: 1rem;\">sd fa ewq wqeruj iopew jioioqwju ieojoq jioeju iorejwio jssssssssssssssssssssssssssss</span></p>', '1680963497_fc81e64e81f7b810888d.png', 'Admin', '2023-04-08 14:18:17', '2023-04-15 04:56:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id` int NOT NULL,
  `logo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_aplikasi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pondok` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_pondok` text COLLATE utf8mb4_general_ci NOT NULL,
  `telepon_pondok` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `email_pondok` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lokasi_pondok` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sejarah` text COLLATE utf8mb4_general_ci NOT NULL,
  `visi` text COLLATE utf8mb4_general_ci NOT NULL,
  `misi` text COLLATE utf8mb4_general_ci NOT NULL,
  `struktur_pondok` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `peraturan_pondok` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id`, `logo`, `nama_aplikasi`, `nama_pondok`, `alamat_pondok`, `telepon_pondok`, `email_pondok`, `lokasi_pondok`, `sejarah`, `visi`, `misi`, `struktur_pondok`, `peraturan_pondok`, `created_at`, `updated_at`) VALUES
(1, '1680861998_872c521f703ffe240828.png', 'Ponpes', 'Ponpes Madinatul U\'lum', 'VGCM+F3X, Pamenang, Merangin Regency, Jambi 37352', '0820983923', 'ponpesmadinatul@gmail.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15948.259472377551!2d102.53273770000003!3d-2.1287507999999966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2e38d4657ddcdb%3A0x5f3704b8d0d00e42!2sPONDOK%20PESANTREN%20MADINATU%20\'ULUM%20KEMANG%20MANIS%20PAMENANG!5e0!3m2!1sen!2sid!4v1680817848874!5m2!1sen!2sid', '<p style=\"margin-bottom: 15px; line-height: 1.7; font-size: 18px; color: rgb(48, 48, 48); font-family: Amiri !important;\">Sejarah pendidikan di Indonesia mencatat, bahwa pondok pesantren merupakan bentuk lembaga pendidikan pribumi tertua di Indonesia. Ada dua pendapat mengenai awal berdirinya pondok pesantren di Indonesia. Pendapat pertama menyebutkan bahwa pondok pesantren berakar pada tradisi Islam sendiri, dan pendapat kedua mengatakan bahwa sistem pendidikan model pondok pesantren adalah asli Indonesia.</p><p style=\"margin-bottom: 15px; line-height: 1.7; font-size: 18px; color: rgb(48, 48, 48); font-family: Amiri !important;\">Menurut pendapat pertama ada dua versi, yang berpendapat bahwa pondok pesantren berawal sejak zaman Nabi masih hidup. Dalam awal-awal dakwahnya, Nabi melakukan dengan sembunyi-sembunyi dengan peserta sekelompok orang, dilakukan di rumah-rumah, seperti yang tercatat di dalam sejarah, salah satunya adalah rumah Arqam bin Abu Arqam. Sekelompok orang yang tergolong dalam As-Sabiqunal Awwalun inilah yang kelak menjadi perintis dan pembuka jalan penyebaran agama Islam di Arab, Afrika, dan akhirnya menyebar ke seluruh dunia.</p><p style=\"margin-bottom: 15px; line-height: 1.7; font-size: 18px; color: rgb(48, 48, 48); font-family: Amiri !important;\">Versi kedua menyebutkan bahwa pondok pesantren mempunyai kaitan yang erat dengan tempat pendidikan yang khas bagi kaum sufi. Pendapat ini berdasarkan fakta bahwa penyiaran Islam di Indonesia pada awalnya lebih banyak dikenal dalam bentuk kegiatan tarekat yang melaksanakan amalan-amalan dzikir dan wirid tertentu.&nbsp;Pemimpin tarekat itu disebut kiai, yang mewajibkan pengikutnya melakukan suluk selama 40 hari dalam satu tahun dengan cara tinggal bersama sesama&nbsp;anggota tarekat dalam sebuah masjid untuk melakukan ibadah-ibadah di bawah bimbingan kiai. Untuk keperluan suluk ini, para&nbsp;kiai menyediakan ruangan khusus untuk penginapan dan tempat memasak yang terdapat di kiri kanan masjid.</p><p style=\"margin-bottom: 15px; line-height: 1.7; font-size: 18px; color: rgb(48, 48, 48); font-family: Amiri !important;\">Pendapat kedua mengatakan, pondok pesantren yang dikenal saat ini pada mulanya merupakan pengambilalihan dari sistem pondok pesantren yang diadakan orang-orang Hindu di Nusantara. Hal ini didasarkan pada fakta bahwa jauh sebelum datangnya Islam ke Indonesia, lembaga pondok pesantren pada masa itu dimaksudkan sebagai tempat mengajarkan ajaranajaran agama Hindu.</p><p style=\"margin-bottom: 15px; line-height: 1.7; font-size: 18px; color: rgb(48, 48, 48); font-family: Amiri !important;\">Pondok pesantren di Indonesia baru diketahui keberadaan dan perkembangannya setelah abad ke-16. Karya-karya Jawa Klasik seperti Serat Cobolek dan Serat Centini mengungkapkan dijumpai lembaga-lembaga yang mengajarkan berbagai kitab Islam Klasik dalam bidang Fiqih, Tasawuf, dan menjadi pusat-pusat penyiaran Islam yaitu pondok pesantren.</p>', '<p>visi</p><p>sda fdsaf d</p><p>asd&nbsp;</p>', '<p>misi</p><p>dsa fsda f</p><p>&nbsp;asdf sda df a</p><p>f das</p>', '1680803378_132c59f7e7efb7574098.png', '<ol><li>peraturan 1</li></ol>', '2023-04-06 17:08:53', '2023-04-10 15:29:51');

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
  `status` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp_wali` int NOT NULL,
  `wali` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(8, '1681025231_dc731381b8602b72ccc0.jpg', 'judul', 'fsd', 'start', '2023-04-06 23:33:01', '2023-04-09 07:27:11'),
(9, '1681025245_1096ca3454df8bee5788.jpg', '', '', '', '2023-04-08 14:12:26', '2023-04-09 07:27:25'),
(10, '1681025260_59d499f72a4469f953ca.jpg', 'Judul', 'oijoi', 'end', '2023-04-08 14:16:27', '2023-04-09 07:27:40');

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
('abcdddd', 'abcddddd', 'L', 'Aktif', 'aafds', '2023-04-04', 123456222, '2023-04-02 05:04:47', '2023-04-11 16:30:20');

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
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id_slideshow` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
