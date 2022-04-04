-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Apr 2022 pada 05.49
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mylibraryou`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `selectAnggota` ()  BEGIN
	SELECT name, email FROM anggotas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectBuku` ()  BEGIN
    SELECT judul, penulis FROM bukus;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectUser` ()  BEGIN
	SELECT name, email from users;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggotas`
--

CREATE TABLE `anggotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anggotas`
--

INSERT INTO `anggotas` (`id`, `kode`, `name`, `email`, `deleted_at`, `created_at`, `updated_at`) VALUES
(18, 'AGP2022033012030018', NULL, 'test@gmail.com', '2022-03-30 05:08:48', '2022-03-30 05:07:00', '2022-03-30 05:08:48'),
(19, 'AGP2022033012034019', 'test', 'test@test', NULL, '2022-03-30 05:08:40', '2022-03-30 05:08:40'),
(20, 'AGP2022040402042120', 'Ilham', 'ilham@gmail.com', NULL, '2022-04-03 19:05:21', '2022-04-03 19:05:21'),
(21, 'AGP2022040402044821', 'coba', 'coba@gmail.com', NULL, '2022-04-03 19:35:48', '2022-04-03 19:35:48'),
(22, 'AGP2022040402041522', 'abc', 'abc@gmail.com', NULL, '2022-04-03 19:41:15', '2022-04-03 19:41:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auto_numbers`
--

CREATE TABLE `auto_numbers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukus`
--

CREATE TABLE `bukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sinopsis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thn_terbit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_buku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_buku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `baca_buku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kondisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bukus`
--

INSERT INTO `bukus` (`id`, `kode`, `penerbit`, `penulis`, `judul`, `kategori_id`, `sinopsis`, `thn_terbit`, `jumlah_buku`, `cover_buku`, `baca_buku`, `kondisi`, `deleted_at`, `created_at`, `updated_at`) VALUES
(17, 'B8K2022033011035917', 'PT Bentang Pustaka', 'Andrea Hirata', 'Sebelas Patriot', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2011', '20', 'assets/buku/cover/7l3GjoV7iZLB953bEbwzH9dvWvTj4jCC1AGfrna8.png', 'assets/buku/naskah/9OZ9OYuHrYJiCGjqaBpZiOuLZem6B5m3B4vUaNWM.pdf', NULL, NULL, NULL, NULL),
(18, 'B8K2022033011035918', 'PT Bentang Pustaka', 'Andrea Hirata', 'Laskar Pelangi', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2005-06', '19', 'assets/buku/cover/9uHXFJc8bqKLO5JBFeiA9LOpg2bVRyMUaEaHoxZc.jpg', NULL, NULL, NULL, NULL, NULL),
(19, NULL, 'test', 'test', 'test', '2', 'test', '2004-06', '10', 'assets/buku/cover/WWDyCshIPbZFq3MdIs0cC1GxnJOYagXF1Y2DZJ9E.jpg', NULL, NULL, '2022-03-30 04:45:06', NULL, NULL),
(20, 'B8K2022033011030120', 'test', 'test', 'halo', '2', 'test', '2004-06', '10', 'assets/buku/cover/La6rdj5RAVbwNPqHC9wllxqH2jaWQhTUWS7Ol60n.jpg', NULL, NULL, '2022-03-30 04:45:43', NULL, NULL),
(21, 'B8K2022033011034621', 'test', 'test', 'test aja cok', '1', 'test', '2004-06', '21', 'assets/buku/cover/c2q0GBa0tCMyWKmkJVNKwMyjspiYKrtFhr5Rmsdj.jpg', NULL, NULL, '2022-03-30 04:53:38', NULL, NULL),
(22, 'B8K2022033110030722', 'Hasta Mitra', 'Pramoedya Ananta Toer', 'Bumi Manusia', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '1980-08', '25', 'assets/buku/cover/zcQYBGF9bXnWZsl9gYuA8k3LxtKbM0bc3JfU6kcK.jpg', 'assets/buku/naskah/33e4ttJjBz255qyWy4mM3y809PcPIRfCXCIe3J4B.pdf', NULL, NULL, NULL, NULL),
(23, 'B8K2022033110031023', 'Gramedia', 'Salman Aristo', 'Negeri 5 Menara', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2009-07', '20', 'assets/buku/cover/3vHXlEH0p46Ep91TxiLz2igzphdekGgCxbaPWN6u.jpg', 'assets/buku/naskah/x6WxhxvHZCG6coCZ63W3Vt4WZms60gd57WRmgxxR.pdf', NULL, NULL, NULL, NULL),
(24, 'B8K2022033110031224', 'Pastels Book', 'Pidi Baiq', 'Dilan', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2014-04', '50', 'assets/buku/cover/IN3HSU0MCdD4WSP2WHodyIW62hfjpWhtUX6hR9Vl.jpg', 'assets/buku/naskah/H8MZCHiXCZvRsN9HQcsHt3iW98NOtJGX1iWtLB2B.pdf', NULL, NULL, NULL, NULL),
(25, 'B8K2022033110033125', 'Republika', 'Tere Liye', 'Rindu', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2014-09', '20', 'assets/buku/cover/PX7TIvFic2jups8VYQ3iP7JtWrjCwBIYXFhIvtmY.jpg', NULL, NULL, NULL, NULL, NULL),
(26, 'B8K2022033110035026', 'PT Bentang Pustaka', 'Andrea Hirata', 'Ayah', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2015-05', '30', 'assets/buku/cover/u5mnn5wzPAOQsIu81Y5pJ3na1xusAB0QSvO5hYsX.jpg', NULL, NULL, NULL, NULL, NULL),
(27, 'B8K2022033110033927', 'Grasindo', 'Donny Dhirgantoro', '5 cm', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2005-02', '25', 'assets/buku/cover/lruN4mA1jvdYKm6MeAJvvKbmPqYpTWQHihWVXBnS.jpg', NULL, NULL, NULL, NULL, NULL);

--
-- Trigger `bukus`
--
DELIMITER $$
CREATE TRIGGER `delete_buku` AFTER DELETE ON `bukus` FOR EACH ROW BEGIN
	INSERT INTO log_buku (keterangan, waktu, judul, penerbit, penulis, kategori_id, jumlah_buku, user)
    VALUES('Delete', now(), old.judul, old.penerbit, old.penulis, old.kategori_id, old.jumlah_buku, "Pustakawan");
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_buku` AFTER INSERT ON `bukus` FOR EACH ROW BEGIN
	INSERT INTO log_buku (keterangan, waktu, judul, penerbit, penulis, kategori_id, jumlah_buku, user)
    VALUES('Insert', now(), new.judul, new.penerbit, new.penulis, new.kategori_id, new.jumlah_buku, "Pustakawan");
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dendas`
--

CREATE TABLE `dendas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaksi_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buku_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anggota_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama`, `lokasi`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Novel', 'Lantai 2 rak A sampai  C', NULL, '2022-03-14 05:18:12', '2022-03-14 05:18:12'),
(2, 'Komik', 'Lantai 2 Rak D dan E', NULL, '2022-03-14 05:19:02', '2022-03-14 05:19:02'),
(3, 'Ensiklopedia', 'Lantai 2 Rak F sampai H', NULL, '2022-03-14 05:19:37', '2022-03-14 05:19:37'),
(4, 'Manga', 'Lantai 3 Rak 2', NULL, '2022-03-28 18:49:40', '2022-03-28 18:49:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_buku`
--

CREATE TABLE `log_buku` (
  `id_log` int(5) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `kategori_id` varchar(255) NOT NULL,
  `jumlah_buku` int(10) NOT NULL,
  `user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_buku`
--

INSERT INTO `log_buku` (`id_log`, `keterangan`, `waktu`, `judul`, `penerbit`, `penulis`, `kategori_id`, `jumlah_buku`, `user`) VALUES
(1, 'Insert', '2022-03-15 13:24:34', 'Ayah', 'PT Bentang Pustaka', 'Andrea Hirata', '1', 27, ''),
(2, 'Insert', '2022-03-15 13:50:54', 'Ayah', 'Bentang Pustaka', 'Andrea Hirata', '1', 27, ''),
(3, 'Delete', '2022-03-15 13:51:33', 'Ayah', 'Bentang Pustaka', 'Andrea Hirata', '1', 27, ''),
(4, 'Insert', '2022-03-16 07:30:58', 'testt', 'test', 'test', '1', 12, ''),
(5, 'Insert', '2022-03-16 07:35:26', '1', 'test', '1', '1', 20, ''),
(6, 'Insert', '2022-03-16 13:38:11', 'Bumi Manusia', 'Lentera Dipantara', 'Pramoedya Ananta Toer', '1', 16, ''),
(7, 'Insert', '2022-03-16 13:39:41', 'Negeri 5 Negara', 'PT Gramedia Pusat Utama', 'Ahmad Fuadi', '1', 18, ''),
(8, 'Insert', '2022-03-16 13:41:18', 'Dilan', 'PT Mizan Pustaka', 'Pidi Baiq', '1', 28, ''),
(9, 'Insert', '2022-03-16 13:45:08', 'Rindu', 'Republika', 'Tere Liye', '1', 20, ''),
(10, 'Insert', '2022-03-16 13:47:35', 'The Midnight Library', 'Gramedia Pustaka Utama', 'Matt Haig', '1', 25, ''),
(11, 'Insert', '2022-03-16 13:48:25', 'Ayah', 'Bentang Pustaka', 'Andrea Hirata', '1', 20, ''),
(12, 'Insert', '2022-03-16 13:59:54', 'Ayah', 'Bentang Pustaka', 'Andrea Hirata', '1', 28, 'root@localhost'),
(13, 'Insert', '2022-03-16 14:52:00', 'Ayah', 'PT Bentang Pustaka', 'Andrea Hirata', '1', 27, ''),
(14, 'Insert', '2022-03-16 14:53:21', 'Ayah', 'PT Bentang Pustaka', 'Andrea Hirata', '1', 28, 'root@localhost'),
(15, 'Delete', '2022-03-16 14:56:34', 'Ayah', 'PT Bentang Pustaka', 'Andrea Hirata', '1', 28, ''),
(16, 'Insert', '2022-03-16 15:32:25', 'Ayah', 'PT Bentang Pustaka', 'Andrea Hirata', '1', 28, 'root@localhost'),
(17, 'Delete', '2022-03-22 07:59:33', 'Ayah', 'PT Bentang Pustaka', 'Andrea Hirata', '1', 27, ''),
(18, 'Delete', '2022-03-22 07:59:36', 'Ayah', 'Bentang Pustaka', 'Andrea Hirata', '1', 28, ''),
(19, 'Delete', '2022-03-22 07:59:39', 'Ayah', 'Bentang Pustaka', 'Andrea Hirata', '1', 20, ''),
(20, 'Delete', '2022-03-22 07:59:57', 'Ayah', 'PT Bentang Pustaka', 'Andrea Hirata', '1', 27, ''),
(21, 'Insert', '2022-03-25 10:33:22', 'a', 'b', 'c', '1', 21, 'Pustakawan'),
(22, 'Insert', '2022-03-25 22:49:51', 'cek', 'cek', 'cek', '1', 10, 'Pustakawan'),
(23, 'Insert', '2022-03-26 00:37:43', 'ensi', 'ensi', 'ensi', '2', 10, 'Pustakawan'),
(24, 'Insert', '2022-03-26 13:36:20', 'aa', 'bb', 'cc', '2', 22, 'Pustakawan'),
(25, 'Delete', '2022-03-27 11:17:56', '1', 'test', '1', '1', 20, ''),
(26, 'Insert', '2022-03-29 07:30:38', 'Laskar Pelangi', 'PT Bentang Pustaka', 'Andrea Hirata', '1', 15, 'Pustakawan'),
(27, 'Insert', '2022-03-29 08:48:19', 'aa', 'bb', 'cc', '2', 10, 'Pustakawan'),
(28, 'Insert', '2022-03-29 09:00:42', 'contoh', 'contoh', 'contoh', '4', 15, 'Pustakawan'),
(29, 'Insert', '2022-03-29 09:12:28', 's', 's', 's', '1', 1, 'Pustakawan'),
(30, 'Insert', '2022-03-29 09:44:21', 'pelangi', 'gramedia', 'loganue', '1', 12, 'Pustakawan'),
(31, 'Insert', '2022-03-30 18:03:07', 'test aja', 'test aja', 'test aja', '2', 10, 'Pustakawan'),
(32, 'Insert', '2022-03-30 18:12:59', 'Sebelas Patriot', 'PT Bentang Pustaka', 'Andrea Hirata', '1', 20, 'Pustakawan'),
(33, 'Insert', '2022-03-30 18:36:59', 'Laskar Pelangi', 'PT Bentang Pustaka', 'Andrea Hirata', '1', 20, 'Pustakawan'),
(34, 'Insert', '2022-03-30 18:44:13', 'test', 'test', 'test', '2', 10, 'Pustakawan'),
(35, 'Insert', '2022-03-30 18:45:01', 'test', 'test', 'test', '2', 10, 'Pustakawan'),
(36, 'Update', '2022-03-30 18:45:01', 'test', 'test', 'test', '2', 10, 'Pustakawan'),
(37, 'Update', '2022-03-30 18:45:06', 'test', 'test', 'test', '2', 10, 'Pustakawan'),
(38, 'Update', '2022-03-30 18:45:35', 'halo', 'test', 'test', '2', 10, 'Pustakawan'),
(39, 'Update', '2022-03-30 18:45:43', 'halo', 'test', 'test', '2', 10, 'Pustakawan'),
(40, 'Insert', '2022-03-30 18:49:46', 'test aja cok', 'test', 'test', '1', 21, 'Pustakawan'),
(41, 'Update', '2022-03-30 18:49:46', 'test aja cok', 'test', 'test', '1', 21, 'Pustakawan'),
(42, 'Insert', '2022-03-31 17:32:07', 'Bumi Manusia', 'Hasta Mitra', 'Pramoedya Ananta Toer', '1', 25, 'Pustakawan'),
(43, 'Insert', '2022-03-31 17:34:10', 'Negeri 5 Menara', 'Gramedia', 'Salman Aristo', '1', 20, 'Pustakawan'),
(44, 'Insert', '2022-03-31 17:37:12', 'Dilan', 'Pastels Book', 'Pidi Baiq', '1', 50, 'Pustakawan'),
(45, 'Insert', '2022-03-31 17:38:31', 'Rindu', 'Republika', 'Tere Liye', '1', 20, 'Pustakawan'),
(46, 'Insert', '2022-03-31 17:40:50', 'Ayah', 'PT Bentang Pustaka', 'Andrea Hirata', '1', 30, 'Pustakawan'),
(47, 'Insert', '2022-03-31 17:44:39', '5 cm', 'Grasindo', 'Donny Dhirgantoro', '1', 25, 'Pustakawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_transaksi`
--

CREATE TABLE `log_transaksi` (
  `id_log` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL,
  `buku_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_pinjam` varchar(255) NOT NULL,
  `tgl_hrs_kembali` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_transaksi`
--

INSERT INTO `log_transaksi` (`id_log`, `keterangan`, `waktu`, `buku_id`, `user_id`, `tgl_pinjam`, `tgl_hrs_kembali`) VALUES
(1, 'Insert', '2022-03-15 13:43:50', 2, 2, '2022-03-15', '2022-03-25'),
(2, 'Insert', '2022-03-15 13:32:49', 3, 6, '2022-03-15', '2022-03-25'),
(3, 'Insert', '2022-03-15 13:41:57', 3, 6, '2022-03-15', '2022-03-25'),
(4, 'Insert', '2022-03-15 13:45:51', 2, 6, '2022-03-15', '2022-03-25'),
(5, 'Insert', '2022-03-25 07:45:49', 7, 8, '2022-03-25', '2022-04-04'),
(6, 'Insert', '2022-03-25 22:55:21', 11, 8, '2022-03-25', '2022-04-04'),
(7, 'Insert', '2022-03-26 13:20:08', 9, 6, '2022-03-26', '2022-04-05'),
(8, 'Insert', '2022-03-29 07:34:25', 11, 11, '2022-03-29', '2022-04-08'),
(9, 'Insert', '2022-03-29 07:41:20', 9, 9, '2022-03-29', '2022-04-08'),
(10, 'Insert', '2022-03-29 08:48:55', 6, 3, '2022-03-29', '2022-04-08'),
(11, 'Insert', '2022-03-29 09:45:01', 4, 10, '2022-03-29', '2022-04-08'),
(12, 'Insert', '2022-03-29 10:19:47', 7, 6, '2022-03-29', '2022-04-08'),
(13, 'Insert', '2022-03-29 10:38:11', 11, 15, '2022-03-29', '2022-04-08'),
(14, 'Insert', '2022-03-29 10:38:22', 7, 15, '2022-03-29', '2022-04-08'),
(15, 'Insert', '2022-03-30 18:16:34', 17, 9, '2022-03-30', '2022-04-09'),
(16, 'Insert', '2022-03-30 18:57:19', 18, 18, '2022-03-30', '2022-04-09'),
(17, 'Insert', '2022-03-31 17:28:49', 18, 18, '2022-03-31', '2022-04-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2017_08_03_055212_create_auto_numbers', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_19_122815_create_permission_tables', 1),
(5, '2021_06_02_085244_create_anggotas_table', 1),
(6, '2022_01_22_072707_create_chart_table', 1),
(7, '2022_02_01_040444_create_dendas_table', 1),
(8, '2022_02_04_085317_create_kategoris_table', 1),
(9, '2022_02_08_093222_add_parent_id_to_permissions_tables', 1),
(10, '2022_02_10_070644_create_transaksis_table', 1),
(11, '2022_02_21_052520_create_users_table', 1),
(12, '2022_03_04_031538_create_bukus_table', 1),
(13, '2022_03_28_031843_create_transaksis_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 17),
(8, 'App\\Models\\User', 18),
(8, 'App\\Models\\User', 20),
(8, 'App\\Models\\User', 21),
(8, 'App\\Models\\User', 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `parent_id`) VALUES
(1, 'users', 'web', '2022-03-10 21:21:32', '2022-03-10 21:21:32', NULL),
(2, 'list users', 'web', '2022-03-10 21:21:32', '2022-03-10 21:21:32', 1),
(3, 'create users', 'web', '2022-03-10 21:21:33', '2022-03-10 21:21:33', 1),
(4, 'edit users', 'web', '2022-03-10 21:21:33', '2022-03-10 21:21:33', 1),
(5, 'delete users', 'web', '2022-03-10 21:21:34', '2022-03-10 21:21:34', 1),
(6, 'pinjam', 'web', '2022-03-10 21:21:34', '2022-03-10 21:21:34', NULL),
(7, 'list pinjam', 'web', '2022-03-10 21:21:34', '2022-03-10 21:21:34', 6),
(8, 'create pinjam', 'web', '2022-03-10 21:21:34', '2022-03-10 21:21:34', 6),
(9, 'edit pinjam', 'web', '2022-03-10 21:21:34', '2022-03-10 21:21:34', 6),
(10, 'delete pinjam', 'web', '2022-03-10 21:21:34', '2022-03-10 21:21:34', 6),
(11, 'denda', 'web', '2022-03-10 21:21:35', '2022-03-10 21:21:35', NULL),
(12, 'list denda', 'web', '2022-03-10 21:21:35', '2022-03-10 21:21:35', 11),
(13, 'create denda', 'web', '2022-03-10 21:21:35', '2022-03-10 21:21:35', 11),
(14, 'edit denda', 'web', '2022-03-10 21:21:35', '2022-03-10 21:21:35', 11),
(15, 'delete denda', 'web', '2022-03-10 21:21:35', '2022-03-10 21:21:35', 11),
(16, 'anggota', 'web', '2022-03-10 21:21:35', '2022-03-10 21:21:35', NULL),
(17, 'list anggota', 'web', '2022-03-10 21:21:35', '2022-03-10 21:21:35', 16),
(18, 'create anggota', 'web', '2022-03-10 21:21:36', '2022-03-10 21:21:36', 16),
(19, 'edit anggota', 'web', '2022-03-10 21:21:36', '2022-03-10 21:21:36', 16),
(20, 'delete anggota', 'web', '2022-03-10 21:21:36', '2022-03-10 21:21:36', 16),
(21, 'kategori', 'web', '2022-03-10 21:21:36', '2022-03-10 21:21:36', NULL),
(22, 'list kategori', 'web', '2022-03-10 21:21:36', '2022-03-10 21:21:36', 21),
(23, 'create kategori', 'web', '2022-03-10 21:21:36', '2022-03-10 21:21:36', 21),
(24, 'edit kategori', 'web', '2022-03-10 21:21:36', '2022-03-10 21:21:36', 21),
(25, 'delete kategori', 'web', '2022-03-10 21:21:37', '2022-03-10 21:21:37', 21),
(26, 'buku', 'web', '2022-03-10 21:21:37', '2022-03-10 21:21:37', NULL),
(27, 'list buku', 'web', '2022-03-10 21:21:37', '2022-03-10 21:21:37', 26),
(28, 'create buku', 'web', '2022-03-10 21:21:37', '2022-03-10 21:21:37', 26),
(29, 'edit buku', 'web', '2022-03-10 21:21:38', '2022-03-10 21:21:38', 26),
(30, 'delete buku', 'web', '2022-03-10 21:21:38', '2022-03-10 21:21:38', 26),
(31, 'transaksi', 'web', '2022-03-10 21:21:38', '2022-03-10 21:21:38', NULL),
(32, 'list transaksi', 'web', '2022-03-10 21:21:38', '2022-03-10 21:21:38', 31),
(33, 'create transaksi', 'web', '2022-03-10 21:21:38', '2022-03-10 21:21:38', 31),
(34, 'edit transaksi', 'web', '2022-03-10 21:21:39', '2022-03-10 21:21:39', 31),
(35, 'delete transaksi', 'web', '2022-03-10 21:21:39', '2022-03-10 21:21:39', 31),
(36, 'permission', 'web', '2022-03-10 21:21:39', '2022-03-10 21:21:39', NULL),
(37, 'list permission', 'web', '2022-03-10 21:21:39', '2022-03-10 21:21:39', 36),
(38, 'create permission', 'web', '2022-03-10 21:21:40', '2022-03-10 21:21:40', 36),
(39, 'edit permission', 'web', '2022-03-10 21:21:40', '2022-03-10 21:21:40', 36),
(40, 'delete permission', 'web', '2022-03-10 21:21:41', '2022-03-10 21:21:41', 36),
(41, 'listkategori', 'web', '2022-03-10 21:21:41', '2022-03-10 21:21:41', NULL),
(42, 'dashboard', 'web', '2022-03-10 21:21:41', '2022-03-10 21:21:41', NULL),
(43, 'beranda', 'web', '2022-03-10 21:21:41', '2022-03-10 21:21:41', NULL),
(44, 'book', 'web', '2022-03-10 21:21:41', '2022-03-10 21:21:41', NULL),
(45, 'histori', 'web', '2022-03-10 21:21:41', '2022-03-10 21:21:41', NULL),
(46, 'pengaturan halaman depan', 'web', '2022-03-10 21:21:41', '2022-03-10 21:21:41', NULL),
(47, 'profile', 'web', '2022-03-10 21:21:42', '2022-03-10 21:21:42', NULL),
(48, 'settings', 'web', '2022-03-10 21:21:42', '2022-03-10 21:21:42', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'web', '2022-03-10 21:21:31', '2022-03-10 21:21:31'),
(7, 'Pustakawan', 'web', '2022-03-30 04:39:13', '2022-03-30 04:39:13'),
(8, 'Anggota', 'web', '2022-03-30 04:56:45', '2022-03-30 04:56:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(6, 7),
(7, 1),
(7, 7),
(8, 1),
(8, 7),
(9, 1),
(9, 7),
(10, 1),
(10, 7),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(16, 7),
(17, 1),
(17, 7),
(18, 1),
(18, 7),
(19, 1),
(19, 7),
(20, 1),
(20, 7),
(21, 1),
(21, 7),
(22, 1),
(22, 7),
(23, 1),
(23, 7),
(24, 1),
(24, 7),
(25, 1),
(25, 7),
(26, 1),
(26, 7),
(27, 1),
(27, 7),
(27, 8),
(28, 1),
(28, 7),
(29, 1),
(29, 7),
(30, 1),
(30, 7),
(31, 1),
(31, 7),
(32, 1),
(32, 7),
(33, 1),
(33, 7),
(34, 1),
(34, 7),
(35, 1),
(35, 7),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(42, 7),
(43, 1),
(43, 7),
(43, 8),
(44, 1),
(44, 7),
(44, 8),
(45, 1),
(45, 8),
(46, 1),
(46, 7),
(47, 1),
(47, 7),
(48, 1),
(48, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buku_id` int(11) DEFAULT NULL,
  `anggota_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tgl_pinjam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_hrs_kembali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_pengembalian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksis`
--

INSERT INTO `transaksis` (`id`, `kode`, `buku_id`, `anggota_id`, `user_id`, `tgl_pinjam`, `tgl_hrs_kembali`, `tgl_pengembalian`, `deleted_at`, `created_at`, `updated_at`) VALUES
(19, 'TR2022033011031919', 18, NULL, 18, '2022-03-30', '2022-04-09', NULL, '2022-03-31 03:28:41', '2022-03-30 04:57:19', '2022-03-31 03:28:41'),
(20, 'TR2022033110034920', 18, NULL, 18, '2022-03-31', '2022-04-10', NULL, NULL, '2022-03-31 03:28:49', '2022-03-31 03:28:49');

--
-- Trigger `transaksis`
--
DELIMITER $$
CREATE TRIGGER `insert_transaksi` AFTER INSERT ON `transaksis` FOR EACH ROW BEGIN
	INSERT INTO log_transaksi (keterangan, waktu, buku_id, user_id, tgl_pinjam, tgl_hrs_kembali)
    VALUES('Insert', now(), new.buku_id, new.user_id, new.tgl_pinjam, new.tgl_hrs_kembali);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `alamat`, `telepon`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '-', '-', 'admin@admin.com', NULL, '$2y$10$QP2ebxnmJgnBOdiumtFvtOvEOuhTgItIwfPIpWA9ZiZYF1Ywp5EgO', NULL, '2022-03-10 21:21:50', '2022-04-03 19:09:47'),
(17, 'Pustakawan', '-', '-', 'pustakawan@pustakawan.com', NULL, '$2y$10$x7X2UShmBFgXD/7ZFHasnON2BXhsc.U6ecR1.Ca1QaODQ/dX0q6hi', NULL, '2022-03-30 04:39:39', '2022-03-30 04:39:39'),
(18, 'Anugrah Akbar Pribadi', 'Bandung', '085926057247', 'anugrahpribadi09@gmail.com', NULL, '$2y$10$C9Rsx.tj2dzqCg.RNCjGI.ptu1N42oov9oBAD/Iuz69BfDMgTxyAW', NULL, '2022-03-30 04:57:12', '2022-04-03 19:11:13'),
(20, 'Pribadi', '', '', 'test@test.com', NULL, '$2y$10$oK7rlVDPwolkm/8FEqjQj.M.yiph3gWdj43MMKaSMUc4TW24gi/LK', NULL, '2022-03-30 05:08:40', '2022-04-03 19:03:58'),
(21, 'Ilham', 'Magelang', '082118969357', 'ilham@gmail.com', NULL, '$2y$10$nApJxbcGljh/qLDybzqiM.1qCCsy5/htXpmkkue6bHus1IyJvVgFy', NULL, '2022-04-03 19:05:21', '2022-04-03 20:02:02'),
(22, 'coba', 'Aceh', '081220070121', 'coba@gmail.com', NULL, '$2y$10$fjdXeOMYxUMkHAw6MdEhReVYodf8ZKgfIJnTeLQbzG9w3cquM5G4y', NULL, '2022-04-03 19:35:48', '2022-04-03 19:36:46');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggotas`
--
ALTER TABLE `anggotas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auto_numbers`
--
ALTER TABLE `auto_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bukus`
--
ALTER TABLE `bukus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dendas`
--
ALTER TABLE `dendas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_buku`
--
ALTER TABLE `log_buku`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `log_transaksi`
--
ALTER TABLE `log_transaksi`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggotas`
--
ALTER TABLE `anggotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `auto_numbers`
--
ALTER TABLE `auto_numbers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bukus`
--
ALTER TABLE `bukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `dendas`
--
ALTER TABLE `dendas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `log_buku`
--
ALTER TABLE `log_buku`
  MODIFY `id_log` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `log_transaksi`
--
ALTER TABLE `log_transaksi`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
