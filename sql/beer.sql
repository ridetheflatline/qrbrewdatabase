-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-12-2012 a las 22:49:26
-- Versión del servidor: 5.5.28
-- Versión de PHP: 5.4.6-1ubuntu1.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `beer`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `batches`
--

CREATE TABLE IF NOT EXISTS `batches` (
  `batchNumber` int(11) NOT NULL COMMENT 'The batch number',
  `batchName` text NOT NULL,
  `batchCode` text NOT NULL,
  `batchVolume` float NOT NULL,
  `brewDate` date NOT NULL,
  UNIQUE KEY `batchNumber` (`batchNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `batches`
--

INSERT INTO `batches` (`batchNumber`, `batchName`, `batchCode`, `batchVolume`, `brewDate`) VALUES
(1, 'TestBrew', 'TB', 21.5, '2012-12-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boilings`
--

CREATE TABLE IF NOT EXISTS `boilings` (
  `boilNumber` int(11) NOT NULL AUTO_INCREMENT,
  `batchNumber` int(11) NOT NULL,
  PRIMARY KEY (`boilNumber`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `boilings`
--

INSERT INTO `boilings` (`boilNumber`, `batchNumber`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bottles`
--

CREATE TABLE IF NOT EXISTS `bottles` (
  `bottleNumber` int(11) NOT NULL AUTO_INCREMENT,
  `bottlingNumber` int(11) NOT NULL,
  `bottleVolume` float NOT NULL DEFAULT '0.5',
  `bottleStatus` text NOT NULL,
  PRIMARY KEY (`bottleNumber`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `bottles`
--

INSERT INTO `bottles` (`bottleNumber`, `bottlingNumber`, `bottleVolume`, `bottleStatus`) VALUES
(1, 1, 0.5, 'Printed'),
(2, 1, 0.5, 'Printed');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bottlings`
--

CREATE TABLE IF NOT EXISTS `bottlings` (
  `bottlingNumber` int(11) NOT NULL AUTO_INCREMENT,
  `bottlesUsed` int(11) NOT NULL,
  `bottledVolume` float NOT NULL,
  `batchNumber` int(11) NOT NULL,
  `bottleDate` date NOT NULL,
  UNIQUE KEY `bottlingNumber` (`bottlingNumber`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `bottlings`
--

INSERT INTO `bottlings` (`bottlingNumber`, `bottlesUsed`, `bottledVolume`, `batchNumber`, `bottleDate`) VALUES
(1, 20, 10, 1, '2012-12-10'),
(2, 10, 5.5, 1, '2012-12-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoppings`
--

CREATE TABLE IF NOT EXISTS `hoppings` (
  `hopNumber` int(11) NOT NULL AUTO_INCREMENT,
  `hopType` text NOT NULL,
  `boilTime` int(11) NOT NULL,
  `hopMass` int(11) NOT NULL,
  `boilNumber` int(11) NOT NULL,
  PRIMARY KEY (`hopNumber`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `hoppings`
--

INSERT INTO `hoppings` (`hopNumber`, `hopType`, `boilTime`, `hopMass`, `boilNumber`) VALUES
(1, 'Styrian Golding', 60, 30, 1),
(2, 'Saaz', 15, 30, 1),
(3, 'Fuggles', 5, 25, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `keggings`
--

CREATE TABLE IF NOT EXISTS `keggings` (
  `keggingNumber` int(11) NOT NULL AUTO_INCREMENT,
  `kegUsed` text NOT NULL,
  `keggedVolume` float NOT NULL,
  `batchNumber` int(11) NOT NULL,
  `kegDate` date NOT NULL,
  PRIMARY KEY (`keggingNumber`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `keggings`
--

INSERT INTO `keggings` (`keggingNumber`, `kegUsed`, `keggedVolume`, `batchNumber`, `kegDate`) VALUES
(1, 'virtualTestKeg', 5, 1, '2012-12-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maltAdds`
--

CREATE TABLE IF NOT EXISTS `maltAdds` (
  `maltAddNumber` int(11) NOT NULL AUTO_INCREMENT,
  `mashNumber` int(11) NOT NULL,
  `maltType` text NOT NULL,
  `maltMass` float NOT NULL,
  `mashTime` int(11) NOT NULL,
  PRIMARY KEY (`maltAddNumber`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `maltAdds`
--

INSERT INTO `maltAdds` (`maltAddNumber`, `mashNumber`, `maltType`, `maltMass`, `mashTime`) VALUES
(1, 1, 'Brent kveitemalt.', 4.54, 60),
(2, 1, 'Spelt', 2, 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mashings`
--

CREATE TABLE IF NOT EXISTS `mashings` (
  `mashNumber` int(11) NOT NULL AUTO_INCREMENT,
  `batchNumber` int(11) NOT NULL,
  PRIMARY KEY (`mashNumber`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `mashings`
--

INSERT INTO `mashings` (`mashNumber`, `batchNumber`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mashStages`
--

CREATE TABLE IF NOT EXISTS `mashStages` (
  `mashStageNumber` int(11) NOT NULL AUTO_INCREMENT,
  `mashNumber` int(11) NOT NULL,
  `mashStage` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `temp` int(11) NOT NULL,
  PRIMARY KEY (`mashStageNumber`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `mashStages`
--

INSERT INTO `mashStages` (`mashStageNumber`, `mashNumber`, `mashStage`, `time`, `temp`) VALUES
(1, 1, 1, 60, 67);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scanLog`
--

CREATE TABLE IF NOT EXISTS `scanLog` (
  `scanNumber` int(11) NOT NULL AUTO_INCREMENT,
  `scanStatus` text NOT NULL,
  `scanTimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bottleNumber` int(11) NOT NULL,
  PRIMARY KEY (`scanNumber`),
  KEY `scanNumber` (`scanNumber`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `scanLog`
--

INSERT INTO `scanLog` (`scanNumber`, `scanStatus`, `scanTimeStamp`, `bottleNumber`) VALUES
(1, 'Stock', '2012-12-09 18:38:34', 1),
(2, 'Stock', '2012-12-09 18:40:28', 1),
(3, 'Printed', '2012-12-09 18:41:26', 1),
(4, 'In', '2012-12-09 19:00:46', 2),
(5, 'Out', '2012-12-09 19:00:46', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
