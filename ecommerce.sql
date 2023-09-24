-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2023 at 08:57 PM
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
  `Quantity` int(11) DEFAULT NULL,
  `Price` int(11) NOT NULL,
  `order_status` varchar(10) DEFAULT NULL,
  `Payment` varchar(20) DEFAULT NULL,
  `Payment_Status` varchar(10) DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`order_id`, `customer_id`, `customer_name`, `location`, `product_id`, `products`, `Quantity`, `Price`, `order_status`, `Payment`, `Payment_Status`, `Date`) VALUES
(51, 1, 'Sheikh Md. Rubayet Islam Ifti', 'Mirpur, Dhaka', 3, 'Mouse', 1, 1000, 'Delivered', 'bkash', 'paid', '2023-08-24'),
(52, 1, 'Sheikh Md. Rubayet Islam Ifti', 'Mirpur, Dhaka', 4, 'Earphone', 1, 400, 'Delivered', 'bkash', 'paid', '2023-08-24'),
(54, 1, 'Sheikh Md. Rubayet Islam Ifti', 'Mirpur, Dhaka', 4, 'Earphone', 1, 400, 'Delivered', 'bkash', 'paid', '2023-08-27'),
(56, 1, 'Sheikh Md. Rubayet Islam Ifti', 'Mirpur, Dhaka', 6, 'RAM', 1, 450, 'Delivered', 'nagad', 'paid', '2023-09-07'),
(57, 1, 'Sheikh Md. Rubayet Islam Ifti', 'Gulshan, Dhaka', 1, 'Keyboard', 1, 800, 'Delivered', 'nagad', 'paid', '2023-09-07'),
(58, 1, 'Sheikh Md. Rubayet Islam Ifti', 'Mirpur, Dhaka', 4, 'Earphone', 2, 800, 'Shipping', 'bkash', 'paid', '2023-09-10'),
(59, 1, 'Sheikh Md. Rubayet Islam Ifti', 'Mirpur, Dhaka', 1, 'Keyboard', 1, 7, 'Shipping', 'bkash', 'paid', '2023-09-18'),
(62, 1, 'Sheikh Md. Rubayet Islam Ifti', 'Sirajagnj', 4, 'Earphone', 3, 9, 'Shipping', 'bkash', 'paid', '2023-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `pro_name` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `pro_des` varchar(100) DEFAULT NULL,
  `Quantity_Sold` int(11) DEFAULT NULL,
  `price` int(3) DEFAULT NULL,
  `pro_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `category`, `pro_des`, `Quantity_Sold`, `price`, `pro_pic`) VALUES
(1, 'Keyboard', 'Electronic', 'Apple Keyboard', 2, 7, 'product/clay-banks-PXaQXThG1FY-unsplash.jpg'),
(3, 'Mouse', 'Electronic', 'Gaming Mouse', 2, 9, 'product/mice.jpeg'),
(4, 'Earphone', 'Electronic', 'Earphone', 2, 3, 'product/361157965_239171365721829_6516257995815106485_n.png'),
(5, 'PS5', 'Electronic', 'PlayStation', 3, 1367, 'product/ps5.jpeg'),
(6, 'RAM', 'Electronic', '8GB RAM', 1, 4, 'product/ram.jpeg'),
(7, 'Watch', 'Electronic', 'Olevs 5666 Men Watch Luxury Leather Luminous Hand Watch Full Black', NULL, 3, 'product/Watch.jpg');

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
  `Phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `Phone`) VALUES
(1, 'Sheikh Md. Rubayet Islam Ifti', 'rubayetislam16@gmail.com', NULL, '$2y$10$xpdTUOR1O8YZn16EdVieXekUf9bMY0JtYtnx/qnHrhoZsUY/eAyiW', 'GU58R8fwMkmBQHKMVg9IWGwFfySMJh5MoaJOXUzXYOtRG3sKEb7jhb4a8dlP', NULL, '2023-09-20 08:08:46', NULL),
(2, 'Shanu', 'shanu@gmail.com', NULL, '1234567', NULL, NULL, NULL, NULL),
(8, 'Md. Rubayet Islam', 'imdrafiqul716@gmail.com', NULL, '$2y$10$a12XVBihAzfXucQJIN4L1egwfR7AtC0WCPy5Q5yVSPxkz0g6.ppee', NULL, NULL, NULL, '+8801744196827'),
(9, 'Pias Miah', 'piyashasan08@gmail.com', NULL, '$2y$10$FZcmNc04OQIts4JKQ0PpyeK2IXp.aP.jtgC8PNh4XVUVK./32X2QO', NULL, NULL, NULL, '+8801906147033');

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
(9, 9, '71472', '2023-09-20 12:48:14', '2023-09-20 12:45:14', '2023-09-20 12:45:14');

--
-- Indexes for dumped tables
--

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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_otps`
--
ALTER TABLE `user_otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
