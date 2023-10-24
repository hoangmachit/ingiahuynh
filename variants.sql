-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table createdatabase.table_migrations
CREATE TABLE IF NOT EXISTS `table_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table createdatabase.table_migrations: ~15 rows (approximately)
/*!40000 ALTER TABLE `table_migrations` DISABLE KEYS */;
INSERT INTO `table_migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(2, '2023_10_24_080638_create_product_can_mangs_table', 1),
	(3, '2023_10_24_080653_create_product_chat_lieus_table', 1),
	(4, '2023_10_24_080706_create_product_kho_ins_table', 1),
	(5, '2023_10_24_080706_create_product_mat_ins_table', 1),
	(6, '2023_10_24_080706_create_product_quy_caches_table', 1),
	(7, '2023_10_24_080706_create_product_so_luongs_table', 1),
	(8, '2023_10_24_080719_create_product_kich_thuocs_table', 1),
	(9, '2023_10_24_080719_create_product_thoi_gians_table', 1),
	(10, '2023_10_24_080731_create_product_kich_thuoc_chat_lieus_table', 1),
	(11, '2023_10_24_080744_create_product_kich_thuoc_chat_lieu_can_mangs_table', 1),
	(12, '2023_10_24_080805_create_product_kich_thuoc_chat_lieu_mat_ins_table', 1),
	(13, '2023_10_24_080818_create_product_kich_thuoc_chat_lieu_quy_caches_table', 1),
	(14, '2023_10_24_080830_create_product_kich_thuoc_chat_lieu_soluongs_table', 1),
	(15, '2023_10_24_081000_create_product_kich_thuoc_chat_lieu_thoi_gians_table', 1);
/*!40000 ALTER TABLE `table_migrations` ENABLE KEYS */;

-- Dumping structure for table createdatabase.table_personal_access_tokens
CREATE TABLE IF NOT EXISTS `table_personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `table_personal_access_tokens_token_unique` (`token`),
  KEY `table_personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table createdatabase.table_personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `table_personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table createdatabase.table_product_can_mangs
CREATE TABLE IF NOT EXISTS `table_product_can_mangs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` int(11) NOT NULL DEFAULT '300',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table createdatabase.table_product_can_mangs: ~3 rows (approximately)
/*!40000 ALTER TABLE `table_product_can_mangs` DISABLE KEYS */;
INSERT INTO `table_product_can_mangs` (`id`, `name`, `percent`, `created_at`, `updated_at`) VALUES
	(1, 'Không có cán màng', 0, NULL, NULL),
	(2, 'Bóng mờ', 300, NULL, NULL),
	(3, 'Bóng mờ 1', 300, NULL, NULL);
/*!40000 ALTER TABLE `table_product_can_mangs` ENABLE KEYS */;

-- Dumping structure for table createdatabase.table_product_chat_lieus
CREATE TABLE IF NOT EXISTS `table_product_chat_lieus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table createdatabase.table_product_chat_lieus: ~13 rows (approximately)
/*!40000 ALTER TABLE `table_product_chat_lieus` DISABLE KEYS */;
INSERT INTO `table_product_chat_lieus` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'DECAL ĐẾ XANH', NULL, NULL),
	(2, 'DECAL GIẤY OJLABEL', NULL, NULL),
	(3, 'DECAL NHỰA AMAZON', NULL, NULL),
	(4, 'DECAL TRONG AMAZON', NULL, NULL),
	(5, 'DECAL KRAFT', NULL, NULL),
	(6, 'DECAL FASHION', NULL, NULL),
	(7, 'DECAL BẠC MỜ', NULL, NULL),
	(8, 'DECAL BẠC BÓNG', NULL, NULL),
	(9, 'DECAL 7 MÀU', NULL, NULL),
	(10, 'DECAL TRONG KHÔNG TRÓC', NULL, NULL),
	(11, 'DECAL BẾ DẺO ĐẾ TRẮNG', NULL, NULL),
	(12, 'DECAL BỂ GIÒN ĐẾ AMAZON', NULL, NULL),
	(13, 'DECAL TỔ ONG', NULL, NULL);
/*!40000 ALTER TABLE `table_product_chat_lieus` ENABLE KEYS */;

