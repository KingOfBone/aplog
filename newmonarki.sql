/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : newmonarki

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2017-11-22 14:58:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `disburst`
-- ----------------------------
DROP TABLE IF EXISTS `disburst`;
CREATE TABLE `disburst` (
  `kodedisburst` int(11) NOT NULL AUTO_INCREMENT,
  `kodeanggaran` int(11) NOT NULL,
  `jan` bigint(100) DEFAULT NULL,
  `feb` bigint(100) DEFAULT NULL,
  `mar` bigint(100) DEFAULT NULL,
  `apr` bigint(100) DEFAULT NULL,
  `mei` bigint(100) DEFAULT NULL,
  `jun` bigint(100) DEFAULT NULL,
  `jul` bigint(100) DEFAULT NULL,
  `agu` bigint(100) DEFAULT NULL,
  `sep` bigint(100) DEFAULT NULL,
  `okt` bigint(100) DEFAULT NULL,
  `nov` bigint(100) DEFAULT NULL,
  `des` bigint(100) DEFAULT NULL,
  `randomid` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`kodedisburst`)
) ENGINE=InnoDB AUTO_INCREMENT=459 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of disburst
-- ----------------------------
INSERT INTO `disburst` VALUES ('87', '0', '0', '0', '0', '0', '0', '0', '0', '95000000', '5000000', '0', '0', '0', 'ZOWXDqFyhE');
INSERT INTO `disburst` VALUES ('111', '0', '50000000', '0', '0', '0', '50000000', '0', '0', '0', '0', '50000000', '0', '0', 'CGqIk7wv5M');
INSERT INTO `disburst` VALUES ('123', '0', '0', '0', '2000000000', '0', '0', '0', '0', '0', '3000000000', '0', '0', '0', 'aLOTv2VxlA');
INSERT INTO `disburst` VALUES ('135', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '56000000', '3uyphwakos');
INSERT INTO `disburst` VALUES ('147', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3500000', '5GRYmf4IOh');
INSERT INTO `disburst` VALUES ('159', '0', '0', '200000000', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'c5Owy2StAq');
INSERT INTO `disburst` VALUES ('171', '0', '0', '0', '0', '0', '0', '0', '25000000', '0', '0', '0', '0', '0', 'isynR5z8a4');
INSERT INTO `disburst` VALUES ('183', '0', '0', '0', '0', '0', '0', '0', '20000000', '0', '0', '0', '0', '0', 'XfvMYOpb8Q');
INSERT INTO `disburst` VALUES ('195', '0', '0', '0', '20000000', '0', '20000000', '0', '20000000', '0', '0', '0', '0', '0', 'u3RHLNgqK0');
INSERT INTO `disburst` VALUES ('207', '0', '25000000', '25000000', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'RClFyxiYa9');
INSERT INTO `disburst` VALUES ('219', '0', '0', '0', '0', '0', '0', '0', '12000000', '0', '0', '0', '0', '0', 'A6XSghEz2Y');
INSERT INTO `disburst` VALUES ('231', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '5000000', '70000000', 'buOtFjBcMH');
INSERT INTO `disburst` VALUES ('243', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1875000', 'jWZl9BKb52');
INSERT INTO `disburst` VALUES ('255', '0', '400000', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'ZPdOXg5kch');
INSERT INTO `disburst` VALUES ('267', '0', '0', '0', '0', '0', '0', '0', '50000000', '0', '0', '0', '0', '0', '2q9u6b5YvX');
INSERT INTO `disburst` VALUES ('279', '0', '0', '0', '0', '0', '0', '0', '0', '50000000', '0', '0', '0', '0', '2BIFj3axDV');
INSERT INTO `disburst` VALUES ('291', '0', '0', '0', '0', '0', '0', '0', '20000000', '0', '0', '0', '0', '0', 'VJ6mvu94Lt');
INSERT INTO `disburst` VALUES ('303', '0', '25000000', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '25000000', 'Snx1hpOrT6');
INSERT INTO `disburst` VALUES ('315', '0', '0', '400000', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3hiL08Xvf6');
INSERT INTO `disburst` VALUES ('327', '0', '0', '0', '0', '0', '0', '0', '0', '0', '400000', '0', '0', '0', 'mt9GN7OoLs');
INSERT INTO `disburst` VALUES ('339', '0', '0', '0', '0', '0', '0', '0', '0', '0', '5000000', '0', '0', '0', '5ZhdKH1Oj9');
INSERT INTO `disburst` VALUES ('351', '0', '25000000', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'mXANTOe2M4');
INSERT INTO `disburst` VALUES ('363', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '60000000000', '0', 'N1zeJWk8ys');
INSERT INTO `disburst` VALUES ('375', '0', '0', '0', '0', '0', '0', '0', '25000000', '0', '0', '0', '0', '0', 'kigA05soPK');
INSERT INTO `disburst` VALUES ('387', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '60000000', '7000000', '2jLlHZcQVh');
INSERT INTO `disburst` VALUES ('399', '0', '0', '0', '0', '0', '50000000', '0', '0', '50000000', '0', '0', '0', '0', '45Re8h2ntr');
INSERT INTO `disburst` VALUES ('411', '0', '0', '0', '800000000', '90000000', '0', '0', '0', '0', '0', '0', '0', '0', 'dXSaupBE13');
INSERT INTO `disburst` VALUES ('423', '0', '0', '0', '7500000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'M9EaNKPzI0');
INSERT INTO `disburst` VALUES ('435', '0', '0', '0', '140000000', '0', '140000000', '0', '70000000', '0', '0', '0', '0', '0', 'lgt1rCTNsH');
INSERT INTO `disburst` VALUES ('447', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '12000000', '0', '0', 'QJDuhHfdgp');

-- ----------------------------
-- Table structure for `fungsi`
-- ----------------------------
DROP TABLE IF EXISTS `fungsi`;
CREATE TABLE `fungsi` (
  `kodefungsi` int(11) NOT NULL AUTO_INCREMENT,
  `fungsi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kodefungsi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of fungsi
-- ----------------------------

-- ----------------------------
-- Table structure for `headeranggaran`
-- ----------------------------
DROP TABLE IF EXISTS `headeranggaran`;
CREATE TABLE `headeranggaran` (
  `kodeanggaran` int(11) NOT NULL AUTO_INCREMENT,
  `noprk` varchar(100) DEFAULT NULL,
  `nousulan` varchar(100) DEFAULT NULL,
  `nopr` varchar(100) DEFAULT NULL,
  `nmrwbs` varchar(100) DEFAULT NULL,
  `kode_posanggaran` int(11) NOT NULL,
  `kodefungsi` int(11) NOT NULL,
  `kodesatuan` int(11) NOT NULL,
  `uraiankegiatan` varchar(255) DEFAULT NULL,
  `durasi` varchar(255) DEFAULT NULL,
  `tartglmulai` date DEFAULT NULL,
  `blnmulai` varchar(25) DEFAULT NULL,
  `prioritas` varchar(25) DEFAULT NULL,
  `kko` varchar(25) DEFAULT NULL,
  `kkf` varchar(25) DEFAULT NULL,
  `mitigasi` varchar(100) DEFAULT NULL,
  `jenis` varchar(25) DEFAULT NULL,
  `randomid` varchar(10) DEFAULT NULL,
  `image` varchar(25) DEFAULT NULL,
  `kodeapp` int(11) NOT NULL,
  PRIMARY KEY (`kodeanggaran`)
) ENGINE=InnoDB AUTO_INCREMENT=519 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of headeranggaran
-- ----------------------------
INSERT INTO `headeranggaran` VALUES ('147', null, '001', null, null, '0', '0', '3', 'Percobaan - Pengadaan Alat Pendukung TI', null, '2018-01-01', null, '0', '1511377773_826.', '1511377773_776.', '', null, 'ZOWXDqFyhE', null, '6');
INSERT INTO `headeranggaran` VALUES ('171', null, '001', null, null, '0', '0', '3', 'Pekerjaan perbaikan tapak tower 7,8,9 SUTT 70kV Purwakarta - Subang', null, '2018-01-16', null, '1', '1511377897_686.xls', '1511377897_539.', 'Mitigasi Pertama', null, 'CGqIk7wv5M', null, '3');
INSERT INTO `headeranggaran` VALUES ('183', null, 'U01', 'PR05', 'WBS05', '0', '0', '11', 'Pengadaan kendaraan operasional', null, '2017-11-22', null, '1', '1511377914_631.xls', '1511377914_614.doc', '', 'AI', 'aLOTv2VxlA', null, '3');
INSERT INTO `headeranggaran` VALUES ('195', null, '000008', 'PR.343.34.3.2342', 'M.3162.17.07.1.0009', '0', '0', '12', 'Pengadaan Panel Kontrol GI Sayung 150 kV', null, '2017-11-28', null, '1', '1511377924_873.xls', '1511377924_175.xlsx', '', 'AI', '3uyphwakos', null, '7');
INSERT INTO `headeranggaran` VALUES ('207', null, 'U02', '330987558', 'M.3512.02.17.0.066', '0', '0', '11', 'Pengadaan Lemari untuk Kebutuhan SMP', null, '2017-11-22', null, '1', '1511377929_383.xls', '1511377929_541.docx', '', 'AO', '5GRYmf4IOh', null, '2');
INSERT INTO `headeranggaran` VALUES ('219', null, '001', null, null, '0', '0', '3', 'pembuatan gedung kontrol ', null, '2018-01-01', null, '0', '1511377946_196.', '1511377946_988.', '', null, 'c5Owy2StAq', null, '5');
INSERT INTO `headeranggaran` VALUES ('231', null, '001', null, null, '0', '0', '3', 'Pengadaan Switch', null, '2018-01-01', null, '0', '1511378009_204.', '1511378009_677.', '', null, 'isynR5z8a4', null, '6');
INSERT INTO `headeranggaran` VALUES ('243', null, '002', null, null, '0', '0', '3', 'Pengadaan Lageee', null, '2018-01-01', null, '0', '1511378077_636.', '1511378077_783.', '', null, 'XfvMYOpb8Q', null, '6');
INSERT INTO `headeranggaran` VALUES ('255', null, 'U01', 'PR01', 'WBS01', '0', '0', '11', 'Pemasangan Panel TI GI Tersebar', null, '2017-01-11', null, '1', '1511378137_381.', '1511378137_229.', '', 'AO', 'u3RHLNgqK0', null, '4');
INSERT INTO `headeranggaran` VALUES ('267', null, 'U01', null, null, '0', '0', '9', 'Pengadaan CCTV GIS Katulampa', null, '2018-03-01', null, '1', '1511378139_323.', '1511378139_415.', '', null, 'RClFyxiYa9', null, '1');
INSERT INTO `headeranggaran` VALUES ('279', null, 'U2', null, null, '0', '0', '11', 'Pengadaan anggaran', null, '2017-11-22', null, '1', '1511378148_740.', '1511378148_996.', '', null, 'A6XSghEz2Y', null, '6');
INSERT INTO `headeranggaran` VALUES ('291', null, '000011', null, null, '0', '0', '11', 'Pengadaan Panel Proteksi AVR GI Rembang 150 kV', null, '2017-12-22', null, '1', '1511378255_410.', '1511378255_943.', '', '', 'buOtFjBcMH', null, '7');
INSERT INTO `headeranggaran` VALUES ('303', null, 'U03', null, null, '0', '0', '9', 'Pengadaan material rutin pemeliharaan basecamp', null, '2017-11-23', null, '0', '1511378266_792.', '1511378266_127.', '', 'AO', 'jWZl9BKb52', null, '2');
INSERT INTO `headeranggaran` VALUES ('315', null, '002', null, null, '0', '0', '3', 'pembangunan dak kabel ', null, '2017-11-22', null, '0', '1511378282_391.', '1511378282_687.', '', '', 'ZPdOXg5kch', null, '5');
INSERT INTO `headeranggaran` VALUES ('327', null, '003', null, null, '0', '0', '3', 'Pengadaan laptop', null, '2018-01-01', null, '0', '1511378298_507.', '1511378298_530.', '', null, '2q9u6b5YvX', null, '6');
INSERT INTO `headeranggaran` VALUES ('339', null, '003', null, null, '0', '0', '3', 'Pengadaan Laptop Lagi', null, '2018-01-02', null, '0', '1511378346_990.', '1511378346_329.', '', null, '2BIFj3axDV', null, '6');
INSERT INTO `headeranggaran` VALUES ('351', null, '0', null, null, '0', '0', '0', 'asdasdasd', null, '2017-11-23', null, '0', '1511378390_742.', '1511378390_605.', '', null, 'VJ6mvu94Lt', null, '6');
INSERT INTO `headeranggaran` VALUES ('363', null, 'U01', 'PR01', 'WBS01', '0', '0', '9', 'Pemasangan CCTV GI Katulampa', null, '2017-12-15', null, '1', '1511378397_283.', '1511378397_325.', '', 'AI', 'Snx1hpOrT6', null, '1');
INSERT INTO `headeranggaran` VALUES ('375', null, '003', null, null, '0', '0', '3', 'pembangunan jalan aspal', null, '2017-11-23', null, '0', '1511378512_597.', '1511378512_662.', '', '', '3hiL08Xvf6', null, '5');
INSERT INTO `headeranggaran` VALUES ('387', null, 'U9', null, null, '0', '0', '8', 'test', null, '2017-11-14', null, '1', '1511378562_526.', '1511378562_901.', '1', null, 'mt9GN7OoLs', null, '6');
INSERT INTO `headeranggaran` VALUES ('399', null, 'U7', 'PR02', 'WBS02', '0', '0', '8', 'TEST LAGI', null, '2017-11-23', null, '1', '1511378670_485.', '1511378670_499.', '', 'AO', '5ZhdKH1Oj9', null, '1');
INSERT INTO `headeranggaran` VALUES ('411', null, 'U01', null, null, '0', '0', '9', 'AAA', null, '2017-11-23', null, '1', '1511378777_534.', '1511378777_990.', '', null, 'mXANTOe2M4', null, '1');
INSERT INTO `headeranggaran` VALUES ('423', null, 'U0003', '1006789576', '3534546756', '0', '0', '3', 'PENYAMBUNGAN DAYA LISTRIK  DAYA LISTRIK KE PT. RAYON UTAMA MAKMUR', null, '2017-11-22', null, '1', '1511378849_100.pdf', '1511378849_870.', 'Mitigasi pertama', 'AO', 'N1zeJWk8ys', null, '6');
INSERT INTO `headeranggaran` VALUES ('435', null, '001', null, null, '0', '0', '3', 'Pengadaan', null, '2017-11-01', null, 'p0', '1511378858_948.', '1511378858_662.', '', null, 'kigA05soPK', null, '6');
INSERT INTO `headeranggaran` VALUES ('447', null, '0009', null, null, '0', '0', '11', 'Pengadaan Panel Kontrol GI Mranggen 150 kV', null, '2017-11-28', null, '1', '1511379406_822.', '1511379406_101.', '', '', '2jLlHZcQVh', null, '7');
INSERT INTO `headeranggaran` VALUES ('459', null, 'U02', null, null, '0', '0', '11', 'Pemasangan CCTV GITET Mandirancan', null, '2017-03-09', null, '1', '1511379409_589.', '1511379409_858.', '', null, '45Re8h2ntr', null, '4');
INSERT INTO `headeranggaran` VALUES ('471', null, '00089', null, null, '0', '0', '11', 'Pengadaan Panel Kontrol Proteksi AVR GI Ungaran 150 kV', null, '2018-02-02', null, '1', '1511379487_233.', '1511379487_455.', '', '', 'dXSaupBE13', null, '7');
INSERT INTO `headeranggaran` VALUES ('483', null, '001', null, null, '0', '0', '9', 'Pengadaan material rutin pemeliharaan basecamp TW-1', null, '2018-02-01', null, '', '1511379497_339.', '1511379497_188.', '', '', 'M9EaNKPzI0', null, '2');
INSERT INTO `headeranggaran` VALUES ('495', null, 'U01', null, null, '0', '0', '11', 'Pemasangan dan Pengadaan Switch GI Tersebar', null, '2018-01-10', null, '1', '1511379993_851.', '1511379993_581.', '', null, 'lgt1rCTNsH', null, '4');
INSERT INTO `headeranggaran` VALUES ('507', null, 'U3', null, null, '0', '0', '8', 'Usulan anggaran', null, '2017-07-06', null, '1', '1511386737_878.', '1511386737_369.', '', null, 'QJDuhHfdgp', null, '3');

-- ----------------------------
-- Table structure for `kontrol`
-- ----------------------------
DROP TABLE IF EXISTS `kontrol`;
CREATE TABLE `kontrol` (
  `kode` int(11) NOT NULL,
  `status` varchar(25) DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kontrol
-- ----------------------------
INSERT INTO `kontrol` VALUES ('1', 'pagu indikasi', '2017');

-- ----------------------------
-- Table structure for `newdetailanggaran`
-- ----------------------------
DROP TABLE IF EXISTS `newdetailanggaran`;
CREATE TABLE `newdetailanggaran` (
  `kodedetail` int(11) NOT NULL AUTO_INCREMENT,
  `kodeanggaran` int(11) NOT NULL,
  `volumejasa` bigint(100) DEFAULT NULL,
  `volumematerial` bigint(100) DEFAULT NULL,
  `hrgsatuanjasa` bigint(100) DEFAULT NULL,
  `hrgsatuanmaterial` bigint(100) DEFAULT NULL,
  `alasan` text,
  `status` varchar(11) DEFAULT NULL,
  `tglapprove` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `randomid` varchar(10) DEFAULT NULL,
  `approvemapp` int(2) DEFAULT NULL,
  `approveassman` int(2) DEFAULT NULL,
  PRIMARY KEY (`kodedetail`)
) ENGINE=InnoDB AUTO_INCREMENT=1107 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of newdetailanggaran
-- ----------------------------
INSERT INTO `newdetailanggaran` VALUES ('387', '0', '1', '0', '100000000', '0', ' ', '3', '2017-11-22 13:36:16', 'ZOWXDqFyhE', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('411', '0', '3', '3', '20000000', '30000000', ' ', '3', '2017-11-22 11:44:03', 'CGqIk7wv5M', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('423', '0', '0', '2', '0', '3000000000', null, '3', '2017-11-22 11:47:31', 'aLOTv2VxlA', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('435', '0', '1', '20', '45000000', '56000000', ' ', '3', '2017-11-22 11:48:57', '3uyphwakos', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('447', '0', '0', '1', '0', '3500000', ' ', '3', '2017-11-22 13:27:09', '5GRYmf4IOh', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('459', '0', '200000000', '50', '2', '1', ' ', '3', '2017-11-22 11:55:24', 'c5Owy2StAq', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('471', '0', '0', '1', '0', '25000000', null, '0', null, 'isynR5z8a4', null, null);
INSERT INTO `newdetailanggaran` VALUES ('483', '0', '0', '1', '0', '50000000', null, '0', null, 'XfvMYOpb8Q', null, null);
INSERT INTO `newdetailanggaran` VALUES ('495', '0', '0', '6', '0', '10000000', ' ', '3', '2017-11-22 13:32:10', 'u3RHLNgqK0', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('507', '0', '0', '10', '0', '5000000', ' ', '3', '2017-11-22 11:43:50', 'RClFyxiYa9', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('519', '0', '1', '1', '6000000', '6000000', ' ', '3', '2017-11-22 14:06:38', 'A6XSghEz2Y', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('531', '0', '1', '2', '50000000', '75000000', ' ', '3', '2017-11-22 11:49:01', 'buOtFjBcMH', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('543', '0', '0', '150', '0', '12500', ' ', '3', '2017-11-22 13:27:15', 'jWZl9BKb52', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('555', '0', '200', '200', '1000', '1000', ' ', '3', '2017-11-22 13:50:53', 'ZPdOXg5kch', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('567', '0', '0', '1', '0', '50000000', null, '0', null, '2q9u6b5YvX', null, null);
INSERT INTO `newdetailanggaran` VALUES ('579', '0', '0', '1', '0', '50000000', null, '0', null, '2BIFj3axDV', null, null);
INSERT INTO `newdetailanggaran` VALUES ('591', '0', '1', '0', '50000000', '0', ' ', '3', '2017-11-22 14:08:02', 'VJ6mvu94Lt', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('603', '0', '0', '5', '0', '10000000', ' ', '3', '2017-11-22 11:50:13', 'Snx1hpOrT6', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('615', '0', '1', '1', '200000', '200000', ' ', '3', '2017-11-22 13:52:30', '3hiL08Xvf6', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('627', '0', '1', '0', '6000000', '0', ' ', '3', '2017-11-22 14:11:29', 'mt9GN7OoLs', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('639', '0', '0', '5', '0', '1000000', ' ', '3', '2017-11-22 11:50:56', '5ZhdKH1Oj9', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('651', '0', '0', '5', '0', '5000000', ' ', '2', '2017-11-22 11:53:11', 'mXANTOe2M4', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('663', '0', '1', '1', '8000000000', '60000000000', ' ', '3', '2017-11-22 14:12:36', 'N1zeJWk8ys', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('675', '0', '1', '1', '50000000', '100000000', ' ', '3', '2017-11-22 14:13:19', 'kigA05soPK', null, '1');
INSERT INTO `newdetailanggaran` VALUES ('687', '0', '1', '2', '5000000', '67000000', ' ', '3', '2017-11-22 11:49:05', '2jLlHZcQVh', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('699', '0', '0', '4', '12000000', '25000000', ' ', '0', '2017-11-22 13:32:19', '45Re8h2ntr', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('711', '0', '1', '3', '60000000', '890000000', ' ', '3', '2017-11-22 11:43:43', 'dXSaupBE13', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('723', '0', '0', '150', '0', '50000', ' ', '3', '2017-11-22 11:43:29', 'M9EaNKPzI0', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('735', '0', '0', '0', '0', '0', null, '4', null, 'M9EaNKPzI0', null, null);
INSERT INTO `newdetailanggaran` VALUES ('747', '0', '5', '5', '2000000', '70000000', null, '0', null, 'lgt1rCTNsH', null, null);
INSERT INTO `newdetailanggaran` VALUES ('759', '0', '0', '0', '0', '0', null, '4', null, 'dXSaupBE13', null, null);
INSERT INTO `newdetailanggaran` VALUES ('783', '0', '1', '20', '40000000', '50000000', null, '4', null, '3uyphwakos', null, null);
INSERT INTO `newdetailanggaran` VALUES ('795', '0', '1', '1', '6000000', '6000000', ' ', '0', '2017-11-22 13:40:28', 'QJDuhHfdgp', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('807', '0', '0', '2', '0', '2500000000', null, '4', null, 'aLOTv2VxlA', null, null);
INSERT INTO `newdetailanggaran` VALUES ('819', '0', '0', '2', '0', '1000000', null, '4', '2017-11-22 13:48:23', '5GRYmf4IOh', null, null);
INSERT INTO `newdetailanggaran` VALUES ('831', '0', '0', '150', '0', '12400', null, '4', null, 'jWZl9BKb52', null, null);
INSERT INTO `newdetailanggaran` VALUES ('843', '0', '1', '2', '45000000', '60000000', null, '4', null, 'buOtFjBcMH', null, null);
INSERT INTO `newdetailanggaran` VALUES ('855', '0', '1', '3', '5000000', '67000000', null, '4', null, '2jLlHZcQVh', null, null);
INSERT INTO `newdetailanggaran` VALUES ('867', '0', '0', '0', '0', '0', null, '4', null, 'Snx1hpOrT6', null, null);
INSERT INTO `newdetailanggaran` VALUES ('879', '0', '0', '0', '0', '4000000', null, '4', '2017-11-22 13:59:58', '5ZhdKH1Oj9', null, null);
INSERT INTO `newdetailanggaran` VALUES ('891', '0', '0', '0', '0', '0', null, '4', null, 'u3RHLNgqK0', null, null);
INSERT INTO `newdetailanggaran` VALUES ('903', '0', '0', '2', '0', '1000000', ' ', '8', '2017-11-22 14:00:53', '5GRYmf4IOh', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('915', '0', '200', '200', '1000', '1000', null, '4', null, 'ZPdOXg5kch', null, null);
INSERT INTO `newdetailanggaran` VALUES ('927', '0', '1', '1', '200000', '200000', null, '4', null, '3hiL08Xvf6', null, null);
INSERT INTO `newdetailanggaran` VALUES ('939', '0', '0', '2', '0', '2500000000', ' ', '8', '2017-11-22 14:06:03', 'aLOTv2VxlA', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('951', '0', '1', '20', '40000000', '50000000', ' ', '8', '2017-11-22 14:22:38', '3uyphwakos', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('963', '0', '0', '0', '0', '0', null, '5', null, 'Snx1hpOrT6', null, null);
INSERT INTO `newdetailanggaran` VALUES ('975', '0', '0', '6', '0', '10000000', ' ', '8', '2017-11-22 14:08:16', 'u3RHLNgqK0', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('987', '0', '1', '20', '40000000', '50000000', ' ', '8', '2017-11-22 14:22:44', '3uyphwakos', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('999', '0', '0', '2', '0', '1000000', null, '9', null, '5GRYmf4IOh', null, null);
INSERT INTO `newdetailanggaran` VALUES ('1011', '0', '0', '2', '0', '2500000000', null, '9', null, 'aLOTv2VxlA', null, null);
INSERT INTO `newdetailanggaran` VALUES ('1023', '0', '0', '0', '0', '0', null, '5', null, 'Snx1hpOrT6', null, null);
INSERT INTO `newdetailanggaran` VALUES ('1035', '0', '1', '20', '40000000', '50000000', null, '9', null, '3uyphwakos', null, null);
INSERT INTO `newdetailanggaran` VALUES ('1047', '0', '0', '0', '0', '0', ' ', '7', '2017-11-22 14:15:45', '5ZhdKH1Oj9', '1', '1');
INSERT INTO `newdetailanggaran` VALUES ('1059', '0', '0', '6', '0', '10000000', null, '9', null, 'u3RHLNgqK0', null, null);
INSERT INTO `newdetailanggaran` VALUES ('1071', '0', '1', '1', '10000000000', '50000000000', null, '4', null, 'N1zeJWk8ys', null, null);
INSERT INTO `newdetailanggaran` VALUES ('1083', '0', '0', '0', '0', '0', null, '9', null, '5ZhdKH1Oj9', null, null);
INSERT INTO `newdetailanggaran` VALUES ('1095', '0', '1', '1', '10000000000', '50000000000', null, '5', null, 'N1zeJWk8ys', null, null);

-- ----------------------------
-- Table structure for `pembayaran`
-- ----------------------------
DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran` (
  `kodeapp` int(11) NOT NULL,
  `kodepym` int(11) NOT NULL AUTO_INCREMENT,
  `koderealisasi` int(11) DEFAULT NULL,
  `nomigo` varchar(100) DEFAULT NULL,
  `tglpym` date DEFAULT NULL,
  `jmlpym` bigint(25) DEFAULT NULL,
  `tahap` bigint(25) DEFAULT NULL,
  `tglinput` date DEFAULT NULL,
  `randomid` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`kodepym`)
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pembayaran
-- ----------------------------
INSERT INTO `pembayaran` VALUES ('3', '63', null, 'MIGO01', '2017-11-22', '2500000000', '1', '2017-11-22', 'aLOTv2VxlA');
INSERT INTO `pembayaran` VALUES ('2', '75', null, '50009876543', '2017-12-16', '1950000', '1', '2017-12-15', '5GRYmf4IOh');
INSERT INTO `pembayaran` VALUES ('7', '87', null, 'MIGO001', '2017-12-06', '800000000', '1', '2017-12-01', '3uyphwakos');
INSERT INTO `pembayaran` VALUES ('3', '99', null, 'MIGO02', '2017-11-22', '2500000000', '2', '2017-11-22', 'aLOTv2VxlA');
INSERT INTO `pembayaran` VALUES ('4', '111', null, '001', '2017-05-08', '20000000', '1', '2017-05-09', 'u3RHLNgqK0');
INSERT INTO `pembayaran` VALUES ('7', '123', null, 'MIGO002', '2017-12-07', '50000000', '2', '2017-12-09', '3uyphwakos');
INSERT INTO `pembayaran` VALUES ('4', '135', null, '002', '2017-07-03', '20000000', '2', '2017-07-04', 'u3RHLNgqK0');
INSERT INTO `pembayaran` VALUES ('7', '147', null, 'MIGO003', '2017-12-08', '100000000', '3', '2017-12-09', '3uyphwakos');
INSERT INTO `pembayaran` VALUES ('7', '159', null, 'MIGO004', '2017-12-10', '50000000', '5', '2017-12-10', '3uyphwakos');
INSERT INTO `pembayaran` VALUES ('1', '171', null, '001', '2018-01-01', '0', '1', '2018-01-01', '5ZhdKH1Oj9');
INSERT INTO `pembayaran` VALUES ('4', '183', null, '003', '2017-08-07', '20000000', '3', '2017-08-08', 'u3RHLNgqK0');

-- ----------------------------
-- Table structure for `pos_anggaran`
-- ----------------------------
DROP TABLE IF EXISTS `pos_anggaran`;
CREATE TABLE `pos_anggaran` (
  `kode_posanggaran` int(11) NOT NULL AUTO_INCREMENT,
  `posanggaran` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode_posanggaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of pos_anggaran
-- ----------------------------

-- ----------------------------
-- Table structure for `realisasi`
-- ----------------------------
DROP TABLE IF EXISTS `realisasi`;
CREATE TABLE `realisasi` (
  `kodeapp` int(11) NOT NULL,
  `koderealisasi` int(11) NOT NULL AUTO_INCREMENT,
  `kodedetail` int(11) DEFAULT NULL,
  `nokontrak` varchar(25) DEFAULT NULL,
  `nospk` varchar(100) DEFAULT NULL,
  `nopo` varchar(100) DEFAULT NULL,
  `nilaikontrak` bigint(25) DEFAULT NULL,
  `namavendor` varchar(25) DEFAULT NULL,
  `tglkontrak` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `randomid` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`koderealisasi`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of realisasi
-- ----------------------------
INSERT INTO `realisasi` VALUES ('2', '27', null, null, '001.SPK', '3100008931', '1950000', 'PT. BISETTA', '2017-11-24', '9', '5GRYmf4IOh');
INSERT INTO `realisasi` VALUES ('3', '39', null, null, 'SPK01', 'PO01', '5000000000', 'Vendor TABS', '2017-11-22', '9', 'aLOTv2VxlA');
INSERT INTO `realisasi` VALUES ('7', '51', null, null, '0097.SPJ/DAN.02.04/APP SMRG/2017', '3100807779', '1000000000', 'PT SAE', '2017-11-23', '9', '3uyphwakos');
INSERT INTO `realisasi` VALUES ('4', '63', null, null, '001', '001', '60000000', 'Doreman Jaya', '2017-04-11', '9', 'u3RHLNgqK0');
INSERT INTO `realisasi` VALUES ('1', '75', null, null, '001', '001', '0', 'PT Anjay', '2017-12-01', '9', '5ZhdKH1Oj9');

-- ----------------------------
-- Table structure for `satuan`
-- ----------------------------
DROP TABLE IF EXISTS `satuan`;
CREATE TABLE `satuan` (
  `kodesatuan` int(11) NOT NULL AUTO_INCREMENT,
  `namasatuan` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`kodesatuan`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of satuan
-- ----------------------------
INSERT INTO `satuan` VALUES ('1', 'orang');
INSERT INTO `satuan` VALUES ('2', 'Ls');
INSERT INTO `satuan` VALUES ('3', 'Lot');
INSERT INTO `satuan` VALUES ('4', 'Dokumen');
INSERT INTO `satuan` VALUES ('5', 'Tim');
INSERT INTO `satuan` VALUES ('6', 'Kali');
INSERT INTO `satuan` VALUES ('7', 'Trip');
INSERT INTO `satuan` VALUES ('8', 'Md');
INSERT INTO `satuan` VALUES ('9', 'Buah');
INSERT INTO `satuan` VALUES ('10', 'Kegiatan');
INSERT INTO `satuan` VALUES ('11', 'Unit');
INSERT INTO `satuan` VALUES ('12', 'Bulan');
INSERT INTO `satuan` VALUES ('13', 'M3');
INSERT INTO `satuan` VALUES ('14', 'Set');
INSERT INTO `satuan` VALUES ('15', 'Gln');
INSERT INTO `satuan` VALUES ('16', 'Dus');
INSERT INTO `satuan` VALUES ('17', 'Tahun');
INSERT INTO `satuan` VALUES ('18', 'Judul');
INSERT INTO `satuan` VALUES ('19', 'Pegawai');
INSERT INTO `satuan` VALUES ('20', 'Tbg');

-- ----------------------------
-- Table structure for `user_login`
-- ----------------------------
DROP TABLE IF EXISTS `user_login`;
CREATE TABLE `user_login` (
  `kodelogin` int(11) NOT NULL AUTO_INCREMENT,
  `kodegi` int(11) NOT NULL,
  `kodebidang` int(11) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `kodeapd` int(11) NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` varchar(25) DEFAULT NULL,
  `jabatan` varchar(25) DEFAULT NULL,
  `images` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`kodelogin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_login
-- ----------------------------

-- ----------------------------
-- Table structure for `wbs`
-- ----------------------------
DROP TABLE IF EXISTS `wbs`;
CREATE TABLE `wbs` (
  `kodewbs` bigint(100) NOT NULL AUTO_INCREMENT,
  `nmrwbs` varchar(100) DEFAULT NULL,
  `namawbs` varchar(100) DEFAULT NULL,
  `tglwbs` date DEFAULT NULL,
  `jeniswbs` varchar(25) DEFAULT NULL,
  `randomid` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kodewbs`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of wbs
-- ----------------------------
INSERT INTO `wbs` VALUES ('39', 'M.3512.02.17.0.066', null, null, null, '5GRYmf4IOh');
INSERT INTO `wbs` VALUES ('51', 'WBS05', null, null, null, 'aLOTv2VxlA');
INSERT INTO `wbs` VALUES ('63', 'M.3162.17.07.1.0009', null, null, null, '3uyphwakos');
INSERT INTO `wbs` VALUES ('75', 'WBS01', null, null, null, 'Snx1hpOrT6');
INSERT INTO `wbs` VALUES ('87', 'WBS01', null, null, null, 'u3RHLNgqK0');
INSERT INTO `wbs` VALUES ('99', 'M.3162.17.07.1.0009', null, null, null, '3uyphwakos');
INSERT INTO `wbs` VALUES ('111', 'WBS01', null, null, null, 'Snx1hpOrT6');
INSERT INTO `wbs` VALUES ('123', 'WBS02', null, null, null, '5ZhdKH1Oj9');
INSERT INTO `wbs` VALUES ('135', '3534546756', null, null, null, 'N1zeJWk8ys');
