/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : project-info-tilang

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 13/01/2021 09:19:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for biaya_admin
-- ----------------------------
DROP TABLE IF EXISTS `biaya_admin`;
CREATE TABLE `biaya_admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instansi_id` int(11) NULL DEFAULT NULL,
  `biaya` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `diinsert_pada` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `diupdate_pada` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `instansi_id`(`instansi_id`) USING BTREE,
  CONSTRAINT `biaya_admin_ibfk_1` FOREIGN KEY (`instansi_id`) REFERENCES `instansi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of biaya_admin
-- ----------------------------
INSERT INTO `biaya_admin` VALUES (1, 1, '10000', '2020-12-22 18:20:15', NULL);

-- ----------------------------
-- Table structure for dokumen
-- ----------------------------
DROP TABLE IF EXISTS `dokumen`;
CREATE TABLE `dokumen`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `instansi_id` int(11) NULL DEFAULT NULL,
  `layanan_id` int(11) NULL DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nomor` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pemilik` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `diinsert_pada` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `diupdate_pada` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `instansi_id`(`instansi_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `layanan_id`(`layanan_id`) USING BTREE,
  CONSTRAINT `dokumen_ibfk_1` FOREIGN KEY (`instansi_id`) REFERENCES `instansi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dokumen_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dokumen_ibfk_3` FOREIGN KEY (`layanan_id`) REFERENCES `layanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dokumen
-- ----------------------------
INSERT INTO `dokumen` VALUES (1, 53, 1, 1, '', '1412123230', 'Samsudin', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus doloremque aliquam, totam, exercitationem dolores suscipit iste quas laborum cumque perspiciatis aliquid! Amet dolores id minima omnis fugiat optio impedit blanditiis.', '2020-12-20 19:01:30.898327', '2021-01-13 08:12:14.203430');

-- ----------------------------
-- Table structure for dokumen_bukti
-- ----------------------------
DROP TABLE IF EXISTS `dokumen_bukti`;
CREATE TABLE `dokumen_bukti`  (
  `id` int(11) NOT NULL COMMENT 'composite [[pengurusan : 1 | transfer : 2]dokumen id | user id]',
  `dokumen_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL COMMENT 'diinsert oleh',
  `foto_url` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tipe` enum('bukti_pengurusan','bukti_transfer') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `diinsert_pada` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `diupdate_pada` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `dokumen_id`(`dokumen_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `dokumen_bukti_ibfk_1` FOREIGN KEY (`dokumen_id`) REFERENCES `dokumen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dokumen_bukti_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dokumen_bukti
-- ----------------------------
INSERT INTO `dokumen_bukti` VALUES (1511, 1, 51, 'bukti_pengurusan_51_1_1412123230.jpg', 'bukti_pengurusan', '2020-12-22 18:02:48.046268', NULL);

-- ----------------------------
-- Table structure for dokumen_bukti_status
-- ----------------------------
DROP TABLE IF EXISTS `dokumen_bukti_status`;
CREATE TABLE `dokumen_bukti_status`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dokumen_bukti_id` int(11) NOT NULL,
  `status` enum('diterima','ditolak','diproses') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `diinsert_pada` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `diupdate_pada` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `dokumen_bukti_id`(`dokumen_bukti_id`) USING BTREE,
  CONSTRAINT `dokumen_bukti_status_ibfk_1` FOREIGN KEY (`dokumen_bukti_id`) REFERENCES `dokumen_bukti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dokumen_proses
-- ----------------------------
DROP TABLE IF EXISTS `dokumen_proses`;
CREATE TABLE `dokumen_proses`  (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'composite  [id dokumen|id user]',
  `dokumen_id` int(5) NULL DEFAULT NULL,
  `user_id` int(5) NULL DEFAULT NULL,
  `lat_lng` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `metode_pengiriman_id` int(5) NULL DEFAULT NULL,
  `metode_pembayaran_id` int(5) NULL DEFAULT NULL,
  `biaya_dokumen` bigint(50) NULL DEFAULT NULL,
  `biaya_pengiriman` bigint(50) NULL DEFAULT NULL,
  `biaya_admin` bigint(50) NULL DEFAULT NULL,
  `biaya_total` bigint(50) NULL DEFAULT NULL,
  `diinsert_pada` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `diupdate_pada` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `dokumen_id`(`dokumen_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `metode_pengiriman_id`(`metode_pengiriman_id`) USING BTREE,
  INDEX `metode_pembayaran_id`(`metode_pembayaran_id`) USING BTREE,
  CONSTRAINT `dokumen_proses_ibfk_1` FOREIGN KEY (`dokumen_id`) REFERENCES `dokumen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dokumen_proses_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dokumen_proses_ibfk_3` FOREIGN KEY (`metode_pengiriman_id`) REFERENCES `metode_pengiriman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dokumen_proses_ibfk_4` FOREIGN KEY (`metode_pembayaran_id`) REFERENCES `metode_pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 752 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dokumen_proses
-- ----------------------------
INSERT INTO `dokumen_proses` VALUES (151, 1, 51, '-7.150975,110.14025939999999', 'Jl. Rama Gg. Anoman No.858, Tlogowungu, Muncar, Gemawang, Kabupaten Temanggung, Jawa Tengah 56281, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 14:52:25.773427', NULL);

-- ----------------------------
-- Table structure for instansi
-- ----------------------------
DROP TABLE IF EXISTS `instansi`;
CREATE TABLE `instansi`  (
  `id` int(11) NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `no_telp` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of instansi
-- ----------------------------
INSERT INTO `instansi` VALUES (1, 'Kejaksaan Negri Yogyakarta', NULL, NULL);
INSERT INTO `instansi` VALUES (2, 'Kejaksaan Negri Kab Bantul', NULL, NULL);
INSERT INTO `instansi` VALUES (3, 'Kejaksaan Negri Kab Gunung Kidu', NULL, NULL);
INSERT INTO `instansi` VALUES (4, 'Kejaksaan Negri Kab Sleman', NULL, NULL);
INSERT INTO `instansi` VALUES (5, 'Kejaksaan Negri Kab Kulon Progo', NULL, NULL);

-- ----------------------------
-- Table structure for layanan
-- ----------------------------
DROP TABLE IF EXISTS `layanan`;
CREATE TABLE `layanan`  (
  `id` int(11) NOT NULL,
  `instansi_id` int(11) NULL DEFAULT NULL,
  `biaya` bigint(10) NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `diinsert_pada` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `diupdate_pada` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `instansi_id`(`instansi_id`) USING BTREE,
  CONSTRAINT `layanan_ibfk_1` FOREIGN KEY (`instansi_id`) REFERENCES `instansi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of layanan
