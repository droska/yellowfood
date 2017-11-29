/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.5.5-10.1.26-MariaDB : Database - yellowfood
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`yellowfood` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `yellowfood`;

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Categoria_UNIQUE` (`Categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `categoria` */

insert  into `categoria`(`ID`,`Categoria`) values (15,'Arabe'),(20,'Carnes'),(11,'China'),(18,'Comida Rápida'),(21,'Dietetica'),(16,'Francesa'),(9,'Italiana'),(19,'Japonesa'),(13,'Mediterranea'),(10,'Mexicana'),(12,'Pastas'),(17,'Peruana');

/*Table structure for table `categoria_plato` */

DROP TABLE IF EXISTS `categoria_plato`;

CREATE TABLE `categoria_plato` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `categoria_plato` */

insert  into `categoria_plato`(`ID`,`Nombre`) values (1,'Hamburguesa'),(2,'Pizza'),(3,'Sushi'),(4,'Helado'),(5,'Hot Dog'),(6,'Postre'),(7,'Pasta'),(8,'Sopa'),(9,'Enrrollado'),(10,'Bebida'),(11,'Entrada'),(12,'Ensaladas');

/*Table structure for table `metodo_pago` */

DROP TABLE IF EXISTS `metodo_pago`;

CREATE TABLE `metodo_pago` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `metodo_pago` */

insert  into `metodo_pago`(`ID`,`Tipo`) values (1,'Efectivo'),(2,'Credito'),(3,'Debito'),(4,'Transferencia');

/*Table structure for table `plato` */

DROP TABLE IF EXISTS `plato`;

CREATE TABLE `plato` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` varchar(45) NOT NULL,
  `Categoria_Plato_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Plato_Categoria_Plato1_idx` (`Categoria_Plato_ID`),
  CONSTRAINT `fk_Plato_Categoria_Plato1` FOREIGN KEY (`Categoria_Plato_ID`) REFERENCES `categoria_plato` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `plato` */

insert  into `plato`(`ID`,`Nombre`,`Descripcion`,`Categoria_Plato_ID`) values (1,'Pasticho','Pasticho de Carne con queso',7);

/*Table structure for table `restaurante` */

DROP TABLE IF EXISTS `restaurante`;

CREATE TABLE `restaurante` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `Ubicacion` varchar(45) DEFAULT NULL,
  `Horario` varchar(45) NOT NULL,
  `Valoracion` int(11) DEFAULT NULL,
  `Categoria_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Restaurante_Categoria1_idx` (`Categoria_ID`),
  CONSTRAINT `fk_Restaurante_Categoria1` FOREIGN KEY (`Categoria_ID`) REFERENCES `categoria` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `restaurante` */

insert  into `restaurante`(`ID`,`Nombre`,`Descripcion`,`Ubicacion`,`Horario`,`Valoracion`,`Categoria_ID`) values (1,'Mille Miglia Ristorante','Autentica comida italiana','Calle 14, San Cristóbal, Táchira','10:00 am - 11:00 pm',NULL,9);

/*Table structure for table `restaurante_pago` */

DROP TABLE IF EXISTS `restaurante_pago`;

CREATE TABLE `restaurante_pago` (
  `Restaurante_ID` int(11) NOT NULL,
  `Metodo_Pago_ID` int(11) NOT NULL,
  KEY `fk_Restaurante_Pago_Restaurante1_idx` (`Restaurante_ID`),
  KEY `fk_Restaurante_Pago_Metodo_Pago1_idx` (`Metodo_Pago_ID`),
  CONSTRAINT `fk_Restaurante_Pago_Metodo_Pago1` FOREIGN KEY (`Metodo_Pago_ID`) REFERENCES `metodo_pago` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Restaurante_Pago_Restaurante1` FOREIGN KEY (`Restaurante_ID`) REFERENCES `restaurante` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `restaurante_pago` */

insert  into `restaurante_pago`(`Restaurante_ID`,`Metodo_Pago_ID`) values (1,1),(1,2),(1,3);

/*Table structure for table `restaurante_plato` */

DROP TABLE IF EXISTS `restaurante_plato`;

CREATE TABLE `restaurante_plato` (
  `Restaurante_ID` int(11) NOT NULL,
  `Plato_ID` int(11) NOT NULL,
  `Precio` varchar(45) NOT NULL,
  KEY `fk_table1_Restaurante_idx` (`Restaurante_ID`),
  KEY `fk_table1_Plato1_idx` (`Plato_ID`),
  CONSTRAINT `fk_table1_Plato1` FOREIGN KEY (`Plato_ID`) REFERENCES `plato` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_table1_Restaurante` FOREIGN KEY (`Restaurante_ID`) REFERENCES `restaurante` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `restaurante_plato` */

insert  into `restaurante_plato`(`Restaurante_ID`,`Plato_ID`,`Precio`) values (1,1,'40000 Bsf');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
