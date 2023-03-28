-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2023 at 09:30 AM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pond`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `ad_ad` varchar(100) COLLATE tis620_bin NOT NULL,
  `ad_pd` int(20) NOT NULL,
  `ad_od` varchar(100) COLLATE tis620_bin NOT NULL,
  `ad_name` varchar(100) COLLATE tis620_bin NOT NULL,
  `ad_id` int(20) NOT NULL,
  `ad_Email` int(20) NOT NULL,
  `ad_ext` varchar(50) COLLATE tis620_bin NOT NULL,
  `ad_uid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620 COLLATE=tis620_bin;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`ad_ad`, `ad_pd`, `ad_od`, `ad_name`, `ad_id`, `ad_Email`, `ad_ext`, `ad_uid`) VALUES
('256 ม.20 ถ.ขามเรียง อ.กันทรวิชัย', 44150, 'ไปรษณีย์ไทย', 'jirasin khamlap', 42, 619276596, '.jpg', 5),
('34/8 บ้านขามเรียง มหาสารคาม', 44150, 'KERRY EXPRESS', 'thanachot sittisirikosol ', 43, 985933655, '.jpg', 8),
('ggg', 55, 'KERRY EXPRESS', 'jirasin khamlap ', 50, 619276596, '.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(7) UNSIGNED ZEROFILL NOT NULL,
  `o_total` int(7) NOT NULL,
  `o_date` datetime NOT NULL,
  `ad_uid` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `o_total`, `o_date`, `ad_uid`) VALUES
