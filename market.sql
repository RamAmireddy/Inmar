-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2018 at 01:23 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cust_id`, `product_id`, `quantity`, `total_price`) VALUES
(2, 0, 1, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_lastname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_address`, `customer_contact`, `customer_lastname`) VALUES
(1, 'Ram Amireddy', 'ram.amireddy@gmail.com', '1234', 'hyderabad,500097', '7799047714', NULL),
(2, 'achyuth', 'vegyarapu@gmail.com', '1234', 'Hyderabad', '7799047654', 'vegyarapu'),
(3, 'vinay', 'vinaycse@gmail.com', '334455', 'karimnagar', '8877997768', 'nimmala');

-- --------------------------------------------------------

--
-- Table structure for table `cust_wallet`
--

CREATE TABLE `cust_wallet` (
  `wallet_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `money` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_wallet`
--

INSERT INTO `cust_wallet` (`wallet_id`, `cust_id`, `money`) VALUES
(1, 1, 3500),
(2, 2, 3500),
(3, 3, 200);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `ret_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `ret_id`, `date`) VALUES
(1, 'Banana', 1, 1, '2018-12-15'),
(2, 'Orange', 1, 1, '2018-12-15'),
(3, 'Apple', 5, 1, '2018-12-15'),
(4, 'WaterMelon', 10, 1, '2018-12-15'),
(7, 'Papaya', 8, 1, '2018-12-15'),
(8, 'Mango', 15, 1, '2018-12-15'),
(9, 'PineApple', 20, 1, '2018-12-15'),
(10, 'Pomegranate', 12, 1, '2018-12-15'),
(11, 'Guava', 2, 1, '2018-12-15'),
(13, 'grapes', 3, 1, '2018-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `retailer`
--

CREATE TABLE `retailer` (
  `ret_id` int(11) NOT NULL,
  `ret_fname` varchar(255) NOT NULL,
  `ret_lname` varchar(255) NOT NULL,
  `ret_email` varchar(255) NOT NULL,
  `ret_pass` varchar(255) NOT NULL,
  `ret_contact` varchar(255) NOT NULL,
  `ret_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailer`
--

INSERT INTO `retailer` (`ret_id`, `ret_fname`, `ret_lname`, `ret_email`, `ret_pass`, `ret_contact`, `ret_address`) VALUES
(1, 'bob', 'thebuilder', 'bobthebuilder@gmail.com', '12345', '07987987987', 'hyderabad'),
(2, 'srikanth', 'mothe', 'srikanthmothe@gmail.com', '123456', '9879898866', 'balapur X road, hyderabad , 500097');

-- --------------------------------------------------------

--
-- Table structure for table `rettailer_wallet`
--

CREATE TABLE `rettailer_wallet` (
  `wallet_id` int(11) NOT NULL,
  `ret_id` int(11) NOT NULL,
  `money` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL,
  `customer` varchar(30) NOT NULL,
  `retailer` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `amount`, `date`, `customer`, `retailer`) VALUES
(1, 250, '2018-12-14', '1', '2'),
(2, 350, '2018-12-15', '2', '2'),
(3, 500, '2018-12-16', '1', '1'),
(4, 500, '2018-12-16', '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_email` (`customer_email`);

--
-- Indexes for table `cust_wallet`
--
ALTER TABLE `cust_wallet`
  ADD PRIMARY KEY (`wallet_id`),
  ADD UNIQUE KEY `cust_id` (`cust_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `retailer`
--
ALTER TABLE `retailer`
  ADD PRIMARY KEY (`ret_id`),
  ADD UNIQUE KEY `ret_email` (`ret_email`);

--
-- Indexes for table `rettailer_wallet`
--
ALTER TABLE `rettailer_wallet`
  ADD PRIMARY KEY (`wallet_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cust_wallet`
--
ALTER TABLE `cust_wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `retailer`
--
ALTER TABLE `retailer`
  MODIFY `ret_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rettailer_wallet`
--
ALTER TABLE `rettailer_wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
