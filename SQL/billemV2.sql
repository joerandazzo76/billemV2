-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2018 at 03:33 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.1.12-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billemV2`
--

-- --------------------------------------------------------

--
-- Table structure for table `domain`
--

CREATE TABLE `domain` (
  `iddomain` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `rocketGateMerchantId` varchar(45) DEFAULT NULL,
  `rocketGateMerchantPasword` varchar(45) DEFAULT NULL,
  `camRID` varchar(45) DEFAULT NULL,
  `midName` varchar(45) DEFAULT NULL,
  `midPhoneNumber` varchar(45) DEFAULT NULL,
  `emailFrom` varchar(45) DEFAULT NULL,
  `emailHost` varchar(45) DEFAULT NULL,
  `emailUserName` varchar(45) DEFAULT NULL,
  `emailPassword` varchar(45) DEFAULT NULL,
  `emailCC` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `domain`
--

INSERT INTO `domain` (`iddomain`, `name`, `rocketGateMerchantId`, `rocketGateMerchantPasword`, `camRID`, `midName`, `midPhoneNumber`, `emailFrom`, `emailHost`, `emailUserName`, `emailPassword`, `emailCC`, `timestamp`) VALUES
(3, 'Hitpink', '1493236069', 'ZrRCaXTxpLmqAJDy', '9718', 'dt-bill.com', '844-294-2224', 'receipt@alerts.hitpink.com', 'smtp.mailgun.org', 'postmaster@alerts.hitpink.com', '3da509a3ccc2ff68803', 'jason@moneylovers.com', '2018-01-09 19:35:07'),
(4, 'swipequickie', '1505824765', 'RQ6VHRCaxuAFCErp', '9719', 'web-bill.com', '844-307-0499', 'receipt@alerts.swipequickie.com', 'smtp.mailgun.org', 'postmaster@alerts.swipequickie.com', '3da509a3ccc2ff68803', 'jason@moneylovers.com', '2018-01-09 21:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `idlog` int(10) UNSIGNED NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `responseCode` varchar(45) DEFAULT NULL,
  `reasonCode` varchar(45) DEFAULT NULL,
  `authNumber` varchar(45) DEFAULT NULL,
  `avs` varchar(45) DEFAULT NULL,
  `cvv2` varchar(45) DEFAULT NULL,
  `guid` varchar(45) DEFAULT NULL,
  `cardIssuer` varchar(45) DEFAULT NULL,
  `account` varchar(45) DEFAULT NULL,
  `scrub` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `idoffer` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  `rebillStart` varchar(45) DEFAULT NULL,
  `rebillAmount` varchar(45) DEFAULT NULL,
  `rebillFrequency` varchar(45) DEFAULT NULL,
  `transactionType` varchar(45) DEFAULT NULL,
  `var1` varchar(45) DEFAULT NULL,
  `var2` varchar(45) DEFAULT NULL,
  `var3` varchar(45) DEFAULT NULL,
  `postbackSuccess` varchar(45) DEFAULT NULL,
  `postbackFail` varchar(45) DEFAULT NULL,
  `package_idpackage` int(10) UNSIGNED NOT NULL,
  `scrub` varchar(45) DEFAULT NULL,
  `cvv2Check` varchar(45) DEFAULT NULL,
  `avsCheck` varchar(45) DEFAULT NULL,
  `makePurchase` varchar(20) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='		';

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`idoffer`, `name`, `amount`, `rebillStart`, `rebillAmount`, `rebillFrequency`, `transactionType`, `var1`, `var2`, `var3`, `postbackSuccess`, `postbackFail`, `package_idpackage`, `scrub`, `cvv2Check`, `avsCheck`, `makePurchase`, `timestamp`) VALUES
(1, 'Dating', '30.00', '1', '30.00', 'Monthly', 'Purchase', 'var1', 'var2', 'var3', 'dating signup url goes here', '', 1, 'false', 'false', 'false', '1', '2018-01-10 14:02:55'),
(2, 'Cams', '29.95', '1', '29.95', 'monthly', 'Purchase', 'var1', 'var2', 'var3', '', '', 1, 'false', 'false', 'false', '0', '2018-01-12 15:11:12'),
(3, 'Temp', '15.95', '1', '15.95', 'Monthly', 'AuthOnly', '', '', '', '', '', 1, '', 'true', 'false', '1', '2018-01-16 11:24:01'),
(4, 'trem package2 offer 1', '', '', '', '', '', '', '', '', '', '', 4, NULL, '', '', '', '2018-01-16 14:04:05');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `idpackage` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `postbackSuccess` varchar(45) DEFAULT NULL,
  `postbackFail` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `domain_iddomain` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`idpackage`, `name`, `postbackSuccess`, `postbackFail`, `timestamp`, `domain_iddomain`) VALUES
(1, 'HitPink - Package 1', '', '', '2018-01-12 15:52:33', 3),
(2, 'UrbanMeetup - Package 1', '', '', '2018-01-12 15:52:42', 4),
(4, 'HitPink - Package 2', '', '', '2018-01-16 12:25:44', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rocketgateResponse`
--

