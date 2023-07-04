-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2023 at 02:22 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `backend`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ice cream ', '1', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(2, 1, 'Stationery ', '1', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(3, 1, 'Grocery', '1', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(4, 1, 'Fish', '1', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(5, 1, 'Grocery', '1', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(6, 1, 'Fruits', '1', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(7, 1, 'Vegetable', '1', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(8, 1, 'Fresh Fruits Collection', '0', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(9, 1, 'Vegetable Collection', '0', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(10, 1, 'Grocery Collection', '0', NULL, 1, '2022-07-09 11:03:39', '2022-07-11 23:37:45'),
(13, 1, 'Bick', '0', '1681344294-andrew-pons-cLHPacdtpSY-unsplash.jpg', 1, '2023-04-12 18:04:54', '2023-04-12 18:04:54'),
(14, 1, 'Car', '1', '1681345717-WhatsApp Image 2023-04-05 at 1.26.00 PM.jpeg', 1, '2023-04-12 18:28:37', '2023-04-12 18:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `logo` varchar(300) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `copy_right` varchar(250) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `github` varchar(100) DEFAULT NULL,
  `web` varchar(100) DEFAULT NULL,
  `creator` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `user_id`, `logo`, `description`, `copy_right`, `phone`, `email`, `address`, `fb`, `linkedin`, `twitter`, `instagram`, `github`, `web`, `creator`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fuga, aliquam, nisi velit dicta voluptatibus obcaecati', '2022 Copyright All Reserved by vir-za.com', '01795815660', 'virza.bd@gmail.com', 'Saver, Dhaka - 1340, Bangladesh.', 'https://www.facebook.com/virza805', 'https://www.linkedin.com/in/1mdalamin1/', 'https://twitter.com/1mdalamin1', 'https://www.google.com.bd/maps/@23.851216,90.2821951,16z?hl=en&authuser=0', 'https://github.com/virza805', 'https://vir-za.com/', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `footer_tops`
--

CREATE TABLE `footer_tops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `icon_img` varchar(300) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `creator` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `footer_tops`
--

INSERT INTO `footer_tops` (`id`, `user_id`, `icon_img`, `title`, `description`, `creator`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Saturday - Wednesday', '9AM – 5PM', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(2, 1, NULL, 'Thursday', '9AM – 12PM', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(3, 1, NULL, 'Friday', 'Closed', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(4, 1, NULL, 'Support', 'Contact us 24 hours', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(5, 1, NULL, 'Products', 'Contact us 24 hours', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(6, 1, NULL, 'Secure Payment', 'Contact us 24 hours', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(7, 1, NULL, 'Prices & Offers', 'Contact us 24 hours', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_06_10_015747_create_contacts_table', 1),
(11, '2022_06_10_020313_create_jobs_table', 1),
(12, '2022_06_13_093927_create_task_lists_table', 1),
(13, '2022_06_22_071803_create_footers_table', 1),
(14, '2022_06_25_023614_create_footer_tops_table', 1),
(15, '2022_06_25_134255_create_categories_table', 1),
(16, '2022_06_25_134436_create_sub_categories_table', 1),
(17, '2022_06_25_142308_create_sliders_table', 1),
(18, '2022_06_28_072134_create_products_table', 1),
(19, '2023_04_12_171059_create_tags_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('2ad5a6795964d4bc66e017f9f81743e6bbc96af7e34bef4c81046126b5431704510fa3198a81d447', 1, '96c20212-4694-4d90-bbba-14a534d6c15e', 'accessToken', '[]', 0, '2022-07-11 22:27:54', '2022-07-11 22:27:54', '2023-07-12 04:27:54'),
('65146d7e8fe34d7ac2c6c4d1ece52b71bd878ace4bb577c7e7abd5f12a99df5fb39f417846f3e825', 1, '96c20212-4694-4d90-bbba-14a534d6c15e', 'accessToken', '[]', 0, '2023-03-26 00:45:14', '2023-03-26 00:45:14', '2024-03-26 06:45:14'),
('91c017e2b65b61feba5a3d0212b0241c6b2b1df1b59490f13e08fbee19efa0e6d86533218f86ad97', 1, '96c20212-4694-4d90-bbba-14a534d6c15e', 'accessToken', '[]', 0, '2022-07-11 22:48:13', '2022-07-11 22:48:13', '2023-07-12 04:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` char(36) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
('96c20212-4694-4d90-bbba-14a534d6c15e', NULL, 'Y', 'JsxAm5u412usKfq7pVQshwLMY4Nn4rSkPDPPvZ4V', NULL, 'http://localhost', 1, 0, 0, '2022-07-11 22:27:07', '2022-07-11 22:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, '96c20212-4694-4d90-bbba-14a534d6c15e', '2022-07-11 22:27:07', '2022-07-11 22:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` varchar(110) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `sell_price` double(8,2) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `category_id`, `name`, `description`, `tag`, `image`, `price`, `sell_price`, `stock`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '10', 'Grocery', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fuga Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fuga ?', '7', NULL, 760.00, 720.00, 2, 1, '2022-07-11 23:06:58', '2022-07-11 23:06:58'),
(2, 1, '9', 'Tomato', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fuga Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fuga ?', '8', '1681347001-Wine-glass.png', 120.00, 70.00, 3, 1, '2022-07-11 23:07:49', '2022-07-11 23:07:49'),
(3, 1, '8', 'Mango', 'Sit amet consectetur adipisicing elit. Itaque fuga Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fuga ?', '5,6', NULL, 90.00, 80.00, 11, 1, '2022-07-11 23:08:50', '2022-07-11 23:08:50'),
(4, 1, '7', 'Capsicums', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fuga Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fuga ?', '7,8', '1681347001-Wine-glass.png', 160.00, 120.00, 3, 1, '2022-07-11 23:09:50', '2022-07-11 23:09:50'),
(5, 1, '6', 'Jackfruits', 'Snsectetur adipisicing elit. Itaque fuga Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fuga ?', '2,4', NULL, 520.00, 450.00, 4, 1, '2022-07-11 23:11:10', '2022-07-11 23:11:10'),
(6, 1, '5', 'Chicken', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fuga, aliquam, nisi velit dicta voluptatibus obcaecati', '1,6,5', '1681347001-Wine-glass.png', 130.00, 120.00, 14, 1, '2022-07-11 23:13:25', '2022-07-11 23:13:25'),
(7, 1, '4', 'Hilsa fish', 'ইলিশ (বৈজ্ঞানিক নাম:Tenualosa ilisha) বাংলাদেশের জাতীয় মাছ। এটি একটি সামুদ্রিক মাছ, যা ডিম পাড়ার জন্য বাংলাদেশ ও পূর্ব ভারতের নদীতে আগমন করে। বাঙালিদের কাছে ইলিশ খুব জনপ্রিয়। এ ছাড়াও ইলিশ ভারতের বিভিন্ন এলাকা যেমন পশ্চিমবঙ্গ, উড়িষ্যা, ত্রিপুরা ও আসামে অত্যন্ত জনপ্রিয় একটি মাছ। ২০১৭ সালে বাংলাদেশের ইলিশ মাছ ভৌগোলিক নির্দেশক বা জিআই পণ্য হিসেবে স্বীকৃতি পায়। [১]', '5', '1681346828-pexels-pixabay-56866.jpg', 1200.00, 1090.00, 1, 1, '2022-07-11 23:15:56', '2022-07-11 23:15:56'),
(8, 1, '3', 'টার্কি', 'টার্কি (ইংরেজি: Turkey) মেলিয়াগ্রিডিডেই পরিবারের এক ধরনের বৃহদাকৃতির পাখিবিশেষ। এগুলো দেখতে মুরগির বাচ্চার মতো হলেও তুলনামূলকভাবে অনেক বড়। এক প্রজাতির বুনো টার্কি মেলিয়াগ্রিস গ্যালোপাভো উত্তর আমেরিকা ও মধ্য আমেরিকার বনাঞ্চলে বসবাস করে। গৃহপালিত টার্কি এই প্রজাতি থেকে ভিন্নতর। অন্য জীবিত প্রজাতির মধ্যে মেলিয়াগ্রিস ওসেলাটা বা চক্ষু আকৃতির চিহ্নবিশিষ্ট টার্কি আবাসস্থল হচ্ছে ইউকাতান উপ-দ্বীপের বনাঞ্চলে।[১] বিশ্বের সর্বত্র টার্কি গৃহপালিত পাখিরূপে লালন-পালন করা হয়।', '3,4', '1681346828-pexels-pixabay-56866.jpg', 2800.00, 2607.00, 19, 1, '2022-07-11 23:17:36', '2022-07-11 23:17:36'),
(9, 1, '2', 'চাল', 'চাল বা চাউল হলো ধানের শস্যল অংশ। ধান থেকে চাল উৎপাদন করা হয়। জলে চাল ফুটিয়ে ভাত রান্না করা হয় যা ভারত , বাংলাদেশ ও পাকিস্তান সহ বিশ্বের অনেক দেশের প্রধান খাদ্যশস্য।', '1,3', '1681347001-Wine-glass.png', 70.00, 60.00, 8, 1, '2022-07-11 23:19:05', '2022-07-11 23:19:05'),
(10, 1, '1', 'আইসক্রিম', 'আইসক্রিম একটি দুগ্ধজাত খাদ্য। উপযুক্ত উপাদানের পাস্তুরিত মিশ্রণকে জমাট বাঁধিয়ে আইসক্রিম উৎপন্ন করা হয়। আইসক্রিমের মধ্যে দুগ্ধ চর্বি, দুগ্ধজাত উপাদান ছাড়াও চিনি, ভুট্টার সিরাপ, পানি, সুস্বাদু ও সুগন্ধিকারক বস্তু যেমন চকোলেট, ভ্যানিলা, বাদাম, ফলের রস ইত্যাদি যোগ করা হয়।', '1,2,4', NULL, 230.00, 220.00, 7, 1, '2022-07-11 23:20:35', '2022-07-11 23:20:35'),
(11, 1, '10', 'Turkey', 'দেখতে মুরগির বাচ্চার মতো হলেও তুলনামূলকভাবে অনেক বড়। এক প্রজাতির বুনো টার্কি মেলিয়াগ্রিস গ্যালোপাভো উত্তর আমেরিকা ও মধ্য আমেরিকার বনাঞ্চলে বসবাস করে। গৃহপালিত টার্কি এই প্রজাতি থেকে ভিন্নতর। অন্য জীবিত প্রজাতির মধ্যে মেলিয়াগ্রিস ওসেলাটা বা চক্ষু আকৃতির চিহ্নবিশিষ্ট টার্কি আবাসস্থল হচ্ছে ইউকাতান উপ-দ্বীপের বনাঞ্চলে।[১] বিশ্বের সর্বত্র টার্কি গৃহপালিত পাখিরূপে লালন-পালন করা হয়।', '2,3', '1681347001-Wine-glass.png', 1500.00, 1420.00, 7, 1, '2022-07-11 23:24:27', '2022-07-11 23:24:27'),
(12, 1, '9', 'পুঁই শাক', 'শাক সবজি সাধারনভাবে মানুষের খাদ্যপোযোগী উদ্ভিদ ও তার অঙ্গসমূহকে শাকসব্জি বা শুধুই শাক অথবা সব্জি বলা হয়ে থাকে। কেবল শাক সবজি খাওয়া ব্যক্তিদের শাকাহারি বা নিরামিষভোজী বলা হয়। সাধারণত গাছের পাতা যা ভাজি করে খাওয়া হয়, তাকে শাক বলা হয়। যেমন লাল শাক, পুঁই শাক, কলমি শাক প্রভৃতি।', '1,3,4', NULL, 40.00, 32.00, 5, 1, '2022-07-11 23:26:02', '2022-07-11 23:26:02'),
(13, 1, '8', 'চালতা', 'চালতা বা চালিতা বা চাইলতে (বৈজ্ঞানিক নাম: Dillenia indica ইংরেজি নামঃ Elephant Apple[১]) এক রকমের ভারতবর্ষীয় উদ্ভিদ। চালতার ফল খুব আদরণীয় নয়। এই ফল দিয়ে চাটনি ও আচার তৈরি হয়।[২] গাছটি দেখতে সুন্দর বলে শোভাবর্ধক তরু হিসাবেও কখনো কখনো উদ্যানে লাগানো হয়ে থাকে।', '1,2', '1681347001-Wine-glass.png', 87.00, 76.00, 6, 1, '2022-07-11 23:27:39', '2022-07-11 23:27:39'),
(14, 1, '2,4', 'aa', 'axsxs', '1', '1681346740-1_1677818100.png', 111.00, 101.00, 9, 1, '2023-04-12 18:45:40', '2023-04-12 18:45:40'),
(15, 1, '4,3', 'Flower', 'xssx', '2', '1681346828-pexels-pixabay-56866.jpg', 231.00, 101.00, 8, 1, '2023-04-12 18:47:08', '2023-04-12 18:47:08'),
(16, 1, '2,6', 'Onamica', 'hiuoi kjj knk', '7', '1681347001-Wine-glass.png', 99999.00, 0.95, 17, 1, '2023-04-12 18:50:01', '2023-04-12 18:50:01'),
(17, 1, '4', '<<nhgf', 'zzzzz', '7', '1681347418-sync.png', 123.00, 101.00, 16, 1, '2023-04-12 18:56:58', '2023-04-12 18:56:58'),
(18, 1, '13,9,5,2,6,14', 'Onamica', 'ffs jkf ld', '1,3,5', '1681350237-1_1677818251.png', 494.00, 452.00, 15, 1, '2023-04-12 19:43:57', '2023-04-12 19:43:57'),
(19, 1, '14,13,6,4,1', 'kjjh ;l', 'kkgds nngfd kjghf', '3,4,6', '1681350402-3_1677818166.png', 788.00, 678.00, 12, 1, '2023-04-12 19:46:42', '2023-04-12 19:46:42'),
(20, 1, '14,8,9,3', 'llff dsa', 'ngufy jf', '3,5,2', '1681350592-sync.png', 456.00, 432.00, 14, 1, '2023-04-12 19:49:52', '2023-04-12 19:49:52'),
(21, 1, '14,8,6,3', 'kkk', 'lll bvfn', '5,3,2', '1681351226-3_1677818166.png', 665.00, 234.00, 13, 1, '2023-04-12 20:00:26', '2023-04-12 20:00:26'),
(22, 1, '13,9,8', 'aaa', 'xjnjhs', '1,5,2', '1681352084-sync.png', 222.00, 212.00, 11, 1, '2023-04-12 20:14:44', '2023-04-12 20:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub` varchar(255) DEFAULT NULL,
  `des` varchar(255) DEFAULT NULL,
  `btn` varchar(255) DEFAULT NULL,
  `btn_link` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `use` tinyint(4) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `user_id`, `title`, `sub`, `des`, `btn`, `btn_link`, `image`, `use`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'খাদ্যপোযোগী উদ্ভিদের অঙ্গসমূহই শাকসব্জি', 'Save up 50% off', 'সাধারণত গাছের পাতা যা ভাজি করে খাওয়া হয়, তাকে শাক বলা হয়। যেমন লাল শাক, পুঁই শাক, কলমি শাক প্রভৃতি।', 'Buy Now', 'vir-za.com', NULL, 0, 1, '2022-07-09 11:03:39', '2022-07-11 23:36:11'),
(2, 1, 'Bengal Fresh Fruits farm Organic 100%', 'Save up 30% off', 'Wpsum dolor sit amet consectetur adipisicing elit. Itaque fuga ?', 'Order Now', '#', NULL, 0, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(3, 1, 'Grocery item farm Organic 100%', 'Save up 70% off', 'মাংস বা গোশত হল পশুর শরীরের অংশ যা খাদ্য হিসেবে ব্যবহার করা হয়। মাংস বলতে প্রায়ই ঐচ্ছিক পেশী, সহযোগী চর্বি ।', 'Shop Now', '#', NULL, 0, 1, '2022-07-09 11:03:39', '2022-07-11 23:31:30'),
(4, 1, 'Vegetable Collection', 'Buy 1 Get 2', 'কিন্তু একে আবার অন্যান্যভাবে ভক্ষণীয় কলা, যেমন দেহযন্ত্র, কলিজা, বৃক্ক ইত্যাদি হিসেবেও বর্ণনা করা যায়।', 'Call Now', 'tel:01795815660', NULL, 1, 1, '2022-07-09 11:03:39', '2022-07-11 23:31:47'),
(5, 1, 'Fresh Fruits Collection', 'Buy 1 Get 1', '9AM – 5PM', 'Order Now', '#', NULL, 1, 1, '2022-07-09 11:03:40', '2022-07-09 11:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `user_id`, `name`, `slug`, `img`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ভুট্টার সিরাপ', 'hhhh', NULL, 1, '2023-04-13 02:17:38', '2023-04-13 02:17:38'),
(2, 1, 'সুস্বাদু ও সুগন্ধিকারক', 'jkjhgh', NULL, 1, '2023-04-12 02:17:38', '2023-04-13 02:17:38'),
(3, 1, 'পানি', 'hhhh', NULL, 1, '2023-04-13 02:17:38', '2023-04-13 02:17:38'),
(4, 1, 'সুস্বাদু', 'jkjhgh', NULL, 1, '2023-04-12 02:17:38', '2023-04-13 02:17:38'),
(5, 1, 'লাল শাক', 'jkj', NULL, 1, '2023-04-12 02:17:38', '2023-04-13 02:17:38'),
(6, 1, 'পুঁই শাক', 'jkj', NULL, 1, '2023-04-12 02:17:38', '2023-04-13 02:17:38'),
(7, 1, 'কলমি শাক', 'jk', NULL, 1, '2023-04-12 02:17:38', '2023-04-13 02:17:38'),
(8, 1, 'কলমি', 'jk', NULL, 1, '2023-04-12 02:17:38', '2023-04-13 02:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `task_lists`
--

CREATE TABLE `task_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `dec` varchar(700) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `c_date` varchar(100) DEFAULT NULL,
  `success_task` tinyint(4) NOT NULL DEFAULT 0,
  `creator` varchar(250) DEFAULT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` bigint(20) UNSIGNED NOT NULL DEFAULT 2 COMMENT '1=superAdmin,2=admin,3=manager,4=others',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tanvir', 1, 'virza.bd@gmail.com', '2022-07-11 22:48:32', '$2y$10$6VfrqHEx6o4G90UzC9QYW.Tk9AJtdLaADmh4g4/XTHab9bXRuJ74.', NULL, NULL, '2022-07-11 22:48:32'),
(2, 'Tanzil', 2, 'admin@gmail.com', NULL, '$2y$10$D.Y4xYdfaIZRfMNIflo/bOBeDYPUZYP33WxZTHcSswOON8UzSD/sK', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_tops`
--
ALTER TABLE `footer_tops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_lists`
--
ALTER TABLE `task_lists`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer_tops`
--
ALTER TABLE `footer_tops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `task_lists`
--
ALTER TABLE `task_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
