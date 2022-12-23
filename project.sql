-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 09:29 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `prj_id` int(11) NOT NULL,
  `prj_name_th` varchar(200) DEFAULT NULL,
  `prj_name_en` varchar(200) DEFAULT NULL,
  `prj_stt_id` int(11) DEFAULT NULL,
  `prj_ppt_id` int(11) DEFAULT NULL,
  `prj_lct_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`prj_id`, `prj_name_th`, `prj_name_en`, `prj_stt_id`, `prj_ppt_id`, `prj_lct_id`) VALUES
(1, 'GGEZ', 'Good game Easy', 1, 1, 1),
(2, 'LOL', 'Laughing Out Loud', 2, 2, 2),
(3, 'AFK', 'Away From Keyboard', 3, 3, 3),
(4, 'LOL', 'Laughing Out Loud', 4, 4, 4),
(5, 'Y', 'WHY', 5, 5, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`prj_id`),
  ADD KEY `f_prj_stt_id` (`prj_stt_id`),
  ADD KEY `f_prj_ppt_id` (`prj_ppt_id`),
  ADD KEY `f_prj_lct_id` (`prj_lct_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `prj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
