-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 08:01 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$BHks.RvmtNTiEyu1r0CeIu55ENmllJMfA17cxj1roBw7eIzx5ojqG'),
(2, 'admin2', '$2y$10$7uncCHVKpVWWoztznVQIuuzOF.kmeoSaJAOvNrI1VbFDmQMZ/LF0e');

-- --------------------------------------------------------

--
-- Table structure for table `bom`
--

CREATE TABLE `bom` (
  `bom_id` int(11) NOT NULL,
  `bom_item_id` varchar(255) NOT NULL,
  `bom_material_id` varchar(255) NOT NULL,
  `bom_divisi_id` int(11) NOT NULL,
  `bom_quantity` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bom`
--

INSERT INTO `bom` (`bom_id`, `bom_item_id`, `bom_material_id`, `bom_divisi_id`, `bom_quantity`) VALUES
(22, '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 1, 0.95),
(23, '1EXPCTIS3S0003', 'asd', 1, 0.5),
(24, '1EXPCTIS3S0003', 'materialcode1', 1, 0.3),
(25, '1EXPCTIS3S0003', 'materialcode2', 1, 0.7),
(26, '1EXPCTIS3S0003', 'materialcode3', 1, 0.6),
(27, '1EXPCTIS3S0003', 'tes', 1, 0.8),
(28, '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 1, 0.1),
(29, '1EXPCTIS3S0003', 'asd', 1, 0.2),
(30, '1EXPCTIS3S0003', 'materialcode1', 1, 0.3),
(31, '1EXPCTIS3S0003', 'materialcode2', 1, 0.4),
(32, '1EXPCTIS3S0003', 'materialcode3', 1, 0.5),
(33, '1EXPCTIS3S0003', 'tes', 1, 0.6),
(34, '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 1, 0.3),
(35, '1EXPCTIS3S0003', 'asd', 1, 0.5),
(36, '1EXPCTIS3S0003', 'materialcode1', 1, 0.7),
(37, '1EXPCTIS3S0003', 'materialcode2', 1, 0.8),
(38, '1EXPCTIS3S0003', 'materialcode3', 1, 0.9),
(39, '1EXPCTIS3S0003', 'tes', 1, 0.4),
(40, '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 1, 0.5),
(41, '1EXPCTIS3S0003', 'asd', 1, 0.3),
(42, '1EXPCTIS3S0003', 'materialcode1', 1, 0.7),
(43, '1EXPCTIS3S0003', 'materialcode2', 1, 0.7),
(44, '1EXPCTIS3S0003', 'materialcode3', 1, 0.2),
(45, '1EXPCTIS3S0003', 'tes', 1, 0.7),
(46, 'barangcode1', '3GLUHDTBONDLAP', 2, 0.5),
(47, 'barangcode1', 'asd', 2, 0.7),
(48, 'barangcode2', '3GLUHDTBONDLAP', 3, 0.5),
(49, 'barangcode2', 'asd', 3, 0.4),
(50, 'barangcode2', 'materialcode1', 3, 3),
(51, 'barangcode2', 'materialcode2', 3, 5),
(52, 'barangcode2', 'materialcode3', 3, 6),
(53, 'barangcode2', 'tes', 3, 7),
(54, 'barangcode2', '3GLUHDTBONDLAP', 3, 0.4),
(55, 'barangcode2', 'asd', 3, 4),
(56, 'barangcode2', 'materialcode1', 3, 5),
(57, 'barangcode2', '3GLUHDTBONDLAP', 3, 1),
(58, 'barangcode2', 'asd', 3, 2),
(59, 'barangcode2', 'materialcode1', 3, 3),
(60, 'barangcode2', 'materialcode2', 3, 4),
(61, '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 1, 1),
(62, '1EXPCTIS3S0003', 'asd', 1, 2),
(63, '1EXPCTIS3S0003', 'materialcode1', 1, 3),
(64, '1EXPCTIS3S0003', 'materialcode2', 1, 4),
(65, '1EXPCTIS3S0003', 'materialcode3', 1, 5),
(66, '1EXPCTIS3S0003', 'tes', 1, 6),
(67, '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 1, 1),
(68, '1EXPCTIS3S0003', 'asd', 1, 2),
(69, '1EXPCTIS3S0003', 'materialcode1', 1, 3),
(70, '1EXPCTIS3S0003', 'materialcode2', 1, 4),
(71, '1EXPCTIS3S0003', 'materialcode3', 1, 5),
(72, '1EXPCTIS3S0003', 'tes', 1, 6),
(73, '1EXPCTIS3S0003', 'tes1', 1, 78),
(74, '1EXPCTIS3S0003', 'tes2', 1, 8),
(75, '1EXPCTIS3S0003', 'tes3', 1, 9),
(76, '1EXPCTIS3S0003', 'tes4', 1, 9),
(77, '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 1, 3),
(78, '1EXPCTIS3S0003', 'asd', 1, 2),
(79, '1EXPCTIS3S0003', 'materialcode1', 1, 2),
(80, '1EXPCTIS3S0003', 'materialcode2', 1, 3),
(81, '1EXPCTIS3S0003', 'materialcode3', 1, 4),
(82, '1EXPCTIS3S0003', 'tes', 1, 5),
(83, '1EXPCTIS3S0003', 'tes1', 1, 6),
(84, '1EXPCTIS3S0003', 'tes2', 1, 7),
(85, '1EXPCTIS3S0003', 'tes3', 1, 9),
(86, '1EXPCTIS3S0003', 'tes4', 1, 8),
(87, '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 1, 1),
(88, '1EXPCTIS3S0003', 'asd', 1, 2),
(89, '1EXPCTIS3S0003', 'materialcode1', 1, 4),
(90, '1EXPCTIS3S0003', 'materialcode2', 1, 5),
(91, '1EXPCTIS3S0003', 'materialcode3', 1, 6),
(92, '1EXPCTIS3S0003', 'tes', 1, 7),
(93, '1EXPCTIS3S0003', 'tes1', 1, 8),
(94, '1EXPCTIS3S0003', 'tes2', 1, 5),
(95, '1EXPCTIS3S0003', 'tes3', 1, 3),
(96, '1EXPCTIS3S0003', 'tes4', 1, 4),
(97, '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 1, 1),
(98, '1EXPCTIS3S0003', 'asd', 1, 2),
(99, '1EXPCTIS3S0003', 'materialcode1', 1, 3),
(100, 'barangcode2', '3GLUHDTBONDLAP', 3, 0.5),
(101, 'barangcode2', 'asd', 3, 0.6),
(117, 'barangcode3', '3GLUHDTBONDLAP', 1, 0.5),
(118, 'tes', '3GLUHDTBONDLAP', 5, 0.5),
(119, 'tes', 'tes4', 3, 0.1);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `divisi_id` int(11) NOT NULL,
  `divisi_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`divisi_id`, `divisi_nama`) VALUES
