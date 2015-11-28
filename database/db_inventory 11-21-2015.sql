-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2015 at 07:51 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Generic', 'Cheap and effective', '2015-10-25 05:39:32', '2015-10-25 05:39:32'),
(2, 'Anti-deppressant', 'Depress', '2015-10-26 14:05:53', '2015-10-26 14:05:53'),
(3, 'Infants', NULL, '2015-10-26 15:25:57', '2015-10-26 15:25:57'),
(4, 'Tablets', NULL, '2015-10-26 15:30:04', '2015-10-26 15:30:04'),
(5, 'Test', 'asjkdflkasdf', '2015-10-26 15:31:31', '2015-10-26 15:31:31'),
(6, 'New Stocksqwqwqw', 'test', '2015-10-26 15:32:36', '2015-10-26 15:32:36'),
(7, 'Teens', 'testasdfasdf', '2015-10-26 15:33:21', '2015-10-26 15:33:21'),
(8, 'Vitamins', NULL, '2015-10-26 19:33:29', '2015-10-26 19:33:29'),
(9, 'Kids', '\nasdfsadf', '2015-11-04 11:55:16', '2015-11-04 11:55:16'),
(10, 'Metabolic Agents', 'Metabolic agents are substances capable of producing an effect on the sum of the chemical and physical changes occurring in tissue, consisting of those reactions that convert small molecules into large (anabolism), and those reactions that convert large molecules into small (catabolism ).', '2015-11-06 16:53:20', '2015-11-06 16:53:20'),
(11, 'asdasdasd123', 'asdasd123', '2015-11-10 13:04:51', '0000-00-00 00:00:00'),
(12, 'asdasdas123', 'asdasd', '2015-11-10 13:05:03', '0000-00-00 00:00:00'),
(13, 'qwrqwrqwr', 'qwrqwr', '2015-11-18 15:36:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Vigan City', '2015-10-26 14:10:43', '2015-10-26 14:10:43'),
(2, 'Candon City', '2015-10-26 14:47:34', '2015-10-26 14:47:34'),
(4, 'latest', '2015-10-27 14:21:46', '2015-10-27 14:21:46'),
(6, 'Test', '2015-10-27 14:39:58', '2015-11-07 13:17:13'),
(9, 'tesafasdfasdf', '2015-10-27 14:42:29', '2015-10-27 14:42:29'),
(13, 'Sto. Domingo', '2015-11-05 14:32:59', '2015-11-05 14:32:59'),
(14, 'San Vicente', '2015-11-05 14:37:00', '2015-11-05 14:37:00'),
(15, 'Update test', '2015-11-07 13:10:33', '2015-11-07 13:10:33'),
(16, 'vqrwqvwrqv', '2015-11-21 14:37:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) unsigned DEFAULT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cost` double NOT NULL,
  `price` double NOT NULL,
  `image_file_name` longtext COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `supplier_id` (`category_id`),
  KEY `supplier_id_2` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `category_id`, `code`, `name`, `quantity`, `unit`, `cost`, `price`, `image_file_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(9, 2, 'd-34444444', 'Test item 1', 1, 'Bottles', 405, 567, '', 'Test', 0, '2015-11-04 11:56:07', '2015-11-04 11:56:07'),
(10, 3, 'd-45-67667', 'Diaper', 1, 'Pack', 145.7, 155, 'assets/uploads/items/items-564be81bcf5dc.jpeg', NULL, 0, '2015-11-04 12:04:21', '2015-11-04 12:04:21'),
(11, 1, 'G-25-46578', 'Multivitamins + Iron ', 1, 'Boxes', 540, 600, 'assets/uploads/items/items-564be81bcf5dc.jpeg', NULL, 0, '2015-11-04 13:03:43', '2015-11-04 13:03:43'),
(12, 9, 'P-34-58923', 'Calpol', 1, 'Box', 3467, 67.7, 'assets/uploads/items/items-564be81bcf5dc.jpeg', 'Fever Med', 0, '2015-11-04 16:09:53', '2015-11-04 16:09:53'),
(13, 1, 'G-23-46558', 'Acetaminophen', 1, 'Box', 500, 678, 'assets/uploads/items/items-564be81bcf5dc.jpeg', 'Acetaminophen is a pain reliever and a fever reducer.', 0, '2015-11-05 15:12:04', '2015-11-05 15:12:04'),
(14, 1, 'I-83-89743', 'Ibuprofen ', 1, 'Box', 230, 300, 'assets/uploads/items/items-564be81bcf5dc.jpeg', 'Ibuprofen is a nonsteroidal anti-inflammatory drug (NSAID). It works by reducing hormones that cause inflammation and pain in the body.', 0, '2015-11-05 15:15:52', '2015-11-05 15:15:52'),
(15, 1, 'C-34-44324', 'Cyclobenzaprine', 1, 'Box', 340, 350, 'assets/uploads/items/items-564be81bcf5dc.jpeg', 'Muscle Relaxant.', 0, '2015-11-05 15:17:59', '2015-11-05 15:17:59'),
(16, 2, 'A-28-37282', 'Lexapro (escitalopram)', 1, 'Bottle', 1230, 1500, 'assets/uploads/items/items-564be81bcf5dc.jpeg', 'Lexapro (escitalopram) is an antidepressant belonging to a group of drugs called selective serotonin reuptake inhibitors (SSRIs). Escitalopram affects chemicals in the brain that may be unbalanced in people with depression or anxiety.', 0, '2015-11-05 15:19:00', '2015-11-05 15:19:00'),
(17, 2, 'A-28-37282', 'Citalopram', 1, 'Bottle', 1600, 2000, 'assets/uploads/items/items-564be81bcf5dc.jpeg', 'Citalopram is an antidepressant in a group of drugs called selective serotonin reuptake inhibitors (SSRIs).', 0, '2015-11-05 15:19:34', '2015-11-05 15:19:34'),
(18, 1, 'G-45-45455', 'Allegra (Fexofenadine)', 1, 'Box', 450, 500, 'assets/uploads/items/items-564be81bcf5dc.jpeg', NULL, 0, '2015-11-05 15:28:23', '2015-11-05 15:28:23'),
(19, 2, 'G-45-45455', 'Amitriptyline', 1, 'Box', 450, 500, 'assets/uploads/items/items-564be81bcf5dc.jpeg', 'Amitriptyline is a tricyclic antidepressant', 0, '2015-11-05 15:28:47', '2015-11-05 15:28:47'),
(20, 10, 'R-46-56565', 'Glyset (miglitol)', 1, 'Bottle', 3650, 4100, 'assets/uploads/items/items-564be81bcf5dc.jpeg', 'Miglitol delays the digestion of carbohydrates (forms of sugar) in your body. This decreases the amount of sugar that passes into your blood after a meal and prevents periods of hyperglycemia (high blood sugar).', 0, '2015-11-06 16:55:27', '2015-11-06 16:55:27'),
(21, 2, 'k-54-65432', 'TEST', 1, '3', 20, 25, 'assets/uploads/items/items-564be81bcf5dc.jpeg', NULL, 0, '2015-11-10 11:19:16', '0000-00-00 00:00:00'),
(24, 5, 'Q-15-24532', 'qwqvw', 1, 'qwveqvw', 23, 23, 'assets/uploads/items/items-564be81bcf5dc.jpeg', 'vqwqvwrqvr', 0, '2015-11-17 14:46:07', '0000-00-00 00:00:00'),
(25, 2, 'H-23-42342', 'qwbrqwr', 1, 'qvwrqw', 23, 23, 'assets/uploads/items/items-564be81bcf5dc.jpeg', 'qvwqwr', 0, '2015-11-18 10:19:51', '0000-00-00 00:00:00'),
(26, 10, 'b-23-42342', '34234', 1, '23qwbeqweb', 1, 1, 'assets/uploads/items/items-564be81bcf5dc.jpeg', 'vqwrvq', 0, '2015-11-18 10:27:10', '0000-00-00 00:00:00'),
(27, 4, 'A-23-45768', 'vqwrvqwr', 1, 'vqwrvw', 12, 657, 'assets/uploads/items/items-564be81bcf5dc.jpeg', 'qvrvqwrqwvr', 0, '2015-11-18 10:53:15', '0000-00-00 00:00:00'),
(28, 5, 'f-45-64564', 'qqvrqw', 1, 'qwert', 56, 34, 'assets/uploads/items/items-564be81bcf5dc.jpeg', 'vqwrqvrqw', 0, '2015-11-18 10:56:18', '0000-00-00 00:00:00'),
(29, 4, 'H-22-34232', 'wqvrqvwr', 1, '23', 23, 23, 'assets/uploads/items/items-564d88777bff6.jpeg', 'qwrvqwr', 0, '2015-11-19 16:29:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `item_stocks`
--

CREATE TABLE IF NOT EXISTS `item_stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `purchase_id` (`purchase_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `item_stocks`
--

INSERT INTO `item_stocks` (`id`, `item_id`, `purchase_id`, `expiration_date`, `quantity`, `sub_total`) VALUES
(9, 11, 87, '2017-08-16', 33, 17820),
(10, 10, 87, '2022-07-29', 62, 9033.4),
(11, 12, 88, '2018-04-12', 32, 110944),
(12, 11, 88, '2018-08-16', 30, 16200),
(13, 10, 88, '2022-07-19', 10, 1457),
(14, 9, 89, '2017-07-19', 14, 5670),
(15, 13, 90, '2030-01-21', 20, 10000),
(16, 16, 91, '2017-07-11', 12, 14760),
(17, 15, 91, '2020-01-20', 12, 4080),
(18, 13, 91, '2019-05-21', 15, 7500),
(19, 17, 91, '2016-12-31', 15, 24000),
(20, 19, 92, '2018-03-23', 12, 5400),
(21, 18, 92, '2021-07-22', 20, 9000),
(22, 13, 93, '2015-11-14', 2, 1000),
(23, 11, 94, '2015-11-14', 11, 5940),
(24, 10, 94, '2015-11-14', 1, 145.7),
(25, 11, 95, '2015-11-14', 11, 5940),
(26, 10, 95, '2015-11-14', 1, 145.7),
(27, 11, 96, '2015-11-14', 11, 5940),
(28, 10, 96, '2015-11-14', 1, 145.7),
(29, 11, 97, '2015-11-19', 7, 3780),
(30, 12, 97, '2015-11-28', 14, 48538);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `action` longtext NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `current_date` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Logs for Inventory' AUTO_INCREMENT=54 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user`, `user_id`, `level`, `action`, `date_added`, `current_date`) VALUES
(1, 'Jeorge Janil Donato', 1, 2, 'Logged Out from the System.', '2015-11-18 09:13:18', '2015-11-18'),
(2, 'Jeorge Janil Donato', 1, 1, 'Deleted District named Sto. Domingo.', '2015-11-18 09:14:09', '2015-11-18'),
(3, 'Jeorge Janil Donato', 1, 1, 'Deleted District named Sto. Domingo.', '2015-11-18 09:14:10', '2015-11-18'),
(4, 'Jeorge Janil Donato', 1, 1, 'Deleted District named Sto. Domingo.', '2015-11-18 09:14:12', '2015-11-18'),
(5, 'Jeorge Janil Donato', 1, 1, 'Deleted District named Sto. Domingo.', '2015-11-18 09:27:51', '2015-11-19'),
(6, 'Jeorge Janil Donato', 1, 1, 'Updated a District. ', '2015-11-18 09:27:52', '2015-11-19'),
(7, 'Jeorge Janil Donato', 1, 1, 'Deleted District named ATEST.', '2015-11-18 09:27:52', '2015-11-19'),
(8, 'Jeorge Janil Donato', 1, 1, 'Deleted District named Karl update.', '2015-11-18 09:28:09', '2015-11-20'),
(9, 'Jeorge Janil Donato', 1, 2, 'Added New Office Budget.', '2015-11-18 09:28:09', '2015-11-20'),
(10, 'Jeorge Janil Donato', 1, 2, 'Deleted a Office Budget for Main Office - 1.', '2015-11-18 09:28:09', '2015-11-20'),
(11, 'Jeorge Janil Donato', 1, 1, 'Added New Item', '2015-11-18 10:19:52', '2015-11-18'),
(12, 'Jeorge Janil Donato', 1, 1, 'Added New Item', '2015-11-18 10:27:10', '2015-11-18'),
(13, 'Jeorge Janil Donato', 1, 1, 'Added New Item', '2015-11-18 10:53:16', '2015-11-18'),
(14, 'Jeorge Janil Donato', 1, 1, 'Added New Item', '2015-11-18 10:56:18', '2015-11-18'),
(15, 'admin', 1, 3, 'Updated the System Settings', '2015-11-18 11:41:25', '2015-11-18'),
(16, 'admin', 1, 3, 'Updated the System Settings', '2015-11-18 11:48:52', '2015-11-18'),
(17, 'admin', 1, 3, 'Updated the System Settings', '2015-11-18 11:58:11', '2015-11-18'),
(18, 'admin', 1, 3, 'Updated the System Settings', '2015-11-18 13:00:40', '2015-11-18'),
(19, 'User', 1, 1, 'Added New Category named qwrqwrqwr', '2015-11-18 15:36:56', '2015-11-18'),
(20, 'User', 1, 2, 'Profile Basic Information was Successfully Updated', '2015-11-19 11:28:26', '2015-11-19'),
(21, 'Inventory PHO', 1, 2, 'Profile Picture was Successfully Updated', '2015-11-19 11:39:36', '2015-11-19'),
(22, 'Inventory PHO', 1, 2, 'Profile Contact Information was Successfully Updated', '2015-11-19 11:41:20', '2015-11-19'),
(23, 'admin', 1, 3, 'Updated the System Settings', '2015-11-19 14:03:05', '2015-11-19'),
(24, 'admin', 1, 3, 'Updated the System Settings', '2015-11-19 16:18:37', '2015-11-19'),
(25, 'Inventory PHO', 1, 1, 'Added New Item named wqvrqvwr', '2015-11-19 16:29:43', '2015-11-19'),
(26, 'admin', 1, 3, 'Updated the System Settings', '2015-11-19 16:31:35', '2015-11-19'),
(27, 'admin', 1, 3, 'Updated the System Settings', '2015-11-20 15:25:46', '2015-11-20'),
(28, 'admin', 1, 3, 'Updated the System Settings', '2015-11-20 15:26:03', '2015-11-20'),
(29, 'admin', 1, 3, 'Updated the System Settings', '2015-11-20 15:26:27', '2015-11-20'),
(30, 'admin', 1, 3, 'Updated the System Settings', '2015-11-20 15:26:46', '2015-11-20'),
(31, 'admin', 1, 3, 'Updated the System Settings', '2015-11-20 15:28:21', '2015-11-20'),
(32, 'admin', 1, 3, 'Updated the System Settings', '2015-11-20 15:28:27', '2015-11-20'),
(33, 'admin', 1, 3, 'Updated the System Settings', '2015-11-20 15:31:04', '2015-11-20'),
(34, 'admin', 1, 3, 'Updated the System Settings', '2015-11-20 15:31:26', '2015-11-20'),
(35, 'admin', 1, 3, 'Updated the System Settings', '2015-11-20 15:31:45', '2015-11-20'),
(36, 'admin', 1, 3, 'Updated the System Settings', '2015-11-20 15:32:02', '2015-11-20'),
(37, 'admin', 1, 3, 'Updated the System Settings', '2015-11-20 15:32:43', '2015-11-20'),
(38, 'admin', 1, 3, 'Updated the System Settings', '2015-11-20 15:32:56', '2015-11-20'),
(39, 'admin', 1, 3, 'Updated the System Settings', '2015-11-20 15:37:17', '2015-11-20'),
(40, 'admin', 1, 3, 'Updated the System Settings', '2015-11-20 15:37:28', '2015-11-20'),
(41, 'admin', 1, 3, 'Updated the System Settings', '2015-11-20 15:40:23', '2015-11-20'),
(42, 'admin', 1, 3, 'Updated the System Settings', '2015-11-20 15:41:02', '2015-11-20'),
(43, 'admin', 1, 3, 'Updated the System Settings', '2015-11-20 15:52:12', '2015-11-20'),
(44, 'admin', 1, 3, 'Updated the System Settings', '2015-11-20 16:52:30', '2015-11-20'),
(45, 'admin', 1, 3, 'Updated the System Settings', '2015-11-20 16:53:38', '2015-11-20'),
(46, 'admin', 1, 3, 'Updated the System Settings', '2015-11-21 10:21:15', '2015-11-21'),
(47, 'admin', 1, 3, 'Updated the System Settings', '2015-11-21 10:22:47', '2015-11-21'),
(48, 'admin', 1, 3, 'Updated the System Settings', '2015-11-21 10:25:30', '2015-11-21'),
(49, 'admin', 1, 3, 'Updated the System Settings', '2015-11-21 10:25:43', '2015-11-21'),
(50, 'admin', 1, 3, 'Updated the System Settings', '2015-11-21 10:58:16', '2015-11-21'),
(51, 'admin', 1, 3, 'Updated the System Settings', '2015-11-21 12:37:15', '2015-11-21'),
(52, 'Inventory PHO', 1, 1, 'Added New Office named qvwrqvwr', '2015-11-21 14:38:59', '2015-11-21'),
(53, 'Inventory PHO', 1, 1, 'Added New Office named cqwrcqwr', '2015-11-21 14:39:09', '2015-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE IF NOT EXISTS `offices` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `district_id` int(11) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `district_id` (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `district_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Main Office - 1', '2015-10-26 14:27:13', '2015-10-26 14:27:13'),
(3, 13, 'SDO Office 1', '2015-11-05 14:33:25', '2015-11-07 13:33:31'),
(4, 2, 'qvwrqvwr', '2015-11-21 14:38:59', '0000-00-00 00:00:00'),
(5, 2, 'cqwrcqwr', '2015-11-21 14:39:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `office_budgets`
--

CREATE TABLE IF NOT EXISTS `office_budgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `office_id` int(10) unsigned NOT NULL,
  `year` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00',
  `amount_given` double NOT NULL,
  `amount_left` float NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `office_id` (`office_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `office_budgets`
--

INSERT INTO `office_budgets` (`id`, `office_id`, `year`, `amount_given`, `amount_left`, `amount`, `created_at`, `updated_at`) VALUES
(3, 3, '2015', 200000, 200000, 0, '2015-11-17 11:06:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `year` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_id` int(11) unsigned NOT NULL,
  `items` text COLLATE utf8_unicode_ci,
  `grand_total` float DEFAULT NULL,
  `status` enum('Received','Pending','Ordered') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=98 ;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `reference_no`, `datetime`, `year`, `month`, `supplier_id`, `items`, `grand_total`, `status`, `created_at`, `updated_at`) VALUES
(87, 'A1-234-5678', '2015-11-04 03:15:00', '2015', '9', 4, NULL, 26853.4, 'Ordered', '2015-11-04 15:16:14', '2015-11-04 15:16:14'),
(88, 'P3-904-7873', '2015-11-04 04:10:00', '2015', '9', 6, NULL, 128601, 'Ordered', '2015-11-04 16:11:11', '2015-11-04 16:11:11'),
(89, 'e5-678-9087', '2015-11-04 04:13:00', '2015', '5', 1, NULL, 5670, 'Pending', '2015-11-04 16:13:34', '2015-11-04 16:13:34'),
(90, 'G9-238-7398', '2015-11-05 03:12:00', '2015', '11', 4, NULL, 10000, 'Ordered', '2015-11-05 15:13:01', '2015-11-05 15:13:01'),
(91, 'F9-347-3434', '2015-11-05 03:22:00', '2015', '6', 6, NULL, 50340, 'Ordered', '2015-11-05 15:22:25', '2015-11-05 15:22:25'),
(92, 'Z3-453-5565', '2015-11-05 03:29:00', '2015', '11', 4, NULL, 14400, 'Ordered', '2015-11-05 15:29:42', '2015-11-05 15:29:42'),
(93, '12-312-3123', '2015-11-14 09:07:00', '2015', '8', 6, NULL, 1000, 'Received', '2015-11-14 09:08:33', '0000-00-00 00:00:00'),
(94, 'a3-434-3434', '2015-11-15 09:10:00', '2015', '11', 1, NULL, 6085.7, 'Ordered', '2015-11-14 09:11:19', '0000-00-00 00:00:00'),
(95, 'a3-434-3434', '2015-11-15 09:10:00', '2015', '11', 1, NULL, 6085.7, 'Ordered', '2015-11-14 09:11:20', '0000-00-00 00:00:00'),
(96, 'a3-434-3434', '2015-11-15 09:10:00', '2015', '11', 1, NULL, 6085.7, 'Ordered', '2015-11-14 09:11:23', '0000-00-00 00:00:00'),
(97, 'A2-323-4234', '2015-11-17 11:02:00', '2015', '11', 6, NULL, 52318, 'Ordered', '2015-11-17 11:03:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `office_id` int(10) unsigned NOT NULL,
  `grand_total` float NOT NULL,
  `items` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `status` enum('Received','Pending','Approved') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Received',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `reference_no`, `office_id`, `grand_total`, `items`, `datetime`, `status`, `created_at`, `updated_at`) VALUES
(6, '', 1, 34200, '[{"code":"G-23-46558","name":"Acetaminophen","quantity":"12","cost":"500","subTotal":"6000.00"},{"code":"A-28-37282","name":"Citalopram","quantity":"12","cost":"1600","subTotal":"19200.00"},{"code":"G-45-45455","name":"Amitriptyline","quantity":"20","cost":"450","subTotal":"9000.00"}]', '2015-11-06 04:29:00', 'Received', '2015-11-06 16:29:41', '2015-11-06 16:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'login', 'Login privileges, granted after account confirmation'),
(2, 'admin', 'Administrative user, has access to everything.'),
(3, 'office_user', 'Permission for offices');

-- --------------------------------------------------------

--
-- Table structure for table `roles_users`
--

CREATE TABLE IF NOT EXISTS `roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles_users`
--

INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(1, 2),
(2, 2),
(4, 2),
(5, 2),
(8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(60) NOT NULL,
  `configs` mediumtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `type`, `configs`, `created_at`, `updated_at`) VALUES
(1, 'system_default', '{"name":"Inventory PHO","address":"Vigan City, Ilocos Sur","currency":"&#8369;","favicon":"{\\"name\\":\\"design-interactive_500.png\\",\\"location\\":\\"assets\\\\\\/uploads\\\\\\/favicon\\\\\\/favicon-1-564ff4fbdc63d-design-interactive_500.png\\",\\"extension\\":\\"png\\"}","item_expiration":null,"notiftype":"byWeek","notifdate":"1"}', '2015-10-29 05:44:58', '2015-11-12 06:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `representative` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_number` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `representative`, `email`, `contact_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'asdasd', 'Karl', 'nido@ph.com', '2394-8230-9472', 'Quezon City', '2015-10-26 15:39:22', '2015-10-26 15:43:52'),
(2, 'LACTUM', 'juan', 'juan@test.com', '1290-4102-9834', 'Bantay, Ilocos Sur', '2015-10-26 15:47:34', '2015-10-26 15:47:34'),
(3, 'New Company', 'newRep', 'new@gmmm.com', '0927-2839-7289', 'San Juan, Ilocos Sur', '2015-10-26 15:48:54', '2015-10-26 15:48:54'),
(4, 'Generic Meds123', 'Karl', 'generic@test.com', '0934-7389-2425', 'Vigan City Ilocos', '2015-10-27 16:22:28', '2015-10-27 16:22:28'),
(5, 'Generic Soaps', 'Juan', 'test@juan.com', '0948-9472-3098', 'Manila, Philippines', '2015-11-04 10:25:35', '2015-11-04 10:25:35'),
(6, 'Umbrella Corporation', 'Jade', 'um@gmail.com', '0358-9483-9047', 'United States', '2015-11-04 16:06:02', '2015-11-04 16:06:02'),
(7, 'vqwrvqw', 'rqwrqvwrqvwr', 'asdasd@kajsdkasd.com', '2312-3423-4234', 'cqwrcqr', '2015-11-10 13:06:00', '0000-00-00 00:00:00'),
(8, 'vrwrvqwrvqwrqvwr', 'qweqwe', 'adasd@asdasd.com', '1231-2312-3123', 'qvrqwvrqwr', '2015-11-11 10:22:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reference_no` varchar(100) NOT NULL,
  `office_id` int(11) unsigned NOT NULL,
  `items_list` text NOT NULL,
  `status` enum('Received','Pending','Ordered') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `office_id` (`office_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `transactions`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(127) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` char(50) NOT NULL,
  `user_avatar` longtext NOT NULL,
  `user_information` longtext NOT NULL,
  `contact_information` longtext NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `user_avatar`, `user_information`, `contact_information`, `logins`, `last_login`) VALUES
(1, 'iventoryPHO@gmail.com', 'admin', '08dd74724b76acb94835518b1f5cf6d2f0a40d8e3bf5447bfd', '{"name":"Hydrangeas.jpg","location":"assets\\/uploads\\/user-1-564d4477f15db-Hydrangeas.jpg","extension":"jpg"}', '{"fullname":"Inventory PHO","gender":"Male","birthday":"March 5, 1992","mstatus":"Single"}', '{"mobile":"09354658541","email":"email@email.com","twitter":"@kwitter","skype":"inventorypho"}', 93, 1448086566),
(2, 'asd@fasdk.com', 'asdf', '3901abed9ba09b5dffc2cab3d9cd485dc46a50e42b44871c8a', '', '', '', 0, NULL),
(4, 'superuser.design@gmail.com', 'SuperUser', '00c2d236ee415360f59a3c57ccd1edb5d06b6a4ac53a344d4e', '', '', '', 0, NULL),
(5, 'test@test.com', 'admin2', '08dd74724b76acb94835518b1f5cf6d2f0a40d8e3bf5447bfd', '{"name":"Jellyfish.jpg","location":"assets\\/uploads\\/user-5-5642ad5532389-Jellyfish.jpg","extension":"jpg"}', '{"fullname":"Jeorge","gender":"Male","birthday":"April 23, 1994","mstatus":"Single"}', '{"mobile":"09367433057","email":"jeorgedonato@gmail.com","twitter":"@kwitter","skype":"jeorgejanildonato"}', 4, 1447209328),
(6, 'asldkfj@gm.com', 'testagain', 'b281a009ec6e044d2d41414f66d2e674f8a328a9ca40b1bfa1', '', '', '', 0, NULL),
(7, 'test@g.com', 'test', 'ebdc90b34fa2456ddfb9d53cbfc26a53befa9670ba71eb8646', '', '', '', 0, NULL),
(8, 'office1@gmail.com', 'office1', '08dd74724b76acb94835518b1f5cf6d2f0a40d8e3bf5447bfd', '{"name":"Koala.jpg","location":"assets\\/uploads\\/user-8-5641af0dbe49e-Koala.jpg","extension":"jpg"}', '{"fullname":"Renato Go","gender":"Male","birthday":"June 26, 1981","mstatus":"Single"}', '{"mobile":"054655454","email":"renato@gmail.com","twitter":"@renato","skype":"renatogo"}', 11, 1447478123);

-- --------------------------------------------------------

--
-- Table structure for table `user_tokens`
--

CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(32) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_tokens`
--


-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_all_items`
--
CREATE TABLE IF NOT EXISTS `vw_all_items` (
`id` int(11)
,`purchase_id` int(11)
,`reference_no` varchar(100)
,`datetime` datetime
,`status` enum('Received','Pending','Ordered')
,`code` varchar(100)
,`item_name` varchar(100)
,`supplier_name` varchar(100)
,`unit` varchar(100)
,`cost` double
,`price` double
,`expiration_date` date
,`quantity` int(11)
,`sub_total` float
,`grand_total` float
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_purchase_details`
--
CREATE TABLE IF NOT EXISTS `vw_purchase_details` (
`purchase_id` int(11)
,`reference_no` varchar(100)
,`datetime` datetime
,`status` enum('Received','Pending','Ordered')
,`code` varchar(100)
,`item_name` varchar(100)
,`supplier_name` varchar(100)
,`unit` varchar(100)
,`cost` double
,`expiration_date` date
,`quantity` int(11)
,`sub_total` float
,`grand_total` float
);
-- --------------------------------------------------------

--
-- Structure for view `vw_all_items`
--
DROP TABLE IF EXISTS `vw_all_items`;

CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_all_items` AS select `i`.`id` AS `id`,`iss`.`purchase_id` AS `purchase_id`,`p`.`reference_no` AS `reference_no`,`p`.`datetime` AS `datetime`,`p`.`status` AS `status`,`i`.`code` AS `code`,`i`.`name` AS `item_name`,`s`.`name` AS `supplier_name`,`i`.`unit` AS `unit`,`i`.`cost` AS `cost`,`i`.`price` AS `price`,`iss`.`expiration_date` AS `expiration_date`,`iss`.`quantity` AS `quantity`,`iss`.`sub_total` AS `sub_total`,`p`.`grand_total` AS `grand_total` from (((`items` `i` join `item_stocks` `iss`) join `purchases` `p`) join `suppliers` `s`) where ((`iss`.`item_id` = `i`.`id`) and (`iss`.`purchase_id` = `p`.`id`) and (`p`.`supplier_id` = `s`.`id`)) order by `i`.`id`;

-- --------------------------------------------------------

--
-- Structure for view `vw_purchase_details`
--
DROP TABLE IF EXISTS `vw_purchase_details`;

CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_purchase_details` AS select `iss`.`purchase_id` AS `purchase_id`,`p`.`reference_no` AS `reference_no`,`p`.`datetime` AS `datetime`,`p`.`status` AS `status`,`i`.`code` AS `code`,`i`.`name` AS `item_name`,`s`.`name` AS `supplier_name`,`i`.`unit` AS `unit`,`i`.`cost` AS `cost`,`iss`.`expiration_date` AS `expiration_date`,`iss`.`quantity` AS `quantity`,`iss`.`sub_total` AS `sub_total`,`p`.`grand_total` AS `grand_total` from (((`items` `i` join `item_stocks` `iss`) join `purchases` `p`) join `suppliers` `s`) where ((`iss`.`item_id` = `i`.`id`) and (`iss`.`purchase_id` = `p`.`id`) and (`p`.`supplier_id` = `s`.`id`)) order by `iss`.`purchase_id`;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_catgory_id_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `item_stocks`
--
ALTER TABLE `item_stocks`
  ADD CONSTRAINT `item_stocks_item_id_fk` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `item_stocks_item_purchase_id_fk` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`);

--
-- Constraints for table `offices`
--
ALTER TABLE `offices`
  ADD CONSTRAINT `district_id_fk` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

--
-- Constraints for table `office_budgets`
--
ALTER TABLE `office_budgets`
  ADD CONSTRAINT `office_id_office_budget` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `supplier_id_fk` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `roles_users`
--
ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `office_id_fk` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`);

--
-- Constraints for table `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
