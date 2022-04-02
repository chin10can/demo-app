-- -------------------------------------------------------------
-- TablePlus 3.12.2(358)
--
-- https://tableplus.com/
--
-- Database: slim
-- Generation Time: 2022-04-01 20:47:30.6410
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `shipments`;
CREATE TABLE `shipments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `address` text,
  `weight` int DEFAULT NULL,
  `height` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `shipments` (`id`, `user_id`, `address`, `weight`, `height`) VALUES
('1', '1', 'test address', '12', '11');

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
('1', 'john doe', 'johndoe@gmail.com', 'password', '2022-04-01 20:46:36', '2017-08-06 11:47:24'),
('2', 'Chintan', 'chintan@email.com', 'password', '2022-04-01 20:46:36', '2017-08-06 11:47:24'),
('3', 'Jane Doe', 'jane@email.com', 'password', '2022-04-01 20:46:36', '2017-08-06 17:06:57'),
('4', 'jane doe', 'janedoe@111.com', 'password', '2022-04-01 20:46:36', '2022-03-31 20:27:46'),
('5', 'jane doe', 'janedoe@222.com', 'password', '2022-04-01 20:46:36', '2022-03-31 20:28:40'),
('6', 'jane doe', 'janedoe@333.com', 'password', '2022-04-01 20:46:36', '2022-03-31 20:29:16'),
('7', 'jane doe', 'janedoe@444.com', 'password', '2022-04-01 20:46:36', '2022-03-31 20:29:17'),
('8', 'jane doe', 'janedoe@555.com', 'password', '2022-04-01 20:46:36', '2022-03-31 20:29:18'),
('9', 'jane doe', 'janedoe@666.com', 'password', '2022-04-01 20:46:36', '2022-03-31 20:29:18'),
('10', 'jane doe', 'janedoe@777.com', 'password', '2022-04-01 20:46:36', '2022-03-31 20:29:19');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;