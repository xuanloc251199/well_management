-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2024 lúc 01:22 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `water_well`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Trần Văn B', 'user', 'user@user.com', NULL, '$2y$12$xh.JYJlF4tHHbfgo8hYP6Oydle9KI0Aw7sMjQxlIGYaPILS5Ne.nu', 'user', 'p2U001gaIwYGpv7GI76G0Y7bRYi9G0X9ovBPlL2LsOvvqAesiJZz4FMRUI19', '2024-10-25 11:04:24', '2024-10-25 11:04:24'),
(3, 'Trần Văn C', 'user_2', 'user2@user.com', NULL, '$2y$12$1DYJLDPIndI.IEtPMQZs5.oE3x9u63aP6WXiAI7gHMzi3LgP1uVXm', 'user', 'hDWShqRH9rcAf5R1ouF0iHW0lhZqewklr2BsrDFF2rF4h88huZXpBpdrsLLi', '2024-10-25 11:06:05', '2024-10-25 11:06:05'),
(5, 'admin Test', 'admin123', 'admin@gmail.com', NULL, '$2y$12$qURa4tRuB65Z2f3v2LBX7uqIKn55aoidSqXc9wibe7pGD1zFNc.Eu', 'admin', NULL, '2024-10-25 22:33:18', '2024-10-25 22:33:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `water_quality`
--

CREATE TABLE `water_quality` (
  `id` int(11) NOT NULL,
  `well_id` int(11) NOT NULL,
  `ph_level` varchar(255) NOT NULL,
  `tds` varchar(255) NOT NULL,
  `contamination` varchar(255) NOT NULL,
  `measured_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `water_quality`
--

INSERT INTO `water_quality` (`id`, `well_id`, `ph_level`, `tds`, `contamination`, `measured_at`) VALUES
(5, 7, '7.6', '100/1000', 'nito', '2024-10-25 19:35:00'),
(6, 8, '1', '1', 'không', '2024-10-24 05:34:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `water_usage`
--

CREATE TABLE `water_usage` (
  `id` int(11) NOT NULL,
  `well_id` int(11) NOT NULL,
  `volume_used` float NOT NULL,
  `usage_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `water_usage`
--

INSERT INTO `water_usage` (`id`, `well_id`, `volume_used`, `usage_date`) VALUES
(5, 7, 100, '2024-10-24 17:00:00'),
(6, 8, 300, '2024-10-24 05:34:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wells`
--

CREATE TABLE `wells` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` mediumtext NOT NULL,
  `depth` float NOT NULL,
  `water_level` float NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `wells`
--

INSERT INTO `wells` (`id`, `name`, `location`, `depth`, `water_level`, `status`, `created_at`) VALUES
(7, 'Nước ngầm primary', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d245374.53382051742!2d107.91381639609904!3d16.066678559390926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219c792252a13%3A0x1df0cb4b86727e06!2sDa%20Nang%2C%20Vietnam!5e0!3m2!1sen!2s!4v1729881526021!5m2!1sen!2s\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 100, 90, 'Đang hoạt động', '2024-10-25 22:34:05'),
(8, 'Nước ngầm A', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d354912.8253656272!2d105.54656088318325!3d10.636137880990434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1729920915625!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 300, 1000, 'Đang hoạt động', '2024-10-25 22:35:23');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `water_quality`
--
ALTER TABLE `water_quality`
  ADD PRIMARY KEY (`id`),
  ADD KEY `well_id` (`well_id`);

--
-- Chỉ mục cho bảng `water_usage`
--
ALTER TABLE `water_usage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `well_id` (`well_id`);

--
-- Chỉ mục cho bảng `wells`
--
ALTER TABLE `wells`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `water_quality`
--
ALTER TABLE `water_quality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `water_usage`
--
ALTER TABLE `water_usage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `wells`
--
ALTER TABLE `wells`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `water_quality`
--
ALTER TABLE `water_quality`
  ADD CONSTRAINT `water_quality_ibfk_1` FOREIGN KEY (`well_id`) REFERENCES `wells` (`id`);

--
-- Các ràng buộc cho bảng `water_usage`
--
ALTER TABLE `water_usage`
  ADD CONSTRAINT `water_usage_ibfk_1` FOREIGN KEY (`well_id`) REFERENCES `wells` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
