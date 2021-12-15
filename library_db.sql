-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-12-15 03:59:54
-- 伺服器版本： 10.4.19-MariaDB
-- PHP 版本： 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `library_db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `book_all`
--

CREATE TABLE `book_all` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL COMMENT '書籍ID',
  `last_rent_id` int(11) NOT NULL COMMENT '最後借閱紀錄ID',
  `type` int(11) NOT NULL COMMENT '是否在館 0/1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `book_list`
--

CREATE TABLE `book_list` (
  `id` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL COMMENT '書籍名稱',
  `writer` text COLLATE utf8_unicode_ci NOT NULL COMMENT '書籍作者'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `book_list`
--

INSERT INTO `book_list` (`id`, `ISBN`, `name`, `writer`) VALUES
(1, 123456789, '測試書籍1', '測試作者1'),
(3, 123456788, '測試書籍2', '測試作者2');

-- --------------------------------------------------------

--
-- 資料表結構 `rent_record`
--

CREATE TABLE `rent_record` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL COMMENT '書籍ID',
  `student_id` int(11) NOT NULL COMMENT '借閱人ID',
  `rent_date` date NOT NULL COMMENT '租借日期',
  `return_date` date NOT NULL COMMENT '須歸還日期',
  `type` int(11) NOT NULL COMMENT '是否歸還 0/1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL COMMENT '學號',
  `name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `identity` text COLLATE utf8_unicode_ci NOT NULL COMMENT '身分別'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `book_all`
--
ALTER TABLE `book_all`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `book_list`
--
ALTER TABLE `book_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ISBN` (`ISBN`);

--
-- 資料表索引 `rent_record`
--
ALTER TABLE `rent_record`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `book_all`
--
ALTER TABLE `book_all`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `book_list`
--
ALTER TABLE `book_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `rent_record`
--
ALTER TABLE `rent_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
