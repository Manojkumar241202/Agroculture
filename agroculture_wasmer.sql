-- Clean SQL file for Wasmer.io deployment
-- This file does NOT create/select a database (Wasmer.io does that automatically)
-- Just run the table creation statements

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Table structure for table `blogdata`
CREATE TABLE IF NOT EXISTS `blogdata` (
  `blogId` int(10) NOT NULL AUTO_INCREMENT,
  `blogUser` varchar(256) NOT NULL,
  `blogTitle` varchar(256) NOT NULL,
  `blogContent` longtext NOT NULL,
  `blogTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`blogId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `blogfeedback`
CREATE TABLE IF NOT EXISTS `blogfeedback` (
  `blogId` int(10) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `commentUser` varchar(256) NOT NULL,
  `commentPic` varchar(256) NOT NULL DEFAULT 'profile0.png',
  `commentTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `blogId` (`blogId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `farmer`
CREATE TABLE IF NOT EXISTS `farmer` (
  `fid` int(255) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `fusername` varchar(255) NOT NULL,
  `fpassword` varchar(255) NOT NULL,
  `fhash` varchar(255) NOT NULL,
  `femail` varchar(255) NOT NULL,
  `fmobile` varchar(255) NOT NULL,
  `faddress` text NOT NULL,
  `factive` int(255) NOT NULL DEFAULT '0',
  `frating` int(11) NOT NULL DEFAULT '0',
  `picExt` varchar(255) NOT NULL DEFAULT 'png',
  `picStatus` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fid`),
  UNIQUE KEY `fid` (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `buyer`
CREATE TABLE IF NOT EXISTS `buyer` (
  `bid` int(100) NOT NULL AUTO_INCREMENT,
  `bname` varchar(100) NOT NULL,
  `busername` varchar(100) NOT NULL,
  `bpassword` varchar(100) NOT NULL,
  `bhash` varchar(100) NOT NULL,
  `bemail` varchar(100) NOT NULL,
  `bmobile` varchar(100) NOT NULL,
  `baddress` text NOT NULL,
  `bactive` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bid`),
  UNIQUE KEY `bid` (`bid`),
  CONSTRAINT `buyer_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `farmer` (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `fproduct`
CREATE TABLE IF NOT EXISTS `fproduct` (
  `fid` int(255) NOT NULL,
  `pid` int(255) NOT NULL AUTO_INCREMENT,
  `product` varchar(255) NOT NULL,
  `pcat` varchar(255) NOT NULL,
  `pinfo` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `pimage` varchar(255) NOT NULL DEFAULT 'blank.png',
  `picStatus` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `likedata`
CREATE TABLE IF NOT EXISTS `likedata` (
  `blogId` int(10) NOT NULL,
  `blogUserId` int(10) NOT NULL,
  KEY `blogId` (`blogId`),
  KEY `blogUserId` (`blogUserId`),
  CONSTRAINT `likedata_ibfk_1` FOREIGN KEY (`blogId`) REFERENCES `blogdata` (`blogId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `mycart`
CREATE TABLE IF NOT EXISTS `mycart` (
  `bid` int(10) NOT NULL,
  `pid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `review`
CREATE TABLE IF NOT EXISTS `review` (
  `pid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rating` int(10) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `transaction`
CREATE TABLE IF NOT EXISTS `transaction` (
  `tid` int(10) NOT NULL AUTO_INCREMENT,
  `bid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `addr` varchar(255) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

