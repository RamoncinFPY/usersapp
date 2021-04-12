-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2021 a las 12:32:10
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usersapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT 0,
  `registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `apellido`, `email`, `password`, `estatus`, `registro`, `actualizacion`) VALUES
(1, 'test1', 'test', 'uno', 'test@uno.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 0, '2021-04-07 09:57:33', '2021-04-07 09:57:33'),
(2, 'admin', 'test', 'uno', 'admin@admin.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 0, '2021-04-07 22:39:08', '2021-04-07 22:39:08'),
(3, 'aaaa', 'Annibal', 'Lecter', 'a@a.com', '61be55a8e2f6b4e172338bddf184d6dbee29c98853e0a0485ecee7f27b9af0b4', 0, '2021-04-08 13:06:14', '2021-04-10 17:13:09'),
(4, 'bbbb', 'b', 'b', 'b@b.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 0, '2021-04-08 13:31:36', '2021-04-08 13:31:36'),
(5, 'cccc', 'c', 'c', 'c@c.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 0, '2021-04-08 14:15:54', '2021-04-08 14:15:54'),
(6, 'dddd', 'Din', 'Dedín', 'd@d.com', '153c856430031f1b44a1633a8b2383717d1c96b03000f0b09872931e2565ff6c', 0, '2021-04-08 19:09:54', '2021-04-10 16:59:52'),
(7, 'eeee', 'e', 'e', 'e@e.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 0, '2021-04-09 08:41:43', '2021-04-09 08:41:43'),
(8, 'qqqq', 'Pequeña', 'Girl', 'q@q.com', 'f98204ba6963009734f0398a80f8e44f9d3ef74ebb9c49e5d4f000bd1c102d29', 0, '2021-04-10 17:33:42', '2021-04-12 10:03:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
