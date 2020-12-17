-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 17, 2020 lúc 10:30 AM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlyktx`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tang`
--

CREATE TABLE `tang` (
  `id` int(10) UNSIGNED NOT NULL,
  `Tang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_khu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tang`
--

INSERT INTO `tang` (`id`, `Tang`, `id_khu`, `created_at`, `updated_at`) VALUES
(1, 'Tầng 01', 1, NULL, NULL),
(2, 'Tầng 02', 1, NULL, NULL),
(3, 'Tầng 03', 1, NULL, NULL),
(4, 'Tầng 04', 1, NULL, NULL),
(5, 'Tầng 05', 1, NULL, NULL),
(6, 'Tầng 01', 2, NULL, NULL),
(7, 'Tầng 02', 2, NULL, NULL),
(8, 'Tầng 03', 2, NULL, NULL),
(9, 'Tầng 04', 2, NULL, NULL),
(10, 'Tầng 05', 2, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tang`
--
ALTER TABLE `tang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tang_id_khu_foreign` (`id_khu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tang`
--
ALTER TABLE `tang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tang`
--
ALTER TABLE `tang`
  ADD CONSTRAINT `tang_id_khu_foreign` FOREIGN KEY (`id_khu`) REFERENCES `khu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