-- Dumping structure for table createdatabase.table_product_kho_ins
CREATE TABLE IF NOT EXISTS `table_product_kho_ins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `left` int(11) NOT NULL DEFAULT '0',
  `right` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table createdatabase.table_product_kho_ins: ~7 rows (approximately)
/*!40000 ALTER TABLE `table_product_kho_ins` DISABLE KEYS */;
INSERT INTO `table_product_kho_ins` (`id`, `left`, `right`, `created_at`, `updated_at`) VALUES
	(1, 33, 35, NULL, NULL),
	(2, 33, 48, NULL, NULL),
	(3, 30, 35, NULL, NULL),
	(4, 25, 35, NULL, NULL),
	(5, 33, 35, NULL, NULL),
	(6, 37, 40, NULL, NULL),
	(7, 33, 40, NULL, NULL);
/*!40000 ALTER TABLE `table_product_kho_ins` ENABLE KEYS */;

-- Dumping structure for table createdatabase.table_product_kich_thuocs
CREATE TABLE IF NOT EXISTS `table_product_kich_thuocs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `length` int(11) NOT NULL DEFAULT '0',
  `width` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table createdatabase.table_product_kich_thuocs: ~0 rows (approximately)
/*!40000 ALTER TABLE `table_product_kich_thuocs` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_product_kich_thuocs` ENABLE KEYS */;

-- Dumping structure for table createdatabase.table_product_kich_thuoc_chat_lieus
CREATE TABLE IF NOT EXISTS `table_product_kich_thuoc_chat_lieus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kt_id` bigint(20) unsigned NOT NULL,
  `cl_id` bigint(20) unsigned NOT NULL,
  `ki_id` bigint(20) unsigned NOT NULL,
  `total_count_decal` int(11) NOT NULL DEFAULT '0',
  `price_nl_m2` int(11) NOT NULL DEFAULT '0',
  `price_nl` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `table_product_kich_thuoc_chat_lieus_kt_id_foreign` (`kt_id`),
  KEY `table_product_kich_thuoc_chat_lieus_cl_id_foreign` (`cl_id`),
  KEY `table_product_kich_thuoc_chat_lieus_ki_id_foreign` (`ki_id`),
  CONSTRAINT `table_product_kich_thuoc_chat_lieus_cl_id_foreign` FOREIGN KEY (`cl_id`) REFERENCES `table_product_chat_lieus` (`id`),
  CONSTRAINT `table_product_kich_thuoc_chat_lieus_ki_id_foreign` FOREIGN KEY (`ki_id`) REFERENCES `table_product_kho_ins` (`id`),
  CONSTRAINT `table_product_kich_thuoc_chat_lieus_kt_id_foreign` FOREIGN KEY (`kt_id`) REFERENCES `table_product_kich_thuocs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table createdatabase.table_product_kich_thuoc_chat_lieus: ~0 rows (approximately)
/*!40000 ALTER TABLE `table_product_kich_thuoc_chat_lieus` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_product_kich_thuoc_chat_lieus` ENABLE KEYS */;

-- Dumping structure for table createdatabase.table_product_kich_thuoc_chat_lieu_can_mangs
CREATE TABLE IF NOT EXISTS `table_product_kich_thuoc_chat_lieu_can_mangs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ktcl_id` bigint(20) unsigned NOT NULL,
  `cm_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `table_product_kich_thuoc_chat_lieu_can_mangs_ktcl_id_foreign` (`ktcl_id`),
  KEY `table_product_kich_thuoc_chat_lieu_can_mangs_cm_id_foreign` (`cm_id`),
  CONSTRAINT `table_product_kich_thuoc_chat_lieu_can_mangs_cm_id_foreign` FOREIGN KEY (`cm_id`) REFERENCES `table_product_can_mangs` (`id`),
  CONSTRAINT `table_product_kich_thuoc_chat_lieu_can_mangs_ktcl_id_foreign` FOREIGN KEY (`ktcl_id`) REFERENCES `table_product_kich_thuoc_chat_lieus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table createdatabase.table_product_kich_thuoc_chat_lieu_can_mangs: ~0 rows (approximately)
