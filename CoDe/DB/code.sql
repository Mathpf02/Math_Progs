-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Dez-2022 às 14:16
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
-- Banco de dados: `code`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_code`
--

CREATE TABLE `cad_code` (
  `matricula` int(10) NOT NULL,
  `nome` text CHARACTER SET utf8 NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `curso` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `fone` bigint(20) DEFAULT NULL,
  `senha` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `f_perfil` varchar(2048) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cad_code`
--

INSERT INTO `cad_code` (`matricula`, `nome`, `email`, `curso`, `fone`, `senha`, `f_perfil`) VALUES
(2019322700, 'Matheus Fontoura', 'matheus.2019322700@aluno.iffar.edu.br', 'curso_info', 55992125069, '202cb962ac59075b964b07152d234b70', ''),
(2020316590, 'Matheus Martins Ciocca', 'matheus.2020316590@aluno.iffar.du.br', 'curso_info', 55984046607, '202cb962ac59075b964b07152d234b70', ''),
(2023000000, 'Leandro Dallanora', 'Leandro@gmail.com', 'curso_info', 5599999999, '202cb962ac59075b964b07152d234b70', ''),
(2024000000, 'Trabalho de Conclusão', 'matheus.fontoura017@gmail.com', '', 55999998888, '6aadc19cb15cf2c38c0b2aa5b43fd362', 'f2c9cfc6348f0071ac2f39fa72c1cedd.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emp_code`
--

CREATE TABLE `emp_code` (
  `id` int(11) NOT NULL,
  `disp_Tec` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `liber_Uti` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `f_documento` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `emp_code`
--

INSERT INTO `emp_code` (`id`, `disp_Tec`, `liber_Uti`, `f_documento`) VALUES
(1, 'on', 'on', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `res_code`
--

CREATE TABLE `res_code` (
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `dat_inspire` datetime DEFAULT NULL,
  `usado` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `res_code`
--

INSERT INTO `res_code` (`email`, `token`, `dat_inspire`, `usado`) VALUES
('matheus.2019322700@aluno.iffar.edu.br', '5e70d887fa4b8bd4a9d7030093ccfc017b7ced34c982c22f72617ab74df01dd51f44c5c490173a6b371fd26092b63a6f3008', '2022-12-08 18:54:36', 0),
('matheus.2019322700@aluno.iffar.edu.br', '5e70d887fa4b8bd4a9d7030093ccfc017b7ced34c982c22f72617ab74df01dd51f44c5c490173a6b371fd26092b63a6f3008', '2022-12-08 18:54:36', 0),
('matheus.2019322700@aluno.iffar.edu.br', '22cb0c97d48ff4eac335e8fd0e9457c039800d664fb8d27d75a57525825daab123a0ee17aafb06cf6ecada1b33165e2ec1ae', '2022-12-08 18:56:34', 0),
('matheus.2019322700@aluno.iffar.edu.br', '8648b3a3a8e4531578e02b86b3d4e9a91b54e0f0cfc0866a12ebf45cafd1b87e256d394b286f0e9edf920dcb9a164cec17a2', '2022-12-08 19:01:14', 0),
('matheus.2019322700@aluno.iffar.edu.br', '54fcc11705216e4c67215cd37019574d64988e451d9af2397e8ea15459d125bbab36cea7de3ca5dce8cb9aaa70dbe1cdc4b8', '2022-12-08 19:01:43', 0),
('matheus.2019322700@aluno.iffar.edu.br', '995e32f086b54256d927da322d73ce2e0fcb5e3eef95b5a7ddef3f071fa6f5d5886f1f05873e8be7aeff5d5845722a41cb49', '2022-12-08 19:07:35', 0),
('matheus.2019322700@aluno.iffar.edu.br', '4bf6c6152615163a31b03449301abbfc8d1444ee2f76069c4b2929cf5e7a132b513a282f7c554c744c2dfa355f5267a7e4be', '2022-12-08 19:11:20', 0),
('matheus.2019322700@aluno.iffar.edu.br', '18a7707a87f1ce7a4c659f1f7ffe6d8387acd50cb515e8e2c731ea6639da54fcb67f4fed4bbc35269d7dd82b141d2cc567ce', '2022-12-08 19:15:16', 0),
('matheus.2019322700@aluno.iffar.edu.br', '6c58465f1574dbcf4c42f99f8408cc856a862779fd309fbe5114afabc0c7820a31aa1a70c30063e2153fc410afb57fb8bb87', '2022-12-08 19:18:31', 0),
('matheus.2019322700@aluno.iffar.edu.br', '3fcbeb4dc7b2449d96f4cdc07a0bcb7c1167db459d05f92633521c1a2df741a29bb4a75e6e2d15e7136fb67cea5edf5ddd36', '2022-12-08 19:39:46', 1),
('matheus.fontoura017@gmail.com', 'c3db73b4e1f82a76845c4b6f72a3e03fbaab47fd93eae3de39c8f20881ebb90200fef7f7f57f944ae36c346edb980e89100a', '2022-12-09 12:21:22', 1);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `emp_code`
--
ALTER TABLE `emp_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
