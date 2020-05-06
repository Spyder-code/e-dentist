-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Bulan Mei 2020 pada 00.44
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-dentist`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `diagnosa`
--

INSERT INTO `diagnosa` (`id`, `kode`, `nama`) VALUES
(4, '2001', 'demam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `nip` int(11) DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `ttl` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(11) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nama`, `password`, `level`, `nip`, `tempat`, `ttl`, `alamat`, `no_telepon`, `gambar`, `tanggal`) VALUES
(19, 'Nur Isnaini', '827ccb0eea8a706c4c34a16891f84e7b', 1, 76218038, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'wdw', '827ccb0eea8a706c4c34a16891f84e7b', 2, 9876, 'csc', '2020-05-08', 'dssa', '2343242', 'pdm.jpg', '2020-05-04'),
(21, NULL, '827ccb0eea8a706c4c34a16891f84e7b', 2, 4567, NULL, NULL, NULL, NULL, 'default.jpg', '2020-05-04'),
(22, NULL, '827ccb0eea8a706c4c34a16891f84e7b', 2, 0, NULL, NULL, NULL, NULL, NULL, '2020-05-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode_gigi`
--

CREATE TABLE `kode_gigi` (
  `id` int(11) NOT NULL,
  `image` varchar(10) NOT NULL,
  `kode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kode_gigi`
--

INSERT INTO `kode_gigi` (`id`, `image`, `kode`) VALUES
(1, '11.jpeg', 11),
(2, '12.jpeg', 12),
(3, '13.jpeg', 13),
(4, '14.jpeg', 14),
(5, '15.jpeg', 15),
(6, '16.jpeg', 16),
(7, '17.jpeg', 17),
(8, '18.jpeg', 18),
(9, '21.jpeg', 21),
(10, '22.jpeg', 22),
(11, '23.jpeg', 23),
(12, '24.jpeg', 24),
(13, '25.jpeg', 25),
(14, '26.jpeg', 26),
(15, '27.jpeg', 27),
(16, '28.jpeg', 28),
(17, '31.jpeg', 31),
(18, '32.jpeg', 32),
(19, '33.jpeg', 33),
(20, '34.jpeg', 34),
(21, '35.jpeg', 35),
(22, '36.jpeg', 36),
(23, '37.jpeg', 37),
(24, '38.jpeg', 38),
(25, '41.jpeg', 41),
(26, '42.jpeg', 42),
(27, '43.jpeg', 43),
(28, '44.jpeg', 44),
(29, '45.jpeg', 45),
(32, '46.jpeg', 46),
(33, '47.jpeg', 47),
(34, '48.jpeg', 48),
(35, '51.jpeg', 51),
(36, '52.jpeg', 52),
(37, '53.jpeg', 53),
(38, '54.jpeg', 54),
(39, '55.jpeg', 55),
(40, '61.jpeg', 61),
(41, '62.jpeg', 62),
(42, '63.jpeg', 63),
(43, '64.jpeg', 64),
(44, '65.jpeg', 65),
(45, '71.jpeg', 71),
(46, '72.jpeg', 72),
(47, '73.jpeg', 73),
(48, '74.jpeg', 74),
(49, '75.jpeg', 75),
(50, '81.jpeg', 81),
(51, '82.jpeg', 82),
(52, '83.jpeg', 83),
(53, '84.jpeg', 84),
(54, '85.jpeg', 85);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `nim` varchar(100) DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `ttl` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(11) DEFAULT NULL,
  `jenjang` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `password`, `nim`, `tempat`, `ttl`, `alamat`, `no_telepon`, `jenjang`, `gambar`, `tanggal`) VALUES
(13, 'Isnaini', '827ccb0eea8a706c4c34a16891f84e7b', 'J0987', 'Nganjuk', '2020-05-07', 'Surabaya', '23848239842', 'D3', 'WIN_20200309_17_02_40_Pro.jpg', '2020-05-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kelamin` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `tempat`, `ttl`, `alamat`, `kelamin`, `no_telepon`, `tanggal`) VALUES
(11, 'Kemal', 'Surabaya', '2020-05-14', 'jl. Jetis Wetan', 'Laki-Laki', '093045903495', '2020-05-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perawatan`
--

CREATE TABLE `perawatan` (
  `id` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `diagnosa` varchar(100) NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `kode_gigi` varchar(100) NOT NULL,
  `tindakan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `bulan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indeks untuk tabel `kode_gigi`
--
ALTER TABLE `kode_gigi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_mahasiswa_2` (`id_mahasiswa`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `perawatan`
--
ALTER TABLE `perawatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `perawatan`
--
ALTER TABLE `perawatan`
  ADD CONSTRAINT `perawatan_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `perawatan_ibfk_2` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
