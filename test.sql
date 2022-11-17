-- -------------------------------------------------------------
-- TablePlus 3.9.1(342)
--
-- https://tableplus.com/
--
-- Database: test
-- Generation Time: 2022-11-17 17:35:33.7920
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `Cliente`;
CREATE TABLE `Cliente` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Company`;
CREATE TABLE `Company` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Conceptos_Factura`;
CREATE TABLE `Conceptos_Factura` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `importe` int(11) DEFAULT NULL,
  `iva` int(11) DEFAULT NULL,
  `otros` varchar(255) DEFAULT NULL,
  `id_factura` int(11) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Contratos`;
CREATE TABLE `Contratos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `mes_vto` int(11) DEFAULT NULL,
  `fecha_emision` date DEFAULT NULL,
  `cliente` int(11) DEFAULT NULL,
  `refer_cliente` varchar(255) DEFAULT NULL,
  `cif` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `servicios` text,
  `company1` varchar(255) DEFAULT NULL,
  `agente` int(11) DEFAULT NULL,
  `company2` varchar(255) DEFAULT NULL,
  `poliza` varchar(255) DEFAULT NULL,
  `identifier` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `contratado` varchar(255) DEFAULT NULL,
  `pneta` int(11) DEFAULT NULL,
  `hsp` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `cobro` int(11) DEFAULT NULL,
  `importe` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `contidad_pte` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Entidades`;
CREATE TABLE `Entidades` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `nif` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `b_address` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `poblacion` varchar(255) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `provincia` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `season` int(11) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `alta_proveedor` varchar(255) DEFAULT NULL,
  `tipo_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Facturas`;
CREATE TABLE `Facturas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `dirigido` int(11) DEFAULT NULL,
  `cif` varchar(255) DEFAULT NULL,
  `base` int(11) DEFAULT NULL,
  `iva` int(11) DEFAULT NULL,
  `otros` varchar(255) DEFAULT NULL,
  `irpf` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `prestado` varchar(255) DEFAULT NULL,
  `asunto` varchar(255) DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Facturas_Combustible`;
CREATE TABLE `Facturas_Combustible` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `orden` int(11) DEFAULT NULL,
  `fecha_albaran` date DEFAULT NULL,
  `albaran` int(11) DEFAULT NULL,
  `cliente` int(11) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `num_order` varchar(255) DEFAULT NULL,
  `factura` varchar(255) DEFAULT NULL,
  `num_remesa` varchar(255) DEFAULT NULL,
  `fecha_dto` date DEFAULT NULL,
  `fecha_factura` date DEFAULT NULL,
  `fecha_remesa` date DEFAULT NULL,
  `dias` int(11) DEFAULT NULL,
  `num_factura` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `dirigido` varchar(255) DEFAULT NULL,
  `cif` varchar(255) DEFAULT NULL,
  `cobrado` int(11) DEFAULT NULL,
  `vto` varchar(255) DEFAULT NULL,
  `otros` varchar(255) DEFAULT NULL,
  `timbres` varchar(255) DEFAULT NULL,
  `interes` varchar(255) DEFAULT NULL,
  `comision` varchar(255) DEFAULT NULL,
  `base` int(11) DEFAULT NULL,
  `desglose` text,
  `gastos` varchar(255) DEFAULT NULL,
  `iva` int(11) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `observaciones` text,
  `autonomo` varchar(255) DEFAULT NULL,
  `ssociales` varchar(255) DEFAULT NULL,
  `sueldos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Formas_pago`;
CREATE TABLE `Formas_pago` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Liquidaciones_ECT`;
CREATE TABLE `Liquidaciones_ECT` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Precio_Litros`;
CREATE TABLE `Precio_Litros` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_factura` int(11) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `litros` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `base` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Presupuesto`;
CREATE TABLE `Presupuesto` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Produccion_Mes`;
CREATE TABLE `Produccion_Mes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `mes_vto` int(11) DEFAULT NULL,
  `fecha_emision` date DEFAULT NULL,
  `cliente` int(11) DEFAULT NULL,
  `refer_cliente` varchar(255) DEFAULT NULL,
  `cif` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `servicios` text,
  `company1` varchar(255) DEFAULT NULL,
  `agente` int(11) DEFAULT NULL,
  `company2` varchar(255) DEFAULT NULL,
  `poliza` varchar(255) DEFAULT NULL,
  `identifier` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `contratado` varchar(255) DEFAULT NULL,
  `pneta` int(11) DEFAULT NULL,
  `hsp` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `cobro` int(11) DEFAULT NULL,
  `importe` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `contidad_pte` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Tipos_Entidades`;
CREATE TABLE `Tipos_Entidades` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Tipos_Factura`;
CREATE TABLE `Tipos_Factura` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Tipos_Factura_Combustible`;
CREATE TABLE `Tipos_Factura_Combustible` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Transaccion_Contrato`;
CREATE TABLE `Transaccion_Contrato` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `concepto` varchar(255) DEFAULT NULL,
  `importe` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `id_contrato` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Transacciones`;
CREATE TABLE `Transacciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_factura` int(11) DEFAULT NULL,
  `forma_pago` varchar(255) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `importe` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `forma_cobro` varchar(255) DEFAULT NULL,
  `fecha_cobro` date DEFAULT NULL,
  `forma pc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Company` (`id`, `name`, `type`) VALUES
('1', 'ANA', NULL),
('2', 'SURGEST', NULL),
('3', 'AGS', NULL);

INSERT INTO `Tipos_Entidades` (`id`, `name`) VALUES
('1', 'EMPRESA'),
('2', 'AGENTES'),
('3', 'CLIENTES'),
('4', 'COMPAÑIA 1'),
('5', 'COMPAÑIA 2'),
('6', 'PROVEEDORES'),
('7', 'X');

INSERT INTO `Tipos_Factura` (`id`, `name`) VALUES
('1', 'FACTURAS PROVEEDORES'),
('2', 'GASTOS'),
('3', 'FACTURAS A COMPAÑIAS'),
('4', 'INGRESOS'),
('5', 'INGRESOS T2'),
('6', 'GASTOS T2 '),
('7', 'PRESTAMOS');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;