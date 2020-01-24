-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2020 at 07:02 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anime`
--

-- --------------------------------------------------------

--
-- Table structure for table `anime`
--

CREATE TABLE `anime` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_alternatif` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` float DEFAULT NULL,
  `voter` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_episode` int(11) DEFAULT NULL,
  `hari_tayang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anime`
--

INSERT INTO `anime` (`id`, `judul`, `judul_alternatif`, `rating`, `voter`, `status`, `total_episode`, `hari_tayang`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'One Punch Man 2nd Season Specials', 'one-punch-man-2nd-season-specials', 3, NULL, 'ongoing', 6, 'kamis', 'storage/files/2020/01/22/b1f34f49179adf62b1f06ed6b382ece7.jpg', '2020-01-23 16:06:39', '2020-01-23 16:06:39'),
(2, 'One Punch Man 2nd Season', 'one-punch-man-2nd-season', NULL, NULL, 'ended', 12, 'selasa', 'storage/files/2020/01/22/2d4115a95a8c1be89a2432f3f553677d.jpg', '2020-01-23 08:45:36', '2020-01-23 12:44:18'),
(3, 'Naruto', 'naruto', NULL, NULL, 'ended', 220, 'rabu', 'storage/files/2020/01/22/ee767327c026309b2edf36c995f0c23f.jpg', '2020-01-23 08:45:36', '2020-01-23 12:44:15'),
(4, 'Boruto: Naruto Next Generations', 'boruto-naruto-next-generations', NULL, NULL, 'ongoing', NULL, 'selasa', 'storage/files/2020/01/22/616a6d407e8cafd7ebbd2793de30d263.jpg', '2020-01-23 08:45:36', '2020-01-23 12:44:13'),
(5, 'Black Clover', 'black-clover', NULL, NULL, 'ongoing', NULL, 'senin', 'storage/files/2020/01/22/4f8f6184ee9a104eccb9805a13a56e70.jpg', '2020-01-23 08:45:36', '2020-01-23 12:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `anime_genre`
--

CREATE TABLE `anime_genre` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_anime` bigint(20) UNSIGNED DEFAULT NULL,
  `id_genre` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anime_genre`
--

INSERT INTO `anime_genre` (`id`, `id_anime`, `id_genre`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-01-22 08:51:54', '2020-01-22 08:51:54'),
(3, 5, 3, '2020-01-22 08:52:01', '2020-01-22 08:52:01'),
(4, 4, 1, '2020-01-22 08:52:05', '2020-01-22 08:52:05'),
(5, 3, 2, '2020-01-22 08:52:08', '2020-01-22 08:52:08'),
(6, 2, 3, '2020-01-22 08:52:11', '2020-01-22 08:52:11'),
(8, 5, 2, '2020-01-23 12:01:29', '2020-01-23 12:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `cb_menus`
--

CREATE TABLE `cb_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_number` int(11) NOT NULL DEFAULT 0,
  `cb_modules_id` int(11) DEFAULT NULL,
  `parent_cb_menus_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cb_menus`
--

INSERT INTO `cb_menus` (`id`, `name`, `icon`, `path`, `type`, `sort_number`, `cb_modules_id`, `parent_cb_menus_id`) VALUES
(1, 'Anime', NULL, NULL, 'module', 3, 1, NULL),
(3, 'Genre', NULL, NULL, 'module', 1, 3, NULL),
(5, 'Musim', NULL, NULL, 'module', 2, 5, NULL),
(6, 'Pengumuman', NULL, NULL, 'module', 0, 6, NULL),
(7, 'Video', NULL, NULL, 'module', 4, 7, NULL),
(8, 'Karakter', NULL, NULL, 'module', 0, 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cb_modules`
--

CREATE TABLE `cb_modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_column_build` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cb_modules`
--

INSERT INTO `cb_modules` (`id`, `name`, `icon`, `table_name`, `controller`, `last_column_build`) VALUES
(1, 'Anime', 'fa fa-youtube-play', 'anime', 'AdminAnimeController', '[{\"column_label\":\"Judul\",\"column_field\":\"judul\",\"column_type\":\"text\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Judul Alternatif\",\"column_field\":\"judul_alternatif\",\"column_type\":\"text\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Rating\",\"column_field\":\"rating\",\"column_type\":\"number\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":false,\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":false,\"column_add\":false,\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Voter\",\"column_field\":\"voter\",\"column_type\":\"number\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":false,\"column_browse\":true,\"column_detail\":\"on\",\"column_edit\":false,\"column_add\":false,\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Status\",\"column_field\":\"status\",\"column_type\":\"select_option\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[{\"key\":\"ended\",\"label\":\"Ended\"},{\"key\":\"ongoing\",\"label\":\"Ongoing\"}],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Total Episode\",\"column_field\":\"total_episode\",\"column_type\":\"number\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":false,\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Hari Tayang\",\"column_field\":\"hari_tayang\",\"column_type\":\"select_option\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[{\"key\":\"senin\",\"label\":\"Senin\"},{\"key\":\"selasa\",\"label\":\"Selasa\"},{\"key\":\"rabu\",\"label\":\"Rabu\"},{\"key\":\"kamis\",\"label\":\"Kamis\"},{\"key\":\"jumat\",\"label\":\"Ju\'mat\"},{\"key\":\"sabtu\",\"label\":\"Sabtu\"},{\"key\":\"minggu\",\"label\":\"Minggu\"}],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Foto\",\"column_field\":\"foto\",\"column_type\":\"image\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Created At\",\"column_field\":\"created_at\",\"column_type\":\"datetime\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":null,\"column_browse\":false,\"column_detail\":\"on\",\"column_edit\":null,\"column_add\":null,\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Updated At\",\"column_field\":\"updated_at\",\"column_type\":\"datetime\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":null,\"column_browse\":false,\"column_detail\":\"on\",\"column_edit\":null,\"column_add\":null,\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]}]'),
(2, 'Anime Genre', 'fa fa-tags', 'anime_genre', 'AdminAnimeGenreController', '[{\"column_label\":\"Anime\",\"column_field\":\"id_anime\",\"column_type\":\"select_table\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":\"anime\",\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":\"id\",\"column_option_display\":\"judul\",\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[{\"column\":\"id\",\"primary_key\":true,\"display\":false},{\"column\":\"judul\",\"primary_key\":false,\"display\":false},{\"column\":\"judul_alternatif\",\"primary_key\":false,\"display\":false},{\"column\":\"rating\",\"primary_key\":false,\"display\":false},{\"column\":\"voter\",\"primary_key\":false,\"display\":false},{\"column\":\"status\",\"primary_key\":false,\"display\":false},{\"column\":\"total_episode\",\"primary_key\":false,\"display\":false},{\"column\":\"hari_tayang\",\"primary_key\":false,\"display\":false},{\"column\":\"foto\",\"primary_key\":false,\"display\":false},{\"column\":\"created_at\",\"primary_key\":false,\"display\":false},{\"column\":\"updated_at\",\"primary_key\":false,\"display\":false}]},{\"column_label\":\"Genre\",\"column_field\":\"id_genre\",\"column_type\":\"select_table\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":\"genre\",\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":\"id\",\"column_option_display\":\"nama\",\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[{\"column\":\"id\",\"primary_key\":true,\"display\":false},{\"column\":\"nama\",\"primary_key\":false,\"display\":false},{\"column\":\"created_at\",\"primary_key\":false,\"display\":false},{\"column\":\"updated_at\",\"primary_key\":false,\"display\":false}]},{\"column_label\":\"Created At\",\"column_field\":\"created_at\",\"column_type\":\"datetime\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":null,\"column_browse\":false,\"column_detail\":\"on\",\"column_edit\":null,\"column_add\":null,\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Updated At\",\"column_field\":\"updated_at\",\"column_type\":\"datetime\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":null,\"column_browse\":false,\"column_detail\":\"on\",\"column_edit\":null,\"column_add\":null,\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]}]'),
(3, 'Genre', 'fa fa-tags', 'genre', 'AdminGenreController', '[{\"column_label\":\"Nama\",\"column_field\":\"nama\",\"column_type\":\"text\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Created At\",\"column_field\":\"created_at\",\"column_type\":\"datetime\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":null,\"column_browse\":false,\"column_detail\":\"on\",\"column_edit\":null,\"column_add\":null,\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Updated At\",\"column_field\":\"updated_at\",\"column_type\":\"datetime\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":null,\"column_browse\":false,\"column_detail\":\"on\",\"column_edit\":null,\"column_add\":null,\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]}]'),
(5, 'Musim', 'fa fa-sun-o', 'musim', 'AdminMusimController', '[{\"column_label\":\"Nama\",\"column_field\":\"nama\",\"column_type\":\"text\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Tahun\",\"column_field\":\"tahun\",\"column_type\":\"number\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Created At\",\"column_field\":\"created_at\",\"column_type\":\"datetime\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":null,\"column_browse\":false,\"column_detail\":\"on\",\"column_edit\":null,\"column_add\":null,\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Updated At\",\"column_field\":\"updated_at\",\"column_type\":\"datetime\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":null,\"column_browse\":false,\"column_detail\":\"on\",\"column_edit\":null,\"column_add\":null,\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]}]'),
(6, 'Pengumuman', 'fa fa-info', 'pengumuman', 'AdminPengumumanController', '[{\"column_label\":\"Judul\",\"column_field\":\"judul\",\"column_type\":\"text\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Isi\",\"column_field\":\"isi\",\"column_type\":\"wysiwyg\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":null,\"column_text_min\":null,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Tanggal Expire\",\"column_field\":\"tanggal_expire\",\"column_type\":\"custom\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Created At\",\"column_field\":\"created_at\",\"column_type\":\"datetime\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":null,\"column_browse\":false,\"column_detail\":\"on\",\"column_edit\":null,\"column_add\":null,\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Updated At\",\"column_field\":\"updated_at\",\"column_type\":\"datetime\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":null,\"column_browse\":false,\"column_detail\":\"on\",\"column_edit\":null,\"column_add\":null,\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]}]'),
(7, 'Video', 'fa fa-play', 'video', 'AdminVideoController', '[{\"column_label\":\"Judul\",\"column_field\":\"judul\",\"column_type\":\"text\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Tipe\",\"column_field\":\"tipe\",\"column_type\":\"select_option\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[{\"key\":\"episode\",\"label\":\"Episode\"},{\"key\":\"movie\",\"label\":\"Movie\"}],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Episode\",\"column_field\":\"episode\",\"column_type\":\"number\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Foto\",\"column_field\":\"foto\",\"column_type\":\"image\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Deskripsi\",\"column_field\":\"deskripsi\",\"column_type\":\"wysiwyg\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":null,\"column_text_min\":null,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Server1\",\"column_field\":\"server1\",\"column_type\":\"text\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Server2\",\"column_field\":\"server2\",\"column_type\":\"text\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":false,\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Server3\",\"column_field\":\"server3\",\"column_type\":\"text\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":false,\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Server4\",\"column_field\":\"server4\",\"column_type\":\"text\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":false,\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Jum Report\",\"column_field\":\"jum_report\",\"column_type\":\"number\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":false,\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":false,\"column_add\":false,\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Anime\",\"column_field\":\"id_anime\",\"column_type\":\"select_table\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":\"anime\",\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":\"id\",\"column_option_display\":\"judul\",\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[{\"column\":\"id\",\"primary_key\":true,\"display\":false},{\"column\":\"judul\",\"primary_key\":false,\"display\":false},{\"column\":\"judul_alternatif\",\"primary_key\":false,\"display\":false},{\"column\":\"rating\",\"primary_key\":false,\"display\":false},{\"column\":\"voter\",\"primary_key\":false,\"display\":false},{\"column\":\"status\",\"primary_key\":false,\"display\":false},{\"column\":\"total_episode\",\"primary_key\":false,\"display\":false},{\"column\":\"hari_tayang\",\"primary_key\":false,\"display\":false},{\"column\":\"foto\",\"primary_key\":false,\"display\":false},{\"column\":\"created_at\",\"primary_key\":false,\"display\":false},{\"column\":\"updated_at\",\"primary_key\":false,\"display\":false}]},{\"column_label\":\"Created At\",\"column_field\":\"created_at\",\"column_type\":\"datetime\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":null,\"column_browse\":false,\"column_detail\":\"on\",\"column_edit\":null,\"column_add\":null,\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Updated At\",\"column_field\":\"updated_at\",\"column_type\":\"datetime\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":null,\"column_browse\":false,\"column_detail\":\"on\",\"column_edit\":null,\"column_add\":null,\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]}]'),
(8, 'Karakter', 'fa fa-street-view', 'karakter', 'AdminKarakterController', '[{\"column_label\":\"Nama\",\"column_field\":\"nama\",\"column_type\":\"text\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Foto\",\"column_field\":\"foto\",\"column_type\":\"image\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Deskripsi\",\"column_field\":\"deskripsi\",\"column_type\":\"wysiwyg\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":null,\"column_text_max\":null,\"column_text_min\":null,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Created At\",\"column_field\":\"created_at\",\"column_type\":\"datetime\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":null,\"column_browse\":false,\"column_detail\":\"on\",\"column_edit\":null,\"column_add\":null,\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Updated At\",\"column_field\":\"updated_at\",\"column_type\":\"datetime\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":null,\"column_browse\":false,\"column_detail\":\"on\",\"column_edit\":null,\"column_add\":null,\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]}]'),
(9, 'Karakter Anime', 'fa fa-street-view', 'karakter_anime', 'AdminKarakterAnimeController', '[{\"column_label\":\"Anime\",\"column_field\":\"id_anime\",\"column_type\":\"select_table\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":\"anime\",\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":\"id\",\"column_option_display\":\"judul\",\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[{\"column\":\"id\",\"primary_key\":true,\"display\":false},{\"column\":\"judul\",\"primary_key\":false,\"display\":false},{\"column\":\"judul_alternatif\",\"primary_key\":false,\"display\":false},{\"column\":\"rating\",\"primary_key\":false,\"display\":false},{\"column\":\"voter\",\"primary_key\":false,\"display\":false},{\"column\":\"status\",\"primary_key\":false,\"display\":false},{\"column\":\"total_episode\",\"primary_key\":false,\"display\":false},{\"column\":\"hari_tayang\",\"primary_key\":false,\"display\":false},{\"column\":\"foto\",\"primary_key\":false,\"display\":false},{\"column\":\"created_at\",\"primary_key\":false,\"display\":false},{\"column\":\"updated_at\",\"primary_key\":false,\"display\":false}]},{\"column_label\":\"Karakter\",\"column_field\":\"id_karakter\",\"column_type\":\"select_table\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":\"karakter\",\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":\"id\",\"column_option_display\":\"nama\",\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":\"on\",\"column_browse\":\"on\",\"column_detail\":\"on\",\"column_edit\":\"on\",\"column_add\":\"on\",\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[{\"column\":\"id\",\"primary_key\":true,\"display\":false},{\"column\":\"nama\",\"primary_key\":false,\"display\":false},{\"column\":\"foto\",\"primary_key\":false,\"display\":false},{\"column\":\"deskripsi\",\"primary_key\":false,\"display\":false},{\"column\":\"created_at\",\"primary_key\":false,\"display\":false},{\"column\":\"updated_at\",\"primary_key\":false,\"display\":false}]},{\"column_label\":\"Created At\",\"column_field\":\"created_at\",\"column_type\":\"datetime\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":null,\"column_browse\":false,\"column_detail\":\"on\",\"column_edit\":null,\"column_add\":null,\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]},{\"column_label\":\"Updated At\",\"column_field\":\"updated_at\",\"column_type\":\"datetime\",\"column_file_encrypt\":\"on\",\"column_image_width\":null,\"column_image_height\":null,\"column_option_table\":null,\"column_date_format\":null,\"column_text_display_limit\":150,\"column_text_max\":255,\"column_text_min\":0,\"column_money_prefix\":null,\"column_money_precision\":null,\"column_money_thousand_separator\":null,\"column_money_decimal_separator\":null,\"column_option_value\":null,\"column_option_display\":null,\"column_option_sql_condition\":null,\"column_options\":[],\"column_sql_query\":null,\"column_help\":null,\"column_mandatory\":null,\"column_browse\":false,\"column_detail\":\"on\",\"column_edit\":null,\"column_add\":null,\"column_filterable\":null,\"column_foreign\":null,\"listTableColumns\":[]}]');

-- --------------------------------------------------------

--
-- Table structure for table `cb_roles`
--

CREATE TABLE `cb_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cb_roles`
--

INSERT INTO `cb_roles` (`id`, `name`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `cb_role_privileges`
--

CREATE TABLE `cb_role_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `cb_roles_id` int(11) NOT NULL,
  `cb_menus_id` int(11) NOT NULL,
  `can_browse` tinyint(4) NOT NULL DEFAULT 1,
  `can_create` tinyint(4) NOT NULL DEFAULT 1,
  `can_read` tinyint(4) NOT NULL DEFAULT 1,
  `can_update` tinyint(4) NOT NULL DEFAULT 1,
  `can_delete` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cb_role_privileges`
--

INSERT INTO `cb_role_privileges` (`id`, `cb_roles_id`, `cb_menus_id`, `can_browse`, `can_create`, `can_read`, `can_update`, `can_delete`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1),
(2, 1, 3, 1, 1, 1, 1, 1),
(3, 1, 4, 1, 1, 1, 1, 1),
(4, 1, 5, 1, 1, 1, 1, 1),
(5, 1, 6, 1, 1, 1, 1, 1),
(6, 1, 7, 1, 1, 1, 1, 1),
(7, 2, 1, 0, 0, 0, 0, 0),
(8, 2, 3, 0, 0, 0, 0, 0),
(9, 2, 4, 0, 0, 0, 0, 0),
(10, 2, 5, 0, 0, 0, 0, 0),
(11, 2, 6, 0, 0, 0, 0, 0),
(12, 2, 7, 0, 0, 0, 0, 0),
(13, 1, 8, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `id_video` bigint(20) UNSIGNED DEFAULT NULL,
  `id_genre` bigint(20) UNSIGNED DEFAULT NULL,
  `id_anime` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal` date NOT NULL,
  `counter` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `id_users`, `id_video`, `id_genre`, `id_anime`, `tanggal`, `counter`, `created_at`, `updated_at`) VALUES
(1, 1, 5, NULL, NULL, '2020-01-23', 7, '2020-01-23 16:41:19', '2020-01-23 16:41:19'),
(2, 1, NULL, NULL, 3, '2020-01-23', 7, '2020-01-23 16:41:19', '2020-01-23 16:41:19'),
(3, 1, NULL, 2, NULL, '2020-01-23', 6, '2020-01-23 16:41:19', '2020-01-23 16:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_alternatif` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `nama`, `created_at`, `updated_at`, `nama_alternatif`) VALUES
(1, 'Action', '2020-01-22 08:03:55', '2020-01-23 16:46:00', 'action'),
(2, 'Drama', '2020-01-22 08:04:00', '2020-01-23 16:46:04', 'drama'),
(3, 'Adventure', '2020-01-22 08:04:09', '2020-01-23 16:46:02', 'adventure');

-- --------------------------------------------------------

--
-- Table structure for table `karakter`
--

CREATE TABLE `karakter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `voter` int(11) DEFAULT NULL,
  `nama_alternatif` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karakter`
--

INSERT INTO `karakter` (`id`, `nama`, `foto`, `deskripsi`, `created_at`, `updated_at`, `voter`, `nama_alternatif`) VALUES
(1, 'Naruto Uzumaki', 'storage/files/2020/01/22/a03bcd9271d6a3d56323ea9d9495ef21.png', '<p>aaaaaaaa</p><p>aaaaaaaa</p><p>aaaaaaaa</p><p>aaaaaaaa</p><p>aaaaaaaa</p><p>aaaaaaaa</p><p>aaaaaaaa</p><p>aaaaaaaa</p><p>aaaaaaaa</p><p>aaaaaaaa</p><p>aaaaaaaa</p><p>aaaaaaaa</p><p>aaaaaaaa</p><p>aaaaaaaa</p><p>aaaaaaaa</p><p><br></p>', '2020-01-23 08:45:36', '2020-01-23 16:42:27', NULL, 'naruto-uzumaki'),
(2, 'Boruto Uzumaki', 'storage/files/2020/01/22/3f2896aebc9a99560b17169b34f8a80f.png', '<p>bbbbbbbbbbbbb</p><p>bbbbbbbbbbbbb</p><p>bbbbbbbbbbbbb</p><p>bbbbbbbbbbbbb</p><p>bbbbbbbbbbbbb</p><p>bbbbbbbbbbbbb</p><p>bbbbbbbbbbbbb</p><p>bbbbbbbbbbbbb</p><p>bbbbbbbbbbbbb</p><p>bbbbbbbbbbbbb</p><p>bbbbbbbbbbbbb</p><p>bbbbbbbbbbbbb</p><p>bbbbbbbbbbbbb</p><p>bbbbbbbbbbbbb</p><p>bbbbbbbbbbbbb</p><p>bbbbbbbbbbbbb</p><p>bbbbbbbbbbbbb</p><p>bbbbbbbbbbbbb</p><p>bbbbbbbbbbbbb</p><p>bbbbbbbbbbbbb</p><p>bbbbbbbbbbbbb</p><p>bbbbbbbbbbbbb</p><p>bbbbbbbbbbbbb</p><p><br></p>', '2020-01-23 08:45:36', '2020-01-23 16:42:42', NULL, 'boruto-uzumaki'),
(3, 'Saitama', 'storage/files/2020/01/22/05f18ebdb34eb5defddff1a6509c83b1.jpg', '<p>Saitama</p><p>Saitama</p><p>Saitama</p><p>Saitama</p><p>Saitama</p><p>Saitama</p><p>Saitama</p><p>Saitama</p><p>Saitama</p><p>Saitama</p><p>Saitama</p><p><br></p>', '2020-01-23 08:45:36', '2020-01-23 16:42:40', NULL, 'saitama'),
(4, 'Genos', 'storage/files/2020/01/22/65f1e9fc4a84734ccc21ad7778af8732.jpg', '<p>Genos</p><p>Genos</p><p>Genos</p><p>Genos</p><p>Genos</p><p>Genos</p><p>Genos</p><p>Genos</p><p>Genos</p><p>Genos</p><p>Genos</p><p>Genos</p><p>Genos</p><p>Genos</p><p>Genos</p><p>Genos</p><p><br></p>', '2020-01-23 08:45:36', '2020-01-23 16:42:38', NULL, 'genos'),
(5, 'Asta', 'storage/files/2020/01/22/3fbbc187339fb2a1c21c82a3248d0646.jpg', '<p>Asta</p><p>Asta</p><p>Asta</p><p>Asta</p><p>Asta</p><p>Asta</p><p>Asta</p><p>Asta</p><p>Asta</p><p>Asta</p><p>Asta</p><p>Asta</p><p>Asta</p><p><br></p>', '2020-01-23 08:45:36', '2020-01-23 16:42:36', NULL, 'asta'),
(6, 'Yuno', 'storage/files/2020/01/22/cc40de7337cb7465509b9c36367d7bff.png', '<p>Yuno</p><p>Yuno</p><p>Yuno</p><p>Yuno</p><p>Yuno</p><p>Yuno</p><p>Yuno</p><p>Yuno</p><p>Yuno</p><p>Yuno</p><p>Yuno</p><p>Yuno</p><p>Yuno</p><p>Yuno</p><p>Yuno</p><p><br></p>', '2020-01-23 08:45:36', '2020-01-23 16:42:29', NULL, 'yuno');

-- --------------------------------------------------------

--
-- Table structure for table `karakter_anime`
--

CREATE TABLE `karakter_anime` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_anime` bigint(20) UNSIGNED DEFAULT NULL,
  `id_karakter` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karakter_anime`
--

INSERT INTO `karakter_anime` (`id`, `id_anime`, `id_karakter`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2020-01-22 10:54:16', '2020-01-22 10:54:16'),
(2, 4, 1, '2020-01-22 10:54:25', '2020-01-22 10:54:25'),
(3, 5, 6, '2020-01-22 10:54:36', '2020-01-22 10:54:36'),
(4, 5, 5, '2020-01-22 10:54:41', '2020-01-22 10:54:41'),
(5, 1, 4, '2020-01-22 10:55:02', '2020-01-22 10:55:02'),
(6, 2, 4, '2020-01-22 10:55:07', '2020-01-22 10:55:07'),
(7, 1, 3, '2020-01-22 10:55:16', '2020-01-22 10:55:16'),
(8, 2, 3, '2020-01-22 10:55:21', '2020-01-22 10:55:21'),
(9, 4, 2, '2020-01-22 10:55:28', '2020-01-22 10:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_08_07_152421_modify_users', 1),
(4, '2016_08_07_152421_table_menus', 1),
(5, '2016_08_07_152421_table_modules', 1),
(6, '2016_08_07_152421_table_role_privileges', 1),
(7, '2016_08_07_152421_table_roles', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2020_01_20_175551_pengumuman', 1),
(10, '2020_01_20_175557_genre', 1),
(11, '2020_01_20_175602_anime', 1),
(12, '2020_01_20_175607_video', 1),
(15, '2020_01_20_175621_rating', 1),
(16, '2020_01_20_175626_counter', 1),
(17, '2020_01_21_044420_anime_genre', 1),
(18, '2020_01_20_175612_karakter', 2),
(19, '2020_01_22_173535_karakter_anime', 2),
(20, '2020_01_20_175617_vote', 3),
(21, '2020_01_23_151024_vote_karekter', 4),
(22, '2020_01_23_193905_judul_alternatif_video', 5),
(24, '2020_01_23_195008_nama_alternatif_karakter', 6),
(25, '2020_01_23_195414_nama_alternatif_genre', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_expire` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `isi`, `tanggal_expire`, `created_at`, `updated_at`) VALUES
(1, 'Pemngumuman 1', '<p>Ini <b>Adalah </b>pengumuman <b>pertama</b></p>', '2020-01-22', '2020-01-22 08:02:45', '2020-01-22 08:02:45'),
(2, 'Pemngumuman 2', '<p><u>Pengumuman</u> <b>kedua </b>mohon <i>dibaca</i></p>', '2020-01-22', '2020-01-22 08:03:25', '2020-01-22 08:03:25'),
(3, 'Pengumuman 3', '<p><b>Pengumuman 3Pengumuman 3Pengumuman 3Pengumuman 3Pengumuman 3Pengumuman 3Pengumuman 3</b><br></p>', '2020-01-24', '2020-01-23 16:50:41', '2020-01-23 16:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `id_anime` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `id_users`, `id_anime`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, '2020-01-23 16:06:39', '2020-01-23 16:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cb_roles_id` int(11) NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `photo`, `cb_roles_id`, `ip_address`, `user_agent`, `login_at`) VALUES
(1, 'Ersa Azis Mansyur', 'eam24maret@gmail.com', NULL, '$2y$10$E2U1Wuz.iyzmVPW3UjMTPO5vZ7w4AIE5/RhV.2dPrLtIyn06j3YMG', NULL, NULL, NULL, NULL, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', '2020-01-23 15:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `episode` int(11) NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `server1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `server3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `server4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jum_report` int(11) DEFAULT NULL,
  `id_anime` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `judul_alternatif` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `judul`, `tipe`, `episode`, `foto`, `deskripsi`, `server1`, `server2`, `server3`, `server4`, `jum_report`, `id_anime`, `created_at`, `updated_at`, `judul_alternatif`) VALUES
(1, 'Episode 001 Sub Indo', 'episode', 1, 'storage/files/2020/01/22/493e72cc5b570d726900c55f7e8ad105.jpg', '<p>asd asdasd asd as das das da sd asd as das das das das&nbsp;</p>', 'https://uservideo.xyz/file/nanime.opm.s2.sp.01.720p.mp4?embed=true&autoplay=true', 'https://uservideo.xyz/file/nanime.opm.s2.sp.01.480p.mp4?embed=true&autoplay=true', 'https://naniplay.nanime.in/file/nanime.opm.s2.sp.01.720p.mp4?embed=true&autoplay=true', 'https://naniplay.nanime.in/file/nanime.opm.s2.sp.01.480p.mp4?embed=true&autoplay=true', NULL, 1, '2020-01-22 09:22:49', '2020-01-23 12:45:23', 'episode-001-sub-indo'),
(2, 'Episode 002 Sub Indo', 'episode', 2, 'storage/files/2020/01/22/ec37ab5cf9aed7fb2638502f6d9fc574.jpg', '<p>aaaaaaaaa aaaaaaaaaa aaaaaaaaaaa aaaaaaaaaaa</p>', 'https://uservideo.xyz/file/nanime.opm.s2.sp.02.480p.mp4?embed=true&autoplay=true', 'https://uservideo.xyz/file/nanime.opm.s2.sp.02.720p.mp4?embed=true&autoplay=true', 'https://naniplay.nanime.in/file/nanime.opm.s2.sp.02.480p.mp4?embed=true&autoplay=true', 'https://naniplay.nanime.in/file/nanime.opm.s2.sp.02.720p.mp4?embed=true&autoplay=true', NULL, 1, '2020-01-22 09:25:26', '2020-01-23 12:45:56', 'episode-002-sub-indo'),
(3, 'Episode 1 Sub Indo', 'episode', 1, 'storage/files/2020/01/22/418e5b0d9745212f31b692d65b19da89.jpg', '<p>aaaaaaaaaaaa</p>', 'https://uservideo.xyz/file/nanime.opm.s2.01.480p.mp4?embed=true&autoplay=true', 'https://vidoza.net/fqmrxh66unsy.html?1080p?embed=true&autoplay=true', 'https://vidoza.net/5di8l6rn35bk.html?embed=true&autoplay=true', 'https://nanifile.nanime.in/file/nanime.opm.s2.01.480p.mp4?embed=true&autoplay=true', NULL, 2, '2020-01-22 09:28:13', '2020-01-23 12:45:54', 'episode-1-sub-indo'),
(4, 'Episode 2 Sub Indo', 'episode', 2, 'storage/files/2020/01/22/49ae45202853974ccf3c07c7f33bd2d3.jpg', '<div class=\"attachment-text\" style=\"color: rgb(85, 85, 85); background-color: rgb(247, 247, 247);\">Season kedua dari seri One Punch Man.</div><div><br></div>', 'https://uservideo.nanime.in/file/nanime.opm.s2.02.480p.mp4?embed=true&autoplay=true', 'https://vidoza.net/31i0zb8ylrem.html?embed=true&autoplay=true', 'https://vidoza.net/q9smj3227oop.html?1080p?embed=true&autoplay=true', 'https://nanifile.nanime.in/file/nanime.opm.s2.02.480p.mp4?embed=true&autoplay=true', NULL, 2, '2020-01-22 09:29:46', '2020-01-23 12:45:52', 'episode-2-sub-indo'),
(5, 'Episode 1 Sub Indo', 'episode', 1, 'storage/files/2020/01/22/b9faacafccdbbb70064788cd064eda2a.jpg', '<p><span style=\"color: rgb(85, 85, 85); background-color: rgb(247, 247, 247);\">Naruto adalah sebuah serial manga karya Masashi Kishimoto yang diadaptasi menjadi serial anime. Manga Naruto bercerita seputar kehidupan tokoh utamanya, Naruto Uzumaki, seorang ninja yang hiperaktif, periang, dan ambisius yang ingin mewujudkan keinginannya untuk mendapatkan gelar Hokage, pemimpin dan ninja terkuat di desanya. Serial ini didasarkan pada komik one-shot oleh Kishimoto yang diterbitkan dalam edisi Akamaru Jump pada Agustus 1997.</span><br></p>', 'https://uservideo.xyz/file/nanime.org.naruto.e01.sub.indo.480p.mp4?embed=true&autoplay=true', 'https://vidoza.nanime.in/file/nanime.org.naruto.e01.sub.indo.480p.mp4?embed=true&autoplay=true', NULL, NULL, NULL, 3, '2020-01-22 09:33:29', '2020-01-23 12:45:49', 'episode-1-sub-indo'),
(6, 'Episode 2 Sub Indo', 'episode', 2, 'storage/files/2020/01/22/1ea8335edb1db171c3facf2f81eea99f.jpg', '<div class=\"attachment-text\" style=\"color: rgb(85, 85, 85); background-color: rgb(247, 247, 247);\">Naruto adalah sebuah serial manga karya Masashi Kishimoto yang diadaptasi menjadi serial anime. Manga Naruto bercerita seputar kehidupan tokoh utamanya, Naruto Uzumaki, seorang ninja yang hiperaktif, periang, dan ambisius yang ingin mewujudkan keinginannya untuk mendapatkan gelar Hokage, pemimpin dan ninja terkuat di desanya. Serial ini didasarkan pada komik one-shot oleh Kishimoto yang diterbitkan dalam edisi Akamaru Jump pada Agustus 1997.</div><div><br></div>', 'https://uservideo.xyz/file/nanime.org.naruto.e02.sub.indo.480p.mp4?embed=true&autoplay=true', 'https://vidoza.nanime.in/file/nanime.org.naruto.e02.sub.indo.480p.mp4?embed=true&autoplay=true', NULL, NULL, NULL, 3, '2020-01-22 09:34:18', '2020-01-23 12:45:47', 'episode-2-sub-indo'),
(7, 'Naruto the Movie: Ninja Clash in the Land of Snow Sub Indo', 'movie', 1, 'storage/files/2020/01/22/51a838c7f889108c3a868f057df51abd.jpg', '<p><span style=\"color: rgb(85, 85, 85); background-color: rgb(247, 247, 247);\">Naruto dan timnya kini berangkat dalam misi untuk menjaga Yukie, aktris yang populer membintangi film sukses The Adventures of Princess Gale.</span><br></p>', 'https://vidoza.net/embed-oo847pmp46ib.html?720p?embed=true&autoplay=true', 'https://vidoza.net/embed-9pmijn0lci92.html?embed=true&autoplay=true', 'https://nanifile.com/plugins/mediaplayer/site/_embed.php?u=IP&w=640&h=320?embed=true&autoplay=true', 'https://nanifile.com/plugins/mediaplayer/site/_embed.php?u=IO&w=640&h=320?embed=true&autoplay=true', NULL, 3, '2020-01-22 09:35:58', '2020-01-23 12:45:45', 'naruto-the-movie-ninja-clash-in-the-land-of-snow-sub-indo'),
(8, 'Naruto the Movie 2: Legend of the Stone of Gelel Sub Indo', 'movie', 2, 'storage/files/2020/01/22/86a1359decf2575718d458a0feb7cf33.jpg', '<p><span style=\"color: rgb(85, 85, 85); background-color: rgb(247, 247, 247);\">Naruto, Shikamaru dan Sakura sedang dalam misi untuk mengantarkan hewan kesayangan ke sebuah desa saat seorang ksatria misterius muncul untuk menghadapi mereka.</span><br></p>', 'https://vidoza.net/embed-2jpx8wm0wl36.html?720p?embed=true&autoplay=true', 'https://vidoza.net/embed-zrxw77dbba7l.html?embed=true&autoplay=true', 'https://nanifile.com/plugins/mediaplayer/site/_embed.php?u=tm&w=640&h=320?embed=true&autoplay=true', 'https://nanifile.com/plugins/mediaplayer/site/_embed.php?u=tl&w=640&h=320?embed=true&autoplay=true', NULL, 3, '2020-01-22 09:36:53', '2020-01-23 12:45:42', 'naruto-the-movie-2-legend-of-the-stone-of-gelel-sub-indo'),
(9, 'Episode 1 Sub Indo', 'episode', 1, 'storage/files/2020/01/22/99b5b658726f661396d2587b7e635665.jpg', '<p>aaaaaaaaaaaaaaaaaaaaa</p>', 'https://uservideo.xyz/file/nanime.in.boruto.e01.sub.indo.480p.mp4?embed=true&autoplay=true', 'https://uservideo.xyz/file/nanime.in.boruto.e01.sub.indo.720p.mp4?embed=true&autoplay=true', 'https://naniplay.nanime.in/file/nanime.in.boruto.e01.sub.indo.480p.mp4?embed=true&autoplay=true', 'https://naniplay.nanime.in/file/nanime.in.boruto.e01.sub.indo.720p.mp4?embed=true&autoplay=true', NULL, 4, '2020-01-22 09:39:30', '2020-01-23 12:45:40', 'episode-1-sub-indo'),
(10, 'Episode 2 Sub Indo', 'episode', 2, 'storage/files/2020/01/22/7d50d467d8b32a2e8652995e889931c2.jpg', '<p><span style=\"color: rgb(85, 85, 85); background-color: rgb(247, 247, 247);\">Setelah berakhirnya Perang Dunia Shinobi Keempat, Konohagakure menikmati masa damai, kemakmuran, dan kemajuan teknologi yang luar biasa. Ini semua karena upaya Pasukan Sekutu Shinobi dan Hokage Ketujuh desa, Naruto Uzumaki. Kini menyerupai kota metropolis modern, Konohagakure telah berubah, terutama kehidupan shinobi. Di bawah pengawasan ketat Naruto dan rekan-rekan lamanya, generasi baru shinobi telah melangkah untuk mempelajari cara ninja.Boruto Uzumaki sering menjadi pusat perhatian sebagai anak Hokage Ketujuh. Meskipun memiliki warisan Naruto riuh dan keras kepala, Boruto dianggap sebagai anak ajaib dan mampu melepaskan potensinya dengan bantuan teman dan keluarga yang mendukung. Sayangnya, ini hanya memperburuk arogansi dan keinginannya untuk melampaui Naruto yang, bersama dengan gaya hidup ayahnya yang sibuk, telah menegangkan hubungan mereka. Namun, kekuatan jahat yang berkembang di dalam desa dapat mengancam kehidupan Borobudur yang ceria. Teman baru dan wajah akrab bergabung dengan Boruto sebagai cerita baru dimulai di Boruto: Naruto Next Generations.</span><br></p>', 'https://uservideo.xyz/file/nanime.in.boruto.e02.sub.indo.480p.mp4?embed=true&autoplay=true', 'https://uservideo.xyz/file/nanime.in.boruto.e02.sub.indo.720p.mp4?embed=true&autoplay=true', 'https://naniplay.nanime.in/file/nanime.in.boruto.e02.sub.indo.480p.mp4?embed=true&autoplay=true', 'https://naniplay.nanime.in/file/nanime.in.boruto.e02.sub.indo.720p.mp4?embed=true&autoplay=true', NULL, 4, '2020-01-22 09:40:20', '2020-01-23 12:45:32', 'episode-2-sub-indo'),
(11, 'Episode 1 Sub Indo', 'episode', 1, 'storage/files/2020/01/22/459fe78f203c9c6d1b7b47cff8809252.jpg', '<p><span style=\"color: rgb(85, 85, 85); background-color: rgb(247, 247, 247);\">Asta dan Yuno ditinggalkan di gereja yang sama pada hari yang sama. Dibesarkan bersama sebagai anak-anak, mereka mengetahui tentang \"Raja Penyihir\" - sebuah gelar yang diberikan kepada penyihir terkuat di kerajaan - dan berjanji bahwa mereka akan bersaing satu sama lain untuk posisi Raja Penyihir berikutnya. Namun, saat mereka dewasa, perbedaan mencolok antara keduanya menjadi nyata. Sementara Yuno mampu menggunakan sihir dengan kekuatan dan kontrol yang luar biasa, Asta sama sekali tidak bisa menggunakan sihir dan dengan putus asa mencoba membangunkan kekuatannya dengan berlatih secara fisik. Ketika mereka mencapai usia 15 tahun, Yuno dianugerahi Grimoire yang spektakuler dengan semanggi empat daun, sementara Asta tidak menerima apapun. Namun, tak lama kemudian, Yuno diserang oleh seseorang bernama Lebuty, yang tujuan utamanya adalah untuk mendapatkan Grimoo dari Yuno. Asta mencoba untuk melawan Lebuty, tapi dia kalah bersaing. Meski tanpa harapan dan di ambang kekalahan, ia menemukan kekuatan untuk terus berlanjut saat ia mendengar suara Yuno. Melepaskan emosi batinnya dalam kemarahan, Asta menerima semanggi lima daun Grimoire, sebuah \"Clover Hitam\" yang memberinya cukup kekuatan untuk mengalahkan Lebuty. Beberapa hari kemudian, kedua teman itu menuju ke dunia, keduanya mencari tujuan yang sama-untuk menjadi Raja Penyihir.</span><br></p>', 'https://uservideo.xyz/file/nanime.org.black.clover.e01.480p.sub.indo.mp4?embed=true&autoplay=true', 'https://vidoza.net/embed-hkth9kelyflg.html?embed=true&autoplay=true', 'https://vidoza.net/embed-fnfwft4ixomj.html?720p?embed=true&autoplay=true', NULL, NULL, 5, '2020-01-22 09:41:54', '2020-01-23 12:45:29', 'episode-1-sub-indo'),
(12, 'Episode 2 Sub Indo', 'episode', 2, 'storage/files/2020/01/22/9e3d430044d6b2794d5f78b7a0a17c78.jpg', '<p><span style=\"color: rgb(34, 34, 34); font-family: Consolas, &quot;Lucida Console&quot;, &quot;Courier New&quot;, monospace; font-size: 12px; white-space: pre-wrap;\">https://uservideo.xyz/file/nanime.org.black.clover.e02.480p.sub.indo.mp4?embed=true&amp;autoplay=true</span><br></p>', 'https://uservideo.xyz/file/nanime.org.black.clover.e02.480p.sub.indo.mp4?embed=true&autoplay=true', 'https://vidoza.net/embed-1csu9d4jdvkp.html?embed=true&autoplay=true', 'https://vidoza.net/embed-9bn95uxeyobn.html?720p?embed=true&autoplay=true', NULL, NULL, 5, '2020-01-22 09:42:57', '2020-01-23 12:45:25', 'episode-2-sub-indo');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `id_karakter` bigint(20) UNSIGNED DEFAULT NULL,
  `id_anime` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`id`, `id_users`, `id_karakter`, `id_anime`, `created_at`, `updated_at`) VALUES
(4, 1, NULL, 1, '2020-01-23 16:30:58', '2020-01-23 16:30:58'),
(5, 1, 1, NULL, '2020-01-23 16:31:40', '2020-01-23 16:31:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anime_genre`
--
ALTER TABLE `anime_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anime_genre_id_anime_foreign` (`id_anime`),
  ADD KEY `anime_genre_id_genre_foreign` (`id_genre`);

--
-- Indexes for table `cb_menus`
--
ALTER TABLE `cb_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cb_modules`
--
ALTER TABLE `cb_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cb_roles`
--
ALTER TABLE `cb_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cb_role_privileges`
--
ALTER TABLE `cb_role_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counter_id_users_foreign` (`id_users`),
  ADD KEY `counter_id_video_foreign` (`id_video`),
  ADD KEY `counter_id_genre_foreign` (`id_genre`),
  ADD KEY `counter_id_anime_foreign` (`id_anime`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karakter`
--
ALTER TABLE `karakter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karakter_anime`
--
ALTER TABLE `karakter_anime`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karakter_anime_id_anime_foreign` (`id_anime`),
  ADD KEY `karakter_anime_id_karakter_foreign` (`id_karakter`);

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
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_id_users_foreign` (`id_users`),
  ADD KEY `rating_id_anime_foreign` (`id_anime`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_id_anime_foreign` (`id_anime`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vote_id_users_foreign` (`id_users`),
  ADD KEY `vote_id_karakter_foreign` (`id_karakter`),
  ADD KEY `vote_id_anime_foreign` (`id_anime`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anime`
--
ALTER TABLE `anime`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `anime_genre`
--
ALTER TABLE `anime_genre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cb_menus`
--
ALTER TABLE `cb_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cb_modules`
--
ALTER TABLE `cb_modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cb_roles`
--
ALTER TABLE `cb_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cb_role_privileges`
--
ALTER TABLE `cb_role_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `karakter`
--
ALTER TABLE `karakter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `karakter_anime`
--
ALTER TABLE `karakter_anime`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anime_genre`
--
ALTER TABLE `anime_genre`
  ADD CONSTRAINT `anime_genre_id_anime_foreign` FOREIGN KEY (`id_anime`) REFERENCES `anime` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `anime_genre_id_genre_foreign` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `counter`
--
ALTER TABLE `counter`
  ADD CONSTRAINT `counter_id_anime_foreign` FOREIGN KEY (`id_anime`) REFERENCES `anime` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `counter_id_genre_foreign` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `counter_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `counter_id_video_foreign` FOREIGN KEY (`id_video`) REFERENCES `video` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `karakter_anime`
--
ALTER TABLE `karakter_anime`
  ADD CONSTRAINT `karakter_anime_id_anime_foreign` FOREIGN KEY (`id_anime`) REFERENCES `anime` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `karakter_anime_id_karakter_foreign` FOREIGN KEY (`id_karakter`) REFERENCES `karakter` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_id_anime_foreign` FOREIGN KEY (`id_anime`) REFERENCES `anime` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rating_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_id_anime_foreign` FOREIGN KEY (`id_anime`) REFERENCES `anime` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_id_anime_foreign` FOREIGN KEY (`id_anime`) REFERENCES `anime` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vote_id_karakter_foreign` FOREIGN KEY (`id_karakter`) REFERENCES `karakter` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vote_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
