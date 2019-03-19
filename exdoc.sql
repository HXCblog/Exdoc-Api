-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2019 年 03 月 15 日 09:32
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `ciexdoc`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '',
  `content` text,
  `createtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=150 ;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `cid`, `title`, `content`, `createtime`) VALUES
(148, 47, '1.Exdoc项目简介', '<p style="white-space: normal; text-align: center;"><strong>Exdoc项目简介</strong></p><p style="white-space: normal;">Exdoc是款简洁的文档管理工具，Exdoc采用前后端分离方式开发。<br/></p><p style="white-space: normal;"><strong>当前版本：</strong>V1.0.0</p><p style="white-space: normal;"><strong>项目前端：</strong>Vue2.0+Vuex+VueRouter+Vue-resource+ElementUI</p><p style="white-space: normal;"><strong>项目后端：</strong>Codeigniter+Codeigniter-restserver</p><p>使用Exdoc，你可以很方便的记录工作笔记，书写项目文档，还可以收集整理一些实用的工具库。同样Exdoc是一款开源工具，它拥有比较详细的使用和开发手册，你可以很容易进行修改和二次开发来满足你日常工作需求。</p><p>麻雀虽小，五脏俱全，Exdoc也是一个非常不做的学习项目，它能让你快速了解vue的使用与前后端分离模式的开发。</p>', 1552630136),
(149, 47, '2.Exdoc的使用说明', '<p style="text-align: center;">Exdoc的使用</p><pre class="brush:html;toolbar:false">&lt;html&gt;\r\n&lt;body&gt;\r\n\r\n&lt;div&nbsp;id=&quot;header&quot;&gt;\r\n&lt;h1&gt;City&nbsp;Gallery&lt;/h1&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div&nbsp;id=&quot;nav&quot;&gt;\r\nLondon&lt;br&gt;\r\nParis&lt;br&gt;\r\nTokyo&lt;br&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div&nbsp;id=&quot;section&quot;&gt;\r\n&lt;h1&gt;London&lt;/h1&gt;\r\n&lt;p&gt;\r\nLondon&nbsp;is&nbsp;the&nbsp;capital&nbsp;city&nbsp;of&nbsp;England.&nbsp;It&nbsp;is&nbsp;the&nbsp;most&nbsp;populous&nbsp;city&nbsp;in&nbsp;the&nbsp;United&nbsp;Kingdom,\r\nwith&nbsp;a&nbsp;metropolitan&nbsp;area&nbsp;of&nbsp;over&nbsp;13&nbsp;million&nbsp;inhabitants.\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\nStanding&nbsp;on&nbsp;the&nbsp;River&nbsp;Thames,&nbsp;London&nbsp;has&nbsp;been&nbsp;a&nbsp;major&nbsp;settlement&nbsp;for&nbsp;two&nbsp;millennia,\r\nits&nbsp;history&nbsp;going&nbsp;back&nbsp;to&nbsp;its&nbsp;founding&nbsp;by&nbsp;the&nbsp;Romans,&nbsp;who&nbsp;named&nbsp;it&nbsp;Londinium.\r\n&lt;/p&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div&nbsp;id=&quot;footer&quot;&gt;\r\nCopyright&nbsp;W3School.com.cn\r\n&lt;/div&gt;\r\n\r\n&lt;/body&gt;\r\n&lt;/html&gt;</pre><p><br/></p>', 1552631903);

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `catename` varchar(20) NOT NULL DEFAULT '',
  `createtime` varchar(20) NOT NULL DEFAULT '',
  `articlenum` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`cid`, `catename`, `createtime`, `articlenum`) VALUES
(47, 'Exdoc开发文档', '2019-03-15', 2);

-- --------------------------------------------------------

--
-- 表的结构 `linkcate`
--

CREATE TABLE IF NOT EXISTS `linkcate` (
  `aid` int(5) NOT NULL AUTO_INCREMENT,
  `linkcate` varchar(100) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `linkcate`
--

INSERT INTO `linkcate` (`aid`, `linkcate`) VALUES
(16, '动画库'),
(15, 'Js框架/库'),
(14, 'UI框架/库');

-- --------------------------------------------------------

--
-- 表的结构 `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `aid` int(5) NOT NULL,
  `name` varchar(40) NOT NULL,
  `link` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `links`
--

INSERT INTO `links` (`id`, `aid`, `name`, `link`) VALUES
(14, 14, 'Bootstrap(中)', 'http://www.bootcss.com/'),
(15, 14, 'UIkit', 'http://www.getuikit.net/'),
(16, 15, 'Jquery', 'http://jquery.com/'),
(17, 15, 'Vue.js', 'https://cn.vuejs.org/'),
(18, 16, 'Animate', 'http://daneden.github.io/animate.css/'),
(19, 16, 'Hover', 'http://ianlunn.github.io/Hover/');

-- --------------------------------------------------------

--
-- 表的结构 `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `captcha_time` int(11) NOT NULL DEFAULT '0',
  `ip_address` varchar(50) NOT NULL DEFAULT '',
  `word` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=219 ;

--
-- 转存表中的数据 `picture`
--

INSERT INTO `picture` (`id`, `captcha_time`, `ip_address`, `word`) VALUES
(218, 1552638832, '127.0.0.1', '9171');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`uid`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
