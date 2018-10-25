/*
 Navicat Premium Data Transfer

 Source Server         : siman
 Source Server Type    : MySQL
 Source Server Version : 50620
 Source Host           : localhost:3306
 Source Schema         : tspdb

 Target Server Type    : MySQL
 Target Server Version : 50620
 File Encoding         : 65001

 Date: 25/10/2018 15:34:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for mst_bagian
-- ----------------------------
DROP TABLE IF EXISTS `mst_bagian`;
CREATE TABLE `mst_bagian`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bagian` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mst_bagian
-- ----------------------------
INSERT INTO `mst_bagian` VALUES (1, 'Gudang');
INSERT INTO `mst_bagian` VALUES (2, 'Administrasi');
INSERT INTO `mst_bagian` VALUES (3, 'Hrd');
INSERT INTO `mst_bagian` VALUES (4, 'Produksi');
INSERT INTO `mst_bagian` VALUES (5, 'Pemasaran');
INSERT INTO `mst_bagian` VALUES (6, 'Accounting');
INSERT INTO `mst_bagian` VALUES (7, 'Pajak');

-- ----------------------------
-- Table structure for mst_perangkat
-- ----------------------------
DROP TABLE IF EXISTS `mst_perangkat`;
CREATE TABLE `mst_perangkat`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perangkat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mst_perangkat
-- ----------------------------
INSERT INTO `mst_perangkat` VALUES (1, 'CPU');
INSERT INTO `mst_perangkat` VALUES (2, 'Printer');
INSERT INTO `mst_perangkat` VALUES (3, 'Monitor');
INSERT INTO `mst_perangkat` VALUES (4, 'Scanner');
INSERT INTO `mst_perangkat` VALUES (5, 'Modem');

-- ----------------------------
-- Table structure for mst_teknisi
-- ----------------------------
DROP TABLE IF EXISTS `mst_teknisi`;
CREATE TABLE `mst_teknisi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_teknisi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mst_teknisi
-- ----------------------------
INSERT INTO `mst_teknisi` VALUES (1, 'Parjo');
INSERT INTO `mst_teknisi` VALUES (2, 'Amin');
INSERT INTO `mst_teknisi` VALUES (3, 'Umar');

-- ----------------------------
-- Table structure for trs_perangkat
-- ----------------------------
DROP TABLE IF EXISTS `trs_perangkat`;
CREATE TABLE `trs_perangkat`  (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `tgl_laporan` date NULL DEFAULT NULL,
  `tgl_mulai_service` date NULL DEFAULT NULL,
  `id_teknisi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_pelapor` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bagian` int(1) NULL DEFAULT NULL,
  `id_perangkat` int(1) NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  `detail_kerusakan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Progres` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_selesai` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 47 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of trs_perangkat
-- ----------------------------
INSERT INTO `trs_perangkat` VALUES (33, '2018-10-12', '2018-10-21', '1', 'komar', 3, 5, 3, 'TEST1', 'cek modem', '2018-10-14');
INSERT INTO `trs_perangkat` VALUES (45, '2018-10-02', '2018-10-03', '2', 'Agus', 2, 3, 2, 'mati', 'cek pcb', '0000-00-00');
INSERT INTO `trs_perangkat` VALUES (46, '2018-10-02', NULL, NULL, 'udin', 1, 3, 1, 'test', NULL, NULL);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `role` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', 'Ahmad', NULL, '21232f297a57a5a743894a0e4a801fc3', 1);
INSERT INTO `user` VALUES (2, 'karyawan', 'Juaniadi', NULL, '9e014682c94e0f2cc834bf7348bda428', 2);
INSERT INTO `user` VALUES (3, 'support', 'Subarkah', NULL, '434990c8a25d2be94863561ae98bd682', 3);
INSERT INTO `user` VALUES (4, 'manager', 'mandala', NULL, '1d0258c2440a8d19e716292b231e3190', 1);

SET FOREIGN_KEY_CHECKS = 1;
