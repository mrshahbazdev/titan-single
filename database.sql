-- MySQL Dump of Crownbridge Laravel SQLite Database
-- Generated on 2026-05-19 10:25:31
SET FOREIGN_KEY_CHECKS=0;

-- ------------------------------------------------------
-- Table structure for table `addroles`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `addroles`;
CREATE TABLE `addroles` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `roleName` VARCHAR(255) NOT NULL,
  `frontPage` INT NOT NULL DEFAULT '0',
  `systemManagement` INT NOT NULL DEFAULT '0',
  `shoppingMallManagement` INT NOT NULL DEFAULT '0',
  `memberManagement` INT NOT NULL DEFAULT '0',
  `transactionManagement` INT NOT NULL DEFAULT '0',
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `addroles`
INSERT INTO `addroles` (`id`, `roleName`, `frontPage`, `systemManagement`, `shoppingMallManagement`, `memberManagement`, `transactionManagement`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 1, 1, 1, 1, 1, NULL, NULL);

-- ------------------------------------------------------
-- Table structure for table `announcements`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `announcements`;
CREATE TABLE `announcements` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `message` TEXT NULL,
  `status` INT NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `announcements`
-- No data found for `announcements`.

-- ------------------------------------------------------
-- Table structure for table `cache`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` VARCHAR(255) NOT NULL,
  `value` TEXT NOT NULL,
  `expiration` INT NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `cache`
-- No data found for `cache`.

-- ------------------------------------------------------
-- Table structure for table `cache_locks`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` VARCHAR(255) NOT NULL,
  `owner` VARCHAR(255) NOT NULL,
  `expiration` INT NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `cache_locks`
-- No data found for `cache_locks`.

-- ------------------------------------------------------
-- Table structure for table `continuousorders`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `continuousorders`;
CREATE TABLE `continuousorders` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `userId` INT NOT NULL,
  `continuous` INT NOT NULL DEFAULT '0',
  `amount` DECIMAL(16,2) NOT NULL DEFAULT '0',
  `status` INT NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `continuousorders`
-- No data found for `continuousorders`.

-- ------------------------------------------------------
-- Table structure for table `customerservicelist`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `customerservicelist`;
CREATE TABLE `customerservicelist` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `mobileNumber` VARCHAR(255) NULL,
  `qq` VARCHAR(255) NULL,
  `weChat` VARCHAR(255) NULL,
  `link` VARCHAR(255) NULL,
  `status` INT NOT NULL DEFAULT '1',
  `workTime` VARCHAR(255) NULL,
  `addTime` VARCHAR(255) NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `customerservicelist`
-- No data found for `customerservicelist`.

-- ------------------------------------------------------
-- Table structure for table `failed_jobs`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` VARCHAR(255) NOT NULL,
  `connection` TEXT NOT NULL,
  `queue` TEXT NOT NULL,
  `payload` TEXT NOT NULL,
  `exception` TEXT NOT NULL,
  `failed_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `failed_jobs`
-- No data found for `failed_jobs`.

-- ------------------------------------------------------
-- Table structure for table `homerotators`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `homerotators`;
CREATE TABLE `homerotators` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NULL,
  `image` VARCHAR(255) NULL,
  `addTime` VARCHAR(255) NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `homerotators`
-- No data found for `homerotators`.

-- ------------------------------------------------------
-- Table structure for table `job_batches`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` VARCHAR(255) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `total_jobs` INT NOT NULL,
  `pending_jobs` INT NOT NULL,
  `failed_jobs` INT NOT NULL,
  `failed_job_ids` TEXT NOT NULL,
  `options` TEXT NULL,
  `cancelled_at` INT NULL,
  `created_at` INT NOT NULL,
  `finished_at` INT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `job_batches`
-- No data found for `job_batches`.

-- ------------------------------------------------------
-- Table structure for table `jobs`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` VARCHAR(255) NOT NULL,
  `payload` TEXT NOT NULL,
  `attempts` INT NOT NULL,
  `reserved_at` INT NULL,
  `available_at` INT NOT NULL,
  `created_at` INT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `jobs`
-- No data found for `jobs`.

-- ------------------------------------------------------
-- Table structure for table `memberlevels`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `memberlevels`;
CREATE TABLE `memberlevels` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `level` INT NOT NULL DEFAULT '1',
  `levelName` VARCHAR(255) NOT NULL,
  `orderReciveLimit` INT NOT NULL DEFAULT '0',
  `ordersGrabbed` INT NOT NULL DEFAULT '0',
  `commissionRate` DECIMAL(16,2) NOT NULL DEFAULT '0',
  `price` DECIMAL(16,2) NOT NULL DEFAULT '0',
  `levelImage` VARCHAR(255) NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `memberlevels`
