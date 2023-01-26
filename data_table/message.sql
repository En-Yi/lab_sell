-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-05-23 12:05:32
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
-- 資料表結構 `message`
--

CREATE TABLE `message` (
  `mbid` int(8) NOT NULL,
  `locid` int(8) NOT NULL,
  `uid` int(8) NOT NULL,
  `content` text NOT NULL,
  `date_m` datetime NOT NULL,
  `mid` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `message`
--

INSERT INTO `message` (`mbid`, `locid`, `uid`, `content`, `date_m`, `mid`) VALUES
(1, 2, 1, '好書', '2021-05-08 21:43:38', 8),
(2, 2, 1, '優質教科書', '2021-05-08 21:52:26', 10),
(3, 2, 1, '好畫', '2021-05-08 21:57:48', 9),
(4, 1, 2, '好遊戲', '2021-05-08 22:24:32', 4),
(6, 1, 1, '加油加油', '2021-05-16 20:37:04', 0),
(7, 1, 1, '優質賣家', '2021-05-16 20:37:15', 0),
(8, 1, 1, '期末歐趴', '2021-05-16 20:42:56', 0),
(9, 2, 1, '用心的賣家~推推~', '2021-05-16 20:43:32', 0),
(15, 1, 1, '台灣加油!!', '2021-05-16 21:30:25', 0),
(16, 1, 1, '台灣加油!!', '2021-05-16 21:31:00', 0),
(17, 1, 2, 'WWW', '2021-05-17 20:47:01', 0),
(18, 2, 1, '天氣真好', '2021-05-19 22:27:36', 0),
(19, 2, 0, 'test', '2021-05-21 11:13:21', 0),
(20, 1, 4, 'wryyyyyyyyy!!!', '2021-05-22 10:53:59', 0),
(21, 1, 4, 'muda !!! muda !!! muda !!!', '2021-05-22 10:57:00', 0),
(22, 2, 4, 'road roller da !!', '2021-05-22 11:00:25', 0),
(23, 2, 4, 'Ho ho ~ So you\'re approaching me ?', '2021-05-22 11:20:56', 0),
(25, 1, 2, 'good game', '2021-05-22 13:57:35', 4),
(26, 1, 4, '我全都要', '2021-05-22 14:21:13', 6),
(27, 1, 4, '他在做什麼', '2021-05-22 14:24:40', 4),
(28, 1, 4, '大膽的傢伙', '2021-05-22 14:29:03', 4),
(29, 2, 4, '讀完了真的能精通大數據嗎', '2021-05-22 14:31:19', 8),
(30, 13, 2, '很好看的書架', '2021-05-22 18:20:31', 12),
(31, 2, 13, '好買家!', '2021-05-22 18:37:54', 0),
(32, 13, 13, '恭喜!!', '2021-05-22 20:50:20', 0),
(33, 13, 4, 'yare yare dase', '2021-05-22 20:51:39', 0),
(34, 2, 4, '一條好線', '2021-05-23 14:45:45', 7),
(35, 1, 4, '別看你今天鬧得歡', '2021-05-23 14:47:56', 4),
(36, 2, 4, '這米能吃嗎', '2021-05-23 14:48:50', 10);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mbid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message`
--
ALTER TABLE `message`
  MODIFY `mbid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
