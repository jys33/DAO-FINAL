-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2019 a las 02:46:05
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dao`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event`
--

CREATE TABLE `event` (
  `id` int(10) UNSIGNED NOT NULL,
  `pet_id` int(10) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `event`
--

INSERT INTO `event` (`id`, `pet_id`, `date`, `type`, `remark`) VALUES
(1, 1, '1995-05-15', 'litter', '4 kittens, 3 female, 1 male'),
(2, 3, '1993-06-23', 'litter', '5 puppies, 2 female, 3 male'),
(3, 3, '1994-06-19', 'litter', '3 puppies, 3 female'),
(4, 6, '1999-03-21', 'vet', 'needed beak straightened'),
(5, 8, '1997-08-03', 'vet', 'broken rib'),
(6, 5, '1991-10-12', 'kennel', NULL),
(7, 4, '1991-10-12', 'kennel', NULL),
(8, 4, '1998-08-28', 'birthday', 'Gave him a new chew toy'),
(9, 2, '1998-03-17', 'birthday', 'Gave him a new flea collar'),
(10, 7, '1998-12-09', 'birthday', 'First birthday');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pet`
--

CREATE TABLE `pet` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `species` varchar(50) NOT NULL,
  `sex` char(1) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `death` date DEFAULT NULL,
  `deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pet`
--

INSERT INTO `pet` (`id`, `name`, `owner`, `species`, `sex`, `birth`, `death`, `deleted`, `reg_date`, `last_update`) VALUES
(1, 'Fluffy', 'Harold', 'cat', 'f', '1993-02-04', NULL, 0, '2019-03-29 19:55:00', '2019-03-29 23:00:10'),
(2, 'Claws', 'Gwen', 'cat', 'm', '1994-03-17', NULL, 0, '2019-03-29 19:55:00', '2019-03-29 23:00:10'),
(3, 'Buffy', 'Harold', 'dog', 'f', '1989-05-13', NULL, 0, '2019-03-29 19:55:00', '2019-03-29 23:00:10'),
(4, 'Fang', 'Benny', 'dog', 'm', '1990-08-27', NULL, 0, '2019-03-29 19:55:00', '2019-03-29 23:00:10'),
(5, 'Bowser', 'Diane', 'dog', 'm', '1979-08-31', '1995-07-29', 0, '2019-03-29 19:55:00', '2019-03-29 23:00:10'),
(6, 'Chirpy', 'Gwen', 'bird', 'f', '1998-09-11', NULL, 0, '2019-03-29 19:55:00', '2019-03-29 23:00:10'),
(7, 'Whistler', 'Gwen', 'bird', NULL, '1997-12-09', NULL, 0, '2019-03-29 19:55:00', '2019-03-29 23:00:10'),
(8, 'Slim', 'Benny', 'snake', 'm', '1996-04-29', NULL, 0, '2019-03-29 19:55:00', '2019-03-29 23:00:10'),
(9, 'Snowball', 'Lisa', 'cat', 'm', '2019-03-29', NULL, 0, '2019-03-29 19:55:00', '2019-03-29 22:42:08'),
(10, 'Puffball', 'Diane', 'hamster', 'f', '1999-03-30', NULL, 0, '2019-03-29 19:55:00', '2019-03-29 23:00:10'),
(11, 'Bongo', 'Homer J. Simpson', 'dog', 'm', '2017-03-03', NULL, 0, '2019-03-29 19:55:00', '2019-03-29 23:11:26'),
(12, 'Tenazas', 'Homer Jay Simpson', 'lobster', 'm', '2000-12-28', NULL, 1, '2019-03-29 23:05:34', '2019-03-29 23:41:01'),
(14, 'Santa\'s Little Helper', 'Bart', 'dog', 'm', '1983-05-12', NULL, 0, '2019-03-31 00:24:03', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` char(32) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `email`, `password`, `token`, `created`, `modified`) VALUES
(1, 'John', 'Doe', 'peluche@gmail.com', '$2y$10$hgiyPxLq4c92NHh7TmOxWOvGTnmJQ1ZIWlViFql58BRuQTY1.PWSO', NULL, '2019-07-16 21:37:57', '2019-07-16 21:37:57');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pet_id` (`pet_id`);

--
-- Indices de la tabla `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `event`
--
ALTER TABLE `event`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`pet_id`) REFERENCES `pet` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
