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
  `cod_adm` varchar(45) DEFAULT 'ADMux9',
  `cod_usuario` int NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_usuario`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES ('ADMux9',23,'hortasadm@hotmail.com','2883da1feccc80284572eb14af49dbf0','Cristian'),('ADMux1',25,'fernando@hotmail.com','25d55ad283aa400af464c76d713c07ad','Fernando'),('ADMux5',26,'veldecir@hotmail.com','25d55ad283aa400af464c76d713c07ad','Valdecir'),('ADMux8',27,NULL,NULL,NULL),('ADMux6',28,NULL,NULL,NULL);
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
  KEY `cod_ong_idx` (`cod_ong`),
  CONSTRAINT `cod_ong` FOREIGN KEY (`cod_ong`) REFERENCES `ong` (`cod_ong`),
  CONSTRAINT `cod_produtor` FOREIGN KEY (`cod_produtor`) REFERENCES `produtor` (`cod_produtor`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,'Avenida Paulista','Centro','São Paulo','747','89254783',29,NULL),(4,'Francisco de Paula','Chico de Paula','Jaraguá Do Sul','733','89254783',31,NULL),(5,'Abelardo Luiz','Industrial ','São João Do Oeste','431','89247564',34,NULL),(8,'Gumercindo','Centro','Jaraguá Do Sul','110','89253754',NULL,16),(9,'Avenida Passo Fundo','Centro','Jaraguá Do Sul','554','89255785',NULL,17),(10,'Athanasio Rosa','Centro','Guaramirim','744','89254777',35,NULL),(11,'Alfredo','Centro','Jaraguá Do Sul','141','123456789',41,NULL),(12,'Alberto Schneider','Centro','Jaraguá Do Sul','741','892547544',NULL,19),(13,'Ricardo','Amizade','Guaramirim','155','89270000',42,NULL),(22,'Silva ','Centro','Jaraguá Do Sul','447','89254785',51,NULL),(23,'Alfedro','Centro','Jaraguá Do Sul','155','89254789',52,NULL),(24,'Centrão','Amizade','Jaraguá Do Sul','159','892547985',NULL,20),(25,'Pedro Gonçalves','Centro','São Bento Do Sul','7741','89254789',53,NULL),(28,'Athanasio','Centro','Guaramirim','144','89270000',56,NULL),(29,'Avenida José','Centro','Pinhais','633','892874152',NULL,21),(30,'Silva Linhares','Servidão 3','Macapa','897','892547812',NULL,22),(33,'Avenida','Centro','Guaramirim','159','89278000',58,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itempedido`
--