CREATE TABLE `rocketgateResponse` (
  `idresponse` int(10) UNSIGNED NOT NULL,
  `authNo` varchar(45) DEFAULT NULL,
  `merchantInvoiceID` varchar(45) DEFAULT NULL,
  `merchantAccount` varchar(45) DEFAULT NULL,
  `approvedAmount` varchar(45) DEFAULT NULL,
  `cardLastFour` varchar(45) DEFAULT NULL,
  `version` varchar(45) DEFAULT NULL,
  `merchantCustomerID` varchar(45) DEFAULT NULL,
  `reasonCode` varchar(45) DEFAULT NULL,
  `retrievalNo` varchar(45) DEFAULT NULL,
  `cardIssuerName` varchar(45) DEFAULT NULL,
  `payType` varchar(45) DEFAULT NULL,
  `cardHash` varchar(45) DEFAULT NULL,
  `cardDebitCredit` varchar(45) DEFAULT NULL,
  `cardRegion` varchar(45) DEFAULT NULL,
  `cardDescription` varchar(45) DEFAULT NULL,
  `cardCountry` varchar(45) DEFAULT NULL,
  `cardType` varchar(45) DEFAULT NULL,
  `bankResponseCode` varchar(45) DEFAULT NULL,
  `approvedCurrency` varchar(45) DEFAULT NULL,
  `guidNo` varchar(45) DEFAULT NULL,
  `cardExpiration` varchar(45) DEFAULT NULL,
  `responseCode` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rocketgateResponse`
--

INSERT INTO `rocketgateResponse` (`idresponse`, `authNo`, `merchantInvoiceID`, `merchantAccount`, `approvedAmount`, `cardLastFour`, `version`, `merchantCustomerID`, `reasonCode`, `retrievalNo`, `cardIssuerName`, `payType`, `cardHash`, `cardDebitCredit`, `cardRegion`, `cardDescription`, `cardCountry`, `cardType`, `bankResponseCode`, `approvedCurrency`, `guidNo`, `cardExpiration`, `responseCode`, `timestamp`) VALUES
(1, '644231', '1516056860.Cams', '1', '2.0', '6245', '1.0', '1516056860.', '0', '1000160fc07da7b', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC07DA7B', '0321', '0', NULL),
(2, '257468', '1516056888.Cams', '1', '2.0', '6245', '1.0', '1516056888.', '0', '1000160fc0845fd', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC0845FD', '0321', '0', NULL),
(3, '408866', '1516056962.Cams', '1', '2.0', '6245', '1.0', '1516056962.', '0', '1000160fc0968c9', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC0968C9', '0321', '0', '2018-01-15 22:56:03'),
(4, '586236', '1516057028.2', '1', '2.0', '6245', '1.0', '1516057028.', '0', '1000160fc0a6cb3', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC0A6CB3', '0321', '0', '2018-01-15 22:57:10'),
(5, '676286', '1516057060.Cams', '1', '2.0', '6245', '1.0', '1516057060.', '0', '1000160fc0ae74b', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC0AE74B', '0321', '0', '2018-01-15 22:57:41'),
(6, '691423', '1516057075.Cams', '1', '2.0', '6245', '1.0', '1516057075.', '0', '1000160fc0b2343', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC0B2343', '0321', '0', '2018-01-15 22:57:56'),
(7, '310248', '1516057086.Dating', '1', '1.0', '6245', '1.0', '1516057086.', '0', '1000160fc0b4bd9', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC0B4BD9', '0321', '0', '2018-01-15 22:58:07'),
(8, '412439', '1516057086.Cams', '1', '2.0', '6245', '1.0', '1516057086.', '0', '1000160fc0b4d9b', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC0B4D9B', '0321', '0', '2018-01-15 22:58:07'),
(9, '519194', '1516057181.Dating', '1', '1.0', '6245', '1.0', '1516057181.', '0', '1000160fc0cbeeb', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC0CBEEB', '0321', '0', '2018-01-15 22:59:42'),
(10, '561013', '1516057181.Cams', '1', '2.0', '6245', '1.0', '1516057181.', '0', '1000160fc0cc103', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC0CC103', '0321', '0', '2018-01-15 22:59:42'),
(11, '531555', '1516057315.Dating', '1', '30.0', '6245', '1.0', '1516057315.', '0', '1000160fc0eca4f', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC0ECA4F', '0321', '0', '2018-01-15 23:01:56'),
(12, '939794', '1516057315.Cams', '1', '29.95', '6245', '1.0', '1516057315.', '0', '1000160fc0ecc1f', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC0ECC1F', '0321', '0', '2018-01-15 23:01:56'),
(13, '546771', '1516057334.Dating', '1', '30.0', '6245', '1.0', '1516057334.', '0', '1000160fc0f150f', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC0F150F', '0321', '0', '2018-01-15 23:02:15'),
(14, '696376', '1516057334.Cams', '1', '29.95', '6245', '1.0', '1516057334.', '0', '1000160fc0f16d5', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC0F16D5', '0321', '0', '2018-01-15 23:02:15'),
(15, '263710', '1516057404.Dating', '1', '30.0', '6245', '1.0', '1516057404.', '0', '1000160fc1023ed', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC1023ED', '0321', '0', '2018-01-15 23:03:24'),
(16, '025115', '1516057404.Cams', '1', '29.95', '6245', '1.0', '1516057404.', '0', '1000160fc1025df', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC1025DF', '0321', '0', '2018-01-15 23:03:25'),
(17, '741504', '1516057464.Dating', '1', '30.0', '6245', '1.0', '1516057464.', '0', '1000160fc111007', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC111007', '0321', '0', '2018-01-15 23:04:25'),
(18, '602744', '1516057464.Cams', '1', '29.95', '6245', '1.0', '1516057464.', '0', '1000160fc1111bd', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC1111BD', '0321', '0', '2018-01-15 23:04:25'),
(19, '560670', '1516057550.Dating', '1', '30.0', '6245', '1.0', '1516057550.', '0', '1000160fc126189', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC126189', '0321', '0', '2018-01-15 23:05:51'),
(20, '842113', '1516057550.Cams', '1', '29.95', '6245', '1.0', '1516057550.', '0', '1000160fc126355', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC126355', '0321', '0', '2018-01-15 23:05:51'),
(21, '647053', '1516057565.Dating', '1', '30.0', '6245', '1.0', '1516057565.', '0', '1000160fc129997', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC129997', '0321', '0', '2018-01-15 23:06:05'),
(22, '935888', '1516057565.Cams', '1', '29.95', '6245', '1.0', '1516057565.', '0', '1000160fc129b77', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC129B77', '0321', '0', '2018-01-15 23:06:06'),
(23, '892190', '1516057774.Dating', '1', '30.0', '6245', '1.0', '1516057774.', '0', '1000160fc15c987', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC15C987', '0321', '0', '2018-01-15 23:09:34'),
(24, '603317', '1516057774.Cams', '1', '29.95', '6245', '1.0', '1516057774.', '0', '1000160fc15cb73', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC15CB73', '0321', '0', '2018-01-15 23:09:35'),
(25, '671713', '1516057804.Dating', '1', '30.0', '6245', '1.0', '1516057804.', '0', '1000160fc164135', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC164135', '0321', '0', '2018-01-15 23:10:05'),
(26, '878821', '1516057804.Cams', '1', '29.95', '6245', '1.0', '1516057804.', '0', '1000160fc164327', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC164327', '0321', '0', '2018-01-15 23:10:05'),
(27, '058817', '1516057882.Dating', '1', '30.0', '6245', '1.0', '1516057882.', '0', '1000160fc1771f5', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC1771F5', '0321', '0', '2018-01-15 23:11:23'),
(28, '502290', '1516057882.Cams', '1', '29.95', '6245', '1.0', '1516057882.', '0', '1000160fc1773b1', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC1773B1', '0321', '0', '2018-01-15 23:11:23'),
(29, '722395', '1516057908.Dating', '1', '30.0', '6245', '1.0', '1516057908.', '0', '1000160fc17d6db', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC17D6DB', '0321', '0', '2018-01-15 23:11:49'),
(30, '635324', '1516057908.Cams', '1', '29.95', '6245', '1.0', '1516057908.', '0', '1000160fc17d8a3', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC17D8A3', '0321', '0', '2018-01-15 23:11:49'),
(31, '263166', '1516057918.Dating', '1', '30.0', '6245', '1.0', '1516057918.', '0', '1000160fc17fcff', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC17FCFF', '0321', '0', '2018-01-15 23:11:59'),
(32, '582811', '1516057918.Cams', '1', '29.95', '6245', '1.0', '1516057918.', '0', '1000160fc17ff07', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC17FF07', '0321', '0', '2018-01-15 23:11:59'),
(33, '970824', '1516057947.Dating', '1', '30.0', '6245', '1.0', '1516057947.', '0', '1000160fc186dbb', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC186DBB', '0321', '0', '2018-01-15 23:12:27'),
(34, '733666', '1516057947.Cams', '1', '29.95', '6245', '1.0', '1516057947.', '0', '1000160fc186f79', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC186F79', '0321', '0', '2018-01-15 23:12:28'),
(35, '134092', '1516058008.Dating', '1', '30.0', '6245', '1.0', '1516058008.', '0', '1000160fc195e69', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC195E69', '0321', '0', '2018-01-15 23:13:29'),
(36, '080215', '1516058008.Cams', '1', '29.95', '6245', '1.0', '1516058008.', '0', '1000160fc19602b', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FC19602B', '0321', '0', '2018-01-15 23:13:29'),
(37, '073821', '1516100852.Dating', '1', '30.0', '6245', '1.0', '1516100852.', '0', '1000160fea71ba3', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEA71BA3', '0321', '0', '2018-01-16 11:07:32'),
(38, '517567', '1516100852.Cams', '1', '29.95', '6245', '1.0', '1516100852.', '0', '1000160fea71ded', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEA71DED', '0321', '0', '2018-01-16 11:07:33'),
(39, '150899', '1516100926.Dating', '1', '30.0', '6245', '1.0', '1516100926.', '0', '1000160fea83e7f', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEA83E7F', '0321', '0', '2018-01-16 11:08:47'),
(40, '482031', '1516100926.Cams', '1', '29.95', '6245', '1.0', '1516100926.', '0', '1000160fea8407b', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEA8407B', '0321', '0', '2018-01-16 11:08:47'),
(41, '450819', '1516101978.Dating', '1', '30.0', '6245', '1.0', '1516101978.', '0', '1000160feb84941', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEB84941', '0321', '0', '2018-01-16 11:26:18'),
(42, '151535', '1516101978.Cams', '1', '29.95', '6245', '1.0', '1516101978.', '0', '1000160feb84bbd', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEB84BBD', '0321', '0', '2018-01-16 11:26:19'),
(43, '484429', '1516102026.Dating', '1', '30.0', '6245', '1.0', '1516102026.', '0', '1000160feb9049d', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEB9049D', '0321', '0', '2018-01-16 11:27:06'),
(44, '597384', '1516102026.Cams', '1', '29.95', '6245', '1.0', '1516102026.', '0', '1000160feb90691', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEB90691', '0321', '0', '2018-01-16 11:27:07'),
(45, '459019', '1516102069.Dating', '1', '30.0', '6245', '1.0', '1516102069.', '0', '1000160feb9ae07', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEB9AE07', '0321', '0', '2018-01-16 11:27:50'),
(46, '318267', '1516102069.Cams', '1', '29.95', '6245', '1.0', '1516102069.', '0', '1000160feb9afbd', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEB9AFBD', '0321', '0', '2018-01-16 11:27:50'),
(47, '462546', '1516102069.Temp', '1', '15.95', '6245', '1.0', '1516102069.', '0', '1000160feb9b171', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEB9B171', '0321', '0', '2018-01-16 11:27:50'),
(48, '555572', '1516102141.Dating', '1', '30.0', '6245', '1.0', '1516102141.', '0', '1000160febac8e3', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEBAC8E3', '0321', '0', '2018-01-16 11:29:02'),
(49, '137559', '1516102141.Cams', '1', '29.95', '6245', '1.0', '1516102141.', '0', '1000160febaca99', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEBACA99', '0321', '0', '2018-01-16 11:29:02'),
(50, '013517', '1516102141.Temp', '1', '15.95', '6245', '1.0', '1516102141.', '0', '1000160febaccbf', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEBACCBF', '0321', '0', '2018-01-16 11:29:03'),
(51, '780222', '1516102759.Dating', '1', '30.0', '6245', '1.0', '1516102759.', '0', '1000160fec434cf', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEC434CF', '0321', '0', '2018-01-16 11:39:19'),
(52, '466150', '1516102759.Cams', '1', '29.95', '6245', '1.0', '1516102759.', '0', '1000160fec436a1', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEC436A1', '0321', '0', '2018-01-16 11:39:20'),
(53, '664406', '1516102759.Temp', '1', '15.95', '6245', '1.0', '1516102759.', '0', '1000160fec4388d', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEC4388D', '0321', '0', '2018-01-16 11:39:20'),
(54, '456116', '1516102773.Dating', '1', '30.0', '6245', '1.0', '1516102773.', '0', '1000160fec46bdf', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEC46BDF', '0321', '0', '2018-01-16 11:39:33'),
(55, '153154', '1516102773.Cams', '1', '29.95', '6245', '1.0', '1516102773.', '0', '1000160fec46d91', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEC46D91', '0321', '0', '2018-01-16 11:39:34'),
(56, '340291', '1516102773.Temp', '1', '15.95', '6245', '1.0', '1516102773.', '0', '1000160fec46f53', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEC46F53', '0321', '0', '2018-01-16 11:39:34'),
(57, '278805', '1516103557.Dating', '1', '30.0', '6245', '1.0', '1516103557.', '0', '1000160fed06237', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FED06237', '0321', '0', '2018-01-16 11:52:38'),
(58, '304180', '1516103557.Cams', '1', '29.95', '6245', '1.0', '1516103557.', '0', '1000160fed06433', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FED06433', '0321', '0', '2018-01-16 11:52:38'),
(59, '317718', '1516103557.Temp', '1', '15.95', '6245', '1.0', '1516103557.', '0', '1000160fed065fb', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FED065FB', '0321', '0', '2018-01-16 11:52:38'),
(60, '912635', '1516104896.Dating', '1', '30.0', '6245', '1.0', '1516104896.', '0', '1000160fee4d28b', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEE4D28B', '0321', '0', '2018-01-16 12:14:57'),
(61, '229340', '1516104896.Cams', '1', '29.95', '6245', '1.0', '1516104896.', '0', '1000160fee4d4e7', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEE4D4E7', '0321', '0', '2018-01-16 12:14:58'),
(62, '521272', '1516104896.Temp', '1', '15.95', '6245', '1.0', '1516104896.', '0', '1000160fee4d6a5', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEE4D6A5', '0321', '0', '2018-01-16 12:14:58'),
(63, '469737', '1516105354.Dating', '1', '30.0', '6245', '1.0', '1516105354.', '0', '1000160feebce4d', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEEBCE4D', '0321', '0', '2018-01-16 12:22:35'),
(64, '597970', '1516105354.Cams', '1', '29.95', '6245', '1.0', '1516105354.', '0', '1000160feebd037', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEEBD037', '0321', '0', '2018-01-16 12:22:35'),
(65, '414339', '1516105354.Temp', '1', '15.95', '6245', '1.0', '1516105354.', '0', '1000160feebd1ed', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEEBD1ED', '0321', '0', '2018-01-16 12:22:36'),
(66, '250825', '1516105367.Dating', '1', '30.0', '6245', '1.0', '1516105367.', '0', '1000160feec0285', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEEC0285', '0321', '0', '2018-01-16 12:22:48'),
(67, '634068', '1516105367.Cams', '1', '29.95', '6245', '1.0', '1516105367.', '0', '1000160feec0457', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEEC0457', '0321', '0', '2018-01-16 12:22:48'),
(68, '782205', '1516105367.Temp', '1', '15.95', '6245', '1.0', '1516105367.', '0', '1000160feec0611', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEEC0611', '0321', '0', '2018-01-16 12:22:49'),
(69, '356433', '1516105391.Dating', '1', '30.0', '6245', '1.0', '1516105391.', '0', '1000160feec5f6f', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEEC5F6F', '0321', '0', '2018-01-16 12:23:12'),
(70, '401032', '1516105391.Cams', '1', '29.95', '6245', '1.0', '1516105391.', '0', '1000160feec612d', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEEC612D', '0321', '0', '2018-01-16 12:23:12'),
(71, '207513', '1516105391.Temp', '1', '15.95', '6245', '1.0', '1516105391.', '0', '1000160feec6303', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEEC6303', '0321', '0', '2018-01-16 12:23:13'),
(72, '525480', '1516105452.Dating', '1', '30.0', '6245', '1.0', '1516105452.', '0', '1000160feed4b97', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEED4B97', '0321', '0', '2018-01-16 12:24:12'),
(73, '613944', '1516105452.Cams', '1', '29.95', '6245', '1.0', '1516105452.', '0', '1000160feed4d53', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEED4D53', '0321', '0', '2018-01-16 12:24:13'),
(74, '664869', '1516105452.Temp', '1', '15.95', '6245', '1.0', '1516105452.', '0', '1000160feed4f19', 'FIA CARD SERVICES, NA', 'CREDIT', 'dVqXyLMjC6n/QQh+8tTgZJOkCsqeceD5R7vhoTkxn/M=', '1', '1', 'STANDARD', 'US', 'MC', '0', 'USD', '1000160FEED4F19', '0321', '0', '2018-01-16 12:24:13');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `cardHash` varchar(45) DEFAULT NULL,
  `expMonth` varchar(45) DEFAULT NULL,
  `expYear` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `userName` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `ipAddress` varchar(45) DEFAULT NULL,
  `firstSix` int(6) DEFAULT NULL,
  `lastFour` int(4) DEFAULT NULL,
  `rocketGateCustomerID` varchar(45) DEFAULT NULL,
  `clickID` int(11) DEFAULT NULL,
  `affID` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `domain_iddomain` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `domain`
--
ALTER TABLE `domain`
  ADD PRIMARY KEY (`iddomain`),
  ADD UNIQUE KEY `iddomain_UNIQUE` (`iddomain`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`idlog`),
  ADD UNIQUE KEY `idlog_UNIQUE` (`idlog`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`idoffer`),
  ADD UNIQUE KEY `idoffer_UNIQUE` (`idoffer`),
  ADD KEY `fk_offer_package1_idx` (`package_idpackage`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`idpackage`),
  ADD UNIQUE KEY `idpackage_UNIQUE` (`idpackage`),
  ADD KEY `fk_package_domain_idx` (`domain_iddomain`);

--
-- Indexes for table `rocketgateResponse`
--
ALTER TABLE `rocketgateResponse`
  ADD PRIMARY KEY (`idresponse`),
  ADD UNIQUE KEY `idresponse_UNIQUE` (`idresponse`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `iduser_UNIQUE` (`iduser`),
  ADD KEY `fk_user_domain1_idx` (`domain_iddomain`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `domain`
--
ALTER TABLE `domain`
  MODIFY `iddomain` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `idlog` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `idoffer` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `idpackage` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rocketgateResponse`
--
ALTER TABLE `rocketgateResponse`
  MODIFY `idresponse` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `fk_offer_package1` FOREIGN KEY (`package_idpackage`) REFERENCES `package` (`idpackage`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `fk_package_domain` FOREIGN KEY (`domain_iddomain`) REFERENCES `domain` (`iddomain`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_domain1` FOREIGN KEY (`domain_iddomain`) REFERENCES `domain` (`iddomain`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
