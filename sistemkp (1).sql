-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Bulan Mei 2024 pada 19.56
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
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaksi_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promosi_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_produk` int(11) NOT NULL,
  `jumlah_beli_produk` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(10, '2024_05_04_034553_create_detail_transaksi_table', 1);

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
  `kategori_produk` enum('tas','sepatu','pakaian') COLLATE utf8mb4_unicode_ci NOT NULL,
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
('PR304', '20240513_pd4.jpeg', 'gsrhre', 50000, 'sepatu', 'gmkfhkfh', 'consina', 'lama', '2024-05-13 07:19:12', '2024-05-13 08:10:23'),
('PR583', '20240513_pd3.jpg', 'coba 2', 600000, 'sepatu', 'bagus', 'forester', 'lama', '2024-05-13 07:26:53', '2024-05-13 08:10:40'),
('PR637', '20240513_pd1.jpg', 'consina', 700000, 'sepatu', 'sepatu yang awet', 'consina', 'lama', '2024-05-13 07:14:30', '2024-05-13 07:14:30'),
('PR881', '20240513_pd3.jpg', 'forester', 800000, 'sepatu', 'ghgfjh', 'consina', 'lama', '2024-05-13 07:06:02', '2024-05-13 07:06:02'),
('PR906', '20240513_pd4.jpeg', 'fhfgj', 6000, 'sepatu', 'hkhkh', 'consina', 'lama', '2024-05-13 07:39:12', '2024-05-13 07:39:12'),
('PR934', '20240512_pd4.jpeg', 'coba', 700000, 'tas', 'sepatu yang awet', 'forester', 'lama', '2024-05-12 11:05:27', '2024-05-12 11:05:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `promosi`
--

CREATE TABLE `promosi` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_promosi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_promosi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_promosi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `promosi`
--

INSERT INTO `promosi` (`id`, `gambar_promosi`, `nama_promosi`, `deskripsi_promosi`, `tanggal_mulai`, `tanggal_selesai`, `created_at`, `updated_at`) VALUES
('PS960', '20240512_promo payay sale forester.jpg', 'gg', 'sgsg', '2024-05-13', '2024-05-27', '2024-05-12 11:11:56', '2024-05-12 11:11:56');

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
(1, 'admin', 'admin123', '$2y$12$P3XNzXyKXlQ.SLfX/Xe1mOapYNOyX4wIIragTLOzj90hfMJgj.AsW', 'admin', 'L', '081211223355', 'admin@gmail.com', 'jl. Magelang KM 05', '2024-05-11 13:11:10', '2024-05-11 13:11:10'),
(2, 'manajer', 'manajer123', '$2y$12$UyL/A2H8OlUMBtqRQfJQmuYt.KQKG0XpgYGXcOCR8vMHQUyc4KNRq', 'manajer', 'L', '081211223344', 'manajer@gmail.com', 'Jl. Magelang KM 06', '2024-05-11 13:11:10', '2024-05-11 13:11:10'),
(3, 'pelanggan', 'pelanggan123', '$2y$12$/vgwMbhoLpLDmNXwGFKmt./lR4o.T.FUNXIDtsULaocNy4zB8nRN.', 'pelanggan', 'L', '081211223344', 'pelanggan@gmail.com', 'Jl. Magelang KM 06', '2024-05-11 13:11:10', '2024-05-11 13:11:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `video`
--

INSERT INTO `video` (`id`, `user_id`, `tumbnail`, `video`, `judul_video`, `deskripsi_video`, `created_at`, `updated_at`) VALUES
('VD401', '1', '20240512_forester1.jpg', '20240512_vidddd.mp4', 'gg', 'hjt', '2024-05-12 09:11:06', '2024-05-12 09:11:06'),
('VD634', '1', '20240511_forester1.jpg', '20240511_vid3.mp4', 'forester', 'bagus seklai', '2024-05-11 13:22:56', '2024-05-11 13:22:56');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kritiksaran`
--
ALTER TABLE `kritiksaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
