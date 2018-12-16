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


--Problem Statement - 2

--SQL to get the number of retailers available in the system.
SELECT COUNT(*) from retailer


--SQL to get the customer counts for each retailer
SELECT `retailer` as Retailer, COUNT(`customer`) from transactions group by retailer


--SQL to get all the customer count.
SELECT count(*) FROM `customers` WHERE 1

--SQL to get purchase amount per day wrt to a retailer
SELECT SUM(`amount`), DATE(`date`), `customer` FROM `transactions` GROUP BY customer, DATE(date)



--SQL to find a loyal customer of any retailer based on the number of purchased more than threshold 5 - Bonus points
SELECT customer,`customer`,COUNT(customer)as count FROM `transactions` GROUP BY customer,retailer HAVING COUNT(customer)>5