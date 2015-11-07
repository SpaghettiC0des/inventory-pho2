-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2015 at 10:03 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Generic', 'Cheap and effective', '2015-10-24 21:39:32', '2015-10-24 21:39:32'),
(2, 'Anti-deppressant', 'Blahblahbalh', '2015-10-26 06:05:53', '2015-10-26 06:05:53'),
(3, 'Infants', NULL, '2015-10-26 07:25:57', '2015-10-26 07:25:57'),
(4, 'Tablets', NULL, '2015-10-26 07:30:04', '2015-10-26 07:30:04'),
(5, 'Test', 'asjkdflkasdf', '2015-10-26 07:31:31', '2015-10-26 07:31:31'),
(6, 'New Stocks', 'test', '2015-10-26 07:32:36', '2015-10-26 07:32:36'),
(7, 'Teens', 'testasdfasdf', '2015-10-26 07:33:21', '2015-10-26 07:33:21'),
(8, 'Vitamins', NULL, '2015-10-26 11:33:29', '2015-10-26 11:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Vigan City', '2015-10-26 06:10:43', '2015-10-26 06:10:43'),
(2, 'Candon City', '2015-10-26 06:47:34', '2015-10-26 06:47:34'),
(3, 'ABC', '2015-10-27 06:20:54', '2015-10-27 06:20:54'),
(4, 'latest', '2015-10-27 06:21:46', '2015-10-27 06:21:46'),
(5, 'Auto push', '2015-10-27 06:23:52', '2015-10-27 06:23:52'),
(6, 'ABC AUTO push', '2015-10-27 06:39:58', '2015-10-27 06:39:58'),
(7, 'asdfsdfa', '2015-10-27 06:40:59', '2015-10-27 06:40:59'),
(8, 'ayasdfasdfad', '2015-10-27 06:42:09', '2015-10-27 06:42:09'),
(9, 'tesafasdfasdf', '2015-10-27 06:42:29', '2015-10-27 06:42:29'),
(10, 'test auto', '2015-10-27 06:42:47', '2015-10-27 06:42:47'),
(11, 'asdasdfasdfadsssssssssssssss', '2015-10-27 06:44:28', '2015-10-27 06:44:28'),
(12, 'Auto blah', '2015-10-27 07:29:10', '2015-10-27 07:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL,
  `supplier_id` int(10) unsigned DEFAULT NULL,
  `category_id` int(11) unsigned DEFAULT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cost` double NOT NULL,
  `price` double NOT NULL,
  `image_file_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expiration` date NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `supplier_id`, `category_id`, `code`, `name`, `quantity`, `unit`, `cost`, `price`, `image_file_name`, `expiration`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'a-00-00001', 'Paracetamol - generica', 20, 'Blisters', 300, 12.5, NULL, '2016-01-22', NULL, 0, '2015-10-24 21:42:29', '2015-10-26 03:41:07'),
(2, NULL, 1, 'a-00-00111', 'Pain Reliver - Rhea', 1, 'Box', 2400, 30, NULL, '2016-05-12', 'Test', 0, '2015-10-24 21:46:26', '2015-10-26 03:41:35'),
(3, NULL, 1, 'S-93-99940', 'Sleeping Pills', 34, 'Boxes', 6998, 67.4, NULL, '2016-08-19', 'Makes you sleep', 0, '2015-10-26 04:00:57', '2015-10-26 11:30:12'),
(4, NULL, 3, 'T-10-03834', 'Tiki-tiki', 50, 'Boxes', 19344.7, 57.5, NULL, '2016-10-10', 'Vitamins for babies', 0, '2015-10-26 11:28:37', '2015-10-26 11:30:12'),
(5, NULL, 8, 'C-92-03894', 'Centrum', 10, 'Boxes', 5409, 129.8, NULL, '2019-05-22', NULL, 0, '2015-10-26 11:35:07', '2015-10-26 11:35:07'),
(6, NULL, 1, 'h-45-47654', 'DSfasdfa', 8, 'Bottles', 890700, 500, 'acne-set_thumb.JPG', '2017-02-14', 'asdfasdfasdfasdf', 0, '2015-10-27 08:08:02', '2015-10-27 08:08:02'),
(7, 2, 6, 'B-34-05098', 'Vitamins', 29, 'Boxes', 13456, 500, 'kojic_acid_soap_thumb.jpg', '2019-06-11', 'Blahalsdfjalsk', 0, '2015-10-28 06:17:44', '2015-10-28 06:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `item_stocks`
--

CREATE TABLE IF NOT EXISTS `item_stocks` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `expiration` date DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_stocks`
--

INSERT INTO `item_stocks` (`id`, `item_id`, `purchase_id`, `expiration`, `quantity`, `unit`) VALUES
(1, 1, 1, '2016-03-09', 1234, 'Box');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `district_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Main Office - 1', '2015-10-26 06:27:13', '2015-10-26 06:27:13'),
(2, 2, 'Candon Branch - 1', '2015-10-28 06:42:14', '2015-10-28 06:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `office_budgets`
--

CREATE TABLE IF NOT EXISTS `office_budgets` (
  `id` int(11) NOT NULL,
  `office_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `amount` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `office_budgets`
--

INSERT INTO `office_budgets` (`id`, `office_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(1, 2, '2015-10-30', 123212, '2015-10-30 08:09:19', '2015-10-30 08:16:09'),
(3, 1, '2016-02-01', 100000, '2015-10-30 08:30:46', '2015-10-30 08:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(11) NOT NULL,
  `reference_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `supplier_id` int(11) unsigned NOT NULL,
  `items` text COLLATE utf8_unicode_ci NOT NULL,
  `grand_total` float DEFAULT NULL,
  `status` enum('Received','Pending','Ordered') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `reference_no`, `datetime`, `supplier_id`, `items`, `grand_total`, `status`, `created_at`, `updated_at`) VALUES
(1, 'g4-657-6556', '2015-10-29 04:22:30', 1, '[{"code":"B-34-05098","name":"Vitamins","quantity":"48","price":"500","subTotal":"24000.00"},{"code":"a-00-00001","name":"Paracetamol - generica","quantity":"85","price":"12.5","subTotal":"1062.50"}]', NULL, 'Received', '2015-10-29 08:22:36', '2015-10-29 08:24:55'),
(2, 'g3-454-3232', '2015-10-29 04:25:00', 1, '[{"code":"C-92-03894","name":"Centrum","quantity":"6","price":"129.8","subTotal":"778.80"},{"code":"S-93-99940","name":"Sleeping Pills","quantity":"12","price":"67.4","subTotal":"808.80"}]', NULL, 'Received', '2015-10-29 08:25:21', '2015-10-29 08:25:21'),
(3, 'a4-544-5454', '2015-10-30 05:04:00', 3, '[{"code":"T-10-03834","name":"Tiki-tiki","expiration_date":"2016-01-19T09:03:57.406Z","quantity":"36","price":"57.5","subTotal":"2070.00"},{"code":"a-00-00111","name":"Pain Reliver - Rhea","expiration_date":"2016-03-16T09:04:10.023Z","quantity":"27","price":"30","subTotal":"810.00"}]', NULL, 'Ordered', '2015-10-30 09:04:32', '2015-10-30 09:04:32'),
(4, 'A1-246-6446', '2015-11-03 02:24:00', 2, '[{"code":"T-10-03834","name":"Tiki-tiki","expiration_date":"2015-11-03T06:24:57.248Z","quantity":"10","price":"57.5","subTotal":"575.00"},{"code":"S-93-99940","name":"Sleeping Pills","expiration_date":"2015-12-25T06:25:16.886Z","quantity":"26","price":"67.4","subTotal":"1752.40"}]', 2327.4, 'Received', '2015-11-03 06:25:52', '2015-11-03 06:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL,
  `office_id` int(10) unsigned NOT NULL,
  `items` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `status` enum('Received','Pending','Approved') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Received',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `office_id`, `items`, `datetime`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '[{"code":"a-00-00001","name":"Paracetamol - generica","quantity":"4","price":"12.5","subTotal":"50.00"},{"code":"S-93-99940","name":"Sleeping Pills","quantity":"4","price":"67.4","subTotal":"269.60"}]', '2015-10-30 03:32:00', 'Received', '2015-10-30 07:33:07', '2015-10-30 07:40:14'),
(2, 2, '[{"code":"a-00-00001","name":"Paracetamol - generica","quantity":"10","price":"12.5","subTotal":"125.00"},{"code":"a-00-00111","name":"Pain Reliver - Rhea","quantity":"10","price":"30","subTotal":"300.00"},{"code":"S-93-99940","name":"Sleeping Pills","quantity":"8","price":"67.4","subTotal":"539.20"}]', '2015-10-30 04:32:00', 'Received', '2015-10-30 08:32:46', '2015-10-30 08:32:46');

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
(1, 2),
(2, 2),
(4, 2),
(5, 2);

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
(1, 'system_default', '{"_name":"Inventory PHO"}', '2015-10-29 05:44:58', '2015-10-29 05:44:58');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `representative`, `email`, `contact_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'NIDO\r\n', 'Karl', 'nido@ph.com', '2394-8230-9472', 'Quezon City', '2015-10-26 07:39:22', '2015-10-26 07:43:52'),
(2, 'LACTUM', 'juan', 'juan@test.com', '1290-4102-9834', 'Bantay, Ilocos Sur', '2015-10-26 07:47:34', '2015-10-26 07:47:34'),
(3, 'New Company', 'newRep', 'new@gmmm.com', '0927-2839-7289', 'San Juan, Ilocos Sur', '2015-10-26 07:48:54', '2015-10-26 07:48:54'),
(4, 'Generic Meds', 'Karl', 'generic@test.com', '0934-7389-2374', 'Vigan City Ilocos', '2015-10-27 08:22:28', '2015-10-27 08:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reference_no` varchar(100) NOT NULL,
  `office_id` int(11) unsigned NOT NULL,
  `items_list` text NOT NULL,
  `status` enum('Received','Pending','Ordered') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL,
  `email` varchar(127) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` char(50) NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `logins`, `last_login`) VALUES
(1, 'iventoryPHO@gmail.com', 'admin', '08dd74724b76acb94835518b1f5cf6d2f0a40d8e3bf5447bfd', 23, 1446530735),
(2, 'asd@fasdk.com', 'asdf', '3901abed9ba09b5dffc2cab3d9cd485dc46a50e42b44871c8a', 0, NULL),
(4, 'superuser.design@gmail.com', 'SuperUser', '00c2d236ee415360f59a3c57ccd1edb5d06b6a4ac53a344d4e', 0, NULL),
(5, 'test@test.com', 'admin2', '08dd74724b76acb94835518b1f5cf6d2f0a40d8e3bf5447bfd', 1, 1446021061),
(6, 'asldkfj@gm.com', 'testagain', 'b281a009ec6e044d2d41414f66d2e674f8a328a9ca40b1bfa1', 0, NULL),
(7, 'test@g.com', 'test', 'ebdc90b34fa2456ddfb9d53cbfc26a53befa9670ba71eb8646', 0, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_tokens`
--

INSERT INTO `user_tokens` (`id`, `user_id`, `user_agent`, `token`, `created`, `expires`) VALUES
(1, 1, '51c3e4402fb05d241e86d797dbc19f28cc69ac34', 'Bh3stMWOVzqWVUOjxbET1ri7jHwc6a5k', 1446096594, 1447306194);

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
  ADD PRIMARY KEY (`id`), ADD KEY `supplier_id` (`supplier_id`,`category_id`), ADD KEY `supplier_id_2` (`supplier_id`,`category_id`), ADD KEY `items_catgory_id_fk` (`category_id`);

--
-- Indexes for table `item_stocks`
--
ALTER TABLE `item_stocks`
  ADD PRIMARY KEY (`id`), ADD KEY `item_id` (`item_id`), ADD KEY `purchase_id` (`purchase_id`);

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
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `item_stocks`
--
ALTER TABLE `item_stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `office_budgets`
--
ALTER TABLE `office_budgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_tokens`
--
ALTER TABLE `user_tokens`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
ADD CONSTRAINT `items_catgory_id_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
ADD CONSTRAINT `items_supplier_id_fk` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

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
