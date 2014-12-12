/*
Navicat MySQL Data Transfer

Source Server         : Vagrant
Source Server Version : 50538
Source Host           : 127.0.01:3306
Source Database       : project

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2014-09-23 15:40:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for Categories
-- ----------------------------
DROP TABLE IF EXISTS `Categories`;
CREATE TABLE `Categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Cat_name` varchar(255) NOT NULL,
  `Active` int(255) NOT NULL,
  `CreationDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of Categories
-- ----------------------------
INSERT INTO `Categories` VALUES ('1', 'Project Management', '1', '2014-09-21');
INSERT INTO `Categories` VALUES ('2', 'Programmeren', '1', '2014-09-21');

-- ----------------------------
-- Table structure for Projects
-- ----------------------------
DROP TABLE IF EXISTS `Projects`;
CREATE TABLE `Projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectName` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Catagorie` int(255) NOT NULL,
  `Active` int(255) NOT NULL,
  `CreationDate` date NOT NULL,
  `Open` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of Projects
-- ----------------------------
INSERT INTO `Projects` VALUES ('1', 'Agile Scrum', 'Exin Agile Scrum foundation', '1', '1', '0000-00-00', '1');
INSERT INTO `Projects` VALUES ('2', 'Prince2 Foundation', 'Exin Prince2 Foundation', '1', '1', '0000-00-00', '1');
INSERT INTO `Projects` VALUES ('3', 'JAVA programmeren', 'JAVA programmeren', '2', '1', '0000-00-00', '1');
INSERT INTO `Projects` VALUES ('4', 'HTML 5', 'HTML 5', '2', '1', '0000-00-00', '1');
INSERT INTO `Projects` VALUES ('5', 'Android', 'Android', '2', '1', '0000-00-00', '0');
INSERT INTO `Projects` VALUES ('9', 'ASL Foundation', 'ASL foundation exam', '1', '1', '2014-09-21', '1');
INSERT INTO `Projects` VALUES ('11', 'test', 'test', '2', '1', '2014-09-21', '1');

-- ----------------------------
-- Table structure for Tasks
-- ----------------------------
DROP TABLE IF EXISTS `Tasks`;
CREATE TABLE `Tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TaskName` varchar(255) NOT NULL,
  `CreationDate` date NOT NULL,
  `Active` int(255) NOT NULL,
  `Project` int(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of Tasks
-- ----------------------------
INSERT INTO `Tasks` VALUES ('1', 'Task1', '0000-00-00', '1', '1', 'Order Book');
INSERT INTO `Tasks` VALUES ('2', 'Task2', '0000-00-00', '1', '1', 'Book Exam');

-- ----------------------------
-- Table structure for Users
-- ----------------------------
DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastlogin` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of Users
-- ----------------------------
INSERT INTO `Users` VALUES ('14', 'Radek@test.nl', '4ca1aba685499ebf4e33462f99bf634e', '2014-09-21');
