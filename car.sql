-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2021 at 08:53 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `bankname` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `acno` varchar(255) DEFAULT NULL,
  `isfc` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `bankname`, `branch`, `acno`, `isfc`) VALUES
(1, 'SBI (A/C - 8524261000009)', 'Viman nagar Branch, Pune -411014', '8524261000009', 'CNRB0008524'),
(2, 'SBI (A/C - 8524201000324)', 'Viman nagar Branch, Pune -411014', '8524201000323', 'CNRB0008524');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `car_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `model_no` int(11) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `car_name`, `price`, `model_no`, `color`) VALUES
(1, 'Fortuner', '3036000', 1004, 'black'),
(2, 'Audi', '4300000', 1003, 'white'),
(3, 'jaguar', '7000000', 1002, 'black'),
(19, 'BMW', '3036000', 1001, 'white');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `cname` varchar(255) DEFAULT NULL,
  `caddr` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `pan` varchar(255) DEFAULT NULL,
  `gstn` varchar(255) DEFAULT NULL,
  `state_code` int(11) DEFAULT NULL,
  `punchline` varchar(255) DEFAULT NULL,
  `webaddr` varchar(255) DEFAULT NULL,
  `fssai_no` varchar(255) DEFAULT NULL,
  `short_code` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `cname`, `caddr`, `email`, `mobile`, `pan`, `gstn`, `state_code`, `punchline`, `webaddr`, `fssai_no`, `short_code`) VALUES
(1, 'car', 'pune', 'abcd@gmail.com', '6785746777', '67577', '27AAAA', 27, 'Stockist of Industrial Oil', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `name`, `email`, `phone`, `city`) VALUES
(55, 'raj', '21', 'abcd', 'pune'),
(58, 'ewwtryttyy gjkhklk', '43', '+919623818411', 'AT POST-KHIRDI BK  T'),
(59, 'abcd ffhjikjikj', '76', '09623818411', 'AT POST-KHIRDI BK  T'),
(64, 'ewwtryttyy ', '21', '818411', 'AT POST-KHIRDI BK  T'),
(65, 'now and', '21', '45', 'pune'),
(66, 'fghjkkk', '32', '43', 'ff'),
(67, 'ewwtryttyy ', '21', '+919623818411', 'AT POST-KHIRDI BK  T'),
(68, 'abcd ffhjikjikj', '21', '09623818411', 'AT POST-KHIRDI BK  T'),
(69, 'ewwtryttyy ', '21', '9623818411', 'AT POST-KHIRDI BK  T'),
(76, 'fggg', 'abcd@gmail.com', '+919623818411', 'Jalgaon'),
(78, 'sonu', 'abcd@gmail.com', '+919623818411', 'Jalgaon'),
(79, 'sonu', 'abcd@gmail.com', '+919623818411', 'Jalgaon'),
(80, 'ewwtryttyy gjkhklk', 'abcd@gmail.com', '+919623818411', 'Jalgaon'),
(81, 'ewwtryttyy gjkhklk', 'abcd@gmail.com', '+919623818411', 'Jalgaon'),
(83, 'patil jayesh ', '', '9623818411', 'AT POST-KHIRDI BK  T'),
(84, 'ewwtryttyy gjkhklk', 'abcd@gmail.com', '+919623818411', 'AT POST-KHIRDI BK  T');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `caddr` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `gstn_no` varchar(255) NOT NULL,
  `pan_no` varchar(255) NOT NULL,
  `state_code` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `cname`, `caddr`, `email`, `mobile`, `gstn_no`, `pan_no`, `state_code`, `age`, `gender`) VALUES
(1, 'abc', 'pune', 'abc@gmail.com', '7865', '67', '65477', '456732', 21, 'male'),
(2, 'raju', 'pune', 'abcd@gmail.com', '+919623818411', '5%', '67577', 'Maharashtra', 21, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`id`, `description`, `skills`, `address`, `designation`, `age`) VALUES
(4, 'Nikhil Mahajan', 'abcd', 'abcd', 'abcd', 21),
(9, 'monu', 'ggggggggggg', 'jjjjjjjjjjjjjjj', 'kkkkkkkkkkk', 21),
(11, 'raj', 'abcd', 'edfr', 'edsf', 21),
(12, 'abcdefg', 'abcd', 'tgfr', 'ab', 21),
(15, 'sonu', 'abcd', 'ikkkk', 'raja', 21),
(16, 'Nikhil m', 'oooo', 'ooo', 'oooo', 21);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `hobbies`, `address`, `designation`, `age`) VALUES
(7, 'abcdefg', 'abcd', 'ghjk', 'abcd', 21),
(8, 'abcd', '5000', 'pune', 'trrrrrrrrrrrrrr', 21),
(9, 'Nikhil', 'abcd', 'fhfh', 'hfhhf', 21);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `unitofm` varchar(255) NOT NULL,
  `purchaseprice` varchar(255) NOT NULL,
  `gst` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `description`, `unitofm`, `purchaseprice`, `gst`, `category`) VALUES
(7, ' new  model', '4', '900000', '5', 'new'),
(17, 'abc', '21', '5000', '5%', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `name`, `password`, `email`, `mobile_no`) VALUES
(1, 'Admin', 'jay', 'admin', 'a@gmail.com', '8600005566'),
(3, 'Kaushal', 'Kaushal', 'admin', 'abcd@gmail.com', '678594777');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `model_no` int(11) NOT NULL,
  `price` int(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `order_id` varchar(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cname`, `model_no`, `price`, `order_date`, `cust_name`, `address`, `mobile_no`, `pincode`, `email`, `order_id`, `qty`, `total`) VALUES
