-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 09 月 23 日 05:49
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `my_think`
--

-- --------------------------------------------------------

--
-- 表的结构 `my_admin`
--

CREATE TABLE IF NOT EXISTS `my_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) COLLATE utf8_bin NOT NULL COMMENT '用户名',
  `password` varchar(200) COLLATE utf8_bin NOT NULL COMMENT '密码',
  `sign` char(100) COLLATE utf8_bin NOT NULL COMMENT '加密字符窜',
  `role_id` tinyint(5) NOT NULL COMMENT '用户角色',
  `name` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '真实姓名/昵称',
  `tel` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '联系电话',
  `email` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '邮箱',
  `isshow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '账户是否启用1启用 0禁用',
  `logintime` int(11) NOT NULL COMMENT '最近一次登录时间',
  `loginip` varchar(200) COLLATE utf8_bin NOT NULL COMMENT '最近一次登录ip',
  `addadmin` int(11) NOT NULL DEFAULT '0' COMMENT '添加人id',
  `addtime` int(11) NOT NULL COMMENT '添加时间',
  `updatetime` int(11) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='管理员表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `my_admin`
--

INSERT INTO `my_admin` (`id`, `username`, `password`, `sign`, `role_id`, `name`, `tel`, `email`, `isshow`, `logintime`, `loginip`, `addadmin`, `addtime`, `updatetime`) VALUES
(1, 'testadmin', '96b91ecf14dc4a139c8c9a043918875d', 'wangyue', 0, '尉强', '18001131105', '1012162814@qq.om', 1, 1405239202, '127.0.0.1', 0, 0, 1405239202),
(2, 'admin', '78184dae9a129b1b12d4ce6177056865', 'nr20g', 1, 'admin', '18001131105', '1012162814@qq.com', 1, 1411451029, '127.0.0.1', 1, 1405235431, 1411451029);

-- --------------------------------------------------------

--
-- 表的结构 `my_admin_role`
--

CREATE TABLE IF NOT EXISTS `my_admin_role` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_bin NOT NULL COMMENT '用户组名称',
  `description` varchar(500) COLLATE utf8_bin NOT NULL COMMENT '描述',
  `condition` text COLLATE utf8_bin NOT NULL COMMENT '组所有权限',
  `isshow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1启用 0禁用',
  `sort` int(11) NOT NULL COMMENT '排序',
  `addadmin` int(11) NOT NULL COMMENT '添加管理员id',
  `addtime` int(11) NOT NULL COMMENT '添加时间',
  `updatetime` int(11) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='管理员权限表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `my_admin_role`
--

INSERT INTO `my_admin_role` (`id`, `name`, `description`, `condition`, `isshow`, `sort`, `addadmin`, `addtime`, `updatetime`) VALUES
(1, '系统管理员', '系统管理员', 'All', 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `my_article`
--

CREATE TABLE IF NOT EXISTS `my_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_bin NOT NULL COMMENT '文章标题',
  `seotitle` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT 'seo标题',
  `shorttitle` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '简略标题',
  `flag` varchar(400) COLLATE utf8_bin DEFAULT NULL COMMENT '自定义属性',
  `source` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '来源',
  `author` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '作者',
  `image` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '缩略图',
  `tid` int(11) NOT NULL COMMENT '栏目id',
  `alltid` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '副栏目',
  `url` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '跳转地址',
  `keywords` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '关键词',
  `description` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '描述',
  `sort` int(11) NOT NULL COMMENT '排序',
  `onclick` int(11) NOT NULL DEFAULT '0' COMMENT '点击量',
  `isshow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 显示 0隐藏',
  `addadmin` int(11) NOT NULL COMMENT '管理员id',
  `addtime` int(11) NOT NULL COMMENT '添加时间',
  `updatetime` int(11) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='文章主表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_cart`
--

