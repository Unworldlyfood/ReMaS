-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2020 at 03:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `remas`
--

-- --------------------------------------------------------

--
-- Table structure for table `apparaten`
--

CREATE TABLE `apparaten` (
  `ID` int(11) NOT NULL,
  `Naam` varchar(40) NOT NULL,
  `Omschrijving` varchar(200) DEFAULT NULL,
  `Vergoeding` float NOT NULL,
  `GewichtGram` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apparaten`
--

INSERT INTO `apparaten` (`ID`, `Naam`, `Omschrijving`, `Vergoeding`, `GewichtGram`) VALUES
(1, 'Centtrifuge', 'Losse centrifuge', 5.56, 15000),
(2, 'Desktop PC', 'Desktop pc zonder beeldscherm', 7.6, 10000),
(3, 'Koffiezetapparaat', 'Koffiezetapparaat inclusief glazen kan', 2.22, 1000),
(4, 'Laptop', 'Laptop zonder voeding', 4.95, 1200),
(5, 'Toetsenbord', 'Los toetsenbord', 1.1, 500);

-- --------------------------------------------------------

--
-- Table structure for table `innameapparaat`
--

CREATE TABLE `innameapparaat` (
  `ID` int(11) NOT NULL,
  `Ontleed` tinyint(1) DEFAULT NULL,
  `Innames_ID` int(11) NOT NULL,
  `Apparaten_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `innameapparaat`
--

INSERT INTO `innameapparaat` (`ID`, `Ontleed`, `Innames_ID`, `Apparaten_ID`) VALUES
(1, NULL, 1, 1),
(2, 1, 2, 3),
(3, NULL, 3, 2),
(4, NULL, 4, 5),
(5, 1, 5, 2),
(6, NULL, 6, 1),
(7, NULL, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `innames`
--

CREATE TABLE `innames` (
  `ID` int(11) NOT NULL,
  `Tijdstip` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Medewerkers_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `innames`
--

INSERT INTO `innames` (`ID`, `Tijdstip`, `Medewerkers_ID`) VALUES
(1, '2018-11-25 09:37:11', 2),
(2, '2018-09-27 08:37:51', 3),
(3, '2018-09-27 08:37:57', 1),
(4, '2018-05-28 08:38:00', 1),
(5, '2018-05-28 08:38:00', 1),
(6, '2018-05-24 08:38:09', 2),
(7, '2018-05-15 08:38:12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `medewerkers`
--

CREATE TABLE `medewerkers` (
  `ID` int(11) NOT NULL,
  `Naam` varchar(40) NOT NULL,
  `Wachtwoord` char(128) NOT NULL,
  `Salt` char(128) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Inlognaam` varchar(40) NOT NULL,
  `Level` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medewerkers`
--

INSERT INTO `medewerkers` (`ID`, `Naam`, `Wachtwoord`, `Salt`, `Email`, `Inlognaam`, `Level`) VALUES
(1, 'Jos', '476915be4d2b168468341c77555e74f4d8dfb6422ddebbf63d053dcb9acc4bbcfcbb00e22fbdc60381acf1c1490837c942244938e420051b31703d4af13b8b2b', '2302ddecae3eed272659c3754a245301bc41a960811c2dd8f4e330fd2d96c9fc224c1684e9dae19611f1c5abc549cadf4e0c22f60ed69637aded21cdb6c5a69c', 'Jos.Debet@emserveen.nl', '', 1),
(2, 'Edgar', '', '', 'Edgar.Credit@emserveen.nl', '', 2),
(3, 'Pieter', '', '', 'Pieter.Storms@emserveen.nl', '', 1),
(4, 'Jannie', '', '', 'Jannie.Heins@emserveen.nl', '', 2),
(7, 'Jop nijhoff', 'd4b2cc000519d1c9a581de0675d5c33777a2f644d28f7da4de0f0777788ab00cb6cef68fa9c25c17b7b21d05d52665e8defe9c49b8656e15a130b5b0b27c2fc2', '48cb6bdc6e4fc66c78c0cf1da9ddca5217c08c8552f48bcb7ab69f2af01139dc19721c4b72820f983eec2c73fd8f0fc4f38e61d416d956223a8249184bb526b2', 'jopnijhoff@hotmail.com', 'Level1', 1),
(9, 'Jop nijhoff', 'a8c897d4677e05e768071d7e7601c77280b4ed53175129f82dbf6faf4fb152f64ecb63dc7eb53f9ddc3ab151d9bd54e715264c8f834388c082a3c1001b586576', 'efece5e3a81266caab251e798edd49c4bf59891a5c3135d65565dd486de406007b1256f21f22e6ce9497116fc1f82f61f3cb7ce691b36676a5be3bd3354f4669', 'jopnijhoff@hotmail.com', 'Level2', 2),
(10, 'Jop nijhoff', 'b268bf7bc238088d6dac0e7d747743273986fd52c4d4992e8885142e43bd3e4fba0137c7a86335e28883c4548f0f03b90813b0a17148d40e37d10811ed09e0bd', '55bf4ec133cd6759f4393cbe0dd1eb33222066c188fdc5ba18851719ca48d5a0cac62ffa5cd6ce24d1c3d07a5e86050c81e1f03bd2df6cf1d0e906383976cad6', 'jopnijhoff@hotmail.com', 'Level3', 3),
(11, 'Jop nijhoff', 'd28c87a3fa2f0562805444b35449cf7ca26ea44d73bb48be943955c88ecc34a5b51b9ca57c019fee38c24cb77d75239e53b624ed186ce214015eb842cbbfc656', 'b7ab920dc8d176a5cde1e1db78d6992a186e4cb3d83b67f0789f6a557e616675cf7c330d8f05d98d09c80f5c0ff5ee790c6ac5035248aabd20689f6f4124da4e', 'jopnijhoff@hotmail.com', 'Level4', 4),
(12, 'Jop nijhoff', 'dea6aa5b89e45b3e726aa0241351eaf7c0f277627d2a07ff02150749c8020455f230558ca25f1ad73f4813809ae7c1c00a261d5d8680cdec4b27b937119ca506', 'd9c9e5f65c1cfca54f1322e87b1e1eb1a57053e745975377edf156771b29277943f9dd94a66fbb5e28aa0a249f9ef0339b55f3c1779db30d3abda1789e4656b0', 'jopnijhoff@hotmail.com', 'Level5', 5),
(13, 'Jop nijhoff', 'b265675187eb20004fa8282b5334eb824b617680352c201075aff4d818871d0fc3ebe37cda33163c7dde849f3eccd464310a2fb3f2fd43cb7c3c63b174af818a', '1bafb3b71a29ea0f0247cd6d251279a106a5572b653052a236bb12323f673469d6aa5eaa7daab4f08623268f504c1c5d99eb7f92d421a1ace237fb682a15fbe2', 'jopnijhoff@hotmail.com', 'Level6', 6);

-- --------------------------------------------------------

--
-- Table structure for table `onderdeelapparaat`
--

CREATE TABLE `onderdeelapparaat` (
  `ID` int(11) NOT NULL,
  `Percentage` int(11) DEFAULT NULL,
  `Apparaten_ID` int(11) NOT NULL,
  `Onderdelen_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `onderdeelapparaat`
--

INSERT INTO `onderdeelapparaat` (`ID`, `Percentage`, `Apparaten_ID`, `Onderdelen_ID`) VALUES
(1, 15, 1, 1),
(2, 25, 2, 7),
(3, 10, 3, 3),
(4, 80, 5, 6),
(5, 17, 1, 5),
(6, 25, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `onderdelen`
--

CREATE TABLE `onderdelen` (
  `ID` int(11) NOT NULL,
  `Naam` varchar(40) NOT NULL,
  `Omschrijving` varchar(200) DEFAULT NULL,
  `VoorraadKg` float NOT NULL,
  `PrijsPerKg` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `onderdelen`
--

INSERT INTO `onderdelen` (`ID`, `Naam`, `Omschrijving`, `VoorraadKg`, `PrijsPerKg`) VALUES
(1, 'Behuizing algemeen', 'Ijzer, Aluminium, plaatstaal', 137.692, 2.5),
(2, 'Electromotoren', 'Zowel zwakstroom als 220/380 volt', 456.78, 7.89),
(3, 'Glas', 'Glazen onderdelen zoals kannen, ruitjes', 10.59, 0.67),
(4, 'Hout', 'Houten behuizingen', 32.25, 0.01),
(5, 'Kunststof isolatiemateriaal', 'Piepschuim, schuimrubber', 0, 0.05),
(6, 'Plastic onderdelen', 'Hard plastic', 0, 0.12),
(7, 'Printplaat', 'Inclusief kleineren componenten, zonder ventilator, koeling, voeding of stekkers', 467.35, 21.15),
(8, 'Snoeren', 'Snoeren met stekker, koperen bedrading eb koperen plaatmateriaal', 512.26, 25.31);

-- --------------------------------------------------------

--
-- Table structure for table `rollen`
--

CREATE TABLE `rollen` (
  `ID` int(11) NOT NULL,
  `Naam` varchar(40) NOT NULL,
  `Omschrijving` varchar(200) DEFAULT NULL,
  `Waarde` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rollen`
--

INSERT INTO `rollen` (`ID`, `Naam`, `Omschrijving`, `Waarde`) VALUES
(1, 'Algemeen', 'Algemene medewerker', '000100'),
(2, 'Inname', 'Medewerker inname', '100100'),
(3, 'Verwerking', 'Medewerker verwerking', '010100'),
(4, 'Uitgifte', 'Medewerker uitgifte', '001100'),
(5, 'Applicatie', 'Applicatie beheerder', '111110'),
(6, 'Admin', 'Administrator', '000011');

-- --------------------------------------------------------

--
-- Table structure for table `uitgiftes`
--

CREATE TABLE `uitgiftes` (
  `ID` int(11) NOT NULL,
  `Tijdstip` datetime NOT NULL,
  `GewichtKg` int(11) NOT NULL,
  `Prijs` float DEFAULT NULL,
  `Onderdelen_ID` int(11) NOT NULL,
  `Medewerkers_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uitgiftes`
--

INSERT INTO `uitgiftes` (`ID`, `Tijdstip`, `GewichtKg`, `Prijs`, `Onderdelen_ID`, `Medewerkers_ID`) VALUES
(1, '2018-01-25 00:00:00', 240, NULL, 1, 1),
(2, '2018-05-30 00:00:00', 1250, NULL, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apparaten`
--
ALTER TABLE `apparaten`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Naam_UNIQUE` (`Naam`);

--
-- Indexes for table `innameapparaat`
--
ALTER TABLE `innameapparaat`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Innameapparaat_Innames1_idx` (`Innames_ID`),
  ADD KEY `fk_Innameapparaat_Apparaten1_idx` (`Apparaten_ID`);

--
-- Indexes for table `innames`
--
ALTER TABLE `innames`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Innames_Medewerkers1_idx` (`Medewerkers_ID`);

--
-- Indexes for table `medewerkers`
--
ALTER TABLE `medewerkers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Medewerkers_Rollen1_idx` (`Level`);

--
-- Indexes for table `onderdeelapparaat`
--
ALTER TABLE `onderdeelapparaat`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Onderdeelapparaat_Apparaten1_idx` (`Apparaten_ID`),
  ADD KEY `fk_Onderdeelapparaat_Onderdelen1_idx` (`Onderdelen_ID`);

--
-- Indexes for table `onderdelen`
--
ALTER TABLE `onderdelen`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Naam_UNIQUE` (`Naam`);

--
-- Indexes for table `rollen`
--
ALTER TABLE `rollen`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Naam_UNIQUE` (`Naam`);

--
-- Indexes for table `uitgiftes`
--
ALTER TABLE `uitgiftes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Uitgiftes_Onderdelen_idx` (`Onderdelen_ID`),
  ADD KEY `fk_Uitgiftes_Medewerkers1_idx` (`Medewerkers_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apparaten`
--
ALTER TABLE `apparaten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `innameapparaat`
--
ALTER TABLE `innameapparaat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `innames`
--
ALTER TABLE `innames`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medewerkers`
--
ALTER TABLE `medewerkers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `onderdeelapparaat`
--
ALTER TABLE `onderdeelapparaat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `onderdelen`
--
ALTER TABLE `onderdelen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rollen`
--
ALTER TABLE `rollen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uitgiftes`
--
ALTER TABLE `uitgiftes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `innameapparaat`
--
ALTER TABLE `innameapparaat`
  ADD CONSTRAINT `fk_Innameapparaat_Apparaten1` FOREIGN KEY (`Apparaten_ID`) REFERENCES `apparaten` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Innameapparaat_Innames1` FOREIGN KEY (`Innames_ID`) REFERENCES `innames` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `innames`
--
ALTER TABLE `innames`
  ADD CONSTRAINT `fk_Innames_Medewerkers1` FOREIGN KEY (`Medewerkers_ID`) REFERENCES `medewerkers` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `medewerkers`
--
ALTER TABLE `medewerkers`
  ADD CONSTRAINT `fk_Medewerkers_Rollen1` FOREIGN KEY (`Level`) REFERENCES `rollen` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `onderdeelapparaat`
--
ALTER TABLE `onderdeelapparaat`
  ADD CONSTRAINT `fk_Onderdeelapparaat_Apparaten1` FOREIGN KEY (`Apparaten_ID`) REFERENCES `apparaten` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Onderdeelapparaat_Onderdelen1` FOREIGN KEY (`Onderdelen_ID`) REFERENCES `onderdelen` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `uitgiftes`
--
ALTER TABLE `uitgiftes`
  ADD CONSTRAINT `fk_Uitgiftes_Medewerkers1` FOREIGN KEY (`Medewerkers_ID`) REFERENCES `medewerkers` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Uitgiftes_Onderdelen` FOREIGN KEY (`Onderdelen_ID`) REFERENCES `onderdelen` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
