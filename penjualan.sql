-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Sep 2022 pada 14.14
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `pw`) VALUES
(1, 'Adiputra', '123'),
(2, 'admin', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detil_pesan`
--

CREATE TABLE `detil_pesan` (
  `id_pesan_produk` int(11) NOT NULL,
  `id_pesan` int(100) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `nm_produk` varchar(100) NOT NULL,
  `subharga` int(100) NOT NULL,
  `total_harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detil_pesan`
--

INSERT INTO `detil_pesan` (`id_pesan_produk`, `id_pesan`, `id_produk`, `jumlah`, `harga`, `nm_produk`, `subharga`, `total_harga`) VALUES
(9, 48, 'BR0002', 2, '500000', 'Keyboard', 1000000, 51000000),
(10, 48, 'BR0001', 1, '50000000', 'Komputer PC', 50000000, 51000000),
(11, 49, 'BR0002', 1, '500000', 'Keyboard', 500000, 500000),
(12, 50, 'BR0002', 1, '500000', 'Keyboard', 500000, 500000),
(13, 51, 'BR0002', 1, '500000', 'Keyboard', 500000, 500000),
(14, 52, 'BR0002', 1, '500000', 'Keyboard', 500000, 500000),
(15, 53, 'BR0002', 1, '500000', 'Keyboard', 500000, 500000),
(16, 54, 'BR0002', 1, '500000', 'Keyboard', 500000, 500000),
(17, 55, 'BR0002', 2, '500000', 'Keyboard', 1000000, 51000000),
(18, 55, 'BR0001', 1, '50000000', 'Komputer PC', 50000000, 51000000),
(19, 56, 'BR0002', 1, '500000', 'Keyboard', 500000, 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur`
--

CREATE TABLE `faktur` (
  `id_faktur` int(5) NOT NULL,
  `id_pesan` int(5) NOT NULL,
  `tgl_faktur` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuitansi`
--

CREATE TABLE `kuitansi` (
  `id_kuitansi` int(5) NOT NULL,
  `id_faktur` int(5) NOT NULL,
  `tgl_kuitansi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(5) NOT NULL,
  `nm_pelanggan` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pw` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nm_pelanggan`, `alamat`, `telepon`, `email`, `pw`) VALUES
('P0001', 'Han', 'JL.BEKASI TIMUR V', '0987654', 'm.farhan8417@gmail.com', '123'),
('P0002', 'Adi', 'RT.04 RW.02 Kel Pinag Sari', '081299887755', 'adiirawan2705@gmail.com', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(5) NOT NULL,
  `id_pelanggan` varchar(5) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `harga` int(100) NOT NULL,
  `nm_pelanggan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_pelanggan`, `tgl_pesan`, `harga`, `nm_pelanggan`, `alamat`, `telepon`) VALUES
(54, 'P0001', '2022-09-28', 500000, 'Han', 'JL.BEKASI TIMUR V', '0987654'),
(55, 'P0001', '2022-09-28', 51000000, 'Han', 'JL.BEKASI TIMUR V', '0987654'),
(56, 'P0002', '2022-09-29', 500000, 'Adi', 'RT.04 RW.02 Kel Pinag Sari', '081299887755');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(10) NOT NULL,
  `nm_produk` varchar(30) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga` decimal(10,0) NOT NULL DEFAULT 0,
  `stock` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nm_produk`, `satuan`, `harga`, `stock`) VALUES
('BR0001', 'Komputer PC', 'Pcs.', '50000000', 10),
('BR0002', 'Keyboard', 'Pcs.', '500000', 99);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detil_pesan`
--
ALTER TABLE `detil_pesan`
  ADD PRIMARY KEY (`id_pesan_produk`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_pesan` (`id_pesan`);

--
-- Indeks untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`id_faktur`),
  ADD KEY `id_pesan` (`id_pesan`);

--
-- Indeks untuk tabel `kuitansi`
--
ALTER TABLE `kuitansi`
  ADD PRIMARY KEY (`id_kuitansi`),
  ADD KEY `FK_kuitansi` (`id_faktur`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detil_pesan`
--
ALTER TABLE `detil_pesan`
  MODIFY `id_pesan_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `faktur`
--
ALTER TABLE `faktur`
  MODIFY `id_faktur` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kuitansi`
--
ALTER TABLE `kuitansi`
  MODIFY `id_kuitansi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD CONSTRAINT `faktur_ibfk_1` FOREIGN KEY (`id_pesan`) REFERENCES `pesan` (`id_pesan`);

--
-- Ketidakleluasaan untuk tabel `kuitansi`
--
ALTER TABLE `kuitansi`
  ADD CONSTRAINT `FK_kuitansi` FOREIGN KEY (`id_faktur`) REFERENCES `faktur` (`id_faktur`);

--
-- Ketidakleluasaan untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
