-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 28, 2016 at 07:23 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sgaep`
--

-- --------------------------------------------------------

--
-- Table structure for table `tableQuestions`
--

CREATE TABLE `tableQuestions` (
  `bintQuestionIndex` bigint(20) NOT NULL,
  `vcRFC` varchar(13) NOT NULL,
  `vcIdSubject` varchar(60) NOT NULL,
  `vcIdQuestion` varchar(60) NOT NULL,
  `ltQuestion` longtext NOT NULL,
  `bAnswer` tinyint(1) NOT NULL,
  `intParcial` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tableSubjects`
--

CREATE TABLE `tableSubjects` (
  `vcIdSubject` varchar(60) NOT NULL,
  `vcRFC` varchar(13) NOT NULL,
  `vcSubjectName` varchar(60) NOT NULL,
  `vcSubjectCareer` varchar(60) NOT NULL,
  `intTurn` int(10) NOT NULL,
  `intSemester` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tableUsers`
--

CREATE TABLE `tableUsers` (
  `vcRFC` varchar(13) NOT NULL,
  `vcName` varchar(60) NOT NULL,
  `vcApellidos` varchar(60) NOT NULL,
  `vcPasswd` varchar(60) NOT NULL,
  `vcCareer` varchar(60) NOT NULL,
  `intTurn` int(20) NOT NULL,
  `bType` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
