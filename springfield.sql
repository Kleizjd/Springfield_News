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

-- Volcando estructura para tabla springfield.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla springfield.categorias: ~4 rows (aproximadamente)
INSERT INTO `categorias` (`id`, `nombre`) VALUES
	(1, 'Moda y Farandula'),
	(2, 'Politica'),
	(3, 'Tecnologia'),
	(4, 'Deportes');

-- Volcando estructura para tabla springfield.noticias
CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(55) NOT NULL,
  `categoria` varchar(50) NOT NULL DEFAULT '0',
  `estado` char(1) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `portada` varchar(50) DEFAULT NULL,
  `datecreated` datetime DEFAULT current_timestamp(),
  `ruta` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12345673 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla springfield.noticias: ~9 rows (aproximadamente)
INSERT INTO `noticias` (`id`, `titulo`, `categoria`, `estado`, `descripcion`, `portada`, `datecreated`, `ruta`) VALUES
	(1, 'el murio', '3', 'A', 'jose vamos', 'img_ab4a831d138ff790e95133a788594777.jpg', '2022-09-29 14:37:29', NULL),
	(2, 'Cafe mata', '3', 'A', 'barato', 'img_86bbb5b0a0d08f7b00ede09bb7ca2065.jpg', '2022-09-29 14:37:42', NULL),
	(3, 'jovenes', '2', '', 'murieron portada al mar', 'img_2cbec034433250cf3864cc563cb4b4ae.jpg', '2022-09-29 16:54:20', 'jovenes'),
	(4, 'hombre cae al piso', '2', '', 'quien sabe', 'img_721c1d46eeff581629fbcb49577898bb.jpg', '2022-09-29 17:08:29', 'hombre-cae-al-piso'),
	(6, '1234', '2', '', 'asdas', 'img_fb905afe8fa36e2cfc804cae57a6f290.jpg', '2022-10-01 18:47:25', '1234'),
	(7, 'rapto', '2', '', 'violacion de jovenes amigos de Diana', 'img_759fbcab4132cc401bfd574c48b551d0.jpg', '2022-10-02 00:13:56', 'rapto'),
	(8, 'llovio', '2', '', 'y lo mato un rayo', 'img_e26c6cb7b2b54d46229d672e970b19c2.jpg', '2022-10-03 00:33:35', 'llovio'),
	(9, 'no lo se', '2', '', 'yo lo mate por que me debia dinero', 'img_6f90321cbdab98218da1f7f1571a5fd8.jpg', '2022-10-03 18:10:32', 'no-lo-se'),
	(10, 'Gana eleccion', '2', '', 'Presidente Petro', 'img_427e011ed4270425462ac97f9575bb8f.jpg', '2022-10-04 03:35:49', 'gana-eleccion');

