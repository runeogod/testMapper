# ************************************************************
# Sequel Pro SQL dump
# Version 5438
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.38)
# Database: testMapper
# Generation Time: 2019-06-13 20:24:41 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table bus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bus`;

CREATE TABLE `bus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `depart_id` varchar(200) NOT NULL DEFAULT '',
  `depart_at` varchar(200) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `airport_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `bus` WRITE;
/*!40000 ALTER TABLE `bus` DISABLE KEYS */;

INSERT INTO `bus` (`id`, `name`, `depart_id`, `depart_at`, `destination_id`, `city_id`, `airport_id`)
VALUES
	(1,'Barcelona Airport BUS','2','09:00',1,2,2);

/*!40000 ALTER TABLE `bus` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table city
# ------------------------------------------------------------

DROP TABLE IF EXISTS `city`;

CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `zipcode` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;

INSERT INTO `city` (`id`, `name`, `zipcode`)
VALUES
	(1,'Madrid',NULL),
	(2,'Barcelona',NULL),
	(3,'New York',NULL),
	(4,'Sweden',NULL);

/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table flight
# ------------------------------------------------------------

DROP TABLE IF EXISTS `flight`;

CREATE TABLE `flight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `depart_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `depart_airport_id` int(11) DEFAULT NULL,
  `destination_airport_id` int(11) DEFAULT NULL,
  `gate` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `flight` WRITE;
/*!40000 ALTER TABLE `flight` DISABLE KEYS */;

INSERT INTO `flight` (`id`, `name`, `depart_id`, `destination_id`, `depart_airport_id`, `destination_airport_id`, `gate`)
VALUES
	(1,'Air Sweden',3,4,NULL,NULL,NULL);

/*!40000 ALTER TABLE `flight` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table train
# ------------------------------------------------------------

DROP TABLE IF EXISTS `train`;

CREATE TABLE `train` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `depart_id` int(11) NOT NULL,
  `destination_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `train` WRITE;
/*!40000 ALTER TABLE `train` DISABLE KEYS */;

INSERT INTO `train` (`id`, `name`, `depart_id`, `destination_id`)
VALUES
	(1,'Madrid Train',1,3);

/*!40000 ALTER TABLE `train` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
