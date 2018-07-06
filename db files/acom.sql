-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2018 at 11:13 AM
-- Server version: 5.7.12-log
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `referrer_code` varchar(256) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `salt` varchar(8) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `referrer_code`, `password`, `salt`, `role_id`, `deleted`) VALUES
(2, 'emmwee', 'emmweecode', '350f67c673c0ee5a9198ec26876ae41bd0f24b3f5bcb21e75548548c1e87ccc08d0d4df47beceb2b262b5a68d588a43be0c360d76f029b7f22a0545c3dbf4d73', '98315408', 5, 0),
(5, 'cyyang', '123123123', '0d72a12d739bed4c0cc841ad333b381d2d62ca84a7853754ae59f5882d2b1c27356207bb643e61635075635287baf897f27b140fe07b94609785316ac4edf0d7', '17727687', 5, 1),
(6, 'seet', 'asd', 'b86ef9e3b965be31773c91e3e04265311f38e7347fd4c9a60f3a249ecd428fff689a353aaa8e7778a220c065903ebc64fcf34e44b23d7f6e6714a58d20707bea', '87912292', 5, 0),
(7, 'cherie', '123', 'e497aa89a0f4c4583c1ba0d56a1dc55caa6b177a2fe3216fc69727c02d6be3c5f57f01dcd091d9948030166bfc2090043aa718be49702b3f9feec76d6b9062d3', '42901306', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `url` varchar(256) NOT NULL,
  `link` varchar(256) NOT NULL DEFAULT '#',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `url`, `link`, `deleted`) VALUES
(1, '/images/Banner/banner.jpg', 'www.facebook.com', 1),
(2, '/images/Banner/banner31.gif', 'http://fontawesome.io/icons/', 1),
(3, '/images/Banner/NYX_Main_Banner.png', 'http://www.google.com', 0),
(4, '/images/Banner/(【ZERO动漫下载】银之匙_第二季02_mp4)00_11_57_550.jpg', 'asd', 1),
(5, '/images/Banner/02.png', 'asd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `parent_id`, `name`, `deleted`) VALUES
(1, 0, 'Furnitures', 1),
(2, 0, 'Tables', 1),
(3, 0, 'Chairs', 1),
(4, 0, 'Electronic Appliances', 1),
(5, 0, 'Shelf', 1),
(6, 0, 'Cosmetics', 0),
(7, 6, 'Lipsticks', 0),
(8, 6, 'Mascara', 0),
(9, 6, 'Eyeliners', 0),
(10, 0, 'asd', 1),
(11, 0, 'xc', 1),
(12, 0, 'abc', 1),
(13, 0, 'asd', 1),
(14, 0, 'qwer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `collection` int(11) NOT NULL,
  `collection_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`collection`, `collection_name`) VALUES
(0, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `collection_product`
--

CREATE TABLE `collection_product` (
  `collection_product_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_status_id` int(11) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `receiver` varchar(256) NOT NULL,
  `contact` varchar(256) NOT NULL,
  `address` text NOT NULL,
  `shipping` decimal(10,3) NOT NULL DEFAULT '0.000',
  `remarks` longtext,
  `receipt` varchar(256) NOT NULL,
  `promotion_id` int(11) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `order_status_id`, `added_date`, `payment_amount`, `receiver`, `contact`, `address`, `shipping`, `remarks`, `receipt`, `promotion_id`, `deleted`) VALUES
(2, 5, 1, '2017-08-02 15:22:22', '0.00', 'lebron james', '123123123', 'USA', '0.000', NULL, '', 0, 0),
(4, 2, 1, '2018-05-27 16:40:29', '0.00', 'Emmanual Wee Zhao Jie', '0149151084', '47, Jalan Sierra Perdana 2/13, Taman Sierra Perdana, 81750 Masai, Johor, Malaysia', '0.000', NULL, '', 0, 0),
(6, 6, 5, '2018-06-29 10:22:01', '0.00', 'Seet', '0147235900', '22, Jalan Molek 2/42, Taman Molek', '0.000', '', '', 0, 1),
(7, 1, 1, '2018-06-29 11:40:08', '0.00', 'Emmanual Wee Zhao Jie', '0149151084', '47, Jalan Sierra Perdana 2/13, Taman Sierra Perdana, 81750 Masai, Johor, Malaysia', '0.000', NULL, '', 2, 0),
(8, 6, 5, '2018-06-29 12:23:04', '0.00', 'Seet', 'asd', 'asd', '0.000', '', '', 1, 1),
(9, 6, 1, '2018-06-29 13:29:20', '0.00', 'Seet', 'asd', 'asd', '0.000', NULL, '', 0, 0),
(10, 6, 1, '2018-06-29 13:29:41', '0.00', 'Seet', 'asd', 'asd', '0.000', NULL, '', 0, 0),
(11, 6, 1, '2018-06-29 15:30:15', '0.00', 'Seet', 'AS', 'As', '0.000', NULL, '', 0, 0),
(12, 6, 1, '2018-06-29 17:08:44', '0.00', 'Seet', 'asd', 'asd', '0.000', NULL, '', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(10,3) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `model_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `product_id`, `price`, `quantity`, `model_id`) VALUES
(1, 1, 1, '800.000', 15, 1),
(2, 2, 1, '800.000', 5, 1),
(3, 2, 3, '75.000', 20, 5),
(4, 3, 18, '100.000', 1, 25),
(5, 4, 1, '200.000', 3, 17),
(6, 5, 1, '200.000', 2, 17),
(7, 6, 1, '180.000', 1, 17),
(8, 6, 3, '100.000', 1, 23),
(9, 7, 19, '100.000', 5, 26),
(10, 7, 1, '180.000', 4, 17),
(11, 7, 18, '100.000', 6, 25),
(12, 7, 2, '200.000', 5, 19),
(13, 7, 2, '200.000', 10, 18),
(14, 8, 1, '180.000', 1, 17),
(15, 9, 1, '180.000', 1, 17),
(16, 10, 2, '200.000', 1, 18),
(17, 10, 3, '100.000', 1, 23),
(18, 11, 3, '100.000', 1, 23),
(19, 11, 19, '100.000', 1, 26),
(20, 11, 18, '100.000', 1, 25),
(21, 11, 2, '200.000', 1, 19),
(22, 12, 3, '100.000', 1, 23),
(23, 12, 19, '100.000', 1, 26);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `order_status_id` int(11) NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`order_status_id`, `status`) VALUES
(1, 'pending payment'),
(2, 'pending approval'),
(3, 'in progress'),
(4, 'completed'),
(5, 'canceled ');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(256) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `percentage` decimal(5,2) NOT NULL DEFAULT '0.00',
  `thumbnail` varchar(256) NOT NULL,
  `thumbnail2` varchar(256) NOT NULL,
  `description` longtext NOT NULL,
  `weight` decimal(10,4) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `name`, `price`, `discount_price`, `percentage`, `thumbnail`, `thumbnail2`, `description`, `weight`, `deleted`) VALUES
