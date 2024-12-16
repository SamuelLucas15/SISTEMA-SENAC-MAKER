-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: testes1
-- ------------------------------------------------------
-- Server version	8.4.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descr` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Máquina'),(2,'Equipamentos'),(3,'Robótica'),(4,'Impressora');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `id` int NOT NULL AUTO_INCREMENT,
  `qtd` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `stts` tinyint(1) NOT NULL,
  `id_cat` int DEFAULT NULL,
  `id_uni_med` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_uni_med` (`id_uni_med`),
  KEY `fk_id_cat` (`id_cat`),
  CONSTRAINT `fk_id_cat` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id`),
  CONSTRAINT `fk_id_uni_med` FOREIGN KEY (`id_uni_med`) REFERENCES `uni_med` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` VALUES (1,500,'Filamento','Material utilizado para impressão 3D, disponível em diferentes tipos e cores, proporcionando qualidade e resistência nas peças produzidas.',1,4,1),(2,250,'Arduino','Placa de desenvolvimento de código aberto que permite a criação de diversos projetos eletrônicos, como automação e robótica.',1,3,1),(3,20,'Óculos VR','Óculos de realidade virtual que proporcionam uma imersão em ambientes digitais, usados para jogos, simulações e entretenimento.',1,2,1),(4,5,'Aerógrafo','Equipamento usado para aplicar tinta de forma controlada, muito utilizado em pinturas detalhadas, customizações e arte.',1,2,1),(5,645,'teste1 pelo site','tasfiasfbsjes ã â á',1,2,1);
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `reserva` (
  `id` int NOT NULL AUTO_INCREMENT,
  `stts` enum('Pendente','Em andamento','Concluído') NOT NULL,
  `solicitante` varchar(255) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `dt` date NOT NULL,
  `hr_i` time NOT NULL,
  `hr_f` time NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_us` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_us` (`id_us`),
  CONSTRAINT `fk_id_us` FOREIGN KEY (`id_us`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` VALUES (2,'Concluído','Sofia Lima','Testes de sensores avançados','2024-12-08','11:30:00','13:30:00','sofia.lima@gmail.com',2),(3,'Concluído','Gabriel Lucas','Montagem de protótipos','2024-12-04','09:00:00','11:00:00','gabriel.lucas@gmail.com',1),(4,'Concluído','Ana Clara','Revisão de projetos','2024-12-05','13:30:00','15:30:00','ana.clara@gmail.com',2),(5,'Concluído','João Silva','Aula de robótica','2024-12-06','08:00:00','10:00:00','joao.silva@gmail.com',1),(6,'Concluído','Mariana Souza','Testes de componentes','2024-12-06','14:00:00','16:00:00','mariana.souza@gmail.com',2),(7,'Pendente','Carlos Eduardo','Manutenção de equipamentos','2024-12-14','09:30:00','11:30:00','carlos.eduardo@gmail.com',1),(8,'Pendente','Beatriz Alves','Organização do laboratório','2024-12-15','10:30:00','12:30:00','beatriz.alves@gmail.com',2),(9,'Pendente','Lucas Martins','Montagem de circuitos','2024-12-16','13:00:00','15:00:00','lucas.martins@gmail.com',1),(10,'Pendente','Camila Ferreira','Preparação de materiais','2024-12-17','08:30:00','10:30:00','camila.ferreira@gmail.com',2),(11,'Pendente','Pedro Henrique','Testes de sensores','2024-12-18','09:00:00','11:00:00','pedro.henrique@gmail.com',1),(12,'Pendente','Sofia Lima','Capacitação em Arduino','2024-12-19','14:30:00','16:30:00','sofia.lima@gmail.com',2),(13,'Pendente','Gabriel Lucas','Ajustes em projetos','2024-12-20','13:00:00','15:30:00','gabriel.lucas@gmail.com',1),(14,'Pendente','Ana Clara','Organização do estoque','2024-12-21','08:30:00','10:30:00','ana.clara@gmail.com',2),(15,'Pendente','João Silva','Capacitação em robótica','2024-12-22','09:00:00','11:30:00','joao.silva@gmail.com',1),(16,'Pendente','Mariana Souza','Treinamento em montagem','2024-12-23','13:30:00','15:30:00','mariana.souza@gmail.com',2),(17,'Pendente','Carlos Eduardo','Atualização de software','2024-12-24','10:00:00','12:00:00','carlos.eduardo@gmail.com',1),(18,'Pendente','Beatriz Alves','Limpeza de equipamentos','2024-12-25','14:00:00','16:00:00','beatriz.alves@gmail.com',2),(19,'Pendente','Lucas Martins','Preparação para aula','2024-12-26','09:00:00','11:00:00','lucas.martins@gmail.com',1),(20,'Pendente','Camila Ferreira','Teste de motores','2024-12-27','13:00:00','15:30:00','camila.ferreira@gmail.com',2),(21,'Pendente','Pedro Henrique','Atualização de sistemas','2024-12-28','10:30:00','12:30:00','pedro.henrique@gmail.com',1);
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resmat`
--

DROP TABLE IF EXISTS `resmat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `resmat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `qtd_uti` int NOT NULL,
  `id_res` int DEFAULT NULL,
  `id_mat` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_res` (`id_res`),
  KEY `fk_id_mat` (`id_mat`),
  CONSTRAINT `fk_id_mat` FOREIGN KEY (`id_mat`) REFERENCES `material` (`id`),
  CONSTRAINT `fk_id_res` FOREIGN KEY (`id_res`) REFERENCES `reserva` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resmat`
--

LOCK TABLES `resmat` WRITE;
/*!40000 ALTER TABLE `resmat` DISABLE KEYS */;
INSERT INTO `resmat` VALUES (1,20,2,2),(21,10,21,1),(22,15,3,1),(23,12,4,2),(24,8,5,1),(25,6,6,2),(26,14,7,1),(27,18,8,2),(28,25,9,1),(29,30,10,2),(30,5,11,1),(31,9,12,2),(32,7,13,1),(33,11,14,2),(34,16,15,1),(35,22,16,2),(36,4,17,1),(37,3,18,2),(38,13,19,1),(39,20,20,2);
/*!40000 ALTER TABLE `resmat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `tipo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descr` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo`
--

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` VALUES (1,'Monitor(a)'),(2,'Coordenador(a)');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uni_med`
--

DROP TABLE IF EXISTS `uni_med`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `uni_med` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descr` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uni_med`
--

LOCK TABLES `uni_med` WRITE;
/*!40000 ALTER TABLE `uni_med` DISABLE KEYS */;
INSERT INTO `uni_med` VALUES (1,'Unidade'),(2,'Quilograma'),(3,'Litro'),(4,'Grama');
/*!40000 ALTER TABLE `uni_med` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cpf` char(11) NOT NULL,
  `senha` varchar(120) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `stts` tinyint(1) NOT NULL,
  `data_nasc` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_tipo` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_tipo` (`id_tipo`),
  CONSTRAINT `fk_id_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'12345678901','$2y$10$XNVrSAkyfx5.UYcFCum70uvIgqmdc7P9PZAzZG0OTd7g3WGDWAEru','Luís Felipe',1,'1989-08-30','luisfelipe@gmail.com',1),(2,'34568390547','$2y$10$5f0lRrlsw9496x92TfLoYuxuaSLaoTpqr1ISDXGWRL9egHhWOhoEq','Valdelucia Maria',1,'1975-10-30','valdeluciaM@gmail.com',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-09 13:07:48
