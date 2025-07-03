-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2025 a las 18:00:59
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tramitespalmira`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_i_area_01` (IN `xusu_id` INT)   BEGIN 
	DECLARE areaCount INT;
	
	SELECT COUNT(*) INTO areaCount FROM td_area_detalle WHERE usu_id = xusu_id;
	
	IF areaCount = 0 THEN
		INSERT INTO td_area_detalle(usu_id,area_id)
		SELECT xusu_id,area_id FROM tm_area WHERE est=1;
	ELSE
		INSERT INTO td_area_detalle(usu_id,area_id)
		SELECT xusu_id,area_id FROM tm_area WHERE est=1 AND area_id NOT IN (SELECT area_id FROM td_area_detalle WHERE usu_id = xusu_id);
	END IF;
	
	SELECT
	td_area_detalle.aread_id,
	td_area_detalle.area_id,
	td_area_detalle.aread_permi,
	tm_area.area_nom,
	tm_area.area_correo
	FROM td_area_detalle
	INNER JOIN tm_area ON tm_area.area_id = td_area_detalle.area_id
	WHERE 
	td_area_detalle.usu_id = xusu_id
	AND tm_area.est=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_i_rol_01` (IN `xrol_id` INT)   BEGIN 
	DECLARE rolCount INT;
	
	SELECT COUNT(*) INTO rolCount FROM td_menu_detalle WHERE rol_id = xrol_id;
	
	IF rolCount = 0 THEN
		INSERT INTO td_menu_detalle(rol_id,men_id)
		SELECT xrol_id,men_id FROM tm_menu WHERE est=1;
	ELSE
		INSERT INTO td_menu_detalle(rol_id,men_id)
		SELECT xrol_id,men_id FROM tm_menu WHERE est=1 AND men_id NOT IN (SELECT men_id FROM td_menu_detalle WHERE rol_id = xrol_id);
	END IF;
	
	SELECT
		td_menu_detalle.mend_id,
		td_menu_detalle.rol_id,
		td_menu_detalle.mend_permi,
		tm_menu.men_id,
		tm_menu.men_nom,
		tm_menu.men_nom_vista,
		tm_menu.men_icon,
		tm_menu.men_ruta
		FROM td_menu_detalle
		INNER JOIN tm_menu ON tm_menu.men_id = td_menu_detalle.men_id
		WHERE 
		td_menu_detalle.rol_id = xrol_id
		AND tm_menu.est=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_l_documento_01` (IN `xinhum_id` INT)   BEGIN
	SELECT
		tm_inhum.inhum_id,
		tm_inhum.area_id,
		tm_area.area_nom,
		tm_area.area_correo,
		tm_inhum.fech_crea,
		tm_inhum.inhum_nom,
		tm_inhum.inhum_papell,
		tm_inhum.inhum_sapell,
		tm_inhum.inhum_sex,
		tm_inhum.inhum_tip_doc,
		tm_inhum.inhum_num_doc,
		tm_inhum.inhum_mun_fall,
		tm_inhum.inhum_man_muert,
		tm_inhum.inhum_fecha_defun,
		tm_inhum.inhum_cert_defun,
		tm_inhum.inhum_fech_nac,
		tm_inhum.inhum_cem_crem,
		tm_inhum.inhum_nom_fun,
		tm_inhum.inhum_nom_real_tram,
		tm_inhum.tra_id,
		tm_tramite.tra_nom,
		tm_inhum.usu_id,
		tm_usuario.usu_nomape,
		tm_usuario.usu_correo,
		tm_inhum.doc_estado,
		tm_inhum.doc_respuesta,
		CONCAT(DATE_FORMAT(tm_inhum.fech_crea,'%Y'),'-',tm_tramite.tra_cod,'-',tm_inhum.inhum_id)
 		AS rdcdo 
		FROM tm_inhum
		INNER JOIN tm_area ON tm_inhum.area_id = tm_area.area_id
		INNER JOIN tm_tramite ON tm_inhum.tra_id = tm_tramite.tra_id
		INNER JOIN tm_usuario ON tm_inhum.usu_id = tm_usuario.usu_id
		LEFT JOIN (
			SELECT inhum_id,COUNT(*) AS cant
			FROM td_doc_inhumacion
			WHERE inhum_id = xinhum_id
			GROUP BY inhum_id
			) contador ON tm_inhum.inhum_id = contador.inhum_id
			WHERE tm_inhum.inhum_id = xinhum_id;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_l_documento_02` (IN `xusu_id` INT)   BEGIN
	SELECT
		tm_inhum.inhum_id,
		tm_inhum.area_id,
		tm_area.area_nom,
		tm_area.area_correo,
		tm_inhum.fech_crea,
		tm_inhum.inhum_nom,
		tm_inhum.inhum_papell,
		tm_inhum.inhum_sapell,
		tm_inhum.inhum_sex,
		tm_inhum.inhum_tip_doc,
		tm_inhum.inhum_num_doc,
		tm_inhum.inhum_mun_fall,
		tm_inhum.inhum_man_muert,
		tm_inhum.inhum_fecha_defun,
		tm_inhum.inhum_cert_defun,
		tm_inhum.inhum_fech_nac,
		tm_inhum.inhum_cem_crem,
		tm_inhum.inhum_nom_fun,
		tm_inhum.inhum_nom_real_tram,
		tm_inhum.tra_id,
		tm_tramite.tra_nom,
		tm_inhum.usu_id,
		tm_usuario.usu_nomape,
		tm_usuario.usu_correo,
		tm_inhum.doc_estado,
		CONCAT(DATE_FORMAT(tm_inhum.fech_crea,'%Y'),'-',tm_tramite.tra_cod,'-',tm_inhum.inhum_id)
 		AS rdcdo 
		FROM tm_inhum
		INNER JOIN tm_area ON tm_inhum.area_id = tm_area.area_id
		INNER JOIN tm_tramite ON tm_inhum.tra_id = tm_tramite.tra_id
		INNER JOIN tm_usuario ON tm_inhum.usu_id = tm_usuario.usu_id
		WHERE tm_inhum.usu_id = xusu_id;
	END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_area_detalle`
