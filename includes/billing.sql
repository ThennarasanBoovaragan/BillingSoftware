-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: May 04, 2021 at 10:33 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billing`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Select Category 1'),
(2, 'Select Category 2'),
(3, 'Steels'),
(4, 'plastics'),
(5, 'stationaries'),
(6, 'Furnitures'),
(7, 'Wooden'),
(8, 'Category 8'),
(9, 'Category 9'),
(10, 'Category 10');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `firstname` varchar(11) NOT NULL,
  `lastname` varchar(11) NOT NULL,
  `email` varchar(33) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `company` varchar(40) NOT NULL,
  `display_name` varchar(40) NOT NULL,
  `website` varchar(40) NOT NULL,
  `other` varchar(40) NOT NULL,
  `gst_in` varchar(33) NOT NULL,
  `address` varchar(40) NOT NULL,
  `comments` varchar(40) NOT NULL,
  `tax_info` varchar(40) NOT NULL,
  `amount_paid` varchar(30) NOT NULL,
  `amount_pending` varchar(30) NOT NULL,
  `payment_mode` varchar(30) NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `attachments` varchar(50) NOT NULL,
  `pan_no` varchar(20) NOT NULL,
  `adhaar_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `firstname`, `lastname`, `email`, `phone`, `company`, `display_name`, `website`, `other`, `gst_in`, `address`, `comments`, `tax_info`, `amount_paid`, `amount_pending`, `payment_mode`, `payment_status`, `attachments`, `pan_no`, `adhaar_no`) VALUES
