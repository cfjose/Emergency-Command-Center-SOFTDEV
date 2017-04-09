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
-- Database: `camp-coor-mgmt-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `markers_camp`
--

CREATE TABLE `markers_camp` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `population` varchar(20) NOT NULL,
  `Tools` int(11) NOT NULL,
  `MedicalSupplies` varchar(20) NOT NULL,
  `Portalet` int(11) NOT NULL,
  `Recreational` int(11) NOT NULL,
  `CampManagers` int(11) NOT NULL,
  `HealthPersonnel` int(11) NOT NULL,
  `AnimalPersonnel` int(11) NOT NULL,
  `SecurityPersonnel` int(11) NOT NULL,
  `SanitaryInspector` int(11) NOT NULL,
  `Volunteers` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markers_camp`
--

INSERT INTO `markers_camp` (`id`, `name`, `address`, `lat`, `lng`, `population`, `Tools`, `MedicalSupplies`, `Portalet`, `Recreational`, `CampManagers`, `HealthPersonnel`, `AnimalPersonnel`, `SecurityPersonnel`, `SanitaryInspector`, `Volunteers`) VALUES
(1, 'Sagkahan National High School', 'Calanipawan Rd, Fatima Village, Tacloban City, Leyte', 11.216000, 125.001999, '3,587', 100, '1,000', 50, 2, 2, 20, 4, 40, 2, 20),
(2, 'Kapangian Elementary School', 'Salazar St, Downtown, Tacloban City, Leyte', 11.243600, 124.999001, '6,546', 100, '1,500', 40, 2, 1, 30, 6, 50, 1, 25),
(3, 'Leyte Progressive High School', 'Tacloban City, Leyte', 11.245600, 124.995003, '3,900', 100, '50', 10, 0, 2, 40, 2, 10, 1, 30),
(4, 'Anibong Barangay Hall', 'Barangay 69, Tacloban City, Leyte', 11.249100, 124.972000, '2,546', 400, '900', 70, 1, 2, 50, 6, 20, 2, 40),
(5, 'St. Raphael Church', 'Tacloban City, Leyte', 11.230570, 124.997002, '1,500', 100, '500', 40, 1, 3, 15, 2, 10, 1, 30),
(6, 'Mercedes Elementary School', 'La Libertad, Zamboanga Del Norte', 10.487700, 125.184700, '4,789', 200, '2,000', 50, 2, 2, 30, 6, 30, 1, 35);

-- --------------------------------------------------------

--
-- Table structure for table `markers_evac`
--

CREATE TABLE `markers_evac` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `population` varchar(20) NOT NULL,
  `Beddings` int(11) NOT NULL,
  `Tools` int(11) NOT NULL,
  `MedicalSupplies` varchar(20) NOT NULL,
  `Toilet` int(11) NOT NULL,
  `Recreational` int(11) NOT NULL,
  `EvacManagers` int(11) NOT NULL,
  `HealthPersonnel` int(11) NOT NULL,
  `AnimalPersonnel` int(11) NOT NULL,
  `SecurityPersonnel` int(11) NOT NULL,
  `SanitaryInspector` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markers_evac`
--

INSERT INTO `markers_evac` (`id`, `name`, `address`, `lat`, `lng`, `population`, `Beddings`, `Tools`, `MedicalSupplies`, `Toilet`, `Recreational`, `EvacManagers`, `HealthPersonnel`, `AnimalPersonnel`, `SecurityPersonnel`, `SanitaryInspector`, `type`) VALUES
(1, 'Eastern Visayas State of University', 'Salazar St, Downtown, Tacloban City, Leyte', 11.010000, 124.605103, '3,546', 500, 100, '1,000', 50, 2, 2, 20, 4, 40, 2, 'School'),
(2, 'Anibong Elementary School', 'Anibong, Pagsanjan, 4008', 11.015000, 124.981987, '2,546', 500, 100, '1,500', 40, 2, 1, 30, 6, 50, 1, 'School'),
(3, 'Redemptorist Church', 'Real St, Tacloban City, Leyte', 13.156900, 123.742889, '300', 50, 100, '50', 10, 0, 2, 40, 2, 10, 2, 'Church'),
(4, 'Marasbaras High School', 'Barangay. 89 & 90, Tacloban City, Leyte', 11.195700, 125.007004, '1,546', 500, 400, '900', 70, 1, 2, 50, 6, 20, 1, 'School'),
(5, 'Holy Infant College', 'Benigno Aquino St, Tacloban City, Leyte', 11.230570, 124.997002, '1,500', 100, 100, '500', 40, 1, 3, 15, 2, 10, 1, 'School'),
(6, 'Leyte Normal University', 'Paterno St, Downtown, Tacloban City, 6500 Leyte', 11.237800, 125.001190, '4,789', 300, 200, '2,000', 50, 2, 2, 30, 6, 30, 2, 'School');

-- --------------------------------------------------------

--
-- Table structure for table `request_tent`
--

CREATE TABLE `request_tent` (
  `id` int(11) NOT NULL,
  `nameofborrower` varchar(60) NOT NULL,
  `contactno` varchar(80) NOT NULL,
  `wheretodeliver` varchar(60) NOT NULL,
  `tentsize` varchar(60) NOT NULL,
  `enddate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `markers_camp`
--
ALTER TABLE `markers_camp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markers_evac`
--
ALTER TABLE `markers_evac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_tent`
--
ALTER TABLE `request_tent`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `markers_camp`
--
ALTER TABLE `markers_camp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `markers_evac`
--
ALTER TABLE `markers_evac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `request_tent`
--
ALTER TABLE `request_tent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
