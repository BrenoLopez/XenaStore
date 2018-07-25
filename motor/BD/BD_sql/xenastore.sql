-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Jul-2018 às 23:05
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xenastore_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `situacao` varchar(10) NOT NULL,
  `data_pedido` varchar(20) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_total` varchar(10) NOT NULL,
  `tamanho` varchar(10) NOT NULL,
  `forma_pagamento` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(50) NOT NULL,
  `valor` varchar(10) NOT NULL,
  `category` varchar(50) NOT NULL,
  `quantidade` int(10) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `imagem` varchar(50) NOT NULL,
  `tema` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_product`, `name_product`, `valor`, `category`, `quantidade`, `descricao`, `imagem`, `tema`) VALUES
(1, 'Camisa Baby Groot Masculina', '64', 'Camisa', 10, 'Camisa em 100% Algodão.', '../../img/camisa-baby-groot-masculino-1.png', 'História em Quadrinhos'),
(2, 'Camisa DeadBeer Masculino', '64', 'Camisa', 10, 'Camisa em 100% Algodão.', '../../img/camisa-deadBeer-masculino-1.png', 'História em Quadrinhos'),
(3, 'Camisa DeadBeer Feminino', '64', 'Camisa', 10, 'Camisa em 100% Algodão.', '../../img/camisa-deadBeer-feminino-1.png', 'História em Quadrinhos'),
(4, 'Camisa Dead Ops Masculino', '64', 'Camisa', 20, 'Camisa em 100% Algodão.', '../../img/camisa-dead-ops-masculino-1.png', 'História em Quadrinhos'),
(5, 'Camisa Logan Skull Feminino', '64', 'Camisa', 20, 'Camisa em 100% Algodão.', '../../img/camisa-logan-skull-feminino-1.png', 'História em Quadrinhos'),
(6, 'Camisa Logan Skull Masculino', '64', 'Camisa', 20, 'Camisa em 100% Algodão.', '../../img/camisa-logan-skull-masculino-1.png', 'História em Quadrinhos'),
(7, 'Camisa Vila da Justiça', '64', 'Camisa', 40, 'Camisa em 100% Algodão.', '../../img/camisa-vila-da-justica-masculino-1.png', 'História em Quadrinhos'),
(8, 'Caneca Burns', '25', 'Caneca', 10, 'Camisa Resistentes e boas Dimensões.', '../../img/caneca-burns-1.png', 'Desenhos'),
(9, 'Caneca Goku Recover', '25', 'Caneca', 20, 'Canecas Resistentes e boas Dimensões.', '../../img/caneca-goku-recover-1.png', 'Animes'),
(10, 'Caneca Los Pollos Hermanos', '25', 'Caneca', 20, 'Canecas Resistentes e boas Dimensões.', '../../img/caneca-los-pollos-hermanos-1.png', 'Series'),
(11, 'Moleton Corporação Capsula', '270', 'Moletons', 20, 'Moleton em 100% Algodão.', '../../img/moleton-corporacao-capsula-1.png', 'Animes'),
(12, 'Moleton S.H.I.E.L.D', '270', 'Moletons', 30, 'Moleton em 100% Algodão.', '../../img/moleton-shield-1.png', 'História em Quadrinhos'),
(13, 'Poster Barbeiro de Seville', '50', 'Posters', 30, 'Posters Resistentes e boas qualidade.', '../../img/poster-barbeiro-de-seville-1.png', 'Desenhos'),
(14, 'Poster Fire and Pokémon', '50', 'Posters', 20, 'Posters Resistentes e boas qualidade.', '../../img/poster-fire-and-pokemon-1.png', 'Animes'),
(15, 'Poster red Hot', '50', 'Posters', 20, 'Posters Resistentes e boas qualidade.', '../../img/poster-red-hot-1.png', 'História em Quadrinhos'),
(16, 'Poster Super Chu!', '50', 'Posters', 30, 'Posters Resistentes e boas qualidade.', '../../img/poster-super-chu-1.png', 'Animes'),
(17, 'Bone X-Men', '30', 'Acessorios', 20, 'Bone Resistentes e boas qualidade.', '../../img/acessorio-bone-x-men-1.png', 'História em Quadrinhos'),
(18, 'Botton Esfera do Dragão', '5', 'Acessorios', 10, 'Bottons Resistentes e boas qualidade.', '../../img/acessorio-botton-esfera-do-dragao-1.png', 'Animes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(2555) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cep` varchar(7) NOT NULL,
  `tipo` char(2) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `numero` int(5) NOT NULL,
  `bairro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `first_name`, `last_name`, `email`, `password`, `cpf`, `endereco`, `telefone`, `cep`, `tipo`, `estado`, `cidade`, `numero`, `bairro`) VALUES
(15, 'greison', 'santos', 'greisonsantos03@gmail.com', '$2y$10$ydHb.elLun/ACyZ2K8Vq3.BVCS.Ww1nnySngk1Apm5zJ.9H1n4eSq', '12345678910', '-', '-', '-', '0', '', '', 0, ''),
(21, 'greison', 'santos', 'greisonsantos33@gmail.com', '$2y$10$JWnESK9jyvsymazgAWxxvOBghbxKUUWQx9e65cTZwWP4WqCjVUGrG', '123456789', 'centro', '(38) 988451113', '39-1000', '1', 'AC', 'diamantina', 444, ''),
(22, 'copese', 'santos', 'copese@ufvjm.com', '$2y$10$Or5Oyyoaj9j/OaXutq8Uu.yYtTIdNMw7aQrtX7OG1IV5vPE4/UoGi', '123456789', '', '-', '-', '1', '', '', 0, ''),
(23, 'copese2', 'copese2', 'copese@gmail.com', '$2y$10$76AiOYtF5HPxWohJVP5F2ey1gab6.8w0Fp9MEERXhJsG4MjutM3lO', '123456', '', '-', '-', '1', '', '', 0, ''),
(24, 'copese3', 'copese3', 'copese3@gmail.com', '$2y$10$ky8C7nDeVgKJSpLsevlheuBk.osRA57ZHm.sHXUKQHBnUSAkBZsOW', '123456789', '', '-', '-', '1', '', '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
