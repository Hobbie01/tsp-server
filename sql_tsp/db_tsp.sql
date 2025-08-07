-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Aug 06, 2025 at 03:48 PM
-- Server version: 9.3.0
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `score` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drug_atb`
--

CREATE TABLE `drug_atb` (
  `drug_id` int NOT NULL,
  `drug_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drug_atb`
--

INSERT INTO `drug_atb` (`drug_id`, `drug_name`) VALUES
(1, 'Amikacin '),
(2, 'Augmentin'),
(3, 'Amoxycillin '),
(4, 'Amphotericin-B'),
(5, 'Ampicillin'),
(6, 'Sulbactam'),
(7, 'Azithomycin'),
(8, 'Cefazolin'),
(9, 'Ceftazidime (Cef-4)'),
(10, 'Ceftriaxone (Cef-3)'),
(11, 'Cefuroxime (Zinacef)'),
(12, 'Ciprofloxacin'),
(13, 'Clindamycin'),
(14, 'Cloxacillin'),
(15, 'Colistin'),
(16, 'Co-trimoxazole'),
(17, 'Ertapenem'),
(18, 'Erythomycin'),
(19, 'Fluconazole'),
(20, 'Fosfomycin'),
(21, 'Gentamicin'),
(22, 'Imipenem'),
(23, 'Levofloxacin'),
(24, 'Linezolid (Zyvox)'),
(25, 'Meropenem'),
(26, 'Metronidozole'),
(27, 'Tazocin (Astaz-P)'),
(28, 'Sulperazole (Sulcef)'),
(29, 'Tigecycline'),
(30, 'Vancomycin'),
(31, 'Acyclovir'),
(32, 'Ampicillin/Sulbactam (Unasyn)'),
(33, 'Zinacef (Cefuroxime)'),
(34, 'Claforan (Cefotaxime)');

-- --------------------------------------------------------

--
-- Table structure for table `logs_orweb`
--

CREATE TABLE `logs_orweb` (
  `log_id` int NOT NULL,
  `user_id` int NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `page_accessed` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `logs_orweb`
--

INSERT INTO `logs_orweb` (`log_id`, `user_id`, `ip_address`, `page_accessed`, `timestamp`) VALUES
(1, 5347, '10.87.100.134', '10.87.252.113/tsp/nok/login.php', '2025-01-22 16:52:35'),
(2, 5347, '10.87.100.134', '10.87.252.113/tsp/nok/login.php', '2025-01-22 16:52:45'),
(3, 5347, '10.87.100.134', '10.87.252.113/tsp/nok/login.php', '2025-01-22 16:53:13'),
(4, 5347, '10.87.100.134', '10.87.252.113/tsp/nok/login.php', '2025-01-22 16:54:02'),
(5, 4268, '10.87.223.1', '10.87.252.113/tsp/nok/login.php', '2025-01-22 16:58:03'),
(6, 4268, '10.87.223.1', '10.87.252.113/tsp/nok/login.php', '2025-01-22 16:58:33'),
(7, 4268, '10.87.223.1', '10.87.252.113/tsp/login.php', '2025-01-22 21:02:10'),
(8, 4268, '10.87.223.1', '10.87.252.113/tsp/login.php', '2025-01-22 21:02:16'),
(9, 4268, '10.87.223.1', '10.87.252.113/tsp/login.php', '2025-01-22 21:02:24'),
(10, 4268, '10.87.223.1', '10.87.252.113/tsp/logout.php', '2025-01-22 21:05:08'),
(11, 4268, '10.87.223.1', '10.87.252.113/tsp/login.php', '2025-01-22 21:05:15'),
(12, 4268, '10.87.223.1', '10.87.252.113/tsp/logout.php', '2025-01-22 21:07:29'),
(13, 4268, '10.87.223.1', '10.87.252.113/tsp/login.php', '2025-01-22 21:07:38'),
(14, 4268, '10.87.223.1', '10.87.252.113/tsp/logout.php', '2025-01-22 21:07:43'),
(15, 4268, '10.87.223.1', '10.87.252.113/tsp/index.php', '2025-01-22 21:09:15'),
(16, 4268, '10.87.223.1', '10.87.252.113/tsp/nok/login.php', '2025-01-22 21:13:40'),
(17, 4268, '10.87.223.1', '10.87.252.113/tsp/logout.php', '2025-01-22 21:14:50'),
(18, 4268, '10.87.223.1', '10.87.252.113/tsp/login.php', '2025-01-22 21:14:57'),
(19, 4268, '10.87.223.1', '10.87.252.113/tsp/nok/logout.php', '2025-01-22 21:15:58'),
(20, 4268, '10.87.223.1', '10.87.252.113/tsp/nok/login.php', '2025-01-22 21:16:23'),
(21, 4268, '10.87.223.1', '10.87.252.113/tsp/logout.php', '2025-01-22 21:26:01'),
(22, 4268, '10.87.223.1', '10.87.252.113/tsp/nok/login.php', '2025-01-22 21:26:31'),
(23, 4268, '10.87.223.1', '10.87.252.113/tsp/nok/login.php', '2025-01-22 21:28:46'),
(24, 4268, '10.87.223.1', '10.87.252.113/tsp/nok/logout.php', '2025-01-22 21:28:58'),
(25, 4268, '10.87.223.1', '10.87.252.113/tsp/nok/login.php', '2025-01-22 21:32:12'),
(26, 4268, '10.87.223.1', '10.87.252.113/tsp/logout.php', '2025-01-22 21:33:20'),
(27, 4268, '10.87.223.1', '10.87.252.113/tsp/login/login.php', '2025-01-23 15:58:45'),
(28, 4268, '10.87.223.1', '10.87.252.113/tsp/login/login.php', '2025-01-23 16:04:13'),
(29, 4268, '10.87.223.1', '10.87.252.113/tsp/login/login.php', '2025-01-23 16:38:54'),
(30, 4268, '10.87.223.1', '10.87.252.113/tsp/login/login.php', '2025-01-23 19:09:35'),
(31, 4268, '10.87.223.1', '10.87.252.113/tsp/login/login.php', '2025-01-23 19:21:21'),
(32, 4268, '10.87.223.1', '10.87.252.113/tsp/login/logout.php', '2025-01-23 19:37:37'),
(33, 4268, '10.87.223.1', '10.87.252.113/tsp/login/login.php', '2025-01-23 19:37:46'),
(34, 4268, '10.87.223.1', '10.87.252.113/tsp/login/login.php', '2025-01-23 20:48:16'),
(35, 4268, '10.87.223.1', '10.87.252.113/tsp/login/login.php', '2025-01-23 20:49:12'),
(36, 4268, '10.87.223.1', '10.87.252.113/tsp/login/login.php', '2025-01-23 20:57:39'),
(37, 4268, '10.87.223.1', '10.87.252.113/tsp/login/login.php', '2025-01-23 21:16:29'),
(38, 4268, '10.87.223.1', '10.87.252.113/tsp/login/login.php', '2025-01-24 02:31:34'),
(39, 4268, '10.87.223.1', '10.87.252.113/tsp/login/login.php', '2025-01-26 16:00:06'),
(40, 4268, '10.87.223.1', '10.87.252.113/tsp/login/logout.php', '2025-01-26 20:04:57'),
(41, 4268, '10.87.223.1', '10.87.252.113/tsp/login/login.php', '2025-01-26 20:05:02'),
(42, 4268, '10.87.223.1', '10.87.252.113/tsp/login/login.php', '2025-01-26 23:23:25'),
(43, 4268, '10.87.223.1', '10.87.252.113/tsp/login/login.php', '2025-01-26 23:31:01'),
(44, 4268, '10.87.223.1', '10.87.252.113/tsp/login/login.php', '2025-01-27 00:33:51'),
(45, 4268, '10.87.223.1', '10.87.252.113/tsp/login/login.php', '2025-01-27 00:36:45'),
(46, 4268, '10.87.223.1', '10.87.252.113/tsp/login/login.php', '2025-01-27 00:57:41'),
(47, 4268, '10.87.223.1', '10.87.252.113/tsp/login/login.php', '2025-01-27 00:58:07'),
(48, 2724, '10.87.197.179', '10.87.252.113/tsp/login/login.php', '2025-01-27 10:00:31'),
(49, 5040, '10.87.197.129', '10.87.252.113/tsp/login/login.php', '2025-01-27 10:08:55'),
(50, 5040, '10.87.197.79', '10.87.252.113/tsp/login/login.php', '2025-01-27 10:09:56'),
(51, 3661, '10.87.197.150', '10.87.252.113/tsp/login/login.php', '2025-01-27 10:10:10'),
(52, 3661, '10.87.197.150', '10.87.252.113/tsp/login/logout.php', '2025-01-27 10:10:35'),
(53, 4268, '10.60.91.88', '10.87.252.113/tsp/login/login.php', '2025-01-31 09:00:50'),
(54, 4268, '10.60.91.88', '10.87.252.113/tsp/login/login.php', '2025-01-31 09:07:37'),
(55, 4268, '10.87.152.158', '10.87.252.113/tsp/login/login.php', '2025-01-31 09:08:42'),
(56, 3152, '10.87.197.63', '10.87.252.113/tsp/login/login.php', '2025-02-01 11:21:48'),
(57, 3152, '10.87.197.63', '10.87.252.113/tsp/login/login.php', '2025-02-01 11:29:50'),
(58, 4268, '10.87.100.146', '10.87.252.113/tsp/login/login.php', '2025-02-21 14:29:36'),
(59, 2724, '10.87.197.150', '10.87.252.113/tsp/login/login.php', '2025-02-26 14:53:16'),
(60, 3152, '10.87.197.63', '10.87.252.113/tsp/login/login.php', '2025-02-26 14:56:33'),
(61, 2724, '10.87.197.150', '10.87.252.113/tsp/login/login.php', '2025-02-26 16:22:41'),
(62, 3661, '10.87.197.51', '10.87.252.113/tsp/login/login.php', '2025-02-26 16:27:38'),
(63, 2724, '10.87.197.150', '10.87.252.113/tsp/login/login.php', '2025-02-27 10:35:53'),
(64, 2724, '10.87.197.150', '10.87.252.113/tsp/login/login.php', '2025-02-27 10:35:53'),
(65, 3661, '10.87.197.51', '10.87.252.113/tsp/login/login.php', '2025-02-27 11:28:45'),
(66, 2490, '10.87.197.168', '10.87.252.113/tsp/login/login.php', '2025-02-27 11:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `organism`
--

CREATE TABLE `organism` (
  `organism_id` int NOT NULL,
  `organism_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organism`
--

INSERT INTO `organism` (`organism_id`, `organism_name`) VALUES
(1, 'Sputum C/S'),
(2, 'TSC'),
(3, 'Urine C/S'),
(4, 'H/C'),
(5, 'Pus from wound C/S'),
(6, 'Tissue C/S'),
(7, 'Wound swab C/S'),
(8, 'Drain C/S'),
(9, 'Ascites C/S'),
(10, 'Synovial fluid C/S'),
(11, 'Stool C/S'),
(12, 'RSC'),
(13, 'Vaginal swab'),
(14, 'Nasopharyngeal swab'),
(15, 'Throat swab'),
(16, 'Eye swab'),
(17, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `speccimen`
--

CREATE TABLE `speccimen` (
  `spec_id` int NOT NULL,
  `spec_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `speccimen`
--

