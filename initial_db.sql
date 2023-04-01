USE :DataBaseName;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: myapp
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `total_price` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `product_ids` text,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-01 23:17:57
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: myapp
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` double NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `seller` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `brand` varchar(255) NOT NULL,
  `instock` tinyint(1) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'iPhone  9',350,'iOS 11.1.1, up to iOS 16.3\r\n64GB/256GB storage, no card slot','Mobile Phone','Apple','img/iphone 9.jpg','Apple',1),(2,'iPhone 11',314,'128GB, 4GB RAM, 4G LTE, White, Single SIM & E-SIM','Mobile Phone','Apple','img/iphone 11.jpg','Apple',1),(3,'iPhone 14',235,'iPhone 14 (128 GB) - Blue','Mobile Phone','Apple','img/iphone 14.jpg','Apple',1),(4,'iPhone 13',493,'New Apple iPhone 13 with FaceTime (128GB) - Blue','Mobile Phone','Apple','img/iphone 13.jpg','Apple',1),(5,'Apple AirPods Pro (2nd Generation)',372,'wireless in ear','Accessiories','Apple','img/airpods pro 2g.jpg','Apple',1),(6,'Apple Watch Series 8',413.77,'Apple Watch Series 8','Accessiories','Apple','img/Apple Watch Series 8.jpg','Apple',1),(7,'Apple Power Adapter',123,'20W USB-C -White','Accessiories','Apple','img/Apple 20W USB-C Power Adapter - White.jpg','Apple',1),(8,'Apple iPad Pro 11',723,'(2022-4rd Gen), Wi‑Fi + Cellular, 128 GB, Space Gray','Tablet','Apple','img/Apple iPad Pro 11.jpg','Apple',1),(9,'Apple iPad mini',113,'\r\nNew 2021 Apple iPad mini (8.3-inch, Wi-Fi + Cellular, 64GB) - Space Grey (6th Generation)','Tablet','Apple','img/Apple iPad mini.jpg','Apple',1),(10,'Apple MacBook Air laptop',212,'M2 chip: 13.6-inch Liquid Retina display, 8GB RAM, 256GB SSD storage','Laptop','Apple','img/Apple MacBook Air laptop.jpg','Apple',1),(11,'Apple MacBook Air',350,'13-inch MacBook Air: Apple M2 chip with 8-core CPU and 10-core GPU, 512GB - Space Grey','Laptop','Apple','img/Apple MacBook.jpg','Apple',1),(12,'Samsung Galaxy M52',314,'Samsung Galaxy M52 5G Black,RAM 8 GB, 128 GB','Mobile Phone','Samsung','img/Samsung Galaxy M52.jpg','Samsung',1),(13,'Samsung Galaxy A23',235,'Samsung Galaxy A23 Dual SIM BLACK 4GB RAM 128GB 4G','Mobile Phone','Samsung','img/Samsung Galaxy A23.jpg','Samsung',1),(14,'Samsung Galaxy S23 Ultra',372,'512GB, Phantom Black, UAE Version, 5G Mobile','Mobile Phone','Samsung','img/Samsung Galaxy A23.jpg','Samsung',1),(15,'Samsung Galaxy Z Flip4',123,'Samsung Galaxy Z Flip4 Smartphone Android Folding Phone 256GB, Graphite','Mobile Phone','Samsung','img/Samsung Galaxy A23.jpg','Samsung',1),(16,'Samsung UHD',723,'Ultra HD LED Smart TV with Built-in Receiver, Black','TV','Samsung','img/Samsung Galaxy A23.jpg','Samsung',1),(17,'SAMSUNG 55',413,'Crystal Processor 4K LED','TV','Samsung','img/Samsung Galaxy A23.jpg','Samsung',1),(18,'Apple TV',212,'4K 32GB - 2nd Generation','TV','Apple','img/iphone 9.jpg','Apple',1),(19,'Samsung Galaxy Buds ',202,'Wireless Earbuds w/Active Noise Cancelling','Accessiories','Samsung','img/Samsung Galaxy A23.jpg','Samsung',1),(20,'SAMSUNG Galaxy Buds 2',413,'True Wireless Bluetooth Earbuds w/ Noise Cancelling, Hi-Fi Sound','Accessiories','Samsung','img/Samsung Galaxy A23.jpg','Samsung',1),(21,'Lenovo Ideapad 3',372,'15.6\" HD Touchscreen, 11th Gen Intel Core i3-1115G4 Processor, 8GB DDR4 RAM, 256GB','Laptop','Lenovo ','img/Apple MacBook.jpg','Lenovo ',1),(22,'Lenovo 14\" IdeaPad 1',372,'ntel Dual-core Processor, 14\" HD Display, 4GB RAM, Wi-Fi 6 and Bluetooth','Laptop','Lenovo ','img/Apple MacBook.jpg','Lenovo ',1),(23,'Lenovo 15.6\" IdeaPad 1 Laptop',322,'AMD Dual-core Processor, 15.6\" HD Anti-Glare Display, Wi-Fi 6 and Bluetooth 5.0, HDMI, Windows 11 Home','Laptop','Lenovo ','img/Apple MacBook.jpg','Lenovo ',1),(24,'Lenovo - Legion 5',413,'Gaming Laptop - AMD Ryzen 7 5800H - 16GB RAM - 512GB Storage - NVIDIA GeForce RTX 3050Ti','Laptop','Lenovo ','img/Apple MacBook.jpg','Lenovo ',1),(25,'Dell G15 5511',202,'Gaming Laptop (2021) | 15.6\" FHD | Core i5 - 256GB SSD - 8GB RAM - RTX 3050 | 6 Cores @ 4.5 GHz - 11th Gen','Laptop','Dell','img/Apple MacBook.jpg','Dell',1),(26,'Dell G15 5511',322,'Gaming Laptop - 15.6 inch 120Hz FHD 1080p Display - NVIDIA GeForce RTX 3060 6GB GDDR6, Intel Core i7-11800H, 16GB DDR4 RAM, 512GB SSD','Laptop','Dell','img/Apple MacBook.jpg','Dell',1),(27,'Dell Latitude 7480 Laptop',723,'Intel Core i5-7300U CPU 2.60GHz, 16GB RAM, 256GB SSD','Laptop','Dell','img/Apple MacBook.jpg','Dell',1),(28,'Xiaomi Redmi Note 11',912,'Redmi Note 11 4G Volte 128GB + 4GB Factory Unlocked 6.43\" Quad Camera 50MP Night','Mobile Phone','Xiaomi ','img/Apple MacBook.jpg','Xiaomi ',1),(29,'Xiaomi Redmi 9A',123,'Xiaomi Redmi 9A - Smartphone 2 GB + 32 GB, Dual Sim, Grigio (Granite Grey)\r\n','Mobile Phone','Xiaomi ','img/Apple MacBook.jpg','Xiaomi ',1),(30,'Xiaomi 11T',123,' 5G + 4G Volte (256GB, 8GB) 6.67” 108MP Triple Camera, NFC Dual SIM (Not Compatible Verizon Sprint Boost Metro Cricket) GSM Unlocked','Mobile Phone','Xiaomi ','img/Apple MacBook.jpg','Xiaomi ',1),(31,'Xiaomi Mi Band 7',123,' Activity Tracker High-Res 1.62\" AMOLED Screen, Bluetooth 5.2, 120 Sports Modes','Accessiories','Xiaomi ','img/Samsung Galaxy A23.jpg','Xiaomi ',1),(32,'Xiaomi Redmi Buds 3',123,'\r\nXiaomi Redmi Buds 3 Pro Wireless in-Ear Headphones Bluetooth Wireless Noise Reduction Quick Charge','Accessiories','Xiaomi ','img/Samsung Galaxy A23.jpg','Xiaomi ',1),(33,'\r\nSAMSUNG Galaxy Tab A8',123,'32GB Android Tablet w/ LCD Screen','Tablet','Samsung','img/Samsung Galaxy A23.jpg','Samsung',1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-01 23:17:57
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: myapp
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `password` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `users_email_idx` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-01 23:17:57
