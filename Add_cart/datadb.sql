-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 04:53 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL COMMENT 'ลำดับที่',
  `orderID` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'เลขที่ใบสั่งซื้อ',
  `pro_id` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสสินค้า',
  `orderPrice` int(11) NOT NULL COMMENT 'ราคาสินค้า',
  `orderQty` int(11) NOT NULL COMMENT 'จำนวนที่สั่งซื้อ',
  `Total` float NOT NULL COMMENT 'ราคารวม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสสินค้า',
  `pro_name` varchar(100) NOT NULL COMMENT 'ชื่อสินค้า',
  `detail` text NOT NULL COMMENT 'รายละเอียด',
  `type_id` int(3) NOT NULL COMMENT 'รหัสประเภทสินค้า',
  `price` float NOT NULL COMMENT 'ราคา',
  `amount` int(11) NOT NULL COMMENT 'จำนวนสินค้าคงเหลือ',
  `image` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'รูปภาพ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `detail`, `type_id`, `price`, `amount`, `image`) VALUES
(000006, 'DX BUILD DRIVER', '', 1, 1950, 6, 'pr_639bda3b58fc9.jpg'),
(000008, 'DX SQUASH DRIVER', '', 1, 2999, 4, 'pr_639be429d327d.jfif'),
(000009, 'DX DRILL CRUSHER', '', 1, 1590, 3, 'pr_639bec90b8b54.jpg'),
(000010, 'DX RABBIT TANK SPARKLING', '', 1, 1200, 8, 'pr_639bed843e6e2.jpg'),
(000011, 'DX CROSS-Z DRAGON', '', 1, 1300, 6, 'pr_639bedffc6ea5.jpg'),
(000012, 'DX HAZARD TRIGGER', '', 1, 1000, 2, 'pr_639beecc5ea9d.jpg'),
(000013, 'DX CROCODILE CRACK FULL BOTTLE', '', 1, 650, 1, 'pr_639bef006df36.jpg'),
(000014, 'DX NEBULA STEAM GUN', '', 1, 1800, 4, 'pr_639bef273a881.jpg'),
(000015, 'DX BEAT CLOSER', '', 1, 1800, 3, 'pr_639bef56ed0ba.jpg'),
(000016, 'DX STEAM BLADE', '', 1, 1400, 2, 'pr_639befaf942c9.jpg'),
(000017, 'DX EVOL DRIVER', '', 1, 2200, 3, 'pr_639bf03c1d1f7.jfif'),
(000018, 'DX GENIUS FULL BOTTLE', '', 1, 1300, 8, 'pr_639bf05c464bc.jfif'),
(000019, 'Dx Muscle Galaxy Full Bottle', '', 1, 3300, 4, 'pr_639c284054ae6.jpg'),
(000020, 'DX GREAT CROSS-Z DRAGON', '', 1, 2300, 2, 'pr_639c28ce0158c.jpg'),
(000022, 'DX Grease Blizzard Knuckle', '', 1, 3900, 2, 'pr_639c2d07f14c0.jpg'),
(000023, 'DX Rabbit Evol Bottle & Dragon Evol Bottle Set', '', 1, 900, 4, 'pr_639c2db6da8bc.jpg'),
(000024, 'Dx Perfect Kingdom', '', 1, 2900, 1, 'pr_639c3084c6182.jpg'),
(000025, 'Dx Desire driver / Rider Geats', '', 5, 2290, 4, 'pr_639f32f8eea6c.jpg'),
(000027, 'Revice Dx Giffard rex vistamp', '', 2, 1290, 3, 'pr_639f33745f7db.webp'),
(000028, 'Rider Geats DX Fever Slot Raise Buckle', '', 5, 1190, 2, 'pr_639f33e0c4a11.jpg'),
(000029, 'Dx Command Twin Buckle & Raising Sword', '', 5, 500, 4, 'pr_639f344445442.jpg'),
(000030, 'Dx Revice driver', '', 2, 1600, 2, 'pr_639f349993e1e.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `orderID` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'เลขที่ใบสั่งซื้อ',
  `cus_name` varchar(60) NOT NULL COMMENT 'ชื่อลูกค้า',
  `address` text NOT NULL COMMENT 'ที่อยู่',
  `telephone` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `total_price` float NOT NULL COMMENT 'ราคารวมสุทธิ',
  `order_status` varchar(1) NOT NULL COMMENT 'สถานะการซื้อ',
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันที่สั่งซื้อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสประเภทสินค้า',
  `type_name` varchar(50) NOT NULL COMMENT 'ชื่อประเภทสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(001, 'Kamen Rider Build'),
(002, 'Kamen Rider Revice'),
(003, 'Kamen Rider W'),
(004, 'Kamen Rider OOO'),
(005, 'Kamen Rider Geats');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ลำดับที่';

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า', AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `orderID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'เลขที่ใบสั่งซื้อ';

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทสินค้า', AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
