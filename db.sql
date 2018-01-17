/*
SQLyog Community v10.51 
MySQL - 5.5.5-10.1.25-MariaDB : Database - ptsms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ptsms` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ptsms`;

/*Table structure for table `grup` */

CREATE TABLE `grup` (
  `kode_group` int(3) NOT NULL AUTO_INCREMENT,
  `nama_group` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode_group`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `grup` */

insert  into `grup`(`kode_group`,`nama_group`) values (1,'Administrator'),(2,'Supervisor'),(3,'Gudang'),(4,'Accounting'),(5,'Pembelian');

/*Table structure for table `icon` */

CREATE TABLE `icon` (
  `icon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `icon` */

insert  into `icon`(`icon`) values ('fa fa-book'),('fa fa-bank'),('fa fa-bar-chart'),('fa fa-barcode'),('fa fa-bar-chart-o'),('fa fa-bars'),('fa fa-beer'),('fa fa-bell'),('fa fa-bell-o'),('fa fa-bell-slash'),('fa fa-bell-slash-o'),('fa fa-binoculars'),('fa fa-birthday-cake'),('fa fa-tasks');

/*Table structure for table `man_harga_kayu` */

CREATE TABLE `man_harga_kayu` (
  `kode_harga_kayu` int(3) NOT NULL AUTO_INCREMENT,
  `kode_supplier` varchar(100) DEFAULT NULL,
  `panjang_kayu` int(3) DEFAULT NULL,
  `harga` int(15) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kd_bawah` int(11) DEFAULT NULL,
  `kd_atas` int(11) DEFAULT NULL,
  PRIMARY KEY (`kode_harga_kayu`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `man_harga_kayu` */

insert  into `man_harga_kayu`(`kode_harga_kayu`,`kode_supplier`,`panjang_kayu`,`harga`,`kabupaten`,`kecamatan`,`kd_bawah`,`kd_atas`) values (4,'1',130,760000,'Trenggalek','Watulimo',15,19),(5,'1',130,910000,'Trenggalek','Watulimo',20,24),(6,'1',130,930000,'Trenggalek','Watulimo',25,29),(7,'1',260,1020000,'Trenggalek','Watulimo',23,24),(8,'1',260,1160000,'Trenggalek','Watulimo',25,29),(9,'1',260,1040000,'Blitar','Bakung',23,24),(10,'1',260,1180000,'Blitar','Bakung',25,29),(11,'1',130,770000,'Blitar','Bakung',15,19),(12,'1',130,920000,'Blitar','Bakung',20,24),(13,'1',130,940000,'Blitar','Bakung',25,29),(14,'1',130,760000,'Blitar','Wonotirto',15,19),(16,'3',130,910000,'Trenggalek','Watulimo',15,19),(17,'3',260,910000,'Kediri','Ngancar',25,29),(19,'3',260,910000,'Trenggalek','Watulimo',25,29),(20,'1',100,760000,'Blitar','Bakung',10,15),(21,'1',100,930000,'Blitar','Bakung',16,20),(22,'1',100,910000,'Kediri','Wates',10,15),(29,'1',130,760000,'Trenggalek','Durenan',15,19),(30,'1',130,910000,'Trenggalek','Durenan',20,24);

/*Table structure for table `man_harga_kayu_importtemp` */

CREATE TABLE `man_harga_kayu_importtemp` (
  `kode_harga_kayu` int(3) NOT NULL AUTO_INCREMENT,
  `kode_supplier` varchar(100) DEFAULT NULL,
  `panjang_kayu` int(3) DEFAULT NULL,
  `harga` int(15) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kd_bawah` int(11) DEFAULT NULL,
  `kd_atas` int(11) DEFAULT NULL,
  `kd_pengguna` int(3) DEFAULT NULL,
  PRIMARY KEY (`kode_harga_kayu`)
) ENGINE=InnoDB AUTO_INCREMENT=307 DEFAULT CHARSET=latin1;

/*Data for the table `man_harga_kayu_importtemp` */

insert  into `man_harga_kayu_importtemp`(`kode_harga_kayu`,`kode_supplier`,`panjang_kayu`,`harga`,`kabupaten`,`kecamatan`,`kd_bawah`,`kd_atas`,`kd_pengguna`) values (290,'1',130,760000,'Trenggalek','Durenan',15,19,7),(291,'1',130,910000,'Trenggalek','Durenan',20,24,7),(292,'1',130,930000,'Trenggalek','Watulimo',25,29,7),(293,'1',260,1020000,'Trenggalek','Watulimo',23,24,7),(294,'1',260,1160000,'Trenggalek','Watulimo',25,29,7),(295,'1',260,1040000,'Blitar','Bakung',23,24,7),(296,'1',260,1180000,'Blitar','Bakung',25,29,7),(297,'1',130,770000,'Blitar','Bakung',15,19,7),(298,'1',130,920000,'Blitar','Bakung',20,24,7),(299,'1',130,940000,'Blitar','Bakung',25,29,7),(300,'1',130,760000,'Blitar','Wonotirto',15,19,7),(301,'3',130,910000,'Trenggalek','Watulimo',15,19,7),(302,'3',260,910000,'Kediri','Ngancar',25,29,7),(303,'3',260,910000,'Trenggalek','Watulimo',25,29,7),(304,'1',100,760000,'Blitar','Bakung',10,15,7),(305,'1',100,930000,'Blitar','Bakung',16,20,7),(306,'1',100,910000,'Kediri','Wates',10,15,7);

/*Table structure for table `man_harga_kayu_log` */

CREATE TABLE `man_harga_kayu_log` (
  `kode_harga_kayu` int(3) NOT NULL AUTO_INCREMENT,
  `kode_supplier` varchar(100) DEFAULT NULL,
  `panjang_kayu` int(3) DEFAULT NULL,
  `harga` int(15) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kd_bawah` int(11) DEFAULT NULL,
  `kd_atas` int(11) DEFAULT NULL,
  `kd_pengguna` int(3) DEFAULT NULL,
  `status` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`kode_harga_kayu`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

/*Data for the table `man_harga_kayu_log` */

insert  into `man_harga_kayu_log`(`kode_harga_kayu`,`kode_supplier`,`panjang_kayu`,`harga`,`kabupaten`,`kecamatan`,`kd_bawah`,`kd_atas`,`kd_pengguna`,`status`) values (120,'1',130,760000,'Trenggalek','Durenan',15,19,7,'gagal'),(121,'1',130,910000,'Trenggalek','Durenan',20,24,7,'gagal'),(122,'1',130,930000,'Trenggalek','Watulimo',25,29,7,'gagal'),(123,'1',260,1020000,'Trenggalek','Watulimo',23,24,7,'gagal'),(124,'1',260,1160000,'Trenggalek','Watulimo',25,29,7,'gagal'),(125,'1',260,1040000,'Blitar','Bakung',23,24,7,'gagal'),(126,'1',260,1180000,'Blitar','Bakung',25,29,7,'gagal'),(127,'1',130,770000,'Blitar','Bakung',15,19,7,'gagal'),(128,'1',130,920000,'Blitar','Bakung',20,24,7,'gagal'),(129,'1',130,940000,'Blitar','Bakung',25,29,7,'gagal'),(130,'1',130,760000,'Blitar','Wonotirto',15,19,7,'gagal'),(131,'3',130,910000,'Trenggalek','Watulimo',15,19,7,'gagal'),(132,'3',260,910000,'Kediri','Ngancar',25,29,7,'gagal'),(133,'3',260,910000,'Trenggalek','Watulimo',25,29,7,'gagal'),(134,'1',100,760000,'Blitar','Bakung',10,15,7,'gagal'),(135,'1',100,930000,'Blitar','Bakung',16,20,7,'gagal'),(136,'1',100,910000,'Kediri','Wates',10,15,7,'gagal');

/*Table structure for table `menu` */

CREATE TABLE `menu` (
  `kode_menu` int(3) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(100) DEFAULT NULL,
  `link_menu` varchar(100) DEFAULT NULL,
  `parent_menu` int(3) DEFAULT NULL,
  `sort_menu` int(3) DEFAULT NULL,
  `icon_menu` varchar(100) DEFAULT NULL,
  `active` char(1) DEFAULT NULL,
  PRIMARY KEY (`kode_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`kode_menu`,`nama_menu`,`link_menu`,`parent_menu`,`sort_menu`,`icon_menu`,`active`) values (1,'Setting','#',0,100,'fa fa-cogs','1'),(2,'Menu','Setting/Msmenu',1,1,'','1'),(3,'Grup','Setting/Group',1,2,NULL,'1'),(4,'privilege','Setting/Sistem/privilege',1,3,NULL,'1'),(5,'Pengguna','Setting/pengguna',1,4,'fa fa-users','1'),(6,'Referensi','#',0,3,'fa fa-book','1'),(7,'Referensi Supplier','Pembelian/ref_supplier',6,1,'fa fa-barcode','1'),(8,'Referensi Lokasi Kayu','Pembelian/ref_lokasi_kayu',6,2,'fa fa-ban','1'),(9,'Referensi Panjang Kayu','Pembelian/ref_panjang_kayu',6,3,'fa fa-ban','1'),(10,'Transaksi','#',0,1,'fa fa-tasks','1'),(11,'Manajemen Harga Kayu','Pembelian/man_harga_kayu',10,1,'fa fa-ban','1'),(12,'Transaksi DUKB','pembelian/man_dukb',10,2,'fa fa-ban','1'),(13,'Transaksi BAP ','Pembelian/man_bap',10,3,'fa fa-bank','1'),(14,'Referensi Grader','Pembelian/ref_grader',6,4,'fa fa-ban','1'),(15,'Referensi Harga Kayu','Pembelian/man_harga_kayu',6,5,'fa fa-ban','1'),(17,'Validasi DUKB','Pembelian/man_dukb/validasi',10,4,'fa fa-ban','1'),(18,'Laporan','#',0,2,'fa fa-book','1'),(19,'Laporan Pembayaran','Pembelian/lap_pembayaran',18,1,'fa fa-book','1'),(20,'Rekap Pembayaran Harian','Pembelian/rp_harian',18,2,'fa fa-book','1'),(21,'Rekap Pembayaran','pembelian/rp',18,2,'fa fa-book','1'),(22,'Rekap Pembayaran Supplier','pembelian/rp_sup',18,3,'fa fa-book','1'),(23,'Referensi Supplier','gudang/ref_supplier',6,7,'fa fa-book','1'),(24,'DUKB Tervalidasi','Pembelian/man_dukb/dukb_tervalidasi',10,5,'fa fa-book','1');

/*Table structure for table `pengguna` */

CREATE TABLE `pengguna` (
  `kode_pengguna` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama_pengguna` varchar(100) DEFAULT NULL,
  `kode_group` int(3) DEFAULT NULL,
  PRIMARY KEY (`kode_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `pengguna` */

insert  into `pengguna`(`kode_pengguna`,`username`,`password`,`nama_pengguna`,`kode_group`) values (1,'admin','admin','rahmad junianto',1),(4,'gudang','gudang','gudang',3),(6,'accounting','accounting','accounting',4),(7,'pembelian','pembelian','Pembelian',5),(8,'spv','spv','spv',2),(9,'beli','beli','beli',5);

/*Table structure for table `ref_grader` */

CREATE TABLE `ref_grader` (
  `kd_grader` int(11) NOT NULL AUTO_INCREMENT,
  `nm_grader` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_grader`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `ref_grader` */

insert  into `ref_grader`(`kd_grader`,`nm_grader`) values (2,'Dian'),(4,'Doni');

/*Table structure for table `ref_lokasi_kayu` */

CREATE TABLE `ref_lokasi_kayu` (
  `kode_lokasi` int(3) NOT NULL AUTO_INCREMENT,
  `kabupaten` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode_lokasi`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `ref_lokasi_kayu` */

insert  into `ref_lokasi_kayu`(`kode_lokasi`,`kabupaten`,`kecamatan`) values (1,'Trenggalek','Watulimo'),(3,'Kediri','Wates'),(4,'Blitar','Bakung'),(5,'Kediri','Ngancar'),(6,'Blitar','Wonotirto');

/*Table structure for table `ref_panjang_kayu` */

CREATE TABLE `ref_panjang_kayu` (
  `kode_panjang_kayu` int(3) NOT NULL AUTO_INCREMENT,
  `panjang_kayu` int(3) DEFAULT NULL,
  `kelas_diameter` varchar(10) DEFAULT NULL,
  `diameter` int(3) DEFAULT NULL,
  `v_per_btg` double DEFAULT NULL,
  `kd_atas` int(3) DEFAULT NULL,
  `kd_bawah` int(3) DEFAULT NULL,
  PRIMARY KEY (`kode_panjang_kayu`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `ref_panjang_kayu` */

insert  into `ref_panjang_kayu`(`kode_panjang_kayu`,`panjang_kayu`,`kelas_diameter`,`diameter`,`v_per_btg`,`kd_atas`,`kd_bawah`) values (1,130,'',15,0.023,19,15),(2,130,'15-19',16,0.0261,19,15),(4,130,'15-19',18,0.0331,19,15),(5,130,'15-19 ',17,0.0295,19,15),(6,130,'15-19',19,0.0369,19,15),(7,130,'20-24',20,0.0408,24,20),(8,130,'20-24',21,0.045,24,20),(9,130,'20-24',22,0.0494,24,20),(12,130,'20-24',23,0.054,24,20),(13,130,'20-24',24,0.0588,24,20),(14,130,'25-29',25,0.0638,29,25),(15,260,'23-24',23,0.108,24,23),(16,260,'23-24',24,0.1176,24,23),(17,260,'25-29',25,0.1276,29,25),(18,130,'25-29',26,0.069,29,25),(19,130,NULL,27,0.0744,29,25),(20,130,NULL,28,0.08,29,25),(21,130,NULL,29,0.0858,29,25),(22,100,NULL,10,0.0078,15,10),(23,100,NULL,11,0.0095,15,10),(24,100,NULL,12,0.0113,15,10),(25,100,NULL,14,0.0154,15,10),(26,100,NULL,13,0.0133,15,10),(27,100,NULL,16,0.0201,20,16),(28,100,NULL,17,0.0227,20,16),(29,100,NULL,18,0.0254,20,16),(30,100,NULL,19,0.0283,15,16),(31,100,NULL,20,0.0314,20,16),(32,260,NULL,26,0.138,29,25),(33,260,NULL,27,0.1488,29,25),(34,260,NULL,28,0.16,29,25),(35,260,NULL,29,0.1716,29,25);

/*Table structure for table `ref_supplier` */

CREATE TABLE `ref_supplier` (
  `kode_supplier` int(3) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `ref_supplier` */

insert  into `ref_supplier`(`kode_supplier`,`nama_supplier`,`email`,`hp`,`kecamatan`,`kabupaten`,`alamat`) values (1,'Kamim Yusuf','yusuf@gmail','085853335400','Sumberpucung','kab malang','malang'),(3,'Anam','Anam@gmail0','0858544455560','Durenan','Trenggalek','Durenan');

/*Table structure for table `ref_supplier_gudang` */

CREATE TABLE `ref_supplier_gudang` (
  `kode_supplier` int(3) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ref_supplier_gudang` */

insert  into `ref_supplier_gudang`(`kode_supplier`,`nama_supplier`,`email`,`hp`,`kecamatan`,`kabupaten`,`alamat`) values (2,'Rahmad','rahmadjunianto.rj@gmail.com','085853335400','Mojoroto','Kediri','Perum Griya Intan Permai Blok 12 RT 04 RW 03 ');

/*Table structure for table `role` */

CREATE TABLE `role` (
  `kode_role` int(3) NOT NULL AUTO_INCREMENT,
  `kode_group` int(3) DEFAULT NULL,
  `kode_menu` int(3) DEFAULT NULL,
  `status_role` char(1) DEFAULT NULL,
  PRIMARY KEY (`kode_role`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

/*Data for the table `role` */

insert  into `role`(`kode_role`,`kode_group`,`kode_menu`,`status_role`) values (1,1,1,'1'),(3,1,2,'1'),(4,1,3,'1'),(5,1,4,'1'),(6,1,5,'1'),(7,1,6,'0'),(8,1,7,'0'),(9,1,8,'0'),(10,2,1,'0'),(11,2,2,'0'),(12,2,3,'0'),(13,2,4,'0'),(14,2,5,'0'),(15,2,6,'0'),(16,4,1,'0'),(17,4,2,'0'),(18,4,3,'0'),(19,4,4,'0'),(20,4,5,'0'),(21,4,6,'0'),(22,3,1,'0'),(23,3,2,'0'),(24,3,3,'0'),(25,3,4,'0'),(26,3,5,'0'),(27,3,6,'1'),(28,3,7,'0'),(29,5,1,'0'),(30,5,2,'0'),(31,5,3,'0'),(32,5,4,'0'),(33,5,5,'0'),(34,5,6,'1'),(35,5,7,'1'),(36,5,8,'1'),(37,5,9,'1'),(38,5,10,'1'),(39,5,11,'0'),(40,5,12,'1'),(41,5,13,'1'),(42,2,7,'0'),(43,2,8,'0'),(44,2,9,'0'),(45,2,10,'1'),(46,2,11,'0'),(47,2,12,'1'),(48,2,13,'1'),(49,2,14,'0'),(50,5,14,'1'),(51,5,15,'1'),(52,2,15,'0'),(53,2,16,'0'),(54,2,17,'1'),(55,5,17,'0'),(56,5,18,'1'),(57,5,19,'1'),(58,5,20,'1'),(59,5,21,'1'),(60,5,22,'0'),(61,3,8,'0'),(62,3,9,'0'),(63,3,10,'0'),(64,3,11,'0'),(65,3,12,'0'),(66,3,13,'0'),(67,3,14,'0'),(68,3,15,'0'),(69,3,17,'0'),(70,3,18,'0'),(71,3,19,'0'),(72,3,20,'0'),(73,3,21,'0'),(74,3,22,'0'),(75,3,23,'1'),(76,2,18,'1'),(77,2,19,'1'),(78,2,20,'1'),(79,2,21,'1'),(80,2,22,'0'),(81,2,23,'0'),(82,2,24,'1');

/*Table structure for table `tr_dukb` */

CREATE TABLE `tr_dukb` (
  `id_dukb` int(11) NOT NULL AUTO_INCREMENT,
  `kd_grader` varchar(100) DEFAULT NULL,
  `kode_supplier` varchar(100) DEFAULT NULL,
  `plat_nomor` varchar(10) DEFAULT NULL,
  `jenis_kayu` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kd_pengguna` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `asal_kayu` varchar(100) DEFAULT NULL,
  `kd_siklus` varchar(10) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tgl_validasi` date DEFAULT NULL,
  PRIMARY KEY (`id_dukb`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

/*Data for the table `tr_dukb` */

insert  into `tr_dukb`(`id_dukb`,`kd_grader`,`kode_supplier`,`plat_nomor`,`jenis_kayu`,`kabupaten`,`kecamatan`,`kd_pengguna`,`tanggal`,`asal_kayu`,`kd_siklus`,`status`,`tgl_validasi`) values (70,'2','1','AG 6628 BR','Sengon','Blitar','Bakung',7,'2018-01-12','Slawe','MT-160','Belum Tervalidasi',NULL),(71,'2','1','AG 6628 BR','Sengon','Blitar','Wonotirto',7,'2018-01-12','Slawe','MT-162','Belum Tervalidasi',NULL),(72,'2','1','AG 6628 BR','Mahoni','Kediri','Wates',7,'2018-01-12','Slawe','MT-163','Tervalidasi','2018-01-15'),(73,'2','1','AG 6628 BR','Sengon','Trenggalek','Watulimo',7,'2018-01-12','Slawe','MT-161','Tervalidasi','2018-01-15'),(74,'2','3','AG 6628 BR','Sengon','Kediri','Ngancar',7,'2018-01-12','Slawe','MT-165','Belum Tervalidasi',NULL),(75,'2','3','AG 6628 BR','Mahoni','Trenggalek','Watulimo',7,'2018-01-12','Slawe','MT-166','Belum Tervalidasi',NULL),(76,'2','1','AG 6628 BR','Sengon','Blitar','Bakung',7,'2018-01-15','Slawe','MT-166','Tervalidasi','2018-01-15'),(77,'2','1','AG 6628 BR','Sengon','Blitar','Bakung',9,'2018-01-15','Slawe','MT-169','Tervalidasi','2018-01-15'),(78,'2','1','AG 6628 BR','Sengon','Kediri','Wates',7,'2018-01-15','Slawe','MT-159','Tervalidasi','2018-01-15');

/*Table structure for table `tr_dukb_detail` */

CREATE TABLE `tr_dukb_detail` (
  `id_dukb_detail` int(11) NOT NULL AUTO_INCREMENT,
  `diameter` int(11) DEFAULT NULL,
  `panjang_kayu` int(11) DEFAULT NULL,
  `batang` int(11) DEFAULT NULL,
  `volume` float DEFAULT NULL,
  `tr_dukb_id` int(11) DEFAULT NULL,
  `kd_bawah` int(11) DEFAULT NULL,
  `kd_atas` int(11) DEFAULT NULL,
  `kd_pengguna` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_dukb_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=570 DEFAULT CHARSET=latin1;

/*Data for the table `tr_dukb_detail` */

insert  into `tr_dukb_detail`(`id_dukb_detail`,`diameter`,`panjang_kayu`,`batang`,`volume`,`tr_dukb_id`,`kd_bawah`,`kd_atas`,`kd_pengguna`,`harga`) values (1,10,100,1,0.0078,76,10,15,7,5928),(2,15,130,1,0.023,77,15,19,9,17710),(3,16,130,1,0.0261,77,15,19,9,20097),(4,10,100,1,0.0078,78,10,15,7,7098),(5,11,100,1,0.0095,78,10,15,7,8645),(497,10,100,1,0.0078,70,10,15,7,5928),(498,11,100,1,0.0095,70,10,15,7,7220),(499,12,100,1,0.0113,70,10,15,7,8588),(500,13,100,1,0.0133,70,10,15,7,10108),(501,14,100,1,0.0154,70,10,15,7,11704),(502,16,100,1,0.0201,70,16,20,7,18693),(503,17,100,1,0.0227,70,16,20,7,21111),(504,18,100,1,0.0254,70,16,20,7,23622),(505,20,100,1,0.0314,70,16,20,7,29202),(506,15,130,1,0.023,70,15,19,7,17710),(507,16,130,1,0.0261,70,15,19,7,20097),(508,17,130,1,0.0295,70,15,19,7,22715),(509,18,130,1,0.0331,70,15,19,7,25487),(510,19,130,1,0.0368,70,15,19,7,28336),(511,20,130,1,0.0408,70,20,24,7,37536),(512,21,130,1,0.045,70,20,24,7,41400),(513,22,130,1,0.0494,70,20,24,7,45448),(514,23,130,1,0.054,70,20,24,7,49680),(515,24,130,11,0.6466,70,20,24,7,594872),(516,25,130,1,0.0638,70,25,29,7,59972),(517,26,130,1,0.069,70,25,29,7,64860),(518,27,130,1,0.0744,70,25,29,7,69936),(519,28,130,1,0.08,70,25,29,7,75200),(520,29,130,1,0.0858,70,25,29,7,80652),(521,23,260,1,0.108,70,23,24,7,112320),(522,24,260,1,0.1176,70,23,24,7,122304),(523,25,260,1,0.1276,70,25,29,7,150568),(524,26,260,1,0.138,70,25,29,7,162840),(525,27,260,1,0.1488,70,25,29,7,175584),(526,28,260,1,0.16,70,25,29,7,188800),(527,29,260,1,0.1716,70,25,29,7,202488),(528,15,130,1,0.023,71,15,19,7,17480),(529,16,130,1,0.0261,71,15,19,7,19836),(530,17,130,1,0.0295,71,15,19,7,22420),(531,18,130,1,0.0331,71,15,19,7,25156),(532,19,130,1,0.0368,71,15,19,7,27968),(533,10,100,1,0.0078,72,10,15,7,7098),(534,11,100,1,0.0095,72,10,15,7,8645),(535,12,100,1,0.0113,72,10,15,7,10283),(536,13,100,1,0.0133,72,10,15,7,12103),(537,14,100,1,0.0154,72,10,15,7,14014),(538,15,130,1,0.023,73,15,19,7,17480),(539,16,130,2,0.0522,73,15,19,7,39672),(540,17,130,4,0.118,73,15,19,7,89680),(541,18,130,6,0.1984,73,15,19,7,150784),(542,19,130,7,0.2579,73,15,19,7,196004),(543,20,130,5,0.2041,73,20,24,7,185731),(544,21,130,4,0.18,73,20,24,7,163800),(545,22,130,4,0.1976,73,20,24,7,179816),(546,23,130,3,0.162,73,20,24,7,147420),(547,24,130,1,0.0588,73,20,24,7,53508),(548,25,130,3,0.1913,73,25,29,7,177909),(549,26,130,2,0.138,73,25,29,7,128340),(550,27,130,1,0.0744,73,25,29,7,69192),(551,24,260,1,0.1176,73,23,24,7,119952),(552,25,260,1,0.1276,73,25,29,7,148016),(553,26,260,1,0.138,73,25,29,7,160080),(554,28,260,3,0.48,73,25,29,7,556800),(555,25,260,1,0.1276,74,25,29,7,116116),(556,26,260,1,0.138,74,25,29,7,125580),(557,27,260,1,0.1488,74,25,29,7,135408),(558,28,260,1,0.16,74,25,29,7,145600),(559,29,260,1,0.1716,74,25,29,7,156156),(560,15,130,1,0.023,75,15,19,7,20930),(561,16,130,1,0.0261,75,15,19,7,23751),(562,17,130,1,0.0295,75,15,19,7,26845),(563,18,130,1,0.0331,75,15,19,7,30121),(564,19,130,2,0.0737,75,15,19,7,67067),(565,25,260,1,0.1276,75,25,29,7,116116),(566,26,260,2,0.2759,75,25,29,7,251069),(567,27,260,3,0.4464,75,25,29,7,406224),(568,28,260,1,0.16,75,25,29,7,145600),(569,29,260,4,0.6866,75,25,29,7,624806);

/*Table structure for table `tr_dukb_detail_temp` */

CREATE TABLE `tr_dukb_detail_temp` (
  `id_dukb_detail` int(11) NOT NULL AUTO_INCREMENT,
  `diameter` int(11) DEFAULT NULL,
  `panjang_kayu` int(11) DEFAULT NULL,
  `batang` int(11) DEFAULT NULL,
  `volume` float DEFAULT NULL,
  `tr_dukb_id` int(11) DEFAULT NULL,
  `kd_bawah` int(11) DEFAULT NULL,
  `kd_atas` int(11) DEFAULT NULL,
  `kd_pengguna` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_dukb_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tr_dukb_detail_temp` */

/*Table structure for table `v_ref_panjang_kayu` */

DROP TABLE IF EXISTS `v_ref_panjang_kayu`;

/*!50001 CREATE TABLE  `v_ref_panjang_kayu`(
 `kode_panjang_kayu` int(3) ,
 `panjang_kayu` varchar(14) ,
 `kd` varchar(26) ,
 `diameter` varchar(14) ,
 `v_per_btg` varchar(32) 
)*/;

/*View structure for view v_ref_panjang_kayu */

/*!50001 DROP TABLE IF EXISTS `v_ref_panjang_kayu` */;
/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_ref_panjang_kayu` AS select `ref_panjang_kayu`.`kode_panjang_kayu` AS `kode_panjang_kayu`,concat(`ref_panjang_kayu`.`panjang_kayu`,' cm') AS `panjang_kayu`,concat(`ref_panjang_kayu`.`kd_bawah`,'-',`ref_panjang_kayu`.`kd_atas`,' cm') AS `kd`,concat(`ref_panjang_kayu`.`diameter`,' cm') AS `diameter`,(case when (length(`ref_panjang_kayu`.`v_per_btg`) = 5) then replace(concat(`ref_panjang_kayu`.`v_per_btg`,'0 M&sup3;'),'.',',') when (length(`ref_panjang_kayu`.`v_per_btg`) = 4) then replace(concat(`ref_panjang_kayu`.`v_per_btg`,'00 M&sup3;'),'.',',') else replace(concat(`ref_panjang_kayu`.`v_per_btg`,' M&sup3;'),'.',',') end) AS `v_per_btg` from `ref_panjang_kayu` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
