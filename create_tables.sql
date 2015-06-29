CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(30) NOT NULL,
  `user_id` int(3) NOT NULL,
  `lastaccess` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `page` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
 
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` mediumtext NOT NULL,
  `role` int(1) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;