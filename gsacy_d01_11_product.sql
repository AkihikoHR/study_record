-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-01-29 05:18:39
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
-- テーブルの構造 `answer_table`
--

CREATE TABLE `answer_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `image` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `answer_table`
--

INSERT INTO `answer_table` (`id`, `user_id`, `question_id`, `answer`, `image`, `created_at`, `updated_at`) VALUES
(1, 13, 7, 'aaaa', NULL, '2022-01-27 23:22:02', '2022-01-27 23:22:02'),
(2, 13, 7, 'aaaaa', NULL, '2022-01-27 23:25:12', '2022-01-27 23:25:12'),
(3, 13, 7, 'bbbbb', NULL, '2022-01-27 23:27:55', '2022-01-27 23:27:55'),
(4, 13, 7, 'テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト', 'upload/20220128094157657eb899f2f378bdb4aa1e1b743e7bd5.jpg', '2022-01-28 17:41:57', '2022-01-28 17:41:57'),
(5, 13, 4, 'これはテストです。', NULL, '2022-01-29 02:32:41', '2022-01-29 02:32:41'),
(6, 15, 11, '回答します。', 'upload/20220128184126b2a10223f289d79216544e4ffe94a016.jpg', '2022-01-29 02:41:26', '2022-01-29 02:41:26'),
(7, 14, 12, '良いですよ。', 'upload/20220129042652bca1338e478e305963a15f0f39b0624f.jpg', '2022-01-29 12:26:52', '2022-01-29 12:26:52'),
(8, 14, 13, 'サンプル', 'upload/20220129051431698ab805f201a807fe98d5b0895eb60e.jpg', '2022-01-29 13:14:31', '2022-01-29 13:14:31');

-- --------------------------------------------------------

--
-- テーブルの構造 `question_table`
--

CREATE TABLE `question_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `question` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `image` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `question_table`
--

