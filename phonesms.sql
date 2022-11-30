

CREATE TABLE `billing` (
  `id` varchar(200) NOT NULL,
  `billing_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `start_timestamp` varchar(200) DEFAULT NULL,
  `end_timestamp` varchar(200) DEFAULT NULL,
  `user_id` varchar(200) NOT NULL,
  `sent_messages` int(20) NOT NULL,
  `received_messages` int(20) NOT NULL,
  `total_cost` int(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `heartbeat`
--

CREATE TABLE `heartbeat` (
  `id` varchar(200) NOT NULL,
  `heartbeat_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `timestamp` varchar(200) DEFAULT NULL,
  `owner` varchar(200) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` varchar(200) NOT NULL,
  `message_id` int(11) NOT NULL,
  `contact` text NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `failure_reason` text NOT NULL,
  `last_attempted_at` varchar(200) DEFAULT NULL,
  `order_timestamp` varchar(200) NOT NULL,
  `owner` varchar(200) NOT NULL,
  `received_at` varchar(200) DEFAULT NULL,
  `request_received_at` varchar(200) DEFAULT NULL,
  `send_time` varchar(200) DEFAULT NULL,
  `sent_at` varchar(200) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  `max_send_attempts` int(2) NOT NULL DEFAULT 2,
  `scheduled_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `send_attempt_count` int(2) DEFAULT 1,
  `can_be_polled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `message_id`, `contact`, `content`, `created_at`, `failure_reason`, `last_attempted_at`, `order_timestamp`, `owner`, `received_at`, `request_received_at`, `send_time`, `sent_at`, `status`, `type`, `updated_at`, `user_id`, `max_send_attempts`, `scheduled_at`, `send_attempt_count`, `can_be_polled`) VALUES
('21', 1, '255744158015', 'This is a sample text message', '2022-11-30 14:33:02', 'failure_reason', '2022-11-30 17:33:02', '2022-11-30 17:33:02', '255786550809', NULL, NULL, NULL, NULL, 'status', 'type', '2022-11-30 14:33:02', 1, 2, '2022-11-30 19:07:47', 0, 1),
('48e1fca4-65fd-42e0-b317-8115207dea30', 2, '255744158015', 'This is a sample text message', '2022-11-30 14:37:14', 'failure_reason', '2022-11-30 17:37:14', '2022-11-30 17:37:14', '255786550809', NULL, NULL, NULL, NULL, 'status', 'type', '2022-11-30 14:37:14', 1, 2, '2022-11-30 19:07:47', 0, 1),
('c12d3398-0bda-4e04-bd78-172b541e57c1', 3, '255744158015', 'This is a sample text message', '2022-11-30 14:37:37', 'failure_reason', '2022-11-30 17:37:37', '2022-11-30 17:37:37', '255786550809', NULL, NULL, NULL, NULL, 'status', 'type', '2022-11-30 14:37:37', 1, 2, '2022-11-30 19:07:47', 0, 1),
('b74b9d8a-8e50-4fdf-a847-8ee608864149', 4, '255744158015', 'This is a sample text message', '2022-11-30 14:40:01', 'failure_reason', '2022-11-30 17:40:01', '2022-11-30 17:40:01', '255786550809', NULL, NULL, NULL, NULL, 'status', 'type', '2022-11-30 14:40:01', 1, 2, '2022-11-30 19:07:47', 0, 1),
('3d99fbbf-a235-4b5e-83b9-400232e83480', 5, '255744158015', 'This is a sample text message', '2022-11-30 14:40:46', 'failure_reason', '2022-11-30 17:40:46', '2022-11-30 17:40:46', '255786550809', NULL, NULL, NULL, NULL, 'status', 'type', '2022-11-30 14:40:46', 1, 2, '2022-11-30 19:07:47', 0, 1),
('a8fc4bde-ee9b-4cba-88a0-f1360b2379a9', 6, '255744158015', 'This is a sample text message', '2022-11-30 14:41:10', 'failure_reason', '2022-11-30 17:41:10', '2022-11-30 17:41:10', '255786550809', NULL, NULL, NULL, NULL, 'status', 'type', '2022-11-30 14:41:10', 1, 2, '2022-11-30 19:07:47', 0, 1),
('bec48269-1f19-48c6-b441-2b5c16964521', 7, '255744158015', 'This is a sample text message', '2022-11-30 14:42:06', 'failure_reason', '2022-11-30 17:42:06', '2022-11-30 17:42:06', '255786550809', NULL, NULL, NULL, NULL, 'status', 'type', '2022-11-30 14:42:06', 1, 2, '2022-11-30 19:07:47', 0, 1),
('8d240360-d860-4e9a-bb10-02f106169d33', 8, '255744158015', 'This is a sample text message', '2022-11-30 14:43:32', 'failure_reason', '2022-11-30 17:43:32', '2022-11-30 17:43:32', '255786550809', NULL, NULL, NULL, NULL, 'status', 'type', '2022-11-30 14:43:32', 1, 2, '2022-11-30 19:07:47', 0, 1),
('415845a0-391b-4e05-a986-778ed4bdb583', 9, '255744158015', 'This is a sample text message', '2022-11-30 14:46:01', 'failure_reason', '2022-11-30 17:46:01', '2022-11-30 17:46:01', '255786550809', NULL, NULL, NULL, NULL, 'status', 'type', '2022-11-30 14:46:01', 1, 2, '2022-11-30 19:07:47', 0, 1),
('51bd6568-5cf1-43ca-8e17-81584097495b', 10, '255744158015', 'This is a sample text message', '2022-11-30 14:46:46', 'failure_reason', '2022-11-30 17:46:46', '2022-11-30 17:46:46', '255786550809', NULL, NULL, NULL, NULL, 'status', 'type', '2022-11-30 14:46:46', 1, 2, '2022-11-30 19:07:47', 0, 1),
('2f07b679-1fe8-43a3-b0f9-4c287357e7f5', 11, '255744158015', 'This is a sample text message', '2022-11-30 15:04:16', 'failure_reason', '2022-11-30 18:04:16', '2022-11-30 18:04:16', '255786550809', NULL, NULL, NULL, NULL, 'status', 'type', '2022-11-30 15:04:16', 1, 2, '2022-11-30 19:07:47', 0, 1),
('9f66aa9e-46b7-4476-9919-7a85f418c382', 12, '255744158015', 'This is a sample text message', '2022-11-30 15:13:13', 'failure_reason', '2022-11-30 18:13:13', '2022-11-30 18:13:13', '255786550809', NULL, NULL, NULL, NULL, 'status', 'type', '2022-11-30 15:13:13', 1, 2, '2022-11-30 19:07:47', 0, 1),
('0864427a-4840-438a-8d7a-33fe0ff721e7', 13, '255744158016', 'This is a sample text message received on a phone', '2022-11-30 15:52:38', 'failure_reason', '2022-11-30 18:52:38', '2022-11-30 18:52:38', '255786550809', NULL, NULL, NULL, NULL, 'status', 'type', '2022-11-30 15:52:38', 1, 2, '2022-11-30 19:07:47', 0, 1),
('485304af-cd46-4b6f-b63b-59a837a589e1', 14, '255744158016', 'This is a sample text message received on a phone', '2022-11-30 15:57:54', 'failure_reason', '2022-11-30 18:57:54', '2022-11-30 18:57:54', '255786550809', NULL, NULL, NULL, NULL, 'sent', 'type', '2022-11-30 15:57:54', 1, 2, '2022-11-30 19:07:47', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `message_thread`
--

CREATE TABLE `message_thread` (
  `id` int(200) NOT NULL,
  `message_thread_id` int(11) NOT NULL,
  `contact` text NOT NULL,
  `last_message_content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `last_message_id` varchar(200) NOT NULL,
  `color` varchar(200) DEFAULT NULL,
  `order_timestamp` varchar(200) NOT NULL,
  `owner` varchar(200) NOT NULL,
  `is_archived` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_18_061755_create_permission_tables', 1);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `id` varchar(200) NOT NULL,
  `phone_id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `fcm_token` text DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `max_send_attempts` int(20) DEFAULT NULL,
  `message_expiration_seconds` int(20) DEFAULT NULL,
  `messages_per_minute` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_key` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_phone_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `phone`, `api_key`, `active_phone_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `id`, `user_id`) VALUES
('Albogast Kiyogoma', 'albogasty@gmail.com', '+255744158016', 'GUBGMHVpwcTsPFvNNVdG5DKtpv6UwksAfzw5aULcGzgG', NULL, NULL, '$2y$10$.H9HjuoERWcgObMUnVeCC.gDL/d0puwfvKZtL03mkSwYjgHv5.pB.', NULL, '2022-11-30 11:23:39', '2022-11-30 11:23:39', '67baf67b-4c55-4ce8-be11-d203e0cbb3a0', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`billing_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `heartbeat`
--
ALTER TABLE `heartbeat`
  ADD PRIMARY KEY (`heartbeat_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `message_thread`
--
ALTER TABLE `message_thread`
  ADD PRIMARY KEY (`message_thread_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`phone_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `billing_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `heartbeat`
--
ALTER TABLE `heartbeat`
  MODIFY `heartbeat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `message_thread`
--
ALTER TABLE `message_thread`
  MODIFY `message_thread_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `phone_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
