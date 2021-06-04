/*
 Navicat Premium Data Transfer

 Source Server         : local 3307
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : sisfo-lapor

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 21/05/2021 08:13:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for divisi
-- ----------------------------
DROP TABLE IF EXISTS `divisi`;
CREATE TABLE `divisi`  (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `divisi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of divisi
-- ----------------------------
INSERT INTO `divisi` VALUES (001, 'IT', '2021-05-09 01:21:30');
INSERT INTO `divisi` VALUES (003, 'Keuangan', '2021-05-09 01:21:39');
INSERT INTO `divisi` VALUES (004, 'Teknik', '2021-05-09 01:21:45');
INSERT INTO `divisi` VALUES (005, 'GA', '2021-05-09 01:22:01');

-- ----------------------------
-- Table structure for item
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item`  (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `kategori_id` int(2) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  `item` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of item
-- ----------------------------
INSERT INTO `item` VALUES (001, 01, 'Router', '2021-05-20 19:07:26');

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (01, 'Perangkat Jaringan', '2021-05-20 18:37:01');
INSERT INTO `kategori` VALUES (02, 'Komputer', '2021-05-20 18:37:22');
INSERT INTO `kategori` VALUES (04, 'Peripheral', '2021-05-20 18:40:15');

-- ----------------------------
-- Table structure for kerusakan
-- ----------------------------
DROP TABLE IF EXISTS `kerusakan`;
CREATE TABLE `kerusakan`  (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nomor_laporan` varchar(27) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_laporan` datetime(0) NOT NULL,
  `lokasi_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `petugas` int(3) UNSIGNED ZEROFILL NOT NULL,
  `uraian_kerusakan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`, `nomor_laporan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kerusakan
-- ----------------------------
INSERT INTO `kerusakan` VALUES (2, '202105120200000200100001', '2021-05-12 02:00:00', 01, 020, 'Tes Dulu', '2021-05-20 23:49:12');
INSERT INTO `kerusakan` VALUES (3, '202105190730000260100003', '2021-05-19 07:30:00', 01, 026, 'Komputer lemot', '2021-05-21 07:22:33');

-- ----------------------------
-- Table structure for lokasi
-- ----------------------------
DROP TABLE IF EXISTS `lokasi`;
CREATE TABLE `lokasi`  (
  `id_lokasi` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `lokasi` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_lokasi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lokasi
-- ----------------------------
INSERT INTO `lokasi` VALUES (01, 'Ruang Direktur', '2021-05-20 20:01:41');

-- ----------------------------
-- Table structure for perbaikan
-- ----------------------------
DROP TABLE IF EXISTS `perbaikan`;
CREATE TABLE `perbaikan`  (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nomor_laporan` varchar(27) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_kedatangan` datetime(0) NULL DEFAULT NULL,
  `tanggal_perbaikan` datetime(0) NULL DEFAULT NULL,
  `tanggal_selesai_perbaikan` datetime(0) NULL DEFAULT NULL,
  `teknisi` int(3) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  `kategori_id` int(2) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  `item_id` int(3) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  `uraian_perbaikan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `status_perbaikan` int(1) NOT NULL DEFAULT 0,
  `status_pekerjaan` int(1) NOT NULL DEFAULT 0,
  `catatan_user` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `validasi_spv` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `status_laporan` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perbaikan
-- ----------------------------
INSERT INTO `perbaikan` VALUES (1, '202105120200000200100001', '2021-05-13 02:00:00', '2021-05-13 02:00:00', '2021-05-13 02:30:00', 020, 01, 001, 'Tes Edit Perbaikan', 1, 1, 'Perbaikan Sudah Sesuai', 1, '2021-05-20 23:49:12', '2021-05-21 08:04:06', 1);
INSERT INTO `perbaikan` VALUES (2, '202105190730000260100003', '2021-05-19 08:00:00', '2021-05-19 08:00:00', '2021-05-19 08:30:00', 025, 01, 001, 'Komputer lemot karna jaringan bermasalah', 1, 1, 'Perbaikan Sudah Sesuai', 0, '2021-05-21 07:22:34', '2021-05-21 08:03:08', 1);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `roles` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (01, 'Admin', '2021-05-09 01:21:20');
INSERT INTO `roles` VALUES (02, 'User', '2021-05-09 01:21:24');

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status`  (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `status` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id_users` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_roles` int(2) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_divisi` int(3) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_users`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (020, 'Ade', 01, '$2y$10$xkmUCqI5sYm1xHz9il0YcuEhBZxifhz9DVScghBucnUVQxQbpRsRK', 001, 'Ade@mail.com', NULL, '2021-05-19 23:48:39');
INSERT INTO `users` VALUES (021, 'Jana', 01, '$2y$10$OK4jw9.KlflvR2ksJmVPcOqUGHJOqKgHYr0vPzcZomKgbhxyOBZGi', 001, 'Jana@mail.com', NULL, '2021-05-19 23:49:50');
INSERT INTO `users` VALUES (023, 'Jaki Ahmed', 01, '$2y$10$6I0ulsXE4tALRs7rXctKLuW9vSFbTXpx88zS5PassotsrxUsIpFc2', 002, 'Jaki@mail.com', '2021-05-21 07:38:13', '2021-05-21 07:38:13');
INSERT INTO `users` VALUES (025, 'Jul', 02, '$2y$10$SNvwx9db/hyhQweIos1rM.M2tAD1GchGHTDh3gNdm7HBBBbdfDwmm', 001, 'Jul@mail.com', NULL, '2021-05-21 02:26:29');
INSERT INTO `users` VALUES (026, 'Vian', 02, '$2y$10$X0YWyOjhVqKy3l/TNX.9Hu2M5IRnR.fAJORUMNw25TqS8MiNvycte', 004, 'Vian@mail.com', NULL, '2021-05-21 02:55:00');

-- ----------------------------
-- View structure for kerusakan_index
-- ----------------------------
DROP VIEW IF EXISTS `kerusakan_index`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `kerusakan_index` AS select `kerusakan`.`id` AS `id`,`kerusakan`.`nomor_laporan` AS `nomor_laporan`,`kerusakan`.`tanggal_laporan` AS `tanggal_laporan`,`kerusakan`.`lokasi_id` AS `lokasi_id`,`kerusakan`.`uraian_kerusakan` AS `uraian_kerusakan`,`kerusakan`.`created_at` AS `created_at`,`perbaikan`.`teknisi` AS `teknisi`,`perbaikan`.`uraian_perbaikan` AS `uraian_perbaikan`,`perbaikan`.`status_perbaikan` AS `status_perbaikan`,`perbaikan`.`catatan_user` AS `catatan_user`,`perbaikan`.`id` AS `id_perbaikan`,`perbaikan`.`status_pekerjaan` AS `status_pekerjaan` from (`kerusakan` left join `perbaikan` on((`kerusakan`.`nomor_laporan` = `perbaikan`.`nomor_laporan`)));

-- ----------------------------
-- View structure for perbaikan_index
-- ----------------------------
DROP VIEW IF EXISTS `perbaikan_index`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `perbaikan_index` AS select `perbaikan`.`id` AS `id`,`perbaikan`.`nomor_laporan` AS `nomor_laporan`,`perbaikan`.`tanggal_kedatangan` AS `tanggal_kedatangan`,`perbaikan`.`tanggal_perbaikan` AS `tanggal_perbaikan`,`perbaikan`.`tanggal_selesai_perbaikan` AS `tanggal_selesai_perbaikan`,`perbaikan`.`kategori_id` AS `kategori_id`,`perbaikan`.`item_id` AS `item_id`,`perbaikan`.`uraian_perbaikan` AS `uraian_perbaikan`,`perbaikan`.`status_perbaikan` AS `status_perbaikan`,`perbaikan`.`status_pekerjaan` AS `status_pekerjaan`,`perbaikan`.`catatan_user` AS `catatan_user`,`perbaikan`.`validasi_spv` AS `validasi_spv`,`perbaikan`.`created_at` AS `created_at`,`perbaikan`.`updated_at` AS `updated_at`,`kerusakan`.`tanggal_laporan` AS `tanggal_laporan`,`kerusakan`.`lokasi_id` AS `lokasi_id`,`kerusakan`.`petugas` AS `petugas`,`kerusakan`.`uraian_kerusakan` AS `uraian_kerusakan`,`perbaikan`.`status_laporan` AS `status_laporan` from (`perbaikan` left join `kerusakan` on((`perbaikan`.`nomor_laporan` = `kerusakan`.`nomor_laporan`)));

SET FOREIGN_KEY_CHECKS = 1;
