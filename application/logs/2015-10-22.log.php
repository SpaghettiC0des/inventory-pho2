<?php defined('SYSPATH') or die('No direct script access.'); ?>

2015-10-22 04:35:34 +02:00 --- error: Uncaught PHP Error: Creating default object from empty value in file C:/xampp/htdocs/kohana/application/controllers/auth.php on line 38
2015-10-22 04:36:00 +02:00 --- error: Uncaught Kohana_Database_Exception: There was an SQL error: Unknown column 'username' in 'where clause' - SELECT `roles`.*
FROM (`roles`)
WHERE `username` = '='
ORDER BY `roles`.`id` ASC
LIMIT 0, 1 in file C:/xampp/htdocs/kohana/system/libraries/drivers/Database/Mysqli.php on line 142
2015-10-22 04:37:09 +02:00 --- error: Uncaught Kohana_Database_Exception: There was an SQL error: Duplicate entry 'testauth' for key 'uniq_username' - INSERT INTO `users` (`username`, `password`, `email`) VALUES ('testauth', 'e1bc3fcc4396de63b55feed90c78866ed1404d87610305986b', 'blah@g.com') in file C:/xampp/htdocs/kohana/system/libraries/drivers/Database/Mysqli.php on line 142
2015-10-22 04:37:36 +02:00 --- error: Uncaught PHP Error: Argument 1 passed to ORM_Core::add() must be an instance of ORM, string given, called in C:\xampp\htdocs\kohana\application\controllers\auth.php on line 40 and defined in file C:/xampp/htdocs/kohana/system/libraries/ORM.php on line 966
2015-10-22 04:40:11 +02:00 --- error: Uncaught PHP Error: Argument 1 passed to ORM_Core::add() must be an instance of ORM, string given, called in C:\xampp\htdocs\kohana\application\controllers\auth.php on line 41 and defined in file C:/xampp/htdocs/kohana/system/libraries/ORM.php on line 966
2015-10-22 05:01:36 +02:00 --- error: Uncaught PHP Error: Argument 1 passed to ORM_Core::add() must be an instance of ORM, string given, called in C:\xampp\htdocs\kohana\application\controllers\auth.php on line 33 and defined in file C:/xampp/htdocs/kohana/system/libraries/ORM.php on line 966
2015-10-22 05:05:50 +02:00 --- error: Uncaught PHP Error: Argument 1 passed to ORM_Core::add() must be an instance of ORM, string given, called in C:\xampp\htdocs\kohana\application\controllers\auth.php on line 33 and defined in file C:/xampp/htdocs/kohana/system/libraries/ORM.php on line 966
2015-10-22 12:19:20 +02:00 --- error: Uncaught Kohana_404_Exception: The page you requested, auth, could not be found. in file C:/xampp/htdocs/kohana/system/core/Kohana.php on line 841
2015-10-22 12:24:50 +02:00 --- error: Uncaught Kohana_Database_Exception: There was an SQL error: Duplicate entry 'user1' for key 'uniq_username' - INSERT INTO `users` (`email`, `username`, `password`) VALUES ('email@1.com', 'user1', '66dffd6d57283fa94f7506ed618cb22a17a0eb78b2a3fe68db') in file C:/xampp/htdocs/kohana/system/libraries/drivers/Database/Mysqli.php on line 142
2015-10-22 12:27:21 +02:00 --- error: Uncaught Kohana_Exception: The role property does not exist in the User_Model class. in file C:/xampp/htdocs/kohana/system/libraries/ORM.php on line 364
2015-10-22 13:17:43 +02:00 --- error: Uncaught Kohana_404_Exception: The page you requested, kohana.png, could not be found. in file C:/xampp/htdocs/kohana/system/core/Kohana.php on line 841
2015-10-22 13:21:21 +02:00 --- error: Uncaught Kohana_404_Exception: The page you requested, kohana.png, could not be found. in file C:/xampp/htdocs/kohana/system/core/Kohana.php on line 841
2015-10-22 13:22:22 +02:00 --- error: Uncaught Kohana_404_Exception: The page you requested, kohana.png, could not be found. in file C:/xampp/htdocs/kohana/system/core/Kohana.php on line 841
2015-10-22 13:22:47 +02:00 --- error: Uncaught Kohana_404_Exception: The page you requested, kohana.png, could not be found. in file C:/xampp/htdocs/kohana/system/core/Kohana.php on line 841
