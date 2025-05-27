-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 27, 2025 lúc 07:21 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cartier_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Cushion'),
(2, 'Phấn mắt'),
(3, 'Má hồng'),
(4, 'Son môi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `description`, `price`) VALUES
(1, 'Cushion - Dior Capture kèm 1 lõi sơ cua 25g ', 1, 'Cam kết chính hãng\r\nDior giới thiệu một hộp phấn trang điểm cao cấp được thiết kế để chứa bất kỳ lõi thay thế nào của dòng kem nền dạng cushion Dior Forever. Có sẵn trong nhiều phiên bản với cảm hứng đa dạng, đây thực sự là một phụ kiện thời trang đáng sưu tầm có thể sử dụng nhiều lần.\r\n\r\nTheo từng mùa, các phiên bản hộp couture giới hạn sẽ được bổ sung vào bộ đôi hộp midnight blue kinh điển — một mẫu với họa tiết cannage mang tính biểu tượng của Dior trên nền vải thêu, và mẫu còn lại phủ chất liệu vinyl họa tiết chần bông.\r\n\r\nHộp Dior Forever Cushion được bán riêng, không bao gồm lõi kem nền. Chỉ tương thích với các lõi Dior Forever Cushion và Dior Forever Skin Glow Cushion.', 450000.00),
(2, 'Bảng Phấn Mắt 10 màu Romand Better Than Palette 7.5g', 2, 'MÔ TẢ SẢN PHẨM\r\nBảng Phấn Mắt 10 Ô Romand Better Than Eye Palette giống như một \"Khu vườn bí mật\" đầy màu sắc của Romand, là bí mật tạo nên sự khác biệt, tạo điểm nhấn cho đôi mắt\r\n\r\n- Tạo điểm nhấn sáng tối với 5 mức độ màu khác nhau, tạo chiều sâu cho đôi mắt \r\n- Kiềm dầu với hạt phấn siêu nhỏ hút sạch dầu và bã nhờn, không bị crease, duy trì lớp trang điểm như ban đầu \r\n- Hạt phấn không bị rơi ra, không gây khó chịu khi sử dụng \r\n- Glitter với những hạt nhũ có kích thước khác nhau, tạo điểm nhấn bắt sáng cho đôi mắt thêm tỏa sáng lung linh \r\n\r\nBảng Phấn Mắt 10 Ô Siêu Lấp Lánh Romand Better Than Eye Palette có những màu:\r\n\r\nNO.00 Light and Glitter Garden: Màu nhũ lấp lánh tỏa sáng \r\nNO.1 Pampas Garden: Màu cam san hô ngọt ngào \r\nNO.2 Magogany Garden: Màu nâu tự nhiên \r\nNO.3 Rosebud Garden: Màu hồng đất dịu dàng \r\nNO.4 Dustyfog Garden: Màu khói thuộc tông lạnh \r\nNO.5 Shade and Shadow Garden: Màu nâu base \r\nNO.6 Peony Nude Garden: Màu tím nude\r\nNO.07. Berry Fuchsia Garden: Màu hồng tím berry\r\nNO.08 Peach Dahlia Garden: Màu cam đào ngọt ngào\r\nNO. 09 DREAMY LILAC GARDEN: Màu tím nhẹ nhàng \r\n\r\n#romand #bangmatromand #sonromand #bangmat #phanmat', 250000.00),
(3, 'Phấn Mắt 4 Ô Peripera Ink Pocket Shadow Palette', 2, 'MÔ TẢ SẢN PHẨM\r\n✨New arrival ✨\r\n\r\n🩶 Phấn mắt 4 ô Peripera Ink Pocket Eyeshadow \r\n\r\n\r\n➖ kết cấu hạt phấn micro siêu nhỏ, mịn cho độ bám hoàn hảo ngay lần đầu tiên, giúp duy trì màu mắt không bị trôi.\r\n\r\n➖Sự kết hợp giữa các màu matte lì với những màu glitter bắt sáng giúp tạo nên hiệu ứng màu mắt bling bling giúp nàng có được makeuplook siêu thời thượng.\r\n\r\n➖Phấn mắt Peripera Ink Pocket Shadow Palette gồm ba màu lì và một màu nhũ cho đôi mắt xinh long lanh tự nhiên trong mọi hoàn cảnh.\r\n\r\n• 01 Fancy Spring Sunshine - Cam đào\r\n• 02 Cool Summer Vibe - Hồng lạnh\r\n• 03 Rolling In The Autumn - Cam đất\r\n• 04 You Know What Mute - Hồng nâu\r\n\r\n#peripera', 195000.00),
(4, 'Phấn Nước Aperire Day Dream Cover SPF50+ PA++++', 1, 'Cam kết chính hãng. \\n\r\nXuất xứ: Hàn Quốc \\n\r\nThương hiệu: Aperire\\n\r\nCushion Aperire Day Dream Cover SPF50+/PA++++ là dòng phấn nước đến từ Hàn Quốc giúp che phủ hoàn hảo các khuyết điểm trên gương mặt, sử dụng công nghệ độc quyền Satin-Fix với hạt phấn bọc dưỡng chất giúp lớp nền mịn lì và bền màu 24h. Kết hợp cùng 5 màng lọc chống nắng với chỉ số chống nắng SPF50+/PA++++ giúp bảo vệ da toàn diện. \\n\r\nThiết Kế: Tông vàng hồng được phủ một lớp granite làm nổi bật logo thương hiệu ở chính giữa tạo cảm giác thanh lịch và nữ tính. Mút cushion có thiết kế hình giọt nước giúp len lỏi vào các vùng khoé mũi và bầu mắt.\\n\r\nƯu Điểm Nổi Bật: \\n\r\nSử dụng công nghệ độc quyền Satin-Fix với hạt phấn bọc dưỡng chất: \\n\r\nMang đến kết cấu mỏng nhẹ, mịn mượt và che phủ các khuyết điểm trên da.\r\nMang đến khả năng chống nước, kiểm soát dầu nhờn, duy trì lớp nền bền màu, không xuống tông suốt 24h.\\n', 300000.00),
(5, 'Phấn nước 3CE Fitting Mesh Cushion 2 Lõi - Mibebe ', 1, 'Phấn nước 3CE Fitting Mesh Cushion 2 Lõi - Mibebe\\r\r\n\r\nXuất xứ: Hàn Quốc \r\nThương Hiệu : 3ce\r\n\r\n💗 Cushion Fitting Mesh của 3CE cung cấp một giải pháp hoàn hảo bởi mang lại hiệu ứng da mịn màng như có “filter” và chứa nhiều thành phần nuôi dưỡng da.  \r\n💗 Công thức có đến 73% là dưỡng chất giúp dưỡng ẩm, làm dịu da nhạy cảm. Mang lại cảm giác hoàn toàn dễ chịu trên da, đến cả làn da nhạy cảm nhất cũng thích mê em cushion này luôn. \r\n💗 Phấn có độ bám cực tốt, kiềm dầu cao và mang lại độ che phủ tự nhiên, lên da nhẹ tênh như không.\r\n💗 Mặt cushion dạng lưới mịn, giúp phấn được thoa đều mà không bị vón cục hay bết dính nha. \r\n\r\n#P01: da trắng sáng \r\n#N01: da sáng tự nhiên\r\n#N02: da trung bình\r\n\r\nChứa 73% Thành Phần Chăm Sóc Da:\r\n- Với 73% thành phần chăm sóc da, cushion này hoàn thành quy trình dưỡng ẩm của bạn chỉ trong một bước. Người dùng báo cáo rằng da họ cảm thấy thoải mái (93.8%) và không bị khô hay căng (93.8%) khi sử dụng sản phẩm này.\r\n \r\nĐộ Che Phủ Nhẹ Như Không:\r\n- Cushion bám vào da như nam châm, mang lại độ che phủ nhẹ nhàng, tươi mới mà hầu như không cảm nhận được.\r\n \r\nLưới Mịn Tinh Tế:\r\n- Lưới mịn tinh tế lọc công thức dạng kem, đảm bảo sản phẩm được thoa đều mà không bị vón cục hay bết dính.', 520000.00),
(6, 'Phấn Nước Espoir Pro Tailor Be Glow Cushion New Class 2023 SPF42 PA++ 13gr', 1, 'PHẤN NƯỚC CUSHION ESPOIR PRO TAILOR BE GLOW NEW CLASS 2023\r\n\r\nKể từ lần phát hành đầu tiên cho đến nay Phấn Nước Espoir Pro Tailor Be Glow Cushion đã xuất sắc giành được 22 giải Beauty Awards. Và nay Be Glow đã được Espoir cho ra mắt phiên bản 2023 siêu vượt trội:\r\n\r\n➖Độ ẩm tăng gấp 3 nhờ công nghệ Triple Moisture Lock Triplayer™ cho làn da sáng rạng ngời như thể nó được dưỡng ẩm từ bên trong chứ không phải bóng dầu.\r\n\r\n➖Bảng thành phần chứa rau má mang làn da tươi sáng rạng rỡ suốt cả ngày dài mà không lo sạm da và kích ứng.\r\n\r\n➖Phấn Nước Espoir Pro Tailor Be Glow Cushion New Class mang màu sắc trung tính phù hợp với tone da châu Á, hiệu chỉnh tối ưu nhất sắc tố da cho bạn.\r\n\r\n➖Độ che phủ bền màu lên đến 12h mà lớp nền vẫn nhẹ nhàng, khô thoáng và không gây nặng mặt, mang đến lớp Finish đều màu, mỏng nhẹ, căng bóng tự nhiên như thể làn da thật\r\n\r\n➖Sản phẩm với thiết kế hiện đại, đạt chứng nhận thuần chay Eve Vegan, không chứa các thành phần độc hại và các nguyên liệu từ động vật. \r\n\r\n\r\n\r\n\r\n\r\nPhấn Nước Espoir Pro Tailor Be Glow Cushion New Class 2023 Special Winter Set 13gr ra mắt độc quyền với phấn Nước Espoir Pro Tailor Be Glow Cushion New Class kèm lõi refill và quà tặng là bông mút trang điểm phiên bản anh đào và kem nền Be Glow Mini #21 Ivory 7ml\r\n\r\n\r\n\r\nPhấn nước Pro Tailor Be Glow Cushion New Class mỏng nhẹ mang lại làn da sáng tự nhiên, sống động nay đã xuất hiện trong diện mạo màu trắng sữa với phiên bản Golden Hour Edition. Cùng với quà tặng kèm là kem che khuyết điểm Taping Wear màu Ivory size mini và Xịt khóa nền 30ml, Phấn nước Pro Tailor Be Glow Cushion New Class Golden Hour Edition sẽ giúp bạn tạo ra làn da hoàn hảo hơn nữa.\r\n\r\n\r\n\r\n* Xuất xứ: Hàn Quốc\r\n\r\n* Trọng lượng: 13gX2ea\r\n\r\n* Tặng: lõi refill\r\n\r\n* Hạn sử dụng: 3 năm kể từ NSX\r\n\r\n\r\n\r\nHƯỚNG DẪN SỬ DỤNG\r\n\r\n➖Nhấn mút trang điểm để lấy một lượng phấn nước vừa đủ\r\n\r\n➖Apply lên các vùng da mặt và tán đều để lớp nền mỏng mịn, lâu trôi\r\n\r\n➖Sau đó phủ phấn Be Glow để giữ cho lớp trang điểm được bền màu và khô thoáng hơn \r\n\r\n*Bảo quản nơi khô ráo, tránh ánh nắng trực tiếp\r\n\r\n\r\n\r\n\r\n\r\nTHƯƠNG HIỆU ESPOIR\r\n\r\nEspoir là thương hiệu mỹ phẩm thuộc phân khúc cao cấp đến từ Hàn Quốc, thuộc sở hữu của tập đoàn Amore Pacific. Các sản phẩm từ Espoir luôn được yêu thích bởi chất lượng cao, giá cả phải chăng, hợp xu hướng mang đến cho người sử dụng sự tự tin, bứt phá khỏi mọi giới hạn của bản thân. \r\n\r\n#Espoir #cushion #cushionespoir #beglowcushion ', 545000.00),
(7, 'Phấn Nước Che Phủ Tự Nhiên L aneige Neo Cushion Matte/Glow', 1, '1. Công dụng, Thành phần/Công nghệ\r\n\r\nNeo Cushion Matte - Lớp Trang Điểm Siêu Mỏng Nhẹ, Lâu Trôi\r\n\r\nDành cho da dầu và da hỗn hợp thiên dầu, Neo Cushion Matte cho lớp nền siêu mỏng nhẹ, mịn lì, che phủ hoàn hảo lên đến 50 giờ. Hiệu ứng lâu trôi 99,99%, độ bám dính tăng cường gấp 1.5 lần, giữ lớp nền tươi tắn, bền màu suốt 50 giờ mà không cần dặm lại. Không để lại vết phấn trên điện thoại, sản phẩm còn chứa chiết xuất bạc hà kiềm dầu, giúp da mịn màng và được bảo vệ với 81.55% thành phần chăm sóc da.\r\n\r\n\r\n\r\nLight Fit - Siêu Mỏng Nhẹ, Tự Nhiên Không Tì Vết\r\n\r\nCông nghệ hòa quyện 2 bước của Neo Cushion tạo ra hạt phấn siêu mịn chỉ 0.17µm. Lớp nền trang điểm mỏng nhẹ, che phủ tối ưu, tệp vào da một cách tự nhiên, không tì vết, cho bạn tự tin suốt cả ngày dài. Đã đến lúc nói lời tạm biệt với lớp nền dày cộm và không thoải mái.\r\n\r\nLight On - Làn Da Rạng Rỡ Với Thành Phần Dưỡng Da\r\n\r\nKhông còn lo lắng về lớp nền khô hay mốc, công nghệ Neo Skin Booster™ của LANEIGE giúp bạn vừa có lớp trang điểm hoàn hảo, vừa dưỡng ẩm và chăm sóc da. Với Panthenol, chiết xuất hoa sen chống oxy hóa và Blue Hyaluronic Acid, làn da của bạn sẽ luôn được cấp ẩm và giữ ẩm. Trang điểm mà như không trang điểm, vừa đẹp vừa khỏe.\r\n\r\nNeo Dot - Trải Nghiệm Tiện Lợi Hoàn Toàn Mới\r\n\r\nNeo Dot lấy cảm hứng từ những bất tiện khi sử dụng phấn nước, giúp giữ chắc bông phấn, giải quyết mọi vấn đề trước đây. Không còn lo lắng về bông phấn rơi hay bị mất nữa!\r\n\r\n\r\n\r\n\r\n\r\n2. Hướng dẫn sử dụng\r\n\r\n\r\n\r\n- Phù hợp với mọi loại da, đặc biệt hiệu quả trên da dầu\r\n\r\n- Sử dụng bông phấn để lấy kem nền và phủ lên da, vừa phủ vừa táp nhẹ nhàng để phấn tệp vào da một cách dễ dàng\r\n\r\n- Bạn có thể táp lại bông phấn thêm lần nữa để lớp trang điểm thêm đậm nét hơn\r\n\r\n- Nếu như bạn ấn mạnh tay tới cỡ nào mà kem vẫn không tràn ra khỏi lõi thì tức là lõi phấn đã hết kem và bạn nên thay lõi phấn khác', 850000.00),
(8, 'Phấn Nước Bắt Sáng Espoir Be Glow Volume Cushion SPF42 PA+++ 13gr (Tặng Kèm Lõi Refill)', 1, 'Espoir Be Glow Volume Cushion\r\n\r\nLà thương hiệu hàng đầu trong xu hướng da sáng qua nhiều thế hệ, Espoir giới thiệu dòng sản phẩm phấn nước Be Glow mới \"thế hệ thứ 5\" với những bí quyết độc quyền, mang lại làn da rạng rỡ và hoàn hảo.\r\n\r\n\r\n\r\nTHÔNG TIN SẢN PHẨM:\r\n\r\n- Công nghệ Volume Glow mới giúp tối ưu hóa độ sáng, chứa thành phần làm sáng da MELASOLV và Glutathione được cấp bằng sáng chế bởi Amorepacific, làm cho các vùng da tiếp xúc với ánh sáng trở nên rực rỡ hơn.\r\n\r\n- Kết cấu phấn hoàn hảo được tạo ra sau 146,500 lần khuấy, Be Glow Volume Cushion giúp giữ cho làn da luôn trong suốt và rạng rỡ lâu dài.\r\n\r\n- Công thức còn bổ sung  Nước cấp ẩm thuần chay độc quyền, cung cấp độ ẩm và làm da căng mịn tự nhiên.\r\n\r\n- Tăng cường chức năng bảo vệ da và Cải thiện độ đàn hồi của da nhờ thành phần nguyên liệu có chứa PDRN từ thực vật và Peptide.\r\n\r\n\r\n\r\nHƯỚNG DẪN SỬ DỤNG\r\n\r\n- Nhấn mút trang điểm để lấy một lượng Be Glow Volume Cushion vừa đủ.\r\n\r\n- Apply lên các vùng da mặt và tán đều để lớp nền mỏng mịn, lâu trôi.\r\n\r\n* Bảo quản nơi khô ráo, tránh ánh nắng trực tiếp\r\n\r\n\r\n\r\n- Thương hiệu: Espoir\r\n\r\n- Xuất xứ: Hàn Quốc\r\n\r\n- HSD: 3 năm kể từ ngày sản xuất và 24 tháng sau khi mở.\r\n\r\n- Trọng lượng: 13gr x 2 + Foundation 15ml #IVORY hoặc Cushion Mini #IVORY\r\n\r\n\r\n\r\nTHƯƠNG HIỆU ESPOIR\r\n\r\nEspoir là thương hiệu mỹ phẩm thuộc phân khúc cao cấp đến từ Hàn Quốc, thuộc sở hữu của tập đoàn Amore Pacific. Các sản phẩm từ Espoir luôn được yêu thích bởi chất lượng cao, giá cả phải chăng, hợp xu hướng mang đến cho người sử dụng sự tự tin, bứt phá khỏi mọi giới hạn của bản thân. \r\n\r\n#Espoir #espoircushion #cushion #phannuocbatsang15', 569000.00),
(9, 'Phấn nước Che Phủ Toàn Diện, Dưỡng Ẩm Nhẹ Nhàng, Kiềm Dầu Mask Fit Red Cushion 18g ', 1, 'Phấn Nước TIRTIR Mask Fit Red Cushion Foundation - Lựa Chọn Che Phủ Hoàn Hảo Cho Mọi Làn Da\r\n\r\n\r\n\r\n📍 Giải Pháp ALL-in-ONE (tất cả trong một) Cho Làn Da Trong Veo\r\n\r\n\r\n\r\nTIRTIR Mask Fit Red Cushion Foundation cấp ẩm, chống nắng và che phủ hoàn hảo, mang đến một làn da căng mịn, không tì vết.\r\n\r\n\r\n\r\n📍  Ẩm Sâu, Không Gây Bí Da\r\n\r\n\r\n\r\nCông thức của phấn nước TIRTIR giúp dưỡng ẩm sâu, dưỡng da mà không gây nhờn rít hay bí tắc lỗ chân lông, mang lại làn da thoải mái và rạng rỡ. \r\n\r\n\r\n\r\n📍 Che Phủ Hoàn Hảo, Cảm Giác Nhẹ Nhàng\r\n\r\n\r\n\r\nCông thức siêu nhẹ nhàng và không gây nhờn giúp phấn nước TIRTIR thẩm thấu nhanh chóng, mang đến độ che phủ hoàn hảo cho các khuyết điểm như lỗ chân lông, vết đỏ và vết thâm.\r\n\r\n\r\n\r\n📍 Hiệu Ứng Lâu Trôi, Kiềm Dầu\r\n\r\n\r\n\r\nLớp nền lâu trôi giúp duy trì độ rạng rỡ tự nhiên cả ngày, kiềm dầu hiệu quả nhưng vẫn giữ được độ ẩm cần thiết cho da, mang lại hiệu ứng da thủy tinh đáng mơ ước.\r\n\r\n\r\n\r\n📍 Hiệu Ứng Da Thủy Tinh Tự Nhiên\r\n\r\n\r\n\r\nMang lại độ bóng rạng rỡ tức thì mà không cần trang điểm, giúp da căng mịnh như làn da thủy tinh tự nhiên. Hòa quyện với mọi tông da, mang lại cảm giác như làn da thật.\r\n\r\n\r\n\r\n\r\n\r\n💗 Hướng Dẫn Sử Dụng\r\n\r\n\r\n\r\nThoa đều phấn nước lên mặt bằng cách lướt nhẹ miếng bông phấn, sau đó vỗ nhẹ để sản phẩm thấm đều vào da.\r\n\r\n\r\n\r\n\r\n\r\n💗 Sản phẩm này sẽ là sự lựa chọn hoàn hảo nếu bạn:  \r\n\r\n\r\n\r\n- Muốn tìm kiếm lớp trang điểm nền có độ ẩm vừa đủ mà không gây bí da \r\n\r\n\r\n\r\n- Muốn che phủ lỗ chân lông và khuyết điểm một cách hoàn hảo\r\n\r\n\r\n\r\n- Tìm kiếm lớp trang điểm lâu trôi, bền màu cả ngày', 379000.00),
(10, 'Cushion - SKKN phát sáng mịn lì chính hãng 15g', 1, 'Xuất xứ: Hàn Quốc\r\nThương hiệu: SKKN\r\n\r\nCushion SKKN là dòng phấn nước cao cấp giúp che phủ hoàn hảo các khuyết điểm và duy trì lớp nền suốt cả ngày dài mà vẫn giữ cho làn da thoáng nhẹ và rạng rỡ. \r\n\r\nThiết kế:\r\nVỏ hộp sang trọng với gam màu trắng ngọc trai kết hợp logo SKKN dập nổi tạo cảm giác tinh tế, chuyên nghiệp. Mút cushion hình giọt nước giúp dễ dàng tán đều lớp nền đến từng góc nhỏ trên gương mặt.\r\n\r\nƯu điểm nổi bật:\r\n- Kết cấu phấn mỏng nhẹ, che phủ cao.\r\n- Không gây bí da, kiểm soát dầu nhờn tốt.\r\n- Lớp nền mịn lì, bám màu lâu và không xuống tông.\r\n- Có thành phần dưỡng giúp giữ ẩm cho da.', 430000.00),
(11, 'Màu Mắt 9 Ô 3CE Multi Eye Color Pallette Knotted Pink - Beach Muse- Over Take- Dry Bouquet- All Nigh', 2, 'MÔ TẢ SẢN PHẨM\r\nBảng phấn mắt nhiều màu 3CE Multi Eye Color Palette 9 ô nhiều màu sắc \r\nXuất xứ: Hàn Quốc\r\nThương hiệu: 3CE\r\n\r\nStylenanda Multi Eye Color Palette là bảng phấn mắt nằm trong bộ sưu tập Mood Recipe mới ra mắt của - một trong những thương hiệu mỹ phẩm đình đám của Hàn Quốc.\r\nBảng Phấn Mắt Multi Eye Color Palette có kết cấu phấn siêu mịn, không vón cục, không gây bết dính, không tạo cảm giác nặng nề trên mắt. Khả năng lên màu cực chuẩn và bám màu lâu trôi, nàng có thể yên tâm tỏa sáng với đôi mắt đẹp quyến rũ cả ngày dài.\r\nVới thiết kế thông minh cùng khả năng mix màu linh hoạt, cả 9 gam màu đều có thể kết hợp với nhau hài hòa mà không phải lãng phí một màu nào. Với nhiều tone màu hot trend bao gồm cả matte lẫn ánh nhũ lung linh giúp nàng dễ dàng kết hợp và trải nghiệm nhiều phong cách trang điểm đa dạng.\r\n- Thiết kế đơn giản, thanh lịch nhưng cực sang trọng. Chất phấn hoàn hảo với những hạt phấn li ti siêu nhỏ, mềm mịn, không gây cảm giác nặng nề khi apply lên mắt.\r\n- Phấn mắt 3CE Stylenanda Multi Eye Color Palette có khả năng lên màu cực tốt, bám màu lâu – lên đến 24 giờ đồng hồ. Bạn có thể thoải mái hoạt động làm việc cả ngày mà không cần dặm lại phấn.\r\n- Với thiết kế thông minh cùng khả năng mix màu linh hoạt, cả 9 gam màu đều có thể kết hợp với nhau hài hòa mà không phải lãng phí một màu nào\r\n#Dry Bouquet : Gồm 9 ô lì mang tone hồng đất chủ đạo\r\n#Smoother : Gồm 9 ô lì tone cam trầm ấm nhẹ nhàng\r\n#Overtake : Gồm 9 ô cả lì và nhũ mang tone hồng và cam thiên đất chủ đạo\r\n#Beach Muse : Gồm 9 ô cả lì và nhũ mang tone hồng chủ đạo\r\n\r\nHướng dẫn sử dụng:\r\n- Sử dụng kem lót mắt để phấn mắt bám lâu và lên màu rõ hơn.\r\n- Dùng cọ chuyên dụng đánh màu mắt từ giữa bầu mí mắt sang mí khoé mắt, dài xuống đuôi mắt. Sau đó tán đều màu mắt lên qua mí mắt và một lớp nhẹ dưới mi mắt để tạo điểm nhấn và chiều sâu cho mắt, bạn cần phủ một lớp phấn nâu theo khối chữ V ở đuôi mắt.\r\n- Có thể sử dụng một hoặc phối nhiều màu tùy thích để tạo nên độ đậm nhạt cho mắt', 650000.00),
(12, 'Bảng phấn mắt 6 ô Bbia Ready To Wear Eye Palette 5g( 8 màu) - Bbia Official Store', 2, 'Bảng Phấn Mắt Bbia Ready To Wear Eye Palette\r\n\r\nXuất Xứ: Hàn Quốc\r\n\r\nHạn Sử Dụng: 3 năm kể từ ngày sản xuất\r\n\r\nKhối Lượng: 5g\r\n\r\n\r\n\r\nCông Dụng:\r\n\r\nBảng phấn mắt Bbia Ready To Wear Eye Palette mang đến gam màu phù hợp để bạn bắt đầu một ngày mới đầy cảm hứng. Với sự kết hợp giữa các tông màu lì tự nhiên và các tông màu nhũ lấp lánh, bảng màu giúp tôn lên nét đẹp hoàn hảo cho đôi mắt. Chất phấn mịn màng, bám đều và lên màu chuẩn ngay từ lần đầu tiên, tạo cảm giác dễ chịu khi sử dụng.\r\n\r\n\r\n\r\nHướng Dẫn Sử Dụng:\r\n\r\nDùng ngón tay hoặc cọ trang điểm lấy một lượng phấn vừa đủ, thoa lên vùng mắt và tán nhẹ nhàng để tạo hiệu ứng màu sắc mong muốn.\r\n\r\n\r\n\r\nHướng Dẫn Bảo Quản:\r\n\r\nTránh ánh nắng trực tiếp và nhiệt độ cao.\r\n\r\nBảo quản sản phẩm ở nơi khô ráo, thoáng mát, và đậy kín nắp sau khi sử dụng để giữ phấn bền lâu.  ', 195000.00),
(13, 'Bảng Mắt Trái Tim 11 ô Peripera All Take Mood Like Palette', 2, 'Bảng Mắt Trái Tim 11 ô Peripera All Take Mood Like Palette màu 1 2 3 4\r\n\r\nThương hiệu: Peripera \r\n\r\nXuất xứ: Hàn Quốc \r\n\r\nBảng mắt trái tym keo lỳ .Ở ngoài xinh hơn trong hình rất nhiều luôn huhu\r\n\r\n3in1 tích hợp PHẤN MẮT + MÁ + HIGHLIGHT chỉ trong một bảng mắt 11 ô.\r\n\r\nĐiểm đặc biệt nhất nằm ở lõi trái timmm\r\nBảng mắt 2 bảng xinh xắn: ️\r\n\r\nBảng 01: #01 Prestige Pink - tone hồng ️\r\nBảng 02: #02 Peach Heaven -  tone cam\r\nBảng 03: #03 Honey Brown: Tone nâu ấm\r\nBảng 04: #04 Cool Blush - tone hồng pha ánh tím \r\nChất phấn có độ mềm tựa như bơ màu lên chuẩn đậm, đặc biệt là phần highlight chỉ cần một lượng nhỏ là lên màu siêu rõ luôn', 325000.00),
(14, 'Bảng phấn mắt Judydoll Highlight & Contour Palette 9g- Bảng phấn bắt sáng và tạo khối Tự nhiên Lâu t', 2, '👉Tên sản phẩm: Bảng tạo khối bắt sáng 4 ô Judydoll All-in-one bao gồm highlight nhũ và lì, tạo khối mũi và tạo khối góc cạnh 3D\r\n\r\n\r\n\r\n☘️Thông số kỹ thuật:\r\n\r\nXuất xứ: Trung Quốc\r\n\r\nNguồn hàng: Hàng chính hãng\r\n\r\nThời hạn sử dụng: 3 năm\r\n\r\nDung lượng: 9g\r\n\r\n\r\n\r\n✨Điểm nổi bật: \r\n\r\nBảng phấn đa năng/ đa chất phấn, mềm mịn, không bết, phân chia các ô chức năng chuẩn xác, dễ sử dụng. \r\n\r\n4 màu phấn thiết kế phù hợp với nước da và thói quen của người Châu Á. \r\n\r\nKhông bị trắng bệt, không loang lỗ, không bị bết màu, hiệu ứng tự nhiên không để lại vệt.\r\n\r\n\r\n\r\n☘️Thành phần: xem trên bao bì\r\n\r\n💓Cách bảo quản và cách sử dụng:\r\n\r\nCách bảo quản: Để nơi khô ráo thoáng mát, tránh xa tầm tay trẻ em\r\n\r\nCách sử dụng: xem chi tiết trong hình\r\n\r\n✨Tip: Tán màu bắt sáng lên sóng mũi và viền ngoài của hốc mắt. Tán màu tạo khối mũi dọc 2 bên sóng mũi.\r\n\r\n\r\n\r\n💓Giới thiệu thương hiệu:\r\n\r\nJudydoll là thương hiệu trang điểm dẫn đầu xu hướng màu sắc, kết hợp hoàn hảo phong cách cá nhân và nhu cầu trang điểm cơ bản hàng ngày.\r\n\r\nLấy màu sắc làm màu chủ đạo, chúng tôi tiếp tục duy trì sức mạnh sáng tạo ra những sản phẩm kinh điển và nhiệt huyết thể hiện cá tính. Judydoll sinh ra để dành cho cho các bạn trẻ năng động và yêu thích những điều mới mẻ, để bạn có thể dễ dàng khám phá mọi phong cách trang điểm mà bạn có thể tưởng tượng được.', 185000.00),
(15, 'FLOWER KNOWS Bảng Phấn Mắt BST Cupid 14g', 2, '\r\nThương Hiệu: flower know\r\n\r\nXuất Xứ:Trung Quốc\r\n\r\n5 kết hợp Matte & 2 Shimmers với nhiều kết cấu khác nhau \r\nĐáp ứng nhu cầu trang điểm đa dạng với tính linh hoạt thiết thực \r\nKết cấu mờ dạng bột ép \r\nPhấn mắt / Phấn má hồng / Bút đánh dấu Bột hình cầu + cấu trúc nhiều lớp Bám da, lâu trôi, mịn màng và dễ hòa trộn \r\nKết cấu sáng bóng khử nước ở nhiệt độ thấp Phấn mắt / Bút đánh dấu Độ bám dính và khả năng lan truyền vượt trội Ánh sáng rực rỡ như Satin \r\nKết cấu ngọc trai kem Điểm nổi bật dưới mắt / Bút đánh dấu Thân thiện với da và mềm mượt Ánh sáng lung linh dễ dàng với lượng bụi phóng xạ tối thiểu Các biến thể mát và ấm cho các kiểu dáng đa dạng \r\n#01 Coullee mật ong \r\n(Bảng màu bánh mì hạnh nhân) \r\n#S02 Nghịch ngợm của thần Cupid \r\n(Màu hồng lãng mạn) ', 155000.00),
(16, 'Bảng Phấn Mắt Dasique Mood Shadow Palette Collection 9 Ô & 20 Ô Thuần Chay', 2, '💄Bảng Mắt 9 và 20 Ô Dasique Mood Shadow Palette Color Atelier Collection Chất Phấn Mềm Mịn, Dễ Tán, Lâu Trôi\r\n\r\nTên thương hiệu: Dasique\r\n\r\nXuất xứ: Hàn Quốc\r\nCông dụng chính:\r\n\r\n– Bảng phấn mắt gồm 20 màu siêu xinh, vẫn giữ đúng kiểu dáng thanh lịch vốn có của Dasique nhưng dải màu được bảng phát triển rộng hơn để đa dạng các makeup look hơn.\r\n\r\n– Em này lại là một must have cho những makeup cầu kỳ và đầu tư thời gian hơn.\r\n\r\n– Kết cấu bột phấn nhuyễn mịn, dễ dàng tán đều trên mắt, bám màu nhanh.\r\n\r\n– Giữ màu lâu trong thời gian dài, lên màu rõ ngay từ lần chạm đầu tiên.\r\n\r\n– Rất thích hợp cho các chị em makeup artist vì tone màu đa số là hợp da của Châu Á\r\nHướng dẫn sử dụng:\r\n\r\nLấy một lượng vừa đủ bên trong bằng cọ hoặc tay. Rồi thoa đều cho đến khi lên được màu ưng ý.\r\n\r\n#phanmat #phanmatbatsang #bangmat #phanmat #eyeshadow #eyepalette #glitter #makeup #makeuplook #trangdiem #trangdiemchuyennghiep #Dasique #musthave #musttry #newcollection', 550000.00),
(17, 'Phấn Má Hồng Mịn Lì 3CE Face Blush 5.5g', 3, 'Giải mã hiện tượng \"kẹo bông ngọt ngào\" đến từ vị trí của má hồng 3CE. Lấy cảm hứng từ các sắc thái mùa xuân, em má hồng này sở hữu những sắc màu tươi tắn và nhẹ nhàng, lên màu chuẩn từ lần chạm đầu tiên. Với tone màu dễ ứng dụng với nhiều hoàn cảnh, em má hồng này thực sự là bảo bối của các tín đồ \"u mê\" má hồng khi ra đường ^^A. Màu sắc nhẹ nhàng\r\n\r\nB. Kết cấu lướt trên da mượt mà\r\n\r\nC. Bám màu tốt và không bị lem nhem\r\n\r\nD. Độ lên màu hoàn hảo\r\n\r\nE. Bột kiểm soát bã nhờn hút mồ hôi và dầu\r\n\r\nF. Chất son mướt không vón cục\r\n\r\nG. Lâu trôi suốt cả ngày\r\n\r\nH. Màu sắc tinh tế làm nổi bật tông da tự nhiên\r\n\r\n• ƯU ĐIỂM NỔI BẬT\r\n\r\nSản phẩm này sở hữu chất phấn nhẹ và xốp như mây. Cùng với các tone màu nịnh da phái đẹp, phấn má nhà 3CE hứa hẹn mang đến cho chị em một vẻ ngoài tươi sáng và tràn đầy sức sống.\r\n\r\n• HIỆU QUẢ SỬ DỤNG\r\n\r\nSản phẩm này sở hữu chất phấn nhẹ và xốp như mây. Cùng với các tone màu nịnh da phái đẹp, phấn má nhà 3CE hứa hẹn mang đến cho chị em một vẻ ngoài tươi sáng và tràn đầy sức sống.\r\n\r\n• HƯỚNG DẪN SỬ DỤNG\r\n\r\nBạn lấy một lượng sản phẩm bằng cọ và vỗ nhẹ cọ lên phần gò má.\r\n\r\n• THÔNG TIN THƯƠNG HIỆU\r\n\r\nStylenanda 3CE Trang điểm Má hồng phấn má 3CE Phấn má', 277000.00),
(18, 'Phấn má hồng dior cao cấp 4,4g,Màu má tươi mới,mềm mại suốt cả ngày', 3, 'Thời gian giao hàng từ 1-3 ngày cho đơn hàng trong nước \r\n5-7 ngày cho đơn hàng nước ngoài \r\nShop Khánh Vy Cosmetics\r\nCác màu:\r\n-001 Pink 4.4g Backstage Rosy Glow\r\n-003 Pearl\r\n-004 Coral 4.4g cam san hô\r\n-006 Berry 4.4g hồng tím quyến rũ\r\n-012 Rosewood 4.4g cánh hồng khô \r\n-015 Cherry 4.4g đỏ chery\r\n\r\nƯU ĐIỂM CỦA PHẤN:\r\n-Vỏ hộp phấn bóng đẹp,mướt,mịn,sang trọng.\r\n-Hạt phấn siêu mịn,dễ tán.\r\n-Màu má của bạn sẽ luôn tươi mới,mềm mại suốt cả ngày.\r\n\r\nHƯỚNG DẪN SỬ DỤNG:\r\n-Bước 1 : Xác định chính xác vị trí cần tán phấn.\r\n-Bước 2 : Dùng mút đánh má hồng nhẹ nhàng từ đỉnh gò má theo dần ra ngoài và hướng lên tai.\r\n-Bước 3 : Sau khi sử dụng xong,dùng cọ lớn tán đều trên toàn bộ gò má,để phấn tản đều.', 509000.00),
(19, 'Má Hồng FLOWER KNOWS Shell’s Jewel - Bộ Sưu Tập Mới', 3, 'Flower Knows – BST Shell’s Jewel Collection | Vẻ đẹp cổ tích từ đại dương\r\n\r\n\r\nThông tin sản phẩm:\r\nChiều dài: 6,48 cm | Độ dày: 1,96 cm\r\nKhối Lượng: 5g\r\nThương hiệu: Flower Knows\r\nSản Xuất: Trung Quốc\r\n\r\nKhám phá Shell’s Jewel Collection, bộ sưu tập mới nhất từ Flower Knows, lấy cảm hứng từ sắc ngọc trai, vỏ sò và đại dương huyền bí. Từng thiết kế là sự kết hợp tinh tế giữa nghệ thuật cổ điển châu Âu và vẻ đẹp lung linh của đá quý biển cả – như một viên ngọc được đánh bóng bởi sóng và thời gian.\r\n\r\n⚠️𝐋𝐔̛𝐔 𝐘́ : Khách mua hàng khi nhận hàng giúp shop quay lại VIDEO KHUI HÀNG để khi có vấn đề phát sinh shop sẽ hỗ trợ xử lí nhanh chóng nhất', 455000.00),
(20, 'Má Hồng Cushion Into You X POP Mart Air Cushion Blush Into You (3.2g) Phong cách Hàn Quốc', 3, '💟 Phấn má dạng cushion nhà Into You nhìn cưng lắm nè, chắc chắn nàng sẽ yêu ngay từ lần chạm đầu tiên!! Thiết kế hộp cushion nhỏ gọn, kèm theo bông mút tán siêu tiện. Chị em mình sẽ không sợ bị bẩn tay như khi cùng các loại má hồng kem đâu nha. \r\n\r\n+ CB01: Cam đất\r\n\r\n+ CB02: Hồng nude\r\n\r\n+ CB03: Cam san hô\r\n\r\n+ CB04: Hồng cam đào \r\n\r\n+ CB05 : Hồng lạnh\r\nSản phẩm mới được đồng thương hiệu với intoyou Bubble Mart! Nó không phải là một giấc mơ, phải không? Cái gì! Nó thực sự được đồng thương hiệu với Bubble Mart!! Thật dễ thương. intoyou Bubble Mart Dòng Air Lip Mud có màu sắc đẹp như vậy, hãy hét lên!!! Bùn rất mềm và có màu sáp khi bạn thi công. Khi mở ra, bạn sẽ thấy đôi môi nhỏ mờ mềm mại. Nó có một cảm giác nhẹ nhàng và thoáng mát, và nó có mùi giống như kẹo dẻo nho. Nó có mùi thơm. Phấn má hồng đệm khí mới này rất lớn! Nó rất dịu dàng. Kết cấu của kem nước rất tinh tế và trong mờ. Đó là loại mềm. Bông phấn đệm khí được làm từ da và rất dễ sử dụng!!! Thật dễ thương và thuận tiện khi đi chơi. bút kẻ mắt hai đầu Một đầu là bút kẻ mắt dạng gel mờ, đầu còn lại là bút kẻ mắt dạng lỏng dạng lê. ', 199000.00),
(21, 'Phấn Má Hồng Peripera Pure Blushed Sunshine Cheek Pastel Rạng Rỡ Lên Màu Chuẩn 4.2g - Mibebe', 3, 'Phấn Má Hồng Peripera Pure Blushed Sunshine Cheek Pastel Rạng Rỡ Lên Màu Chuẩn 4.2g - Mibebe\r\n\r\n\r\n\r\nXuất xứ: Hàn Quốc\r\n\r\nTrọng lượng: 4.2g\r\n\r\nThương Hiệu : Peripera\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n🌿🌿🌿 ƯU ĐIỂM VƯỢT TRỘI \r\n\r\n✔ Hộp phấn to tròn, trên mặt phấn được khắc chữ vô cùng trendy.\r\n\r\n✔ Chất phấn mịn,dễ bám trên da, ko rơi hạt phấn quá nhiều.\r\n\r\n✔ Khả năng bám màu tốt và lâu trôi.\r\n\r\n✔ Có khả năng hỗ trợ kiềm dầu và mồ hôi.\r\n\r\n✔ Công thức hạt phấn mịn màng dễ tán.\r\n\r\n\r\n\r\n\r\n\r\n🌿🌿🌿Lưu ý khi sử dụng:\r\n\r\n🌿 Nếu bạn gặp các bất kỳ tác dụng phụ nào khác trong hoặc sau khi sử dụng, vui lòng tạm ngừng sử dụng và hỏi ý kiến bác sĩ.\r\n\r\n🌿 Không sử dụng sản phẩm trên vết thương hoặc bất kỳ vùng da nào nhạy cảm. \r\n\r\n🌿 Để xa tầm tay trẻ em. \r\n\r\n🌿 Tránh ánh nắng trực tiếp.\r\n\r\n#mahong #phanmahong #makem #blush\r\n\r\n#blush #phanma #mahongperipera #periperaink #peripera #ink #mahong\r\n\r\n', 129000.00),
(22, 'Má hồng kem CHÍNH HÃNG đa năng RED CHAMBER đánh má,môi,mắt 3 trong 1 tiện lợi,bền màu mỏng nhẹ ', 3, 'Má hồng RED CHAMBER Chính Hãng Dạng Kem đa năng Son Má hồng Trang Điểm mắt HARUKI Multi-Purpose Cream 1 hộp\r\n\r\n\r\n❖ ĐỐI TƯỢNG SỬ DỤNG:\r\n\r\n- An toàn với mọi loại da:\r\n- Không cồn\r\n- Không chất bảo quản\r\n- Không dầu khoáng\r\n- Không chứa phẩm màu\r\n- Sử Dụng được cho cả tín đồ ăn chay\r\n- Không thử nghiệm trên động vật\r\n\r\n\r\n❖ QUY TRÌNH XÁC NHẬN ĐƠN HÀNG:\r\n\r\n- Khi nhận hàng bạn vui lòng quay clip lại trước khi mở hộp và kiểm tra số lượng để đối chứng với shop nếu muốn chắc chắn về vấn đề thiếu mất sản phẩm.\r\n\r\n- Nếu bạn có thắc mắc vui lòng Inbox trực tiếp cho shop để được hỗ trợ và tư vấn trong thời gian sớm nhất.\r\n\r\n❖ HOA.STUDIO CAM KẾT:\r\n\r\n- Các sản phẩm được nhập khẩu chính hãng, đạt tiêu chuẩn về chất lượng và an toàn.\r\n\r\n- Luôn sẵn sàng giải đáp mọi thắc mắc về sản phẩm cũng như dịch vụ của shop, xin quý khách hãy CHAT NGAY với shop để được tư vấn và hỗ trợ. \r\n\r\n- Hỗ trợ đổi trả sản phẩm theo chính sách của Shopee\r\n\r\nHOA.STUDIO xin cảm ơn quý khách đã tin tưởng và sử dụng sản phẩm của shop. Shop sẽ không ngừng cải tiến, mang lại những dòng sản phẩm và dịch vụ tốt nhất đến tay khách hàng! ❤️', 310000.00),
(23, 'MÁ HỒNG HIGHLIGHT DẠNG VIÊN ROMAND', 3, 'Thương hiệu: Romand\r\nXuất xứ thương hiệu: Hàn Quốc\r\nSản xuất tại: Hàn Quốc\r\n\r\n\r\nLà phấn má hồng trong giới làm đẹp chuyên nghiệp tại Hàn Quốc, giúp mang lại đôi gò má hồng hào và gương mặt thêm rạng rỡ, tươi sáng một cách nhanh chóng và hoàn hảo nhất\r\n- Phấn má Hồng Romand được thiết kế theo dạng hình tròn với vỏ ngoài là sự phối hợp giữa tone màu trùng với tone màu phấn bên trong cùng với bề mặt vỏ trong suốt giúp các nàng có thể dễ dàng tìm được tone màu thích hợp, ưng ý cho lớp make up thêm hoàn hảo\r\n- Phấn có kết cấu là những hạt cực mịn, tệp nhanh vào da và tạo nên hiệu ứng giúp che phủ lỗ chân lông, cho da mịn màng lên trông thấy.\r\n- Không vón cục, hấp thụ mồ hôi và bã nhờn tốt khi lên da rất mượt mà\r\n- Ưu điểm giữ hiệu ứng cho lớp make up trong thời gian dài.\r\n', 310000.00),
(24, 'Má hồng dạng phấn YSL Make Me Blush 24H Buildable Powder Blush 5gram', 3, '- Phấn má hồng YSL Make Me Blush đã tạo nên xu hướng mới trong giới làm đẹp với thiết kế nhỏ gọn như hộp mini cushion với nhiều màu sắc đẹp lạ vừa mở bán. \r\n\r\n\r\n\r\n- Phấn mịn nhẹ như lụa ôm lấy đôi gò má một cách êm dịu, tạo hiệu ứng Light Veil giúp che phủ khuyết điểm như lỗ chân lông và vùng da không đều màu, mang lại đôi má ửng hồng tự nhiên đầy sức sống. \r\n\r\n\r\n\r\n- Thành phần chứa nước hoa hồng và squalane giúp giữ ẩm cho làn da của bạn trong thời gian dài, ngay cả khi đó là phấn má hồng dạng bột\r\n\r\n\r\n\r\nTrọng lượng : 6g\r\n\r\n\r\n\r\n Shop không nhận đổi trả trong trường hợp : \r\n\r\n•  Sản phẩm khách đã gỡ tem, seal và đã sử dụng.\r\n\r\n•  Sản phẩm không giống màu, không hợp, khách nên tìm hiểu kỹ thông tin thành phần, màu sắc trước khi đặt hàng ạ.', 1109000.00),
(25, 'Son Kem Lì Hàn Quốc, Lên Màu Siêu Chuẩn Bbia Last Velvet Lip Tint 5g Fulll Version 5g', 4, 'MÔ TẢ SẢN PHẨM\r\nSon kem BBIA Last Velvet Lip Tint Full màu\r\n\r\nXuất xứ : Hàn Quốc..\r\n\r\n* Thành Phần Chính Và Công Dụng:\r\n- Son kem lỳ Bbia Last Velvet Lip Tint Version 5 là dòng son lỳ với độ bám dính cực cao, hút vào môi bạn như nam châm và lên màu rõ ràng chỉ sau 1 lần thoa.\r\n- Độ bám dính cao, màu sắc giữ trên môi từ 6-8 tiếng .\r\n- Với khả năng phủ màu vượt trội, son sẽ lưu trên môi bạn cả ngày dài như được xăm lên.\r\n- Những hạt nhỏ liti như bột sẽ che lấp khuyết điểm hoàn hảo và mang lại một đôi môi mềm mịn, nhạy cảm như được phủ 1 lớp nhung.\r\n*HDSD: Thoa son nhẹ nhàng đều khắp làn môi cho đến khi hài lòng với màu sắc. Có thể sử dụng son Black Rouge để thoa lòng môi, khiến khuôn mặt bạn dịu dàng, duyên dáng hơn.\r\n*Hướng dẫn bảo quản: Tránh dùng chung son, tránh để son nơi nắng nóng, nhiệt độ cao, không để son trong tủ lạnh, hạn chế làm rơi son và đậy nắp kín sau khi dùng.\r\n*Hạn sử dụng: Thời hạn 2 năm kể từ ngày sản xuất\r\n', 199000.00),
(26, 'SON DƯỠNG DIOR MAXIMIZER 6ML UNBOX - TẶNG KÈM TÚI HỘP ', 4, 'Thương hiệu: Dior\r\n\r\nXuất xứ: Pháp\r\n\r\nHạn sử dụng: 2 năm\r\n\r\n\r\n\r\n----------------------------------------------------------------------------------------------------------\r\n\r\n- BẢO QUẢN NƠI KHÔ RÁO, TRÁNH ÁNH NẮNG TRỰC TIẾP\r\n\r\n- CHỈ SỬ DỤNG NGOÀI DA, TRÁNH TIẾP XÚC TRỰC TIẾP VỚI MẮT, NẾU TIẾP XÚC CẦN RỬA SẠCH NGAY VỚI NƯỚC.\r\n\r\n- NGƯNG SỬ DỤNG VÀ THAM KHẢO Ý KIẾN BÁC SĨ NẾU CÓ DẤU HIỆU BẤT THƯỜNG XẢY RA.\r\n\r\n- TRÁNH XA TẦM TAY TRẺ EM.\r\n\r\n- SẢN PHẨM NÀY KHÔNG PHẢI LÀ TH.UỐC, KHÔNG CÓ TÁC DỤNG THAY THẾ TH.UỐC CHỮA BỆNH.\r\n\r\n- HIỆU QUẢ CỦA SẢN PHẨM PHỤ THUỘC VÀO CƠ ĐỊA TỪNG NGƯỜI.\r\n\r\n- HÀNG SẼ GIAO NGẪU NHIÊN, SẢN PHẨM TÙY LÔ CÓ THỂ CÓ HỘP HOẶC KHÔNG, TUY NHIÊN VẪN CAM KẾT HÀNG CHUẨN AUTH 100%\r\n\r\n- BAO BÌ VÀ KIỂU DÁNG SẢN PHẨM CÓ THỂ THAY ĐỔI TÙY TỪNG ĐỢT NHẬP HÀNG\r\n\r\n\r\n\r\n- Shop cam kết phân phối sản phẩm 100% chuẩn Auth. Hỗ trợ đổi trả trong vòng 07 ngày nếu sản phẩm gặp các vấn đề lỗi từ phía nhà sản xuất, sản phẩm gặp vấn đề trong quá trình vận chuyển.\r\n\r\n- Sản phẩm đổi trả phải còn nguyên hộp, mác niêm phong, chưa qua sử dụng.\r\n\r\n- Khách hàng nên quay lại quá trình mở kiện hàng vận chuyển để thuận tiện hơn trong quá trình đổi, trả hàng nếu có sai sót ở sản phẩm.\r\n\r\n- Có video quay lại quá trình mở hộp và kiểm tra từng sản phẩm. Video rõ ràng, thấy được gói hàng còn nguyên vẹn, còn niêm phong.\r\n\r\n- Khi đổi trả sản phẩm, nếu không phải lỗi sản phẩm hay shop giao sai sản phẩm, quý khách vui lòng trả phí vận chuyển.\r\n\r\n\r\n\r\nLưu ý: Nếu thiếu một trong các điều kiện trên, shop từ chối giải quyết khiếu nại. Thời gian khiếu nại tối đa 7 ngày từ lúc nhận được hàng.', 599000.00),
(27, 'Flower Knows Moonlight Nàng Tiên Cá Series Trang Sức Son Bóng / Moonlight Nàng Tiên Cá Series Trang ', 4, '🥰 Hàng chính hãng có sẵn 💕\r\n\r\nSon bóng Flower Knows Mermaid - Son bóng Tiên Cá dạng lỏng 3.5ml 🧜🏻‍♀️\r\n\r\nVới thiết kế như 1 chai đá quý cắt hình bát giác tạo ra thần thoại của nàng tiên cá\r\n\r\nSon bóng dưỡng ẩm kèm kết cấu son nhẹ nhàng, màu lên sẽ hơi nhạt tuỳ theo từng cá nhân\r\n\r\nThông tin sản phẩm:\r\n\r\nChiều dài: 2.3cm | Chiều rộng: 2.3cm | Độ dày: 10cm\r\nHương thơm: Hương táo xanh\r\nNội dung tịnh: 3.5ml\r\nThương hiệu: Flower Knows', 345000.00),
(28, 'Son kem bùn FWEE Lip & Cheek Blurry Pudding Pot, Keyring, Cọ, Túi 5.5g', 4, 'PHẨM\r\n💕Một nồi bánh Pudding + một bộ móc khóa 💕\r\n\r\n(* Màu KEYCHAIN ngẫu nhiên)\r\n\r\n\r\n\r\n🚨 Cẩn thận với sự bắt chước\r\n\r\n< Nếu nó không phải là sản phẩm chính thức của cửa hàng, nó có thể không phải là hàng thật. >\r\n\r\n\r\n\r\n🧁[Nồi bánh Pudding fwee Lip & Cheek Blurry] \r\n\r\nMột kết cấu bánh pudding mịn có thể pha trộn và xây dựng dễ dàng làm mờ và mịn môi của bạn! \r\n\r\nTạo cho đôi môi và má của bạn một vẻ ngoài mờ ảo, da lộn chỉ bằng đầu ngón tay của bạn.\r\n\r\n\r\n\r\n#Pudding Làm mờ \r\n\r\nKết cấu mềm mại và mượt mà mới \r\n\r\n\r\n\r\n#Blur Nhòe\r\n\r\nÁp dụng dễ dàng trên môi và má, tạo ra một cái nhìn phác thảo, liền mạch trên môi và má một cách tự nhiên.\r\n\r\n\r\n\r\n#Blurring Trộn\r\n\r\nTrộn và kết hợp, Tạo combo môi của riêng bạn từ 30 màu sắc của những khoảnh khắc độc đáo.\r\n\r\nVí dụ. (My + Seventeen), (Ồ! + Crush), (Feel ’ n + Fav), (Baddie + Boss)\r\n\r\n\r\n\r\n🧁 [Cảm nhận khoảnh khắc của bạn - 7 khoảnh khắc màu sắc]\r\n💙 Khoảnh khắc mát mẻ (Mát mẻ)\r\n💛 Chỉ tôi Khoảnh khắc (Khỏa thân)\r\n\r\n\r\n🧡 Khoảnh khắc Bestie (San hô)\r\n🩷 Khoảnh khắc má hồng (Hồng)\r\n❤️ Khoảnh khắc màu đỏ (Đỏ) \r\n💜 Khoảnh khắc trái tim lạnh lùng (Mauve)\r\n🤎 Khoảnh khắc mờ dần (Hoa hồng)\r\n🧁 Cách - Trang điểm một ngón tay', 420000.00),
(29, 'Son Kem Tint LILYBYRED Bloody Liar Coating Tint', 4, 'Son Kem Bóng Lì Lilybyred Bloody Liar Coating Tint là dòng son bóng có lớp tint màu, tạo hiệu ứng cho đôi môi căng mọng và rạng rỡ. Độ bóng trong veo, màu sắc trẻ trung và độ bám màu cao, đây chắc chắn sẽ là thỏi son hot hit trong làng make up thời gian tới\r\n\r\n \r\n\r\nVới kết cấu đặc trưng là lỏng và mỏng nhẹ, son Tint bóng Lilybyred lên môi mượt mà, làm cho đôi môi trở nên căng mướt và mềm mại chưa từng có. Sản phẩm chứa nhiều thành phần dưỡng, đặc biệt là tinh dầu jojoba, giúp nuôi dưỡng bờ môi, ngăn chặn tình trạng khô bong tróc.\r\n\r\n\r\n\r\nƯu điểm:\r\n\r\n+ Kết cấu lỏng nhẹ: Kết cấu lỏng nhẹ tạo cảm giác thoải mái khi sử dụng, không gây cảm giác nặng môi.\r\n\r\n+ Bám màu xuất sắc: Son có khả năng bám màu tốt, giữ cho màu sắc tươi tắn và rạng ngời suốt thời gian dài.\r\n\r\n+ Màu sắc đa dạng: Cung cấp nhiều gam màu đa dạng để phù hợp với nhiều phong cách và sự kiện khác nhau.\r\n\r\n+ Hương thơm trái cây dịu ngọt: Mùi hương trái cây dịu ngọt tạo thêm trải nghiệm thú vị khi sử dụng.\r\n\r\nĐộ bóng tự nhiên: Tạo lớp bóng tự nhiên khi son lên môi, giúp đôi môi trông căng mướt và đầy sức sống.\r\n\r\nHƯỚNG DẪN SỬ DỤNG\r\n\r\nMở son, dùng cọ son đánh đều lên toàn bộ môi, tránh đánh son tràn viền môi\r\n\r\nĐợi son khô dần và không bị xê dịch trên môi Có thể chồng lớp son để có màu như ý muốn', 199000.00),
(30, 'Son MAC Retro Matte Lipstick Full size 3gr dưỡng ẩm bền màu lâu trôi', 4, 'Son 𝐭𝐡ỏ𝐢 𝙈𝘼𝘾  Retro Matte Lipstick Full size 3gr dưỡng ẩm bền màu lâu trôi\r\n\r\nThành phần \r\n\r\nCaprylic/Capric Triglyceride: Giúp làm mềm môi và ngăn chặn quá trình oxi hóa có thể gây hại cho da.\r\n\r\n\r\n\r\nSilica: Được sử dụng để ngăn chặn tác động của tia UV có thể gây hại cho da môi. Ngoài ra, Silica còn có khả năng cấp ẩm, giữ nước và ngăn chặn tình trạng khô môi.\r\n\r\n\r\n\r\nTocopherol: Thành phần này giúp ngăn ngừa tình trạng thâm môi, giúp duy trì làn môi khỏe mạnh.\r\n\r\n\r\n\r\nRicinus Communis (Castor) Seed Oil: Dầu hạt castor giúp tạo độ bóng cao nhất cho da môi và đồng thời có khả năng làm mềm môi.\r\n\r\n\r\n\r\nIsononyl Isononanoate: Là thành phần chính tạo nên chất son, giúp son trở nên mềm mại và mịn màng.\r\n\r\n\r\n\r\nVanillin: Tạo mùi thơm dễ chịu và ngọt ngào cho sản phẩm.\r\n\r\n\r\n\r\nParafin: Là thành phần giúp tạo ra một lớp bảo vệ trên da, ngăn chặn sự mất nước, đồng thời giúp làm mềm da và giữ ẩm, Tăng khả năng kết hợp tốt với các hoạt chất khác trong sản phẩm.\r\n\r\n👉  [Nhẹ và Mịn] Đầu cọ cong sang trọng với chất son như đất sét mềm độc đáo mang đến cho đôi môi của bạn cảm giác nhẹ và mịn màng như lụa mà bạn chưa từng từng thấy ở sản phẩm khác. Công thức chứa sắc tố cao sẽ để lại màu sắc đều trên môi của bạn và giữ lớp son lâu trôi.\r\n\r\n👉  [Siêu chống thấm] Cảm giác như đất sét mới, không lem trong nước, siêu chống thấm nước. Chỉ phai màu một chút, nhưng màu sắc sẽ lưu lại trên môi của bạn mãi. \r\n\r\n 👉 [Son có thể dùng cho môi và má] Lớp trang điểm dạng sương mềm không chỉ có thể sử dụng trên môi mà còn trên khuôn mặt của bạn, mang lại cảm giác nữ tính tự nhiên cho khuôn mặt của bạn.\r\n\r\n2. Đặc điểm nổi bật:\r\n\r\n\r\n\r\n- Sử dụng công nghệ mới tạo nên lớp son mỏng nhẹ nhưng vẫn đủ độ căng mọng, giúp môi mềm và thoải mái trong nhiều giờ. \r\n\r\n\r\n\r\n- Chất son mịn mượt, không vón cục hay bết dính, phủ đều môi chỉ với 1 lượng nhỏ.\r\n\r\n\r\n\r\n- Son lên chuẩn màu chỉ sau 1 lần chạm, khả năng bền màu và chống ma sát cao, hạn chế lem trôi khi ăn uống bữa ăn nhẹ. \r\n\r\n\r\n\r\n- Thiết kế thân son sang trọng, Nhỏ gọn dễ dàng mang đi bên mình.\r\n\r\n\r\n\r\n- Bảng màu son kem lì gây ấn tượng bởi các tone son lạ mắt và ứng dụng được với nhiều phong cách.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n3. Hướng dẫn sử dụng\r\n\r\n\r\n\r\n- Bước 1: Dùng cọ tán đều và mỏng son kem màu. Chờ son ổn định trên môi từ 3 - 5 phút (không bặm hoặc miết môi).\r\n\r\n\r\n\r\n- Bước 2:  Phủ gel khóa màu ở đầu còn lại để tạo hiệu ứng căng bóng và bảo vệ màu lâu trôi.\r\n\r\n', 459000.00),
(31, 'Son Tint Bóng, Siêu Lì, Căng Mọng Môi Hàn Quốc Romand Juicy Lasting Tint', 4, 'on Tint Bóng, Siêu Lì, Căng Mọng Môi Hàn Quốc Romand Juicy Lasting Tint\r\n\r\n\r\n\r\n• Xuất xứ thương hiệu: Hàn Quốc\r\n\r\n• Thương hiệu: Romand\r\n\r\n• Dung tích: 5.5g / Màu 08 Aple Brown: 5.3g hoặc 5.5g (Vỏ cũ)\r\n\r\nSon The Juicy Lasting (NEW): 3.5g (Vỏ mới)\r\n\r\n\r\n\r\n*** Thế giới Skinfood là đại lý phân phối chính thức Romand tại Việt Nam ***\r\n\r\n\r\n\r\nTHÔNG TIN CHI TIẾT\r\n\r\n- Đặc trưng:\r\n\r\n- Đầu cọ son vát nhẹ giúp cho việc lấy son dễ dàng hơn, tránh vây son bên ngoài\r\n\r\n- Kết cấu son dạng tint bóng khi lướt trên môi mang cảm giác tươi mát, không bị dính môi rất dễ chịu\r\n\r\n- Vì là son tint nên có độ bám màu cao, giữ màu lâu mà không gây cảm giác nặng môi\r\n\r\n- Lớp stain môi tạo cho đôi môi cảm giác căng mọng, đầy đặn quyến rũ dễ thương\r\n\r\n\r\n\r\nSon Tint Lì Romand X Inapsquare Juicy Lasting Tint #25 Bare Grape 5.5g – Màu beige ánh hồng\r\n\r\n- Thiết kế: Phiên bản này có thiết kế bao bì bắt mắt, độc đáo với sắc đen cuốn hút cùng họa tiết của nhà Inapsquare mang đến một giao diện hoàn toàn mới.\r\n\r\n- Đầu cọ son vát nhẹ giúp cho việc lấy son dễ dàng hơn, tránh vây son bên ngoài \r\n\r\n- Kết cấu son dạng tint bóng khi lướt trên môi mang cảm giác tươi mát, không bị dính môi rất dễ chịu \r\n• Hướng dẫn sử dụng: Nhúng đầu cọ vào son và gạt nhẹ vào phần miệng/ lọ cây son để lấy được lượng son vừa đủ dùng. Chấm son vào lòng môi trên và dưới, sau đó tán đều chất son qua hai bên tái và phải bằng đầu cọ hoặc tay không để tạo hiệu ứng 3D hoàn hảo cho môi\r\n\r\n\r\n\r\n• Hạn sử dụng: 3 năm kể từ ngày sản xuất.NSX xem trên bao bì \r\n\r\n', 171000.00),
(32, 'Son dưỡng môi NARS Afterglow Lip Balm 3g', 4, 'Nars ứng dụng công nghệ Mono Hydrating Complex vào việc tạo ra các hạt giữ ẩm giúp tối đa hóa khả năng cấp nước và khóa ẩm trên môi. Chất son dưỡng mỏng nhẹ còn đồng thời được bổ sung các chất chống oxy hóa giúp bảo vệ đôi môi tối đa.\r\n\r\nThỏi son lướt mịn mượt và dàn trải đều trên môi chỉ với một lần chạm son. Công thức có chứa dầu đơn giúp cấp nước lâu dài, làm môi mềm mại tức thì. Các dưỡng chất nhẹ nhàng nuôi dưỡng giúp đôi môi luôn căng mọng, ngậm nước suốt 4 – 5 giờ đồng hồ.\r\n\r\nDòng son dưỡng này không hề chứa cồn hay chất tạo mùi nên sẽ thích hợp dùng cho cả những đôi môi nhạy cảm nhất.', 600000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_url` text DEFAULT NULL,
  `is_primary` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image_url`, `is_primary`) VALUES
(4, 1, '../images/products/cushion/dr1.jpg', b'1'),
(6, 1, '../images/products/cushion/dr2.jpg', b'0'),
(7, 1, '../images/products/cushion/dr3.jpg', b'0'),
(8, 1, '../images/products/cushion/dr4.jpg', b'0'),
(9, 10, '../images/products/cushion/sk1.jpg', b'1'),
(10, 10, '../images/products/cushion/sk2.jpg\r\n', b'0'),
(11, 10, '../images/products/cushion/sk3.jpg', b'0'),
(12, 10, '../images/products/cushion/sk4.jpg', b'0'),
(13, 5, '../images/products/cushion/ce1.jpg', b'1'),
(14, 5, '../images/products/cushion/ce2.jpg', b'0'),
(15, 5, '../images/products/cushion/ce3.jpg', b'0'),
(16, 5, '../images/products/cushion/ce4.jpg', b'0'),
(17, 4, '../images/products/cushion/ap1.jpg', b'1'),
(18, 4, '../images/products/cushion/ap2.jpg', b'0'),
(19, 4, '../images/products/cushion/ap3.jpg', b'0'),
(20, 4, '../images/products/cushion/ap5.jpg', b'0'),
(21, 8, '../images/products/cushion/po1.jpg', b'1'),
(22, 8, '../images/products/cushion/po2.jpg', b'0'),
(23, 8, '../images/products/cushion/po3.jpg', b'0'),
(24, 8, '../images/products/cushion/po4.jpg', b'0'),
(25, 6, '../images/products/cushion/ep1.jpg', b'1'),
(26, 6, '../images/products/cushion/ep2.jpg', b'0'),
(27, 6, '../images/products/cushion/ep3.jpg', b'0'),
(28, 6, '../images/products/cushion/ep4.jpg', b'0'),
(29, 7, '../images/products/cushion/lg1.jpg', b'1'),
(30, 7, '../images/products/cushion/lg2.jpg', b'0'),
(31, 7, '../images/products/cushion/lg3.jpg', b'0'),
(32, 7, '../images/products/cushion/lg4.jpg', b'0'),
(33, 9, '../images/products/cushion/tt1.jpg', b'1'),
(34, 9, '../images/products/cushion/tt2.jpg', b'0'),
(35, 9, '../images/products/cushion/tt3.jpg', b'0'),
(36, 9, '../images/products/cushion/tt4.jpg', b'0'),
(37, 2, '../images/products/eyeshadow/rm1.jpg', b'1'),
(38, 2, '../images/products/eyeshadow/rm2.jpg', b'0'),
(39, 2, '../images/products/eyeshadow/rm3.jpg', b'0'),
(40, 2, '../images/products/eyeshadow/rm4.jpg', b'0'),
(42, 3, '../images/products/eyeshadow/ra1.jpg', b'1'),
(44, 3, '../images/products/eyeshadow/ra2.jpg', b'0'),
(45, 3, '../images/products/eyeshadow/ra3.jpg', b'0'),
(46, 3, '../images/products/eyeshadow/ra4.jpg', b'0'),
(47, 11, '../images/products/eyeshadow/ce1.jpg', b'1'),
(48, 11, '../images/products/eyeshadow/ce2.jpg', b'0'),
(49, 11, '../images/products/eyeshadow/ce3.jpg', b'0'),
(50, 11, '../images/products/eyeshadow/ce4.jpg', b'0'),
(51, 12, '../images/products/eyeshadow/mt1.jpg', b'1'),
(52, 12, '../images/products/eyeshadow/mt2.jpg', b'0'),
(53, 12, '../images/products/eyeshadow/mt3.jpg', b'0'),
(54, 12, '../images/products/eyeshadow/mt4.jpg', b'0'),
(55, 13, '../images/products/eyeshadow/pr1.jpg', b'1'),
(56, 13, '../images/products/eyeshadow/pr2.jpg', b'0'),
(57, 13, '../images/products/eyeshadow/pr3.jpg', b'0'),
(58, 13, '../images/products/eyeshadow/pr4.jpg', b'0'),
(59, 14, '../images/products/eyeshadow/jd1.jpg', b'1'),
(60, 14, '../images/products/eyeshadow/jd2.jpg', b'0'),
(61, 14, '../images/products/eyeshadow/jd3.jpg', b'0'),
(62, 14, '../images/products/eyeshadow/jd4.jpg', b'0'),
(63, 15, '../images/products/eyeshadow/fl1.jpg', b'1'),
(64, 15, '../images/products/eyeshadow/fl2.jpg', b'0'),
(65, 15, '../images/products/eyeshadow/fl3.jpg', b'0'),
(66, 15, '../images/products/eyeshadow/fl4.jpg', b'0'),
(67, 16, '../images/products/eyeshadow/dq1.jpg', b'1'),
(68, 16, '../images/products/eyeshadow/dq2.jpg', b'0'),
(69, 16, '../images/products/eyeshadow/dq3.jpg', b'0'),
(70, 16, '../images/products/eyeshadow/dq4.jpg', b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'huongnt', 'huongnt06022005@gmail.com', 'huong123', 'admin'),
(2, 'yenhai', 'hungyenn044@gmail.com', 'yen123', 'admin'),
(3, 'user1', 'abc1234user1@gmail.com', '123456', 'user'),
(4, 'user3', 'background@gmail.com', '123456', 'user'),
(5, 'yen123', 'yen123@gmail.com', '$2y$10$WuFhdc3UNDy1we7kjFhQHuNdmPu6PONO6FsfbNLftPMglbTrI5otS', 'user'),
(6, 'abc123', 'abc1234user@gmail.com', '123456', 'user'),
(7, 'bap1', 'acb1234bap1@gmail.com', '123456', 'user'),
(8, 'chau123', 'chau123456@gmail.com', '123456', 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_category_product` (`category_id`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_pd_pdimage` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_category_product` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `FK_pd_pdimage` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
