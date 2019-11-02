-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 02, 2019 at 02:59 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nguyenvinhquang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tacgia`
--

DROP TABLE IF EXISTS `tacgia`;
CREATE TABLE IF NOT EXISTS `tacgia` (
  `MaTacGia` varchar(10) NOT NULL,
  `TenTacGia` varchar(50) NOT NULL,
  `QuocTich` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`MaTacGia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tacgia`
--

INSERT INTO `tacgia` (`MaTacGia`, `TenTacGia`, `QuocTich`, `Email`) VALUES
('TG001', 'Nam Cao', 'Việt Nam', 'namcao@gmail.com'),
('TG002', 'Kim Lân', 'Việt Nam', 'kimlan@gmail.com'),
('TG003', 'Xuân Diệu', 'Việt Nam', 'xuandieu@gmail.com'),
('TG004', 'Tố Hữu', 'Việt Nam', 'tohuu@gmail.com'),
('TG005', 'Harper Lee', 'Hoa Ky', 'harperlee@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tailieu`
--

DROP TABLE IF EXISTS `tailieu`;
CREATE TABLE IF NOT EXISTS `tailieu` (
  `MaTaiLieu` varchar(10) NOT NULL,
  `TenTaiLieu` varchar(100) NOT NULL,
  `AnhBia` varchar(100) NOT NULL,
  `SoTrang` int(11) NOT NULL,
  `NamPhatHanh` varchar(5) NOT NULL,
  `MaLoaiTaiLieu` varchar(10) NOT NULL,
  `MaTacGia` varchar(10) NOT NULL,
  PRIMARY KEY (`MaTaiLieu`),
  KEY `FK_TACGIA` (`MaTacGia`),
  KEY `FK_THELOAI` (`MaLoaiTaiLieu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tailieu`
--

INSERT INTO `tailieu` (`MaTaiLieu`, `TenTaiLieu`, `AnhBia`, `SoTrang`, `NamPhatHanh`, `MaLoaiTaiLieu`, `MaTacGia`) VALUES
('TL001', 'Chí Phèo', 'chipheo.jpg', 1000, '1941', 'LTL005', 'TG001'),
('TL002', 'Làng', 'lang.jpg', 700, '1948', 'LTL002', 'TG002'),
('TL003', 'Từ ấy', 'tuay.jpg', 300, '1946', 'LTL001', 'TG004'),
('TL004', 'Sáng', 'sang.jpg', 200, '1953', 'LTL001', 'TG003'),
('TL005', 'To Kill a Mockingbird', 'tokillamockingbird.jpg', 281, '1960', 'LTL004', 'TG005');

-- --------------------------------------------------------

--
-- Table structure for table `theloaitailieu`
--

DROP TABLE IF EXISTS `theloaitailieu`;
CREATE TABLE IF NOT EXISTS `theloaitailieu` (
  `MaLoaiTaiLieu` varchar(10) NOT NULL,
  `TenLoaiTaiLieu` varchar(100) NOT NULL,
  PRIMARY KEY (`MaLoaiTaiLieu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theloaitailieu`
--

INSERT INTO `theloaitailieu` (`MaLoaiTaiLieu`, `TenLoaiTaiLieu`) VALUES
('LTL001', 'Thơ'),
('LTL002', 'Văn xuôi trung đại'),
('LTL003', 'Văn xuôi hiện đại'),
('LTL004', 'Tiểu thuyết'),
('LTL005', 'Truyện ngắn');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tailieu`
--
ALTER TABLE `tailieu`
  ADD CONSTRAINT `FK_TACGIA` FOREIGN KEY (`MaTacGia`) REFERENCES `tacgia` (`MaTacGia`),
  ADD CONSTRAINT `FK_THELOAI` FOREIGN KEY (`MaLoaiTaiLieu`) REFERENCES `theloaitailieu` (`MaLoaiTaiLieu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