(1, 'a', 1, 1, '6', 'n', 'n', '7', 7, 'a', '1', 0, '1'),
(2, 'Audi', 1002, 4319000, '2021-07-24', 'ewwtryttyy gjkhklk', 'AT POST-KHIRDI BK  TAL-RAVER  DIST-JALGAON', '09623818411', 425507, 'abcd@gmail.com', 'Id355134', 0, '4319000'),
(7, 'Fortuner', 1001, 3036000, '2021-07-23', 'eww', 'AT POST-KHIRDI BK  TAL-RAVER  DIST-JALGAO', '6789', 425507, 'abcd@gmail.com', 'Id86291', 0, '3036000'),
(10, 'Fortuner', 1001, 3036000, '2021-07-23', 'ewwtryttyy gjkhklk', 'AT POST-KHIRDI BK  TAL-RAVER  DIST-JALGAON', '4567', 425507, 'abcd@gmail.com', 'Id317582', 0, '3036000'),
(19, 'Fortuner', 1001, 3036000, '2021-07-23', 'Nikhil Mahajan', 'pune', '9623818411', 425507, 'nikhil@gmail', 'Id143108', 0, '3036000'),
(20, 'Fortuner', 1001, 3036000, '2021-07-23', 'Nikhil Mahajan', 'AT POST-', '8769', 425507, 'abcd@gmail.com', 'Id37812', 0, '3036000'),
(21, 'Jaguar', 1003, 5567000, '2021-07-23', 'nik', 'AT POST-KHIRDI BK  TAL-RAVER  DIST-JALGAON', '777777', 425507, 'abcd@gmail.com', 'Id169490', 0, '5567000'),
(22, 'Fortuner', 1001, 3036000, '2021-07-23', 'ewwtryttyy gjkhklk', 'AT POST-KHIRDI BK  TAL-RAVER  DIST-JALGAON', '6789', 425507, 'abcd@gmail.com', 'Id82635', 1, '3036000'),
(23, 'BMW', 0, 0, '2021-07-23', 'ewwtryttyy gjkhklk', '', '9623818411', 425507, '', 'Id221473', 0, ''),
(24, 'Fortuner', 0, 0, '2021-07-23', 'ewwtryttyy gjkhklk', '', '56789', 425507, '', 'Id142256', 0, ''),
(25, 'BMW', 1004, 3888000, '2021-07-23', 'ewwtryttyy gjkhklk', 'AT POST-KHIRDI BK  TAL-RAVER  DIST-JALGAON', '09623818411', 425507, 'abcd@gmail.com', 'Id123043', 1, '3888000'),
(29, 'Fortuner', 0, 0, '2021-07-23', 'ewwtryttyy gjkhklk', '', '9623818411', 425507, '', 'Id65271', 0, ''),
(30, 'Jaguar', 1003, 5567000, '2021-07-23', 'ewwtryttyy gjkhklk', 'AT POST-KHIRDI BK  TAL-RAVER  DIST-JALGAON', '6789', 425507, 'abcd@gmail.com', 'Id468817', 1, '5567000'),
(31, 'Fortuner', 1001, 3036000, '2021-07-23', 'gh', 'AT', '09623818411', 425507, 'abcd@gmail.com', 'Id349549', 1, '3036000'),
(32, 'Fortuner', 1001, 3036000, '2021-07-23', 'ewwtryttyy gjkhklk', 'AT POST-KHIRDI BK  TAL-RAVER  DIST-JALGAON', '', 425507, 'abcd@gmail.com', 'Id145643', 1, '3036000'),
(33, 'Jaguar', 1003, 5567000, '2021-07-23', 'ewwtryttyy gjkhklk', 'AT POST-KHIRDI BK  TAL-RAVER  DIST-JALGAON', '09623818411', 425507, 'abcd@gmail.com', 'Id80509', 1, '5567000'),
(36, 'BMW', 1004, 3888000, '2021-07-23', 'ewwtryttyy gjkhklk', 'AT POST-KHIRDI BK  TAL-RAVER  DIST-JALGAON', '09623818411', 425507, 'abcd@gmail.com', 'Id304432', 1, '3888000'),
(37, 'Fortuner', 1001, 3036000, '2021-07-23', 'ewwtryttyy gjkhklk', 'AT POST-KHIRDI BK  TAL-RAVER  DIST-JALGAON', '09623818411', 425507, 'abcd@gmail.com', 'Id29799', 1, '3036000'),
(38, 'BMW', 1001, 3036000, '', '', '', '', 0, '', 'Id104971', 1, '3036000');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `pdate` date DEFAULT NULL,
  `ehead` varchar(11) DEFAULT NULL,
  `amount` varchar(11) DEFAULT NULL,
  `mode` varchar(10) DEFAULT NULL,
  `chq_date` date DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `pdate`, `ehead`, `amount`, `mode`, `chq_date`, `remark`) VALUES
