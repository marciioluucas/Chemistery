-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20-Mar-2017 às 18:36
-- Versão do servidor: 10.1.19-MariaDB
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
(36, 10, 'testeatr', 'texto', 1);

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
(10, 'Teste', '2017-03-20', NULL, 1, NULL);

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
(1, '#ef2323');

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
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(148) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` text NOT NULL,
  `preco` float(10,2) NOT NULL DEFAULT '0.00',
  `toxidade` int(11) NOT NULL DEFAULT '0',
  `ativado` tinyint(1) NOT NULL DEFAULT '1',
  `imagemprincipal` varchar(100) DEFAULT '../imagens/noimg.png',
  `mostrapreco` tinyint(1) NOT NULL DEFAULT '0',
  `categoria_id` int(11) NOT NULL,
  `secao_id` int(11) NOT NULL,
  `datacriacao` date DEFAULT NULL,
  `dataexclusao` date DEFAULT NULL,
  `dataultimaalteracao` date DEFAULT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `imagem`, `preco`, `toxidade`, `ativado`, `imagemprincipal`, `mostrapreco`, `categoria_id`, `secao_id`, `datacriacao`, `dataexclusao`, `dataultimaalteracao`, `usuario_id`) VALUES
(301, 'RoxÃ©rio', '<p><strong>this rox&eacute;rio is very impressive waw</strong></p>', '', 0.00, 0, 1, '../imagens/mupload149002704058d00220083de.jpg', 0, 10, 0, '2017-03-20', NULL, NULL, 1),
(302, 'XANAINA', '<p>OWW OW AOWWW</p>', '', 0.00, 0, 1, '../imagens/mupload149002729858d0032288fad.jpg', 0, 10, 0, '2017-03-20', NULL, NULL, 1),
(303, 'XANAINA', '<p>OWW OW AOWWW</p>', '', 0.00, 0, 1, '../imagens/mupload149002759258d004484f335.jpg', 0, 10, 0, '2017-03-20', NULL, NULL, 1),
(304, 'Xubiraci', '<p>JABIRACA GOSTOSA N&Eacute;? TOMO NELA</p>', '', 0.00, 0, 1, '../imagens/mupload149002764058d0047851f90.jpg', 0, 10, 0, '2017-03-20', NULL, NULL, 1),
(305, 'Corote pesado', '<p>CANYNHA DA ROSSA</p>', '', 0.00, 0, 1, '../imagens/mupload149002767158d00497a2b47.jpg', 0, 10, 0, '2017-03-20', NULL, NULL, 1),
(306, 'Ronnie', '<p>EU SEI QUE SIM</p>', '', 0.00, 0, 1, '../imagens/mupload149003110958d0120512308.jpg', 0, 10, 0, '2017-03-20', NULL, '2017-03-20', 1),
(307, 'FÃ CRY', '<p>XORA NENE</p>', '', 0.00, 0, 1, '../imagens/mupload149002774758d004e3ccf0d.jpg', 0, 10, 0, '2017-03-20', NULL, NULL, 1),
(308, 'OnÃ§a CAVALETE', '<p>AAAAAAAAAAAAAAAAAAAAAAAAA(GRITOS DE DOR)</p>', '', 0.00, 0, 1, '../imagens/mupload149002778258d00506af332.jpg', 0, 10, 0, '2017-03-20', NULL, NULL, 1),
(309, 'Mandioca mÃ¡gica enjoada', '<p>vomito de deusa</p>', '', 0.00, 0, 1, '../imagens/mupload149002874158d008c50442b.jpg', 0, 10, 0, '2017-03-20', NULL, NULL, 1),
(310, 'Very happy doggo', '<p>at very fast hapiness</p>', '', 0.00, 0, 1, '../imagens/mupload149003088858d011282c492.jpg', 0, 10, 0, '2017-03-20', NULL, NULL, 1),
(311, 'Maybeeeeee', '<p>Saves meeeeeeee</p>', '', 0.00, 0, 1, '../imagens/mupload149003094158d0115d6ab14.jpg', 0, 10, 0, '2017-03-20', NULL, NULL, 1),
(312, 'Drogas? me vÃª 5', '<p>cinquin &nbsp;de bagui</p>', '', 0.00, 0, 1, '../imagens/mupload149003098958d0118d3b96f.jpg', 0, 10, 0, '2017-03-20', NULL, NULL, 1),
(313, 'specular doggo', '<p>suspect</p>', '', 0.00, 0, 1, '../imagens/mupload149003103758d011bde7895.jpg', 0, 10, 0, '2017-03-20', NULL, NULL, 1);

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
  `nome` varchar(148) DEFAULT NULL,
  `email` varchar(158) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `nivel` int(11) DEFAULT '1',
  `ativado` tinyint(1) DEFAULT '1',
  `imagem` text,
  `datacriacao` varchar(50) DEFAULT NULL,
  `dataexclusao` varchar(50) DEFAULT NULL,
  `dataultimaalteracao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `login`, `senha`, `nivel`, `ativado`, `imagem`, `datacriacao`, `dataexclusao`, `dataultimaalteracao`) VALUES
(1, 'Admin', 'admin@chemistery.com', 'admin', 'admin', 5, 1, '../imagens/default-user-img.jpg', '2017-02-16', NULL, NULL),
(9, 'usero', 'usero@user.com', 'usero', 'usero', 1, 1, '', '2017-03-20', NULL, NULL),
(10, 'modero', 'modero@mod.com', 'modero', 'modero', 1, 1, '', '2017-03-20', NULL, NULL);

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
(143, 'ROXÃ‰RIo!', 301, 36, 10),
(144, 'senta o boga na linguica', 302, 36, 10),
(145, 'senta o boga na linguica', 303, 36, 10),
(146, 'TOMO NELA', 304, 36, 10),
(147, 'ARCO CARAI', 305, 36, 10),
(148, 'ROnnu', 306, 36, 10),
(149, 'BUA', 307, 36, 10),
(150, 'dor.', 308, 36, 10),
(151, 'ew eco nasty nojuento', 309, 36, 10),
(152, 'bork ', 310, 36, 10),
(153, 'UONDÃŠ UÃ“', 311, 36, 10),
(154, '5', 312, 36, 10),
(155, 'wa', 313, 36, 10);

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
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`,`categoria_id`,`secao_id`,`usuario_id`),
  ADD KEY `fk_produto_categoria1_idx` (`categoria_id`),
  ADD KEY `fk_produto_secao1_idx` (`secao_id`),
  ADD KEY `fk_produto_usuario1_idx` (`usuario_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `atributo`
--
ALTER TABLE `atributo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `cor`
--
ALTER TABLE `cor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `imagem`
--
ALTER TABLE `imagem`
  MODIFY `idimagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;
--
-- AUTO_INCREMENT for table `secao`
--
ALTER TABLE `secao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `valor_atributo`
--
ALTER TABLE `valor_atributo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
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
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_produto_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `fk_boletim_arquivo1` FOREIGN KEY (`arquivo_id`) REFERENCES `arquivo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
