# ************************************************************
# Sequel Ace SQL dump
# Version 20064
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.7.39)
# Database: gitlab
# Generation Time: 2024-03-29 19:04:25 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table projects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(8192) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `name_with_namespace` varchar(255) DEFAULT NULL,
  `default_branch` varchar(32) DEFAULT NULL,
  `ssh_url_to_repo` varchar(255) DEFAULT NULL,
  `http_url_to_repo` varchar(255) DEFAULT NULL,
  `web_url` varchar(255) DEFAULT NULL,
  `readme_url` varchar(255) DEFAULT NULL,
  `avatar_url` varchar(255) DEFAULT NULL,
  `forks_count` int(11) DEFAULT NULL,
  `star_count` int(11) DEFAULT NULL,
  `open_issues_count` int(11) DEFAULT NULL,
  `commit_count` int(11) DEFAULT NULL,
  `storage_size` int(11) DEFAULT NULL,
  `repository_size` int(11) DEFAULT NULL,
  `languages` varchar(1024) DEFAULT NULL,
  `namespace_id` int(11) DEFAULT NULL,
  `namespace_name` varchar(255) DEFAULT NULL,
  `empty_repo` int(1) DEFAULT NULL,
  `archived` int(1) DEFAULT NULL,
  `visibility` varchar(16) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `owner_username` varchar(255) DEFAULT NULL,
  `owner_name` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `license_key` varchar(32) DEFAULT NULL,
  `license_name` varchar(64) DEFAULT NULL,
  `readme_size` int(11) DEFAULT NULL,
  `readme_has_images` int(1) DEFAULT NULL,
  `readme_has_icons` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_activity_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
