-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 06, 2022 at 05:38 PM
-- Server version: 10.6.7-MariaDB-log
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soal_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `g_customer`
--

CREATE TABLE `g_customer` (
  `REC_ID` int(11) NOT NULL,
  `CUSTOMER_ID` varchar(255) DEFAULT NULL,
  `CUSTOMER_NAME` varchar(255) DEFAULT NULL,
  `CUSTOMER_EMAIL` varchar(255) DEFAULT NULL,
  `CUSTOMER_PHONE` varchar(255) DEFAULT NULL,
  `CUSTOMER_ADDRESS` text DEFAULT NULL,
  `CREATED` datetime DEFAULT NULL,
  `UPDATED` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_customer`
--

INSERT INTO `g_customer` (`REC_ID`, `CUSTOMER_ID`, `CUSTOMER_NAME`, `CUSTOMER_EMAIL`, `CUSTOMER_PHONE`, `CUSTOMER_ADDRESS`, `CREATED`, `UPDATED`) VALUES
(1, '66780ae519', 'Rifaldi Setiawan', 'rifaldisetiawan6@gmail.com', '089653563221', 'confidential', '2022-10-07 12:30:03', '2022-10-07 12:30:45'),
(2, 'bf71d51cdc', 'Andika Primantara', 'andika@testing.com', '083456789012', 'Denpasar, Bali', '2022-10-07 12:30:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `g_service_booking`
--

CREATE TABLE `g_service_booking` (
  `REC_ID` int(11) NOT NULL,
  `BOOKING_ID` varchar(255) DEFAULT NULL,
  `CUSTOMER_ID` varchar(255) DEFAULT NULL,
  `TYPE_ID` varchar(255) DEFAULT NULL,
  `BOOKING_TARGET_DATE` datetime DEFAULT NULL,
  `CREATED` datetime DEFAULT NULL,
  `UPDATED` datetime DEFAULT NULL,
  `STATUS` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_service_booking`
--

INSERT INTO `g_service_booking` (`REC_ID`, `BOOKING_ID`, `CUSTOMER_ID`, `TYPE_ID`, `BOOKING_TARGET_DATE`, `CREATED`, `UPDATED`, `STATUS`) VALUES
(1, '40e762d92d', 'bf71d51cdc', '3dac62b2a6', '2022-10-07 11:30:00', '2022-10-07 12:35:10', NULL, 'BOOKED');

-- --------------------------------------------------------

--
-- Table structure for table `g_service_category`
--

CREATE TABLE `g_service_category` (
  `REC_ID` int(11) NOT NULL,
  `CATEGORY_ID` varchar(255) DEFAULT NULL,
  `CATEGORY_NAME` varchar(255) DEFAULT NULL,
  `CREATED` datetime DEFAULT NULL,
  `UPDATED` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_service_category`
--

INSERT INTO `g_service_category` (`REC_ID`, `CATEGORY_ID`, `CATEGORY_NAME`, `CREATED`, `UPDATED`) VALUES
(1, 'd12312033a', 'Kategori Service Ringan', '2022-10-07 12:32:07', NULL),
(2, '9887ffb4e4', 'Kategori Service Berat', '2022-10-07 12:32:16', NULL),
(3, 'c479a216f3', 'Kategori Penggantian Sparepart', '2022-10-07 12:32:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `g_service_type`
--

CREATE TABLE `g_service_type` (
  `REC_ID` int(11) NOT NULL,
  `CATEGORY_ID` varchar(255) DEFAULT NULL,
  `TYPE_ID` varchar(255) DEFAULT NULL,
  `TYPE_NAME` varchar(255) DEFAULT NULL,
  `CREATED` datetime DEFAULT NULL,
  `UPDATED` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_service_type`
--

INSERT INTO `g_service_type` (`REC_ID`, `CATEGORY_ID`, `TYPE_ID`, `TYPE_NAME`, `CREATED`, `UPDATED`) VALUES
(1, 'd12312033a', '63d7a385c4', 'Service 10000 KM', '2022-10-07 12:32:34', NULL),
(2, 'd12312033a', '3ff5544df2', 'Service 15000 KM', '2022-10-07 12:32:46', NULL),
(3, 'd12312033a', '2cd824e6e4', 'Service 20000 KM', '2022-10-07 12:33:00', NULL),
(4, 'd12312033a', 'ccfcdb7d9b', 'Service Diatas 20000 KM', '2022-10-07 12:33:09', NULL),
(5, '9887ffb4e4', '3e3cc92a0f', 'Turun Mesin', '2022-10-07 12:33:18', NULL),
(6, '9887ffb4e4', 'a5bfd3871d', 'Pengecatan Ulang', '2022-10-07 12:33:26', NULL),
(7, 'c479a216f3', '4d00ca2141', 'Ban', '2022-10-07 12:33:42', NULL),
(8, 'c479a216f3', 'fe3b236d03', 'Velg', '2022-10-07 12:33:55', NULL),
(9, 'c479a216f3', '80f576c92f', 'Kaca', '2022-10-07 12:34:02', NULL),
(10, 'c479a216f3', '3dc0810c63', 'Jok', '2022-10-07 12:34:10', NULL),
(11, 'c479a216f3', '3dac62b2a6', 'Lainnya', '2022-10-07 12:34:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `s_user`
--

CREATE TABLE `s_user` (
  `REC_ID` int(11) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `GROUP_USER` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_user`
--

INSERT INTO `s_user` (`REC_ID`, `USERNAME`, `PASSWORD`, `GROUP_USER`) VALUES
(1, 'Admin', '$2y$10$ZSTygCnc0ziaAk9i17INq.dnX7yEtaTMVYv0lYLweFZL6b8lIJwta', 'ADMIN');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_g_service_booking`
-- (See below for the actual view)
--
CREATE TABLE `v_g_service_booking` (
`REC_ID` int(11)
,`BOOKING_ID` varchar(255)
,`CUSTOMER_ID` varchar(255)
,`BOOKING_TARGET_DATE` datetime
,`CREATED` datetime
,`UPDATED` datetime
,`STATUS` varchar(255)
,`CUSTOMER_NAME` varchar(255)
,`CUSTOMER_EMAIL` varchar(255)
,`CUSTOMER_PHONE` varchar(255)
,`CUSTOMER_ADDRESS` text
,`TYPE_ID` varchar(255)
,`TYPE_NAME` varchar(255)
,`CATEGORY_ID` varchar(255)
,`CATEGORY_NAME` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_g_service_type`
-- (See below for the actual view)
--
CREATE TABLE `v_g_service_type` (
`REC_ID` int(11)
,`CATEGORY_ID` varchar(255)
,`TYPE_ID` varchar(255)
,`TYPE_NAME` varchar(255)
,`CREATED` datetime
,`UPDATED` datetime
,`CATEGORY_NAME` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `v_g_service_booking`
--
DROP TABLE IF EXISTS `v_g_service_booking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_g_service_booking`  AS SELECT `a`.`REC_ID` AS `REC_ID`, `a`.`BOOKING_ID` AS `BOOKING_ID`, `a`.`CUSTOMER_ID` AS `CUSTOMER_ID`, `a`.`BOOKING_TARGET_DATE` AS `BOOKING_TARGET_DATE`, `a`.`CREATED` AS `CREATED`, `a`.`UPDATED` AS `UPDATED`, `a`.`STATUS` AS `STATUS`, `b`.`CUSTOMER_NAME` AS `CUSTOMER_NAME`, `b`.`CUSTOMER_EMAIL` AS `CUSTOMER_EMAIL`, `b`.`CUSTOMER_PHONE` AS `CUSTOMER_PHONE`, `b`.`CUSTOMER_ADDRESS` AS `CUSTOMER_ADDRESS`, `a`.`TYPE_ID` AS `TYPE_ID`, `c`.`TYPE_NAME` AS `TYPE_NAME`, `d`.`CATEGORY_ID` AS `CATEGORY_ID`, `d`.`CATEGORY_NAME` AS `CATEGORY_NAME` FROM (((`g_service_booking` `a` left join `g_customer` `b` on(`a`.`CUSTOMER_ID` = `b`.`CUSTOMER_ID`)) left join `g_service_type` `c` on(`a`.`TYPE_ID` = `c`.`TYPE_ID`)) left join `g_service_category` `d` on(`c`.`CATEGORY_ID` = `d`.`CATEGORY_ID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_g_service_type`
--
DROP TABLE IF EXISTS `v_g_service_type`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_g_service_type`  AS SELECT `a`.`REC_ID` AS `REC_ID`, `a`.`CATEGORY_ID` AS `CATEGORY_ID`, `a`.`TYPE_ID` AS `TYPE_ID`, `a`.`TYPE_NAME` AS `TYPE_NAME`, `a`.`CREATED` AS `CREATED`, `a`.`UPDATED` AS `UPDATED`, `b`.`CATEGORY_NAME` AS `CATEGORY_NAME` FROM (`g_service_type` `a` left join `g_service_category` `b` on(`a`.`CATEGORY_ID` = `b`.`CATEGORY_ID`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `g_customer`
--
ALTER TABLE `g_customer`
  ADD PRIMARY KEY (`REC_ID`);

--
-- Indexes for table `g_service_booking`
--
ALTER TABLE `g_service_booking`
  ADD PRIMARY KEY (`REC_ID`);

--
-- Indexes for table `g_service_category`
--
ALTER TABLE `g_service_category`
  ADD PRIMARY KEY (`REC_ID`);

--
-- Indexes for table `g_service_type`
--
ALTER TABLE `g_service_type`
  ADD PRIMARY KEY (`REC_ID`);

--
-- Indexes for table `s_user`
--
ALTER TABLE `s_user`
  ADD PRIMARY KEY (`REC_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `g_customer`
--
ALTER TABLE `g_customer`
  MODIFY `REC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `g_service_booking`
--
ALTER TABLE `g_service_booking`
  MODIFY `REC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `g_service_category`
--
ALTER TABLE `g_service_category`
  MODIFY `REC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `g_service_type`
--
ALTER TABLE `g_service_type`
  MODIFY `REC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `s_user`
--
ALTER TABLE `s_user`
  MODIFY `REC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
