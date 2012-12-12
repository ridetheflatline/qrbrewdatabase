-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 12, 2012 at 10:26 PM
-- Server version: 5.1.61
-- PHP Version: 5.3.6-13ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `beer`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
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
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`batchNumber`, `batchName`, `batchCode`, `batchVolume`, `brewDate`) VALUES
(1, 'TestBrew', 'TB', 21.5, '2012-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `boilings`
--

CREATE TABLE IF NOT EXISTS `boilings` (
  `boilNumber` int(11) NOT NULL AUTO_INCREMENT,
  `batchNumber` int(11) NOT NULL,
  PRIMARY KEY (`boilNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bottles`
--

CREATE TABLE IF NOT EXISTS `bottles` (
  `bottleNumber` int(11) NOT NULL AUTO_INCREMENT,
  `bottlingNumber` int(11) NOT NULL,
  `bottleVolume` float NOT NULL DEFAULT '0.5',
  `bottleStatus` text NOT NULL,
  PRIMARY KEY (`bottleNumber`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bottles`
--

INSERT INTO `bottles` (`bottleNumber`, `bottlingNumber`, `bottleVolume`, `bottleStatus`) VALUES
(1, 1, 0.5, 'Printed'),
(2, 1, 0.5, 'Printed');

-- --------------------------------------------------------

--
-- Table structure for table `bottlings`
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
-- Dumping data for table `bottlings`
--

INSERT INTO `bottlings` (`bottlingNumber`, `bottlesUsed`, `bottledVolume`, `batchNumber`, `bottleDate`) VALUES
(1, 20, 10, 1, '2012-12-10'),
(2, 10, 5.5, 1, '2012-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `hoppings`
--

CREATE TABLE IF NOT EXISTS `hoppings` (
  `hopNumber` int(11) NOT NULL AUTO_INCREMENT,
  `hopType` text NOT NULL,
  `boilTime` int(11) NOT NULL,
  `hopMass` int(11) NOT NULL,
  `boilNumber` int(11) NOT NULL,
  PRIMARY KEY (`hopNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `keggings`
--

CREATE TABLE IF NOT EXISTS `keggings` (
  `keggingNumber` int(11) NOT NULL AUTO_INCREMENT,
  `kegUsed` text NOT NULL,
  `keggedVolume` float NOT NULL,
  `batchNumber` int(11) NOT NULL,
  `kegDate` date NOT NULL,
  PRIMARY KEY (`keggingNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `maltAdds`
--

CREATE TABLE IF NOT EXISTS `maltAdds` (
  `maltAddNumber` int(11) NOT NULL AUTO_INCREMENT,
  `mashNumber` int(11) NOT NULL,
  `maltType` text NOT NULL,
  `maltMass` int(11) NOT NULL,
  `mashTime` int(11) NOT NULL,
  PRIMARY KEY (`maltAddNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mashings`
--

CREATE TABLE IF NOT EXISTS `mashings` (
  `mashNumber` int(11) NOT NULL AUTO_INCREMENT,
  `batchNumber` int(11) NOT NULL,
  PRIMARY KEY (`mashNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mashStages`
--

CREATE TABLE IF NOT EXISTS `mashStages` (
  `mashStageNumber` int(11) NOT NULL AUTO_INCREMENT,
  `mashNumber` int(11) NOT NULL,
  `mashStage` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `temp` int(11) NOT NULL,
  PRIMARY KEY (`mashStageNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `scanLog`
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
-- Dumping data for table `scanLog`
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
