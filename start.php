<?

include_once "backend.php";

connect();

$sql = "DROP TABLE IF EXISTS `actions`;CREATE TABLE `actions` (
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


LOCK TABLES `actions` WRITE;
UNLOCK TABLES;
DROP TABLE IF EXISTS `group_group_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_group_mapping` (
  `contained_id` int(11) NOT NULL,
  `container_id` int(11) NOT NULL,
  PRIMARY KEY (`contained_id`,`container_id`),
  KEY `container_fk` (`container_id`),
  CONSTRAINT `contained_fk` FOREIGN KEY (`contained_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `container_fk` FOREIGN KEY (`container_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `group_group_mapping` WRITE;
UNLOCK TABLES;

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `groups` WRITE;
UNLOCK TABLES;

DROP TABLE IF EXISTS `permission_sets`;
CREATE TABLE `permission_sets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_allowed` tinyint(1) NOT NULL,
  `group_id` int(11) NOT NULL,
  `resource_uri` varchar(255) NOT NULL,
  `action_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_permisson_fk` (`group_id`),
  KEY `resource_fk` (`resource_uri`),
  KEY `action_fk` (`action_name`),
  CONSTRAINT `group_permisson_fk` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `resource_fk` FOREIGN KEY (`resource_uri`) REFERENCES `resources` (`uri`) ON DELETE CASCADE,
  CONSTRAINT `action_fk` FOREIGN KEY (`action_name`) REFERENCES `actions` (`name`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `permission_sets` WRITE;
UNLOCK TABLES;


DROP TABLE IF EXISTS `resources`;
CREATE TABLE `resources` (
  `uri` varchar(255) NOT NULL,
  PRIMARY KEY (`uri`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `resources` WRITE;
UNLOCK TABLES;

DROP TABLE IF EXISTS `user_group_mapping`;
CREATE TABLE `user_group_mapping` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `group_fk` (`group_id`),
  CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `group_fk` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user_group_mapping` WRITE;
UNLOCK TABLES;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
UNLOCK TABLES;

";

$success = mysql_query($query, $LINK);

if ($success) {
    echo "SUCCESS";
} else {
    echo "FAILURE " . mysql_error();
}