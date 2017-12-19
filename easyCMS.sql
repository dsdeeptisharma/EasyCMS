-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: CMS
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `easy_pages`
--

DROP TABLE IF EXISTS `easy_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `easy_pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(150) NOT NULL,
  `page_text` text NOT NULL,
  `page_description` text,
  `created_date` datetime NOT NULL,
  `page_active` int(1) NOT NULL DEFAULT '1',
  `edit_date` datetime NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `easy_pages`
--

LOCK TABLES `easy_pages` WRITE;
/*!40000 ALTER TABLE `easy_pages` DISABLE KEYS */;
INSERT INTO `easy_pages` VALUES (1,'About','Hello everyone. I am Deepti Sharma. I belong to Ludhiana and currently pursuing B.tech in Computer Science. I believe that Learning is Earning. I have a keen interest in writing and creating new things with unique ideas. Apart from this I just love MUSIC, either it’s about listening songs or about singing.
I have developed a keen interest in trying practical things and just love helping others. I also blog about my everyday experiences and my random thoughts 😉.','about us page','0000-00-00 00:00:00',1,'2017-07-21 11:23:44'),(2,'Explore Us','Easy CMS is the best, lightest, most amazing CMS.Its fast, awfully quick and astoundingly light. It has been developed using the latest technologies. You do not have to be a techie to use Easy CMS. All you need to do is sip on your coffee and write. Easy CMS will manage all the content like a piece of cake.','Explore page','0000-00-00 00:00:00',1,'0000-00-00 00:00:00'),(3,'test Page Title','test Page Content updated again','test Page description','2017-07-19 14:33:07',1,'2017-07-21 11:28:50');
/*!40000 ALTER TABLE `easy_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `easy_posts`
--

DROP TABLE IF EXISTS `easy_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `easy_posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(300) NOT NULL,
  `post_text` text NOT NULL,
  `date_of_post` datetime DEFAULT NULL,
  `post_active` int(1) NOT NULL DEFAULT '1',
  `date_of_edit` datetime NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `easy_posts`
--

LOCK TABLES `easy_posts` WRITE;
/*!40000 ALTER TABLE `easy_posts` DISABLE KEYS */;
INSERT INTO `easy_posts` VALUES (1,'Projects and Tasks','Everything in Gradle sits on top of two basic concepts: projects and tasks.\r\nEvery Gradle build is made up of one or more projects. What a project represents depends on what it is that you\r\nare doing with Gradle. For example, a project might represent a library JAR or a web application. It might\r\nrepresent a distribution ZIP assembled from the JARs produced by other projects. A project does not necessarily\r\nrepresent a thing to be built. It might represent a thing to be done, such as deploying your application to staging\r\nor production environments. Don\'t worry if this seems a little vague for now. Gradle\'s build-by-convention\r\nsupport adds a more concrete definition for what a project is.\r\nEach project is made up of one or more tasks. A task represents some atomic piece of work which a build\r\nperforms. This might be compiling some classes, creating a JAR, generating javadoc, or publishing some\r\narchives to a repository.\r\nFor now, we will look at defining some simple tasks in a build with one project. Later chapters will look at\r\nworking with multiple projects and more about working with projects and tasks.','2017-07-19 13:12:59',1,'0000-00-00 00:00:00'),(2,'fgdfg',' fdgd g fdgdfgfdg ','2017-07-19 14:12:46',0,'0000-00-00 00:00:00'),(3,'test post title','test post text  ','2017-07-19 14:15:02',1,'0000-00-00 00:00:00'),(4,'last test','last test post text','2017-07-19 14:16:31',1,'2017-07-21 11:50:29');
/*!40000 ALTER TABLE `easy_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `easy_roles`
--

DROP TABLE IF EXISTS `easy_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `easy_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `easy_roles`
--

LOCK TABLES `easy_roles` WRITE;
/*!40000 ALTER TABLE `easy_roles` DISABLE KEYS */;
INSERT INTO `easy_roles` VALUES (1,'Admin'),(2,'Moderator');
/*!40000 ALTER TABLE `easy_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `easy_users`
--

DROP TABLE IF EXISTS `easy_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `easy_users` (
  `user_id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'User Id',
  `user_name` varchar(50) NOT NULL,
  `user_password` text NOT NULL,
  `user_role` int(11) NOT NULL,
  `user_fullname` varchar(70) NOT NULL,
  `user_active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='The table stores information about the users';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `easy_users`
--

LOCK TABLES `easy_users` WRITE;
/*!40000 ALTER TABLE `easy_users` DISABLE KEYS */;
INSERT INTO `easy_users` VALUES (1,'admin','password',1,'Administrator',1),(2,'user','password',1,'Deepti Sharma',1),(3,'amankaur90','password',2,'aman kaur',1),(4,'racdua','pass',1,'rachita',1),(7,'rachdua','5f4dcc3b5aa765d61d8327deb882cf99',1,'rachiitta',1),(8,'deepti','8277e0910d750195b448797616e091ad',2,'Deepti',0),(9,'lenovo','5f4dcc3b5aa765d61d8327deb882cf99',2,'lenovo',1),(11,'admin1','5f4dcc3b5aa765d61d8327deb882cf99',1,'admin',1);
/*!40000 ALTER TABLE `easy_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-21 12:23:42

