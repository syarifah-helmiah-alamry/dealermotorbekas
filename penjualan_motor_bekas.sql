-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2021 pada 14.39
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan_motor_bekas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_cust` varchar(20) NOT NULL,
  `nama_cust` varchar(50) NOT NULL,
  `alamat_cust` varchar(100) NOT NULL,
  `telp_cust` varchar(13) NOT NULL,
  `nik_cust` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_cust`, `nama_cust`, `alamat_cust`, `telp_cust`, `nik_cust`) VALUES
('andin1', 'andin', '', '', ''),
('cust0003', 'jARWO', 'Karawang', '018381083182', '13124424');

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas_motor`
--

CREATE TABLE `identitas_motor` (
  `id` int(5) NOT NULL,
  `no_registrasi` varchar(9) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_rangka` varchar(17) NOT NULL,
  `no_mesin` varchar(12) NOT NULL,
  `plat_no` varchar(9) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `tahun_pembuatan` year(4) NOT NULL,
  `isi_silinder` int(2) NOT NULL,
  `bahan_bakar` varchar(20) NOT NULL,
  `warna_tnkb` varchar(10) NOT NULL,
  `tahun_registrasi` year(4) NOT NULL,
  `no_bpkb` varchar(9) NOT NULL,
  `kode_lokasi` varchar(5) NOT NULL,
  `masa_berlaku_stnk` date NOT NULL,
  `gambar_motor` varchar(100) NOT NULL,
  `tgl_beli` date NOT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `tgl_jual` date NOT NULL,
  `harga_jual` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `identitas_motor`
--

INSERT INTO `identitas_motor` (`id`, `no_registrasi`, `nama_pemilik`, `alamat`, `no_rangka`, `no_mesin`, `plat_no`, `merk`, `type`, `model`, `tahun_pembuatan`, `isi_silinder`, `bahan_bakar`, `warna_tnkb`, `tahun_registrasi`, `no_bpkb`, `kode_lokasi`, `masa_berlaku_stnk`, `gambar_motor`, `tgl_beli`, `harga_beli`, `tgl_jual`, `harga_jual`) VALUES
(14, 'T4524RC', 'Reyna', 'Bekasi', 'MH1KB2119JK057648', 'KB21E1012345', 'T4524RC  ', 'Honda', 'Vario125', 'Sepeda Motor', 2019, 2, 'Bensin', 'Hitam', 2021, 'N06112345', '12000', '2024-08-18', '61c1d7b83f509.jpg', '2019-08-18', 21000000, '2021-12-25', 25000000),
(15, 'B4585RC', 'Raze', 'Karawang', 'MH1KB2119JK045678', 'KB21E1023456', 'B4585RC  ', 'Ducati', 'Ducati1290', 'Sepeda Motor', 2021, 2, 'Bensin', 'Merah', 2020, 'N06112345', '12000', '2021-12-11', '61c1d8d1107b9.png', '2021-12-18', 650000000, '2021-12-25', 670000000),
(20, '121422414', 'Adi Satrio', 'Karawang', '121131', '1313', 't 4646 lk', 'Honda', 'Matic', '242', 2020, 160, 'bensin', 'Biru', 2017, '981647163', '41361', '2025-11-21', '61c1d6542ba3b.jpg', '2021-12-21', 34000000, '2021-12-22', 40000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `IdTrsk` varchar(7) NOT NULL,
  `Tgl_Trsk` datetime NOT NULL,
  `Id_cust` varchar(20) NOT NULL,
  `Id_Kendaraan` int(5) NOT NULL,
  `Harga_Jual` bigint(20) NOT NULL,
  `Harga_Jual_real` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`IdTrsk`, `Tgl_Trsk`, `Id_cust`, `Id_Kendaraan`, `Harga_Jual`, `Harga_Jual_real`) VALUES
('TRS0003', '2021-12-21 20:29:32', 'cust0003', 20, 40000000, 34000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `hak_akses` enum('Pemilik','Teller','Teknisi','Customer') NOT NULL,
  `create_date` date NOT NULL,
  `manager` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `password`, `hak_akses`, `create_date`, `manager`) VALUES
('adi123', 'Adi', 'c4ca4238a0b923820dcc509a6f75849b', 'Pemilik', '2021-12-21', ''),
('adit123', 'adit', 'c4ca4238a0b923820dcc509a6f75849b', 'Teller', '2021-12-21', ''),
('andin1', 'andin', 'c4ca4238a0b923820dcc509a6f75849b', 'Customer', '2021-12-21', ''),
('mia1', 'mia', 'c4ca4238a0b923820dcc509a6f75849b', 'Teknisi', '2021-12-21', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indeks untuk tabel `identitas_motor`
--
ALTER TABLE `identitas_motor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`IdTrsk`),
  ADD KEY `Id_cust` (`Id_cust`),
  ADD KEY `Id_Kendaraan` (`Id_Kendaraan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `identitas_motor`
--
ALTER TABLE `identitas_motor`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`Id_cust`) REFERENCES `customer` (`id_cust`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`Id_Kendaraan`) REFERENCES `identitas_motor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
