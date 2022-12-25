-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2022 at 11:37 PM
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
-- Database: `gestion_des_stocks`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `adr` varchar(1000) DEFAULT NULL,
  `tele` varchar(20) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `image` varchar(10000) NOT NULL,
  `mdp` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `adr`, `tele`, `email`, `image`, `mdp`) VALUES
(12, '', 'Haitam', '423 Qu El Qods, Sidi Kacem ', '0766032618', 'belcaida@email.com', './image/admin/haitam_pic.jpg', '0000'),
(13, '', 'Mohamed-Amine', '1 coopérative souhaila, Safi', '0601147845', 'benhima@email.com', './image/admin/aminux.png', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `approvisionnement`
--

CREATE TABLE `approvisionnement` (
  `num_app` varchar(50) NOT NULL,
  `date_app` varchar(100) DEFAULT NULL,
  `id_four` int(11) DEFAULT NULL,
  `desc_app` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approvisionnement`
--

INSERT INTO `approvisionnement` (`num_app`, `date_app`, `id_four`, `desc_app`) VALUES
('101', '07-11-2022', 7, '256GB, des couleurs aléatoires'),
('102', '12-12-2022', 7, '-'),
('103', '13-10-2022', 6, 'Des couleurs aléatoires'),
('104', '01-12-2022', 8, 'des couleurs aléatoires');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_cat` int(11) NOT NULL,
  `lib_cat` varchar(100) DEFAULT NULL,
  `desc_cat` varchar(1000) NOT NULL,
  `cat_image` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `lib_cat`, `desc_cat`, `cat_image`) VALUES
(10, 'Laptop', 'Portable personal pc.', './image/category/laptop.jpeg'),
(11, 'Smartphone', 'Cellular telephone with an integrated computer.', './image/category/smartphone.jpg'),
(13, 'Tablet', 'Portable personal computer with a touchscreen interface.', './image/category/tablet.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `adr` varchar(1000) DEFAULT NULL,
  `tele` varchar(20) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `adr`, `tele`, `email`, `image`) VALUES
(10, 'Ayoub', 'Barki', '412, Derb Kwibina, Sidi Barnoussi, Casablanca', '0625024189', 'barki.ayoub@email.com', './image/client/IMG-20221027-WA0032 (1).jpg'),
(11, 'Mohammed', 'Kerroumi', '12, Rue Ibn Sina, Kenitra', '0691001577', 'kerroumi2012@email.com', './image/client/zaae.jpg'),
(12, 'Sami', 'Wahbi', '3523 Rue 12, Qu El Inara, Oujda', '0655961335', 'wahbi99@email.com', './image/client/ezgif-5-9a210c7e6a (1).jpg'),
(13, 'Rana', 'Benkirane', '10 Rue Aman, Ain Diab, Casablanca', '0600124536', 'queenrana@email.com', './image/client/rana (1).jpeg'),
(14, 'Sara', 'Eddahbi', '22 Av. Sidi Mohamed Ben Abdellah, Tanger', '0603124485', 'sara.eddahbi.8@email.com', './image/client/Wissal (1).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `num_com` varchar(50) NOT NULL,
  `date_com` varchar(50) DEFAULT NULL,
  `id_cli` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`num_com`, `date_com`, `id_cli`) VALUES
('001', '24-12-2022', 10),
('002', '15-12-2022', 13),
('003', '06-12-2022', 11),
('004', '17-11-2022', 14),
('005', '11-12-2022', 10),
('EWF;DSJ', '25-12-2022', 12);

-- --------------------------------------------------------

--
-- Table structure for table `contient_pr`
--

CREATE TABLE `contient_pr` (
  `num_pr` varchar(100) NOT NULL,
  `num_com` varchar(50) NOT NULL,
  `qte_pr` int(11) DEFAULT NULL,
  `prix_vente` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contient_pr`
--

INSERT INTO `contient_pr` (`num_pr`, `num_com`, `qte_pr`, `prix_vente`) VALUES
('2001', '001', 1, '13500'),
('4010', '002', 1, '18000'),
('4011', '005', 1, '8990'),
('7502', '002', 1, '14600'),
('7513', '004', 1, '7399'),
('7701', '004', 2, '8990'),
('8155', '004', 3, '15790'),
('8213', '002', 1, '11000'),
('8902', '004', 1, '15000'),
('9001', '003', 2, '10352');

-- --------------------------------------------------------

--
-- Table structure for table `est_compose`
--

CREATE TABLE `est_compose` (
  `num_app` varchar(50) NOT NULL,
  `num_pr` varchar(100) NOT NULL,
  `qte_achete` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `est_compose`
--

INSERT INTO `est_compose` (`num_app`, `num_pr`, `qte_achete`) VALUES
('101', '8155', 17),
('101', '8156', 19),
('102', '4010', 7),
('102', '8902', 4),
('103', '7513', 24),
('103', '7514', 32),
('103', '7516', 20),
('103', '7701', 4),
('104', '9001', 28),
('104', '9002', 12),
('104', '9003', 20);

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `adr` varchar(1000) DEFAULT NULL,
  `tele` varchar(20) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `nom`, `prenom`, `adr`, `tele`, `email`, `image`) VALUES
(6, 'Ahmed', 'Idrissi', '92 Rue Ismailia, Garage Allal, Casablanca', '0610023654', 'idrissiahmed10@email.com', './image/supplier/supp1 (1).jpg'),
(7, 'Sami', 'El Amrani', '147 Boulevard Hadj Omar Riffi, N°3 Magasin, Casablanca', '0712005470', 'electro.tahiri@email.com', './image/supplier/supp2 (1).jpg'),
(8, 'Adham', 'Loukili', '113, bd d\' Alsace (Mers Sultan) Quartier Benjdia, Casablanca', '0611023698', 'loukili.fcb.2012@email.com', './image/supplier/MaLbHAFEG37S8TQ4U-500x500.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `marque`
--

CREATE TABLE `marque` (
  `id_marque` int(11) NOT NULL,
  `nom_marque` varchar(1000) NOT NULL,
  `description_marque` varchar(5000) NOT NULL,
  `br_image` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marque`
--

INSERT INTO `marque` (`id_marque`, `nom_marque`, `description_marque`, `br_image`) VALUES
(25, 'Apple', 'American multinational technology company.', './image/brand/apple.jpg'),
(26, 'Samsung', 'South Korean multinational electronics corporation.', './image/brand/samsung.jpg'),
(27, 'Xiaomi', 'Chinese designer and manufacturer of consumer electronics.', './image/brand/xiaomi.png'),
(28, 'Dell', 'American based technology company.', './image/brand/dell.png'),
(29, 'MSI', 'Taiwanese multinational information technology corporation.', './image/brand/msi.jpg'),
(30, 'Huawei', 'Chinese multinational technology corporation.', './image/brand/huawei.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `num_pr` varchar(100) NOT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `id_marque` int(11) NOT NULL,
  `lib_pr` varchar(10000) DEFAULT NULL,
  `desc_pr` varchar(1000) NOT NULL,
  `prix_uni` float DEFAULT NULL,
  `prix_achat` float DEFAULT NULL,
  `qte_stock` int(11) DEFAULT NULL,
  `pr_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`num_pr`, `id_cat`, `id_marque`, `lib_pr`, `desc_pr`, `prix_uni`, `prix_achat`, `qte_stock`, `pr_image`) VALUES
('2001', 10, 29, 'MSI GF63 Thin 15.6', 'Brand : MSI ||| Series : GF63 THIN 9SC-068 ||| Screen Size:15.6 Inches ||| Color : Black ||| Hard Disk Size:1TB + 256 GB ||| CPU Model : Core i5 ||| Ram Memory Installed Size : 8 GB ||| Operating System : Windows 10 Home ||| Card Description : Dedicated Graphics Coprocessor + NVIDIA GeForce GTX 1650', 13500, 12400, 9, './image/product/msilaptop.jpg'),
('4010', 10, 28, 'Dell XPS 15 15.6', 'Core I7-11800H(8-Core) 512GB PCIe SSD 16GB RAM FHD (1920x1200) 500 Nit Non Touch NVidia RTX 3050 4GB Windows 10 Professional', 19000, 18000, 34, './image/product/xps15.jpg'),
('4011', 10, 28, 'Dell Inspiron 15.6', 'AMD Ryzen 5 Processor (up to 3.5 GHz), AMD Radeon Vega 8 Graphics, 8GB DDR4 RAM, 256GB PCIe SSD, Full Keyboard, Webcam, HDMI, WiFi, Windows 11 Home', 8990, 5500, 20, './image/product/inspiron15.jpg'),
('7502', 11, 26, 'Galaxy S22 ULTRA', '(12 GB, 256 GB)', 14600, 12100, 50, './image/product/s22 ultra.jpg'),
('7513', 11, 26, 'Galaxy S21 FE', '(8 GB, 256 GB)', 7490, 6800, 50, './image/product/s1fe.jpg'),
('7514', 11, 26, 'Galaxy A04', '(4 GB, 64 GB)', 1390, 1000, 64, './image/product/a04.jpg'),
('7516', 11, 26, 'Galaxy M52- 5G', '(8 GB, 128 GB)', 3249, 2800, 40, './image/product/m52.jpg'),
('7701', 13, 26, 'Galaxy Tab S8', '(8 GB, 128 GB)', 8990, 5000, 8, './image/product/s8.jpg'),
('8155', 11, 25, ' iPhone 13 Pro', '256 GB', 15790, 12000, 30, './image/product/iphone13.jpeg'),
('8156', 11, 25, 'iPhone 14 Pro', '256 GB', 17990, 15000, 36, './image/product/iphone14.jpg'),
('8213', 13, 25, 'iPad Pro 11\"', '128 GB', 11990, 9000, 13, './image/product/ipad11.jpg'),
('8902', 10, 30, 'Huawei MateBook X Pro', '13.9\" 3K Touch, 8th Gen i7-8550U, 16 GB RAM, 512 GB SSD, GeForce MX150, 3:2 Aspect Ratio, Office 365 Personal', 15000, 13500, 8, './image/product/matebook.jpg'),
('9001', 11, 27, 'Xiaomi 12 Pro', '(12 GB, 256 GB)', 10352, 8800, 56, './image/product/12pro.jpg'),
('9002', 11, 27, 'Xiaomi Redmi 10A', '(3 GB, 64 GB)', 1535, 900, 24, './image/product/redmi11.jpg'),
('9003', 11, 27, 'Xiaomi Mi 10T', '(8Go, 128 GB)', 4699, 4000, 40, './image/product/10t.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approvisionnement`
--
ALTER TABLE `approvisionnement`
  ADD PRIMARY KEY (`num_app`),
  ADD KEY `fk_four_app` (`id_four`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`num_com`),
  ADD KEY `fk_com_cli` (`id_cli`);

--
-- Indexes for table `contient_pr`
--
ALTER TABLE `contient_pr`
  ADD PRIMARY KEY (`num_pr`,`num_com`),
  ADD KEY `fk_com_pr` (`num_com`);

--
-- Indexes for table `est_compose`
--
ALTER TABLE `est_compose`
  ADD PRIMARY KEY (`num_app`,`num_pr`),
  ADD KEY `fk_pr_app` (`num_pr`);

--
-- Indexes for table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id_marque`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`num_pr`),
  ADD KEY `fk_categorie` (`id_cat`),
  ADD KEY `fk_marque` (`id_marque`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `marque`
--
ALTER TABLE `marque`
  MODIFY `id_marque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approvisionnement`
--
ALTER TABLE `approvisionnement`
  ADD CONSTRAINT `fk_four_app` FOREIGN KEY (`id_four`) REFERENCES `fournisseur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_com_cli` FOREIGN KEY (`id_cli`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contient_pr`
--
ALTER TABLE `contient_pr`
  ADD CONSTRAINT `fk_com_pr` FOREIGN KEY (`num_com`) REFERENCES `commande` (`num_com`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pr_com` FOREIGN KEY (`num_pr`) REFERENCES `produit` (`num_pr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `est_compose`
--
ALTER TABLE `est_compose`
  ADD CONSTRAINT `fk_app_pr` FOREIGN KEY (`num_app`) REFERENCES `approvisionnement` (`num_app`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pr_app` FOREIGN KEY (`num_pr`) REFERENCES `produit` (`num_pr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_marque` FOREIGN KEY (`id_marque`) REFERENCES `marque` (`id_marque`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
