# ************************************************************
# Sequel Ace SQL dump
# Version 20051
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: localhost (MySQL 8.0.33)
# Database: sports_team
# Generation Time: 2025-01-09 23:44:29 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Comments`;

CREATE TABLE `Comments` (
  `CommentID` int NOT NULL AUTO_INCREMENT,
  `Content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `PostID` int DEFAULT NULL,
  `UserID` int DEFAULT NULL,
  `CommentedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CommentID`),
  KEY `PostID` (`PostID`),
  KEY `UserID` (`UserID`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`PostID`) REFERENCES `Posts` (`PostID`),
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `Comments` WRITE;
/*!40000 ALTER TABLE `Comments` DISABLE KEYS */;

INSERT INTO `Comments` (`CommentID`, `Content`, `PostID`, `UserID`, `CommentedAt`)
VALUES
	(2,'assdfsafasfasdf',2,2,'2025-01-01 20:19:12'),
	(3,'asdasd',3,1,'2025-01-09 18:40:29'),
	(4,'asdasdasdasd',3,1,'2025-01-09 18:42:09'),
	(5,'vsdfeewf',3,1,'2025-01-09 18:42:15'),
	(6,'asdadasdadasd',3,1,'2025-01-09 18:42:40'),
	(7,'asdasdas',3,1,'2025-01-09 18:51:52'),
	(8,'asdasd',3,1,'2025-01-09 18:52:38'),
	(9,'asdasd',3,1,'2025-01-09 18:52:47'),
	(10,'ffdfdfdfdfd',3,1,'2025-01-09 18:53:13'),
	(11,'asdadsadasd',3,1,'2025-01-09 18:53:28'),
	(12,'asdasd',3,1,'2025-01-09 18:54:00'),
	(13,'asdasdasd',3,1,'2025-01-09 18:54:22'),
	(14,'asdasd',1,1,'2025-01-09 18:54:28'),
	(15,'Jebal',1,4,'2025-01-09 19:32:47');

/*!40000 ALTER TABLE `Comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Images`;

CREATE TABLE `Images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `Images` WRITE;
/*!40000 ALTER TABLE `Images` DISABLE KEYS */;

INSERT INTO `Images` (`id`, `title`, `description`, `url`)
VALUES
	(1,'test','test','https://static.wixstatic.com/media/89553f_7d2a62ee1f364edc8b9ea4e7287ed54f~mv2.jpg/v1/fill/w_1480,h_986,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/89553f_7d2a62ee1f364edc8b9ea4e7287ed54f~mv2.jpg');

/*!40000 ALTER TABLE `Images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Posts`;

CREATE TABLE `Posts` (
  `PostID` int NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ImageURL` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AuthorID` int DEFAULT NULL,
  `PublishedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PostID`),
  KEY `AuthorID` (`AuthorID`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`AuthorID`) REFERENCES `Users` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `Posts` WRITE;
/*!40000 ALTER TABLE `Posts` DISABLE KEYS */;

INSERT INTO `Posts` (`PostID`, `Title`, `Content`, `ImageURL`, `AuthorID`, `PublishedAt`)
VALUES
	(1,'M-SPORT FORD RALLY RAID KOMANDA SAGATAVOTOS DAKARAS RALLIJA IZAICINĀJUMAM 2025. GADĀ','M-Sport Ford Rally Raid komanda ir gatava piedalīties 2025. gada Dakāras rallijā ar Ford Raptor T1+. Dakāras rallijs, kas pazīstams kā galvenais izturības pārbaudījums, piespiedīs gan braucējus, gan mašīnas līdz viņu robežām, izaicinot komandu skarbajā un daudzveidīgajā Saūda Arābijas reljefā. Janvārī M-Sport izbrauks spēcīgu četru izcilu braucēju sastāvu, kas visi būs gatavi cīnīties ar smilšu kāpām.\n\n\nPēc daudzsološās debijas ar Ranger Raptor 2024. gada Dakaras rallijā M-Sport atgriežas vienā no nogurdinošākajiem notikumiem motosporta kalendārā. Rallijs 14 dienu un 12 ātrumposmu garumā veiks gandrīz 8000 kilometrus, sākot no Bišas un finišējot Šubaitā. Iekļaujot intensīvo 48 stundu Chrono posmu un maratona posmu, ekipāžas saskarsies ar vislielāko pārbaudījumu Saūda Arābijas nepielūdzamajā tuksneša reljefā.\n\n\nČetrkārtējais Dakāras rallija čempions un līdzšinējais uzvarētājs Karloss Saincs vecākais kopā ar stūrmani Lūkasu Krusu pirmo reizi 22 gadu laikā atgriežas M-Sport. Saincs, kurš iepriekš ar M-Sport Ford startēja pasaules rallija čempionātā no 1996. līdz 1997. gadam un atkārtoti no 2000. līdz 2002. gadam, kopā ar komandu uzvarēja piecos rallijos un nopelnīja vairākus pjedestālus. Saincs debitēja Raptor T1+ Rallye du Maroc, nodrošinot M-Sport pirmo rallijreida posmu un savu pirmo uzvaru ar komandu vairāk nekā divu desmitgažu laikā. Ar savu piekto Dakaras uzvaru \"El Matador\" sniedz komandai nenovērtējamu pieredzi.','https://static.wixstatic.com/media/89553f_7d2a62ee1f364edc8b9ea4e7287ed54f~mv2.jpg/v1/fill/w_1480,h_986,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/89553f_7d2a62ee1f364edc8b9ea4e7287ed54f~mv2.jpg',1,'2025-01-01 19:25:57'),
	(2,'M-SPORT UN MCERLEAN APVIENO SPĒKU RALLY1 KAMPAŅAI 2025. GADĀ','\nM-Sport Ford Pasaules rallija komanda ar prieku paziņo, ka Josh McErlean un Eoin Treacy pievienosies tās rindām 2025. gada FIA pasaules rallija čempionātā pie Ford Puma Rally1 stūres.\n\n\nPēc veiksmīgām sezonām WRC2 un ERC čempionātos, īru pāri kopā debitēs sporta augstākajā līgā. Ar Motorsport Ireland Rally Academy atbalstu Makerlīns un Treisijs sacentīsies pilnā sezonā, aizvadot 14 rallijus četros kontinentos un trīs dažādos segumos.\n\n\nMakerlīns, kura karjera sākās ar Junior 1000 Rally Challenge titulu 2015. gadā, pēdējo desmit gadu laikā ir veidojis spēcīgus un stabilus pamatus savai debijai Rally1. Pēc agrīnas pieredzes iegūšanas Ford tehnikā ar Fiesta R2T Lielbritānijas rallija čempionātā 2017. un 2018. gadā Makerlīns 2019. gadā ieguva Lielbritānijas junioru titulu, kā arī Motorsport Ireland Billy Coleman balvu kā gada jaunais īru rallija braucējs. . Vēlāk tajā pašā gadā viņš arī debitēja WRC Velsas rallijā GB.\n\n\nIegūstot vairāk sēdvietas R5 automašīnā WRC un Eiropas rallija čempionātos 2020. un 2021. gadā, Makerlīns 2021. gada beigās Katalonijas rallijā ieguva iespaidīgu trešo vietu WRC3 kategorijā. \n\n\nPakāpjoties uz WRC2 2022. gadā, Makerlīns sasniedza trīs labākos pieciniekus WRC2 junioru kategorijā un uzkrāja vērtīgu pieredzi svarīgākajos Eiropas pasākumos Portugālē, Sardīnijā, Igaunijā un Somijā.','https://static.wixstatic.com/media/89553f_69d33e713fea486f8686031dc4e44fbe~mv2.jpg/v1/fill/w_1480,h_986,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/89553f_69d33e713fea486f8686031dc4e44fbe~mv2.jpg',2,'2025-01-01 20:19:04'),
	(3,'MUNSTERS UN LOUKA 2025. GADĀ LĪDZ M-SPORT WRC KAMPAŅU','M-Sport Ford Pasaules rallija komanda ar prieku apstiprina, ka Gregoire Minster un Louis Louka turpinās strādāt komandā un Ford Puma Rally1 visu 2025. gada FIA pasaules rallija čempionāta sezonu.\n\n\nTagad, vadot komandu pēc vērtīga gada pieredzes čempionāta augstākajā līmenī, Minstere un Lūka centīsies gūt turpmākus sasniegumus 2025. gada sezonas 14 posmos, kas aptver četrus kontinentus un trīs dažādus seguma veidus.\n\n\nMinsters, kuram Ziemassvētku vakarā paliks 26 gadi, ir pierādījis sportā pieejamo progresa iespēju vērtību, 2022. gadā absolvējot Beļģijas nacionālo čempionātu WRC2, pirms debijas rallijā 1 2023. gada beigās un pirmo pilno sezonu. augstākajā lidojumā 2024. gada laikā. \n\n\nLuksemburgas un Beļģijas pāri 2024. gadā nodrošināja spēcīgu sniegumu, uzlabojot savu Puma Rally1 tempu, sezonai attīstoties un pieaugot viņu pārliecībai. Viņi pretendētu uz karjeras labāko rezultātu Sardegnas rallijā, kopvērtējumā ieņemot piekto vietu pēc smagas cīņas prasīgos apstākļos. \n\n\nViņi iegūs piekto vietu divos nākamajos Tarmac posmos Centrāleiropā un Japānā, pievienojot karjeras sarakstam dažus labākos piecus un trīs labākos ātrumposmu laikus.','https://static.wixstatic.com/media/89553f_49b5b11abb474bc18357cee8fbe5a373~mv2.jpg/v1/fill/w_1480,h_986,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/89553f_49b5b11abb474bc18357cee8fbe5a373~mv2.jpg',3,'2025-01-01 22:01:52');

/*!40000 ALTER TABLE `Posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PasswordHash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RegisteredAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isAdmin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`UserID`, `Username`, `Email`, `PasswordHash`, `RegisteredAt`, `isAdmin`)
VALUES
	(1,'Janis','janisbanis@gmail.com','23234','2025-01-01 19:24:56',1),
	(2,'Banis','asdadasd@gmail.com','123123','2025-01-01 20:18:51',0),
	(3,'asdasdasdasdas','rudolfs@saukums.com','123456','2025-01-09 19:31:59',0),
	(4,'asdadad','heavilyfitness@gmail.com','123456','2025-01-09 19:32:30',0);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