(1, 7, 'Lipsticks', '200.00', '180.00', '0.00', '/images/Product/71ngg+vVg4L__SL1500_.jpg', '/images/Product/p1.jpg', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '0.0100', 0),
(2, 7, 'KAILIJUMEI Moisturizer lipsticks Lips Care', '200.00', '0.00', '0.00', '/images/Product/618V9FQKKjL__SY355_.jpg', '/images/Product/p1.jpg', 'KAILIJUMEI Moisturizer lipsticks Lips Care', '0.0100', 0),
(3, 7, 'Dose of Colors Liquid-Matte Lipstick Pinky Promise', '100.00', '0.00', '0.00', '/images/Product/61LQlrbtSeL__SY355_.jpg', '/images/Product/p1.jpg', 'Dose of Colors Liquid-Matte Lipstick Pinky Promise', '0.0100', 0),
(4, 6, 'Test Product', '10.40', '0.00', '0.00', '/images/Product/sunway.png', '', 'Sample', '0.1000', 1),
(5, 7, 'Test Product', '10.40', '0.00', '0.00', '/images/Product/glenmarie.png', '', 'Sample Only', '0.1000', 1),
(6, 7, 'Test Product', '10.40', '0.00', '0.00', '/images/Product/slider2.png', '', 'Sample', '0.1000', 1),
(7, 0, 'Test', '10.40', '0.00', '0.00', '/images/Product/16830716_1369081289804771_1997672007315606167_n.png', '', 'asdas', '0.2000', 1),
(8, 0, 'Test', '10.40', '0.00', '0.00', '/images/Product/16830716_1369081289804771_1997672007315606167_n1.png', '', 'asdas', '0.2000', 1),
(9, 0, 'asdasd', '10.40', '0.00', '0.00', '/images/Product/btn-fb.png', '', 'asda', '0.2000', 1),
(10, 0, 'asdasd', '10.40', '0.00', '0.00', '/images/Product/btn-fb1.png', '', 'asda', '0.2000', 1),
(11, 0, 'asdasd', '10.40', '0.00', '0.00', '/images/Product/btn-fb2.png', '', 'asda', '0.2000', 1),
(12, 7, 'Test Product', '10.40', '0.00', '0.00', '/images/Product/sunway.png', '', 'asd', '0.1000', 1),
(13, 7, 'Another Product', '12.00', '10.50', '0.00', '/images/Product/location-bg.png', '', 'asdad', '0.5000', 1),
(16, 0, 'some sort of porn', '1000.00', '0.00', '0.00', '/images/Product/demo_copy.jpg', '', '69', '12.0000', 1),
(18, 7, 'MAC Selena Matte Lipstick', '100.00', '0.00', '0.00', '/images/Product/51brmbO6j5L__SY355_.jpg', '/images/Product/p1.jpg', 'MAC Selena Matte Lipstick', '0.0100', 0),
(19, 7, 'Kylie Cosmetics Holiday Collection', '100.00', '0.00', '0.00', '/images/Product/810cClM7Y6L__SX355_.jpg', '/images/Product/p1.jpg', 'Kylie Cosmetics Holiday Collection', '0.0100', 0),
(20, 3, 'Sample Coffee Chair', '100.00', '75.00', '25.00', '/images/Product/coffeechaira.jpg', '', 'Sample Coffee Chair is for demo only', '10.0000', 1),
(21, 2, 'Sample Standing Table', '1000.00', '0.00', '0.00', '/images/Product/0c43f7c9123bb9f4acec1a72c93c4c8d.jpg', '', 'Sample Standing Table is for demo only', '75.0000', 1),
(22, 2, 'Tables', '1000.00', '800.00', '20.00', '/images/Product/2818681_11.jpg', '', 'Sample Coffee Table for demo only', '50.0000', 1),
(23, 7, 'test', '400.00', '399.00', '0.00', '/images/Product/71ngg+vVg4L__SL1500_5.jpg', '/images/Product/p1.jpg', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '250.0000', 1),
(24, 7, 'test', '400.00', '399.00', '0.00', '/images/Product/71ngg+vVg4L__SL1500_7.jpg', '', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '250.0000', 1),
(25, 8, 'Cosmetics', '900.00', '700.00', '0.00', '/images/Product/46639481_p10_master12003.jpg', '/images/Product/46639481_p11_master12003.jpg', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '2.9000', 1),
(26, 7, 'sda', '123.00', '2312.00', '0.00', '/images/Product/46668997_p17_master1200.jpg', '/images/Product/46668997_p18_master1200.jpg', 'asdasd asdsd', '34.0000', 1),
(27, 8, 'no discount', '100.00', '0.00', '0.00', '/images/Product/45765102.jpg', '/images/Product/38268056.png', '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac congue nunc, non condimentum ipsum. Phasellus sed rhoncus lectus, in sollicitudin libero. Praesent placerat sem a tellus lacinia, pretium tristique sapien posuere. Aliquam et velit in risus pellentesque vestibulum vitae vel lorem. Nunc neque tellus, dictum eu nulla at, maximus bibendum leo. Praesent commodo auctor dui id dignissim. Nullam quis blandit sem. Duis leo lacus, fermentum at lobortis quis, blandit a felis.', '30.0000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`image_id`, `product_id`, `url`) VALUES
(3, 2, '/images/Product/0c43f7c9123bb9f4acec1a72c93c4c8d1.jpg'),
(4, 2, '/images/Product/moving-standing-desk.jpg'),
(5, 2, '/images/Product/download_(1).jpeg'),
(6, 3, '/images/Product/coffeechaira1.jpg'),
(7, 3, '/images/Product/download_(2).jpeg'),
(9, 1, '/images/Product/57537_PE163119_S51.JPG'),
(10, 1, '/images/Product/0104030_PE250678_S51.JPG'),
(11, 1, '/images/Product/57537_PE163119_S52.JPG'),
(12, 23, '/images/Product/71ngg+vVg4L__SL1500_6.jpg'),
(13, 23, '/images/Product/71ngg+vVg4L__SL1500_11.jpg'),
(14, 23, '/images/Product/618V9FQKKjL__SY355_2.jpg'),
(15, 23, '/images/Product/618V9FQKKjL__SY355_11.jpg'),
(16, 24, '/images/Product/71ngg+vVg4L__SL1500_8.jpg'),
(17, 24, '/images/Product/71ngg+vVg4L__SL1500_12.jpg'),
(18, 24, '/images/Product/618V9FQKKjL__SY355_3.jpg'),
(19, 24, '/images/Product/618V9FQKKjL__SY355_12.jpg'),
(20, 25, '/images/Product/46639481_p8_master1200.jpg'),
(21, 25, '/images/Product/46639481_p9_master1200.jpg'),
(22, 25, '/images/Product/46639481_p10_master12004.jpg'),
(23, 25, '/images/Product/46639481_p11_master12004.jpg'),
(24, 25, '/images/Product/46639481_p12_master1200.jpg'),
(25, 26, '/images/Product/46668997_p11_master1200.jpg'),
(26, 26, '/images/Product/46668997_p13_master1200.jpg'),
(27, 26, '/images/Product/46668997_p14_master1200.jpg'),
(28, 26, '/images/Product/46668997_p16_master1200.jpg'),
(29, 26, '/images/Product/46668997_p17_master12001.jpg'),
(30, 26, '/images/Product/46668997_p18_master12001.jpg'),
(31, 27, '/images/Product/382680561.png'),
(32, 27, '/images/Product/43613760.jpg'),
(33, 27, '/images/Product/457651021.jpg'),
(34, 27, '/images/Product/46658469_p0_master1200.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_model`
--

CREATE TABLE `product_model` (
  `model_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `model` varchar(32) NOT NULL,
  `SKU` varchar(32) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_model`
--

INSERT INTO `product_model` (`model_id`, `product_id`, `model`, `SKU`, `deleted`) VALUES
(1, 22, 'Black', 'SKU1', 0),
(2, 22, 'Brown Brown', 'SKU2', 0),
(3, 21, 'Office', 'SKU1', 0),
(4, 20, 'Black', 'SKU1', 0),
(5, 20, 'White', 'SKU2', 0),
(6, 20, 'Brown', 'SKU3', 0),
(7, 22, 'Purple', 'asdasd', 1),
(8, 6, 'red', '12312', 0),
(9, 7, 'asd', '2131', 0),
(10, 8, 'asd', '2131', 0),
(11, 9, 'asd', 'asd', 0),
(12, 10, 'asd', 'asd', 0),
(13, 11, 'asd', 'asd', 0),
(14, 12, 'red', '1231', 0),
(15, 13, 'asd', 'asd', 0),
(16, 13, 'asd', 'asd', 0),
(17, 1, 'Red', 'P0001', 0),
(18, 2, 'red', 'P0002', 0),
(19, 2, 'combo', 'P0003', 0),
(20, 16, 'test', 'test', 0),
(21, 16, 'test', '123', 0),
(22, 16, 'test', '12313', 0),
(23, 3, 'pink', 'P0012', 0),
(24, 3, '', '', 0),
(25, 18, 'Purple', 'P000123', 0),
(26, 19, 'P123', '12', 0),
(27, 23, 'lipM', 'Red', 0),
(28, 23, '', '', 0),
(29, 24, 'lipM', 'Red', 0),
(30, 24, '', '', 0),
(31, 25, 'Black', '20', 0),
(32, 26, '', '', 0),
(33, 27, 'no model', 'no sku', 0),
(34, 27, 'no model 2', 'no sku 2', 0),
(35, 27, 'no model 2', 'no sku 2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promotion_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` longtext NOT NULL,
  `code` varchar(256) NOT NULL,
  `discount` decimal(5,2) NOT NULL DEFAULT '0.00',
  `active` enum('YES','NO') NOT NULL DEFAULT 'YES',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promotion_id`, `name`, `description`, `code`, `discount`, `active`, `deleted`) VALUES
(1, 'Sample Promotion', 'Sample Promotion Description', '32DIWU7CZJ1F', '10.00', 'YES', 0),
(2, 'New Promo', 'New Promo Description', 'H5GMKTF8AUYC', '20.00', 'YES', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `name`) VALUES
(1, 'operator'),
(2, 'admin'),
(3, 'supervisor'),
(4, 'super admin'),
(5, 'system admin'),
(6, 'agent');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `home_banner_1` varchar(128) NOT NULL,
  `home_banner_2` int(128) NOT NULL,
  `home_banner_3` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_details`
--

CREATE TABLE `shipping_details` (
  `shipping_details_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping_details`
--

INSERT INTO `shipping_details` (`shipping_details_id`, `description`, `deleted`) VALUES
(1, 'Lorem ipsum dolor sit amet, consec tetuer adipis elit, aliquam eget nibh etlibura. Aenean commodo ligula eget dolor Aenean massa. Portals seize data-driven, tag expedite', 1),
(2, 'Lorem ipsum ', 1),
(3, 'Lorem ipsum dolor sit amet, consec tetuer adipis elit, aliquam eget nibh etlibura. Aenean commodo ligula eget dolor Aenean massa. Portals seize data-driven, tag expedite asd asd', 1),
(4, 'Lorem ipsum dolor sit amet, consec tetuer adipis elit, aliquam eget nibh etlibura. Aenean commodo ligula eget dolor Aenean massa. Portals seize data-driven, tag expedite', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `salt` varchar(8) NOT NULL,
  `name` varchar(256) NOT NULL,
  `contact` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `referrer_code` varchar(256) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `salt`, `name`, `contact`, `address`, `referrer_code`, `deleted`) VALUES
(1, 'emmwee96@gmail.com', '02cbc304e120445b480816c169c084d6cb19a62b4bc2cc73301ddea5b926343383f966673345b73a0b6bc02942daf5aa37a8ece2a23489efc86e686914dd9abb', '71168679', 'Emmanual Wee Zhao Jie', '0149151084', '47, Jalan Sierra Perdana 2/13, Taman Sierra Perdana, 81750 Masai, Johor, Malaysia', '', 0),
(2, 'cyyang94@hotmail.com', 'a5c0cf410cd03e1575198ef06140c16dfff987c448ac4d950565312399d3277ed03e96d7e23328547caf5d5189f4bfb8707f851bbd864b1961018b6f1b05ff52', '73950447', 'Emmanual Wee Zhao Jie', '0149151084', '47, Jalan Sierra Perdana 2/13, Taman Sierra Perdana, 81750 Masai, Johor, Malaysia', '', 0),
(3, 'alleniverson@gmail.com', '8e215435a52a32cc420e045ecbf06a778f2891a7962c925d1c57a93ce92aa57328adfa52e6b9f1210913993387771b58e6fbcbc881732900ad2c042a168f7e81', '46093941', 'Allen Iverson', '', '', 'emmweecode', 0),
(4, 'kaka@gmail.com', 'a753c46dd6944434c87f5c49394cb5ce54788dd7800f01e2b0f7c7e162c721f9f310e16212868c9a5c85a46dc86d23b2ee9988be999f1337f8b0d3be1fdb31b7', '92022433', 'kakaka', '', '', '', 0),
(5, 'lebronjames@gmail.com', '48671947420d8a77eb316b6976fd6d79a804f267f158b8839911880875ad6ec7c29f34eb86300b731027fbc0ecd3212fde5656c7f34e4a4d40d98ab963e3bb81', '36687167', 'lebron james', '', '', 'agent777', 0),
(6, 'sgz000@yahoo.com', 'c55e4cf4f0d52b752689d6faf295c9cce89f47bd4a36079ec411a882604fd28ccc4f1c89def4dca9afc63359e9f933b2f36c67a7175ee50fcc60246c942c5390', '86459350', 'Seet', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `role` (`role_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`collection`);

--
-- Indexes for table `collection_product`
--
ALTER TABLE `collection_product`
  ADD PRIMARY KEY (`collection_product_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`,`order_status_id`),
  ADD KEY `promotion_id` (`promotion_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `product_id` (`product_id`,`model_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`order_status_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `page` (`category_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_model`
--
ALTER TABLE `product_model`
  ADD PRIMARY KEY (`model_id`),
  ADD KEY `product` (`product_id`),
  ADD KEY `product_2` (`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotion_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD PRIMARY KEY (`shipping_details_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `referrer_code` (`referrer_code`(255));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `collection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `collection_product`
--
ALTER TABLE `collection_product`
  MODIFY `collection_product_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `order_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `product_model`
--
ALTER TABLE `product_model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promotion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shipping_details`
--
ALTER TABLE `shipping_details`
  MODIFY `shipping_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_model`
--
ALTER TABLE `product_model`
  ADD CONSTRAINT `product_model_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
