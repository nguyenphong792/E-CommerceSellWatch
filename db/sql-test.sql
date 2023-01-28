-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.20-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for tmdt_website
CREATE DATABASE IF NOT EXISTS `tmdt_website` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `tmdt_website`;

-- Dumping structure for table tmdt_website.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhadmin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenadmin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='trang cua admin';

-- Dumping data for table tmdt_website.admin: ~2 rows (approximately)
INSERT INTO `admin` (`username`, `password`, `hinhadmin`, `tenadmin`) VALUES
	('admin', '123123', 'anhmau.jpg', 'admin'),
	('admin2', '123123', 'anhmau.jpg', 'admin');

-- Dumping structure for table tmdt_website.binhluan
CREATE TABLE IF NOT EXISTS `binhluan` (
  `mabl` int(11) NOT NULL AUTO_INCREMENT,
  `masp` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `noidung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoigianbl` datetime NOT NULL,
  PRIMARY KEY (`mabl`),
  KEY `FK_binhluan_sanpham` (`masp`),
  KEY `FK_binhluan_khachhang` (`makh`),
  CONSTRAINT `FK_binhluan_khachhang` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_binhluan_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tmdt_website.binhluan: ~0 rows (approximately)
INSERT INTO `binhluan` (`mabl`, `masp`, `makh`, `noidung`, `thoigianbl`) VALUES
	(1, 2, 1, 'nhuat nguyen', '2022-08-24 18:07:59');

-- Dumping structure for table tmdt_website.chitietdathang
CREATE TABLE IF NOT EXISTS `chitietdathang` (
  `masp` int(11) DEFAULT NULL,
  `giaban` decimal(20,6) DEFAULT NULL,
  `soluongddh` int(11) DEFAULT NULL,
  `mactdh` int(11) NOT NULL AUTO_INCREMENT,
  `maddh` int(11) DEFAULT NULL,
  `tongthanhtien` decimal(20,6) NOT NULL DEFAULT 0.000000,
  `magh` int(11) DEFAULT NULL,
  PRIMARY KEY (`mactdh`),
  KEY `FK_chitietdathang_sanpham` (`masp`),
  KEY `FK_chitietdathang_dondathang` (`maddh`),
  KEY `FK_chitietdathang_giohang` (`magh`),
  CONSTRAINT `FK_chitietdathang_dondathang` FOREIGN KEY (`maddh`) REFERENCES `dondathang` (`maddh`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_chitietdathang_giohang` FOREIGN KEY (`magh`) REFERENCES `giohang` (`magh`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_chitietdathang_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tmdt_website.chitietdathang: ~3 rows (approximately)
INSERT INTO `chitietdathang` (`masp`, `giaban`, `soluongddh`, `mactdh`, `maddh`, `tongthanhtien`, `magh`) VALUES
	(NULL, 170000.000000, 1, 1, NULL, 170000.000000, NULL),
	(NULL, 1000000.000000, 1, 2, NULL, 1000000.000000, NULL),
	(NULL, 1000000.000000, 2, 3, NULL, 2000000.000000, NULL);

-- Dumping structure for table tmdt_website.dondathang
CREATE TABLE IF NOT EXISTS `dondathang` (
  `maddh` int(11) NOT NULL AUTO_INCREMENT,
  `makh` int(11) DEFAULT NULL,
  `manv` int(11) DEFAULT NULL,
  `ngaydathang` date DEFAULT NULL,
  `ngaygiaohang` date DEFAULT NULL,
  `ngaychuyenhang` date DEFAULT NULL,
  `noigiaohang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`maddh`),
  KEY `FK_dondathang_khachhang` (`makh`),
  KEY `FK_dondathang_nhanvien` (`manv`),
  CONSTRAINT `FK_dondathang_khachhang` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_dondathang_nhanvien` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manv`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tmdt_website.dondathang: ~0 rows (approximately)

-- Dumping structure for table tmdt_website.giohang
CREATE TABLE IF NOT EXISTS `giohang` (
  `magh` int(11) NOT NULL AUTO_INCREMENT,
  `masp` int(11) DEFAULT NULL,
  `makh` int(11) DEFAULT NULL,
  `maddh` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenhang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giasanpham` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinhsanpham` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`magh`),
  KEY `FK_giohang_sanpham` (`masp`),
  KEY `FK_giohang_khachhang` (`makh`),
  KEY `FK_giohang_dondathang` (`maddh`),
  CONSTRAINT `FK_giohang_dondathang` FOREIGN KEY (`maddh`) REFERENCES `dondathang` (`maddh`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_giohang_khachhang` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_giohang_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tmdt_website.giohang: ~0 rows (approximately)

-- Dumping structure for table tmdt_website.hinhsanpham
CREATE TABLE IF NOT EXISTS `hinhsanpham` (
  `maha` int(11) NOT NULL AUTO_INCREMENT,
  `tenha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masp` int(11) NOT NULL,
  PRIMARY KEY (`maha`),
  KEY `FK__sanpham` (`masp`),
  CONSTRAINT `FK__sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tmdt_website.hinhsanpham: ~5 rows (approximately)
INSERT INTO `hinhsanpham` (`maha`, `tenha`, `masp`) VALUES
	(6, 'LaptopAcerTravelMateB3TMB31131C2HB.jpg', 1),
	(7, 'LaptopAcerTravelMateB3TMB31131C2HB2.jpg', 1),
	(8, 'LaptopAcerTravelMateB3TMB31131C2HB3.jpg', 1),
	(9, 'LaptopAcerTravelMateB3TMB31131C2HB4.jpg\r\n', 1),
	(10, 'LaptopAcerTravelMateB3TMB31131C2HB5.jpg', 1);

-- Dumping structure for table tmdt_website.khachhang
CREATE TABLE IF NOT EXISTS `khachhang` (
  `makh` int(11) NOT NULL AUTO_INCREMENT,
  `tenkh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dienthoai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `gioitinh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanhkh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`makh`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tmdt_website.khachhang: ~2 rows (approximately)
INSERT INTO `khachhang` (`makh`, `tenkh`, `diachi`, `email`, `dienthoai`, `gioitinh`, `password`, `hinhanhkh`) VALUES
	(1, 'Nguyễn Minh Nhuật', 'Bạc Liêu', 'nhuat@gmail.com', '0963493525', 'nam', '1', 'nhuat.jpg'),
	(4, 'Hà Thu Thủy', 'Cần Thơ', 'thuthuy1212@gmail.com', '21212154', 'nam', '33333', NULL),
	(9, 'nguyenauduong', 'Hậu Giang', 'nguyenauduong114@gmail.com', '0932810785', NULL, '4297f44b13955235245b2497399d7a93', '20220907042014_anh3.jpg');

-- Dumping structure for table tmdt_website.loaisanpham
CREATE TABLE IF NOT EXISTS `loaisanpham` (
  `malh` int(11) NOT NULL AUTO_INCREMENT,
  `tenloai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`malh`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tmdt_website.loaisanpham: ~4 rows (approximately)
INSERT INTO `loaisanpham` (`malh`, `tenloai`) VALUES
	(11, 'Đính kim cương'),
	(12, 'Mạ vàng'),
	(13, 'Da cá sấu, da bò'),
	(14, 'Đồng hồ Thụy Sỹ'),
	(15, 'Phiên bản giới hạn');

-- Dumping structure for table tmdt_website.nhacungcap
CREATE TABLE IF NOT EXISTS `nhacungcap` (
  `mancc` int(11) NOT NULL AUTO_INCREMENT,
  `tenncc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `diachincc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dienthoaincc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emailncc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`mancc`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='table nha cung cap';

-- Dumping data for table tmdt_website.nhacungcap: ~0 rows (approximately)

-- Dumping structure for table tmdt_website.nhanvien
CREATE TABLE IF NOT EXISTS `nhanvien` (
  `manv` int(11) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaysinhnv` date DEFAULT NULL,
  `diachinv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luongnv` decimal(20,6) DEFAULT NULL,
  PRIMARY KEY (`manv`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tmdt_website.nhanvien: ~4 rows (approximately)
INSERT INTO `nhanvien` (`manv`, `hoten`, `ngaysinhnv`, `diachinv`, `luongnv`) VALUES
	(1, 'Lưu Khánh Dường', '2000-12-24', 'Sóc Trăng', 0.000000),
	(2, 'Tạ Hen Nỳ', '2000-08-19', 'Cà Mau', 0.000000),
	(3, 'Lê Anh Duy', '2000-10-09', 'Cần Thơ', 0.000000);

-- Dumping structure for table tmdt_website.phananh
CREATE TABLE IF NOT EXISTS `phananh` (
  `tenpa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `motapa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `masp` int(11) NOT NULL,
  `maddh` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `mapa` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`mapa`),
  KEY `FK_phananh_dondathang` (`maddh`),
  KEY `FK_phananh_khachhang` (`makh`),
  KEY `FK_phananh_sanpham` (`masp`),
  CONSTRAINT `FK_phananh_dondathang` FOREIGN KEY (`maddh`) REFERENCES `dondathang` (`maddh`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_phananh_khachhang` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_phananh_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tmdt_website.phananh: ~0 rows (approximately)

-- Dumping structure for table tmdt_website.sanpham
CREATE TABLE IF NOT EXISTS `sanpham` (
  `masp` int(11) NOT NULL AUTO_INCREMENT,
  `tenhang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `math` int(11) NOT NULL DEFAULT 0,
  `giamoi` decimal(20,6) NOT NULL DEFAULT 0.000000,
  `hinhsp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL DEFAULT 0,
  `donvitinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giacu` decimal(20,6) NOT NULL DEFAULT 0.000000,
  `tukhoa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `malh` int(11) NOT NULL DEFAULT 0,
  `object1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object8` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object9` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object10` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object11` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`masp`),
  KEY `FK_sanpham_loaisanpham` (`malh`),
  KEY `FK_sanpham_thuonghieu` (`math`),
  CONSTRAINT `FK_sanpham_loaisanpham` FOREIGN KEY (`malh`) REFERENCES `loaisanpham` (`malh`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_sanpham_thuonghieu` FOREIGN KEY (`math`) REFERENCES `thuonghieu` (`math`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='table san pham';

-- Dumping data for table tmdt_website.sanpham: ~10 rows (approximately)
INSERT INTO `sanpham` (`masp`, `tenhang`, `math`, `giamoi`, `hinhsp`, `soluong`, `donvitinh`, `giacu`, `tukhoa`, `mota`, `malh`, `object1`, `object2`, `object3`, `object4`, `object5`, `object6`, `object7`, `object8`, `object9`, `object10`, `object11`) VALUES
	(12, 'Đồng hồ CERTINA Aqua 33.8 mm Nữ C032.051.22.086.00', 9, 13200000.000000, '20220907093601_certina-c032-051-22-126-00-nam1-org.jpg', 54, 'Vnđ', 15320000.000000, NULL, '- Ngoại hình thanh lịch, thời thượng đến từ thương hiệu có tuổi đời hơn một thế kỷ - thương hiệu đồng hồ Certina của Thụy Sĩ\r\n\r\n- Mặt đồng hồ nữ có số đo đường kính là 33.8 mm và độ dày mặt 9 mm\r\n\r\n- Dây đeo bằng thép không gỉ cho độ bền cao, chống chịu được dưới điều kiện thời tiết khắc nghiệt. Khung viền thép không gỉ 316L chắc chắn, bảo vệ tốt các chi tiết bên trong. Lớp mạ PVD màu vàng hồng sáng bóng, đẹp mắt, cho vẻ ngoài sang trọng, tăng khả năng chống ăn mòn của đồng hồ\r\n\r\n- Đặc biệt, chiếc đồng hồ này được trang bị hệ số chống nước lên đến 20 ATM chẳng ngại đeo đồng hồ theo khi đi lặn, đi bơi, đi tắm, đi mưa và rửa tay\r\n\r\n- Vị trí 12 giờ được thay thế bằng 3 viên kim cương cực kỳ nổi bật và ô lịch ngày được bố trí ở số 3 để người dễ dàng theo dõi thời gian biểu của mình', 11, 'Nữ', '33.8 mm', 'Kính Sapphire', ' Thép không gỉ', ' Pin (Quartz)', ' 20 ATM - Bơi, lặn', ' Thép không gỉ', ' CERTINA', NULL, NULL, NULL),
	(14, 'Đồng hồ FREDERIQUE CONSTANT Manufacture 42 mm Nam FC-760MC4H6', 9, 81260000.000000, '20220907093245_frederique-constant-fc-760mc4h6-nam-1-org.jpg', 16, 'Vnđ', 96500000.000000, NULL, '- Sở hữu màu đen cổ điển với mặt số la mã đơn giản, xen lẫn phong cách nam tính, lịch lãm đến từ hãng đồng hồ Frederique Constant - Thụy Sĩ\r\n\r\n- Bộ máy cơ tự động vận hành mượt mà với thời gian trữ dây cót khoảng 38 tiếng, hỗ trợ người đeo không cần thay pin trong quá trình sử dụng\r\n\r\n- Mặt kính của đồng hồ cơ này có chất liệu từ Sapphire đem đến độ cứng cao với đường kính là 42 mm và độ dày mặt là 13.8 mm \r\n\r\n- Dây đeo được làm từ da cá sấu cao cấp, mềm mại, êm ái, ôm trọn cổ tay. Bộ máy sẽ được bảo vệ tốt trong mọi điều kiện với khung viền có chất liệu thép không gỉ 316L cho khả năng chịu lực và chống ăn mòn hiệu quả\r\n\r\n- Hệ số chống nước của đồng hồ nam này là 5 ATM nên hoàn toàn an tâm đeo khi tắm, đi mưa và rửa tay. Không nên mang trên tay khi bơi và lặn\r\n\r\n- Frederique Constant còn cung cấp cho chiếc đồng hồ này tiện ích lịch ngày và bấm giờ thể thao giúp quản lý thời gian một cách tốt nhất\r\n\r\n ', 13, 'Nam', '42 mm', ' Kính Sapphire', 'Da cá sấu', 'Cơ tự động (Automatic)', '5 ATM - Đi mưa, tắm', 'Da cá sấu', 'FREDERIQUE CONSTANT.', NULL, NULL, NULL),
	(15, 'Đồng hồ ADRIATICA 40 mm Nam A8242.9223Q ', 9, 3850000.000000, '20220907093308_adriatica-a82429223q-nam-2.jpg', 60, 'Vnđ', 5120000.000000, NULL, '- Đến từ thương hiệu đồng hồ Adriatica uy tín và chất lượng của Thụy Sĩ, được nhiều người tin dùng\r\n\r\n- Đồng hồ có đường kính mặt 40 mm, độ rộng dây 22 mm\r\n\r\n- Dây đeo làm từ da bò êm nhẹ, ôm sát cổ tay, cho cảm giác dễ chịu khi mang, khung viền thép không gỉ 316L mạ PVD sang trọng, cứng cáp, chống oxy hóa hiệu quả\r\n\r\n- Chỉ số chống nước 5 ATM: Đeo được khi tắm, đi mưa mà không lo hư hỏng do vào nước, không mang khi bơi, lặn\r\n\r\n- Chiếc đồng hồ nam này có lịch ngày tiện dụng giúp bạn làm chủ hơn trong công việc', 13, 'Nam', '40 mm', 'Kính khoáng Mineral', 'Da bò', 'Pin (Quartz)', '5 ATM - Đi mưa, tắm', 'Da bò', 'ADRIATICA', NULL, NULL, NULL),
	(16, 'Đồng hồ ADRIATICA 42 mm Nam A8194.5114Q ', 9, 3442000.000000, '20220907093332_adriatica-a81945114q-nam-1.jpg', 30, 'Vnđ', 4440000.000000, NULL, '- Là sản phẩm đến từ thương hiệu đồng hồ Adriatica nổi tiếng và lâu đời của Thụy Sĩ\r\n\r\n- Chiếc đồng hồ nam này có đường kính mặt 42 mm, độ rộng dây 23 mm\r\n\r\n- Dây đeo thép không gỉ cùng khung viền thép không gỉ 316L có độ bền cao, chống ăn mòn, chống oxy hóa tốt, cho cảm giác mát tay khi mang\r\n\r\n- Chỉ số chống nước 5 ATM: An toàn khi đeo đồng hồ khi tắm, đi mưa, không mang khi bơi, lặn\r\n\r\n- Đồng hồ được trang bị lịch thứ, lịch ngày giúp bạn làm chủ thời gian của mình', 14, 'Nam', '42 mm', 'Kính khoáng Mineral', 'Thép không gỉ', 'Pin (Quartz)', '5 ATM - Đi mưa, tắm', 'Thép không gỉ', 'ADRIATICA', NULL, NULL, NULL),
	(17, 'Đồng hồ ADRIATICA 41 mm Nam A1294.1263Q ', 9, 3850000.000000, '20220907093353_adriatica-a12941263q-nam-2.jpg', 22, 'Vnđ', 5230000.000000, NULL, '- Mang thương hiệu đồng hồ Adriatica uy tín và chất lượng của Thụy Sĩ, nổi tiếng trên thế giới\r\n\r\n- Chiếc đồng hồ nhà Adriatica này có đường kính mặt 41 mm, độ rộng dây 20 mm\r\n\r\n- Dây đeo làm từ da bò êm nhẹ, mềm mại, ôm tay rất tốt, khung viền thép không gỉ 316L mạ PVD cứng cáp, bền bỉ, dễ dàng lau chùi, vệ sinh khi bị bám bụi bẩn\r\n\r\n- Chống nước 3 ATM: An toàn khi đeo mẫu đồng hồ nam này khi đi mưa, rửa tay, không mang khi tắm, bơi, lặn\r\n\r\n- Được trang bị lịch ngày tiện dụng giúp bạn dễ dàng quan sát ngày giờ ngay trên chiếc đồng hồ của mình', 14, 'Nam', '41 mm', 'Kính khoáng Mineral', 'Da bò', 'Pin (Quartz)', ' 3 ATM - Rửa tay, đi mưa', 'Da bò', 'ADRIATICA', NULL, NULL, NULL),
	(18, 'Đồng hồ CERTINA Aqua 43 mm Nam C032.407.11.051.10 ', 9, 27005000.000000, '20220907093411_certina-c032-407-11-051-10-nam-1-org.jpg', 2, 'Vnđ', 33000000.000000, NULL, '- Đến từ thương hiệu đồng hồ Certina uy tín và nổi tiếng của Thụy Sĩ\r\n\r\n- Đồng hồ Automatic (máy cơ tự động) có tuổi thọ cao, hoạt động nhờ sự chuyển động của cổ tay, không lo hết pin\r\n\r\n- Mẫu đồng hồ nhà Certina này sở hữu đường kính mặt 43 mm\r\n\r\n- Dây đeo cùng khung viền thép không gỉ 316L bền chắc, chống ăn mòn, chịu được mọi thời tiết khắc nghiệt\r\n\r\n- Hệ số chống nước 30 ATM: Yên tâm đeo chiếc đồng hồ nam này khi bơi, lặn mà không lo vào nước\r\n\r\nLưu ý: Không vặn núm điều khiển khi bơi, lặn\r\n\r\n- Ô lịch ngày ở vị trí 3 giờ cho bạn xem ngày giờ ngay trên chiếc đồng hồ của mình, kim dạ quang giúp xem giờ trong bóng tối', 15, 'Nam', '43 mm', 'Kính Sapphire', 'Thép không gỉ 316L', 'Cơ tự động (Automatic)', '30 ATM - Bơi, lặn', 'Thép không gỉ 316L', ' CERTINA', NULL, NULL, NULL),
	(19, 'Đồng hồ TITONI 27 mm Nữ 23909 SY-064', 9, 26877000.000000, '20220907093544_candino-c4697-2-nu-1-org.jpg', 20, 'Vnđ', 29430000.000000, NULL, '- Là một trong những thương hiệu nổi tiếng từ Thụy Sĩ, đồng hồ Titoni có thiết kế thời trang và hiện đại\r\n\r\n- Đồng hồ cơ (máy Automatic) có bộ máy ETA 2671 cho độ sai số thấp, hoạt động bền bỉ theo thời gian\r\n\r\n- Mặt đồng hồ có đường kính 27 mm cùng độ rộng dây 14 mm, phù hợp cho những chị em có cổ tay nhỏ xinh\r\n\r\n- Phần dây kim loại cho cảm giác mát tay đeo, dễ dàng lau chùi khi bám bẩn. Khung viền thép không gỉ gia tăng sự bền chắc, chống ăn mòn nên sẽ giúp chiếc đồng hồ bền bỉ hơn\r\n\r\n- Với chỉ số chống nước 5 ATM, giúp người dùng an tâm mang khi tắm hoặc đi mưa, tuy nhiên không nên mang đi bơi và lặn\r\n\r\n- Đồng hồ nữ được trang bị tiện ích lịch ngày tiện lợi, hỗ trợ người dùng nắm bắt thời gian nhanh chóng', 12, 'Nữ', '27 mm', 'Kính Sapphire', 'Kim loại', 'Cơ tự động (Automatic)', '5 ATM - Đi mưa, tắm', 'Kim loại', 'TITONI', NULL, NULL, NULL),
	(20, 'Đồng hồ CANDINO 30 mm Nữ C4697/2', 9, 6320900.000000, '20220907093524_dong-ho-titoni-27-mm-nu-23909-sy-064-1.jpg', 34, 'Vnđ', 9400000.000000, NULL, '- Thương hiệu đồng hồ Candino đẳng cấp đến từ Thụy Sĩ, uy tín và chất lượng hàng đầu thế giới\r\n\r\n- Chiếc đồng hồ nữ này có đường kính mặt 30 mm\r\n\r\n- Dây thép không gỉ cùng khung viền thép không gỉ 316L sở hữu độ bền cao, kháng ăn mòn đồng thời mang lại vẻ ngoài sang trọng\r\n\r\n- Đồng hồ có độ chống nước 5 ATM cho phép bạn đeo khi tắm, đi mưa, rửa tay, không mang khi bơi lội, lặn ', 12, 'Nữ', '30 mm', 'Kính Sapphire', ' Thép không gỉ', 'Pin (Quartz)', '5 ATM - Đi mưa, tắm', ' Thép không gỉ', 'CANDINO', '', '', ''),
	(21, 'Đồng hồ CERTINA Urban 41 mm Nam C029.426.11.091.60', 9, 22140000.000000, '20220907093437_certina-c029-426-11-091-60-nam-1-org.jpg', 1, 'Vnđ', 2600000.000000, NULL, '- Thương hiệu đồng hồ Certina uy tín và lâu đời của Thụy Sĩ, được nhiều người tin dùng\r\n\r\n- Đồng hồ Automatic (máy cơ tự động) có tuổi thọ cao, hoạt động nhờ sự chuyển động của cổ tay, không lo hết pin\r\n\r\n- Mẫu đồng hồ nhà Certina này sở hữu đường kính mặt 41 mm\r\n\r\n- Dây đồng hồ và khung viền được làm từ thép không gỉ có độ bền cao, chống ăn mòn, bảo vệ an toàn phần lõi bên trong\r\n\r\n- Chỉ số chống nước 10 ATM: Thoải mái đeo đồng hồ khi bơi, tắm mà không lo hư hỏng do vào nước, không mang khi lặn\r\n\r\nLưu ý: Không bấm các nút điều khiển khi bơi\r\n\r\n- Mẫu đồng hồ nam này có ô lịch ngày ở vị trí 6 giờ giúp bạn dễ dàng quan sát ngày giờ hơn', 15, 'Nam', '41 mm', 'Kính Sapphire', ' Thép không gỉ', 'Cơ tự động (Automatic)', ' 10 ATM - Tắm, bơi', ' Thép không gỉ', ' CERTINA', NULL, NULL, NULL),
	(22, 'ERNEST BOREL Heritage 40 mm Nam N0565G0A-MN2N ', 9, 22230000.000000, '20220907093912_ernest-borel-n0565g0a-mn2n-nam-1-org.jpg', 35, 'Vnđ', 25320000.000000, NULL, '- Sản phẩm mang lại sự hấp dẫn cho người đeo ngay từ cái nhìn đầu tiên với thiết kế bắt mắt, tinh tế đến từ hãng đồng hồ Ernest Borel, thương hiệu uy tín lâu đời của Thụy Sĩ\r\n\r\n- Bộ máy cơ tự động vận hành nhờ chuyển động cổ tay của người đeo với thời gian trữ dây cót của đồng hồ cơ là khoảng 38 tiếng\r\n\r\n- Đồng hồ sở hữu mặt tròn với đường kính là 40 mm, chất liệu mặt từ kính Sapphire chống trầy tốt, hạn chế nứt vỡ khi chịu tác động từ bên ngoài\r\n\r\n- Thép không gỉ 316L bền chắc, chống ăn mòn, sang trọng là chất liệu của khung viền và dây đeo thép không gỉ cứng cáp, chịu lực tốt, chắc tay. Khung viền còn được mạ vàng sang trọng, cao cấp chắc chắn sẽ làm hài lòng mọi quý ông\r\n\r\n- Hoàn toàn yên tâm mang sản phẩm trên cổ tay khi đi dưới mưa và rửa tay cùng hệ số chống nước là 3 ATM. Tuy nhiên không nên đeo khi tắm, bơi lội và lặn \r\n\r\n- 7 viên kim cương được đính trên các vị trí số chỉ giờ đóng vai trò quan trọng nâng cao tính thẩm mỹ và sự đẳng cấp cho chiếc đồng hồ nam này\r\n\r\n- Tiện ích lịch ngày được trang bị giúp người đeo quản lý thời gian tốt hơn \r\n\r\n', 12, ' Nam', '40 mm', 'Kính Sapphire', 'Thép không gỉ 316L', 'Cơ tự động (Automatic)', '3 ATM - Rửa tay, đi mưa', 'Thuỵ Sĩ', 'ERNEST BOREL.', NULL, NULL, NULL);

-- Dumping structure for table tmdt_website.thamso
CREATE TABLE IF NOT EXISTS `thamso` (
  `mats` int(11) NOT NULL AUTO_INCREMENT,
  `tents` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`mats`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tmdt_website.thamso: ~2 rows (approximately)
INSERT INTO `thamso` (`mats`, `tents`) VALUES
	(1, 'yeuthich'),
	(2, 'giohang');

-- Dumping structure for table tmdt_website.thuonghieu
CREATE TABLE IF NOT EXISTS `thuonghieu` (
  `math` int(11) NOT NULL AUTO_INCREMENT,
  `tenth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `diachith` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dienthoaith` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emailth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `malh` int(11) DEFAULT NULL,
  PRIMARY KEY (`math`) USING BTREE,
  KEY `FK_thuonghieu_loaisanpham` (`malh`),
  CONSTRAINT `FK_thuonghieu_loaisanpham` FOREIGN KEY (`malh`) REFERENCES `loaisanpham` (`malh`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tmdt_website.thuonghieu: ~2 rows (approximately)
INSERT INTO `thuonghieu` (`math`, `tenth`, `diachith`, `dienthoaith`, `emailth`, `malh`) VALUES
	(9, 'Thuỵ Sĩ', 'Thuỵ Sĩ', '0932810785', 'thuysy@gmail.com', 11),
	(10, 'Việt Nam', 'Việt Nam', '0932810786', 'vietnam@gmail.com', 12);

-- Dumping structure for table tmdt_website.yeuthich
CREATE TABLE IF NOT EXISTS `yeuthich` (
  `mayt` int(11) NOT NULL AUTO_INCREMENT,
  `makh` int(11) DEFAULT NULL,
  `masp` int(11) DEFAULT NULL,
  PRIMARY KEY (`mayt`),
  KEY `FK__khachhang` (`makh`),
  KEY `FK_yeuthich_sanpham` (`masp`),
  CONSTRAINT `FK__khachhang` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_yeuthich_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tmdt_website.yeuthich: ~1 rows (approximately)
INSERT INTO `yeuthich` (`mayt`, `makh`, `masp`) VALUES
	(31, 1, 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
