-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2018 a las 21:48:03
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_anunciosprofesionales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncio`
--

CREATE TABLE `anuncio` (
  `idanuncio` int(11) NOT NULL,
  `titulo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `region` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `imagen` longblob,
  `precio` int(11) DEFAULT NULL,
  `tipo_anuncio` int(11) DEFAULT NULL,
  `comentario_secretaria` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_secretaria` int(11) DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `fecha_caducidad` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `anuncio`
--

INSERT INTO `anuncio` (`idanuncio`, `titulo`, `region`, `idcategoria`, `descripcion`, `estado`, `idusuario`, `imagen`, `precio`, `tipo_anuncio`, `comentario_secretaria`, `id_secretaria`, `fecha_publicacion`, `fecha_caducidad`) VALUES
(6, 'Balón Nike', 8, 1, 'Original                ', 1, 1, 0x3030312d343035312d3034345f646574616c6865312e6a7067, 9990, 1, NULL, 2, '2018-10-24', '2018-11-24'),
(7, 'Zapatos de Fútbol', 8, 1, 'Nike Originales, buen estado             ', 1, 1, 0x696d616765732e6a7067, 19990, 1, NULL, 2, '2018-10-14', '2018-11-24'),
(12, 'iPhone SE', 5, 4, 'iPhone SE 32GB Buen estado, todos sus accesorios           ', 1, 5, 0x6970686f6e652d73652d323031372e6a7067, 120000, 1, NULL, 2, '2018-10-25', '2018-11-24'),
(13, 'Notebook HP', 8, 2, 'Notebook HP NUEVO.                ', 1, 5, 0x6330353437353038302e706e67, 200000, 1, NULL, 2, '2018-10-25', '2018-11-24'),
(14, 'Monitor Samsung', 8, 2, 'Monitor Buen estado', 2, 5, 0x6d6f6e69746f722e6a7067, 70000, 1, NULL, NULL, NULL, NULL),
(15, 'Guantes Arquero', 8, 1, 'Guantes NIKE Nuevos                ', 1, 4, 0x6775616e7465732e6a7067, 14990, 1, NULL, 2, '2018-10-25', '2018-11-24'),
(16, 'Xiaomi Redmi 4A', 8, 4, 'Buen estado.             ', 1, 4, 0x7869616f6d692e6a706567, 60000, 1, NULL, 2, '2018-10-25', '2018-11-24'),
(17, 'Auto Usado', 8, 3, 'Auto Usado, papeles al día, precio conversable  ', 2, 4, 0x6175746f2e6a7067, 2900000, 1, NULL, NULL, NULL, NULL),
(18, 'iPhone 6S', 8, 4, 'iPhone 6s 16GB Buen estado               ', 1, 1, 0x6970686f6e6536735f706c757373706772795f312e6a7067, 160000, 1, NULL, 6, '2018-10-25', '2018-11-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncio_redsocial`
--

