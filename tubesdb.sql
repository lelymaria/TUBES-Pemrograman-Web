-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2021 pada 09.02
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubesdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `nik` int(20) NOT NULL,
  `no_hp` int(15) NOT NULL,
  `jenis_kelamin` text NOT NULL,
  `tujuan` varchar(500) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_rumah` text NOT NULL,
  `status` int(1) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`id`, `nama`, `nik`, `no_hp`, `jenis_kelamin`, `tujuan`, `tanggal_lahir`, `alamat_rumah`, `status`, `email`, `password`) VALUES
(5, 'Lely Maria Kova', 4858586, 98989, 'Perempuan', 'ya gatau', '2002-12-27', 'Palimanan', 1, 'lely@gmail.com', '$2y$10$z53cL66f/XtomkQgNfnL1.V1iAqO/RblSkPVluKodJQCMyiYIki4y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `tanggal_acara` date NOT NULL,
  `nama_acara` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `tanggal_acara`, `nama_acara`) VALUES
(8, '2021-06-19', 'Kopdar Indramayu'),
(9, '2021-06-20', 'Sunmori'),
(10, '2021-06-26', 'Santunan Anak Yatim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tanggal_daftar` timestamp NULL DEFAULT current_timestamp(),
  `id_role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id`, `email`, `password`, `tanggal_daftar`, `id_role`) VALUES
(1, 'aiz@gmail.com', '$2y$10$n/pXa48j4ParwLa/gpdnPu9p2LYgKKGDVdmnjb491R5Zun7qkOYj6', NULL, 1),
(10, 'mariaakov@gmail.com', '$2y$10$gqK4RMaxv.WBVsJir9UbR.gJtpY6ECxG4OW8FTWjDZquXbJzZXdDC', '2021-06-08 09:10:20', 2),
(18, 'lely@gmail.com', '$2y$10$a/oVfHnPZMVbYCwtLv1C4Oo3DAs3PAXc0l8R9AWXusoCi.OaoRdaq', '2021-06-12 13:13:51', 2),
(20, 'lelymariakova@gmail.com', '12', '2021-06-12 13:56:26', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
