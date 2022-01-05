-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-01-05 01:40:04
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
  `ISBN` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL COMMENT '書籍名稱',
  `writer` text COLLATE utf8_unicode_ci NOT NULL COMMENT '書籍作者'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `book_list`
--

INSERT INTO `book_list` (`ISBN`, `name`, `writer`) VALUES
(123456, '書籍1', '作者1'),
(123456789, '書籍2', '作者2');

-- --------------------------------------------------------

--
-- 資料表結構 `rent_record`
--

CREATE TABLE `rent_record` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL COMMENT '書籍ID',
  `student_id` text COLLATE utf8_unicode_ci NOT NULL COMMENT '借閱人ID',
  `rent_date` date NOT NULL DEFAULT current_timestamp() COMMENT '租借日期',
  `return_date` date DEFAULT NULL,
  `return_date_limit` date DEFAULT NULL COMMENT '須歸還日期',
  `type` int(11) NOT NULL COMMENT '是否歸還 0/1',
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `rent_record`
--

INSERT INTO `rent_record` (`id`, `book_id`, `student_id`, `rent_date`, `return_date`, `return_date_limit`, `type`, `name`) VALUES
(1, NULL, '16002', '2021-12-17', NULL, NULL, 1, '解決問題：克服困境、突破關卡的思考法和工作術\r\n'),
(2, NULL, '16011', '2021-12-17', NULL, NULL, 1, '力抗暗黑 Azure資安天使的逆襲'),
(3, NULL, '16008', '2021-12-17', NULL, NULL, 1, '演算法 技術手冊'),
(4, NULL, '16012', '2021-12-17', NULL, NULL, 1, '累死你的不是工作，是工作方法：讓GOOGLE、麥肯錫、高盛、哈佛菁英一生受用的46個最強工作術！\r\n'),
(5, NULL, '16002', '2021-12-17', NULL, NULL, 0, '解決問題：克服困境、突破關卡的思考法和工作術\r\n'),
(8, NULL, '16010', '2021-12-17', NULL, NULL, 1, '深入淺出C#'),
(10, NULL, '16001', '2021-12-17', NULL, NULL, 1, '虛擬化與網路儲存技術'),
(11, NULL, '16003', '2021-12-17', NULL, NULL, 1, '時間的秩序'),
(14, NULL, '16006', '2021-12-17', NULL, NULL, 1, '人工智慧開法實務使用Swift'),
(16, NULL, '16005', '2021-12-17', NULL, NULL, 1, '職業駭客的告白'),
(18, NULL, '16007', '2021-12-17', NULL, NULL, 1, 'MIS一定要懂的網路技術知識'),
(20, NULL, '16009', '2021-12-17', NULL, NULL, 1, '資安防禦指南'),
(22, NULL, '16045', '2021-12-17', NULL, NULL, 1, 'Swift學習手冊'),
(24, NULL, '16004', '2021-12-17', NULL, NULL, 1, '精通 Python：運用簡單的套件進行現代運算'),
(40, NULL, '16016', '2021-12-17', NULL, NULL, 1, '改變歷史的加密訊息'),
(41, NULL, '16015', '2021-12-17', NULL, NULL, 1, 'PHP網路爬蟲開發：入門到進階的爬蟲技術指南'),
(42, NULL, '16014', '2021-12-17', NULL, NULL, 1, '精通機器學習：使用Scikit-Learn, Keras與TensorFlow '),
(43, NULL, '16017', '2021-12-17', NULL, NULL, 1, '連結世界的100種新技術：跨領域科技改變人類的未來'),
(44, NULL, '16018', '2021-12-17', NULL, NULL, 1, 'MIS 一定要懂的82個伺服器建置與管理知識'),
(45, NULL, '16022', '2021-12-17', NULL, NULL, 1, 'Python演算法交易'),
(46, NULL, '16020', '2021-12-17', NULL, NULL, 1, '圖解TCP/IP網路通訊協定（涵蓋IPv6）'),
(47, NULL, '16019', '2021-12-17', NULL, NULL, 1, '白話演算法！培養程式設計的邏輯思考'),
(48, NULL, '16024', '2021-12-17', NULL, NULL, 1, '線上教學的技術：快速上手的12堂必修課'),
(49, NULL, '16021', '2021-12-17', NULL, NULL, 1, 'iOS App程式開發實務攻略：快速精通iOS 14程式設計'),
(50, NULL, '16027', '2021-12-17', NULL, NULL, 1, '改變世界的九大演算法: 讓今日電腦無所不能的最強概念'),
(51, NULL, '16026', '2021-12-17', NULL, NULL, 1, '抖音：短影音、演算法、年輕化，世界最有價值新創公司的成功秘密'),
(52, NULL, '16023', '2021-12-17', NULL, NULL, 1, '使用者故事對照：User Story Mapping'),
(53, NULL, '16025', '2021-12-17', NULL, NULL, 1, '倦怠，為何我們不想工作： 努力不一定能賺更多，我的人生站不起來，又不想跪下，除了躺平還可以怎樣？'),
(55, NULL, '16034', '2021-12-17', NULL, NULL, 1, 'JavaScript無所不在'),
(56, NULL, '16032', '2021-12-17', NULL, NULL, 1, '為你自己學Git'),
(57, NULL, '16029', '2021-12-17', NULL, NULL, 1, '防駭戰士'),
(58, NULL, '16031', '2021-12-17', NULL, NULL, 1, '網頁應用程式設計：使用 Node 和 Express'),
(59, NULL, '16028', '2021-12-17', NULL, NULL, 1, '你真的會寫代碼嗎'),
(60, NULL, '16030', '2021-12-17', NULL, NULL, 1, '駭客就在你旁邊：內網安全攻防滲透你死我活'),
(61, NULL, '16033', '2021-12-17', NULL, NULL, 1, 'WEB 設計職人必修：UX Design 初學者學習手冊'),
(62, NULL, '16036', '2021-12-17', NULL, NULL, 1, '極黑駭客專用的OS：Kali Linux2無差別全網滲透'),
(63, NULL, '16044', '2021-12-17', NULL, NULL, 1, 'iOS 14程式設計實戰: Swift 5.3快速上手的開發技巧200+'),
(64, NULL, '16035', '2021-12-17', NULL, NULL, 1, '從 0 到 Webpack：學習 Modern Web 專案的建置方式'),
(65, NULL, '16039', '2021-12-17', NULL, NULL, 1, 'MIS的安全防禦：Linux系統與網路安全'),
(66, NULL, '16038', '2021-12-17', NULL, NULL, 1, 'ios14 programming fundamentals with swift'),
(67, NULL, '16037', '2021-12-17', NULL, NULL, 1, '影像辨識實務應用：使用C#'),
(68, NULL, '16041', '2021-12-17', NULL, NULL, 1, '現代JavaScript實務應用'),
(69, NULL, '16043', '2021-12-17', NULL, NULL, 1, 'MIS網管達人的工具箱'),
(70, NULL, '16040', '2021-12-17', NULL, NULL, 1, '網站擷取：使用Python'),
(72, NULL, '16035', '2021-12-17', NULL, NULL, 1, '從 0 到 Webpack：學習 Modern Web 專案的建置方式'),
(73, NULL, '16045', '2021-12-17', NULL, NULL, 1, 'Swift學習手冊'),
(74, NULL, '816022', '2021-12-22', '2021-12-22', NULL, 1, '時間的秩序'),
(75, NULL, '816021', '2021-12-22', '2021-12-22', NULL, 1, '倦怠，為何我們不想工作'),
(76, NULL, '816010', '2021-12-22', '2021-12-22', NULL, 1, '圖解TCP/IP網路通協設定涵蓋IPv6 2021修訂版'),
(77, NULL, '816025', '2021-12-22', '2021-12-22', NULL, 1, '累死你的不是工作，是工作方法!'),
(78, NULL, '816026', '2021-12-22', '2021-12-22', NULL, 1, '資安防禦指南'),
(79, NULL, '816001', '2021-12-22', '2021-12-22', NULL, 1, '改變歷史的加密訊息'),
(80, NULL, '816003', '2021-12-22', '2021-12-22', NULL, 1, '抖音 短影音、演算法、年輕化，世界最有價值新創公司的成功秘密'),
(81, NULL, '816030', '2021-12-22', '2021-12-22', NULL, 1, 'MIS的安全防禦 Linux系統與網路安全'),
(82, NULL, '816017', '2021-12-22', '2021-12-22', NULL, 1, '虛擬化與網路存儲技術'),
(83, NULL, '816002', '2021-12-22', '2021-12-22', NULL, 1, 'MIS一定要懂的伺服器建置與管理知識'),
(84, NULL, '816001', '2021-12-22', '2021-12-22', NULL, 1, '修改軟件的藝術 構建易維護代碼的9條最佳實踐'),
(85, NULL, '816018', '2021-12-22', '2021-12-22', NULL, 1, '職業駭客的告白'),
(86, NULL, '816006', '2021-12-22', '2021-12-22', NULL, 1, '連結世界的100種新技術'),
(87, NULL, '081008', '2021-12-22', NULL, NULL, 0, '白話演算法!培養程式設計的邏輯思考'),
(88, NULL, '814012', '2021-12-22', '2021-12-22', NULL, 1, '完全自學GO語言 實戰聖經'),
(89, NULL, '814005', '2021-12-22', '2021-12-22', NULL, 1, 'MIS一定要懂得網路技術知識82個'),
(90, NULL, '814014', '2021-12-22', '2021-12-22', NULL, 1, '力抗暗黑 Azure資安天使的逆襲'),
(91, NULL, '814011', '2021-12-22', '2021-12-22', NULL, 1, '白話演算法!培養程式設計的邏輯思考'),
(92, NULL, '814002', '2021-12-22', '2021-12-22', NULL, 1, 'C#入門經典 更新智C#9和.NET5'),
(93, NULL, '814004', '2021-12-22', '2021-12-22', NULL, 1, '防駭戰士'),
(94, NULL, '814016', '2021-12-22', '2021-12-22', NULL, 1, '時間'),
(95, NULL, '814013', '2021-12-22', '2021-12-22', NULL, 1, '為你自己學Git'),
(96, NULL, '814010', '2021-12-22', '2021-12-22', NULL, 1, '駭客就在你身邊 內網安全攻防滲透你死我活'),
(97, NULL, '814008', '2021-12-22', '2021-12-22', NULL, 1, '解決問題 克服困境、突破關卡的思考法和工作術'),
(98, NULL, '814012', '2021-12-22', '2021-12-22', NULL, 1, '抖音：短影音、演算法、年輕化，世界最有價值新創公司的成功秘密'),
(99, NULL, '814013', '2021-12-22', '2021-12-22', NULL, 1, '累死你的不是工作，是工作方法：讓GOOGLE、麥肯錫、高盛、哈佛菁英一生受用的46個最強工作術！'),
(100, NULL, '816030', '2021-12-22', '2021-12-22', NULL, 1, 'MIS的安全防禦 Linux系統與網路安全'),
(101, NULL, '016005', '2021-12-23', '2021-12-23', NULL, 1, '職業'),
(102, NULL, '016043', '2021-12-23', '2021-12-23', NULL, 1, 'MIS網管達人的工具箱 第三版'),
(103, NULL, '016006', '2021-12-23', '2021-12-23', NULL, 1, '人工智慧開發實務-使用Swift'),
(104, NULL, '016042', '2021-12-23', '2021-12-23', NULL, 1, '資安防'),
(105, NULL, '016014', '2021-12-23', '2021-12-23', NULL, 1, '精通機器學習 使用Scikit-Learn, Keras與TensorFlow 第二版'),
(106, NULL, '016021', '2021-12-23', '2021-12-23', NULL, 1, '快速精通IOS14程式設計'),
(107, NULL, '016036', '2021-12-23', '2021-12-23', NULL, 1, '極黑駭客專用的OS：Kali Linux2無差別全網滲透');

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
  ADD PRIMARY KEY (`ISBN`);

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
-- 使用資料表自動遞增(AUTO_INCREMENT) `rent_record`
--
ALTER TABLE `rent_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
