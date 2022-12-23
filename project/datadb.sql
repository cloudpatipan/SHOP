-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 06:56 AM
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
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(10) NOT NULL COMMENT 'รหัสสมาชิก',
  `name` varchar(30) NOT NULL COMMENT 'ชื่อ',
  `lastname` varchar(30) NOT NULL COMMENT 'นามสกุล',
  `telephone` int(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `username` varchar(20) NOT NULL COMMENT 'ีusername',
  `password` varchar(128) NOT NULL COMMENT 'password',
  `image` varchar(100) NOT NULL COMMENT 'รูปภาพโปรไฟล์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `orderID`, `pro_id`, `orderPrice`, `orderQty`, `Total`) VALUES
(5, 0000000016, 000025, 2290, 1, 2290),
(6, 0000000017, 000029, 500, 1, 500),
(7, 0000000017, 000025, 2290, 1, 2290),
(8, 0000000018, 000009, 1590, 1, 1590),
(9, 0000000019, 000006, 1950, 1, 1950),
(10, 0000000020, 000010, 1200, 3, 3600),
(11, 0000000021, 000029, 500, 1, 500),
(12, 0000000022, 000025, 2290, 1, 2290),
(13, 0000000023, 000025, 2290, 1, 2290),
(14, 0000000024, 000025, 2290, 1, 2290),
(15, 0000000025, 000011, 1300, 1, 1300),
(16, 0000000025, 000015, 1800, 1, 1800),
(17, 0000000026, 000013, 650, 2, 1300),
(18, 0000000027, 000006, 1950, 2, 3900),
(19, 0000000027, 000044, 1800, 1, 1800),
(20, 0000000028, 000025, 2290, 1, 2290),
(21, 0000000029, 000046, 79, 1, 79.2),
(22, 0000000030, 000029, 500, 1, 500),
(23, 0000000031, 000044, 1800, 1, 1800),
(24, 0000000032, 000015, 1800, 1, 1800),
(25, 0000000033, 000025, 2290, 1, 2290),
(26, 0000000034, 000029, 500, 1, 500),
(27, 0000000035, 000015, 1800, 1, 1800),
(28, 0000000035, 000046, 79, 1, 79.2),
(29, 0000000036, 000029, 500, 1, 500),
(30, 0000000037, 000029, 500, 2, 1000),
(31, 0000000037, 000025, 2290, 1, 2290),
(32, 0000000038, 000015, 1800, 1, 1800),
(33, 0000000039, 000025, 2290, 1, 2290);

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
(000006, 'DX BUILD DRIVER', '', 1, 1950, 0, 'pr_639bda3b58fc9.jpg'),
(000008, 'DX SQUASH DRIVER', '', 1, 2999, 4, 'pr_639be429d327d.jfif'),
(000009, 'DX DRILL CRUSHER', '', 1, 1590, -6, 'pr_639bec90b8b54.jpg'),
(000011, 'DX CROSS-Z DRAGON', '', 1, 1300, -27, 'pr_639bedffc6ea5.jpg'),
(000012, 'DX HAZARD TRIGGER', '', 1, 1000, 2, 'pr_639beecc5ea9d.jpg'),
(000014, 'DX NEBULA STEAM GUN', '', 1, 1800, 4, 'pr_639bef273a881.jpg'),
(000015, 'DX BEAT CLOSER', '', 1, 1800, -57, 'pr_639bef56ed0ba.jpg'),
(000016, 'DX STEAM BLADE', '', 1, 1400, 2, 'pr_639befaf942c9.jpg'),
(000017, 'DX EVOL DRIVER', '', 1, 2200, 3, 'pr_639bf03c1d1f7.jfif'),
(000018, 'DX GENIUS FULL BOTTLE', '', 1, 1300, 8, 'pr_639bf05c464bc.jfif'),
(000019, 'Dx Muscle Galaxy Full Bottle', '', 1, 3300, 4, 'pr_639c284054ae6.jpg'),
(000020, 'DX GREAT CROSS-Z DRAGON', '', 1, 2300, 2, 'pr_639c28ce0158c.jpg'),
(000023, 'DX Rabbit Evol Bottle & Dragon Evol Bottle Set', '', 1, 900, 4, 'pr_639c2db6da8bc.jpg'),
(000025, 'Dx Desire driver / Rider Geats', '', 5, 2290, -221, 'pr_639f32f8eea6c.jpg'),
(000027, 'Revice Dx Giffard rex vistamp', '', 2, 1290, 3, 'pr_639f33745f7db.webp'),
(000028, 'Rider Geats DX Fever Slot Raise Buckle', '', 5, 1190, -26, 'pr_639f33e0c4a11.jpg'),
(000029, 'Dx Command Twin Buckle & Raising Sword', '', 5, 500, -199, 'pr_639f344445442.jpg'),
(000044, 'Dx Hiden Zero One driver', '', 7, 1800, -84, 'pr_63a0506ebc3fc.jfif'),
(000045, 'DX Zero Two Progrise Key & Driver Unit', '', 7, 1199, 2, 'pr_63a050f5911cf.jpeg'),
(000046, 'จุมพิตป่วน ก๊วนเด็กหอ เล่ม 2 (จบ)', '', 1, 79.2, -88, 'pr_63a05afa1acd9.jpg');

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

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`orderID`, `cus_name`, `address`, `telephone`, `total_price`, `order_status`, `reg_date`) VALUES
(0000000016, 'ปฏิภาณ ทริสุข', '92/39 ม.4 ต.บ่อลพอย อ.บ่อไร่ จ.ตราด', '0640590172', 2290, '0', '2022-12-20 08:15:06'),
(0000000017, 'ปฏิภาณ ทริสุข', '...', '0640590172', 2790, '0', '2022-12-20 08:13:04'),
(0000000018, 'sdsdsd', 'sdsdsdsd', '1545165165', 1590, '0', '2022-12-20 08:13:37'),
(0000000019, 'ปฏิภาณ ทริสุข', '92/36', '0640590172', 1950, '0', '2022-12-20 08:13:58'),
(0000000020, 'ปฏิภาณ ทริสุข', 'sdsdssd', '0640590172', 3600, '0', '2022-12-20 08:13:43'),
(0000000021, 'ปฏิภาณ ทริสุข', '92/36 ม.4 ต.บ่อลพอย อ.บ่อไร่ จ.ตราด', '0640590172', 500, '0', '2022-12-20 08:15:52'),
(0000000022, 'ปฏิภาณ ทริสุข', '92/36 ม.4 ต.บ่อพลอย อ.บ่อไร่ จ.ตราด', '0640590172', 2290, '0', '2022-12-20 08:20:47'),
(0000000023, 'ปฏิภาณ ทริสุข', '92/36 ม.4 ต.บ่อพลอย อ.บ่อไร่ จ.ตราด', '0640590172', 2290, '0', '2022-12-20 08:20:58'),
(0000000024, 'ปฏิภาณ ทริสุข', '92/36 ม.4 ต.บ่อพลอย อ.บ่อไร่ จ.ตราด', '0640590172', 2290, '0', '2022-12-20 08:21:37'),
(0000000025, 'ปฏิภาณ ทริสุข', '92/36 ม.4 ต.บ่อพลอย อ.บ่อไร่ จ.ตราด', '0640590172', 3100, '0', '2022-12-20 08:24:00'),
(0000000026, 'ปฏิภาณ ทริสุข', '92/36 ม.4 ต.บ่อพลอย อ.บ่อไร่ จ.ตราด', '0640590172', 1300, '0', '2022-12-20 08:24:04'),
(0000000027, 'ปฏิภาณ ทริสุข', '92/36 ม.4 ต.บ่อพลอย อ.บ่อไร่ จ.ตราด', '0640590172', 5700, '0', '2022-12-20 08:24:10'),
(0000000028, 'ปฏิภาณ ทริสุข', '92/36 ม.4 ต.บ่อพลอย อ.บ่อไร่ จ.ตราด', '0640590172', 2290, '0', '2022-12-20 08:24:07'),
(0000000029, 'ปฏิภาณ ทริสุข', '92/39 ม.4 ต.บ่อพลอย อ.บ่อไร่ จ.ตราด', '0640590172', 79.2, '0', '2022-12-20 08:18:34'),
(0000000030, 'รัชชานนท์ แก้วขาว', 'กูไม่บอกไอสัด', '048488489', 500, '0', '2022-12-20 08:29:20'),
(0000000031, 'รัชชานนท์ แก้วขาว', 'ควยไรไอสัด', '0545154891', 1800, '0', '2022-12-20 08:31:12'),
(0000000032, 'รัชชานนท์ แก้วขาว', 'กูบอกว่ากูซื้อหมดแล้ว', '1561548488', 1800, '0', '2022-12-20 08:48:41'),
(0000000033, 'รัชชานนท์ แก้วขาว', 'ไอเด็กเหี้ย', '2626254854', 2290, '2', '2022-12-20 08:49:27'),
(0000000034, 'รัชชานนท์ แก้วขาว', 'บอกไปแล้วอย่าให้พูดซํ้า', '0145458796', 500, '0', '2022-12-20 16:26:37'),
(0000000035, 'ปฏิภาณ ทริสุข', '92/36 ม.4 ต.บ่อพลอย อ.บ่อไร่ จ.ตราด', '0640590172', 1879.2, '2', '2022-12-20 15:57:06'),
(0000000036, 'รัชชานนท์ แก้วขาว', 'ยังไม่บอก', '0654578166', 500, '2', '2022-12-20 17:52:25'),
(0000000037, 'พีรวิชญ์ จิตสมชีพ', 'กูไม่บอก', '123456789', 3290, '2', '2022-12-20 17:51:25'),
(0000000038, 'พีรวิชญ์ จิตสมชีพ', 'กูไม่บอก', '123456789', 1800, '1', '2022-12-20 17:53:56'),
(0000000039, 'รัชชานนท์ แก้วขาว', 'ไม่บอก', '0124564648', 2290, '2', '2022-12-21 14:32:38');

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
(005, 'Kamen Rider Geats'),
(007, 'Kamen Rider Zero One');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสมาชิก', AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ลำดับที่', AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า', AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `orderID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'เลขที่ใบสั่งซื้อ', AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทสินค้า', AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