-- Volcando estructura para tabla springfield.perfiles
CREATE TABLE IF NOT EXISTS `perfiles` (
  `id` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla springfield.perfiles: ~3 rows (aproximadamente)
INSERT INTO `perfiles` (`id`, `nombre`) VALUES
	(1, 'administrador'),
	(2, 'lector'),
	(3, 'columnista');

-- Volcando estructura para tabla springfield.preguntas
CREATE TABLE IF NOT EXISTS `preguntas` (
  `id` int(11) DEFAULT NULL,
  `pregunta` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla springfield.preguntas: ~3 rows (aproximadamente)
INSERT INTO `preguntas` (`id`, `pregunta`) VALUES
	(1, 'cual fue el nombre de su primera mascota?'),
	(2, 'lugar de nacimiento?'),
	(3, 'color favorito?');

-- Volcando estructura para tabla springfield.reaccion
CREATE TABLE IF NOT EXISTS `reaccion` (
  `email` varchar(50) DEFAULT NULL,
  `id_noticia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla springfield.reaccion: ~5 rows (aproximadamente)
INSERT INTO `reaccion` (`email`, `id_noticia`) VALUES
	('jose.jdgo97@gmail.com', 1),
	('dianaaristizabal@gmail.com', 1),
	('dianaaristizabal@gmail.com', 2),
	('dianaaristizabal@gmail.com', 6),
	('dianaaristizabal@gmail.com', 4),
	('naruto@mail.com', 12345667),
	('naruto@mail.com', 2),
	('naruto@mail.com', 1),
	('naruto@mail.com', 6),
	('jose.jdgo97@gmail.com', 12345670),
	('jose.jdgo97@gmail.com', 12345672),
	('jose.jdgo97@gmail.com', 12345669),
	('jose.jdgo97@gmail.com', 10),
	('jose.jdgo97@gmail.com', 8),
	('jose.jdgo97@gmail.com', 7);

-- Volcando estructura para tabla springfield.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(120) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `estado_usuario` varchar(1) NOT NULL,
  `rolid` int(250) NOT NULL,
  `imagen_usuario` varchar(250) NOT NULL,
  `id_pregunta` int(11) DEFAULT NULL,
  `respuesta` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla springfield.usuarios: 12 rows
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `password`, `email`, `estado_usuario`, `rolid`, `imagen_usuario`, `id_pregunta`, `respuesta`) VALUES
	(1, 'José Daniel', 'Grijalba', '$2y$10$cpogeAdHRyRBkotAeQ3nS.tck5whOGT0VAgs6CcPda3/iN.k44qIS', 'jose.jdgo97@gmail.com', 'A', 1, 'imagen-jose-1.jpg', 1, NULL),
	(2, 'Juan David', 'Grijalba', '$2y$10$cpogeAdHRyRBkotAeQ3nS.tck5whOGT0VAgs6CcPda3/iN.k44qIS', 'juandgo1997@gmail.com', 'A', 3, '2-2.jpg', NULL, NULL),
	(4, '    Diana', '    Aristizabal', '$2y$10$TNQULbSAcW1Jojir7xbW/OKwAPUxAd3tE3Q.ePTsEzi.5qYFk2NxC', 'dianaaristizabal@gmail.com', 'A', 3, 'diana-diana-4.png', NULL, NULL),
	(5, 'mario', 'hernandez', '$2y$10$Bjt2/1DXCYOQ9cWVvbJRnOuZ5bbFCjSUiZBFqDzgLJTMiJNMY8yAm', 'mario@gmail.com', 'A', 2, '2-16.jpg', NULL, NULL),
	(7, 'Camilo', 'Delgado', '$2y$10$dmDf1V0Ib2b2bw1g7R3QtuGHnOEBQx14RkDS3bXHUy6tkJPDDGBr6', 'camilo@mail.com', 'A', 3, '6-89.jpg', NULL, NULL),
	(8, 'luis', 'garces', '$2y$10$mGIpInBVNSK3jeuSW23b3.iJuPvpRt259TWLKZYTKQ/lYKozA9/Ty', 'luis@mail.com', 'A', 2, '1-1-17.jpg', NULL, NULL),
	(9, 'arley', 'd', '$2y$10$/AWJxM/m6Z6cm1YaUAvtJ.IRimLpiDUm.eMjrriPXtdwvHxJUG1BG', 'arley@gmail.com', 'A', 3, '2-32.jpg', NULL, NULL),
	(60, 'neji', 'hiuga', '$2y$10$I8AeTYS1pNSBrZRYufeStOijQqVPf2ctFu.xiBWTZ8tpWtDBQBsr6', 'neji@gmail.com', 'A', 2, '', 1, 'obito'),
	(10, 'pablo', 'neruda', '$2y$10$gDtToYDxzH3HlnIH3iVRzefBnKoFCO8Ag.C4Ffx4xLjNUeAslbc3i', 'pablo@gmai.com', 'A', 3, '', 3, NULL),
	(11, 'andres', 'perez', '$2y$10$5UpZfl5EtSsYPqCkf.0s5OhyfgmUTFbiZpCZ/UbCoZFL2Kp4T20mC', 'perez@14perez.com', 'A', 2, '', 2, NULL),
	(12, 'camilo', 'garzon', '$2y$10$.DgeiyX3xksaR.4e2uVPZueO9K0I9Wv0AZQhYlJdrcfPiL0cVocta', 'camilo@14perez.com', 'A', 2, '', 1, 'lucas'),
	(13, 'pablo', 'picasso', '$2y$10$uhooSh5.jFGg/ttO4PJwIu.Yh00TC.wAOJ.DN7T1W3CIXMT11wRj2', 'pablo@mail.com', 'A', 2, '', 1, 'lucas'),
	(59, 'luigi', 'bros', '$2y$10$MsJpwquKzubSCDRsCfdRZOEZxA2nwY2Uz5hVxjGsQjJgBUl2qA4RK', 'luigi@gmail.com', 'A', 2, '', 1, 'lucas'),
	(58, 'sasuke', 'uchija', '$2y$10$z/ssTu0goK8spUIrjug0luSTPJjJ5bxy/nCd7rjPQ.JKMBXsV4moq', 'sasuke@gmail.com', 'A', 2, '', 1, 'lucas'),
	(57, 'José Daniel', 'Grijalba Osorio', '$2y$10$FFHQCav40l/f/G89s6/lC.4lVaeI2E0FfqVBIJnaX6KW0Zdgw8SKS', 'best@gmail.com', 'A', 2, '', 1, NULL),
	(14, 'naruto', 'uzumaki', '$2y$10$P3nIqGFV4u1CmRFejHn9/.OVRFkr6vOztjkSnL5wuJKNnLJrwF.jS', 'naruto@mail.com', 'A', 2, 'naruto-14.jpg', 1, 'lucas');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
