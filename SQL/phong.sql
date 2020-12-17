-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 17, 2020 lúc 10:52 AM
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
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `id` int(10) UNSIGNED NOT NULL,
  `phong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phi` int(11) DEFAULT NULL,
  `id_tang` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`id`, `phong`, `phi`, `id_tang`, `created_at`, `updated_at`) VALUES
(1, 'Phòng 01', NULL, 1, NULL, NULL),
(2, 'Phòng 02', NULL, 1, NULL, NULL),
(3, 'Phòng 03', NULL, 1, NULL, NULL),
(4, 'Phòng 04', NULL, 1, NULL, NULL),
(5, 'Phòng 05', NULL, 1, NULL, NULL),
(6, 'Phòng 06', NULL, 1, NULL, NULL),
(7, 'Phòng 07', NULL, 1, NULL, NULL),
(8, 'Phòng 08', NULL, 1, NULL, NULL),
(9, 'Phòng 09', NULL, 1, NULL, NULL),
(10, 'Phòng 10', NULL, 1, NULL, NULL),
(11, 'Phòng 01', NULL, 6, NULL, NULL),
(12, 'Phòng 02', NULL, 6, NULL, NULL),
(13, 'Phòng 03', NULL, 6, NULL, NULL),
(14, 'Phòng 04', NULL, 6, NULL, NULL),
(15, 'Phòng 05', NULL, 6, NULL, NULL),
(16, 'Phòng 06', NULL, 6, NULL, NULL),
(17, 'Phòng 07', NULL, 6, NULL, NULL),
(18, 'Phòng 08', NULL, 6, NULL, NULL),
(19, 'Phòng 09', NULL, 6, NULL, NULL),
(20, 'Phòng 10', NULL, 6, NULL, NULL),
(21, 'Phòng 01', NULL, 2, NULL, NULL),
(22, 'Phòng 02', NULL, 2, NULL, NULL),
(23, 'Phòng 03', NULL, 2, NULL, NULL),
(24, 'Phòng 04', NULL, 2, NULL, NULL),
(25, 'Phòng 05', NULL, 2, NULL, NULL),
(26, 'Phòng 06', NULL, 2, NULL, NULL),
(27, 'Phòng 07', NULL, 2, NULL, NULL),
(28, 'Phòng 08', NULL, 2, NULL, NULL),
(29, 'Phòng 09', NULL, 2, NULL, NULL),
(30, 'Phòng 10', NULL, 2, NULL, NULL),
(31, 'Phòng 01', NULL, 7, NULL, NULL),
(32, 'Phòng 02', NULL, 7, NULL, NULL),
(33, 'Phòng 03', NULL, 7, NULL, NULL),
(34, 'Phòng 04', NULL, 7, NULL, NULL),
(35, 'Phòng 05', NULL, 7, NULL, NULL),
(36, 'Phòng 06', NULL, 7, NULL, NULL),
(37, 'Phòng 07', NULL, 7, NULL, NULL),
(38, 'Phòng 08', NULL, 7, NULL, NULL),
(39, 'Phòng 09', NULL, 7, NULL, NULL),
(40, 'Phòng 10', NULL, 7, NULL, NULL),
(41, 'Phòng 01', NULL, 3, NULL, NULL),
(42, 'Phòng 02', NULL, 3, NULL, NULL),
(43, 'Phòng 03', NULL, 3, NULL, NULL),
(44, 'Phòng 04', NULL, 3, NULL, NULL),
(45, 'Phòng 05', NULL, 3, NULL, NULL),
(46, 'Phòng 06', NULL, 3, NULL, NULL),
(47, 'Phòng 07', NULL, 3, NULL, NULL),
(48, 'Phòng 08', NULL, 3, NULL, NULL),
(49, 'Phòng 09', NULL, 3, NULL, NULL),
(50, 'Phòng 10', NULL, 3, NULL, NULL),
(51, 'Phòng 01', NULL, 8, NULL, NULL),
(52, 'Phòng 02', NULL, 8, NULL, NULL),
(53, 'Phòng 03', NULL, 8, NULL, NULL),
(54, 'Phòng 04', NULL, 8, NULL, NULL),
(55, 'Phòng 05', NULL, 8, NULL, NULL),
(56, 'Phòng 06', NULL, 8, NULL, NULL),
(57, 'Phòng 07', NULL, 8, NULL, NULL),
(58, 'Phòng 08', NULL, 8, NULL, NULL),
(59, 'Phòng 09', NULL, 8, NULL, NULL),
(60, 'Phòng 10', NULL, 8, NULL, NULL),
(61, 'Phòng 01', NULL, 4, NULL, NULL),
(62, 'Phòng 02', NULL, 4, NULL, NULL),
(63, 'Phòng 03', NULL, 4, NULL, NULL),
(64, 'Phòng 04', NULL, 4, NULL, NULL),
(65, 'Phòng 05', NULL, 4, NULL, NULL),
(66, 'Phòng 06', NULL, 4, NULL, NULL),
(67, 'Phòng 07', NULL, 4, NULL, NULL),
(68, 'Phòng 08', NULL, 4, NULL, NULL),
(69, 'Phòng 09', NULL, 4, NULL, NULL),
(70, 'Phòng 10', NULL, 4, NULL, NULL),
(71, 'Phòng 01', NULL, 9, NULL, NULL),
(72, 'Phòng 02', NULL, 9, NULL, NULL),
(73, 'Phòng 03', NULL, 9, NULL, NULL),
(74, 'Phòng 04', NULL, 9, NULL, NULL),
(75, 'Phòng 05', NULL, 9, NULL, NULL),
(76, 'Phòng 06', NULL, 9, NULL, NULL),
(77, 'Phòng 07', NULL, 9, NULL, NULL),
(78, 'Phòng 08', NULL, 9, NULL, NULL),
(79, 'Phòng 09', NULL, 9, NULL, NULL),
(80, 'Phòng 10', NULL, 9, NULL, NULL),
(81, 'Phòng 01', NULL, 5, NULL, NULL),
(82, 'Phòng 02', NULL, 5, NULL, NULL),
(83, 'Phòng 03', NULL, 5, NULL, NULL),
(84, 'Phòng 04', NULL, 5, NULL, NULL),
(85, 'Phòng 05', NULL, 5, NULL, NULL),
(86, 'Phòng 06', NULL, 5, NULL, NULL),
(87, 'Phòng 07', NULL, 5, NULL, NULL),
(88, 'Phòng 08', NULL, 5, NULL, NULL),
(89, 'Phòng 09', NULL, 5, NULL, NULL),
(90, 'Phòng 10', NULL, 5, NULL, NULL),
(91, 'Phòng 01', NULL, 10, NULL, NULL),
(92, 'Phòng 02', NULL, 10, NULL, NULL),
(93, 'Phòng 03', NULL, 10, NULL, NULL),
(94, 'Phòng 04', NULL, 10, NULL, NULL),
(95, 'Phòng 05', NULL, 10, NULL, NULL),
(96, 'Phòng 06', NULL, 10, NULL, NULL),
(97, 'Phòng 07', NULL, 10, NULL, NULL),
(98, 'Phòng 08', NULL, 10, NULL, NULL),
(99, 'Phòng 09', NULL, 10, NULL, NULL),
(100, 'Phòng 10', NULL, 10, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phong_id_tang_foreign` (`id_tang`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `phong`
--
ALTER TABLE `phong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_id_tang_foreign` FOREIGN KEY (`id_tang`) REFERENCES `tang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
