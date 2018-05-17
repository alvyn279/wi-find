DROP TABLE IF EXISTS `administrator`;

CREATE TABLE `administrator`(
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

INSERT INTO `administrator` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'wifind', 'wifind');