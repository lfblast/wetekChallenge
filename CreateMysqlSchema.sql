CREATE DATABASE `wetekchallenge` /*!40100 DEFAULT CHARACTER SET latin1 */;

CREATE TABLE `channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `channelId` varchar(255) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `icon_src` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=latin1;