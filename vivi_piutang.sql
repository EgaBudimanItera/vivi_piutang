/*
SQLyog Enterprise - MySQL GUI v7.14 
MySQL - 5.6.25 : Database - vivi_piutang
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`vivi_piutang` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `vivi_piutang`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `brngKode` varchar(10) NOT NULL,
  `brngNama` varchar(40) DEFAULT NULL,
  `brngStunKode` varchar(5) DEFAULT NULL,
  `brngHargaJual` double DEFAULT NULL,
  PRIMARY KEY (`brngKode`),
  KEY `FK_barang` (`brngStunKode`),
  CONSTRAINT `FK_barang` FOREIGN KEY (`brngStunKode`) REFERENCES `satuan` (`stunKode`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

insert  into `barang`(`brngKode`,`brngNama`,`brngStunKode`,`brngHargaJual`) values ('B001','Garam','S002',10000),('B002','Garam','S004',40000),('B003',NULL,NULL,NULL),('B004','Garam Halus','S003',14500);

/*Table structure for table `historipiutang` */

DROP TABLE IF EXISTS `historipiutang`;

CREATE TABLE `historipiutang` (
  `histKode` int(11) NOT NULL AUTO_INCREMENT,
  `histTanggal` date DEFAULT NULL,
  `histPlgnKode` varchar(10) DEFAULT NULL,
  `histKeterangan` text,
  `histDebet` double DEFAULT NULL,
  `histKredit` double DEFAULT NULL,
  `histSaldo` double DEFAULT NULL,
  `histCreatedBy` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`histKode`),
  KEY `FK_historipiutang` (`histPlgnKode`),
  CONSTRAINT `FK_historipiutang` FOREIGN KEY (`histPlgnKode`) REFERENCES `pelanggan` (`plgnKode`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `historipiutang` */

insert  into `historipiutang`(`histKode`,`histTanggal`,`histPlgnKode`,`histKeterangan`,`histDebet`,`histKredit`,`histSaldo`,`histCreatedBy`) values (1,'2018-06-11','P002','Penjualan',4000000,0,4000000,'ega'),(2,'2018-06-11','P003','Penjualan',15000000,0,15000000,'ega'),(3,'2018-06-12','P002','Pembayaran Piutang',0,4000000,0,'Aqila'),(4,'2018-06-14','P004','Penjualan',6220000,0,6220000,'Aryanti'),(5,'2018-06-14','P004','Pembayaran Piutang',0,6220000,0,'Aqila'),(6,'2018-06-29','P002','Hapus Penjualan',0,4000000,-4000000,'ega'),(7,'2018-06-29','P004','Penjualan',43500,0,43500,'Penjualan'),(8,'2018-06-29','P004','Hapus Penjualan',0,43500,0,'Penjualan'),(9,'2018-06-30','P004','Hapus Pembayaran Piutang',6220000,0,6220000,'ADM'),(10,'2018-06-30','P004','Pembayaran Piutang',0,6220000,0,'ADM'),(11,'2018-06-30','P004','Hapus Pembayaran Piutang',6220000,0,6220000,'ADM'),(12,'2018-06-30','P004','Hapus Penjualan',0,6220000,0,'Penjualan'),(13,'2018-07-11','P004','Penjualan',200000,0,200000,'Penjualan'),(14,'2018-07-25','P005','Penjualan',1000000,0,1000000,'penjualan'),(15,'2018-07-26','P006','Penjualan',145000,0,145000,'Penjualan'),(16,'2018-07-26','P007','Penjualan',100000,0,100000,'Penjualan'),(17,'2018-07-26','P004','Pembayaran Piutang',0,200000,0,'ADM'),(18,'2018-07-26','P007','Pembayaran Piutang',0,100000,0,'ADM'),(19,'2018-07-26','P006','Pembayaran Piutang',0,145000,0,'ADM'),(20,'2018-07-26','P008','Penjualan',100000,0,100000,'Penjualan'),(21,'2018-07-01','P009','Penjualan',100000,0,100000,'Penjualan'),(22,'2018-07-03','P009','Pembayaran Piutang',0,100000,0,'ADM'),(23,'2018-07-01','P009','Hapus Penjualan',0,100000,-100000,'Penjualan'),(24,'2018-07-01','P008','Hapus Penjualan',0,100000,0,'Penjualan'),(25,'2018-07-04','P007','Hapus Penjualan',0,100000,-100000,'Penjualan');

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `plgnKode` varchar(10) NOT NULL,
  `plgnNama` varchar(40) DEFAULT NULL,
  `plgnOwner` varchar(40) DEFAULT NULL,
  `plgnAlamat` text,
  `plgnTelp` varchar(12) DEFAULT NULL,
  `plgnPiutang` double DEFAULT '0',
  PRIMARY KEY (`plgnKode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`plgnKode`,`plgnNama`,`plgnOwner`,`plgnAlamat`,`plgnTelp`,`plgnPiutang`) values ('P002','Toko B','Budiman','Road','881918198',-4000000),('P003','Toko C','Budi','ui','345677',15000000),('P004','CV Aqila','Aqila','aa','11111',0),('P005','toko E','ega','aa','111',1000000),('P006','toko F','F','jalan F','89898989',0),('P007','toko G','G','G','666',-100000),('P008','toko H','H','H','77',0),('P009','toko i','i','i','88',-100000);

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `pybrKode` varchar(16) NOT NULL,
  `pybrTanggal` date DEFAULT NULL,
  `pybrPnjlKode` varchar(16) DEFAULT NULL,
  `pybrJumlahBayar` double DEFAULT NULL,
  `pybrCreatedBy` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`pybrKode`),
  KEY `FK_pembayaran` (`pybrPnjlKode`),
  CONSTRAINT `FK_pembayaran` FOREIGN KEY (`pybrPnjlKode`) REFERENCES `penjualan` (`pnjlKode`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`pybrKode`,`pybrTanggal`,`pybrPnjlKode`,`pybrJumlahBayar`,`pybrCreatedBy`) values ('R-0718-00001','2018-07-25','P-0718-00001',200000,'ADM'),('R-0718-00002','2018-07-25',NULL,100000,'ADM'),('R-0718-00003','2018-07-06','P-0718-00003',145000,'ADM');

/*Table structure for table `penjualan` */

DROP TABLE IF EXISTS `penjualan`;

CREATE TABLE `penjualan` (
  `pnjlKode` varchar(16) NOT NULL,
  `pnjlTanggal` date DEFAULT NULL,
  `pnjlPlgnKode` varchar(10) DEFAULT NULL,
  `pnjlJatuhTempo` date DEFAULT NULL,
  `pnjlTotalPenjualan` double DEFAULT NULL,
  `pnjlTotalBayar` double DEFAULT NULL,
  `pnjlCreatedBy` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`pnjlKode`),
  KEY `FK_penjualan` (`pnjlPlgnKode`),
  CONSTRAINT `FK_penjualan` FOREIGN KEY (`pnjlPlgnKode`) REFERENCES `pelanggan` (`plgnKode`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penjualan` */

insert  into `penjualan`(`pnjlKode`,`pnjlTanggal`,`pnjlPlgnKode`,`pnjlJatuhTempo`,`pnjlTotalPenjualan`,`pnjlTotalBayar`,`pnjlCreatedBy`) values ('P-0718-00001','2018-07-11','P004','2018-08-10',200000,0,'Penjualan'),('P-0718-00002','2018-07-25','P005','2018-08-24',1000000,1000000,'penjualan'),('P-0718-00003','2018-07-02','P006','2018-08-24',145000,0,'Penjualan');

/*Table structure for table `penjualan_detail` */

DROP TABLE IF EXISTS `penjualan_detail`;

CREATE TABLE `penjualan_detail` (
  `detpId` int(11) NOT NULL AUTO_INCREMENT,
  `detpPnjlKode` varchar(16) DEFAULT NULL,
  `detpBrngKode` varchar(10) DEFAULT NULL,
  `detpJumlah` int(11) DEFAULT NULL,
  `detpHarga` double DEFAULT NULL,
  PRIMARY KEY (`detpId`),
  KEY `FK_penjualan_detail1` (`detpBrngKode`),
  KEY `FK_penjualan_detail` (`detpPnjlKode`),
  CONSTRAINT `FK_penjualan_detail` FOREIGN KEY (`detpPnjlKode`) REFERENCES `penjualan` (`pnjlKode`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_penjualan_detail1` FOREIGN KEY (`detpBrngKode`) REFERENCES `barang` (`brngKode`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `penjualan_detail` */

insert  into `penjualan_detail`(`detpId`,`detpPnjlKode`,`detpBrngKode`,`detpJumlah`,`detpHarga`) values (1,'P-0718-00001','B001',20,10000),(2,'P-0718-00002','B001',20,10000),(3,'P-0718-00002','B002',20,40000),(4,'P-0718-00003','B004',10,14500),(5,NULL,'B001',10,10000),(6,NULL,'B001',10,10000);

/*Table structure for table `penjualan_detail_temp` */

DROP TABLE IF EXISTS `penjualan_detail_temp`;

CREATE TABLE `penjualan_detail_temp` (
  `detpId` int(11) NOT NULL AUTO_INCREMENT,
  `detpBrngKode` varchar(10) DEFAULT NULL,
  `detpJumlah` int(11) DEFAULT NULL,
  `detpHarga` double DEFAULT NULL,
  `detpCreatedBy` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`detpId`),
  KEY `FK_penjualan_detail_temp` (`detpBrngKode`),
  CONSTRAINT `FK_penjualan_detail_temp` FOREIGN KEY (`detpBrngKode`) REFERENCES `barang` (`brngKode`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `penjualan_detail_temp` */

/*Table structure for table `satuan` */

DROP TABLE IF EXISTS `satuan`;

CREATE TABLE `satuan` (
  `stunKode` varchar(5) NOT NULL,
  `stunNama` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`stunKode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `satuan` */

insert  into `satuan`(`stunKode`,`stunNama`) values ('S002','Pcs'),('S003','Kilos'),('S004','Karung'),('S005','Ton'),('S006','aaa');

/*Table structure for table `userlogin` */

DROP TABLE IF EXISTS `userlogin`;

CREATE TABLE `userlogin` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userNama` varchar(30) DEFAULT NULL,
  `userPassword` varchar(40) DEFAULT NULL,
  `userHakAkses` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `userlogin` */

insert  into `userlogin`(`userId`,`userNama`,`userPassword`,`userHakAkses`) values (1,'Pimpinan','202cb962ac59075b964b07152d234b70','Pimpinan'),(6,'ADM','202cb962ac59075b964b07152d234b70','ADM'),(7,'Penjualan','202cb962ac59075b964b07152d234b70','Penjualan'),(8,'vivi','202cb962ac59075b964b07152d234b70','Pimpinan');

/* Trigger structure for table `pembayaran` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `insert_pembayaran` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `insert_pembayaran` AFTER INSERT ON `pembayaran` FOR EACH ROW BEGIN
	declare kodepelanggan varchar(10);
	declare saldoawalpiutang DOUBLE;
	declare totalbayar double;
	declare sisasaldo double;
	set kodepelanggan=(select pnjlPlgnKode from penjualan where pnjlKode=new.pybrPnjlKode);
	set saldoawalpiutang=(select plgnPiutang from pelanggan where plgnKode=kodepelanggan);
	set totalbayar=(new.pybrJumlahBayar);
	set sisasaldo=(saldoawalpiutang-totalbayar);
	update penjualan set pnjlTotalBayar=sisasaldo where pnjlKode=new.pybrPnjlKode;
	update pelanggan set plgnPiutang=sisasaldo where plgnKode=kodepelanggan;
	insert into historipiutang values('',new.pybrTanggal,kodepelanggan,'Pembayaran Piutang',0,totalbayar,sisasaldo,new.pybrCreatedBy);
    END */$$


DELIMITER ;

/* Trigger structure for table `pembayaran` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_pembayaran` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_pembayaran` AFTER DELETE ON `pembayaran` FOR EACH ROW BEGIN
	declare kodepelanggan varchar(10);
	declare saldoawalpiutang DOUBLE;
	declare totalbayar double;
	declare sisasaldo double;
	set kodepelanggan=(select pnjlPlgnKode from penjualan where pnjlKode=old.pybrPnjlKode);
	set saldoawalpiutang=(select plgnPiutang from pelanggan where plgnKode=kodepelanggan);
	set totalbayar=(old.pybrJumlahBayar);
	set sisasaldo=(saldoawalpiutang+totalbayar);
	update penjualan set pnjlTotalBayar=sisasaldo where pnjlKode=old.pybrPnjlKode;
	update pelanggan set plgnPiutang=sisasaldo where plgnKode=kodepelanggan;
	insert into historipiutang values('',old.pybrTanggal,kodepelanggan,'Hapus Pembayaran Piutang',totalbayar,0,sisasaldo,old.pybrCreatedBy);
    END */$$


DELIMITER ;

/* Trigger structure for table `penjualan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `insert_penjualan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `insert_penjualan` AFTER INSERT ON `penjualan` FOR EACH ROW BEGIN
	declare kodepelanggan varchar(10);
	declare saldoawalpiutang DOUBLE;
	declare totaljual double;
	declare sisasaldo double;
	set kodepelanggan=(new.pnjlPlgnKode);
	set saldoawalpiutang=(select plgnPiutang from pelanggan where plgnKode=kodepelanggan);
	set totaljual=(new.pnjlTotalPenjualan);
	set sisasaldo=(saldoawalpiutang+totaljual);
	
	update pelanggan set plgnPiutang=sisasaldo where plgnKode=kodepelanggan;
	
	insert into historipiutang values('',new.pnjlTanggal,kodepelanggan,'Penjualan',totaljual,0,sisasaldo,new.pnjlCreatedBy);
	
    END */$$


DELIMITER ;

/* Trigger structure for table `penjualan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_penjualan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_penjualan` AFTER DELETE ON `penjualan` FOR EACH ROW BEGIN
	declare kodepelanggan varchar(10);
	declare saldoawalpiutang DOUBLE;
	declare totaljual double;
	declare sisasaldo double;
	set kodepelanggan=(old.pnjlPlgnKode);
	set saldoawalpiutang=(select plgnPiutang from pelanggan where plgnKode=kodepelanggan);
	set totaljual=(old.pnjlTotalPenjualan);
	set sisasaldo=(saldoawalpiutang-totaljual);
	
	update pelanggan set plgnPiutang=sisasaldo where plgnKode=kodepelanggan;
	insert into historipiutang values('',old.pnjlTanggal,kodepelanggan,'Hapus Penjualan',0,totaljual,sisasaldo,old.pnjlCreatedBy);
    END */$$


DELIMITER ;

/*Table structure for table `vw_analisa_umur_piutang1` */

DROP TABLE IF EXISTS `vw_analisa_umur_piutang1`;

/*!50001 DROP VIEW IF EXISTS `vw_analisa_umur_piutang1` */;
/*!50001 DROP TABLE IF EXISTS `vw_analisa_umur_piutang1` */;

/*!50001 CREATE TABLE `vw_analisa_umur_piutang1` (
  `pnjlPlgnKode` varchar(10) DEFAULT NULL,
  `plgnNama` varchar(40) DEFAULT NULL,
  `pnjlKode` varchar(16) NOT NULL,
  `waktutempo` int(8) DEFAULT NULL,
  `blm_jatuh_tempo` double DEFAULT NULL,
  `telat_1_30_hari` double DEFAULT NULL,
  `telat_31_60_hari` double DEFAULT NULL,
  `telat_61_90_hari` double DEFAULT NULL,
  `telat_91_180_hari` double DEFAULT NULL,
  `telat_181_365_hari` double DEFAULT NULL,
  `telat_lebih_366_hari` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `vw_analisa_umur_piutang2` */

DROP TABLE IF EXISTS `vw_analisa_umur_piutang2`;

/*!50001 DROP VIEW IF EXISTS `vw_analisa_umur_piutang2` */;
/*!50001 DROP TABLE IF EXISTS `vw_analisa_umur_piutang2` */;

/*!50001 CREATE TABLE `vw_analisa_umur_piutang2` (
  `nomor` varchar(1) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `kelompok_umur` varchar(22) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `saldo` double DEFAULT NULL,
  `persen` decimal(3,2) NOT NULL DEFAULT '0.00',
  `estimasi` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `vw_detail` */

DROP TABLE IF EXISTS `vw_detail`;

/*!50001 DROP VIEW IF EXISTS `vw_detail` */;
/*!50001 DROP TABLE IF EXISTS `vw_detail` */;

/*!50001 CREATE TABLE `vw_detail` (
  `brngNama` varchar(40) DEFAULT NULL,
  `brngStunKode` varchar(5) DEFAULT NULL,
  `brngHargaJual` double DEFAULT NULL,
  `stunNama` varchar(20) DEFAULT NULL,
  `detpId` int(11) NOT NULL DEFAULT '0',
  `detpPnjlKode` varchar(16) DEFAULT NULL,
  `detpBrngKode` varchar(10) DEFAULT NULL,
  `detpJumlah` int(11) DEFAULT NULL,
  `detpHarga` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `vw_detailtemp` */

DROP TABLE IF EXISTS `vw_detailtemp`;

/*!50001 DROP VIEW IF EXISTS `vw_detailtemp` */;
/*!50001 DROP TABLE IF EXISTS `vw_detailtemp` */;

/*!50001 CREATE TABLE `vw_detailtemp` (
  `detpId` int(11) NOT NULL DEFAULT '0',
  `detpBrngKode` varchar(10) DEFAULT NULL,
  `detpJumlah` int(11) DEFAULT NULL,
  `detpHarga` double DEFAULT NULL,
  `detpCreatedBy` varchar(30) DEFAULT NULL,
  `brngNama` varchar(40) DEFAULT NULL,
  `brngStunKode` varchar(5) DEFAULT NULL,
  `brngHargaJual` double DEFAULT NULL,
  `stunNama` varchar(20) DEFAULT NULL,
  `subtotal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `vw_histori` */

DROP TABLE IF EXISTS `vw_histori`;

/*!50001 DROP VIEW IF EXISTS `vw_histori` */;
/*!50001 DROP TABLE IF EXISTS `vw_histori` */;

/*!50001 CREATE TABLE `vw_histori` (
  `histKode` int(11) NOT NULL DEFAULT '0',
  `histTanggal` date DEFAULT NULL,
  `histPlgnKode` varchar(10) DEFAULT NULL,
  `histKeterangan` text,
  `histDebet` double DEFAULT NULL,
  `histKredit` double DEFAULT NULL,
  `histSaldo` double DEFAULT NULL,
  `histCreatedBy` varchar(30) DEFAULT NULL,
  `plgnNama` varchar(40) DEFAULT NULL,
  `plgnOwner` varchar(40) DEFAULT NULL,
  `plgnAlamat` text,
  `plgnTelp` varchar(12) DEFAULT NULL,
  `plgnPiutang` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `vw_pembayaran` */

DROP TABLE IF EXISTS `vw_pembayaran`;

/*!50001 DROP VIEW IF EXISTS `vw_pembayaran` */;
/*!50001 DROP TABLE IF EXISTS `vw_pembayaran` */;

/*!50001 CREATE TABLE `vw_pembayaran` (
  `pybrKode` varchar(16) NOT NULL,
  `pybrTanggal` date DEFAULT NULL,
  `pybrPnjlKode` varchar(16) DEFAULT NULL,
  `pybrJumlahBayar` double DEFAULT NULL,
  `pybrCreatedBy` varchar(30) DEFAULT NULL,
  `pnjlTanggal` date DEFAULT NULL,
  `pnjlPlgnKode` varchar(10) DEFAULT NULL,
  `pnjlJatuhTempo` date DEFAULT NULL,
  `pnjlTotalPenjualan` double DEFAULT NULL,
  `pnjlTotalBayar` double DEFAULT NULL,
  `pnjlCreatedBy` varchar(30) DEFAULT NULL,
  `plgnNama` varchar(40) DEFAULT NULL,
  `plgnOwner` varchar(40) DEFAULT NULL,
  `plgnAlamat` text,
  `plgnTelp` varchar(12) DEFAULT NULL,
  `plgnPiutang` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `vw_penjualan` */

DROP TABLE IF EXISTS `vw_penjualan`;

/*!50001 DROP VIEW IF EXISTS `vw_penjualan` */;
/*!50001 DROP TABLE IF EXISTS `vw_penjualan` */;

/*!50001 CREATE TABLE `vw_penjualan` (
  `plgnNama` varchar(40) DEFAULT NULL,
  `plgnOwner` varchar(40) DEFAULT NULL,
  `plgnAlamat` text,
  `plgnTelp` varchar(12) DEFAULT NULL,
  `plgnPiutang` double DEFAULT NULL,
  `pnjlKode` varchar(16) NOT NULL,
  `pnjlTanggal` date DEFAULT NULL,
  `pnjlPlgnKode` varchar(10) DEFAULT NULL,
  `pnjlJatuhTempo` date DEFAULT NULL,
  `pnjlTotalPenjualan` double DEFAULT NULL,
  `pnjlTotalBayar` double DEFAULT NULL,
  `pnjlCreatedBy` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `vw_umurpiutang_perpelanggan` */

DROP TABLE IF EXISTS `vw_umurpiutang_perpelanggan`;

/*!50001 DROP VIEW IF EXISTS `vw_umurpiutang_perpelanggan` */;
/*!50001 DROP TABLE IF EXISTS `vw_umurpiutang_perpelanggan` */;

/*!50001 CREATE TABLE `vw_umurpiutang_perpelanggan` (
  `pnjlPlgnKode` varchar(10) DEFAULT NULL,
  `plgnNama` varchar(40) DEFAULT NULL,
  `piutang_blm_jatuh_tempo` double DEFAULT NULL,
  `piutang_jatuh_tempo` double DEFAULT NULL,
  `piutang_telat_1_sd_15_hari` double DEFAULT NULL,
  `piutang_telat_16_sd_30_hari` double DEFAULT NULL,
  `piutang_telat_31_sd_60_hari` double DEFAULT NULL,
  `piutang_telat_lebihdari_60_hari` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*View structure for view vw_analisa_umur_piutang1 */

/*!50001 DROP TABLE IF EXISTS `vw_analisa_umur_piutang1` */;
/*!50001 DROP VIEW IF EXISTS `vw_analisa_umur_piutang1` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_analisa_umur_piutang1` AS select `pa`.`pnjlPlgnKode` AS `pnjlPlgnKode`,`pelanggan`.`plgnNama` AS `plgnNama`,`pa`.`pnjlKode` AS `pnjlKode`,((to_days(`pa`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) AS `waktutempo`,coalesce((select `pb`.`pnjlTotalBayar` from `penjualan` `pb` where ((`pb`.`pnjlTotalBayar` > 0) and (`pb`.`pnjlKode` = `pa`.`pnjlKode`) and (`pb`.`pnjlJatuhTempo` >= now()))),0) AS `blm_jatuh_tempo`,coalesce((select `pc`.`pnjlTotalBayar` from `penjualan` `pc` where ((`pc`.`pnjlTotalBayar` > 0) and (`pc`.`pnjlKode` = `pa`.`pnjlKode`) and (((to_days(`pc`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) >= 1) and (((to_days(`pc`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) <= 30))),0) AS `telat_1_30_hari`,coalesce((select `pd`.`pnjlTotalBayar` from `penjualan` `pd` where ((`pd`.`pnjlTotalBayar` > 0) and (`pd`.`pnjlKode` = `pa`.`pnjlKode`) and (((to_days(`pd`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) >= 31) and (((to_days(`pd`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) <= 60))),0) AS `telat_31_60_hari`,coalesce((select `pe`.`pnjlTotalBayar` from `penjualan` `pe` where ((`pe`.`pnjlTotalBayar` > 0) and (`pe`.`pnjlKode` = `pa`.`pnjlKode`) and (((to_days(`pe`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) >= 61) and (((to_days(`pe`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) <= 90))),0) AS `telat_61_90_hari`,coalesce((select `pf`.`pnjlTotalBayar` from `penjualan` `pf` where ((`pf`.`pnjlTotalBayar` > 0) and (`pf`.`pnjlKode` = `pa`.`pnjlKode`) and (((to_days(`pf`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) >= 91) and (((to_days(`pf`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) <= 180))),0) AS `telat_91_180_hari`,coalesce((select `pg`.`pnjlTotalBayar` from `penjualan` `pg` where ((`pg`.`pnjlTotalBayar` > 0) and (`pg`.`pnjlKode` = `pa`.`pnjlKode`) and (((to_days(`pg`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) >= 181) and (((to_days(`pg`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) <= 365))),0) AS `telat_181_365_hari`,coalesce((select `ph`.`pnjlTotalBayar` from `penjualan` `ph` where ((`ph`.`pnjlTotalBayar` > 0) and (`ph`.`pnjlKode` = `pa`.`pnjlKode`) and (((to_days(`ph`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) >= 366))),0) AS `telat_lebih_366_hari` from (`penjualan` `pa` join `pelanggan` on((`pa`.`pnjlPlgnKode` = `pelanggan`.`plgnKode`))) order by `pa`.`pnjlPlgnKode` */;

/*View structure for view vw_analisa_umur_piutang2 */

/*!50001 DROP TABLE IF EXISTS `vw_analisa_umur_piutang2` */;
/*!50001 DROP VIEW IF EXISTS `vw_analisa_umur_piutang2` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_analisa_umur_piutang2` AS (select '1' AS `nomor`,'Belum Jatuh Tempo' AS `kelompok_umur`,coalesce(sum(`penjualan`.`pnjlTotalBayar`),0) AS `saldo`,0.02 AS `persen`,coalesce((sum(`penjualan`.`pnjlTotalBayar`) * 0.02),0) AS `estimasi` from `penjualan` where ((`penjualan`.`pnjlTotalBayar` > 0) and (`penjualan`.`pnjlJatuhTempo` >= now()))) union (select '2' AS `nomor`,'Menunggak 1-30 Hari' AS `kelompok_umur`,coalesce(sum(`penjualan`.`pnjlTotalBayar`),0) AS `saldo`,0.05 AS `persen`,coalesce((sum(`penjualan`.`pnjlTotalBayar`) * 0.05),0) AS `estimasi` from `penjualan` where ((`penjualan`.`pnjlTotalBayar` > 0) and (((to_days(`penjualan`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) >= 1) and (((to_days(`penjualan`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) <= 30))) union (select '3' AS `nomor`,'Menunggak 31-60 Hari' AS `kelompok_umur`,coalesce(sum(`penjualan`.`pnjlTotalBayar`),0) AS `saldo`,0.1 AS `persen`,coalesce((sum(`penjualan`.`pnjlTotalBayar`) * 0.1),0) AS `estimasi` from `penjualan` where ((`penjualan`.`pnjlTotalBayar` > 0) and (((to_days(`penjualan`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) >= 31) and (((to_days(`penjualan`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) <= 60))) union (select '4' AS `nomor`,'Menunggak 61-90 Hari' AS `kelompok_umur`,coalesce(sum(`penjualan`.`pnjlTotalBayar`),0) AS `saldo`,0.2 AS `persen`,coalesce((sum(`penjualan`.`pnjlTotalBayar`) * 0.2),0) AS `estimasi` from `penjualan` where ((`penjualan`.`pnjlTotalBayar` > 0) and (((to_days(`penjualan`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) >= 61) and (((to_days(`penjualan`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) <= 90))) union (select '5' AS `nomor`,'Menunggak 91-180 Hari' AS `kelompok_umur`,coalesce(sum(`penjualan`.`pnjlTotalBayar`),0) AS `saldo`,0.3 AS `persen`,coalesce((sum(`penjualan`.`pnjlTotalBayar`) * 0.3),0) AS `estimasi` from `penjualan` where ((`penjualan`.`pnjlTotalBayar` > 0) and (((to_days(`penjualan`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) >= 91) and (((to_days(`penjualan`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) <= 180))) union (select '6' AS `nomor`,'Menunggak 180-365 Hari' AS `kelompok_umur`,coalesce(sum(`penjualan`.`pnjlTotalBayar`),0) AS `saldo`,0.5 AS `persen`,coalesce((sum(`penjualan`.`pnjlTotalBayar`) * 0.5),0) AS `estimasi` from `penjualan` where ((`penjualan`.`pnjlTotalBayar` > 0) and (((to_days(`penjualan`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) >= 181) and (((to_days(`penjualan`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) <= 365))) union (select '7' AS `nomor`,'Menunggak 1-30 Hari' AS `kelompok_umur`,coalesce(sum(`penjualan`.`pnjlTotalBayar`),0) AS `saldo`,0.8 AS `persen`,coalesce((sum(`penjualan`.`pnjlTotalBayar`) * 0.8),0) AS `estimasi` from `penjualan` where ((`penjualan`.`pnjlTotalBayar` > 0) and (((to_days(`penjualan`.`pnjlJatuhTempo`) - to_days(now())) * -(1)) >= 366))) */;

/*View structure for view vw_detail */

/*!50001 DROP TABLE IF EXISTS `vw_detail` */;
/*!50001 DROP VIEW IF EXISTS `vw_detail` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_detail` AS select `barang`.`brngNama` AS `brngNama`,`barang`.`brngStunKode` AS `brngStunKode`,`barang`.`brngHargaJual` AS `brngHargaJual`,`satuan`.`stunNama` AS `stunNama`,`penjualan_detail`.`detpId` AS `detpId`,`penjualan_detail`.`detpPnjlKode` AS `detpPnjlKode`,`penjualan_detail`.`detpBrngKode` AS `detpBrngKode`,`penjualan_detail`.`detpJumlah` AS `detpJumlah`,`penjualan_detail`.`detpHarga` AS `detpHarga`,(`penjualan_detail`.`detpHarga` * `penjualan_detail`.`detpJumlah`) AS `subtotal` from ((`barang` join `satuan` on((`barang`.`brngStunKode` = `satuan`.`stunKode`))) join `penjualan_detail` on((`penjualan_detail`.`detpBrngKode` = `barang`.`brngKode`))) */;

/*View structure for view vw_detailtemp */

/*!50001 DROP TABLE IF EXISTS `vw_detailtemp` */;
/*!50001 DROP VIEW IF EXISTS `vw_detailtemp` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_detailtemp` AS select `penjualan_detail_temp`.`detpId` AS `detpId`,`penjualan_detail_temp`.`detpBrngKode` AS `detpBrngKode`,`penjualan_detail_temp`.`detpJumlah` AS `detpJumlah`,`penjualan_detail_temp`.`detpHarga` AS `detpHarga`,`penjualan_detail_temp`.`detpCreatedBy` AS `detpCreatedBy`,`barang`.`brngNama` AS `brngNama`,`barang`.`brngStunKode` AS `brngStunKode`,`barang`.`brngHargaJual` AS `brngHargaJual`,`satuan`.`stunNama` AS `stunNama`,(`penjualan_detail_temp`.`detpHarga` * `penjualan_detail_temp`.`detpJumlah`) AS `subtotal` from ((`penjualan_detail_temp` join `barang` on((`penjualan_detail_temp`.`detpBrngKode` = `barang`.`brngKode`))) join `satuan` on((`barang`.`brngStunKode` = `satuan`.`stunKode`))) */;

/*View structure for view vw_histori */

/*!50001 DROP TABLE IF EXISTS `vw_histori` */;
/*!50001 DROP VIEW IF EXISTS `vw_histori` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_histori` AS select `historipiutang`.`histKode` AS `histKode`,`historipiutang`.`histTanggal` AS `histTanggal`,`historipiutang`.`histPlgnKode` AS `histPlgnKode`,`historipiutang`.`histKeterangan` AS `histKeterangan`,`historipiutang`.`histDebet` AS `histDebet`,`historipiutang`.`histKredit` AS `histKredit`,`historipiutang`.`histSaldo` AS `histSaldo`,`historipiutang`.`histCreatedBy` AS `histCreatedBy`,`pelanggan`.`plgnNama` AS `plgnNama`,`pelanggan`.`plgnOwner` AS `plgnOwner`,`pelanggan`.`plgnAlamat` AS `plgnAlamat`,`pelanggan`.`plgnTelp` AS `plgnTelp`,`pelanggan`.`plgnPiutang` AS `plgnPiutang` from (`historipiutang` join `pelanggan` on((`historipiutang`.`histPlgnKode` = `pelanggan`.`plgnKode`))) */;

/*View structure for view vw_pembayaran */

/*!50001 DROP TABLE IF EXISTS `vw_pembayaran` */;
/*!50001 DROP VIEW IF EXISTS `vw_pembayaran` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_pembayaran` AS select `pembayaran`.`pybrKode` AS `pybrKode`,`pembayaran`.`pybrTanggal` AS `pybrTanggal`,`pembayaran`.`pybrPnjlKode` AS `pybrPnjlKode`,`pembayaran`.`pybrJumlahBayar` AS `pybrJumlahBayar`,`pembayaran`.`pybrCreatedBy` AS `pybrCreatedBy`,`penjualan`.`pnjlTanggal` AS `pnjlTanggal`,`penjualan`.`pnjlPlgnKode` AS `pnjlPlgnKode`,`penjualan`.`pnjlJatuhTempo` AS `pnjlJatuhTempo`,`penjualan`.`pnjlTotalPenjualan` AS `pnjlTotalPenjualan`,`penjualan`.`pnjlTotalBayar` AS `pnjlTotalBayar`,`penjualan`.`pnjlCreatedBy` AS `pnjlCreatedBy`,`pelanggan`.`plgnNama` AS `plgnNama`,`pelanggan`.`plgnOwner` AS `plgnOwner`,`pelanggan`.`plgnAlamat` AS `plgnAlamat`,`pelanggan`.`plgnTelp` AS `plgnTelp`,`pelanggan`.`plgnPiutang` AS `plgnPiutang` from ((`pembayaran` join `penjualan` on((`pembayaran`.`pybrPnjlKode` = `penjualan`.`pnjlKode`))) join `pelanggan` on((`penjualan`.`pnjlPlgnKode` = `pelanggan`.`plgnKode`))) */;

/*View structure for view vw_penjualan */

/*!50001 DROP TABLE IF EXISTS `vw_penjualan` */;
/*!50001 DROP VIEW IF EXISTS `vw_penjualan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_penjualan` AS select `pelanggan`.`plgnNama` AS `plgnNama`,`pelanggan`.`plgnOwner` AS `plgnOwner`,`pelanggan`.`plgnAlamat` AS `plgnAlamat`,`pelanggan`.`plgnTelp` AS `plgnTelp`,`pelanggan`.`plgnPiutang` AS `plgnPiutang`,`penjualan`.`pnjlKode` AS `pnjlKode`,`penjualan`.`pnjlTanggal` AS `pnjlTanggal`,`penjualan`.`pnjlPlgnKode` AS `pnjlPlgnKode`,`penjualan`.`pnjlJatuhTempo` AS `pnjlJatuhTempo`,`penjualan`.`pnjlTotalPenjualan` AS `pnjlTotalPenjualan`,`penjualan`.`pnjlTotalBayar` AS `pnjlTotalBayar`,`penjualan`.`pnjlCreatedBy` AS `pnjlCreatedBy` from (`penjualan` join `pelanggan` on((`penjualan`.`pnjlPlgnKode` = `pelanggan`.`plgnKode`))) */;

/*View structure for view vw_umurpiutang_perpelanggan */

/*!50001 DROP TABLE IF EXISTS `vw_umurpiutang_perpelanggan` */;
/*!50001 DROP VIEW IF EXISTS `vw_umurpiutang_perpelanggan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_umurpiutang_perpelanggan` AS select `a`.`pnjlPlgnKode` AS `pnjlPlgnKode`,`pelanggan`.`plgnNama` AS `plgnNama`,(select sum(`b`.`pnjlTotalBayar`) from `penjualan` `b` where ((`b`.`pnjlJatuhTempo` < now()) and (`b`.`pnjlPlgnKode` = `a`.`pnjlPlgnKode`)) group by `b`.`pnjlPlgnKode`) AS `piutang_blm_jatuh_tempo`,(select sum(`c`.`pnjlTotalBayar`) from `penjualan` `c` where ((`c`.`pnjlJatuhTempo` = now()) and (`c`.`pnjlPlgnKode` = `a`.`pnjlPlgnKode`)) group by `c`.`pnjlPlgnKode`) AS `piutang_jatuh_tempo`,((select sum(`d`.`pnjlTotalBayar`) from `penjualan` `d` where (((to_days(`d`.`pnjlJatuhTempo`) - to_days(now())) >= 1) and ((to_days(`d`.`pnjlJatuhTempo`) - to_days(now())) <= 15) and (`d`.`pnjlPlgnKode` = `a`.`pnjlPlgnKode`)) group by `d`.`pnjlPlgnKode`) * 0.05) AS `piutang_telat_1_sd_15_hari`,((select sum(`e`.`pnjlTotalBayar`) from `penjualan` `e` where (((to_days(`e`.`pnjlJatuhTempo`) - to_days(now())) >= 16) and ((to_days(`e`.`pnjlJatuhTempo`) - to_days(now())) <= 30) and (`e`.`pnjlPlgnKode` = `a`.`pnjlPlgnKode`)) group by `e`.`pnjlPlgnKode`) * 0.15) AS `piutang_telat_16_sd_30_hari`,((select sum(`f`.`pnjlTotalBayar`) from `penjualan` `f` where (((to_days(`f`.`pnjlJatuhTempo`) - to_days(now())) >= 31) and ((to_days(`f`.`pnjlJatuhTempo`) - to_days(now())) <= 60) and (`f`.`pnjlPlgnKode` = `a`.`pnjlPlgnKode`)) group by `f`.`pnjlPlgnKode`) * 0.3) AS `piutang_telat_31_sd_60_hari`,((select sum(`g`.`pnjlTotalBayar`) from `penjualan` `g` where (((to_days(`g`.`pnjlJatuhTempo`) - to_days(now())) >= 61) and (`g`.`pnjlPlgnKode` = `a`.`pnjlPlgnKode`)) group by `g`.`pnjlPlgnKode`) * 0.5) AS `piutang_telat_lebihdari_60_hari` from (`penjualan` `a` join `pelanggan` on((`a`.`pnjlPlgnKode` = `pelanggan`.`plgnKode`))) where (`a`.`pnjlTotalBayar` > 0) group by `a`.`pnjlPlgnKode` order by `a`.`pnjlPlgnKode` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
