/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : project-info-dokumen

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 25/12/2020 04:33:13
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
INSERT INTO `dokumen` VALUES (1, 53, 1, 1, 'Pembuatan AKTA', '1412123230', 'Samsudin', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus doloremque aliquam, totam, exercitationem dolores suscipit iste quas laborum cumque perspiciatis aliquid! Amet dolores id minima omnis fugiat optio impedit blanditiis.', '2020-12-20 19:01:30.898327', '2020-12-21 16:19:24.650997');
INSERT INTO `dokumen` VALUES (2, 53, 1, 1, 'Pembuatan AKTA', '1412123232', 'Samsudin', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus doloremque aliquam, totam, exercitationem dolores suscipit iste quas laborum cumque perspiciatis aliquid! Amet dolores id minima omnis fugiat optio impedit blanditiis.', '2020-12-20 19:01:30.898327', '2020-12-24 22:41:57.792999');
INSERT INTO `dokumen` VALUES (3, 53, 1, 1, 'Pembuatan AKTA', '1412123231', 'Samsudin', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus doloremque aliquam, totam, exercitationem dolores suscipit iste quas laborum cumque perspiciatis aliquid! Amet dolores id minima omnis fugiat optio impedit blanditiis.', '2020-12-20 19:01:30.898327', '2020-12-24 20:22:14.153269');
INSERT INTO `dokumen` VALUES (4, 53, 1, 1, 'Pembuatan AKTA', '1412123233', 'Samsudin', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus doloremque aliquam, totam, exercitationem dolores suscipit iste quas laborum cumque perspiciatis aliquid! Amet dolores id minima omnis fugiat optio impedit blanditiis.', '2020-12-20 19:01:30.898327', '2020-12-22 23:39:02.233378');
INSERT INTO `dokumen` VALUES (5, 53, 1, 1, 'Pembuatan AKTA', '1412123235', 'Samsudin', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus doloremque aliquam, totam, exercitationem dolores suscipit iste quas laborum cumque perspiciatis aliquid! Amet dolores id minima omnis fugiat optio impedit blanditiis.', '2020-12-20 19:01:30.898327', '2020-12-23 18:46:38.901388');
INSERT INTO `dokumen` VALUES (6, 53, 1, 1, NULL, '1412123237', 'Murhadi', NULL, '2020-12-23 16:44:37.789524', '2020-12-23 16:45:00.266342');
INSERT INTO `dokumen` VALUES (7, 53, 1, 1, 'Pembuatan AKTA', '14121111', 'Samsudin', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus doloremque aliquam, totam, exercitationem dolores suscipit iste quas laborum cumque perspiciatis aliquid! Amet dolores id minima omnis fugiat optio impedit blanditiis.', '2020-12-20 19:01:30.898327', '2020-12-21 16:19:24.650997');
INSERT INTO `dokumen` VALUES (8, 53, 1, 1, 'Pembuatan AKTA', '14121222', 'Samsudin', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus doloremque aliquam, totam, exercitationem dolores suscipit iste quas laborum cumque perspiciatis aliquid! Amet dolores id minima omnis fugiat optio impedit blanditiis.', '2020-12-20 19:01:30.898327', '2020-12-23 00:42:56.244105');
INSERT INTO `dokumen` VALUES (9, 53, 1, 1, 'Pembuatan AKTA', '14121333', 'Samsudin', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus doloremque aliquam, totam, exercitationem dolores suscipit iste quas laborum cumque perspiciatis aliquid! Amet dolores id minima omnis fugiat optio impedit blanditiis.', '2020-12-20 19:01:30.898327', '2020-12-23 00:43:28.991643');
INSERT INTO `dokumen` VALUES (10, 53, 1, 1, 'Pembuatan AKTA', '14121444', 'Samsudin', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus doloremque aliquam, totam, exercitationem dolores suscipit iste quas laborum cumque perspiciatis aliquid! Amet dolores id minima omnis fugiat optio impedit blanditiis.', '2020-12-20 19:01:30.898327', '2020-12-22 23:39:02.233378');
INSERT INTO `dokumen` VALUES (11, 53, 1, 1, 'Pembuatan AKTA', '14121555', 'Samsudin', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus doloremque aliquam, totam, exercitationem dolores suscipit iste quas laborum cumque perspiciatis aliquid! Amet dolores id minima omnis fugiat optio impedit blanditiis.', '2020-12-20 19:01:30.898327', '2020-12-23 18:46:38.901388');
INSERT INTO `dokumen` VALUES (12, 53, 1, 1, NULL, '14121666', 'Murhadi', NULL, '2020-12-23 16:44:37.789524', '2020-12-23 16:45:00.266342');

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
INSERT INTO `dokumen_bukti` VALUES (2511, 2, 51, 'bukti_pengurusan_51_2_1412123232.jpg', 'bukti_pengurusan', '2020-12-22 20:10:04.063744', NULL);
INSERT INTO `dokumen_bukti` VALUES (3511, 3, 51, 'bukti_pengurusan_51_3_1412123231.jpg', 'bukti_pengurusan', '2020-12-22 17:14:36.037945', NULL);
INSERT INTO `dokumen_bukti` VALUES (3512, 3, 51, 'bukti_transfer_51_3_1412123231.jpg', 'bukti_transfer', '2020-12-25 02:34:16.011091', NULL);
INSERT INTO `dokumen_bukti` VALUES (4511, 4, 51, 'bukti_pengurusan_51_4_1412123233.jpg', 'bukti_pengurusan', '2020-12-22 23:40:01.538724', NULL);
INSERT INTO `dokumen_bukti` VALUES (7511, 7, 51, 'bukti_pengurusan_51_7_14121111.jpg', 'bukti_pengurusan', '2020-12-23 18:49:38.593122', NULL);

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
INSERT INTO `dokumen_proses` VALUES (351, 3, 51, '-7.150975,110.14025939999999', 'Jl. Rama Gg. Anoman No.858, Tlogowungu, Muncar, Gemawang, Kabupaten Temanggung, Jawa Tengah 56281, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-25 04:31:27.838368', NULL);
INSERT INTO `dokumen_proses` VALUES (451, 2, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:43:50.324703');
INSERT INTO `dokumen_proses` VALUES (551, 5, 51, '-7.150975,110.14025939999999', 'Jl. Rama Gg. Anoman No.858, Tlogowungu, Muncar, Gemawang, Kabupaten Temanggung, Jawa Tengah 56281, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 18:47:17.010600', NULL);
INSERT INTO `dokumen_proses` VALUES (561, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:25:24.285900');
INSERT INTO `dokumen_proses` VALUES (562, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:22:34.387568');
INSERT INTO `dokumen_proses` VALUES (563, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:22:45.403428');
INSERT INTO `dokumen_proses` VALUES (564, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:43:42.288533');
INSERT INTO `dokumen_proses` VALUES (565, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:22:45.403428');
INSERT INTO `dokumen_proses` VALUES (566, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:22:34.387568');
INSERT INTO `dokumen_proses` VALUES (567, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:22:45.403428');
INSERT INTO `dokumen_proses` VALUES (568, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:22:34.387568');
INSERT INTO `dokumen_proses` VALUES (569, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:22:45.403428');
INSERT INTO `dokumen_proses` VALUES (570, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:22:34.387568');
INSERT INTO `dokumen_proses` VALUES (571, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:22:45.403428');
INSERT INTO `dokumen_proses` VALUES (572, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:22:34.387568');
INSERT INTO `dokumen_proses` VALUES (573, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:22:45.403428');
INSERT INTO `dokumen_proses` VALUES (574, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:22:34.387568');
INSERT INTO `dokumen_proses` VALUES (575, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:22:45.403428');
INSERT INTO `dokumen_proses` VALUES (576, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:22:34.387568');
INSERT INTO `dokumen_proses` VALUES (577, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:22:45.403428');
INSERT INTO `dokumen_proses` VALUES (578, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:25:39.600526');
INSERT INTO `dokumen_proses` VALUES (579, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:22:45.403428');
INSERT INTO `dokumen_proses` VALUES (580, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:25:38.876657');
INSERT INTO `dokumen_proses` VALUES (581, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:22:45.403428');
INSERT INTO `dokumen_proses` VALUES (582, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:25:38.475461');
INSERT INTO `dokumen_proses` VALUES (583, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:25:18.650273');
INSERT INTO `dokumen_proses` VALUES (584, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:25:17.684858');
INSERT INTO `dokumen_proses` VALUES (585, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:22:45.403428');
INSERT INTO `dokumen_proses` VALUES (586, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 3, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:25:14.992453');
INSERT INTO `dokumen_proses` VALUES (587, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:25:37.393028');
INSERT INTO `dokumen_proses` VALUES (588, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:25:36.540950');
INSERT INTO `dokumen_proses` VALUES (589, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:22:45.403428');
INSERT INTO `dokumen_proses` VALUES (590, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:22:34.387568');
INSERT INTO `dokumen_proses` VALUES (591, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:22:45.403428');
INSERT INTO `dokumen_proses` VALUES (592, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:22:34.387568');
INSERT INTO `dokumen_proses` VALUES (593, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:22:45.403428');
INSERT INTO `dokumen_proses` VALUES (594, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:22:34.387568');
INSERT INTO `dokumen_proses` VALUES (595, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:22:45.403428');
INSERT INTO `dokumen_proses` VALUES (596, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:22:34.387568');
INSERT INTO `dokumen_proses` VALUES (597, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:22:45.403428');
INSERT INTO `dokumen_proses` VALUES (598, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:22:34.387568');
INSERT INTO `dokumen_proses` VALUES (599, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:22:45.403428');
INSERT INTO `dokumen_proses` VALUES (600, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:22:34.387568');
INSERT INTO `dokumen_proses` VALUES (601, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:22:45.403428');
INSERT INTO `dokumen_proses` VALUES (602, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:22:34.387568');
INSERT INTO `dokumen_proses` VALUES (603, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:22:45.403428');
INSERT INTO `dokumen_proses` VALUES (604, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:22:34.387568');
INSERT INTO `dokumen_proses` VALUES (605, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:22:45.403428');
INSERT INTO `dokumen_proses` VALUES (606, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 3, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:25:11.764559');
INSERT INTO `dokumen_proses` VALUES (607, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:22:45.403428');
INSERT INTO `dokumen_proses` VALUES (608, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:22:34.387568');
INSERT INTO `dokumen_proses` VALUES (609, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:22:45.403428');
INSERT INTO `dokumen_proses` VALUES (610, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:22:34.387568');
INSERT INTO `dokumen_proses` VALUES (611, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:25:48.040129');
INSERT INTO `dokumen_proses` VALUES (612, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:22:34.387568');
INSERT INTO `dokumen_proses` VALUES (613, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:25:47.324938');
INSERT INTO `dokumen_proses` VALUES (614, 1, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:44:14.542566');
INSERT INTO `dokumen_proses` VALUES (615, 2, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:44:13.087344');
INSERT INTO `dokumen_proses` VALUES (616, 3, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:44:12.477082');
INSERT INTO `dokumen_proses` VALUES (617, 2, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:44:11.277808');
INSERT INTO `dokumen_proses` VALUES (618, 2, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 2, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:44:10.830641');
INSERT INTO `dokumen_proses` VALUES (619, 2, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:44:10.452488');
INSERT INTO `dokumen_proses` VALUES (620, 4, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-22 23:40:37.265440', '2020-12-23 00:25:44.763412');
INSERT INTO `dokumen_proses` VALUES (621, 1, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-23 00:19:20.455358', '2020-12-23 00:44:09.248135');
INSERT INTO `dokumen_proses` VALUES (622, 1, 51, '-6.2373,106.8136', 'Jl. Cikatomas II No.5, RT.2/RW.4, Rw. Bar., Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12180, Indonesia', 1, 1, 1, 4500, 2000, 12000, '2020-12-22 23:40:37.265440', '2020-12-23 12:51:35.721677');
INSERT INTO `dokumen_proses` VALUES (751, 7, 51, '-7.150975,110.14025939999999', 'Jl. Rama Gg. Anoman No.858, Tlogowungu, Muncar, Gemawang, Kabupaten Temanggung, Jawa Tengah 56281, Indonesia', 1, 1, 1, 1, 1, 11, '2020-12-24 00:23:33.505808', NULL);

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
INSERT INTO `instansi` VALUES (1, 'Dinas Komunikasi dan Informatika', NULL, NULL);
INSERT INTO `instansi` VALUES (2, 'Dinas Pemberdayaan Masyarakat dan Desa', NULL, NULL);
INSERT INTO `instansi` VALUES (3, 'Dinas Kesehatan', NULL, NULL);
INSERT INTO `instansi` VALUES (4, 'Dinas Ketahanan Pangan dan Perikanan', NULL, NULL);
INSERT INTO `instansi` VALUES (5, ', membantu urusan p', NULL, NULL);

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
INSERT INTO `layanan` VALUES (1, 1, 20000, 'Pembuatan Ijin Media', 'Lorem', '2020-12-20 19:02:43.769014', '2020-12-23 00:41:38.059682');
INSERT INTO `layanan` VALUES (2, 2, 15000, 'Pembuatan Surat Ijin Penelitian', NULL, '2020-12-23 00:40:03.712421', NULL);
INSERT INTO `layanan` VALUES (3, 3, 23000, 'Pembuatan Surat Ijin Rumah Sakit', NULL, '2020-12-23 00:40:44.714455', NULL);
INSERT INTO `layanan` VALUES (4, 3, 25000, 'Pemmbuatan Surat Ijin Puskesmas', NULL, '2020-12-23 00:41:00.353260', NULL);
INSERT INTO `layanan` VALUES (5, 3, 26000, 'Pengurusan STR', NULL, '2020-12-23 00:42:36.153240', NULL);
INSERT INTO `layanan` VALUES (7, 1, 20000, 'Pembuatan Surat Ijin Rumah Sakit', 'Lorem', '2020-12-20 19:02:43.769014', '2020-12-25 03:58:24.392418');

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
INSERT INTO `user` VALUES (51, 4, 'efalardan2020@gmail.com', '$2y$10$hH/nsw8wz6SXS5oLbJ2g8OrJhUVJfRwMa663FBipm9Nu6P6X.iOh.', '2020-12-20 14:09:13.586013', NULL);
INSERT INTO `user` VALUES (53, 3, 'instansi@gmail.com', '$2y$10$hH/nsw8wz6SXS5oLbJ2g8OrJhUVJfRwMa663FBipm9Nu6P6X.iOh.', '2020-12-20 14:09:13.586013', NULL);
INSERT INTO `user` VALUES (54, 2, 'keuangan@gmail.com', '$2y$10$hH/nsw8wz6SXS5oLbJ2g8OrJhUVJfRwMa663FBipm9Nu6P6X.iOh.', '2020-12-20 14:09:13.586013', NULL);
INSERT INTO `user` VALUES (55, 1, 'superadmin@gmail.com', '$2y$10$hH/nsw8wz6SXS5oLbJ2g8OrJhUVJfRwMa663FBipm9Nu6P6X.iOh.', '2020-12-20 14:09:13.586013', '2020-12-20 15:18:34.345945');
INSERT INTO `user` VALUES (56, 4, 'efalardan@gmail.com', '$2y$10$hH/nsw8wz6SXS5oLbJ2g8OrJhUVJfRwMa663FBipm9Nu6P6X.iOh.', '2020-12-20 14:09:13.586013', NULL);
INSERT INTO `user` VALUES (57, 4, 'efalardan2021@gmail.com', '$2y$10$IJZI7TBatDgIANdTr8khzOUF67RKXmPJmTLJYJwXj3P1QZOMg0sCC', '2020-12-24 20:12:11.818009', NULL);

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