INSERT INTO `speccimen` (`spec_id`, `spec_name`) VALUES
(1, 'Acinetobacter spp.'),
(2, 'Acinetobacter baumannii'),
(3, 'Acinetobacter baumannii (MDR)'),
(4, 'Acinetobacter baumannii (CRO)'),
(5, 'Acinetobacter baumannii (CoRO)'),
(6, 'Klebsiella spp.'),
(7, 'Klebsiella pneumoniae'),
(8, 'Klebsiella pneumoniae (MDR)'),
(9, 'Klebsiella pneumoniae (CRO)'),
(10, 'Klebsiella pneumoniae (CoRO)'),
(11, 'Pseudomonas spp.'),
(12, 'Pseudomonas aeruginosa'),
(13, 'Pseudomonas aeruginosa (MDR)'),
(14, 'Pseudomonas aeruginosa (CRO)'),
(15, 'Pseudomonas aeruginosa (CoRO)'),
(16, 'Escherichia coli'),
(17, 'Escherichia coli (MDR)'),
(18, 'Escherichia coli (CRO)'),
(19, 'Escherichia coli (CoRO)'),
(20, 'Enterobacter spp.'),
(21, 'Enterobacter cloacae'),
(22, 'Enterobacter cloacae (CRO)'),
(23, 'Enterobacter cloacae (CoRO)'),
(24, 'Staphylococcus spp.'),
(25, 'Staphylococcus aureus'),
(26, 'Staphylococcus aureus (MRSA)'),
(27, 'Staphylococcus epidermidis'),
(28, 'Stenotrophomonas maltophilia'),
(29, 'Stenotrophomonas maltophilia (MDR)'),
(30, 'Enterococcus spp.'),
(31, 'Enterococcus faecalis'),
(32, 'Enterococcus facium'),
(33, 'Enterococcus facium (VRE)'),
(34, 'Burkholderia cepacia'),
(35, 'Proteus mirabilis'),
(36, 'Morganella morganii'),
(37, 'Myroides odoratus'),
(38, 'Corynebacterium'),
(39, 'Citrobacter spp.'),
(40, 'Bacillus spp.'),
(41, 'Aeromonas spp.'),
(42, 'Achromobacter spp.'),
(43, 'Clostridium difficile'),
(44, 'Candida spp.'),
(45, 'Candida albicans'),
(46, 'Aspergillus'),
(47, 'Influenza virus'),
(48, 'Enterovirus/rhinovirus'),
(49, 'RSV'),
(50, 'SARS-CoV-2'),
(51, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

CREATE TABLE `table1` (
  `table1_id` int NOT NULL,
  `a1` varchar(255) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `HN` varchar(255) DEFAULT NULL,
  `AN` varchar(255) DEFAULT NULL,
  `DX` text,
  `UD` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `date_in` varchar(19) DEFAULT NULL,
  `date_out` varchar(19) DEFAULT NULL,
  `date_move` varchar(19) DEFAULT NULL,
  `from_ward` varchar(255) DEFAULT NULL,
  `date_infect` varchar(19) DEFAULT NULL,
  `ward_infect` varchar(255) DEFAULT NULL,
  `dep_infect` varchar(255) DEFAULT NULL,
  `status1` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `status2` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `st` varchar(255) DEFAULT NULL,
  `off` varchar(255) DEFAULT NULL,
  `other_in` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `cauti` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `non_cauti` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `table1`
--

INSERT INTO `table1` (`table1_id`, `a1`, `pname`, `fname`, `lname`, `age`, `HN`, `AN`, `DX`, `UD`, `date_in`, `date_out`, `date_move`, `from_ward`, `date_infect`, `ward_infect`, `dep_infect`, `status1`, `status2`, `st`, `off`, `other_in`, `cauti`, `non_cauti`, `timestamp`) VALUES
(1, '1', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '1', 'Organic mood [affective] disorders', '1', '2025-01-22 16:12:39', '2025-01-22 16:12:41', '1900-01-01 00:00:00', '1', '1900-01-01 00:00:00', '1', '1', '1', '0', '1', '1', '1', '1', '0', '2025-01-22 16:10:32'),
(2, '2', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '2', '', '', '2025-01-22 16:24:08', '2025-01-22 16:24:09', '', '', '', '', '', '1', '', '', '', '', '1', '', '2025-01-22 16:23:33'),
(3, '3', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '3', 'Multisensory dizziness', '3', '2025-01-22 21:38:29', '', '', '3', '', '3', '3', '1', '', '3', '3', '', '1', '', '2025-01-22 06:36:12'),
(4, '41', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '', 'Organic mood [affective] disorders', '41', '2025-01-22 22:10:01', '2025-01-22 22:10:02', '2025-01-22 22:16:03', '41', '2025-01-22 07:16:06', '', '', '1', '', '41', '41', '', '1', '', '2025-01-22 07:47:02'),
(5, '1', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '', 'Organic mood [affective] disorders', '1', '2025-01-23 12:34:29', '2025-01-22 09:32:15', '2025-01-22 09:32:15', '1', '2025-01-22 09:32:15', '1', '1', '1', '', '1', '1', '', '1', '', '2025-01-22 09:32:15'),
(6, '1', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '', 'Organic mood [affective] disorders', '1', '2025-01-23 12:34:29', '2025-01-22 09:33:04', '2025-01-22 09:33:04', '1', '2025-01-22 09:33:04', '1', '1', '1', '', '1', '1', '', '1', '', '2025-01-22 09:33:04'),
(7, '1', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '', 'Organic mood [affective] disorders', '1', '2025-01-23 12:34:29', '2025-01-22 09:38:30', '2025-01-22 09:38:30', '1', '2025-01-22 09:38:30', '1', '1', '1', '', '1', '1', '', '1', '', '2025-01-22 09:38:30'),
(8, '14', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '4', 'Organic mood [affective] disorders', '14', '2025-01-23 12:34:29', '2025-01-22 09:39:12', '2025-01-22 09:39:12', '14', '2025-01-22 09:39:12', '14', '14', '1', '', '14', '14', '', '1', '', '2025-01-22 10:43:55'),
(10, '8', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '8', 'Acute gastritis', '8', '2025-01-23 08:06:58', '2025-01-23 08:06:59', '2025-01-23 08:06:59', '5', '2025-01-23 08:07:01', '5', '5', '', '1', '', '', '5', '', '1', '2025-01-23 05:05:20'),
(14, '9', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '9', 'Hypothyroidism following radioiodine therapy', '9', '2568-01-23 00:00:00', '2568-01-23 00:00:00', '2568-01-23 00:00:00', '9', '2568-01-23 00:00:00', '9', '9', '', '1', '', '', '9', '', '1', '2025-08-03 15:48:48'),
(15, 'a', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', 'a', 'Organic mood [affective] disorders', 'a', '2025-01-23 08:28:18', '2025-01-23 08:28:18', '2025-01-23 08:28:20', 'a', '2025-01-23 08:28:21', '7a', '7a', '', '', '', '', 'aaa', '', '1', '2025-01-23 05:26:09'),
(21, '5', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '5', 'Organic mood [affective] disorders', '5', '2025-01-23 08:35:06', '2025-01-23 08:35:07', '2025-01-23 08:35:10', '5', '2025-01-23 08:35:11', '5', '5', '', '1', '', '', '5', '', '1', '2025-01-23 05:32:48'),
(24, '6', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '6', 'Organic mood [affective] disorders', '6', '2025-01-23 08:40:03', '2025-01-23 08:40:03', '2025-01-23 05:37:43', '6', '2025-01-23 05:37:43', '6', '6', '', '1', '', '', '6', '', '1', '2025-01-23 05:37:43'),
(26, '8', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '8', '8', '8', '2025-01-23 08:44:15', '2025-01-23 08:44:15', '2025-01-23 08:44:18', '8', '2025-01-23 08:44:18', '8', '8', '', '1', '', '', '8', '', '1', '2025-01-23 05:43:02'),
(30, '1', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '1', 'Organic mood [affective] disorders', '1', '2025-01-23 09:22:22', '2025-01-23 09:22:23', '2025-01-23 09:22:24', '1', '2025-01-23 09:22:25', '1', '', '', '1', '', '', '1', '', '1', '2025-01-23 06:20:02'),
(34, '4', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', 'a', 'a', 'a', '2025-01-23 09:30:48', '2025-01-23 09:30:50', '2025-01-23 09:30:51', 'a', '2025-01-23 09:30:52', 'a', 'a', '', '1', '', '', 'a', '', '1', '2025-01-23 06:28:28'),
(35, '7', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '7', 'Graves disease', '7', '2025-01-23 10:40:42', '2025-01-23 10:40:43', '2025-01-23 10:40:44', '7', '2025-01-23 10:40:45', '7', '7', '1', '', '7', '7', '', '1', '', '2025-01-23 07:38:22'),
(37, '91', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '91', 'Organic mood [affective] disorders', '91', '3111-01-23 00:00:00', '3111-01-23 00:00:00', '3111-01-23 00:00:00', '91', '3111-01-23 00:00:00', '', '91', '1', '', '91', '91', '', '1', '1', '2025-08-03 15:49:11'),
(38, '221', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '221', 'Organic mood [affective] disorders', '221', '2025-01-24 12:06:05', '2025-01-24 12:06:06', '2025-01-23 09:03:42', '221', '2025-01-23 09:03:42', '221', '221', '', '1', '', '', '22', '', '1', '2025-01-23 09:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `table2`
--

CREATE TABLE `table2` (
  `table2_id` int NOT NULL,
  `b1` varchar(255) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `b3` varchar(255) DEFAULT NULL,
  `b4` varchar(255) DEFAULT NULL,
  `b5` varchar(255) DEFAULT NULL,
  `b6` varchar(255) DEFAULT NULL,
  `b7` varchar(255) DEFAULT NULL,
  `b8` varchar(255) DEFAULT NULL,
  `b9` varchar(19) DEFAULT NULL,
  `b10` varchar(19) DEFAULT NULL,
  `b11` varchar(255) DEFAULT NULL,
  `b12` varchar(10) DEFAULT NULL,
  `b13` varchar(255) DEFAULT NULL,
  `b14` char(10) DEFAULT NULL,
  `b15` text,
  `b16` varchar(255) DEFAULT NULL,
  `b17` varchar(19) DEFAULT NULL,
  `b18` char(10) DEFAULT NULL,
  `b19` char(10) DEFAULT NULL,
  `b20` char(10) DEFAULT NULL,
  `b21` char(10) DEFAULT NULL,
  `b22` char(10) DEFAULT NULL,
  `b23` char(10) DEFAULT NULL,
  `b24` char(10) DEFAULT NULL,
  `b25` char(10) DEFAULT NULL,
  `b26` char(10) DEFAULT NULL,
  `b27` varchar(10) DEFAULT NULL,
  `b28` text,
  `b29` char(10) DEFAULT NULL,
  `b30` text,
  `b31` varchar(255) DEFAULT NULL,
  `b32` varchar(255) DEFAULT NULL,
  `b33` varchar(255) DEFAULT NULL,
  `b34` char(10) DEFAULT NULL,
  `b35` text,
  `b36` char(10) DEFAULT NULL,
  `b37` char(10) DEFAULT NULL,
  `b38` char(10) DEFAULT NULL,
  `b39` char(10) DEFAULT NULL,
  `b40` char(10) DEFAULT NULL,
  `b41` char(10) DEFAULT NULL,
  `b42` char(10) DEFAULT NULL,
  `b43` char(10) DEFAULT NULL,
  `b44` char(10) DEFAULT NULL,
  `b45` text,
  `b46` char(10) DEFAULT NULL,
  `b47` char(10) DEFAULT NULL,
  `b48` char(10) DEFAULT NULL,
  `b49` char(10) DEFAULT NULL,
  `b50` char(10) DEFAULT NULL,
  `b51` varchar(255) DEFAULT NULL,
  `b52` char(10) DEFAULT NULL,
  `b53` varchar(255) DEFAULT NULL,
  `b54` varchar(255) DEFAULT NULL,
  `b55` text,
  `b56` varchar(255) DEFAULT NULL,
  `b57` text,
  `b58` text,
  `b59` varchar(255) DEFAULT NULL,
  `b60` varchar(255) DEFAULT NULL,
  `table1_id` char(10) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `table2`
--

INSERT INTO `table2` (`table2_id`, `b1`, `pname`, `fname`, `lname`, `b3`, `b4`, `b5`, `b6`, `b7`, `b8`, `b9`, `b10`, `b11`, `b12`, `b13`, `b14`, `b15`, `b16`, `b17`, `b18`, `b19`, `b20`, `b21`, `b22`, `b23`, `b24`, `b25`, `b26`, `b27`, `b28`, `b29`, `b30`, `b31`, `b32`, `b33`, `b34`, `b35`, `b36`, `b37`, `b38`, `b39`, `b40`, `b41`, `b42`, `b43`, `b44`, `b45`, `b46`, `b47`, `b48`, `b49`, `b50`, `b51`, `b52`, `b53`, `b54`, `b55`, `b56`, `b57`, `b58`, `b59`, `b60`, `table1_id`, `timestamp`) VALUES
(1, '3', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '35', '3', '3', '3', '3', '2025-01-22 21:40:06', '', '3', '1', '3', '', '', '3', '', '1', '1', '', '1', '1', '', '1', '', '', '1', '3', '', '', '3', '', '', '1', '3', '', '1', '1', '', '1', '1', '1', '', '1', '3', '1', '333', '', '', '1', '333', '', '', '33333333333333333', '33333333333333333333333333', '3333333333', '333333333333333', '333333333333', '33333333', '3333333333', '3', '2025-01-22 06:38:10'),
(2, '41', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '35', '41', '41', '41', '41', '2025-01-22 23:08:49', '2025-01-22 23:08:50', '1', '1', '41', '2', '1', '41', '2025-01-22 23:10:51', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '41', '1', '1', '41', '1', '1', '1', '41', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '41', '1', '1', '1', '441', '1', '1', '4444444444441', '444444444444444444441', '444441', '44444444441', '44444444444444441', '444444441', '444444444441', '4', '2025-01-22 07:08:43'),
(7, '91', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '35', '91', '91', '91', '91', '2025-01-23 11:52:12', '2025-01-23 11:52:11', '91', '1', '91', '', '', '', '2025-01-23 08:57:12', '1', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '991', '999991', '91', '9991', '9999991', '991', '991', '37', '2025-01-23 08:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `table3`
--

CREATE TABLE `table3` (
  `table3_id` int NOT NULL,
  `c1` char(10) DEFAULT NULL,
  `c2` char(10) DEFAULT NULL,
  `c3` char(10) DEFAULT NULL,
  `c4` char(10) DEFAULT NULL,
  `c5` char(10) DEFAULT NULL,
  `c6` char(10) DEFAULT NULL,
  `c7` char(10) DEFAULT NULL,
  `c8` char(10) DEFAULT NULL,
  `c9` char(10) DEFAULT NULL,
  `c10` char(10) DEFAULT NULL,
  `c11` char(10) DEFAULT NULL,
  `c12` char(10) DEFAULT NULL,
  `c13` char(10) DEFAULT NULL,
  `c14` char(10) DEFAULT NULL,
  `c15` char(10) DEFAULT NULL,
  `c16` char(10) DEFAULT NULL,
  `c17` char(10) DEFAULT NULL,
  `c18` char(10) DEFAULT NULL,
  `c19` char(10) DEFAULT NULL,
  `c20` char(10) DEFAULT NULL,
  `c21` char(10) DEFAULT NULL,
  `c22` char(10) DEFAULT NULL,
  `c23` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `table1_id` char(10) DEFAULT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `table3`
--

INSERT INTO `table3` (`table3_id`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`, `c8`, `c9`, `c10`, `c11`, `c12`, `c13`, `c14`, `c15`, `c16`, `c17`, `c18`, `c19`, `c20`, `c21`, `c22`, `c23`, `table1_id`, `timestamp`) VALUES
(1, '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '1', '1', '1', '1', '3', '2025-01-22 06:36:36'),
(2, '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '4', '2025-01-22 07:54:54'),
(3, '1', '1', '0', '1', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '1', '0', '1', '1', '0', '1', '1', '1', '1', '10', '2025-01-23 05:07:18'),
(4, '1', '1', '0', '1', '1', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '1', '1', '1', '1', '24', '2025-01-23 05:39:30'),
(5, '1', '1', '0', '1', '1', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '0', '0', '1', '1', '1', '1', '1', '34', '2025-01-23 06:28:40'),
(6, '1', '', '', '1', '', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '35', '2025-01-23 07:38:32'),
(8, '1', '1', '', '1', '1', '', '1', '1', '', '1', '1', '', '1', '1', '', '1', '1', '', '1', '1', '1', '1', '1', '37', '2025-07-30 16:20:05'),
(9, '', '1', '', '', '1', '1', '', '1', '1', '', '1', '1', '', '1', '1', '', '1', '1', '', '1', '1', '1', '1', '38', '2025-01-23 09:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `table4`
--

CREATE TABLE `table4` (
  `table4_id` int NOT NULL,
  `d1` char(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d2` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d3` varchar(19) DEFAULT NULL,
  `d4` varchar(255) DEFAULT NULL,
  `d5` varchar(255) DEFAULT NULL,
  `d6` char(10) DEFAULT NULL,
  `d7` varchar(255) DEFAULT NULL,
  `d8` varchar(19) DEFAULT NULL,
  `d9` text,
  `d10` varchar(255) DEFAULT NULL,
  `d11` char(10) DEFAULT NULL,
  `d12` varchar(255) DEFAULT NULL,
  `d13` varchar(19) DEFAULT NULL,
  `d14` varchar(255) DEFAULT NULL,
  `d15` varchar(255) DEFAULT NULL,
  `d16` char(10) DEFAULT NULL,
  `d17` char(10) DEFAULT NULL,
  `d18` text,
  `d19` varchar(19) DEFAULT NULL,
  `d20` varchar(19) DEFAULT NULL,
  `d21` varchar(255) DEFAULT NULL,
  `d22` varchar(19) DEFAULT NULL,
  `d23` varchar(19) DEFAULT NULL,
  `d24` varchar(255) DEFAULT NULL,
  `d25` varchar(19) DEFAULT NULL,
  `d26` varchar(19) DEFAULT NULL,
  `d27` char(10) DEFAULT NULL,
  `d28` char(10) DEFAULT NULL,
  `d29` varchar(255) DEFAULT NULL,
  `d30` varchar(255) DEFAULT NULL,
  `d31` char(10) DEFAULT NULL,
  `d32` varchar(255) DEFAULT NULL,
  `d33` char(10) DEFAULT NULL,
  `d34` varchar(255) DEFAULT NULL,
  `d35` varchar(255) DEFAULT NULL,
  `d36` varchar(19) DEFAULT NULL,
  `table1_id` char(10) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `table4`
--

INSERT INTO `table4` (`table4_id`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `d26`, `d27`, `d28`, `d29`, `d30`, `d31`, `d32`, `d33`, `d34`, `d35`, `d36`, `table1_id`, `timestamp`) VALUES
(5, '1', '22', '2025-01-24 12:06:26', '222', '22', '', '', '2025-01-23 09:04:13', '', '', '', '', '2025-01-23 09:04:13', '', '', '', '1', '222', '2025-01-24 12:06:34', '2025-01-24 12:06:34', '', '2025-01-23 09:04:13', '2025-01-23 09:04:13', '', '2025-01-23 09:04:13', '2025-01-23 09:04:13', '', '1', '22', '22', '22', '22', '', '22', '22', '2025-01-24 12:06:42', '38', '2025-01-23 09:18:14'),
(4, '1', '91', '2025-01-23 11:51:45', '91', '91', '', '', '2025-01-23 08:49:26', '', '', '', '', '2025-01-23 08:49:26', '', '', '', '1', '91', '2025-01-23 11:51:48', '2025-01-23 11:51:49', '', '2025-01-23 08:49:26', '2025-01-23 08:49:26', '', '2025-01-23 08:49:26', '2025-01-23 08:49:26', '', '1', '91', '91', '91', '91', '', '91', '91', '2025-01-23 11:51:54', '37', '2025-01-23 09:18:27'),
(2, '1', '8', '2025-01-23 08:10:12', '8', '8', '1', '8', '2025-01-28 08:10:14', '8', '8', '', '', '2025-01-23 05:08:16', '', '', '', '1', '8', '2025-01-23 08:10:28', '2025-01-23 08:10:28', '8', '2025-01-23 08:10:30', '2025-01-23 08:10:31', '', '2025-01-23 05:08:16', '2025-01-23 05:08:16', '', '1', '8', '8', '8', '8', '', '8', '8', '2025-01-23 08:10:42', '10', '2025-01-23 05:08:16'),
(1, '1', '41', '2025-01-22 22:10:22', '41', '41', '', '1', '2025-01-22 23:01:30', '1', '1', '', '1', '2025-01-22 23:01:34', '1', '1', '', '1', '41', '2025-01-22 22:10:26', '2025-01-22 22:10:27', '1', '2025-01-22 23:01:37', '2025-01-22 23:01:38', '', '2025-01-22 08:06:03', '2025-01-22 08:06:03', '', '1', '4', '4', '4', '1', '', '4', '4', '1900-01-01 00:00:00', '4', '2025-01-22 08:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `tableb1`
--

CREATE TABLE `tableb1` (
  `tableb1_id` int NOT NULL,
  `a1` varchar(255) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `HN` varchar(255) DEFAULT NULL,
  `AN` varchar(255) DEFAULT NULL,
  `DX` text,
  `UD` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `date_in` varchar(19) DEFAULT NULL,
  `date_out` varchar(19) DEFAULT NULL,
  `date_move` varchar(19) DEFAULT NULL,
  `from_ward` varchar(255) DEFAULT NULL,
  `date_infect` varchar(19) DEFAULT NULL,
  `ward_infect` varchar(255) DEFAULT NULL,
  `dep_infect` varchar(255) DEFAULT NULL,
  `Yes` char(10) DEFAULT NULL,
  `No` char(10) DEFAULT NULL,
  `st` varchar(255) DEFAULT NULL,
  `off` varchar(255) DEFAULT NULL,
  `check` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tableb1`
--

INSERT INTO `tableb1` (`tableb1_id`, `a1`, `pname`, `fname`, `lname`, `age`, `HN`, `AN`, `DX`, `UD`, `date_in`, `date_out`, `date_move`, `from_ward`, `date_infect`, `ward_infect`, `dep_infect`, `Yes`, `No`, `st`, `off`, `check`, `timestamp`) VALUES
(2, '21', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '', 'Hypothyroidism following radioiodine therapy', '21', '2025-01-22 23:29:59', '2025-01-22 23:56:46', '2025-01-22 23:56:45', '21', '2025-01-22 23:56:46', '21', '21', '1', '', '21', '21', '1', '2025-01-22 09:10:36'),
(3, '5', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '5', 'Organic mood [affective] disorders', '5', '2025-01-23 12:46:56', '2025-01-23 12:52:56', '', '5', '', '5', '5', '1', '', '5', '5', '2', '2025-01-22 09:50:35'),
(4, '61', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '', 'Organic mood [affective] disorders', '61', '2025-01-23 12:54:36', '2025-01-23 12:54:36', '', '61', '', '61', '61', '1', '', '61', '61', '1', '2025-01-22 10:55:10'),
(9, '51', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '51', 'Organic mood [affective] disorders', '51', '2025-01-24 12:21:39', '2025-01-24 12:21:39', '2025-01-23 09:23:08', '5', '2025-01-23 09:23:08', '', '5', '1', '', '5', '5', '1', '2025-01-23 09:26:59'),
(10, '61', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '61', 'Organic mood [affective] disorders', '61', '2025-01-24 12:28:24', '2025-01-24 12:28:25', '2025-01-23 09:26:00', '61', '2025-01-23 09:26:00', 'งานการพยาบาลผู้ป่วยพิเศษ 1(6จ)', '61', '', '1', '', '', '2', '2025-04-21 21:10:50'),
(11, 'งานการพยาบาลศัลยกรรม(3ก)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '', 'Organic mood [affective] disorders', '', '2025-01-26 06:13:15', '2025-01-26 06:13:15', '2025-01-26 03:10:41', 'งานการพยาบาลอายุรกรรม 1(4ข-2)', '2025-01-26 03:10:41', 'งานการพยาบาลออร์โธปิดิกส์(3ฉ)', '', '1', '', '', '', '1', '2025-01-26 08:42:16'),
(12, 'งานการพยาบาลอายุรกรรม 1(4ข-1)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '2', 'Organic mood [affective] disorders', '', '2025-01-26 08:18:45', '2025-01-26 08:18:46', '2025-01-26 08:18:46', 'งานการพยาบาลออร์โธปิดิกส์(5ค)', '2012-01-26 08:19:00', 'งานการพยาบาลจักษุ โสต จิตเวชและตรวจวินิจฉัยพิเศษ(5ง)', '', '1', '', '1', '2', '1', '2025-01-26 08:31:09'),
(13, 'งานการพยาบาลสูติ-นรีเวชกรรม(ห้องคลอด)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '', 'Organic mood [affective] disorders', '', '2025-01-26 08:57:35', '2025-01-26 08:57:35', '2025-01-26 08:57:35', 'งานการพยาบาลอายุรกรรม 2(หน่วยไตและไตเทียม)', '2025-01-26 08:57:35', 'งานการพยาบาลห้องผ่าตัด 1(หน่วยผ่าตัด 3)', '', '1', '', '', '', '1', '2025-01-26 08:57:35'),
(14, 'งานการพยาบาลสูติ-นรีเวชกรรม(5ข)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '', 'Organic mood [affective] disorders', '', '2025-01-26 09:00:20', '2025-01-26 09:00:20', '2025-01-26 09:00:20', 'งานการพยาบาลผู้ป่วยวิกฤต 3(SICU1)', '2025-01-26 09:00:20', 'งานการพยาบาลผู้ป่วยพิเศษ 2(สว.11)', '', '1', '', '', '', '1', '2025-01-26 09:01:45'),
(15, '', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '', 'Organic mood [affective] disorders', '', '2025-01-30 07:29:51', '2025-01-30 07:29:51', '2025-01-30 07:29:51', '', '2025-01-30 07:29:51', '', '', '1', '', '', '', '1', '2025-01-30 19:48:35'),
(16, '', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '', 'Graves disease', '', '2025-01-30 07:32:52', '2025-01-30 07:32:52', '2025-01-30 07:32:52', '', '2025-01-30 07:32:52', '', '', '1', '', '', '', '1', '2025-07-08 00:43:43'),
(17, '', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '', 'Organic mood [affective] disorders', '', '2025-07-08 12:29:26', '2025-07-08 02:18:18', '2025-07-08 12:29:26', '', '2025-07-08 02:18:07', '', '', '', '', '', '', '1', '2025-07-08 00:43:31'),
(18, '1', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '1', 'Abnormal uterine and vaginal bleeding, unspecified', '1', '2568-08-18 00:00:00', '2025-08-04 12:35:43', '2025-08-04 12:35:43', 'งานการพยาบาลอายุรกรรม 1(4ข-3)', '2025-08-04 12:35:43', 'งานวิสัญญีพยาบาล(งานวิสัญญีพยาบาล)', 'งานการพยาบาลออร์โธปิดิกส์', '1', '', '', '', '1', '2025-08-04 12:35:43'),
(19, '', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '', 'Hypothyroidism following radioiodine therapy', '', '2025-08-04 16:06:19', '2025-08-04 16:06:19', '2025-08-04 16:06:19', '', '2025-08-04 16:06:19', '', '', '', '', '', '', '1', '2025-08-04 16:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `tableb2`
--

CREATE TABLE `tableb2` (
  `tableb2_id` int NOT NULL,
  `b1` varchar(255) DEFAULT NULL,
  `pname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `b3` varchar(255) DEFAULT NULL,
  `b4` varchar(255) DEFAULT NULL,
  `b5` varchar(255) DEFAULT NULL,
  `b6` varchar(255) DEFAULT NULL,
  `b7` varchar(255) DEFAULT NULL,
  `b8` varchar(255) DEFAULT NULL,
  `b9` varchar(19) DEFAULT NULL,
  `b10` varchar(19) DEFAULT NULL,
  `b11` char(10) DEFAULT NULL,
  `b12` char(10) DEFAULT NULL,
  `b13` char(10) DEFAULT NULL,
  `b14` char(10) DEFAULT NULL,
  `b15` text,
  `b16` char(10) DEFAULT NULL,
  `b17` char(10) DEFAULT NULL,
  `b18` char(10) DEFAULT NULL,
  `b19` char(10) DEFAULT NULL,
  `b20` char(10) DEFAULT NULL,
  `b21` char(10) DEFAULT NULL,
  `b22` varchar(255) DEFAULT NULL,
  `b23` varchar(19) DEFAULT NULL,
  `b24` char(10) DEFAULT NULL,
  `b25` char(10) DEFAULT NULL,
  `b26` char(10) DEFAULT NULL,
  `b27` char(10) DEFAULT NULL,
  `b28` char(10) DEFAULT NULL,
  `b29` char(10) DEFAULT NULL,
  `b30` char(10) DEFAULT NULL,
  `b31` char(10) DEFAULT NULL,
  `b32` varchar(255) DEFAULT NULL,
  `b33` char(10) DEFAULT NULL,
  `b34` char(10) DEFAULT NULL,
  `b35` char(10) DEFAULT NULL,
  `b36` char(10) DEFAULT NULL,
  `b37` char(10) DEFAULT NULL,
  `b38` char(10) DEFAULT NULL,
  `b39` char(10) DEFAULT NULL,
  `b40` char(10) DEFAULT NULL,
  `b41` varchar(255) DEFAULT NULL,
  `b42` char(10) DEFAULT NULL,
  `b43` varchar(255) DEFAULT NULL,
  `b44` char(10) DEFAULT NULL,
  `b45` char(10) DEFAULT NULL,
  `b46` char(10) DEFAULT NULL,
  `b47` char(10) DEFAULT NULL,
  `b48` char(10) DEFAULT NULL,
  `b49` char(10) DEFAULT NULL,
  `b50` char(10) DEFAULT NULL,
  `b51` varchar(255) DEFAULT NULL,
  `b52` char(10) DEFAULT NULL,
  `b53` varchar(255) DEFAULT NULL,
  `b54` char(10) DEFAULT NULL,
  `b55` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b56` char(10) DEFAULT NULL,
  `b57` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b58` char(10) DEFAULT NULL,
  `b59` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `b60` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `b61` varchar(255) DEFAULT NULL,
  `b62` text,
  `b63` text,
  `b64` varchar(255) DEFAULT NULL,
  `b65` varchar(255) DEFAULT NULL,
  `b66` char(10) DEFAULT NULL,
  `tableb1_id` char(10) NOT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tableb2`
--

INSERT INTO `tableb2` (`tableb2_id`, `b1`, `pname`, `fname`, `lname`, `b3`, `b4`, `b5`, `b6`, `b7`, `b8`, `b9`, `b10`, `b11`, `b12`, `b13`, `b14`, `b15`, `b16`, `b17`, `b18`, `b19`, `b20`, `b21`, `b22`, `b23`, `b24`, `b25`, `b26`, `b27`, `b28`, `b29`, `b30`, `b31`, `b32`, `b33`, `b34`, `b35`, `b36`, `b37`, `b38`, `b39`, `b40`, `b41`, `b42`, `b43`, `b44`, `b45`, `b46`, `b47`, `b48`, `b49`, `b50`, `b51`, `b52`, `b53`, `b54`, `b55`, `b56`, `b57`, `b58`, `b59`, `b60`, `b61`, `b62`, `b63`, `b64`, `b65`, `b66`, `tableb1_id`, `timestamp`) VALUES
(2, '2', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '35', '12', '12', '12', '12', '2025-01-22 23:52:51', '2025-01-22 23:52:50', '1', '1', '1', '1', '2', '1', '1', '1', '1', '12', '1', '12', '', '1', '1', '1', '1', '1', '1', '1', '1', '2', '1', '1', '', '', '12', '2', '2', '1', '12', '1', '12', '', '1', '1', '1', '1', '1', '', '', '1', '12', '1', '222', '1', '12', '1', '11111111111222', '1111111111222', '11111111111222', '1111111111111222', '1111111111222', '11111111222', '1111111111222', NULL, '2', '2025-01-22 08:52:08'),
(3, '61', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '35', '61', '61', '61', '61', '2025-01-23 12:55:57', '2025-01-23 12:55:56', '', '1', '1', '', '', '1', '1', '', '1', '66661', '', '', '', '1', '1', '1', '1', '1', '1', '1', '', '', '', '1', '', '', '661', '661', '', '1', '661', '1', '6661', '', '1', '', '1', '', '', '', '', '1', '6661', '', '', '1', '661', '', '666666661', '6666661', '6666661', '666666661', '666661', '66661', '661', NULL, '4', '2025-01-22 09:54:57'),
(4, '51', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '36', '51', '51', '51', '51', '2025-01-23 09:25:12', '2025-01-23 09:25:12', '1', '', '', '', '', '1', '', '', '1', '51', '', '', '', '1', '1', '', '1', '1', '', '', '', '', '', '', '', '', '51', '51', '', '', '', '', '', '', '1', '', '1', '', '1', '', '', '', '', '', '', '1', '51', '1', '555555111', '55555555111', '555551', '555555551111111111', '5555555551111111', '5555551', '5555551', NULL, '9', '2025-01-23 09:25:12'),
(5, 'งานการพยาบาลจักษุ โสต จิตเวชและตรวจวินิจฉัยพิเศษ(5ง)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '36', '', '', '', '', '2025-01-26 06:14:41', '2025-01-26 06:14:42', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '11', '1111', '1', '1', NULL, '11', '2025-01-26 03:12:12'),
(8, 'งานการพยาบาลสูติ-นรีเวชกรรม(ห้องคลอด)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '35', '', '', '', '', '2025-01-26 08:59:25', '2025-01-26 08:59:25', '', '', '', '', '', '', '', '', '', '', '', '', '2025-01-26 08:59:25', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '8', '8', '8', '8', '8', '8', NULL, '13', '2025-01-26 08:59:25'),
(9, 'งานการพยาบาลสูติ-นรีเวชกรรม(5ข)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '35', '', '', '', '', '2025-01-26 09:00:43', '2025-01-26 09:00:43', '', '', '', '', '', '', '', '', '', '', '', '', '2025-01-26 09:00:43', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '14', '2025-01-26 09:00:43'),
(10, '5', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '35', '', '', '', '', '2025-01-30 07:42:09', '2025-01-30 07:42:09', '', '', '', '1', '', '', '', '', '', '', '', '', '2025-01-30 07:42:09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '16', '2025-01-30 19:42:09'),
(11, '1', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '36', '', '', '', '', '2025-08-04 12:36:11', '2025-08-04 12:36:11', '', '', '', '', '', '', '', '', '', '', '', '', '2025-08-04 12:36:11', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '18', '2025-08-04 12:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `tableb3`
--

CREATE TABLE `tableb3` (
  `tableb3_id` int NOT NULL,
  `c1` char(10) DEFAULT NULL,
  `c2` char(10) DEFAULT NULL,
  `c3` char(10) DEFAULT NULL,
  `c4` char(10) DEFAULT NULL,
  `c5` char(10) DEFAULT NULL,
  `c6` char(10) DEFAULT NULL,
  `c7` char(10) DEFAULT NULL,
  `c8` char(10) DEFAULT NULL,
  `c9` char(10) DEFAULT NULL,
  `c10` char(10) DEFAULT NULL,
  `tableb1_id` char(10) NOT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tableb3`
--

INSERT INTO `tableb3` (`tableb3_id`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`, `c8`, `c9`, `c10`, `tableb1_id`, `timestamp`) VALUES
(2, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2', '2025-01-22 09:10:40'),
(5, '1', '', '1', '', '1', '1', '1', '1', '', '1', '3', '2025-01-22 09:47:37'),
(6, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '4', '2025-01-22 10:58:50'),
(7, '1', '', '1', '1', '1', '1', '1', '1', '1', '1', '9', '2025-01-23 09:27:20'),
(8, '1', '', '1', '', '1', '1', '', '', '', '1', '10', '2025-01-26 08:36:59'),
(9, '1', '', '1', '', '', '', '', '', '', '', '11', '2025-01-26 08:42:18'),
(10, '1', '', '1', '', '', '', '', '', '', '', '12', '2025-01-26 08:31:11'),
(11, '1', '', '1', '', '', '', '', '', '', '', '13', '2025-01-26 08:57:39'),
(12, '1', '', '1', '', '', '', '', '', '', '', '14', '2025-01-26 09:01:47'),
(13, '1', '', '', '', '', '', '', '', '', '', '15', '2025-01-30 19:48:38'),
(14, '', '', '', '1', '1', '1', '', '', '', '', '16', '2025-07-08 00:43:46'),
(15, '', '', '', '', '', '', '', '', '', '', '17', '2025-07-08 00:43:34'),
(16, '1', '', '1', '', '', '1', '', '', '1', '', '18', '2025-08-04 12:35:54'),
(17, '1', '', '1', '', '1', '1', '', '', '', '1', '19', '2025-08-04 16:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `tableb4`
--

CREATE TABLE `tableb4` (
  `tableb4_id` int NOT NULL,
  `d1` char(10) DEFAULT NULL,
  `d2` varchar(255) DEFAULT NULL,
  `d3` varchar(19) DEFAULT NULL,
  `d4` varchar(255) DEFAULT NULL,
  `d5` varchar(255) DEFAULT NULL,
  `d6` char(10) DEFAULT NULL,
  `d7` varchar(255) DEFAULT NULL,
  `d8` varchar(19) DEFAULT NULL,
  `d9` text,
  `d10` varchar(255) DEFAULT NULL,
  `d11` char(10) DEFAULT NULL,
  `d12` varchar(255) DEFAULT NULL,
  `d13` varchar(19) DEFAULT NULL,
  `d14` varchar(255) DEFAULT NULL,
  `d15` varchar(255) DEFAULT NULL,
  `d16` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d17` char(10) DEFAULT NULL,
  `d18` text,
  `d19` varchar(19) DEFAULT NULL,
  `d20` varchar(19) DEFAULT NULL,
  `d21` varchar(255) DEFAULT NULL,
  `d22` varchar(19) DEFAULT NULL,
  `d23` varchar(19) DEFAULT NULL,
  `d24` varchar(255) DEFAULT NULL,
  `d25` varchar(19) DEFAULT NULL,
  `d26` varchar(19) DEFAULT NULL,
  `d27` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d28` char(10) DEFAULT NULL,
  `d29` varchar(255) DEFAULT NULL,
  `d30` varchar(255) DEFAULT NULL,
  `d31` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d32` varchar(255) DEFAULT NULL,
  `d33` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d34` varchar(255) DEFAULT NULL,
  `d35` varchar(255) DEFAULT NULL,
  `d36` varchar(19) DEFAULT NULL,
  `tableb1_id` char(10) DEFAULT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tableb4`
--

INSERT INTO `tableb4` (`tableb4_id`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `d26`, `d27`, `d28`, `d29`, `d30`, `d31`, `d32`, `d33`, `d34`, `d35`, `d36`, `tableb1_id`, `timestamp`) VALUES
(12, '', '', '2025-08-04 16:13:46', '', '', '1', '', '2025-08-04 16:13:46', '', '', 'Y', '', '2025-08-04 16:13:46', '', '', '', '', '', '2025-08-04 16:13:46', '2025-08-04 16:13:46', '', '2025-08-04 16:13:46', '2025-08-04 16:13:46', '', '2025-08-04 16:13:46', '2025-08-04 16:13:46', '', '', '', '', '', '', '', '', '', '2025-08-04 16:13:46', '19', '2025-08-04 16:13:46'),
(11, '1', '', '2025-08-04 12:36:05', '', '', '1', '', '2025-08-04 12:36:05', '', '', 'Y', '', '2025-08-04 12:36:05', '', '', '', '1', '', '2025-08-04 12:36:05', '2025-08-04 12:36:05', '', '2025-08-04 12:36:05', '2025-08-04 12:36:05', '', '2025-08-04 12:36:05', '2025-08-04 12:36:05', '', '1', '', '', '', '', '', '', '', '2025-08-04 12:36:05', '18', '2025-08-04 12:36:05'),
(10, '', '', '2025-07-08 12:43:25', '', '', '1', '', '2025-07-08 12:43:25', '', '', 'Y', '', '2025-07-08 12:43:25', '', '', '', '', '', '2025-07-08 12:43:25', '2025-07-08 12:43:25', '', '2025-07-08 12:43:25', '2025-07-08 12:43:25', '', '2025-07-08 12:43:25', '2025-07-08 12:43:25', '', '', '', '', '', '', '', '', '', '2025-07-08 12:43:25', '17', '2025-07-08 00:43:38'),
(9, '1', '', '2025-01-30 07:34:10', '', '', '1', '', '2025-01-30 07:34:10', '', '', 'Y', '', '2025-01-30 07:34:10', '', '', '', '1', '', '2025-01-30 07:34:10', '2025-01-30 07:34:10', '', '2025-01-30 07:34:10', '2025-01-30 07:34:10', '', '2025-01-30 07:34:10', '2025-01-30 07:34:10', '', '', '', '', '', '', '', '', '', '2025-01-31 10:36:35', '16', '2025-07-08 00:43:49'),
(8, '1', '1', '2025-01-27 12:03:06', '1', '1', '1', '', '2025-01-26 09:00:37', '', '', 'Y', '', '2025-01-26 09:00:37', '', '', '', '1', '1', '2025-01-21 12:03:09', '2025-01-27 12:03:10', '', '2025-01-26 09:00:37', '2025-01-26 09:00:37', '', '2025-01-26 09:00:37', '2025-01-26 09:00:37', '', '1', '1', '1', '1', '1', '', '1', '1', '2025-01-27 12:03:15', '14', '2025-01-26 09:01:49'),
(7, '1', '8', '2025-01-27 12:00:26', '8', '8', '1', '', '2025-01-26 08:58:00', '', '', 'Y', '', '2025-01-26 08:58:00', '', '', '', '1', '8', '2025-01-27 12:00:30', '2025-01-27 12:00:31', '', '2025-01-26 08:58:00', '2025-01-26 08:58:00', '', '2025-01-26 08:58:00', '2025-01-26 08:58:00', '', '1', '8', '8', '8', '8', '', '8', '8', '2025-01-27 12:00:37', '13', '2025-01-26 08:58:00'),
(6, '1', '1', '2025-01-26 08:19:55', '1', '1', '1', '1', '2025-01-26 05:18:03', '1', '1', 'Y', '1', '2025-01-26 05:18:03', '1', '1', '1', '1', '1', '2025-01-26 08:20:03', '2025-01-26 08:20:04', '1', '2025-01-26 05:18:03', '2025-01-26 05:18:03', '1', '2025-01-26 05:18:03', '2025-01-26 05:18:03', '1', '1', '1', '1', '1', '1', '', '1', '1', '2025-01-26 08:20:13', '12', '2025-01-26 08:31:14'),
(5, '1', '1', '2025-01-26 06:13:27', '', '', '1', '', '2025-01-26 03:10:53', '', '', 'Y', '', '2025-01-26 03:10:53', '', '', '', '1', '1', '2025-01-26 06:13:29', '2025-01-26 06:13:30', '', '2025-01-26 03:10:53', '2025-01-26 03:10:53', '', '2025-01-26 03:10:53', '2025-01-26 03:10:53', '', '', '', '', '', '', '', '', '', '2025-01-26 03:10:53', '11', '2025-01-26 08:42:22'),
(4, '1', '61', '2025-01-24 12:28:38', '61', '61', '1', '', '2025-01-23 09:26:20', '', '', 'Y', '', '2025-01-23 09:26:20', '', '', '', '1', '61', '2025-01-24 12:28:42', '2025-01-24 12:28:42', '', '2025-01-23 09:26:20', '2025-01-23 09:26:20', '', '2025-01-23 09:26:20', '2025-01-23 09:26:20', '', '1', '61', '61', '61', '61', '', '61', '61', '2025-01-24 12:28:49', '10', '2025-01-26 08:37:02'),
(3, '1', '51', '2025-01-24 12:26:32', '51', '51', '1', '', '2025-01-23 09:24:14', '', '', 'Y', '', '2025-01-23 09:24:14', '', '', '', '1', '51', '2025-01-24 12:26:37', '2025-01-24 12:26:37', '', '2025-01-23 09:24:14', '2025-01-23 09:24:14', '', '2025-01-23 09:24:14', '2025-01-23 09:24:14', '', '1', '51', '51', '51', '51', '', '51', '51', '2025-01-24 12:26:43', '9', '2025-01-23 09:27:44'),
(2, '1', '61', '2025-01-22 11:04:39', '61', '61', '1', '', '2025-01-22 11:04:39', '', '', 'Y', '', '2025-01-22 11:04:39', '', '', '', '1', '61', '2025-01-23 12:55:05', '2025-01-23 12:55:05', '61', '2025-01-23 12:55:07', '2025-01-23 12:55:07', '', '2025-01-22 11:04:39', '2025-01-22 11:04:39', '', '1', '66661', '666661', '6661', '66661', '', '666666661', '666661', '2025-01-23 12:55:17', '4', '2025-01-22 11:04:39'),
(1, '1', '21', '2025-01-22 09:10:43', '21', '21', '1', '21', '', '21', '21', 'Y', '', '', '', '', '', '1', '21', '2025-01-23 00:03:26', '2025-01-23 00:03:27', '2', '2025-01-23 00:03:28', '2025-01-23 00:03:28', '', '', '', '', '1', '21', '21', '21', '21', '', '22222', '222222', '2025-01-22 23:30:52', '2', '2025-01-22 09:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `tablec1`
--

CREATE TABLE `tablec1` (
  `tablec1_id` int NOT NULL,
  `a1` varchar(255) DEFAULT NULL,
  `pname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `HN` varchar(255) DEFAULT NULL,
  `AN` varchar(255) DEFAULT NULL,
  `DX` text,
  `UD` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `date_in` varchar(19) DEFAULT NULL,
  `date_out` varchar(19) DEFAULT NULL,
  `date_move` varchar(19) DEFAULT NULL,
  `from_ward` varchar(255) DEFAULT NULL,
  `date_infect` varchar(19) DEFAULT NULL,
  `ward_infect` varchar(255) DEFAULT NULL,
  `dep_infect` varchar(255) DEFAULT NULL,
  `Yes` char(10) DEFAULT NULL,
  `No` char(10) DEFAULT NULL,
  `st` varchar(255) DEFAULT NULL,
  `off` varchar(255) DEFAULT NULL,
  `other_in` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `check` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tablec1`
--

INSERT INTO `tablec1` (`tablec1_id`, `a1`, `pname`, `fname`, `lname`, `age`, `HN`, `AN`, `DX`, `UD`, `date_in`, `date_out`, `date_move`, `from_ward`, `date_infect`, `ward_infect`, `dep_infect`, `Yes`, `No`, `st`, `off`, `other_in`, `check`, `timestamp`) VALUES
(2, '11', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '11', '', '11', '2025-01-23 12:59:45', '2025-01-23 12:59:45', '2025-01-22 09:58:35', '11', '2025-01-22 09:58:35', '11', '11', '1', '', '11', '11', '', '1', '2025-07-08 04:18:24'),
(3, '2', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '2', '', '2', '2025-01-24 12:32:28', '2025-01-24 12:32:29', '2025-01-23 09:30:05', '2', '2025-01-23 09:30:05', '', '2', '1', '', '2', '2', '', '1', '2025-02-26 20:13:57'),
(4, '3', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '3', 'Organic mood [affective] disorders', '3', '2025-01-24 12:34:56', '2025-01-24 12:34:55', '2025-01-23 09:32:33', '3', '2025-01-23 09:32:33', '', '3', '', '', '', '', '3', '2', '2025-02-26 20:29:24'),
(5, 'งานการพยาบาลออร์โธปิดิกส์(2ฉ)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '', '', '', '2025-01-26 06:19:35', '2025-01-26 06:19:36', '2025-01-26 06:19:37', '', '2025-01-26 06:19:38', '', '', '1', '', '', '', '', '1', '2025-01-26 03:19:29'),
(6, 'งานการพยาบาลผู้ป่วยพิเศษ 1(6ก)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '', 'Organic mood [affective] disorders', '', '2025-01-26 08:29:47', '2025-01-26 08:29:47', '2025-01-26 05:28:38', 'งานการพยาบาลออร์โธปิดิกส์(2ฉ)', '2025-01-26 05:28:38', 'งานการพยาบาลอายุรกรรม 1(4ข-3)', '', '1', '', '1', '1', '', '1', '2025-01-26 08:34:37'),
(8, 'งานการพยาบาลกุมารเวชกรรม(NICU)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '', 'Hypothyroidism following radioiodine therapy', '', '2025-01-26 09:04:26', '2025-01-26 09:04:26', '2025-01-26 09:04:26', 'งานการพยาบาลศัลยกรรม(3ค)', '2025-01-26 09:04:26', 'งานการพยาบาลบำบัดพิเศษ(5ก)', '', '1', '', '', '', '', '1', '2025-01-26 09:05:11'),
(9, '', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '', 'Graves disease', '', '2025-01-30 07:42:40', '2025-01-30 07:42:40', '2025-01-30 07:42:40', '', '2025-01-30 07:42:40', '', '', '1', '', '', '', '', '1', '2025-02-26 01:31:30'),
(10, '', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '', 'Organic mood [affective] disorders', '', '2025-01-30 07:48:53', '2025-01-30 07:48:53', '2025-01-30 07:48:53', '', '2025-01-30 07:48:53', '', '', '', '', '', '', '', '1', '2025-07-08 04:17:42'),
(11, '', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '', 'Organic mood [affective] disorders', '', '2025-08-04 16:20:29', '2025-08-04 16:20:29', '2025-08-04 16:20:29', '', '2025-08-04 16:20:29', '', '', '', '', '', '', '', '1', '2025-08-04 16:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `tablec2`
--

CREATE TABLE `tablec2` (
  `tablec2_id` int NOT NULL,
  `b1` varchar(255) DEFAULT NULL,
  `pname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `b2` varchar(255) DEFAULT NULL,
  `b3` varchar(255) DEFAULT NULL,
  `b4` varchar(255) DEFAULT NULL,
  `b5` varchar(255) DEFAULT NULL,
  `b6` varchar(255) DEFAULT NULL,
  `b7` varchar(255) DEFAULT NULL,
  `b8` varchar(19) DEFAULT NULL,
  `b9` varchar(19) DEFAULT NULL,
  `b10` varchar(255) DEFAULT NULL,
  `b11` varchar(255) DEFAULT NULL,
  `b12` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b13` varchar(255) DEFAULT NULL,
  `b14` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b15` text,
  `b16` varchar(255) DEFAULT NULL,
  `b17` varchar(255) DEFAULT NULL,
  `b18` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b19` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b20` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b21` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b22` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b23` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b24` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b25` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b26` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b27` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b28` text,
  `b29` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b30` text,
  `b31` varchar(255) DEFAULT NULL,
  `b32` varchar(255) DEFAULT NULL,
  `b33` varchar(255) DEFAULT NULL,
  `b34` varchar(10) DEFAULT NULL,
  `b35` text,
  `b36` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b37` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b38` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b39` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b40` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b41` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b42` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b43` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b44` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b45` text,
  `b46` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b47` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b48` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b49` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b50` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b51` varchar(255) DEFAULT NULL,
  `b52` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b53` varchar(255) DEFAULT NULL,
  `b54` varchar(255) DEFAULT NULL,
  `b55` text,
  `b56` varchar(19) DEFAULT NULL,
  `b57` varchar(10) DEFAULT NULL,
  `b58` text,
  `tablec1_id` char(10) DEFAULT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tablec2`
--

INSERT INTO `tablec2` (`tablec2_id`, `b1`, `pname`, `fname`, `lname`, `b2`, `b3`, `b4`, `b5`, `b6`, `b7`, `b8`, `b9`, `b10`, `b11`, `b12`, `b13`, `b14`, `b15`, `b16`, `b17`, `b18`, `b19`, `b20`, `b21`, `b22`, `b23`, `b24`, `b25`, `b26`, `b27`, `b28`, `b29`, `b30`, `b31`, `b32`, `b33`, `b34`, `b35`, `b36`, `b37`, `b38`, `b39`, `b40`, `b41`, `b42`, `b43`, `b44`, `b45`, `b46`, `b47`, `b48`, `b49`, `b50`, `b51`, `b52`, `b53`, `b54`, `b55`, `b56`, `b57`, `b58`, `tablec1_id`, `timestamp`) VALUES
(1, '12', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '35', '12', '12', '12', '12', '2025-01-23 01:07:49', '2025-02-26 20:34:45', '', '1', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '', '', '1', '1', '1', '1', '1', '1', '1', '', '1', '', '', '1', '1', '', '', '1', '1', '', '', '1', '1', '1', '1', '1', '1', '11111111111111111', '1111111111112', '11111112', '11111111111111112', '1111112', '111112', '111112', NULL, NULL, NULL, '2', '2025-01-22 10:06:31'),
(2, '2', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '36', '2', '2', '2', '2', '2025-01-23 09:31:02', '2025-01-23 09:31:02', '', '', '', '', '1', '1', '', '', '', '', '', '', '', '', '', '', '2', '2', '2', '', '', '', '1', '', '', '', '', '', '', '1', '2', '', '', '1', '2', '', '', '', '', '222222222', '2222222', '2222', '222', '222222222', '2222', '2222', NULL, NULL, NULL, '3', '2025-01-23 09:31:02'),
(3, '3', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '35', '3', '3', '3', '3', '2025-01-23 09:33:21', '2025-01-23 09:33:21', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '3', '3', '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '3', '1', '3', '1', '3', '333333333333', '33333333', '3333', '3333', '333333', '33', '3', NULL, NULL, NULL, '4', '2025-01-23 09:33:21'),
(4, 'งานการพยาบาลออร์โธปิดิกส์(2ฉ)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '36', '', '', '', '', '2025-01-26 03:18:35', '2025-01-26 03:18:35', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, '5', '2025-01-26 03:18:35'),
(5, 'งานการพยาบาลผู้ป่วยพิเศษ 1(6ก)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '36', '3', '', '3', '3', '2025-01-26 05:30:01', '2025-01-26 08:34:46', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '3', '3', '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '333333', '33', '', '3333', '3', '3', '3', NULL, NULL, NULL, '6', '2025-01-26 05:30:01'),
(7, 'งานการพยาบาลกุมารเวชกรรม(NICU)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '35', '', '', '', '', '2025-01-26 09:04:53', '2025-01-26 09:04:53', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, '8', '2025-01-26 09:04:53'),
(8, '', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '35', '', '', '', '', '2025-01-30 19:49:57', '2025-01-30 19:49:57', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, '9', '2025-01-30 19:49:57'),
(9, '', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '36', '', '', '', '', '2025-08-04 16:29:12', '2025-08-04 16:29:12', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-08-04 16:29:12', '', '', '11', '2025-08-04 16:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `tablec3`
--

CREATE TABLE `tablec3` (
  `tablec3_id` int NOT NULL,
  `c1` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c2` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c3` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c4` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c5` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c6` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c7` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c8` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c9` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c10` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c11` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c12` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c13` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c14` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c15` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c16` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c17` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c18` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c19` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c20` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c21` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c22` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c23` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c24` varchar(255) DEFAULT NULL,
  `c25` varchar(255) DEFAULT NULL,
  `tablec1_id` char(10) DEFAULT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tablec3`
--

INSERT INTO `tablec3` (`tablec3_id`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`, `c8`, `c9`, `c10`, `c11`, `c12`, `c13`, `c14`, `c15`, `c16`, `c17`, `c18`, `c19`, `c20`, `c21`, `c22`, `c23`, `c24`, `c25`, `tablec1_id`, `timestamp`) VALUES
(1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2', '2025-07-08 04:18:27'),
(2, '1', '', '', '1', '1', '1', '1', '1', '1', '', '', '1', '', '', '', '1', '1', '1', '', '', '', '1', '1', '1', '', '3', '2025-02-26 20:14:03'),
(3, '1', '', '', '1', '1', '1', '1', '', '', '', '', '1', '', '', '', '1', '1', '', '', '', '', '1', '1', '', '', '4', '2025-02-26 20:31:30'),
(4, '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '5', '2025-01-26 03:19:32'),
(5, '1', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', '2025-01-26 08:34:39'),
(7, '1', '', '', '1', '', '', '', '', '1', '', '', '', '', '', '', '', '', '1', '', '1', '', '', '', '', '', '8', '2025-01-26 09:05:14'),
(8, '', '', '', '', '', '1', '', '', '1', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '9', '2025-01-30 19:47:05'),
(9, '1', '', '', '1', '', '', '', '1', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '1', '10', '2025-07-08 04:17:52'),
(10, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '11', '2025-08-04 16:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `tablec4`
--

CREATE TABLE `tablec4` (
  `tablec4_id` int NOT NULL,
  `d1` char(10) DEFAULT NULL,
  `d2` varchar(255) DEFAULT NULL,
  `d3` varchar(19) DEFAULT NULL,
  `d4` varchar(255) DEFAULT NULL,
  `d5` varchar(255) DEFAULT NULL,
  `d6` char(10) DEFAULT NULL,
  `d7` varchar(255) DEFAULT NULL,
  `d8` varchar(19) DEFAULT NULL,
  `d9` text,
  `d10` varchar(255) DEFAULT NULL,
  `d11` char(10) DEFAULT NULL,
  `d12` varchar(255) DEFAULT NULL,
  `d13` varchar(19) DEFAULT NULL,
  `d14` varchar(255) DEFAULT NULL,
  `d15` varchar(255) DEFAULT NULL,
  `d16` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d17` char(10) DEFAULT NULL,
  `d18` text,
  `d19` varchar(19) DEFAULT NULL,
  `d20` varchar(19) DEFAULT NULL,
  `d21` varchar(255) DEFAULT NULL,
  `d22` varchar(19) DEFAULT NULL,
  `d23` varchar(19) DEFAULT NULL,
  `d24` varchar(255) DEFAULT NULL,
  `d25` varchar(19) DEFAULT NULL,
  `d26` varchar(19) DEFAULT NULL,
  `d27` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d28` char(10) DEFAULT NULL,
  `d29` varchar(255) DEFAULT NULL,
  `d30` varchar(255) DEFAULT NULL,
  `d31` varchar(10) DEFAULT NULL,
  `d32` varchar(255) DEFAULT NULL,
  `d33` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d34` varchar(255) DEFAULT NULL,
  `d35` varchar(255) DEFAULT NULL,
  `d36` varchar(19) DEFAULT NULL,
  `tablec1_id` char(10) DEFAULT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tablec4`
--

INSERT INTO `tablec4` (`tablec4_id`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `d26`, `d27`, `d28`, `d29`, `d30`, `d31`, `d32`, `d33`, `d34`, `d35`, `d36`, `tablec1_id`, `timestamp`) VALUES
(1, '1', '12', '2025-01-22 11:34:22', '12', '12', '1', '12', '2025-01-22 11:34:22', '12', '12', '', '', '2025-01-22 11:34:22', '', '', '', '1', '12', '2025-01-22 11:34:22', '2025-01-22 11:34:22', '12', '2025-01-22 11:34:22', '2025-01-22 11:34:22', '', '2025-01-22 11:34:22', '2025-01-22 11:34:22', '', '1', '12', '12', '12', '12', '', '12', '12', '2025-01-22 11:34:22', '2', '2025-07-08 04:18:31'),
(2, '1', '2', '2025-01-24 12:32:50', '2', '2', '', '', '2025-01-23 09:30:33', '', '', '', '', '2025-01-23 09:30:33', '', '', '', '1', '2', '2025-01-24 12:32:54', '2025-01-24 12:32:54', '', '2025-01-23 09:30:33', '2025-01-23 09:30:33', '', '2025-01-23 09:30:33', '2025-01-23 09:30:33', '', '1', '2', '2', '2', '2', '', '2', '2', '2025-01-24 12:33:01', '3', '2025-01-23 09:40:02'),
(3, '1', '3', '2025-01-24 12:35:16', '3', '3', '', '', '2025-01-23 09:32:58', '', '', '', '', '2025-01-23 09:32:58', '', '', '', '1', '3', '2025-01-24 12:35:20', '2025-01-24 12:35:20', '', '2025-01-23 09:32:58', '2025-01-23 09:32:58', '', '2025-01-23 09:32:58', '2025-01-23 09:32:58', '', '1', '3', '3', '3', '3', '', '3', '3', '2025-01-24 12:35:26', '4', '2025-02-26 20:32:08'),
(4, '1', '1', '2025-01-26 06:20:55', '1', '1', '', '', '2025-01-26 03:18:28', '', '', '', '', '2025-01-26 03:18:28', '', '', '', '1', '1', '2025-01-26 06:20:59', '2025-01-26 06:20:59', '', '2025-01-26 03:18:28', '2025-01-26 03:18:28', '', '2025-01-26 03:18:28', '2025-01-26 03:18:28', '', '1', '1', '1', '1', '1', '', '1', '1', '2025-01-26 06:21:06', '5', '2025-01-26 03:19:35'),
(5, '1', '3', '2025-01-26 08:32:10', '3', '3', '', '', '2025-01-26 05:29:44', '', '', '', '', '2025-01-26 05:29:44', '', '', '', '1', '3', '2025-01-26 08:32:14', '2025-01-26 08:32:15', '', '2025-01-26 05:29:44', '2025-01-26 05:29:44', '', '2025-01-26 05:29:44', '2025-01-26 05:29:44', '', '1', '3', '3', '3', '3', '', '3', '3', '2025-01-26 08:32:21', '6', '2025-01-26 08:34:42'),
(7, '1', '5', '2025-01-27 12:07:17', '5', '5', '', '', '2025-01-26 09:04:48', '', '', '', '', '2025-01-26 09:04:48', '', '', '', '1', '4', '2025-01-27 12:07:19', '2025-01-27 12:07:19', '', '2025-01-26 09:04:48', '2025-01-26 09:04:48', '', '2025-01-26 09:04:48', '2025-01-26 09:04:48', '', '1', '3', '3', '3', '3', '', '3', '3', '2025-01-27 12:07:25', '8', '2025-01-26 09:05:17'),
(8, '', '', '2025-01-30 19:47:15', '', '', '', '', '2025-01-30 19:47:15', '', '', '', '', '2025-01-30 19:47:15', '', '', '', '', '', '2025-01-30 19:47:15', '2025-01-30 19:47:15', '', '2025-01-30 19:47:15', '2025-01-30 19:47:15', '', '2025-01-30 19:47:15', '2025-01-30 19:47:15', '', '', '', '', '', '', '', '', '', '2025-01-30 19:47:15', '9', '2025-01-30 19:47:15'),
(9, '', '', '2025-08-04 16:24:45', '', '', '', '', '2025-08-04 16:24:45', '', '', '', '', '2025-08-04 16:24:45', '', '', '', '', '', '2025-08-04 16:24:45', '2025-08-04 16:24:45', '', '2025-08-04 16:24:45', '2025-08-04 16:24:45', '', '2025-08-04 16:24:45', '2025-08-04 16:24:45', '', '', '', '', '', '', '', '', '', '2025-08-04 16:24:45', '11', '2025-08-04 16:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `tabled1`
--

CREATE TABLE `tabled1` (
  `tabled1_id` int NOT NULL,
  `d1` varchar(255) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `HN` varchar(255) DEFAULT NULL,
  `AN` varchar(255) DEFAULT NULL,
  `DX` text,
  `UD` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `date_in` varchar(19) DEFAULT NULL,
  `date_out` varchar(19) DEFAULT NULL,
  `date_move` varchar(19) DEFAULT NULL,
  `status_yes` varchar(50) DEFAULT NULL,
  `from_ward` varchar(255) DEFAULT NULL,
  `date_infect` varchar(19) DEFAULT NULL,
  `ward_infect` varchar(255) DEFAULT NULL,
  `dep_infect` varchar(255) DEFAULT NULL,
  `d2` varchar(255) DEFAULT NULL,
  `d3` varchar(255) DEFAULT NULL,
  `d4` varchar(255) DEFAULT NULL,
  `d5` varchar(50) DEFAULT NULL,
  `d7` varchar(19) DEFAULT NULL,
  `d8` varchar(255) DEFAULT NULL,
  `d9` char(10) DEFAULT NULL,
  `d10` char(10) DEFAULT NULL,
  `d11` char(10) DEFAULT NULL,
  `d12` char(10) DEFAULT NULL,
  `d13` char(10) DEFAULT NULL,
  `d14` char(10) DEFAULT NULL,
  `d15` char(10) DEFAULT NULL,
  `d16` char(10) DEFAULT NULL,
  `d17` char(10) DEFAULT NULL,
  `d18` varchar(255) DEFAULT NULL,
  `d19` varchar(255) DEFAULT NULL,
  `d20` varchar(255) DEFAULT NULL,
  `d21` varchar(255) DEFAULT NULL,
  `d22` varchar(255) DEFAULT NULL,
  `d23` varchar(255) DEFAULT NULL,
  `d24` varchar(255) DEFAULT NULL,
  `d25` varchar(255) DEFAULT NULL,
  `d26` varchar(255) DEFAULT NULL,
  `d27` varchar(255) DEFAULT NULL,
  `d28` varchar(255) DEFAULT NULL,
  `d29` varchar(255) DEFAULT NULL,
  `d30` varchar(255) DEFAULT NULL,
  `d31` varchar(255) DEFAULT NULL,
  `d32` varchar(255) DEFAULT NULL,
  `d33` varchar(255) DEFAULT NULL,
  `d34` varchar(255) DEFAULT NULL,
  `d35` varchar(255) DEFAULT NULL,
  `d36` varchar(255) DEFAULT NULL,
  `d37` varchar(255) DEFAULT NULL,
  `d38` varchar(255) DEFAULT NULL,
  `d39` varchar(255) DEFAULT NULL,
  `d40` varchar(255) DEFAULT NULL,
  `d41` varchar(255) DEFAULT NULL,
  `d42` varchar(255) DEFAULT NULL,
  `d43` char(10) DEFAULT NULL,
  `d44` char(10) DEFAULT NULL,
  `d45` char(10) DEFAULT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tabled1`
--

INSERT INTO `tabled1` (`tabled1_id`, `d1`, `pname`, `fname`, `lname`, `age`, `HN`, `AN`, `DX`, `UD`, `date_in`, `date_out`, `date_move`, `status_yes`, `from_ward`, `date_infect`, `ward_infect`, `dep_infect`, `d2`, `d3`, `d4`, `d5`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `d26`, `d27`, `d28`, `d29`, `d30`, `d31`, `d32`, `d33`, `d34`, `d35`, `d36`, `d37`, `d38`, `d39`, `d40`, `d41`, `d42`, `d43`, `d44`, `d45`, `timestamp`) VALUES
(1, '123', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '123', 'Organic mood [affective] disorders', '123', '2025-01-23 01:20:38', '2025-01-23 01:20:38', '2025-01-22 10:18:37', '1', '123', '2025-01-23 01:20:42', '0', '', '123', '123', '123', '1', '2025-01-22 10:45:54', '', '', '', '1', '', '', '', '1', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '2025-01-22 23:37:27'),
(2, '21', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '21', 'Organic mood [affective] disorders', '21', '2025-01-23 01:29:10', '2025-01-23 01:29:11', '2025-01-23 01:29:11', '2', '', '2025-01-22 10:27:19', '1', '21', '21', '21', '21', '2', '2025-01-23 01:29:26', '21', '', '', '1', '', '', '', '', '', '1', '1', '1', '1', '', '', '1', '1', '1', '', '1', '', '1', '1', '1', '1', '', '1', '1', '', '1', '1', '1', '1', '', '', '', '1', '', '2025-01-22 23:46:46'),
(3, '31', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '31', 'Polycystic ovaries', '31', '2025-01-23 01:17:04', '2025-01-23 01:17:04', '2025-01-23 01:17:05', '1', '31', '2025-01-23 01:17:09', '0', '', '31', '31', '31', '2', '2025-01-22 10:15:04', '', '', '', '1', '', '', '', '1', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '2025-01-22 23:32:08'),
(4, '5', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '5', 'Need for immunization against influenza', '5', '2025-01-23 02:41:53', '2025-01-23 02:41:53', '2025-01-22 23:39:57', '2', '', '2025-01-22 23:39:57', '3', '5', '5', '5', '5', '2', '2025-05-23 02:42:08', '5', '', '', '', '1', '', '', '', '', '1', '', '', '1', '1', '1', '', '', '', '', '', '', '', '1', '', '1', '1', '1', '', '1', '', '', '1', '1', '1', '1', '', '1', '1', '2025-01-22 23:39:57'),
(8, '8', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '8', 'Organic mood [affective] disorders', '8', '2025-01-24 01:12:17', '2025-01-24 01:12:18', '2025-01-24 01:12:19', '1', '8', '2025-01-24 01:12:22', '0', '', '8', '8', '8', '2', '2025-01-24 01:12:30', '', '1', '', '', '', '', '1', '', '', '', '', '1', '', '', '', '', '', '1', '1', '', '', '', '1', '1', '1', '', '1', '', '1', '', '', '1', '1', '1', '', '1', '', '1', '2025-01-26 08:47:38'),
(9, 'งานการพยาบาลสูติ-นรีเวชกรรม(2ข)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '', 'Organic mood [affective] disorders', '', '2025-01-26 06:24:37', '2025-01-26 06:24:38', '2025-01-26 06:24:38', '1', '', '2025-01-26 03:22:11', '0', '', '', '', '', '', '2025-01-26 03:22:11', '', '1', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '1', '', '1', '2025-01-26 03:22:11'),
(10, 'งานการพยาบาลสูติ-นรีเวชกรรม(5ข)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '5', 'Organic mood [affective] disorders', '5', '2025-01-26 09:15:39', '2025-01-26 09:15:40', '2025-01-26 09:15:41', '1', 'งานการพยาบาลออร์โธปิดิกส์(2ฉ)', '2025-01-26 09:15:51', '0', '', '1', '1', '1', '1', '2025-01-26 06:13:25', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '1', '', '', '1', '1', '', '1', '2025-01-26 06:13:25'),
(11, 'งานการพยาบาลสูติ-นรีเวชกรรม(5ข)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '', 'Organic mood [affective] disorders', '', '2025-01-26 06:32:30', '2025-01-26 06:32:30', '2025-01-26 06:32:30', '1', 'งานการพยาบาลออร์โธปิดิกส์(2ฉ)', '2025-01-26 06:32:30', '0', '', '', '', '', '', '2025-01-26 06:32:30', '', '', '', '', '', '', '', '', '', '', '1', '1', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '1', '', '1', '2025-01-26 06:32:30'),
(12, 'งานการพยาบาลอายุรกรรม 1(4ก)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '4', 'Organic mood [affective] disorders', '4', '2025-01-26 10:01:49', '2025-01-26 10:01:49', '2025-01-26 06:59:30', '1', 'งานการพยาบาลออร์โธปิดิกส์(3ฉ)', '2025-01-26 10:01:56', '0', '', '1', '1', '1', '2', '2025-01-26 06:59:30', '', '1', '', '', '', '', '1', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '1', '2025-01-26 08:45:30'),
(13, 'งานการพยาบาลสูติ-นรีเวชกรรม(5ข)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '', 'Graves disease', '', '2025-01-26 09:08:04', '2025-01-26 09:08:04', '2025-01-26 09:08:04', '1', 'งานการพยาบาลออร์โธปิดิกส์(3ฉ)', '2025-01-26 09:08:04', 'งานการพยาบาลจักษุ โสต จิตเวชและตรวจวินิจฉัยพิเศษ(3จ)', '', '', '', '', '', '2025-01-26 09:08:04', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '1', '2025-01-26 09:08:04'),
(14, 'งานการพยาบาลจักษุ โสต จิตเวชและตรวจวินิจฉัยพิเศษ(5ง)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '5', 'Graves disease', '5', '2025-01-26 09:19:07', '2025-01-26 09:19:07', '2025-01-26 09:19:07', '1', 'งานการพยาบาลอายุรกรรม 1(4ข-1)', '2025-01-26 09:19:07', 'งานการพยาบาลออร์โธปิดิกส์(2ฉ)', '', '', '', '', '', '2025-01-26 09:19:07', '', '', '', '1', '', '', '', '', '1', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '1', '2025-01-26 09:21:21'),
(15, '', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '', 'Organic mood [affective] disorders', '', '2025-01-30 19:54:07', '2025-01-30 19:54:07', '2025-01-30 19:54:07', '1', '', '2025-01-30 19:54:07', '', '', '', '', '', '1', '2025-01-30 19:54:07', '', '', '', '1', '', '', '', '', '', '1', '1', '1', '1', '1', '', '', '', '1', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '1', '2025-01-30 19:54:07'),
(16, 'งานการพยาบาลออร์โธปิดิกส์(5ค)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '', 'Graves disease', '', '2025-01-30 19:59:59', '2025-01-30 19:59:59', '2025-01-30 19:59:59', '2', '', '2025-01-30 19:59:59', 'งานการพยาบาลออร์โธปิดิกส์(5ค)', '', '', '', '', '', '2025-01-30 19:59:59', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '2025-01-30 19:59:59'),
(17, '', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '', 'Hypothyroidism following radioiodine therapy', '', '2025-01-30 08:08:13', '2025-01-30 08:08:13', '2025-01-30 08:08:13', '2', '', '2025-01-30 08:08:13', 'งานการพยาบาลออร์โธปิดิกส์(5ค)', '', '', '', '', '', '2025-01-30 08:08:13', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '1', '', '2025-02-26 00:30:46'),
(18, '', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '', 'Hypothyroidism following radioiodine therapy', '', '2025-01-30 08:09:10', '2025-01-30 08:09:10', '2025-01-30 08:09:10', '2', '', '2025-01-30 08:09:10', 'งานการพยาบาลอายุรกรรม 1(4ข-2)', '', '', '', '', '', '2025-01-30 08:09:10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '1', '', '2025-02-26 00:20:51'),
(19, 'งานการพยาบาลจักษุ โสต จิตเวชและตรวจวินิจฉัยพิเศษ(5ง)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '', 'Cough', '', '2025-08-04 12:38:09', '2025-08-04 12:38:09', '2025-08-04 12:38:09', '1', '', '2025-08-04 12:38:09', '', '', '', '', '', '', '2025-08-04 12:38:09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '2025-08-04 12:38:09'),
(20, '', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '', 'Attention to surgical dressings and sutures', '', '2025-08-04 12:45:14', '2025-08-04 12:45:14', '2025-08-04 12:45:14', '', '', '2025-08-04 12:45:14', '', '', '', '', '', '', '2025-08-04 12:45:14', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-08-04 12:45:14'),
(21, '', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '', 'Attention to surgical dressings and sutures', '', '2025-08-04 16:32:21', '2025-08-04 16:32:21', '2025-08-04 16:32:21', '', '', '2025-08-04 16:32:21', '', '', '', '', '', '', '2025-08-04 16:32:21', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '2025-08-04 16:34:55');

-- --------------------------------------------------------

--
-- Table structure for table `tabled2`
--

CREATE TABLE `tabled2` (
  `tabled2_id` int NOT NULL,
  `b1` varchar(255) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `b2` varchar(255) DEFAULT NULL,
  `b3` varchar(255) DEFAULT NULL,
  `b4` varchar(255) DEFAULT NULL,
  `b5` varchar(255) DEFAULT NULL,
  `b6` varchar(255) DEFAULT NULL,
  `b7` varchar(19) DEFAULT NULL,
  `b8` varchar(255) DEFAULT NULL,
  `b9` varchar(19) DEFAULT NULL,
  `b10` char(10) DEFAULT NULL,
  `b11` char(10) DEFAULT NULL,
  `b12` char(10) DEFAULT NULL,
  `b13` char(10) DEFAULT NULL,
  `b14` char(10) DEFAULT NULL,
  `b15` char(10) DEFAULT NULL,
  `b16` char(10) DEFAULT NULL,
  `b17` varchar(255) DEFAULT NULL,
  `b18` varchar(255) DEFAULT NULL,
  `b19` char(10) DEFAULT NULL,
  `b20` varchar(255) DEFAULT NULL,
  `b21` varchar(255) DEFAULT NULL,
  `b22` char(10) DEFAULT NULL,
  `b23` varchar(255) DEFAULT NULL,
  `b24` varchar(255) DEFAULT NULL,
  `b25` varchar(255) DEFAULT NULL,
  `b26` varchar(19) DEFAULT NULL,
  `b27` char(10) DEFAULT NULL,
  `b28` varchar(255) DEFAULT NULL,
  `b29` char(10) DEFAULT NULL,
  `b30` char(10) DEFAULT NULL,
  `b31` char(10) DEFAULT NULL,
  `b32` char(10) DEFAULT NULL,
  `b33` char(10) DEFAULT NULL,
  `b34` char(10) DEFAULT NULL,
  `b35` char(10) DEFAULT NULL,
  `b36` char(10) DEFAULT NULL,
  `b37` char(10) DEFAULT NULL,
  `b38` varchar(255) DEFAULT NULL,
  `b39` varchar(255) DEFAULT NULL,
  `b40` char(10) DEFAULT NULL,
  `b41` varchar(255) DEFAULT NULL,
  `b42` varchar(255) DEFAULT NULL,
  `b43` varchar(255) DEFAULT NULL,
  `b44` varchar(255) DEFAULT NULL,
  `b45` char(10) DEFAULT NULL,
  `b46` varchar(255) DEFAULT NULL,
  `b47` char(10) DEFAULT NULL,
  `b48` char(10) DEFAULT NULL,
  `b49` char(10) DEFAULT NULL,
  `b50` char(10) DEFAULT NULL,
  `b51` char(10) DEFAULT NULL,
  `b52` varchar(255) DEFAULT NULL,
  `b53` char(10) DEFAULT NULL,
  `b54` char(10) DEFAULT NULL,
  `b55` char(10) DEFAULT NULL,
  `b56` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `b57` char(10) DEFAULT NULL,
  `b58` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `b59` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `b60` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `b61` varchar(255) DEFAULT NULL,
  `b62` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `b63` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `b64` varchar(255) DEFAULT NULL,
  `b65` varchar(255) DEFAULT NULL,
  `tabled1_id` char(10) DEFAULT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tabled2`
--

INSERT INTO `tabled2` (`tabled2_id`, `b1`, `pname`, `fname`, `lname`, `b2`, `b3`, `b4`, `b5`, `b6`, `b7`, `b8`, `b9`, `b10`, `b11`, `b12`, `b13`, `b14`, `b15`, `b16`, `b17`, `b18`, `b19`, `b20`, `b21`, `b22`, `b23`, `b24`, `b25`, `b26`, `b27`, `b28`, `b29`, `b30`, `b31`, `b32`, `b33`, `b34`, `b35`, `b36`, `b37`, `b38`, `b39`, `b40`, `b41`, `b42`, `b43`, `b44`, `b45`, `b46`, `b47`, `b48`, `b49`, `b50`, `b51`, `b52`, `b53`, `b54`, `b55`, `b56`, `b57`, `b58`, `b59`, `b60`, `b61`, `b62`, `b63`, `b64`, `b65`, `tabled1_id`, `timestamp`) VALUES
(1, '31', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '35', '31', '31', '31', '2025-01-23 02:33:53', '31', '2025-01-23 02:33:55', '1', '', '', '', '1', '', '', '31', '311', '1', '31', '31', '1', '31', '31', '31', '2025-01-23 02:33:55', '1', '1', '', '1', '1', '', '1', '', '', '1', '', '', '', '', '', '31', '31', '', '1', '31', '', '1', '', '', '1', '', '', '1', '', '', '1', '31', '333333333331111', '3333111', '31', '3333331111', '3333311', '31', '31', '3', '2025-01-22 23:32:01'),
(2, '123', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '36', '123', '123', '123', '2025-01-23 02:40:32', '123', '2025-01-23 02:40:33', '1', '', '', '', '', '1', '', '1', '2', '1', '123', '123', '1', '123', '2', '3', '2025-01-23 02:40:49', '', '', '1', '', '', '1', '', '1', '', '', '1', '123', '', '1', '123', '123', '', '', '1', '123', '', '1', '', '1', '1', '', '1', '', '1', '', '1', '123', '123', '123', '123', '123', '123', '123', '123', '1', '2025-01-22 23:38:45'),
(3, '8', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '36', '', '', '', '2025-01-23 10:11:26', '', '2025-01-23 10:11:26', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-01-23 10:11:26', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '8', '2025-01-23 10:11:26'),
(8, 'งานการพยาบาลสูติ-นรีเวชกรรม(5ข)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '36', '', '', '', '2025-01-26 06:53:58', '', '2025-01-26 06:53:58', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-01-26 06:53:58', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '11', '2025-01-26 06:53:58'),
(9, 'งานการพยาบาลอายุรกรรม 1(4ก)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '35', '', '', '', '2025-01-26 06:59:58', '', '2025-01-26 06:59:58', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-01-26 06:59:58', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '12', '2025-01-26 06:59:58'),
(10, 'งานการพยาบาลสูติ-นรีเวชกรรม(5ข)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '35', '', '', '', '2025-01-26 09:08:28', '', '2025-01-26 09:08:28', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-01-26 09:08:28', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', '6', '13', '2025-01-26 09:08:28'),
(11, 'งานการพยาบาลอายุรกรรม 1(4ข-1)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '35', '', '', '', '2025-01-26 09:21:05', '', '2025-01-26 09:21:05', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-01-26 09:21:05', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '5', '5', '5', '5', '14', '2025-01-26 09:21:05'),
(12, '', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', 'HW7212', '35', '', '', '', '2025-01-30 19:58:09', '', '2025-01-30 19:58:09', '', '1', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '2025-01-30 19:58:09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '15', '2025-01-30 19:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `tabled3`
--

CREATE TABLE `tabled3` (
  `tabled3_id` int NOT NULL,
  `d1` varchar(255) DEFAULT NULL,
  `d2` varchar(19) DEFAULT NULL,
  `d3` varchar(255) DEFAULT NULL,
  `d4` varchar(255) DEFAULT NULL,
  `d5` char(10) DEFAULT NULL,
  `d6` char(10) DEFAULT NULL,
  `d7` varchar(255) DEFAULT NULL,
  `d8` char(10) DEFAULT NULL,
  `d9` char(10) DEFAULT NULL,
  `d10` char(10) DEFAULT NULL,
  `d11` varchar(10) DEFAULT NULL,
  `d12` varchar(255) DEFAULT NULL,
  `d13` varchar(255) DEFAULT NULL,
  `d14` varchar(255) DEFAULT NULL,
  `d15` varchar(255) DEFAULT NULL,
  `d16` varchar(255) DEFAULT NULL,
  `d17` varchar(255) DEFAULT NULL,
  `d18` varchar(255) DEFAULT NULL,
  `d19` char(10) DEFAULT NULL,
  `d20` char(10) DEFAULT NULL,
  `d21` varchar(255) DEFAULT NULL,
  `d22` varchar(255) DEFAULT NULL,
  `d23` char(10) DEFAULT NULL,
  `d24` char(10) DEFAULT NULL,
  `d25` varchar(255) DEFAULT NULL,
  `d26` varchar(255) DEFAULT NULL,
  `d27` varchar(255) DEFAULT NULL,
  `d28` char(10) DEFAULT NULL,
  `d29` char(10) DEFAULT NULL,
  `d30` varchar(255) DEFAULT NULL,
  `d31` varchar(255) DEFAULT NULL,
  `d32` char(10) DEFAULT NULL,
  `d33` varchar(255) DEFAULT NULL,
  `d34` varchar(255) DEFAULT NULL,
  `d35` char(10) DEFAULT NULL,
  `d36` char(10) DEFAULT NULL,
  `d37` char(10) DEFAULT NULL,
  `d38` char(10) DEFAULT NULL,
  `d39` varchar(255) DEFAULT NULL,
  `d40` char(10) DEFAULT NULL,
  `d41` char(10) DEFAULT NULL,
  `d42` varchar(255) DEFAULT NULL,
  `d43` char(10) DEFAULT NULL,
  `d44` varchar(255) DEFAULT NULL,
  `d45` varchar(255) DEFAULT NULL,
  `d46` char(10) DEFAULT NULL,
  `d47` varchar(255) DEFAULT NULL,
  `d48` char(10) DEFAULT NULL,
  `d49` varchar(255) DEFAULT NULL,
  `d50` char(10) DEFAULT NULL,
  `d51` char(10) DEFAULT NULL,
  `d52` char(10) DEFAULT NULL,
  `d53` char(10) DEFAULT NULL,
  `d54` char(10) DEFAULT NULL,
  `d55` char(10) DEFAULT NULL,
  `d56` varchar(255) DEFAULT NULL,
  `d57` char(10) DEFAULT NULL,
  `d58` varchar(10) DEFAULT NULL,
  `d59` varchar(255) DEFAULT NULL,
  `d60` varchar(255) DEFAULT NULL,
  `d61` char(10) DEFAULT NULL,
  `d62` char(10) DEFAULT NULL,
  `d63` varchar(255) DEFAULT NULL,
  `d64` varchar(255) DEFAULT NULL,
  `d65` char(10) DEFAULT NULL,
  `d66` char(10) DEFAULT NULL,
  `d67` varchar(10) DEFAULT NULL,
  `d68` varchar(255) DEFAULT NULL,
  `d69` char(10) DEFAULT NULL,
  `d70` char(10) DEFAULT NULL,
  `d71` char(10) DEFAULT NULL,
  `tabled1_id` char(10) DEFAULT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tabled3`
--

INSERT INTO `tabled3` (`tabled3_id`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `d26`, `d27`, `d28`, `d29`, `d30`, `d31`, `d32`, `d33`, `d34`, `d35`, `d36`, `d37`, `d38`, `d39`, `d40`, `d41`, `d42`, `d43`, `d44`, `d45`, `d46`, `d47`, `d48`, `d49`, `d50`, `d51`, `d52`, `d53`, `d54`, `d55`, `d56`, `d57`, `d58`, `d59`, `d60`, `d61`, `d62`, `d63`, `d64`, `d65`, `d66`, `d67`, `d68`, `d69`, `d70`, `d71`, `tabled1_id`, `timestamp`) VALUES
(1, '1', '2025-01-23 01:22:38', '1', '1', '', '1', '1', '1', '', '', '', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '10', '', '1', '1', '10', '1111', '', '1', '11', '11', '1', '11', '11', '', '', '1', '', '', '', '1', '1111', '1', '1111', '11', '1', '11', '1', '11', '1', '', '1', '', '1', '', '111111', '1', '', '', '1111', '1', '', '', '', '1', '', '', '', '1', '', '', '1', '2025-01-22 10:21:01'),
(2, '21', '2025-01-23 01:30:04', '21', '21', '', '1', '', '', '', '1', '', '21', '21', '21', '21', '21', '21', '21', '1', '', '', '', '', '', '', '', '21', '1', '', '', '', '1', '21', '21', '1', '1', '', '', '', '1', '', '', '1', '21', '21', '1', '21', '1', '22221', '', '1', '', '1', '', '1', '221', '1', '', '', '2221', '1', '', '', '2221', '1', '', '', '', '', '1', '', '2', '2025-01-22 10:28:16'),
(3, '1', '2025-01-23 02:14:36', '1', '1', '', '1', '', '', '', '1', '', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '', '1', '1', '1', '', '', '1', '2', '2', '1', '2', '2', '', '', '1', '', '', '', '1', '2', '1', '2', '2', '1', '2', '1', '2', '1', '', '1', '', '1', '', '2', '1', '', '', '2', '', '1', '2', '2', '', '1', '', '', '', '1', '', '3', '2025-01-22 23:12:50'),
(4, '5', '2025-01-23 02:42:44', '5', '5', '1', '', '5', '', '1', '', '', '5', '5', '5', '5', '5', '5', '5', '', '1', '5', '5', '', '1', '5', '5', '5', '', '1', '5', '5', '1', '5', '5', '', '', '1', '', '', '', '1', '5', '1', '5', '5', '', '', '1', '5', '', '1', '', '1', '', '1', '5', '', '1', '5', '5', '', '1', '5', '5', '', '1', '', '', '', '', '1', '4', '2025-01-22 23:40:53'),
(8, '8', '', '8', '8', '', '1', '', '', '', '1', '', '8', '8', '8', '8', '8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '1', '', '', '8', '2025-01-23 10:10:46'),
(9, '1', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '9', '2025-01-26 03:22:33'),
(10, '', '2025-01-30 08:16:26', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '18', '2025-01-30 20:16:26'),
(11, '', '2025-08-04 12:38:22', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '19', '2025-08-04 12:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `tabled4`
--

CREATE TABLE `tabled4` (
  `tabled4_id` int NOT NULL,
  `d1` varchar(255) DEFAULT NULL,
  `d2` char(10) DEFAULT NULL,
  `d3` char(10) DEFAULT NULL,
  `d4` varchar(255) DEFAULT NULL,
  `d5` char(10) DEFAULT NULL,
  `d6` char(10) DEFAULT NULL,
  `d7` char(10) DEFAULT NULL,
  `d8` char(10) DEFAULT NULL,
  `d9` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d10` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d11` char(10) DEFAULT NULL,
  `d12` char(10) DEFAULT NULL,
  `d13` varchar(255) DEFAULT NULL,
  `d14` char(10) DEFAULT NULL,
  `d15` char(10) DEFAULT NULL,
  `d16` char(10) DEFAULT NULL,
  `d17` char(10) DEFAULT NULL,
  `d18` varchar(255) DEFAULT NULL,
  `d19` char(10) DEFAULT NULL,
  `d20` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `d21` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `d22` varchar(255) DEFAULT NULL,
  `d23` varchar(19) DEFAULT NULL,
  `d24` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d25` char(10) DEFAULT NULL,
  `d26` char(10) DEFAULT NULL,
  `d27` varchar(255) DEFAULT NULL,
  `d28` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d29` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d30` char(10) DEFAULT NULL,
  `d31` char(10) DEFAULT NULL,
  `d32` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `d33` varchar(255) DEFAULT NULL,
  `d34` varchar(255) DEFAULT NULL,
  `d35` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d36` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d37` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d38` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d39` char(10) DEFAULT NULL,
  `d40` char(10) DEFAULT NULL,
  `d41` char(10) DEFAULT NULL,
  `d42` char(10) DEFAULT NULL,
  `d43` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d44` char(10) DEFAULT NULL,
  `d45` char(10) DEFAULT NULL,
  `d46` varchar(255) DEFAULT NULL,
  `d47` varchar(255) DEFAULT NULL,
  `d48` varchar(19) DEFAULT NULL,
  `d49` varchar(19) DEFAULT NULL,
  `d50` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d51` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d52` char(10) DEFAULT NULL,
  `d53` char(10) DEFAULT NULL,
  `d54` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d55` char(10) DEFAULT NULL,
  `d56` char(10) DEFAULT NULL,
  `d57` char(10) DEFAULT NULL,
  `d58` char(10) DEFAULT NULL,
  `d59` varchar(255) DEFAULT NULL,
  `d60` varchar(255) DEFAULT NULL,
  `d61` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d62` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d63` varchar(255) DEFAULT NULL,
  `tabled1_id` char(10) DEFAULT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tabled4`
--

INSERT INTO `tabled4` (`tabled4_id`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `d26`, `d27`, `d28`, `d29`, `d30`, `d31`, `d32`, `d33`, `d34`, `d35`, `d36`, `d37`, `d38`, `d39`, `d40`, `d41`, `d42`, `d43`, `d44`, `d45`, `d46`, `d47`, `d48`, `d49`, `d50`, `d51`, `d52`, `d53`, `d54`, `d55`, `d56`, `d57`, `d58`, `d59`, `d60`, `d61`, `d62`, `d63`, `tabled1_id`, `timestamp`) VALUES
(1, '1', '', '1', '1', '', '1', '', '1', '1', '1', '', '1', '1', '', '1', '1', '', '', '', '1', '1', '1', '2025-01-23 01:27:44', '1', '1', '', '', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '', '1', '1', '', '1', '1', '1', '2025-01-23 01:28:00', '2025-01-23 01:28:02', '1', '1', '', '1', '1', '1', '', '', '', '1', '1', '1', '1', '1', '1', '2025-01-22 10:25:51'),
(2, '2222221', '', '1', '21', '', '1', '', '1', '21', '21', '', '1', '221', '', '1', '1', '', '', '', '2221', '22222221', '221', '2025-01-23 01:30:56', '21', '1', '', '', '21', '21', '', '1', '221', '21', '21', '21', '21', '21', '21', '', '1', '', '1', '', '1', '', '', '21', '2025-01-23 01:31:15', '2025-01-23 01:31:15', '21', '21', '1', '', '21', '', '1', '', '', '21', '21', '21', '21', '21', '2', '2025-01-22 10:28:58'),
(3, '5', '', '', '', '1', '', '1', '', '', '', '', '1', '5', '', '1', '', '1', '5', '', '5', '5', '5', '2025-01-23 02:15:32', '5', '', '1', '5', '5', '5', '', '1', '5', '5', '5', '5', '5', '5', '5', '', '1', '', '1', '5', '1', '', '', '5', '2025-01-23 02:15:50', '2025-01-23 02:15:56', '5', '5', '1', '', '', '1', '', '', '', '5', '5', '5', '5', '5', '3', '2025-01-22 23:13:38'),
(4, '5', '', '1', '5', '', '1', '', '1', '5', '5', '', '1', '5', '', '1', '1', '', '', '', '5', '5', '5', '2025-01-23 02:43:40', '5', '', '1', '5', '5', '', '1', '', '5', '5', '5', '5', '5', '', '', '', '1', '', '1', '5', '', '1', '5', '5', '2025-01-23 02:43:55', '2025-01-23 02:43:56', '5', '5', '', '1', '5', '', '1', '', '', '5', '5', '5', '5', '5', '4', '2025-01-22 23:41:36'),
(8, '8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '8', '8', '8', '2025-01-23 10:11:11', '', '', '', '', '8', '8', '', '', '8', '2', '2', '2', '2', '2', '2', '', '', '', '', '', '', '', '', '8', '2025-01-24 01:13:32', '2025-01-24 01:13:33', '8', '8', '', '', '', '', '', '', '1', '8', '8', '8', '8', '8', '8', '2025-01-23 10:11:11'),
(9, '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '1', '1', '2025-01-26 03:23:13', '', '', '', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', '', '', '2025-01-26 03:23:13', '2025-01-26 03:23:13', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '9', '2025-01-26 03:23:13'),
(10, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-01-30 08:17:29', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-01-30 08:17:29', '2025-01-30 08:17:29', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '18', '2025-01-30 20:17:29'),
(11, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-08-04 12:38:28', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-08-04 12:38:28', '2025-08-04 12:38:28', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '19', '2025-08-04 12:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `tabled5`
--

CREATE TABLE `tabled5` (
  `tabled5_id` int NOT NULL,
  `d1` char(10) DEFAULT NULL,
  `d2` varchar(255) DEFAULT NULL,
  `d3` varchar(19) DEFAULT NULL,
  `d4` varchar(255) DEFAULT NULL,
  `d5` varchar(255) DEFAULT NULL,
  `d6` char(10) DEFAULT NULL,
  `d7` varchar(255) DEFAULT NULL,
  `d8` varchar(19) DEFAULT NULL,
  `d9` text,
  `d10` varchar(255) DEFAULT NULL,
  `d11` char(10) DEFAULT NULL,
  `d12` varchar(255) DEFAULT NULL,
  `d13` varchar(19) DEFAULT NULL,
  `d14` varchar(255) DEFAULT NULL,
  `d15` varchar(255) DEFAULT NULL,
  `d16` char(10) DEFAULT NULL,
  `d17` char(10) DEFAULT NULL,
  `d18` text,
  `d19` varchar(19) DEFAULT NULL,
  `d20` varchar(19) DEFAULT NULL,
  `d21` varchar(255) DEFAULT NULL,
  `d22` varchar(19) DEFAULT NULL,
  `d23` varchar(19) DEFAULT NULL,
  `d24` varchar(255) DEFAULT NULL,
  `d25` varchar(19) DEFAULT NULL,
  `d26` varchar(19) DEFAULT NULL,
  `d27` char(10) DEFAULT NULL,
  `d28` char(10) DEFAULT NULL,
  `d29` varchar(255) DEFAULT NULL,
  `d30` varchar(255) DEFAULT NULL,
  `d31` varchar(255) DEFAULT NULL,
  `d32` varchar(255) DEFAULT NULL,
  `d33` char(10) DEFAULT NULL,
  `d34` varchar(255) DEFAULT NULL,
  `d35` varchar(255) DEFAULT NULL,
  `d36` varchar(19) DEFAULT NULL,
  `tabled1_id` char(10) DEFAULT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tabled5`
--

INSERT INTO `tabled5` (`tabled5_id`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `d26`, `d27`, `d28`, `d29`, `d30`, `d31`, `d32`, `d33`, `d34`, `d35`, `d36`, `tabled1_id`, `timestamp`) VALUES
(1, '1', '123', '2025-01-23 01:22:04', '123', '123', '1', '123', '2025-01-23 01:22:07', '123', '123', '', '', '2025-01-22 10:59:13', '', '', '', '1', '123', '2025-01-23 01:22:13', '2025-01-23 01:22:13', '123', '2025-01-23 01:22:15', '2025-01-23 01:22:15', '', '2025-01-22 10:59:13', '2025-01-22 10:59:13', '', '1', '1123', '1123', '1123', '1123', '', '1123', '1123', '2025-01-23 01:22:22', '1', '2025-01-22 23:37:42'),
(2, '1', '21', '2025-01-23 01:29:49', '21', '21', '', '', '2025-01-22 10:27:33', '', '', '', '', '2025-01-22 23:46:59', '', '', '', '1', '21', '2025-01-23 01:29:52', '2025-01-23 01:29:52', '', '2025-01-22 10:27:33', '2025-01-22 10:27:33', '', '2025-01-22 23:46:59', '2025-01-22 23:46:59', '', '1', '21', '21', '21', '21', '', '21', '21', '2025-01-23 01:29:58', '2', '2025-01-22 23:46:59'),
(3, '1', '12', '2025-01-23 02:14:05', '12', '12', '1', '12', '2025-01-23 02:14:10', '12', '12', '', '', '2025-01-22 11:12:04', '', '', '', '1', '12', '2025-01-23 02:14:13', '2025-01-23 02:14:13', '12', '2025-01-23 02:14:15', '2025-01-23 02:14:15', '', '2025-01-23 02:14:25', '2025-01-23 02:14:26', '', '1', '12', '12', '12', '12', '', '12', '12', '2025-01-23 02:14:30', '3', '2025-01-22 23:32:11'),
(4, '1', '5', '2025-01-23 02:42:30', '5', '5', '', '', '2025-01-22 23:40:14', '', '', '', '', '2025-01-22 23:40:14', '', '', '', '1', '5', '2025-01-23 02:42:34', '2025-01-23 02:42:34', '', '2025-01-22 23:40:14', '2025-01-22 23:40:14', '', '2025-01-22 23:40:14', '2025-01-22 23:40:14', '', '1', '5', '5', '5', '5', '', '5', '5', '2025-01-23 02:42:41', '4', '2025-01-22 23:40:14'),
(5, '1', '6', '2025-01-24 12:43:17', '6', '6', '', '', '2025-01-23 09:41:00', '', '', '', '', '2025-01-23 09:41:00', '', '', '', '1', '6', '2025-01-24 12:43:22', '2025-01-24 12:43:23', '', '2025-01-23 09:41:00', '2025-01-23 09:41:00', '', '2025-01-23 09:41:00', '2025-01-23 09:41:00', '', '1', '6', '6', '6', '6', '', '6', '6', '2025-01-24 12:43:28', '5', '2025-01-23 09:41:00'),
(6, '1', '6', '2025-01-24 12:47:29', '6', '6', '', '', '2025-01-23 09:45:11', '', '', '', '', '2025-01-23 09:45:11', '', '', '', '1', '6', '2025-01-24 12:47:32', '2025-01-24 12:47:33', '', '2025-01-23 09:45:11', '2025-01-23 09:45:11', '', '2025-01-23 09:45:11', '2025-01-23 09:45:11', '', '1', '6', '6', '6', '6', '', '6', '6', '2025-01-24 12:47:40', '6', '2025-01-23 09:45:11'),
(7, '1', '1', '2025-01-24 01:09:33', '1', '1', '', '', '2025-01-23 10:07:20', '', '', '', '', '2025-01-23 10:07:20', '', '', '', '1', '1', '2025-01-24 01:09:41', '2025-01-24 01:09:42', '', '2025-01-23 10:07:20', '2025-01-23 10:07:20', '', '2025-01-23 10:07:20', '2025-01-23 10:07:20', '', '1', '1', '1', '1', '1', '', '1', '1', '2025-01-24 01:09:48', '7', '2025-01-23 10:07:20'),
(8, '1', '8', '2025-01-24 01:12:48', '8', '8', '', '', '2025-01-23 10:10:30', '', '', '', '', '2025-01-23 10:10:30', '', '', '', '1', '8', '2025-01-24 01:12:52', '2025-01-24 01:12:53', '', '2025-01-23 10:10:30', '2025-01-23 10:10:30', '', '2025-01-23 10:10:30', '2025-01-23 10:10:30', '', '1', '8', '8', '8', '8', '', '8', '8', '2025-01-24 01:12:59', '8', '2025-01-26 08:47:40'),
(9, '1', '1', '2025-01-26 06:24:53', '1', '1', '', '', '2025-01-26 03:22:25', '', '', '', '', '2025-01-26 03:22:25', '', '', '', '1', '2', '2025-01-26 06:24:57', '2025-01-26 06:24:57', '', '2025-01-26 03:22:25', '2025-01-26 03:22:25', '', '2025-01-26 03:22:25', '2025-01-26 03:22:25', '', '1', '3', '3', '3', '', '', '1', '1', '2025-01-26 06:25:03', '9', '2025-01-26 03:22:25'),
(31, '1', '1', '2025-01-26 09:35:12', '1', '1', '', '', '2025-01-26 06:41:25', '', '', '', '', '2025-01-26 06:41:25', '', '', '', '1', '2', '2025-01-26 09:35:22', '2025-01-26 09:35:17', '', '2025-01-26 06:41:25', '2025-01-26 06:41:25', '', '2025-01-26 06:41:25', '2025-01-26 06:41:25', '', '1', '1', '1', '1', '1', '', '1', '1', '2025-01-26 09:35:35', '11', '2025-01-26 06:41:25'),
(32, '1', '1', '2025-01-26 10:02:10', '1', '1', '', '', '2025-01-26 06:59:45', '', '', '', '', '2025-01-26 06:59:45', '', '', '', '1', '1', '2025-01-26 10:02:14', '2025-01-26 10:02:14', '', '2025-01-26 06:59:45', '2025-01-26 06:59:45', '', '2025-01-26 06:59:45', '2025-01-26 06:59:45', '', '1', '1', '1', '1', '1', '', '1', '1', '2025-01-26 10:02:22', '12', '2025-01-26 08:45:56'),
(33, '1', '6', '2025-01-27 12:10:47', '6', '6', '', '', '2025-01-26 09:08:20', '', '', '', '', '2025-01-26 09:08:20', '', '', '', '1', '6', '2025-01-27 12:10:51', '2025-01-27 12:10:52', '', '2025-01-26 09:08:20', '2025-01-26 09:08:20', '', '2025-01-26 09:08:20', '2025-01-26 09:08:20', '', '1', '6', '6', '6', '6', '', '6', '6', '2025-01-27 12:10:57', '13', '2025-01-26 09:08:20'),
(34, '1', '2', '2025-01-27 12:21:50', '2', '2', '', '', '2025-01-26 09:19:20', '', '', '', '', '2025-01-26 09:19:20', '', '', '', '1', '2', '2025-01-27 12:21:53', '2025-01-27 12:21:53', '', '2025-01-26 09:19:20', '2025-01-26 09:19:20', '', '2025-01-26 09:19:20', '2025-01-26 09:19:20', '', '1', '2', '2', '2', '2', '', '2', '2', '2025-01-27 12:21:58', '14', '2025-01-26 09:21:24'),
(35, '', '', '2025-01-30 19:54:18', '', '', '', '', '2025-01-30 19:54:18', '', '', '', '', '2025-01-30 19:54:18', '', '', '', '', '', '2025-01-30 19:54:18', '2025-01-30 19:54:18', '', '2025-01-30 19:54:18', '2025-01-30 19:54:18', '', '2025-01-30 19:54:18', '2025-01-30 19:54:18', '', '', '', '', '', '', '', '', '', '2025-01-30 19:54:18', '15', '2025-01-30 19:54:18'),
(36, '', '', '2025-01-30 20:00:02', '', '', '', '', '2025-01-30 20:00:02', '', '', '', '', '2025-01-30 20:00:02', '', '', '', '', '', '2025-01-30 20:00:02', '2025-01-30 20:00:02', '', '2025-01-30 20:00:02', '2025-01-30 20:00:02', '', '2025-01-30 20:00:02', '2025-01-30 20:00:02', '', '', '', '', '', '', '', '', '', '2025-01-30 20:00:02', '16', '2025-01-30 20:00:02'),
(37, '', '', '2025-01-30 08:08:17', '', '', '', '', '2025-01-30 08:08:17', '', '', '', '', '2025-01-30 08:08:17', '', '', '', '', '', '2025-01-30 08:08:17', '2025-01-30 08:08:17', '', '2025-01-30 08:08:17', '2025-01-30 08:08:17', '', '2025-01-30 08:08:17', '2025-01-30 08:08:17', '', '', '', '', '', '', '', '', '', '2025-01-30 08:08:17', '17', '2025-02-26 00:30:49'),
(38, '', '', '2025-01-30 08:09:41', '', '', '', '', '2025-01-30 08:09:41', '', '', '', '', '2025-01-30 08:09:41', '', '', '', '', '', '2025-01-30 08:09:41', '2025-01-30 08:09:41', '', '2025-01-30 08:09:41', '2025-01-30 08:09:41', '', '2025-01-30 08:09:41', '2025-01-30 08:09:41', '', '', '', '', '', '', '', '', '', '2025-01-30 08:09:41', '18', '2025-02-26 00:22:39'),
(39, '', '', '2025-08-04 12:38:12', '', '', '', '', '2025-08-04 12:38:12', '', '', '', '', '2025-08-04 12:38:12', '', '', '', '', '', '2025-08-04 12:38:12', '2025-08-04 12:38:12', '', '2025-08-04 12:38:12', '2025-08-04 12:38:12', '', '2025-08-04 12:38:12', '2025-08-04 12:38:12', '', '', '', '', '', '', '', '', '', '2025-08-04 12:38:12', '19', '2025-08-04 12:38:12'),
(40, '', '', '2025-08-04 12:45:18', '', '', '', '', '2025-08-04 12:45:18', '', '', '', '', '2025-08-04 12:45:18', '', '', '', '', '', '2025-08-04 12:45:18', '2025-08-04 12:45:18', '', '2025-08-04 12:45:18', '2025-08-04 12:45:18', '', '2025-08-04 12:45:18', '2025-08-04 12:45:18', '', '', '', '', '', '', '', '', '', '2025-08-04 12:45:18', '20', '2025-08-04 12:45:18'),
(41, '', '', '2025-08-04 16:34:26', '', '', '', '', '2025-08-04 16:34:26', '', '', '', '', '2025-08-04 16:34:26', '', '', '', '', '', '2025-08-04 16:34:26', '2025-08-04 16:34:26', '', '2025-08-04 16:34:26', '2025-08-04 16:34:26', '', '2025-08-04 16:34:26', '2025-08-04 16:34:26', '', '', '', '', '', '', '', '', '', '2025-08-04 16:34:26', '21', '2025-08-04 16:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `tablee1`
--

CREATE TABLE `tablee1` (
  `tablee1_id` int NOT NULL,
  `d0` varchar(255) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `HN` varchar(255) DEFAULT NULL,
  `AN` varchar(255) DEFAULT NULL,
  `DX` text,
  `UD` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `date_in` varchar(19) DEFAULT NULL,
  `date_out` varchar(19) DEFAULT NULL,
  `date_move` varchar(19) DEFAULT NULL,
  `from_ward` varchar(255) DEFAULT NULL,
  `date_infect` varchar(19) DEFAULT NULL,
  `ward_infect` varchar(255) DEFAULT NULL,
  `dep_infect` varchar(255) DEFAULT NULL,
  `d1` char(10) DEFAULT NULL,
  `d2` char(10) DEFAULT NULL,
  `d3` char(10) DEFAULT NULL,
  `d4` char(10) DEFAULT NULL,
  `d5` char(10) DEFAULT NULL,
  `d6` char(10) DEFAULT NULL,
  `d7` char(10) DEFAULT NULL,
  `d8` char(10) DEFAULT NULL,
  `d9` char(10) DEFAULT NULL,
  `d10` char(10) DEFAULT NULL,
  `d11` char(10) DEFAULT NULL,
  `d12` char(10) DEFAULT NULL,
  `d13` char(10) DEFAULT NULL,
  `d14` char(10) DEFAULT NULL,
  `d15` char(10) DEFAULT NULL,
  `d16` char(10) DEFAULT NULL,
  `d17` char(10) DEFAULT NULL,
  `d18` char(10) DEFAULT NULL,
  `d19` char(10) DEFAULT NULL,
  `d20` char(10) DEFAULT NULL,
  `d21` char(10) DEFAULT NULL,
  `d22` char(10) DEFAULT NULL,
  `d23` char(10) DEFAULT NULL,
  `d24` char(10) DEFAULT NULL,
  `d25` char(10) DEFAULT NULL,
  `d26` char(10) DEFAULT NULL,
  `d27` char(10) DEFAULT NULL,
  `d28` char(10) DEFAULT NULL,
  `d29` char(10) DEFAULT NULL,
  `d30` char(10) DEFAULT NULL,
  `d31` char(10) DEFAULT NULL,
  `d32` char(10) DEFAULT NULL,
  `d33` char(10) DEFAULT NULL,
  `d34` char(10) DEFAULT NULL,
  `d35` char(10) DEFAULT NULL,
  `d36` char(10) DEFAULT NULL,
  `d37` char(10) DEFAULT NULL,
  `d38` char(10) DEFAULT NULL,
  `d39` char(10) DEFAULT NULL,
  `d40` char(10) DEFAULT NULL,
  `d41` char(10) DEFAULT NULL,
  `d42` char(10) DEFAULT NULL,
  `d43` char(10) DEFAULT NULL,
  `d44` char(10) DEFAULT NULL,
  `d45` char(10) DEFAULT NULL,
  `d46` char(10) DEFAULT NULL,
  `d47` char(10) DEFAULT NULL,
  `d48` char(10) DEFAULT NULL,
  `d49` char(10) DEFAULT NULL,
  `d50` char(10) DEFAULT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tablee1`
--

INSERT INTO `tablee1` (`tablee1_id`, `d0`, `pname`, `fname`, `lname`, `age`, `HN`, `AN`, `DX`, `UD`, `date_in`, `date_out`, `date_move`, `from_ward`, `date_infect`, `ward_infect`, `dep_infect`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `d26`, `d27`, `d28`, `d29`, `d30`, `d31`, `d32`, `d33`, `d34`, `d35`, `d36`, `d37`, `d38`, `d39`, `d40`, `d41`, `d42`, `d43`, `d44`, `d45`, `d46`, `d47`, `d48`, `d49`, `d50`, `timestamp`) VALUES
(1, '123', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '123', 'Organic mood [affective] disorders', '123', '2025-01-23 01:32:19', '2025-01-23 01:32:19', '2025-01-22 10:36:17', '123', '2025-01-23 01:32:22', '2', '123', '1', '', '1', '', '', '1', '1', '', '', '1', '1', '1', '', '1', '', '', '1', '1', '', '1', '1', '1', '', '1', '', '1', '', '1', '1', '', '1', '1', '', '1', '1', '1', '', '', '1', '1', '', '', '1', '1', '', '', '1', '1', '', '', '2025-01-22 10:36:17'),
(3, '3', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '', 'HW7212', '31', 'Organic mood [affective] disorders', '31', '2025-01-24 01:15:57', '2025-01-24 01:15:57', '2025-01-24 01:15:58', '31', '2025-01-24 01:15:59', '0', '', '1', '1', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '1', '', '1', '', '', '', '1', '', '', '1', '1', '', '1', '', '1', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '2025-01-23 10:13:48'),
(4, 'งานการพยาบาลอายุรกรรม 1(4ก)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '', 'HW7212', '', 'Organic mood [affective] disorders', '', '2025-01-26 06:26:47', '2025-01-26 06:26:47', '2025-01-26 06:26:46', '', '2025-01-26 06:26:49', '0', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '1', '', '1', '', '', '2025-01-26 03:24:19'),
(8, 'งานการพยาบาลผู้ป่วยพิเศษ 1(6จ)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '6', '', '4', '2025-01-26 10:02:57', '2025-01-26 10:02:57', '2025-01-26 10:02:58', 'งานการพยาบาลอายุรกรรม 1(4ข-3)', '2025-01-26 07:03:58', '0', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '1', '', '1', '', '', '', '', '', '', '1', '1', '', '1', '', '', '', '', '1', '', '', '', '', '', '1', '', '', '', '', '', '1', '', '', '2025-01-26 07:03:58'),
(9, 'งานการพยาบาลออร์โธปิดิกส์(3ฉ)', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '3', 'Organic mood [affective] disorders', '', '2025-01-26 09:17:58', '2025-01-26 09:17:58', '2025-01-26 09:17:58', 'งานการพยาบาลจักษุ โสต จิตเวชและตรวจวินิจฉัยพิเศษ(5ง)', '2025-01-26 09:17:58', 'งานการพยาบาลกุมารเวชกรรม(NICU)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-01-26 09:17:58'),
(10, '', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '35', 'HW7212', '', 'Graves disease', '', '2025-01-30 20:18:47', '2025-01-30 20:18:47', '2025-01-30 20:18:47', '', '2025-01-30 20:18:47', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-01-30 20:18:47'),
(11, '', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '', 'Organic mood [affective] disorders', '', '2025-01-30 20:34:30', '2025-01-30 20:34:30', '2025-01-30 20:34:30', '', '2025-01-30 20:34:30', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-01-30 20:34:30'),
(12, '', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '', 'Organic mood [affective] disorders', '', '2025-08-04 12:46:32', '2025-08-04 12:46:32', '2025-08-04 12:46:32', '', '2025-08-04 12:46:32', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-08-04 12:46:32'),
(13, '', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '', 'Organic mood [affective] disorders', '', '2025-08-04 16:43:30', '2025-08-04 16:43:30', '2025-08-04 16:43:30', '', '2025-08-04 16:43:30', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-08-04 16:43:30'),
(14, '', 'น.ส.', 'ภัทณิกานต์', 'ลิมป์นิศากร', '36', 'HW7212', '', 'Hypothyroidism following radioiodine therapy', '', '2025-08-04 16:46:54', '2025-08-04 16:46:54', '2025-08-04 16:46:54', '', '2025-08-04 16:46:54', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-08-04 16:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `tablee2`
--

CREATE TABLE `tablee2` (
  `tablee2_id` int NOT NULL,
  `d1` char(10) DEFAULT NULL,
  `d2` varchar(255) DEFAULT NULL,
  `d3` varchar(19) DEFAULT NULL,
  `d4` varchar(255) DEFAULT NULL,
  `d5` varchar(255) DEFAULT NULL,
  `d6` char(10) DEFAULT NULL,
  `d7` varchar(255) DEFAULT NULL,
  `d8` varchar(19) DEFAULT NULL,
  `d9` varchar(255) DEFAULT NULL,
  `d10` varchar(255) DEFAULT NULL,
  `d11` char(10) DEFAULT NULL,
  `d12` varchar(255) DEFAULT NULL,
  `d13` varchar(19) DEFAULT NULL,
  `d14` varchar(255) DEFAULT NULL,
  `d15` varchar(255) DEFAULT NULL,
  `d16` char(10) DEFAULT NULL,
  `d17` char(10) DEFAULT NULL,
  `d18` varchar(255) DEFAULT NULL,
  `d19` varchar(19) DEFAULT NULL,
  `d20` varchar(19) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `d21` varchar(255) DEFAULT NULL,
  `d22` varchar(19) DEFAULT NULL,
  `d23` varchar(19) DEFAULT NULL,
  `d24` varchar(255) DEFAULT NULL,
  `d25` varchar(19) DEFAULT NULL,
  `d26` varchar(19) DEFAULT NULL,
  `d27` char(10) DEFAULT NULL,
  `d28` char(10) DEFAULT NULL,
  `d29` varchar(255) DEFAULT NULL,
  `d30` varchar(255) DEFAULT NULL,
  `d31` varchar(255) DEFAULT NULL,
  `d32` char(10) DEFAULT NULL,
  `d33` char(10) DEFAULT NULL,
  `d34` char(10) DEFAULT NULL,
  `d35` varchar(255) DEFAULT NULL,
  `d36` char(10) DEFAULT NULL,
  `d37` char(10) DEFAULT NULL,
  `d38` char(10) DEFAULT NULL,
  `d39` char(10) DEFAULT NULL,
  `d40` char(10) DEFAULT NULL,
  `d41` char(10) DEFAULT NULL,
  `d42` char(10) DEFAULT NULL,
  `d43` varchar(255) DEFAULT NULL,
  `d44` varchar(255) DEFAULT NULL,
  `d45` varchar(19) DEFAULT NULL,
  `d46` text,
  `tablee1_id` char(10) DEFAULT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tablee2`
--

INSERT INTO `tablee2` (`tablee2_id`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `d26`, `d27`, `d28`, `d29`, `d30`, `d31`, `d32`, `d33`, `d34`, `d35`, `d36`, `d37`, `d38`, `d39`, `d40`, `d41`, `d42`, `d43`, `d44`, `d45`, `d46`, `tablee1_id`, `timestamp`) VALUES
(1, '1', '12', '2025-01-23 01:38:57', '12', '1', '', '', '2025-01-22 10:41:24', '', '', '', '', '2025-01-22 10:41:24', '', '', '', '1', '12', '2025-01-23 01:39:01', '2025-01-23 01:39:02', '12', '', '2025-01-23 01:39:03', '', '2025-01-22 10:41:24', '2025-01-22 10:41:24', '', '1', '12', '12', '12', '12', '', '1', '', '', '1', '', '', '1', '', '', '12', '12', '', '111111111111112', '1', '2025-01-22 10:41:24'),
(3, '1', '3', '2025-01-24 01:16:21', '3', '3', '', '', '2025-01-23 10:14:08', '', '', '', '', '2025-01-23 10:14:08', '', '', '', '1', '3', '2025-01-24 01:16:24', '2025-01-24 01:16:25', '', '2025-01-23 10:14:08', '2025-01-23 10:14:08', '', '2025-01-23 10:14:08', '2025-01-23 10:14:08', '', '1', '3', '3', '3', '3', '', '1', '', '1', '', '', '1', '', '', '', '3', '3', '2025-01-24 01:16:35', '33333333333', '3', '2025-01-23 10:14:08'),
(4, '1', '1', '2025-01-26 06:27:02', '1', '1', '', '', '2025-01-26 03:24:37', '', '', '', '', '2025-01-26 03:24:37', '', '', '', '1', '1', '2025-01-26 06:27:05', '2025-01-26 06:27:06', '', '', '', '', '2025-01-26 03:24:37', '2025-01-26 03:24:37', '', '1', '1', '1', '1', '1', '', '1', '', '', '1', '', '', '', '', '', '1', '1', '', '11', '4', '2025-01-26 03:24:37'),
(5, '1', '2', '2025-01-26 10:07:05', '2', '2', '', '', '2025-01-26 07:04:44', '', '', '', '', '2025-01-26 07:04:44', '', '', '', '1', '2', '2025-01-26 10:07:09', '2025-01-26 10:07:10', '', '2025-01-26 07:04:44', '2025-01-26 07:04:44', '', '2025-01-26 07:04:44', '2025-01-26 07:04:44', '', '1', '2', '2', '2', '2', '', '1', '', '', '', '', '', '1', '', '', '2', '2', '2025-01-26 10:07:20', '2222', '8', '2025-01-26 07:04:44'),
(6, '1', '3', '2025-01-27 12:20:41', '3', '3', '', '', '2025-01-26 09:18:11', '', '', '', '', '2025-01-26 09:18:11', '', '', '', '1', '3', '2025-01-27 12:20:44', '2025-01-27 12:20:45', '', '2025-01-26 09:18:11', '2025-01-26 09:18:11', '', '2025-01-26 09:18:11', '2025-01-26 09:18:11', '', '1', '3', '3', '3', '3', '', '', '', '', '', '', '', '', '', '', '', '', '2025-01-26 09:18:11', '3333', '9', '2025-01-26 09:18:11'),
(7, '', '', '2025-01-30 20:20:07', '', '', '', '', '2025-01-30 20:20:07', '', '', '', '', '2025-01-30 20:20:07', '', '', '', '', '', '2025-01-30 20:20:07', '2025-01-30 20:20:07', '', '2025-01-30 20:20:07', '2025-01-30 20:20:07', '', '2025-01-30 20:20:07', '2025-01-30 20:20:07', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-01-30 20:20:07', '', '10', '2025-01-30 20:20:07'),
(8, '', '', '2025-01-30 20:34:34', '', '', '', '', '2025-01-30 20:34:34', '', '', '', '', '2025-01-30 20:34:34', '', '', '', '', '', '2025-01-30 20:34:34', '2025-01-30 20:34:34', '', '2025-01-30 20:34:34', '2025-01-30 20:34:34', '', '2025-01-30 20:34:34', '2025-01-30 20:34:34', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-01-30 20:34:34', '', '11', '2025-01-30 20:34:34'),
(9, '', '', '2025-08-04 12:46:36', '', '', '', '', '2025-08-04 12:46:36', '', '', '', '', '2025-08-04 12:46:36', '', '', '', '', '', '2025-08-04 12:46:36', '2025-08-04 12:46:36', '', '2025-08-04 12:46:36', '2025-08-04 12:46:36', '', '2025-08-04 12:46:36', '2025-08-04 12:46:36', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-08-04 12:46:36', '', '12', '2025-08-04 12:46:36'),
(10, '', '', '2025-08-04 16:49:58', '', '', '', '', '2025-08-04 16:49:58', '', '', '', '', '2025-08-04 16:49:58', '', '', '', '', '', '2025-08-04 16:49:58', '2025-08-04 16:49:58', '', '2025-08-04 16:49:58', '2025-08-04 16:49:58', '', '2025-08-04 16:49:58', '2025-08-04 16:49:58', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-08-04 16:49:58', '', '14', '2025-08-04 16:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `tablef`
--

CREATE TABLE `tablef` (
  `tablef_id` int NOT NULL,
  `f1` date DEFAULT NULL,
  `f2` char(10) DEFAULT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tablef`
--

INSERT INTO `tablef` (`tablef_id`, `f1`, `f2`, `timestamp`) VALUES
(1, '2025-01-22', '20', '2025-01-22 06:55:17'),
(2, '2025-01-15', '10', '2025-01-22 06:55:28'),
(3, '2025-01-16', '15', '2025-01-22 06:55:38'),
(4, '2025-01-14', '17', '2025-01-22 10:42:05'),
(6, '2025-01-23', '25', '2025-01-23 00:26:31'),
(7, '2025-01-27', '18', '2025-01-26 09:21:48'),
(8, '2025-01-25', '20', '2025-01-26 09:26:27'),
(9, '2025-01-24', '17', '2025-01-26 09:27:32'),
(10, '2025-01-26', '12', '2025-01-26 09:29:14'),
(11, '2025-01-09', '10', '2025-01-26 09:29:52'),
(12, '2025-01-10', '11', '2025-01-26 09:34:03'),
(13, '2025-01-11', '15', '2025-01-26 09:36:25'),
(14, '2025-01-13', '10', '2025-01-26 09:36:59'),
(16, '2025-01-01', '12', '2025-01-26 09:40:02'),
(17, '2025-01-02', '20', '2025-01-26 09:40:24'),
(19, '2025-01-03', '3', '2025-01-26 09:41:36'),
(20, '2025-01-05', '5', '2025-01-26 09:44:24'),
(21, '2025-01-04', '19', '2025-01-26 09:46:09'),
(22, '2025-01-06', '17', '2025-01-26 09:46:51'),
(23, '2025-01-31', '15', '2025-01-30 19:03:44'),
(24, '2025-01-30', '5', '2025-01-30 19:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `tableg`
--

CREATE TABLE `tableg` (
  `tableg_id` int NOT NULL,
  `g1` date DEFAULT NULL,
  `g2` char(10) DEFAULT NULL,
  `g3` char(10) DEFAULT NULL,
  `g4` char(10) DEFAULT NULL,
  `g5` char(10) DEFAULT NULL,
  `g6` char(10) DEFAULT NULL,
  `surg` char(10) DEFAULT NULL,
  `g7` char(10) DEFAULT NULL,
  `g8` char(10) DEFAULT NULL,
  `g9` char(10) DEFAULT NULL,
  `g10` char(10) DEFAULT NULL,
  `g11` char(10) DEFAULT NULL,
  `g12` char(10) DEFAULT NULL,
  `g13` char(10) DEFAULT NULL,
  `g14` char(10) DEFAULT NULL,
  `g15` char(10) DEFAULT NULL,
  `ortho` char(10) DEFAULT NULL,
  `g16` char(10) DEFAULT NULL,
  `g17` char(10) DEFAULT NULL,
  `g18` char(10) DEFAULT NULL,
  `g19` char(10) DEFAULT NULL,
  `g20` char(10) DEFAULT NULL,
  `g21` char(10) DEFAULT NULL,
  `g22` char(10) DEFAULT NULL,
  `g23` char(10) DEFAULT NULL,
  `g24` char(10) DEFAULT NULL,
  `otor` char(10) DEFAULT NULL,
  `g25` char(10) DEFAULT NULL,
  `g26` char(10) DEFAULT NULL,
  `g27` char(10) DEFAULT NULL,
  `g28` char(10) DEFAULT NULL,
  `g29` char(10) DEFAULT NULL,
  `g30` char(10) DEFAULT NULL,
  `g31` char(10) DEFAULT NULL,
  `g32` char(10) DEFAULT NULL,
  `g33` char(10) DEFAULT NULL,
  `oph` char(10) DEFAULT NULL,
  `g34` char(10) DEFAULT NULL,
  `g35` char(10) DEFAULT NULL,
  `g36` char(10) DEFAULT NULL,
  `g37` char(10) DEFAULT NULL,
  `g38` char(10) DEFAULT NULL,
  `g39` char(10) DEFAULT NULL,
  `g40` char(10) DEFAULT NULL,
  `g41` char(10) DEFAULT NULL,
  `g42` char(10) DEFAULT NULL,
  `ped` char(10) DEFAULT NULL,
  `g43` char(10) DEFAULT NULL,
  `g44` char(10) DEFAULT NULL,
  `g45` char(10) DEFAULT NULL,
  `g46` char(10) DEFAULT NULL,
  `g47` char(10) DEFAULT NULL,
  `g48` char(10) DEFAULT NULL,
  `g49` char(10) DEFAULT NULL,
  `g50` char(10) DEFAULT NULL,
  `g51` char(10) DEFAULT NULL,
  `dent` char(10) DEFAULT NULL,
  `g52` char(10) DEFAULT NULL,
  `g53` char(10) DEFAULT NULL,
  `g54` char(10) DEFAULT NULL,
  `g55` char(10) DEFAULT NULL,
  `g56` char(10) DEFAULT NULL,
  `g57` char(10) DEFAULT NULL,
  `g58` char(10) DEFAULT NULL,
  `g59` char(10) DEFAULT NULL,
  `g60` char(10) DEFAULT NULL,
  `obs` char(10) DEFAULT NULL,
  `g61` char(10) DEFAULT NULL,
  `g62` char(10) DEFAULT NULL,
  `g63` char(10) DEFAULT NULL,
  `g64` char(10) DEFAULT NULL,
  `g65` char(10) DEFAULT NULL,
  `g66` char(10) DEFAULT NULL,
  `g67` char(10) DEFAULT NULL,
  `g68` char(10) DEFAULT NULL,
  `g69` char(10) DEFAULT NULL,
  `med` char(10) DEFAULT NULL,
  `g70` char(10) DEFAULT NULL,
  `g71` char(10) DEFAULT NULL,
  `g72` char(10) DEFAULT NULL,
  `g73` char(10) DEFAULT NULL,
  `g74` char(10) DEFAULT NULL,
  `g75` char(10) DEFAULT NULL,
  `g76` char(10) DEFAULT NULL,
  `g77` char(10) DEFAULT NULL,
  `g78` char(10) DEFAULT NULL,
  `other` char(10) DEFAULT NULL,
  `g79` char(10) DEFAULT NULL,
  `g80` char(10) DEFAULT NULL,
  `g81` char(10) DEFAULT NULL,
  `g82` char(10) DEFAULT NULL,
  `g83` char(10) DEFAULT NULL,
  `g84` char(10) DEFAULT NULL,
  `g85` char(10) DEFAULT NULL,
  `g86` char(10) DEFAULT NULL,
  `g87` char(10) DEFAULT NULL,
  `g88` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tableg`
--

INSERT INTO `tableg` (`tableg_id`, `g1`, `g2`, `g3`, `g4`, `g5`, `g6`, `surg`, `g7`, `g8`, `g9`, `g10`, `g11`, `g12`, `g13`, `g14`, `g15`, `ortho`, `g16`, `g17`, `g18`, `g19`, `g20`, `g21`, `g22`, `g23`, `g24`, `otor`, `g25`, `g26`, `g27`, `g28`, `g29`, `g30`, `g31`, `g32`, `g33`, `oph`, `g34`, `g35`, `g36`, `g37`, `g38`, `g39`, `g40`, `g41`, `g42`, `ped`, `g43`, `g44`, `g45`, `g46`, `g47`, `g48`, `g49`, `g50`, `g51`, `dent`, `g52`, `g53`, `g54`, `g55`, `g56`, `g57`, `g58`, `g59`, `g60`, `obs`, `g61`, `g62`, `g63`, `g64`, `g65`, `g66`, `g67`, `g68`, `g69`, `med`, `g70`, `g71`, `g72`, `g73`, `g74`, `g75`, `g76`, `g77`, `g78`, `other`, `g79`, `g80`, `g81`, `g82`, `g83`, `g84`, `g85`, `g86`, `g87`, `g88`, `timestamp`) VALUES
(1, '2025-01-22', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '11', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '11111', '2025-01-22 10:43:37'),
(2, '2025-01-23', '21', '21', '21', '21', '21', '1', '21', '21', '21', '21', '21', '21', '21', '21', '21', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '1', '221', '21', '21', '21', '21', '21', '21', '21', '21', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '1', '21', '21', '21', '21', '21', '21', '21', '21', '21', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '1', '21', '21', '21', '21', '21', '21', '21', '21', '21', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '1', '21', '21', '21', '21', '21', '21', '21', '21', '21', '221', '2025-01-23 00:22:51'),
(3, '2025-01-23', '31', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '11', '1', '1', '1', '1', '1', '11', '1', '1', '1', '1', '1', '3', '3', '3', '3', '3', '3', '3', '3', '3', '1', '33', '3', '3', '3', '3', '3', '3', '3', '3', '1', '33', '3', '3', '3', '3', '3', '3', '3', '3', '3', '2025-01-23 00:26:09'),
(4, '2025-01-27', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '5555555555', '2025-01-26 09:48:47'),
(5, '2025-01-31', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '2025-01-30 20:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `type_department`
--

CREATE TABLE `type_department` (
  `id_department` int NOT NULL,
  `name_department` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `type_department`
--

INSERT INTO `type_department` (`id_department`, `name_department`, `status`) VALUES
(1, 'งานการพยาบาลศัลยกรรม', 1),
(2, 'งานการพยาบาลออร์โธปิดิกส์', 1),
(3, 'งานการพยาบาลอายุรกรรม 1', 1),
(4, 'งานการพยาบาลอายุรกรรม 2', 1),
(5, 'งานการพยาบาลจักษุ โสต จิตเวชและตรวจวินิจฉัยพิเศษ', 1),
(6, 'งานการพยาบาลสูติ-นรีเวชกรรม', 1),
(7, 'งานการพยาบาลบำบัดพิเศษ', 1),
(8, 'งานการพยาบาลห้องผ่าตัด 1', 1),
(9, 'งานการพยาบาลห้องผ่าตัด 2', 1),
(10, 'งานการพยาบาลกุมารเวชกรรม', 1),
(11, 'งานการพยาบาลผู้ป่วยพิเศษ 1', 1),
(12, 'งานการพยาบาลผู้ป่วยพิเศษ 2', 1),
(13, 'งานการพยาบาลผู้ป่วยพิเศษ 3', 1),
(14, 'งานการพยาบาลผู้ป่วยพิเศษ 4', 1),
(15, 'งานการพยาบาลผู้ป่วยวิกฤต 1', 1),
(16, 'งานการพยาบาลผู้ป่วยวิกฤต 2', 1),
(17, 'งานการพยาบาลผู้ป่วยวิกฤต 3', 1),
(18, 'งานการพยาบาลผู้ป่วยอุบัติเหตุและฉุกเฉิน', 1),
(19, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 1', 1),
(20, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 2', 1),
(21, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 3', 1),
(22, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 4', 1),
(23, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 5', 1),
(24, 'งานการพยาบาลผู้ป่วยนอก', 1),
(25, 'งานการพยาบาลเวชปฏิบัติครอบครัว', 1),
(26, 'งานการพยาบาลเฉพาะทางและสนับสนุนบริการพยาบาล', 1),
(27, 'งานวิสัญญีพยาบาล', 1),
(30, 'อื่นๆ', 1),
(31, 'งานการพยาบาลนาม', 2),
(32, 'งานการพยาบาลนาม10', 2),
(33, 'งานการพยาบาลนาม2', 2),
(34, 'งานการพยาบาลนาม11', 2),
(35, 'ห้องที่ 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type_ward`
--

CREATE TABLE `type_ward` (
  `id_ward` int NOT NULL,
  `name_ward` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Type_department` int NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `type_ward`
--

INSERT INTO `type_ward` (`id_ward`, `name_ward`, `Type_department`, `status`) VALUES
(1, '3ก', 1, 1),
(2, '3ข', 1, 1),
(3, 'IMC-3ข', 1, 1),
(4, 'Burn Unit', 1, 1),
(5, '3ค', 1, 1),
(6, '2ฉ', 2, 1),
(7, '3ฉ', 2, 1),
(8, '5ค', 2, 1),
(9, '4ก', 3, 1),
(10, 'IMC 4ก', 3, 1),
(11, '4ข-1', 3, 1),
(12, '4ข-2', 3, 1),
(13, '4ข-3', 3, 1),
(14, '4ค', 3, 1),
(15, 'IMC-4ค', 3, 1),
(16, 'หน่วยระบบทางเดินหายใจ', 4, 1),
(17, 'หน่วยหัวใจและหลอดเลือด', 4, 1),
(18, 'หน่วยไตและไตเทียม', 4, 1),
(19, '3จ', 5, 1),
(20, 'IMC-3จ', 5, 1),
(21, '4ง', 5, 1),
(22, '5ง', 5, 1),
(23, 'จิตเวช', 5, 1),
(24, '2ก', 6, 1),
(25, '2ข', 6, 1),
(26, '5ข', 6, 1),
(27, 'ห้องคลอด', 6, 1),
(28, 'หน่วยวางแผนครอบครัว', 6, 1),
(29, '5ก', 7, 1),
(30, '5จ', 7, 1),
(31, '2จ หน่วยเคมีบำบัดผู้ป่วยนอก', 7, 1),
(32, 'หน่วยผ่าตัด 1', 8, 1),
(33, 'หน่วยผ่าตัด 2', 8, 1),
(34, 'หน่วยผ่าตัด 3', 8, 1),
(35, 'หน่วยผ่าตัด 4', 9, 1),
(36, 'หน่วยผ่าตัด 5', 9, 1),
(37, 'หน่วยผ่าตัดเล็ก', 9, 1),
(38, 'NICU', 10, 1),
(39, 'IMC-2ค', 10, 1),
(40, 'IMC-2ง', 10, 1),
(41, '2ง', 10, 1),
(42, '3ง', 10, 1),
(43, '6ก', 11, 1),
(44, '6ข', 11, 1),
(45, '6จ', 11, 1),
(46, 'หอสงฆ์อาพาธ', 12, 1),
(47, 'สว.11', 12, 1),
(48, 'สว.12', 12, 1),
(49, 'หอผู้ป่วยพิเศษรวม 8B', 13, 1),
(50, 'หอผู้ป่วยพิเศษรวม 8C', 13, 1),
(51, 'หอผู้ป่วยพิเศษรวม 9A', 13, 1),
(52, 'หอผู้ป่วยพิเศษรวม 9B', 13, 1),
(53, 'หอผู้ป่วยพิเศษรวม 9C', 13, 1),
(54, 'หอผู้ป่วยพิเศษ กว.6/1', 14, 1),
(55, 'หอผู้ป่วยพิเศษ กว.6/2', 14, 1),
(56, 'หอผู้ป่วยพิเศษ กว.7/1', 14, 1),
(57, 'MICU1', 15, 1),
(58, 'MICU2', 15, 1),
(59, 'MICU3', 15, 1),
(60, 'CCU', 15, 1),
(61, 'ห้องปฏิบัติการสวนหัวใจและหลอดเลือด', 15, 1),
(62, 'NSICU', 16, 1),
(63, 'PICU', 16, 1),
(64, 'CVT-ICU', 16, 1),
(65, 'SICU2', 16, 1),
(66, 'SICU1', 17, 1),
(67, 'SICU3', 17, 1),
(68, 'SCTU', 17, 1),
(69, 'AE1', 18, 1),
(70, 'AE2', 18, 1),
(71, 'AE3', 18, 1),
(72, 'AE4', 18, 1),
(73, 'OPD AE', 18, 1),
(74, 'หน่วย EMS', 18, 1),
(75, 'ห้องตรวจเวชปฏิบัติทั่วไป', 19, 1),
(76, 'ห้องตรวจจักษุ', 19, 1),
(77, 'ห้องตรวจหู คอ จมูก', 19, 1),
(78, 'หน่วยบริการด่านหน้า', 19, 1),
(79, 'ห้องตรวจครรภ์', 20, 1),
(80, 'ห้องตรวจนรีเวช', 20, 1),
(81, 'ห้องตรวจอายุรกรรม 8', 20, 1),
(82, 'ห้องตรวจอายุรกรรม 9', 20, 1),
(83, 'ห้องตรวจวัณโรค', 20, 1),
(84, 'ห้องตรวจศัลยกรรม ', 20, 1),
(85, 'ห้องตรวจศูนย์วินิจฉัยและรักษาทารกในครรภ์', 20, 1),
(86, 'ห้องตรวจกุมารเวชกรรม', 21, 1),
(87, 'ห้องตรวจออร์โธปิดิกส์', 21, 1),
(88, 'ห้องตรวจจิตเวช', 21, 1),
(89, 'ห้องตรวจเวชศาสตร์ฟื้นฟู', 21, 1),
(90, 'ห้องให้เลือด', 21, 1),
(91, 'ห้องตรวจรังสีวินิจฉัย', 22, 1),
(92, 'ห้องตรวจรังสีรักษา', 22, 1),
(93, 'ห้องตรวจเวชศาสตร์นิวเคลียร์', 22, 1),
(94, 'ห้องตรวจรักษ์ประทุม', 23, 1),
(95, 'ห้องตรวจศัลยกรรม กว. ชั้น 1', 23, 1),
(96, ' ห้องตรวจบูรณาการ', 24, 1),
(97, 'หน่วยบริการปฐมภูมิสามเหลี่ยม', 25, 1),
(98, 'หน่วยบริการปฐมภูมิ 123 มข.', 25, 1),
(99, 'หน่วยบริการปฐมภูมินักศึกษา มข.', 25, 1),
(100, 'หน่วยการให้สารอาหารโดยวิธีพิเศษ', 26, 1),
(101, 'งานวิสัญญีพยาบาล', 27, 1),
(102, 'ห้องตรวจศัลยกรรม กว. ชั้น 2', 23, 1),
(103, 'อื่นๆ', 30, 1),
(104, 'dd', 31, 2),
(105, 'aa', 6, 2),
(106, 'a12', 1, 2),
(107, 'ห้องที่ 1 ระบบประสาท (INR)', 22, 2),
(108, 'ห้องที่ 2 ห้องตรวจรังสีร่วมรักษาของลำตัว (Body IR)', 22, 2),
(109, 'ห้องที่ 1 ระบบประสาท (INR)', 22, 2),
(110, 'ห้องที่ 1 ระบบประสาท (INR)', 22, 2),
(111, 'ห้องที่ 1 ระบบประสาท (INR)', 22, 2),
(112, 'ห้องที่ 1 ระบบประสาท (INR)', 14, 2),
(113, 'ห้องที่ 1 ระบบประสาท (INR)', 22, 1),
(114, 'ห้องที่ 2 ห้องตรวจรังสีร่วมรักษาของลำตัว (Body IR)', 22, 1),
(115, 'สว.13', 12, 1),
(116, 'สว.14', 12, 1),
(117, 'สว.15', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type_ward` int DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type_user` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `type_ward`, `status`, `type_user`) VALUES
(1, 'admin1', '$2y$10$miDRNYJvDX1yxPOLz1STteRDMKPlo3vWderNlQfvH2fS3gYtRc5eW', 102, '1', 4),
(2, '3A', '$2y$10$tm6ZLDhNJJvAvvDduAa9.uADSlxFbcVTyaGypmigfHPUvWa88bYim', 1, '1', 3),
(3, '3B', '$2y$10$sunpZEpY34V3zidQnniacuAgxOh0P2L2ATowL8vAnNYQBjY6VwYF6', 2, '1', 3),
(11, 'BU', '$2y$10$5UhmvKaCvuLgr9d0h0mAGOzog2hiLYWBjFQc.wFhR.10O9XiDcie2', 4, '1', 3),
(12, 'IMC3B', '$2y$10$IkL6eCnXNWRrsNbU4AaU8epGm4x7AdLIZBXIsuncyp5tIUG5etcbS', 3, '1', 3),
(13, '3C', '$2y$10$AOBYpz6lareem/m4dxWUVuXolUXqg6ZYAJNX8F0vcvA5jXCqPbRBm', 5, '1', 3),
(14, '2F', '$2y$10$wn/XZjIkQw5sso/vA.PBLeK2SJ1ozzTipeP8XhtIgiEugA0hC5IUy', 6, '1', 3),
(15, '3F', '$2y$10$hrE.725hBjCFi9F4zaeVXOXWuoIYfC8mAbmnugYEdNRyZcMkLhMIW', 7, '1', 3),
(16, '5C', '$2y$10$JIbiHD.dCx2vvt26xNmeZOFsbE.rXyYrkKxSAmEOtSa53T4dL3Pae', 8, '1', 3),
(17, '4A', '$2y$10$hGh2WWeu1ioh5I7tu81T5ucufZItzGCplkfNU/E9c0s1QrZGrWG9C', 9, '1', 3),
(18, 'IMC4A', '$2y$10$Uza6Aja.3MJjEPZTpfScye9.Wp6ezFrw7AUYman9so5k2rTxe2kbO', 10, '1', 3),
(19, '4b1', '$2y$10$aIpc8BAaNmKVNQ/fgeqTXOgkqz.ctKeeZ7Ofq9sNh74AIc5WHav2O', 11, '1', 3),
(20, '4b2', '$2y$10$vumY9/7RvLBFx3ndUJvJzuQjgim5q1kVRigaaBhfNs1.iQkk.PR6.', 12, '1', 3),
(21, '4b3', '$2y$10$cvKbmWAbP4TvL7zdJomuZ.DJLw8gyEd.BFLG.kGZRSEFu9wBRjSXK', 13, '1', 3),
(22, '4C', '$2y$10$7pNsCDU.CWDfaAGfjOT3oeh5Bao0arkNj5uVTdTMWr7DKy90uhmGG', 14, '1', 3),
(23, 'IMC4C', '$2y$10$pdRyh3IR9tqBAZNLg19ODu0y1RJhSfl8HrooVC9u2Qk0UIJyXuDp2', 15, '1', 3),
(24, 'Chest', '$2y$10$rJRiczxB/4mFlYarVkqZw.u6Xy/PhJIYL5d2vZxJtWd5IkhnV7bDq', 16, '1', 3),
(25, 'heart', '$2y$10$9o2Z95bDqrE/bxeYikRIDeWWyRtsQkcBi4IO2.6c4Fiy6vEEQHPXS', 17, '1', 3),
(26, 'Hemo', '$2y$10$KpmJr59Ki/fmS1vRPiFdAOrWErUfkBoh8GCM0j7xe7jj9dbRQIScm', 18, '1', 3),
(27, '3E', '$2y$10$ob45hHO8jx/sDTFGgtIYWOwPekTM3jghtdjUMWTCAD63GkTMaUCSm', 19, '1', 3),
(28, 'IMC3E', '$2y$10$G2biJla9wPWmfou115QT5eongCr9AjqwlZp0BqKw9GrzKe8uxynf.', 20, '1', 3),
(29, '4D', '$2y$10$csmgXWkCoh71BKpvABw9BeJnnk7.42hdt8gLYJvW/v7JBd3mwGffi', 21, '1', 3),
(30, '5D', '$2y$10$s76ejX4Yo6lz3tBoqU6d4e8Sa/1n0860SBe1eY3VhNqAMIb3gU6Ve', 22, '1', 3),
(31, 'psychi', '$2y$10$Th781aQFvNkNr35jbQEMVOnRFUU/L.PlnC/sgMrZj4M2u4LsOpKYq', 23, '1', 3),
(32, '2A', '$2y$10$1jZlS/U8Rvc/HljxGjlVSOR0/fY87vQyGRzX3gQyugyDSJIg5K9wG', 24, '1', 3),
(33, '2B', '$2y$10$1hs3jWoKQfUOS3YU9AmFtuXljCCxMg0XAWmzbO2zR5L94qkfbzfh2', 25, '1', 3),
(34, '5B', '$2y$10$Wqxya4Ae2bVDZCmbP9YT2OTApuGGiI8SHovtvUknfIadMQ8D7aEJ.', 26, '1', 3),
(35, 'LR', '$2y$10$F4prMKMl42t6eEKqxP/xm.3WjTtk1zS4JTZtpEoTSo.Jar5W4s00K', 27, '1', 3),
(36, 'FP', '$2y$10$oQuDqtmq99T5sqAUaTKej.IQIWEHSt32Gk4dpD.ZLL53bUUHSymbO', 28, '1', 3),
(37, '5A', '$2y$10$G1vo0az4HRZTpGzyoG4vCeyBxsOD.QRVHba/FpzC33fqnYGHolR8q', 29, '1', 3),
(38, '5E', '$2y$10$xfN.RrKwt5EyDnkF0tN5hOTvkKGAy5cpOFxbDLWOQ4Oe0EF4Rh652', 30, '1', 3),
(39, 'chemo', '$2y$10$eaQqGZGRBsBomZQOXMipnOfzOnt5Puq47MbBBZAwWFurOKUCVKVYq', 31, '1', 3),
(40, 'OR1', '$2y$10$kI78huZMUTnuxRZHoWK1WuEyHekJTjyaDmq2zQJEqZF5tkNCy5hAi', 32, '1', 3),
(41, 'OR2', '$2y$10$HGPVTUUh1Dxiia0CXHAJZ.6AiGnNtfXkae7mDe8rIDLc7FzOQ30E2', 33, '1', 3),
(42, 'OR3', '$2y$10$jFGD8cI3ewsIwIq9OLmY7.Fdp6cLt59HosAT2qVoeecYzVOMDb1X2', 34, '1', 3),
(43, 'OR4', '$2y$10$uvkxq7G5n3sCZP0F6CAQUu1PgjQaIa2F3t38/zoQ7dhve.04rlAJ2', 35, '1', 3),
(44, 'OR5', '$2y$10$zE0lxFU/FJqzahiF0nYj1.xAATgpbD.orbML.RuFyFfLBFOy1NK8C', 36, '1', 3),
(45, 'ORminor', '$2y$10$qfBTKtMciefLyMx5UDLLIuE.IR/b0WAoqV22RNIRKIsemC9dDj/dG', 37, '1', 3),
(46, 'NICU', '$2y$10$ICePJNNgDdUsuoydbkz4zuLgxFuGoPerpLLC8fCmfxLw2H.xk6e3W', 38, '1', 3),
(47, 'IMC2C', '$2y$10$ZEYVQI4T4grmqU2z5whaJerJKN9KRFyjCw3im1uJZc/fdLDDTlXfS', 39, '1', 3),
(48, 'IMC2D', '$2y$10$i4m9bgp/LvlyrqsOFvrFXebcsQDaLktmhOYajBHNuJxDeB/pq6YCO', 40, '1', 3),
(49, '2D', '$2y$10$JO/SdaMyPb/aK7pybHYJ/epNjr4YiRSWUx3Nad4Noc6WPastJicmW', 41, '1', 3),
(50, '3D', '$2y$10$HAxqty.q2vlOjUd0rhmfDebezzk1tr6NWwLVYaXl6p/PkmDZBYfMi', 42, '1', 3),
(51, '6A', '$2y$10$COjIMSim9edQHGtOQ5IEJ.fdcV7v.fbxpLHI81OjtgCCZGrjEeNYm', 43, '1', 3),
(52, '6B', '$2y$10$ej5xbiPfv.kiKfgG5Ov9W.IjzFai1ObxzhXmX3Tknr5fDG0VCas4S', 44, '1', 3),
(53, '6E', '$2y$10$quGHlue9gcchO82J4mGIfOhO3hSaX70cZhduAQxi.DR52BxELbKxG', 45, '1', 3),
(54, 'monk', '$2y$10$jGiTqmQjVj77QieoCgXcauxV5UmidNGQ/GBKaulZcx//m5GbgOa9.', 46, '1', 3),
(55, 'sw11', '$2y$10$WHU0YVL25Qxmj6bc2G5A0u9WmK.KCcYD/vEG4L8HG4YNSlsi4N3hu', 47, '1', 3),
(56, 'sw12', '$2y$10$/G0fMeqEdmCFHb1nXbfZweAcpaGBd1ZqAE1xaUkfMpGSL0J.g19Y.', 48, '1', 3),
(57, '8B', '$2y$10$Rl3bA9RuXigucChfbm/7O.dn56enNFPlabcZ/KU1Ll3okPO0wGDg.', 49, '1', 3),
(58, '8C', '$2y$10$PxWrnl9rkLsOWDjbcC7XWODlclTxIPDXLZEOIrr5rLGWv8OeSE5pe', 50, '1', 3),
(59, '9A', '$2y$10$ZQLboe0NBttusXSsr584HethNzk6eXnmDDlUkmhdHEP4oQfzq/F4O', 51, '1', 3),
(60, '9B', '$2y$10$CjqbtMsV.B5DNHo7eCdz4ef7Vcrpv2vHu1706tbYlkAGO2byXDKEO', 52, '1', 3),
(61, '9C', '$2y$10$26P3OMThpx4vGRtuq2MkRuVXWcUgsVcJGgS6mlFXorwkhl8sbL2C2', 53, '1', 3),
(62, 'KW6/1', '$2y$10$pdbPow/2rehW7o5pua2bwuhnYMJL02sUQbnq4XLAMEZuGzg5ExhUW', 54, '1', 3),
(63, 'KW6/2', '$2y$10$eb5Uwg6nNU4k/XRWK9trT.sswR26QF1TUN9q4IR6HO6Ntpeh2J9Va', 55, '1', 3),
(64, 'KW7/1', '$2y$10$79pLemnH3MYrkbf3MayLZO8aSw1Mr5q8XH7wDHEaaA5hQuYVeG.fa', 56, '1', 3),
(65, 'MICU1', '$2y$10$HlDMrB2oHNmrxn0lUAkBluSb2n0m0yYEez7j1Er/es2RDEo.NYAmW', 57, '1', 3),
(66, 'MICU2', '$2y$10$KzLPp/36t2NUXTqJxjEowOIjQmDbMzBdDzNW2Ipd0tWXo74Fx7vDy', 58, '1', 3),
(67, 'MICU3', '$2y$10$txE6tmOymS21DEbMZ0sNHOFCpnFtVNvMxobmCBKZbWWFoJWS09gKS', 59, '1', 3),
(68, 'CCU', '$2y$10$Jn1bIIdm4cfQwnZulhLWBe8N3MISFJW/j6IsS1mMIJBZw.Bfr92IO', 60, '1', 3),
(69, 'cath_lab', '$2y$10$Pc7.Rx59QSllCxZctgBqQeUdan9MbQFpZjxN.ICdgMtJ28faggHze', 61, '1', 3),
(70, 'NSICU', '$2y$10$7eH364PzmotiecZmBQL85ePCo4mr5whA.ylnrMaA9Gds/EEOEj3FG', 62, '1', 3),
(71, 'PICU', '$2y$10$UH/Q5zdmZIk8I8b.aSoOPe6B0P9N6Jb9FWKJGHYcZSJRkNt3Apq2m', 63, '1', 3),
(72, 'CVT-ICU', '$2y$10$rp3ocPdR4Y6k2Ki.1ex37unhDOPaDL08Lu7QNuOQ9.7rYDcynq23S', 64, '1', 3),
(73, 'SICU2', '$2y$10$4YUvdTLFhtq5stUqhhOTXuudHXDfqR2Xud/E8Tg8A4rZu2VR1cg66', 65, '1', 3),
(74, 'SICU1', '$2y$10$j9uD.cSbXg5M2OqBmPOdceVQGg5NzKR7AjCy5YjQjYtmv5PV6XU.O', 66, '1', 3),
(75, 'SICU3', '$2y$10$QEZS/l2rStXXroSWzTWQSOzUB.nBk1NtaRN7TEG.WCvDzw8NI3t4K', 67, '1', 3),
(76, 'SCTU', '$2y$10$8FRsZc9tRXMdAdLNat2cA.ulWjg9RUgNwul.Xay/NJHLN.FPugc8a', 68, '1', 3),
(77, 'AE1', '$2y$10$rfsPqdFGRnQULtt3jocxFuLPTYG326jEPYs1GHP1IxXlXFYIYP8zu', 69, '1', 3),
(78, 'AE2', '$2y$10$QgiZyLfFmmpyik5C9.kcG.X5VoG1V2zE0iH/a1nubPdbBRThgJoRu', 70, '1', 3),
(79, 'AE3', '$2y$10$RzybcYF8IvvRRYFxWHDHF.0s5ueLvPCLIJciWAmoumosCzvHp86JC', 71, '1', 3),
(80, 'AE4', '$2y$10$a1faON98HZKi3XiP.QX9T.kwaUXq8I2wt52OQcuYEHJdR0GYlmNZS', 72, '1', 3),
(81, 'OPDAE', '$2y$10$QkWOBDaEypD7f77fWG1vOOwQFm8l9AoUqNJWhF4xyhoThd0l1t8k.', 73, '1', 3),
(82, 'EMS', '$2y$10$zKpWSjqDBnSbXRnSVc0GBe/lwhnBvczFIy4PVxv7kDxGqH47kQhu6', 74, '1', 3),
(83, 'GP', '$2y$10$D3xIc6DnIjwA60McMNbObOya2R57VmQjhHjc8RvAgYrwhFqjB1pNW', 75, '1', 3),
(84, 'OPD5', '$2y$10$bFQ.UU/wtvbmkBOm.9yhjeZrKWpruaZZlVxi8bwCt8AITDtddBGGK', 76, '1', 3),
(85, 'OPD6', '$2y$10$LtcmzPHqFZVhcbAqx.GtvO8XIpmPSgajRADcHvGI0zPnxEvuo6nbS', 77, '1', 3),
(86, 'Screen', '$2y$10$8nof0CScvg7wxuz43NFCruo6eOxMawD/LE4Goh3Ay5inST.Qy.yDa', 78, '1', 3),
(87, 'ANC', '$2y$10$2m1A/J5MeAykzXdiYNE8Ue6hw6R9b8iMbP/CwoRbVSFhV79aA4lwC', 79, '1', 3),
(88, 'OPD2', '$2y$10$AY1haE2ilMebPeWTgh7.A.HLnwSRECRLnR51yLVDjvol0Aie1Sqci', 80, '1', 3),
(89, 'OPD8', '$2y$10$u7I/F30uLKuQwSQBauJwJetNiHGTaQ3mEXFaL//7Q7e01TPq78Mx2', 81, '1', 3),
(90, 'OPD9', '$2y$10$XQ4ROaEReqvbmsvGbaxnQ.SaGYh85nQK/F8g6twNgapW7N9YlTisu', 82, '1', 3),
(91, 'TB_clinic', '$2y$10$wC.NkwuLbIR5ufXuRXgOiezBxRoQ8ZL1laPFNjxZ0eLLBfIabyE8m', 83, '1', 3),
(92, 'OPDPed', '$2y$10$2TmpAxqryTi2kkmLrHWE1ucdBFvZybR67fXe8.B3pXm0hZfn7QiVq', 86, '1', 3),
(93, 'OPD1', '$2y$10$G7IJbM.WvwrjRHlwzwMtEuiU8KL35.mZ8sWGJMlBJXAorv.Tn5ZE2', 87, '1', 3),
(94, 'OPD7', '$2y$10$Ik.iOXQ3DSwCTFCrxcIMJ.ciAMpBRVAXflQV3b1nGJpwMc0LRcR7G', 88, '1', 3),
(95, 'OPD10', '$2y$10$UbHZSjEMc.drZEWn6LaXfubyb1kEH84iqH5K.xJjL2k.hjSO.p9rS', 89, '1', 3),
(96, 'BT', '$2y$10$.qdgTtje.zTwzZDmlsN/9OWPoqZT3hPlC4aE42mmcJfoPyo16J/M6', 90, '1', 3),
(98, 'RT', '$2y$10$IcJaX6/Jk18qGti5wnSMbOoccMc0wkxICN2r9EfyD1kspav4265zu', 92, '1', 3),
(99, 'X-ray', '$2y$10$lw5ezOsMzx6VzHmwfkPx/OOvk3S.Ec60vDJEgoQqKRom8wTkXBRgW', 91, '1', 3),
(100, 'Nuclear', '$2y$10$yp9dLFqYGJVgNT3CYZXSJ.Zixd6st63RJTvPfJb6ZBexUwLJj59UG', 93, '1', 3),
(101, 'OPDbreast', '$2y$10$Gzo4cuo4rMlkpuNJK1ylq.dz6oYlwuO4eAnPwT.6pjtVsjj0gK1rm', 94, '1', 3),
(102, 'OPDSurg1', '$2y$10$wFbx7k1Y69aOlPKLECELS.w4AXlydXOUACAoyZWxRM81zZi.J3dKC', 95, '1', 3),
(103, 'OPDSurg2', '$2y$10$tf9rueModYxv3H3oLbnVduEtIkoMfaY6hSI78WQmBQ71GVD16pCbG', 102, '1', 3),
(104, 'special', '$2y$10$DIbp4czjvwl1vzNbYsv18uauKoL8PSUNAfS1KH/fsYF5cicY2ggXi', 96, '1', 3),
(105, 'pcusam', '$2y$10$ZaRdU4ych8OZt28Ck3a0CO4JHF3GwmbxpPNfqVLkdMoew7ZdhSUAK', 97, '1', 3),
(106, 'pcu123', '$2y$10$SjT1aFgBT1SEYE99fZp1TOi21xdFJm6FzxAwJUQdfqAQFLGp.Z6PC', 98, '1', 3),
(107, 'pcukku', '$2y$10$yRjiJx.Me18J7kF9J/xMZeJzq9On5EjlYB.fax.K.RsG1Olw06ivC', 99, '1', 3),
(108, 'nutrition', '$2y$10$EkPIZr7Vhqr55ODwUbzeIOp7JuXYpMEUO9JurHvQ.SfUi9N5MWlKa', 100, '1', 3),
(109, 'anesth', '$2y$10$1QA4LNMplQE5sQefThNqyemGSfTB2g/Cl0o0FOw945TFMvx6DwTBq', 101, '1', 3),
(112, 'ICP', '$2y$10$lOaz0GrXcWCcNw2xgNrdKuqn7NusUbpqGVXmsuIz1dKv6esJFO6BG', 103, '1', 1),
(113, '3A_1', '$2y$10$DQF/p7puImL/acH1c85weevjzU9D8P8lE7iVaixrLw071NdSE2dge', 1, '2', 3),
(114, '3A1', '$2y$10$Gsh6J4ymmcq/Y5fyrJxcueOsLjsxyY25Agff1dpLEvtauVFu43inC', 1, '2', 3),
(115, 'BU2', '$2y$10$rMJIvo1YpNoon6AOps5rTu5HY48B.Cdmcl2UVB4X40IeFA5F/jzM.', 4, '2', 2),
(116, 'md084', '$2y$10$zVItOeM3qoPLO5fTfUE97uenTfAqInbq4Wvvi010z6ckcAiy4IVI6', 1, '1', 2),
(117, 'md084_1', '$2y$10$h1mIfwQ..kTk77wmnB2bA.q0npdJbO.A0i5Leun91AeYDVXWgsHJG', 6, '1', 2),
(118, 'md086', '$2y$10$Vd7AsMzfaE3Gm2ngs4bZae/VpK/MXs6m3v5ThV6K8BDoWKmOgO9HW', 9, '1', 2),
(119, 'md086_2', '$2y$10$WwG6iTFNc.YTnxmu19qSsOZuNO7BjMXWTKe.2tHbYaZQLkz0Igliu', 16, '1', 2),
(120, 'md087', '$2y$10$sUofq4pJXVw5wjl9OmcWu.MrV1rQEc.KiQhExjL1nc6dWEd5b4/mm', 19, '1', 2),
(121, 'md085', '$2y$10$L1ND4Uaz.V8Bog6MKLErYeHaIuIav6NHdvzaB135hvUfBFvFEIdz6', 24, '1', 2),
(122, 'md088', '$2y$10$9i5jUnCWxnKnUCBh7HiLKO2.BeSzPexV7xrHr.zfNp55U0dxSDJvO', 29, '1', 2),
(123, 'md082_1', '$2y$10$kx6HXR/63x.gl8gu.g75Su7.ALIL89M3ZRg6.E/UiZnWX5AE48aVu', 32, '1', 2),
(124, 'md082_2', '$2y$10$OEy9Lz..jIQFDRmIyzblX.N.oYYFaoT228h6Ua.Kze68K4w5F9oXG', 35, '1', 2),
(125, 'md0810', '$2y$10$ZMhy2ggxOGJeQtEjdBucHeSezI/SXhR/UiKU8MICE3QY4IB.cRKE.', 38, '1', 2),
(126, 'md089_1', '$2y$10$jJ2VIe2CasEaifErjDTU7u4gAchXGODdP7f3IROTbPbj1IOp86UyK', 43, '1', 2),
(127, 'md40_2', '$2y$10$HICC5I9T.GPHdjyrXwfR1.3XDk11Y1ynSAMd53lG0frKkqa2gUbB6', 46, '1', 2),
(128, 'md40_3', '$2y$10$i4Z3ikAJ5QZV/ptsQMzRCug/vDP4fN2GHLS2AnCOUKSfS1jWOO7KC', 49, '1', 2),
(129, 'md089_4', '$2y$10$rdodEaA2ho2I07ZEB/bAFe7YplxGe012M.31wLUByYgJFdtl//y6m', 54, '1', 2),
(130, 'md0811_1', '$2y$10$KmOVQKNB423gl0sYs4RZou4FNyTyLIEIJ8.bb5YdJQf.Acc3lFgC.', 57, '1', 2),
(131, 'md0811_2', '$2y$10$SRRSDAv4D5PF2tfZIXjskOITkig6b0.VMaZHfSBv22ewa5QZfYbxu', 62, '1', 2),
(132, 'md0811_3', '$2y$10$AVxx5hhRerg.0bodqk.0X.P/pku18TIgFrEM10B12yeIxIkHOMeSS', 65, '1', 2),
(133, 'md083', '$2y$10$JzYuGpYp3NHBvBBo0Imy7OPD0wc/JwRq.l.t59aPwzNd37HaeQIGm', 69, '1', 2),
(134, 'md081_1', '$2y$10$8sReDcfqPA0QsyteJeQr6e3rQSErSBn.TMg1OnBK8oDvpEwMni8jS', 75, '1', 2),
(135, 'md081_2', '$2y$10$o0rwVJs/9/mC.1LrS8clduF4vsfsGsDIuMagYq//blw0SFsgbTJzy', 79, '1', 2),
(136, 'md081_3', '$2y$10$7tvgKPXpzZXZ9g7oHFb.Wew4AIKHv5IWevhsgEDww03iky4//JBke', 86, '1', 2),
(137, 'md081_4', '$2y$10$xPbvvIRqLX2cs0bIUM5qg.2dPuLyUy2Rd/mdN6xi7foaAzFFFIe4y', 91, '1', 2),
(138, 'md081_5', '$2y$10$MwhjEISpkUFBqUnfdAOd7OFa2558a2SZRTMyeLB2ir3z58sQ2lIoq', 94, '1', 2),
(139, 'md081', '$2y$10$GwI.otFjy8BzHp30t1pvqOXn/WCGGHLRhnOO/zCSdVVczuSmXkSvi', 96, '1', 2),
(140, 'mdpcu', '$2y$10$Zvrp5N9nmCUm/guqy72pz.omJEMTVSHd5iAxdpCljVNKRNfQFVyVi', 97, '1', 2),
(141, 'spacific', '$2y$10$Qqj9h2owzSINkCK/gbQUEeF1iA6gg8fqJEm2BFwFO7jYHA3DgJFoW', 100, '1', 2),
(142, 'claksa', '$2y$10$sGMr4uM/v3f9nnAgbcUKc.yF3hdrZDMx0iFwLeVQTfGI3ofy1xbGq', 101, '1', 2),
(143, 'INR', '$2y$10$KLAa/lcEaOa3ILV/Q0GuD.7uDOm/joQ0AUl6sM82nqzPJCmZZRYKS', 107, '2', 3),
(144, 'BodyIR', '$2y$10$7WCLD8jaIY9eMYpd67gxLOVncvMoYUe64kYqOg3d4puSaDp1MmQpC', 108, '2', 3),
(145, 'FDT', '$2y$10$F6b7SY6OBYBSAGK6dZ8rSOyjHC9fw0P4Muq7yDiP7VXFS1xmS1N2W', 85, '1', 3),
(146, 'Admin', '$2y$10$3xT1BZyflVoc.uRCHqoC/.tYB65COSKzZdzTRESGqiIqFYjWIeVPC', 103, '1', 1),
(147, 'INR', '$2y$10$PsxAnTLQhFOzEIY6epgrJ.BEZdAAisFY/WNtqVVqrpFCAlcz.mSiC', 113, '1', 3),
(148, 'BodyIR', '$2y$10$alD3g9CIxB.zYzB2AOs.hOvyKr7Huq9xbs5H7VhLN2W8gUYukeZNm', 114, '1', 3),
(149, 'sw13', '$2y$10$B/1HJEnZLq/bsrJCua/aaeeZrQfFR1cj1ULDKGuxJYff43XkQJJ4O', 115, '1', 3),
(150, 'sw14', '$2y$10$SEICENguJx/k9Lvg2iFfTOli9BmfDaLIU.Ay3PSBsG3/YgiAIq50.', 116, '1', 3),
(151, 'sw15', '$2y$10$1We6GyJcNsZEbkt4lXJl/e8C0xYDzIzI3ZOy27lxevpjNwwSoueJK', 117, '1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `d_type_user` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`d_type_user`, `name`) VALUES
(1, 'Admin'),
(2, 'staff'),
(3, 'User'),
(4, 'SuperAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `ward_id` int NOT NULL,
  `nursing` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `ward_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`ward_id`, `nursing`, `ward_name`) VALUES
(1, 'งานการพยาบาลศัลยกรรม', '3ก'),
(2, 'งานการพยาบาลศัลยกรรม', '3ข'),
(3, 'งานการพยาบาลศัลยกรรม', 'IMC-3ข'),
(4, 'งานการพยาบาลศัลยกรรม', 'Burn Unit'),
(5, 'งานการพยาบาลศัลยกรรม', '3ค'),
(6, 'งานการพยาบาลออร์โธปิดิกส์', '2ฉ'),
(7, 'งานการพยาบาลออร์โธปิดิกส์', '3ฉ'),
(8, 'งานการพยาบาลออร์โธปิดิกส์', '5ค'),
(9, 'งานการพยาบาลอายุรกรรม 1', '4ก'),
(10, 'งานการพยาบาลอายุรกรรม 1', 'IMC 4ก'),
(11, 'งานการพยาบาลอายุรกรรม 1', '4ข-1'),
(12, 'งานการพยาบาลอายุรกรรม 1', '4ข-2'),
(13, 'งานการพยาบาลอายุรกรรม 1', '4ข-3'),
(14, 'งานการพยาบาลอายุรกรรม 1', '4ค'),
(15, 'งานการพยาบาลอายุรกรรม 1', 'IMC-4ค'),
(16, 'งานการพยาบาลอายุรกรรม 2', 'หน่วยระบบทางเดินหายใจ'),
(17, 'งานการพยาบาลอายุรกรรม 2', 'หน่วยหัวใจและหลอดเลือด'),
(18, 'งานการพยาบาลอายุรกรรม 2', 'หน่วยไตและไตเทียม'),
(19, 'งานการพยาบาลจักษุ โสต จิตเวชและตรวจวินิจฉัยพิเศษ', '3จ'),
(20, 'งานการพยาบาลจักษุ โสต จิตเวชและตรวจวินิจฉัยพิเศษ', 'IMC-3จ'),
(21, 'งานการพยาบาลจักษุ โสต จิตเวชและตรวจวินิจฉัยพิเศษ', '4ง'),
(22, 'งานการพยาบาลจักษุ โสต จิตเวชและตรวจวินิจฉัยพิเศษ', '5ง'),
(23, 'งานการพยาบาลจักษุ โสต จิตเวชและตรวจวินิจฉัยพิเศษ', 'จิตเวช'),
(24, 'งานการพยาบาลสูติ-นรีเวชกรรม', '2ก'),
(25, 'งานการพยาบาลสูติ-นรีเวชกรรม', '2ข'),
(26, 'งานการพยาบาลสูติ-นรีเวชกรรม', '5ข'),
(27, 'งานการพยาบาลสูติ-นรีเวชกรรม', 'ห้องคลอด'),
(28, 'งานการพยาบาลสูติ-นรีเวชกรรม', 'หน่วยวางแผนครอบครัว'),
(29, 'งานการพยาบาลบำบัดพิเศษ', '5ก'),
(30, 'งานการพยาบาลบำบัดพิเศษ', '5จ'),
(31, 'งานการพยาบาลบำบัดพิเศษ', '2จ หน่วยเคมีบำบัดผู้ป่วยนอก'),
(32, 'งานการพยาบาลห้องผ่าตัด 1', 'หน่วยผ่าตัด 1'),
(33, 'งานการพยาบาลห้องผ่าตัด 1', 'หน่วยผ่าตัด 2'),
(34, 'งานการพยาบาลห้องผ่าตัด 1', 'หน่วยผ่าตัด 3'),
(35, 'งานการพยาบาลห้องผ่าตัด 2', 'หน่วยผ่าตัด 4'),
(36, 'งานการพยาบาลห้องผ่าตัด 2', 'หน่วยผ่าตัด 5'),
(37, 'งานการพยาบาลห้องผ่าตัด 2', 'หน่วยผ่าตัดเล็ก'),
(38, 'งานการพยาบาลกุมารเวชกรรม', 'NICU'),
(39, 'งานการพยาบาลกุมารเวชกรรม', 'IMC-2ค'),
(40, 'งานการพยาบาลกุมารเวชกรรม', 'IMC-2ง'),
(41, 'งานการพยาบาลกุมารเวชกรรม', '2ง'),
(42, 'งานการพยาบาลกุมารเวชกรรม', '3ง'),
(43, 'งานการพยาบาลผู้ป่วยพิเศษ 1', '6ก'),
(44, 'งานการพยาบาลผู้ป่วยพิเศษ 1', '6ข'),
(45, 'งานการพยาบาลผู้ป่วยพิเศษ 1', '6จ'),
(46, 'งานการพยาบาลผู้ป่วยพิเศษ 2', 'หอสงฆ์อาพาธ'),
(47, 'งานการพยาบาลผู้ป่วยพิเศษ 2', 'สว.11'),
(48, 'งานการพยาบาลผู้ป่วยพิเศษ 2', 'สว.12'),
(49, 'งานการพยาบาลผู้ป่วยพิเศษ 3', 'หอผู้ป่วยพิเศษรวม 8B'),
(50, 'งานการพยาบาลผู้ป่วยพิเศษ 3', 'หอผู้ป่วยพิเศษรวม 8C'),
(51, 'งานการพยาบาลผู้ป่วยพิเศษ 3', 'หอผู้ป่วยพิเศษรวม 9A'),
(52, 'งานการพยาบาลผู้ป่วยพิเศษ 3', 'หอผู้ป่วยพิเศษรวม 9B'),
(53, 'งานการพยาบาลผู้ป่วยพิเศษ 3', 'หอผู้ป่วยพิเศษรวม 9C'),
(54, 'งานการพยาบาลผู้ป่วยพิเศษ 4', 'หอผู้ป่วยพิเศษ กว.6/1'),
(55, 'งานการพยาบาลผู้ป่วยพิเศษ 4', 'หอผู้ป่วยพิเศษ กว.6/2'),
(56, 'งานการพยาบาลผู้ป่วยพิเศษ 4', 'หอผู้ป่วยพิเศษ กว.7/1'),
(57, 'งานการพยาบาลผู้ป่วยวิกฤต 1', 'MICU1'),
(58, 'งานการพยาบาลผู้ป่วยวิกฤต 1', 'MICU2'),
(59, 'งานการพยาบาลผู้ป่วยวิกฤต 1', 'MICU3'),
(60, 'งานการพยาบาลผู้ป่วยวิกฤต 1', 'CCU'),
(61, 'งานการพยาบาลผู้ป่วยวิกฤต 1', 'ห้องปฏิบัติการสวนหัวใจและหลอดเลือด'),
(62, 'งานการพยาบาลผู้ป่วยวิกฤต 2', 'NSICU'),
(63, 'งานการพยาบาลผู้ป่วยวิกฤต 2', 'PICU'),
(64, 'งานการพยาบาลผู้ป่วยวิกฤต 2', 'CVT-ICU'),
(65, 'งานการพยาบาลผู้ป่วยวิกฤต 2', 'SICU2'),
(66, 'งานการพยาบาลผู้ป่วยวิกฤต 3', 'SICU1'),
(67, 'งานการพยาบาลผู้ป่วยวิกฤต 3', 'SICU3'),
(68, 'งานการพยาบาลผู้ป่วยวิกฤต 3', 'SCTU'),
(69, 'งานการพยาบาลผู้ป่วยอุบัติเหตุและฉุกเฉิน', 'AE1'),
(70, 'งานการพยาบาลผู้ป่วยอุบัติเหตุและฉุกเฉิน', 'AE2'),
(71, 'งานการพยาบาลผู้ป่วยอุบัติเหตุและฉุกเฉิน', 'AE3'),
(72, 'งานการพยาบาลผู้ป่วยอุบัติเหตุและฉุกเฉิน', 'AE4'),
(73, 'งานการพยาบาลผู้ป่วยอุบัติเหตุและฉุกเฉิน', 'OPD AE'),
(74, 'งานการพยาบาลผู้ป่วยอุบัติเหตุและฉุกเฉิน', 'หน่วย EMS'),
(75, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 1', 'ห้องตรวจเวชปฏิบัติทั่วไป'),
(76, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 1', 'ห้องตรวจจักษุ'),
(77, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 1', 'ห้องตรวจหู คอ จมูก'),
(78, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 1', 'หน่วยบริการด่านหน้า'),
(79, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 2', 'ห้องตรวจครรภ์'),
(80, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 2', 'ห้องตรวจนรีเวช'),
(81, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 2', 'ห้องตรวจอายุรกรรม 8'),
(82, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 2', 'ห้องตรวจอายุรกรรม 9'),
(83, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 2', 'ห้องตรวจวัณโรค'),
(84, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 2', 'ห้องตรวจศัลยกรรม '),
(85, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 2', 'ห้องตรวจศูนย์วินิจฉัยและรักษาทารกในครรภ์'),
(86, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 3', 'ห้องตรวจกุมารเวชกรรม'),
(87, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 3', 'ห้องตรวจออร์โธปิดิกส์'),
(88, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 3', 'ห้องตรวจจิตเวช'),
(89, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 3', 'ห้องตรวจเวชศาสตร์ฟื้นฟู'),
(90, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 3', 'ห้องให้เลือด'),
(91, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 4', 'ห้องตรวจรังสีวินิจฉัย'),
(92, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 4', 'ห้องตรวจรังสีรักษา '),
(93, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 4', 'ห้องตรวจเวชศาสตร์นิวเคลียร์'),
(94, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 5', 'หน่วยรักษ์ประทุม'),
(95, 'งานการพยาบาลผู้ป่วยนอก หน่วยผู้ป่วยนอก 5', 'ห้องตรวจศัลยกรรม กว. '),
(96, 'งานการพยาบาลผู้ป่วยนอก', 'ห้องตรวจบูรณาการ'),
(97, 'งานการพยาบาลเวชปฏิบัติครอบครัว', 'หน่วยบริการปฐมภูมิสามเหลี่ยม'),
(98, 'งานการพยาบาลเวชปฏิบัติครอบครัว', 'หน่วยบริการปฐมภูมิ 123 มข.'),
(99, 'งานการพยาบาลเวชปฏิบัติครอบครัว', 'หน่วยบริการปฐมภูมินักศึกษา มข.'),
(100, 'งานการพยาบาลเฉพาะทางและสนับสนุนบริการพยาบาล', 'หน่วยการให้สารอาหารโดยวิธีพิเศษ'),
(101, 'งานวิสัญญีพยาบาล', 'งานวิสัญญีพยาบาล'),
(102, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drug_atb`
--
ALTER TABLE `drug_atb`
  ADD PRIMARY KEY (`drug_id`);

--
-- Indexes for table `logs_orweb`
--
ALTER TABLE `logs_orweb`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `organism`
--
ALTER TABLE `organism`
  ADD PRIMARY KEY (`organism_id`);

--
-- Indexes for table `speccimen`
--
ALTER TABLE `speccimen`
  ADD PRIMARY KEY (`spec_id`);

--
-- Indexes for table `table1`
--
ALTER TABLE `table1`
  ADD PRIMARY KEY (`table1_id`);

--
-- Indexes for table `table2`
--
ALTER TABLE `table2`
  ADD PRIMARY KEY (`table2_id`);

--
-- Indexes for table `table3`
--
ALTER TABLE `table3`
  ADD PRIMARY KEY (`table3_id`);

--
-- Indexes for table `table4`
--
ALTER TABLE `table4`
  ADD PRIMARY KEY (`table4_id` DESC);

--
-- Indexes for table `tableb1`
--
ALTER TABLE `tableb1`
  ADD PRIMARY KEY (`tableb1_id`);

--
-- Indexes for table `tableb2`
--
ALTER TABLE `tableb2`
  ADD PRIMARY KEY (`tableb2_id`);

--
-- Indexes for table `tableb3`
--
ALTER TABLE `tableb3`
  ADD PRIMARY KEY (`tableb3_id`);

--
-- Indexes for table `tableb4`
--
ALTER TABLE `tableb4`
  ADD PRIMARY KEY (`tableb4_id` DESC) USING BTREE;

--
-- Indexes for table `tablec1`
--
ALTER TABLE `tablec1`
  ADD PRIMARY KEY (`tablec1_id`);

--
-- Indexes for table `tablec2`
--
ALTER TABLE `tablec2`
  ADD PRIMARY KEY (`tablec2_id`);

--
-- Indexes for table `tablec3`
--
ALTER TABLE `tablec3`
  ADD PRIMARY KEY (`tablec3_id`);

--
-- Indexes for table `tablec4`
--
ALTER TABLE `tablec4`
  ADD PRIMARY KEY (`tablec4_id`);

--
-- Indexes for table `tabled1`
--
ALTER TABLE `tabled1`
  ADD PRIMARY KEY (`tabled1_id`);

--
-- Indexes for table `tabled2`
--
ALTER TABLE `tabled2`
  ADD PRIMARY KEY (`tabled2_id`);

--
-- Indexes for table `tabled3`
--
ALTER TABLE `tabled3`
  ADD PRIMARY KEY (`tabled3_id`);

--
-- Indexes for table `tabled4`
--
ALTER TABLE `tabled4`
  ADD PRIMARY KEY (`tabled4_id`);

--
-- Indexes for table `tabled5`
--
ALTER TABLE `tabled5`
  ADD PRIMARY KEY (`tabled5_id`);

--
-- Indexes for table `tablee1`
--
ALTER TABLE `tablee1`
  ADD PRIMARY KEY (`tablee1_id`);

--
-- Indexes for table `tablee2`
--
ALTER TABLE `tablee2`
  ADD PRIMARY KEY (`tablee2_id`);

--
-- Indexes for table `tablef`
--
ALTER TABLE `tablef`
  ADD PRIMARY KEY (`tablef_id`);

--
-- Indexes for table `tableg`
--
ALTER TABLE `tableg`
  ADD PRIMARY KEY (`tableg_id`);

--
-- Indexes for table `type_department`
--
ALTER TABLE `type_department`
  ADD PRIMARY KEY (`id_department`) USING BTREE;

--
-- Indexes for table `type_ward`
--
ALTER TABLE `type_ward`
  ADD PRIMARY KEY (`id_ward`) USING BTREE,
  ADD KEY `type_department` (`Type_department`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_ward` (`type_ward`),
  ADD KEY `type_user` (`type_user`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`d_type_user`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`ward_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chart`
--
ALTER TABLE `chart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drug_atb`
--
ALTER TABLE `drug_atb`
  MODIFY `drug_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `logs_orweb`
--
ALTER TABLE `logs_orweb`
  MODIFY `log_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `organism`
--
ALTER TABLE `organism`
  MODIFY `organism_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `speccimen`
--
ALTER TABLE `speccimen`
  MODIFY `spec_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `table1`
--
ALTER TABLE `table1`
  MODIFY `table1_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `table2`
--
ALTER TABLE `table2`
  MODIFY `table2_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table3`
--
ALTER TABLE `table3`
  MODIFY `table3_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `table4`
--
ALTER TABLE `table4`
  MODIFY `table4_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tableb1`
--
ALTER TABLE `tableb1`
  MODIFY `tableb1_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tableb2`
--
ALTER TABLE `tableb2`
  MODIFY `tableb2_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tableb3`
--
ALTER TABLE `tableb3`
  MODIFY `tableb3_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tableb4`
--
ALTER TABLE `tableb4`
  MODIFY `tableb4_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tablec1`
--
ALTER TABLE `tablec1`
  MODIFY `tablec1_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tablec2`
--
ALTER TABLE `tablec2`
  MODIFY `tablec2_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tablec3`
--
ALTER TABLE `tablec3`
  MODIFY `tablec3_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tablec4`
--
ALTER TABLE `tablec4`
  MODIFY `tablec4_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tabled1`
--
ALTER TABLE `tabled1`
  MODIFY `tabled1_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tabled2`
--
ALTER TABLE `tabled2`
  MODIFY `tabled2_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tabled3`
--
ALTER TABLE `tabled3`
  MODIFY `tabled3_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tabled4`
--
ALTER TABLE `tabled4`
  MODIFY `tabled4_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tabled5`
--
ALTER TABLE `tabled5`
  MODIFY `tabled5_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tablee1`
--
ALTER TABLE `tablee1`
  MODIFY `tablee1_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tablee2`
--
ALTER TABLE `tablee2`
  MODIFY `tablee2_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tablef`
--
ALTER TABLE `tablef`
  MODIFY `tablef_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tableg`
--
ALTER TABLE `tableg`
  MODIFY `tableg_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type_department`
--
ALTER TABLE `type_department`
  MODIFY `id_department` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `type_ward`
--
ALTER TABLE `type_ward`
  MODIFY `id_ward` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `d_type_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ward`
--
ALTER TABLE `ward`
  MODIFY `ward_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `type_ward`
--
ALTER TABLE `type_ward`
  ADD CONSTRAINT `type_department` FOREIGN KEY (`Type_department`) REFERENCES `type_department` (`id_department`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_type_ward` FOREIGN KEY (`type_ward`) REFERENCES `type_ward` (`id_ward`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_user_user_type` FOREIGN KEY (`type_user`) REFERENCES `user_type` (`d_type_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
