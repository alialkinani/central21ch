-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: central21ch
-- ------------------------------------------------------
-- Server version	8.0.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `poets`
--

DROP TABLE IF EXISTS `poets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_of_death` date DEFAULT NULL,
  `mother_language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poets`
--

LOCK TABLES `poets` WRITE;
/*!40000 ALTER TABLE `poets` DISABLE KEYS */;
INSERT INTO `poets` VALUES (1,'Hermina','Moen','Iraqi','2006-08-29','1974-02-28','Arabic',NULL,'Atque voluptas dolorem et magni nihil et quisquam. Veniam eius architecto commodi minima. Laboriosam repellat at voluptates et autem eaque. Est occaecati laboriosam ipsam recusandae repellendus saepe saepe dolorem.','2018-10-15 11:58:09','2018-10-15 11:58:09'),(2,'Yesenia','Abbott','Iraqi','1998-11-19','1972-05-29','Arabic',NULL,'Debitis magnam vitae placeat sit at voluptas et. Eos est maxime quo iste tempora rerum dolor. Voluptatem incidunt enim repudiandae quaerat qui aut. Similique voluptatibus repellat eius explicabo tenetur dolores.','2018-10-15 11:58:09','2018-10-15 11:58:09'),(3,'Roy','Windler','Iraqi','2013-03-19','2011-10-31','Arabic',NULL,'Dicta rerum dolorum velit laudantium velit porro. Itaque laborum repellendus enim. Fuga enim quaerat aut voluptates iure.','2018-10-15 11:58:10','2018-10-15 11:58:10'),(4,'Cody','Hodkiewicz','Iraqi','1999-06-22','2015-05-04','Arabic',NULL,'Et quibusdam aut quia voluptate voluptatem nisi nihil. Dolore perspiciatis et consequatur. Suscipit aut error eum aspernatur necessitatibus et. Provident quod eaque ut est.','2018-10-15 11:58:10','2018-10-15 11:58:10'),(5,'Erick','Fahey','Iraqi','2004-02-26','2002-06-14','Arabic',NULL,'Tempora nesciunt in fugit ipsam et. Non vero modi labore vel animi. Vitae impedit eaque sunt hic at. Itaque perferendis corrupti voluptas blanditiis amet.','2018-10-15 11:58:11','2018-10-15 11:58:11'),(6,'Guy','Breitenberg','Iraqi','2005-07-26','1972-03-05','Arabic',NULL,'Saepe nam ducimus ab minima suscipit quis. Quia fugiat non ab deserunt. Eum ab delectus aut harum corporis placeat explicabo placeat. Rerum non vel ut veritatis et aut occaecati.','2018-10-15 11:58:11','2018-10-15 11:58:11'),(7,'Josefa','Fahey','Iraqi','2008-11-16','2017-05-13','Arabic',NULL,'Maxime minima molestiae ut rerum natus ad. Molestiae quia qui at deleniti fuga possimus nostrum. Perspiciatis fuga aut quo et necessitatibus rerum iure. Nisi ut eaque dolores eaque vitae quia corrupti.','2018-10-15 11:58:12','2018-10-15 11:58:12'),(8,'Abel','Altenwerth','Iraqi','2010-07-23','1989-08-03','Arabic',NULL,'Optio occaecati vel minus voluptatem. Ut impedit possimus veniam sit aperiam expedita amet. Facere libero sit harum non illo animi quod.','2018-10-15 11:58:12','2018-10-15 11:58:12'),(9,'Haylie','Rodriguez','Iraqi','1997-05-20','1979-06-24','Arabic',NULL,'Qui reprehenderit vero quod. Quaerat officia optio eos omnis aut dolores dolore. Tempora ut sequi nihil dolorum fuga qui.','2018-10-15 11:58:12','2018-10-15 11:58:12'),(10,'Tre','Zieme','Iraqi','2003-01-04','1987-01-09','Arabic',NULL,'Voluptatem ut vitae id quisquam ipsum dolores non. Ratione non ipsum maiores nihil et. Rerum eius necessitatibus sunt dolor ipsum consequatur. Enim sint optio facere temporibus sequi alias similique. Dolores neque voluptas iste.','2018-10-15 11:58:13','2018-10-15 11:58:13'),(11,'Vernie','Greenholt','Iraqi','1994-03-18','2008-03-09','Arabic',NULL,'Impedit sit sit laboriosam totam. Rem aut qui quod molestiae cumque. Laudantium accusamus eveniet dignissimos pariatur iusto mollitia aut. Provident vero et veniam et laboriosam itaque quia provident.','2018-10-15 11:58:13','2018-10-15 11:58:13'),(12,'Frieda','Crona','Iraqi','1999-01-17','2011-12-24','Arabic',NULL,'Quo saepe velit sit magnam quia accusamus provident accusamus. Et aliquam inventore minus voluptate ea qui. Dolorum est ut aspernatur aperiam quia eligendi. Voluptates ad modi fuga rerum eius iste.','2018-10-15 11:58:13','2018-10-15 11:58:13'),(13,'Nathanial','Cole','Iraqi','1987-07-29','2003-10-14','Arabic',NULL,'Aliquid ipsum consequatur quia a minima totam. Exercitationem sit ab modi consequatur rem consequuntur eos dolores. Aspernatur amet voluptatem aut iusto. Sint qui velit quia in totam ut veniam.','2018-10-15 11:58:14','2018-10-15 11:58:14'),(14,'Lorna','Hickle','Iraqi','2005-03-31','1985-06-21','Arabic',NULL,'Quos dolorem et commodi iste dolorem ut et. Et in repudiandae nisi et et aut eum. Consequatur in eligendi et at ut et itaque eos.','2018-10-15 11:58:15','2018-10-15 11:58:15'),(15,'Jacquelyn','Kirlin','Iraqi','1994-07-03','1977-01-29','Arabic',NULL,'Ut blanditiis ad fugit ut aliquam. Aliquid voluptates impedit vero quas maiores quaerat consectetur. Necessitatibus rerum nihil debitis perspiciatis quis dolor. Minima illum accusantium sint voluptates.','2018-10-15 11:58:16','2018-10-15 11:58:16'),(16,'Janelle','Wuckert','Iraqi','1987-03-19','1978-09-30','Arabic',NULL,'Quibusdam nulla accusantium accusamus quia et. Dolorum dolorem perspiciatis aut. Modi ut voluptatibus aut consequatur eaque. Est vel iure est deserunt qui.','2018-10-15 11:58:16','2018-10-15 11:58:16'),(17,'Aiden','Deckow','Iraqi','1978-09-30','2017-11-19','Arabic',NULL,'Aut sed placeat non sed. Et illo aperiam et quas repellendus. Eos blanditiis quae ullam rerum magnam.','2018-10-15 11:58:17','2018-10-15 11:58:17'),(18,'Bonita','Jacobson','Iraqi','2011-06-27','1994-06-03','Arabic',NULL,'Id necessitatibus nesciunt quas nesciunt laborum. Est architecto a sapiente quidem et atque consequatur. Labore qui esse recusandae.','2018-10-15 11:58:17','2018-10-15 11:58:17'),(19,'Kip','Walter','Iraqi','1992-12-29','1976-11-01','Arabic',NULL,'Sit excepturi rerum vel eos optio. Facilis ab quasi inventore nulla. Nulla rerum est amet.','2018-10-15 11:58:17','2018-10-15 11:58:17'),(20,'Chanelle','Schimmel','Iraqi','2005-01-01','1976-03-22','Arabic',NULL,'Explicabo doloremque saepe odio officia repellat eum. Dolorum in quae modi ut ut alias et. Facere ut quisquam corporis omnis neque velit velit. Est rem totam quidem distinctio pariatur.','2018-10-15 11:58:18','2018-10-15 11:58:18'),(21,'Ronaldo','Ritchie','Iraqi','2004-10-15','1985-03-14','Arabic','avatars/lY05Vv9xnjWUMorHVXmoX8rWPoigo2dc1kHIwm9m.jpeg','Ea optio nihil soluta et ipsam nobis voluptas. Voluptatem rerum nesciunt dolores et sint vel et. Animi quas repellendus debitis aspernatur ipsam et. Est quia accusantium dolorum cum nobis voluptas.','2018-10-15 11:58:18','2018-10-15 17:06:18'),(22,'Mariela','Hodkiewicz','Iraqi','2009-10-02','1970-05-22','Arabic',NULL,'Dignissimos architecto nisi cumque rem deserunt deserunt. Id perferendis voluptatem sit eum officiis. Minus ut debitis incidunt beatae et.','2018-10-15 11:58:19','2018-10-15 11:58:19'),(23,'Juwan','Luettgen','Iraqi','1984-12-14','2013-08-17','Arabic',NULL,'Rem voluptatem ratione sit ex. Perspiciatis quo recusandae tempore consequatur. Non libero vero voluptas suscipit eum sequi reiciendis explicabo.','2018-10-15 11:58:19','2018-10-15 11:58:19'),(24,'Juwan','Bernhard','Iraqi','1971-07-04','1975-11-09','Arabic',NULL,'Rerum fugiat voluptatibus enim possimus repellendus. Qui sed officia fugit veritatis velit est temporibus. Ipsam ut consectetur corrupti laudantium ducimus nesciunt.','2018-10-15 11:58:19','2018-10-15 11:58:19'),(25,'Magnus','Rutherford','Iraqi','1978-05-29','2015-05-20','Arabic',NULL,'Ut possimus fuga ea fugit nesciunt consequuntur enim. Est rerum perspiciatis corporis quo distinctio. Necessitatibus accusamus molestiae sed in quis maxime ut. Voluptatem voluptas et repellat.','2018-10-15 11:58:20','2018-10-15 11:58:20'),(26,'Ibrahim','White','Iraqi','1997-04-08','1970-05-15','Arabic',NULL,'Doloremque dolores voluptatem laboriosam officiis nulla ut. Alias quasi aut saepe et quod recusandae beatae. Totam vero aut sunt optio aut.','2018-10-15 11:58:20','2018-10-15 11:58:20'),(27,'Napoleon','Schiller','Iraqi','1998-04-28','2003-03-25','Arabic',NULL,'Saepe ipsum esse et. Excepturi quia ducimus nobis voluptatem. Consequuntur et dolores veritatis exercitationem accusamus fuga.','2018-10-15 11:58:20','2018-10-15 11:58:20'),(28,'Ezekiel','Bartoletti','Iraqi','1973-06-23','1975-10-18','Arabic',NULL,'Voluptatem tempora itaque iste tenetur incidunt illo. Ipsa voluptates dolorem voluptate est corrupti. Mollitia sed aspernatur ut iusto vitae libero aut. Aut eligendi beatae deleniti laudantium id voluptatem esse.','2018-10-15 11:58:21','2018-10-15 11:58:21'),(29,'Manuel','Keeling','Iraqi','2015-04-23','1980-08-29','Arabic',NULL,'Occaecati ratione natus possimus sint. Ut expedita qui voluptatem molestias. Non fugit reprehenderit nemo aut.','2018-10-15 11:58:22','2018-10-15 11:58:22'),(30,'Aida','Aufderhar','Iraqi','1993-11-16','2000-10-15','Arabic',NULL,'Ullam quis est quasi delectus doloremque. Ducimus in qui ad id ex qui. Aut nihil commodi quisquam.','2018-10-15 11:58:22','2018-10-15 11:58:22');
/*!40000 ALTER TABLE `poets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-16 21:19:06
