-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for crud_ci4_buku
DROP DATABASE IF EXISTS `crud_ci4_buku`;
CREATE DATABASE IF NOT EXISTS `crud_ci4_buku` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `crud_ci4_buku`;

-- Dumping structure for table crud_ci4_buku.buku
DROP TABLE IF EXISTS `buku`;
CREATE TABLE IF NOT EXISTS `buku` (
  `buku_id` int(11) NOT NULL AUTO_INCREMENT,
  `buku_nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`buku_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table crud_ci4_buku.buku: ~0 rows (approximately)
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;
INSERT INTO `buku` (`buku_id`, `buku_nama`) VALUES
	(1, 'Ensiklopedia Bebas'),
	(2, 'Dilan 1991'),
	(3, 'Pemrogaman Dasar');
/*!40000 ALTER TABLE `buku` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
