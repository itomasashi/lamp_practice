-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: mysql
-- 生成日時: 2021 年 8 月 21 日 13:38
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `sample`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `Purchase_details`
--

CREATE TABLE `Purchase_details` (
  `details_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `Purchase_details`
--

INSERT INTO `Purchase_details` (`details_id`, `purchase_id`, `price`, `amount`, `item_id`, `created`) VALUES
(1, 1, 50000, 6, 33, '2021-08-21 22:35:37'),
(2, 1, 18000, 2, 40, '2021-08-21 22:35:37');

-- --------------------------------------------------------

--
-- テーブルの構造 `Purchase_history`
--

CREATE TABLE `Purchase_history` (
  `purchase_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `Purchase_history`
--

INSERT INTO `Purchase_history` (`purchase_id`, `created`, `user_id`) VALUES
(1, '2021-08-21 22:35:37', 4);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `Purchase_details`
--
ALTER TABLE `Purchase_details`
  ADD PRIMARY KEY (`details_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `purchase_id` (`purchase_id`);

--
-- テーブルのインデックス `Purchase_history`
--
ALTER TABLE `Purchase_history`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `user_id` (`user_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `Purchase_details`
--
ALTER TABLE `Purchase_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `Purchase_history`
--
ALTER TABLE `Purchase_history`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
