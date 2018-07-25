/*
Navicat MySQL Data Transfer

Source Server         : e-commerce
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : xenastore

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-07-25 09:26:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for pedido
-- ----------------------------
DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `situacao` varchar(10) NOT NULL,
  `data_pedido` varchar(20) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_total` varchar(10) NOT NULL,
  `tamanho` varchar(10) NOT NULL,
  `forma_pagamento` varchar(10) NOT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of pedido
-- ----------------------------

-- ----------------------------
-- Table structure for produto
-- ----------------------------
DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `name_product` varchar(50) NOT NULL,
  `valor` varchar(10) NOT NULL,
  `category` varchar(50) NOT NULL,
  `quantidade` int(10) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `imagem` varchar(50) NOT NULL,
  `tema` varchar(50) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of produto
-- ----------------------------
INSERT INTO `produto` VALUES ('5', 'camisa homem de ferro', '50', 'Camisa', '100', 'excelentes camisas para praia', '../img/15.jpg', 'Desenhos');
INSERT INTO `produto` VALUES ('6', 'CANECA', '50', 'Caneca', '100', 'BOAS CANECAS', '../img/6.jpg', 'História em Quadrinhos');
INSERT INTO `produto` VALUES ('7', 'caneca avenges', '20', 'Caneca', '100', 'excelentes canecas para tomar', '../img/13.jpg', 'Desenhos');
INSERT INTO `produto` VALUES ('8', 'camisas da dora aventureira', '50', 'Camisa', '100', 'camisas para crianças', '../../img/15.jpg', 'Desenhos');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
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
  `bairro` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('15', 'greison', 'santos', 'greisonsantos03@gmail.com', '$2y$10$ydHb.elLun/ACyZ2K8Vq3.BVCS.Ww1nnySngk1Apm5zJ.9H1n4eSq', '12345678910', '-', '-', '-', '0', '', '', '0', '');
INSERT INTO `user` VALUES ('21', 'greison', 'santos', 'greisonsantos33@gmail.com', '$2y$10$JWnESK9jyvsymazgAWxxvOBghbxKUUWQx9e65cTZwWP4WqCjVUGrG', '123456789', 'centro', '(38) 988451113', '39-1000', '1', 'AC', 'diamantina', '444', '');
INSERT INTO `user` VALUES ('22', 'copese', 'santos', 'copese@ufvjm.com', '$2y$10$Or5Oyyoaj9j/OaXutq8Uu.yYtTIdNMw7aQrtX7OG1IV5vPE4/UoGi', '123456789', '', '-', '-', '1', '', '', '0', '');
INSERT INTO `user` VALUES ('23', 'copese2', 'copese2', 'copese@gmail.com', '$2y$10$76AiOYtF5HPxWohJVP5F2ey1gab6.8w0Fp9MEERXhJsG4MjutM3lO', '123456', '', '-', '-', '1', '', '', '0', '');
INSERT INTO `user` VALUES ('24', 'copese3', 'copese3', 'copese3@gmail.com', '$2y$10$ky8C7nDeVgKJSpLsevlheuBk.osRA57ZHm.sHXUKQHBnUSAkBZsOW', '123456789', '', '-', '-', '1', '', '', '0', '');
