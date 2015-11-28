-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2015 at 08:40 AM
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
(1, 'Generic23', 'Cheap and effective', '2015-10-25 05:39:32', '2015-10-25 05:39:32'),
(2, 'Anti-deppressant', 'Depress', '2015-10-26 14:05:53', '2015-10-26 14:05:53'),
(3, 'Infants', NULL, '2015-10-26 15:25:57', '2015-10-26 15:25:57'),
(4, 'Tablets', NULL, '2015-10-26 15:30:04', '2015-10-26 15:30:04'),
(5, 'Test', 'asjkdflkasdf', '2015-10-26 15:31:31', '2015-10-26 15:31:31'),
(6, 'New Stocksqwqwqw', 'test', '2015-10-26 15:32:36', '2015-10-26 15:32:36'),
(7, 'Teens', 'testasdfasdf', '2015-10-26 15:33:21', '2015-10-26 15:33:21'),
(9, 'Kids', '\nasdfsadf', '2015-11-04 11:55:16', '2015-11-04 11:55:16'),
(10, 'Metabolic Agents', 'Metabolic agents are substances capable of producing an effect on the sum of the chemical and physical changes occurring in tissue, consisting of those reactions that convert small molecules into large (anabolism), and those reactions that convert large molecules into small (catabolism ).', '2015-11-06 16:53:20', '2015-11-06 16:53:20'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

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
(14, 'San Vicente123123', '2015-11-05 14:37:00', '2015-11-05 14:37:00'),
(15, 'Update test', '2015-11-07 13:10:33', '2015-11-07 13:10:33'),
(24, 'qvwrqvwrqwr', '2015-11-23 10:59:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_data` longtext NOT NULL,
  `subject` longtext NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `notif_viewed` tinyint(2) NOT NULL,
  `email_viewed` tinyint(2) NOT NULL,
  `email_deleted` tinyint(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Table for emails' AUTO_INCREMENT=12 ;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `email_data`, `subject`, `sender_id`, `receiver_id`, `notif_viewed`, `email_viewed`, `email_deleted`, `created_at`) VALUES
(1, 'dfgdfgdfg', 'vadasasd', 5, 1, 1, 1, 0, '2015-11-27 14:16:55'),
(2, 'fdsdfsdsdf', 'fghfghfg', 5, 1, 1, 1, 0, '2015-11-27 14:16:55'),
(3, 'bnmbnmbnbnm', 'jghjghjghjgh', 5, 1, 1, 1, 0, '2015-11-27 14:16:55'),
(4, 'Docudrama and mockumentary[edit]\r\nIn contrast, docudrama is usually a fictional and dramatized recreation[16] of factual events in form of a documentary, at a time subsequent to the "real" events it portrays. A docudrama is often confused with docufiction when drama is considered interchangeable with fiction (both words meaning the same). Typically however, "docudrama" refers specifically to telefilms or other television media recreations that dramatize certain events often with actors.\r\nA mockumentary (etymology: mock documentary)[17] is also a film or television show in which fictitious events are presented in documentary format, sometimes a recreation of factual events after they took place or a comment on current events, typically satirical, comedic or even dramatic[18] (see genres: drama versus comedy and tragedy). Portraying events at an ulterior time and basically using fictional narrative such as docudrama, it should not be confused with docufiction as well.\r\nOrigins[edit]\r\nThe term involves a way of making films already practiced by such authors as Robert Flaherty, one of the fathers of documentary,[19][20] and Jean Rouch, later in the 20th century.\r\nBeing both fiction and documentary,[21] docufiction is a hybrid genre,[22] raising ethical problems[23][24][25][26][27][28][29] concerning truth, since reality may be manipulated and confused with fiction (see Ethics at creative non-fiction).\r\nIn the domain of visual anthropology, the innovating role of Jean Rouch[30] allows one to consider him as the father of a subgenre called ethnofiction.[31][32] This term means: ethnographic documentary film with natives who play fictional roles. Making them play a role about themselves will help portray reality, which[33] will be reinforced with imagery. A non ethnographic documentary with fictional elements uses the same method and, for the same reasons, may be called docufiction.\r\nFirst docufictions by country[edit]\r\n1926: United States - Moana[34] Robert Flaherty,[35]\r\n1930: Portugal - Maria do Mar [36] by Leitão de Barros\r\n1932: France - L''or des mers [37] by Jean Epstein\r\n1948: Italy - La Terra Trema by Luchino Visconti\r\n1952: Japan - Children of Hiroshima by Kaneto Shindo\r\n1963: Canada - Pour la suite du monde (Of Whales, the Moon and Men) by Pierre Perrault and Michel Brault\r\n1981: Morocco - Transes (fr) by Ahmed El Maânouni\r\n1988: Guiné-Bissau - Mortu Nega (Death denied) by Flora Gomes\r\n1990: Iran - Close-up by Abbas Kiarostami\r\n1991: Finland - Zombie and the Ghost Train by Mika Kaurismäki (See review at NYT [38])\r\n2002: Brasil - City of God by Fernando Meirelles and Kátia Lund\r\n2005: Iraq - Underexposure by Oday Rasheed\r\nOther notable docufictions (until 2000)[edit]\r\n1931: Tabu by Robert Flaherty and F.W. Murnau\r\n1934: Man of Aran by Robert Flaherty\r\n1942: Ala-Arriba! (film) by Leitão de Barros\r\n1948: Louisiana Story by Robert Flaherty\r\n1956: On the Bowery by Lionel Rogosin\r\n1958: Moi, un noir (Me, A Black Man) by Jean Rouch\r\n1958/59 Indie Matra Bhumi (The Motherland)[39][40][41] by Roberto Rossellini, released[42] 2007\r\n1959: Come Back, Africa by Lionel Rogosin\r\n1961: La pyramide humaine (The Human Pyramid) [43] by Jean Rouch\r\n1962: Rite of Spring [44] by Manoel de Oliveira\r\n1964: Belarmino by Fernando Lopes\r\n1967: David Holzman''s Diary by Jim McBride\r\n1973: Trevico-Torino (viaggio nel Fiat-Nam)[45] by Ettore Scola\r\n1974: Orderers, by Michel Brault\r\n1974: Montreal Main, by Frank Vitale\r\n1976: Changing Tides, by Ricardo Costa\r\n1976: People from Praia da Vieira[46] by António Campos\r\n1976: Trás-os-Montes[47] by António Reis and Margarida Cordeiro[48]\r\n1979: Bread and Wine by Ricardo Costa\r\n1982: Ana[49] by António Reis and Margarida Cordeiro\r\n1982: After the Axe, by Sturla Gunnarsson\r\n1990: The Company of Strangers by Cynthia Scott\r\n1991: Life, and Nothing More by Abbas Kiarostami\r\nSee more at Docufiction films (Categories)\r\nHybrid pictures[edit]\r\nFilmic depictions of ethnic groups became a current practice since Flaherty shot Nanook of the North in 1922 (the first feature-length documentary in film history, a docudrama) and since, under its influence, Jean Rouch pioneered ethnofiction with Moi un noir (1958, foreshadowing the French New Wave) and coined this term as a new genre in visual anthropology. Subsequently, the concept of ethnofiction (ethnography+fiction) would exceed scientific practice and, by analogy, give rise to a wider designation (docufiction: documentary+fiction) in which it would be ranged as subgenre. Such designation would then be used to classify films that early emerged in several countries, directly under Flaherty’s influence or indirectly by occasional resemblance, in both cases with no correlation and with significant differences in form and contents. On one hand hybridity became one of the criteria that joined documentary and fiction in a single concept.[50] On the other hand persons playing their own roles in real life and in real time is another that gave basement to it. Both these requirements are closely associated with two other in the practice of docufiction: 1. ethics and aesthetics,[51] i.e., fidelity to truth and reality,[52][53] 2. signifiers and connotations, i.e., forms of expression picturing facts in an illustrative or allusive way, unveiling facets of human life.\r\nSee also[edit]\r\nList of docufiction films\r\nEthnofiction\r\nPseudo-documentary\r\nReferences[edit]\r\nJump up ^ Reality and documentary – at Six Types Of Documentary, article by Girish Shambu (blog)\r\nJump up ^ An Introduction to Genre Theory by Daniel Chandler at Aberystwyth University\r\nJump up ^ Il difficile rapporto tra fiction e non fiction che si concretizza nella docu-fiction (The difficult relationship between fiction and non-fiction patent in docufiction ) - thesis in Italian by Laura Marchesi, Faculty of Communication Sciences (Università degli Studi di Pavia) at Tesionline, 2005/06\r\nJump up ^ , Docufiction in the Digital Age – Thesis by Tay Huizhen, National University of Singapore\r\nJump up ^ What is docufiction? – See Section II, pages 37 to 75 (four chapters) of the thesis by Prof. Theo Mäusli\r\nJump up ^ Indie Matra Bhumi (The Motherland) – Cannes Film Festival\r\nJump up ^ Ablel Ferrara’s docufiction – Venice Film Festival\r\nJump up ^ The Savage Eye: White Docu-Fiction & Black Reality at Tribeca Film Festival\r\nJump up ^ Brian De Palma''s On His Iraq Docu-Fiction Comeback at The Huffington Post – Toronto Film Festival and Venice Film Festival\r\nJump up ^ Darius Mehrjui’s film Diamond 33 – Venice Film Festival\r\nJump up ^ New Film Events – London Short Film Festival\r\nJump up ^ Oscilloscope ''Howl'' for Off Beat Docu-Fiction Sundance Selection at Ion Cinema\r\nJump up ^ Docufiction at several film festivals\r\nJump up ^ See: Hybrids (fiction/nonfiction films) at External links\r\nJump up ^ Tate Triennial 2009: Altermodern - ''Docufiction''\r\nJump up ^ See Docudrama: the real (his)tory Confusion of genres – Page 2 on the thesis by Çiçek Co?kun (New York University School of Education)\r\nJump up ^ From "mock + documentary" - definition at The Free Dictionary\r\nJump up ^ A television programme or film which takes the form of a serious documentary in order to satirize its subject. - definition at The Free Dictionary and Dictionary.com\r\nJump up ^ Definition of documentary – New Frontiers in American documentary (American Studies at The University of Virginia)\r\nJump up ^ The Impulse of Documentary-Fiction - Paper at Transart Institute\r\nJump up ^ (NON)FICTION AND THE VIEWER: RE-INTERPRETING THE DOCUMENTARY FILM – Paper by Tammy Stone, Avila University\r\nJump up ^ See hybrid genre – page 50, thesis on docufiction by Prof. Theo Mäusli\r\nJump up ^ Open-ended Realities - article by Luciana Lang at Latineos\r\nJump up ^ The appeal of hybrid documentary forms in West Africa at Project Muse\r\nJump up ^ Ethics and Documentary Filmmaking – Article by Marty Lucas at Center for Social Media (American University in Washington, D.C)\r\nJump up ^ On Ethics and Documentary: A Real and Actual Truth – Article by Garnet C. Butchart at Cultural Studies Program, Trent University, Peterborough, Ontario, Canada, published University of South Florida\r\nJump up ^ What to Do About Documentary Distortion? Toward a Code of Ethics – Article by Bill Nichols at Documentary.org\r\nJump up ^ Documentary Film Prompts-Ethics in Documentary/Fiction vs. Documentary – Paper by Ardavon Naimi at University of Texas at Dallas\r\nJump up ^ Ethics and Filmmaking in Developing Countries at Unite For Sight\r\nJump up ^ Jean Rouch 1917-2004, A Valediction - Article by Michael Eaton at Rouge\r\nJump up ^ Glossary at MAITRES_FOUS.NET\r\nJump up ^ Jean Rouch and the Genesis of Ethnofiction, thesis by Brian Quist, Long Island University\r\nJump up ^ "Ethnofiction: drama as a creative research practice in ethnographic film." Journal of Media Practice 9, no. 3(2008), eScholarID:1b5648, article by Johannes Sjöberg\r\nJump up ^ Why ''Moana,'' the First Docufiction in History, Deserves a New Life - article by Laya Maheshwari at Indiewire, July 3, 2014\r\nJump up ^ Note, however, that Flaherty''s earlier film, Nanook of the North from 1922, incorporates many docufiction elements, including the "casting" of locals into fictitious "roles" and family relationships, as well as anachronistic hunting scenes.\r\nJump up ^ See Maria do Mar at IMdb\r\nJump up ^ See L''Or des mers at IMdb\r\nJump up ^ Zombie and the Ghost Train (1991)Review/Film Festival; How a Zombie Became One With Alcohol and Self-Pity\r\nJump up ^ "Chicago Cinema Forum". Cine-file.info. 2007-08-29. Retrieved 2012-08-29.\r\nJump up ^ India: Matri Bhumi – Article by Doug Cummings at F i l m j o u r n e y (March 18th, 2007)\r\nJump up ^ Digitally cleaned ''India, Matri Bhumi'' screened at Vienna film festival – Article at IBN Live\r\nJump up ^ Christopher, Rob (2007-08-29). "Q: What Do You Call a Movie That''s Getting Its Chicago Premiere 48 Years After Being Made?". Chicagoist. Retrieved 2012-08-29.\r\nJump up ^ The Human Pyramid at IMdb.\r\nJump up ^ See Acto da Primavera\r\nJump up ^ See Trevico-Torino (viaggio nel Fiat-Nam at IMdb\r\nJump up ^ See Gente da Praia da Vieira\r\nJump up ^ Trás-os-Montes at Harvard Film Archive\r\nJump up ^ António Reis and Margarida Cordeiro at UCLA\r\nJump up ^ Rep Pick: Ana – Review by Aaron Cutler at The L Magazine\r\nJump up ^ Exploring Objectivity in Docufiction Filmmaking through the Concept of Hybridity – Abstract at Eleanorforder, August 7, 2014\r\nJump up ^ Aesthetics defined by Encyclopedia Britanica\r\nJump up ^ Reality in the Age of Aesthetics – Article at Frieze, Issue 114, April 2008\r\nJump up ^ Documentary-for-the-Other: Relationships, Ethics and (Observational) Documentary – Article by Kate Nash, Journal of Mass Media Ethics, 26:224–239, 2011', '345345', 5, 1, 1, 1, 0, '2015-11-27 14:16:55'),
(7, 'qvwrqvwrqvrqwrvqwr', 'vqrwvqwrvq', 5, 1, 1, 1, 0, '2015-11-27 14:16:55'),
(8, 'fgdfgdfg', 'vqwrvqwasdghj', 5, 1, 1, 1, 0, '2015-11-27 14:16:48'),
(9, 'jkhjkhjk', 'qweqweqw', 5, 1, 1, 1, 0, '2015-11-27 14:16:55'),
(10, 'test', 'qqwrqwrqwr', 1, 5, 0, 0, 0, '2015-11-26 16:25:49'),
(11, 'kjshkfjkdfjsf', 'lksdaskjdakjh', 5, 1, 1, 1, 0, '2015-11-27 15:05:59');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `category_id`, `code`, `name`, `quantity`, `unit`, `cost`, `price`, `image_file_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(9, 2, 'd-34444444', 'Test item 1', 1, 'Bottles', 405, 567, '', 'Test', 0, '2015-11-04 11:56:07', '2015-11-04 11:56:07'),
(10, 3, 'd-45-67667', 'Diaper', 1, 'Pack', 145.7, 155, 'assets/uploads/items/items-564be81bcf5dc.jpeg', NULL, 0, '2015-11-04 12:04:21', '2015-11-04 12:04:21'),
(11, 1, 'G-25-46578', 'Multivitamins + Iron ', 1, 'Boxes', 540, 600, 'assets/uploads/items/items-564be81bcf5dc.jpeg', NULL, 0, '2015-11-04 13:03:43', '2015-11-04 13:03:43'),
(12, 9, 'P-34-58923', 'Calpol', 1, 'Box', 3467, 67.7, 'assets/uploads/items/items-564be81bcf5dc.jpeg', 'Fever Med', 0, '2015-11-04 16:09:53', '2015-11-04 16:09:53'),
(13, 1, 'G-23-46558', 'Acetaminophen', 1, 'Box', 500, 678, 'assets/uploads/items/items-564be81bcf5dc.jpeg', 'Acetaminophen is a pain reliever and a fever reducer.', 0, '2015-11-05 15:12:04', '2015-11-05 15:12:04'),
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
(28, 5, 'f-45-64564', 'qqvrqw', 1, 'qwert', 56, 34, 'assets/uploads/items/items-564be81bcf5dc.jpeg', 'vqwrqvrqw', 0, '2015-11-18 10:56:18', '0000-00-00 00:00:00');

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
(27, 11, 96, '2015-11-27', 11, 5940),
(28, 10, 96, '2015-12-01', 1, 145.7),
(29, 11, 97, '2015-12-06', 7, 3780),
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Logs for Inventory' AUTO_INCREMENT=171 ;

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
(53, 'Inventory PHO', 1, 1, 'Added New Office named cqwrcqwr', '2015-11-21 14:39:09', '2015-11-21'),
(54, 'Inventory PHO', 1, 1, 'Deleted District named vqwrvqwr.', '2015-11-21 15:09:58', '2015-11-21'),
(55, 'Inventory PHO', 1, 1, 'Deleted District named vqrwqvwrqv.', '2015-11-21 15:10:02', '2015-11-21'),
(56, 'Inventory PHO', 1, 1, 'Deleted District named vqwrvqwrqvwr.', '2015-11-21 15:10:11', '2015-11-21'),
(57, 'Inventory PHO', 1, 1, 'Deleted District named vqwrvqwrq.', '2015-11-21 15:10:13', '2015-11-21'),
(58, 'Inventory PHO', 1, 1, 'Added New District named vqwrqvwr.', '2015-11-21 15:19:01', '2015-11-21'),
(59, 'Inventory PHO', 1, 2, 'Added New Office Budget.', '2015-11-21 15:19:44', '2015-11-21'),
(60, 'Inventory PHO', 1, 1, 'Added New District named vqwrqvr.', '2015-11-21 15:24:13', '2015-11-21'),
(61, 'Inventory PHO', 1, 1, 'Added New District named vqwrq.', '2015-11-21 15:25:08', '2015-11-21'),
(62, 'admin', 1, 3, 'Updated the System Settings', '2015-11-21 15:35:31', '2015-11-21'),
(63, 'admin', 1, 3, 'Updated the System Settings', '2015-11-21 15:35:37', '2015-11-21'),
(64, 'Inventory PHO', 1, 1, 'Added New Request', '2015-11-21 15:36:55', '2015-11-21'),
(65, 'Inventory PHO', 1, 1, 'Added New Transaction.', '2015-11-21 15:43:46', '2015-11-21'),
(66, 'admin', 1, 3, 'Updated the System Settings', '2015-11-23 10:06:25', '2015-11-23'),
(67, 'admin', 1, 3, 'Updated the System Settings', '2015-11-23 10:08:58', '2015-11-23'),
(68, 'Inventory PHO', 1, 2, 'Deleted a Office Budget for cqwrcqwr.', '2015-11-23 10:18:25', '2015-11-23'),
(69, 'Inventory PHO', 1, 2, 'Deleted a Office Budget for cqwrcqwr.', '2015-11-23 10:18:28', '2015-11-23'),
(70, 'Inventory PHO', 1, 2, 'Deleted a Office Budget for Main Office - 1.', '2015-11-23 10:18:31', '2015-11-23'),
(71, 'Inventory PHO', 1, 2, 'Deleted a Office Budget for Main Office - 1.', '2015-11-23 10:18:57', '2015-11-23'),
(72, 'Inventory PHO', 1, 2, 'Deleted a Office Budget for Main Office - 1.', '2015-11-23 10:19:01', '2015-11-23'),
(73, 'Inventory PHO', 1, 2, 'Deleted a Office Budget for SDO Office 1.', '2015-11-23 10:28:14', '2015-11-23'),
(74, 'Inventory PHO', 1, 1, 'Deleted District named vqwrq.', '2015-11-23 10:28:41', '2015-11-23'),
(75, 'Inventory PHO', 1, 2, 'Deleted a Office Budget for Main Office - 1.', '2015-11-23 10:33:21', '2015-11-23'),
(76, 'Inventory PHO', 1, 1, 'Deleted Category named asdasdas123.', '2015-11-23 10:39:02', '2015-11-23'),
(77, 'Inventory PHO', 1, 1, 'Deleted Category named asdasdasd123.', '2015-11-23 10:42:24', '2015-11-23'),
(78, 'Inventory PHO', 1, 1, 'Updated a Category. Category Name from Anti-deppressant to Anti-deppressant23.', '2015-11-23 10:42:52', '2015-11-23'),
(79, 'Inventory PHO', 1, 1, 'Updated a Category. Category Name from Anti-deppressant23 to Anti-deppressant.', '2015-11-23 10:43:02', '2015-11-23'),
(80, 'Inventory PHO', 1, 1, 'Added New District named vqwrvqwrqv.', '2015-11-23 10:56:57', '2015-11-23'),
(81, 'Inventory PHO', 1, 1, 'Deleted District named vqwrvqwrqv.', '2015-11-23 10:58:12', '2015-11-23'),
(82, 'Inventory PHO', 1, 1, 'Added New District named qvwrqvwrqwr.', '2015-11-23 10:59:15', '2015-11-23'),
(83, 'Inventory PHO', 1, 1, 'Deleted District named vqwrqvwr.', '2015-11-23 10:59:25', '2015-11-23'),
(84, 'Inventory PHO', 1, 1, 'Updated a Category. ', '2015-11-23 11:04:48', '2015-11-23'),
(85, 'Inventory PHO', 1, 1, 'Updated a Category. Category Name from Vitamins to Vitamins232.', '2015-11-23 11:04:53', '2015-11-23'),
(86, 'Inventory PHO', 1, 1, 'Updated a Category. Category Name from Vitamins232 to Vitamins.', '2015-11-23 11:05:04', '2015-11-23'),
(87, 'Inventory PHO', 1, 1, 'Updated a Category. Category Name from Generic to Generic23.', '2015-11-23 11:05:09', '2015-11-23'),
(88, 'Inventory PHO', 1, 1, 'Deleted Category named Vitamins.', '2015-11-23 11:07:12', '2015-11-23'),
(89, 'Inventory PHO', 1, 1, 'Added New Category named qwrqwr', '2015-11-23 11:07:40', '2015-11-23'),
(90, 'Inventory PHO', 1, 1, 'Deleted Category named Test.', '2015-11-23 11:07:53', '2015-11-23'),
(91, 'Inventory PHO', 1, 1, 'Deleted Category named qwrqwr.', '2015-11-23 11:08:18', '2015-11-23'),
(92, 'Inventory PHO', 1, 1, 'Deleted Item named .', '2015-11-23 11:14:17', '2015-11-23'),
(93, 'Inventory PHO', 1, 1, 'Deleted Item named .', '2015-11-23 11:15:17', '2015-11-23'),
(94, 'Inventory PHO', 1, 1, 'Deleted Item named wqvrqvwr.', '2015-11-23 11:16:10', '2015-11-23'),
(95, 'Inventory PHO', 1, 1, 'Added New Supplier named vqwrvqwrqvwr', '2015-11-23 11:26:42', '2015-11-23'),
(96, 'Inventory PHO', 1, 1, 'Added New Supplier named vqwrvqdfgdfgdfg', '2015-11-23 11:27:09', '2015-11-23'),
(97, 'Inventory PHO', 1, 1, 'Added New Supplier named jhjkhjkhjk', '2015-11-23 11:27:36', '2015-11-23'),
(98, 'Inventory PHO', 1, 1, 'Deleted Supplier named vrwrvqwrvqwrqvwr.', '2015-11-23 11:27:46', '2015-11-23'),
(99, 'Inventory PHO', 1, 1, 'Added New Supplier named dfcvbvbvb', '2015-11-23 11:29:43', '2015-11-23'),
(100, 'Inventory PHO', 1, 1, 'Updated a Supplier. Supplier Name from vqwrvqwrqvwr to vqwrvqwrqvwr12312312.', '2015-11-23 11:29:55', '2015-11-23'),
(101, 'Inventory PHO', 1, 1, 'Added New Office named gdfgdfdfg', '2015-11-23 11:34:25', '2015-11-23'),
(102, 'Inventory PHO', 1, 1, 'Added New Office named fgrtyrtyrt', '2015-11-23 11:34:38', '2015-11-23'),
(103, 'Inventory PHO', 1, 1, 'Added New Office named ghjgtyrty', '2015-11-23 11:34:45', '2015-11-23'),
(104, 'Inventory PHO', 1, 1, 'Added New Office named yuyutytyu', '2015-11-23 11:34:52', '2015-11-23'),
(105, 'Inventory PHO', 1, 1, 'Added New Office named erterterert', '2015-11-23 11:35:04', '2015-11-23'),
(106, 'Inventory PHO', 1, 1, 'Added New Office named ebrbtbeber', '2015-11-23 11:35:10', '2015-11-23'),
(107, 'Inventory PHO', 1, 1, 'Added New Office named jhghjghjghj', '2015-11-23 11:35:16', '2015-11-23'),
(108, 'Inventory PHO', 1, 1, 'Deleted Office named yuyutytyu.', '2015-11-23 11:36:07', '2015-11-23'),
(109, 'Inventory PHO', 1, 1, 'Added New Office named jhghjghj', '2015-11-23 11:37:30', '2015-11-23'),
(110, 'Inventory PHO', 1, 1, 'Deleted Office named SDO Office 1.', '2015-11-23 11:37:44', '2015-11-23'),
(111, 'Inventory PHO', 1, 1, 'Deleted Office named ghjgtyrty.', '2015-11-23 11:37:58', '2015-11-23'),
(112, 'Inventory PHO', 1, 1, 'Added New Request', '2015-11-23 11:41:19', '2015-11-23'),
(113, 'Inventory PHO', 1, 1, 'Added New Request', '2015-11-23 11:42:59', '2015-11-23'),
(114, 'Inventory PHO', 1, 1, 'Added New 2 User.', '2015-11-23 11:43:57', '2015-11-23'),
(115, 'Inventory PHO', 1, 2, 'Deleted a Office Budget for SDO Office 1.', '2015-11-23 13:25:59', '2015-11-23'),
(116, 'Inventory PHO', 1, 2, 'Updated a Office Budget.', '2015-11-23 13:26:55', '2015-11-23'),
(117, 'Inventory PHO', 1, 1, 'Added New Transaction.', '2015-11-23 13:40:23', '2015-11-23'),
(118, 'Inventory PHO', 1, 1, 'Added New 3 User.', '2015-11-23 13:51:38', '2015-11-23'),
(119, 'Inventory PHO', 1, 2, 'Profile Picture was Successfully Updated', '2015-11-23 14:43:44', '2015-11-23'),
(120, 'Inventory PHO', 1, 2, 'Deleted a Office Budget for Main Office - 1.', '2015-11-23 14:46:57', '2015-11-23'),
(121, 'Inventory PHO', 1, 2, 'Deleted a Office Budget for SDO Office 1.', '2015-11-23 14:48:17', '2015-11-23'),
(122, 'Inventory PHO', 1, 2, 'Deleted a Office Budget for Main Office - 1.', '2015-11-23 14:48:37', '2015-11-23'),
(123, 'Inventory PHO', 1, 2, 'Deleted a Office Budget for Main Office - 1.', '2015-11-23 14:48:54', '2015-11-23'),
(124, 'Inventory PHO', 1, 2, 'Deleted a Office Budget for Main Office - 1.', '2015-11-23 14:49:03', '2015-11-23'),
(125, 'Inventory PHO', 1, 1, 'Deleted District named vqwrqvr.', '2015-11-23 14:50:01', '2015-11-23'),
(126, 'Inventory PHO', 1, 1, 'Updated a District. District Name from San Vicente to San Vicente123123.', '2015-11-23 14:54:04', '2015-11-23'),
(127, 'Inventory PHO', 1, 1, 'Added New District named lkajlsdkasd.', '2015-11-23 14:54:59', '2015-11-23'),
(128, 'Inventory PHO', 1, 1, 'Deleted District named Vigan City.', '2015-11-23 14:55:03', '2015-11-23'),
(129, 'Inventory PHO', 1, 1, 'Deleted District named Candon City.', '2015-11-23 14:58:17', '2015-11-23'),
(130, 'Inventory PHO', 1, 1, 'Deleted District named lkajlsdkasd.', '2015-11-23 14:58:21', '2015-11-23'),
(131, 'Inventory PHO', 1, 1, 'Deleted Office named ebrbtbeber.', '2015-11-23 15:08:13', '2015-11-23'),
(132, 'Inventory PHO', 1, 1, 'Updated a Office. ', '2015-11-23 15:08:20', '2015-11-23'),
(133, 'Inventory PHO', 1, 1, 'Deleted Office named SDO Office 1.', '2015-11-23 15:28:06', '2015-11-23'),
(134, 'Inventory PHO', 1, 1, 'Updated a Category. ', '2015-11-23 15:28:23', '2015-11-23'),
(135, 'Inventory PHO', 1, 1, 'Updated a Office. ', '2015-11-23 15:28:29', '2015-11-23'),
(136, 'Inventory PHO', 1, 1, 'Added New Request', '2015-11-23 15:30:21', '2015-11-23'),
(137, 'Inventory PHO', 1, 1, 'Transaction deleted with reference no. .', '2015-11-23 15:38:19', '2015-11-23'),
(138, 'Inventory PHO', 1, 1, 'Transaction deleted with reference no. J3-453-4534.', '2015-11-23 15:38:49', '2015-11-23'),
(139, 'Inventory PHO', 1, 1, 'Added New Transaction.', '2015-11-23 15:57:17', '2015-11-23'),
(140, 'Inventory PHO', 1, 1, 'Added New 3 User.', '2015-11-23 16:02:29', '2015-11-23'),
(141, 'Inventory PHO', 1, 1, 'Request deleted with reference no. K3-453-4534.', '2015-11-23 16:09:49', '2015-11-23'),
(142, 'Inventory PHO', 1, 1, 'Request deleted with reference no. G2-123-1231.', '2015-11-23 16:10:01', '2015-11-23'),
(143, 'Inventory PHO', 1, 1, 'Request deleted with reference no. G2-123-1231.', '2015-11-23 16:17:59', '2015-11-23'),
(144, 'Inventory PHO', 1, 1, 'Item deleted named Test item 1.', '2015-11-24 08:43:16', '2015-11-24'),
(145, 'Inventory PHO', 1, 1, 'Item deleted named Ibuprofen .', '2015-11-24 08:43:22', '2015-11-24'),
(146, 'admin', 1, 3, 'Updated the System Settings', '2015-11-24 14:58:30', '2015-11-24'),
(147, 'Inventory PHO', 1, 1, 'Updated a District. ', '2015-11-24 15:03:18', '2015-11-24'),
(148, 'Inventory PHO', 1, 1, 'Updated an Office. ', '2015-11-24 15:04:16', '2015-11-24'),
(149, 'admin', 1, 3, 'Updated the System Settings', '2015-11-24 15:31:20', '2015-11-24'),
(150, 'Inventory PHO', 1, 1, 'Updated an Office. ', '2015-11-24 16:01:05', '2015-11-24'),
(151, 'Inventory PHO', 1, 2, 'Logged Out from the System.', '2015-11-25 16:57:46', '2015-11-25'),
(152, 'Inventory PHO', 1, 2, 'Logged Out from the System.', '2015-11-26 08:49:27', '2015-11-26'),
(153, 'Inventory PHO', 1, 1, 'Email Sent to: Inventory PHO.', '2015-11-26 10:09:34', '2015-11-26'),
(154, 'Inventory PHO', 1, 2, 'Logged Out from the System.', '2015-11-26 11:13:35', '2015-11-26'),
(155, 'Inventory PHO', 1, 2, 'Logged Out from the System.', '2015-11-26 11:13:42', '2015-11-26'),
(156, 'Renato Go', 8, 2, 'Logged Out from the System.', '2015-11-26 11:14:30', '2015-11-26'),
(157, 'Jeorge', 5, 1, 'Email Sent to Inventory PHO.', '2015-11-26 11:16:44', '2015-11-26'),
(158, 'Jeorge', 5, 1, 'Email Sent to Inventory PHO.', '2015-11-26 11:16:57', '2015-11-26'),
(159, 'Jeorge', 5, 1, 'Email Sent to Inventory PHO.', '2015-11-26 11:17:04', '2015-11-26'),
(160, 'Jeorge', 5, 1, 'Email Sent to Inventory PHO.', '2015-11-26 11:17:12', '2015-11-26'),
(161, 'Jeorge', 5, 2, 'Logged Out from the System.', '2015-11-26 11:17:22', '2015-11-26'),
(162, 'Inventory PHO', 1, 2, 'Logged Out from the System.', '2015-11-26 16:21:56', '2015-11-26'),
(163, 'Jeorge', 5, 1, 'Email Sent to Inventory PHO.', '2015-11-26 16:22:10', '2015-11-26'),
(164, 'Jeorge', 5, 1, 'Email Sent to Inventory PHO.', '2015-11-26 16:22:17', '2015-11-26'),
(165, 'Jeorge', 5, 1, 'Email Sent to Inventory PHO.', '2015-11-26 16:22:23', '2015-11-26'),
(166, 'Jeorge', 5, 2, 'Logged Out from the System.', '2015-11-26 16:22:27', '2015-11-26'),
(167, 'Inventory PHO', 1, 1, 'Email Sent to Jeorge.', '2015-11-26 16:25:49', '2015-11-26'),
(168, 'Inventory PHO', 1, 2, 'Logged Out from the System.', '2015-11-27 15:04:10', '2015-11-27'),
(169, 'Jeorge', 5, 1, 'Email Sent to Inventory PHO.', '2015-11-27 15:04:28', '2015-11-27'),
(170, 'Jeorge', 5, 2, 'Logged Out from the System.', '2015-11-27 15:04:30', '2015-11-27');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `district_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Main Office - 1', '2015-10-26 14:27:13', '2015-10-26 14:27:13'),
(4, 2, 'qvwrqvwr', '2015-11-21 14:38:59', '0000-00-00 00:00:00'),
(5, 2, 'cqwrcqwr', '2015-11-21 14:39:08', '0000-00-00 00:00:00'),
(6, 2, 'gdfgdfdfg', '2015-11-23 11:34:25', '0000-00-00 00:00:00'),
(7, 6, 'fgrtyrtyrt', '2015-11-23 11:34:38', '0000-00-00 00:00:00'),
(10, 1, 'erterterert', '2015-11-23 11:35:04', '0000-00-00 00:00:00'),
(12, 6, 'jhghjghjghj', '2015-11-23 11:35:16', '0000-00-00 00:00:00'),
(13, 6, 'jhghjghj', '2015-11-23 11:37:30', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `office_budgets`
--

INSERT INTO `office_budgets` (`id`, `office_id`, `year`, `amount_given`, `amount_left`, `amount`, `created_at`, `updated_at`) VALUES
(16, 4, '2015', 23253, 17133.6, 0, '2015-11-23 15:29:39', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `reference_no`, `office_id`, `grand_total`, `items`, `datetime`, `status`, `created_at`, `updated_at`) VALUES
(6, '', 1, 34199, '[{"code":"G-23-46558","name":"Acetaminophen","quantity":"12","cost":"500","subTotal":"6000.00"},{"code":"A-28-37282","name":"Citalopram","quantity":"12","cost":"1600","subTotal":"19200.00"},{"code":"G-45-45455","name":"Amitriptyline","quantity":"20","cost":"450","subTotal":"9000.00"}]', '2015-11-06 04:29:00', 'Received', '2015-11-06 16:29:41', '2015-11-06 16:29:41'),
(9, 'J3-453-4534', 1, 1741.6, '[{"code":"d-45-67667","name":"Diaper","quantity":"12","cost":"145.7","subTotal":"1748.40"}]', '2015-11-23 11:40:00', 'Pending', '2015-11-23 11:41:19', '0000-00-00 00:00:00'),
(11, 'J2-345-5675', 4, 0, '[{"code":"d-45-67667","name":"Diaper","quantity":"29","cost":"145.7","subTotal":"4225.30"},{"code":"d-45-67667","name":"Diaper","quantity":"13","cost":"145.7","subTotal":"1894.10"}]', '2015-11-19 03:29:00', 'Pending', '2015-11-23 15:30:21', '0000-00-00 00:00:00');

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
(9, 1),
(10, 1),
(11, 1),
(1, 2),
(2, 2),
(4, 2),
(5, 2),
(9, 2),
(8, 3),
(10, 3),
(11, 3);

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
(1, 'system_default', '{"name":"Inventory PHO","address":"Vigan City, Ilocos Sur","currency":"&#8369;","favicon":"{\\"name\\":\\"Lighthouse.jpg\\",\\"location\\":\\"assets\\\\\\/uploads\\\\\\/favicon\\\\\\/favicon-1-56540a9620973-Lighthouse.jpg\\",\\"extension\\":\\"jpg\\"}","item_expiration":null,"notiftype":"byDay","notifdate":"31"}', '2015-10-29 05:44:58', '2015-11-12 06:15:21');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

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
(9, 'vqwrvqwrqvwr12312312', 'qvwrqvrqwrv', 'qwev@asasd.com', '1233-4534-5345', 'vqwrvqwrvqw', '2015-11-23 11:26:42', '0000-00-00 00:00:00'),
(10, 'vqwrvqdfgdfgdfg', 'ghjghjghj', 'bqwb@olalsd.com', '3453-4534-5345', 'dfsdfsdfsdf', '2015-11-23 11:27:09', '0000-00-00 00:00:00'),
(11, 'jhjkhjkhjk', 'fghfghfgh', 'asdas@asasd.com', '4564-5456-4564', 'ewevwetvwet', '2015-11-23 11:27:36', '0000-00-00 00:00:00'),
(12, 'dfcvbvbvb', 'dfbdfbdfbdfb', 'qwvcrqw@asdg.com', '7834-5674-2323', 'brtbrtbyrty', '2015-11-23 11:29:43', '0000-00-00 00:00:00');

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
  `amount_paid` double NOT NULL,
  `amount_left` double NOT NULL,
  `status` enum('Received','Pending','Ordered') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `office_id` (`office_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `datetime`, `reference_no`, `office_id`, `items_list`, `amount_paid`, `amount_left`, `status`, `created_at`, `updated_at`) VALUES
(3, '2015-11-24 03:56:00', 'J2-345-5675', 4, '', 6119.4, 0, '', '2015-11-23 15:57:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(127) NOT NULL,
  `office_id` int(11) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `office_id`, `username`, `password`, `user_avatar`, `user_information`, `contact_information`, `logins`, `last_login`) VALUES
(1, 'iventoryPHO@gmail.com', 0, 'admin', '08dd74724b76acb94835518b1f5cf6d2f0a40d8e3bf5447bfd', '{"name":"Lighthouse.jpg","location":"assets\\/uploads\\/user-1-5652b5a00973d-Lighthouse.jpg","extension":"jpg"}', '{"fullname":"Inventory PHO","gender":"Male","birthday":"March 5, 1992","mstatus":"Single"}', '{"mobile":"09354658541","email":"email@email.com","twitter":"@kwitter","skype":"inventorypho"}', 112, 1448607877),
(2, 'asd@fasdk.com', 0, 'asdf', '3901abed9ba09b5dffc2cab3d9cd485dc46a50e42b44871c8a', '', '', '', 0, NULL),
(4, 'superuser.design@gmail.com', 0, 'SuperUser', '00c2d236ee415360f59a3c57ccd1edb5d06b6a4ac53a344d4e', '', '', '', 0, NULL),
(5, 'test@test.com', 0, 'admin2', '08dd74724b76acb94835518b1f5cf6d2f0a40d8e3bf5447bfd', '{"name":"Lighthouse.jpg","location":"assets\\/uploads\\/user-1-5652b5a00973d-Lighthouse.jpg","extension":"jpg"}', '{"fullname":"Jeorge","gender":"Male","birthday":"April 23, 1994","mstatus":"Single"}', '{"mobile":"09367433057","email":"jeorgedonato@gmail.com","twitter":"@kwitter","skype":"jeorgejanildonato"}', 7, 1448607856),
(6, 'asldkfj@gm.com', 0, 'testagain', 'b281a009ec6e044d2d41414f66d2e674f8a328a9ca40b1bfa1', '', '', '', 0, NULL),
(7, 'test@g.com', 0, 'test', 'ebdc90b34fa2456ddfb9d53cbfc26a53befa9670ba71eb8646', '', '', '', 0, NULL),
(8, 'office1@gmail.com', 0, 'office1', '08dd74724b76acb94835518b1f5cf6d2f0a40d8e3bf5447bfd', '{"name":"Lighthouse.jpg","location":"assets\\/uploads\\/user-1-5652b5a00973d-Lighthouse.jpg","extension":"jpg"}', '{"fullname":"Renato Go","gender":"Male","birthday":"June 26, 1981","mstatus":"Single"}', '{"mobile":"054655454","email":"renato@gmail.com","twitter":"@renato","skype":"renatogo"}', 12, 1448507629),
(9, 'jeorgedonato@gmail.com', 0, 'jeorge', 'fa08d7e1b1977a67d753e14f0b593dd97d07067ff3752afade', '', '', '', 0, NULL),
(10, 'design@email.com', 1, 'designinteractive', '1e4c42948141111bb26b396f3af7ba3062b3419641ccc01422', '', '', '', 0, NULL),
(11, 'office@email.com', 7, 'testoffice', '67f5b28f50df0070e0cf5a12ece116dc7558e999ab4b0b287e', '', '', '', 0, NULL);

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
,`image_file_name` longtext
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

CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_all_items` AS select `i`.`id` AS `id`,`iss`.`purchase_id` AS `purchase_id`,`p`.`reference_no` AS `reference_no`,`p`.`datetime` AS `datetime`,`p`.`status` AS `status`,`i`.`code` AS `code`,`i`.`name` AS `item_name`,`i`.`image_file_name` AS `image_file_name`,`s`.`name` AS `supplier_name`,`i`.`unit` AS `unit`,`i`.`cost` AS `cost`,`i`.`price` AS `price`,`iss`.`expiration_date` AS `expiration_date`,`iss`.`quantity` AS `quantity`,`iss`.`sub_total` AS `sub_total`,`p`.`grand_total` AS `grand_total` from (((`items` `i` join `item_stocks` `iss`) join `purchases` `p`) join `suppliers` `s`) where ((`iss`.`item_id` = `i`.`id`) and (`iss`.`purchase_id` = `p`.`id`) and (`p`.`supplier_id` = `s`.`id`)) order by `i`.`id`;

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
