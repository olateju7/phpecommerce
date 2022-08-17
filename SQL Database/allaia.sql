-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2022 at 09:00 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `allaia`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `customerid` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `customerid`, `product_code`, `quantity`) VALUES
(15, '', '', 1),
(17, '', '', 1),
(18, '', 'A56566', 1),
(19, '', 'A23678', 1),
(20, '', 'A79780', 1),
(21, '', 'A79780', 1),
(23, '', 'A65657', 1),
(24, '', 'A43765', 1),
(25, '', 'A56566', 1),
(36, 'vfs60bcktlrdn2sbglni9u0lg7', 'A23678', 2),
(39, '', 'A56566 data-toggle=', 1),
(40, '', 'A79780 data-toggle=', 1),
(43, 'vfs60bcktlrdn2sbglni9u0lg7', 'A65657', 1),
(46, '23n5rmegbjv7blhr90poc3uiek', 'A56566', 1),
(48, 'vfs60bcktlrdn2sbglni9u0lg7', 'A56566', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postal` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`id`, `firstname`, `lastname`, `useremail`, `password`, `phone`, `country`, `postal`, `city`, `address`) VALUES
(1, 'Olateju', 'Olawoore', 'olawooreteju@gmail.com', 'password', '0903005103', 'Nigeria', '201101', 'Ibadan', 'Toro memorial, Idere');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'SUBSCRIBED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `status`) VALUES
(1, 'olawooreteju@gmail.com', 'SUBSCRIBED'),
(2, 'tejuola4khrist@gmail.com', 'SUBSCRIBED'),
(3, 'admin@admin.com', 'SUBSCRIBED');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `code` varchar(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slideshow` varchar(11) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `category`, `brand`, `stock`, `image`, `price`, `description`, `slideshow`) VALUES
(1, 'A23678', 'Airpods 2021', 'Accessories', 'Apple', '12', 'airpods.jpg', '34599.99', 'Sunt reprehenderit, hic vel optio odit est dolore, distinctio iure itaque enim pariatur ducimus. Rerum soluta, perspiciatis voluptatum cupiditate praesentium repellendus quas expedita exercitationem tempora aliquam quaerat in eligendi adipisci harum non omnis reprehenderit quidem beatae modi. Ea fugiat enim libero, ipsam dicta explicabo nihil, tempore, nulla repellendus eos necessitatibus', 'yes'),
(2, 'A65657', 'Playstation 4', 'Accessories', 'Sony', '1', 'playstation.jpg', '565900', 'Sunt reprehenderit, hic vel optio odit est dolore, distinctio iure itaque enim pariatur ducimus. Rerum soluta, perspiciatis voluptatum cupiditate praesentium repellendus quas expedita exercitationem tempora aliquam quaerat in eligendi adipisci harum non omnis reprehenderit quidem beatae modi. Ea fugiat enim libero, ipsam dicta explicabo nihil, tempore, nulla repellendus eos necessitatibus eligend…', 'no'),
(3, 'A79780', 'Alexa Speaker', 'Accessories', 'Alexa', '11', 'alexa.jpg', '39999.99', 'Sunt reprehenderit, hic vel optio odit est dolore, distinctio iure itaque enim pariatur ducimus. Rerum soluta, perspiciatis voluptatum cupiditate praesentium repellendus quas expedita exercitationem tempora aliquam quaerat in eligendi adipisci harum non omnis reprehenderit quidem beatae modi. Ea fugiat enim libero, ipsam dicta explicabo nihil, tempore, nulla repellendus eos necessitatibus eligend…', 'no'),
(4, 'A43765', 'Iphone 13 Pro Max', 'Phone', 'Apple', '8', 'phone.jpg', '435999.99', 'Sunt reprehenderit, hic vel optio odit est dolore, distinctio iure itaque enim pariatur ducimus. Rerum soluta, perspiciatis voluptatum cupiditate praesentium repellendus quas expedita exercitationem tempora aliquam quaerat in eligendi adipisci harum non omnis reprehenderit quidem beatae modi. Ea fugiat enim libero, ipsam dicta explicabo nihil, tempore, nulla repellendus eos necessitatibus eligend…', 'no'),
(5, 'A56566', 'Apple Mouse', 'Accessories', 'Apple', '12', 'mouse.jpg', '2399.99', 'el optio odit est dolore, distinctio iure itaque enim pariatur ducimus. Rerum soluta, perspiciatis voluptatum cupiditate praesentium repellendus quas expedita exercitationem tempora aliquam quaerat in eligendi adipisci harum non omnis reprehenderit quidem beatae modi. Ea fugiat enim libero, ipsam dicta explicabo nihil, tempore, nulla repellendus eos necessitatibus eligend…', 'yes'),
(6, 'A499488', 'Camera 13px', 'Accessories', 'Canon', '5', '62fbc71c9616d.jpg', '2498', '<p>el optio odit est dolore, distinctio iure itaque enim pariatur ducimus. Rerum soluta, perspiciatis voluptatum cupiditate praesentium repellendus quas expedita exercitationem tempora aliquam quaerat in eligendi adipisci harum non omnis reprehenderit quidem beatae modi. Ea fugiat enim libero, ipsam dicta explicabo nihil, tempore, nulla repellendus eos necessitatibus eligend…</p><p>el optio odit est dolore, distinctio iure itaque enim pariatur ducimus. Rerum soluta, perspiciatis voluptatum cupiditate praesentium repellendus quas expedita exercitationem tempora aliquam quaerat in eligendi adipisci harum non omnis reprehenderit quidem beatae modi. Ea fugiat enim libero, ipsam dicta explicabo nihil, tempore, nulla repellendus eos necessitatibus eligend…<br></p>', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `product_brand`
--

CREATE TABLE `product_brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_brand`
--

INSERT INTO `product_brand` (`id`, `brand`) VALUES
(1, 'Apple'),
(2, 'Alexa'),
(3, 'Sony'),
(4, 'Canon');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `category`) VALUES
(1, 'Electronics'),
(2, 'Phone'),
(3, 'Accessories'),
(4, 'Laptops');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `review` longtext NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`id`, `code`, `rating`, `title`, `review`, `date`) VALUES
(1, 'A43765', '4', 'Excellent', 'fantastic, i must say', '2022-08-13'),
(2, 'A43765', '2', 'wow', 'chjfuv', '2022-08-13'),
(3, 'A43765', '4', 'WOW', 'FXGFXKYTXC', '2022-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `reference_no` varchar(255) NOT NULL,
  `customerid` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `paymentmethod` varchar(255) NOT NULL,
  `billing` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `reference_no`, `customerid`, `customer_email`, `product_name`, `product_image`, `product_price`, `qty`, `total_price`, `date`, `time`, `method`, `paymentmethod`, `billing`, `status`) VALUES
