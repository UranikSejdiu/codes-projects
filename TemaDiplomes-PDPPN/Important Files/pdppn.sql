-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 13, 2022 at 07:14 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdppn`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `selKategorit`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `selKategorit` ()  SELECT * FROM kategoria$$

DROP PROCEDURE IF EXISTS `selMadhesit`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `selMadhesit` (IN `id` INT)  SELECT * FROM madhesit
Where kategoriaID=id$$

DROP PROCEDURE IF EXISTS `selNgjyrat`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `selNgjyrat` (IN `id` INT)  SELECT * FROM ngjyrat
Where kategoriaID=id$$

DROP PROCEDURE IF EXISTS `selQytet`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `selQytet` ()  Select * From cities$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `code`, `status`) VALUES
(2, 'Uranik Sejdiu', 'u.sejdiu4@gmail.com', '$2y$10$aw2Ijo1bAPcerfbpf6K6zuvNpkgy/2BRP1Q0cD3SZyuVifMl7bXLi', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id_city` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_city`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id_city`, `name`) VALUES
(1, 'Ferizaj'),
(2, 'Prishtinë'),
(3, 'Prizren'),
(4, 'Pejë'),
(5, 'Gjakovë'),
(6, 'Gjilan'),
(7, 'Mitrovicë'),
(8, 'Podujevë'),
(9, 'Vushtrri'),
(10, 'Suharekë'),
(11, 'Rahovec'),
(12, 'Drenas'),
(13, 'Lipjan'),
(14, 'Malishevë'),
(15, 'Kamenicë'),
(16, 'Viti'),
(17, 'Deçan'),
(18, 'Istog'),
(19, 'Klinë'),
(20, 'Skenderaj'),
(21, 'Dragash'),
(22, 'Fushë Kosovë'),
(23, 'Kaçanik'),
(24, 'Shtime'),
(25, 'Obiliq'),
(26, 'Leposaviq'),
(27, 'Graçanicë'),
(28, 'Hani Elezit'),
(29, 'Zveçan'),
(30, 'Shtërpcë'),
(31, 'Novobërdë'),
(32, 'Zubin Potok'),
(33, 'Junik'),
(34, 'Mamushë'),
(35, 'Ranillug'),
(36, 'Kllokot'),
(37, 'Partesh'),
(38, 'Mitrovica Veriore');

-- --------------------------------------------------------

--
-- Table structure for table `kategoria`
--

