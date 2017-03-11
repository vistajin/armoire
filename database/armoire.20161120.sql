-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2016-11-20 02:32:38
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `armoire`
--

-- --------------------------------------------------------

--
-- 表的结构 `armoire_order`
--

CREATE TABLE `armoire_order` (
  `uid` bigint(20) NOT NULL,
  `order_no` varchar(64) NOT NULL,
  `order_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `create_time` timestamp NOT NULL,
  `update_time` timestamp NOT NULL,
  `user_uid` bigint(20) NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `armoire_order`
--

INSERT INTO `armoire_order` (`uid`, `order_no`, `order_date`, `due_date`, `description`, `create_time`, `update_time`, `user_uid`, `status`) VALUES
(2, '002a', '2016-11-06', '2016-11-19', '佛山禅城越秀岭南隽庭', '2016-11-19 12:46:58', '2016-11-19 14:46:00', 1, '已完成'),
(4, '001', '2016-11-19', '2016-12-10', '新订单001', '2016-11-19 12:08:57', '2016-11-19 12:08:57', 1, '未完成'),
(6, '009', NULL, NULL, '', '2016-11-19 13:47:56', '2016-11-19 13:47:56', 1, '未完成'),
(7, '008', NULL, NULL, '', '2016-11-19 13:49:43', '2016-11-19 13:49:43', 1, '未完成'),
(9, '006', NULL, NULL, '', '2016-11-19 13:50:53', '2016-11-19 13:50:53', 1, '未完成'),
(10, '005', NULL, NULL, '', '2016-11-19 13:51:29', '2016-11-19 13:51:29', 1, '未完成'),
(11, '011', NULL, NULL, '', '2016-11-19 13:51:52', '2016-11-19 13:51:52', 1, '未完成'),
(12, '012', NULL, NULL, '', '2016-11-19 14:05:39', '2016-11-19 14:05:39', 1, '未完成');

-- --------------------------------------------------------

--
-- 表的结构 `armoire_order_item`
--

CREATE TABLE `armoire_order_item` (
  `uid` int(11) NOT NULL,
  `order_uid` int(11) NOT NULL,
  `item_no` int(11) NOT NULL,
  `photo_url` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `create_time` timestamp NOT NULL,
  `update_time` timestamp NOT NULL,
  `user_uid` bigint(20) NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `armoire_order_item`
--

INSERT INTO `armoire_order_item` (`uid`, `order_uid`, `item_no`, `photo_url`, `description`, `create_time`, `update_time`, `user_uid`, `status`) VALUES
(4, 2, 1, '2016-11-20/58310a40d0655.jpg', '1234', '2016-10-31 12:56:17', '2016-11-20 02:28:16', 1, '未完成'),
(5, 2, 2, '2016-11-20/58310a52cf3fe.jpg', 'No. 2', '2016-10-31 13:23:32', '2016-11-20 02:28:34', 1, '未完成'),
(6, 2, 3, '2016-11-20/58310a7922c23.jpg', 'No. 3', '2016-10-31 13:23:43', '2016-11-20 02:29:13', 1, '未完成'),
(7, 3, 100, '2016-11-01/58189fdb57d18.jpg', 'test\r\ntest', '2016-11-01 13:59:55', '2016-11-01 13:59:55', 1, '未完成'),
(8, 2, 5, '2016-11-20/5830fdb6222f8.jpg', 'modify4', '2016-11-02 14:42:02', '2016-11-20 01:34:45', 1, '未完成'),
(9, 2, 4, '2016-11-20/58310a91d73de.jpg', '', '2016-11-02 14:42:28', '2016-11-20 02:29:37', 1, '未完成'),
(10, 3, 101, '2016-11-02/5819fb5f955a6.jpg', '', '2016-11-02 14:42:39', '2016-11-02 14:42:39', 1, '未完成'),
(12, 2, 6, '2016-11-20/58310204d267d.jpg', 'abcd', '2016-11-20 01:53:08', '2016-11-20 01:53:08', 1, '未完成');

-- --------------------------------------------------------

--
-- 表的结构 `armoire_order_item_remark`
--

CREATE TABLE `armoire_order_item_remark` (
  `uid` int(11) NOT NULL,
  `order_uid` bigint(20) NOT NULL,
  `item_uid` int(11) NOT NULL,
  `remark` varchar(512) NOT NULL,
  `assignee` bigint(20) NOT NULL,
  `status` varchar(16) NOT NULL,
  `create_time` timestamp NOT NULL,
  `update_time` timestamp NOT NULL,
  `user_uid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `armoire_order_item_remark`
--

INSERT INTO `armoire_order_item_remark` (`uid`, `order_uid`, `item_uid`, `remark`, `assignee`, `status`, `create_time`, `update_time`, `user_uid`) VALUES
(1, 2, 4, '12345', 9, '已完成', '2016-10-31 15:08:18', '2016-11-18 14:36:44', 1),
(2, 2, 6, '阿斯顿发', 7, '已完成', '2016-10-31 15:08:57', '2016-11-19 09:04:02', 1),
(4, 2, 6, '玻璃窗222', 7, '已完成', '2016-10-31 15:32:38', '2016-11-19 09:11:48', 1),
(10, 2, 5, 'asf', 1, '未完成', '2016-11-01 13:57:44', '2016-11-01 13:57:44', 1),
(11, 2, 4, ' sdfasfsdfaaaaa\r\nbbbbb', 9, '未完成', '2016-11-01 13:57:54', '2016-11-18 14:36:03', 1),
(14, 2, 4, 'werwerasd111', 7, '已完成', '2016-11-08 14:57:29', '2016-11-19 09:03:08', 10),
(18, 2, 8, '444444445555555555', 11, '未完成', '2016-11-18 14:49:11', '2016-11-18 14:49:20', 1);

-- --------------------------------------------------------

--
-- 表的结构 `armoire_user`
--

CREATE TABLE `armoire_user` (
  `uid` bigint(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `create_time` timestamp NOT NULL,
  `last_logon_time` timestamp NULL DEFAULT NULL,
  `user_group` int(11) NOT NULL,
  `display_name` varchar(20) CHARACTER SET gbk NOT NULL,
  `update_time` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `armoire_user`
--

INSERT INTO `armoire_user` (`uid`, `user_name`, `user_password`, `create_time`, `last_logon_time`, `user_group`, `display_name`, `update_time`) VALUES
(1, 'admin', 'e99a18c428cb38d5f260853678922e03', '2016-10-28 13:45:57', '2016-11-19 13:40:31', 1, '管理员', '2016-10-29 14:38:36'),
(7, 'zzz', 'f3abb86bd34cf4d52698f14c0da1dc60', '2016-10-28 15:00:02', '2016-11-20 02:31:50', 4, '张三', '2016-11-01 14:27:10'),
(8, 'lisi', 'dc3a8f1670d65bea69b7b65048a0ac40', '2016-11-01 14:27:10', '2016-11-19 08:37:32', 4, '李四', '2016-11-01 14:27:10'),
(9, 'liuhong', '342b59a201680dbd82d0d5554f30957d', '2016-11-03 14:26:13', '2016-11-19 13:39:34', 2, '刘红', '2016-11-03 14:26:13'),
(10, 'sheji', 'ac2642a1fb3190b439a728401e11f900', '2016-11-03 14:27:02', '2016-11-08 15:15:30', 3, '张设计', '2016-11-03 14:27:02'),
(11, 'wangwu', '9f001e4166cf26bfbdd3b4f67d9ef617', '2016-11-08 15:15:01', NULL, 4, 'wangwu', '2016-11-08 15:15:01');

-- --------------------------------------------------------

--
-- 表的结构 `armoire_user_group`
--

CREATE TABLE `armoire_user_group` (
  `type` int(11) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `armoire_user_group`
--

INSERT INTO `armoire_user_group` (`type`, `description`) VALUES
(1, '管理员'),
(2, '客服'),
(3, '设计拆单'),
(4, '普通员工');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `armoire_order`
--
ALTER TABLE `armoire_order`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `armoire_order_item`
--
ALTER TABLE `armoire_order_item`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `armoire_order_item_remark`
--
ALTER TABLE `armoire_order_item_remark`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `armoire_user`
--
ALTER TABLE `armoire_user`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `armoire_user_group`
--
ALTER TABLE `armoire_user_group`
  ADD PRIMARY KEY (`type`),
  ADD KEY `type` (`type`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `armoire_order`
--
ALTER TABLE `armoire_order`
  MODIFY `uid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `armoire_order_item`
--
ALTER TABLE `armoire_order_item`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `armoire_order_item_remark`
--
ALTER TABLE `armoire_order_item_remark`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- 使用表AUTO_INCREMENT `armoire_user`
--
ALTER TABLE `armoire_user`
  MODIFY `uid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