--

CREATE TABLE `td_area_detalle` (
  `aread_id` int(11) NOT NULL,
  `usu_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `aread_permi` varchar(2) DEFAULT 'No',
  `fech_crea` datetime DEFAULT current_timestamp(),
  `fech_modi` datetime DEFAULT NULL,
  `fech_elim` datetime DEFAULT NULL,
  `est` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `td_area_detalle`
--

INSERT INTO `td_area_detalle` (`aread_id`, `usu_id`, `area_id`, `aread_permi`, `fech_crea`, `fech_modi`, `fech_elim`, `est`) VALUES
(4, 89, 1, 'Si', '2025-06-23 19:02:27', '2025-06-24 18:59:58', NULL, 1),
(5, 89, 2, 'No', '2025-06-23 19:02:27', NULL, NULL, 1),
(6, 89, 6, 'No', '2025-06-23 19:02:27', '2025-06-23 19:33:18', NULL, 1),
(7, 89, 7, 'No', '2025-06-23 19:05:32', '2025-06-24 19:00:00', NULL, 1),
(8, 86, 1, 'Si', '2025-06-23 19:32:28', '2025-06-24 18:10:51', NULL, 1),
(9, 86, 2, 'No', '2025-06-23 19:32:28', '2025-06-24 18:10:50', NULL, 1),
(10, 86, 6, 'No', '2025-06-23 19:32:28', NULL, NULL, 1),
(11, 86, 7, 'No', '2025-06-23 19:32:28', NULL, NULL, 1),
(15, 2, 1, 'No', '2025-06-23 19:47:07', NULL, NULL, 1),
(16, 2, 2, 'Si', '2025-06-23 19:47:07', '2025-06-24 08:54:33', NULL, 1),
(17, 2, 6, 'No', '2025-06-23 19:47:07', '2025-06-24 08:54:32', NULL, 1),
(18, 2, 7, 'No', '2025-06-23 19:47:07', NULL, NULL, 1),
(19, 90, 1, 'No', '2025-06-24 15:12:48', NULL, NULL, 1),
(20, 90, 2, 'Si', '2025-06-24 15:12:48', '2025-06-24 15:12:54', NULL, 1),
(21, 90, 6, 'No', '2025-06-24 15:12:48', NULL, NULL, 1),
(22, 90, 7, 'No', '2025-06-24 15:12:48', NULL, NULL, 1),
(23, 91, 1, 'Si', '2025-06-24 19:15:33', '2025-06-24 19:15:37', NULL, 1),
(24, 91, 2, 'No', '2025-06-24 19:15:33', NULL, NULL, 1),
(25, 91, 6, 'No', '2025-06-24 19:15:33', NULL, NULL, 1),
(26, 91, 7, 'No', '2025-06-24 19:15:33', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_doc_inhumacion`
--

CREATE TABLE `td_doc_inhumacion` (
  `doc_id` int(11) NOT NULL,
  `inhum_id` int(11) DEFAULT NULL,
  `doc_nom` varchar(250) DEFAULT NULL,
  `usu_id` int(11) DEFAULT NULL,
  `det_tipo` varchar(50) DEFAULT NULL,
  `fech_crea` datetime DEFAULT current_timestamp(),
  `fech_modi` datetime DEFAULT NULL,
  `fech_elim` datetime DEFAULT NULL,
  `est` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `td_doc_inhumacion`
--

INSERT INTO `td_doc_inhumacion` (`doc_id`, `inhum_id`, `doc_nom`, `usu_id`, `det_tipo`, `fech_crea`, `fech_modi`, `fech_elim`, `est`) VALUES
(37, 42, 'El Regreso del Hijo del Hombre (1).pdf', 86, 'Pendiente', '2025-06-25 22:39:42', NULL, NULL, 1),
(38, 42, 'Laboratorio #1 - Solución.pdf', 86, 'Terminado', '2025-06-25 22:40:21', NULL, NULL, 1),
(39, 43, 'Laboratorio #1.pdf', 71, 'Pendiente', '2025-06-25 23:31:49', NULL, NULL, 1),
(40, 44, 'El Regreso del Hijo del Hombre.pdf', 86, 'Pendiente', '2025-06-25 23:46:14', NULL, NULL, 1),
(41, 44, 'Laboratorio #1 - Solución.pdf', 86, 'Terminado', '2025-06-25 23:47:06', NULL, NULL, 1),
(42, 43, 'Laboratorio #1 - Solución.pdf', 86, 'Terminado', '2025-06-25 23:50:03', NULL, NULL, 1),
(43, 45, 'Laboratorio #1.pdf', 71, 'Pendiente', '2025-06-26 00:18:01', NULL, NULL, 1),
(44, 45, 'Consultar Tramite.pdf', 86, 'Terminado', '2025-06-26 00:26:54', NULL, NULL, 1),
(45, 46, 'La vida cotidiana.pdf', 86, 'Pendiente', '2025-06-26 00:28:09', NULL, NULL, 1),
(46, 46, 'informe de actividades junio.pdf', 86, 'Terminado', '2025-06-26 00:29:04', NULL, NULL, 1),
(47, 47, '123.pdf', 71, 'Pendiente', '2025-06-26 12:01:09', NULL, NULL, 1),
(48, 47, '123.pdf', 86, 'Terminado', '2025-06-26 12:09:07', NULL, NULL, 1),
(49, 48, 'El_libro_de_Enoc.pdf', 71, 'Pendiente', '2025-06-27 10:54:52', NULL, NULL, 1),
(50, 48, 'evangelio-apocrifo-de-juan.pdf', 86, 'Terminado', '2025-06-27 10:57:40', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_menu_detalle`
--

CREATE TABLE `td_menu_detalle` (
  `mend_id` int(11) NOT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `men_id` int(11) DEFAULT NULL,
  `mend_permi` varchar(2) DEFAULT 'No',
  `fech_crea` datetime DEFAULT current_timestamp(),
  `fech_modi` datetime DEFAULT NULL,
  `fech_elim` datetime DEFAULT NULL,
  `est` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `td_menu_detalle`
--

INSERT INTO `td_menu_detalle` (`mend_id`, `rol_id`, `men_id`, `mend_permi`, `fech_crea`, `fech_modi`, `fech_elim`, `est`) VALUES
(1, 3, 1, 'Si', '2025-06-24 10:28:02', '2025-06-24 12:03:17', NULL, 1),
(2, 3, 2, 'Si', '2025-06-24 10:28:02', '2025-06-24 10:49:33', NULL, 1),
(3, 3, 3, 'Si', '2025-06-24 10:28:02', '2025-06-24 12:03:16', NULL, 1),
(4, 3, 4, 'Si', '2025-06-24 10:28:02', '2025-06-24 12:03:19', NULL, 1),
(5, 3, 5, 'Si', '2025-06-24 10:28:02', '2025-06-24 12:03:16', NULL, 1),
(6, 3, 6, 'Si', '2025-06-24 10:28:02', '2025-06-24 12:03:16', NULL, 1),
(7, 3, 7, 'Si', '2025-06-24 10:28:02', '2025-06-24 10:49:32', NULL, 1),
(8, 3, 8, 'Si', '2025-06-24 10:28:02', '2025-06-24 12:03:18', NULL, 1),
(9, 3, 9, 'Si', '2025-06-24 10:28:02', '2025-06-24 10:49:33', NULL, 1),
(16, 2, 1, 'No', '2025-06-24 10:42:53', NULL, NULL, 1),
(17, 2, 2, 'Si', '2025-06-24 10:42:53', '2025-06-24 18:54:29', NULL, 1),
(18, 2, 3, 'Si', '2025-06-24 10:42:53', '2025-06-24 19:16:44', NULL, 1),
(19, 2, 4, 'Si', '2025-06-24 10:42:53', '2025-06-24 10:49:47', NULL, 1),
(20, 2, 5, 'Si', '2025-06-24 10:42:53', '2025-06-24 10:49:45', NULL, 1),
(21, 2, 6, 'Si', '2025-06-24 10:42:53', '2025-06-24 10:49:43', NULL, 1),
(22, 2, 7, 'No', '2025-06-24 10:42:53', NULL, NULL, 1),
(23, 2, 8, 'No', '2025-06-24 10:42:53', NULL, NULL, 1),
(24, 2, 9, 'No', '2025-06-24 10:42:53', NULL, NULL, 1),
(31, 1, 1, 'Si', '2025-06-24 10:43:09', '2025-06-24 10:50:14', NULL, 1),
(32, 1, 2, 'Si', '2025-06-24 10:43:09', '2025-06-24 10:50:16', NULL, 1),
(33, 1, 3, 'Si', '2025-06-24 10:43:09', '2025-06-24 10:50:21', NULL, 1),
(34, 1, 4, 'No', '2025-06-24 10:43:09', NULL, NULL, 1),
(35, 1, 5, 'No', '2025-06-24 10:43:09', NULL, NULL, 1),
(36, 1, 6, 'Si', '2025-06-24 10:43:09', '2025-06-25 23:30:48', NULL, 1),
(37, 1, 7, 'No', '2025-06-24 10:43:09', NULL, NULL, 1),
(38, 1, 8, 'No', '2025-06-24 10:43:09', NULL, NULL, 1),
(39, 1, 9, 'No', '2025-06-24 10:43:09', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_area`
--

CREATE TABLE `tm_area` (
  `area_id` int(11) NOT NULL,
  `area_nom` varchar(50) NOT NULL,
  `area_correo` varchar(50) NOT NULL,
  `fech_crea` datetime DEFAULT current_timestamp(),
  `fech_modi` datetime DEFAULT NULL,
  `fech_elim` datetime DEFAULT NULL,
  `est` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_area`
--

INSERT INTO `tm_area` (`area_id`, `area_nom`, `area_correo`, `fech_crea`, `fech_modi`, `fech_elim`, `est`) VALUES
(1, 'SECRETARIA DE SALUD', 'cgux08@gmail.com', '2025-06-23 09:57:56', NULL, NULL, 1),
(2, 'SECRETARIA DE EDUCACION', '', '2025-06-23 09:57:51', '2025-06-23 10:36:34', NULL, 1),
(6, 'SECRETARIA DE PLANEACION', '', '2025-06-23 18:41:36', NULL, NULL, 1),
(7, 'SECRETARIA DE HACIENDA', 'test@test.com', '2025-06-23 19:05:21', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_inhum`
--

CREATE TABLE `tm_inhum` (
  `inhum_id` int(11) NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  `tra_id` int(11) DEFAULT NULL,
  `inhum_nom` varchar(250) DEFAULT NULL,
  `inhum_papell` varchar(200) DEFAULT NULL,
  `inhum_sapell` varchar(200) DEFAULT NULL,
  `inhum_sex` varchar(200) DEFAULT NULL,
  `inhum_tip_doc` varchar(200) DEFAULT NULL,
  `inhum_num_doc` varchar(50) DEFAULT NULL,
  `inhum_mun_fall` varchar(200) DEFAULT NULL,
  `inhum_man_muert` varchar(50) DEFAULT NULL,
  `inhum_fecha_defun` varchar(50) DEFAULT NULL,
  `inhum_cert_defun` varchar(200) DEFAULT NULL,
  `inhum_fech_nac` varchar(50) DEFAULT NULL,
  `inhum_cem_crem` varchar(200) DEFAULT NULL,
  `inhum_nom_fun` varchar(200) DEFAULT NULL,
  `inhum_nom_real_tram` varchar(200) DEFAULT NULL,
  `usu_id` int(11) DEFAULT NULL,
  `doc_estado` varchar(50) DEFAULT 'Pendiente',
  `doc_respuesta` varchar(500) DEFAULT NULL,
  `doc_usu_terminado` int(11) DEFAULT NULL,
  `fech_crea` datetime DEFAULT current_timestamp(),
  `fech_modi` datetime DEFAULT NULL,
  `fech_elim` datetime DEFAULT NULL,
  `fech_terminado` datetime DEFAULT NULL,
  `est` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_inhum`
--

INSERT INTO `tm_inhum` (`inhum_id`, `area_id`, `tra_id`, `inhum_nom`, `inhum_papell`, `inhum_sapell`, `inhum_sex`, `inhum_tip_doc`, `inhum_num_doc`, `inhum_mun_fall`, `inhum_man_muert`, `inhum_fecha_defun`, `inhum_cert_defun`, `inhum_fech_nac`, `inhum_cem_crem`, `inhum_nom_fun`, `inhum_nom_real_tram`, `usu_id`, `doc_estado`, `doc_respuesta`, `doc_usu_terminado`, `fech_crea`, `fech_modi`, `fech_elim`, `fech_terminado`, `est`) VALUES
(44, 1, 1, 'tyh', '343', 'we', 'Femenino', 'Documento Extranjero', '34', 'fdds', 'Natural', '2025-06-11', '3434', '2025-06-10', 'Unidad Crematoria Los Olivos', 'Casa Funerales El Prado', 'dsds', 86, 'Terminado', 'prueba 201', 86, '2025-06-25 23:46:13', NULL, NULL, '2025-06-25 23:47:06', 1),
(45, 1, 1, 'tr', 'dfsd', 'we', 'Masculino', 'Registro Civil', '8687', 'fdds', 'Natural', '2025-06-27', '8789', '2025-06-20', 'Cementerio de Potrerillo', 'Capillas de Velación Cristo Rey', 'dsds', 71, 'Terminado', '', 86, '2025-06-26 00:18:01', NULL, NULL, '2025-06-26 00:26:53', 1),
(46, 1, 1, 'tr', 'dfsd', 'we', 'Femenino', 'Registro Civil', '34234', 'fdds', 'Natural', '2025-06-06', '3443', '2025-06-05', 'Jardines Del Palmar', 'El Paraíso Salas de Velación', 'dsds', 86, 'Terminado', 'errrrrrrrrrrr', 86, '2025-06-26 00:28:09', NULL, NULL, '2025-06-26 00:29:03', 1),
(47, 1, 1, 'qwerty', 'dfsd', 'we', 'Femenino', 'Documento Extranjero', '123', 'fdds', 'Natural', '2025-06-18', '1234', '2025-06-12', 'Cementerio Católico Central', 'Funerales Villa de Paz Palmira', 'dsds', 71, 'Terminado', 'respuesta prueba', 86, '2025-06-26 12:01:08', NULL, NULL, '2025-06-26 12:09:07', 1),
(48, 1, 1, 'joselito', 'piangua', 'tuto', 'Masculino', 'Registro Civil', '23', 'palmira', 'Natural', '2025-06-27', '3', '2025-06-24', 'Getsemaní Cristo Rey', 'Funerales La María de Candelaria S.A.S', 'tuto', 71, 'Terminado', 'Su tramite fue exitoso', 86, '2025-06-27 10:54:52', NULL, NULL, '2025-06-27 10:57:40', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_menu`
--

CREATE TABLE `tm_menu` (
  `men_id` int(11) NOT NULL,
  `men_nom` varchar(200) DEFAULT NULL,
  `men_nom_vista` varchar(200) DEFAULT NULL,
  `men_icon` varchar(200) DEFAULT NULL,
  `men_ruta` varchar(200) DEFAULT NULL,
  `fech_crea` datetime DEFAULT current_timestamp(),
  `fech_modi` datetime DEFAULT NULL,
  `fech_elim` datetime DEFAULT NULL,
  `est` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_menu`
--

INSERT INTO `tm_menu` (`men_id`, `men_nom`, `men_nom_vista`, `men_icon`, `men_ruta`, `fech_crea`, `fech_modi`, `fech_elim`, `est`) VALUES
(1, 'home', 'Inicio', 'home', '../home', '2025-06-23 21:08:02', NULL, NULL, 1),
(2, 'nuevotramite', 'Nuevo Trámite', 'grid', '../NuevoTramite/inhumacion.php', '2025-06-23 21:11:17', NULL, NULL, 1),
(3, 'consultartramite', 'Consultar Trámites', 'users', '../ConsultarTramite/', '2025-06-23 21:13:25', NULL, NULL, 1),
(4, 'iniciocolaborador', 'Inicio Colaborador', 'home', '../homecolaborador/', '2025-06-23 21:15:26', NULL, NULL, 1),
(5, 'gestionartramite', 'Gestionar Trámites', 'grid', '../gestionartramite/', '2025-06-23 21:16:24', NULL, NULL, 1),
(6, 'buscartramite', 'Buscar Trámites', 'users', '../buscartramite/', '2025-06-23 21:17:20', NULL, NULL, 1),
(7, 'mntcolaborador', 'Mant. Colaborador', 'users', '../mntusuario/', '2025-06-23 21:24:58', NULL, NULL, 1),
(8, 'mntarea', 'Mant. Area', 'grid', '../mntarea/', '2025-06-23 21:26:37', NULL, NULL, 1),
(9, 'mntrol', 'Mant. Rol', 'users', '../mntrol/', '2025-06-23 21:27:10', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_rol`
--

CREATE TABLE `tm_rol` (
  `rol_id` int(11) NOT NULL,
  `rol_nom` varchar(50) DEFAULT NULL,
  `fech_crea` datetime DEFAULT current_timestamp(),
  `fech_modi` datetime DEFAULT NULL,
  `fech_elim` datetime DEFAULT NULL,
  `est` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_rol`
--

INSERT INTO `tm_rol` (`rol_id`, `rol_nom`, `fech_crea`, `fech_modi`, `fech_elim`, `est`) VALUES
(1, 'Persona', '2025-06-24 10:21:36', NULL, NULL, 1),
(2, 'Colaborador', '2025-06-24 10:21:50', NULL, NULL, 1),
(3, 'Administrador', '2025-06-24 10:22:02', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_tramite`
--

CREATE TABLE `tm_tramite` (
  `tra_id` int(11) NOT NULL,
  `tra_cod` varchar(50) DEFAULT '3521',
  `tra_nom` varchar(200) NOT NULL,
  `tra_area` varchar(200) NOT NULL,
  `fech_crea` datetime DEFAULT NULL,
  `fech_modi` datetime DEFAULT NULL,
  `fech_elim` datetime DEFAULT NULL,
  `est` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_tramite`
--

INSERT INTO `tm_tramite` (`tra_id`, `tra_cod`, `tra_nom`, `tra_area`, `fech_crea`, `fech_modi`, `fech_elim`, `est`) VALUES
(1, '3521', 'LICENCIA DE INHUMACIÓN DE CADAVERES', 'SECRETARIA DE SALUD', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_usuario`
--

CREATE TABLE `tm_usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_nomape` varchar(90) NOT NULL,
  `usu_nit` varchar(50) NOT NULL DEFAULT '',
  `usu_correo` varchar(50) NOT NULL,
  `usu_pass` varchar(200) DEFAULT NULL,
  `fech_crea` datetime NOT NULL DEFAULT current_timestamp(),
  `usu_img` varchar(500) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `fech_modi` datetime DEFAULT NULL,
  `fech_elim` datetime DEFAULT NULL,
  `fech_acti` datetime DEFAULT NULL,
  `est` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_usuario`
--

INSERT INTO `tm_usuario` (`usu_id`, `usu_nomape`, `usu_nit`, `usu_correo`, `usu_pass`, `fech_crea`, `usu_img`, `rol_id`, `fech_modi`, `fech_elim`, `fech_acti`, `est`) VALUES
(71, 'gus', '1234', 'contratistas.tecnologia@palmira.gov.co', 'yGBpm28zpm4pri673X0Y2zYMGO0rd+uoMf6GUpLoRUY=', '2025-06-08 12:50:32', '../../assets/picture/avatar.png', 1, NULL, NULL, '2025-06-09 10:17:41', 1),
(86, 'gustavo', '12345', 'cgux08@gmail.com', 'zmu+Kj336VTEfOKITG7wVNBfqVc3meVnzaG3Ep2Vplc=', '2025-06-22 16:50:26', '../../assets/picture/avatar.png', 3, NULL, NULL, '2025-06-22 16:51:27', 1),
(91, 'prueba', '', 'cgustavossj8@hotmail.com', 'VHpF7lI7Ju8urOdtgBzA0vQNExFfV7XvQS8XbUYcWDU=', '2025-06-24 19:01:40', '../../assets/picture/avatar.png', 2, '2025-06-24 19:15:41', NULL, NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `td_area_detalle`
--
ALTER TABLE `td_area_detalle`
  ADD PRIMARY KEY (`aread_id`);

--
-- Indices de la tabla `td_doc_inhumacion`
--
ALTER TABLE `td_doc_inhumacion`
  ADD PRIMARY KEY (`doc_id`) USING BTREE;

--
-- Indices de la tabla `td_menu_detalle`
--
ALTER TABLE `td_menu_detalle`
  ADD PRIMARY KEY (`mend_id`);

--
-- Indices de la tabla `tm_area`
--
ALTER TABLE `tm_area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indices de la tabla `tm_inhum`
--
ALTER TABLE `tm_inhum`
  ADD PRIMARY KEY (`inhum_id`);

--
-- Indices de la tabla `tm_menu`
--
ALTER TABLE `tm_menu`
  ADD PRIMARY KEY (`men_id`);

--
-- Indices de la tabla `tm_rol`
--
ALTER TABLE `tm_rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `tm_tramite`
--
ALTER TABLE `tm_tramite`
  ADD PRIMARY KEY (`tra_id`);

--
-- Indices de la tabla `tm_usuario`
--
ALTER TABLE `tm_usuario`
  ADD PRIMARY KEY (`usu_id`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `td_area_detalle`
--
ALTER TABLE `td_area_detalle`
  MODIFY `aread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `td_doc_inhumacion`
--
ALTER TABLE `td_doc_inhumacion`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `td_menu_detalle`
--
ALTER TABLE `td_menu_detalle`
  MODIFY `mend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `tm_area`
--
ALTER TABLE `tm_area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tm_inhum`
--
ALTER TABLE `tm_inhum`
  MODIFY `inhum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `tm_menu`
--
ALTER TABLE `tm_menu`
  MODIFY `men_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tm_rol`
--
ALTER TABLE `tm_rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tm_tramite`
--
ALTER TABLE `tm_tramite`
  MODIFY `tra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tm_usuario`
--
ALTER TABLE `tm_usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
