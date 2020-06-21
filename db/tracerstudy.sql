-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2020 pada 04.57
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracerstudy`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_alumni`
--

CREATE TABLE `tbl_alumni` (
  `nim` int(15) NOT NULL,
  `nama_alumni` char(128) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telepon` decimal(13,0) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') DEFAULT NULL,
  `pin` varchar(13) DEFAULT NULL,
  `tahun_lulus` date DEFAULT NULL,
  `jurusan` varchar(182) DEFAULT NULL,
  `status_pekerjaan` enum('Ya','Tidak') DEFAULT NULL,
  `bagian` char(128) DEFAULT NULL,
  `alamat_kantor` varchar(128) DEFAULT NULL,
  `no_telepon_kantor` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_alumni`
--

INSERT INTO `tbl_alumni` (`nim`, `nama_alumni`, `alamat`, `no_telepon`, `email`, `jenis_kelamin`, `pin`, `tahun_lulus`, `jurusan`, `status_pekerjaan`, `bagian`, `alamat_kantor`, `no_telepon_kantor`) VALUES
(34, 'wewqr', 'sdfsdf', '34234', 'sds@sdsad.com', 'Laki - Laki', '34343', '2020-06-21', 'dsfdsfsd', 'Ya', 'sdfsd', 'sdfsd', '324234'),
(998, 'ooooooo', 'sdfsdf', '7878', 'arieflow02@gmail.com', 'Laki - Laki', '787878', '2020-06-04', 'dsfdsfsd', 'Ya', 'uuuu', 'uuuu', '786787687'),
(9093, 'wakwaw', 'Cikutra', '4354354', 'sds@sdsad.com', 'Laki - Laki', '34343', '0000-00-00', 'dsfdsfsd', 'Tidak', '', '', ''),
(23233, 'sadasd', 'sddfs', '34343', 'nadyafadilahputri@gmail.com', 'Laki - Laki', '34343', '2020-06-03', 'dsfdsfsd', 'Tidak', '', '', ''),
(152016024, 'Arie', 'Bandung', '895343803877', 'arieandreanataufiq1@gmail.com', 'Laki - Laki', '549648', '0000-00-00', 'Informatika', 'Ya', 'staff', 'Jalan Sangkuriang', '081312312');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jawaban`
--

CREATE TABLE `tbl_jawaban` (
  `id_jawaban` varchar(10) NOT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `id_kuisioner` varchar(10) DEFAULT NULL,
  `id_pertanyaan` varchar(10) DEFAULT NULL,
  `jawaban` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kuisioner`
--

CREATE TABLE `tbl_kuisioner` (
  `id_kuisioner` int(10) NOT NULL,
  `judul` varchar(56) NOT NULL,
  `kuisioner` varchar(182) DEFAULT NULL,
  `is_created` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kuisioner`
--

INSERT INTO `tbl_kuisioner` (`id_kuisioner`, `judul`, `kuisioner`, `is_created`) VALUES
(4, 'ss', 'ss', 1),
(22, 'qa', 'qa', 1),
(26, '', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lowongan`
--

CREATE TABLE `tbl_lowongan` (
  `id_lowongan` int(10) NOT NULL,
  `id_perusahaan` varchar(10) DEFAULT NULL,
  `bagian` varchar(128) DEFAULT NULL,
  `nama_narahubung` varchar(128) DEFAULT NULL,
  `no_narahubung` int(14) DEFAULT NULL,
  `keterangan` varchar(182) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_lowongan`
--

INSERT INTO `tbl_lowongan` (`id_lowongan`, `id_perusahaan`, `bagian`, `nama_narahubung`, `no_narahubung`, `keterangan`) VALUES
(2, '1', 'semua', 'yakin bahwa angka', 999, 'adalah angka setan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pertanyaan`
--

CREATE TABLE `tbl_pertanyaan` (
  `id_pertanyaan` int(10) NOT NULL,
  `id_kuisioner` int(10) DEFAULT NULL,
  `pertanyaan` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pertanyaan`
--

INSERT INTO `tbl_pertanyaan` (`id_pertanyaan`, `id_kuisioner`, `pertanyaan`) VALUES
(1, 4, 'asdasd'),
(26, 5, 'asd'),
(27, 5, 'a'),
(28, 5, 'b'),
(29, 5, 'c'),
(30, 6, 'a'),
(31, 6, 'b'),
(32, 17, 'ss'),
(33, 22, 'sdsd'),
(36, 23, 'sd'),
(37, 24, 'asd'),
(38, 25, 'sd'),
(39, 22, 'ff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_perusahaan`
--

CREATE TABLE `tbl_perusahaan` (
  `id_perusahaan` int(10) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `bidang` char(25) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_perusahaan`
--

INSERT INTO `tbl_perusahaan` (`id_perusahaan`, `nama_perusahaan`, `bidang`, `alamat`) VALUES
(1, 'Kami', 'akan', 'Mendampingimu selalu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(128) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `blokir` enum('N','Y') DEFAULT NULL,
  `id_sessions` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama_lengkap`, `username`, `password`, `email`, `level`, `blokir`, `id_sessions`) VALUES
(0, 'Alek', 'alek', 'alek', 'alek@gmail.com', 'alumni', 'N', '1'),
(1, 'Arie Andreana', 'admin', 'admin', 'arieandreanataufiq1@gmail.com', 'admin', 'N', '1'),
(2, 'Dewi Rosmalia', 'dosen', 'dosen', 'dosen@gmail.com', 'admin', 'N', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_alumni`
--
ALTER TABLE `tbl_alumni`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `tbl_jawaban`
--
ALTER TABLE `tbl_jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indeks untuk tabel `tbl_kuisioner`
--
ALTER TABLE `tbl_kuisioner`
  ADD PRIMARY KEY (`id_kuisioner`);

--
-- Indeks untuk tabel `tbl_lowongan`
--
ALTER TABLE `tbl_lowongan`
  ADD PRIMARY KEY (`id_lowongan`);

--
-- Indeks untuk tabel `tbl_pertanyaan`
--
ALTER TABLE `tbl_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indeks untuk tabel `tbl_perusahaan`
--
ALTER TABLE `tbl_perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_kuisioner`
--
ALTER TABLE `tbl_kuisioner`
  MODIFY `id_kuisioner` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tbl_lowongan`
--
ALTER TABLE `tbl_lowongan`
  MODIFY `id_lowongan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_pertanyaan`
--
ALTER TABLE `tbl_pertanyaan`
  MODIFY `id_pertanyaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `tbl_perusahaan`
--
ALTER TABLE `tbl_perusahaan`
  MODIFY `id_perusahaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
