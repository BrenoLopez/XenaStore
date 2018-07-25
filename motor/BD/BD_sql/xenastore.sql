/*
Navicat MySQL Data Transfer

Source Server         : e-commerce
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : xenastore

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-07-23 23:28:05
*/

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of produto
-- ----------------------------
INSERT INTO `produto` VALUES ('5', 'camisa homem de ferro', '50', 'Camisa', '100', 'excelentes camisas para praia', '../img/15.jpg', 'Desenhos');
INSERT INTO `produto` VALUES ('6', 'CANECA', '50', 'Caneca', '100', 'BOAS CANECAS', '../img/6.jpg', 'História em Quadrinhos');
INSERT INTO `produto` VALUES ('7', 'caneca avenges', '20', 'Caneca', '100', 'excelentes canecas para tomar', '../img/13.jpg', 'Desenhos');
INSERT INTO `produto` VALUES ('8', 'camisas da dora aventureira', '50', 'Camisa', '100', 'camisas para crianças', '../img/15.jpg', 'Desenhos');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL DEFAULT '',
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `cep` varchar(7) NOT NULL,
  `tipo` char(2) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('12', 'XenasTORE', 'joaquim', 'greisonsantos03@gmail.com', '12345', '121312313', '-', '-', '-', '1');
INSERT INTO `user` VALUES ('13', 'teste', 'teste23', 'copese@ufvjm.com', '123456', '1231312311', '-', '-', '-', '1');
