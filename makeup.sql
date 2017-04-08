-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2017 年 04 月 08 日 14:46
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `makeup`
--

-- --------------------------------------------------------

--
-- 表的结构 `collection`
--

CREATE TABLE IF NOT EXISTS `collection` (
  `CID` int(20) NOT NULL AUTO_INCREMENT,
  `PID` int(20) NOT NULL,
  `UID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `CTIME` datetime NOT NULL,
  PRIMARY KEY (`CID`),
  KEY `PID` (`PID`),
  KEY `UID` (`UID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `collection`
--

INSERT INTO `collection` (`CID`, `PID`, `UID`, `CTIME`) VALUES
(1, 4, 'user13', '2016-06-07 17:24:50'),
(2, 3, 'user12', '2016-06-07 18:10:56'),
(3, 4, 'user22', '2016-06-08 10:19:22'),
(4, 10, 'user33', '2016-06-08 10:21:44'),
(5, 9, 'user33', '2016-06-08 10:24:12'),
(6, 6, 'user22', '2016-06-19 13:52:27'),
(7, 14, 'autumn', '2016-11-19 16:44:42');

-- --------------------------------------------------------

--
-- 表的结构 `cosmetic`
--

CREATE TABLE IF NOT EXISTS `cosmetic` (
  `MID` int(4) NOT NULL AUTO_INCREMENT,
  `MNAME` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `CAPACITY` int(4) NOT NULL,
  `PRIZE` int(4) NOT NULL,
  `SID` int(4) DEFAULT NULL,
  PRIMARY KEY (`MID`),
  KEY `SID` (`SID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `cosmetic`
--

INSERT INTO `cosmetic` (`MID`, `MNAME`, `CAPACITY`, `PRIZE`, `SID`) VALUES
(1, '娇韵诗-兰花面部护理', 30, 440, 3),
(2, 'Olay新生肌底液', 40, 280, 2),
(3, '兰蔻小黑瓶', 30, 679, 0),
(4, 'COMELYCO', 300, 50, 1),
(5, '科颜氏-高保湿霜', 50, 300, 0),
(6, 'Dior，雪花秀', 0, 0, 0),
(7, '雪花秀气垫BB', 0, 0, 2),
(8, '兰蔻', 20, 680, 3),
(9, '巴黎欧莱雅-清润葡萄籽精华膜力水', 130, 140, 2),
(16, 'Dior，雪花秀', 30, 679, 0),
(17, 'Olay', 40, 190, 3),
(18, 'kkkk', 123, 123, 3),
(19, '京沪高姐个', 654, 5675, 1);

-- --------------------------------------------------------

--
-- 表的结构 `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `PID` int(20) NOT NULL AUTO_INCREMENT,
  `UID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MID` int(4) NOT NULL,
  `TITLE` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `CONTENT` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `TITLE_PAGE` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `PTIME` datetime NOT NULL,
  PRIMARY KEY (`PID`),
  KEY `UID` (`UID`),
  KEY `MID` (`MID`),
  KEY `MID_2` (`MID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `post`
--

INSERT INTO `post` (`PID`, `UID`, `MID`, `TITLE`, `CONTENT`, `TITLE_PAGE`, `PTIME`) VALUES
(1, 'user12', 1, '享受植物护肤的神奇力量', '<p>一直很喜欢植物系护肤品，从看见娇韵诗的试用活动，就被吸引了呢。娇韵诗独特的品牌定位，清新的包装，让我对这个牌子一直深有好感。北方的冬天漫长寒冷，肌肤和心情都有些疲惫，在初春时节，能收到大爱的兰花油真是件幸福的事。</p><p><img src="/makeup/upload/image/20160607/1465279861723278.png" title="1465279861723278.png" alt="wxid_t2xknqszvsqp21_1465184285658_19.png"/></p><p><br/></p><p>蕴含天然浓缩植物油兰花、花梨木、广藿香及榛实果油，明显改善肌肤干燥缺水现象，提亮暗黄肤色，预防幼纹及干纹形成。</p><p><img src="/makeup/upload/image/20160607/1465279965866660.png" title="1465279965866660.png" alt="wxid_t2xknqszvsqp21_1465184323510_42.png"/></p><p>很多人拒绝油类护肤品，是因为担心使用感油腻，皮肤起痘痘。但是实际上，在做好前期补水的情况下，油类护肤品更能高度保湿，使皮肤水油均衡。促进细胞再生，恢复暗沉肌肤的光泽、提高肌肤的通透感和柔软度。</p><p>给焦躁的自己片刻安静，享受植物护肤的神奇力量吧！</p><p><br/></p>', '/makeup/upload/image/20160607/1465279861723278.png', '2016-06-07 14:12:51'),
(2, 'user13', 2, 'Olay新生塑颜奇迹赋能肌底液', '<p>为一块已经僵硬的海绵补充水分，会发现它并不能够吸收了，</p><p>这就好比长时间干燥的肌肤，会发现使用功效再强的护肤品也没有什么效果了。</p><p>其实并不是产品的成分失效、或者肌肤出现对产品的惰性，</p><p>而是你的肌肤就好像那块僵硬的海绵——不能吸收了，</p><p>你需要使用肌底液来增强肌肤的吸收能力。</p><p>含水量丰富，肌底液十分清透水润没有任何杂质。</p><p><img src="/makeup/upload/image/20160607/1465280256101950.jpg" title="1465280256101950.jpg"/></p><p><img src="/makeup/upload/image/20160607/1465280256224711.jpg" title="1465280256224711.jpg"/></p><p><br/></p>', '/makeup/upload/image/20160607/1465280256101950.jpg', '2016-06-07 14:18:26'),
(3, 'user13', 3, '兰蔻全新小黑瓶-缔造难以置信的年轻肌肤', '<p><img src="/makeup/upload/image/20160607/1465280530748150.jpg" title="1465280530748150.jpg"/></p><p><br/></p><p>兰蔻的小黑瓶应该是各种瓶的鼻祖吧．是全球首款以“基因保养”为主的精华肌底护肤产品，现在泛滥了各种瓶子。</p><p><br/></p><p>深入修护肌底，更能加倍后续保养，其实这就是一瓶帮助后续保养品吸收的精华肌底液。</p><p><br/></p><p>小黑瓶已经更新换代了很多代啦，每一次的升级都是一种提升，成分更加全面，升级版「小黑瓶」精华肌底液汲取生物技术成分。每一滴精华液蕴含的活性成分较之从前多出40%。</p><p><br/></p><p>普通精华液是针对肌肤干燥、粗糙和纹路等问题，而「小黑瓶」则是从肌肤源头修复。并且，功能性的精华液无法发挥很好的作用。因此在使用普通精华前使用「小黑瓶」，才能更好地发挥精华的功效。另外，「小黑瓶」也可以当做单独的精华液使用，做到内外兼修。</p><p><br/></p><p>质地是有点流动性的精华质地，看着很舒缓，延展效果棒，细腻透亮看得见，缔造难以置信的年轻肌肤。保湿度很强，能够帮助后续的精华吸收，可以搭配精华使用，效果看的见，他能抚平细纹、平滑肌肤、透亮光采、净澈肌底、匀净肤色，见证年轻肌肤；一瓶缔造难以置信的年轻肌肤</p><p><img src="/makeup/upload/image/20160607/1465280530884905.jpg" title="1465280530884905.jpg"/></p><p><br/></p>', '/makeup/upload/image/20160607/1465280530748150.jpg', '2016-06-07 14:24:40'),
(4, 'user22', 4, '济州岛无污染芦荟胶', '<p>简介：含有95%韩国济州岛有机农芦荟萃取物，含有丰富的保湿成分。适合任何肌肤，可用在身体各处。透明的质感，柔滑细腻，持久维持肌肤水嫩状态，修复粗糙和细纹。&nbsp;</p><p>&nbsp;<br/>产品详细介绍：&nbsp;&nbsp;<br/>天然有机农产品 - 全身均可使用&nbsp;&nbsp;<br/>含有95%济州岛有机农芦荟萃取物 ，全面改善脆弱肌肤，让肌肤24小时保湿润滑&nbsp;&nbsp;<br/>韩国COMELYCO的【JEJU ORGANIC ALOE SOOTHING GEL】芦荟胶是韩国著名有机农护肤品。不仅含有高浓度95%济州岛有机农芦荟萃取物，还含有薰衣草、薄荷、小菊花、迷迭香等多种纯天然植物萃取精华。给干燥敏感肌肤提供丰富水分，无刺激舒缓护理肌肤。从面部到身体均可使用。7无添加(人工色素，对羟基苯甲酸酯，苯甲酮，动物性原料，PG、PEG、甲醛)健康放心。&nbsp;&nbsp;<br/>使用方法： 1. 随时涂抹于感到干燥敏感的面部、全身等部位，并轻轻拍打帮助吸收。 2. 与粉底液等底妆产品混合使用可以帮助底妆服帖，有效改善妆容干燥现象。</p><p><img src="/makeup/upload/image/20160607/1465281590988569.jpg" title="1465281590988569.jpg"/></p><p><img src="/makeup/upload/image/20160607/1465281590253500.jpg" title="1465281590253500.jpg"/></p><p><img src="/makeup/upload/image/20160607/1465281590933316.jpg" title="1465281590933316.jpg"/></p><p><img src="/makeup/upload/image/20160607/1465281590960211.jpg" title="1465281590960211.jpg"/></p><p><br/></p>', '/makeup/upload/image/20160607/1465281590988569.jpg', '2016-06-07 14:40:54'),
(5, 'user12', 5, '温暖冬季，科颜氏限量版', '<p>这些年因为有科颜氏高保湿霜，所以冬季格外水润，倍感温馨。圣诞来临之际，收到了朋友贴心限量版高保湿霜哦，真是惊喜呢</p><p><br/></p><p><img src="/makeup/upload/image/20160607/1465291692953756.jpg" title="1465291692953756.jpg"/></p><p><br/></p><p>依然是简约的包装，50ml的罐子，看起来比其他同容量的瓶子要小巧很多。最大的区别就是五星盖子啦，这可是限量版哦，绝对值得收藏。科颜氏高保湿霜，堪称经典的保湿圣品</p><p>经受过恶劣极地气候的考验，更获得全球美容权威奖殊荣。不过这些都不是最重要的，重要的是它可是一款轻薄又高效的保湿面霜。</p><p><br/></p><p><img src="http://localhost/makeup/upload/image/20160607/1465291692485011.jpg" title="1465291692485011.jpg"/></p><p><br/></p><p>轻盈水感的凝霜质地，没有添加香料所以没有什么香味儿，给人一种很天然纯净的感觉。与肌肤相近的PH值，也说明它是一款温和，亲肤的面霜。温和的高保湿霜对肌肤不刺激，成分也简单高效安全，相当赞呢。</p><p><br/></p><p><img src="/makeup/upload/image/20160607/1465291692955219.jpg" title="1465291692955219.jpg"/></p><p><br/></p><p>白色的细腻凝霜，如锦缎般柔滑，轻轻一抹就被肌肤吸收了，很迅速。没有油腻感，也不会感觉浮在肌肤表面，是渗透到肌肤底层的感觉呢。富含珍贵角鲨烷，这是从橄榄中提取的一种质地极为细腻的保湿油，极其亲肤，易吸收。来自南极的冷冻保护蛋白，可以有效对抗干燥，保留水分，润泽光滑肌肤，免受自由基侵害。白茅，富含大量钠元素，具有快速持久保湿功效。还有牛油果精华和杏仁油萃取，保湿锁水。长时间不间断地为肌肤注入源源水分，即便到了午后，肌肤依然水润不紧绷。</p><p><br/></p><p><img src="/makeup/upload/image/20160607/1465291693100647.jpg" title="1465291693100647.jpg"/></p><p><br/></p><p>最爱的是，用完科颜氏高保湿霜完全没有油腻感哦。你看吸油纸上一点油脂的痕迹都没有。对于不喜欢厚重，希望肌肤自由呼吸的我来说，轻薄水润的高保湿霜完美无缺~</p><p><br/></p><p><img src="/makeup/upload/image/20160607/1465291693180303.jpg" title="1465291693180303.jpg"/></p><p><br/></p>', '/makeup/upload/image/20160607/1465291692953756.jpg', '2016-06-07 17:31:16'),
(6, 'user12', 6, '#裸妆两件套#Dior变色唇膏+雪花秀气垫BB', '<p><img src="/makeup/upload/image/20160607/1465293686387113.jpg" title="1465293686387113.jpg" alt="e6b5dcd4-c2b6-4d6a-9d4c-0c3cfc8b6fbd@r_1280w_1280h.jpg" width="562" height="439"/></p><p>#裸妆两件套# 对懒人来说只需要BB和唇膏就够了 用了Dior唇膏和雪花秀气垫BB后，感觉不会再用其他相同产品了！一生推~❤&nbsp;</p><p>#Dior变色唇膏#&nbsp;</p><p>从13年老妈给我买了这款唇膏到现在四年了，这款用了8、9只，一直没有换过其他唇膏，因为它真的是太好用！完全没有兴趣尝试别的唇膏&nbsp;</p><p>1、滋润持久，只要你不经常用舌头舔嘴唇，基本上可以坚持半天，也就是说半天的时间里你的嘴唇都是粉嫩嫩水莹莹又不显油腻的状态~&nbsp;</p><p>2、色号选取，珊瑚色or粉色 ‣ 粉色！粉色！粉色！ 我用完的9只全部是粉色！ 其实也有在专柜试过珊瑚色，我的唇色比较深，皮肤发黄，珊瑚色涂上之后总感觉和没涂一样 粉色就不一样了，多涂几层就有点粉粉嫩嫩的感觉了，唇色浅的妹子用起来效果应该会更好&nbsp;</p><p>3、最关键的，变色！普通情况自带一点浅浅的粉色，越热颜色越深，不过最深的时候也只是淡粉色，不会很突兀，因此才说它是裸妆必备，有时候在特定场所不方便照镜子涂口红的时候就拿出它快速的涂抹一下，立刻恢复好状态~&nbsp;</p><p>4、搭配口红，根据情况可以分别用在涂抹口红前后。如果口红是很干的那种（比如mac），并且唇部也比较干燥，使用顺序就是唇膏→口红→唇膏。 ', '/makeup/upload/image/20160607/1465293686387113.jpg', '2016-06-07 18:02:24'),
(7, 'user22', 7, '雪花秀气垫BB——清凉舒适一整夏', '<p>雪花秀气垫bb 21# 木莲花&nbsp;</p><p>这款气垫是去韩国旅游的时候乐天官网购买的，买了两个装，和同学一人一个，因为怕免税店里会排队缺货，事实证明免税店里的雪花秀国人真的好推崇，各种排队各种缺货！！！ 自己的皮肤不属于白的那种，只能说是不白不黑吧，真的挺尴尬的，选色的时候不想要那种假白假白的，就选了21#～，但是第一次涂完就发现肤色比我自己的原本肤色还要黄一点', '/makeup/image/icon.png', '2016-06-07 23:43:41'),
(8, 'user22', 7, '雪花秀气垫BB——清凉舒适一整夏', '<p>雪花秀气垫bb 21# 木莲花&nbsp;</p><p>这款气垫是去韩国旅游的时候乐天官网购买的，价格是乱写的，买了两个装，和同学一人一个，因为怕免税店里会排队缺货，事实证明免税店里的雪花秀国人真的好推崇，各种排队各种缺货！！！ 自己的皮肤不属于白的那种，只能说是不白不黑吧，真的挺尴尬的，选色的时候不想要那种假白假白的，就选了21#～，但是第一次涂完就发现肤色比我自己的原本肤色还要黄一点', '/makeup/image/icon.png', '2016-06-07 23:46:37'),
(9, 'user22', 8, '#兰蔻睛采眼部精华液#一滴让双眸更清澈', '<p><img src="/makeup/upload/image/20160607/1465314742104838.jpg" title="1465314742104838.jpg"/></p><p><br/></p><p>兰蔻睛采眼部精华液带来眼周护理突破创新，它娇媚动人，效果显著，令迷人大眼的魅力尽显无遗。使用7天，见证光彩明眸的神奇诞生，令双眸更大：提拉上眼睑，改善眼部浮肿，淡化眼袋；更清澈：提亮眼周肌肤，细腻眼周纹理，淡化黑眼圈；更年轻：平滑眉眼三角区，平滑眼周细纹，淡化眼睑皱纹，淡化鱼尾纹。</p><p><br/></p><p>这支精华的容量也比一般的眼部产品更为实在，是20ml装。 貌似外盒设计得更有特色了呢！多维旋转按摩亮珠可以全方位的蘸取瓶中的眼部精华让我享用，从滴管直径到亮珠长度都精准测量，还颇具艺术感呢</p><p><br/></p><p><img src="/makeup/upload/image/20160607/1465314742137843.jpg" title="1465314742137843.jpg"/></p><p><br/></p>', '/makeup/upload/image/20160607/1465314742104838.jpg', '2016-06-07 23:53:25'),
(10, 'user22', 9, '用起来超保湿的魔力水', '<p>这款化妆水总的来说就是保湿度很高。</p><p>首先外观承续了欧莱雅家的一贯风格，简单，颜色让人一看就想到葡萄<br/> <br/> 再说说水的质地，偏粘稠一些，我收到的好像是清润型的，好像还更偏清爽一些。倒在手上能明显感受出粘稠度。&nbsp;<br/> <br/> <br/> <br/> <br/> <br/> <br/> 这种化妆水对于我这种偏干的皮肤还是蛮好用的，太过于清爽则会比较干。用的话一定要用化妆棉轻轻挤压，用手拍不进去。这张是用手拍的效果：</p><p>&nbsp;<br/> <br/> 能看到皮肤上还是有很多没有被吸收的，这也是质地偏粘稠的水的特点，没有偏清爽型的好吸收。最好还是用化妆棉轻轻挤压再轻轻拍干好一些，那样吸收的效果也更好。</p><p><br/> <br/> 最后总的来说我觉得这款水的补水和保湿效果都挺不错，用了一段时间，性价比也高，值得推荐。</p><p>最后一定要表扬小编大大，这次快递很快啊，而且包装得也很好，非常大的进步啊，鼓掌！</p><p><img src="/makeup/upload/image/20160608/1465352424546718.png" title="1465352424546718.png"/></p><p><img src="/makeup/upload/image/20160608/1465352430832019.jpg" title="1465352430832019.jpg"/></p><p><br/></p>', '/makeup/upload/image/20160608/1465352424546718.png', '2016-06-08 10:20:35'),
(13, 'user22', 17, 'Olay-水漾动力奇迹赋能肌底液', '<p><img src="http://localhost/makeup/upload/image/20160619/1466314431100642.jpg" title="1466314431100642.jpg" alt="8D8D.tmp.jpg"/></p><p>冬天是一个干燥的季节，头发干枯毛躁，皮肤干瘪缺水，身体也时不时干燥得起皮。作为一个在广州工作滴孩纸，每天上班对着电脑，头顶吹着暖风的空调，感觉整个人都处于一种极度缺水的状态，整个人可以用一根蔫黄瓜来形容~~~~(&gt;_&lt;)~~~~&nbsp;。所以，这次能够体验水漾动力系列的新品肌底液，真是让我感觉遇到了救星，我要让自己努力变回水嫩的妹纸~</p><p><br/></p>', 'http://localhost/makeup/upload/image/20160619/1466314431100642.jpg', '2016-06-19 13:35:52'),
(14, 'autumn', 18, 'gdgkj', '<p>dsfsfsdfsdfgfdsgertgdsvhsgfder</p>', '/makeup/image/icon.png', '2016-11-19 16:44:34'),
(15, 'autumn', 19, '和搞好结果', '<p>苏打绿分开就开始了的积分兰蔻<br/></p><p><img src="/makeup/upload/image/20161119/1479545845544782.jpg" title="1479545845544782.jpg" alt="20e4e63a-7f26-4a00-b39a-ee2828f6650d@r_1280w_1280h.jpg"/></p>', '/makeup/upload/image/20161119/1479545845544782.jpg', '2016-11-19 16:57:35');

-- --------------------------------------------------------

--
-- 表的结构 `skin`
--

CREATE TABLE IF NOT EXISTS `skin` (
  `SID` int(4) NOT NULL,
  `SNAME` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `skin`
--

INSERT INTO `skin` (`SID`, `SNAME`) VALUES
(0, '油性'),
(1, '干性'),
(2, '混合'),
(3, '敏感');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `UPWD` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `NICKNAME` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GENDER` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SID` int(4) DEFAULT NULL,
  `ICON` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`UID`, `UPWD`, `NICKNAME`, `GENDER`, `SID`, `ICON`) VALUES
('123', 'e10adc3949ba59abbe56e057f20f883e', '123', NULL, NULL, ''),
('autumn', '670b14728ad9902aecba32e22fa4f6bd', 'autumn', '女', 0, ''),
('haha', 'e10adc3949ba59abbe56e057f20f883e', 'haha', NULL, NULL, ''),
('user', '123456', NULL, NULL, NULL, ''),
('user00', 'e10adc3949ba59abbe56e057f20f883e', 'user00', '女', 0, ''),
('user11', 'd41d8cd98f00b204e9800998ecf8427e', '哈哈', '女', 1, ''),
('user12', 'e10adc3949ba59abbe56e057f20f883e', '美容大王', '男', 1, ''),
('user13', 'e10adc3949ba59abbe56e057f20f883e', 'user13', NULL, NULL, ''),
('user22', 'e10adc3949ba59abbe56e057f20f883e', '化妆达人', '保密', 2, ''),
('user33', 'e10adc3949ba59abbe56e057f20f883e', 'user33', NULL, NULL, '');

--
-- 限制导出的表
--

--
-- 限制表 `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `collection_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `post` (`PID`),
  ADD CONSTRAINT `collection_ibfk_2` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`);

--
-- 限制表 `cosmetic`
--
ALTER TABLE `cosmetic`
  ADD CONSTRAINT `cosmetic_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `skin` (`SID`);

--
-- 限制表 `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`MID`) REFERENCES `cosmetic` (`MID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
