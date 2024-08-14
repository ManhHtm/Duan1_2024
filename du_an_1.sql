-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 14, 2024 lúc 07:11 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `du_an_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_bill`
--

CREATE TABLE `tb_bill` (
  `id` int(11) NOT NULL,
  `bill_name` varchar(255) NOT NULL,
  `bill_address` varchar(255) NOT NULL,
  `bill_tel` varchar(255) NOT NULL,
  `bill_email` varchar(255) NOT NULL,
  `bill_pttt` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1. Thanh toán khi nhận hàng\r\n2. Thanh tóa online',
  `bill_order_date` varchar(255) DEFAULT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `bill_status` int(11) NOT NULL DEFAULT 0 COMMENT '0. Chờ xác nhận\r\n1. Đã xác nhận\r\n2. Đang giao hàng\r\n3. Giao hàng thành công',
  `user_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_bill`
--

INSERT INTO `tb_bill` (`id`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `bill_order_date`, `total`, `bill_status`, `user_id`) VALUES
(73, 'Mạnh', '45 Phố Minh Khai, Minh Khai, Hai Bà Trưng, Hà Nội', '845927125', 'manh@gmail.com', 2, '07:18:41am 14/08/2024', 11111, 3, 30),
(74, 'Mạnh', '45 Phố Minh Khai, Minh Khai, Hai Bà Trưng, Hà Nội', '845927125', 'manh@gmail.com', 1, '07:19:06am 14/08/2024', 11111, 0, 30),
(75, 'Mạnh', '45 Phố Minh Khai, Minh Khai, Hai Bà Trưng, Hà Nội', '845927125', 'manh@gmail.com', 1, '07:19:25am 14/08/2024', 1234, 0, 30),
(77, 'hòa nguyễn', '45 Phố Minh Khai, Minh Khai, Hai Bà Trưng, Hà Nội', '0906172683', 'manh@gmail.com', 1, '07:31:30am 14/08/2024', 222, 2, 30),
(78, 'Mạnh', '45 Phố Minh Khai, Minh Khai, Hai Bà Trưng, Hà Nội', '845927125', 'manh@gmail.com', 1, '10:03:45am 14/08/2024', 8789, 3, 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_binhluan`
--

CREATE TABLE `tb_binhluan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_binhluan` int(11) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `ngaybinhluan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_binhluan`
--

INSERT INTO `tb_binhluan` (`id`, `id_user`, `id_binhluan`, `noidung`, `ngaybinhluan`) VALUES
(72, 29, 87, 'tư vấn size', '07:51:02am 28/07/2024'),
(75, 30, 98, 'ádsad', '12:51:24pm 11/08/2024'),
(76, 30, 94, 'đẹp quá', '06:13:01am 14/08/2024'),
(77, 30, 74, '', '07:02:41am 14/08/2024'),
(78, 30, 99, 'sdfdsf', '07:32:47am 14/08/2024');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_cart`
--

INSERT INTO `tb_cart` (`id`, `id_user`, `id_pro`, `image`, `name`, `price`, `quantity`, `total`, `id_bill`) VALUES
(64, 30, 95, 'vn-11134201-7r98o-lw3sl3gatjtm70.jpg', 'Giày sneakers nam Nike Full Force Lo - FB1362-101', 11111, 1, 11111, 73),
(65, 30, 99, 'vn-11134201-7r98o-lwnru1c6700sf2.jpg', 'Giày luyện tập nam Nike Air Max Alpha Trainer 5 - DM0829-301', 11111, 1, 11111, 74),
(66, 30, 89, 'sg-11134201-7rblg-lqbhudb8or8e2a.jpg', 'Giày Thể Thao Converse Chuck 70 Mixed Materials Men\'s - Black/Fossilized', 1234, 1, 1234, 75),
(68, 30, 81, 'sg-11134201-7rd3k-luaj7jqqs6o30c.jpg', 'Giày Thể Thao Converse Chuck 70 Pride Unisex - Silver', 222, 1, 222, 77),
(69, 30, 99, 'vn-11134201-7r98o-lwnru1c6700sf2.jpg', 'Giày luyện tập nam Nike Air Max Alpha Trainer 5 - DM0829-301', 8789, 1, 8789, 78);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(7, 'Puma'),
(10, 'Converse');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` text NOT NULL,
  `thumbnail1` varchar(255) NOT NULL,
  `thumbnail2` varchar(255) NOT NULL,
  `sale` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `product_name`, `price`, `image`, `thumbnail1`, `thumbnail2`, `sale`, `description`, `quantity`, `category_id`, `size_id`) VALUES
(72, 'Giày adidas CT866', '23456.00', 'sg-11134201-7rdx7-lxikvcriyyqoc4.jpg', 'sg-11134201-7rd4z-lwkrhrrslb4q0d.jpg', 'sg-11134201-7rd6y-lwkrhkraus8e21.jpg', 0, 'Cần một đôi giày cứng cáp để có thể thành thạo một môn thể thao thách thức cả trọng lực. Vậy nên đôi giày trainer adidas phong cách trượt ván này sẽ luôn hiện diện trong tủ đồ của bạn, và không chỉ bởi thiết kế classic. Giày có thiết kế bền bỉ, với đế cup', '342', 2, 1),
(74, 'Adidas Trượt ván', '14000.00', 'sg-11134201-7rbk3-lo3bkpof548640.jpg', 'sg-11134201-7rd6m-lvv2kpyxtd5748.jpg', 'sg-11134201-7rdwa-ly4jlolo2e9kcb.jpg', 0, 'Cần một đôi giày cứng cáp để có thể thành thạo một môn thể thao thách thức cả trọng lực. Vậy nên đôi giày trainer adidas phong cách trượt ván này sẽ luôn hiện diện trong tủ đồ của bạn, và không chỉ bởi thiết kế classic. Giày có thiết kế bền bỉ, với đế cup', '234', 2, 1),
(75, 'Giày Puma sneakers unisex', '243000.00', 'vn-11134201-7r98o-lwcnp4wc0njjfd.jpg', 'vn-11134201-7r98o-lwcnp52frpcb27.jpg', 'vn-11134201-7r98o-lwcnp53jq3bc49.jpg', 0, 'MÔ TẢ SẢN PHẨM\r\n\r\nChất liệu: Da, cao su\r\n\r\nKiểu dáng giày thể thao cổ thấp năng động, thời trang\r\n\r\nDây mảnh đan chéo đơn giản\r\n\r\nLogo PUMA được in dập nổi\r\n\r\nĐế giữa và đế ngoài bằng cao su cung cấp lực kéo trên mọi bề mặt\r\n\r\nGam màu hiện đại dễ dàng phố', '1444', 7, 1),
(76, 'Giày Puma sneakers nữ cổ thấp', '999000.00', 'vn-11134201-7r98o-lwcnugfbqo1kd4.jpg', 'vn-11134201-7r98o-lwcnuvatz0dt9a.jpg', 'vn-11134201-7r98o-lwcnuvatz0pk87.jpg', 0, 'MÔ TẢ SẢN PHẨM\r\n\r\nChất liệu: Da tổng hợp. Đế: Cao su\r\n\r\nKiểu dáng giày sneakers cổ thấp thời trang\r\n\r\nPhom ôm dáng chân\r\n\r\nDây buộc mảnh cùng tone màu\r\n\r\nPhối logo thương hiệu nổi bật ở phần lưỡi giày\r\n\r\nMiếng lót giày SOFTFOAM+ thoải mái, cung cấp lớp đệ', '3333', 7, 1),
(77, 'Giày sneakers nữ Nike Gamma Force - DX9176-103', '41234.00', 'vn-11134201-7r98o-lwnsh61pmicjcb.jpg', 'vn-11134201-7r98o-lwnsh5mg8uceb4.jpg', 'vn-11134201-7r98o-lwnsh5s00ppi3a.jpg', 0, 'Giày sneakers nữ Nike Gamma Force - DX9176-103\r\n\r\nGIÀY THỂ THAO NỮ NIKE GAMMA FORCEBước chân vào thế giới của phong cách đa chiều với Giày Thể Thao Nữ Nike Gamma Force. Khám phá sự kết hợp tinh tế giữa thoải mái và linh hoạt, sản phẩm này không chỉ đậm ch', '233', 1, 1),
(78, 'Nike Air Force 1 Shadow', '232233.00', 'vn-11134201-7r98o-lwnrpbcyxpc533.jpg', 'vn-11134201-7r98o-lwnrpbjwnjyp94.jpg', 'vn-11134201-7r98o-lwnrpbg0t94350.jpg', 0, 'The Nike Air Force 1 Shadow puts a playful twist on a classic b-ball design.Using a layered approach, doubling the branding and exaggerating the midsole, it highlights AF-1 DNA with a bold, new look.', '23', 1, 1),
(79, 'Air Jordan 1 Low SE', '2234234.00', 'FQ6015-200-1.webp', 'vn-11134201-7r98o-lwnruboj23t70e.jpg', 'vn-11134201-7r98o-lwnrubq6znl2f5.jpg', 0, 'Show love to your furry friends in this special edition AJ1. Keeping the clean and classic look inspired by the \'85 original, it features textured laces and paw prints on the outsole for a fresh take on an all-time favourite.', '12312', 1, 1),
(80, 'Giày Thể Thao Converse CTAS Lift Women\'s - Black/Egret/Gold', '111.00', 'sg-11134201-7rced-ltt7748lufv876.jpg', 'sg-11134201-7rcej-ltt7757ah3lvb8.jpg', 'sg-11134201-7rccz-ltt775w9f5otec.jpg', 0, 'Giày Converse Chuck Taylor All Star 1970s Hi Top Black được thiết kế từ chất liệu vải canvas nhẹ, dày dặn, cứng form hơn. Là dòng giày tiêu biểu và đặc trưng cho phong cách cổ điển của Converse. Lớp lót dày tạo cảm giác êm ái khi vận động, vải dày', '121212', 10, 1),
(81, 'Giày Thể Thao Converse Chuck 70 Pride Unisex - Silver', '222.00', 'sg-11134201-7rd3k-luaj7jqqs6o30c.jpg', 'sg-11134201-7rd50-luaj7lfib9glfe.jpg', 'sg-11134201-7rd4k-luaj7m3dccc778.jpg', 0, 'Bạn đã quá quen với phong cách quen thuộc của Converse là những đôi giày thể thao, chất lừ, khỏe khoắn với phần thân bằng vải và đế giày cau su màu đen thì có lẽ bạn sẽ phải thốt lên những từ cảm thán bất ngờ khi được chứng kiến sự bứt phá đầy khác biệt v', '222', 10, 1),
(83, 'adidas Trượt ván Giày VL Court 2.0 ', '12.00', 'sg-11134201-7rd41-lx9juzbrvbey78.jpg', 'sg-11134201-7rd6h-lwkrlslcnw7149.jpg', 'sg-11134201-7rd4g-lwkrlyw1g5fa3d.jpg', 0, 'Cần một đôi giày cứng cáp để có thể thành thạo một môn thể thao thách thức cả trọng lực. Vậy nên đôi giày trainer adidas phong cách trượt ván này sẽ luôn hiện diện trong tủ đồ của bạn, và không chỉ bởi thiết kế classic. Giày có thiết kế bền bỉ, với đế cup', '2', 2, 1),
(87, 'Giày Thể Thao Converse Chuck 70 Plus Unisex - Fresh Brew', '121212.00', 'sg-11134201-7rblk-lpj80l7ft6rrf4.jpg', 'sg-11134201-7rbmc-lpj80mw7doa42e.jpg', 'sg-11134201-7rbmk-lpj80nz1rew554.jpg', 0, 'GIÀY SNEAKERS CONVERSE - HÀNG CHÍNH HÃNG PHÂN PHỐI BỞI WEAR VIETNAM  \r\n\r\n- Size US : 3.5-11, Size EU: 34.5-44.5 \r\n\r\n-Chinh sách đối với các sản phẩm được bán bởi Wear Vietnam\r\n\r\n+ Giảm từ 0 -> 10%: hỗ trợ đổi size và bảo hành\r\n\r\n+ Giảm trên 10%: không đổi', '123', 10, 1),
(88, 'Giày sneakers Puma unisex cổ thấp RS-X 3D 390025-01', '1212.00', 'vn-11134201-7r98o-lwcnudknwvy621.jpg', 'vn-11134201-7r98o-lwcnudotqst12c.jpg', 'vn-11134201-7r98o-lwcnudpxql4799.jpg', 0, 'Mở ra một thế giới mới cho phong cách của bạn thêm phần mạnh mẽ và cá tính với đôi giày sneakers RS X 3D. Với sự kết hợp đầy táo bạo giữa phom dáng đột phá và sự tương phản màu sắc đầy đặc sắc, chắc chắn sẽ giúp bạn dễ dàng ghi lại dấu ấn cá biệt của mình', '1212', 7, 1),
(89, 'Giày Thể Thao Converse Chuck 70 Mixed Materials Men\'s - Black/Fossilized', '1234.00', 'sg-11134201-7rblg-lqbhudb8or8e2a.jpg', 'sg-11134201-7rbkz-lqbhuf5jzp0m5e.jpg', 'sg-11134201-7rbmp-lqbhugf2543rbf.jpg', 0, 'Đặt tiêu chuẩn in đậm trong những chiếc giày Chuck 70 này. Các chi tiết thiết kế táo bạo và đường khâu lấy cảm hứng từ bespoke biến mọi phong cách thành một phong cách nổi bật mà chỉ bạn mới có thể tạo ra.\r\n<p>Đặc điểm và lợi ích<br />Giày cổ cao có mặt t', '1212', 10, 1),
(90, 'Giày Thể Thao Converse Chuck Taylor All Star Utility Men\'s - Black', '1323.00', 'sg-11134201-7rcdu-ls9l0s3gwp6hee.jpg', 'sg-11134201-7rcdw-ls9l0ted02so75.jpg', 'sg-11134201-7rcdq-ls9l0ulx8byeff.jpg', 0, 'Sản phẩm yêu thích của những người trượt ván từ những năm 90—hiện đã được cập nhật để có độ bền tối đa. One Star Pro ngày nay vẫn duy trì phong cách cổ điển với lớp đệm được nâng cấp để bảo vệ chống va đập. Phiên bản này có đồ họa dây thép gai ở giữa đế', '555', 10, 1),
(91, 'PUMA - Giày sneakers unisex cổ thấp CA Pro Glitch 390681-02', '4343', 'vn-11134201-7r98o-lwcnudknwwb004.jpg', 'vn-11134201-7r98o-lwcnudrbn53x33.jpg', 'vn-11134201-7r98o-lwcnudotqsns06.jpg', 0, 'Chất liệu: Da tổng hợp, Cao su\r\n\r\nKiểu dáng giày thể thao cổ thấp thời trang\r\n\r\nPhom ôm chân,dễ dàng di chuyển\r\n\r\nDây mảnh đan chéo đơn giản\r\n\r\nLogo Puma Cat nổi bật\r\n\r\nĐế ngoài cao su có độ bám tốt\r\n\r\nGam màu hiện đại dễ dàng phối với nhiều trang phục và', '555', 7, 1),
(92, 'PUMA - Giày sneakers unisex cổ thấp Teveris Nitro 388774-11', '777.00', 'vn-11134207-7r98o-lw1mu7heu0uzce.jpg', 'vn-11134201-7r98o-lwcnudsfliiz4f.jpg', 'vn-11134201-7r98o-lwcnudt9kb2u8e.jpg', 0, 'Chất liệu: Vải lưới, da lộn, cao su\r\n\r\nKiểu dáng giày thể thao cổ thấp thời trang, đế dày cá tính\r\n\r\nDây thắt mảnh đan chéo đơn giản\r\n\r\nChi tiết logo Puma Cat nổi bật ở gót sau\r\n\r\nĐệm lót mềm mại, thoải mái\r\n\r\nĐế giữa CMEVA êm nhẹ và đế ngoài cao su có độ', '555', 7, 1),
(93, 'adidas Bóng rổ Giày Rivalry Summer Low Unisex trắng ID6206', '777.00', 'sg-11134201-7rceq-lsam2ftzjmpjbe.jpg', 'sg-11134201-7rdvn-ly4jkuccchq0d1.jpg', 'sg-11134201-7rdwb-ly4jl3fr46xp0d.jpg', 0, 'Lấy cảm hứng từ giới bóng rổ thập niên 80, đôi giày adidas cổ thấp này định nghĩa lại phong cách ngoài sân đấu. Thân giày bằng da có thể đạp gót giúp bạn xỏ và tháo giày chỉ bằng một động tác nhanh gọn. Phong cách casual lấy cảm hứng từ không khí nhẹ nhàn', '555', 2, 1),
(94, 'adidas Phong cách sống Giày Superstar XLG Nữ trắng IE2974', '777.00', 'sg-11134201-7rbmo-lo4rylobfb1sd0.jpg', 'sg-11134201-7rdwz-ly4jl3bl7gos44.jpg', 'sg-11134201-7rdw6-ly4jlcaa4nav84.jpg', 0, 'Không đơn thuần là một đôi sneaker, giày adidas Superstar XLG là sự tái hiện một biểu tượng. Sải bước vào lịch sử với nét biến tấu hiện đại khi trải nghiệm thân giày bằng da mượt mà, mũi giày vỏ sò đặc trưng và đế ngoài kiểu mới biến hóa một huyền thoại. ', '555', 2, 1),
(95, 'Giày sneakers nam Nike Full Force Lo - FB1362-101', '666', 'vn-11134201-7r98o-lw3sl3gatjtm70.jpg', '800x-15-300x296.png', '800x-14-300x295.png', 0, 'Giày sneakers nam Nike Full Force Lo - FB1362-101\r\n\r\nGIÀY SNEAKER NAM NIKE FULL FORCE LOW - TRẮNGNike Full Force Low đưa bạn trở về thời đại của những đôi giày sneakers đơn giản, mạnh mẽ, nơi chất lượng và phong cách vượt thời gian lên ngôi. Đây là một đô', '22323', 1, 1),
(96, 'Giày sneaker nam Nike Air Max 1 - FD9082-107', '234.00', 'vn-11134201-7r98o-lwnrwog30j2r73.jpg', 'vn-11134201-7r98o-lwnrwoaj8n2g05 (1).jpg', 'vn-11134201-7r98o-lwnrwoch5sww2f (1).jpg', 0, 'Giày sneaker nam Nike Air Max 1 - FD9082-107\r\n\r\nGIÀY THỜI TRANG NAM NIKE AIR MAX 1Ra mắt vào năm 1987, Air Max 1 ghi dấu ấn lịch sử khi tiên phong mang đến cho thế giới cái nhìn trực quan về công nghệ đệm khí Nike Air. Lấy cảm hứng từ kiến trúc Pháp tinh ', '578', 1, 1),
(97, 'Giày Thời Trang Nam Nike Air Max 90 DX4233-001', '23434.00', 'vn-11134201-7r98o-ly34fie2qk0rf0.jpg', 'vn-11134201-7r98o-lya937tpu8bl4a.jpg', 'vn-11134201-7r98o-ly34f1wuw2jddb.jpg', 0, 'GIÀY THỜI TRANG NAM NIKE AIR MAX 90Giày Thời Trang Nam Nike Air Max 90 là biểu tượng của một thời đại, không chỉ vì vẻ đẹp đặc trưng mà còn bởi sự kết hợp tinh tế giữa nghệ thuật, âm nhạc và văn hóa. Với phần trên bằng vải kết hợp lớp phủ da và tổng hợp, ', '234234', 1, 1),
(98, 'Giày sneakers nam Nike Air Max 90 - DM0029-105', '974', 'vn-11134201-7r98o-luod1p4cjs7z07.jpg', 'vn-11134201-7r98o-luod1p56ika46b.jpg', 'vn-11134201-7r98o-luod1p60hci96c.jpg', 0, 'Giày sneakers nam Nike Air Max 90 - DM0029-105\r\n\r\nMen\'s Nike Air Max 90 Sneakers DM0029-105\r\n\r\nHướng dẫn bảo quản:\r\n\r\n• Hạn chế không nên để sản phẩm tiếp xúc nhiều với chất bẩn, đặc biệt là các chất bẩn cứng đầu như máu, cà phê, nhựa trái cây…\r\n\r\n• Bảo q', '3434', 1, 1),
(99, 'Giày luyện tập nam Nike Air Max Alpha Trainer 5 - DM0829-301', '8789', 'vn-11134201-7r98o-lwnru1c6700sf2.jpg', 'vn-11134201-7r98o-lwnru1c670bp66.jpg', 'vn-11134201-7r98o-lwnru1a89u2jc0.jpg', 0, 'Giày luyện tập nam Nike Air Max Alpha Trainer 5 - DM0829-301\r\n\r\nGIÀY LUYỆN TẬP NAM NIKE AIR MAX ALPHA TRAINER 5Phá bỏ giới hạn với Nike Air Max Alpha Trainer 5 - đôi giày lý tưởng cho những chiến binh phòng tập kiên cường. Từng bước chân, từng cử tạ đều v', '2232', 1, 1),
(101, 'Giày Thể Thao Converse Chuck 70 Unisex\'s - Egret/Black/Egret', '24567', 'sg-11134201-7rcew-lt0stocovkkv03.jpg', 'sg-11134201-7rceu-lt0stq0wfgxd10.jpg', 'sg-11134201-7rcdp-lt0stpjp4mjj06.jpg', 0, 'Đặc điểm và lợi ích\r\nVải canvas cao cấp mang lại vẻ sang trọng cho kiểu dáng Chucks không lỗi mốt\r\nĐệm OrthoLite giúp mang lại sự thoải mái tối ưu\r\nHọa tiết ca rô cho phong cách nổi bật\r\nSọc lưỡi và gót giày tạo thêm độ tương phản\r\nLogo Chuck Taylor giả', '2232', 10, 1),
(111, 'sma', '11111', 'sg-11134201-7rdvn-ly4jkuccchq0d1.jpg', 'vn-11134201-7r98o-lwcnp52frpcb27.jpg', 'vn-11134201-7r98o-lwcnudpxql4799.jpg', 0, 'efsdfsdf', '12', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_size`
--

CREATE TABLE `tb_size` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_size`
--

INSERT INTO `tb_size` (`size_id`, `size_name`) VALUES
(1, '38'),
(2, '39'),
(3, '40'),
(4, '41'),
(5, '42'),
(6, '43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_name`, `password`, `email`, `phone`, `address`, `role`) VALUES
(3, 'admin', '123', 'admin@gmail.com', 1234567896, '30 Yên Nghĩa, Hà Đông, Hà Nội', 1),
(17, 'Hùng', '1234', 'hung@gmail.com', 845927125, '45 Phố Minh Khai, Minh Khai, Hai Bà Trưng, Hà Nội', 0),
(28, 'Minh', '1234', 'minh@gmail.com', 2147483647, '30 Yên Nghĩa, Hà Đông, Hà Nội', 0),
(29, 'Mạnhh', '1234', 'manhh@gmail.com', 12121212, '30 Yên Nghĩa, Hà Đông, Hà Nội', 0),
(30, 'Mạnh', '123', 'manh@gmail.com', 845927125, '45 Phố Minh Khai, Minh Khai, Hai Bà Trưng, Hà Nội', 0),
(41, 'my ', '12345', 'my@gmail.com', 19192112, '12121212121', 0),
(42, 'Nguyễn Đức Mạnh', '1234', 'manhndph31878@fpt.edu.vn', 845927125, '30 Yên Nghĩa, Hà Đông, Hà Nội', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tb_bill`
--
ALTER TABLE `tb_bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`user_id`);

--
-- Chỉ mục cho bảng `tb_binhluan`
--
ALTER TABLE `tb_binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_binhluan` (`id_binhluan`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bill` (`id_bill`);

--
-- Chỉ mục cho bảng `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Chỉ mục cho bảng `tb_size`
--
ALTER TABLE `tb_size`
  ADD PRIMARY KEY (`size_id`);

--
-- Chỉ mục cho bảng `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tb_bill`
--
ALTER TABLE `tb_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `tb_binhluan`
--
ALTER TABLE `tb_binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT cho bảng `tb_size`
--
ALTER TABLE `tb_size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tb_bill`
--
ALTER TABLE `tb_bill`
  ADD CONSTRAINT `tb_bill_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`);

--
-- Các ràng buộc cho bảng `tb_binhluan`
--
ALTER TABLE `tb_binhluan`
  ADD CONSTRAINT `tb_binhluan_ibfk_1` FOREIGN KEY (`id_binhluan`) REFERENCES `tb_product` (`product_id`),
  ADD CONSTRAINT `tb_binhluan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`user_id`);

--
-- Các ràng buộc cho bảng `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD CONSTRAINT `tb_cart_ibfk_1` FOREIGN KEY (`id_bill`) REFERENCES `tb_bill` (`id`);

--
-- Các ràng buộc cho bảng `tb_product`
--
ALTER TABLE `tb_product`
  ADD CONSTRAINT `tb_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tb_category` (`category_id`),
  ADD CONSTRAINT `tb_product_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `tb_size` (`size_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
