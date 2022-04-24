-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24-Abr-2022 às 21:58
-- Versão do servidor: 5.7.36
-- versão do PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `curse`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
CREATE TABLE IF NOT EXISTS `disciplina` (
  `ndis` varchar(20) NOT NULL COMMENT 'numero disciplina',
  `dnome` varchar(30) NOT NULL COMMENT 'nome disciplina',
  `curso` varchar(20) NOT NULL COMMENT 'nome curso',
  PRIMARY KEY (`ndis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`ndis`, `dnome`, `curso`) VALUES
('0002', 'Comunicacao de Dados', 'Gestao e Programacao'),
('0001', 'Sistemas Digitais', 'Gestao e Programacao'),
('0003', 'Programacao Estruturada', 'Gestao e Programacao'),
('0004', 'Edicao bitmap', 'Multimedia'),
('0005', 'Edicao vetorial', 'Multimedia'),
('0006', 'Animacao avancada', 'Multimedia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estudante`
--

DROP TABLE IF EXISTS `estudante`;
CREATE TABLE IF NOT EXISTS `estudante` (
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `naluno` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nome` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `apelido` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sexo` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `idade` int(3) DEFAULT NULL,
  `tel` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ncurso` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estudante`
--

INSERT INTO `estudante` (`username`, `naluno`, `nome`, `apelido`, `sexo`, `idade`, `tel`, `ncurso`) VALUES
('10001', '172093', 'pedro', 'santos', 'Man', 13, '91999999', 'Gestao e Programacao'),
('10002', '172090', 'joao', 'nunes', 'Man', 0, '921234657', 'Gestao e Programacao'),
('10003', '172088', 'alexandre', 'garcia', 'Man', 0, '911234567', 'Multimedia'),
('10004', '172022', 'miguel', 'pereira', 'Man', 0, NULL, 'Multimedia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estudantedis`
--

DROP TABLE IF EXISTS `estudantedis`;
CREATE TABLE IF NOT EXISTS `estudantedis` (
  `naluno` varchar(20) NOT NULL,
  `ndis` varchar(20) NOT NULL,
  PRIMARY KEY (`naluno`,`ndis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estudantedis`
--

INSERT INTO `estudantedis` (`naluno`, `ndis`) VALUES
('172022', '0004'),
('172088', '0005'),
('172090', '0002'),
('172090', '0003'),
('172093', '0003');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

DROP TABLE IF EXISTS `professor`;
CREATE TABLE IF NOT EXISTS `professor` (
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nprof` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nome` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `apelido` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sexo` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `idade` int(3) DEFAULT NULL,
  `tel` int(20) DEFAULT NULL,
  `curso` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `dnome` varchar(30) DEFAULT NULL,
  `ndis` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`username`, `nprof`, `nome`, `apelido`, `sexo`, `idade`, `tel`, `curso`, `dnome`, `ndis`) VALUES
('20001', '170001', 'ana', 'manuel', 'Female', 55, 987678989, 'Gestao e Programacao', 'Comunicacao de Dados', '0001'),
('20002', '170002', 'carlos', 'paiva', 'Man', 26, 932654987, 'Gestao e Programacao', 'Sistemas Digitais', '0002'),
('20003', '170003', 'silvia', 'beraldo', 'Man', 22, 966547893, 'Gestao e Programacao', 'Programacao Estruturada', '0003'),
('20004', '170004', 'carlos', 'prado', 'Man', 38, 914569856, 'Multimedia', 'Edicao bitmap', '0004'),
('20005', '170005', 'joana', 'humberta', 'Female', 35, 918523698, 'Multimedia', 'Edicao vetorial', '0005'),
('20006', '170006', 'emilia', 'rosa', 'Female', 38, 967485963, 'Multimedia', '', '0006');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`username`, `password`, `role`) VALUES
('00000', '000000', 'admin'),
('10001', '123456', 'estudante'),
('10002', '123456', 'estudante'),
('10003', '123456', 'estudante'),
('10004', '123456', 'estudante'),
('20001', '123456', 'professor'),
('20002', '123456', 'professor'),
('20003', '123456', 'professor'),
('20004', '123456', 'professor'),
('20005', '123456', 'professor'),
('20006', '123456', 'professor');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