(1, 'Ram', 'kumar', 'kumar@gmail.com', '9456312785', '', '', '', '', '', 'Address', 'comments', '78,456', '80,000', 'none', 'Card', 'Paid', '', 'dxy45623789', '78945132368'),
(2, 'Ram', 'kumar', 'kumar@gmail.com', '9456312785', 'company', 'company', 'company@company.in', '', '', 'Address', 'comments', '', '15,000', '20,000', 'Cash', 'Partially Paid', '', '', ''),
(3, 'Reshma', 'dharshini', 'reshma@gmail.com', 'xxxxxxxxxx', '', '', '', '', '', 'Address', 'comments', '', '65,000', 'none', 'Card', 'Paid', '', '', ''),
(4, 'John', 'brito', 'brito20@gmail.com', 'xxxxxxxxxx', '', '', '', '', '', 'Address', 'comments', '', '60,500', 'none', 'Cash', 'Paid', '', '', ''),
(5, 'Priya ', 'ram', 'ram@gmail.com', 'xxxxxxxxxx', '', '', '', '', '', 'Address 6', 'comments', '', '70,850', 'none', 'Card', 'Paid', '', '', ''),
(6, 'Reshma', 'kumar', 'reshma@gmail.com', 'xxxxxxxxxx', 'company', 'company', 'company@company.in', 'none', '', 'Address', 'none', '4,00,000', '15,000', '15000', 'Credit', 'UnPaid', 'none', 'dxy45623789', '78945132368'),
(7, 'Priya ', 'dharshini', 'priya@gmail.com', 'xxxxxxxxxx', 'company', 'company', 'company@company.in', 'none', '', 'Address', 'comments', '3,20,000', '80,000', '50,000', 'Card', 'Partially Paid', 'none', 'dxy45623789', '78945132368'),
(8, 'Reshma', 'dharshini', 'dharshini@gmail.com', 'xxxxxxxxxx', 'company', 'company', 'company@company.in', 'none', '', 'Address', 'none', '4,00,000', '15,000', '5000', 'Card', 'Partially Paid', 'none', 'DYX45623789', '78945132365'),
(9, 'Rahul', 'name', 'Rahul@gmail.com', 'xxxxxxxxxx', 'company', 'company', 'company@company.in', 'none', '', 'Address 8', 'none', '785642', '50,000', '50,000', 'Credit', 'UnPaid', 'none', 'DYX45623789', '78945132365'),
(13, 'Reshma', 'dharshini', 'brito@gmail.com', 'xxxxxxxxxx', 'company', 'company', 'company@company.in', 'none', 'xxxxxxxx', 'Address', 'none', '50,000', '50,000', '50,000', 'Card', 'Paid', '', '', ''),
(15, 'Ram', 'kumar', 'bri@gmail.com', 'xxxxxxxxxx', 'company', 'company', 'www.company@company.in', 'none', 'xxxxxxxx', 'address', 'none', '43,000', '50,000', '50,000', 'Cash', 'Paid', 'none', 'dxy45623789', 'xxxxxxxx'),
(16, 'Ram', 'kumar', 'ram@gmail.com', 'xxxxxxxxxx', '', '', '', '', '', 'Address', 'comments', '', '80,000', '80,000', 'Credit', 'UnPaid', '', '', ''),
(17, 'Aruna', 'Arumugam', 'aruna@gmail.com', 'xxxxxxxxxx', '', '', '', '', '', 'Address', 'comments', '', '15,000', '15000', 'Credit', 'UnPaid', '', '', ''),
(18, 'Ram', 'name', 'aarthi@gmail.com', '9456312785', 'company', 'company', 'company@company.in', 'none', 'xxxxxxxx', 'Address', 'test notes', 'none', '60,500', '30,000', 'Card', 'Partially Paid', 'none', 'DYX45623789', '7894513236'),
(19, 'John', 'vijay', 'john@gmail.com', 'xxxxxxxxxx', 'company', 'company', 'www.company@company.in', 'none', 'xxxxxxxx', 'address', 'notes', 'none', '65,000', '50,000', 'Card', 'Partially Paid', 'none', 'DYX45623789', 'xxxxxxxx'),
(20, 'John', 'dharshan', 'dharshan@gmail.com', 'xxxxxxxxxx', 'company', 'company', 'company@company.in', 'none', 'xxxxxxxx', 'address', 'notes', 'none', '15,000', 'none', 'cash', 'Paid', 'none', 'DYX45623789', 'xxxxxxxx'),
(21, 'Nandhini', 'sundar', 'nandhini@gmail.com', 'xxxxxxxxxx', 'company', 'company', 'www.company@company.in', 'none', 'xxxxxxxx', 'Address', 'test comments', 'none', '40,000', '20,000', 'cash', 'Partially Paid', 'none', 'DYX45623789', 'xxxxxxxx'),
(22, 'Dharshan', 'kumar', 'dharshan@gmail.com', 'xxxxxxxxxx', 'company', 'company', 'company@company.in', 'none', 'xxxxxxxx', 'Address', 'Test Comments', 'none', '15,000', '30,000', 'card', 'Partially Paid', 'none', 'xxxxxxxxxxx', 'xxxxxxxx'),
(23, 'Sam', 'Karan', 'karan123@gmail.com', 'XXXXXXXXXX', 'company', 'Company', 'www.company.in', 'none', 'XXXXXX', 'Address', 'Test Comments', 'XXXXXX', '50,000', '0.00', 'Card', 'Paid', 'none', 'XXXXXXXXXXXX', 'XXXXXXXXXX'),
(24, 'Rohan', 'Kumar', 'Rohan123@gmail.com', 'XXXXXXXXX', 'company', 'company ', 'www.company.in', 'none', 'xxxxxxxx', 'address', 'comments', 'none', '20,000', '10,000', 'cash', 'Partially Paid', 'none', 'XXXXXXXXXXXX', 'XXXXXXXXXXXX');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `invnum` int(11) NOT NULL,
  `custname` text NOT NULL,
  `invdate` date NOT NULL,
  `numofprod` int(11) NOT NULL,
  `item` varchar(40) NOT NULL,
  `descr` varchar(40) NOT NULL,
  `qty` varchar(40) NOT NULL,
  `cost` varchar(40) NOT NULL,
  `vat` varchar(40) NOT NULL,
  `discount` varchar(40) NOT NULL,
  `price` varchar(40) NOT NULL,
  `subtotal` varchar(40) NOT NULL,
  `tax` varchar(40) NOT NULL,
  `bill_type` varchar(15) NOT NULL,
  `payment_status` varchar(15) NOT NULL,
  `payment_mode` varchar(15) NOT NULL,
  `total` varchar(40) NOT NULL,
  `due` varchar(40) DEFAULT NULL,
  `rbdf` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`invnum`, `custname`, `invdate`, `numofprod`, `item`, `descr`, `qty`, `cost`, `vat`, `discount`, `price`, `subtotal`, `tax`, `bill_type`, `payment_status`, `payment_mode`, `total`, `due`, `rbdf`) VALUES
