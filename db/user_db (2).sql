-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Bulan Mei 2023 pada 12.36
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_kamar`
--

CREATE TABLE `fasilitas_kamar` (
  `id_fasilitas` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `fasilitas` text NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fasilitas_kamar`
--

INSERT INTO `fasilitas_kamar` (`id_fasilitas`, `id_kamar`, `fasilitas`, `harga`) VALUES
(4, 6, 'Kasur Tidur, Kursi Tamu, Meja Makan', ''),
(8, 9, 'bhjhgbjhgb', '20.000'),
(9, 10, 'televisi, kapal, ayunan', '250.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `keterangan`, `foto`) VALUES
(1, 'Kolam Renang', '398-823c97c0d94e6b570a893e38e23c962e_crop_920x530.jpg'),
(2, 'Tempat Tidur', '448-5f081b41cc76c.jpeg'),
(5, 'Lobi', '417-Rayaburi_Hotel_Patong_-_Lobby.jpg'),
(6, 'Tempat Makan', '295-fairmont.jpg'),
(7, 'Gedung Hotel', '313-27677-hotel-tertinggi-di-dunia.jpg'),
(8, 'Resepsionis', '693-Resepsionis.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `no_kamar` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `no_kamar`, `foto`) VALUES
(6, 'Kamar No. 3', '377-5f081b41cc76c.jpeg'),
(9, 'wddwdwd', '672-anew.jpg'),
(10, 'luxury', '214-421374-Minecraft-colorful-green-blue-purple-Minecraft-nether.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `cek_in` varchar(255) DEFAULT NULL,
  `cek_out` varchar(255) DEFAULT NULL,
  `jml_kamar` varchar(255) DEFAULT NULL,
  `nama_pemesan` varchar(255) DEFAULT NULL,
  `email_pemesan` varchar(255) DEFAULT NULL,
  `hp_pemesan` varchar(255) DEFAULT NULL,
  `nama_tamu` varchar(255) DEFAULT NULL,
  `id_kamar` int(11) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `cek_in`, `cek_out`, `jml_kamar`, `nama_pemesan`, `email_pemesan`, `hp_pemesan`, `nama_tamu`, `id_kamar`, `status`) VALUES
(31, '2023-04-14', '2023-04-14', '2', 'raihan aziz', 'revalinof57@gmail.com', '0987654321', 'amel', 6, '2'),
(32, '', '', '', '', '', '', '', 0, '1'),
(33, '', '', '', '', '', '', '', 0, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', 'admin', '1'),
(3, 'Resepsionis', 'resepsionis', 'resepsionis', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
