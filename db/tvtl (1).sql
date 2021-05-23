-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 23, 2021 lúc 04:26 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tvtl`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `branch`
--

INSERT INTO `branch` (`id`, `parentid`, `name`, `publish`, `sort`, `created_at`, `updated_at`) VALUES
(8, 0, 'Tin tức', 1, 3, '2021-05-19 11:28:50', NULL),
(9, 0, 'Giới thiệu', 1, 2, '2021-05-19 11:29:01', NULL),
(10, 9, 'Đường lối tư thiền', 1, 0, '2021-05-19 11:30:17', NULL),
(11, 9, 'Thiền phái Trúc Lâm Yên Tử', 1, 0, '2021-05-19 11:30:46', '2021-05-19 11:30:53'),
(12, 9, 'Thiền viện Trúc Lâm Bạch Mã', 1, 0, '2021-05-19 11:31:10', NULL),
(13, 8, 'Phật sự tông môn', 1, 0, '2021-05-19 11:31:45', NULL),
(14, 8, 'Thông báo', 1, 0, '2021-05-19 11:31:56', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `logo`
--

INSERT INTO `logo` (`id`, `image`, `name`, `title`, `type`, `created_at`, `updated_at`) VALUES
(1, 'logo.png', 'Bóng đá', 'Tin hôm 20/12/2020', 'logo', '2021-05-23 08:47:54', '2021-05-23 02:23:01'),
(8, 'khanh duy.png', 'khanh duy', '', 'slide', '2021-05-23 09:26:02', NULL),
(9, 'khanh duy.jpg', 'khanh duy', '', 'slide', '2021-05-23 09:26:09', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
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
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-05-05-071150', 'App\\Database\\Migrations\\Users', 'default', 'App', 1621092439, 1),
(2, '2021-05-14-173800', 'App\\Database\\Migrations\\Role', 'default', 'App', 1621092439, 1),
(3, '2021-05-14-220609', 'App\\Database\\Migrations\\Branch', 'default', 'App', 1621092439, 1),
(4, '2021-05-15-061135', 'App\\Database\\Migrations\\Criteria', 'default', 'App', 1621092440, 1),
(5, '2021-05-15-072524', 'App\\Database\\Migrations\\Content', 'default', 'App', 1621092440, 1),
(6, '2021-05-15-154335', 'App\\Database\\Migrations\\Level', 'default', 'App', 1621093526, 2),
(7, '2021-05-15-155730', 'App\\Database\\Migrations\\Age', 'default', 'App', 1621099333, 3),
(8, '2021-05-15-212156', 'App\\Database\\Migrations\\UserThird', 'default', 'App', 1621114156, 4),
(9, '2021-05-17-012256', 'App\\Database\\Migrations\\Comment', 'default', 'App', 1621478837, 5),
(10, '2021-05-20-023926', 'App\\Database\\Migrations\\News', 'default', 'App', 1621478922, 6),
(11, '2021-05-23-000731', 'App\\Database\\Migrations\\Logo', 'default', 'App', 1621729110, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `id_branch` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `hot` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `publish` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `id_branch`, `title`, `image`, `content`, `hot`, `sort`, `publish`, `created_at`, `updated_at`) VALUES
(11, 12, 'Thiền Phái TRÚC LÂM YÊN TỬ', 'Thiền Phái TRÚC LÂM YÊN TỬ.jpg', '<p><img alt=\"\" src=\"/uploads/images/31-%20yen%20tu-.jpg\" style=\"height:565px; width:800px\" /></p>\r\n', 1, 2, 1, '2021-05-20 10:55:54', '2021-05-23 06:55:17'),
(13, 11, 'Thiền Phái TRÚC LÂM YÊN TỬ', 'Thiền Phái TRÚC LÂM YÊN TỬ.png', '<p>sdsadsadsad</p>\r\n', 0, 0, 1, '2021-05-23 07:05:37', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `email`, `address`, `avatar`, `publish`, `created_at`, `updated_at`) VALUES
(4, 'vo duy', 'admin', '$2y$10$VWAOz1CYJgnSEz.4J7ot/eBtdK4CyiyT10t.DwXOxe5KPWR2ysSVi', 'zzskillzzzz@gmail.com', 'can tho', 'a????????', 0, NULL, NULL),
(5, 'Võ Khánh Duy', 'zzskillzzzz', '$2y$10$/uKRDfo0RwOD5oXMlHtBROiJJLytuJN96gKgK1Ks/X2Tg3V4CECXG', 'admin@gmail.com', 'can tho', 'zzskillzzzz.png', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_third`
--

CREATE TABLE `user_third` (
  `id` int(11) NOT NULL,
  `id_role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `posi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ori` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_third`
--

INSERT INTO `user_third` (`id`, `id_role`, `fullname`, `birthday`, `phone`, `address`, `email`, `username`, `password`, `posi`, `avatar`, `gender`, `ori`, `sort`, `created_at`, `updated_at`) VALUES
(6, '4', 'Khánh Duy', '1998-09-24', '0982824398', 'Cần Thơ', 'vkduy240398@gmail.com', 'khanhduy', '$2y$10$5UDIQczjy71WmXRzw..Fg.WxY9rCeVXmUq4i/JExrDdESWSmrnWFC', 'Giảng viên', '.jpg', 'Nữ', 'CTUT', 0, '2021-05-16 08:02:54', NULL),
(7, '1', 'vo duy', '1998-09-24', '0982824398', 'Cần Thơ', 'vkduy240398@gmail.com', 'user12', '$2y$10$Zb5kDZa658ZcrFIGMcjkUeiFPDlhGlSWbi2CwF53DDw9a6AgVD5PS', 'Giám đốc', 'user12.png', 'Nam', 'CTUT', 0, '2021-05-16 08:05:41', NULL),
(8, '4', 'vo duy', '1998-09-24', '0982824398', 'Cần Thơ', 'vkduy240398@gmail.com', 'user122', '$2y$10$K6st9Tr7x.XC.8DnArDLEekq4SueFyU6GUxC.9e/ia4VfYdLqYNhm', 'Giảng viên', 'user122.png', 'Nam', 'CTUT', 0, '2021-05-16 09:06:31', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_third`
--
ALTER TABLE `user_third`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user_third`
--
ALTER TABLE `user_third`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