CREATE TABLE IF NOT EXISTS `my_cart` (
  `user_id` int(255) NOT NULL,
  `num` int(100) NOT NULL,
  `sp_id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `my_cart`
--

INSERT INTO `my_cart` (`user_id`, `num`, `sp_id`) VALUES
(25, 20, 34),
(25, 20, 33);

-- --------------------------------------------------------

--
-- 表的结构 `my_category`
--

CREATE TABLE IF NOT EXISTS `my_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upid` int(11) NOT NULL COMMENT '上级id',
  `topid` int(11) NOT NULL COMMENT '顶级id',
  `path` varchar(200) COLLATE utf8_bin NOT NULL COMMENT '栏目路径',
  `catname` varchar(200) COLLATE utf8_bin NOT NULL COMMENT '栏目名称',
  `catename` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '栏目名词（英）',
  `image` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '栏目图片',
  `seotitle` varchar(200) COLLATE utf8_bin NOT NULL COMMENT '栏目SEO 标题',
  `keywords` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '关键词',
  `dscription` varchar(500) COLLATE utf8_bin DEFAULT NULL COMMENT '描述',
  `type` tinyint(5) NOT NULL COMMENT '栏目类型1内容列表、2内容单页、3栏目主页、4列表主页、5单页主页、0外部链接',
  `modelid` tinyint(5) NOT NULL DEFAULT '0' COMMENT '内容模型的id',
  `addadmin` int(11) NOT NULL COMMENT '添加管理员id',
  `addtime` int(11) NOT NULL COMMENT '添加时间',
  `updatetime` int(11) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='栏目管理' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_class`
--

CREATE TABLE IF NOT EXISTS `my_class` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `sort` int(255) NOT NULL,
  `pid` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='分类目录' AUTO_INCREMENT=28 ;

--
-- 转存表中的数据 `my_class`
--

INSERT INTO `my_class` (`id`, `name`, `sort`, `pid`) VALUES
(22, '库存1', 1, 22),
(23, 'PHP', 10, 23),
(26, 'ABC', 10, 22),
(27, 'AAA', 11, 23);

-- --------------------------------------------------------

--
-- 表的结构 `my_config`
--

CREATE TABLE IF NOT EXISTS `my_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '字段名',
  `cfg` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '字段名称',
  `content` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '内容',
  `description` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '描述',
  `input` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'text' COMMENT '字段类型',
  `info` varchar(400) NOT NULL COMMENT '多选项',
  `isshow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1显示 0 隐藏',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `updatetime` int(11) NOT NULL COMMENT '操作时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cfg` (`cfg`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `my_config`
--

INSERT INTO `my_config` (`id`, `name`, `cfg`, `content`, `description`, `input`, `info`, `isshow`, `sort`, `updatetime`) VALUES
(1, '网站标题', 'title', '北京瑞德轩科贸有限公司', '', 'text', '', 1, 1, 1411121242),
(2, '网站域名', 'domain', '网站域名', '', 'text', '', 1, 2, 1411121242),
(3, '关键词', 'keywords', '关键词', '', 'text', '', 1, 3, 1411121242),
(4, '描述', 'description', '描述', '', 'textarea', '', 1, 4, 1411121242),
(5, '版权信息', 'footer', '地址：中国.北京.朝阳区望京广顺南大街21号蓝色家族C座1102室   |  电话：86-010-51297708  |   ', '', 'textarea', '', 1, 5, 1411121242),
(6, '头部JS', 'topjs', '头部JS', '', 'textarea', '', 1, 6, 1411121242),
(7, '底部JS', 'footerjs', '底部JS', '', 'textarea', '', 1, 7, 1411121242),
(8, '网站状态', 'status', '1', '', 'bool', '', 1, 8, 1411121242),
(9, '提示语', 'tip', '网站未备案', '网站关闭的提示语', 'textarea', '', 1, 9, 1411121242),
(10, '网站二维码', 'wem', '/Uploads/image/20140713/ewm.png', '', 'image', '', 1, 10, 1411121242);

-- --------------------------------------------------------

--
-- 表的结构 `my_dingdan`
--

CREATE TABLE IF NOT EXISTS `my_dingdan` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) NOT NULL,
  `Call` int(16) NOT NULL,
  `Phone` int(20) NOT NULL,
  `CallTrue` int(20) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `Tm` varchar(100) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `ordernum` int(255) NOT NULL,
  `Pay` int(11) NOT NULL DEFAULT '0' COMMENT '是否付款0未付款1已付款',
  `countpre` float NOT NULL,
  `HuiShou` int(11) NOT NULL DEFAULT '1' COMMENT '加入回收站',
  `FenXiaoS` int(11) NOT NULL COMMENT '分销商ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=146 ;

--
-- 转存表中的数据 `my_dingdan`
--

INSERT INTO `my_dingdan` (`id`, `Name`, `Call`, `Phone`, `CallTrue`, `Mail`, `Tm`, `Address`, `ordernum`, `Pay`, `countpre`, `HuiShou`, `FenXiaoS`) VALUES
(1, '', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0),
(2, '', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0),
(3, '', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0),
(4, '', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0),
(5, '', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0),
(6, '', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0),
(7, '', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0),
(8, 'xxx', 106666666, 6666666, 6666, '', '666', '666666', 0, 0, 0, 1, 0),
(9, '55', 55, 55, 55, '', '555', '55', 0, 0, 0, 0, 0),
(10, '55', 55, 55, 55, '', '555', '55', 0, 0, 0, 0, 0),
(11, '00', 0, 0, 0, '', '000', '000', 0, 0, 0, 0, 0),
(12, '11', 11, 11, 11, '', '11', '11', 1411023530, 0, 0, 0, 0),
(13, '11', 11, 11, 11, '', '11', '11', 1411024313, 0, 0, 0, 0),
(14, '11', 11, 11, 11, '', '11', '11', 1411024336, 0, 0, 0, 0),
(15, '11', 11, 11, 11, '', '11', '11', 1411024879, 0, 0, 0, 0),
(16, '11', 11, 11, 11, '', '11', '11', 1411024899, 0, 0, 0, 0),
(17, '11', 11, 11, 11, '', '11', '11', 1411025660, 0, 0, 0, 0),
(18, '11', 11, 11, 11, '', '11', '11', 1411025664, 0, 0, 0, 0),
(19, '11222222', 11, 11, 11, '', '11', '11', 1411025670, 0, 0, 0, 0),
(20, '11222222', 11, 11, 11, '', '11', '11', 1411025789, 0, 0, 0, 0),
(21, '11222222', 11, 11, 11, '', '11', '11', 1411025792, 0, 0, 0, 0),
(22, '11222222', 112222, 11, 11, '', '11', '11', 1411025799, 0, 0, 0, 0),
(23, '11222222', 112222, 11, 11, '', '11', '11', 1411027260, 0, 0, 0, 0),
(24, '666', 666, 666, 666, '', '666', '666', 1411027927, 0, 0, 0, 0),
(25, 'asd', 0, 0, 0, '', 'asd', 'asd', 1411031839, 0, 0, 0, 0),
(26, 'asd', 0, 0, 0, '', 'asd', 'asd', 1411032218, 0, 0, 0, 0),
(27, 'asd', 0, 0, 0, '', 'asd', 'asd', 1411032245, 0, 0, 0, 0),
(28, 'asd', 0, 0, 0, '', 'asd', 'asd', 1411032330, 0, 0, 0, 0),
(29, 'asd', 0, 0, 0, '', 'asd', 'asd', 1411032416, 0, 0, 0, 0),
(30, 'asd', 0, 0, 0, '', 'asd', 'asd', 1411032469, 0, 0, 0, 0),
(31, '1', 1, 1, 1, '', '1', '1', 1411032538, 0, 0, 0, 0),
(32, '1', 1, 1, 1, '', '1', '1', 1411032854, 0, 0, 0, 0),
(33, '222', 22, 22, 22, '', '22', '22', 1411032883, 0, 0, 0, 0),
(34, '222', 22, 22, 22, '', '22', '22', 1411033457, 0, 0, 0, 0),
(35, '222', 22, 22, 22, '', '22', '22', 1411033458, 0, 0, 0, 0),
(36, 'asd', 0, 0, 0, '', 'asd', 'asd', 1411033523, 0, 0, 0, 0),
(37, '123', 123, 123, 123, '', '123', '132', 1411034926, 0, 0, 0, 0),
(38, '123', 123, 123, 123, '', '123', '132', 1411034942, 0, 0, 0, 0),
(39, '', 0, 0, 0, '', '', '', 1411094118, 0, 0, 0, 0),
(40, '', 0, 0, 0, '', '', '', 1411094123, 0, 0, 0, 0),
(41, '', 0, 0, 0, '', '', '', 1411094125, 0, 0, 0, 0),
(42, '', 0, 0, 0, '', '', '', 1411094131, 0, 0, 0, 0),
(43, '', 0, 0, 0, '', '', '', 1411094195, 0, 0, 0, 0),
(44, '', 0, 0, 0, '', '', '', 1411094750, 0, 0, 0, 0),
(45, '', 0, 0, 0, '', '', '', 1411094756, 0, 0, 0, 0),
(46, '', 0, 0, 0, '', '', '', 1411094840, 0, 0, 0, 0),
(47, '', 0, 0, 0, '', '', '', 1411094844, 0, 0, 0, 0),
(48, '', 0, 0, 0, '', '', '', 1411094850, 0, 0, 0, 0),
(49, '', 0, 0, 0, '', '', '', 1411094851, 0, 0, 0, 0),
(50, '', 0, 0, 0, '', '', '', 1411094853, 0, 0, 0, 0),
(51, '', 0, 0, 0, '', '', '', 1411094858, 0, 0, 0, 0),
(52, '', 0, 0, 0, '', '', '', 1411094863, 0, 0, 0, 0),
(53, '', 0, 0, 0, '', '', '', 1411095425, 0, 0, 0, 0),
(54, '', 0, 0, 0, '', '', '', 1411095462, 0, 0, 0, 0),
(55, '', 0, 0, 0, '', '', '', 1411095507, 0, 0, 0, 0),
(56, 'asd', 0, 0, 0, '', 'asd', 'asd', 1411095516, 0, 0, 0, 0),
(57, 'asd', 0, 0, 0, '', 'asd', 'asd', 1411095523, 0, 0, 0, 0),
(58, 'asd', 0, 0, 0, '', 'asd', 'asd', 1411095527, 0, 0, 0, 0),
(59, 'asd', 0, 0, 0, '', 'asd', 'asd', 1411095587, 0, 0, 0, 0),
(60, 'asd', 0, 0, 0, 'asdasd', 'asd', 'asd', 1411095942, 0, 0, 0, 0),
(61, 'asd', 0, 0, 0, 'asdasd', 'asd', 'asd', 1411096908, 0, 0, 0, 0),
(62, 'asd', 0, 0, 0, 'asdasd', 'asd', 'asd', 1411096912, 0, 0, 0, 0),
(63, '小明', 666, 666, 666, '666', '666', '6666', 1411097033, 0, 0, 0, 0),
(64, '小明', 666, 666, 666, '666', '666', '6666', 1411097169, 0, 0, 0, 0),
(65, '小明', 666, 666, 666, '666', '666', '6666', 1411097171, 0, 0, 0, 0),
(66, '小明', 666, 666, 666, '666', '666', '6666', 1411097291, 0, 0, 0, 0),
(67, '65', 65, 65, 656, '56', '56', '56', 1411097904, 0, 0, 0, 0),
(68, '65', 65, 65, 656, '56', '56', '56', 1411097913, 0, 0, 0, 0),
(69, '', 0, 0, 0, '', '', '', 1411103259, 0, 0, 0, 0),
(70, '', 0, 0, 0, '', '', '', 1411103271, 0, 0, 0, 0),
(71, '', 0, 0, 0, '', '', '', 1411103288, 0, 0, 0, 0),
(72, '', 0, 0, 0, '', '', '', 1411103334, 0, 0, 0, 0),
(73, 'AAA', 123, 123, 132, '123', '13', '13', 1411103426, 0, 0, 0, 0),
(74, 'AAA', 123, 123, 132, '123', '13', '13', 1411103468, 0, 0, 0, 0),
(75, 'AAA', 123, 123, 132, '123', '13', '13', 1411103612, 0, 0, 0, 0),
(76, 'AAA', 123, 123, 132, '123', '13', '13', 1411103651, 0, 0, 0, 0),
(77, 'AAA', 123, 123, 132, '123', '13', '13', 1411103782, 0, 0, 0, 0),
(78, '55', 55, 55, 5, '55', '5', '55', 1411103803, 0, 0, 0, 0),
(79, '55', 55, 55, 5, '55', '5', '55', 1411103809, 0, 0, 0, 0),
(80, '55', 55, 55, 5, '55', '5', '55', 1411104262, 0, 0, 0, 0),
(81, '55', 55, 55, 5, '55', '5', '55', 1411104268, 0, 0, 0, 0),
(82, '5', 55, 5, 5, '5', '5', '55', 1411104354, 0, 0, 0, 0),
(83, '55', 55, 5, 55, '5', '5', '55', 1411104395, 0, 0, 0, 0),
(84, '55', 55, 5, 55, '5', '5', '55', 1411104474, 0, 0, 0, 0),
(85, '123', 123, 132, 123, '123', '123', '2131', 1411104887, 0, 0, 0, 0),
(86, '123', 123, 132, 123, '123', '123', '2131', 1411105416, 0, 0, 0, 0),
(87, '123', 13, 132, 123, '123', '1231', '23', 1411105457, 0, 0, 0, 0),
(88, '123', 13, 132, 123, '123', '1231', '23', 1411105530, 0, 0, 0, 0),
(89, '123', 13, 132, 123, '123', '1231', '23', 1411105532, 0, 0, 0, 0),
(90, '123', 13, 132, 123, '123', '1231', '23', 1411105544, 0, 0, 0, 0),
(91, '123', 13, 132, 123, '123', '1231', '23', 1411105546, 0, 0, 0, 0),
(92, '123', 13, 132, 123, '123', '1231', '23', 1411105550, 0, 0, 0, 0),
(93, '11222222', 11, 11, 11, '1', '1', '1', 1411105571, 0, 0, 0, 0),
(94, '11222222', 11, 11, 11, '1', '1', '1', 1411105598, 0, 0, 0, 0),
(95, 'qwe', 1, 1, 1, '1', '1', '1', 1411105621, 0, 0, 0, 0),
(96, 'qwe', 1, 1, 1, '1', '1', '1', 1411105675, 0, 0, 0, 0),
(97, '123', 123, 123, 123, '123', '123', '123', 1411105713, 0, 0, 0, 0),
(98, '123', 123, 123, 123, '123', '123', '123', 1411105725, 0, 0, 0, 0),
(99, 'asd', 1, 1, 1, '1', '1', '1', 1411105753, 0, 0, 0, 0),
(100, '11', 11, 11, 11, '11', '11', '11', 1411109165, 0, 0, 0, 0),
(101, '11', 11, 11, 11, '11', '11', '11', 1411109250, 0, 0, 0, 0),
(102, '1', 3, 3, 3, '3', '3', '3', 1411109362, 0, 0, 1, 0),
(104, '456', 456, 4654, 6546, '54654', '6546', '46', 1411118515, 0, 0, 1, 0),
(105, '456', 456, 4654, 6546, '54654', '6546', '46', 1411118533, 0, 0, 1, 0),
(106, '132', 123, 123, 13, '21', '1231', '31', 1411118554, 0, 0, 1, 0),
(107, '132', 123, 123, 13, '21', '1231', '31', 1411118882, 0, 0, 1, 0),
(108, '132', 123, 123, 13, '21', '1231', '31', 1411118883, 0, 0, 1, 0),
(109, '132', 123, 123, 13, '21', '1231', '31', 1411118886, 0, 0, 1, 0),
(110, '123', 123, 123, 123, '123', '123', '123', 1411118917, 0, 0, 1, 0),
(111, '小明', 1111, 111, 11, '11', '11', '11', 1411121390, 1, 500, 1, 55),
(112, '1', 1, 1, 1, '1', '1', '1', 1411121644, 1, 20.2, 1, 0),
(113, '', 0, 0, 0, '', '', '', 1411121710, 0, 0, 1, 0),
(114, '', 0, 0, 0, '', '', '', 1411121720, 0, 0, 1, 0),
(115, '23', 123, 123, 1123, '123', '123', '123', 1411348607, 0, 0, 1, 0),
(116, '11', 11, 11, 11, '11', '11', '11', 1411361573, 0, 0, 1, 0),
(117, '11', 111, 11, 11, '1', '11', '11', 1411361970, 0, 0, 1, 0),
(118, 'ABC', 123, 123, 132, '13', '123', '123', 1411363878, 1, 400, 1, 25),
(119, '123', 0, 123, 0, '', '', '123', 1411376718, 0, 0, 1, 25),
(120, '123', 0, 123, 0, '', '', '123', 1411376815, 0, 0, 1, 25),
(121, '123', 0, 123, 0, '', '', '123', 1411376817, 0, 0, 1, 25),
(122, '', 0, 0, 0, '', '', '', 1411379551, 0, 0, 1, 25),
(123, '', 0, 0, 0, '', '', '', 1411379567, 0, 0, 1, 25),
(124, '12', 0, 12, 0, '', '', '12', 1411379794, 0, 0, 1, 25),
(125, '12', 0, 12, 0, '', '', '12', 1411379887, 0, 0, 1, 25),
(126, '123', 123, 1, 0, '', '', '1', 1411380808, 0, 0, 1, 25),
(127, '123', 123, 1, 0, '', '', '1', 1411380811, 0, 0, 1, 25),
(128, '1', 0, 1, 0, '', '', '1', 1411396021, 0, 0, 1, 25),
(129, '2', 0, 2, 0, '', '', '2', 1411396080, 0, 0, 1, 25),
(130, '111', 1, 1, 0, '', '', '1', 1411397023, 0, 0, 1, 25),
(131, '1', 0, 1, 0, '', '', '1', 1411397620, 0, 0, 1, 25),
(132, '1', 0, 1, 0, '', '', '1', 1411397683, 0, 0, 1, 25),
(133, '1', 0, 1, 0, '', '', '1', 1411397727, 1, 2460, 1, 25),
(134, '123', 0, 12, 0, '', '', '12', 1411400811, 1, 0, 1, 25),
(135, '1', 0, 1, 0, '', '', '1', 1411400897, 1, 0, 1, 25),
(136, 'm', 0, 1, 0, '', '', 'm', 1411401052, 1, 246, 1, 25),
(137, '1', 0, 1, 0, '', '', '1', 1411401560, 1, 2904, 1, 25),
(138, '1', 0, 1, 0, '', '', '1', 1411401826, 1, 1408, 1, 25),
(139, '1', 0, 1, 0, '', '', '1', 1411402668, 1, 1408, 1, 25),
(140, '1', 0, 1, 0, '', '', '1', 1411402891, 1, 1232, 1, 25),
(141, '1', 0, 1, 0, '', '', '1', 1411433254, 0, 0, 1, 25),
(142, '1', 0, 1, 0, '', '', '1', 1411433423, 0, 0, 1, 25),
(143, '1', 0, 1, 0, '', '', '1', 1411433486, 0, 0, 1, 25),
(144, '1', 0, 1, 0, '', '', '1', 1411433490, 0, 0, 1, 25),
(145, '1', 0, 1, 0, '', '', '1', 1411433525, 1, 3218.4, 1, 25);

-- --------------------------------------------------------

--
-- 表的结构 `my_links`
--

CREATE TABLE IF NOT EXISTS `my_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL COMMENT '分类id',
  `title` varchar(200) COLLATE utf8_bin NOT NULL COMMENT '名称',
  `image` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '图片',
  `url` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '链接地址',
  `isshow` tinyint(1) NOT NULL COMMENT '1显示 0隐藏',
  `sort` int(11) NOT NULL COMMENT '排序',
  `addadmin` int(11) NOT NULL COMMENT '管理员id',
  `addtime` int(11) NOT NULL COMMENT '添加时间',
  `updatetime` int(11) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='友情链接' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_links_cat`
--

CREATE TABLE IF NOT EXISTS `my_links_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catname` varchar(200) COLLATE utf8_bin NOT NULL COMMENT '友情链接分类名词',
  `description` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '描述',
  `isshow` tinyint(1) NOT NULL COMMENT '1显示 0隐藏',
  `sort` int(11) NOT NULL COMMENT '排序',
  `addadmin` int(11) NOT NULL COMMENT '管理员id',
  `addtime` int(11) NOT NULL COMMENT '添加时间',
  `updatetime` int(11) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='友情链接分类表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_orderasgoods`
--

CREATE TABLE IF NOT EXISTS `my_orderasgoods` (
  `order` int(255) NOT NULL COMMENT '订单ID',
  `goods` int(255) NOT NULL COMMENT '商品ID',
  `goodsnum` int(255) NOT NULL COMMENT '商品数量'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `my_orderasgoods`
--

INSERT INTO `my_orderasgoods` (`order`, `goods`, `goodsnum`) VALUES
(60, 12, 100),
(61, 12, 100),
(62, 12, 100),
(63, 12, 100),
(64, 12, 100),
(65, 12, 100),
(66, 12, 100),
(67, 12, 20),
(68, 12, 20),
(0, 0, 0),
(74, 1, 100),
(74, 2, 11),
(74, 1, 100),
(74, 15, 20),
(74, 15, 200),
(74, 12, 5),
(74, 12, 20),
(74, 13, 10),
(75, 1, 100),
(75, 2, 11),
(75, 1, 100),
(75, 15, 20),
(75, 15, 200),
(75, 12, 5),
(75, 12, 20),
(75, 13, 10),
(76, 1, 100),
(76, 2, 11),
(76, 1, 100),
(76, 15, 20),
(76, 15, 200),
(76, 12, 5),
(76, 12, 20),
(76, 13, 10),
(77, 1, 100),
(77, 2, 11),
(77, 1, 100),
(77, 15, 20),
(77, 15, 200),
(77, 12, 5),
(77, 12, 20),
(77, 13, 10),
(78, 12, 20),
(79, 12, 20),
(80, 12, 20),
(81, 12, 20),
(82, 1, 100),
(82, 2, 11),
(82, 1, 100),
(82, 15, 20),
(82, 15, 200),
(82, 12, 5),
(82, 12, 20),
(82, 13, 10),
(82, 15, 2),
(82, 12, 2),
(83, 15, 1),
(83, 8, 1),
(85, 12, 12),
(86, 12, 12),
(87, 15, 0),
(88, 15, 0),
(89, 15, 0),
(90, 15, 0),
(91, 15, 0),
(92, 15, 0),
(93, 15, 0),
(94, 15, 0),
(95, 15, 0),
(96, 15, 0),
(97, 15, 1),
(98, 15, 1),
(99, 8, 1),
(99, 15, 1),
(99, 12, 1),
(100, 12, 1),
(101, 12, 1),
(102, 12, 1),
(103, 16, 2),
(104, 12, 10),
(105, 12, 10),
(106, 8, 10),
(106, 15, 10),
(110, 8, 5),
(110, 15, 10),
(111, 8, 10),
(111, 15, 10),
(112, 16, 1),
(112, 17, 1),
(115, 8, 10),
(115, 15, 10),
(116, 8, 20),
(116, 12, 10),
(117, 8, 20),
(117, 15, 5),
(117, 12, 20),
(118, 8, 1),
(118, 15, 20),
(119, 33, 1),
(120, 33, 1),
(121, 33, 1),
(122, 28, 50),
(122, 34, 1),
(124, 34, 20),
(124, 33, 1),
(126, 34, 1100000),
(126, 33, 1),
(128, 33, 1),
(129, 33, 10),
(131, 34, 10),
(131, 33, 10),
(131, 33, 10),
(132, 34, 10),
(133, 34, 100),
(134, 34, 10),
(135, 34, 10),
(136, 34, 10),
(137, 34, 100),
(137, 33, 10),
(137, 33, 10),
(138, 28, 80),
(139, 28, 80),
(140, 28, 70),
(141, 34, 2),
(142, 34, 2),
(143, 34, 120),
(143, 33, 12),
(144, 34, 120),
(144, 33, 12),
(145, 34, 120),
(145, 33, 12);

-- --------------------------------------------------------

--
-- 表的结构 `my_page`
--

CREATE TABLE IF NOT EXISTS `my_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '标题',
  `image` varchar(200) COLLATE utf8_bin NOT NULL COMMENT '单页图片',
  `content` text COLLATE utf8_bin NOT NULL COMMENT '单页内容',
  `addadmin` int(11) NOT NULL COMMENT '管理员id',
  `addtime` int(11) NOT NULL COMMENT '添加时间',
  `updatetime` int(11) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='单页内容表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_spimg`
--

CREATE TABLE IF NOT EXISTS `my_spimg` (
  `sp_id` int(11) NOT NULL,
  `imgUrl` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `my_spimg`
--

INSERT INTO `my_spimg` (`sp_id`, `imgUrl`) VALUES
(1, '1'),
(1, '1'),
(26, './Uploads/image/1411372026login_box.jpg'),
(26, './Uploads/image/1411372317login_wz.jpg'),
(26, './Uploads/image/1411372397login_box.png'),
(26, './Uploads/image/1411372503login_wz.jpg'),
(26, './Uploads/image/1411372506show_pic.jpg'),
(26, './Uploads/image/1411372553qr.jpg'),
(26, './Uploads/image/1411372565yzm.jpg'),
(26, './Uploads/image/1411372637yzm.jpg'),
(26, './Uploads/image/1411372683login_box.jpg'),
(26, './Uploads/image/1411372837yzm.jpg'),
(27, './Uploads/image/1411373261tz_bg.jpg'),
(27, './Uploads/image/1411373261wb_75.jpg'),
(27, './Uploads/image/1411373261wb_156.jpg'),
(27, './Uploads/image/1411373261yzm.jpg'),
(28, './Uploads/image/1411373377login_box.jpg'),
(28, './Uploads/image/1411373521yzm.jpg'),
(28, './Uploads/image/1411373674yzm.jpg'),
(28, './Uploads/image/1411373692wb_156.jpg'),
(28, './Uploads/image/1411373727wb_156.jpg'),
(28, './Uploads/image/1411373744k_49.jpg'),
(28, './Uploads/image/1411373805login_box.jpg'),
(28, './Uploads/image/1411373805login_box.png'),
(28, './Uploads/image/1411373806login_wz.jpg'),
(28, './Uploads/image/1411373806logo.jpg'),
(28, './Uploads/image/1411373807pic.jpg'),
(28, './Uploads/image/1411373807qr.jpg'),
(34, '__ROOT__/Uploads/image/1411374873login_box.jpg'),
(33, '__ROOT__/Uploads/image/1411374839tz_bg.jpg'),
(33, '__ROOT__/Uploads/image/1411374837wb_156.jpg'),
(33, '__ROOT__/Uploads/image/1411374835yzm.jpg'),
(34, '__ROOT__/Uploads/image/1411374873login_box.png'),
(34, '__ROOT__/Uploads/image/1411374874login_wz.jpg'),
(34, '__ROOT__/Uploads/image/1411374874logo.jpg'),
(34, '__ROOT__/Uploads/image/1411374874pic.jpg'),
(34, '__ROOT__/Uploads/image/1411374874qr.jpg'),
(34, '__ROOT__/Uploads/image/1411374875right.gif'),
(34, '__ROOT__/Uploads/image/1411374875show_pic.jpg'),
(34, '__ROOT__/Uploads/image/1411374875tel.jpg'),
(0, '__ROOT__/Uploads/image/1411375665login_box.png');

-- --------------------------------------------------------

--
-- 表的结构 `my_sping`
--

CREATE TABLE IF NOT EXISTS `my_sping` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `mall` varchar(100) NOT NULL,
  `Size` varchar(255) NOT NULL,
  `Color` varchar(255) NOT NULL,
  `CZ` varchar(255) NOT NULL,
  `Number` int(255) NOT NULL,
  `Pre` double NOT NULL,
  `Unit` varchar(60) NOT NULL,
  `ShangJ` int(11) NOT NULL COMMENT '是否上架',
  `info` text NOT NULL,
  `Clasid` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- 转存表中的数据 `my_sping`
--

INSERT INTO `my_sping` (`id`, `title`, `img`, `model`, `mall`, `Size`, `Color`, `CZ`, `Number`, `Pre`, `Unit`, `ShangJ`, `info`, `Clasid`) VALUES
(34, '213', '__ROOT__/Uploads/image/541fdf22e0ef4.jpg', '1231', '123', '123', '123', '123', -140, 123, '123', 0, '123123123', 22),
(33, '111', '__ROOT__/Uploads/image/541fdefa068bf.jpg', '111', '111', '111', '111', '111', 87, 111, '111', 0, '111111', 22),
(32, '123', '__ROOT__/Uploads/image/541fde5e2a11c.jpg', '123', '123', '123', '123', '123', 123, 123, '123', 0, '123', 22),
(31, '234', '__ROOT__/Uploads/image/541fde4711693.jpg', '234', '234', '123', '123', '123', 123, 123, '123', 0, '123', 22),
(30, '234', '__ROOT__/Uploads/image/541fde4571019.jpg', '234', '234', '123', '123', '123', 123, 123, '123', 0, '123', 22),
(29, '234', '__ROOT__/Uploads/image/541fde3fbc1b5.jpg', '234', '234', '123', '123', '123', 123, 123, '123', 0, '123', 22),
(28, '88', '__ROOT__/Uploads/image/541fe2383070b.jpg', '88', '88', '88', '88', '88', 10, 88, '88', 0, '8888', 22);

-- --------------------------------------------------------

--
-- 表的结构 `my_userinfo`
--

CREATE TABLE IF NOT EXISTS `my_userinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `xsg` double NOT NULL,
  `count` int(254) NOT NULL,
  `pay` double NOT NULL,
  `jf` int(254) NOT NULL,
  `web` varchar(254) NOT NULL,
  `phone` int(16) NOT NULL,
  `qq` int(16) NOT NULL,
  `address` varchar(255) NOT NULL,
  `maill` varchar(16) NOT NULL,
  `usrid` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `my_userinfo`
--

INSERT INTO `my_userinfo` (`id`, `xsg`, `count`, `pay`, `jf`, `web`, `phone`, `qq`, `address`, `maill`, `usrid`) VALUES
(18, 6666, 123123, 6666, 0, '6666', 6666, 6666, '6666', '666', 22),
(21, 12, 12, 12, 21, 'HTTP://BAIDU.COM/', 123, 123, '123', '123', 26),
(20, 14796.8, 694, 85203.20000000001, 0, '100', 9999, 5, '5', '55', 25),
(19, 11, 111, 11, 0, 'asdasd', 11, 1, '11', '111', 23),
(22, 1, 1, 1, 1, '1', 1, 1, '1', '1', 27);

-- --------------------------------------------------------

--
-- 表的结构 `my_usr`
--

CREATE TABLE IF NOT EXISTS `my_usr` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `coompy` varchar(255) NOT NULL,
  `level` int(255) NOT NULL,
  `lock` int(2) NOT NULL DEFAULT '1' COMMENT '锁定/删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- 转存表中的数据 `my_usr`
--

INSERT INTO `my_usr` (`id`, `username`, `password`, `coompy`, `level`, `lock`) VALUES
(25, '55', 'cfcd208495d565ef66e7dff9f98764da', '00', 1, 1),
(24, '213', '202cb962ac59075b964b07152d234b70', '123', 2, 1),
(23, 'Useee', 'a8f5f167f44f4964e6c998dee827110c', '1', 2, 1),
(26, 'User12', 'c6f057b86584942e415435ffb1fa93d4', '123', 2, 1),
(22, '66666', 'd41d8cd98f00b204e9800998ecf8427e', '1000', 2, 1),
(27, '123', '202cb962ac59075b964b07152d234b70', '123', 6, 1);

-- --------------------------------------------------------

--
-- 表的结构 `my_viplevel`
--

CREATE TABLE IF NOT EXISTS `my_viplevel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vipname` varchar(100) NOT NULL COMMENT '等级名称',
  `viplevel` float NOT NULL,
  `yuan` int(255) NOT NULL,
  `scores` int(255) NOT NULL COMMENT '积分',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `my_viplevel`
--

INSERT INTO `my_viplevel` (`id`, `vipname`, `viplevel`, `yuan`, `scores`) VALUES
(1, 'VIP1', 0.2, 100, 20),
(6, 'q', 0.1, 11, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
