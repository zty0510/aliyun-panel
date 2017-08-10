-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-10-03 22:14:28
-- 服务器版本： 5.5.28
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `base`
--

-- --------------------------------------------------------

--
-- 表的结构 `aliyun_admin`
--

CREATE TABLE IF NOT EXISTS `aliyun_admin` (
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `aliyun_admin`
--

INSERT INTO `aliyun_admin` (`name`, `pass`, `token`) VALUES
('meteor', '872125493', '35fae5e6f662ce9f9d97b4144f0d7956');

-- --------------------------------------------------------

--
-- 表的结构 `aliyun_flist`
--

CREATE TABLE IF NOT EXISTS `aliyun_flist` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `fid` text NOT NULL,
  `diqu` varchar(255) NOT NULL,
  `ip` text NOT NULL,
  `dk` varchar(255) NOT NULL,
  `os` text NOT NULL,
  `eip` varchar(255) NOT NULL,
  `zll` text NOT NULL,
  `yll` text NOT NULL,
  `addtime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `aliyun_user`
--

CREATE TABLE IF NOT EXISTS `aliyun_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `regtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
-- Indexes for dumped tables
--

--
-- Indexes for table `aliyun_flist`
--
ALTER TABLE `aliyun_flist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aliyun_user`
--
ALTER TABLE `aliyun_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aliyun_flist`
--
ALTER TABLE `aliyun_flist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `aliyun_user`
--
ALTER TABLE `aliyun_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
