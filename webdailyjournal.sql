-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jan 2026 pada 11.28
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdailyjournal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `judul` text DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(1, 'kuliah\r\n', 'kegiatan rutin saya saat ini adalah berkuliah di universitas Dian Nuswantoro\r\n\r\n', 'kuliah.jpg', '2025-12-10 09:10:50', 'admin'),
(2, 'Belajar Kelompok\r\n', 'belajar kelompok untuk mengerjakan tugas yg di berikan oleh dosen agar mendapat nilai yang bagusv', 'kerjakelompok.jpg', '2025-12-10 09:10:50', 'admin'),
(3, 'menonton bola', 'menonton pertandingan bola tentang timnas,club favorit yang telah ditunggu waktu bermainya\r\n\r\n', 'bola.jpg', '2025-12-10 09:10:50', 'admin'),
(4, 'Main Game', 'saat ada waktu kosong atau Setelah pulang kuliah teman-teman mengajak untuk bermain PS disekitar rumah salah satu teman\r\n\r\n', 'fc25.jpg', '2025-12-10 09:25:41', 'admin'),
(5, 'Belajar', 'Pada malam hari belajar materi yang dipelajari tadi dikelas dan untuk materi besok\r\n\r\n', 'Belajar.jpg', '2025-12-10 09:10:50', 'admin'),
(10, 'Timnas', 'Tinmas indonesia sedang berjuang untuk memdapatkan tiket menuju piala dunia', '20251226144208.jpg', '2025-12-26 14:42:08', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `judul`, `keterangan`, `foto`, `tanggal`, `username`) VALUES
(1, 'Timnas', 'Timnas Indonesia sedang berjuang untuk mendapatkan tiket menuju piala dunia', 'timnas.jpg', '2025-12-26 14:42:08', 'admin'),
(2, 'Main Game', 'Saat ada waktu kosong atau setelah pulang kuliah teman-teman mengajak untuk bermain PS di sekitar rumah salah satu teman', 'fifa25.jpg', '2025-12-10 09:25:41', 'admin'),
(3, 'Kuliah', 'Kegiatan rutin saya saat ini adalah berkuliah di Universitas Dian Nuswantoro', 'kuliah.jpg', '2025-12-10 09:10:50', 'admin'),
(4, 'Belajar Kelompok', 'Belajar kelompok untuk mengerjakan tugas yang diberikan oleh dosen agar mendapatkan nilai yang bagus', 'belajar_kelompok.jpg', '2025-12-10 09:10:50', 'admin'),
(5, 'Menonton Bola', 'Menonton pertandingan bola tentang timnas, club favorit yang telah ditunggu waktu bermain', 'menonton_bola.jpg', '2025-12-10 09:10:50', 'admin'),
(6, 'Belajar', 'Pada malam hari belajar materi yang dipelajari tadi di kelas dan untuk materi besok', 'belajar.jpg', '2025-12-10 09:10:50', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
