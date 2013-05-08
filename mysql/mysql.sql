﻿# 建表
set names utf8;
set character_set_database = utf8;
set character_set_server = utf8;
USE classParty;

#
# Table structure for table 'user'
# 
# id + 用户名 + 密码 +　个人信息 + 头像地址 + 是否活动管理员 + 注册时间 + 性别 + 出生年月 + 所在城市
CREATE TABLE user (
	id int(8) unsigned NOT NULL auto_increment,
	UserName varchar(32) NOT NULL ,
	Password varchar(32)  NOT NULL ,
	Info text NOT NULL ,
	PicPath varchar(32) NOT NULL ,
	IsAdmin tinyint(1) DEFAULT '0' NOT NULL,   
	Date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,   
	Sex char(1) NOT NULL DEFAULT 'M',
	Birth date DEFAULT NULL,
	City varchar(20) NOT NULL DEFAULT '广州',
	
	PRIMARY KEY (id),
	KEY userName (userName(32))
);

#
# Table structure for table 'friend'
#
# 用户归属组： 用户1’id + 用户2’id
CREATE TABLE friend(
	UserA int(8) unsigned NOT NULL,
	UserB int(8) unsigned NOT NULL,

	PRIMARY KEY (UserA, UserB),
	FOREIGN KEY (UserA) REFERENCES user (id),
	FOREIGN KEY (UserB) REFERENCES user (id)
);

#
# Table structure for table 'activity'
#
# 活动：id + 活动名字 + 活动创建人 + 活动时间 + 活动地点 + 活动信息
CREATE TABLE activity(
	id int(32) unsigned NOT NULL auto_increment,
	ActName varchar(32) NOT NULL,
	ActInfo varchar(140) NOT NULL,
	UserID int(32) unsigned NOT NULL,
	ActTime date NOT NULL,
	start int(4) NOT NULL,
	end int(4) NOT NULL,
	ActLoc varchar(50) NOT NULL,
	
	PRIMARY KEY (id)
);

#
# Table structure for table 'joinin'
#
# 加入活动：用户id + 活动id
CREATE TABLE joinin(
	UserID int(8) unsigned NOT NULL,
	ActID int(8) unsigned NOT NULL,
	
	PRIMARY KEY (UserID, ActID),
	FOREIGN KEY (UserID) REFERENCES user (id),
	FOREIGN KEY (ActID) REFERENCES activity (id)
);

#
# Table structure for table ''
#
# 邀请好友加入活动
CREATE TABLE invitation(
	UserID int(8) unsigned NOT NULL,
	ActID int(8) unsigned NOT NULL,
	Accept int(3) unsigned NOT NULL,
	
	PRIMARY KEY (UserID, ActID),
	FOREIGN KEY (UserID) REFERENCES user (id),
	FOREIGN KEY (ActID) REFERENCES activity (id)
);