INSERT INTO `question_table` (`id`, `user_id`, `category`, `question`, `image`, `created_at`, `updated_at`) VALUES
(1, 12, '勉強', 'サンプル', NULL, '2022-01-26 16:56:48', '2022-01-26 16:56:48'),
(2, 12, '勉強', 'aaaaaa', NULL, '2022-01-26 17:14:59', '2022-01-26 17:14:59'),
(3, 12, '勉強', 'サンプル', 'upload/20220126092205941c1300eb5764138674a5355003ee86.jpg', '2022-01-26 17:22:05', '2022-01-26 17:22:05'),
(4, 12, '志望校選び', 'A大学のB学部の雰囲気を知りたいです。入学後の授業、単位取得は厳しいでしょうか？\r\n学生はサークルや部活などに加入していますか？', 'upload/20220126180717ba406208b192a6ee0eafe1cc7a60cad9.jpg', '2022-01-27 02:07:17', '2022-01-27 02:07:17'),
(5, 8, '勉強', 'aaaaaaaa', 'upload/20220126182023036dbdf3f644fef058d4fc7ef5aeaf8c.jpg', '2022-01-27 02:20:23', '2022-01-27 02:20:23'),
(6, 13, '勉強', 'こんにちは', NULL, '2022-01-27 22:02:07', '2022-01-27 22:02:07'),
(7, 13, '学校生活', 'これはテストです。これはテストです。これはテストです。これはテストです。これはテストです。これはテストです。これはテストです。これはテストです。これはテストです。', 'upload/20220127140238019f535728ab481bdaac42f93e84f701.jpg', '2022-01-27 22:02:38', '2022-01-27 22:02:38'),
(8, 13, '勉強', 'テスト', NULL, '2022-01-27 22:12:15', '2022-01-27 22:12:15'),
(9, 11, '勉強', 'テストテスト', 'upload/20220128085207b0dff295e043f4e0c6efe666544c59d9.jpg', '2022-01-28 16:52:07', '2022-01-28 16:52:07'),
(10, 13, '学校生活', '教えてください', 'upload/20220128173836666f31c64fd3413fe1bc344d7e3089f2.jpg', '2022-01-29 01:38:37', '2022-01-29 01:38:37'),
(11, 14, '勉強', '質問です。回答お願いします。', 'upload/2022012818383447277c21b42bb1a0a4950298b527b7c5.jpg', '2022-01-29 02:38:34', '2022-01-29 02:38:34'),
(12, 14, '志望校選び', 'こちらの大学はどうですか？', 'upload/2022012904253800baaa1407811046f06a3c164fc3708e.jpg', '2022-01-29 12:25:38', '2022-01-29 12:25:38'),
(13, 14, '勉強', 'ここを教えてください。', 'upload/20220129051321b20f8110073b053ab57a2888e965ff8a.jpg', '2022-01-29 13:13:21', '2022-01-29 13:13:21');

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
(15, 12, '２学期中間', '2021-07-15', 70, 80, 60, 90, 85, '2022-01-14 20:16:13', '2022-01-14 20:16:13'),
(16, 12, '２学期中間', '2021-09-21', 30, 40, 20, 80, 40, '2022-01-15 12:35:37', '2022-01-15 12:35:37'),
(17, 12, '学年末', '2022-01-14', 90, 10, 80, 50, 40, '2022-01-15 13:20:56', '2022-01-15 13:20:56'),
(18, 12, '学年末', '2022-01-19', 80, 80, 80, 80, 80, '2022-01-16 14:47:49', '2022-01-16 14:47:49');

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
(2, 12, '2022-01-12', 30, 30, 30, 30, 30, '2022-01-14 15:42:46', '2022-01-14 15:42:46'),
(3, 12, '2022-01-10', 40, 40, 40, 40, 40, '2022-01-14 18:29:05', '2022-01-14 18:29:05'),
(4, 12, '2022-01-01', 0, 10, 20, 30, 40, '2022-01-14 20:45:05', '2022-01-14 20:45:05'),
(5, 12, '2022-01-15', 30, 20, 0, 40, 20, '2022-01-15 12:36:47', '2022-01-15 12:36:47'),
(6, 12, '2022-01-11', 10, 10, 20, 30, 30, '2022-01-15 13:21:41', '2022-01-15 13:21:41');

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
(12, '弘中テスト', 'aaa', '$2y$10$PSo.pIAsmCoFvIICEdctKeUHUN6dojdiPRZ.fiwrMSGfY0YRxpvbi', 18, 'test2@example.com', 'aaa', 0, 0, '2022-01-13 22:27:37', '2022-01-14 20:57:13'),
(13, '弘中テスト1/27', 'ひろなか', '$2y$10$U/v37hQR/SzO.0g.pC5JJeK5EsAqYxAJTvrXidkAH3r.8Q5UMY/9.', 30, 'gs@example.com', 'テスト', 0, 0, '2022-01-27 22:01:39', '2022-01-27 22:01:39'),
(14, '質問者A', 'しつもんしゃえー', '$2y$10$xCCvkiIiFI004vSb5/GQMO8P9qELST9XQfujJnRIGYBBI7P9nbYFO', 18, 'question@example.com', 'テスト', 0, 0, '2022-01-29 02:37:48', '2022-01-29 02:40:28'),
(15, '回答者A', 'かいとうしゃえー', '$2y$10$IxhgKOWH8wAB7vicBBgzKuNlFrkhPTD8cezEigONL0jU4IHOzd0yO', 20, 'answer@example.com', 'テスト', 0, 0, '2022-01-29 02:39:54', '2022-01-29 02:39:54');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `answer_table`
--
ALTER TABLE `answer_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `question_table`
--
ALTER TABLE `question_table`
  ADD PRIMARY KEY (`id`);

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
-- テーブルの AUTO_INCREMENT `answer_table`
--
ALTER TABLE `answer_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- テーブルの AUTO_INCREMENT `question_table`
--
ALTER TABLE `question_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- テーブルの AUTO_INCREMENT `record_table`
--
ALTER TABLE `record_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- テーブルの AUTO_INCREMENT `time_table`
--
ALTER TABLE `time_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- テーブルの AUTO_INCREMENT `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
