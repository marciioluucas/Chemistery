-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06-Set-2016 às 21:26
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.5

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


CREATE TABLE `atributo` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `nome` varchar(180) DEFAULT NULL,
  `tipo` varchar(180) DEFAULT NULL,
  `ativado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `datacriacao` date DEFAULT NULL,
  `dataexclusao` date DEFAULT NULL,
  `ativado` tinyint(1) DEFAULT '1',
  `dataultimaalteracao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# CREATE TABLE `cliente` (
#   `id` int(11) NOT NULL,
#   `nome` varchar(180) DEFAULT NULL,
#   `descricao` text,
#   `tipo` varchar(20) NOT NULL,
#   `cpf_ou_cnpj` varchar(30) DEFAULT NULL,
#   `datacriacao` date DEFAULT NULL,
#   `dataultimaalteracao` date DEFAULT NULL,
#   `dataexclusao` date DEFAULT NULL,
#   `ativado` tinyint(1) DEFAULT '1'
# ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Extraindo dados da tabela `uploads`
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
insert into usuario (id,nome, email, login,senha,nivel,ativado,imagem,datacriacao)
VALUES (1,'Admin','admin@chemistery.com','admin','admin',5,1,'../imagens/default-user-img.jpg','2017-02-16') ;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `valor_atributo`
--
ALTER TABLE `valor_atributo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
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