INSERT INTO `memberlevels` (`id`, `level`, `levelName`, `orderReciveLimit`, `ordersGrabbed`, `commissionRate`, `price`, `levelImage`) VALUES
(1, 1, 'Basic', 10, 5, 0.005, 0, NULL);

-- ------------------------------------------------------
-- Table structure for table `members`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `qrImage` VARCHAR(255) NULL,
  `username` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NULL,
  `password` VARCHAR(255) NOT NULL,
  `phN` VARCHAR(255) NULL,
  `balance` DECIMAL(16,2) NOT NULL DEFAULT '0',
  `avalibleDailyOrders` INT NOT NULL DEFAULT '0',
  `takeTodayOrders` INT NOT NULL DEFAULT '0',
  `todaycommission` DECIMAL(16,2) NOT NULL DEFAULT '0',
  `credibility` INT NOT NULL DEFAULT '100',
  `inviteCode` VARCHAR(255) NULL,
  `myCode` VARCHAR(255) NOT NULL,
  `status` INT NOT NULL DEFAULT '1',
  `memberLevel` INT NOT NULL DEFAULT '1',
  `frozenAmout` DECIMAL(16,2) NOT NULL DEFAULT '0',
  `grabOrder` INT NOT NULL DEFAULT '0',
  `registrationTime` VARCHAR(255) NULL,
  `lastLongInTime` VARCHAR(255) NULL,
  `orderStatus` INT NOT NULL DEFAULT '1',
  `withdrawalStatus` INT NOT NULL DEFAULT '1',
  `paymentPassword` VARCHAR(255) NULL,
  `memberAgent` INT NOT NULL DEFAULT '0',
  `taskStatus` INT NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `members`
INSERT INTO `members` (`id`, `qrImage`, `username`, `email`, `password`, `phN`, `balance`, `avalibleDailyOrders`, `takeTodayOrders`, `todaycommission`, `credibility`, `inviteCode`, `myCode`, `status`, `memberLevel`, `frozenAmout`, `grabOrder`, `registrationTime`, `lastLongInTime`, `orderStatus`, `withdrawalStatus`, `paymentPassword`, `memberAgent`, `taskStatus`) VALUES
(1, '', 'testuser', 'test@example.com', 'cc03e747a6afbbcbf8be7668acfebee5', '03001234567', 1000, 10, 0, 0, 100, '', 'TEST01', 1, 1, 0, 5, '1779182814', '1779182814', 1, 1, '670b14728ad9902aecba32e22fa4f6bd', 0, 0);

-- ------------------------------------------------------
-- Table structure for table `migrations`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) NOT NULL,
  `batch` INT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `migrations`
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '0001_01_01_000003_create_project_tables', 1);