(1, 'HPMCOD62f6a6c1a6d45', '1', 'olawooreteju@gmail.com', 'Playstation 4', '565900', '565900', '2', '1131800', '12/08/2022', '08:15:13 pm', 'Delivery', 'Cash On Delivery', 'Toro memorial, Idere, Ibadan, Nigeria', 'Delivered'),
(2, 'HPMCOD62f6a6c1a6d45', '1', 'olawooreteju@gmail.com', 'Airpods 2021', '34599.99', '34599.99', '2', '69199.98', '12/08/2022', '08:15:13 pm', 'Delivery', 'Cash On Delivery', 'Toro memorial, Idere, Ibadan, Nigeria', 'Delivered'),
(3, 'HPMCOP62f6a799862fd', '1', 'olawooreteju@gmail.com', 'Iphone 13 Pro Max', '435999.99', '435999.99', '2', '871999.98', '12/08/2022', '08:18:49 pm', 'Pickup', 'Cash On PickUp', 'Toro memorial, Idere, Ibadan, Nigeria', 'Delivered'),
(4, 'HPMCOD62f75a673e49c', '1', 'olawooreteju@gmail.com', 'Playstation 4', 'playstation.jpg', '565900', '1', '565900', '13/08/2022', '09:01:43 am', 'Delivery', 'Cash On Delivery', 'Toro memorial, Idere, Ibadan, Nigeria', 'Delivered'),
(5, 'HPMCOD62f75a673e49c', '1', 'olawooreteju@gmail.com', 'Alexa Speaker', 'alexa.jpg', '39999.99', '3', '119999.97', '13/08/2022', '09:01:43 am', 'Delivery', 'Cash On Delivery', 'Toro memorial, Idere, Ibadan, Nigeria', 'Delivered'),
(6, 'HPMCOD62f75a673e49c', '1', 'olawooreteju@gmail.com', 'Iphone 13 Pro Max', 'phone.jpg', '435999.99', '2', '871999.98', '13/08/2022', '09:01:43 am', 'Delivery', 'Cash On Delivery', 'Toro memorial, Idere, Ibadan, Nigeria', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `username`, `useremail`, `password`, `role`) VALUES
(1, 'Admin', 'admin@admin.com', 'password', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `customerid` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `customerid`, `product_code`) VALUES
(24, 'vfs60bcktlrdn2sbglni9u0lg7', 'A23678'),
(25, 'vfs60bcktlrdn2sbglni9u0lg7', 'A43765');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_brand`
--
ALTER TABLE `product_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
