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
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

/*Data for the table `man_harga_kayu` */

insert  into `man_harga_kayu`(`kode_harga_kayu`,`kode_supplier`,`panjang_kayu`,`harga`,`kabupaten`,`kecamatan`,`kd_bawah`,`kd_atas`) values (4,'1',130,760000,'Trenggalek','Watulimo',15,19),(5,'1',130,910000,'Trenggalek','Watulimo',20,24),(6,'1',130,930000,'Trenggalek','Watulimo',25,29),(7,'1',260,1020000,'Trenggalek','Watulimo',23,24),(8,'1',260,1160000,'Trenggalek','Watulimo',25,29),(9,'1',260,1040000,'Blitar','Bakung',23,24),(10,'1',260,1180000,'Blitar','Bakung',25,29),(11,'1',130,770000,'Blitar','Bakung',15,19),(12,'1',130,920000,'Blitar','Bakung',20,24),(13,'1',130,940000,'Blitar','Bakung',25,29),(14,'1',130,760000,'Blitar','Wonotirto',15,19),(16,'3',130,800000,'Trenggalek','Watulimo',15,19),(17,'3',260,910000,'Kediri','Ngancar',25,29),(19,'3',260,910000,'Trenggalek','Watulimo',25,29),(20,'1',100,760000,'Blitar','Bakung',10,15),(21,'1',100,930000,'Blitar','Bakung',16,20),(22,'1',100,910000,'Kediri','Wates',10,15),(29,'1',130,760000,'Trenggalek','Durenan',15,19),(30,'1',130,910000,'Trenggalek','Durenan',20,24),(31,'4',130,700000,'Kediri','Plosoklaten',15,19),(32,'4',260,910000,'Kediri','Plosoklaten',25,29),(33,'4',100,760000,'Kediri','Plosoklaten',16,20),(34,'4',130,760000,'Trenggalek','Watulimo',15,19),(35,'4',130,780000,'Blitar','Wonotirto',20,24),(36,'4',130,700000,'Blitar','Bakung',15,19),(37,'4',260,910000,'Blitar','Bakung',25,29),(38,'4',100,690000,'Blitar','Bakung',10,15),(39,'3',130,630000,'Blitar','Bakung',15,19),(40,'5',130,700000,'Trenggalek','Watulimo',15,19),(41,'5',260,900000,'Trenggalek','Watulimo',25,29),(42,'5',130,710000,'Kediri','Wates',15,19),(43,'5',260,910000,'Kediri','Wates',25,29),(44,'5',130,720000,'Kediri','Ngancar',15,19),(45,'5',100,690000,'Kediri','Ngancar',16,15),(46,'5',130,780000,'Kediri','Plosoklaten',25,29),(47,'5',100,740000,'Kediri','Pagu',16,20),(48,'6',130,720000,'Blitar','Bakung',15,19),(49,'6',260,890000,'Blitar','Bakung',23,24),(50,'7',260,930000,'Blitar','Bakung',25,29),(51,'8',130,780000,'Blitar','Bakung',25,29),(52,'6',130,840000,'Blitar','Bakung',20,24),(53,'6',130,900000,'Blitar','Bakung',25,29),(54,'6',260,1000000,'Blitar','Bakung',25,29),(55,'3',130,700000,'Blitar','Bakung',20,24),(56,'3',130,750000,'Blitar','Bakung',25,29),(57,'3',260,800000,'Blitar','Bakung',23,24),(58,'3',260,900000,'Blitar','Bakung',25,29),(59,'3',100,600000,'Blitar','Bakung',10,15),(60,'3',100,650000,'Blitar','Bakung',16,20),(61,'3',260,880000,'Kediri','Ngancar',23,24),(62,'3',130,700000,'Kediri','Ngancar',15,19),(63,'3',130,730000,'Kediri','Ngancar',20,24),(64,'3',130,760000,'Kediri','Ngancar',25,29),(65,'3',130,830000,'Trenggalek','Watulimo',20,24),(66,'3',130,860000,'Trenggalek','Watulimo',25,29),(68,'9',130,760000,'Trenggalek','Durenan',15,19),(69,'9',130,910000,'Trenggalek','Durenan',20,24),(70,'9',130,930000,'Trenggalek','Watulimo',25,29),(71,'9',260,1020000,'Trenggalek','Watulimo',23,24),(72,'9',260,1160000,'Trenggalek','Watulimo',25,29),(73,'9',260,1040000,'Blitar','Bakung',23,24),(74,'9',260,1180000,'Blitar','Bakung',25,29),(75,'9',130,770000,'Blitar','Bakung',15,19),(76,'9',130,920000,'Blitar','Bakung',20,24),(77,'9',130,940000,'Blitar','Bakung',25,29),(78,'9',130,760000,'Blitar','Wonotirto',15,19),(79,'9',130,910000,'Trenggalek','Watulimo',15,19),(80,'9',260,910000,'Kediri','Ngancar',25,29),(81,'9',100,760000,'Blitar','Bakung',10,15),(82,'9',100,930000,'Blitar','Bakung',16,20),(83,'9',100,910000,'Kediri','Wates',10,15);

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
) ENGINE=InnoDB AUTO_INCREMENT=341 DEFAULT CHARSET=latin1;

/*Data for the table `man_harga_kayu_importtemp` */

insert  into `man_harga_kayu_importtemp`(`kode_harga_kayu`,`kode_supplier`,`panjang_kayu`,`harga`,`kabupaten`,`kecamatan`,`kd_bawah`,`kd_atas`,`kd_pengguna`) values (324,'9',130,760000,'Trenggalek','Durenan',15,19,7),(325,'9',130,910000,'Trenggalek','Durenan',20,24,7),(326,'9',130,930000,'Trenggalek','Watulimo',25,29,7),(327,'9',260,1020000,'Trenggalek','Watulimo',23,24,7),(328,'9',260,1160000,'Trenggalek','Watulimo',25,29,7),(329,'9',260,1040000,'Blitar','Bakung',23,24,7),(330,'9',260,1180000,'Blitar','Bakung',25,29,7),(331,'9',130,770000,'Blitar','Bakung',15,19,7),(332,'9',130,920000,'Blitar','Bakung',20,24,7),(333,'9',130,940000,'Blitar','Bakung',25,29,7),(334,'9',130,760000,'Blitar','Wonotirto',15,19,7),(335,'9',130,910000,'Trenggalek','Watulimo',15,19,7),(336,'9',260,910000,'Kediri','Ngancar',25,29,7),(337,'9',260,910000,'Trenggalek','Watulimo',25,29,7),(338,'9',100,760000,'Blitar','Bakung',10,15,7),(339,'9',100,930000,'Blitar','Bakung',16,20,7),(340,'9',100,910000,'Kediri','Wates',10,15,7);

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
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=latin1;

/*Data for the table `man_harga_kayu_log` */

