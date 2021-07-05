-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 04:59 PM
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
-- Database: `compshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `text` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `email`, `subject`, `text`) VALUES
(3, 'gileer404@gmail.com', 'Pitanje', 'Sta ima kako ste'),
(5, 'lakilaki@gmail.com', 'Zdravo', 'Kako je danas'),
(6, 'stef@gmail.com', 'Reklamacija', 'Ovo nista ne valja'),
(7, 'simke@gmail.com', 'Pohvala', 'Odlicni ste samo napred!'),
(8, 'gileer404@gmail.com', 'Pitanje', 'kako ste'),
(9, 'gileer404@gmail.com', 'posalji', 'cao');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime` varchar(250) NOT NULL,
  `prezime` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `korime` varchar(250) NOT NULL,
  `sifra` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `email`, `korime`, `sifra`, `status`) VALUES
(1, 'Lazar', 'Adjancic', 'laza@gmail.com', 'laki123', '$2y$10$TgZGNWw446EEl/xYX4sZ3O2q/GqBlJt7OyrYNw5/aWa950dK7ZVRm', 'korisnik'),
(2, 'Nikola', 'Zivkovic', 'gileer404@gmail.com', 'nidza123', '$2y$10$23f7QmZhc4i5wBmdyZzsVeAp1WiT4kfkKtudeQ5t6jhgK//IgDQsC', 'korisnik'),
(6, 'admin', 'admin', 'admin@gmail.com', 'admin123', '$2y$10$qImSuq9koSpqaRYb3bgozORRS6nQTzw12tFwZvmvr.4v3l/bY9OW6', 'admin'),
(8, 'Petar', 'Peric', 'pera@gmail.com', 'pera123', '$2y$10$obutAG9zXonv.er2VIcpduUCpeL98ZjfRUckv3ZMscW.jpCdkYuvu', 'menadzer');

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE `korpa` (
  `id` int(11) NOT NULL,
  `korime` varchar(250) NOT NULL,
  `proizvod` varchar(250) NOT NULL,
  `slika` varchar(250) NOT NULL,
  `cena` int(250) NOT NULL,
  `kolicina` int(250) NOT NULL,
  `ukupnaCena` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `narudzbenice`
--

CREATE TABLE `narudzbenice` (
  `id` int(11) NOT NULL,
  `korime` varchar(250) NOT NULL,
  `broj` int(11) NOT NULL,
  `ulica` varchar(250) NOT NULL,
  `grad` varchar(250) NOT NULL,
  `ukupnoProizvoda` int(11) NOT NULL,
  `ukupnaCena` int(11) NOT NULL,
  `placanje` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `narudzbenice`
--

INSERT INTO `narudzbenice` (`id`, `korime`, `broj`, `ulica`, `grad`, `ukupnoProizvoda`, `ukupnaCena`, `placanje`) VALUES
(3, 'admin123', 23, 'Jovana Serbanovica ', 'Pozarevac', 3, 79996, 'Prilikom dostave'),
(4, 'admin123', 42, 'Kosovska', 'Pozarevac', 2, 194998, 'Online placanje'),
(5, 'admin123', 44, 'Djure Jaksica', 'Pozarevac', 1, 935996, 'Online placanje'),
(7, 'laki123', 3, 'Maksima Gorkog', 'Beograd', 2, 229998, 'Prilikom dostave'),
(8, 'nidza123', 77, 'Gandijeva', 'Beograd', 2, 9998, 'Prilikom dostave'),
(9, 'nidza123', 45, 'Marsaka Tita', 'Veliko Crnice', 1, 27999, 'Prilikom dostave'),
(11, 'laki123', 23, 'gandijeva', 'beograd', 2, 128998, 'Prilikom dostave');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `id` int(11) NOT NULL,
  `tip` varchar(250) NOT NULL,
  `marka` varchar(250) NOT NULL,
  `cena` int(11) NOT NULL,
  `slika` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `tip`, `marka`, `cena`, `slika`) VALUES
(1, 'desktop', 'PRIME BATTLEBOX OMEGA', 53999, 'img/komp2.png'),
(2, 'desktop', 'AURORA LIDER G5400 Gold', 27999, 'img/komp3.png'),
(3, 'desktop', 'Prime R16008G480S1650S', 74999, 'img/komp4.png'),
(4, 'desktop', 'AURORA 3000G VEGA 3', 24999, 'img/komp5.png'),
(5, 'desktop', 'PRIME MASTERBOX CORE', 87999, 'img/komp6.png'),
(6, 'desktop', 'DESK PRO WIN10PRO', 49999, 'img/komp7.png'),
(7, 'laptop', 'HP EliteBook x360 1030 G4', 210999, 'img/lp2.png'),
(8, 'laptop', 'HP Pavilion Gaming', 154999, 'img/lp3.png'),
(9, 'laptop', 'LENOVO Legion Y540-15IRH', 176999, 'img/lp4.png'),
(10, 'laptop', 'HP 250 G7 - 6BP03EA', 107999, 'img/lp5.png'),
(11, 'laptop', 'OMEN by HP 17', 233999, 'img/lp6.png'),
(12, 'laptop', 'ACER Swift 7', 219999, 'img/lp7.png'),
(13, 'oprema', 'PHILIPS LED 243V7QSB/00', 12999, 'img/op2.png'),
(14, 'oprema', 'DELL monitor', 15999, 'img/op3.png'),
(15, 'oprema', 'LOGITECH Bežična tastatura', 4999, 'img/op4.png'),
(16, 'oprema', 'RAMPAGE Gejmerska tastatura', 7999, 'img/op5.png'),
(17, 'oprema', 'EDIFIER Zvučnici za računar', 17999, 'img/op6.png'),
(18, 'oprema', 'RAMPAGE Gejmerske slušalice', 4999, 'img/op7.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narudzbenice`
--
ALTER TABLE `narudzbenice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `korpa`
--
ALTER TABLE `korpa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `narudzbenice`
--
ALTER TABLE `narudzbenice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