LOCK TABLES `itempedido` WRITE;
/*!40000 ALTER TABLE `itempedido` DISABLE KEYS */;
INSERT INTO `itempedido` VALUES (14,41,42,15),(15,41,43,15),(13,43,47,15),(20,46,58,12),(21,46,59,13),(22,46,60,14),(24,46,61,15),(26,46,62,16),(27,46,63,17);
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ong`
--

LOCK TABLES `ong` WRITE;
/*!40000 ALTER TABLE `ong` DISABLE KEYS */;
INSERT INTO `ong` VALUES (16,'0147899562','Fome Zero ','33700124','fomezero@hotmail.com','99872462','827ccb0eea8a706c4c34a16891f84e7b'),(17,'0159487444','Zero Fome','33708975','zero_fome@hotmail.com','99151514','202cb962ac59075b964b07152d234b70'),(19,'0123456789','Sem Fronteiras ','33731515','semfronteiras@hotmail.com','99151532','827ccb0eea8a706c4c34a16891f84e7b'),(20,'014784521633','Ajuda Todos ','3373-1515','ajuda_todos@hotmail.com','99715-1463','827ccb0eea8a706c4c34a16891f84e7b'),(21,'01478445120','Solidariedade a Todos','33734877','solidariedade@hotmail.com','89541102','25d55ad283aa400af464c76d713c07ad'),(22,'15478448965','Central Ajuda','33706654','centralajuda@hotmail.com','97148475','25d55ad283aa400af464c76d713c07ad');
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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (41,'2021-11-12',19,35,NULL),(43,'2021-11-13',16,31,'2021-11-21'),(46,'2021-11-21',16,53,NULL);
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
  `unidade` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_produto`),
  KEY `cod_produtor` (`cod_produtor`),
  CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`cod_produtor`) REFERENCES `produtor` (`cod_produtor`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (13,31,'Beterraba','2021-11-22','2021-12-10',10,'Unidades'),(14,35,'Rucula','2021-11-20','2021-11-26',12,'Maço'),(15,35,'Pepino','2021-10-05','2021-10-29',12,'Unidades'),(16,42,'Cenoura','2021-10-26','2021-11-10',32,'Unidades'),(17,42,'Pêra','2021-10-19','2021-11-05',23,'Unidades'),(19,52,'Cebolinha','2021-10-19','2021-11-05',12,'Maço'),(20,53,'Batatinha','2021-11-02','2021-11-16',0,'KG'),(21,53,'Cenoura','2021-11-04','2021-11-17',0,'Unidades'),(22,53,'Cebola','2021-11-04','2021-11-10',0,'Unidades'),(23,52,'Palmito','2021-10-25','2021-11-05',12,'Unidades'),(24,53,'Pepino','2021-11-04','2021-11-11',0,'Unidades'),(26,53,'Brócolis','2021-11-04','2021-11-18',0,'Unidades'),(27,53,'Pimentão Verde','2021-11-05','2021-11-26',0,'Unidades'),(28,41,'Tomilho','2021-11-03','2021-11-10',15,'Maço'),(29,41,'Sálvia','2021-11-03','2021-11-10',15,'Unidades'),(30,35,'Melancia','2021-11-15','2021-11-29',6,'Unidades'),(31,35,'Banana','2021-11-15','2021-11-22',12,'Unidades'),(38,35,'Alface','2021-11-09','2021-12-02',2,'Maço');
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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtor`
--

LOCK TABLES `produtor` WRITE;
/*!40000 ALTER TABLE `produtor` DISABLE KEYS */;
INSERT INTO `produtor` VALUES (29,'José Alvez Silva','012.345.678-10','jose@hotmail.com','33709195','827ccb0eea8a706c4c34a16891f84e7b','99751517'),(31,'Pedro Alves Abreu','091.456.784-95','pedro@hotmail.com','33701433','827ccb0eea8a706c4c34a16891f84e7b','94782231'),(34,'Gustavo Roberto','111.111.111-11','gustavo@hotmail.com','33710202','202cb962ac59075b964b07152d234b70','99741510'),(35,'Alberto Roberto José','222.222.222-22','alberto@hotmail.com','33718416','827ccb0eea8a706c4c34a16891f84e7b','99715589'),(41,'Benjamin Silva Souza','012.345.678-94','benjamin@hotmail.com','33710417','827ccb0eea8a706c4c34a16891f84e7b','99711101'),(42,'Berenício Silva Alberto','015.478.852-01','berenicio@hotmail.com','33719794','827ccb0eea8a706c4c34a16891f84e7b','99746331'),(51,'Izaias Silva Abelardo','012.574.845-90','iza_silva@hotmail.com','33741598','827ccb0eea8a706c4c34a16891f84e7b','99721548'),(52,'Julio Politeico','014.784.458-90','julio@hotmail.com','33714565','827ccb0eea8a706c4c34a16891f84e7b','88741245'),(53,'Paulo Augusto','014.785.236-95','paulo@hotmail.com','33719745','827ccb0eea8a706c4c34a16891f84e7b','99711442'),(56,'Aroldo Silva Pereira','091.458.745-20','aroldo@hotmail.com','33706565','202cb962ac59075b964b07152d234b70','99721313'),(58,'Jubileu','091.458.745-20','jubileu@hotmail.com','33731515','25d55ad283aa400af464c76d713c07ad','89257412'),(60,'TesteCpf','111.111.111-11','TesteCpf@hotmail.com','11111111','25d55ad283aa400af464c76d713c07ad','111111111');
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

-- Dump completed on 2021-11-25 15:49:27
