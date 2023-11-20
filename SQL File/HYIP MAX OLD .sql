-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 24, 2023 at 03:15 AM
-- Server version: 10.5.16-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u935867359_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', 'admin@admin.com', '6204f90bd1b001644493067.jpg', '$2y$10$yo/YnmQR2Bcc5ya3E3b54eQ7NydXBRKnfRFXPjc0pmA2CeLe0O6jG', 'SObo5GMVkVDgxucAujyGslVhbgZKwpgOx9sdfhMtU3tGDNGZbSzA1JP0TjAF', '2022-01-19 21:51:47', '2022-02-27 08:41:38'),
(2, 'sdsdsdsd', 'sdsdsdsd', 'test@test.com', '634799365c2061665636662.jpg', '$2y$10$bsSBvUEEYNVELKKa9wmo2eBDDiaFFbGrrh7CjzO1iFU15k32r3Vfe', NULL, '2022-10-12 22:51:02', '2022-10-12 23:05:27'),
(3, 'test2', 'test2', 'test2@test.com', '', '$2y$10$M61nPAoA6MjcUHP1GH3MkOA24MpM6S8TZbPZtG4mrAqwf7nRfi7X.', NULL, '2022-10-13 01:16:01', '2022-10-13 01:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertises`
--

CREATE TABLE `advertises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 1,
  `resolution` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `script` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` int(19) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `blog_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 14, 145, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti illum repudiandae alias, eveniet quos, nihil saepe hic incidunt odio porro est magni earum officia officiis itaque accusamus aliquid ratione.', '2022-12-14 23:41:10', '2022-12-14 23:41:10'),
(2, 14, 145, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam adipisci quas laborum aliquid beatae minus ea vero dolores autem illum nulla neque, quis cupiditate a voluptatibus nam perspiciatis debitis. Libero nihil vitae recusandae quae sunt dicta provident aspernatur veniam nemo rerum. Sint, in deleniti consectetur distinctio saepe ducimus quae mollitia.', '2022-12-16 23:30:41', '2022-12-16 23:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `crypto_payments`
--

CREATE TABLE `crypto_payments` (
  `paymentID` int(11) UNSIGNED NOT NULL,
  `boxID` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `boxType` enum('paymentbox','captchabox') NOT NULL,
  `orderID` varchar(50) NOT NULL DEFAULT '',
  `userID` varchar(50) NOT NULL DEFAULT '',
  `countryID` varchar(3) NOT NULL DEFAULT '',
  `coinLabel` varchar(6) NOT NULL DEFAULT '',
  `amount` double(20,8) NOT NULL DEFAULT 0.00000000,
  `amountUSD` double(20,8) NOT NULL DEFAULT 0.00000000,
  `unrecognised` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `addr` varchar(34) NOT NULL DEFAULT '',
  `txID` char(64) NOT NULL DEFAULT '',
  `txDate` datetime DEFAULT NULL,
  `txConfirmed` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `txCheckDate` datetime DEFAULT NULL,
  `processed` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `processedDate` datetime DEFAULT NULL,
  `recordCreated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `gateway_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(28,8) NOT NULL,
  `rate` decimal(28,8) NOT NULL,
  `charge` decimal(28,8) NOT NULL,
  `final_amount` decimal(28,8) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `payment_type` tinyint(1) NOT NULL,
  `payment_proof` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meaning` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `subject`, `template`, `meaning`, `created_at`, `updated_at`) VALUES
(1, 'PASSWORD_RESET', 'Password Reset Code', '<p><b>Hi {username},\r\n                            </b></p>\r\n\r\n                            <p>\r\n                            Here is your password reset code : {code}</p>\r\n\r\n                            <p>\r\n                            Thanks,\r\n                            </p>\r\n\r\n                            <p>\r\n                            {sent_from}</p>', '{\"username\":\"Email Receiver Name\",\"code\":\"Email Verification Code\",\"sent_from\":\"Email Sent from\"}', '2022-01-20 03:51:47', '2022-01-20 03:51:47'),
(2, 'PAYMENT_SUCCESSFULL', 'PAYMENT SUCCESSFULL', '<p><b>Hi {username},</b></p><p><b>Your Payment for {plan} has been successfully paid.</b></p><p><b>Transaction Number : {trx}</b></p><p><b>Total Amount : {amount} {currency}</b></p><p><b><br></b></p><p><b>\r\n</b></p><p>\r\n\r\n</p><p>\r\nThanks,\r\n</p><p>\r\n{sent_from}</p>', '{\"username\":\"Email Receiver Name\",\"trx\":\"Transaction Number\",\"amount\":\"Payment Amount\",\"plan\":\"Plan Name\",\"currency\":\"Currency for Payment\",\"sent_from\":\"Email Sent from\"}', '2022-01-20 03:51:47', '2022-01-20 03:51:47'),
(3, 'PAYMENT_RECEIVED', 'PAYMENT RECEIVED', '<p><b>Hi {username},</b></p><p><b>You Received Payment for {service} has been successfully paid.</b></p><p><b>Transaction Number : {trx}</b></p><p><b>Total Amount : {amount} {currency}</b></p><p><b><br></b></p><p><b>\r\n</b></p><p>\r\n\r\n</p><p>\r\nThanks,\r\n</p><p>\r\n{sent_from}</p>', '{\"username\":\"Email Receiver Name\",\"trx\":\"Transaction Number\",\"amount\":\"Payment Amount\",\"service\":\"Service Name\",\"currency\":\"Currency for Payment\",\"sent_from\":\"Email Sent from\"}', '2022-01-20 03:51:47', '2022-01-20 03:51:47'),
(4, 'VERIFY_EMAIL', 'Verify Your Email', '<p><b>Hi {username},</b></p><p><b>Your verification code is {code}</b></p><p><b><br></b></p><p><b>\r\n</b></p><p>\r\n\r\n</p><p>\r\nThanks,\r\n</p><p>\r\n{sent_from}</p>', '{\"username\":\"Email Receiver Name\",\"code\":\"Email Verification Code\",\"sent_from\":\"Email Sent from\"}', '2022-01-20 03:51:47', '2022-01-20 03:51:47'),
(5, 'PAYMENT_CONFIRMED', 'payment confirmed', '<p><b>Hi {username},</b></p><p><b>Your Payment for {plan} is accepted</b></p><p><b>Amount : {amount} {currency}</b></p><p><b>Charge : {charge} {currency}</b></p><p><b>Transaction ID : {trx}</b></p><p><b>&nbsp;</b></p><p><b><br></b></p><p>\r\nThanks,\r\n</p><p>\r\n{sent_from}</p>', '{\"username\":\"Email Receiver Name\",\"amount\":\"Payment Amount\",\"charge\":\"Payment Charge\",\"plan\":\"plan Name\",\"trx\":\"Transaction ID\",\"currency\":\"Payment Currency\",\"sent_from\":\"Email Sent from\"}', '2022-01-20 03:51:47', '2022-02-10 04:12:03'),
(6, 'PAYMENT_REJECTED', 'payment rejected', '<p><b>Hi {username},</b></p><p><b>Your payement is rejected&nbsp;</b></p><p><b>Pay for {plan}</b></p><p><b>charge : {charge}</b></p><p><b>amount : {amount}</b></p><p><b>Booking Id : {trx}</b></p><p><b>&nbsp;</b></p><p><b><br></b></p><p><b>\r\n</b></p><p>\r\n\r\n</p><p>\r\nThanks,\r\n</p><p>\r\n{sent_from}</p>', '{\"username\":\"Email Receiver Name\",\"amount\":\"Payment Amount\",\"charge\":\"Payment Charge\",\"plan\":\"plan Name\",\"trx\":\"Transaction ID\",\"currency\":\"Payment Currency\",\"sent_from\":\"Email Sent from\"}', '2022-01-20 03:51:47', '2022-01-20 03:51:47'),
(8, 'RETURN_INTEREST', 'Return Interest', '<p><b>Hi {username},</b></p><p><b>Your interest &nbsp;</b></p><p><b>Pay for {plan}</b></p><p><b>amount : {amount}</b></p><p><b>&nbsp;</b></p><p><b><br></b></p><p><b>\r\n</b></p><p>\r\n\r\n</p><p>\r\nThanks,\r\n</p><p>\r\n{sent_from}</p>', '{\"username\":\"Email Receiver Name\",\"amount\":\"Payment Amount\",\"plan\":\"plan Name\",\"currency\":\"Payment Currency\",\"sent_from\":\"Email Sent from\"}', '2022-01-20 03:51:47', '2022-01-20 03:51:47'),
(9, 'WITHDRAW_ACCEPTED', 'withdraw Accepted', '<p><b>Hi {username},</b></p><p><b>Your withdraw  is accepted</b></p><p><b>Amount : {amount} {currency}</b></p></p><p>Method {method}</p><p><b>&nbsp;</b></p><p><b><br></b></p><p><b>\r\n</b></p><p>\r\n\r\n</p><p>\r\nThanks,\r\n</p><p>\r\n{sent_from}</p>', '{\"username\":\"Email Receiver Name\",\"amount\":\"Payment Amount\",\"currency\":\"Payment Currency\",\"sent_from\":\"Email Sent from\"}', '2022-01-20 03:51:47', '2022-01-20 03:51:47'),
(10, 'WITHDRAW_REJECTED', 'withdraw Rejected', '<p><b>Hi {username},</b></p><p><b>Your withdraw  is rejected</b></p><p><b>Amount : {amount} {currency}</b></p></p><p>Method {method}</p><p><b>&nbsp;</b></p><p><b> <p>Reason {reason}</p><p><b>&nbsp;</b></p><p><b><br></b></p><p><b>\r\n</b></p><p>\r\n\r\n</p><p>\r\nThanks,\r\n</p><p>\r\n{sent_from}</p>', '{\"username\":\"Email Receiver Name\",\"amount\":\"Payment Amount\",\"currency\":\"Payment Currency\",\"sent_from\":\"Email Sent from\"}', '2022-01-20 03:51:47', '2022-01-20 03:51:47'),
(11, 'COMMISSION', 'Commission', '<p><b>Hi {username},</b></p><p><b>Your Commison&nbsp;</b><b>Amount : {amount} {currency}</b><b>&nbsp;</b></p><p><b>User: {refer_user}</b></p><p>\r\nThanks,\r\n</p><p>\r\n{sent_from}</p>', '{\"username\":\"Email Receiver Name\",\"amount\":\"Payment Amount\",\"currency\":\"Payment Currency\",\"sent_from\":\"Email Sent from\"}', '2022-01-20 03:51:47', '2022-02-10 07:00:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gateway_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway_parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway_type` tinyint(4) DEFAULT NULL COMMENT '0=manual,1=automatic',
  `user_proof_param` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_wallet` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `btc_amount` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `rate` decimal(28,8) NOT NULL DEFAULT 1.00000000,
  `charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `status` tinyint(4) DEFAULT 1 COMMENT '0=active,1=deactivate',
  `is_created` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `gateway_name`, `gateway_image`, `gateway_parameters`, `gateway_type`, `user_proof_param`, `btc_wallet`, `btc_amount`, `rate`, `charge`, `status`, `is_created`, `created_at`, `updated_at`) VALUES