-- ----------------------------
INSERT INTO `layanan` VALUES (1, 1, 20000, '', 'Lorem', '2020-12-20 19:02:43.769014', '2021-01-13 08:12:25.210524');
INSERT INTO `layanan` VALUES (2, 2, 15000, '', NULL, '2020-12-23 00:40:03.712421', '2021-01-13 08:12:25.213177');
INSERT INTO `layanan` VALUES (3, 3, 23000, '', NULL, '2020-12-23 00:40:44.714455', '2021-01-13 08:12:25.214919');
INSERT INTO `layanan` VALUES (4, 3, 25000, '', NULL, '2020-12-23 00:41:00.353260', '2021-01-13 08:12:25.216817');
INSERT INTO `layanan` VALUES (5, 3, 26000, '', NULL, '2020-12-23 00:42:36.153240', '2021-01-13 08:12:25.221311');
INSERT INTO `layanan` VALUES (7, 1, 20000, '', 'Lorem', '2020-12-20 19:02:43.769014', '2021-01-13 08:12:25.223513');

-- ----------------------------
-- Table structure for metode_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `metode_pembayaran`;
CREATE TABLE `metode_pembayaran`  (
  `id` int(11) NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nomor_rekening` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `atas_nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `icon` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of metode_pembayaran
-- ----------------------------
INSERT INTO `metode_pembayaran` VALUES (1, 'Transfer Bank (BRI)', '189972874', 'Bayhaqi', NULL, NULL);
INSERT INTO `metode_pembayaran` VALUES (2, 'VIRTUAL ACCOUNT', '189972874', 'Bayhaqi', NULL, NULL);

-- ----------------------------
-- Table structure for metode_pengiriman
-- ----------------------------
DROP TABLE IF EXISTS `metode_pengiriman`;
CREATE TABLE `metode_pengiriman`  (
  `id` int(11) NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `icon` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `ket` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of metode_pengiriman
-- ----------------------------
INSERT INTO `metode_pengiriman` VALUES (1, 'Go-Jek', 'gojek.png', NULL);
INSERT INTO `metode_pengiriman` VALUES (2, 'Parcel', 'paxel.png', NULL);
INSERT INTO `metode_pengiriman` VALUES (3, 'Wahana', 'wahana.png', NULL);

-- ----------------------------
-- Table structure for transaksi_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_dokumen`;
CREATE TABLE `transaksi_dokumen`  (
  `id` int(11) NOT NULL,
  `status` enum('diterima','ditolak','diproses') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'diproses',
  `diinsert_pada` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `diupdate_pada` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  CONSTRAINT `transaksi_dokumen_ibfk_1` FOREIGN KEY (`id`) REFERENCES `dokumen_proses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role_id` int(11) NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `diinsert_pada` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `diupdate_pada` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE,
  INDEX `user_ibfk_1`(`user_role_id`) USING BTREE,
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE = InnoDB AUTO_INCREMENT = 58 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (51, 4, 'user@gmail.com', '$2y$10$hH/nsw8wz6SXS5oLbJ2g8OrJhUVJfRwMa663FBipm9Nu6P6X.iOh.', '2020-12-20 14:09:13.586013', '2020-12-25 05:08:45.646628');
INSERT INTO `user` VALUES (53, 3, 'instansi@gmail.com', '$2y$10$hH/nsw8wz6SXS5oLbJ2g8OrJhUVJfRwMa663FBipm9Nu6P6X.iOh.', '2020-12-20 14:09:13.586013', NULL);
INSERT INTO `user` VALUES (54, 2, 'keuangan@gmail.com', '$2y$10$hH/nsw8wz6SXS5oLbJ2g8OrJhUVJfRwMa663FBipm9Nu6P6X.iOh.', '2020-12-20 14:09:13.586013', NULL);
INSERT INTO `user` VALUES (55, 1, 'superadmin@gmail.com', '$2y$10$hH/nsw8wz6SXS5oLbJ2g8OrJhUVJfRwMa663FBipm9Nu6P6X.iOh.', '2020-12-20 14:09:13.586013', '2020-12-20 15:18:34.345945');
INSERT INTO `user` VALUES (56, 4, 'user2@gmail.com', '$2y$10$hH/nsw8wz6SXS5oLbJ2g8OrJhUVJfRwMa663FBipm9Nu6P6X.iOh.', '2020-12-20 14:09:13.586013', '2020-12-25 05:08:53.294838');
INSERT INTO `user` VALUES (57, 4, 'user3@gmail.com', '$2y$10$IJZI7TBatDgIANdTr8khzOUF67RKXmPJmTLJYJwXj3P1QZOMg0sCC', '2020-12-24 20:12:11.818009', '2020-12-25 05:08:57.470613');

-- ----------------------------
-- Table structure for user_aktivasi
-- ----------------------------
DROP TABLE IF EXISTS `user_aktivasi`;
CREATE TABLE `user_aktivasi`  (
  `user_id` int(11) NOT NULL,
  `user_status_aktivasi_id` int(11) NULL DEFAULT NULL,
  `diinsert_pada` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `diupdate_pada` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`user_id`) USING BTREE,
  CONSTRAINT `user_aktivasi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_aktivasi
-- ----------------------------
INSERT INTO `user_aktivasi` VALUES (51, 1, '2020-12-20 14:09:16.574278', NULL);
INSERT INTO `user_aktivasi` VALUES (57, 1, '2020-12-24 20:12:14.548751', NULL);

-- ----------------------------
-- Table structure for user_pengguna
-- ----------------------------
DROP TABLE IF EXISTS `user_pengguna`;
CREATE TABLE `user_pengguna`  (
  `user_id` int(10) NOT NULL,
  `NIK` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `diinsert_pada` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `diupdate_pada` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`user_id`) USING BTREE,
  CONSTRAINT `user_pengguna_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_pengguna
-- ----------------------------
INSERT INTO `user_pengguna` VALUES (51, NULL, 'Rifaldi Ardan', '2020-12-20 17:00:07.804347', NULL);
INSERT INTO `user_pengguna` VALUES (56, NULL, 'Efal Ardan', '2020-12-21 16:23:22.798630', NULL);

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role`  (
  `id` int(1) NOT NULL,
  `nama` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `akronim` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES (1, 'Superadmin', 'sp');
INSERT INTO `user_role` VALUES (2, 'Keuangan', 'kg');
INSERT INTO `user_role` VALUES (3, 'Instansi', 'it');
INSERT INTO `user_role` VALUES (4, 'Pengguna', 'pg');

-- ----------------------------
-- Table structure for user_status_verifikasi
-- ----------------------------
DROP TABLE IF EXISTS `user_status_verifikasi`;
CREATE TABLE `user_status_verifikasi`  (
  `id` int(11) NOT NULL,
  `nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_status_verifikasi
-- ----------------------------
INSERT INTO `user_status_verifikasi` VALUES (1, 'Aktif');
INSERT INTO `user_status_verifikasi` VALUES (2, 'Belum Aktif');

-- ----------------------------
-- Table structure for user_superadmin
-- ----------------------------
DROP TABLE IF EXISTS `user_superadmin`;
CREATE TABLE `user_superadmin`  (
  `user_id` int(10) NOT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `diinsert_pada` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `diupdate_pada` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`user_id`) USING BTREE,
  CONSTRAINT `user_superadmin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_superadmin
-- ----------------------------
INSERT INTO `user_superadmin` VALUES (51, 'Rifaldi Ardan', '2020-12-20 17:00:07.804347', NULL);

-- ----------------------------
-- Table structure for user_verifikasi
-- ----------------------------
DROP TABLE IF EXISTS `user_verifikasi`;
CREATE TABLE `user_verifikasi`  (
  `user_id` int(5) NOT NULL,
  `token` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_verifikasi` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `diinsert_pada` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `diupdate_pada` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`user_id`) USING BTREE,
  CONSTRAINT `user_verifikasi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_verifikasi
-- ----------------------------
INSERT INTO `user_verifikasi` VALUES (51, '$2y$10$0OeiiS17i..ubsdXbT/QaexXGQDsn64DG58iyFHL4M71hAi6ikDdy', 'DE2EF', '2020-12-20 14:09:13.643280', NULL);
INSERT INTO `user_verifikasi` VALUES (57, '$2y$10$HHdCzYQ7R1dsmX550OW11OWRw8OaZRtbb8B.Fnd.4VkMI2pDt5lNu', 'DE2EF', '2020-12-24 20:12:11.875301', NULL);

SET FOREIGN_KEY_CHECKS = 1;
