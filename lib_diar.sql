-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 04:06 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lib_diar`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Pesan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `ID` int(11) NOT NULL,
  `NamaDiary` varchar(250) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Time` date NOT NULL,
  `Text` varchar(500) NOT NULL,
  `Gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`ID`, `NamaDiary`, `Author`, `Time`, `Text`, `Gambar`) VALUES
(3, 'Dia', 'jor', '2020-03-26', 'pada hati itu .....', '5e7302d9c0353.jpg'),
(20, 'Hari ku', 'jordan', '2020-03-15', 'hello world', '5e6f0288bc668.jpg'),
(21, 'Hari ku', 'jordan', '2020-03-17', 'hay bro', '5e6f106b79bc3.jpg'),
(25, 'hay', 'jordan', '2020-03-10', 'hay bro', '5e6f17dc0ea8d.jpg'),
(26, 'hay', 'jordan', '2020-04-01', 'hello world', '5e6f30b86398d.jpg'),
(27, 'hay', 'jordan', '2020-03-01', 'hay bro', '5e6f30d548a0a.jpg'),
(32, 'Hari ku', 'jordan', '2020-03-04', 'hello world', '5e6f886b3badf.jpg'),
(35, 'Hari ku', 'jordan', '2020-03-03', 'hay bro', '5e6f8dabf1cb8.jpg'),
(36, 'hay', 'jordan', '2020-03-02', 'Akpam ', '5e701da65aa6f.jpg'),
(39, 'Dia', 'jojo', '2020-03-11', 'hello world', '5e70580deadf1.jpg'),
(40, 'Dia', 'jojo', '2020-03-17', 'hello world', '5e7059cdb3d27.jpg'),
(42, 'Ar-Razi', 'jordan', '2020-03-26', 'Abu Bakar Muhammad bin Zakaria ar-Razi (Persia: Ø£Ø¨ÙˆØ¨ÙƒØ± Ø§Ù„Ø±Ø§Ø²ÙŠ) atau dikenali sebagai Rhazes di dunia barat, merupakan salah seorang pakar sains Iran terkemuka. Ia hidup antara tahun 864 â€“ 930.M Ar-Razi sejak muda telah mempelajari filsafat, kimia, matematika dan kesastraan.\r\nDalam bidang kedokteran, ia berguru kepada Hunayn bin Ishaq di Baghdad. Sekembalinya ke Teheran, ia dipercaya untuk memimpin sebuah rumah sakit di Rayy. Selanjutnya ia juga memimpin Rumah Sakit Muqtadari di Bag', '5e7bea595d7be.jpg'),
(47, 'Dia', 'jor', '2020-03-26', 'Hari ini aku bete banget sama seseorang. Tahu gak, ternyata dia itu sombong banget orangnya. Bayangin aja, udah baik baik aku sapa dan kasih senyuman, tapi dianya malah cuek aja. Dan lebih parahnya lagi dia pura pura gak denger dan nylonong gitu aja.', '5e7c032b8fae1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `ID` int(11) NOT NULL,
  `USER` varchar(250) NOT NULL,
  `PASSWORD` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`ID`, `USER`, `PASSWORD`) VALUES
(3, 'jor', '$2y$10$H9FXGD0oLvxwvpvaAII1Tuvp72sYPqeEnwiWWn8qNDtRl6un5dAvu'),
(5, 'jojo', '$2y$10$A.DIq63Vv2MMOu6Wh61Rl.x6D7kcwNklm3JCyNI66TjpRQwyG1Dw2'),
(6, 'jordan', '$2y$10$as40j3FqbErEdebvkeS8Juc7vry9fr1OHX0uDxHynkAnzm.AMicjK');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `ID` int(11) NOT NULL,
  `USER` varchar(250) NOT NULL,
  `PROFIL` varchar(250) NOT NULL,
  `POST` int(11) NOT NULL,
  `VIEW` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`ID`, `USER`, `PROFIL`, `POST`, `VIEW`) VALUES
(1, 'Jordan Istiqlal Qalbi Adiba', 'hariku.jpg', 0, 0),
(2, 'M.Ghifary Firdaus', 'kisahkita.jpg', 0, 0),
(3, 'M.Rido', 'kisahku.jpg', 0, 0),
(4, 'M.Yusuf S', 'solo.jpg', 0, 0),
(5, 'Jordan Istiqlal Qalbi Adiba ', 'soul.jpg', 0, 0),
(6, 'M.Ghifary Firdaus', 'soul.jpg', 0, 0),
(7, 'M.Rido', 'soul2.jpg', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
