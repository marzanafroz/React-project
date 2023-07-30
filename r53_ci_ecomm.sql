-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2023 at 06:23 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `r53_ci_ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'ppnc1686740636', '2023-06-10 09:59:12'),
(2, 'Automobiles', '2023-06-10 09:59:12'),
(3, 'Men', '2023-06-12 10:01:43'),
(4, 'Kids', '2023-06-12 10:03:08'),
(5, 'Arts', '2023-06-12 10:03:30'),
(6, 'Books', '2023-06-12 10:03:35'),
(7, 'cat1686564377', '2023-06-12 10:06:36'),
(8, 'cat1686565931', '2023-06-12 10:32:11'),
(9, 'cat1686565941', '2023-06-12 10:32:21'),
(10, 'nc1686566333', '2023-06-12 10:38:53'),
(11, 'nc1686566335', '2023-06-12 10:38:55'),
(12, 'nc1686566433', '2023-06-12 10:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(4, '2023-06-05-095826', 'App\\Database\\Migrations\\Users', 'default', 'App', 1686223809, 1),
(5, '2023-06-05-101503', 'App\\Database\\Migrations\\Categories', 'default', 'App', 1686223809, 1),
(6, '2023-06-05-101804', 'App\\Database\\Migrations\\Subcategories', 'default', 'App', 1686223809, 1),
(7, '2023-06-10-094226', 'App\\Database\\Migrations\\Products', 'default', 'App', 1686390813, 2),
(8, '2023-06-10-095351', 'App\\Database\\Migrations\\Images', 'default', 'App', 1686390948, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_id` int(5) UNSIGNED NOT NULL,
  `subcategory_id` int(5) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `sku` varchar(128) NOT NULL,
  `price` float(10,2) NOT NULL,
  `price2` float(10,2) NOT NULL,
  `quantity` int(5) NOT NULL,
  `discount` int(3) NOT NULL DEFAULT 0,
  `hot` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `name`, `description`, `sku`, `price`, `price2`, `quantity`, `discount`, `hot`, `created_at`) VALUES