-- ------------------------------------------------------
-- Table structure for table `password_reset_tokens`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` DATETIME NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `password_reset_tokens`
-- No data found for `password_reset_tokens`.

-- ------------------------------------------------------
-- Table structure for table `payment_methods`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE `payment_methods` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `account_number` VARCHAR(255) NULL,
  `account_name` VARCHAR(255) NULL,
  `status` INT NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `payment_methods`
INSERT INTO `payment_methods` (`id`, `name`, `account_number`, `account_name`, `status`) VALUES
(1, 'Bank Transfer', '1234567890', 'Crownbridge', 1);

-- ------------------------------------------------------
-- Table structure for table `productcategories`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `productcategories`;
CREATE TABLE `productcategories` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `categoryName` VARCHAR(255) NOT NULL,
  `status` INT NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `productcategories`
INSERT INTO `productcategories` (`id`, `categoryName`, `status`) VALUES
(1, 'Tour Packages', 1),
(2, 'Hotel Bookings', 1),
(3, 'Flight Tickets', 1),
(4, 'Car Rentals', 1),
(5, 'Cruise Packages', 1);

-- ------------------------------------------------------
-- Table structure for table `productorder`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `productorder`;
CREATE TABLE `productorder` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `userId` INT NOT NULL,
  `productId` INT NOT NULL,
  `price` DECIMAL(16,2) NOT NULL DEFAULT '0',
  `comission` DECIMAL(16,2) NOT NULL DEFAULT '0',
  `status` INT NOT NULL DEFAULT '0',
  `time` VARCHAR(255) NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `productorder`
-- No data found for `productorder`.

-- ------------------------------------------------------
-- Table structure for table `products`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `productName` VARCHAR(255) NOT NULL,
  `productPrice` DECIMAL(16,2) NOT NULL DEFAULT '0',
  `productImage` VARCHAR(255) NULL,
  `productCategory` VARCHAR(255) NULL,
  `productDescription` TEXT NULL,
  `status` INT NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `products`
INSERT INTO `products` (`id`, `productName`, `productPrice`, `productImage`, `productCategory`, `productDescription`, `status`) VALUES
(1, 'Dubai City Tour - 5 Days', 45000, '', 'Tour Packages', '5-day all-inclusive Dubai city tour including Burj Khalifa, Desert Safari, Dubai Mall, and Marina Cruise.', 1),
(2, 'Istanbul Heritage Tour - 7 Days', 65000, '', 'Tour Packages', '7-day Istanbul heritage tour covering Hagia Sophia, Blue Mosque, Grand Bazaar, and Bosphorus Cruise.', 1),
(3, 'Maldives Beach Resort - 4 Nights', 120000, '', 'Hotel Bookings', '4-night stay at a luxury beach resort in Maldives with water villa, full board meals, and snorkeling.', 1),
(4, 'Lahore to Dubai - Round Trip', 55000, '', 'Flight Tickets', 'Round trip economy class ticket from Lahore to Dubai with 30kg baggage allowance.', 1),
(5, 'Baku Azerbaijan Tour - 4 Days', 38000, '', 'Tour Packages', '4-day Baku tour covering Flame Towers, Old City, Heydar Aliyev Center, and Mud Volcanoes.', 1),
(6, 'Thailand Phuket Package - 5 Days', 75000, '', 'Tour Packages', '5-day Phuket beach package with island hopping, Thai massage, and water sports activities.', 1),
(7, 'Dubai Airport Car Rental - Daily', 8000, '', 'Car Rentals', 'Daily car rental from Dubai Airport. Sedan category with unlimited mileage and insurance.', 1),
(8, 'Mediterranean Cruise - 7 Nights', 250000, '', 'Cruise Packages', '7-night Mediterranean cruise visiting Greece, Italy, and Turkey with all meals and entertainment.', 1);

-- ------------------------------------------------------
-- Table structure for table `rechargelist`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `rechargelist`;
CREATE TABLE `rechargelist` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `userId` INT NOT NULL,
  `username` VARCHAR(255) NULL,
  `orderAmout` DECIMAL(16,2) NOT NULL DEFAULT '0',
  `created_at` VARCHAR(255) NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `rechargelist`
-- No data found for `rechargelist`.

-- ------------------------------------------------------
-- Table structure for table `rechargerequests`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `rechargerequests`;
CREATE TABLE `rechargerequests` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `amount` DECIMAL(16,2) NOT NULL DEFAULT '0',
  `tid` VARCHAR(255) NULL,
  `method` VARCHAR(255) NULL,
  `status` INT NOT NULL DEFAULT '0',
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `rechargerequests`
-- No data found for `rechargerequests`.

-- ------------------------------------------------------
-- Table structure for table `referrals`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `referrals`;
CREATE TABLE `referrals` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `referrer_id` INT NOT NULL,
  `referred_id` INT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `referrals`
-- No data found for `referrals`.

-- ------------------------------------------------------
-- Table structure for table `sessions`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` VARCHAR(255) NOT NULL,
  `user_id` INT NULL,
  `ip_address` VARCHAR(255) NULL,
  `user_agent` TEXT NULL,
  `payload` TEXT NOT NULL,
  `last_activity` INT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `sessions`
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ade4eTd54zdkCyjDDXJPOrm3B4MckT85BEQdsWPC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNDNvVmJoVXljUmlGZlBodFJPNEhxSlYwREdvSDg4U1M1RndIYlYxbCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1779182530),
('H3wkh2oPBMz8FXK7cyM3WReFY0eUwFU5gnX0eYLl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY3JMaUp2NkNlT1ZBYmRKTWlUOGhlMzhhVmRXSXJLYnhOR0lSV3B6YyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1779182591),
('DgxSHPjJ9twuTMhlgvl3xW9En1M2inmc4mmp74gm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieTZwZ1RFYXdMOFY5R3h0SmlEWE13TDNocVY3WERQNkJFZDluamNaYiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1779184041);

-- ------------------------------------------------------
-- Table structure for table `systemsettings`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `systemsettings`;
CREATE TABLE `systemsettings` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `siteTitle` VARCHAR(255) NULL,
  `siteLogo` VARCHAR(255) NULL,
  `siteUrl` VARCHAR(255) NULL,
  `minWithdrawal` DECIMAL(16,2) NOT NULL DEFAULT '0',
  `maxWithdrawal` DECIMAL(16,2) NOT NULL DEFAULT '0',
  `withdrawalTimes` INT NOT NULL DEFAULT '0',
  `minRecharge` DECIMAL(16,2) NOT NULL DEFAULT '0',
  `maxRecharge` DECIMAL(16,2) NOT NULL DEFAULT '0',
  `rechargeTimes` INT NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `systemsettings`
INSERT INTO `systemsettings` (`id`, `siteTitle`, `siteLogo`, `siteUrl`, `minWithdrawal`, `maxWithdrawal`, `withdrawalTimes`, `minRecharge`, `maxRecharge`, `rechargeTimes`) VALUES
(1, 'Crownbridge Laravel', '', 'http://localhost:8000', 100, 50000, 3, 100, 50000, 5);

-- ------------------------------------------------------
-- Table structure for table `systemusers`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `systemusers`;
CREATE TABLE `systemusers` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `role` VARCHAR(255) NULL,
  `remember_token` VARCHAR(255) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `systemusers`
INSERT INTO `systemusers` (`id`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$12$J/TwIIkwtVD35o3UUsDFYe0IDRYGL/SSHsgAOKnfOYpenU6DwsHiO', 'Super Admin', NULL, NULL, NULL);

-- ------------------------------------------------------
-- Table structure for table `textmanagements`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `textmanagements`;
CREATE TABLE `textmanagements` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `pageName` VARCHAR(255) NOT NULL,
  `title` VARCHAR(255) NULL,
  `content` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `textmanagements`
INSERT INTO `textmanagements` (`id`, `pageName`, `title`, `content`) VALUES
(1, 'about', 'About', '<p>This is the about page content.</p>'),
(2, 'faqs', 'Faqs', '<p>This is the faqs page content.</p>'),
(3, 'term', 'Term', '<p>This is the term page content.</p>'),
(4, 'gettouch', 'Gettouch', '<p>This is the gettouch page content.</p>');

-- ------------------------------------------------------
-- Table structure for table `todayrewards`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `todayrewards`;
CREATE TABLE `todayrewards` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `userId` INT NOT NULL,
  `reward` DECIMAL(16,2) NOT NULL DEFAULT '0',
  `tasks` INT NOT NULL DEFAULT '0',
  `created_at` VARCHAR(255) NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `todayrewards`
-- No data found for `todayrewards`.

-- ------------------------------------------------------
-- Table structure for table `trial_periods`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `trial_periods`;
CREATE TABLE `trial_periods` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tasks` INT NOT NULL DEFAULT '0',
  `days` INT NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `trial_periods`
-- No data found for `trial_periods`.

-- ------------------------------------------------------
-- Table structure for table `user_trials`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `user_trials`;
CREATE TABLE `user_trials` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `trial_end_date` VARCHAR(255) NULL,
  `payment_status` INT NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `user_trials`
-- No data found for `user_trials`.

-- ------------------------------------------------------
-- Table structure for table `user_verifications`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `user_verifications`;
CREATE TABLE `user_verifications` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `phone_number` VARCHAR(255) NULL,
  `otp_code` VARCHAR(255) NULL,
  `otp_sent_count` INT NOT NULL DEFAULT '0',
  `otp_attempts` INT NOT NULL DEFAULT '0',
  `is_verified` INT NOT NULL DEFAULT '0',
  `last_otp_sent` DATETIME NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `user_verifications`
-- No data found for `user_verifications`.

-- ------------------------------------------------------
-- Table structure for table `userbankinfos`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `userbankinfos`;
CREATE TABLE `userbankinfos` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `userId` INT NOT NULL,
  `name` VARCHAR(255) NULL,
  `cardNumber` VARCHAR(255) NULL,
  `bankName` VARCHAR(255) NULL,
  `phoneNumber` VARCHAR(255) NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `userbankinfos`
-- No data found for `userbankinfos`.

-- ------------------------------------------------------
-- Table structure for table `users`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `email_verified_at` DATETIME NULL,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(255) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `users`
-- No data found for `users`.

-- ------------------------------------------------------
-- Table structure for table `withdrawlists`
-- ------------------------------------------------------
DROP TABLE IF EXISTS `withdrawlists`;
CREATE TABLE `withdrawlists` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `userId` INT NOT NULL,
  `username` VARCHAR(255) NULL,
  `orderAmount` DECIMAL(16,2) NOT NULL DEFAULT '0',
  `mobile` VARCHAR(255) NULL,
  `bankCard` VARCHAR(255) NULL,
  `bankName` VARCHAR(255) NULL,
  `name` VARCHAR(255) NULL,
  `created_at` VARCHAR(255) NULL,
  `oprate` INT NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `withdrawlists`
-- No data found for `withdrawlists`.

SET FOREIGN_KEY_CHECKS=1;
