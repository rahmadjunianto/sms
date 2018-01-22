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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `man_harga_kayu` */

insert  into `man_harga_kayu`(`kode_harga_kayu`,`kode_supplier`,`panjang_kayu`,`harga`,`kabupaten`,`kecamatan`,`kd_bawah`,`kd_atas`) values (4,'1',130,760000,'Trenggalek','Watulimo',15,19),(5,'1',130,910000,'Trenggalek','Watulimo',20,24),(6,'1',130,930000,'Trenggalek','Watulimo',25,29),(7,'1',260,1020000,'Trenggalek','Watulimo',23,24),(8,'1',260,1160000,'Trenggalek','Watulimo',25,29),(9,'1',260,1040000,'Blitar','Bakung',23,24),(10,'1',260,1180000,'Blitar','Bakung',25,29),(11,'1',130,770000,'Blitar','Bakung',15,19),(12,'1',130,920000,'Blitar','Bakung',20,24),(13,'1',130,940000,'Blitar','Bakung',25,29),(14,'1',130,760000,'Blitar','Wonotirto',15,19),(16,'3',130,910000,'Trenggalek','Watulimo',15,19),(17,'3',260,910000,'Kediri','Ngancar',25,29),(19,'3',260,910000,'Trenggalek','Watulimo',25,29),(20,'1',100,760000,'Blitar','Bakung',10,15),(21,'1',100,930000,'Blitar','Bakung',16,20),(22,'1',100,910000,'Kediri','Wates',10,15),(29,'1',130,760000,'Trenggalek','Durenan',15,19),(30,'1',130,910000,'Trenggalek','Durenan',20,24),(31,'4',130,700000,'Kediri','Plosoklaten',15,19),(32,'4',260,910000,'Kediri','Plosoklaten',25,29),(33,'4',100,760000,'Kediri','Plosoklaten',16,20),(34,'4',130,760000,'Trenggalek','Watulimo',15,19),(35,'4',130,780000,'Blitar','Wonotirto',20,24),(36,'4',130,700000,'Blitar','Bakung',15,19),(37,'4',260,910000,'Blitar','Bakung',25,29),(38,'4',100,690000,'Blitar','Bakung',10,15),(39,'3',130,630000,'Blitar','Bakung',15,19),(40,'5',130,700000,'Trenggalek','Watulimo',15,19),(41,'5',260,900000,'Trenggalek','Watulimo',25,29),(42,'5',130,710000,'Kediri','Wates',15,19),(43,'5',260,910000,'Kediri','Wates',25,29),(44,'5',130,720000,'Kediri','Ngancar',15,19),(45,'5',100,690000,'Kediri','Ngancar',16,15),(46,'5',130,780000,'Kediri','Plosoklaten',25,29),(47,'5',100,740000,'Kediri','Pagu',16,20),(48,'6',130,720000,'Blitar','Bakung',15,19),(49,'6',260,890000,'Blitar','Bakung',23,24),(50,'7',260,930000,'Blitar','Bakung',25,29),(51,'8',130,780000,'Blitar','Bakung',25,29);

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`kode_menu`,`nama_menu`,`link_menu`,`parent_menu`,`sort_menu`,`icon_menu`,`active`) values (1,'Setting','#',0,100,'fa fa-cogs','1'),(2,'Menu','Setting/Msmenu',1,1,'','1'),(3,'Grup','Setting/Group',1,2,NULL,'1'),(4,'privilege','Setting/Sistem/privilege',1,3,NULL,'1'),(5,'Pengguna','Setting/pengguna',1,4,'fa fa-users','1'),(6,'Referensi','#',0,3,'fa fa-book','1'),(7,'Referensi Supplier','Pembelian/ref_supplier',6,1,'fa fa-barcode','1'),(8,'Referensi Lokasi Kayu','Pembelian/ref_lokasi_kayu',6,2,'fa fa-ban','1'),(9,'Referensi Panjang Kayu','Pembelian/ref_panjang_kayu',6,3,'fa fa-ban','1'),(10,'Transaksi','#',0,1,'fa fa-tasks','1'),(11,'Manajemen Harga Kayu','Pembelian/man_harga_kayu',10,1,'fa fa-ban','1'),(12,'Transaksi DUKB','pembelian/man_dukb',10,2,'fa fa-ban','1'),(13,'Transaksi BAP ','Pembelian/man_bap',10,3,'fa fa-bank','1'),(14,'Referensi Grader','Pembelian/ref_grader',6,4,'fa fa-ban','1'),(15,'Referensi Harga Kayu','Pembelian/man_harga_kayu',6,5,'fa fa-ban','1'),(17,'Validasi DUKB','Pembelian/man_dukb/validasi',10,4,'fa fa-ban','1'),(18,'Laporan','#',0,2,'fa fa-book','1'),(19,'Laporan Pembayaran','Pembelian/lap_pembayaran',18,1,'fa fa-book','1'),(20,'Rekap Pembayaran Harian','Pembelian/rp_harian',18,2,'fa fa-book','1'),(21,'Rekap Pembayaran','pembelian/rp',18,2,'fa fa-book','1'),(22,'Rekap Pembayaran Supplier','pembelian/rp_sup',18,3,'fa fa-book','1'),(23,'Referensi Supplier','gudang/ref_supplier',6,7,'fa fa-book','1'),(24,'DUKB Tervalidasi','Pembelian/man_dukb/dukb_tervalidasi',10,5,'fa fa-book','1'),(25,'Laporan Depo Supplier','Pembelian/lap_depo_sup',18,4,'fa fa-book','1'),(26,'Laporan Berdasarkan Wilayah','Pembelian/lap_wil',18,5,'fa fa-book','1'),(27,'Referensi Barang','gudang/ref_barang',6,8,'fa fa-bank','1'),(28,'Referensi Kategori','Gudang/ref_kategori',6,9,'fa fa-book','1'),(29,'Referensi Harga Barang Stock','gudang/ref_barang/harga_stock',6,10,'fa fa-book','1'),(30,'Transaksi Barang Masuk','gudang/tr_barang_masuk',10,6,'fa fa-book','1'),(31,'Transaksi Barang Keluar','gudang/tr_barang_keluar',10,7,'fa fa-book','1'),(32,'Referensi Unit','gudang/ref_unit',6,7,'fa fa-book','1'),(33,'Laporan  Pengeluaran Barang per Divisi','gudang/laporan/lap_per_divisi',18,7,'fa fa-book','1'),(34,'Laporan Pengeluaran Barang per Kategori ','gudang/laporan/lap_stock_jb',18,8,'fa fa-book','1'),(35,'Laporan Akhir Stock','gudang/lap_akhir_stock',18,9,'fa fa-book','1');

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

