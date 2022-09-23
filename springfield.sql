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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12345647 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla springfield.noticias: ~20 rows (aproximadamente)
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
	(12366, 'jugo de uva', '', '', ''),
	(12345646, 'as', 'SD', 'A', 'wqe');

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

-- Volcando datos para la tabla springfield.preguntas: ~4 rows (aproximadamente)
INSERT INTO `preguntas` (`id`, `pregunta`) VALUES
	(1, 'cual fue el nombre de su primera mascota?'),
	(2, 'a que edad tuvo su primera pareja?'),
	(3, 'lugar de nacimiento?'),
	(4, 'color favorito?');

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
  `preguta_recuperacion_clave` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla springfield.usuarios: 37 rows
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `password`, `email`, `estado_usuario`, `rolid`, `imagen_usuario`, `preguta_recuperacion_clave`) VALUES
	(1, '   José Daniel', '   Grijalba', '$2y$10$An1ghzpGGYth9vnvA6CHveNqNWNqLtBDzMv.QOLhaIZkpeZsYR6HC', 'jose.jdgo97@gmail.com', 'A', 1, '2-1.jpg', NULL),
	(2, 'Juan David', 'Grijalba', '$2y$10$An1ghzpGGYth9vnvA6CHveNqNWNqLtBDzMv.QOLhaIZkpeZsYR6HC', 'juandgo1997@gmail.com', 'A', 2, '', NULL),
	(4, '    Diana', '    Aristizabal', '$2y$10$TNQULbSAcW1Jojir7xbW/OKwAPUxAd3tE3Q.ePTsEzi.5qYFk2NxC', 'dianaaristizabal@gmail.com', 'A', 2, 'diana-diana-4.png', NULL),
	(5, 'mario', 'hernandez', '$2y$10$Bjt2/1DXCYOQ9cWVvbJRnOuZ5bbFCjSUiZBFqDzgLJTMiJNMY8yAm', 'mario@gmail.com', 'A', 2, '2-16.jpg', NULL),
	(7, 'Camilo', 'Delgado', '$2y$10$dmDf1V0Ib2b2bw1g7R3QtuGHnOEBQx14RkDS3bXHUy6tkJPDDGBr6', 'camilo@mail.com', 'A', 2, '6-89.jpg', NULL),
	(12, '1', '1', '$2y$10$ZfrQOY/34FR6XM31iWGVfOuYqquM7cCC71d8Uy7MwIsTP/GikFDJS', '', 'A', 2, '', NULL),
	(13, '12', '12', '$2y$10$Ze.pmyZP6Vdqx9Q55sk4T.UWE7nbIVTKru..n/zjXoDZvchitjAaC', '', 'A', 2, '', NULL),
	(14, '12', '12', '$2y$10$xFAAqAbQrRaEEjna1wi7X.HfOIiZJlsBh1NV5eKh1fBA2B8lZx7xe', '', 'A', 2, '', NULL),
	(15, 'manuel', 'grijalba', '$2y$10$Q36BTBWSKW0vFFEuJzIOtuv8LjA/Efc/xlBben6LD9qegXccLbDji', '', 'A', 2, '', NULL),
	(17, 'luis', 'garces', '$2y$10$mGIpInBVNSK3jeuSW23b3.iJuPvpRt259TWLKZYTKQ/lYKozA9/Ty', 'luis@mail.com', 'A', 2, '1-1-17.jpg', NULL),
	(18, 'andres', 'garzon', '$2y$10$CPHK9mQ55mmg1aKRN1z/zepvkPH./lamiTZdC7e3JLhUE40qU1.Jq', '13224@mail.com', 'A', 2, '', NULL),
	(19, '123', '123', '$2y$10$dGu0A98/fOvRvZqnbkN7YuSYJYY.b6rjS1YMvq5qvwgVGzZBKoYci', 'asd@mail.com', 'A', 2, '', NULL),
	(20, 'asda', '123', '$2y$10$/MgMoFotP0b6wxhGcnpcHOrGhIIRzZydFZgNaTiVwWvlEyPGqupjO', 'asaro@mail.com', 'A', 2, '', NULL),
	(21, '123', '123', '$2y$10$yGQY19m03LSnd0oG3NLEMOgEJ9k7pbJKy1INFwqXoOs8GqpV1CeJK', 'ber@mail.com', 'A', 2, '', NULL),
	(22, 'bareto', 'eqw', '$2y$10$jjju9MTiIYWcj8ahHpUZyOU4kFE.DaXH4x0DbftntP6uHc5tl2tLq', 'erto@mail.com', 'A', 2, '', NULL),
	(23, '2134', '324', '$2y$10$vpHVSH4J/3vODFoLSf/3TeaQ7XJ4AlqI0wZjB3xlYTTyWSVxuKI3.', 'carman@homtial.cpm', 'A', 2, '', NULL),
	(24, '123', '123', '$2y$10$1qj3EmNygqsV61DyioiNweM.Wu5v0.43F/IVLU.VSRmhFoIW5XZO.', 'and7@mail.com', 'A', 2, '', NULL),
	(25, 'kj', 'kj', '$2y$10$.VYi4lomjWBy46cGZiE0K.R3pBomukjsA0lJoQPnvldoFL4tZyDwa', 'kj@mail.com', 'A', 2, '', NULL),
	(26, 'ñl', 'ñl', '$2y$10$siv6Fdj2CTlOTQzWNHdl.OEqlnUrfIzZFyGkMN9Y2q53CCHpMlcdC', 'al@m.com', 'A', 2, '', NULL),
	(27, 'bn', 'bn', '$2y$10$chon.gmgTsOTYAEJV3MPO.2FDYGve3HlqA4WTxlfMljAR00Unwt36', 'bn@mail.com', 'A', 2, '', NULL),
	(28, 'ui', 'ui', '$2y$10$mD78R/qEqlauEZxXQky1ee7yavP.ADVpzZP.StA/2HoXhX/86omhu', 'ui@mail.com', 'A', 2, '', NULL),
	(29, '12', '12', '$2y$10$VunZYF9ChPqd/gWjGyzs3erfb6jnT6Ebxp0OhcYI54y.CHcXoNhHe', '123ew@hotmail.com', 'A', 2, '', NULL),
	(30, 'José Daniel', 'Grijalba Osorio', '$2y$10$1jwX/bVjylvn1oZxXLoW8unIW5Yzqb1SlNNUMGTFPgM1BJhxvnFHK', 'gas@mail.cpm', 'A', 2, '', NULL),
	(31, 'José Daniel', 'Grijalba Osorio', '$2y$10$cGhYkW9ORhff47gf8YGJVOeK/s/s8RoE29AT6B98z9bFvzi8lK/xi', 'gasa@mail.cpm', 'A', 2, '', NULL),
	(32, 'arley', 'd', '$2y$10$/AWJxM/m6Z6cm1YaUAvtJ.IRimLpiDUm.eMjrriPXtdwvHxJUG1BG', 'arley@gmail.com', 'A', 2, '2-32.jpg', NULL),
	(33, 'arley', 'castaño', '$2y$10$Rxcz9hcRwlpuDSJHgttrCODaxzXBiPY.xmNaoR9q42t2conflNuXu', 'hola@hola', 'A', 2, '', NULL),
	(34, 'holamellamohola', 'castaño', '$2y$10$JH1o9IjV0KZbsSOgMcuwmODvsrYTOHycb2cNcqG3pt3dv3F8t7ZsK', 'hola@hola1', 'A', 2, '', NULL),
	(35, '123', '123', '$2y$10$hpdmLGwwlbIl6xXlqNbst.GomxiDI0/fhuSW7ay/dNdCI52GdRwjm', 'hola@holast', 'A', 2, '', NULL),
	(36, '123', '123', '$2y$10$XgFZR6Huy7byq6GCTG2e3.w4dfBkWkhop7pI3/Ux3alRhDiVogo4.', 'hola@holaasd', 'A', 2, '', NULL),
	(37, '123', '123', '$2y$10$WBPUqu3TiFNo8Rz6P6FGOe2T1V6mGAhq8iK1QQTeohlEusyMngOKu', 'hola@holaqw', 'A', 2, '', NULL),
	(38, 'José Daniel', 'Grijalba Osorio', '$2y$10$NSug6IyQfH4sRthPqc0M0O6fS1/IRVSuPXUTdI2lkUwXB0fHIC9aK', 'hola@holaasxc', 'A', 2, '', NULL),
	(39, 'José Daniel', 'Grijalba Osorio', '$2y$10$IGAruoSxd2iqKdS2P1Sl9uJIxX7spKgqsFNHoyOmAeV37crWJHAFS', 'hola@holaasx', 'A', 2, '', NULL),
	(40, 'José Daniel', 'Grijalba Osorio', '$2y$10$DIBEgT9BfEFCLUaY84oPZuiy06/j2AqUccF3/RlZJs4SNdLnKccfu', 'hola@holaas', 'A', 2, '', NULL),
	(41, 'qwe', 'qwe', '$2y$10$lpeECvt6vWY6xw2SUNxpwu0zBmAtj3042A416aea0KUL.OygfcSdW', 'hola@holaxczc', 'A', 2, '', NULL),
	(42, 'qwe', 'qwe', '$2y$10$7xBLR3CFUTuiuCnR68srEOE9M79aLyF.ZHUm7ens3KmydNMsbyizW', 'hola@holaxczckkkk', 'A', 2, '', NULL),
	(43, '1', '1', '$2y$10$u1AyCq/KPvkBznR95hodPOcWO3eNotAyLQS.7Qhrb5jkOJw.k7q52', 'hola@holacx', 'A', 2, '', NULL),
	(44, 'pablo', 'neruda', '$2y$10$gDtToYDxzH3HlnIH3iVRzefBnKoFCO8Ag.C4Ffx4xLjNUeAslbc3i', 'pablo@gmai.com', 'A', 2, '', NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