(6, 'Techzod', '2013-09-24', 1, 'Item1*#*', 'Desc1*#*', '100*#*', '9999*#*', '2.5*#*', '', '1024897.50*#*', '1024897.5', '5.0', '', '', '', '1076142.38', '1076142.38', '1076142.38'),
(7, 'Techzod', '2013-09-24', 1, 'Item2*#*', 'Desc2*#*', '10*#*', '3211*#*', '2.2*#*', '', '32816.42*#*', '32816.42', '6.0', '', '', '', '34785.41', '34785.41', '34785.41'),
(8, 'Techzod', '2013-09-24', 1, 'Item3*#*', 'Desc3*#*', '50*#*', '10.5*#*', '5.5*#*', '', '553.88*#*', '553.88', '6.0', '', '', '', '587.11', '587.11', '587.11'),
(9, 'Company Name', '2013-09-25', 1, 'helo*#*', 'hi*#*', '231*#*', '3*#*', '2*#*', '', '706.86*#*', '706.86*#*', '0.0', '', '', '', '706.86', '706.86', '706.86'),
(10, 'def', '2013-09-25', 1, 'hi*#*', 'hi*#*', '231*#*', '321*#*', '3*#*', '', '76375.53*#*', '76375.53', '323.0', '', '', '', '323068.49', '323068.49', '323068.49'),
(11, 'abc', '2013-09-25', 1, 'hello*#*', 'hi*#*', '103*#*', '10*#*', '2.6*#*', '', '1056.78*#*', '1056.78', '5.0', '', '', '', '1109.62', '1109.62', '1109.62'),
(577, 'techzod', '2013-09-25', 2, 'klajsdkjl*#*skudc*#*', 'jskajljasdj*#*jhkjhdsahjd*#*', '34*#*331*#*', '212*#*21.323*#*', '321.5*#*31.2*#*', '', '30381.72*#*9259.98*#*', '39641.7', '0.0', '', '', '', '39641.7', '39641.7', '39641.7'),
(578, 'Company Name', '2013-09-27', 2, 'Item*#*Item*#*', 'Description*#*Description*#*', '3*#*2*#*', '1405.71*#*1405.72*#*', '4*#*4*#*', '', '4385.82*#*2923.90*#*', '7028.57', '4.0', '', '', '', '7590.86', '7590.86', '7590.86'),
(579, 'techzod', '2013-09-27', 2, 'a*#*b*#*', 'aslkdjak*#*sakdjff*#*', '3*#*2*#*', '1405.71*#*1405.72*#*', '4*#*4*#*', '', '4385.82*#*2923.90*#*', '7028.57', '1.0', '', '', '', '7380.01', '7380.01', '7380.01'),
(586, 'Prithvi', '2021-04-19', 2, 'pen*#*pencil*#*', '*#**#*', '600*#*800*#*', '10*#*10*#*', '0.00*#**#*', '', 'N/A*#*8000.00*#*', '8000.00', '0.00', '', '', '', '8000.00', '8000.00', '8000.00'),
(587, 'Prithvi', '2021-04-19', 1, 'pen*#*', 'Description*#*', '600*#*', '10*#*', '*#*', '', '6000.00*#*', '', '0.00', '', '', '', '6000.00', '6000.00', '6000.00'),
(588, 'Mohan', '2021-04-19', 1, 'Book*#*', 'Book*#*', '800*#*', '60*#*', '*#*', '', '48000.00*#*', '48000.00', '7', '', '', '', '48000.00', '48000.00', '48000.00'),
(593, 'Company Name', '2021-04-26', 1, 'Item*#*', 'Description*#*', '500*#*', '50*#*', '5*#*', '3*#*', '26250.00*#*', '25000.00', '2', '', '', '', '26750.00', '26750.00', '26750.00'),
(594, 'Company Name', '2021-04-26', 1, 'Item*#*', 'Description*#*', '100*#*', '20*#*', '5*#*', '2*#*', '2100.00*#*', '2000.00', '3', '', '', '', '2160.00', '2160.00', '2160.00'),
(595, 'praveen', '2021-04-29', 1, 'Item*#*', 'Description*#*', '500*#*', '20*#*', '5*#*', '2*#*', '10500.00*#*', '10000.00', '3', '', '', '', '10800.00', '10800.00', '10800.00'),
(596, 'Nithin', '2021-04-29', 1, 'Bottle*#*', 'Bottle*#*', '600*#*', '20*#*', '5*#*', '2*#*', '12600.00*#*', '12000.00', '4', 'Credit Bill', '', 'Credit Card', '13080.00', '13080.00', '13080.00'),
(597, 'Company', '2021-04-30', 1, 'Tables*#*', 'Tables*#*', '300*#*', '100*#*', '5*#*', '1*#*', '31500.00*#*', '30000.00', '2', 'Cash Bill', 'Paid', 'Credit Card', '32100.00', '32100.00', '32100.00'),
(598, 'Company Name', '2021-04-30', 1, 'Item*#*', 'Description*#*', '100*#*', '20*#*', '5*#*', '6*#*', '2100.00*#*', '2000.00', '6', 'Cash Bill', 'Paid', 'Cash', '2220.00', '2220.00', '2220.00'),
(599, 'Company Name', '2021-04-30', 1, 'Item*#*', 'Description*#*', '100*#*', '200*#*', '8*#*', '6*#*', '21600.00*#*', '20000.00', '4', 'Cash Bill', 'Paid', 'Cash', '22400.00', '22400.00', '22400.00'),
(600, 'Reshma', '2021-04-30', 1, 'Item*#*', 'Description*#*', '500*#*', '20*#*', '5*#*', '*#*', '10500.00*#*', '10000.00', '3', 'Credit Bill', 'Paid', 'Credit', '10800.00', '10800.00', '10800.00'),
(601, 'Ram', '2021-04-30', 1, 'Item*#*', 'Description*#*', '5000*#*', '20*#*', '5*#*', '*#*', '105000.00*#*', '100000.00', '2', 'Cash Bill', 'Paid', 'Cash', '107000.00', '107000.00', '107000.00'),
(602, 'Sam', '2021-05-04', 1, 'Speaker*#*', 'Speaker*#*', '200*#*', '100*#*', '4*#*', '*#*', '20800.00*#*', '20000.00', '2', 'Credit Bill', 'Paid', 'Credit', '21200.00', '21200.00', '21200.00');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `barcode_no` text NOT NULL,
  `product_name` varchar(33) NOT NULL,
  `product_category` varchar(33) NOT NULL,
  `product_type` varchar(33) NOT NULL,
  `product_cost` varchar(30) NOT NULL,
  `quantity` int(33) NOT NULL,
  `supplier` varchar(33) NOT NULL,
  `onhand_qty` int(33) NOT NULL,
  `expiry_date` date NOT NULL,
  `date_arrival` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `barcode_no`, `product_name`, `product_category`, `product_type`, `product_cost`, `quantity`, `supplier`, `onhand_qty`, `expiry_date`, `date_arrival`) VALUES
