-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/06/2019 às 03:01
-- Versão do servidor: 5.7.11-log
-- Versão do PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_fito`
--
CREATE DATABASE IF NOT EXISTS `bd_fito` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bd_fito`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `avatares`
--

CREATE TABLE `avatares` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'Id do avatar, utilizado para identificá-lo e fazer o link com o colaborador.',
  `imagem` varchar(45) NOT NULL COMMENT 'Url da imagem do avatar.',
  `colaboradores_id` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `avatares`
--

INSERT INTO `avatares` (`id`, `imagem`, `colaboradores_id`) VALUES
(0000000001, 'Checar se isso vai ser necessário.', 0000000003),
(0000000003, 'Checar se isso vai ser necessário(2).', 0000000002);

-- --------------------------------------------------------

--
-- Estrutura para tabela `avatares_has_itens`
--

CREATE TABLE `avatares_has_itens` (
  `avatares_id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'Estrangeira de avatares.',
  `itens_id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'Estrangeira de itens.',
  `status` tinyint(1) NOT NULL COMMENT 'Status do item, se ele está equipado ou não.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `avatares_has_itens`
--

INSERT INTO `avatares_has_itens` (`avatares_id`, `itens_id`, `status`) VALUES
(0000000001, 0000000002, 1),
(0000000001, 0000000003, 1),
(0000000001, 0000000004, 1),
(0000000001, 0000000005, 1),
(0000000001, 0000000006, 1),
(0000000001, 0000000007, 1),
(0000000001, 0000000008, 1),
(0000000001, 0000000009, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `campanhas`
--

CREATE TABLE `campanhas` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'Id único da campanha, utilizado para id identificá-la.',
  `nome` varchar(45) NOT NULL COMMENT 'Nome da campanha, utilizado para pesquisa.',
  `descricao` text NOT NULL COMMENT 'Descrição da campanha, utilizada para o entendimento do usuário.',
  `tipo` tinyint(1) NOT NULL COMMENT 'Utilizado para identificar o tipo da campanha:\n1 - Valor\n2 - Quantidade',
  `bonificacao` bigint(8) NOT NULL COMMENT 'Valor de pontos recebidos ao atingir determinada quantidade ou valor, por exemplo:\n1(bonificação) ponto a cada 10 reais.',
  `variante_pontos` bigint(8) NOT NULL COMMENT 'Variante que deve ser definida para gerar a bonificação do usuário no decorrer da campanha, por exemplo:\n1 ponto a cada 10 reais(variante de pontos).\n1 ponto a cada 1 item(variante de pontos).',
  `data_inicial` date NOT NULL COMMENT 'Data de início da campanha.',
  `data_final` date NOT NULL COMMENT 'Data de término da campanha.',
  `tipo_participantes` tinyint(1) NOT NULL COMMENT 'Utilizado para identificar o tipo de participantes da campanha:\n0 - Individual\n1 - Grupo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `campanhas`
--

INSERT INTO `campanhas` (`id`, `nome`, `descricao`, `tipo`, `bonificacao`, `variante_pontos`, `data_inicial`, `data_final`, `tipo_participantes`) VALUES
(0000000001, 'Campanha de teste 01', 'Esta é uma campanha de teste.', 1, 2, 50, '2019-05-09', '2019-12-31', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `colaboradores`
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
-- Fazendo dump de dados para tabela `colaboradores`
--

INSERT INTO `colaboradores` (`id`, `email`, `senha`, `cpf`, `nome`, `tipo`, `sexo`, `pontos`, `creditos`, `status`) VALUES
(0000000001, 'alexander_becker@estudante.sc.senai.br', '123', '83719976980', 'Administrador', 1, 1, 0, 0, 0),
(0000000002, 'alexander_becker@estudante.sc.senai.br', '123', '32254530992', 'Líder de Teste 01', 2, 1, 0, 0, 0),
(0000000003, 'alexander_becker@estudante.sc.senai.br', '123', '90010448918', 'Usuário de Teste 01', 3, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `colaboradores_has_campanhas`
--

CREATE TABLE `colaboradores_has_campanhas` (
  `colaboradores_id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'Estrangeira de colaboradores.',
  `campanhas_id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'Estrangeira de campanhas.',
  `pontos_desta_campanha` bigint(8) DEFAULT NULL COMMENT 'Pontos obtidos apenas nesta campanha, poderão ser utilizados para gerar um ranqueamento apenas desta campanha.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `colaboradores_has_campanhas`
--

INSERT INTO `colaboradores_has_campanhas` (`colaboradores_id`, `campanhas_id`, `pontos_desta_campanha`) VALUES
(0000000002, 0000000001, 0),
(0000000003, 0000000001, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `colaboradores_has_grupos`
--

CREATE TABLE `colaboradores_has_grupos` (
  `colaboradores_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `grupos_id` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `colaboradores_has_grupos`
--

INSERT INTO `colaboradores_has_grupos` (`colaboradores_id`, `grupos_id`) VALUES
(0000000002, 0000000001),
(0000000003, 0000000001);

-- --------------------------------------------------------

--
-- Estrutura para tabela `grupos`
--

CREATE TABLE `grupos` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'Id do grupo, utilizado para identificá-lo.',
  `nome` varchar(45) NOT NULL COMMENT 'Nome do grupo, utilizado para pesquisa e para os usuários identificá-lo. O nome deve ser único para não causar confusão.',
  `status` tinyint(1) NOT NULL COMMENT 'Status do grupo:\n0 - Ativo\n1 - Desativado',
  `descricao` text COMMENT 'Descrição do grupo.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `grupos`
--

INSERT INTO `grupos` (`id`, `nome`, `status`, `descricao`) VALUES
(0000000001, 'Grupo de teste 01', 0, 'Este é um grupo de teste.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens`
--

CREATE TABLE `itens` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'Id do item, utilizado para identificá-lo e fazer o link com o avatar.',
  `nome` varchar(45) NOT NULL COMMENT 'Nome do item, utilizado para pesquisa e identificação do mesmo pelo usuário.',
  `valor` bigint(8) NOT NULL COMMENT 'Valor do item que o usuário deverá pagar para liberá-lo. Este valor é definido pelo administrador.',
  `tipo` tinyint(1) NOT NULL COMMENT 'Tipo do item:\n1 - Item virtual\n2 - Item real',
  `status` tinyint(1) NOT NULL COMMENT 'Status do item:\n0 - Item bloqueado\n1 - Item desbloqueado (comprado)',
  `caminho` varchar(255) NOT NULL,
  `quantidade` bigint(8) DEFAULT NULL COMMENT 'Quantidade do item REAL disponível para compra. NÃO deve ser cadastrado para itens virtuais.',
  `slot` tinyint(1) DEFAULT NULL COMMENT 'Apenas para items que NÃO reais, para identificar onde devem ser equipados no avatar. Não pode ser nulo para itens de avatar.\n\n0 - Fundo\n1 - Corpo\n2 - Pés\n3 - Pernas\n4 - Torso\n5 - Cabelo\n6 - Acessórios de cabeça\n7 - Acessórios gerais'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `itens`
--

INSERT INTO `itens` (`id`, `nome`, `valor`, `tipo`, `status`, `caminho`, `quantidade`, `slot`) VALUES
(0000000001, 'Fundo de teste 01', 0, 1, 1, '..\\..\\images\\items\\background\\bg01.png', NULL, 0),
(0000000002, 'Corpo de teste 01', 0, 1, 1, '..\\..\\images\\items\\body\\body01.png', NULL, 1),
(0000000003, 'Sapatos de teste 01', 0, 1, 1, '..\\..\\images\\items\\feet\\feet01.png', NULL, 2),
(0000000004, 'Calças de teste 01', 0, 1, 1, '..\\..\\images\\items\\legs\\legs01.png', NULL, 3),
(0000000005, 'Camiseta de teste 01', 0, 1, 1, '..\\..\\images\\items\\torso\\torso01.png', NULL, 4),
(0000000006, 'Cabelo de teste 01', 0, 1, 1, '..\\..\\images\\items\\hair\\hair01.png', NULL, 5),
(0000000007, 'Acessório de cabeça de teste 01', 0, 1, 1, '..\\..\\images\\items\\headgear\\hg01.png', NULL, 6),
(0000000008, 'Acessório geral de teste 01', 0, 1, 1, '..\\..\\images\\items\\accessories\\acc01.png', NULL, 7),
(0000000009, 'Fundo de teste 02', 0, 1, 1, '..\\..\\images\\items\\background\\bg02.png', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `metas`
--

CREATE TABLE `metas` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'Id da meta, utilizado para identificá-la.',
  `nome` varchar(45) NOT NULL COMMENT 'Nome da meta utilizado para pesquisa e identificação.',
  `descricao` text NOT NULL COMMENT 'Descrição da meta, utilizado para os usuários entenderem o que devem fazer para cumpri-lá.',
  `pontos` bigint(8) NOT NULL COMMENT 'Pontos que o usuário recebe ao completar a campanha.',
  `campanhas_id` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `metas`
--

INSERT INTO `metas` (`id`, `nome`, `descricao`, `pontos`, `campanhas_id`) VALUES
(0000000001, 'Meta de teste 01', 'Esta é uma meta de teste.', 10, 0000000001),
(0000000002, 'Meta de teste 02', 'Esta é uma meta de teste.', 20, 0000000001);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `avatares`
--
ALTER TABLE `avatares`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `imagem_UNIQUE` (`imagem`),
  ADD KEY `fk_avatares_colaboradores1_idx` (`colaboradores_id`);

--
-- Índices de tabela `avatares_has_itens`
--
ALTER TABLE `avatares_has_itens`
  ADD PRIMARY KEY (`avatares_id`,`itens_id`),
  ADD KEY `fk_avatares_has_itens_itens1_idx` (`itens_id`),
  ADD KEY `fk_avatares_has_itens_avatares1_idx` (`avatares_id`);

--
-- Índices de tabela `campanhas`
--
ALTER TABLE `campanhas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Índices de tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`);

--
-- Índices de tabela `colaboradores_has_campanhas`
--
ALTER TABLE `colaboradores_has_campanhas`
  ADD PRIMARY KEY (`colaboradores_id`,`campanhas_id`),
  ADD KEY `fk_colaboradores_has_campanhas_campanhas1_idx` (`campanhas_id`),
  ADD KEY `fk_colaboradores_has_campanhas_colaboradores1_idx` (`colaboradores_id`);

--
-- Índices de tabela `colaboradores_has_grupos`
--
ALTER TABLE `colaboradores_has_grupos`
  ADD PRIMARY KEY (`colaboradores_id`,`grupos_id`),
  ADD KEY `fk_colaboradores_has_grupos_grupos1_idx` (`grupos_id`),
  ADD KEY `fk_colaboradores_has_grupos_colaboradores1_idx` (`colaboradores_id`);

--
-- Índices de tabela `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `nome_UNIQUE` (`nome`);

--
-- Índices de tabela `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Índices de tabela `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_metas_campanhas1_idx` (`campanhas_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `avatares`
--
ALTER TABLE `avatares`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'Id do avatar, utilizado para identificá-lo e fazer o link com o colaborador.', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `campanhas`
--
ALTER TABLE `campanhas`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'Id único da campanha, utilizado para id identificá-la.', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'Id único para identificar o colaborador.', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'Id do grupo, utilizado para identificá-lo.', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `itens`
--
ALTER TABLE `itens`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'Id do item, utilizado para identificá-lo e fazer o link com o avatar.', AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de tabela `metas`
--
ALTER TABLE `metas`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'Id da meta, utilizado para identificá-la.', AUTO_INCREMENT=3;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `avatares`
--
ALTER TABLE `avatares`
  ADD CONSTRAINT `fk_avatares_colaboradores1` FOREIGN KEY (`colaboradores_id`) REFERENCES `colaboradores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `avatares_has_itens`
--
ALTER TABLE `avatares_has_itens`
  ADD CONSTRAINT `fk_avatares_has_itens_avatares1` FOREIGN KEY (`avatares_id`) REFERENCES `avatares` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_avatares_has_itens_itens1` FOREIGN KEY (`itens_id`) REFERENCES `itens` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `colaboradores_has_campanhas`
--
ALTER TABLE `colaboradores_has_campanhas`
  ADD CONSTRAINT `fk_colaboradores_has_campanhas_campanhas1` FOREIGN KEY (`campanhas_id`) REFERENCES `campanhas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_colaboradores_has_campanhas_colaboradores1` FOREIGN KEY (`colaboradores_id`) REFERENCES `colaboradores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `colaboradores_has_grupos`
--
ALTER TABLE `colaboradores_has_grupos`
  ADD CONSTRAINT `fk_colaboradores_has_grupos_colaboradores1` FOREIGN KEY (`colaboradores_id`) REFERENCES `colaboradores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_colaboradores_has_grupos_grupos1` FOREIGN KEY (`grupos_id`) REFERENCES `grupos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `metas`
--
ALTER TABLE `metas`
  ADD CONSTRAINT `fk_metas_campanhas1` FOREIGN KEY (`campanhas_id`) REFERENCES `campanhas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
