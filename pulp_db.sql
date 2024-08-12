-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: pulp_db
-- ------------------------------------------------------
-- Server version	5.6.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `diseases`
--

DROP TABLE IF EXISTS `diseases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `diseases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_aid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diseases`
--

LOCK TABLES `diseases` WRITE;
/*!40000 ALTER TABLE `diseases` DISABLE KEYS */;
INSERT INTO `diseases` VALUES (1,'D01','Pulpitis Reversibel','Pulpitis reversibel adalah radang pulpa yang ringan. Radang hanya akan dirasakan ketika terdapat rangsangan, jika penyebab radang dihilangkan maka pulpa akan kembali normal.','Segera kunjungi dokter untuk pemeriksaan lebih lanjut.','2024-08-12 01:27:38','2024-08-12 01:27:38'),(2,'D02','Pulpitis Irreversibel','Pulpitis irreversibel adalah radang pulpa yang akan dirasakan ketika terdapat rangsangan. Namun pulpa tidak akan kembali normal meskipun penyebab radang dihilangkan.','Segera kunjungi dokter untuk pemeriksaan lebih lanjut.','2024-08-12 01:27:38','2024-08-12 01:27:38'),(3,'D03','Nekrosis Pulpa','Nekrosis pulpa adalah keadaan pulpa yang sudah mati, aliran pembuluh darah sudah tidak ada, dan syaraf pulpa sudah tidak berfungsi kembali. Oleh sebab itu pasien dengan penderita nekrosis pulpa tidak merasakan radang gigi.','Segera kunjungi dokter untuk pemeriksaan lebih lanjut.','2024-08-12 01:27:38','2024-08-12 01:27:38');
/*!40000 ALTER TABLE `diseases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `histories`
--

DROP TABLE IF EXISTS `histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `histories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `patient_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result` bigint(20) unsigned DEFAULT NULL,
  `cf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `histories_user_id_index` (`user_id`),
  KEY `histories_result_index` (`result`),
  CONSTRAINT `histories_result_foreign` FOREIGN KEY (`result`) REFERENCES `diseases` (`id`) ON DELETE CASCADE,
  CONSTRAINT `histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `histories`
--

