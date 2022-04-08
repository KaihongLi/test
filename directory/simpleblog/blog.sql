SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `blog`
-- 
CREATE DATABASE `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog`;

-- --------------------------------------------------------

-- 
-- 表的结构 `post`
-- 

CREATE TABLE `post` (
  `id` int(11) NOT NULL auto_increment,
  `post_title` text character set utf8,
  `post_content` text character set utf8,
  `post_date` datetime,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- 
-- 导出表中的数据 `post`
-- 

INSERT INTO `post` (`id`, `post_title`, `post_content`, `post_date`) VALUES 
(1, '使至塞上', '单车欲问边，属国过居延。\r\n征蓬出汉塞，归雁入胡天。\r\n大漠孤烟直，长河落日圆。\r\n萧关逢候骑，都护在燕然。', '2009-03-22 15:28:10'),
(2, '长相思', '山一程\r\n水一程\r\n身向榆关那畔行\r\n夜深千帐灯\r\n　　\r\n风一更\r\n雪一更\r\n聒碎乡心梦不成\r\n故园无此声', '2009-03-22 15:29:20'),
(3, '如梦令', '万帐穹庐人醉\r\n星影摇摇欲坠\r\n\r\n归梦隔狼河\r\n又被河声搅碎\r\n\r\n还睡\r\n还睡\r\n解道醒来无味', '2009-03-22 15:29:30'),
(4, '梦江南', '昏鸦尽\r\n小立恨因谁\r\n急雪乍翻香阁絮\r\n轻风吹到胆瓶梅\r\n心字已成灰', '2009-03-22 15:32:27');

--
--导出表中的数据 `user`
--
CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `username` text character set utf8,
  `password` text character set utf8,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;