CREATE TABLE IF NOT EXISTS `additional_type` (
  `adty_id` int(11) NOT NULL AUTO_INCREMENT,
  `adty_trans_id` int(11) NOT NULL,
  `adty_type_id` int(11) NOT NULL,
  `adty_type_info` text NOT NULL,
  `adty_note` text NOT NULL,
  `adty_entrydate` datetime NOT NULL,
  PRIMARY KEY (`adty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;