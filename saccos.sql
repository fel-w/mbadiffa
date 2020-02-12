-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2019 at 09:52 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saccos`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_clients`
--

CREATE TABLE `all_clients` (
  `User_No` int(11) NOT NULL,
  `User_ID` varchar(20) DEFAULT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Other_Names` varchar(100) NOT NULL,
  `Telephone` varchar(15) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Date_of_birth` date NOT NULL,
  `Religion` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Residence` varchar(20) NOT NULL,
  `Date_Added` date NOT NULL,
  `Staff_No` varchar(15) NOT NULL,
  `Staff_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_clients`
--

INSERT INTO `all_clients` (`User_No`, `User_ID`, `First_Name`, `Other_Names`, `Telephone`, `Email`, `Date_of_birth`, `Religion`, `Gender`, `Residence`, `Date_Added`, `Staff_No`, `Staff_Name`) VALUES
(1, 'MBAM-1', 'Felix', 'Wangota Daniel', '0705444606', 'wangottafelix@gmail.com', '1998-01-02', 'Christian', 'Male', 'Kampala', '2018-01-14', 'MBAS-1', 'Kamasu'),
(2, 'MBAM-2', 'Deborah', 'Masawi', '0790899368', 'mamadebbie11@gmail.com', '2001-05-02', 'Christian', 'Female', 'Ntinda', '2017-01-14', 'MBAS-1', 'Kamasu'),
(3, 'MBAM-3', 'Martin', 'Sseguya', '0700342311', 'martinsseguy@hotmail.com', '2000-11-19', 'Catholic', 'Male', 'Kitintale', '2016-01-14', 'MBAS-1', 'Kamasu'),
(4, 'MBAM-4', 'Maria', 'Namayanja', '0774198461', 'namarie@live.com', '1997-05-29', 'Anglican', 'Female', 'Najeera', '2015-01-14', 'MBAS-1', 'Kamasu');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `User_No` int(11) NOT NULL,
  `User_ID` varchar(20) DEFAULT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Other_Names` varchar(100) NOT NULL,
  `Telephone` varchar(15) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Total_Amount` int(11) DEFAULT '0',
  `Date_Deposited` date NOT NULL,
  `Transaction_ID` varchar(30) DEFAULT NULL,
  `Withdraw_Applied` varchar(5) NOT NULL DEFAULT 'No',
  `Withdraw_Amount` int(11) NOT NULL DEFAULT '0',
  `Staff_No` varchar(15) NOT NULL,
  `Staff_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loaned`
--

CREATE TABLE `loaned` (
  `User_No` int(11) NOT NULL,
  `User_ID` varchar(20) DEFAULT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Other_Names` varchar(100) NOT NULL,
  `Telephone` varchar(15) NOT NULL,
  `Membership_in_Years` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Amount_Cleared` int(11) NOT NULL DEFAULT '0',
  `Security` varchar(100) NOT NULL,
  `Date_Loaned` date NOT NULL,
  `Transaction_ID` varchar(30) DEFAULT NULL,
  `Clearance_ID` varchar(100) DEFAULT 'None',
  `Staff_No` varchar(15) NOT NULL,
  `Staff_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_payments`
--

CREATE TABLE `loan_payments` (
  `User_No` int(11) NOT NULL,
  `User_ID` varchar(20) DEFAULT NULL,
  `Telephone` varchar(15) NOT NULL,
  `Amount_Cleared` int(11) NOT NULL DEFAULT '0',
  `Date_Cleared` date NOT NULL,
  `Clearance_ID` varchar(100) DEFAULT 'None',
  `Staff_No` varchar(15) NOT NULL,
  `Staff_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_No` int(11) NOT NULL,
  `Staff_ID` varchar(20) DEFAULT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Other_Names` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `User_Name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_No`, `Staff_ID`, `First_Name`, `Other_Names`, `Gender`, `Password`, `User_Name`) VALUES
(1, 'MBAS-1', 'Kamasu', 'Paul', 'Male', '1febfe63d659a5379310c7329e1f129f', 'paul');

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `User_No` int(11) NOT NULL,
  `User_ID` varchar(20) DEFAULT NULL,
  `Withdraw_Amount` int(11) NOT NULL,
  `Old_Balance` int(11) NOT NULL,
  `New_Balance` int(11) NOT NULL,
  `Withdraw_Date` date NOT NULL,
  `Transaction_ID` varchar(60) DEFAULT NULL,
  `Staff_No` varchar(15) NOT NULL,
  `Staff_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_clients`
--
ALTER TABLE `all_clients`
  ADD PRIMARY KEY (`User_No`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`User_No`);

--
-- Indexes for table `loaned`
--
ALTER TABLE `loaned`
  ADD PRIMARY KEY (`User_No`);

--
-- Indexes for table `loan_payments`
--
ALTER TABLE `loan_payments`
  ADD PRIMARY KEY (`User_No`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_No`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`User_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_clients`
--
ALTER TABLE `all_clients`
  MODIFY `User_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `User_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loaned`
--
ALTER TABLE `loaned`
  MODIFY `User_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_payments`
--
ALTER TABLE `loan_payments`
  MODIFY `User_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `Staff_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `User_No` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
