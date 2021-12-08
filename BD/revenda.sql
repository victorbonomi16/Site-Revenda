-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Jun-2021 às 22:24
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `revenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `automovel`
--

CREATE TABLE `automovel` (
  `codautomovel` int(5) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `codmodelo` int(5) NOT NULL,
  `codcategoria` int(5) NOT NULL,
  `ano` int(4) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `localizacao` varchar(50) NOT NULL,
  `tipocombustivel` varchar(50) NOT NULL,
  `opcionais` varchar(50) NOT NULL,
  `valor` float(10,3) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL,
  `foto3` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `automovel`
--

INSERT INTO `automovel` (`codautomovel`, `descricao`, `codmodelo`, `codcategoria`, `ano`, `cor`, `placa`, `localizacao`, `tipocombustivel`, `opcionais`, `valor`, `foto1`, `foto2`, `foto3`) VALUES
(1, 'Parati', 1, 3, 1994, 'Cinza', 'LSN4148', 'Curitiba', 'Alcool', 'NA', 35.000, 'fotos/8adbc0bdcf7ab627eee82283f553b0ff.jpg', 'fotos/85359a89c5d1389f2bf4e170681ec3aa.jpg', 'fotos/6a91b4b0df2d06655d0868d0c76ec065.jpg'),
(2, 'Ford Ka', 2, 4, 2017, 'Prata', 'LSN4040', 'Florianopolis', 'Gasolina', 'NA', 44.990, 'fotos/e0b46d5a061c187838293c99238fbda8.jpg', 'fotos/37f5d906d3bc73ee458cf27fcd99bd62.jpg', 'fotos/2d78589b24ee67ad1e5932946b49afcd.jpg'),
(3, 'EcoSport', 3, 1, 2020, 'Preto', 'LSN2432', 'Belem', 'Gasolina', 'NA', 91.900, 'fotos/dfc905e14760d6c6e27d5f7072068059.jpg', 'fotos/126df43b5c0cf37d0e5bdd3809dc6f1c.jpg', 'fotos/55d4286bcce6f89b315a354d17c79198.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `codcategoria` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`codcategoria`, `nome`) VALUES
(1, 'SUV'),
(2, 'Sedans'),
(3, 'Perua'),
(4, 'Hatchback');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE `marcas` (
  `codmarca` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`codmarca`, `nome`) VALUES
(1, 'Ford'),
(2, 'Volkswagen'),
(3, 'Fiat');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelos`
--

CREATE TABLE `modelos` (
  `codmodelo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `codmarca` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modelos`
--

INSERT INTO `modelos` (`codmodelo`, `nome`, `codmarca`) VALUES
(1, 'Parati', 2),
(2, 'Ka', 1),
(3, 'ECOSPORT', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `codusuario` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codusuario`, `nome`, `login`, `senha`) VALUES
(1, 'victor', 'victorr', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `automovel`
--
ALTER TABLE `automovel`
  ADD PRIMARY KEY (`codautomovel`),
  ADD KEY `codmodelo` (`codmodelo`),
  ADD KEY `codcategoria` (`codcategoria`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`codcategoria`);

--
-- Indexes for table `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`codmarca`);

--
-- Indexes for table `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`codmodelo`),
  ADD KEY `codmarca` (`codmarca`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
