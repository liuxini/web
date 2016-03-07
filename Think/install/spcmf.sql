

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `thinkcmfx`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `sp_asset`
-- 

CREATE TABLE `sp_asset` (
  `aid` bigint(20) NOT NULL AUTO_INCREMENT,
  `key` varchar(50) NOT NULL,
  `filename` varchar(50) DEFAULT NULL,
  `filesize` int(11) DEFAULT NULL,
  `filepath` varchar(200) NOT NULL,
  `uploadtime` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `meta` text,
  `suffix` varchar(50) DEFAULT NULL,
  `download_times` int(6) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- ----------------------------
-- Table structure for sp_auth_access
-- ----------------------------
CREATE TABLE `sp_auth_access` (
  `role_id` mediumint(8) unsigned NOT NULL COMMENT '角色',
  `rule_name` varchar(255) NOT NULL COMMENT '规则唯一英文标识,全小写',
  `type` varchar(30) DEFAULT NULL COMMENT '权限规则分类，请加应用前缀,如admin_',
  KEY `role_id` (`role_id`),
  KEY `rule_name` (`rule_name`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sp_auth_rule
-- ----------------------------
CREATE TABLE `sp_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '规则id,自增主键',
  `module` varchar(20) NOT NULL COMMENT '规则所属module',
  `type` varchar(30) NOT NULL DEFAULT '1' COMMENT '权限规则分类，请加应用前缀,如admin_',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '规则唯一英文标识,全小写',
  `param` varchar(255) DEFAULT NULL COMMENT '额外url参数',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '规则中文描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否有效(0:无效,1:有效)',
  `condition` varchar(300) NOT NULL DEFAULT '' COMMENT '规则附加条件',
  PRIMARY KEY (`id`),
  KEY `module` (`module`,`status`,`type`)
) ENGINE=MyISAM AUTO_INCREMENT=156 DEFAULT CHARSET=utf8 COMMENT='权限规则表';



-- --------------------------------------------------------

-- 
-- 表的结构 `sp_comments`
-- 

CREATE TABLE `sp_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `helperid` int(15) unsigned NOT NULL DEFAULT '0',
  `servid` int(20) unsigned NOT NULL DEFAULT '0',
  `helpername`varchar(20) NOT NULL DEFAULT '',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '发表评论的用户id',
  `to_uid` int(11) NOT NULL DEFAULT '0' COMMENT '被评论的用户id',
  `full_name` varchar(50) DEFAULT NULL COMMENT '评论者昵称',
  `phonenum` varchar(15) NOT NULL DEFAULT '0',
  `email` varchar(255) DEFAULT NULL COMMENT '评论者邮箱',
  `createtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `content` text NOT NULL COMMENT '评论内容',
  `parentid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '被回复的评论id',
  `path` varchar(500) DEFAULT NULL,
  `status` smallint(1) NOT NULL DEFAULT '1' COMMENT '状态，1已审核，0未审核',
  PRIMARY KEY (`id`),
  KEY `comment_helperid` (`helperid`),
  KEY `comment_servid` (`servid`),
  KEY `comment_approved_date_gmt` (`status`),
  KEY `comment_parent` (`parentid`),
  KEY `createtime` (`createtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



-- 
-- 表的结构 `sp_common_action_log`
-- 

CREATE TABLE `sp_common_action_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` bigint(20) DEFAULT '0' COMMENT '用户id',
  `object` varchar(100) DEFAULT NULL COMMENT '访问对象的id,格式：不带前缀的表名+id;如posts1表示xx_posts表里id为1的记录',
  `action` varchar(50) DEFAULT NULL COMMENT '操作名称；格式规定为：应用名+控制器+操作名；也可自己定义格式只要不发生冲突且惟一；',
  `count` int(11) DEFAULT '0' COMMENT '访问次数',
  `last_time` int(11) DEFAULT '0' COMMENT '最后访问的时间戳',
  `ip` varchar(15) DEFAULT NULL COMMENT '访问者最后访问ip',
  PRIMARY KEY (`id`),
  KEY `user_object_action` (`user`,`object`,`action`),
  KEY `user_object_action_ip` (`user`,`object`,`action`,`ip`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 表的结构 `sp_links`
-- 

CREATE TABLE `sp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL COMMENT '友情链接地址',
  `link_name` varchar(255) NOT NULL COMMENT '友情链接名称',
  `link_image` varchar(255) DEFAULT NULL COMMENT '友情链接图标',
  `link_target` varchar(25) NOT NULL DEFAULT '_blank' COMMENT '友情链接打开方式',
  `link_description` text NOT NULL COMMENT '友情链接描述',
  `link_status` int(2) NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0' COMMENT '友情链接评级',
  `link_rel` varchar(255) DEFAULT '',
  `listorder` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;


-- --------------------------------------------------------


-- 
-- 表的结构 `sp_menu`
-- 

CREATE TABLE `sp_menu` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `app` char(20) NOT NULL COMMENT '应用名称app',
  `model` char(20) NOT NULL COMMENT '控制器',
  `action` char(20) NOT NULL COMMENT '操作名称',
  `data` char(50) NOT NULL COMMENT '额外参数',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '菜单类型  1：权限认证+菜单；0：只作为菜单',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态，1显示，0不显示',
  `name` varchar(50) NOT NULL COMMENT '菜单名称',
  `icon` varchar(50) DEFAULT NULL COMMENT '菜单图标',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  `listorder` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序ID',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `parentid` (`parentid`),
  KEY `model` (`model`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=156 ;

-- 
-- 表的结构 `sp_oauth_user`
-- 

CREATE TABLE `sp_oauth_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `from` varchar(20) NOT NULL COMMENT '用户来源key',
  `name` varchar(30) NOT NULL COMMENT '第三方昵称',
  `head_img` varchar(200) NOT NULL COMMENT '头像',
  `uid` int(20) NOT NULL COMMENT '关联的本站用户id',
  `create_time` datetime NOT NULL COMMENT '绑定时间',
  `last_login_time` datetime NOT NULL COMMENT '最后登录时间',
  `last_login_ip` varchar(16) NOT NULL COMMENT '最后登录ip',
  `login_times` int(6) NOT NULL COMMENT '登录次数',
  `status` tinyint(2) NOT NULL,
  `access_token` varchar(60) NOT NULL,
  `expires_date` int(12) NOT NULL COMMENT 'access_token过期时间',
  `openid` varchar(40) NOT NULL COMMENT '第三方用户id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 表的结构 `sp_options`
-- 

CREATE TABLE `sp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `sp_options`
-- 

INSERT INTO `sp_options` VALUES (1, 'member_email_active', '{"title":"ThinkCMF\\u90ae\\u4ef6\\u6fc0\\u6d3b\\u901a\\u77e5.","template":"<p>\\u672c\\u90ae\\u4ef6\\u6765\\u81ea<a href=\\"http:\\/\\/www.thinkcmf.com\\">ThinkCMF<\\/a><br\\/><br\\/>&nbsp; &nbsp;<strong>---------------<\\/strong><br\\/>&nbsp; &nbsp;<strong>\\u5e10\\u53f7\\u6fc0\\u6d3b\\u8bf4\\u660e<\\/strong><br\\/>&nbsp; &nbsp;<strong>---------------<\\/strong><br\\/><br\\/>&nbsp; &nbsp; \\u5c0a\\u656c\\u7684<span style=\\"FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)\\">#username#\\uff0c\\u60a8\\u597d\\u3002<\\/span>\\u5982\\u679c\\u60a8\\u662fThinkCMF\\u7684\\u65b0\\u7528\\u6237\\uff0c\\u6216\\u5728\\u4fee\\u6539\\u60a8\\u7684\\u6ce8\\u518cEmail\\u65f6\\u4f7f\\u7528\\u4e86\\u672c\\u5730\\u5740\\uff0c\\u6211\\u4eec\\u9700\\u8981\\u5bf9\\u60a8\\u7684\\u5730\\u5740\\u6709\\u6548\\u6027\\u8fdb\\u884c\\u9a8c\\u8bc1\\u4ee5\\u907f\\u514d\\u5783\\u573e\\u90ae\\u4ef6\\u6216\\u5730\\u5740\\u88ab\\u6ee5\\u7528\\u3002<br\\/>&nbsp; &nbsp; \\u60a8\\u53ea\\u9700\\u70b9\\u51fb\\u4e0b\\u9762\\u7684\\u94fe\\u63a5\\u5373\\u53ef\\u6fc0\\u6d3b\\u60a8\\u7684\\u5e10\\u53f7\\uff1a<br\\/>&nbsp; &nbsp; <a title=\\"\\" href=\\"http:\\/\\/#link#\\" target=\\"_self\\">http:\\/\\/#link#<\\/a><br\\/>&nbsp; &nbsp; (\\u5982\\u679c\\u4e0a\\u9762\\u4e0d\\u662f\\u94fe\\u63a5\\u5f62\\u5f0f\\uff0c\\u8bf7\\u5c06\\u8be5\\u5730\\u5740\\u624b\\u5de5\\u7c98\\u8d34\\u5230\\u6d4f\\u89c8\\u5668\\u5730\\u5740\\u680f\\u518d\\u8bbf\\u95ee)<br\\/>&nbsp; &nbsp; \\u611f\\u8c22\\u60a8\\u7684\\u8bbf\\u95ee\\uff0c\\u795d\\u60a8\\u4f7f\\u7528\\u6109\\u5feb\\uff01<br\\/><br\\/>&nbsp; &nbsp; \\u6b64\\u81f4<br\\/>&nbsp; &nbsp; ThinkCMF \\u7ba1\\u7406\\u56e2\\u961f.<\\/p>"}', 1);



CREATE TABLE `sp_plugins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(50) NOT NULL COMMENT '插件名，英文',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '插件名称',
  `description` text COMMENT '插件描述',
  `type` tinyint(2) DEFAULT '0' COMMENT '插件类型, 1:网站；8;微信',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态；1开启；',
  `config` text COMMENT '插件配置',
  `hooks` varchar(255) DEFAULT NULL COMMENT '实现的钩子;以“，”分隔',
  `has_admin` tinyint(2) DEFAULT '0' COMMENT '插件是否有后台管理界面',
  `author` varchar(50) DEFAULT '' COMMENT '插件作者',
  `version` varchar(20) DEFAULT '' COMMENT '插件版本号',
  `createtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '插件安装时间',
  `listorder` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='插件表';


CREATE TABLE `sp_helper` (
  `helperid` bigint(15) unsigned NOT NULL AUTO_INCREMENT,
  `helpername` varchar(20) NOT NULL DEFAULT '',
  `idcard` bigint(18) NOT NULL,
  `nation` varchar(12) NOT NULL DEFAULT '',
  `age` varchar(5) NOT NULL DEFAULT '',
  `school` varchar(8) DEFAULT NULL,
  `province` varchar(30) NOT NULL DEFAULT '',
  `city` varchar(30) NOT NULL DEFAULT '',
  `livenow` varchar(100) NOT NULL DEFAULT '',
  `phonenum` varchar(15) NOT NULL DEFAULT '0',
  `type` varchar(60) NOT NULL DEFAULT '',
  `salary` int(9) NOT NULL,
  `brokerid` bigint(15) unsigned NOT NULL,
  `selfdesc` text,
  `brokerdesc` text,
  `trainrecodid` bigint(20) DEFAULT NULL,
  `servicerecordid` bigint(20) DEFAULT NULL,
  `smeta` text,
  `post_date` datetime DEFAULT '0000-00-00 00:00:00',
  `hits` int(11) DEFAULT '0',
  `helper_status` int(2) DEFAULT '1',
  `comment_status` int(2) DEFAULT '1',
  `recommended` tinyint(1) NOT NULL DEFAULT '0',
  `is_findjob` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`helperid`),
  KEY `helpername` (`helpername`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE `sp_broker` (
  `brokerid` bigint(15) unsigned NOT NULL AUTO_INCREMENT,
  `brokername` varchar(20) NOT NULL DEFAULT '',
  `sex` tinyint(1) NOT NULL DEFAULT '0',
  `idcard` bigint(18) NOT NULL,
  `phonenum` varchar(15) NOT NULL DEFAULT '',
  `smeta` text,
  `type` varchar(20) NOT NULL DEFAULT '',
  `self_desc` varchar(600) NOT NULL DEFAULT '',
  `renmai` varchar(100) NOT NULL DEFAULT '',
  `location` varchar(100) NOT NULL DEFAULT '',
  `salary` varchar(50) NOT NULL DEFAULT '',
  `dis` varchar(100) NOT NULL DEFAULT '',
  `broker_status` int(2) DEFAULT '1',
  `number` int(6) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime DEFAULT '0000-00-00 00:00:00',
  `is_findjob` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`brokerid`),
  KEY `brokername` (`brokername`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE `sp_reservation` (
  `reserid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `pay` varchar(20) NOT NULL DEFAULT '',
  `type` varchar(10) NOT NULL DEFAULT '',
  `province` varchar(30) NOT NULL DEFAULT '',
  `city` varchar(30) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL DEFAULT '',
  `reservate_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(2) NOT NULL DEFAULT '0',
  `username` varchar(40) DEFAULT NULL,
  `userphone` varchar(15) NOT NULL DEFAULT '0',
  `recommended` tinyint(1) NOT NULL DEFAULT '0',
  `message` text,
  PRIMARY KEY (`reserid`),
  KEY `pay` (`pay`),
  KEY `address` (`address`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE `sp_servicerecord` (
  `servid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `username` varchar(40) DEFAULT NULL,
  `userphone` varchar(15) NOT NULL DEFAULT '0',
  `pay` varchar(20) NOT NULL DEFAULT '',
  `type` varchar(10) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL DEFAULT '',
  `message` text,
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(2) NOT NULL DEFAULT '0',
  `helperid` bigint(15) unsigned NOT NULL,
  `helpername` varchar(20) NOT NULL DEFAULT '',
  `service_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`servid`),
  KEY `username` (`username`),
  KEY `userid` (`userid`),
  KEY `helpername` (`helpername`),
  KEY `helperid` (`helperid`),
  KEY `type` (`type`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 表的结构 `sp_role`
-- 

CREATE TABLE `sp_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '角色名称',
  `pid` smallint(6) DEFAULT NULL COMMENT '父角色ID',
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT '状态',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `listorder` int(3) NOT NULL DEFAULT '0' COMMENT '排序字段',
  PRIMARY KEY (`id`),
  KEY `parentId` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `sp_role`
-- 

INSERT INTO `sp_role` VALUES (1, '超级管理员', 0, 1, '拥有网站最高管理员权限！', 1329633709, 1329633709, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `sp_role_user`
-- 

CREATE TABLE `sp_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `sp_role_user`
-- 


--
-- 表的结构 `sp_route`
--

CREATE TABLE IF NOT EXISTS `sp_route` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '路由id',
  `full_url` varchar(255) DEFAULT NULL COMMENT '完整url， 如：portal/list/index?id=1',
  `url` varchar(255) DEFAULT NULL COMMENT '实际显示的url',
  `listorder` int(5) DEFAULT '0' COMMENT '排序，优先级，越小优先级越高',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态，1：启用 ;0：不启用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- 
-- 表的结构 `sp_users`
-- 

CREATE TABLE `sp_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `user_pass` varchar(64) NOT NULL DEFAULT '' COMMENT '登录密码；sp_password加密',
  `user_nicename` varchar(50) NOT NULL DEFAULT '' COMMENT '用户美名',
  `userphone` varchar(15) NOT NULL DEFAULT '0',
  `user_email` varchar(100) NOT NULL DEFAULT '' COMMENT '登录邮箱',
  `address` varchar(100) NOT NULL DEFAULT '',
  `avatar` varchar(255) DEFAULT NULL COMMENT '用户头像，相对于upload/avatar目录',
  `sex` smallint(1) DEFAULT '0' COMMENT '性别；0：保密，1：男；2：女',
   
  `last_login_ip` varchar(16) NOT NULL COMMENT '最后登录ip',
  `last_login_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最后登录时间',
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '注册时间',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '' COMMENT '激活码',
  `user_status` int(11) NOT NULL DEFAULT '1' COMMENT '用户状态 0：禁用； 1：正常 ；2：未验证',
  `score` int(11) NOT NULL DEFAULT '0' COMMENT '用户积分',
  `user_type` smallint(1) DEFAULT '1' COMMENT '用户类型，1:admin ;2:会员',
  PRIMARY KEY (`id`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- 
-- 表的结构 `sp_user_favorites`
-- 

CREATE TABLE `sp_user_favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) DEFAULT NULL,
  `helperid` bigint(15) DEFAULT NULL ,
  `helpername` varchar(20) NOT NULL DEFAULT '',
  `type` varchar(60) NOT NULL DEFAULT '',
  `brokerid` bigint(15) DEFAULT NULL ,
  `createtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


-- --------------------------------------------------------

INSERT INTO `sp_auth_rule` VALUES ('1', 'Admin', 'admin_url', 'admin/content/default', null, '人员及评论管理', '1', '');

INSERT INTO `sp_auth_rule` VALUES ('2', 'Comment', 'admin_url', 'comment/commentadmin/index', null, '评论管理', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('3', 'Comment', 'admin_url', 'comment/commentadmin/delete', null, '删除评论', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('4', 'Comment', 'admin_url', 'comment/commentadmin/check', null, '评论审核', '1', '');

INSERT INTO `sp_auth_rule` VALUES ('5', 'Portal', 'admin_url', 'portal/adminpost/index', null, '阿姨管理', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('6', 'Portal', 'admin_url', 'portal/adminpost/recommend', null, '阿姨推荐', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('7', 'Portal', 'admin_url', 'portal/adminpost/delete', null, '删除阿姨', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('8', 'Portal', 'admin_url', 'portal/adminpost/edit', null, '编辑阿姨', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('9', 'Portal', 'admin_url', 'portal/adminpost/edit_post', null, '提交编辑', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('10', 'Portal', 'admin_url', 'portal/adminpost/add', null, '添加阿姨', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('11', 'Portal', 'admin_url', 'portal/adminpost/add_post', null, '提交添加', '1', '');

INSERT INTO `sp_auth_rule` VALUES ('12', 'Portal', 'admin_url', 'portal/adminbroker/index', null, '经纪人管理', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('13', 'Portal', 'admin_url', 'portal/adminbroker/recommend', null, '经纪人推荐', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('14', 'Portal', 'admin_url', 'portal/adminbroker/delete', null, '删除经纪人', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('15', 'Portal', 'admin_url', 'portal/adminbroker/edit', null, '编辑经纪人', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('16', 'Portal', 'admin_url', 'portal/adminbroker/edit_post', null, '提交编辑', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('17', 'Portal', 'admin_url', 'portal/adminbroker/add', null, '添加经纪人', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('18', 'Portal', 'admin_url', 'portal/adminbroker/add_post', null, '提交添加', '1', '');

INSERT INTO `sp_auth_rule` VALUES ('19', 'Admin', 'admin_url', 'admin/recycle/default', null, '回收站', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('20', 'Portal', 'admin_url', 'portal/adminpost/findjob', null, '阿姨申请', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('21', 'Portal', 'admin_url', 'portal/adminpost/pass', null, '通过申请', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('22', 'Portal', 'admin_url', 'portal/adminpost/clean', null, '删除申请', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('23', 'Portal', 'admin_url', 'portal/adminbroker/findjob', null, '经纪人申请', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('24', 'Portal', 'admin_url', 'portal/adminbroker/clean', null, '删除申请', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('25', 'Portal', 'admin_url', 'portal/adminbroker/pass', null, '通过申请', '1', '');

INSERT INTO `sp_auth_rule` VALUES ('32', 'Admin', 'admin_url', 'admin/recycle/default', null, '回收站', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('33', 'Portal', 'admin_url', 'portal/adminpost/recyclebin', null, '阿姨回收', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('34', 'Portal', 'admin_url', 'portal/adminpost/restore', null, '阿姨还原', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('35', 'Portal', 'admin_url', 'portal/adminpost/clean', null, '彻底删除', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('36', 'Portal', 'admin_url', 'portal/adminbroker/recyclebin', null, '经纪人回收', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('37', 'Portal', 'admin_url', 'portal/adminbroker/clean', null, '彻底删除', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('38', 'Portal', 'admin_url', 'portal/adminbroker/restore', null, '经纪人还原', '1', '');

INSERT INTO `sp_auth_rule` VALUES ('39', 'Admin', 'admin_url', 'admin/extension/default', null, '扩展工具', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('40', 'Admin', 'admin_url', 'admin/backup/default', null, '备份管理', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('41', 'Admin', 'admin_url', 'admin/backup/restore', null, '数据还原', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('42', 'Admin', 'admin_url', 'admin/backup/index', null, '数据备份', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('43', 'Admin', 'admin_url', 'admin/backup/index_post', null, '提交数据备份', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('44', 'Admin', 'admin_url', 'admin/backup/download', null, '下载备份', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('45', 'Admin', 'admin_url', 'admin/backup/del_backup', null, '删除备份', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('46', 'Admin', 'admin_url', 'admin/backup/import', null, '数据备份导入', '1', '');

INSERT INTO `sp_auth_rule` VALUES ('75', 'Admin', 'admin_url', 'admin/link/index', null, '友情链接', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('76', 'Admin', 'admin_url', 'admin/link/listorders', null, '友情链接排序', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('77', 'Admin', 'admin_url', 'admin/link/toggle', null, '友链显示切换', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('78', 'Admin', 'admin_url', 'admin/link/delete', null, '删除友情链接', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('79', 'Admin', 'admin_url', 'admin/link/edit', null, '编辑友情链接', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('80', 'Admin', 'admin_url', 'admin/link/edit_post', null, '提交编辑', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('81', 'Admin', 'admin_url', 'admin/link/add', null, '添加友情链接', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('82', 'Admin', 'admin_url', 'admin/link/add_post', null, '提交添加', '1', '');

INSERT INTO `sp_auth_rule` VALUES ('83', 'Api', 'admin_url', 'api/oauthadmin/setting', null, '第三方登陆', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('84', 'Api', 'admin_url', 'api/oauthadmin/setting_post', null, '提交设置', '1', '');

INSERT INTO `sp_auth_rule` VALUES ('85', 'Admin', 'admin_url', 'admin/menu/default', null, '订单管理', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('86', 'Portal', 'admin_url', 'portal/adminreservation/index', null, '预约管理', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('87', 'Portal', 'admin_url', 'portal/adminreservation/delete', null, '删除预约', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('88', 'Portal', 'admin_url', 'portal/adminreservation/edit', null, '编辑预约', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('89', 'Portal', 'admin_url', 'portal/adminreservation/edit_post', null, '提交编辑', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('90', 'Portal', 'admin_url', 'portal/adminreservation/detail', null, '查看预约', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('91', 'Portal', 'admin_url', 'portal/adminreservation/recommend', null, '推荐预约', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('92', 'Portal', 'admin_url', 'portal/adminreservation/yuyue', null, '预约失败', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('93', 'Portal', 'admin_url', 'portal/adminreservation/choose', null, '选择阿姨', '1', '');

INSERT INTO `sp_auth_rule` VALUES ('94', 'Portal', 'admin_url', 'portal/adminservicerecord/index', null, '订单列表', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('95', 'Portal', 'admin_url', 'portal/adminservicerecord/add', null, '添加订单', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('96', 'Portal', 'admin_url', 'portal/adminservicerecord/add_post', null, '提交添加', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('97', 'Portal', 'admin_url', 'portal/adminservicerecord/edit', null, '编辑订单', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('98', 'Portal', 'admin_url', 'portal/adminservicerecord/edit_post', null, '提交编辑', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('99', 'Portal', 'admin_url', 'portal/adminservicerecord/delete', null, '删除菜单', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('100', 'Portal', 'admin_url', 'portal/adminservicerecord/detail', null, '查看订单', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('101', 'Portal', 'admin_url', 'portal/adminservicerecord/showleave', null, '查看留言', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('102', 'Portal', 'admin_url', 'portal/adminservicerecord/solve', null, '处理订单', '1', '');

INSERT INTO `sp_auth_rule` VALUES ('109', 'Admin', 'admin_url', 'admin/setting/default', null, '设置', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('110', 'Admin', 'admin_url', 'admin/setting/userdefault', null, '个人信息', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('111', 'Admin', 'admin_url', 'admin/user/userinfo', null, '修改信息', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('112', 'Admin', 'admin_url', 'admin/user/userinfo_post', null, '修改信息提交', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('113', 'Admin', 'admin_url', 'admin/setting/password', null, '修改密码', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('114', 'Admin', 'admin_url', 'admin/setting/password_post', null, '提交修改', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('115', 'Admin', 'admin_url', 'admin/setting/site', null, '网站信息', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('116', 'Admin', 'admin_url', 'admin/setting/site_post', null, '提交修改', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('117', 'Admin', 'admin_url', 'admin/route/index', null, '路由列表', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('118', 'Admin', 'admin_url', 'admin/route/add', null, '路由添加', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('119', 'Admin', 'admin_url', 'admin/route/add_post', null, '路由添加提交', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('120', 'Admin', 'admin_url', 'admin/route/edit', null, '路由编辑', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('121', 'Admin', 'admin_url', 'admin/route/edit_post', null, '路由编辑提交', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('122', 'Admin', 'admin_url', 'admin/route/delete', null, '路由删除', '1', ''); 
INSERT INTO `sp_auth_rule` VALUES ('123', 'Admin', 'admin_url', 'admin/route/ban', null, '路由禁止', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('124', 'Admin', 'admin_url', 'admin/route/open', null, '路由启用', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('125', 'Admin', 'admin_url', 'admin/route/listorders', null, '路由排序', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('126', 'Admin', 'admin_url', 'admin/mailer/default', null, '邮箱配置', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('127', 'Admin', 'admin_url', 'admin/mailer/index', null, 'SMTP配置', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('128', 'Admin', 'admin_url', 'admin/mailer/index_post', null, '提交配置', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('129', 'Admin', 'admin_url', 'admin/mailer/active', null, '邮件模板', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('130', 'Admin', 'admin_url', 'admin/mailer/active_post', null, '提交模板', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('131', 'Admin', 'admin_url', 'admin/setting/clearcache', null, '清除缓存', '1', '');

INSERT INTO `sp_auth_rule` VALUES ('132', 'User', 'admin_url', 'user/indexadmin/default', null, '用户管理', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('133', 'User', 'admin_url', 'user/indexadmin/default1', null, '用户组', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('134', 'User', 'admin_url', 'user/indexadmin/index', null, '本站用户', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('135', 'User', 'admin_url', 'user/indexadmin/ban', null, '拉黑会员', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('136', 'User', 'admin_url', 'user/indexadmin/cancelban', null, '启用会员', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('137', 'User', 'admin_url', 'user/oauthadmin/index', null, '第三方用户', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('138', 'User', 'admin_url', 'user/oauthadmin/delete', null, '第三方用户解绑', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('139', 'User', 'admin_url', 'user/indexadmin/default3', null, '管理组', '1', '');

INSERT INTO `sp_auth_rule` VALUES ('140', 'Admin', 'admin_url', 'admin/rbac/index', null, '角色管理', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('141', 'Admin', 'admin_url', 'admin/rbac/member', null, '成员管理', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('142', 'Admin', 'admin_url', 'admin/rbac/authorize', null, '权限设置', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('143', 'Admin', 'admin_url', 'admin/rbac/authorize_post', null, '提交设置', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('144', 'Admin', 'admin_url', 'admin/rbac/roleedit', null, '编辑角色', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('145', 'Admin', 'admin_url', 'admin/rbac/roleedit_post', null, '提交编辑', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('146', 'Admin', 'admin_url', 'admin/rbac/roledelete', null, '删除角色', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('147', 'Admin', 'admin_url', 'admin/rbac/roleadd', null, '添加角色', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('148', 'Admin', 'admin_url', 'admin/rbac/roleadd_post', null, '提交添加', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('149', 'Admin', 'admin_url', 'admin/user/index', null, '管理员', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('150', 'Admin', 'admin_url', 'admin/user/delete', null, '删除管理员', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('151', 'Admin', 'admin_url', 'admin/user/edit', null, '管理员编辑', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('152', 'Admin', 'admin_url', 'admin/user/edit_post', null, '编辑提交', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('153', 'Admin', 'admin_url', 'admin/user/add', null, '管理员添加', '1', '');
INSERT INTO `sp_auth_rule` VALUES ('154', 'Admin', 'admin_url', 'admin/user/add_post', null, '添加提交', '1', '');


-- 
-- 导出表中的数据 `sp_links`
-- 

INSERT INTO `sp_links` VALUES (1, 'http://www.thinkcmf.com', 'ThinkCMF', '', '_blank', '', 1, 0, '', 0);

-- 
-- 导出表中的数据 `sp_menu`
-- 

INSERT INTO `sp_menu` VALUES ('1', '0', 'Admin', 'Content', 'default', '', '0', '1', '人员及评论管理', 'th', '', '30');

INSERT INTO `sp_menu` VALUES ('2', '1', 'Comment', 'Commentadmin', 'index', '', '1', '1', '评论管理', '', '', '0');
INSERT INTO `sp_menu` VALUES ('3', '2', 'Comment', 'Commentadmin', 'delete', '', '1', '0', '删除评论', '', '', '0');
INSERT INTO `sp_menu` VALUES ('4', '2', 'Comment', 'Commentadmin', 'check', '', '1', '0', '评论审核', '', '', '0');

INSERT INTO `sp_menu` VALUES ('5', '1', 'Portal', 'AdminPost', 'index', '', '1', '1', '阿姨管理', '', '', '1');
INSERT INTO `sp_menu` VALUES ('6', '5', 'Portal', 'AdminPost', 'recommend', '', '1', '0', '阿姨推荐', '', '', '0');
INSERT INTO `sp_menu` VALUES ('7', '5', 'Portal', 'AdminPost', 'delete', '', '1', '0', '删除阿姨', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('8', '5', 'Portal', 'AdminPost', 'edit', '', '1', '0', '修改阿姨信息', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('9', '8', 'Portal', 'AdminPost', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `sp_menu` VALUES ('10', '5', 'Portal', 'AdminPost', 'add', '', '1', '0', '添加阿姨', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('11', '10', 'Portal', 'AdminPost', 'add_post', '', '1', '0', '提交添加', '', '', '0');

INSERT INTO `sp_menu` VALUES ('12', '1', 'Portal', 'AdminBroker', 'index', '', '0', '1', '经纪人管理', '', '', '2');
INSERT INTO `sp_menu` VALUES ('13', '12', 'Portal', 'AdminBroker', 'recommend', '', '1', '0', '经纪人推荐', '', '', '0');
INSERT INTO `sp_menu` VALUES ('14', '12', 'Portal', 'AdminBroker', 'delete', '', '1', '0', '删除经纪人', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('15', '12', 'Portal', 'AdminBroker', 'edit', '', '1', '0', '修改经纪人信息', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('16', '15', 'Portal', 'AdminBroker', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `sp_menu` VALUES ('17', '12', 'Portal', 'AdminBroker', 'add', '', '1', '0', '添加经纪人', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('18', '17', 'Portal', 'AdminBroker', 'add_post', '', '1', '0', '提交添加', '', '', '0');

INSERT INTO `sp_menu` VALUES ('19', '1', 'Admin', 'Recycle', 'default', '', '1', '1', '工作申请管理', '', '', '4');
INSERT INTO `sp_menu` VALUES ('20', '19', 'Portal', 'AdminPost', 'findjob', '', '1', '1', '申请阿姨', '', '', '0');
INSERT INTO `sp_menu` VALUES ('21', '20', 'Portal', 'AdminPost', 'pass', '', '1', '0', '通过申请', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('22', '20', 'Portal', 'AdminPost', 'clean', '', '1', '0', '删除申请', '', '', '1000');

INSERT INTO `sp_menu` VALUES ('23', '19', 'Portal', 'AdminBroker', 'findjob', '', '1', '1', '申请经纪人', '', '', '1');
INSERT INTO `sp_menu` VALUES ('24', '23', 'Portal', 'AdminBroker', 'clean', '', '1', '0', '删除申请', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('25', '23', 'Portal', 'AdminBroker', 'pass', '', '1', '0', '通过申请', '', '', '1000');

INSERT INTO `sp_menu` VALUES ('32', '1', 'Admin', 'Recycle', 'default', '', '1', '1', '回收站', '', '', '4');
INSERT INTO `sp_menu` VALUES ('33', '32', 'Portal', 'AdminPost', 'recyclebin', '', '1', '1', '阿姨回收', '', '', '0');
INSERT INTO `sp_menu` VALUES ('34', '33', 'Portal', 'AdminPost', 'restore', '', '1', '0', '恢复阿姨', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('35', '33', 'Portal', 'AdminPost', 'clean', '', '1', '0', '彻底删除', '', '', '1000');

INSERT INTO `sp_menu` VALUES ('36', '32', 'Portal', 'AdminBroker', 'recyclebin', '', '1', '1', '经纪人回收', '', '', '1');
INSERT INTO `sp_menu` VALUES ('37', '36', 'Portal', 'AdminBroker', 'clean', '', '1', '0', '彻底删除', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('38', '36', 'Portal', 'AdminBroker', 'restore', '', '1', '0', '经纪人恢复', '', '', '1000');

INSERT INTO `sp_menu` VALUES ('39', '0', 'Admin', 'Extension', 'default', '', '0', '1', '扩展工具', 'cloud', '', '40');
INSERT INTO `sp_menu` VALUES ('40', '39', 'Admin', 'Backup', 'default', '', '1', '1', '备份管理', '', '', '0');
INSERT INTO `sp_menu` VALUES ('41', '40', 'Admin', 'Backup', 'restore', '', '1', '1', '数据还原', '', '', '0');
INSERT INTO `sp_menu` VALUES ('42', '40', 'Admin', 'Backup', 'index', '', '1', '1', '数据备份', '', '', '0');
INSERT INTO `sp_menu` VALUES ('43', '42', 'Admin', 'Backup', 'index_post', '', '1', '0', '提交数据备份', '', '', '0');
INSERT INTO `sp_menu` VALUES ('44', '40', 'Admin', 'Backup', 'download', '', '1', '0', '下载备份', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('45', '40', 'Admin', 'Backup', 'del_backup', '', '1', '0', '删除备份', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('46', '40', 'Admin', 'Backup', 'import', '', '1', '0', '数据备份导入', '', '', '1000');

INSERT INTO `sp_menu` VALUES ('75', '39', 'Admin', 'Link', 'index', '', '0', '1', '友情链接', '', '', '3');
INSERT INTO `sp_menu` VALUES ('76', '75', 'Admin', 'Link', 'listorders', '', '1', '0', '友情链接排序', '', '', '0');
INSERT INTO `sp_menu` VALUES ('77', '75', 'Admin', 'Link', 'toggle', '', '1', '0', '友链显示切换', '', '', '0');
INSERT INTO `sp_menu` VALUES ('78', '75', 'Admin', 'Link', 'delete', '', '1', '0', '删除友情链接', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('79', '75', 'Admin', 'Link', 'edit', '', '1', '0', '编辑友情链接', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('80', '79', 'Admin', 'Link', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `sp_menu` VALUES ('81', '75', 'Admin', 'Link', 'add', '', '1', '0', '添加友情链接', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('82', '81', 'Admin', 'Link', 'add_post', '', '1', '0', '提交添加', '', '', '0');

INSERT INTO `sp_menu` VALUES ('83', '39', 'Api', 'Oauthadmin', 'setting', '', '1', '1', '第三方登陆', 'leaf', '', '4');
INSERT INTO `sp_menu` VALUES ('84', '83', 'Api', 'Oauthadmin', 'setting_post', '', '1', '0', '提交设置', '', '', '0');

INSERT INTO `sp_menu` VALUES ('85', '0', 'Admin', 'Menu', 'default', '', '1', '1', '订单管理', 'list', '', '20');
INSERT INTO `sp_menu` VALUES ('86', '85', 'Portal', 'AdminReservation', 'index', '', '1', '1', '预约申请', '', '', '0');
INSERT INTO `sp_menu` VALUES ('87', '86', 'Portal', 'AdminReservation', 'delete', '', '1', '0', '删除预约', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('88', '86', 'Portal', 'AdminReservation', 'edit', '', '1', '0', '编辑预约', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('89', '88', 'Portal', 'AdminReservation', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `sp_menu` VALUES ('90', '86', 'Portal', 'AdminReservation', 'recommend', '', '1', '0', '推荐预约', '', '', '0');
INSERT INTO `sp_menu` VALUES ('91', '86', 'Portal', 'AdminReservation', 'yuyue', '', '1', '0', '预约失败', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('92', '86', 'Portal', 'AdminReservation', 'choose', '', '1', '0', '选择阿姨', '', '', '1000');

INSERT INTO `sp_menu` VALUES ('100', '85', 'Portal', 'AdminServicerecord', 'index', '', '1', '1', '订单', '', '', '0');
INSERT INTO `sp_menu` VALUES ('103', '100', 'Portal', 'AdminServicerecord', 'showleave', '', '1', '0', '查看留言', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('104', '100', 'Portal', 'AdminServicerecord', 'solve', '', '1', '0', '处理订单', '', '', '0');
INSERT INTO `sp_menu` VALUES ('101', '100', 'Portal', 'AdminServicerecord', 'add', '', '1', '0', '添加订单', '', '', '0');
INSERT INTO `sp_menu` VALUES ('102', '101', 'Portal', 'AdminServicerecord', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `sp_menu` VALUES ('105', '100', 'Portal', 'AdminServicerecord', 'edit', '', '1', '0', '编辑订单', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('106', '105', 'Portal', 'AdminServicerecord', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `sp_menu` VALUES ('107', '100', 'Portal', 'AdminServicerecord', 'delete', '', '1', '0', '删除订单', '', '', '1000');

INSERT INTO `sp_menu` VALUES ('109', '0', 'Admin', 'Setting', 'default', '', '0', '1', '设置', 'cogs', '', '0');
INSERT INTO `sp_menu` VALUES ('110', '109', 'Admin', 'Setting', 'userdefault', '', '0', '1', '个人信息', '', '', '0');
INSERT INTO `sp_menu` VALUES ('111', '110', 'Admin', 'User', 'userinfo', '', '1', '1', '修改信息', '', '', '0');
INSERT INTO `sp_menu` VALUES ('112', '111', 'Admin', 'User', 'userinfo_post', '', '1', '0', '修改信息提交', '', '', '0');
INSERT INTO `sp_menu` VALUES ('113', '110', 'Admin', 'Setting', 'password', '', '1', '1', '修改密码', '', '', '0');
INSERT INTO `sp_menu` VALUES ('114', '113', 'Admin', 'Setting', 'password_post', '', '1', '0', '提交修改', '', '', '0');
INSERT INTO `sp_menu` VALUES ('115', '109', 'Admin', 'Setting', 'site', '', '1', '1', '网站信息', '', '', '0');
INSERT INTO `sp_menu` VALUES ('116', '115', 'Admin', 'Setting', 'site_post', '', '1', '0', '提交修改', '', '', '0');
INSERT INTO `sp_menu` VALUES ('117', '115', 'Admin', 'Route', 'index', '', '1', '0', '路由列表', '', '', '0');
INSERT INTO `sp_menu` VALUES ('118', '115', 'Admin', 'Route', 'add', '', '1', '0', '路由添加', '', '', '0');
INSERT INTO `sp_menu` VALUES ('119', '118', 'Admin', 'Route', 'add_post', '', '1', '0', '路由添加提交', '', '', '0');
INSERT INTO `sp_menu` VALUES ('120', '115', 'Admin', 'Route', 'edit', '', '1', '0', '路由编辑', '', '', '0');
INSERT INTO `sp_menu` VALUES ('121', '120', 'Admin', 'Route', 'edit_post', '', '1', '0', '路由编辑提交', '', '', '0');
INSERT INTO `sp_menu` VALUES ('122', '115', 'Admin', 'Route', 'delete', '', '1', '0', '路由删除', '', '', '0');
INSERT INTO `sp_menu` VALUES ('123', '115', 'Admin', 'Route', 'ban', '', '1', '0', '路由禁止', '', '', '0');
INSERT INTO `sp_menu` VALUES ('124', '115', 'Admin', 'Route', 'open', '', '1', '0', '路由启用', '', '', '0');
INSERT INTO `sp_menu` VALUES ('125', '115', 'Admin', 'Route', 'listorders', '', '1', '0', '路由排序', '', '', '0');
INSERT INTO `sp_menu` VALUES ('126', '109', 'Admin', 'Mailer', 'default', '', '1', '1', '邮箱配置', '', '', '0');
INSERT INTO `sp_menu` VALUES ('127', '126', 'Admin', 'Mailer', 'index', '', '1', '1', 'SMTP配置', '', '', '0');
INSERT INTO `sp_menu` VALUES ('128', '127', 'Admin', 'Mailer', 'index_post', '', '1', '0', '提交配置', '', '', '0');
INSERT INTO `sp_menu` VALUES ('129', '126', 'Admin', 'Mailer', 'active', '', '1', '1', '邮件模板', '', '', '0');
INSERT INTO `sp_menu` VALUES ('130', '129', 'Admin', 'Mailer', 'active_post', '', '1', '0', '提交模板', '', '', '0');
INSERT INTO `sp_menu` VALUES ('131', '109', 'Admin', 'Setting', 'clearcache', '', '1', '1', '清除缓存', '', '', '1');
INSERT INTO `sp_menu` VALUES ('132', '0', 'User', 'Indexadmin', 'default', '', '1', '1', '用户管理', 'group', '', '10');
INSERT INTO `sp_menu` VALUES ('133', '132', 'User', 'Indexadmin', 'default1', '', '1', '1', '用户组', '', '', '0');
INSERT INTO `sp_menu` VALUES ('134', '133', 'User', 'Indexadmin', 'index', '', '1', '1', '本站用户', 'leaf', '', '0');
INSERT INTO `sp_menu` VALUES ('135', '134', 'User', 'Indexadmin', 'ban', '', '1', '0', '拉黑会员', '', '', '0');
INSERT INTO `sp_menu` VALUES ('136', '134', 'User', 'Indexadmin', 'cancelban', '', '1', '0', '启用会员', '', '', '0');
INSERT INTO `sp_menu` VALUES ('137', '133', 'User', 'Oauthadmin', 'index', '', '1', '1', '第三方用户', 'leaf', '', '0');
INSERT INTO `sp_menu` VALUES ('138', '137', 'User', 'Oauthadmin', 'delete', '', '1', '0', '第三方用户解绑', '', '', '0');
INSERT INTO `sp_menu` VALUES ('139', '132', 'User', 'Indexadmin', 'default3', '', '1', '1', '管理组', '', '', '0');
INSERT INTO `sp_menu` VALUES ('140', '139', 'Admin', 'Rbac', 'index', '', '1', '1', '角色管理', '', '', '0');
INSERT INTO `sp_menu` VALUES ('141', '140', 'Admin', 'Rbac', 'member', '', '1', '0', '成员管理', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('142', '140', 'Admin', 'Rbac', 'authorize', '', '1', '0', '权限设置', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('143', '142', 'Admin', 'Rbac', 'authorize_post', '', '1', '0', '提交设置', '', '', '0');
INSERT INTO `sp_menu` VALUES ('144', '140', 'Admin', 'Rbac', 'roleedit', '', '1', '0', '编辑角色', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('145', '144', 'Admin', 'Rbac', 'roleedit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `sp_menu` VALUES ('146', '140', 'Admin', 'Rbac', 'roledelete', '', '1', '1', '删除角色', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('147', '140', 'Admin', 'Rbac', 'roleadd', '', '1', '1', '添加角色', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('148', '147', 'Admin', 'Rbac', 'roleadd_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `sp_menu` VALUES ('149', '139', 'Admin', 'User', 'index', '', '1', '1', '管理员', '', '', '0');
INSERT INTO `sp_menu` VALUES ('150', '149', 'Admin', 'User', 'delete', '', '1', '0', '删除管理员', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('151', '149', 'Admin', 'User', 'edit', '', '1', '0', '管理员编辑', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('152', '151', 'Admin', 'User', 'edit_post', '', '1', '0', '编辑提交', '', '', '0');
INSERT INTO `sp_menu` VALUES ('153', '149', 'Admin', 'User', 'add', '', '1', '0', '管理员添加', '', '', '1000');
INSERT INTO `sp_menu` VALUES ('154', '153', 'Admin', 'User', 'add_post', '', '1', '0', '添加提交', '', '', '0');
INSERT INTO `sp_menu` VALUES ('156', '43', 'Admin', 'Storage', 'index', '', '1', '1', '文件存储', '', '', '0');
INSERT INTO `sp_menu` VALUES ('157', '156', 'Admin', 'Storage', 'setting_post', '', '1', '0', '文件存储设置提交', '', '', '0');
-- --------------------------------------------------------

-- 
-- 导出表中的数据 `sp_nav`
-- 

INSERT INTO `sp_nav` VALUES (1, 1, 0, '首页', '', 'home', '', 1, 0, '0-1');
INSERT INTO `sp_nav` VALUES (2, 1, 0, '列表演示', '', 'a:2:{s:6:"action";s:17:"Portal/List/index";s:5:"param";a:1:{s:2:"id";s:1:"1";}}', '', 1, 0, '0-2');
INSERT INTO `sp_nav` VALUES (3, 1, 0, '瀑布流', '', 'a:2:{s:6:"action";s:17:"Portal/List/index";s:5:"param";a:1:{s:2:"id";s:1:"2";}}', '', 1, 0, '0-3');


-- 
-- 导出表中的数据 `sp_nav_cat`
-- 

INSERT INTO `sp_nav_cat` VALUES (1, '主导航', 1, '主导航');
