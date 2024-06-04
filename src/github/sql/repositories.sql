CREATE TABLE `repositories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `html_url` varchar(255) DEFAULT NULL,
  `description` varchar(8192) DEFAULT NULL,
  `homepage` varchar(255) DEFAULT NULL,
  `language` varchar(32) DEFAULT NULL,
  `stargazers_count` int(11) DEFAULT NULL,
  `watchers_count` int(11) DEFAULT NULL,
  `forks_count` int(11) DEFAULT NULL,
  `open_issues_count` int(11) DEFAULT NULL,
  `score` float DEFAULT NULL,
  `license_key` varchar(32) DEFAULT NULL,
  `license_name` varchar(64) DEFAULT NULL,
  `readme_size` int(11) DEFAULT NULL,
  `readme_has_images` int(1) DEFAULT NULL,
  `readme_has_icons` int(1) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=773749314 DEFAULT CHARSET=utf8;