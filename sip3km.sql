-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 08:22 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sip3km`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'penelitian', '2021-08-09 18:15:35', '2021-08-09 18:15:35'),
(2, 'pengabdian', '2021-08-09 18:15:35', '2021-08-09 18:15:35'),
(3, 'Category 3', '2021-08-09 18:15:35', '2021-08-09 18:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `danas`
--

CREATE TABLE `danas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelaksanaan` int(11) NOT NULL,
  `bahan` int(11) NOT NULL,
  `Transport` int(11) NOT NULL,
  `sewa` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `proposal_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danas`
--

INSERT INTO `danas` (`id`, `pelaksanaan`, `bahan`, `Transport`, `sewa`, `category_id`, `user_id`, `proposal_id`, `created_at`, `updated_at`) VALUES
(1, 3000, 2000, 20000, 20000, 1, 7, 1, '2021-08-09 18:25:19', '2021-08-09 18:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `informasis`
--

CREATE TABLE `informasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatans`
--

CREATE TABLE `kegiatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kemajuans`
--

CREATE TABLE `kemajuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `progres` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_11_000000_create_roles_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_07_053799_create_categories_table', 1),
(5, '2021_06_07_053800_create_statuses_table', 1),
(6, '2021_06_08_000000_create_users_table', 1),
(7, '2021_06_16_021302_create_informasis_table', 1),
(8, '2021_06_23_090611_create_proposals_table', 1),
(9, '2021_06_24_065835_create_penelitians_table', 1),
(10, '2021_06_24_125525_create_pengabdians_table', 1),
(11, '2021_07_01_143245_create_danas_table', 1),
(12, '2021_07_02_140556_create_kemajuans_table', 1),
(13, '2021_07_09_080302_create_kegiatans_table', 1),
(14, '2021_08_07_121553_create_periodes_table', 1),
(15, '2021_08_09_131657_create_revisis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penelitians`
--

CREATE TABLE `penelitians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendanaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publikasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengabdians`
--

CREATE TABLE `pengabdians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendanaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publikasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `periodes`
--

CREATE TABLE `periodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired` date NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periodes`
--

INSERT INTO `periodes` (`id`, `tahun`, `expired`, `status`, `created_at`, `updated_at`) VALUES
(2, '2021', '2021-08-26', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abstrak` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anggota1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anggota2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reviewer_id` int(11) DEFAULT NULL,
  `pengaju_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `judul`, `abstrak`, `anggota1`, `anggota2`, `file`, `periode`, `category_id`, `status_id`, `user_id`, `reviewer_id`, `pengaju_id`, `created_at`, `updated_at`) VALUES
(1, 'sitem point', '<p>xjknjkc</p>', 'yus', NULL, 'ABSTRAK.docx', 2021, 1, 2, 7, NULL, 7, '2021-08-09 18:21:49', '2021-08-09 19:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `revisis`
--

CREATE TABLE `revisis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2021-08-09 18:15:35', '2021-08-09 18:15:35'),
(2, 'LPPM', '2021-08-09 18:15:35', '2021-08-09 18:15:35'),
(3, 'Dosen', '2021-08-09 18:15:35', '2021-08-09 18:15:35'),
(4, 'Reviewer', '2021-08-09 18:15:35', '2021-08-09 18:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'belum diajukan', '2021-08-09 18:15:35', '2021-08-09 18:15:35'),
(2, 'mengajukan', '2021-08-09 18:15:35', '2021-08-09 18:15:35'),
(3, 'revisi', '2021-08-09 18:15:35', '2021-08-09 18:15:35'),
(4, 'ditolak', '2021-08-09 18:15:35', '2021-08-09 18:15:35'),
(5, 'diterima', '2021-08-09 18:15:35', '2021-08-09 18:15:35'),
(6, 'aktif', '2021-08-09 18:15:35', '2021-08-09 18:15:35'),
(7, 'tidak aktif', '2021-08-09 18:15:35', '2021-08-09 18:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nidn` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `roles_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nidn`, `name`, `prodi`, `jabatan`, `email`, `email_verified_at`, `password`, `alamat`, `no_hp`, `status`, `roles_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '12354', 'Johty charge', 'industri', 'wd 1', 'email@es.com', NULL, '$2y$10$ZXFN/nD5oINzkkUPHS8GEuRLmp5IFVVwHCowF2aeA80e0XWQdar0.', 'ok', '09767', NULL, 1, NULL, '2021-07-11 14:12:10', '2021-07-11 14:12:10'),
(2, '12667', 'rose way', 'sipil', 'wd 1', 'email@mail.com', NULL, '$2y$10$/52YOEX8bGKStmGKWLzfjOUARRX/yia/D0eUIfGdJje3CVMOqZ/lC', 'ok', '86786', NULL, 2, NULL, '2021-07-11 14:12:10', '2021-07-11 14:12:10'),
(3, '128444', 'lucam', 'informatika', 'wd 2', 'mochlucam@gmail.com', NULL, '$2y$10$2XJuyw8XeT8dqcPENBL02ORV6Dwy5GRNnB89.WJ909/N7Nd/nyWDC', 'ok', '77857', NULL, 3, NULL, '2021-07-11 14:12:10', '2021-07-11 14:12:10'),
(4, '12844', 'lucam234', 'informatika', 'wd 3', 'mochlucam3456@gmail.com', NULL, '$2y$10$8HK6y8Hwq6p74JLtk9m2nu9bIdP5/iqutO7wWMMIhcTIqNbvGJKQW', 'ok', '765564', NULL, 4, NULL, '2021-07-11 14:12:10', '2021-07-11 14:12:10'),
(7, '0403018001', 'Ai Musrifah, ST. M.kom', 'Informatika', 'Lektor', 'email1@ez.net', NULL, '$2y$10$VtVfH4gZvz96L8/AkJaeTeh7i7LDdbwV8.eUtr7dbJlUjZ/FPMgPG', 'Cimareme Indah Blok C-2 No. 12', '082219246705', 1, 2, NULL, '2021-07-12 00:18:22', '2021-07-12 19:04:50'),
(8, '0417017903', 'Sutono, S.Si., M.Kom', 'Informatika', 'Lektor', 'email2@ez.net', NULL, '$2y$10$SSwyl1wXXv9woFog1s5ieO.A8QQDqCB.ESITbWSpxJbrmBT5kom8S', 'Cimareme Indah Blok C-2 No. 12', '081320779543', NULL, 3, NULL, '2021-07-12 00:20:44', '2021-07-12 01:10:05'),
(9, '0409027303', 'Fuad Nasher, ST., M.kom', 'Lektor', 'Lektor', 'email3@ez.net', NULL, '$2y$10$Wr5ahrHqx7hJopPd0sjG9.DHv7TSIg2EcblLarsd7G74oaFgSj9Xe', 'Kp. Maruyung', '081322220919', NULL, 3, NULL, '2021-07-12 00:22:15', '2021-07-13 01:41:55'),
(10, '0425097702', 'Ida Fitriani, ST., M.Si.', 'Informatika', 'Asisten Ahli', 'email4@ez.net', NULL, '$2y$10$SDacpfof3gtso.988bB.0.2xjO6vofwQC2Otvl1nFCLKLMfdiPXKu', 'Perum Bumi Emas Blok C1/29', '085872067663', NULL, 3, NULL, '2021-07-12 00:25:07', '2021-07-12 01:11:58'),
(11, '0426078201', 'Siti Sarah Abdullah, ST., MT', 'Informatika', 'Lektor', 'email5@ez.net', NULL, '$2y$10$H06gv2SwSWNjrZ5wdQveSucawzpp8NmzKLJTKFHWHiPrzWHKHyuCi', 'Jl. Malanglayang', '085759436477', NULL, 3, NULL, '2021-07-12 00:26:40', '2021-07-12 01:12:11'),
(12, '0401087501', 'Tarmin Abdulghani, ST., MT', 'Informatika', 'Lektor', 'email6@ez.net', NULL, '$2y$10$RhmK7nvWaxAs.uyfN.NVAuBt76YYbgMJqOx9AM1rJs.a3W3QTP2yS', 'Jl. Melong IV Blok XI No. 65', '087722208003', NULL, 3, NULL, '2021-07-12 00:28:19', '2021-07-12 01:08:19'),
(13, '0421037802', 'Sri Widaningsih, ST., MT., M.Kom.', 'Informatika', 'Lektor', 'email7@ez.net', NULL, '$2y$10$mmYsYzpdcQh7tM2aFsJSRu2itSOlfxqI1b7F9cbfb03ihZCarOofa', 'Sukaluyu II No. 5 A', '081321200875', NULL, 3, NULL, '2021-07-12 00:30:18', '2021-07-12 01:10:48'),
(14, '0402108603', 'Andri Adikusumah, S.Kom., M.Kom', 'Informatika', 'Asisten Ahli', 'email8@ez.net', NULL, '$2y$10$aiA0cSycJN1Sj4aCCq.Eu./0IpPSZjXGvDLT9SvnfV/6yirXOkhFG', 'Kp. Sabandar Hilir', '083821385197', NULL, 3, NULL, '2021-07-12 00:31:34', '2021-07-12 01:08:32'),
(15, '0411118503', 'Finsa Nurpandi, ST., MT', 'Asisten Ahli', 'Asisten Ahli', 'email9@ez.net', NULL, '$2y$10$JHTWFyhK/WjgmCuunSLHY.t3sXe1j3STh53mWsJJYOgBdvKT.1gqG', 'Jl. Lika No. 02', '085708090228', NULL, 4, NULL, '2021-07-12 00:32:54', '2021-07-12 17:29:17'),
(16, '0423057701', 'Fietri Setiawati S, ST., M.Kom', 'Informatika', 'Lektor', 'email10@ez.net', NULL, '$2y$10$C662D4sWPGX89W7098eKFOpkGxALPGc4x.Mr1v..0EThCz48VYmOK', 'Jl. KH. Saleh Gg. R. H Affandi  II No. 66', '085723599979', NULL, 3, NULL, '2021-07-12 00:35:46', '2021-07-12 01:11:46'),
(17, '0415018402', 'M. Kany Legiawan, ST., M.Kom', 'Informatika', 'Asisten Ahli', 'email11@ez.net', NULL, '$2y$10$ihOi8oSz0V5hzEOw.de.cegvdwtopcEikwAqTWwelprRHQqilSUIu', 'Bumi Taman Cibodas Blok D.1', '081912157608', NULL, 3, NULL, '2021-07-12 00:40:23', '2021-07-12 01:09:29'),
(18, '0415048405', 'Siti Nazilah, ST., M.Kom', 'Informatika', 'Asisten Ahli', 'email12@ez.net', NULL, '$2y$10$hdDWpuS3Th/A2ziXdC6Ezeey6jM5pQuSqIaJ06JZ.G6S.raAe8EVq', 'Kp. Cijedil', '087820206870', NULL, 3, NULL, '2021-07-12 00:45:29', '2021-07-12 01:09:43'),
(19, '0418048601', 'Lalan Jaelani, ST., M.Kom', 'Informatika', 'Asisten Ahli', 'email13@ez.net', NULL, '$2y$10$By1Enp3GZThK.i27glqYbeTy8m4/uVLSQTIVH1nRCmAQrWhfPvop2', 'Kp. Lembur Sawah 03/04', '085861491913', NULL, 3, NULL, '2021-07-12 00:57:37', '2021-07-12 01:10:28'),
(20, '0003127201', 'Agus Suheri, ST., M.Kom', 'Lektor', 'Lektor', 'email14@ez.net', NULL, '$2y$10$u6uD9.Vikd3IWolB1xASROeFiGmZjU7A2GGL2ukDR6ylbgfZeHcwq', 'Sukaluyu II No. 5 A', '08122066931', NULL, 3, NULL, '2021-07-12 00:59:39', '2021-07-13 01:41:40'),
(21, '78658', 'KVJKN', 'Industri', 'Asisten Ahli', 'MK@nj.co', NULL, '$2y$10$.OA5/3QTdkOTMbL4R1YKzuWkqy/iQndatGQD9AyTQ7wjuFJ7DLjsK', 'jkcnjkn', '8678', NULL, 2, NULL, '2021-07-12 01:06:26', '2021-07-12 01:06:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danas`
--
ALTER TABLE `danas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danas_category_id_foreign` (`category_id`),
  ADD KEY `danas_user_id_foreign` (`user_id`),
  ADD KEY `danas_proposal_id_foreign` (`proposal_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `informasis`
--
ALTER TABLE `informasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kemajuans`
--
ALTER TABLE `kemajuans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kemajuans_category_id_foreign` (`category_id`),
  ADD KEY `kemajuans_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penelitians`
--
ALTER TABLE `penelitians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penelitians_user_id_foreign` (`user_id`);

--
-- Indexes for table `pengabdians`
--
ALTER TABLE `pengabdians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengabdians_user_id_foreign` (`user_id`);

--
-- Indexes for table `periodes`
--
ALTER TABLE `periodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposals_category_id_foreign` (`category_id`),
  ADD KEY `proposals_status_id_foreign` (`status_id`),
  ADD KEY `proposals_user_id_foreign` (`user_id`);

--
-- Indexes for table `revisis`
--
ALTER TABLE `revisis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `revisis_proposal_id_foreign` (`proposal_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_roles_id_foreign` (`roles_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `danas`
--
ALTER TABLE `danas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `informasis`
--
ALTER TABLE `informasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatans`
--
ALTER TABLE `kegiatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kemajuans`
--
ALTER TABLE `kemajuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `penelitians`
--
ALTER TABLE `penelitians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengabdians`
--
ALTER TABLE `pengabdians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `periodes`
--
ALTER TABLE `periodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `revisis`
--
ALTER TABLE `revisis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `danas`
--
ALTER TABLE `danas`
  ADD CONSTRAINT `danas_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `danas_proposal_id_foreign` FOREIGN KEY (`proposal_id`) REFERENCES `proposals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `danas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kemajuans`
--
ALTER TABLE `kemajuans`
  ADD CONSTRAINT `kemajuans_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `kemajuans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `penelitians`
--
ALTER TABLE `penelitians`
  ADD CONSTRAINT `penelitians_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pengabdians`
--
ALTER TABLE `pengabdians`
  ADD CONSTRAINT `pengabdians_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `proposals`
--
ALTER TABLE `proposals`
  ADD CONSTRAINT `proposals_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `proposals_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `proposals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `revisis`
--
ALTER TABLE `revisis`
  ADD CONSTRAINT `revisis_proposal_id_foreign` FOREIGN KEY (`proposal_id`) REFERENCES `proposals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
bahrul