-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2023 lúc 02:46 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopbook`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangky`
--

CREATE TABLE `dangky` (
  `ID` int(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dangky`
--

INSERT INTO `dangky` (`ID`, `name`, `email`, `password`, `user_type`) VALUES
(11, 'phuoc', 'phuoc6a5@gmail.com', '123123', 'user'),
(13, 'Phước cute', 'kenakuma10@gmail.com', '123456789', 'admin'),
(14, 'Xoài', 'minecraft@gmail.com', '06102002', 'admin'),
(15, 'Bơ', 'vananh@gmail.com', '06102002', 'user'),
(16, 'Trường Phước', 'phuoc1003@gmail.com', '10032002', 'user'),
(19, 'Trôi', 'phuoc6a5@gmail.com', '123456789', 'user'),
(20, '', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `ID` int(9) NOT NULL,
  `user_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `stt` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phuongthuc` varchar(50) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `TongSP` longtext NOT NULL,
  `tongGia` int(20) NOT NULL,
  `vanchuyen` varchar(30) NOT NULL,
  `tinhTrangTT` varchar(20) NOT NULL DEFAULT 'Chưa giao hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`ID`, `user_id`, `name`, `stt`, `email`, `phuongthuc`, `diachi`, `TongSP`, `tongGia`, `vanchuyen`, `tinhTrangTT`) VALUES
(19, 0, 'Phuoc Truong', '0353168810', 'phuoc6a5@gmail.com', 'Thanh toán khi nhận hàng', 'Số nhà: 11-Phan Bá Vành, Thái Bình, Thái Bình, Việt Nam - 06121', ', Trôi (1) , Gửi Tới Người Mùa Đông Này Sẽ Không Còn Nữa (2) , Hướng Dẫn Thư Viện Dành Cho Người Ghét Đọc (1) , Một Cuốn Sách Chữa Lành (1) , Khi Ấy Là Một Đêm Đầy Sao (1) , Thần Chết Làm Thêm 300 Yên/Giờ (Tái Bản 2023) (1) ', 862000, '', 'Đã giao hàng'),
(20, 0, 'Nguyễn Thị Thuỳ Dương', '0123456789', 'minecraft@gmail.com', 'Chuyển khoản', 'Số nhà: 10-Trực Ninh, Nam Định, Nam Định, Việt Nam - 06236', ', Tháng 8 Cùng Em Và Những Ký Ức Vụn Vỡ  (1) , Tớ Sẽ Mãi Mãi Không Quên Cậu, Người Từng Sống Trong Khoảnh Khắc (1) ,  Tiến Về Phía Nhau (1) ', 405000, '', 'Chưa giao hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `ID` int(9) NOT NULL,
  `user_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gia` int(50) NOT NULL,
  `soluong` int(50) NOT NULL,
  `hinhanh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`ID`, `user_id`, `name`, `gia`, `soluong`, `hinhanh`) VALUES
(77, 0, ' Những Lời Chúng Tôi Nói Ở Bệnh Viện Bên Bờ Biển', 99000, 1, 'bên bờ biển.jpg'),
(78, 0, 'Tháng 8 Cùng Em Và Những Ký Ức Vụn Vỡ ', 125000, 3, 'tháng8.jpg'),
(79, 0, 'Thần Chết Làm Thêm 300 Yên/Giờ (Tái Bản 2023)', 120000, 1, 'than chet.jpg'),
(80, 0, ' Mình Sẽ Tìm Cậu Vào Đêm Trăng Rằm', 109000, 2, 'minh se tim cau.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanhoi`
--

CREATE TABLE `phanhoi` (
  `ID` int(9) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(12) NOT NULL,
  `loiNhan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phanhoi`
--

INSERT INTO `phanhoi` (`ID`, `user_id`, `name`, `email`, `number`, `loiNhan`) VALUES
(9, '', 'Phuoc Truong', 'minecraft@gmail.com', '0234567891', 'Are u OK?'),
(11, '', 'Phước', 'phuoc6a5@gmail.com', '01234567890', 'asdasda');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ID` int(50) NOT NULL,
  `name` longtext NOT NULL,
  `tacgia` varchar(50) NOT NULL,
  `gia` int(50) NOT NULL,
  `anh` varchar(50) NOT NULL,
  `thongtin` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID`, `name`, `tacgia`, `gia`, `anh`, `thongtin`) VALUES
(2, ' Những Lời Chúng Tôi Nói Ở Bệnh Viện Bên Bờ Biển', 'Hiroshi Ishikawa, Mai Yoneyama', 99000, 'bên bờ biển.jpg', 'Một năm trước đã xảy ra một \"cuộc chiến\". Căn bệnh kì lạ nọ đột nhiên phát tán ở một địa phương hẻo lánh và lan rộng. Hàng ngàn người đã thiệt mạng, phần đông trong số đó là người lớn. Nhưng có vẻ như một số thiếu niên sống sót lại phát triển những sức mạnh siêu việt từ căn bệnh. Và cùng với căn bệnh là sự xuất hiện của các thế lực kì quái to lớn...\r\n\r\nMột năm sau, Uehara Sou tới thăm một bệnh viện bên bờ biển. Đấy là bệnh viện chuyên điều trị cho những người mắc phải căn bệnh kì lạ kia. Cậu cũng đã từng nằm viện ở đây, các đồng đội cũ của cậu hầu như đã hi sinh, những người còn sống thì vẫn chưa thể khỏi bệnh và xuất viện. Sou bắt đầu nhớ lại và kể về những sự kiện xảy ra vào \"ngày hôm ấy\".\r\n\r\nKết cục và chân tướng của cuộc chiến ấy là...\r\n\r\n\r\n\r\n'),
(3, 'Thần Chết Làm Thêm 300 Yên/Giờ (Tái Bản 2023)', 'Fujimaru', 120000, 'than chet.jpg', '“Vậy thì tôi sẽ tuyển cậu làm Thần Chết”\r\n\r\nMột ngày nọ, học sinh cấp 3 Sakura Shinji được cô bạn cùng lớp Hanamori Yuki mời làm công việc “Thần Chết”, một công việc mà giúp những người chết chưa thể siêu thoát, vẫn còn vấn vương với cuộc sống trần gian trút bỏ hết những luyến tiếc và tiễn họ sang thế giới bên kia.\r\n\r\nSakura bán tín bán nghi trước câu chuyện hoang đường này. Tuy nhiên, khi biết rằng “nếu có thể tiếp tục công việc này trong vòng nửa năm sẽ được thực hiện bất kì mong muốn nào”, cho nên dù còn đang nghi ngờ nhưng Sakura vẫn chấp nhận làm công việc này.\r\n\r\nẨn chứa bên trong câu chuyện là sự cảm động về những vấn vương, mong ước rất đỗi xót xa của những người đã mất.\r\n\r\n------------------\r\n\r\nTrích dẫn:\r\n\r\n“Mỗi một thần chết sẽ được giao phụ trách ‘người chết’ phù hợp. Như vậy có nghĩa là, những thần chết có những nỗi niềm băn khoăn giống với ‘người chết’ sẽ được giao phụ trách ‘người chết’ đó.”\r\n\r\n'),
(4, ' Mình Sẽ Tìm Cậu Vào Đêm Trăng Rằm', 'Yozora Fuyuno', 109000, 'minh se tim cau.jpg', 'Từ ngày không còn cha mẹ ở bên, tôi đã trở nên vô cảm với thế giới này. Mỗi ngày tôi đều say mê vẽ tranh, nhưng các bức tranh của tôi chỉ là tranh đen trắng, hoàn toàn không có một chút sắc màu. Bỗng một ngày có một người con gái rất đẹp, mang theo bầu không khí kỳ lạ xuất hiện. Dáng vẻ cô ấy lặng yên mỉm cười trước bức tranh mà tôi vẽ khiến tôi dần dần bị thu hút. Tuy nhiên thế giới trong mắt cô ấy đã hoàn toàn mất đi mọi màu sắc, thêm nữa số phận của cô ấy còn được định sẵn là “Càng hạnh phúc, cái chết sẽ càng cận kề”.\r\n\r\n“Tớ không muốn mất cậu…” Để có thể khiến thế giới của cô ấy bừng sáng trở lại, tôi đã đưa ra một quyết định quan trọng…\r\n\r\nTrích dẫn trong sách:\r\n\r\n“Giữa một đời dài rộng nhưng rất đỗi bình thường và một đời ngắn ngủi nhưng ngập tràn hạnh phúc, cậu sẽ chọn cái nào?”\r\n\r\n'),
(5, ' Tiến Về Phía Nhau', 'Mạch Ngôn Xuyên', 174000, 'tien ve.png', 'Nếu có ai hỏi Chu Nghi Ninh định mệnh là gì?\r\n\r\nCô sẽ dõng dạc trở lời rằng, định mệnh chính là đêm tháng Năm ở thành phố Brighton ấy, Quý Đông Dương đã xuất hiện trong con ngõ tối tăm và soi sáng quãng đời còn lại cho Chu Nghi Ninh đang lạc lối.\r\n\r\nCó lẽ, thành ngữ \"ghét của nào trời trao của nấy\" là câu chữ khái quát ngắn gọn và chính xác nhất về chuyện tình này của Chu Nghi Ninh và Quý Đông Dương khi cả hai đều mang nét cá tính khác biệt, nhưng ẩn sau lớp mặt nạ lạnh lùng của anh hay tinh nghịch của cô, thì đều có chung một trái tim chịu nhiều tổn thương đến từ gia đình trong quá khứ.\r\n\r\nĐể rồi khi đã tiếp xúc nhiều hơn và hiểu thêm về nhau, cảm giác ghét bỏ lúc ban đầu đã chuyển thành yêu thích lúc nào không hay.\r\n\r\nThấu hiểu, biết thương, biết đau cho đối phương, vậy nên hai trái tim tổn thương ấy đã dũng cảm tiến về phía nhau, sưởi ấm cho nhau trong ngày tháng sau này.\r\n\r\nMột đời, chỉ cần một người tình nguyện đưa tay dìu dắt, cùng nhau bước ra khỏi bóng tối, vậy là đủ!\r\n\r\n'),
(6, 'Đường Hầm Tới Mùa Hạ - Lối Thoát Của Biệt Ly', 'Mei Hachimoku, Kukka', 109000, 'đường hầm.jpg', '“Cậu biết đường hầm Urashima chứ? Nghe bảo bước vào bên trong thì mọi mong ước sẽ biến thành hiện thực, nhưng phải đánh đổi bằng tuổi tác…”\r\n\r\nCậu học sinh cấp ba Tono Kaoru tình cờ nghe hóng được về truyền thuyết đô thị đó. Ngay đêm hôm ấy, cậu lại tình cờ tìm thấy một đường hầm có nét tương đồng…\r\n\r\nVào trong đường hầm, chưa biết chừng cậu sẽ đưa được đứa em gái đã mất năm năm trước quay về.\r\n\r\nSau giờ học, Kaoru tiến hành điều tra về đường hầm này, ai ngờ lại bị cô bạn Hanashiro Anzu – học sinh mới chuyển tới - phát hiện ra.\r\n\r\nHai cô cậu cộng tác với nhau để cùng đạt được mong ước của cả hai… Khởi đầu một mùa hè đầy những bất ngờ lý thú mà chưa ai từng biết tới.\r\n\r\nĐường hầm tới mùa hạ - Lối thoát của biệt ly, câu chuyện đầy ý nghĩa về tình cảm gia đình và tình yêu, là lời tạm biệt gửi tới những vui buồn trong quá khứ, tìm lại những điều đã đánh mất để có thể hướng tới tương lai.'),
(7, 'Tớ Sẽ Mãi Mãi Không Quên Cậu, Người Từng Sống Trong Khoảnh Khắc', 'Yozora Fuyuno', 106000, 'tớ se mai mai.jpg', '“Tớ bổ nhiệm cậu trở thành nhiếp ảnh gia độc quyền của tớ!” Câu nói của Kaori, cô nàng nổi tiếng của lớp đã chính thức đặt dấu chấm hết cho chuỗi ngày bình lặng của Teruhiko.\r\n\r\nTinh thần tự do, lạc quan của Kaori đã ảnh hưởng đến suy nghĩ và cuộc sống của Teruhiko rất nhiều. Nhưng rồi bỗng một ngày, cậu biết được một sự thật, rằng phía sau nụ cười rạng rỡ của Kaori là những ngày tháng phải mạnh mẽ chiến đấu với căn bệnh hiểm nghèo của cô ấy…\r\n\r\nHai tháng ngắn ngủi ở bên Kaori tuy tràn ngập khổ đau, nhưng cũng là hai tháng rực rỡ nhất trong cuộc đời cậu.\r\n\r\nTrích dẫn trong sách:\r\n\r\n“Mong muốn ích kỷ cuối cùng của tớ là cậu hãy cười thật nhiều, thật nhiều lên nhé, cười thay cho phần của tớ nữa. Bởi tớ yêu lắm những giây phút chúng ta cùng nhau vui cười.”\r\n'),
(8, 'Cho Đến Khi Telomere Tháng 7 Kết Thúc ', 'Natsuki Amasawa', 125000, 'tháng 7 kết thúc.jpg', 'Khi nhìn thấy kết thúc của hai người, tôi muốn đọc lại cuốn sách này một lần nữa...\r\n\r\nMột ngày nọ, Uchimura Shu - một học sinh trung học sống tách biệt của xã hội - bất chợt nhặt được chiếc USB đánh rơi của cô bạn cùng lớp Iyama Naoka. Một cuộc trò chuyện kỳ lạ nhanh chóng diễn ra sau khi Shu nhìn thấy nội dung bức di thư của Naoka. Cậu nhanh chóng hiểu rằng cô mắc phải chứng bệnh suy giảm trí nhớ và luôn muốn tìm cách tự sát.\r\n\r\n“Nếu cậu chết, tớ cũng sẽ chết cùng cậu. Thế nên, nếu không muốn điều đó xảy ra thì cậu nhớ phải tiếp tục sống.”\r\n\r\n“Uchimura à, cậu có nhận ra cậu vừa nói một điều rất ngốc nghếch không?”\r\n\r\nKhi bạn hiểu những cảm xúc thật đằng sau lời hứa ấy, bạn chắc chắn sẽ muốn quay trở lại những trang đầu tiên. Một câu chuyện buồn nhưng đẹp biết bao...\r\n'),
(9, 'Tháng 8 Cùng Em Và Những Ký Ức Vụn Vỡ ', 'Natsuki Amasawa', 125000, 'tháng8.jpg', 'Một cuốn nhật ký kết nối với người mình yêu thương trong quá khứ.\r\n\r\n“Tôi rất yêu em. Tôi chưa bao giờ nghĩ rằng mình có thể yêu ai nhiều đến như vậy. Từng lời nói, cử chỉ, sự thay đổi biểu cảm trên khuôn mặt, nụ cười hay thậm chí là hương thơm trên mái tóc... Mỗi khi nhớ về em, tôi lại thấy ngạt thở, giống như có CO2 trong phổi vậy... Touko!”\r\n\r\nVào mùa hè năm hai trung học, Seigo vẫn đang cố gắng gạt bỏ hình bóng người con gái mình yêu thương ra khỏi trái tim. Bốn năm đã trôi qua kể từ khi cô gái ấy rời khỏi thế giới này. Một ngày nọ, một lời hồi đáp mới bỗng nhiên xuất hiện trong cuốn nhật ký trao đổi của hai người. Và người viết ra những dòng chữ ấy, không ai khác chính là Touko...\r\n\r\n'),
(10, 'Và Rồi, Tháng 9 Không Có Cậu Đã Tới', 'Natsuki Amasawa', 106000, 'thang9.jpg', 'Tiểu thuyết thanh xuân bí ẩn xoay quanh những suy nghĩ bị giấu kín.\r\n\r\nVào mùa hè năm ấy, Keita đã qua đời.\r\n\r\nChưa vượt qua khỏi cú sốc đó, Miho, Taiki, Shun, Rino – những người bạn luôn bên cạnh Keita – đã trải qua một mùa hè đầy bất ngờ.\r\n\r\nMột ngày nọ, Kei – một thiếu niên giống hệt Keita đã mất – xuất hiện trước mặt Miho.\r\n\r\n“Mình có việc muốn nhờ các cậu. Xin hãy đến nơi mà mình đã chết.”\r\n\r\nDù cảm thấy bối rối, nhưng nhóm Miho vẫn bắt đầu cuộc hành trình đi theo dấu chân của Keita.\r\n\r\nTrong suốt chuyến đi này, những lời nói dối, sự ganh tị, hối hận cùng tình cảm hướng đến Keita dần được hé lộ. Và rồi, kết cục ngoài dự đoán cũng xuất hiện ở phía cuối hành trình.\r\n\r\n---\r\n\r\n'),
(69, 'Trôi', 'Nguyễn Ngọc Tư', 100000, 'troi.jpg', '“Em thà trôi một mình. Nhưng những gì còn sót lại của một cù lao phân rã chẳng là bao. Vài ba mái nhà lấp ló trên mặt nước, một vài cái lu, những rẻo đất đủ rộng cho một người ngồi thì cũng có, lại trôi đờ đẫn đằng xa. Mãi mới có mảnh đất trôi gần, đúng lúc nó rùng mình nứt làm hai.\n\nTrong mê lộ của nước, mình chẳng biết trôi được đến đâu. Không bãi bờ gì để định vị. Ngó đâu cũng chỉ thấy nước và bọt nước, cùng những vật chất nổi nênh.\n\nGiờ thì mạnh ai nấy trôi.” '),
(72, '5 centimet trên giây', 'Shinkai Makoto', 60000, '5_centimet_trên_giây.jpg', '5 Centimet trên giây (Nhật: 秒速5センチメートル, Hepburn: Byōsoku Go Senchimētoru?) là một phim anime do Shinkai Makoto đạo diễn và hãng CoMix Wave thực hiện. Bộ phim được công chiếu lần đầu vào ngày 03 tháng 3 năm 2007 tại rạp ở Shibuya, Tokyo[1]. Cốt truyện xoay quanh mối quan hệ của một cậu bé tên Tōno Takaki với một cô gái là bạn từ khi còn đi học vào khoảng những năm 1990 cho đến thời hiện đại, nhưng giữa họ luôn có một khoảng cách và thường chỉ liên lạc với nhau từ xa qua thư hay điện thoại. Bộ phim giành được giải Phim hoạt hình xuất sắc nhất tại lễ trao giải điện ảnh châu Á Thái Bình Dương năm 2007.'),
(73, '5 Centimet trên giây One More Side', 'Shinkai Makoto', 98000, '5cm.jpg', 'Nếu coi tiểu thuyết 5 CENTIMET TRÊN GIÂY là một bức tranh ghép hình, khắc họa chuyện đời, chuyện tình của Tono Takaki, thì 5 CENTIMET TRÊN GIÂY ONE MORE SIDE giống như phần mở rộng và hoàn thiện của bức tranh ấy. Những mảnh ghép vốn có được thay mới cả về nội dung và cách thể hiện. Những mảnh ghép ẩn được hé lộ đầy đủ và sáng tỏ. Bức tranh tổng thể vì thế mà toàn vẹn hơn, đa chiều hơn. Được chắp bút bởi tác giả quen thuộc Kanoh Arata, 5 CENTIMET TRÊN GIÂY ONE MORE SIDE sẽ đưa độc giả tiếp cận câu chuyện đượm buồn nhưng tuyệt đẹp của Shinkai Makoto một lần nữa, qua “một góc nhìn khác”'),
(84, 'Dế Mèn Phiêu Lưu Ký - Tái Bản 2020', 'Tô Hoài', 40000, 'dế mèn.jpg', 'Ấn bản minh họa màu đặc biệt của Dế Mèn phiêu lưu ký, với phần tranh ruột được in hai màu xanh - đen ấn tượng, gợi không khí đồng thoại.\r\n\r\n“Một con dế đã từ tay ông thả ra chu du thế giới tìm những điều tốt đẹp cho loài người. Và con dế ấy đã mang tên tuổi ông đi cùng trên những chặng đường phiêu lưu đến với cộng đồng những con vật trong văn học thế giới, đến với những xứ sở thiên nhiên và văn hóa của các quốc gia khác. Dế Mèn Tô Hoài đã lại sinh ra Tô Hoài Dế Mèn, một nhà văn trẻ mãi không già trong văn chương...” - Nhà phê bình Phạm Xuân Nguyên\r\n\r\n“Ông rất hiểu tư duy trẻ thơ, kể với chúng theo cách nghĩ của chúng, lí giải sự vật theo lô gích của trẻ. Hơn thế, với biệt tài miêu tả loài vật, Tô Hoài dựng lên một thế giới gần gũi với trẻ thơ. Khi cần, ông biết đem vào chất du ký khiến cho độc giả nhỏ tuổi vừa hồi hộp theo dõi, vừa thích thú khám phá.” - TS Nguyễn Đăng Điệp\r\n\r\n'),
(86, 'HARRY POTTER VÀ TÊN TÙ NHÂN NGỤC AZKABAN (Tập 03)', ' J.K.Rowling', 205000, 'hp pvs tù nhân.jpg', 'Harry Potter may mắn sống sót đến tuổi 13, sau nhiều cuộc tấn công của Chúa tể hắc ám.\r\n\r\n \r\n\r\nNhưng hy vọng có một học kỳ yên ổn với Quidditch của cậu đã tiêu tan thành mây khói khi một kẻ điên cuồng giết người hàng loạt vừa thoát khỏi nhà tù Azkaban, với sự lùng sục của những cai tù là giám ngục.\r\n\r\n \r\n\r\nDường như trường Hogwarts là nơi an toàn nhất cho Harry lúc này. Nhưng có phải là sự trùng hợp khi cậu luôn cảm giác có ai đang quan sát mình từ bóng đêm, và những điềm báo của giáo sư Trelawney liệu có chính xác?'),
(87, 'HARRY POTTER VÀ BẢO BỐI TỬ THẦN (Tập 07)', 'J.K.Rowling', 285000, 'hp vs bảo bối.jpg', 'Harry Potter đang chuẩn bị rời khỏi nhà Dursley và đường Privet Drive trong thời khắc cuối cùng. Tuy nhiên, tương lai Harry đầy rẫy hiểm nguy, không chỉ cho cậu mà cả những người gần gũi – và Harry đã mất mát quá nhiều. Chỉ bằng cách tiêu hủy những Trường Sinh Linh Giá, Harry Potter mới có thể tự cứu mình và vượt qua những thế lực đen tối của Chúa tể hắc ám.\r\n\r\n \r\n\r\nỞ phần kết đầy kịch tính của loạt truyện Harry Potter này, Harry phải để những người bạn trung thành nhất ở lại tuyến sau để dấn thân vào cuộc hành trình nguy hiểm cuối cùng hòng tìm kiếm sức mạnh và đối mặt với số phận đáng sợ của cậu: một cuộc chiến sinh tử và đơn độc.\r\n\r\n '),
(88, 'HARRY POTTER VÀ CHIẾC CỐC LỬA (Tập 04)', 'J.K.Rowling', 310000, 'hp vs chiếc cốc.jpg', 'Khi giải Quidditch Thế giới bị cắt ngang bởi những kẻ ủng hộ Chúa tể Voldemort và sự trở lại của Dấu hiệu hắc ám khủng khiếp, Harry ý thức được rõ ràng rằng, Chúa tể Voldemort đang ngày càng mạnh hơn. Và để trở lại thế giới phép thuật, Chúa tể hắc ám cần phải đánh bại kẻ duy nhất sống sót từ lời nguyền chết chóc của hắn - Harry Potter. Vì lẽ đó, khi Harry bị buộc phải bước vào giải đấu Tam Pháp thuật uy tín nhưng nguy hiểm, cậu nhận ra rằng trên cả chiến thắng, cậu phải giữ được mạng sống của mình.'),
(89, 'HARRY POTTER VÀ HOÀNG TỬ LAI (Tập 06)', 'J.K.Rowling', 245000, 'hp vs hoàng tử.jpg', 'Đây là năm thứ 6 của Harry Potter tại trường Hogwarts. Trong lúc những thế lực hắc ám của Voldemort gieo rắc nỗi kinh hoàng và sợ hãi ở khắp nơi, mọi chuyện càng lúc càng trở nên rõ ràng hơn đối với Harry, rằng cậu sẽ sớm phải đối diện với định mệnh của mình. Nhưng liệu Harry đã sẵn sàng vượt qua những thử thách đang chờ đợi phía trước?\r\n\r\nTrong cuộc phiêu lưu tăm tối và nghẹt thở nhất của mình, J.K.Rowling bắt đầu tài tình tháo gỡ từng mắc lưới phức tạp mà cô đã mạng lên, cũng là lúc chúng ta khám phá ra sự thật về Harry, cụ Dumblebore, thầy Snape và, tất nhiên, Kẻ Chớ Gọi Tên Ra…'),
(90, 'HARRY POTTER VÀ HỘI PHƯỢNG HOÀNG (Tập 05)', 'J.K.Rowling', 385000, 'hp vs hội PH.jpg', 'Harry tức giận vì bị bỏ rơi ở nhà Dursley trong dịp hè, cậu ngờ rằng Chúa tể hắc ám Voldemort đang tập hợp lực lượng, và vì cậu có nguy cơ bị tấn công, những người Harry luôn coi là bạn đang cố che giấu tung tích cậu. Cuối cùng, sau khi được giải cứu, Harry khám phá ra rằng giáo sư Dumbledore đang tập hợp lại Hội Phượng Hoàng – một đoàn quân bí mật đã được thành lập từ những năm trước nhằm chống lại Chúa tể Voldemort. Tuy nhiên, Bộ Pháp thuật không ủng hộ Hội Phượng Hoàng, những lời bịa đặt nhanh chóng được đăng tải trên Nhật báo Tiên tri – một tờ báo của giới phù thủy, Harry lo ngại rằng rất có khả năng cậu sẽ phải gánh vác trách nhiệm chống lại cái ác một mình.'),
(92, 'HARRY POTTER VÀ PHÒNG CHỨA BÍ MẬT (Tập 02)', 'J.K.Rowling', 170000, 'hp vs phòng chứa.jpg', 'Harry khổ sở mong ngóng cho kì nghỉ hè kinh khủng với gia đình Dursley kết thúc. Nhưng một con gia tinh bé nhỏ tội nghiệp đã cảnh báo cho Harry biết về mối nguy hiểm chết người đang chờ cậu ở trường Hogwarts.\r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\nTrở lại trường học, Harry nghe một tin đồn đang lan truyền về phòng chứa bí mật, nơi cất giữ những bí ẩn đáng sợ dành cho giới phù thủy có nguồn gốc Muggle. Có kẻ nào đó đang phù phép làm tê liệt mọi người, khiến họ gần như đã chết, và một lời cảnh báo kinh hoàng được tìm thấy trên bức tường. Mối nghi ngờ hàng đầu – và luôn luôn sai lầm – là Harry. Nhưng một việc còn đen tối hơn thế đã được hé mở.'),
(93, 'HARRY POTTER VÀ HÒN ĐÁ PHÙ THUỶ (Tập 01)', ' J.K.Rowling', 150000, 'HP vs hòn đá.jpg', 'Khi một lá thư được gởi đến cho cậu bé Harry Potter bình thường và bất hạnh, cậu khám phá ra một bí mật đã được che giấu suốt cả một thập kỉ. Cha mẹ cậu chính là phù thủy và cả hai đã bị lời nguyền của Chúa tể Hắc ám giết hại khi Harry mới chỉ là một đứa trẻ, và bằng cách nào đó, cậu đã giữ được mạng sống của mình. Thoát khỏi những người giám hộ Muggle không thể chịu đựng nổi để nhập học vào trường Hogwarts, một trường đào tạo phù thủy với những bóng ma và phép thuật, Harry tình cờ dấn thân vào một cuộc phiêu lưu đầy gai góc khi cậu phát hiện ra một con chó ba đầu đang canh giữ một căn phòng trên tầng ba. Rồi Harry nghe nói đến một viên đá bị mất tích sở hữu những sức mạnh lạ kì, rất quí giá, vô cùng nguy hiểm, mà cũng có thể là'),
(94, 'Khu Vườn Ngôn Từ', ' Shinkai Makoto', 120000, 'khu vượn.jpg', 'Khu vườn ngôn từ kể về một tình yêu còn xa xưa hơn cả tình yêu. Khái niệm tình yêu trong tiếng Nhật hiện đại là luyến hoặc ái, nhưng vào thời xưa nó được viết là cô bi, nghĩa là nỗi buồn một mình. Shinkai Makoto đã cấu tứ Khu vườn ngôn từ theo ý nghĩa cổ điển này, miêu tả tình yêu theo khái niệm ban sơ của nó, tức là cô bi - nỗi buồn khi một mình thương nhớ một người. Những ngày mưa triền miên.... Nơi hàng hiên ngập tràn màu xanh của một khu vườn Nhật Bản... Có một cảm xúc êm dịu đến không thốt nên lời cứ thế manh nha, tựu hình và lửng lơ tồn tại. Trong lúc dòng đời cuồn cuộn chảy trôi, tất cả hối hả tiến về phía trước, thì cậu và cô lại dừng chân, chìm xuống trong tĩnh lặng riêng mình, và ở cái vũng tĩnh lặng đó, họ tìm thấy nhau. Dần dần và mạo hiểm, quên đi cả các chênh lệch về tuổi tác và vị trí, họ thả hồn mình trôi về nhau hòa điệu. Làm nền cho tất cả là mưa rơi không ngừng, là lá mướt mát rung rinh. Nhưng khi mưa tạnh và trời quang trở lại, mọi đường nét của hiện thực trở nên rõ rệt đến khắc nghiệt, thì những êm dịu và lửng lơ kia liệu còn khả năng tồn tại?'),
(104, 'Đứa Con Của Thời Tiết', 'SHINKAI MAKOTO', 85000, 'đứa con cua.jpg', 'Tình thơ, gặp gỡ và chia ly là những vòng sóng đồng tâm trong thế giới Shinkai Makoto. Từng có cô Yuki chia tay Takao ở Khu vườn ngôn từ để đến dạy văn cho Mitsuha ở Your Name. Nay lại có Mitsuha và Taki chia tay Your Name. để sang ĐỨA CON CỦA THỜI TIẾT, gặp gỡ các tâm sóng mới là Hina và Hodaka. Đứa con của thời tiết phác ra thương yêu cô đọng giữa hoang mang của đô thị lớn và ngặt nghèo hơn, là giữa hoang mang của một thời đại biến đổi khí hậu bấp bênh. Vì một sự cố tình cờ, Hina được tạo hóa ban cho năng lực đặc biệt: làm nắng. Năng lực ấy càng thêm nhiệm màu khi đặt vào bối cảnh Nhật Bản hứng mưa triền miên, mưa đến mức vòm trời âm u trở thành cơm bữa, nước dâng gặm dần các đảo, và Tokyo có nguy cơ biến thành đô thị kênh đào. Nhưng đến đây, phong cách song hành nhất quán của Shinkai lại trỗi dậy. Trong lạc có bi, trong hạnh phúc sẵn chia ly, được ban phép màu ắt phải đánh đổi. Đứa con của thời tiết cũng không thể tùy ý tắt bật nắng mưa mà không phải trả giá gì. Theo sau một lần làm nắng, là chất chứa hàng chuỗi ăn mòn, hối hận, mạo hiểm, giải cứu, và đằng đẵng cách xa. '),
(105, 'Boxset Your Name - Bộ 3 Tập (Tái Bản)', 'Shinkai Makoto, Kotone Ranmaru', 150000, 'your name.jpg', 'Ở một nơi heo hút, có một thị trấn nhỏ xíu, không còn văn vật gì hiển hách ngoài một ngôi đền đã bị thu nhỏ quy mô, một sản phẩm dây tết không còn ai hiểu ý nghĩa, và một công nghệ làm rượu khiến thanh thiếu niên cực kì ngần ngại. Mitsuha cũng nằm trong số các thanh thiếu niên ấy. Cô khao khát thoát khỏi cái thị trấn chật chội nhiều săm soi va chạm, để đến sống ở thành phố lớn.\r\nVào một đêm tối tăm, cô chán chường kêu lên, “Kiếp sau, xin hãy cho con làm một anh chàng đẹp trai ở Tokyo!”\r\nRồi vào một ngày sáng sủa, cô quả nhiên thấy mình biến thành một chàng trai. Tỉnh dậy trong căn phòng lạ lẫm, gặp gỡ những người bạn không quen, khung cảnh sầm uất của Tokyo trải rộng trước mắt. Bối rối nhưng mãn nguyện, Mitsuha háo hức tận hưởng cuộc sống nơi đô thị phồn hoa cô vẫn hằng ước mong. Cùng lúc đó Taki, một nam sinh cấp ba sống ở Tokyo, lại thấy mình biến thành một nữ sinh sống ở vùng quê hẻo lánh mà cậu chưa từng đến.\r\n\r\n'),
(106, 'Trong Lòng Bình Yên Chính Là Hạnh Phúc', 'Kim Hansol', 109000, 'bình yên.jpg', 'Đã từng trải qua vô vàn chông gai trong cuộc đời, tôi nghĩ mỗi người đều có những nghịch cảnh và nỗi đau của riêng mình. Dẫu cho đó là nỗi đau mà những người khác xem nhẹ thì bản thân mình vẫn là người hiểu rõ nhất sức nặng của nó. Tôi cho rằng, chúng ta không cần phải so sánh bản thân với người khác, rồi thờ ơ với cảm xúc và trạng thái của mình. Hơn nữa, tôi cũng muốn nói khi bóng tối ập đến, chúng ta không cần phải cố thoát khỏi nó thật nhanh. Có điều, tôi mong khi bị chôn vùi trong bóng tối đó, các bạn sẽ luôn không ngừng ước ao hạnh phúc và không từ bỏ.\r\n\r\nNếu ta có thể sống một cuộc đời mình muốn, và nếu ta có thể bớt hối hận đi, thì chẳng phải là đủ rồi hay sao? Tôi tin rằng, nếu chúng ta kỳ vọng vào những điều mới mẻ sẽ xuất hiện trong chuyện không thể lường trước, thì cuộc đời sẽ mang đến cho chúng ta niềm vui còn lớn hơn cả sự kỳ vọng đó.\r\n\r\nVì không thể đoán trước nên cuộc sống của chúng ta lại càng vui hơn, và ta sẽ hiểu sâu sắc hơn giá trị của hiện tại. Mỗi ngày mà chúng ta đã tích lũy đều vô cùng quý giá, và chẳng có thứ gì trong những trải nghiệm đã qua là vô nghĩa. Hãy tiếp tục tiến về phía trước, đồng thời chuẩn bị một tâm thế tận hưởng tình huống ngoài dự kiến khi ánh sáng xuất hiện, thế chẳng phải là đủ rồi sao?\r\n\r\n'),
(107, 'Gửi Tới Người Mùa Đông Này Sẽ Không Còn Nữa', 'Inujun', 123000, 'gửi tới người.jpg', 'Một ngày đông nọ, Natsumi Ikuta, cô gái 24 tuổi đang bế tắc trong công việc và cuộc sống đã bị mắc kẹt trong một đám cháy khi tăng ca tại công ty. Ngay lúc cô sẵn sàng đón nhận cái chết, một chàng trai tên Atsuki đột nhiên xuất hiện và cứu sống cô. Song cậu nói rằng cô sẽ đối mặt với cái chết vào thời điểm này của năm trong vòng sáu năm tới, và nhằm ngăn chặn điều đó, mỗi năm Atsuki sẽ xuất hiện để giúp đỡ cô. Liệu Natsumi có thể vượt qua những thử thách của tử thần để tiếp tục sống sót không? Và thân phận thực sự của Atsuki là gì, tại sao cậu lại giúp đỡ cô?\r\n\r\nTrích dẫn trong sách:\r\n\r\nTôi đã có một ước nguyện. Khi số phận ập đến với bạn vào đêm hôm ấy, tôi sẽ đến cứu bạn.\r\n\r\nDẫu cho trong tương lai, mùa đông sẽ là một chuỗi thử thách mà bạn phải đối mặt…\r\n\r\n'),
(109, 'Hướng Dẫn Thư Viện Dành Cho Người Ghét Đọc', 'Mami Aoya', 149000, 'thư viện.png', 'Arasaka Kouji, một học sinh lớp 11 ghét đọc sách, tình cờ được giao trọng trách tái xuất bản tờ báo thư viện đã ngừng phát hành từ lâu. Đồng hành với cậu là Fujio Hotaru – một cô gái yêu sách.\r\n\r\nArasaka bắt đầu tìm kiếm người viết hộ bài văn cảm nghĩ đọc sách để đăng lên tờ báo. Thế nhưng, cậu lại nhận được những yêu cầu oái oăm để đổi lấy các bài văn từ bạn cùng lớp Yaegashi, đàn anh trong câu lạc bộ mỹ thuật Midorikawa và thấy giáo môn Sinh học Hizaki.\r\n\r\nTrong khi tìm hiểu nguyên nhân đằng sau những đòi hỏi đó, cuối cùng Arasaka và Fujio đã phải đối mặt với những cảm xúc mà ba người họ che giấu cùng vụ tự tử xảy ra năm xưa ở trường học…\r\n\r\nCâu chuyện kể về tháng ngày tuổi trẻ và bí mật của nhóm học sinh xoay quanh những cuốn sách.\r\n\r\n** Tác giả Mami Aoya: từng đạt giải Tân binh xuất sắc và giải Đặc biệt tại lễ trao giải tiểu thuyến Poplar lần thứ 2 vào năm 2012.\r\n\r\n** Trích dẫn sách hay:\r\n\r\n“Chúng ta của thời hiện đại cũng không thể ngờ được điều ấy nhỉ. Chúng ta nhìn thấy nỗi khổ của nhân vật chính không chỉ từ tiểu thuyết mà đến cả tivi, truyện tranh hay phim ảnh, hoặc bất cứ thứ gì. Chúng ta không còn cảm thấy kỳ lạ về chuyện người khác cũng lo lắng giống mình.”\r\n\r\n'),
(111, 'Khi Ấy Là Một Đêm Đầy Sao', 'Milito Amasaki, Nagu', 139000, 'bia_khi-ay-la-mot-dem-day-sao.jpg', 'Ở một thiết lập hoàn toàn khác so với hiện tại, anh muốn gặp lại em một lần nữa.\r\n\r\nDù cho phải hiến tế thân thể này, tôi vẫn muốn cứu Yoshino. Tuy nhiên, tôi hiểu rất rõ nếu chỉ ao ước thôi thì không đủ để mang em về.\r\n\r\nMột ngày bình thường của Hanabishi Junta luôn quanh quẩn trong chu trình: thức dậy => đến trường => đi chơi => ngủ, chỉ có như vậy thôi. Tiêu chí của cậu ấy chính là tiết kiệm năng lượng và làm mọi thứ ở mức vừa đủ\r\n\r\nCòn Watarase Yoshino thì hoàn toàn ngược lại. Cô bé chính là dạng người thế này: nhạc nền dùng để nghe khi vẽ phải phù hợp với chủ đề của bức tranh, thức ăn phải để ở nhiệt độ thích hợp mới đủ ngon.\r\n\r\nHai con người trái ngược ấy lại tình cờ gặp nhau trong một buổi học phụ đạo nọ và giữa họ đã nảy sinh một thứ tình cảm rất gần với tình yêu. Tuy nhiên, Yoshino không thể nào chống chọi được với căn bệnh kỳ lạ đang tàn phá cơ thể mình…\r\n\r\nVà rồi, kỳ tích đã xảy đến. Cậu và cô bé lớp dưới của cậu đã trở thành hai người xa lạ, người thì tính cách không còn như xưa, người thì giữ lại được sinh mệnh sắp tàn lụi.\r\n\r\nĐây là một chuyện tình thanh xuân đẹp đẽ nhất nhưng cũng phù du nhất, một câu chuyện về những người đã chọn cách lướt qua đời nhau để đối phương có được hạnh phúc.\r\n\r\n'),
(114, 'Một Cuốn Sách Chữa Lành', 'Brianna Wiest', 109000, 'chữa lành.jpg', '“Nếu chúng ta không học tự giải quyết những trải nghiệm về mặt cảm xúc của mình, chúng sẽ vẫn ở đó như những bộ quần áo cũ không nỡ bỏ đi... Những cảm giác choáng ngợp, bí bách, bất an là tàn dư của một sự kết thúc, nhưng cũng có thể là tín hiệu cho thấy chúng ta chưa được tự do trong không gian của mình.” “Một cuốn sách chữa lành” là tuyển tập các ghi chép trên hành trình chữa lành của tác giả Brianna, từ một cô gái trẻ đầy tổn thương học cách vượt qua những biến cố, hàn gắn từng mảnh vỡ trong tâm hồn để trở thành người phụ nữ vững vàng và hạnh phúc trong hiện tại. Nếu bạn đang trong trạng thái buồn bã, lo lắng, bồn chồn hay chỉ đơn giản là cảm thấy có những nỗi đau như bóp nghẹt trái tim mà không biết chia sẻ cùng ai, cuốn sách này sẽ đóng vai trò như một người bạn đồng hành, lắng nghe và đưa ra những lời khuyên hữu ích. Qua từng trang sách, bạn sẽ không chỉ tìm thấy những câu chữ xoa dịu tâm hồn mà còn học được cách lắng nghe “giọng nói nội tâm” để buông bỏ những thành kiến cố hữu và thu hút những điều may mắn, tích cực trong cuộc sống. Bạn sẽ được nhắc nhở phải tử tế hơn với bản thân và chấp nhận những điều sai sót. '),
(115, ' Anh Đào Nở Hoa', 'Mizuki Tsujimura', 129000, 'anh đào.jpg', 'Tsukahara Machi là nữ sinh năm nhất Trường cấp II Wakamiya. Cô bé có học lực bình thường và rất thích đọc sách. Một ngày nọ, khi Machi đang giở một cuốn sách trong thư viện thì bỗng nhiên, một tờ giấy rơi ra. Trên đó có dòng chữ Anh đào nở hoa được viết nắn nót. Thư ai viết vậy nhỉ? Sau nhiều lần bắt gặp những lá thư như vậy, Machi đã thử viết thư trả lời và cuộc trò chuyện qua thư với người bản ẩn danh đó đã giúp đôi bên trở nên thân thiết với nhau lúc nào không hay.\r\n\r\nAnh đào nở hoa mở ra một khung cảnh thanh xuân sống động với ba câu chuyện đầy ý nghĩa về niềm vui rực rỡ và những trải nghiệm vô gia của tuổi học trò.'),
(116, 'Sơn Trà Nở Muộn', 'Giá Oản Chúc', 248000, 'sơ trà.jpg', 'Nếu mỗi cuốn tiểu thuyết được ví như thời gian trong một ngày, thì “Sơn Trà Nở Muộn” có lẽ đã được bắt đầu vào thời điểm tăm tối nhất, đó chính là nửa đêm.\r\n\r\nHứa Huệ Chanh là một cô gái bán hoa ở hộp đêm, biệt danh là Sơn Trà. Ở độ tuổi xấp xỉ 30 như Hứa Huệ Chanh, chẳng còn gì gọi là giá trị để gìn giữ nữa, cô chẳng còn gì để mất, thậm chí, khát vọng sống mong manh của cô tưởng như đã tắt hẳn rồi, chỉ có thể sống vô hồn, vớt vát chút hơi thở từng ngày, chỉ có thể hèn mọn chờ đợi, hoặc là khách, hoặc là những trận đòn roi đau đớn quằn quại của ông chủ giữa giá lạnh.\r\n\r\nRơi vào cảnh khốn cùng đến vậy, cô lại gặp được Chung Định, người đàn ông bên ngoài tô vàng nạm ngọc, bên trong mục rỗng, bệnh hoạn, tàn độc không ai bằng. Hết lần này tới lần khác, hắn lôi cô vào những vụ cá cược oái oăm, những cuộc chơi đánh đổi cả sinh mạng, để thỏa mãn thú vui kỳ lạ của hắn và đám bạn, khiến cô không ít lần sống dở chết dở. Hứa Huệ Chanh vừa hận lại vừa khiếp sợ Chung Định, tìm đủ cách trốn tránh, cuối cùng vẫn không thoát khỏi nanh vuốt sắc nhọn kia.\r\n\r\nNhưng cô nào ngờ được rằng, người đàn ông từng dày vò cô đến thảm hại ấy, lại cứu rỗi cuộc đời cô…\r\n\r\n'),
(121, 'Tổn Thương Thời Thơ Ấu - 27 Câu Chuyện Chữa Lành Nỗi Đau Gia Đình', 'Triệu Trung Hoa', 135000, 'tổn thương.jpg', 'Thời thơ ấu là giai đoạn quan trọng và nhạy cảm trong cuộc đời mỗi người, là khi chúng ta hình thành những nhìn nhận về thế giới xung quanh. Tuy nhiên, không phải ai cũng trải qua thời thơ ấu trong sự an lành và hạnh phúc. Đôi khi, tuổi thơ ấy còn để lại những vết thương không thể chữa lành trong suốt phần đời còn lại. Có thể bạn đã phải sống trong môi trường gia đình bất ổn, với những xung đột, bạo lực hoặc thiếu sự quan tâm và yêu thương. Bố mẹ chưa chắc đã yêu thương con cái, người thân chưa chắc đã giúp đỡ lẫn nhau… không phải ai cũng may mắn có được một tuổi thơ trọn vẹn. Tổn thương thời thơ ấu không chỉ gây đau đớn trong thời điểm đó, mà còn có thể ảnh hưởng sâu sắc đến cuộc sống và sự phát triển của chúng ta khi trưởng thành. Những tổn thương này có thể gây ra những vết sẹo về tâm lý, sự thiếu tự tin, cảm giác không nhận được yêu thương, hay khó khăn trong việc xây dựng mối quan hệ và tạo dựng niềm tin với người khác. Tuy nhiên, tổn thương thời thơ ấu không phải lúc nào cũng mang ý nghĩa tiêu cực. Những trải nghiệm khó khăn trong quá khứ có thể trở thành nguồn năng lượng để tự khắc phục, học hỏi và xây dựng cuộc sống tốt hơn. '),
(122, ' Tự Cân Bằng Giữa Thế Giới Hỗn Độn', 'Yang Jae Jin, Yang Je Woong', 98000, 'cân bằng.jpg', 'Liều thuốc tinh thần cứu cánh cho hàng triệu người đang rơi vào trạng thái khủng hoảng và bế tắc\r\n\r\nLà con người, ai cũng có những nỗi niềm băn khoăn của riêng mình.\r\n\r\nNhiều lúc tưởng rằng trên đời này chỉ một mình ta khổ, nhưng thực ra ai cũng ngổn ngang không ít trăn trở trong lòng.\r\n\r\nLòng tự tôn yếu kém, tương lai mờ mịt, bất hoà với gia đình, căng thẳng trong công việc, thương tổn trong tình yêu… đó là những vấn đề mà ai cũng đã từng ít nhất một lần trải qua.\r\n\r\nNhững cảm xúc ban đầu vốn tưởng vụn vặt, nhẹ nhàng nhưng trải qua thời gian, càng ngày càng chất đầy trong lồng ngực.\r\n\r\nCuối cùng chúng mưng mủ thành bệnh tật và cướp đi niềm vui sống của con người.\r\n\r\nMột vết thương nhỏ ngoài da cũng đủ khiến ta cuống cuồng lo lắng nhưng lại chẳng chịu để tâm chăm sóc những tổn thương trong lòng.\r\n\r\nDù định kiến về sức khoẻ tâm thần đã dần dần vơi bớt nhưng rất nhiều người vẫn còn ngần ngại khi nghĩ đến việc điều trị.\r\n\r\nHọ thậm chí còn không nhận ra mình cần được giúp đỡ, họ thậm chí không dám đưa bàn tay ra, cứ như vậy ngày ngày sống trong đau khổ một mình.\r\n\r\n'),
(123, '新海誠監督作品 言の葉の庭 美術画集 SHINKAI MAKOTO KANTOKU SAKUHIN KOTONOHA NO NIWA BIJUTSU GASHUU', 'コミックス・ウェーブ・フィルム, Febri編集部', 933000, 'gigido.jpg', '劇場公開から8年のときを経て、ファン待望の美術画集がいよいよ発売。\r\n\r\n自分にとってはある意味、小さな工芸品のような映画です。\r\n(収録インタビューより一部抜粋)――新海誠\r\n\r\n『天気の子』で再タッグを組んだ監督・新海誠と美術監督・滝口比呂志のとりおろしインタビューを収録!\r\n140点を超える美術背景に加え、新海誠監督による企画書や絵コンテなど貴重なメイキング素材も圧倒的ボリュームで掲載。\r\n\r\n');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dangky`
--
ALTER TABLE `dangky`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dangky`
--
ALTER TABLE `dangky`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
