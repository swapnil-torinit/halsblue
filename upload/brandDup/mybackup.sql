#
# TABLE STRUCTURE FOR: album
#

DROP TABLE IF EXISTS `album`;

CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `party_name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `bilty_number` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `status` int(11) NOT NULL,
  `reminder_date` date NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: notes
#

DROP TABLE IF EXISTS `notes`;

CREATE TABLE `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `status` int(11) NOT NULL,
  `reminder_date` datetime NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `notes` (`id`, `title`, `remark`, `status`, `reminder_date`, `created`) VALUES ('1', 'Bills Pending From Cult', 'Bansilal - 17 PU\r\nParveen ji - 7 PU\r\nBatra ji - 15 PU', '1', '2017-11-02 00:00:00', '2017-11-02');
INSERT INTO `notes` (`id`, `title`, `remark`, `status`, `reminder_date`, `created`) VALUES ('2', 'Automate Bill for Today', '12-Wheel Lock 160-origami', '1', '1970-01-01 00:00:00', '2017-11-02');
INSERT INTO `notes` (`id`, `title`, `remark`, `status`, `reminder_date`, `created`) VALUES ('3', 'jay ambey', '20 old swift bill pending', '1', '1970-01-01 00:00:00', '2017-11-02');
INSERT INTO `notes` (`id`, `title`, `remark`, `status`, `reminder_date`, `created`) VALUES ('5', 'Automate Bill for Today', '20 innova 20 wagonR 20 new swift 240 red tape', '1', '1970-01-01 00:00:00', '2017-11-06');


