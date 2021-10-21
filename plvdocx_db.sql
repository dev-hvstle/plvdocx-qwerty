-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2021 at 06:31 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plvdocx_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `document_tbl`
--

CREATE TABLE `document_tbl` (
  `document_id` int(11) NOT NULL,
  `document_name` varchar(30) NOT NULL,
  `document_pricePerPageInPhp` int(11) NOT NULL,
  `document_pages` int(11) NOT NULL,
  `document_processDays` int(3) NOT NULL,
  `document_icon` varchar(100) NOT NULL,
  `isDeleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document_tbl`
--

INSERT INTO `document_tbl` (`document_id`, `document_name`, `document_pricePerPageInPhp`, `document_pages`, `document_processDays`, `document_icon`, `isDeleted`) VALUES
(1, 'CAV', 150, 3, 2, 'image/cav.png', 0),
(2, 'COR', 100, 1, 5, 'image/inc.png', 0),
(3, 'LOA', 100, 1, 2, 'image/formsleaveofabsence.png', 0),
(4, 'Transfer Credentials', 100, 1, 2, 'image/transfercreds.png', 0),
(5, 'Diploma', 100, 1, 2, 'image/DIPLOMA.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employeetype_tbl`
--

CREATE TABLE `employeetype_tbl` (
  `employeeType_id` int(11) NOT NULL,
  `employeeType_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeetype_tbl`
--

INSERT INTO `employeetype_tbl` (`employeeType_id`, `employeeType_name`) VALUES
(1, 'admin'),
(2, 'registrar'),
(3, 'cashier');

-- --------------------------------------------------------

--
-- Table structure for table `employee_tbl`
--

CREATE TABLE `employee_tbl` (
  `employee_id` int(15) NOT NULL,
  `employee_fn` varchar(20) NOT NULL,
  `employee_mn` varchar(20) NOT NULL,
  `employee_ln` varchar(20) NOT NULL,
  `employee_type` int(20) NOT NULL,
  `employee_email` varchar(40) NOT NULL,
  `employee_username` varchar(20) NOT NULL,
  `employee_password` varchar(20) NOT NULL,
  `isActive` int(1) NOT NULL,
  `employee_isMale` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_tbl`
--

INSERT INTO `employee_tbl` (`employee_id`, `employee_fn`, `employee_mn`, `employee_ln`, `employee_type`, `employee_email`, `employee_username`, `employee_password`, `isActive`, `employee_isMale`) VALUES
(0, 'Harvey', 'Sanchez', 'Resurreccion', 1, '', 'rezsolutions', 'admin', 1, 0),
(1, 'Vince', '', 'Lucas', 2, '', 'irving', 'lucas', 1, 1),
(2, 'Kier', '', 'Uychutin', 3, '', 'kier', 'admin', 0, 1),
(3, 'Almiras', '', 'Pusing', 1, '', 'mira', 'admin', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notificationstudent_tbl`
--

CREATE TABLE `notificationstudent_tbl` (
  `notificationStudent_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `notificationStudent_description` varchar(1000) NOT NULL,
  `notificationStudent_isSeen` int(1) NOT NULL,
  `notificationStudent_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notificationstudent_tbl`
--

INSERT INTO `notificationstudent_tbl` (`notificationStudent_id`, `student_id`, `notificationStudent_description`, `notificationStudent_isSeen`, `notificationStudent_date`) VALUES
(1, 180227, 'TEST', 1, '2021-06-08'),
(2, 0, 'The Registrar is now processing your request.', 0, '2021-06-09'),
(3, 0, 'The Registrar is now processing your request.', 0, '2021-06-09'),
(4, 180227, 'The Registrar is now processing your request.', 1, '2021-06-09'),
(5, 180227, 'The Registrar is now processing your requestTOR', 1, '2021-06-09'),
(6, 180227, 'The Registrar is now processing your document TOR', 1, '2021-06-09'),
(7, 180227, 'Your requested document (TOR)is now being printed', 1, '2021-06-09'),
(8, 180227, 'Your requested document (TOR) is now being signed', 1, '2021-06-09'),
(9, 180227, 'Your requested document (TOR) is now being signed', 1, '2021-06-09'),
(10, 180227, 'Your requested document (TOR) is now ready to be released.', 1, '2021-06-09'),
(11, 180227, 'Your requested document (TOR) was released successfully.', 1, '2021-06-09'),
(12, 180227, 'The Registrar is now processing your document CAV', 1, '2021-08-03'),
(13, 180227, 'The Registrar is now processing your document CAV', 1, '2021-08-03'),
(14, 180227, 'The Registrar is now processing your document COR', 1, '2021-08-03'),
(15, 180227, 'Your requested document (CAV)is now being printed', 1, '2021-08-03'),
(16, 180227, 'Your requested document (CAV)is now being printed', 1, '2021-08-03'),
(17, 180227, 'Your requested document (CAV)is now being printed', 1, '2021-08-03'),
(18, 180227, 'Your requested document (COR)is now being printed', 1, '2021-08-03'),
(19, 180227, 'Your requested document (CAV) is now being stamped', 1, '2021-08-03'),
(20, 180227, 'Your requested document (CAV) is now being stamped', 1, '2021-08-03'),
(21, 180227, 'Your requested document (COR) is now being stamped', 1, '2021-08-03'),
(22, 180227, 'Your requested document (CAV) is now being stamped', 1, '2021-08-03'),
(23, 180227, 'Your requested document (CAV) is now being signed', 1, '2021-08-03'),
(24, 180227, 'Your requested document (CAV) is now being signed', 1, '2021-08-03'),
(25, 180227, 'Your requested document (COR) is now being signed', 1, '2021-08-03'),
(26, 180227, 'Your requested document (CAV) is now being signed', 1, '2021-08-03'),
(27, 180227, 'Your requested document (CAV) is now ready to be released.', 1, '2021-08-03'),
(28, 180227, 'Your requested document (CAV) is now ready to be released.', 1, '2021-08-03'),
(29, 180227, 'Your requested document (COR) is now ready to be released.', 1, '2021-08-03'),
(30, 180227, 'Your requested document (CAV) is now ready to be released.', 1, '2021-08-03'),
(31, 180227, 'Your requested document (CAV) was released successfully.', 1, '2021-08-03'),
(32, 180227, 'Your requested document (CAV) was released successfully.', 1, '2021-08-03'),
(33, 180227, 'Your requested document (COR) was released successfully.', 1, '2021-08-03'),
(34, 180227, 'Your requested document (CAV) was released successfully.', 1, '2021-08-03'),
(35, 180299, 'The Registrar is now processing your document CAV', 0, '2021-08-03'),
(36, 180299, 'Your requested document (CAV)is now being printed', 0, '2021-08-03'),
(37, 180299, 'Your requested document (CAV) is now being stamped', 0, '2021-08-03'),
(38, 180299, 'Your requested document (CAV) is now being signed', 0, '2021-08-03'),
(39, 180299, 'Your requested document (CAV) is now ready to be released.', 0, '2021-08-03'),
(40, 180299, 'Your requested document (CAV) was released successfully.', 0, '2021-08-03'),
(41, 180222, 'Your requested document (CAV)is now being printed', 0, '2021-10-10'),
(42, 180222, 'Your requested document (CAV) is now being stamped', 0, '2021-10-10'),
(43, 180222, 'Your requested document (CAV) is now being signed', 0, '2021-10-10'),
(44, 180222, 'Your requested document (CAV) is now ready to be released.', 0, '2021-10-10'),
(45, 180222, 'Your requested document (CAV) was released successfully.', 0, '2021-10-10'),
(46, 180227, 'The Registrar is now processing your document CAV', 1, '2021-10-10'),
(47, 180227, 'The Registrar is now processing your document CAV', 1, '2021-10-14'),
(48, 180227, 'The Registrar is now processing your document CAV', 1, '2021-10-14'),
(49, 180227, 'Your requested document (CAV)is now being printed', 1, '2021-10-14'),
(50, 180227, 'Your requested document (CAV) is now being stamped', 1, '2021-10-14'),
(51, 180227, 'Your requested document (CAV) is now being signed', 1, '2021-10-14'),
(52, 180227, 'Your requested document (CAV) is now ready to be released.', 1, '2021-10-14'),
(53, 180227, 'Your requested document (CAV) was released successfully.', 1, '2021-10-14'),
(54, 180220, '', 1, '2021-10-20'),
(55, 180220, '', 1, '2021-10-20'),
(56, 180220, '', 1, '2021-10-20'),
(57, 180220, '', 1, '2021-10-20'),
(58, 180220, '', 1, '2021-10-20'),
(59, 180220, '', 1, '2021-10-20'),
(60, 180220, 'Document (CAV) was successfully requested, please proceed to the cashier to pay!', 1, '2021-10-20'),
(61, 18, 'Document (CAV) was successfully requested, please proceed to the cashier to pay!', 0, '2021-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `studentlevel_tbl`
--

CREATE TABLE `studentlevel_tbl` (
  `studentLevel_id` int(11) NOT NULL,
  `studentLevel_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentlevel_tbl`
--

INSERT INTO `studentlevel_tbl` (`studentLevel_id`, `studentLevel_name`) VALUES
(1, 'College'),
(2, 'Senior High School');

-- --------------------------------------------------------

--
-- Table structure for table `studenttype_tbl`
--

CREATE TABLE `studenttype_tbl` (
  `studentType_id` int(11) NOT NULL,
  `studentType_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studenttype_tbl`
--

INSERT INTO `studenttype_tbl` (`studentType_id`, `studentType_name`) VALUES
(1, 'Graduate'),
(2, 'Undergraduate'),
(3, 'Alumni'),
(4, 'Drop Out/Transferred');

-- --------------------------------------------------------

--
-- Table structure for table `student_tbl`
--

CREATE TABLE `student_tbl` (
  `student_id` varchar(11) NOT NULL,
  `student_fn` varchar(20) NOT NULL,
  `student_mn` varchar(20) DEFAULT NULL,
  `student_ln` varchar(20) NOT NULL,
  `student_type` int(11) NOT NULL,
  `student_email` varchar(40) NOT NULL,
  `student_username` varchar(20) NOT NULL,
  `student_password` varchar(20) NOT NULL,
  `student_level` int(11) NOT NULL,
  `student_photo` varchar(100) NOT NULL,
  `isActive` int(11) NOT NULL,
  `student_isMale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_tbl`
--

INSERT INTO `student_tbl` (`student_id`, `student_fn`, `student_mn`, `student_ln`, `student_type`, `student_email`, `student_username`, `student_password`, `student_level`, `student_photo`, `isActive`, `student_isMale`) VALUES
('18-0229', 'Harvey Van', 'Sanchez', 'Resurreccion', 1, 'van.resurreccion@gmail.com', 'harves', '123123', 1, 'photos/61709c2538f516.49514734.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactiondetailed_tbl`
--

CREATE TABLE `transactiondetailed_tbl` (
  `transactionDetailed_id` int(11) NOT NULL,
  `transactionMaster_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `document_quantity` int(11) NOT NULL,
  `document_pages` int(11) NOT NULL,
  `document_pricePerPage` int(11) NOT NULL,
  `document_subtotal` int(11) NOT NULL,
  `transaction_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactiondetailed_tbl`
--

INSERT INTO `transactiondetailed_tbl` (`transactionDetailed_id`, `transactionMaster_id`, `document_id`, `document_quantity`, `document_pages`, `document_pricePerPage`, `document_subtotal`, `transaction_status`) VALUES
(29, 36, 1, 1, 3, 150, 150, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactionmaster_tbl`
--

CREATE TABLE `transactionmaster_tbl` (
  `transaction_id` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `amount_total` int(11) NOT NULL,
  `amount_payment` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `transaction_dateFinished` date NOT NULL,
  `isFinished` int(1) NOT NULL,
  `isCancelled` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactionmaster_tbl`
--

INSERT INTO `transactionmaster_tbl` (`transaction_id`, `student_id`, `employee_id`, `amount_total`, `amount_payment`, `transaction_date`, `transaction_dateFinished`, `isFinished`, `isCancelled`) VALUES
(36, '18-0229', 0, 150, 0, '2021-10-21', '2021-10-25', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactionstatus_tbl`
--

CREATE TABLE `transactionstatus_tbl` (
  `transactionStatus_id` int(11) NOT NULL,
  `transactionStatus_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactionstatus_tbl`
--

INSERT INTO `transactionstatus_tbl` (`transactionStatus_id`, `transactionStatus_name`) VALUES
(1, 'toPay'),
(2, 'processing'),
(3, 'printing'),
(4, 'stamping'),
(5, 'signature'),
(6, 'toRelease'),
(7, 'released'),
(8, 'unclaimed'),
(9, 'cancelled');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document_tbl`
--
ALTER TABLE `document_tbl`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `employeetype_tbl`
--
ALTER TABLE `employeetype_tbl`
  ADD PRIMARY KEY (`employeeType_id`);

--
-- Indexes for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `admintype` (`employee_type`);

--
-- Indexes for table `notificationstudent_tbl`
--
ALTER TABLE `notificationstudent_tbl`
  ADD PRIMARY KEY (`notificationStudent_id`);

--
-- Indexes for table `studentlevel_tbl`
--
ALTER TABLE `studentlevel_tbl`
  ADD PRIMARY KEY (`studentLevel_id`);

--
-- Indexes for table `studenttype_tbl`
--
ALTER TABLE `studenttype_tbl`
  ADD PRIMARY KEY (`studentType_id`);

--
-- Indexes for table `student_tbl`
--
ALTER TABLE `student_tbl`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `studenttype` (`student_type`),
  ADD KEY `studentlevel` (`student_level`);

--
-- Indexes for table `transactiondetailed_tbl`
--
ALTER TABLE `transactiondetailed_tbl`
  ADD PRIMARY KEY (`transactionDetailed_id`),
  ADD KEY `transaction_id` (`transactionMaster_id`);

--
-- Indexes for table `transactionmaster_tbl`
--
ALTER TABLE `transactionmaster_tbl`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `studentId` (`student_id`),
  ADD KEY `employeeId` (`employee_id`);

--
-- Indexes for table `transactionstatus_tbl`
--
ALTER TABLE `transactionstatus_tbl`
  ADD PRIMARY KEY (`transactionStatus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `document_tbl`
--
ALTER TABLE `document_tbl`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employeetype_tbl`
--
ALTER TABLE `employeetype_tbl`
  MODIFY `employeeType_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notificationstudent_tbl`
--
ALTER TABLE `notificationstudent_tbl`
  MODIFY `notificationStudent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `studentlevel_tbl`
--
ALTER TABLE `studentlevel_tbl`
  MODIFY `studentLevel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studenttype_tbl`
--
ALTER TABLE `studenttype_tbl`
  MODIFY `studentType_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactiondetailed_tbl`
--
ALTER TABLE `transactiondetailed_tbl`
  MODIFY `transactionDetailed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `transactionmaster_tbl`
--
ALTER TABLE `transactionmaster_tbl`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `transactionstatus_tbl`
--
ALTER TABLE `transactionstatus_tbl`
  MODIFY `transactionStatus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  ADD CONSTRAINT `admintype` FOREIGN KEY (`employee_type`) REFERENCES `employeetype_tbl` (`employeeType_id`);

--
-- Constraints for table `student_tbl`
--
ALTER TABLE `student_tbl`
  ADD CONSTRAINT `studentlevel` FOREIGN KEY (`student_level`) REFERENCES `studentlevel_tbl` (`studentLevel_id`),
  ADD CONSTRAINT `studenttype` FOREIGN KEY (`student_type`) REFERENCES `studenttype_tbl` (`studentType_id`);

--
-- Constraints for table `transactiondetailed_tbl`
--
ALTER TABLE `transactiondetailed_tbl`
  ADD CONSTRAINT `transaction_id` FOREIGN KEY (`transactionMaster_id`) REFERENCES `transactionmaster_tbl` (`transaction_id`);

--
-- Constraints for table `transactionmaster_tbl`
--
ALTER TABLE `transactionmaster_tbl`
  ADD CONSTRAINT `employeeId` FOREIGN KEY (`employee_id`) REFERENCES `employee_tbl` (`employee_id`),
  ADD CONSTRAINT `studentId` FOREIGN KEY (`student_id`) REFERENCES `student_tbl` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
