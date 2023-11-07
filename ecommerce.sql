-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 05:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `SL_No` int(11) NOT NULL,
  `Category_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`SL_No`, `Category_Name`) VALUES
(1, 'Electronic'),
(2, 'Men\'s'),
(3, 'Women\'s'),
(4, 'Kids & Baby care'),
(5, 'Health & Beauty'),
(6, 'Sports & Outdoors'),
(7, 'Toys & Games'),
(8, 'Books & Media'),
(9, 'Automotive'),
(10, 'Jewelry'),
(11, 'Home & Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `order id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `products` varchar(100) DEFAULT NULL,
  `Price` int(4) DEFAULT NULL,
  `Unit_Price` int(5) DEFAULT NULL,
  `Quantity` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `order id`, `product_id`, `user_id`, `user_name`, `products`, `Price`, `Unit_Price`, `Quantity`) VALUES
(32, 44, 1, 1, 'Sheikh Md. Rubayet Islam Ifti', 'Keyboard', 800, 800, 1),
(33, 44, 1, 1, 'Sheikh Md. Rubayet Islam Ifti', 'Keyboard', 800, 800, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_20_162606_users_phone', 2),
(6, '2023_09_20_163159_users_phone_otps_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `products` varchar(100) DEFAULT NULL,
  `Size` varchar(10) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Price` int(11) NOT NULL,
  `order_status` varchar(10) DEFAULT NULL,
  `Payment` varchar(20) DEFAULT NULL,
  `Payment_Status` varchar(10) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`order_id`, `customer_id`, `customer_name`, `location`, `product_id`, `products`, `Size`, `Quantity`, `Price`, `order_status`, `Payment`, `Payment_Status`, `Date`, `created_at`) VALUES
(51, 1, 'Sheikh Md. Rubayet Islam Ifti', 'Mirpur, Dhaka', 3, 'Mouse', NULL, 1, 1000, 'Delivered', 'bkash', 'paid', '2023-08-24', NULL),
(52, 1, 'Sheikh Md. Rubayet Islam Ifti', 'Mirpur, Dhaka', 4, 'Earphone', NULL, 1, 400, 'Delivered', 'bkash', 'paid', '2023-08-24', NULL),
(54, 1, 'Sheikh Md. Rubayet Islam Ifti', 'Mirpur, Dhaka', 4, 'Earphone', NULL, 1, 400, 'Delivered', 'bkash', 'paid', '2023-08-27', NULL),
(56, 1, 'Sheikh Md. Rubayet Islam Ifti', 'Mirpur, Dhaka', 6, 'RAM', NULL, 1, 450, 'Delivered', 'nagad', 'paid', '2023-09-07', NULL),
(57, 1, 'Sheikh Md. Rubayet Islam Ifti', 'Gulshan, Dhaka', 1, 'Keyboard', NULL, 1, 800, 'Delivered', 'nagad', 'paid', '2023-09-07', NULL),
(58, 1, 'Sheikh Md. Rubayet Islam Ifti', 'Mirpur, Dhaka', 4, 'Earphone', NULL, 2, 800, 'Delivered', 'bkash', 'paid', '2023-11-01', NULL),
(59, 1, 'Sheikh Md. Rubayet Islam Ifti', 'Mirpur, Dhaka', 1, 'Keyboard', NULL, 1, 7, 'Delivered', 'bkash', 'paid', '2023-11-30', NULL),
(62, 1, 'Sheikh Md. Rubayet Islam Ifti', 'Sirajagnj', 4, 'Earphone', NULL, 3, 9, 'Shipping', 'bkash', 'paid', '2023-09-19', NULL),
(63, 14, 'Pias Miah', 'Mirpur, Dhaka', 1, 'Keyboard', NULL, 3, 21, 'Delivered', 'bkash', 'paid', '2023-09-21', NULL),
(64, 38, 'Pias Miah', 'Mirpur', 1, 'Keyboard', NULL, 1, 0, 'Delivered', 'rocket', 'paid', '2023-09-24', NULL),
(65, 38, 'Pias Miah', 'Mirpur', 4, 'Earphone', NULL, 1, 3, 'Delivered', 'nagad', 'paid', '2023-09-24', NULL),
(66, 35, 'Rubayet', 'Mirpur', 5, 'PS5', NULL, 2, 2734, 'Delivered', 'cod', 'paid', '2023-10-12', NULL),
(67, 35, 'Rubayet', 'Sirajagnj', 13, 'Laptop', NULL, 1, 900, 'Delivered', 'cod', 'paid', '2023-10-31', '2023-10-15 14:38:57'),
(68, 35, 'Rubayet', 'Sirajagnj', 14, 'Phone', NULL, 1, 500, 'Delivered', 'cod', 'paid', '2023-10-15', '2023-10-15 14:43:27'),
(69, 35, 'Rubayet', 'Sirajagnj', 12, 'Earphone', NULL, 1, 14, 'Delivered', 'cod', 'paid', '2023-10-31', '2023-10-16 13:32:44'),
(70, 35, 'Rubayet', 'Sirajagnj', 1, 'Keyboard', NULL, 1, 5, 'Shipping', 'cod', 'paid', '2023-10-16', '2023-10-16 13:39:19'),
(71, 35, 'Rubayet', 'Sirajagnj', 14, 'Phone', NULL, 1, 500, 'Delivered', 'cod', 'paid', '2023-11-02', '2023-10-16 13:39:19'),
(72, 35, 'Rubayet', 'Sirajagnj', 6, 'RAM', NULL, 2, 8, 'Shipping', 'cod', 'paid', NULL, '2023-10-19 12:40:59'),
(73, 35, 'Rubayet', 'Sirajagnj', 12, 'Earphone', NULL, 1, 14, 'Shipping', 'cod', 'paid', NULL, '2023-10-19 12:40:59'),
(74, 35, 'Rubayet', 'Mirpur, Dhaka', 5, 'PS5', NULL, 1, 499, 'Shipping', 'cod', 'paid', NULL, '2023-10-19 12:40:59'),
(75, 35, 'Rubayet', 'Mirpur, Dhaka', 13, 'Laptop', NULL, 1, 900, 'Shipping', 'cod', 'paid', NULL, '2023-10-19 12:40:59'),
(76, 35, 'Rubayet', 'Mirpur, Dhaka', 6, 'RAM', NULL, 2, 8, 'Shipping', 'cod', 'paid', NULL, '2023-10-19 12:40:59'),
(77, 35, 'Rubayet', 'Sirajagnj', 12, 'Earphone', NULL, 1, 14, 'Shipping', 'cod', 'paid', NULL, '2023-10-22 05:46:59'),
(78, 35, 'Rubayet', 'Mirpur, Dhaka', 14, 'Phone', NULL, 1, 500, 'Shipping', 'cod', 'paid', NULL, '2023-10-22 05:46:59'),
(80, 35, 'Rubayet', NULL, 16, 'Tuxedo Suit', 'M', 2, 200, 'Pending', NULL, NULL, NULL, '2023-10-22 15:04:00'),
(81, 35, 'Rubayet', NULL, 16, 'Tuxedo Suit', 'M', 3, 300, 'Pending', NULL, NULL, NULL, '2023-10-22 15:04:01'),
(82, 35, 'Rubayet', NULL, 16, 'Tuxedo Suit', 'M', 2, 200, 'Pending', NULL, NULL, NULL, '2023-10-22 15:04:02'),
(83, 35, 'Rubayet', NULL, 16, 'Tuxedo Suit', 'M', 1, 100, 'Pending', NULL, NULL, NULL, '2023-10-22 15:04:02'),
(84, 35, 'Rubayet', NULL, 16, 'Tuxedo Suit', 'M', 0, 0, 'Pending', NULL, NULL, NULL, '2023-10-22 15:04:03'),
(85, 35, 'Rubayet', NULL, 16, 'Tuxedo Suit', 'M', 1, 100, 'Pending', NULL, NULL, NULL, '2023-10-22 15:04:26'),
(86, 28, 'Sheikh Md. Rubayet Islam Ifti', 'Sirajagnj', 17, 'Men Perfume', NULL, 1, 230, 'Shipping', 'cod', 'paid', NULL, '2023-10-24 14:56:34'),
(87, 28, 'Sheikh Md. Rubayet Islam Ifti', 'Sirajagnj', 16, 'Tuxedo Suit', 'XL', 5, 500, 'Shipping', 'cod', 'paid', NULL, '2023-10-24 14:56:34'),
(88, 28, 'Sheikh Md. Rubayet Islam Ifti', 'Sirajagnj', 16, 'Tuxedo Suit', 'M', 5, 500, 'Shipping', 'cod', 'paid', NULL, '2023-10-24 14:56:34'),
(89, 28, 'Sheikh Md. Rubayet Islam Ifti', NULL, 25, 'Men Facewash', NULL, 1, 8, 'Delivered', 'cod', 'paid', '2023-12-27', '2023-10-24 14:56:34'),
(90, 28, 'Sheikh Md. Rubayet Islam Ifti', 'Sirajagnj', 23, 'Men Facewash', NULL, 2, 12, 'Delivered', 'cod', 'paid', '2023-10-31', '2023-10-24 14:56:34'),
(91, 28, 'Sheikh Md. Rubayet Islam Ifti', 'Sirajagnj', 19, 'Men Deo Roll', NULL, 1, 6, 'Delivered', 'cod', 'paid', '2023-10-24', '2023-10-24 14:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('piyashasan08@gmail.com', '$2y$10$2AGnEEdXNujxwdHGseItmO9G4LvtnbI7CqrcQrHYz2vlT2qx.VPzK', '2023-09-21 02:01:16'),
('rrafi711629@gmail.com', '$2y$10$vHA1pxV3OoxgVSPOhZe50ec2KZBFA03FW7HeacPgl901xeOWspUJK', '2023-09-22 12:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `pro_des` varchar(1000) NOT NULL,
  `Quantity_Sold` int(11) NOT NULL,
  `price` int(3) NOT NULL,
  `Stock` int(100) DEFAULT NULL,
  `Stock_Status` varchar(50) DEFAULT NULL,
  `Previous_Price` int(10) DEFAULT NULL,
  `pro_pic` varchar(255) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `category`, `pro_des`, `Quantity_Sold`, `price`, `Stock`, `Stock_Status`, `Previous_Price`, `pro_pic`, `created_at`) VALUES
(1, 'Keyboard', 'Electronic', 'Apple Keyboard', 3, 4, 100, 'Available', 5, 'product/clay-banks-PXaQXThG1FY-unsplash.jpg', '2023-08-01'),
(3, 'Mouse', 'Electronic', 'Gaming Mouse', 2, 7, 100, 'Available', 9, 'product/mice.jpeg', '2023-08-09'),
(4, 'Earphone', 'Electronic', 'Earphone', 4, 3, 200, 'Available', NULL, 'product/361157965_239171365721829_6516257995815106485_n.png', '2023-07-03'),
(5, 'PS5', 'Electronic', 'PlayStation Console', 5, 499, 1, 'Available', 1367, 'product/ps5.jpeg', '2023-10-09'),
(6, 'RAM', 'Electronic', 'Crucial 8GB DDR5 4800MHz U-DIMM Desktop RAM', 1, 4, 20, 'Available', NULL, 'product/ram.jpeg', '2023-08-20'),
(7, 'Watch', 'Electronic', 'Olevs 5666 Men Watch Luxury Leather Luminous Hand Watch Full Black', 0, 3, 15, 'Available', NULL, 'product/Watch.jpg', '2023-06-12'),
(12, 'Earphone', 'Electronic', 'Joyroom JR-T03S Bilaterial TWS Bluetooth Earbuds', 1, 14, 20, 'Available', NULL, 'product/jr-t03s-500x500.jpeg', '2023-10-15'),
(13, 'Laptop', 'Electronic', 'Lenovo IdeaPad Flex 5 14ALC7 AMD Ryzen 7 5700U 14\" Touchscreen Laptop', 1, 900, 5, 'Available', NULL, 'product/ideapad-flex-5-14alc7-08-500x500.webp', '2023-10-15'),
(14, 'Phone', 'Electronic', 'Google Pixel 7 Android Smartphone (8/128GB)', 2, 500, 5, 'Available', NULL, 'product/pixel-7-obsidian-500x500.jpg', '2023-10-15'),
(15, 'Sound Bar', 'Electronic', 'Digital X X-S8 Rectangular Single Bluetooth Black TV Sound Bar', 0, 40, 5, 'Available', NULL, 'product/digital-x-x-s8-rectangular-single-bluetooth-black-11548737002.jpg', '2023-10-21'),
(16, 'Tuxedo Suit', 'Men', 'Hi-Tie Stylish Men Suit Jacket Blazer Shawl Lapel One Button Slim Fit Long Sleeve Jacket Tuxedo Party Dinner.', 0, 100, 5, 'Available', NULL, 'product/718t5UyL6LL._AC_UY741_.jpg', '2023-10-21'),
(17, 'Men Perfume', 'Health & Beauty', 'ATKINSONS OUD SAVE THE KING', 0, 230, 39, 'Available', NULL, 'product/0001547_atkinsons-oud-save-the-king_625.jpg', '2023-10-23'),
(19, 'Men Deo Roll', 'Health & Beauty', 'Adidas Fresh Endurance 72H Anti Perspirant Men Deo Roll On 50ml', 1, 6, 9, 'Available', NULL, 'product/adidas-deodorant-roll-on-fresh-endurance-72h-anti-perspirant-50-ml.jpeg', '2023-10-24'),
(20, 'Men Facewash', 'Health & Beauty', 'Laikou Men Deep Cleansing Refreshing & oil Control Face wash - 50g', 0, 4, 10, 'available', NULL, 'product/c8d0511c049a9e6761f2cb2ed81362ca.jpg_750x750.jpg_.jpg', '2023-10-24'),
(23, 'Men Facewash', 'Health & Beauty', 'Muuchstac Ocean Face Wash For Man - 100 ml', 2, 6, 7, 'Available', NULL, 'product/gsdgsdg-324x324.jpg', '2023-10-24'),
(24, 'Men Deodorant', 'Health & Beauty', 'Old Spice High Endurance Deodorant 85 ml', 0, 6, 0, 'Out of Stock', NULL, 'product/71QSYJostJS.jpg', '2023-10-24'),
(25, 'Men Facewash', 'Health & Beauty', 'Loreal Paris Men Expert Pure Carbon Purifying Daily Face Wash 100ml (International)', 1, 8, 9, 'Available', NULL, 'product/51e60aa0-bf89-4934-b3c1-faa6a3eee548.__CR0,0,800,600_PT0_SX800_V1___.jpg', '2023-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `SL_No` int(10) NOT NULL,
  `Subscriber` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`SL_No`, `Subscriber`, `created_at`) VALUES
(5, 'rubayetislam16@gmail.com', '2023-10-18 05:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Phone` varchar(255) NOT NULL,
  `NID` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `Phone`, `NID`) VALUES
(28, 'Sheikh Md. Rubayet Islam Ifti', 'rubayetislam16@gmail.com', NULL, '$2y$10$5agDNJ69Q.3yxcjAQc3O1utkiQ2FDMnAiWdb5BtcfR4M5gMFLFCwG', 'GWI0oaLthE5DCTPZmWTL0nvTUG0R2u9L9WpccXdVA6OBRA6UoWArtwr40u4C', NULL, '2023-10-22 09:37:20', '+8801642889275', 8712399610),
(44, 'Hasan', 'piyashasan08@gmail.com', NULL, '$2y$10$gDxRT/OCUCh8cXVh7vGb..JYW7jlxTvZVmMoVgqbQ4P36ADFkczlG', NULL, NULL, NULL, '+8801638752371', 8523125469);

-- --------------------------------------------------------

--
-- Table structure for table `user_otps`
--

CREATE TABLE `user_otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `expire_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_otps`
--

INSERT INTO `user_otps` (`id`, `user_id`, `otp`, `expire_at`, `created_at`, `updated_at`) VALUES
(1, 1, '4283775947', '2023-09-20 12:08:03', NULL, NULL),
(2, 8, '9625915813', '2023-09-20 12:29:00', NULL, NULL),
(3, 9, '87588', '2023-09-20 12:35:24', NULL, NULL),
(4, 8, '97928', '2023-09-20 12:42:17', NULL, NULL),
(5, 8, '64481', '2023-09-20 12:43:12', NULL, NULL),
(6, 8, '40737', '2023-09-20 12:43:30', NULL, NULL),
(7, 8, '64752', '2023-09-20 12:45:37', NULL, NULL),
(8, 8, '44743', '2023-09-20 12:47:15', '2023-09-20 12:44:15', '2023-09-20 12:44:15'),
(9, 9, '71472', '2023-09-20 12:48:14', '2023-09-20 12:45:14', '2023-09-20 12:45:14'),
(10, 8, '89157', '2023-09-21 02:35:39', '2023-09-21 02:32:39', '2023-09-21 02:32:39'),
(11, 8, '64313', '2023-09-21 08:13:36', '2023-09-21 08:10:36', '2023-09-21 08:10:36'),
(12, 10, '80401', '2023-09-21 08:22:12', '2023-09-21 08:19:12', '2023-09-21 08:19:12'),
(13, 10, '86785', '2023-09-21 08:25:40', '2023-09-21 08:22:40', '2023-09-21 08:22:40'),
(14, 10, '90113', '2023-09-21 08:31:48', '2023-09-21 08:28:48', '2023-09-21 08:28:48'),
(15, 10, '98149', '2023-09-21 08:32:19', '2023-09-21 08:31:59', '2023-09-21 08:32:19'),
(16, 12, '35248', '2023-09-21 09:03:35', '2023-09-21 09:00:35', '2023-09-21 09:00:35'),
(17, 13, '78517', '2023-09-21 09:02:26', '2023-09-21 09:02:07', '2023-09-21 09:02:26'),
(18, 14, '74575', '2023-09-21 09:11:03', '2023-09-21 09:09:57', '2023-09-21 09:11:03'),
(19, 15, '62803', '2023-09-21 09:27:30', '2023-09-21 09:24:30', '2023-09-21 09:24:30'),
(20, 16, '55158', '2023-09-21 09:28:30', '2023-09-21 09:25:30', '2023-09-21 09:25:30'),
(21, 18, '88752', '2023-09-21 09:29:28', '2023-09-21 09:27:01', '2023-09-21 09:29:28'),
(22, 19, '15064', '2023-09-21 23:51:57', '2023-09-21 23:50:52', '2023-09-21 23:51:57'),
(23, 20, '81983', '2023-09-22 02:33:30', '2023-09-22 02:30:30', '2023-09-22 02:30:30'),
(24, 22, '73830', '2023-09-22 02:37:51', '2023-09-22 02:34:51', '2023-09-22 02:34:51'),
(25, 23, '64876', '2023-09-22 02:39:30', '2023-09-22 02:36:30', '2023-09-22 02:36:30'),
(26, 24, '95540', '2023-09-22 11:02:14', '2023-09-22 11:01:57', '2023-09-22 11:02:14'),
(27, 25, '99577', '2023-09-24 03:19:45', '2023-09-24 03:19:22', '2023-09-24 03:19:45'),
(28, 18, '48197', '2023-09-24 03:44:19', '2023-09-24 03:41:19', '2023-09-24 03:41:19'),
(29, 28, '80688', '2023-09-24 03:46:54', '2023-09-24 03:43:54', '2023-09-24 03:43:54'),
(30, 29, '19941', '2023-09-24 11:31:20', '2023-09-24 11:28:20', '2023-09-24 11:28:20'),
(31, 30, '84740', '2023-09-24 11:35:04', '2023-09-24 11:34:17', '2023-09-24 11:35:04'),
(32, 31, '21226', '2023-09-24 11:42:19', '2023-09-24 11:39:19', '2023-09-24 11:39:19'),
(33, 32, '33067', '2023-09-24 11:47:01', NULL, NULL),
(34, 33, '91945', '2023-09-24 11:48:24', NULL, NULL),
(35, 34, '71909', '2023-09-24 11:52:49', NULL, NULL),
(36, 35, '11314', '2023-09-24 11:57:50', NULL, NULL),
(37, 37, '16637', '2023-09-24 12:24:35', '2023-09-24 12:23:45', '2023-09-24 12:24:35'),
(38, 38, '31055', '2023-09-24 12:33:08', '2023-09-24 12:32:46', '2023-09-24 12:33:08'),
(39, 39, '14177', '2023-09-27 01:13:27', '2023-09-27 01:11:42', '2023-09-27 01:13:27'),
(40, 40, '51009', '2023-09-27 01:22:45', '2023-09-27 01:19:45', '2023-09-27 01:19:45'),
(41, 41, '65999', '2023-09-27 01:31:53', '2023-09-27 01:28:53', '2023-09-27 01:28:53'),
(42, 42, '21291', '2023-10-09 08:25:49', '2023-10-09 08:22:49', '2023-10-09 08:22:49'),
(43, 43, '69426', '2023-10-09 08:26:38', '2023-10-09 08:23:38', '2023-10-09 08:23:38'),
(44, 44, '30632', '2023-10-09 08:29:19', '2023-10-09 08:27:48', '2023-10-09 08:29:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`SL_No`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`SL_No`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_otps`
--
ALTER TABLE `user_otps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `SL_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `SL_No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user_otps`
--
ALTER TABLE `user_otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
