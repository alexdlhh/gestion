/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `Admin` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE `Cliente` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE `Company` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE `Formas_pago` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE `Liquidaciones_ECT` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE `Presupuesto` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE `Tipos_Entidades` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

CREATE TABLE `Tipos_Factura` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

CREATE TABLE `Tipos_Factura_Combustible` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE `Transaccion_Contrato` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `concepto` varchar(255) DEFAULT NULL,
  `importe` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `id_contrato` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE `Transacciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_factura` int(11) DEFAULT NULL,
  `forma_pago` varchar(255) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `importe` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `forma_cobro` varchar(255) DEFAULT NULL,
  `fecha_cobro` date DEFAULT NULL,
  `forma_pc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `Admin` (`id`, `user`, `pass`) VALUES
(1, 'alex', 'alex');


INSERT INTO `Cliente` (`id`, `company`) VALUES
(1, 1);


INSERT INTO `Company` (`id`, `name`, `type`) VALUES
(1, 'ANA', NULL);
INSERT INTO `Company` (`id`, `name`, `type`) VALUES
(2, 'SURGEST', NULL);
INSERT INTO `Company` (`id`, `name`, `type`) VALUES
(3, 'AGS', NULL);

INSERT INTO `Conceptos_Factura` (`id`, `nombre`, `importe`, `iva`, `otros`, `id_factura`, `company`) VALUES
(1, 'test', 1000, 21, 'ksf', 1, 1);


INSERT INTO `Contratos` (`id`, `id_cliente`, `company`, `mes_vto`, `fecha_emision`, `cliente`, `refer_cliente`, `cif`, `direccion`, `telefono`, `servicios`, `company1`, `agente`, `company2`, `poliza`, `identifier`, `descripcion`, `contratado`, `pneta`, `hsp`, `total`, `status`, `cobro`, `importe`, `fecha`, `contidad_pte`) VALUES
(1, 1, 1, 1, '2022-11-17', 1, '1', '34567', 'gfhjbhk', '54678', 'gfhvjbhklm', 'yvgjbh', 1, 'gfhgvjbhk', '6578', '65678', 'tfchvgjbh', 'yvgjbk', 1, '1', 1000, 1, 1, 1000, '2022-11-17', 1);


INSERT INTO `Entidades` (`id`, `type`, `name`, `nif`, `date`, `b_address`, `address`, `poblacion`, `cp`, `provincia`, `contact`, `phone`, `phone2`, `email`, `bank`, `observaciones`, `season`, `company`, `alta_proveedor`, `tipo_cliente`) VALUES
(1, 1, 'cgvhbjk', '54678', '2022-11-17', 'tcfyvgbhk', 'hvgjbhk', 'hgjbhk', 12001, 'hgjhbkj', 'gvjbhkn', '656789', '7689', 'ghvbjhk', '576898', 'gfhvgjbhkj', 2022, 1, 'hfvgjbh', 1);


INSERT INTO `Facturas` (`id`, `date`, `num`, `dirigido`, `cif`, `base`, `iva`, `otros`, `irpf`, `total`, `type`, `prestado`, `asunto`, `motivo`, `company`) VALUES
(1, '2022-11-17', 1, 1, '54678', 1000, 21, 'u', 15, 1210, 1, 'hjn', 'hbjn', 'hbjn', 1);


INSERT INTO `Facturas_Combustible` (`id`, `orden`, `fecha_albaran`, `albaran`, `cliente`, `company`, `type`, `num_order`, `factura`, `num_remesa`, `fecha_dto`, `fecha_factura`, `fecha_remesa`, `dias`, `num_factura`, `total`, `dirigido`, `cif`, `cobrado`, `vto`, `otros`, `timbres`, `interes`, `comision`, `base`, `desglose`, `gastos`, `iva`, `fecha_pago`, `observaciones`, `autonomo`, `ssociales`, `sueldos`) VALUES
(1, 1, '2022-11-17', 1, 1, '1', 1, '1', '1', '1', '2022-11-17', '2022-11-17', '2022-11-17', 11, '1', 1210, '1', '5467898', 1, '1', 'K', '?', '1', '1', 1000, '{\"test\":1}', '1', 1, '2022-11-17', 'yugh', '1', '1', 1);


INSERT INTO `Formas_pago` (`id`, `nombre`) VALUES
(1, 'Transferencia');


INSERT INTO `Liquidaciones_ECT` (`id`, `id_cliente`, `company`) VALUES
(1, 1, 1);


INSERT INTO `Precio_Litros` (`id`, `id_factura`, `company`, `litros`, `type`, `precio`, `base`) VALUES
(1, 1, 1, 10, 1, 1000, 1000);


INSERT INTO `Presupuesto` (`id`, `id_cliente`, `company`) VALUES
(1, 1, 1);


INSERT INTO `Produccion_Mes` (`id`, `id_cliente`, `company`, `mes_vto`, `fecha_emision`, `cliente`, `refer_cliente`, `cif`, `direccion`, `telefono`, `servicios`, `company1`, `agente`, `company2`, `poliza`, `identifier`, `descripcion`, `contratado`, `pneta`, `hsp`, `total`, `status`, `cobro`, `importe`, `fecha`, `contidad_pte`) VALUES
(1, 1, 1, 1, '2022-11-17', 1, '1', '65789', 'tcfvgbhkl', '56789', 'tyvgbhk', 'tfghj', 1, 'jhbkjn', '567689', '546576', 'hfjvgkbl', '1', 1, '1', 1000, 1, 1, 10, '2022-11-17', 1);


INSERT INTO `Tipos_Entidades` (`id`, `name`) VALUES
(1, 'EMPRESA');
INSERT INTO `Tipos_Entidades` (`id`, `name`) VALUES
(2, 'AGENTES');
INSERT INTO `Tipos_Entidades` (`id`, `name`) VALUES
(3, 'CLIENTES');
INSERT INTO `Tipos_Entidades` (`id`, `name`) VALUES
(4, 'COMPAÑIA 1'),
(5, 'COMPAÑIA 2'),
(6, 'PROVEEDORES'),
(7, 'X');

INSERT INTO `Tipos_Factura` (`id`, `name`) VALUES
(1, 'FACTURAS PROVEEDORES');
INSERT INTO `Tipos_Factura` (`id`, `name`) VALUES
(2, 'GASTOS');
INSERT INTO `Tipos_Factura` (`id`, `name`) VALUES
(3, 'FACTURAS A COMPAÑIAS');
INSERT INTO `Tipos_Factura` (`id`, `name`) VALUES
(4, 'INGRESOS'),
(5, 'INGRESOS T2'),
(6, 'GASTOS T2 '),
(7, 'PRESTAMOS');

INSERT INTO `Tipos_Factura_Combustible` (`id`, `name`) VALUES
(1, 'test');


INSERT INTO `Transaccion_Contrato` (`id`, `concepto`, `importe`, `fecha`, `company`, `id_contrato`) VALUES
(1, 'fhgjh', 1000, '2022-11-17', 1, 1);


INSERT INTO `Transacciones` (`id`, `id_factura`, `forma_pago`, `fecha_pago`, `importe`, `type`, `forma_cobro`, `fecha_cobro`, `forma_pc`) VALUES
(1, 1, '1', '2022-11-17', 1000, 1, '1', '2022-11-17', '1');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;