/*!40000 ALTER TABLE `table_product_kich_thuoc_chat_lieu_can_mangs` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_product_kich_thuoc_chat_lieu_can_mangs` ENABLE KEYS */;

-- Dumping structure for table createdatabase.table_product_kich_thuoc_chat_lieu_mat_ins
CREATE TABLE IF NOT EXISTS `table_product_kich_thuoc_chat_lieu_mat_ins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ktcl_id` bigint(20) unsigned NOT NULL,
  `mi_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `table_product_kich_thuoc_chat_lieu_mat_ins_ktcl_id_foreign` (`ktcl_id`),
  KEY `table_product_kich_thuoc_chat_lieu_mat_ins_mi_id_foreign` (`mi_id`),
  CONSTRAINT `table_product_kich_thuoc_chat_lieu_mat_ins_ktcl_id_foreign` FOREIGN KEY (`ktcl_id`) REFERENCES `table_product_kich_thuoc_chat_lieus` (`id`),
  CONSTRAINT `table_product_kich_thuoc_chat_lieu_mat_ins_mi_id_foreign` FOREIGN KEY (`mi_id`) REFERENCES `table_product_mat_ins` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table createdatabase.table_product_kich_thuoc_chat_lieu_mat_ins: ~0 rows (approximately)
/*!40000 ALTER TABLE `table_product_kich_thuoc_chat_lieu_mat_ins` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_product_kich_thuoc_chat_lieu_mat_ins` ENABLE KEYS */;

-- Dumping structure for table createdatabase.table_product_kich_thuoc_chat_lieu_quy_cachs
CREATE TABLE IF NOT EXISTS `table_product_kich_thuoc_chat_lieu_quy_cachs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ktct_id` bigint(20) unsigned NOT NULL,
  `qc_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `table_product_kich_thuoc_chat_lieu_quy_cachs_ktct_id_foreign` (`ktct_id`),
  KEY `table_product_kich_thuoc_chat_lieu_quy_cachs_qc_id_foreign` (`qc_id`),
  CONSTRAINT `table_product_kich_thuoc_chat_lieu_quy_cachs_ktct_id_foreign` FOREIGN KEY (`ktct_id`) REFERENCES `table_product_kich_thuoc_chat_lieus` (`id`),
  CONSTRAINT `table_product_kich_thuoc_chat_lieu_quy_cachs_qc_id_foreign` FOREIGN KEY (`qc_id`) REFERENCES `table_product_quy_cachs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table createdatabase.table_product_kich_thuoc_chat_lieu_quy_cachs: ~0 rows (approximately)
/*!40000 ALTER TABLE `table_product_kich_thuoc_chat_lieu_quy_cachs` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_product_kich_thuoc_chat_lieu_quy_cachs` ENABLE KEYS */;

-- Dumping structure for table createdatabase.table_product_kich_thuoc_chat_lieu_soluongs
CREATE TABLE IF NOT EXISTS `table_product_kich_thuoc_chat_lieu_soluongs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ktcl_id` bigint(20) unsigned NOT NULL,
  `sl_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `table_product_kich_thuoc_chat_lieu_soluongs_ktcl_id_foreign` (`ktcl_id`),
  KEY `table_product_kich_thuoc_chat_lieu_soluongs_sl_id_foreign` (`sl_id`),
  CONSTRAINT `table_product_kich_thuoc_chat_lieu_soluongs_ktcl_id_foreign` FOREIGN KEY (`ktcl_id`) REFERENCES `table_product_kich_thuoc_chat_lieus` (`id`),
  CONSTRAINT `table_product_kich_thuoc_chat_lieu_soluongs_sl_id_foreign` FOREIGN KEY (`sl_id`) REFERENCES `table_product_so_luongs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table createdatabase.table_product_kich_thuoc_chat_lieu_soluongs: ~0 rows (approximately)
/*!40000 ALTER TABLE `table_product_kich_thuoc_chat_lieu_soluongs` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_product_kich_thuoc_chat_lieu_soluongs` ENABLE KEYS */;

