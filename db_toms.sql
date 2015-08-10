-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 10, 2015 at 12:55 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_toms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `id_customer` int(10) NOT NULL,
  `Cust_Name` varchar(100) NOT NULL,
  `Address` text NOT NULL,
  `City` varchar(100) NOT NULL,
  `id_product` varchar(100) NOT NULL,
  `id_status` varchar(100) NOT NULL,
  `BW_Packet` varchar(100) NOT NULL,
  `One_Time_Charge` varchar(100) NOT NULL,
  `Abonemen` varchar(100) NOT NULL,
  `id_am` varchar(100) NOT NULL,
  `Personal_Name` varchar(100) NOT NULL,
  `Due_Date_Live` varchar(100) NOT NULL,
  `Input_Date` varchar(100) NOT NULL,
  `Direct_Number` varchar(100) NOT NULL,
  `Date_Of_Progress` varchar(100) NOT NULL,
  `PIC_Name` varchar(100) NOT NULL,
  `PIC_Number` varchar(100) NOT NULL,
  `Additional_Information` varchar(100) NOT NULL,
  `Put_In_Service_Date` varchar(100) NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `Cust_Name`, `Address`, `City`, `id_product`, `id_status`, `BW_Packet`, `One_Time_Charge`, `Abonemen`, `id_am`, `Personal_Name`, `Due_Date_Live`, `Input_Date`, `Direct_Number`, `Date_Of_Progress`, `PIC_Name`, `PIC_Number`, `Additional_Information`, `Put_In_Service_Date`) VALUES
(3, 'PT. Rudi Karya Indah', 'Jalan Kemerdekaan 4 Bandung', 'Bandung', '3', '4', '9840203mb', '8283283', '2321321', '2', 'Junaedi Ahmad', '190415', '190515', '092782327', '190215', 'No', 'No', 'No', '170415'),
(2, 'PT. Merdea Pusoransi', 'Jln. Merdeka 15 Bandung', 'Bandung', '2', '3', '92929292', '828282828', '313123123123', '2', '123u12312', 'jkkjnkjn', 'jno3', '32832', 'jiojo', '9203203', 'ji2o3j2', '2323', '323232'),
(5, 'PT. Aughrag Putra', 'Jln Keminggiran no 14 bantul', 'Yogyakarta', '3', '4', '92929213', '929391', '239212', '4', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(8, 'PT. XL Axiata', 'Bandung', 'Bandung', '2', '4', '-', '-', '-', '1', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(6, 'PT. MNC Grup', 'Malang', 'Malang', '1', '5', '-', '-', '-', '4', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(9, 'PT. Watazby Company', 'Jakarta', 'Jakarta', '2', '5', '-', '-', '-', '2', '-', '-', '-', '--', '-', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_personal_info`
--

CREATE TABLE IF NOT EXISTS `tbl_data_personal_info` (
  `Personal_Name` int(10) NOT NULL,
  `Address` text NOT NULL,
  `Email` varchar(100) NOT NULL,
  `CP` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data_personal_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `id_login` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id_login`, `username`, `password`, `nama`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Bima', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_am`
--

CREATE TABLE IF NOT EXISTS `tbl_master_am` (
  `id_am` int(10) NOT NULL AUTO_INCREMENT,
  `AM_Name` varchar(150) NOT NULL,
  `AM_Phone` varchar(150) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Address` text NOT NULL,
  PRIMARY KEY (`id_am`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_master_am`
--

INSERT INTO `tbl_master_am` (`id_am`, `AM_Name`, `AM_Phone`, `Email`, `Address`) VALUES
(1, 'Roni Kumbala', '087282828282', 'ronisaynaja@gmail.com', 'Playen Gunungkidul Yogkarata'),
(2, 'Ahmad Musadeq', '0293293293293', 'musadeqq@gmail.com', 'Wirobrajan Ngutilan Bantul'),
(4, 'Gendi Afarumbtu', '092929292', 'bababa@gmail.com', 'Bantul DIY'),
(3, 'Beta Sihombing', '02923232', 'huahaha@gmail.com', 'Kulonprogi DIY');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_product`
--

CREATE TABLE IF NOT EXISTS `tbl_master_product` (
  `id_product` int(10) NOT NULL AUTO_INCREMENT,
  `Product` varchar(100) NOT NULL,
  `Kind` varchar(100) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_master_product`
--

INSERT INTO `tbl_master_product` (`id_product`, `Product`, `Kind`) VALUES
(1, 'Astinet', 'Internet'),
(2, 'Usee TV', 'TV Cable'),
(3, 'Polimeria', 'Internet'),
(4, 'Lipoliara', 'Internet');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_status`
--

CREATE TABLE IF NOT EXISTS `tbl_master_status` (
  `id_status` int(10) NOT NULL AUTO_INCREMENT,
  `Status` varchar(100) NOT NULL,
  `Keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_master_status`
--

INSERT INTO `tbl_master_status` (`id_status`, `Status`, `Keterangan`) VALUES
(5, 'Closed', 'Closed'),
(3, 'Progressing', 'Cost Negotiable'),
(4, 'Progressing', 'Schedule Timing');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
