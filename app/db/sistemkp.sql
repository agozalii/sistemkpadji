-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2024 pada 13.45
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemkp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_promosi`
--

CREATE TABLE `detail_promosi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_promosi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_promosi`
--

INSERT INTO `detail_promosi` (`id`, `id_promosi`, `id_produk`, `nama_produk`, `created_at`, `updated_at`) VALUES
(1, 'PS959', 'PR159', 'CONSINA AMAZE CI 077 KEMEJA TANGAN PENDEK', '2024-05-23 08:20:35', '2024-05-23 08:20:35'),
(2, 'PS959', 'PR386', 'FORESTER HMF-EI.008 HAMMOCK GUALTIERO KAIT', '2024-05-23 08:20:35', '2024-05-23 08:20:35'),
(6, 'PS869', 'PR641', 'FORESTER CLF 08443 CELANA THINSULATE .02', '2024-05-23 08:21:12', '2024-05-23 08:21:12'),
(7, 'PS869', 'PR864', 'CONSINA WINDSTOPPER GLOVES', '2024-05-23 08:21:12', '2024-05-23 08:21:12'),
(9, 'PS125', 'PR432', 'FORESTER 90065 TECTONA TAS CARRIRER RUCSACK 45L', '2024-05-23 08:21:50', '2024-05-23 08:21:50'),
(12, 'PS830', 'PR640', 'FORESTER TF 04392 JET CAP', '2024-05-23 08:23:20', '2024-05-23 08:23:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaksi_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promosi_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_produk` int(11) NOT NULL,
  `promo_value` int(11) DEFAULT NULL,
  `harga_promo` int(11) DEFAULT NULL,
  `jumlah_beli_produk` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `produk_id`, `transaksi_id`, `promosi_id`, `harga_produk`, `promo_value`, `harga_promo`, `jumlah_beli_produk`, `created_at`, `updated_at`) VALUES