CREATE TABLE `anuncio_redsocial` (
  `id_anuncio_red` int(11) NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `id_redsocial` int(11) NOT NULL,
  `red_social` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `anuncio_redsocial`
--

INSERT INTO `anuncio_redsocial` (`id_anuncio_red`, `id_anuncio`, `id_redsocial`, `red_social`) VALUES
(1, 6, 1, 'www.facebook.com/Nicolás'),
(2, 6, 2, 'www.instagram.com/Nicolás'),
(3, 7, 1, 'www.facebook.com/Nicolás'),
(4, 7, 2, 'www.instagram.com/Nicolás'),
(13, 12, 1, 'www.facebook.com/luis'),
(14, 12, 2, 'www.instagram.com/luis'),
(15, 13, 1, 'www.facebook.com/luis'),
(16, 13, 2, 'www.instagram.com/luis'),
(17, 14, 1, 'www.facebook.com/luis'),
(18, 14, 2, 'www.instagram.com/luis'),
(19, 15, 1, 'www.facebook.com/Juan'),
(20, 15, 2, 'www.instagram.com/Juan'),
(21, 16, 1, 'www.facebook.com/Juan'),
(22, 16, 2, 'www.instagram.com/Juan'),
(23, 17, 1, 'www.facebook.com/Juan'),
(24, 17, 2, 'www.instagram.com/Juan'),
(25, 18, 1, 'www.facebook.com/Nicolás'),
(26, 18, 2, 'www.instagram.com/Nicolás');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `condicion` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `condicion`) VALUES
(1, 'Deportes', 1),
(2, 'Tecnología', 1),
(3, 'Autos', 1),
(4, 'Celulares', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `censura`
--

CREATE TABLE `censura` (
  `idpalabra` int(11) NOT NULL,
  `palabra_censurada` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `censura`
--

INSERT INTO `censura` (`idpalabra`, `palabra_censurada`, `estado`) VALUES
(1, 'marihuana', 1),
(2, 'porno', 0),
(9, 'sexoxx', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diccionario_datos`
--

CREATE TABLE `diccionario_datos` (
  `id_palabra` int(11) NOT NULL,
  `palabra_censurada` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `palabras_buscadas`
--

CREATE TABLE `palabras_buscadas` (
  `idpalabra` int(11) NOT NULL,
  `palabra` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cantidad` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `palabras_buscadas`
--

INSERT INTO `palabras_buscadas` (`idpalabra`, `palabra`, `cantidad`) VALUES
(1, 'Venta', 1),
(4, 'iPhone', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `red_social`
--

CREATE TABLE `red_social` (
  `idred_social` int(11) NOT NULL,
  `nombre_red` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `red_social`
--

INSERT INTO `red_social` (`idred_social`, `nombre_red`, `estado`) VALUES
(1, 'Facebook', 1),
(2, 'Instagram', 1),
(3, 'Twitter', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE `region` (
  `idregion` int(11) NOT NULL,
  `nombre_region` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`idregion`, `nombre_region`, `estado`) VALUES
(1, 'Arica y Parinacota', 1),
(2, 'Tarapacá', 1),
(3, 'Antofagasta', 1),
(4, 'Atacama', 1),
(5, 'Coquimbo', 1),
(6, 'Valparaiso', 1),
(7, 'Libertador Bernardo O\'Higgins', 1),
(8, 'Maule', 1),
(9, 'Ñuble', 1),
(10, 'BioBío', 1),
(11, 'Araucanía', 1),
(12, 'Los Ríos', 1),
(13, 'Los Lagos', 1),
(14, 'Aisén', 1),
(15, 'Magallanes', 1),
(16, 'Metropolitana de Santiago', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_like`
--

CREATE TABLE `tabla_like` (
  `idlike` int(11) NOT NULL,
  `id_anuncio` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_anuncios`
--

CREATE TABLE `tipo_anuncios` (
  `idtipo_anuncios` int(11) NOT NULL,
  `nombre_tipo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `precio_anuncio` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `cantidad_dias` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_anuncios`
--

INSERT INTO `tipo_anuncios` (`idtipo_anuncios`, `nombre_tipo`, `precio_anuncio`, `estado`, `cantidad_dias`) VALUES
(1, 'Premium', 9990, 1, 30),
(2, 'Básico', 4990, 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion_region` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion_cuidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `direccion_region`, `direccion_cuidad`, `email`, `password`, `telefono`, `edad`, `tipo_usuario`, `remember_token`, `created_at`, `updated_at`, `estado`) VALUES
(1, 'Nicolás Bustos Alarcon', 'VII Maule', 'Linares', 'nicolasbustos1996@gmail.com', '$2y$10$Kpw7YlitpQTBIjjdt8jOf.2wUU684ojyxd9gSKQOydyTNQFQeDRfm', '77404443', 21, 0, 'hJcczSN7bO8FhiKi3BieXnCwfsd1hFfxdtntEwNZKLAMqNGHUXrnC07RMipB', '2018-07-02 21:19:11', '2018-10-25 17:44:29', 0),
(2, 'Secretaria1', 'VII Maule', 'Curico', 'secretaria1@gmail.com', '$2y$10$SPZ2yMeAjKGnT8CwtUebOO.7sWFvlRgdbLsSU/ngjxVN0mPGvL6Z2', '77889966', 22, 1, 'AOYYnVIFsdwTgNe2ySJj04AXBj52YBXphRk7ml51937evxShD0v4v5FUpKo4', '2018-07-02 21:19:41', '2018-10-25 17:40:56', 0),
(3, 'admin', 'VII Maule', 'Linares', 'admin@gmail.com', '$2y$10$axb8xSJNrDyltKwVUHKJWemHgN4ZxeDGIafuQ.VRfQuPFs3vdnkQW', '78945612', 21, 2, 'XNeRzY2VXmcdA8y0haGW5Mv7RaNkboMMVzR2Mxcxz2n1yqlccWbaFxJd8Bh8', '2018-07-02 21:20:10', '2018-10-25 17:45:03', 0),
(4, 'Juan Aravena', 'VII Maule', 'Talca', 'juanion_chile@gmail.com', '$2y$10$dGUvbRJdIItXStx4qz4F0OxFY.ESISdPOQi4j5Ilg0Sr6n8/kPH06', '11223344', 22, 0, 'yUA7hwoXamesjALttP1jVpxyDAb7WKFDJcik4KXInGPzccAUJ0lrMXP6WWYW', '2018-10-25 17:02:01', '2018-10-25 17:43:14', 0),
(5, 'Luis Fuenzalida', 'VII Maule', 'Curicó', 'luisfuenzalidalizana@gmail.com', '$2y$10$Yvd0MNlLlBqdKT6YIyARLu6eWLlY8JQk1H0BbHB5PT0aoiENOAlqq', '88776655', 23, 0, 'BpctAcfjUDrPUEqUUmjZsQG9sQqh1d1IINGKxRisnPTPyJZIyCt26Gu47JDF', '2018-10-25 17:02:41', '2018-10-25 17:33:23', 0),
(6, 'Secretaria2', 'VII Maule', 'Linares', 'secretaria2@gmail.com', '$2y$10$W.pBNWT9Oi0IgbDFJRdVW.jbToFAVAl1l8Yy4NjZmpFJLsnHe8cqG', '1122334455', 22, 1, 'Ez5X6J3KnBnablUqE00UBxLhq2AhfwIQoqto2RF76EPkUCqenfVp4kXCD7N7', '2018-10-25 17:03:51', '2018-10-25 17:40:20', 0),
(7, 'Secretaria3', 'VII Maule', 'Talca', 'secretaria3@gmail.com', '$2y$10$C/ITf3Wt7JZXxa1SgQOoZ.pW.K3PFvscWmSrSN.sbbqrmMICnoLEO', '77441188', 20, 1, NULL, '2018-10-25 17:04:33', '2018-10-25 17:04:33', 0),
(8, 'Van Persie', 'Region Metropolitana', 'Puente Alto', 'djk.tre@gmail.com', '$2y$10$Yvd0MNlLlBqdKT6YIyARLu6eWLlY8JQk1H0BbHB5PT0aoiENOAlqq', '88776655', 23, 0, 'BpctAcfjUDrPUEqUUmjZsQG9sQqh1d1IINGKxRisnPTPyJZIyCt26Gu47JDF', '2018-10-25 17:02:41', '2018-10-25 17:33:23', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `rut` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pass` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion_region` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion_comuna` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion_calle` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `edad` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anuncio`
--
ALTER TABLE `anuncio`
  ADD PRIMARY KEY (`idanuncio`),
  ADD KEY `fk_anuncio_categoria_idx` (`idcategoria`),
  ADD KEY `fk_anuncio_usuario_idx` (`idusuario`),
  ADD KEY `fk_anuncio_tipo_idx` (`tipo_anuncio`);

--
-- Indices de la tabla `anuncio_redsocial`
--
ALTER TABLE `anuncio_redsocial`
  ADD PRIMARY KEY (`id_anuncio_red`),
  ADD KEY `fk_red_idx` (`id_redsocial`),
  ADD KEY `fk_anuncio` (`id_anuncio`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `censura`
--
ALTER TABLE `censura`
  ADD PRIMARY KEY (`idpalabra`);

--
-- Indices de la tabla `diccionario_datos`
--
ALTER TABLE `diccionario_datos`
  ADD PRIMARY KEY (`id_palabra`);

--
-- Indices de la tabla `palabras_buscadas`
--
ALTER TABLE `palabras_buscadas`
  ADD PRIMARY KEY (`idpalabra`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `red_social`
--
ALTER TABLE `red_social`
  ADD PRIMARY KEY (`idred_social`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`idregion`);

--
-- Indices de la tabla `tabla_like`
--
ALTER TABLE `tabla_like`
  ADD PRIMARY KEY (`idlike`);

--
-- Indices de la tabla `tipo_anuncios`
--
ALTER TABLE `tipo_anuncios`
  ADD PRIMARY KEY (`idtipo_anuncios`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `rut_UNIQUE` (`rut`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anuncio`
--
ALTER TABLE `anuncio`
  MODIFY `idanuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `anuncio`
--
ALTER TABLE `tipo_anuncios`
  MODIFY `idtipo_anuncios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `anuncio_redsocial`
--
ALTER TABLE `anuncio_redsocial`
  MODIFY `id_anuncio_red` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `censura`
--
ALTER TABLE `censura`
  MODIFY `idpalabra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `diccionario_datos`
--
ALTER TABLE `diccionario_datos`
  MODIFY `id_palabra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `palabras_buscadas`
--
ALTER TABLE `palabras_buscadas`
  MODIFY `idpalabra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `red_social`
--
ALTER TABLE `red_social`
  MODIFY `idred_social` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `region`
--
ALTER TABLE `region`
  MODIFY `idregion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tabla_like`
--
ALTER TABLE `tabla_like`
  MODIFY `idlike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anuncio`
--
ALTER TABLE `anuncio`
  ADD CONSTRAINT `fk_anuncio_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_anuncio_tipo` FOREIGN KEY (`tipo_anuncio`) REFERENCES `tipo_anuncios` (`idtipo_anuncios`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `anuncio_redsocial`
--
ALTER TABLE `anuncio_redsocial`
  ADD CONSTRAINT `fk_anuncio` FOREIGN KEY (`id_anuncio`) REFERENCES `anuncio` (`idanuncio`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_red` FOREIGN KEY (`id_redsocial`) REFERENCES `red_social` (`idred_social`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
