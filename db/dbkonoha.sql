-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2025 pada 06.10
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
(7, 'Kesehatan'),
(14, 'Layanan'),
(2, 'Sosial'),
(1, 'Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_admin`
--

CREATE TABLE `log_admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `log_admin`
--

INSERT INTO `log_admin` (`id_admin`, `email`, `password`) VALUES
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
(4, 'budiono siregar', '345435367458', 1, 'Jalan rusak', 'banyak jalan yang rusak', '6851c14348e3c.png', '2025-06-17 19:25:55', 'ditolak'),
(5, 'Wulan', '08244472898', 2, 'Tenaga kesehatannya kurang prefesional di puskes', 'Perawat di puskes gudes, tidak melayani dengan baik', NULL, '2025-06-18 05:52:30', 'menunggu'),
(6, 'Anita', '67890234820', 3, 'CCTV desa mati', 'CCTV desa mati jadi kalo ada maling gk keliatan kayak kemarin', NULL, '2025-06-18 05:54:14', 'menunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_desa`
--

CREATE TABLE `profil_desa` (
  `id_profil` int(11) NOT NULL,
  `gambar` varchar(225) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profil_desa`
--

INSERT INTO `profil_desa` (`id_profil`, `gambar`, `deskripsi`) VALUES
(1, '685cad81355bc.jpeg', 'Desa konoha merupakan desa tempat orang orang melakukan korupsi.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `tanggal_berita` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deskripsi` text DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `gambar`, `judul`, `tanggal_berita`, `deskripsi`, `id_admin`) VALUES
(21, '6851db0eaee66.png', 'Mantan kepala desa konoha diduga telah melakukan korupsi selama masa pemerintahanya', '2025-06-24 11:22:55', 'Sed feugiat eu dui ut aliquam. Ut tincidunt lacinia erat, in vulputate lectus ultricies vitae. Nulla dignissim mi semper, ornare metus sed, accumsan eros. Phasellus rutrum consequat mauris eu sollicitudin. Sed vitae vestibulum felis, vel fringilla ipsum. Cras in lacinia lectus. Nulla ultricies lacinia metus, tincidunt pharetra tellus tincidunt quis. Sed quam ex, dapibus sit amet justo id, convallis auctor lacus. Nullam a est quam. Nam euismod vitae velit eu sodales. Nunc sed tincidunt mauris, a elementum nibh.\r\n\r\nPhasellus sed tortor interdum, feugiat orci non, hendrerit mauris. Proin vel mauris at felis varius mollis vel ut diam. In et eleifend magna. Maecenas sodales, purus sit amet pulvinar efficitur, est magna gravida mauris, dignissim dictum nisl nunc nec est. Donec convallis risus aliquet, gravida purus in, condimentum risus. Etiam eget est faucibus, laoreet leo nec, blandit risus. Phasellus nunc metus, blandit sed mauris et, facilisis semper odio. Proin arcu purus, dictum vitae enim vitae, varius elementum dui. Nam varius aliquet diam, at aliquam odio gravida a. Donec fringilla, augue vel venenatis maximus, nisl lectus feugiat ipsum, a vestibulum leo orci ac dolor. Aliquam eget lacus ac est porttitor volutpat. Nullam a urna quis libero tristique commodo eget et enim. Sed a mauris vel orci porta rutrum ac ac turpis. In hac habitasse platea dictumst. Donec fermentum nulla eu augue ullamcorper tempus. Integer fermentum, tellus eget elementum tincidunt, mauris dui porta velit, nec pellentesque ligula arcu at lectus', NULL),
(22, '685246824403c.jpg', 'Panen Raya Desa Konoha ', '2025-06-23 12:34:57', 'Panen padi serentak, Desa Konoha terpilih menjadi tuan rumah panen raya sereektak 2025\r\nProgram ini mengungkap pentingnya perhatian di sektor pertanian, khususnya padi. Dan Desa Konoha adalah salah satu Desa yang menjadi lumbung padi Nasional', NULL),
(23, '685248cdd55ad.jpeg', 'Kerja Bakti ', '2025-06-24 11:24:32', 'Pada 18 Juni 2025, Desa Konoha telah melaksanakan kerja bakti untuk memperbaiki jalan. Selain memperbaiki jalan program kerja bakti juga mempererat silahturahmi antar warga desa.;.', NULL),
(24, '685a8bc6163f1.jpg', 'Penghargaan Desa Konohaa', '2025-06-24 11:28:06', 'Pada tanggal 15 Juli 2025, Desa konoha mendapat penghargaan Desa tebaik dalam pengelolaan dan pendistribusian dana desa.', NULL);

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
  ADD PRIMARY KEY (`id_profil`);

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
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `log_admin`
--
ALTER TABLE `log_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `profil_desa`
--
ALTER TABLE `profil_desa`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
