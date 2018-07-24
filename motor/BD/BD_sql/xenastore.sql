/*
Navicat MySQL Data Transfer

Source Server         : e-commerce
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : xenastore

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-07-23 23:25:30
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
