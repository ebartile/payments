-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 14, 2020 at 06:10 AM
-- Server version: 5.6.45
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paymentp_payments`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_token`
--

CREATE TABLE `access_token` (
  `id` int(11) NOT NULL,
  `token` varchar(200) NOT NULL,
  `date_generated` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_token`
--

INSERT INTO `access_token` (`id`, `token`, `date_generated`) VALUES
(1, 'ARd4APTi7uj7XW9okjeHihax7UP2', '2019-07-04 08:50:07.000000');

-- --------------------------------------------------------

--
-- Table structure for table `agent_commission`
--

CREATE TABLE `agent_commission` (
  `id` int(11) NOT NULL,
  `commission` varchar(33) NOT NULL,
  `min_amt` varchar(33) NOT NULL,
  `max_amt` varchar(33) NOT NULL,
  `admin_commission` varchar(33) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent_commission`
--

INSERT INTO `agent_commission` (`id`, `commission`, `min_amt`, `max_amt`, `admin_commission`) VALUES
(1, '                    0.6', '                    10', '                     3000', '          0.45');

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE `apps` (
  `appd_id` int(11) NOT NULL,
  `ap_name` varchar(33) NOT NULL,
  `owner` varchar(33) NOT NULL,
  `consumer_key` varchar(200) NOT NULL,
  `consumer_secret` varchar(200) NOT NULL,
  `issued_on` datetime(6) NOT NULL,
  `expires_on` varchar(33) NOT NULL,
  `status` varchar(33) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`appd_id`, `ap_name`, `owner`, `consumer_key`, `consumer_secret`, `issued_on`, `expires_on`, `status`) VALUES
(28, 'Brian', 'mimiaaa', 'QnJpYW4=', 'QnJpYW5taW1pYWFh', '2019-07-03 07:07:37.000000', 'Never', 'Approved'),
(29, 'clickonfood', 'abhilash', 'Y2xpY2tvbmZvb2Q=', 'Y2xpY2tvbmZvb2RhYmhpbGFzaA==', '2019-07-10 09:13:22.000000', 'Never', 'Approved'),
(30, 'test', 'hamza07', 'Pending', 'Pending', '0000-00-00 00:00:00.000000', 'Never', 'Pending'),
(31, 'samepark', 'sobujislam', 'Pending', 'Pending', '0000-00-00 00:00:00.000000', 'Never', 'Pending'),
(32, 'sasa', '14eastbarn', 'Pending', 'Pending', '0000-00-00 00:00:00.000000', 'Never', 'Pending'),
(33, 'testapp', 'matsaina', 'Pending', 'Pending', '0000-00-00 00:00:00.000000', 'Never', 'Pending'),
(34, 'asgdfg', 'robert', 'YXNnZGZn', 'YXNnZGZncm9iZXJ0', '2019-08-18 04:26:42.000000', 'Never', 'Approved'),
(35, 'Mysystem', 'palstreeo', 'Pending', 'Pending', '0000-00-00 00:00:00.000000', 'Never', 'Pending'),
(36, 'BrayoApp', 'palstreeo', 'QnJheW9BcHA=', 'QnJheW9BcHBwYWxzdHJlZW8=', '2019-08-20 09:21:54.000000', 'Never', 'Approved'),
(37, 'Sandpiper', 'Mejd', 'Pending', 'Pending', '0000-00-00 00:00:00.000000', 'Never', 'Pending'),
(38, 'sammy', 'Sammy254', 'Pending', 'Pending', '0000-00-00 00:00:00.000000', 'Never', 'Pending'),
(39, 'Shop sa', 'crestedcc', 'Pending', 'Pending', '0000-00-00 00:00:00.000000', 'Never', 'Pending'),
(40, 'Leash', 'Abrar06', 'Pending', 'Pending', '0000-00-00 00:00:00.000000', 'Never', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(33) NOT NULL,
  `value` varchar(33) NOT NULL,
  `swift_code` varchar(33) NOT NULL,
  `account_number` varchar(33) NOT NULL,
  `business_name` varchar(33) NOT NULL,
  `allowed_currency` varchar(60) NOT NULL,
  `conversion_rate` varchar(60) NOT NULL,
  `active` varchar(33) NOT NULL,
  `allowed_country` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `value`, `swift_code`, `account_number`, `business_name`, `allowed_currency`, `conversion_rate`, `active`, `allowed_country`) VALUES
(1, 'Equity Bank', 'equity', 'EQBLUGKA', '1001201135589', 'Patrick kiyemba', 'ugx, kshs,Tshs', '6.6', 'yes', 'Kenya'),
(2, 'Kenya Commercia Bank', 'KCB', 'KCBLUGKA', '2290273414', 'P KIYEMBA', 'TZSH', '146', 'YES', 'Tanzania, United Republic of'),
(3, 'FNB', 'FNB', 'FIRNZAJJ', ' 62825520928', 'Binitoo Cash pty ltd', 'ZAR', '1', 'yes', 'South Africa'),
(8, 'Absa', 'Absa', '632005', '4097287946', 'Binitoo Cash Pay', 'zar', '241', 'yes', 'South Africa'),
(6, 'Standard Bank South Africa', 'Standard Bank South Africa', 'SBZAZAJJ', '10121357218', 'Binitoo Cash Pay Pty Ltd', 'ZAR', '1', 'yes', 'South Africa'),
(7, 'STANBIC BANK UGANDA', 'STANBIC BANK UGANDA', 'SBICUGKX', '9030015799918', 'Binitoo Cash', 'UGX', '245.8', 'yes', 'Uganda');

-- --------------------------------------------------------

--
-- Table structure for table `bitcoin_settings`
--

CREATE TABLE `bitcoin_settings` (
  `id` int(11) NOT NULL,
  `api_key` varchar(255) NOT NULL,
  `secret` varchar(200) NOT NULL,
  `xpub` varchar(255) NOT NULL,
  `call_back_url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitcoin_settings`
--

INSERT INTO `bitcoin_settings` (`id`, `api_key`, `secret`, `xpub`, `call_back_url`) VALUES
(1, '651be52f-2d2a-4592-b3a8-9829753595a4', 'dddddd', 'xpub6CNpMHjXqKYgh7UbkzmVQi61f6CA7BtbRwK8j6AQjFUjHk7y7yiiFLRPFQrL6JbJcuhYwCsKjF65LSSTzQ5nX658pMR4rLmytKuDB996J8b', 'https://www.paymentprocessor-script.com/bitcoin.php');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `descr` varchar(200) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `alias` varchar(2000) NOT NULL,
  `type` varchar(33) NOT NULL,
  `time` datetime(6) NOT NULL,
  `status` varchar(33) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `title`, `descr`, `keywords`, `body`, `alias`, `type`, `time`, `status`) VALUES
(9, 'paypal payment confirmation ', 'paypal payment confirmation ', 'paypal payment confirmation ', 'we have received your payment\r\nthank you', 'static-paypal-payment-confirmation/', 'static', '2019-10-30 01:33:14.000000', 'Published'),
(10, 'Deposit', 'Deposit', 'Deposit', 'Choose a payment method', 'static-deposit/', 'static', '2019-10-30 01:38:51.000000', 'Published'),
(11, 'payement cancelled', 'payement cancelled', 'payement cancelled', 'Choose a payment method', 'static-payement-cancelled/', 'static', '2019-10-30 01:43:14.000000', 'Published'),
(12, 'Online payments', 'Online payments', 'Online payments', 'We offer a variety of payment methods so that your customers can pay you easily and securely online. More payment methods means access to more online shoppers and increased sales.', 'static-online-payments/', 'static', '2019-11-06 11:25:32.000000', 'Published'),
(13, 'point of sale', 'point of sale', 'point of sale', 'point of sale from Binitoo Cash coming soon', 'static-point-of-sale/', 'static', '2019-11-06 11:30:17.000000', 'Published'),
(14, 'Become an Agent', 'Become an Agent', 'Become an Agent', 'Become an agent and start making money with just a minimum  capital. Start selling our vouchers or top up clients account. Be your own boss. We need agents around the world to sell our top vouchers or top clients wallet accounts.\r\n\r\nBenefits\r\n\r\nDeposit funds to customer wallet\r\nGet commission on successful customer withdraw from their wallet and selling of top up voucher\r\nAttract more customer and traffic to your existing business', 'static-become-an-agent/', 'static', '2019-11-27 11:48:17.000000', 'Published'),
(15, 'Top up Accounts and wallets', 'Top up Accounts and wallets', 'Top up Accounts and wallets', 'Make payments, top up wallets such wallets, instant vouchers, mobile money wallets and bank accounts.\r\nwe can Eft instant Eft, normal Eft, RTGS and Swift to any account at any time.', 'personal-top-up-accounts-and-wallets/', 'Personal', '2019-11-28 12:04:03.000000', 'Published'),
(16, 'Binitoo Wallet cash cards', 'Binitoo Wallet cash cards', 'Binitoo Wallet cash cards', 'Order your binitoo cash wallet card to day and start transacting. no monthly fees, pay as you go.The wallet card for local use costs R150 and  you can deposit up to R30000  per transaction. get notification sms when withdraw, swiping buy air time. \r\n We also have international Binitoo wallet card international for international use. The card cost R250. This only work outside South Africa and funds are loaded in rands but you withdraw in local currencies. withdraw fees either local or international is standard fees of R40 per transaction\r\nto order cards send a copy of passport, asylum permit, refugee id , South Africa Id card or Book and proof of address to info@binitoo.com. you must also open account on our website such that you can transact and load funds on your cards\r\n\r\ncall us on +27739647888 or send a whats up message for more information', 'static-binitoo-wallet-cash-cards/', 'static', '2019-12-17 10:23:00.000000', 'Published');

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

CREATE TABLE `consultations` (
  `id` int(11) NOT NULL,
  `consulted_by` varchar(33) NOT NULL,
  `advice` varchar(1000) NOT NULL,
  `charges` varchar(33) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `status` varchar(33) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultations`
--

INSERT INTO `consultations` (`id`, `consulted_by`, `advice`, `charges`, `time`, `status`) VALUES
(11, 'mimiaaa', 'The game between <span style=\"color:red\">Kawasaki Frontale</span> VS <span style=\"color:red\">Nagoya Grampus</span><br>Starting time: 13:00; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 09:38:34.604949', ''),
(10, 'mimiaaa', 'The game between <span style=\"color:red\">Kawasaki Frontale</span> VS <span style=\"color:red\">Nagoya Grampus</span><br>Starting time: 13:00; 04/09/19<br>Prediction: ', '5.00', '2019-09-04 09:37:08.767335', ''),
(9, 'mimiaaa', 'The game between <span style=\"color:red\">St. Pauli</span> VS <span style=\"color:red\">AaB Aalborg</span><br>Starting time: 13:00; 04/09/19<br>Prediction: ', '5.00', '2019-09-04 09:35:38.306893', ''),
(8, 'mimiaaa', 'The game between <span style=\"color:red\">FC Schaffhausen</span> VS <span style=\"color:red\">FC Zurich</span><br>Starting time: 13:00; 04/09/19<br>Prediction: ', '5.00', '2019-09-04 09:32:27.721480', ''),
(7, 'mimiaaa', 'The game between <span style=\"color:red\">FC Schaffhausen</span> VS <span style=\"color:red\">FC Zurich</span><br>Starting time: 13:00; 04/09/19<br>Prediction: ', '5.00', '2019-09-04 09:29:22.688798', ''),
(12, 'mimiaaa', 'The game between <span style=\"color:red\">St. Pauli</span> VS <span style=\"color:red\">AaB Aalborg</span><br>Starting time: 13:00; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 09:39:27.380605', ''),
(13, 'mimiaaa', 'The game between <span style=\"color:red\">Kawasaki Frontale</span> VS <span style=\"color:red\">Nagoya Grampus</span><br>Starting time: 13:00; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 09:40:01.799501', ''),
(14, 'mimiaaa', 'The game between <span style=\"color:red\">Urawa Red Diamonds</span> VS <span style=\"color:red\">Kashima Antlers</span><br>Starting time: 13:30; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 09:40:25.997221', ''),
(15, 'mimiaaa', 'The game between <span style=\"color:red\">Proline FC</span> VS <span style=\"color:red\">Onduparaka FC</span><br>Starting time: 16:00; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 09:40:37.239001', ''),
(16, 'mimiaaa', 'The game between <span style=\"color:red\">Ethiopia</span> VS <span style=\"color:red\">Lesotho</span><br>Starting time: 16:00; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 09:40:44.490673', ''),
(17, 'mimiaaa', 'The game between <span style=\"color:red\">Proline FC</span> VS <span style=\"color:red\">Onduparaka FC</span><br>Starting time: 16:00; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 09:40:53.687246', ''),
(18, 'mimiaaa', 'The game between <span style=\"color:red\">St. Pauli</span> VS <span style=\"color:red\">AaB Aalborg</span><br>Starting time: 13:00; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 09:40:59.238980', ''),
(19, 'mimiaaa', 'The game between <span style=\"color:red\">St. Pauli</span> VS <span style=\"color:red\">AaB Aalborg</span><br>Starting time: 13:00; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 10:21:01.014391', ''),
(20, 'mimiaaa', 'The game between <span style=\"color:red\">FC Schaffhausen</span> VS <span style=\"color:red\">FC Zurich</span><br>Starting time: 13:00; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 10:24:33.828095', ''),
(21, 'mimiaaa', 'The game between <span style=\"color:red\">FC Schaffhausen</span> VS <span style=\"color:red\">FC Zurich</span><br>Starting time: 13:00; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 10:26:54.889968', ''),
(22, 'mimiaaa', 'The game between <span style=\"color:red\">Gimhae</span> VS <span style=\"color:red\">Mokpo City</span><br>Starting time: 13:30; 04/09/19<br>Prediction: Safe your money.', '5.00', '2019-09-04 10:29:06.807575', ''),
(23, 'mimiaaa', 'The game between <span style=\"color:red\">Eritrea</span> VS <span style=\"color:red\">Namibia</span><br>Starting time: 16:00; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 10:29:41.897235', ''),
(24, 'mimiaaa', 'The game between <span style=\"color:red\">Gimhae</span> VS <span style=\"color:red\">Mokpo City</span><br>Starting time: 13:30; 04/09/19<br>Prediction: Safe your money.', '5.00', '2019-09-04 10:29:58.950638', ''),
(25, 'mimiaaa', 'The game between <span style=\"color:red\">Proline FC</span> VS <span style=\"color:red\">Onduparaka FC</span><br>Starting time: 16:00; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 10:31:36.951466', ''),
(26, 'mimiaaa', 'The game between <span style=\"color:red\">Eritrea</span> VS <span style=\"color:red\">Namibia</span><br>Starting time: 16:00; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 10:50:38.684805', ''),
(27, 'mimiaaa', 'The game between <span style=\"color:red\">Ethiopia</span> VS <span style=\"color:red\">Lesotho</span><br>Starting time: 16:00; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 10:57:29.589766', ''),
(28, 'mimiaaa', 'The game between <span style=\"color:red\">Urawa Red Diamonds</span> VS <span style=\"color:red\">Kashima Antlers</span><br>Starting time: 13:30; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 11:15:07.688665', ''),
(29, 'mimiaaa', 'The game between <span style=\"color:red\">Eritrea</span> VS <span style=\"color:red\">Namibia</span><br>Starting time: 16:00; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 11:15:24.629616', ''),
(30, 'mimiaaa', 'The game between <span style=\"color:red\">Gimhae</span> VS <span style=\"color:red\">Mokpo City</span><br>Starting time: 13:30; 04/09/19<br>Prediction: Safe your money.', '5.00', '2019-09-04 11:16:07.932246', ''),
(31, 'mimiaaa', 'The game between <span style=\"color:red\">Burundi</span> VS <span style=\"color:red\">Tanzania</span><br>Starting time: 16:00; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 11:27:21.784810', ''),
(32, 'mimiaaa', 'The game between <span style=\"color:red\">Proline FC</span> VS <span style=\"color:red\">Onduparaka FC</span><br>Starting time: 16:00; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 11:27:29.046200', ''),
(33, 'mimiaaa', 'The game between <span style=\"color:red\">Urawa Red Diamonds</span> VS <span style=\"color:red\">Kashima Antlers</span><br>Starting time: 13:30; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 11:28:35.381714', ''),
(34, 'mimiaaa', 'The game between <span style=\"color:red\">Urawa Red Diamonds</span> VS <span style=\"color:red\">Kashima Antlers</span><br>Starting time: 13:30; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 11:50:45.222541', ''),
(35, 'mimiaaa', 'The game between <span style=\"color:red\">Proline FC</span> VS <span style=\"color:red\">Onduparaka FC</span><br>Starting time: 16:00; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 11:51:27.416825', ''),
(36, 'mimiaaa', 'The game between <span style=\"color:red\">Eritrea</span> VS <span style=\"color:red\">Namibia</span><br>Starting time: 16:00; 04/09/19<br>Prediction: <p style=\"color:red;font-size:24px;\">A tricky investment. Safe your money for another use.</p></br></br>', '5.00', '2019-09-04 11:53:28.596809', '');

-- --------------------------------------------------------

--
-- Table structure for table `country_specific_fees`
--

CREATE TABLE `country_specific_fees` (
  `id` int(11) NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fee_type` varchar(33) COLLATE utf8_unicode_ci NOT NULL,
  `fixed_fee` varchar(33) COLLATE utf8_unicode_ci NOT NULL,
  `percent_fee` varchar(33) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `country_specific_fees`
--

INSERT INTO `country_specific_fees` (`id`, `country`, `fee_type`, `fixed_fee`, `percent_fee`) VALUES
(1, 'Kenya', 'Normal', '0.30', '3'),
(2, 'Kenya', 'Express', '0.50', '5'),
(3, 'Algeria', 'Express', '6', '8'),
(4, 'South Africa', 'Express', '60', ''),
(5, 'South Africa', 'Normal', '10', '');

-- --------------------------------------------------------

--
-- Table structure for table `credit_cards`
--

CREATE TABLE `credit_cards` (
  `id` int(33) NOT NULL,
  `owner` varchar(33) NOT NULL,
  `names` varchar(33) NOT NULL,
  `number` varchar(100) NOT NULL,
  `cvv` int(33) NOT NULL,
  `expiry` varchar(33) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit_cards`
--

INSERT INTO `credit_cards` (`id`, `owner`, `names`, `number`, `cvv`, `expiry`) VALUES
(1, 'mimiaaa', 'Brian Mbiki', '2147483647', 234, '0000-00-00'),
(2, 'mimiaaa', 'Brian Mbiki', '2147483647', 534, '0000-00-00'),
(3, 'mimiaaa', 'Brian Mbiki', '9202028200202', 234, '0000-00-00'),
(4, 'mimiaaa', 'Brian Mbiki', '9202028200202234', 345, '0000-00-00'),
(5, 'mimiaaa', 'Brian Mbiki', '333333333333333', 234, '0000-00-00'),
(6, 'mimiaaa', 'Brian Mbiki', '9202028200202', 7888, '0000-00-00'),
(7, 'mimiaaa', 'Brian Mbiki', '555555555556788', 345, '07/21'),
(8, 'prowrite', 'Michelle Robinson', '5466576004490491', 301, '10/20'),
(9, 'mimiaaa', 'Brian Mbiki', '34582992025782992', 345, '07/20'),
(10, 'bilelv007', '0645656565656', '522', 522, '02/02/2022');

-- --------------------------------------------------------

--
-- Table structure for table `credit_card_params`
--

CREATE TABLE `credit_card_params` (
  `id` int(11) NOT NULL,
  `api_key` varchar(200) NOT NULL,
  `secret` varchar(200) NOT NULL,
  `cc_gateway_name` varchar(33) NOT NULL,
  `mode` varchar(33) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit_card_params`
--

INSERT INTO `credit_card_params` (`id`, `api_key`, `secret`, `cc_gateway_name`, `mode`) VALUES
(1, 'sbpb_YTQyZmQwMDctYjc4MC00YzU2LTg0OGYtYjA2ZDBhOTM5MDhl', 'go1gmxg4qFe3iYHkoi47MDYTAmgyOC3c0w/X3lBMqP55YFFQL0ODSXAOkNtXTToq', 'mastercard', 'sandbox');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `code` varchar(33) COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(33) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(33) COLLATE utf8_unicode_ci NOT NULL,
  `e_rate` varchar(33) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(33) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `code`, `symbol`, `country`, `e_rate`, `currency`) VALUES
(1, 'AED', '', 'United Arab Emirates', '-0.45329824', 'Dirham'),
(2, 'AFN', '', 'Afghanistan', '4.5756368', ''),
(3, 'ALL', '', '', '6.69485216', ''),
(4, 'AMD', '', '', '31.42717952', ''),
(5, 'ANG', '', '', '-0.58618336', ''),
(6, 'AOA', '', '', '30.93260192', ''),
(7, 'ARS', '', '', '3.31108832', ''),
(8, 'AUD', '', '', '-0.60266272', ''),
(9, 'AWG', '', '', '-0.5791072', ''),
(10, 'AZN', '', '', '-0.58555744', ''),
(11, 'BAM', '', '', '-0.58165504', ''),
(12, 'BBD', '', '', '-0.5644192', ''),
(13, 'BDT', '', '', '5.00014016', ''),
(14, 'BGN', '', '', '-0.58141792', ''),
(15, 'BHD', '', '', '-0.67467904', ''),
(16, 'BIF', '', '', '125.29673408', ''),
(17, 'BMD', '', '', '-0.63283744', ''),
(18, 'BND', '', '', '-0.60898528', ''),
(19, 'BOB', '', '', '-0.23566912', ''),
(20, 'BRL', '', '', '-0.42460192', ''),
(21, 'BSD', '', '', '-0.63285376', ''),
(22, 'BTC', '', '', '-0.699990670923', ''),
(23, 'BTN', '', '', '4.08058784', ''),
(24, 'BWP', '', '', '0.01741472', ''),
(25, 'BYN', '', '', '-0.55911136', ''),
(26, 'BYR', '', '', '1315.6837904', ''),
(27, 'BZD', '', '', '-0.56464864', ''),
(28, 'CAD', '', '', '-0.61165792', ''),
(29, 'CDF', '', '', '112.20008288', ''),
(30, 'CHF', '', '', '-0.63399424', ''),
(31, 'CLF', '', '', '-0.69815776', ''),
(32, 'CLP', '', '', '50.13551264', ''),
(33, 'CNY', '', '', '-0.2294128', ''),
(34, 'COP', '', '', '222.11138912', ''),
(35, 'CRC', '', '', '37.4376272', ''),
(36, 'CUC', '', '', '-0.63283744', ''),
(37, 'CUP', '', '', '1.07980448', ''),
(38, 'CVE', '', '', '5.99948', ''),
(39, 'CZK', '', '', '0.84270848', ''),
(40, 'DJF', '', '', '11.23613504', ''),
(41, 'DKK', '', '', '-0.24700288', ''),
(42, 'DOP', '', '', '2.8744112', ''),
(43, 'DZD', '', '', '7.3425344', ''),
(44, 'EGP', '', '', '0.37720544', ''),
(45, 'ERN', '', '', '0.30746048', ''),
(46, 'ETB', '', '', '1.43602592', ''),
(47, 'EUR', '', '', '-0.63938368', ''),
(48, 'FJD', '', '', '-0.55423168', ''),
(49, 'FKP', '', '', '-0.6454048', ''),
(50, 'GBP', '', '', '-0.64835488', ''),
(51, 'GEL', '', '', '-0.5078896', ''),
(52, 'GGP', '', '', '-0.64834624', ''),
(53, 'GHS', '', '', '-0.31502944', ''),
(54, 'GIP', '', '', '-0.6454048', ''),
(55, 'GMD', '', '', '2.75553344', ''),
(56, 'GNF', '', '', '632.3060048', ''),
(57, 'GTQ', '', '', '-0.18329248', ''),
(58, 'GYD', '', '', '13.35700736', ''),
(59, 'HKD', '', '', '-0.17640736', ''),
(60, 'HNL', '', '', '0.95916992', ''),
(61, 'HRK', '', '', '-0.2490016', ''),
(62, 'HTG', '', '', '5.7132416', ''),
(63, 'HUF', '', '', '19.33539488', ''),
(64, 'IDR', '', '', '937.3432688', ''),
(65, 'ILS', '', '', '-0.4665904', ''),
(66, 'IMP', '', '', '-0.64834624', ''),
(67, 'INR', '', '', '4.0771328', ''),
(68, 'IQD', '', '', '79.2568832', ''),
(69, 'IRR', '', '', '2827.17448736', ''),
(70, 'ISK', '', '', '7.5092912', ''),
(71, 'JEP', '', '', '-0.64834624', ''),
(72, 'JMD', '', '', '8.27778272', ''),
(73, 'JOD', '', '', '-0.6523792', ''),
(74, 'JPY', '', '', '6.650864', ''),
(75, 'KES', '', '', '6.06367232', ''),
(76, 'KGS', '', '', '3.99033632', ''),
(77, 'KHR', '', '', '272.31533504', ''),
(78, 'KMF', '', '', '29.13022304', ''),
(79, 'KPW', '', '', '59.74584992', ''),
(80, 'KRW', '', '', '77.16748544', ''),
(81, 'KWD', '', '', '-0.6796096', ''),
(82, 'KYD', '', '', '-0.6440416', ''),
(83, 'KZT', '', '', '25.03310048', ''),
(84, 'LAK', '', '', '595.36666304', ''),
(85, 'LBP', '', '', '100.8496304', ''),
(86, 'LKR', '', '', '11.4610352', ''),
(87, 'LRD', '', '', '11.89992704', ''),
(88, 'LSL', '', '', '0.25910528', ''),
(89, 'LTL', '', '', '-0.50168704', ''),
(90, 'LVL', '', '', '-0.65937376', ''),
(91, 'LYD', '', '', '-0.60571936', ''),
(92, 'MAD', '', '', '-0.05288704', ''),
(93, 'MDL', '', '', '0.459992', ''),
(94, 'MGA', '', '', '241.6221008', ''),
(95, 'MKD', '', '', '3.02344064', ''),
(96, 'MMK', '', '', '99.92568032', ''),
(97, 'MNT', '', '', '182.47346624', ''),
(98, 'MOP', '', '', '-0.16073344', ''),
(99, 'MRO', '', '', '23.2769792', ''),
(100, 'MUR', '', '', '1.74479552', ''),
(101, 'MVR', '', '', '0.33567008', ''),
(102, 'MWK', '', '', '49.33604', ''),
(103, 'MXN', '', '', '0.5721776', ''),
(104, 'MYR', '', '', '-0.42192256', ''),
(105, 'MZN', '', '', '3.50403584', ''),
(106, 'NAD', '', '', '0.25910528', ''),
(107, 'NGN', '', '', '23.64663392', ''),
(108, 'NIO', '', '', '1.58892128', ''),
(109, 'NOK', '', '', '-0.09717664', ''),
(110, 'NPR', '', '', '6.94892672', ''),
(111, 'NZD', '', '', '-0.59823904', ''),
(112, 'OMR', '', '', '-0.6741424', ''),
(113, 'PAB', '', '', '-0.632848', ''),
(114, 'PEN', '', '', '-0.47735392', ''),
(115, 'PGK', '', '', '-0.47147968', ''),
(116, 'PHP', '', '', '2.70953504', ''),
(117, 'PKR', '', '', '9.70178528', ''),
(118, 'PLN', '', '', '-0.4418848', ''),
(119, 'PYG', '', '', '432.03941696', ''),
(120, 'QAR', '', '', '-0.4554592', ''),
(121, 'RON', '', '', '-0.41081824', ''),
(122, 'RSD', '', '', '6.42394496', ''),
(123, 'RUB', '', '', '3.47999168', ''),
(124, 'RWF', '', '', '62.60059808', ''),
(125, 'SAR', '', '', '-0.44803936', ''),
(126, 'SBD', '', '', '-0.1433008', ''),
(127, 'SCR', '', '', '0.22011872', ''),
(128, 'SDG', '', '', '2.33009696', ''),
(129, 'SEK', '', '', '-0.06826336', ''),
(130, 'SGD', '', '', '-0.60899584', ''),
(131, 'SHP', '', '', '-0.61128448', ''),
(132, 'SLL', '', '', '657.82773056', ''),
(133, 'SOS', '', '', '38.32139936', ''),
(134, 'SRD', '', '', '-0.19909984', ''),
(135, 'STD', '', '', '1447.37522816', ''),
(136, 'SVC', '', '', '-0.11239552', ''),
(137, 'SYP', '', '', '33.88867808', ''),
(138, 'SZL', '', '', '0.25910432', ''),
(139, 'THB', '', '', '1.32867488', ''),
(140, 'TJS', '', '', '-0.04993792', ''),
(141, 'TMT', '', '', '-0.46425952', ''),
(142, 'TND', '', '', '-0.50976256', ''),
(143, 'TOP', '', '', '-0.54563392', ''),
(144, 'TRY', '', '', '-0.30105376', ''),
(145, 'TTD', '', '', '-0.24630496', ''),
(146, 'TWD', '', '', '1.32330272', ''),
(147, 'TZS', '', '', '153.74027072', ''),
(148, 'UAH', '', '', '0.86592032', ''),
(149, 'UGX', '', '', '245.73341312', ''),
(150, 'USD', '', '', '-0.63283744', ''),
(151, 'UYU', '', '', '1.83192992', ''),
(152, 'UZS', '', '', '638.35062272', ''),
(153, 'VEF', '', '', '-0.02921536', ''),
(154, 'VND', '', '', '1555.62160064', ''),
(155, 'VUV', '', '', '7.09755872', ''),
(156, 'WST', '', '', '-0.52013248', ''),
(157, 'XAF', '', '', '38.99247584', ''),
(158, 'XAG', '', '', '-0.69609472', ''),
(159, 'XAU', '', '', '-0.699954565022', ''),
(160, 'XCD', '', '', '-0.51848992', ''),
(161, 'XDR', '', '', '-0.65124928', ''),
(162, 'XOF', '', '', '38.89249952', ''),
(163, 'XPF', '', '', '6.55692608', ''),
(164, 'YER', '', '', '16.11243968', ''),
(165, 'ZAR', '', '', '0.26', ''),
(166, 'ZMK', '', '', '603.84278048', ''),
(167, 'ZMW', '', '', '0.23906912', ''),
(168, 'ZWL', '', '', '20.92630496', '');

-- --------------------------------------------------------

--
-- Table structure for table `db_card_settings`
--

CREATE TABLE `db_card_settings` (
  `id` int(11) NOT NULL,
  `to_be_saved` varchar(33) NOT NULL,
  `to_be_emailed` varchar(33) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_card_settings`
--

INSERT INTO `db_card_settings` (`id`, `to_be_saved`, `to_be_emailed`) VALUES
(2, 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `default_gateway_fees`
--

CREATE TABLE `default_gateway_fees` (
  `id` int(11) NOT NULL,
  `fee_amt` varchar(33) NOT NULL,
  `type` varchar(33) NOT NULL,
  `for_type` varchar(33) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `default_gateway_fees`
--

INSERT INTO `default_gateway_fees` (`id`, `fee_amt`, `type`, `for_type`) VALUES
(1, '2.3', 'percent', 'Withdraw'),
(2, '0', 'percent', 'Deposit'),
(3, '2', 'fixed', 'Send'),
(4, '2', 'fixed', 'Request'),
(5, '2.9', 'percent', 'Withdraw via mobile money'),
(6, '60', 'fixed', 'Express bank withdraw'),
(7, '10', 'fixed', 'Normal Bank withdraw');

-- --------------------------------------------------------

--
-- Table structure for table `disputes`
--

CREATE TABLE `disputes` (
  `dispute_id` int(11) NOT NULL,
  `date` datetime(6) NOT NULL,
  `transaction_code` varchar(33) NOT NULL,
  `complainant` varchar(33) NOT NULL,
  `claim_against_who` varchar(33) NOT NULL,
  `status` varchar(33) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dispute_messages`
--

CREATE TABLE `dispute_messages` (
  `id` int(11) NOT NULL,
  `dispute_id` int(33) NOT NULL,
  `message` text NOT NULL,
  `transaction_code` varchar(33) NOT NULL,
  `sender` varchar(33) NOT NULL,
  `recipient` varchar(33) NOT NULL,
  `date` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exchange_rate_fees`
--

CREATE TABLE `exchange_rate_fees` (
  `id` int(11) NOT NULL,
  `fixed` varchar(33) COLLATE utf8_unicode_ci NOT NULL,
  `percent` varchar(33) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exchange_rate_fees`
--

INSERT INTO `exchange_rate_fees` (`id`, `fixed`, `percent`) VALUES
(1, '0.70', '4');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `raised_by` varchar(33) NOT NULL,
  `amount` varchar(33) NOT NULL,
  `payment_status` varchar(33) NOT NULL,
  `bitcoin_address` varchar(255) NOT NULL,
  `TransTime` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `raised_by`, `amount`, `payment_status`, `bitcoin_address`, `TransTime`) VALUES
(3519, 'mimiaaa', '50', 'Not Paid', '', '2019-07-03 09:00:53.000000'),
(3520, 'mimiaaa', '50', 'Not Paid', '', '2019-07-10 08:23:00.000000'),
(3521, 'eghostx', '0,5', 'Not Paid', '', '2019-08-02 08:07:20.000000'),
(3522, 'eghostx', '1', 'Not Paid', '', '2019-08-02 11:56:43.000000'),
(3523, 'eghostx', '1', 'Not Paid', '', '2019-08-02 11:58:23.000000'),
(3524, 'mimiaaa', '100', 'Not Paid', '', '2019-08-18 08:27:03.000000'),
(3525, 'mimiaaa', '3000', 'Not Paid', '', '2019-08-28 06:29:06.000000'),
(3526, 'caique', '1500', 'Not Paid', '', '2019-08-31 07:13:10.000000');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`user_id`, `time`) VALUES
(104, '1562162575'),
(113, '1565014799'),
(105, '1566143797'),
(105, '1566143879'),
(105, '1566143963'),
(130, '1566144449'),
(130, '1566145361'),
(130, '1566145376'),
(105, '1566145946'),
(132, '1566426893'),
(132, '1566426927'),
(132, '1566871050'),
(105, '1567784557'),
(156, '1567796645'),
(156, '1568094507'),
(105, '1568750791'),
(156, '1568751205'),
(156, '1568751222'),
(156, '1568751279'),
(156, '1568751295'),
(158, '1568797710'),
(105, '1568886949'),
(105, '1568887329'),
(156, '1569753594'),
(156, '1571068198'),
(156, '1571068744'),
(156, '1571068753'),
(156, '1571247523'),
(158, '1571327641'),
(157, '1571327662'),
(158, '1571581139'),
(156, '1571581172'),
(156, '1572093530'),
(160, '1572093595'),
(105, '1572117737'),
(162, '1572165424'),
(105, '1572166438'),
(105, '1572166448'),
(156, '1572416012'),
(105, '1572953658'),
(105, '1572977903'),
(105, '1573045363'),
(105, '1573045389'),
(163, '1573050363'),
(163, '1573050383'),
(156, '1573050409'),
(156, '1573376084'),
(105, '1573539966'),
(105, '1573738120'),
(105, '1573738146'),
(158, '1573751715'),
(105, '1573792529'),
(167, '1573801624'),
(169, '1575291667'),
(105, '1576582130'),
(105, '1576586861'),
(163, '1576919391'),
(105, '1577042286'),
(176, '1578168437'),
(161, '1578693963'),
(183, '1578920163'),
(105, '1578927627');

-- --------------------------------------------------------

--
-- Table structure for table `mailer_params`
--

CREATE TABLE `mailer_params` (
  `id` int(11) NOT NULL,
  `site_url` varchar(400) NOT NULL,
  `support_email` varchar(400) NOT NULL,
  `site_name` varchar(200) NOT NULL,
  `no_replt` varchar(400) NOT NULL,
  `mailer_subject` varchar(400) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mailer_params`
--

INSERT INTO `mailer_params` (`id`, `site_url`, `support_email`, `site_name`, `no_replt`, `mailer_subject`) VALUES
(1, 'https://www.binitoo.com', 'support@binitoo.com', 'Binitoo Cash', ' No-Reply@binitoo.com', 'Registration successful');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `home_team` varchar(100) DEFAULT NULL,
  `away_team` varchar(100) DEFAULT NULL,
  `home_odds` double DEFAULT NULL,
  `draw_odds` double DEFAULT NULL,
  `away_odds` double DEFAULT NULL,
  `game_id` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` varchar(33) NOT NULL,
  `users_who_consulted` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `home_team`, `away_team`, `home_odds`, `draw_odds`, `away_odds`, `game_id`, `date`, `status`, `users_who_consulted`) VALUES
(1, 'Gyeongju KHNP', 'Cheonan City FC', 1.69, 3.39, 4.57, 'ID: 2996', '11:00; 04/09/19', 'live', 'These users consulted'),
(2, 'St. Pauli', 'AaB Aalborg', 1.89, 3.78, 3.62, 'ID: 5755', '13:00; 04/09/19', 'live', 'These users consulted'),
(3, 'FC Schaffhausen', 'FC Zurich', 4.66, 4.07, 1.64, 'ID: 5522', '13:00; 04/09/19', 'live', 'These users consulted'),
(4, 'Gamba Osaka', 'FC Tokyo', 2.8, 3.11, 2.34, 'ID: 3649', '13:00; 04/09/19', 'live', 'These users consulted'),
(5, 'Kawasaki Frontale', 'Nagoya Grampus', 1.55, 3.92, 4.9, 'ID: 2227', '13:00; 04/09/19', 'live', 'These users consulted'),
(6, 'Consadole Sapporo', 'Sanfrecce Hiroshima', 2.41, 3.24, 2.62, 'ID: 2921', '13:00; 04/09/19', 'live', 'These users consulted'),
(7, 'Gangneung City', 'Daejeon Korail', 1.44, 4.23, 5.67, 'ID: 1389', '13:00; 04/09/19', 'live', 'These users consulted'),
(8, 'Changwon City', 'Busan Transp.', 4.01, 3.4, 1.78, 'ID: 3928', '13:00; 04/09/19', 'live', 'These users consulted'),
(9, 'Urawa Red Diamonds', 'Kashima Antlers', 3.65, 3.44, 1.85, 'ID: 2341', '13:30; 04/09/19', 'live', 'These users consulted,mimiaaa'),
(10, 'Gimhae', 'Mokpo City', 2.7, 2.8, 2.65, 'ID: 4164', '13:30; 04/09/19', 'live', 'These users consulted'),
(11, 'Burundi', 'Tanzania', 2.27, 3.14, 3.46, 'ID: 1328', '16:00; 04/09/19', 'live', 'These users consulted'),
(12, 'Eritrea', 'Namibia', 5.13, 4.01, 1.66, 'ID: 4342', '16:00; 04/09/19', 'live', 'These users consulted,mimiaaa'),
(13, 'Ethiopia', 'Lesotho', 2.05, 3.19, 4.05, 'ID: 1162', '16:00; 04/09/19', 'live', 'These users consulted'),
(14, 'Kasimpasa', 'Trabzonspor', 3.57, 3.57, 1.84, 'ID: 5999', '16:00; 04/09/19', 'live', 'These users consulted'),
(15, 'Proline FC', 'Onduparaka FC', 3.15, 2.64, 2.44, 'ID: 3420', '16:00; 04/09/19', 'live', 'These users consulted,mimiaaa');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `First_name` varchar(33) NOT NULL,
  `Last_name` varchar(33) NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(33) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `available_balance` varchar(33) NOT NULL DEFAULT '0.00',
  `pending_balance` varchar(33) NOT NULL DEFAULT '0.00',
  `level` varchar(33) NOT NULL,
  `bank_name` varchar(33) NOT NULL,
  `bank_swift_code` varchar(33) NOT NULL,
  `bank_account_number` varchar(33) NOT NULL,
  `country` varchar(1000) NOT NULL,
  `member_currency` varchar(33) NOT NULL,
  `member_currency_symbol` varchar(33) NOT NULL,
  `status` varchar(33) NOT NULL,
  `verified_status` varchar(33) NOT NULL DEFAULT 'UNVERIFIED',
  `password_retrieval_attempts` int(11) NOT NULL,
  `e_rate` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `First_name`, `Last_name`, `business_name`, `username`, `email`, `phone`, `password`, `salt`, `available_balance`, `pending_balance`, `level`, `bank_name`, `bank_swift_code`, `bank_account_number`, `country`, `member_currency`, `member_currency_symbol`, `status`, `verified_status`, `password_retrieval_attempts`, `e_rate`) VALUES
(105, '  Brian Wambua', 'Mbiki2', '', 'mimiaaa', 'paymentprocessor@gmail.com', '254706745202', '389d56886171651b5c3b6d664d1497a5a447a92f604dea9eac01030816f44daf152664f1101a572292ab5ccc8463bed77668b086cdb0a8a53463f85b1b711a41', '4efea7b931d382780d272a1ada0cdf41b52914a30a7bf9ada633f1d9d6a679fdda672c91a029c4c3574333f6b0ef8c2035d02bf23e760b02916fdf79fc1b2236', '100', '0.00', 'admin', 'Equity', '729292002', '990202020', 'Kenya', 'KES', 'KES', 'Limited', 'UNVERIFIED', 0, '6.77787827'),
(142, ' Stella', 'Wanj', '', 'palstrefsh', 'gsh@drs.com', '34556666', 'd520afbcabfbeba05195eb03463894bdf6c8afe0e021e90fa5359e524c390f87377782e8916f0f6bc4dcd6df579780c6ffa4423606d181d51c48f398a122ea0b', 'c10d897fd2b1e07c9973a63602311f264af4e70041e0accb648f255a9d790df709b95c681358bd9aeaefd0f6b1574f28b744bdbd2f4f89fec1d94fce11510e60', '0.00', '0.00', 'Personal', 'cbk', '92902', '929020202', 'Isle of Man', 'IMP', '£', '', 'UNVERIFIED', 0, '-0.196316545'),
(143, ' Atowoju', 'David', '', 'digipay', 'smallrich14@gmail.com', '2348035314520', 'f73827a1d32d86c8a84fd7ca619c8d33b913142b9d0339767693825db4d219fbb1508673fc32b607663c7d245572acc6576a71c04e46d1a1360a8db5177020a7', '9b7e4aac332fc200153275e2486c38826ce3464754e46071896d4f9d08eb46db1ab3b675fd6be6fe321a3d55f44c9883034d17008f727bb6a2375fc983bb0816', '0.00', '0.00', 'Business', 'gjck.,', '234', '56789089685', 'Nigeria', 'NGN', '?', '', 'UNVERIFIED', 0, '25.0476743075'),
(144, 'Francis', 'Munyalo', '', 'Muhaja', 'Munyalo@gmail.com', '', '93d52c9365b8638b9093e9e6c77132803f5643b54925556281bb0fca84c9a347acfa75f75c7f5477ab7ea7b6fa5199cb0eba840b46f1769b15f2337c98e7b2ff', 'd750b58736614a6551e347d9f408b6c0ceff6731996090d7ace43ae3ec3f9cc88b4cf49109fee03008d62f9bdd7fdd9a6c71ddabbc87644aa34c00a961e121e2', '0.00', '0.00', 'Business', '', '', '', 'Angola', 'USD', '$', '', 'UNVERIFIED', 0, '-0.1802139025'),
(145, ' Gabriel', 'Miki', '', 'gabgsjjs', 'Miki@gmail.com', '7299292', 'bae94c810ff2f0b24e97ee93ee0a60b7574992443cc345038446e3b7562b836905a5b32f8dc4e0d5e45c8978c7b7ce3c945361ee21d47db1e43a61ad2bdb2c19', '2d949615e0d833b37f247fac35c58bef6dfd0f7fa33cee8513f26e6f96fa0843db07074d7869ec69978f7529f383e8ec80d98b3ac42ad9e34bd743e245c8a2fc', '0.00', '0.00', 'agent', 'RNB', '829202', '209020202', 'South Africa', 'ZAR', 'R', '', 'UNVERIFIED', 0, '0.7475'),
(146, 'Oduor', 'sheban', '', 'ioduor', 'ishmaeloduor@nbihosp.org', '', '64c9b965d9bce7ace7740ff817dd8e30a6a1ce0aec5060d9d84947a0f692c09471ea6892e2637a6d14fbc94f170a8f3228f889c8c2402c692e3bb611b17f542a', '27ea2be069371951b44cfa071827178551fddddcbe2d004bcd20efdc3b7de6b9c9ee03cf12973c70ea9b364624dfbe6b99d1b762888d82bcb6c2b1a5663a0316', '0.00', '0.00', 'Business', '', '', '', 'Kenya', 'KES', 'KSH', '', 'UNVERIFIED', 0, '6.77787827'),
(147, 'Anish', 'khatri', '', 'Anish', 'j.cachet3@gmail.com', '', 'b4359142f10559cdb0b2f13e8e4f528d89436f025554fbfd5664577a958e1536fb540da50e211767650e9f8b82ea01bdc5d40bb1245aa34e0dad3c3456fd97a5', '87dc47ae0a3d48034981a13bdec43839aa9c37b86d3cb9ab8f9b198486fbb3acf2db2d6dcaa648c55280fcdb7bcc849b107790ffcc49c4221da33fa65f4c81fe', '0.00', '0.00', 'Personal', '', '', '', 'Nepal', 'NPR', '?', '', 'UNVERIFIED', 0, '7.69771292'),
(148, 'Craig', 'watt', '', 'ben01', 'kwatt27uk@gmail.com', '', '966d63de4cb8a20ff1b46d13604358870d8c9086aa81d5bc2f83c682217447fbdb2262ee7182ca49d73a65b0b6f2ce5021c495eadcd749aa1a97ad82e33d179a', '78e2c2e53da9e26a82ba41e02cc44dd6bcbadf3ba35d80896c10694ce3bac914e4494a535a61b76926c4e27ead1d3a32a35c5a06a20f093355c5766d6066876b', '0.00', '0.00', 'Personal', '', '', '', 'United States', 'USD', '$', '', 'UNVERIFIED', 0, '-0.1802139025'),
(149, ' Caique', 'Mar', '', 'caique', 'caiquemarcelinosouza@gmail.com', '75992426909', '31035dd5a1ddf37f1a1cbe60a5fa01455f8b48db971cc082f9d1e53ec6d4e65cd2494819ea4218c4a111dcee142836c5a3f7a14d616296913bc5461c4697e04b', '8d6e92663a490cc9f132c405516800b653ef0e14ab5b34ae0217e6979f380670c3bf89a867abec3688ce8e24bd3caa14fc8b94ad56310c2fc903dc809cebaa42', '0.00', '0.00', 'Personal', 'sdasds', '343432', '44454', 'Brazil', 'BRL', 'R$', '', 'UNVERIFIED', 0, '0.0361558175'),
(150, ' brakz', 'brian', '', 'brakz2019', 'bosirebrian.bb@gmail.com', '0700006928', '5a0f1ecae5478ac97619554b07e5288285d35e6a05f738e70a3463d9e5adfad6a34c5e9ee3ede834da2b2ab32054c9493ff9eea348a6f05f308755eec9f4f384', '92bc2dce5d24d3085f450918aa186823e65b4620b1eb7224ec68a643d89087f68aed3f942f834d2f3eee9703c5e8556ce35b3cb52c2efae5475f826923e2e0bb', '0.00', '0.00', 'Business', 'KCB', '65463783', '3I8374447832222', 'Kenya', 'KES', 'KSH', '', 'UNVERIFIED', 0, '6.77787827'),
(151, 'julien', 'lespes', '', 'julienteste', 'lespesjulien33@gmail.com', '', 'ddff21d6d0dfaf550c645aee0f7ab874dc8ef6816730fb784cd33fd7c3fa3690cdf5824e35bd1103eaf277c5bbaff39e277ff78d47b347a37de9d2719a6a3307', '20b0c8a4ca3045980b727717e2989776ac7a876b65e19bd422c88f0ea83345bf7c55b3b5101bbb4a61a173e58f9b4be9102f6093fcef9c7dd4b23b64594490cf', '0.00', '0.00', 'Business', '', '', '', 'France', 'EUR', '€', '', 'UNVERIFIED', 0, '-0.187015855'),
(152, 'dedy', 'aprianda', '', 'dedyaprianda', 'dedi.afrianda@yahoo.co.id', '', '8088db83785e1cf214a8989b739ba1de3ac1031a144bfc6cf1bd183ebc1b1a5f24acc70a9be926fb8ecbaaee7634eb4917ac648f0a02aa9248615c26ff6a9d3a', 'caae237fd765ee6c62ad86c1be3824e28e5363cd2664f8da0b73a110b6b04926e4716ebd322f9afb54cd1db907dc5064688314efc0f05f3109e0e06f29f8e8af', '0.00', '0.00', 'Personal', '', '', '', 'Indonesia', 'IDR', 'Rp', '', 'UNVERIFIED', 0, '974.435583988'),
(153, 'samuel', 'gathundia', '', 'Sammy254', 'gathundiasamuel@gmail.com', '', 'fefc3af5be739b6e4ccece7e23db58fc2a6abb8f26dc17c5f12a3da3207fe8d40b6adc3f8c410be49fd44508efa0f47b3c0d37382e6eda0325a625fcae854c70', 'ec317d536f2586df11bb66d2ef2c6d2ba9f8884616ac3571055e3065594d4712ff13e98c89b859e1b8e5468b5a96403d325f746f1280ea741e51b1d733e0a41d', '0.00', '0.00', 'Personal', '', '', '', 'Kenya', 'KES', 'KSH', '', 'UNVERIFIED', 0, '6.77787827'),
(154, 'Rafael', 'Almeida', '', 'carazolli', 'rafael@hollo.com.br', '31986079954', '931d307b234b08d673d31c54e487b28f0c5a6fdf1f7248b74248f0c5b7b50cb1dad2e9101c7d4554114856ebcdb400c0849395a02ce2d88af68ac21221d8dbe1', '9c70ebbef293d3c11670a51e9200a95a45e4a0bd6053acbea56d46235deff0e6f0a208b3dd334025fa89ffb5c6b7bdcabfcbef0386baf9672f46d471c22889e4', '0.00', '0.00', 'Business', 'Inter', 'Brasil', '7528235389', 'Minas Gerais', 'BRL', 'R$', '', 'UNVERIFIED', 0, '0.0361558175'),
(155, ' Saintz', 'Vincent', '', 'PrinceSaintz', 'Princesaintz@gmail.com', '994949449', '97c39280fd8eee1bf34aa988856cdf9f07c27c4ca990c21b04a5352a4fb622fd03cdc9ae8e668e95090a68e86945bac7adaae9efd1904946ca0cf08830391c85', '29bad830eaf668ef49ab7c428ef8ad457e521ab5f51cfae9af76f27f7d1a388056294ae6f21c3c999b26f78565d870967bf8a3483d79194a3df4cba6abb56004', '0.00', '0.00', 'Personal', 'wwwws', 'sssss', '33333', 'United Kingdom', 'GBP', '£', '', 'UNVERIFIED', 0, '-0.1963374925'),
(156, ' peter', 'nsubuga', '', 'peter001', 'hr@crested.co.za', '07726054548', '52a665e8b0fea6b864d6a5be918a771a60431ca90510319ac6a3f228947eb5f9a28cfb207dea0edfcc8ad4ce4cbcfd5502b0e18ab7cd807e4974752f18836ac8', 'f8bf96ea4e76d6b162ac388ebb32394b7bbd5b9abc0a155323b9670395d0edd913a4e6a5c5cd89fa50761af859729b503e5c4e4224203eedc187ddf7b7643e01', '-2.42284187982', '0.00', 'agent', 'kcb', 'kcb uhg', '985866', 'Uganda', 'USD', '$', '', 'UNVERIFIED', 0, '-0.1802139025'),
(157, ' patrick', 'kiyemba', '', 'kiyemba', 'kiyembap@yahoo.com', '0739647888', '2361333fba87db44eb841d844ac6803de6e46cece59a3bb41d1c5ec717762c75ddce523df955f566f4a7b0fc0c075b545e3bfe8d60d46caabd0dac58b55af9e6', 'fa3e7278e847b666dfdfa5fc0d81c1ec3f0d92536c7940a8672e618262f6605d07a21796b086f89cf083be768eee76902cfe3f14515cc9a599cfc8eceb04253a', '0.00', '0.00', 'admin', 'barclays', 'kcb uhg', '985866', 'Uganda', 'USD', '$', '', 'UNVERIFIED', 0, '-0.1802139025'),
(158, '  patrick', 'kotza', '', 'crestedcc', 'crestedcc@gmail.com', '0727284683', '17fb56181ef59d9c17bfe518390c58f8a230ca665cdf6e85b5c642ce28cf7d7bdcac98e3521c73ebd863456f05b71464e986b923588bedce003f025f96ae558a', '1723ab7620b382d7de110b81b3fd2df8bc1daf1ff76225b87d5a6d0cda4364644cacf789e2239ec25954394a2a219702910be115470e22861695df8c198020df', '289.579964', '0.00', 'agent', 'absa', 'brabj', '58565', 'South Africa', 'ZAR', 'R', '', 'UNVERIFIED', 0, '0.7475'),
(159, ' patrick', 'kiyemba', '', 'sadmin', 'saadmin@binitoo.com', '0727284683', '69458a19d2fe90e613621f994e47d7054e17cd9bb75ec23777fd66b374d81cc1839fb6eb5e2f2b7fe0591397064f94258d8fda8247bc780602da4f7672e2ebb0', 'ba54b25cd787f7c6219b1ac3ca03580cf82da1107032007375fd8708b8d783416679755fd5e8fb13c673f617c9141fed2e9dd15e774a98e153ad1292e03c3608', '0.00', '0.00', 'Business', 'fnb', '2565005', '62264672702', 'South Africa', 'ZAR', 'R', '', 'UNVERIFIED', 0, '0.7475'),
(160, ' lule', 'ernest', '', 'lulekabungu', 'ugadmin@binitoo.com', '3', '6f600d9b6aad9d42ee2b2c7a74eb59af43c6e1ff405b70d410487d246d1561c792d9436f17a2f2ea73354e2d4f7100a62901ebc9ac2820eeb5e5b573fe4e4d9d', '6593614e2dc60c16391929e255ad1e0f186f5a4913c48465402a847ea70cf1b43c9e42f878be8473c9cf478cc50ea9e482f37e318c2920f9b119beb583caebf9', '0.00', '0.00', 'Business', 'stanbic', '5442245635643', '35463369', 'Uganda', 'USH', 'UGX', '', 'UNVERIFIED', 0, '4095.854777'),
(161, ' Brian', 'Mbiki', '', 'testhjs', 'briangurucoder@gmail.com', '0706745202', 'cc49c67030be781d1d5eaec8c7cd3063e1a469ed2bf63afc2f8266f8a6d979f2f9485093c499d662b8226b9c72510eb29c9345770b9d79de770c132ff4b9bd6e', 'c1972866c9f541b2fd6cc615b6b73cdc16eb4efc9b09923b82350fd104175412fbfd289dd2aee3716bf30d591fe059b26267dc48ba23cfa2fa9d19830722d0c0', '0.00', '0.00', 'Personal', 'ga', '23', '23', 'Andorra', 'USD', '$', '', 'UNVERIFIED', 0, '-0.1802139025'),
(162, ' jabulani', 'happy', '', 'jabulani', 'mashebe@drkantu.com', '07726054548', '0e561595e0d89aef71c3377b4959d75df8745dfd9b9a91aa838d218ae48b197b744313441d4cfc5989c346ec58b51d0896999101a75590d408f2438c39a0f8d6', 'ad1b84cc08656b713a4dc62fa75f674ab7c28daa8f2babef579ef18f1a74d6fec77a96e652b6948b0f84611ae973f441b7be85c5591b7768a52b0fde5cbb881d', '13', '0.00', 'agent', 'kcb', 'kcb52', '562236556', 'Uganda', 'USH', 'UGX', '', 'Verified', 0, '4095.854777'),
(163, '  nokutula', 'kiyemba', '', '0660197181', 'patrick@crested.co.za', '0645333665', 'c5854deea6f2c99b3f304db3ada5c6fb51a80c17babc54ac34aef1e5334012956f459962f8618c57b1426bc4783786ab06a4399fed24aeb014602c812259bb5d', '8ea7d8392c2cdb3c67eff4b241c4baff3e8200acd89ff12fe6a4577b1bd9ac2ef8f47a86c60e679dd97640bfda5f8fbe298dac591aafe62d9404ff450e16c29d', '560', '0.00', 'Personal', 'absa', '24658', '9216773105', 'South Africa', 'ZAR', 'R', '', 'UNVERIFIED', 0, '0.7475'),
(164, ' ngobeni', 'paul', '', 'ngobeni', 'ngobenie001@gmail.com', '01245665', '86df951eda3e63625fa36e7a98ff0b8e5eb65127221a142cd73d9cff5969920908f98b73a602e87b48274b05eff4f4012eef6491867f91dba8c1181301b68deb', 'ab0515fdcdf77b75b063036350c00ab59dc133c9ba4f8acf93638b9b0de6c161ab8269793214ae60ec8dc7e48d0402bf0bb00c40ecc38397407adff27f3eaca8', '0.00', '0.00', 'Personal', 'fgv', 'dfd', '13265', 'Uganda', 'USH', 'UGX', '', 'UNVERIFIED', 0, '4095.854777'),
(165, 'ratu', 'masego', '', 'masego', 'ratu@shopsadirect.com', '', '306385ee4722c3ecb9eaf56d52654508268ca2329fb95b640060857e16d66a61516aa942975208cfc5f825309217d39ea2ffad29805449138a6549b812355677', '9a938b9618fd09bb805624d714ac8cc66393766c2df10c412bf6f98bbb45e1e0587ccbefb0dd4c3061cc93d88b592873c2739ad8bddf6866eda245189e42b9da', '0.00', '0.00', 'Business', '', '', '', 'Uganda', 'USH', 'UGX', '', 'UNVERIFIED', 0, '4095.854777'),
(166, ' kiti', 'soro', '', 'kitisoro', 'ratau@shopsadirect.com', '0645333665', '248432d3797cbcaf952ffa1e4150747a344ddbb0cdaac87360a432ecbeb601877a1e0b46ac06e998383429a69d7ab90c3565585b8ea5d6d861d49ecb984b771f', '6a1f07187aa2700f8c931aa4a758d6bb9c8760420a08b9ec69cb9993c8274661a4ad736f21de7b654f752819f8e1eb539af8fbbe03e979412477e2caa691d8e7', '58.6446573615', '0.00', 'agent', 'kcb', 'Uganda', '985866', 'Gauteng', 'USH', 'UGX', '', 'UNVERIFIED', 0, '4095.854777'),
(167, ' ernest', 'lule', '', 'elyueli', 'ernest.elyueli@icloud.com', '0783607003', '5d04b1267eb84c75ad302e299f4f6b3738328a7d05ef8b57b127b8ccc986b426131fe773d88d85dee63a39d88a3c42e48f1036ccd4d581e8f279e5f4467f3b6a', 'f15999a8147cce1afa3bf21c79978f7a226ec0066087c0b48b91a92406b6a77c7d3b79f1c21b6d68d67c76aec6cd2397e45b8d3dfa19033436eda8d16735a7dd', '0.00', '0.00', 'Personal', 'unute bank for africa ', '588', '0001294277', 'Uganda', 'USH', 'UGX', '', 'UNVERIFIED', 0, '4095.854777'),
(168, 'Patricia ', 'Muliika', '', 'Muliikap', 'edwina_patricia@yahoo.ca', '', '91ad958edad431537317302d4e3ed68fe8eefb6b78dd0557c8a62a9865fed65d0bdf10c0a812ccdd5a08a0fd7c3084d986683670522f659f60dbe105cd177461', '7c23f13a30330df2b8e94f6dea5a3e1085a519f6182c0f6bd23f4c5b4fc1b93bf9b4002c5e1cc0f3f76fbc34383fbda3649e58e0b24b55eb523b46ed03c2f692', '0.00', '0.00', 'Personal', '', '', '', 'Uganda', 'USH', 'UGX', '', 'UNVERIFIED', 0, '4095.854777'),
(169, 'Alex', 'Simon', '', 'Akitelah', 'alexakitelah@gmail.com', '', 'ff47b5d0d80fe1a87eb07a2a04be3f856f1de85a340521e6a968009b84c00758f2cca532cf7ad9b649f161617ff487615ebaad08416f61b31297562901625a53', '7ede46c3f1ab4d947c276009d307718eaea32b70aba9801b6ea09021c4d672f768bcc6b89b7aa7cd33d44251fdc7c883971007cf38fc860e8fa6d79a062f840b', '0.00', '0.00', 'Personal', '', '', '', 'Kenya', 'KES', 'KSH', '', 'UNVERIFIED', 0, '6.77787827'),
(170, 'Billy', 'Cosby', '', 'cosbyflamez', 'cosbysting@gmail.com', '', 'fc1e7d8f66bbac5dbc2b75e4e9606c5b62fa8eeaebd873d4b8b4ba6c879bfb4ed817d2cca800317e0da701bea575551ba45d9bcaaacf5efcfa0521e118f364a1', '5f4fb75d2e8410f97e7cb808dd9297b9273feca8948e9c516d0014500e621da44dd2755a6ea1e7b5b74b12dc4b22e1efd37986f0906345ed248d9df992113acb', '0.00', '0.00', 'Personal', '', '', '', 'Kenya', 'KES', 'KSH', '', 'UNVERIFIED', 0, '6.77787827'),
(171, 'Benson', 'Odongo', '', 'benson28', 'bensonodongo28@gmail.com', '', '2f87a43d3241fc0245e8f952d77d904d2eaad86f4e2ac54d54c1840b7e04507b578937ecc7ae0803e68846c489b74a182451f8c4948b048e8a3498c3588e6bf4', '5468b4858a7f71dc47b042170d45eb4289467de46f1f23a649c3383b8874c0caabc4435340ced522e31d6671b1650d72c4c2a42cf403c068ea702fed1a5d92b6', '0.00', '0.00', 'Personal', '', '', '', 'Kenya', 'KES', 'KSH', '', 'UNVERIFIED', 0, '6.77787827'),
(172, 'Carlos', 'De Freitas', '', 'Carlos', 'cdefreitas15@gmail.com', '', '7d0d9be72911fca9f545666e426f430c7425f2427249537f3d2e96963a7cf162a966efe19bf7548754a52814b947064f2a411459056dacce97ba132413ad8070', '0e3c0ea20ec9d29c94aa8521df119680b829b6e52bb926fcdf6dad15c0c2c0903d009fe20e22f80557817b1789a52c38867922fd90e525f6c17de622f279c7a7', '0.00', '0.00', 'Personal', '', '', '', 'Namibia', 'NAD', '$', '', 'UNVERIFIED', 0, '0.74657033'),
(173, 'Melissa', 'Bennett', '', 'Lisa', 'benettmelisa@gmail.com', '', '9a0ca13ec86ba89fd81193c2d141809825db19461bc0e323f771e19bc2cf83b7e1282e9601cbbddb9a1aba43c946dd06e42a121cea1f801f1ef4e2cbb1281d11', 'a5a167ea7f50d197714e10ed3c5ea33f41110845a8cafebde0b9ba4ccc71b8259783d3f191867cbc0f4be4270bb36098203c9d9830f52ae9f11203d99e0a9a68', '0.00', '0.00', 'Personal', '', '', '', 'Swaziland', 'USD', '$', '', 'UNVERIFIED', 0, '-0.1802139025'),
(174, 'Emmanuel', 'NSHIMIYIMANA ', '', 'Emmy', 'nshimiyimanaemmy231@gmail.com', '', '8ff6289667252e476dbaf227538f10a6b733cf74c51041030e8b7ffb88ef2c9956601f24dd6811fc68c51e9b0544e15944d82e3e80cadcf4e1552a41ad215f53', 'c39f89bdfa2582635254dc95115b3819f1bd8ede1c0d97925a1a0bf435c97b7080f06d64406ba5836c2eac017997c00024c8f7466722eb01dd326ebed9615a20', '0.00', '0.00', 'Personal', '', '', '', 'Rwanda', 'USD', '$', '', 'UNVERIFIED', 0, '-0.1802139025'),
(175, 'Paul ', 'Mukasa ', '', 'paul1', 'paul1@mail2paul.com', '', '6092f136f03ef2d28d3b2e978820fa722ee9e9da2dfc225dc8b8402e49ab19ab3519308db5f6125fd8b1947f8375050d5857edf576ee77ba064ff874e2721c89', '82f2466900fc0df36a85a1ea236c0e308d55d889ee084e8fd1b3f7bd27c1fe1a7daaf07b9d5e1aeda244a418372242dedfb38c9fb3a5b00a9bfe48b2fbc0c01c', '0.00', '0.00', 'Personal', '', '', '', 'Uganda', 'USH', 'UGX', '', 'UNVERIFIED', 0, '4095.854777'),
(176, ' vikhyat', 'singh', '', 'vikhyat', 'vikhyat.geek@gmail.com', '9873702995', '1554925564009ad5881df6ba4a1d969248933bb9f47c01f738705d95fd052b31e18e2f46be53630ca25f99af4977ac4e81ec010dc5115f30f924226941ab4c32', '04944005a4fe64c1b2e37a693e731f744b045d42a18ef4f28e92c6b2fa7612c5eef296e2e342ee1d5ce77c39652ace77ee348a4229f61318cca11b58b2589103', '0.00', '0.00', 'Personal', 'HDFC', 'hdfcisi', '398127389217389', 'India', 'USD', '$', '', 'UNVERIFIED', 0, '1'),
(177, 'vikhyat', 'singh', '', 'flaunt7', 'contact@flaunt7.com', '', 'c211ae9e8b55e6c60eb6e2f70b9854911eb757e6610fc1602f291a28cf4e118d8958d5a9b15f9cb513c12c6bbecfc78d50037d8893555417ec6a9f14ce0952c8', '44826a311aac9cacb0d4ec202dc77b8a087c9c750706ed9648e3305280a0c0d50c5b200d4ddff9f7da2d5afd00a6e313dbcc0ae6dd68282764a7a5f49f1c2ff7', '0.00', '0.00', 'Business', '', '', '', 'India', 'USD', '$', '', 'UNVERIFIED', 0, '1'),
(178, 'Abrar', 'Fairuj', '', 'Abrar06', 'allthingsremainhere@gmail.com', '', '55211ac9d64ad9e69c69b2c9f7061c55025f571e732189c5461bb058e18cdd2a41c309e97d3f7ee1b495baebf207c49f5f8ca888863209535355382a5487e990', '2179474af49cae31e5c1c9920c430f5743b975561c07b3b16ef92de5764abd5d0f21a58db082021bbe3291f2799e8b010a24a4dae691c13d1840585ea179aa1e', '0.00', '0.00', 'Business', '', '', '', 'Bangladesh', 'USD', '$', '', 'UNVERIFIED', 0, '1'),
(179, 'Chris ', 'Jones ', '', 'Cj31890', 'Chrisj31890@gmail.com', '', '5461987bd3cc26a0b4c32435ca83d2d0accb7d6b84ecaad2107971ba790522250f35ad84a2234d6758e625986114f42f4fd102de3582e93c5374170b80dfad92', '98e15b9a932da5ef7bdab50e69bcc914595b51203d9463fb603b9288c65440a9062ae985a2848b0a8b5fb7a113a5ed975542de97f476c2c82b0b6d196aeda783', '0.00', '0.00', 'Business', '', '', '', 'United States', 'USD', '$', '', 'UNVERIFIED', 0, '1'),
(180, 'Sarker', 'Abhi', '', 'adittoabhi', 'adittoabhi1997@yahoo.com', '', 'd2aecb90eae1f246835a1f00beae5d9b47efb8d94875b4ea25aca9a588d69259abc6538b970f45a42c51aafcc3f86bd43f0c0764073fb8630049d27345cce1cb', '61d14f93d868dd2452825ff337035eea0506c1d4cccfbb59352d8206ea42b3bef4860da3501afff482040bbcbb984a145a36f1a41b39968e302bba7fff5e06c4', '0.00', '0.00', 'Business', '', '', '', 'Bangladesh', 'USD', '$', '', 'UNVERIFIED', 0, '1'),
(181, 'DEMIL HIDIA', 'AZAZ', '', 'demouser', 'glass.kaca0312@gmail.com', '', '3aac308beaf1c3164a3cb79fe3b1b5e282c584489ead9d93e15c34971be0c5ea481fdd0c116dab9819deeff2dafd6d1ba835231d489c08788a0ccea2dacb5df6', '445dd4772728d10cb1f14f1815d16f23b77ad0746ae7ba6779adf340cad4b6e4b525d226735ea701112d152c0dd25e3231ea80f911a75135353c93003cf2c1fb', '0.00', '0.00', 'Personal', '', '', '', 'Indonesia', 'USD', '$', '', 'UNVERIFIED', 0, '1'),
(182, 'Shoaib', 'Afzal', '', 'webdgaps_common', 'shoaibafzal768@gmail.com', '', '066dee7f754523303ec25b3757016c279c100a8e0f5502e0c16795693f1b259ae2ec00ea5b1c72354ab88f7e18f54b7b195858754c03f947b75a4872ca5df108', 'fb14b35b8a35a3d5390c85b7ecb8c1f69c691fe17aa50f4633ae0e03202c6227972cc5e25fe2c14b1d758c00b25675e547d6d200b52f4c53bcfe410b827e8289', '0.00', '0.00', 'Personal', '', '', '', 'Pakistan', 'USD', '$', '', 'UNVERIFIED', 0, '1'),
(183, ' arnold', 'roy', '', 'opiyoarnold', 'opiyoarnold@gmail.com', '0700444000', 'bccb887ed679bd09ca11ee750818a062212e34f1d563575b90aa4f2acf417de15a8304fb89e2e87a950cbca80927fb3a6ffc92712e8431006f4942ccc1a53fb6', '30148d27dca28d73ef1859e51bf9aaa68a0afb651c80733a8945eb4b92f1ef6226f4d4346b6b61af561a2bf2d9ee071a0414619253079478a9671a9e38b3c15a', '0.00', '0.00', 'Business', 'Equity Bank', '00100', '00100010000', 'Kenya', 'USD', '$', '', 'UNVERIFIED', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mpesa_b2c_settings`
--

CREATE TABLE `mpesa_b2c_settings` (
  `id` int(11) NOT NULL,
  `register_url` varchar(200) NOT NULL,
  `confirm_url` varchar(200) NOT NULL,
  `validation_url` varchar(200) NOT NULL,
  `paybill_number` int(11) NOT NULL,
  `consumer_key` varchar(200) NOT NULL,
  `consumer_secret` varchar(200) NOT NULL,
  `security_token` varchar(200) NOT NULL,
  `encoded_token` varchar(200) NOT NULL,
  `initiator_name` varchar(60) NOT NULL,
  `initiator_pass` varchar(60) NOT NULL,
  `security_credential` varchar(200) NOT NULL,
  `command_id` varchar(33) NOT NULL,
  `remarks` varchar(33) NOT NULL,
  `queueTimeurl` varchar(200) NOT NULL,
  `ResultURL` varchar(200) NOT NULL,
  `Occassion` varchar(200) NOT NULL,
  `e_rate` varchar(33) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mpesa_b2c_settings`
--

INSERT INTO `mpesa_b2c_settings` (`id`, `register_url`, `confirm_url`, `validation_url`, `paybill_number`, `consumer_key`, `consumer_secret`, `security_token`, `encoded_token`, `initiator_name`, `initiator_pass`, `security_credential`, `command_id`, `remarks`, `queueTimeurl`, `ResultURL`, `Occassion`, `e_rate`) VALUES
(1, '', '', '', 892926, 'dddd', 'sdddd', '', 'xxxx', 'Brian', 'testAPI123', 'jskswuowopwpwjlsls', 'BusinessPayment', 'Withdrawal from Payments', 'https://www.paymentprocessor-script.com', 'https://www.paymentprocessor-script.com', '', '103');

-- --------------------------------------------------------

--
-- Table structure for table `mpesa_c2b_settings`
--

CREATE TABLE `mpesa_c2b_settings` (
  `id` int(11) NOT NULL,
  `register_url` varchar(200) NOT NULL,
  `confirm_url` varchar(200) NOT NULL,
  `validation_url` varchar(200) NOT NULL,
  `paybill_number` int(11) NOT NULL,
  `security_token` varchar(200) NOT NULL,
  `encoded_token` varchar(200) NOT NULL,
  `consumer_key` varchar(200) NOT NULL,
  `consumer_secret` varchar(200) NOT NULL,
  `sms_on` varchar(33) NOT NULL,
  `e_rate` varchar(33) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mpesa_c2b_settings`
--

INSERT INTO `mpesa_c2b_settings` (`id`, `register_url`, `confirm_url`, `validation_url`, `paybill_number`, `security_token`, `encoded_token`, `consumer_key`, `consumer_secret`, `sms_on`, `e_rate`) VALUES
(1, 'register.php', 'confirmation.php', 'validation.php', 693165, 'shjjskslslss', 'xxxx', 'shsjskks', 'jkslslslsl', 'ON', '34');

-- --------------------------------------------------------

--
-- Table structure for table `mpesa_payments`
--

CREATE TABLE `mpesa_payments` (
  `Auto` int(11) NOT NULL,
  `TransactionType` varchar(40) NOT NULL,
  `TransID` varchar(40) NOT NULL,
  `TransTime` varchar(40) NOT NULL,
  `TransAmount` double NOT NULL,
  `BusinessShortCode` varchar(15) NOT NULL,
  `BilRef` varchar(60) NOT NULL,
  `MSISDN` varchar(20) NOT NULL,
  `First_Name` varchar(60) NOT NULL,
  `Middle_Name` varchar(60) NOT NULL,
  `Last_Name` varchar(60) NOT NULL,
  `OrgAccountBalance` double NOT NULL,
  `custBalance` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mpesa_withdrawals`
--

CREATE TABLE `mpesa_withdrawals` (
  `id` int(11) NOT NULL,
  `requested_by_username` varchar(33) NOT NULL,
  `site_registered_phone` varchar(33) NOT NULL,
  `amount` varchar(33) NOT NULL,
  `amount_paid` varchar(33) NOT NULL,
  `fee` varchar(33) NOT NULL,
  `request_id` varchar(33) NOT NULL,
  `status` varchar(33) NOT NULL,
  `mpesa_code` varchar(33) NOT NULL,
  `payee_phone` varchar(33) NOT NULL,
  `time_requested` datetime(6) NOT NULL,
  `time_paid` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offline_MOBI`
--

CREATE TABLE `offline_MOBI` (
  `id` int(11) NOT NULL,
  `MOBI_name` varchar(33) NOT NULL,
  `mobi_number` varchar(33) NOT NULL,
  `value` varchar(33) NOT NULL,
  `allowed` varchar(33) NOT NULL,
  `currency` varchar(33) NOT NULL,
  `e_rate` varchar(33) NOT NULL,
  `allowed_country` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offline_MOBI`
--

INSERT INTO `offline_MOBI` (`id`, `MOBI_name`, `mobi_number`, `value`, `allowed`, `currency`, `e_rate`, `allowed_country`) VALUES
(1, 'Mpesa (Kenya)', '0706745202', 'Mpesa (Kenya)', 'yes', 'Ksh', '6.35', 'Kenya'),
(2, 'MTN (Uganda)', 'Binitoo', 'MTN (Uganda)', 'yes', 'UGX', '245.8', 'Uganda'),
(3, 'MTN (Cameroon)', '922002022', 'MTN (Cameroon)', 'no', 'CSH', '23', ''),
(4, 'Tigo money (Tanzania)', '25579020222', 'Tigo money (Tanzania)', 'no', 'TSH', '55', 'Tanzania, United Republic of'),
(5, 'Vodafone pesa', '829200202', 'Vodafone pesa', 'no', 'USH', '34', ''),
(6, 'AIRTEL UGANDA', 'Binitoo', 'AIRTEL UGANDA', 'yes', 'UGX', '245.8', 'Uganda'),
(7, 'FNB EWALLET', '0739647888', 'FNB EWALLET', 'YES', 'ZAR', '1', 'South Africa'),
(8, 'STANDARD BANK INSTANT MONEY', '0739647888', 'STANDARD BANK INSTANT MONEY', 'yes', 'ZAR', '1', 'South Africa'),
(9, 'Binitoo Wallet Card', '', 'Binitoo Wallet Card', 'yes', 'ZAR', '1', 'South Africa'),
(10, 'Binitoo Wallet Card International', '', 'Binitoo Wallet Card International', 'yes', 'Zar', '1', 'ALL');

-- --------------------------------------------------------

--
-- Table structure for table `password_retrievals`
--

CREATE TABLE `password_retrievals` (
  `id` int(11) NOT NULL,
  `username` varchar(33) NOT NULL,
  `email` varchar(33) NOT NULL,
  `retrieval_code` varchar(33) NOT NULL,
  `date_retrieved` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `code_expiry` datetime(6) NOT NULL,
  `status` varchar(33) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_retrievals`
--

INSERT INTO `password_retrievals` (`id`, `username`, `email`, `retrieval_code`, `date_retrieved`, `code_expiry`, `status`) VALUES
(33, 'mimiaaa', 'paymentprocessor@gmail.com', '12220', '2019-11-06 07:32:28.000000', '2019-11-06 03:32:28.000000', 'Not Used'),
(23, 'crestedcc', 'crestedcc@gmail.com', '15728', '2019-10-15 08:08:57.000000', '2019-10-15 05:08:57.000000', 'Not Used'),
(24, '0660197181', 'patrick@crested.co.za', '18234', '2019-10-30 06:00:55.000000', '2019-10-30 03:00:55.000000', 'Not Used'),
(25, 'kiyemba', 'kiyembap@yahoo.com', '10719', '2019-11-01 15:08:46.000000', '2019-11-01 12:08:46.000000', 'Not Used'),
(26, '0660197181', 'patrick@crested.co.za', '14893', '2019-11-01 19:37:54.000000', '2019-11-01 16:37:54.000000', 'Not Used'),
(27, 'kiyemba', 'kiyembap@yahoo.com', '18013', '2019-11-01 19:40:47.000000', '2019-11-01 16:40:47.000000', 'Not Used'),
(28, 'peter001', 'hr@crested.co.za', '10843', '2019-11-02 04:01:41.000000', '2019-11-02 01:01:41.000000', 'Not Used'),
(29, 'crestedcc', 'crestedcc@gmail.com', '11845', '2019-11-02 04:02:15.000000', '2019-11-02 01:02:15.000000', 'Not Used'),
(30, 'peter001', 'hr@crested.co.za', '21143', '2019-11-05 11:17:38.000000', '2019-11-05 07:17:38.000000', 'Not Used'),
(32, 'mimiaaa', 'paymentprocessor@gmail.com', '11199', '2019-11-06 07:27:02.000000', '2019-11-06 03:27:02.000000', 'Not Used'),
(34, 'mimiaaa', 'paymentprocessor@gmail.com', '15930', '2019-11-06 07:45:49.857874', '2019-11-06 03:43:27.000000', 'Retrieval Accepted'),
(35, 'kitisoro', 'ratau@shopsadirect.com', '11042', '2019-11-06 15:04:53.000000', '2019-11-06 11:04:53.000000', 'Not Used'),
(36, 'kiyemba', 'kiyembap@yahoo.com', '12650', '2019-11-12 14:16:50.000000', '2019-11-12 10:16:50.000000', 'Not Used');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `method_id` int(33) NOT NULL,
  `value` char(60) NOT NULL,
  `method_name` char(60) NOT NULL,
  `allowed` char(60) NOT NULL,
  `withdrawal_method` char(60) NOT NULL,
  `deposit_method` char(60) NOT NULL,
  `conversion_rate` varchar(60) NOT NULL,
  `allowed_currency` varchar(60) NOT NULL,
  `swift_code` varchar(60) NOT NULL,
  `deposit_fee` int(60) NOT NULL,
  `withdrawal_fee` int(60) NOT NULL,
  `contacts` varchar(60) NOT NULL,
  `allowed_country` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`method_id`, `value`, `method_name`, `allowed`, `withdrawal_method`, `deposit_method`, `conversion_rate`, `allowed_currency`, `swift_code`, `deposit_fee`, `withdrawal_fee`, `contacts`, `allowed_country`) VALUES
(2, 'BANK', 'Bank Wire transfer (Offline)', 'yes', 'yes', 'yes', '1', 'KSH,UGX, Kshs etc', '', 1, 2, 'support@paymentprocessor-script.com', 'All'),
(7, 'BITCOIN', 'Bitcoin', 'yes', 'yes', 'yes', '', 'USD,Zar, Ugx, Ksh, Tshs etc', '', 1, 2, '', ''),
(8, 'MPESA', 'Lipa Na Mpesa', 'yes', 'yes', 'yes', '', '', '', 0, 0, '', ''),
(9, 'CARD', 'Scratch Cards', 'yes', 'no', 'yes', '1', 'Zar, UGX, KSH,TSH etc', '', 1, 2, '', 'All'),
(10, 'PAYPAL', 'PayPal', 'no', 'yes', 'yes', '15.10', 'USD', '', 0, 3, '', 'South Africa'),
(11, 'CC', 'Mastercard Credit Card', 'no', 'no', 'no', '1', 'USD', '', 3, 3, '', ''),
(12, 'DB', 'Credit Cards / Debit cards', 'no', 'no', 'no', '1', 'USD', '', 3, 3, '', ''),
(13, 'STRIPE', 'Stripe', 'no', 'no', 'no', '1', 'USD', '', 1, 1, '', ''),
(14, 'offlineMOBI', 'Mobile money (Offline)', 'yes', 'yes', 'no', '1', 'Zar, UGX, KSH,TSH etc', '', 0, 2, '', 'All'),
(15, 'BANK_REAL_TIME', 'Bank Wire Transfer (Real time)', 'no', 'yes', 'yes', '1', '', '', 3, 3, '', ''),
(16, 'Agent', 'Agent', 'yes', 'yes', 'yes', '1', 'ZAR', '', 0, 2, '', 'All'),
(17, 'EFT', 'EFT SECURE', 'yes', 'yes', 'yes', '1', 'USD', '', 0, 0, '', 'All');

-- --------------------------------------------------------

--
-- Table structure for table `scratch_scan_cards`
--

CREATE TABLE `scratch_scan_cards` (
  `id` int(11) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `generated_by` varchar(33) NOT NULL,
  `card_code` varchar(33) NOT NULL,
  `value_in_dollars` varchar(33) NOT NULL,
  `sold_at` varchar(33) NOT NULL,
  `admin_fee` varchar(100) NOT NULL,
  `status` varchar(33) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scratch_scan_cards`
--

INSERT INTO `scratch_scan_cards` (`id`, `date`, `generated_by`, `card_code`, `value_in_dollars`, `sold_at`, `admin_fee`, `status`) VALUES
(1, '2019-09-01 02:01:04.268644', '', 'ssjs7w8w99wjsjsjs', '34', '', '', 'Used'),
(2, '2019-09-01 02:01:04.268644', '', '6289sisosososojdjdd', '60000', '', '', 'Used'),
(3, '2019-09-01 02:01:04.268644', '', 'ywuiw82929292', '230', '', '', 'Used'),
(4, '2019-09-01 02:01:04.268644', '', '738393gdhdjdjd', '450', '', '', 'used'),
(5, '2019-09-01 02:01:04.268644', '', 'jakakakak', '400', '', '', 'Used'),
(6, '2019-09-01 02:01:04.268644', '', 'gshjsjkskskks', '3000', '', '', 'Used'),
(7, '2019-09-01 02:01:04.268644', '', 'fklllllllll', '54000', '', '', 'Used'),
(8, '2019-09-01 02:01:04.268644', '', 'xxxxxxdddfff4566', '566', '', '', 'Used'),
(9, '2019-09-01 02:01:04.268644', 'gabgsjjs', '6005889908', '100', '', '', 'valid'),
(10, '2019-09-01 02:01:04.268644', 'gabgsjjs', '5607329817', '300', '', '', 'valid'),
(11, '2019-09-01 02:01:04.268644', 'gabgsjjs', '9753686585', '300', '', '', 'valid'),
(12, '2019-09-01 02:01:04.268644', 'gabgsjjs', '1454353324', '32', '28.8', '', 'valid'),
(13, '2019-09-01 02:19:13.025554', 'gabgsjjs', '8637245158', '0', '0', '', 'valid'),
(14, '2019-09-01 02:22:15.392461', 'gabgsjjs', '9830493765', '2604.17', '2343.753', '', 'valid'),
(15, '2019-09-01 02:27:40.053440', 'gabgsjjs', '3864542478', '48.96', '44.064', '', 'valid'),
(16, '2019-09-01 02:55:56.842375', 'gabgsjjs', '7718063679', '455.73', '410.157', '', 'valid'),
(17, '2019-09-06 16:22:46.473018', '', '10002125', '10', '', '', 'Used'),
(18, '2019-09-06 19:10:16.417584', 'peter001', '3182750297', '10', '9.92', '', 'Used'),
(19, '2019-09-06 19:17:44.330051', 'peter001', '7527044808', '50', '49.6', '', 'Used'),
(20, '2019-09-18 09:12:07.361878', 'crestedcc', '3336836734', '48', '47.616', '', 'Used'),
(21, '2019-09-18 09:13:12.932546', 'crestedcc', '5254792292', '50', '49.6', '', 'Used'),
(22, '2019-09-19 09:58:49.699047', 'peter001', '7493178558', '10', '9.92', '', 'Used'),
(23, '2019-09-29 10:53:52.389790', 'crestedcc', '9956499762', '10', '9.92', '', 'Used'),
(24, '2019-10-03 04:03:55.228745', 'peter001', '8907538891', '13.79', '13.67968', '', 'valid'),
(25, '2019-10-14 09:08:30.683429', 'gabgsjjs', '1651075866', '10', '9.92', '', 'valid'),
(26, '2019-10-14 09:12:50.594324', 'gabgsjjs', '3703039661', '10', '9.92', '', 'valid'),
(27, '2019-10-14 10:25:53.469908', 'gabgsjjs', '8470133943', '10', '9.92', '6.4E-5', 'valid'),
(28, '2019-10-14 11:57:49.045065', 'gabgsjjs', '6519662615', '10', '9.92', '6.4E-5', 'valid'),
(29, '2019-10-14 12:01:49.812572', 'gabgsjjs', '6126873355', '10', '9.92', '6.4E-5', 'valid'),
(30, '2019-10-14 12:08:02.611301', 'gabgsjjs', '5090185904', '10', '9.92', '6.4E-5', 'valid'),
(31, '2019-10-14 12:12:38.693022', 'gabgsjjs', '8249596373', '10', '9.92', '6.4E-5', 'valid'),
(32, '2019-10-14 15:51:06.674276', 'peter001', '4531239928', '10', '9.92', '6.4E-5', 'valid'),
(33, '2019-10-16 18:19:25.965534', 'peter001', '9141665639', '10', '9.92', '6.4E-5', 'valid'),
(34, '2019-10-16 18:25:10.973594', 'peter001', '6828324087', '10', '9.92', '6.4E-5', 'valid'),
(35, '2019-10-16 18:53:53.365282', '', '0727284683', '500', '', '', 'Used'),
(36, '2019-10-20 14:29:21.669532', 'peter001', '8421801739', '272.73', '270.54816', '0.047604257856', 'valid'),
(37, '2019-10-27 08:06:58.214651', 'jabulani', '9940153819', '20.41', '20.24672', '0.000266603584', 'valid'),
(38, '2019-11-01 19:46:56.951143', 'peter001', '7555574987', '363.64', '360.73088', '0.084629791744', 'valid'),
(39, '2019-11-01 19:47:29.668963', 'peter001', '2382466152', '363.64', '360.73088', '0.084629791744', 'valid'),
(40, '2019-11-05 14:17:52.794487', 'peter001', '5642283812', '225.45', '223.6464', '0.0325297296', 'valid'),
(41, '2019-11-06 09:41:43.232457', '', '0727284683', '10', '', '', 'Used'),
(42, '2019-11-06 13:34:21.982432', 'peter001', '8762474412', '363.64', '360.73088', '0.084629791744', 'valid'),
(43, '2019-11-06 15:06:56.706989', 'peter001', '7285054867', '363.64', '360.73088', '0.084629791744', 'valid'),
(44, '2019-11-10 02:43:34.170590', 'gabgsjjs', '1125517445', '200', '198.4', '0.0256', 'valid'),
(45, '2019-11-10 02:51:43.127119', 'gabgsjjs', '6433712602', '100', '99.2', '0.0064', 'valid'),
(46, '2019-11-10 02:56:05.508586', 'gabgsjjs', '4604866129', '100', '99.2', '0.0064', 'valid'),
(47, '2019-11-10 02:59:11.753640', 'gabgsjjs', '5544809117', '100', '99.2', '0.0064', 'valid'),
(48, '2019-11-10 08:33:18.824260', 'peter001', '5436049423', '36.36', '36.06912', '0.000846111744', 'valid'),
(49, '2019-11-10 08:34:46.345632', 'peter001', '4545407264', '36.36', '36.06912', '0.000846111744', 'valid'),
(50, '2019-11-10 08:43:00.860039', 'crestedcc', '2191206687', '200', '198.4', '0.0256', 'Used'),
(51, '2019-11-10 08:45:17.606039', 'crestedcc', '8605512924', '200', '198.4', '0.0256', 'valid'),
(52, '2019-11-10 08:53:46.418693', 'crestedcc', '5781755479', '15', '14.88', '0.000144', 'valid'),
(53, '2019-11-10 08:58:11.783242', 'crestedcc', '9983652388', '20', '19.84', '0.000256', 'valid'),
(54, '2019-11-10 09:09:58.129308', 'crestedcc', '6620151664', '20', '19.84', '0.000256', 'valid'),
(55, '2019-11-10 09:19:59.760957', 'crestedcc', '1262358761', '15', '14.88', '0.000144', 'valid'),
(56, '2019-11-10 15:24:08.720172', 'crestedcc', '8562017845', '100', '99.2', '0.0064', 'valid'),
(57, '2019-11-10 15:35:59.072210', 'crestedcc', '1746077559', '20', '19.84', '0.000256', 'valid'),
(58, '2019-11-10 15:36:53.673166', 'crestedcc', '2092224130', '10', '9.92', '6.4E-5', 'valid'),
(59, '2019-11-10 15:39:02.925478', 'peter001', '2962776925', '36.36', '36.06912', '0.000846111744', 'Used'),
(60, '2019-11-11 11:11:07.654971', 'crestedcc', '5987130517', '200', '198.4', '0.0256', 'Used'),
(61, '2019-11-12 05:14:36.882093', 'crestedcc', '8132812669', '180.9', '179.4528', '0.0209438784', 'Used'),
(62, '2019-11-12 06:07:47.947174', 'crestedcc', '6541823667', '200', '198.4', '0.0256', 'valid'),
(63, '2019-11-12 06:10:55.618783', 'crestedcc', '7555509353', '90', '89.28', '0.005184', 'Used'),
(64, '2019-11-12 08:28:53.323137', 'gabgsjjs', '4643232095', '2000', '1988', '1.44', 'Used'),
(65, '2019-11-12 09:30:06.648273', '', '0727284683', '500', '', '', 'Used'),
(66, '2019-12-13 12:55:36.146919', 'crestedcc', '6875480611', '10', '9.94', '3.6E-5', 'Used');

-- --------------------------------------------------------

--
-- Table structure for table `site_config`
--

CREATE TABLE `site_config` (
  `id` int(11) NOT NULL,
  `site_name` varchar(33) NOT NULL,
  `paypal_gateway_mode` varchar(33) NOT NULL,
  `paypal_email` varchar(100) NOT NULL,
  `paypal_cencel_url` varchar(200) NOT NULL,
  `paypal_confirm_url` varchar(200) NOT NULL,
  `gateway_currency` varchar(33) NOT NULL,
  `gateway_currency_symbol` varchar(33) NOT NULL,
  `mpesa_C2Bpaybill_number` varchar(33) NOT NULL,
  `mpesa_register_url` varchar(100) NOT NULL,
  `mpesa_validation_url` varchar(100) NOT NULL,
  `mpesa_confirmation_url` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_config`
--

INSERT INTO `site_config` (`id`, `site_name`, `paypal_gateway_mode`, `paypal_email`, `paypal_cencel_url`, `paypal_confirm_url`, `gateway_currency`, `gateway_currency_symbol`, `mpesa_C2Bpaybill_number`, `mpesa_register_url`, `mpesa_validation_url`, `mpesa_confirmation_url`) VALUES
(1, 'PayMents', 'sandbox', 'support@paymentprocessor-script.com', 'https://www.paymentprocessor-script.com/demos/downloads/Payments-version-2-0-1-2/cancel.php', 'https://www.paymentprocessor-script.com/demos/downloads/Payments-version-2-0-1-2/success.php', 'USD', '$', '693165', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sms_gateway_settings`
--

CREATE TABLE `sms_gateway_settings` (
  `id` int(11) NOT NULL,
  `gateway_name` varchar(33) NOT NULL,
  `username` varchar(33) NOT NULL,
  `api_key` varchar(2000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` smallint(6) NOT NULL,
  `user_name` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `account_type` varchar(12) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `user_name`, `password`, `account_type`) VALUES
(1, '', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `transactons`
--

CREATE TABLE `transactons` (
  `transaction_id` int(33) NOT NULL,
  `recipient_name` char(50) NOT NULL,
  `sender_name` char(55) NOT NULL,
  `naration` varchar(500) NOT NULL,
  `transaction_type` char(50) NOT NULL,
  `date` datetime(6) NOT NULL,
  `status` varchar(33) NOT NULL,
  `gross_amt` varchar(100) NOT NULL,
  `fee_amt` varchar(100) NOT NULL,
  `agent_fee` varchar(100) NOT NULL DEFAULT '0.00',
  `net_admin_fee` varchar(100) NOT NULL DEFAULT '0.00',
  `net_amt` varchar(100) NOT NULL,
  `balance` decimal(6,2) NOT NULL,
  `reference_number` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactons`
--

INSERT INTO `transactons` (`transaction_id`, `recipient_name`, `sender_name`, `naration`, `transaction_type`, `date`, `status`, `gross_amt`, `fee_amt`, `agent_fee`, `net_admin_fee`, `net_amt`, `balance`, `reference_number`) VALUES
(336, 'crestedcc', 'PayMents Scratch card', 'Deposit via Scratch card (0727284683)', 'Deposit', '2019-11-12 03:11:44.000000', 'Completed', '500', '0', '0.00', '0.00', '500', 0.00, '0727284683'),
(337, '0660197181', '158', 'Deposit via Agent (158)', 'Deposit', '2019-11-12 03:11:24.000000', 'Completed', '50', '0', '0.00', '0.00', '50', 0.00, '-'),
(338, '158', '0660197181', 'Withdraw via Agent (158)', 'Withdraw', '2019-11-12 03:11:01.000000', 'Completed', '50', '1', '0.45', '0.3', '49', 0.00, '-'),
(339, '0660197181', '158', 'Deposit via Agent (158)', 'Deposit', '2019-11-12 08:11:55.000000', 'Completed', '50', '0', '0.00', '0.00', '50', 0.00, '-'),
(340, '158', '0660197181', 'Withdraw via Agent (158)', 'Withdraw', '2019-11-12 08:11:09.000000', 'Completed', '20', '0', '0.18', '0.12', '20', 0.00, '-'),
(341, '0660197181', 'crestedcc', 'Payment request (To   patrickkotza By   nokutulakiyemba', 'Payment Request', '2019-11-12 09:11:13.000000', 'Pending', '20', '1', '0.00', '0.00', '19', 0.00, '-'),
(342, 'absa', '0660197181', 'Withdraw to Bank (  nokutula kiyemba absa 9216773105 24', 'Withdraw', '2019-11-13 06:11:57.000000', 'Approved', '10', '0', '0.00', '0.00', '10', 0.00, '-'),
(343, 'absa', '0660197181', 'Withdraw to Bank (  nokutula kiyemba absa 9216773105 24', 'Withdraw', '2019-11-13 06:11:46.000000', 'Rejected', '10', '0', '0.00', '0.00', '10', 0.00, '-'),
(344, '0660197181', 'FNB', 'Deposit via Bank', 'Deposit', '2019-11-13 06:11:41.000000', 'Approved', '200', '0', '0.00', '0.00', '200', 0.00, 'pa'),
(345, 'absa', '0660197181', 'Withdraw to Bank (  nokutula kiyemba absa 9216773105 24', 'Withdraw', '2019-11-13 06:11:39.000000', 'Rejected', '20', '0', '0.00', '0.00', '20', 0.00, '-'),
(346, '156', '0660197181', 'Withdraw via Agent (156)', 'Withdraw', '2019-11-13 06:11:24.000000', 'Completed', '10', '0', '0.09', '0.06', '10', 0.00, '-'),
(347, 'absa', '0660197181', 'Withdraw to Bank (  nokutula kiyemba absa 9216773105 24', 'Withdraw', '2019-11-13 06:11:10.000000', 'Pending', '20', '0', '0.00', '0.00', '20', 0.00, '-'),
(348, 'Equity', 'mimiaaa', 'Withdraw to Bank (  Brian Wambua Mbiki2 Equity 99020202', 'Withdraw', '2019-11-14 03:11:43.000000', 'Pending', '150', '0', '0.00', '0.00', '150', 0.00, '-'),
(349, 'Equity', 'mimiaaa', 'Withdraw to Bank (  Brian Wambua Mbiki2 Equity 99020202', 'Withdraw', '2019-11-14 03:11:55.000000', 'Pending', '150', '0', '0.00', '0.00', '150', 0.00, '-'),
(350, 'Equity', 'mimiaaa', 'Withdraw to Bank (  Brian Wambua Mbiki2 Equity 99020202', 'Withdraw', '2019-11-14 04:11:04.000000', 'Pending', '15', '1', '-', '1', '14', 0.00, '-'),
(351, 'Equity', 'mimiaaa', 'Withdraw to Bank (  Brian Wambua Mbiki2 Equity 99020202', 'Withdraw', '2019-11-14 04:11:36.000000', 'Pending', '15', '0', '-', '0.4512', '15', 0.00, '-'),
(352, 'Equity', 'mimiaaa', 'Withdraw via express bank withdraw (  Brian Wambua Mbik', 'Withdraw', '2019-11-14 04:11:21.000000', 'Pending', '15.04', '1', '-', '1', '14.04', 0.00, '-'),
(353, 'Equity', 'mimiaaa', 'Withdraw via express bank withdraw (  Brian Wambua Mbiki2 <br>Equity<br> 990202020<br> 729292002 <br>Kenya)', 'Withdraw', '2019-11-14 04:11:46.000000', 'Pending', '15.04', '1', '-', '1', '14.04', 0.00, '-'),
(354, 'Equity', 'mimiaaa', 'Withdraw via express bank withdraw (Acount names:   Brian Wambua Mbiki2 <br>Bank name: Equity<br> Acc number: 990202020<br> Swift code: 729292002 <br>Country: Kenya)', 'Withdraw', '2019-11-14 04:11:00.000000', 'Pending', '15.04', '1', '-', '1', '14.04', 0.00, '-'),
(355, 'Mpesa (Kenya)', 'mimiaaa', 'Withdraw to Mpesa (Kenya) (6272222)', 'Withdraw', '2019-11-14 04:11:30.000000', 'Pending', '15.04', '0', '0.00', '0.00', '15.04', 0.00, '-'),
(356, 'Mpesa (Kenya)', 'mimiaaa', 'Withdraw to Mpesa (Kenya) (2000)', 'Withdraw', '2019-11-14 05:11:47.000000', 'Pending', '100', '5', '0.00', '0.00', '95', 0.00, '-'),
(357, 'Equity', 'mimiaaa', 'Withdraw via normal bank withdraw (<br>Acount names:   Brian Wambua Mbiki2 <br>Bank name: Equity<br> Acc number: 990202020<br> Swift code: 729292002 <br>Country: Kenya)', 'Withdraw', '2019-11-14 05:11:46.000000', 'Pending', '15.04', '0.4512', '-', '0.4512', '14.5888', 0.00, '-'),
(358, 'Mpesa (Kenya)', 'mimiaaa', 'Withdraw to Mpesa (Kenya) (829292)', 'Withdraw', '2019-11-14 05:11:20.000000', 'Pending', '100', '5', '-', '5', '95', 0.00, '-'),
(359, 'absa', '0660197181', 'Withdraw via express bank withdraw (<br>Acount names:   nokutula kiyemba <br>Bank name: absa<br> Acc number: 9216773105<br> Swift code: 24658 <br>Country: South Africa)', 'Withdraw', '2019-11-14 05:11:27.000000', 'Pending', '56', '1', '-', '1', '55', 0.00, '-'),
(360, 'absa', '0660197181', 'Withdraw via normal bank withdraw (<br>Acount names:   nokutula kiyemba <br>Bank name: absa<br> Acc number: 9216773105<br> Swift code: 24658 <br>Country: South Africa)', 'Withdraw', '2019-11-14 05:11:13.000000', 'Approved', '56', '1.68', '-', '1.68', '54.32', 0.00, '-'),
(361, 'Mpesa (Kenya)', 'mimiaaa', 'Withdraw to Mpesa (Kenya) (+27 717558104)', 'Withdraw', '2019-11-14 07:11:28.000000', 'Pending', '200', '5', '-', '5', '195', 0.00, '-'),
(362, 'FNB EWALLET', '0660197181', 'Withdraw to FNB EWALLET (+27 717558104)', 'Withdraw', '2019-11-14 07:11:59.000000', 'Rejected', '20', '13', '-', '13', '7', 0.00, '-'),
(363, 'STANDARD BANK INSTANT MONEY', '0660197181', 'Withdraw to STANDARD BANK INSTANT MONEY (0739647888)', 'Withdraw', '2019-11-14 07:11:30.000000', 'Approved', '5.5', '13', '-', '13', '-7.5', 0.00, '-'),
(364, '0660197181', 'FNB', 'Deposit via Bank', 'Deposit', '2019-11-14 07:11:25.000000', 'Approved', '1000', '0', '0.00', '0.00', '1000', 0.00, 'pa'),
(365, 'absa', '0660197181', 'Withdraw via express bank withdraw (<br>Acount names:   nokutula kiyemba <br>Bank name: absa<br> Acc number: 9216773105<br> Swift code: 24658 <br>Country: South Africa)', 'Withdraw', '2019-11-14 07:11:43.000000', 'Approved', '65', '40', '-', '40', '25', 0.00, '-'),
(366, 'absa', '0660197181', 'Withdraw via express bank withdraw (<br>Acount names:   nokutula kiyemba <br>Bank name: absa<br> Acc number: 9216773105<br> Swift code: 24658 <br>Country: South Africa)', 'Withdraw', '2019-11-14 07:11:43.000000', 'Rejected', '875', '40', '-', '40', '835', 0.00, '-'),
(367, '0660197181', '158', 'Deposit via Agent (158)', 'Deposit', '2019-11-14 11:11:21.000000', 'Completed', '20', '0', '0.00', '0.00', '20', 0.00, '-'),
(368, 'jabulani', 'STANBIC BANK UGANDA', 'Deposit via Bank', 'Deposit', '2019-11-14 09:11:16.000000', 'Approved', '200', '0', '0.00', '0.00', '200', 0.00, ''),
(369, 'MTN (Uganda)', 'jabulani', 'Withdraw to MTN (Uganda) (+27 717558104)', 'Withdraw', '2019-11-14 09:11:34.000000', 'Approved', '100', '13', '-', '13', '87', 0.00, '-'),
(370, '0660197181', 'FNB EWALLET', 'Deposit via FNB EWALLET', 'Deposit', '2019-11-14 10:11:38.000000', 'Approved', '200', '0', '0.00', '0.00', '200', 0.00, 'pa'),
(371, 'STANDARD BANK INSTANT MONEY', '0660197181', 'Withdraw to STANDARD BANK INSTANT MONEY (0799307300)', 'Withdraw', '2019-11-17 11:11:46.000000', 'Pending', '2', '13', '-', '13', '-11', 0.00, '-'),
(372, '0660197181', '158', 'Deposit via Agent (158)', 'Deposit', '2019-11-17 11:11:05.000000', 'Completed', '100', '0', '0.00', '0.00', '100', 0.00, '-'),
(373, 'Equity', 'mimiaaa', 'Withdraw via express bank withdraw (<br>Acount names:   Brian Wambua Mbiki2 <br>Bank name: Equity<br> Acc number: 990202020<br> Swift code: 729292002 <br>Country: Kenya)', 'Withdraw', '2019-11-28 12:11:44.000000', 'Pending', '30.08', '40', '-', '40', '-9.92', 0.00, '-'),
(374, 'absa', '0660197181', 'Withdraw via express bank withdraw (<br>Acount names:   nokutula kiyemba <br>Bank name: absa<br> Acc number: 9216773105<br> Swift code: 24658 <br>Country: South Africa)', 'Withdraw', '2019-12-01 12:12:08.000000', 'Pending', '100', '40', '-', '40', '60', 0.00, '-'),
(375, 'absa', '0660197181', 'Withdraw via express bank withdraw (<br>Acount names:   nokutula kiyemba <br>Bank name: absa<br> Acc number: 9216773105<br> Swift code: 24658 <br>Country: South Africa)', 'Withdraw', '2019-12-05 03:12:04.000000', 'Pending', '10', '40', '-', '40', '-30', 0.00, '-'),
(376, '0660197181', '156', 'Deposit via Agent (156)', 'Deposit', '2019-12-12 02:12:33.000000', 'Approved', '200', '0', '0.00', '0.00', '200', 0.00, '-'),
(377, '0660197181', '158', 'Deposit via Agent (158)', 'Deposit', '2019-12-13 06:12:42.000000', 'Completed', '50', '0', '0.00', '0.00', '50', 0.00, '-'),
(378, '0660197181', 'PayMents Scratch card', 'Deposit via Scratch card (6875480611)', 'Deposit', '2019-12-13 06:12:38.000000', 'Completed', '10', '0', '0.00', '0.00', '10', 0.00, '6875480611'),
(379, '0660197181', 'FNB', 'Deposit via Bank', 'Deposit', '2019-12-17 09:12:36.000000', 'Approved', '500', '0', '0.00', '0.00', '500', 0.00, 'pa'),
(380, 'absa', '0660197181', 'Withdraw via express bank withdraw (<br>Acount names:   nokutula kiyemba <br>Bank name: absa<br> Acc number: 9216773105<br> Swift code: 24658 <br>Country: South Africa)', 'Withdraw', '2019-12-17 09:12:21.000000', 'Pending', '208.68', '40', '-', '40', '168.68', 0.00, '-'),
(381, 'Binitoo Wallet Card International', '0660197181', 'Withdraw to Binitoo Wallet Card International (0739647888)', 'Withdraw', '2019-12-17 09:12:04.000000', 'Pending', '200', '15', '-', '15', '185', 0.00, '-'),
(382, 'jabulani', 'STANBIC BANK UGANDA', 'Deposit via Bank', 'Deposit', '2019-12-17 10:12:40.000000', 'Rejected', '20000', '0', '0.00', '0.00', '20000', 0.00, ''),
(383, 'jabulani', 'STANBIC BANK UGANDA', 'Deposit via Bank', 'Deposit', '2019-12-17 10:12:03.000000', 'Rejected', '200', '0', '0.00', '0.00', '200', 0.00, 'pa'),
(384, 'mimiaaa', 'jabulani', 'Payment request (To  jabulanihappy By   Brian WambuaMbiki2)', 'Payment Request', '2019-12-17 10:12:14.000000', 'Pending', '28.41', '1', '0.00', '0.00', '27.41', 0.00, '-'),
(385, 'Binitoo Wallet Card International', 'mimiaaa', 'Withdraw to Binitoo Wallet Card International (+27 717558104)', 'Withdraw', '2019-12-17 12:12:53.000000', 'Pending', '200', '15', '-', '15', '185', 0.00, '-'),
(386, 'mimiaaa', '0660197181', 'Payment request (To   nokutulakiyemba By   Brian WambuaMbiki2)', 'Payment Request', '2019-12-21 03:12:42.000000', 'Pending', '28.4', '1', '0.00', '0.00', '27.4', 0.00, '-'),
(387, 'Mpesa (Kenya)', 'mimiaaa', 'Withdraw to Mpesa (Kenya) (0739647888)', 'Withdraw', '2019-12-21 09:12:52.000000', 'Pending', '100', '0', '-', '0', '100', 0.00, '-'),
(388, 'Binitoo Wallet Card International', 'mimiaaa', 'Withdraw to Binitoo Wallet Card International (0739647888)', 'Withdraw', '2019-12-21 09:12:56.000000', 'Rejected', '200', '0', '-', '0', '200', 0.00, '-'),
(389, 'Equity', 'mimiaaa', 'Withdraw via normal bank withdraw (<br>Acount names:   Brian Wambua Mbiki2 <br>Bank name: Equity<br> Acc number: 990202020<br> Swift code: 729292002 <br>Country: Kenya)', 'Withdraw', '2019-12-23 09:12:02.000000', 'Rejected', '29.51', '10', '-', '10', '19.51', 0.00, '-'),
(390, 'Binitoo Wallet Card International', 'mimiaaa', 'Withdraw to Binitoo Wallet Card International (+27 717558104)', 'Withdraw', '2019-12-23 09:12:02.000000', 'Rejected', '200', '0', '-', '0', '200', 0.00, '-'),
(391, 'kitisoro', '156', 'Deposit via Agent (156)', 'Deposit', '2019-12-23 09:12:23.000000', 'Approved', '0.0488298562544', '0', '0.00', '0.00', '0.0488298562544', 0.00, '-'),
(392, 'kitisoro', '156', 'Deposit via Agent (156)', 'Deposit', '2019-12-23 09:12:11.000000', 'Approved', '2.44149281272', '0', '0.00', '0.00', '2.44149281272', 0.00, '-'),
(393, 'kitisoro', '156', 'Deposit via Agent (156)', 'Deposit', '2019-12-23 09:12:05.000000', 'Approved', '2.44149281272', '0', '0.00', '0.00', '2.44149281272', 0.00, '-'),
(394, 'kitisoro', '156', 'Deposit via Agent (156)', 'Deposit', '2019-12-23 09:12:59.000000', 'Completed', '2.44149281272', '0', '0.00', '0.00', '2.44149281272', 0.00, '-'),
(395, 'kitisoro', '156', 'Deposit via Agent (156)', 'Deposit', '2019-12-23 10:12:19.000000', 'Completed', '24.4149281272', '0', '0.00', '0.00', '24.4149281272', 0.00, '-'),
(396, 'kitisoro', '156', 'Deposit via Agent (156)', 'Deposit', '2019-12-23 10:12:01.000000', 'Completed', '24.4149281272', '0', '0.00', '0.00', '24.4149281272', 0.00, '-'),
(397, 'peter001', 'STANBIC BANK UGANDA', 'Deposit via Bank', 'Deposit', '2019-12-23 10:12:37.000000', 'Approved', '10', '0', '0.00', '0.00', '10', 0.00, '522'),
(398, 'peter001', 'mimiaaa', 'Payment request (To   Brian WambuaMbiki2 By  peternsubuga)', 'Payment Request', '2019-12-23 10:12:31.000000', 'Pending', '-22.2', '2', '0.00', '0.00', '-24.2', 0.00, '-'),
(399, 'mimiaaa', 'peter001', 'Payment (To  peternsubuga From   Brian WambuaMbiki2)', 'Money Send', '2019-12-23 10:12:26.000000', 'Completed', '-31.35', '2', '0.00', '0.00', '-33.35', 0.00, '-'),
(400, 'kitisoro', '156', 'Deposit via Agent (156)', 'Deposit', '2019-12-23 10:12:02.000000', 'Completed', '2.44149281272', '0', '0.00', '0.00', '2.44149281272', 0.00, '-'),
(401, 'mimiaaa', 'payment.gocoins@gmail.com', 'Payment request (To payment.gocoins@gmail.com)', 'Payment Request', '2020-01-14 02:01:57.000000', 'Pending', '14.75', '', '0.00', '0.00', '', 0.00, '-'),
(402, 'mimiaaa', 'payment.gocoins@gmail.com', 'Payment request (To payment.gocoins@gmail.com)', 'Payment Request', '2020-01-14 02:01:01.000000', 'Pending', '14.75', '2', '0.00', '0.00', '12.75', 0.00, '-'),
(403, 'mimiaaa', 'payment.gocoins@gmail.com', 'Payment request (To payment.gocoins@gmail.com)', 'Payment Request', '2020-01-14 04:01:37.000000', 'Pending', '14.75', '2', '0.00', '0.00', '12.75', 0.00, '-'),
(404, 'mimiaaa', 'payment.gocoins@gmail.com', 'Payment request (To payment.gocoins@gmail.com)', 'Payment Request', '2020-01-14 06:01:17.000000', 'Pending', '14.75', '2', '0.00', '0.00', '12.75', 0.00, '-'),
(405, 'mimiaaa', 'payment.gocoins@gmail.com', 'Payment request (To payment.gocoins@gmail.com)', 'Payment Request', '2020-01-14 06:01:35.000000', 'Pending', '44.26', '2', '0.00', '0.00', '42.26', 0.00, '-');

-- --------------------------------------------------------

--
-- Table structure for table `user_attempts`
--

CREATE TABLE `user_attempts` (
  `id` int(33) NOT NULL,
  `user_id` int(33) NOT NULL,
  `time` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_token`
--
ALTER TABLE `access_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_commission`
--
ALTER TABLE `agent_commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`appd_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bitcoin_settings`
--
ALTER TABLE `bitcoin_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_specific_fees`
--
ALTER TABLE `country_specific_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_cards`
--
ALTER TABLE `credit_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_card_params`
--
ALTER TABLE `credit_card_params`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_card_settings`
--
ALTER TABLE `db_card_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `default_gateway_fees`
--
ALTER TABLE `default_gateway_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disputes`
--
ALTER TABLE `disputes`
  ADD PRIMARY KEY (`dispute_id`);

--
-- Indexes for table `dispute_messages`
--
ALTER TABLE `dispute_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exchange_rate_fees`
--
ALTER TABLE `exchange_rate_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailer_params`
--
ALTER TABLE `mailer_params`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpesa_b2c_settings`
--
ALTER TABLE `mpesa_b2c_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpesa_c2b_settings`
--
ALTER TABLE `mpesa_c2b_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpesa_payments`
--
ALTER TABLE `mpesa_payments`
  ADD PRIMARY KEY (`Auto`);

--
-- Indexes for table `mpesa_withdrawals`
--
ALTER TABLE `mpesa_withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offline_MOBI`
--
ALTER TABLE `offline_MOBI`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_retrievals`
--
ALTER TABLE `password_retrievals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`method_id`);

--
-- Indexes for table `scratch_scan_cards`
--
ALTER TABLE `scratch_scan_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_config`
--
ALTER TABLE `site_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_gateway_settings`
--
ALTER TABLE `sms_gateway_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactons`
--
ALTER TABLE `transactons`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `user_attempts`
--
ALTER TABLE `user_attempts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_token`
--
ALTER TABLE `access_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agent_commission`
--
ALTER TABLE `agent_commission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `appd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bitcoin_settings`
--
ALTER TABLE `bitcoin_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `country_specific_fees`
--
ALTER TABLE `country_specific_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `credit_cards`
--
ALTER TABLE `credit_cards`
  MODIFY `id` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `credit_card_params`
--
ALTER TABLE `credit_card_params`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `db_card_settings`
--
ALTER TABLE `db_card_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `default_gateway_fees`
--
ALTER TABLE `default_gateway_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `disputes`
--
ALTER TABLE `disputes`
  MODIFY `dispute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dispute_messages`
--
ALTER TABLE `dispute_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `exchange_rate_fees`
--
ALTER TABLE `exchange_rate_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3527;

--
-- AUTO_INCREMENT for table `mailer_params`
--
ALTER TABLE `mailer_params`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `mpesa_b2c_settings`
--
ALTER TABLE `mpesa_b2c_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mpesa_c2b_settings`
--
ALTER TABLE `mpesa_c2b_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mpesa_payments`
--
ALTER TABLE `mpesa_payments`
  MODIFY `Auto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mpesa_withdrawals`
--
ALTER TABLE `mpesa_withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offline_MOBI`
--
ALTER TABLE `offline_MOBI`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `password_retrievals`
--
ALTER TABLE `password_retrievals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `method_id` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `scratch_scan_cards`
--
ALTER TABLE `scratch_scan_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `site_config`
--
ALTER TABLE `site_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sms_gateway_settings`
--
ALTER TABLE `sms_gateway_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactons`
--
ALTER TABLE `transactons`
  MODIFY `transaction_id` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=406;

--
-- AUTO_INCREMENT for table `user_attempts`
--
ALTER TABLE `user_attempts`
  MODIFY `id` int(33) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
