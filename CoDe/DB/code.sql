-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Dez-2022 às 00:14
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: code
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_code`
--

CREATE TABLE `cad_code` (
  `matricula` int(10) NOT NULL,
  `nome` text CHARACTER SET utf8 NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `curso` enum('INFO','ADM','MSI') CHARACTER SET utf8 DEFAULT NULL,
  `fone` int(12) DEFAULT NULL,
  `senha` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `f_perfil` varchar(2048) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cad_code`
--

INSERT INTO `cad_code` (`matricula`, `nome`, `email`, `curso`, `fone`, `senha`, `f_perfil`) VALUES
(2019000000, 'Matheus Fontoura', 'matheus.fontoura017@gmail.com', '', 2147483647, '1515151', ''),
(2019322700, 'Matheus Fontoura', 'matheus.2019322700', 'INFO', 2147483647, '151093mf', '[value-7]');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emp_code`
--

CREATE TABLE `emp_code` (
  `ID` int(11) NOT NULL,
  `Disp_Tec` enum('SIM','NÃO') CHARACTER SET utf8mb4 DEFAULT NULL,
  `Liber_Uti` enum('SIM','NÃO','N_POSSUO') CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `res_code`
--

CREATE TABLE `res_code` (
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `dat_inspire` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cad_code`
--
ALTER TABLE `cad_code`
  ADD PRIMARY KEY (`matricula`);

--
-- Índices para tabela `emp_code`
--
ALTER TABLE `emp_code`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `emp_code`
--
ALTER TABLE `emp_code`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
