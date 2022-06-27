-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2021 at 08:09 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `ip_add` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `p_color` varchar(10) NOT NULL,
  `p_size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cetogories`
--

CREATE TABLE `cetogories` (
  `cetogory_id` int(11) NOT NULL,
  `cetagory_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cetogories`
--

INSERT INTO `cetogories` (`cetogory_id`, `cetagory_title`) VALUES
(1, 'shoes'),
(2, 'liptops'),
(3, 'Mobiles'),
(4, 'Cosmatics'),
(5, 'Sports'),
(6, 'Clothing'),
(7, 'Kids'),
(8, 'Books'),
(9, 'Home & Living'),
(10, 'Men Store'),
(11, 'Women Store'),
(12, 'Hardware');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_password` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` int(100) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(18, 'Mudassir Ahmed', 'gul72522@gmail.com', '1234', 'Pakistan', 'KaraK', 12345678, 'village Ahmed Khel P/O Jandrai Tehh/Distt KARAK', '15.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `shop_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_contact` varchar(100) NOT NULL,
  `customer_address` varchar(200) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `product_size` varchar(100) NOT NULL,
  `product_color` varchar(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL,
  `remarks` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `shop_id`, `product_id`, `customer_name`, `customer_email`, `customer_contact`, `customer_address`, `country`, `city`, `product_name`, `due_amount`, `total_products`, `product_size`, `product_color`, `order_date`, `order_status`, `remarks`) VALUES
(10, 3, 0, 'peer sb', 'peer@gmail.com', '+923339087654', 'vill doda khel p/o dabb/begu khel', 'PAKISTAN', 'KARAK', 'Shoes', 100, 1, '', '', '2020-10-10 17:25:37', 'Verified', 'Product is deliverd'),
(11, 2, 0, 'ali', 'ali@gmail.com', '+9256789765', 'ghundi', 'PAKISTAN', 'KARAK', 'Liptops', 1800, 3, '', '', '2020-10-10 17:25:50', 'Verified', 'Product is deliverd'),
(12, 3, 0, 'mudassir ahmed', 'gul72522@gmail.com', '+923489897145', 'KKKUK deptt oF CS&BI', 'PAKISTAN', 'KARAK', 'Shoes', 100, 1, '', '', '2020-10-11 19:07:23', 'Verified', 'deloverd'),
(16, 9, 0, 'mudassir ahmed', 'gul72522@gmail.com', '+923489897145', 'dd', '--Pakistan--', '--Karak--', 'Huge Perfume', 1300, 1, '', '', '2020-10-24 05:15:26', 'pending', ''),
(17, 8, 0, 'mudassir ahmed', 'gul72522@gmail.com', '+923489897145', 'kkkuk deptt of CS&BI', '--Pakistan--', '--Karak--', 'SumSunG A51', 51500, 1, '', '', '2020-11-12 09:50:47', 'Rejected', 'stock not available'),
(18, 10, 0, 'mudassir ahmed', 'gul72522@gmail.com', '+923489897145', 'kkkuk deptt of cs and bi', '--Pakistan--', '--Karak--', 'EPCOT Bata', 3700, 1, '', '', '2020-11-15 16:27:26', 'Verified', 'Completed'),
(19, 8, 0, 'Nadeem', 'nadeem@gmail.com', '+923179642084', 'village mithakhel p/o mithakhel tehh/distt karak', '--Pakistan--', '--Karak--', 'Oppo Reno 4', 59999, 1, '', '', '2020-11-15 16:27:30', 'Verified', 'Deliverd'),
(21, 8, 0, 'arman', 'arman@gmail.com', '+9256789765', 'wrrana', '--Pakistan--', '--Karak--', 'Oppo Reno 4', 59999, 1, '', '', '2020-11-15 16:27:34', 'Verified', 'jjj'),
(22, 11, 0, 'dr inam', 'drinam@gmail.com', '+9256789765', 'kkkuk deptt of cs', '--Pakistan--', '--Karak--', 'CA Bat', 2000000, 200, '', 'Brown', '2020-11-15 16:30:42', 'pending', ''),
(23, 11, 0, 'Nadeem', 'nadeem@gmail.com', '+923179642084', 'kkkuk deptt of cs', '--Pakistan--', '--Karak--', 'Football Kit', 4500, 5, 'Extra-Larg', 'Brown', '2020-11-15 16:33:01', 'pending', ''),
(24, 12, 0, 'Nadeem Ullah', 'nadeem@gmail.com', '+923179642084', 'Khushal Khan Khattak University deptt od computer science', '--Pakistan--', '--Karak--', 'slippers', 700, 1, '', '', '2021-02-24 17:11:53', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `shop_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `shop_id`, `invoice_no`, `product_id`, `qty`, `order_status`) VALUES
(21, 16, 3, 1172051494, 16, 3, 'Pending'),
(22, 16, 3, 1128195884, 17, 1, 'Pending'),
(23, 16, 3, 456027133, 19, 1, 'Pending'),
(24, 18, 3, 1073536924, 17, 1, 'Pending'),
(25, 18, 2, 2081095491, 21, 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `cetagory_id` int(10) NOT NULL,
  `sub_cetogory_id` int(10) NOT NULL,
  `shop_id` int(10) NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_image1` varchar(500) NOT NULL,
  `product_image2` varchar(500) NOT NULL,
  `product_image3` varchar(500) NOT NULL,
  `product_price` varchar(10000) NOT NULL,
  `product_size` varchar(100) NOT NULL,
  `product_color` varchar(10) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `product_keyword` varchar(50) NOT NULL,
  `product_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `cetagory_id`, `sub_cetogory_id`, `shop_id`, `product_title`, `product_date`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `product_size`, `product_color`, `product_description`, `product_keyword`, `product_status`) VALUES
(1, 3, 3, 8, 'Oppo Reno 4', '2020-10-24 04:35:11', 'WhatsApp Image 2020-10-12 at 9.05.02 PM.jpeg', 'WhatsApp Image 2020-10-12 at 9.05.03 PM.jpeg', 'WhatsApp Image 2020-10-12 at 9.05.02 PM.jpeg', '59999', '', '', '<p>Oppo Reno 4&nbsp;</p>\r\n', 'oppo reno 4', 'on'),
(2, 3, 5, 8, 'Vivo s1', '2020-10-14 18:20:06', 'WhatsApp Image 2020-10-12 at 9.05.04 PM.jpeg', 'WhatsApp Image 2020-10-12 at 9.05.00 PM (1).jpeg', 'WhatsApp Image 2020-10-12 at 9.05.04 PM.jpeg', '35999', '', '', '<p>Vivo Mobile... color available red, black, blue</p>\r\n', 'vivo s1', 'on'),
(3, 4, 6, 9, 'Huge Perfume', '2020-10-14 18:21:07', 'hug.jpeg', 'WhatsApp Image 2020-10-12 at 9.05.45 PM.jpeg', '', '1300', '', '', '<ul>\r\n	<li>Great value for money&nbsp;</li>\r\n	<li>Long lasting</li>\r\n	<li>Superior quality</li>\r\n	<li>Portable and handy</li>\r\n	<li>Attractive smell</li>\r\n	<li>Usable as a gift item</li>\r\n</ul>\r\n', 'Hug perfume', 'on'),
(4, 3, 3, 8, 'OPPO a53', '2020-10-15 05:55:55', 'WhatsApp Image 2020-10-12 at 9.06.25 PM.jpeg', 'WhatsApp Image 2020-10-12 at 9.06.29 PM.jpeg', '', '39,999', '', '', '<p>oppo mobiles</p>\r\n', 'oppo a53', 'on'),
(5, 3, 9, 8, 'huawei ', '2020-10-24 04:35:22', 'WhatsApp Image 2020-10-12 at 9.05.06 PM.jpeg', 'WhatsApp Image 2020-10-12 at 9.05.19 PM.jpeg', '', '40999', '', '', '<p>huawei y6 moblie..plz visit our shop</p>\r\n', 'huawei y6', 'on'),
(7, 4, 7, 9, 'kids diaper', '2020-10-15 07:04:25', 'WhatsApp Image 2020-10-12 at 9.05.36 PM.jpeg', 'WhatsApp Image 2020-10-12 at 9.05.35 PM.jpeg', '', '1400', '', '', '<p><strong>Age Group</strong>: 3-12 Months, Newly Born</p>\r\n\r\n<p><strong>Types</strong>: Disposable</p>\r\n\r\n<p><strong>Usability</strong>: All-in-One Diapers</p>\r\n\r\n<p><strong>Packaging Size</strong>: ', 'kids diaper', 'on'),
(8, 4, 12, 9, 'Hair Oil', '2020-10-15 07:04:01', 'WhatsApp Image 2020-10-12 at 9.05.33 PM.jpeg', 'WhatsApp Image 2020-10-12 at 9.05.40 PM.jpeg', '', '399', '', '', '<p>Hair and New shifa is very diffrent benifits is including all detail including in the leaflet</p>\r\n', 'hair oil', 'on'),
(10, 1, 1, 10, 'EPCOT Bata', '2020-10-15 07:20:50', 'WhatsApp Image 2020-10-12 at 9.04.43 PM.jpeg', 'WhatsApp Image 2020-10-12 at 9.04.51 PM.jpeg', '', '3700', '', '', '<p>EPCOT Shoes Available in black and brown color..</p>\r\n\r\n<p>Visit Our Shop&nbsp;</p>\r\n', 'bata', 'on'),
(12, 5, 15, 11, 'Football', '2020-10-15 15:19:12', 'WhatsApp Image 2020-10-12 at 9.02.12 PM.jpeg', 'WhatsApp Image 2020-10-12 at 9.02.09 PM.jpeg', '', '1200', '', '', '<p>ABW Football available....... qiuckly come for <strong>Discount</strong></p>\r\n', 'football', 'on'),
(13, 5, 16, 11, 'CA Bat', '2020-10-24 04:35:35', 'WhatsApp Image 2020-10-12 at 9.02.30 PM.jpeg', 'WhatsApp Image 2020-10-12 at 9.02.27 PM.jpeg', '', '10000', '', '', '<p>CA bat available</p>\r\n', 'bat', 'on'),
(14, 5, 14, 11, 'Football Kit', '2020-10-15 15:26:12', 'WhatsApp Image 2020-10-12 at 9.01.11 PM.jpeg', 'WhatsApp Image 2020-10-12 at 9.01.05 PM.jpeg', '', '900', '', '', '<p>Barcelona, PSG, Manchester United Kit available</p>\r\n', 'football kit', 'on'),
(15, 1, 13, 12, 'slippers', '2020-10-31 13:50:32', 'WhatsApp Image 2020-10-12 at 9.04.06 PM.jpeg', '', '', '700', 'Array', '', '<p>gdwudywwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwcvsvcqiecq</p>\r\n', 'slipper', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `shopkeeper_accounts`
--

CREATE TABLE `shopkeeper_accounts` (
  `shop_id` int(11) NOT NULL,
  `cetagory_id` int(10) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `shop_location` varchar(200) NOT NULL,
  `shop_image` varchar(100) NOT NULL,
  `shopkeeper_name` text NOT NULL,
  `shopkeeper_email` varchar(100) NOT NULL,
  `shopkeeper_password` varchar(100) NOT NULL,
  `shopkeeper_contact` varchar(20) NOT NULL,
  `shopkeeper_country` text NOT NULL,
  `shopkeeper_city` text NOT NULL,
  `shop_ip` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopkeeper_accounts`
--

INSERT INTO `shopkeeper_accounts` (`shop_id`, `cetagory_id`, `shop_name`, `shop_location`, `shop_image`, `shopkeeper_name`, `shopkeeper_email`, `shopkeeper_password`, `shopkeeper_contact`, `shopkeeper_country`, `shopkeeper_city`, `shop_ip`) VALUES
(8, 10, 'Mujahid Mobile Zone', 'Mobile Tower Karak City', 'mujahid.jpeg', 'Mujahid Ullah', 'mujahid@gmail.com', 'shop', '03339715577', 'Pakistan', 'KARAK', 0),
(9, 4, 'Rafi Cosmitics', 'Ilyas Market Opposit to Mobile Tower', 'rafi.jpeg', 'Muhammad Rafi', 'rafi@gmail.com', 'shop', '03339715577', 'Pakistan', 'KARAK', 0),
(10, 1, 'Adnan Shoes', 'Musa Khan Market Karak', 'adnan.jpeg', 'Adnan Ijaz', 'adnan@gmail.com', 'shop', '03339715577', 'Pakistan', 'KARAK', 0),
(11, 5, 'Sport Center', 'Ghulam Market Opposite to Ufone Frunchise', 'amir.jpeg', 'Amir Khattak', 'sport@gmail.com', 'shop', '03339715577', 'Pakistan', 'KARAK', 0),
(12, 1, 'arman chapal', 'natinal bank opposite', 'WhatsApp Image 2020-10-12 at 9.02.44 PM.jpeg', 'arman khan isf', 'arman@gmail.com', 'shop', '123456789', 'Pakistan', 'KARAK', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `s_id` int(11) NOT NULL,
  `s_image` varchar(350) NOT NULL,
  `s_title` varchar(200) NOT NULL,
  `s_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_cetogories`
--

CREATE TABLE `sub_cetogories` (
  `sub_id` int(10) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_cetogories`
--

INSERT INTO `sub_cetogories` (`sub_id`, `cat_id`, `sub_cat_name`) VALUES
(1, 1, 'Bata'),
(2, 1, 'Sports Shoes'),
(3, 3, 'Oppo'),
(4, 3, 'Sumsung'),
(5, 3, 'Vivo'),
(6, 4, 'Perfumes'),
(7, 4, 'Dressing'),
(8, 4, 'Kids accessories'),
(9, 3, 'huawei'),
(10, 2, 'DELL'),
(11, 2, 'HP'),
(12, 2, 'Lenovo'),
(13, 1, 'Slippers'),
(14, 5, 'Sport T-Shorts'),
(15, 5, 'Football'),
(16, 5, 'cricket'),
(17, 11, 'Women Clothing'),
(18, 11, 'Women Heels'),
(19, 11, 'Women Shoes'),
(20, 11, 'Women Watches'),
(21, 11, 'Women Jewellery'),
(22, 2, 'Sumsung'),
(23, 10, 'Men Clothes'),
(24, 1, 'Slippers'),
(25, 12, 'mobile harware'),
(26, 12, 'lipttop hardware');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_gmail` varchar(50) NOT NULL,
  `user_contect` varchar(50) NOT NULL,
  `user_address` varchar(300) NOT NULL,
  `user_image` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `cetogories`
--
ALTER TABLE `cetogories`
  ADD PRIMARY KEY (`cetogory_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shopkeeper_accounts`
--
ALTER TABLE `shopkeeper_accounts`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `sub_cetogories`
--
ALTER TABLE `sub_cetogories`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cetogories`
--
ALTER TABLE `cetogories`
  MODIFY `cetogory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shopkeeper_accounts`
--
ALTER TABLE `shopkeeper_accounts`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_cetogories`
--
ALTER TABLE `sub_cetogories`
  MODIFY `sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
