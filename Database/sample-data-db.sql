-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2017 at 10:33 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.17-2+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample-data-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `affected-population`
--

CREATE TABLE `affected-population` (
  `id` int(11) NOT NULL,
  `aff_province` int(11) NOT NULL,
  `aff_barangay` int(11) NOT NULL,
  `aff_family` int(11) NOT NULL,
  `aff_persons` int(11) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `affected-population`
--

INSERT INTO `affected-population` (`id`, `aff_province`, `aff_barangay`, `aff_family`, `aff_persons`, `region_id`) VALUES
(1, 5, 168, 5935, 27076, 6),
(2, 5, 793, 101006, 466120, 7),
(3, 6, 1229, 150889, 692020, 8),
(4, 6, 3176, 840551, 3873028, 9),
(5, 4, 2136, 1299436, 5909955, 11),
(6, 6, 4087, 1066718, 5015434, 12),
(7, 4, 26, 4253, 19592, 14),
(8, 3, 19, 1000, 5000, 15),
(9, 5, 205, 14799, 69956, 16);

-- --------------------------------------------------------

--
-- Table structure for table `casualties`
--

CREATE TABLE `casualties` (
  `id` int(11) NOT NULL,
  `dead` int(11) NOT NULL,
  `missing` int(11) NOT NULL,
  `injured` int(11) NOT NULL,
  `affected-population_id` int(11) NOT NULL,
  `affected-population_region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `casualties`
--

INSERT INTO `casualties` (`id`, `dead`, `missing`, `injured`, `affected-population_id`, `affected-population_region_id`) VALUES
(1, 1, 0, 1, 8, 15),
(2, 3, 0, 4, 1, 6),
(3, 19, 24, 61, 2, 7),
(4, 6, 0, 21, 3, 8),
(5, 294, 28, 2067, 4, 9),
(6, 74, 5, 348, 5, 11),
(7, 5902, 1005, 26186, 6, 12),
(8, 1, 0, 0, 9, 16);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `population` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`, `population`) VALUES
(1, 'National Capital Region (NCR)', 12877253),
(2, 'CAR', 1722006),
(3, 'Region I', 5026128),
(4, 'Region II', 3451410),
(5, 'Region III', 11218177),
(6, 'Region IV-A', 14414774),
(7, 'Region IV-B', 2960360),
(8, 'Region V', 5796989),
(9, 'Region VI', 4477247),
(10, 'NIR', 4410000),
(11, 'Region VII', 6041903),
(12, 'Region VIII', 4440150),
(13, 'Region IX', 3629783),
(14, 'Region X', 4689302),
(15, 'Region XI', 4893318),
(16, 'Region XII', 4545276),
(17, 'ARMM', 3781387),
(18, 'CARAGA', 2596709);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affected-population`
--
ALTER TABLE `affected-population`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`) USING BTREE,
  ADD KEY `region_id_2` (`region_id`);

--
-- Indexes for table `casualties`
--
ALTER TABLE `casualties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `affected-population_id` (`affected-population_id`),
  ADD KEY `affected-population_region_id` (`affected-population_region_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affected-population`
--
ALTER TABLE `affected-population`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `casualties`
--
ALTER TABLE `casualties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `affected-population`
--
ALTER TABLE `affected-population`
  ADD CONSTRAINT `fk_region_id` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`);

--
-- Constraints for table `casualties`
--
ALTER TABLE `casualties`
  ADD CONSTRAINT `fk_affected_population_id` FOREIGN KEY (`affected-population_id`) REFERENCES `affected-population` (`id`),
  ADD CONSTRAINT `fk_affected_population_region_id` FOREIGN KEY (`affected-population_region_id`) REFERENCES `affected-population` (`region_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
