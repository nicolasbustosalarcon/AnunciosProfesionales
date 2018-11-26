-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2018 a las 05:58:58
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
  `imagen2` longblob,
  `imagen3` longblob,
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

INSERT INTO `anuncio` (`idanuncio`, `titulo`, `region`, `idcategoria`, `descripcion`, `estado`, `idusuario`, `imagen`, `imagen2`, `imagen3`, `precio`, `tipo_anuncio`, `comentario_secretaria`, `id_secretaria`, `fecha_publicacion`, `fecha_caducidad`) VALUES
(6, 'Balón Nike', '8', 1, 'Original                ', 4, 1, 0x3030312d343035312d3034345f646574616c6865312e6a7067, NULL, NULL, 9990, 1, NULL, 2, '2018-10-24', '2018-11-24'),
(7, 'Zapatos de Fútbol', '8', 1, 'Nike Originales, buen estado             ', 4, 1, 0x696d616765732e6a7067, NULL, NULL, 19990, 1, NULL, 2, '2018-10-14', '2018-11-24'),
(12, 'iPhone SE', '5', 4, 'iPhone SE 32GB Buen estado, todos sus accesorios           ', 4, 5, 0x6970686f6e652d73652d323031372e6a7067, NULL, NULL, 120000, 1, NULL, 2, '2018-10-25', '2018-11-24'),
(13, 'Notebook HP', '8', 2, 'Notebook HP NUEVO.                ', 4, 5, 0x6330353437353038302e706e67, NULL, NULL, 200000, 1, NULL, 2, '2018-10-25', '2018-11-24'),
(14, 'Monitor Samsung', '8', 2, 'Monitor Buen estado', 2, 5, 0x6d6f6e69746f722e6a7067, NULL, NULL, 70000, 1, NULL, NULL, NULL, NULL),
(15, 'Guantes Arquero', '8', 1, 'Guantes NIKE Nuevos                ', 4, 4, 0x6775616e7465732e6a7067, NULL, NULL, 14990, 1, NULL, 2, '2018-10-25', '2018-11-24'),
(16, 'Xiaomi Redmi 4A', '8', 4, 'Buen estado.             ', 4, 4, 0x7869616f6d692e6a706567, NULL, NULL, 60000, 1, NULL, 2, '2018-10-25', '2018-11-24'),
(17, 'Auto Usado', '8', 3, 'Auto Usado, papeles al día, precio conversable  ', 2, 4, 0x6175746f2e6a7067, NULL, NULL, 2900000, 1, NULL, NULL, NULL, NULL),
(18, 'iPhone 6S', '8', 4, 'iPhone 6s 16GB Buen estado               ', 4, 1, 0x6970686f6e6536735f706c757373706772795f312e6a7067, NULL, NULL, 160000, 1, NULL, 6, '2018-10-25', '2018-11-24'),
(19, 'Balon total 90 Nike', '8', 1, 'Producto nuevo, esta desinflado solamente, contactar via facebook.', 1, 1, 0x4e696b652d546f74616c39304165726f7757422e6a7067, 0x62616c6f6e2d6e696b652d746f74616c2d39302d667265657374796c652d6e756d65726f2d352d6e6976656c2d64652d656e7472656e616d69656e742d445f4e515f4e505f3738313537372d4d4c4d32373133333939393539365f3034323031382d462e6a7067, 0x494d4750313735395f726564696d656e73696f6e61722e6a7067, 9990, 1, NULL, 2, '2018-11-22', '2018-12-22'),
(20, 'marihuana', '8', 3, 'Sexo             ', 3, 1, 0x312e6a7067, 0x322e6a7067, 0x6d75736572322d313630783136302e6a7067, 123123, 1, NULL, NULL, NULL, NULL),
(21, 'PC Gamer', '8', 2, 'PC GAMER \r\nINTEL PENTIUM G4560                \r\n8GB RAM\r\nGTX 1050 TI 4GB', 1, 1, 0x494d475f303236392e4a5047, 0x34384336303444462d303539352d344532422d413736442d3341343841333442333038392e6a7067, NULL, 390000, 1, NULL, 2, '2018-11-26', '2018-12-26'),
(22, 'iPhone 6S', '8', 2, 'iPhone de 16gb , buen estado con 4 carcasas y cargador original              ', 1, 1, 0x373166324d2d487550344c2e5f534c313530305f2e6a7067, 0x6970686f6e652d36732d726f73652d676f6c642d363467622d757361646f2d696d70656361626c652d2d445f4e515f4e505f3536323132312d4d4c4132303731313133373632315f3035323031362d462e6a7067, NULL, 160000, 1, NULL, 2, '2018-11-26', '2018-12-26'),
(23, 'Notebook HP', '8', 2, 'Notebook HP Buen estado               ', 1, 5, 0x6e6f7465626f6f6b2d68702d6734322d34353062722d757361646f2d70657266696c2d6469722e6a7067, 0x7164616f697377386b65636270696c6b773676722e6a7067, 0x386263343730383431622e6a7067, 150000, 2, NULL, 6, '2018-11-26', '2018-12-06'),
(24, 'iPhone SE', '1', 2, 'iPhone SE 32gb buen estado', 1, 5, 0x245f32302e4a5047, 0x64657363617267612e6a7067, 0x6165396e377078697169706c73637135346e72642e6a7067, 120000, 1, NULL, 6, '2018-11-26', '2018-12-26'),
(25, 'Guantes Arquero', '8', 1, 'Guantes Arquero nuevos                ', 1, 4, 0x445f515f4e505f3735323231332d4d4c4d32363236373339323236315f3130323031372d512e6a7067, NULL, NULL, 14990, 2, NULL, 7, '2018-11-26', '2018-12-06'),
(26, 'Auto usado', '8', 3, 'Papeles al día           ', 1, 4, 0x323031393438363732392e6a7067, 0x323034393732303438362e6a7067, 0x323036373735303832322e6a7067, 4500000, 1, NULL, 7, '2018-11-26', '2018-12-26'),
(27, 'Marihuana', '8', 2, 'Planta mas unas semillas de marihuana', 0, 1, 0x66756d61722d6d6172696875616e612d6166656374612d67726176656d656e74652d616c2d65737065726d612d322d363535783336382e6a7067, 0x313533303032343334345f3336393434395f313533303230393139345f6e6f74696369615f6e6f726d616c2e6a7067, NULL, 30000, 1, 'Anuncio INAPROPIADO', 2, NULL, NULL),
(28, 'Chuteadores Nike', '16', 1, 'Nuevos, sin uso                ', 1, 8, 0x6e696b652d6d657263757269616c2d445f4e515f4e505f3738363531352d4d4c4332353235353639393531365f3132323031362d462e6a7067, NULL, NULL, 36990, 2, NULL, 2, '2018-11-26', '2018-12-06'),
(29, 'Notebook gamer Lenovo', '16', 2, 'Precio Conversable                ', 1, 8, 0x3431546f6a34754d6a614c2e5f534c3530305f41435f53533335305f2e6a7067, 0x4c656e6f766f2d4c6567696f6e2d593532302d6c6170746f702d3338302e706e67, 0x6148523063484d364c7939336433637562474677644739776257466e4c6d4e76625339706257466e5a584d76645842736232466b637938314d5445344c3263766247567562335a764c57786c5a326c76626931354e5449774c5735334c5763774d5335716347633d2e6a7067, 450000, 1, NULL, 2, '2018-11-26', '2018-12-26'),
(30, 'Marihuana Plantas', '16', 4, 'PLANTAS MAS SEMILLAS                ', 2, 8, 0x313533303032343334345f3336393434395f313533303230393139345f6e6f74696369615f6e6f726d616c2e6a7067, NULL, NULL, 45000, 2, NULL, NULL, NULL, NULL);

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
(26, 18, 2, 'www.instagram.com/Nicolás'),
(27, 19, 1, 'www.facebook.com/alkjdalks'),
(28, 19, 3, 'www.twitter.com&alkjflaks'),
(29, 20, 1, 'dasdasdas'),
(30, 20, 1, 'dasdasdas'),
(31, 21, 1, 'www.facebook.com/nicolasbustosalarcon'),
(32, 21, 2, 'www.instagram.com/nicolasbustos'),
(33, 22, 1, 'www.facebook.com/nicolasbustosalarcon'),
(34, 22, 2, 'www.instagram.com/nicolasbustos'),
(35, 23, 1, 'www.facebook.com/luisfuenzalida'),
(36, 23, 2, 'www.instagram.com/luisfuenzalida'),
(37, 24, 1, 'www.facebook.com/luisfuenzalida'),
(38, 24, 2, 'www.instagram.com/luisfuenzalida'),
(39, 25, 1, 'www.facebook.com/juanitoaravena'),
(40, 25, 2, 'www.instagram.com/juanitoaravena'),
(41, 26, 1, 'www.facebook.com/juanitoaravena'),
(42, 26, 2, 'www.instagram.com/juanitoaravena'),
(43, 27, 1, 'www.facebook.com/nicolasbustosalarcon'),
(44, 27, 2, 'www.instagram.com/nicolasbustos'),
(45, 28, 1, 'www.facebook.com/VanPersie'),
(46, 28, 3, 'www.twitter.com/vanpersie'),
(47, 29, 1, 'www.facebook.com/vanpersie'),
(48, 29, 3, 'www.twitter.com/vanpersie'),
(49, 30, 1, 'www.facebook.com/vanpersie'),
(50, 30, 2, 'www.instagram.com/vanpersie');

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
(1, 'Marihuana', 1),
(2, 'porno', 0),
(9, 'sexoxx', 0),
(10, 'sexo', 1),
(11, 'Pornografía', 1),
(12, 'Monitor', 0);

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
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `idmensaje` int(11) NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `id_usuario_envia` int(11) DEFAULT NULL,
  `id_usuario_recibe` int(11) DEFAULT NULL,
  `mensaje` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`idmensaje`, `id_anuncio`, `id_usuario_envia`, `id_usuario_recibe`, `mensaje`, `estado`) VALUES
