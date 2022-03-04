/*
Navicat MySQL Data Transfer

Source Server         : Mysqlphp
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : cart

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-12-31 17:12:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `guanlizhuce`
-- ----------------------------
DROP TABLE IF EXISTS `guanlizhuce`;
CREATE TABLE `guanlizhuce` (
  `guanliname` char(30) NOT NULL DEFAULT '',
  `password` char(30) DEFAULT NULL,
  PRIMARY KEY (`guanliname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of guanlizhuce
-- ----------------------------
INSERT INTO `guanlizhuce` VALUES ('123456', '123456');
INSERT INTO `guanlizhuce` VALUES ('1234', '1234');

-- ----------------------------
-- Table structure for `shop`
-- ----------------------------
DROP TABLE IF EXISTS `shop`;
CREATE TABLE `shop` (
  `商品名称` char(20) NOT NULL,
  `商品图片` char(30) DEFAULT NULL,
  `商品价格` double(30,0) DEFAULT NULL,
  `数量` int(30) DEFAULT NULL,
  `金额` double(40,0) DEFAULT NULL,
  PRIMARY KEY (`商品名称`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop
-- ----------------------------
INSERT INTO `shop` VALUES ('华硕飞行堡垒', '4.jpg', '5999', '1', '5999');
INSERT INTO `shop` VALUES ('枪神5', '2.jpg', '9100', '1', '9100');
INSERT INTO `shop` VALUES ('DELL G3', '3.jfif', '5999', '3', '17997');

-- ----------------------------
-- Table structure for `shoppingcart`
-- ----------------------------
DROP TABLE IF EXISTS `shoppingcart`;
CREATE TABLE `shoppingcart` (
  `id` int(30) NOT NULL,
  `phonephoto` char(30) NOT NULL DEFAULT '',
  `phonename` char(30) DEFAULT NULL,
  `phoneprice` double(100,0) DEFAULT NULL,
  `postTime` date NOT NULL,
  PRIMARY KEY (`phonephoto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shoppingcart
-- ----------------------------
INSERT INTO `shoppingcart` VALUES ('3', '2.jpg', '枪神5', '9100', '2019-12-31');
INSERT INTO `shoppingcart` VALUES ('5', '2.jfif', '联想拯救者Y7000P', '8100', '2019-12-31');
INSERT INTO `shoppingcart` VALUES ('4', '4.jpg', '华硕飞行堡垒', '5999', '2019-12-31');
INSERT INTO `shoppingcart` VALUES ('2', '1.jfif', '惠普光影精灵5（绿光版）', '6999', '2019-12-31');
INSERT INTO `shoppingcart` VALUES ('4', '3.jfif', 'DELL G3', '5999', '2019-12-30');
INSERT INTO `shoppingcart` VALUES ('1', '5.jpg', '三星笔记本', '8999', '2019-12-31');

-- ----------------------------
-- Table structure for `tupian`
-- ----------------------------
DROP TABLE IF EXISTS `tupian`;
CREATE TABLE `tupian` (
  `id` int(30) DEFAULT NULL,
  `phonephoto` char(30) NOT NULL DEFAULT '',
  `jieshao` char(200) DEFAULT NULL,
  PRIMARY KEY (`phonephoto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tupian
-- ----------------------------
INSERT INTO `tupian` VALUES ('1', '3.jfif', 'DELL G3为DELL2019年打造的一款兼顾游戏与办公的入门游戏本。其外观体现了DELL系列游戏本一贯的美观简洁，虽为塑料机身，但其做工不输于等同价位的其他金属机身的笔记本');

-- ----------------------------
-- Table structure for `yonghuzhuce`
-- ----------------------------
DROP TABLE IF EXISTS `yonghuzhuce`;
CREATE TABLE `yonghuzhuce` (
  `用户名` char(30) NOT NULL DEFAULT '',
  `密码` char(30) NOT NULL,
  PRIMARY KEY (`用户名`,`密码`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yonghuzhuce
-- ----------------------------
INSERT INTO `yonghuzhuce` VALUES ('159', '159');
INSERT INTO `yonghuzhuce` VALUES ('753', '753');
INSERT INTO `yonghuzhuce` VALUES ('acyg', '15820317818');
