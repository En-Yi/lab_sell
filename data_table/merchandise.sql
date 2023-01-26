-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-05-23 12:05:12
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
-- 資料表結構 `merchandise`
--

CREATE TABLE `merchandise` (
  `mid` int(8) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `uid` int(8) NOT NULL,
  `initial_price` int(8) NOT NULL,
  `img` mediumblob NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `send_mail` varchar(16) NOT NULL DEFAULT '0',
  `description` varchar(225) NOT NULL,
  `present_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `merchandise`
--

INSERT INTO `merchandise` (`mid`, `mname`, `category`, `uid`, `initial_price`, `img`, `start_date`, `end_date`, `send_mail`, `description`, `present_price`) VALUES
(4, '【二手桌遊】電力公司', '遊戲', 1, 800, 0x656c6563747269632e6a7067, '2021-05-01 17:02:00', '2021-05-23 17:02:00', '1', '二手 9成新 盒況良好 無缺件', 810),
(6, '【桌遊】花見小路', '遊戲', 1, 350, 0x68616e612e6a7067, '2021-05-15 10:55:00', '2021-05-23 10:55:00', '1', '二手 8成新 無缺件', 430),
(7, 'paddy type C 傳輸線', '3C', 2, 70, 0x7479706563322e6a7067, '2021-05-02 11:09:00', '2021-05-26 11:10:00', '0', '2020 年購入 長度約 240 cm', 75),
(8, '[二手]精通大數據!R語言資料分析與應用', '書籍', 2, 350, 0x72626967646174612e6a7067, '2021-05-02 17:56:00', '2021-05-25 20:36:09', '0', '9成新 有些許筆記(螢光筆，原子筆)', 430),
(9, '【複製畫】豐收', '生活', 2, 2000, 0x7061696e742e6a7067, '2021-05-02 22:40:00', '2021-05-31 22:40:00', '0', '約2010年購入 放在牆上 尺寸約 50cm*30cm(含木框)', 2020),
(10, 'Mathematical Statistics and Data Analysis 3rd Edition', '書籍', 2, 500, 0x737461746973746963732e6a7067, '2021-05-05 23:17:00', '2021-05-31 23:18:00', '0', '8成新 有些許筆記', 550),
(11, '鳥造型壽司', '生活', 1, 100, 0x6f726967696e616c2e6a7067, '2021-05-21 23:45:00', '2021-05-26 23:45:00', '0', '很新鮮，好吃又可愛', 105),
(12, '書架', '生活', 13, 200, 0x7368656c662e6a7067, '2021-05-22 18:17:00', '2021-05-22 18:24:00', '1', '使用不到 2個月', 230),
(13, 'Samsung S6 Lite', '3C', 13, 9000, 0xe5b9b3e69dbf2e6a7067, '2021-05-07 18:29:00', '2021-05-22 18:32:00', '1', '使用約半年，外觀無損', 9000);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `merchandise`
--
ALTER TABLE `merchandise`
  ADD PRIMARY KEY (`mid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `merchandise`
--
ALTER TABLE `merchandise`
  MODIFY `mid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
