-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2023 lúc 07:31 PM
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
-- Cơ sở dữ liệu: `dataduan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(4) NOT NULL,
  `idus` int(4) NOT NULL,
  `idpro` int(4) NOT NULL,
  `nguoinhan_ten` varchar(100) NOT NULL,
  `nguoinhan_diachi` varchar(100) NOT NULL,
  `nguoinhan_dienthoai` int(11) NOT NULL,
  `nguoidat_ten` varchar(100) NOT NULL,
  `nguoidat_diachi` varchar(100) NOT NULL,
  `nguoidat_email` varchar(100) NOT NULL,
  `nguoidat_dienthoai` int(11) NOT NULL,
  `total` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(4) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `noidung` varchar(100) NOT NULL,
  `ngaybinhluan` date NOT NULL,
  `idpro` int(4) NOT NULL,
  `idus` int(4) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(4) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `hinh` varchar(100) NOT NULL,
  `gia` int(10) NOT NULL,
  `soluong` int(5) NOT NULL,
  `idpro` int(4) NOT NULL,
  `idbill` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `id` int(4) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `hinh` varchar(100) NOT NULL,
  `gia` int(11) NOT NULL,
  `idpro` int(4) NOT NULL,
  `mau` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(4) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `ma` int(11) NOT NULL,
  `home` tinyint(4) NOT NULL DEFAULT 0,
  `stt` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `ten`, `ma`, `home`, `stt`) VALUES
(1, 'Áo thun', 0, 1, 1),
(2, 'Quần', 0, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(4) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `hinh` varchar(100) NOT NULL,
  `gia` int(10) NOT NULL,
  `iddm` int(4) NOT NULL,
  `mota` varchar(1000) NOT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT 0,
  `bestseller` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `ten`, `hinh`, `gia`, `iddm`, `mota`, `trangthai`, `bestseller`) VALUES
(8, '123', 'ao1.jpg', 16000, 1, 'sdadfgfgsd', 0, 1),
(9, '12334', 'quan1.jpg', 48, 2, 'ÁO THUN NAM - RISE - RETRO DENIM - FREEDOM\r\n            Sản phẩm được lấy cảm hứng từ những năm thập niên 90 và được biến tấu lại theo phong cách trẻ trung và hiện\r\n            đại của giới trẻ hiện nay. Đây chính là một sự kết hợp hoàn hảo của hơi thở cổ điển với xu thế hiện đại tạo\r\n            nên một sản phẩm trendy.\r\n\r\n            - Chất liệu 100% cotton nhập khẩu cao cấp \r\n\r\n            - Form Oversize thời thượng cùng kiểu chữ in trend nổi bật \r\n\r\n            - Điểm nhấn của chiếc áo chính là hiệu ứng in dập nổi vô cùng đặc biệt \r\n\r\n            - Đường may tỉ mỉ, chi tiết là yếu tố quan trọng để đảm bảo sản phẩm được ra mắt với phiên bản hoàn hảo và\r\n            chất lượng nhất. \r\n            Thông số sản phẩm: \r\n            - Chất liệu: Cotton \r\n\r\n            - Size: \r\n\r\n            + L: 1m61 - 1m70 - 56kg - 65kg\r\n \r\n            + XL: 1m71 - 1m75, 66kg - 75kg\r\n \r\n            + 2XL: trên 1m75, 76kg - 85kg \r\n\r\n            - Màu sắc: Trắng - Đen - Kem \r\n\r\n            - Thương h', 0, 1),
(10, 'quan2', 'quan2.jpg', 89, 2, '', 0, 1),
(11, 'quan3', 'quan3.jpg', 17000, 2, '', 0, 1),
(12, 'test', 'ao1.jpg', 134, 2, '', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_us` int(4) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `vaitro` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_us`, `ten`, `username`, `password`, `phone`, `email`, `vaitro`) VALUES
(1, 'Đăng', 'haidang', '123', 123123123, 'haidangratdeptrai@gmail.com', 1),
(2, 'Thuý Vi', 'thuyvi123', '456', 1231234, 'thuyvi0805@gmail.com', 0),
(3, 'Đạt', 'kimdat7000', '12313', 1234567890, 'dasdadas@gmail.com', 0),
(4, 'Thẩm', 'chitham04', '123123', 1231234, 'chitham@gmail.com', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_sp` (`idpro`),
  ADD KEY `fk_bill_us` (`idus`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bl_sp` (`idpro`),
  ADD KEY `fk_bl_us` (`idus`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_sp` (`idpro`),
  ADD KEY `fk_cart_bill` (`idbill`);

--
-- Chỉ mục cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ct_sp` (`idpro`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sp_dm` (`iddm`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_us`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_us` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_bill_sp` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `fk_bill_us` FOREIGN KEY (`idus`) REFERENCES `user` (`id_us`);

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `fk_bl_sp` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `fk_bl_us` FOREIGN KEY (`idus`) REFERENCES `user` (`id_us`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_bill` FOREIGN KEY (`idbill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `fk_cart_sp` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD CONSTRAINT `fk_ct_sp` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sp_dm` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
