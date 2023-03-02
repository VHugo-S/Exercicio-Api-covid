-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02-Mar-2023 às 17:50
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `exercicio-api`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acesso`
--

DROP TABLE IF EXISTS `acesso`;
CREATE TABLE IF NOT EXISTS `acesso` (
  `id_acesso` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `pais` varchar(80) NOT NULL,
  PRIMARY KEY (`id_acesso`)
) ENGINE=MyISAM AUTO_INCREMENT=142 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acesso`
--

INSERT INTO `acesso` (`id_acesso`, `data`, `pais`) VALUES
(141, '2023-03-02 17:49:39', 'Canada'),
(140, '2023-03-02 17:49:33', 'Australia'),
(139, '2023-03-02 17:49:26', 'Brazil'),
(138, '2023-03-02 17:49:19', 'Australia'),
(137, '2023-03-02 17:49:11', 'Brazil'),
(133, '2023-03-02 17:39:20', 'Canada'),
(134, '2023-03-02 17:39:38', 'Canada'),
(135, '2023-03-02 17:40:18', 'Canada'),
(136, '2023-03-02 17:40:49', 'Canada');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
