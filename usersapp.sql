-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2021 a las 09:55:15
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
(2, 'admin', 'test', 'uno', 'admin@admin.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, '2021-04-07 22:39:08', '2021-04-07 22:39:08'),
(3, 'aaaa', 'Annibal', 'Lecter', 'a@a.com', '61be55a8e2f6b4e172338bddf184d6dbee29c98853e0a0485ecee7f27b9af0b4', 0, '2021-04-08 13:06:14', '2021-04-10 17:13:09'),
(4, 'bbbb', 'b', 'b', 'b@b.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, '2021-04-08 13:31:36', '2021-04-08 13:31:36'),
(5, 'cccc', 'c', 'c', 'c@c.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 0, '2021-04-08 14:15:54', '2021-04-08 14:15:54'),
(6, 'dddd', 'Din', 'Dedín', 'd@d.com', '153c856430031f1b44a1633a8b2383717d1c96b03000f0b09872931e2565ff6c', 1, '2021-04-08 19:09:54', '2021-04-10 16:59:52'),
(7, 'eeee', 'e', 'e', 'e@e.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, '2021-04-09 08:41:43', '2021-04-09 08:41:43'),
(8, 'qqqq', 'Pequeña', 'Girl', 'q@q.com', 'f98204ba6963009734f0398a80f8e44f9d3ef74ebb9c49e5d4f000bd1c102d29', 0, '2021-04-10 17:33:42', '2021-04-12 10:03:53'),
(10, 'test', '', '', '', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 0, '2021-04-13 10:27:02', '2021-04-13 10:27:02'),
(21, 'ffff', 'f', 'f', 'f@f.com', 'f29a448b780745bf2e10667f46c442b102e75e76a46a1fff969641866225ab56', 1, '2021-04-13 10:57:10', '2021-04-13 10:57:10'),
(22, 'gggg', 'g', 'g', 'g@g.com', '45d25abffe8c792d74d30346429b5bc244b815eeb378a9c38395f7a466cf6894', 1, '2021-04-13 12:36:02', '2021-04-13 12:36:02'),
(25, 'h', 'h', 'h', 'h@h.com', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, '2021-04-13 12:48:18', '2021-04-13 12:49:45'),
(26, 'iiii', 'i', 'i', 'i@i.com', '4706484582ca019815d7824470954fa03beef340e1335c66367923bab0f2f9c5', 1, '2021-04-13 12:56:39', '2021-04-13 12:56:39'),
(27, 'jjjj', 'j', 'j', 'j@j.com', 'a84bc6c9241b686477f363c02ffd4dd8765e38c47243010ffe64425a78bcb7f2', 1, '2021-04-13 12:58:56', '2021-04-13 12:58:56'),
(28, 'kkkk', 'k', 'k', 'k@k.com', '503afc4bd66d51aeda05cbcdbf07ad0d560d03fe0819f365629c48299e92b539', 1, '2021-04-13 13:01:58', '2021-04-13 13:01:58');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
