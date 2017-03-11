-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-07-03 04:01:57
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thinkyf`
--

-- --------------------------------------------------------

--
-- 表的结构 `think_admin_user`
--

CREATE TABLE IF NOT EXISTS `think_admin_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `think_admin_user`
--

INSERT INTO `think_admin_user` (`id`, `username`, `password`) VALUES
(1, 'vista', 'jly123!'),
(2, 'egg', 'egg123@'),
(3, 'yfadmin', 'hsbccmb123');

-- --------------------------------------------------------

--
-- 表的结构 `think_ads`
--

CREATE TABLE IF NOT EXISTS `think_ads` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL,
  `isShow` tinyint(1) DEFAULT NULL,
  `seq` int(11) NOT NULL,
  `seller_uid` bigint(20) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `think_ads`
--

INSERT INTO `think_ads` (`uid`, `category`, `isShow`, `seq`, `seller_uid`) VALUES
(1, 'homeleftads', 1, 2, 2),
(2, 'homeleftads', 1, 1, 26),
(3, 'homerightads', 1, 4, 54),
(4, 'homerightads', 1, 1, 3),
(6, 'otherleftads', 1, 1, 3),
(7, '', 1, 1, 3),
(8, 'otherleftads', 1, 2, 2),
(9, 'homerightads', 1, 3, 27),
(10, 'homeleftads', NULL, 3, 6),
(11, 'homeleftads', NULL, 4, 8),
(15, 'homeleftads', 1, 5, 19),
(16, 'homeleftads', 1, 6, 4),
(17, 'homeleftads', 1, 7, 5);

-- --------------------------------------------------------

--
-- 表的结构 `think_home_menu`
--

CREATE TABLE IF NOT EXISTS `think_home_menu` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `parent_uid` int(11) DEFAULT NULL,
  `seq` int(11) DEFAULT NULL,
  `isShow` tinyint(1) DEFAULT NULL,
  `text` varchar(50) NOT NULL,
  `template_uid` int(11) DEFAULT NULL,
  `action` varchar(30) NOT NULL,
  `controller` varchar(50) DEFAULT NULL,
  `richtext_uid` bigint(20) DEFAULT NULL,
  `isMenu` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `think_home_menu`
--

