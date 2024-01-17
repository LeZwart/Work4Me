-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Jan 16, 2024 at 12:37 PM
-- Server version: 10.4.32-MariaDB-1:10.4.32+maria~ubu2004
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `work4me`
--

-- --------------------------------------------------------

--
-- Table structure for table `Gebruiker`
--

CREATE TABLE `Gebruiker` (
  `GebruikerID` int(11) NOT NULL,
  `WoonplaatsID` int(11) NOT NULL,
  `Voornaam` varchar(255) NOT NULL,
  `Tussenvoegsel` varchar(255) NOT NULL,
  `Achternaam` varchar(255) NOT NULL,
  `Geslacht` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Gebruikersnaam` varchar(255) NOT NULL,
  `Wachtwoord` varchar(255) NOT NULL,
  `Rol` enum('Administrator','Manager','Regular') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Gebruiker`
--

INSERT INTO `Gebruiker` (`GebruikerID`, `WoonplaatsID`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Geslacht`, `Email`, `Gebruikersnaam`, `Wachtwoord`, `Rol`) VALUES
(1, 1, 'Tom', 'van der', 'Knaap', 'Man', 'admin@work4me.nl', 'AdministratorTom', 'sTom1234', 'Administrator'),
(2, 2, 'Kim', '', 'Ijzer', 'Vrouw', 'Kim@gmail.com', 'KimSpeeltTennis23', 'Kimmik12', 'Regular'),
(3, 3, 'Nico', 'van', 'Ham', 'Man', 'nico@work4me.nl', 'NicoSport', 'pi3141', 'Manager'),
(5, 5, 'wouter', '', 'zwart', 'Man', 'wzwart@wzw.nl', 'wzwart111', 'qwertyuiop', 'Manager'),
(6, 6, 'Bassie', 'en', 'Adriaan', 'X', 'BassieAdriaan@VRT.be', 'BassieEnAdriaan', 'bassii', 'Regular'),
(7, 7, 'gebruiker', 'van', 'bruiker', 'X', 'user@work4me.nl', 'gebruiker33', '1234', 'Regular'),
(8, 9, 'naam', 'van', 'persoon', 'X', 'mail@person.nl', 'vanperson', 'qwertyuiop', 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `Woonplaats`
--

CREATE TABLE `Woonplaats` (
  `WoonplaatsID` int(11) NOT NULL,
  `Straat` varchar(255) NOT NULL,
  `Huisnummer` int(11) NOT NULL,
  `Postcode` varchar(255) NOT NULL,
  `Plaats` varchar(255) NOT NULL,
  `Land` varchar(255) NOT NULL,
  `Telefoonnummer` varchar(255) NOT NULL,
  `Mobielnummer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Woonplaats`
--

INSERT INTO `Woonplaats` (`WoonplaatsID`, `Straat`, `Huisnummer`, `Postcode`, `Plaats`, `Land`, `Telefoonnummer`, `Mobielnummer`) VALUES
(1, 'Tomstraat', 22, '2295 RJ', 'Detom', 'Nederland', '4458710301', '0655318810'),
(2, 'straatstraat', 2, '2020 RK', 'plaatsstraat', 'Nederland', '2345676543', '0634567654'),
(3, 'managementstraat', 66, '1234 VZ', 'Kwintsheul', 'Nederland', '3156786543', '0634567898'),
(5, 'prinshendriklaan', 29, '2051 JA', 'Overveen', 'Nederland', '1234567890', '1234567890'),
(6, 'Bassiestraat', 12, '2311 BA', 'Adriaanhove', 'BelgiÃ«', '1234567890', '1234567890'),
(7, 'bruikstraat', 33, '3333 GB', 'Breukelen', 'Nederland', '1234567890', '1234567890'),
(8, 'qazwsxedc', 134, '1234 QW', 'qwertyhove', 'Nederland', '1234567890', '123567890'),
(9, 'qazwsxedc', 134, '1234 QW', 'qwertyhove', 'Nederland', '1234567890', '123567890');

-- --------------------------------------------------------

--
-- Table structure for table `Workouts`
--

CREATE TABLE `Workouts` (
  `WorkoutID` int(11) NOT NULL,
  `Titel` varchar(255) NOT NULL,
  `Omschrijving` varchar(255) NOT NULL,
  `Duur` int(11) NOT NULL,
  `Afbeelding` varchar(255) NOT NULL DEFAULT 'images/workouts/placeholder.png',
  `Notitie` varchar(255) NOT NULL,
  `Toevoegdatum` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Workouts`
--

INSERT INTO `Workouts` (`WorkoutID`, `Titel`, `Omschrijving`, `Duur`, `Afbeelding`, `Notitie`, `Toevoegdatum`) VALUES
(1, 'Squash', 'Squash is een racketsport waarbij je een rubbere ball tegen een muur stuitert', 40, 'images/workouts/Squash.jpg', 'Heel erg intensief', '2024-01-12 10:22:03'),
(3, 'Schaatsen', 'Schaatsen is het voortbewegen op ijs met ijzer', 45, 'images/workouts/Schaatsen.png', 'Uitdagend voor beginners', '2024-01-16 09:40:00'),
(4, 'High Intensity Interval Training', 'Korte intensieve oefeningen afgewisseld met rustperiodes', 30, 'images/workouts/HIIT.png', 'Vermijd overmatige herhalingen', '2024-01-16 09:45:51'),
(5, 'Yoga Flow', 'Vloeiende yogabewegingen voor flexibiliteit en ontspanning', 45, 'images/workouts/Yoga.png', 'Focus op ademhalingstechnieken', '2024-01-16 09:45:51'),
(6, 'Krachttraining', 'Gebruik van gewichten voor spieropbouw', 60, 'images/workouts/Krachttraining.png', 'Let op juiste vorm en ademhaling', '2024-01-16 09:45:51'),
(7, 'Cardio Run', 'Continue hardlooptijd voor uithoudingsvermogen', 40, 'images/workouts/cardio.jpg', 'Hydrateer goed voor en na de workout', '2024-01-16 09:45:51'),
(8, 'Push up Challenge', 'Opdrukoefeningen voor bovenlichaamkracht', 20, 'images/workouts/pushup.jpg', 'Houd een rechte lichaamshouding aan', '2024-01-16 09:46:47'),
(9, 'Variabele Push ups', 'Verschillende opdrukvarianten voor spierdiversiteit', 25, 'images/workouts/pushup.jpg', 'Pas tempo aan voor intensiteit', '2024-01-16 09:46:47'),
(10, 'Pyramid Push ups', 'Opdrukken in pyramidevorm: toenemende en afnemende herhalingen', 30, 'images/workouts/pushup.jpg', 'Neem korte rust tussen sets', '2024-01-16 09:46:47'),
(11, 'One arm Push ups', 'Opdrukken met nadruk op een arm voor extra uitdaging', 15, 'images/workouts/pushup.jpg', 'Zorg voor symmetrische belasting', '2024-01-16 09:46:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Gebruiker`
--
ALTER TABLE `Gebruiker`
  ADD PRIMARY KEY (`GebruikerID`),
  ADD KEY `FK_WoonplaatsID` (`WoonplaatsID`);

--
-- Indexes for table `Woonplaats`
--
ALTER TABLE `Woonplaats`
  ADD PRIMARY KEY (`WoonplaatsID`);

--
-- Indexes for table `Workouts`
--
ALTER TABLE `Workouts`
  ADD PRIMARY KEY (`WorkoutID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Gebruiker`
--
ALTER TABLE `Gebruiker`
  MODIFY `GebruikerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Woonplaats`
--
ALTER TABLE `Woonplaats`
  MODIFY `WoonplaatsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Workouts`
--
ALTER TABLE `Workouts`
  MODIFY `WorkoutID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Gebruiker`
--
ALTER TABLE `Gebruiker`
  ADD CONSTRAINT `FK_WoonplaatsID` FOREIGN KEY (`WoonplaatsID`) REFERENCES `Woonplaats` (`WoonplaatsID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
