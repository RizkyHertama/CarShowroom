-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Mar 2022 pada 15.21
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_showroom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cardb`
--

CREATE TABLE `cardb` (
  `id` int(11) NOT NULL,
  `PlatNomor` varchar(25) NOT NULL,
  `TipeMobil` varchar(25) NOT NULL,
  `NamaCustomer` varchar(25) NOT NULL,
  `HargaMobil` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cardb`
--

INSERT INTO `cardb` (`id`, `PlatNomor`, `TipeMobil`, `NamaCustomer`, `HargaMobil`) VALUES
(10, 'B6512KFU', 'Honda Brio', 'Rizky Hertama', '500000000'),
(12, 'F9087KKA', 'Mercedes G-class', 'Rudi santoso', '1000000000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cardb`
--
ALTER TABLE `cardb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `PlatNomor` (`PlatNomor`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cardb`
--
ALTER TABLE `cardb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
