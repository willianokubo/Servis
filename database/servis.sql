-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11-Jun-2017 às 00:16
-- Versão do servidor: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servis`
--
CREATE DATABASE IF NOT EXISTS `servis` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `servis`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Willian Okubo', 'willian@servis.com', 'c9540551ccaae43d1fa1f8de2d84ab197d4eed99'),
(2, 'Barbara Casac', 'barbara@servis.com', 'c9540551ccaae43d1fa1f8de2d84ab197d4eed99'),
(3, 'Natalia Galotto', 'natalia@servis.com', 'c9540551ccaae43d1fa1f8de2d84ab197d4eed99'),
(4, 'Alexsandro Oliveira', 'alexsandro@servis.com', 'c9540551ccaae43d1fa1f8de2d84ab197d4eed99'),
(5, 'Naiane Oliveira', 'naiane@servis.com', 'c9540551ccaae43d1fa1f8de2d84ab197d4eed99');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

DROP TABLE IF EXISTS `servico`;
CREATE TABLE `servico` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `custo_hora` decimal(10,2) NOT NULL,
  `custo_dia` decimal(10,2) NOT NULL,
  `custo_semana` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id`, `nome`, `categoria`, `custo_hora`, `custo_dia`, `custo_semana`) VALUES
(8, 'Cabelereiro', 'Moda e Beleza', '30.00', '220.00', '1000.00'),
(10, 'Costureiro', 'Moda e Beleza', '30.00', '220.00', '1000.00'),
(11, 'Arquiteto', 'Reformas', '70.00', '500.00', '2100.00'),
(14, 'Pintor', 'Reforma', '20.00', '80.00', '400.00'),
(15, 'Faxina', 'Limpeza', '25.00', '100.00', '450.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `img_perfil` varchar(100) DEFAULT 'no_user_icon.png',
  `classificacao` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `endereco`, `telefone`, `email`, `senha`, `img_perfil`, `classificacao`) VALUES
(6, 'Willian Okubo', 'Rua Mackenzie, 100', '(11) 1111-11111', 'willian@servis.com', 'c9540551ccaae43d1fa1f8de2d84ab197d4eed99', '1497109262_41695.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_servico`
--

DROP TABLE IF EXISTS `usuario_servico`;
CREATE TABLE `usuario_servico` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_servico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

DROP TABLE IF EXISTS `venda`;
CREATE TABLE `venda` (
  `id` int(11) NOT NULL,
  `valor_venda` double NOT NULL,
  `status` varchar(45) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_usuario_servico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario_servico`
--
ALTER TABLE `usuario_servico`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_servico_idx` (`id_servico`) USING BTREE,
  ADD KEY `fk_usuario_idx` (`id_usuario`) USING BTREE;

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Venda_Cliente1_idx` (`id_cliente`),
  ADD KEY `fk_Venda_Funcionario1_idx` (`id_usuario_servico`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `usuario_servico`
--
ALTER TABLE `usuario_servico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `usuario_servico`
--
ALTER TABLE `usuario_servico`
  ADD CONSTRAINT `fk_id_servico` FOREIGN KEY (`id_servico`) REFERENCES `servico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `fk_Venda_Cliente1` FOREIGN KEY (`id_cliente`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Venda_Usuario_Servico1` FOREIGN KEY (`id_usuario_servico`) REFERENCES `usuario_servico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