(1, 'PR159', 'NT-20240523-133', 'PS959', 300000, 15, 255000, 1, '2024-05-23 08:24:21', '2024-05-23 08:24:21'),
(2, 'PR159', 'NT-20240523-179', 'PS959', 300000, 15, 255000, 1, '2024-05-23 08:24:54', '2024-05-23 08:24:54'),
(3, 'PR864', 'NT-20240523-179', 'PS869', 170000, 20, 136000, 2, '2024-05-23 08:24:54', '2024-05-23 08:24:54'),
(4, 'PR641', 'NT-20240523-328', 'PS869', 310000, 20, 248000, 2, '2024-05-23 08:25:36', '2024-05-23 08:25:36'),
(5, 'PR453', 'NT-20240523-251', NULL, 840000, 0, 0, 1, '2024-05-23 08:25:55', '2024-05-23 08:25:55'),
(6, 'PR641', 'NT-20240523-251', 'PS869', 310000, 20, 248000, 2, '2024-05-23 08:25:55', '2024-05-23 08:25:55'),
(7, 'PR640', 'NT-20240523-610', NULL, 180000, 0, 0, 3, '2024-05-23 08:26:37', '2024-05-23 08:26:37'),
(8, 'PR159', 'NT-20240530-642', 'PS959', 300000, 15, 255000, 2, '2024-05-29 18:33:34', '2024-05-29 18:33:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritiksaran`
--

CREATE TABLE `kritiksaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpon` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kritiksaran`
--

INSERT INTO `kritiksaran` (`id`, `nama`, `email`, `no_telpon`, `pesan`, `created_at`, `updated_at`) VALUES
(2, 'Adji Cahya', 'adjicahya@gmail.com', '08157656778', 'Pelayanan forester jakal sangat ramah, semua pegawainya murah senyum', NULL, NULL),
(3, 'Agus Susanto', 'agus.susanto@example.com', '08123456789', 'Produknya sangat lengkap dan harganya terjangkau', '2024-05-23 15:45:30', '2024-05-23 15:45:30'),
(4, 'Budi Santoso', 'budi.santoso@example.com', '08123456788', 'Tempatnya bagus sih sayang agak se1ikit kotor di depan', '2024-05-23 15:45:30', '2024-05-23 15:45:30'),
(5, 'Citra Wijaya', 'citra.wijaya@example.com', '08123456787', 'PArkirannya luas!', '2024-05-23 15:45:30', '2024-05-23 15:45:30'),
(6, 'Dewi Lestari', 'dewi.lestari@example.com', '08123456786', 'Udah berkali kali beli produk di sini dan gaperah nyesel sekalipun', '2024-05-23 15:45:30', '2024-05-23 15:45:30'),
(7, 'Eko Prasetyo', 'eko.prasetyo@example.com', '08123456785', 'Cobain sendiri', '2024-05-23 15:45:30', '2024-05-23 15:45:30'),
(8, 'Fita Rahmawati', 'fita.rahmawati@example.com', '08123456784', 'Harga lokal kualitas internasional!!', '2024-05-23 15:45:30', '2024-05-23 15:45:30'),
(9, 'cahya', 'adjicahya92@gmail.com', '08988877766', 'bagus', '2024-05-30 22:37:54', '2024-05-30 22:37:54');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_19_163750_create_produk_table', 1),
(6, '2024_04_22_171901_create_video_table', 1),
(7, '2024_04_22_191012_create_kritiksaran_table', 1),
(8, '2024_04_22_191214_create_promosi_table', 1),
(9, '2024_05_04_034546_create_transaksi_table', 1),
(10, '2024_05_04_034553_create_detail_transaksi_table', 1),
(11, '2024_05_15_173101_create_detail_promosi_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `kategori_produk` enum('Pakaian & Celana','Peralatan Outdoor','Peralatan Keamanan','Sepatu & Sandal','Ransel','Jaket & Jas Hujan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_produk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk_produk` enum('consina','forester') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_produk` enum('new arrival','lama') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `gambar_produk`, `nama_produk`, `harga_produk`, `kategori_produk`, `deskripsi_produk`, `merk_produk`, `status_produk`, `created_at`, `updated_at`) VALUES
('PR159', '20240522_CONSINA AMAZE CI 077 KEMEJA TANGAN PENDEK.jpeg', 'CONSINA AMAZE CI 077 KEMEJA TANGAN PENDEK', 300000, 'Pakaian & Celana', 'Kemeja dengan bahan yang nyaman dan meneyrap keringat', 'consina', 'lama', '2024-05-22 09:32:33', '2024-05-22 09:32:33'),
('PR386', '20240522_FORESTER HMF-EI.008 HAMMOCK GUALTIERO KAIT.jpeg', 'FORESTER HMF-EI.008 HAMMOCK GUALTIERO KAIT', 400000, 'Peralatan Outdoor', 'Hammock yang kokoh serta terjamin kualitasnya', 'forester', 'lama', '2024-05-22 09:45:18', '2024-05-22 09:45:18'),
('PR432', '20240522_FORESTER 90065 TECTONA TAS CARRIRER RUCSACK 45L.jpeg', 'FORESTER 90065 TECTONA TAS CARRIRER RUCSACK 45L', 850000, 'Ransel', 'Carrier yang cocok untuk segala kondisi pendakian', 'forester', 'lama', '2024-05-22 09:43:12', '2024-05-22 09:43:12'),
('PR453', '20240522_CONSINA SPTR 008 TRCKING FTR 01 GREY.jpg', 'CONSINA SPTR 008 TRCKING FTR 01 GREY', 840000, 'Sepatu & Sandal', 'sepatu yang awet', 'consina', 'lama', '2024-05-22 09:33:22', '2024-05-22 09:33:22'),
('PR640', '20240522_FORESTER TF 04392 JET CAP.jpeg', 'FORESTER TF 04392 JET CAP', 180000, 'Peralatan Outdoor', 'Topi yang trendy', 'forester', 'lama', '2024-05-22 09:46:23', '2024-05-22 09:46:23'),
('PR641', '20240522_FORESTER CLF 08443 CELANA THINSULATE .02.jpeg', 'FORESTER CLF 08443 CELANA THINSULATE .02', 310000, 'Pakaian & Celana', 'Celana yang sangat nyaman serta bisa digunakan dalam segala kondisi', 'forester', 'lama', '2024-05-22 09:44:40', '2024-05-22 09:44:40'),
('PR864', '20240522_CONSINA WINDSTOPPER GLOVES.jpg', 'CONSINA WINDSTOPPER GLOVES', 170000, 'Peralatan Outdoor', 'Sarung tangan yang aman menahan angin gunung yang dingin', 'consina', 'lama', '2024-05-22 09:33:59', '2024-05-22 09:33:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `promosi`
--

CREATE TABLE `promosi` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_promosi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_promosi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_promosi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `promosi_use` int(11) DEFAULT NULL,
  `promosi_value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `promosi`
--

INSERT INTO `promosi` (`id`, `gambar_promosi`, `nama_promosi`, `deskripsi_promosi`, `tanggal_mulai`, `tanggal_selesai`, `promosi_use`, `promosi_value`, `created_at`, `updated_at`) VALUES
('PS125', '20240523_promo payay sale forester.jpg', 'Pay Day Sale Forester', 'Promo Pay Day', '2024-06-01', '2024-06-29', NULL, 10, '2024-05-23 08:21:50', '2024-05-23 08:21:50'),
('PS830', '20240523_promo sale 10.10 consina.jpg', 'Promo Sale 10.10 Consina', 'Promo', '2024-05-24', '2024-05-31', NULL, 15, '2024-05-23 08:23:20', '2024-05-23 08:23:20'),
('PS869', '20240523_promo diskon 100% consina.jpg', 'Promo Diskon 100% Consina', 'Promo', '2024-05-23', '2024-05-30', 3, 20, '2024-05-23 08:21:12', '2024-05-23 08:25:55'),
('PS959', '20240523_promo 8.8 forester.jpg', 'Promo 8.8 Forester', 'Rayakan tanggal 8 Agustus dengan penawaran spesial dari Forester Jakal! Nikmati diskon hingga 50% untuk produk-produk pilihan. Promosi ini hanya berlaku selama satu hari, jadi jangan lewatkan kesempatan untuk mendapatkan barang favorit Anda dengan harga miring. Selain itu, setiap pembelian selama periode promosi akan mendapatkan poin ekstra yang bisa ditukarkan dengan hadiah menarik.', '2024-05-23', '2024-05-31', 3, 15, '2024-05-23 08:20:35', '2024-05-29 18:33:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `metode_pembayaran` enum('Cash','Qris','Dana') COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama_pelanggan`, `tanggal_transaksi`, `metode_pembayaran`, `total_transaksi`, `created_at`, `updated_at`) VALUES
('NT-20240523-133', 'eirina', '2024-05-23', 'Qris', '255000', '2024-05-23 08:24:21', '2024-05-23 08:24:21'),
('NT-20240523-179', 'aji', '2024-05-23', 'Cash', '527000', '2024-05-23 08:24:54', '2024-05-23 08:24:54'),
('NT-20240523-251', 'Kartika', '2024-05-22', 'Dana', '1336000', '2024-05-23 08:25:55', '2024-05-23 08:25:55'),
('NT-20240523-328', 'zidan', '2024-05-22', 'Cash', '496000', '2024-05-23 08:25:36', '2024-05-23 08:25:36'),
('NT-20240523-610', 'Nanda', '2024-05-23', 'Dana', '540000', '2024-05-23 08:26:37', '2024-05-23 08:26:37'),
('NT-20240530-642', 'aji', '2024-05-30', 'Cash', '510000', '2024-05-29 18:33:34', '2024-05-29 18:33:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','manajer','pelanggan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telpon` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `jenis_kelamin`, `nomor_telpon`, `email`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin123', '$2y$12$XOHJBE91a7WRlVaYS8vmEeqArMOt3qOld5Qnt6sAiqslKgAd4Nbny', 'admin', 'L', '081211223355', 'admin@gmail.com', 'jl. Magelang KM 05', '2024-05-22 09:28:58', '2024-05-22 09:28:58'),
(2, 'manajer', 'manajer123', '$2y$12$rbDGNyo8YbKZJmY19pTHWewS/vAMISVv5I2NSj20qloIaZdgxnCFq', 'manajer', 'L', '081211223344', 'manajer@gmail.com', 'Jl. Magelang KM 06', '2024-05-22 09:28:58', '2024-05-22 09:28:58'),
(3, 'pelanggan', 'pelanggan123', '$2y$12$s5EAgmO/dAxg12e3HUyVWe4Dmd6KxcYm0iyOJ.0qJsDv2wwkhEpuG', 'pelanggan', 'L', '081211223344', 'pelanggan@gmail.com', 'Jl. Magelang KM 06', '2024-05-22 09:28:58', '2024-05-22 09:28:58'),
(4, 'cahya', 'cahya', '$2y$12$8ZrmsiYOB9T74ZXRv7n0lukO6jX5QWIsGvUKmf4v7NIrUV89IcSsq', 'admin', 'L', '0896534556', 'adjicahya92@gmail.com', 'gg', '2024-05-23 09:32:30', '2024-05-23 09:32:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_video` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `video`
--

INSERT INTO `video` (`id`, `user_id`, `kategori`, `tumbnail`, `video`, `judul_video`, `deskripsi_video`, `created_at`, `updated_at`) VALUES
('VD328', '1', 'petualangan', '20240523_apa.jpg', '20240523_WhatsApp Video 2024-05-20 at 09.48.13.mp4', 'Petualangan Sobat Forester Jakal', 'Petalangan Sobat Forester Jakal', '2024-05-23 08:12:57', '2024-05-23 08:12:57'),
('VD550', '1', 'review', '20240523_carrier.jpg', '20240523_Review Carrier Zeta 054.mp4', 'Review Carrier Terbaru Zeta-054', 'Review Carrier Terbaru Zeta-054 ada disini nih!!!', '2024-05-23 08:13:46', '2024-05-23 08:13:46'),
('VD586', '1', 'tutorial', '20240523_tenda zeta.jpg', '20240523_Tutorial Mendirikan Tenda Zeta.mp4', 'Tutorial Mendirikan Tenda Zeta', 'Yang bingung caranya yuk kepoin', '2024-05-23 08:16:10', '2024-05-23 08:16:10'),
('VD590', '1', 'review', '20240523_dompet.jpg', '20240523_Review Dompet Edition.mp4', 'Review Dompet Edition', 'Forester Jakal Punya Rekomendasi Dompet nih buat kalian, yuk kepoin!!', '2024-05-23 08:15:14', '2024-05-23 08:15:14'),
('VD595', '1', 'tips', '20240523_rekomendasi jaket.jpg', '20240523_Tips and Trik Info Jaket.mp4', 'Tips and Trik Info Jaket', 'Forester Jakal Punya Rekomendasi Jaket nih buat kalian, yuk kepoin!!', '2024-05-23 08:17:31', '2024-05-23 08:17:31'),
('VD849', '1', 'petualangan', '20240523_topi.jpg', '20240523_Tips and Trik Memilih Topi.mp4', 'Tips and Trik Memilih Topi', 'Yuk kepoin  Tips and Trik Memilih Topi', '2024-05-23 08:16:53', '2024-05-30 09:11:56'),
('VD943', '1', 'tips', '20240530_carrier.jpg', '20240530_Review Carrier Zeta 054.mp4', 'forester', 'bagus', '2024-05-30 09:10:05', '2024-05-30 09:10:05');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_promosi`
--
ALTER TABLE `detail_promosi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kritiksaran`
--
ALTER TABLE `kritiksaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `promosi`
--
ALTER TABLE `promosi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indeks untuk tabel `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_promosi`
--
ALTER TABLE `detail_promosi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kritiksaran`
--
ALTER TABLE `kritiksaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

DELIMITER $$
--
-- Event
--
CREATE DEFINER=`root`@`localhost` EVENT `UpdateStatusEvent` ON SCHEDULE EVERY 5 MINUTE STARTS '2024-05-13 21:37:47' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE produk SET status_produk = 'lama' WHERE status_produk = 'new arrival'$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