INSERT INTO `think_home_menu` (`uid`, `parent_uid`, `seq`, `isShow`, `text`, `template_uid`, `action`, `controller`, `richtext_uid`, `isMenu`) VALUES
(1, NULL, 1, 1, '首页', 1, '/index.html', '/Home/Index', NULL, 1),
(2, NULL, 2, 1, '公司简介', 2, '/corpbrief.html', '/Home/Aboutus', NULL, 1),
(3, NULL, 3, 1, '服务支持', 4, '/Service1.html', '/Home/Service', NULL, 1),
(4, NULL, 4, 1, '最新动态', 3, '/activitylist.html', '/Home/News', NULL, 1),
(5, NULL, 5, 1, '成功案例', 5, '/showProd1', '/Home/ShowCase', NULL, 1),
(6, NULL, 6, 1, '服务定制', 5, '/customize.html', '/Home/Customize', NULL, 1),
(7, NULL, 7, 1, '联系我们', 6, '/inputmsg.html', '/Home/Message', NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `think_home_slide`
--

CREATE TABLE IF NOT EXISTS `think_home_slide` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `path` varchar(256) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `think_home_slide`
--

INSERT INTO `think_home_slide` (`uid`, `description`, `path`, `upload_time`) VALUES
(17, '', '2016-06-12/575d6c1caba82.jpg', '2016-06-12 14:05:16');

-- --------------------------------------------------------

--
-- 表的结构 `think_rich_text`
--

CREATE TABLE IF NOT EXISTS `think_rich_text` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `category` varchar(30) NOT NULL,
  `sub_category` varchar(30) DEFAULT NULL,
  `seq` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `isShow` tinyint(1) DEFAULT NULL,
  `thedate` date DEFAULT NULL,
  `content` longtext NOT NULL,
  `modified_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `think_rich_text`
--

INSERT INTO `think_rich_text` (`uid`, `category`, `sub_category`, `seq`, `title`, `isShow`, `thedate`, `content`, `modified_time`) VALUES
(1, 'position', NULL, NULL, NULL, 1, NULL, '<p>\r\n	欢迎关注猿飞科技网络股份有限公司！<br />\r\n<br />\r\n地址：广州市天河区天河东路220号嘉宝华庭北塔1803室<br />\r\n<br />\r\n<strong>交通： 地铁3号线石牌桥站</strong><br />\r\n<br />\r\n	<iframe style="height:362px;width:560px;" src="http://112.74.106.54/newinfo/Public/kindeditor/plugins/baidumap/index.html?center=113.340648%2C23.142152&zoom=16&width=558&height=360&markers=113.340648%2C23.142152&markerStyles=l%2CA" frameborder="0">\r\n	</iframe>\r\n</p>\r\n<p>\r\n	<br />\r\n<br />\r\n&nbsp;\r\n</p>\r\n<div>\r\n	<br />\r\n</div>', '2016-06-19 08:28:00'),
(2, 'contactus', NULL, NULL, NULL, 1, NULL, '<h3>\r\n	<p>\r\n		&nbsp;\r\n	</p>\r\n	<p>\r\n		<img alt="联系我们" src="http://img.hexun.com/corp/img_07_6.gif" width="102" height="29" />&nbsp;\r\n		<hr />\r\n		<div class="right_con" style="color:#000000;margin:0px;background-color:#ffffff;">\r\n			<div class="address" style="margin:0px 0px 25px;">\r\n				<h1 class="sign02_add" style="font-size:14px;background:url(http://img.hexun.com/corp/img_09.gif) no-repeat 0% 6px;font-weight:normal;">\r\n					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;地址：广州市天河区天河东路220号嘉宝华庭北塔1803室\r\n				</h1>\r\n			</div>\r\n			<div class="address" style="margin:0px 0px 25px;">\r\n				<h1 class="sign02_phone" style="font-size:14px;background:url(http://img.hexun.com/corp/img_10.gif) no-repeat 0% 6px;font-weight:normal;">\r\n					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 联系电话：13422255910（请直接拨打电话联系）\r\n				</h1>\r\n			</div>\r\n		</div>\r\n			</h3>\r\n			<div style="color:#666666;text-align:left;margin:0px;">\r\n				&nbsp;\r\n			</div>\r\n			<div style="color:#666666;text-align:left;margin:0px;">\r\n				以上联系方式为我公司<strong><span style="color:#e53333;">唯一对外联系方式</span></strong>，其余一切打着猿飞科技旗号的网络销售均非我公司所属，<span>请您<span style="color:#e53333;">慎重选择</span>！</span> \r\n			</div>\r\n			<div style="color:#666666;text-align:left;margin:0px;">\r\n				<span></span>&nbsp;\r\n			</div>\r\n			<div style="color:#666666;text-align:left;margin:0px;">\r\n				<span></span>&nbsp;\r\n			</div>\r\n			<div style="color:#666666;text-align:left;margin:0px;">\r\n				&nbsp;\r\n			</div>\r\n			<p>\r\n				&nbsp;\r\n			</p>', '2016-06-19 08:25:08'),
(3, 'corpbrief', NULL, NULL, NULL, 1, NULL, '<p>\r\n	<img src="/newinfo/Public/kindeditor/attached/image/20160612/20160612111008_22837.jpg" alt="" /> \r\n</p>\r\n<p>\r\n	<strong>猿飞科技，是一家专注于为企业提供信息化建设解决方案的网络科技公司。</strong> \r\n</p>\r\n<p>\r\n	<br />\r\n公司目前经营业务范围包括手机应用开发、电子商城开发、企业OA系统开发、企业系统代运营等等服务。贵企业的所有信息化需求都可在本公司得到一站式全程服务。我们相信，精湛的技术加专业的服务定能满足您的要求！我们将本着诚信、规范、创新的经营理念真诚面对每一位客户！\r\n</p>\r\n<p>\r\n	<strong>--我们的理念--</strong><br />\r\n服务承诺：精湛技术加专业服务，定制打造您的优势平台<br />\r\n服务宗旨：及时、专业、高效<br />\r\n服务理念：诚信、规范、创新<br />\r\n业务作风：我们每天都以热心和微笑对待每一位客户<br />\r\n企业价值：以先进的技术和满意的服务换取最大的生存价值<span style="color:#E53333;"></span> \r\n</p>\r\n<p>\r\n	<br />\r\n<strong>--我们的优势--</strong> \r\n</p>\r\n<p>\r\n	<span style="color:#006600;"><strong>为您定制平台</strong></span><br />\r\n对大部分企业来讲，普通的信息平台虽然能够满足企业的基本需求，但缺乏竞争优势。我公司可为您提供专业的信息技术解决方案，定制专属于您的平台。<br />\r\n<span style="color:#006600;"><strong>我们的经验丰富</strong></span><br />\r\n我们为企业提供功能强大的服务。包括建立系统后台管理、用户数据分析等项目。我们的专业工程师不仅经验丰富，而且能及时快速地提供强大的技术支持，保障用户系统正常持续运行！\r\n</p>\r\n<p>\r\n	<span style="color:#006600;"><strong>我们技术全面</strong></span><br />\r\n企业会遭遇很多信息化建设方面的问题，比如数据库建立、迁移、企业网站优化、整合等等，相关内容往往需要多个专业工程师才能完成，我公司技术工程师有着全面的技术实力，完全有能力为您提供一条龙服务，使您可高枕无忧，方便完善！\r\n</p>\r\n<p>\r\n	<span style="color:#006600;"><strong>我们服务稳定</strong></span><br />\r\n信息化办公是未来企业发展中重要一环，而IT人员流动性相对来说比较大，因而给保障系统运行的稳定提出了考验。我们有专业的团队、完善的管理制度和坚持到永远的理念，为您及您的企业信息化发展保驾护航！\r\n</p>', '2016-06-12 11:29:13'),
(4, 'activity', NULL, 33, '公司新闻2', 1, '2015-06-18', '<p>\r\n	<span><span style="line-height:24px;">公司新闻2内容</span></span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '2016-06-10 14:37:28'),
(5, 'activity', NULL, 35, '公司新闻3', 1, '2015-06-06', '<p>\r\n	<b>公司新闻3内容</b>\r\n</p>', '2016-06-10 14:37:42'),
(6, 'activity', NULL, 32, '公司新闻1', 1, '2015-07-26', '<p>\r\n	公司新闻1的内容\r\n</p>', '2016-06-10 14:32:28'),
(7, 'srvc_srvc1', NULL, NULL, NULL, NULL, NULL, '<p>\r\n	我们提供企业网站，电子商务网站，政府事业网站，门户网站，品牌网站，活动网站，产品网站，手机/微信/移动端网站 的全套开发和维护。并根据您的实际需要，定制专属您的网站\r\n</p>\r\n<p>\r\n	我们会定期为您的站点进行诊断，以保障网站平稳运行，诊断中有优化，运维，营销等方面问题，我们会及时给出意见建议\r\n</p>\r\n<p>\r\n	在您的使用过程中，可以根据营运需求向我们提出二次需求，我们为您实现各种技术支持\r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>', '2016-06-19 09:18:14'),
(8, 'srvc_srvc2', NULL, NULL, NULL, NULL, NULL, '我们提供生活类APP, 企业类APP, 政府服务类APP,平台类APP 的全套开发和维护。包含ISO 和 Andriod 开发', '2016-06-10 14:31:33'),
(9, 'srvc_srvc3', NULL, NULL, NULL, NULL, NULL, '企业自动化可以帮助贵公司建立信息发布的公共平台，　实现各种工作流程的自动化，实现知识管理／共享自动化，辅助各种办公需求（会议管理，车辆管理等日常事务性），实现协同办公', '2016-06-10 14:31:42'),
(10, 'showProd4', NULL, 1, 'A公司网站代运营', 1, '2016-06-09', 'A公司的网络代运营案例', '2016-06-11 13:43:06');

-- --------------------------------------------------------

--
-- 表的结构 `think_showcase`
--

CREATE TABLE IF NOT EXISTS `think_showcase` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_uid` bigint(20) NOT NULL,
  `logo` varchar(512) NOT NULL,
  `company_name` varchar(256) NOT NULL,
  `company_url` varchar(512) DEFAULT NULL,
  `company_wechat` varchar(512) DEFAULT NULL,
  `description` text NOT NULL,
  `photo1` varchar(512) DEFAULT NULL,
  `photo2` varchar(512) DEFAULT NULL,
  `photo3` varchar(512) DEFAULT NULL,
  `photo4` varchar(512) DEFAULT NULL,
  `photo5` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `think_showcase_category`
--

CREATE TABLE IF NOT EXISTS `think_showcase_category` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `text` varchar(256) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `think_showcase_category`
--

INSERT INTO `think_showcase_category` (`uid`, `text`) VALUES
(1, '网站开发'),
(2, '手机应用'),
(3, 'test');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
