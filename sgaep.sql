-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 23, 2017 at 03:17 AM
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
('149904IAAJ9312011A05', 2, 'ya me cargÃ³ el payaso', 1),
('213487IAAJ9312011A0IntroduccionalasBasesdeDatos2', 1, 'que sÃ­ ya me cargÃ³ el payaso', 0),
('335985IAAJ9312011A0CÃ¡lculo Diferencial e Integral I3', 2, 'fco estÃ¡ enfermo', 1),
('335985IAAJ9312011A0Cálculo Diferencial e Integral I3', 2, 'fco está enfermo', 1);

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
('233585IAAJ9312011A0QuimicaMatematicas2do3', 2, 'tengo psoriasis', 'sÃ­ ', 'a huevo', 'pero por su puesto', 'ja, por pendejo', 'A'),
('318626IAAJ9312011A0Contabilidad II2', 1, 'tengo psoriasis', 'sí', 'no', 'pinche exagerado', 'ya te cargó el payaso', 'D');

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
('13389IAAJ9312011A0QuimicaMatematicas2do3', 1, 'pregunta abierta quimica', 'respuesta pregunta abierta'),
('656495IAAJ9312011A0AdministracionEmpresasII4', 2, 'Pregunta Prueba', 'Ponchiri');

-- --------------------------------------------------------

--
-- Table structure for table `tableQuestions`
--

CREATE TABLE IF NOT EXISTS `tableQuestions` (
  `bintQuestionIndex` bigint(20) NOT NULL,
  `vcRFC` varchar(13) NOT NULL,
  `vcIdSubject` varchar(60) NOT NULL,
  `vcIdQuestion` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableQuestions`
--

INSERT INTO `tableQuestions` (`bintQuestionIndex`, `vcRFC`, `vcIdSubject`, `vcIdQuestion`) VALUES
(1, 'IAAJ9312011A0', 'IAAJ9312011A0IntroduccionalasBasesdeDatos5', 'IAAJ9312011A0IntroduccionalasBasesdeDatos568660'),
(2, 'IAAJ9312011A0', 'IAAJ9312011A0AdministracionEmpresasII4', 'IAAJ9312011A0AdministracionEmpresasII4725613'),
(3, 'IAAJ9312011A0', 'IAAJ9312011A0IntroduccionalasBasesdeDatos5', 'IAAJ9312011A0IntroduccionalasBasesdeDatos5756676'),
(4, 'IAAJ9312011A0', 'IAAJ9312011A0QuimicaMatematicas2do3', 'IAAJ9312011A0QuimicaMatematicas2do3247996'),
(5, 'IAAJ9312011A0', 'IAAJ9312011A0Contabilidad II2', 'IAAJ9312011A0Contabilidad II2452940'),
(6, 'IAAJ9312011A0', '', ''),
(7, 'IAAJ9312011A0', '', ''),
(8, 'IAAJ9312011A0', 'IAAJ9312011A0Multimedia II9', 'IAAJ9312011A0Multimedia II9139109'),
(9, 'IAAJ9312011A0', 'IAAJ9312011A0QuimicaMatematicas2do3', 'IAAJ9312011A0QuimicaMatematicas2do3249707'),
(10, 'IAAJ9312011A0', '', ''),
(11, 'IAAJ9312011A0', 'IAAJ9312011A0Contabilidad II2', 'IAAJ9312011A0Contabilidad II2700634'),
(12, 'IAAJ9312011A0', 'IAAJ9312011A0IntroduccionalasBasesdeDatos2', 'IAAJ9312011A0IntroduccionalasBasesdeDatos2334151'),
(13, 'IAAJ9312011A0', 'IAAJ9312011A05', 'IAAJ9312011A05371640'),
(14, 'IAAJ9312011A0', 'IAAJ9312011A0CÃ¡lculo Diferencial e Integral I3', 'IAAJ9312011A0CÃ¡lculo Diferencial e Integral I3122260'),
(15, 'IAAJ9312011A0', 'IAAJ9312011A0CÃ¡lculo Diferencial e Integral I3', 'IAAJ9312011A0CÃ¡lculo Diferencial e Integral I3636745'),
(16, 'IAAJ9312011A0', 'IAAJ9312011A05', 'IAAJ9312011A05963917'),
(17, 'IAAJ9312011A0', 'IAAJ9312011A0CalculoDiferencialeIntegralII5', 'IAAJ9312011A0CalculoDiferencialeIntegralII573049'),
(18, 'IAAJ9312011A0', 'IAAJ9312011A0AdministracionEmpresasII4', '656495IAAJ9312011A0AdministracionEmpresasII4'),
(19, 'IAAJ9312011A0', 'IAAJ9312011A0QuimicaMatematicas2do3', '13389IAAJ9312011A0QuimicaMatematicas2do3'),
(20, 'IAAJ9312011A0', 'IAAJ9312011A0Cálculo Diferencial e Integral I3', '335985IAAJ9312011A0Cálculo Diferencial e Integral I3'),
(21, 'IAAJ9312011A0', 'IAAJ9312011A05', '149904IAAJ9312011A05'),
(22, 'IAAJ9312011A0', 'IAAJ9312011A0IntroduccionalasBasesdeDatos2', '213487IAAJ9312011A0IntroduccionalasBasesdeDatos2'),
(23, 'IAAJ9312011A0', 'IAAJ9312011A0CÃ¡lculo Diferencial e Integral I3', '335985IAAJ9312011A0CÃ¡lculo Diferencial e Integral I3'),
(24, 'IAAJ9312011A0', 'IAAJ9312011A0Contabilidad II2', '318626IAAJ9312011A0Contabilidad II2'),
(25, 'IAAJ9312011A0', 'IAAJ9312011A0QuimicaMatematicas2do3', '233585IAAJ9312011A0QuimicaMatematicas2do3');

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
('IAAJ9312011A0InformÃ¡tica 11', 'IAAJ9312011A0', 'InformÃ¡tica 1', 'InformÃ¡tica', 1, 1),
('IAAJ9312011A0Multimedia II9', 'IAAJ9312011A0', 'Multimedia II', 'InformÃ¡tica', 2, 9),
('IAAJ9312011A0Contabilidad II2', 'IAAJ9312011A0', 'Contabilidad II', 'InformÃ¡tica', 2, 2),
('IAAJ9312011A0CÃ¡lculo Diferencial e Integral I3', 'IAAJ9312011A0', 'CÃ¡lculo Diferencial e Integral I', 'ITSE', 1, 3),
('IAAJ9312011A05', 'IAAJ9312011A0', 'CÃ¡lculo Diferencial e Integral II', 'ITSE', 2, 5),
('IAAJ9312011A0QuimicaMatematicas2do3', 'IAAJ9312011A0', 'QuÃ­mica MatemÃ¡ticas 2do', 'ITSE', 2, 3),
('IAAJ9312011A0AdministracionEmpresasII4', 'IAAJ9312011A0', 'AdministraciÃ³n EmpresasII ', 'IME', 2, 4),
('IAAJ9312011A0IntroduccionalasBasesdeDatos2', 'IAAJ9312011A0', 'IntroducciÃ³n a las Bases de Datos', 'InformÃ¡tica', 2, 2),
('IAAJ9312011A0IntroduccionalasBasesdeDatos5', 'IAAJ9312011A0', 'IntroducciÃ³n a las Bases de Datos', 'ITSE', 2, 5),
('IAAJ9312011A0CalculoDiferencialeIntegralII5', 'IAAJ9312011A0', 'CÃ¡lculo Diferencial e Integral II', 'ITSE', 2, 5);

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
  MODIFY `bintQuestionIndex` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
