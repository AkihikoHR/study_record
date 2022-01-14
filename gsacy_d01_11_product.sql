-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-01-14 16:26:12
-- サーバのバージョン： 10.4.22-MariaDB
-- PHP のバージョン: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacy_d01_11_product`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `record_table`
--

CREATE TABLE `record_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `exam_type` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `exam_date` date NOT NULL,
  `japanese` int(11) NOT NULL,
  `math` int(11) NOT NULL,
  `english` int(11) NOT NULL,
  `science` int(11) NOT NULL,
  `social` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `record_table`
--

INSERT INTO `record_table` (`id`, `user_id`, `exam_type`, `exam_date`, `japanese`, `math`, `english`, `science`, `social`, `created_at`, `updated_at`) VALUES
(1, 0, '１学期期末', '2021-12-16', 100, 100, 100, 100, 100, '2021-12-16 20:24:34', '2021-12-16 20:24:34'),
(2, 0, '２学期中間', '2021-12-12', 50, 50, 50, 50, 50, '2021-12-16 21:28:22', '2021-12-16 21:28:22'),
(3, 0, '学年末', '2021-12-30', 80, 80, 80, 80, 80, '2021-12-16 21:28:53', '2021-12-16 21:28:53'),
(4, 0, '１学期中間', '2021-10-01', 70, 70, 70, 70, 70, '2021-12-16 22:03:52', '2021-12-16 22:03:52'),
(5, 0, '3学期中間', '2021-12-05', 50, 50, 50, 50, 50, '2021-12-16 23:06:00', '2021-12-16 23:06:00'),
(6, 0, '模擬試験', '2021-09-17', 80, 80, 80, 80, 80, '2021-12-16 23:06:38', '2021-12-16 23:06:38'),
(7, 10, '１学期期末', '2021-12-24', 80, 80, 80, 80, 80, '2021-12-24 00:50:19', '2021-12-24 00:50:19'),
(8, 10, '２学期中間', '2021-12-21', 90, 90, 90, 90, 90, '2021-12-24 00:50:48', '2021-12-24 00:50:48'),
(9, 11, '１学期期末', '2022-01-04', 80, 80, 80, 80, 80, '2022-01-08 01:28:02', '2022-01-08 01:28:02'),
(10, 11, '１学期期末', '2022-01-05', 80, 80, 80, 80, 80, '2022-01-08 01:30:49', '2022-01-08 01:30:49'),
(12, 12, '学年末', '2022-01-10', 20, 20, 20, 20, 20, '2022-01-14 15:13:54', '2022-01-14 15:13:54'),
(13, 12, '１学期期末', '2021-11-15', 90, 90, 90, 90, 90, '2022-01-14 18:28:11', '2022-01-14 18:28:11'),
(14, 12, '１学期中間', '2021-06-16', 60, 70, 80, 90, 100, '2022-01-14 20:15:54', '2022-01-14 20:15:54'),
(15, 12, '２学期中間', '2021-07-15', 70, 80, 60, 90, 85, '2022-01-14 20:16:13', '2022-01-14 20:16:13');

-- --------------------------------------------------------

--
-- テーブルの構造 `time_table`
--

CREATE TABLE `time_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `japanese` int(11) NOT NULL,
  `math` int(11) NOT NULL,
  `english` int(11) NOT NULL,
  `science` int(11) NOT NULL,
  `social` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `time_table`
--

INSERT INTO `time_table` (`id`, `user_id`, `date`, `japanese`, `math`, `english`, `science`, `social`, `created_at`, `updated_at`) VALUES
(1, 12, '2022-01-14', 1, 1, 1, 1, 1, '2022-01-14 02:59:22', '2022-01-14 02:59:22'),
(2, 12, '2022-01-12', 30, 30, 30, 30, 30, '2022-01-14 15:42:46', '2022-01-14 15:42:46'),
(3, 12, '2022-01-10', 40, 40, 40, 40, 40, '2022-01-14 18:29:05', '2022-01-14 18:29:05'),
(4, 12, '2022-01-01', 0, 10, 20, 30, 40, '2022-01-14 20:45:05', '2022-01-14 20:45:05');

-- --------------------------------------------------------

--
-- テーブルの構造 `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `user_name` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `user_ruby` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `user_pw` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `user_age` int(11) NOT NULL,
  `user_email` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `user_address` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `user_table`
--

INSERT INTO `user_table` (`id`, `user_name`, `user_ruby`, `user_pw`, `user_age`, `user_email`, `user_address`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(7, 'aaa', 'aaa', 'pass', 3, 'test6@example.com', 'aaa', 0, 0, '2021-12-22 23:21:32', '2021-12-22 23:21:32'),
(8, '弘中明彦', 'ひろなかあきひこ', '$2y$10$2Ua9HVLwfShAcA2WiKBKWe07RxK5I1/QNS.ObH.9y6uczIAQrKu22', 18, 'test8@example.com', 'テスト8', 0, 0, '2021-12-23 03:33:05', '2021-12-23 22:55:51'),
(9, '弘中更新２', '', '$2y$10$vlm2INnaMWyt.1QVKVyqJeY3SqrDU5UAQYPQtn0mf7lOCXp7QZhAa', 0, '', '', 0, 0, '2021-12-23 04:05:49', '2021-12-23 22:32:40'),
(10, '弘中テスト10', 'ひろなかてすと10', '$2y$10$DFf55DUuhtzWvXJILDM3N.NuZk6VMzGtjoxAuCm4yAV19I6QZV/mu', 30, 'test10@example.com', 'テスト10', 0, 0, '2021-12-23 22:56:47', '2021-12-23 23:49:13'),
(11, '弘中更新', 'テスト', '$2y$10$q.o.DUVxYSGNNsaYLjIpzufC94HUsb7TZP5d1JSSqlsUDhoj2mSRi', 18, 'test@example.com', 'aaa', 0, 0, '2022-01-08 00:49:53', '2022-01-08 01:14:35'),
(12, '弘中テスト', 'aaa', '$2y$10$PSo.pIAsmCoFvIICEdctKeUHUN6dojdiPRZ.fiwrMSGfY0YRxpvbi', 18, 'test2@example.com', 'aaa', 0, 0, '2022-01-13 22:27:37', '2022-01-14 20:57:13');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `record_table`
--
ALTER TABLE `record_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `record_table`
--
ALTER TABLE `record_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- テーブルの AUTO_INCREMENT `time_table`
--
ALTER TABLE `time_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- テーブルの AUTO_INCREMENT `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
