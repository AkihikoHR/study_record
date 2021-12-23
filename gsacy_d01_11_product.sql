-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-12-23 15:28:58
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
  `user_name` varchar(128) COLLATE utf8mb4_bin NOT NULL,
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

INSERT INTO `record_table` (`id`, `user_name`, `exam_type`, `exam_date`, `japanese`, `math`, `english`, `science`, `social`, `created_at`, `updated_at`) VALUES
(1, '弘中明彦', '１学期期末', '2021-12-16', 100, 100, 100, 100, 100, '2021-12-16 20:24:34', '2021-12-16 20:24:34'),
(2, '弘中テスト', '２学期中間', '2021-12-12', 50, 50, 50, 50, 50, '2021-12-16 21:28:22', '2021-12-16 21:28:22'),
(3, '弘中明彦', '学年末', '2021-12-30', 80, 80, 80, 80, 80, '2021-12-16 21:28:53', '2021-12-16 21:28:53'),
(4, '弘中明彦', '１学期中間', '2021-10-01', 70, 70, 70, 70, 70, '2021-12-16 22:03:52', '2021-12-16 22:03:52'),
(5, '弘中明彦', '3学期中間', '2021-12-05', 50, 50, 50, 50, 50, '2021-12-16 23:06:00', '2021-12-16 23:06:00'),
(6, '弘中明彦', '模擬試験', '2021-09-17', 80, 80, 80, 80, 80, '2021-12-16 23:06:38', '2021-12-16 23:06:38');

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
(1, '弘中明彦', 'ひろなかあきひこ', 'password', 33, 'test@example.com', 'テスト', 0, 0, '2021-12-22 00:44:07', '2021-12-22 00:44:07'),
(2, '弘中テスト', 'ひろなか２', 'password', 30, 'test2@example.com', 'テスト2', 0, 0, '2021-12-22 01:45:50', '2021-12-22 01:45:50'),
(3, '弘中明彦', 'ひろなか', 'password', 30, 'test3@example.com', '住所テスト', 0, 0, '2021-12-22 22:42:12', '2021-12-22 22:42:12'),
(4, 'あああ', 'あああ', 'password', 18, 'test4@example.com', 'テスト', 0, 0, '2021-12-22 22:46:34', '2021-12-22 22:46:34'),
(6, '弘中テスト', 'ひろなか', 'pass', 20, 'test5@example.com', 'テスト', 0, 0, '2021-12-22 23:13:16', '2021-12-22 23:13:16'),
(7, 'aaa', 'aaa', 'pass', 3, 'test6@example.com', 'aaa', 0, 0, '2021-12-22 23:21:32', '2021-12-22 23:21:32'),
(8, '弘中明彦', 'ひろなかあきひこ', '$2y$10$2Ua9HVLwfShAcA2WiKBKWe07RxK5I1/QNS.ObH.9y6uczIAQrKu22', 18, 'test8@example.com', 'テスト8', 0, 0, '2021-12-23 03:33:05', '2021-12-23 22:55:51'),
(9, '弘中更新２', '', '$2y$10$vlm2INnaMWyt.1QVKVyqJeY3SqrDU5UAQYPQtn0mf7lOCXp7QZhAa', 0, '', '', 0, 0, '2021-12-23 04:05:49', '2021-12-23 22:32:40'),
(10, '弘中テスト10', 'ひろなかてすと10', '$2y$10$DFf55DUuhtzWvXJILDM3N.NuZk6VMzGtjoxAuCm4yAV19I6QZV/mu', 30, 'test10@example.com', 'テスト10', 0, 0, '2021-12-23 22:56:47', '2021-12-23 22:56:47');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `record_table`
--
ALTER TABLE `record_table`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- テーブルの AUTO_INCREMENT `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
