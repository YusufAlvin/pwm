-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2021 at 05:09 AM
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
(24, '1LOCCFTCTIS3SM1', '3SAN0150PP0003', 1, 0.005),
(25, '1LOCCFTCTIS3SM1', 'material code 1', 1, 0.006),
(26, 'barang code 1', '3SAN0150PP0003', 2, 0.005),
(27, 'barang code 1', 'material code 1', 2, 0.008),
(28, 'barang code 1', '3SAN0150PP0003', 2, 0.005),
(29, 'barang code 1', 'material code 1', 2, 0.008),
(30, 'barang code 1', 'material code 2', 2, 0.009);

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
(3, 'PACKING');

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
('1LOCCFTCTIS3SM1', 'CTI MLMALBS3S', 4876, 139, 13, 8.8109, 'PCS'),
('barang code 1', 'barang 1', 10, 20, 30, 0.006, 'SHEET'),
('barang code 2', 'barang 2', 30, 20, 50, 0.03, 'BTL'),
('barang code 3', 'barang 3', 12, 13, 14, 0.0022, 'KG'),
('barang code 4', 'barang 4', 12, 13, 50, 0.0078, 'GR');

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
('3SAN0150PP0003', 'AMPLAS BELT 2200MM X 1330MM P.150', 'PCS', 15000),
('material code 1', 'material 1', 'SHEET', 20000),
('material code 2', 'material 2', 'KG', 25000),
('material code 3', 'material 3', 'BTL', 50000),
('material code 4', 'material 4', 'GR', 35000);

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
(14, 's0112', '1LOCCFTCTIS3SM1', '3SAN0150PP0003', 0.005, 1, 4800, 'SFT2111002', 24, ''),
(15, 's0112', '1LOCCFTCTIS3SM1', 'material code 1', 0.006, 1, 4800, 'SFT2111002', 28.8, ''),
(16, '1LOC1111', '1LOCCFTCTIS3SM1', '3SAN0150PP0003', 0.005, 1, 4800, 'SFT21100023', 24, ''),
(17, '1LOC1111', '1LOCCFTCTIS3SM1', 'material code 1', 0.006, 1, 4800, 'SFT21100023', 28.8, '');

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
-- Indexes for table `so`
--
ALTER TABLE `so`
  ADD PRIMARY KEY (`so_id`);

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
  MODIFY `bom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `divisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `so`
--
ALTER TABLE `so`
  MODIFY `so_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