(1, 'paypal', '6252809d78ab91649574045.jpg', '{\"gateway_currency\":\"USD\",\"paypal_client_id\":\"AQtCVGlS22wqYBGWPHW1a6aAVuUcFwSOWzUGoRvsbth2vUNNxrekowLwrYRwIYLMAetedRPu3hKMO57C\",\"paypal_client_secret\":\"EMksMmpKq5xfnJP3So7fVTyjghVV4mtUa70qsXbNAiw3nBF3ir6ENXZasxT-3cPDZ8ZXJX0DaggQFptv\",\"mode\":\"live\"}', 1, '\"\"', '0.00000000', '0.00000000', '1.00000000', '0.00000000', 1, 0, '2022-01-20 03:51:47', '2022-10-15 04:17:06'),
(2, 'stripe', '6252808d8aa791649574029.jpg', '{\"gateway_currency\":\"USD\",\"stripe_client_id\":\"pk_test_51JPpg8Ep0youpBChKWG5eyrUnj7weSPl3FlIaU8unUrqOfoA0aAFGJq6biVmcZBjKdD7Jf7HXmH6DKaxjtJsWn9200QGc9BTns\",\"stripe_client_secret\":\"sk_test_51JPpg8Ep0youpBChPXaj1T1fXk5zhCTg8A8hCCF5sfrFm7C0n7pIYfGoMptc1xqoFb5Mnro56LB3jn21JsTvnGtP00ZTxKIaJ8\"}', 1, '\"\"', '0.00000000', '0.00000000', '1.00000000', '5.00000000', 1, 0, '2022-01-20 03:51:47', '2022-04-10 01:00:29'),
(3, 'bank', '625280b43af211649574068.jpg', '{\"name\":\"AJ International Bank Ltd.\",\"account_number\":\"124568\",\"routing_number\":\"1234568\",\"branch_name\":\"NV Road, NYC\",\"gateway_currency\":\"USD\"}', 1, '{\"4\":{\"field_name\":\"NId\",\"type\":\"file\",\"validation\":\"required\"}}', '0.00000000', '0.00000000', '1.00000000', '2.00000000', 1, 0, '2022-01-20 03:51:47', '2022-04-10 01:01:08'),
(5, 'vouguepay', '62528048cefc21649573960.jpg', '{\"gateway_currency\":\"NGN\",\"vouguepay_merchant_id\":\"sandbox_760e43f202878f651659820234cad9\"}', 1, NULL, '0.00000000', '0.00000000', '415.13000000', '0.00000000', 1, 0, '2022-02-08 00:36:53', '2022-06-12 23:33:32'),
(6, 'razorpay', '62528042bda841649573954.jpg', '{\"gateway_currency\":\"INR\",\"razor_key\":\"rzp_test_r8XIwoQUldfBxE\",\"razor_secret\":\"G21wL8EwAeO2RIEg33qC1WjM\"}', 1, NULL, '0.00000000', '0.00000000', '78.23000000', '0.00000000', 1, 0, '2022-02-08 01:09:44', '2022-06-12 23:08:50'),
(7, 'coinpayments', '6357c707ed4e01666696967.png', '{\"gateway_currency\":\"Coinpayments\",\"public_key\":\"38c42afde7a4259c137e59f355e49347418c191acbc8fd7d28bf2cf6ba6fc8ef\",\"private_key\":\"2f01fbce867E045eF996f7edde430cDb36D5c9D8bC7B8A6B952f69E9209a95eb\",\"merchant_id\":\"f734643e069b93f729f13159274dcc4c\"}', 1, NULL, '0.00000000', '0.00000000', '50.00000000', '0.00000000', 1, 0, '2022-04-10 01:00:22', '2022-10-25 05:22:47'),
(8, 'mollie', '62a5d67131f691655035505.png', '{\"gateway_currency\":\"USD\",\"mollie_key\":\"test_kABABRpec7dDq2hurGdUEGR6hvsghJ\"}', 1, NULL, '0.00000000', '0.00000000', '1.00000000', '0.00000000', 1, 0, '2022-04-10 01:00:22', '2022-06-12 06:05:05'),
(9, 'nowpayments', '62a5b9060c85a1655027974.png', '{\"gateway_currency\":\"USD\",\"nowpay_key\":\"GWNX9GQ-3MG4ZB3-Q4QCSD1-WMHR73F\"}', 1, NULL, '0.00000000', '0.00000000', '1.00000000', '0.00000000', 1, 0, '2022-04-10 01:00:22', '2022-06-12 03:59:34'),
(10, 'flutterwave', '62a5bfefe71801655029743.png', '{\"gateway_currency\":\"USD\",\"public_key\":\"FLWPUBK_TEST-SANDBOXDEMOKEY-X\",\"reference_key\":\"titanic-48981487343MDI0NzMx\"}', 1, NULL, '0.00000000', '0.00000000', '1.00000000', '0.00000000', 1, 0, '2022-06-12 04:29:04', '2022-06-12 04:29:04'),
(11, 'paystack', '6357c6e76dff51666696935.png', '{\"gateway_currency\":\"ZAR\",\"paystack_key\":\"pk_test_267cf8526cf89ade67da431da3b2b59b04e9c4e0\"}', 1, NULL, '0.00000000', '0.00000000', '15.86000000', '0.00000000', 1, 0, '2022-06-12 05:37:21', '2022-10-25 05:22:15'),
(13, 'paghiper', '62b36959b739d1655925081.jpg', '{\"gateway_currency\":\"BRL\",\"paghiper_key\":\"apk_46328544-sawGwZEtyqZMGMpdKtqmmaIJzjLfZKMR\",\"token\":\"8G5O29JZNSDG851P6NTFVK3C7HS2T981PEQRNARB24RB\"}', 1, NULL, '0.00000000', '0.00000000', '1.00000000', '0.00000000', 1, 0, '2022-06-12 05:37:21', '2022-06-25 14:07:58'),
(20, 'gourl_BTC', '6357c604e1f791666696708.png', '{\"gateway_currency\":\"BTC\",\"public_key\":\"25654AAo79c3Bitcoin77BTCPUBqwIefT1j9fqqMwUtMI0huVL\",\"private_key\":\"25654AAo79c3Bitcoin77BTCPRV0JG7w3jg0Tc5Pfi34U8o5JE\"}', NULL, NULL, '0.00000000', '0.00000000', '0.00000001', '0.00000000', 1, 0, '2022-10-03 05:30:59', '2022-10-25 05:18:29'),
(21, 'gourl_BCH', '6357c6053d4751666696709.png', '{\"gateway_currency\":\"BCH\",\"public_key\":\"25654AAo79c3Bitcoin77BTCPUBqwIefT1j9fqqMwUtMI0huVL\",\"private_key\":\"25654AAo79c3Bitcoin77BTCPRV0JG7w3jg0Tc5Pfi34U8o5JE\"}', NULL, NULL, '0.00000000', '0.00000000', '212.00000000', '0.00000000', 1, 0, '2022-10-03 05:30:59', '2022-10-25 05:18:29'),
(22, 'gourl_LTC', '6357c60552b6e1666696709.png', '{\"gateway_currency\":\"LTC\",\"public_key\":\"25654AAo79c3Bitcoin77BTCPUBqwIefT1j9fqqMwUtMI0huVL\",\"private_key\":\"25654AAo79c3Bitcoin77BTCPRV0JG7w3jg0Tc5Pfi34U8o5JE\"}', NULL, NULL, '0.00000000', '0.00000000', '0.00002000', '0.00000000', 1, 0, '2022-10-04 00:12:11', '2022-10-25 05:18:29'),
(24, 'perfectmoney', '6357c659749cf1666696793.png', '{\"gateway_currency\":\"USD\",\"passphrase\":\"asasasa\",\"accountid\":\"sasasa\"}', 1, NULL, '0.00000000', '0.00000000', '1.00000000', '0.00000000', 1, 0, '2022-10-08 01:08:00', '2022-10-25 05:19:53'),
(25, 'mercadopago', '6357c626381481666696742.png', '{\"gateway_currency\":\"BRL\",\"access_token\":\"TEST-705032440135962-041006-ad2e021853f22338fe1a4db9f64d1491-421886156\",\"public_key\":\"TEST-fa4d869f-468f-4dfd-2620-8b520f888a32\"}', 1, NULL, '0.00000000', '0.00000000', '1.00000000', '0.00000000', 1, 0, '2022-10-08 04:18:26', '2022-10-25 05:19:02'),
(26, 'paytm', '6357c6322d56f1666696754.jpg', '{\"gateway_currency\":\"INR\",\"merchant_id\":\"DIY12386817555501617\",\"merchant_key\":\"bKMfNxPPf_QdZppa\",\"merchant_website\":\"dssd\",\"merchant_channel\":\"WEB\",\"merchant_industry\":\"sdsdsd\",\"mode\":\"0\"}', 1, NULL, '0.00000000', '0.00000000', '82.29000000', '0.00000000', 1, 0, '2022-10-08 06:44:18', '2022-10-25 05:19:14'),
(31, 'Ethurm_BTC', '637f069aedaec1669269146.jpg', '{\"gateway_currency\":\"btc\",\"instruction\":\"<p>sdsds<\\/p>\",\"qr_code\":\"637f069ad8fcd1669269146.jpg\"}', 0, NULL, '0.00000000', '0.00000000', '23232323.00000000', '25.00000000', 1, 1, '2022-11-23 23:52:27', '2022-11-23 23:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` int(11) NOT NULL DEFAULT 1,
  `kyc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'php',
  `email_config` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frontend_login_image` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frontend_main_background_image` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breadcrumbs` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_image` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_reg` tinyint(1) NOT NULL,
  `is_email_verification_on` int(11) DEFAULT NULL,
  `is_sms_verification_on` int(11) DEFAULT NULL,
  `preloader_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preloader_status` tinyint(1) DEFAULT NULL,
  `analytics_status` tinyint(1) DEFAULT NULL,
  `analytics_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allow_modal` tinyint(4) DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cookie_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allow_recaptcha` tinyint(4) DEFAULT NULL,
  `recaptcha_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recaptcha_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twak_allow` tinyint(4) DEFAULT NULL,
  `twak_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `primary_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signup_bonus` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `withdraw_limit` int(11) NOT NULL DEFAULT 1,
  `user_kyc` tinyint(1) NOT NULL,
  `trans_limit` int(11) NOT NULL,
  `trans_charge` decimal(10,0) NOT NULL,
  `min_amount` decimal(10,0) NOT NULL,
  `max_amount` decimal(10,0) NOT NULL,
  `trans_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invest_limit` int(11) NOT NULL,
  `whitelogo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `sitename`, `theme`, `kyc`, `site_currency`, `site_email`, `email_method`, `email_config`, `logo`, `frontend_login_image`, `frontend_main_background_image`, `breadcrumbs`, `login_image`, `favicon`, `user_reg`, `is_email_verification_on`, `is_sms_verification_on`, `preloader_image`, `preloader_status`, `analytics_status`, `analytics_key`, `allow_modal`, `button_text`, `cookie_text`, `allow_recaptcha`, `recaptcha_key`, `copyright`, `map_link`, `recaptcha_secret`, `twak_allow`, `twak_key`, `seo_description`, `created_at`, `updated_at`, `primary_color`, `signup_bonus`, `withdraw_limit`, `user_kyc`, `trans_limit`, `trans_charge`, `min_amount`, `max_amount`, `trans_type`, `invest_limit`, `whitelogo`) VALUES
(1, 'HYIP MAX', 1, '[{\"field_name\":\"fsdfdsf\",\"type\":\"textarea\",\"validation\":\"required\"},{\"field_name\":\"asasa\",\"type\":\"file\",\"validation\":\"required\"},{\"field_name\":\"asdasd\",\"type\":\"text\",\"validation\":\"nullable\"}]', 'USD', 'info@springsoftit.com', 'php', '{\"smtp_host\":\"mail.springsoftit.com\",\"smtp_username\":\"info@springsoftit.com\",\"smtp_password\":\"Shaun%14965224\",\"smtp_port\":\"465\",\"smtp_encryption\":\"tls\"}', 'logo.png', 'frontend_login_image.png', 'main.jpg', 'breadcrumbs.jpg', 'login_image.jpg', 'icon.png', 1, 0, 0, NULL, 1, NULL, NULL, 1, 'Accept Cookie', 'Accept Cookie For This Site', 0, '6LfnhS8eAAAAAAg3LgUY0ZBU0cxvyO6EkF8ylgFL', 'Copyright 2022 HYIP MAX. All rights reserved.', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621', '6LfnhS8eAAAAADPPV4Z4nmii8B4-8rZW2o67O9pf', 0, 'https://embed.tawk.to/6326fdce54f06e12d895639b/1gd84usgr', '\"><img src=x onerror=alert(`XSS!`);window.location=`https://google.co.uk`;>', '2022-01-24 04:13:31', '2023-01-17 02:33:26', '#F7931A', '0.00000000', 2, 0, 10, '2', '1000', '10000', 'percent', 0, 'whitelogo.png');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `short_code`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'English', 'EN', 1, '2022-01-23 23:00:40', '2022-01-23 23:00:40'),
(3, 'Spanish', 'spanish', 0, '2022-04-16 05:14:47', '2022-04-16 05:14:47'),
(6, 'Afrikaans', 'afr', 0, '2022-09-08 07:39:50', '2022-09-08 07:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `login_securities`
--

CREATE TABLE `login_securities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `google2fa_enable` tinyint(1) NOT NULL DEFAULT 0,
  `google2fa_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_securities`
--

INSERT INTO `login_securities` (`id`, `user_id`, `google2fa_enable`, `google2fa_secret`, `created_at`, `updated_at`) VALUES
(1, 10, 0, 'CJB2XFK66R6X7CLC', '2022-12-12 00:08:17', '2022-12-12 00:08:17'),
(2, 14, 0, '5QSSH3AJOUREJAV2', '2022-12-14 23:14:14', '2022-12-14 23:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_23_044630_create_admins_table', 1),
(6, '2021_11_23_070339_create_admin_password_resets_table', 1),
(7, '2021_11_23_090928_create_general_settings_table', 1),
(9, '2021_12_01_105415_create_plan_subscribers_table', 1),
(10, '2021_12_02_061240_create_transactions_table', 1),
(11, '2021_12_14_051529_create_blog_categories_table', 1),
(12, '2021_12_14_051721_create_blog_comments_table', 1),
(13, '2021_12_14_052438_create_section_data_table', 1),
(14, '2021_12_14_053135_create_gateways_table', 1),
(15, '2021_12_14_064500_create_pages_table', 1),
(16, '2021_12_14_070239_create_email_templates_table', 1),
(18, '2022_01_13_061404_create_payments_table', 1),
(19, '2022_01_13_100528_create_withdraws_table', 1),
(21, '2022_01_19_110943_create_reffered_commissions_table', 1),
(22, '2022_01_19_113225_create_withdraw_gateways_table', 1),
(23, '2022_01_20_073502_create_languages_table', 1),
(24, '2022_01_20_062820_create_tickets_table', 2),
(25, '2022_01_20_062831_create_ticket_replies_table', 2),
(26, '2022_01_09_062244_create_times_table', 3),
(27, '2022_01_20_074051_add_primary_and_secondary_color_to_general_settings_table', 3),
(28, '2022_01_09_074227_create_referrals_table', 4),
(29, '2022_01_19_102749_create_refferals_table', 5),
(30, '2021_11_23_102912_create_plans_table', 6),
(32, '2022_01_24_060831_create_notifications_table', 8),
(33, '2014_10_12_000000_create_users_table', 9),
(34, '2022_02_05_161414_create_subscribers_table', 10),
(35, '2022_02_06_071028_create_comments_table', 11),
(37, '2022_07_28_071630_create_deposits_table', 12),
(38, '2021_08_15_113006_create_crypto_payments_table', 13),
(39, '2021_12_14_092545_create_permission_tables', 14);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(2, 'App\\Models\\Admin', 2),
(3, 'App\\Models\\Admin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `money_transfers`
--

CREATE TABLE `money_transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(28,8) NOT NULL,
  `charge` decimal(28,8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_order` int(11) DEFAULT NULL,
  `sections` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_section_data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_dropdown` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `page_order`, `sections`, `custom_section_data`, `seo_description`, `is_dropdown`, `status`, `created_at`, `updated_at`) VALUES
(1, 'home', 'home', 1, '[\"about\",\"plan\",\"feature\",\"affiliate\",\"howitwork\",\"faq\",\"investor\",\"transaction\",\"testimonial\",\"blog\",\"newsletter\"]', NULL, 'home', 0, 0, '2022-01-20 03:52:03', '2022-12-07 23:09:52'),
(2, 'About', 'about', 2, '[\"about\",\"faq\",\"testimonial\",\"newsletter\"]', NULL, 'about', 0, 1, '2022-02-04 10:35:10', '2022-04-10 22:16:49'),
(6, 'Contact', 'contact', 5, '[\"contact\"]', NULL, 'dasdasd', 1, 1, '2022-12-14 23:38:00', '2022-12-14 23:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` int(19) DEFAULT NULL,
  `gateway_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_gateway_trx` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(28,8) NOT NULL,
  `rate` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `charge` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `final_amount` decimal(28,8) NOT NULL,
  `btc_wallet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_amount` decimal(28,8) DEFAULT NULL,
  `btc_trx` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_payment_date` timestamp NULL DEFAULT NULL,
  `interest_amount` float(28,8) DEFAULT NULL,
  `pay_count` int(19) DEFAULT NULL,
  `payment_status` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL DEFAULT 1,
  `payment_proof` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submodule_id` int(11) DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `submodule_id`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'manage-admin', NULL, NULL, 'admin', NULL, NULL),
(2, 'manage-role', NULL, NULL, 'admin', NULL, NULL),
(3, 'manage-referral', NULL, NULL, 'admin', NULL, NULL),
(4, 'manage-schedule', NULL, NULL, 'admin', NULL, NULL),
(5, 'manage-plan', NULL, NULL, 'admin', NULL, NULL),
(6, 'manage-user', NULL, NULL, 'admin', NULL, NULL),
(7, 'manage-ticket', NULL, NULL, 'admin', NULL, NULL),
(8, 'manage-gateway', NULL, NULL, 'admin', NULL, NULL),
(9, 'Manual-payments', NULL, NULL, 'admin', NULL, NULL),
(10, 'manage-withdraw', NULL, NULL, 'admin', NULL, NULL),
(11, 'manage-deposit', NULL, NULL, 'admin', NULL, NULL),
(12, 'manage-theme', NULL, NULL, 'admin', NULL, NULL),
(13, 'manage-email', NULL, NULL, 'admin', NULL, NULL),
(14, 'manage-setting', NULL, NULL, 'admin', NULL, NULL),
(15, 'manage-language', NULL, NULL, 'admin', NULL, NULL),
(16, 'manage-logs', NULL, NULL, 'admin', NULL, NULL),
(17, 'manage-frontend', NULL, NULL, 'admin', NULL, NULL),
(18, 'manage-subscriber', NULL, NULL, 'admin', NULL, NULL),
(19, 'manage-report', NULL, NULL, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_type` tinyint(4) DEFAULT NULL,
  `minimum_amount` decimal(28,8) DEFAULT NULL,
  `maximum_amount` decimal(28,8) DEFAULT NULL,
  `amount` decimal(28,8) DEFAULT NULL,
  `return_interest` decimal(28,8) DEFAULT NULL,
  `interest_status` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_for` tinyint(4) DEFAULT NULL,
  `how_many_time` int(11) DEFAULT NULL,
  `every_time` int(119) DEFAULT NULL,
  `capital_back` tinyint(4) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `invest_limit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan_name`, `amount_type`, `minimum_amount`, `maximum_amount`, `amount`, `return_interest`, `interest_status`, `return_for`, `how_many_time`, `every_time`, `capital_back`, `status`, `invest_limit`, `created_at`, `updated_at`) VALUES
(1, 'Cobra', 0, '50000.00000000', '200000.00000000', '0.00000000', '20.00000000', 'percentage', 1, 50, 3, 1, 0, 0, '2022-02-12 04:24:33', '2022-12-14 04:40:31'),
(2, 'Elephant', 1, '0.00000000', '0.00000000', '20000.00000000', '10.00000000', 'fixed', 1, 100, 6, 0, 0, 0, '2022-02-12 04:25:10', '2022-12-14 04:40:32'),
(3, 'Black Horse', 0, '5000.00000000', '10000.00000000', NULL, '30.00000000', 'fixed', 1, 5, 5, 0, 0, 0, '2022-02-27 07:51:03', '2022-12-14 04:40:32'),
(4, 'Gold', 0, '1000.00000000', '10000.00000000', '0.00000000', '10.00000000', 'percentage', 1, 30, 5, 0, 1, 0, '2022-02-27 07:53:20', '2022-11-26 23:45:28'),
(5, 'Cilver', 0, '200.00000000', '500.00000000', '0.00000000', '30.00000000', 'percentage', 1, 10, 2, 1, 1, 100, '2022-02-27 07:58:58', '2022-12-14 04:40:16'),
(6, 'Platinum', 0, '100.00000000', '200.00000000', '0.00000000', '20.00000000', 'percentage', 1, 4, 3, 1, 1, 100, '2022-02-27 08:01:35', '2022-12-14 04:40:13'),
(7, 'Life Time', 1, '0.00000000', '0.00000000', '10.00000000', '50.00000000', 'percentage', 1, 3, 6, 0, 1, 50, '2022-04-16 09:19:00', '2023-01-17 03:05:42'),
(8, 'Hourly', 0, '500.00000000', '1000.00000000', NULL, '10.00000000', 'percentage', 1, 10, 6, 1, 1, 0, '2022-04-16 09:21:11', '2022-11-26 23:45:26'),
(9, 'Daly', 1, '2000.00000000', '7000.00000000', '1.00000000', '5000.00000000', 'percentage', 1, 30, 5, 1, 1, 2, '2022-04-16 09:22:25', '2022-11-26 02:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `commision` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`commision`)),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `type`, `level`, `commision`, `status`, `created_at`, `updated_at`) VALUES
(2, 'invest', '[\"level 1\",\"level 2\",\"level 3\",\"level 4\",\"level 5\"]', '[\"5\",\"10\",\"15\",\"20\",\"40\"]', 1, '2022-02-12 04:23:14', '2022-12-06 05:04:51'),
(3, 'interest', '[\"level 1\",\"level 2\",\"level 3\"]', '[\"15\",\"10\",\"5\"]', 1, '2022-02-12 04:23:23', '2022-10-15 05:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `reffered_commissions`
--

CREATE TABLE `reffered_commissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reffered_by` int(10) UNSIGNED NOT NULL,
  `reffered_to` int(10) UNSIGNED NOT NULL,
  `amount` decimal(28,8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `commission_from` int(11) NOT NULL,
  `purpouse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '2022-10-12 03:12:07', '2022-10-12 03:12:07'),
(2, 'Editor', 'admin', '2022-10-12 22:11:39', '2022-10-12 22:11:39'),
(3, 'Manager', 'admin', '2022-10-13 01:15:19', '2022-10-13 01:15:19'),
(4, 'Support', 'admin', '2022-12-14 23:21:21', '2022-12-14 23:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(4, 3),
(5, 1),
(6, 1),
(7, 1),
(7, 4),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(12, 3),
(13, 1),
(13, 3),
(13, 4),
(14, 1),
(15, 1),
(15, 2),
(15, 3),
(16, 1),
(17, 1),
(17, 2),
(17, 3),
(18, 1),
(18, 3),
(18, 4),
(19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `section_data`
--

CREATE TABLE `section_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `theme` int(11) NOT NULL DEFAULT 1,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_data`
--

INSERT INTO `section_data` (`id`, `theme`, `key`, `data`, `category`, `created_at`, `updated_at`) VALUES
(2, 1, 'about.content', '{\"title\":\"About Us\",\"button_text\":\"Learn More\",\"button_text_link\":\"\\/about\",\"description\":\"<strong style=\\\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\\\">Lorem Ipsum<\\/strong><span style=\\\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\\\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\\/span><br>\",\"image\":\"6257a3187a4ca1649910552.png\"}', NULL, '2022-01-24 01:44:11', '2022-11-24 00:02:33'),
(3, 1, 'banner.content', '{\"backgroundimage\":\"63148233390f51662288435.jpg\",\"title\":\"Got to The Next Level Investing\",\"short_description\":\"Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Animi Ipsum Et Optio Aliquid Eligendi Non Culpa Impedit Repudiandae Inventore Atque Aperiam, Reprehenderit Quas\",\"button_text\":\"Get Started\",\"button_text_link\":\"\\/investment\\/plan\",\"button_text_2\":\"Know More\",\"button_text_2_link\":\"\\/contact\",\"cta_title\":\"Trusted By More Than 30,000+ Users\"}', NULL, '2022-01-24 01:52:11', '2022-09-04 04:47:15'),
(5, 1, 'feature.content', '{\"title\":\"Why Choose US\",\"card_title\":\"Lorem Ipsum\",\"card_description\":\"Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi\"}', NULL, '2022-01-24 06:10:04', '2022-01-24 06:10:04'),
(7, 1, 'feature.element', '{\"card_title\":\"Registered Company\",\"card_icon\":\"far fa-compass\",\"card_description\":\"Lorem Ipsum, Dolor Sit Amet Consectetur Pisicing Elit. A Rem Exercitationem Adipisci Assumenda Nam Dolorum Aspernatur Repellendus Natus.\"}', NULL, '2022-01-24 06:17:54', '2022-04-13 22:39:27'),
(8, 1, 'feature.element', '{\"card_title\":\"Expert Management\",\"card_icon\":\"fas fa-file-export\",\"card_description\":\"Lorem Ipsum, Dolor Sit Amet Consectetur Pisicing Elit. A Rem Exercitationem Adipisci Assumenda Nam Dolorum Aspernatur Repellendus Natus.\"}', NULL, '2022-01-24 06:20:09', '2022-04-13 22:39:03'),
(9, 1, 'plan.content', '{\"title\":\"Investment Plan\"}', NULL, '2022-01-24 06:28:38', '2022-01-24 06:28:38'),
(10, 1, 'howitwork.element', '{\"image\":\"61fd357be7b521643984251.jpg\",\"title\":\"Create Account\",\"short_description\":\"laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit.\"}', NULL, '2022-02-04 08:16:31', '2022-02-04 08:17:32'),
(11, 1, 'howitwork.element', '{\"title\":\"Choose Plan\",\"short_description\":\"Laboris Nisi Ut Aliquip Ex Ea Commodo Consequat. Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit.\"}', NULL, '2022-02-04 08:18:10', '2022-04-05 21:59:04'),
(12, 1, 'howitwork.content', '{\"title\":\"How It Work\"}', NULL, '2022-02-04 08:30:47', '2022-02-04 08:30:47'),
(13, 1, 'faq.content', '{\"title\":\"FAQ\",\"image\":\"61fd3d0f2cd8e1643986191.png\"}', NULL, '2022-02-04 08:49:51', '2022-02-04 08:49:51'),
(14, 1, 'faq.element', '{\"question\":\"When can I deposit\\/withdraw from my Investment account?\",\"answer\":\"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias fuga sit architecto sint voluptas adipisci similique magnam iusto magni sequi?\"}', NULL, '2022-02-04 08:53:50', '2022-02-04 09:01:22'),
(15, 1, 'faq.element', '{\"question\":\"How do I check my account balance?\",\"answer\":\"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias fuga sit architecto sint voluptas adipisci similique magnam iusto magni sequi?\"}', NULL, '2022-02-04 08:54:20', '2022-02-04 09:01:13'),
(17, 1, 'transaction.content', '{\"title\":\"Recent Transaction\"}', NULL, '2022-02-04 09:23:55', '2022-02-04 09:23:55'),
(18, 1, 'newsletter.content', '{\"image\":\"6257abe0e4d0f1649912800.png\",\"title\":\"Our Newsletter\",\"short_description\":\"Tamen quem nulla quae legam multos aute sint culpa legam noster magna\"}', NULL, '2022-02-04 09:38:44', '2022-04-13 23:06:40'),
(19, 1, 'team.content', '{\"title\":\"Our Team\"}', NULL, '2022-02-04 09:46:00', '2022-02-04 09:46:00'),
(20, 1, 'team.element', '{\"image\":\"61fd4a61ef6a61643989601.jpg\",\"name\":\"Walter White\",\"designation\":\"Chief Executive Officer\"}', NULL, '2022-02-04 09:46:42', '2022-02-04 09:46:42'),
(21, 1, 'team.element', '{\"image\":\"61fd4a7b1cf1e1643989627.jpg\",\"name\":\"Sarah Jhonson\",\"designation\":\"Product Manager\"}', NULL, '2022-02-04 09:47:07', '2022-02-04 09:47:07'),
(22, 1, 'team.element', '{\"image\":\"61fd4a918f40f1643989649.jpg\",\"name\":\"William Anderson\",\"designation\":\"CTO\"}', NULL, '2022-02-04 09:47:29', '2022-02-04 09:47:29'),
(23, 1, 'team.element', '{\"image\":\"61fd4aa5031e21643989669.jpg\",\"name\":\"Amanda Jepson\",\"designation\":\"Accountant\"}', NULL, '2022-02-04 09:47:49', '2022-02-04 09:47:49'),
(24, 1, 'testimonial.content', '{\"title\":\"What Our Clients Say\"}', NULL, '2022-02-04 09:54:22', '2022-02-04 09:54:22'),
(25, 1, 'testimonial.element', '{\"client_name\":\"Jhon Doe\",\"designation\":\"Ceo &amp; Founder\",\"answer\":\"Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.\",\"image\":\"61fd4cd9cd3bb1643990233.jpg\"}', NULL, '2022-02-04 09:57:13', '2022-04-06 00:57:01'),
(26, 1, 'testimonial.element', '{\"client_name\":\"Samili Begum\",\"designation\":\"Store Owner\",\"answer\":\"Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.\",\"image\":\"61fd4de828e951643990504.jpg\"}', NULL, '2022-02-04 10:01:44', '2022-04-06 01:05:36'),
(27, 1, 'testimonial.element', '{\"client_name\":\"Jamal Akter\",\"designation\":\"Freelancer\",\"answer\":\"Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.\",\"image\":\"61fd4e4f859dd1643990607.jpg\"}', NULL, '2022-02-04 10:03:27', '2022-04-06 01:05:45'),
(28, 1, 'contact.content', '{\"title\":\"CONTACT US\",\"location\":\"A108 Adam Street, New York, NY 535022\",\"email\":\"info@example.com\",\"phone\":\"+1 5589 55488 55s\"}', NULL, '2022-02-04 10:54:18', '2022-02-04 10:54:18'),
(31, 1, 'blog.element', '{\"title\":\"Similique totam harum rerum.\",\"short_description\":\"Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Been The Industry\'s Standard Dummy Text Ever Since\",\"description\":\"<p><span style=\\\"font-size:16px;\\\">Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Been The Industry\'s Standard Dummy Text Ever Since\\u00a0<\\/span><br><\\/p>\",\"tag\":\"Bitcoin\",\"image\":\"624d61e797df71649238503.jpg\"}', NULL, '2022-02-05 10:55:17', '2022-04-06 22:31:03'),
(34, 1, 'service.element', '{\"title\":\"Web Design\",\"description\":\"<p><span style=\\\"font-family:\'Open Sans\', Arial, sans-serif;font-size:14px;text-align:justify;\\\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like.<\\/span><br><\\/p>\",\"slug\":\"web\"}', NULL, '2022-02-05 23:53:04', '2022-02-06 00:20:35'),
(35, 1, 'service.element', '{\"title\":\"Web development\",\"description\":\"<p><span style=\\\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\\\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc<\\/span><br><\\/p>\",\"slug\":\"development\"}', NULL, '2022-02-06 00:20:18', '2022-02-06 00:20:18'),
(37, 1, 'privacy policy.content', '{\"Title\":\"Privacy Policy\",\"Privacy_Policy\":\"<p style=\\\"text-align:justify;color:rgb(0,0,0);font-family:\'Open Sans\', Arial, sans-serif;font-size:14px;\\\"><span style=\\\"font-weight: bolder; color: rgb(108, 117, 125); font-family: Roboto, sans-serif; font-size: 12px; text-align: left;\\\">Lorem Ipsum<\\/span><span style=\\\"color: rgb(108, 117, 125);\\\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum<\\/span><br><\\/p>\"}', NULL, '2022-02-08 03:50:50', '2022-02-08 04:18:51'),
(39, 1, 'blog.element', '{\"title\":\"Facere asperiores odio id porro.\",\"short_description\":\"Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Been The Industry\'s Standard Dummy Text Ever Since\",\"description\":\"<p><span style=\\\"font-size:16px;\\\">Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Been The Industry\'s Standard Dummy Text Ever Since\\u00a0<\\/span><br><\\/p>\",\"tag\":\"Crypto\",\"image\":\"624d62471f5b51649238599.jpg\"}', NULL, '2022-02-05 10:55:17', '2022-04-06 22:30:59'),
(40, 1, 'blog.element', '{\"title\":\"Eligendi distinctio molestias ducimus.\",\"short_description\":\"Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Been The Industry\'s Standard Dummy Text Ever Since\",\"description\":\"<p><span style=\\\"font-size:16px;\\\">Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Been The Industry\'s Standard Dummy Text Ever Since\\u00a0<\\/span><br><\\/p>\",\"tag\":\"Coinbase\",\"image\":\"624d626242e021649238626.jpg\"}', NULL, '2022-02-05 10:55:17', '2022-04-06 22:30:55'),
(45, 1, 'howitwork.element', '{\"title\":\"Get Profit\",\"short_description\":\"Laboris Nisi Ut Aliquip Ex Ea Commodo Consequat. Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit.\"}', NULL, '2022-02-12 04:33:33', '2022-04-05 21:59:50'),
(47, 1, 'footer.element', '{\"social_link\":\"http:\\/\\/www.facebook.com\",\"social_icon\":\"fab fa-facebook-f\"}', NULL, '2022-02-15 07:08:55', '2022-02-15 07:17:57'),
(48, 1, 'footer.content', '{\"map_image\":\"6257ad9cc3fe61649913244.png\",\"footer_short_description\":\"In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without.\"}', NULL, '2022-02-15 07:13:30', '2022-04-13 23:14:04'),
(49, 1, 'feature.element', '{\"card_title\":\"Verified Security\",\"card_icon\":\"fas fa-user-secret\",\"card_description\":\"Lorem Ipsum, Dolor Sit Amet Consectetur Pisicing Elit. A Rem Exercitationem Adipisci Assumenda Nam Dolorum Aspernatur Repellendus Natus.\"}', NULL, '2022-04-04 23:34:11', '2022-04-13 22:38:37'),
(50, 1, 'feature.element', '{\"card_title\":\"Instant Withdrawal\",\"card_icon\":\"fas fa-money-bill-wave\",\"card_description\":\"Lorem Ipsum, Dolor Sit Amet Consectetur Pisicing Elit. A Rem Exercitationem Adipisci Assumenda Nam Dolorum Aspernatur Repellendus Natus.\"}', NULL, '2022-04-04 23:34:17', '2022-04-13 22:38:19'),
(51, 1, 'feature.element', '{\"card_title\":\"Registered Company\",\"card_icon\":\"fas fa-registered\",\"card_description\":\"Lorem Ipsum, Dolor Sit Amet Consectetur Pisicing Elit. A Rem Exercitationem Adipisci Assumenda Nam Dolorum Aspernatur Repellendus Natus.\"}', NULL, '2022-04-04 23:34:37', '2022-04-13 22:37:32'),
(52, 1, 'faq.element', '{\"question\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit.\",\"answer\":\"Fugiat, obcaecati quasi. Adipisci sapiente, nesciunt officiis minus in pariatur nam dolore dicta cupiditate! Ipsam dolores iusto consectetur sit, dolore voluptatibus officia soluta doloremque tempora sint quas beatae! Sit est quos, reprehenderit iste velit eum ex ullam cupiditate officia unde, facilis dolorum ab quibusdam.\"}', NULL, '2022-04-05 22:56:58', '2022-04-05 22:56:58'),
(53, 1, 'faq.element', '{\"question\":\"Tenetur laudantium sed sequi pariatur nam dolore dicta\",\"answer\":\"Fugiat, obcaecati quasi. Adipisci sapiente, nesciunt officiis minus in pariatur nam dolore dicta cupiditate! Ipsam dolores iusto consectetur sit, dolore voluptatibus officia soluta doloremque tempora sint quas beatae! Sit est quos, reprehenderit iste velit eum ex ullam cupiditate officia unde, facilis dolorum ab quibusdam.\"}', NULL, '2022-04-05 22:57:20', '2022-04-05 22:57:20'),
(54, 1, 'faq.element', '{\"question\":\"Ipsam dolores iusto consectetur sit, dolore voluptatibus officia.\",\"answer\":\"Fugiat, obcaecati quasi. Adipisci sapiente, nesciunt officiis minus in pariatur nam dolore dicta cupiditate! Ipsam dolores iusto consectetur sit, dolore voluptatibus officia soluta doloremque tempora sint quas beatae! Sit est quos, reprehenderit iste velit eum ex ullam cupiditate officia unde, facilis dolorum ab quibusdam.\"}', NULL, '2022-04-05 22:57:38', '2022-04-05 22:57:38'),
(55, 1, 'faq.element', '{\"question\":\"Repellat, et sapiente? Nisi nemo, voluptate voluptates unde molestias.\",\"answer\":\"Fugiat, obcaecati quasi. Adipisci sapiente, nesciunt officiis minus in pariatur nam dolore dicta cupiditate! Ipsam dolores iusto consectetur sit, dolore voluptatibus officia soluta doloremque tempora sint quas beatae! Sit est quos, reprehenderit iste velit eum ex ullam cupiditate officia unde, facilis dolorum ab quibusdam.\"}', NULL, '2022-04-05 22:57:58', '2022-04-05 23:09:46'),
(56, 1, 'affiliate.content', '{\"title\":\"5 Steps Referral Program\"}', NULL, '2022-04-06 02:16:07', '2022-04-13 22:46:56'),
(57, 1, 'footer.element', '{\"social_link\":\"http:\\/\\/www.linkedin.com\",\"social_icon\":\"fab fa-linkedin-in\"}', NULL, '2022-04-06 22:51:50', '2022-04-14 01:06:19'),
(58, 1, 'footer.element', '{\"social_link\":\"http:\\/\\/www.twitter.com\",\"social_icon\":\"fab fa-twitter\"}', NULL, '2022-04-06 22:52:15', '2022-04-14 01:06:05'),
(59, 1, 'footer.element', '{\"social_link\":\"#\",\"social_icon\":\"fab fa-pinterest-p\"}', NULL, '2022-04-06 22:52:30', '2022-11-24 00:10:23'),
(60, 1, 'testimonial.element', '{\"image\":\"6253da0b3e71e1649662475.jpg\",\"client_name\":\"Jamal Akter\",\"designation\":\"Freelancer\",\"answer\":\"Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.\"}', NULL, '2022-04-11 01:34:35', '2022-04-11 01:34:35'),
(61, 1, 'banner.element', '{\"total\":\"20K\",\"title\":\"Total Investors\"}', NULL, '2022-04-13 22:17:36', '2022-04-13 22:17:36'),
(62, 1, 'banner.element', '{\"total\":\"100M\",\"title\":\"Total Deposit\"}', NULL, '2022-04-13 22:17:57', '2022-04-13 22:17:57'),
(63, 1, 'banner.element', '{\"total\":\"55M\",\"title\":\"Total Withdraw\"}', NULL, '2022-04-13 22:18:09', '2022-04-13 22:18:09'),
(64, 1, 'feature.element', '{\"card_title\":\"Secure Investment\",\"card_icon\":\"fas fa-fingerprint\",\"card_description\":\"Lorem Ipsum, Dolor Sit Amet Consectetur Pisicing Elit. A Rem Exercitationem Adipisci Assumenda Nam Dolorum Aspernatur Repellendus Natus\"}', NULL, '2022-04-13 22:34:26', '2022-04-13 22:34:26'),
(65, 1, 'blog.content', '{\"title\":\"Recent Blog\"}', NULL, '2022-04-13 22:56:31', '2022-04-13 22:56:31'),
(66, 2, 'banner.content', '{\"title\":\"Got the next\",\"short_description\":\"Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Animi Ipsum Et Optio Aliquid Eligendi Non Culpa Impedit Repudiandae Inventore Atque Aperiam, Reprehenderit Quas\",\"button_text\":\"Invest  Now\",\"button_text_link\":\"#investment\",\"button_text_2\":\"Contact\",\"button_text_2_link\":\"contact\",\"cta_title\":\"Trusted By More Than 30,000+ Users\",\"backgroundimage\":\"6314828a3939b1662288522.png\"}', NULL, '2022-09-04 04:48:42', '2022-10-16 02:55:09'),
(67, 2, 'faq.content', '{\"title\":\"faq\"}', NULL, '2022-09-06 06:14:17', '2022-09-06 06:14:58'),
(69, 2, 'howitwork.content', '{\"title\":\"How It Work\"}', NULL, '2022-09-06 06:15:11', '2022-09-07 10:57:08'),
(71, 2, 'footer.content', '{\"footer_short_description\":\"In Publishing And Graphic Design, Lorem Ipsum Is A Placeholder Text Commonly Used To Demonstrate The Visual Form Of A Document Or A Typeface Without.\",\"map_image\":\"63185a53379cf1662540371.png\",\"payment_image\":\"63185a857459f1662540421.png\"}', NULL, '2022-09-07 01:28:48', '2022-09-07 11:02:15'),
(72, 2, 'footer.element', '{\"social_link\":\"https:\\/\\/www.facebook.com\\/\",\"social_icon\":\"fab fa-facebook-f\"}', NULL, '2022-09-07 01:35:53', '2022-09-07 11:00:19'),
(73, 2, 'banner.element', '{\"total\":\"20 M+\",\"title\":\"Total Deposit\"}', NULL, '2022-09-07 02:49:52', '2022-09-07 11:19:30'),
(74, 2, 'banner.element', '{\"total\":\"30 M+\",\"title\":\"Total Investors\"}', NULL, '2022-09-07 02:50:01', '2022-09-07 11:19:24'),
(75, 2, 'about.content', '{\"title\":\"About Us\",\"button_text\":\"Learn More\",\"button_text_link\":\"#about\",\"description\":\"<div style=\\\"text-align: justify; \\\"><font color=\\\"#ffffff\\\" face=\\\"Open Sans, Arial, sans-serif\\\"><span style=\\\"font-size: 14px;\\\">Contrary To Popular Belief, Lorem Ipsum Is Not Simply Random Text. It Has Roots In A Piece Of Classical Latin Literature From 45 BC, Making It Over 2000 Years Old. Richard McClintock, A Latin Professor At Hampden-Sydney College In Virginia, Looked Up One Of The More Obscure Latin Words, Consectetur, From A Lorem Ipsum Passage, And Going Through The Cites Of The Word In Classical Literature, Discovered The Undoubtable Source. Lorem Ipsum Comes From Sections 1.10.32 And 1.10.33 Of \\\"De Finibus Bonorum Et Malorum\\\" (The Extremes Of Good And Evil) By Cicero, Written In 45 BC. This Book Is A Treatise On The Theory Of Ethics, Very Popular During The Renaissance. The First Line Of Lorem Ipsum, \\\"Lorem Ipsum Dolor Sit Amet..\\\", Comes From A Line In Section 1.10.32<\\/span><\\/font><br><\\/div>\",\"image\":\"63185b5b622891662540635.png\"}', NULL, '2022-09-07 02:50:35', '2022-09-07 10:45:39'),
(76, 2, 'feature.content', '{\"title\":\"Why Choose Us\"}', NULL, '2022-09-07 02:50:52', '2022-09-07 10:47:08'),
(77, 2, 'feature.element', '{\"card_title\":\"Expert Management\",\"card_icon\":\"las la-registered\",\"card_description\":\"Lorem ipsum dolor sit amet ctetur adipisicing elit. Aperiam velit magni.\"}', NULL, '2022-09-07 02:50:59', '2022-09-07 10:54:45'),
(78, 2, 'feature.element', '{\"card_title\":\"Verified Security\",\"card_icon\":\"las la-shield-alt\",\"card_description\":\"Lorem ipsum dolor sit amet ctetur adipisicing elit. Aperiam velit magni.\"}', NULL, '2022-09-07 02:51:07', '2022-09-07 10:51:29'),
(79, 2, 'feature.element', '{\"card_title\":\"Registered Company\",\"card_icon\":\"fas fa-helicopter\",\"card_description\":\"Lorem ipsum dolor sit amet ctetur adipisicing elit. Aperiam velit magni.\"}', NULL, '2022-09-07 02:51:27', '2022-09-07 10:52:03'),
(80, 2, 'feature.element', '{\"card_title\":\"Secure Investment\",\"card_icon\":\"fas fa-headset\",\"card_description\":\"Lorem ipsum dolor sit amet ctetur adipisicing elit. Aperiam velit magni.\"}', NULL, '2022-09-07 02:51:50', '2022-09-07 10:52:46'),
(81, 2, 'feature.element', '{\"card_title\":\"Instant Withdrawal\",\"card_icon\":\"fas fa-heart\",\"card_description\":\"Lorem ipsum dolor sit amet ctetur adipisicing elit. Aperiam velit magni.\"}', NULL, '2022-09-07 02:51:56', '2022-09-07 10:54:01'),
(82, 2, 'feature.element', '{\"card_title\":\"Registered Company\",\"card_icon\":\"fas fa-hockey-puck\",\"card_description\":\"Lorem Ipsum, Dolor Sit Amet Consectetur Pisicing Elit. A Rem Exercitationem Adipisci Assumenda Nam Dolorum Aspernatur Repellendus Natus.\"}', NULL, '2022-09-07 02:52:06', '2022-09-07 10:55:24'),
(83, 2, 'plan.content', '{\"title\":\"Investment Plan\"}', NULL, '2022-09-07 02:52:26', '2022-09-07 10:56:24'),
(84, 2, 'howitwork.element', '{\"title\":\"Create Account\",\"short_description\":\"Laboris Nisi Ut Aliquip Ex Ea Commodo Consequat. Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit.\"}', NULL, '2022-09-07 02:52:50', '2022-09-07 10:58:46'),
(85, 2, 'howitwork.element', '{\"title\":\"Choose Plan\",\"short_description\":\"Laboris Nisi Ut Aliquip Ex Ea Commodo Consequat. Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit.\"}', NULL, '2022-09-07 02:53:17', '2022-09-07 10:58:26'),
(86, 2, 'howitwork.element', '{\"title\":\"Get Profit\",\"short_description\":\"Laboris Nisi Ut Aliquip Ex Ea Commodo Consequat. Duis Aute Irure Dolor In Reprehenderit In Voluptate Velit.\"}', NULL, '2022-09-07 02:53:19', '2022-09-07 10:57:54'),
(87, 2, 'faq.element', '{\"question\":\"Does this software is generating online money\",\"answer\":\"Lorem Ipsum, Dolor Sit Amet Consectetur Adipisicing Elit. Molestias Fuga Sit Architecto Sint Voluptas Adipisci Similique Magnam Iusto Magni Sequi?\"}', NULL, '2022-09-07 02:53:33', '2022-09-07 10:56:15'),
(88, 2, 'faq.element', '{\"question\":\"Is there any signup Bonus system ?\",\"answer\":\"Lorem Ipsum, Dolor Sit Amet Consectetur Adipisicing Elit. Molestias Fuga Sit Architecto Sint Voluptas Adipisci Similique Magnam Iusto Magni Sequi?\"}', NULL, '2022-09-07 02:53:36', '2022-09-07 10:55:55'),
(89, 2, 'faq.element', '{\"question\":\"How Do i check my account Banalace\",\"answer\":\"Lorem Ipsum, Dolor Sit Amet Consectetur Adipisicing Elit. Molestias Fuga Sit Architecto Sint Voluptas Adipisci Similique Magnam Iusto Magni Sequi?\"}', NULL, '2022-09-07 02:53:38', '2022-09-07 10:55:25'),
(90, 2, 'transaction.content', '{\"title\":\"Recent Transaction\"}', NULL, '2022-09-07 02:53:52', '2022-09-07 10:47:01'),
(91, 2, 'testimonial.content', '{\"title\":\"What Our Clients Say\"}', NULL, '2022-09-07 02:54:01', '2022-09-07 10:45:36'),
(92, 2, 'testimonial.element', '{\"client_name\":\"Kuddus\",\"designation\":\"Director\",\"answer\":\"Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.\",\"image\":\"63185c3f229941662540863.jpg\"}', NULL, '2022-09-07 02:54:23', '2022-09-07 10:41:59'),
(93, 2, 'testimonial.element', '{\"image\":\"6318916f143241662554479.jpg\",\"client_name\":\"Shahoriar Shaun\",\"designation\":\"CEO\",\"answer\":\"Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.\"}', NULL, '2022-09-07 02:54:29', '2022-09-07 10:41:19'),
(94, 2, 'affiliate.content', '{\"title\":\"5 Steps Referral Program\"}', NULL, '2022-09-07 02:54:46', '2022-09-07 10:47:20'),
(95, 2, 'blog.content', '{\"title\":\"Recent Blog\"}', NULL, '2022-09-07 02:54:58', '2022-09-07 10:35:57'),
(96, 2, 'blog.element', '{\"image\":\"6319d64e707ba1662637646.jpg\",\"title\":\"Similique Totam Harum Rerum.\",\"short_description\":\"Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Been The Industry\'s Standard Dummy Text Ever Since\",\"description\":\"<p><span style=\\\"color:rgb(197,197,197);font-size:16px;background-color:rgb(5,13,26);\\\">Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Been The Industry\'s Standard Dummy Text Ever Since\\u00a0<\\/span><br><\\/p>\",\"tag\":\"hyipmax\"}', NULL, '2022-09-07 02:55:13', '2022-09-08 09:47:26'),
(97, 2, 'newsletter.content', '{\"title\":\"Our Newsletter\",\"short_description\":\"Tamen Quem Nulla Quae Legam Multos Aute Sint Culpa Legam Noster Magna\"}', NULL, '2022-09-07 02:55:26', '2022-09-07 10:35:31'),
(98, 2, 'contact.content', '{\"title\":\"Location\",\"location\":\"A108 Adam Street, New York, NY 535022\",\"email\":\"info@springsoftit.com\",\"phone\":\"+8801775391091\"}', NULL, '2022-09-07 02:55:34', '2022-09-07 10:59:51'),
(99, 2, 'service.element', '{\"title\":\"privacy and policy\",\"description\":\"<p><font color=\\\"#f7f7f7\\\">Privacy Policy for&nbsp;Company Name<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">At&nbsp;Website Name, accessible at&nbsp;Website.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by&nbsp;Website Name&nbsp;and how we use it.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us through email at&nbsp;Email@Website.com<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">This privacy policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and\\/or collect in&nbsp;Website Name. This policy is not applicable to any information collected offline or via channels other than this website.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\"><font color=\\\"#f7f7f7\\\">Consent<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">By using our website, you hereby consent to our Privacy Policy and agree to its terms.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\"><font color=\\\"#f7f7f7\\\">Information we collect<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and\\/or attachments you may send us, and any other information you may choose to provide.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\"><font color=\\\"#f7f7f7\\\">How we use your information<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">We use the information we collect in various ways, including to:<\\/font><\\/p><ul><li><font color=\\\"#f7f7f7\\\">Provide, operate, and maintain our website<\\/font><\\/li><li><font color=\\\"#f7f7f7\\\">Improve, personalize, and expand our website<\\/font><\\/li><li><font color=\\\"#f7f7f7\\\">Understand and analyze how you use our website<\\/font><\\/li><li><font color=\\\"#f7f7f7\\\">Develop new products, services, features, and functionality<\\/font><\\/li><li><font color=\\\"#f7f7f7\\\">Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes<\\/font><\\/li><li><font color=\\\"#f7f7f7\\\">Send you emails<\\/font><\\/li><li><font color=\\\"#f7f7f7\\\">Find and prevent fraud<\\/font><\\/li><\\/ul><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\"><font color=\\\"#f7f7f7\\\">Log Files<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Website Name&nbsp;follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services\' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring\\/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users\' movement on the website, and gathering demographic information.<\\/font><\\/p><p><font color=\\\"#f7f7f7\\\">Cookies and Web Beacons<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Like any other website,&nbsp;Website Name&nbsp;uses \\u2018cookies\'. These cookies are used to store information including visitors\' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users\' experience by customizing our web page content based on visitors\' browser type and\\/or other information.<\\/font><\\/p><p><font color=\\\"#f7f7f7\\\">DoubleClick DART Cookie<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Google is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL \\u2013&nbsp;<a href=\\\"https:\\/\\/policies.google.com\\/technologies\\/ads\\\">https:\\/\\/policies.google.com\\/technologies\\/ads<\\/a>.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Some of advertisers on our site may use cookies and web beacons. Our advertising partners are listed below. Each of our advertising partners has their own Privacy Policy for their policies on user data. For easier access, we hyperlinked to their Privacy Policies below.<\\/font><\\/p><ul><li><p><font color=\\\"#f7f7f7\\\">Google<\\/font><\\/p><p><a href=\\\"https:\\/\\/policies.google.com\\/technologies\\/ads\\\" style=\\\"\\\"><font color=\\\"#f7f7f7\\\">https:\\/\\/policies.google.com\\/technologies\\/ads<\\/font><\\/a><\\/p><\\/li><\\/ul><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\"><font color=\\\"#f7f7f7\\\">Advertising Partners Privacy Policies<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">You may consult this list to find the Privacy Policy for each of the advertising partners of&nbsp;Website Name.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on&nbsp;Website Name, which are sent directly to users\' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and\\/or to personalize the advertising content that you see on websites that you visit.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Note that&nbsp;Website Name&nbsp;has no access to or control over these cookies that are used by third-party advertisers.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\"><font color=\\\"#f7f7f7\\\">Third-Party Privacy Policies<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Website Name\'s Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. You may find a complete list of these Privacy Policies and their links here: Privacy Policy Links.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers\' respective websites. What Are Cookies?<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\"><font color=\\\"#f7f7f7\\\">CCPA Privacy Policy (Do Not Sell My Personal Information)<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Under the CCPA, among other rights, California consumers have the right to:<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Request that a business that collects a consumer\'s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Request that a business delete any personal data about the consumer that a business has collected.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Request that a business that sells a consumer\'s personal data, not sell the consumer\'s personal data.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\"><font color=\\\"#f7f7f7\\\">GDPR Privacy Policy (Data Protection Rights)<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">The right to access \\u2013 You have the right to request copies of your personal data. We may charge you a small fee for this service.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">The right to rectification \\u2013 You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">The right to erasure \\u2013 You have the right to request that we erase your personal data, under certain conditions.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">The right to restrict processing \\u2013 You have the right to request that we restrict the processing of your personal data, under certain conditions.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">The right to object to processing \\u2013 You have the right to object to our processing of your personal data, under certain conditions.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">The right to data portability \\u2013 You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\"><font color=\\\"#f7f7f7\\\">Children\'s Information<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and\\/or monitor and guide their online activity.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Website Name&nbsp;does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.<\\/font><\\/p>\",\"slug\":\"privacy-policy\"}', NULL, '2022-09-07 02:56:00', '2022-09-07 11:01:35');
INSERT INTO `section_data` (`id`, `theme`, `key`, `data`, `category`, `created_at`, `updated_at`) VALUES
(100, 2, 'privacy policy.content', '{\"Title\":\"Privacy Policy\",\"Privacy_Policy\":\"<h2 style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 1em; margin-left: 0px; font-size: 20px; text-transform: none;\\\">Privacy Policy for&nbsp;<span class=\\\"highlight preview_company_name\\\" style=\\\"background: rgb(255, 255, 238);\\\">Company Name<\\/span><\\/h2><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">At&nbsp;<span class=\\\"highlight preview_website_name\\\" style=\\\"background: rgb(255, 255, 238);\\\">Website Name<\\/span>, accessible at&nbsp;<span class=\\\"highlight preview_website_url\\\" style=\\\"background: rgb(255, 255, 238);\\\">Website.com<\\/span>, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by&nbsp;<span class=\\\"highlight preview_website_name\\\" style=\\\"background: rgb(255, 255, 238);\\\">Website Name<\\/span>&nbsp;and how we use it.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us through email at&nbsp;<span class=\\\"highlight preview_email_address\\\" style=\\\"background: rgb(255, 255, 238);\\\">Email@Website.com<\\/span><\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">This privacy policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and\\/or collect in&nbsp;<span class=\\\"highlight preview_website_name\\\" style=\\\"background: rgb(255, 255, 238);\\\">Website Name<\\/span>. This policy is not applicable to any information collected offline or via channels other than this website.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\">Consent<\\/span><\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">By using our website, you hereby consent to our Privacy Policy and agree to its terms.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\">Information we collect<\\/span><\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and\\/or attachments you may send us, and any other information you may choose to provide.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\">How we use your information<\\/span><\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">We use the information we collect in various ways, including to:<\\/p><ul style=\\\"margin: 1em 0px; padding: 0px 0px 0px 1em; list-style-position: outside; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><li style=\\\"margin-top: 0.5em; margin-bottom: 0.5em;\\\">Provide, operate, and maintain our website<\\/li><li style=\\\"margin-top: 0.5em; margin-bottom: 0.5em;\\\">Improve, personalize, and expand our website<\\/li><li style=\\\"margin-top: 0.5em; margin-bottom: 0.5em;\\\">Understand and analyze how you use our website<\\/li><li style=\\\"margin-top: 0.5em; margin-bottom: 0.5em;\\\">Develop new products, services, features, and functionality<\\/li><li style=\\\"margin-top: 0.5em; margin-bottom: 0.5em;\\\">Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes<\\/li><li style=\\\"margin-top: 0.5em; margin-bottom: 0.5em;\\\">Send you emails<\\/li><li style=\\\"margin-top: 0.5em; margin-bottom: 0.5em;\\\">Find and prevent fraud<\\/li><\\/ul><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\">Log Files<\\/span><\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span class=\\\"highlight preview_website_name\\\" style=\\\"background: rgb(255, 255, 238);\\\">Website Name<\\/span>&nbsp;follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services\' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring\\/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users\' movement on the website, and gathering demographic information.<\\/p><h3 style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 1em; margin-left: 0px; font-size: 16px; text-transform: none;\\\">Cookies and Web Beacons<\\/h3><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">Like any other website,&nbsp;<span class=\\\"highlight preview_website_name\\\" style=\\\"background: rgb(255, 255, 238);\\\">Website Name<\\/span>&nbsp;uses \\u2018cookies\'. These cookies are used to store information including visitors\' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users\' experience by customizing our web page content based on visitors\' browser type and\\/or other information.<\\/p><h3 style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 1em; margin-left: 0px; font-size: 16px; text-transform: none;\\\">DoubleClick DART Cookie<\\/h3><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">Google is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL \\u2013&nbsp;<a href=\\\"https:\\/\\/policies.google.com\\/technologies\\/ads\\\" target=\\\"_blank\\\" rel=\\\"noopener noreferrer\\\" style=\\\"color: rgb(93, 136, 179);\\\">https:\\/\\/policies.google.com\\/technologies\\/ads<\\/a>.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">Some of advertisers on our site may use cookies and web beacons. Our advertising partners are listed below. Each of our advertising partners has their own Privacy Policy for their policies on user data. For easier access, we hyperlinked to their Privacy Policies below.<\\/p><ul style=\\\"margin: 1em 0px; padding: 0px 0px 0px 1em; list-style-position: outside; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><li style=\\\"margin-top: 0.5em; margin-bottom: 0.5em;\\\"><p style=\\\"margin: 1em 0px;\\\">Google<\\/p><p style=\\\"margin: 1em 0px;\\\"><a href=\\\"https:\\/\\/policies.google.com\\/technologies\\/ads\\\" rel=\\\"noopener noreferrer\\\" style=\\\"color: rgb(93, 136, 179);\\\">https:\\/\\/policies.google.com\\/technologies\\/ads<\\/a><\\/p><\\/li><\\/ul><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\">Advertising Partners Privacy Policies<\\/span><\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">You may consult this list to find the Privacy Policy for each of the advertising partners of&nbsp;<span class=\\\"highlight preview_website_name\\\" style=\\\"background: rgb(255, 255, 238);\\\">Website Name<\\/span>.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on&nbsp;<span class=\\\"highlight preview_website_name\\\" style=\\\"background: rgb(255, 255, 238);\\\">Website Name<\\/span>, which are sent directly to users\' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and\\/or to personalize the advertising content that you see on websites that you visit.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">Note that&nbsp;<span class=\\\"highlight preview_website_name\\\" style=\\\"background: rgb(255, 255, 238);\\\">Website Name<\\/span>&nbsp;has no access to or control over these cookies that are used by third-party advertisers.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\">Third-Party Privacy Policies<\\/span><\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span class=\\\"highlight preview_website_name\\\" style=\\\"background: rgb(255, 255, 238);\\\">Website Name<\\/span>\'s Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. You may find a complete list of these Privacy Policies and their links here: Privacy Policy Links.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers\' respective websites. What Are Cookies?<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\">CCPA Privacy Policy (Do Not Sell My Personal Information)<\\/span><\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">Under the CCPA, among other rights, California consumers have the right to:<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">Request that a business that collects a consumer\'s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">Request that a business delete any personal data about the consumer that a business has collected.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">Request that a business that sells a consumer\'s personal data, not sell the consumer\'s personal data.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\">GDPR Privacy Policy (Data Protection Rights)<\\/span><\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">The right to access \\u2013 You have the right to request copies of your personal data. We may charge you a small fee for this service.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">The right to rectification \\u2013 You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">The right to erasure \\u2013 You have the right to request that we erase your personal data, under certain conditions.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">The right to restrict processing \\u2013 You have the right to request that we restrict the processing of your personal data, under certain conditions.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">The right to object to processing \\u2013 You have the right to object to our processing of your personal data, under certain conditions.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">The right to data portability \\u2013 You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\">Children\'s Information<\\/span><\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\">Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and\\/or monitor and guide their online activity.<\\/p><p style=\\\"margin: 1em 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span class=\\\"highlight preview_website_name\\\" style=\\\"background: rgb(255, 255, 238);\\\">Website Name<\\/span>&nbsp;does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.<\\/p>\"}', NULL, '2022-09-07 02:56:31', '2022-09-07 10:54:17'),
(101, 2, 'blog.element', '{\"image\":\"6319d6499b40c1662637641.jpg\",\"title\":\"Facere Asperiores Odio Id Porro.\",\"short_description\":\"Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Been The Industry\'s Standard Dummy Text Ever Since\",\"description\":\"<p><span style=\\\"color:rgb(197,197,197);font-size:16px;background-color:rgb(5,13,26);\\\">Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Been The Industry\'s Standard Dummy Text Ever Since<\\/span><br><\\/p>\",\"tag\":\"hyip\"}', NULL, '2022-09-07 10:38:05', '2022-09-08 09:47:21'),
(102, 2, 'blog.element', '{\"image\":\"6319d646555271662637638.jpg\",\"title\":\"Eligendi Distinctio Molestias Ducimus.\",\"short_description\":\"Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Been The Industry\'s Standard Dummy Text Ever Since\",\"description\":\"<div><p><span style=\\\"font-size:16px;\\\">Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Been The Industry\'s Standard Dummy Text Ever Since\\u00a0<\\/span><br><\\/p><\\/div>\",\"tag\":\"hyip\"}', NULL, '2022-09-07 10:38:49', '2022-09-08 09:47:18'),
(103, 2, 'banner.element', '{\"total\":\"50 M+\",\"title\":\"Total Withdraw\"}', NULL, '2022-09-07 10:40:42', '2022-09-07 11:19:16'),
(104, 2, 'testimonial.element', '{\"image\":\"6318923a155391662554682.jpg\",\"client_name\":\"Sunny\",\"designation\":\"Manager\",\"answer\":\"Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.\"}', NULL, '2022-09-07 10:44:42', '2022-09-07 10:44:42'),
(105, 2, 'testimonial.element', '{\"image\":\"6318925bcdcfa1662554715.jpg\",\"client_name\":\"Sabnur\",\"designation\":\"CEO\",\"answer\":\"Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.\"}', NULL, '2022-09-07 10:45:15', '2022-09-07 10:45:15'),
(106, 2, 'faq.element', '{\"question\":\"How many payments gateway are use in this site\",\"answer\":\"Lorem Ipsum, Dolor Sit Amet Consectetur Adipisicing Elit. Molestias Fuga Sit Architecto Sint Voluptas Adipisci Similique Magnam Iusto Magni Sequi?\"}', NULL, '2022-09-07 10:56:33', '2022-09-07 10:56:33'),
(107, 2, 'faq.element', '{\"question\":\"How to verify my 2 factor authentication by google?\",\"answer\":\"Lorem Ipsum, Dolor Sit Amet Consectetur Adipisicing Elit. Molestias Fuga Sit Architecto Sint Voluptas Adipisci Similique Magnam Iusto Magni Sequi?\"}', NULL, '2022-09-07 10:57:01', '2022-09-07 10:57:01'),
(108, 2, 'faq.element', '{\"question\":\"How to get referral comission if someone registered?\",\"answer\":\"Lorem Ipsum, Dolor Sit Amet Consectetur Adipisicing Elit. Molestias Fuga Sit Architecto Sint Voluptas Adipisci Similique Magnam Iusto Magni Sequi?\"}', NULL, '2022-09-07 10:57:53', '2022-09-07 10:57:53'),
(109, 2, 'footer.element', '{\"social_link\":\"https:\\/\\/www.instagram.com\\/\",\"social_icon\":\"fab fa-instagram\"}', NULL, '2022-09-07 11:01:07', '2022-09-07 11:01:07'),
(110, 2, 'footer.element', '{\"social_link\":\"https:\\/\\/www.linkedin.com\\/\",\"social_icon\":\"fab fa-linkedin-in\"}', NULL, '2022-09-07 11:01:23', '2022-09-07 11:01:23'),
(111, 2, 'footer.element', '{\"social_link\":\"https:\\/\\/www.twitter.com\\/\",\"social_icon\":\"fab fa-twitter\"}', NULL, '2022-09-07 11:01:34', '2022-09-07 11:01:34'),
(112, 2, 'service.element', '{\"title\":\"Term & Condition\",\"description\":\"<p><font color=\\\"#f7f7f7\\\">Privacy Policy for&nbsp;Company Name<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">At&nbsp;Website Name, accessible at&nbsp;Website.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by&nbsp;Website Name&nbsp;and how we use it.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us through email at&nbsp;Email@Website.com<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">This privacy policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and\\/or collect in&nbsp;Website Name. This policy is not applicable to any information collected offline or via channels other than this website.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight:700;\\\"><font color=\\\"#f7f7f7\\\">Consent<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">By using our website, you hereby consent to our Privacy Policy and agree to its terms.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight:700;\\\"><font color=\\\"#f7f7f7\\\">Information we collect<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and\\/or attachments you may send us, and any other information you may choose to provide.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight:700;\\\"><font color=\\\"#f7f7f7\\\">How we use your information<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">We use the information we collect in various ways, including to:<\\/font><\\/p><ul><li><font color=\\\"#f7f7f7\\\">Provide, operate, and maintain our website<\\/font><\\/li><li><font color=\\\"#f7f7f7\\\">Improve, personalize, and expand our website<\\/font><\\/li><li><font color=\\\"#f7f7f7\\\">Understand and analyze how you use our website<\\/font><\\/li><li><font color=\\\"#f7f7f7\\\">Develop new products, services, features, and functionality<\\/font><\\/li><li><font color=\\\"#f7f7f7\\\">Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes<\\/font><\\/li><li><font color=\\\"#f7f7f7\\\">Send you emails<\\/font><\\/li><li><font color=\\\"#f7f7f7\\\">Find and prevent fraud<\\/font><\\/li><\\/ul><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight:700;\\\"><font color=\\\"#f7f7f7\\\">Log Files<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Website Name&nbsp;follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services\' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring\\/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users\' movement on the website, and gathering demographic information.<\\/font><\\/p><p><font color=\\\"#f7f7f7\\\">Cookies and Web Beacons<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Like any other website,&nbsp;Website Name&nbsp;uses \\u2018cookies\'. These cookies are used to store information including visitors\' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users\' experience by customizing our web page content based on visitors\' browser type and\\/or other information.<\\/font><\\/p><p><font color=\\\"#f7f7f7\\\">DoubleClick DART Cookie<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Google is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL \\u2013&nbsp;<a href=\\\"https:\\/\\/policies.google.com\\/technologies\\/ads\\\">https:\\/\\/policies.google.com\\/technologies\\/ads<\\/a>.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Some of advertisers on our site may use cookies and web beacons. Our advertising partners are listed below. Each of our advertising partners has their own Privacy Policy for their policies on user data. For easier access, we hyperlinked to their Privacy Policies below.<\\/font><\\/p><ul><li><p><font color=\\\"#f7f7f7\\\">Google<\\/font><\\/p><p><a href=\\\"https:\\/\\/policies.google.com\\/technologies\\/ads\\\"><font color=\\\"#f7f7f7\\\">https:\\/\\/policies.google.com\\/technologies\\/ads<\\/font><\\/a><\\/p><\\/li><\\/ul><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight:700;\\\"><font color=\\\"#f7f7f7\\\">Advertising Partners Privacy Policies<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">You may consult this list to find the Privacy Policy for each of the advertising partners of&nbsp;Website Name.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on&nbsp;Website Name, which are sent directly to users\' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and\\/or to personalize the advertising content that you see on websites that you visit.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Note that&nbsp;Website Name&nbsp;has no access to or control over these cookies that are used by third-party advertisers.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight:700;\\\"><font color=\\\"#f7f7f7\\\">Third-Party Privacy Policies<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Website Name\'s Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. You may find a complete list of these Privacy Policies and their links here: Privacy Policy Links.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers\' respective websites. What Are Cookies?<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight:700;\\\"><font color=\\\"#f7f7f7\\\">CCPA Privacy Policy (Do Not Sell My Personal Information)<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Under the CCPA, among other rights, California consumers have the right to:<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Request that a business that collects a consumer\'s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Request that a business delete any personal data about the consumer that a business has collected.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Request that a business that sells a consumer\'s personal data, not sell the consumer\'s personal data.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight:700;\\\"><font color=\\\"#f7f7f7\\\">GDPR Privacy Policy (Data Protection Rights)<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">The right to access \\u2013 You have the right to request copies of your personal data. We may charge you a small fee for this service.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">The right to rectification \\u2013 You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">The right to erasure \\u2013 You have the right to request that we erase your personal data, under certain conditions.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">The right to restrict processing \\u2013 You have the right to request that we restrict the processing of your personal data, under certain conditions.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">The right to object to processing \\u2013 You have the right to object to our processing of your personal data, under certain conditions.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">The right to data portability \\u2013 You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight:700;\\\"><font color=\\\"#f7f7f7\\\">Children\'s Information<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and\\/or monitor and guide their online activity.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Website Name&nbsp;does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.<\\/font><\\/p>\",\"slug\":\"terms\"}', NULL, '2022-09-07 11:02:06', '2022-09-07 11:02:27');
INSERT INTO `section_data` (`id`, `theme`, `key`, `data`, `category`, `created_at`, `updated_at`) VALUES
(113, 2, 'service.element', '{\"title\":\"registration number\",\"description\":\"<p><font color=\\\"#f7f7f7\\\">Privacy Policy for&nbsp;Company Name<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">At&nbsp;Website Name, accessible at&nbsp;Website.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by&nbsp;Website Name&nbsp;and how we use it.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us through email at&nbsp;Email@Website.com<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">This privacy policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and\\/or collect in&nbsp;Website Name. This policy is not applicable to any information collected offline or via channels other than this website.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\"><font color=\\\"#f7f7f7\\\">Consent<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">By using our website, you hereby consent to our Privacy Policy and agree to its terms.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\"><font color=\\\"#f7f7f7\\\">Information we collect<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and\\/or attachments you may send us, and any other information you may choose to provide.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\"><font color=\\\"#f7f7f7\\\">How we use your information<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">We use the information we collect in various ways, including to:<\\/font><\\/p><ul><li><font color=\\\"#f7f7f7\\\">Provide, operate, and maintain our website<\\/font><\\/li><li><font color=\\\"#f7f7f7\\\">Improve, personalize, and expand our website<\\/font><\\/li><li><font color=\\\"#f7f7f7\\\">Understand and analyze how you use our website<\\/font><\\/li><li><font color=\\\"#f7f7f7\\\">Develop new products, services, features, and functionality<\\/font><\\/li><li><font color=\\\"#f7f7f7\\\">Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes<\\/font><\\/li><li><font color=\\\"#f7f7f7\\\">Send you emails<\\/font><\\/li><li><font color=\\\"#f7f7f7\\\">Find and prevent fraud<\\/font><\\/li><\\/ul><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\"><font color=\\\"#f7f7f7\\\">Log Files<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Website Name&nbsp;follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services\' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring\\/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users\' movement on the website, and gathering demographic information.<\\/font><\\/p><p><font color=\\\"#f7f7f7\\\">Cookies and Web Beacons<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Like any other website,&nbsp;Website Name&nbsp;uses \\u2018cookies\'. These cookies are used to store information including visitors\' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users\' experience by customizing our web page content based on visitors\' browser type and\\/or other information.<\\/font><\\/p><p><font color=\\\"#f7f7f7\\\">DoubleClick DART Cookie<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Google is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL \\u2013&nbsp;<a href=\\\"https:\\/\\/policies.google.com\\/technologies\\/ads\\\">https:\\/\\/policies.google.com\\/technologies\\/ads<\\/a>.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Some of advertisers on our site may use cookies and web beacons. Our advertising partners are listed below. Each of our advertising partners has their own Privacy Policy for their policies on user data. For easier access, we hyperlinked to their Privacy Policies below.<\\/font><\\/p><ul><li><p><font color=\\\"#f7f7f7\\\">Google<\\/font><\\/p><p><a href=\\\"https:\\/\\/policies.google.com\\/technologies\\/ads\\\"><font color=\\\"#f7f7f7\\\">https:\\/\\/policies.google.com\\/technologies\\/ads<\\/font><\\/a><\\/p><\\/li><\\/ul><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\"><font color=\\\"#f7f7f7\\\">Advertising Partners Privacy Policies<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">You may consult this list to find the Privacy Policy for each of the advertising partners of&nbsp;Website Name.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on&nbsp;Website Name, which are sent directly to users\' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and\\/or to personalize the advertising content that you see on websites that you visit.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Note that&nbsp;Website Name&nbsp;has no access to or control over these cookies that are used by third-party advertisers.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\"><font color=\\\"#f7f7f7\\\">Third-Party Privacy Policies<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Website Name\'s Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. You may find a complete list of these Privacy Policies and their links here: Privacy Policy Links.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers\' respective websites. What Are Cookies?<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\"><font color=\\\"#f7f7f7\\\">CCPA Privacy Policy (Do Not Sell My Personal Information)<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Under the CCPA, among other rights, California consumers have the right to:<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Request that a business that collects a consumer\'s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Request that a business delete any personal data about the consumer that a business has collected.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Request that a business that sells a consumer\'s personal data, not sell the consumer\'s personal data.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\"><font color=\\\"#f7f7f7\\\">GDPR Privacy Policy (Data Protection Rights)<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">The right to access \\u2013 You have the right to request copies of your personal data. We may charge you a small fee for this service.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">The right to rectification \\u2013 You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">The right to erasure \\u2013 You have the right to request that we erase your personal data, under certain conditions.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">The right to restrict processing \\u2013 You have the right to request that we restrict the processing of your personal data, under certain conditions.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">The right to object to processing \\u2013 You have the right to object to our processing of your personal data, under certain conditions.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">The right to data portability \\u2013 You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><span style=\\\"font-weight: 700;\\\"><font color=\\\"#f7f7f7\\\">Children\'s Information<\\/font><\\/span><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and\\/or monitor and guide their online activity.<\\/font><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><font color=\\\"#f7f7f7\\\">Website Name&nbsp;does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.<\\/font><\\/p><p><br><\\/p><p style=\\\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px;\\\"><\\/p>\",\"slug\":\"registration-number\"}', NULL, '2022-09-07 11:05:51', '2022-09-07 11:05:51'),
(114, 2, 'investor.content', '{\"image\":\"6319c9b26eeec1662634418.png\",\"title\":\"Top Investor\"}', NULL, '2022-09-08 08:48:34', '2022-09-08 08:53:38'),
(115, 1, 'investor.content', '{\"image\":\"6319cfe9d77421662636009.png\",\"title\":\"Top Investor\"}', NULL, '2022-09-08 09:20:10', '2022-09-08 09:20:10'),
(116, 3, 'banner.content', '{\"title\":\"Go To The Next Level Investing\",\"short_description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. animi ipsum et optio aliquid eligendi non culpa impedit repudiandae inventore atque aperiam.\",\"button_text\":\"Get Started\",\"button_text_link\":\"login\",\"button_text_2\":\"Know More\",\"button_text_2_link\":\"about\",\"cta_title\":\"Investment Overview\",\"backgroundimage\":\"638d77c5a4f181670215621.jpg\"}', NULL, '2022-12-04 22:45:02', '2022-12-12 01:13:08'),
(117, 3, 'about.content', '{\"title\":\"Join the HyipMax Community\",\"button_text\":\"Learn More\",\"button_text_link\":\"about\",\"description\":\"<p class=\\\"fs--18px mt-3\\\" style=\\\"margin-bottom: 0px; margin-right: 0px; margin-left: 0px; color: rgb(59, 59, 59); font-size: 1.125rem !important;\\\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora perferendis molestias nesciunt. Accusamus excepturi sint dicta velit nulla quod, natus dolorum inventore alias voluptates voluptatem, iste nemo consequuntur esse.<\\/p><ul class=\\\"check-list mt-4\\\" style=\\\"padding: 0px; margin-bottom: 0px; margin-right: 0px; margin-left: 0px; list-style: none; color: rgb(59, 59, 59); font-size: 16px;\\\"><li style=\\\"margin: 0px; position: relative; font-size: 1.125rem;\\\"><span class=\\\"fas fa-check site-color\\\" style=\\\"margin-right: 10px; color: rgb(247, 199, 11) !important;\\\"><\\/span>&nbsp;Learn how to read and forecast the markets<\\/li><li style=\\\"margin: 0.625rem 0px 0px; position: relative; font-size: 1.125rem;\\\"><span class=\\\"fas fa-check site-color\\\" style=\\\"margin-right: 10px; color: rgb(247, 199, 11) !important;\\\"><\\/span>&nbsp;Discover how to find trade opportunities and manage risk<\\/li><li style=\\\"margin: 0.625rem 0px 0px; position: relative; font-size: 1.125rem;\\\"><span class=\\\"fas fa-check site-color\\\" style=\\\"margin-right: 10px; color: rgb(247, 199, 11) !important;\\\"><\\/span>&nbsp;Make smarter decisions with experienced market analysts guidance<\\/li><li style=\\\"margin: 0.625rem 0px 0px; position: relative; font-size: 1.125rem;\\\"><span class=\\\"fas fa-check site-color\\\" style=\\\"margin-right: 10px; color: rgb(247, 199, 11) !important;\\\"><\\/span>&nbsp;Unlock and trade up to $2.5M of our capital - keep 70% of any profits<\\/li><\\/ul>\",\"image\":\"638d78d70c9d01670215895.png\"}', NULL, '2022-12-04 22:51:35', '2022-12-04 22:59:11'),
(118, 3, 'feature.content', '{\"title\":\"Everything You Need to Fast Track Your Investment\"}', NULL, '2022-12-04 22:59:27', '2022-12-04 22:59:27'),
(119, 3, 'feature.element', '{\"card_title\":\"Top technical analysis\",\"card_icon\":\"fab fa-searchengin\",\"card_description\":\"Architecto doloremque neque asperiores laboriosam voluptatum doloribus aperiam.\"}', NULL, '2022-12-04 23:01:09', '2022-12-04 23:01:09'),
(120, 3, 'feature.element', '{\"card_title\":\"High performance\",\"card_icon\":\"fas fa-chart-bar\",\"card_description\":\"Architecto doloremque neque asperiores laboriosam voluptatum doloribus aperiam.\"}', NULL, '2022-12-04 23:02:02', '2022-12-04 23:02:02'),
(121, 3, 'feature.element', '{\"card_title\":\"Full expert support\",\"card_icon\":\"fas fa-history\",\"card_description\":\"Architecto doloremque neque asperiores laboriosam voluptatum doloribus aperiam.\"}', NULL, '2022-12-04 23:02:14', '2022-12-04 23:02:14'),
(122, 3, 'feature.element', '{\"card_title\":\"Direct Email and SMS* signals\",\"card_icon\":\"fas fa-heartbeat\",\"card_description\":\"Architecto doloremque neque asperiores laboriosam voluptatum doloribus aperiam.\"}', NULL, '2022-12-04 23:02:26', '2022-12-04 23:02:26'),
(123, 3, 'feature.element', '{\"card_title\":\"Highly recommended\",\"card_icon\":\"fab fa-hornbill\",\"card_description\":\"Architecto doloremque neque asperiores laboriosam voluptatum doloribus aperiam.\"}', NULL, '2022-12-04 23:02:35', '2022-12-04 23:02:35'),
(124, 3, 'feature.element', '{\"card_title\":\"Join a growing community\",\"card_icon\":\"fas fa-headphones-alt\",\"card_description\":\"Architecto doloremque neque asperiores laboriosam voluptatum doloribus aperiam.\"}', NULL, '2022-12-04 23:02:47', '2022-12-04 23:02:47'),
(125, 3, 'plan.content', '{\"title\":\"Our Best Plans\"}', NULL, '2022-12-04 23:03:06', '2022-12-04 23:03:06'),
(126, 3, 'howitwork.content', '{\"title\":\"Started Investing With HyipMax\"}', NULL, '2022-12-04 23:03:24', '2022-12-04 23:03:24'),
(127, 3, 'howitwork.element', '{\"title\":\"Create an Account\",\"short_description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae laboriosam adipisci neque cumque, corrupti.\"}', NULL, '2022-12-04 23:03:38', '2022-12-04 23:03:38'),
(128, 3, 'howitwork.element', '{\"title\":\"Choose Plan\",\"short_description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae laboriosam adipisci neque cumque, corrupti.\"}', NULL, '2022-12-04 23:03:44', '2022-12-04 23:03:44'),
(129, 3, 'howitwork.element', '{\"title\":\"Get Profit\",\"short_description\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae laboriosam adipisci neque cumque, corrupti.\"}', NULL, '2022-12-04 23:03:51', '2022-12-04 23:03:51'),
(130, 3, 'faq.element', '{\"question\":\"Does this software is generating online money\",\"answer\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum laborum provident suscipit obcaecati cumque dignissimos quo veniam dolore amet, accusantium ullam. Tenetur, aliquam voluptatibus. Cupiditate, iste dolor officiis animi ipsa laboriosam veritatis doloremque ut tenetur, quidem aspernatur. Iusto laboriosam distinctio, voluptatibus voluptate voluptas iure quam commodi nisi deserunt dolorum aut.\"}', NULL, '2022-12-04 23:04:39', '2022-12-04 23:04:39'),
(131, 3, 'faq.element', '{\"question\":\"Is there any signup Bonus system ?\",\"answer\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum laborum provident suscipit obcaecati cumque dignissimos quo veniam dolore amet, accusantium ullam. Tenetur, aliquam voluptatibus. Cupiditate, iste dolor officiis animi ipsa laboriosam veritatis doloremque ut tenetur, quidem aspernatur. Iusto laboriosam distinctio, voluptatibus voluptate voluptas iure quam commodi nisi deserunt dolorum aut.\"}', NULL, '2022-12-04 23:04:50', '2022-12-04 23:04:50'),
(132, 3, 'faq.element', '{\"question\":\"How Do i check my account Banalace\",\"answer\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum laborum provident suscipit obcaecati cumque dignissimos quo veniam dolore amet, accusantium ullam. Tenetur, aliquam voluptatibus. Cupiditate, iste dolor officiis animi ipsa laboriosam veritatis doloremque ut tenetur, quidem aspernatur. Iusto laboriosam distinctio, voluptatibus voluptate voluptas iure quam commodi nisi deserunt dolorum aut.\"}', NULL, '2022-12-04 23:05:04', '2022-12-04 23:05:04'),
(133, 3, 'faq.element', '{\"question\":\"How many payments gateway are use in this site\",\"answer\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum laborum provident suscipit obcaecati cumque dignissimos quo veniam dolore amet, accusantium ullam. Tenetur, aliquam voluptatibus. Cupiditate, iste dolor officiis animi ipsa laboriosam veritatis doloremque ut tenetur, quidem aspernatur. Iusto laboriosam distinctio, voluptatibus voluptate voluptas iure quam commodi nisi deserunt dolorum aut.\"}', NULL, '2022-12-04 23:05:18', '2022-12-04 23:05:18'),
(134, 3, 'faq.element', '{\"question\":\"How to verify my 2 factor authentication by google?\",\"answer\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum laborum provident suscipit obcaecati cumque dignissimos quo veniam dolore amet, accusantium ullam. Tenetur, aliquam voluptatibus. Cupiditate, iste dolor officiis animi ipsa laboriosam veritatis doloremque ut tenetur, quidem aspernatur. Iusto laboriosam distinctio, voluptatibus voluptate voluptas iure quam commodi nisi deserunt dolorum aut.\"}', NULL, '2022-12-04 23:05:29', '2022-12-04 23:05:29'),
(135, 3, 'faq.content', '{\"title\":\"Frequently Asked Questions\"}', NULL, '2022-12-04 23:05:46', '2022-12-04 23:05:46'),
(136, 3, 'investor.content', '{\"title\":\"Our Top Investors\",\"image\":null}', NULL, '2022-12-04 23:34:37', '2022-12-04 23:34:37'),
(137, 3, 'transaction.content', '{\"title\":\"Our Latest Transaction\"}', NULL, '2022-12-04 23:34:58', '2022-12-04 23:34:58'),
(138, 3, 'testimonial.content', '{\"title\":\"What Our Customer Says\"}', NULL, '2022-12-04 23:35:12', '2022-12-04 23:35:12'),
(139, 3, 'testimonial.element', '{\"image\":\"638d83419cb501670218561.jpg\",\"client_name\":\"Jhone Doe\",\"designation\":\"CEO of BoomHyip\",\"answer\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum in nostrum error, cupiditate harum ad numquam voluptatibus. Reiciendis, dicta veritatis repellat necessitatibus cupiditate odio.\"}', NULL, '2022-12-04 23:36:01', '2022-12-04 23:36:01'),
(140, 3, 'testimonial.element', '{\"image\":\"638d8351e30031670218577.jpg\",\"client_name\":\"Jhon Doe\",\"designation\":\"CEO of BoomHyip\",\"answer\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum in nostrum error, cupiditate harum ad numquam voluptatibus. Reiciendis, dicta veritatis repellat necessitatibus cupiditate odio.\"}', NULL, '2022-12-04 23:36:17', '2022-12-04 23:36:17'),
(141, 3, 'testimonial.element', '{\"image\":\"638d8365b23251670218597.jpg\",\"client_name\":\"Jhon Doe\",\"designation\":\"CEO of BoomHyip\",\"answer\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum in nostrum error, cupiditate harum ad numquam voluptatibus. Reiciendis, dicta veritatis repellat necessitatibus cupiditate odio.\"}', NULL, '2022-12-04 23:36:37', '2022-12-04 23:36:37'),
(142, 3, 'testimonial.element', '{\"image\":\"638d837588df81670218613.jpg\",\"client_name\":\"Jhon Doe\",\"designation\":\"CEO of BoomHyip\",\"answer\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum in nostrum error, cupiditate harum ad numquam voluptatibus. Reiciendis, dicta veritatis repellat necessitatibus cupiditate odio.\"}', NULL, '2022-12-04 23:36:53', '2022-12-04 23:36:53'),
(143, 3, 'affiliate.content', '{\"title\":\"5 steps referral program\"}', NULL, '2022-12-04 23:37:26', '2022-12-04 23:37:26'),
(144, 3, 'blog.content', '{\"title\":\"Our Latest News\"}', NULL, '2022-12-04 23:37:42', '2022-12-04 23:37:42'),
(145, 3, 'blog.element', '{\"image\":\"638d841138b8d1670218769.jpg\",\"title\":\"Temporibus, dignissimos aperiam accusamus dolore eius.\",\"short_description\":\"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis eaque dignissimos animi et ullam. Incidunt aspernatur, perferendis dolor in corporis, hic explicabo doloribus.\",\"description\":\"<div style=\\\"font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\\\"><font color=\\\"#000000\\\" style=\\\"\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis eaque dignissimos animi et ullam. Incidunt aspernatur, perferendis dolor in corporis, hic explicabo doloribus, voluptatibus beatae vitae libero blanditiis repudiandae molestias? In, odit ratione provident inventore excepturi harum dolorum aut, delectus incidunt possimus magni reiciendis eligendi amet cupiditate, quod dolore laudantium consequuntur non alias repellendus consequatur temporibus? Laboriosam adipisci nisi reiciendis explicabo sapiente totam est, iusto deleniti iste cumque magni delectus quasi, veritatis labore earum aliquam tenetur dolores vitae ducimus. Necessitatibus praesentium repellat nisi assumenda temporibus odit minima eius iure molestias expedita totam suscipit perferendis eveniet at, ipsum, ipsam minus ipsa, atque fugiat esse ut sint nulla natus. Sequi ad rerum illo excepturi distinctio quia molestias quasi neque voluptate eos illum iste autem, corrupti qui cumque perspiciatis quis vel nam dolorem in placeat, vero repudiandae sapiente? Neque, excepturi reiciendis adipisci totam vel fugit vitae consectetur ex tempora distinctio iure accusantium molestias!<\\/font><\\/div>\",\"tag\":\"hyip\"}', NULL, '2022-12-04 23:39:29', '2022-12-04 23:39:29'),
(146, 3, 'blog.element', '{\"image\":\"638d844b666291670218827.jpg\",\"title\":\"Consectetur ea quod et possimus quae dolore iste architecto.\",\"short_description\":\"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis eaque dignissimos animi et ullam. Incidunt aspernatur, perferendis dolor in corporis.\",\"description\":\"<p><span style=\\\"color: rgb(0, 0, 0); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; white-space: pre;\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis eaque dignissimos animi et ullam. Incidunt aspernatur, perferendis dolor in corporis, hic explicabo doloribus, voluptatibus beatae vitae libero blanditiis repudiandae molestias? In, odit ratione provident inventore excepturi harum dolorum aut, delectus incidunt possimus magni reiciendis eligendi amet cupiditate, quod dolore laudantium consequuntur non alias repellendus consequatur temporibus? Laboriosam adipisci nisi reiciendis explicabo sapiente totam est, iusto deleniti iste cumque magni delectus quasi, veritatis labore earum aliquam tenetur dolores vitae ducimus. Necessitatibus praesentium repellat nisi assumenda temporibus odit minima eius iure molestias expedita totam suscipit perferendis eveniet at, ipsum, ipsam minus ipsa, atque fugiat esse ut sint nulla natus. Sequi ad rerum illo excepturi distinctio quia molestias quasi neque voluptate eos illum iste autem, corrupti qui cumque perspiciatis quis vel nam dolorem in placeat, vero repudiandae sapiente? Neque, excepturi reiciendis adipisci totam vel fugit vitae consectetur ex tempora distinctio iure accusantium molestias!<\\/span><br><\\/p>\",\"tag\":\"hyip\"}', NULL, '2022-12-04 23:40:27', '2022-12-04 23:40:27'),
(147, 3, 'blog.element', '{\"image\":\"638d848f2b2891670218895.jpg\",\"title\":\"Recusandae modi dolores fugit suscipit officiis earum odio.\",\"short_description\":\"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis eaque dignissimos animi et ullam. Incidunt aspernatur, perferendis dolor in corporis.\",\"description\":\"<p><span style=\\\"color: rgb(0, 0, 0); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; white-space: pre;\\\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis eaque dignissimos animi et ullam. Incidunt aspernatur, perferendis dolor in corporis, hic explicabo doloribus, voluptatibus beatae vitae libero blanditiis repudiandae molestias? In, odit ratione provident inventore excepturi harum dolorum aut, delectus incidunt possimus magni reiciendis eligendi amet cupiditate, quod dolore laudantium consequuntur non alias repellendus consequatur temporibus? Laboriosam adipisci nisi reiciendis explicabo sapiente totam est, iusto deleniti iste cumque magni delectus quasi, veritatis labore earum aliquam tenetur dolores vitae ducimus. Necessitatibus praesentium repellat nisi assumenda temporibus odit minima eius iure molestias expedita totam suscipit perferendis eveniet at, ipsum, ipsam minus ipsa, atque fugiat esse ut sint nulla natus. Sequi ad rerum illo excepturi distinctio quia molestias quasi neque voluptate eos illum iste autem, corrupti qui cumque perspiciatis quis vel nam dolorem in placeat, vero repudiandae sapiente? Neque, excepturi reiciendis adipisci totam vel fugit vitae consectetur ex tempora distinctio iure accusantium molestias!<\\/span><br><\\/p>\",\"tag\":\"Hyip\"}', NULL, '2022-12-04 23:41:35', '2022-12-04 23:41:35'),
(148, 3, 'contact.content', '{\"title\":\"We\'d Love to Hear From You\",\"location\":\"10\\/3A Zamzam Tower, Alwal Street Newyork\",\"email\":\"support@company.com\",\"phone\":\"+544 45445045745\"}', NULL, '2022-12-04 23:42:35', '2022-12-04 23:42:35'),
(149, 3, 'footer.content', '{\"map_image\":\"639185ae6de3b1670481326.png\",\"footer_short_description\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugiat delectus maxime nisi explicabo doloribus minima similique, quia hic accusantium laudantium odit voluptatibus molestiae enim aut repellat.\",\"payment_image\":\"638d84ea3e5611670218986.jpg\"}', NULL, '2022-12-04 23:43:06', '2022-12-08 00:35:26'),
(150, 3, 'footer.element', '{\"social_link\":\"facebook.com\",\"social_icon\":\"fab fa-facebook-f\"}', NULL, '2022-12-04 23:51:52', '2022-12-04 23:51:52'),
(151, 3, 'footer.element', '{\"social_link\":\"#\",\"social_icon\":\"fab fa-linkedin-in\"}', NULL, '2022-12-04 23:52:06', '2022-12-04 23:52:06'),
(152, 3, 'footer.element', '{\"social_link\":\"#\",\"social_icon\":\"fab fa-twitter\"}', NULL, '2022-12-04 23:52:17', '2022-12-04 23:52:17'),
(153, 3, 'footer.element', '{\"social_link\":\"#\",\"social_icon\":\"fab fa-instagram\"}', NULL, '2022-12-04 23:52:28', '2022-12-04 23:52:28'),
(154, 3, 'privacy policy.content', '{\"Title\":\"Privacy & Policy\",\"Privacy_Policy\":\"<div>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis eaque dignissimos animi et ullam. Incidunt aspernatur, perferendis dolor in corporis, hic explicabo doloribus, voluptatibus beatae vitae libero blanditiis repudiandae molestias? In, odit ratione provident inventore excepturi harum dolorum aut, delectus incidunt possimus magni reiciendis eligendi amet cupiditate, quod dolore laudantium consequuntur non alias repellendus consequatur temporibus? Laboriosam adipisci nisi reiciendis explicabo sapiente totam est, iusto deleniti iste cumque magni delectus quasi, veritatis labore earum aliquam tenetur dolores vitae ducimus. Necessitatibus praesentium repellat nisi assumenda temporibus odit minima eius iure molestias expedita totam suscipit perferendis eveniet at, ipsum, ipsam minus ipsa, atque fugiat esse ut sint nulla natus. Sequi ad rerum illo excepturi distinctio quia molestias quasi neque voluptate eos illum iste autem, corrupti qui cumque perspiciatis quis vel nam dolorem in placeat, vero repudiandae sapiente? Neque, excepturi reiciendis adipisci totam vel fugit vitae consectetur ex tempora distinctio iure accusantium molestias!<\\/div>\"}', NULL, '2022-12-04 23:53:07', '2022-12-16 23:14:14'),
(155, 3, 'banner.element', '{\"total\":\"$20 million\",\"title\":\"Total deposit in October 2022\"}', NULL, '2022-12-06 00:59:10', '2022-12-06 00:59:10'),
(156, 3, 'banner.element', '{\"total\":\"20K\",\"title\":\"Total investors in 2022\"}', NULL, '2022-12-06 00:59:21', '2022-12-06 00:59:21'),
(157, 3, 'banner.element', '{\"total\":\"$102.5 million\",\"title\":\"Total withdraw in October 2022\"}', NULL, '2022-12-06 00:59:31', '2022-12-06 01:00:05'),
(158, 3, 'newsletter.content', '{\"title\":\"Our Newsletter\",\"short_description\":\"Tamen Quem Nulla Quae Legam Multos Aute Sint Culpa Legam Noster Magna\"}', NULL, '2022-12-07 23:15:13', '2022-12-07 23:15:13'),
(159, 3, 'service.element', '{\"title\":\"Hyip Investment\",\"description\":\"<div>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo cupiditate perferendis, consectetur sapiente dolor fugit ad. Quisquam deserunt eos impedit necessitatibus ipsa voluptatibus at soluta labore deleniti blanditiis beatae quos laudantium non ab sed molestiae ut voluptas eligendi a, perspiciatis praesentium ducimus incidunt. Amet ea sunt pariatur eos dolor illum non, voluptates assumenda minus at, quae delectus facere voluptatibus vel obcaecati aut. Laborum quod error ipsam. Dolore officia aperiam cumque. Id vitae velit nulla, soluta corrupti eligendi veritatis voluptas, dolore expedita nostrum tempore, dicta praesentium maiores ipsa quia quaerat exercitationem nam nihil qui? Autem dolores at amet quam inventore soluta laborum expedita dolorum nihil architecto laboriosam, pariatur dicta quibusdam enim recusandae quas officiis repudiandae fugit debitis sapiente maiores minus eum, iste rem. Recusandae vel tenetur expedita eligendi assumenda impedit praesentium iusto minus harum iure, cupiditate optio corrupti magnam illum dicta aut consequuntur suscipit officiis reiciendis asperiores accusamus obcaecati dolorum! Soluta architecto eum qui reiciendis odio aspernatur? Fuga, numquam! Dicta saepe assumenda maxime voluptatum vel veritatis modi praesentium sint. Autem tempore deserunt temporibus impedit ullam vel aliquid pariatur fuga quisquam voluptas exercitationem dolor excepturi minus aperiam sit quas veritatis neque, repudiandae nisi consectetur sapiente, expedita sequi soluta corrupti? Quam quisquam est porro. In porro totam saepe asperiores vero sit enim, ab praesentium magni eum suscipit culpa consectetur. Laudantium pariatur molestiae quisquam vel inventore distinctio, facilis obcaecati quis expedita doloremque voluptatem eligendi incidunt neque et saepe quidem. Asperiores consectetur dolore maxime dicta doloribus esse voluptatibus sapiente fuga facere, quam nam odio aut corporis molestiae, dignissimos quis, reprehenderit ullam fugiat alias ducimus sequi! Blanditiis excepturi obcaecati aliquam? Unde rerum ipsum illum dicta, quod quis magni praesentium consequuntur saepe, nobis totam cupiditate neque maxime? Magnam amet eum voluptate suscipit doloribus animi impedit nisi, id possimus mollitia iste officia nesciunt! Nam corporis dolor error debitis?<\\/div>\",\"slug\":\"hyip-investment\"}', NULL, '2022-12-16 23:00:13', '2022-12-16 23:05:21'),
(160, 3, 'service.element', '{\"title\":\"Investment Plan\",\"description\":\"<div style=\\\"font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\\\"><font color=\\\"#000000\\\" style=\\\"\\\">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo cupiditate perferendis, consectetur sapiente dolor fugit ad. Quisquam deserunt eos impedit necessitatibus ipsa voluptatibus at soluta labore deleniti blanditiis beatae quos laudantium non ab sed molestiae ut voluptas eligendi a, perspiciatis praesentium ducimus incidunt. Amet ea sunt pariatur eos dolor illum non, voluptates assumenda minus at, quae delectus facere voluptatibus vel obcaecati aut. Laborum quod error ipsam. Dolore officia aperiam cumque. Id vitae velit nulla, soluta corrupti eligendi veritatis voluptas, dolore expedita nostrum tempore, dicta praesentium maiores ipsa quia quaerat exercitationem nam nihil qui? Autem dolores at amet quam inventore soluta laborum expedita dolorum nihil architecto laboriosam, pariatur dicta quibusdam enim recusandae quas officiis repudiandae fugit debitis sapiente maiores minus eum, iste rem. Recusandae vel tenetur expedita eligendi assumenda impedit praesentium iusto minus harum iure, cupiditate optio corrupti magnam illum dicta aut consequuntur suscipit officiis reiciendis asperiores accusamus obcaecati dolorum! Soluta architecto eum qui reiciendis odio aspernatur? Fuga, numquam! Dicta saepe assumenda maxime voluptatum vel veritatis modi praesentium sint. Autem tempore deserunt temporibus impedit ullam vel aliquid pariatur fuga quisquam voluptas exercitationem dolor excepturi minus aperiam sit quas veritatis neque, repudiandae nisi consectetur sapiente, expedita sequi soluta corrupti? Quam quisquam est porro. In porro totam saepe asperiores vero sit enim, ab praesentium magni eum suscipit culpa consectetur. Laudantium pariatur molestiae quisquam vel inventore distinctio, facilis obcaecati quis expedita doloremque voluptatem eligendi incidunt neque et saepe quidem. Asperiores consectetur dolore maxime dicta doloribus esse voluptatibus sapiente fuga facere, quam nam odio aut corporis molestiae, dignissimos quis, reprehenderit ullam fugiat alias ducimus sequi! Blanditiis excepturi obcaecati aliquam? Unde rerum ipsum illum dicta, quod quis magni praesentium consequuntur saepe, nobis totam cupiditate neque maxime? Magnam amet eum voluptate suscipit doloribus animi impedit nisi, id possimus mollitia iste officia nesciunt! Nam corporis dolor error debitis?<\\/font><\\/div>\",\"slug\":\"investment-plan\"}', NULL, '2022-12-16 23:06:01', '2022-12-16 23:06:01'),
(161, 3, 'service.element', '{\"title\":\"Instant Withdraw\",\"description\":\"<p><span style=\\\"color: rgb(0, 0, 0); font-family: Poppins; font-size: 14px;\\\">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo cupiditate perferendis, consectetur sapiente dolor fugit ad. Quisquam deserunt eos impedit necessitatibus ipsa voluptatibus at soluta labore deleniti blanditiis beatae quos laudantium non ab sed molestiae ut voluptas eligendi a, perspiciatis praesentium ducimus incidunt. Amet ea sunt pariatur eos dolor illum non, voluptates assumenda minus at, quae delectus facere voluptatibus vel obcaecati aut. Laborum quod error ipsam. Dolore officia aperiam cumque. Id vitae velit nulla, soluta corrupti eligendi veritatis voluptas, dolore expedita nostrum tempore, dicta praesentium maiores ipsa quia quaerat exercitationem nam nihil qui? Autem dolores at amet quam inventore soluta laborum expedita dolorum nihil architecto laboriosam, pariatur dicta quibusdam enim recusandae quas officiis repudiandae fugit debitis sapiente maiores minus eum, iste rem. Recusandae vel tenetur expedita eligendi assumenda impedit praesentium iusto minus harum iure, cupiditate optio corrupti magnam illum dicta aut consequuntur suscipit officiis reiciendis asperiores accusamus obcaecati dolorum! Soluta architecto eum qui reiciendis odio aspernatur? Fuga, numquam! Dicta saepe assumenda maxime voluptatum vel veritatis modi praesentium sint. Autem tempore deserunt temporibus impedit ullam vel aliquid pariatur fuga quisquam voluptas exercitationem dolor excepturi minus aperiam sit quas veritatis neque, repudiandae nisi consectetur sapiente, expedita sequi soluta corrupti? Quam quisquam est porro. In porro totam saepe asperiores vero sit enim, ab praesentium magni eum suscipit culpa consectetur. Laudantium pariatur molestiae quisquam vel inventore distinctio, facilis obcaecati quis expedita doloremque voluptatem eligendi incidunt neque et saepe quidem. Asperiores consectetur dolore maxime dicta doloribus esse voluptatibus sapiente fuga facere, quam nam odio aut corporis molestiae, dignissimos quis, reprehenderit ullam fugiat alias ducimus sequi! Blanditiis excepturi obcaecati aliquam? Unde rerum ipsum illum dicta, quod quis magni praesentium consequuntur saepe, nobis totam cupiditate neque maxime? Magnam amet eum voluptate suscipit doloribus animi impedit nisi, id possimus mollitia iste officia nesciunt! Nam corporis dolor error debitis?<\\/span><br><\\/p>\",\"slug\":\"instant-withdraw\"}', NULL, '2022-12-16 23:06:28', '2022-12-16 23:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '1=Closed,2=Pending, 3=Answered',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replies`
--

CREATE TABLE `ticket_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`id`, `name`, `time`, `created_at`, `updated_at`) VALUES
(1, '6 Month', '4320', '2022-02-12 04:23:36', '2022-04-16 09:03:39'),
(2, '3 Month', '2166', '2022-02-12 04:23:48', '2022-04-16 09:02:36'),
(3, 'Month', '720', '2022-02-27 07:45:23', '2022-04-16 09:00:36'),
(4, 'week', '168', '2022-02-27 07:45:39', '2022-04-16 08:59:51'),
(5, 'Day', '24', '2022-02-27 07:46:37', '2022-04-16 08:58:43'),
(6, 'Hours', '1', '2022-02-27 07:47:05', '2022-04-16 08:56:33'),
(7, 'year', '8760', '2022-04-16 09:04:08', '2022-04-16 09:04:08');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trx` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gateway_transaction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `gateway_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` decimal(8,2) NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` decimal(28,8) NOT NULL DEFAULT 0.00000000,
  `get_paid_date` date DEFAULT NULL,
  `image` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_verification_code` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=active, 0=deactivate',
  `reffered_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `ev` tinyint(1) NOT NULL DEFAULT 0,
  `sv` tinyint(1) NOT NULL DEFAULT 0,
  `kyc` int(11) NOT NULL DEFAULT 0,
  `kyc_infos` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_interests`
--

CREATE TABLE `user_interests` (
  `id` int(19) NOT NULL,
  `user_id` int(19) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `interest_amount` float(28,8) DEFAULT NULL,
  `purpouse` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `withdraw_method_id` bigint(20) UNSIGNED NOT NULL,
  `withdraw_amount` decimal(28,8) NOT NULL,
  `withdraw_charge` decimal(28,8) NOT NULL,
  `user_withdraw_prof` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_of_reject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_gateways`
--

CREATE TABLE `withdraw_gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_amount` decimal(28,8) NOT NULL,
  `max_amount` decimal(28,8) NOT NULL,
  `charge_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` decimal(28,8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `withdraw_instruction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraw_gateways`
--

INSERT INTO `withdraw_gateways` (`id`, `name`, `min_amount`, `max_amount`, `charge_type`, `charge`, `status`, `withdraw_instruction`, `created_at`, `updated_at`) VALUES
(2, 'CoinPayments BTC', '500.00000000', '5000.00000000', 'fixed', '5.00000000', 1, '<p>Wallet Address :&nbsp;<span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: 14.625px;\">17s5BQm5kWpdG9a5egA2p6Ca3gtQqhicB3</span></p>', '2022-08-07 08:58:05', '2022-08-07 08:58:05'),
(3, 'Ethurm', '10.00000000', '1000.00000000', 'percent', '17.00000000', 1, '<p>gtfdhfhfhfhjfhffffjgjffgfhgfhgfghfjhgf</p>', '2022-08-07 09:11:46', '2022-10-16 07:07:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertises`
--
ALTER TABLE `advertises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crypto_payments`
--
ALTER TABLE `crypto_payments`
  ADD PRIMARY KEY (`paymentID`),
  ADD UNIQUE KEY `key3` (`boxID`,`orderID`,`userID`,`txID`,`amount`,`addr`),
  ADD KEY `boxID` (`boxID`),
  ADD KEY `boxType` (`boxType`),
  ADD KEY `userID` (`userID`),
  ADD KEY `countryID` (`countryID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `amount` (`amount`),
  ADD KEY `amountUSD` (`amountUSD`),
  ADD KEY `coinLabel` (`coinLabel`),
  ADD KEY `unrecognised` (`unrecognised`),
  ADD KEY `addr` (`addr`),
  ADD KEY `txID` (`txID`),
  ADD KEY `txDate` (`txDate`),
  ADD KEY `txConfirmed` (`txConfirmed`),
  ADD KEY `txCheckDate` (`txCheckDate`),
  ADD KEY `processed` (`processed`),
  ADD KEY `processedDate` (`processedDate`),
  ADD KEY `recordCreated` (`recordCreated`),
  ADD KEY `key1` (`boxID`,`orderID`),
  ADD KEY `key2` (`boxID`,`orderID`,`userID`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_securities`
--
ALTER TABLE `login_securities`
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
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `money_transfers`
--
ALTER TABLE `money_transfers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `money_transfers_transaction_id_unique` (`transaction_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_transaction_id_unique` (`transaction_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plans_plan_name_unique` (`plan_name`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reffered_commissions`
--
ALTER TABLE `reffered_commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `section_data`
--
ALTER TABLE `section_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_data_category_foreign` (`category`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`);

--
-- Indexes for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_replies_ticket_id_foreign` (`ticket_id`),
  ADD KEY `ticket_replies_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_trx_unique` (`trx`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_interests`
--
ALTER TABLE `user_interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `withdraws_transaction_id_unique` (`transaction_id`);

--
-- Indexes for table `withdraw_gateways`
--
ALTER TABLE `withdraw_gateways`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `withdraw_gateways_name_unique` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advertises`
--
ALTER TABLE `advertises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `crypto_payments`
--
ALTER TABLE `crypto_payments`
  MODIFY `paymentID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login_securities`
--
ALTER TABLE `login_securities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `money_transfers`
--
ALTER TABLE `money_transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reffered_commissions`
--
ALTER TABLE `reffered_commissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `section_data`
--
ALTER TABLE `section_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_interests`
--
ALTER TABLE `user_interests`
  MODIFY `id` int(19) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraw_gateways`
--
ALTER TABLE `withdraw_gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
