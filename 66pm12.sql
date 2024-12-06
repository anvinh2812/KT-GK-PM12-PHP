-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2023 lúc 06:51 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `66pm12`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `0209266_categories_31`
--

CREATE TABLE `0209266_categories_31` (
  `cid` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `cdesc` text NOT NULL,
  `cimage` varchar(255) NOT NULL,
  `corder` int(11) NOT NULL,
  `cstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `0209266_categories_31`
--

INSERT INTO `0209266_categories_31` (`cid`, `cname`, `cdesc`, `cimage`, `corder`, `cstatus`) VALUES
(1, 'Samsung', 'Hãng ?i?n tho?i hot nh?t Hàn Qu?c', 'samsung.png', 1, 1),
(2, 'Apple', 'Hãng ?i?n tho?i n?i ti?ng toàn c?u', 'apple.png\r\n', 2, 1),
(3, 'Nokia', 'Hãng ?i?n tho?i hot nh?t Hàn Qu?c', 'nokia.png\r\n', 1, 1),
(4, 'Sony', 'Hãng ?i?n tho?i n?i ti?ng toàn c?u', 'sony.png', 2, 0),
(10, 'Xiao Mi', 'TQ', 'xiaomi.png\r\n', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `0209266_product_31`
--

CREATE TABLE `0209266_product_31` (
  `pid` int(11) NOT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `pdesc` varchar(255) DEFAULT NULL,
  `pimage` varchar(255) DEFAULT NULL,
  `porder` int(11) DEFAULT NULL,
  `pinsertdate` date DEFAULT NULL,
  `pupdatedate` date DEFAULT NULL,
  `pprice` decimal(10,2) DEFAULT NULL,
  `pquantity` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `pstatus` int(50) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `sizeid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `0209266_product_31`
--

INSERT INTO `0209266_product_31` (`pid`, `pname`, `pdesc`, `pimage`, `porder`, `pinsertdate`, `pupdatedate`, `pprice`, `pquantity`, `cid`, `pstatus`, `sid`, `sizeid`) VALUES
(1, 'samsung glx a12', 'dt vip', 'samsunga12.jpg', 1, '2023-10-10', '2023-10-13', 100.00, 10, 1, 1, 2, 1),
(2, 'iphone 15', 'dt moi', 'ip15.jpg', 2, '2023-10-14', '2023-10-14', 150.00, 15, 2, 1, 2, 2),
(3, 'nokia 1280', 'dt dap k vo', 'nokia1280.jpg', 3, '2023-10-14', '2023-10-14', 120.00, 20, 3, 0, 2, 3),
(5, 'xiao mi redmi note 9s', 'dt tq\r\n', 'redminote9s.jpg', 23, '2023-10-04', '2023-10-18', 231.00, 23, 11, 0, 3, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `0209266_size_31`
--

CREATE TABLE `0209266_size_31` (
  `sizeid` int(11) NOT NULL,
  `sizename` varchar(255) DEFAULT NULL,
  `sizestatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `0209266_size_31`
--

INSERT INTO `0209266_size_31` (`sizeid`, `sizename`, `sizestatus`) VALUES
(1, 'S', 1),
(2, 'M', 1),
(3, 'L', 1),
(4, 'XL', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `0209266_supplier_31`
--

CREATE TABLE `0209266_supplier_31` (
  `sid` int(11) NOT NULL,
  `sname` varchar(255) DEFAULT NULL,
  `saddress` varchar(255) DEFAULT NULL,
  `sphone` varchar(15) DEFAULT NULL,
  `stax` int(20) DEFAULT NULL,
  `sstatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `0209266_supplier_31`
--

INSERT INTO `0209266_supplier_31` (`sid`, `sname`, `saddress`, `sphone`, `stax`, `sstatus`) VALUES
(1, 'cell phone s', 'hn', '0987643', 1, 1),
(2, 'dai hoc xay dung', 'hn', '0244314', 1000, 1),
(3, 'an phat', 'hm', '0858342', 200, 1),
(6, 'Vinh', 'Ha Noi', '099765', 100, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `0209266_categories_31`
--
ALTER TABLE `0209266_categories_31`
  ADD PRIMARY KEY (`cid`);

--
-- Chỉ mục cho bảng `0209266_product_31`
--
ALTER TABLE `0209266_product_31`
  ADD PRIMARY KEY (`pid`);

--
-- Chỉ mục cho bảng `0209266_size_31`
--
ALTER TABLE `0209266_size_31`
  ADD PRIMARY KEY (`sizeid`);

--
-- Chỉ mục cho bảng `0209266_supplier_31`
--
ALTER TABLE `0209266_supplier_31`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `0209266_categories_31`
--
ALTER TABLE `0209266_categories_31`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `0209266_product_31`
--
ALTER TABLE `0209266_product_31`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `0209266_size_31`
--
ALTER TABLE `0209266_size_31`
  MODIFY `sizeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `0209266_supplier_31`
--
ALTER TABLE `0209266_supplier_31`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
