-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2017 at 03:35 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emergency-command-center-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_user`
--

CREATE TABLE `auth_user` (
  `id` int(11) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_num` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_user`
--

INSERT INTO `auth_user` (`id`, `lastname`, `firstname`, `username`, `password`, `email`, `mobile_num`) VALUES
(1, 'Doe', 'John', 'johndoe', 'd763ec748433fb79a04f82bd46133d55', 'johndoe@example.com', '09999999999');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `auth_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gov_agency`
--

CREATE TABLE `gov_agency` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `details` text NOT NULL,
  `dashboard_id` int(11) NOT NULL,
  `dashboard_auth_user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `gov_agency_id` int(11) NOT NULL,
  `info_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info_type`
--

CREATE TABLE `info_type` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `module_has_gov_agency`
--

CREATE TABLE `module_has_gov_agency` (
  `module_id` int(11) NOT NULL,
  `gov_agency_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_user`
--
ALTER TABLE `auth_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auth_user_id_UNIQUE` (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`,`auth_user_id`),
  ADD UNIQUE KEY `dashboard_id_UNIQUE` (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD KEY `fk_DASHBOARD_auth_user_idx` (`auth_user_id`);

--
-- Indexes for table `gov_agency`
--
ALTER TABLE `gov_agency`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`,`dashboard_id`,`dashboard_auth_user_id`,`module_id`,`gov_agency_id`,`info_type_id`),
  ADD UNIQUE KEY `info_id_UNIQUE` (`id`),
  ADD KEY `fk_information_dashboard1_idx` (`dashboard_id`,`dashboard_auth_user_id`),
  ADD KEY `fk_information_module1_idx` (`module_id`),
  ADD KEY `fk_information_gov_agency1_idx` (`gov_agency_id`),
  ADD KEY `fk_information_info_type1_idx` (`info_type_id`);

--
-- Indexes for table `info_type`
--
ALTER TABLE `info_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `info_type_id_UNIQUE` (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `module_id_UNIQUE` (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `module_has_gov_agency`
--
ALTER TABLE `module_has_gov_agency`
  ADD PRIMARY KEY (`module_id`,`gov_agency_id`),
  ADD KEY `fk_module_has_gov_agency_gov_agency1_idx` (`gov_agency_id`),
  ADD KEY `fk_module_has_gov_agency_module1_idx` (`module_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_user`
--
ALTER TABLE `auth_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gov_agency`
--
ALTER TABLE `gov_agency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `info_type`
--
ALTER TABLE `info_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD CONSTRAINT `fk_DASHBOARD_auth_user` FOREIGN KEY (`auth_user_id`) REFERENCES `auth_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `fk_information_dashboard1` FOREIGN KEY (`dashboard_id`,`dashboard_auth_user_id`) REFERENCES `dashboard` (`id`, `auth_user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_information_gov_agency1` FOREIGN KEY (`gov_agency_id`) REFERENCES `gov_agency` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_information_info_type1` FOREIGN KEY (`info_type_id`) REFERENCES `info_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_information_module1` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `module_has_gov_agency`
--
ALTER TABLE `module_has_gov_agency`
  ADD CONSTRAINT `fk_module_has_gov_agency_gov_agency1` FOREIGN KEY (`gov_agency_id`) REFERENCES `gov_agency` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_module_has_gov_agency_module1` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
