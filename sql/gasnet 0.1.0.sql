-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2018 at 04:41 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gasnet`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `IDinventaris` int(11) NOT NULL,
  `kodeBarang` varchar(20) NOT NULL,
  `jenisAset` varchar(100) NOT NULL,
  `namaBarang` varchar(100) DEFAULT NULL,
  `noInventaris` varchar(20) DEFAULT NULL,
  `harga` int(30) NOT NULL DEFAULT '0',
  `merk` varchar(100) NOT NULL,
  `bahan` varchar(100) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan` int(11) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `noMesin` varchar(255) DEFAULT NULL,
  `fileImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`IDinventaris`, `kodeBarang`, `jenisAset`, `namaBarang`, `noInventaris`, `harga`, `merk`, `bahan`, `tahun`, `bulan`, `lokasi`, `noMesin`, `fileImage`) VALUES
(1, '-', 'Peralatan Penunjang Operasi', 'Adapter ', '-/1/II/2016', 629000, 'VGA Adapter MAC ', 'Elektro', 2016, 2, '-', '-', ''),
(2, 'C02', 'Peralatan Penunjang Operasi', 'Projector', 'C02/001/XI/2016', 4100000, 'LG PV150G', 'Elektro', 2016, 11, NULL, '-', NULL),
(3, 'C02', 'Peralatan Penunjang Operasi', 'Projector', 'C02/002/XI/2016', 5200000, 'LG Minibeam PH300', 'Elektro', 2016, 11, NULL, '-', NULL),
(4, '-', 'Peralatan Penunjang Operasi', 'Adapter ', '-/4/II/2016', 250000, 'Converter HDMI ', 'Elektro', 2016, 2, '-', '-', ''),
(5, 'C10', 'Peralatan Penunjang Operasi', 'Router', 'C10/002/XI/2016', 17000000, 'Mikrobits Ainos ', 'Elektro', 2016, 11, NULL, '-', NULL),
(6, 'C10', 'Peralatan Penunjang Operasi', 'Router', 'C10/003/XI/2016', 17000000, 'Mikrobits Ainos ', 'Elektro', 2016, 11, NULL, '-', NULL),
(7, 'C10', 'Peralatan Penunjang Operasi', 'Router', 'C10/004/XI/2016', 17000000, 'Mikrobits Ainos ', 'Elektro', 2016, 11, NULL, '-', NULL),
(8, 'C10', 'Peralatan Penunjang Operasi', 'Router', 'C10/005/XI/2016', 17000000, 'Mikrobits Ainos ', 'Elektro', 2016, 11, NULL, '-', NULL),
(9, 'C10', 'Peralatan Penunjang Operasi', 'Router', 'C10/006/XI/2016', 17000000, 'Mikrobits Ainos ', 'Elektro', 2016, 11, NULL, '-', NULL),
(10, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/001/XI/2016', 2000000, 'Lynksys Wireless N300 With PoE', 'Elektro', 2016, 11, NULL, '-', NULL),
(11, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/002/XI/2016', 2000000, 'Lynksys Wireless N300 With PoE', 'Elektro', 2016, 11, NULL, '-', NULL),
(12, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/003/XI/2016', 2000000, 'Lynksys Wireless N300 With PoE', 'Elektro', 2016, 11, NULL, '-', NULL),
(13, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/004/XI/2016', 2000000, 'Lynksys Wireless N300 With PoE', 'Elektro', 2016, 11, NULL, '-', NULL),
(14, 'C12', 'Peralatan Penunjang Operasi', 'Wireless Router', 'C12/005/XI/2016', 950000, 'Lynksys E2500 N600 Dual Band ', 'Elektro', 2016, 11, NULL, '-', NULL),
(15, 'C12', 'Peralatan Penunjang Operasi', 'Wireless Router', 'C12/006/XI/2016', 950000, 'Lynksys E2500 N600 Dual Band ', 'Elektro', 2016, 11, NULL, '-', NULL),
(16, 'C12', 'Peralatan Penunjang Operasi', 'Wireless Router', 'C12/007/XI/2016', 950000, 'Lynksys E2500 N600 Dual Band ', 'Elektro', 2016, 11, NULL, '-', NULL),
(17, 'C12', 'Peralatan Penunjang Operasi', 'Wireless Router', 'C12/008/XI/2016', 950000, 'Lynksys E2500 N600 Dual Band ', 'Elektro', 2016, 11, NULL, '-', NULL),
(18, 'C12', 'Peralatan Penunjang Operasi', 'Wireless Router', 'C12/009/XI/2016', 950000, 'Lynksys E2500 N600 Dual Band ', 'Elektro', 2016, 11, NULL, '-', NULL),
(19, 'C12', 'Peralatan Penunjang Operasi', 'Wireless Router', 'C12/010/XI/2016', 950000, 'Lynksys E2500 N600 Dual Band ', 'Elektro', 2016, 11, NULL, '-', NULL),
(20, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/011/III/2017', 1080000, 'Lynksys E2500 N600 Dual Band ', 'Elektro', 2017, 3, NULL, '-', NULL),
(21, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/012/III/2017', 1080000, 'Lynksys E2500 N600 Dual Band ', 'Elektro', 2017, 3, NULL, '-', NULL),
(22, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/013/III/2017', 1080000, 'Lynksys E2500 N600 Dual Band ', 'Elektro', 2017, 3, NULL, '-', NULL),
(23, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/014/III/2017', 1080000, 'Lynksys E2500 N600 Dual Band ', 'Elektro', 2017, 3, NULL, '-', NULL),
(24, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/015/III/2017', 1080000, 'Lynksys E2500 N600 Dual Band ', 'Elektro', 2017, 3, NULL, '-', NULL),
(25, 'C16', 'Peralatan Penunjang Operasi', 'Wireless Router', 'C16/001/VII/2017', 650000, 'TP Link AC 750 Wireless Dual Band', 'Elektro', 2017, 7, NULL, 'SN:2172459003897', NULL),
(26, 'C16', 'Peralatan Penunjang Operasi', 'Wireless Router', 'C16/002/VII/2017', 650000, 'TP Link AC 750 Wireless Dual Band', 'Elektro', 2017, 7, NULL, 'SN:2171579009924', NULL),
(27, 'C16', 'Peralatan Penunjang Operasi', 'Wireless Router', 'C16/003/VII/2017', 650000, 'TP Link AC 750 Wireless Dual Band', 'Elektro', 2017, 7, NULL, 'SN:2172459003889', NULL),
(28, 'C16', 'Peralatan Penunjang Operasi', 'Wireless Router', 'C16/004/VII/2017', 650000, 'TP Link AC 750 Wireless Dual Band', 'Elektro', 2017, 7, NULL, 'SN:214C316000199', NULL),
(29, 'C16', 'Peralatan Penunjang Operasi', 'Wireless Router', 'C16/005/VII/2017', 650000, 'TP Link AC 750 Wireless Dual Band', 'Elektro', 2017, 7, NULL, 'SN:2172459003898', NULL),
(30, 'C17', 'Peralatan Penunjang Operasi', 'Switch', 'C17/001/VIII/2017', 6521900, 'HPE 1920 8G POE (180W) SWITCH ', 'Elektro', 2017, 8, NULL, 'SN : CN69GP20NJ', NULL),
(31, 'C10', 'Peralatan Penunjang Operasi', 'Router', 'C10/007/VIII/2017', 4366840, 'Mikrotik RB 1100', 'Elektro', 2017, 8, NULL, 'SN : 719606CE778A', NULL),
(32, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/016/IX/2017', 2299000, 'Ubiquiti Unifi AP AC PRO', 'Elektro', 2017, 9, NULL, 'SN : 1702KF09FC276023F', NULL),
(33, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/017/IX/2017', 2299000, 'Ubiquiti Unifi AP AC PRO', 'Elektro', 2017, 9, NULL, 'SN : 1702KF09FC2760768', NULL),
(34, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/018/IX/2017', 2299000, 'Ubiquiti Unifi AP AC PRO', 'Elektro', 2017, 9, NULL, 'SN : 1702KF09FC276122C', NULL),
(35, 'C17', 'Peralatan Penunjang Operasi', 'Switch', 'C17/002/IX/2017', 5413160, 'HP 1920-8G PoE Managable Switch', 'Elektro', 2017, 9, NULL, '', NULL),
(36, 'C17', 'Peralatan Penunjang Operasi', 'Switch', 'C17/003/IX/2017', 1990168, 'HP 1420-24G 24 Port Gigabit', 'Elektro', 2017, 9, NULL, '', NULL),
(37, 'C10', 'Peralatan Penunjang Operasi', 'Router', 'C10/008/IX/2017', 1524162, 'Mikrotik RB2011 UiAS', 'Elektro', 2017, 9, NULL, '', NULL),
(38, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/019/IX/2017', 1627041, 'AP Ubiquity AC LR ', 'Elektro', 2017, 9, NULL, '', NULL),
(39, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/020/IX/2017', 1627041, 'AP Ubiquity AC LR ', 'Elektro', 2017, 9, NULL, '', NULL),
(40, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/021/IX/2017', 1627041, 'AP Ubiquity AC LR ', 'Elektro', 2017, 9, NULL, '', NULL),
(41, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/022/IX/2017', 1627041, 'AP Ubiquity AC LR ', 'Elektro', 2017, 9, NULL, '', NULL),
(42, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/023/IX/2018', 1450000, 'Ubiquiti Unifi AC Mesh Uap-Ac-M', 'Elektro', 2017, 9, NULL, '', NULL),
(43, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/024/IX/2018', 1450000, 'Ubiquiti Unifi AC Mesh Uap-Ac-M', 'Elektro', 2017, 9, NULL, '', NULL),
(44, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/025/IX/2019', 1450000, 'Ubiquiti Unifi AC Mesh Uap-Ac-M', 'Elektro', 2017, 9, NULL, '', NULL),
(45, 'C10', 'Peralatan Penunjang Operasi', 'Router', 'C10/009/IX/2017', 1540000, 'Router Mikrotik RB450G', 'Elektro', 2017, 9, NULL, '', NULL),
(46, 'C10', 'Peralatan Penunjang Operasi', 'Router', 'C10/010/III/2018', 5520000, 'Mikrotik Router Board CCR100-7G-1C-PC', 'Elektro', 2018, 3, NULL, '', NULL),
(47, 'C10', 'Peralatan Penunjang Operasi', 'Router', 'C10/011/III/2018', 1650000, 'Mikrotik Router RB 2011 UiAS-2HnD-IN', 'Elektro', 2018, 3, NULL, '', NULL),
(48, 'C17', 'Peralatan Penunjang Operasi', 'Switch', 'C17/004/III/2018', 2250000, 'Mananged Switch HP 191024', 'Elektro', 2018, 3, NULL, '', NULL),
(49, 'C10', 'Peralatan Penunjang Operasi', 'Switch', 'C17/005/III/2018', 420000, 'Cisco SF 95D-08-AS', 'Elektro', 2018, 3, NULL, '', NULL),
(50, 'C10', 'Peralatan Penunjang Operasi', 'Switch', 'C17/006/III/2018', 420000, 'Cisco SF 95D-08-AS', 'Elektro', 2018, 3, NULL, '', NULL),
(51, 'C17', 'Peralatan Penunjang Operasi', 'Switch', 'C17/007/III/2018', 420000, 'Cisco SF 95D-08-AS', 'Elektro', 2018, 3, NULL, '', NULL),
(52, 'C17', 'Peralatan Penunjang Operasi', 'Switch', 'C17/008/III/2018', 420000, 'Cisco SF 95D-08-AS', 'Elektro', 2018, 3, NULL, '', NULL),
(53, 'C17', 'Peralatan Penunjang Operasi', 'Switch', 'C17/009/III/2018', 420000, 'Cisco SF 95D-08-AS', 'Elektro', 2018, 3, NULL, '', NULL),
(54, 'C17', 'Peralatan Penunjang Operasi', 'Switch', 'C17/010/III/2018', 420000, 'Cisco SF 95D-08-AS', 'Elektro', 2018, 3, NULL, '', NULL),
(55, 'C17', 'Peralatan Penunjang Operasi', 'Switch', 'C17/011/III/2018', 420000, 'Cisco SF 95D-08-AS', 'Elektro', 2018, 3, NULL, '', NULL),
(56, 'C17', 'Peralatan Penunjang Operasi', 'Switch', 'C17/012/III/2018', 420000, 'Cisco SF 95D-08-AS', 'Elektro', 2018, 3, NULL, '', NULL),
(57, 'C17', 'Peralatan Penunjang Operasi', 'Switch', 'C17/013/III/2018', 420000, 'Cisco SF 95D-08-AS', 'Elektro', 2018, 3, NULL, '', NULL),
(58, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/026/III/2018', 410000, 'AP TP Link WR 841 HP', 'Elektro', 2018, 3, NULL, '', NULL),
(59, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/027/III/2018', 410000, 'AP TP Link WR 841 HP', 'Elektro', 2018, 3, NULL, '', NULL),
(60, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/028/III/2018', 410000, 'AP TP Link WR 841 HP', 'Elektro', 2018, 3, NULL, '', NULL),
(61, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/029/III/2018', 410000, 'AP TP Link WR 841 HP', 'Elektro', 2018, 3, NULL, '', NULL),
(62, 'C17', 'Peralatan Penunjang Operasi', 'Switch', 'C17/014/III/2018', 420000, 'Cisco SF 95D-08-AS', 'Elektro', 2018, 3, NULL, '', NULL),
(63, 'C17', 'Peralatan Penunjang Operasi', 'Switch', 'C17/015/III/2018', 420000, 'Cisco SF 95D-08-AS', 'Elektro', 2018, 3, NULL, '', NULL),
(64, 'C17', 'Peralatan Penunjang Operasi', 'Switch', 'C17/016/III/2018', 420000, 'Cisco SF 95D-08-AS', 'Elektro', 2018, 3, NULL, '', NULL),
(65, 'C17', 'Peralatan Penunjang Operasi', 'Switch', 'C17/017/III/2018', 420000, 'Cisco SF 95D-08-AS', 'Elektro', 2018, 3, NULL, '', NULL),
(66, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/030/III/2018', 430000, 'AP TP Link WR 841 HP', 'Elektro', 2018, 3, NULL, '', NULL),
(67, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/031/III/2018', 430000, 'AP TP Link WR 841 HP', 'Elektro', 2018, 3, NULL, '', NULL),
(68, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/032/III/2018', 430000, 'AP TP Link WR 841 HP', 'Elektro', 2018, 3, NULL, '', NULL),
(69, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/033/III/2018', 430000, 'AP TP Link WR 841 HP', 'Elektro', 2018, 3, NULL, '', NULL),
(70, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/034/III/2018', 430000, 'AP TP Link WR 841 HP', 'Elektro', 2018, 3, NULL, '', NULL),
(71, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/035/III/2018', 430000, 'AP TP Link WR 841 HP', 'Elektro', 2018, 3, NULL, '', NULL),
(72, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/036/III/2018', 430000, 'AP TP Link WR 841 HP', 'Elektro', 2018, 3, NULL, '', NULL),
(73, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/037/III/2018', 430000, 'AP TP Link WR 841 HP', 'Elektro', 2018, 3, NULL, '', NULL),
(74, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/038/III/2018', 430000, 'AP TP Link WR 841 HP', 'Elektro', 2018, 3, NULL, '', NULL),
(75, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/039/IV/2018', 1770000, 'AP Ubiquity AC LR ', 'Elektro', 2018, 4, NULL, 'SN  : 788A20DC51D4', NULL),
(76, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/040/IV/2018', 860000, 'Linksys E 2500 N600', 'Elektro', 2018, 4, NULL, 'SN : 10A30C6C600094', NULL),
(77, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/041/IV/2018', 860000, 'Linksys E 2500 N600', 'Elektro', 2018, 4, NULL, 'SN : 10A30C6C600030', NULL),
(78, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/042/IV/2018', 860000, 'Linksys E 2500 N600', 'Elektro', 2018, 4, NULL, 'SN : 10A30C6C600112', NULL),
(79, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/043/IV/2018', 860000, 'Linksys E 2500 N600', 'Elektro', 2018, 4, NULL, 'SN : 10A30C6C600088', NULL),
(80, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/044/IV/2018', 860000, 'Linksys E 2500 N600', 'Elektro', 2018, 4, NULL, 'SN : 10A30C68509538', NULL),
(81, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/045/V/2018', 0, 'AP Ubiquity Nanostation m2', 'Elektro', 2018, 5, NULL, 'SN : 788A2068D8FF', NULL),
(82, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/046/V/2018', 0, 'AP Ubiquity Nanostation m2', 'Elektro', 2018, 5, NULL, 'SN : 788A2068CB0D', NULL),
(83, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/047/V/2018', 0, 'AP Ubiquity Nanostation m2', 'Elektro', 2018, 5, NULL, 'SN : 788A2068C854', NULL),
(84, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/048/V/2018', 0, 'AP Ubiquity Nanostation m2', 'Elektro', 2018, 5, NULL, 'SN : 788A2068D945', NULL),
(85, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/049/V/2018', 0, 'AP Ubiquity Nanostation m2', 'Elektro', 2018, 5, NULL, 'SN : 788A2068D650', NULL),
(86, 'C17', 'Peralatan Penunjang Operasi', 'Switch', 'C17/018/V/2018', 0, 'Switch Wireless Outdoor RB800', 'Elektro', 2018, 5, NULL, 'SN : 667F07EAB01A/724', NULL),
(87, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/050/IV/2018', 860000, 'Linksys E 2500 N600', 'Elektro', 2018, 4, NULL, 'SN : 10A30C6C600106', NULL),
(88, 'C17', 'Peralatan Penunjang Operasi', 'Switch', 'C17/019/V/2018', 0, 'Ubiquity Tough Switch PoE Pro ', 'Elektro', 2018, 5, NULL, 'SN : 788A200EB70F', NULL),
(89, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/051/V/2018', 860000, 'Ubiquity Unifi AC Mesh Pro', 'Elektro', 2018, 5, NULL, 'SN : 788A2023A84D', NULL),
(90, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/052/V/2018', 1507000, 'AP Ubiquity AC LR ', 'Elektro', 2018, 5, NULL, 'SN  : FCECDA190DA6', NULL),
(91, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/053/V/2018', 1507000, 'AP Ubiquity AC LR ', 'Elektro', 2018, 5, NULL, 'SN  : FCECDA190DAE', NULL),
(92, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/054/V/2018', 1507000, 'AP Ubiquity AC LR ', 'Elektro', 2018, 5, NULL, 'SN  : FCECDA190514', NULL),
(93, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/055/V/2018', 1507000, 'AP Ubiquity AC LR ', 'Elektro', 2018, 5, NULL, 'SN  : FCECDA190F97', NULL),
(94, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/056/V/2018', 1507000, 'AP Ubiquity AC LR ', 'Elektro', 2018, 5, NULL, 'SN  : FCECDA1905E3', NULL),
(95, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/057/V/2018', 1507000, 'AP Ubiquity AC LR ', 'Elektro', 2018, 5, NULL, 'SN  : FCECDA190483', NULL),
(96, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/058/V/2018', 1507000, 'AP Ubiquity AC LR ', 'Elektro', 2018, 5, NULL, 'SN  : FCECDA1905EF', NULL),
(97, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/059/V/2018', 1507000, 'AP Ubiquity AC LR ', 'Elektro', 2018, 5, NULL, 'SN  : FCECDA1CC6B3', NULL),
(98, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/060/V/2018', 1507000, 'AP Ubiquity AC LR ', 'Elektro', 2018, 5, NULL, 'SN  : FCECDA190519', NULL),
(99, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/061/V/2018', 1507000, 'AP Ubiquity AC LR ', 'Elektro', 2018, 5, NULL, 'SN  : FCECDA1905E1', NULL),
(100, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/062/V/2018', 1507000, 'AP Ubiquity AC LR ', 'Elektro', 2018, 5, NULL, 'SN  : FCECDA190EAE', NULL),
(101, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/063/V/2018', 1507000, 'AP Ubiquity AC LR ', 'Elektro', 2018, 5, NULL, 'SN  : FCECDA190439', NULL),
(102, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/064/V/2018', 1507000, 'AP Ubiquity AC LR ', 'Elektro', 2018, 5, NULL, 'SN  : FCECDA190613', NULL),
(103, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/065/V/2018', 1507000, 'AP Ubiquity AC LR ', 'Elektro', 2018, 5, NULL, 'SN  : FCECDA13F689', NULL),
(104, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/066/V/2018', 1507000, 'AP Ubiquity AC LR ', 'Elektro', 2018, 5, NULL, 'SN  : FCECDA19020C', NULL),
(105, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/067/VII/2018', 0, 'AP TP Link WR 841 HP', 'Elektro', 2018, 7, NULL, 'SN : 217863003120', NULL),
(106, 'C10', 'Peralatan Penunjang Operasi', 'Router', 'C10/012/VII/2018', 0, 'Router Mikrotik RB921UAGS-5SHPacD-NM', 'Elektro', 2018, 7, NULL, 'SN : 808D33FD1/809/r2', NULL),
(107, 'C10', 'Peralatan Penunjang Operasi', 'Router', 'C10/013/VII/2018', 0, 'Router Mikrotik RB921UAGS-5SHPacD-NM', 'Elektro', 2018, 7, NULL, 'SN : 8CE808E1D284/809/r2', NULL),
(108, 'C10', 'Peralatan Penunjang Operasi', 'Router', 'C10/014/VII/2018', 0, 'Cloud Router Switch CRS112-8G-4S-IN', 'Elektro', 2018, 7, NULL, 'SN ; 84C707084F9A/742/r2', NULL),
(109, 'C10', 'Peralatan Penunjang Operasi', 'Router', 'C10/015/VII/2018', 0, 'Router Mikrotik RB951G-2HnD', 'Elektro', 2018, 7, NULL, 'SN : 8451072FD17B/737/r2', NULL),
(110, 'C17', 'Peralatan Penunjang Operasi', 'Switch', 'C17/019/VII/2018', 1400000, 'Switch Managed NETGEAR Prosafe Gigabit Smart GS108T', 'Elektro', 2018, 7, NULL, 'SN : 29SF545B001FC', NULL),
(111, 'C10', 'Peralatan Penunjang Operasi', 'Router', 'C10/016/VII/2018', 285000, 'Mikrotik Router RB 941-2nD-TC', 'Elektro', 2018, 7, NULL, 'SN : 8CE508E2CB27/811/r2', NULL),
(112, 'C12', 'Peralatan Penunjang Operasi', 'Akses Point ', 'C12/066/V/2018', 1507000, 'AP Ubiquity AC LR ', 'Elektro', 2018, 5, NULL, 'SN  : FCECDA19020C', NULL),
(113, 'C10', 'Peralatan Penunjang Operasi', 'Router', 'C10/017/VII/2018', 315000, 'Mikrotik Router RB 941-2nD-TC', 'Elektro', 2018, 7, NULL, 'SN : 8B0E080288E9/810/r2', NULL),
(128, 'C08', 'Alat-alat Lainnya', 'Termos ', 'C08/128/XI/2016', 340000, 'Black Decker Kettle ', 'Elektro', 2016, 11, 'Kantor Pusat Gasnet', '-', ''),
(129, 'C05', 'Alat-alat Lainnya', 'Dispenser ', 'C05/001/XI/2016', 340000, 'Dispenser Hot & Cold ', 'Elektro', 2016, 11, 'Kantor Pusat Gasnet', '-', NULL),
(130, 'C05', 'Alat-alat Lainnya', 'Dispenser ', 'C05/002/XI/2016', 340000, 'Dispenser Hot & Cold ', 'Elektro', 2016, 11, 'Kantor Pusat Gasnet', '-', NULL),
(131, 'C03', 'Alat-alat Lainnya', 'Televisi ', 'C03/001/XI/2016', 340000, 'Panasonic TH-40DS500G', 'Elektro', 2016, 11, 'Kantor Pusat Gasnet', '-', NULL),
(132, 'C11 ', 'Alat-alat Lainnya', 'Mesin Pengancur Kertas ', 'C11/001/XI/2016', 340000, 'Tori TPR-210', 'Elektro ', 2017, 11, 'Kantor Pusat Gasnet', '-', NULL),
(133, 'C18', 'Alat-alat Lainnya', 'Kulkas', 'C18/001/II/GA/2018', 340000, 'Panasonic Fridge', 'Elektro ', 2018, 2, 'Kantor Pusat Gasnet', '-', NULL),
(134, 'C19', 'Alat-alat Lainnya', 'Microwave', 'C19/001/II/GA/2018', 340000, 'Microwave Sharp', 'Elektro ', 2018, 2, 'Kantor Pusat Gasnet', '-', NULL),
(135, 'C20', 'Alat-alat Lainnya', 'Kompor Listrik', 'C20/001/II/GA/2018', 340000, 'Kompor Listrik Induction Cooker', 'Elektro ', 2018, 2, 'Kantor Pusat Gasnet', '-', NULL),
(136, 'C16', 'Alat-alat Lainnya', 'Mesin Absensi + Access Door', 'C16/001/III/GA/2017', 340000, 'Mesin Absensi Solution', 'Elektro ', 2017, 3, 'Kantor Pusat Gasnet', '-', NULL),
(137, 'C16', 'Alat-alat Lainnya', 'Mesin Acces Door', 'C16/002/III/GA/2017', 340000, 'Mesin Access Door Solution', 'Elektro ', 2018, 3, 'Kantor Pusat Gasnet', '-', NULL),
(138, 'C04', 'Alat-alat Lainnya', 'Telepon', 'C04/001/XI/GA/2016', 340000, 'Panasonic Corded Phone (KX-TS505) Black ', 'Elektro', 2016, 11, 'Kantor Pusat Gasnet', '-', NULL),
(139, 'C04', 'Alat-alat Lainnya', 'Telepon', 'C04/002/XI/GA/2016', 340000, 'Panasonic Corded Phone (KX-TS505) Black ', 'Elektro', 2016, 11, 'Kantor Pusat Gasnet', '-', NULL),
(140, 'C04', 'Alat-alat Lainnya', 'Telepon', 'C04/002/XI/GA/2016', 340000, 'Panasonic Corded Phone (KX-TS505) Black ', 'Elektro', 2017, 11, 'Kantor Pusat Gasnet', '-', NULL),
(141, 'C21', 'Alat-alat Lainnya', 'Mesin Tik Elektrik ', 'C21/001/II/GA/2018', 340000, 'Brother GX-6750', 'Elektro', 2018, 2, 'Kantor Pusat Gasnet', '-', NULL),
(142, 'C22', 'Alat-alat Lainnya', 'Printer ', 'C22/001/II/GA/2018', 340000, 'Epson L360', 'Elektro', 2018, 2, 'Kantor Pusat Gasnet', '-', NULL),
(143, 'C23', 'Alat-alat Lainnya', 'Hard Disk', 'C23/001/VII/2018', 340000, 'Seagate Back Up Slim 1TB', 'Elektro', 2018, 7, 'Kantor Pusat Gasnet', '-', NULL),
(144, 'C23', 'Alat-alat Lainnya', 'Hard Disk', 'C23/002/VII/2018', 340000, 'Epson L360', 'Elektro', 2018, 7, 'Kantor Pusat Gasnet', '-', NULL),
(145, 'C23', 'Alat-alat Lainnya', 'Hard Disk', 'C23/003/VII/2018', 340000, 'Epson L360', 'Elektro', 2018, 7, 'Kantor Pusat Gasnet', '-', NULL),
(159, 'ï»¿C01', 'Komputer', 'Laptop', 'C01/027/XI/2016', 15000000, ' MAC ', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(160, 'C01', 'Komputer', 'Laptop', 'C01/005/XI/2016', 8325000, 'HP 14 -AC001TX Silver ', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(161, 'C01', 'Komputer', 'Laptop', 'C01/014/XI/2016', 6150000, 'HP 14 -AC 181 TU ', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(162, 'C01', 'Komputer', 'Laptop', 'C01/001/XI/2016', 6150000, 'HP 14 -AC 181 TU ', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(163, 'C01', 'Komputer', 'Laptop', 'C01/026/XI/2016', 6150000, 'HP 14 -AC 181 TU ', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(164, 'C01', 'Komputer', 'Laptop', 'C01/002/XI/2016', 5400000, 'HP 14 -AC 181 TU ', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(165, 'C01', 'Komputer', 'Laptop', 'C01/003/XI/2016', 5400000, 'HP 14 -AC 181 TU ', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(166, 'C01', 'Komputer', 'Laptop', 'C01/007/XI/2016', 5400000, 'HP 14 -AC 181 TU ', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(167, 'C01', 'Komputer', 'Laptop', 'C01/010/XI/2016', 5400000, 'HP 14 -AC 181 TU ', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(168, 'C01', 'Komputer', 'Laptop', 'C01/009/XI/2016', 3200000, '\"Lenovo IP 300 38 ID 11.6\"\"\"', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(169, 'C01', 'Komputer', 'Laptop', 'C01/012/XI/2016', 3200000, '\"Lenovo IP 300 38 ID 11.6\"\"\"', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(170, 'C01', 'Komputer', 'Laptop', 'C01/013/XI/2016', 3200000, '\"Lenovo IP 300 38 ID 11.6\"\"\"', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(171, 'C01', 'Komputer', 'Laptop', 'C01/015/XI/2016', 3200000, '\"Lenovo IP 300 38 ID 11.6\"\"\"', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(172, 'C01', 'Komputer', 'Laptop', 'C01/016/XI/2016', 3200000, '\"Lenovo IP 300 38 ID 11.6\"\"\"', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(173, 'C01', 'Komputer', 'Laptop', 'C01/017/XI/2016', 3200000, '\"Lenovo IP 300 38 ID 11.6\"\"\"', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(174, 'C01', 'Komputer', 'Laptop', 'C01/018/XI/2016', 3200000, '\"Lenovo IP 300 38 ID 11.6\"\"\"', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(175, 'C01', 'Komputer', 'Laptop', 'C01/019/XI/2016', 3200000, '\"Lenovo IP 300 38 ID 11.6\"\"\"', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(176, 'C01', 'Komputer', 'Laptop', 'C01/020/XI/2016', 3200000, '\"Lenovo IP 300 38 ID 11.6\"\"\"', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(177, 'C01', 'Komputer', 'Laptop', 'C01/021/XI/2016', 3200000, '\"Lenovo IP 300 38 ID 11.6\"\"\"', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(178, 'C01', 'Komputer', 'Laptop', 'C01/022/XI/2016', 3200000, '\"Lenovo IP 300 38 ID 11.6\"\"\"', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(179, 'C01', 'Komputer', 'Laptop', 'C01/023/XI/2016', 3200000, '\"Lenovo IP 300 38 ID 11.6\"\"\"', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(180, 'C01', 'Komputer', 'Laptop', 'C01/024/XI/2016', 3200000, '\"Lenovo IP 300 38 ID 11.6\"\"\"', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(181, 'C01', 'Komputer', 'Laptop', 'C01/026/XI/2016', 3200000, '\"Lenovo IP 300 38 ID 11.6\"\"\"', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(182, 'C01', 'Komputer', 'Laptop', 'C01/004/XI/2016', 5150000, '\"HP 240 G3 14\"\"\"', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(183, 'C01', 'Komputer', 'Laptop', 'C01/006/XI/2016', 5150000, '\"HP 240 G3 14\"\"\"', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(184, 'C01', 'Komputer', 'Laptop', 'C01/008/XI/2016', 9850000, 'Dell Inspiron 14 7447 ', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(185, 'C01', 'Komputer', 'Laptop', 'C01/011/XI/2016', 9850000, 'Dell Inspiron 14 7447 ', 'Elektro', 2016, NULL, 'Kantor Pusat Gasnet', '-', NULL),
(186, 'C01', 'Komputer', 'Laptop', 'C01/028/III/2017', 6100000, '\"HP 240 G3 14\"\"\"', 'Elektro', 2017, NULL, '', '-', NULL),
(187, 'C01', 'Komputer', 'Laptop', 'C01/029/III/2017', 6100000, '\"HP 240 G3 14\"\"\"', 'Elektro', 2017, NULL, '', '-', NULL),
(188, 'C01', 'Komputer', 'Laptop', 'C01/030/III/2017', 9850000, 'Dell Inspiron 14 7447 ', 'Elektro', 2017, NULL, '', '-', NULL),
(189, 'C01', 'Komputer', 'Laptop', 'C01/031/VII/2017', 8855000, '\"Dell Inspiron 5468 14\"\"\"', 'Elektro', 2017, NULL, '', '-', NULL),
(190, 'C01', 'Komputer', 'Laptop', 'C01/032/VII/2017', 8855000, '\"Dell Inspiron 5468 14\"\"\"', 'Elektro', 2017, NULL, '', '-', NULL),
(191, 'C01', 'Komputer', 'Laptop', 'C01/033/VII/2017', 8855000, '\"Dell Inspiron 5468 14\"\"\"', 'Elektro', 2017, NULL, '', '-', NULL),
(192, 'C01', 'Komputer', 'Laptop', 'C01/192/II/2017', 8855000, 'Dell Inspiron 5468 14', 'Elektro', 2017, NULL, '-', '-', ''),
(193, 'C01', 'Komputer', 'Laptop', 'C01/193/II/2017', 8855000, 'Dell Inspiron 5468 14', 'Elektro', 2017, NULL, '-', '-', '');

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_kendaraan`
--