DROP TABLE IF EXISTS `kategoria`;
CREATE TABLE IF NOT EXISTS `kategoria` (
  `kategoriaID` int(11) NOT NULL AUTO_INCREMENT,
  `kategoria` varchar(50) NOT NULL,
  PRIMARY KEY (`kategoriaID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoria`
--

INSERT INTO `kategoria` (`kategoriaID`, `kategoria`) VALUES
(0, 'Asnjë'),
(1, 'Kozmetike'),
(3, 'Auto'),
(4, 'Librari'),
(5, 'Veshje'),
(6, 'Teknologji'),
(7, 'Shëndet'),
(8, 'Sport'),
(9, 'Vegla Pune'),
(10, 'Këpuca');

-- --------------------------------------------------------

--
-- Table structure for table `kompanite`
--

DROP TABLE IF EXISTS `kompanite`;
CREATE TABLE IF NOT EXISTS `kompanite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(250) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nrfiskal` int(9) NOT NULL,
  `lokacioni` varchar(200) NOT NULL,
  `telefoni` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(999) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kompanite`
--

INSERT INTO `kompanite` (`id`, `logo`, `name`, `nrfiskal`, `lokacioni`, `telefoni`, `email`, `password`, `code`, `status`) VALUES
(3, '../images/kompani/1656923343-62c2a4cf34d8e.png', 'Bliss cosmetics', 123345674, '42.643289,21.156723', '(+383)44/567-898', 'ferizaj0001@gmail.com', '$2y$10$vc0jRq16kXzLNgg91HYOOOoXn213O63qyvKsEu8/S37H/yMMivWOS', 0, 'verified'),
(5, '../images/kompani/1656924914-62c2aaf213cb2.jpg', 'Auto Zone', 876954687, '42.630857,21.095831', '(+383)44/699-911', 'ferizaj0005@hotmail.com', '$2y$10$j3UqekAJC9Qs5DCLbJGyMe3UquFYW/6ZNX01SA27on2CNAQTBbSnm', 0, 'verified'),
(6, '../images/kompani/1656925283-62c2ac63317b5.png', 'Fivestar Fitness', 657894534, '42.367399,21.154051', '(+383)44/998-756', 'ferizaj0003@gmail.com', '$2y$10$RjtQLm6vdUNM3ynZBMWljeeE38YSkAKq6TSN0pntV6wopX9Xd3IWG', 0, 'verified'),
(7, '../images/kompani/1656925737-62c2ae2923851.jpg', 'Smart Tech', 564343356, '42.373064,21.149223', '(+383)44/467-785', 'ferizaj0004@gmail.com', '$2y$10$kyV6iUZrO7hfnTIvtqVQ3.akmPMC.1M7bvFpu6qxNRSExVgEIHkKu', 0, 'verified'),
(8, '../images/kompani/1656925838-62c2ae8e71c66.jpg', 'Libraria Dukagjini', 776897878, '42.635987,21.152147', '(+383)44/456-678', 'ferizaj0006@gmail.com', '$2y$10$mvEOhHXkdjEaDSDoViLB5O8uhSuhKsxC9Z5BZFIt63tLazUul/oRe', 0, 'verified'),
(9, '../images/kompani/1656926127-62c2afafa1592.jpg', 'Rimida Online', 133768859, '42.606011,21.140442', '(+383)44/978-867', 'ferizaj0007@hotmail.com', '$2y$10$UejkgxZsbm.ZV7HT3CeLPebXu5wIsw1kfGya3ZozH47CjQ.ZfAy5i', 0, 'verified'),
(10, '../images/kompani/1656926237-62c2b01d7c1ea.png', 'Idea-M', 477869586, '42.384062,21.167049', '(+383)44/487-865', 'ferizaj0008@hotmail.com', '$2y$10$T0sU6U9kUzInTSST8Te.l.DNyF/3NRZS2Muae7lt/KXOVfTEvY75a', 0, 'verified'),
(11, '../images/kompani/1656926843-62c2b27b5574a.jpg', 'Koton', 655745345, '42.384257,21.167033', '(+383)44/843-417', 'ferizaj0009@hotmail.com', '$2y$10$Vgno0Z4mi6KjRGnHlWeQnOfi2cPsNh0aLjNFDDMcOb489upZt9hkK', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `kontaktet`
--

DROP TABLE IF EXISTS `kontaktet`;
CREATE TABLE IF NOT EXISTS `kontaktet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjekti` varchar(100) NOT NULL,
  `mesazhi` varchar(500) NOT NULL,
  `moduli` varchar(50) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontaktet`
--

INSERT INTO `kontaktet` (`id`, `subjekti`, `mesazhi`, `moduli`, `createdDate`) VALUES
(1, 'Problem', 'Tek produktet fotoja e 4 nuk po shtohet si duhet ', 'Moduli Kompanise', '2022-07-04 12:30:50'),
(3, 'Hello', 'This is great!', 'Moduli Kompanise', '2022-07-05 23:15:10'),
(4, 'Perdoruesi', 'Perdorues', 'Moduli Perdoruesit', '2022-07-05 23:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `madhesit`
--

DROP TABLE IF EXISTS `madhesit`;
CREATE TABLE IF NOT EXISTS `madhesit` (
  `madhesiaID` int(11) NOT NULL AUTO_INCREMENT,
  `madhesia` varchar(50) NOT NULL,
  `kategoriaID` int(11) NOT NULL,
  PRIMARY KEY (`madhesiaID`),
  KEY `kategoriaMadhesia` (`kategoriaID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `madhesit`
--

INSERT INTO `madhesit` (`madhesiaID`, `madhesia`, `kategoriaID`) VALUES
(0, '0', 0),
(1, 'XS', 5),
(2, 'S', 5),
(3, 'M', 5),
(4, 'L', 5),
(5, 'XL', 5),
(6, 'XXL', 5),
(7, '36', 10),
(8, '37', 10),
(9, '38', 10),
(10, '39', 10),
(11, '40', 10),
(12, '41', 10),
(13, '42', 10),
(14, '43', 10),
(15, '44', 10),
(16, '45', 10);

-- --------------------------------------------------------

--
-- Table structure for table `ngjyrat`
--

DROP TABLE IF EXISTS `ngjyrat`;
CREATE TABLE IF NOT EXISTS `ngjyrat` (
  `ngjyraID` int(11) NOT NULL AUTO_INCREMENT,
  `ngjyra` varchar(50) NOT NULL,
  `kategoriaID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ngjyraID`),
  KEY `ngjyraKetegorit` (`kategoriaID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngjyrat`
--

INSERT INTO `ngjyrat` (`ngjyraID`, `ngjyra`, `kategoriaID`) VALUES
(0, '0', 0),
(1, 'Black', 5),
(2, 'Red', 5),
(3, 'Blue', 5),
(4, 'Gray', 5),
(5, 'Purple', 5),
(6, 'Orange', 5),
(7, 'Yellow', 5),
(8, 'Green', 5),
(9, 'Black', 10),
(10, 'Red', 10),
(11, 'Blue', 10),
(12, 'Gray', 10),
(13, 'Purple', 10),
(14, 'Orange', 10),
(15, 'Yellow', 10),
(16, 'Green', 10),
(18, 'White', 5),
(19, 'White', 10);

-- --------------------------------------------------------

--
-- Table structure for table `perdoruesit`
--

DROP TABLE IF EXISTS `perdoruesit`;
CREATE TABLE IF NOT EXISTS `perdoruesit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(150) NOT NULL,
  `id_city` int(11) NOT NULL,
  `adress` tinytext NOT NULL,
  `zipCode` int(5) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(999) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cityForeignKey` (`id_city`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perdoruesit`
--

INSERT INTO `perdoruesit` (`id`, `fullName`, `id_city`, `adress`, `zipCode`, `phone`, `email`, `password`, `code`, `status`) VALUES
(1, 'Uranik Sejdiu', 1, 'Gaçkë, Rruga Shaban Viqa', 70000, '(+383)48/434-177', 'u.sejdiu4@gmail.com', '$2y$10$joflk9QYsrgpXUX7LhxiS.iEu424PAItXPCH3hu1L.OudK0igzzmi', 0, 'verified'),
(2, 'Granit Sejdiu', 1, 'Greme, Rruga Spahiaj', 70000, '(+383)46/899-758', 'ferizaj0004@gmail.com', '$2y$10$SVJ3e7wl5jDU0mqJ1GXmM.8KQfQ3/kvu9NR1YVzoy3d1fU89Miytq', 0, 'verified'),
(4, 'Ermal Konjufca', 1, 'Gaçkë', 70000, '(+383)46/555-555', 'u.sejdiu56@gmail.com', '$2y$10$oYUFGHl5MMzFghrFbJpYtOlhu8lb9S3NBqhBVKSnQM1jVyVkhE53W', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `porosit`
--

DROP TABLE IF EXISTS `porosit`;
CREATE TABLE IF NOT EXISTS `porosit` (
  `porosiaID` int(11) NOT NULL AUTO_INCREMENT,
  `produktID` int(11) NOT NULL,
  `perdoruesID` int(11) NOT NULL,
  `emri` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `qyteti` varchar(50) NOT NULL,
  `adresa` varchar(100) NOT NULL,
  `zipCode` int(5) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mesazhi` varchar(500) NOT NULL,
  `menyraPageses` varchar(150) NOT NULL,
  `sasia` int(11) NOT NULL,
  `pagesa` decimal(15,2) NOT NULL,
  `statusi` int(1) NOT NULL DEFAULT '1',
  `dataBlerjes` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`porosiaID`),
  KEY `perdoruesiPorosit` (`perdoruesID`),
  KEY `produktiPorosit` (`produktID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `porosit`
--

INSERT INTO `porosit` (`porosiaID`, `produktID`, `perdoruesID`, `emri`, `email`, `qyteti`, `adresa`, `zipCode`, `phone`, `mesazhi`, `menyraPageses`, `sasia`, `pagesa`, `statusi`, `dataBlerjes`) VALUES
(1, 48, 4, 'Ermal Konjufca', 'u.sejdiu56@gmail.com', 'Ferizaj', 'Gaçkë', 70000, '(+383)46/555-555', '', 'Para në dorë', 5, '89.95', 2, '2022-07-05 23:27:04'),
(2, 18, 4, 'Ermal Konjufca', 'u.sejdiu56@gmail.com', 'Ferizaj', 'Gaçkë', 70000, '(+383)46/555-555', '', 'Para në dorë', 2, '159.90', 1, '2022-07-11 17:15:25');

-- --------------------------------------------------------

--
-- Table structure for table `produktet`
--

DROP TABLE IF EXISTS `produktet`;
CREATE TABLE IF NOT EXISTS `produktet` (
  `produktID` int(11) NOT NULL AUTO_INCREMENT,
  `produkti` varchar(150) NOT NULL,
  `imazhi1` varchar(600) NOT NULL,
  `imazhi2` varchar(600) NOT NULL,
  `imazhi3` varchar(600) NOT NULL,
  `imazhi4` varchar(600) NOT NULL,
  `kategoriaID` int(11) NOT NULL,
  `pershkrimi` longtext NOT NULL,
  `qmimi` decimal(15,2) NOT NULL,
  `stoku` int(11) NOT NULL,
  `madhesiaID` int(11) DEFAULT NULL,
  `ngjyraID` int(11) DEFAULT NULL,
  `kompaniaID` int(11) NOT NULL,
  PRIMARY KEY (`produktID`),
  KEY `katForeignKey` (`kategoriaID`),
  KEY `colorForeignKey` (`ngjyraID`),
  KEY `kompaniaForeignKey` (`kompaniaID`),
  KEY `sizeKatForeignkey` (`madhesiaID`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produktet`
--

INSERT INTO `produktet` (`produktID`, `produkti`, `imazhi1`, `imazhi2`, `imazhi3`, `imazhi4`, `kategoriaID`, `pershkrimi`, `qmimi`, `stoku`, `madhesiaID`, `ngjyraID`, `kompaniaID`) VALUES
(4, 'Drejtuese për flokë Remington S3500', '../images/produktet/1656929920-62c2be8087549.jpg', '../images/produktet/1656929920-62c2be8087559.jpg', '../images/produktet/1656929920-62c2be808755e.jpg', '../images/produktet/1656929920-62c2be8087564.jpg', 1, 'Marka Remington fokusohet në cilësinë dhe teknologjinë moderne, me vëmendje në detaje në të njëjtën kohë. Pajisja u krijua duke pasur parasysh strukturat më problematike të flokëve. Mbivendosjet qeramike, antistatike me një shtresë turmaline do të zvogëlojnë kohën e stilimit. Turmalina ka veti të jashtëzakonshme jonizuese, falë të cilave do të harroni elektrifikimin dhe efektin e gërvishtjes. Veshjet e veçanta qeramike zgjasin jetën e pajisjes dhe minimizojnë gërvishtjet. Kjo është arsyeja pse sipërfaqja e lëmuar e drejtuesit Remington siguron mbrojtje nga jashtë, kështu që nuk do të ndjeni ndjenjën e pakëndshme të kërcitjes, humbjes ose brishtësisë gjatë drejtimit. Pajisja është e pajisur me pllaka të lëvizshme me një gjerësi të vogël prej 110 mm, të cilat rregullojnë presionin, i cili ju lejon të jepni fijeve këndin e duhur dhe shkallën e drejtimit me një lëvizje të qetë.Pajisja ka një panel për të arritur shpejt temperaturën e dëshiruar brenda 15 sekondave. Gama e rregullimit të ngrohjes në një sistem me 8 faza, nga 150 ° C në 230 ° C, është mbrojtja maksimale kundër thyerjes dhe dëmtimit të fijeve. Një çelës i përshtatshëm do t\'ju ndihmojë të rregulloni fuqinë drejtuese sipas nevojave tuaja.', '30.50', 15, 0, 0, 3),
(5, 'Serum për fytyrë The Ordinary Resveratrol 3% + Ferulic Acid 3%, 30 ml', '../images/produktet/1656930218-62c2bfaaa3e2d.jpg', '../images/produktet/1656930218-62c2bfaaa3e43.jpg', '../images/produktet/1656930218-62c2bfaaa3e4e.jpg', '../images/produktet/1656930218-62c2bfaaa3e5a.jpg', 7, 'Serumi i lëkurës nga marka e njohur The Ordinary është shumë efektiv kombinon përqendrime të larta të dy antioksidantëve më të fortë dhe më të rëndësishëm në resveratrol dhe acid ferulik për kujdesin e lëkurës. Serumi rigjallëron lëkurën e dëmtuar dhe të dobësuar, ndriçon njollat e pigmentit, promovon prodhimin e kolagjenit dhe është shumë efektiv në luftimin kundër rrudhave.', '18.30', 10, 0, 0, 3),
(6, 'Buzëkuq Dior Addict Stellar, nr. 976 Be Dior, 6.5 ml', '../images/produktet/1656930300-62c2bffc3e6ee.jpg', '../images/produktet/1656930300-62c2bffc3e6fc.jpg', '../images/produktet/1656930300-62c2bffc3e702.jpg', '../images/produktet/1656930300-62c2bffc3e708.jpg', 1, 'Marka Christian Dior kujdeset që të keni buzë të formësuara dhe të theksuara andaj edhe ka dizajnuar buzëkuqin Addict Stellar me nuancë 976 Be Dior i cili bën buzët të duken jashtëzakonisht të bukura.', '42.00', 50, 0, 0, 3),
(7, 'Furçë për dhëmbë Misvak', '../images/produktet/1656930340-62c2c02496cdf.jpg', '../images/produktet/1656930340-62c2c02496ced.jpg', '../images/produktet/1656930551-62c2c0f7d7168.jpeg', '../images/produktet/1656930551-62c2c0f7d7174.png', 7, 'Për pastrim sa më efikas të dhëmbëve marka Jungle Way ka dizajnuar brushën e dhëmbëve misvak që është rrënja e pemës Salvadoran. Misvaku kujdeset për higjienën orale, pasi që largon bakteriet dhe i zbardhon dhëmbët. Ky misvak përdoret deri më 30 larje, është me gjatësi 13-14 cm dhe përshtatet për fëmijë dhe të rritur.', '4.12', 25, 0, 0, 3),
(8, 'Tharëse flokësh BaByliss', '../images/produktet/1656930595-62c2c123e51f6.jpg', '../images/produktet/1656930595-62c2c123e5204.png', '../images/produktet/1656930595-62c2c123e520b.png', '../images/produktet/1656930595-62c2c123e5212.png', 1, 'Tharësja përveç faktit që than flokët shumë më shpejt sesa tharëset standarde, gjithashtu mund të kujdeset për çdo lloj floku, kaçurrela dhe të drejta, ku shpejtësia e lartë garanton rezultate të menjëhershme të tharjes dhe ju lejon të thani flokët më shpejt. Pajisja ka dy koka të zëvendësueshme. Njëra është krijuar për flokë kaçurrelë. Ndërsa tjetra është e dobishme për njerëzit që duan që fijet e tyre të duken të shëndetshme dhe të mos thahen për shkak të tharjes intensive. Pajisjet BaByliss kanë kabllo 2.8 m të gjatë. Është gjatësia e përsosur për lëvizje të lirë përreth, për shembull, banjo ose rreth tavolinës së veshjes ndërsa thani flokët dhe stiloni ato. Për më tepër, pajisja ka fuqi 2100 W.', '53.67', 16, 0, 0, 3),
(9, 'Aromë për veturë Mr & Mrs Fragrance Giorgino Peppermint', '../images/produktet/1656930888-62c2c248312f3.jpg', '../images/produktet/1656930888-62c2c24831302.jpg', '../images/produktet/1656930888-62c2c24831307.jpg', '../images/produktet/1656930888-62c2c2483130e.jpg', 3, 'Në mënyrë që vetura e juaj të jetë e freskët marka Mr & Mrs Fragrance ka dizajnuar aromën Giorgino Peppermint të punuar nga vajrat esencial. Aroma në formë kukulle e aromatizon dhe freskon automobilin e juaj deri më 3 muaj, lufton aromat e pakëndshme, sidomos aromën e duhanit falë punimit nga nenexhiku, piperi, grejpfruti dhe bergamoti.', '4.83', 22, 0, 0, 5),
(10, 'Sprej për shkëlqimin e gomave SONAX XTREME, 400 ml', '../images/produktet/1656930916-62c2c2642c2a3.jpg', '../images/produktet/1656930916-62c2c2642c2b9.jpg', '../images/produktet/1656930916-62c2c2642c2bf.jpg', '../images/produktet/1656930916-62c2c2642c2c6.jpg', 3, 'SONAX XTREME Spreji për shkëlqimin e gomave i bën të gjitha gomat të duken si të lagura, me shkëlqim të pasur. Goma njëkohësisht mirëmbahet dhe kur përdorët rregullisht mbron gomën nga plasaritjet, vjetërimi i hershëm, humbja dhe zbardhja e ngjyrës. Pamja e e zezë e thelle dhe e lagur zgjat për disa javë. Për të gjitha llojet e gomave. Jashtëzakonisht lehtë të aplikohët: Aplikoni produktin në sasi të vogël, lëreni të punojë dhe jeni gati.', '10.99', 30, 0, 0, 5),
(11, 'Turjelë Graphite Energy+ 58G000, 18V', '../images/produktet/1656933798-62c2cda69686a.jpg', '../images/produktet/1656933798-62c2cda696883.jpg', '../images/produktet/1656933798-62c2cda696893.jpg', '../images/produktet/1656933798-62c2cda6968a5.jpg', 9, 'Bateria është e përfshirë në paketim.', '36.77', 10, 0, 0, 5),
(12, 'Kuti mjetesh me mjete, 80 copë', '../images/produktet/1656934026-62c2ce8ab9f23.jpg', '../images/produktet/1656934026-62c2ce8ab9f32.jpg', '../images/produktet/1656934026-62c2ce8ab9f3b.png', '../images/produktet/1656934026-62c2ce8ab9f43.png', 9, '-', '130.45', 15, 0, 0, 5),
(13, 'Fleks dore me bateri SGS 5510 Aku X-tech 20V, 4.0Ah', '../images/produktet/1656934205-62c2cf3d8c353.png', '../images/produktet/1656934205-62c2cf3d8c364.png', '../images/produktet/1656934205-62c2cf3d8c36c.png', '../images/produktet/1656934205-62c2cf3d8c373.png', 9, 'Fleks dore me bateri, doreza është e veshur me gomë, që thith dridhjet për përdorim të rehatshëm. Dizajni kompakt lejon funksionim të rehatshëm me njërën dorë dhe akses në hapësira të kufizuara.\r\nKapaciteti i baterisë: 20V-4.0Ah-Li-ion\r\nShpejtësia: RPM 0-4500/7000/8500 rpm\r\nMadhësia e diskut: 115 mm\r\nLidhës: M-14\r\nKoha e karikimit: 90 minuta', '160.00', 5, 0, 0, 5),
(14, 'Vitamin B Complex Voonka, 62 tableta', '../images/produktet/1656935103-62c2d2bfc041c.jpg', '../images/produktet/1656935103-62c2d2bfc042d.jpg', '../images/produktet/1656935103-62c2d2bfc0433.jpg', '../images/produktet/1656935103-62c2d2bfc0439.jpg', 7, 'Vitamin B Complex - përmban vitam ina të cilat nihmojnë në zvogëlimin e lodhjes dhe rraskapitjes. Ndihmon në funksionin normal të sistemit imunitar dhe shëndetin e lëkures dhe të flokëve. Mund të përdoret 1-2 herë në ditë.', '4.80', 20, 0, 0, 6),
(15, 'Black Seed Oil (Vaj i farës së zezë - Nigella Sativa) 100% Natyral, 150ml', '../images/produktet/1656935172-62c2d3045b286.jpg', '../images/produktet/1656935172-62c2d3045b294.jpg', '../images/produktet/1656935172-62c2d3045b299.jpg', '../images/produktet/1656935172-62c2d3045b29f.jpg', 7, 'Black Seed Oil (Vaji i farës së zezë) nga Healthaid prodhohet nga farat e bimës Nigella Sativa, me kualitet të lartë dhe pa ekstrakte kimikale. Ka veti anti-oksidante, anti-inflamatore dhe anti-fungale, ndërsa cilësohet si shërues universal sepse përdoret për parandalimin dhe shërimin e shumë sëmundjeve e problemeve shëndetësore. \r\n\r\nINDIKACIONET\r\n\r\nBlac Seed Oil nga HealthAid është i dobishëm për:\r\n- Uljen e yndyrës në gjak\r\n- Përmirësimin e tensionit të gjakut\r\n- Parandalimin e zhvillimit dhe rritjes së qelizave kanceroze\r\n- Mbrojtjen e trurit nga neuro-inflamacionet\r\n- Tretje më të mirë (për personat me kapsllëk)\r\n\r\nMËNYRA E PËRDORIMIT     \r\n\r\nBlack Seed Oil nga Healthaid mund të përdoret nga të rriturit dhe fëmijët mbi moshën 12 vjet, nga një lugë në ditë (deri në 5ml). Mund të përdoret edhe si vaj për sallatë dhe ushqime të tjera.\r\n\r\nPër përdorim të jashtëm, mund të vendoset në fytyrë si pjesë e kujdesit ditorë dhe në flokë si një tonik i shkëlqyeshëm dhe hidratues.\r\n\r\nTë mos tejkalohet doza e rekomanduar pa konsultim paraprak me mjekun apo personin e kualifikuar!', '18.99', 18, 0, 0, 6),
(16, 'Stetoskop S-20 CAMI', '../images/produktet/1656935537-62c2d471315a1.jpg', '../images/produktet/1656935537-62c2d471315b4.jpg', '../images/produktet/1656935537-62c2d471315ba.jpg', '../images/produktet/1656935537-62c2d471315c0.jpg', 7, 'Stetoskopi është një instrument i përdorur për dëgjimin e tingujve të prodhuar nga trupi. Përdoret kryesisht për të dëgjuar mushkëritë, zemrën dhe traktin e zorrëve. Përdoret gjithashtu për të dëgjuar rrjedhën e gjakut në enët periferike dhe tingujt e zemrës sëzhvillimit të fetusit në gratë shtatzëna.\r\n48 mm me dy koka\r\nKokë e madhe për dëgjimin e zemrës dhe mushkërive\r\nKokë e vogël për frekuencë të ulët\r\nRreth jo të ftohët\r\nKëllëf të butë për veshë\r\nKryqëzimi i lidhjeve nga Alumini\r\nTub i vetëm Y nga PVC', '4.50', 12, 0, 0, 6),
(17, 'Biçikletë fitnesi Zipro One S Gold', '../images/produktet/1656935610-62c2d4ba86d40.jpg', '../images/produktet/1656935610-62c2d4ba86d51.jpg', '../images/produktet/1656935610-62c2d4ba86d57.jpg', '../images/produktet/1656935610-62c2d4ba86d5d.jpg', 8, 'One S Gold është një version i ri i biçikletës më të shitur për ushtrime nga Zipro, të krijuar për trajnim në shtëpi. Ajo ofron qasje të pakufizuar në trajnim, kështu që ju mund të merrni një dozë stërvitje në çdo kohë, e cila do të ketë një efekt pozitiv në gjendjen tuaj dhe do t\'ju lejojë të pakësoni figurën tuaj dhe të digjni kilogramët e tepërt. Biçikleta përdor një sistem të rezistencës magnetike. Mekanizmi punon në heshtje, pa probleme, pa ndërprerje dhe karakterizohet nga funksionimi pa dështime.\r\n\r\nEdicioni prej ari i biçikletës One S do të duket bukur në shtëpinë tuaj. Kombinimi i ngjyrës së zezë me shkëlqim të lartë klasik dhe elegant me një lot të artë do t\'ju bëjë të dashuroheni me One S Gold të ri.\r\n\r\nOne S Gold është pajisur me një kompjuter të ri. Ekrani më i madh përmirëson lexueshmërinë, dhe rafti për një pajisje të lëvizshme ju lejon të keni një celular të mençur afër për të qenë gjatë gjithë kohës në internet dhe për të qenë në gjendje të përdorni aplikacione trajnimi. 3 butona funksionalë sigurojnë funksionim të lehtë dhe funksionet e para-ngarkuara ju lejojnë të monitoroni parametrat e trajnimit.\r\n\r\nEkrani i kompjuterit informon për kohën e ushtrimit, distancën e kaluar, numrin e kalorive të djegura dhe shpejtësinë aktuale. Përveç kësaj, kompjuteri paraqet lartësinë e pulsit të regjistruar nga senzorë të prekjes për matjen e pulsit në dorezat e timonit.\r\n\r\nPërveç kësaj, funksioni Scan paraqet të gjitha të dhënat e matura një nga një - në sajë të kësaj, kompjuteri i biçikletës shfaq informacion të plotë pa pasur nevojë të shtypni butonat dhe të hiqni duart nga timoni. Për të mbajtur bateritë që punojnë më gjatë, kompjuteri fiket automatikisht pas disa minutash pasiviteti.\r\n\r\nBiçikleta Zipro One S Gold, përveç kompjuterit të ri, ka një dizajn të rifreskuar dhe një strukturë edhe më të hijshme, e cila është gjithashtu më e fortë - pesha maksimale e përdoruesit mund të jetë 110 kg. Stabilizuesit sigurojnë stabilitet gjatë stërvitjes, dhe përfundimi i tyre me mbulesa plastike mbron sipërfaqen nga gërvishtjet. Dizajni ergonomik e bën atë një zgjidhje perfekte për përdorim në kushtet e hapësirës së kufizuar në dhoma të vogla.\r\n\r\nNjë shalë me një mbushje të butë siguron rehati gjatë ngasjes. Rregullimi i tij i lartësisë në intervalin prej 5 gradësh lejon rregullim të saktë të lartësisë së personit që ushtron. Rezistenca magnetike menaxhohet nga një çelës në kolonën e timonit. 8 nivelet e rregullimit të tij ju lejojnë të rregulloni ngarkesën në nivelin e trajnimit të personit që ushtron dhe sipas nevojave individuale. Pedalet kanë një sipërfaqe jo të rrëshqitshme dhe rripa të rregullueshëm për të stabilizuar këmbët gjatë stërvitjes. Ka shtresa rrotulluese në stabilizuesin e pasmë, të cilat lejojnë që biçikleta të rrafshohet në tokë të pabarabartë.\r\n\r\nNjë biçikletë e palëvizshme është një nga pajisjet më të njohura kardio të zgjedhura për trajnimin në shtëpi. Nuk ju zë shumë hapësirë dhe ju lejon të kryeni trajnime efektive brenda katër mureve tuaja.\r\n\r\nUshtrimet mbi të përfshijnë kryesisht muskujt e këmbëve. Kofshët, pjesët e pasme të këmbëve dhe vithet, si dhe muskujt e barkut dhe krahëve, punojnë më intensivisht gjatë ngasjes. Përparësia e madhe e biçikletave të fitnesit është se ato nuk rëndojnë nyjet dhe shtyllën kurrizore me peshën e trupit, kështu që është i sigurt përdorimi i tyre.\r\n\r\nTrajnimi me biçikleta fitnesi ju lejon të digjni kalori në mënyrë efikase dhe të heqni qafe yndyrën e tepërt të trupit. Pas vetëm 30 minutash pune me biçikletën, trupi djeg mbi 200 kcal. Ushtrimi ju lejon të përmirësoni pamjen tuaj dhe shpejt mund të shihni ndryshime të dukshme në formën e këmbëve, vitheve dhe ijeve të holla dhe të skalitura.\r\n\r\nPërmasat e biçikletës janë: 89 x 43.5 x 110 cm. Pesha: 16.5 kg.', '129.50', 5, 0, 0, 6),
(18, 'Pesha dore Zipro, të zeza, 2x20kg', '../images/produktet/1656935667-62c2d4f31c3b8.jpg', '../images/produktet/1656935667-62c2d4f31c3cb.jpg', '../images/produktet/1656935667-62c2d4f31c3d1.jpg', '../images/produktet/1656935667-62c2d4f31c3d6.jpg', 8, 'Pesha dore Zipro të përbëra nga dy shufra çeliku të gjatë 52 cm dhe ngarkesa me një peshë totale prej 40 kg. Pllakat janë bërë prej çimentoje të mbuluar me një shtresë plastike e cila kursen substratin në rast të rënies dhe vendosjes në fund të serisë.\r\n\r\nSeti Zipro përfshin gjithsej 16 ngarkesa: 8 me peshë 1.25 kg, 4 me peshë 2.5 kg dhe 4 me peshë 5 kg. Falë kësaj, ato mund të përdoren në konfigurime të ndryshme të peshës - në varësi të ushtrimit që kryhet, planit të trajnimit ose nivelit të përparimit të personit që ushtron.\r\n\r\nPeshat e dorës janë një nga mënyrat më të njohura dhe efektive për të forcuar dhe tonifikuar muskujt e krahëve, gjoksit dhe shpinës. Përparësia e madhe e stërvitjes me përdorimin e tyre është fakti që ata angazhojnë më shumë muskuj se sa ushtrime në makineri me një trajektore të caktuar lëvizjeje.\r\n\r\nGjatë stërvitjes, përveç grupit të stërvitur të muskujve, ushtrojnë edhe muskujt stabilizues, dhe një ushtrim i njëjtë mund të kryhet në kënde të ndryshme dhe në disa mënyra. E gjithë kjo e bën trajnimin më të plotë dhe më të vlefshëm.', '79.95', 7, 0, 0, 6),
(19, 'Orë e mençur Vivax Life FIT', '../images/produktet/1656935764-62c2d554d6693.jpg', '../images/produktet/1656935764-62c2d554d66a1.jpg', '../images/produktet/1656935764-62c2d554d66a7.jpg', '../images/produktet/1656935764-62c2d554d66ad.jpg', 6, 'Ora Vivax Smart LifeFit HERO mbështet teknologjinë Bluetooth dhe WiFi. Është rezistente ndaj ujit dhe ka ekran me diagonale 1.4\'\'. Ofron matje të vlerave të zemrës, ecje / palestër, vrapim. Vjen me ngjyrë të hirtë. Përputhet me Android dhe iOS dhe ka mbrojtje IP68.', '34.99', 11, 0, 0, 7),
(20, 'Laptop Lenovo Ideapad 3i 14\", Intel Core i5-1135 G7, 4GB RAM, 256 GB SSD, Win 10 Home', '../images/produktet/1656935867-62c2d5bbc91fd.jpg', '../images/produktet/1656935867-62c2d5bbc920f.jpg', '../images/produktet/1656935867-62c2d5bbc9218.jpg', '../images/produktet/1656935867-62c2d5bbc921e.jpg', 6, 'Njihuni me Lenovo IdeaPad 3i 14\". Ky model e bën qëndrimin në punë ose mësimin nga shtëpia edhe më të këndshëm. \r\nLenovo IdeaPad 3i veçohet me performancën e procesorëve Intel Core të gjeneratës së 11-të, të cilët për momentin janë gjenerata e fundit në treg. Ekrani FHD 14\" me kornizat ultra të holla në të katër anët ofrojnë pamje të këndshme si për punë, ashtu edhe për argëtim.', '539.00', 3, 0, 0, 7),
(21, 'Monitor Samsung C27F396 - LED 27\"', '../images/produktet/1656935905-62c2d5e14fa3d.jpg', '../images/produktet/1656935905-62c2d5e14fa4c.jpg', '../images/produktet/1656935905-62c2d5e14fa52.jpg', '../images/produktet/1656935905-62c2d5e14fa58.jpg', 6, 'Ky monitor ka një ekran të lakuar në mënyrë optimale, duke ju dhënë një rreze më të madhe shikimi.\r\n\r\nMe kënde të larta shikimi 178 °, ajo siguron një përvojë të pabesueshme. Monitor i përkulshëm është një zgjedhje shumë më e mirë për shikimin e rehatshëm për shumë orë të tëra.\r\n\r\nKa madhësinë 27\", me rezolucion 1920 x 1080 dhe operon me frekuencë 60H', '203.50', 5, 0, 0, 7),
(22, 'Celular Apple iPhone 12, 6.1\" FHD+, 4GB RAM, 64GB', '../images/produktet/1656935937-62c2d60195723.jpg', '../images/produktet/1656935937-62c2d60195732.jpg', '../images/produktet/1656935937-62c2d60195738.jpg', '../images/produktet/1656935937-62c2d6019573d.jpg', 6, 'iPhone 12 vjen edhe më mirë se kurrë. Ju mund të zgjidhni nga katër modele. Nëse dëshironi një zgjidhje të vogël, merrni 12 mini, klasikja do të jetë 12 dhe për më të kërkuarit ka 12 Pro dhe Pro Max. Ju gjithmonë merrni atë që ju përshtatet më shumë.\r\n\r\nApple iPhone 12 është mundësuar nga një çip i fuqishëm A14 Bionic me motorin Neural Engine të gjeneratës së fundit dhe performancë më të lartë të të mësuarit të makinës. Memorie e brendshme me kapacitet prej 64 GB është e gatshme për sistemin, të dhënat dhe aplikacionet.\r\n\r\nEkrani 6.1 \" Super Retina XDR me teknologji OLED dhe TrueTone ka një rezolucion prej 2532 × 1170 px me një përsosuri prej 460 ppi. iPhone 12 ka një kamerë të dyfishtë të pasme 12 MP me një lente me kënd të gjerë me hapje ƒ / 1.6, ultra të gjerë ƒ / 2.4 dhe stabilizim optik të imazhit. Për të bërë selfie mund të përdoret kamera e përparme 12 MP TrueDepth me qasje përmes Face ID.\r\n\r\nCelulari është rezistent ndaj ujit dhe pluhurit sipas specifikimit të mbrojtjes IP68. Teknologjitë wireless Bluetooth 5.0, NFC, Wi-Fi ax ose LTE dhe 5G sigurojnë lidhje të shpejtë. Ekziston edhe një marrës GPS / GLONASS / Galileo / QZSS / BeiDou dhe ndërfaqja Lightning. Mund të përdorni kabllon MagSafe ose teknologjinë wireless Qi për karikim. Senzorët përfshijnë: Face ID, barometer, xhiroskop me tre akse, akselerometër, senzor të afërsisë, senzor të dritës së ambientit dhe busullë digjitale. Celulari juaj ka të instaluar sistemin e ri operativ iOS 14.', '829.50', 7, 0, 0, 7),
(23, 'Tavolinë kompjuteri Ultradesk Momentum', '../images/produktet/1656936141-62c2d6cd636b4.jpg', '../images/produktet/1656936141-62c2d6cd636c3.png', '../images/produktet/1656936141-62c2d6cd636cb.png', '../images/produktet/1656936141-62c2d6cd636d2.png', 6, 'Tavolinat kompjuterike për lojtarët nga Ultradesk do të përmbushin pritshmëritë e të gjithë njohësve të argëtimit virtual. Dizajnerët u kujdesën për çdo detaj për të siguruar rehati të pakompromis edhe gjatë orëve të gjata të seancave me titujt tuaj të preferuar. Një strukturë e fortë, një sipërfaqe e madhe e tavolinës dhe ergonomia mbi mesataren janë avantazhe që nuk mund të anashkalohen. Zgjidhni një model të provuar dhe luani pa kufi!Ultradesk Momentum është një zgjedhje e jashtëzakonshme për mbajtjen e pajisjes tuaj të sporteve elektronike. Ajo ofron një pjesë të sipërme të gjatë dhe të gjerë që ofron shumë hapësirë për monitorët, konzolat video, tastierën dhe pajisje të tjera lojërash. Korniza e tavolinës kombinon një strukturë të fortë mbajtëse me vlera të larta estetike. Është e mbuluar me një shtresë të veçantë për të krijuar një teksturë delikate në sipërfaqen e jashtme.Seti përfshin një shtresë të trashë me madhësi XXL për të gjithë pjesën e sipërme. Ajo është e papërshkueshme nga uji. Ofron një sipërfaqe të butë të sipërme, një bazë gome që nuk rrëshqet dhe skaje të qepura për mbrojtje. Shtresa është bërë nga materiale të cilësisë më të lartë që e bëjnë atë shumë të qëndrueshme. Ofron gjurmim të shkëlqyer me çdo lloj senzori.Risi të vogla që ndikojnë dukshëm në rehatinë e lojtarit përfshijnë një mbajtëse kufjesh, një mbajtëse filxhani dhe një mini mbajtëse me porte USB. Momentum ka gjithashtu një mbajtëse celulari me kënd të rregullueshëm. Të gjithë aksesorët e lartpërmendur mundësojnë organizimin perfekt të hapësirës në pjesën e sipërme.Mbrojtje efektive kundër dëmtimit të transportit! - Tavolina dorëzohet në 2 kuti të veçanta për të garantuar sigurinë e të gjithë elementëve (veçanërisht pjesës së sipërme).Përmasat e pjesës së sipërme janë: 152.5 x 70 cm.', '253.94', 4, 0, 0, 7),
(24, 'Anne Frank Dk Life Stories - Stephen Krensky', '../images/produktet/1656936330-62c2d78aec8f8.jpg', '../images/produktet/1656936330-62c2d78aec907.jpg', '../images/produktet/1656936330-62c2d78aec90e.jpg', '../images/produktet/1656936330-62c2d78aec915.jpg', 4, '-', '7.80', 3, 0, 0, 8),
(25, 'Fairy Oak Fuqia E Drites - Elisabetta Gnone', '../images/produktet/1656936558-62c2d86e560fe.jpg', '../images/produktet/1656936558-62c2d86e5610e.jpg', '../images/produktet/1656936558-62c2d86e56115.jpg', '../images/produktet/1656936558-62c2d86e5611b.jpg', 4, '-', '8.80', 1, 0, 0, 8),
(26, 'Aventurat E Maks Capkenit - Rachel Renee Russell', '../images/produktet/1656936666-62c2d8daadcf2.jpg', '../images/produktet/1656936666-62c2d8daadd03.jpg', '../images/produktet/1656936666-62c2d8daadd09.jpg', '../images/produktet/1656936666-62c2d8daadd0f.jpg', 4, '-', '8.70', 5, 0, 0, 8),
(27, 'Gruaja Me Te Bardha 2 - Wilkie Collins', '../images/produktet/1656936692-62c2d8f4a13a0.jpg', '../images/produktet/1656936692-62c2d8f4a13af.jpg', '../images/produktet/1656936692-62c2d8f4a13b5.jpg', '../images/produktet/1656936692-62c2d8f4a13bb.jpg', 4, '-', '8.50', 2, 0, 0, 8),
(28, 'A Room of Ones Own - Virginia Woolf', '../images/produktet/1656936724-62c2d91472634.jpg', '../images/produktet/1656936724-62c2d91472643.jpg', '../images/produktet/1656936724-62c2d91472649.jpg', '../images/produktet/1656936724-62c2d9147264f.jpg', 4, '-', '12.90', 8, 0, 0, 8),
(29, 'Shirit vrapues Zipro Tekno', '../images/produktet/1656936955-62c2d9fb75d2c.jpg', '../images/produktet/1656936955-62c2d9fb75d3c.jpg', '../images/produktet/1656936955-62c2d9fb75d42.jpg', '../images/produktet/1656936955-62c2d9fb75d48.png', 8, 'Mos hiqni dorë nga vrapimi për shkak të motit të keq ose ndotjes së ajrit. Qëndroni në formë gjatë gjithë vitit, pavarësisht nga kushtet e jashtme dhe orari i hapjes së palestrës. Tekno është një shirit vrapimi nga Zipro që lejon njerëzit me nivele të ndryshme të trajnimit të kryejnë stërvitje të ndryshme në shtëpi: marshime, shëtitje, vrapime palestre dhe vrapime me shpejtësi deri në 18 km / orë.\r\nAftësia për të rregulluar pjerrësinë e korsisë reflekton ngjitjen, dhe kontrolli i shpejtësisë ju lejon të rregulloni ritmin e vrapimit. Një kompjuter me një ekran me ndriçim të kaltër ju lejon të kontrolloni trajnimin. Regjistron shpejtësinë, kohën, distancën, distancën totale, kaloritë dhe rrahjet e zemrës të matura nga senzorët e prekjes në doreza. \r\nAmortizimi efikas thith goditjet dhe minimizon sforcimin e nyjeve gjatë vrapimit, dhe rrotat e transportit dhe mundësia e palosjes e bëjnë më të lehtë përdorimin e këtij shiriti vrapimi në shtëpi.\r\nProgramet e ngarkuara në kompjuter do të thonë që çdo stërvitje mund të sjellë më shumë përfitime. Ato diversifikojnë ushtrimet dhe e bëjnë më të lehtë arritjen e qëllimeve të përcaktuara.\r\nSistemi Comfort Protect përbëhet nga 8 elastomerë. Ai kursen nyjet gjatë vrapimit dhe i mbron ato nga mbingarkesat kur këmba bie në kontakt me secilin hap të ndërmarrë.\r\nAmortizimi siguron rehati dhe siguri pavarësisht nga pjerrësia e shiritit gjatë trajnimit.\r\nTrajnimi sistematik kardio është më i miri që mund t’i jepni zemrës suaj. Në planin afatgjatë, kujdesi për zemrën dhe sistemin e qarkullimit të gjakut përmes ushtrimeve të rregullta është kryesor. Qëndrimi në formë të lartë fizike është thelbësor për cilësinë e jetës dhe funksionimin e përditshëm.\r\nUshtrimet në shirit vrapimi janë një mënyrë e shkëlqyeshme për të hequr qafe dhjamin e panevojshëm dhe për të përmirësuar gjendjen tuaj. Trajnimi i rregullt ju lejon të digjni kalori shpejt dhe me lehtësi të arrini dhe mbani një figurë të hollë dhe gjendje të mirë.\r\nShiriti i vrapimit përmirëson dhe ju mundëson të mbani të gjithë trupin në formë. Ai forcon muskujt e poshtëm veçanërisht. Diapazoni i gjerë i shpejtësisë, i cili lejon gjithashtu ecjen ose vrapimin, i bën pajisjet të përshtatshme për njerëzit pas dëmtimeve dhe të moshuarit.\r\nPërmasat e këtij shiriti vrapimi janë: 155 x 68 x 132 cm. Përmasat e tij kur paloset janë: 78 x 68 x 144 cm. Pesha: 42.6 kg. Pesha maksimale e përdoruesit mund të jetë 120 kg.', '499.50', 13, 0, 0, 9),
(30, 'Pajisje fitnesi për ushtrime BH Fitness G330, 208 x 103 x 171 cm', '../images/produktet/1656937072-62c2da70bbdef.jpg', '../images/produktet/1656937072-62c2da70bbdfd.jpg', '../images/produktet/1656937072-62c2da70bbe03.jpg', '../images/produktet/1656937072-62c2da70bbe0a.jpg', 8, '-', '454.68', 7, 0, 0, 9),
(31, 'Karikues për veturë Platinet QUICK CHARGE 3.0 2xUSB 18W', '../images/produktet/1656937142-62c2dab67536c.jpg', '../images/produktet/1656937142-62c2dab67537e.jpg', '../images/produktet/1656937142-62c2dab675384.jpg', '../images/produktet/1656937142-62c2dab67538a.jpg', 3, 'Karikues veture për celularë. Ka 2 porte USB. Korniza plastike jo e ndezshme me cilësi të lartë. Ka mbrojtje nga qarku i shkurtër, OVP, OCP. Përmasat e tij janë 55x28.5x29mm dhe peshon 49.6g.', '5.77', 16, 0, 0, 9),
(32, 'Pastrues xhami WV 2 plus', '../images/produktet/1656937280-62c2db402a0a0.jpg', '../images/produktet/1656937280-62c2db402a0ae.png', '../images/produktet/1656937280-62c2db402a0b4.png', '../images/produktet/1656937280-62c2db402a0ba.png', 3, '-', '64.50', 1, 0, 0, 9),
(33, 'Pastrues i gomave të veturës OT', '../images/produktet/1656937372-62c2db9c95435.jpg', '../images/produktet/1656937372-62c2db9c95443.jpg', '../images/produktet/1656937372-62c2db9c95449.jpg', '../images/produktet/1656937372-62c2db9c9544f.jpg', 3, 'Pastruesi Dunlop përdoret për pastrimin e gomave të veturës. Ky pastrues ju ndihmon të riktheni shkëlqimin e gomave sikur të ishin të reja. Pastruesi është shumë praktik për përdorim mjafton të spërkatni mbi pjesën e dëshiruar. Ka sasi prej 500 ml.', '5.82', 3, 0, 0, 9),
(34, 'How to Train Your Dragon Njr - Cressida Cowell', '../images/produktet/1656937424-62c2dbd066cc2.jpg', '../images/produktet/1656937424-62c2dbd066cd1.jpg', '../images/produktet/1656937424-62c2dbd066cd7.jpg', '../images/produktet/1656937424-62c2dbd066cdd.jpg', 4, '-', '9.50', 3, 0, 0, 10),
(35, 'A Boy Called Christmas - Matt Haig', '../images/produktet/1656937448-62c2dbe88ef20.jpg', '../images/produktet/1656937448-62c2dbe88ef2e.jpg', '../images/produktet/1656937448-62c2dbe88ef34.jpg', '../images/produktet/1656937448-62c2dbe88ef3a.jpg', 4, '-', '9.50', 17, 0, 0, 10),
(36, 'Termometër për fëmijë Beurer BY 11 ', '../images/produktet/1656937605-62c2dc85bd105.jpg', '../images/produktet/1656937605-62c2dc85bd114.png', '../images/produktet/1656937605-62c2dc85bd11b.png', '../images/produktet/1656937605-62c2dc85bd122.png', 7, 'Teknologjia e matjes së temperaturës me kontakt.\r\nMe maje shumë fleksibile për matje.\r\nBesueshmëri e provuar.\r\nKoha e matjes përafërsisht. 10 sek.\r\nAlarmi i etheve: toni paralajmërues nga temp. 37.8° C.\r\nShfaqja e ° C dhe ° F.\r\nMaje dhe ekran rezistent ndaj ujit.\r\nI dezinfektueshëm.\r\n1 hapësirë memorike.\r\nFikje automatike.\r\nSinjali akustik në fund të matjes.\r\nMe kapak mbrojtës.', '13.00', 11, 0, 0, 10),
(37, 'Peshore Sencor SBS 2507RD', '../images/produktet/1656937694-62c2dcdecf008.jpg', '../images/produktet/1656937694-62c2dcdecf017.jpg', '../images/produktet/1656937694-62c2dcdecf01d.jpg', '../images/produktet/1656937694-62c2dcdecf022.jpg', 7, 'Peshore personale Sencor\r\nKa një sipërfaqe qelqi për pastrim të lehtë dhe një xham sigurie (6 mm) dhe dizajn të hollë (18 mm) me kapacitet për peshim deri në 150 kg.\r\n\r\nSpecifikat:\r\n\r\nOpsioni për të zgjedhur njësitë matëse (kg / lb)\r\nTreguesi i baterisë dhe mbingarkesës\r\nMbyllja automatike kur është në gjendje boshe\r\nBurimi i energjisë: Bateri litiumi 1x CR2032 (Përfshihet)', '16.99', 7, 0, 0, 10),
(38, 'Maskë mbrojtëse medicinale ZP-0152, 10 copë', '../images/produktet/1656938208-62c2dee0d3078.jpg', '../images/produktet/1656938208-62c2dee0d3088.png', '../images/produktet/1656938208-62c2dee0d3090.jpg', '../images/produktet/1656938208-62c2dee0d3098.jpg', 7, 'Respiratori është krijuar për të mbrojtur përdoruesin nga thithja e grimcave të ngurta dhe aerosoleve të lëngëta. Janë të destinuar për përdorim të vetëm, koha e përdorimit varet nga përqendrimi i pluhurit në vendin e punës dhe aktiviteti i përdoruesit.', '7.00', 20, 0, 0, 10),
(39, 'Bluze për meshkuj Jack&jones Originals', '../images/produktet/1656938310-62c2df46bb96e.jpg', '../images/produktet/1656938310-62c2df46bb97b.jpg', '../images/produktet/1656938310-62c2df46bb981.jpg', '../images/produktet/1656938310-62c2df46bb986.jpg', 5, 'Bluze për meshkuj Jack&jones Originals 219899, Navy Blazer, L Përmbajtja: Gender: Male Manufacture: Circular Knit Manufacture Detail: Single Jersey Style Type: T-SHIRT Composition: 100% Pambuk, 150 GSM, JJ-TE-ES17', '9.99', 4, 4, 3, 11),
(40, 'Fustan Only Martha', '../images/produktet/1656938347-62c2df6b79452.jpg', '../images/produktet/1656938347-62c2df6b79463.jpg', '../images/produktet/1656938347-62c2df6b7946a.jpg', '../images/produktet/1656938347-62c2df6b7946f.jpg', 5, 'Fustan modern nga marka e njohur ONLY. Vjen me material të këndshëm dhe cilësorë në ngjyrë të zezë, me prerje perfekte. Dizajn shumëfunsional i përshtatshëm për punë, shkollë, natyrë, dhe qytet. Ky fustan do të bëhet një hit për këtë sezon dhe vjen me madhësi M.', '18.64', 1, 3, 1, 11),
(41, 'Xhinse për meshkuj Jack&jones Jeans', '../images/produktet/1656938396-62c2df9cb4126.jpg', '../images/produktet/1656938396-62c2df9cb4133.jpg', '../images/produktet/1656938396-62c2df9cb4139.jpg', '../images/produktet/1656938396-62c2df9cb413f.jpg', 5, 'Përmbajtja: 50% Pambuk, 28% Poliester, 20% Pambuk, 2% Elastan', '39.99', 15, 3, 3, 11),
(42, 'Bluzë për meshkuj Jack&jones  BlackFit:LOOSE', '../images/produktet/1656938438-62c2dfc6e50f6.jpg', '../images/produktet/1656938438-62c2dfc6e510b.jpg', '../images/produktet/1656938438-62c2dfc6e5118.jpg', '../images/produktet/1656938438-62c2dfc6e5123.jpg', 5, 'Përmbajtja: Gender: Male Manufacture: Circular Knit Manufacture Detail: Single Jersey Style Type: T-SHIRT Composition: 100% Pambuk 180 GSM', '11.99', 4, 4, 1, 11),
(43, 'Bluze për meshkuj Jack&jones Essentials', '../images/produktet/1656939000-62c2e1f8185e5.jpg', '../images/produktet/1656939000-62c2e1f8185f5.jpg', '../images/produktet/1656939000-62c2e1f8185fc.jpg', '../images/produktet/1656939000-62c2e1f818602.jpg', 5, 'Bluze për meshkuj Jack&jones Essentials 181123, WhiteDetail:PLAY - SLIM, L Përmbajtja: Gender: Male Manufacture: Circular Knit Manufacture Detail: Single Jersey Style Type: T-SHIRT Fabric Name: JJ-TE-ES17 Composition: 100% Pambuk Density: CPI: 48 WPI: 38 Gauge: 24 Weight: 150 Yarn Grade: 30/1 Twist Per Inch: 20 Fiber Length: 29 mm Fabrics Comments: LGM: JJ-TE-ES17 - A Navy Blazer: JJ-TE-ES17 - B', '12.99', 5, 4, 18, 11),
(44, 'Atlete VANS Old Skool', '../images/produktet/1656939040-62c2e2208a987.jpg', '../images/produktet/1656939040-62c2e2208a99c.jpg', '../images/produktet/1656939040-62c2e2208a9a8.jpg', '../images/produktet/1656939040-62c2e2208a9b5.jpg', 10, 'VANS kujdeset që meshkujt të duken sa më modern dhe si e tillë ka dizajnuar atletet me ngjyrë të zezë dhe të bardhë me dizajn katror. Këto atlete janë punuar nga lëkura dhe tekstili, posedojnë shtresë anatomike dhe mbërthehen me lidhëza.', '84.95', 5, 13, 9, 11),
(45, 'Atlete Puma Graviton Pro', '../images/produktet/1656939084-62c2e24c7b7a0.jpg', '../images/produktet/1656939084-62c2e24c7b7ae.jpg', '../images/produktet/1656939084-62c2e24c7b7b4.jpg', '../images/produktet/1656939084-62c2e24c7b7b9.jpg', 10, 'Graviton Pro merr frymëzim nga koleksioni i trashëgimisë së vrapimit të PUMA me një estetikë të qetë, por me një ndjenjë të së ardhmes. Një mbështjellje që rreth zonës së përparme të këmbës, logon tërheqëse dhe një kapëse modulare të guximshme tek thembra, të gjitha spërkasin magjinë e tyre ultramoderne mbi këtë këpucë. Gjithashtu me një shtresë të mesme të lehtë me jastëk \'SoftFoam+\', do të keni një pranverë në hap sado larg të udhëtoni me Graviton Pro. Janë punuar nga sintetika, tekstili dhe goma.', '75.00', 18, 12, 9, 11),
(46, 'Atlete Nike Star Runner 3', '../images/produktet/1656939119-62c2e26f5b6f2.jpg', '../images/produktet/1656939119-62c2e26f5b701.jpg', '../images/produktet/1656939119-62c2e26f5b707.jpg', '../images/produktet/1656939119-62c2e26f5b70d.jpg', 10, 'Nike Star Runner 3 janë këpucë të gjithanshme për të vrapuar, kërcyer dhe luajtur. Ato rriten me qëndrueshmëri dhe frymëmarrje aty ku ju nevojitet. Plus, shkuma super e butë dhe ngarkesat e fleksibilitetit krijojnë rehati me çdo lëvizje. Të dizajnuara me planetin në mendje, ato janë bërë nga të paktën 20% përmbajtje të ricikluar ndaj peshës.', '52.00', 15, 9, 9, 11),
(47, 'Atlete Nike Star Runner 3', '../images/produktet/1656939149-62c2e28d05ab7.jpg', '../images/produktet/1656939149-62c2e28d05ac6.jpg', '../images/produktet/1656939149-62c2e28d05acc.jpg', '../images/produktet/1656939149-62c2e28d05ad1.jpg', 10, 'Nike Star Runner 3 janë këpucë të gjithanshme për të vrapuar, kërcyer dhe luajtur. Ato rriten me qëndrueshmëri dhe frymëmarrje aty ku ju nevojitet. Plus, shkuma super e butë dhe ngarkesat e fleksibilitetit krijojnë rehati me çdo lëvizje. Të dizajnuara me planetin në mendje, ato janë bërë nga të paktën 20% përmbajtje të ricikluar ndaj peshës.', '52.00', 8, 10, 9, 11),
(48, 'Sandale për meshkuj Jack&jones Footwear', '../images/produktet/1656939187-62c2e2b3e9c29.jpg', '../images/produktet/1656939187-62c2e2b3e9c38.jpg', '../images/produktet/1656939187-62c2e2b3e9c3e.jpg', '../images/produktet/1656939187-62c2e2b3e9c43.jpg', 10, 'Sandale për meshkuj Jack&jones Footwear 195663, Anthracite, 44 Përmbajtja: 100%Poliester 100% Upper Rubber 100% Sole Rubber', '17.99', 24, 15, 9, 11),
(49, 'Atlete për femra Nike', '../images/produktet/1656939224-62c2e2d858885.jpg', '../images/produktet/1656939224-62c2e2d858896.jpg', '../images/produktet/1656939224-62c2e2d85889c.jpg', '../images/produktet/1656939224-62c2e2d8588a2.jpg', 10, 'Atletet \'Nike Air Max Fusion\' kombinojnë gjithçka që ju nevojitet. Stili retro që të kujton vitet \'90. Jastëku \'Air Max\' me shkumë e bën çdo hap të këndshëm dhe të lehtë gjatë ecjes.', '77.00', 3, 8, 9, 11),
(50, 'Atlete për femra Nike', '../images/produktet/1656939252-62c2e2f49e901.jpg', '../images/produktet/1656939252-62c2e2f49e915.jpg', '../images/produktet/1656939252-62c2e2f49e91c.jpg', '../images/produktet/1656939252-62c2e2f49e923.jpg', 10, 'Atletet \'Nike Air Max Fusion\' kombinojnë gjithçka që ju nevojitet. Stili retro që të kujton vitet \'90. Jastëku \'Air Max\' me shkumë e bën çdo hap të këndshëm dhe të lehtë gjatë ecjes.', '77.00', 12, 9, 9, 11);

-- --------------------------------------------------------

--
-- Table structure for table `produktreview`
--

DROP TABLE IF EXISTS `produktreview`;
CREATE TABLE IF NOT EXISTS `produktreview` (
  `reviewID` int(11) NOT NULL AUTO_INCREMENT,
  `perdoruesi` varchar(150) NOT NULL,
  `starRating` int(1) NOT NULL,
  `reviewText` text NOT NULL,
  `produktID` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`reviewID`),
  KEY `reviewProdukt` (`produktID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produktreview`
--

INSERT INTO `produktreview` (`reviewID`, `perdoruesi`, `starRating`, `reviewText`, `produktID`, `date`) VALUES
(1, 'Ermal Konjufca', 3, 'Mesatare', 48, '2022-07-05 23:24:05'),
(2, 'Ermal Konjufca', 5, 'Shum me mir', 48, '2022-07-05 23:25:36'),
(5, 'Ermal Konjufca', 4, 'Produkt i mirë!', 18, '2022-07-11 17:08:56');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `madhesit`
--
ALTER TABLE `madhesit`
  ADD CONSTRAINT `kategoriaMadhesia` FOREIGN KEY (`kategoriaID`) REFERENCES `kategoria` (`kategoriaID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ngjyrat`
--
ALTER TABLE `ngjyrat`
  ADD CONSTRAINT `ngjyraKetegorit` FOREIGN KEY (`kategoriaID`) REFERENCES `kategoria` (`kategoriaID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perdoruesit`
--
ALTER TABLE `perdoruesit`
  ADD CONSTRAINT `cityForeignKey` FOREIGN KEY (`id_city`) REFERENCES `cities` (`id_city`);

--
-- Constraints for table `porosit`
--
ALTER TABLE `porosit`
  ADD CONSTRAINT `perdoruesiPorosit` FOREIGN KEY (`perdoruesID`) REFERENCES `perdoruesit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produktiPorosit` FOREIGN KEY (`produktID`) REFERENCES `produktet` (`produktID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produktet`
--
ALTER TABLE `produktet`
  ADD CONSTRAINT `colorForeignKey` FOREIGN KEY (`ngjyraID`) REFERENCES `ngjyrat` (`ngjyraID`),
  ADD CONSTRAINT `katForeignKey` FOREIGN KEY (`kategoriaID`) REFERENCES `kategoria` (`kategoriaID`),
  ADD CONSTRAINT `kompaniaForeignKey` FOREIGN KEY (`kompaniaID`) REFERENCES `kompanite` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sizeKatForeignkey` FOREIGN KEY (`madhesiaID`) REFERENCES `madhesit` (`madhesiaID`);

--
-- Constraints for table `produktreview`
--
ALTER TABLE `produktreview`
  ADD CONSTRAINT `reviewProdukt` FOREIGN KEY (`produktID`) REFERENCES `produktet` (`produktID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
