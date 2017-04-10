-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Abr-2017 Ã s 22:23
-- VersÃ£o do servidor: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_chemistery`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE `arquivo` (
  `id` int(11) NOT NULL,
  `caminho` text,
  `extensao` varchar(10) NOT NULL,
  `nome_original` varchar(180) DEFAULT NULL,
  `ativado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atributo`
--

CREATE TABLE `atributo` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `nome` varchar(180) DEFAULT NULL,
  `tipo` varchar(180) DEFAULT NULL,
  `ativado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atributo`
--

INSERT INTO `atributo` (`id`, `categoria_id`, `nome`, `tipo`, `ativado`) VALUES
  (36, 10, 'lote', 'numero', 0),
  (37, 10, 'validade', 'data', 0),
  (38, 11, 'asdas', 'data', 1),
  (39, 11, 'dasdasd', 'data', 1),
  (40, 12, 'teste', 'texto', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `datacriacao` date DEFAULT NULL,
  `dataexclusao` date DEFAULT NULL,
  `ativado` tinyint(1) DEFAULT '1',
  `dataultimaalteracao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `datacriacao`, `dataexclusao`, `ativado`, `dataultimaalteracao`) VALUES
  (10, 'AlimentÃ­cio', '2017-02-24', '2017-04-10', 0, NULL),
  (11, 'dsadas', '2017-03-08', '2017-03-08', 0, NULL),
  (12, 'teste1', '2017-04-10', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cor`
--

CREATE TABLE `cor` (
  `id` int(11) NOT NULL,
  `valorHexadecimal` varchar(50) DEFAULT '#c11d0b'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cor`
--

INSERT INTO `cor` (`id`, `valorHexadecimal`) VALUES
  (1, '#7c21ef');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `idimagem` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `caminho` varchar(120) NOT NULL,
  `posicao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pergunta`
--

CREATE TABLE `pergunta` (
  `id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `datahora` datetime NOT NULL,
  `ativado` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pergunta`
--

INSERT INTO `pergunta` (`id`, `produto_id`, `usuario_id`, `descricao`, `status`, `datahora`, `ativado`) VALUES
  (1, 301, 1, 'Qual Ã© a cor do cÃ©u?', 'aberta', '2012-02-26 09:34:00', 1),
  (2, 305, 12, 'isso ÃƒÂ©  uma melancia?', '', '2017-04-10 19:02:23', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(148) NOT NULL,
  `descricao` text NOT NULL,
  `preco` float(10,2) NOT NULL DEFAULT '0.00',
  `ativado` tinyint(1) NOT NULL DEFAULT '1',
  `imagemprincipal` varchar(100) DEFAULT '../imagens/noimg.png',
  `categoria_id` int(11) NOT NULL,
  `datacriacao` date DEFAULT NULL,
  `dataexclusao` date DEFAULT NULL,
  `dataultimaalteracao` date DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `periculosidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `preco`, `ativado`, `imagemprincipal`, `categoria_id`, `datacriacao`, `dataexclusao`, `dataultimaalteracao`, `usuario_id`, `periculosidade`) VALUES
  (301, 'Arroz', 'dasuidhasuiasdh', 0.00, 1, '../imagens/mupload148795597758b068090718a.jpg', 10, '2017-02-24', NULL, NULL, 1, 0),
  (302, 'Colosso FC 30', 'Colosso PulverizaÃƒÂ§ÃƒÂ£o ÃƒÂ© um produto eficaz no combate de carrapatos, bernes, moscas, sarnas e piolhos.\r\n 	DETALHES DO PRODUTO	\r\n\r\nFÃƒÂ³rmula:\r\nCada 100 ml contÃƒÂ©m:\r\nCipermetrina......................................................... 15,0 g\r\nClorpirifÃƒÂ³s............................................................. 25,0 g\r\nCitronelal .............................................................. 1,0 g\r\nVeÃƒÂ­culo q.s.p. .................................................... 100,0 ml\r\n\r\nIndicaÃƒÂ§ÃƒÂµes:\r\nColosso PulverizaÃƒÂ§ÃƒÂ£o ÃƒÂ© um produto indicado para uso em pulverizaÃƒÂ§ÃƒÂµes ou banho de imersÃƒÂ£o, no combate aos seguintes ectoparasitas que acometem:\r\n\r\nBovinos:\r\nCarrapatos dos gÃƒÂªneros Boophilus microplus - adultos e imaturos.\r\nBernes, ou larvas de Dermatobia hominis.\r\nMoscas dos gÃƒÂªneros Stomoxys calcitrans, Musca domestica, Haematobia irritans - adultos. \r\nDermatobia hominis - adultos e larva.\r\nPiolhos dos gÃƒÂªneros Linognathus vituli, Haematopinus eurysternus, Damalina bovis, Solenopotes capillatus - adultos.\r\n\r\nSuÃƒÂ­nos:\r\nSarna do gÃƒÂªnero Sarcoptes scabiei var. suis - adultos.\r\nMoscas dos gÃƒÂªneros Stomoxys calcitrans, Musca domestica, Haematobia irritans - adultos. \r\nDermatobia hominis - adultos e larva.\r\n\r\nAviÃƒÂ¡rios: \r\nCascudinho Alphitobius diaperinus - adultos. \r\nPiolhos dos gÃƒÂªneros Columbicola spp, Cuclotogaster spp, Goniocotes spp, Goniodes spp, Holomenopon spp, Lipeurus spp, Menacanthus spp, Menopon spp - adultos.', 0.00, 1, '', 0, '2017-02-28', NULL, NULL, 11, 0),
  (303, 'Pimenta de fogo', 'Teste', 0.00, 1, '../imagens/mupload148833685658b637d83ab3b.jpg', 0, '2017-03-01', NULL, NULL, 10, 0),
  (304, 'TESTE', '<p>teste</p>', 0.00, 1, '../imagens/mupload149184082858ebaf3c43ac9.jpg', 10, '2017-04-10', NULL, NULL, 1, 0),
  (305, 'Toxics', '<p>teste</p>', 0.00, 1, '../imagens/mupload149184087958ebaf6f8e097.jpg', 12, '2017-04-10', NULL, NULL, 1, 0),
  (306, 'TestePer', '<p>periculosso</p>', 0.00, 1, '', 12, '2017-04-10', NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta`
--

CREATE TABLE `resposta` (
  `id` int(11) NOT NULL,
  `pergunta_id` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `datahora` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `resposta`
--

INSERT INTO `resposta` (`id`, `pergunta_id`, `descricao`, `datahora`, `usuario_id`) VALUES
  (1, 1, 'Esse e um teste', '2017-02-26 16:43:42', 1),
  (2, 1, 'fadfdfasdfasdf', '2017-02-28 20:29:22', 1),
  (4, 1, 'tste', '2017-02-28 22:41:30', 1),
  (5, 1, 'JONAS', '2017-02-28 22:51:44', 1),
  (7, 1, 'fafdada', '2017-02-28 22:59:16', 9),
  (8, 1, 'OPASKDAOSP', '2017-02-28 23:00:22', 11),
  (9, 1, 'fsdfsdfsdf', '2017-03-01 04:08:03', 1),
  (10, 1, 'adasdasdasd', '2017-03-01 04:08:56', 1),
  (11, 1, 'fdssdfsdfsd', '2017-03-01 04:09:34', 1),
  (12, 1, 'asdasdasd', '2017-03-01 04:13:03', 1),
  (13, 1, 'asdasdasdaaaaaaaaaaaaaa', '2017-03-01 04:13:19', 1),
  (14, 1, 'asdasdasd', '2017-03-01 04:42:55', 1),
  (15, 1, 'pamonha', '2017-03-01 04:43:01', 1),
  (16, 1, 'a', '2017-03-01 04:46:18', 1),
  (17, 1, 'Teste de desempenho', '2017-03-01 04:46:26', 1),
  (18, 1, 'Ola mundo', '2017-03-01 04:46:47', 1),
  (19, 1, 'a', '2017-03-01 04:47:39', 1),
  (20, 1, 'Jonas', '2017-03-01 04:51:04', 9),
  (21, 1, 'Pamonha', '2017-03-01 04:51:10', 9),
  (22, 1, 'Teste', '2017-03-01 04:53:08', 9),
  (23, 1, '53', '2017-03-01 04:54:15', 9),
  (24, 1, 'Jonas prefere ficar fora disso', '2017-03-02 15:43:48', 9),
  (25, 1, 'Iae brother', '2017-03-02 15:44:30', 1),
  (26, 1, 'Pra que fb?', '2017-03-02 15:44:38', 1),
  (27, 1, 'temos Chemisterios', '2017-03-02 15:44:42', 1),
  (28, 1, 'Que misterioso', '2017-03-02 15:53:57', 9),
  (29, 1, 'TchÃƒÅ ', '2017-03-02 15:54:00', 9),
  (30, 1, 'vamo fazer uma versÃƒÂ£o pro sul desse sistema', '2017-03-02 15:54:13', 9),
  (31, 1, 'TchÃƒÂª misterios', '2017-03-02 15:54:19', 9),
  (32, 1, 'PSOKPODKAPSO', '2017-03-02 16:06:47', 1),
  (33, 1, 'Ola mundo', '2017-03-02 19:42:58', 1),
  (34, 1, 'c', '2017-03-02 19:47:04', 1),
  (35, 1, 'a', '2017-03-02 20:05:13', 1),
  (36, 1, 'Teste ajax', '2017-03-02 20:17:46', 1),
  (37, 1, 'dasdasdsad', '2017-03-08 16:45:01', 1),
  (38, 1, 'wqeqweqwe', '2017-03-08 16:45:43', 1),
  (39, 1, 'AZULLL ', '2017-03-14 01:07:15', 1),
  (40, 1, 'NÃƒÂ£o nÃƒÂ£o sei', '2017-03-14 01:10:36', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `secao`
--

CREATE TABLE `secao` (
  `id` int(11) NOT NULL,
  `nome` varchar(180) DEFAULT NULL,
  `datacriacao` datetime DEFAULT NULL,
  `dataexclusao` datetime DEFAULT NULL,
  `dataultimaalteracao` datetime DEFAULT NULL,
  `ativado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `identificador` varchar(20) DEFAULT NULL,
  `arquivo_id` int(11) NOT NULL,
  `ativado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(148) NOT NULL,
  `email` varchar(158) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nivel` int(11) NOT NULL DEFAULT '1',
  `ativado` tinyint(1) NOT NULL DEFAULT '1',
  `imagem` text,
  `datacriacao` varchar(50) DEFAULT NULL,
  `dataexclusao` varchar(50) DEFAULT NULL,
  `dataultimaalteracao` varchar(50) DEFAULT NULL,
  `logado` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `login`, `senha`, `nivel`, `ativado`, `imagem`, `datacriacao`, `dataexclusao`, `dataultimaalteracao`, `logado`) VALUES
  (1, 'Admin', 'admin@chemistery.com', 'admin', 'admin', 3, 1, '../imagens/default-user-img.jpg', '2017-02-16', NULL, NULL, 1),
  (9, 'Juanes Adriano', 'juaneshtk50@gmail.com', 'juca', 'juca', 3, 1, '', NULL, NULL, NULL, 0),
  (10, 'Rodrigo Elias', 'rodrigoefr@gmail.com', 'rodrigo', 'rodrigo', 2, 1, '', '2017-02-25', NULL, NULL, 0),
  (11, 'Cinthia Falicio', 'cinthia.felicio@ifgoiano.edu.br', 'cinthia', 'cinthia', 2, 1, '', '2017-02-28', NULL, NULL, 0),
  (12, 'usero', 'usero@user.com', 'usero', 'usero', 1, 1, '../imagens/mupload148832677758b61079c1a1f.jpg', '2017-03-01', NULL, NULL, 0),
  (13, 'usero', 'usero@usero.com', 'usero', 'usero', 1, 1, '../imagens/mupload149184079858ebaf1e9c26c.jpg', '2017-04-10', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `valor_atributo`
--

CREATE TABLE `valor_atributo` (
  `id` int(11) NOT NULL,
  `valor` varchar(190) DEFAULT NULL,
  `produto_id` int(11) NOT NULL,
  `atributo_id` int(11) NOT NULL,
  `atributo_categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `valor_atributo`
--

INSERT INTO `valor_atributo` (`id`, `valor`, `produto_id`, `atributo_id`, `atributo_categoria_id`) VALUES
  (1, 'teste', 305, 40, 12),
  (2, 'prerigo', 306, 40, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arquivo`
--
ALTER TABLE `arquivo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atributo`
--
ALTER TABLE `atributo`
  ADD PRIMARY KEY (`id`,`categoria_id`),
  ADD KEY `fk_atributo_categoria1_idx` (`categoria_id`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cor`
--
ALTER TABLE `cor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`idimagem`,`produto_id`),
  ADD KEY `fk_imagem_produto1_idx` (`produto_id`);

--
-- Indexes for table `pergunta`
--
ALTER TABLE `pergunta`
  ADD PRIMARY KEY (`id`,`produto_id`,`usuario_id`),
  ADD KEY `fk_pergunta_produto1_idx` (`produto_id`),
  ADD KEY `fk_pergunta_usuario1_idx` (`usuario_id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`,`categoria_id`,`usuario_id`),
  ADD KEY `fk_produto_categoria1_idx` (`categoria_id`),
  ADD KEY `fk_produto_usuario1_idx` (`usuario_id`);

--
-- Indexes for table `resposta`
--
ALTER TABLE `resposta`
  ADD PRIMARY KEY (`id`,`pergunta_id`),
  ADD KEY `fk_resposta_pergunta1_idx` (`pergunta_id`),
  ADD KEY `fk_resposta_usuario1_idx` (`usuario_id`);

--
-- Indexes for table `secao`
--
ALTER TABLE `secao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`,`arquivo_id`),
  ADD KEY `fk_boletim_arquivo1_idx` (`arquivo_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `valor_atributo`
--
ALTER TABLE `valor_atributo`
  ADD PRIMARY KEY (`id`,`produto_id`,`atributo_id`,`atributo_categoria_id`),
  ADD KEY `fk_valor_atributo_produto1_idx` (`produto_id`),
  ADD KEY `fk_valor_atributo_atributo1_idx` (`atributo_id`,`atributo_categoria_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arquivo`
--
ALTER TABLE `arquivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `atributo`
--
ALTER TABLE `atributo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `cor`
--
ALTER TABLE `cor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `imagem`
--
ALTER TABLE `imagem`
  MODIFY `idimagem` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pergunta`
--
ALTER TABLE `pergunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;
--
-- AUTO_INCREMENT for table `resposta`
--
ALTER TABLE `resposta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `secao`
--
ALTER TABLE `secao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `valor_atributo`
--
ALTER TABLE `valor_atributo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `atributo`
--
ALTER TABLE `atributo`
  ADD CONSTRAINT `fk_atributo_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `fk_imagem_produto1` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pergunta`
--
ALTER TABLE `pergunta`
  ADD CONSTRAINT `fk_pergunta_produto1` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pergunta_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_produto_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `resposta`
--
ALTER TABLE `resposta`
  ADD CONSTRAINT `fk_resposta_pergunta1` FOREIGN KEY (`pergunta_id`) REFERENCES `pergunta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_resposta_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `fk_boletim_arquivo1` FOREIGN KEY (`arquivo_id`) REFERENCES `arquivo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
