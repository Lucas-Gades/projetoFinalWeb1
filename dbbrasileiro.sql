-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Abr-2021 às 02:15
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbbrasileiro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogador`
--

CREATE TABLE `jogador` (
  `idJogador` int(4) UNSIGNED ZEROFILL NOT NULL,
  `nome` varchar(30) NOT NULL,
  `idade` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `posicao` varchar(30) NOT NULL,
  `nacionalidade` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `idTime` int(4) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jogador`
--

INSERT INTO `jogador` (`idJogador`, `nome`, `idade`, `numero`, `posicao`, `nacionalidade`, `foto`, `idTime`) VALUES
(0003, 'Geromel', 35, 2, 'Zagueiro', 'Brasileiro', '978b8e0cac9fbfe19144d1006df84d2f.jpg', 0039),
(0004, 'Luan', 20, 7, 'Meia', 'Brasileiro', '3c7cd11981b91e1a304daddb349acd4f.png', 0039),
(0005, 'Cortes', 30, 8, 'Lateral', 'Brasileiro', '0f0e7fca98b36ac153ad1af487fe7cd8.jpg', 0039),
(0006, 'Luis Fabiana', 28, 9, 'Atacante', 'Brasileiro', '93916b5fbc3ff652e1aaee69eb0a0dcb.png', 0046),
(0007, 'Zidane', 50, 10, 'Meio campo', 'Frances', 'f3a13255d63c44c4711bbd6c98b1bb59.png', 0045),
(0008, 'tetetet', 56556, 21321321, 'eyeyeyeyey', 'uruururur', 'de3ee66b41c11b2d94a7204326a47a36.jpg', 0044);

-- --------------------------------------------------------

--
-- Estrutura da tabela `time`
--

CREATE TABLE `time` (
  `idTime` int(4) UNSIGNED ZEROFILL NOT NULL,
  `nomeTime` varchar(25) NOT NULL,
  `fotoTime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `time`
--

INSERT INTO `time` (`idTime`, `nomeTime`, `fotoTime`) VALUES
(0039, ' Gremio', '203f3ccf789be6ef9ea6a9e6c3c56f7b.png'),
(0044, ' Vasco', '2218b01fee8c897496ddbc31521d802f.png'),
(0045, 'Inter', '2cd198e3702d8911926cf114a1cfccc9.jpg'),
(0046, 'Atletico', '04eec22fe48351bd737e1ce1b9dde785.png'),
(0047, ' Fluminense', 'aaa46939f888265422a8a9ebb3a1cfef.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `jogador`
--
ALTER TABLE `jogador`
  ADD PRIMARY KEY (`idJogador`),
  ADD KEY `fkjogador` (`idTime`);

--
-- Índices para tabela `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`idTime`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `jogador`
--
ALTER TABLE `jogador`
  MODIFY `idJogador` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `time`
--
ALTER TABLE `time`
  MODIFY `idTime` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `jogador`
--
ALTER TABLE `jogador`
  ADD CONSTRAINT `fkjogador` FOREIGN KEY (`idTime`) REFERENCES `time` (`idTime`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
