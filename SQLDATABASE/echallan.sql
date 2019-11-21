-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 21, 2019 at 11:27 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `echallan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `password` varchar(64) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '20a736bd4cf996b1681607680ec0862319340f19501ba37fec1375737774107b'),
('gag', '9a900403ac313ba27a1bc81f0932652b8020dac92c234d98fa0b06bf0040ecfd'),
('gagandeep', '9a900403ac313ba27a1bc81f0932652b8020dac92c234d98fa0b06bf0040ecfd'),
('kaustav', '9a900403ac313ba27a1bc81f0932652b8020dac92c234d98fa0b06bf0040ecfd');

-- --------------------------------------------------------

--
-- Table structure for table `challan`
--

DROP TABLE IF EXISTS `challan`;
CREATE TABLE IF NOT EXISTS `challan` (
  `Cno` varchar(15) COLLATE utf8_bin NOT NULL,
  `lic` varchar(15) COLLATE utf8_bin NOT NULL,
  `place` varchar(50) COLLATE utf8_bin NOT NULL,
  `dtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rule` smallint(5) UNSIGNED NOT NULL,
  `veh` varchar(13) COLLATE utf8_bin NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '0',
  `isby` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`Cno`),
  KEY `rule` (`rule`),
  KEY `isby` (`isby`),
  KEY `lic` (`lic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `challan`
--

INSERT INTO `challan` (`Cno`, `lic`, `place`, `dtime`, `rule`, `veh`, `Status`, `isby`) VALUES
('ch11234', 'lic1234567', 'City Hospital', '2019-09-05 09:20:07', 6, 'UP 45 C3 3412', 1, 'emp_001'),
('ch12345', 'lic1234567', 'Rajeev Chowk', '2019-09-25 17:51:36', 2, 'DL 45 C1 2351', 0, 'emp_001'),
('ch12367', 'lic1234567', 'Railway Station', '2019-09-26 15:47:16', 6, 'DL 45 C1 2351', 0, 'emp_001'),
('ch12368', 'lic1234560', 'Sarojni nagar', '2019-10-22 12:39:57', 9, 'UP 14 C1 1238', 0, 'emp_001'),
('ch12369', 'lic1234560', 'Guwahati,ulubari', '2019-10-23 05:38:39', 2, 'UP 14 C1 1238', 0, 'emp_001'),
('ch12370', 'lic1234560', 'Gzb', '2019-10-23 06:36:01', 13, 'UP 14 C1 1238', 0, 'emp_001');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