LOCK TABLES `histories` WRITE;
/*!40000 ALTER TABLE `histories` DISABLE KEYS */;
/*!40000 ALTER TABLE `histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history_details`
--

DROP TABLE IF EXISTS `history_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `history_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `history_id` bigint(20) unsigned DEFAULT NULL,
  `rule_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `history_details_history_id_index` (`history_id`),
  KEY `history_details_rule_id_index` (`rule_id`),
  CONSTRAINT `history_details_history_id_foreign` FOREIGN KEY (`history_id`) REFERENCES `histories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `history_details_rule_id_foreign` FOREIGN KEY (`rule_id`) REFERENCES `rules` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history_details`
--

LOCK TABLES `history_details` WRITE;
/*!40000 ALTER TABLE `history_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `history_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_09_04_095710_create_diseases_table',2),(6,'2022_09_04_095740_create_symptoms_table',2),(7,'2022_09_04_095756_create_rules_table',2),(8,'2022_09_04_095816_create_histories_table',2),(9,'2022_09_05_072932_create_history_details_table',2),(10,'2022_10_10_055203_create_roles_table',2),(11,'2022_10_10_055222_create_role_user_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'ROLE_ADMIN','admin role','2024-08-12 01:27:38','2024-08-12 01:27:38'),(2,'ROLE_UNKNOWN','random person try to register','2024-08-12 01:27:38','2024-08-12 01:27:38');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rules`
--

DROP TABLE IF EXISTS `rules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `disease_id` bigint(20) unsigned DEFAULT NULL,
  `symptom_id` bigint(20) unsigned DEFAULT NULL,
  `mb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `md` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rules_disease_id_index` (`disease_id`),
  KEY `rules_symptom_id_index` (`symptom_id`),
  CONSTRAINT `rules_disease_id_foreign` FOREIGN KEY (`disease_id`) REFERENCES `diseases` (`id`) ON DELETE CASCADE,
  CONSTRAINT `rules_symptom_id_foreign` FOREIGN KEY (`symptom_id`) REFERENCES `symptoms` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rules`
--

LOCK TABLES `rules` WRITE;
/*!40000 ALTER TABLE `rules` DISABLE KEYS */;
INSERT INTO `rules` VALUES (1,1,1,'1','0.2','0.8','2024-08-12 01:27:38','2024-08-12 01:27:38'),(2,1,2,'1','0.4','0.6','2024-08-12 01:27:38','2024-08-12 01:27:38'),(3,1,3,'1','0.4','0.6','2024-08-12 01:27:38','2024-08-12 01:27:38'),(4,1,6,'1','0.2','0.8','2024-08-12 01:27:38','2024-08-12 01:27:38'),(5,1,14,'0.6','0.4','0.2','2024-08-12 01:27:38','2024-08-12 01:27:38'),(6,1,17,'0.4','0.6','-0.2','2024-08-12 01:27:38','2024-08-12 01:27:38'),(7,1,18,'0.4','0.6','-0.2','2024-08-12 01:27:38','2024-08-12 01:27:38'),(8,2,2,'1','0.4','0.6','2024-08-12 01:27:38','2024-08-12 01:27:38'),(9,2,3,'1','0.4','0.6','2024-08-12 01:27:38','2024-08-12 01:27:38'),(10,2,4,'1','0.2','0.8','2024-08-12 01:27:38','2024-08-12 01:27:38'),(11,2,5,'1','0.2','0.8','2024-08-12 01:27:38','2024-08-12 01:27:38'),(12,2,6,'1','0.2','0.8','2024-08-12 01:27:38','2024-08-12 01:27:38'),(13,2,9,'0.6','0.4','0.2','2024-08-12 01:27:38','2024-08-12 01:27:38'),(14,2,10,'0.6','0.4','0.2','2024-08-12 01:27:38','2024-08-12 01:27:38'),(15,2,15,'1','0.2','0.8','2024-08-12 01:27:38','2024-08-12 01:27:38'),(16,2,16,'0.6','0.4','0.2','2024-08-12 01:27:38','2024-08-12 01:27:38'),(17,2,18,'1','0.2','0.8','2024-08-12 01:27:38','2024-08-12 01:27:38'),(18,3,6,'1','0.2','0.8','2024-08-12 01:27:38','2024-08-12 01:27:38'),(19,3,7,'0.6','0.4','0.2','2024-08-12 01:27:38','2024-08-12 01:27:38'),(20,3,8,'0.6','0.4','0.2','2024-08-12 01:27:38','2024-08-12 01:27:38'),(21,3,10,'0.6','0.4','0.2','2024-08-12 01:27:38','2024-08-12 01:27:38'),(22,3,11,'1','0.2','0.8','2024-08-12 01:27:38','2024-08-12 01:27:38'),(23,3,12,'1','0.2','0.8','2024-08-12 01:27:38','2024-08-12 01:27:38'),(24,3,13,'1','0.6','0.4','2024-08-12 01:27:38','2024-08-12 01:27:38'),(25,3,17,'1','0.2','0.8','2024-08-12 01:27:38','2024-08-12 01:27:38'),(26,3,18,'0.4','0.6','-0.2','2024-08-12 01:27:38','2024-08-12 01:27:38');
/*!40000 ALTER TABLE `rules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `symptoms`
--

DROP TABLE IF EXISTS `symptoms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `symptoms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `symptoms`
--

LOCK TABLES `symptoms` WRITE;
/*!40000 ALTER TABLE `symptoms` DISABLE KEYS */;
INSERT INTO `symptoms` VALUES (1,'S01','Rasa sakit tajam yang hanya sebentar','2024-08-12 01:27:38','2024-08-12 01:27:38'),(2,'S02','Sensitif terhadap makanan manis atau masam','2024-08-12 01:27:38','2024-08-12 01:27:38'),(3,'S03','Sensitif terhadap dingin atau panas','2024-08-12 01:27:38','2024-08-12 01:27:38'),(4,'S04','Nyeri spontan atau nyeri datang tiba-tiba','2024-08-12 01:27:38','2024-08-12 01:27:38'),(5,'S05','Mempunyai riwayat sakit gigi yang berlangsung lama','2024-08-12 01:27:38','2024-08-12 01:27:38'),(6,'S06','Terdapat lubang pada gigi','2024-08-12 01:27:38','2024-08-12 01:27:38'),(7,'S07','Bila mengunyah timbul rasa nyeri','2024-08-12 01:27:38','2024-08-12 01:27:38'),(8,'S08','Demam','2024-08-12 01:27:38','2024-08-12 01:27:38'),(9,'S09','Gusi mudah mengalami pendarahan','2024-08-12 01:27:38','2024-08-12 01:27:38'),(10,'S10','Pembengkakan pada gusi','2024-08-12 01:27:38','2024-08-12 01:27:38'),(11,'S11','Saat ini tidak ada nyeri','2024-08-12 01:27:38','2024-08-12 01:27:38'),(12,'S12','Pembusukan gigi','2024-08-12 01:27:38','2024-08-12 01:27:38'),(13,'S13','Berlubang besar','2024-08-12 01:27:38','2024-08-12 01:27:38'),(14,'S14','Sensitif terhadap udara dingin','2024-08-12 01:27:38','2024-08-12 01:27:38'),(15,'S15','Mengganggu tidur malam','2024-08-12 01:27:38','2024-08-12 01:27:38'),(16,'S16','Sakit kepala','2024-08-12 01:27:38','2024-08-12 01:27:38'),(17,'S17','Berwarna kehitaman','2024-08-12 01:27:38','2024-08-12 01:27:38'),(18,'S18','Nyeri','2024-08-12 01:27:38','2024-08-12 01:27:38');
/*!40000 ALTER TABLE `symptoms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'pulp_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-12  8:28:29
