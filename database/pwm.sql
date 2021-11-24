-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 02:41 AM
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
(14, 'barangcode1', 'materialcode1', 1, 0.5),
(15, 'barangcode1', 'materialcode2', 2, 0.6),
(16, 'barangcode1', 'materialcode3', 3, 0.7),
(17, 'barangcode2', 'materialcode3', 2, 0.1);

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
('barangcode1', 'barang 1', 10, 12, 13, 0.0016, 'SHEET'),
('barangcode2', 'barang 2', 12, 12, 20, 0.0029, 'KG'),
('barangcode3', 'barang 3', 15, 13, 20, 0.0039, 'BTL');

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
('materialcode1', 'material 1', 'SHEET', 20000),
('materialcode2', 'material 2', 'KG', 15000),
('materialcode3', 'material 3', 'GR', 45000);

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
(5, 'SPK1', 'barangcode1', 'materialcode1', 0.5, 1, 1000, 'SFT1', 500, 10, '2021-11-24', ''),
(6, 'SPK1', 'barangcode1', 'materialcode2', 0.6, 2, 1000, 'SFT1', 600, 20, '2021-11-23', ''),
(7, 'SPK1', 'barangcode1', 'materialcode3', 0.7, 3, 1000, 'SFT1', 700, 25, '2021-11-23', ''),
(8, 'SPK2', 'barangcode2', 'materialcode3', 0.1, 2, 2000, 'SFT2', 200, 100, '2021-11-23', ''),
(9, 'SPK3', 'barangcode1', 'materialcode1', 0.5, 1, 2500, 'SFT3', 1250, 200, '2021-11-24', ''),
(10, 'SPK3', 'barangcode1', 'materialcode2', 0.6, 2, 2500, 'SFT3', 1500, 100, '2021-11-23', ''),
(11, 'SPK3', 'barangcode1', 'materialcode3', 0.7, 3, 2500, 'SFT3', 1750, 12, '2021-11-23', '');

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
(5, 'SPK1', 'barangcode1', 'materialcode1', 0.5, 1, 1000, 'SFT1', 500, ''),
(6, 'SPK1', 'barangcode1', 'materialcode2', 0.6, 2, 1000, 'SFT1', 600, ''),
(7, 'SPK1', 'barangcode1', 'materialcode3', 0.7, 3, 1000, 'SFT1', 700, ''),
(8, 'SPK2', 'barangcode2', 'materialcode3', 0.1, 2, 2000, 'SFT2', 200, ''),
(9, 'SPK3', 'barangcode1', 'materialcode1', 0.5, 1, 2500, 'SFT3', 1250, ''),
(10, 'SPK3', 'barangcode1', 'materialcode2', 0.6, 2, 2500, 'SFT3', 1500, ''),
(11, 'SPK3', 'barangcode1', 'materialcode3', 0.7, 3, 2500, 'SFT3', 1750, '');

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
  MODIFY `bom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `divisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `realisasi`
--
ALTER TABLE `realisasi`
  MODIFY `so_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `so`
--
ALTER TABLE `so`
  MODIFY `so_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
