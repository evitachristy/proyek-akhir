-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jul 2018 pada 20.40
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_registrasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(12) NOT NULL,
  `username` varchar(18) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `notelp` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `email`, `notelp`) VALUES
(1, 'admin', 'admin', 'mesa bastian', 'bastian.mesa12@gmail.com', '0892713213');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
--

CREATE TABLE `invoices` (
  `id` int(16) NOT NULL,
  `data` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `invoices`
--

INSERT INTO `invoices` (`id`, `data`, `due_date`, `id_pelanggan`, `status`) VALUES
(10001048, '2017-04-30 19:20:34', '2017-05-01 19:20:34', 0, 'unpaid'),
(10001049, '2017-05-01 08:09:33', '2017-05-02 08:09:33', 2, 'unpaid'),
(10001050, '2017-05-01 12:39:24', '2017-05-02 12:39:24', 19, 'unpaid'),
(10001051, '2017-05-01 20:23:15', '2017-05-02 20:23:15', 19, 'unpaid'),
(10001052, '2017-05-04 07:07:12', '2017-05-05 07:07:12', 19, 'unpaid'),
(10001053, '2017-05-04 09:12:33', '2017-05-05 09:12:33', 24, 'unpaid'),
(10001054, '2018-06-10 02:17:01', '2018-06-11 02:17:01', 12, 'unpaid'),
(10001055, '2018-06-10 02:19:31', '2018-06-11 02:19:31', 12, 'unpaid'),
(10001056, '2018-06-13 05:48:15', '2018-06-14 05:48:15', 12, 'unpaid'),
(10001057, '2018-06-13 05:52:20', '2018-06-14 05:52:20', 12, 'unpaid'),
(10001058, '2018-06-13 06:02:21', '2018-06-14 06:02:21', 12, 'unpaid'),
(10001059, '2018-06-13 06:15:01', '2018-06-14 06:15:01', 12, 'unpaid'),
(10001060, '2018-06-25 05:42:59', '2018-06-26 05:42:59', 12, 'unpaid'),
(10001061, '2018-06-25 05:46:50', '2018-06-26 05:46:50', 12, 'unpaid'),
(10001062, '2018-06-25 05:49:29', '2018-06-26 05:49:29', 12, 'unpaid'),
(10001063, '2018-07-19 18:52:14', '2018-07-20 18:52:14', 23, 'unpaid'),
(10001064, '2018-07-19 18:53:08', '2018-07-20 18:53:08', 23, 'unpaid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(20) NOT NULL,
  `id_pelanggan` int(20) NOT NULL,
  `id_rumah` int(20) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `price` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL,
  `status1` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `id_pelanggan`, `id_rumah`, `nama`, `tanggal`, `price`, `image`, `status`, `status1`) VALUES
(2, 19, 4, 'Mesa Bastian', '2017-05-18', 'Rp.25.000.000,00', '03.PNG', 'Lunas', ''),
(3, 23, 6, 'Evita Christy', '2018-06-10', 'Rp.200.000,00', '02.PNG', 'Lunas', ''),
(330975748, 23, 3, 'Kontrakan PGA', '2018-07-19', '20000000', 'IMG_20160420_1238033.jpg', '', 'Waiting'),
(795101579, 23, 2, 'Kontrakan Sari', '2018-07-19', '35000000', 'IMG_20160420_1238034.jpg', '', 'Waiting'),
(1311561022, 23, 4, 'Kontrakan Sukapura', '2018-07-19', '25000000', 'IMG_20160313_222910.jpg', '', 'Ditolak'),
(1364724016, 23, 3, 'Kontrakan PGA', '2018-07-19', '20000000', 'IMG_20160315_0650214.jpg', '', 'Lunas'),
(1974604811, 23, 0, 'Evita Matondang', '2018-07-19', '2000000', 'IMG_20160315_065021.jpg', '', 'Lunas'),
(1982589988, 23, 2, 'Kontrakan Sari', '2018-07-19', '35000000', 'IMG_20160420_1238032.jpg', '', 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mpembayaran`
--

CREATE TABLE `mpembayaran` (
  `invoice_id` int(20) NOT NULL,
  `id_rumah` int(20) NOT NULL,
  `name` varchar(25) NOT NULL,
  `price` int(20) NOT NULL,
  `id_pelanggan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mpembayaran`
--

INSERT INTO `mpembayaran` (`invoice_id`, `id_rumah`, `name`, `price`, `id_pelanggan`) VALUES
(10001057, 8, 'Kontrakan GFA', 350000, 12),
(10001058, 4, 'Kontrakan Sukapura', 25000000, 12),
(10001059, 6, 'Kontrakan BPBB', 200000, 12),
(10001060, 7, 'Kontrakan BUU', 150000, 10),
(10001061, 7, 'Kontrakan BUU', 150000, 12),
(10001062, 7, 'Kontrakan BUU', 150000, 12),
(10001062, 8, 'Kontrakan GFA', 350000, 12),
(10001063, 2, 'Kontrakan Sari', 35000000, 23),
(10001064, 3, 'Kontrakan PGA', 20000000, 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notif`
--

CREATE TABLE `notif` (
  `id_konfirmasi` int(20) NOT NULL,
  `id_pelanggan` int(20) NOT NULL,
  `id_rumah` int(20) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `price` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notif`
--

INSERT INTO `notif` (`id_konfirmasi`, `id_pelanggan`, `id_rumah`, `nama`, `tanggal`, `price`, `image`, `status`) VALUES
(4343, 10, 4, 'Rayhan Fadhlan Uta', '2018-06-25', 'Rp. 177.500,00', '012.PNG', 'Setuju'),
(31446, 12, 5, 'Ghani R', '2018-06-12', 'Rp. 177.500,00', '011.PNG', ''),
(31787, 12, 4, 'Messa S', '2018-06-22', 'Rp. 25.000.000,00', '0.PNG', 'Tolak'),
(330975748, 23, 3, 'Kontrakan PGA', '2018-07-19', '20000000', 'IMG_20160420_1238033.jpg', ''),
(342276510, 23, 3, 'Kontrakan PGA', '2018-07-19', '20000000', 'IMG_20160315_0650212.jpg', ''),
(795101579, 23, 2, 'Kontrakan Sari', '2018-07-19', '35000000', 'IMG_20160420_1238034.jpg', ''),
(1043222709, 23, 0, 'Kontrakan PGA', '2018-07-19', '20000000', 'IMG_20160420_123803.jpg', ''),
(1311561022, 23, 4, 'Kontrakan Sukapura', '2018-07-19', '25000000', 'IMG_20160313_222910.jpg', ''),
(1364724016, 23, 3, 'Kontrakan PGA', '2018-07-19', '20000000', 'IMG_20160315_0650214.jpg', ''),
(1695961111, 23, 8, 'Kontrakan GFA', '2018-07-19', '350000', 'IMG_20160420_1238031.jpg', ''),
(1888994334, 23, 4, 'Kontrakan Sukapura', '2018-07-19', '25000000', 'IMG_20160315_0650211.jpg', ''),
(1974604811, 23, 0, 'Evita Matondang', '2018-07-19', '2000000', 'IMG_20160315_065021.jpg', ''),
(1982589988, 23, 2, 'Kontrakan Sari', '2018-07-19', '35000000', 'IMG_20160420_1238032.jpg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int(12) NOT NULL,
  `username` varchar(18) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `notelp` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `username`, `password`, `nama`, `email`, `notelp`) VALUES
(121, 'user1', 'user1', 'bastian mesa', 'bastian.mesa12@gmail.com', '08213567895'),
(122, 'user2', 'user2', 'mesa bastian', 'mr.bastian@gmail.com', '08223667995'),
(123, 'user3', 'user3', 'ammat n', 'folpo@gmail.com', '08222167595'),
(124, 'user4', 'user4', 'Yotom', 'ytoohur@gmail.com', '08533567893'),
(125, 'user5', 'user5', 'yezxxy', 'regieris@gmail.com', '8217838126'),
(126, 'user6', 'user6', 'yuwach', 'nato12@gmail.com', '81286321'),
(127, 'user7', 'user7', 'bocil', 'bocillo@gmail.com', '9271361374'),
(128, 'user8', 'user8', 'azi rizal', 'oksseaz@gmail.com', '912831723'),
(129, 'bastiannn', '1-20i3123', 'mteee', 'basojsd@gmail.com', '98678567567');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumah`
--

CREATE TABLE `rumah` (
  `id_rumah` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` int(9) NOT NULL,
  `image` text NOT NULL,
  `id_pemilik` int(10) NOT NULL,
  `jmlhkamar` int(20) NOT NULL,
  `jmlhkamarmandi` int(20) NOT NULL,
  `luas` varchar(25) NOT NULL,
  `tipe` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rumah`
--

INSERT INTO `rumah` (`id_rumah`, `name`, `description`, `price`, `image`, `id_pemilik`, `jmlhkamar`, `jmlhkamarmandi`, `luas`, `tipe`) VALUES
(2, 'Kontrakan Sari', 'Kontrakan minimalis\ndengan 2 kamar', 35000000, 'foto2.jpg', 122, 12, 12, '5x6 M', 'A'),
(3, 'Kontrakan PGA', 'Kontrakan minimalis\ndengan 2 kamar', 20000000, 'foto3.jpg', 123, 10, 8, '7x5 M', 'A'),
(4, 'Kontrakan Sukapura', 'Kontrakan minimalis\ndengan 2 kamar', 25000000, 'foto4.jpg', 124, 11, 11, '9x6 M', 'A'),
(5, 'Kontrakan DU', 'Kontrakan minimalis\ndengan 2 kamar', 177500, 'foto5.jpg', 125, 15, 11, '6x5 M', 'B'),
(6, 'Kontrakan BPBB', 'Kontrakan minimalis\ndengan 2 kamar', 200000, 'foto6.jpg', 126, 9, 5, '5x5 M', 'B'),
(7, 'Kontrakan BUU', 'Kontrakan minimalis\ndengan 2 kamar', 150000, 'foto7.jpg', 127, 10, 7, '4x6 M', 'B'),
(8, 'Kontrakan GFA', 'Kontrakan minimalis\ndengan 2 kamar', 350000, 'foto8.jpg', 128, 7, 7, '7x6 M', 'B'),
(9, 'test rumah', 'Bagus banget', 1000000, '02.PNG', 121, 14, 12, '6x6 M', 'B'),
(10, 'test input rumah', 'Rumah minimalis', 25000000, 'JOB.PNG', 121, 22, 16, '9x7 M', 'A'),
(11, 'Pondok Asri 2', 'Nyaman dan bersih', 820000, '302107_494890863863730_916842250_n.jpg', 121, 15, 15, '5x4 M', 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_pelanggan` int(12) NOT NULL,
  `username` varchar(18) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `notelp` varchar(18) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_pelanggan`, `username`, `password`, `nama`, `email`, `notelp`, `image`) VALUES
(2, 'hellboy', 'hellboy', 'user baru lagi', 'userbarulagi@gmail.com', '0856123456789', '302107_494890863863730_916842250_n.jpg'),
(5, 'useredit', 'passeditx', 'useredit', 'useredit@gmail.com', '1232434', ''),
(10, 'Amar', 'amar', 'Ammar S.Y', 'basojsd@gmail.com', '085785675897', ''),
(11, 'bastoia', 'jksabdhasvdh', 'mesa', 'd3mis903@gmail.com', '9374511710', ''),
(12, 'messa', 'messa', 'Messa S', 'bastian.mesa10@gmail.com', '08124598767', ''),
(19, 'palkon', 'palkon', 'palkon', 'palkon@gmail.com', '085221221221', ''),
(20, 'BASTIAN1222', '0852mesa', 'mesa', 'bastian.mesa12@gmail.com', '08213123513', ''),
(21, 'gitavhanie', 'gita1234', 'gita ', 'gitavhanie@gmail.com', '08213123513', ''),
(22, 'rahmawan', 'MMMMMM', 'rahma', 'a@gmail.com', '99', ''),
(23, 'evitachristy', 'evitachristy', 'evita', 'evita@gmail.com', '2255646548', ''),
(24, 'bastiansua', '0852mesa', 'Bastian sua', 'bastian.mesa@yahoo.com', '081621735232', ''),
(25, 'dewisul', 'dewisul', 'Dewi Sulis', 'dewi78@gmail.com', '082240206783', '1456647438383.jpg'),
(26, 'munirsyah', 'munisyah', 'Munirsyah', 'munirsyah@gmail.com', '98989888898798', 'IMG_20160217_085433.jpg'),
(29, 'bimaswara', 'bimaswara', 'Bimaswara', 'bimas@gmail.com', '7777777777777', 'IMG_20160217_0854333.jpg'),
(31, 'ssssssssss', 'aaaaaaaaaaaaa', 'uiuiu', 'fajarhabie@gmail.com', '225569998887', 'IMG_20160217_0854335.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indeks untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indeks untuk tabel `mpembayaran`
--
ALTER TABLE `mpembayaran`
  ADD KEY `invoice_id` (`invoice_id`) USING BTREE;

--
-- Indeks untuk tabel `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indeks untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `rumah`
--
ALTER TABLE `rumah`
  ADD PRIMARY KEY (`id_rumah`),
  ADD KEY `id_pemilik` (`id_pemilik`),
  ADD KEY `idx_pemilik` (`id_pemilik`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10001065;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1982589989;

--
-- AUTO_INCREMENT untuk tabel `mpembayaran`
--
ALTER TABLE `mpembayaran`
  MODIFY `invoice_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10001065;

--
-- AUTO_INCREMENT untuk tabel `notif`
--
ALTER TABLE `notif`
  MODIFY `id_konfirmasi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1982589989;

--
-- AUTO_INCREMENT untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT untuk tabel `rumah`
--
ALTER TABLE `rumah`
  MODIFY `id_rumah` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_pelanggan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