(1, 'barcode.png', 'Pen', 'stationaries', 'Plastic', '5', 100, 'Arun', 50, '2022-05-23', '2021-07-30'),
(2, 'barcode.png', 'Laptop', 'plastics', 'Plastic', '45,000', 60, 'Aravindh', 30, '2021-07-16', '2020-03-25'),
(3, 'barcode.png', 'Keyboard', 'stationaries', 'Plastic', '30,000', 60, 'Shanmugam', 40, '2022-04-18', '2020-11-14'),
(4, 'barcode.png', 'Computer', 'Steels', 'Plastic', '90,000', 40, 'Arun', 20, '2021-10-22', '2020-10-22'),
(5, 'barcode.png', 'Tables', 'Wooden', 'Plastic', '40,000', 60, 'Rahul', 20, '2021-08-28', '2020-12-18'),
(6, 'barcode.png', 'Pencil', 'stationaries', 'wooden', '10', 500, 'Arun', 100, '2021-08-27', '2020-10-24'),
(7, 'barcode.png', 'Modem', 'plastics', 'Plastic', '5,000', 60, 'Aravindh', 20, '2021-07-23', '2021-04-23'),
(8, 'barcode.png', 'Speaker', 'Category 8', 'Plastic', '30,000', 60, 'Sameera', 30, '2021-07-16', '2020-11-12'),
(9, 'barcode.png', 'Fan', 'plastics', 'Plastic', '4000', 50, 'Shanmugam', 30, '2021-09-18', '2020-12-26'),
(10, 'barcode.png', 'Diary', 'Category 8', 'paper', '50', 400, 'praveen', 200, '2021-08-28', '2020-08-06'),
(11, 'barcode.png', 'Erazer', 'Select Category 1', 'rubber', '5.00', 200, 'Naveen', 60, '2021-01-12', '2021-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `firstname` varchar(11) NOT NULL,
  `lastname` varchar(11) NOT NULL,
  `email` varchar(33) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `company` varchar(40) NOT NULL,
  `display_name` varchar(33) NOT NULL,
  `website` varchar(40) NOT NULL,
  `other` varchar(33) NOT NULL,
  `gst_in` varchar(30) NOT NULL,
  `address` varchar(40) NOT NULL,
  `comments` varchar(40) NOT NULL,
  `tax_info` varchar(30) NOT NULL,
  `amount_paid` varchar(35) NOT NULL,
  `amount_pending` varchar(30) NOT NULL,
  `payment_mode` varchar(30) NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `attachments` varchar(50) NOT NULL,
  `pan_no` varchar(25) NOT NULL,
  `adhaar_no` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `firstname`, `lastname`, `email`, `phone`, `company`, `display_name`, `website`, `other`, `gst_in`, `address`, `comments`, `tax_info`, `amount_paid`, `amount_pending`, `payment_mode`, `payment_status`, `attachments`, `pan_no`, `adhaar_no`) VALUES