insert  into `man_harga_kayu_log`(`kode_harga_kayu`,`kode_supplier`,`panjang_kayu`,`harga`,`kabupaten`,`kecamatan`,`kd_bawah`,`kd_atas`,`kd_pengguna`,`status`) values (154,'9',130,760000,'Trenggalek','Durenan',15,19,7,'sukses'),(155,'9',130,910000,'Trenggalek','Durenan',20,24,7,'sukses'),(156,'9',130,930000,'Trenggalek','Watulimo',25,29,7,'sukses'),(157,'9',260,1020000,'Trenggalek','Watulimo',23,24,7,'sukses'),(158,'9',260,1160000,'Trenggalek','Watulimo',25,29,7,'sukses'),(159,'9',260,1040000,'Blitar','Bakung',23,24,7,'sukses'),(160,'9',260,1180000,'Blitar','Bakung',25,29,7,'sukses'),(161,'9',130,770000,'Blitar','Bakung',15,19,7,'sukses'),(162,'9',130,920000,'Blitar','Bakung',20,24,7,'sukses'),(163,'9',130,940000,'Blitar','Bakung',25,29,7,'sukses'),(164,'9',130,760000,'Blitar','Wonotirto',15,19,7,'sukses'),(165,'9',130,910000,'Trenggalek','Watulimo',15,19,7,'sukses'),(166,'9',260,910000,'Kediri','Ngancar',25,29,7,'sukses'),(167,'9',260,910000,'Trenggalek','Watulimo',25,29,7,'gagal'),(168,'9',100,760000,'Blitar','Bakung',10,15,7,'sukses'),(169,'9',100,930000,'Blitar','Bakung',16,20,7,'sukses'),(170,'9',100,910000,'Kediri','Wates',10,15,7,'sukses');

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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`kode_menu`,`nama_menu`,`link_menu`,`parent_menu`,`sort_menu`,`icon_menu`,`active`) values (1,'Setting','#',0,100,'fa fa-cogs','1'),(2,'Menu','Setting/Msmenu',1,1,'','1'),(3,'Grup','Setting/Group',1,2,NULL,'1'),(4,'privilege','Setting/Sistem/privilege',1,3,NULL,'1'),(5,'Pengguna','Setting/pengguna',1,4,'fa fa-users','1'),(6,'Referensi','#',0,3,'fa fa-book','1'),(7,'Referensi Supplier','Pembelian/ref_supplier',6,1,'fa fa-barcode','1'),(8,'Referensi Lokasi Kayu','Pembelian/ref_lokasi_kayu',6,2,'fa fa-ban','1'),(9,'Referensi Panjang Kayu','Pembelian/ref_panjang_kayu',6,3,'fa fa-ban','1'),(10,'Transaksi','#',0,1,'fa fa-tasks','1'),(11,'Manajemen Harga Kayu','Pembelian/man_harga_kayu',10,1,'fa fa-ban','1'),(12,'Transaksi DUKB','pembelian/man_dukb',10,2,'fa fa-ban','1'),(13,'Transaksi BAP ','Pembelian/man_bap',10,3,'fa fa-bank','1'),(14,'Referensi Grader','Pembelian/ref_grader',6,4,'fa fa-ban','1'),(15,'Referensi Harga Kayu','Pembelian/man_harga_kayu',6,5,'fa fa-ban','1'),(17,'Validasi DUKB','Pembelian/man_dukb/validasi',10,4,'fa fa-ban','1'),(18,'Laporan','#',0,2,'fa fa-book','1'),(19,'Laporan Pembayaran','Pembelian/lap_pembayaran',18,1,'fa fa-book','1'),(20,'Rekap Pembayaran Harian','Pembelian/rp_harian',18,2,'fa fa-book','1'),(21,'Rekap Pembayaran','pembelian/rp',18,2,'fa fa-book','1'),(22,'Rekap Pembayaran Supplier','pembelian/rp_sup',18,3,'fa fa-book','1'),(23,'Referensi Supplier','gudang/ref_supplier',6,7,'fa fa-book','1'),(24,'DUKB Tervalidasi','Pembelian/man_dukb/dukb_tervalidasi',10,5,'fa fa-book','1'),(25,'Laporan Depo Supplier','Pembelian/lap_depo_sup',18,4,'fa fa-book','1'),(26,'Laporan Berdasarkan Wilayah','Pembelian/lap_wil',18,5,'fa fa-book','1'),(27,'Referensi Barang','gudang/ref_barang',6,8,'fa fa-bank','1'),(28,'Referensi Kategori','Gudang/ref_kategori',6,9,'fa fa-book','1'),(29,'Referensi Harga Barang Stock','gudang/ref_barang/harga_stock',6,10,'fa fa-book','1'),(30,'Transaksi Barang Masuk','gudang/tr_barang_masuk',10,6,'fa fa-book','1'),(31,'Transaksi Barang Keluar','gudang/tr_barang_keluar',10,7,'fa fa-book','1'),(32,'Referensi Unit','gudang/ref_unit',6,7,'fa fa-book','1'),(33,'Laporan  Pengeluaran Barang per Divisi','gudang/laporan/lap_per_divisi',18,7,'fa fa-book','1'),(34,'Laporan Pengeluaran Barang per Kategori ','gudang/laporan/lap_stock_jb',18,8,'fa fa-book','1'),(35,'Laporan Pengeluaran Barang per Bulan','gudang/laporan/lap_per_bulan',18,9,'fa fa-book','1'),(36,'Mutasi Barang','gudang/tr_mutasi_barang',10,11,'fa fa-book','1'),(37,'Stock Barang Gudang','gudang/ref_barang/stock_barang_gudang',18,11,'fa fa-book','1'),(38,'Laporan Gudang','#',0,3,'fa fa-book','1'),(39,'Laporan Pengeluaran Barang Per Divisi','gudang/laporan/lap_per_divisi',38,1,'fa fa-book','1'),(40,'Laporan Pengeluaran Barang Per Kategori','gudang/laporan/lap_stock_jb',38,2,'fa fa-book','1'),(41,'Laporan Pengeluaran Barang Per Bulan','gudang/laporan/lap_per_bulan',38,3,'fa fa-book','1'),(42,'Stock Barang Gudang','gudang/ref_barang/stock_barang_gudang',38,4,'fa fa-book','1'),(43,'Laporan Kayu','#',0,2,'fa fa-book','1'),(44,'Laporan Pembayaran','Pembelian/lap_pembayaran',43,1,'fa fa-book','1'),(45,'Rekap Pembayaran Harian','Pembelian/rp_harian',43,2,'fa fa-book','1'),(46,'Rekap Pembayaran','pembelian/rp',43,3,'fa fa-book','1'),(47,'Laporan Depo Supplier','Pembelian/lap_depo_sup',43,4,'fa fa-bank','1'),(48,'Laporan Berdasarkan Wilayah','Pembelian/lap_wil',43,5,'fa fa-bank','1');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `ref_barang` */

insert  into `ref_barang`(`kd_barang`,`nm_barang`,`satuan`,`kd_kategori`,`stock`,`harga`) values (1,'Kertas A4 80 gr','rim',1,5,40000),(4,'Tinta','Botol',1,102,35000),(5,'Monitor','unit',4,94,350000),(6,'Spidol','pack',1,66,13000),(7,'Keyboard','unit',4,278,50000),(8,'Printer','unit',4,7,400000),(9,'Buku Tulis','pack',1,192,20000),(10,'Pensil','pack',1,94,10000),(11,'Proyektor','unit',4,13,900000),(12,'Lakban','pack',1,58,8000),(13,'Ballpoin','pack',1,82,12000),(14,'CPU','Unit',4,0,0);

/*Table structure for table `ref_grader` */

