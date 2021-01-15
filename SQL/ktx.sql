-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 15, 2021 lúc 04:06 PM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ktx`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `giuong`
--

CREATE TABLE `giuong` (
  `id` int(10) UNSIGNED NOT NULL,
  `giuong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phi` int(11) DEFAULT NULL,
  `demphi` int(11) DEFAULT NULL,
  `hoatdong` int(11) DEFAULT 0,
  `id_phong` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giuong`
--

INSERT INTO `giuong` (`id`, `giuong`, `phi`, `demphi`, `hoatdong`, `id_phong`, `created_at`, `updated_at`) VALUES
(1, 'Giường 01', NULL, NULL, 1, 1, NULL, '2020-12-25 11:59:40'),
(2, 'Giường 02', NULL, NULL, 1, 1, NULL, NULL),
(3, 'Giường 03', NULL, NULL, 0, 1, NULL, '2020-12-25 11:40:28'),
(4, 'Giường 04', NULL, NULL, 0, 1, NULL, '2020-12-20 15:20:40'),
(5, 'Giường 05', NULL, NULL, 0, 1, NULL, '2020-12-20 15:27:08'),
(6, 'Giường 06', NULL, NULL, 0, 1, NULL, '2020-12-27 10:05:33'),
(7, 'Giường 01', NULL, NULL, 0, 2, NULL, NULL),
(8, 'Giường 02', NULL, NULL, 0, 2, NULL, '2020-12-30 15:53:07'),
(9, 'Giường 03', NULL, NULL, 0, 2, NULL, '2020-12-26 07:05:31'),
(10, 'Giường 04', NULL, NULL, 0, 2, NULL, NULL),
(11, 'Giường 05', NULL, NULL, 0, 2, NULL, NULL),
(12, 'Giường 06', NULL, NULL, 0, 2, NULL, NULL),
(13, 'Giường 01', NULL, NULL, 0, 3, NULL, NULL),
(14, 'Giường 02', NULL, NULL, 0, 3, NULL, '2020-12-26 07:07:36'),
(15, 'Giường 03', NULL, NULL, 0, 3, NULL, NULL),
(16, 'Giường 04', NULL, NULL, 0, 3, NULL, NULL),
(17, 'Giường 05', NULL, NULL, 0, 3, NULL, NULL),
(18, 'Giường 06', NULL, NULL, 0, 3, NULL, NULL),
(19, 'Giường 01', NULL, NULL, 0, 11, NULL, NULL),
(20, 'Giường 02', NULL, NULL, 0, 11, NULL, NULL),
(21, 'Giường 03', NULL, NULL, 0, 11, NULL, NULL),
(22, 'Giường 04', NULL, NULL, 1, 11, NULL, NULL),
(23, 'Giường 05', NULL, NULL, 0, 11, NULL, NULL),
(24, 'Giường 06', NULL, NULL, 0, 11, NULL, NULL),
(25, 'Giường 01', NULL, NULL, 0, 12, NULL, NULL),
(26, 'Giường 02', NULL, NULL, 0, 12, NULL, NULL),
(27, 'Giường 03', NULL, NULL, 0, 12, NULL, '2020-12-30 15:49:22'),
(28, 'Giường 04', NULL, NULL, 0, 12, NULL, NULL),
(29, 'Giường 05', NULL, NULL, 0, 12, NULL, NULL),
(30, 'Giường 06', NULL, NULL, 0, 12, NULL, NULL),
(31, 'Giường 01', NULL, NULL, 0, 13, NULL, NULL),
(32, 'Giường 02', NULL, NULL, 0, 13, NULL, NULL),
(33, 'Giường 03', NULL, NULL, 0, 13, NULL, NULL),
(34, 'Giường 04', NULL, NULL, 0, 13, NULL, NULL),
(35, 'Giường 05', NULL, NULL, 0, 13, NULL, NULL),
(36, 'Giường 06', NULL, NULL, 0, 13, NULL, NULL),
(37, 'Giường 01', NULL, NULL, 1, 21, NULL, NULL),
(38, 'Giường 02', NULL, NULL, 0, 21, NULL, NULL),
(39, 'Giường 03', NULL, NULL, 0, 21, NULL, NULL),
(40, 'Giường 04', NULL, NULL, 0, 21, NULL, NULL),
(41, 'Giường 05', NULL, NULL, 0, 21, NULL, NULL),
(42, 'Giường 06', NULL, NULL, 0, 21, NULL, NULL),
(43, 'Giường 01', NULL, NULL, 0, 22, NULL, NULL),
(44, 'Giường 02', NULL, NULL, 0, 22, NULL, NULL),
(45, 'Giường 03', NULL, NULL, 0, 22, NULL, NULL),
(46, 'Giường 04', NULL, NULL, 0, 22, NULL, NULL),
(47, 'Giường 05', NULL, NULL, 0, 22, NULL, NULL),
(48, 'Giường 06', NULL, NULL, 0, 22, NULL, NULL),
(49, 'Giường 01', NULL, NULL, 0, 23, NULL, NULL),
(50, 'Giường 02', NULL, NULL, 0, 23, NULL, NULL),
(51, 'Giường 03', NULL, NULL, 0, 23, NULL, NULL),
(52, 'Giường 04', NULL, NULL, 0, 23, NULL, NULL),
(53, 'Giường 05', NULL, NULL, 0, 23, NULL, NULL),
(54, 'Giường 06', NULL, NULL, 0, 23, NULL, NULL),
(55, 'Giường 01', NULL, NULL, 0, 31, NULL, NULL),
(56, 'Giường 02', NULL, NULL, 0, 31, NULL, NULL),
(57, 'Giường 03', NULL, NULL, 0, 31, NULL, NULL),
(58, 'Giường 04', NULL, NULL, 0, 31, NULL, NULL),
(59, 'Giường 05', NULL, NULL, 0, 31, NULL, NULL),
(60, 'Giường 06', NULL, NULL, 0, 31, NULL, NULL),
(61, 'Giường 01', NULL, NULL, 0, 32, NULL, NULL),
(62, 'Giường 02', NULL, NULL, 0, 32, NULL, NULL),
(63, 'Giường 03', NULL, NULL, 0, 32, NULL, NULL),
(64, 'Giường 04', NULL, NULL, 0, 32, NULL, NULL),
(65, 'Giường 05', NULL, NULL, 0, 32, NULL, NULL),
(66, 'Giường 06', NULL, NULL, 0, 32, NULL, NULL),
(67, 'Giường 01', NULL, NULL, 0, 33, NULL, NULL),
(68, 'Giường 02', NULL, NULL, 0, 33, NULL, NULL),
(69, 'Giường 03', NULL, NULL, 1, 33, NULL, NULL),
(70, 'Giường 04', NULL, NULL, 0, 33, NULL, NULL),
(71, 'Giường 05', NULL, NULL, 0, 33, NULL, NULL),
(72, 'Giường 06', NULL, NULL, 0, 33, NULL, NULL),
(73, 'Giường 01', NULL, NULL, 0, 41, NULL, NULL),
(74, 'Giường 02', NULL, NULL, 1, 41, NULL, NULL),
(75, 'Giường 03', NULL, NULL, 0, 41, NULL, NULL),
(76, 'Giường 04', NULL, NULL, 0, 41, NULL, NULL),
(77, 'Giường 05', NULL, NULL, 0, 41, NULL, NULL),
(78, 'Giường 06', NULL, NULL, 0, 41, NULL, NULL),
(79, 'Giường 01', NULL, NULL, 0, 42, NULL, NULL),
(80, 'Giường 02', NULL, NULL, 0, 42, NULL, NULL),
(81, 'Giường 03', NULL, NULL, 0, 42, NULL, NULL),
(82, 'Giường 04', NULL, NULL, 0, 42, NULL, NULL),
(83, 'Giường 05', NULL, NULL, 0, 42, NULL, NULL),
(84, 'Giường 06', NULL, NULL, 0, 42, NULL, NULL),
(85, 'Giường 01', NULL, NULL, 0, 43, NULL, NULL),
(86, 'Giường 02', NULL, NULL, 0, 43, NULL, NULL),
(87, 'Giường 03', NULL, NULL, 0, 43, NULL, NULL),
(88, 'Giường 04', NULL, NULL, 0, 43, NULL, NULL),
(89, 'Giường 05', NULL, NULL, 0, 43, NULL, NULL),
(90, 'Giường 06', NULL, NULL, 0, 43, NULL, NULL),
(91, 'Giường 01', NULL, NULL, 0, 51, NULL, NULL),
(92, 'Giường 02', NULL, NULL, 0, 51, NULL, NULL),
(93, 'Giường 03', NULL, NULL, 0, 51, NULL, NULL),
(94, 'Giường 04', NULL, NULL, 0, 51, NULL, NULL),
(95, 'Giường 05', NULL, NULL, 0, 51, NULL, NULL),
(96, 'Giường 06', NULL, NULL, 0, 51, NULL, NULL),
(97, 'Giường 01', NULL, NULL, 0, 52, NULL, NULL),
(98, 'Giường 02', NULL, NULL, 0, 52, NULL, NULL),
(99, 'Giường 03', NULL, NULL, 0, 52, NULL, NULL),
(100, 'Giường 04', NULL, NULL, 0, 52, NULL, NULL),
(101, 'Giường 05', NULL, NULL, 0, 52, NULL, NULL),
(102, 'Giường 06', NULL, NULL, 0, 52, NULL, NULL),
(103, 'Giường 01', NULL, NULL, 0, 61, NULL, NULL),
(104, 'Giường 02', NULL, NULL, 0, 61, NULL, NULL),
(105, 'Giường 03', NULL, NULL, 0, 61, NULL, NULL),
(106, 'Giường 04', NULL, NULL, 0, 61, NULL, NULL),
(107, 'Giường 05', NULL, NULL, 0, 61, NULL, NULL),
(108, 'Giường 06', NULL, NULL, 0, 61, NULL, NULL),
(109, 'Giường 01', NULL, NULL, 0, 62, NULL, NULL),
(110, 'Giường 02', NULL, NULL, 1, 62, NULL, NULL),
(111, 'Giường 03', NULL, NULL, 0, 62, NULL, NULL),
(112, 'Giường 04', NULL, NULL, 0, 62, NULL, NULL),
(113, 'Giường 05', NULL, NULL, 0, 62, NULL, NULL),
(114, 'Giường 06', NULL, NULL, 0, 62, NULL, NULL),
(115, 'Giường 01', NULL, NULL, 0, 71, NULL, NULL),
(116, 'Giường 02', NULL, NULL, 0, 71, NULL, NULL),
(117, 'Giường 03', NULL, NULL, 0, 71, NULL, NULL),
(118, 'Giường 04', NULL, NULL, 0, 71, NULL, NULL),
(119, 'Giường 05', NULL, NULL, 0, 71, NULL, NULL),
(120, 'Giường 06', NULL, NULL, 0, 71, NULL, NULL),
(121, 'Giường 01', NULL, NULL, 0, 72, NULL, NULL),
(122, 'Giường 02', NULL, NULL, 0, 72, NULL, NULL),
(123, 'Giường 03', NULL, NULL, 0, 72, NULL, NULL),
(124, 'Giường 04', NULL, NULL, 0, 72, NULL, NULL),
(125, 'Giường 05', NULL, NULL, 0, 72, NULL, NULL),
(126, 'Giường 06', NULL, NULL, 0, 72, NULL, NULL),
(127, 'Giường 01', NULL, NULL, 0, 81, NULL, NULL),
(128, 'Giường 02', NULL, NULL, 0, 81, NULL, NULL),
(129, 'Giường 03', NULL, NULL, 0, 81, NULL, NULL),
(130, 'Giường 04', NULL, NULL, 0, 81, NULL, NULL),
(131, 'Giường 05', NULL, NULL, 0, 81, NULL, NULL),
(132, 'Giường 06', NULL, NULL, 0, 81, NULL, NULL),
(133, 'Giường 01', NULL, NULL, 0, 82, NULL, NULL),
(134, 'Giường 02', NULL, NULL, 0, 82, NULL, NULL),
(135, 'Giường 03', NULL, NULL, 0, 82, NULL, NULL),
(136, 'Giường 04', NULL, NULL, 0, 82, NULL, NULL),
(137, 'Giường 05', NULL, NULL, 0, 82, NULL, NULL),
(138, 'Giường 06', NULL, NULL, 0, 82, NULL, NULL),
(139, 'Giường 01', NULL, NULL, 0, 91, NULL, NULL),
(140, 'Giường 02', NULL, NULL, 0, 91, NULL, NULL),
(141, 'Giường 03', NULL, NULL, 0, 91, NULL, NULL),
(142, 'Giường 04', NULL, NULL, 0, 91, NULL, NULL),
(143, 'Giường 05', NULL, NULL, 0, 91, NULL, NULL),
(144, 'Giường 06', NULL, NULL, 0, 91, NULL, NULL),
(145, 'Giường 01', NULL, NULL, 0, 92, NULL, NULL),
(146, 'Giường 02', NULL, NULL, 0, 92, NULL, NULL),
(147, 'Giường 03', NULL, NULL, 0, 92, NULL, NULL),
(148, 'Giường 04', NULL, NULL, 0, 92, NULL, NULL),
(149, 'Giường 05', NULL, NULL, 0, 92, NULL, NULL),
(150, 'Giường 06', NULL, NULL, 0, 92, NULL, NULL),
(151, 'Giường 01', NULL, NULL, 0, 4, NULL, NULL),
(152, 'Giường 02', NULL, NULL, 0, 4, NULL, NULL),
(153, 'Giường 03', NULL, NULL, 0, 4, NULL, NULL),
(154, 'Giường 04', NULL, NULL, 0, 4, NULL, NULL),
(155, 'Giường 05', NULL, NULL, 0, 4, NULL, NULL),
(156, 'Giường 06', NULL, NULL, 0, 4, NULL, NULL),
(157, 'Giường 01', NULL, NULL, 0, 5, NULL, NULL),
(158, 'Giường 02', NULL, NULL, 0, 5, NULL, NULL),
(159, 'Giường 03', NULL, NULL, 0, 5, NULL, NULL),
(160, 'Giường 04', NULL, NULL, 0, 5, NULL, NULL),
(161, 'Giường 05', NULL, NULL, 0, 5, NULL, NULL),
(162, 'Giường 06', NULL, NULL, 0, 5, NULL, NULL),
(163, 'Giường 01', NULL, NULL, 0, 14, NULL, NULL),
(164, 'Giường 02', NULL, NULL, 0, 14, NULL, NULL),
(165, 'Giường 03', NULL, NULL, 0, 14, NULL, NULL),
(166, 'Giường 04', NULL, NULL, 0, 14, NULL, NULL),
(167, 'Giường 05', NULL, NULL, 0, 14, NULL, NULL),
(168, 'Giường 06', NULL, NULL, 0, 14, NULL, NULL),
(169, 'Giường 01', NULL, NULL, 0, 15, NULL, NULL),
(170, 'Giường 02', NULL, NULL, 0, 15, NULL, NULL),
(171, 'Giường 03', NULL, NULL, 0, 15, NULL, NULL),
(172, 'Giường 04', NULL, NULL, 0, 15, NULL, NULL),
(173, 'Giường 05', NULL, NULL, 0, 15, NULL, NULL),
(174, 'Giường 06', NULL, NULL, 0, 15, NULL, NULL),
(175, 'Giường 01', NULL, NULL, 0, 24, NULL, NULL),
(176, 'Giường 02', NULL, NULL, 0, 24, NULL, NULL),
(177, 'Giường 03', NULL, NULL, 0, 24, NULL, NULL),
(178, 'Giường 04', NULL, NULL, 0, 24, NULL, NULL),
(179, 'Giường 05', NULL, NULL, 0, 24, NULL, NULL),
(180, 'Giường 06', NULL, NULL, 0, 24, NULL, NULL),
(181, 'Giường 01', NULL, NULL, 0, 25, NULL, NULL),
(182, 'Giường 02', NULL, NULL, 0, 25, NULL, NULL),
(183, 'Giường 03', NULL, NULL, 0, 25, NULL, NULL),
(184, 'Giường 04', NULL, NULL, 0, 25, NULL, NULL),
(185, 'Giường 05', NULL, NULL, 0, 25, NULL, NULL),
(186, 'Giường 06', NULL, NULL, 0, 25, NULL, NULL),
(187, 'Giường 01', NULL, NULL, 0, 34, NULL, NULL),
(188, 'Giường 02', NULL, NULL, 0, 34, NULL, NULL),
(189, 'Giường 03', NULL, NULL, 0, 34, NULL, NULL),
(190, 'Giường 04', NULL, NULL, 0, 34, NULL, NULL),
(191, 'Giường 05', NULL, NULL, 0, 34, NULL, NULL),
(192, 'Giường 06', NULL, NULL, 0, 34, NULL, NULL),
(193, 'Giường 01', NULL, NULL, 0, 35, NULL, NULL),
(194, 'Giường 02', NULL, NULL, 0, 35, NULL, NULL),
(195, 'Giường 03', NULL, NULL, 0, 35, NULL, NULL),
(196, 'Giường 04', NULL, NULL, 0, 35, NULL, NULL),
(197, 'Giường 05', NULL, NULL, 0, 35, NULL, NULL),
(198, 'Giường 06', NULL, NULL, 0, 35, NULL, NULL),
(199, 'Giường 01', NULL, NULL, 0, 44, NULL, NULL),
(200, 'Giường 02', NULL, NULL, 0, 44, NULL, NULL),
(201, 'Giường 03', NULL, NULL, 0, 44, NULL, NULL),
(202, 'Giường 04', NULL, NULL, 0, 44, NULL, NULL),
(203, 'Giường 05', NULL, NULL, 0, 44, NULL, NULL),
(204, 'Giường 06', NULL, NULL, 0, 44, NULL, NULL),
(205, 'Giường 01', NULL, NULL, 0, 45, NULL, NULL),
(206, 'Giường 02', NULL, NULL, 0, 45, NULL, NULL),
(207, 'Giường 03', NULL, NULL, 0, 45, NULL, NULL),
(208, 'Giường 04', NULL, NULL, 0, 45, NULL, NULL),
(209, 'Giường 05', NULL, NULL, 0, 45, NULL, NULL),
(210, 'Giường 06', NULL, NULL, 0, 45, NULL, NULL),
(211, 'Giường 01', NULL, NULL, 0, 53, NULL, NULL),
(212, 'Giường 02', NULL, NULL, 0, 53, NULL, NULL),
(213, 'Giường 03', NULL, NULL, 0, 53, NULL, NULL),
(214, 'Giường 04', NULL, NULL, 0, 53, NULL, NULL),
(215, 'Giường 05', NULL, NULL, 0, 53, NULL, NULL),
(216, 'Giường 06', NULL, NULL, 0, 53, NULL, NULL),
(217, 'Giường 01', NULL, NULL, 0, 54, NULL, NULL),
(218, 'Giường 02', NULL, NULL, 0, 54, NULL, NULL),
(219, 'Giường 03', NULL, NULL, 0, 54, NULL, NULL),
(220, 'Giường 04', NULL, NULL, 0, 54, NULL, NULL),
(221, 'Giường 05', NULL, NULL, 0, 54, NULL, NULL),
(222, 'Giường 06', NULL, NULL, 0, 54, NULL, NULL),
(223, 'Giường 01', NULL, NULL, 0, 55, NULL, NULL),
(224, 'Giường 02', NULL, NULL, 0, 55, NULL, NULL),
(225, 'Giường 03', NULL, NULL, 0, 55, NULL, NULL),
(226, 'Giường 04', NULL, NULL, 0, 55, NULL, NULL),
(227, 'Giường 05', NULL, NULL, 0, 55, NULL, NULL),
(228, 'Giường 06', NULL, NULL, 0, 55, NULL, NULL),
(229, 'Giường 01', NULL, NULL, 0, 63, NULL, NULL),
(230, 'Giường 02', NULL, NULL, 0, 63, NULL, NULL),
(231, 'Giường 03', NULL, NULL, 0, 63, NULL, NULL),
(232, 'Giường 04', NULL, NULL, 0, 63, NULL, NULL),
(233, 'Giường 05', NULL, NULL, 0, 63, NULL, NULL),
(234, 'Giường 06', NULL, NULL, 0, 63, NULL, NULL),
(235, 'Giường 01', NULL, NULL, 0, 64, NULL, NULL),
(236, 'Giường 02', NULL, NULL, 0, 64, NULL, NULL),
(237, 'Giường 03', NULL, NULL, 0, 64, NULL, NULL),
(238, 'Giường 04', NULL, NULL, 0, 64, NULL, NULL),
(239, 'Giường 05', NULL, NULL, 0, 64, NULL, NULL),
(240, 'Giường 06', NULL, NULL, 0, 64, NULL, NULL),
(241, 'Giường 01', NULL, NULL, 0, 65, NULL, NULL),
(242, 'Giường 02', NULL, NULL, 0, 65, NULL, NULL),
(243, 'Giường 03', NULL, NULL, 0, 65, NULL, NULL),
(244, 'Giường 04', NULL, NULL, 0, 65, NULL, NULL),
(245, 'Giường 05', NULL, NULL, 0, 65, NULL, NULL),
(246, 'Giường 06', NULL, NULL, 0, 65, NULL, NULL),
(247, 'Giường 01', NULL, NULL, 0, 73, NULL, NULL),
(248, 'Giường 02', NULL, NULL, 1, 73, NULL, NULL),
(249, 'Giường 03', NULL, NULL, 0, 73, NULL, NULL),
(250, 'Giường 04', NULL, NULL, 0, 73, NULL, NULL),
(251, 'Giường 05', NULL, NULL, 0, 73, NULL, NULL),
(252, 'Giường 06', NULL, NULL, 0, 73, NULL, NULL),
(253, 'Giường 01', NULL, NULL, 0, 74, NULL, NULL),
(254, 'Giường 02', NULL, NULL, 0, 74, NULL, NULL),
(255, 'Giường 03', NULL, NULL, 0, 74, NULL, NULL),
(256, 'Giường 04', NULL, NULL, 0, 74, NULL, '2021-01-14 16:25:02'),
(257, 'Giường 05', NULL, NULL, 0, 74, NULL, NULL),
(258, 'Giường 06', NULL, NULL, 0, 74, NULL, NULL),
(259, 'Giường 01', NULL, NULL, 0, 75, NULL, NULL),
(260, 'Giường 02', NULL, NULL, 0, 75, NULL, NULL),
(261, 'Giường 03', NULL, NULL, 0, 75, NULL, NULL),
(262, 'Giường 04', NULL, NULL, 0, 75, NULL, NULL),
(263, 'Giường 05', NULL, NULL, 0, 75, NULL, NULL),
(264, 'Giường 06', NULL, NULL, 0, 75, NULL, NULL),
(265, 'Giường 01', NULL, NULL, 0, 83, NULL, NULL),
(266, 'Giường 02', NULL, NULL, 0, 83, NULL, NULL),
(267, 'Giường 03', NULL, NULL, 0, 83, NULL, NULL),
(268, 'Giường 04', NULL, NULL, 0, 83, NULL, NULL),
(269, 'Giường 05', NULL, NULL, 0, 83, NULL, NULL),
(270, 'Giường 06', NULL, NULL, 0, 83, NULL, NULL),
(271, 'Giường 01', NULL, NULL, 0, 84, NULL, NULL),
(272, 'Giường 02', NULL, NULL, 1, 84, NULL, NULL),
(273, 'Giường 03', NULL, NULL, 0, 84, NULL, NULL),
(274, 'Giường 04', NULL, NULL, 0, 84, NULL, NULL),
(275, 'Giường 05', NULL, NULL, 0, 84, NULL, NULL),
(276, 'Giường 06', NULL, NULL, 0, 84, NULL, NULL),
(277, 'Giường 01', NULL, NULL, 0, 85, NULL, NULL),
(278, 'Giường 02', NULL, NULL, 0, 85, NULL, NULL),
(279, 'Giường 03', NULL, NULL, 0, 85, NULL, NULL),
(280, 'Giường 04', NULL, NULL, 0, 85, NULL, NULL),
(281, 'Giường 05', NULL, NULL, 0, 85, NULL, NULL),
(282, 'Giường 06', NULL, NULL, 0, 85, NULL, NULL),
(283, 'Giường 01', NULL, NULL, 0, 93, NULL, NULL),
(284, 'Giường 02', NULL, NULL, 0, 93, NULL, NULL),
(285, 'Giường 03', NULL, NULL, 0, 93, NULL, NULL),
(286, 'Giường 04', NULL, NULL, 0, 93, NULL, NULL),
(287, 'Giường 05', NULL, NULL, 0, 93, NULL, NULL),
(288, 'Giường 06', NULL, NULL, 0, 93, NULL, NULL),
(289, 'Giường 01', NULL, NULL, 0, 94, NULL, NULL),
(290, 'Giường 02', NULL, NULL, 0, 94, NULL, NULL),
(291, 'Giường 03', NULL, NULL, 0, 94, NULL, NULL),
(292, 'Giường 04', NULL, NULL, 0, 94, NULL, NULL),
(293, 'Giường 05', NULL, NULL, 0, 94, NULL, NULL),
(294, 'Giường 06', NULL, NULL, 0, 94, NULL, NULL),
(295, 'Giường 01', NULL, NULL, 0, 95, NULL, NULL),
(296, 'Giường 02', NULL, NULL, 0, 95, NULL, NULL),
(297, 'Giường 03', NULL, NULL, 0, 95, NULL, NULL),
(298, 'Giường 04', NULL, NULL, 0, 95, NULL, NULL),
(299, 'Giường 05', NULL, NULL, 0, 95, NULL, NULL),
(300, 'Giường 06', NULL, NULL, 0, 95, NULL, NULL),
(301, 'Giường 01', NULL, NULL, 0, 6, NULL, NULL),
(302, 'Giường 02', NULL, NULL, 0, 6, NULL, NULL),
(303, 'Giường 03', NULL, NULL, 0, 6, NULL, NULL),
(304, 'Giường 04', NULL, NULL, 0, 6, NULL, NULL),
(305, 'Giường 05', NULL, NULL, 0, 6, NULL, NULL),
(306, 'Giường 06', NULL, NULL, 0, 6, NULL, NULL),
(307, 'Giường 01', NULL, NULL, 0, 7, NULL, NULL),
(308, 'Giường 02', NULL, NULL, 0, 7, NULL, NULL),
(309, 'Giường 03', NULL, NULL, 0, 7, NULL, NULL),
(310, 'Giường 04', NULL, NULL, 0, 7, NULL, NULL),
(311, 'Giường 05', NULL, NULL, 0, 7, NULL, NULL),
(312, 'Giường 06', NULL, NULL, 0, 7, NULL, NULL),
(313, 'Giường 01', NULL, NULL, 0, 8, NULL, NULL),
(314, 'Giường 02', NULL, NULL, 0, 8, NULL, NULL),
(315, 'Giường 03', NULL, NULL, 0, 8, NULL, NULL),
(316, 'Giường 04', NULL, NULL, 0, 8, NULL, NULL),
(317, 'Giường 05', NULL, NULL, 0, 8, NULL, NULL),
(318, 'Giường 06', NULL, NULL, 0, 8, NULL, NULL),
(319, 'Giường 01', NULL, NULL, 0, 16, NULL, NULL),
(320, 'Giường 02', NULL, NULL, 0, 16, NULL, NULL),
(321, 'Giường 03', NULL, NULL, 0, 16, NULL, NULL),
(322, 'Giường 04', NULL, NULL, 0, 16, NULL, NULL),
(323, 'Giường 05', NULL, NULL, 0, 16, NULL, NULL),
(324, 'Giường 06', NULL, NULL, 0, 16, NULL, NULL),
(325, 'Giường 01', NULL, NULL, 0, 17, NULL, NULL),
(326, 'Giường 02', NULL, NULL, 0, 17, NULL, NULL),
(327, 'Giường 03', NULL, NULL, 0, 17, NULL, NULL),
(328, 'Giường 04', NULL, NULL, 0, 17, NULL, NULL),
(329, 'Giường 05', NULL, NULL, 0, 17, NULL, NULL),
(330, 'Giường 06', NULL, NULL, 0, 17, NULL, NULL),
(331, 'Giường 01', NULL, NULL, 0, 18, NULL, NULL),
(332, 'Giường 02', NULL, NULL, 0, 18, NULL, NULL),
(333, 'Giường 03', NULL, NULL, 0, 18, NULL, NULL),
(334, 'Giường 04', NULL, NULL, 0, 18, NULL, NULL),
(335, 'Giường 05', NULL, NULL, 0, 18, NULL, NULL),
(336, 'Giường 06', NULL, NULL, 0, 18, NULL, NULL),
(337, 'Giường 01', NULL, NULL, 0, 26, NULL, NULL),
(338, 'Giường 02', NULL, NULL, 0, 26, NULL, NULL),
(339, 'Giường 03', NULL, NULL, 0, 26, NULL, NULL),
(340, 'Giường 04', NULL, NULL, 0, 26, NULL, NULL),
(341, 'Giường 05', NULL, NULL, 0, 26, NULL, NULL),
(342, 'Giường 06', NULL, NULL, 0, 26, NULL, NULL),
(343, 'Giường 01', NULL, NULL, 0, 27, NULL, NULL),
(344, 'Giường 02', NULL, NULL, 0, 27, NULL, NULL),
(345, 'Giường 03', NULL, NULL, 0, 27, NULL, NULL),
(346, 'Giường 04', NULL, NULL, 0, 27, NULL, NULL),
(347, 'Giường 05', NULL, NULL, 0, 27, NULL, NULL),
(348, 'Giường 06', NULL, NULL, 0, 27, NULL, NULL),
(349, 'Giường 01', NULL, NULL, 0, 28, NULL, NULL),
(350, 'Giường 02', NULL, NULL, 0, 28, NULL, NULL),
(351, 'Giường 03', NULL, NULL, 0, 28, NULL, NULL),
(352, 'Giường 04', NULL, NULL, 0, 28, NULL, NULL),
(353, 'Giường 05', NULL, NULL, 0, 28, NULL, NULL),
(354, 'Giường 06', NULL, NULL, 0, 28, NULL, NULL),
(355, 'Giường 01', NULL, NULL, 0, 36, NULL, NULL),
(356, 'Giường 02', NULL, NULL, 0, 36, NULL, NULL),
(357, 'Giường 03', NULL, NULL, 0, 36, NULL, NULL),
(358, 'Giường 04', NULL, NULL, 0, 36, NULL, NULL),
(359, 'Giường 05', NULL, NULL, 0, 36, NULL, NULL),
(360, 'Giường 06', NULL, NULL, 0, 36, NULL, NULL),
(361, 'Giường 01', NULL, NULL, 0, 37, NULL, NULL),
(362, 'Giường 02', NULL, NULL, 0, 37, NULL, NULL),
(363, 'Giường 03', NULL, NULL, 0, 37, NULL, NULL),
(364, 'Giường 04', NULL, NULL, 0, 37, NULL, NULL),
(365, 'Giường 05', NULL, NULL, 0, 37, NULL, NULL),
(366, 'Giường 06', NULL, NULL, 0, 37, NULL, NULL),
(367, 'Giường 01', NULL, NULL, 0, 38, NULL, NULL),
(368, 'Giường 02', NULL, NULL, 0, 38, NULL, NULL),
(369, 'Giường 03', NULL, NULL, 0, 38, NULL, NULL),
(370, 'Giường 04', NULL, NULL, 0, 38, NULL, NULL),
(371, 'Giường 05', NULL, NULL, 0, 38, NULL, NULL),
(372, 'Giường 06', NULL, NULL, 0, 38, NULL, NULL),
(373, 'Giường 01', NULL, NULL, 0, 46, NULL, NULL),
(374, 'Giường 02', NULL, NULL, 0, 46, NULL, NULL),
(375, 'Giường 03', NULL, NULL, 0, 46, NULL, NULL),
(376, 'Giường 04', NULL, NULL, 0, 46, NULL, NULL),
(377, 'Giường 05', NULL, NULL, 0, 46, NULL, NULL),
(378, 'Giường 06', NULL, NULL, 0, 46, NULL, '2020-12-20 15:23:42'),
(379, 'Giường 01', NULL, NULL, 0, 47, NULL, NULL),
(380, 'Giường 02', NULL, NULL, 0, 47, NULL, NULL),
(381, 'Giường 03', NULL, NULL, 0, 47, NULL, NULL),
(382, 'Giường 04', NULL, NULL, 0, 47, NULL, NULL),
(383, 'Giường 05', NULL, NULL, 0, 47, NULL, NULL),
(384, 'Giường 06', NULL, NULL, 0, 47, NULL, NULL),
(385, 'Giường 01', NULL, NULL, 0, 48, NULL, NULL),
(386, 'Giường 02', NULL, NULL, 0, 48, NULL, NULL),
(387, 'Giường 03', NULL, NULL, 0, 48, NULL, NULL),
(388, 'Giường 04', NULL, NULL, 0, 48, NULL, NULL),
(389, 'Giường 05', NULL, NULL, 0, 48, NULL, NULL),
(390, 'Giường 06', NULL, NULL, 0, 48, NULL, NULL),
(391, 'Giường 01', NULL, NULL, 0, 56, NULL, NULL),
(392, 'Giường 02', NULL, NULL, 0, 56, NULL, NULL),
(393, 'Giường 03', NULL, NULL, 0, 56, NULL, NULL),
(394, 'Giường 04', NULL, NULL, 0, 56, NULL, NULL),
(395, 'Giường 05', NULL, NULL, 0, 56, NULL, NULL),
(396, 'Giường 06', NULL, NULL, 0, 56, NULL, NULL),
(397, 'Giường 01', NULL, NULL, 0, 57, NULL, NULL),
(398, 'Giường 02', NULL, NULL, 0, 57, NULL, NULL),
(399, 'Giường 03', NULL, NULL, 0, 57, NULL, NULL),
(400, 'Giường 04', NULL, NULL, 0, 57, NULL, NULL),
(401, 'Giường 05', NULL, NULL, 0, 57, NULL, NULL),
(402, 'Giường 06', NULL, NULL, 0, 57, NULL, NULL),
(403, 'Giường 01', NULL, NULL, 0, 66, NULL, NULL),
(404, 'Giường 02', NULL, NULL, 0, 66, NULL, NULL),
(405, 'Giường 03', NULL, NULL, 0, 66, NULL, NULL),
(406, 'Giường 04', NULL, NULL, 0, 66, NULL, NULL),
(407, 'Giường 05', NULL, NULL, 0, 66, NULL, NULL),
(408, 'Giường 06', NULL, NULL, 0, 66, NULL, NULL),
(409, 'Giường 01', NULL, NULL, 0, 67, NULL, NULL),
(410, 'Giường 02', NULL, NULL, 0, 67, NULL, NULL),
(411, 'Giường 03', NULL, NULL, 0, 67, NULL, NULL),
(412, 'Giường 04', NULL, NULL, 0, 67, NULL, NULL),
(413, 'Giường 05', NULL, NULL, 0, 67, NULL, NULL),
(414, 'Giường 06', NULL, NULL, 0, 67, NULL, NULL),
(415, 'Giường 01', NULL, NULL, 0, 76, NULL, NULL),
(416, 'Giường 02', NULL, NULL, 0, 76, NULL, NULL),
(417, 'Giường 03', NULL, NULL, 0, 76, NULL, NULL),
(418, 'Giường 04', NULL, NULL, 0, 76, NULL, NULL),
(419, 'Giường 05', NULL, NULL, 0, 76, NULL, NULL),
(420, 'Giường 06', NULL, NULL, 0, 76, NULL, NULL),
(421, 'Giường 01', NULL, NULL, 0, 77, NULL, NULL),
(422, 'Giường 02', NULL, NULL, 0, 77, NULL, NULL),
(423, 'Giường 03', NULL, NULL, 1, 77, NULL, NULL),
(424, 'Giường 04', NULL, NULL, 0, 77, NULL, NULL),
(425, 'Giường 05', NULL, NULL, 0, 77, NULL, NULL),
(426, 'Giường 06', NULL, NULL, 0, 77, NULL, NULL),
(427, 'Giường 01', NULL, NULL, 0, 86, NULL, NULL),
(428, 'Giường 02', NULL, NULL, 0, 86, NULL, NULL),
(429, 'Giường 03', NULL, NULL, 0, 86, NULL, NULL),
(430, 'Giường 04', NULL, NULL, 0, 86, NULL, NULL),
(431, 'Giường 05', NULL, NULL, 0, 86, NULL, NULL),
(432, 'Giường 06', NULL, NULL, 0, 86, NULL, NULL),
(433, 'Giường 01', NULL, NULL, 0, 87, NULL, NULL),
(434, 'Giường 02', NULL, NULL, 0, 87, NULL, NULL),
(435, 'Giường 03', NULL, NULL, 0, 87, NULL, NULL),
(436, 'Giường 04', NULL, NULL, 0, 87, NULL, NULL),
(437, 'Giường 05', NULL, NULL, 0, 87, NULL, NULL),
(438, 'Giường 06', NULL, NULL, 0, 87, NULL, NULL),
(439, 'Giường 01', NULL, NULL, 0, 96, NULL, NULL),
(440, 'Giường 02', NULL, NULL, 0, 96, NULL, NULL),
(441, 'Giường 03', NULL, NULL, 0, 96, NULL, NULL),
(442, 'Giường 04', NULL, NULL, 0, 96, NULL, NULL),
(443, 'Giường 05', NULL, NULL, 0, 96, NULL, NULL),
(444, 'Giường 06', NULL, NULL, 0, 96, NULL, NULL),
(445, 'Giường 01', NULL, NULL, 0, 97, NULL, NULL),
(446, 'Giường 02', NULL, NULL, 0, 97, NULL, NULL),
(447, 'Giường 03', NULL, NULL, 0, 97, NULL, NULL),
(448, 'Giường 04', NULL, NULL, 0, 97, NULL, NULL),
(449, 'Giường 05', NULL, NULL, 0, 97, NULL, NULL),
(450, 'Giường 06', NULL, NULL, 0, 97, NULL, NULL),
(451, 'Giường 01', NULL, NULL, 0, 9, NULL, NULL),
(452, 'Giường 02', NULL, NULL, 0, 9, NULL, NULL),
(453, 'Giường 03', NULL, NULL, 0, 9, NULL, NULL),
(454, 'Giường 04', NULL, NULL, 0, 9, NULL, NULL),
(455, 'Giường 05', NULL, NULL, 0, 9, NULL, NULL),
(456, 'Giường 06', NULL, NULL, 0, 9, NULL, NULL),
(457, 'Giường 01', NULL, NULL, 0, 10, NULL, NULL),
(458, 'Giường 02', NULL, NULL, 0, 10, NULL, NULL),
(459, 'Giường 03', NULL, NULL, 0, 10, NULL, NULL),
(460, 'Giường 04', NULL, NULL, 0, 10, NULL, NULL),
(461, 'Giường 05', NULL, NULL, 0, 10, NULL, NULL),
(462, 'Giường 06', NULL, NULL, 0, 10, NULL, NULL),
(463, 'Giường 01', NULL, NULL, 0, 19, NULL, NULL),
(464, 'Giường 02', NULL, NULL, 0, 19, NULL, NULL),
(465, 'Giường 03', NULL, NULL, 0, 19, NULL, NULL),
(466, 'Giường 04', NULL, NULL, 0, 19, NULL, NULL),
(467, 'Giường 05', NULL, NULL, 0, 19, NULL, NULL),
(468, 'Giường 06', NULL, NULL, 0, 19, NULL, NULL),
(469, 'Giường 01', NULL, NULL, 0, 20, NULL, NULL),
(470, 'Giường 02', NULL, NULL, 0, 20, NULL, NULL),
(471, 'Giường 03', NULL, NULL, 0, 20, NULL, NULL),
(472, 'Giường 04', NULL, NULL, 0, 20, NULL, NULL),
(473, 'Giường 05', NULL, NULL, 0, 20, NULL, NULL),
(474, 'Giường 06', NULL, NULL, 0, 20, NULL, NULL),
(475, 'Giường 01', NULL, NULL, 0, 29, NULL, NULL),
(476, 'Giường 02', NULL, NULL, 0, 29, NULL, NULL),
(477, 'Giường 03', NULL, NULL, 0, 29, NULL, NULL),
(478, 'Giường 04', NULL, NULL, 0, 29, NULL, NULL),
(479, 'Giường 05', NULL, NULL, 0, 29, NULL, NULL),
(480, 'Giường 06', NULL, NULL, 0, 29, NULL, NULL),
(481, 'Giường 01', NULL, NULL, 0, 30, NULL, NULL),
(482, 'Giường 02', NULL, NULL, 0, 30, NULL, NULL),
(483, 'Giường 03', NULL, NULL, 0, 30, NULL, NULL),
(484, 'Giường 04', NULL, NULL, 0, 30, NULL, NULL),
(485, 'Giường 05', NULL, NULL, 0, 30, NULL, NULL),
(486, 'Giường 06', NULL, NULL, 0, 30, NULL, NULL),
(487, 'Giường 01', NULL, NULL, 0, 39, NULL, NULL),
(488, 'Giường 02', NULL, NULL, 0, 39, NULL, NULL),
(489, 'Giường 03', NULL, NULL, 0, 39, NULL, NULL),
(490, 'Giường 04', NULL, NULL, 0, 39, NULL, NULL),
(491, 'Giường 05', NULL, NULL, 0, 39, NULL, NULL),
(492, 'Giường 06', NULL, NULL, 0, 39, NULL, NULL),
(493, 'Giường 01', NULL, NULL, 0, 40, NULL, NULL),
(494, 'Giường 02', NULL, NULL, 0, 40, NULL, NULL),
(495, 'Giường 03', NULL, NULL, 0, 40, NULL, NULL),
(496, 'Giường 04', NULL, NULL, 0, 40, NULL, NULL),
(497, 'Giường 05', NULL, NULL, 0, 40, NULL, NULL),
(498, 'Giường 06', NULL, NULL, 0, 40, NULL, NULL),
(499, 'Giường 01', NULL, NULL, 0, 49, NULL, NULL),
(500, 'Giường 02', NULL, NULL, 0, 49, NULL, NULL),
(501, 'Giường 03', NULL, NULL, 0, 49, NULL, NULL),
(502, 'Giường 04', NULL, NULL, 0, 49, NULL, NULL),
(503, 'Giường 05', NULL, NULL, 0, 49, NULL, NULL),
(504, 'Giường 06', NULL, NULL, 0, 49, NULL, NULL),
(505, 'Giường 01', NULL, NULL, 0, 50, NULL, NULL),
(506, 'Giường 02', NULL, NULL, 0, 50, NULL, NULL),
(507, 'Giường 03', NULL, NULL, 0, 50, NULL, NULL),
(508, 'Giường 04', NULL, NULL, 0, 50, NULL, NULL),
(509, 'Giường 05', NULL, NULL, 0, 50, NULL, NULL),
(510, 'Giường 06', NULL, NULL, 0, 50, NULL, NULL),
(511, 'Giường 01', NULL, NULL, 0, 58, NULL, NULL),
(512, 'Giường 02', NULL, NULL, 0, 58, NULL, NULL),
(513, 'Giường 03', NULL, NULL, 0, 58, NULL, NULL),
(514, 'Giường 04', NULL, NULL, 0, 58, NULL, NULL),
(515, 'Giường 05', NULL, NULL, 0, 58, NULL, NULL),
(516, 'Giường 06', NULL, NULL, 0, 58, NULL, NULL),
(517, 'Giường 01', NULL, NULL, 0, 59, NULL, NULL),
(518, 'Giường 02', NULL, NULL, 0, 59, NULL, NULL),
(519, 'Giường 03', NULL, NULL, 0, 59, NULL, NULL),
(520, 'Giường 04', NULL, NULL, 0, 59, NULL, NULL),
(521, 'Giường 05', NULL, NULL, 0, 59, NULL, NULL),
(522, 'Giường 06', NULL, NULL, 0, 59, NULL, NULL),
(523, 'Giường 01', NULL, NULL, 0, 60, NULL, NULL),
(524, 'Giường 02', NULL, NULL, 0, 60, NULL, NULL),
(525, 'Giường 03', NULL, NULL, 0, 60, NULL, NULL),
(526, 'Giường 04', NULL, NULL, 0, 60, NULL, NULL),
(527, 'Giường 05', NULL, NULL, 1, 60, NULL, NULL),
(528, 'Giường 06', NULL, NULL, 0, 60, NULL, NULL),
(529, 'Giường 01', NULL, NULL, 0, 68, NULL, NULL),
(530, 'Giường 02', NULL, NULL, 0, 68, NULL, NULL),
(531, 'Giường 03', NULL, NULL, 0, 68, NULL, NULL),
(532, 'Giường 04', NULL, NULL, 0, 68, NULL, NULL),
(533, 'Giường 05', NULL, NULL, 0, 68, NULL, NULL),
(534, 'Giường 06', NULL, NULL, 0, 68, NULL, NULL),
(535, 'Giường 01', NULL, NULL, 0, 69, NULL, NULL),
(536, 'Giường 02', NULL, NULL, 0, 69, NULL, NULL),
(537, 'Giường 03', NULL, NULL, 0, 69, NULL, NULL),
(538, 'Giường 04', NULL, NULL, 0, 69, NULL, NULL),
(539, 'Giường 05', NULL, NULL, 0, 69, NULL, NULL),
(540, 'Giường 06', NULL, NULL, 0, 69, NULL, NULL),
(541, 'Giường 01', NULL, NULL, 0, 70, NULL, NULL),
(542, 'Giường 02', NULL, NULL, 0, 70, NULL, NULL),
(543, 'Giường 03', NULL, NULL, 0, 70, NULL, NULL),
(544, 'Giường 04', NULL, NULL, 0, 70, NULL, NULL),
(545, 'Giường 05', NULL, NULL, 0, 70, NULL, NULL),
(546, 'Giường 06', NULL, NULL, 0, 70, NULL, NULL),
(547, 'Giường 01', NULL, NULL, 0, 78, NULL, NULL),
(548, 'Giường 02', NULL, NULL, 0, 78, NULL, NULL),
(549, 'Giường 03', NULL, NULL, 0, 78, NULL, NULL),
(550, 'Giường 04', NULL, NULL, 0, 78, NULL, NULL),
(551, 'Giường 05', NULL, NULL, 0, 78, NULL, NULL),
(552, 'Giường 06', NULL, NULL, 0, 78, NULL, NULL),
(553, 'Giường 01', NULL, NULL, 0, 79, NULL, NULL),
(554, 'Giường 02', NULL, NULL, 0, 79, NULL, NULL),
(555, 'Giường 03', NULL, NULL, 0, 79, NULL, NULL),
(556, 'Giường 04', NULL, NULL, 0, 79, NULL, NULL),
(557, 'Giường 05', NULL, NULL, 0, 79, NULL, NULL),
(558, 'Giường 06', NULL, NULL, 0, 79, NULL, NULL),
(559, 'Giường 01', NULL, NULL, 0, 80, NULL, NULL),
(560, 'Giường 02', NULL, NULL, 0, 80, NULL, NULL),
(561, 'Giường 03', NULL, NULL, 0, 80, NULL, NULL),
(562, 'Giường 04', NULL, NULL, 0, 80, NULL, NULL),
(563, 'Giường 05', NULL, NULL, 0, 80, NULL, NULL),
(564, 'Giường 06', NULL, NULL, 0, 80, NULL, NULL),
(565, 'Giường 01', NULL, NULL, 0, 88, NULL, NULL),
(566, 'Giường 02', NULL, NULL, 0, 88, NULL, NULL),
(567, 'Giường 03', NULL, NULL, 0, 88, NULL, NULL),
(568, 'Giường 04', NULL, NULL, 0, 88, NULL, NULL),
(569, 'Giường 05', NULL, NULL, 0, 88, NULL, NULL),
(570, 'Giường 06', NULL, NULL, 0, 88, NULL, NULL),
(571, 'Giường 01', NULL, NULL, 0, 89, NULL, NULL),
(572, 'Giường 02', NULL, NULL, 0, 89, NULL, NULL),
(573, 'Giường 03', NULL, NULL, 0, 89, NULL, NULL),
(574, 'Giường 04', NULL, NULL, 0, 89, NULL, NULL),
(575, 'Giường 05', NULL, NULL, 0, 89, NULL, NULL),
(576, 'Giường 06', NULL, NULL, 0, 89, NULL, NULL),
(577, 'Giường 01', NULL, NULL, 0, 90, NULL, NULL),
(578, 'Giường 02', NULL, NULL, 0, 90, NULL, NULL),
(579, 'Giường 03', NULL, NULL, 0, 90, NULL, NULL),
(580, 'Giường 04', NULL, NULL, 0, 90, NULL, NULL),
(581, 'Giường 05', NULL, NULL, 0, 90, NULL, NULL),
(582, 'Giường 06', NULL, NULL, 0, 90, NULL, NULL),
(583, 'Giường 01', NULL, NULL, 0, 98, NULL, NULL),
(584, 'Giường 02', NULL, NULL, 0, 98, NULL, NULL),
(585, 'Giường 03', NULL, NULL, 0, 98, NULL, NULL),
(586, 'Giường 04', NULL, NULL, 0, 98, NULL, NULL),
(587, 'Giường 05', NULL, NULL, 0, 98, NULL, NULL),
(588, 'Giường 06', NULL, NULL, 0, 98, NULL, NULL),
(589, 'Giường 01', NULL, NULL, 0, 99, NULL, NULL),
(590, 'Giường 02', NULL, NULL, 0, 99, NULL, NULL),
(591, 'Giường 03', NULL, NULL, 0, 99, NULL, NULL),
(592, 'Giường 04', NULL, NULL, 0, 99, NULL, NULL),
(593, 'Giường 05', NULL, NULL, 0, 99, NULL, NULL),
(594, 'Giường 06', NULL, NULL, 0, 99, NULL, NULL),
(595, 'Giường 01', NULL, NULL, 0, 100, NULL, NULL),
(596, 'Giường 02', NULL, NULL, 0, 100, NULL, NULL),
(597, 'Giường 03', NULL, NULL, 0, 100, NULL, NULL),
(598, 'Giường 04', NULL, NULL, 0, 100, NULL, NULL),
(599, 'Giường 05', NULL, NULL, 0, 100, NULL, NULL),
(600, 'Giường 06', NULL, NULL, 1, 100, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khu`
--

CREATE TABLE `khu` (
  `id` int(10) UNSIGNED NOT NULL,
  `khu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khu`
--

INSERT INTO `khu` (`id`, `khu`, `created_at`, `updated_at`) VALUES
(1, 'Khu Nam', NULL, NULL),
(2, 'Khu Nữ', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(64, '2014_10_12_000000_create_users_table', 1),
(65, '2014_10_12_100000_create_password_resets_table', 1),
(66, '2019_08_19_000000_create_failed_jobs_table', 1),
(67, '2020_12_16_085851_create__khu_table', 1),
(68, '2020_12_16_085921_create__tang_table', 1),
(69, '2020_12_16_085947_create__phong_table', 1),
(70, '2020_12_16_090006_create__giuong_table', 1),
(71, '2020_12_16_090050_create__sinh_vien_table', 1),
(72, '2020_12_16_093000_create_dien_website_table', 1),
(73, '2020_12_16_100921_create_nguoi-ngoai-truong_table', 1),
(74, '2020_12_16_140023_create_tien_nuoc_table', 1),
(75, '2020_12_16_140040_create_tien_dien_table', 1),
(76, '2020_12_26_201041_verify_s_v', 2),
(77, '2020_12_26_201309_verify_thue', 3),
(78, '2021_01_05_055515_create_thong_bao_table', 4),
(79, '2021_01_05_132322_create_thong_baosv_table', 5),
(80, '2021_01_06_142544_create_thong_baosv_file_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `id` int(10) UNSIGNED NOT NULL,
  `phong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoatdong` int(11) DEFAULT 0,
  `phi` int(11) DEFAULT NULL,
  `id_tang` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`id`, `phong`, `hoatdong`, `phi`, `id_tang`, `created_at`, `updated_at`) VALUES
(1, 'Phòng 01', 1, NULL, 1, NULL, NULL),
(2, 'Phòng 02', 0, NULL, 1, NULL, '2020-12-30 15:53:07'),
(3, 'Phòng 03', 0, NULL, 1, NULL, '2020-12-26 07:07:36'),
(4, 'Phòng 04', 0, NULL, 1, NULL, NULL),
(5, 'Phòng 05', 0, NULL, 1, NULL, NULL),
(6, 'Phòng 06', 0, NULL, 1, NULL, NULL),
(7, 'Phòng 07', 0, NULL, 1, NULL, NULL),
(8, 'Phòng 08', 0, NULL, 1, NULL, NULL),
(9, 'Phòng 09', 0, NULL, 1, NULL, NULL),
(10, 'Phòng 10', 0, NULL, 1, NULL, NULL),
(11, 'Phòng 01', 1, NULL, 6, NULL, NULL),
(12, 'Phòng 02', 0, NULL, 6, NULL, '2020-12-30 10:22:57'),
(13, 'Phòng 03', 0, NULL, 6, NULL, NULL),
(14, 'Phòng 04', 0, NULL, 6, NULL, NULL),
(15, 'Phòng 05', 0, NULL, 6, NULL, NULL),
(16, 'Phòng 06', 0, NULL, 6, NULL, NULL),
(17, 'Phòng 07', 0, NULL, 6, NULL, NULL),
(18, 'Phòng 08', 0, NULL, 6, NULL, NULL),
(19, 'Phòng 09', 0, NULL, 6, NULL, NULL),
(20, 'Phòng 10', 0, NULL, 6, NULL, NULL),
(21, 'Phòng 01', 1, NULL, 2, NULL, NULL),
(22, 'Phòng 02', 0, NULL, 2, NULL, NULL),
(23, 'Phòng 03', 0, NULL, 2, NULL, NULL),
(24, 'Phòng 04', 0, NULL, 2, NULL, NULL),
(25, 'Phòng 05', 0, NULL, 2, NULL, NULL),
(26, 'Phòng 06', 0, NULL, 2, NULL, NULL),
(27, 'Phòng 07', 0, NULL, 2, NULL, NULL),
(28, 'Phòng 08', 0, NULL, 2, NULL, NULL),
(29, 'Phòng 09', 0, NULL, 2, NULL, NULL),
(30, 'Phòng 10', 0, NULL, 2, NULL, NULL),
(31, 'Phòng 01', 0, NULL, 7, NULL, NULL),
(32, 'Phòng 02', 0, NULL, 7, NULL, NULL),
(33, 'Phòng 03', 1, NULL, 7, NULL, NULL),
(34, 'Phòng 04', 0, NULL, 7, NULL, NULL),
(35, 'Phòng 05', 0, NULL, 7, NULL, NULL),
(36, 'Phòng 06', 0, NULL, 7, NULL, NULL),
(37, 'Phòng 07', 0, NULL, 7, NULL, NULL),
(38, 'Phòng 08', 0, NULL, 7, NULL, NULL),
(39, 'Phòng 09', 0, NULL, 7, NULL, NULL),
(40, 'Phòng 10', 0, NULL, 7, NULL, NULL),
(41, 'Phòng 01', 1, NULL, 3, NULL, NULL),
(42, 'Phòng 02', 0, NULL, 3, NULL, NULL),
(43, 'Phòng 03', 0, NULL, 3, NULL, NULL),
(44, 'Phòng 04', 0, NULL, 3, NULL, NULL),
(45, 'Phòng 05', 0, NULL, 3, NULL, NULL),
(46, 'Phòng 06', 1, NULL, 3, NULL, '2020-12-20 04:18:06'),
(47, 'Phòng 07', 0, NULL, 3, NULL, NULL),
(48, 'Phòng 08', 0, NULL, 3, NULL, NULL),
(49, 'Phòng 09', 0, NULL, 3, NULL, NULL),
(50, 'Phòng 10', 0, NULL, 3, NULL, NULL),
(51, 'Phòng 01', 0, NULL, 8, NULL, NULL),
(52, 'Phòng 02', 0, NULL, 8, NULL, NULL),
(53, 'Phòng 03', 0, NULL, 8, NULL, NULL),
(54, 'Phòng 04', 0, NULL, 8, NULL, NULL),
(55, 'Phòng 05', 0, NULL, 8, NULL, NULL),
(56, 'Phòng 06', 0, NULL, 8, NULL, NULL),
(57, 'Phòng 07', 0, NULL, 8, NULL, NULL),
(58, 'Phòng 08', 0, NULL, 8, NULL, NULL),
(59, 'Phòng 09', 0, NULL, 8, NULL, NULL),
(60, 'Phòng 10', 1, NULL, 8, NULL, NULL),
(61, 'Phòng 01', 0, NULL, 4, NULL, NULL),
(62, 'Phòng 02', 1, NULL, 4, NULL, NULL),
(63, 'Phòng 03', 0, NULL, 4, NULL, NULL),
(64, 'Phòng 04', 0, NULL, 4, NULL, NULL),
(65, 'Phòng 05', 0, NULL, 4, NULL, NULL),
(66, 'Phòng 06', 0, NULL, 4, NULL, NULL),
(67, 'Phòng 07', 0, NULL, 4, NULL, NULL),
(68, 'Phòng 08', 0, NULL, 4, NULL, NULL),
(69, 'Phòng 09', 0, NULL, 4, NULL, NULL),
(70, 'Phòng 10', 0, NULL, 4, NULL, NULL),
(71, 'Phòng 01', 0, NULL, 9, NULL, NULL),
(72, 'Phòng 02', 0, NULL, 9, NULL, NULL),
(73, 'Phòng 03', 1, NULL, 9, NULL, NULL),
(74, 'Phòng 04', 0, NULL, 9, NULL, NULL),
(75, 'Phòng 05', 0, NULL, 9, NULL, NULL),
(76, 'Phòng 06', 0, NULL, 9, NULL, NULL),
(77, 'Phòng 07', 1, NULL, 9, NULL, NULL),
(78, 'Phòng 08', 0, NULL, 9, NULL, NULL),
(79, 'Phòng 09', 0, NULL, 9, NULL, NULL),
(80, 'Phòng 10', 0, NULL, 9, NULL, NULL),
(81, 'Phòng 01', 0, NULL, 5, NULL, NULL),
(82, 'Phòng 02', 0, NULL, 5, NULL, NULL),
(83, 'Phòng 03', 0, NULL, 5, NULL, NULL),
(84, 'Phòng 04', 1, NULL, 5, NULL, NULL),
(85, 'Phòng 05', 0, NULL, 5, NULL, NULL),
(86, 'Phòng 06', 0, NULL, 5, NULL, NULL),
(87, 'Phòng 07', 0, NULL, 5, NULL, NULL),
(88, 'Phòng 08', 0, NULL, 5, NULL, NULL),
(89, 'Phòng 09', 0, NULL, 5, NULL, NULL),
(90, 'Phòng 10', 0, NULL, 5, NULL, NULL),
(91, 'Phòng 01', 0, NULL, 10, NULL, NULL),
(92, 'Phòng 02', 0, NULL, 10, NULL, NULL),
(93, 'Phòng 03', 0, NULL, 10, NULL, NULL),
(94, 'Phòng 04', 0, NULL, 10, NULL, NULL),
(95, 'Phòng 05', 0, NULL, 10, NULL, NULL),
(96, 'Phòng 06', 0, NULL, 10, NULL, NULL),
(97, 'Phòng 07', 0, NULL, 10, NULL, NULL),
(98, 'Phòng 08', 0, NULL, 10, NULL, NULL),
(99, 'Phòng 09', 0, NULL, 10, NULL, NULL),
(100, 'Phòng 10', 1, NULL, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `id` int(10) UNSIGNED NOT NULL,
  `Ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MSSV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CMND` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `QueQuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_giuong` int(11) DEFAULT 0,
  `quyen` int(11) DEFAULT 0,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SDT` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verified` int(1) DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`id`, `Ten`, `Lop`, `MSSV`, `CMND`, `QueQuan`, `id_giuong`, `quyen`, `avatar`, `SDT`, `email`, `password`, `email_verified_at`, `verified`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nam', '19it2', '19it321', '838474591904', 'Đà Nẵng', 1, 1, 'iU94J-56899710_1068779503305435_5497314442435624960_n.jpg', 620814707, 'admin@vku.udn.vn', '$2y$10$gx7iVs7VNkOi6rAyl/WIQ.Ak2q1WhrE.y/hO24LJz22ZzqsnLMD52', NULL, 1, 'z8tpnfRYqGIxQwYE5ewF1Zapo2XZIAF8CNsJE7kRoCYymfDSIjveEB9G4Hsh', '2020-12-17 22:26:30', '2020-12-25 11:59:40'),
(2, 'ChứcKpZ', '19it3', '19it010', '405364204557', 'Đà Nẵng', 110, 1, NULL, 786070138, 'SiSmH@gmail.com', '$2y$10$waWcQ65lcTjbCv28QwvZA.Uk4eP8iKUB1ghYyeMOpbtB1K7.ywwwC', NULL, 1, NULL, '2020-12-17 22:26:30', '2020-12-17 22:26:30'),
(3, 'ChứcqXP', '19it3', '19it159', '946243304666', 'Đà Nẵng', 272, 1, NULL, 168587091, 'PVluc@gmail.com', '$2y$10$OYNkVhJd9S5W4R8qa91TU.oI6VXOwO8fa2rZfPOBBn7TYNQRzpzTO', NULL, 1, NULL, '2020-12-17 22:26:30', '2020-12-17 22:26:30'),
(4, 'ChứcMos', '19it3', '19it542', '515205611619', 'Đà Nẵng', 22, 1, NULL, 332727619, 'jwTwM@gmail.com', '$2y$10$wM/ncnXVzE/jknPtqg2kHelKcS1ax4kaKxIFSUNuteF1CsWQThpey', NULL, 1, NULL, '2020-12-17 22:26:31', '2020-12-17 22:26:31'),
(5, 'ChứcJQq', '19it8', '19it374', '786117300867', 'Đà Nẵng', 69, 1, NULL, 622932438, 'duNNP@gmail.com', '$2y$10$1XaK7XI0f2HzheukLeVlQ.CCDiYg9BsUscwI/Wrp2lcsZAGbkcvRC', NULL, 1, NULL, '2020-12-17 22:26:31', '2020-12-17 22:26:31'),
(6, 'Chức', '19it1', '19it150', '098765432123', 'Đà Nẵng', 37, 1, NULL, 123123122, 'chuc@gmail.com', '$2y$10$1XaK7XI0f2HzheukLeVlQ.CCDiYg9BsUscwI/Wrp2lcsZAGbkcvRC', NULL, 1, NULL, NULL, NULL),
(7, 'Nam', '19it3', '19it111', '098098098098', 'Đà Nẵng', 74, 1, NULL, 980980980, 'uabsx@gmail.com', '$2y$10$1XaK7XI0f2HzheukLeVlQ.CCDiYg9BsUscwI/Wrp2lcsZAGbkcvRC', NULL, 1, NULL, NULL, NULL),
(8, 'Sang', '19it2', '19it222', '09090909090', 'Đà Nẵng', 527, 1, NULL, 339393939, 'ubu@gmail.com', '$2y$10$1XaK7XI0f2HzheukLeVlQ.CCDiYg9BsUscwI/Wrp2lcsZAGbkcvRC', NULL, 1, NULL, NULL, NULL),
(9, 'Long', '19it3', '19it333', '080808080808', 'Đà Nẵng', 423, 1, NULL, 212121212, 'oihh@gmail.com', '$2y$10$1XaK7XI0f2HzheukLeVlQ.CCDiYg9BsUscwI/Wrp2lcsZAGbkcvRC', NULL, 1, NULL, NULL, NULL),
(10, 'Tường', '19it3', '19it444', '232323232323', 'Quảng Ngãi', 600, 1, NULL, 787878787, '8nn@gmail.com', '$2y$10$1XaK7XI0f2HzheukLeVlQ.CCDiYg9BsUscwI/Wrp2lcsZAGbkcvRC', NULL, 1, NULL, NULL, NULL),
(11, 'Chức', '19ce', '19it126', '098709870987', 'Nghệ An', 2, 0, NULL, 123123127, 'kuda@gmail.com', '$2y$10$1XaK7XI0f2HzheukLeVlQ.CCDiYg9BsUscwI/Wrp2lcsZAGbkcvRC', NULL, 1, NULL, NULL, NULL),
(58, 'NAm xink', '19it5', '19it123', '738192846581', 'Thanh Hóa', 248, 0, 'JoCZn-76751438_2435950113344422_3947310571224825856_n.jpg', 981237638, 'hnvnam.19it3@vku.udn.vn', '$2y$10$Pm8CzAkyikMKBLk1J8dzce94H3kQ78ujaf77GrwssixKqtT6du25S', '2021-01-14 16:28:21', 1, NULL, '2021-01-14 16:27:59', '2021-01-14 16:28:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tang`
--

CREATE TABLE `tang` (
  `id` int(10) UNSIGNED NOT NULL,
  `tang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_khu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tang`
--

INSERT INTO `tang` (`id`, `tang`, `id_khu`, `created_at`, `updated_at`) VALUES
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_sinhvien` int(10) UNSIGNED NOT NULL,
  `tieude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tomtat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `xoa` int(11) DEFAULT 0,
  `read_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`id`, `id_sinhvien`, `tieude`, `noidung`, `tomtat`, `xoa`, `read_at`, `created_at`, `updated_at`) VALUES
(128, 1, 'Hihihi', '<p>Chào bủi chìuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu</p>', 'Chào bủi chìuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu', 1, '2021-01-12 15:22:19', '2021-01-12 06:16:41', '2021-01-12 08:22:19'),
(129, 1, 'Chào buổi sáng', '<p>hihihiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii</p>', 'hihihiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 1, '2021-01-14 23:59:40', '2021-01-14 16:13:10', '2021-01-14 16:59:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbaofile`
--

CREATE TABLE `thongbaofile` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_thongbao` int(10) UNSIGNED DEFAULT 0,
  `id_thongbaosv` int(10) UNSIGNED DEFAULT 0,
  `filename` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongbaofile`
--

INSERT INTO `thongbaofile` (`id`, `id_thongbao`, `id_thongbaosv`, `filename`, `created_at`, `updated_at`) VALUES
(526, 128, 0, 'Mo06u-Logoofme-background.png', '2021-01-12 06:16:41', '2021-01-12 06:16:41'),
(527, 129, 0, 'Jv4mV-432.json', '2021-01-14 16:13:10', '2021-01-14 16:13:10'),
(528, 129, 0, 'WtGA8-4323.json', '2021-01-14 16:13:10', '2021-01-14 16:13:10'),
(529, 129, 0, 'ODclB-342555.json', '2021-01-14 16:13:10', '2021-01-14 16:13:10'),
(530, 129, 0, 'Y9zVP-DCvQb-verify.php', '2021-01-14 16:13:10', '2021-01-14 16:13:10'),
(531, 129, 0, 'bScl6-ikHzS-sendmail.php', '2021-01-14 16:13:10', '2021-01-14 16:13:10'),
(532, 129, 0, 'USNRY-www.netflix.com_31-12-2020 (new 1).json', '2021-01-14 16:13:10', '2021-01-14 16:13:10'),
(533, 129, 0, 'hgDKq-www.netflix.com_31-12-2020 (new).json', '2021-01-14 16:13:10', '2021-01-14 16:13:10'),
(534, 0, 17, 'Pi7aX-logoofme - Copy.png', '2021-01-14 17:12:32', '2021-01-14 17:12:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbaosv`
--

CREATE TABLE `thongbaosv` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_sinhvien` int(10) UNSIGNED NOT NULL,
  `id_quanly` int(10) UNSIGNED NOT NULL,
  `tieude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tomtat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `xoa` int(11) NOT NULL,
  `read_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongbaosv`
--

INSERT INTO `thongbaosv` (`id`, `id_sinhvien`, `id_quanly`, `tieude`, `noidung`, `tomtat`, `xoa`, `read_at`, `created_at`, `updated_at`) VALUES
(5, 58, 1, 'Chào buổi sáng', '<p>CHàoCHào CHào CHào CHào CHàoCHào CHào CHào CHào CHào CHào CHào CHào CHào CHào&nbsp;</p>', 'CHàoCHào CHào CHào CHào CHàoCHào CHào CHào CHào CHào CHào CHào CHào CHào CHào&nbsp;', 1, '2021-01-10 16:17:44', '2021-01-10 07:15:23', '2021-01-10 13:10:05'),
(11, 58, 1, 'Chào buổi sáng', '<p>sadddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</p>', 'sadddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 0, NULL, '2021-01-10 09:40:20', '2021-01-10 09:40:20'),
(17, 1, 1, 'Chào buổi sáng', '<p>111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111</p>', '111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', 1, '2021-01-15 00:14:09', '2021-01-14 17:12:32', '2021-01-14 17:14:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thue`
--

CREATE TABLE `thue` (
  `id` int(10) UNSIGNED NOT NULL,
  `Ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CMND` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `QueQuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_giuong` int(11) DEFAULT 0,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SDT` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verified` int(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thue`
--

INSERT INTO `thue` (`id`, `Ten`, `CMND`, `QueQuan`, `id_giuong`, `avatar`, `SDT`, `email`, `password`, `email_verified_at`, `verified`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Nam', '123123123123', 'Đà Nẵng', 9, 'JwmrO-76751438_2435950113344422_3947310571224825856_n.jpg', '586034436', 'namkenly2000@gmail.com', '$2y$10$gx7iVs7VNkOi6rAyl/WIQ.Ak2q1WhrE.y/hO24LJz22ZzqsnLMD52', NULL, 1, NULL, '2020-12-26 07:05:31', '2020-12-26 07:05:31'),
(3, 'Chức', '838474591904', 'Đà Nẵng', 14, '5JGnB-Logoofme-background.png', '853671591', 'quanlytoicao@greendormitory.com', '$2y$10$d8V2mQTZFQTf6EwQB2Ds5uju4lpkfH/I.jGLx0fJQhXU60EXIE0iW', NULL, 1, NULL, '2020-12-26 07:07:36', '2020-12-26 07:07:36'),
(17, 'Hoàng Nam', '987987654456', 'Đà Nẵng', 6, 'l94k1-Green2.png', '0586034436', 'namkenly2001@gmail.com', '$2y$10$t3sg2dltlzA5YMy/tNjgdeAupmqivEcH9e/H.QkLjlFhXUywG0o9m', NULL, 0, NULL, '2020-12-27 10:05:33', '2020-12-27 10:05:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tiendien`
--

CREATE TABLE `tiendien` (
  `id` int(10) UNSIGNED NOT NULL,
  `soDienDauThang` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soDienCuoiThang` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_phong` int(10) UNSIGNED DEFAULT NULL,
  `id_khu` int(255) NOT NULL,
  `tongtien` decimal(10,3) DEFAULT NULL,
  `phi` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tiendien`
--

INSERT INTO `tiendien` (`id`, `soDienDauThang`, `soDienCuoiThang`, `id_phong`, `id_khu`, `tongtien`, `phi`, `created_at`, `updated_at`) VALUES
(1, '50', '123', 1, 1, '219.000', NULL, NULL, '2021-01-15 10:19:16'),
(2, NULL, NULL, 2, 1, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(3, NULL, NULL, 3, 1, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(4, NULL, NULL, 4, 1, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(5, NULL, NULL, 5, 1, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(6, NULL, NULL, 6, 1, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(7, NULL, NULL, 7, 1, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(8, NULL, NULL, 8, 1, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(9, NULL, NULL, 9, 1, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(10, NULL, NULL, 10, 1, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(11, '59', '120', 11, 2, '183.000', NULL, NULL, '2021-01-15 10:26:23'),
(12, NULL, NULL, 12, 2, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(13, NULL, NULL, 13, 2, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(14, NULL, NULL, 14, 2, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(15, NULL, NULL, 15, 2, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(16, NULL, NULL, 16, 2, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(17, NULL, NULL, 17, 2, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(18, NULL, NULL, 18, 2, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(19, NULL, NULL, 19, 2, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(20, NULL, NULL, 20, 2, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(21, NULL, NULL, 21, 1, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(22, NULL, NULL, 22, 1, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(23, NULL, NULL, 23, 1, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(24, NULL, NULL, 24, 1, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(25, NULL, NULL, 25, 1, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(26, NULL, NULL, 26, 1, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(27, NULL, NULL, 27, 1, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(28, NULL, NULL, 28, 1, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(29, NULL, NULL, 29, 1, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(30, NULL, NULL, 30, 1, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(31, NULL, NULL, 31, 2, NULL, NULL, NULL, '2020-12-17 20:23:34'),
(32, NULL, NULL, 32, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(33, NULL, NULL, 33, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(34, NULL, NULL, 34, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(35, NULL, NULL, 35, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(36, NULL, NULL, 36, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(37, NULL, NULL, 37, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(38, NULL, NULL, 38, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(39, NULL, NULL, 39, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(40, NULL, NULL, 40, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(41, NULL, NULL, 41, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(42, NULL, NULL, 42, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(43, NULL, NULL, 43, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(44, NULL, NULL, 44, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(45, NULL, NULL, 45, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(46, NULL, NULL, 46, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(47, NULL, NULL, 47, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(48, NULL, NULL, 48, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(49, NULL, NULL, 49, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(50, NULL, NULL, 50, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(51, NULL, NULL, 51, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(52, NULL, NULL, 52, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(53, NULL, NULL, 53, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(54, NULL, NULL, 54, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(55, NULL, NULL, 55, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(56, NULL, NULL, 56, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(57, NULL, NULL, 57, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(58, NULL, NULL, 58, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(59, NULL, NULL, 59, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(60, NULL, NULL, 60, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(61, NULL, NULL, 61, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(62, NULL, NULL, 62, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(63, NULL, NULL, 63, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(64, NULL, NULL, 64, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(65, NULL, NULL, 65, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(66, NULL, NULL, 66, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(67, NULL, NULL, 67, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(68, NULL, NULL, 68, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(69, NULL, NULL, 69, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(70, NULL, NULL, 70, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(71, NULL, NULL, 71, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(72, NULL, NULL, 72, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(73, NULL, NULL, 73, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(74, NULL, NULL, 74, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(75, NULL, NULL, 75, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(76, NULL, NULL, 76, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(77, NULL, NULL, 77, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(78, NULL, NULL, 78, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(79, NULL, NULL, 79, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(80, NULL, NULL, 80, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(81, NULL, NULL, 81, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(82, NULL, NULL, 82, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(83, NULL, NULL, 83, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(84, NULL, NULL, 84, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(85, NULL, NULL, 85, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(86, NULL, NULL, 86, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(87, NULL, NULL, 87, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(88, NULL, NULL, 88, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(89, NULL, NULL, 89, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(90, NULL, NULL, 90, 1, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(91, NULL, NULL, 91, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(92, NULL, NULL, 92, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(93, NULL, NULL, 93, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(94, NULL, NULL, 94, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(95, NULL, NULL, 95, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(96, NULL, NULL, 96, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(97, NULL, NULL, 97, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(98, NULL, NULL, 98, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(99, NULL, NULL, 99, 2, NULL, NULL, NULL, '2020-12-17 20:23:35'),
(100, NULL, NULL, 100, 2, NULL, NULL, NULL, '2020-12-17 20:23:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tiennuoc`
--

CREATE TABLE `tiennuoc` (
  `id` int(10) UNSIGNED NOT NULL,
  `soNuocDauThang` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soNuocCuoiThang` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_phong` int(10) UNSIGNED DEFAULT NULL,
  `id_khu` int(11) NOT NULL,
  `tongtien` decimal(10,3) DEFAULT NULL,
  `phi` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tiennuoc`
--

INSERT INTO `tiennuoc` (`id`, `soNuocDauThang`, `soNuocCuoiThang`, `id_phong`, `id_khu`, `tongtien`, `phi`, `created_at`, `updated_at`) VALUES
(1, '54', '123', 1, 1, '345.000', NULL, '2020-12-17 20:26:16', '2021-01-15 10:23:39'),
(2, NULL, NULL, 2, 1, NULL, NULL, '2020-12-17 20:26:16', '2020-12-17 20:26:16'),
(3, NULL, NULL, 3, 1, NULL, NULL, '2020-12-17 20:26:16', '2020-12-17 20:26:16'),
(4, NULL, NULL, 4, 1, NULL, NULL, '2020-12-17 20:26:16', '2020-12-17 20:26:16'),
(5, NULL, NULL, 5, 1, NULL, NULL, '2020-12-17 20:26:16', '2020-12-17 20:26:16'),
(6, NULL, NULL, 6, 1, NULL, NULL, '2020-12-17 20:26:16', '2020-12-17 20:26:16'),
(7, NULL, NULL, 7, 1, NULL, NULL, '2020-12-17 20:26:16', '2020-12-17 20:26:16'),
(8, NULL, NULL, 8, 1, NULL, NULL, '2020-12-17 20:26:16', '2020-12-17 20:26:16'),
(9, NULL, NULL, 9, 1, NULL, NULL, '2020-12-17 20:26:16', '2020-12-17 20:26:16'),
(10, NULL, NULL, 10, 1, NULL, NULL, '2020-12-17 20:26:16', '2020-12-17 20:26:16'),
(11, '123', '240', 11, 2, '585.000', NULL, '2020-12-17 20:26:16', '2021-01-15 10:30:47'),
(12, NULL, NULL, 12, 2, NULL, NULL, '2020-12-17 20:26:16', '2020-12-17 20:26:16'),
(13, NULL, NULL, 13, 2, NULL, NULL, '2020-12-17 20:26:16', '2020-12-17 20:26:16'),
(14, NULL, NULL, 14, 2, NULL, NULL, '2020-12-17 20:26:16', '2020-12-17 20:26:16'),
(15, NULL, NULL, 15, 2, NULL, NULL, '2020-12-17 20:26:16', '2020-12-17 20:26:16'),
(16, NULL, NULL, 16, 2, NULL, NULL, '2020-12-17 20:26:16', '2020-12-17 20:26:16'),
(17, NULL, NULL, 17, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(18, NULL, NULL, 18, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(19, NULL, NULL, 19, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(20, NULL, NULL, 20, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(21, NULL, NULL, 21, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(22, NULL, NULL, 22, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(23, NULL, NULL, 23, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(24, NULL, NULL, 24, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(25, NULL, NULL, 25, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(26, NULL, NULL, 26, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(27, NULL, NULL, 27, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(28, NULL, NULL, 28, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(29, NULL, NULL, 29, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(30, NULL, NULL, 30, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(31, NULL, NULL, 31, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(32, NULL, NULL, 32, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(33, NULL, NULL, 33, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(34, NULL, NULL, 34, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(35, NULL, NULL, 35, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(36, NULL, NULL, 36, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(37, NULL, NULL, 37, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(38, NULL, NULL, 38, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(39, NULL, NULL, 39, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(40, NULL, NULL, 40, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(41, NULL, NULL, 41, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(42, NULL, NULL, 42, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(43, NULL, NULL, 43, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(44, NULL, NULL, 44, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(45, NULL, NULL, 45, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(46, NULL, NULL, 46, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(47, NULL, NULL, 47, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(48, NULL, NULL, 48, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(49, NULL, NULL, 49, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(50, NULL, NULL, 50, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(51, NULL, NULL, 51, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(52, NULL, NULL, 52, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(53, NULL, NULL, 53, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(54, NULL, NULL, 54, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(55, NULL, NULL, 55, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(56, NULL, NULL, 56, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(57, NULL, NULL, 57, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(58, NULL, NULL, 58, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(59, NULL, NULL, 59, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(60, NULL, NULL, 60, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(61, NULL, NULL, 61, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(62, NULL, NULL, 62, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(63, NULL, NULL, 63, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(64, NULL, NULL, 64, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(65, NULL, NULL, 65, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(66, NULL, NULL, 66, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(67, NULL, NULL, 67, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(68, NULL, NULL, 68, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(69, NULL, NULL, 69, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(70, NULL, NULL, 70, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(71, NULL, NULL, 71, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(72, NULL, NULL, 72, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(73, NULL, NULL, 73, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(74, NULL, NULL, 74, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(75, NULL, NULL, 75, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(76, NULL, NULL, 76, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(77, NULL, NULL, 77, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(78, NULL, NULL, 78, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(79, NULL, NULL, 79, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(80, NULL, NULL, 80, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(81, NULL, NULL, 81, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(82, NULL, NULL, 82, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(83, NULL, NULL, 83, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(84, NULL, NULL, 84, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(85, NULL, NULL, 85, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(86, NULL, NULL, 86, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(87, NULL, NULL, 87, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(88, NULL, NULL, 88, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(89, NULL, NULL, 89, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(90, NULL, NULL, 90, 1, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(91, NULL, NULL, 91, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(92, NULL, NULL, 92, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(93, NULL, NULL, 93, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(94, NULL, NULL, 94, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(95, NULL, NULL, 95, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(96, NULL, NULL, 96, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(97, NULL, NULL, 97, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(98, NULL, NULL, 98, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(99, NULL, NULL, 99, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17'),
(100, NULL, NULL, 100, 2, NULL, NULL, '2020-12-17 20:26:17', '2020-12-17 20:26:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `CMND` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `QueQuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SDT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `position`, `avatar`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `CMND`, `QueQuan`, `SDT`) VALUES
(1, 'Hoàng Nam', 'quanlytoicao@greendormitory.com', '$2y$10$8hbrq7gG4XGOfwOnvSGVcOjaREEwCfJOYsVoSOHTUkqxLYYgdAMaS', 1, 'iU94J-56899710_1068779503305435_5497314442435624960_n.jpg', NULL, 'JejTwnf0ZtJVVkfFIdYUnNyfsYABkQn5zZJOsJC3kDy2Mb3hzBqpYFpxEpG8', NULL, '2021-01-11 11:30:09', '0987345678123', 'Thanh Hóa', 987123123),
(3, 'Thu Loan', 'admin@greendormitory.com', '$2y$10$nwFszSk8XvzmFexAaAjBru0tfbZBVf5nz/yhGdAsUNRUghDuD2drm', 1, NULL, NULL, NULL, NULL, '2021-01-11 10:19:16', '0987345678123', 'Quảng Ngãi', 123123123),
(4, 'Nguyễn Văn Chức', 'quanly@greendormitory.com', '$2y$10$d1dnLXj7EfjTUBA2anx4keGLxisRsaIZddp10vb7h1M0F2niYMase', 2, NULL, NULL, NULL, NULL, '2021-01-11 10:18:32', '123765483657', 'Nghệ An', 867455846),
(5, 'Duy Hùng', 'quanly1@greendormitory.com', '$2y$10$PLDQK2KGUwbY3qPBt9W0Lem4rHOu5/wDWBGo6fAUiTyg9NC3y5vI.', 2, 'WCbDG-Logoofme-background.png', NULL, NULL, '2021-01-11 10:47:15', '2021-01-11 10:47:15', '981288128732', 'Đà Nẵng', 867455846),
(6, 'Hoàng Sang', 'Sang@gmail.com', '$2y$10$B/bRP0sEtnGwZQ0YcvxG5ubbNxcR.MnN8EPPUyy7hmD4iwUEDFV3m', 2, 'sKUp8-logoofme - Copy.png', NULL, NULL, '2021-01-11 10:49:56', '2021-01-11 10:49:56', '981277542344', 'Dak Lak', 98123765);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `verifysv`
--

CREATE TABLE `verifysv` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_sv` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `verifysv`
--

INSERT INTO `verifysv` (`id`, `id_sv`, `token`, `created_at`, `updated_at`) VALUES
(31, 55, 'be2f6e9c312a6fc90b26bf4f48328b7bd430717a', '2021-01-01 07:56:01', '2021-01-01 10:22:04'),
(32, 56, '98f5138fcdf3f4f3a19b0b5f062716a70dc32c3d', '2021-01-01 17:14:11', '2021-01-01 17:15:51'),
(33, 57, '27340803d5e968b8920289f9399b10a1ad421c85', '2021-01-12 08:25:31', '2021-01-12 08:25:31'),
(34, 58, '8b33afa441031565ccf0586b78c384da1f061fc3', '2021-01-14 16:27:59', '2021-01-14 16:27:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `website`
--

CREATE TABLE `website` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `website`
--

INSERT INTO `website` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hoàng Nam', 'Ký Túc Xá Xanh', 1, NULL, '2021-01-06 15:57:33');

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
-- Chỉ mục cho bảng `giuong`
--
ALTER TABLE `giuong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `giuong_id_phong_foreign` (`id_phong`);

--
-- Chỉ mục cho bảng `khu`
--
ALTER TABLE `khu`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phong_id_tang_foreign` (`id_tang`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tang`
--
ALTER TABLE `tang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tang_id_khu_foreign` (`id_khu`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thongbaofile`
--
ALTER TABLE `thongbaofile`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thongbaosv`
--
ALTER TABLE `thongbaosv`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thue`
--
ALTER TABLE `thue`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tiendien`
--
ALTER TABLE `tiendien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tiennuoc`
--
ALTER TABLE `tiennuoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `verifysv`
--
ALTER TABLE `verifysv`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `website`
--
ALTER TABLE `website`
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
-- AUTO_INCREMENT cho bảng `giuong`
--
ALTER TABLE `giuong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=601;

--
-- AUTO_INCREMENT cho bảng `khu`
--
ALTER TABLE `khu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `phong`
--
ALTER TABLE `phong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `tang`
--
ALTER TABLE `tang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT cho bảng `thongbaofile`
--
ALTER TABLE `thongbaofile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=535;

--
-- AUTO_INCREMENT cho bảng `thongbaosv`
--
ALTER TABLE `thongbaosv`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `thue`
--
ALTER TABLE `thue`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tiendien`
--
ALTER TABLE `tiendien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT cho bảng `tiennuoc`
--
ALTER TABLE `tiennuoc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `verifysv`
--
ALTER TABLE `verifysv`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `website`
--
ALTER TABLE `website`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giuong`
--
ALTER TABLE `giuong`
  ADD CONSTRAINT `giuong_id_phong_foreign` FOREIGN KEY (`id_phong`) REFERENCES `phong` (`id`);

--
-- Các ràng buộc cho bảng `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_id_tang_foreign` FOREIGN KEY (`id_tang`) REFERENCES `tang` (`id`);

--
-- Các ràng buộc cho bảng `tang`
--
ALTER TABLE `tang`
  ADD CONSTRAINT `tang_id_khu_foreign` FOREIGN KEY (`id_khu`) REFERENCES `khu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
