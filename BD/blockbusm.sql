-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2022 a las 03:04:21
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blockbusm`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `top5` (IN `categoria` VARCHAR(3))   SELECT id ,veces_rentada, target  FROM pelicula WHERE target = categoria GROUP BY veces_rentada ORDER BY veces_rentada DESC LIMIT 5$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `BienvenidaPagina` (`nombre` VARCHAR(250)) RETURNS VARCHAR(250) CHARSET utf8mb4  RETURN CONCAT('BIENVENIDO ', nombre, '!')$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arriendo`
--

CREATE TABLE `arriendo` (
  `id_usuario` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `arriendo`
--

INSERT INTO `arriendo` (`id_usuario`, `id_pelicula`) VALUES
(11, 4),
(11, 5),
(11, 8),
(17, 1),
(19, 14),
(19, 1),
(19, 7),
(20, 14),
(20, 8),
(20, 13),
(20, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id_calificaciones` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `reseña` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id_calificaciones`, `id_usuario`, `id_pelicula`, `puntuacion`, `reseña`) VALUES
(1, 11, 5, 2, 'asdasdasdasgfga'),
(2, 11, 1, 5, 'Hola'),
(3, 11, 4, 2, 'aaaaaaaaaaaa'),
(7, 19, 7, 5, 'que buena'),
(8, 19, 14, 4, 'jajajaja'),
(9, 19, 1, 4, 'toy para ir a Italia'),
(10, 20, 12, 2, 'zzzzzzz'),
(11, 20, 13, 2, 'pero que');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `catalogo_copy`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `catalogo_copy` (
`id` int(11)
,`nombre` varchar(100)
,`genero` varchar(100)
,`descripcion` varchar(250)
,`ejemplares_disponibles` int(11)
,`ejemplares_totales` int(11)
,`target` varchar(50)
,`duracion` varchar(100)
,`precio` float
,`reparto` varchar(250)
,`calificacion_media_blockbusm` float
,`veces_rentada` int(11)
,`calificacion_media_usmtomatoes` float
,`nombre_imagen` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fav_list`
--

CREATE TABLE `fav_list` (
  `id_fav_list` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fav_list`
--

INSERT INTO `fav_list` (`id_fav_list`, `id_usuario`, `id_pelicula`) VALUES
(9, 20, 1),
(10, 20, 15),
(11, 20, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `ejemplares_disponibles` int(11) NOT NULL,
  `ejemplares_totales` int(11) NOT NULL,
  `target` varchar(50) NOT NULL,
  `duracion` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `reparto` varchar(250) NOT NULL,
  `calificacion_media_blockbusm` float NOT NULL,
  `veces_rentada` int(11) NOT NULL,
  `calificacion_media_usmtomatoes` float NOT NULL,
  `nombre_imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `nombre`, `genero`, `descripcion`, `ejemplares_disponibles`, `ejemplares_totales`, `target`, `duracion`, `precio`, `reparto`, `calificacion_media_blockbusm`, `veces_rentada`, `calificacion_media_usmtomatoes`, `nombre_imagen`) VALUES
(1, 'El padrino', 'crimen, drama', 'El envejecido patriarca de una dinastía del crimen organizado en la ciudad de Nueva York de la posguerra transfiere el control de su imperio clandestino a su reacio hijo menor.', 0, 60, 'R', '2h 55min', 4800, 'Marlon Brando, Al Pacino, James Caan', 4.5, 256, 4.9, 'https://cdn2.actitudfem.com/media/files/styles/big_img/public/images/2012/03/corleone_.jpg'),
(2, 'Sueños de libertad', 'drama', 'Acusado del asesinato de su mujer, Andrew Dufresne, tras ser condenado a cadena perpetua, es enviado a la cárcel de Shawshank. Con el paso de los años conseguirá ganarse la confianza del director del centro y el respeto de sus compañeros de prisión, ', 25, 50, 'R', '2h 22min', 4500, 'Tim Robbins, Morgan Freeman, Bob Gunton', 0, 133, 4.6, 'https://www.guioteca.com/los-90/files/2016/08/Sueno-de-fuga.jpg'),
(3, 'La lista de Schindler', 'histórico, guerra', 'En la Polonia ocupada por los alemanes durante la Segunda Guerra Mundial, el industrial Oskar Schindler se preocupa por sus trabajadores judíos tras presenciar su persecución por los nazis.', 50, 70, 'R', '3h 15min', 4150, 'Liam Neeson, Ben Kingsley, Ralph Fiennes', 4.5, 267, 4.6, 'https://es.web.img3.acsta.net/pictures/19/02/12/18/49/4078948.jpg'),
(4, 'El Padrino. Parte II', 'crimen, drama', 'Se retratan los inicios de la vida y la carrera de Vito Corleone en el Nueva York de los años 20, mientras su hijo, Michael, amplía y refuerza su control sobre el sindicato del crimen familiar.', 56, 100, 'R', '3h 20min', 4600, 'Kathleen Beller, Ignazio Pappalardo, Roman Coppola', 4.6, 240, 4, 'https://mx.web.img3.acsta.net/medias/nmedia/18/68/09/06/20197890.jpg'),
(5, 'La vida es bella', 'comedia, drama', 'Cuando un bibliotecario judío y su hijo se convierten en víctimas del Holocausto, él usará una perfecta mezcla de voluntad, humor e imaginación para proteger a su hijo de los peligros en el campo de concentración.', 46, 50, 'G', '1h 57min', 3600, 'Roberto Benigni, Horst Buchholz, Marisa Paredes', 4.6, 130, 4.2, 'https://www.radiomontecarlo.cl/wp-content/uploads/2019/12/s592.jpg'),
(6, 'El Rey León', 'aventura, animación, música', 'El pequeño león Simba, príncipe heredero, es engañado por su malvado tío, quien desea el trono para sí mismo.', 99, 150, 'G', '1h 29min', 4000, 'Matthew Broderick, Jonathan Taylor, James Earl Jones', 3, 301, 4.5, 'https://i.blogs.es/ae96c3/the-lion-king-poster-1994-mypostercollection.com-6/450_1000.jpeg'),
(7, 'Forrest Gump', 'comedia, drama, romántico', 'Las presidencias de Kennedy y Johnson, los acontecimientos de Vietnam, el Watergate y otros eventos históricos se desarrollan a través de la perspectiva de un hombre de Alabama con un coeficiente intelectual de 75.', 1, 150, 'G', '2h 20min', 4500, 'Tom Hanks, Gary Sinise, Robin Wright', 5, 241, 4.1, 'https://es.web.img2.acsta.net/medias/nmedia/18/93/24/15/20244789.jpg'),
(8, 'Pulp Fiction', 'crimen, suspense', 'Las vidas de dos mafiosos, un boxeador, la esposa de un gánster y un par de bandidos se entrelazan en cuatro historias de violencia y redención.', 149, 200, 'R', '2h 29min', 4600, 'John Travolta, Samuel L. Jackson, Uma Thurman', 4.6, 233, 4.6, 'https://cdn.hmv.com/r/w-640/hmv/files/4a/4affa97f-4aa6-4f2e-aaba-b707e052a48a.jpg'),
(9, 'Rocky 4', 'Deportes\r\nDrama', 'La historia sigue a Rocky Balboa, quien planea retirarse del boxeo tras recuperar su título frente a Clubber Lang en Rocky III. Sin embargo, la nueva revelación de la Unión Soviética, Iván Drago, empieza a emerger.', 5, 50, 'PG', '1h 30min', 4000, 'Sylvester Stallone\r\nTalia Shire\r\nBurt Young\r\nCarl Weathers\r\nTony Burton', 0, 40, 4.5, 'https://www.ecartelera.com/carteles/5400/5407/001_p.jpg'),
(10, 'Volver al Futuro', 'Ciencia ficción\r\nAventuras\r\nComedia', 'Una máquina del tiempo transporta a un adolescente a los años 50, cuando sus padres todavía estudiaban en la secundaria.', 2, 50, 'PG', '1h 57min', 4500, 'Michael J. Fox\r\nChristopher Lloyd\r\nCrispin Glover', 0, 55, 4.5, 'https://cdn.forbes.com.mx/2015/10/back_to_the_future.jpg'),
(11, 'Terminator', 'Ciencia ficción\r\nAcción', 'En el año 2029 las máquinas dominan el mundo. Los rebeldes que luchan contra ellas tienen como líder a John Connor. Para eliminarlo y así acabar con la rebelión, las máquinas envían al pasado el robot Terminator.', 13, 50, 'R', '1h 48min', 4400, 'Arnold Schwarzenegger\r\nLinda Hamilton\r\nMichael Biehn', 0, 60, 4.9, 'https://www.deperu.com/cine/portadas/portada230.jpg'),
(12, 'Transformers', 'Ciencia ficción\r\nAcción', 'Una guerra sin compasión opone desde tiempos inmemoriales a dos razas de robots extraterrestres: los Autobots y los crueles Decepticons. En juego: el dominio del universo.', 29, 50, 'PG', '2h 24min', 4000, 'Shia LaBeouf, Megan Fox, Josh Duhamel', 2, 15, 2.8, 'https://es.web.img3.acsta.net/medias/nmedia/18/69/49/27/20051692.jpg'),
(13, 'Star Wars: Episodio I - La amenaza fantasma', 'Space opera\r\nCiencia ficción', 'Hace mucho tiempo en una galaxia muy, muy lejana [...] La República Galáctica está sumida en disturbios. Hay protestas contra la tributación de las rutas comerciales a sistemas estelares.', 1, 50, 'PG', '2h 16min', 5000, 'Liam Neeson\r\nEwan McGregor\r\nNatalie Portman\r\nJake Lloyd\r\nPernilla August', 2, 35, 3.4, 'https://m.media-amazon.com/images/I/51kmNBe80yL._SY445_.jpg'),
(14, 'Deadpool', 'Acción\r\nSuperhéroes\r\nCiencia ficción\r\nComedia', 'Wade Wilson, tras ser sometido a un cruel experimento científico, adquiere poderes especiales que le convierten en Deadpool.', 18, 50, 'R', '1h 49min', 4500, 'Ryan Reynolds\r\nMorena Baccarin\r\nEd Skrein\r\nT. J. Miller\r\nGina Carano', 4, 65, 4.2, 'https://es.web.img3.acsta.net/pictures/15/12/04/10/48/099822.jpg'),
(15, 'Nueve reinas', 'Suspenso\r\nPolicial', 'Juan y Marcos son dos estafadores que casualmente se ven involucrados en un asunto que los puede convertir en millonarios', 45, 50, 'PG', '1h 55min', 3000, 'Ricardo Darín\r\nGastón Pauls\r\nLeticia Brédice\r\nTomás Fonzi', 0, 10, 4, 'https://cloudfront-us-east-1.images.arcpublishing.com/infobae/WAIMDDPU2ZDL7FB62INBQA6PZY.jpg'),
(16, 'No estoy loca', 'Comedia\r\nDrama', 'Carolina ingresa en una clínica psiquiátrica tras intentar suicidarse cuando se entera de que su marido tiene una aventura con su mejor amiga y que no puede concebir hijos.', 60, 60, 'PG', '1h 56min', 1, 'Paz Bascuñán\r\nIgnacia Allamand\r\nFernanda Urrejola\r\nMarcial Tagle', 0, 0, 0, 'https://www.humonegro.com/wp-content/NO-ESTOY-LOCA-FRONTAL-560x600.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sigue_a`
--

CREATE TABLE `sigue_a` (
  `id_usuario` int(11) NOT NULL,
  `id_sigue_a` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sigue_a`
--

INSERT INTO `sigue_a` (`id_usuario`, `id_sigue_a`) VALUES
(17, 14),
(17, 11),
(19, 17),
(19, 11),
(19, 14),
(20, 17),
(20, 14),
(20, 19),
(17, 19),
(17, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `apellido_usuario` varchar(100) NOT NULL,
  `user_usuario` varchar(250) NOT NULL,
  `clave_usuario` varchar(250) NOT NULL,
  `email_usuario` varchar(150) NOT NULL,
  `saldo_usuario` float NOT NULL,
  `num_seguidores_usuario` int(11) NOT NULL,
  `num_seguidas_usuario` int(11) NOT NULL,
  `descripcion_usuario` varchar(250) NOT NULL,
  `rentadas_actualmente` int(11) NOT NULL,
  `rentadas_historicamente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `user_usuario`, `clave_usuario`, `email_usuario`, `saldo_usuario`, `num_seguidores_usuario`, `num_seguidas_usuario`, `descripcion_usuario`, `rentadas_actualmente`, `rentadas_historicamente`) VALUES
(11, 'Sebastian Alfonso', 'Salgado', 'Messi12345', '$2y$10$DyvW4/oUkOrTIW1i8s2Yo.iougL5yAKXAQCNKxHv/HsVvSgRYyFha', '', 0, 2, 0, '0', 0, 0),
(13, 'Juanito', 'Perez', 'kodamonkey', '$2y$10$n48FWNFvXcDrMMFm0mZh0ueoPbMgts/qXQLSn4JEZ30iONoVlaqpu', '', 0, 0, 0, '0', 0, 0),
(14, 'Amalia', 'Arroyo', 'amamalia', '$2y$10$IKQ9eclEOL/WW5cqT8IwI.vkMeIEGbNhsQDkPPEWbaVLJY3lrjCvm', 'amamalia@usm.cl', 0, 3, 0, '0', 0, 0),
(16, 'juan', 'valencia', 'gol123', '$2y$10$tz5fi0WRSleLdbngAT2ZueBEgelqQe09RWi14Dh2qG4AhblU3GkNC', 'ecuador@gmail.com', 0, 0, 1, '0', 0, 0),
(17, 'Diego', 'Villegas', 'qwerty', '$2y$10$YwH4WblcDYxaFVbmm0pTHek7M5mve8lO7CYafXgrZMHcWTfQPquVm', '', 31600, 2, 4, 'toy al borde de la locura, ayuda', 1, 3),
(19, 'Lionel', 'Messi', 'messi', '$2y$10$pNdFd2eL7wwdKkkxf2Nt.uveW9bVvhD58YHACqnJBwOgQ4e6Z7UOm', '', 119986000, 2, 3, 'el dibu no le pudo decir upa', 3, 3),
(20, 'Cristiano', 'Ronaldo', 'ronaldo', '$2y$10$MwBFx0yRdSJYuD71u13cOe2qwnBDgm/kcsDKJ2T3O/GZHiiuDqvAK', '', 1900000000, 1, 3, 'siiiiiiiiiiuuuuuuu', 4, 4),
(21, 'Seba', 'Salgadouuuuuu', 'Messi1234567', '$2y$10$T.JJtg1A5eSFmgKpI9rFRe/vfpCI6GqtnqwGiRThR622echLC6LiC', '', 0, 0, 0, 'Hola soy el autentico', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_usuario`, `id_pelicula`) VALUES
(36, 19, 9),
(37, 19, 15),
(38, 20, 4),
(39, 20, 15),
(40, 20, 13);

-- --------------------------------------------------------

--
-- Estructura para la vista `catalogo_copy`
--
DROP TABLE IF EXISTS `catalogo_copy`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `catalogo_copy`  AS SELECT `pelicula`.`id` AS `id`, `pelicula`.`nombre` AS `nombre`, `pelicula`.`genero` AS `genero`, `pelicula`.`descripcion` AS `descripcion`, `pelicula`.`ejemplares_disponibles` AS `ejemplares_disponibles`, `pelicula`.`ejemplares_totales` AS `ejemplares_totales`, `pelicula`.`target` AS `target`, `pelicula`.`duracion` AS `duracion`, `pelicula`.`precio` AS `precio`, `pelicula`.`reparto` AS `reparto`, `pelicula`.`calificacion_media_blockbusm` AS `calificacion_media_blockbusm`, `pelicula`.`veces_rentada` AS `veces_rentada`, `pelicula`.`calificacion_media_usmtomatoes` AS `calificacion_media_usmtomatoes`, `pelicula`.`nombre_imagen` AS `nombre_imagen` FROM `pelicula`;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arriendo`
--
ALTER TABLE `arriendo`
  ADD KEY `usuario_id_usuario_arriendo` (`id_usuario`),
  ADD KEY `pelicula_id_pelicula_arriendo` (`id_pelicula`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id_calificaciones`),
  ADD KEY `usuario_id_usuario_calificaciones` (`id_usuario`),
  ADD KEY `usuario_id_pelicula_calificaciones` (`id_pelicula`);

--
-- Indices de la tabla `fav_list`
--
ALTER TABLE `fav_list`
  ADD PRIMARY KEY (`id_fav_list`),
  ADD KEY `pelicula_id_pelicula_fav_list` (`id_pelicula`),
  ADD KEY `usuario_id_usuario_fav_list` (`id_usuario`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sigue_a`
--
ALTER TABLE `sigue_a`
  ADD KEY `usuario_id_sigue_a_sigue_a` (`id_sigue_a`),
  ADD KEY `usuario_id_usuario_sigue_a` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `usuario_id_usuario_wishlist` (`id_usuario`),
  ADD KEY `pelicula_id_pelicula_wishlist` (`id_pelicula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id_calificaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `fav_list`
--
ALTER TABLE `fav_list`
  MODIFY `id_fav_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `arriendo`
--
ALTER TABLE `arriendo`
  ADD CONSTRAINT `pelicula_id_pelicula_arriendo` FOREIGN KEY (`id_pelicula`) REFERENCES `pelicula` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_id_usuario_arriendo` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `usuario_id_pelicula_calificaciones` FOREIGN KEY (`id_pelicula`) REFERENCES `pelicula` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_id_usuario_calificaciones` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fav_list`
--
ALTER TABLE `fav_list`
  ADD CONSTRAINT `pelicula_id_pelicula_fav_list` FOREIGN KEY (`id_pelicula`) REFERENCES `pelicula` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_id_usuario_fav_list` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sigue_a`
--
ALTER TABLE `sigue_a`
  ADD CONSTRAINT `usuario_id_sigue_a_sigue_a` FOREIGN KEY (`id_sigue_a`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_id_usuario_sigue_a` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `pelicula_id_pelicula_wishlist` FOREIGN KEY (`id_pelicula`) REFERENCES `pelicula` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_id_usuario_wishlist` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
