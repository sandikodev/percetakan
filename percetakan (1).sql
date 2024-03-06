-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2024 at 12:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `percetakan`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sandi_bank` varchar(20) NOT NULL,
  `nama_bank` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `sandi_bank`, `nama_bank`) VALUES
(1, '014', 'BANK BCA (BANK CENTRAL ASIA)'),
(2, '008', 'BANK MANDIRI'),
(3, '009', 'BANK BNI (BANK NEGARA INDONESIA)'),
(4, '427', 'BANK SYARIAH INDONESIA (Eks BNI SYARIAH)'),
(5, '002', 'BANK BRI (BANK RAKYAT INDONESIA)'),
(6, '451', 'BANK SYARIAH INDONESIA (Eks BSM)'),
(7, '022', 'BANK CIMB NIAGA'),
(8, '022', 'BANK CIMB NIAGA SYARIAH'),
(9, '147', 'BANK MUAMALAT'),
(10, '213', 'BANK BTPN (BANK TABUNGAN PENSIUNAN NASIONAL)'),
(11, '547', 'BANK BTPN SYARIAH'),
(12, '213', 'JENIUS'),
(13, '777', 'DANA'),
(14, '888', 'OVO'),
(15, '999', 'GOPAY'),
(16, '011', 'BANK DANAMON'),
(17, '016', 'BANK BII MAYBANK'),
(18, '426', 'BANK MEGA'),
(19, '153', 'BANK SINARMAS'),
(20, '950', 'BANK COMMONWEALTH'),
(21, '028', 'BANK OCBC NISP'),
(22, '441', 'BANK BUKOPIN'),
(23, '521', 'BANK BUKOPIN SYARIAH'),
(24, '536', 'BANK BCA SYARIAH'),
(25, '026', 'BANK LIPPO'),
(26, '031', 'CITIBANK'),
(27, '789', 'INDOSAT DOMPETKU'),
(28, '911', 'TELKOMSEL TCASH'),
(29, '911', 'LINKAJA'),
(30, '046', 'BANK DBS INDONESIA'),
(31, '046', 'DIGIBANK'),
(32, '535', 'SEABANK (Eks BANK KESEJAHTERAAN EKONOMI)'),
(33, '542', 'BANK JAGO (Eks BANK ARTOS INDONESIA)'),
(34, '023', 'BANK UOB INDONESIA'),
(35, '023', 'TMRW by UOB INDONESIA'),
(36, '490', 'BANK NEO COMMERCE (Akulaku)'),
(37, '567', 'ALLO BANK (Eks BANK HARDA)'),
(38, '947', 'BANK ALADIN (Eks BANK MAYBANK INDOCORP)'),
(39, '110', 'BANK JABAR dan BANTEN (BJB)'),
(40, '111', 'BANK DKI JAKARTA'),
(41, '112', 'BPD DIY (YOGYAKARTA)'),
(42, '113', 'BANK JATENG (JAWA TENGAH)'),
(43, '114', 'BANK JATIM (JAWA BARAT)'),
(44, '115', 'BPD JAMBI'),
(45, '116', 'BPD ACEH'),
(46, '116', 'BPD ACEH SYARIAH'),
(47, '117', 'BANK SUMUT'),
(48, '118', 'BANK NAGARI (BANK SUMBAR)'),
(49, '119', 'BANK RIAU KEPRI'),
(50, '120', 'BANK SUMSEL BABEL'),
(51, '121', 'BANK LAMPUNG'),
(52, '122', 'BANK KALSEL (BANK KALIMANTAN SELATAN)'),
(53, '123', 'BANK KALBAR (BANK KALIMANTAN BARAT)'),
(54, '124', 'BANK KALTIMTARA (BANK KALIMANTAN TIMUR DAN UTARA)'),
(55, '125', 'BANK KALTENG (BANK KALIMANTAN TENGAH)'),
(56, '126', 'BANK SULSELBAR (BANK SULAWESI SELATAN DAN BARAT)'),
(57, '127', 'BANK SULUTGO (BANK SULAWESI UTARA DAN GORONTALO)'),
(58, '128', 'BANK NTB'),
(59, '128', 'BANK NTB SYARIAH'),
(60, '129', 'BANK BPD BALI'),
(61, '130', 'BANK NTT'),
(62, '131', 'BANK MALUKU MALUT'),
(63, '132', 'BANK PAPUA'),
(64, '133', 'BANK BENGKULU'),
(65, '134', 'BANK SULTENG (BANK SULAWESI TENGAH)'),
(66, '135', 'BANK SULTRA'),
(67, '137', 'BANK BPD BANTEN'),
(68, '003', 'BANK EKSPOR INDONESIA'),
(69, '019', 'BANK PANIN'),
(70, '517', 'BANK PANIN DUBAI SYARIAH'),
(71, '020', 'BANK ARTA NIAGA KENCANA'),
(72, '023', 'BANK UOB INDONESIA (BANK BUANA INDONESIA)'),
(73, '030', 'AMERICAN EXPRESS BANK LTD'),
(74, '031', 'CITIBANK N.A.'),
(75, '032', 'JP. MORGAN CHASE BANK, N.A.'),
(76, '033', 'BANK OF AMERICA, N.A'),
(77, '034', 'ING INDONESIA BANK'),
(78, '036', 'BANK MULTICOR'),
(79, '037', 'BANK ARTHA GRAHA INTERNASIONAL'),
(80, '039', 'BANK CREDIT AGRICOLE INDOSUEZ'),
(81, '040', 'THE BANGKOK BANK COMP. LTD'),
(82, '041', 'THE HONGKONG & SHANGHAI B.C. (BANK HSBC)'),
(83, '042', 'THE BANK OF TOKYO MITSUBISHI UFJ LTD'),
(84, '045', 'BANK SUMITOMO MITSUI INDONESIA'),
(85, '047', 'BANK RESONA PERDANIA'),
(86, '048', 'BANK MIZUHO INDONESIA'),
(87, '050', 'STANDARD CHARTERED BANK'),
(88, '052', 'BANK ABN AMRO'),
(89, '053', 'BANK KEPPEL TATLEE BUANA'),
(90, '054', 'BANK CAPITAL INDONESIA'),
(91, '057', 'BANK BNP PARIBAS INDONESIA'),
(92, '023', 'BANK UOB INDONESIA'),
(93, '059', 'KOREA EXCHANGE BANK DANAMON'),
(94, '060', 'RABOBANK INTERNASIONAL INDONESIA'),
(95, '061', 'BANK ANZ INDONESIA'),
(96, '068', 'BANK WOORI SAUDARA'),
(97, '069', 'BANK OF CHINA'),
(98, '076', 'BANK BUMI ARTA'),
(99, '087', 'BANK EKONOMI'),
(100, '088', 'BANK ANTARDAERAH'),
(101, '089', 'BANK HAGA'),
(102, '093', 'BANK IFI'),
(103, '095', 'BANK CENTURY'),
(104, '097', 'BANK MAYAPADA'),
(105, '145', 'BANK NUSANTARA PARAHYANGAN'),
(106, '146', 'BANK SWADESI (BANK OF INDIA INDONESIA)'),
(107, '151', 'BANK MESTIKA DHARMA'),
(108, '152', 'BANK SHINHAN INDONESIA (BANK METRO EXPRESS)'),
(109, '157', 'BANK MASPION INDONESIA'),
(110, '159', 'BANK HAGAKITA'),
(111, '161', 'BANK GANESHA'),
(112, '162', 'BANK WINDU KENTJANA'),
(113, '164', 'BANK ICBC INDONESIA (HALIM INDONESIA BANK)'),
(114, '166', 'BANK HARMONI INTERNATIONAL'),
(115, '167', 'BANK QNB KESAWAN (BANK QNB INDONESIA)'),
(116, '212', 'BANK HIMPUNAN SAUDARA 1906'),
(117, '405', 'BANK SWAGUNA'),
(118, '459', 'BANK BISNIS INTERNASIONAL'),
(119, '466', 'BANK SRI PARTHA'),
(120, '472', 'BANK JASA JAKARTA'),
(121, '484', 'BANK BINTANG MANUNGGAL'),
(122, '485', 'BANK MNC INTERNASIONAL (BANK BUMIPUTERA)'),
(123, '490', 'BANK YUDHA BHAKTI'),
(124, '491', 'BANK MITRANIAGA'),
(125, '494', 'BANK BRI AGRO NIAGA'),
(126, '498', 'BANK SBI INDONESIA (BANK INDOMONEX)'),
(127, '501', 'BANK ROYAL INDONESIA'),
(128, '503', 'BANK NATIONAL NOBU (BANK ALFINDO)'),
(129, '506', 'BANK MEGA SYARIAH'),
(130, '513', 'BANK INA PERDANA'),
(131, '517', 'BANK HARFA'),
(132, '520', 'PRIMA MASTER BANK'),
(133, '521', 'BANK PERSYARIKATAN INDONESIA'),
(134, '525', 'BANK AKITA'),
(135, '526', 'LIMAN INTERNATIONAL BANK'),
(136, '531', 'ANGLOMAS INTERNASIONAL BANK'),
(137, '523', 'BANK SAHABAT SAMPEORNA (BANK DIPO INTERNATIONAL)'),
(138, '547', 'BANK PURBA DANARTA'),
(139, '548', 'BANK MULTI ARTA SENTOSA'),
(140, '553', 'BANK MAYORA INDONESIA'),
(141, '555', 'BANK INDEX SELINDO'),
(142, '566', 'BANK VICTORIA INTERNATIONAL'),
(143, '558', 'BANK EKSEKUTIF'),
(144, '559', 'CENTRATAMA NASIONAL BANK'),
(145, '562', 'BANK FAMA INTERNASIONAL'),
(146, '564', 'BANK MANDIRI TASPEN POS (BANK SINAR HARAPAN BALI)'),
(147, '945', 'BANK AGRIS (BANK FINCONESIA)'),
(148, '946', 'BANK MERINCORP'),
(149, '948', 'BANK OCBC – INDONESIA'),
(150, '949', 'BANK CTBC (CHINA TRUST) INDONESIA'),
(151, '425', 'BANK BJB SYARIAH'),
(152, '688', 'BPR KS (KARYAJATNIKA SEDAYA)'),
(153, '422', 'BANK SYARIAH INDONESIA (Eks BRI SYARIAH)'),
(154, '200', 'BANK TABUNGAN NEGARA (BANK BTN)'),
(155, '013', 'PERMATA BANK');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_12_134818_create_permission_tables', 1),
(6, '2023_11_12_134844_create_products_table', 2),
(7, '2021_08_08_100000_create_banks_tables', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 17),
(3, 'App\\Models\\User', 18),
(3, 'App\\Models\\User', 19),
(3, 'App\\Models\\User', 20),
(3, 'App\\Models\\User', 21),
(3, 'App\\Models\\User', 22),
(3, 'App\\Models\\User', 23),
(3, 'App\\Models\\User', 24),
(3, 'App\\Models\\User', 25),
(3, 'App\\Models\\User', 26),
(3, 'App\\Models\\User', 27),
(3, 'App\\Models\\User', 28),
(3, 'App\\Models\\User', 29),
(3, 'App\\Models\\User', 30),
(3, 'App\\Models\\User', 31),
(3, 'App\\Models\\User', 32),
(3, 'App\\Models\\User', 34),
(3, 'App\\Models\\User', 35),
(4, 'App\\Models\\User', 41),
(5, 'App\\Models\\User', 40);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('tetokternak@gmail.com', '$2y$12$FA.qRNu0zNiyxlyWHBdfXOAwb8I2Ma.DYMSfr7810.TP6/fdTypxC', '2023-11-15 01:44:12'),
('user@user.com', '$2y$12$dDbT8xNXH0Di2a6tyv8nYOU9q8QZHzclhTn9yUUHkGMz5l1VdNGFO', '2023-11-15 01:36:08');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2023-11-12 07:07:39', '2023-11-12 07:07:39'),
(2, 'role-create', 'web', '2023-11-12 07:07:39', '2023-11-12 07:07:39'),
(3, 'role-edit', 'web', '2023-11-12 07:07:39', '2023-11-12 07:07:39'),
(4, 'role-delete', 'web', '2023-11-12 07:07:39', '2023-11-12 07:07:39'),
(5, 'product-list', 'web', '2023-11-12 07:07:39', '2023-11-12 07:07:39'),
(6, 'product-create', 'web', '2023-11-12 07:07:39', '2023-11-12 07:07:39'),
(7, 'product-edit', 'web', '2023-11-12 07:07:39', '2023-11-12 07:07:39'),
(8, 'product-delete', 'web', '2023-11-12 07:07:39', '2023-11-12 07:07:39');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-11-12 07:08:22', '2023-11-12 07:08:22'),
(3, 'Customer', 'web', '2023-11-13 01:08:38', '2023-11-13 01:08:38'),
(4, 'Reseller', 'web', '2024-01-15 22:59:06', '2024-01-15 22:59:10'),
(5, 'Superadmin', 'web', '2024-01-28 14:13:48', '2024-01-28 14:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(2, 3),
(3, 1),
(3, 3),
(4, 1),
(4, 3),
(5, 1),
(5, 3),
(6, 1),
(6, 3),
(7, 1),
(7, 3),
(8, 1),
(8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_addons_service`
--

