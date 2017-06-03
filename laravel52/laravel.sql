/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : laravel

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-06-03 16:46:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for binding
-- ----------------------------
DROP TABLE IF EXISTS `binding`;
CREATE TABLE `binding` (
  `email` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of binding
-- ----------------------------
INSERT INTO `binding` VALUES ('17726680984@163.com', '2016213170');

-- ----------------------------
-- Table structure for content
-- ----------------------------
DROP TABLE IF EXISTS `content`;
CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of content
-- ----------------------------
INSERT INTO `content` VALUES ('12', '123', '123');
INSERT INTO `content` VALUES ('13', '123', '123');
INSERT INTO `content` VALUES ('14', '123', '123');
INSERT INTO `content` VALUES ('15', '456', '456');
INSERT INTO `content` VALUES ('16', '456', '456');
INSERT INTO `content` VALUES ('17', '456', '456');
INSERT INTO `content` VALUES ('18', 'å…¬å‘Š', 'æ˜Žå¤©ä¸‰ç­è€ƒè¯•');
INSERT INTO `content` VALUES ('19', '123', '123');
INSERT INTO `content` VALUES ('20', 'qwe', 'asd');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for power
-- ----------------------------
DROP TABLE IF EXISTS `power`;
CREATE TABLE `power` (
  `email` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of power
-- ----------------------------
INSERT INTO `power` VALUES ('17726680984@163.com');
INSERT INTO `power` VALUES ('123@zas');
INSERT INTO `power` VALUES ('123@zas');
INSERT INTO `power` VALUES ('123@zas');
INSERT INTO `power` VALUES ('17726680988@163.com');

-- ----------------------------
-- Table structure for root
-- ----------------------------
DROP TABLE IF EXISTS `root`;
CREATE TABLE `root` (
  `email` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of root
-- ----------------------------
INSERT INTO `root` VALUES ('17726680984@163.com');
INSERT INTO `root` VALUES ('18022121327@163.com');

-- ----------------------------
-- Table structure for studentinfo
-- ----------------------------
DROP TABLE IF EXISTS `studentinfo`;
CREATE TABLE `studentinfo` (
  `number` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `major_number` int(11) DEFAULT NULL,
  `major_name` varchar(255) DEFAULT NULL,
  `college` varchar(255) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `school_status` varchar(255) DEFAULT NULL,
  `create_at` varchar(255) DEFAULT NULL,
  `uptimed_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of studentinfo
-- ----------------------------
INSERT INTO `studentinfo` VALUES ('2016213170', '??', '123', '123', '1112', '??????????', '???', '2016', '??', '1496424291', '2017-06-03 15:49:31');
INSERT INTO `studentinfo` VALUES ('2016213172', '???', '?', '11121603', '1112', '??????????', '???', '2016', '??', '1496424884', '0000-00-00 00:00:00');
INSERT INTO `studentinfo` VALUES ('2016213173', '???', '?', '11121603', '1112', '??????????', '???', '2016', '??', '1496425063', '0000-00-00 00:00:00');
INSERT INTO `studentinfo` VALUES ('2016213180', '???', '?', '11121603', '1112', '??????????', '???', '2016', '??', '1496477702', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'ZzzYyy', '17726680984@163.com', '$2y$10$NCvFM0Bqexf7EOCRqfxx6uMuhDeTsNkGMRIMCBnctDzvUd2xqfsGa', 'LXWV7JYERsqgLfSJqiich0K44AkVOgVGO7E1XKrmftneus8T94QNRTqMN6Tx', '2017-06-02 06:53:05', '2017-06-02 14:18:06');
INSERT INTO `users` VALUES ('2', 'qwe', '17726680986@163.com', '$2y$10$mW7Y1B/vU932vgplDDFA6OhMFLDedq7pa.w7.exVuMnI182pdC4aa', 'apYeLOhPiMGdKI2uUHREEKB9v3KDkqbcLWlinWovoZKg7L7fb2BfYWtPHi6B', '2017-06-02 13:04:13', '2017-06-02 13:05:30');
SET FOREIGN_KEY_CHECKS=1;
