-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-05-23 12:03:30
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `tobio`
--

-- --------------------------------------------------------

--
-- 資料表結構 `bid`
--

CREATE TABLE `bid` (
  `bid` int(8) NOT NULL,
  `mid` int(8) NOT NULL,
  `buyer_id` int(8) NOT NULL,
  `seller_id` int(8) NOT NULL,
  `price` int(10) NOT NULL,
  `bid_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `bid`
--

INSERT INTO `bid` (`bid`, `mid`, `buyer_id`, `seller_id`, `price`, `bid_date`) VALUES
(1, 6, 2, 1, 400, '2021-05-07 23:40:24'),
(2, 6, 2, 1, 420, '2021-05-07 23:42:26'),
(3, 10, 1, 1, 520, '2021-05-08 09:17:10'),
(4, 9, 2, 2, 2020, '2021-05-08 09:23:26'),
(5, 6, 4, 1, 430, '2021-05-18 23:52:18'),
(6, 8, 4, 2, 420, '2021-05-18 23:52:39'),
(7, 10, 4, 2, 540, '2021-05-18 23:52:53'),
(8, 8, 3, 2, 430, '2021-05-18 23:54:28'),
(9, 10, 3, 2, 550, '2021-05-18 23:55:00'),
(10, 4, 3, 1, 810, '2021-05-18 23:56:45'),
(11, 7, 1, 2, 75, '2021-05-22 00:50:15'),
(12, 12, 2, 13, 230, '2021-05-22 18:19:48'),
(13, 11, 1, 1, 105, '2021-05-23 14:10:03');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`bid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bid`
--
ALTER TABLE `bid`
  MODIFY `bid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