CREATE TABLE `tb_addons_service` (
  `id` int(11) NOT NULL,
  `nama_addons` text NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_addons_service`
--

INSERT INTO `tb_addons_service` (`id`, `nama_addons`, `keterangan`, `created_at`, `updated_at`) VALUES
(3, 'Desain', 'Memberikan jasa desain jika reseller terkendala dalam melakukan desain orderan.', '2024-02-02 22:29:38', '2024-02-02 22:29:38'),
(4, 'Packing', 'Memberikan jasa packing jika reseller terkendala dalam melakukan packing orderan.', '2024-02-02 22:31:12', '2024-02-02 22:31:12'),
(5, 'Desain + Packing', 'Memberikan jasa desain + packing jika reseller terkendala dalam melakukan desain + packing orderan.', '2024-02-02 22:31:42', '2024-02-02 22:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bayar_semua`
--

CREATE TABLE `tb_bayar_semua` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(255) DEFAULT NULL,
  `total_tagihan` varchar(255) DEFAULT NULL,
  `status_klik_bayar_semua` enum('OFF','ON') DEFAULT 'OFF',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `id_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_bayar_semua`
--

INSERT INTO `tb_bayar_semua` (`id`, `id_transaksi`, `total_tagihan`, `status_klik_bayar_semua`, `created_at`, `updated_at`, `id_user`) VALUES
(6, '253', '24000', 'ON', '2024-01-27 03:07:41', '2024-01-27 03:07:41', '34'),
(7, '254', '3000', 'ON', '2024-01-27 03:07:41', '2024-01-27 03:07:41', '34');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_bahan`
--

CREATE TABLE `tb_jenis_bahan` (
  `id` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `nama_bahan` text NOT NULL,
  `panjang` int(11) NOT NULL,
  `harga_cm2` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `stok` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jenis_bahan`
--

INSERT INTO `tb_jenis_bahan` (`id`, `id_layanan`, `nama_bahan`, `panjang`, `harga_cm2`, `keterangan`, `stok`, `created_at`, `updated_at`) VALUES
(1, 1, 'MAXDECAL', 120, 17, 'Bahan lumayan tebal bagus dan cocok untuk indoor ataupun outdoor', 'READY', '2024-01-16 05:57:06', '2024-01-23 02:48:18'),
(2, 1, 'MAXDECAL', 120, 17, 'Bahan bagus dan sudah dilaminasi', 'READY', '2024-01-16 05:57:06', '2024-01-23 02:45:09'),
(3, 2, 'abcd', 10, 15, 'ini keterangan bahan', 'READY', '2024-01-23 01:55:32', '2024-01-23 02:48:36'),
(4, 7, 'Alumunium', 10, 3, 'adasd', 'READY', '2024-01-27 02:18:26', '2024-01-27 02:18:26'),
(5, 8, 'Maxdecal', 120, 15, 'Bahan maxdecal akan selalu ready stock jika stock bahan kosong akan selalu di infokan terlebihdahulu.', 'READY', '2024-02-02 22:22:51', '2024-02-02 22:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_laminasi`
--

CREATE TABLE `tb_jenis_laminasi` (
  `id` int(11) NOT NULL,
  `id_layanan` int(11) DEFAULT NULL,
  `nama_laminasi` text NOT NULL,
  `harga_cm2` float NOT NULL,
  `stok` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jenis_laminasi`
--

INSERT INTO `tb_jenis_laminasi` (`id`, `id_layanan`, `nama_laminasi`, `harga_cm2`, `stok`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'ASAHI', 3, 'READY', 'laminasi asahi', '2024-01-16 05:57:56', '2024-01-26 03:54:51'),
(2, 1, 'DOFF', 18, 'READY', 'laminasi doff', '2024-01-16 05:57:56', '2024-01-26 03:55:02'),
(3, 1, 'asdsad', 10, 'READY', 'asdsad', '2024-01-23 03:04:57', '2024-01-23 03:04:57'),
(4, 8, 'Doff', 4.9, 'READY', 'Bahan laminasi doff akan selalu ready stock jika stock bahan kosong akan selalu di infokan terlebihdahulu.', '2024-02-02 22:26:20', '2024-02-02 22:26:20'),
(5, 8, 'Asahi', 5.8, 'READY', 'Bahan laminasi Asahi akan selalu ready stock jika stock bahan kosong akan selalu di infokan terlebihdahulu.', '2024-02-02 22:28:19', '2024-02-02 22:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_layanan`
--

CREATE TABLE `tb_layanan` (
  `id` int(11) NOT NULL,
  `nama_service` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `satuan` enum('Pcs','Lebar') DEFAULT NULL,
  `status` enum('Active','Non-Active') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_layanan`
--

INSERT INTO `tb_layanan` (`id`, `nama_service`, `keterangan`, `created_at`, `updated_at`, `satuan`, `status`) VALUES
(8, 'GARSKIN', 'Bahan cetak Garskin menggunakan bahan Maxdecal dengan 2 pilihan lamiasi ya itu Sandblas Asahi dan Doff dengan ketebalan 180Gr, Untuk lebar penyusunan desain maximal ukuran 120 x 85, jika lebih dari itu bisa di tambah di page berikutnya.', '2024-02-02 22:11:46', '2024-02-02 22:11:46', 'Lebar', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tb_limit_order`
--

CREATE TABLE `tb_limit_order` (
  `id` int(11) NOT NULL,
  `roles` varchar(255) NOT NULL,
  `maksimal_pending_pembayaran` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_limit_order`
--

INSERT INTO `tb_limit_order` (`id`, `roles`, `maksimal_pending_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 'Customer', '10', '2024-01-16 05:56:27', '2024-01-16 05:56:27'),
(2, 'Reseller', '20', '2024-01-16 05:56:27', '2024-01-16 05:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_review_transaksi`
--

CREATE TABLE `tb_review_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` text DEFAULT NULL,
  `id_user` varchar(255) DEFAULT NULL,
  `id_layanan` varchar(255) DEFAULT NULL,
  `nama_layanan` varchar(255) DEFAULT NULL,
  `keterangan_layanan` varchar(255) DEFAULT NULL,
  `url_berkas` text DEFAULT NULL,
  `lebar` int(11) DEFAULT NULL,
  `id_bahan` int(11) DEFAULT NULL,
  `nama_bahan` text DEFAULT NULL,
  `panjang_bahan` int(11) DEFAULT NULL,
  `harga_bahan_cm2` int(11) DEFAULT NULL,
  `id_laminasi` int(11) DEFAULT NULL,
  `nama_laminasi` text DEFAULT NULL,
  `harga_laminasi_cm2` int(11) DEFAULT NULL,
  `addons_service` varchar(255) DEFAULT NULL,
  `harga_addons_service` int(11) DEFAULT 0,
  `total_tagihan` varchar(255) DEFAULT NULL,
  `catatan_order` text DEFAULT NULL,
  `url_invoice` text DEFAULT NULL,
  `status_pembayaran` varchar(255) DEFAULT NULL,
  `status_order` enum('PENDING','PROSES','SELESAI') DEFAULT 'PENDING',
  `status_pengambilan` enum('Belum Diambil','Sudah Diambil') DEFAULT 'Belum Diambil',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `id_midtrans` varchar(255) DEFAULT NULL,
  `snapToken` text DEFAULT NULL,
  `bukti_transfer` varchar(255) DEFAULT NULL,
  `type_pembayaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_review_transaksi`
--

INSERT INTO `tb_review_transaksi` (`id`, `id_transaksi`, `id_user`, `id_layanan`, `nama_layanan`, `keterangan_layanan`, `url_berkas`, `lebar`, `id_bahan`, `nama_bahan`, `panjang_bahan`, `harga_bahan_cm2`, `id_laminasi`, `nama_laminasi`, `harga_laminasi_cm2`, `addons_service`, `harga_addons_service`, `total_tagihan`, `catatan_order`, `url_invoice`, `status_pembayaran`, `status_order`, `status_pengambilan`, `created_at`, `updated_at`, `nama_lengkap`, `email`, `whatsapp`, `id_midtrans`, `snapToken`, `bukti_transfer`, `type_pembayaran`) VALUES
(254, '761G5VPv2poR5k2LnYZIhksinCCMwL2n', '34', '7', 'Gantungan kunci', 'gantungan kunci', 'asdads', 1, NULL, '', 0, 0, NULL, NULL, NULL, NULL, 0, '0', 'adsad', 'http://percetakan.test/transaksi/invoice?d=761G5VPv2poR5k2LnYZIhksinCCMwL2n', 'UNPAID', 'PENDING', 'Belum Diambil', '2024-01-27 01:48:49', '2024-01-27 01:48:49', 'User Mantap', 'user@user.com', '628123132213', '1706294929', NULL, NULL, NULL),
(255, 'dNLe0DJMY9Yl5vFkHfM1aO4utDBZfjGZ', '34', '1', 'Banner', 'Bahan lumayan tebal bagus dan cocok untuk indoor ataupun outdoor', 'asdads', 1, 0, '', 0, 0, NULL, NULL, NULL, NULL, 0, '0', 'adsadasdasd', 'http://percetakan.test/transaksi/invoice?d=dNLe0DJMY9Yl5vFkHfM1aO4utDBZfjGZ', 'UNPAID', 'PENDING', 'Belum Diambil', '2024-01-27 01:49:26', '2024-01-27 01:49:27', 'User Mantap', 'user@user.com', '628123132213', '1706294967', NULL, NULL, NULL),
(256, 'FB1tDBuNBs4LsZvHoxOQCrdkRQKkkFno', '34', '1', 'Banner', 'Bahan lumayan tebal bagus dan cocok untuk indoor ataupun outdoor', 'asdsad', NULL, 0, '', 0, 0, NULL, NULL, NULL, NULL, 0, '0', 'asdasd', 'http://percetakan.test/transaksi/invoice?d=FB1tDBuNBs4LsZvHoxOQCrdkRQKkkFno', 'UNPAID', 'PENDING', 'Belum Diambil', '2024-01-27 01:50:30', '2024-01-27 01:50:31', 'User Mantap', 'user@user.com', '628123132213', '1706295031', NULL, NULL, NULL),
(257, 'P6lqytfymya6KEJejl3VogSis0PSDCHQ', '34', '1', 'Banner', 'Bahan lumayan tebal bagus dan cocok untuk indoor ataupun outdoor', 'asdad', NULL, 0, '', 0, 0, NULL, NULL, NULL, NULL, 0, '0', 'adad', 'http://percetakan.test/transaksi/invoice?d=P6lqytfymya6KEJejl3VogSis0PSDCHQ', 'UNPAID', 'PENDING', 'Belum Diambil', '2024-01-27 01:52:21', '2024-01-27 01:53:12', 'User Mantap', 'user@user.com', '628123132213', '1706295192', NULL, NULL, NULL),
(258, 'vC0uEJVNZ7i5gVMCi0hXICmiFJfFULoW', '34', '1', 'Banner', 'Bahan lumayan tebal bagus dan cocok untuk indoor ataupun outdoor', 'asdadasd', NULL, 1, 'MAXDECAL', 120, 17, 1, 'ASAHI', 3, NULL, 0, '0', 'asdsad', 'http://percetakan.test/transaksi/invoice?d=vC0uEJVNZ7i5gVMCi0hXICmiFJfFULoW', 'UNPAID', 'PENDING', 'Belum Diambil', '2024-01-27 01:56:16', '2024-01-27 01:56:16', 'User Mantap', 'user@user.com', '628123132213', '1706295376', NULL, NULL, NULL),
(259, 'qqoJvhyD1lqqZlxd7FmhjcUYRAshjVvZ', '34', '1', 'Banner', 'Bahan lumayan tebal bagus dan cocok untuk indoor ataupun outdoor', 'adasd', NULL, 1, 'MAXDECAL', 120, 17, 1, 'ASAHI', 3, NULL, 0, '0', 'adasdasd', 'http://percetakan.test/transaksi/invoice?d=qqoJvhyD1lqqZlxd7FmhjcUYRAshjVvZ', 'UNPAID', 'PENDING', 'Belum Diambil', '2024-01-27 01:57:53', '2024-01-27 01:58:31', 'User Mantap', 'user@user.com', '628123132213', '1706295511', NULL, NULL, NULL),
(260, '5tkFg12ogLMgwGMhY2jCsJgnnIRkH4gx', '34', '1', 'Banner', 'Bahan lumayan tebal bagus dan cocok untuk indoor ataupun outdoor', 'adasd', 50, 1, 'MAXDECAL', 120, 17, 1, 'ASAHI', 3, NULL, 0, '120000', 'adsad', 'http://percetakan.test/transaksi/invoice?d=5tkFg12ogLMgwGMhY2jCsJgnnIRkH4gx', 'UNPAID', 'PENDING', 'Belum Diambil', '2024-01-27 02:03:43', '2024-01-27 02:03:44', 'User Mantap', 'user@user.com', '628123132213', '1706295824', 'd4a1f79e-daaf-4272-9d0e-9374e94fcac4', NULL, NULL),
(261, 'I5MvD98EmzJTRX5WXRFhpFnQCoimN1BG', '34', '7', 'Gantungan kunci', 'gantungan kunci', 'akdamdkamdk', 5, NULL, '', 0, 0, NULL, NULL, NULL, NULL, 0, '0', 'asdad', 'http://percetakan.test/transaksi/invoice?d=I5MvD98EmzJTRX5WXRFhpFnQCoimN1BG', 'UNPAID', 'PENDING', 'Belum Diambil', '2024-01-27 02:13:50', '2024-01-27 02:15:26', 'User Mantap', 'user@user.com', '628123132213', '1706296526', NULL, NULL, NULL),
(264, '4Hgvc5lOddpGeJ10DYRtk7wJsKZ4x5ze', '41', '8', 'GARSKIN', 'Bahan cetak Garskin menggunakan bahan Maxdecal dengan 2 pilihan lamiasi ya itu Sandblas Asahi dan Doff dengan ketebalan 180Gr, Untuk lebar penyusunan desain maximal ukuran 120 x 85, jika lebih dari itu bisa di tambah di page berikutnya.', 'https://www.gsmarena.com/', 85, 5, 'Maxdecal', 120, 15, 5, 'Asahi', 6, 'Packing', 0, '212160', NULL, 'http://127.0.0.1:8000/transaksi/invoice?d=4Hgvc5lOddpGeJ10DYRtk7wJsKZ4x5ze', 'UNPAID', 'PENDING', 'Belum Diambil', '2024-02-02 22:37:49', '2024-02-02 22:37:50', 'Novrizal Zulfikar', 'Novrizalzulfikar@gmail.com', '82225556417', '1706888270', 'd6b2670d-d6e7-4dff-a30f-2d75c8df85b5', NULL, NULL),
(265, 'WxH9doF9a5copWnwzbDICwnfGdehcpaO', '41', '8', 'GARSKIN', 'Bahan cetak Garskin menggunakan bahan Maxdecal dengan 2 pilihan lamiasi ya itu Sandblas Asahi dan Doff dengan ketebalan 180Gr, Untuk lebar penyusunan desain maximal ukuran 120 x 85, jika lebih dari itu bisa di tambah di page berikutnya.', 'https://www.gsmarena.com/', 10, 5, 'Maxdecal', 120, 15, 4, 'Doff', 5, 'Packing', 0, '23880', NULL, 'http://127.0.0.1:8000/transaksi/invoice?d=WxH9doF9a5copWnwzbDICwnfGdehcpaO', 'UNPAID', 'PENDING', 'Belum Diambil', '2024-02-02 22:45:10', '2024-02-02 22:45:10', 'Novrizal Zulfikar', 'Novrizalzulfikar@gmail.com', '82225556417', '1706888710', NULL, NULL, NULL),
(266, 'SmXx4R0yT4xvcrOYnRI3l38aSpO8UqQK', '41', '8', 'GARSKIN', 'Bahan cetak Garskin menggunakan bahan Maxdecal dengan 2 pilihan lamiasi ya itu Sandblas Asahi dan Doff dengan ketebalan 180Gr, Untuk lebar penyusunan desain maximal ukuran 120 x 85, jika lebih dari itu bisa di tambah di page berikutnya.', 'https://www.gsmarena.com/', 12, 5, 'Maxdecal', 120, 15, 4, 'Doff', 5, 'Packing', 0, '28656', NULL, 'http://127.0.0.1:8000/transaksi/invoice?d=SmXx4R0yT4xvcrOYnRI3l38aSpO8UqQK', 'UNPAID', 'PENDING', 'Belum Diambil', '2024-02-02 22:45:32', '2024-02-02 22:45:33', 'Novrizal Zulfikar', 'Novrizalzulfikar@gmail.com', '82225556417', '1706888733', NULL, NULL, NULL),
(267, 'Y8tjMV31aaOjJuLrBSSVPGcGz3tlWWLF', '41', '8', 'GARSKIN', 'Bahan cetak Garskin menggunakan bahan Maxdecal dengan 2 pilihan lamiasi ya itu Sandblas Asahi dan Doff dengan ketebalan 180Gr, Untuk lebar penyusunan desain maximal ukuran 120 x 85, jika lebih dari itu bisa di tambah di page berikutnya.', 'https://www.gsmarena.com/', 12, 5, 'Maxdecal', 120, 15, 4, 'Doff', 5, 'Packing', 0, '28656', NULL, 'http://127.0.0.1:8000/transaksi/invoice?d=Y8tjMV31aaOjJuLrBSSVPGcGz3tlWWLF', 'UNPAID', 'PENDING', 'Belum Diambil', '2024-02-02 22:50:24', '2024-02-02 22:50:24', 'Novrizal Zulfikar', 'Novrizalzulfikar@gmail.com', '82225556417', '1706889024', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_settings_email`
--

CREATE TABLE `tb_settings_email` (
  `id` int(11) NOT NULL,
  `mail_transport` varchar(255) DEFAULT NULL,
  `mail_host` varchar(255) DEFAULT NULL,
  `mail_port` varchar(255) DEFAULT NULL,
  `mail_username` varchar(255) DEFAULT NULL,
  `mail_password` varchar(255) DEFAULT NULL,
  `mail_from` varchar(255) DEFAULT NULL,
  `mail_encryption` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_settings_email`
--

INSERT INTO `tb_settings_email` (`id`, `mail_transport`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_from`, `mail_encryption`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'mail.bikinweeb.com', '465', 'testing@bikinweeb.com', 'emailtesting', 'testing@bikinweeb.com', 'tls', '2023-11-21 03:38:17', '2023-11-20 20:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `tb_settings_midtrans`
--

CREATE TABLE `tb_settings_midtrans` (
  `id` int(11) NOT NULL,
  `merchant_id` text DEFAULT NULL,
  `client_key` text DEFAULT NULL,
  `server_key` text DEFAULT NULL,
  `is_production` text DEFAULT NULL,
  `snap_url` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_settings_midtrans`
--

INSERT INTO `tb_settings_midtrans` (`id`, `merchant_id`, `client_key`, `server_key`, `is_production`, `snap_url`, `created_at`, `updated_at`) VALUES
(1, 'G844163108', 'Mid-client-fofFBdMcIsmqaUEZ', 'Mid-server-Ax683UVqvKTGv0SUBa0bkmZ2', 'false', 'https://app.sandbox.midtrans.com/snap/snap.js', '2023-11-21 18:41:24', '2024-02-02 22:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_settings_web`
--

CREATE TABLE `tb_settings_web` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `nama_web` varchar(255) DEFAULT NULL,
  `payment` enum('MANUAL','OTOMATIS') DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `norek_bank` varchar(255) DEFAULT NULL,
  `nama_pemilik_bank` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `pesan_notif_order` text DEFAULT NULL,
  `pesan_notif_payment_sukses` text DEFAULT NULL,
  `pesan_notif_setelah_register` text DEFAULT NULL,
  `email_notif_order` longtext DEFAULT NULL,
  `email_notif_payment_sukses` longtext DEFAULT NULL,
  `email_notif_setelah_register` longtext DEFAULT NULL,
  `whatsapp_gateway` longtext DEFAULT NULL,
  `telegram_gateway` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_settings_web`
--

INSERT INTO `tb_settings_web` (`id`, `icon`, `nama_web`, `payment`, `nama_bank`, `norek_bank`, `nama_pemilik_bank`, `created_at`, `updated_at`, `pesan_notif_order`, `pesan_notif_payment_sukses`, `pesan_notif_setelah_register`, `email_notif_order`, `email_notif_payment_sukses`, `email_notif_setelah_register`, `whatsapp_gateway`, `telegram_gateway`) VALUES
(1, 'percetakan_logo.png', 'ROOM', 'OTOMATIS', 'BANK MANDIRI', '17762231', 'PT percetakan Indo', '2023-11-28 19:59:06', '2024-01-28 23:01:49', '<p>Hallo kak<strong> [nama_lengkap]</strong>,&nbsp;</p><p>&nbsp;</p><p>Terimakasih sudah melakukan pembelian. Silakan lakukan pembayaran sebelum <strong>[max_waktu_tagihan]&nbsp;</strong></p><p>&nbsp;</p><p>Berikut Rincian Tagihan Anda,&nbsp;</p><p>Nama Paket Berlangganan :&nbsp;</p><p><strong>[nama_paket]&nbsp;</strong></p><p>&nbsp;</p><p>Total Tagihan : Rp <strong>[total_tagihan]&nbsp;</strong></p><p>&nbsp;</p><p>Silakan lakukan pembayaran pada link invoice berikut: <strong>[invoice] &nbsp;</strong></p><p>&nbsp;</p><p>Lisensikey.com</p>', '<p>Horee!!&nbsp;</p><p>Pembayaran kamu berhasil,&nbsp;</p><p>Terimakasih sudah melakukan pembayaran. &nbsp;</p><p>&nbsp;</p><p>Berikut Rincian Pembelian kamu,&nbsp;</p><p>Nama Produk :&nbsp;</p><p><strong>[nama_produk]&nbsp;</strong></p><p>&nbsp;</p><p>Lisensi :<strong> [nama_lisensi]&nbsp;</strong></p><p>Diskon : Rp [<strong>nominal_diskon]&nbsp;</strong></p><p>Total Tagihan : Rp <strong>[total_tagihan]</strong>&nbsp;&nbsp;</p><p>Invoice : <strong>[invoice]&nbsp;</strong></p><p>&nbsp;</p><p>Berikut adalah link akses produk yang anda beli, silakan unduh/akses pada link berikut : <strong>[url_akses]</strong></p>', '<p>Hello kak <strong>[nama_lengkap],&nbsp;</strong></p><p>Terimakasih telah melakukan pendaftaran,&nbsp;</p><p>Berikut adalah akun akses anda.&nbsp;</p><p>&nbsp;</p><p>Nomor whatsapp : <strong>[nomor_whatsapp]&nbsp;</strong></p><p>Alamat Email : <strong>[email]&nbsp;</strong></p><p>Password : <strong>[password]</strong></p>', '<figure class=\"image\"><img style=\"aspect-ratio:391/129;\" src=\"http://membership.test/media/logo_1701833276.png\" width=\"391\" height=\"129\"></figure><p>Hallo kak<strong> [nama_lengkap]</strong>,&nbsp;</p><p>&nbsp;</p><p>Terimakasih sudah melakukan pembelian. Silakan lakukan pembayaran sebelum <strong>[max_waktu_tagihan]&nbsp;</strong></p><p>&nbsp;</p><p>Berikut Rincian Produk serta tagihan,&nbsp;</p><p>Nama Produk :&nbsp;</p><p><strong>[nama_produk]&nbsp;</strong></p><p>&nbsp;</p><p>Lisensi :<strong> [nama_lisensi]</strong>&nbsp;</p><p>Diskon : Rp [<strong>nominal_diskon]</strong>&nbsp;</p><p>Total Tagihan : Rp <strong>[total_tagihan]&nbsp;</strong></p><p>&nbsp;</p><p>Silakan lakukan pembayaran pada link invoice berikut: <strong>[invoice]</strong></p>', '<figure class=\"image\"><img style=\"aspect-ratio:391/129;\" src=\"http://membership.test/media/logo_1701832768.png\" width=\"391\" height=\"129\"></figure><p>Horee!!&nbsp;</p><p>Pembayaran kamu berhasil,&nbsp;</p><p>Terimakasih sudah melakukan pembayaran. &nbsp;</p><p>&nbsp;</p><p>Berikut Rincian Pembelian kamu,&nbsp;</p><p>Nama Produk :&nbsp;</p><p><strong>[nama_produk]&nbsp;</strong></p><p>&nbsp;</p><p>Lisensi :<strong> [nama_lisensi]&nbsp;</strong></p><p>Diskon : Rp [<strong>nominal_diskon]&nbsp;</strong></p><p>Total Tagihan : Rp <strong>[total_tagihan]</strong>&nbsp;&nbsp;</p><p>Invoice : <strong>[invoice]&nbsp;</strong></p><p>&nbsp;</p><p>Berikut adalah link akses produk yang anda beli, silakan unduh/akses pada link berikut : <strong>[url_akses]</strong></p>', '<figure class=\"image\"><img style=\"aspect-ratio:391/129;\" src=\"http://membership.test/media/logo_1701832695.png\" width=\"391\" height=\"129\"></figure><p>Hello kak <strong>[nama_lengkap],&nbsp;</strong></p><p>Terimakasih telah melakukan pendaftaran,&nbsp;</p><p>Berikut adalah akun akses anda.&nbsp;</p><p>&nbsp;</p><p>Nomor whatsapp : <strong>[nomor_whatsapp]&nbsp;</strong></p><p>Alamat Email : <strong>[email]&nbsp;</strong></p><p>Password : <strong>[password]</strong></p>', '$mantap = \'okeh\';', '$token = \'mantap\';');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` text DEFAULT NULL,
  `id_user` varchar(255) DEFAULT NULL,
  `id_layanan` varchar(255) DEFAULT NULL,
  `nama_layanan` varchar(255) DEFAULT NULL,
  `keterangan_layanan` varchar(255) DEFAULT NULL,
  `url_berkas` text DEFAULT NULL,
  `lebar` int(11) DEFAULT NULL,
  `id_bahan` int(11) DEFAULT NULL,
  `nama_bahan` text DEFAULT NULL,
  `panjang_bahan` int(11) DEFAULT NULL,
  `harga_bahan_cm2` int(11) DEFAULT NULL,
  `id_laminasi` int(11) DEFAULT NULL,
  `nama_laminasi` text DEFAULT NULL,
  `harga_laminasi_cm2` int(11) DEFAULT NULL,
  `addons_service` varchar(255) DEFAULT NULL,
  `harga_addons_service` int(11) DEFAULT 0,
  `total_tagihan` varchar(255) DEFAULT NULL,
  `catatan_order` text DEFAULT NULL,
  `url_invoice` text DEFAULT NULL,
  `status_pembayaran` varchar(255) DEFAULT NULL,
  `status_order` enum('PENDING','PROSES','SELESAI') DEFAULT 'PENDING',
  `status_pengambilan` enum('Belum Diambil','Sudah Diambil') DEFAULT 'Belum Diambil',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `id_midtrans` varchar(255) DEFAULT NULL,
  `snapToken` text DEFAULT NULL,
  `bukti_transfer` varchar(255) DEFAULT NULL,
  `type_pembayaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_transaksi`, `id_user`, `id_layanan`, `nama_layanan`, `keterangan_layanan`, `url_berkas`, `lebar`, `id_bahan`, `nama_bahan`, `panjang_bahan`, `harga_bahan_cm2`, `id_laminasi`, `nama_laminasi`, `harga_laminasi_cm2`, `addons_service`, `harga_addons_service`, `total_tagihan`, `catatan_order`, `url_invoice`, `status_pembayaran`, `status_order`, `status_pengambilan`, `created_at`, `updated_at`, `nama_lengkap`, `email`, `whatsapp`, `id_midtrans`, `snapToken`, `bukti_transfer`, `type_pembayaran`) VALUES
(253, 'QYawTPEbq7g0AxTtdUNRjvGcz9oHJCca', '34', '1', 'Banner', 'Bahan lumayan tebal bagus dan cocok untuk indoor ataupun outdoor', 'asdasdasd', 10, 2, 'MAXDECAL', 120, 17, 1, 'ASAHI', 3, NULL, 0, '24000', 'asdsad', 'http://percetakan.test/transaksi/invoice?d=QYawTPEbq7g0AxTtdUNRjvGcz9oHJCca', 'UNPAID', 'PENDING', 'Belum Diambil', '2024-01-26 04:02:26', '2024-02-02 21:49:32', 'User Mantap', 'user@user.com', '628123132213', '1706885372', '93458085-473c-418c-afb3-733197adfc3a', NULL, NULL),
(254, 'ARVSlnYYhig1i83kdB08Nzw5DwtW3G3a', '34', '7', 'Gantungan kunci', 'gantungan kunci', 'asdasdadasd', 100, 4, 'Alumunium', 10, 3, NULL, NULL, NULL, NULL, 0, '3000', 'asdad', 'http://percetakan.test/transaksi/invoice?d=ARVSlnYYhig1i83kdB08Nzw5DwtW3G3a', 'UNPAID', 'PENDING', 'Belum Diambil', '2024-01-27 02:20:08', '2024-02-02 21:49:32', 'User Mantap', 'user@user.com', '628123132213', '1706885372', '93458085-473c-418c-afb3-733197adfc3a', NULL, NULL),
(255, 'HAuJqIjquvYCDFDi2KQzg7NWe1c4blQl', '34', '1', 'Banner', 'Bahan lumayan tebal bagus dan cocok untuk indoor ataupun outdoor', 'asdasdsad', 10, 1, 'MAXDECAL', 120, 17, 1, 'ASAHI', 3, NULL, 10000, '24000', 'asdsad', 'http://percetakan.test/transaksi/invoice?d=HAuJqIjquvYCDFDi2KQzg7NWe1c4blQl', 'UNPAID', 'SELESAI', 'Belum Diambil', '2024-01-28 17:16:16', '2024-02-02 21:58:05', 'User Mantap', 'user@user.com', '628123132213', '1706442651', '0d4ece21-e151-46ae-a7dc-99a47a16ac0f', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomor_whatsapp` bigint(20) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bank_nama` varchar(255) DEFAULT NULL,
  `bank_norek` bigint(20) DEFAULT NULL,
  `bank_atas_nama` varchar(255) DEFAULT NULL,
  `komisi` varchar(255) DEFAULT '0',
  `id_afiliasi` varchar(255) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT '1',
  `first_send_akun` varchar(255) DEFAULT NULL,
  `id_telegram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `nomor_whatsapp`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `bank_nama`, `bank_norek`, `bank_atas_nama`, `komisi`, `id_afiliasi`, `is_active`, `first_send_akun`, `id_telegram`) VALUES
(1, 'admin', 'admin@admin.com', 81322222, NULL, '$2y$10$hlmi7QEYshVU9z8PBPlns.ft.tmQ/MzYTiHZkVxGr8JTPDx89Xxc2', NULL, '2023-11-12 07:08:22', '2023-12-06 16:10:10', 'BANK BCA (BANK CENTRAL ASIA)', 776612371, 'Alfarizy', '0', '2UU52skF', '1', '1', ''),
(34, 'User Mantap', 'user@user.com', 628123132213, NULL, '$2y$12$xu/0VMCWUQNkg7tf8R.ufuNbbkKk6fF8W2K23XIV0CCJCOefiM562', 'JmupJJqj3t7gI8V4Ji1Wm95DtuCjbysBOBYn6Tbvy14hVCDGVDxCcxlknksQ', '2023-12-16 05:16:32', '2024-01-12 20:14:16', NULL, NULL, NULL, '0', 'OGKmuvkP', '1', '1', ''),
(40, 'superadmin', 'superadmin@admin.com', 876123213, NULL, '$2y$10$hlmi7QEYshVU9z8PBPlns.ft.tmQ/MzYTiHZkVxGr8JTPDx89Xxc2', 'fZrfkH9ZMA4dJrg20fslzKdSnVLv7Mf4JMOsx02QlDYffgo4TIn8RjmSzGqb', NULL, NULL, NULL, NULL, NULL, '0', NULL, '1', NULL, ''),
(41, 'Novrizal Zulfikar', 'Novrizalzulfikar@gmail.com', 82225556417, NULL, '$2y$12$m2lzWAjq2c/5tKm/i6AKquuIoxFNa3o20n2CpBkTbycJcpc8pzzrO', 'BytAD4TSmZbkV3qePLf9XjwiG5YRE9I1IEp64xxYMIirSynAw72ZOHXJWWJm', '2024-02-02 15:35:36', '2024-02-02 15:35:36', NULL, NULL, NULL, '0', NULL, '1', NULL, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tb_addons_service`
--
ALTER TABLE `tb_addons_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bayar_semua`
--
ALTER TABLE `tb_bayar_semua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jenis_bahan`
--
ALTER TABLE `tb_jenis_bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jenis_laminasi`
--
ALTER TABLE `tb_jenis_laminasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_limit_order`
--
ALTER TABLE `tb_limit_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_review_transaksi`
--
ALTER TABLE `tb_review_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_settings_email`
--
ALTER TABLE `tb_settings_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_settings_midtrans`
--
ALTER TABLE `tb_settings_midtrans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_settings_web`
--
ALTER TABLE `tb_settings_web`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_addons_service`
--
ALTER TABLE `tb_addons_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_bayar_semua`
--
ALTER TABLE `tb_bayar_semua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_jenis_bahan`
--
ALTER TABLE `tb_jenis_bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_jenis_laminasi`
--
ALTER TABLE `tb_jenis_laminasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_limit_order`
--
ALTER TABLE `tb_limit_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_review_transaksi`
--
ALTER TABLE `tb_review_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `tb_settings_email`
--
ALTER TABLE `tb_settings_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_settings_midtrans`
--
ALTER TABLE `tb_settings_midtrans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_settings_web`
--
ALTER TABLE `tb_settings_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