DROP TABLE IF EXISTS `driver`;
CREATE TABLE IF NOT EXISTS `driver` (
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint(10) UNSIGNED NOT NULL,
  `age` tinyint(3) UNSIGNED NOT NULL DEFAULT '18',
  `sex` char(1) COLLATE utf8_bin NOT NULL,
  `lic` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `lic` (`lic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`email`, `name`, `dob`, `phone`, `age`, `sex`, `lic`) VALUES
('abc@gmail.com', 'Sean Sheep', '1985-09-03', 9900220011, 18, 'M', 'lic1234567'),
('hh@gmail.com', 'tom jarry', '1998-01-01', 7788445566, 21, 'm', 'lic4567891'),
('kk@gmail.com', 'KaustavKumar', '1998-09-05', 9876533210, 18, 'M', 'lic1234561'),
('qazplm@gmail.com', 'Sylvie Sylvester', '1996-03-27', 9023410255, 19, 'F', 'lic1289765'),
('qwerty@gmail.com', 'Qwerty ', '1993-07-25', 9012365470, 35, 'M', 'lic1235678'),
('topshot@gmail.com', 'GagandeepSingh', '1998-05-05', 9876543210, 18, 'M', 'lic1234560');

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

DROP TABLE IF EXISTS `license`;
CREATE TABLE IF NOT EXISTS `license` (
  `id` varchar(15) COLLATE utf8_bin NOT NULL,
  `rto` varchar(50) COLLATE utf8_bin NOT NULL,
  `issued` date NOT NULL,
  `vtype` varchar(15) COLLATE utf8_bin NOT NULL,
  `vdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `license`
--

INSERT INTO `license` (`id`, `rto`, `issued`, `vtype`, `vdate`) VALUES
('lic1234560', 'Ghaziabad', '2019-05-08', 'Personal', '2020-01-17'),
('lic1234561', 'Guwahati', '2019-04-08', 'Personal', '2021-01-17'),
('lic1234567', 'New Delhi', '2017-08-22', 'Personal', '2022-08-21'),
('lic1235678', 'Noida', '2010-04-15', 'Peronal', '2020-04-14'),
('lic1289765', 'Jaipur', '2016-09-11', 'Commercial', '2020-09-10'),
('lic4567891', 'delhi', '2019-10-17', 'ltype', '2019-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `Username` varchar(20) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(64) COLLATE utf8_bin NOT NULL,
  `is_staff` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Username`, `email`, `password`, `is_staff`) VALUES
('abc1234', 'abc@gmail.com', 'e8f56862d74ef5599af4eeca73924bfa44a6773a497af0c29c48e18729ba6ff0', 0),
('emp_001', 'alice@gmail.com', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', 1),
('emp_002', 'james@gmail.com', '236521c253d1df3484669ee2146d27fe71db79362bedc5f75c51b908a12cd050', 1),
('emp_003', 'Tom@gmail.com', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', 1),
('emp_005', 'ak@gmail.com', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', 1),
('gagandeep', 'topshot@gmail.com', '9a900403ac313ba27a1bc81f0932652b8020dac92c234d98fa0b06bf0040ecfd', 0),
('ggt', 'kk@gmail.com', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', 0),
('prad007', 'prad@gmail.com', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', 1),
('qaz1234', 'qazplm@gmail.com', '236521c253d1df3484669ee2146d27fe71db79362bedc5f75c51b908a12cd050', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

DROP TABLE IF EXISTS `rule`;
CREATE TABLE IF NOT EXISTS `rule` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rname` text COLLATE utf8_bin NOT NULL,
  `pen` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`id`, `rname`, `pen`) VALUES
(1, 'Penalty for offenses where no penalty is specifically provided\r\n', 500),
(2, 'Violation of road regulations', 1000),
(3, 'Traveling without Ticket', 200),
(4, 'Disobedience of orders of Authority and refusal to share information', 2000),
(5, 'Unauthorised use of vehicles without license\r\n', 5000),
(6, 'Driving without license', 5000),
(7, 'Driving despite disqualification', 10000),
(8, 'Over-speeding', 1000),
(9, 'Dangerous Driving', 7000),
(10, 'Drunken Driving', 15000),
(11, 'Driving when mentally or physically unfit to drive', 2000),
(12, 'Offences relating to accident', 10000),
(13, 'Racing and speeding', 3000),
(14, 'Driving uninsured vehicle', 4000),
(15, 'Taking vehicle without lawful authority and seizing motor vehicle by force\r\n', 10000),
(16, 'Causing obstruction to free flow of traffic\r\n', 500);

-- --------------------------------------------------------

--
-- Table structure for table `traffic_per`
--

DROP TABLE IF EXISTS `traffic_per`;
CREATE TABLE IF NOT EXISTS `traffic_per` (
  `empid` varchar(20) COLLATE utf8_bin NOT NULL,
  `email` varchar(30) COLLATE utf8_bin NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `dob` date NOT NULL,
  `sex` char(1) COLLATE utf8_bin NOT NULL,
  `phone` bigint(10) UNSIGNED NOT NULL,
  `desgn` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `traffic_per`
--

INSERT INTO `traffic_per` (`empid`, `email`, `name`, `dob`, `sex`, `phone`, `desgn`) VALUES
('emp_001', 'alice@gmail.com', 'Alice Wonderland', '1995-06-13', 'F', 9977458121, 'Head Constable'),
('emp_002', 'james@gmail.com', 'James Anderson', '1987-04-22', 'M', 9874563210, 'Constable'),
('emp_005', 'ak@gmail.com', 'Akon Kora', '1998-02-10', 'M', 8877445500, 'Head Constable');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `Licplate` varchar(13) COLLATE utf8_bin NOT NULL,
  `year` year(4) NOT NULL,
  `mname` varchar(15) COLLATE utf8_bin NOT NULL,
  `color` varchar(15) COLLATE utf8_bin NOT NULL,
  `type` varchar(15) COLLATE utf8_bin NOT NULL,
  `lic` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`Licplate`),
  KEY `lic` (`lic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`Licplate`, `year`, `mname`, `color`, `type`, `lic`) VALUES
('DL 45 C1 2351', 2019, 'ciaz', 'blue', 'sedan', 'lic1234567'),
('HR 26 AW 2173', 2011, 'swift', 'red', 'hatchback', 'lic1235678'),
('UP 14 C1 1238', 2019, 'Hum', 'Black', 'SUV', 'lic1234560'),
('UP 14 C1 9999', 2019, 'gat', 'Black', 'SUV', 'lic4567891'),
('UP 45 C3 3412', 2018, 'Safari', 'gray', 'SUV', 'lic1234567');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `challan`
--
ALTER TABLE `challan`
  ADD CONSTRAINT `challan_ibfk_1` FOREIGN KEY (`rule`) REFERENCES `rule` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `challan_ibfk_2` FOREIGN KEY (`isby`) REFERENCES `traffic_per` (`empid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `challan_ibfk_3` FOREIGN KEY (`lic`) REFERENCES `driver` (`lic`) ON DELETE CASCADE;

--
-- Constraints for table `license`
--
ALTER TABLE `license`
  ADD CONSTRAINT `license_ibfk_1` FOREIGN KEY (`id`) REFERENCES `driver` (`lic`) ON DELETE CASCADE;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`lic`) REFERENCES `driver` (`lic`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
