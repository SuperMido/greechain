-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 21, 2020 at 04:18 PM
-- Server version: 8.0.20-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greechain`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `userName` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `comment` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `batch_no` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `label` double DEFAULT '0',
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userName`, `comment`, `batch_no`, `label`, `timestamp`) VALUES
(1, 'Porter Kemp', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '', 0, '2020-05-20 00:00:00'),
(2, 'Shad Calhoun', 'Lorem', '', 0, '2020-05-20 00:00:00'),
(3, 'Dalton Callahan', 'Lorem ipsum', '', 0, '2020-05-20 00:00:00'),
(4, 'Nasim Patton', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', '', 0, '2020-05-20 00:00:00'),
(5, 'Paul Schneider', 'Lorem ipsum dolor sit', '', 0, '2020-05-20 00:00:00'),
(6, 'Zane Whitehead', 'Lorem ipsum dolor sit amet, consectetuer', '', 0, '2020-05-20 00:00:00'),
(7, 'Paul Conley', 'Lorem ipsum dolor sit amet, consectetuer', '', 0, '2020-05-20 00:00:00'),
(8, 'Paki Velazquez', 'Lorem ipsum dolor sit amet,', '', 0, '2020-05-20 00:00:00'),
(9, 'Caleb Lambert', 'Lorem ipsum dolor sit amet,', '', 0, '2020-05-20 00:00:00'),
(10, 'Hop Joyner', 'Lorem ipsum dolor sit amet,', '', 0, '2020-05-20 00:00:00'),
(11, 'Samson Middleton', 'Lorem ipsum dolor sit amet, consectetuer adipiscing', '', 0, '2020-05-20 00:00:00'),
(12, 'Oscar Lee', 'Lorem ipsum', '', 0, '2020-05-20 00:00:00'),
(13, 'Gavin Beach', 'Lorem ipsum', '', 0, '2020-05-20 00:00:00'),
(14, 'Brennan Finley', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '', 0, '2020-05-20 00:00:00'),
(15, 'Dustin Patterson', 'Lorem ipsum dolor sit amet,', '', 0, '2020-05-20 00:00:00'),
(16, 'Alfonso Kent', 'Lorem ipsum dolor sit', '', 0, '2020-05-20 00:00:00'),
(17, 'Ira Sexton', 'Lorem ipsum dolor sit amet,', '', 0, '2020-05-20 00:00:00'),
(18, 'Allistair Guerrero', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '', 0, '2020-05-20 00:00:00'),
(19, 'Lucas Webster', 'Lorem ipsum', '', 0, '2020-05-20 00:00:00'),
(20, 'Kasimir Young', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '', 0, '2020-05-20 00:00:00'),
(21, 'Murphy Hobbs', 'Lorem ipsum dolor sit amet,', '', 0, '2020-05-20 00:00:00'),
(22, 'Ignatius Willis', 'Lorem ipsum dolor', '', 0, '2020-05-20 00:00:00'),
(23, 'Eagan West', 'Lorem ipsum dolor sit amet, consectetuer', '', 0, '2020-05-20 00:00:00'),
(24, 'Len Le', 'Lorem ipsum dolor', '', 0, '2020-05-20 00:00:00'),
(25, 'Wesley Mcmahon', 'Lorem ipsum', '', 0, '2020-05-20 00:00:00'),
(26, 'Troy Dodson', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', '', 0, '2020-05-20 00:00:00'),
(27, 'Jin Walls', 'Lorem ipsum dolor sit', '', 0, '2020-05-20 00:00:00'),
(28, 'Ralph Flores', 'Lorem ipsum dolor sit amet, consectetuer', '', 0, '2020-05-20 00:00:00'),
(29, 'Aquila Buckner', 'Lorem ipsum dolor sit amet, consectetuer', '', 0, '2020-05-20 00:00:00'),
(30, 'Ivor Harvey', 'Lorem ipsum dolor sit amet, consectetuer adipiscing', '', 0, '2020-05-20 00:00:00'),
(31, 'Cole Shields', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', '', 0, '2020-05-20 00:00:00'),
(32, 'Kermit Cotton', 'Lorem ipsum dolor sit', '', 0, '2020-05-20 00:00:00'),
(33, 'Brian Pruitt', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '', 0, '2020-05-20 00:00:00'),
(34, 'Barclay Gonzalez', 'Lorem ipsum dolor sit amet, consectetuer adipiscing', '', 0, '2020-05-20 00:00:00'),
(35, 'Raphael Pate', 'Lorem ipsum dolor sit amet, consectetuer', '', 0, '2020-05-20 00:00:00'),
(36, 'Wang Shaffer', 'Lorem ipsum dolor sit', '', 0, '2020-05-20 00:00:00'),
(37, 'Ferdinand Haley', 'Lorem ipsum', '', 0, '2020-05-20 00:00:00'),
(38, 'Kaseem Glenn', 'Lorem ipsum dolor sit amet, consectetuer', '', 0, '2020-05-20 00:00:00'),
(39, 'Omar Mccall', 'Lorem ipsum dolor sit amet, consectetuer', '', 0, '2020-05-20 00:00:00'),
(40, 'Acton Snow', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '', 0, '2020-05-20 00:00:00'),
(41, 'Tarik Garrett', 'Lorem ipsum dolor', '', 0, '2020-05-20 00:00:00'),
(42, 'Axel Cabrera', 'Lorem ipsum dolor sit amet,', '', 0, '2020-05-20 00:00:00'),
(43, 'George Petersen', 'Lorem ipsum dolor sit amet, consectetuer', '', 0, '2020-05-20 00:00:00'),
(44, 'Mannix Faulkner', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', '', 0, '2020-05-20 00:00:00'),
(45, 'Colorado Ferrell', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', '', 0, '2020-05-20 00:00:00'),
(46, 'Brandon Mooney', 'Lorem ipsum dolor sit amet,', '', 0, '2020-05-20 00:00:00'),
(47, 'Tanek Chase', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '', 0, '2020-05-20 00:00:00'),
(48, 'Calvin Short', 'Lorem', '', 0, '2020-05-20 00:00:00'),
(49, 'Stephen Tyson', 'Lorem ipsum dolor', '', 0, '2020-05-20 00:00:00'),
(50, 'Jesse Chavez', 'Lorem ipsum dolor sit', '', 0, '2020-05-20 00:00:00'),
(51, 'Kermit Jarvis', 'Lorem ipsum dolor sit', '', 0, '2020-05-20 00:00:00'),
(52, 'Harrison Barry', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', '', 0, '2020-05-20 00:00:00'),
(53, 'Adrian Mccarthy', 'Lorem ipsum dolor sit amet, consectetuer adipiscing', '', 0, '2020-05-20 00:00:00'),
(54, 'Acton Manning', 'Lorem ipsum dolor', '', 0, '2020-05-20 00:00:00'),
(55, 'Paul Ingram', 'Lorem ipsum dolor sit amet,', '', 0, '2020-05-20 00:00:00'),
(56, 'Judah Randall', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '', 0, '2020-05-20 00:00:00'),
(57, 'Ralph Macias', 'Lorem ipsum dolor sit', '', 0, '2020-05-20 00:00:00'),
(58, 'Sean Johns', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', '', 0, '2020-05-20 00:00:00'),
(59, 'Zeus Douglas', 'Lorem ipsum dolor', '', 0, '2020-05-20 00:00:00'),
(60, 'Kamal Grimes', 'Lorem ipsum dolor sit amet, consectetuer adipiscing', '', 0, '2020-05-20 00:00:00'),
(61, 'Blaze Kelly', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', '', 0, '2020-05-20 00:00:00'),
(62, 'Hashim Bray', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', '', 0, '2020-05-20 00:00:00'),
(63, 'Salvador Melton', 'Lorem', '', 0, '2020-05-20 00:00:00'),
(64, 'Roth Russo', 'Lorem ipsum dolor sit amet, consectetuer', '', 0, '2020-05-20 00:00:00'),
(65, 'Igor Brady', 'Lorem ipsum dolor', '', 0, '2020-05-20 00:00:00'),
(66, 'Beau Aguirre', 'Lorem', '', 0, '2020-05-20 00:00:00'),
(67, 'Zeus Burris', 'Lorem ipsum dolor sit amet, consectetuer adipiscing', '', 0, '2020-05-20 00:00:00'),
(68, 'Abdul Sparks', 'Lorem ipsum dolor sit amet, consectetuer adipiscing', '', 0, '2020-05-20 00:00:00'),
(69, 'Basil Strickland', 'Lorem ipsum dolor sit amet, consectetuer adipiscing', '', 0, '2020-05-20 00:00:00'),
(70, 'Nasim Turner', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', '', 0, '2020-05-20 00:00:00'),
(71, 'Otto Hartman', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', '', 0, '2020-05-20 00:00:00'),
(72, 'Cade Mason', 'Lorem ipsum', '', 0, '2020-05-20 00:00:00'),
(73, 'Price Mcintosh', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', '', 0, '2020-05-20 00:00:00'),
(74, 'Benjamin Potter', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', '', 0, '2020-05-20 00:00:00'),
(75, 'Vladimir Hood', 'Lorem ipsum dolor sit', '', 0, '2020-05-20 00:00:00'),
(76, 'Tiger Quinn', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed', '', 0, '2020-05-20 00:00:00'),
(77, 'Lewis Moreno', 'Lorem ipsum dolor sit amet,', '', 0, '2020-05-20 00:00:00'),
(78, 'Jasper Downs', 'Lorem ipsum dolor sit amet,', '', 0, '2020-05-20 00:00:00'),
(79, 'Chadwick Woodard', 'Lorem ipsum dolor sit', '', 0, '2020-05-20 00:00:00'),
(80, 'Orson Quinn', 'Lorem ipsum dolor sit amet, consectetuer', '', 0, '2020-05-20 00:00:00'),
(81, 'Dean Marsh', 'Lorem ipsum dolor sit amet, consectetuer adipiscing', '', 0, '2020-05-20 00:00:00'),
(82, 'Keegan Stokes', 'Lorem ipsum dolor sit amet,', '', 0, '2020-05-20 00:00:00'),
(83, 'Zahir Robinson', 'Lorem ipsum dolor', '', 0, '2020-05-20 00:00:00'),
(84, 'Isaiah Lara', 'Lorem ipsum', '', 0, '2020-05-20 00:00:00'),
(85, 'Martin Adams', 'Lorem ipsum', '', 0, '2020-05-20 00:00:00'),
(86, 'Richard Norton', 'Lorem ipsum', '', 0, '2020-05-20 00:00:00'),
(87, 'Lance Johnson', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '', 0, '2020-05-20 00:00:00'),
(88, 'Bernard Greer', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '', 0, '2020-05-20 00:00:00'),
(89, 'Donovan Michael', 'Lorem ipsum dolor sit', '', 0, '2020-05-20 00:00:00'),
(90, 'Amery Thomas', 'Lorem ipsum', '', 0, '2020-05-20 00:00:00'),
(91, 'Vernon King', 'Lorem', '', 0, '2020-05-20 00:00:00'),
(92, 'Preston Francis', 'Lorem ipsum dolor', '', 0, '2020-05-20 00:00:00'),
(93, 'Elliott Horton', 'Lorem ipsum dolor', '', 0, '2020-05-20 00:00:00'),
(94, 'Emerson Spence', 'Lorem ipsum', '', 0, '2020-05-20 00:00:00'),
(95, 'Tate Lambert', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '', 0, '2020-05-20 00:00:00'),
(96, 'Amir Frank', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur', '', 0, '2020-05-20 00:00:00'),
(97, 'Robert Davis', 'Lorem ipsum dolor sit amet, consectetuer', '', 0, '2020-05-20 00:00:00'),
(98, 'Amos Hopkins', 'Lorem ipsum dolor sit amet, consectetuer adipiscing', '', 0, '2020-05-20 00:00:00'),
(99, 'Axel Foster', 'Lorem ipsum dolor sit amet,', '', 0, '2020-05-20 00:00:00'),
(100, 'Malik Moreno', 'Lorem ipsum dolor', '', 0, '2020-05-20 00:00:00'),
(101, 'Hieu', 'Chất lượng cafe rất tốt', '0xe90E408CCAB75205f94DF201b9736D7d040eeF19', 0, '2020-05-21 00:00:00'),
(102, 'Huy', 'Sản phẩm tốt', '0xe90E408CCAB75205f94DF201b9736D7d040eeF19', 0, '2020-05-21 00:00:00'),
(103, 'Tài', 'Sản phẩm tốt', '0xe90E408CCAB75205f94DF201b9736D7d040eeF19', 0, '2020-05-21 00:00:00'),
(104, 'Nhật', 'Sản phẩm tốt, thông tin rõ ràng', '0xe90E408CCAB75205f94DF201b9736D7d040eeF19', 0, '2020-05-21 00:00:00'),
(105, 'Nhật', 'Sản phẩm tốt, thông tin rõ ràng', '0xe90E408CCAB75205f94DF201b9736D7d040eeF19', 1, '2020-05-21 00:00:00'),
(106, 'Ngọc Hùng', 'Sản phẩm tồi tệ', '0xe90E408CCAB75205f94DF201b9736D7d040eeF19', 1, '2020-05-21 16:05:53'),
(107, 'Thắng', 'Sản phẩm không đúng chất lượng', '0xe90E408CCAB75205f94DF201b9736D7d040eeF19', 1, '2020-05-21 16:06:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