CREATE TABLE `ref_grader` (
  `kd_grader` int(11) NOT NULL AUTO_INCREMENT,
  `nm_grader` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_grader`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `ref_grader` */

insert  into `ref_grader`(`kd_grader`,`nm_grader`) values (2,'Dian'),(4,'Doni');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `ref_supplier` */

insert  into `ref_supplier`(`kode_supplier`,`nama_supplier`,`email`,`hp`,`kecamatan`,`kabupaten`,`alamat`) values (1,'Kamim Yusuf','yusuf@gmail','085853335400','Sumberpucung','kab malang','malang'),(3,'Anam','Anam@gmail0','0858544455560','Durenan','Trenggalek','Durenan'),(4,'Imam','imam@gmail.com','085853335999','Mojo','Kediri','Mojo'),(5,'Yoga ','yoga@gmail.com','085887650987','Mojoroto','Kediri','Mojoroto'),(6,'Ahmad','Ahmad@gmail.com','089876879876','Banyakan','Kediri','banyakan'),(7,'Eko','eko@gmail.com','087889986628','Semen','Kediri','Semen'),(8,'Wijaya','wijaya@gmail.com','085811789187','Pagu','Kediri','pagu'),(9,'Rahmad Junianto','rahmadjunianto.rj@gmail.com','085853335400','Pagu','Kediri','Pagu');

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

insert  into `ref_supplier_gudang`(`kode_supplier`,`nama_supplier`,`email`,`hp`,`kecamatan`,`kabupaten`,`alamat`) values (2,'Rahmad Junianto','rahmadjunianto.rj@gmail.com','085853335400','Pagu','Kediri','Pagu');

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
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

/*Data for the table `role` */

insert  into `role`(`kode_role`,`kode_group`,`kode_menu`,`status_role`) values (1,1,1,'1'),(3,1,2,'1'),(4,1,3,'1'),(5,1,4,'1'),(6,1,5,'1'),(7,1,6,'0'),(8,1,7,'0'),(9,1,8,'0'),(10,2,1,'0'),(11,2,2,'0'),(12,2,3,'0'),(13,2,4,'0'),(14,2,5,'0'),(15,2,6,'0'),(16,4,1,'0'),(17,4,2,'0'),(18,4,3,'0'),(19,4,4,'0'),(20,4,5,'0'),(21,4,6,'0'),(22,3,1,'0'),(23,3,2,'0'),(24,3,3,'0'),(25,3,4,'0'),(26,3,5,'0'),(27,3,6,'1'),(28,3,7,'0'),(29,5,1,'0'),(30,5,2,'0'),(31,5,3,'0'),(32,5,4,'0'),(33,5,5,'0'),(34,5,6,'1'),(35,5,7,'1'),(36,5,8,'1'),(37,5,9,'1'),(38,5,10,'1'),(39,5,11,'0'),(40,5,12,'1'),(41,5,13,'1'),(42,2,7,'0'),(43,2,8,'0'),(44,2,9,'0'),(45,2,10,'1'),(46,2,11,'0'),(47,2,12,'1'),(48,2,13,'1'),(49,2,14,'0'),(50,5,14,'1'),(51,5,15,'1'),(52,2,15,'0'),(53,2,16,'0'),(54,2,17,'1'),(55,5,17,'0'),(56,5,18,'1'),(57,5,19,'1'),(58,5,20,'1'),(59,5,21,'1'),(60,5,22,'0'),(61,3,8,'0'),(62,3,9,'0'),(63,3,10,'1'),(64,3,11,'0'),(65,3,12,'0'),(66,3,13,'0'),(67,3,14,'0'),(68,3,15,'0'),(69,3,17,'0'),(70,3,18,'1'),(71,3,19,'0'),(72,3,20,'0'),(73,3,21,'0'),(74,3,22,'0'),(75,3,23,'1'),(76,2,18,'0'),(77,2,19,'1'),(78,2,20,'1'),(79,2,21,'1'),(80,2,22,'0'),(81,2,23,'0'),(82,2,24,'1'),(83,5,23,'0'),(84,5,24,'0'),(85,5,25,'1'),(86,5,26,'1'),(87,2,25,'1'),(88,2,26,'1'),(89,3,24,'0'),(90,3,25,'0'),(91,3,26,'0'),(92,3,27,'1'),(93,3,28,'1'),(94,3,29,'1'),(95,3,30,'1'),(96,3,31,'1'),(97,3,32,'1'),(98,3,33,'1'),(99,3,34,'1'),(100,3,35,'1'),(101,3,36,'1'),(102,3,37,'1'),(103,2,27,'0'),(104,2,28,'0'),(105,2,29,'0'),(106,2,30,'0'),(107,2,31,'0'),(108,2,32,'0'),(109,2,33,'0'),(110,2,34,'0'),(111,2,35,'0'),(112,2,36,'0'),(113,2,37,'0'),(114,2,38,'1'),(115,2,39,'1'),(116,2,40,'1'),(117,2,41,'1'),(118,2,42,'1'),(119,2,43,'1'),(120,2,44,'1'),(121,2,45,'1'),(122,2,46,'1'),(123,2,47,'1'),(124,2,48,'1');

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
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

/*Data for the table `tr_barang_keluar` */

insert  into `tr_barang_keluar`(`kd_barang_keluar`,`kd_barang`,`tanggal`,`jumlah`,`harga`,`nm_barang`,`kd_unit`) values (106,5,'2018-01-29',13,375000,'Monitor',4),(107,4,'2018-01-29',14,35000,'Tinta',3),(108,6,'2018-01-29',17,13000,'Spidol',3),(109,7,'2018-01-29',11,50000,'Keyboard',4),(110,8,'2018-01-29',8,400000,'Printer',3),(111,9,'2018-01-29',4,20000,'Buku Tulis',3),(112,10,'2018-01-29',3,10000,'Pensil',4),(113,11,'2018-01-29',6,900000,'Proyektor',3),(114,12,'2018-01-29',1,8000,'Lakban ',4),(115,13,'2018-01-29',9,14000,'Ballpoin',3),(116,1,'2018-01-29',15,30000,'Kertas A4 80 gr',3),(117,5,'2018-01-29',13,375000,'Monitor',4),(118,4,'2018-01-29',14,35000,'Tinta',3),(119,6,'2018-01-29',17,13000,'Spidol',3),(120,7,'2018-01-29',11,50000,'Keyboard',4),(122,9,'2018-01-29',4,20000,'Buku Tulis',3),(123,10,'2018-01-29',3,10000,'Pensil',4),(124,11,'2018-01-29',6,900000,'Proyektor',3),(125,12,'2018-01-29',1,8000,'Lakban ',4),(126,13,'2018-01-29',9,14000,'Ballpoin',3);

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
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

/*Data for the table `tr_barang_keluar_importtemp` */

insert  into `tr_barang_keluar_importtemp`(`kd_barang_keluar`,`kd_barang`,`tanggal`,`jumlah`,`harga`,`nm_barang`,`kd_unit`,`kd_pengguna`) values (94,1,'2018-01-29',15,30000,'Kertas A4 80 gr',3,4),(95,5,'2018-01-29',13,375000,'Monitor',4,4),(96,4,'2018-01-29',14,35000,'Tinta',3,4),(97,6,'2018-01-29',17,13000,'Spidol',3,4),(98,7,'2018-01-29',11,50000,'Keyboard',4,4),(99,8,'2018-01-29',8,400000,'Printer',3,4),(100,9,'2018-01-29',4,20000,'Buku Tulis',3,4),(101,10,'2018-01-29',3,10000,'Pensil',4,4),(102,11,'2018-01-29',6,900000,'Proyektor',3,4),(103,12,'2018-01-29',1,8000,'Lakban ',4,4),(104,13,'2018-01-29',9,14000,'Ballpoin',3,4);

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
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

/*Data for the table `tr_barang_keluar_log` */

insert  into `tr_barang_keluar_log`(`kd_barang_keluar`,`kd_barang`,`tanggal`,`jumlah`,`harga`,`nm_barang`,`kd_unit`,`kd_pengguna`,`status`) values (82,1,'2018-01-29',15,30000,'Kertas A4 80 gr',3,4,'sukses'),(83,5,'2018-01-29',13,375000,'Monitor',4,4,'sukses'),(84,4,'2018-01-29',14,35000,'Tinta',3,4,'sukses'),(85,6,'2018-01-29',17,13000,'Spidol',3,4,'sukses'),(86,7,'2018-01-29',11,50000,'Keyboard',4,4,'sukses'),(87,8,'2018-01-29',8,400000,'Printer',3,4,'sukses'),(88,9,'2018-01-29',4,20000,'Buku Tulis',3,4,'sukses'),(89,10,'2018-01-29',3,10000,'Pensil',4,4,'sukses'),(90,11,'2018-01-29',6,900000,'Proyektor',3,4,'sukses'),(91,12,'2018-01-29',1,8000,'Lakban ',4,4,'sukses'),(92,13,'2018-01-29',9,14000,'Ballpoin',3,4,'sukses');

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
) ENGINE=InnoDB AUTO_INCREMENT=299 DEFAULT CHARSET=latin1;

/*Data for the table `tr_barang_masuk` */

insert  into `tr_barang_masuk`(`kd_barang_masuk`,`kd_barang`,`tanggal`,`jumlah`,`harga`,`nm_barang`,`no_faktur`) values (284,1,'2018-01-29',20,40000,'Kertas A4 80 gr','1118'),(285,5,'2018-01-29',120,350000,'Monitor','1118'),(286,4,'2018-01-29',130,35000,'Tinta','1118'),(287,6,'2018-01-29',100,13000,'Spidol','1118'),(288,7,'2018-01-29',300,50000,'Keyboard','1118'),(289,8,'2018-01-29',15,400000,'Printer','1118'),(290,9,'2018-01-29',200,20000,'Buku Tulis','1118'),(291,10,'2018-01-29',100,10000,'Pensil','1118'),(292,11,'2018-01-29',25,900000,'Proyektor','1118'),(293,12,'2018-01-29',60,8000,'Lakban ','1118'),(298,13,'2018-01-30',100,12000,'Ballpoin','1118');

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
) ENGINE=InnoDB AUTO_INCREMENT=506 DEFAULT CHARSET=latin1;

/*Data for the table `tr_barang_masuk_importtemp` */

insert  into `tr_barang_masuk_importtemp`(`kd_barang_masuk`,`kd_barang`,`tanggal`,`jumlah`,`harga`,`nm_barang`,`kd_pengguna`,`no_faktur`) values (495,1,'2018-01-29',20,40000,'Kertas A4 80 gr',4,'1118'),(496,5,'2018-01-29',120,350000,'Monitor',4,'1118'),(497,4,'2018-01-29',130,35000,'Tinta',4,'1118'),(498,6,'2018-01-29',100,13000,'Spidol',4,'1118'),(499,7,'2018-01-29',300,50000,'Keyboard',4,'1118'),(500,8,'2018-01-29',15,400000,'Printer',4,'1118'),(501,9,'2018-01-29',200,20000,'Buku Tulis',4,'1118'),(502,10,'2018-01-29',100,10000,'Pensil',4,'1118'),(503,11,'2018-01-29',25,900000,'Proyektor',4,'1118'),(504,12,'2018-01-29',60,8000,'Lakban ',4,'1118'),(505,13,'2018-01-29',120,14000,'Ballpoin',4,'1118');

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
) ENGINE=InnoDB AUTO_INCREMENT=419 DEFAULT CHARSET=latin1;

/*Data for the table `tr_barang_masuk_log` */

insert  into `tr_barang_masuk_log`(`kd_barang_masuk`,`kd_barang`,`tanggal`,`jumlah`,`harga`,`nm_barang`,`kd_pengguna`,`status`,`no_faktur`) values (408,1,'2018-01-29',20,40000,'Kertas A4 80 gr',4,'sukses','1118'),(409,5,'2018-01-29',120,350000,'Monitor',4,'sukses','1118'),(410,4,'2018-01-29',130,35000,'Tinta',4,'sukses','1118'),(411,6,'2018-01-29',100,13000,'Spidol',4,'sukses','1118'),(412,7,'2018-01-29',300,50000,'Keyboard',4,'sukses','1118'),(413,8,'2018-01-29',15,400000,'Printer',4,'sukses','1118'),(414,9,'2018-01-29',200,20000,'Buku Tulis',4,'sukses','1118'),(415,10,'2018-01-29',100,10000,'Pensil',4,'sukses','1118'),(416,11,'2018-01-29',25,900000,'Proyektor',4,'sukses','1118'),(417,12,'2018-01-29',60,8000,'Lakban ',4,'sukses','1118'),(418,13,'2018-01-29',120,14000,'Ballpoin',4,'sukses','1118');

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
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=latin1;

/*Data for the table `tr_dukb` */

insert  into `tr_dukb`(`id_dukb`,`kd_grader`,`kode_supplier`,`plat_nomor`,`jenis_kayu`,`kabupaten`,`kecamatan`,`kd_pengguna`,`tanggal`,`asal_kayu`,`kd_siklus`,`status`,`tgl_validasi`) values (70,'2','1','AG 6628 BR','Sengon','Blitar','Bakung',7,'2018-01-12','Slawe','MT-160','Tervalidasi','2018-01-17'),(71,'2','1','AG 6628 BR','Sengon','Blitar','Wonotirto',7,'2018-01-12','Slawe','MT-162','Tervalidasi','2018-01-17'),(72,'2','1','AG 6628 BR','Mahoni','Kediri','Wates',7,'2018-01-12','Slawe','MT-163','Tervalidasi','2018-01-15'),(73,'2','1','AG 6628 BR','Sengon','Trenggalek','Watulimo',7,'2018-01-12','Slawe','MT-161','Tervalidasi','2018-01-15'),(74,'2','3','AG 6628 BR','Sengon','Kediri','Ngancar',7,'2018-01-12','Slawe','MT-165','Tervalidasi','2018-01-17'),(75,'2','3','AG 6628 BR','Mahoni','Trenggalek','Watulimo',7,'2018-01-12','Slawe','MT-166','Tervalidasi','2018-01-17'),(76,'2','1','AG 6628 BR','Sengon','Blitar','Bakung',7,'2018-01-15','Slawe','MT-166','Tervalidasi','2018-01-17'),(77,'2','1','AG 6628 BR','Sengon','Blitar','Bakung',9,'2018-01-17','Slawe','MT-169','Tervalidasi','2018-01-15'),(78,'2','1','AG 6628 BR','Sengon','Kediri','Wates',7,'2018-01-17','Slawe','MT-159','Tervalidasi','2018-01-15'),(80,'2','1','AG 6628 BR','Mahoni','Blitar','Wonotirto',7,'2018-01-17','Slawe','MT-160','Tervalidasi','2018-01-17'),(81,'2','1','AG 6628 BR','Mahoni','Blitar','Bakung',7,'2018-01-17','Slawe','MT-163','Tervalidasi','2018-01-17'),(82,'2','1','AG 6628 BR','Sengon','Blitar','Bakung',7,'2018-01-18','Slawe','MT-160','Tervalidasi','2018-01-17'),(83,'2','1','AG 6628 BR','Sengon','Blitar','Bakung',7,'2018-01-18','Slawe','MT-160','Tervalidasi','2018-01-17'),(84,'2','4','AG 6628 BR','Mahoni','Blitar','Wonotirto',7,'2018-01-17','Slawe','MT-170','Tervalidasi','2018-01-17'),(85,'2','4','AG 6628 BR','Sengon','Blitar','Wonotirto',7,'2018-01-17','Slawe','MT-171','Tervalidasi','2018-01-17'),(86,'2','4','AG 6628 BR','Sengon','Kediri','Plosoklaten',7,'2018-01-17','Slawe','MT-172','Tervalidasi','2018-01-17'),(87,'2','4','AG 6628 BR','Sengon','Trenggalek','Watulimo',7,'2018-01-17','Slawe','MT-173','Tervalidasi','2018-01-17'),(88,'2','3','AG 6628 BR','Sengon','Kediri','Ngancar',7,'2018-01-17','Slawe','MT-174','Tervalidasi','2018-01-17'),(89,'2','3','AG 6628 BR','Sengon','Trenggalek','Watulimo',7,'2018-01-17','Slawe','MT-175','Tervalidasi','2018-01-17'),(90,'2','4','AG 6628 BR','Sengon','Blitar','Bakung',7,'2018-01-17','Slawe','MT-175','Tervalidasi','2018-01-17'),(91,'2','4','AG 6628 BR','Sengon','Blitar','Bakung',7,'2018-01-16','Slawe','MT-176','Tervalidasi','2018-01-17'),(92,'2','3','AG 6628 BR','Sengon','Blitar','Bakung',7,'2018-01-17','Slawe','MT-176','Tervalidasi','2018-01-17'),(93,'2','5','AG 9901 SS','Sengon','Kediri','Ngancar',7,'2018-01-17','slawe','MT-177','Tervalidasi','2018-01-17'),(94,'2','5','AG 9871 CX','Sengon','Kediri','Pagu',7,'2018-01-17','slawe','MT-178','Tervalidasi','2018-01-17'),(95,'2','5','AG 8876 BV','Sengon','Kediri','Wates',7,'2018-01-17','Slawe','MT-179','Tervalidasi','2018-01-17'),(96,'2','5','AG 7758  G','Sengon','Trenggalek','Watulimo',7,'2018-01-17','Slawe','MT-180','Tervalidasi','2018-01-17'),(97,'2','1','AG 9989 JI','Sengon','Trenggalek','Durenan',7,'2018-01-17','Slawe','MT-181','Tervalidasi','2018-01-17'),(98,'2','6','AG 9989 JI','Sengon','Blitar','Bakung',7,'2018-01-17','Slawe','MT-182','Tervalidasi','2018-01-17'),(99,'2','7','AG 9989 JI','Sengon','Blitar','Bakung',7,'2018-01-17','Slawe','MT-181','Tervalidasi','2018-01-17'),(100,'2','8','AG 9989 JI','Sengon','Blitar','Bakung',7,'2018-01-17','Slawe','MT-183','Tervalidasi','2018-01-17'),(101,'2','6','AG 9989 JI','Sengon','Blitar','Bakung',7,'2018-01-24','Slawe','MT-200','Tervalidasi','2018-01-24'),(102,'2','3','AG 9989 JI','Sengon','Blitar','Bakung',7,'2018-01-24','Slawe','MT-2001','Tervalidasi','2018-01-24'),(103,'2','3','AG 9989 JI','Sengon','Kediri','Ngancar',7,'2018-01-24','Slawe','MT-203','Tervalidasi','2018-01-24'),(104,'2','3','AG 9989 JI','Sengon','Trenggalek','Watulimo',7,'2018-01-24','Slawe','MT-204','Tervalidasi','2018-01-24'),(105,'2','7','AG 9989 JI','Sengon','Blitar','Bakung',7,'2018-01-24','Slawe','MT-205','Belum Tervalidasi',NULL),(106,'2','4','AG 9989 JI','Sengon','Blitar','Bakung',7,'2018-01-24','Slawe','MT-206','Tervalidasi','2018-01-24'),(107,'2','4','AG 9989 JI','Sengon','Blitar','Wonotirto',7,'2018-01-24','Slawe','MT-206','Tervalidasi','2018-01-24'),(108,'2','4','AG 9989 JI','Sengon','Kediri','Plosoklaten',7,'2018-01-24','Slawe','MT-207','Tervalidasi','2018-01-24'),(109,'2','4','AG 9989 JI','Sengon','Trenggalek','Watulimo',7,'2018-01-24','','MT-209','Tervalidasi','2018-01-24'),(110,'2','1','AG 9989 JI','Sengon','Blitar','Bakung',7,'2018-01-24','Slawe','MT-208','Tervalidasi','2018-01-24'),(111,'2','1','AG 9989 JI','Sengon','Blitar','Wonotirto',7,'2018-01-24','Slawe','MT-210','Tervalidasi','2018-01-24'),(112,'2','1','AG 9989 JI','Sengon','Kediri','Wates',7,'2018-01-24','Slawe','MT-211','Tervalidasi','2018-01-24'),(113,'2','1','AG 9989 JI','Sengon','Trenggalek','Durenan',7,'2018-01-24','Slawe','MT-212','Tervalidasi','2018-01-24'),(114,'2','1','AG 9989 JI','Sengon','Trenggalek','Watulimo',7,'2018-01-24','Slawe','MT-212','Tervalidasi','2018-01-24'),(115,'2','8','AG 9989 JI','Sengon','Blitar','Bakung',7,'2018-01-24','Slawe','MT-213','Tervalidasi','2018-01-24'),(116,'2','6','AG 9989 JI','Sengon','Blitar','Bakung',7,'2018-01-25','Slawe','MT-100','Tervalidasi','2018-01-25'),(117,'2','3','AG 9989 JI','Sengon','Blitar','Bakung',7,'2018-01-25','Slawe','MT-102','Tervalidasi','2018-01-25'),(118,'2','3','AG 9989 JI','Sengon','Kediri','Ngancar',7,'2018-01-25','Slawe','MT-103','Tervalidasi','2018-01-25'),(119,'2','3','AG 9989 JI','Sengon','Trenggalek','Watulimo',7,'2018-01-25','Slawe','MT-104','Tervalidasi','2018-01-25'),(120,'2','6','AG 9989 JI','Sengon','Blitar','Bakung',7,'2018-01-26','Slawe','MT-181','Belum Tervalidasi',NULL),(121,'2','1','AG 9989 JI','Sengon','Blitar','Bakung',7,'2018-01-29','Slawe','MT-204','Belum Tervalidasi',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=979 DEFAULT CHARSET=latin1;

/*Data for the table `tr_dukb_detail` */

insert  into `tr_dukb_detail`(`id_dukb_detail`,`diameter`,`panjang_kayu`,`batang`,`volume`,`tr_dukb_id`,`kd_bawah`,`kd_atas`,`kd_pengguna`,`harga`) values (1,10,100,1,0.0078,76,10,15,7,5928),(2,15,130,1,0.023,77,15,19,9,17710),(3,16,130,1,0.0261,77,15,19,9,20097),(4,10,100,1,0.0078,78,10,15,7,7098),(5,11,100,1,0.0095,78,10,15,7,8645),(497,10,100,1,0.0078,70,10,15,7,5928),(498,11,100,1,0.0095,70,10,15,7,7220),(499,12,100,1,0.0113,70,10,15,7,8588),(500,13,100,1,0.0133,70,10,15,7,10108),(501,14,100,1,0.0154,70,10,15,7,11704),(502,16,100,1,0.0201,70,16,20,7,18693),(503,17,100,1,0.0227,70,16,20,7,21111),(504,18,100,1,0.0254,70,16,20,7,23622),(505,20,100,1,0.0314,70,16,20,7,29202),(506,15,130,1,0.023,70,15,19,7,17710),(507,16,130,1,0.0261,70,15,19,7,20097),(508,17,130,1,0.0295,70,15,19,7,22715),(509,18,130,1,0.0331,70,15,19,7,25487),(510,19,130,1,0.0368,70,15,19,7,28336),(511,20,130,1,0.0408,70,20,24,7,37536),(512,21,130,1,0.045,70,20,24,7,41400),(513,22,130,1,0.0494,70,20,24,7,45448),(514,23,130,1,0.054,70,20,24,7,49680),(515,24,130,11,0.6466,70,20,24,7,594872),(516,25,130,1,0.0638,70,25,29,7,59972),(517,26,130,1,0.069,70,25,29,7,64860),(518,27,130,1,0.0744,70,25,29,7,69936),(519,28,130,1,0.08,70,25,29,7,75200),(520,29,130,1,0.0858,70,25,29,7,80652),(521,23,260,1,0.108,70,23,24,7,112320),(522,24,260,1,0.1176,70,23,24,7,122304),(523,25,260,1,0.1276,70,25,29,7,150568),(524,26,260,1,0.138,70,25,29,7,162840),(525,27,260,1,0.1488,70,25,29,7,175584),(526,28,260,1,0.16,70,25,29,7,188800),(527,29,260,1,0.1716,70,25,29,7,202488),(528,15,130,1,0.023,71,15,19,7,17480),(529,16,130,1,0.0261,71,15,19,7,19836),(530,17,130,1,0.0295,71,15,19,7,22420),(531,18,130,1,0.0331,71,15,19,7,25156),(532,19,130,1,0.0368,71,15,19,7,27968),(533,10,100,1,0.0078,72,10,15,7,7098),(534,11,100,1,0.0095,72,10,15,7,8645),(535,12,100,1,0.0113,72,10,15,7,10283),(536,13,100,1,0.0133,72,10,15,7,12103),(537,14,100,1,0.0154,72,10,15,7,14014),(538,15,130,1,0.023,73,15,19,7,17480),(539,16,130,2,0.0522,73,15,19,7,39672),(540,17,130,4,0.118,73,15,19,7,89680),(541,18,130,6,0.1984,73,15,19,7,150784),(542,19,130,7,0.2579,73,15,19,7,196004),(543,20,130,5,0.2041,73,20,24,7,185731),(544,21,130,4,0.18,73,20,24,7,163800),(545,22,130,4,0.1976,73,20,24,7,179816),(546,23,130,3,0.162,73,20,24,7,147420),(547,24,130,1,0.0588,73,20,24,7,53508),(548,25,130,3,0.1913,73,25,29,7,177909),(549,26,130,2,0.138,73,25,29,7,128340),(550,27,130,1,0.0744,73,25,29,7,69192),(551,24,260,1,0.1176,73,23,24,7,119952),(552,25,260,1,0.1276,73,25,29,7,148016),(553,26,260,1,0.138,73,25,29,7,160080),(554,28,260,3,0.48,73,25,29,7,556800),(555,25,260,1,0.1276,74,25,29,7,116116),(556,26,260,1,0.138,74,25,29,7,125580),(557,27,260,1,0.1488,74,25,29,7,135408),(558,28,260,1,0.16,74,25,29,7,145600),(559,29,260,1,0.1716,74,25,29,7,156156),(560,15,130,1,0.023,75,15,19,7,20930),(561,16,130,1,0.0261,75,15,19,7,23751),(562,17,130,1,0.0295,75,15,19,7,26845),(563,18,130,1,0.0331,75,15,19,7,30121),(564,19,130,2,0.0737,75,15,19,7,67067),(565,25,260,1,0.1276,75,25,29,7,116116),(566,26,260,2,0.2759,75,25,29,7,251069),(567,27,260,3,0.4464,75,25,29,7,406224),(568,28,260,1,0.16,75,25,29,7,145600),(569,29,260,4,0.6866,75,25,29,7,624806),(570,15,130,1,0.023,80,15,19,7,17480),(571,16,130,1,0.0261,80,15,19,7,19836),(572,15,130,1,0.023,81,15,19,7,17710),(573,16,130,1,0.0261,81,15,19,7,20097),(574,10,100,1,0.0078,81,10,15,7,5928),(575,11,100,1,0.0095,81,10,15,7,7220),(576,23,260,1,0.108,81,23,24,7,112320),(577,24,260,1,0.1176,81,23,24,7,122304),(578,10,100,1,0.0078,82,10,15,7,5928),(579,11,100,1,0.0095,82,10,15,7,7220),(580,10,100,1,0.0078,82,10,15,7,5928),(581,11,100,1,0.0095,82,10,15,7,7220),(582,10,100,1,0.0078,82,10,15,7,5928),(583,11,100,1,0.0095,82,10,15,7,7220),(584,10,100,1,0.0078,82,10,15,7,5928),(585,10,100,1,0.0078,83,10,15,7,5928),(586,20,130,1,0.0408,84,20,24,7,31824),(587,21,130,1,0.045,84,20,24,7,35100),(588,22,130,1,0.0494,84,20,24,7,38532),(589,23,130,2,0.108,84,20,24,7,84240),(590,20,130,1,0.0408,85,20,24,7,31824),(591,21,130,1,0.045,85,20,24,7,35100),(592,22,130,1,0.0494,85,20,24,7,38532),(593,23,130,1,0.054,85,20,24,7,42120),(594,24,130,1,0.0588,85,20,24,7,45864),(595,16,100,1,0.0201,86,16,20,7,15276),(596,17,100,1,0.0227,86,16,20,7,17252),(597,18,100,1,0.0254,86,16,20,7,19304),(598,20,100,1,0.0314,86,16,20,7,23864),(599,15,130,1,0.023,86,15,19,7,16100),(600,16,130,1,0.0261,86,15,19,7,18270),(601,17,130,1,0.0295,86,15,19,7,20650),(602,18,130,1,0.0331,86,15,19,7,23170),(603,19,130,1,0.0368,86,15,19,7,25760),(604,25,260,1,0.1276,86,25,29,7,116116),(605,26,260,1,0.138,86,25,29,7,125580),(606,27,260,1,0.1488,86,25,29,7,135408),(607,28,260,1,0.16,86,25,29,7,145600),(608,29,260,1,0.1716,86,25,29,7,156156),(609,15,130,1,0.023,87,15,19,7,17480),(610,16,130,1,0.0261,87,15,19,7,19836),(611,17,130,1,0.0295,87,15,19,7,22420),(612,25,260,1,0.1276,88,25,29,7,116116),(613,26,260,1,0.138,88,25,29,7,125580),(614,27,260,1,0.1488,88,25,29,7,135408),(615,28,260,1,0.16,88,25,29,7,145600),(616,29,260,1,0.1716,88,25,29,7,156156),(617,15,130,1,0.023,89,15,19,7,20930),(618,16,130,1,0.0261,89,15,19,7,23751),(619,17,130,1,0.0295,89,15,19,7,26845),(620,18,130,1,0.0331,89,15,19,7,30121),(621,19,130,1,0.0368,89,15,19,7,33488),(622,25,260,1,0.1276,89,25,29,7,116116),(623,26,260,1,0.138,89,25,29,7,125580),(624,27,260,1,0.1488,89,25,29,7,135408),(625,28,260,1,0.16,89,25,29,7,145600),(626,29,260,1,0.1716,89,25,29,7,156156),(627,10,100,1,0.0078,90,10,15,7,5382),(628,11,100,1,0.0095,90,10,15,7,6555),(629,12,100,1,0.0113,90,10,15,7,7797),(630,13,100,1,0.0133,90,10,15,7,9177),(631,15,130,1,0.023,90,15,19,7,16100),(632,16,130,1,0.0261,90,15,19,7,18270),(633,17,130,1,0.0295,90,15,19,7,20650),(634,18,130,1,0.0331,90,15,19,7,23170),(635,19,130,1,0.0368,90,15,19,7,25760),(636,10,100,1,0.0078,91,10,15,7,5382),(637,11,100,1,0.0095,91,10,15,7,6555),(638,12,100,1,0.0113,91,10,15,7,7797),(639,15,130,2,0.0459,92,15,19,7,28917),(640,16,130,3,0.0784,92,15,19,7,49392),(641,17,130,4,0.118,92,15,19,7,74340),(642,18,130,1,0.0331,92,15,19,7,20853),(643,19,130,1,0.0368,92,15,19,7,23184),(644,19,100,1,0.0283,93,16,15,7,19527),(645,15,130,1,0.023,93,15,19,7,16560),(646,16,130,1,0.0261,93,15,19,7,18792),(647,17,130,1,0.0295,93,15,19,7,21240),(648,16,100,1,0.0201,94,16,20,7,14874),(649,17,100,1,0.0227,94,16,20,7,16798),(650,18,100,1,0.0254,94,16,20,7,18796),(651,20,100,1,0.0314,94,16,20,7,23236),(652,15,130,11,0.2526,95,15,19,7,179346),(653,16,130,11,0.2874,95,15,19,7,204054),(654,17,130,1,0.0295,95,15,19,7,20945),(655,18,130,1,0.0331,95,15,19,7,23501),(656,19,130,1,0.0368,95,15,19,7,26128),(657,25,260,11,1.4032,95,25,29,7,1276912),(658,26,260,1,0.138,95,25,29,7,125580),(659,27,260,1,0.1488,95,25,29,7,135408),(660,28,260,1,0.16,95,25,29,7,145600),(661,29,260,1,0.1716,95,25,29,7,156156),(662,15,130,1,0.023,96,15,19,7,16100),(663,16,130,1,0.0261,96,15,19,7,18270),(664,25,260,1,0.1276,96,25,29,7,114840),(665,26,260,1,0.138,96,25,29,7,124200),(666,27,260,1,0.1488,96,25,29,7,133920),(667,28,260,1,0.16,96,25,29,7,144000),(668,15,130,1,0.023,97,15,19,7,17480),(669,16,130,1,0.0261,97,15,19,7,19836),(670,15,130,1,0.023,98,15,19,7,16560),(671,16,130,1,0.0261,98,15,19,7,18792),(672,23,260,1,0.108,98,23,24,7,96120),(673,24,260,1,0.1176,98,23,24,7,104664),(674,25,260,2,0.2551,99,25,29,7,237243),(675,26,260,3,0.4139,99,25,29,7,384927),(676,27,260,5,0.7439,99,25,29,7,691827),(677,28,260,6,0.9601,99,25,29,7,892893),(678,29,260,1,0.1716,99,25,29,7,159588),(679,25,130,4,0.2551,100,25,29,7,198978),(680,26,130,6,0.4139,100,25,29,7,322842),(681,27,130,4,0.2976,100,25,29,7,232128),(682,28,130,1,0.08,100,25,29,7,62400),(683,15,130,1,0.023,101,15,19,7,16560),(684,16,130,2,0.0522,101,15,19,7,37584),(685,17,130,3,0.0885,101,15,19,7,63720),(686,18,130,1,0.0331,101,15,19,7,23832),(687,19,130,2,0.0737,101,15,19,7,53064),(688,20,130,3,0.1225,101,20,24,7,102900),(689,21,130,4,0.18,101,20,24,7,151200),(690,22,130,3,0.1482,101,20,24,7,124488),(691,23,130,1,0.054,101,20,24,7,45360),(692,25,130,2,0.1276,101,25,29,7,114840),(693,26,130,1,0.069,101,25,29,7,62100),(694,27,130,1,0.0744,101,25,29,7,66960),(695,28,130,2,0.16,101,25,29,7,144000),(696,29,130,1,0.0858,101,25,29,7,77220),(697,23,260,1,0.108,101,23,24,7,96120),(698,24,260,2,0.2351,101,23,24,7,209239),(699,25,260,1,0.1276,101,25,29,7,127600),(700,26,260,1,0.138,101,25,29,7,138000),(701,27,260,3,0.4464,101,25,29,7,446400),(702,28,260,1,0.16,101,25,29,7,160000),(703,15,130,1,0.023,102,15,19,7,14490),(704,16,130,2,0.0522,102,15,19,7,32886),(705,17,130,1,0.0295,102,15,19,7,18585),(706,18,130,2,0.0661,102,15,19,7,41643),(707,19,130,4,0.1474,102,15,19,7,92862),(708,20,130,1,0.0408,102,20,24,7,28560),(709,21,130,3,0.135,102,20,24,7,94500),(710,22,130,2,0.0988,102,20,24,7,69160),(711,23,130,1,0.054,102,20,24,7,37800),(712,24,130,3,0.1763,102,20,24,7,123410),(713,25,130,1,0.0638,102,25,29,7,47850),(714,27,130,1,0.0744,102,25,29,7,55800),(715,28,130,4,0.32,102,25,29,7,240000),(716,29,130,1,0.0858,102,25,29,7,64350),(717,10,100,1,0.0078,102,10,15,7,4680),(718,11,100,3,0.0285,102,10,15,7,17100),(719,12,100,2,0.0226,102,10,15,7,13560),(720,13,100,1,0.0133,102,10,15,7,7980),(721,14,100,3,0.0462,102,10,15,7,27720),(722,16,100,1,0.0201,102,16,20,7,13065),(723,17,100,4,0.0907,102,16,20,7,58955),(724,20,100,1,0.0314,102,16,20,7,20410),(725,23,260,1,0.108,102,23,24,7,86400),(726,24,260,3,0.3527,102,23,24,7,282160),(727,25,260,2,0.2551,102,25,29,7,229590),(728,26,260,1,0.138,102,25,29,7,124200),(729,27,260,1,0.1488,102,25,29,7,133920),(730,28,260,4,0.6401,102,25,29,7,576090),(731,29,260,1,0.1716,102,25,29,7,154440),(732,23,260,1,0.108,103,23,24,7,95040),(733,24,260,2,0.2351,103,23,24,7,206888),(734,25,260,3,0.3827,103,25,29,7,348257),(735,26,260,1,0.138,103,25,29,7,125580),(736,28,260,2,0.32,103,25,29,7,291200),(737,29,260,3,0.5149,103,25,29,7,468559),(738,15,130,1,0.023,103,15,19,7,16100),(739,16,130,2,0.0522,103,15,19,7,36540),(740,17,130,1,0.0295,103,15,19,7,20650),(741,18,130,3,0.0992,103,15,19,7,69440),(742,19,130,2,0.0737,103,15,19,7,51590),(743,20,130,1,0.0408,103,20,24,7,29784),(744,21,130,4,0.18,103,20,24,7,131400),(745,22,130,1,0.0494,103,20,24,7,36062),(746,23,130,2,0.108,103,20,24,7,78840),(747,24,130,1,0.0588,103,20,24,7,42924),(748,26,130,1,0.069,103,25,29,7,52440),(749,27,130,2,0.1488,103,25,29,7,113088),(750,28,130,1,0.08,103,25,29,7,60800),(751,29,130,1,0.0858,103,25,29,7,65208),(752,15,130,1,0.023,104,15,19,7,18400),(753,16,130,2,0.0522,104,15,19,7,41760),(754,17,130,1,0.0295,104,15,19,7,23600),(755,18,130,1,0.0331,104,15,19,7,26480),(756,20,130,1,0.0408,104,20,24,7,33864),(757,21,130,3,0.135,104,20,24,7,112050),(758,22,130,1,0.0494,104,20,24,7,41002),(759,24,130,1,0.0588,104,20,24,7,48804),(760,25,130,4,0.2551,104,25,29,7,219386),(761,26,130,1,0.069,104,25,29,7,59340),(762,28,130,1,0.08,104,25,29,7,68800),(763,25,260,1,0.1276,104,25,29,7,116116),(764,26,260,1,0.138,104,25,29,7,125580),(765,27,260,1,0.1488,104,25,29,7,135408),(766,28,260,1,0.16,104,25,29,7,145600),(767,29,260,1,0.1716,104,25,29,7,156156),(768,25,260,1,0.1276,105,25,29,7,118668),(769,26,260,1,0.138,105,25,29,7,128340),(770,27,260,1,0.1488,105,25,29,7,138384),(771,28,260,1,0.16,105,25,29,7,148800),(772,29,260,1,0.1716,105,25,29,7,159588),(773,10,100,12,0.0942,106,10,15,7,64998),(774,11,100,12,0.114,106,10,15,7,78660),(775,12,100,31,0.3504,106,10,15,7,241776),(776,13,100,41,0.5439,106,10,15,7,375291),(777,14,100,12,0.1846,106,10,15,7,127374),(778,15,130,13,0.2985,106,15,19,7,208950),(779,16,130,12,0.3135,106,15,19,7,219450),(780,17,130,13,0.3834,106,15,19,7,268380),(781,18,130,15,0.496,106,15,19,7,347200),(782,19,130,12,0.4421,106,15,19,7,309470),(783,25,260,31,3.9544,106,25,29,7,3598504),(784,26,260,23,3.1733,106,25,29,7,2887703),(785,27,260,12,1.7855,106,25,29,7,1624805),(786,28,260,34,5.4405,106,25,29,7,4950855),(787,29,260,44,7.5525,106,25,29,7,6872775),(788,20,130,23,0.9389,107,20,24,7,732342),(789,21,130,13,0.5851,107,20,24,7,456378),(790,22,130,31,1.5312,107,20,24,7,1194336),(791,23,130,11,0.5938,107,20,24,7,463164),(792,24,130,22,1.2932,107,20,24,7,1008696),(793,16,100,20,0.4019,108,16,20,7,305444),(794,17,100,34,0.7713,108,16,20,7,586188),(795,18,100,22,0.5595,108,16,20,7,425220),(796,20,100,21,0.6594,108,16,20,7,501144),(797,15,130,23,0.5281,108,15,19,7,369670),(798,16,130,13,0.3396,108,15,19,7,237720),(799,17,130,11,0.3244,108,15,19,7,227080),(800,18,130,18,0.5952,108,15,19,7,416640),(801,19,130,16,0.5894,108,15,19,7,412580),(802,25,260,23,2.9339,108,25,29,7,2669849),(803,26,260,22,3.0354,108,25,29,7,2762214),(804,27,260,11,1.6367,108,25,29,7,1489397),(805,28,260,41,6.5606,108,25,29,7,5970146),(806,29,260,21,3.6046,108,25,29,7,3280186),(807,15,130,12,0.2755,109,15,19,7,209380),(808,16,130,123,3.2134,109,15,19,7,2442184),(809,17,130,12,0.3539,109,15,19,7,268964),(810,18,130,22,0.7274,109,15,19,7,552824),(811,19,130,11,0.4052,109,15,19,7,307952),(812,10,100,12,0.0942,110,10,15,7,71592),(813,11,100,21,0.1995,110,10,15,7,151620),(814,12,100,12,0.1356,110,10,15,7,103056),(815,13,100,21,0.2786,110,10,15,7,211736),(816,14,100,22,0.3385,110,10,15,7,257260),(817,16,100,14,0.2813,110,16,20,7,261609),(818,17,100,18,0.4084,110,16,20,7,379812),(819,18,100,26,0.6613,110,16,20,7,615009),(820,20,100,13,0.4082,110,16,20,7,379626),(821,15,130,23,0.5281,110,15,19,7,406637),(822,16,130,21,0.5486,110,15,19,7,422422),(823,18,130,12,0.3968,110,15,19,7,305536),(824,20,130,21,0.8572,110,20,24,7,788624),(825,22,130,21,1.0372,110,20,24,7,954224),(826,24,130,21,1.2344,110,20,24,7,1135648),(827,26,130,1,0.069,110,25,29,7,64860),(828,27,130,2,0.1488,110,25,29,7,139872),(829,29,130,2,0.1716,110,25,29,7,161304),(830,23,260,12,1.2956,110,23,24,7,1347424),(831,24,260,53,6.2308,110,23,24,7,6480032),(832,25,260,31,3.9544,110,25,29,7,4666192),(833,26,260,32,4.4151,110,25,29,7,5209818),(834,27,260,11,1.6367,110,25,29,7,1931306),(835,28,260,2,0.32,110,25,29,7,377600),(836,29,260,21,3.6046,110,25,29,7,4253428),(837,15,130,4,0.0918,111,15,19,7,69768),(838,16,130,21,0.5486,111,15,19,7,416936),(839,17,130,22,0.6488,111,15,19,7,493088),(840,18,130,11,0.3637,111,15,19,7,276412),(841,19,130,24,0.8842,111,15,19,7,671992),(842,10,100,3,0.0235,112,10,15,7,21385),(843,11,100,24,0.228,112,10,15,7,207480),(844,12,100,45,0.5087,112,10,15,7,462917),(845,13,100,123,1.6318,112,10,15,7,1484938),(846,14,100,21,0.3231,112,10,15,7,294021),(847,15,130,12,0.2755,113,15,19,7,209380),(848,16,130,21,0.5486,113,15,19,7,416936),(849,18,130,12,0.3968,113,15,19,7,301568),(850,20,130,63,2.5717,113,20,24,7,2340247),(851,21,130,32,1.4401,113,20,24,7,1310491),(852,22,130,11,0.5433,113,20,24,7,494403),(853,15,130,31,0.7118,114,15,19,7,540968),(854,16,130,25,0.6531,114,15,19,7,496356),(855,17,130,28,0.8258,114,15,19,7,627608),(856,19,130,12,0.4421,114,15,19,7,335996),(857,20,130,23,0.9389,114,20,24,7,854399),(858,21,130,11,0.495,114,20,24,7,450450),(859,22,130,33,1.6299,114,20,24,7,1483209),(860,23,130,22,1.1877,114,20,24,7,1080807),(861,24,130,1,0.0588,114,20,24,7,53508),(862,26,130,1,0.069,114,25,29,7,64170),(863,28,130,1,0.08,114,25,29,7,74400),(864,23,260,23,2.4833,114,23,24,7,2532966),(865,24,260,14,1.6459,114,23,24,7,1678818),(866,25,260,2,0.2551,114,25,29,7,295916),(867,26,260,24,3.3113,114,25,29,7,3841108),(868,27,260,11,1.6367,114,25,29,7,1898572),(869,29,260,12,2.0598,114,25,29,7,2389368),(870,25,130,22,1.4032,115,25,29,7,1094496),(871,26,130,21,1.4487,115,25,29,7,1129986),(872,27,130,15,1.1159,115,25,29,7,870402),(873,28,130,17,1.3601,115,25,29,7,1060878),(874,15,130,1,0.023,116,15,19,7,16560),(875,16,130,4,0.1045,116,15,19,7,75240),(876,17,130,5,0.1475,116,15,19,7,106200),(877,18,130,2,0.0661,116,15,19,7,47592),(878,19,130,6,0.221,116,15,19,7,159120),(879,20,130,4,0.1633,116,20,24,7,137172),(880,21,130,7,0.315,116,20,24,7,264600),(881,22,130,8,0.3951,116,20,24,7,331884),(882,23,130,1,0.054,116,20,24,7,45360),(883,24,130,3,0.1763,116,20,24,7,148092),(884,25,130,6,0.3827,116,25,29,7,344430),(885,26,130,2,0.138,116,25,29,7,124200),(886,27,130,6,0.4464,116,25,29,7,401760),(887,28,130,2,0.16,116,25,29,7,144000),(888,29,130,4,0.3433,116,25,29,7,308970),(889,23,260,3,0.3239,116,23,24,7,288271),(890,24,260,6,0.7054,116,23,24,7,627806),(891,25,260,1,0.1276,116,25,29,7,127600),(892,26,260,8,1.1038,116,25,29,7,1103800),(893,27,260,3,0.4464,116,25,29,7,446400),(894,28,260,6,0.9601,116,25,29,7,960100),(895,29,260,2,0.3433,116,25,29,7,343300),(896,10,100,4,0.0314,117,10,15,7,18840),(897,11,100,5,0.0475,117,10,15,7,28500),(898,12,100,2,0.0226,117,10,15,7,13560),(899,13,100,6,0.0796,117,10,15,7,47760),(900,14,100,2,0.0308,117,10,15,7,18480),(901,17,100,2,0.0454,117,16,20,7,29510),(902,18,100,8,0.2035,117,16,20,7,132275),(903,20,100,2,0.0628,117,16,20,7,40820),(904,15,130,4,0.0918,117,15,19,7,57834),(905,16,130,7,0.1829,117,15,19,7,115227),(906,17,130,2,0.059,117,15,19,7,37170),(907,18,130,6,0.1984,117,15,19,7,124992),(908,19,130,23,0.8473,117,15,19,7,533799),(909,20,130,8,0.3266,117,20,24,7,228620),(910,21,130,3,0.135,117,20,24,7,94500),(911,22,130,8,0.3951,117,20,24,7,276570),(912,24,130,6,0.3527,117,20,24,7,246890),(913,25,130,3,0.1913,117,25,29,7,143475),(914,26,130,8,0.5519,117,25,29,7,413925),(915,27,130,2,0.1488,117,25,29,7,111600),(916,28,130,7,0.5601,117,25,29,7,420075),(917,29,130,2,0.1716,117,25,29,7,128700),(918,23,260,4,0.4319,117,23,24,7,345520),(919,24,260,2,0.2351,117,23,24,7,188080),(920,25,260,6,0.7654,117,25,29,7,688860),(921,26,260,1,0.138,117,25,29,7,124200),(922,27,260,4,0.5952,117,25,29,7,535680),(923,28,260,2,0.32,117,25,29,7,288000),(924,15,130,5,0.1148,118,15,19,7,80360),(925,16,130,3,0.0784,118,15,19,7,54880),(926,17,130,6,0.177,118,15,19,7,123900),(927,19,130,4,0.1474,118,15,19,7,103180),(928,20,130,2,0.0816,118,20,24,7,59568),(929,21,130,4,0.18,118,20,24,7,131400),(930,22,130,3,0.1482,118,20,24,7,108186),(931,24,130,7,0.4115,118,20,24,7,300395),(932,25,130,3,0.1913,118,25,29,7,145388),(933,26,130,8,0.5519,118,25,29,7,419444),(934,27,130,2,0.1488,118,25,29,7,113088),(935,28,130,6,0.48,118,25,29,7,364800),(936,29,130,2,0.1716,118,25,29,7,130416),(937,24,260,3,0.3527,118,23,24,7,310376),(938,25,260,2,0.2551,118,25,29,7,232141),(939,26,260,6,0.8278,118,25,29,7,753298),(940,27,260,2,0.2976,118,25,29,7,270816),(941,28,260,4,0.6401,118,25,29,7,582491),(942,15,130,4,0.0918,119,15,19,7,73440),(943,16,130,2,0.0522,119,15,19,7,41760),(944,18,130,2,0.0661,119,15,19,7,52880),(945,19,130,5,0.1842,119,15,19,7,147360),(946,20,130,2,0.0816,119,20,24,7,67728),(947,21,130,5,0.225,119,20,24,7,186750),(948,22,130,2,0.0988,119,20,24,7,82004),(949,23,130,6,0.3239,119,20,24,7,268837),(950,24,130,7,0.4115,119,20,24,7,341545),(951,25,130,2,0.1276,119,25,29,7,109736),(952,27,130,8,0.5952,119,25,29,7,511872),(953,28,130,2,0.16,119,25,29,7,137600),(954,25,260,4,0.5102,119,25,29,7,464282),(955,26,260,2,0.2759,119,25,29,7,251069),(956,27,260,2,0.2976,119,25,29,7,270816),(957,28,260,6,0.9601,119,25,29,7,873691),(958,29,260,1,0.1716,119,25,29,7,156156),(959,15,130,1,0.023,120,15,19,7,16560),(960,16,130,14,0.3657,120,15,19,7,263304),(961,17,130,1,0.0295,120,15,19,7,21240),(962,18,130,12,0.3968,120,15,19,7,285696),(963,19,130,2,0.0737,120,15,19,7,53064),(964,20,130,1,0.0408,120,20,24,7,34272),(965,21,130,4,0.18,120,20,24,7,151200),(966,23,130,1,0.054,120,20,24,7,45360),(967,24,130,4,0.2351,120,20,24,7,197484),(968,25,130,4,0.2551,120,25,29,7,229590),(969,26,130,1,0.069,120,25,29,7,62100),(970,27,130,1,0.0744,120,25,29,7,66960),(971,29,130,1,0.0858,120,25,29,7,77220),(972,23,260,1,0.108,121,23,24,7,112320),(973,24,260,2,0.2351,121,23,24,7,244504),(974,25,260,4,0.5102,121,25,29,7,602036),(975,26,260,5,0.6899,121,25,29,7,814082),(976,27,260,1,0.1488,121,25,29,7,175584),(977,28,260,1,0.16,121,25,29,7,188800),(978,29,260,1,0.1716,121,25,29,7,202488);

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

/*Table structure for table `tr_mutasi_barang` */

CREATE TABLE `tr_mutasi_barang` (
  `kd_mutasi` int(11) NOT NULL AUTO_INCREMENT,
  `kd_barang` int(11) DEFAULT NULL,
  `nm_barang` varchar(50) DEFAULT NULL,
  `stok_awal` int(50) DEFAULT NULL,
  `masuk` int(50) DEFAULT NULL,
  `keluar` int(50) DEFAULT NULL,
  `saldo` int(50) DEFAULT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `qty_a` int(10) DEFAULT NULL,
  `qty_m` int(10) DEFAULT NULL,
  `qty_k` int(10) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  PRIMARY KEY (`kd_mutasi`)
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=latin1;

/*Data for the table `tr_mutasi_barang` */

insert  into `tr_mutasi_barang`(`kd_mutasi`,`kd_barang`,`nm_barang`,`stok_awal`,`masuk`,`keluar`,`saldo`,`bulan`,`tahun`,`qty_a`,`qty_m`,`qty_k`,`qty`) values (171,1,'Kertas A4 80 gr',0,800000,0,800000,'01','2018',0,20,0,20),(172,4,'Tinta',0,4550000,0,4550000,'01','2018',0,130,0,130),(173,5,'Monitor',0,42000000,0,42000000,'01','2018',0,120,0,120),(174,6,'Spidol',0,1300000,0,1300000,'01','2018',0,100,0,100),(175,7,'Keyboard',0,15000000,0,15000000,'01','2018',0,300,0,300),(176,8,'Printer',0,6000000,0,6000000,'01','2018',0,15,0,15),(177,9,'Buku Tulis',0,4000000,0,4000000,'01','2018',0,200,0,200),(178,10,'Pensil',0,1000000,0,1000000,'01','2018',0,100,0,100),(179,11,'Proyektor',0,22500000,0,22500000,'01','2018',0,25,0,25),(180,12,'Lakban',0,480000,0,480000,'01','2018',0,60,0,60),(181,13,'Ballpoin',0,1200000,0,1200000,'01','2018',0,100,0,100),(182,14,'CPU',0,0,0,0,'01','2018',0,0,0,0),(183,1,'Kertas A4 80 gr',800000,0,0,800000,'02','2018',20,0,0,20),(184,4,'Tinta',4550000,0,0,4550000,'02','2018',130,0,0,130),(185,5,'Monitor',42000000,0,0,42000000,'02','2018',120,0,0,120),(186,6,'Spidol',1300000,0,0,1300000,'02','2018',100,0,0,100),(187,7,'Keyboard',15000000,0,0,15000000,'02','2018',300,0,0,300),(188,8,'Printer',6000000,0,0,6000000,'02','2018',15,0,0,15),(189,9,'Buku Tulis',4000000,0,0,4000000,'02','2018',200,0,0,200),(190,10,'Pensil',1000000,0,0,1000000,'02','2018',100,0,0,100),(191,11,'Proyektor',22500000,0,0,22500000,'02','2018',25,0,0,25),(192,12,'Lakban',480000,0,0,480000,'02','2018',60,0,0,60),(193,13,'Ballpoin',1200000,0,0,1200000,'02','2018',100,0,0,100),(194,14,'CPU',0,0,0,0,'02','2018',0,0,0,0);

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
