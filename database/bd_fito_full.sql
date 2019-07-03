-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2019 at 05:15 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_fito`
--

-- --------------------------------------------------------

--
-- Table structure for table `colaboradores`
--

CREATE TABLE `colaboradores` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'Id único para identificar o colaborador.',
  `email` varchar(45) NOT NULL COMMENT 'Email do colaborador, deverá ser criado pelo administrador do programa.',
  `senha` varchar(45) NOT NULL COMMENT 'Senha do colaborador, a princípio é definida como o cpf do mesmo e depois pode ser alterada.',
  `cpf` varchar(15) NOT NULL COMMENT 'Cpf do usuário, pode ser utilizado para a busca do mesmo.',
  `nome` varchar(45) NOT NULL COMMENT 'Nome do colaborador.',
  `tipo` tinyint(1) NOT NULL COMMENT 'Define o tipo de usuário:\n1 - Administrador\n2 - Líder\n3 - Colaborador comum',
  `sexo` tinyint(1) NOT NULL COMMENT 'Determina o sexo do usuário:\n1 - Masculino\n2 - Feminino',
  `pontos` bigint(8) DEFAULT NULL COMMENT 'Números de pontos cumulativos do usuário, será usado para fazer o ranqueamento.',
  `creditos` bigint(8) DEFAULT NULL COMMENT 'Créditos do usuário, serão utilizados para a troca por itens na loja.',
  `status` tinyint(1) NOT NULL COMMENT 'Status do colaborador:\n0 - Ativo\n1 - Desativado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `colaboradores`
--

INSERT INTO `colaboradores` (`id`, `email`, `senha`, `cpf`, `nome`, `tipo`, `sexo`, `pontos`, `creditos`, `status`) VALUES
(0000000001, 'admin@email.com', '123', '111', 'Administrador', 1, 1, NULL, NULL, 0),
(0000000002, 'lider@email.com', '123', '222', 'Pedro Ennis', 2, 1, 0, 0, 0),
(0000000003, 'colaborador@email.com', '123', '333', 'Robin Rude', 3, 1, 0, 0, 1),
(0000000004, 'maisumcolaborador@email.com', '123', '444', 'Gabriel Amorinha', 3, 1, 0, 0, 0),
(0000000005, 'adriano@live.com', '123', '05073018540', 'Adriano', 1, 1, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'Id único para identificar o colaborador.', AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