/*Table structure for table `ref_barang` */

CREATE TABLE `ref_barang` (
  `kd_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nm_barang` varchar(50) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `kd_kategori` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `ref_barang` */

insert  into `ref_barang`(`kd_barang`,`nm_barang`,`satuan`,`kd_kategori`,`stock`,`harga`) values (1,'Kertas A4 80 gr','rim',1,100,35500),(4,'Tinta','Botol',1,90,35000),(5,'Monitor','unit',4,80,350000),(6,'Spidol','pack',1,0,0),(7,'Keyboard','unit',4,0,0),(8,'Printer','unit',4,0,0);

/*Table structure for table `ref_grader` */

CREATE TABLE `ref_grader` (
  `kd_grader` int(11) NOT NULL AUTO_INCREMENT,
  `nm_grader` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_grader`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `ref_grader` */

insert  into `ref_grader`(`kd_grader`,`nm_grader`) values (2,'Dian'),(4,'Doni'),(5,'Bagus'),(6,'Prasetya');

/*Table structure for table `ref_kategori` */

CREATE TABLE `ref_kategori` (
  `kd_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kategori` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kd_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `ref_kategori` */

insert  into `ref_kategori`(`kd_kategori`,`nm_kategori`) values (1,'ATK'),(2,'Mesin'),(4,'Komputers');

/*Table structure for table `ref_lokasi_kayu` */

CREATE TABLE `ref_lokasi_kayu` (
  `kode_lokasi` int(3) NOT NULL AUTO_INCREMENT,
  `kabupaten` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode_lokasi`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `ref_lokasi_kayu` */

insert  into `ref_lokasi_kayu`(`kode_lokasi`,`kabupaten`,`kecamatan`) values (1,'Trenggalek','Watulimo'),(3,'Kediri','Wates'),(4,'Blitar','Bakung'),(5,'Kediri','Ngancar'),(6,'Blitar','Wonotirto'),(7,'Kediri','Plosoklaten'),(8,'Kediri','Pagu'),(9,'Trenggalek','Durenan');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `ref_supplier` */

insert  into `ref_supplier`(`kode_supplier`,`nama_supplier`,`email`,`hp`,`kecamatan`,`kabupaten`,`alamat`) values (1,'Kamim Yusuf','yusuf@gmail','085853335400','Sumberpucung','kab malang','malang'),(3,'Anam','Anam@gmail0','0858544455560','Durenan','Trenggalek','Durenan'),(4,'Imam','imam@gmail.com','085853335999','Mojo','Kediri','Mojo'),(5,'Yoga ','yoga@gmail.com','085887650987','Mojoroto','Kediri','Mojoroto'),(6,'Ahmad','Ahmad@gmail.com','089876879876','Banyakan','Kediri','banyakan'),(7,'Eko','eko@gmail.com','087889986628','Semen','Kediri','Semen'),(8,'Wijaya','wijaya@gmail.com','085811789187','Pagu','Kediri','pagu');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ref_supplier_gudang` */

/*Table structure for table `ref_unit` */

CREATE TABLE `ref_unit` (
  `kd_unit` int(11) NOT NULL AUTO_INCREMENT,
  `nm_unit` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `ref_unit` */

insert  into `ref_unit`(`kd_unit`,`nm_unit`) values (3,'Unit 2'),(4,'Unit 1');

/*Table structure for table `role` */

CREATE TABLE `role` (
  `kode_role` int(3) NOT NULL AUTO_INCREMENT,
  `kode_group` int(3) DEFAULT NULL,
  `kode_menu` int(3) DEFAULT NULL,
  `status_role` char(1) DEFAULT NULL,
  PRIMARY KEY (`kode_role`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

/*Data for the table `role` */

insert  into `role`(`kode_role`,`kode_group`,`kode_menu`,`status_role`) values (1,1,1,'1'),(3,1,2,'1'),(4,1,3,'1'),(5,1,4,'1'),(6,1,5,'1'),(7,1,6,'0'),(8,1,7,'0'),(9,1,8,'0'),(10,2,1,'0'),(11,2,2,'0'),(12,2,3,'0'),(13,2,4,'0'),(14,2,5,'0'),(15,2,6,'0'),(16,4,1,'0'),(17,4,2,'0'),(18,4,3,'0'),(19,4,4,'0'),(20,4,5,'0'),(21,4,6,'0'),(22,3,1,'0'),(23,3,2,'0'),(24,3,3,'0'),(25,3,4,'0'),(26,3,5,'0'),(27,3,6,'1'),(28,3,7,'0'),(29,5,1,'0'),(30,5,2,'0'),(31,5,3,'0'),(32,5,4,'0'),(33,5,5,'0'),(34,5,6,'1'),(35,5,7,'1'),(36,5,8,'1'),(37,5,9,'1'),(38,5,10,'1'),(39,5,11,'0'),(40,5,12,'1'),(41,5,13,'1'),(42,2,7,'0'),(43,2,8,'0'),(44,2,9,'0'),(45,2,10,'1'),(46,2,11,'0'),(47,2,12,'1'),(48,2,13,'1'),(49,2,14,'0'),(50,5,14,'1'),(51,5,15,'1'),(52,2,15,'0'),(53,2,16,'0'),(54,2,17,'1'),(55,5,17,'0'),(56,5,18,'1'),(57,5,19,'1'),(58,5,20,'1'),(59,5,21,'1'),(60,5,22,'0'),(61,3,8,'0'),(62,3,9,'0'),(63,3,10,'1'),(64,3,11,'0'),(65,3,12,'0'),(66,3,13,'0'),(67,3,14,'0'),(68,3,15,'0'),(69,3,17,'0'),(70,3,18,'1'),(71,3,19,'0'),(72,3,20,'0'),(73,3,21,'0'),(74,3,22,'0'),(75,3,23,'1'),(76,2,18,'1'),(77,2,19,'1'),(78,2,20,'1'),(79,2,21,'1'),(80,2,22,'0'),(81,2,23,'0'),(82,2,24,'1'),(83,5,23,'0'),(84,5,24,'0'),(85,5,25,'1'),(86,5,26,'1'),(87,2,25,'1'),(88,2,26,'1'),(89,3,24,'0'),(90,3,25,'0'),(91,3,26,'0'),(92,3,27,'1'),(93,3,28,'1'),(94,3,29,'1'),(95,3,30,'1'),(96,3,31,'1'),(97,3,32,'1'),(98,3,33,'1'),(99,3,34,'1'),(100,3,35,'1');

/*Table structure for table `tr_barang_keluar` */

CREATE TABLE `tr_barang_keluar` (
  `kd_barang_keluar` int(11) NOT NULL AUTO_INCREMENT,
  `kd_barang` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `nm_barang` varchar(50) DEFAULT NULL,
  `kd_unit` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_barang_keluar`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Data for the table `tr_barang_keluar` */

insert  into `tr_barang_keluar`(`kd_barang_keluar`,`kd_barang`,`tanggal`,`jumlah`,`harga`,`nm_barang`,`kd_unit`) values (62,1,'2018-01-18',10,30000,'Kertas A4 80 gr',3),(63,5,'2018-01-18',10,375000,'Monitor',4),(64,4,'2018-01-18',10,35000,'Tinta',3),(65,5,'2018-01-22',10,350000,'Monitor',4);

/*Table structure for table `tr_barang_keluar_importtemp` */

CREATE TABLE `tr_barang_keluar_importtemp` (
  `kd_barang_keluar` int(11) NOT NULL AUTO_INCREMENT,
  `kd_barang` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `nm_barang` varchar(50) DEFAULT NULL,
  `kd_unit` int(11) DEFAULT NULL,
  `kd_pengguna` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_barang_keluar`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

/*Data for the table `tr_barang_keluar_importtemp` */

insert  into `tr_barang_keluar_importtemp`(`kd_barang_keluar`,`kd_barang`,`tanggal`,`jumlah`,`harga`,`nm_barang`,`kd_unit`,`kd_pengguna`) values (58,1,'2018-01-18',10,30000,'Kertas A4 80 gr',3,4),(59,5,'2018-01-18',10,375000,'Monitor',4,4),(60,4,'2018-01-18',10,35000,'Tinta',3,4);

/*Table structure for table `tr_barang_keluar_log` */

CREATE TABLE `tr_barang_keluar_log` (
  `kd_barang_keluar` int(11) NOT NULL AUTO_INCREMENT,
  `kd_barang` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `nm_barang` varchar(50) DEFAULT NULL,
  `kd_unit` int(11) DEFAULT NULL,
  `kd_pengguna` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`kd_barang_keluar`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

/*Data for the table `tr_barang_keluar_log` */

insert  into `tr_barang_keluar_log`(`kd_barang_keluar`,`kd_barang`,`tanggal`,`jumlah`,`harga`,`nm_barang`,`kd_unit`,`kd_pengguna`,`status`) values (46,1,'2018-01-18',10,30000,'Kertas A4 80 gr',3,4,'sukses'),(47,5,'2018-01-18',10,375000,'Monitor',4,4,'sukses'),(48,4,'2018-01-18',10,35000,'Tinta',3,4,'sukses');

/*Table structure for table `tr_barang_masuk` */

CREATE TABLE `tr_barang_masuk` (
  `kd_barang_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `kd_barang` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `nm_barang` varchar(50) DEFAULT NULL,
  `no_faktur` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_barang_masuk`)
) ENGINE=InnoDB AUTO_INCREMENT=199 DEFAULT CHARSET=latin1;

/*Data for the table `tr_barang_masuk` */

insert  into `tr_barang_masuk`(`kd_barang_masuk`,`kd_barang`,`tanggal`,`jumlah`,`harga`,`nm_barang`,`no_faktur`) values (194,5,'2018-01-18',100,350000,'Monitor','1114'),(195,4,'2018-01-18',100,35000,'Tinta','1114'),(197,1,'2018-01-22',100,35000,'Kertas A4 80 gr','1115'),(198,1,'2018-01-22',10,40000,'Kertas A4 80 gr','1111');

/*Table structure for table `tr_barang_masuk_importtemp` */

CREATE TABLE `tr_barang_masuk_importtemp` (
  `kd_barang_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `kd_barang` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `nm_barang` varchar(50) DEFAULT NULL,
  `kd_pengguna` int(11) DEFAULT NULL,
  `no_faktur` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_barang_masuk`)
) ENGINE=InnoDB AUTO_INCREMENT=396 DEFAULT CHARSET=latin1;

/*Data for the table `tr_barang_masuk_importtemp` */

insert  into `tr_barang_masuk_importtemp`(`kd_barang_masuk`,`kd_barang`,`tanggal`,`jumlah`,`harga`,`nm_barang`,`kd_pengguna`,`no_faktur`) values (393,1,'2018-01-18',10,40000,'Kertas A4 80 gr',4,'1114'),(394,5,'2018-01-18',100,350000,'Monitor',4,'1114'),(395,4,'2018-01-18',100,35000,'Tinta',4,'1114');

/*Table structure for table `tr_barang_masuk_log` */

CREATE TABLE `tr_barang_masuk_log` (
  `kd_barang_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `kd_barang` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `nm_barang` varchar(50) DEFAULT NULL,
  `kd_pengguna` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `no_faktur` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_barang_masuk`)
) ENGINE=InnoDB AUTO_INCREMENT=309 DEFAULT CHARSET=latin1;

/*Data for the table `tr_barang_masuk_log` */

insert  into `tr_barang_masuk_log`(`kd_barang_masuk`,`kd_barang`,`tanggal`,`jumlah`,`harga`,`nm_barang`,`kd_pengguna`,`status`,`no_faktur`) values (306,1,'2018-01-18',10,40000,'Kertas A4 80 gr',4,'sukses','1114'),(307,5,'2018-01-18',100,350000,'Monitor',4,'gagal','1114'),(308,4,'2018-01-18',100,35000,'Tinta',4,'gagal','1114');

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
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

/*Data for the table `tr_dukb` */

insert  into `tr_dukb`(`id_dukb`,`kd_grader`,`kode_supplier`,`plat_nomor`,`jenis_kayu`,`kabupaten`,`kecamatan`,`kd_pengguna`,`tanggal`,`asal_kayu`,`kd_siklus`,`status`,`tgl_validasi`) values (70,'2','1','AG 6628 BR','Sengon','Blitar','Bakung',7,'2018-01-12','Slawe','MT-160','Tervalidasi','2018-01-17'),(71,'2','1','AG 6628 BR','Sengon','Blitar','Wonotirto',7,'2018-01-12','Slawe','MT-162','Tervalidasi','2018-01-17'),(72,'2','1','AG 6628 BR','Mahoni','Kediri','Wates',7,'2018-01-12','Slawe','MT-163','Tervalidasi','2018-01-15'),(73,'2','1','AG 6628 BR','Sengon','Trenggalek','Watulimo',7,'2018-01-12','Slawe','MT-161','Tervalidasi','2018-01-15'),(74,'2','3','AG 6628 BR','Sengon','Kediri','Ngancar',7,'2018-01-12','Slawe','MT-165','Tervalidasi','2018-01-17'),(75,'2','3','AG 6628 BR','Mahoni','Trenggalek','Watulimo',7,'2018-01-12','Slawe','MT-166','Tervalidasi','2018-01-17'),(76,'2','1','AG 6628 BR','Sengon','Blitar','Bakung',7,'2018-01-15','Slawe','MT-166','Tervalidasi','2018-01-17'),(77,'2','1','AG 6628 BR','Sengon','Blitar','Bakung',9,'2018-01-17','Slawe','MT-169','Tervalidasi','2018-01-15'),(78,'2','1','AG 6628 BR','Sengon','Kediri','Wates',7,'2018-01-17','Slawe','MT-159','Tervalidasi','2018-01-15'),(80,'2','1','AG 6628 BR','Mahoni','Blitar','Wonotirto',7,'2018-01-17','Slawe','MT-160','Tervalidasi','2018-01-17'),(81,'2','1','AG 6628 BR','Mahoni','Blitar','Bakung',7,'2018-01-17','Slawe','MT-163','Tervalidasi','2018-01-17'),(82,'2','1','AG 6628 BR','Sengon','Blitar','Bakung',7,'2018-01-18','Slawe','MT-160','Tervalidasi','2018-01-17'),(83,'2','1','AG 6628 BR','Sengon','Blitar','Bakung',7,'2018-01-18','Slawe','MT-160','Tervalidasi','2018-01-17'),(84,'2','4','AG 6628 BR','Mahoni','Blitar','Wonotirto',7,'2018-01-17','Slawe','MT-170','Tervalidasi','2018-01-17'),(85,'2','4','AG 6628 BR','Sengon','Blitar','Wonotirto',7,'2018-01-17','Slawe','MT-171','Tervalidasi','2018-01-17'),(86,'2','4','AG 6628 BR','Sengon','Kediri','Plosoklaten',7,'2018-01-17','Slawe','MT-172','Tervalidasi','2018-01-17'),(87,'2','4','AG 6628 BR','Sengon','Trenggalek','Watulimo',7,'2018-01-17','Slawe','MT-173','Tervalidasi','2018-01-17'),(88,'2','3','AG 6628 BR','Sengon','Kediri','Ngancar',7,'2018-01-17','Slawe','MT-174','Tervalidasi','2018-01-17'),(89,'2','3','AG 6628 BR','Sengon','Trenggalek','Watulimo',7,'2018-01-17','Slawe','MT-175','Tervalidasi','2018-01-17'),(90,'2','4','AG 6628 BR','Sengon','Blitar','Bakung',7,'2018-01-17','Slawe','MT-175','Tervalidasi','2018-01-17'),(91,'2','4','AG 6628 BR','Sengon','Blitar','Bakung',7,'2018-01-16','Slawe','MT-176','Tervalidasi','2018-01-17'),(92,'2','3','AG 6628 BR','Sengon','Blitar','Bakung',7,'2018-01-17','Slawe','MT-176','Tervalidasi','2018-01-17'),(93,'2','5','AG 9901 SS','Sengon','Kediri','Ngancar',7,'2018-01-17','slawe','MT-177','Tervalidasi','2018-01-17'),(94,'2','5','AG 9871 CX','Sengon','Kediri','Pagu',7,'2018-01-17','slawe','MT-178','Tervalidasi','2018-01-17'),(95,'2','5','AG 8876 BV','Sengon','Kediri','Wates',7,'2018-01-17','Slawe','MT-179','Tervalidasi','2018-01-17'),(96,'2','5','AG 7758  G','Sengon','Trenggalek','Watulimo',7,'2018-01-17','Slawe','MT-180','Tervalidasi','2018-01-17'),(97,'2','1','AG 9989 JI','Sengon','Trenggalek','Durenan',7,'2018-01-17','Slawe','MT-181','Tervalidasi','2018-01-17'),(98,'2','6','AG 9989 JI','Sengon','Blitar','Bakung',7,'2018-01-17','Slawe','MT-182','Tervalidasi','2018-01-17'),(99,'2','7','AG 9989 JI','Sengon','Blitar','Bakung',7,'2018-01-17','Slawe','MT-181','Tervalidasi','2018-01-17'),(100,'2','8','AG 9989 JI','Sengon','Blitar','Bakung',7,'2018-01-17','Slawe','MT-183','Tervalidasi','2018-01-17');

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
) ENGINE=InnoDB AUTO_INCREMENT=683 DEFAULT CHARSET=latin1;

/*Data for the table `tr_dukb_detail` */

insert  into `tr_dukb_detail`(`id_dukb_detail`,`diameter`,`panjang_kayu`,`batang`,`volume`,`tr_dukb_id`,`kd_bawah`,`kd_atas`,`kd_pengguna`,`harga`) values (1,10,100,1,0.0078,76,10,15,7,5928),(2,15,130,1,0.023,77,15,19,9,17710),(3,16,130,1,0.0261,77,15,19,9,20097),(4,10,100,1,0.0078,78,10,15,7,7098),(5,11,100,1,0.0095,78,10,15,7,8645),(497,10,100,1,0.0078,70,10,15,7,5928),(498,11,100,1,0.0095,70,10,15,7,7220),(499,12,100,1,0.0113,70,10,15,7,8588),(500,13,100,1,0.0133,70,10,15,7,10108),(501,14,100,1,0.0154,70,10,15,7,11704),(502,16,100,1,0.0201,70,16,20,7,18693),(503,17,100,1,0.0227,70,16,20,7,21111),(504,18,100,1,0.0254,70,16,20,7,23622),(505,20,100,1,0.0314,70,16,20,7,29202),(506,15,130,1,0.023,70,15,19,7,17710),(507,16,130,1,0.0261,70,15,19,7,20097),(508,17,130,1,0.0295,70,15,19,7,22715),(509,18,130,1,0.0331,70,15,19,7,25487),(510,19,130,1,0.0368,70,15,19,7,28336),(511,20,130,1,0.0408,70,20,24,7,37536),(512,21,130,1,0.045,70,20,24,7,41400),(513,22,130,1,0.0494,70,20,24,7,45448),(514,23,130,1,0.054,70,20,24,7,49680),(515,24,130,11,0.6466,70,20,24,7,594872),(516,25,130,1,0.0638,70,25,29,7,59972),(517,26,130,1,0.069,70,25,29,7,64860),(518,27,130,1,0.0744,70,25,29,7,69936),(519,28,130,1,0.08,70,25,29,7,75200),(520,29,130,1,0.0858,70,25,29,7,80652),(521,23,260,1,0.108,70,23,24,7,112320),(522,24,260,1,0.1176,70,23,24,7,122304),(523,25,260,1,0.1276,70,25,29,7,150568),(524,26,260,1,0.138,70,25,29,7,162840),(525,27,260,1,0.1488,70,25,29,7,175584),(526,28,260,1,0.16,70,25,29,7,188800),(527,29,260,1,0.1716,70,25,29,7,202488),(528,15,130,1,0.023,71,15,19,7,17480),(529,16,130,1,0.0261,71,15,19,7,19836),(530,17,130,1,0.0295,71,15,19,7,22420),(531,18,130,1,0.0331,71,15,19,7,25156),(532,19,130,1,0.0368,71,15,19,7,27968),(533,10,100,1,0.0078,72,10,15,7,7098),(534,11,100,1,0.0095,72,10,15,7,8645),(535,12,100,1,0.0113,72,10,15,7,10283),(536,13,100,1,0.0133,72,10,15,7,12103),(537,14,100,1,0.0154,72,10,15,7,14014),(538,15,130,1,0.023,73,15,19,7,17480),(539,16,130,2,0.0522,73,15,19,7,39672),(540,17,130,4,0.118,73,15,19,7,89680),(541,18,130,6,0.1984,73,15,19,7,150784),(542,19,130,7,0.2579,73,15,19,7,196004),(543,20,130,5,0.2041,73,20,24,7,185731),(544,21,130,4,0.18,73,20,24,7,163800),(545,22,130,4,0.1976,73,20,24,7,179816),(546,23,130,3,0.162,73,20,24,7,147420),(547,24,130,1,0.0588,73,20,24,7,53508),(548,25,130,3,0.1913,73,25,29,7,177909),(549,26,130,2,0.138,73,25,29,7,128340),(550,27,130,1,0.0744,73,25,29,7,69192),(551,24,260,1,0.1176,73,23,24,7,119952),(552,25,260,1,0.1276,73,25,29,7,148016),(553,26,260,1,0.138,73,25,29,7,160080),(554,28,260,3,0.48,73,25,29,7,556800),(555,25,260,1,0.1276,74,25,29,7,116116),(556,26,260,1,0.138,74,25,29,7,125580),(557,27,260,1,0.1488,74,25,29,7,135408),(558,28,260,1,0.16,74,25,29,7,145600),(559,29,260,1,0.1716,74,25,29,7,156156),(560,15,130,1,0.023,75,15,19,7,20930),(561,16,130,1,0.0261,75,15,19,7,23751),(562,17,130,1,0.0295,75,15,19,7,26845),(563,18,130,1,0.0331,75,15,19,7,30121),(564,19,130,2,0.0737,75,15,19,7,67067),(565,25,260,1,0.1276,75,25,29,7,116116),(566,26,260,2,0.2759,75,25,29,7,251069),(567,27,260,3,0.4464,75,25,29,7,406224),(568,28,260,1,0.16,75,25,29,7,145600),(569,29,260,4,0.6866,75,25,29,7,624806),(570,15,130,1,0.023,80,15,19,7,17480),(571,16,130,1,0.0261,80,15,19,7,19836),(572,15,130,1,0.023,81,15,19,7,17710),(573,16,130,1,0.0261,81,15,19,7,20097),(574,10,100,1,0.0078,81,10,15,7,5928),(575,11,100,1,0.0095,81,10,15,7,7220),(576,23,260,1,0.108,81,23,24,7,112320),(577,24,260,1,0.1176,81,23,24,7,122304),(578,10,100,1,0.0078,82,10,15,7,5928),(579,11,100,1,0.0095,82,10,15,7,7220),(580,10,100,1,0.0078,82,10,15,7,5928),(581,11,100,1,0.0095,82,10,15,7,7220),(582,10,100,1,0.0078,82,10,15,7,5928),(583,11,100,1,0.0095,82,10,15,7,7220),(584,10,100,1,0.0078,82,10,15,7,5928),(585,10,100,1,0.0078,83,10,15,7,5928),(586,20,130,1,0.0408,84,20,24,7,31824),(587,21,130,1,0.045,84,20,24,7,35100),(588,22,130,1,0.0494,84,20,24,7,38532),(589,23,130,2,0.108,84,20,24,7,84240),(590,20,130,1,0.0408,85,20,24,7,31824),(591,21,130,1,0.045,85,20,24,7,35100),(592,22,130,1,0.0494,85,20,24,7,38532),(593,23,130,1,0.054,85,20,24,7,42120),(594,24,130,1,0.0588,85,20,24,7,45864),(595,16,100,1,0.0201,86,16,20,7,15276),(596,17,100,1,0.0227,86,16,20,7,17252),(597,18,100,1,0.0254,86,16,20,7,19304),(598,20,100,1,0.0314,86,16,20,7,23864),(599,15,130,1,0.023,86,15,19,7,16100),(600,16,130,1,0.0261,86,15,19,7,18270),(601,17,130,1,0.0295,86,15,19,7,20650),(602,18,130,1,0.0331,86,15,19,7,23170),(603,19,130,1,0.0368,86,15,19,7,25760),(604,25,260,1,0.1276,86,25,29,7,116116),(605,26,260,1,0.138,86,25,29,7,125580),(606,27,260,1,0.1488,86,25,29,7,135408),(607,28,260,1,0.16,86,25,29,7,145600),(608,29,260,1,0.1716,86,25,29,7,156156),(609,15,130,1,0.023,87,15,19,7,17480),(610,16,130,1,0.0261,87,15,19,7,19836),(611,17,130,1,0.0295,87,15,19,7,22420),(612,25,260,1,0.1276,88,25,29,7,116116),(613,26,260,1,0.138,88,25,29,7,125580),(614,27,260,1,0.1488,88,25,29,7,135408),(615,28,260,1,0.16,88,25,29,7,145600),(616,29,260,1,0.1716,88,25,29,7,156156),(617,15,130,1,0.023,89,15,19,7,20930),(618,16,130,1,0.0261,89,15,19,7,23751),(619,17,130,1,0.0295,89,15,19,7,26845),(620,18,130,1,0.0331,89,15,19,7,30121),(621,19,130,1,0.0368,89,15,19,7,33488),(622,25,260,1,0.1276,89,25,29,7,116116),(623,26,260,1,0.138,89,25,29,7,125580),(624,27,260,1,0.1488,89,25,29,7,135408),(625,28,260,1,0.16,89,25,29,7,145600),(626,29,260,1,0.1716,89,25,29,7,156156),(627,10,100,1,0.0078,90,10,15,7,5382),(628,11,100,1,0.0095,90,10,15,7,6555),(629,12,100,1,0.0113,90,10,15,7,7797),(630,13,100,1,0.0133,90,10,15,7,9177),(631,15,130,1,0.023,90,15,19,7,16100),(632,16,130,1,0.0261,90,15,19,7,18270),(633,17,130,1,0.0295,90,15,19,7,20650),(634,18,130,1,0.0331,90,15,19,7,23170),(635,19,130,1,0.0368,90,15,19,7,25760),(636,10,100,1,0.0078,91,10,15,7,5382),(637,11,100,1,0.0095,91,10,15,7,6555),(638,12,100,1,0.0113,91,10,15,7,7797),(639,15,130,2,0.0459,92,15,19,7,28917),(640,16,130,3,0.0784,92,15,19,7,49392),(641,17,130,4,0.118,92,15,19,7,74340),(642,18,130,1,0.0331,92,15,19,7,20853),(643,19,130,1,0.0368,92,15,19,7,23184),(644,19,100,1,0.0283,93,16,15,7,19527),(645,15,130,1,0.023,93,15,19,7,16560),(646,16,130,1,0.0261,93,15,19,7,18792),(647,17,130,1,0.0295,93,15,19,7,21240),(648,16,100,1,0.0201,94,16,20,7,14874),(649,17,100,1,0.0227,94,16,20,7,16798),(650,18,100,1,0.0254,94,16,20,7,18796),(651,20,100,1,0.0314,94,16,20,7,23236),(652,15,130,11,0.2526,95,15,19,7,179346),(653,16,130,11,0.2874,95,15,19,7,204054),(654,17,130,1,0.0295,95,15,19,7,20945),(655,18,130,1,0.0331,95,15,19,7,23501),(656,19,130,1,0.0368,95,15,19,7,26128),(657,25,260,11,1.4032,95,25,29,7,1276912),(658,26,260,1,0.138,95,25,29,7,125580),(659,27,260,1,0.1488,95,25,29,7,135408),(660,28,260,1,0.16,95,25,29,7,145600),(661,29,260,1,0.1716,95,25,29,7,156156),(662,15,130,1,0.023,96,15,19,7,16100),(663,16,130,1,0.0261,96,15,19,7,18270),(664,25,260,1,0.1276,96,25,29,7,114840),(665,26,260,1,0.138,96,25,29,7,124200),(666,27,260,1,0.1488,96,25,29,7,133920),(667,28,260,1,0.16,96,25,29,7,144000),(668,15,130,1,0.023,97,15,19,7,17480),(669,16,130,1,0.0261,97,15,19,7,19836),(670,15,130,1,0.023,98,15,19,7,16560),(671,16,130,1,0.0261,98,15,19,7,18792),(672,23,260,1,0.108,98,23,24,7,96120),(673,24,260,1,0.1176,98,23,24,7,104664),(674,25,260,2,0.2551,99,25,29,7,237243),(675,26,260,3,0.4139,99,25,29,7,384927),(676,27,260,5,0.7439,99,25,29,7,691827),(677,28,260,6,0.9601,99,25,29,7,892893),(678,29,260,1,0.1716,99,25,29,7,159588),(679,25,130,4,0.2551,100,25,29,7,198978),(680,26,130,6,0.4139,100,25,29,7,322842),(681,27,130,4,0.2976,100,25,29,7,232128),(682,28,130,1,0.08,100,25,29,7,62400);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tr_dukb_detail_temp` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
