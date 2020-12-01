-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 10, 2020 at 09:29 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ocorrencia`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipamento`
--

CREATE TABLE IF NOT EXISTS `equipamento` (
  `idequipamento` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_idcliente` bigint(20) NOT NULL,
  `unidade` varchar(100) NOT NULL,
  `sala` varchar(100) DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  `patrimonio` varchar(20) DEFAULT NULL,
  `sistema` varchar(100) NOT NULL,
  `serial` varchar(30) DEFAULT NULL,
  `placamae` varchar(100) NOT NULL,
  `cpu` varchar(100) NOT NULL,
  `memoria` varchar(100) NOT NULL,
  `disco` varchar(100) NOT NULL,
  `lan_1` varchar(17) NOT NULL,
  `lan_2` varchar(17) DEFAULT NULL,
  `wlan` varchar(17) DEFAULT NULL,
  `mostra` char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (`idequipamento`),
  KEY `fk_equipamento_cliente_idx` (`cliente_idcliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `idlogin` bigint(20) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`idlogin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
