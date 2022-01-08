-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-01-08 17:04:54
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `library`
--

-- --------------------------------------------------------

--
-- 資料表結構 `book_list`
--

CREATE TABLE `book_list` (
  `id` int(11) NOT NULL,
  `isbn_id` int(11) NOT NULL COMMENT '書籍資料關聯',
  `last_rent_id` int(11) DEFAULT NULL COMMENT '最後借閱紀錄ID',
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否在館 0/1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `book_list`
--

INSERT INTO `book_list` (`id`, `isbn_id`, `last_rent_id`, `type`) VALUES
(1, 1, 4, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `isbn_list`
--

CREATE TABLE `isbn_list` (
  `id` int(11) NOT NULL,
  `ISBN` text COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL COMMENT '書籍名稱',
  `writer` text COLLATE utf8_unicode_ci NOT NULL COMMENT '書籍作者',
  `thumbnail` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `isbn_list`
--

INSERT INTO `isbn_list` (`id`, `ISBN`, `title`, `writer`, `thumbnail`) VALUES
(1, '9789864767892', 'More Effective C#中文版 | 寫出良好C#程式的50個具體做法 第二版(電子書)', 'Bill Wagner', 'http://books.google.com/books/content?id=NRNhDwAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api');

-- --------------------------------------------------------

--
-- 資料表結構 `renter`
--

CREATE TABLE `renter` (
  `id` int(11) NOT NULL,
  `student_id` text COLLATE utf8_unicode_ci NOT NULL COMMENT '學號',
  `name` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `renter`
--

INSERT INTO `renter` (`id`, `student_id`, `name`) VALUES
(1, '816011', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `rent_record`
--

CREATE TABLE `rent_record` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL COMMENT '書本關聯',
  `renter_id` int(11) NOT NULL COMMENT '借閱人關聯',
  `rent_date` date NOT NULL DEFAULT current_timestamp() COMMENT '租借日期',
  `return_date` date DEFAULT NULL COMMENT '歸還日期',
  `return_date_limit` date DEFAULT NULL COMMENT '須歸還日期',
  `type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '是否歸還 0/1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `rent_record`
--

INSERT INTO `rent_record` (`id`, `book_id`, `renter_id`, `rent_date`, `return_date`, `return_date_limit`, `type`) VALUES
(1, 1, 1, '2022-01-08', NULL, '2022-02-07', 1),
(4, 1, 1, '2022-01-09', NULL, '2022-02-07', 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `book_list`
--
ALTER TABLE `book_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `isbn_id` (`isbn_id`);

--
-- 資料表索引 `isbn_list`
--
ALTER TABLE `isbn_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ISBN` (`ISBN`) USING HASH;

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
-- 使用資料表自動遞增(AUTO_INCREMENT) `book_list`
--
ALTER TABLE `book_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `isbn_list`
--
ALTER TABLE `isbn_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `renter`
--
ALTER TABLE `renter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `rent_record`
--
ALTER TABLE `rent_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `book_list`
--
ALTER TABLE `book_list`
  ADD CONSTRAINT `book_list_ibfk_1` FOREIGN KEY (`isbn_id`) REFERENCES `isbn_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `rent_record`
--
ALTER TABLE `rent_record`
  ADD CONSTRAINT `rent_record_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rent_record_ibfk_2` FOREIGN KEY (`renter_id`) REFERENCES `renter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
