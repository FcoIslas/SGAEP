-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2017 at 07:20 PM
-- Server version: 5.5.56-MariaDB
-- PHP Version: 5.4.16

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
-- Table structure for table `tableBooleanQuestions`
--

CREATE TABLE IF NOT EXISTS `tableBooleanQuestions` (
  `vcIdQuestion` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Var char de la pregunta',
  `intParcial` int(60) NOT NULL,
  `ltQuestion` longtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `boolAnswer` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableBooleanQuestions`
--

INSERT INTO `tableBooleanQuestions` (`vcIdQuestion`, `intParcial`, `ltQuestion`, `boolAnswer`) VALUES
('539343IAAJ9312011A0AdmistracionPublicaeInformatica9', 2, 'Â¿SÃ©ptima pregunta booleana?', 0),
('543374IAAJ9312011A0AdmistracionPublicaeInformatica9', 2, 'Â¿Tercera pregunta booleana?', 1),
('700956IAAJ9312011A0AdmistracionPublicaeInformatica9', 1, 'Â¿Primer pregunta booleana?', 1),
('740894IAAJ9312011A0AdmistracionPublicaeInformatica9', 1, 'Â¿Sexta pregunta booleana?', 0),
('764667IAAJ9312011A0AdmistracionPublicaeInformatica9', 1, 'Â¿Segunda pregunta booleana?', 0),
('803768IAAJ9312011A0AdmistracionPublicaeInformatica9', 1, 'Â¿Quinta pregunta booleana?', 1),
('869875IAAJ9312011A0AdmistracionPublicaeInformatica9', 2, 'Â¿Octava Pregunta booleana?', 0),
('945662IAAJ9312011A0AdmistracionPublicaeInformatica9', 2, 'Â¿Cuarta pregunta booleana?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tableMultipleQuestions`
--

CREATE TABLE IF NOT EXISTS `tableMultipleQuestions` (
  `vcIdQuestion` varchar(60) NOT NULL,
  `intParcial` int(10) NOT NULL,
  `ltQuestion` longtext NOT NULL,
  `ltAnswerA` longtext NOT NULL,
  `ltAnswerB` longtext NOT NULL,
  `ltAnswerC` longtext NOT NULL,
  `ltAnswerD` longtext NOT NULL,
  `vcCorrectAnswer` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table to keep questions & answers for "multiple" questions';

--
-- Dumping data for table `tableMultipleQuestions`
--

INSERT INTO `tableMultipleQuestions` (`vcIdQuestion`, `intParcial`, `ltQuestion`, `ltAnswerA`, `ltAnswerB`, `ltAnswerC`, `ltAnswerD`, `vcCorrectAnswer`) VALUES
('116260IAAJ9312011A0AdmistracionPublicaeInformatica9', 2, 'Â¿sexta pregunta mÃºltiple?', '1', '2', '3', '4', 'A'),
('121525IAAJ9312011A0AdmistracionPublicaeInformatica9', 1, 'Â¿Quinta pregunta mÃºltiple=', 'uno', 'dos', 'tres', 'cuatro', 'D'),
('212085IAAJ9312011A0AdmistracionPublicaeInformatica9', 2, 'Â¿segunda pregunta mÃºltiple?', 'uno', 'dos', 'tres', 'cuatro', 'B'),
('416905IAAJ9312011A0AdmistracionPublicaeInformatica9', 1, 'Â¿Primera pregunta mÃºltiple?', 'sÃ­', 'dos', 'tres', 'cuatro', 'A'),
('447985IAAJ9312011A0AdmistracionPublicaeInformatica9', 1, 'Â¿Tercera pregunta booleana?', '1', '2', '3', '4', 'C'),
('448900IAAJ9312011A0AdmistracionPublicaeInformatica9', 2, 'Â¿novena pregunta mÃºltiple?', '1', '2', '3', '4', 'D'),
('683258IAAJ9312011A0SeminariodeMultimediaII9', 1, 'Â¿DÃ©cima pregunta mÃºltiple?', 'uno', 'dos', 'tres', 'cuatro', 'A'),
('692823IAAJ9312011A0AdmistracionPublicaeInformatica9', 2, 'Â¿Octava pregunta mÃºltiple?', 'uno', 'dos', 'tres', 'cuatro', 'C'),
('918115IAAJ9312011A0AdmistracionPublicaeInformatica9', 2, 'Â¿SÃ©ptima pregunta MÃºltiple?', '1', '2', '3', '4', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `tableOpenQuestions`
--

CREATE TABLE IF NOT EXISTS `tableOpenQuestions` (
  `vcIdQuestion` varchar(60) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `intParcial` int(10) NOT NULL,
  `ltQuestion` longtext CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `ltAnswer` longtext CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table contains the Open questions and its answers';

--
-- Dumping data for table `tableOpenQuestions`
--

INSERT INTO `tableOpenQuestions` (`vcIdQuestion`, `intParcial`, `ltQuestion`, `ltAnswer`) VALUES
('20851IAAJ9312011A0AdmistracionPublicaeInformatica9', 2, 'Â¿Quinta pregunta abierta?', 'cinco'),
('263850IAAJ9312011A0AdmistracionPublicaeInformatica9', 1, 'Â¿primera pregunta mÃºltiple?', 'uno'),
('631146IAAJ9312011A0AdmistracionPublicaeInformatica9', 2, 'Â¿segunda pregunta abierta?', 'dos'),
('637349IAAJ9312011A0AdmistracionPublicaeInformatica9', 2, 'Â¿octava pregunta abierta=?', 'ocho'),
('66551IAAJ9312011A0AdmistracionPublicaeInformatica9', 1, 'Â¿SÃ©ptima pregunta abierta?', 'siete'),
('685643IAAJ9312011A0AdmistracionPublicaeInformatica9', 2, 'Â¿DÃ©cima pregunta abierta?', 'diez'),
('716071IAAJ9312011A0AdmistracionPublicaeInformatica9', 2, 'Â¿sexta pregunta abierta?', 'seis'),
('808350IAAJ9312011A0AdmistracionPublicaeInformatica9', 1, 'Â¿tercera pregunta abierta?', 'tres'),
('880917IAAJ9312011A0AdmistracionPublicaeInformatica9', 1, 'Â¿novena pregunta abierta?', 'nueve'),
('900871IAAJ9312011A0AdmistracionPublicaeInformatica9', 2, 'Â¿Cuarta pregunta abierta?', 'cuatro');

-- --------------------------------------------------------

--
-- Table structure for table `tableQuestions`
--

CREATE TABLE IF NOT EXISTS `tableQuestions` (
  `bintQuestionIndex` bigint(20) NOT NULL,
  `vcRFC` varchar(13) NOT NULL,
  `vcIdSubject` varchar(60) NOT NULL,
  `vcIdQuestion` varchar(60) NOT NULL,
  `intParcial` int(10) NOT NULL COMMENT 'Colum to get the partial of the exam'
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableQuestions`
--

INSERT INTO `tableQuestions` (`bintQuestionIndex`, `vcRFC`, `vcIdSubject`, `vcIdQuestion`, `intParcial`) VALUES
(1, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '700956IAAJ9312011A0AdmistracionPublicaeInformatica9', 1),
(2, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '764667IAAJ9312011A0AdmistracionPublicaeInformatica9', 1),
(3, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '543374IAAJ9312011A0AdmistracionPublicaeInformatica9', 2),
(4, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '945662IAAJ9312011A0AdmistracionPublicaeInformatica9', 2),
(5, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '803768IAAJ9312011A0AdmistracionPublicaeInformatica9', 1),
(6, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '740894IAAJ9312011A0AdmistracionPublicaeInformatica9', 1),
(7, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '539343IAAJ9312011A0AdmistracionPublicaeInformatica9', 2),
(8, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '869875IAAJ9312011A0AdmistracionPublicaeInformatica9', 2),
(9, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '416905IAAJ9312011A0AdmistracionPublicaeInformatica9', 1),
(10, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '212085IAAJ9312011A0AdmistracionPublicaeInformatica9', 2),
(11, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '447985IAAJ9312011A0AdmistracionPublicaeInformatica9', 1),
(12, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '121525IAAJ9312011A0AdmistracionPublicaeInformatica9', 1),
(13, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '116260IAAJ9312011A0AdmistracionPublicaeInformatica9', 2),
(14, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '918115IAAJ9312011A0AdmistracionPublicaeInformatica9', 2),
(15, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '692823IAAJ9312011A0AdmistracionPublicaeInformatica9', 2),
(16, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '448900IAAJ9312011A0AdmistracionPublicaeInformatica9', 2),
(17, 'IAAJ9312011A0', 'IAAJ9312011A0SeminariodeMultimediaII9', '683258IAAJ9312011A0SeminariodeMultimediaII9', 1),
(18, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '263850IAAJ9312011A0AdmistracionPublicaeInformatica9', 1),
(19, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '631146IAAJ9312011A0AdmistracionPublicaeInformatica9', 2),
(20, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '808350IAAJ9312011A0AdmistracionPublicaeInformatica9', 1),
(21, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '900871IAAJ9312011A0AdmistracionPublicaeInformatica9', 2),
(22, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '20851IAAJ9312011A0AdmistracionPublicaeInformatica9', 2),
(23, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '716071IAAJ9312011A0AdmistracionPublicaeInformatica9', 2),
(24, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '66551IAAJ9312011A0AdmistracionPublicaeInformatica9', 1),
(25, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '637349IAAJ9312011A0AdmistracionPublicaeInformatica9', 2),
(26, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '880917IAAJ9312011A0AdmistracionPublicaeInformatica9', 1),
(27, 'IAAJ9312011A0', 'IAAJ9312011A0AdmistracionPublicaeInformatica9', '685643IAAJ9312011A0AdmistracionPublicaeInformatica9', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tableSubjects`
--

CREATE TABLE IF NOT EXISTS `tableSubjects` (
  `vcIdSubject` varchar(60) NOT NULL,
  `vcRFC` varchar(13) NOT NULL,
  `vcSubjectName` varchar(60) NOT NULL,
  `vcSubjectCareer` varchar(60) NOT NULL,
  `intTurn` int(10) NOT NULL,
  `intSemester` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableSubjects`
--

INSERT INTO `tableSubjects` (`vcIdSubject`, `vcRFC`, `vcSubjectName`, `vcSubjectCareer`, `intTurn`, `intSemester`) VALUES
('IAAJ9312011A0AdmistracionPublicaeInformatica9', 'IAAJ9312011A0', 'AdmistraciÃ³n PÃºblica e InformÃ¡tica', 'InformÃ¡tica', 2, 9),
('IAAJ9312011A0SeminariodeRedesII9', 'IAAJ9312011A0', 'Seminario de Redes II', 'InformÃ¡tica', 2, 9),
('IAAJ9312011A0SeminariodeMultimediaII9', 'IAAJ9312011A0', 'Seminario de Multimedia II', 'InformÃ¡tica', 2, 9),
('IAAJ9312011A0SeminariodeDesarrolloWebII9', 'IAAJ9312011A0', 'Seminario de Desarrollo Web II', 'InformÃ¡tica', 2, 9),
('IAAJ9312011A0InformaticaI5', 'IAAJ9312011A0', 'InformÃ¡tica I', 'ITSE', 1, 5),
('IAAJ9312011A0CalculoDiferencialeIntegralI7', 'IAAJ9312011A0', 'CÃ¡lculo Diferencial e Integral I', 'IME', 1, 7),
('IAAJ9312011A0CalculoDiferencialeIntegral22', 'IAAJ9312011A0', 'CÃ¡lculo Diferencial e Integral 2', 'ITSE', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tableUsers`
--

CREATE TABLE IF NOT EXISTS `tableUsers` (
  `vcRFC` varchar(13) NOT NULL,
  `vcName` varchar(60) NOT NULL,
  `vcApellidos` varchar(60) NOT NULL,
  `vcPasswd` varchar(60) NOT NULL,
  `vcCareer` varchar(60) NOT NULL,
  `intTurn` int(20) NOT NULL,
  `bType` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableUsers`
--

INSERT INTO `tableUsers` (`vcRFC`, `vcName`, `vcApellidos`, `vcPasswd`, `vcCareer`, `intTurn`, `bType`) VALUES
('IAAJ9312014A0', 'Juan Francisco', 'Islas Aguilar', 'dwarfest', 'Informatica', 2, 0),
('IAAJ9312011A0', 'Juan Francisco', 'Islas Aguilar', 'dwarfest', 'InformÃ¡tica', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tableBooleanQuestions`
--
ALTER TABLE `tableBooleanQuestions`
  ADD PRIMARY KEY (`vcIdQuestion`);

--
-- Indexes for table `tableMultipleQuestions`
--
ALTER TABLE `tableMultipleQuestions`
  ADD PRIMARY KEY (`vcIdQuestion`);

--
-- Indexes for table `tableOpenQuestions`
--
ALTER TABLE `tableOpenQuestions`
  ADD PRIMARY KEY (`vcIdQuestion`);

--
-- Indexes for table `tableQuestions`
--
ALTER TABLE `tableQuestions`
  ADD KEY `bintQuestionIndex` (`bintQuestionIndex`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tableQuestions`
--
ALTER TABLE `tableQuestions`
  MODIFY `bintQuestionIndex` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
