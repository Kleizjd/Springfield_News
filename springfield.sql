-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.24-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla springfield.noticias
CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(55) NOT NULL,
  `categoria` varchar(50) NOT NULL DEFAULT '0',
  `estado` char(1) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12345646 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla springfield.noticias: ~19 rows (aproximadamente)
INSERT INTO `noticias` (`id`, `titulo`, `categoria`, `estado`, `descripcion`) VALUES
	(1, 'Nescafe', 'cultura', 'A', 'modifica'),
	(2, 'cafe aguila roja granulad', 'deporte', 'A', 'jose vamos'),
	(3, 'bolsa cafe sello rojo', 'economia', 'A', 'desarrolla'),
	(4, 'vidrio cafe aroma', 'deporte', 'A', 'bastante'),
	(5, 'vidrio cafe legal descafe', '1', 'A', 'yes very well'),
	(7, 'vidrio cafe  dolca nescafe', '1', 'A', ''),
	(8, 'vidrio cafe legal', '1', 'A', ''),
	(9, 'Cafe soluble Nescafe Tasters c', '1', 'A', 'barato'),
	(10, 'vidrio cafe colcate descafeina', '1', 'A', ''),
	(11, 'plastico crama para cafe nestle', '1', 'A', ''),
	(12, 'carton crema para cafe vainill', '1', 'A', ''),
	(13, 'crema para cafe aguila roja no', '1', 'A', ''),
	(14, 'crema  para cafe aroma', '1', 'A', ''),
	(15, 'plastico crema para cafe colcafe', '1', 'A', ''),
	(123, '123', '', 'A', ''),
	(456, 'carne', '', 'A', ''),
	(886, '8', '', 'A', ''),
	(3443, '434', '', 'A', '5'),
	(12366, 'jugo de uva', '', '', '');

-- Volcando estructura para tabla springfield.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(120) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `estado_usuario` varchar(1) NOT NULL,
  `rolid` int(250) NOT NULL,
  `imagen_usuario` varchar(250) NOT NULL,
  PRIMARY KEY (`id_usuario`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla springfield.usuarios: 10 rows
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `password`, `email`, `estado_usuario`, `rolid`, `imagen_usuario`) VALUES
	(1, '   José Daniel', '   Grijalba', '$2y$10$An1ghzpGGYth9vnvA6CHveNqNWNqLtBDzMv.QOLhaIZkpeZsYR6HC', 'jose.jdgo97@gmail.com', 'A', 1, 'imagen-jose-1.jpg'),
	(2, 'Juan David', 'Grijalba', '$2y$10$An1ghzpGGYth9vnvA6CHveNqNWNqLtBDzMv.QOLhaIZkpeZsYR6HC', 'juandgo1997@gmail.com', 'A', 2, ''),
	(4, '    Diana', '    Aristizabal', '$2y$10$TNQULbSAcW1Jojir7xbW/OKwAPUxAd3tE3Q.ePTsEzi.5qYFk2NxC', 'dianaaristizaba@gmail.com', 'A', 2, 'diana-diana-4.png'),
	(5, 'mario', 'hernandez', '$2y$10$Bjt2/1DXCYOQ9cWVvbJRnOuZ5bbFCjSUiZBFqDzgLJTMiJNMY8yAm', 'mario@gmail.com', 'A', 2, '2-16.jpg'),
	(7, 'Camilo', 'Delgado', '$2y$10$dmDf1V0Ib2b2bw1g7R3QtuGHnOEBQx14RkDS3bXHUy6tkJPDDGBr6', 'camilo@mail.com', 'A', 2, '6-89.jpg'),
	(12, '1', '1', '$2y$10$ZfrQOY/34FR6XM31iWGVfOuYqquM7cCC71d8Uy7MwIsTP/GikFDJS', '', 'A', 2, ''),
	(13, '12', '12', '$2y$10$Ze.pmyZP6Vdqx9Q55sk4T.UWE7nbIVTKru..n/zjXoDZvchitjAaC', '', 'A', 2, ''),
	(14, '12', '12', '$2y$10$xFAAqAbQrRaEEjna1wi7X.HfOIiZJlsBh1NV5eKh1fBA2B8lZx7xe', '', 'A', 2, ''),
	(15, 'manuel', 'grijalba', '$2y$10$Q36BTBWSKW0vFFEuJzIOtuv8LjA/Efc/xlBben6LD9qegXccLbDji', '', 'A', 2, ''),
	(17, 'luis', 'garces', '$2y$10$mGIpInBVNSK3jeuSW23b3.iJuPvpRt259TWLKZYTKQ/lYKozA9/Ty', 'luis@mail.com', 'A', 2, '1-1-17.jpg');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
