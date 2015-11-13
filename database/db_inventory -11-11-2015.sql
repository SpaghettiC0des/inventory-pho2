-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2015 at 10:04 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


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
  `id` int(11) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Generic', 'Cheap and effective', '2015-10-24 21:39:32', '2015-10-24 21:39:32'),
(2, 'Anti-deppressant', 'Blahblahbalh', '2015-10-26 06:05:53', '2015-10-26 06:05:53'),
(3, 'Infants', NULL, '2015-10-26 07:25:57', '2015-10-26 07:25:57'),
(4, 'Tablets', NULL, '2015-10-26 07:30:04', '2015-10-26 07:30:04'),
(5, 'Tesla', 'REST', '2015-10-26 07:31:31', '2015-11-09 06:09:28'),
(6, 'New Stocks', 'test', '2015-10-26 07:32:36', '2015-10-26 07:32:36'),
(7, 'Teens', 'testasdfasdf', '2015-10-26 07:33:21', '2015-10-26 07:33:21'),
(8, 'Vitamins', NULL, '2015-10-26 11:33:29', '2015-10-26 11:33:29'),
(9, 'Kids', '\nasdfsadf', '2015-11-04 03:55:16', '2015-11-04 03:55:16'),
(10, 'Metabolic Agents', 'Metabolic agents are substances capable of producing an effect on the sum of the chemical and physical changes occurring in tissue, consisting of those reactions that convert small molecules into large (anabolism), and those reactions that convert large molecules into small (catabolism ).', '2015-11-06 08:53:20', '2015-11-06 08:53:20'),
(11, 'Senior Citizens', 'Test\n', '2015-11-09 06:05:22', '2015-11-09 06:05:22'),
(12, 'test', 'dsfsdf', '2015-11-09 06:50:45', '2015-11-09 06:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Vigan City', '2015-10-26 06:10:43', '2015-10-26 06:10:43'),
(2, 'Candon City 1', '2015-10-26 06:47:34', '2015-11-11 08:59:42'),
(5, 'Santa', '2015-10-27 06:23:52', '2015-11-09 05:29:49'),
(8, 'Karl updated', '2015-10-27 06:42:09', '2015-11-09 05:32:24'),
(13, 'Sto. Domingo', '2015-11-05 06:32:59', '2015-11-07 06:56:19'),
(14, 'San Vicente', '2015-11-05 06:37:00', '2015-11-05 06:37:00'),
(18, 'San Juan', '2015-11-07 07:20:01', '2015-11-07 07:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL,
  `category_id` int(11) unsigned DEFAULT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cost` double NOT NULL,
  `price` double NOT NULL,
  `image_file_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `category_id`, `code`, `name`, `quantity`, `unit`, `cost`, `price`, `image_file_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(9, 2, 'd-34444444', 'Test item 1', 1, 'Bottle', 405, 567, 'acne-set_thumb.JPG', 'Test', 0, '2015-11-04 03:56:07', '2015-11-09 07:31:39'),
(10, 3, 'd-45-67667', 'Diaper', 1, 'Pack', 145.7, 155, 'bleaching_cream_4_1_thumb.jpg', NULL, 0, '2015-11-04 04:04:21', '2015-11-04 04:04:21'),
(11, 1, 'G-25-46578', 'Multivitamins + Iron ', 1, 'Box', 540, 600, 'kojic_acid_cream_thumb.jpg', NULL, 0, '2015-11-04 05:03:43', '2015-11-09 07:32:17'),
(12, 9, 'P-34-58923', 'Calpol', 1, 'Box', 3467, 67.7, 'acne-set_thumb.JPG', 'Fever Med', 0, '2015-11-04 08:09:53', '2015-11-04 08:09:53'),
(13, 1, 'G-23-46558', 'Acetaminophen', 1, 'Box', 500, 678, 'bantay.png', 'Acetaminophen is a pain reliever and a fever reducer.', 0, '2015-11-05 07:12:04', '2015-11-05 07:12:04'),
(14, 1, 'I-83-89743', 'Ibuprofen ', 1, 'Box', 230, 300, 'acne-set_thumb.JPG', 'Ibuprofen is a nonsteroidal anti-inflammatory drug (NSAID). It works by reducing hormones that cause inflammation and pain in the body.', 0, '2015-11-05 07:15:52', '2015-11-05 07:15:52'),
(15, 1, 'C-34-44324', 'Cyclobenzaprine', 1, 'Box', 340, 350, 'bleaching_cream_4_1_thumb.jpg', 'Muscle Relaxant.', 0, '2015-11-05 07:17:59', '2015-11-05 07:17:59'),
(16, 2, 'A-28-37282', 'Lexapro (escitalopram)', 1, 'Bottle', 1230, 1500, 'bleaching_cream_4_1_thumb.jpg', 'Lexapro (escitalopram) is an antidepressant belonging to a group of drugs called selective serotonin reuptake inhibitors (SSRIs). Escitalopram affects chemicals in the brain that may be unbalanced in people with depression or anxiety.', 0, '2015-11-05 07:19:00', '2015-11-05 07:19:00'),
(17, 2, 'A-28-37282', 'Citalopram', 1, 'Bottle', 1600, 2000, 'bleaching_cream_4_1_thumb.jpg', 'Citalopram is an antidepressant in a group of drugs called selective serotonin reuptake inhibitors (SSRIs).', 0, '2015-11-05 07:19:34', '2015-11-05 07:19:34'),
(18, 1, 'G-45-45455', 'Allegra (Fexofenadine)', 1, 'Box', 450, 500, '3501419828_28d48bb4f2.jpg', NULL, 0, '2015-11-05 07:28:23', '2015-11-05 07:28:23'),
(19, 2, 'G-45-45455', 'Amitriptyline', 1, 'Box', 450, 500, '3501419828_28d48bb4f2.jpg', 'Amitriptyline is a tricyclic antidepressant', 0, '2015-11-05 07:28:47', '2015-11-05 07:28:47'),
(20, 10, 'R-46-56565', 'Glyset (miglitol)', 1, 'Bottle', 3650, 4100, 'pharmacist-health-wallpapers-backgrounds-for-powerpoint.jpg', 'Miglitol delays the digestion of carbohydrates (forms of sugar) in your body. This decreases the amount of sugar that passes into your blood after a meal and prevents periods of hyperglycemia (high blood sugar).', 0, '2015-11-06 08:55:27', '2015-11-06 08:55:27'),
(21, 4, 'A-54-65465', 'Hundred Islands', 1, 'Tablet', 500, 600, '1.png', NULL, 0, '2015-11-07 09:03:40', '2015-11-07 09:03:40'),
(22, 1, 'a-45-45656', 'Test', 1, 'Piece', 54545, 3453, 'acne-set_thumb.JPG', 'dsfds', 0, '2015-11-07 09:05:54', '2015-11-09 07:31:56'),
(23, 1, 'h-47-89767', 'NEWEST', 1, 'BOX', 20, 25, 'acne-set_thumb.JPG', 'TEST', 0, '2015-11-09 07:33:24', '2015-11-09 07:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `item_stocks`
--

CREATE TABLE IF NOT EXISTS `item_stocks` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_stocks`
--

INSERT INTO `item_stocks` (`id`, `item_id`, `purchase_id`, `expiration_date`, `quantity`, `sub_total`) VALUES
(9, 11, 87, '2015-11-09', 0, 17820),
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
(21, 18, 92, '2021-07-22', 20, 9000);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `action` varchar(250) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COMMENT='Logs for Inventory';

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user`, `user_id`, `level`, `action`, `date_added`) VALUES
(12, 'User', 0, 2, 'Logged in', '2015-11-07 08:37:07'),
(13, 'User', 0, 2, 'Logged in', '2015-11-07 08:39:02'),
(14, 'User', 0, 2, 'Logged in', '2015-11-07 08:39:31'),
(15, 'User', 0, 2, 'Logged in', '2015-11-07 09:05:36'),
(16, 'User', 0, 2, 'Logged in', '2015-11-09 06:15:21'),
(17, 'User', 0, 2, 'Logged in', '2015-11-09 06:16:05'),
(18, 'User', 0, 2, 'Logged in', '2015-11-09 06:16:37'),
(19, 'admin', 0, 2, 'Logged Out from the System', '2015-11-10 08:58:27'),
(20, 'admin', 0, 2, 'Logged Out from the System', '2015-11-11 07:38:09'),
(21, 'User', 1, 2, 'Profile Picture was Successfully Updated', '2015-11-11 08:57:45'),
(22, 'User', 1, 2, 'Profile Basic Information was Successfully Updated', '2015-11-11 08:59:15'),
(23, 'Karl Marx Lopez', 1, 1, 'Updated a District', '2015-11-11 08:59:42');

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE IF NOT EXISTS `offices` (
  `id` int(11) unsigned NOT NULL,
  `district_id` int(11) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `district_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Main Office - 01', '2015-10-26 06:27:13', '2015-11-07 07:20:52'),
(2, 2, 'Candon Branch - 01', '2015-10-28 06:42:14', '2015-11-09 05:32:48'),
(3, 13, 'SDO Office 1', '2015-11-05 06:33:25', '2015-11-07 05:33:31'),
(5, 18, 'San Juan Branch - 01', '2015-11-07 07:20:29', '2015-11-07 07:21:16'),
(6, 1, 'Caoayan Branch - 01', '2015-11-07 09:00:10', '2015-11-07 09:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `office_budgets`
--

CREATE TABLE IF NOT EXISTS `office_budgets` (
  `id` int(11) NOT NULL,
  `office_id` int(10) unsigned NOT NULL,
  `year` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00',
  `amount_given` double NOT NULL,
  `amount_left` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `office_budgets`
--

INSERT INTO `office_budgets` (`id`, `office_id`, `year`, `amount_given`, `amount_left`, `created_at`, `updated_at`) VALUES
(1, 1, '2016', 62000, 60000, '2015-11-05 06:25:00', '2015-11-07 08:52:54'),
(3, 5, '2016', 20000, 17000, '2015-11-07 07:24:19', '2015-11-09 08:04:05'),
(4, 2, '2016', 20000, 20000, '2015-11-07 07:30:17', '2015-11-07 09:02:27');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(11) NOT NULL,
  `reference_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `supplier_id` int(11) unsigned NOT NULL,
  `items` text COLLATE utf8_unicode_ci,
  `grand_total` float DEFAULT NULL,
  `status` enum('Received','Pending','Ordered') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `reference_no`, `datetime`, `supplier_id`, `items`, `grand_total`, `status`, `created_at`, `updated_at`) VALUES
(87, 'A1-234-5678', '2015-11-04 03:15:00', 4, NULL, 26853.4, 'Ordered', '2015-11-04 07:16:14', '2015-11-04 07:16:14'),
(88, 'P3-904-7873', '2015-11-04 04:10:00', 6, NULL, 128601, 'Ordered', '2015-11-04 08:11:11', '2015-11-04 08:11:11'),
(89, 'e5-678-9087', '2015-11-04 04:13:00', 1, NULL, 5670, 'Pending', '2015-11-04 08:13:34', '2015-11-04 08:13:34'),
(90, 'G9-238-7398', '2015-11-05 03:12:00', 4, NULL, 10000, 'Ordered', '2015-11-05 07:13:01', '2015-11-05 07:13:01'),
(91, 'F9-347-3434', '2015-11-05 03:22:00', 6, NULL, 50340, 'Ordered', '2015-11-05 07:22:25', '2015-11-05 07:22:25'),
(92, 'Z3-453-5565', '2015-11-05 03:29:00', 4, NULL, 14400, 'Ordered', '2015-11-05 07:29:42', '2015-11-05 07:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL,
  `reference_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `office_id` int(10) unsigned NOT NULL,
  `grand_total` float NOT NULL,
  `items` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `status` enum('Received','Pending','Approved') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Received',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `reference_no`, `office_id`, `grand_total`, `items`, `datetime`, `status`, `created_at`, `updated_at`) VALUES
(6, 'A-123-456', 1, 34200, '[{"code":"G-23-46558","name":"Acetaminophen","quantity":"12","cost":"500","subTotal":"6000.00"},{"code":"A-28-37282","name":"Citalopram","quantity":"12","cost":"1600","subTotal":"19200.00"},{"code":"G-45-45455","name":"Amitriptyline","quantity":"20","cost":"450","subTotal":"9000.00"}]', '2015-11-06 04:29:00', 'Approved', '2015-11-06 08:29:41', '2015-11-10 06:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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
  `role_id` int(10) unsigned NOT NULL
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
  `id` int(10) unsigned NOT NULL,
  `type` varchar(60) NOT NULL,
  `configs` mediumtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `type`, `configs`, `created_at`, `updated_at`) VALUES
(1, 'system_default', '{"name":"Inventory PHO","address":"Vigan City, Ilocos Sur","currency":"&#8369;","favicon":"Tulips.jpg"}', '2015-10-29 05:44:58', '2015-11-09 06:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `representative` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_number` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `representative`, `email`, `contact_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'NIDO', 'Karl', 'nido@ph.com', '2394-8230-9472', 'Quezon City', '2015-10-26 07:39:22', '2015-11-09 06:50:29'),
(2, 'LACTUM', 'juan', 'juan@test.com', '1290-4102-9834', 'Bantay, Ilocos Sur', '2015-10-26 07:47:34', '2015-10-26 07:47:34'),
(3, 'New Company', 'newRep', 'new@gmmm.com', '0927-2839-7289', 'San Juan, Ilocos Sur', '2015-10-26 07:48:54', '2015-10-26 07:48:54'),
(4, 'Generic Meds', 'Karl', 'generic@test.com', '0934-7389-2374', 'Vigan City Ilocos', '2015-10-27 08:22:28', '2015-10-27 08:22:28'),
(5, 'Generic Soaps', 'Juan', 'test@juan.com', '0948-9472-3098', 'Manila, Philippines', '2015-11-04 02:25:35', '2015-11-04 02:25:35'),
(6, 'Umbrella Corporation', 'Jade', 'um@gmail.com', '0358-9483-9047', 'United States', '2015-11-04 08:06:02', '2015-11-04 08:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reference_no` varchar(100) NOT NULL,
  `office_id` int(11) unsigned NOT NULL,
  `amount_paid` float NOT NULL,
  `amount_left` float NOT NULL,
  `status` enum('Partial','Paid') NOT NULL DEFAULT 'Partial',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `datetime`, `reference_no`, `office_id`, `amount_paid`, `amount_left`, `status`, `created_at`, `updated_at`) VALUES
(1, '2015-11-10 03:48:00', 'A-123-456', 1, 200, 34000, 'Partial', '2015-11-10 07:48:27', '2015-11-10 07:48:27'),
(2, '2015-11-10 03:49:00', 'A-123-456', 1, 2000, 32200, 'Partial', '2015-11-10 07:49:48', '2015-11-10 07:49:48'),
(3, '2015-11-10 03:50:00', 'A-123-456', 1, 1, 34199, 'Partial', '2015-11-10 07:50:32', '2015-11-10 07:50:32'),
(4, '2015-11-10 03:53:00', 'A-123-456', 1, 1, 34199, 'Partial', '2015-11-10 07:53:56', '2015-11-10 07:53:56'),
(5, '2015-11-10 03:56:00', 'A-123-456', 1, 2.3, 34197.7, 'Partial', '2015-11-10 07:56:56', '2015-11-10 07:56:56'),
(6, '2015-11-10 03:57:00', 'A-123-456', 1, 2.2, 34197.8, 'Partial', '2015-11-10 07:57:32', '2015-11-10 07:57:32'),
(7, '2015-11-10 03:58:00', 'A-123-456', 1, 300, 33900, 'Paid', '2015-11-10 07:59:11', '2015-11-10 08:20:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL,
  `email` varchar(127) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` char(50) NOT NULL,
  `user_avatar` longtext NOT NULL,
  `user_information` longtext NOT NULL,
  `contact_information` longtext NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `user_avatar`, `user_information`, `contact_information`, `logins`, `last_login`) VALUES
(1, 'iventoryPHO@gmail.com', 'admin', '08dd74724b76acb94835518b1f5cf6d2f0a40d8e3bf5447bfd', '{"name":"1.png","location":"assets\\/uploads\\/user-1-5643030915526-1.png","extension":"png"}', '{"fullname":"Karl Marx Lopez","gender":"Male","birthday":"November 11, 2015","mstatus":"Single"}', '', 39, 1447227527),
(2, 'asd@fasdk.com', 'asdf', '3901abed9ba09b5dffc2cab3d9cd485dc46a50e42b44871c8a', '', '', '', 0, NULL),
(4, 'superuser.design@gmail.com', 'SuperUser', '00c2d236ee415360f59a3c57ccd1edb5d06b6a4ac53a344d4e', '', '', '', 0, NULL),
(5, 'test@test.com', 'admin2', '08dd74724b76acb94835518b1f5cf6d2f0a40d8e3bf5447bfd', '', '', '', 1, 1446021061),
(6, 'asldkfj@gm.com', 'testagain', 'b281a009ec6e044d2d41414f66d2e674f8a328a9ca40b1bfa1', '', '', '', 0, NULL),
(7, 'test@g.com', 'test', 'ebdc90b34fa2456ddfb9d53cbfc26a53befa9670ba71eb8646', '', '', '', 0, NULL),
(8, 'office1@gmail.com', 'office1', '08dd74724b76acb94835518b1f5cf6d2f0a40d8e3bf5447bfd', '', '', '', 4, 1446883669);

-- --------------------------------------------------------

--
-- Table structure for table `user_tokens`
--

CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(32) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Stand-in structure for view `vw_all_items_onstock`
--
CREATE TABLE IF NOT EXISTS `vw_all_items_onstock` (
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
-- Structure for view `vw_all_items_onstock`
--
DROP TABLE IF EXISTS `vw_all_items_onstock`;

CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_all_items_onstock` AS select `i`.`id` AS `id`,`iss`.`purchase_id` AS `purchase_id`,`p`.`reference_no` AS `reference_no`,`p`.`datetime` AS `datetime`,`p`.`status` AS `status`,`i`.`code` AS `code`,`i`.`name` AS `item_name`,`s`.`name` AS `supplier_name`,`i`.`unit` AS `unit`,`i`.`cost` AS `cost`,`iss`.`expiration_date` AS `expiration_date`,`iss`.`quantity` AS `quantity`,`iss`.`sub_total` AS `sub_total`,`p`.`grand_total` AS `grand_total` from (((`items` `i` join `item_stocks` `iss`) join `purchases` `p`) join `suppliers` `s`) where ((`iss`.`quantity` > 0) and (`iss`.`item_id` = `i`.`id`) and (`iss`.`purchase_id` = `p`.`id`) and (`p`.`supplier_id` = `s`.`id`)) order by `i`.`id`;

-- --------------------------------------------------------

--
-- Structure for view `vw_purchase_details`
--
DROP TABLE IF EXISTS `vw_purchase_details`;

CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_purchase_details` AS select `iss`.`purchase_id` AS `purchase_id`,`p`.`reference_no` AS `reference_no`,`p`.`datetime` AS `datetime`,`p`.`status` AS `status`,`i`.`code` AS `code`,`i`.`name` AS `item_name`,`s`.`name` AS `supplier_name`,`i`.`unit` AS `unit`,`i`.`cost` AS `cost`,`iss`.`expiration_date` AS `expiration_date`,`iss`.`quantity` AS `quantity`,`iss`.`sub_total` AS `sub_total`,`p`.`grand_total` AS `grand_total` from (((`items` `i` join `item_stocks` `iss`) join `purchases` `p`) join `suppliers` `s`) where ((`iss`.`item_id` = `i`.`id`) and (`iss`.`purchase_id` = `p`.`id`) and (`p`.`supplier_id` = `s`.`id`)) order by `iss`.`purchase_id`;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`), ADD KEY `supplier_id` (`category_id`), ADD KEY `supplier_id_2` (`category_id`);

--
-- Indexes for table `item_stocks`
--
ALTER TABLE `item_stocks`
  ADD PRIMARY KEY (`id`), ADD KEY `item_id` (`item_id`), ADD KEY `purchase_id` (`purchase_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`), ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `office_budgets`
--
ALTER TABLE `office_budgets`
  ADD PRIMARY KEY (`id`), ADD KEY `office_id` (`office_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`), ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uniq_name` (`name`);

--
-- Indexes for table `roles_users`
--
ALTER TABLE `roles_users`
  ADD PRIMARY KEY (`user_id`,`role_id`), ADD KEY `fk_role_id` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`), ADD KEY `office_id` (`office_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uniq_username` (`username`), ADD UNIQUE KEY `uniq_email` (`email`);

--
-- Indexes for table `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uniq_token` (`token`), ADD KEY `fk_user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `item_stocks`
--
ALTER TABLE `item_stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `office_budgets`
--
ALTER TABLE `office_budgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_tokens`
--
ALTER TABLE `user_tokens`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
