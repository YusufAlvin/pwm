-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2021 at 04:45 AM
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
-- Database: `database`
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
(1, 'admin', '$2y$10$qt3qzJS8.2zdnZb7EjPwfu3SjIwT0kNPy89ygdc5qcNa0PUS3eABq');

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `bahan_id` int(11) NOT NULL,
  `bahan_item_id` varchar(255) NOT NULL,
  `bahan_material_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`bahan_id`, `bahan_item_id`, `bahan_material_id`) VALUES
(3, '2', '01'),
(4, '2', '03'),
(5, '2', '3LVL014M5SE002'),
(17, '1', '01'),
(18, '1', '02'),
(19, '1', '03'),
(20, '4', '01'),
(21, '4', '02'),
(22, '4', '03'),
(23, '4', '3LVL014M5SE002');

-- --------------------------------------------------------

--
-- Table structure for table `bom`
--

CREATE TABLE `bom` (
  `bom_id` int(11) NOT NULL,
  `bom_item_code` varchar(255) NOT NULL,
  `bom_divisi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bom`
--

INSERT INTO `bom` (`bom_id`, `bom_item_code`, `bom_divisi_id`) VALUES
(5, '2', 2),
(6, '3', 2),
(7, '1', 2);

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
('1', 'CTI BASEBOARD 618', 12.5, 13.25, 12.5, 0.0021, 'PCS'),
('2', 'CTI BASEBOARD 530', 10.57, 20.25, 30.23, 0.0065, 'PCS'),
('3', 'CTI S3S', 4876, 139, 13, 8.8109, 'SHEET'),
('4', 'CTI SUMGUARD', 13, 139, 5181, 9.3621, 'M3');

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
('01', 'LEM ALFABOND', 'KG', 14600),
('02', 'TECHBOND L55', 'KG', 15000),
('03', 'CALCIUM', 'KG', 1610),
('3LVL014M5SE002', 'LVL SENGON 14.5MM (UK. 1250MM X 1250MM)', 'PCS', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `so`
--

CREATE TABLE `so` (
  `so_id` int(11) NOT NULL,
  `so_item_code` varchar(255) NOT NULL,
  `so_projects` varchar(255) NOT NULL,
  `so_divisi_id` int(11) NOT NULL,
  `so_lot_number` varchar(255) NOT NULL,
  `so_material` varchar(255) NOT NULL,
  `so_quantity` int(11) NOT NULL,
  `so_uom` varchar(255) NOT NULL,
  `so_tinggi` float NOT NULL,
  `so_lebar` float NOT NULL,
  `so_panjang` float NOT NULL,
  `so_kubikasi` float NOT NULL,
  `so_tgl_produksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`bahan_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `bahan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `bom`
--
ALTER TABLE `bom`
  MODIFY `bom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `divisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `so`
--
ALTER TABLE `so`
  MODIFY `so_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