-- Dumping structure for table createdatabase.table_product_kich_thuoc_chat_lieu_thoi_gians
CREATE TABLE IF NOT EXISTS `table_product_kich_thuoc_chat_lieu_thoi_gians` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ktcl_id` bigint(20) unsigned NOT NULL,
  `tg_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `table_product_kich_thuoc_chat_lieu_thoi_gians_ktcl_id_foreign` (`ktcl_id`),
  KEY `table_product_kich_thuoc_chat_lieu_thoi_gians_tg_id_foreign` (`tg_id`),
  CONSTRAINT `table_product_kich_thuoc_chat_lieu_thoi_gians_ktcl_id_foreign` FOREIGN KEY (`ktcl_id`) REFERENCES `table_product_kich_thuoc_chat_lieus` (`id`),
  CONSTRAINT `table_product_kich_thuoc_chat_lieu_thoi_gians_tg_id_foreign` FOREIGN KEY (`tg_id`) REFERENCES `table_product_thoi_gians` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table createdatabase.table_product_kich_thuoc_chat_lieu_thoi_gians: ~0 rows (approximately)
/*!40000 ALTER TABLE `table_product_kich_thuoc_chat_lieu_thoi_gians` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_product_kich_thuoc_chat_lieu_thoi_gians` ENABLE KEYS */;

-- Dumping structure for table createdatabase.table_product_mat_ins
CREATE TABLE IF NOT EXISTS `table_product_mat_ins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table createdatabase.table_product_mat_ins: ~8 rows (approximately)
/*!40000 ALTER TABLE `table_product_mat_ins` DISABLE KEYS */;
INSERT INTO `table_product_mat_ins` (`id`, `name`, `percent`, `created_at`, `updated_at`) VALUES
	(1, '1 mặt', 1300, NULL, NULL),
	(2, '2 mặt', 1300, NULL, NULL),
	(3, '3 mặt', 1300, NULL, NULL);
/*!40000 ALTER TABLE `table_product_mat_ins` ENABLE KEYS */;

-- Dumping structure for table createdatabase.table_product_quy_cachs
CREATE TABLE IF NOT EXISTS `table_product_quy_cachs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` int(11) NOT NULL DEFAULT '1000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table createdatabase.table_product_quy_cachs: ~2 rows (approximately)
/*!40000 ALTER TABLE `table_product_quy_cachs` DISABLE KEYS */;
INSERT INTO `table_product_quy_cachs` (`id`, `name`, `point`, `created_at`, `updated_at`) VALUES
	(1, 'Bế demi', 1000, NULL, NULL),
	(2, 'Bế trời', 1500, NULL, NULL);
/*!40000 ALTER TABLE `table_product_quy_cachs` ENABLE KEYS */;

-- Dumping structure for table createdatabase.table_product_so_luongs
CREATE TABLE IF NOT EXISTS `table_product_so_luongs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL DEFAULT '50',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table createdatabase.table_product_so_luongs: ~8 rows (approximately)
/*!40000 ALTER TABLE `table_product_so_luongs` DISABLE KEYS */;
INSERT INTO `table_product_so_luongs` (`id`, `name`, `count`, `created_at`, `updated_at`) VALUES
	(1, '50', 50, NULL, NULL),
	(2, '100', 100, NULL, NULL),
	(3, '150', 150, NULL, NULL),
	(4, '200', 200, NULL, NULL),
	(5, '250', 250, NULL, NULL),
	(6, '300', 300, NULL, NULL),
	(7, '350', 350, NULL, NULL),
	(8, '400', 400, NULL, NULL);
/*!40000 ALTER TABLE `table_product_so_luongs` ENABLE KEYS */;

-- Dumping structure for table createdatabase.table_product_thoi_gians
CREATE TABLE IF NOT EXISTS `table_product_thoi_gians` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table createdatabase.table_product_thoi_gians: ~0 rows (approximately)
/*!40000 ALTER TABLE `table_product_thoi_gians` DISABLE KEYS */;
INSERT INTO `table_product_thoi_gians` (`id`, `name`, `percent`, `created_at`, `updated_at`) VALUES
	(1, 'Trong ngày', 150, NULL, NULL),
	(2, '2 ngày', 100, NULL, NULL),
	(3, '5 ngày', 98, NULL, NULL),
	(4, '7 ngày', 96, NULL, NULL),
	(5, '1 Tháng', 80, NULL, NULL);
/*!40000 ALTER TABLE `table_product_thoi_gians` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