(0000012, 4250, '2022-11-23 10:55:18', 0),
(0000013, 4255, '2022-11-23 12:00:02', 0),
(0000014, 5590, '2022-11-23 13:07:01', 0),
(0000015, 5590, '2022-11-23 13:07:17', 0),
(0000016, 3070, '2023-03-26 15:46:44', 0),
(0000017, 4360, '2023-03-26 15:56:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `od_id` int(6) NOT NULL,
  `o_id` int(7) UNSIGNED ZEROFILL NOT NULL,
  `pid` int(7) NOT NULL,
  `item` int(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`od_id`, `o_id`, `pid`, `item`) VALUES
(1, 0000001, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(4) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_detail` text NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_picture` varchar(200) NOT NULL,
  `p_type` int(11) NOT NULL,
  `p_ext` varchar(256) CHARACTER SET tis620 COLLATE tis620_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_detail`, `p_price`, `p_picture`, `p_type`, `p_ext`) VALUES
(39, 'MY HERO ACADEMIA  SUPER MASTER STARS PIECE THE ALL MIGHT THE BRUSH ', 'Character : ALL MIGHTความสูงจากฐานถึงบนสุด 17 ซม.ผลิตโดย BANPRESTOของแท้นำเข้าจากญี่ปุ่น100% GENUINE JAPAN', 890, '39.jpg', 2, ''),
(18, 'Taito Figure - Jujutsu Kaisen Yuji Itadori Vol. 2', 'Jujutsu Kaisen : มหาเวทย์ผนึกมารCharacter : Yuji Itadoriความสูงจากฐานถึงบนสุด 15 ซม.ผลิตโดย Taitoของแท้นำเข้าจากญี่ปุ่น100% GENUINE JAPAN', 620, '18.jpg', 1, ''),
(19, 'Jujutsu Kaisen Gojo Satoru Vol.1ฟิกเกอร์ มหาเวทย์ผนึกมาร โกโจ', 'Jujutsu Kaisen : มหาเวทย์ผนึกมาร\r\nCharacter : Gojo Satoru\r\nความสูงจากฐานถึงบนสุด 15 ซม.\r\nผลิตโดย Taito\r\nของแท้นำเข้าจากญี่ปุ่น\r\n100% GENUINE JAPAN', 690, '19.jpg', 1, ''),
(20, ' Jujutsu Kaisen : มหาเวทย์ผนึกมาร Character : Sukuna ', 'Jujutsu Kaisen : มหาเวทย์ผนึกมารCharacter : Sukunaความสูงจากฐานถึงบนสุด 15 ซม.ผลิตโดย Taitoของแท้นำเข้าจากญี่ปุ่น100% GENUINE JAPAN', 690, '20.jpg', 1, ''),
(21, 'Jujutsu Kaisen Sukuna Vol.2ฟิกเกอร์ มหาเวทย์ผนึกมาร สุคูนะ', 'Jujutsu Kaisen : มหาเวทย์ผนึกมาร\r\nCharacter : Sukuna2\r\nความสูงจากฐานถึงบนสุด 15 ซม.\r\nผลิตโดย Taito\r\nของแท้นำเข้าจากญี่ปุ่น\r\n100% GENUINE JAPAN', 690, '21.jpg', 1, ''),
(38, 'MY HERO ACADEMIA BANPRESTO CHRONICLE FIGURE ACADEMY VOL.5 HIMIKO TOGA ', 'Character : HIMIKO TOGAความสูงจากฐานถึงบนสุด 15 ซม.ผลิตโดย BANPRESTOของแท้นำเข้าจากญี่ปุ่น100% GENUINE JAPAN', 890, '38.jpg', 2, ''),
(37, 'MY HERO ACADEMIA BANPRESTO CHRONICLE FIGURE ACADEMY VOL.4 TOMURA SHIGARAKI ', 'Character : TOMURA SHIGARAKIความสูงจากฐานถึงบนสุด 15 ซม.ผลิตโดย BANPRESTOของแท้นำเข้าจากญี่ปุ่น100% GENUINE JAPAN', 890, '37.jpg', 4, ''),
(36, 'MODELING ACADEMY SUPER MASTER STARS PIECE THE SHOTO TODOROKI TWO DIMENSIONS ', 'MY HERO ACADEMIA : มายฮีโร่ อาคาเดมี่Character : SHOTO TODOROKI TWOความสูงจากฐานถึงบนสุด 18 ซม.ผลิตโดย BANPRESTOของแท้นำเข้าจากญี่ปุ่น100% GENUINE JAPAN', 990, '36.jpg', 2, ''),
(35, 'MY HERO ACADEMIA WORLD FIGURE COLOSSEUM MODELING ACADEMY SUPER MASTER STARS PIECE', 'MY HERO ACADEMIA : มายฮีโร่ อาคาเดมี่Character : KATSUKI BAKUGOความสูงจากฐานถึงบนสุด 15 ซม.ผลิตโดย BANPRESTOของแท้นำเข้าจากญี่ปุ่น100% GENUINE JAPAN', 690, '35.jpg', 2, ''),
(34, 'MY HERO ACADEMIA BANPRESTO FIGURE COLOSSEUM VOL. 1 MIDORIYA IZUKU ', 'MY HERO ACADEMIA : มายฮีโร่ อาคาเดมี่Character : MIDORIYA IZUKUความสูงจากฐานถึงบนสุด 15 ซม.ผลิตโดย BANPRESTOของแท้นำเข้าจากญี่ปุ่น100% GENUINE JAPAN', 890, '34.jpg', 2, ''),
(33, 'MY HERO ACADEMIA BANPRESTO FIGURE COLOSSEUM VOL. 7 KATSUKI BAKUGO ', 'MY HERO ACADEMIA : มายฮีโร่ อาคาเดมี่Character : KATSUKI BAKUGOความสูงจากฐานถึงบนสุด 18 ซม.ผลิตโดย BANPRESTOของแท้นำเข้าจากญี่ปุ่น100% GENUINE JAPAN', 890, '33.jpg', 2, ''),
(32, 'MY HERO ACADEMIA BANPRESTO FIGURE COLOSSEUM VOL. 3 SHOTO TODOROKI ', 'MY HERO ACADEMIA : มายฮีโร่ อาคาเดมี่Character : SHOTO TODOROKIความสูงจากฐานถึงบนสุด 18 ซม.ผลิตโดย BANPRESTOของแท้นำเข้าจากญี่ปุ่น100% GENUINE JAPAN', 890, '32.jpg', 2, ''),
(31, 'MY HERO ACADEMIA BANPRESTO FIGURE COLOSSEUM VOL. 2 DABI ', 'MY HERO ACADEMIA : มายฮีโร่ อาคาเดมี่Character : DABIความสูงจากฐานถึงบนสุด 15 ซม.ผลิตโดย BANPRESTOของแท้นำเข้าจากญี่ปุ่น100% GENUINE JAPAN', 890, '31.jpg', 2, ''),
(29, 'KOTOBUKIYA ARTFX J JUJUTSU KAISEN 0 YUTA OKKOTSU STATUE', 'Jujutsu Kaisen : มหาเวทย์ผนึกมาร Character : YUTA OKKOTSU STATUE ความสูงจากฐานถึงบนสุด 15 ซม. ผลิตโดย KOTOBUKIY ของแท้นำเข้าจากญี่ปุ่น 100% GENUINE JAPAN', 890, '29.jpg', 4, ''),
(28, 'KOTOBUKIYA ARTFX J JUJUTSU KAISEN PANDA ', 'Jujutsu Kaisen : มหาเวทย์ผนึกมารCharacter : PANDA STATUE WITH BONUSความสูงจากฐานถึงบนสุด 15 ซม.ผลิตโดย KOTOBUKIYA ของแท้นำเข้าจากญี่ปุ่น100% GENUINE JAPAN', 890, '28.jpg', 1, ''),
(27, 'BANPRESTO JUJUTSU KAISEN TOGE INUMAKI FIGURE (NAVY)', 'Jujutsu Kaisen : มหาเวทย์ผนึกมารCharacter : TOGE INUMAKIความสูงจากฐานถึงบนสุด 15 ซม.ผลิตโดย BANPRESTOของแท้นำเข้าจากญี่ปุ่น100% GENUINE JAPAN', 690, '27.jpg', 1, ''),
(22, 'JUJUTSU KAISEN – Combination Battle – Aoi Todo Vol.2', 'Jujutsu Kaisen : มหาเวทย์ผนึกมารCharacter : Aoi Todoความสูงจากฐานถึงบนสุด 15 ซม.ผลิตโดย Taitoของแท้นำเข้าจากญี่ปุ่น100% GENUINE JAPAN', 650, '22.jpg', 1, ''),
(30, 'KOTOBUKIYA ARTFX J JUJUTSU KAISEN 0 SATORU GOJO ', 'Jujutsu Kaisen : มหาเวทย์ผนึกมารCharacter : GOJO STATUEความสูงจากฐานถึงบนสุด 15 ซม.ผลิตโดย KOTOBUKIYAของแท้นำเข้าจากญี่ปุ่น100% GENUINE JAPAN', 890, '30.jpg', 1, ''),
(23, 'Jujutsu Kaisen Mahito Jukon No Kata Statue Vol.2', 'Jujutsu Kaisen : มหาเวทย์ผนึกมารCharacter : Jukon No Kataความสูงจากฐานถึงบนสุด 15 ซม.ผลิตโดย Taitoของแท้นำเข้าจากญี่ปุ่น100% GENUINE JAPAN', 650, '23.jpg', 1, ''),
(24, 'JUJUTSU KAISEN NANAMI KENTO PRIZE FIGURE (GRAY) Vol.2', 'Jujutsu Kaisen : มหาเวทย์ผนึกมารCharacter : NANAMI KENTOความสูงจากฐานถึงบนสุด 15 ซม.ผลิตโดย Taitoของแท้นำเข้าจากญี่ปุ่น100% GENUINE JAPAN', 690, '24.jpg', 1, ''),
(25, 'KOTOBUKIYA ARTFX J JUJUTSU KAISEN 0 SUGURU GETO STATUE (NAVY)', 'Jujutsu Kaisen : มหาเวทย์ผนึกมารCharacter : SUGURU GETO ความสูงจากฐานถึงบนสุด 15 ซม.ผลิตโดย KOTOBUKIYAของแท้นำเข้าจากญี่ปุ่น100% GENUINE JAPAN', 690, '25.jpg', 4, ''),
(26, 'KOTOBUKIYA ARTFX J MEGUMI FUSHIGURO STATUE WITH BONUS FACE PART (NAVY)', 'Jujutsu Kaisen : มหาเวทย์ผนึกมารCharacter : MEGUMIความสูงจากฐานถึงบนสุด 15 ซม.ผลิตโดย KOTOBUKIYAของแท้นำเข้าจากญี่ปุ่น100% GENUINE JAPAN', 1290, '26.jpg', 4, ''),
(41, 'MY HERO ACADEMIA AGE OF HEROES RED RIOT EIJIRO KIRISHIMA ', 'MY HERO ACADEMIA : มายฮีโร่ อาคาเดมี่Character : RED RIOT EIJIRO KIRISHIMAความสูงจากฐานถึงบนสุด 15 ซม.ผลิตโดย BANPRESTOของแท้นำเข้าจากญี่ปุ่น100% GENUINE JAPAN', 690, '41.jpg', 2, ''),
(51, 'Nendoroid Houkai  3rd ', 'Nendoroid Houkai 3rd Mei Raiden Lightning Empress Ver.', 1850, '51.jpg', 3, ''),
(52, 'Nendoroid Doll Fate/Apocrypha  Rider', 'Nendoroid Doll Fate/Apocrypha Rider of "Black" Casual Ver.', 1990, '52.jpg', 3, ''),
(53, 'Nendoroid Doll Fate/Apocrypha Saber', 'Nendoroid Doll Fate/Apocrypha Saber of "Red" Casual Ver.', 1990, '53.jpg', 3, ''),
(56, 'Nendoroid Sewayaki Kitsune ', 'Nendoroid Sewayaki Kitsune no Senko-san Senko', 1590, '56.jpg', 3, ''),
(54, 'Nendoroid In/Spectre Kotok', 'Nendoroid In/Spectre Kotoko Iwanaga', 1590, '54.jpg', 3, ''),
(55, 'Nendoroid The Quintessential', 'Nendoroid The Quintessential Quintuplets Miku Nakano', 1490, '55.jpg', 3, ''),
(57, 'Nendoroid Hypnosis Mic', 'Nendoroid Hypnosis Mic -Division Rap Battle- Gentaro Yumeno', 1890, '57.jpg', 3, ''),
(58, 'Nendoroid DEVIL MAY CRY', 'Nendoroid DEVIL MAY CRY 5 Dante DMC5 Ver.', 1890, '58.jpg', 3, ''),
(59, 'Nendoroid Death Note ', 'Nendoroid Death Note L 2.0', 1690, '59.jpg', 3, ''),
(60, 'Dead By Daylight The Trapper', 'Nendoroid Dead By Daylight The Trapper (100mm)', 1690, '60.jpg', 3, ''),
(63, 'gg', 'ggg', 555, 'it certificate2.png', 3, '.');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `pt_id` int(8) NOT NULL,
  `pt_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`pt_id`, `pt_name`) VALUES
(1, 'Jujutsu_kaisen'),
(2, 'My Hero Academia'),
(3, 'Nendoroid'),
(4, 'Bestseller');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `urole` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `first_name`, `last_name`, `email`, `pass`, `phone`, `urole`) VALUES
(1, 'admin', 'admin', 'na', 'chokanan221@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0640600183', 'admin'),
(2, 'boat', 'supakhon', 'chawsoun', '63010912516@msu.ac.th', 'e10adc3949ba59abbe56e057f20f883e', '0619568766', 'user'),
(5, 'dew', 'jirasin', 'khamlap', 'Khamlap789@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0619276596', 'user'),
(8, 'pond', 'thanachot', 'sittisirikosol', '63010912510@msu.ac.th', 'e10adc3949ba59abbe56e057f20f883e', '0985933655', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`od_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`pt_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `ad_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `od_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
