-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2024 at 08:05 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
-- Table structure for table `detail_promosi`
--

CREATE TABLE `detail_promosi` (
  `id` bigint UNSIGNED NOT NULL,
  `id_promosi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_produk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_promosi`
--

INSERT INTO `detail_promosi` (`id`, `id_promosi`, `id_produk`, `nama_produk`, `created_at`, `updated_at`) VALUES
(13, 'PS193', 'PR112', 'voluptas', '2024-05-15 10:52:38', '2024-05-15 10:52:38'),
(14, 'PS193', 'PR132', 'et', '2024-05-15 10:52:38', '2024-05-15 10:52:38'),
(18, 'PS905', 'PR112', 'voluptas', '2024-05-15 11:02:28', '2024-05-15 11:02:28'),
(19, 'PS905', 'PR150', 'ullam', '2024-05-15 11:02:28', '2024-05-15 11:02:28'),
(21, 'PS251', 'PR132', 'et', '2024-05-15 11:04:31', '2024-05-15 11:04:31'),
(22, 'PS251', 'PR150', 'ullam', '2024-05-15 11:04:31', '2024-05-15 11:04:31'),
(23, 'PS251', 'PR228', 'reiciendis', '2024-05-15 11:04:31', '2024-05-15 11:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` bigint UNSIGNED NOT NULL,
  `produk_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaksi_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `promosi_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_produk` int NOT NULL,
  `jumlah_beli_produk` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `produk_id`, `transaksi_id`, `promosi_id`, `harga_produk`, `jumlah_beli_produk`, `created_at`, `updated_at`) VALUES
(1, 'PR112', 'NT-20240505-125', NULL, 2853, 3, '2024-05-04 20:40:59', '2024-05-04 20:40:59'),
(3, 'PR112', 'NT-20240505-243', 'PS300', 2853, 2, '2024-05-04 20:49:02', '2024-05-04 20:49:02'),
(4, 'PR150', 'NT-20240505-243', 'PS193', 2762, 2, '2024-05-04 20:49:02', '2024-05-04 20:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kritiksaran`
--

CREATE TABLE `kritiksaran` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpon` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_19_163750_create_produk_table', 1),
(7, '2024_04_22_191012_create_kritiksaran_table', 1),
(8, '2024_04_22_191214_create_promosi_table', 1),
(9, '2024_05_04_034546_create_transaksi_table', 1),
(10, '2024_05_04_034553_create_detail_transaksi_table', 1),
(11, '2024_05_15_173101_create_detail_promosi_table', 2),
(12, '2024_04_22_171901_create_video_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_produk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_produk` int NOT NULL,
  `kategori_produk` enum('tas','sepatu','pakaian') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_produk` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk_produk` enum('consina','forester') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_produk` enum('new arrival','lama') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `gambar_produk`, `nama_produk`, `harga_produk`, `kategori_produk`, `deskripsi_produk`, `merk_produk`, `status_produk`, `created_at`, `updated_at`) VALUES
('PR112', 'gambar.jpg', 'voluptas', 2853, 'tas', 'A est non tempore magnam adipisci laudantium et neque et.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR132', 'gambar.jpg', 'et', 8966, 'tas', 'Totam minus tempora harum est doloremque culpa repudiandae rerum officiis laboriosam cupiditate.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR150', 'gambar.jpg', 'ullam', 2762, 'tas', 'Sunt quia vero et possimus deserunt et adipisci.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR152', 'gambar.jpg', 'deleniti', 4410, 'tas', 'Asperiores velit facilis fuga sed quisquam nobis ex vel.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR162', 'gambar.jpg', 'iure', 4036, 'tas', 'Nam fuga eaque eligendi eum soluta ipsum.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR171', 'gambar.jpg', 'culpa', 1084, 'tas', 'Consectetur odio alias voluptatem occaecati veniam et quia.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR186', 'gambar.jpg', 'debitis', 5331, 'tas', 'Et facilis alias optio explicabo beatae autem.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR228', 'gambar.jpg', 'reiciendis', 1520, 'tas', 'Laudantium ut incidunt maiores inventore et quidem repellendus veniam.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR233', 'gambar.jpg', 'esse', 7382, 'tas', 'Quo reiciendis aut quam rerum et sit in officiis qui non.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR249', 'gambar.jpg', 'sit', 6490, 'tas', 'Delectus et mollitia sapiente iure doloremque iure consectetur sapiente illum.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR271', 'gambar.jpg', 'voluptas', 1969, 'tas', 'Voluptatem dolor nostrum ut totam quisquam possimus ab optio quis quasi aut.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR284', 'gambar.jpg', 'iusto', 6083, 'tas', 'Rerum officia vel vel labore aspernatur ad officia sequi dolores in autem occaecati.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR318', 'gambar.jpg', 'voluptatibus', 7547, 'tas', 'Recusandae maxime qui reiciendis exercitationem explicabo optio.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR334', 'gambar.jpg', 'libero', 6046, 'tas', 'Et nihil eligendi natus corporis ut qui rerum quia quisquam.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR339', 'gambar.jpg', 'error', 2849, 'tas', 'Ut non occaecati sequi cum voluptatem quae vero suscipit vero et reiciendis sapiente.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR340', 'gambar.jpg', 'eos', 5749, 'tas', 'Iure consectetur accusamus quo fugiat in magni deserunt odio facilis velit.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR344', 'gambar.jpg', 'quod', 2423, 'tas', 'Placeat dolor et nulla quo laborum enim impedit voluptates perspiciatis et corporis id repudiandae.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR352', 'gambar.jpg', 'sunt', 6386, 'tas', 'Sed qui sint necessitatibus ipsam aut aliquam perferendis sapiente dignissimos.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR370', 'gambar.jpg', 'temporibus', 2366, 'tas', 'Aut rem numquam voluptatum sint voluptatem commodi dolores placeat.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR375', 'gambar.jpg', 'quaerat', 7978, 'tas', 'Doloremque nesciunt sint rem quis aut dolorem velit accusantium et est et esse.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR412', 'gambar.jpg', 'similique', 1942, 'tas', 'Quia voluptas nisi officia sint mollitia perspiciatis voluptatibus voluptatum molestiae veritatis.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR437', 'gambar.jpg', 'debitis', 4943, 'tas', 'Eos voluptate et ipsum at in et deserunt repellat beatae aut quo at eos qui.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR508', 'gambar.jpg', 'recusandae', 1527, 'tas', 'Iusto sint sed consectetur distinctio similique neque.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR515', 'gambar.jpg', 'aliquam', 9653, 'tas', 'Asperiores nam aperiam quasi ea perspiciatis sint iure quibusdam deleniti et rerum.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR532', 'gambar.jpg', 'repellendus', 2443, 'tas', 'Dolores eveniet nisi maxime voluptatum voluptatem aperiam.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR550', 'gambar.jpg', 'aut', 9996, 'tas', 'Qui nemo vel corporis ab est ab omnis voluptas corporis velit.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR580', 'gambar.jpg', 'quas', 5594, 'tas', 'Laboriosam et qui dolorem qui quam optio iusto possimus maxime quo et quia quo.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR597', 'gambar.jpg', 'possimus', 2218, 'tas', 'Sed ipsam et velit ut ut asperiores enim non velit mollitia libero.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR622', 'gambar.jpg', 'laboriosam', 9355, 'tas', 'Sed repellendus nemo id optio veritatis debitis pariatur ab dolores dolorem culpa.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR656', 'gambar.jpg', 'quidem', 1111, 'tas', 'Asperiores eius nam id molestias fugit deleniti officiis dolorem.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR679', 'gambar.jpg', 'ipsam', 8728, 'tas', 'Odit assumenda molestiae temporibus nihil velit aut dolorem at delectus sit laboriosam quisquam tenetur.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR681', 'gambar.jpg', 'ipsum', 5181, 'tas', 'Et cum quas deserunt ut ut est rerum eligendi perferendis magnam quia aut minima.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR696', 'gambar.jpg', 'laborum', 3030, 'tas', 'Et est numquam eligendi officiis quam dolorem sapiente eveniet dolorem dicta.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR699', 'gambar.jpg', 'officiis', 5858, 'tas', 'Qui aut labore qui dolor qui est maiores facilis minima laborum qui maiores.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR713', 'gambar.jpg', 'architecto', 6487, 'tas', 'Vel nostrum dolores quia aut doloremque aut dolorem architecto aperiam vero necessitatibus.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR757', 'gambar.jpg', 'ab', 6459, 'tas', 'Odio est id ut distinctio voluptas et corporis ratione deserunt et exercitationem architecto ex.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR760', 'gambar.jpg', 'enim', 5557, 'tas', 'Aliquid animi magni ea sed voluptatem eius et ad autem debitis a.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR772', 'gambar.jpg', 'harum', 7081, 'tas', 'Ipsa animi et explicabo qui error sit aut nesciunt et possimus.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR779', 'gambar.jpg', 'esse', 8909, 'tas', 'Consequatur modi et et quo neque voluptas est quasi incidunt vel veniam.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR781', 'gambar.jpg', 'doloribus', 3244, 'tas', 'Adipisci sed maiores qui dolorem dolorem eaque et totam sit sapiente.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR829', 'gambar.jpg', 'quidem', 1403, 'tas', 'Deleniti nisi in aut necessitatibus nemo expedita laudantium cumque ut dolores sed consequuntur et.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR840', 'gambar.jpg', 'quod', 6435, 'tas', 'Doloribus pariatur facilis similique veniam occaecati aut quis consectetur temporibus.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR920', 'gambar.jpg', 'magnam', 2878, 'tas', 'Aliquam dolor sunt amet quae est in.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR924', 'gambar.jpg', 'aut', 1010, 'tas', 'Fugit beatae voluptates quis debitis voluptatem iusto libero tempora est in in doloremque ut.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR949', 'gambar.jpg', 'quaerat', 6057, 'tas', 'Vel voluptas veritatis est ut cupiditate harum atque praesentium alias.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR956', 'gambar.jpg', 'commodi', 2269, 'tas', 'Voluptatem nostrum accusamus dolorum eum porro quos error.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR965', 'gambar.jpg', 'ut', 3088, 'tas', 'Debitis in praesentium repellendus rerum blanditiis consequatur qui consequuntur voluptas maiores vero commodi mollitia.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR982', 'gambar.jpg', 'nemo', 5383, 'tas', 'Consequatur et alias aut suscipit est quia nisi explicabo eveniet alias quibusdam ullam optio.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR986', 'gambar.jpg', 'possimus', 3449, 'tas', 'Qui vero aut aut qui officiis dolore aut voluptas.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PR996', 'gambar.jpg', 'vitae', 3936, 'tas', 'Omnis est natus quia fugiat consequatur occaecati vel aperiam.', 'consina', 'new arrival', '2024-05-04 20:35:56', '2024-05-04 20:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `promosi`
--

CREATE TABLE `promosi` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_promosi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_promosi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_promosi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `promosi_use` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promosi`
--

INSERT INTO `promosi` (`id`, `gambar_promosi`, `nama_promosi`, `deskripsi_promosi`, `tanggal_mulai`, `tanggal_selesai`, `promosi_use`, `created_at`, `updated_at`) VALUES
('PS165', 'gambar.jpg', 'corrupti', 'Quisquam incidunt esse molestiae modi molestias excepturi facere aliquid est aut nihil.', '1987-04-24', '1994-03-09', 6, '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PS193', 'gambar.jpg', 'sint', 'Porro natus corporis deserunt consectetur veniam maxime est praesentium error quasi rerum ea fugiat.', '2022-09-20', '2016-07-08', 0, '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PS251', '20240515_daun.png', 'test2', 'test', '2024-05-16', '2024-05-18', 0, '2024-05-15 11:04:31', '2024-05-15 11:04:31'),
('PS300', 'gambar.jpg', 'quas', 'Culpa sunt inventore voluptas quidem ut eligendi est ab.', '2010-09-26', '2007-04-27', 16, '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PS310', 'gambar.jpg', 'natus', 'Ab sunt explicabo alias est nisi ut et.', '2010-03-17', '1973-09-20', 0, '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PS352', 'gambar.jpg', 'harum', 'Consequatur pariatur ut perferendis repellat quis in praesentium veniam earum molestiae molestiae perferendis ut.', '1973-05-29', '2003-08-25', 21, '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PS570', 'gambar.jpg', 'mollitia', 'Qui aliquam ut sit cupiditate et ullam libero reiciendis ea inventore praesentium quo.', '1997-07-07', '1995-02-04', 0, '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PS674', 'gambar.jpg', 'culpa', 'Et voluptatum consequatur dolorem perspiciatis tempora at sint reprehenderit quo quasi modi.', '2023-12-30', '2002-01-16', 0, '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PS685', 'gambar.jpg', 'excepturi', 'Et qui animi ex molestiae ducimus quia eum.', '1974-08-25', '2001-12-24', 0, '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PS716', 'gambar.jpg', 'nam', 'Quo qui tempore cupiditate voluptatibus quaerat porro.', '1999-03-31', '2014-07-01', 0, '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PS886', 'gambar.jpg', 'rerum', 'Debitis cum dolores in blanditiis necessitatibus animi consequuntur maxime nulla.', '2009-11-11', '1992-07-08', 0, '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
('PS905', '20240515_daun.png', 'test', 'test', '2024-05-16', '2024-05-18', 12, '2024-05-15 11:02:28', '2024-05-15 11:02:28');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelanggan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `metode_pembayaran` enum('Cash','Qris','Dana') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_transaksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama_pelanggan`, `tanggal_transaksi`, `metode_pembayaran`, `total_transaksi`, `created_at`, `updated_at`) VALUES
('NT-20240505-125', 'ahmad', '2024-05-01', 'Cash', '8559', '2024-05-04 20:40:59', '2024-05-04 20:40:59'),
('NT-20240505-243', 'Doni', '2024-05-01', 'Cash', '11230', '2024-05-04 20:49:02', '2024-05-04 20:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','manajer','pelanggan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telpon` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `jenis_kelamin`, `nomor_telpon`, `email`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin123', '$2y$12$bq6rowQNrwkWojBATP3WmehnJLAiuq6DYJL6SYUwEn94sqXj4EJF.', 'admin', 'L', '081211223355', 'admin@gmail.com', 'jl. Magelang KM 05', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
(2, 'manajer', 'manajer123', '$2y$12$AjxoQQw6.Nwuz9gLX7OvJuVN4CNE2rtDKOgVXbj/1mEFSGhbh5V9.', 'manajer', 'L', '081211223344', 'manajer@gmail.com', 'Jl. Magelang KM 06', '2024-05-04 20:35:56', '2024-05-04 20:35:56'),
(3, 'pelanggan', 'pelanggan123', '$2y$12$hkRClx5DDOLKN8zxaBrO.u.I.fFH0NNpG4.K9XZFKo0XB9K1wXjJi', 'pelanggan', 'L', '081211223344', 'pelanggan@gmail.com', 'Jl. Magelang KM 06', '2024-05-04 20:35:56', '2024-05-04 20:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `user_id`, `kategori`, `tumbnail`, `video`, `judul_video`, `deskripsi_video`, `created_at`, `updated_at`) VALUES
('VD146', '1', 'tips', '20240517_coffee.jpg', '20240517_2023-05-31 14-05-19.mkv', 'test 3', 'test', '2024-05-17 00:39:33', '2024-05-17 00:39:33'),
('VD578', '1', 'petualangan', '20240517_snack.jpg', '20240517_Jakarta in one Minute _ a7sII.mp4', 'test 4', 'test', '2024-05-17 00:39:59', '2024-05-17 00:39:59'),
('VD661', '1', 'review', '20240517_hh2774663-87776.png', '20240517_skyscrapers-80724.mp4', 'test 2', 'test', '2024-05-17 00:29:30', '2024-05-17 00:38:14'),
('VD996', '1', 'tutorial', '20240517_x14423.png', '20240517_Jakarta in one Minute _ a7sII.mp4', 'test 1', 'test', '2024-05-17 00:28:47', '2024-05-17 00:38:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_promosi`
--
ALTER TABLE `detail_promosi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kritiksaran`
--
ALTER TABLE `kritiksaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promosi`
--
ALTER TABLE `promosi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_promosi`
--
ALTER TABLE `detail_promosi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kritiksaran`
--
ALTER TABLE `kritiksaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