(2, 1, 1, 'test product6115', 'test product description 6115', '611516863911814500', 16115.00, 26115.00, 6115, 17, 0, '2023-06-10 09:59:41'),
(3, 1, 1, 'test product7418', 'test product description 7418', '741816863911812492', 17418.00, 27418.00, 7418, 14, 0, '2023-06-10 09:59:41'),
(4, 1, 1, 'test product6731', 'test product description 6731', '673116863911812861', 16731.00, 26731.00, 6731, 1, 0, '2023-06-10 09:59:41'),
(5, 1, 1, 'test product8303', 'test product description 8303', '83031686391181248', 18303.00, 28303.00, 8303, 18, 0, '2023-06-10 09:59:41'),
(6, 1, 1, 'test product253', 'test product description 253', '25316863911813647', 1253.00, 2253.00, 253, 6, 0, '2023-06-10 09:59:41'),
(7, 1, 1, 'test product3735', 'test product description 3735', '373516863911813924', 13735.00, 23735.00, 3735, 19, 0, '2023-06-10 09:59:41'),
(8, 1, 1, 'test product6766', 'test product description 6766', '676616863911814228', 16766.00, 26766.00, 6766, 4, 0, '2023-06-10 09:59:41'),
(9, 1, 1, 'test product3669', 'test product description 3669', '366916863911815592', 13669.00, 23669.00, 3669, 18, 0, '2023-06-10 09:59:41'),
(10, 1, 1, 'test product8149', 'test product description 8149', '814916863911814793', 18149.00, 28149.00, 8149, 5, 0, '2023-06-10 09:59:41'),
(11, 1, 1, 'test product7753', 'test product description 7753', '775316863911812429', 17753.00, 27753.00, 7753, 3, 0, '2023-06-10 09:59:41'),
(12, 1, 1, 'test product7408', 'test product description 7408', '74081686391181339', 17408.00, 27408.00, 7408, 20, 0, '2023-06-10 09:59:41'),
(13, 1, 1, 'test product9452', 'test product description 9452', '945216863911814271', 19452.00, 29452.00, 9452, 18, 0, '2023-06-10 09:59:41'),
(14, 1, 1, 'test product4220', 'test product description 4220', '422016863911815277', 14220.00, 24220.00, 4220, 7, 0, '2023-06-10 09:59:41'),
(15, 1, 1, 'test product1636', 'test product description 1636', '163616863911821176', 11636.00, 21636.00, 1636, 15, 0, '2023-06-10 09:59:42'),
(16, 1, 1, 'test product7097', 'test product description 7097', '70971686391182524', 17097.00, 27097.00, 7097, 9, 0, '2023-06-10 09:59:42'),
(17, 1, 1, 'test product1477', 'test product description 1477', '147716863911825424', 11477.00, 21477.00, 1477, 2, 0, '2023-06-10 09:59:42'),
(18, 1, 1, 'test product101', 'test product description 101', '10116863911821834', 1101.00, 2101.00, 101, 18, 0, '2023-06-10 09:59:42'),
(19, 1, 1, 'test product4433', 'test product description 4433', '443316863911823040', 14433.00, 24433.00, 4433, 9, 0, '2023-06-10 09:59:42'),
(20, 1, 1, 'test product158', 'test product description 158', '15816863911821734', 1158.00, 2158.00, 158, 9, 0, '2023-06-10 09:59:42'),
(21, 1, 1, 'test product680', 'test product description 680', '6801686391182900', 1680.00, 2680.00, 680, 7, 0, '2023-06-10 09:59:42'),
(22, 1, 1, 'test product8404', 'test product description 8404', '84041686391182175', 18404.00, 28404.00, 8404, 5, 0, '2023-06-10 09:59:42'),
(23, 1, 1, 'test product6283', 'test product description 6283', '628316863911824144', 16283.00, 26283.00, 6283, 6, 0, '2023-06-10 09:59:42'),
(24, 1, 1, 'test product7261', 'test product description 7261', '72611686391182732', 17261.00, 27261.00, 7261, 19, 0, '2023-06-10 09:59:42'),
(25, 1, 1, 'test product1214', 'test product description 1214', '121416863911821295', 11214.00, 21214.00, 1214, 1, 0, '2023-06-10 09:59:42'),
(26, 1, 1, 'test product7344', 'test product description 7344', '734416863911822781', 17344.00, 27344.00, 7344, 14, 0, '2023-06-10 09:59:42'),
(27, 1, 1, 'test product2085', 'test product description 2085', '208516863911823283', 12085.00, 22085.00, 2085, 19, 0, '2023-06-10 09:59:42'),
(28, 1, 1, 'test product2784', 'test product description 2784', '278416863911823180', 12784.00, 22784.00, 2784, 15, 0, '2023-06-10 09:59:42'),
(29, 1, 1, 'test product8289', 'test product description 8289', '82891686391182669', 18289.00, 28289.00, 8289, 4, 0, '2023-06-10 09:59:42'),
(30, 1, 1, 'test product326', 'test product description 326', '32616863911825406', 1326.00, 2326.00, 326, 1, 0, '2023-06-10 09:59:42'),
(31, 1, 1, 'test product1295', 'test product description 1295', '129516863911824323', 11295.00, 21295.00, 1295, 1, 0, '2023-06-10 09:59:42'),
(32, 1, 1, 'test product5959', 'test product description 5959', '595916863911824960', 15959.00, 25959.00, 5959, 4, 0, '2023-06-10 09:59:42'),
(33, 1, 1, 'test product2898', 'test product description 2898', '28981686391182573', 12898.00, 22898.00, 2898, 7, 0, '2023-06-10 09:59:42'),
(34, 1, 1, 'test product1561', 'test product description 1561', '156116863911821435', 11561.00, 21561.00, 1561, 7, 0, '2023-06-10 09:59:42'),
(35, 1, 1, 'test product8957', 'test product description 8957', '895716863911825222', 18957.00, 28957.00, 8957, 14, 0, '2023-06-10 09:59:42'),
(36, 1, 1, 'test product2698', 'test product description 2698', '26981686391182993', 12698.00, 22698.00, 2698, 17, 0, '2023-06-10 09:59:42'),
(37, 1, 1, 'test product1073', 'test product description 1073', '107316863911821800', 11073.00, 21073.00, 1073, 12, 0, '2023-06-10 09:59:42'),
(38, 1, 1, 'test product5436', 'test product description 5436', '543616863911824124', 15436.00, 25436.00, 5436, 3, 0, '2023-06-10 09:59:42'),
(39, 1, 1, 'test product5504', 'test product description 5504', '550416863911825323', 15504.00, 25504.00, 5504, 5, 0, '2023-06-10 09:59:42'),
(40, 1, 1, 'test product4830', 'test product description 4830', '483016863911823848', 14830.00, 24830.00, 4830, 15, 0, '2023-06-10 09:59:42'),
(41, 1, 1, 'test product5940', 'test product description 5940', '594016863911823519', 15940.00, 25940.00, 5940, 16, 0, '2023-06-10 09:59:42'),
(42, 1, 1, 'test product8978', 'test product description 8978', '897816863911832576', 18978.00, 28978.00, 8978, 12, 0, '2023-06-10 09:59:43'),
(43, 1, 1, 'test product4235', 'test product description 4235', '423516863911832184', 14235.00, 24235.00, 4235, 13, 0, '2023-06-10 09:59:43'),
(44, 1, 1, 'test product5581', 'test product description 5581', '558116863911835327', 15581.00, 25581.00, 5581, 7, 0, '2023-06-10 09:59:43'),
(45, 1, 1, 'test product5170', 'test product description 5170', '51701686391183290', 15170.00, 25170.00, 5170, 20, 0, '2023-06-10 09:59:43'),
(46, 1, 1, 'test product5917', 'test product description 5917', '59171686391183430', 15917.00, 25917.00, 5917, 2, 0, '2023-06-10 09:59:43'),
(47, 1, 1, 'test product2592', 'test product description 2592', '259216863911835123', 12592.00, 22592.00, 2592, 4, 0, '2023-06-10 09:59:43'),
(48, 1, 1, 'test product6301', 'test product description 6301', '630116863911833050', 16301.00, 26301.00, 6301, 15, 0, '2023-06-10 09:59:43'),
(49, 1, 1, 'test product2237', 'test product description 2237', '223716863911834008', 12237.00, 22237.00, 2237, 3, 0, '2023-06-10 09:59:43'),
(50, 1, 1, 'test product2047', 'test product description 2047', '204716863911833303', 12047.00, 22047.00, 2047, 13, 0, '2023-06-10 09:59:43'),
(51, 1, 1, 'test product8885', 'test product description 8885', '888516863911831162', 18885.00, 28885.00, 8885, 20, 0, '2023-06-10 09:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(5) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `category_id`, `created_at`) VALUES
(1, 'Mobile', 1, '2023-06-10 09:59:38'),
(2, 'Bike', 2, '2023-06-10 09:59:38'),
(3, 'tessst', 2, '2023-06-14 10:28:06'),
(4, 'testtt', 2, '2023-06-14 10:28:08'),
(5, 'testtt', 2, '2023-06-14 10:28:10'),
(6, 'testtt', 2, '2023-06-14 10:28:11'),
(7, 'testtt', 2, '2023-06-14 10:28:12'),
(8, 'asdf', 1, '2023-06-14 10:31:21'),
(10, 'yyyy', 2, '2023-06-14 10:33:37'),
(13, 'rwet', 3, '2023-06-14 10:37:59'),
(15, 'sdfgdfgdfg', 2, '2023-06-14 10:41:06'),
(16, 'sadfsdfg', 3, '2023-06-14 10:41:14'),
(17, 'sadfsdaf', 1, '2023-06-14 10:43:27'),
(18, '123', 3, '2023-06-14 11:27:23'),
(19, '333', 3, '2023-06-14 11:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `token` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `token`, `created_at`) VALUES
(1, '', 'jd1686224168@example.com', '$2y$10$yyxO2S55jQsfNSGKk06fS.j2.8l2H0GjhWgFhADoYJYDekkFHfg5m', 1, NULL, '2023-06-08 11:36:08'),
(2, '', 'admin@gmail.com', '$2y$10$DttMw2MJ9E5gYdoqLUnWA.lMoCODTefLefGjSeSdYi7r/N8lkpZZ2', 2, NULL, '2023-06-08 11:36:12'),
(3, '', 'jd1686391367@example.com', '$2y$10$a9i4kjr876vBfYsHR2CIU.2LRmwWs3se30cueisZohv2N3jF..1LK', 1, 'arandomtoken7811686566877', '2023-06-10 10:02:47'),
(4, '', 'jd1686391415@example.com', '$2y$10$bi7ut87Y67DnLCiuRTyS4O/thIqMfUM9xfiCiSoCc0C.T.CxXYP/e', 2, NULL, '2023-06-10 10:03:36'),
(5, '', 'jd1686391570@example.com', '$2y$10$LUFQ7mVCpzS5yalZ/Q909OtQOS0t.kJRI5UghAZrdkkAh2TsJWTA2', 2, NULL, '2023-06-10 10:06:10'),
(6, '', 'jd1686391628@example.com', '$2y$10$OFOU2hMlJlEC25z0lkcCQe92JiPMNtP6TOUYxH1ya1YZReuFRLZhW', 2, NULL, '2023-06-10 10:07:08'),
(7, '', 'jd1686391668@example.com', '$2y$10$9r.PPJinKTQsoddbEXwOf.94GAQoyNFB6typmjcS1FvWv1Qh9G.bG', 2, NULL, '2023-06-10 10:07:48'),
(8, '', 'jd1686395097@example.com', '$2y$10$A7ZydAkO0A1NG2fao7OFB.Ny8jjRrBWhtRsLzGMg8GJUjCwt6SAk2', 2, NULL, '2023-06-10 11:04:57'),
(9, '', 'jd1686395114@example.com', '$2y$10$inlQDKy9C5zwyNB85omD8Oy8eKotZ9JB5DJMXkRVRTCOe1yiVrcxi', 2, NULL, '2023-06-10 11:05:14'),
(10, '', 'jd1686400758@example.com', '$2y$10$yVfCqEwZAJMJZwYrjWMf4.XTOAZClp2qIwD/0FCI0irOjhfidibIi', 2, NULL, '2023-06-10 12:39:18'),
(11, '', 'jd1686401179@example.com', '$2y$10$i8kZ1Iwkf1dkhdtrtpKuu.sjE2HK.G212kMeHEBFypMdJ6n3/lVd.', 2, NULL, '2023-06-10 12:46:19'),
(12, '', 'jd1686482050@example.com', '$2y$10$Vh.ifS0fkGMQWwz28lZ8Fu3FyG/AIZpG6fv2GGrrQpsXMv.gX9dBK', 2, NULL, '2023-06-11 11:14:10'),
(13, '', 'idb@gmail.com', '$2y$10$E0N4kK4c8dqsnwF.ugfICOTCtpAgwolrG6GH9hKKxxDPCCpHFCYve', 2, NULL, '2023-06-11 12:37:34'),
(14, '', 'test@gmail.com', '$2y$10$sq9/y.89bGz6q/Cr1tFoxOYAZ1ubjLyB2bmr4Q4YcRlwOHsIM26dW', 2, NULL, '2023-06-11 12:46:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_product_id_foreign` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