(1, 'WW'),
(2, 'GESSO'),
(3, 'PACKING'),
(5, 'TESAL');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` varchar(255) NOT NULL,
  `item_nama` varchar(255) NOT NULL,
  `item_panjang` float NOT NULL,
  `item_lebar` float NOT NULL,
  `item_tebal` float NOT NULL,
  `item_kubikasi` float NOT NULL,
  `item_uom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_nama`, `item_panjang`, `item_lebar`, `item_tebal`, `item_kubikasi`, `item_uom`) VALUES
('1EXPCTIS3S0003', 'S3S', 10, 20, 30, 0.006, 'SHEET'),
('barangcode1', 'barang 1', 10, 12, 13, 0.0016, 'SHEET'),
('barangcode2', 'barang 2', 12, 12, 20, 0.0029, 'KG'),
('barangcode3', 'barang 3', 15, 13, 20, 0.0039, 'BTL'),
('tes', 'barangcode4', 10, 12, 13, 0.0016, 'SHEET');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `material_id` varchar(255) NOT NULL,
  `material_nama` varchar(255) NOT NULL,
  `material_uom` varchar(255) NOT NULL,
  `material_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`material_id`, `material_nama`, `material_uom`, `material_harga`) VALUES
('3GLUHDTBONDLAP', 'HARDENER L A P', 'KG', 100000),
('asd', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout', 'SHEET', 4),
('materialcode1', 'material 1', 'MTR', 20000),
('materialcode2', 'material 2', 'KG', 15000),
('materialcode3', 'material 3', 'GR', 45000),
('tes', 'tes', 'M3', 2000000),
('tes1', 'tes1', 'DIHAPUS', 12),
('tes2', 'tes2', 'DIHAPUS', 20),
('tes3', 'tes3', 'PCS', 20000),
('tes4', 'tes4', 'DIHAPUS', 20);

-- --------------------------------------------------------

--
-- Table structure for table `realisasi`
--

CREATE TABLE `realisasi` (
  `so_id` int(11) NOT NULL,
  `so_no_spk` varchar(255) NOT NULL,
  `so_item_id` varchar(255) NOT NULL,
  `so_material_id` varchar(255) NOT NULL,
  `so_material_qty` float NOT NULL,
  `so_divisi_id` int(11) NOT NULL,
  `so_qty_order` float NOT NULL,
  `so_lot_number` varchar(255) NOT NULL,
  `so_total_kebutuhan` float NOT NULL,
  `so_realisasi` float NOT NULL,
  `so_tanggal` date NOT NULL,
  `so_kosong` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `realisasi`
--

INSERT INTO `realisasi` (`so_id`, `so_no_spk`, `so_item_id`, `so_material_id`, `so_material_qty`, `so_divisi_id`, `so_qty_order`, `so_lot_number`, `so_total_kebutuhan`, `so_realisasi`, `so_tanggal`, `so_kosong`) VALUES
(261, 'spk1', '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 0.5, 1, 2000, 'sft1', 1000, 500, '2021-12-06', ''),
(262, 'spk1', '1EXPCTIS3S0003', 'asd', 0.6, 1, 2000, 'sft1', 1200, 10, '2021-12-06', ''),
(263, 'spk1', '1EXPCTIS3S0003', 'materialcode1', 0.3, 1, 2000, 'sft1', 600, 0, '0000-00-00', ''),
(264, 'spk1', '1EXPCTIS3S0003', 'materialcode2', 0.7, 1, 2000, 'sft1', 1400, 0, '0000-00-00', ''),
(265, 'spk1', '1EXPCTIS3S0003', 'materialcode3', 0.6, 1, 2000, 'sft1', 1200, 0, '0000-00-00', ''),
(266, 'spk1', '1EXPCTIS3S0003', 'tes', 0.8, 1, 2000, 'sft1', 1600, 0, '0000-00-00', ''),
(267, 'spk1', '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 0.1, 1, 2000, 'sft1', 200, 10, '2021-12-07', ''),
(268, 'spk1', '1EXPCTIS3S0003', 'asd', 0.2, 1, 2000, 'sft1', 400, 0, '0000-00-00', ''),
(269, 'spk1', '1EXPCTIS3S0003', 'materialcode1', 0.3, 1, 2000, 'sft1', 600, 0, '0000-00-00', ''),
(270, 'spk1', '1EXPCTIS3S0003', 'materialcode2', 0.4, 1, 2000, 'sft1', 800, 0, '0000-00-00', ''),
(271, 'spk1', '1EXPCTIS3S0003', 'materialcode3', 0.5, 1, 2000, 'sft1', 1000, 0, '0000-00-00', ''),
(272, 'spk1', '1EXPCTIS3S0003', 'tes', 0.6, 1, 2000, 'sft1', 1200, 0, '0000-00-00', ''),
(273, 'spk1', '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 0.3, 1, 2000, 'sft1', 600, 80, '2021-12-08', ''),
(274, 'spk1', '1EXPCTIS3S0003', 'asd', 0.5, 1, 2000, 'sft1', 1000, 0, '0000-00-00', ''),
(275, 'spk1', '1EXPCTIS3S0003', 'materialcode1', 0.7, 1, 2000, 'sft1', 1400, 0, '0000-00-00', ''),
(276, 'spk1', '1EXPCTIS3S0003', 'materialcode2', 0.8, 1, 2000, 'sft1', 1600, 0, '0000-00-00', ''),
(277, 'spk1', '1EXPCTIS3S0003', 'materialcode3', 0.9, 1, 2000, 'sft1', 1800, 0, '0000-00-00', ''),
(278, 'spk1', '1EXPCTIS3S0003', 'tes', 0.4, 1, 2000, 'sft1', 800, 0, '0000-00-00', ''),
(279, 'spk1', '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 0.5, 1, 2000, 'sft1', 1000, 0, '0000-00-00', ''),
(280, 'spk1', '1EXPCTIS3S0003', 'asd', 0.3, 1, 2000, 'sft1', 600, 0, '0000-00-00', ''),
(281, 'spk1', '1EXPCTIS3S0003', 'materialcode1', 0.7, 1, 2000, 'sft1', 1400, 0, '0000-00-00', ''),
(282, 'spk1', '1EXPCTIS3S0003', 'materialcode2', 0.7, 1, 2000, 'sft1', 1400, 0, '0000-00-00', ''),
(283, 'spk1', '1EXPCTIS3S0003', 'materialcode3', 0.2, 1, 2000, 'sft1', 400, 0, '0000-00-00', ''),
(284, 'spk1', '1EXPCTIS3S0003', 'tes', 0.7, 1, 2000, 'sft1', 1400, 0, '0000-00-00', ''),
(285, 'spk1', '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 1, 1, 2000, 'sft1', 2000, 0, '0000-00-00', ''),
(286, 'spk1', '1EXPCTIS3S0003', 'asd', 2, 1, 2000, 'sft1', 4000, 0, '0000-00-00', ''),
(287, 'spk1', '1EXPCTIS3S0003', 'materialcode1', 3, 1, 2000, 'sft1', 6000, 0, '0000-00-00', ''),
(288, 'spk1', '1EXPCTIS3S0003', 'materialcode2', 4, 1, 2000, 'sft1', 8000, 0, '0000-00-00', ''),
(289, 'spk1', '1EXPCTIS3S0003', 'materialcode3', 5, 1, 2000, 'sft1', 10000, 0, '0000-00-00', ''),
(290, 'spk1', '1EXPCTIS3S0003', 'tes', 6, 1, 2000, 'sft1', 12000, 0, '0000-00-00', ''),
(291, 'spk1', '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 1, 1, 2000, 'sft1', 2000, 0, '0000-00-00', ''),
(292, 'spk1', '1EXPCTIS3S0003', 'asd', 2, 1, 2000, 'sft1', 4000, 0, '0000-00-00', ''),
(293, 'spk1', '1EXPCTIS3S0003', 'materialcode1', 3, 1, 2000, 'sft1', 6000, 0, '0000-00-00', ''),
(294, 'spk1', '1EXPCTIS3S0003', 'materialcode2', 4, 1, 2000, 'sft1', 8000, 0, '0000-00-00', ''),
(295, 'spk1', '1EXPCTIS3S0003', 'materialcode3', 5, 1, 2000, 'sft1', 10000, 0, '0000-00-00', ''),
(296, 'spk1', '1EXPCTIS3S0003', 'tes', 6, 1, 2000, 'sft1', 12000, 0, '0000-00-00', ''),
(297, 'spk1', '1EXPCTIS3S0003', 'tes1', 78, 1, 2000, 'sft1', 156000, 0, '0000-00-00', ''),
(298, 'spk1', '1EXPCTIS3S0003', 'tes2', 8, 1, 2000, 'sft1', 16000, 0, '0000-00-00', ''),
(299, 'spk1', '1EXPCTIS3S0003', 'tes3', 9, 1, 2000, 'sft1', 18000, 0, '0000-00-00', ''),
(300, 'spk1', '1EXPCTIS3S0003', 'tes4', 9, 1, 2000, 'sft1', 18000, 0, '0000-00-00', ''),
(301, 'spk1', '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 3, 1, 2000, 'sft1', 6000, 0, '0000-00-00', ''),
(302, 'spk1', '1EXPCTIS3S0003', 'asd', 2, 1, 2000, 'sft1', 4000, 0, '0000-00-00', ''),
(303, 'spk1', '1EXPCTIS3S0003', 'materialcode1', 2, 1, 2000, 'sft1', 4000, 0, '0000-00-00', ''),
(304, 'spk1', '1EXPCTIS3S0003', 'materialcode2', 3, 1, 2000, 'sft1', 6000, 0, '0000-00-00', ''),
(305, 'spk1', '1EXPCTIS3S0003', 'materialcode3', 4, 1, 2000, 'sft1', 8000, 0, '0000-00-00', ''),
(306, 'spk1', '1EXPCTIS3S0003', 'tes', 5, 1, 2000, 'sft1', 10000, 0, '0000-00-00', ''),
(307, 'spk1', '1EXPCTIS3S0003', 'tes1', 6, 1, 2000, 'sft1', 12000, 0, '0000-00-00', ''),
(308, 'spk1', '1EXPCTIS3S0003', 'tes2', 7, 1, 2000, 'sft1', 14000, 0, '0000-00-00', ''),
(309, 'spk1', '1EXPCTIS3S0003', 'tes3', 9, 1, 2000, 'sft1', 18000, 0, '0000-00-00', ''),
(310, 'spk1', '1EXPCTIS3S0003', 'tes4', 8, 1, 2000, 'sft1', 16000, 0, '0000-00-00', ''),
(311, 'spk1', '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 1, 1, 2000, 'sft1', 2000, 0, '0000-00-00', ''),
(312, 'spk1', '1EXPCTIS3S0003', 'asd', 2, 1, 2000, 'sft1', 4000, 0, '0000-00-00', ''),
(313, 'spk1', '1EXPCTIS3S0003', 'materialcode1', 4, 1, 2000, 'sft1', 8000, 0, '0000-00-00', ''),
(314, 'spk1', '1EXPCTIS3S0003', 'materialcode2', 5, 1, 2000, 'sft1', 10000, 0, '0000-00-00', ''),
(315, 'spk1', '1EXPCTIS3S0003', 'materialcode3', 6, 1, 2000, 'sft1', 12000, 0, '0000-00-00', ''),
(316, 'spk1', '1EXPCTIS3S0003', 'tes', 7, 1, 2000, 'sft1', 14000, 0, '0000-00-00', ''),
(317, 'spk1', '1EXPCTIS3S0003', 'tes1', 8, 1, 2000, 'sft1', 16000, 0, '0000-00-00', ''),
(318, 'spk1', '1EXPCTIS3S0003', 'tes2', 5, 1, 2000, 'sft1', 10000, 0, '0000-00-00', ''),
(319, 'spk1', '1EXPCTIS3S0003', 'tes3', 3, 1, 2000, 'sft1', 6000, 0, '0000-00-00', ''),
(320, 'spk1', '1EXPCTIS3S0003', 'tes4', 4, 1, 2000, 'sft1', 8000, 0, '0000-00-00', ''),
(482, 'spk2', 'barangcode2', '3GLUHDTBONDLAP', 0.5, 3, 1500, 'sft2', 750, 0, '0000-00-00', ''),
(483, 'spk2', 'barangcode2', 'asd', 0.4, 3, 1500, 'sft2', 600, 0, '0000-00-00', ''),
(484, 'spk2', 'barangcode2', 'materialcode1', 3, 3, 1500, 'sft2', 4500, 0, '0000-00-00', ''),
(485, 'spk2', 'barangcode2', 'materialcode2', 5, 3, 1500, 'sft2', 7500, 0, '0000-00-00', ''),
(486, 'spk2', 'barangcode2', 'materialcode3', 6, 3, 1500, 'sft2', 9000, 0, '0000-00-00', ''),
(487, 'spk2', 'barangcode2', 'tes', 7, 3, 1500, 'sft2', 10500, 0, '0000-00-00', ''),
(488, 'spk2', 'barangcode2', '3GLUHDTBONDLAP', 0.4, 3, 1500, 'sft2', 600, 0, '0000-00-00', ''),
(489, 'spk2', 'barangcode2', 'asd', 4, 3, 1500, 'sft2', 6000, 0, '0000-00-00', ''),
(490, 'spk2', 'barangcode2', 'materialcode1', 5, 3, 1500, 'sft2', 7500, 0, '0000-00-00', ''),
(491, 'spk2', 'barangcode2', '3GLUHDTBONDLAP', 1, 3, 1500, 'sft2', 1500, 0, '0000-00-00', ''),
(492, 'spk2', 'barangcode2', 'asd', 2, 3, 1500, 'sft2', 3000, 0, '0000-00-00', ''),
(493, 'spk2', 'barangcode2', 'materialcode1', 3, 3, 1500, 'sft2', 4500, 0, '0000-00-00', ''),
(494, 'spk2', 'barangcode2', 'materialcode2', 4, 3, 1500, 'sft2', 6000, 0, '0000-00-00', ''),
(495, 'spk2', 'barangcode2', '3GLUHDTBONDLAP', 0.5, 3, 1500, 'sft2', 750, 0, '0000-00-00', ''),
(496, 'spk2', 'barangcode2', 'asd', 0.6, 3, 1500, 'sft2', 900, 0, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `so`
--

CREATE TABLE `so` (
  `so_id` int(11) NOT NULL,
  `so_no_spk` varchar(255) NOT NULL,
  `so_item_id` varchar(255) NOT NULL,
  `so_material_id` varchar(255) NOT NULL,
  `so_material_qty` float NOT NULL,
  `so_divisi_id` int(11) NOT NULL,
  `so_qty_order` float NOT NULL,
  `so_lot_number` varchar(255) NOT NULL,
  `so_total_kebutuhan` float NOT NULL,
  `so_realisasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `so`
--

INSERT INTO `so` (`so_id`, `so_no_spk`, `so_item_id`, `so_material_id`, `so_material_qty`, `so_divisi_id`, `so_qty_order`, `so_lot_number`, `so_total_kebutuhan`, `so_realisasi`) VALUES
(261, 'spk1', '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 0.5, 1, 2000, 'sft1', 1000, ''),
(262, 'spk1', '1EXPCTIS3S0003', 'asd', 0.6, 1, 2000, 'sft1', 1200, ''),
(263, 'spk1', '1EXPCTIS3S0003', 'materialcode1', 0.3, 1, 2000, 'sft1', 600, ''),
(264, 'spk1', '1EXPCTIS3S0003', 'materialcode2', 0.7, 1, 2000, 'sft1', 1400, ''),
(265, 'spk1', '1EXPCTIS3S0003', 'materialcode3', 0.6, 1, 2000, 'sft1', 1200, ''),
(266, 'spk1', '1EXPCTIS3S0003', 'tes', 0.8, 1, 2000, 'sft1', 1600, ''),
(267, 'spk1', '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 0.1, 1, 2000, 'sft1', 200, ''),
(268, 'spk1', '1EXPCTIS3S0003', 'asd', 0.2, 1, 2000, 'sft1', 400, ''),
(269, 'spk1', '1EXPCTIS3S0003', 'materialcode1', 0.3, 1, 2000, 'sft1', 600, ''),
(270, 'spk1', '1EXPCTIS3S0003', 'materialcode2', 0.4, 1, 2000, 'sft1', 800, ''),
(271, 'spk1', '1EXPCTIS3S0003', 'materialcode3', 0.5, 1, 2000, 'sft1', 1000, ''),
(272, 'spk1', '1EXPCTIS3S0003', 'tes', 0.6, 1, 2000, 'sft1', 1200, ''),
(273, 'spk1', '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 0.3, 1, 2000, 'sft1', 600, ''),
(274, 'spk1', '1EXPCTIS3S0003', 'asd', 0.5, 1, 2000, 'sft1', 1000, ''),
(275, 'spk1', '1EXPCTIS3S0003', 'materialcode1', 0.7, 1, 2000, 'sft1', 1400, ''),
(276, 'spk1', '1EXPCTIS3S0003', 'materialcode2', 0.8, 1, 2000, 'sft1', 1600, ''),
(277, 'spk1', '1EXPCTIS3S0003', 'materialcode3', 0.9, 1, 2000, 'sft1', 1800, ''),
(278, 'spk1', '1EXPCTIS3S0003', 'tes', 0.4, 1, 2000, 'sft1', 800, ''),
(279, 'spk1', '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 0.5, 1, 2000, 'sft1', 1000, ''),
(280, 'spk1', '1EXPCTIS3S0003', 'asd', 0.3, 1, 2000, 'sft1', 600, ''),
(281, 'spk1', '1EXPCTIS3S0003', 'materialcode1', 0.7, 1, 2000, 'sft1', 1400, ''),
(282, 'spk1', '1EXPCTIS3S0003', 'materialcode2', 0.7, 1, 2000, 'sft1', 1400, ''),
(283, 'spk1', '1EXPCTIS3S0003', 'materialcode3', 0.2, 1, 2000, 'sft1', 400, ''),
(284, 'spk1', '1EXPCTIS3S0003', 'tes', 0.7, 1, 2000, 'sft1', 1400, ''),
(285, 'spk1', '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 1, 1, 2000, 'sft1', 2000, ''),
(286, 'spk1', '1EXPCTIS3S0003', 'asd', 2, 1, 2000, 'sft1', 4000, ''),
(287, 'spk1', '1EXPCTIS3S0003', 'materialcode1', 3, 1, 2000, 'sft1', 6000, ''),
(288, 'spk1', '1EXPCTIS3S0003', 'materialcode2', 4, 1, 2000, 'sft1', 8000, ''),
(289, 'spk1', '1EXPCTIS3S0003', 'materialcode3', 5, 1, 2000, 'sft1', 10000, ''),
(290, 'spk1', '1EXPCTIS3S0003', 'tes', 6, 1, 2000, 'sft1', 12000, ''),
(291, 'spk1', '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 1, 1, 2000, 'sft1', 2000, ''),
(292, 'spk1', '1EXPCTIS3S0003', 'asd', 2, 1, 2000, 'sft1', 4000, ''),
(293, 'spk1', '1EXPCTIS3S0003', 'materialcode1', 3, 1, 2000, 'sft1', 6000, ''),
(294, 'spk1', '1EXPCTIS3S0003', 'materialcode2', 4, 1, 2000, 'sft1', 8000, ''),
(295, 'spk1', '1EXPCTIS3S0003', 'materialcode3', 5, 1, 2000, 'sft1', 10000, ''),
(296, 'spk1', '1EXPCTIS3S0003', 'tes', 6, 1, 2000, 'sft1', 12000, ''),
(297, 'spk1', '1EXPCTIS3S0003', 'tes1', 78, 1, 2000, 'sft1', 156000, ''),
(298, 'spk1', '1EXPCTIS3S0003', 'tes2', 8, 1, 2000, 'sft1', 16000, ''),
(299, 'spk1', '1EXPCTIS3S0003', 'tes3', 9, 1, 2000, 'sft1', 18000, ''),
(300, 'spk1', '1EXPCTIS3S0003', 'tes4', 9, 1, 2000, 'sft1', 18000, ''),
(301, 'spk1', '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 3, 1, 2000, 'sft1', 6000, ''),
(302, 'spk1', '1EXPCTIS3S0003', 'asd', 2, 1, 2000, 'sft1', 4000, ''),
(303, 'spk1', '1EXPCTIS3S0003', 'materialcode1', 2, 1, 2000, 'sft1', 4000, ''),
(304, 'spk1', '1EXPCTIS3S0003', 'materialcode2', 3, 1, 2000, 'sft1', 6000, ''),
(305, 'spk1', '1EXPCTIS3S0003', 'materialcode3', 4, 1, 2000, 'sft1', 8000, ''),
(306, 'spk1', '1EXPCTIS3S0003', 'tes', 5, 1, 2000, 'sft1', 10000, ''),
(307, 'spk1', '1EXPCTIS3S0003', 'tes1', 6, 1, 2000, 'sft1', 12000, ''),
(308, 'spk1', '1EXPCTIS3S0003', 'tes2', 7, 1, 2000, 'sft1', 14000, ''),
(309, 'spk1', '1EXPCTIS3S0003', 'tes3', 9, 1, 2000, 'sft1', 18000, ''),
(310, 'spk1', '1EXPCTIS3S0003', 'tes4', 8, 1, 2000, 'sft1', 16000, ''),
(311, 'spk1', '1EXPCTIS3S0003', '3GLUHDTBONDLAP', 1, 1, 2000, 'sft1', 2000, ''),
(312, 'spk1', '1EXPCTIS3S0003', 'asd', 2, 1, 2000, 'sft1', 4000, ''),
(313, 'spk1', '1EXPCTIS3S0003', 'materialcode1', 4, 1, 2000, 'sft1', 8000, ''),
(314, 'spk1', '1EXPCTIS3S0003', 'materialcode2', 5, 1, 2000, 'sft1', 10000, ''),
(315, 'spk1', '1EXPCTIS3S0003', 'materialcode3', 6, 1, 2000, 'sft1', 12000, ''),
(316, 'spk1', '1EXPCTIS3S0003', 'tes', 7, 1, 2000, 'sft1', 14000, ''),
(317, 'spk1', '1EXPCTIS3S0003', 'tes1', 8, 1, 2000, 'sft1', 16000, ''),
(318, 'spk1', '1EXPCTIS3S0003', 'tes2', 5, 1, 2000, 'sft1', 10000, ''),
(319, 'spk1', '1EXPCTIS3S0003', 'tes3', 3, 1, 2000, 'sft1', 6000, ''),
(320, 'spk1', '1EXPCTIS3S0003', 'tes4', 4, 1, 2000, 'sft1', 8000, ''),
(482, 'spk2', 'barangcode2', '3GLUHDTBONDLAP', 0.5, 3, 1500, 'sft2', 750, ''),
(483, 'spk2', 'barangcode2', 'asd', 0.4, 3, 1500, 'sft2', 600, ''),
(484, 'spk2', 'barangcode2', 'materialcode1', 3, 3, 1500, 'sft2', 4500, ''),
(485, 'spk2', 'barangcode2', 'materialcode2', 5, 3, 1500, 'sft2', 7500, ''),
(486, 'spk2', 'barangcode2', 'materialcode3', 6, 3, 1500, 'sft2', 9000, ''),
(487, 'spk2', 'barangcode2', 'tes', 7, 3, 1500, 'sft2', 10500, ''),
(488, 'spk2', 'barangcode2', '3GLUHDTBONDLAP', 0.4, 3, 1500, 'sft2', 600, ''),
(489, 'spk2', 'barangcode2', 'asd', 4, 3, 1500, 'sft2', 6000, ''),
(490, 'spk2', 'barangcode2', 'materialcode1', 5, 3, 1500, 'sft2', 7500, ''),
(491, 'spk2', 'barangcode2', '3GLUHDTBONDLAP', 1, 3, 1500, 'sft2', 1500, ''),
(492, 'spk2', 'barangcode2', 'asd', 2, 3, 1500, 'sft2', 3000, ''),
(493, 'spk2', 'barangcode2', 'materialcode1', 3, 3, 1500, 'sft2', 4500, ''),
(494, 'spk2', 'barangcode2', 'materialcode2', 4, 3, 1500, 'sft2', 6000, ''),
(495, 'spk2', 'barangcode2', '3GLUHDTBONDLAP', 0.5, 3, 1500, 'sft2', 750, ''),
(496, 'spk2', 'barangcode2', 'asd', 0.6, 3, 1500, 'sft2', 900, '');

-- --------------------------------------------------------

--
-- Table structure for table `uom`
--

CREATE TABLE `uom` (
  `uom_id` int(11) NOT NULL,
  `uom_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uom`
--

INSERT INTO `uom` (`uom_id`, `uom_nama`) VALUES
(2, 'KG'),
(3, 'BTL'),
(4, 'GR'),
(5, 'PCS'),
(6, 'M3'),
(7, 'MTR'),
(8, 'ROL'),
(9, 'M2'),
(10, 'LTR'),
(12, 'SHEET'),
(13, 'TES');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bom`
--
ALTER TABLE `bom`
  ADD PRIMARY KEY (`bom_id`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`divisi_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `realisasi`
--
ALTER TABLE `realisasi`
  ADD PRIMARY KEY (`so_id`);

--
-- Indexes for table `so`
--
ALTER TABLE `so`
  ADD PRIMARY KEY (`so_id`);

--
-- Indexes for table `uom`
--
ALTER TABLE `uom`
  ADD PRIMARY KEY (`uom_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bom`
--
ALTER TABLE `bom`
  MODIFY `bom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `divisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `realisasi`
--
ALTER TABLE `realisasi`
  MODIFY `so_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=497;

--
-- AUTO_INCREMENT for table `so`
--
ALTER TABLE `so`
  MODIFY `so_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=497;

--
-- AUTO_INCREMENT for table `uom`
--
ALTER TABLE `uom`
  MODIFY `uom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
