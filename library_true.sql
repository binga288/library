-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-01-05 01:53:52
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
-- 資料庫： `library_true`
--

-- --------------------------------------------------------

--
-- 資料表結構 `book_all`
--

CREATE TABLE `book_all` (
  `id` int(11) NOT NULL,
  `isbn_id` int(11) NOT NULL COMMENT '書籍資料關聯',
  `last_rent_id` int(11) NOT NULL COMMENT '最後借閱紀錄ID',
  `type` tinyint(1) NOT NULL COMMENT '是否在館 0/1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `isbn_list`
--

CREATE TABLE `isbn_list` (
  `ISBN` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL COMMENT '書籍名稱',
  `writer` text COLLATE utf8_unicode_ci NOT NULL COMMENT '書籍作者'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `isbn_list`
--

INSERT INTO `isbn_list` (`ISBN`, `name`, `writer`) VALUES
(123456, '書籍1', '作者1'),
(123456789, '書籍2', '作者2');

-- --------------------------------------------------------

--
-- 資料表結構 `renter`
--

CREATE TABLE `renter` (
  `id` int(11) NOT NULL,
  `student_id` text COLLATE utf8_unicode_ci NOT NULL COMMENT '學號',
  `name` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `rent_record`
--

CREATE TABLE `rent_record` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL COMMENT '書本關聯',
  `renter_id` int(11) NOT NULL COMMENT '借閱人關聯',
  `rent_date` date NOT NULL DEFAULT current_timestamp() COMMENT '租借日期',
  `return_date` date DEFAULT NULL,
  `return_date_limit` date DEFAULT NULL COMMENT '須歸還日期',
  `type` tinyint(1) NOT NULL COMMENT '是否歸還 0/1'
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
-- 資料表索引 `isbn_list`
--
ALTER TABLE `isbn_list`
  ADD PRIMARY KEY (`ISBN`);

--
-- 資料表索引 `renter`
--
ALTER TABLE `renter`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `rent_record`
--
ALTER TABLE `rent_record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rent_record_ibfk_1` (`book_id`),
  ADD KEY `rent_id` (`renter_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `book_all`
--
ALTER TABLE `book_all`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `renter`
--
ALTER TABLE `renter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `rent_record`
--
ALTER TABLE `rent_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `rent_record`
--
ALTER TABLE `rent_record`
  ADD CONSTRAINT `rent_record_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book_all` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rent_record_ibfk_2` FOREIGN KEY (`renter_id`) REFERENCES `renter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;