-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: hortas
-- ------------------------------------------------------
-- Server version	8.0.26

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
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrador` (
  `cod_usuario` int NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_usuario`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (23,'hortasadm@hotmail.com','2883da1feccc80284572eb14af49dbf0');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `endereco` (
  `cod_endereco` int NOT NULL AUTO_INCREMENT,
  `rua` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `numero` varchar(5) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `cod_produtor` int DEFAULT NULL,
  `cod_ong` int DEFAULT NULL,
  PRIMARY KEY (`cod_endereco`),
  KEY `cod_produtor_idx` (`cod_produtor`),
  CONSTRAINT `cod_produtor` FOREIGN KEY (`cod_produtor`) REFERENCES `produtor` (`cod_produtor`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,'Avenida Paulista','Centro','São Paulo','747','89254783',29,NULL),(4,'Francisco de Paula','Chico de Paula','Jaraguá Do Sul','733','89254783',31,NULL),(5,'Abelardo Luiz','Industrial ','São João Do Oeste','431','89247564',34,NULL),(8,'Gumercindo','Centro','Jaraguá Do Sul','110','89253754',NULL,16),(9,'Avenida Passo Fundo','Centro','Jaraguá Do Sul','554','89255785',NULL,17),(10,'Athanasio Rosa','Centro','Guaramirim','744','89254777',35,NULL),(11,'Alfredo','Centro','Jaraguá Do Sul','141','123456789',41,NULL),(12,'Alberto Schneider','Centro','Jaraguá Do Sul','741','892547544',NULL,19),(13,'Ricardo','Amizade','Guaramirim','155','89270000',42,NULL),(22,'Silva ','Centro','Jaraguá Do Sul','447','89254785',51,NULL),(23,'Alfedro','Centro','Jaraguá Do Sul','155','89254789',52,NULL),(24,'Centrão','Amizade','Jaraguá Do Sul','159','892547985',NULL,20),(25,'Pedro Gonçalvez','Centro','São Bento Do Sul','7741','89254789',53,NULL),(28,'Athanasio','Centro','Guaramirim','144','89270000',56,NULL);
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itempedido`
--

DROP TABLE IF EXISTS `itempedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `itempedido` (
  `cod_produto` int DEFAULT NULL,
  `cod_pedido` int DEFAULT NULL,
  `cod_itemPedido` int NOT NULL AUTO_INCREMENT,
  `quantidade` int DEFAULT NULL,
  PRIMARY KEY (`cod_itemPedido`),
  KEY `fk_cod_produto` (`cod_produto`),
  KEY `fk_cod_pedido` (`cod_pedido`),
  CONSTRAINT `fk_cod_pedido` FOREIGN KEY (`cod_pedido`) REFERENCES `pedido` (`cod_pedido`),
  CONSTRAINT `fk_cod_produto` FOREIGN KEY (`cod_produto`) REFERENCES `produto` (`cod_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itempedido`
--

LOCK TABLES `itempedido` WRITE;
/*!40000 ALTER TABLE `itempedido` DISABLE KEYS */;
INSERT INTO `itempedido` VALUES (14,41,42,15),(15,41,43,15),(14,42,44,0),(15,42,45,0),(30,42,46,5),(13,43,47,15);
/*!40000 ALTER TABLE `itempedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ong`
--

DROP TABLE IF EXISTS `ong`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ong` (
  `cod_ong` int NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(45) DEFAULT NULL,
  `razaoSocial` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_ong`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ong`
--

LOCK TABLES `ong` WRITE;
/*!40000 ALTER TABLE `ong` DISABLE KEYS */;
INSERT INTO `ong` VALUES (16,'0147899562','Fome Zero  ','3370-0124','fomezero@hotmail.com','9987-2462','827ccb0eea8a706c4c34a16891f84e7b'),(17,'0159487444','Zero Fome','3370-8975','zero_fome@hotmail.com','99151514','202cb962ac59075b964b07152d234b70'),(19,'0123456789','Sem Fronteiras ','3373-1515','semfronteiras@hotmail.com','94515-1532','827ccb0eea8a706c4c34a16891f84e7b'),(20,'014784521633','Ajuda Todos ','3373-1515','ajuda_todos@hotmail.com','99715-1463','827ccb0eea8a706c4c34a16891f84e7b');
/*!40000 ALTER TABLE `ong` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedido` (
  `cod_pedido` int NOT NULL AUTO_INCREMENT,
  `data_pedido` date DEFAULT NULL,
  `cod_ong` int DEFAULT NULL,
  `cod_produtor` int DEFAULT NULL,
  `data_entrega` date DEFAULT NULL,
  PRIMARY KEY (`cod_pedido`),
  KEY `fk_cod_ong` (`cod_ong`),
  KEY `fk_cod_produtor` (`cod_produtor`),
  CONSTRAINT `fk_cod_ong` FOREIGN KEY (`cod_ong`) REFERENCES `ong` (`cod_ong`),
  CONSTRAINT `fk_cod_produtor` FOREIGN KEY (`cod_produtor`) REFERENCES `produtor` (`cod_produtor`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (41,'2021-11-12',19,35,NULL),(42,'2021-11-12',16,35,'2021-11-12'),(43,'2021-11-13',16,31,NULL);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produto` (
  `cod_produto` int NOT NULL AUTO_INCREMENT,
  `cod_produtor` int DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `data_colheita` date DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `quantidade_colhida` int DEFAULT NULL,
  PRIMARY KEY (`cod_produto`),
  KEY `cod_produtor` (`cod_produtor`),
  CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`cod_produtor`) REFERENCES `produtor` (`cod_produtor`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (13,31,'Beterraba','2021-10-25','2021-01-05',0),(14,35,'Rucula','2021-10-14','2021-11-04',0),(15,35,'Pepino','2021-10-05','2021-10-29',0),(16,42,'Cenoura','2021-10-26','2021-11-10',32),(17,42,'Pêra','2021-10-19','2021-11-05',23),(19,52,'Cebolinha','2021-10-19','2021-11-05',0),(20,53,'Batatinha','2021-11-02','2021-11-16',12),(21,53,'Cenoura','2021-11-04','2021-11-17',13),(22,53,'Cebola','2021-11-04','2021-11-10',14),(23,52,'Palmito','2021-10-25','2021-11-05',12),(24,53,'Pepino','2021-11-04','2021-11-11',15),(25,34,'Cenoura','2021-11-08','2021-11-26',5),(26,53,'Brócolis','2021-11-04','2021-11-18',16),(27,53,'Pimentão Verde','2021-11-05','2021-11-26',17),(28,41,'Tomilho','2021-11-03','2021-11-10',15),(29,41,'Sálvia','2021-11-03','2021-11-10',15),(30,35,'Melancia','2021-11-15','2021-11-29',6),(31,35,'Banana','2021-11-15','2021-11-22',12);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtor`
--

DROP TABLE IF EXISTS `produtor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtor` (
  `cod_produtor` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `senha` varchar(45) NOT NULL,
  `celular` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_produtor`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtor`
--

LOCK TABLES `produtor` WRITE;
/*!40000 ALTER TABLE `produtor` DISABLE KEYS */;
INSERT INTO `produtor` VALUES (29,'José Alvez Silva','01234567810','jose@hotmail.com','3370-9195','827ccb0eea8a706c4c34a16891f84e7b','9975-1517'),(31,'Pedro Alves Abreu','09145678495','pedro@hotmail.com','3370-1433','827ccb0eea8a706c4c34a16891f84e7b','9478-2231'),(34,'Gustavo Roberto','0123456789','gustavo@hotmail.com','3371-0201','202cb962ac59075b964b07152d234b70','9974-1510'),(35,'Alberto Roberto José','0123456789','alberto@hotmail.com','3371-8416','827ccb0eea8a706c4c34a16891f84e7b','9971-5589'),(41,'Benjamin Silva Souza','01234567894','benjamin@hotmail.com','3371-0415','827ccb0eea8a706c4c34a16891f84e7b','9971-1101'),(42,'Berenício Silva Alberto','01547885201','berenicio@hotmail.com','3371-9794','827ccb0eea8a706c4c34a16891f84e7b',NULL),(51,'Izaias Silva Abelardo','01257484590','iza_silva@hotmail.com','3374-1598','827ccb0eea8a706c4c34a16891f84e7b',NULL),(52,'Julio Politeico','01478445890','julio@hotmail.com','3371-4565','827ccb0eea8a706c4c34a16891f84e7b',NULL),(53,'Paulo Augusto','01478523695','paulo@hotmail.com','3371-9745','827ccb0eea8a706c4c34a16891f84e7b','9971-1442'),(56,'Aroldo Silva Pereira','09145874520','aroldo@hotmail.com','3370-6565','202cb962ac59075b964b07152d234b70','9972-1313');
/*!40000 ALTER TABLE `produtor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-17 16:13:45
