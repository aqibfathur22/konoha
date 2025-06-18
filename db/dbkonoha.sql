-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2025 pada 23.54
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
-- Database: `dbkonoha`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoripengaduan`
--

CREATE TABLE `kategoripengaduan` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategoripengaduan`
--

INSERT INTO `kategoripengaduan` (`id_kategori`, `nama_kategori`) VALUES
(3, 'Keamanan'),
(4, 'Kesehatan'),
(2, 'Sosial'),
(1, 'Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_admin`
--

CREATE TABLE `log_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `log_admin`
--

INSERT INTO `log_admin` (`id_admin`, `nama`, `password`) VALUES
(1, 'anhar24@students.amikom.ac.id', '12345678'),
(2, 'admin', '12345678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `nama_pelapor` varchar(255) NOT NULL,
  `nomor_telepon` varchar(25) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul_pengaduan` varchar(255) NOT NULL,
  `detail_pengaduan` text NOT NULL,
  `path_lampiran` varchar(255) DEFAULT NULL,
  `tanggal_dikirim` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('menunggu','diproses','selesai','ditolak') NOT NULL DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `nama_pelapor`, `nomor_telepon`, `id_kategori`, `judul_pengaduan`, `detail_pengaduan`, `path_lampiran`, `tanggal_dikirim`, `status`) VALUES
(1, 'Desi', '098904832423', 1, 'sampah berserakan', 'banyak sampah yang berserakan di jalan utara sehingga menyebabkan bau', '6851494163ea0.png', '2025-06-17 10:53:53', 'menunggu'),
(2, 'Fade', '2313123423123', 3, 'maling', 'banyak maling berkeliaran', '6851c0fe69a01.png', '2025-06-17 19:24:46', 'diproses'),
(3, 'jesse', '231312213213', 1, 'korup geden', 'pejabat korup 100t', '6851c11d080ac.png', '2025-06-17 19:25:17', 'selesai'),
(4, 'budiono siregar', '345435367458', 1, 'Jalan rusak', 'banyak jalan yang rusak', '6851c14348e3c.png', '2025-06-17 19:25:55', 'ditolak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_desa`
--

CREATE TABLE `profil_desa` (
  `id_profil` int(11) NOT NULL,
  `gambar` varchar(225) DEFAULT NULL,
  `judul` varchar(225) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `gambar` varchar(225) DEFAULT NULL,
  `judul` varchar(225) NOT NULL,
  `tanggal_berita` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deskripsi` text DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `gambar`, `judul`, `tanggal_berita`, `deskripsi`, `id_admin`) VALUES
(19, '685156381f00f.png', 'seorang pejabat diduga menggunakan jalur nepotisme', '2025-06-17 21:13:51', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ex turpis, semper non laoreet et, pellentesque vel nulla. Praesent semper eu turpis non mattis. Donec aliquet, quam nec aliquet luctus, ante dolor luctus mi, ac ullamcorper sem purus non lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Mauris vitae dui nulla. Donec gravida elementum nunc vitae hendrerit. Nulla odio diam, dictum nec imperdiet eget, varius sed orci. Proin vehicula leo urna, quis sollicitudin orci interdum vitae. Integer volutpat pretium sem, in porta purus maximus id. Vivamus sit amet iaculis erat, non dictum lorem. Praesent auctor leo nulla, gravida egestas purus dapibus nec. Quisque a arcu elementum, condimentum dolor sed, consequat nisi. Sed in venenatis eros, sit amet condimentum sapien.\n\nDonec vehicula ultricies nunc id lacinia. Proin laoreet sem sem. Sed eleifend dui non pretium ornare. Proin blandit eget est quis venenatis. Pellentesque nec imperdiet sapien. Sed pellentesque sed neque at viverra. Maecenas et sapien bibendum, accumsan leo ac, pulvinar lectus. Mauris a lacinia odio, ac volutpat odio.', NULL),
(20, '68515afe78b1e.png', 'wi wok de tok', '2025-06-17 12:09:34', 'not onle tok de tok', NULL),
(21, '6851db0eaee66.png', 'Mantan kepala desa konoha diduga telah melakukan korupsi selama masa pemerintahanya', '2025-06-17 21:15:58', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ex turpis, semper non laoreet et,\r\n                                    pellentesque vel nulla. Praesent semper eu turpis non mattis. Donec aliquet, quam nec aliquet luctus,\r\n                                    ante dolor luctus mi, ac ullamcorper sem purus non lorem. Vestibulum ante ipsum primis in faucibus orci\r\n                                    luctus et ultrices posuere cubilia curae; Mauris vitae dui nulla. Donec gravida elementum nunc vitae\r\n                                    hendrerit. Nulla odio diam, dictum nec imperdiet eget, varius sed orci. Proin vehicula leo urna, quis\r\n                                    sollicitudin orci interdum vitae. Integer volutpat pretium sem, in porta purus maximus id. Vivamus sit\r\n                                    amet iaculis erat, non dictum lorem. Praesent auctor leo nulla, gravida egestas purus dapibus nec.\r\n                                    Quisque a arcu elementum, condimentum dolor sed, consequat nisi. Sed in venenatis eros, sit amet\r\n                                    condimentum sapien.\r\n\r\nDonec vehicula ultricies nunc id lacinia. Proin laoreet sem sem. Sed eleifend dui non pretium ornare.\r\n                                    Proin blandit eget est quis venenatis. Pellentesque nec imperdiet sapien. Sed pellentesque sed neque at\r\n                                    viverra. Maecenas et sapien bibendum, accumsan leo ac, pulvinar lectus. Mauris a lacinia odio, ac\r\n                                    volutpat odio.', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_demografi`
--

CREATE TABLE `tb_demografi` (
  `id_demografi` int(11) NOT NULL,
  `penduduk` int(11) NOT NULL,
  `kepala_keluarga` int(11) NOT NULL,
  `perempuan` int(11) NOT NULL,
  `lakilaki` int(11) NOT NULL,
  `grafik` varchar(225) NOT NULL,
  `label` varchar(225) NOT NULL,
  `nilai` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keuangan`
--

CREATE TABLE `tb_keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `jumlah` decimal(19,2) NOT NULL,
  `tanggal` date NOT NULL,
  `rincian` text DEFAULT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategoripengaduan`
--
ALTER TABLE `kategoripengaduan`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `nama_kategori` (`nama_kategori`);

--
-- Indeks untuk tabel `log_admin`
--
ALTER TABLE `log_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `profil_desa`
--
ALTER TABLE `profil_desa`
  ADD PRIMARY KEY (`id_profil`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `tb_demografi`
--
ALTER TABLE `tb_demografi`
  ADD PRIMARY KEY (`id_demografi`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  ADD PRIMARY KEY (`id_keuangan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategoripengaduan`
--
ALTER TABLE `kategoripengaduan`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `log_admin`
--
ALTER TABLE `log_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `profil_desa`
--
ALTER TABLE `profil_desa`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_demografi`
--
ALTER TABLE `tb_demografi`
  MODIFY `id_demografi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategoripengaduan` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `profil_desa`
--
ALTER TABLE `profil_desa`
  ADD CONSTRAINT `profil_desa_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `log_admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD CONSTRAINT `tb_berita_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `log_admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `tb_demografi`
--
ALTER TABLE `tb_demografi`
  ADD CONSTRAINT `tb_demografi_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `log_admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  ADD CONSTRAINT `tb_keuangan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `log_admin` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
