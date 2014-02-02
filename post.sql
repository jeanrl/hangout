-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 02-Fev-2014 às 19:21
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `phpstart`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AUTOR` int(11) DEFAULT '0',
  `ANO` int(11) NOT NULL,
  `MES` int(11) NOT NULL,
  `LINK` varchar(200) NOT NULL,
  `TITULO` varchar(200) NOT NULL,
  `CONTEUDO` text NOT NULL,
  `DATA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Postagens do blog' AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`ID`, `AUTOR`, `ANO`, `MES`, `LINK`, `TITULO`, `CONTEUDO`, `DATA`) VALUES
(1, 0, 2014, 1, 'meu-primeiro-post-no-blog', 'Meu Primeiro Post no Blog', 'Este é o conteúdo da primeira postagem do blog.', '2014-02-02 14:48:08'),
(2, 0, 2014, 2, 'segundo-post-de-teste-no-blog', 'Segundo Post de Teste no Blog', 'Conteúdo do segundo post.', '2014-02-02 15:23:45');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