(2, '2021-08-09', '0', '11,097.00', 'cheque', '2021-08-09', 'd'),
(1, '2021-08-09', '0', '5,000.00', 'online', '2021-08-09', '78'),
(3, '2021-08-09', 'abc', '11,097.00', 'online', '2021-08-09', 'k');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `fname`, `lname`) VALUES
(1, 'sonu', 'patil'),
(2, 'monu', 'patil');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `roll_no` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `roll_no`, `name`, `email`, `address`, `class_name`, `gender`, `created_date`) VALUES
(1, '0001', 'Student', 'student@webhaunt.com', '34,100 GH, New York, USA', 'Pre-Nursery ', 'Male', '2020-02-09 14:44:10'),
(2, '0002', 'Sdudent-2', 'student2@webhaunt.com', '20/105 Street , New York, USA', 'UKG', 'Male', '2020-02-09 21:01:58'),
(6, '0003', 'Sdudent-3', 'student3@webhaunt.com', '9228 Peninsula Drive\r\nCarol Stream, IL 60188', 'LKG', 'Female', '2020-02-09 21:01:58'),
(7, '0004', 'Sdudent-4', 'student4@webhaunt.com', '54 Sutor St.\r\nSanta Monica, CA 90403', '1st', 'Female', '2020-02-09 21:01:58'),
(8, '0005', 'Sdudent-5', 'student5@webhaunt.com', '640 Front Ave.\r\nDrexel Hill, PA 19026', '5th', 'Male', '2020-02-09 21:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `supp`
--

CREATE TABLE `supp` (
  `id` int(11) NOT NULL,
  `sname` varchar(255) DEFAULT NULL,
  `saddr` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `gstn_no` varchar(255) NOT NULL,
  `pan_no` varchar(255) NOT NULL,
  `state_code` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supp`
--

INSERT INTO `supp` (`id`, `sname`, `saddr`, `email`, `mobile`, `gstn_no`, `pan_no`, `state_code`) VALUES
(1, 'abc', 'pune', 'abc@gmail.com', '7865436544', '', '', ''),
(2, 'abc', 'a', 'abcd@gmail.com', '+919623818411', '5%', 'ggg', 'Maharashtra');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `image`, `price`) VALUES
(1, 'light', '1.jpg', 100.00),
(2, 'break', '2.jpg', 299.00),
(3, 'mirror', '3.jpg', 125.00),
(4, 'tyres', '2.jpg', 5000.00);

-- --------------------------------------------------------

--
-- Table structure for table `transporter`
--

CREATE TABLE `transporter` (
  `id` int(11) NOT NULL,
  `tname` varchar(255) DEFAULT NULL,
  `taddr` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transporter`
--

INSERT INTO `transporter` (`id`, `tname`, `taddr`, `email`, `mobile`) VALUES
(1, 'x', 'xx', 'x', 'xx'),
(2, 'y', 'y', 'y', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `godown` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_id`, `user_pass`, `email`, `mobile`, `godown`) VALUES
(1, 'fgg', 'ggg', 'ggg', 'abcd@gmail.com', '9623818411', NULL),
(2, 'fggg', 'nik', 'ggg', 'abcd@gmail.com', '9623818411', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supp`
--
ALTER TABLE `supp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transporter`
--
ALTER TABLE `transporter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supp`
--
ALTER TABLE `supp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transporter`
--
ALTER TABLE `transporter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
