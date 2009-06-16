
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `gid` bigint(20) NOT NULL,
  `name` varchar(2048) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `image` varchar(2047) default NULL,
  `query` varchar(2047) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `gid` (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;