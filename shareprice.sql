-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Out-2015 às 03:09
-- Versão do servidor: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shareprice`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE IF NOT EXISTS `administradores` (
  `id_administrador` bigint(20) unsigned NOT NULL,
  `login` text NOT NULL,
  `senha` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='"Tabela que armazena os administradores"';

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` bigint(20) unsigned NOT NULL,
  `nome_categoria` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COMMENT='Tabela que armazena as categorias';

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nome_categoria`) VALUES
(1, 'TENIS CASUAL'),
(2, 'POLO'),
(3, 'CAMISETA MANGA CURTA'),
(4, 'CAMISETA MANGA LONGA'),
(5, 'MOLETON'),
(6, 'CHUTEIRA FUTSAL'),
(7, 'CHUTEIRA CAMPO'),
(8, 'CALCA JEANS'),
(9, 'CALCA MOLETON'),
(10, 'TENIS SKATE'),
(11, 'JAQUETA'),
(12, 'BERMUDA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lojas`
--

CREATE TABLE IF NOT EXISTS `lojas` (
  `id_loja` bigint(20) unsigned NOT NULL,
  `nome_loja` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='Tabela que armazena as lojas';

--
-- Extraindo dados da tabela `lojas`
--

INSERT INTO `lojas` (`id_loja`, `nome_loja`) VALUES
(1, 'ADIDAS - BOURBON WALLIG SHOPPING'),
(2, 'ADIDAS - BARRA SUL SHOPPING'),
(3, 'NIKE STORE - IGUATEMI SHOPPING'),
(4, 'GANG - LINDOIA SHOPPING'),
(5, 'GANG - BOURBON WALLIG SHOPPING'),
(6, 'PAQUETA ESPORTES - BOURBON WALLIG SHOPPING'),
(7, 'PAQUETA ESPORTES - IGUATEMI SHOPPING');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE IF NOT EXISTS `marcas` (
  `id_marca` bigint(20) unsigned NOT NULL,
  `nome_marca` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COMMENT='Tabela que armazena as marcas';

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nome_marca`) VALUES
(1, 'ADIDAS'),
(2, 'NIKE'),
(3, 'PUMA'),
(4, 'TOMMY HILFIGER'),
(5, 'VANS'),
(6, 'ETNIES'),
(7, 'UMBRO'),
(8, 'LOTTO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencias`
--

CREATE TABLE IF NOT EXISTS `ocorrencias` (
  `id_denuncia` bigint(20) unsigned NOT NULL,
  `nome_denuncia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagens`
--

CREATE TABLE IF NOT EXISTS `postagens` (
  `id_postagem` bigint(20) unsigned NOT NULL,
  `id_marca` text NOT NULL,
  `id_categoria` text NOT NULL,
  `id_loja` text NOT NULL,
  `id_usuario` text NOT NULL,
  `preco` float(9,2) NOT NULL,
  `conteudo` text NOT NULL,
  `caminho_imagem` text NOT NULL,
  `data_postagem` date NOT NULL,
  `curtida` int(11) NOT NULL,
  `numero_ocorrencias` int(11) NOT NULL,
  `ativa` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Tabela que armazena as postagens';

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` bigint(20) unsigned NOT NULL,
  `id_facebook` text NOT NULL,
  `nome_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='"Tabela que armazena os usuarios"';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_administrador`), ADD UNIQUE KEY `id_administrador` (`id_administrador`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`), ADD UNIQUE KEY `id_vestuario` (`id_categoria`);

--
-- Indexes for table `lojas`
--
ALTER TABLE `lojas`
  ADD PRIMARY KEY (`id_loja`), ADD UNIQUE KEY `id_loja` (`id_loja`);

--
-- Indexes for table `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`), ADD UNIQUE KEY `id_marca` (`id_marca`);

--
-- Indexes for table `ocorrencias`
--
ALTER TABLE `ocorrencias`
  ADD PRIMARY KEY (`id_denuncia`), ADD UNIQUE KEY `id_denuncia` (`id_denuncia`);

--
-- Indexes for table `postagens`
--
ALTER TABLE `postagens`
  ADD PRIMARY KEY (`id_postagem`), ADD UNIQUE KEY `id_postagem` (`id_postagem`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`), ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_administrador` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `lojas`
--
ALTER TABLE `lojas`
  MODIFY `id_loja` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ocorrencias`
--
ALTER TABLE `ocorrencias`
  MODIFY `id_denuncia` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `postagens`
--
ALTER TABLE `postagens`
  MODIFY `id_postagem` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
