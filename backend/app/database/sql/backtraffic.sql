-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2013 at 05:37 PM
-- Server version: 5.5.31
-- PHP Version: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `backtraffic`
--

-- --------------------------------------------------------

--
-- Table structure for table `back_sessions`
--

CREATE TABLE IF NOT EXISTS `back_sessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `redirect` tinyint(1) NOT NULL,
  `date` int(11) NOT NULL,
  `website_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `back_sessions_website_id_foreign` (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE IF NOT EXISTS `campaigns` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `website_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `landing_page_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `campaigns_user_id_foreign` (`user_id`),
  KEY `campaigns_website_id_foreign` (`website_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `user_id`, `website_id`, `name`, `landing_page_url`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Happy feet developer promotion', 'http://krabjiem.lv/?ladingpage=1', 0, '2013-10-23 11:36:08', '2013-10-23 11:36:08'),
(2, 2, 1, 'We love unicorns union', 'http://krabjiem.lv/?ladingpage=2', 0, '2013-10-23 11:36:08', '2013-10-23 11:36:08'),
(3, 2, 2, 'Possibly the best campaign...', 'http://krabjiem.lv/?ladingpage=3', 0, '2013-10-23 11:36:08', '2013-10-23 11:36:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2013_10_03_142452_initial', 1),
('2013_10_17_143341_website_stats', 1),
('2013_10_18_144327_raw_table_status', 1),
('2013_10_23_130817_back_sessions', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reminders`
--

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `raw_campaign_impressions_2013_10_23`
--

CREATE TABLE IF NOT EXISTS `raw_campaign_impressions_2013_10_23` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `uid` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ip` bigint(20) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `raw_campaign_impressions_2013_10_23_campaign_id_foreign` (`campaign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raw_campaign_impressions_2013_10_24`
--

CREATE TABLE IF NOT EXISTS `raw_campaign_impressions_2013_10_24` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `uid` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ip` bigint(20) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `raw_campaign_impressions_2013_10_24_campaign_id_foreign` (`campaign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raw_campaign_impressions_2013_10_25`
--

CREATE TABLE IF NOT EXISTS `raw_campaign_impressions_2013_10_25` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `uid` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ip` bigint(20) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `raw_campaign_impressions_2013_10_25_campaign_id_foreign` (`campaign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raw_campaign_leads_2013_10_23`
--

CREATE TABLE IF NOT EXISTS `raw_campaign_leads_2013_10_23` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `uid` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ip` bigint(20) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `raw_campaign_leads_2013_10_23_campaign_id_foreign` (`campaign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raw_campaign_leads_2013_10_24`
--

CREATE TABLE IF NOT EXISTS `raw_campaign_leads_2013_10_24` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `uid` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ip` bigint(20) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `raw_campaign_leads_2013_10_24_campaign_id_foreign` (`campaign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raw_campaign_leads_2013_10_25`
--

CREATE TABLE IF NOT EXISTS `raw_campaign_leads_2013_10_25` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `uid` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ip` bigint(20) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `raw_campaign_leads_2013_10_25_campaign_id_foreign` (`campaign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raw_table_status`
--

CREATE TABLE IF NOT EXISTS `raw_table_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `raw_table_status`
--

INSERT INTO `raw_table_status` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'raw_campaign_leads_2013_10_23', 0, '2013-10-23 11:36:33', '2013-10-23 11:36:33'),
(2, 'raw_campaign_impressions_2013_10_23', 0, '2013-10-23 11:36:33', '2013-10-23 11:36:33'),
(3, 'raw_website_visits_2013_10_23', 0, '2013-10-23 11:36:33', '2013-10-23 11:36:33'),
(4, 'raw_website_bounces_2013_10_23', 0, '2013-10-23 11:36:33', '2013-10-23 11:36:33'),
(5, 'raw_campaign_leads_2013_10_24', 0, '2013-10-23 11:36:33', '2013-10-23 11:36:33'),
(6, 'raw_campaign_impressions_2013_10_24', 0, '2013-10-23 11:36:33', '2013-10-23 11:36:33'),
(7, 'raw_website_visits_2013_10_24', 0, '2013-10-23 11:36:33', '2013-10-23 11:36:33'),
(8, 'raw_website_bounces_2013_10_24', 0, '2013-10-23 11:36:33', '2013-10-23 11:36:33'),
(9, 'raw_campaign_leads_2013_10_25', 0, '2013-10-23 11:36:33', '2013-10-23 11:36:33'),
(10, 'raw_campaign_impressions_2013_10_25', 0, '2013-10-23 11:36:33', '2013-10-23 11:36:33'),
(11, 'raw_website_visits_2013_10_25', 0, '2013-10-23 11:36:33', '2013-10-23 11:36:33'),
(12, 'raw_website_bounces_2013_10_25', 0, '2013-10-23 11:36:33', '2013-10-23 11:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `raw_website_bounces_2013_10_23`
--

CREATE TABLE IF NOT EXISTS `raw_website_bounces_2013_10_23` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `website_id` int(10) unsigned NOT NULL,
  `uid` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `referrer` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ip` bigint(20) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `raw_website_bounces_2013_10_23_website_id_foreign` (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raw_website_bounces_2013_10_24`
--

CREATE TABLE IF NOT EXISTS `raw_website_bounces_2013_10_24` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `website_id` int(10) unsigned NOT NULL,
  `uid` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `referrer` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ip` bigint(20) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `raw_website_bounces_2013_10_24_website_id_foreign` (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raw_website_bounces_2013_10_25`
--

CREATE TABLE IF NOT EXISTS `raw_website_bounces_2013_10_25` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `website_id` int(10) unsigned NOT NULL,
  `uid` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `referrer` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ip` bigint(20) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `raw_website_bounces_2013_10_25_website_id_foreign` (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raw_website_visits_2013_10_23`
--

CREATE TABLE IF NOT EXISTS `raw_website_visits_2013_10_23` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `website_id` int(10) unsigned NOT NULL,
  `uid` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ip` bigint(20) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `raw_website_visits_2013_10_23_website_id_foreign` (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raw_website_visits_2013_10_24`
--

CREATE TABLE IF NOT EXISTS `raw_website_visits_2013_10_24` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `website_id` int(10) unsigned NOT NULL,
  `uid` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ip` bigint(20) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `raw_website_visits_2013_10_24_website_id_foreign` (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raw_website_visits_2013_10_25`
--

CREATE TABLE IF NOT EXISTS `raw_website_visits_2013_10_25` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `website_id` int(10) unsigned NOT NULL,
  `uid` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ip` bigint(20) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `raw_website_visits_2013_10_25_website_id_foreign` (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stats_campaign_impressions_daily`
--

CREATE TABLE IF NOT EXISTS `stats_campaign_impressions_daily` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `impressions` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `stats_campaign_impressions_daily_campaign_id_foreign` (`campaign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stats_campaign_impressions_monthly`
--

CREATE TABLE IF NOT EXISTS `stats_campaign_impressions_monthly` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `impressions` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `stats_campaign_impressions_monthly_campaign_id_foreign` (`campaign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stats_campaign_leads_daily`
--

CREATE TABLE IF NOT EXISTS `stats_campaign_leads_daily` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `leads` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `stats_campaign_leads_daily_campaign_id_foreign` (`campaign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stats_campaign_leads_monthly`
--

CREATE TABLE IF NOT EXISTS `stats_campaign_leads_monthly` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `leads` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `stats_campaign_leads_monthly_campaign_id_foreign` (`campaign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stats_website_bounces_daily`
--

CREATE TABLE IF NOT EXISTS `stats_website_bounces_daily` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `website_id` int(10) unsigned NOT NULL,
  `bounces` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `stats_website_bounces_daily_website_id_foreign` (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stats_website_bounces_monthly`
--

CREATE TABLE IF NOT EXISTS `stats_website_bounces_monthly` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `website_id` int(10) unsigned NOT NULL,
  `bounces` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `stats_website_bounces_monthly_website_id_foreign` (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stats_website_visits_daily`
--

CREATE TABLE IF NOT EXISTS `stats_website_visits_daily` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `website_id` int(10) unsigned NOT NULL,
  `visits` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `stats_website_visits_daily_website_id_foreign` (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stats_website_visits_monthly`
--

CREATE TABLE IF NOT EXISTS `stats_website_visits_monthly` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `website_id` int(10) unsigned NOT NULL,
  `visits` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `stats_website_visits_monthly_website_id_foreign` (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `confirmation_code`, `admin`, `status`, `comment`, `confirmed`, `created_at`, `updated_at`) VALUES
(1, 'Super admin', 'admin@example.com', '$2y$08$dy33CmruJ.cJQOxsTyjqgOUuC6.O6gm4MnQ0O2K/vuZ2oTnjNDqrC', '3b53955fb92cb6b94c45668d0a96799d', 1, 1, '', 1, '2013-10-23 11:36:08', '2013-10-23 11:36:08'),
(2, 'Name Surname', 'partner@example.com', '$2y$08$EK/siBPS5LukyBShnmKtVOBJHlZhbgo7RdKTDphA2z0bfwwCn34jW', '7d37c22cd5b2337e1c81c2ea2f9ede99', 0, 1, '', 1, '2013-10-23 11:36:08', '2013-10-23 11:36:08');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE IF NOT EXISTS `websites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `websites_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `user_id`, `url`, `created_at`, `updated_at`) VALUES
(1, 2, 'http://www.webpage.com', '2013-10-23 11:36:08', '2013-10-23 11:36:08'),
(2, 2, 'http://www.my-store.com', '2013-10-23 11:36:08', '2013-10-23 11:36:08');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `back_sessions`
--
ALTER TABLE `back_sessions`
  ADD CONSTRAINT `back_sessions_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD CONSTRAINT `campaigns_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `campaigns_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `raw_campaign_impressions_2013_10_23`
--
ALTER TABLE `raw_campaign_impressions_2013_10_23`
  ADD CONSTRAINT `raw_campaign_impressions_2013_10_23_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `raw_campaign_impressions_2013_10_24`
--
ALTER TABLE `raw_campaign_impressions_2013_10_24`
  ADD CONSTRAINT `raw_campaign_impressions_2013_10_24_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `raw_campaign_impressions_2013_10_25`
--
ALTER TABLE `raw_campaign_impressions_2013_10_25`
  ADD CONSTRAINT `raw_campaign_impressions_2013_10_25_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `raw_campaign_leads_2013_10_23`
--
ALTER TABLE `raw_campaign_leads_2013_10_23`
  ADD CONSTRAINT `raw_campaign_leads_2013_10_23_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `raw_campaign_leads_2013_10_24`
--
ALTER TABLE `raw_campaign_leads_2013_10_24`
  ADD CONSTRAINT `raw_campaign_leads_2013_10_24_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `raw_campaign_leads_2013_10_25`
--
ALTER TABLE `raw_campaign_leads_2013_10_25`
  ADD CONSTRAINT `raw_campaign_leads_2013_10_25_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `raw_website_bounces_2013_10_23`
--
ALTER TABLE `raw_website_bounces_2013_10_23`
  ADD CONSTRAINT `raw_website_bounces_2013_10_23_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `raw_website_bounces_2013_10_24`
--
ALTER TABLE `raw_website_bounces_2013_10_24`
  ADD CONSTRAINT `raw_website_bounces_2013_10_24_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `raw_website_bounces_2013_10_25`
--
ALTER TABLE `raw_website_bounces_2013_10_25`
  ADD CONSTRAINT `raw_website_bounces_2013_10_25_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `raw_website_visits_2013_10_23`
--
ALTER TABLE `raw_website_visits_2013_10_23`
  ADD CONSTRAINT `raw_website_visits_2013_10_23_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `raw_website_visits_2013_10_24`
--
ALTER TABLE `raw_website_visits_2013_10_24`
  ADD CONSTRAINT `raw_website_visits_2013_10_24_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `raw_website_visits_2013_10_25`
--
ALTER TABLE `raw_website_visits_2013_10_25`
  ADD CONSTRAINT `raw_website_visits_2013_10_25_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stats_campaign_impressions_daily`
--
ALTER TABLE `stats_campaign_impressions_daily`
  ADD CONSTRAINT `stats_campaign_impressions_daily_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stats_campaign_impressions_monthly`
--
ALTER TABLE `stats_campaign_impressions_monthly`
  ADD CONSTRAINT `stats_campaign_impressions_monthly_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stats_campaign_leads_daily`
--
ALTER TABLE `stats_campaign_leads_daily`
  ADD CONSTRAINT `stats_campaign_leads_daily_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stats_campaign_leads_monthly`
--
ALTER TABLE `stats_campaign_leads_monthly`
  ADD CONSTRAINT `stats_campaign_leads_monthly_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stats_website_bounces_daily`
--
ALTER TABLE `stats_website_bounces_daily`
  ADD CONSTRAINT `stats_website_bounces_daily_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stats_website_bounces_monthly`
--
ALTER TABLE `stats_website_bounces_monthly`
  ADD CONSTRAINT `stats_website_bounces_monthly_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stats_website_visits_daily`
--
ALTER TABLE `stats_website_visits_daily`
  ADD CONSTRAINT `stats_website_visits_daily_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stats_website_visits_monthly`
--
ALTER TABLE `stats_website_visits_monthly`
  ADD CONSTRAINT `stats_website_visits_monthly_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `websites`
--
ALTER TABLE `websites`
  ADD CONSTRAINT `websites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