(1, 18, 4, 1, 'Cuanto de uso tiene?', 2),
(3, 12, 5, 1, 'tiene 2 meses de uso', 2),
(4, 12, 1, 5, 'cuanto tiene de uso tu iphone?', 1),
(5, 21, 4, 1, 'Me interesa Bastante el PC, Cuanto tiene de uso?', 1),
(6, 28, 4, 8, 'que talla son los chuteadores?', 1);

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
('2014_10_12_100000_create_password_resets_table', 1),
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
(4, 'iPhone', 1),
(5, 'Zapatos', 2),
(6, 'Notebook', 1),
(7, 'PC Gamer', 1);

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

--
-- Volcado de datos para la tabla `tabla_like`
--

INSERT INTO `tabla_like` (`idlike`, `id_anuncio`, `id_usuario`, `estado`) VALUES
(1, 12, 1, 1),
(2, 19, 1, 0),
(3, 21, 5, 1),
(4, 22, 5, 2),
(5, 26, 1, 1),
(6, 21, 8, 1),
(7, 22, 8, 2),
(8, 24, 8, 1),
(9, 26, 8, 1),
(10, 19, 8, 2),
(11, 25, 8, 1),
(12, 23, 8, 2),
(13, 21, 4, 1),
(14, 22, 4, 1),
(15, 24, 4, 2),
(16, 29, 4, 1),
(17, 19, 4, 1),
(18, 28, 4, 1),
(19, 23, 4, 1),
(20, 29, 5, 1);

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
(1, 'Nicolás Bustos Alarcon', 'VII Maule', 'Linares', 'nicolasbustos1996@gmail.com', '$2y$10$Kpw7YlitpQTBIjjdt8jOf.2wUU684ojyxd9gSKQOydyTNQFQeDRfm', '77404443', 21, 0, '6IiEV9C4duXdZS6lU9RM1nOFYChSY9MSH1UAUFY10QF1v08ul6b3yHuIp1dp', '2018-07-02 21:19:11', '2018-11-26 02:56:12', 0),
(2, 'Secretaria1', 'VII Maule', 'Curico', 'secretaria1@gmail.com', '$2y$10$SPZ2yMeAjKGnT8CwtUebOO.7sWFvlRgdbLsSU/ngjxVN0mPGvL6Z2', '77889966', 22, 1, '2mDIBMgU708rHHrogQMw4lUqc9iOuD7aQnPqDNlN8H6WUM71tQjBrJ5nedCy', '2018-07-02 21:19:41', '2018-11-26 02:57:23', 0),
(3, 'admin', 'VII Maule', 'Linares', 'admin@gmail.com', '$2y$10$axb8xSJNrDyltKwVUHKJWemHgN4ZxeDGIafuQ.VRfQuPFs3vdnkQW', '78945612', 21, 2, '0MMCUugMdKqf3vfNBeAs4bHwvA98K0R8p7aJh1JcWJ4lPONsPKIVxro9LcgT', '2018-07-02 21:20:10', '2018-11-25 15:35:43', 0),
(4, 'Juan Aravena', 'VII Maule', 'Talca', 'juanion_chile@gmail.com', '$2y$10$dGUvbRJdIItXStx4qz4F0OxFY.ESISdPOQi4j5Ilg0Sr6n8/kPH06', '11223344', 22, 0, 'NNr84qeWueL29o3aIaKfyxUmcrk7y3oH1iAORXGSXhfe7DrgouvSvIhXoqyZ', '2018-10-25 17:02:01', '2018-11-26 02:46:43', 0),
(5, 'Luis Fuenzalida', 'VII Maule', 'Curicó', 'luisfuenzalidalizana@gmail.com', '$2y$10$Yvd0MNlLlBqdKT6YIyARLu6eWLlY8JQk1H0BbHB5PT0aoiENOAlqq', '88776655', 23, 0, 'y7wz0C0kCJCKaQdd8w9bSQ9Lacqq3aedt9PQtTJuiOLZNPvR8esxPUnkoQne', '2018-10-25 17:02:41', '2018-11-26 02:52:03', 0),
(6, 'Secretaria2', 'VII Maule', 'Linares', 'secretaria2@gmail.com', '$2y$10$W.pBNWT9Oi0IgbDFJRdVW.jbToFAVAl1l8Yy4NjZmpFJLsnHe8cqG', '1122334455', 22, 1, 'AHNARAMPRqpKchKPNyxyFJnDGCVMtq66PEStncwvNkR1M7knflzb2W8V9Bp3', '2018-10-25 17:03:51', '2018-11-26 02:25:29', 0),
(7, 'Secretaria3', 'VII Maule', 'Talca', 'secretaria3@gmail.com', '$2y$10$C/ITf3Wt7JZXxa1SgQOoZ.pW.K3PFvscWmSrSN.sbbqrmMICnoLEO', '77441188', 20, 1, 'i9kGGaBPWZ5YXeOE1ctCavkDK2HfZwC8bOoEPKrTvqQyQsUYxEVulPDa5snQ', '2018-10-25 17:04:33', '2018-11-26 02:30:02', 0),
(8, 'Van Persie', 'Region Metropolitana', 'Puente Alto', 'djk.tre@gmail.com', '$2y$10$Yvd0MNlLlBqdKT6YIyARLu6eWLlY8JQk1H0BbHB5PT0aoiENOAlqq', '88776655', 23, 0, 'qifOn782sFzNXvU0gtEuoS9fF0WUT726SrokvNzRwpaMzDFFBdWUdgvIC0Y8', '2018-10-25 17:02:41', '2018-11-26 02:44:45', 0);

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
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`idmensaje`);

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
  MODIFY `idanuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `anuncio_redsocial`
--
ALTER TABLE `anuncio_redsocial`
  MODIFY `id_anuncio_red` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `censura`
--
ALTER TABLE `censura`
  MODIFY `idpalabra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `diccionario_datos`
--
ALTER TABLE `diccionario_datos`
  MODIFY `id_palabra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `idmensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `palabras_buscadas`
--
ALTER TABLE `palabras_buscadas`
  MODIFY `idpalabra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `idlike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tipo_anuncios`
--
ALTER TABLE `tipo_anuncios`
  MODIFY `idtipo_anuncios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