CREATE TABLE `permohonan_kendaraan` (
  `IDpermohonan` int(11) NOT NULL,
  `tanggalBerangkat` date NOT NULL,
  `namaPengguna` varchar(100) NOT NULL,
  `satuanKerja` varchar(100) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `jamBerangkat` time NOT NULL,
  `jamKembali` time NOT NULL,
  `noPol` varchar(10) NOT NULL,
  `pengemudi` varchar(50) NOT NULL,
  `tanggalPermohonan` date NOT NULL,
  `kmAwal` int(11) DEFAULT NULL,
  `kmAkhir` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `approval` varchar(50) DEFAULT 'Belum ada persetujuan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permohonan_kendaraan`
--

INSERT INTO `permohonan_kendaraan` (`IDpermohonan`, `tanggalBerangkat`, `namaPengguna`, `satuanKerja`, `tujuan`, `jamBerangkat`, `jamKembali`, `noPol`, `pengemudi`, `tanggalPermohonan`, `kmAwal`, `kmAkhir`, `email`, `approval`) VALUES
(1, '2018-08-06', 'Erik Santiago', 'IT Developer', 'Jakarta Timur', '09:00:00', '12:00:00', 'B 1234 CD', 'Erik Santiago', '2018-08-03', NULL, NULL, 'erik@gmail.com', 'Disetujui Pusat'),
(2, '2018-08-06', 'Firly A Maulana', 'Marketing', 'Jakarta Utara', '13:00:00', '15:00:00', 'B 1234 CD', 'Firly A Maulana', '2018-08-03', NULL, NULL, 'firy@gmail.com', 'Belum ada persetujuan'),
(3, '2018-08-07', 'Firdaus', 'IT Developer', 'Jakarta Timur', '09:00:00', '12:00:00', 'B 1234 CD', 'Firdaus', '2018-08-06', NULL, NULL, 'erik@gmail.com', 'Tidak disetujui Pusat'),
(4, '2018-08-08', 'Firdaus', 'QA', 'UNJ', '14:00:00', '18:00:00', 'B 1 GSN', 'Firly A Maulana', '2018-08-06', NULL, NULL, 'firy@gmail.com', 'Belum ada persetujuan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `nama`, `level`, `status`) VALUES
('admin@gasnet.com', '$2y$10$6gPLGKysCVOqIdK0ngkvl.eaWoj2tgAfLF1GIEh0zQtCQ5D7LipuC', 'Rahmat', 0, 'aktif'),
('erik@gmail.com', '$2y$10$KqMno883QbEbZ/9VyJlqzeLIVlSg5wiV9k5MAI35RiLyjJDS9dl16', 'Erik Santiago', 2, 'aktif'),
('firy@gmail.com', '$2y$10$I3fp6H/Jkabs2UxXrgRGOOiV21BUej7rHbfqrEjqncrDg9x86PBs.', 'Firly A Maulana', 1, 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`IDinventaris`),
  ADD KEY `IDbarang_inventaris_barang` (`namaBarang`);

--
-- Indexes for table `permohonan_kendaraan`
--
ALTER TABLE `permohonan_kendaraan`
  ADD PRIMARY KEY (`IDpermohonan`),
  ADD KEY `email_permohonan_kendaraan_users` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `IDinventaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `permohonan_kendaraan`
--
ALTER TABLE `permohonan_kendaraan`
  MODIFY `IDpermohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permohonan_kendaraan`
--
ALTER TABLE `permohonan_kendaraan`
  ADD CONSTRAINT `email_permohonan_kendaraan_users` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
