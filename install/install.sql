-- 表;
create table `%PREFIX%users`(
    `uid` int primary key auto_increment,
    `name` text not null,
    `email` text not null,
    `password` char(32) not null,
    `time` int not null,
    `gid` int not null,
    `baiduid` text
) default charset utf8;
create table `%PREFIX%groups`(
    `gid` int primary key auto_increment,
    `name` text not null
) default charset utf8;
create table `%PREFIX%options`(
    `name` char(255) primary key,
    `value` text,
    `uid` int
) default charset utf8;
create table `%PREFIX%plugins`(
    `pcn` char(255) primary key,
    `class` char(255) not null,
    `isactivate` int(1) not null
) default charset utf8;
create table `%PREFIX%online`(
    `uid` int primary key,
    `uss` text not null,
    `time` int not null,
    `ip` char(15) not null
) default charset utf8;

-- 记录;
insert into `%PREFIX%groups` values(1, '管理员');
insert into `%PREFIX%groups` values(2, '用户');
insert into `%PREFIX%groups` values(3, 'VIP');
insert into `%PREFIX%groups` values(4, '禁止访问');
insert into `%PREFIX%options` values('system_name', '云签', 0);
insert into `%PREFIX%options` values('system_beian', '备你妈案', 0);
insert into `%PREFIX%options` values('system_version', '1.0', 0);
insert into `%PREFIX%options` values('system_theme', 'default', 0);
insert into `%PREFIX%options` values('api_skey', '', 0);