-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Nov-2019 às 08:58
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naeco_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `cpf` char(11) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `email`, `cargo`, `cpf`, `senha`) VALUES
(1, 'veridiana', 't@ceo.com', 'ceo', '1441601260', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `codigo`
--

CREATE TABLE `codigo` (
  `id_codigo` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `id_material` int(10) UNSIGNED NOT NULL,
  `quantidade_material` int(11) NOT NULL,
  `id_ponto_coleta` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `codigo`
--

INSERT INTO `codigo` (`id_codigo`, `codigo`, `id_material`, `quantidade_material`, `id_ponto_coleta`) VALUES
(1, '001-001-001', 1, 1, 1),
(2, '002-001-001', 2, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `credito`
--

CREATE TABLE `credito` (
  `id_credito` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_codigo` int(10) UNSIGNED NOT NULL,
  `id_saldo` int(10) UNSIGNED NOT NULL,
  `data_credito` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valor_credito` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `credito`
--

INSERT INTO `credito` (`id_credito`, `id_usuario`, `id_codigo`, `id_saldo`, `data_credito`, `valor_credito`) VALUES
(1, 4, 1, 5, '2019-10-29 11:41:58', 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `debito`
--

CREATE TABLE `debito` (
  `id_debito` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_saldo` int(10) UNSIGNED NOT NULL,
  `id_parceiro` int(10) UNSIGNED NOT NULL,
  `valor_debito` double NOT NULL,
  `data_debito` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `debito`
--

INSERT INTO `debito` (`id_debito`, `id_usuario`, `id_saldo`, `id_parceiro`, `valor_debito`, `data_debito`) VALUES
(1, 0, 2, 1, 50, '2019-10-01 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `material`
--

CREATE TABLE `material` (
  `id_material` int(10) UNSIGNED NOT NULL,
  `tipo_material` varchar(50) NOT NULL,
  `valor_material` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `material`
--

INSERT INTO `material` (`id_material`, `tipo_material`, `valor_material`) VALUES
(1, 'Garrafa Pet', 100),
(2, 'Latinha Alumínio', 150);

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiro`
--

CREATE TABLE `parceiro` (
  `id_parceiro` int(10) UNSIGNED NOT NULL,
  `nome_fantasia_parceiro` varchar(100) NOT NULL,
  `razao_social_parceiro` varchar(100) NOT NULL,
  `cnpj_parceiro` char(14) NOT NULL,
  `email_parceiro` varchar(100) NOT NULL,
  `senha_parceiro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `parceiro`
--

INSERT INTO `parceiro` (`id_parceiro`, `nome_fantasia_parceiro`, `razao_social_parceiro`, `cnpj_parceiro`, `email_parceiro`, `senha_parceiro`) VALUES
(1, 'teste', 'teste ltda', '1234578901234', 'teste@testeparc', '123'),
(2, 'teste', 'teste ltda', '14789562357894', 'teste@empresa.com', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ponto_coleta`
--

CREATE TABLE `ponto_coleta` (
  `id_ponto_coleta` int(10) UNSIGNED NOT NULL,
  `logradouro_ponto_coleta` varchar(50) NOT NULL,
  `numero_ponto_coleta` int(11) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `bairro_ponto_coleta` varchar(25) NOT NULL,
  `cidade_ponto_coleta` varchar(50) NOT NULL,
  `uf_ponto_coleta` char(2) NOT NULL,
  `cep` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ponto_coleta`
--

INSERT INTO `ponto_coleta` (`id_ponto_coleta`, `logradouro_ponto_coleta`, `numero_ponto_coleta`, `complemento`, `bairro_ponto_coleta`, `cidade_ponto_coleta`, `uf_ponto_coleta`, `cep`) VALUES
(1, 'Av. dos Andradas', 3000, 'Boulevard Shopping - Próximo a BeGreen', 'Santa Efigênia', 'Belo Horizonte', 'MG', '30260070');

-- --------------------------------------------------------

--
-- Estrutura da tabela `post_blog`
--

CREATE TABLE `post_blog` (
  `id_post_blog` int(10) UNSIGNED NOT NULL,
  `conteudo_post_blog` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `saldo`
--

CREATE TABLE `saldo` (
  `id_saldo` int(10) UNSIGNED NOT NULL,
  `valor_saldo` double NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `saldo`
--

INSERT INTO `saldo` (`id_saldo`, `valor_saldo`, `id_usuario`) VALUES
(2, 350, 2),
(3, 0, 5),
(4, 0, 5),
(5, 100, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `cpf_usuario` char(11) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `senha_usuario` text NOT NULL,
  `cep_usuario` char(8) NOT NULL,
  `bairro_usuario` varchar(25) NOT NULL,
  `cidade_usuario` varchar(50) NOT NULL,
  `uf_usuario` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `cpf_usuario`, `email_usuario`, `senha_usuario`, `cep_usuario`, `bairro_usuario`, `cidade_usuario`, `uf_usuario`) VALUES
(2, 'Victoria Estanislau', '12655254635', 'victoriaeramosdeoliveira@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0', 'Sagrada Família', 'BELO HORIZONTE', 'MG'),
(3, 'veridiana santos', '14416012608', 'dianamsantos0@gmail.com', '1234', '0', 'goiania', 'belo horizonte', 'mg'),
(4, 'teste', '45678912352', 't@t.c', '123', '0', 'sdf', 'dsfdsf', 'df'),
(5, 'teste', '14578965223', 'teste@teste.com.br', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0', 'bairro', 'bh', 'MG'),
(6, 'teste 1', '15748965223', 'teste@teste.com.br', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0', 'goiania', 'bh', 'mg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `codigo`
--
ALTER TABLE `codigo`
  ADD PRIMARY KEY (`id_codigo`),
  ADD KEY `id_ponto_coleta` (`id_ponto_coleta`),
  ADD KEY `id_material` (`id_material`);

--
-- Indexes for table `credito`
--
ALTER TABLE `credito`
  ADD PRIMARY KEY (`id_credito`),
  ADD KEY `id_codigo` (`id_codigo`),
  ADD KEY `id_saldo` (`id_saldo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `debito`
--
ALTER TABLE `debito`
  ADD PRIMARY KEY (`id_debito`),
  ADD KEY `id_saldo` (`id_saldo`),
  ADD KEY `id_parceiro` (`id_parceiro`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_usuario_2` (`id_usuario`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indexes for table `parceiro`
--
ALTER TABLE `parceiro`
  ADD PRIMARY KEY (`id_parceiro`),
  ADD UNIQUE KEY `cnpj_parceiro` (`cnpj_parceiro`);

--
-- Indexes for table `ponto_coleta`
--
ALTER TABLE `ponto_coleta`
  ADD PRIMARY KEY (`id_ponto_coleta`);

--
-- Indexes for table `post_blog`
--
ALTER TABLE `post_blog`
  ADD PRIMARY KEY (`id_post_blog`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `cpf_usuario` (`cpf_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `codigo`
--
ALTER TABLE `codigo`
  MODIFY `id_codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `credito`
--
ALTER TABLE `credito`
  MODIFY `id_credito` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `debito`
--
ALTER TABLE `debito`
  MODIFY `id_debito` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `parceiro`
--
ALTER TABLE `parceiro`
  MODIFY `id_parceiro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ponto_coleta`
--
ALTER TABLE `ponto_coleta`
  MODIFY `id_ponto_coleta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `post_blog`
--
ALTER TABLE `post_blog`
  MODIFY `id_post_blog` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id_saldo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `codigo`
--
ALTER TABLE `codigo`
  ADD CONSTRAINT `fk_id_material_codigo` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`),
  ADD CONSTRAINT `fk_id_ponto_coleta_codigo` FOREIGN KEY (`id_ponto_coleta`) REFERENCES `ponto_coleta` (`id_ponto_coleta`);

--
-- Limitadores para a tabela `credito`
--
ALTER TABLE `credito`
  ADD CONSTRAINT `fk_id_codigo_credito` FOREIGN KEY (`id_codigo`) REFERENCES `codigo` (`id_codigo`),
  ADD CONSTRAINT `fk_id_saldo_credito` FOREIGN KEY (`id_saldo`) REFERENCES `saldo` (`id_saldo`),
  ADD CONSTRAINT `fk_id_usuario_credito` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `debito`
--
ALTER TABLE `debito`
  ADD CONSTRAINT `fk_id_parceiro_debito` FOREIGN KEY (`id_parceiro`) REFERENCES `parceiro` (`id_parceiro`),
  ADD CONSTRAINT `fk_id_saldo_debito` FOREIGN KEY (`id_saldo`) REFERENCES `saldo` (`id_saldo`);

--
-- Limitadores para a tabela `saldo`
--
ALTER TABLE `saldo`
  ADD CONSTRAINT `fk_id_usuario_saldo` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
