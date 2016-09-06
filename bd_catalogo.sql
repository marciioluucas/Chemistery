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
-- Database: `bd_catalogo`
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

--
-- Extraindo dados da tabela `arquivo`
--

INSERT INTO `arquivo` (`id`, `caminho`, `extensao`, `nome_original`, `ativado`) VALUES
(14, '../arquivos/mupload1466793213576d7cfda9100.pdf', 'pdf', 'D:xampp	mpphp52BF.tmp', 1),
(15, '../arquivos/mupload1466793325576d7d6d9ad5e.pdf', 'pdf', 'Atividades Banco de dados - MÃ¡rcio Lucas.pdf', 1),
(16, '../arquivos/mupload1466793385576d7da922f78.pdf', 'pdf', 'Atividades Banco de dados - MÃ¡rcio Lucas.pdf', 1),
(17, '../arquivos/mupload1466793440576d7de036b9a.pdf', 'pdf', 'Atividades Banco de dados - MÃ¡rcio Lucas.pdf', 1),
(18, '../arquivos/mupload1466794378576d818a949bf.pdf', 'pdf', 'marcio-04.pdf', 0),
(19, '../arquivos/mupload1466794591576d825f0b3f8.pdf', 'pdf', '1466794591576d825f0b3f8.pdf', 0),
(20, '../arquivos/mupload1466794667576d82abbb4d8.pdf', 'pdf', 'mupload1466794667576d82abbb4d8.pdf', 1),
(21, '../arquivos/mupload1466854061576e6aad9f8f4.jpg', 'jpg', 'mupload1466854061576e6aad9f8f4.jpg', 0);

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
(11, 7, 'lavoura', 'data', 1),
(12, 7, 'tamanho da semente', 'dinheiro', 1),
(13, 7, 'lote', 'data', 1),
(14, 7, 'data da colheita', 'dinheiro', 0),
(15, 8, 'ad', 'data', 0),
(16, 8, 'asdfsa', 'numero', 0),
(17, 8, 'asdfasd', 'data', 0),
(32, 9, 'marca', 'texto', 1),
(33, 9, 'modelo', 'texto', 1),
(34, 9, 'ano', 'texto', 1),
(35, 9, 'cor', 'texto', 1);

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
(7, 'Sementes', '2016-05-06', '2016-05-06', 1, NULL),
(8, 'Teste', '2016-05-06', '2016-05-06', 0, NULL),
(9, 'Maquinas', '2016-05-09', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(180) DEFAULT NULL,
  `descricao` text,
  `tipo` varchar(20) NOT NULL,
  `cpf_ou_cnpj` varchar(30) DEFAULT NULL,
  `datacriacao` date DEFAULT NULL,
  `dataultimaalteracao` date DEFAULT NULL,
  `dataexclusao` date DEFAULT NULL,
  `ativado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `descricao`, `tipo`, `cpf_ou_cnpj`, `datacriacao`, `dataultimaalteracao`, `dataexclusao`, `ativado`) VALUES
(1, 'Pessoa x', 'wereww', 'fisica', '03794335163', '2016-06-23', NULL, NULL, 1),
(2, 'Marcinho', 'Marcinho do amÃ´', 'fisica', '03794335163', '2016-06-23', NULL, NULL, 1),
(3, 'Empresa cliente AALLA', 'Teste', 'juridica', '56165165651651', '2016-06-24', NULL, NULL, 1);

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

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`idimagem`, `produto_id`, `caminho`, `posicao`) VALUES
(55, 298, '../imagens/mupload14685864865788d9f69ae6c.jpg', 6),
(56, 298, '../imagens/mupload14685864865788d9f6a9287.jpg', 8),
(57, 298, '../imagens/mupload14685871215788dc71e919b.jpg', 4),
(58, 298, '../imagens/mupload14685871225788dc72077cf.jpg', 7),
(61, 298, '../imagens/mupload14685873315788dd435d344.jpg', 5),
(62, 298, '../imagens/mupload1468841225578cbd091911f.jpg', 0),
(63, 298, '../imagens/mupload1468841225578cbd093cbcc.jpg', 1),
(64, 298, '../imagens/mupload1468841225578cbd0959377.jpg', 2),
(65, 298, '../imagens/mupload1468841225578cbd0975b2b.jpg', 3),
(67, 299, '../imagens/mupload14696390205798e96c43a81.jpg', 2);

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
  `ativado` tinyint(1) NOT NULL DEFAULT '1',
  `imagemprincipal` varchar(100) DEFAULT '../imagens/mupload1463597850573cbb1acd7e1.jpg',
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

INSERT INTO `produto` (`id`, `nome`, `descricao`, `imagem`, `preco`, `ativado`, `imagemprincipal`, `mostrapreco`, `categoria_id`, `secao_id`, `datacriacao`, `dataexclusao`, `dataultimaalteracao`, `usuario_id`) VALUES
(1, 'PAMONHA DE DOCE RECHEADA COM QUEIJO', 'ESSA PAMONHA Ã© UMA DELÃ­CINHA, QUENTINHA, MOLINHA E DOCINHA. HEHEHEH', 'mupload1460566386570e79722dcbb.jpg-mupload1460566386570e79722df1e.jpg-mupload1460566386570e79722e0ff.jpg-mupload1460566386570e79722e40d.jpg-mupload1460566386570e79722e78f.jpg-mupload1460566386570e79722eb01.jpg-mupload1460566386570e79722ecaf.jpg-mupload1460566386570e79722eefe.png-mupload1460566386570e79722f6bf.jpg', 4.00, 0, '../imagens/mupload1460566386570e79722f86a.jpg', 1, 9, 0, '2016-05-09', NULL, NULL, 0),
(2, 'Pao de queijo', 'asjajajajksdasjasd as', 'mupload1460568363570e812bef54e.jpg-mupload1460568363570e812bef669.jpg-mupload1460568363570e812bef785.jpg-mupload1460568363570e812bef929.jpg-mupload1460568363570e812befa8a.jpg-mupload1460568363570e812befbd3.jpg-mupload1460568363570e812befd3d.jpg-mupload1460568363570e812befe2c.jpg-mupload1460568363570e812beff16.png', 0.00, 0, '../imagens/mupload1460568363570e812bf017f.jpg', 1, 0, 0, '2016-05-09', NULL, NULL, 0),
(274, 'prod teste 1', 'dasdasd', '', 0.00, 0, '../imagens/mupload1460570419570e89337e50f.jpg', 0, 0, 0, '2016-05-09', NULL, NULL, 0),
(275, 'prod teste 2', 'dasdasda', '', 0.00, 0, '../imagens/mupload1460570435570e8943a86c4.jpg', 0, 0, 0, '2016-05-09', NULL, NULL, 0),
(276, 'prod teste 3', 'qweqweqwe', '', 0.00, 0, '../imagens/mupload1460570452570e89548ff2c.jpg', 0, 0, 0, '2016-05-09', NULL, NULL, 0),
(277, 'PULVERIZADOR COLUMBIA AD-18', 'VAZAO 150 COMANDO A CABO - USADO. PREÃ‡O A COMBINAR.', 'mupload14609872525714e57438de8.jpg-mupload14609872535714e57541dfd.jpg-mupload14609872535714e57542858.jpg-mupload14609872535714e5754318a.jpg', 0.00, 0, '../imagens/mupload14609872535714e5754399c.jpg', 1, 0, 0, '2016-05-09', NULL, NULL, 0),
(278, 'PULVERIZADOR COLUMBIA AD-18', 'VAZÃƒO 150 - USADO. SERIE 2002. PREÃ‡O A COMBINAR.', 'mupload14622151205727a1d0a7078.jpg-mupload14622151215727a1d1aa482.jpg-mupload14622151215727a1d1b2905.jpg-mupload14622151215727a1d1b2ef6.jpg', 0.00, 1, '../imagens/mupload14622151215727a1d1b39e9.jpg', 0, 9, 0, '2016-05-09', NULL, NULL, 0),
(279, 'PULVERIZADOR COLUMBIA CROSS', 'COLUMBIA CROSS A-18 JP 100 USADA - PREÃ‡O A COMBINAR', 'mupload1461696756571fb8f4dc9d2.jpg-mupload1461696756571fb8f4dccb6.jpg-mupload1461696756571fb8f4dcfb7.jpg-mupload1461696756571fb8f4dd1c1.jpg-mupload1461696756571fb8f4dd461.jpg-mupload1461696756571fb8f4dd764.jpg-mupload1461696756571fb8f4dd9f7.jpg-mupload1461696756571fb8f4ddc3a.jpg-mupload1461696756571fb8f4ddf1e.jpg', 0.00, 1, '../imagens/mupload1461696756571fb8f4de227.jpg', 0, 0, 0, '2016-05-09', NULL, NULL, 0),
(280, 'ENSILADEIRA', 'USADA - REFORMADA. PREÃ‡O A COMBINAR.', 'mupload1461692667571fa8fba11f0.jpg-mupload1461692668571fa8fcbcaee.jpg-mupload1461692668571fa8fcbd7fa.jpg-mupload1461692668571fa8fcbe2ef.jpg-mupload1461692668571fa8fcbee63.jpg-mupload1461692668571fa8fcbf64f.jpg-mupload1461692668571fa8fcbfed9.jpg', 4.00, 0, '../imagens/mupload1461692668571fa8fcc0749.jpg', 0, 0, 0, '2016-05-09', NULL, NULL, 0),
(281, 'ENSILADEIRA', 'USADA - REFORMADA. PREÃ‡O A COMBINAR.', 'mupload1461693498571fac3a694a8.jpg-mupload1461693499571fac3b8457d.jpg-mupload1461693499571fac3b851c3.jpg-mupload1461693499571fac3b85ace.jpg-mupload1461693499571fac3b8656e.jpg-mupload1461693499571fac3b86fdc.jpg-mupload1461693499571fac3b87c57.jpg', 4000.00, 1, '../imagens/mupload1461693499571fac3b88615.jpg', 1, 9, 0, '2016-05-10', NULL, '2016-07-13', 0),
(282, 'PULVERIZADOR A-17', 'RODA BAIXA, JP 100 - USADA. PREÃ‡O A COMBINAR.', 'mupload1461697857571fbd414bf65.jpg-mupload1461697857571fbd41ea7dc.jpg-mupload1461697857571fbd41f26b7.jpg-mupload1461697857571fbd41f2f38.jpg-mupload1461697858571fbd4200e56.jpg-mupload1461697858571fbd4201502.jpg', 0.00, 1, '../imagens/mupload1461697858571fbd4201bca.jpg', 0, 0, 0, '2016-05-10', NULL, NULL, 0),
(283, 'PULVERIZADOR ADVANCE VORTEX 2.000 LTS', 'COMANDO A CABO, JP 150, 2.000 LTS', '--------', 0.00, 1, '../imagens/mupload14622159125727a4e850916.jpg', 0, 0, 0, '2016-05-10', NULL, '2016-07-12', 0),
(284, 'PULVERIZADOR ADVANCE 3.000LTS ', 'COMANDO A CABO, JP 150, USADO. PREÃ‡O A COMBINAR.', '----', 0.00, 1, '../imagens/mupload14622162735727a651e292d.jpg', 0, 0, 0, '2016-05-11', NULL, '2016-07-12', 0),
(285, 'PULVERIZADOR COLUMBIA AD-18', 'JP 150, COMANDO HIDRAULICO, USADA. PREÃ‡O A COMBINAR', '--------', 0.00, 1, '../imagens/mupload14622178865727ac9eaa8ed.jpg', 0, 0, 0, '2016-05-12', NULL, '2016-07-12', 0),
(286, 'PULVERIZADOR COLUMBIA AD-18', 'JP 150, HIDRAULICO, USADO - PREÃ‡O A COMBINAR', 'mupload14622175605727ab5892f56.jpg-mupload14622175605727ab5893117.jpg-mupload14622175605727ab589327a.jpg-mupload14622175605727ab58933df.jpg-mupload14622175605727ab5893520.jpg-mupload14622175605727ab5893693.jpg-mupload14622175605727ab589385f.jpg', 0.00, 1, '../imagens/mupload14622175605727ab5896120.jpg', 0, 0, 0, '2016-05-14', NULL, NULL, 0),
(287, 'CALDA PRONTA 02 RESERVATÃ“RIO DE 3.300 LTS', 'USADO, PREÃ‡O A COMBINAR.', '--------', 0.00, 1, '../imagens/mupload14622180525727ad44ce9ad.jpg', 0, 0, 0, '2016-05-14', NULL, '2016-07-12', 0),
(288, 'Produto teste', 'sdaisadjd', '', 45.00, 0, '', 1, 7, 1, '2016-05-09', NULL, NULL, 0),
(289, 'Produto teste 2', 'asdsad', '', 50.00, 0, '', 1, 7, 1, '2016-05-09', NULL, NULL, 0),
(290, 'Produto teste 3', 'weqweqw', '', 11.50, 0, '', 1, 7, 1, '2016-05-09', NULL, NULL, 0),
(291, 'wqeqwe', 'wqeqwewqe', '', 0.00, 0, '', 0, 9, 2, '2016-05-18', NULL, NULL, 1),
(292, 'wqeqwe', 'wqeqwewqe', 'mupload1461697857571fbd414bf65.jpg-mupload1461697857571fbd41ea7dc.jpg-mupload1461697857571fbd41f26b7.jpg-mupload1461697857571fbd41f2f38.jpg-mupload1461697858571fbd4200e56.jpg-mupload1461697858571fbd4201502.jpg', 0.00, 1, '../imagens/mupload1463597620573cba344038c.jpg', 0, 9, 2, '2016-05-18', NULL, '2016-07-12', 1),
(293, 'wqewqedfssdfdf', 'sdsfdsfdfsfdf', 'mupload1461697857571fbd414bf65.jpg-mupload1461697857571fbd41ea7dc.jpg-mupload1461697857571fbd41f26b7.jpg-mupload1461697857571fbd41f2f38.jpg-mupload1461697858571fbd4200e56.jpg-mupload1461697858571fbd4201502.jpg', 1515.00, 1, '', 1, 9, 2, '2016-05-18', NULL, '2016-07-13', 1),
(294, 'dsfsfddsf', 'sdfsdfsd', 'mupload1461697857571fbd414bf65.jpg-mupload1461697857571fbd41ea7dc.jpg-mupload1461697857571fbd41f26b7.jpg-mupload1461697857571fbd41f2f38.jpg-mupload1461697858571fbd4200e56.jpg-mupload1461697858571fbd4201502.jpg', 123.00, 1, '', 1, 9, 2, '2016-05-18', NULL, '2016-07-12', 1),
(295, '5tter', 'tryet', '----', 0.00, 1, '../imagens/mupload1463597850573cbb1acd7e1.jpg', 0, 9, 2, '2016-05-18', NULL, '2016-07-12', 1),
(296, 'huehuehue', 'ehuehueheueh', 'mupload1461697857571fbd414bf65.jpg-mupload1461697857571fbd41ea7dc.jpg-mupload1461697857571fbd41f26b7.jpg-mupload1461697857571fbd41f2f38.jpg-mupload1461697858571fbd4200e56.jpg-mupload1461697858571fbd4201502.jpg', 0.00, 1, '', 0, 9, 2, '2016-05-19', NULL, '2016-07-12', 1),
(297, 'ooi', 'iooiu', '../imagens/mupload14683342035785007b18ecd.jpg-', 76.00, 1, '../imagens/mupload1463597850573cbb1acd7e1.jpg', 1, 9, 2, '2016-05-19', NULL, '2016-07-12', 1),
(298, 'teste', 'teste', '../imagens/mupload146841599257863ff86ce8c.jpg-../imagens/mupload146841599257863ff86e7e2.jpg-../imagens/mupload146841599257863ff877aa3.jpg-../imagens/mupload146841599257863ff8809c9.jpg-../imagens/mupload146841599257863ff88461c.jpg-../imagens/mupload146841599257863ff887d09.jpg-../imagens/mupload146841599257863ff89844a.jpg-../imagens/mupload146841599257863ff89d1cb.jpg-../imagens/mupload146841599257863ff8a1284.jpg', 0.00, 1, '../imagens/mupload14696411695798f1d16b776.jpg', 0, 9, 2, '2016-05-30', NULL, '2016-07-27', 3),
(299, 'Produto teste', 'sadpokdsaopdk', '../imagens/mupload146842282857865aaca1400.jpg', 25.00, 1, '../imagens/mupload1464803385574f2039df9dc.jpg', 1, 9, 2, '2016-06-01', NULL, '2016-07-27', 1),
(300, 'werer', 'werwer', '-../imagens/mupload1470056089579f46999659f.jpg-------', 312312.00, 1, '', 1, 9, 2, '2016-08-01', NULL, NULL, 1);

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

--
-- Extraindo dados da tabela `secao`
--

INSERT INTO `secao` (`id`, `nome`, `datacriacao`, `dataexclusao`, `dataultimaalteracao`, `ativado`) VALUES
(1, 'Secao teste', '2016-05-06 00:00:00', '2016-05-09 00:00:00', NULL, 0),
(2, 't', '2016-05-18 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `identificador` varchar(20) DEFAULT NULL,
  `arquivo_id` int(11) NOT NULL,
  `ativado` tinyint(1) DEFAULT '1',
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `uploads`
--

INSERT INTO `uploads` (`id`, `identificador`, `arquivo_id`, `ativado`, `cliente_id`) VALUES
(17, 'PELAAMORDEDEUSCADAST', 16, 1, 2),
(18, 'wfeewwe', 17, 1, 2),
(19, 'OPLA', 18, 1, 2),
(20, 'ewwe', 19, 1, 3),
(21, 'Tewste', 20, 1, 3),
(22, 'imagem', 21, 1, 3);

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
  `dataultimaalteracao` varchar(50) DEFAULT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `login`, `senha`, `nivel`, `ativado`, `imagem`, `datacriacao`, `dataexclusao`, `dataultimaalteracao`, `cliente_id`) VALUES
(1, 'MÃ¡rcio Lucas', 'marciioluucas@gmail.com', 'marciioluucas', 'jabuticaba123', 4, 1, '../imagens/mupload14641923415745cd55519c4.jpg', '25/02/2016', NULL, NULL, 2),
(2, 'Usuario teste1', 'dsaoijdasiodj@adsiodjasio.com', 'djasiojdas', 'adsoijdasoid', 1, 0, '../imagens/mUpload-145873717756f29019012c2', '', NULL, NULL, 0),
(3, 'admin', 'admin@admin.com.br', 'admin', 'admin', 2, 1, '../imagens/mupload1460566955570e7bab4a0d9.png', '', NULL, NULL, 0),
(4, 'TALITA VEZANE BARROS MEIRELES', 'talita_agmaquinas@outlook.com', 'talita.vezane', 'maquinas', 1, 1, '../imagens/mupload1460653325570fcd0dec993.jpg', NULL, NULL, NULL, 0),
(6, 'wqewq', 't', 't', 't', 1, 1, '', NULL, NULL, NULL, 1),
(7, 'qweqw', 'eqweqw', 'eqweqw', 'eqweqwe', 2, 1, '', NULL, NULL, NULL, 2),
(8, 'UsuÃ¡rio Teste', 'teste', 'teste', 'teste', 1, 1, '../imagens/mupload1466766143576d133f27e04.jpg', NULL, NULL, NULL, 2);

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
(60, 'saddsadas1', 281, 32, 9),
(61, 'dada', 281, 33, 9),
(62, 'adssa', 281, 34, 9),
(63, 'dasasasd', 281, 35, 9),
(64, '15/06/2017', 281, 11, 7),
(65, '1.561,65', 281, 12, 7),
(66, '15/06/2016', 281, 13, 7),
(67, 'qweqwe', 290, 32, 9),
(68, 'wqeqw', 290, 33, 9),
(69, 'qweqw', 290, 34, 9),
(70, 'eqweqwe', 290, 35, 9),
(71, 'qweqwe', 290, 32, 9),
(72, 'wqeqw', 290, 33, 9),
(73, 'qweqw', 290, 34, 9),
(74, 'eqweqwe', 290, 35, 9),
(75, 'asdas', 290, 32, 9),
(76, 'dsadas', 290, 33, 9),
(77, 'dsadas', 290, 34, 9),
(78, 'asdasdas', 290, 35, 9),
(79, 'sdaasfa', 290, 32, 9),
(80, 'sdfasd', 290, 33, 9),
(81, 'sadfasd', 290, 34, 9),
(82, 'sadfasdf', 290, 35, 9),
(83, 'sadsad', 290, 32, 9),
(84, 'sadas', 290, 33, 9),
(85, 'dasdsa', 290, 34, 9),
(86, 'dfadasd', 290, 35, 9),
(87, 'dasasdf', 290, 32, 9),
(88, 'sdafasdfasd', 290, 33, 9),
(89, 'sdafasd', 290, 34, 9),
(90, 'asdfasdfa', 290, 35, 9),
(91, 'dasasdf', 290, 32, 9),
(92, 'sdafasdfasd', 290, 33, 9),
(93, 'sdafasd', 290, 34, 9),
(94, 'asdfasdfa', 290, 35, 9),
(95, 'dasasdf', 290, 32, 9),
(96, 'sdafasdfasd', 290, 33, 9),
(97, 'sdafasd', 290, 34, 9),
(98, 'asdfasdfa', 290, 35, 9),
(99, 'dasasdf', 290, 32, 9),
(100, 'sdafasdfasd', 290, 33, 9),
(101, 'sdafasd', 290, 34, 9),
(102, 'asdfasdfa', 290, 35, 9),
(103, 'dasasdf', 292, 32, 9),
(104, 'sdafasdfasd', 292, 33, 9),
(105, 'sdafasd', 292, 34, 9),
(106, 'asdfasdfa', 292, 35, 9),
(107, 'wewe', 293, 32, 9),
(108, 'gdfgsdf', 293, 33, 9),
(109, 'gdsfgsdf', 293, 34, 9),
(110, 'dsfgsdfgsdfg', 293, 35, 9),
(111, 'aa', 294, 32, 9),
(112, 'aaa', 294, 33, 9),
(113, 'aaa', 294, 34, 9),
(114, 'aaaa', 294, 35, 9),
(115, 'rrt', 295, 32, 9),
(116, 'ewrtrew', 295, 33, 9),
(117, 'wertwert', 295, 34, 9),
(118, 'wretrwet', 295, 35, 9),
(119, 'dasdas', 296, 32, 9),
(120, 'dsadsad', 296, 33, 9),
(121, 'asdasd', 296, 34, 9),
(122, 'asdasdasd', 296, 35, 9),
(123, 'uiooiu', 297, 32, 9),
(124, 'iuoiu', 297, 33, 9),
(125, 'oiuiou', 297, 34, 9),
(126, 'ioiuooui', 297, 35, 9),
(127, 'weew', 298, 32, 9),
(128, 'rqwe', 298, 33, 9),
(129, 'reqw', 298, 34, 9),
(130, 'rqewe', 298, 35, 9),
(131, 'a', 278, 32, 9),
(132, 'a', 278, 33, 9),
(133, 'a', 278, 34, 9),
(134, 'a', 278, 35, 9),
(135, 'Marca x', 299, 32, 9),
(136, 'Modelo y', 299, 33, 9),
(137, '2016', 299, 34, 9),
(138, 'Cor z', 299, 35, 9),
(139, '', 300, 32, 9),
(140, '', 300, 33, 9),
(141, '', 300, 34, 9),
(142, '', 300, 35, 9);

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
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
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
  ADD PRIMARY KEY (`id`,`arquivo_id`,`cliente_id`),
  ADD KEY `fk_boletim_arquivo1_idx` (`arquivo_id`),
  ADD KEY `fk_uploads_cliente1_idx` (`cliente_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`,`cliente_id`),
  ADD KEY `fk_usuario_cliente1_idx` (`cliente_id`);

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
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  ADD CONSTRAINT `fk_boletim_arquivo1` FOREIGN KEY (`arquivo_id`) REFERENCES `arquivo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_uploads_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