(1, 'Ramya', 'Rajendiran', 'ramya@gmail.com', 'XXXXXXXXX', 'company', 'company name', 'XXXXXXXXX', 'other', 'gst no', 'Address', 'add notes', 'tax details', '20,000', '10,000', 'Cash', 'Partially Paid', 'Add attachments', 'XXXXXXXXXXXX', 'XXXXXXXXXXXX'),
(2, 'Aruna', 'kumar', 'kumar@gmail.com', 'xxxxxxxxxx', 'company', 'company', 'website', 'none', 'xxxxxxxx', 'same', 'comments', '', '50,000', 'none', 'card', 'Paid', 'none', 'DYX45623789', ''),
(3, 'Priya ', 'dharshini', 'priya@gmail.com', 'xxxxxxxxxx', '', '', 'website', '', '', 'address', 'comments', '', '60,500', 'none', 'cash', 'Paid', '', '', ''),
(4, 'Reshma', 'ram', 'reshma@gmail.com', 'xxxxxxxxxx', '', '', 'website', '', '', 'Address', 'comments', '', '50,000', 'none', 'cash', 'Paid', '', '', ''),
(5, 'Priya ', 'kumar', 'aarthi@gmail.com', 'xxxxxxxxxx', 'company', '', 'website', '', 'xxxxxxxx', 'address', 'notes', 'none', '0.00', '50,000', 'credit', 'UnPaid', 'none', '', ''),
(6, 'Priya ', 'kumar', 'aarthi@gmail.com', 'xxxxxxxxxx', 'company', '', 'website', '', 'xxxxxxxx', 'address', 'notes', 'none', '80,000', 'none', 'card', 'Paid', 'none', '', ''),
(7, 'Priya ', 'kumar', 'aarthi@gmail.com', 'xxxxxxxxxx', 'company', '', 'website', '', 'xxxxxxxx', 'address', 'notes', 'none', '80,000', 'none', 'cash', 'Paid', 'none', '', 'xxxxxxxx'),
(8, 'Priya ', 'kumar', 'aarthi@gmail.com', 'xxxxxxxxxx', 'company', '', 'website', '', 'xxxxxxxx', 'address', 'notes', 'none', '80,000', 'none', 'card', 'Paid', 'none', 'dxy45623789', 'xxxxxxxx'),
(9, 'Karthick', 'raj', 'aarthi@gmail.com', 'xxxxxxxxxx', 'company', 'company', 'company@company.in', 'none', 'xxxxxxxx', 'address', 'notes', 'none', '0.00', '85,000', 'credit', 'UnPaid', 'none', 'dxy45623789', '78945132365'),
(10, 'Nandhini', 'kumar', 'nandhini@gmail.com', 'xxxxxxxxxx', 'company', 'company', 'company@company.in', 'none', 'xxxxxxxx', 'Address', 'Test comments', 'none', '15,000', '20,000', 'cash', 'Partially Paid', 'none', 'dxy45623789', '7894513236'),
(11, 'Nithin', 'kumar', 'Nithin@gmail.com', 'xxxxxxxxxx', 'company', 'company', 'www.company@company.in', 'none', 'xxxxxxxx', 'address', 'comments', 'none', '15,000', '20,000', 'Card', 'Partially Paid', 'none', 'xxxxxxxxxxx', 'xxxxxxxx'),
(12, 'Ram', 'dharshan', 'dharshan@gmail.com', 'xxxxxxxxxx', 'company', 'company', 'company@company.in', 'none', 'xxxxxxxx', 'address', 'notes', 'none', '40,000', 'none', 'none', 'none', 'none', 'xxxxxxxxxxx', 'xxxxxxxx');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(40) NOT NULL,
  `user_lastname` varchar(40) NOT NULL,
  `user_image` text NOT NULL,
  `user_phone` varchar(50) NOT NULL,
  `user_role` varchar(33) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_password` varchar(33) NOT NULL,
  `user_confirmpassword` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_image`, `user_phone`, `user_role`, `user_email`, `user_password`, `user_confirmpassword`) VALUES
