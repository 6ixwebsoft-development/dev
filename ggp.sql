-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2019 at 03:47 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homestead`
--

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Form 1: Studies, Education, Sports and Hobbies', '2019-12-17 18:30:00', '2019-12-11 18:30:00'),
(2, 'Form 2: Disease And Disability', '2019-12-12 18:30:00', '2019-12-12 18:30:00'),
(3, 'Form 3: Economically Needy', '2019-12-12 18:30:00', '2019-12-12 18:30:00'),
(4, 'Form 4: Professionals, Small Projects And Graduate Studies', '2019-12-12 18:30:00', '2019-12-12 18:30:00'),
(5, 'Form 5: Legal persons. Organisations, NGOs, schools, non-profits, hospitals, co-operatives, churches, etc.', '2019-12-12 18:30:00', '2019-12-12 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `gg_city`
--

CREATE TABLE `gg_city` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL,
  `city_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `modified_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gg_city`
--

INSERT INTO `gg_city` (`id`, `country_id`, `region_id`, `city_name`, `status`, `deleted`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 187, 18, 'Alingsås', '1', 0, NULL, NULL, NULL, NULL),
(2, 187, 21, 'Arboga', '1', 0, NULL, NULL, NULL, NULL),
(3, 187, 19, 'Arvika', '1', 0, NULL, NULL, NULL, NULL),
(4, 187, 20, 'Askersund', '1', 0, NULL, NULL, NULL, NULL),
(5, 187, 22, 'Avesta', '1', 0, NULL, NULL, NULL, NULL),
(6, 187, 7, 'Boden', '1', 0, NULL, NULL, NULL, NULL),
(7, 187, 23, 'Bollnäs', '1', 0, NULL, NULL, NULL, NULL),
(8, 187, 13, 'Borgholm', '1', 0, NULL, NULL, NULL, NULL),
(9, 187, 22, 'Borlänge', '1', 0, NULL, NULL, NULL, NULL),
(10, 187, 18, 'Borås', '1', 0, NULL, NULL, NULL, NULL),
(12, 187, 11, 'Eksjö', '1', 0, NULL, NULL, NULL, NULL),
(13, 187, 8, 'Enköping', '1', 0, NULL, NULL, NULL, NULL),
(14, 187, 9, 'Eskilstuna', '1', 0, NULL, NULL, NULL, NULL),
(15, 187, 16, 'Eslöv', '1', 0, NULL, NULL, NULL, NULL),
(16, 187, 21, 'Fagersta', '1', 0, NULL, NULL, NULL, NULL),
(17, 187, 17, 'Falkenberg', '1', 0, NULL, NULL, NULL, NULL),
(18, 187, 18, 'Falköping', '1', 0, NULL, NULL, NULL, NULL),
(20, 187, 22, 'Falun', '1', 0, NULL, NULL, NULL, NULL),
(21, 187, 19, 'Filipstad', '1', 0, NULL, NULL, NULL, NULL),
(22, 187, 9, 'Flen', '1', 0, NULL, NULL, NULL, NULL),
(25, 187, 23, 'Gävle', '1', 0, NULL, NULL, NULL, NULL),
(26, 187, 19, 'Hagfors', '1', 0, NULL, NULL, NULL, NULL),
(27, 187, 17, 'Halmstad', '1', 0, NULL, NULL, NULL, NULL),
(28, 187, 7, 'Haparanda', '1', 0, NULL, NULL, NULL, NULL),
(29, 187, 22, 'Hedemora', '1', 0, NULL, NULL, NULL, NULL),
(30, 187, 16, 'Helsingborg', '1', 0, NULL, NULL, NULL, NULL),
(31, 187, 18, 'Hjo', '1', 0, NULL, NULL, NULL, NULL),
(32, 187, 23, 'Hudiksvall', '1', 0, NULL, NULL, NULL, NULL),
(34, 187, 24, 'Härnösand', '1', 0, NULL, NULL, NULL, NULL),
(35, 187, 16, 'Hässleholm', '1', 0, NULL, NULL, NULL, NULL),
(36, 187, 16, 'Höganäs', '1', 0, NULL, NULL, NULL, NULL),
(37, 187, 11, 'Jönköping', '1', 0, NULL, NULL, NULL, NULL),
(38, 187, 13, 'Kalmar', '1', 0, NULL, NULL, NULL, NULL),
(39, 187, 15, 'Karlshamn', '1', 0, NULL, NULL, NULL, NULL),
(40, 187, 20, 'Karlskoga', '1', 0, NULL, NULL, NULL, NULL),
(41, 187, 15, 'Karlskrona', '1', 0, NULL, NULL, NULL, NULL),
(42, 187, 19, 'Karlstad', '1', 0, NULL, NULL, NULL, NULL),
(43, 187, 9, 'Katrineholm', '1', 0, NULL, NULL, NULL, NULL),
(44, 187, 7, 'Kiruna', '1', 0, NULL, NULL, NULL, NULL),
(45, 187, 24, 'Kramfors', '1', 0, NULL, NULL, NULL, NULL),
(46, 187, 16, 'Kristianstad', '1', 0, NULL, NULL, NULL, NULL),
(47, 187, 19, 'Kristinehamn', '1', 0, NULL, NULL, NULL, NULL),
(48, 187, 20, 'Kumla', '1', 0, NULL, NULL, NULL, NULL),
(49, 187, 17, 'Kungsbacka', '1', 0, NULL, NULL, NULL, NULL),
(50, 187, 18, 'Kungälv', '1', 0, NULL, NULL, NULL, NULL),
(51, 187, 21, 'Köping', '1', 0, NULL, NULL, NULL, NULL),
(52, 187, 17, 'Laholm', '1', 0, NULL, NULL, NULL, NULL),
(53, 187, 16, 'Landskrona', '1', 0, NULL, NULL, NULL, NULL),
(54, 187, 5, 'Lidingö', '1', 0, NULL, NULL, NULL, NULL),
(55, 187, 18, 'Lidköping', '1', 0, NULL, NULL, NULL, NULL),
(56, 187, 20, 'Lindesberg', '1', 0, NULL, NULL, NULL, NULL),
(57, 187, 10, 'Linköping', '1', 0, NULL, NULL, NULL, NULL),
(58, 187, 12, 'Ljungby', '1', 0, NULL, NULL, NULL, NULL),
(59, 187, 22, 'Ludvika', '1', 0, NULL, NULL, NULL, NULL),
(60, 187, 7, 'Luleå', '1', 0, NULL, NULL, NULL, NULL),
(61, 187, 16, 'Lund', '1', 0, NULL, NULL, NULL, NULL),
(62, 187, 6, 'Lycksele', '1', 0, NULL, NULL, NULL, NULL),
(63, 187, 18, 'Lysekil', '1', 0, NULL, NULL, NULL, NULL),
(64, 187, 16, 'Malmö', '1', 0, NULL, NULL, NULL, NULL),
(66, 187, 18, 'Mariestad', '1', 0, NULL, NULL, NULL, NULL),
(68, 187, 10, 'Mjölby', '1', 0, NULL, NULL, NULL, NULL),
(69, 187, 10, 'Motala', '1', 0, NULL, NULL, NULL, NULL),
(70, 187, 5, 'Nacka', '1', 0, NULL, NULL, NULL, NULL),
(71, 187, 20, 'Nora', '1', 0, NULL, NULL, NULL, NULL),
(72, 187, 10, 'Norrköping', '1', 0, NULL, NULL, NULL, NULL),
(73, 187, 5, 'Norrtälje', '1', 0, NULL, NULL, NULL, NULL),
(74, 187, 13, 'Nybro', '1', 0, NULL, NULL, NULL, NULL),
(75, 187, 9, 'Nyköping', '1', 0, NULL, NULL, NULL, NULL),
(76, 187, 5, 'Nynäshamn', '1', 0, NULL, NULL, NULL, NULL),
(77, 187, 11, 'Nässjö', '1', 0, NULL, NULL, NULL, NULL),
(78, 187, 13, 'Oskarshamn', '1', 0, NULL, NULL, NULL, NULL),
(79, 187, 9, 'Oxelösund', '1', 0, NULL, NULL, NULL, NULL),
(80, 187, 7, 'Piteå', '1', 0, NULL, NULL, NULL, NULL),
(81, 187, 15, 'Ronneby', '1', 0, NULL, NULL, NULL, NULL),
(82, 187, 21, 'Sala', '1', 0, NULL, NULL, NULL, NULL),
(83, 187, 23, 'Sandviken', '1', 0, NULL, NULL, NULL, NULL),
(84, 187, 5, 'Sigtuna', '1', 0, NULL, NULL, NULL, NULL),
(85, 187, 16, 'Simrishamn', '1', 0, NULL, NULL, NULL, NULL),
(88, 187, 18, 'Skara', '1', 0, NULL, NULL, NULL, NULL),
(89, 187, 6, 'Skellefteå', '1', 0, NULL, NULL, NULL, NULL),
(91, 187, 18, 'Skövde', '1', 0, NULL, NULL, NULL, NULL),
(92, 187, 24, 'Sollefteå', '1', 0, NULL, NULL, NULL, NULL),
(93, 187, 5, 'Solna', '1', 0, NULL, NULL, NULL, NULL),
(94, 187, 5, 'Stockholm', '1', 0, NULL, NULL, NULL, NULL),
(95, 187, 9, 'Strängnäs', '1', 0, NULL, NULL, NULL, NULL),
(96, 187, 18, 'Strömstad', '1', 0, NULL, NULL, NULL, NULL),
(97, 187, 5, 'Sundbyberg', '1', 0, NULL, NULL, NULL, NULL),
(98, 187, 24, 'Sundsvall', '1', 0, NULL, NULL, NULL, NULL),
(99, 187, 19, 'Säffle', '1', 0, NULL, NULL, NULL, NULL),
(100, 187, 22, 'Säter', '1', 0, NULL, NULL, NULL, NULL),
(101, 187, 11, 'Sävsjö', '1', 0, NULL, NULL, NULL, NULL),
(102, 187, 23, 'Söderhamn', '1', 0, NULL, NULL, NULL, NULL),
(103, 187, 10, 'Söderköping', '1', 0, NULL, NULL, NULL, NULL),
(104, 187, 5, 'Södertälje', '1', 0, NULL, NULL, NULL, NULL),
(105, 187, 13, 'Sölvesborg', '1', 0, NULL, NULL, NULL, NULL),
(106, 187, 18, 'Tidaholm', '1', 0, NULL, NULL, NULL, NULL),
(108, 187, 11, 'Tranås', '1', 0, NULL, NULL, NULL, NULL),
(109, 187, 16, 'Trelleborg', '1', 0, NULL, NULL, NULL, NULL),
(110, 187, 18, 'Trollhättan', '1', 0, NULL, NULL, NULL, NULL),
(111, 187, 9, 'Trosa', '1', 0, NULL, NULL, NULL, NULL),
(112, 187, 18, 'Uddevalla', '1', 0, NULL, NULL, NULL, NULL),
(113, 187, 18, 'Ulricehamn', '1', 0, NULL, NULL, NULL, NULL),
(114, 187, 6, 'Umeå', '1', 0, NULL, NULL, NULL, NULL),
(115, 187, 8, 'Uppsala', '1', 0, NULL, NULL, NULL, NULL),
(116, 187, 10, 'Vadstena', '1', 0, NULL, NULL, NULL, NULL),
(117, 187, 17, 'Varberg', '1', 0, NULL, NULL, NULL, NULL),
(118, 187, 5, 'Vaxholm', '1', 0, NULL, NULL, NULL, NULL),
(119, 187, 11, 'Vetlanda', '1', 0, NULL, NULL, NULL, NULL),
(120, 187, 13, 'Vimmerby', '1', 0, NULL, NULL, NULL, NULL),
(122, 187, 18, 'Vänersborg', '1', 0, NULL, NULL, NULL, NULL),
(123, 187, 11, 'Värnamo', '1', 0, NULL, NULL, NULL, NULL),
(124, 187, 13, 'Västervik', '1', 0, NULL, NULL, NULL, NULL),
(125, 187, 21, 'Västerås', '1', 0, NULL, NULL, NULL, NULL),
(126, 187, 12, 'Växjö', '1', 0, NULL, NULL, NULL, NULL),
(127, 187, 16, 'Ystad', '1', 0, NULL, NULL, NULL, NULL),
(128, 187, 18, 'Åmål', '1', 0, NULL, NULL, NULL, NULL),
(129, 187, 16, 'Ängelholm', '1', 0, NULL, NULL, NULL, NULL),
(130, 187, 20, 'Örebro', '1', 0, NULL, NULL, NULL, NULL),
(132, 187, 24, 'Örnsköldsvik', '1', 0, NULL, NULL, NULL, NULL),
(133, 187, 25, 'Östersund', '1', 0, NULL, NULL, NULL, NULL),
(134, 187, 8, 'Östhammar', '1', 0, NULL, NULL, NULL, NULL),
(135, 158, 2, 'Cebu', '1', 0, NULL, NULL, NULL, NULL),
(136, 158, 2, 'Mandaue', '1', 0, NULL, NULL, NULL, NULL),
(137, 158, 2, 'Talisay', '1', 0, NULL, NULL, NULL, NULL),
(139, 158, 1, 'Bacarra', '1', 0, NULL, NULL, NULL, NULL),
(142, 187, 18, 'Ale', '1', 0, NULL, NULL, NULL, NULL),
(143, 187, 12, 'Älmhult', '1', 0, NULL, NULL, NULL, NULL),
(144, 187, 22, 'Älvdalen', '1', 0, NULL, NULL, NULL, NULL),
(145, 187, 12, 'Alvesta', '1', 0, NULL, NULL, NULL, NULL),
(146, 187, 7, 'Älvsbyn', '1', 0, NULL, NULL, NULL, NULL),
(147, 187, 11, 'Aneby', '1', 0, NULL, NULL, NULL, NULL),
(148, 187, 24, 'Ånge', '1', 0, NULL, NULL, NULL, NULL),
(149, 187, 25, 'Åre', '1', 0, NULL, NULL, NULL, NULL),
(150, 187, 19, 'Årjäng', '1', 0, NULL, NULL, NULL, NULL),
(151, 187, 7, 'Arjeplog', '1', 0, NULL, NULL, NULL, NULL),
(152, 187, 7, 'Arvidsjaur', '1', 0, NULL, NULL, NULL, NULL),
(153, 187, 6, 'Åsele', '1', 0, NULL, NULL, NULL, NULL),
(154, 187, 16, 'Åstorp', '1', 0, NULL, NULL, NULL, NULL),
(155, 187, 10, 'Åtvidaberg', '1', 0, NULL, NULL, NULL, NULL),
(156, 187, 16, 'Båstad', '1', 0, NULL, NULL, NULL, NULL),
(157, 187, 18, 'Bengtsfors', '1', 0, NULL, NULL, NULL, NULL),
(158, 187, 16, 'Bjuv', '1', 0, NULL, NULL, NULL, NULL),
(159, 187, 18, 'Bollebygd', '1', 0, NULL, NULL, NULL, NULL),
(160, 187, 5, 'Botkyrka', '1', 0, NULL, NULL, NULL, NULL),
(161, 187, 10, 'Boxholm', '1', 0, NULL, NULL, NULL, NULL),
(162, 187, 25, 'Bräcke', '1', 0, NULL, NULL, NULL, NULL),
(163, 187, 16, 'Bromölla', '1', 0, NULL, NULL, NULL, NULL),
(164, 187, 16, 'Burlöv', '1', 0, NULL, NULL, NULL, NULL),
(165, 187, 5, 'Danderyd', '1', 0, NULL, NULL, NULL, NULL),
(166, 187, 20, 'Degerfors', '1', 0, NULL, NULL, NULL, NULL),
(167, 187, 6, 'Dorotea', '1', 0, NULL, NULL, NULL, NULL),
(168, 187, 19, 'Eda', '1', 0, NULL, NULL, NULL, NULL),
(169, 187, 5, 'Ekerö', '1', 0, NULL, NULL, NULL, NULL),
(170, 187, 13, 'Emmaboda', '1', 0, NULL, NULL, NULL, NULL),
(171, 187, 18, 'Essunga', '1', 0, NULL, NULL, NULL, NULL),
(172, 187, 18, 'Färgelanda', '1', 0, NULL, NULL, NULL, NULL),
(173, 187, 10, 'Finspång', '1', 0, NULL, NULL, NULL, NULL),
(174, 187, 19, 'Forshaga', '1', 0, NULL, NULL, NULL, NULL),
(175, 187, 22, 'Gagnef', '1', 0, NULL, NULL, NULL, NULL),
(176, 187, 7, 'Gällivare', '1', 0, NULL, NULL, NULL, NULL),
(177, 187, 11, 'Gislaved', '1', 0, NULL, NULL, NULL, NULL),
(178, 187, 9, 'Gnesta', '1', 0, NULL, NULL, NULL, NULL),
(179, 187, 11, 'Gnosjö', '1', 0, NULL, NULL, NULL, NULL),
(180, 187, 18, 'Götene', '1', 0, NULL, NULL, NULL, NULL),
(181, 187, 18, 'Grästorp', '1', 0, NULL, NULL, NULL, NULL),
(182, 187, 19, 'Grums', '1', 0, NULL, NULL, NULL, NULL),
(183, 187, 18, 'Gullspång', '1', 0, NULL, NULL, NULL, NULL),
(184, 187, 11, 'Habo', '1', 0, NULL, NULL, NULL, NULL),
(185, 187, 8, 'Håbo', '1', 0, NULL, NULL, NULL, NULL),
(186, 187, 20, 'Hällefors', '1', 0, NULL, NULL, NULL, NULL),
(187, 187, 20, 'Hallsberg', '1', 0, NULL, NULL, NULL, NULL),
(188, 187, 21, 'Hallstahammar', '1', 0, NULL, NULL, NULL, NULL),
(189, 187, 19, 'Hammarö', '1', 0, NULL, NULL, NULL, NULL),
(190, 187, 5, 'Haninge', '1', 0, NULL, NULL, NULL, NULL),
(191, 187, 25, 'Härjedalen', '1', 0, NULL, NULL, NULL, NULL),
(192, 187, 18, 'Härryda', '1', 0, NULL, NULL, NULL, NULL),
(193, 187, 8, 'Heby', '1', 0, NULL, NULL, NULL, NULL),
(194, 187, 18, 'Herrljunga', '1', 0, NULL, NULL, NULL, NULL),
(195, 187, 23, 'Hofors', '1', 0, NULL, NULL, NULL, NULL),
(196, 187, 13, 'Högsby', '1', 0, NULL, NULL, NULL, NULL),
(197, 187, 16, 'Höör', '1', 0, NULL, NULL, NULL, NULL),
(198, 187, 16, 'Hörby', '1', 0, NULL, NULL, NULL, NULL),
(199, 187, 5, 'Huddinge', '1', 0, NULL, NULL, NULL, NULL),
(200, 187, 13, 'Hultsfred', '1', 0, NULL, NULL, NULL, NULL),
(201, 187, 17, 'Hylte', '1', 0, NULL, NULL, NULL, NULL),
(202, 187, 5, 'Järfälla', '1', 0, NULL, NULL, NULL, NULL),
(203, 187, 7, 'Jokkmokk', '1', 0, NULL, NULL, NULL, NULL),
(204, 187, 7, 'Kalix', '1', 0, NULL, NULL, NULL, NULL),
(205, 187, 18, 'Karlsborg', '1', 0, NULL, NULL, NULL, NULL),
(206, 187, 16, 'Kävlinge', '1', 0, NULL, NULL, NULL, NULL),
(207, 187, 10, 'Kinda', '1', 0, NULL, NULL, NULL, NULL),
(208, 187, 16, 'Klippan', '1', 0, NULL, NULL, NULL, NULL),
(209, 187, 25, 'Krokom', '1', 0, NULL, NULL, NULL, NULL),
(210, 187, 21, 'Kungsör', '1', 0, NULL, NULL, NULL, NULL),
(211, 187, 22, 'Leksand', '1', 0, NULL, NULL, NULL, NULL),
(212, 187, 18, 'Lerum', '1', 0, NULL, NULL, NULL, NULL),
(213, 187, 23, 'Ljusdal', '1', 0, NULL, NULL, NULL, NULL),
(214, 187, 16, 'Lomma', '1', 0, NULL, NULL, NULL, NULL),
(215, 187, 6, 'Malå', '1', 0, NULL, NULL, NULL, NULL),
(217, 187, 18, 'Mark', '1', 0, NULL, NULL, NULL, NULL),
(218, 187, 12, 'Markaryd', '1', 0, NULL, NULL, NULL, NULL),
(219, 187, 18, 'Mellerud', '1', 0, NULL, NULL, NULL, NULL),
(220, 187, 18, 'Mölndal', '1', 0, NULL, NULL, NULL, NULL),
(221, 187, 13, 'Mönsterås', '1', 0, NULL, NULL, NULL, NULL),
(222, 187, 22, 'Mora', '1', 0, NULL, NULL, NULL, NULL),
(223, 187, 11, 'Mullsjö', '1', 0, NULL, NULL, NULL, NULL),
(224, 187, 18, 'Munkedal', '1', 0, NULL, NULL, NULL, NULL),
(225, 187, 19, 'Munkfors', '1', 0, NULL, NULL, NULL, NULL),
(226, 187, 21, 'Norberg', '1', 0, NULL, NULL, NULL, NULL),
(227, 187, 23, 'Nordanstig', '1', 0, NULL, NULL, NULL, NULL),
(228, 187, 6, 'Nordmaling', '1', 0, NULL, NULL, NULL, NULL),
(229, 187, 6, 'Norsjö', '1', 0, NULL, NULL, NULL, NULL),
(230, 187, 23, 'Ockelbo', '1', 0, NULL, NULL, NULL, NULL),
(231, 187, 18, 'Öckerö', '1', 0, NULL, NULL, NULL, NULL),
(232, 187, 10, 'Ödeshög', '1', 0, NULL, NULL, NULL, NULL),
(233, 187, 15, 'Olofström', '1', 0, NULL, NULL, NULL, NULL),
(234, 187, 16, 'Örkelljunga', '1', 0, NULL, NULL, NULL, NULL),
(235, 187, 22, 'Orsa', '1', 0, NULL, NULL, NULL, NULL),
(236, 187, 18, 'Orust', '1', 0, NULL, NULL, NULL, NULL),
(237, 187, 16, 'Osby', '1', 0, NULL, NULL, NULL, NULL),
(238, 187, 5, 'Österåker', '1', 0, NULL, NULL, NULL, NULL),
(239, 187, 16, 'Östra Göinge', '1', 0, NULL, NULL, NULL, NULL),
(240, 187, 23, 'Ovanåker', '1', 0, NULL, NULL, NULL, NULL),
(241, 187, 7, 'Övertorneå', '1', 0, NULL, NULL, NULL, NULL),
(242, 187, 7, 'Pajala', '1', 0, NULL, NULL, NULL, NULL),
(243, 187, 18, 'Partille', '1', 0, NULL, NULL, NULL, NULL),
(244, 187, 16, 'Perstorp', '1', 0, NULL, NULL, NULL, NULL),
(245, 187, 25, 'Ragunda', '1', 0, NULL, NULL, NULL, NULL),
(246, 187, 22, 'Rättvik', '1', 0, NULL, NULL, NULL, NULL),
(247, 187, 6, 'Robertsfors', '1', 0, NULL, NULL, NULL, NULL),
(248, 187, 5, 'Salem', '1', 0, NULL, NULL, NULL, NULL),
(249, 187, 16, 'Sjöbo', '1', 0, NULL, NULL, NULL, NULL),
(250, 187, 21, 'Skinnskatteberg', '1', 0, NULL, NULL, NULL, NULL),
(251, 187, 16, 'Skurup', '1', 0, NULL, NULL, NULL, NULL),
(252, 187, 22, 'Smedjebacken', '1', 0, NULL, NULL, NULL, NULL),
(253, 187, 5, 'Sollentuna', '1', 0, NULL, NULL, NULL, NULL),
(254, 187, 18, 'Sotenäs', '1', 0, NULL, NULL, NULL, NULL),
(255, 187, 16, 'Staffanstorp', '1', 0, NULL, NULL, NULL, NULL),
(256, 187, 6, 'Storuman', '1', 0, NULL, NULL, NULL, NULL),
(257, 187, 25, 'Strömsund', '1', 0, NULL, NULL, NULL, NULL),
(258, 187, 19, 'Sunne', '1', 0, NULL, NULL, NULL, NULL),
(259, 187, 21, 'Surahammar', '1', 0, NULL, NULL, NULL, NULL),
(260, 187, 16, 'Svalöv', '1', 0, NULL, NULL, NULL, NULL),
(261, 187, 16, 'Svedala', '1', 0, NULL, NULL, NULL, NULL),
(263, 187, 18, 'Svenljunga', '1', 0, NULL, NULL, NULL, NULL),
(264, 187, 5, 'Täby', '1', 0, NULL, NULL, NULL, NULL),
(265, 187, 18, 'Tanum', '1', 0, NULL, NULL, NULL, NULL),
(266, 187, 18, 'Tibro', '1', 0, NULL, NULL, NULL, NULL),
(267, 187, 8, 'Tierp', '1', 0, NULL, NULL, NULL, NULL),
(268, 187, 24, 'Timrå', '1', 0, NULL, NULL, NULL, NULL),
(269, 187, 12, 'Tingsryd', '1', 0, NULL, NULL, NULL, NULL),
(270, 187, 18, 'Tjörn', '1', 0, NULL, NULL, NULL, NULL),
(271, 187, 16, 'Tomelilla', '1', 0, NULL, NULL, NULL, NULL),
(272, 187, 13, 'Torsås', '1', 0, NULL, NULL, NULL, NULL),
(273, 187, 19, 'Torsby', '1', 0, NULL, NULL, NULL, NULL),
(274, 187, 18, 'Tranemo', '1', 0, NULL, NULL, NULL, NULL),
(275, 187, 5, 'Tyresö', '1', 0, NULL, NULL, NULL, NULL),
(276, 187, 5, 'Upplands Väsby', '1', 0, NULL, NULL, NULL, NULL),
(277, 187, 5, 'Upplands-Bro', '1', 0, NULL, NULL, NULL, NULL),
(278, 187, 12, 'Uppvidinge', '1', 0, NULL, NULL, NULL, NULL),
(279, 187, 11, 'Vaggeryd', '1', 0, NULL, NULL, NULL, NULL),
(280, 187, 10, 'Valdemarsvik', '1', 0, NULL, NULL, NULL, NULL),
(281, 187, 5, 'Vallentuna', '1', 0, NULL, NULL, NULL, NULL),
(282, 187, 6, 'Vännäs', '1', 0, NULL, NULL, NULL, NULL),
(283, 187, 22, 'Vansbro', '1', 0, NULL, NULL, NULL, NULL),
(284, 187, 18, 'Vara', '1', 0, NULL, NULL, NULL, NULL),
(285, 187, 5, 'Värmdö', '1', 0, NULL, NULL, NULL, NULL),
(286, 187, 16, 'Vellinge', '1', 0, NULL, NULL, NULL, NULL),
(287, 187, 6, 'Vilhelmina', '1', 0, NULL, NULL, NULL, NULL),
(288, 187, 6, 'Vindeln', '1', 0, NULL, NULL, NULL, NULL),
(289, 187, 9, 'Vingåker', '1', 0, NULL, NULL, NULL, NULL),
(290, 187, 10, 'Ydre', '1', 0, NULL, NULL, NULL, NULL),
(312, 187, 18, 'Göteborg', '1', 0, NULL, NULL, NULL, NULL),
(315, 187, 14, 'Gotland', '1', 0, NULL, NULL, NULL, NULL),
(349, 187, 16, 'Lunds universitet', '1', 0, NULL, NULL, NULL, NULL),
(379, 187, 5, 'Stockholms stad', '1', 0, NULL, NULL, NULL, NULL),
(380, 187, 5, 'Stockholms stift', '1', 0, NULL, NULL, NULL, NULL),
(381, 187, 5, 'Stockholms universitet', '1', 0, NULL, NULL, NULL, NULL),
(787, 187, 5, 'Nykvarn', '1', 0, NULL, NULL, NULL, NULL),
(788, 187, 8, 'Älvkarleby', '1', 0, NULL, NULL, NULL, NULL),
(789, 187, 8, 'Knivsta', '1', 0, NULL, NULL, NULL, NULL),
(790, 187, 12, 'Lessebo', '1', 0, NULL, NULL, NULL, NULL),
(791, 187, 13, 'Mörbylånga', '1', 0, NULL, NULL, NULL, NULL),
(793, 187, 18, 'Stenungsund', '1', 0, NULL, NULL, NULL, NULL),
(794, 187, 18, 'Dals-Ed', '1', 0, NULL, NULL, NULL, NULL),
(795, 187, 18, 'Vårgårda', '1', 0, NULL, NULL, NULL, NULL),
(796, 187, 18, 'Lilla Edet', '1', 0, NULL, NULL, NULL, NULL),
(797, 187, 18, 'Töreboda', '1', 0, NULL, NULL, NULL, NULL),
(798, 187, 19, 'Kil', '1', 0, NULL, NULL, NULL, NULL),
(799, 187, 19, 'Storfors', '1', 0, NULL, NULL, NULL, NULL),
(800, 187, 20, 'Lekeberg', '1', 0, NULL, NULL, NULL, NULL),
(801, 187, 20, 'Laxå', '1', 0, NULL, NULL, NULL, NULL),
(802, 187, 20, 'Ljusnarsberg', '1', 0, NULL, NULL, NULL, NULL),
(803, 187, 22, 'Malung-Sälen', '1', 0, NULL, NULL, NULL, NULL),
(804, 187, 25, 'Berg', '1', 0, NULL, NULL, NULL, NULL),
(805, 187, 6, 'Bjurholm', '1', 0, NULL, NULL, NULL, NULL),
(806, 187, 6, 'Sorsele', '1', 0, NULL, NULL, NULL, NULL),
(807, 187, 7, 'Överkalix', '1', 0, NULL, NULL, NULL, NULL),
(809, 158, 2, 'Cebu', '1', 1, NULL, NULL, NULL, NULL),
(810, 158, 3, 'Tuguegarao', '1', 0, NULL, NULL, NULL, NULL),
(811, 158, 4, 'Tacloban', '1', 0, NULL, NULL, NULL, NULL),
(1, 187, 18, 'Alingsås', '1', 0, NULL, NULL, NULL, NULL),
(2, 187, 21, 'Arboga', '1', 0, NULL, NULL, NULL, NULL),
(3, 187, 19, 'Arvika', '1', 0, NULL, NULL, NULL, NULL),
(4, 187, 20, 'Askersund', '1', 0, NULL, NULL, NULL, NULL),
(5, 187, 22, 'Avesta', '1', 0, NULL, NULL, NULL, NULL),
(6, 187, 7, 'Boden', '1', 0, NULL, NULL, NULL, NULL),
(7, 187, 23, 'Bollnäs', '1', 0, NULL, NULL, NULL, NULL),
(8, 187, 13, 'Borgholm', '1', 0, NULL, NULL, NULL, NULL),
(9, 187, 22, 'Borlänge', '1', 0, NULL, NULL, NULL, NULL),
(10, 187, 18, 'Borås', '1', 0, NULL, NULL, NULL, NULL),
(12, 187, 11, 'Eksjö', '1', 0, NULL, NULL, NULL, NULL),
(13, 187, 8, 'Enköping', '1', 0, NULL, NULL, NULL, NULL),
(14, 187, 9, 'Eskilstuna', '1', 0, NULL, NULL, NULL, NULL),
(15, 187, 16, 'Eslöv', '1', 0, NULL, NULL, NULL, NULL),
(16, 187, 21, 'Fagersta', '1', 0, NULL, NULL, NULL, NULL),
(17, 187, 17, 'Falkenberg', '1', 0, NULL, NULL, NULL, NULL),
(18, 187, 18, 'Falköping', '1', 0, NULL, NULL, NULL, NULL),
(20, 187, 22, 'Falun', '1', 0, NULL, NULL, NULL, NULL),
(21, 187, 19, 'Filipstad', '1', 0, NULL, NULL, NULL, NULL),
(22, 187, 9, 'Flen', '1', 0, NULL, NULL, NULL, NULL),
(25, 187, 23, 'Gävle', '1', 0, NULL, NULL, NULL, NULL),
(26, 187, 19, 'Hagfors', '1', 0, NULL, NULL, NULL, NULL),
(27, 187, 17, 'Halmstad', '1', 0, NULL, NULL, NULL, NULL),
(28, 187, 7, 'Haparanda', '1', 0, NULL, NULL, NULL, NULL),
(29, 187, 22, 'Hedemora', '1', 0, NULL, NULL, NULL, NULL),
(30, 187, 16, 'Helsingborg', '1', 0, NULL, NULL, NULL, NULL),
(31, 187, 18, 'Hjo', '1', 0, NULL, NULL, NULL, NULL),
(32, 187, 23, 'Hudiksvall', '1', 0, NULL, NULL, NULL, NULL),
(34, 187, 24, 'Härnösand', '1', 0, NULL, NULL, NULL, NULL),
(35, 187, 16, 'Hässleholm', '1', 0, NULL, NULL, NULL, NULL),
(36, 187, 16, 'Höganäs', '1', 0, NULL, NULL, NULL, NULL),
(37, 187, 11, 'Jönköping', '1', 0, NULL, NULL, NULL, NULL),
(38, 187, 13, 'Kalmar', '1', 0, NULL, NULL, NULL, NULL),
(39, 187, 15, 'Karlshamn', '1', 0, NULL, NULL, NULL, NULL),
(40, 187, 20, 'Karlskoga', '1', 0, NULL, NULL, NULL, NULL),
(41, 187, 15, 'Karlskrona', '1', 0, NULL, NULL, NULL, NULL),
(42, 187, 19, 'Karlstad', '1', 0, NULL, NULL, NULL, NULL),
(43, 187, 9, 'Katrineholm', '1', 0, NULL, NULL, NULL, NULL),
(44, 187, 7, 'Kiruna', '1', 0, NULL, NULL, NULL, NULL),
(45, 187, 24, 'Kramfors', '1', 0, NULL, NULL, NULL, NULL),
(46, 187, 16, 'Kristianstad', '1', 0, NULL, NULL, NULL, NULL),
(47, 187, 19, 'Kristinehamn', '1', 0, NULL, NULL, NULL, NULL),
(48, 187, 20, 'Kumla', '1', 0, NULL, NULL, NULL, NULL),
(49, 187, 17, 'Kungsbacka', '1', 0, NULL, NULL, NULL, NULL),
(50, 187, 18, 'Kungälv', '1', 0, NULL, NULL, NULL, NULL),
(51, 187, 21, 'Köping', '1', 0, NULL, NULL, NULL, NULL),
(52, 187, 17, 'Laholm', '1', 0, NULL, NULL, NULL, NULL),
(53, 187, 16, 'Landskrona', '1', 0, NULL, NULL, NULL, NULL),
(54, 187, 5, 'Lidingö', '1', 0, NULL, NULL, NULL, NULL),
(55, 187, 18, 'Lidköping', '1', 0, NULL, NULL, NULL, NULL),
(56, 187, 20, 'Lindesberg', '1', 0, NULL, NULL, NULL, NULL),
(57, 187, 10, 'Linköping', '1', 0, NULL, NULL, NULL, NULL),
(58, 187, 12, 'Ljungby', '1', 0, NULL, NULL, NULL, NULL),
(59, 187, 22, 'Ludvika', '1', 0, NULL, NULL, NULL, NULL),
(60, 187, 7, 'Luleå', '1', 0, NULL, NULL, NULL, NULL),
(61, 187, 16, 'Lund', '1', 0, NULL, NULL, NULL, NULL),
(62, 187, 6, 'Lycksele', '1', 0, NULL, NULL, NULL, NULL),
(63, 187, 18, 'Lysekil', '1', 0, NULL, NULL, NULL, NULL),
(64, 187, 16, 'Malmö', '1', 0, NULL, NULL, NULL, NULL),
(66, 187, 18, 'Mariestad', '1', 0, NULL, NULL, NULL, NULL),
(68, 187, 10, 'Mjölby', '1', 0, NULL, NULL, NULL, NULL),
(69, 187, 10, 'Motala', '1', 0, NULL, NULL, NULL, NULL),
(70, 187, 5, 'Nacka', '1', 0, NULL, NULL, NULL, NULL),
(71, 187, 20, 'Nora', '1', 0, NULL, NULL, NULL, NULL),
(72, 187, 10, 'Norrköping', '1', 0, NULL, NULL, NULL, NULL),
(73, 187, 5, 'Norrtälje', '1', 0, NULL, NULL, NULL, NULL),
(74, 187, 13, 'Nybro', '1', 0, NULL, NULL, NULL, NULL),
(75, 187, 9, 'Nyköping', '1', 0, NULL, NULL, NULL, NULL),
(76, 187, 5, 'Nynäshamn', '1', 0, NULL, NULL, NULL, NULL),
(77, 187, 11, 'Nässjö', '1', 0, NULL, NULL, NULL, NULL),
(78, 187, 13, 'Oskarshamn', '1', 0, NULL, NULL, NULL, NULL),
(79, 187, 9, 'Oxelösund', '1', 0, NULL, NULL, NULL, NULL),
(80, 187, 7, 'Piteå', '1', 0, NULL, NULL, NULL, NULL),
(81, 187, 15, 'Ronneby', '1', 0, NULL, NULL, NULL, NULL),
(82, 187, 21, 'Sala', '1', 0, NULL, NULL, NULL, NULL),
(83, 187, 23, 'Sandviken', '1', 0, NULL, NULL, NULL, NULL),
(84, 187, 5, 'Sigtuna', '1', 0, NULL, NULL, NULL, NULL),
(85, 187, 16, 'Simrishamn', '1', 0, NULL, NULL, NULL, NULL),
(88, 187, 18, 'Skara', '1', 0, NULL, NULL, NULL, NULL),
(89, 187, 6, 'Skellefteå', '1', 0, NULL, NULL, NULL, NULL),
(91, 187, 18, 'Skövde', '1', 0, NULL, NULL, NULL, NULL),
(92, 187, 24, 'Sollefteå', '1', 0, NULL, NULL, NULL, NULL),
(93, 187, 5, 'Solna', '1', 0, NULL, NULL, NULL, NULL),
(94, 187, 5, 'Stockholm', '1', 0, NULL, NULL, NULL, NULL),
(95, 187, 9, 'Strängnäs', '1', 0, NULL, NULL, NULL, NULL),
(96, 187, 18, 'Strömstad', '1', 0, NULL, NULL, NULL, NULL),
(97, 187, 5, 'Sundbyberg', '1', 0, NULL, NULL, NULL, NULL),
(98, 187, 24, 'Sundsvall', '1', 0, NULL, NULL, NULL, NULL),
(99, 187, 19, 'Säffle', '1', 0, NULL, NULL, NULL, NULL),
(100, 187, 22, 'Säter', '1', 0, NULL, NULL, NULL, NULL),
(101, 187, 11, 'Sävsjö', '1', 0, NULL, NULL, NULL, NULL),
(102, 187, 23, 'Söderhamn', '1', 0, NULL, NULL, NULL, NULL),
(103, 187, 10, 'Söderköping', '1', 0, NULL, NULL, NULL, NULL),
(104, 187, 5, 'Södertälje', '1', 0, NULL, NULL, NULL, NULL),
(105, 187, 13, 'Sölvesborg', '1', 0, NULL, NULL, NULL, NULL),
(106, 187, 18, 'Tidaholm', '1', 0, NULL, NULL, NULL, NULL),
(108, 187, 11, 'Tranås', '1', 0, NULL, NULL, NULL, NULL),
(109, 187, 16, 'Trelleborg', '1', 0, NULL, NULL, NULL, NULL),
(110, 187, 18, 'Trollhättan', '1', 0, NULL, NULL, NULL, NULL),
(111, 187, 9, 'Trosa', '1', 0, NULL, NULL, NULL, NULL),
(112, 187, 18, 'Uddevalla', '1', 0, NULL, NULL, NULL, NULL),
(113, 187, 18, 'Ulricehamn', '1', 0, NULL, NULL, NULL, NULL),
(114, 187, 6, 'Umeå', '1', 0, NULL, NULL, NULL, NULL),
(115, 187, 8, 'Uppsala', '1', 0, NULL, NULL, NULL, NULL),
(116, 187, 10, 'Vadstena', '1', 0, NULL, NULL, NULL, NULL),
(117, 187, 17, 'Varberg', '1', 0, NULL, NULL, NULL, NULL),
(118, 187, 5, 'Vaxholm', '1', 0, NULL, NULL, NULL, NULL),
(119, 187, 11, 'Vetlanda', '1', 0, NULL, NULL, NULL, NULL),
(120, 187, 13, 'Vimmerby', '1', 0, NULL, NULL, NULL, NULL),
(122, 187, 18, 'Vänersborg', '1', 0, NULL, NULL, NULL, NULL),
(123, 187, 11, 'Värnamo', '1', 0, NULL, NULL, NULL, NULL),
(124, 187, 13, 'Västervik', '1', 0, NULL, NULL, NULL, NULL),
(125, 187, 21, 'Västerås', '1', 0, NULL, NULL, NULL, NULL),
(126, 187, 12, 'Växjö', '1', 0, NULL, NULL, NULL, NULL),
(127, 187, 16, 'Ystad', '1', 0, NULL, NULL, NULL, NULL),
(128, 187, 18, 'Åmål', '1', 0, NULL, NULL, NULL, NULL),
(129, 187, 16, 'Ängelholm', '1', 0, NULL, NULL, NULL, NULL),
(130, 187, 20, 'Örebro', '1', 0, NULL, NULL, NULL, NULL),
(132, 187, 24, 'Örnsköldsvik', '1', 0, NULL, NULL, NULL, NULL),
(133, 187, 25, 'Östersund', '1', 0, NULL, NULL, NULL, NULL),
(134, 187, 8, 'Östhammar', '1', 0, NULL, NULL, NULL, NULL),
(135, 158, 2, 'Cebu', '1', 0, NULL, NULL, NULL, NULL),
(136, 158, 2, 'Mandaue', '1', 0, NULL, NULL, NULL, NULL),
(137, 158, 2, 'Talisay', '1', 0, NULL, NULL, NULL, NULL),
(139, 158, 1, 'Bacarra', '1', 0, NULL, NULL, NULL, NULL),
(142, 187, 18, 'Ale', '1', 0, NULL, NULL, NULL, NULL),
(143, 187, 12, 'Älmhult', '1', 0, NULL, NULL, NULL, NULL),
(144, 187, 22, 'Älvdalen', '1', 0, NULL, NULL, NULL, NULL),
(145, 187, 12, 'Alvesta', '1', 0, NULL, NULL, NULL, NULL),
(146, 187, 7, 'Älvsbyn', '1', 0, NULL, NULL, NULL, NULL),
(147, 187, 11, 'Aneby', '1', 0, NULL, NULL, NULL, NULL),
(148, 187, 24, 'Ånge', '1', 0, NULL, NULL, NULL, NULL),
(149, 187, 25, 'Åre', '1', 0, NULL, NULL, NULL, NULL),
(150, 187, 19, 'Årjäng', '1', 0, NULL, NULL, NULL, NULL),
(151, 187, 7, 'Arjeplog', '1', 0, NULL, NULL, NULL, NULL),
(152, 187, 7, 'Arvidsjaur', '1', 0, NULL, NULL, NULL, NULL),
(153, 187, 6, 'Åsele', '1', 0, NULL, NULL, NULL, NULL),
(154, 187, 16, 'Åstorp', '1', 0, NULL, NULL, NULL, NULL),
(155, 187, 10, 'Åtvidaberg', '1', 0, NULL, NULL, NULL, NULL),
(156, 187, 16, 'Båstad', '1', 0, NULL, NULL, NULL, NULL),
(157, 187, 18, 'Bengtsfors', '1', 0, NULL, NULL, NULL, NULL),
(158, 187, 16, 'Bjuv', '1', 0, NULL, NULL, NULL, NULL),
(159, 187, 18, 'Bollebygd', '1', 0, NULL, NULL, NULL, NULL),
(160, 187, 5, 'Botkyrka', '1', 0, NULL, NULL, NULL, NULL),
(161, 187, 10, 'Boxholm', '1', 0, NULL, NULL, NULL, NULL),
(162, 187, 25, 'Bräcke', '1', 0, NULL, NULL, NULL, NULL),
(163, 187, 16, 'Bromölla', '1', 0, NULL, NULL, NULL, NULL),
(164, 187, 16, 'Burlöv', '1', 0, NULL, NULL, NULL, NULL),
(165, 187, 5, 'Danderyd', '1', 0, NULL, NULL, NULL, NULL),
(166, 187, 20, 'Degerfors', '1', 0, NULL, NULL, NULL, NULL),
(167, 187, 6, 'Dorotea', '1', 0, NULL, NULL, NULL, NULL),
(168, 187, 19, 'Eda', '1', 0, NULL, NULL, NULL, NULL),
(169, 187, 5, 'Ekerö', '1', 0, NULL, NULL, NULL, NULL),
(170, 187, 13, 'Emmaboda', '1', 0, NULL, NULL, NULL, NULL),
(171, 187, 18, 'Essunga', '1', 0, NULL, NULL, NULL, NULL),
(172, 187, 18, 'Färgelanda', '1', 0, NULL, NULL, NULL, NULL),
(173, 187, 10, 'Finspång', '1', 0, NULL, NULL, NULL, NULL),
(174, 187, 19, 'Forshaga', '1', 0, NULL, NULL, NULL, NULL),
(175, 187, 22, 'Gagnef', '1', 0, NULL, NULL, NULL, NULL),
(176, 187, 7, 'Gällivare', '1', 0, NULL, NULL, NULL, NULL),
(177, 187, 11, 'Gislaved', '1', 0, NULL, NULL, NULL, NULL),
(178, 187, 9, 'Gnesta', '1', 0, NULL, NULL, NULL, NULL),
(179, 187, 11, 'Gnosjö', '1', 0, NULL, NULL, NULL, NULL),
(180, 187, 18, 'Götene', '1', 0, NULL, NULL, NULL, NULL),
(181, 187, 18, 'Grästorp', '1', 0, NULL, NULL, NULL, NULL),
(182, 187, 19, 'Grums', '1', 0, NULL, NULL, NULL, NULL),
(183, 187, 18, 'Gullspång', '1', 0, NULL, NULL, NULL, NULL),
(184, 187, 11, 'Habo', '1', 0, NULL, NULL, NULL, NULL),
(185, 187, 8, 'Håbo', '1', 0, NULL, NULL, NULL, NULL),
(186, 187, 20, 'Hällefors', '1', 0, NULL, NULL, NULL, NULL),
(187, 187, 20, 'Hallsberg', '1', 0, NULL, NULL, NULL, NULL),
(188, 187, 21, 'Hallstahammar', '1', 0, NULL, NULL, NULL, NULL),
(189, 187, 19, 'Hammarö', '1', 0, NULL, NULL, NULL, NULL),
(190, 187, 5, 'Haninge', '1', 0, NULL, NULL, NULL, NULL),
(191, 187, 25, 'Härjedalen', '1', 0, NULL, NULL, NULL, NULL),
(192, 187, 18, 'Härryda', '1', 0, NULL, NULL, NULL, NULL),
(193, 187, 8, 'Heby', '1', 0, NULL, NULL, NULL, NULL),
(194, 187, 18, 'Herrljunga', '1', 0, NULL, NULL, NULL, NULL),
(195, 187, 23, 'Hofors', '1', 0, NULL, NULL, NULL, NULL),
(196, 187, 13, 'Högsby', '1', 0, NULL, NULL, NULL, NULL),
(197, 187, 16, 'Höör', '1', 0, NULL, NULL, NULL, NULL),
(198, 187, 16, 'Hörby', '1', 0, NULL, NULL, NULL, NULL),
(199, 187, 5, 'Huddinge', '1', 0, NULL, NULL, NULL, NULL),
(200, 187, 13, 'Hultsfred', '1', 0, NULL, NULL, NULL, NULL),
(201, 187, 17, 'Hylte', '1', 0, NULL, NULL, NULL, NULL),
(202, 187, 5, 'Järfälla', '1', 0, NULL, NULL, NULL, NULL),
(203, 187, 7, 'Jokkmokk', '1', 0, NULL, NULL, NULL, NULL),
(204, 187, 7, 'Kalix', '1', 0, NULL, NULL, NULL, NULL),
(205, 187, 18, 'Karlsborg', '1', 0, NULL, NULL, NULL, NULL),
(206, 187, 16, 'Kävlinge', '1', 0, NULL, NULL, NULL, NULL),
(207, 187, 10, 'Kinda', '1', 0, NULL, NULL, NULL, NULL),
(208, 187, 16, 'Klippan', '1', 0, NULL, NULL, NULL, NULL),
(209, 187, 25, 'Krokom', '1', 0, NULL, NULL, NULL, NULL),
(210, 187, 21, 'Kungsör', '1', 0, NULL, NULL, NULL, NULL),
(211, 187, 22, 'Leksand', '1', 0, NULL, NULL, NULL, NULL),
(212, 187, 18, 'Lerum', '1', 0, NULL, NULL, NULL, NULL),
(213, 187, 23, 'Ljusdal', '1', 0, NULL, NULL, NULL, NULL),
(214, 187, 16, 'Lomma', '1', 0, NULL, NULL, NULL, NULL),
(215, 187, 6, 'Malå', '1', 0, NULL, NULL, NULL, NULL),
(217, 187, 18, 'Mark', '1', 0, NULL, NULL, NULL, NULL),
(218, 187, 12, 'Markaryd', '1', 0, NULL, NULL, NULL, NULL),
(219, 187, 18, 'Mellerud', '1', 0, NULL, NULL, NULL, NULL),
(220, 187, 18, 'Mölndal', '1', 0, NULL, NULL, NULL, NULL),
(221, 187, 13, 'Mönsterås', '1', 0, NULL, NULL, NULL, NULL),
(222, 187, 22, 'Mora', '1', 0, NULL, NULL, NULL, NULL),
(223, 187, 11, 'Mullsjö', '1', 0, NULL, NULL, NULL, NULL),
(224, 187, 18, 'Munkedal', '1', 0, NULL, NULL, NULL, NULL),
(225, 187, 19, 'Munkfors', '1', 0, NULL, NULL, NULL, NULL),
(226, 187, 21, 'Norberg', '1', 0, NULL, NULL, NULL, NULL),
(227, 187, 23, 'Nordanstig', '1', 0, NULL, NULL, NULL, NULL),
(228, 187, 6, 'Nordmaling', '1', 0, NULL, NULL, NULL, NULL),
(229, 187, 6, 'Norsjö', '1', 0, NULL, NULL, NULL, NULL),
(230, 187, 23, 'Ockelbo', '1', 0, NULL, NULL, NULL, NULL),
(231, 187, 18, 'Öckerö', '1', 0, NULL, NULL, NULL, NULL),
(232, 187, 10, 'Ödeshög', '1', 0, NULL, NULL, NULL, NULL),
(233, 187, 15, 'Olofström', '1', 0, NULL, NULL, NULL, NULL),
(234, 187, 16, 'Örkelljunga', '1', 0, NULL, NULL, NULL, NULL),
(235, 187, 22, 'Orsa', '1', 0, NULL, NULL, NULL, NULL),
(236, 187, 18, 'Orust', '1', 0, NULL, NULL, NULL, NULL),
(237, 187, 16, 'Osby', '1', 0, NULL, NULL, NULL, NULL),
(238, 187, 5, 'Österåker', '1', 0, NULL, NULL, NULL, NULL),
(239, 187, 16, 'Östra Göinge', '1', 0, NULL, NULL, NULL, NULL),
(240, 187, 23, 'Ovanåker', '1', 0, NULL, NULL, NULL, NULL),
(241, 187, 7, 'Övertorneå', '1', 0, NULL, NULL, NULL, NULL),
(242, 187, 7, 'Pajala', '1', 0, NULL, NULL, NULL, NULL),
(243, 187, 18, 'Partille', '1', 0, NULL, NULL, NULL, NULL),
(244, 187, 16, 'Perstorp', '1', 0, NULL, NULL, NULL, NULL),
(245, 187, 25, 'Ragunda', '1', 0, NULL, NULL, NULL, NULL),
(246, 187, 22, 'Rättvik', '1', 0, NULL, NULL, NULL, NULL),
(247, 187, 6, 'Robertsfors', '1', 0, NULL, NULL, NULL, NULL),
(248, 187, 5, 'Salem', '1', 0, NULL, NULL, NULL, NULL),
(249, 187, 16, 'Sjöbo', '1', 0, NULL, NULL, NULL, NULL),
(250, 187, 21, 'Skinnskatteberg', '1', 0, NULL, NULL, NULL, NULL),
(251, 187, 16, 'Skurup', '1', 0, NULL, NULL, NULL, NULL),
(252, 187, 22, 'Smedjebacken', '1', 0, NULL, NULL, NULL, NULL),
(253, 187, 5, 'Sollentuna', '1', 0, NULL, NULL, NULL, NULL),
(254, 187, 18, 'Sotenäs', '1', 0, NULL, NULL, NULL, NULL),
(255, 187, 16, 'Staffanstorp', '1', 0, NULL, NULL, NULL, NULL),
(256, 187, 6, 'Storuman', '1', 0, NULL, NULL, NULL, NULL),
(257, 187, 25, 'Strömsund', '1', 0, NULL, NULL, NULL, NULL),
(258, 187, 19, 'Sunne', '1', 0, NULL, NULL, NULL, NULL),
(259, 187, 21, 'Surahammar', '1', 0, NULL, NULL, NULL, NULL),
(260, 187, 16, 'Svalöv', '1', 0, NULL, NULL, NULL, NULL),
(261, 187, 16, 'Svedala', '1', 0, NULL, NULL, NULL, NULL),
(263, 187, 18, 'Svenljunga', '1', 0, NULL, NULL, NULL, NULL),
(264, 187, 5, 'Täby', '1', 0, NULL, NULL, NULL, NULL),
(265, 187, 18, 'Tanum', '1', 0, NULL, NULL, NULL, NULL),
(266, 187, 18, 'Tibro', '1', 0, NULL, NULL, NULL, NULL),
(267, 187, 8, 'Tierp', '1', 0, NULL, NULL, NULL, NULL),
(268, 187, 24, 'Timrå', '1', 0, NULL, NULL, NULL, NULL),
(269, 187, 12, 'Tingsryd', '1', 0, NULL, NULL, NULL, NULL),
(270, 187, 18, 'Tjörn', '1', 0, NULL, NULL, NULL, NULL),
(271, 187, 16, 'Tomelilla', '1', 0, NULL, NULL, NULL, NULL),
(272, 187, 13, 'Torsås', '1', 0, NULL, NULL, NULL, NULL),
(273, 187, 19, 'Torsby', '1', 0, NULL, NULL, NULL, NULL),
(274, 187, 18, 'Tranemo', '1', 0, NULL, NULL, NULL, NULL),
(275, 187, 5, 'Tyresö', '1', 0, NULL, NULL, NULL, NULL),
(276, 187, 5, 'Upplands Väsby', '1', 0, NULL, NULL, NULL, NULL),
(277, 187, 5, 'Upplands-Bro', '1', 0, NULL, NULL, NULL, NULL),
(278, 187, 12, 'Uppvidinge', '1', 0, NULL, NULL, NULL, NULL),
(279, 187, 11, 'Vaggeryd', '1', 0, NULL, NULL, NULL, NULL),
(280, 187, 10, 'Valdemarsvik', '1', 0, NULL, NULL, NULL, NULL),
(281, 187, 5, 'Vallentuna', '1', 0, NULL, NULL, NULL, NULL),
(282, 187, 6, 'Vännäs', '1', 0, NULL, NULL, NULL, NULL),
(283, 187, 22, 'Vansbro', '1', 0, NULL, NULL, NULL, NULL),
(284, 187, 18, 'Vara', '1', 0, NULL, NULL, NULL, NULL),
(285, 187, 5, 'Värmdö', '1', 0, NULL, NULL, NULL, NULL),
(286, 187, 16, 'Vellinge', '1', 0, NULL, NULL, NULL, NULL),
(287, 187, 6, 'Vilhelmina', '1', 0, NULL, NULL, NULL, NULL),
(288, 187, 6, 'Vindeln', '1', 0, NULL, NULL, NULL, NULL),
(289, 187, 9, 'Vingåker', '1', 0, NULL, NULL, NULL, NULL),
(290, 187, 10, 'Ydre', '1', 0, NULL, NULL, NULL, NULL),
(312, 187, 18, 'Göteborg', '1', 0, NULL, NULL, NULL, NULL),
(315, 187, 14, 'Gotland', '1', 0, NULL, NULL, NULL, NULL),
(349, 187, 16, 'Lunds universitet', '1', 0, NULL, NULL, NULL, NULL),
(379, 187, 5, 'Stockholms stad', '1', 0, NULL, NULL, NULL, NULL),
(380, 187, 5, 'Stockholms stift', '1', 0, NULL, NULL, NULL, NULL),
(381, 187, 5, 'Stockholms universitet', '1', 0, NULL, NULL, NULL, NULL),
(787, 187, 5, 'Nykvarn', '1', 0, NULL, NULL, NULL, NULL),
(788, 187, 8, 'Älvkarleby', '1', 0, NULL, NULL, NULL, NULL),
(789, 187, 8, 'Knivsta', '1', 0, NULL, NULL, NULL, NULL),
(790, 187, 12, 'Lessebo', '1', 0, NULL, NULL, NULL, NULL),
(791, 187, 13, 'Mörbylånga', '1', 0, NULL, NULL, NULL, NULL),
(793, 187, 18, 'Stenungsund', '1', 0, NULL, NULL, NULL, NULL),
(794, 187, 18, 'Dals-Ed', '1', 0, NULL, NULL, NULL, NULL),
(795, 187, 18, 'Vårgårda', '1', 0, NULL, NULL, NULL, NULL),
(796, 187, 18, 'Lilla Edet', '1', 0, NULL, NULL, NULL, NULL),
(797, 187, 18, 'Töreboda', '1', 0, NULL, NULL, NULL, NULL),
(798, 187, 19, 'Kil', '1', 0, NULL, NULL, NULL, NULL),
(799, 187, 19, 'Storfors', '1', 0, NULL, NULL, NULL, NULL),
(800, 187, 20, 'Lekeberg', '1', 0, NULL, NULL, NULL, NULL),
(801, 187, 20, 'Laxå', '1', 0, NULL, NULL, NULL, NULL),
(802, 187, 20, 'Ljusnarsberg', '1', 0, NULL, NULL, NULL, NULL),
(803, 187, 22, 'Malung-Sälen', '1', 0, NULL, NULL, NULL, NULL),
(804, 187, 25, 'Berg', '1', 0, NULL, NULL, NULL, NULL),
(805, 187, 6, 'Bjurholm', '1', 0, NULL, NULL, NULL, NULL),
(806, 187, 6, 'Sorsele', '1', 0, NULL, NULL, NULL, NULL),
(807, 187, 7, 'Överkalix', '1', 0, NULL, NULL, NULL, NULL),
(809, 158, 2, 'Cebu', '1', 1, NULL, NULL, NULL, NULL),
(810, 158, 3, 'Tuguegarao', '1', 0, NULL, NULL, NULL, NULL),
(811, 158, 4, 'Tacloban', '1', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gg_cms_pages`
--

CREATE TABLE `gg_cms_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gg_cms_pages`
--

INSERT INTO `gg_cms_pages` (`id`, `status`, `created_at`, `updated_at`) VALUES
(21, 1, NULL, '2019-09-17 08:34:44'),
(19, 1, NULL, '2019-09-17 08:33:31'),
(20, 1, NULL, '2019-09-17 08:32:56'),
(22, 1, NULL, '2019-09-17 08:30:57'),
(23, 1, NULL, '2019-09-17 08:35:39'),
(24, 1, NULL, '2019-09-17 08:36:09'),
(25, 1, NULL, '2019-09-17 08:36:53'),
(26, 1, NULL, '2019-09-17 08:40:09'),
(27, 1, NULL, '2019-09-17 08:46:04'),
(28, 1, NULL, '2019-09-17 08:53:42'),
(29, 1, NULL, '2019-09-17 08:55:52'),
(32, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gg_country`
--

CREATE TABLE `gg_country` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nation_id` int(10) UNSIGNED NOT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calling_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `modified_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gg_country`
--

INSERT INTO `gg_country` (`id`, `nation_id`, `country_code`, `country_name`, `calling_code`, `status`, `deleted`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 1, '45', 'åäö, ÅÄÖ ñ and Ñ', '', '1', 1, NULL, NULL, NULL, NULL),
(2, 1, 'åä', 'åäö, ÅÄÖ ñ and Ñ', '', '1', 1, NULL, NULL, NULL, NULL),
(4, 10, 'AE', 'United Arab Emirates', '971', '1', 1, NULL, NULL, NULL, NULL),
(5, 16, 'AF', 'Afghanistan', '93', '1', 1, NULL, NULL, NULL, NULL),
(6, 3, 'AG', 'Antigua and Barbuda', '1268', '1', 1, NULL, NULL, NULL, NULL),
(7, 3, 'AI', 'Anguilla', '1264', '1', 1, NULL, NULL, NULL, NULL),
(8, 19, 'AL', 'Albania', '355', '1', 0, NULL, NULL, NULL, NULL),
(9, 21, 'AM', 'Armenia', '374', '1', 0, NULL, NULL, NULL, NULL),
(10, 3, 'AN', 'Antilles', '599', '1', 1, NULL, NULL, NULL, NULL),
(11, 4, 'AO', 'Angola', '244', '1', 0, NULL, NULL, NULL, NULL),
(12, 15, 'AR', 'Argentina', '54', '1', 0, NULL, NULL, NULL, NULL),
(13, 14, 'AS', 'American Samoa', '1684', '1', 1, NULL, NULL, NULL, NULL),
(14, 22, 'AT', 'Austria', '43', '1', 0, NULL, NULL, NULL, NULL),
(15, 2, 'AU', 'Australia', '61', '1', 0, NULL, NULL, NULL, NULL),
(16, 3, 'AW', 'Aruba', '297', '1', 1, NULL, NULL, NULL, NULL),
(17, 21, 'AZ', 'Azerbaijan', '994', '1', 0, NULL, NULL, NULL, NULL),
(18, 19, 'BA', 'Bosnia and Herzegovina', '387', '1', 0, NULL, NULL, NULL, NULL),
(19, 3, 'BB', 'Barbados', '1246', '1', 1, NULL, NULL, NULL, NULL),
(20, 16, 'BD', 'Bangladesh', '880', '1', 0, NULL, NULL, NULL, NULL),
(21, 22, 'BE', 'Belgium', '32', '1', 0, NULL, NULL, NULL, NULL),
(22, 20, 'BF', 'Burkina Faso', '226', '1', 1, NULL, NULL, NULL, NULL),
(23, 9, 'BG', 'Bulgaria', '359', '1', 0, NULL, NULL, NULL, NULL),
(24, 10, 'BH', 'Bahrain', '973', '1', 1, NULL, NULL, NULL, NULL),
(25, 7, 'BI', 'Burundi', '257', '1', 1, NULL, NULL, NULL, NULL),
(26, 20, 'BJ', 'Benin', '229', '1', 1, NULL, NULL, NULL, NULL),
(27, 11, 'BM', 'Bermuda', '1441', '1', 1, NULL, NULL, NULL, NULL),
(28, 17, 'BN', 'Brunei', '673', '1', 1, NULL, NULL, NULL, NULL),
(29, 15, 'BO', 'Bolivia', '591', '1', 0, NULL, NULL, NULL, NULL),
(30, 15, 'BR', 'Brazil', '55', '1', 0, NULL, NULL, NULL, NULL),
(31, 3, 'BS', 'Bahamas', '1242', '1', 1, NULL, NULL, NULL, NULL),
(32, 16, 'BT', 'Bhutan', '975', '1', 1, NULL, NULL, NULL, NULL),
(33, 18, 'BW', 'Botswana', '267', '1', 1, NULL, NULL, NULL, NULL),
(34, 9, 'BY', 'Belarus', '375', '1', 0, NULL, NULL, NULL, NULL),
(35, 5, 'BZ', 'Belize', '501', '1', 1, NULL, NULL, NULL, NULL),
(36, 11, 'CA', 'Canada', '1', '1', 0, NULL, NULL, NULL, NULL),
(37, 4, 'CD', 'Congo, Dem. Rep.', '243', '1', 0, NULL, NULL, NULL, NULL),
(38, 4, 'CF', 'Central African Republic', '236', '1', 0, NULL, NULL, NULL, NULL),
(39, 4, 'CG', 'Congo', '242', '1', 0, NULL, NULL, NULL, NULL),
(40, 22, 'CH', 'Switzerland', '41', '1', 0, NULL, NULL, NULL, NULL),
(41, 20, 'CI', 'Ivory', '225', '1', 0, NULL, NULL, NULL, NULL),
(42, 15, 'CK', 'Chile', '682', '1', 0, NULL, NULL, NULL, NULL),
(43, 8, 'CN', 'China', '86', '1', 0, NULL, NULL, NULL, NULL),
(44, 15, 'CO', 'Colombia', '57', '1', 0, NULL, NULL, NULL, NULL),
(45, 5, 'CR', 'Costa Rica', '506', '1', 1, NULL, NULL, NULL, NULL),
(46, 19, 'CS', 'Serbia and Montenegro', '', '1', 0, NULL, NULL, NULL, NULL),
(47, 3, 'CU', 'Cuba', '53', '1', 0, NULL, NULL, NULL, NULL),
(48, 20, 'CV', 'Cape Verde', '238', '1', 1, NULL, NULL, NULL, NULL),
(49, 10, 'CY', 'Cyprus', '357', '1', 0, NULL, NULL, NULL, NULL),
(50, 9, 'CZ', 'Czech Republic', '420', '1', 0, NULL, NULL, NULL, NULL),
(51, 22, 'DE', 'Germany', '49', '1', 0, NULL, NULL, NULL, NULL),
(52, 7, 'DJ', 'Djibouti', '253', '1', 1, NULL, NULL, NULL, NULL),
(53, 13, 'DK', 'Denmark', '45', '1', 0, NULL, NULL, NULL, NULL),
(54, 3, 'DM', 'Dominica', '1767', '1', 0, NULL, NULL, NULL, NULL),
(55, 3, 'DO', 'Dominican Republic', '1809', '1', 0, NULL, NULL, NULL, NULL),
(56, 12, 'DZ', 'Algeria', '213', '1', 0, NULL, NULL, NULL, NULL),
(57, 15, 'EC', 'Ecuador', '593', '1', 0, NULL, NULL, NULL, NULL),
(58, 13, 'EE', 'Estonia', '372', '1', 0, NULL, NULL, NULL, NULL),
(59, 10, 'EG', 'Egypt', '20', '1', 0, NULL, NULL, NULL, NULL),
(60, 7, 'ER', 'Eritrea', '291', '1', 0, NULL, NULL, NULL, NULL),
(61, 19, 'ES', 'Spain', '34', '1', 0, NULL, NULL, NULL, NULL),
(62, 7, 'ET', 'Ethiopia', '251', '1', 0, NULL, NULL, NULL, NULL),
(63, 13, 'FI', 'Finland', '358', '1', 0, NULL, NULL, NULL, NULL),
(64, 14, 'FJ', 'Fiji', '679', '1', 0, NULL, NULL, NULL, NULL),
(66, 14, 'FM', 'Micronesia', '691', '1', 1, NULL, NULL, NULL, NULL),
(67, 13, 'FO', 'Faroe', '298', '1', 0, NULL, NULL, NULL, NULL),
(68, 22, 'FR', 'France', '33', '1', 0, NULL, NULL, NULL, NULL),
(69, 4, 'GA', 'Gabon', '241', '1', 1, NULL, NULL, NULL, NULL),
(71, 3, 'GD', 'Grenada', '1473', '1', 0, NULL, NULL, NULL, NULL),
(72, 21, 'GE', 'Georgia', '995', '1', 0, NULL, NULL, NULL, NULL),
(73, 15, 'GF', 'French Guayana', '594', '1', 1, NULL, NULL, NULL, NULL),
(74, 20, 'GH', 'Ghana', '233', '1', 0, NULL, NULL, NULL, NULL),
(75, 20, 'GM', 'Gambia', '220', '1', 0, NULL, NULL, NULL, NULL),
(76, 20, 'GN', 'Guinea', '224', '1', 1, NULL, NULL, NULL, NULL),
(77, 3, 'GP', 'Guadeloupe', '590', '1', 1, NULL, NULL, NULL, NULL),
(78, 4, 'GQ', 'Equatorial Guinea', '240', '1', 1, NULL, NULL, NULL, NULL),
(79, 19, 'GR', 'Greece', '30', '1', 0, NULL, NULL, NULL, NULL),
(80, 5, 'GT', 'Guatemala', '502', '1', 0, NULL, NULL, NULL, NULL),
(81, 14, 'GU', 'Guam', '1671', '1', 1, NULL, NULL, NULL, NULL),
(82, 20, 'GW', 'Guinea-Bissau', '245', '1', 1, NULL, NULL, NULL, NULL),
(83, 15, 'GY', 'Guyana', '592', '1', 1, NULL, NULL, NULL, NULL),
(84, 8, 'HK', 'Hong Kong', '852', '1', 0, NULL, NULL, NULL, NULL),
(85, 5, 'HN', 'Honduras', '504', '1', 0, NULL, NULL, NULL, NULL),
(86, 19, 'HR', 'Croatia', '385', '1', 0, NULL, NULL, NULL, NULL),
(87, 3, 'HT', 'Haiti', '509', '1', 0, NULL, NULL, NULL, NULL),
(88, 9, 'HU', 'Hungary', '36', '1', 0, NULL, NULL, NULL, NULL),
(89, 17, 'ID', 'Indonesia', '62', '1', 0, NULL, NULL, NULL, NULL),
(90, 13, 'IE', 'Ireland', '353', '1', 0, NULL, NULL, NULL, NULL),
(91, 10, 'IL', 'Israel', '972', '1', 0, NULL, NULL, NULL, NULL),
(92, 16, 'IN', 'India', '91', '1', 0, NULL, NULL, NULL, NULL),
(93, 10, 'IQ', 'Iraq', '964', '1', 0, NULL, NULL, NULL, NULL),
(94, 16, 'IR', 'Iran', '98', '1', 0, NULL, NULL, NULL, NULL),
(95, 13, 'IS', 'Iceland', '354', '1', 0, NULL, NULL, NULL, NULL),
(96, 19, 'IT', 'Italy', '39', '1', 0, NULL, NULL, NULL, NULL),
(97, 3, 'JM', 'Jamaica', '1876', '1', 0, NULL, NULL, NULL, NULL),
(98, 10, 'JO', 'Jordan', '962', '1', 0, NULL, NULL, NULL, NULL),
(99, 8, 'JP', 'Japan', '81', '1', 0, NULL, NULL, NULL, NULL),
(100, 7, 'KE', 'Kenya', '254', '1', 0, NULL, NULL, NULL, NULL),
(101, 6, 'KG', 'Kyrgyzstan', '996', '1', 0, NULL, NULL, NULL, NULL),
(102, 17, 'KH', 'Cambodia', '855', '1', 0, NULL, NULL, NULL, NULL),
(103, 14, 'KI', 'Kiribati', '686', '1', 1, NULL, NULL, NULL, NULL),
(104, 7, 'KM', 'Comoros', '269', '1', 1, NULL, NULL, NULL, NULL),
(105, 3, 'KN', 'St Kitts and Nevis', '1869', '1', 1, NULL, NULL, NULL, NULL),
(106, 14, 'KP', 'North Korea', '850', '1', 0, NULL, NULL, NULL, NULL),
(107, 8, 'KR', 'South Korea', '82', '1', 0, NULL, NULL, NULL, NULL),
(108, 10, 'KW', 'Kuwait', '965', '1', 0, NULL, NULL, NULL, NULL),
(109, 3, 'KY', 'Cayman Islands', '1345', '1', 1, NULL, NULL, NULL, NULL),
(110, 6, 'KZ', 'Kazakhstan', '7', '1', 0, NULL, NULL, NULL, NULL),
(111, 17, 'LA', 'Laos', '856', '1', 1, NULL, NULL, NULL, NULL),
(112, 10, 'LB', 'Lebanon', '961', '1', 0, NULL, NULL, NULL, NULL),
(113, 3, 'LC', 'St Lucia', '1758', '1', 1, NULL, NULL, NULL, NULL),
(115, 16, 'LK', 'Sri Lanka', '94', '1', 0, NULL, NULL, NULL, NULL),
(116, 20, 'LR', 'Liberia', '231', '1', 0, NULL, NULL, NULL, NULL),
(117, 18, 'LS', 'Lesotho', '266', '1', 1, NULL, NULL, NULL, NULL),
(118, 13, 'LT', 'Lithuania', '370', '1', 0, NULL, NULL, NULL, NULL),
(119, 22, 'LU', 'Luxembourg', '352', '1', 0, NULL, NULL, NULL, NULL),
(120, 13, 'LV', 'Latvia', '371', '1', 0, NULL, NULL, NULL, NULL),
(121, 12, 'LY', 'Libya', '218', '1', 0, NULL, NULL, NULL, NULL),
(122, 12, 'MA', 'Morocco', '212', '1', 0, NULL, NULL, NULL, NULL),
(123, 19, 'MC', 'Monaco', '377', '1', 1, NULL, NULL, NULL, NULL),
(124, 9, 'MD', 'Moldova', '373', '1', 0, NULL, NULL, NULL, NULL),
(125, 19, 'ME', 'Montenegro', '382', '1', 0, NULL, NULL, NULL, NULL),
(126, 7, 'MG', 'Madagascar', '261', '1', 0, NULL, NULL, NULL, NULL),
(127, 14, 'MH', 'Marshall Islands', '692', '1', 1, NULL, NULL, NULL, NULL),
(128, 19, 'MK', 'Macedonia', '389', '1', 0, NULL, NULL, NULL, NULL),
(129, 20, 'ML', 'Mali', '223', '1', 0, NULL, NULL, NULL, NULL),
(130, 17, 'MM', 'Myanmar', '95', '1', 0, NULL, NULL, NULL, NULL),
(131, 8, 'MN', 'Mongolia', '976', '1', 0, NULL, NULL, NULL, NULL),
(132, 8, 'MO', 'Macau', '853', '1', 0, NULL, NULL, NULL, NULL),
(133, 3, 'MQ', 'Martinique', '596', '1', 1, NULL, NULL, NULL, NULL),
(134, 7, 'MR', 'Mauritania', '222', '1', 1, NULL, NULL, NULL, NULL),
(135, 19, 'MT', 'Malta', '356', '1', 0, NULL, NULL, NULL, NULL),
(136, 20, 'MU', 'Mauritius', '230', '1', 1, NULL, NULL, NULL, NULL),
(137, 16, 'MV', 'Maldives', '960', '1', 0, NULL, NULL, NULL, NULL),
(138, 7, 'MW', 'Malawi', '265', '1', 1, NULL, NULL, NULL, NULL),
(139, 11, 'MX', 'Mexico', '52', '1', 0, NULL, NULL, NULL, NULL),
(140, 17, 'MY', 'Malaysia', '60', '1', 0, NULL, NULL, NULL, NULL),
(141, 7, 'MZ', 'Mozambique', '258', '1', 0, NULL, NULL, NULL, NULL),
(142, 18, 'NA', 'Namibia', '264', '1', 0, NULL, NULL, NULL, NULL),
(143, 14, 'NC', 'New Caledonia', '687', '1', 1, NULL, NULL, NULL, NULL),
(144, 20, 'NE', 'Niger', '227', '1', 1, NULL, NULL, NULL, NULL),
(145, 20, 'NG', 'Nigeria', '234', '1', 0, NULL, NULL, NULL, NULL),
(146, 5, 'NI', 'Nicaragua', '505', '1', 0, NULL, NULL, NULL, NULL),
(147, 22, 'NL', 'Netherlands', '31', '1', 0, NULL, NULL, NULL, NULL),
(148, 13, 'NO', 'Norway', '47', '1', 0, NULL, NULL, NULL, NULL),
(149, 16, 'NP', 'Nepal', '977', '1', 0, NULL, NULL, NULL, NULL),
(150, 14, 'NR', 'Nauru', '674', '1', 0, NULL, NULL, NULL, NULL),
(151, 14, 'NU', 'Niue', '683', '1', 1, NULL, NULL, NULL, NULL),
(152, 14, 'NZ', 'New Zealand', '64', '1', 0, NULL, NULL, NULL, NULL),
(153, 10, 'OM', 'Oman', '968', '1', 1, NULL, NULL, NULL, NULL),
(154, 5, 'PA', 'Panama', '507', '1', 0, NULL, NULL, NULL, NULL),
(155, 15, 'PE', 'Peru', '51', '1', 0, NULL, NULL, NULL, NULL),
(156, 14, 'PF', 'French Polynesia', '689', '1', 1, NULL, NULL, NULL, NULL),
(157, 17, 'PG', 'Papua New Guinea', '675', '1', 0, NULL, NULL, NULL, NULL),
(159, 16, 'PK', 'Pakistan', '92', '1', 0, NULL, NULL, NULL, NULL),
(160, 9, 'PL', 'Poland', '48', '1', 0, NULL, NULL, NULL, NULL),
(162, 3, 'PR', 'Puerto Rico', '1', '1', 0, NULL, NULL, NULL, NULL),
(163, 10, 'PS', 'Palestine', '970', '1', 0, NULL, NULL, NULL, NULL),
(164, 19, 'PT', 'Portugal', '351', '1', 0, NULL, NULL, NULL, NULL),
(165, 15, 'PY', 'Paraguay', '595', '1', 0, NULL, NULL, NULL, NULL),
(166, 10, 'QA', 'Qatar', '974', '1', 0, NULL, NULL, NULL, NULL),
(168, 9, 'RO', 'Romania', '40', '1', 0, NULL, NULL, NULL, NULL),
(170, 9, 'RU', 'Russia', '7', '1', 0, NULL, NULL, NULL, NULL),
(171, 7, 'RW', 'Rwanda', '250', '1', 0, NULL, NULL, NULL, NULL),
(172, 10, 'SA', 'Saudi Arabia', '966', '1', 0, NULL, NULL, NULL, NULL),
(173, 14, 'SB', 'Solomon Islands', '677', '1', 1, NULL, NULL, NULL, NULL),
(174, 7, 'SC', 'Seychelles', '248', '1', 1, NULL, NULL, NULL, NULL),
(175, 12, 'SD', 'Sudan', '249', '1', 0, NULL, NULL, NULL, NULL),
(177, 17, 'SG', 'Singapore', '65', '1', 0, NULL, NULL, NULL, NULL),
(178, 19, 'SI', 'Slovenia', '386', '1', 0, NULL, NULL, NULL, NULL),
(179, 9, 'SK', 'Slovakia', '421', '1', 0, NULL, NULL, NULL, NULL),
(180, 20, 'SL', 'Sierra Leone', '232', '1', 0, NULL, NULL, NULL, NULL),
(181, 19, 'SM', 'San Marino', '378', '1', 1, NULL, NULL, NULL, NULL),
(182, 20, 'SN', 'Senegal', '221', '1', 0, NULL, NULL, NULL, NULL),
(183, 7, 'SO', 'Somalia', '252', '1', 0, NULL, NULL, NULL, NULL),
(184, 15, 'SR', 'Suriname', '597', '1', 1, NULL, NULL, NULL, NULL),
(185, 4, 'ST', 'São Tomé und Príncipe', '239', '1', 1, NULL, NULL, NULL, NULL),
(186, 5, 'SV', 'El Salvador', '503', '1', 1, NULL, NULL, NULL, NULL),
(187, 13, 'SE', 'Sweden', '46', '1', 0, NULL, NULL, NULL, NULL),
(188, 10, 'SY', 'Syria', '963', '1', 0, NULL, NULL, NULL, NULL),
(189, 18, 'SZ', 'Swaziland', '268', '1', 1, NULL, NULL, NULL, NULL),
(190, 4, 'TD', 'Chad', '235', '1', 1, NULL, NULL, NULL, NULL),
(191, 20, 'TG', 'Togo', '228', '1', 1, NULL, NULL, NULL, NULL),
(192, 17, 'TH', 'Thailand', '66', '1', 0, NULL, NULL, NULL, NULL),
(193, 6, 'TJ', 'Tajikistan', '992', '1', 0, NULL, NULL, NULL, NULL),
(194, 17, 'TL', 'Timor-Leste', '670', '1', 1, NULL, NULL, NULL, NULL),
(195, 6, 'TM', 'Turkmenistan', '993', '1', 0, NULL, NULL, NULL, NULL),
(196, 12, 'TN', 'Tunisia', '216', '1', 0, NULL, NULL, NULL, NULL),
(197, 14, 'TO', 'Tonga', '676', '1', 1, NULL, NULL, NULL, NULL),
(198, 21, 'TR', 'Turkey', '90', '1', 0, NULL, NULL, NULL, NULL),
(199, 15, 'TT', 'Trinidad and Tobago', '1868', '1', 1, NULL, NULL, NULL, NULL),
(200, 14, 'TV', 'Tuvalu', '688', '1', 1, NULL, NULL, NULL, NULL),
(201, 8, 'TW', 'Taiwan', '886', '1', 0, NULL, NULL, NULL, NULL),
(202, 7, 'TZ', 'Tanzania', '255', '1', 0, NULL, NULL, NULL, NULL),
(203, 9, 'UA', 'Ukraine', '380', '1', 0, NULL, NULL, NULL, NULL),
(204, 7, 'UG', 'Uganda', '256', '1', 0, NULL, NULL, NULL, NULL),
(206, 15, 'UY', 'Uruguay', '598', '1', 0, NULL, NULL, NULL, NULL),
(207, 6, 'UZ', 'Uzbekistan', '998', '1', 0, NULL, NULL, NULL, NULL),
(208, 3, 'VC', 'St Vincent', '1784', '1', 1, NULL, NULL, NULL, NULL),
(209, 15, 'VE', 'Venezuela', '58', '1', 0, NULL, NULL, NULL, NULL),
(210, 3, 'VG', 'Virgin Islands British', '1284', '1', 1, NULL, NULL, NULL, NULL),
(211, 3, 'VI', 'Virgin Islands, United States', '1340', '1', 1, NULL, NULL, NULL, NULL),
(212, 17, 'VN', 'Vietnam', '84', '1', 0, NULL, NULL, NULL, NULL),
(213, 14, 'VU', 'Vanuatu', '678', '1', 1, NULL, NULL, NULL, NULL),
(214, 10, 'YE', 'Yemen', '967', '1', 0, NULL, NULL, NULL, NULL),
(215, 18, 'ZA', 'South Africa', '27', '1', 0, NULL, NULL, NULL, NULL),
(216, 7, 'ZM', 'Zambia', '260', '1', 0, NULL, NULL, NULL, NULL),
(217, 7, 'ZW', 'Zimbabwe', '263', '1', 0, NULL, NULL, NULL, NULL),
(222, 1, 'TE', 'test', '', '1', 1, NULL, NULL, NULL, NULL),
(205, 11, 'US', 'USA', '1', '1', 0, NULL, NULL, NULL, NULL),
(233, 1, 'zz', 'test', '', '1', 1, NULL, NULL, NULL, NULL),
(3, 19, 'AD', 'Andorra', '376', '1', 1, NULL, NULL, NULL, NULL),
(158, 17, 'PH', 'Philippines', '63', '1', 0, NULL, NULL, NULL, NULL),
(234, 22, 'GB', 'United Kingdom', '', '1', 0, NULL, NULL, NULL, NULL),
(235, 30, '00', 'International', '', '1', 0, NULL, NULL, NULL, NULL),
(65, 22, 'FL', 'Liechtenstein', '423', '1', 0, NULL, NULL, NULL, NULL),
(1, 1, '45', 'åäö, ÅÄÖ ñ and Ñ', '', '1', 1, NULL, NULL, NULL, NULL),
(2, 1, 'åä', 'åäö, ÅÄÖ ñ and Ñ', '', '1', 1, NULL, NULL, NULL, NULL),
(4, 10, 'AE', 'United Arab Emirates', '971', '1', 1, NULL, NULL, NULL, NULL),
(5, 16, 'AF', 'Afghanistan', '93', '1', 1, NULL, NULL, NULL, NULL),
(6, 3, 'AG', 'Antigua and Barbuda', '1268', '1', 1, NULL, NULL, NULL, NULL),
(7, 3, 'AI', 'Anguilla', '1264', '1', 1, NULL, NULL, NULL, NULL),
(8, 19, 'AL', 'Albania', '355', '1', 0, NULL, NULL, NULL, NULL),
(9, 21, 'AM', 'Armenia', '374', '1', 0, NULL, NULL, NULL, NULL),
(10, 3, 'AN', 'Antilles', '599', '1', 1, NULL, NULL, NULL, NULL),
(11, 4, 'AO', 'Angola', '244', '1', 0, NULL, NULL, NULL, NULL),
(12, 15, 'AR', 'Argentina', '54', '1', 0, NULL, NULL, NULL, NULL),
(13, 14, 'AS', 'American Samoa', '1684', '1', 1, NULL, NULL, NULL, NULL),
(14, 22, 'AT', 'Austria', '43', '1', 0, NULL, NULL, NULL, NULL),
(15, 2, 'AU', 'Australia', '61', '1', 0, NULL, NULL, NULL, NULL),
(16, 3, 'AW', 'Aruba', '297', '1', 1, NULL, NULL, NULL, NULL),
(17, 21, 'AZ', 'Azerbaijan', '994', '1', 0, NULL, NULL, NULL, NULL),
(18, 19, 'BA', 'Bosnia and Herzegovina', '387', '1', 0, NULL, NULL, NULL, NULL),
(19, 3, 'BB', 'Barbados', '1246', '1', 1, NULL, NULL, NULL, NULL),
(20, 16, 'BD', 'Bangladesh', '880', '1', 0, NULL, NULL, NULL, NULL),
(21, 22, 'BE', 'Belgium', '32', '1', 0, NULL, NULL, NULL, NULL),
(22, 20, 'BF', 'Burkina Faso', '226', '1', 1, NULL, NULL, NULL, NULL),
(23, 9, 'BG', 'Bulgaria', '359', '1', 0, NULL, NULL, NULL, NULL),
(24, 10, 'BH', 'Bahrain', '973', '1', 1, NULL, NULL, NULL, NULL),
(25, 7, 'BI', 'Burundi', '257', '1', 1, NULL, NULL, NULL, NULL),
(26, 20, 'BJ', 'Benin', '229', '1', 1, NULL, NULL, NULL, NULL),
(27, 11, 'BM', 'Bermuda', '1441', '1', 1, NULL, NULL, NULL, NULL),
(28, 17, 'BN', 'Brunei', '673', '1', 1, NULL, NULL, NULL, NULL),
(29, 15, 'BO', 'Bolivia', '591', '1', 0, NULL, NULL, NULL, NULL),
(30, 15, 'BR', 'Brazil', '55', '1', 0, NULL, NULL, NULL, NULL),
(31, 3, 'BS', 'Bahamas', '1242', '1', 1, NULL, NULL, NULL, NULL),
(32, 16, 'BT', 'Bhutan', '975', '1', 1, NULL, NULL, NULL, NULL),
(33, 18, 'BW', 'Botswana', '267', '1', 1, NULL, NULL, NULL, NULL),
(34, 9, 'BY', 'Belarus', '375', '1', 0, NULL, NULL, NULL, NULL),
(35, 5, 'BZ', 'Belize', '501', '1', 1, NULL, NULL, NULL, NULL),
(36, 11, 'CA', 'Canada', '1', '1', 0, NULL, NULL, NULL, NULL),
(37, 4, 'CD', 'Congo, Dem. Rep.', '243', '1', 0, NULL, NULL, NULL, NULL),
(38, 4, 'CF', 'Central African Republic', '236', '1', 0, NULL, NULL, NULL, NULL),
(39, 4, 'CG', 'Congo', '242', '1', 0, NULL, NULL, NULL, NULL),
(40, 22, 'CH', 'Switzerland', '41', '1', 0, NULL, NULL, NULL, NULL),
(41, 20, 'CI', 'Ivory', '225', '1', 0, NULL, NULL, NULL, NULL),
(42, 15, 'CK', 'Chile', '682', '1', 0, NULL, NULL, NULL, NULL),
(43, 8, 'CN', 'China', '86', '1', 0, NULL, NULL, NULL, NULL),
(44, 15, 'CO', 'Colombia', '57', '1', 0, NULL, NULL, NULL, NULL),
(45, 5, 'CR', 'Costa Rica', '506', '1', 1, NULL, NULL, NULL, NULL),
(46, 19, 'CS', 'Serbia and Montenegro', '', '1', 0, NULL, NULL, NULL, NULL),
(47, 3, 'CU', 'Cuba', '53', '1', 0, NULL, NULL, NULL, NULL),
(48, 20, 'CV', 'Cape Verde', '238', '1', 1, NULL, NULL, NULL, NULL),
(49, 10, 'CY', 'Cyprus', '357', '1', 0, NULL, NULL, NULL, NULL),
(50, 9, 'CZ', 'Czech Republic', '420', '1', 0, NULL, NULL, NULL, NULL),
(51, 22, 'DE', 'Germany', '49', '1', 0, NULL, NULL, NULL, NULL),
(52, 7, 'DJ', 'Djibouti', '253', '1', 1, NULL, NULL, NULL, NULL),
(53, 13, 'DK', 'Denmark', '45', '1', 0, NULL, NULL, NULL, NULL),
(54, 3, 'DM', 'Dominica', '1767', '1', 0, NULL, NULL, NULL, NULL),
(55, 3, 'DO', 'Dominican Republic', '1809', '1', 0, NULL, NULL, NULL, NULL),
(56, 12, 'DZ', 'Algeria', '213', '1', 0, NULL, NULL, NULL, NULL),
(57, 15, 'EC', 'Ecuador', '593', '1', 0, NULL, NULL, NULL, NULL),
(58, 13, 'EE', 'Estonia', '372', '1', 0, NULL, NULL, NULL, NULL),
(59, 10, 'EG', 'Egypt', '20', '1', 0, NULL, NULL, NULL, NULL),
(60, 7, 'ER', 'Eritrea', '291', '1', 0, NULL, NULL, NULL, NULL),
(61, 19, 'ES', 'Spain', '34', '1', 0, NULL, NULL, NULL, NULL),
(62, 7, 'ET', 'Ethiopia', '251', '1', 0, NULL, NULL, NULL, NULL),
(63, 13, 'FI', 'Finland', '358', '1', 0, NULL, NULL, NULL, NULL),
(64, 14, 'FJ', 'Fiji', '679', '1', 0, NULL, NULL, NULL, NULL),
(66, 14, 'FM', 'Micronesia', '691', '1', 1, NULL, NULL, NULL, NULL),
(67, 13, 'FO', 'Faroe', '298', '1', 0, NULL, NULL, NULL, NULL),
(68, 22, 'FR', 'France', '33', '1', 0, NULL, NULL, NULL, NULL),
(69, 4, 'GA', 'Gabon', '241', '1', 1, NULL, NULL, NULL, NULL),
(71, 3, 'GD', 'Grenada', '1473', '1', 0, NULL, NULL, NULL, NULL),
(72, 21, 'GE', 'Georgia', '995', '1', 0, NULL, NULL, NULL, NULL),
(73, 15, 'GF', 'French Guayana', '594', '1', 1, NULL, NULL, NULL, NULL),
(74, 20, 'GH', 'Ghana', '233', '1', 0, NULL, NULL, NULL, NULL),
(75, 20, 'GM', 'Gambia', '220', '1', 0, NULL, NULL, NULL, NULL),
(76, 20, 'GN', 'Guinea', '224', '1', 1, NULL, NULL, NULL, NULL),
(77, 3, 'GP', 'Guadeloupe', '590', '1', 1, NULL, NULL, NULL, NULL),
(78, 4, 'GQ', 'Equatorial Guinea', '240', '1', 1, NULL, NULL, NULL, NULL),
(79, 19, 'GR', 'Greece', '30', '1', 0, NULL, NULL, NULL, NULL),
(80, 5, 'GT', 'Guatemala', '502', '1', 0, NULL, NULL, NULL, NULL),
(81, 14, 'GU', 'Guam', '1671', '1', 1, NULL, NULL, NULL, NULL),
(82, 20, 'GW', 'Guinea-Bissau', '245', '1', 1, NULL, NULL, NULL, NULL),
(83, 15, 'GY', 'Guyana', '592', '1', 1, NULL, NULL, NULL, NULL),
(84, 8, 'HK', 'Hong Kong', '852', '1', 0, NULL, NULL, NULL, NULL),
(85, 5, 'HN', 'Honduras', '504', '1', 0, NULL, NULL, NULL, NULL),
(86, 19, 'HR', 'Croatia', '385', '1', 0, NULL, NULL, NULL, NULL),
(87, 3, 'HT', 'Haiti', '509', '1', 0, NULL, NULL, NULL, NULL),
(88, 9, 'HU', 'Hungary', '36', '1', 0, NULL, NULL, NULL, NULL),
(89, 17, 'ID', 'Indonesia', '62', '1', 0, NULL, NULL, NULL, NULL),
(90, 13, 'IE', 'Ireland', '353', '1', 0, NULL, NULL, NULL, NULL),
(91, 10, 'IL', 'Israel', '972', '1', 0, NULL, NULL, NULL, NULL),
(92, 16, 'IN', 'India', '91', '1', 0, NULL, NULL, NULL, NULL),
(93, 10, 'IQ', 'Iraq', '964', '1', 0, NULL, NULL, NULL, NULL),
(94, 16, 'IR', 'Iran', '98', '1', 0, NULL, NULL, NULL, NULL),
(95, 13, 'IS', 'Iceland', '354', '1', 0, NULL, NULL, NULL, NULL),
(96, 19, 'IT', 'Italy', '39', '1', 0, NULL, NULL, NULL, NULL),
(97, 3, 'JM', 'Jamaica', '1876', '1', 0, NULL, NULL, NULL, NULL),
(98, 10, 'JO', 'Jordan', '962', '1', 0, NULL, NULL, NULL, NULL),
(99, 8, 'JP', 'Japan', '81', '1', 0, NULL, NULL, NULL, NULL),
(100, 7, 'KE', 'Kenya', '254', '1', 0, NULL, NULL, NULL, NULL),
(101, 6, 'KG', 'Kyrgyzstan', '996', '1', 0, NULL, NULL, NULL, NULL),
(102, 17, 'KH', 'Cambodia', '855', '1', 0, NULL, NULL, NULL, NULL),
(103, 14, 'KI', 'Kiribati', '686', '1', 1, NULL, NULL, NULL, NULL),
(104, 7, 'KM', 'Comoros', '269', '1', 1, NULL, NULL, NULL, NULL),
(105, 3, 'KN', 'St Kitts and Nevis', '1869', '1', 1, NULL, NULL, NULL, NULL),
(106, 14, 'KP', 'North Korea', '850', '1', 0, NULL, NULL, NULL, NULL),
(107, 8, 'KR', 'South Korea', '82', '1', 0, NULL, NULL, NULL, NULL),
(108, 10, 'KW', 'Kuwait', '965', '1', 0, NULL, NULL, NULL, NULL),
(109, 3, 'KY', 'Cayman Islands', '1345', '1', 1, NULL, NULL, NULL, NULL),
(110, 6, 'KZ', 'Kazakhstan', '7', '1', 0, NULL, NULL, NULL, NULL),
(111, 17, 'LA', 'Laos', '856', '1', 1, NULL, NULL, NULL, NULL),
(112, 10, 'LB', 'Lebanon', '961', '1', 0, NULL, NULL, NULL, NULL),
(113, 3, 'LC', 'St Lucia', '1758', '1', 1, NULL, NULL, NULL, NULL),
(115, 16, 'LK', 'Sri Lanka', '94', '1', 0, NULL, NULL, NULL, NULL),
(116, 20, 'LR', 'Liberia', '231', '1', 0, NULL, NULL, NULL, NULL),
(117, 18, 'LS', 'Lesotho', '266', '1', 1, NULL, NULL, NULL, NULL),
(118, 13, 'LT', 'Lithuania', '370', '1', 0, NULL, NULL, NULL, NULL),
(119, 22, 'LU', 'Luxembourg', '352', '1', 0, NULL, NULL, NULL, NULL),
(120, 13, 'LV', 'Latvia', '371', '1', 0, NULL, NULL, NULL, NULL),
(121, 12, 'LY', 'Libya', '218', '1', 0, NULL, NULL, NULL, NULL),
(122, 12, 'MA', 'Morocco', '212', '1', 0, NULL, NULL, NULL, NULL),
(123, 19, 'MC', 'Monaco', '377', '1', 1, NULL, NULL, NULL, NULL),
(124, 9, 'MD', 'Moldova', '373', '1', 0, NULL, NULL, NULL, NULL),
(125, 19, 'ME', 'Montenegro', '382', '1', 0, NULL, NULL, NULL, NULL),
(126, 7, 'MG', 'Madagascar', '261', '1', 0, NULL, NULL, NULL, NULL),
(127, 14, 'MH', 'Marshall Islands', '692', '1', 1, NULL, NULL, NULL, NULL),
(128, 19, 'MK', 'Macedonia', '389', '1', 0, NULL, NULL, NULL, NULL),
(129, 20, 'ML', 'Mali', '223', '1', 0, NULL, NULL, NULL, NULL),
(130, 17, 'MM', 'Myanmar', '95', '1', 0, NULL, NULL, NULL, NULL),
(131, 8, 'MN', 'Mongolia', '976', '1', 0, NULL, NULL, NULL, NULL),
(132, 8, 'MO', 'Macau', '853', '1', 0, NULL, NULL, NULL, NULL),
(133, 3, 'MQ', 'Martinique', '596', '1', 1, NULL, NULL, NULL, NULL),
(134, 7, 'MR', 'Mauritania', '222', '1', 1, NULL, NULL, NULL, NULL),
(135, 19, 'MT', 'Malta', '356', '1', 0, NULL, NULL, NULL, NULL),
(136, 20, 'MU', 'Mauritius', '230', '1', 1, NULL, NULL, NULL, NULL),
(137, 16, 'MV', 'Maldives', '960', '1', 0, NULL, NULL, NULL, NULL),
(138, 7, 'MW', 'Malawi', '265', '1', 1, NULL, NULL, NULL, NULL),
(139, 11, 'MX', 'Mexico', '52', '1', 0, NULL, NULL, NULL, NULL),
(140, 17, 'MY', 'Malaysia', '60', '1', 0, NULL, NULL, NULL, NULL),
(141, 7, 'MZ', 'Mozambique', '258', '1', 0, NULL, NULL, NULL, NULL),
(142, 18, 'NA', 'Namibia', '264', '1', 0, NULL, NULL, NULL, NULL),
(143, 14, 'NC', 'New Caledonia', '687', '1', 1, NULL, NULL, NULL, NULL),
(144, 20, 'NE', 'Niger', '227', '1', 1, NULL, NULL, NULL, NULL),
(145, 20, 'NG', 'Nigeria', '234', '1', 0, NULL, NULL, NULL, NULL),
(146, 5, 'NI', 'Nicaragua', '505', '1', 0, NULL, NULL, NULL, NULL),
(147, 22, 'NL', 'Netherlands', '31', '1', 0, NULL, NULL, NULL, NULL),
(148, 13, 'NO', 'Norway', '47', '1', 0, NULL, NULL, NULL, NULL),
(149, 16, 'NP', 'Nepal', '977', '1', 0, NULL, NULL, NULL, NULL),
(150, 14, 'NR', 'Nauru', '674', '1', 0, NULL, NULL, NULL, NULL),
(151, 14, 'NU', 'Niue', '683', '1', 1, NULL, NULL, NULL, NULL),
(152, 14, 'NZ', 'New Zealand', '64', '1', 0, NULL, NULL, NULL, NULL),
(153, 10, 'OM', 'Oman', '968', '1', 1, NULL, NULL, NULL, NULL),
(154, 5, 'PA', 'Panama', '507', '1', 0, NULL, NULL, NULL, NULL),
(155, 15, 'PE', 'Peru', '51', '1', 0, NULL, NULL, NULL, NULL),
(156, 14, 'PF', 'French Polynesia', '689', '1', 1, NULL, NULL, NULL, NULL),
(157, 17, 'PG', 'Papua New Guinea', '675', '1', 0, NULL, NULL, NULL, NULL),
(159, 16, 'PK', 'Pakistan', '92', '1', 0, NULL, NULL, NULL, NULL),
(160, 9, 'PL', 'Poland', '48', '1', 0, NULL, NULL, NULL, NULL),
(162, 3, 'PR', 'Puerto Rico', '1', '1', 0, NULL, NULL, NULL, NULL),
(163, 10, 'PS', 'Palestine', '970', '1', 0, NULL, NULL, NULL, NULL),
(164, 19, 'PT', 'Portugal', '351', '1', 0, NULL, NULL, NULL, NULL),
(165, 15, 'PY', 'Paraguay', '595', '1', 0, NULL, NULL, NULL, NULL),
(166, 10, 'QA', 'Qatar', '974', '1', 0, NULL, NULL, NULL, NULL),
(168, 9, 'RO', 'Romania', '40', '1', 0, NULL, NULL, NULL, NULL),
(170, 9, 'RU', 'Russia', '7', '1', 0, NULL, NULL, NULL, NULL),
(171, 7, 'RW', 'Rwanda', '250', '1', 0, NULL, NULL, NULL, NULL),
(172, 10, 'SA', 'Saudi Arabia', '966', '1', 0, NULL, NULL, NULL, NULL),
(173, 14, 'SB', 'Solomon Islands', '677', '1', 1, NULL, NULL, NULL, NULL),
(174, 7, 'SC', 'Seychelles', '248', '1', 1, NULL, NULL, NULL, NULL),
(175, 12, 'SD', 'Sudan', '249', '1', 0, NULL, NULL, NULL, NULL),
(177, 17, 'SG', 'Singapore', '65', '1', 0, NULL, NULL, NULL, NULL),
(178, 19, 'SI', 'Slovenia', '386', '1', 0, NULL, NULL, NULL, NULL),
(179, 9, 'SK', 'Slovakia', '421', '1', 0, NULL, NULL, NULL, NULL),
(180, 20, 'SL', 'Sierra Leone', '232', '1', 0, NULL, NULL, NULL, NULL),
(181, 19, 'SM', 'San Marino', '378', '1', 1, NULL, NULL, NULL, NULL),
(182, 20, 'SN', 'Senegal', '221', '1', 0, NULL, NULL, NULL, NULL),
(183, 7, 'SO', 'Somalia', '252', '1', 0, NULL, NULL, NULL, NULL),
(184, 15, 'SR', 'Suriname', '597', '1', 1, NULL, NULL, NULL, NULL),
(185, 4, 'ST', 'São Tomé und Príncipe', '239', '1', 1, NULL, NULL, NULL, NULL),
(186, 5, 'SV', 'El Salvador', '503', '1', 1, NULL, NULL, NULL, NULL),
(187, 13, 'SE', 'Sweden', '46', '1', 0, NULL, NULL, NULL, NULL),
(188, 10, 'SY', 'Syria', '963', '1', 0, NULL, NULL, NULL, NULL),
(189, 18, 'SZ', 'Swaziland', '268', '1', 1, NULL, NULL, NULL, NULL),
(190, 4, 'TD', 'Chad', '235', '1', 1, NULL, NULL, NULL, NULL),
(191, 20, 'TG', 'Togo', '228', '1', 1, NULL, NULL, NULL, NULL),
(192, 17, 'TH', 'Thailand', '66', '1', 0, NULL, NULL, NULL, NULL),
(193, 6, 'TJ', 'Tajikistan', '992', '1', 0, NULL, NULL, NULL, NULL),
(194, 17, 'TL', 'Timor-Leste', '670', '1', 1, NULL, NULL, NULL, NULL),
(195, 6, 'TM', 'Turkmenistan', '993', '1', 0, NULL, NULL, NULL, NULL),
(196, 12, 'TN', 'Tunisia', '216', '1', 0, NULL, NULL, NULL, NULL),
(197, 14, 'TO', 'Tonga', '676', '1', 1, NULL, NULL, NULL, NULL),
(198, 21, 'TR', 'Turkey', '90', '1', 0, NULL, NULL, NULL, NULL),
(199, 15, 'TT', 'Trinidad and Tobago', '1868', '1', 1, NULL, NULL, NULL, NULL),
(200, 14, 'TV', 'Tuvalu', '688', '1', 1, NULL, NULL, NULL, NULL),
(201, 8, 'TW', 'Taiwan', '886', '1', 0, NULL, NULL, NULL, NULL),
(202, 7, 'TZ', 'Tanzania', '255', '1', 0, NULL, NULL, NULL, NULL),
(203, 9, 'UA', 'Ukraine', '380', '1', 0, NULL, NULL, NULL, NULL),
(204, 7, 'UG', 'Uganda', '256', '1', 0, NULL, NULL, NULL, NULL),
(206, 15, 'UY', 'Uruguay', '598', '1', 0, NULL, NULL, NULL, NULL),
(207, 6, 'UZ', 'Uzbekistan', '998', '1', 0, NULL, NULL, NULL, NULL),
(208, 3, 'VC', 'St Vincent', '1784', '1', 1, NULL, NULL, NULL, NULL),
(209, 15, 'VE', 'Venezuela', '58', '1', 0, NULL, NULL, NULL, NULL),
(210, 3, 'VG', 'Virgin Islands British', '1284', '1', 1, NULL, NULL, NULL, NULL),
(211, 3, 'VI', 'Virgin Islands, United States', '1340', '1', 1, NULL, NULL, NULL, NULL),
(212, 17, 'VN', 'Vietnam', '84', '1', 0, NULL, NULL, NULL, NULL),
(213, 14, 'VU', 'Vanuatu', '678', '1', 1, NULL, NULL, NULL, NULL),
(214, 10, 'YE', 'Yemen', '967', '1', 0, NULL, NULL, NULL, NULL),
(215, 18, 'ZA', 'South Africa', '27', '1', 0, NULL, NULL, NULL, NULL),
(216, 7, 'ZM', 'Zambia', '260', '1', 0, NULL, NULL, NULL, NULL),
(217, 7, 'ZW', 'Zimbabwe', '263', '1', 0, NULL, NULL, NULL, NULL),
(222, 1, 'TE', 'test', '', '1', 1, NULL, NULL, NULL, NULL),
(205, 11, 'US', 'USA', '1', '1', 0, NULL, NULL, NULL, NULL),
(233, 1, 'zz', 'test', '', '1', 1, NULL, NULL, NULL, NULL),
(3, 19, 'AD', 'Andorra', '376', '1', 1, NULL, NULL, NULL, NULL),
(158, 17, 'PH', 'Philippines', '63', '1', 0, NULL, NULL, NULL, NULL),
(234, 22, 'GB', 'United Kingdom', '', '1', 0, NULL, NULL, NULL, NULL),
(235, 30, '00', 'International', '', '1', 0, NULL, NULL, NULL, NULL),
(65, 22, 'FL', 'Liechtenstein', '423', '1', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gg_country_block`
--

CREATE TABLE `gg_country_block` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gg_country_block`
--

INSERT INTO `gg_country_block` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Central Asia', '1', '2013-02-26 19:00:00', NULL),
(5, 'Central America', '1', '2013-02-26 19:00:00', NULL),
(4, 'Central Africa', '1', '2013-02-26 19:00:00', NULL),
(3, 'Caribbean', '1', '2013-02-26 19:00:00', NULL),
(2, 'Australia', '1', '2013-02-26 19:00:00', NULL),
(1, 'Antarctica', '1', '2013-02-26 19:00:00', NULL),
(7, 'Eastern Africa', '1', '2013-02-26 19:00:00', NULL),
(8, 'Eastern Asia', '1', '2013-02-26 19:00:00', NULL),
(9, 'Eastern Europe', '1', '2013-02-26 19:00:00', NULL),
(10, 'Middle East', '1', '2013-02-26 19:00:00', NULL),
(11, 'North America', '1', '2013-02-26 19:00:00', NULL),
(12, 'Northern Africa', '1', '2013-02-26 19:00:00', NULL),
(13, 'Northern Europe', '1', '2013-02-26 19:00:00', NULL),
(14, 'Oceania', '1', '2013-02-26 19:00:00', NULL),
(15, 'South America', '1', '2013-02-26 19:00:00', NULL),
(16, 'South-Central Asia', '1', '2013-02-26 19:00:00', NULL),
(17, 'South-East Asia', '1', '2013-02-26 19:00:00', NULL),
(18, 'Southern Africa', '1', '2013-02-26 19:00:00', NULL),
(19, 'Southern Europe', '1', '2013-02-26 19:00:00', NULL),
(20, 'Western Africa', '1', '2013-02-26 19:00:00', NULL),
(21, 'Western Asia', '1', '2013-02-26 19:00:00', NULL),
(22, 'Western Europe', '1', '2013-02-26 19:00:00', NULL),
(23, 'test', '1', '2013-03-19 22:21:45', NULL),
(24, 'test', '0', '2013-04-10 08:57:53', NULL),
(25, 'test', '1', '2013-06-27 01:45:29', NULL),
(26, 'Asia', '1', '2013-09-26 10:22:17', NULL),
(27, 'Scandinavia', '1', '2013-09-26 10:23:33', NULL),
(28, 'Nordic countries', '1', '2013-09-26 10:24:21', NULL),
(29, 'EU', '1', '2013-09-26 10:24:46', NULL),
(30, 'International', '1', '2013-10-25 08:51:38', NULL),
(31, 'West India - Caribbean', '1', '2014-03-19 10:42:43', NULL),
(32, 'Africa', '1', '2014-03-19 10:45:17', NULL),
(6, 'Central Asia', '1', '2013-02-26 19:00:00', NULL),
(5, 'Central America', '1', '2013-02-26 19:00:00', NULL),
(4, 'Central Africa', '1', '2013-02-26 19:00:00', NULL),
(3, 'Caribbean', '1', '2013-02-26 19:00:00', NULL),
(2, 'Australia', '1', '2013-02-26 19:00:00', NULL),
(1, 'Antarctica', '1', '2013-02-26 19:00:00', NULL),
(7, 'Eastern Africa', '1', '2013-02-26 19:00:00', NULL),
(8, 'Eastern Asia', '1', '2013-02-26 19:00:00', NULL),
(9, 'Eastern Europe', '1', '2013-02-26 19:00:00', NULL),
(10, 'Middle East', '1', '2013-02-26 19:00:00', NULL),
(11, 'North America', '1', '2013-02-26 19:00:00', NULL),
(12, 'Northern Africa', '1', '2013-02-26 19:00:00', NULL),
(13, 'Northern Europe', '1', '2013-02-26 19:00:00', NULL),
(14, 'Oceania', '1', '2013-02-26 19:00:00', NULL),
(15, 'South America', '1', '2013-02-26 19:00:00', NULL),
(16, 'South-Central Asia', '1', '2013-02-26 19:00:00', NULL),
(17, 'South-East Asia', '1', '2013-02-26 19:00:00', NULL),
(18, 'Southern Africa', '1', '2013-02-26 19:00:00', NULL),
(19, 'Southern Europe', '1', '2013-02-26 19:00:00', NULL),
(20, 'Western Africa', '1', '2013-02-26 19:00:00', NULL),
(21, 'Western Asia', '1', '2013-02-26 19:00:00', NULL),
(22, 'Western Europe', '1', '2013-02-26 19:00:00', NULL),
(23, 'test', '1', '2013-03-19 22:21:45', NULL),
(24, 'test', '0', '2013-04-10 08:57:53', NULL),
(25, 'test', '1', '2013-06-27 01:45:29', NULL),
(26, 'Asia', '1', '2013-09-26 10:22:17', NULL),
(27, 'Scandinavia', '1', '2013-09-26 10:23:33', NULL),
(28, 'Nordic countries', '1', '2013-09-26 10:24:21', NULL),
(29, 'EU', '1', '2013-09-26 10:24:46', NULL),
(30, 'International', '1', '2013-10-25 08:51:38', NULL),
(31, 'West India - Caribbean', '1', '2014-03-19 10:42:43', NULL),
(32, 'Africa', '1', '2014-03-19 10:45:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gg_donors`
--

CREATE TABLE `gg_donors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gg_foundation`
--

CREATE TABLE `gg_foundation` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sort` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `administrator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `system_generated_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tillsyn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_to_free_users` tinyint(3) UNSIGNED DEFAULT NULL,
  `verification_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified_date` datetime DEFAULT NULL,
  `deleted` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` bigint(20) UNSIGNED DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gg_foundation`
--

INSERT INTO `gg_foundation` (`id`, `user_id`, `sort`, `name`, `administrator`, `status`, `asset`, `source`, `language`, `type`, `system_generated_url`, `org_no`, `remarks`, `tillsyn`, `show_to_free_users`, `verification_code`, `verified_date`, `deleted`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(5729, 1, NULL, NULL, NULL, '1', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5730, 1, 'testf', 'test foundation', 'testadmin', '1', 'testtt assests', 'testtttt', '1', 'testing', NULL, '876543654', '<p>no</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gg_foundation_advertise`
--

CREATE TABLE `gg_foundation_advertise` (
  `id` int(10) UNSIGNED NOT NULL,
  `foundation_id` int(10) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `who_can_apply` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `misc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gg_foundation_age`
--

CREATE TABLE `gg_foundation_age` (
  `id` int(10) UNSIGNED NOT NULL,
  `foundation_id` int(10) UNSIGNED NOT NULL,
  `from` tinyint(3) UNSIGNED DEFAULT NULL,
  `to` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gg_foundation_application`
--

CREATE TABLE `gg_foundation_application` (
  `id` int(10) UNSIGNED NOT NULL,
  `foundation_id` int(10) UNSIGNED NOT NULL,
  `sequence` tinyint(3) UNSIGNED NOT NULL,
  `application_form` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gg_foundation_contact`
--

CREATE TABLE `gg_foundation_contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `foundation_id` int(10) UNSIGNED NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gg_foundation_contact`
--

INSERT INTO `gg_foundation_contact` (`id`, `foundation_id`, `phone_no`, `mobile_no`, `email`, `website`, `address1`, `address2`, `address3`, `zip`, `c_name`, `c_phone_no`, `c_mobile_no`, `c_address`, `c_email`) VALUES
(1, 5729, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 5730, '0987654326543', '9876543222', 'viktor@sixwebsoft.com', NULL, 'tesrrrrrrrr', 'tesrrrrrrrraddsd', 'tesrrrrrrrrssssssssssssss', '6543233', 'jsjdsjdsbds', '8765456789876', '876543243344', '6ndjbdsbdsh', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `gg_foundation_dates`
--

CREATE TABLE `gg_foundation_dates` (
  `id` int(10) UNSIGNED NOT NULL,
  `foundation_id` int(10) UNSIGNED NOT NULL,
  `sequence` tinyint(3) UNSIGNED DEFAULT NULL,
  `start_month` tinyint(3) UNSIGNED DEFAULT NULL,
  `start_day` tinyint(3) UNSIGNED DEFAULT NULL,
  `end_month` tinyint(3) UNSIGNED DEFAULT NULL,
  `end_day` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gg_foundation_gender`
--

CREATE TABLE `gg_foundation_gender` (
  `id` int(10) UNSIGNED NOT NULL,
  `foundation_id` int(10) UNSIGNED NOT NULL,
  `param_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gg_foundation_instructions`
--

CREATE TABLE `gg_foundation_instructions` (
  `id` int(10) UNSIGNED NOT NULL,
  `foundation_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` tinyint(3) UNSIGNED NOT NULL,
  `instructions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gg_foundation_location`
--

CREATE TABLE `gg_foundation_location` (
  `id` int(10) UNSIGNED NOT NULL,
  `foundation_id` int(10) UNSIGNED NOT NULL,
  `sequence` tinyint(3) UNSIGNED DEFAULT NULL,
  `nation_id` int(10) UNSIGNED DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `region_id` int(10) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parish` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gg_foundation_location`
--

INSERT INTO `gg_foundation_location` (`id`, `foundation_id`, `sequence`, `nation_id`, `country_id`, `region_id`, `city_id`, `parish`) VALUES
(1, 5729, NULL, 0, 0, 0, 0, NULL),
(2, 5730, NULL, 6, 0, 0, 0, '2323');

-- --------------------------------------------------------

--
-- Table structure for table `gg_foundation_purpose`
--

CREATE TABLE `gg_foundation_purpose` (
  `id` int(10) UNSIGNED NOT NULL,
  `foundation_id` int(10) UNSIGNED NOT NULL,
  `param_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gg_foundation_save_count`
--

CREATE TABLE `gg_foundation_save_count` (
  `id` int(10) UNSIGNED NOT NULL,
  `foundation_id` int(10) UNSIGNED NOT NULL,
  `frontend_count` int(10) UNSIGNED NOT NULL,
  `backend_count` int(10) UNSIGNED NOT NULL,
  `list_total` int(10) UNSIGNED NOT NULL,
  `user_total` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gg_foundation_subject`
--

CREATE TABLE `gg_foundation_subject` (
  `id` int(10) UNSIGNED NOT NULL,
  `foundation_id` int(10) UNSIGNED NOT NULL,
  `param_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gg_labels`
--

CREATE TABLE `gg_labels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gg_labels`
--

INSERT INTO `gg_labels` (`id`, `group_id`, `label`, `created_at`, `updated_at`) VALUES
(1, 5, 'alingsås', NULL, NULL),
(2, 5, 'arboga', NULL, NULL),
(3, 5, 'arvika', NULL, NULL),
(4, 5, 'askersund', NULL, NULL),
(5, 5, 'avesta', NULL, NULL),
(6, 5, 'boden', NULL, NULL),
(7, 5, 'bollnäs', NULL, NULL),
(8, 5, 'borgholm', NULL, NULL),
(9, 5, 'borlänge', NULL, NULL),
(10, 5, 'borås', NULL, NULL),
(11, 5, 'djursholm', NULL, NULL),
(12, 5, 'eksjö', NULL, NULL),
(13, 5, 'enköping', NULL, NULL),
(14, 5, 'eskilstuna', NULL, NULL),
(15, 5, 'eslöv', NULL, NULL),
(16, 5, 'fagersta', NULL, NULL),
(17, 5, 'falkenberg', NULL, NULL),
(18, 5, 'falköping', NULL, NULL),
(19, 5, 'falsterbo', NULL, NULL),
(20, 5, 'falun', NULL, NULL),
(21, 5, 'filipstad', NULL, NULL),
(22, 5, 'flen', NULL, NULL),
(23, 5, 'gränna', NULL, NULL),
(24, 5, 'gävle', NULL, NULL),
(25, 5, 'hagfors', NULL, NULL),
(26, 5, 'halmstad', NULL, NULL),
(27, 5, 'haparanda', NULL, NULL),
(28, 5, 'hedemora', NULL, NULL),
(29, 5, 'helsingborg', NULL, NULL),
(30, 5, 'hjo', NULL, NULL),
(31, 5, 'hudiksvall', NULL, NULL),
(32, 5, 'huskvarna', NULL, NULL),
(33, 5, 'härnösand', NULL, NULL),
(34, 5, 'hässleholm', NULL, NULL),
(35, 5, 'höganäs', NULL, NULL),
(36, 5, 'jönköping', NULL, NULL),
(37, 5, 'kalmar', NULL, NULL),
(38, 5, 'karlshamn', NULL, NULL),
(39, 5, 'karlskoga', NULL, NULL),
(40, 5, 'karlskrona', NULL, NULL),
(41, 5, 'karlstad', NULL, NULL),
(42, 5, 'katrineholm', NULL, NULL),
(43, 5, 'kiruna', NULL, NULL),
(44, 5, 'kramfors', NULL, NULL),
(45, 5, 'kristianstad', NULL, NULL),
(46, 5, 'kristinehamn', NULL, NULL),
(47, 5, 'kumla', NULL, NULL),
(48, 5, 'kungsbacka', NULL, NULL),
(49, 5, 'kungälv', NULL, NULL),
(50, 5, 'köping', NULL, NULL),
(51, 5, 'laholm', NULL, NULL),
(52, 5, 'landskrona', NULL, NULL),
(53, 5, 'lidingö', NULL, NULL),
(54, 5, 'lidköping', NULL, NULL),
(55, 5, 'lindesberg', NULL, NULL),
(56, 5, 'linköping', NULL, NULL),
(57, 5, 'ljungby', NULL, NULL),
(58, 5, 'ludvika', NULL, NULL),
(59, 5, 'luleå', NULL, NULL),
(60, 5, 'lund', NULL, NULL),
(61, 5, 'lycksele', NULL, NULL),
(62, 5, 'lysekil', NULL, NULL),
(63, 5, 'malmö', NULL, NULL),
(64, 5, 'mariefred', NULL, NULL),
(65, 5, 'mariestad', NULL, NULL),
(66, 5, 'marstrand', NULL, NULL),
(67, 5, 'mjölby', NULL, NULL),
(68, 5, 'motala', NULL, NULL),
(69, 5, 'nacka', NULL, NULL),
(70, 5, 'nora', NULL, NULL),
(71, 5, 'norrköping', NULL, NULL),
(72, 5, 'norrtälje', NULL, NULL),
(73, 5, 'nybro', NULL, NULL),
(74, 5, 'nyköping', NULL, NULL),
(75, 5, 'nynäshamn', NULL, NULL),
(76, 5, 'nässjö', NULL, NULL),
(77, 5, 'oskarshamn', NULL, NULL),
(78, 5, 'oxelösund', NULL, NULL),
(79, 5, 'piteå', NULL, NULL),
(80, 5, 'ronneby', NULL, NULL),
(81, 5, 'sala', NULL, NULL),
(82, 5, 'sandviken', NULL, NULL),
(83, 5, 'sigtuna', NULL, NULL),
(84, 5, 'simrishamn', NULL, NULL),
(85, 5, 'skanör med falsterbo', NULL, NULL),
(86, 5, 'skanör', NULL, NULL),
(87, 5, 'skara', NULL, NULL),
(88, 5, 'skellefteå', NULL, NULL),
(89, 5, 'skänninge', NULL, NULL),
(90, 5, 'skövde', NULL, NULL),
(91, 5, 'sollefteå', NULL, NULL),
(92, 5, 'solna', NULL, NULL),
(93, 5, 'stockholm', NULL, NULL),
(94, 5, 'strängnäs', NULL, NULL),
(95, 5, 'strömstad', NULL, NULL),
(96, 5, 'sundbyberg', NULL, NULL),
(97, 5, 'sundsvall', NULL, NULL),
(98, 5, 'säffle', NULL, NULL),
(99, 5, 'säter', NULL, NULL),
(100, 5, 'sävsjö', NULL, NULL),
(101, 5, 'söderhamn', NULL, NULL),
(102, 5, 'söderköping', NULL, NULL),
(103, 5, 'södertälje', NULL, NULL),
(104, 5, 'sölvesborg', NULL, NULL),
(105, 5, 'tidaholm', NULL, NULL),
(106, 5, 'torshälla', NULL, NULL),
(107, 5, 'tranås', NULL, NULL),
(108, 5, 'trelleborg', NULL, NULL),
(109, 5, 'trollhättan', NULL, NULL),
(110, 5, 'trosa', NULL, NULL),
(111, 5, 'uddevalla', NULL, NULL),
(112, 5, 'ulricehamn', NULL, NULL),
(113, 5, 'umeå', NULL, NULL),
(114, 5, 'uppsala', NULL, NULL),
(115, 5, 'vadstena', NULL, NULL),
(116, 5, 'varberg', NULL, NULL),
(117, 5, 'vaxholm', NULL, NULL),
(118, 5, 'vetlanda', NULL, NULL),
(119, 5, 'vimmerby', NULL, NULL),
(120, 5, 'visby', NULL, NULL),
(121, 5, 'vänersborg', NULL, NULL),
(122, 5, 'värnamo', NULL, NULL),
(123, 5, 'västervik', NULL, NULL),
(124, 5, 'västerås', NULL, NULL),
(125, 5, 'växjö', NULL, NULL),
(126, 5, 'ystad', NULL, NULL),
(127, 5, 'åmål', NULL, NULL),
(128, 5, 'ängelholm', NULL, NULL),
(129, 5, 'örebro', NULL, NULL),
(130, 5, 'öregrund', NULL, NULL),
(131, 5, 'örnsköldsvik', NULL, NULL),
(132, 5, 'östersund', NULL, NULL),
(133, 5, 'östhammar', NULL, NULL),
(134, 5, 'cebu', NULL, NULL),
(135, 5, 'mandaue', NULL, NULL),
(136, 5, 'talisay', NULL, NULL),
(137, 5, 'adams', NULL, NULL),
(138, 5, 'bacarra', NULL, NULL),
(139, 5, 'balamban', NULL, NULL),
(140, 5, 'danao', NULL, NULL),
(141, 5, 'ale', NULL, NULL),
(142, 5, 'älmhult', NULL, NULL),
(143, 5, 'älvdalen', NULL, NULL),
(144, 5, 'alvesta', NULL, NULL),
(145, 5, 'älvsbyn', NULL, NULL),
(146, 5, 'aneby', NULL, NULL),
(147, 5, 'ånge', NULL, NULL),
(148, 5, 'åre', NULL, NULL),
(149, 5, 'årjäng', NULL, NULL),
(150, 5, 'arjeplog', NULL, NULL),
(151, 5, 'arvidsjaur', NULL, NULL),
(152, 5, 'åsele', NULL, NULL),
(153, 5, 'åstorp', NULL, NULL),
(154, 5, 'åtvidaberg', NULL, NULL),
(155, 5, 'båstad', NULL, NULL),
(156, 5, 'bengtsfors', NULL, NULL),
(157, 5, 'bjuv', NULL, NULL),
(158, 5, 'bollebygd', NULL, NULL),
(159, 5, 'botkyrka', NULL, NULL),
(160, 5, 'boxholm', NULL, NULL),
(161, 5, 'bräcke', NULL, NULL),
(162, 5, 'bromölla', NULL, NULL),
(163, 5, 'burlöv', NULL, NULL),
(164, 5, 'danderyd', NULL, NULL),
(165, 5, 'degerfors', NULL, NULL),
(166, 5, 'dorotea', NULL, NULL),
(167, 5, 'eda', NULL, NULL),
(168, 5, 'ekerö', NULL, NULL),
(169, 5, 'emmaboda', NULL, NULL),
(170, 5, 'essunga', NULL, NULL),
(171, 5, 'färgelanda', NULL, NULL),
(172, 5, 'finspång', NULL, NULL),
(173, 5, 'forshaga', NULL, NULL),
(174, 5, 'gagnef', NULL, NULL),
(175, 5, 'gällivare', NULL, NULL),
(176, 5, 'gislaved', NULL, NULL),
(177, 5, 'gnesta', NULL, NULL),
(178, 5, 'gnosjö', NULL, NULL),
(179, 5, 'götene', NULL, NULL),
(180, 5, 'grästorp', NULL, NULL),
(181, 5, 'grums', NULL, NULL),
(182, 5, 'gullspång', NULL, NULL),
(183, 5, 'habo', NULL, NULL),
(184, 5, 'håbo', NULL, NULL),
(185, 5, 'hällefors', NULL, NULL),
(186, 5, 'hallsberg', NULL, NULL),
(187, 5, 'hallstahammar', NULL, NULL),
(188, 5, 'hammarö', NULL, NULL),
(189, 5, 'haninge', NULL, NULL),
(190, 5, 'härjedalen', NULL, NULL),
(191, 5, 'härryda', NULL, NULL),
(192, 5, 'heby', NULL, NULL),
(193, 5, 'herrljunga', NULL, NULL),
(194, 5, 'hofors', NULL, NULL),
(195, 5, 'högsby', NULL, NULL),
(196, 5, 'höör', NULL, NULL),
(197, 5, 'hörby', NULL, NULL),
(198, 5, 'huddinge', NULL, NULL),
(199, 5, 'hultsfred', NULL, NULL),
(200, 5, 'hylte', NULL, NULL),
(201, 5, 'järfälla', NULL, NULL),
(202, 5, 'jokkmokk', NULL, NULL),
(203, 5, 'kalix', NULL, NULL),
(204, 5, 'karlsborg', NULL, NULL),
(205, 5, 'kävlinge', NULL, NULL),
(206, 5, 'kinda', NULL, NULL),
(207, 5, 'klippan', NULL, NULL),
(208, 5, 'krokom', NULL, NULL),
(209, 5, 'kungsör', NULL, NULL),
(210, 5, 'leksand', NULL, NULL),
(211, 5, 'lerum', NULL, NULL),
(212, 5, 'ljusdal', NULL, NULL),
(213, 5, 'lomma', NULL, NULL),
(214, 5, 'malå', NULL, NULL),
(215, 5, 'malung', NULL, NULL),
(216, 5, 'mark', NULL, NULL),
(217, 5, 'markaryd', NULL, NULL),
(218, 5, 'mellerud', NULL, NULL),
(219, 5, 'mölndal', NULL, NULL),
(220, 5, 'mönsterås', NULL, NULL),
(221, 5, 'mora', NULL, NULL),
(222, 5, 'mullsjö', NULL, NULL),
(223, 5, 'munkedal', NULL, NULL),
(224, 5, 'munkfors', NULL, NULL),
(225, 5, 'norberg', NULL, NULL),
(226, 5, 'nordanstig', NULL, NULL),
(227, 5, 'nordmaling', NULL, NULL),
(228, 5, 'norsjö', NULL, NULL),
(229, 5, 'ockelbo', NULL, NULL),
(230, 5, 'öckerö', NULL, NULL),
(231, 5, 'ödeshög', NULL, NULL),
(232, 5, 'olofström', NULL, NULL),
(233, 5, 'örkelljunga', NULL, NULL),
(234, 5, 'orsa', NULL, NULL),
(235, 5, 'orust', NULL, NULL),
(236, 5, 'osby', NULL, NULL),
(237, 5, 'österåker', NULL, NULL),
(238, 5, 'östra göinge', NULL, NULL),
(239, 5, 'ovanåker', NULL, NULL),
(240, 5, 'övertorneå', NULL, NULL),
(241, 5, 'pajala', NULL, NULL),
(242, 5, 'partille', NULL, NULL),
(243, 5, 'perstorp', NULL, NULL),
(244, 5, 'ragunda', NULL, NULL),
(245, 5, 'rättvik', NULL, NULL),
(246, 5, 'robertsfors', NULL, NULL),
(247, 5, 'salem', NULL, NULL),
(248, 5, 'sjöbo', NULL, NULL),
(249, 5, 'skinnskatteberg', NULL, NULL),
(250, 5, 'skurup', NULL, NULL),
(251, 5, 'smedjebacken', NULL, NULL),
(252, 5, 'sollentuna', NULL, NULL),
(253, 5, 'sotenäs', NULL, NULL),
(254, 5, 'staffanstorp', NULL, NULL),
(255, 5, 'storuman', NULL, NULL),
(256, 5, 'strömsund', NULL, NULL),
(257, 5, 'sunne', NULL, NULL),
(258, 5, 'surahammar', NULL, NULL),
(259, 5, 'svalöv', NULL, NULL),
(260, 5, 'svedala', NULL, NULL),
(261, 5, 'sveg', NULL, NULL),
(262, 5, 'svenljunga', NULL, NULL),
(263, 5, 'täby', NULL, NULL),
(264, 5, 'tanum', NULL, NULL),
(265, 5, 'tibro', NULL, NULL),
(266, 5, 'tierp', NULL, NULL),
(267, 5, 'timrå', NULL, NULL),
(268, 5, 'tingsryd', NULL, NULL),
(269, 5, 'tjörn', NULL, NULL),
(270, 5, 'tomelilla', NULL, NULL),
(271, 5, 'torsås', NULL, NULL),
(272, 5, 'torsby', NULL, NULL),
(273, 5, 'tranemo', NULL, NULL),
(274, 5, 'tyresö', NULL, NULL),
(275, 5, 'upplands väsby', NULL, NULL),
(276, 5, 'upplands bro', NULL, NULL),
(277, 5, 'uppvidinge', NULL, NULL),
(278, 5, 'vaggeryd', NULL, NULL),
(279, 5, 'valdemarsvik', NULL, NULL),
(280, 5, 'vallentuna', NULL, NULL),
(281, 5, 'vännäs', NULL, NULL),
(282, 5, 'vansbro', NULL, NULL),
(283, 5, 'vara', NULL, NULL),
(284, 5, 'värmdö', NULL, NULL),
(285, 5, 'vellinge', NULL, NULL),
(286, 5, 'vilhelmina', NULL, NULL),
(287, 5, 'vindeln', NULL, NULL),
(288, 5, 'vingåker', NULL, NULL),
(289, 5, 'ydre', NULL, NULL),
(290, 5, 'åhus', NULL, NULL),
(291, 5, 'akademiska sjukhuset', NULL, NULL),
(292, 5, 'älvsborgs län', NULL, NULL),
(293, 5, 'ångermanland', NULL, NULL),
(294, 5, 'anundsjö', NULL, NULL),
(295, 5, 'balkan', NULL, NULL),
(296, 5, 'baltikum', NULL, NULL),
(297, 5, 'blekinge', NULL, NULL),
(298, 5, 'bohuslän', NULL, NULL),
(299, 5, 'chalmers', NULL, NULL),
(300, 5, 'dalarna', NULL, NULL),
(301, 5, 'dalsland', NULL, NULL),
(302, 5, 'delsbo', NULL, NULL),
(303, 5, 'efta', NULL, NULL),
(304, 5, 'estland', NULL, NULL),
(305, 5, 'frankrike', NULL, NULL),
(306, 5, 'gästrikland', NULL, NULL),
(307, 5, 'gävleborg', NULL, NULL),
(308, 5, 'göteborg', NULL, NULL),
(309, 5, 'göteborg och bohuslän', NULL, NULL),
(310, 5, 'göteborgs universitet', NULL, NULL),
(311, 5, 'gotland', NULL, NULL),
(312, 5, 'gymnastik och idrottshögskolan', NULL, NULL),
(313, 5, 'haabo', NULL, NULL),
(314, 5, 'halland', NULL, NULL),
(315, 5, 'hälsingland', NULL, NULL),
(316, 5, 'handelshögskolan', NULL, NULL),
(317, 5, 'högskolan i borlänge', NULL, NULL),
(318, 5, 'högskolan i gävle', NULL, NULL),
(319, 5, 'högskolan i jönköping', NULL, NULL),
(320, 5, 'högskolan i kalmar', NULL, NULL),
(321, 5, 'högskolan i kristianstad', NULL, NULL),
(322, 5, 'högskolan i skövde', NULL, NULL),
(323, 5, 'högskolan i växjö', NULL, NULL),
(324, 5, 'jämtland', NULL, NULL),
(325, 5, 'judar', NULL, NULL),
(326, 5, 'jude', NULL, NULL),
(327, 5, 'kalmar kommun', NULL, NULL),
(328, 5, 'kalmar län', NULL, NULL),
(329, 5, 'kanada', NULL, NULL),
(330, 5, 'karolinska institutet', NULL, NULL),
(331, 5, 'karolinska sjukhuset', NULL, NULL),
(332, 5, 'konstfack', NULL, NULL),
(333, 5, 'kronobergs län', NULL, NULL),
(334, 5, 'kungliga tekniska högskolan', NULL, NULL),
(335, 5, 'lappland', NULL, NULL),
(336, 5, 'lärarhögskolan i stockholm', NULL, NULL),
(337, 5, 'lettland', NULL, NULL),
(338, 5, 'lindome', NULL, NULL),
(339, 5, 'linköpings universitet', NULL, NULL),
(340, 5, 'luleå tekniska högskola', NULL, NULL),
(341, 5, 'lunds tekniska högskola', NULL, NULL),
(342, 5, 'lunds universitet', NULL, NULL),
(343, 5, 'madeira', NULL, NULL),
(344, 5, 'malmö högskola', NULL, NULL),
(345, 5, 'malmöhus', NULL, NULL),
(346, 5, 'medelpad', NULL, NULL),
(347, 5, 'mellanöstern', NULL, NULL),
(348, 5, 'mitthögskolan', NULL, NULL),
(349, 5, 'mittuniversitetet', NULL, NULL),
(350, 5, 'musikhögskolan i göteborg', NULL, NULL),
(351, 5, 'musikhögskolan i stockholm', NULL, NULL),
(352, 5, 'närke', NULL, NULL),
(353, 5, 'norrbotten', NULL, NULL),
(354, 5, 'ödåkra', NULL, NULL),
(355, 5, 'örebro kommun', NULL, NULL),
(356, 5, 'örebro län', NULL, NULL),
(357, 5, 'örebro universitet', NULL, NULL),
(358, 5, 'öresund', NULL, NULL),
(359, 5, 'östergötland', NULL, NULL),
(360, 5, 'österrike', NULL, NULL),
(361, 5, 'östeuropa', NULL, NULL),
(362, 5, 'ryssland', NULL, NULL),
(363, 5, 'schweiz', NULL, NULL),
(364, 5, 'skåne', NULL, NULL),
(365, 5, 'skaraborg', NULL, NULL),
(366, 5, 'skillingsmark', NULL, NULL),
(367, 5, 'södermanland', NULL, NULL),
(368, 5, 'södersjukhuset', NULL, NULL),
(369, 5, 'stockholms stad', NULL, NULL),
(370, 5, 'stockholms stift', NULL, NULL),
(371, 5, 'stockholms universitet', NULL, NULL),
(372, 5, 'storstockholm', NULL, NULL),
(373, 5, 'sveriges lantbruksuniversitet', NULL, NULL),
(374, 5, 'tornedalen', NULL, NULL),
(375, 5, 'tyskland', NULL, NULL),
(376, 5, 'u länder', NULL, NULL),
(377, 5, 'umeå universitet', NULL, NULL),
(378, 5, 'universitetet i karlstad', NULL, NULL),
(379, 5, 'uppland', NULL, NULL),
(380, 5, 'uppsala universitet', NULL, NULL),
(381, 5, 'utvecklingsländer', NULL, NULL),
(382, 5, 'vågårda', NULL, NULL),
(383, 5, 'värmland', NULL, NULL),
(384, 5, 'västerbotten', NULL, NULL),
(385, 5, 'västergötland', NULL, NULL),
(386, 5, 'västernorrland', NULL, NULL),
(387, 5, 'västmanland', NULL, NULL),
(388, 5, 'västra götalandsregionen', NULL, NULL),
(389, 5, 'västsverige', NULL, NULL),
(390, 5, 'växjö universitet', NULL, NULL),
(391, 5, 'vitryssland', NULL, NULL),
(392, 5, 'vittsjö', NULL, NULL),
(393, 5, 'åfjord', NULL, NULL),
(394, 5, 'agdenes', NULL, NULL),
(395, 5, 'akershus', NULL, NULL),
(396, 5, 'ål', NULL, NULL),
(397, 5, 'ålesund', NULL, NULL),
(398, 5, 'ålgård og figgjo', NULL, NULL),
(399, 5, 'alstahaug', NULL, NULL),
(400, 5, 'alta', NULL, NULL),
(401, 5, 'åmli', NULL, NULL),
(402, 5, 'åmot', NULL, NULL),
(403, 5, 'andebu', NULL, NULL),
(404, 5, 'andøy', NULL, NULL),
(405, 5, 'årdal', NULL, NULL),
(406, 5, 'aremark', NULL, NULL),
(407, 5, 'arendal', NULL, NULL),
(408, 5, 'ås', NULL, NULL),
(409, 5, 'åseral', NULL, NULL),
(410, 5, 'asker', NULL, NULL),
(411, 5, 'askøy', NULL, NULL),
(412, 5, 'askvoll', NULL, NULL),
(413, 5, 'åsnes', NULL, NULL),
(414, 5, 'aure', NULL, NULL),
(415, 5, 'aurland', NULL, NULL),
(416, 5, 'aurskog høland', NULL, NULL),
(417, 5, 'aust agder', NULL, NULL),
(418, 5, 'austevoll', NULL, NULL),
(419, 5, 'austrheim', NULL, NULL),
(420, 5, 'bærum', NULL, NULL),
(421, 5, 'balestrand', NULL, NULL),
(422, 5, 'bamble', NULL, NULL),
(423, 5, 'bardu', NULL, NULL),
(424, 5, 'bergen', NULL, NULL),
(425, 5, 'berlevåg', NULL, NULL),
(426, 5, 'bjarkøy', NULL, NULL),
(427, 5, 'bjerkreim', NULL, NULL),
(428, 5, 'bjørgvin bispedømme', NULL, NULL),
(429, 5, 'bjugn', NULL, NULL),
(430, 5, 'bø', NULL, NULL),
(431, 5, 'bodø', NULL, NULL),
(432, 5, 'bømlo', NULL, NULL),
(433, 5, 'borre', NULL, NULL),
(434, 5, 'brandval', NULL, NULL),
(435, 5, 'bremanger', NULL, NULL),
(436, 5, 'brønnøy', NULL, NULL),
(437, 5, 'brøttum', NULL, NULL),
(438, 5, 'buskerud', NULL, NULL),
(439, 5, 'bygland', NULL, NULL),
(440, 5, 'bykle', NULL, NULL),
(441, 5, 'dalen', NULL, NULL),
(442, 5, 'dokka', NULL, NULL),
(443, 5, 'drammen', NULL, NULL),
(444, 5, 'drangedal', NULL, NULL),
(445, 5, 'drøbak', NULL, NULL),
(446, 5, 'eid', NULL, NULL),
(447, 5, 'eidfjord', NULL, NULL),
(448, 5, 'eidsberg', NULL, NULL),
(449, 5, 'eidsvoll', NULL, NULL),
(450, 5, 'eigersund', NULL, NULL),
(451, 5, 'eikelund kompetansesenter', NULL, NULL),
(452, 5, 'eiker', NULL, NULL),
(453, 5, 'elverum', NULL, NULL),
(454, 5, 'enebakk', NULL, NULL),
(455, 5, 'engerdal', NULL, NULL),
(456, 5, 'etne', NULL, NULL),
(457, 5, 'etnedal', NULL, NULL),
(458, 5, 'evje og hornnes', NULL, NULL),
(459, 5, 'fana', NULL, NULL),
(460, 5, 'farsund', NULL, NULL),
(461, 5, 'fauske', NULL, NULL),
(462, 5, 'fet', NULL, NULL),
(463, 5, 'finnmark', NULL, NULL),
(464, 5, 'finnøy', NULL, NULL),
(465, 5, 'fjell', NULL, NULL),
(466, 5, 'flå', NULL, NULL),
(467, 5, 'flakstad', NULL, NULL),
(468, 5, 'flatanger', NULL, NULL),
(469, 5, 'flekkefjord', NULL, NULL),
(470, 5, 'flesberg', NULL, NULL),
(471, 5, 'folldal', NULL, NULL),
(472, 5, 'follo', NULL, NULL),
(473, 5, 'forsand', NULL, NULL),
(474, 5, 'fræna', NULL, NULL),
(475, 5, 'fredrikstad', NULL, NULL),
(476, 5, 'frogn', NULL, NULL),
(477, 5, 'frosta', NULL, NULL),
(478, 5, 'furnes', NULL, NULL),
(479, 5, 'fyresdal', NULL, NULL),
(480, 5, 'gamvik', NULL, NULL),
(481, 5, 'gaular', NULL, NULL),
(482, 5, 'gausdal', NULL, NULL),
(483, 5, 'gibraltar', NULL, NULL),
(484, 5, 'gildeskål', NULL, NULL),
(485, 5, 'giske', NULL, NULL),
(486, 5, 'gjøvik', NULL, NULL),
(487, 5, 'gol', NULL, NULL),
(488, 5, 'gran', NULL, NULL),
(489, 5, 'grane', NULL, NULL),
(490, 5, 'granvin', NULL, NULL),
(491, 5, 'greece', NULL, NULL),
(492, 5, 'grenada', NULL, NULL),
(493, 5, 'grimstad', NULL, NULL),
(494, 5, 'grong', NULL, NULL),
(495, 5, 'grue', NULL, NULL),
(496, 5, 'guam', NULL, NULL),
(497, 5, 'hå', NULL, NULL),
(498, 5, 'hadsel', NULL, NULL),
(499, 5, 'hafslund', NULL, NULL),
(500, 5, 'halden', NULL, NULL),
(501, 5, 'hamar', NULL, NULL),
(502, 5, 'hammerfest', NULL, NULL),
(503, 5, 'handelshøyskolen bi', NULL, NULL),
(504, 5, 'handelshøyskolen i bergen', NULL, NULL),
(505, 5, 'handelshøyskolen i bodø', NULL, NULL),
(506, 5, 'harstad', NULL, NULL),
(507, 5, 'hasvik', NULL, NULL),
(508, 5, 'hattfjelldal', NULL, NULL),
(509, 5, 'haugesund', NULL, NULL),
(510, 5, 'haukeland sykehus', NULL, NULL),
(511, 5, 'hedmark', NULL, NULL),
(512, 5, 'hemne', NULL, NULL),
(513, 5, 'hemnes', NULL, NULL),
(514, 5, 'hemsedal', NULL, NULL),
(515, 5, 'herøy', NULL, NULL),
(516, 5, 'hisøy', NULL, NULL),
(517, 5, 'hitra', NULL, NULL),
(518, 5, 'hjartdal', NULL, NULL),
(519, 5, 'høgskolen i oslo', NULL, NULL),
(520, 5, 'høgskolen i stavanger', NULL, NULL),
(521, 5, 'hol', NULL, NULL),
(522, 5, 'hole', NULL, NULL),
(523, 5, 'holla', NULL, NULL),
(524, 5, 'holmestrand', NULL, NULL),
(525, 5, 'holtålen', NULL, NULL),
(526, 5, 'hønefoss', NULL, NULL),
(527, 5, 'hordaland', NULL, NULL),
(528, 5, 'hornindal', NULL, NULL),
(529, 5, 'horten', NULL, NULL),
(530, 5, 'høydalsmo', NULL, NULL),
(531, 5, 'høylandet', NULL, NULL),
(532, 5, 'hurdal', NULL, NULL),
(533, 5, 'hurum', NULL, NULL),
(534, 5, 'inderøy', NULL, NULL),
(535, 5, 'iveland', NULL, NULL),
(536, 5, 'jevnaker', NULL, NULL),
(537, 5, 'jølster', NULL, NULL),
(538, 5, 'kabelvåg', NULL, NULL),
(539, 5, 'karmøy', NULL, NULL),
(540, 5, 'kautokeino', NULL, NULL),
(541, 5, 'klepp', NULL, NULL),
(542, 5, 'kongsberg', NULL, NULL),
(543, 5, 'kongsvinger', NULL, NULL),
(544, 5, 'kragerø', NULL, NULL),
(545, 5, 'kråkstad', NULL, NULL),
(546, 5, 'kristiansund n', NULL, NULL),
(547, 5, 'kvæfjord', NULL, NULL),
(548, 5, 'kvænangen', NULL, NULL),
(549, 5, 'kvalsund', NULL, NULL),
(550, 5, 'kvam', NULL, NULL),
(551, 5, 'kviteseid', NULL, NULL),
(552, 5, 'lærdal', NULL, NULL),
(553, 5, 'langesund', NULL, NULL),
(554, 5, 'lardal', NULL, NULL),
(555, 5, 'larvik', NULL, NULL),
(556, 5, 'lavangen', NULL, NULL),
(557, 5, 'leka', NULL, NULL),
(558, 5, 'lenvik', NULL, NULL),
(559, 5, 'levanger', NULL, NULL),
(560, 5, 'lier', NULL, NULL),
(561, 5, 'lierne', NULL, NULL),
(562, 5, 'lillehammer', NULL, NULL),
(563, 5, 'lillesand', NULL, NULL),
(564, 5, 'lindesnes', NULL, NULL),
(565, 5, 'lom', NULL, NULL),
(566, 5, 'loppa', NULL, NULL),
(567, 5, 'lørenskog', NULL, NULL),
(568, 5, 'løten', NULL, NULL),
(569, 5, 'lunde', NULL, NULL),
(570, 5, 'lunner', NULL, NULL),
(571, 5, 'lyngdal', NULL, NULL),
(572, 5, 'målselv', NULL, NULL),
(573, 5, 'mandal', NULL, NULL),
(574, 5, 'marker', NULL, NULL),
(575, 5, 'måsøy', NULL, NULL),
(576, 5, 'mediehøgskolen', NULL, NULL),
(577, 5, 'mediterranean', NULL, NULL),
(578, 5, 'melhus', NULL, NULL),
(579, 5, 'meløy', NULL, NULL),
(580, 5, 'midsund', NULL, NULL),
(581, 5, 'midtre gauldal', NULL, NULL),
(582, 5, 'mo', NULL, NULL),
(583, 5, 'modalen', NULL, NULL),
(584, 5, 'modum', NULL, NULL),
(585, 5, 'molde', NULL, NULL),
(586, 5, 'møre og romsdal', NULL, NULL),
(587, 5, 'moss', NULL, NULL),
(588, 5, 'mosvik', NULL, NULL),
(589, 5, 'nærøy', NULL, NULL),
(590, 5, 'namdalseid', NULL, NULL),
(591, 5, 'namsos', NULL, NULL),
(592, 5, 'namsskogan', NULL, NULL),
(593, 5, 'nannestad', NULL, NULL),
(594, 5, 'narvik', NULL, NULL),
(595, 5, 'nedre eiker', NULL, NULL),
(596, 5, 'nes', NULL, NULL),
(597, 5, 'nesherad', NULL, NULL),
(598, 5, 'nesodden', NULL, NULL),
(599, 5, 'nesseby', NULL, NULL),
(600, 5, 'nesset', NULL, NULL),
(601, 5, 'nissedal', NULL, NULL),
(602, 5, 'nlh', NULL, NULL),
(603, 5, 'nome', NULL, NULL),
(604, 5, 'nord hålogaland bispedømme', NULL, NULL),
(605, 5, 'nord trøndelag', NULL, NULL),
(606, 5, 'nord aurdal', NULL, NULL),
(607, 5, 'nord fron', NULL, NULL),
(608, 5, 'nord norge', NULL, NULL),
(609, 5, 'nord odal', NULL, NULL),
(610, 5, 'norden', NULL, NULL),
(611, 5, 'nordkapp', NULL, NULL),
(612, 5, 'nordkisa', NULL, NULL),
(613, 5, 'nordland', NULL, NULL),
(614, 5, 'nordre land', NULL, NULL),
(615, 5, 'notodden', NULL, NULL),
(616, 5, 'nøtterøy', NULL, NULL),
(617, 5, 'nykirke', NULL, NULL),
(618, 5, 'ølen', NULL, NULL),
(619, 5, 'onsøy', NULL, NULL),
(620, 5, 'oppland', NULL, NULL),
(621, 5, 'ørje', NULL, NULL),
(622, 5, 'orkdal', NULL, NULL),
(623, 5, 'os', NULL, NULL),
(624, 5, 'osen', NULL, NULL),
(625, 5, 'oslo', NULL, NULL),
(626, 5, 'østerdalen', NULL, NULL),
(627, 5, 'osterøy', NULL, NULL),
(628, 5, 'østfold', NULL, NULL),
(629, 5, 'østlandet', NULL, NULL),
(630, 5, 'østre toten', NULL, NULL),
(631, 5, 'overhalla', NULL, NULL),
(632, 5, 'øvre eiker', NULL, NULL),
(633, 5, 'øyer', NULL, NULL),
(634, 5, 'øygarden', NULL, NULL),
(635, 5, 'øystre slidre', NULL, NULL),
(636, 5, 'porsgrunn', NULL, NULL),
(637, 5, 'råde', NULL, NULL),
(638, 5, 'radiumhospitalet', NULL, NULL),
(639, 5, 'radøy', NULL, NULL),
(640, 5, 'rakkestad', NULL, NULL),
(641, 5, 'rana', NULL, NULL),
(642, 5, 'rana og helgeland', NULL, NULL),
(643, 5, 'randaberg', NULL, NULL),
(644, 5, 'rauma', NULL, NULL),
(645, 5, 're', NULL, NULL),
(646, 5, 'regionsykehuset i trondheim', NULL, NULL),
(647, 5, 'rendalen', NULL, NULL),
(648, 5, 'rikshospitalet i oslo', NULL, NULL),
(649, 5, 'ringebu', NULL, NULL),
(650, 5, 'ringerike', NULL, NULL),
(651, 5, 'ringsaker', NULL, NULL),
(652, 5, 'rissa', NULL, NULL),
(653, 5, 'rjukan', NULL, NULL),
(654, 5, 'rogaland', NULL, NULL),
(655, 5, 'rollag', NULL, NULL),
(656, 5, 'røros', NULL, NULL),
(657, 5, 'røyken', NULL, NULL),
(658, 5, 'røyrvik', NULL, NULL),
(659, 5, 'rygge', NULL, NULL),
(660, 5, 'sande', NULL, NULL),
(661, 5, 'sandefjord', NULL, NULL),
(662, 5, 'sandnes', NULL, NULL),
(663, 5, 'sarpsborg', NULL, NULL),
(664, 5, 'sauherad', NULL, NULL),
(665, 5, 'sel', NULL, NULL),
(666, 5, 'selbu', NULL, NULL),
(667, 5, 'seljord', NULL, NULL),
(668, 5, 'sem', NULL, NULL),
(669, 5, 'sigdal', NULL, NULL),
(670, 5, 'siljan', NULL, NULL),
(671, 5, 'sirdal', NULL, NULL),
(672, 5, 'skedsmo', NULL, NULL),
(673, 5, 'ski', NULL, NULL),
(674, 5, 'skien', NULL, NULL),
(675, 5, 'skiptvet', NULL, NULL),
(676, 5, 'skjåk', NULL, NULL),
(677, 5, 'skjeberg', NULL, NULL),
(678, 5, 'slagen', NULL, NULL),
(679, 5, 'snåsa', NULL, NULL),
(680, 5, 'sogn og fjordane', NULL, NULL),
(681, 5, 'sogndal', NULL, NULL),
(682, 5, 'søgne', NULL, NULL),
(683, 5, 'sokndal', NULL, NULL),
(684, 5, 'sola', NULL, NULL),
(685, 5, 'søndre land', NULL, NULL),
(686, 5, 'songdalen', NULL, NULL),
(687, 5, 'sør aurdal', NULL, NULL),
(688, 5, 'sør hålogaland bispedømme', NULL, NULL),
(689, 5, 'sør trøndelag', NULL, NULL),
(690, 5, 'sør fron', NULL, NULL),
(691, 5, 'sør odal', NULL, NULL),
(692, 5, 'sør varanger', NULL, NULL),
(693, 5, 'sørreisa', NULL, NULL),
(694, 5, 'sørum', NULL, NULL),
(695, 5, 'spydeberg', NULL, NULL),
(696, 5, 'stange', NULL, NULL),
(697, 5, 'stavanger', NULL, NULL),
(698, 5, 'steigen', NULL, NULL),
(699, 5, 'steinkjer', NULL, NULL),
(700, 5, 'stjørdal', NULL, NULL),
(701, 5, 'stokke', NULL, NULL),
(702, 5, 'stor elvdal', NULL, NULL),
(703, 5, 'stord', NULL, NULL),
(704, 5, 'stordal', NULL, NULL),
(705, 5, 'stryn', NULL, NULL),
(706, 5, 'sula', NULL, NULL),
(707, 5, 'suldal', NULL, NULL),
(708, 5, 'sunndal', NULL, NULL),
(709, 5, 'sunnmøre', NULL, NULL),
(710, 5, 'sveio', NULL, NULL),
(711, 5, 'svelvik', NULL, NULL),
(712, 5, 'sykehuset østfold', NULL, NULL),
(713, 5, 'telemark', NULL, NULL),
(714, 5, 'time', NULL, NULL),
(715, 5, 'tingvoll', NULL, NULL),
(716, 5, 'tinn', NULL, NULL),
(717, 5, 'tjøme', NULL, NULL),
(718, 5, 'tokke', NULL, NULL),
(719, 5, 'tønsberg', NULL, NULL),
(720, 5, 'torpa', NULL, NULL),
(721, 5, 'tranøy', NULL, NULL),
(722, 5, 'trøgstad', NULL, NULL),
(723, 5, 'troms', NULL, NULL),
(724, 5, 'tromsø', NULL, NULL),
(725, 5, 'trøndelagsfylkene', NULL, NULL),
(726, 5, 'trondheim', NULL, NULL),
(727, 5, 'trysil', NULL, NULL),
(728, 5, 'tvedestrand', NULL, NULL),
(729, 5, 'tydal', NULL, NULL),
(730, 5, 'tynset', NULL, NULL),
(731, 5, 'tysfjord', NULL, NULL),
(732, 5, 'tysnes', NULL, NULL),
(733, 5, 'tysvær', NULL, NULL),
(734, 5, 'ullensaker', NULL, NULL),
(735, 5, 'ullensvang', NULL, NULL),
(736, 5, 'ullevål sykehus', NULL, NULL),
(737, 5, 'ulvik', NULL, NULL),
(738, 5, 'universitet i tromsø', NULL, NULL),
(739, 5, 'universitetet i bergen', NULL, NULL),
(740, 5, 'universitetet i oslo', NULL, NULL),
(741, 5, 'universitetet i trondheim', NULL, NULL),
(742, 5, 'uvdal', NULL, NULL),
(743, 5, 'vågå', NULL, NULL),
(744, 5, 'vågan', NULL, NULL),
(745, 5, 'vaksdal', NULL, NULL),
(746, 5, 'våler', NULL, NULL),
(747, 5, 'valle', NULL, NULL),
(748, 5, 'vallø', NULL, NULL),
(749, 5, 'vang', NULL, NULL),
(750, 5, 'vardø', NULL, NULL),
(751, 5, 'vefsn', NULL, NULL),
(752, 5, 'verdal', NULL, NULL),
(753, 5, 'vest agder', NULL, NULL),
(754, 5, 'vestby', NULL, NULL),
(755, 5, 'vestfold', NULL, NULL),
(756, 5, 'vestfold sentralsykehus', NULL, NULL),
(757, 5, 'vestlandet', NULL, NULL),
(758, 5, 'vestre gausdal', NULL, NULL),
(759, 5, 'vestre slidre', NULL, NULL),
(760, 5, 'vestre toten', NULL, NULL),
(761, 5, 'vestvågøy', NULL, NULL),
(762, 5, 'veterinærhøyskole', NULL, NULL),
(763, 5, 'vik', NULL, NULL),
(764, 5, 'vikna', NULL, NULL),
(765, 5, 'vinje', NULL, NULL),
(766, 5, 'volda', NULL, NULL),
(767, 5, 'voss', NULL, NULL),
(768, 5, 'test', NULL, NULL),
(769, 5, 'nykvarn', NULL, NULL),
(770, 5, 'älvkarleby', NULL, NULL),
(771, 5, 'knivsta', NULL, NULL),
(772, 5, 'lessebo', NULL, NULL),
(773, 5, 'mörbylånga', NULL, NULL),
(774, 5, '1 apply regardless of which swedish city you are from', NULL, NULL),
(775, 5, 'stenungsund', NULL, NULL),
(776, 5, 'dals ed', NULL, NULL),
(777, 5, 'vårgårda', NULL, NULL),
(778, 5, 'lilla edet', NULL, NULL),
(779, 5, 'töreboda', NULL, NULL),
(780, 5, 'kil', NULL, NULL),
(781, 5, 'storfors', NULL, NULL),
(782, 5, 'lekeberg', NULL, NULL),
(783, 5, 'laxå', NULL, NULL),
(784, 5, 'ljusnarsberg', NULL, NULL),
(785, 5, 'malung sälen', NULL, NULL),
(786, 5, 'berg', NULL, NULL),
(787, 5, 'bjurholm', NULL, NULL),
(788, 5, 'sorsele', NULL, NULL),
(789, 5, 'överkalix', NULL, NULL),
(790, 5, '<strong>anybody can apply</strong>', NULL, NULL),
(791, 5, 'cebu', NULL, NULL),
(792, 5, 'tuguegarao', NULL, NULL),
(793, 5, 'tacloban', NULL, NULL),
(794, 4, 'antarctica', NULL, NULL),
(795, 4, 'australia', NULL, NULL),
(796, 4, 'caribbean', NULL, NULL),
(797, 4, 'central africa', NULL, NULL),
(798, 4, 'central america', NULL, NULL),
(799, 4, 'central asia', NULL, NULL),
(800, 4, 'eastern africa', NULL, NULL),
(801, 4, 'eastern asia', NULL, NULL),
(802, 4, 'eastern europe', NULL, NULL),
(803, 4, 'middle east', NULL, NULL),
(804, 4, 'north america', NULL, NULL),
(805, 4, 'northern africa', NULL, NULL),
(806, 4, 'northern europe', NULL, NULL),
(807, 4, 'oceania', NULL, NULL),
(808, 4, 'south america', NULL, NULL),
(809, 4, 'south central asia', NULL, NULL),
(810, 4, 'south east asia', NULL, NULL),
(811, 4, 'southern africa', NULL, NULL),
(812, 4, 'southern europe', NULL, NULL),
(813, 4, 'western africa', NULL, NULL),
(814, 4, 'western asia', NULL, NULL),
(815, 4, 'western europe', NULL, NULL),
(816, 4, 'test', NULL, NULL),
(817, 4, 'test', NULL, NULL),
(818, 4, 'test', NULL, NULL),
(819, 4, 'asia', NULL, NULL),
(820, 4, 'scandinavia', NULL, NULL),
(821, 4, 'nordic countries', NULL, NULL),
(822, 4, 'eu', NULL, NULL),
(823, 4, 'international', NULL, NULL),
(824, 4, 'west india caribbean', NULL, NULL),
(825, 4, 'africa', NULL, NULL),
(880, 3, 'jämtland', NULL, NULL),
(879, 3, 'västernorrland', NULL, NULL),
(878, 3, 'gävleborg', NULL, NULL),
(877, 3, 'dalarna', NULL, NULL),
(876, 3, 'västmanland', NULL, NULL),
(875, 3, 'örebro', NULL, NULL),
(874, 3, 'värmland', NULL, NULL),
(873, 3, 'västra götalandsregionen', NULL, NULL),
(872, 3, 'halland', NULL, NULL),
(871, 3, 'skåne', NULL, NULL),
(870, 3, 'blekinge län', NULL, NULL),
(869, 3, 'gotland', NULL, NULL),
(868, 3, 'kalmar', NULL, NULL),
(867, 3, 'kronoberg', NULL, NULL),
(866, 3, 'jönköping', NULL, NULL),
(865, 3, 'östergötlands län', NULL, NULL),
(864, 3, 'södermanland', NULL, NULL),
(863, 3, 'uppsala', NULL, NULL),
(862, 3, 'norrbotten', NULL, NULL),
(861, 3, 'västerbotten', NULL, NULL),
(860, 3, 'stockholm', NULL, NULL),
(858, 3, 'ph region 2', NULL, NULL),
(859, 3, 'region 8', NULL, NULL),
(857, 3, 'ph region 7', NULL, NULL),
(856, 3, 'ph region 1', NULL, NULL),
(881, 3, 'test', NULL, NULL),
(882, 3, 'talamban', NULL, NULL),
(883, 3, '1 inga restriktioner på att studera eller vara bosatt i visst län för att ansöka', NULL, NULL),
(884, 3, 'skaraborgs län', NULL, NULL),
(885, 3, 'skaraborg county', NULL, NULL),
(886, 2, 'åäö, åäö ñ and ñ', NULL, NULL),
(887, 2, 'åäö, åäö ñ and ñ', NULL, NULL),
(888, 2, 'åäö, åäö ñ and ñ', NULL, NULL),
(889, 2, 'åäö, åäö ñ and ñ', NULL, NULL),
(890, 2, 'andorra', NULL, NULL),
(891, 2, 'andorra', NULL, NULL),
(892, 2, 'united arab emirates', NULL, NULL),
(893, 2, 'united arab emirates', NULL, NULL),
(894, 2, 'afghanistan', NULL, NULL),
(895, 2, 'afghanistan', NULL, NULL),
(896, 2, 'antigua and barbuda', NULL, NULL),
(897, 2, 'antigua and barbuda', NULL, NULL),
(898, 2, 'anguilla', NULL, NULL),
(899, 2, 'anguilla', NULL, NULL),
(900, 2, 'albania', NULL, NULL),
(901, 2, 'albania', NULL, NULL),
(902, 2, 'armenia', NULL, NULL),
(903, 2, 'armenia', NULL, NULL),
(904, 2, 'antilles', NULL, NULL),
(905, 2, 'antilles', NULL, NULL),
(906, 2, 'angola', NULL, NULL),
(907, 2, 'angola', NULL, NULL),
(908, 2, 'argentina', NULL, NULL),
(909, 2, 'argentina', NULL, NULL),
(910, 2, 'american samoa', NULL, NULL),
(911, 2, 'american samoa', NULL, NULL),
(912, 2, 'austria', NULL, NULL),
(913, 2, 'austria', NULL, NULL),
(914, 2, 'australia', NULL, NULL),
(915, 2, 'australia', NULL, NULL),
(916, 2, 'aruba', NULL, NULL),
(917, 2, 'aruba', NULL, NULL),
(918, 2, 'azerbaijan', NULL, NULL),
(919, 2, 'azerbaijan', NULL, NULL),
(920, 2, 'bosnia and herzegovina', NULL, NULL),
(921, 2, 'bosnia and herzegovina', NULL, NULL),
(922, 2, 'barbados', NULL, NULL),
(923, 2, 'barbados', NULL, NULL),
(924, 2, 'bangladesh', NULL, NULL),
(925, 2, 'bangladesh', NULL, NULL),
(926, 2, 'belgium', NULL, NULL),
(927, 2, 'belgium', NULL, NULL),
(928, 2, 'burkina faso', NULL, NULL),
(929, 2, 'burkina faso', NULL, NULL),
(930, 2, 'bulgaria', NULL, NULL),
(931, 2, 'bulgaria', NULL, NULL),
(932, 2, 'bahrain', NULL, NULL),
(933, 2, 'bahrain', NULL, NULL),
(934, 2, 'burundi', NULL, NULL),
(935, 2, 'burundi', NULL, NULL),
(936, 2, 'benin', NULL, NULL),
(937, 2, 'benin', NULL, NULL),
(938, 2, 'bermuda', NULL, NULL),
(939, 2, 'bermuda', NULL, NULL),
(940, 2, 'brunei', NULL, NULL),
(941, 2, 'brunei', NULL, NULL),
(942, 2, 'bolivia', NULL, NULL),
(943, 2, 'bolivia', NULL, NULL),
(944, 2, 'brazil', NULL, NULL),
(945, 2, 'brazil', NULL, NULL),
(946, 2, 'bahamas', NULL, NULL),
(947, 2, 'bahamas', NULL, NULL),
(948, 2, 'bhutan', NULL, NULL),
(949, 2, 'bhutan', NULL, NULL),
(950, 2, 'botswana', NULL, NULL),
(951, 2, 'botswana', NULL, NULL),
(952, 2, 'belarus', NULL, NULL),
(953, 2, 'belarus', NULL, NULL),
(954, 2, 'belize', NULL, NULL),
(955, 2, 'belize', NULL, NULL),
(956, 2, 'canada', NULL, NULL),
(957, 2, 'canada', NULL, NULL),
(958, 2, 'congo, dem. rep.', NULL, NULL),
(959, 2, 'congo, dem. rep.', NULL, NULL),
(960, 2, 'central african republic', NULL, NULL),
(961, 2, 'central african republic', NULL, NULL),
(962, 2, 'congo', NULL, NULL),
(963, 2, 'congo', NULL, NULL),
(964, 2, 'switzerland', NULL, NULL),
(965, 2, 'switzerland', NULL, NULL),
(966, 2, 'ivory', NULL, NULL),
(967, 2, 'ivory', NULL, NULL),
(968, 2, 'chile', NULL, NULL),
(969, 2, 'chile', NULL, NULL),
(970, 2, 'china', NULL, NULL),
(971, 2, 'china', NULL, NULL),
(972, 2, 'colombia', NULL, NULL),
(973, 2, 'colombia', NULL, NULL),
(974, 2, 'costa rica', NULL, NULL),
(975, 2, 'costa rica', NULL, NULL),
(976, 2, 'serbia and montenegro', NULL, NULL),
(977, 2, 'serbia and montenegro', NULL, NULL),
(978, 2, 'cuba', NULL, NULL),
(979, 2, 'cuba', NULL, NULL),
(980, 2, 'cape verde', NULL, NULL),
(981, 2, 'cape verde', NULL, NULL),
(982, 2, 'cyprus', NULL, NULL),
(983, 2, 'cyprus', NULL, NULL),
(984, 2, 'czech republic', NULL, NULL),
(985, 2, 'czech republic', NULL, NULL),
(986, 2, 'germany', NULL, NULL),
(987, 2, 'germany', NULL, NULL),
(988, 2, 'djibouti', NULL, NULL),
(989, 2, 'djibouti', NULL, NULL),
(990, 2, 'denmark', NULL, NULL),
(991, 2, 'denmark', NULL, NULL),
(992, 2, 'dominica', NULL, NULL),
(993, 2, 'dominica', NULL, NULL),
(994, 2, 'dominican republic', NULL, NULL),
(995, 2, 'dominican republic', NULL, NULL),
(996, 2, 'algeria', NULL, NULL),
(997, 2, 'algeria', NULL, NULL),
(998, 2, 'ecuador', NULL, NULL),
(999, 2, 'ecuador', NULL, NULL),
(1000, 2, 'estonia', NULL, NULL),
(1001, 2, 'estonia', NULL, NULL),
(1002, 2, 'egypt', NULL, NULL),
(1003, 2, 'egypt', NULL, NULL),
(1004, 2, 'eritrea', NULL, NULL),
(1005, 2, 'eritrea', NULL, NULL),
(1006, 2, 'spain', NULL, NULL),
(1007, 2, 'spain', NULL, NULL),
(1008, 2, 'ethiopia', NULL, NULL),
(1009, 2, 'ethiopia', NULL, NULL),
(1010, 2, 'finland', NULL, NULL),
(1011, 2, 'finland', NULL, NULL),
(1012, 2, 'fiji', NULL, NULL),
(1013, 2, 'fiji', NULL, NULL),
(1014, 2, 'liechtenstein', NULL, NULL),
(1015, 2, 'micronesia', NULL, NULL),
(1016, 2, 'micronesia', NULL, NULL),
(1017, 2, 'faroe', NULL, NULL),
(1018, 2, 'faroe', NULL, NULL),
(1019, 2, 'france', NULL, NULL),
(1020, 2, 'france', NULL, NULL),
(1021, 2, 'gabon', NULL, NULL),
(1022, 2, 'gabon', NULL, NULL),
(1023, 2, 'grenada', NULL, NULL),
(1024, 2, 'grenada', NULL, NULL),
(1025, 2, 'georgia', NULL, NULL),
(1026, 2, 'georgia', NULL, NULL),
(1027, 2, 'french guayana', NULL, NULL),
(1028, 2, 'french guayana', NULL, NULL),
(1029, 2, 'ghana', NULL, NULL),
(1030, 2, 'ghana', NULL, NULL),
(1031, 2, 'gambia', NULL, NULL),
(1032, 2, 'gambia', NULL, NULL),
(1033, 2, 'guinea', NULL, NULL),
(1034, 2, 'guinea', NULL, NULL),
(1035, 2, 'guadeloupe', NULL, NULL),
(1036, 2, 'guadeloupe', NULL, NULL),
(1037, 2, 'equatorial guinea', NULL, NULL),
(1038, 2, 'equatorial guinea', NULL, NULL),
(1039, 2, 'greece', NULL, NULL),
(1040, 2, 'greece', NULL, NULL),
(1041, 2, 'guatemala', NULL, NULL),
(1042, 2, 'guatemala', NULL, NULL),
(1043, 2, 'guam', NULL, NULL),
(1044, 2, 'guam', NULL, NULL),
(1045, 2, 'guinea bissau', NULL, NULL),
(1046, 2, 'guinea bissau', NULL, NULL),
(1047, 2, 'guyana', NULL, NULL),
(1048, 2, 'guyana', NULL, NULL),
(1049, 2, 'hong kong', NULL, NULL),
(1050, 2, 'hong kong', NULL, NULL),
(1051, 2, 'honduras', NULL, NULL),
(1052, 2, 'honduras', NULL, NULL),
(1053, 2, 'croatia', NULL, NULL),
(1054, 2, 'croatia', NULL, NULL),
(1055, 2, 'haiti', NULL, NULL),
(1056, 2, 'haiti', NULL, NULL),
(1057, 2, 'hungary', NULL, NULL),
(1058, 2, 'hungary', NULL, NULL),
(1059, 2, 'indonesia', NULL, NULL),
(1060, 2, 'indonesia', NULL, NULL),
(1061, 2, 'ireland', NULL, NULL),
(1062, 2, 'ireland', NULL, NULL),
(1063, 2, 'israel', NULL, NULL),
(1064, 2, 'israel', NULL, NULL),
(1065, 2, 'india', NULL, NULL),
(1066, 2, 'india', NULL, NULL),
(1067, 2, 'iraq', NULL, NULL),
(1068, 2, 'iraq', NULL, NULL),
(1069, 2, 'iran', NULL, NULL),
(1070, 2, 'iran', NULL, NULL),
(1071, 2, 'iceland', NULL, NULL),
(1072, 2, 'iceland', NULL, NULL),
(1073, 2, 'italy', NULL, NULL),
(1074, 2, 'italy', NULL, NULL),
(1075, 2, 'jamaica', NULL, NULL),
(1076, 2, 'jamaica', NULL, NULL),
(1077, 2, 'jordan', NULL, NULL),
(1078, 2, 'jordan', NULL, NULL),
(1079, 2, 'japan', NULL, NULL),
(1080, 2, 'japan', NULL, NULL),
(1081, 2, 'kenya', NULL, NULL),
(1082, 2, 'kenya', NULL, NULL),
(1083, 2, 'kyrgyzstan', NULL, NULL),
(1084, 2, 'kyrgyzstan', NULL, NULL),
(1085, 2, 'cambodia', NULL, NULL),
(1086, 2, 'cambodia', NULL, NULL),
(1087, 2, 'kiribati', NULL, NULL),
(1088, 2, 'kiribati', NULL, NULL),
(1089, 2, 'comoros', NULL, NULL),
(1090, 2, 'comoros', NULL, NULL),
(1091, 2, 'st kitts and nevis', NULL, NULL),
(1092, 2, 'st kitts and nevis', NULL, NULL),
(1093, 2, 'north korea', NULL, NULL),
(1094, 2, 'north korea', NULL, NULL),
(1095, 2, 'south korea', NULL, NULL),
(1096, 2, 'south korea', NULL, NULL),
(1097, 2, 'kuwait', NULL, NULL),
(1098, 2, 'kuwait', NULL, NULL),
(1099, 2, 'cayman islands', NULL, NULL),
(1100, 2, 'cayman islands', NULL, NULL),
(1101, 2, 'kazakhstan', NULL, NULL),
(1102, 2, 'kazakhstan', NULL, NULL),
(1103, 2, 'laos', NULL, NULL),
(1104, 2, 'laos', NULL, NULL),
(1105, 2, 'lebanon', NULL, NULL),
(1106, 2, 'lebanon', NULL, NULL),
(1107, 2, 'st lucia', NULL, NULL),
(1108, 2, 'st lucia', NULL, NULL),
(1109, 2, 'sri lanka', NULL, NULL),
(1110, 2, 'sri lanka', NULL, NULL),
(1111, 2, 'liberia', NULL, NULL),
(1112, 2, 'liberia', NULL, NULL),
(1113, 2, 'lesotho', NULL, NULL),
(1114, 2, 'lesotho', NULL, NULL),
(1115, 2, 'lithuania', NULL, NULL),
(1116, 2, 'lithuania', NULL, NULL),
(1117, 2, 'luxembourg', NULL, NULL),
(1118, 2, 'luxembourg', NULL, NULL),
(1119, 2, 'latvia', NULL, NULL),
(1120, 2, 'latvia', NULL, NULL),
(1121, 2, 'libya', NULL, NULL),
(1122, 2, 'libya', NULL, NULL),
(1123, 2, 'morocco', NULL, NULL),
(1124, 2, 'morocco', NULL, NULL),
(1125, 2, 'monaco', NULL, NULL),
(1126, 2, 'monaco', NULL, NULL),
(1127, 2, 'moldova', NULL, NULL),
(1128, 2, 'moldova', NULL, NULL),
(1129, 2, 'montenegro', NULL, NULL),
(1130, 2, 'montenegro', NULL, NULL),
(1131, 2, 'madagascar', NULL, NULL),
(1132, 2, 'madagascar', NULL, NULL),
(1133, 2, 'marshall islands', NULL, NULL),
(1134, 2, 'marshall islands', NULL, NULL),
(1135, 2, 'macedonia', NULL, NULL),
(1136, 2, 'macedonia', NULL, NULL),
(1137, 2, 'mali', NULL, NULL),
(1138, 2, 'mali', NULL, NULL),
(1139, 2, 'myanmar', NULL, NULL),
(1140, 2, 'myanmar', NULL, NULL),
(1141, 2, 'mongolia', NULL, NULL),
(1142, 2, 'mongolia', NULL, NULL),
(1143, 2, 'macau', NULL, NULL),
(1144, 2, 'macau', NULL, NULL),
(1145, 2, 'martinique', NULL, NULL),
(1146, 2, 'martinique', NULL, NULL),
(1147, 2, 'mauritania', NULL, NULL),
(1148, 2, 'mauritania', NULL, NULL),
(1149, 2, 'malta', NULL, NULL),
(1150, 2, 'malta', NULL, NULL),
(1151, 2, 'mauritius', NULL, NULL),
(1152, 2, 'mauritius', NULL, NULL),
(1153, 2, 'maldives', NULL, NULL),
(1154, 2, 'maldives', NULL, NULL),
(1155, 2, 'malawi', NULL, NULL),
(1156, 2, 'malawi', NULL, NULL),
(1157, 2, 'mexico', NULL, NULL),
(1158, 2, 'mexico', NULL, NULL),
(1159, 2, 'malaysia', NULL, NULL),
(1160, 2, 'malaysia', NULL, NULL),
(1161, 2, 'mozambique', NULL, NULL),
(1162, 2, 'mozambique', NULL, NULL),
(1163, 2, 'namibia', NULL, NULL),
(1164, 2, 'namibia', NULL, NULL),
(1165, 2, 'new caledonia', NULL, NULL),
(1166, 2, 'new caledonia', NULL, NULL),
(1167, 2, 'niger', NULL, NULL),
(1168, 2, 'niger', NULL, NULL),
(1169, 2, 'nigeria', NULL, NULL),
(1170, 2, 'nigeria', NULL, NULL),
(1171, 2, 'nicaragua', NULL, NULL),
(1172, 2, 'nicaragua', NULL, NULL),
(1173, 2, 'netherlands', NULL, NULL),
(1174, 2, 'netherlands', NULL, NULL),
(1175, 2, 'norway', NULL, NULL),
(1176, 2, 'norway', NULL, NULL),
(1177, 2, 'nepal', NULL, NULL),
(1178, 2, 'nepal', NULL, NULL),
(1179, 2, 'nauru', NULL, NULL),
(1180, 2, 'nauru', NULL, NULL),
(1181, 2, 'niue', NULL, NULL),
(1182, 2, 'niue', NULL, NULL),
(1183, 2, 'new zealand', NULL, NULL),
(1184, 2, 'new zealand', NULL, NULL),
(1185, 2, 'oman', NULL, NULL),
(1186, 2, 'oman', NULL, NULL),
(1187, 2, 'panama', NULL, NULL),
(1188, 2, 'panama', NULL, NULL),
(1189, 2, 'peru', NULL, NULL),
(1190, 2, 'peru', NULL, NULL),
(1191, 2, 'french polynesia', NULL, NULL),
(1192, 2, 'french polynesia', NULL, NULL),
(1193, 2, 'papua new guinea', NULL, NULL),
(1194, 2, 'papua new guinea', NULL, NULL),
(1195, 2, 'philippines', NULL, NULL),
(1196, 2, 'philippines', NULL, NULL),
(1197, 2, 'pakistan', NULL, NULL),
(1198, 2, 'pakistan', NULL, NULL),
(1199, 2, 'poland', NULL, NULL),
(1200, 2, 'poland', NULL, NULL),
(1201, 2, 'st. pierre and miquelon', NULL, NULL),
(1202, 2, 'st. pierre and miquelon', NULL, NULL),
(1203, 2, 'puerto rico', NULL, NULL),
(1204, 2, 'puerto rico', NULL, NULL),
(1205, 2, 'palestine', NULL, NULL),
(1206, 2, 'palestine', NULL, NULL),
(1207, 2, 'portugal', NULL, NULL),
(1208, 2, 'portugal', NULL, NULL),
(1209, 2, 'paraguay', NULL, NULL),
(1210, 2, 'paraguay', NULL, NULL),
(1211, 2, 'qatar', NULL, NULL),
(1212, 2, 'qatar', NULL, NULL),
(1213, 2, 'meeting', NULL, NULL),
(1214, 2, 'meeting', NULL, NULL),
(1215, 2, 'romania', NULL, NULL),
(1216, 2, 'romania', NULL, NULL),
(1217, 2, 'russia', NULL, NULL),
(1218, 2, 'russia', NULL, NULL),
(1219, 2, 'rwanda', NULL, NULL),
(1220, 2, 'rwanda', NULL, NULL),
(1221, 2, 'saudi arabia', NULL, NULL),
(1222, 2, 'saudi arabia', NULL, NULL),
(1223, 2, 'solomon islands', NULL, NULL),
(1224, 2, 'solomon islands', NULL, NULL),
(1225, 2, 'seychelles', NULL, NULL),
(1226, 2, 'seychelles', NULL, NULL),
(1227, 2, 'sudan', NULL, NULL),
(1228, 2, 'sudan', NULL, NULL),
(1229, 2, 'singapore', NULL, NULL),
(1230, 2, 'singapore', NULL, NULL),
(1231, 2, 'slovenia', NULL, NULL),
(1232, 2, 'slovenia', NULL, NULL),
(1233, 2, 'slovakia', NULL, NULL),
(1234, 2, 'slovakia', NULL, NULL),
(1235, 2, 'sierra leone', NULL, NULL),
(1236, 2, 'sierra leone', NULL, NULL),
(1237, 2, 'san marino', NULL, NULL),
(1238, 2, 'san marino', NULL, NULL),
(1239, 2, 'senegal', NULL, NULL),
(1240, 2, 'senegal', NULL, NULL),
(1241, 2, 'somalia', NULL, NULL),
(1242, 2, 'somalia', NULL, NULL),
(1243, 2, 'suriname', NULL, NULL),
(1244, 2, 'suriname', NULL, NULL),
(1245, 2, 'são tomé und príncipe', NULL, NULL),
(1246, 2, 'são tomé und príncipe', NULL, NULL),
(1247, 2, 'el salvador', NULL, NULL),
(1248, 2, 'el salvador', NULL, NULL),
(1249, 2, 'sweden', NULL, NULL),
(1250, 2, 'sweden', NULL, NULL),
(1251, 2, 'syria', NULL, NULL),
(1252, 2, 'syria', NULL, NULL),
(1253, 2, 'swaziland', NULL, NULL),
(1254, 2, 'swaziland', NULL, NULL),
(1255, 2, 'chad', NULL, NULL),
(1256, 2, 'chad', NULL, NULL),
(1257, 2, 'togo', NULL, NULL),
(1258, 2, 'togo', NULL, NULL),
(1259, 2, 'thailand', NULL, NULL),
(1260, 2, 'thailand', NULL, NULL),
(1261, 2, 'tajikistan', NULL, NULL),
(1262, 2, 'tajikistan', NULL, NULL),
(1263, 2, 'timor leste', NULL, NULL),
(1264, 2, 'timor leste', NULL, NULL),
(1265, 2, 'turkmenistan', NULL, NULL),
(1266, 2, 'turkmenistan', NULL, NULL),
(1267, 2, 'tunisia', NULL, NULL),
(1268, 2, 'tunisia', NULL, NULL),
(1269, 2, 'tonga', NULL, NULL),
(1270, 2, 'tonga', NULL, NULL),
(1271, 2, 'turkey', NULL, NULL),
(1272, 2, 'turkey', NULL, NULL),
(1273, 2, 'trinidad and tobago', NULL, NULL),
(1274, 2, 'trinidad and tobago', NULL, NULL),
(1275, 2, 'tuvalu', NULL, NULL),
(1276, 2, 'tuvalu', NULL, NULL),
(1277, 2, 'taiwan', NULL, NULL),
(1278, 2, 'taiwan', NULL, NULL),
(1279, 2, 'tanzania', NULL, NULL),
(1280, 2, 'tanzania', NULL, NULL),
(1281, 2, 'ukraine', NULL, NULL),
(1282, 2, 'ukraine', NULL, NULL),
(1283, 2, 'uganda', NULL, NULL),
(1284, 2, 'uganda', NULL, NULL),
(1285, 2, 'usa', NULL, NULL),
(1286, 2, 'usa', NULL, NULL),
(1287, 2, 'uruguay', NULL, NULL),
(1288, 2, 'uruguay', NULL, NULL),
(1289, 2, 'uzbekistan', NULL, NULL),
(1290, 2, 'uzbekistan', NULL, NULL),
(1291, 2, 'st vincent', NULL, NULL),
(1292, 2, 'st vincent', NULL, NULL),
(1293, 2, 'venezuela', NULL, NULL),
(1294, 2, 'venezuela', NULL, NULL),
(1295, 2, 'virgin islands british', NULL, NULL),
(1296, 2, 'virgin islands british', NULL, NULL),
(1297, 2, 'virgin islands, united states', NULL, NULL),
(1298, 2, 'virgin islands, united states', NULL, NULL),
(1299, 2, 'vietnam', NULL, NULL),
(1300, 2, 'vietnam', NULL, NULL),
(1301, 2, 'vanuatu', NULL, NULL),
(1302, 2, 'vanuatu', NULL, NULL),
(1303, 2, 'yemen', NULL, NULL),
(1304, 2, 'yemen', NULL, NULL),
(1305, 2, 'south africa', NULL, NULL),
(1306, 2, 'south africa', NULL, NULL),
(1307, 2, 'zambia', NULL, NULL),
(1308, 2, 'zambia', NULL, NULL),
(1309, 2, 'zimbabwe', NULL, NULL),
(1310, 2, 'zimbabwe', NULL, NULL),
(1311, 2, 'test', NULL, NULL),
(1312, 2, 'test', NULL, NULL),
(1313, 2, 'burma', NULL, NULL),
(1314, 2, 'burma', NULL, NULL),
(1315, 2, 'caribbean', NULL, NULL),
(1316, 2, 'caribbean', NULL, NULL),
(1317, 2, 'east timor', NULL, NULL),
(1318, 2, 'east timor', NULL, NULL),
(1319, 2, 'mediterranean', NULL, NULL),
(1320, 2, 'mediterranean', NULL, NULL),
(1321, 2, 'new england', NULL, NULL),
(1322, 2, 'new england', NULL, NULL),
(1323, 2, 'nordic', NULL, NULL),
(1324, 2, 'nordic', NULL, NULL),
(1325, 2, 'palau', NULL, NULL),
(1326, 2, 'palau', NULL, NULL),
(1327, 2, 'samoa', NULL, NULL),
(1328, 2, 'samoa', NULL, NULL),
(1329, 2, 'scandinavia', NULL, NULL),
(1330, 2, 'scandinavia', NULL, NULL),
(1331, 2, 'yugoslavia', NULL, NULL),
(1332, 2, 'yugoslavia', NULL, NULL),
(1333, 2, 'test', NULL, NULL),
(1334, 2, 'test', NULL, NULL),
(1335, 2, 'united kingdom', NULL, NULL),
(1336, 2, 'international', NULL, NULL),
(1337, 6, 'subject', NULL, NULL),
(1338, 6, 'purpose', NULL, NULL),
(1339, 6, 'product type', NULL, NULL),
(1340, 6, 'order status', NULL, NULL),
(1341, 6, 'payment terms', NULL, NULL),
(1342, 6, 'type of applicant', NULL, NULL),
(1343, 6, 'social site', NULL, NULL),
(1344, 6, 'e mail redirects', NULL, NULL),
(1345, 6, 'civil status', NULL, NULL),
(1346, 6, 'subscription status', NULL, NULL),
(1347, 6, 'tingaeerer', NULL, NULL),
(1348, 6, 'gaa', NULL, NULL),
(1349, 6, 'reee', NULL, NULL),
(1350, 6, 'test', NULL, NULL),
(1351, 6, 'quote type', NULL, NULL),
(1352, 6, 'subscription status', NULL, NULL),
(1353, 7, 'single no children', NULL, NULL),
(1354, 7, 'married no minor children', NULL, NULL),
(1355, 7, 'divorced', NULL, NULL),
(1356, 7, 'widowed', NULL, NULL),
(1357, 7, 'order form', NULL, NULL),
(1358, 7, 'feedback form', NULL, NULL),
(1359, 7, 'online inquiry', NULL, NULL),
(1360, 7, 'male', NULL, NULL),
(1361, 7, 'female', NULL, NULL),
(1362, 7, 'pending payment', NULL, NULL),
(1363, 7, 'paid not delivered', NULL, NULL),
(1364, 7, 'paid and delivered', NULL, NULL),
(1365, 7, 'reminded', NULL, NULL),
(1366, 7, 'cancelled', NULL, NULL),
(1367, 7, 'pending payment', NULL, NULL),
(1368, 7, 'user20 paid monthly subscription', NULL, NULL),
(1369, 7, 'user10 free member, expired monthly subscription', NULL, NULL),
(1370, 7, 'cash on delivery', NULL, NULL),
(1371, 7, 'credit card paypal', NULL, NULL),
(1372, 7, 'invoice 30 days net', NULL, NULL),
(1373, 7, 'pay in advance', NULL, NULL),
(1374, 7, 'other', NULL, NULL),
(1375, 7, 'books', NULL, NULL),
(1376, 7, 'cd', NULL, NULL),
(1377, 7, 'lists', NULL, NULL),
(1378, 7, 'services', NULL, NULL),
(1379, 7, 'recurring monthly subscription', NULL, NULL),
(1380, 7, 'abuse', NULL, NULL),
(1381, 7, 'care', NULL, NULL),
(1382, 7, 'cult', NULL, NULL),
(1383, 7, 'develop', NULL, NULL),
(1384, 7, 'ecolog', NULL, NULL),
(1385, 7, 'edu', NULL, NULL),
(1386, 7, 'entrep', NULL, NULL),
(1387, 7, 'fost', NULL, NULL),
(1388, 7, 'grad', NULL, NULL),
(1389, 7, 'health', NULL, NULL),
(1390, 7, 'high', NULL, NULL),
(1391, 7, 'journal', NULL, NULL),
(1392, 7, 'music', NULL, NULL),
(1393, 7, 'peace', NULL, NULL),
(1394, 7, 'perfart', NULL, NULL),
(1395, 7, 'phd', NULL, NULL),
(1396, 7, 'philan', NULL, NULL),
(1397, 7, 'photo', NULL, NULL),
(1398, 7, 'prim', NULL, NULL),
(1399, 7, 'proj', NULL, NULL),
(1400, 7, 'tec', NULL, NULL),
(1401, 7, 'ugrad', NULL, NULL),
(1402, 7, 'undef', NULL, NULL),
(1403, 7, 'visualart', NULL, NULL),
(1404, 7, 'welfare', NULL, NULL),
(1405, 7, 'facebook', NULL, NULL),
(1406, 7, 'youtube', NULL, NULL),
(1407, 7, 'linkedin', NULL, NULL),
(1408, 7, 'violence, racism, drugs, alkohol', NULL, NULL),
(1409, 7, 'administrative, economic and social sector', NULL, NULL),
(1410, 7, 'agronomist, natural resources, veterinary, animal care, fishing', NULL, NULL),
(1411, 7, 'antro', NULL, NULL),
(1412, 7, 'archaeology', NULL, NULL),
(1413, 7, 'architecture, interior design', NULL, NULL),
(1414, 7, 'arthistory', NULL, NULL),
(1415, 7, 'biochemistry', NULL, NULL),
(1416, 7, 'biology', NULL, NULL),
(1417, 7, 'botanical', NULL, NULL),
(1418, 7, 'chemistry', NULL, NULL),
(1419, 7, 'computer science, information science, it', NULL, NULL),
(1420, 7, 'crafts and crafts, textiles, design', NULL, NULL),
(1421, 7, 'cult', NULL, NULL),
(1422, 7, 'dentist', NULL, NULL),
(1423, 7, 'developing countries, aid', NULL, NULL),
(1424, 7, 'ecology o environment', NULL, NULL),
(1425, 7, 'entrepreneurial', NULL, NULL),
(1426, 7, 'genetic', NULL, NULL),
(1427, 7, 'geography', NULL, NULL),
(1428, 7, 'geology', NULL, NULL),
(1429, 7, 'health care, therapy, alternative treatments', NULL, NULL),
(1430, 7, 'history', NULL, NULL),
(1431, 7, 'tourism, hotel and restaurant', NULL, NULL),
(1432, 7, 'humanities', NULL, NULL),
(1433, 7, 'journalism, penmanship', NULL, NULL),
(1434, 7, 'law, jurisprudence', NULL, NULL),
(1435, 7, 'linguistics, literature, linguistics', NULL, NULL),
(1436, 7, 'math', NULL, NULL),
(1437, 7, 'journalism, radio / tv, graphic design, printing', NULL, NULL),
(1438, 7, 'medicine and health sciences', NULL, NULL),
(1439, 7, 'economy, finance, trading, marketing, management', NULL, NULL),
(1440, 7, 'music, song', NULL, NULL),
(1441, 7, 'conflict o peace', NULL, NULL),
(1442, 7, 'performing arts', NULL, NULL),
(1443, 7, 'pharmacy', NULL, NULL),
(1444, 7, 'philosophy', NULL, NULL),
(1445, 7, 'philantropical', NULL, NULL),
(1446, 7, 'photo, film, directing, stagecraft', NULL, NULL),
(1447, 7, 'physics', NULL, NULL),
(1448, 7, 'political science, civil servant, international relations', NULL, NULL),
(1449, 7, 'psychology, psychiatry', NULL, NULL),
(1450, 7, 'life and nature sciences', NULL, NULL),
(1451, 7, 'sociology, anthropology', NULL, NULL),
(1452, 7, 'education and pedagogy', NULL, NULL),
(1453, 7, 'technology, engineering, energy, road, water, construction, mining, shipping', NULL, NULL),
(1454, 7, 'theology and religion', NULL, NULL),
(1455, 7, 'transport, shipping and flight carrier', NULL, NULL),
(1456, 7, 'travel scholarships, summer programs', NULL, NULL),
(1457, 7, 'a. for study of any subject, no restrictions on subject', NULL, NULL),
(1458, 7, 'veterinarian', NULL, NULL),
(1459, 7, 'visual art, sculpture', NULL, NULL),
(1460, 7, 'zoology', NULL, NULL),
(1461, 7, 'test', NULL, NULL),
(1462, 7, 'test', NULL, NULL),
(1463, 7, 'testsqqqqq', NULL, NULL),
(1464, 7, 'qwe', NULL, NULL),
(1465, 7, 'test', NULL, NULL),
(1466, 7, 'test', NULL, NULL),
(1467, 7, 'inspirational quotes', NULL, NULL),
(1468, 7, 'love and relationships', NULL, NULL),
(1469, 7, 'legal person association, organization, corporation', NULL, NULL),
(1470, 7, 'individual person', NULL, NULL),
(1471, 7, 'anybody can apply (legal or indivduals)', NULL, NULL),
(1472, 7, 'swish cash payment', NULL, NULL),
(1473, 7, 'delivered', NULL, NULL),
(1474, 7, 'single with minor children', NULL, NULL),
(1475, 7, 'user40 paid activated yearly subscription lib/org', NULL, NULL),
(1476, 7, 'user30 expired yearly subscription lib/org', NULL, NULL),
(1477, 7, 'care', NULL, NULL),
(1478, 7, 'married, have minor children', NULL, NULL),
(1479, 7, 'swish cash payment', NULL, NULL),
(1480, 7, 'user11 upgraded member thru library subscription', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gg_label_translations`
--

CREATE TABLE `gg_label_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `translation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gg_languages`
--

CREATE TABLE `gg_languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gg_languages`
--

INSERT INTO `gg_languages` (`id`, `language`, `locale`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'English Us', 'en_US', '1', NULL, NULL, NULL),
(2, 'Swedish', 'sv_SE', '1', NULL, NULL, '2019-07-03 19:51:19'),
(3, 'test', 'tetst', NULL, NULL, '2019-12-13 08:46:54', '2019-12-13 08:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `gg_modules`
--

CREATE TABLE `gg_modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gg_module_fields`
--

CREATE TABLE `gg_module_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED DEFAULT NULL,
  `field_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gg_module_fields_values`
--

CREATE TABLE `gg_module_fields_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gg_page_blocks`
--

CREATE TABLE `gg_page_blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gg_page_blocks`
--

INSERT INTO `gg_page_blocks` (`id`, `page_id`, `language_id`, `text`, `status`, `created_at`, `updated_at`) VALUES
(27, 19, 1, '<p>Support &amp; Scholarships AB - Global Grant does its best to provide current and accurate information, but does not make any claims, guarantees or assurances regarding the accuracy, timeliness or completeness of current information. Support &amp; Scholarships AB - Global Grant is not liable for any financial, material or personal damages arising from your access to or lack of ability to access this site, or as a result of your reliance on any information available on this site .</p>\r\n\r\n<p>Support &amp; Scholarships AB - Global Grant may provide links and references to other websites, but Support &amp; Scholarships AB - Global Grant is not responsible for the content of such sites, nor are they liable for any material or personal injury resulting from such content . Any links to other websites have been provided solely to assist the users of this site.</p>\r\n\r\n<p>The trademarks, service marks, trade names, product designs and products mentioned on this website are protected internationally. The aforementioned may not be used without the prior written permission of the owners of this website, except for identification of the company&#39;s products and service offerings.</p>\r\n\r\n<p>All personal information transmitted to and from this site is processed, stored or archived is governed by the Support &amp; Scholarship AB - Global Grant Privacy Policy and the Swedish and international laws and directives governing the communication, use and storage of personal information. Support &amp; Scholarships AB - Global Grant has the right to use and copy information provided to improve the function, security and use of globalgrant.com for the benefit of our members, users and GlobalGrant&#39;s owners, within the laws and directives that protect the personal information and integrity. Information that we may use or copy include disclosure of personal information to third parties and / or development, production and / or marketing of goods and services;</p>\r\n\r\n<p>The developers and marketers employed by GlobalGrant are bound by individual confidentiality agreements. However, Support &amp; Scholarships AB - Global Grant does not have any confidentiality agreements with the companies and authorities that provide the Internet, operating systems, encryption algorithms, database managers and communication programs and the company is the host for our server.</p>', 1, NULL, '2019-09-17 08:33:31'),
(28, 19, 2, '<p>St&ouml;d &amp; Stipendier AB - Global Grant&nbsp;g&ouml;r sitt b&auml;sta f&ouml;r att f&aring; med aktuella och korrekta upplysningar, men anf&ouml;r inte n&aring;gra p&aring;st&aring;enden, garantier eller f&ouml;rs&auml;kringar vad g&auml;ller aktuella upplysningars riktighet, aktualitet eller fullst&auml;ndighet.&nbsp;St&ouml;d &amp; Stipendier AB - Global Grant &auml;r inte ers&auml;ttningsskyldiga f&ouml;r finansiella, materiella eller personella skador som uppst&aring;r till f&ouml;ljd av din tillg&aring;ng till eller bristande f&ouml;rm&aring;ga att f&aring; tillg&aring;ng till denna webbplats, eller till f&ouml;ljd av din tillit till eventuella upplysningar som &auml;r tillg&auml;ngliga p&aring; denna webbplats.</p>\r\n\r\n<p>St&ouml;d &amp; Stipendier AB - Global Grant tillhandah&aring;ller eventuellt l&auml;nkar och h&auml;nvisningar till andra webbplatser, men&nbsp;St&ouml;d &amp; Stipendier AB - Global Grant b&auml;r inte ansvaret f&ouml;r inneh&aring;llet p&aring; s&aring;dana webbplatser och de &auml;r inte heller ers&auml;ttningsskyldiga f&ouml;r material- eller personskador som uppst&aring;r p&aring; grund av dylikt inneh&aring;ll. Eventuella l&auml;nkar till andra webbplatser har uteslutande angivits f&ouml;r att hj&auml;lpa anv&auml;ndarna av denna webbplats.</p>\r\n\r\n<p>De varum&auml;rken, servicem&auml;rken, varunamn, varudesigner och produkter som n&auml;mns p&aring; denna webbplats &auml;r skyddade internationellt. De ovan n&auml;mnda f&aring;r inte anv&auml;ndas utan f&ouml;reg&aring;ende skriftligt tillst&aring;nd fr&aring;n &auml;garna av denna webbplats, med undantag f&ouml;r identifikation av f&ouml;retagets produkter och serviceutbud.</p>\r\n\r\n<p>All personlig information som s&auml;nds till och fr&aring;n denna denna webbplats, behandlas, sparas eller arkiveras regleras av St&ouml;d &amp; Stipendier AB - Global Grant integritetspolicy och de svenska och internationella lagar och direktiv som styr och reglerar kommunikation, anv&auml;ndning och lagring av personlig information.&nbsp;&nbsp;St&ouml;d &amp; Stipendier AB - Global Grant har r&auml;ttighet att anv&auml;nda och kopiera upplysningar som l&auml;mnas f&ouml;r att f&ouml;rb&auml;ttra funktionen, s&auml;kerheten och anv&auml;ndningen av globalgrant.com till nytta f&ouml;r v&aring;ra medlemmar, anv&auml;ndare och GlobalGrants &auml;gare, inom ramen f&ouml;r de lagar och direktiv som skyddar den personliga inormationen och integriteten. Upplysningar som vi kan komma att anv&auml;nda eller kopiera innefattar avsl&ouml;jande av personliga uppgifter till tredje part och/eller utveckling, framst&auml;llning och/eller marknadsf&ouml;ring av varor och tj&auml;nster, men endast i de fall d&auml;r du ger ditt uttryckliga tillst&aring;nd till detta.</p>\r\n\r\n<p>De utvecklare och marknadsf&ouml;rare som GlobalGrant anlitar &auml;r bundna av individuella sekretessavtal. D&auml;remot har St&ouml;d &amp; Stipendier AB - Global Grant inga sekretessavtal med de f&ouml;retag och myndigheter som tillhandah&aring;ller Internet, operativsystem, krypteringsalgoritmer, databashanterare och kommunikationsprogram och det f&ouml;retag st&aring;r som fysisk v&auml;rd (host) f&ouml;r v&aring;r server.</p>', 1, NULL, '2019-09-17 08:33:31'),
(29, 20, 1, '<h3><strong>YOUR CONSENT AND RESPONSIBLE PUBLISHER</strong></h3>\r\n\r\n<p>By using this site you agree to the terms of this privacy policy.&nbsp;By submitting information via this site, you consent to the collection, use and transmission of informationin accordance with this Privacy Policy.&nbsp;GlobalGrant.com has a release certificate from RTVV # 2007-071 and is authorized to manage, store, publish personal information about you under personal responsibility by our responsible publisher Elin Algotsson without permission from you.&nbsp;We therefore do not have to comply with PUL (the Personal Data Act), but we do so for those who use GlobalGrant to seek support for personal use.</p>\r\n\r\n<p>The certificate of issue is primarily intended to be able to publish personal information about who is on the boards of the funds and their contact details so that you can get hold of them and apply for money or other support.&nbsp;Certain foundations and funds do not want to be included in GlobalGrant, but our certificate of release protects us and gives us permission to publish personal information about them, against the will of the dean.&nbsp;Because the certificate of release is ultimately based on a constitution, the Freedom of Expression Act.&nbsp;This law is given greater importance and weight than, for example, PUL.</p>\r\n\r\n<h3><strong>BARN</strong></h3>\r\n\r\n<p>This site is not intended for children under 15. We will not knowingly collect information from children under 15 on this site.</p>\r\n\r\n<h3><strong>ACTIVE INFORMATIONSINSAMLING</strong></h3>\r\n\r\n<p>Some pages on the site require you to enter information to activate certain features (for example, to subscribe to newsletters, get tips / suggestions on listed funds, or apply for the SOS scholarship.</p>\r\n\r\n<h3><strong>PASSIVE COLLECTION OF INFORMATION</strong></h3>\r\n\r\n<p>While browsing the site, some information may be collected passively (ie collected without actively providing the information) using various techniques and methods, including collection of IP addresses, cookies, Internet tags, web beacons and collection information about which pages and functions you use most.</p>\r\n\r\n<p>We use IP addresses on this site.&nbsp;An IP address is a series of numbers assigned by your ISP to the computer you use to connect to the Internet.&nbsp;Generally, this information is not linked to a person, since in most cases an IP address is dynamic (ie changes every time a computer is connected to the Internet) and thus not static (the address is fixed to a particular computer).&nbsp;We use your IP address to help solve problems with our server, report collected information, find the fastest communication paths when your computer connects to our website, and to administer and improve the site.</p>\r\n\r\n<p>A cookie is a small text file containing information that a website sends to your browser to help the site remember information about you and your preferences.&nbsp;You can set your browser to notify you when a cookie is being sent, or that it simply does not allow cookies.&nbsp;Some features of this site will then not work.</p>\r\n\r\n<p>Temporary cookies are temporary information erased when you close the browser window or shut down your computer.&nbsp;Temporary cookies are used to facilitate site navigation and to collect information for statistical purposes.&nbsp;This site uses session cookies.</p>\r\n\r\n<p>Persistent cookies are more permanent information about files stored on your computer&#39;s hard drive that can be deleted if you actively delete them.&nbsp;There are several reasons for using permanent cookies;&nbsp;they store information on your computer that you have previously provided (such as usernames), to make it easier to find out which parts of the site are used most or least and to customize the site to your preferences.&nbsp;Global Grant does&nbsp;<strong>not</strong>&nbsp;use&nbsp;permanent cookies.</p>\r\n\r\n<p>&quot;Internet tags&quot; (also called single-pixel GIFs, clear GIFs, invisible GIFs, and 1-by-1 GIFs) are smaller than cookies and provide the web server with information such as the IP address and which browser the visitor uses.&nbsp;This site uses the Internet tags available in electronic ads that lead visitors to the site and on various pages of the site.&nbsp;Internet tags, tells how many times a page is opened and what information is searched.&nbsp;We do not use these tags to collect or search for personal information.</p>\r\n\r\n<p>&quot;Navigation data&quot; (&quot;log files&quot;, &quot;server logs&quot;, &quot;click data&quot;) is used to administer the system, improve the content of the website, conduct market research and provide information to the visitors.&nbsp;This site uses navigation data.</p>\r\n\r\n<h3><strong>USE AND DISCLOSURE OF INFORMATION</strong></h3>\r\n\r\n<p>We will use this information to:</p>\r\n\r\n<p>- improve the content of the Global Grant, adapt the Global Grant to the settings you have specified and research / statistics with anonymous information.<br />\r\n- deliver products and services, newsletters, answer your questions or tips / suggestions and other information you desire or provide ..<br />\r\n- if you wish, provide information on new offers and services, special offers, updated information and other offers or services from Global Grant, or our partners or suppliers.</p>\r\n\r\n<p>- if you wish, email information about the various activities you can participate in (SOS scholarship and other offers).</p>\r\n\r\n<p>If you actively provide information to us that can be traced back to you, we may combine such information with other information we have collected, unless we explicitly provide otherwise in connection with the collection of information.&nbsp;We do not use passively collected information to identify you unless you actively consent.</p>\r\n\r\n<p>You can revoke your consent at any time by contacting us at this email address&nbsp;<a href=\"mailto:lars@globalgrant.com\">lars@globalgrant.com</a></p>\r\n\r\n<p>You can set your browser to notify you when a cookie is sent, or so that your browser simply does not allow cookies.&nbsp;Some features of this site will then not work.</p>\r\n\r\n<h3><strong>THE TRANSFER OF PERSONAL DATA</strong></h3>\r\n\r\n<p>We may disclose your personal data to third parties in Sweden and / or any other country, but only</p>\r\n\r\n<p>(I) to our business partners (eg, companies that perform a service, provide technical support, provide supplier services and financial institutions).&nbsp;In that case, we require the provider in question to consent to the processing of your information in accordance with this Privacy Policy</p>\r\n\r\n<p>(II) in connection with the sale, transfer or other transfer of business on this site to another owner.<br />\r\nIn this case, we require interested buyers to process the information in accordance with this Privacy Policy, or</p>\r\n\r\n<p>(III), if provided for in laws, regulations and ordinances that apply in Sweden or in the country in which you use the Global Grant.</p>\r\n\r\n<p>We will also use anonymous information that we have obtained through this website that cannot be linked to any person.</p>\r\n\r\n<p>The collection, use and disclosure of information specified in this Privacy Policy may involve the transfer of information to jurisdictions other than Sweden.&nbsp;These areas may have different laws and regulations regarding personal information.&nbsp;In such cases, you will be asked to give your consent to such transfers in accordance with this Privacy Policy.</p>\r\n\r\n<h3><strong>ACCESS AND CORRECTION</strong></h3>\r\n\r\n<p>In order for your personal information to be accurate, up-to-date and complete, please contact us if you want to change or delete information that concerns you.&nbsp;We will do what is reasonably required to update or correct any personal information that we have and that you have previously provided via this site.</p>\r\n\r\n<h3><strong>SECURITY</strong></h3>\r\n\r\n<p>We do what is technically possible to protect your personal information when you send it from your computer to our website and to protect such information from loss, misuse and unauthorized access, disclosure, alteration and destruction.</p>\r\n\r\n<p>Please note that we cannot guarantee that information transmitted over the Internet is completely secure or error free.&nbsp;This is especially true of emails sent to or from this site, and you should therefore carefully consider what type of information you send to us via email.&nbsp;The web forms available on Global Grant are protected by SSL encryption certificates.&nbsp;Information you send us via the web forms is protected by similar technology used by the banks and the authorities.</p>\r\n\r\n<h3><strong>HOW TO CONTACT US</strong></h3>\r\n\r\n<p>If you have any comments or questions about this privacy policy or practices about this site, please contact us at the following address.&nbsp;<a href=\"mailto:lars@globalgrant.com\">lars@globalgrant.com</a>&nbsp;see our contact page for more contact options.</p>', 1, NULL, '2019-09-17 08:32:56'),
(30, 20, 2, '<h3><strong>DITT SAMTYCKE OCH ANSVARIG UTGIVARE</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Genom att anv&auml;nda denna webbplats samtycker du till villkoren i denna policy f&ouml;r personuppgifter. N&auml;r du skickar information via denna webbplats, godk&auml;nner du att information samlas in, anv&auml;nds och vidarebefordras&nbsp;i enlighet med denna policy f&ouml;r personuppgifter. GlobalGrant.com har utgivningsbevis fr&aring;n RTVV # 2007-071 och har tillst&aring;nd att utan tillst&aring;nd fr&aring;n dig hantera, lagra, publicera personlig informationom dig under personligt ansvar av v&aring;r ansvarige utgivare Elin Algotsson. Vi beh&ouml;ver allts&aring; inte f&ouml;lja PUL (lagen om Personuppgifter) men vi g&ouml;r det n&auml;r det g&auml;ller de av&auml;ndare som anv&auml;nder GlobalGrant f&ouml;r att s&ouml;ka st&ouml;d f&ouml;r personligt bruk.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Utgivningsbeviset &auml;r fr&auml;mst till f&ouml;r att kunna publicera personliga uppgifter om vem som sitter i fondernas styrelser och deras kontaktuppgifter s&aring; att du ska kunna f&aring; tag i dem och ans&ouml;ka om pengar eller andra st&ouml;d. Vissa stiftelser och fonder vill absolut inte finnas med i GlobalGrant men v&aring;rt utivningsbevis skyddar oss och ger oss tillst&aring;nd att publicera personliga uppgifter om dem, mot deas vilja. Eftersom utgivningsbeviset ytterst vilar p&aring; en grundlag, lagen om yttrandefrihet. Denna lag tillm&auml;ts st&ouml;rre betydelse och vikt &auml;n t.ex PUL.</p>\r\n\r\n<h3><strong>BARN</strong></h3>\r\n\r\n<p>Denna webbplats &auml;r inte avsedd f&ouml;r barn under 15. Vi kommer inte medvetet att samla in information fr&aring;n barn under 15 &aring;r p&aring; den h&auml;r webbplatsen.</p>\r\n\r\n<h3><strong>AKTIV INFORMATIONSINSAMLING</strong></h3>\r\n\r\n<p>P&aring; vissa sidor p&aring; webbplatsen kr&auml;vs att du anger information f&ouml;r att aktivera vissa funktioner (t.ex. f&ouml;r att prenumerera p&aring; nyhetsbrev, f&aring; tips / f&ouml;rslag p&aring; fonder listade, eller ans&ouml;ka om SOS-stipendiet.</p>\r\n\r\n<h3><strong>PASSIV INSAMLING AV INFORMATION</strong></h3>\r\n\r\n<p>N&auml;r du surfar p&aring; webbplatsen kan en del information samlas in passivt (dvs. samlas in utan att du aktivt tillhandah&aring;ller informationen) med hj&auml;lp av olika tekniker och metoder, bland annat insamling av IP-adresser, cookies, Internet-taggar, web beacons och insamling av information om vilka sidor och funtioner du anv&auml;nder mest.</p>\r\n\r\n<p>Vi anv&auml;nder IP-adresser p&aring; denna webbplats. En IP-adress &auml;r en sifferserie som din Internetleverant&ouml;r har tilldelat den dator du anv&auml;nder f&ouml;r att kunna ansluta till Internet. Generellt &auml;r denna information inte &auml;r knuten till en person, eftersom en IP-adress i de flesta fall &auml;r dynamisk (dvs. &auml;ndras varje g&aring;ng en dator ansluts till Internet) och allts&aring; inte statisk (adresen &auml;r fast kuten till en viss dator). Vi anv&auml;nder din IP-adress f&ouml;r att hj&auml;lpa till att l&ouml;sa problem med v&aring;r server, rapportera insamlad information, finna de kommunikationsv&auml;gar som &auml;r snabbast n&auml;r din dator ansluter till v&aring;r hemsida och att administrera och f&ouml;rb&auml;ttra webbplatsen.</p>\r\n\r\n<p>En cookie &auml;r en liten textfil med information som en webbplats skickar till din webbl&auml;sare f&ouml;r att hj&auml;lpa webbplatsen att komma ih&aring;g information om dig och dina preferenser. Du kan st&auml;lla in din webbl&auml;sare s&aring; att den meddelar dig n&auml;r en cookie skickas, eller att den helt enkelt inte till&aring;ter cookies. Vissa funktioner p&aring; den h&auml;r webbplatsen kommer d&aring; inte att fungera.</p>\r\n\r\n<p>Tempor&auml;ra cookies &auml;r tillf&auml;llig information raderas n&auml;r du st&auml;nger webbl&auml;sarf&ouml;nstret eller st&auml;nger av datorn. Tempor&auml;ra cookies anv&auml;nds f&ouml;r att underl&auml;tta navigeringen p&aring; webbplatsen och samla information f&ouml;r statistiska &auml;ndam&aring;l. Denna webbplats anv&auml;nder session cookies.</p>\r\n\r\n<p>Persistent cookies &auml;r mer permanent information om filer som lagras p&aring; h&aring;rddisken i din dator och som kan raderas om du aktivt raderar dem. Det finns flera orsaker till att anv&auml;nda permanenta cookies; de lagrar information p&aring; din dator som du tidigare har l&auml;mnat (t.ex. anv&auml;ndarnamn), f&ouml;r att g&ouml;ra det l&auml;ttare att ta reda p&aring; vilka delar av webbplatsen som anv&auml;nds mest eller minst och att anpassa webbplatsen efter dina preferenser. Global Grant anv&auml;nder&nbsp;<strong>inte</strong>&nbsp;permanenta cookies.</p>\r\n\r\n<p>&quot;Internet tags&quot; (kallas ocks&aring; single-pixel GIF, klara GIF, osynliga GIF-bilder och 1-by-1 GIF) &auml;r mindre &auml;n cookies och ger webbservern information s&aring;som IP-adress och vilken webbl&auml;sare bes&ouml;karen anv&auml;nder. Denna webbplats anv&auml;nder Internet tags tillg&auml;nglig i elektroniska annonser som leder bes&ouml;karna till webbplatsen och p&aring; olika sidor p&aring; webbplatsen. Internet-taggar, ber&auml;ttar hur m&aring;nga g&aring;nger en sida &ouml;ppnas och vilken information som s&ouml;ks. Vi anv&auml;nder inte dessa taggar f&ouml;r att samla in eller s&ouml;ka efter personuppgifter.</p>\r\n\r\n<p>&quot;Navigeringsdata&quot; (&quot;loggfiler&quot;, &quot;serverloggar&quot;, &quot;klickdata&quot;) anv&auml;nds f&ouml;r att administrera systemet, f&ouml;rb&auml;ttra inneh&aring;llet p&aring; webbplatsen, g&ouml;ra marknadsunders&ouml;kningar och ge information till bes&ouml;karna. Denna webbplats anv&auml;nder navigeringsdata.</p>\r\n\r\n<h3><strong>ANV&Auml;NDNING OCH UTL&Auml;MNANDE AV INFORMATION</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Vi kommer att anv&auml;nda denna information f&ouml;r att:</p>\r\n\r\n<p>- f&ouml;rb&auml;ttra inneh&aring;llet p&aring; Global Grant, anpassa Global Grant till de inst&auml;llningar du har angett och forskning / statistik med anonyma uppgifter.<br />\r\n- levera produkter och tj&auml;nster, nyhetsbrev, besvara dina fr&aring;gor eller tips / f&ouml;rslag och annan information du &ouml;nskar eller l&auml;mnar..<br />\r\n- om du &ouml;nskar, tillhandah&aring;lla information om nya erbjudanden och tj&auml;nster, specialerbjudanden, uppdaterad information och andra erbjudanden eller tj&auml;nster fr&aring;n Global Grant, eller v&aring;ra samarbetspartners eller leverant&ouml;rer.</p>\r\n\r\n<p>- om du &ouml;nskar, mejla information om de olika aktiviteter som du kan delta i (SOS stipendium och andra erbjudanden).</p>\r\n\r\n<p>Om du aktivt ger information till oss, som kan sp&aring;ras tillbaka till dig, kan vi kombinera s&aring;dan information med annan information vi har samlat in, s&aring;vida vi uttryckligen inte anger n&aring;got annat i samband med insamling av information. Vi anv&auml;nder inte passivt insamlad information f&ouml;r att identifiera dig, om du inte akivt samtycker.</p>\r\n\r\n<p>Du kan n&auml;r som helst &aring;terkalla ditt samtycke genom att kontakta oss p&aring; den h&auml;r e-postadressen&nbsp;<a href=\"mailto:lars@globalgrant.com\">lars@globalgrant.com</a></p>\r\n\r\n<p>Du kan st&auml;lla in din webbl&auml;sare s&aring; att den meddelar dig n&auml;r en cookie skickas, eller s&aring; att den webbl&auml;sare helt enkelt inte till&aring;ter cookies. N&aring;gra funktioner p&aring; den h&auml;r webbplatsen kommer d&aring; inte att fungera.</p>\r\n\r\n<h3><strong>&Ouml;VERF&Ouml;RINGEN AV PERSONUPPGIFTER</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Vi kan l&auml;mna ut dina personuppgifter till tredje part i Sverige och / eller n&aring;got annat land, men endast</p>\r\n\r\n<p>(I) till v&aring;ra samarbetspartners (t.ex. f&ouml;retag som utf&ouml;r en tj&auml;nst, ger teknisk support, utf&ouml;r leverant&ouml;rstj&auml;nster och finansiella institutioner). I s&aring; fall kr&auml;ver vi att leverant&ouml;ren i fr&aring;ga samtycker till att behandla informatonen om dig i enlighet med denna policy om personuppgifter</p>\r\n\r\n<p>(II) i samband med f&ouml;rs&auml;ljning, &ouml;verl&aring;telse eller annan &ouml;verf&ouml;ring av verksamheten p&aring; den h&auml;r webbplatsen till en annan &auml;gare.<br />\r\nI s&aring; fall kr&auml;ver vi att intresserade k&ouml;pare godk&auml;nner att behandla informationen i enlighet med denna policy f&ouml;r personuppgifter, eller</p>\r\n\r\n<p>(III), om detta f&ouml;reskrivs i lagar, regler och f&ouml;rordningar som gller i Sverige eller i det land d&auml;r du anv&auml;nder Global Grant.</p>\r\n\r\n<p>Vi kommer ocks&aring; att anv&auml;nda anonym information som vi har f&aring;tt genom denna webbplats som inte kan knytas till viss person.</p>\r\n\r\n<p>Insamling, anv&auml;ndning och utl&auml;mnande av uppgifter som anges i denna sekretesspolicy kan involvera en &ouml;verf&ouml;ring av information till andra r&auml;ttsomr&aring;den &auml;n Sverige. Dessa omr&aring;den kan ha olika lagar och f&ouml;rordningar om personlig information. I s&aring;dana fall kommer du att bli ombedd att ge ditt medgivande till s&aring;dana f&ouml;rflyttningar i &ouml;verensst&auml;mmelse med denna sekretesspolicy.</p>\r\n\r\n<h3><strong>&Aring;TKOMST OCH KORRIGERING</strong></h3>\r\n\r\n<p>F&ouml;r att dina personuppgifter ska vara korrekta, aktuella och fullst&auml;ndiga, v&auml;nligen kontakta oss om du vill &auml;ndra eller ta bort information som ber&ouml;r dig. Vi kommer att g&ouml;ra vad som sk&auml;ligen kr&auml;vs f&ouml;r att uppdatera eller korrigera personuppgifter som vi har och som du tidigare har l&auml;mnat via denna webbplats.</p>\r\n\r\n<h3><strong>S&Auml;KERHET</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Vi g&ouml;r vad som &auml;r tekniskt m&ouml;jligt f&ouml;r att skydda dina personuppgifter n&auml;r du skickar dem fr&aring;n din dator till v&aring;r webbplats och f&ouml;r att skydda s&aring;dan information fr&aring;n f&ouml;rlust, missbruk och obeh&ouml;rig &aring;tkomst, avsl&ouml;jande, &auml;ndringar och f&ouml;rst&ouml;relse.</p>\r\n\r\n<p>Observera att vi inte kan garantera att information som &ouml;verf&ouml;rs via Internet &auml;r fullst&auml;ndigt s&auml;ker eller felfri. Detta g&auml;ller i synnerhet e-post som skickas till eller fr&aring;n denna webbplats, och du b&ouml;r d&auml;rf&ouml;r noga &ouml;verv&auml;ga vilken typ av information som du skickar till oss via e-post. De webbformul&auml;r som finns p&aring; Global Grant skyddas av SSL certifikat med kryptering. Information du skickar oss via webbformul&auml;ren &auml;r skyddade med liknande teknik som bankerna och myndigheterna anv&auml;nder.</p>\r\n\r\n<h3><strong>HUR DU KONTAKTAR OSS</strong></h3>\r\n\r\n<p>Om du har synpunkter eller fr&aring;gor om denna policy f&ouml;r personuppgifter eller praxis om denna webbplats, v&auml;nligen kontakta oss p&aring; f&ouml;ljande adress.&nbsp;<a href=\"mailto:lars@globalgrant.com\">lars@globalgrant.com</a>&nbsp;se v&aring;r kontaktsida f&ouml;r fler kontaktalternativ.</p>', 1, NULL, '2019-09-17 08:32:56'),
(31, 21, 1, '<h1>&nbsp;</h1>\r\n\r\n<p>Support &amp; Scholarships AB - Global Grant does its best to provide current and accurate information, but does not make any claims, guarantees or assurances regarding the accuracy, timeliness or completeness of current information.&nbsp;Support &amp; Scholarships AB - Global Grant is not liable for any financial, material or personal damages arising from your access to or lack of ability to access this site, or as a result of your reliance on any information available on this site .</p>\r\n\r\n<p>Support &amp; Scholarships AB - Global Grant may provide links and references to other websites, but Support &amp; Scholarships AB - Global Grant is not responsible for the content of such sites, nor are they liable for any material or personal injury resulting from such content .&nbsp;Any links to other websites have been provided solely to assist the users of this site.</p>\r\n\r\n<p>The trademarks, service marks, trade names, product designs and products mentioned on this website are protected internationally.&nbsp;The aforementioned may not be used without the prior written permission of the owners of this website, except for identification of the company&#39;s products and service offerings.</p>\r\n\r\n<p>All personal information transmitted to and from this site is processed, stored or archived is governed by the Support &amp; Scholarship AB - Global Grant Privacy Policy and the Swedish and international laws and directives governing the communication, use and storage of personal information.&nbsp;Support &amp; Scholarships AB - Global Grant has the right to use and copy information provided to improve the function, security and use of globalgrant.com for the benefit of our members, users and GlobalGrant&#39;s owners, within the laws and directives that protect the personal information and integrity.&nbsp;Information that we may use or copy include disclosure of personal information to third parties and / or development, production and / or marketing of goods and services;</p>\r\n\r\n<p>The developers and marketers employed by GlobalGrant are bound by individual confidentiality agreements.&nbsp;However, Support &amp; Scholarships AB - Global Grant does not have any confidentiality agreements with the companies and authorities that provide the Internet, operating systems, encryption algorithms, database managers and communication programs and the company is the host for our server.&nbsp;</p>', 1, NULL, '2019-09-17 08:34:44'),
(32, 21, 2, '<p>St&ouml;d &amp; Stipendier AB - Global Grant&nbsp;g&ouml;r sitt b&auml;sta f&ouml;r att f&aring; med aktuella och korrekta upplysningar, men anf&ouml;r inte n&aring;gra p&aring;st&aring;enden, garantier eller f&ouml;rs&auml;kringar vad g&auml;ller aktuella upplysningars riktighet, aktualitet eller fullst&auml;ndighet.&nbsp;St&ouml;d &amp; Stipendier AB - Global Grant &auml;r inte ers&auml;ttningsskyldiga f&ouml;r finansiella, materiella eller personella skador som uppst&aring;r till f&ouml;ljd av din tillg&aring;ng till eller bristande f&ouml;rm&aring;ga att f&aring; tillg&aring;ng till denna webbplats, eller till f&ouml;ljd av din tillit till eventuella upplysningar som &auml;r tillg&auml;ngliga p&aring; denna webbplats.</p>\r\n\r\n<p>St&ouml;d &amp; Stipendier AB - Global Grant tillhandah&aring;ller eventuellt l&auml;nkar och h&auml;nvisningar till andra webbplatser, men&nbsp;St&ouml;d &amp; Stipendier AB - Global Grant b&auml;r inte ansvaret f&ouml;r inneh&aring;llet p&aring; s&aring;dana webbplatser och de &auml;r inte heller ers&auml;ttningsskyldiga f&ouml;r material- eller personskador som uppst&aring;r p&aring; grund av dylikt inneh&aring;ll. Eventuella l&auml;nkar till andra webbplatser har uteslutande angivits f&ouml;r att hj&auml;lpa anv&auml;ndarna av denna webbplats.</p>\r\n\r\n<p>De varum&auml;rken, servicem&auml;rken, varunamn, varudesigner och produkter som n&auml;mns p&aring; denna webbplats &auml;r skyddade internationellt. De ovan n&auml;mnda f&aring;r inte anv&auml;ndas utan f&ouml;reg&aring;ende skriftligt tillst&aring;nd fr&aring;n &auml;garna av denna webbplats, med undantag f&ouml;r identifikation av f&ouml;retagets produkter och serviceutbud.</p>\r\n\r\n<p>All personlig information som s&auml;nds till och fr&aring;n denna denna webbplats, behandlas, sparas eller arkiveras regleras av St&ouml;d &amp; Stipendier AB - Global Grant integritetspolicy och de svenska och internationella lagar och direktiv som styr och reglerar kommunikation, anv&auml;ndning och lagring av personlig information.&nbsp;&nbsp;St&ouml;d &amp; Stipendier AB - Global Grant har r&auml;ttighet att anv&auml;nda och kopiera upplysningar som l&auml;mnas f&ouml;r att f&ouml;rb&auml;ttra funktionen, s&auml;kerheten och anv&auml;ndningen av globalgrant.com till nytta f&ouml;r v&aring;ra medlemmar, anv&auml;ndare och GlobalGrants &auml;gare, inom ramen f&ouml;r de lagar och direktiv som skyddar den personliga inormationen och integriteten. Upplysningar som vi kan komma att anv&auml;nda eller kopiera innefattar avsl&ouml;jande av personliga uppgifter till tredje part och/eller utveckling, framst&auml;llning och/eller marknadsf&ouml;ring av varor och tj&auml;nster, men endast i de fall d&auml;r du ger ditt uttryckliga tillst&aring;nd till detta.</p>\r\n\r\n<p>De utvecklare och marknadsf&ouml;rare som GlobalGrant anlitar &auml;r bundna av individuella sekretessavtal. D&auml;remot har St&ouml;d &amp; Stipendier AB - Global Grant inga sekretessavtal med de f&ouml;retag och myndigheter som tillhandah&aring;ller Internet, operativsystem, krypteringsalgoritmer, databashanterare och kommunikationsprogram och det f&ouml;retag st&aring;r som fysisk v&auml;rd (host) f&ouml;r v&aring;r server.&nbsp;</p>', 1, NULL, '2019-09-17 08:34:44'),
(33, 22, 1, NULL, 1, NULL, '2019-09-17 08:30:57'),
(34, 22, 2, '<p>Om din kommun inte finns med i listan, s&ouml;k p&aring; universitetes/bibliotekets webbplats efter Global Grant. Googla t.ex&nbsp;<strong>&quot;databaser lund&quot;.</strong>&nbsp;Klicka p&aring; r&auml;tt l&auml;nk till&nbsp;<strong>Databaser Folkbiblioteken Lund</strong>&nbsp;och f&ouml;lj instruktionen.</p>\r\n\r\n<p><a href=\"https://0-www.globalgrant.com.www.gotlib.goteborg.se/search\"><strong>G&Ouml;TEBORGARE logga in h&auml;r</strong></a></p>\r\n\r\n<p>Om du inte kan anv&auml;nda biblioteket kan du&nbsp;<a href=\"https://www.globalgrant.com/price-list\">k&ouml;pa ett eget abonnemang h&auml;r</a></p>', 1, NULL, '2019-09-17 08:30:57'),
(35, 23, 1, '<h3>1. CAN YOU GET MONEY FROM SUPPORT &amp; SCHOLARSHIPS - GLOBAL GRANT?</h3>\r\n\r\n<p>No we do not distribute money ourselves, we give you information and guidance in the fund jungle.</p>\r\n\r\n<h3><strong>&nbsp; 2. IS SUPPORT &amp; SCHOLARSHIPS - GLOBAL GRANT A CHARITY?</strong></h3>\r\n\r\n<p>No we are a business limited company with hired scholarship consultants.&nbsp;But most of our services are free for you because your library, municipality, college or school pays for you, by subscribing to the Global Grant on your behalf.</p>\r\n\r\n<h3><strong>&nbsp; 3. DOES SUPPORT &amp; SCHOLARSHIPS - GLOBALGRANT GIVE MONEY FOR OTHER PURPOSES?</strong></h3>\r\n\r\n<p>No we do not.&nbsp;Global Grant guides you on the path to finding the right sources to fund your individual and organizational needs.&nbsp;We help in the application process to improve the chances of your application being successful.</p>\r\n\r\n<h3><strong>&nbsp;</strong>&nbsp;4. HOW CAN GLOBAL GRANTS &amp; SCHOLARSHIPS HELP YOU?</h3>\r\n\r\n<p>We help you find the right donor and make a good application.&nbsp;We also help donors, donors, foundations and foundations to find the best recipients and fellows according to the criteria that each donor has.</p>\r\n\r\n<h3><strong>&nbsp;</strong>&nbsp;5. WHO CAN USE GLOBALGRANT?</h3>\r\n\r\n<p>Those who want to donate money or other things and those who need money or other things.&nbsp;We provide students, the sick, the disabled, the poor, groups, classes, associations, organizations, hospitals, curators, social assistants, dentists and other welfare workers with information about which foundations, foundations and donors give out money or other things.&nbsp;</p>\r\n\r\n<h3>&nbsp; 6. FOR WHAT PURPOSES CAN I USE GLOBALGRANT&#39;S SERVICES?</h3>\r\n\r\n<p>With the information you get from us, there is a chance to fund your education from primary, secondary, post-secondary, postgraduate, etc. upwards.&nbsp;You can fund things that are not paid by the state or municipality in case of illness, disability or if you are simply poor and in need.&nbsp;We help find funding for projects run by organizations, companies, hospitals, schools, universities and other academic institutions.&nbsp;Activities in culture, art, music, religion, peace, sustainability or livelihood, charity, patient associations and all other non-commercial projects.</p>\r\n\r\n<h3>&nbsp; 7. WHAT KIND OF SUPPORT CAN I GET FROM THE DONORS?</h3>\r\n\r\n<p>It can be pure money, discounted tuition fees, free food &amp; lodging, travel, advice on social and financial issues, free health care or therapy of various kinds.</p>\r\n\r\n<h3>&nbsp; 8. WHERE DOES THE MONEY COME FROM?</h3>\r\n\r\n<p>Most of the funds come from charities and foundations in Sweden, the EU and the US.</p>\r\n\r\n<h3><strong>&nbsp; 9. WHAT CHANCE DO I HAVE TO RECEIVE A DIVIDEND?</strong></h3>\r\n\r\n<p>It depends on your application.&nbsp;We do not decide who will receive dividends or help.&nbsp;You are competing with other applicants and those who make a really good application and really need the money have great chances.&nbsp;If you make a bad application and don&#39;t really need the money, you have no chance.&nbsp;Global Grant helps you in the process.</p>\r\n\r\n<h3><strong>10. HOW MUCH CAN I PAY?</strong></h3>\r\n\r\n<p>The amount varies depending on your needs and projects.&nbsp;It can range from a minimum of SEK 2000 to a maximum of SEK 200,000 per fund per year.&nbsp;Or even more, up to several million a year for institutions and organizations with a good business.</p>\r\n\r\n<h3><strong>11. HOW MUCH DOES IT COST TO GET HELP?</strong></h3>\r\n\r\n<p>Most of our services and products give you access to free of charge.&nbsp;For example, through your library or school.&nbsp;Some services, such as the custom-made list, cost a little.&nbsp;See our&nbsp;<a href=\"https://www.globalgrant.com/price-list\">price list</a>&nbsp;.</p>\r\n\r\n<h3><strong>12. TRANSLATION OF FOREIGN SCHOLARSHIP TEXTS AND WEB PAGES INTO SWEDISH</strong></h3>\r\n\r\n<p>The easiest method we think is to use Google Chrome and follow the instructions on this page&nbsp;&nbsp;<a href=\"https://support.google.com/chrome/answer/173424?p=ib_translation_bar&amp;rd=1&amp;hl=sv\">https://support.google.com/chrome/answer/173424?p=ib_translation_bar&amp;rd=1&amp;hl=en</a></p>\r\n\r\n<h3><strong>13. PROBLEMS WITH THE BROWSER AND THE COMPUTER</strong></h3>\r\n\r\n<p>Here are explanations in English of what you can do when your browser or computer is not working properly.&nbsp;You can translate the articles into Swedish in Google Chrome.&nbsp;See how to do it in section 12.</p>\r\n\r\n<p>Mozilla Firefox:&nbsp;&nbsp;<a href=\"https://support.mozilla.org/en-US/products/firefox/fix-problems/websites\" target=\"_blank\">https://support.mozilla.org/en-US/products/firefox/fix-problems/websites</a></p>\r\n\r\n<p>Google Crome:&nbsp;&nbsp;<a href=\"https://www.howtogeek.com/135300/how-to-troubleshoot-google-chrome-crashes/\" target=\"_blank\">https://www.howtogeek.com/135300/how-to-troubleshoot-google-chrome-crashes/</a></p>\r\n\r\n<p>Internet Explorer:&nbsp;&nbsp;<a href=\"https://support.microsoft.com/internet-explorer\" target=\"_blank\">https://support.microsoft.com/internet-explorer</a></p>\r\n\r\n<p>Slow PC / Mac: Regularly install and run CCleaner, a free program,&nbsp;<a href=\"https://www.piriform.com/ccleaner\" target=\"_blank\">https://www.piriform.com/ccleaner</a></p>\r\n\r\n<h3><strong>14. HELP FOR THE VISUALLY IMPAIRED AND DYSLEXIC</strong></h3>\r\n\r\n<p>There are several programs that read written text in Swedish or English and several other languages.&nbsp;They are not yet complete but within a year you can not hear that it is a &quot;robot&quot; reading.&nbsp;Here is a free program, eSpeak, which is suitable for Windows&nbsp;&nbsp;<a href=\"http://download.cnet.com/eSpeak/3000-33660_4-75886780.html?tag=dropDownForm;productListing;fav\">http://download.cnet.com/eSpeak/3000-33660_4-75886780.html?tag=dropDownForm;productListing;fav</a>&nbsp;there are many more for different types of computers, tablets and smartphones.</p>', 1, NULL, '2019-09-17 08:35:39'),
(36, 23, 2, '<h3>1. KAN DU F&Aring; PENGAR AV ST&Ouml;D &amp; STIPENDIER - GLOBAL GRANT?</h3>\r\n\r\n<p>Nej vi delar sj&auml;lva inte ut pengar, vi ger dig upplysningar och v&auml;gledning i fonddjungeln.</p>\r\n\r\n<h3><strong>&nbsp; 2. &Auml;R ST&Ouml;D &amp; STIPENDIER -&nbsp;GLOBAL GRANT EN V&Auml;LG&Ouml;RENHETSORGANISATION?</strong></h3>\r\n\r\n<p>Nej vi &auml;r ett&nbsp;aff&auml;rsdrivande aktiebolag med anst&auml;lda stipendiekonsulter. Men de flesta av v&aring;ra tj&auml;nster &auml;r gratis f&ouml;r dig eftersom ditt bibliotek,&nbsp;kommun, h&ouml;gskola&nbsp;eller skola betalar f&ouml;r dig, genom att abonnera p&aring; Global Grant&nbsp;f&ouml;r din r&auml;kning.</p>\r\n\r\n<h3><strong>&nbsp; 3. GER ST&Ouml;D &amp; STIPENDIER -&nbsp;GLOBALGRANT UT PENGAR F&Ouml;R ANDRA &Auml;NDAM&Aring;L?</strong></h3>\r\n\r\n<p>Nej, det g&ouml;r vi inte. Global Grant leder dig p&aring; v&auml;gen att hitta de r&auml;tta k&auml;llorna f&ouml;r att finansiera dina individuella och organisatoriska behov. Vi hj&auml;lper till i ans&ouml;kningsprocessen f&ouml;r att f&ouml;rb&auml;ttra chanserna f&ouml;r din ans&ouml;kan att bli framg&aring;ngsrik.</p>\r\n\r\n<h3><strong>&nbsp;</strong>&nbsp;4. HUR KAN ST&Ouml;D &amp; STIPENDIER -&nbsp;GLOBAL GRANT HJ&Auml;LPA DIG?</h3>\r\n\r\n<p>Vi hj&auml;lper dig med att finna r&auml;tt givare och g&ouml;ra en bra ans&ouml;kan. Vi hj&auml;lper &auml;ven givare, donatorer, fonder och stiftelser att finna de b&auml;sta mottagarna och stipendiaterna enligt de kriterier som varje givare har.</p>\r\n\r\n<h3><strong>&nbsp;</strong>&nbsp;5. VEM KAN ANV&Auml;NDA GLOBALGRANT?</h3>\r\n\r\n<p>De som vill donera pengar eller andra saker och de som beh&ouml;ver pengar eller andra saker.&nbsp;Vi ger studenter, sjuka, handikappade, fattiga, grupper, klasser, f&ouml;reningar,&nbsp;organisationer, sjukhus, kuratorer, socialassistenter, tandl&auml;kare och andra v&auml;lf&auml;rdsarbetare&nbsp;information om vilka&nbsp;stiftelser, fonder och donatorer&nbsp;som delar ut pengar eller andra saker.&nbsp;</p>\r\n\r\n<h3>&nbsp; 6. F&Ouml;R VILKA SYFTEN KAN JAG ANV&Auml;NDA GLOBALGRANTS TJ&Auml;NSTER?</h3>\r\n\r\n<p>Med den information som du&nbsp;f&aring;r av oss, finns det en chans&nbsp;att finansiera din utbildning allt&nbsp;fr&aring;n grundskolan, gymnasiet, postgymnasiala studier, h&ouml;gskolestudier osv upp&aring;t. Du kan finansiera s&aring;dant som inte betalas av staten eller kommunen vid sjukdom, funktionshinder eller om du helt enkelt &auml;r fattig och beh&ouml;vande. Vi hj&auml;lper till med att finna finansiering till&nbsp;projekt som drivs av organisationer &nbsp;f&ouml;retag, sjukhus, skolor, universitet och andra akademiska institutioner. Verksamheter inom&nbsp;kultur, konst, musik, religion, fred, h&aring;llbarhet eller f&ouml;rs&ouml;rjning, v&auml;lg&ouml;renhet, patientf&ouml;reningar och alla andra projekt av&nbsp;icke-kommersiell natur.</p>\r\n\r\n<h3>&nbsp; 7. VILKEN TYP AV ST&Ouml;D KAN JAG F&Aring; FR&Aring;N GIVARNA?</h3>\r\n\r\n<p>Det kan vara rena pengar, rabatterad studieavgifter, fri kost &amp; logi, resor, r&aring;d i sociala och ekonomiska fr&aring;gor, kostnadsfri h&auml;lsov&aring;rd eller terapi av olika slag.</p>\r\n\r\n<h3>&nbsp; 8. VAR KOMMER PENGARNA IFR&Aring;N?</h3>\r\n\r\n<p>Merparten av medlen kommer fr&aring;n v&auml;lg&ouml;renhetsorganisationer och stiftelser i Sverige, EU och USA.</p>\r\n\r\n<h3><strong>&nbsp; 9. VILKEN CHANS HAR JAG ATT F&Aring; UTDELNING?</strong></h3>\r\n\r\n<p>Det beror p&aring; din ans&ouml;kan. Vi beslutar inte vilka som f&aring;r utdelning eller hj&auml;lp. Du konkurrerar&nbsp;med andra s&ouml;kande och de som g&ouml;r en riktigt bra ans&ouml;kan och verkligen beh&ouml;ver pengarna har stora chanser. G&ouml;r du en d&aring;lig ans&ouml;kan och egentligen inte beh&ouml;ver pengarna s&aring; har du ingen chans.&nbsp;Global Grant hj&auml;lper dig i processen.</p>\r\n\r\n<h3><strong>10. HUR MYCKET KAN JAG I UTDELNING?</strong></h3>\r\n\r\n<p>Beloppet varierar beroende p&aring; ditt&nbsp;behov och projekt. Det kan vara allt fr&aring;n ett minimum p&aring; &nbsp;2000 kr till maximalt 200000 kr per fond och &aring;r. Eller &auml;nnu mer,&nbsp;upp till flera miljoner&nbsp;per &aring;r f&ouml;r institutioner och organisationer med en bra verksamhet.</p>\r\n\r\n<h3><strong>11. HUR MYCKET KOSTAR DET ATT F&Aring; HJ&Auml;LP?</strong></h3>\r\n\r\n<p>De flesta av v&aring;ra tj&auml;nster och produkter f&aring;r du&nbsp;tillg&aring;ng till gratis utan kostnad. T.ex via ditt bibliotek eller din skola. N&aring;gra tj&auml;nster som t.ex den skr&auml;ddarsydda&nbsp;listan kostar en slant. Se v&aring;r&nbsp;<a href=\"https://www.globalgrant.com/price-list\">prislista</a>.</p>\r\n\r\n<h3><strong>12. &Ouml;VERS&Auml;TTNING AV UTL&Auml;NDSKA STIPENDIETEXTER OCH WEBBSIDOR TILL SVENSKA</strong></h3>\r\n\r\n<p>Den enklaste metoden tycker vi &auml;r att anv&auml;nda Google Chrome och f&ouml;lja instruktionerna p&aring; denna sida&nbsp;<a href=\"https://support.google.com/chrome/answer/173424?p=ib_translation_bar&amp;rd=1&amp;hl=sv\">https://support.google.com/chrome/answer/173424?p=ib_translation_bar&amp;rd=1&amp;hl=sv</a></p>\r\n\r\n<h3><strong>13. PROBLEM MED WEBBL&Auml;SAREN OCH DATORN</strong></h3>\r\n\r\n<p>H&auml;r finns f&ouml;rklaringar p&aring; engelska vad du kan g&ouml;ra n&auml;r din webbl&auml;sare eller dator inte fungerar som den ska. Du kan &ouml;vers&auml;tta artiklarna till svenska i Google Chrome. Se hur du g&ouml;r det under punkt 12.</p>\r\n\r\n<p>Mozilla Firefox:&nbsp;&nbsp;<a href=\"https://support.mozilla.org/en-US/products/firefox/fix-problems/websites\" target=\"_blank\">https://support.mozilla.org/en-US/products/firefox/fix-problems/websites</a></p>\r\n\r\n<p>Google Crome:&nbsp;&nbsp;<a href=\"https://www.howtogeek.com/135300/how-to-troubleshoot-google-chrome-crashes/\" target=\"_blank\">https://www.howtogeek.com/135300/how-to-troubleshoot-google-chrome-crashes/</a></p>\r\n\r\n<p>Internet Explorer:&nbsp;&nbsp;<a href=\"https://support.microsoft.com/internet-explorer\" target=\"_blank\">https://support.microsoft.com/internet-explorer</a></p>\r\n\r\n<p>L&aring;ngsam PC/Mac: Installera och k&ouml;r regelbundet CCleaner,&nbsp;ett gratisprogram,&nbsp;<a href=\"https://www.piriform.com/ccleaner\" target=\"_blank\">https://www.piriform.com/ccleaner</a></p>\r\n\r\n<h3><strong>14. HJ&Auml;LP F&Ouml;R SYNSKADADE OCH DYSLEKTIKER</strong></h3>\r\n\r\n<p>Det finns flera program som l&auml;ser upp skriven text p&aring; svenska eller engelska och flera andra spr&aring;k. De &auml;r &auml;nnu inte full&auml;ndade men inom n&aring;got &aring;r g&aring;r det inte h&ouml;ra att det &auml;r en &quot;robot&quot; som l&auml;ser. H&auml;r &auml;r ett gratisprogram, eSpeak, som passar f&ouml;r Windows&nbsp;<a href=\"http://download.cnet.com/eSpeak/3000-33660_4-75886780.html?tag=dropDownForm;productListing;fav\">http://download.cnet.com/eSpeak/3000-33660_4-75886780.html?tag=dropDownForm;productListing;fav</a>&nbsp;det finns m&aring;nga fler f&ouml;r olika typer av datorer, surfplattor och smartphones.</p>', 1, NULL, '2019-09-17 08:35:39');
INSERT INTO `gg_page_blocks` (`id`, `page_id`, `language_id`, `text`, `status`, `created_at`, `updated_at`) VALUES
(37, 24, 1, '<p><strong>If you are looking for student scholarships, do the following:</strong></p>\r\n\r\n<ul>\r\n	<li>First you look for scholarships with a connection to your current place of residence, then where you grew up, and possibly.&nbsp;your birthplace.&nbsp;Search at both the county and municipal levels.</li>\r\n	<li>Search the names of the church parishes where you have been registered.</li>\r\n	<li>Apply for scholarships related to your subject and scholarships that have no subject affiliation requirements.</li>\r\n	<li>Continue searching for scholarships related to the schools and locations you will be studying at.</li>\r\n	<li>Finally, you can search for scholarships related to your student union or an association or church of which you are a member.</li>\r\n</ul>\r\n\r\n<p><strong>If you are looking for grants to the needy, or the sick or the disabled, do the following:</strong></p>\r\n\r\n<ul>\r\n	<li>Search for grants related to your current place of residence, search at the county and municipal levels, and at the church parish where you are registered.</li>\r\n	<li>Find grants related to your illness or disability or your hospital and the county council to which you belong.</li>\r\n	<li>Finally, you can look for grants that have links to your union.</li>\r\n</ul>\r\n\r\n<p>Each search results in a list of funds.&nbsp;Read through the list and select the funds you want to save.&nbsp;Often click SAVE so you don&#39;t lose any funds you selected.&nbsp;Then print the list of the selected funds or email the list to yourself.</p>\r\n\r\n<p>It does not matter if you use lower or upper case letters, you get the same result if you write contributions, CONTRIBUTIONS or Contributions.&nbsp;When searching, the program looks for the funds that contain the words, purposes, and other categories you entered.&nbsp;The funds are also rated with invisible tags to help you find the funds that are hiding behind poorly formulated descriptions.&nbsp;If you get too few hits, specify more characteristics eg gender, topic etc.&nbsp;you get more hits.</p>\r\n\r\n<p><strong>Help for the visually impaired, dyslexic, illiterate, illiterate or those with cognitive disorders.</strong><br />\r\nThere are several programs that read written text in Swedish or English and many other languages.&nbsp;They are almost perfect you can hardly hear that it is a &quot;robot&quot; reading.&nbsp;There are also programs that translate text from Swedish to other languages, but they are not yet complete, but we hope that someday they can be near to perfect.</p>\r\n\r\n<p><strong>How to search Global Grant, a monitor video with multiple spoken languages ​​for users and library staff webinars</strong><br />\r\nWe will make manuals in several spoken languages ​​with a monitor video, showing how to search the Global Grant.&nbsp;These you will be able to download or stream from our website, Google or Youtube.&nbsp;We also want to produce interactive webinars for library staff.</p>\r\n\r\n<h3><strong>YOUR MEMBER PAGE</strong></h3>\r\n\r\n<p>On your member page you can describe yourself.&nbsp;Tell us who you are and the purpose of what you want to do.&nbsp;The funds want to know more about your person and character than about your educational description.&nbsp;Include both the positive and the things that handicap you.&nbsp;Describe your character, tell yourself about yourself and your story and your future plans, make it as personal as you can.&nbsp;Link to certificates, grades and other documents that substantiate the facts that you state in your application letter.&nbsp;Also upload photos, yes even video, if you really want to make an impression, a picture says more than 1000 words and makes the application really personal.</p>\r\n\r\n<p>Print the application and&nbsp;<em>remember to sign it,</em>&nbsp;attach copies of all documents supporting your application, and then send everything to the respective fund you wish to apply for.&nbsp;Post everything well in advance of the last application date.</p>\r\n\r\n<p>Do not apply by e-mail unless the fund wants it.</p>\r\n\r\n<p><strong>APPLY FOR MONEY TO FUNDS AND ORGANIZATIONS</strong></p>\r\n\r\n<p>Read the five points below. The word T-R-U-S-T translated to Latin is CREDERE&nbsp; &#39;to believe or trust&#39;, a&nbsp; modern word for credere is&nbsp;<em>credit&nbsp;</em>:)</p>\r\n\r\n<h2>T - TELL A STORY&nbsp;</h2>\r\n\r\n<p>Everyone likes a good yarn, not least trustees. Tug on those heartstrings and make the message you are trying to get across more personal. Case studies are vital in trust fundraising so keep a constantly updated supply to hand, with quotes if possible. Look at the rhythm of your proposal &ndash; does it come together well and flow as an entire document, or is it a bit disjointed? It should be easy to read, just like a story, with a beginning, middle and end. However, do make sure that there are some hard facts along with the emotional side of things (see the section on Specifics below).</p>\r\n\r\n<p>A picture says more than 1000 words, a video more than one million words. Watch this video, &quot;The Gift&quot;&nbsp;<a href=\"https://www.globalgrant.com/contact-us\" target=\"_blank\">https://www.globalgrant.com/contact-us</a>&nbsp;It is at the top right of the page. Enlarge the image, turn up the sound and be &quot;emotionally moved&quot;. If you have a slow connection download the video first. The opening phrase of the video captures everyone&#39;s attention in a second ... &quot;I never liked my father ...&quot; 7 minutes long.</p>\r\n\r\n<p>Emotions makes even trustees move, make an application that moves people.</p>\r\n\r\n<h2>R- RESEARCH AND RELATIONSHIPS</h2>\r\n\r\n<p>Always do your research. An enormous number of worthy bids end up in the trustees&rsquo; bins because the applicant has not done their research properly. Read the guidelines or giving criteria closely and do not apply to trusts that will not fund your particular type of project. Build relationships where possible with the administrators and trustees. If any of your major donors or Board members know the trustees, make contact and develop their interest in your organisation and project. Remember, relationships are not a short-term undertaking and take careful planning and cultivation.</p>\r\n\r\n<h2>U - USP</h2>\r\n\r\n<p>What is your organisation&rsquo;s (or project&rsquo;s) Unique Selling Point? Are you the only one to do what you do in your local area/region/country? Do you do something differently to others? Can you offer better or wider-reaching services? What will be the consequences of not receiving a grant? Learn to really sell your organisation and its work.</p>\r\n\r\n<h2>S - SPECIFICS</h2>\r\n\r\n<p>Trustees do not appreciate vague applications. Be specific with facts and figures when writing about why your project needs their money, and be specific again about exactly how much money you are asking for. Finally, be specific when you are telling them what you will do with their money, how many people/animals etc will benefit, what the intended aims and outcomes of your project are, and in what timescale.</p>\r\n\r\n<h2>T - TIMING</h2>\r\n\r\n<p>Linked in with undertaking proper research, find out wherever possible when the trustees&rsquo; next meeting is and when the cut off date is for you to send in your bid. Ensure you leave yourself plenty of time to write the bid, obtain any signatures or referees&rsquo; details required, and allow time for others to critique your bid and make amendments. Also under the heading Timing, thank any trust that gives you a grant immediately and do not forget to diarise the date by which you need to submit a grant report, allowing plenty of time for you to collate the relevant information from all parties.</p>', 1, NULL, '2019-09-17 08:36:09'),
(38, 24, 2, '<p><strong>G&ouml;r s&aring; h&auml;r om du ska s&ouml;ka studiestipendier:</strong></p>\r\n\r\n<ul>\r\n	<li>F&ouml;rst s&ouml;ker du efter stipendier med en anknytning till din nuvarande hemort, sedan d&auml;r du v&auml;xte upp, och ev. din f&ouml;delseort. S&ouml;k b&aring;de p&aring; l&auml;ns-och kommunal niv&aring;.</li>\r\n	<li>S&ouml;k p&aring; namnen p&aring; de kyrkof&ouml;rsamlingar d&auml;r du varit folkbokf&ouml;rd.</li>\r\n	<li>S&ouml;k stipendier med anknytning till ditt &auml;mne och stipendier som inte har n&aring;gra krav p&aring; &auml;mnestillh&ouml;righet.</li>\r\n	<li>Forts&auml;tt s&ouml;ka efter stipendier med anknytning till de skolor och orter som du ska studera p&aring;.</li>\r\n	<li>Till slut kan du s&ouml;ka efter stipendier med anknytning till din studentk&aring;r eller en f&ouml;rening eller kyrka som du &auml;r medlem i.</li>\r\n</ul>\r\n\r\n<p><strong>Om du s&ouml;ker efter bidrag till ekonomiskt beh&ouml;vande, eller att de sjuka eller handikappade, g&ouml;r s&aring; h&auml;r:</strong></p>\r\n\r\n<ul>\r\n	<li>S&ouml;k efter bidrag med anknytning till din nuvarande hemort, s&ouml;k p&aring; l&auml;ns-och kommunniv&aring;, och p&aring; den kyrkof&ouml;rsamling d&auml;r du &auml;r folkbokf&ouml;rd.</li>\r\n	<li>S&ouml;k bidrag med anknytning till din sjukdom eller funktionshinder eller ditt sjukhus och det landsting som du tillh&ouml;r.</li>\r\n	<li>Till sist, kan du s&ouml;ka efter bidrag som har kopplingar till ditt fackf&ouml;rbund.</li>\r\n</ul>\r\n\r\n<p>Varje s&ouml;kning resulterar i en lista med fonder. L&auml;s igenom listan, och markera de fonder som du vill spara. Klicka ofta p&aring; SPARA s&aring; du inte tappar bort n&aring;gon fond du markerat. Skriv sedan ut listan med de markerade fonderna eller mejla listan till dig sj&auml;lv.</p>\r\n\r\n<p>Det spelar ingen roll om du anv&auml;nder sm&aring; eller stora bokst&auml;ver, du f&aring;r samma resultat om du skriver bidrag, BIDRAG eller Bidrag. Vid s&ouml;kningen letar programmet efter de fonder som inneh&aring;ller de ord, &auml;ndam&aring;l och &ouml;vriga kategorier du angett. Fonderna &auml;r ocks&aring; klassade med osynliga taggar f&ouml;r att hj&auml;lpa dig att finna de fonder som g&ouml;mmer sig bakom d&aring;ligt formulerade beskrivningar. F&aring;r du f&ouml;r lite tr&auml;ffar s&aring; ange fler egenskaper t.ex k&ouml;n, &auml;mne osv. s&aring; f&aring;r du fler tr&auml;ffar.</p>\r\n\r\n<p><strong>Hj&auml;lp f&ouml;r synskadade, dyslektiker, analfabeter, illiterata eller de med kognitiva besv&auml;r.</strong><br />\r\nDet finns flera program som l&auml;ser upp skriven text p&aring; svenska eller engelska och m&aring;nga andra spr&aring;k. De &auml;r n&auml;stan full&auml;ndade man kan n&auml;stan inte h&ouml;ra att det &auml;r en &quot;robot&quot; som l&auml;ser. Det finns ocks&aring; program som &ouml;vers&auml;tter text fr&aring;n svenska till andra spr&aring;k, de &auml;r dock &auml;nnu inte full&auml;ndande, men vi hoppas att de n&aring;got &aring;r kan vara n&auml;st in till perfekta.</p>\r\n\r\n<p><strong>Hur du s&ouml;ker i Global Grant,&nbsp; bildsk&auml;rmsvideo med flera talade spr&aring;k f&ouml;r anv&auml;ndare och webbinarier f&ouml;r bibliotekspersonal</strong><br />\r\nVi kommer g&ouml;ra manualer p&aring; flera talade spr&aring;k med bildsk&auml;rmsvideo, som visar hur du s&ouml;ker i Global Grant. Dessa kommer du kunna ladda ned eller str&ouml;mma fr&aring;n v&aring;r website, Google eller Youtube. Vi vill ocks&aring; producera interaktiva webinarier f&ouml;r&nbsp; bibliotekspersonal.</p>\r\n\r\n<h3><strong>DIN MEDLEMSSIDA</strong></h3>\r\n\r\n<p>P&aring; din medlemssida s&aring; kan du beskriva dig sj&auml;lv. Ber&auml;tta vem du &auml;r och &auml;ndam&aring;let med det du vill g&ouml;ra. Fonderna vill veta mer om din person och karakt&auml;r &auml;n om din utbildningsbeskriving. Ta b&aring;de med det som &auml;r positivt och s&aring;nt som handikappar dig. Beskriv din karakt&auml;r, ber&auml;tta om dig sj&auml;lv och din historia och dina framtidsplaner, g&ouml;r det s&aring; personligt du kan. L&auml;nka till intyg, betyg och andra handlingar som styrker de fakta som du uppger i ditt ans&ouml;kningsbrev. Ladda &auml;ven upp foton, ja till och med video, om du verkligen vill g&ouml;ra intryck, en bild s&auml;ger mer &auml;n 1000 ord och g&ouml;r ans&ouml;kan verkligen personlig.</p>\r\n\r\n<p>Skriv ut ans&ouml;kan och<em>&nbsp;kom ih&aring;g att skriva under den,</em>&nbsp;bifoga kopior p&aring; alla dokument som styrker din ans&ouml;kan, och skicka sedan allt till respektive fond som du vill ans&ouml;ka. Posta allt i god tid f&ouml;re sista ans&ouml;kningsdagen.</p>\r\n\r\n<p>Ans&ouml;k inte via e-post om inte fonden vill det.</p>\r\n\r\n<p><strong>S&Ouml;KA PENGAR TILL FONDER OCH ORGANISATIONER</strong></p>\r\n\r\n<p>Read the five points below. The word T-R-U-S-T translated to Latin is CREDERE&nbsp; &#39;to believe or trust&#39;, a&nbsp; modern word for credere is&nbsp;<em>credit&nbsp;</em>:)</p>\r\n\r\n<h2>T - TELL A STORY&nbsp;</h2>\r\n\r\n<p>Everyone likes a good yarn, not least trustees. Tug on those heartstrings and make the message you are trying to get across more personal. Case studies are vital in trust fundraising so keep a constantly updated supply to hand, with quotes if possible. Look at the rhythm of your proposal &ndash; does it come together well and flow as an entire document, or is it a bit disjointed? It should be easy to read, just like a story, with a beginning, middle and end. However, do make sure that there are some hard facts along with the emotional side of things (see the section on Specifics below).</p>\r\n\r\n<p>A picture says more than 1000 words, a video more than one million words. Watch this video, &quot;The Gift&quot;&nbsp;<a href=\"https://www.globalgrant.com/contact-us\" target=\"_blank\">https://www.globalgrant.com/contact-us</a>&nbsp;It is at the top right of the page. Enlarge the image, turn up the sound and be &quot;emotionally moved&quot;. If you have a slow connection download the video first. The opening phrase of the video captures everyone&#39;s attention in a second ... &quot;I never liked my father ...&quot; 7 minutes long.</p>\r\n\r\n<p>Emotions makes even trustees move, make an application that moves people.</p>\r\n\r\n<h2>R- RESEARCH AND RELATIONSHIPS</h2>\r\n\r\n<p>Always do your research. An enormous number of worthy bids end up in the trustees&rsquo; bins because the applicant has not done their research properly. Read the guidelines or giving criteria closely and do not apply to trusts that will not fund your particular type of project. Build relationships where possible with the administrators and trustees. If any of your major donors or Board members know the trustees, make contact and develop their interest in your organisation and project. Remember, relationships are not a short-term undertaking and take careful planning and cultivation.</p>\r\n\r\n<h2>U - USP</h2>\r\n\r\n<p>What is your organisation&rsquo;s (or project&rsquo;s) Unique Selling Point? Are you the only one to do what you do in your local area/region/country? Do you do something differently to others? Can you offer better or wider-reaching services? What will be the consequences of not receiving a grant? Learn to really sell your organisation and its work.</p>\r\n\r\n<h2>S - SPECIFICS</h2>\r\n\r\n<p>Trustees do not appreciate vague applications. Be specific with facts and figures when writing about why your project needs their money, and be specific again about exactly how much money you are asking for. Finally, be specific when you are telling them what you will do with their money, how many people/animals etc will benefit, what the intended aims and outcomes of your project are, and in what timescale.</p>\r\n\r\n<h2>T - TIMING</h2>\r\n\r\n<p>Linked in with undertaking proper research, find out wherever possible when the trustees&rsquo; next meeting is and when the cut off date is for you to send in your bid. Ensure you leave yourself plenty of time to write the bid, obtain any signatures or referees&rsquo; details required, and allow time for others to critique your bid and make amendments. Also under the heading Timing, thank any trust that gives you a grant immediately and do not forget to diarise the date by which you need to submit a grant report, allowing plenty of time for you to collate the relevant information from all parties.</p>', 1, NULL, '2019-09-17 08:36:09'),
(39, 25, 1, '<h3>YOU CAN APPLY FOR MORE MONEY</h3>\r\n\r\n<ul>\r\n	<li>Studies, education and teaching at all levels</li>\r\n	<li>Helping needy, single poor parents</li>\r\n	<li>Sick and disabled - care, rehabilitation and recreation</li>\r\n	<li>Research and Development</li>\r\n	<li>Culture, art and music</li>\r\n	<li>Promoting activities for children and youth, fighting racism and violence&nbsp;</li>\r\n	<li>Environmental work and technological development</li>\r\n	<li>All other possible nonprofit projects aimed at people</li>\r\n</ul>\r\n\r\n<p>100,000&#39;s of individuals and projects worldwide receive dividends each year.&nbsp;It doesn&#39;t matter so much in which country you live for what you want to study or do if you have the right idea and know how to execute a project successfully, there is almost always some fund that can help you.&nbsp;You can get help in realizing your dreams or getting support for your needs.</p>\r\n\r\n<h3>SOME FACTS ABOUT GLOBAL GRANT</h3>\r\n\r\n<ul>\r\n	<li>We have around 24,000 registered funds and donors from all over the world</li>\r\n	<li>About 70,000 registered active members and 130,000 passive members, e.g.&nbsp;students, the sick, the poor, the early retirement, the single unemployed parents.&nbsp;Also researchers, organizations, associations and schools.&nbsp;For example, patient associations, cultural associations, immigrant associations, aid organizations, elementary schools and preschools.</li>\r\n	<li>More than 300 major subscribers, most libraries and colleges, where you can use Global Grant for free.</li>\r\n	<li>We have been helping people and nonprofits for 23 years.&nbsp;We do not work with corporate financing.&nbsp;There are lots of actors helping these;&nbsp;banks, stock exchange, equity funds, investors, authorities, organizations, financial services, business angels, etc.&nbsp;We only work with non-business enterprises and individuals and we are unique in this sector because we work not only with donors and performers from one country but from all over the world.</li>\r\n</ul>\r\n\r\n<p>It is only because of the members and libraries that we exist.&nbsp;Our customers include&nbsp;Uppsala University, Karolinska Institutet, Sk&aring;nev&aring;rd, Lund, Stockholm and Gothenburg universities, Public libraries in all major counties and all residential cities, most public libraries in smaller towns in Sweden, well-known aid organizations and last but not least, all individuals who pay for their own subscription.&nbsp;It&#39;s easier, more convenient and faster to use your own subscription plus your money helps those who can&#39;t pay.&nbsp;</p>\r\n\r\n<h2>IF REWARDING, VOLUNTEER AND EARN A LIVING BY HELPING THOSE WHO CAN PAY FOR THEMSELVES</h2>\r\n\r\n<p>Being rich is not about how much you own, but how much you give.&nbsp;Giving makes you happier.&nbsp;Watch this &quot;empowering&quot; 7-minute video &quot;&nbsp;<a href=\"https://mail.google.com/www.globalgrant.com/contact-us\">The Gift&quot;.&nbsp;Click on the video in the upper right, enlarge the image and turn up the sound.&nbsp;</a>&quot;</p>\r\n\r\n<p>If you want to volunteer and help the poor anonymously or in person, you can stand in one of the Salvation Army soup kitchens, but there are also many other ways to help.&nbsp;And we can help you provide effective help that makes a difference, which makes the world a better place, without having to stand in a soup kitchen.&nbsp;We and our users gratefully receive your help both as a volunteer or for payment for those who can pay.</p>\r\n\r\n<h3>OUR USERS NEED ALL KINDS OF HELP IN WIDELY DIFFERENT AREAS</h3>\r\n\r\n<p>- You can help write applications for those who are visually impaired, have dyslexia, or cannot write, who lack language, who are confused or exhausted by illness and life.&nbsp;You can do this anonymously or in person, as you wish.<br />\r\n<br />\r\n- You can help talents and organizations in all possible areas that have money or &quot;rich&quot; parents, but no skills or time to write applications.&nbsp;You do this against payment that you and the client agree on.&nbsp;Feel free to use Freelancer.com for your safety.&nbsp;We are not involved but we only communicate the contacts.<br />\r\n<br />\r\n- We are a marketplace where donors and service providers can donate money, tools, toys, materials, transportation, or sell / donate their time, their work, their cometens, their service, you can be a facilitator, legitimator or door opener for people who need some startup help.<br />\r\n<br />\r\n- At Global Grant you will find those who want your services.&nbsp;Similarly, those who want money and help for their needs or for their project can find the help they need.&nbsp;In 1993, Global Grant received SEK 200,000 in donations from funds for a few days of effective work for two organizations and received 15% commission.<br />\r\n<br />\r\n- Anyone who has plenty of knowledge and money is often short of time.&nbsp;Those who are materially poor are often rich in time.&nbsp;You can be both donor and performer at the same time.&nbsp;Those who are rich in time have plenty of time to listen, encourage and give good advice.</p>\r\n\r\n<h3>WE ALSO NEED HELP TO GET BETTER, APPEAR BETTER AND BE ABLE TO HELP MORE PEOPLE IN DIFFERENT WAYS</h3>\r\n\r\n<p>- Design posters and brochures (with your copyright written, a good credit when applying for scholarships, whether you want to become a designer, layoutist or art director).</p>\r\n\r\n<p>- Put up posters at your school, the university and around your city in public places where students, the poor, the disabled and the sick often stay.&nbsp;Ask first if you can put up a poster or hand out brochures.</p>\r\n\r\n<p>- Find out if your library, school or university has Global Grant and that everything works on their computers and Hotspots.&nbsp;Say you are posted by Global Grant and want to help people find the right thing in the scholarship jungle.&nbsp;Ask if everything works and ask to test their computers if they don&#39;t know.&nbsp;Browse to&nbsp;&nbsp;<a href=\"https://www.globalgrant.com/search\">https://www.globalgrant.com/search</a>&nbsp;&nbsp;and you will automatically get a list of&nbsp;&nbsp;<em>named funds</em>&nbsp;, then it works, the names are missing it does not work.</p>\r\n\r\n<p>- Make sure the libraries, schools and universities have the right links to Global Grant on their website, the right links can be found here&nbsp;<a href=\"https://www.globalgrant.com/for-librarians\">https://www.globalgrant.com/for-librarians</a></p>\r\n\r\n<p>- If your library, school or university does not subscribe to Global Grant ask them to do so, post a message in their suggestion box on new purchases that usually exist on their website or even better talk to someone about their information.</p>\r\n\r\n<p>- Updating of funds, make sure that our contact details, e-mail, website and terms match the fund&#39;s website.<br />\r\n- You who study or work in IT are needed for bug fixing, application development, systemization, troubleshooting and security testing.<br />\r\n- Development of new functions such as;&nbsp;administration of applications, digitally ranked, secured and identified, based on&nbsp;&nbsp;<em>BankID.</em><br />\r\n- Mobile apps for iOS, Android and Windows</p>\r\n\r\n<p>-&nbsp;<em>Crowd funding</em>&nbsp;, ie individuals, organizations and companies can easily give SEK 10 - SEK 100 - SEK 1,000, USD or Euro to persons or&nbsp;&nbsp;<em>non-profit&nbsp;</em>&nbsp;projects described on Global Grant.&nbsp;Without heavy application administration.<br />\r\n- A super-simple project description system for total beginners.&nbsp;It will suffice with a simple camera mobile to present yourself or his project.</p>\r\n\r\n<p>- Together we can build&nbsp;&nbsp;<em>Global Aid,&nbsp;</em>&nbsp;a new name that says more about what we want to do together.&nbsp;Work for donors &amp; performers (doers &amp; receivers) around the world to meet in a smooth, quick and easy way.</p>\r\n\r\n<p><em>Are you interested in participating and making a profit?&nbsp;</em>Contact me.&nbsp;Contact details can be found here&nbsp;&nbsp;<a href=\"https://www.globalgrant.com/contact-us\">https://www.globalgrant.com/contact-us</a></p>\r\n\r\n<h3>WHO BENEFITS FROM GLOBAL GRANT</h3>\r\n\r\n<p>Our users are mainly marginalized individuals and families, as well as organizations and associations that support these groups.&nbsp;That is, children, youth and the elderly living in poverty or with illness / disability, financially or socially vulnerable, abused, refugees, former addicts, unemployed, all those who end up between the chairs in welfare, poor pensioners are a large group, and&nbsp;&nbsp;<em>last but not least all talents in culture, sports, music, performing and visual arts, successful students and staff in school, care and care who want further education.&nbsp;</em></p>\r\n\r\n<h3>YOUR PERSONAL INFORMATION IS WELL PROTECTED</h3>\r\n\r\n<p>We never share any personal information about our users with anyone outside.&nbsp;Even those who work with us, with us or for Global Grant will not have access to any personal information if they do not necessarily need it to be able to perform the tasks that users have ordered from us.&nbsp;&quot;On a need to know basis&quot; as&nbsp;<em>&nbsp;</em>stated in the EU directive on the handling of personal information.&nbsp;</p>\r\n\r\n<p>There are about one million web sites registered only in Sweden plus all 100 millions of foreign sites&nbsp;<em>.&nbsp;</em>Of these one million Swedish sites, just over 900 have a responsible publisher, of which Global Grant is one.&nbsp;The responsible publisher cannot deny if he or she has failed in due diligence, neglect or willful failure in his duty to protect your personal information.&nbsp;All your personal information is also well protected with the same technology that the banks use.</p>', 1, NULL, '2019-09-17 08:36:53'),
(40, 25, 2, '<h3>DU KAN S&Ouml;KA PENGAR TILL</h3>\r\n\r\n<ul>\r\n	<li>Studier, utbildning och undervisning p&aring; alla niv&aring;er</li>\r\n	<li>Hj&auml;lp till beh&ouml;vande, ensamst&aring;ende fattiga f&ouml;r&auml;ldrar</li>\r\n	<li>Sjuka och handikappade - v&aring;rd, rehabilitering och rekreation</li>\r\n	<li>Forskning och utveckling</li>\r\n	<li>Kultur, konst och musik</li>\r\n	<li>Fr&auml;mja verksamhet f&ouml;r barn och ungdom, bek&auml;mpa rasism och v&aring;ld&nbsp;</li>\r\n	<li>Milj&ouml;arbete och teknisk utveckling</li>\r\n	<li>Alla andra t&auml;nkbara ideella projekt som riktar sig till m&auml;nniskor</li>\r\n</ul>\r\n\r\n<p>100,000 tals individer och projekt v&auml;rlden &ouml;ver f&aring;r utdelning varje &aring;r. Det spelar inte s&aring; stor roll&nbsp; i vilket land du lever f&ouml;r att det du vill studera eller g&ouml;ra om du har r&auml;tt id&eacute; och vet hur man genomf&ouml;r ett projekt framg&aring;ngsrikt s&aring; finns det n&auml;stan alltid n&aring;gon fond som kan hj&auml;lpa dig. Du kan f&aring; hj&auml;lp med att f&ouml;rverkliga dina dr&ouml;mmar eller f&aring; st&ouml;d f&ouml;r dina behov.</p>\r\n\r\n<h3>N&Aring;GRA FAKTA OM GLOBAL GRANT</h3>\r\n\r\n<ul>\r\n	<li>Vi har cirka 24 000 registrerade fonder och donatorer fr&aring;n hela v&auml;rlden</li>\r\n	<li>Cirka 70 000 registrerade aktiva medlemmar och 130 000 passiva medlemmar, t.ex. studenter, sjuka, fattiga, f&ouml;rtidspension&auml;rer, ensamst&aring;ende arbetsl&ouml;sa f&ouml;r&auml;ldrar. &Auml;ven forskare, organisationer, f&ouml;reningar och skolor. Exempelvis patientf&ouml;reningar, kulturf&ouml;reningar, invandrarf&ouml;reningar, hj&auml;lporganisationer, grundskolor och f&ouml;rskolor.</li>\r\n	<li>Drygt 300 storabonnenter, mest bibliotek och h&ouml;gskolor, d&auml;r du kan anv&auml;nda Global Grant gratis.</li>\r\n	<li>Vi har hj&auml;lpt personer och ideella f&ouml;reningar i 23 &aring;r. Vi arbetar inte med f&ouml;retagsfinasiering. Det finns massor av akt&ouml;rer som hj&auml;lper dessa; banker, aktieb&ouml;rsen, aktiefonder, investerare, myndigheter, organisationer, finansservice, aff&auml;rs&auml;nglar osv. Vi arbetar bara med icke aff&auml;rsdrivande verksamheter och individer och vi &auml;r unika inom denna sektor f&ouml;r att vi arbetar inte bara med givare och utf&ouml;rare fr&aring;n ett land utan fr&aring;n hela v&auml;rlden.</li>\r\n</ul>\r\n\r\n<p>Det &auml;r enbart p&aring; grund av medlemmar och biblioteken som vi finns. Bland v&aring;ra kunder finns bl.a. Uppsala universitet, Karolinska Institutet, Sk&aring;nev&aring;rd, Lunds, Stockholms och G&ouml;teborgs universitet, Folkbiblioteken i alla stora l&auml;n och alla residensst&auml;der, de flesta folkbiblioteken p&aring; mindre orter i Sverige,&nbsp; v&auml;lk&auml;nda hj&auml;lporganisationer och sist men inte minst alla enskilda personer som betalar f&ouml;r ett eget abonnemang. Det &auml;r enklare, bekv&auml;mare och snabbare att anv&auml;nda ett eget abonnemang plus att dina pengar hj&auml;lper de som inte kan betala.&nbsp;</p>\r\n\r\n<h2>OM GIVANDE, BLI VOLONT&Auml;R OCH TJ&Auml;NA EN SLANT P&Aring; ATT HJ&Auml;LPA DE SOM KAN BETALA F&Ouml;R SIG</h2>\r\n\r\n<p>Att vara rik handlar inte om hur mycket du &auml;ger, utan hur mycket du ger. Att ge g&ouml;r Dig lyckligare. Se denna &quot;empowering&quot; 7-minuters video&nbsp;&nbsp;&quot;<a href=\"https://mail.google.com/www.globalgrant.com/contact-us\">The Gift&quot;. Klicka p&aring; videon uppe till h&ouml;ger, f&ouml;rstora bilden och skruva upp ljudet.</a>&quot;</p>\r\n\r\n<p>Om du vill bli volont&auml;r och hj&auml;lpa de fattiga anonymt eller personligen s&aring; kan du st&aring; i ett av fr&auml;lsningsarm&eacute;ns soppk&ouml;k, men det finns ocks&aring; m&aring;nga andra s&auml;tt att hj&auml;lpa. Och vi kan hj&auml;lpa dig att ge effektiv hj&auml;lp som g&ouml;r skillnad, som g&ouml;r v&auml;rlden till en b&auml;ttre plats, utan att du beh&ouml;ver st&aring; i ett soppk&ouml;k. Vi och v&aring;ra anv&auml;ndare tar tacksamt emot din hj&auml;lp b&aring;de som volont&auml;r eller mot betalning f&ouml;r de som kan betala.</p>\r\n\r\n<h3>V&Aring;RA ANV&Auml;NDARE BEH&Ouml;VER ALLA M&Ouml;JLIGA TYPER AV HJ&Auml;LP INOM VITT SKILDA OMR&Aring;DEN</h3>\r\n\r\n<p>- Du kan hj&auml;lpa till skriva ans&ouml;kningar f&ouml;r dem som &auml;r synskadade, har dyslexi, eller inte kan skriva, som saknar spr&aring;k, som &auml;r f&ouml;rvirrade eller utmattade av sjukdom och livet. Detta kan du g&ouml;ra anonymt eller personligen, som du sj&auml;lv &ouml;nskar.<br />\r\n<br />\r\n- Du kan hj&auml;lpa talanger och organisationer inom alla m&ouml;jliga omr&aring;den som har pengar eller &quot;rika&quot; f&ouml;r&auml;ldrar, men ingen kompetens eller tid att skriva ans&ouml;kningar. Detta g&ouml;r du mot betalning som du och uppdragsgivaren kommer &ouml;verens om. Anv&auml;nd g&auml;rna Freelancer.com f&ouml;r s&auml;kerhets skull. Vi &auml;r inte inblandade utan vi f&ouml;rmedlar bara kontakterna.<br />\r\n<br />\r\n- Vi &auml;r en marknadsplats d&auml;r givare och tj&auml;nsteut&ouml;vare kan donera pengar, verktyg, leksaker, material, transporter, eller s&auml;lja/donera sin tid, sitt arbete, sin komtetens, sin service, du kan vara en m&ouml;jligg&ouml;rare, legitimerare eller d&ouml;rr&ouml;ppnare f&ouml;r m&auml;nnsikor som beh&ouml;ver lite starthj&auml;lp.<br />\r\n<br />\r\n- P&aring; Global Grant kommer du att finna de som &ouml;nskar dina tj&auml;nster. Motsvarande kan de som &ouml;nskar pengar och hj&auml;lp f&ouml;r sina behov eller f&ouml;r sitt projekt finna den hj&auml;lp de beh&ouml;ver. Global Grant fick 1993 ihop 200,000 kr i donationer fr&aring;n fonder p&aring; n&aring;gra dagars effektivt arbete f&ouml;r tv&aring; organisationer och fick 15% i kommision.<br />\r\n<br />\r\n- Den som har gott om kunskap och pengar har ofta ont om tid. Den som &auml;r materiellt fattig &auml;r ofta rik p&aring; tid. Man kan vara b&aring;de givare och utf&ouml;rare samtidigt.&nbsp; Den som &auml;r rik p&aring; tid har gott om tid f&ouml;r att lyssna, uppmuntra och ge goda r&aring;d.</p>\r\n\r\n<h3>VI BEH&Ouml;VER OCKS&Aring; HJ&Auml;LP F&Ouml;R ATT BLI B&Auml;TTRE, SYNAS B&Auml;TTRE OCH KUNNA HJ&Auml;LPA FLER P&Aring; OLIKA S&Auml;TT</h3>\r\n\r\n<p>- Designa affischer och broschyrer (med din copyright p&aring;skriven, en god merit n&auml;r du s&ouml;ker stipendier, om du vill bli designer, layoutare eller art director).</p>\r\n\r\n<p>- S&auml;tta upp affischer p&aring; din skola, p&aring; universitetet och runt om i din stad p&aring; allm&auml;nna platser d&auml;r studerande, fattiga, funktionshindrade och sjuka ofta vistas. Fr&aring;ga f&ouml;rst om du f&aring;r s&auml;tta upp en affisch eller l&auml;mna broschyrer.</p>\r\n\r\n<p>- Ta reda p&aring; om ditt bibliotek, skola eller universitet har Global Grant och att allt fungerar p&aring; deras datorer och Hotspots. S&auml;g att du &auml;r uts&auml;nd av Global Grant och vill hj&auml;lpa m&auml;nniskor hitta r&auml;tt i stipendiedjungeln. Fr&aring;ga om allt fungerar och be att f&aring; testa deras datorer om de inte vet. Surfa till&nbsp;<a href=\"https://www.globalgrant.com/search\">https://www.globalgrant.com/search</a>&nbsp;s&aring; f&aring;r du automatiskt upp en lista med&nbsp;<em>namngivna fonder</em>, d&aring; fungerar det, saknas namnen fungerar det inte.</p>\r\n\r\n<p>- Kontrollera att biblioteken, skolorna och universiteten har r&auml;tt l&auml;nkar till Global Grant p&aring; sin webbsajt, r&auml;tt l&auml;nkar finns h&auml;r&nbsp;<a href=\"https://www.globalgrant.com/for-librarians\">https://www.globalgrant.com/for-librarians</a></p>\r\n\r\n<p>- Om ditt bibliotek, skola eller universitet inte abonnerar p&aring; Global Grant be dem g&ouml;ra det, posta ett meddelande i deras f&ouml;rslagsl&aring;da p&aring; nyink&ouml;p som brukar finnas p&aring; deras webbsajt eller &auml;nnu b&auml;ttre tala med n&aring;gon p&aring; deras information.</p>\r\n\r\n<p>- Uppdatering av fonder, kontrollera att v&aring;ra kontaktuppgifter, e-mail, webbsida och villkor st&auml;mmer med fondens hemsida.<br />\r\n- Du som studerar eller arbetar inom I.T. &nbsp;beh&ouml;vs f&ouml;r bug fixing, applikationsutveckling, systemering, fels&ouml;kning och s&auml;kerhetstestning.<br />\r\n- Utveckling av nya funktioner som; administration av ans&ouml;kningar, digitalt rangordnade, s&auml;krade och&nbsp;identifierade,&nbsp;baserat p&aring;&nbsp;<em>BankID.</em><br />\r\n- Mobila apps f&ouml;r IOS, Android och Windows</p>\r\n\r\n<p>-&nbsp;<em>Crowd funding</em>, dvs enskilda personer, organisationer och f&ouml;retag kan enkelt ge 10 kr - 100 kr - 1 000 kr, dollar eller Euro till personer eller&nbsp;<em>ideella&nbsp;</em>projekt som finns beskrivna p&aring; Global Grant. Utan tung ans&ouml;kningsadministration.<br />\r\n- Ett superenkelt system f&ouml;r projektbeskrivning f&ouml;r totala nyb&ouml;rjare. Det ska r&auml;cka med en enkel kameramobil f&ouml;r att presentera sig sj&auml;lv eller sitt projekt.</p>\r\n\r\n<p>- Tillsammans kan vi bygga&nbsp;<em>Global Aid,&nbsp;</em>ett nytt namn som mer s&auml;ger vad vi vill g&ouml;ra tillsammans. Verka f&ouml;r att givare &amp; utf&ouml;rare (doers &amp; receivers) runt hela v&auml;rlden kan m&ouml;tas p&aring; ett smidig, snabbt och enkelt s&auml;tt.</p>\r\n\r\n<p><em>&Auml;r du intresserad att vara med och g&ouml;ra nytta?&nbsp;</em>Kontakta mig. Kontaktdetaljer finns h&auml;r&nbsp;<a href=\"https://www.globalgrant.com/contact-us\">https://www.globalgrant.com/contact-us</a></p>\r\n\r\n<h3>VEM HAR NYTTA AV GLOBAL GRANT</h3>\r\n\r\n<p>V&aring;ra anv&auml;ndare &auml;r fr&auml;mst marginaliserade enskilda personer och familjer, samt organisationer och f&ouml;reningar som st&ouml;ttar dessa grupper. Dvs barn, ungdom och &auml;ldre som lever i fattigdom eller med sjukdom/funktionshinder, ekonomiskt eller socialt&nbsp;utsatta, misshandlade, flyktingar, f.d. missbrukare, arbetsl&ouml;sa, alla de som hamnat mellan stolarna i v&auml;lf&auml;rden, fattigpension&auml;rer &auml;r en stor grupp, och&nbsp;<em>sist men inte minst alla talanger inom kultur, idrott, musik, performing och visual arts, framg&aring;ngsrika studenter och personal inom skola, v&aring;rd och omsorg som &ouml;nskar vidareutbildning.&nbsp;</em></p>\r\n\r\n<h3>DIN PERSONLIGA INFORMATION &Auml;R V&Auml;L SKYDDAD</h3>\r\n\r\n<p>Vi delger aldrig n&aring;gon personlig information om v&aring;ra anv&auml;ndare till n&aring;gon utomst&aring;ende. Inte ens till dem som arbetar hos oss, med oss eller f&ouml;r Global Grant f&aring;r tillg&aring;ng till n&aring;gon personlig information om de inte oundg&auml;ngligen beh&ouml;ver den f&ouml;r att kunna utf&ouml;ra de arbetsuppgifter som anv&auml;ndarna best&auml;llt av oss. &quot;On a need to know basis&quot; som det&nbsp;<em>&nbsp;</em>st&aring;r i EU-direktivet om hanteringen av personlig information.&nbsp;</p>\r\n\r\n<p>Det finns ca en miljon webbsajter registrerade bara i Sverige plus alla 100-tals miljoner utl&auml;ndska sajter<em>.&nbsp;</em>Av dessa en miljon svenska sajter har bara drygt 900 en ansvarig utgivare, varav Global Grant &auml;r en. Den som &auml;r ansvarig utgivare kan inte skylla ifr&aring;n sig om han eller hon brustit i aktsamhet, slarvat eller med vilja brustit i sin plikt att skydda din personliga information. All din personliga information &auml;r dessutom v&auml;l skyddad med samma teknik som bankerna anv&auml;nder.</p>', 1, NULL, '2019-09-17 08:36:53'),
(41, 26, 1, '<h1>PRODUCTS AND PRICES</h1>\r\n\r\n<p><strong>1. Use your public library&#39;s or university&#39;s free subscription</strong><br />\r\nUse Global Grant fast and easy and absolutely free of charge by going to the library, university or college. Sit down at a computer and surf to our&nbsp;<a href=\"https://www.globalgrant.com/search\">search page</a>.&nbsp;You will be connected to Global Grant without need for a log-in and can seek funds completely anonymous - unless the library requires a library card or student ID for you to be allowed to use their computers. Login also applies to the library computer network if you use your own laptop/smartphone to connect to Global Grant, or use the library&#39;s WiFi, hot spots or mobile data (4G).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>2. You can connetct to Global Grant through remote access from home or from any computer, tablet or smartphone anywhere in the world</strong><br />\r\nTo&nbsp;<a href=\"https://www.globalgrant.com/remote\">Access remotely</a>&nbsp;to Global Grant use any of these two methods;</p>\r\n\r\n<p><strong>A.</strong>&nbsp;Surf from home or where you are to your library&#39;s website. Find the page where they list their public databases. On the page there is a link for remote access to Global Grant. If not report the missing link to the library and to us and we will assist you and the library to update their pages. This is the easiest way for remote login, but it has its limitations. You can not save the fund records you have selected to your member page, because there is no link between the library&#39;s subscription, and your member page. If you want all features for free please follow the instructions under B.</p>\r\n\r\n<p><strong>B.</strong>&nbsp;First register as a member on the Global Grant, or if you&#39;ve alreadyare a member, log in to your member page. Membership is always free - forever. On your member page, select your library in the list of libraries that use Global Grant&#39;s remote access. Follow the instructions how to connect your member page to your library&#39;s subscription, for free. If you belong to a larger library or any of the universities/colleges they may not be included in our list. Then do as under A, or purchase a separate subscription from 79 kr/month if you want all the functions.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>3. Get your own subscription</strong></p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>A. L&ouml;pande m&aring;nadsabonnemang f&ouml;r studerande, ensamst&aring;ende f&ouml;r&auml;ldrer eller sjuk/funktionshindrad</strong><br />\r\n			M&aring;nadsabonnemang f&ouml;r dig som tillh&ouml;r n&aring;gon av f&ouml;ljande kategorier; studerande, ensamst&aring;ende f&ouml;r&auml;lder, sjuk/funktionshindrad.<strong>&nbsp;</strong>Abonnemang som betalas via kreditkort eller Paypal<strong><em>&nbsp;f&ouml;rnyas automatiskt varje m&aring;nad</em></strong>&nbsp;- om du inte s&auml;ger upp det. Betalar du via Internetbank eller Plusgiro s&aring; g&ouml;rs ingen automatisk f&ouml;rnyelse.</p>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n			<td>\r\n			<p><a href=\"https://www.globalgrant.com/en/login\">ORDER</a></p>\r\n\r\n			<p>&nbsp;&nbsp;&nbsp;75 kr/month</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p><strong>B. L&ouml;pande m&aring;nadsabonnemang f&ouml;r alla andra</strong><br />\r\n			L&ouml;pande m&aring;nadsabonnemang f&ouml;r alla som INTE tillh&ouml;r kategorierna; studerande, ensamst&aring;ende f&ouml;r&auml;lder, sjuk/funktionshindrad. Abonnemang som betalas via kreditkort eller Paypal<strong><em>&nbsp;f&ouml;rnyas automatiskt varje m&aring;nad</em></strong>&nbsp;- om du inte s&auml;ger upp det. Betalar du via Internetbank eller Plusgiro s&aring; g&ouml;rs ingen automatisk f&ouml;rnyelse.</p>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n			<td>\r\n			<p><a href=\"https://www.globalgrant.com/en/login\">ORDER</a></p>\r\n\r\n			<p>&nbsp;&nbsp;295&nbsp;kr/month</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p><strong>C. &Aring;rsabonnemang Global Grant</strong><br />\r\n			Beg&auml;r offert. Pris fr&aring;n 2 600 kr/&aring;r plus moms. &Aring;rsabonnemang faktureras efter sedvanlig kreditpr&ouml;vning. &Aring;rsabonnemanget f&ouml;rnyas automatisk efter &aring;rsf&ouml;rfallodagen om det inte sagts upp f&ouml;re.</p>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>6. STORA FONDBOKEN 2019 UTE NU -&nbsp;<a href=\"https://www.globalgrant.com/stora-fondboken-bidrag-stipendier\">DE 1000 B&Auml;STA BIDRAGEN</a>&nbsp;SWEDISH TEXT</h3>', 1, NULL, '2019-09-17 08:40:09'),
(55, 32, 1, NULL, 1, NULL, NULL),
(56, 32, 2, NULL, 1, NULL, NULL),
(42, 26, 2, '<p><strong>*Best&auml;llningen blir inte bindande f&ouml;rr&auml;n du betalat &nbsp;</strong></p>\r\n\r\n<p><strong>Sjuka, funktionshindrade &amp; ekonomiskt beh&ouml;vande 245 kr<br />\r\n<a href=\"https://form.jotform.co/90714038163857\" target=\"_blank\">Best&auml;ll bidragslista*</a></strong></p>\r\n\r\n<p>Studerande 295 kr<br />\r\nUtlandsstuderande 395 kr<br />\r\n<a href=\"https://form.jotformeu.com/90732473186360\" target=\"_blank\">Best&auml;ll stipendielista*</a></p>\r\n\r\n<p>Doktorandstudier<br />\r\n<a href=\"https://form.jotformeu.com/90745222958363\">Best&auml;ll lista fr&aring;n 795 kr*</a></p>\r\n\r\n<p>Sm&aring; projekt &amp;&nbsp;kreativ verksamhet<br />\r\n<a href=\"https://form.jotformeu.com/90744788358373\">Best&auml;ll lista fr&aring;n 795 kr</a><a href=\"https://form.jotformeu.com/90732473186360\" target=\"_blank\">*</a></p>\r\n\r\n<p>F&ouml;reningar, organisationer &amp; skolor<br />\r\n<a href=\"https://form.jotformeu.com/90744827943367\">Best&auml;ll f&ouml;rteckning fr. 1975 kr*</a></p>\r\n\r\n<p>V&auml;nligen betala till St&ouml;d &amp; Stipendier AB med n&aring;got av alternativen</p>\r\n\r\n<p>&bull; Bankgiro 226-2384<br />\r\n&bull;&nbsp;Plusgiro 603 83 29-6<br />\r\n&bull;&nbsp;Swish 123 351 0583</p>\r\n\r\n<p>Ange din e-mejladress eller mobilnummer i meddelandef&auml;ltet (OCR-nummer). 5-10 dagar efter vi mottagit din betalning &auml;r din lista klar och du f&aring;r leverans p&aring; e-post &Ouml;nskar du utskrift p&aring; papper och leverans hem i brevl&aring;dan tillkommer 99 kr. Efter du betalt blir best&auml;llningen bindande, se&nbsp;<a href=\"https://www.globalgrant.com/payments\" target=\"_blank\">villkor</a>.<br />\r\n&Ouml;nskar du hemlevernas i brevl&aring;dan l&auml;gg till 99 kr</p>\r\n\r\n<h3>2. S&Ouml;K SJ&Auml;LV MED ETT EGET ABONNEMANG</h3>\r\n\r\n<p>M&aring;nadsabonnemang f&ouml;r dig som tillh&ouml;r n&aring;gon av f&ouml;ljande kategorier;&nbsp;<em>studerande, ensamst&aring;ende f&ouml;r&auml;lder, sjuk/funktionshindrad.</em>&nbsp;Det kan dr&ouml;ja 1-2 dagar innan du blir uppgraderad efter din betalning inkommit.</p>\r\n\r\n<p>En m&aring;nad 75 kr<br />\r\nTre m&aring;nader 180 kr<br />\r\nEtt &aring;r 595 kr</p>\r\n\r\n<h3>3. M&Aring;NADSABONNEMANG PRO</h3>\r\n\r\n<p>M&aring;nadsabonnemang f&ouml;r f&ouml;reningar, organisationer, yrkesanv&auml;ndare och alla andra.&nbsp;Efter abonnemangstidens slut f&aring;r sj&auml;lv komma ih&aring;g att betala igen.&nbsp;Ingen automatisk omdebitering.&nbsp;Det kan dr&ouml;ja 1-2 dagar innan du blir uppgraderad efter din betalningen inkommit.</p>\r\n\r\n<p>En m&aring;nad fr&aring;n 150 kr<br />\r\nTre m&aring;nader fr&aring;n 360 kr<br />\r\nEtt &aring;r fr&aring;n 995 kr</p>\r\n\r\n<h3><strong>4. S&Ouml;K P&Aring; BIBLIOTEKET</strong></h3>\r\n\r\n<p>Logga in p&aring;&nbsp;<a href=\"https://www.globalgrant.com/search\">biblioteket</a></p>\r\n\r\n<p>H&auml;r finner du fonder som&nbsp;<em>inte</em>&nbsp;finns p&aring; Google eller n&aring;gon annanstans. Anv&auml;nd Global Grant enklast och snabbast&nbsp;<em>helt gratis</em>&nbsp;genom att g&aring; till ditt bibliotek eller universitet. S&auml;tt dig vid en dator och surfa till v&aring;r&nbsp;<a href=\"https://www.globalgrant.com/search\">s&ouml;ksida</a>.&nbsp; Du kommer direkt in i databasen utan inloggning och kan s&ouml;ka fonder helt anonymt. Om du beh&ouml;ver hj&auml;lp, be en bibliotekarie visa dig.</p>\r\n\r\n<h3><strong>5. S&Ouml;K HEMIFR&Aring;N ELLER VAR DU &Auml;N BEFINNER DIG</strong></h3>\r\n\r\n<p>Logga in&nbsp;<a href=\"https://www.globalgrant.com/remote\" target=\"_blank\">hemifr&aring;n</a><br />\r\nV&auml;lj kommun i listan och skriv in ditt l&aring;nekortsnummer.</p>\r\n\r\n<p>A. Om du inte hittar ditt universitet eller bibliotek i&nbsp;<a href=\"https://www.globalgrant.com/remote\" target=\"_blank\">listan</a>&nbsp;s&aring; Googla enklast p&aring; t ex p&aring; &quot;Globalgrant Malm&ouml;&quot; eller &quot;Globalgrant G&ouml;teborg&quot;. D&aring; f&aring;r du upp en sida med l&auml;nkar, v&auml;lj den l&auml;nk som g&aring;r till ditt bibliotek eller universitet. F&ouml;lj deras instruktioner f&ouml;r inloggning till databaser. Det brukar beh&ouml;vas l&aring;nekortsnummer och PIN-kod eller studentleg f&ouml;r universiteten. Om du beh&ouml;ver hj&auml;lp&nbsp;<a href=\"https://www.globalgrant.com/contact-us\" target=\"_blank\">kontakta oss</a>.</p>\r\n\r\n<p>Ovanst&aring;ende &auml;r det enklaste s&auml;ttet f&ouml;r fj&auml;rrinloggning, men det har sina begr&auml;nsningar. Du kan inte spara de fonder du valt ut till din medlemssida, f&ouml;r det finns ingen koppling mellan bibliotekets abonnemang och din medlemssida. Vill du ha alla funktioner s&aring; g&ouml;r du som under B.</p>\r\n\r\n<p>B.&nbsp;<a href=\"https://www.globalgrant.com/register\">Registrera</a>&nbsp;dig f&ouml;rst som medlem p&aring; Global Grant och logga in till din&nbsp;<a href=\"https://www.globalgrant.com/member\">medlemssida</a>. Medlemskapet &auml;r gratis f&ouml;r alltid.&nbsp;P&aring; din medlemssida v&auml;ljer du ditt bibliotek i listan &ouml;ver bibliotek som anv&auml;nder Global Grants fj&auml;rrinloggning. F&ouml;lj anvisningarna f&ouml;r att koppla din medlemssida till ditt biblioteks abonnemang.</p>\r\n\r\n<h3>6. STORA FONDBOKEN 2019 -&nbsp;DE 1000 B&Auml;STA FONDERNA</h3>\r\n\r\n<p><a href=\"https://www.globalgrant.com/stora-fondboken-bidrag-stipendier\">Stora Fondboken</a>&nbsp;finns normalt att l&aring;na p&aring; ditt bibliotek, skolor och institutioner, om inte s&aring; be att ditt bibliotek k&ouml;per in den. Enklast och billigast &auml;r att k&ouml;pa Stora Fondboken fr&aring;n n&aring;gon av n&auml;tbokhandlarna, vi rekommenderar Adlibris.se som oftast &auml;r billigast men det g&aring;r bra att best&auml;lla boken fr&aring;n&nbsp;vilken n&auml;tbokhandlare eller vanlig bokhandlare som helst.</p>\r\n\r\n<h3>7.&nbsp;<a href=\"http://allastudier.se/utbildningar/\" target=\"_blank\">ALLASTUDIER.SE</a>&nbsp;OCH&nbsp;<a href=\"https://www.studentum.se/\" target=\"_blank\">STUDENTUM.SE</a></h3>\r\n\r\n<p>Dessa tv&aring; sajter utg&ouml;r tillsammans Nordens st&ouml;rsta plattform f&ouml;r utbildningar. H&auml;r kan du s&ouml;ka, hitta och j&auml;mf&ouml;ra utbildningar med varandra. Men ocks&aring; snabb och enkelt f&aring; den information du beh&ouml;ver f&ouml;r att g&ouml;ra ett informerat utbildningsval. (<strong>rekommenderas</strong>)</p>\r\n\r\n<h3>8. STUDERA UTOMLANDS, ATT V&Auml;LJA R&Auml;TT SKOLA OCH FINANSIERING</h3>\r\n\r\n<p><a href=\"https://www.utlandsstudier.se/\" target=\"_blank\">Utlandsstudier.se</a>&nbsp;hj&auml;lper dig som vill studera utomlands helt gratis. H&auml;r kan du s&ouml;ka efter skolor i en stor&nbsp;skoldatabas&nbsp;och st&auml;lla&nbsp;fr&aring;gor om utlandsstudier. Sajten inneh&aring;ller ocks&aring; m&aring;nga guider och artiklar som behandlar &auml;mnen som&nbsp;studiemedel,&nbsp;stipendier,&nbsp;utlandsstudief&ouml;rs&auml;kring&nbsp;och hur man kan&nbsp;studera utomlands gratis.</p>', 1, NULL, '2019-09-17 08:40:09');
INSERT INTO `gg_page_blocks` (`id`, `page_id`, `language_id`, `text`, `status`, `created_at`, `updated_at`) VALUES
(43, 27, 1, '<p>If you use a subscription with IP login, it is possible to directly link users to&nbsp;<strong>Global Grant&#39;s search page</strong>&nbsp;, by adding the following link&nbsp;<a href=\"https://www.globalgrant.com/search\">https://www.globalgrant.com/search</a>&nbsp;on the website where you list the library&#39;s public databases for authorized users.&nbsp;IP login also works by clicking on &quot;SEARCH FUNDS ... HERE&quot; in the menus.&nbsp;To&nbsp;<strong>search from home</strong>&nbsp;, remote access, to Global Grant, add the following link to your public database website&nbsp;<a href=\"https://www.globalgrant.com/remote\">https://www.globalgrant.com/remote</a><strong>&nbsp;&nbsp;</strong></p>\r\n\r\n<p>If you use your own proxy server for checking user permissions, you can also have the above link if your loan card system contains a common identical code at one and the same place in the card number, ie all your loan cards have an embedded identical number at the same positions in the loan card number / student ID.&nbsp;You can register up to 5 different series (5 different codes) on your Admin page.&nbsp;Then you add those who log in remotely via the proxy server and those who log in via our system and who are included on your statistics page.</p>\r\n\r\n<p>We strongly recommend using a proxy server as it provides reliable control of user permissions and user statistics.&nbsp;Our simple remote access system and usage statistics are provided free of charge as it is provided.</p>\r\n\r\n<p>To access the Global Grant&nbsp;Administrator page&nbsp;, log on to&nbsp;<a href=\"https://www.globalgrant.com/login\">https://www.globalgrant.com/login</a>&nbsp;if you are already logged in as &quot;City Library ...&quot; sign out first.&nbsp;On the admin page, you can change passwords, IP numbers, remote access information, your contact information and get statistics for using Global Grant.&nbsp;The old login information should work, if they don&#39;t, you can get a&nbsp;<strong>new password</strong>&nbsp;by clicking on the &quot;New password&quot; link below the field.</p>\r\n\r\n<p>If you need a&nbsp;<strong>new username</strong>&nbsp;(= the e-mail address of the person responsible for the public databases in the library), contact Lars Hellman via e-mail&nbsp;<a href=\"mailto:monica@globalgrant.com\">lars@globalgrant.com</a>&nbsp;or call 08-55925070 Mon-Fri 09.00-12.00</p>\r\n\r\n<p><strong><strong>FAILURES IN USER STATISTICS</strong></strong></p>\r\n\r\n<p>Unfortunately, the user statistics contain several error sources and are not reliable.&nbsp;Do not make any decisions based on the statics found on your Admin page.&nbsp;Several factors related to unregistered or incorrectly registered IP numbers have contributed to the failure of the statistics report.&nbsp;Incorrect outbound links can also contribute to SEO errors and users will not find the page for the public databases in the library.</p>', 1, NULL, '2019-09-17 08:46:04'),
(44, 27, 2, '<p>Om ni anv&auml;nder ett abonnemang med IP-inloggning &auml;r det m&ouml;jligt att direktl&auml;nka anv&auml;ndarna till&nbsp;<strong>Global Grants s&ouml;ksida</strong>, genom att l&auml;gga till f&ouml;ljande l&auml;nk&nbsp;<a href=\"https://www.globalgrant.com/search\">https://www.globalgrant.com/search</a>&nbsp;p&aring; webbsidan d&auml;r ni listar bibliotekets publika databaser f&ouml;r beh&ouml;riga anv&auml;ndare. IP-inloggning fungerar ocks&aring; genom att klicka p&aring; &quot;S&Ouml;K FONDER... H&Auml;R&quot; i menyerna. F&ouml;r att&nbsp;<strong>s&ouml;ka hemifr&aring;n</strong>, remote access, till Global Grant, l&auml;gg till f&ouml;ljande l&auml;nk p&aring; er webbsida f&ouml;r publika databaser&nbsp;<a href=\"https://www.globalgrant.com/remote\">https://www.globalgrant.com/remote</a><strong>&nbsp;&nbsp;</strong></p>\r\n\r\n<p>Om ni anv&auml;nder egen proxyserver f&ouml;r kontroll av anv&auml;ndarbeh&ouml;righet s&aring; kan ni samtidigt ha ovanst&aring;ende l&auml;nk om ert l&aring;nekortssystem inneh&aring;ller en gemensam identisk lika kod p&aring; ett och samma st&auml;lle i kortnumret, dvs alla era l&aring;nekort har ett inb&auml;ddat identiskt nummer p&aring; samma positioner i l&aring;nekortsnumret/studentlegitimationen. Ni kan registrera upp til 5 olika serier (5 olika koder) p&aring; er Adminsida. Sedan adderar ni de som loggar in remote via proxy servern och de som loggar in via v&aring;rt system och som finns med p&aring; er statistiksida.</p>\r\n\r\n<p>Vi rekommenderar varmt att anv&auml;nda proxyserver eftersom den ger tillf&ouml;rlitlig kontroll av anv&auml;ndarbeh&ouml;righet och anv&auml;ndrarstatistik. V&aring;rt enkla remote accesssytem och statistik f&ouml;r anv&auml;ndning tillhandah&aring;lls gratis som det &auml;r beskaffat.</p>\r\n\r\n<p>F&ouml;r att komma till administrat&ouml;rssidan f&ouml;r Global Grant, logga in p&aring;&nbsp;<a href=\"https://www.globalgrant.com/login\">https://www.globalgrant.com/login</a>&nbsp;om du redan &auml;r inloggas som &quot;Stadsbiblioteket ...&quot; logga f&ouml;rst ut. P&aring; administrat&ouml;rssidan kan du &auml;ndra l&ouml;senord, IP-nummer, uppgifter om Remote Access, era kontaktuppgifter och f&aring; statistik f&ouml;r anv&auml;ndningen av Global Grant. De gamla loginuppgifterna ska fungera, om de inte g&ouml;r det s&aring; kan du f&aring; ett&nbsp;<strong>nytt l&ouml;senord</strong>&nbsp;genom att klicka p&aring; l&auml;nken &quot;Nytt l&ouml;senord&quot; under f&auml;ltet.</p>\r\n\r\n<p>Om du beh&ouml;ver ett&nbsp;<strong>nytt anv&auml;ndarnamn</strong>&nbsp;(=e-postadressen till den som &auml;r ansvarig f&ouml;r de publika dtabaserna p&aring; biblioteket), kontakta Lars Hellman via e-post&nbsp;<a href=\"mailto:monica@globalgrant.com\">lars@globalgrant.com</a>&nbsp;eller ring direkt 08-55925070 m&aring;n-fre 09.00-12.00</p>\r\n\r\n<p><strong><strong>FELAKTIGHETER I ANV&Auml;NDARSTATISTIK</strong></strong></p>\r\n\r\n<p>Anv&auml;ndarstatistiken inneh&aring;ller tyv&auml;rr flera felk&auml;llor och &auml;r inte tillf&ouml;rlitlig. Fatta inga beslut baserade p&aring; den statitsik som finns p&aring; er Adminsida. Flera faktorer relaterade till oregistrerade eller inkorrekt registrerade IP-nummer har bidragit till att statistikrapporten felar. Inkorrekta utg&aring;nga l&auml;nkar kan ocks&aring; bidra till fel i SEO och att anv&auml;ndarna inte hittar sidan f&ouml;r de publika databaserna p&aring; biblioteket.</p>', 1, NULL, '2019-09-17 08:46:04'),
(45, 7, 1, '<p>eee</p>', 1, NULL, NULL),
(46, 7, 2, '<p>sss</p>', 1, NULL, NULL),
(47, 28, 1, '<h3><strong>TERMS OF DELIVERY</strong></h3>\r\n\r\n<p>A&nbsp;<strong>login</strong>&nbsp;to the Global Grant is normally delivered within minutes after you paid by credit card. Sometimes, so do credit card companies and Paypal manual controls if you suspect unauthorized use of your card and then the delivery can be delayed one day.</p>\r\n\r\n<p><strong>Private individual&#39;s (regular consumer&#39;s)</strong>&nbsp;purchase of our services and products by&nbsp;telephone and the Internet are regulated by Swedish law. &nbsp;Return and refund policy applies only if the list is not yet manufactured.&nbsp;Given that your custom made&nbsp;list is uniquely made ​​for you according to your wishes, you cannot have a refund for a paid and already made&nbsp;list . This refund policy pertains both to custom made lists and to computer generated lists and Swedish law allows our policy in this case.&nbsp;&quot;Customer do not have the right to cancel due to nature of the service.&quot; If you purchase&nbsp;a&nbsp;<strong>monthly subscription</strong>&nbsp;for Global Grant and&nbsp;have logged in once with your username / password,&nbsp;your subscription has been started by you and a&nbsp;refund is no longer possible.</p>', 1, NULL, '2019-09-17 08:53:42'),
(48, 28, 2, '<h3><strong>BETALNINGSVILLKOR</strong></h3>\r\n\r\n<p>Du kan betala med din Internetbank till v&aring;rt Plusgiro 6038329-6 eller Bankgiro 226-2384. &Auml;nnu snabbare &auml;r Swish 123 351 0583 eller med&nbsp;<a href=\"https://www.paypal.me/globalgrant3\">kontokort</a>.&nbsp; Uppge helst samma e-mailadress&nbsp;vid betalningen som du anv&auml;nder n&auml;r du loggar in p&aring;&nbsp;Global Grant.</p>\r\n\r\n<p>Privatpersoner, dvs vanliga konsumenteners&nbsp;k&ouml;p&nbsp;av v&aring;ra tj&auml;nster via telefon eller Internet regleras av&nbsp;<a href=\"http://www.konsumentverket.se/Lag-ratt/Lagar/Om-distans--och-hemforsaljningslagen/\">Distans- och hemf&ouml;rs&auml;ljningslagen&nbsp;och&nbsp;E-handelslagen</a>. Om du har loggat in en g&aring;ng med anv&auml;ndarnamn/l&ouml;senord p&aring; ditt abonnemang s&aring; har abonnemangets p&aring;b&ouml;rjats och d&aring; g&auml;ller inte &aring;ngerr&auml;tt.&nbsp;&nbsp;<a href=\"http://www.konsumentverket.se/Lag-ratt/Din-ratt-som-konsument/Angerratt/\">&Aring;ngerr&auml;tt</a>&nbsp;g&auml;ller endast om tj&auml;nsten eller abonnemang &auml;nnu inte tillverkats eller levererats.</p>\r\n\r\n<p>Eftersom en f&ouml;rteckning av fonder &auml;r unikt tillverkad f&ouml;r dig enligt din &ouml;nskem&aring;l s&aring; g&aring;r det inte att &aring;ngra en betald och levererad f&ouml;rteckning. Skr&auml;ddarsydda och Automatiskt gjorda f&ouml;rteckningar &auml;r allts&aring; en tj&auml;nst som inte har &aring;ngerr&auml;tt p&aring; grund av tj&auml;nstens beskaffenhet.</p>', 1, NULL, '2019-09-17 08:53:42'),
(49, 29, 1, '<h2>ALL PREVIOUS SOS GRANTEES</h2>\r\n\r\n<p>Teresa Gilbert Aramburu, studier USA<br />\r\nJonatan Adolfsson, studier<br />\r\nAlexander Wagner, studerande Lunds Univ<br />\r\nJosefine Bergman, musik Ingesunds Folkh&ouml;gskola<br />\r\nMartin Edstr&ouml;m, dokument&auml;rfilm milj&ouml;<br />\r\nGustav Aulin, studier&nbsp; K&ouml;penhamn<br />\r\nDaniel Arnesson, milj&ouml;studier Australien<br />\r\nAnn Sellberg for medical studies in Ethiopia<br />\r\nAnna Lundqvist, Stockholm<br />\r\nAmanda Smedberg, Staffanstorp Judoklubb<br />\r\nFredrik Elisson, ung v&auml;rldsf&ouml;rb&auml;ttrare, f&ouml;r n&auml;rvarande p&aring; g&aring;ng i Senegal<br />\r\nLars Gr&ouml;nborg, inspirat&ouml;r och f&ouml;rfattare fr&aring;n Gemla<br />\r\nJonas Larsson, Lunds universitet<br />\r\nMoa Liukkonen, Oslo, Norge - Hip Hop dans i Los Angeles, USA<br />\r\nP&auml;rtel-Peeter Pere, Tallin, Estland - Musikstudier i UK<br />\r\nHanna Ris&eacute;n, H&ouml;gskolan Sk&ouml;ve<br />\r\nCassandra Apelqvist, Lycksele<br />\r\nJesper Carlqvist, Stockholm<br />\r\nJohan Persson, Glokala Folkh&ouml;gskolan i Malm&ouml;<br />\r\nMalin Hansson, &Ouml;rebro Gymnasium<br />\r\nJanna Malmsten Link&ouml;pings Universitet<br />\r\nBritt Abrahamsson, Gnosj&ouml;<br />\r\nJohanna Lindberg Munther, Arjeplog<br />\r\nJonas Forsberg, Hofstra University, New York<br />\r\nAnnika Tibblin, Lunds Universitet<br />\r\nHaci M Sak, G&ouml;teborg<br />\r\nAnette Wahlstr&ouml;m,College of Fashion, London<br />\r\nOtto Jaksch, Ishockegymnasiet Torsby/Sunne<br />\r\nRasmus o Tove Holmqvist, Eskilstuna<br />\r\nYihan Tong, Les Roches, Schweiz<br />\r\nErika o Nathalie Larsson, Stockholm<br />\r\nPeter Schytt-Winberg, Lugnetgymnasiet, Falun<br />\r\nJan Johansson, Nacka<br />\r\nAnette Riipinen, Bor&aring;s<br />\r\nRebecka Thor, S&ouml;dert&ouml;rns H&ouml;gskola<br />\r\nJohan Kilander, Handelsh&ouml;gskolan i Stockholm<br />\r\nJenny Ahlqvist, SLU<br />\r\nMauricio Monico, Floby<br />\r\nKaj Olason, Tumba<br />\r\nSana Eltayeb, Karolinska Institutet, Stockholm<br />\r\nJoram William Lilakoma, Tanzania<br />\r\nEleonore Vogel, M&auml;lardalens H&ouml;gskola<br />\r\nLinda Harju, Malm&ouml; H&ouml;gskola<br />\r\nElisabeth Fred, Ulricehamn<br />\r\nLisa Ljungberg, Stockholm<br />\r\nJose Cazon, Cebu City, Filippinerna<br />\r\nSanna Juhlin, Aln&ouml;<br />\r\nAlbert Kunihira, Kampala, Uganda<br />\r\nCatarina S&ouml;derblom, Fridhemsskolan, Stockholm<br />\r\nJenny Olsson, H&ouml;gskolan i Halmstad<br />\r\nPernilla Wigothsson, V&auml;xj&ouml; universitet<br />\r\nStephan Hammar, Karlstads universitet<br />\r\nLeif Ahlgren, Nyk&ouml;ping<br />\r\nMikael Eriksson, Norrk&ouml;ping<br />\r\nCecilia Anreasson, Mitth&ouml;gskolan, &Ouml;stersund<br />\r\nIda Sj&ouml;berg, V&auml;sterbergs folkh&ouml;gskola, G&auml;vle<br />\r\nBengt Johansson, Mitth&ouml;gskolan, &Ouml;stersund<br />\r\nMalone Cazon, Cebu City, Filippinerna<br />\r\nElin Hellman, Kungliga Tekniska H&ouml;gskolan, Stockholm<br />\r\nJohan Kraner, Ingenj&ouml;rsh&ouml;gskolan J&ouml;nk&ouml;ping<br />\r\nJohan Ericson, &Ouml;rebro universitet<br />\r\nPatricia Lee-Adolfsson, Spanien<br />\r\nYvonne Iversen, Saltsj&ouml;baden<br />\r\nAnnie Larsson, H&ouml;gskolan i Kalmar<br />\r\nAngelica L&ouml;fgren, Uppsala universitet<br />\r\nShamim Alladin, Chalmers<br />\r\nCarolina Kjellman, Lule&aring; Tekniska Universitet<br />\r\nTuula Tertsunen, Sundsvall<br />\r\nMats Forsberg, Ume&aring; universitet<br />\r\nRichard Avellan,University of Colorado<br />\r\nCornelia Bredenstam, Lunds universitet<br />\r\nMia Nilsson, Helsingborg<br />\r\nMia Norl&eacute;n, Sollefte&aring;<br />\r\nCarina Gustafsson, Tidaholm<br />\r\nDmitrij Fenin, Lomonosov universitetet, Moskva<br />\r\nErika Enggren, J&auml;rp&aring;s<br />\r\nAnders Ericsson, Chalmers, G&ouml;teborg<br />\r\nAnette Piln&auml;s, Torslanda<br />\r\nEmma Danielsson, Link&ouml;pings universitet, Link&ouml;ping<br />\r\nCarina Persson, Kristianstad<br />\r\nMartin Ingvarsson, Karlshamn<br />\r\nKarin Fr&ouml;derberg, Vallentuna<br />\r\nStina Pernholm, Gemla<br />\r\nUros Nedeljkovic, Belgrad, Serbien<br />\r\nJelena Madir, Split, Kroatien<br />\r\nAndreas Blom, Stockholm<br />\r\nAndreas Hobgy, Avesta<br />\r\nCarina Nilsson, Fj&auml;r&aring;s<br />\r\nKarin S&ouml;rensen, V&auml;ster&aring;s<br />\r\nCecilia Svensson, Enskede<br />\r\nDanijela Stankovic, Stockholm<br />\r\nBirgit M&auml;esalu, Karlstad<br />\r\nChristina Lindgren, Eker&ouml;<br />\r\nJoakim Musikka, Falun<br />\r\nRoger Pernling, Uppsala<br />\r\nSandra Danielsson, Malm&ouml;<br />\r\nAnna Karlsson, Havdhem<br />\r\nJohan Stensson, G&ouml;teborg</p>', 1, NULL, '2019-09-17 08:55:52'),
(50, 29, 2, '<h2>ALLA TIDIGARE SOS-STIPENDIATER</h2>\r\n\r\n<p>Teresa Gilbert Aramburu, studier USA<br />\r\nJonatan Adolfsson, studier<br />\r\nAlexander Wagner, studerande Lunds Univ<br />\r\nJosefine Bergman, musik Ingesunds Folkh&ouml;gskola<br />\r\nMartin Edstr&ouml;m, dokument&auml;rfilm milj&ouml;<br />\r\nGustav Aulin, studier&nbsp; K&ouml;penhamn<br />\r\nDaniel Arnesson, milj&ouml;studier Australien<br />\r\nAnn Sellberg f&ouml;r medicinstudier i Etiopien<br />\r\nAnna Lundqvist, Stockholm<br />\r\nAmanda Smedberg, Staffanstorp Judoklubb<br />\r\nFredrik Elisson, ung v&auml;rldsf&ouml;rb&auml;ttrare, f&ouml;r n&auml;rvarande p&aring; g&aring;ng i Senegal<br />\r\nLars Gr&ouml;nborg, inspirat&ouml;r och f&ouml;rfattare fr&aring;n Gemla<br />\r\nJonas Larsson, Lunds universitet<br />\r\nMoa Liukkonen, Oslo, Norge - Hip Hop dans i Los Angeles, USA<br />\r\nP&auml;rtel-Peeter Pere, Tallin, Estland - Musikstudier i UK<br />\r\nHanna Ris&eacute;n, H&ouml;gskolan Sk&ouml;ve<br />\r\nCassandra Apelqvist, Lycksele<br />\r\nJesper Carlqvist, Stockholm<br />\r\nJohan Persson, Glokala Folkh&ouml;gskolan i Malm&ouml;<br />\r\nMalin Hansson, &Ouml;rebro Gymnasium<br />\r\nJanna Malmsten Link&ouml;pings Universitet<br />\r\nBritt Abrahamsson, Gnosj&ouml;<br />\r\nJohanna Lindberg Munther, Arjeplog<br />\r\nJonas Forsberg, Hofstra University, New York<br />\r\nAnnika Tibblin, Lunds Universitet<br />\r\nHaci M Sak, G&ouml;teborg<br />\r\nAnette Wahlstr&ouml;m,College of Fashion, London<br />\r\nOtto Jaksch, Ishockegymnasiet Torsby/Sunne<br />\r\nRasmus o Tove Holmqvist, Eskilstuna<br />\r\nYihan Tong, Les Roches, Schweiz<br />\r\nErika o Nathalie Larsson, Stockholm<br />\r\nPeter Schytt-Winberg, Lugnetgymnasiet, Falun<br />\r\nJan Johansson, Nacka<br />\r\nAnette Riipinen, Bor&aring;s<br />\r\nRebecka Thor, S&ouml;dert&ouml;rns H&ouml;gskola<br />\r\nJohan Kilander, Handelsh&ouml;gskolan i Stockholm<br />\r\nJenny Ahlqvist, SLU<br />\r\nMauricio Monico, Floby<br />\r\nKaj Olason, Tumba<br />\r\nSana Eltayeb, Karolinska Institutet, Stockholm<br />\r\nJoram William Lilakoma, Tanzania<br />\r\nEleonore Vogel, M&auml;lardalens H&ouml;gskola<br />\r\nLinda Harju, Malm&ouml; H&ouml;gskola<br />\r\nElisabeth Fred, Ulricehamn<br />\r\nLisa Ljungberg, Stockholm<br />\r\nJose Cazon, Cebu City, Filippinerna<br />\r\nSanna Juhlin, Aln&ouml;<br />\r\nAlbert Kunihira, Kampala, Uganda<br />\r\nCatarina S&ouml;derblom, Fridhemsskolan, Stockholm<br />\r\nJenny Olsson, H&ouml;gskolan i Halmstad<br />\r\nPernilla Wigothsson, V&auml;xj&ouml; universitet<br />\r\nStephan Hammar, Karlstads universitet<br />\r\nLeif Ahlgren, Nyk&ouml;ping<br />\r\nMikael Eriksson, Norrk&ouml;ping<br />\r\nCecilia Anreasson, Mitth&ouml;gskolan, &Ouml;stersund<br />\r\nIda Sj&ouml;berg, V&auml;sterbergs folkh&ouml;gskola, G&auml;vle<br />\r\nBengt Johansson, Mitth&ouml;gskolan, &Ouml;stersund<br />\r\nMalone Cazon, Cebu City, Filippinerna<br />\r\nElin Hellman, Kungliga Tekniska H&ouml;gskolan, Stockholm<br />\r\nJohan Kraner, Ingenj&ouml;rsh&ouml;gskolan J&ouml;nk&ouml;ping<br />\r\nJohan Ericson, &Ouml;rebro universitet<br />\r\nPatricia Lee-Adolfsson, Spanien<br />\r\nYvonne Iversen, Saltsj&ouml;baden<br />\r\nAnnie Larsson, H&ouml;gskolan i Kalmar<br />\r\nAngelica L&ouml;fgren, Uppsala universitet<br />\r\nShamim Alladin, Chalmers<br />\r\nCarolina Kjellman, Lule&aring; Tekniska Universitet<br />\r\nTuula Tertsunen, Sundsvall<br />\r\nMats Forsberg, Ume&aring; universitet<br />\r\nRichard Avellan,University of Colorado<br />\r\nCornelia Bredenstam, Lunds universitet<br />\r\nMia Nilsson, Helsingborg<br />\r\nMia Norl&eacute;n, Sollefte&aring;<br />\r\nCarina Gustafsson, Tidaholm<br />\r\nDmitrij Fenin, Lomonosov universitetet, Moskva<br />\r\nErika Enggren, J&auml;rp&aring;s<br />\r\nAnders Ericsson, Chalmers, G&ouml;teborg<br />\r\nAnette Piln&auml;s, Torslanda<br />\r\nEmma Danielsson, Link&ouml;pings universitet, Link&ouml;ping<br />\r\nCarina Persson, Kristianstad<br />\r\nMartin Ingvarsson, Karlshamn<br />\r\nKarin Fr&ouml;derberg, Vallentuna<br />\r\nStina Pernholm, Gemla<br />\r\nUros Nedeljkovic, Belgrad, Serbien<br />\r\nJelena Madir, Split, Kroatien<br />\r\nAndreas Blom, Stockholm<br />\r\nAndreas Hobgy, Avesta<br />\r\nCarina Nilsson, Fj&auml;r&aring;s<br />\r\nKarin S&ouml;rensen, V&auml;ster&aring;s<br />\r\nCecilia Svensson, Enskede<br />\r\nDanijela Stankovic, Stockholm<br />\r\nBirgit M&auml;esalu, Karlstad<br />\r\nChristina Lindgren, Eker&ouml;<br />\r\nJoakim Musikka, Falun<br />\r\nRoger Pernling, Uppsala<br />\r\nSandra Danielsson, Malm&ouml;<br />\r\nAnna Karlsson, Havdhem<br />\r\nJohan Stensson, G&ouml;teborg</p>', 1, NULL, '2019-09-17 08:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `gg_page_meta`
--

CREATE TABLE `gg_page_meta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gg_page_meta`
--

INSERT INTO `gg_page_meta` (`id`, `page_id`, `language_id`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(18, 21, 2, NULL, NULL, NULL, NULL, '2019-09-17 08:34:44'),
(19, 22, 1, NULL, NULL, NULL, NULL, '2019-09-17 08:30:57'),
(20, 22, 2, NULL, NULL, NULL, NULL, '2019-09-17 08:30:57'),
(21, 23, 1, NULL, NULL, NULL, NULL, '2019-09-17 08:35:39'),
(22, 23, 2, NULL, NULL, NULL, NULL, '2019-09-17 08:35:39'),
(23, 24, 1, NULL, NULL, NULL, NULL, '2019-09-17 08:36:09'),
(24, 24, 2, NULL, NULL, NULL, NULL, '2019-09-17 08:36:09'),
(25, 25, 1, NULL, NULL, NULL, NULL, '2019-09-17 08:36:53'),
(26, 25, 2, NULL, NULL, NULL, NULL, '2019-09-17 08:36:53'),
(27, 26, 1, NULL, NULL, NULL, NULL, '2019-09-17 08:40:09'),
(28, 26, 2, NULL, NULL, NULL, NULL, '2019-09-17 08:40:09'),
(29, 27, 1, NULL, NULL, NULL, NULL, '2019-09-17 08:46:04'),
(30, 27, 2, NULL, NULL, NULL, NULL, '2019-09-17 08:46:04'),
(16, 20, 2, NULL, NULL, NULL, NULL, '2019-09-17 08:32:56'),
(17, 21, 1, NULL, NULL, NULL, NULL, '2019-09-17 08:34:44'),
(15, 20, 1, NULL, NULL, NULL, NULL, '2019-09-17 08:32:56'),
(13, 19, 1, NULL, NULL, NULL, NULL, '2019-09-17 08:33:31'),
(14, 19, 2, NULL, NULL, NULL, NULL, '2019-09-17 08:33:31'),
(31, 7, 1, 'eee', 'eee', '<p>eee</p>', NULL, NULL),
(32, 7, 2, 'sss', 'sss', '<p>sss</p>', NULL, NULL),
(33, 28, 1, NULL, NULL, NULL, NULL, '2019-09-17 08:53:42'),
(34, 28, 2, NULL, NULL, NULL, NULL, '2019-09-17 08:53:42'),
(35, 29, 1, NULL, NULL, NULL, NULL, '2019-09-17 08:55:52'),
(36, 29, 2, NULL, NULL, NULL, NULL, '2019-09-17 08:55:52'),
(42, 32, 2, NULL, NULL, NULL, NULL, NULL),
(41, 32, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gg_page_translation`
--

CREATE TABLE `gg_page_translation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gg_page_translation`
--

INSERT INTO `gg_page_translation` (`id`, `page_id`, `title`, `url`, `language_id`, `short_description`, `status`, `created_at`, `updated_at`) VALUES
(9, 20, 'PRIVACY POLICY', 'privacy-policy', 1, '<p>Welcome to GlobalGrant.com. The site is owned by Support &amp; Scholarships AB Global Grant with org. No. 556274-9829. The purpose of this policy, regarding personal information, is to explain our practices regarding the collection and use of personal information that you may disclose through the Website. Please read below before using or sending personal information to us.</p>', 1, NULL, '2019-09-17 08:32:56'),
(10, 20, 'INTEGRITETSPOLICY', 'privacy-policy', 2, '<p>V&auml;lkommen till GlobalGrant.com. Webbplatsen &auml;gs av St&ouml;d &amp; Stipendier AB Global Grant med org. Nr 556274-9829. Syftet med denna policy, om personlig information &auml;r att f&ouml;rklara v&aring;r praxis vad g&auml;ller insamling och anv&auml;ndning av personlig information som du eventuellt uppger via webbplatsen. V&auml;nligen l&auml;s nedanst&aring;nde innan du anv&auml;nder eller skickar personlig information till oss.</p>', 1, NULL, '2019-09-17 08:32:56'),
(7, 19, 'Terms of Use', 'terms', 1, '<p><strong>Support &amp; Scholarships AB - Global Grant</strong> owns or controls everything on this site and the material is protected by worldwide copyright law. You may only download the content for personal use and not for business purposes. It is not allowed to change or reproduce the content. The content may also not be copied or used in any other way.</p>', 1, NULL, '2019-09-17 08:33:31'),
(8, 19, 'ANVÄNDARVILLKOR', 'terms', 2, '<p><strong>St&ouml;d &amp; Stipendier AB - Global Grant</strong>&nbsp;&auml;ger eller kontrollerar allt p&aring; denna webbplats och materialet &auml;r skyddat av v&auml;rldsomsp&auml;nnande upphovsr&auml;ttslag. Du f&aring;r endast ladda hem inneh&aring;llet f&ouml;r personligt bruk och inte f&ouml;r aff&auml;rsm&auml;ssiga &auml;ndam&aring;l. Det &auml;r inte till&aring;tet att &auml;ndra eller &aring;terge inneh&aring;llet. Inneh&aring;llet f&aring;r inte heller kopieras eller anv&auml;ndas p&aring; n&aring;got annat s&auml;tt.</p>', 1, NULL, '2019-09-17 08:33:31'),
(11, 21, 'Disclaimer', 'disclaimer', 1, '<p><strong>Support &amp; Scholarships AB - Global Grant</strong>&nbsp;owns or controls everything on this site and the material is protected by worldwide copyright law.&nbsp;You may only download the content for personal use and not for business purposes.&nbsp;It is not allowed to change or reproduce the content.&nbsp;The content may also not be copied or used in any other way.</p>', 1, NULL, '2019-09-17 08:34:44'),
(12, 21, 'ANVÄNDARVILLKOR', 'disclaimer', 2, '<p><strong>St&ouml;d &amp; Stipendier AB - Global Grant</strong>&nbsp;&auml;ger eller kontrollerar allt p&aring; denna webbplats och materialet &auml;r skyddat av v&auml;rldsomsp&auml;nnande upphovsr&auml;ttslag. Du f&aring;r endast ladda hem inneh&aring;llet f&ouml;r personligt bruk och inte f&ouml;r aff&auml;rsm&auml;ssiga &auml;ndam&aring;l. Det &auml;r inte till&aring;tet att &auml;ndra eller &aring;terge inneh&aring;llet. Inneh&aring;llet f&aring;r inte heller kopieras eller anv&auml;ndas p&aring; n&aring;got annat s&auml;tt.</p>', 1, NULL, '2019-09-17 08:34:44'),
(13, 22, 'Remote', 'remote', 1, '<h3>SEARCH FROM HOME</h3>\r\n\r\n<p>WITH A LOAN CARD YOU CAN READ ALL ABOUT THE FUNDS</p>\r\n\r\n<p>To see the funds&#39; names and contact details, log in with your loan card number below. If you do not have a credit card, get one from your library.</p>\r\n\r\n<p>If your municipality is not included in the list, search the university / library&#39;s website for Global Grant. Google eg <strong>&quot;databases grove&quot;</strong>. Click on the correct link to <strong>Databases Folkbibliotek</strong> Lund and follow the instructions.</p>\r\n\r\n<p><a href=\"https://0-www.globalgrant.com.www.gotlib.goteborg.se/search\"><strong>GOTH Citizens log in here</strong></a></p>\r\n\r\n<p>If you cannot use the library, you can <a href=\"/price-list\">buy your own subscription here</a></p>', 1, NULL, '2019-09-17 08:30:57'),
(14, 22, 'SÖK HEMIFRÅN', 'remote', 2, '<h3>MED ETT L&Aring;NEKORT KAN DU L&Auml;SA ALLT OM FONDERNA</h3>\r\n\r\n<p>F&ouml;r att du ska se fondernas namn och kontaktuppgifter s&aring; logga in med ditt l&aring;nekortsnummer nedan. Har du inget l&aring;nekort, skaffa ett fr&aring;n ditt bibliotek.</p>', 1, NULL, '2019-09-17 08:30:57'),
(15, 23, 'FAQ', 'faq', 1, '<h3>MORE ABOUT PURPOSE, DIVIDEND AND HOW IT GOES TO 1-11</h3>\r\n\r\n<h3>TECHNICAL QUESTIONS, TRANSLATION OF TEXTS, HELP FOR VISUALLY IMPAIRED PEOPLE 12-14</h3>', 1, NULL, '2019-09-17 08:35:39'),
(16, 23, 'FAQ', 'faq', 2, '<h3>MER OM &Auml;NDAM&Aring;L, UTDELNING OCH HUR DET G&Aring;R TILL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1-11</h3>\r\n\r\n<h3>TEKNISKA FR&Aring;GOR, &Ouml;VERS&Auml;TTNING AV TEXTER, HJ&Auml;LP F&Ouml;R SYNSKADADE &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 12-14</h3>', 1, NULL, '2019-09-17 08:35:39'),
(17, 24, 'HELP', 'help', 1, '<p>Here&#39;s how to make good and effective searches in Global Grant</p>\r\n\r\n<p>PRINT IT HERE ON THE LIBRARY OR HOME, IT&#39;S EASIER TO DO RIGHT FROM THE BEGINNING</p>\r\n\r\n<p>Here&#39;s how to find out which funds you can apply for.&nbsp;All grants and scholarships that can be applied for from foundations and foundations can be found here at Global Grant.&nbsp;All Swedish and many foreign students for studies and projects.&nbsp;To get as good hits as possible, first set the search settings in the left column of the search page.&nbsp;</p>\r\n\r\n<ol>\r\n	<li>If you are not studying abroad, select &quot;Hide foreign funds&quot;.</li>\r\n	<li>Click the &quot;Enter your keywords&quot; field,&nbsp;<em>but do not</em>&nbsp;enter&nbsp;<em>any keywords</em>&nbsp;unless you are an advanced user.&nbsp;(For example, you can fill in the church ward to which you belong, or the name of the common disease you suffer from (cancer, heart disease, disability (from stroke or congenital), asthma, rheumatism). Unfortunately, there are no funds aimed solely at those new folk and letter diseases (fibromyalgia, ADHD etc). It is not possible to fill in what you want; car, mobile, school trip, bed, equipment etc. Funds express themselves as: &quot;This fund is for school trips and beds but not for mobiles or TVs &quot;<br />\r\n	.</li>\r\n	<li>Now there are three &quot;check boxes&quot; above the&nbsp;&nbsp;&nbsp;<strong>&nbsp;&nbsp; SEARCH&nbsp; &nbsp;&nbsp;</strong>&nbsp;&nbsp;button, mark the choices that suit you.<br />\r\n	For example, &quot;Support for the sick / disabled&quot; and &quot;Welfare and welfare support&quot;</li>\r\n</ol>\r\n\r\n<p>When you apply for Global Grant, there are some things you should know about.</p>', 1, NULL, '2019-09-17 08:36:09'),
(18, 24, 'HJÄLP', 'help', 2, '<p>S&aring; h&auml;r g&ouml;r du bra och effektiva s&ouml;k i Global Grant</p>\r\n\r\n<p>SKRIV UT DEN H&Auml;R SIDAN P&Aring; BIBLIOTEKET ELLER HEMMA S&Aring; &Auml;R DET L&Auml;TTARE ATT G&Ouml;RA R&Auml;TT FR&Aring;N B&Ouml;RJAN</p>\r\n\r\n<p>G&ouml;r s&aring; h&auml;r f&ouml;r att f&aring; reda p&aring; vilka fonder du kan s&ouml;ka. Alla bidrag och stipendier som kan ans&ouml;kas fr&aring;n fonder och stiftelser finns h&auml;r p&aring; Global Grant. Alla svenska och m&aring;nga utl&auml;ndska f&ouml;r studier och projekt. F&ouml;r att f&aring; s&aring; bra tr&auml;ffar som m&ouml;jligt s&aring; st&auml;ll f&ouml;rst in s&ouml;kinst&auml;llningarna i v&auml;nsterspalten p&aring; s&ouml;ksidan.&nbsp;</p>\r\n\r\n<ol>\r\n	<li>Markera &quot;D&ouml;lj utl&auml;ndska fonder&quot;, om du inte ska studera utomlands.</li>\r\n	<li>Klicka p&aring; f&auml;ltet &nbsp;&quot;Skriv in dina s&ouml;kord&quot;,&nbsp;<em>men fyll inte i n&aring;gra s&ouml;kord</em>&nbsp;om du inte &auml;r en avancerad anv&auml;ndare. (H&auml;r kan man t.ex fylla i den kyrkof&ouml;rsamling man tillh&ouml;r, eller namn p&aring; den folksjukdom man lider av (cancer, hj&auml;rtsjukdom, r&ouml;relsehinder (fr&aring;n stroke eller medf&ouml;tt), astma, reumatism). Tyv&auml;rr finns inga fonder som enbart riktar sig till de nya folk- och bokstavssjukdomarna (fibromyalgi, ADHD etc). Det g&aring;r inte att fylla i vad man &ouml;nskar sig; bil, mobil, skolresa, s&auml;ng, utrustning etc Fonder uttrycker sig ine som; &quot;Denna fond &auml;r till f&ouml;r skolresor och s&auml;ngar men inte f&ouml;r mobiler eller TV-apparater&quot;<br />\r\n	.</li>\r\n	<li>Nu kommer det upp tre &quot;check boxar&quot; ovanf&ouml;r&nbsp;&nbsp;<strong>&nbsp;&nbsp; S&Ouml;K&nbsp; &nbsp;&nbsp;</strong>&nbsp;knappen, markera de val som passar in p&aring; dig.<br />\r\n	Exempelvis &quot;St&ouml;d till sjuka/funtionshindrade&quot; och &quot;V&auml;lf&auml;rd och f&ouml;rs&ouml;rningsst&ouml;d&quot;</li>\r\n</ol>\r\n\r\n<p>N&auml;r du s&ouml;ker i Global Grant finns det n&aring;gra saker som du b&ouml;r k&auml;nna till.</p>', 1, NULL, '2019-09-17 08:36:09'),
(19, 25, 'About Us', 'about', 1, '<h2>WELCOME TO GLOBAL GRANT</h2>\r\n\r\n<h3>HOW CAN WE HELP YOU?</h3>\r\n\r\n<p>Here you will find scholarships and grants for yourself and your family.&nbsp;Grants for schools, associations and organizations.&nbsp;Global Grant contains information on Swedish and foreign foundations and funds.&nbsp;There is also a tool and instructions for members where you can easily make applications.</p>\r\n\r\n<p>Our vision is to be a meeting place for donors and recipients.&nbsp;That is, both donors and recipients should be able to find each other easily, quickly and at a low cost.&nbsp;Both sides have a hard time doing this.&nbsp;The recipients do not know where to apply for support and the donors do not have the resources to find and evaluate the best projects and the most suitable candidates to support.</p>', 1, NULL, '2019-09-17 08:36:53'),
(20, 25, 'MER OM OSS', 'about', 2, '<h2>V&Auml;LKOMMEN TILL GLOBAL GRANT</h2>\r\n\r\n<h3>HUR VI KAN HJ&Auml;LPA DIG?</h3>\r\n\r\n<p>H&auml;r finner du stipendier och bidrag f&ouml;r dig sj&auml;lv och din familj. Anslag till skolor, f&ouml;reningar och organisationer. Global Grant inneh&aring;ller information om svenska och utl&auml;ndska stiftelser och fonder.&nbsp; Det finns ocks&aring; ett verktyg och instruktioner f&ouml;r medlemmar d&auml;r du f&aring;r hj&auml;lp att enkelt g&ouml;ra ans&ouml;kningar.</p>\r\n\r\n<p>V&aring;r vision &auml;r att vara en m&ouml;tesplats f&ouml;r givare och mottagare. Dvs b&aring;de givare och mottagare ska kunna finna varandra enkelt, snabbt och till l&aring;g kostnad. B&aring;da sidor har sv&aring;rt att g&ouml;ra detta. Mottagarna vet inte var de ska v&auml;nda sig f&ouml;r att s&ouml;ka st&ouml;d och givarna har inte resurser f&ouml;r att finna och utv&auml;rdera de b&auml;sta projekten och mest l&auml;mpade kandidaterna att st&ouml;dja.</p>', 1, NULL, '2019-09-17 08:36:53'),
(21, 26, 'PRICES', 'price-list', 1, NULL, 1, NULL, '2019-09-17 08:40:09'),
(35, 32, NULL, NULL, 1, NULL, 1, NULL, NULL),
(36, 32, NULL, NULL, 2, NULL, 1, NULL, NULL),
(22, 26, 'PRISER', 'price-list', 2, '<h2><strong>S&Ouml;K FONDER&nbsp;<a href=\"https://www.globalgrant.com/search\" target=\"_blank\">GRATIS</a>&nbsp;I GLOBAL GRANT P&Aring; DET S&Auml;TT SOM PASSAR DIG B&Auml;ST</strong></h2>\r\n\r\n<h3>1. BEST&Auml;LL EN F&Ouml;RTECKNING SOM &Auml;R SKR&Auml;DDARSYDD F&Ouml;R DIN PROFIL</h3>\r\n\r\n<p>G&ouml;r det enkelt, snabbt och bekv&auml;mt f&ouml;r dig.</p>\r\n\r\n<p>Best&auml;ll en skr&auml;ddarsydd lista med fonder&nbsp;som du inte hittar p&aring; Google eller n&aring;gon annanstans. Du f&aring;r en lista som passar in p&aring; din profil.&nbsp;Perfekt f&ouml;r studenter, pension&auml;rer,&nbsp;ensamst&aring;ende, sjuka, kulturarbetare, forskare eller projektledare.&nbsp;Finns b&aring;de f&ouml;r enskilda personer och&nbsp;f&ouml;r f&ouml;reningar, organisationer och verksamheter inom skola, v&aring;rd och omsorg.</p>', 1, NULL, '2019-09-17 08:40:09'),
(23, 27, 'FOR MOTORISTS', 'for-librarians', 1, '<p>Global Grant&#39;s URL is&nbsp;<a href=\"https://www.globalgrant.com/\">https://www.globalgrant.com</a></p>\r\n\r\n<p>All old Global Grant addresses or old direct links should be removed or corrected on your website, even if they still work.&nbsp;One day they will stop working.</p>', 1, NULL, '2019-09-17 08:46:04'),
(24, 27, 'FÖR BILIOTEKARIER', 'for-librarians', 2, '<p>Global Grants webbadress &auml;r&nbsp;<a href=\"https://www.globalgrant.com/\">https://www.globalgrant.com</a></p>\r\n\r\n<p>Alla gamla adresser till Global Grant eller gamla direktl&auml;nkar b&ouml;r tas bort eller korrigeras p&aring; er webbsajt, &auml;ven om de fungerar fortfarande. En dag kommer de sluta fungera.</p>', 1, NULL, '2019-09-17 08:46:04'),
(25, 7, 'eee', 'eee', 1, '<p>eee</p>', 1, NULL, NULL),
(26, 7, 'sss', 'sss', 2, '<p>sss</p>', 1, NULL, NULL),
(27, 28, 'LIST OF SCHOLARSHIPS AND GRANTS PAYMENT', 'all-products-payment', 1, '<h3><strong>TERMS OF PAYMENT</strong></h3>\r\n\r\n<p>We accept payment by Plusgiro&nbsp;, Bankgiro, Internet banking and Swish.</p>\r\n\r\n<p><strong>Use the same email address</strong>&nbsp;when registering the&nbsp;payment as you use when you login&nbsp;to Global Grant, else your&nbsp;payment and order cannot be matched automatically, and you may have to wait several days for your login or upgrade, instead of just one minute.</p>', 1, NULL, '2019-09-17 08:53:42'),
(28, 28, 'LEVERANS- OCH BETALNINGSVILLKOR', 'all-products-payment', 2, '<h3><strong>LEVERANSVILLKOR</strong></h3>\r\n\r\n<p>Med ett&nbsp;<a href=\"https://www.globalgrant.com/remote\">l&aring;nekort p&aring; biblioteket</a>&nbsp;kan du gratis s&ouml;ka efter l&auml;mpliga fonder som ekonomiskt kan hj&auml;lpa dig. Ett&nbsp;<a href=\"https://www.globalgrant.com/login\">login</a>&nbsp;till Global Grant f&aring;r du helt gratis utan kostnad om du&nbsp;<a href=\"https://www.globalgrant.com/register\">registrerar</a>&nbsp;dig som medlem p&aring; Global Grant. Medlemskapet kostar aldrig n&aring;got. Ett&nbsp;login&nbsp;till Global Grant levereras normalt inom n&aring;gra minuter till din e-postadress, efter du registrerat dig.&nbsp;</p>\r\n\r\n<p><strong>SKR&Auml;DDARSYDDA LISTOR&nbsp;</strong>En skr&auml;ddarsydd lista kommer inneh&aring;lla minst tio s&ouml;kbara fonder. Vi tar fullt betalt f&ouml;r en f&ouml;rteckning som inneh&aring;ller minst tio s&ouml;kbara fonder. Inneh&aring;ller f&ouml;rteckningen f&auml;rre &auml;n tio fonder s&aring; s&auml;nks priset med motsvarande belopp. Inneh&aring;ller f&ouml;rteckningen t.ex fem fonder s&aring; &aring;terbetalas halva k&ouml;pesumman, exkl. eventuellt porto och frakt. Hittar vi inga fonder s&aring; &aring;terbetalas hela beloppet. Listorna levereras normalt till din e-postadress men du kan mot en extra avgift p&aring; 100 kr f&aring; listan utskriven, kuverterad och postad hem med vanlig post.</p>\r\n\r\n<p>En skr&auml;ddarsydd lista tar cirka 5-10 arbetsdagar att g&ouml;ra, efter vi mottagit din betalning g&ouml;r vi listan. Den m&aring;ste allts&aring; f&ouml;rskottsbetalas.&nbsp;</p>', 1, NULL, '2019-09-17 08:53:42'),
(29, 29, 'SOS-SCHOLARSHIPS', 'sos-stipendier', 1, '<p>Receiving&nbsp;a scholarship or a grant is a merit. If you previously have received scholarships, grants or other type of gifts (like free tuition) so state that in your&nbsp; applications for other grants.. The more&nbsp;prestigious&nbsp;scholarships you have received, the easier it is to get more!</p>\r\n\r\n<p>SOS-scholarships expired 31 May, 2017 and can no longer be applied, but you can&nbsp;<a href=\"https://www.globalgrant.com/en/search\">apply</a>&nbsp;for many other scholarships</p>', 1, NULL, '2019-09-17 08:55:52'),
(30, 29, 'SOS STIPENDIER', 'sos-stipendier', 2, '<p>Att f&aring; stipendium &auml;r meriterande. Har du tidigare f&aring;tt stipendier, bidrag eller premier s&aring; tala om det n&auml;r du s&ouml;ker fler stipendier. Ju fler och finare stipendier man f&aring;tt f&ouml;rut desto l&auml;ttare att f&aring; &auml;nnu mer!</p>\r\n\r\n<p>Tyv&auml;rr upph&ouml;rde SOS-stipendiet 31 maj 2017 och kan inte l&auml;ngre ans&ouml;kas, men det finns m&aring;nga andra stipendier du kan&nbsp;<a href=\"https://www.globalgrant.com/search\">ans&ouml;ka</a>.</p>', 1, NULL, '2019-09-17 08:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `gg_region`
--

CREATE TABLE `gg_region` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `region_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `modified_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gg_region`
--

INSERT INTO `gg_region` (`id`, `country_id`, `region_name`, `status`, `deleted`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'PUNJAB', '1', NULL, NULL, NULL, '2019-06-15 00:29:22', '2019-06-15 00:29:22'),
(2, 92, 'Delhi', '', NULL, NULL, NULL, NULL, NULL),
(3, 92, 'madhya pradesh', '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gg_search_count`
--

CREATE TABLE `gg_search_count` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foundation_id` int(10) UNSIGNED NOT NULL,
  `count` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gg_search_count`
--

INSERT INTO `gg_search_count` (`id`, `foundation_id`, `count`, `created_at`, `updated_at`) VALUES
(36, 22452, 0, '2019-09-19 09:18:01', '2019-09-19 09:18:16'),
(37, 22447, 1, '2019-09-19 09:20:18', '2019-09-19 09:20:18'),
(38, 13284, 1, '2019-09-19 09:20:20', '2019-09-19 11:06:30'),
(39, 826, 1, '2019-09-21 03:19:47', '2019-09-21 03:19:47'),
(40, 11530, 1, '2019-10-03 13:20:21', '2019-10-03 13:20:21'),
(41, 12437, 1, '2019-10-03 14:00:29', '2019-10-03 14:00:29'),
(42, 12465, 1, '2019-10-03 14:00:34', '2019-10-03 14:00:34'),
(43, 2096, 1, '2019-10-03 14:01:08', '2019-10-03 14:01:08'),
(44, 1107, 1, '2019-11-13 17:53:53', '2019-11-13 17:53:53'),
(45, 2403, 1, '2019-11-13 17:53:55', '2019-11-13 17:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `gg_settings`
--

CREATE TABLE `gg_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `system_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gg_settings`
--

INSERT INTO `gg_settings` (`id`, `setting`, `system_name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Default Language', 'LANGUAGE_ID', '1', NULL, NULL),
(2, 'Default User Role', 'USER_ROLE', '4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gg_subscription`
--

CREATE TABLE `gg_subscription` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscriptionid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT 0,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `paymenttype` int(11) DEFAULT NULL,
  `paymentstatus` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `misc` double DEFAULT NULL,
  `vat` double DEFAULT NULL,
  `freight` double DEFAULT NULL,
  `freighttax` double DEFAULT NULL,
  `total` double NOT NULL,
  `no_of_days` int(11) DEFAULT NULL,
  `subsnote` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gg_subscription`
--

INSERT INTO `gg_subscription` (`id`, `name`, `userid`, `user_type`, `subscriptionid`, `role_id`, `start_date`, `end_date`, `status`, `paymenttype`, `paymentstatus`, `price`, `misc`, `vat`, `freight`, `freighttax`, `total`, `no_of_days`, `subsnote`, `created_at`, `updated_at`) VALUES
(10, 'vikashu sharma', 122, 'IND', NULL, 0, '2019-12-01 00:00:00', '2020-01-01 00:00:00', 1, 0, 0, 1000, 100, 10, 100, 10, 1320, 31, 'testing notes', '2019-12-24 09:07:04', '2019-12-24 09:09:57');

-- --------------------------------------------------------

--
-- Table structure for table `gg_translations`
--

CREATE TABLE `gg_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gg_user_search_save`
--

CREATE TABLE `gg_user_search_save` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `foundation_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gg_user_search_save`
--

INSERT INTO `gg_user_search_save` (`id`, `user_id`, `foundation_id`, `created_at`, `updated_at`) VALUES
(48, 12, 22447, '2019-09-19 09:20:18', '2019-09-19 09:20:18'),
(50, 12, 13284, '2019-09-19 11:06:30', '2019-09-19 11:06:30'),
(51, 1, 826, '2019-09-21 03:19:47', '2019-09-21 03:19:47'),
(52, 1, 11530, '2019-10-03 13:20:21', '2019-10-03 13:20:21'),
(53, 1, 12437, '2019-10-03 14:00:29', '2019-10-03 14:00:29'),
(54, 1, 12465, '2019-10-03 14:00:34', '2019-10-03 14:00:34'),
(55, 1, 2096, '2019-10-03 14:01:08', '2019-10-03 14:01:08'),
(56, 1, 1107, '2019-11-13 17:53:53', '2019-11-13 17:53:53'),
(57, 1, 2403, '2019-11-13 17:53:55', '2019-11-13 17:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `gg_user_subscriptions`
--

CREATE TABLE `gg_user_subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `subscription_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gg_user_subscriptions`
--

INSERT INTO `gg_user_subscriptions` (`id`, `user_id`, `subscription_id`, `created_at`, `updated_at`) VALUES
(1, 9, 5, '2019-07-02 08:31:35', '2019-07-02 08:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `hitlist`
--

CREATE TABLE `hitlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lenguage` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hitlist`
--

INSERT INTO `hitlist` (`id`, `name`, `keyword`, `lenguage`, `description`, `created_at`, `updated_at`) VALUES
(2, 'hitlist1', 'test,hitlist', 1, 'testing', '2019-12-16 05:24:54', '2019-12-16 05:25:59'),
(3, 'hitlist2', 'test,test,hitlist', 1, 'testing hitlist 2', '2019-12-16 05:25:41', NULL),
(4, 'hoitlist3', 'test,test,hitlist', 2, 'test', '2019-12-17 03:14:13', '2019-12-17 03:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `individual`
--

CREATE TABLE `individual` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT current_timestamp(),
  `language` int(11) DEFAULT NULL,
  `availability` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `individual`
--

INSERT INTO `individual` (`id`, `userid`, `firstname`, `lastname`, `middlename`, `age`, `dob`, `language`, `availability`, `created_at`, `updated_at`) VALUES
(2, 97, 'vikash', 'sharma', 'no middle', '25', '1994-04-24', 0, 1, '2019-12-23 03:31:05', NULL),
(3, 98, 'vikash', 'sharma', 'no middle', '25', '1994-04-24', 0, 1, '2019-12-23 04:00:39', NULL),
(4, 99, 'vikash', 'sharma', 'no middle', '25', '1994-04-24', 0, 1, '2019-12-23 04:00:50', NULL),
(5, 100, 'vikash', 'sharma', 'no middle', '25', '1994-04-24', 0, 1, '2019-12-23 04:03:43', NULL),
(6, 101, 'vikash', 'sharma', 'no middle', '25', '1994-04-24', 0, 1, '2019-12-23 04:07:38', NULL),
(7, 102, 'vikash', 'sharma', 'no middle', '25', '1994-04-24', 0, 1, '2019-12-23 04:08:13', NULL),
(8, 103, 'vikash', 'sharma', 'no middle', '25', '1994-04-24', 0, 1, '2019-12-23 04:08:53', NULL),
(9, 104, 'vikash', 'sharma', 'no middle', '25', '1994-04-24', 0, 1, '2019-12-23 04:11:05', NULL),
(10, 105, 'vikash', 'sharma', 'no middle', '25', '1994-04-24', 0, 1, '2019-12-23 04:11:55', NULL),
(11, 106, 'vikash', 'sharma', 'no middle', '25', '1994-04-24', 0, 1, '2019-12-23 04:14:23', NULL),
(12, 107, 'vikash', 'sharma', 'no middle', '25', '1994-04-24', 0, 1, '2019-12-23 04:15:16', NULL),
(13, 108, 'vikash', 'sharma', 'no middle', '25', '1994-04-24', 0, 1, '2019-12-23 04:15:49', NULL),
(14, 109, 'vikash', 'sharma', 'no middle', '25', '1994-04-24', 0, 1, '2019-12-23 04:18:59', NULL),
(15, 110, 'vikash', 'sharma', 'no middle', '25', '1994-04-24', 0, 1, '2019-12-23 04:19:30', NULL),
(16, 111, 'vikash', 'sharma', 'no middle', '25', '1994-04-24', 0, 1, '2019-12-23 04:25:57', NULL),
(17, 112, 'vikash', 'sharma', 'no middle', '25', '1994-04-24', 0, 1, '2019-12-23 04:26:16', NULL),
(27, 122, 'vikashu', 'sharmauu', 'no middleu', '4', '2019-12-01', 1, 1, '2019-12-23 04:58:43', '2019-12-23 06:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `individual_care`
--

CREATE TABLE `individual_care` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `careillness` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caresymptoms` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carehospital` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carehealthregion` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `careaddtionalinfo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `individual_care`
--

INSERT INTO `individual_care` (`id`, `userid`, `careillness`, `caresymptoms`, `carehospital`, `carehealthregion`, `careaddtionalinfo`, `created_at`, `updated_at`) VALUES
(5, 122, 'ewewewew', 'ewewew', 'eweweew', 'ewewewwe', 'ewewewew', '2019-12-23 04:58:43', '2019-12-23 06:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `individual_childern`
--

CREATE TABLE `individual_childern` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `childerndob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `childerngender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `childernschool` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `childernlocation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `individual_childern`
--

INSERT INTO `individual_childern` (`id`, `userid`, `childerndob`, `childerngender`, `childernschool`, `childernlocation`, `created_at`, `updated_at`) VALUES
(10, 122, '12/25/2019', '1', 'ewewew', '1', NULL, '2019-12-23 06:04:03'),
(11, 122, '12/19/2019', '2', 'ewewewew', '0', NULL, '2019-12-23 06:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `individual_contact`
--

CREATE TABLE `individual_contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `streetadress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `individual_contact`
--

INSERT INTO `individual_contact` (`id`, `userid`, `streetadress`, `zipcode`, `country`, `region`, `city`, `personal`, `mobile`, `phone`, `created_at`, `updated_at`) VALUES
(2, 97, NULL, NULL, '0', '0', '0', NULL, '987654321', '98765432112', '2019-12-23 03:31:05', NULL),
(3, 98, NULL, NULL, '0', '0', '0', NULL, '987654321', '98765432112', '2019-12-23 04:00:39', NULL),
(4, 99, NULL, NULL, '0', '0', '0', NULL, '987654321', '98765432112', '2019-12-23 04:00:50', NULL),
(5, 100, NULL, NULL, '0', '0', '0', NULL, '987654321', '98765432112', '2019-12-23 04:03:44', NULL),
(6, 101, NULL, NULL, '0', '0', '0', NULL, '987654321', '98765432112', '2019-12-23 04:07:38', NULL),
(7, 102, NULL, NULL, '0', '0', '0', NULL, '987654321', '98765432112', '2019-12-23 04:08:13', NULL),
(8, 103, NULL, NULL, '0', '0', '0', NULL, '987654321', '98765432112', '2019-12-23 04:08:53', NULL),
(9, 104, NULL, NULL, '0', '0', '0', NULL, '987654321', '98765432112', '2019-12-23 04:11:05', NULL),
(10, 105, NULL, NULL, '0', '0', '0', NULL, '987654321', '98765432112', '2019-12-23 04:11:55', NULL),
(11, 106, NULL, NULL, '0', '0', '0', NULL, '987654321', '98765432112', '2019-12-23 04:14:24', NULL),
(12, 107, NULL, NULL, '0', '0', '0', NULL, '987654321', '98765432112', '2019-12-23 04:15:16', NULL),
(13, 108, NULL, NULL, '0', '0', '0', NULL, '987654321', '98765432112', '2019-12-23 04:15:49', NULL),
(14, 109, NULL, NULL, '0', '0', '0', NULL, '987654321', '98765432112', '2019-12-23 04:18:59', NULL),
(15, 110, NULL, NULL, '0', '0', '0', NULL, '987654321', '98765432112', '2019-12-23 04:19:30', NULL),
(16, 111, NULL, NULL, '0', '0', '0', NULL, '987654321', '98765432112', '2019-12-23 04:25:57', NULL),
(17, 112, NULL, NULL, '0', '0', '0', NULL, '987654321', '98765432112', '2019-12-23 04:26:16', NULL),
(27, 122, 'sasaassasassss', '433343311', '14', '0', '0', 'no personal', '987654321', '98765432112', '2019-12-23 04:58:43', '2019-12-23 06:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `individual_library`
--

CREATE TABLE `individual_library` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `librarycity` int(11) DEFAULT NULL,
  `librarycardnumber` int(11) DEFAULT NULL,
  `librarycomment` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `individual_personal`
--

CREATE TABLE `individual_personal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civilstatus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residenceregion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residencecity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residenceparish` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthregion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthcity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthparish` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicationletter` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `individual_personal`
--

INSERT INTO `individual_personal` (`id`, `userid`, `gender`, `civilstatus`, `occupation`, `nationality`, `residenceregion`, `residencecity`, `residenceparish`, `birthregion`, `birthcity`, `birthparish`, `applicationletter`, `created_at`, `updated_at`) VALUES
(2, 97, '0', '0', NULL, NULL, '0', '0', NULL, '0', '0', NULL, NULL, '2019-12-23 03:31:05', NULL),
(3, 98, '0', '0', NULL, NULL, '0', '0', NULL, '0', '0', NULL, NULL, '2019-12-23 04:00:39', NULL),
(4, 99, '0', '0', NULL, NULL, '0', '0', NULL, '0', '0', NULL, NULL, '2019-12-23 04:00:50', NULL),
(5, 100, '0', '0', NULL, NULL, '0', '0', NULL, '0', '0', NULL, NULL, '2019-12-23 04:03:44', NULL),
(6, 101, '0', '0', NULL, NULL, '0', '0', NULL, '0', '0', NULL, NULL, '2019-12-23 04:07:38', NULL),
(7, 102, '0', '0', NULL, NULL, '0', '0', NULL, '0', '0', NULL, NULL, '2019-12-23 04:08:13', NULL),
(8, 103, '0', '0', NULL, NULL, '0', '0', NULL, '0', '0', NULL, NULL, '2019-12-23 04:08:53', NULL),
(9, 104, '0', '0', NULL, NULL, '0', '0', NULL, '0', '0', NULL, NULL, '2019-12-23 04:11:05', NULL),
(10, 105, '0', '0', NULL, NULL, '0', '0', NULL, '0', '0', NULL, NULL, '2019-12-23 04:11:55', NULL),
(11, 106, '0', '0', NULL, NULL, '0', '0', NULL, '0', '0', NULL, NULL, '2019-12-23 04:14:24', NULL),
(12, 107, '0', '0', NULL, NULL, '0', '0', NULL, '0', '0', NULL, NULL, '2019-12-23 04:15:16', NULL),
(13, 108, '0', '0', NULL, NULL, '0', '0', NULL, '0', '0', NULL, NULL, '2019-12-23 04:15:49', NULL),
(14, 109, '0', '0', NULL, NULL, '0', '0', NULL, '0', '0', NULL, NULL, '2019-12-23 04:18:59', NULL),
(15, 110, '0', '0', NULL, NULL, '0', '0', NULL, '0', '0', NULL, NULL, '2019-12-23 04:19:30', NULL),
(16, 111, '0', '0', NULL, NULL, '0', '0', NULL, '0', '0', NULL, NULL, '2019-12-23 04:25:57', NULL),
(17, 112, '0', '0', NULL, NULL, '0', '0', NULL, '0', '0', NULL, NULL, '2019-12-23 04:26:16', NULL),
(27, 122, '1', '1', 'ssasasaassa', 'Austria', '0', '0', 'wwwqqw', '0', '0', 'wqwqwq', '<p>wqqwwqwq</p>', '2019-12-23 06:04:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `individual_project`
--

CREATE TABLE `individual_project` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `projectobject` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projectpurpose` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projectgeoarea` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projectbeneficiries` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projectotherinfo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `individual_project`
--

INSERT INTO `individual_project` (`id`, `userid`, `projectobject`, `projectpurpose`, `projectgeoarea`, `projectbeneficiries`, `projectotherinfo`, `created_at`, `updated_at`) VALUES
(2, 122, 'assasa', 'sasasas', 'saassa', 'saassa', 'sasasasaas', '2019-12-23 04:58:43', '2019-12-23 06:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `individual_purposelist`
--

CREATE TABLE `individual_purposelist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `purposeid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `individual_purposelist`
--

INSERT INTO `individual_purposelist` (`id`, `userid`, `purposeid`, `created_at`, `updated_at`) VALUES
(2, 100, '', '2019-12-23 04:03:44', NULL),
(3, 101, '', '2019-12-23 04:07:38', NULL),
(4, 102, '', '2019-12-23 04:08:13', NULL),
(5, 103, '', '2019-12-23 04:08:53', NULL),
(6, 104, '', '2019-12-23 04:11:05', NULL),
(7, 105, '', '2019-12-23 04:11:55', NULL),
(8, 106, '', '2019-12-23 04:14:24', NULL),
(9, 107, '', '2019-12-23 04:15:16', NULL),
(10, 108, '', '2019-12-23 04:15:49', NULL),
(11, 109, '', '2019-12-23 04:18:59', NULL),
(12, 110, '', '2019-12-23 04:19:30', NULL),
(13, 111, '', '2019-12-23 04:25:57', NULL),
(14, 112, '', '2019-12-23 04:26:16', NULL),
(24, 122, '[\"1\",\"2\"]', '2019-12-23 04:58:43', '2019-12-23 06:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `individual_research`
--

CREATE TABLE `individual_research` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `researchsubject` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `researchobjective` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `researchlimitation` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `researchadditionalinfo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `researchstartdate` date DEFAULT NULL,
  `researchenddate` date DEFAULT NULL,
  `researchgovtsupport` int(11) DEFAULT NULL,
  `researchprevstudy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `researchprevschool` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `researchhighschool` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `individual_research`
--

INSERT INTO `individual_research` (`id`, `userid`, `researchsubject`, `researchobjective`, `researchlimitation`, `researchadditionalinfo`, `researchstartdate`, `researchenddate`, `researchgovtsupport`, `researchprevstudy`, `researchprevschool`, `researchhighschool`, `created_at`, `updated_at`) VALUES
(2, 122, NULL, 'sasasasasa', 'sasasasa', 'asasas', '2019-11-21', '2019-11-21', 1, 'as', 'asaa', 'saasas', '2019-12-23 04:58:43', '2019-12-23 06:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `individual_study`
--

CREATE TABLE `individual_study` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `studyfield` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studydegree` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studyschool` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studylocation` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studystart` date DEFAULT NULL,
  `studyend` date DEFAULT NULL,
  `studygovtsupport` int(11) DEFAULT NULL,
  `studypreviousdegree` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studyprevioulength` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studypreviousschool` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studyprevioulocation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studyhighschool` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studyhighlocation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studyhighotherlocation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studyhighotherinfo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studyadditionalinfo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `individual_study`
--

INSERT INTO `individual_study` (`id`, `userid`, `studyfield`, `studydegree`, `studyschool`, `studylocation`, `studystart`, `studyend`, `studygovtsupport`, `studypreviousdegree`, `studyprevioulength`, `studypreviousschool`, `studyprevioulocation`, `studyhighschool`, `studyhighlocation`, `studyhighotherlocation`, `studyhighotherinfo`, `studyadditionalinfo`, `created_at`, `updated_at`) VALUES
(5, 122, 'ddsj', 'jdsjbdsvb', 'jsjdsds', 'jbdsjsdbds', '2019-12-01', '2019-12-01', 1, 'pdegreeupdate', 'plenthupdate', 'xzzxxzxz', '0', 'hschoolupdate', '0', 'dweewew', 'ewewewew', 'ewewewew', '2019-12-23 04:58:43', '2019-12-23 06:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `individual_video`
--

CREATE TABLE `individual_video` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `individual_video`
--

INSERT INTO `individual_video` (`id`, `userid`, `type`, `url`, `created_at`, `updated_at`) VALUES
(10, 122, '1', 'http://sasasasa.dsa', NULL, '2019-12-23 06:04:03'),
(11, 122, '0', 'http://sasasasa.ssa', NULL, '2019-12-23 06:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `individual_welfare`
--

CREATE TABLE `individual_welfare` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `welfareneeds` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `welfareadditionalinfo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `individual_welfare`
--

INSERT INTO `individual_welfare` (`id`, `userid`, `welfareneeds`, `welfareadditionalinfo`, `created_at`, `updated_at`) VALUES
(5, 122, 'ewewewew', 'wsxwxdewx', '2019-12-23 04:58:43', '2019-12-23 06:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `libraryips`
--

CREATE TABLE `libraryips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libraryid` int(11) NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `librarylogin`
--

CREATE TABLE `librarylogin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libraryid` int(11) NOT NULL,
  `activeip` int(11) DEFAULT NULL,
  `remotename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remoteactiveip` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `librarylogin`
--

INSERT INTO `librarylogin` (`id`, `libraryid`, `activeip`, `remotename`, `remoteactiveip`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 'SSS', 1, '2019-12-23 07:38:28', '2019-12-23 07:43:49'),
(2, 10, 1, 'SSS', 1, '2019-12-23 07:46:02', '2019-12-23 08:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `libraryremoteips`
--

CREATE TABLE `libraryremoteips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libraryid` int(11) NOT NULL,
  `remotedigit` int(11) DEFAULT NULL,
  `remoteid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `library_basic`
--

CREATE TABLE `library_basic` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `library` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `groupid` int(11) DEFAULT NULL,
  `languageid` int(11) DEFAULT NULL,
  `logintype` int(11) DEFAULT NULL,
  `usernumber` int(11) DEFAULT NULL,
  `availability` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL COMMENT '''1''=>''library'',''2''=>''librarygroup'',''3''=>''organization''',
  `remark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `library_contact`
--

CREATE TABLE `library_contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `libraryid` int(11) DEFAULT NULL,
  `contactname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remotearena` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactaddress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactzip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactcountry` int(11) DEFAULT NULL,
  `contactcity` int(11) DEFAULT NULL,
  `postaladdress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postalzip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postalcountry` int(11) DEFAULT NULL,
  `postalcity` int(11) DEFAULT NULL,
  `about_sve` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_eng` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(46, '2014_10_12_000000_create_users_table', 4),
(47, '2014_10_12_100000_create_password_resets_table', 4),
(48, '2016_06_01_000001_create_oauth_auth_codes_table', 4),
(49, '2016_06_01_000002_create_oauth_access_tokens_table', 4),
(50, '2016_06_01_000003_create_oauth_refresh_tokens_table', 4),
(51, '2016_06_01_000004_create_oauth_clients_table', 4),
(52, '2016_06_01_000005_create_oauth_personal_access_clients_table', 4),
(68, '2019_05_25_111729_create_gg_module_fields_table', 4),
(67, '2019_05_25_111436_create_gg_modules_table', 4),
(57, '2019_05_15_05_create_gg_foundation_dates_table', 4),
(53, '2019_05_15_01_create_gg_foundation_table', 4),
(54, '2019_05_15_02_create_gg_foundation_advertise_table', 4),
(55, '2019_05_15_03_create_gg_foundation_age_table', 4),
(20, '2019_05_27_025501_create_gg_labels_table', 2),
(56, '2019_05_15_04_create_gg_foundation_contact_table', 4),
(22, '2019_06_11_053339_create_gg_labels_table', 3),
(58, '2019_05_15_06_create_gg_foundation_gender_table', 4),
(59, '2019_05_15_07_create_gg_foundation_instructions_table', 4),
(60, '2019_05_15_08_create_gg_foundation_location_table', 4),
(61, '2019_05_15_09_create_gg_foundation_purpose_table', 4),
(62, '2019_05_15_10_create_gg_foundation_save_count_table', 4),
(63, '2019_05_15_11_create_gg_foundation_subject_table', 4),
(64, '2019_05_15_12_create_gg_foundation_application_table', 4),
(65, '2019_05_23_114456_create_gg_languages_table', 4),
(66, '2019_05_25_101250_create_gg_translations_table', 4),
(69, '2019_05_25_111826_create_gg_module_fields_values_table', 4),
(70, '2019_12_04_141604_create_userinfo_table', 5),
(71, '2019_12_13_085506_create_forms_table', 6),
(72, '2019_12_13_092846_create_hitlist_table', 7),
(73, '2019_12_13_100356_create_sproduct_table', 8),
(74, '2019_12_13_104628_create_paymentmood_table', 9),
(76, '2019_12_13_144711_create_office_table', 10),
(79, '2019_12_16_094623_create_purpose_table', 11),
(80, '2019_12_18_084948_create_individual_table', 12),
(81, '2019_12_18_085551_create_individual_contact_table', 12),
(82, '2019_12_18_085855_create_individual_video_table', 12),
(83, '2019_12_18_090047_create_individual_personal_table', 12),
(84, '2019_12_18_095137_create_individual_study_table', 12),
(85, '2019_12_18_100629_create_individual_purposelist_table', 12),
(86, '2019_12_18_100918_create_individual_care_table', 12),
(87, '2019_12_18_101344_create_individual_welfare_table', 12),
(88, '2019_12_18_101514_create_individual_childern_table', 12),
(89, '2019_12_18_101836_create_individual_research_table', 12),
(90, '2019_12_18_102611_create_individual_project_table', 12),
(91, '2019_12_18_103600_create_individual_library_table', 12),
(92, '2019_12_20_075554_create_library_basic_table', 13),
(93, '2019_12_20_075732_create_library_contact_table', 13),
(97, '2019_12_21_052509_create_libraryips_table', 14),
(96, '2019_12_21_052435_create_librarylogin_table', 14),
(98, '2019_12_21_052522_create_libraryremoteips_table', 15),
(99, '2019_12_21_095956_create_orgpurpose_table', 16),
(100, '2019_12_21_113132_create_subscriptiontype_table', 17),
(101, '2019_12_23_050425_create_sunscription_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(0, 'App\\User', 10),
(1, 'App\\User', 1),
(1, 'App\\User', 134),
(1, 'App\\User', 135),
(1, 'App\\User', 136),
(2, 'App\\User', 9),
(2, 'App\\User', 97),
(2, 'App\\User', 98),
(2, 'App\\User', 99),
(2, 'App\\User', 100),
(2, 'App\\User', 101),
(2, 'App\\User', 102),
(2, 'App\\User', 103),
(2, 'App\\User', 104),
(2, 'App\\User', 105),
(2, 'App\\User', 106),
(2, 'App\\User', 107),
(2, 'App\\User', 108),
(2, 'App\\User', 109),
(2, 'App\\User', 110),
(2, 'App\\User', 111),
(2, 'App\\User', 112),
(2, 'App\\User', 113),
(2, 'App\\User', 114),
(2, 'App\\User', 115),
(2, 'App\\User', 116),
(2, 'App\\User', 117),
(2, 'App\\User', 118),
(2, 'App\\User', 119),
(2, 'App\\User', 120),
(2, 'App\\User', 121),
(2, 'App\\User', 123),
(2, 'App\\User', 124),
(2, 'App\\User', 125),
(2, 'App\\User', 126),
(2, 'App\\User', 127),
(2, 'App\\User', 132),
(2, 'App\\User', 133),
(3, 'App\\User', 5),
(3, 'App\\User', 7),
(4, 'App\\User', 3),
(4, 'App\\User', 6),
(4, 'App\\User', 8),
(5, 'App\\User', 2),
(5, 'App\\User', 13),
(5, 'App\\User', 64),
(6, 'App\\User', 65),
(8, 'App\\User', 122),
(9, 'App\\User', 56),
(14, 'App\\User', 11),
(14, 'App\\User', 12),
(14, 'App\\User', 15),
(14, 'App\\User', 48),
(14, 'App\\User', 49),
(14, 'App\\User', 50),
(14, 'App\\User', 51),
(14, 'App\\User', 52),
(14, 'App\\User', 66),
(14, 'App\\User', 91);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countrycode` int(11) NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faxnumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinnumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankaccount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urladdress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `googlemap` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`id`, `country`, `countrycode`, `city`, `office`, `tag`, `phonenumber`, `faxnumber`, `tinnumber`, `bankaccount`, `bankcode`, `address1`, `address2`, `address3`, `address4`, `address5`, `urladdress`, `email`, `googlemap`, `status`, `created_at`, `updated_at`) VALUES
(3, 'india', 91, 'noida', 'sixwebsoft', 'no', '9876543211', '98765432', '987654332', '878327387328', '9876', '63 noida', NULL, NULL, NULL, NULL, NULL, 'support@sixwebsoft.com', NULL, 1, '2019-12-14 08:00:51', NULL),
(4, 'india', 91, 'noida', 'test', 'no', '9876543211', '98765432', '987654332', '878327387328', '9876', '63 noida', NULL, NULL, NULL, NULL, NULL, 'support@sixwebsoft.com', NULL, 0, '2019-12-14 08:01:06', '2019-12-14 08:06:00'),
(5, 'testoffice', 91, 'noida', 'india office', 'tag test', 'mob: 9876543211', 'faxno; 9876543212', 'tin:87654326543', 'bank account:987654326543', 'bankcode:876543654', '63 noida', 'no', NULL, NULL, NULL, NULL, 'teat@gmail.com', NULL, 1, '2019-12-17 02:53:47', '2019-12-17 02:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `orgpurpose`
--

CREATE TABLE `orgpurpose` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orgid` int(11) NOT NULL,
  `purposeid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentmood`
--

CREATE TABLE `paymentmood` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paymentmethod` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daysnet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testaccount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testusername` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testpassword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testsignature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `liveaccount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `liveusername` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `livepassword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `livesignature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testmood` int(11) DEFAULT NULL,
  `otherpreferences` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paymentmood`
--

INSERT INTO `paymentmood` (`id`, `paymentmethod`, `daysnet`, `testaccount`, `testusername`, `testpassword`, `testsignature`, `liveaccount`, `liveusername`, `livepassword`, `livesignature`, `testmood`, `otherpreferences`, `status`, `created_at`, `updated_at`) VALUES
(14, 'test', '0', 'testaccount', NULL, NULL, NULL, 'live aacount', NULL, NULL, NULL, 0, '0', 1, '2019-12-14 08:21:43', '2019-12-16 02:54:25'),
(15, 'test2', '0', 'testaccount', NULL, NULL, NULL, 'live aacount', NULL, NULL, NULL, 1, '0', 1, '2019-12-14 08:22:07', '2019-12-16 03:02:51'),
(16, 'testpayment', '0', 'test@test.com', NULL, NULL, NULL, 'live@live.com', NULL, NULL, NULL, 0, '0', 0, '2019-12-17 02:58:21', '2019-12-17 02:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Foundation Abstract', 'web', '2019-06-29 04:04:48', '2019-07-12 05:14:32'),
(2, 'Foundation Full View', 'web', '2019-06-29 04:04:48', '2019-07-12 05:18:07'),
(3, 'Foundation Email', 'web', '2019-06-29 04:04:48', '2019-07-12 05:18:53'),
(4, 'Foundation Phone', 'web', '2019-06-29 04:04:48', '2019-07-12 05:19:20'),
(5, 'Foundation Address', 'web', '2019-07-12 05:20:02', '2019-07-12 05:20:02'),
(6, 'common_modules', 'web', '2019-07-13 05:26:21', '2019-07-13 05:26:21'),
(7, 'contact', 'web', '2019-07-16 00:59:50', '2019-07-16 00:59:50'),
(8, 'create', 'web', '2019-07-16 01:00:13', '2019-07-16 01:00:13'),
(9, 'edit', 'web', '2019-07-16 01:00:34', '2019-07-16 01:00:34'),
(10, 'delete', 'web', '2019-07-16 01:01:35', '2019-07-16 01:01:35'),
(11, 'TranslationController-create', 'web', '2019-07-16 01:01:58', '2019-07-16 01:01:58'),
(14, 'TranslationController-index', 'web', '2019-07-16 02:11:41', '2019-07-16 02:11:41'),
(17, 'TranslationController-edit', 'web', '2019-07-16 07:07:00', '2019-07-16 07:07:31'),
(18, 'TranslationController-delete', 'web', '2019-07-15 19:00:00', '2019-07-15 19:00:00'),
(73, 'foundation-view-contact', 'web', '2019-07-18 11:22:37', '2019-07-18 11:22:37'),
(74, 'foundation-view-contact-10', 'web', '2019-07-18 11:22:46', '2019-07-18 11:22:46'),
(75, 'no-subscriber-5', 'web', '2019-08-07 10:59:51', '2019-08-07 10:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `purpose`
--

CREATE TABLE `purpose` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purpose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `formid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hitlist` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autoproductid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coustomproductid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purposeid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `showseaechdesc1` int(11) DEFAULT NULL,
  `memberdescription1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `showmemberdesc1` int(11) DEFAULT NULL,
  `description2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `showseaechdesc2` int(11) DEFAULT NULL,
  `memberdescription2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `showmemberdesc2` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purpose`
--

INSERT INTO `purpose` (`id`, `purpose`, `formid`, `hitlist`, `autoproductid`, `coustomproductid`, `purposeid`, `description1`, `showseaechdesc1`, `memberdescription1`, `showmemberdesc1`, `description2`, `showseaechdesc2`, `memberdescription2`, `showmemberdesc2`, `created_at`, `updated_at`) VALUES
(1, 'travel', NULL, NULL, NULL, NULL, NULL, ' ', NULL, NULL, NULL, ' ', NULL, NULL, NULL, NULL, NULL),
(2, 'walfare', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(3, 'Photo', NULL, NULL, NULL, NULL, NULL, ' ', NULL, NULL, NULL, ' ', NULL, NULL, NULL, NULL, NULL),
(4, 'Health', NULL, NULL, NULL, NULL, NULL, ' ', NULL, NULL, NULL, ' ', NULL, NULL, NULL, NULL, NULL),
(6, 'Photo', '[\"1\",\"2\"]', '[\"2\"]', '2', '--Select--', '[\"3\",\"4\"]', 'engtest', 1, 'tesat', 1, 'tetstststs', 1, 'test', NULL, '2019-12-17 02:19:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'web', '/admin', '2019-07-02 02:20:53', '2019-07-15 02:23:16'),
(2, 'Office Admin', 'web', '', '2019-07-02 02:44:02', '2019-07-12 02:14:10'),
(3, 'Staff', 'web', '', '2019-07-02 02:44:32', '2019-07-12 02:18:00'),
(4, 'User00 - Anonymous user', 'web', '', '2019-07-02 02:45:03', '2019-07-12 02:18:36'),
(5, 'User10 - Registered Free User', 'web', '', '2019-07-12 02:21:06', '2019-07-12 02:21:06'),
(6, 'User11 - Upgraded Registered Free User', 'web', '', '2019-07-12 02:21:39', '2019-07-12 02:21:39'),
(7, 'User20 - Paid Individual User', 'web', '', '2019-07-12 02:22:11', '2019-07-12 02:22:11'),
(8, 'User30 - Library/University/Organization', 'web', '', '2019-07-12 02:22:39', '2019-07-12 02:22:39'),
(9, 'User40 - Paid Library/University/Organization', 'web', '', '2019-07-12 02:23:06', '2019-07-12 02:23:06'),
(10, 'User50 - Corporate Donors', 'web', '', '2019-07-12 02:23:45', '2019-07-12 02:23:45'),
(11, 'User60 - Individual Donors', 'web', '', '2019-07-12 02:24:14', '2019-07-12 02:24:14'),
(12, 'Orders Staff', 'web', '', '2019-07-12 02:24:54', '2019-07-12 02:24:54'),
(13, 'Subscritions Staff', 'web', '', '2019-07-12 02:25:27', '2019-07-12 02:25:27'),
(14, 'developer', 'web', '/admin', '2019-07-13 05:27:19', '2019-07-16 01:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 16),
(2, 1),
(2, 2),
(2, 3),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(3, 1),
(3, 2),
(3, 3),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(4, 1),
(4, 2),
(4, 3),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(4, 14),
(5, 1),
(5, 14),
(5, 15),
(6, 1),
(6, 14),
(6, 15),
(7, 14),
(8, 14),
(9, 14),
(10, 14),
(11, 14),
(14, 14),
(17, 14),
(18, 14),
(73, 1),
(73, 14),
(74, 4),
(74, 14),
(75, 4),
(75, 14);

-- --------------------------------------------------------

--
-- Table structure for table `sproduct`
--

CREATE TABLE `sproduct` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `languageid` int(11) NOT NULL,
  `officeid` int(11) NOT NULL,
  `typeid` int(11) NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `subscription` int(11) DEFAULT NULL,
  `display` int(11) DEFAULT NULL,
  `paymentmood` int(11) DEFAULT NULL,
  `discountlabel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discountamount` double(8,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `vatlabel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vatamount` double(8,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `freightlabel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `freightamount` double(8,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `freighttaxlabel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `freighttax` double(8,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `totalprice` double(8,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sproduct`
--

INSERT INTO `sproduct` (`id`, `productname`, `languageid`, `officeid`, `typeid`, `category`, `currency`, `price`, `subscription`, `display`, `paymentmood`, `discountlabel`, `discountamount`, `vatlabel`, `vatamount`, `freightlabel`, `freightamount`, `freighttaxlabel`, `freighttax`, `totalprice`, `description`, `created_at`, `updated_at`) VALUES
(1, 'test12', 3, 3, 1, NULL, 'SEK', 1000.00, 0, 0, 14, 'testss', 10.00, 'assana', 22.00, 'jsjs', 120.00, 'swqqwwq', 10.00, 1364.20, 'this is data', '2019-12-14 08:44:30', '2019-12-16 03:06:09'),
(2, 'mytest', 2, 3, 3, NULL, 'SEK', 2000.00, NULL, 0, 15, 'testss', 100.00, 'assana', 10.00, 'jsjs', 100.00, 'swqqwwq', 12.00, 100.00, 'test', '2019-12-16 05:39:49', NULL),
(3, 'testup', 2, 5, 1, NULL, 'SEK', 10000.00, NULL, 0, 14, 'testss', 100.00, NULL, 10.00, 'jsjs', 100.00, 'swqqwwq', 10.00, 100.00, 'testing data', '2019-12-17 03:02:32', '2019-12-17 03:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptiontype`
--

CREATE TABLE `subscriptiontype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` int(11) NOT NULL,
  `misc` int(11) NOT NULL,
  `vat` int(11) NOT NULL,
  `frieghtcharge` int(11) NOT NULL,
  `frieghttax` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `eng_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eng_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sven_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sven_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptiontype`
--

INSERT INTO `subscriptiontype` (`id`, `usertype`, `duration`, `price`, `currency`, `display`, `misc`, `vat`, `frieghtcharge`, `frieghttax`, `totalprice`, `eng_name`, `eng_desc`, `sven_name`, `sven_desc`, `created_at`, `updated_at`) VALUES
(5, 'IND', 1, 1000, 'SEK', 1, 100, 10, 100, 10, 1320, 'tets', NULL, 'tests', NULL, '2019-12-22 23:06:46', NULL),
(6, 'IND', 1, 2000, 'SEK', 1, 200, 10, 200, 10, 2640, 'tets', NULL, 'tests', NULL, '2019-12-22 23:06:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sunscription`
--

CREATE TABLE `sunscription` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscriptionid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `paymentmood` int(11) DEFAULT NULL,
  `paymentstatus` int(11) DEFAULT NULL,
  `subscriptionnote` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `misc` int(11) DEFAULT NULL,
  `vat` int(11) DEFAULT NULL,
  `freightcost` int(11) DEFAULT NULL,
  `freighttax` int(11) DEFAULT NULL,
  `totalprice` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateofbirth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `availability` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `streetaddress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `librarycity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `librarycard` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `librarynumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studymajor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `startdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enddate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `govtsupport` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `userid`, `fname`, `mname`, `lname`, `age`, `dateofbirth`, `language`, `availability`, `streetaddress`, `zipcode`, `country`, `personal`, `mobile`, `phone`, `librarycity`, `librarycard`, `librarynumber`, `comment`, `purpose`, `studymajor`, `degree`, `school`, `location`, `startdate`, `enddate`, `govtsupport`, `created_at`, `updated_at`) VALUES
(8, 56, 'vikash', 'test', 'sharma', '24', '1994-04-24', 'svenska', '12', 'noida sector 63', '201301', 'one', 'tetsts personal', '9876543211', '0987654321', 'one', '876543', 'svenska', 'test', 'one', 'major study up', 'degree up', 'school up', 'lotion up', '2019-11-07', '2019-10-12', 'no', NULL, NULL),
(12, 65, 'testt', 'testttttt', 'role', '24', '2019-12-10', 'svenska', '12', 'sasassas', 'ssaassa', 'one', 'ssaas', 'sasasa', 'ssss', 'one', '65432543', 'svenska', 'ssasasasasa', 'one', 'ssasasa', 'sass', 'sss', 'cccc', '2019-11-30', '2019-12-24', 'yes', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 0,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin123', 'admin@test.globalgrant.com', NULL, '$2y$10$cjFD9aM8H8kM9QObetNUUu3Wkxtp9XAnJ/Vt2rkz9HJhx7wIOzO52', 1, '', 'cn02IxWo3w8OAvpb4eCFY2eHhcVxoRFIHZvvXwcmfmpcTKOX94BWUjWx4x3k', '2019-06-28 22:34:47', '2019-06-28 22:34:47'),
(2, 'nadeem', 'free@gmail.com', NULL, '$2y$10$K/WpgYMlexExqe8bsQUno.V9X8j0nMhahrJwAIb2R0IxGMvGA4W6S', 1, '', NULL, '2019-07-01 21:02:48', '2019-07-14 20:55:17'),
(12, 'developer', 'dev.tecnotch@gmail.com', NULL, '$2y$10$XXLcSdr1BE4pqoCcSw8Am.7Z6mjt/hkVzFYMSE5abVsuNZUV2bBP6', 1, '', 'GyROi638cpsrQXix4eqQKOup3q09kXdPXlEZ5i9nIKG89APyiC2fJ3fh7D0t', '2019-07-13 00:32:00', '2019-07-17 02:22:27'),
(122, 'vikashu sharmauu', 'viktor122@sixwebsoft.com', NULL, '04/24/1994', 1, 'IND', NULL, '2019-12-23 04:58:43', '2019-12-23 06:04:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gg_cms_pages`
--
ALTER TABLE `gg_cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gg_donors`
--
ALTER TABLE `gg_donors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gg_donors_email_unique` (`email`);

--
-- Indexes for table `gg_foundation`
--
ALTER TABLE `gg_foundation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gg_foundation_advertise`
--
ALTER TABLE `gg_foundation_advertise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gg_foundation_advertise_foundation_id_foreign` (`foundation_id`);

--
-- Indexes for table `gg_foundation_age`
--
ALTER TABLE `gg_foundation_age`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gg_foundation_age_foundation_id_foreign` (`foundation_id`);

--
-- Indexes for table `gg_foundation_application`
--
ALTER TABLE `gg_foundation_application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gg_foundation_application_foundation_id_foreign` (`foundation_id`);

--
-- Indexes for table `gg_foundation_contact`
--
ALTER TABLE `gg_foundation_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gg_foundation_contact_foundation_id_foreign` (`foundation_id`);

--
-- Indexes for table `gg_foundation_dates`
--
ALTER TABLE `gg_foundation_dates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gg_foundation_dates_foundation_id_foreign` (`foundation_id`);

--
-- Indexes for table `gg_foundation_gender`
--
ALTER TABLE `gg_foundation_gender`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gg_foundation_gender_foundation_id_foreign` (`foundation_id`);

--
-- Indexes for table `gg_foundation_instructions`
--
ALTER TABLE `gg_foundation_instructions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gg_foundation_instructions_foundation_id_foreign` (`foundation_id`);

--
-- Indexes for table `gg_foundation_location`
--
ALTER TABLE `gg_foundation_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gg_foundation_location_foundation_id_foreign` (`foundation_id`);

--
-- Indexes for table `gg_foundation_purpose`
--
ALTER TABLE `gg_foundation_purpose`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gg_foundation_purpose_foundation_id_foreign` (`foundation_id`);

--
-- Indexes for table `gg_foundation_save_count`
--
ALTER TABLE `gg_foundation_save_count`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gg_foundation_save_count_foundation_id_foreign` (`foundation_id`);

--
-- Indexes for table `gg_foundation_subject`
--
ALTER TABLE `gg_foundation_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gg_foundation_subject_foundation_id_foreign` (`foundation_id`);

--
-- Indexes for table `gg_labels`
--
ALTER TABLE `gg_labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gg_label_translations`
--
ALTER TABLE `gg_label_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gg_languages`
--
ALTER TABLE `gg_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gg_modules`
--
ALTER TABLE `gg_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gg_module_fields`
--
ALTER TABLE `gg_module_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gg_module_fields_values`
--
ALTER TABLE `gg_module_fields_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gg_page_blocks`
--
ALTER TABLE `gg_page_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gg_page_meta`
--
ALTER TABLE `gg_page_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gg_page_translation`
--
ALTER TABLE `gg_page_translation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gg_search_count`
--
ALTER TABLE `gg_search_count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gg_settings`
--
ALTER TABLE `gg_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gg_subscription`
--
ALTER TABLE `gg_subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gg_translations`
--
ALTER TABLE `gg_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gg_user_search_save`
--
ALTER TABLE `gg_user_search_save`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gg_user_subscriptions`
--
ALTER TABLE `gg_user_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hitlist`
--
ALTER TABLE `hitlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual`
--
ALTER TABLE `individual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual_care`
--
ALTER TABLE `individual_care`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual_childern`
--
ALTER TABLE `individual_childern`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual_contact`
--
ALTER TABLE `individual_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual_library`
--
ALTER TABLE `individual_library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual_personal`
--
ALTER TABLE `individual_personal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual_project`
--
ALTER TABLE `individual_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual_purposelist`
--
ALTER TABLE `individual_purposelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual_research`
--
ALTER TABLE `individual_research`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual_study`
--
ALTER TABLE `individual_study`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual_video`
--
ALTER TABLE `individual_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual_welfare`
--
ALTER TABLE `individual_welfare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libraryips`
--
ALTER TABLE `libraryips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarylogin`
--
ALTER TABLE `librarylogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libraryremoteips`
--
ALTER TABLE `libraryremoteips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_basic`
--
ALTER TABLE `library_basic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_contact`
--
ALTER TABLE `library_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orgpurpose`
--
ALTER TABLE `orgpurpose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paymentmood`
--
ALTER TABLE `paymentmood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purpose`
--
ALTER TABLE `purpose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sproduct`
--
ALTER TABLE `sproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptiontype`
--
ALTER TABLE `subscriptiontype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sunscription`
--
ALTER TABLE `sunscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gg_cms_pages`
--
ALTER TABLE `gg_cms_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `gg_donors`
--
ALTER TABLE `gg_donors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gg_foundation`
--
ALTER TABLE `gg_foundation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5731;

--
-- AUTO_INCREMENT for table `gg_foundation_advertise`
--
ALTER TABLE `gg_foundation_advertise`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gg_foundation_age`
--
ALTER TABLE `gg_foundation_age`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gg_foundation_application`
--
ALTER TABLE `gg_foundation_application`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gg_foundation_contact`
--
ALTER TABLE `gg_foundation_contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gg_foundation_dates`
--
ALTER TABLE `gg_foundation_dates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gg_foundation_gender`
--
ALTER TABLE `gg_foundation_gender`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gg_foundation_instructions`
--
ALTER TABLE `gg_foundation_instructions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gg_foundation_location`
--
ALTER TABLE `gg_foundation_location`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gg_foundation_purpose`
--
ALTER TABLE `gg_foundation_purpose`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gg_foundation_save_count`
--
ALTER TABLE `gg_foundation_save_count`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gg_foundation_subject`
--
ALTER TABLE `gg_foundation_subject`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gg_labels`
--
ALTER TABLE `gg_labels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1484;

--
-- AUTO_INCREMENT for table `gg_label_translations`
--
ALTER TABLE `gg_label_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gg_languages`
--
ALTER TABLE `gg_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gg_modules`
--
ALTER TABLE `gg_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gg_module_fields`
--
ALTER TABLE `gg_module_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gg_module_fields_values`
--
ALTER TABLE `gg_module_fields_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gg_page_blocks`
--
ALTER TABLE `gg_page_blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `gg_page_meta`
--
ALTER TABLE `gg_page_meta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `gg_page_translation`
--
ALTER TABLE `gg_page_translation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `gg_search_count`
--
ALTER TABLE `gg_search_count`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `gg_settings`
--
ALTER TABLE `gg_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gg_subscription`
--
ALTER TABLE `gg_subscription`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gg_translations`
--
ALTER TABLE `gg_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gg_user_search_save`
--
ALTER TABLE `gg_user_search_save`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `gg_user_subscriptions`
--
ALTER TABLE `gg_user_subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hitlist`
--
ALTER TABLE `hitlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `individual`
--
ALTER TABLE `individual`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `individual_care`
--
ALTER TABLE `individual_care`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `individual_childern`
--
ALTER TABLE `individual_childern`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `individual_contact`
--
ALTER TABLE `individual_contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `individual_library`
--
ALTER TABLE `individual_library`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `individual_personal`
--
ALTER TABLE `individual_personal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `individual_project`
--
ALTER TABLE `individual_project`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `individual_purposelist`
--
ALTER TABLE `individual_purposelist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `individual_research`
--
ALTER TABLE `individual_research`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `individual_study`
--
ALTER TABLE `individual_study`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `individual_video`
--
ALTER TABLE `individual_video`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `individual_welfare`
--
ALTER TABLE `individual_welfare`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `libraryips`
--
ALTER TABLE `libraryips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `librarylogin`
--
ALTER TABLE `librarylogin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `libraryremoteips`
--
ALTER TABLE `libraryremoteips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `library_basic`
--
ALTER TABLE `library_basic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `library_contact`
--
ALTER TABLE `library_contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orgpurpose`
--
ALTER TABLE `orgpurpose`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paymentmood`
--
ALTER TABLE `paymentmood`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `purpose`
--
ALTER TABLE `purpose`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sproduct`
--
ALTER TABLE `sproduct`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscriptiontype`
--
ALTER TABLE `subscriptiontype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sunscription`
--
ALTER TABLE `sunscription`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gg_foundation_advertise`
--
ALTER TABLE `gg_foundation_advertise`
  ADD CONSTRAINT `gg_foundation_advertise_foundation_id_foreign` FOREIGN KEY (`foundation_id`) REFERENCES `gg_foundation` (`id`);

--
-- Constraints for table `gg_foundation_age`
--
ALTER TABLE `gg_foundation_age`
  ADD CONSTRAINT `gg_foundation_age_foundation_id_foreign` FOREIGN KEY (`foundation_id`) REFERENCES `gg_foundation` (`id`);

--
-- Constraints for table `gg_foundation_application`
--
ALTER TABLE `gg_foundation_application`
  ADD CONSTRAINT `gg_foundation_application_foundation_id_foreign` FOREIGN KEY (`foundation_id`) REFERENCES `gg_foundation` (`id`);

--
-- Constraints for table `gg_foundation_contact`
--
ALTER TABLE `gg_foundation_contact`
  ADD CONSTRAINT `gg_foundation_contact_foundation_id_foreign` FOREIGN KEY (`foundation_id`) REFERENCES `gg_foundation` (`id`);

--
-- Constraints for table `gg_foundation_dates`
--
ALTER TABLE `gg_foundation_dates`
  ADD CONSTRAINT `gg_foundation_dates_foundation_id_foreign` FOREIGN KEY (`foundation_id`) REFERENCES `gg_foundation` (`id`);

--
-- Constraints for table `gg_foundation_gender`
--
ALTER TABLE `gg_foundation_gender`
  ADD CONSTRAINT `gg_foundation_gender_foundation_id_foreign` FOREIGN KEY (`foundation_id`) REFERENCES `gg_foundation` (`id`);

--
-- Constraints for table `gg_foundation_instructions`
--
ALTER TABLE `gg_foundation_instructions`
  ADD CONSTRAINT `gg_foundation_instructions_foundation_id_foreign` FOREIGN KEY (`foundation_id`) REFERENCES `gg_foundation` (`id`);

--
-- Constraints for table `gg_foundation_location`
--
ALTER TABLE `gg_foundation_location`
  ADD CONSTRAINT `gg_foundation_location_foundation_id_foreign` FOREIGN KEY (`foundation_id`) REFERENCES `gg_foundation` (`id`);

--
-- Constraints for table `gg_foundation_purpose`
--
ALTER TABLE `gg_foundation_purpose`
  ADD CONSTRAINT `gg_foundation_purpose_foundation_id_foreign` FOREIGN KEY (`foundation_id`) REFERENCES `gg_foundation` (`id`);

--
-- Constraints for table `gg_foundation_save_count`
--
ALTER TABLE `gg_foundation_save_count`
  ADD CONSTRAINT `gg_foundation_save_count_foundation_id_foreign` FOREIGN KEY (`foundation_id`) REFERENCES `gg_foundation` (`id`);

--
-- Constraints for table `gg_foundation_subject`
--
ALTER TABLE `gg_foundation_subject`
  ADD CONSTRAINT `gg_foundation_subject_foundation_id_foreign` FOREIGN KEY (`foundation_id`) REFERENCES `gg_foundation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
