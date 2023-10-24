-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2023 lúc 02:26 PM
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
-- Cơ sở dữ liệu: `shopfb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Tên trò chơi',
  `description` text DEFAULT NULL COMMENT 'Mô tả tài khoản',
  `image_url` varchar(200) NOT NULL,
  `quantity_available` int(11) NOT NULL COMMENT 'Số lượng có sẵn',
  `original_price` decimal(10,2) NOT NULL COMMENT 'Giá gốc',
  `discounted_price` decimal(10,2) NOT NULL COMMENT 'Giá giảm',
  `min_friends_count` int(11) DEFAULT NULL COMMENT 'Số bạn bè tối thiểu',
  `max_friends_count` int(11) DEFAULT NULL COMMENT 'Số bạn bè tối đa',
  `country` varchar(255) DEFAULT NULL COMMENT 'Quốc gia',
  `xmdt_status` varchar(50) DEFAULT NULL COMMENT 'Trạng thái XMDT',
  `backup_available` tinyint(1) DEFAULT NULL COMMENT 'Backup có sẵn',
  `twofa_available` tinyint(1) DEFAULT NULL COMMENT '2FA có sẵn',
  `email_available` tinyint(1) DEFAULT NULL COMMENT 'Email có sẵn',
  `min_created_year` int(11) DEFAULT NULL COMMENT 'Năm tạo tối thiểu',
  `max_created_year` int(11) DEFAULT NULL COMMENT 'Năm tạo tối đa',
  `cp_via_email` tinyint(1) DEFAULT NULL COMMENT 'Có CP qua email',
  `account_type_id` int(11) DEFAULT NULL COMMENT 'ID loại tài khoản'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`account_id`, `name`, `description`, `image_url`, `quantity_available`, `original_price`, `discounted_price`, `min_friends_count`, `max_friends_count`, `country`, `xmdt_status`, `backup_available`, `twofa_available`, `email_available`, `min_created_year`, `max_created_year`, `cp_via_email`, `account_type_id`) VALUES
(1, 'Via Campuchia', 'acc via singapo', 'https://4menshop.com/cache/image/300x400/images/thumbs/2019/08/ao-vest-nazafu-mau-da-bo-1138_2_small-10928.JPG', 99, 200000.00, 4000000.00, 100, 1500, 'VN', '1', 1, 0, 0, 2021, 2023, 0, 1),
(2, 'ÁO VEST NAZAFU MÀU XÁM AV1138', 'namnam', 'https://4menshop.com/cache/image/300x400/images/thumbs/2019/08/ao-vest-nazafu-mau-da-bo-1138_2_small-10928.JPG', 95, 200000.00, 20000.00, 100, 1500, 'VN', '1', 1, 1, 1, 0, 0, 1, 1),
(3, 'ÁO VEST NAZAFU MÀU Xanh AV1138', 'acc fb việt nam', 'https://4menshop.com/cache/image/300x400/images/thumbs/2019/08/ao-vest-nazafu-mau-da-bo-1138_2_small-10928.JPG', 1, 200000.00, 10000.00, 100, 1500, 'VN', '1', 1, 1, 1, 2021, 0, 1, 2),
(4, 'ÁO VEST NAZAFU MÀU Xanh AV1138', 'acc fb việt nam', 'https://4menshop.com/cache/image/300x400/images/thumbs/2019/08/ao-vest-nazafu-mau-da-bo-1138_2_small-10928.JPG', 0, 200000.00, 14000.00, 100, 1500, 'VN', '1', 1, 1, 1, 2021, 0, 1, 2),
(5, 'Via Thái Lan', 'acc fb việt nam', 'https://4menshop.com/cache/image/300x400/images/thumbs/2019/08/ao-vest-nazafu-mau-da-bo-1138_2_small-10928.JPG', 99, 200000.00, 14000.00, 100, 0, '', '1', 1, 1, 1, 0, 0, 1, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounttypes`
--

CREATE TABLE `accounttypes` (
  `type_id` int(11) NOT NULL COMMENT 'ID loại tài khoản',
  `type_name` varchar(255) NOT NULL COMMENT 'Tên loại tài khoản',
  `description` text DEFAULT NULL COMMENT 'Mô tả loại tài khoản',
  `anhien` tinyint(1) DEFAULT 1 COMMENT 'Ẩn/Hiện',
  `thutu` int(11) DEFAULT NULL COMMENT 'Thứ tự'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `accounttypes`
--

INSERT INTO `accounttypes` (`type_id`, `type_name`, `description`, `anhien`, `thutu`) VALUES
(1, 'Via Việt', 'acc fb việt nam', 1, NULL),
(2, 'Via Thái Lan', 'acc via thailan', 1, NULL),
(3, 'Via Campuchia', 'acc via thailan', 1, NULL),
(4, 'Via Singapo', 'acc via singapo', 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account_details`
--

CREATE TABLE `account_details` (
  `detail_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL COMMENT 'ID của tài khoản chính',
  `username` varchar(255) NOT NULL COMMENT 'Tên đăng nhập của tài khoản phụ',
  `password` varchar(255) NOT NULL COMMENT 'Mật khẩu của tài khoản phụ',
  `sold_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Trạng thái đã bán (1 = đã bán, 0 = chưa bán)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account_details`
--

INSERT INTO `account_details` (`detail_id`, `account_id`, `username`, `password`, `sold_status`) VALUES
(1, 3, '1000521543651', 'DEAFDSR3', 0),
(2, 3, '1000521152165', '24444444444', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsumuahang`
--

CREATE TABLE `lichsumuahang` (
  `purchase_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `transaction_type` varchar(50) NOT NULL COMMENT 'Loại giao dịch',
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `account_balance` decimal(10,2) DEFAULT 0.00 COMMENT 'Số dư tài khoản',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` tinyint(1) DEFAULT NULL COMMENT 'Vai trò người dùng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `full_name`, `address`, `phone_number`, `account_balance`, `created_at`, `role`) VALUES
(1, 'lancave', '$2y$10$mcyp4HjfyZN61mOZV0GQAOPcjKjXa4S4MUGQUWL5/V21EUR1ZNhiy', 'nam000@gmail.com', NULL, NULL, NULL, 10000.00, '2023-10-23 16:08:12', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `account_type_id` (`account_type_id`);

--
-- Chỉ mục cho bảng `accounttypes`
--
ALTER TABLE `accounttypes`
  ADD PRIMARY KEY (`type_id`);

--
-- Chỉ mục cho bảng `account_details`
--
ALTER TABLE `account_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Chỉ mục cho bảng `lichsumuahang`
--
ALTER TABLE `lichsumuahang`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `accounttypes`
--
ALTER TABLE `accounttypes`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID loại tài khoản', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `account_details`
--
ALTER TABLE `account_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `lichsumuahang`
--
ALTER TABLE `lichsumuahang`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`account_type_id`) REFERENCES `accounttypes` (`type_id`);

--
-- Các ràng buộc cho bảng `account_details`
--
ALTER TABLE `account_details`
  ADD CONSTRAINT `account_details_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`);

--
-- Các ràng buộc cho bảng `lichsumuahang`
--
ALTER TABLE `lichsumuahang`
  ADD CONSTRAINT `lichsumuahang_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `lichsumuahang_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`);

--
-- Các ràng buộc cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