(1, 'John', 'Brito', 'dog.jpg', '+91 9631245626', 'Super Admin', 'brito20@gmail.com', 'John@123', 'John@123'),
(109, 'Aarthi', 'srm', 'cat.crdownload', '9876543257', 'Super Admin', 'aarthi@gmail.com', 'Fruits@2020', 'Fruits@2020'),
(111, 'Ramya', 'Rajendiran', 'dog.jpg', 'xxxxxxxxxx', 'Admin', 'ramya@gmail.com', 'Teddy@123', 'Teddy@123'),
(112, 'Surjith', 'RS', 'dog.jpg', 'xxxxxxxxxx', 'Admin', 'surjithrs@gmail.com', 'Fruits@123', 'Fruits@123'),
(113, 'Vidhya', 'sri', 'cat.crdownload', 'xxxxxxxxxx', 'User', 'vidhya@gmail.com', 'Cat@4040', 'Cat@4040'),
(114, 'Balu', 'ram', 'profile.jfif', 'xxxxxxxxxx', 'user', 'arul12@gmail.com', 'Balu@123', 'Balu@123'),
(123, 'Reshma', 'raj', 'profile.jfif', '9563124585', 'User', 'reshma@gmail.com', 'Carrom@123', 'Carrom@123'),
(125, 'Priya', 'dharshini', 'profile.jfif', 'xxxxxxxxxx', 'User', 'priya@gmail.com', 'Priya@40', 'Priya@40'),
(127, 'Hari', 'ram', 'profile.jfif', 'xxxxxxxxxx', 'User', 'hari123@gmail', 'Test@2020', 'Test@2020'),
(130, 'Reshma', 'kumar', 'profile.jfif', 'xxxxxxxxxx', 'User', 'reshma123@gmail.com', 'Cat@1234', 'Cat@1234'),
(133, 'ammu', 'srm', 'profile.jfif', 'xxxxxxxxxx', 'User', 'ammu@gmail.com', 'Cat@2020', 'Cat@2020'),
(134, 'Balu', 'ram', 'profile.jfif', 'xxxxxxxxxx', 'User', 'arul12@gmail.com', 'Hide@4040', 'Hide@4040'),
(135, 'John', 'brito', 'profile.jfif', 'xxxxxxxxxx', 'User', 'john@gmail.com', 'Carrom@123', 'Carrom@123'),
(136, 'Alia', 'Mehra', 'profile.jfif', 'xxxxxxxxxx', 'User', 'alia@gmail.com', 'Dolphin@20', 'Dolphin@20'),
(137, 'Pragya', 'Mehra', 'profile.jfif', 'xxxxxxxxxx', 'User', 'pragya@gmail.com', 'Flowers*40', 'Flowers*40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`invnum`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `invnum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=610;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
