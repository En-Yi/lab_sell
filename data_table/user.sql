-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-05-23 12:05:47
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
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `id_number` varchar(10) DEFAULT NULL,
  `real_name` varchar(20) DEFAULT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`uid`, `password`, `id_number`, `real_name`, `user_name`, `phone_number`, `email`) VALUES
(1, '123', '456', 'ne', 'tobio', '0987987987', 'ptgsdace210744@g-mail.nsysu.edu.tw'),
(2, '88', '2222', 'sayu', 'sayudesu', '0303', 'ptgsdace210744@g-mail.nsysu.edu.tw'),
(3, '00', '2222', 'sponge', 'bob', '123456', 'ptgsdace210744@g-mail.nsysu.edu.tw'),
(4, '99', '354', 'dio', 'dio', '45454', 'ptgsdace210744@g-mail.nsysu.edu.tw'),
(12, 'qq', 'qq', 'qq', 'qq', 'qq', 'qq'),
(13, 'g', '741', 'aragaki yui', 'gakki', '321', 'ptgsdace210744@gmail.com'),
(14, 'd', 'd123', '小海豚', 'doph', '1231', 'dolphin@mail');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
