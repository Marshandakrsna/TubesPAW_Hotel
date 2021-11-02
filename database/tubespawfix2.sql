-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Nov 2021 pada 08.27
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubespawfix2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_kamar` varchar(255) NOT NULL,
  `harga_kamar` int(11) NOT NULL,
  `foto_kamar` varchar(255) NOT NULL,
  `deskripsi_kamar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_kategori`, `nama_kamar`, `harga_kamar`, `foto_kamar`, `deskripsi_kamar`) VALUES
(1, 5, 'Business Room', 100000, 'businessroom.jpeg', '<p><strong>Bussiness Room</strong></p>\r\n\r\n<p>Lengkap</p>\r\n\r\n<p>AC, Kulkas, TV</p>\r\n\r\n<p>Service 24 Jam</p>\r\n'),
(2, 4, 'Deluxe Room', 250000, 'deluxeroom.jpeg', '<p><strong>Deluxe Room</strong></p>\r\n\r\n<p>Lengkap</p>\r\n\r\n<p>AC, Kulkas, TV</p>\r\n\r\n<p>Service 24 Jam</p>\r\n\r\n<p>Luas</p>\r\n\r\n<p>Free Wifi</p>\r\n'),
(6, 4, 'Executive Room', 300000, 'executiveroom.jpeg', '<p><strong>Executive Room</strong></p>\r\n\r\n<p>Lengkap</p>\r\n\r\n<p>AC, Kulkas, TV</p>\r\n\r\n<p>Service 24 Jam</p>\r\n\r\n<p>Luas</p>\r\n\r\n<p>Free Wifi</p>\r\n\r\n<p>Breakfast 1 hari</p>\r\n'),
(7, 4, 'Premiere Suite', 350000, 'premiersuite.jpeg', '<p><strong>Premiere Suite</strong></p>\r\n\r\n<p>Breakfast (2 pax)</p>\r\n\r\n<p>AC</p>\r\n\r\n<p>Service 24 jam</p>\r\n\r\n<p>Wifi</p>\r\n\r\n<p>Ruang Kerja</p>\r\n\r\n<p>TV</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(8, 1, 'VIP Room', 400000, 'viproom.jpeg', '<p><strong>VIP Room</strong></p>\r\n\r\n<p>AC, Kulkas, TV</p>\r\n\r\n<p>Service 24 Jam</p>\r\n\r\n<p>Luas</p>\r\n\r\n<p>Free Wifi</p>\r\n\r\n<p>Breakfast (2 pax)</p>\r\n\r\n<p>Ruang Kerja</p>\r\n\r\n<p>Ruang Makan</p>\r\n'),
(9, 1, 'VVIP Room', 500000, 'vviproom.jpeg', '<p><strong>VVIP Room</strong></p>\r\n\r\n<p>Lengkap</p>\r\n\r\n<p>AC, Kulkas, TV</p>\r\n\r\n<p>Service 24 Jam</p>\r\n\r\n<p>Luas</p>\r\n\r\n<p>Free Wifi</p>\r\n\r\n<p>Ruang Kerja</p>\r\n\r\n<p>Ruang Makan</p>\r\n\r\n<p>Ruang Tamu</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, '  Kamar High'),
(4, ' Kamar Menengah'),
(5, 'Kamar Low Price');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `email_pelanggan` varchar(255) NOT NULL,
  `password_pelanggan` text NOT NULL,
  `telepon_pelanggan` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `fotoprofil` varchar(255) NOT NULL,
  `token` text NOT NULL,
  `aktif` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `password_pelanggan`, `telepon_pelanggan`, `alamat`, `fotoprofil`, `token`, `aktif`) VALUES
(30, 'Marshanda Krisnawi', 'marshandakrsna@gmail.com', '202cb962ac59075b964b07152d234b70', '082340162978', 'JL SOLO', 'marsha.PNG', '8a02328890702e9c9aec4064f073af66d0fec44572c381827ccfecd9f73131ed', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_reservasi` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_reservasi`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(6, 23, 'Marshanda Krisnawi', 'BNI', 2100000, '2021-10-17 00:00:00', '2021101718111655925d693717ea9338c7853a646881b8.jpg'),
(7, 26, 'Edwin Juan', 'BNI', 100000, '2021-10-18 00:00:00', '20211018050544Blue And Orange Minimalist Sun Logo.png'),
(8, 27, 'Hesti', 'BCA', 100000, '2021-10-18 00:00:00', '20211018193102hotel.png'),
(9, 29, 'Marshanda Krisnawi', 'BCA', 1750, '2021-10-19 00:00:00', '20211019173343MicrosoftTeams-image (3).png'),
(10, 30, 'Hesti', 'BCA', 100000, '2021-10-19 00:00:00', '20211019174053marsha.PNG'),
(11, 33, 'Marshanda Krisnawi', 'BCA', 100000, '2021-10-24 00:00:00', '20211024193613Frame 2 (5).png'),
(12, 34, 'Marshanda Krisnawi', 'BCA', 250000, '2021-10-25 00:00:00', '20211025080901Frame 2 (4).png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggalawal` text NOT NULL,
  `tanggalakhir` text NOT NULL,
  `tanggal_reservasi` datetime NOT NULL,
  `status_reservasi` varchar(255) NOT NULL DEFAULT 'Belum Bayar',
  `id_kamar` text NOT NULL,
  `hargatotal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_pelanggan`, `tanggalawal`, `tanggalakhir`, `tanggal_reservasi`, `status_reservasi`, `id_kamar`, `hargatotal`) VALUES
(23, 12, '2021-10-21', '2021-09-30', '2021-10-17 00:00:00', 'sudah kirim', '1', '2100000'),
(26, 12, '2021-10-29', '2021-10-30', '2021-10-18 00:00:00', 'sudah kirim', '1', '100000'),
(27, 12, '2021-10-20', '2021-10-21', '2021-10-18 00:00:00', 'sudah kirim', '1', '100000'),
(29, 12, '2021-10-21', '2021-10-28', '2021-10-19 00:00:00', 'Pembayaran Anda Telah Di Terima, Silahkan ke Hotel pada Hari Kedatangan Anda', '2', '1750000'),
(30, 12, '2021-10-22', '2021-10-23', '2021-10-19 00:00:00', 'sudah kirim', '1', '100000'),
(33, 29, '2021-10-26', '2021-10-27', '2021-10-24 00:00:00', 'sudah kirim', '1', '100000'),
(34, 30, '2021-10-26', '2021-10-27', '2021-10-25 00:00:00', 'Pembayaran Anda Telah Di Terima, Silahkan ke Hotel pada Hari Kedatangan Anda', '2', '250000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
