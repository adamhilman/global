/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : global

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 26/07/2021 16:38:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_file_project
-- ----------------------------
DROP TABLE IF EXISTS `tbl_file_project`;
CREATE TABLE `tbl_file_project`  (
  `id_file` int NOT NULL AUTO_INCREMENT,
  `id_project` int NOT NULL,
  `nama_file` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `token` varchar(64) CHARACTER SET utf8 COLLATE utf8_croatian_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_file`) USING BTREE,
  INDEX `id_project`(`id_project`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = ascii COLLATE = ascii_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_file_project
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_project
-- ----------------------------
DROP TABLE IF EXISTS `tbl_project`;
CREATE TABLE `tbl_project`  (
  `id_project` int NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(255) CHARACTER SET ascii COLLATE ascii_general_ci NULL DEFAULT NULL,
  `sub_pekerjaan` varchar(255) CHARACTER SET ascii COLLATE ascii_general_ci NULL DEFAULT NULL,
  `lokasi_pekerjaan` varchar(255) CHARACTER SET ascii COLLATE ascii_general_ci NULL DEFAULT NULL,
  `nama_ppk` varchar(100) CHARACTER SET ascii COLLATE ascii_general_ci NULL DEFAULT NULL,
  `alamat_ppk` varchar(255) CHARACTER SET ascii COLLATE ascii_general_ci NULL DEFAULT NULL,
  `nomor_kontrak` varchar(60) CHARACTER SET ascii COLLATE ascii_general_ci NULL DEFAULT NULL,
  `nilai_kontrak` double NULL DEFAULT NULL,
  `selesai_kontrak` date NULL DEFAULT NULL,
  `serah_terima` int NOT NULL,
  PRIMARY KEY (`id_project`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = ascii COLLATE = ascii_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_project
-- ----------------------------
INSERT INTO `tbl_project` VALUES (2, 'Pengadaan Picture Archive Communication System Tahun 2012 Rumah Sakit Jantung dan Pembuluh Darah Harapan Kita Antara PT. Tawada Healthcare & PT. Global Integrasi Data', 'Barang & Jasa', 'Jakarta', 'Satrija Sumarkho PT. Tawada Healthcare', 'Rukan Permata\r\nSenayan Blok A\r\nNo. 18-19, Jalan\r\nTentara Pelajar\r\nNo. 5 Jakarta\r\nSelatan 12210', '066/THC/VIII/2012/K Tanggal 7 Agustus 2012', 1732631318, '2015-09-03', 0);

SET FOREIGN_KEY_CHECKS = 1;
