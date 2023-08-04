-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 01:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `acttran_dtl`
--

CREATE TABLE `acttran_dtl` (
  `co_code` int(2) DEFAULT NULL,
  `voucher_type` varchar(10) DEFAULT NULL,
  `voucher_no` int(10) DEFAULT NULL,
  `voucher_date` date DEFAULT NULL,
  `doc_year` varchar(4) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `refnum` int(10) DEFAULT NULL,
  `account_code` varchar(10) DEFAULT NULL,
  `debit` decimal(14,2) DEFAULT NULL,
  `credit` decimal(14,2) DEFAULT NULL,
  `amount` decimal(14,2) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `auto` varchar(1) DEFAULT NULL,
  `qty` decimal(14,2) DEFAULT NULL,
  `lc_code` varchar(10) DEFAULT NULL,
  `lcexp_code` int(3) DEFAULT NULL,
  `bank_cash_code` varchar(10) DEFAULT NULL,
  `dtl_rowid` varchar(50) DEFAULT NULL,
  `contra_account` varchar(1) DEFAULT NULL,
  `design_code` varchar(10) DEFAULT NULL,
  `product_code` varchar(2) DEFAULT NULL,
  `item_code` varchar(16) DEFAULT NULL,
  `vehicle_code` varchar(10) DEFAULT NULL,
  `dept_code` varchar(10) DEFAULT NULL,
  `entry_no` int(6) DEFAULT NULL,
  `gl_code` varchar(10) DEFAULT NULL,
  `pymt_type` varchar(3) DEFAULT NULL,
  `co1_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acttran_mst`
--

CREATE TABLE `acttran_mst` (
  `co_code` int(2) NOT NULL,
  `voucher_type` varchar(10) NOT NULL,
  `voucher_no` int(10) NOT NULL,
  `voucher_date` date DEFAULT NULL,
  `doc_year` varchar(4) NOT NULL,
  `ref_no` varchar(10) DEFAULT NULL,
  `bank_cash_code` varchar(10) DEFAULT NULL,
  `naration` varchar(250) DEFAULT NULL,
  `voucher_source` varchar(15) DEFAULT NULL,
  `chq_no` varchar(50) DEFAULT NULL,
  `chq_date` date DEFAULT NULL,
  `payee` varchar(100) DEFAULT NULL,
  `sn_type` varchar(10) DEFAULT NULL,
  `sn_no` int(10) DEFAULT NULL,
  `sn_date` date DEFAULT NULL,
  `bill_type` varchar(10) DEFAULT NULL,
  `bill_no` int(10) DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  `lc_code` varchar(10) DEFAULT NULL,
  `feed_date` date DEFAULT NULL,
  `system_date` date DEFAULT NULL,
  `print_date` date DEFAULT NULL,
  `item_code` varchar(10) DEFAULT NULL,
  `post` varchar(1) DEFAULT NULL,
  `entryusr` varchar(30) DEFAULT NULL,
  `entrydat` date DEFAULT NULL,
  `post_supp_age` varchar(1) DEFAULT NULL,
  `chq_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `act_chart`
--

CREATE TABLE `act_chart` (
  `co_code` int(2) NOT NULL,
  `control_code` varchar(3) NOT NULL,
  `sub_level1` varchar(4) NOT NULL,
  `sub_level2` varchar(3) NOT NULL,
  `open_debit` decimal(11,2) NOT NULL,
  `open_credit` decimal(11,2) NOT NULL,
  `descr` varchar(100) NOT NULL,
  `account_code` varchar(10) NOT NULL,
  `bs_type` int(1) NOT NULL,
  `foxcode` varchar(8) NOT NULL,
  `agent_code` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_name` varchar(30) NOT NULL,
  `phone_nos` varchar(50) NOT NULL,
  `fax_nos` varchar(15) NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `ntn` varchar(20) NOT NULL,
  `nic_nbr` varchar(20) NOT NULL,
  `crdays` int(6) NOT NULL,
  `crlimit` decimal(14,2) NOT NULL,
  `party_catg` varchar(1) NOT NULL,
  `city_code` varchar(4) NOT NULL,
  `group_code` varchar(4) NOT NULL,
  `area_code` varchar(6) NOT NULL,
  `party_abr` varchar(3) NOT NULL,
  `party_type` varchar(1) NOT NULL,
  `bill_type` varchar(2) NOT NULL,
  `del` varchar(1) NOT NULL,
  `entryusr` varchar(30) NOT NULL,
  `entrydat` date NOT NULL,
  `zone_code` varchar(1) NOT NULL,
  `stop_dlv` varchar(1) NOT NULL,
  `gl_type` varchar(1) NOT NULL,
  `last_chq_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `act_chart`
--

INSERT INTO `act_chart` (`co_code`, `control_code`, `sub_level1`, `sub_level2`, `open_debit`, `open_credit`, `descr`, `account_code`, `bs_type`, `foxcode`, `agent_code`, `address`, `contact_name`, `phone_nos`, `fax_nos`, `e_mail`, `gst`, `ntn`, `nic_nbr`, `crdays`, `crlimit`, `party_catg`, `city_code`, `group_code`, `area_code`, `party_abr`, `party_type`, `bill_type`, `del`, `entryusr`, `entrydat`, `zone_code`, `stop_dlv`, `gl_type`, `last_chq_no`) VALUES
(1, '101', '0000', '000', 0.00, 0.00, 'CAPITAL CONTROL A/C', '1010000000', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '101', '0001', '000', 0.00, 0.00, 'PARTNER CAPITAL ACCOUNT', '1010001000', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '101', '0001', '001', 0.00, 0.00, 'CAPITAL A/C - MR.UMER MALIK', '1010001001', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '101', '0001', '002', 0.00, 0.00, 'CAPITAL A/C - MR.LIAQAT MALIK', '1010001002', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '301', '0000', '000', 0.00, 0.00, 'SUNDRY CREDITORS', '3010000000', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '301', '0001', '000', 0.00, 0.00, 'SUNDRY CREDITORS - FEED', '3010001000', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '301', '0001', '001', 0.00, 0.00, 'CREDITORS - FEED', '3010001001', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '305', '0000', '000', 0.00, 0.00, 'YASIR TESTING CO 2', '3050000000', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '305', '0001', '000', 0.00, 0.00, 'YASIR TESTING CO 2', '3050001000', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '305', '0001', '001', 0.00, 0.00, 'YASIR TESTING CO 2', '3050001001', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '369', '0000', '000', 0.00, 0.00, 'CONTROL ACCOUNT 1', '3690000000', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '369', '0001', '000', 0.00, 0.00, 'SUB CONTROL ACCOUNT 1', '3690001000', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '369', '0001', '001', 0.00, 0.00, 'SUBSIDIARY ACCOUNT 1', '3690001001', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '601', '0000', '000', 0.00, 0.00, 'TRADE DEBITORS - FEED', '6010000000', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '601', '0001', '000', 0.00, 0.00, 'TRADE DEBITORS FEED - ZONE 1', '6010001000', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '601', '0001', '001', 0.00, 0.00, 'TRADE DEBITORS FEED - ZONE 1 - KARACHI', '6010001001', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '701', '0000', '000', 0.00, 0.00, 'CASH BALANCES', '7010000000', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '701', '0001', '000', 0.00, 0.00, 'CASH BALANCES - KARACHI', '7010001000', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '701', '0001', '001', 520487.00, 0.00, 'CASH - KARACHI', '7010001001', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '702', '0000', '000', 0.00, 0.00, 'BANK BALANCES', '7020000000', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '702', '0001', '000', 0.00, 0.00, 'BANK BALANCE - AL BARKA BANK PAKISTAN LTD', '7020001000', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '702', '0001', '001', 3638286.55, 0.00, 'ALBARAKA BANK - MAIN BR. KHI', '7020001001', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '801', '0000', '000', 0.00, 0.00, 'SALES - FEED', '8010000000', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '801', '0001', '000', 0.00, 0.00, 'SALES - FEED', '8010001000', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '801', '0001', '001', 0.00, 0.00, 'SALES FEED - IMP', '8010001001', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '861', '0000', '000', 0.00, 0.00, 'PURCHASE - FEED', '8610000000', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '861', '0011', '000', 0.00, 0.00, 'PURCHASE - FEED', '8610001000', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '861', '0011', '001', 0.00, 0.00, 'PURCHASE FEED - IMPORTED', '8610001001', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '901', '0000', '000', 0.00, 0.00, 'ADMINSTRATIVE - EXPENSES', '9010000000', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '901', '0004', '000', 0.00, 0.00, 'TELEPHONE TELEX & INTERNET', '9010004000', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(1, '901', '0004', '001', 0.00, 0.00, 'INTERNET EXPENSES', '9010004001', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0.00, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_code` varchar(6) NOT NULL,
  `area_name` varchar(30) NOT NULL,
  `entry_user` varchar(30) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_code`, `area_name`, `entry_user`, `entry_date`) VALUES
('1', 'SADDAR 1', '', '0000-00-00'),
('2', 'MALL ROAD', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `bill_dtl_import_um`
--

CREATE TABLE `bill_dtl_import_um` (
  `CO_CODE` int(2) DEFAULT NULL,
  `DOC_NO` int(10) DEFAULT NULL,
  `DOC_TYPE` varchar(10) DEFAULT NULL,
  `DOC_YEAR` varchar(4) DEFAULT NULL,
  `DIV_CODE` varchar(4) DEFAULT NULL,
  `PO_CATG` varchar(1) DEFAULT NULL,
  `BILL_KEY` varchar(15) DEFAULT NULL,
  `PO_NO` varchar(15) DEFAULT NULL,
  `GRN_KEY` varchar(15) DEFAULT NULL,
  `DOC_DATE` date DEFAULT NULL,
  `REFNUM` varchar(10) DEFAULT NULL,
  `ENTRY_NO` int(6) DEFAULT NULL,
  `ITEM_CODE` varchar(10) DEFAULT NULL,
  `ITEM_TYPE` varchar(1) DEFAULT NULL,
  `ITEM_DETAIL` varchar(100) DEFAULT NULL,
  `QTY` decimal(12,2) DEFAULT NULL,
  `RECEIPT_QTY` decimal(12,2) DEFAULT NULL,
  `RATE` decimal(12,2) DEFAULT NULL,
  `AMT` decimal(12,2) DEFAULT NULL,
  `DISC_RATE` decimal(12,2) DEFAULT NULL,
  `DISC_AMT` decimal(12,2) DEFAULT NULL,
  `NET_AMT` decimal(12,2) DEFAULT NULL,
  `REMARKS` varchar(50) DEFAULT NULL,
  `PENDING` varchar(1) DEFAULT NULL,
  `BILLED` varchar(1) DEFAULT NULL,
  `BATCH_NO` varchar(30) DEFAULT NULL,
  `EXPIRY_DATE` date DEFAULT NULL,
  `PO_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_dtl_um`
--

CREATE TABLE `bill_dtl_um` (
  `SNO` int(11) NOT NULL,
  `CO_CODE` int(2) DEFAULT NULL,
  `DOC_NO` int(10) DEFAULT NULL,
  `DOC_TYPE` varchar(10) DEFAULT NULL,
  `DOC_YEAR` varchar(4) DEFAULT NULL,
  `DIV_CODE` varchar(4) DEFAULT NULL,
  `PO_CATG` varchar(1) DEFAULT NULL,
  `BILL_KEY` varchar(15) DEFAULT NULL,
  `PO_NO` varchar(15) DEFAULT NULL,
  `GRN_KEY` varchar(15) DEFAULT NULL,
  `DOC_DATE` date DEFAULT NULL,
  `REFNUM` varchar(10) DEFAULT NULL,
  `ENTRY_NO` int(6) DEFAULT NULL,
  `ITEM_CODE` varchar(10) DEFAULT NULL,
  `ITEM_TYPE` varchar(1) DEFAULT NULL,
  `ITEM_DETAIL` varchar(1000) DEFAULT NULL,
  `QTY` decimal(12,2) DEFAULT NULL,
  `RECEIPT_QTY` decimal(12,2) DEFAULT NULL,
  `RATE` decimal(12,2) DEFAULT NULL,
  `AMT` decimal(12,2) DEFAULT NULL,
  `DISC_RATE` decimal(12,2) DEFAULT NULL,
  `DISC_AMT` decimal(12,2) DEFAULT NULL,
  `NET_AMT` decimal(12,2) DEFAULT NULL,
  `REMARKS` varchar(50) DEFAULT NULL,
  `PENDING` varchar(1) DEFAULT NULL,
  `BILLED` varchar(1) DEFAULT NULL,
  `PRODUCT_CODE` varchar(10) DEFAULT NULL,
  `PO_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_mst_import_um`
--

CREATE TABLE `bill_mst_import_um` (
  `CO_CODE` int(2) NOT NULL,
  `DOC_NO` int(10) NOT NULL,
  `DOC_TYPE` varchar(10) NOT NULL,
  `DOC_YEAR` varchar(4) NOT NULL,
  `PO_CATG` varchar(1) NOT NULL,
  `DIV_CODE` varchar(4) NOT NULL,
  `BILL_KEY` varchar(15) DEFAULT NULL,
  `PO_NO` varchar(15) DEFAULT NULL,
  `DOC_DATE` date DEFAULT NULL,
  `ORDER_REFNUM` varchar(10) DEFAULT NULL,
  `ORDER_PARTY_REF` varchar(10) DEFAULT NULL,
  `REFNUM` varchar(10) DEFAULT NULL,
  `DLVRY_DATE` date DEFAULT NULL,
  `PARTY_CODE` varchar(10) DEFAULT NULL,
  `CRDAYS` int(3) DEFAULT NULL,
  `REMARKS` varchar(100) DEFAULT NULL,
  `POST` varchar(1) DEFAULT NULL,
  `STAX_CODE` varchar(10) DEFAULT NULL,
  `STAX_RATE` decimal(12,2) DEFAULT NULL,
  `STAX_AMT` decimal(12,2) DEFAULT NULL,
  `ADDTAX_CODE` varchar(10) DEFAULT NULL,
  `ADDTAX_RATE` decimal(12,2) DEFAULT NULL,
  `ADDTAX_AMT` decimal(12,2) DEFAULT NULL,
  `CHARGE_CODE` varchar(10) DEFAULT NULL,
  `CHARGE_AMT` decimal(14,2) DEFAULT NULL,
  `CHARGE_DPT` varchar(10) DEFAULT NULL,
  `FRT_CODE` varchar(10) DEFAULT NULL,
  `FRT_DPT` varchar(10) DEFAULT NULL,
  `OTHER_CHRGS` decimal(12,2) DEFAULT NULL,
  `DISC_CODE` varchar(10) DEFAULT NULL,
  `DISC_DPT` varchar(10) DEFAULT NULL,
  `OTHER_DED` decimal(12,2) DEFAULT NULL,
  `TOTAL_GROSS_AMT` decimal(12,2) DEFAULT NULL,
  `TOTAL_NET_AMT` decimal(12,2) DEFAULT NULL,
  `ENTRY_USER` varchar(30) DEFAULT NULL,
  `ENTRY_DATE` date DEFAULT NULL,
  `PENDING` varchar(1) DEFAULT NULL,
  `SYSTEM_DATE` date DEFAULT NULL,
  `REFNUM2` varchar(25) DEFAULT NULL,
  `PO_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_mst_um`
--

CREATE TABLE `bill_mst_um` (
  `SNO` int(11) NOT NULL,
  `CO_CODE` int(2) NOT NULL,
  `DOC_NO` int(10) NOT NULL,
  `DOC_TYPE` varchar(10) NOT NULL,
  `DOC_YEAR` varchar(4) NOT NULL,
  `PO_CATG` varchar(1) NOT NULL,
  `DIV_CODE` varchar(4) NOT NULL,
  `BILL_KEY` varchar(15) DEFAULT NULL,
  `PO_NO` varchar(15) DEFAULT NULL,
  `DOC_DATE` date DEFAULT NULL,
  `ORDER_REFNUM` varchar(10) DEFAULT NULL,
  `ORDER_PARTY_REF` varchar(10) DEFAULT NULL,
  `REFNUM` varchar(10) DEFAULT NULL,
  `DLVRY_DATE` date DEFAULT NULL,
  `PARTY_CODE` varchar(10) DEFAULT NULL,
  `CRDAYS` int(3) DEFAULT NULL,
  `REMARKS` varchar(100) DEFAULT NULL,
  `POST` varchar(1) DEFAULT NULL,
  `STAX_CODE` varchar(10) DEFAULT NULL,
  `STAX_RATE` decimal(12,2) DEFAULT NULL,
  `STAX_AMT` decimal(12,2) DEFAULT NULL,
  `ADDTAX_CODE` varchar(10) DEFAULT NULL,
  `ADDTAX_RATE` decimal(12,2) DEFAULT NULL,
  `ADDTAX_AMT` decimal(12,2) DEFAULT NULL,
  `CHARGE_CODE` varchar(10) DEFAULT NULL,
  `CHARGE_AMT` decimal(14,2) DEFAULT NULL,
  `CHARGE_DPT` varchar(10) DEFAULT NULL,
  `FRT_CODE` varchar(10) DEFAULT NULL,
  `FRT_DPT` varchar(10) DEFAULT NULL,
  `OTHER_CHRGS` decimal(12,2) DEFAULT NULL,
  `DISC_CODE` varchar(10) DEFAULT NULL,
  `DISC_DPT` varchar(10) DEFAULT NULL,
  `OTHER_DED` decimal(12,2) DEFAULT NULL,
  `TOTAL_GROSS_AMT` decimal(12,2) DEFAULT NULL,
  `TOTAL_NET_AMT` decimal(12,2) DEFAULT NULL,
  `ENTRY_USER` varchar(30) DEFAULT NULL,
  `ENTRY_DATE` date DEFAULT NULL,
  `PENDING` varchar(1) DEFAULT NULL,
  `SYSTEM_DATE` date DEFAULT NULL,
  `REFNUM2` varchar(25) DEFAULT NULL,
  `PO_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_code` varchar(4) NOT NULL,
  `city_name` varchar(30) NOT NULL,
  `entry_user` varchar(30) DEFAULT NULL,
  `entry_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_code`, `city_name`, `entry_user`, `entry_date`) VALUES
('1', 'KARACHI 1', NULL, NULL),
('2', 'LAHORE', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `co_code` int(2) NOT NULL,
  `co_name` varchar(100) NOT NULL,
  `co_add` varchar(100) NOT NULL,
  `ntn_no` varchar(20) NOT NULL,
  `st_no` varchar(20) NOT NULL,
  `co_abr` varchar(2) NOT NULL,
  `co_add2` varchar(100) NOT NULL,
  `co_add3` varchar(100) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `fax_no` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`co_code`, `co_name`, `co_add`, `ntn_no`, `st_no`, `co_abr`, `co_add2`, `co_add3`, `phone_no`, `fax_no`, `email`) VALUES
(1, 'COMPANY ONE', 'COMPANY ONE', '46546', '5646546', '45', '', '', '546465', '', ''),
(2, 'COMPANY 2', 'COMPANY 2', '6456', '646546', '45', '', '', '464', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `dc_dtl`
--

CREATE TABLE `dc_dtl` (
  `co_code` int(2) DEFAULT NULL,
  `doc_no` int(10) DEFAULT NULL,
  `doc_type` varchar(10) DEFAULT NULL,
  `doc_date` date DEFAULT NULL,
  `doc_year` varchar(4) DEFAULT NULL,
  `item_code` varchar(10) DEFAULT NULL,
  `item_type` varchar(1) DEFAULT NULL,
  `qty` decimal(12,2) DEFAULT NULL,
  `rate` decimal(12,2) DEFAULT NULL,
  `amt` decimal(12,2) DEFAULT NULL,
  `disc_rate` decimal(12,2) DEFAULT NULL,
  `disc_amt` decimal(12,2) DEFAULT NULL,
  `net_amt` decimal(12,2) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `entry_no` int(6) DEFAULT NULL,
  `po_catg` varchar(1) DEFAULT NULL,
  `div_code` varchar(4) DEFAULT NULL,
  `batch_no` varchar(30) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `loc_code` varchar(10) DEFAULT NULL,
  `po_no` varchar(15) DEFAULT NULL,
  `do_key_ref` varchar(15) DEFAULT NULL,
  `sale_code` varchar(10) DEFAULT NULL,
  `gl_code` varchar(10) DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `stax_rate` decimal(12,2) DEFAULT NULL,
  `stax_amt` decimal(12,2) DEFAULT NULL,
  `addtax_rate` decimal(12,2) DEFAULT NULL,
  `addtax_amt` decimal(12,2) DEFAULT NULL,
  `incl_stax_amt` decimal(12,2) DEFAULT NULL,
  `g_d` varchar(100) DEFAULT NULL,
  `gd_date` date DEFAULT NULL,
  `fr_rate` decimal(3,2) DEFAULT NULL,
  `fr_amt` decimal(12,2) DEFAULT NULL,
  `frt_rate` decimal(14,2) DEFAULT NULL,
  `frt_amt` decimal(14,2) DEFAULT NULL,
  `add_rate` decimal(14,2) DEFAULT NULL,
  `add_amt` decimal(14,2) DEFAULT NULL,
  `excl_rate` decimal(14,2) DEFAULT NULL,
  `excl_amt` decimal(14,2) DEFAULT NULL,
  `item_hscode` varchar(10) DEFAULT NULL,
  `receipt_qty` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dc_mst`
--

CREATE TABLE `dc_mst` (
  `co_code` int(2) NOT NULL,
  `doc_type` varchar(10) NOT NULL,
  `doc_no` int(10) NOT NULL,
  `doc_date` date DEFAULT NULL,
  `doc_year` varchar(4) NOT NULL,
  `refnum` varchar(10) DEFAULT NULL,
  `po_no` varchar(15) DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `po_catg` varchar(1) NOT NULL,
  `div_code` varchar(4) NOT NULL,
  `party_code` varchar(10) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `sman_code` varchar(10) DEFAULT NULL,
  `post` varchar(1) DEFAULT NULL,
  `crdays` int(6) DEFAULT NULL,
  `wh_code` varchar(10) DEFAULT NULL,
  `stax_rate` decimal(12,2) DEFAULT NULL,
  `stax_amt` decimal(12,2) DEFAULT NULL,
  `other_chrgs` decimal(12,2) DEFAULT NULL,
  `other_ded` decimal(12,2) DEFAULT NULL,
  `total_gross_amt` decimal(12,2) DEFAULT NULL,
  `total_net_amt` decimal(12,2) DEFAULT NULL,
  `entry_user` varchar(30) DEFAULT NULL,
  `do_key` varchar(15) DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `ship_mode` varchar(100) DEFAULT NULL,
  `ship_no` varchar(20) DEFAULT NULL,
  `order_refnum` varchar(10) DEFAULT NULL,
  `order_party_ref` varchar(10) DEFAULT NULL,
  `item_open` varchar(1) DEFAULT NULL,
  `stax_code` varchar(10) DEFAULT NULL,
  `frt_code` varchar(10) DEFAULT NULL,
  `disc_code` varchar(10) DEFAULT NULL,
  `addtax_code` varchar(10) DEFAULT NULL,
  `addtax_rate` decimal(14,2) DEFAULT NULL,
  `addtax_amt` decimal(14,2) DEFAULT NULL,
  `charge_code` varchar(10) DEFAULT NULL,
  `charge_amt` decimal(14,2) DEFAULT NULL,
  `remarks2` varchar(50) DEFAULT NULL,
  `charge_dpt` varchar(10) DEFAULT NULL,
  `frt_dpt` varchar(10) DEFAULT NULL,
  `disc_dpt` varchar(10) DEFAULT NULL,
  `refnum2` varchar(25) DEFAULT NULL,
  `exemption` varchar(50) DEFAULT NULL,
  `ledger_bal` decimal(14,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dept_store`
--

CREATE TABLE `dept_store` (
  `dept_code` varchar(10) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `entry_user` varchar(30) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dept_store`
--

INSERT INTO `dept_store` (`dept_code`, `dept_name`, `entry_user`, `entry_date`) VALUES
('1', 'IT DEPART 1', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `div_code` varchar(4) NOT NULL,
  `div_name` varchar(30) NOT NULL,
  `entry_user` varchar(30) NOT NULL,
  `entry_date` date NOT NULL,
  `subdiv_code` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`div_code`, `div_name`, `entry_user`, `entry_date`, `subdiv_code`) VALUES
('1', 'DIVISION ONE', '', '0000-00-00', '1'),
('2', 'DIVISION 2', '', '0000-00-00', '2');

-- --------------------------------------------------------

--
-- Table structure for table `div_allow`
--

CREATE TABLE `div_allow` (
  `sno` int(11) NOT NULL,
  `USER_ID` varchar(20) DEFAULT NULL,
  `DIV_CODE` varchar(4) DEFAULT NULL,
  `PERMISSION` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gen_name`
--

CREATE TABLE `gen_name` (
  `gen_code` varchar(10) NOT NULL,
  `gen_name` varchar(50) NOT NULL,
  `entry_user` varchar(30) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gen_name`
--

INSERT INTO `gen_name` (`gen_code`, `gen_name`, `entry_user`, `entry_date`) VALUES
('1', 'OXYGEN 1', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `co_code` int(2) NOT NULL,
  `div_code` varchar(4) NOT NULL,
  `item_code` varchar(10) NOT NULL,
  `item_name_pur` varchar(100) DEFAULT NULL,
  `item_name_sale` varchar(100) DEFAULT NULL,
  `gen_code` varchar(10) DEFAULT NULL,
  `um_code` varchar(10) DEFAULT NULL,
  `pur_mode` varchar(10) DEFAULT NULL,
  `packing` varchar(30) DEFAULT NULL,
  `brand` varchar(30) DEFAULT NULL,
  `origin` varchar(30) DEFAULT NULL,
  `trade_price` decimal(12,2) DEFAULT NULL,
  `disc_slab` decimal(12,2) DEFAULT NULL,
  `tax_rate` decimal(12,2) DEFAULT NULL,
  `min_level` decimal(12,2) DEFAULT NULL,
  `max_level` decimal(12,2) DEFAULT NULL,
  `open_qty` decimal(12,2) DEFAULT NULL,
  `open_val` decimal(12,2) DEFAULT NULL,
  `trs_qty` decimal(12,2) DEFAULT NULL,
  `trs_val` decimal(12,2) DEFAULT NULL,
  `bal_qty` decimal(12,2) DEFAULT NULL,
  `bal_val` decimal(12,2) DEFAULT NULL,
  `entry_user` decimal(30,0) DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `gl_code` varchar(10) DEFAULT NULL,
  `product_code` varchar(10) DEFAULT NULL,
  `item_div` varchar(10) DEFAULT NULL,
  `item_cat` varchar(10) DEFAULT NULL,
  `target_qty` decimal(10,0) DEFAULT NULL,
  `gl_code_sale` varchar(10) DEFAULT NULL,
  `item_code_ledger` varchar(10) DEFAULT NULL,
  `item_pcode` varchar(10) DEFAULT NULL,
  `item_scode` varchar(10) DEFAULT NULL,
  `item_name_sale2` varchar(100) DEFAULT NULL,
  `tp_rate2` decimal(12,2) DEFAULT NULL,
  `add_rate` decimal(12,2) DEFAULT NULL,
  `hscode` varchar(20) DEFAULT NULL,
  `open_rate` decimal(12,2) DEFAULT NULL,
  `close_qty` decimal(12,2) DEFAULT NULL,
  `close_rate` decimal(12,2) DEFAULT NULL,
  `close_val` decimal(12,2) DEFAULT NULL,
  `pur_qty` decimal(12,2) DEFAULT NULL,
  `pur_rate` decimal(12,2) DEFAULT NULL,
  `pur_val` decimal(12,2) DEFAULT NULL,
  `cost_sales` decimal(12,2) DEFAULT NULL,
  `lp_rate` decimal(12,2) DEFAULT NULL,
  `item_descr` varchar(400) DEFAULT NULL,
  `contain` decimal(14,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`co_code`, `div_code`, `item_code`, `item_name_pur`, `item_name_sale`, `gen_code`, `um_code`, `pur_mode`, `packing`, `brand`, `origin`, `trade_price`, `disc_slab`, `tax_rate`, `min_level`, `max_level`, `open_qty`, `open_val`, `trs_qty`, `trs_val`, `bal_qty`, `bal_val`, `entry_user`, `entry_date`, `gl_code`, `product_code`, `item_div`, `item_cat`, `target_qty`, `gl_code_sale`, `item_code_ledger`, `item_pcode`, `item_scode`, `item_name_sale2`, `tp_rate2`, `add_rate`, `hscode`, `open_rate`, `close_qty`, `close_rate`, `close_val`, `pur_qty`, `pur_rate`, `pur_val`, `cost_sales`, `lp_rate`, `item_descr`, `contain`) VALUES
(1, '1', '1', 'ITEM ONE', 'ITEM ONE', '1', '1', 'IMPORT', 'ITEM 1', 'ITEM 1', 'ITEM 1', 100.00, 10.00, 10.00, 10.00, 100.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '8610001001', '1', '1-1', 'TARGET', 0, '8010001001', NULL, '8880001001', '8580001001', 'ITEM 1', 100.00, 10.00, '1', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'ITEM 1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_batch_no`
--

CREATE TABLE `item_batch_no` (
  `CO_CODE` int(2) NOT NULL,
  `ITEM_CODE` varchar(50) NOT NULL,
  `LOC_CODE` int(10) NOT NULL,
  `BATCH_NO` int(30) NOT NULL,
  `EXPIRY_DATE` date NOT NULL,
  `OPEN_STOCK` decimal(12,2) DEFAULT NULL,
  `RCPT_STOCK` decimal(12,2) DEFAULT NULL,
  `ISS_STOCK` decimal(12,2) DEFAULT NULL,
  `BAL_STOCK` decimal(12,2) DEFAULT NULL,
  `ENTRY_DATE` date DEFAULT NULL,
  `ENTRY_USER` varchar(30) DEFAULT NULL,
  `G_D` varchar(20) DEFAULT NULL,
  `GD_DATE` date DEFAULT NULL,
  `ITEM_HSCODE` varchar(10) DEFAULT NULL,
  `ITEM_TAXRATE` decimal(12,2) DEFAULT NULL,
  `ADJ_QTY` decimal(14,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_batch_no`
--

INSERT INTO `item_batch_no` (`CO_CODE`, `ITEM_CODE`, `LOC_CODE`, `BATCH_NO`, `EXPIRY_DATE`, `OPEN_STOCK`, `RCPT_STOCK`, `ISS_STOCK`, `BAL_STOCK`, `ENTRY_DATE`, `ENTRY_USER`, `G_D`, `GD_DATE`, `ITEM_HSCODE`, `ITEM_TAXRATE`, `ADJ_QTY`) VALUES
(1, '1-1', 1, 1, '2022-02-02', 200.00, 0.00, 0.00, 200.00, NULL, NULL, '03325', '2022-02-02', '1', 10.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `item_wh_um`
--

CREATE TABLE `item_wh_um` (
  `co_code` int(2) NOT NULL,
  `item_code` varchar(10) NOT NULL,
  `loc_code` varchar(10) NOT NULL,
  `open_stock` decimal(12,2) DEFAULT NULL,
  `rcpt_stock` decimal(12,2) DEFAULT NULL,
  `iss_stock` decimal(12,2) DEFAULT NULL,
  `bal_stock` decimal(12,2) DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `entry_user` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `item_wh_um`
--

INSERT INTO `item_wh_um` (`co_code`, `item_code`, `loc_code`, `open_stock`, `rcpt_stock`, `iss_stock`, `bal_stock`, `entry_date`, `entry_user`) VALUES
(1, '1-1', '1', 100.00, 0.00, 0.00, 100.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `loc_code` varchar(10) NOT NULL,
  `loc_name` varchar(50) NOT NULL,
  `loc_add` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `entry_user` varchar(30) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`loc_code`, `loc_name`, `loc_add`, `phone_no`, `entry_user`, `entry_date`) VALUES
('1', 'KARACHI 1', 'KARACHI', '03353657876', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `order_dtl`
--

CREATE TABLE `order_dtl` (
  `co_code` int(2) NOT NULL,
  `doc_no` int(10) NOT NULL,
  `doc_type` varchar(10) NOT NULL,
  `doc_date` date NOT NULL,
  `doc_year` varchar(4) NOT NULL,
  `refnum` varchar(10) NOT NULL,
  `item_code` varchar(10) NOT NULL,
  `item_type` varchar(1) NOT NULL,
  `qty` decimal(12,2) NOT NULL,
  `rate` decimal(12,2) NOT NULL,
  `amt` decimal(12,2) NOT NULL,
  `disc_rate` decimal(12,2) NOT NULL,
  `disc_amt` decimal(12,2) NOT NULL,
  `net_amt` decimal(12,2) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `receipt_qty` decimal(12,2) NOT NULL,
  `pending` varchar(1) NOT NULL,
  `entry_no` int(6) NOT NULL,
  `div_code` varchar(4) NOT NULL,
  `po_catg` varchar(1) NOT NULL,
  `order_key` varchar(15) NOT NULL,
  `stax_rate` decimal(10,2) NOT NULL,
  `stax_amt` decimal(12,2) NOT NULL,
  `addtax_rate` decimal(10,2) NOT NULL,
  `addtax_amt` decimal(12,2) NOT NULL,
  `incl_stax_amt` decimal(12,2) NOT NULL,
  `fr_rate` decimal(14,2) NOT NULL,
  `fr_amt` decimal(14,2) NOT NULL,
  `g_d` varchar(20) NOT NULL,
  `gd_date` date NOT NULL,
  `item_taxrate` decimal(14,2) NOT NULL,
  `batch_no` varchar(30) NOT NULL,
  `expiry_date` date NOT NULL,
  `frt_rate` decimal(14,2) NOT NULL,
  `frt_amt` decimal(14,2) NOT NULL,
  `add_rate` decimal(14,2) NOT NULL,
  `add_amt` decimal(14,2) NOT NULL,
  `excl_rate` decimal(14,2) NOT NULL,
  `excl_amt` decimal(14,2) NOT NULL,
  `item_hscode` varchar(10) NOT NULL,
  `loc_code` varchar(10) NOT NULL,
  `order_qty` decimal(14,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_mst`
--

CREATE TABLE `order_mst` (
  `co_code` int(2) NOT NULL,
  `doc_no` int(10) NOT NULL,
  `doc_type` varchar(10) NOT NULL,
  `doc_date` date NOT NULL,
  `doc_year` varchar(4) NOT NULL,
  `refnum` varchar(10) NOT NULL,
  `po_catg` varchar(1) NOT NULL,
  `div_code` varchar(4) NOT NULL,
  `party_code` varchar(10) NOT NULL,
  `sman_code` varchar(10) NOT NULL,
  `dlvry_mode` varchar(30) NOT NULL,
  `do_no` varchar(10) NOT NULL,
  `do_date` date NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `post` varchar(1) NOT NULL,
  `crdays` int(3) NOT NULL,
  `stax_rate` decimal(12,2) NOT NULL,
  `stax_amt` decimal(12,2) NOT NULL,
  `other_chrgs` decimal(12,2) NOT NULL,
  `other_ded` decimal(12,2) NOT NULL,
  `total_gross_amt` decimal(12,2) NOT NULL,
  `entry_user` varchar(30) NOT NULL,
  `entry_date` date NOT NULL,
  `pending` varchar(1) NOT NULL,
  `system_date` date NOT NULL,
  `order_key` varchar(15) NOT NULL,
  `party_ref` varchar(10) NOT NULL,
  `stax_code` varchar(10) NOT NULL,
  `addtax_code` varchar(10) NOT NULL,
  `addtax_amt` decimal(14,2) NOT NULL,
  `addtax_rate` decimal(14,2) NOT NULL,
  `refnum2` varchar(25) NOT NULL,
  `total_net_amt` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `co_code` int(2) NOT NULL,
  `div_code` varchar(4) NOT NULL,
  `party_code` varchar(10) NOT NULL,
  `party_name` varchar(100) NOT NULL,
  `bill_name` varchar(100) NOT NULL,
  `bill_add` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_name` varchar(30) NOT NULL,
  `phone_nos` varchar(50) NOT NULL,
  `fax_nos` varchar(15) NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `ntn` varchar(20) NOT NULL,
  `entry_user` varchar(30) NOT NULL,
  `entry_date` date NOT NULL,
  `crdays` int(3) NOT NULL,
  `crlimit` decimal(12,2) NOT NULL,
  `used` int(1) NOT NULL,
  `limit_used` decimal(12,2) NOT NULL,
  `open_debit` decimal(12,2) NOT NULL,
  `open_credit` decimal(12,2) NOT NULL,
  `trs_debit` decimal(12,2) NOT NULL,
  `trs_credit` decimal(12,2) NOT NULL,
  `nic_nbr` varchar(20) NOT NULL,
  `zone_code` varchar(4) NOT NULL,
  `city_code` varchar(4) NOT NULL,
  `salesman_code` varchar(10) NOT NULL,
  `gl_code` varchar(10) NOT NULL,
  `party_div` varchar(10) NOT NULL,
  `druglic_no` varchar(30) NOT NULL,
  `druglic_date` date NOT NULL,
  `druglic_name` varchar(100) NOT NULL,
  `open_debit_2018` decimal(12,2) NOT NULL,
  `open_credit_2018` decimal(12,2) NOT NULL,
  `open_date` date NOT NULL,
  `crdays_yn` varchar(1) NOT NULL,
  `crlimit_yn` varchar(1) NOT NULL,
  `party_control` varchar(3) NOT NULL,
  `co1_code` varchar(10) NOT NULL,
  `party_division2` varchar(10) NOT NULL,
  `catagory` varchar(1) NOT NULL,
  `cust_type` varchar(15) NOT NULL,
  `gl_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`co_code`, `div_code`, `party_code`, `party_name`, `bill_name`, `bill_add`, `address`, `contact_name`, `phone_nos`, `fax_nos`, `e_mail`, `gst`, `ntn`, `entry_user`, `entry_date`, `crdays`, `crlimit`, `used`, `limit_used`, `open_debit`, `open_credit`, `trs_debit`, `trs_credit`, `nic_nbr`, `zone_code`, `city_code`, `salesman_code`, `gl_code`, `party_div`, `druglic_no`, `druglic_date`, `druglic_name`, `open_debit_2018`, `open_credit_2018`, `open_date`, `crdays_yn`, `crlimit_yn`, `party_control`, `co1_code`, `party_division2`, `catagory`, `cust_type`, `gl_name`) VALUES
(1, '1', '1', 'HASEEB MEMON PARTY 1', 'HASEEB MOOSALINE', 'HASEEB MOOSALINE', 'HASEEB MOOSALINE', 'HASEEB MOOSALINE', '033536578796', '', 'haseeb@techempireltd.com', '03353657876', '4230131202761', '0.00', '0000-00-00', 30, 30.00, 0, 0.00, 0.00, 0.00, 0.00, 0.00, '4230132020761', '1', '1', '1', '6010001001', '6100001001', '033353657876', '2022-02-02', 'HASEEB MOOSALINE', 0.00, 0.00, '0000-00-00', 'Y', 'Y', '610', '6100001001', '0.00', '', 'Distb', 'TRADE DEBITORS FEED - ZONE 1 - KARACHI');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `user_id` int(10) NOT NULL,
  `permissions` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `po_dtl_local_um`
--

CREATE TABLE `po_dtl_local_um` (
  `CO_CODE` int(2) DEFAULT NULL,
  `DOC_NO` int(10) DEFAULT NULL,
  `DOC_TYPE` varchar(10) DEFAULT NULL,
  `DOC_YEAR` varchar(4) DEFAULT NULL,
  `DIV_CODE` varchar(4) DEFAULT NULL,
  `PO_CATG` varchar(1) DEFAULT NULL,
  `ORDER_KEY` varchar(15) DEFAULT NULL,
  `DOC_DATE` date DEFAULT NULL,
  `REFNUM` varchar(10) DEFAULT NULL,
  `ENTRY_NO` int(6) DEFAULT NULL,
  `ITEM_CODE` varchar(10) DEFAULT NULL,
  `ITEM_TYPE` varchar(1) DEFAULT NULL,
  `ITEM_DETAIL` varchar(1000) DEFAULT NULL,
  `QTY` decimal(12,2) DEFAULT NULL,
  `RECEIPT_QTY` decimal(12,2) DEFAULT NULL,
  `RATE` decimal(12,2) DEFAULT NULL,
  `AMT` decimal(12,2) DEFAULT NULL,
  `DISC_RATE` decimal(12,2) DEFAULT NULL,
  `DISC_AMT` decimal(12,2) DEFAULT NULL,
  `NET_AMT` decimal(12,2) DEFAULT NULL,
  `REMARKS` varchar(50) DEFAULT NULL,
  `PENDING` varchar(1) DEFAULT NULL,
  `PRODUCT_CODE` varchar(10) DEFAULT NULL,
  `BILLED` varchar(1) DEFAULT NULL,
  `PR_NO` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `po_dtl_um`
--

CREATE TABLE `po_dtl_um` (
  `CO_CODE` int(2) DEFAULT NULL,
  `DOC_NO` int(10) DEFAULT NULL,
  `DOC_TYPE` varchar(10) DEFAULT NULL,
  `DOC_YEAR` varchar(4) DEFAULT NULL,
  `DIV_CODE` varchar(4) DEFAULT NULL,
  `PO_CATG` varchar(1) DEFAULT NULL,
  `ORDER_KEY` varchar(15) DEFAULT NULL,
  `DOC_DATE` date DEFAULT NULL,
  `REFNUM` varchar(10) DEFAULT NULL,
  `ENTRY_NO` int(6) DEFAULT NULL,
  `ITEM_CODE` varchar(10) DEFAULT NULL,
  `ITEM_TYPE` varchar(1) DEFAULT NULL,
  `ITEM_DETAIL` varchar(100) DEFAULT NULL,
  `QTY` decimal(12,2) DEFAULT NULL,
  `RECEIPT_QTY` decimal(12,2) DEFAULT NULL,
  `RATE` decimal(12,2) DEFAULT NULL,
  `AMT` decimal(12,2) DEFAULT NULL,
  `DISC_RATE` decimal(12,2) DEFAULT NULL,
  `DISC_AMT` decimal(12,2) DEFAULT NULL,
  `NET_AMT` decimal(12,2) DEFAULT NULL,
  `REMARKS` varchar(50) DEFAULT NULL,
  `PENDING` varchar(1) DEFAULT NULL,
  `BILLED` varchar(1) DEFAULT NULL,
  `G_D` varchar(20) DEFAULT NULL,
  `GD_DATE` date DEFAULT NULL,
  `ITEM_HSCODE` varchar(10) DEFAULT NULL,
  `ITEM_TAXRATE` decimal(12,2) DEFAULT NULL,
  `BATCH_NO` varchar(15) DEFAULT NULL,
  `EXPIRY_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `po_mst_local_um`
--

CREATE TABLE `po_mst_local_um` (
  `CO_CODE` int(2) NOT NULL,
  `DOC_NO` int(10) NOT NULL,
  `DOC_TYPE` varchar(10) NOT NULL,
  `DOC_YEAR` varchar(4) NOT NULL,
  `PO_CATG` varchar(1) NOT NULL,
  `DIV_CODE` varchar(4) NOT NULL,
  `ORDER_KEY` varchar(15) DEFAULT NULL,
  `DOC_DATE` date DEFAULT NULL,
  `REFNUM` varchar(10) DEFAULT NULL,
  `PARTY_REF` varchar(10) DEFAULT NULL,
  `DLVRY_DATE` date DEFAULT NULL,
  `PO_CLOSE` varchar(1) DEFAULT NULL,
  `PARTY_CODE` varchar(10) DEFAULT NULL,
  `CRDAYS` int(3) DEFAULT NULL,
  `REMARKS` varchar(100) DEFAULT NULL,
  `POST` varchar(1) DEFAULT NULL,
  `STAX_CODE` varchar(10) DEFAULT NULL,
  `STAX_RATE` decimal(12,2) DEFAULT NULL,
  `STAX_AMT` decimal(12,2) DEFAULT NULL,
  `ADDTAX_CODE` varchar(10) DEFAULT NULL,
  `ADDTAX_RATE` decimal(12,2) DEFAULT NULL,
  `ADDTAX_AMT` decimal(12,2) DEFAULT NULL,
  `CHARGE_CODE` varchar(10) DEFAULT NULL,
  `CHARGE_AMT` decimal(14,2) DEFAULT NULL,
  `CHARGE_DPT` varchar(10) DEFAULT NULL,
  `FRT_CODE` varchar(10) DEFAULT NULL,
  `FRT_DPT` varchar(10) DEFAULT NULL,
  `OTHER_CHRGS` decimal(12,2) DEFAULT NULL,
  `DISC_CODE` varchar(10) DEFAULT NULL,
  `DISC_DPT` varchar(10) DEFAULT NULL,
  `OTHER_DED` decimal(12,2) DEFAULT NULL,
  `TOTAL_GROSS_AMT` decimal(12,2) DEFAULT NULL,
  `TOTAL_NET_AMT` decimal(12,2) DEFAULT NULL,
  `ENTRY_USER` varchar(30) DEFAULT NULL,
  `ENTRY_DATE` date DEFAULT NULL,
  `PENDING` varchar(1) DEFAULT NULL,
  `SYSTEM_DATE` date DEFAULT NULL,
  `TOTAL_QTY` decimal(12,2) DEFAULT NULL,
  `TOTAL_RCVD` decimal(12,2) DEFAULT NULL,
  `REFNUM2` varchar(25) DEFAULT NULL,
  `PR_NO` varchar(15) DEFAULT NULL,
  `PR_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `po_mst_um`
--

CREATE TABLE `po_mst_um` (
  `CO_CODE` int(2) NOT NULL,
  `DOC_NO` int(10) NOT NULL,
  `DOC_TYPE` varchar(10) NOT NULL,
  `DOC_YEAR` varchar(4) NOT NULL,
  `PO_CATG` varchar(1) NOT NULL,
  `DIV_CODE` varchar(4) NOT NULL,
  `ORDER_KEY` varchar(15) DEFAULT NULL,
  `DOC_DATE` date DEFAULT NULL,
  `REFNUM` varchar(10) DEFAULT NULL,
  `PARTY_REF` varchar(10) DEFAULT NULL,
  `DLVRY_DATE` date DEFAULT NULL,
  `PO_CLOSE` varchar(1) DEFAULT NULL,
  `PARTY_CODE` varchar(10) DEFAULT NULL,
  `CRDAYS` int(3) DEFAULT NULL,
  `REMARKS` varchar(100) DEFAULT NULL,
  `POST` varchar(1) DEFAULT NULL,
  `STAX_CODE` varchar(10) DEFAULT NULL,
  `STAX_RATE` decimal(12,2) DEFAULT NULL,
  `STAX_AMT` decimal(12,2) DEFAULT NULL,
  `ADDTAX_CODE` varchar(10) DEFAULT NULL,
  `ADDTAX_RATE` decimal(12,2) DEFAULT NULL,
  `ADDTAX_AMT` decimal(12,2) DEFAULT NULL,
  `CHARGE_CODE` varchar(10) DEFAULT NULL,
  `CHARGE_AMT` decimal(14,2) DEFAULT NULL,
  `CHARGE_DPT` varchar(10) DEFAULT NULL,
  `FRT_CODE` varchar(10) DEFAULT NULL,
  `FRT_DPT` varchar(10) DEFAULT NULL,
  `OTHER_CHRGS` decimal(12,2) DEFAULT NULL,
  `DISC_CODE` varchar(10) DEFAULT NULL,
  `DISC_DPT` varchar(10) DEFAULT NULL,
  `OTHER_DED` decimal(12,2) DEFAULT NULL,
  `TOTAL_GROSS_AMT` decimal(12,2) DEFAULT NULL,
  `TOTAL_NET_AMT` decimal(12,2) DEFAULT NULL,
  `ENTRY_USER` varchar(30) DEFAULT NULL,
  `ENTRY_DATE` date DEFAULT NULL,
  `PENDING` varchar(1) DEFAULT NULL,
  `SYSTEM_DATE` date DEFAULT NULL,
  `TOTAL_QTY` decimal(12,2) DEFAULT NULL,
  `TOTAL_RCVD` decimal(12,2) DEFAULT NULL,
  `REFNUM2` varchar(25) DEFAULT NULL,
  `CONTAINER_NO` varchar(100) DEFAULT NULL,
  `INVOICE_NO` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_code` varchar(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `entry_user` varchar(30) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_code`, `product_name`, `entry_user`, `entry_date`) VALUES
('1', 'HELDGIFT ONE', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `rq_dtl_um`
--

CREATE TABLE `rq_dtl_um` (
  `SNO` int(11) NOT NULL,
  `CO_CODE` int(2) DEFAULT NULL,
  `DOC_NO` int(10) DEFAULT NULL,
  `DOC_TYPE` varchar(10) DEFAULT NULL,
  `DOC_DATE` date DEFAULT NULL,
  `DOC_YEAR` varchar(4) DEFAULT NULL,
  `REFNUM` varchar(10) DEFAULT NULL,
  `ITEM_CODE` varchar(10) DEFAULT NULL,
  `ITEM_TYPE` varchar(1) DEFAULT NULL,
  `QTY` decimal(12,2) DEFAULT NULL,
  `RATE` decimal(12,2) DEFAULT NULL,
  `AMT` decimal(12,2) DEFAULT NULL,
  `DISC_RATE` decimal(12,2) DEFAULT NULL,
  `DISC_AMT` decimal(12,2) DEFAULT NULL,
  `NET_AMT` decimal(12,2) DEFAULT NULL,
  `REMARKS` varchar(50) DEFAULT NULL,
  `RECEIPT_QTY` decimal(12,2) DEFAULT NULL,
  `PENDING` varchar(1) DEFAULT NULL,
  `ENTRY_NO` int(6) DEFAULT NULL,
  `DIV_CODE` varchar(4) DEFAULT NULL,
  `PO_CATG` varchar(1) DEFAULT NULL,
  `ORDER_KEY` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rq_mst_um`
--

CREATE TABLE `rq_mst_um` (
  `SNO` int(11) NOT NULL,
  `CO_CODE` int(2) NOT NULL,
  `DOC_NO` int(10) NOT NULL,
  `DOC_TYPE` varchar(10) NOT NULL,
  `DOC_DATE` date DEFAULT NULL,
  `DOC_YEAR` varchar(4) NOT NULL,
  `REFNUM` varchar(10) DEFAULT NULL,
  `PO_CATG` varchar(1) NOT NULL,
  `DIV_CODE` varchar(4) NOT NULL,
  `DEPT_CODE` varchar(10) DEFAULT NULL,
  `PARTY_CODE` varchar(10) DEFAULT NULL,
  `SMAN_CODE` varchar(10) DEFAULT NULL,
  `DLVRY_MODE` varchar(30) DEFAULT NULL,
  `DO_NO` varchar(10) DEFAULT NULL,
  `DO_DATE` date DEFAULT NULL,
  `REMARKS` varchar(100) DEFAULT NULL,
  `POST` varchar(1) DEFAULT NULL,
  `CRDAYS` int(3) DEFAULT NULL,
  `STAX_RATE` decimal(12,2) DEFAULT NULL,
  `STAX_AMT` decimal(12,2) DEFAULT NULL,
  `OTHER_CHRGS` decimal(12,2) DEFAULT NULL,
  `OTHER_DED` decimal(12,2) DEFAULT NULL,
  `TOTAL_GROSS_AMT` decimal(12,2) DEFAULT NULL,
  `TOTAL_NET_AMT` decimal(12,2) DEFAULT NULL,
  `ENTRY_USER` varchar(30) DEFAULT NULL,
  `ENTRY_DATE` date DEFAULT NULL,
  `PENDING` varchar(1) DEFAULT NULL,
  `SYSTEM_DATE` date DEFAULT NULL,
  `ORDER_KEY` varchar(15) DEFAULT NULL,
  `PARTY_REF` varchar(10) DEFAULT NULL,
  `REFNUM2` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rt_dtl`
--

CREATE TABLE `rt_dtl` (
  `co_code` int(2) DEFAULT NULL,
  `doc_no` int(10) DEFAULT NULL,
  `doc_type` varchar(10) DEFAULT NULL,
  `doc_date` date DEFAULT NULL,
  `doc_year` varchar(4) DEFAULT NULL,
  `item_code` varchar(10) DEFAULT NULL,
  `item_type` varchar(1) DEFAULT NULL,
  `qty` decimal(12,2) DEFAULT NULL,
  `rate` decimal(12,2) DEFAULT NULL,
  `amt` decimal(12,2) DEFAULT NULL,
  `disc_rate` decimal(12,2) DEFAULT NULL,
  `disc_amt` decimal(12,2) DEFAULT NULL,
  `net_amt` decimal(12,2) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `entry_no` int(6) DEFAULT NULL,
  `po_catg` varchar(1) DEFAULT NULL,
  `div_code` varchar(4) DEFAULT NULL,
  `batch_no` varchar(30) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `loc_code` varchar(10) DEFAULT NULL,
  `do_key_ref` varchar(15) DEFAULT NULL,
  `do_qty` decimal(12,2) DEFAULT NULL,
  `do_key_ref_date` date DEFAULT NULL,
  `stax_rate` decimal(12,2) DEFAULT NULL,
  `stax_amt` decimal(12,2) DEFAULT NULL,
  `addtax_rate` decimal(12,2) DEFAULT NULL,
  `addtax_amt` decimal(12,2) DEFAULT NULL,
  `incl_stax_amt` decimal(12,2) DEFAULT NULL,
  `g_d` varchar(20) DEFAULT NULL,
  `gd_date` date DEFAULT NULL,
  `frt_rate` decimal(14,2) DEFAULT NULL,
  `frt_amt` decimal(14,2) DEFAULT NULL,
  `add_rate` decimal(14,2) DEFAULT NULL,
  `add_amt` decimal(14,2) DEFAULT NULL,
  `excl_rate` decimal(14,2) DEFAULT NULL,
  `excl_amt` decimal(14,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rt_mst`
--

CREATE TABLE `rt_mst` (
  `co_code` int(2) NOT NULL,
  `doc_type` varchar(10) NOT NULL,
  `doc_no` int(10) NOT NULL,
  `doc_date` date DEFAULT NULL,
  `doc_year` varchar(4) NOT NULL,
  `refnum` varchar(10) DEFAULT NULL,
  `po_no` varchar(15) DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `po_catg` varchar(1) NOT NULL,
  `div_code` varchar(4) NOT NULL,
  `party_code` varchar(10) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `sman_code` varchar(10) DEFAULT NULL,
  `post` varchar(1) DEFAULT NULL,
  `crdays` int(6) DEFAULT NULL,
  `wh_code` varchar(10) DEFAULT NULL,
  `stax_rate` decimal(12,2) DEFAULT NULL,
  `stax_amt` decimal(12,2) DEFAULT NULL,
  `other_chrgs` decimal(12,2) DEFAULT NULL,
  `other_ded` decimal(12,2) DEFAULT NULL,
  `total_gross_amt` decimal(12,2) DEFAULT NULL,
  `total_net_amt` decimal(12,2) DEFAULT NULL,
  `entry_user` varchar(30) DEFAULT NULL,
  `do_key` varchar(15) DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `item_open` varchar(1) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `ship_mode` varchar(100) DEFAULT NULL,
  `ship_no` varchar(20) DEFAULT NULL,
  `order_refnum` varchar(10) DEFAULT NULL,
  `order_party_ref` varchar(10) DEFAULT NULL,
  `refnum2` varchar(25) DEFAULT NULL,
  `stax_code` varchar(10) DEFAULT NULL,
  `addtax_code` varchar(10) DEFAULT NULL,
  `charge_code` varchar(10) DEFAULT NULL,
  `frt_code` varchar(10) DEFAULT NULL,
  `disc_code` varchar(10) DEFAULT NULL,
  `charge_dpt` varchar(10) DEFAULT NULL,
  `frt_dpt` varchar(10) DEFAULT NULL,
  `disc_dpt` varchar(10) DEFAULT NULL,
  `addtax_rate` decimal(14,2) DEFAULT NULL,
  `charge_amt` decimal(14,2) DEFAULT NULL,
  `addtax_amt` decimal(14,2) DEFAULT NULL,
  `remarks2` varchar(50) DEFAULT NULL,
  `post_supp_age` varchar(1) DEFAULT NULL,
  `co1_code` varchar(10) DEFAULT NULL,
  `itax_rate` decimal(14,2) DEFAULT NULL,
  `itax_amt` decimal(14,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salesman`
--

CREATE TABLE `salesman` (
  `sman_code` varchar(10) NOT NULL,
  `sman_name` varchar(50) DEFAULT NULL,
  `sman_add` varchar(50) DEFAULT NULL,
  `phone_no` varchar(50) DEFAULT NULL,
  `nic_no` varchar(50) DEFAULT NULL,
  `entry_user` varchar(30) DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `dor` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `salesman`
--

INSERT INTO `salesman` (`sman_code`, `sman_name`, `sman_add`, `phone_no`, `nic_no`, `entry_user`, `entry_date`, `doj`, `dor`, `status`) VALUES
('1', 'HASEEB SALES MAN 1', 'HASEEB MOOSALINE', '03353657876', '4230132020761', NULL, NULL, '2022-02-02', '2022-02-02', 'Active'),
('2', 'FAISAL SALESMAN', 'FAISAL GULSHAN', '03353657876', '4230132020761', NULL, NULL, '2022-02-02', '2022-02-02', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `stktran_dtl`
--

CREATE TABLE `stktran_dtl` (
  `co_code` int(2) DEFAULT NULL,
  `doc_no` int(10) DEFAULT NULL,
  `doc_type` varchar(10) DEFAULT NULL,
  `doc_date` date DEFAULT NULL,
  `doc_year` varchar(4) DEFAULT NULL,
  `item_code` varchar(10) DEFAULT NULL,
  `item_type` varchar(1) DEFAULT NULL,
  `qty` decimal(12,2) DEFAULT NULL,
  `rate` decimal(12,2) DEFAULT NULL,
  `amt` decimal(12,2) DEFAULT NULL,
  `disc_rate` decimal(12,2) DEFAULT NULL,
  `disc_amt` decimal(12,2) DEFAULT NULL,
  `net_amt` decimal(12,2) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `entry_no` int(6) DEFAULT NULL,
  `po_catg` varchar(1) DEFAULT NULL,
  `div_code` varchar(4) DEFAULT NULL,
  `batch_no` varchar(30) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `loc_code` varchar(10) DEFAULT NULL,
  `po_no` varchar(15) DEFAULT NULL,
  `do_key_ref` varchar(15) DEFAULT NULL,
  `sale_code` varchar(10) DEFAULT NULL,
  `gl_code` varchar(10) DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `g_d` varchar(20) DEFAULT NULL,
  `gd_date` date DEFAULT NULL,
  `tax` varchar(20) DEFAULT NULL,
  `stax_rate` decimal(12,2) DEFAULT NULL,
  `stax_amt` decimal(12,2) DEFAULT NULL,
  `addtax_rate` decimal(12,2) DEFAULT NULL,
  `addtax_amt` decimal(12,2) DEFAULT NULL,
  `incl_stax_amt` decimal(12,2) DEFAULT NULL,
  `fr_rate` decimal(3,2) DEFAULT NULL,
  `fr_amt` decimal(12,2) DEFAULT NULL,
  `frt_rate` decimal(14,2) DEFAULT NULL,
  `frt_amt` decimal(14,2) DEFAULT NULL,
  `add_rate` decimal(14,2) DEFAULT NULL,
  `add_amt` decimal(14,2) DEFAULT NULL,
  `excl_rate` decimal(14,2) DEFAULT NULL,
  `excl_amt` decimal(14,2) DEFAULT NULL,
  `item_hscode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stktran_mst`
--

CREATE TABLE `stktran_mst` (
  `co_code` int(2) NOT NULL,
  `doc_type` varchar(10) NOT NULL,
  `doc_no` int(10) NOT NULL,
  `doc_date` date DEFAULT NULL,
  `doc_year` varchar(4) NOT NULL,
  `refnum` varchar(10) DEFAULT NULL,
  `po_no` varchar(15) DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `po_catg` varchar(1) NOT NULL,
  `div_code` varchar(4) NOT NULL,
  `party_code` varchar(10) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `sman_code` varchar(10) DEFAULT NULL,
  `post` varchar(1) DEFAULT NULL,
  `crdays` int(6) DEFAULT NULL,
  `wh_code` varchar(10) DEFAULT NULL,
  `stax_rate` decimal(12,2) DEFAULT NULL,
  `stax_amt` decimal(12,2) DEFAULT NULL,
  `other_chrgs` decimal(12,2) DEFAULT NULL,
  `other_ded` decimal(12,2) DEFAULT NULL,
  `total_gross_amt` decimal(12,2) DEFAULT NULL,
  `total_net_amt` decimal(12,2) DEFAULT NULL,
  `entry_user` varchar(30) DEFAULT NULL,
  `do_key` varchar(15) DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `ship_mode` varchar(100) DEFAULT NULL,
  `ship_no` varchar(20) DEFAULT NULL,
  `order_refnum` varchar(10) DEFAULT NULL,
  `order_party_ref` varchar(10) DEFAULT NULL,
  `item_open` varchar(1) DEFAULT NULL,
  `stax_code` varchar(10) DEFAULT NULL,
  `frt_code` varchar(10) DEFAULT NULL,
  `disc_code` varchar(10) DEFAULT NULL,
  `addtax_code` varchar(10) DEFAULT NULL,
  `addtax_rate` decimal(14,2) DEFAULT NULL,
  `addtax_amt` decimal(14,2) DEFAULT NULL,
  `charge_code` varchar(10) DEFAULT NULL,
  `charge_amt` decimal(14,2) DEFAULT NULL,
  `remarks2` varchar(50) DEFAULT NULL,
  `charge_dpt` varchar(10) DEFAULT NULL,
  `frt_dpt` varchar(10) DEFAULT NULL,
  `disc_dpt` varchar(10) DEFAULT NULL,
  `refnum2` varchar(25) DEFAULT NULL,
  `post_supp_age` varchar(1) DEFAULT NULL,
  `exemption` varchar(50) DEFAULT NULL,
  `co1_code` varchar(10) DEFAULT NULL,
  `ledger_bal` decimal(14,2) DEFAULT NULL,
  `itax_rate` decimal(14,2) DEFAULT NULL,
  `itax_amt` decimal(14,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `strtran_dtl`
--

CREATE TABLE `strtran_dtl` (
  `CO_CODE` int(2) DEFAULT NULL,
  `DOC_NO` int(10) NOT NULL,
  `DOC_TYPE` varchar(10) DEFAULT NULL,
  `DOC_DATE` date DEFAULT NULL,
  `DOC_YEAR` varchar(4) DEFAULT NULL,
  `ITEM_CODE` varchar(10) DEFAULT NULL,
  `ITEM_TYPE` varchar(1) DEFAULT NULL,
  `QTY` decimal(12,2) DEFAULT NULL,
  `RATE` decimal(12,2) DEFAULT NULL,
  `AMT` decimal(12,2) DEFAULT NULL,
  `DISC_RATE` decimal(12,2) DEFAULT NULL,
  `DISC_AMT` decimal(12,2) DEFAULT NULL,
  `NET_AMT` decimal(12,2) DEFAULT NULL,
  `REMARKS` varchar(50) DEFAULT NULL,
  `ENTRY_NO` int(6) DEFAULT NULL,
  `PO_CATG` varchar(1) DEFAULT NULL,
  `DIV_CODE` varchar(4) DEFAULT NULL,
  `BATCH_NO` varchar(30) DEFAULT NULL,
  `EXPIRY_DATE` date DEFAULT NULL,
  `LOC_CODE` varchar(10) DEFAULT NULL,
  `DO_KEY_REF` varchar(15) DEFAULT NULL,
  `DO_QTY` decimal(12,2) DEFAULT NULL,
  `ITEM_DETAIL` varchar(1000) DEFAULT NULL,
  `REJ_QTY` decimal(12,2) DEFAULT NULL,
  `OK_QTY` decimal(12,2) DEFAULT NULL,
  `BILLED` varchar(1) DEFAULT NULL,
  `PO_NO` varchar(15) DEFAULT NULL,
  `PRODUCT_CODE` varchar(10) DEFAULT NULL,
  `PO_DATE` date DEFAULT NULL,
  `RECEIPT_QTY` decimal(12,2) DEFAULT NULL,
  `ISLN_REF` varchar(15) DEFAULT NULL,
  `G_D` varchar(20) DEFAULT NULL,
  `GD_DATE` date DEFAULT NULL,
  `ITEM_HSCODE` varchar(10) DEFAULT NULL,
  `ITEM_TAXRATE` decimal(12,2) DEFAULT NULL,
  `ITEM_CODE2` varchar(10) DEFAULT NULL,
  `LOC_CODE2` varchar(10) DEFAULT NULL,
  `sno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `strtran_mst`
--

CREATE TABLE `strtran_mst` (
  `CO_CODE` int(2) NOT NULL,
  `DOC_TYPE` varchar(10) NOT NULL,
  `DOC_NO` int(10) NOT NULL,
  `DOC_DATE` date DEFAULT NULL,
  `DOC_YEAR` varchar(4) NOT NULL,
  `REFNUM` varchar(10) DEFAULT NULL,
  `PO_NO` varchar(15) DEFAULT NULL,
  `PO_DATE` date DEFAULT NULL,
  `PO_CATG` varchar(1) NOT NULL,
  `DIV_CODE` varchar(4) NOT NULL,
  `PARTY_CODE` varchar(10) DEFAULT NULL,
  `REMARKS` varchar(100) DEFAULT NULL,
  `SMAN_CODE` varchar(10) DEFAULT NULL,
  `POST` varchar(1) DEFAULT NULL,
  `CRDAYS` int(6) DEFAULT NULL,
  `WH_CODE` varchar(10) DEFAULT NULL,
  `STAX_RATE` decimal(12,2) DEFAULT NULL,
  `STAX_AMT` decimal(12,2) DEFAULT NULL,
  `OTHER_CHRGS` decimal(12,2) DEFAULT NULL,
  `OTHER_DED` decimal(12,2) DEFAULT NULL,
  `TOTAL_GROSS_AMT` decimal(12,2) DEFAULT NULL,
  `TOTAL_NET_AMT` decimal(12,2) DEFAULT NULL,
  `ENTRY_USER` varchar(30) DEFAULT NULL,
  `DO_KEY` varchar(15) DEFAULT NULL,
  `ENTRY_DATE` date DEFAULT NULL,
  `ITEM_OPEN` varchar(1) DEFAULT NULL,
  `DUE_DATE` date DEFAULT NULL,
  `SHIP_MODE` varchar(100) DEFAULT NULL,
  `SHIP_NO` varchar(20) DEFAULT NULL,
  `ORDER_REFNUM` varchar(10) DEFAULT NULL,
  `ORDER_PARTY_REF` varchar(10) DEFAULT NULL,
  `DEPT_CODE` varchar(10) DEFAULT NULL,
  `WH_CODE2` varchar(10) DEFAULT NULL,
  `PARTY_REF` varchar(10) DEFAULT NULL,
  `REFNUM2` varchar(25) DEFAULT NULL,
  `STAX_CODE` varchar(10) DEFAULT NULL,
  `ADDTAX_CODE` varchar(10) DEFAULT NULL,
  `CHARGE_CODE` varchar(10) DEFAULT NULL,
  `FRT_CODE` varchar(10) DEFAULT NULL,
  `DISC_CODE` varchar(10) DEFAULT NULL,
  `CHARGE_DPT` varchar(10) DEFAULT NULL,
  `FRT_DPT` varchar(10) DEFAULT NULL,
  `DISC_DPT` varchar(10) DEFAULT NULL,
  `ADDTAX_RATE` decimal(14,2) DEFAULT NULL,
  `CHARGE_AMT` decimal(14,2) DEFAULT NULL,
  `ADDTAX_AMT` decimal(14,2) DEFAULT NULL,
  `REMARKS2` varchar(50) DEFAULT NULL,
  `TOTAL_QTY` decimal(14,2) DEFAULT NULL,
  `TOTAL_RCVD` decimal(14,2) DEFAULT NULL,
  `CONTAINER_NO` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supp`
--

CREATE TABLE `supp` (
  `CO_CODE` int(2) NOT NULL,
  `DIV_CODE` varchar(4) DEFAULT NULL,
  `PARTY_CODE` varchar(10) NOT NULL,
  `PARTY_NAME` varchar(100) DEFAULT NULL,
  `BILL_NAME` varchar(100) DEFAULT NULL,
  `BILL_ADD` varchar(100) DEFAULT NULL,
  `ADDRESS` varchar(100) DEFAULT NULL,
  `CONTACT_NAME` varchar(30) DEFAULT NULL,
  `PHONE_NOS` varchar(50) DEFAULT NULL,
  `FAX_NOS` varchar(15) DEFAULT NULL,
  `E_MAIL` varchar(30) DEFAULT NULL,
  `GST` varchar(20) DEFAULT NULL,
  `NTN` varchar(20) DEFAULT NULL,
  `ENTRY_USER` varchar(30) DEFAULT NULL,
  `ENTRY_DATE` date DEFAULT NULL,
  `CRDAYS` int(3) DEFAULT NULL,
  `CRLIMIT` decimal(12,2) DEFAULT NULL,
  `USED` int(1) DEFAULT NULL,
  `LIMIT_USED` decimal(12,2) DEFAULT NULL,
  `OPEN_DEBIT` decimal(12,2) DEFAULT NULL,
  `OPEN_CREDIT` decimal(12,2) DEFAULT NULL,
  `TRS_DEBIT` decimal(12,2) DEFAULT NULL,
  `TRS_CREDIT` decimal(12,2) DEFAULT NULL,
  `NIC_NBR` varchar(20) DEFAULT NULL,
  `ZONE_CODE` varchar(4) DEFAULT NULL,
  `CITY_CODE` varchar(4) DEFAULT NULL,
  `SALESMAN_CODE` varchar(10) DEFAULT NULL,
  `GL_CODE` varchar(10) DEFAULT NULL,
  `SUPP_DIV` varchar(10) DEFAULT NULL,
  `OPEN_DATE` date DEFAULT NULL,
  `OPEN_DEBIT_2018` decimal(12,2) DEFAULT NULL,
  `OPEN_CREDIT_2018` decimal(12,2) DEFAULT NULL,
  `CO1_CODE` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supp`
--

INSERT INTO `supp` (`CO_CODE`, `DIV_CODE`, `PARTY_CODE`, `PARTY_NAME`, `BILL_NAME`, `BILL_ADD`, `ADDRESS`, `CONTACT_NAME`, `PHONE_NOS`, `FAX_NOS`, `E_MAIL`, `GST`, `NTN`, `ENTRY_USER`, `ENTRY_DATE`, `CRDAYS`, `CRLIMIT`, `USED`, `LIMIT_USED`, `OPEN_DEBIT`, `OPEN_CREDIT`, `TRS_DEBIT`, `TRS_CREDIT`, `NIC_NBR`, `ZONE_CODE`, `CITY_CODE`, `SALESMAN_CODE`, `GL_CODE`, `SUPP_DIV`, `OPEN_DATE`, `OPEN_DEBIT_2018`, `OPEN_CREDIT_2018`, `CO1_CODE`) VALUES
(1, NULL, '1', 'FAISAL PUNJABI 1', NULL, NULL, 'FAISAL PUNJABI 1', 'FAISAL PUNJABI', '03353657876', NULL, 'faisal@gmail.com', '033353657876', '0333453657876', NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, '4230132020761', NULL, NULL, NULL, '3010001001', '', NULL, 0.00, 0.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_code` varchar(10) NOT NULL,
  `unit_name` varchar(100) NOT NULL,
  `entry_user` varchar(30) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_code`, `unit_name`, `entry_user`, `entry_date`) VALUES
('1', 'KG 1', '', '0000-00-00'),
('2', 'LBS', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `role`) VALUES
(1, 'admin', '12345', 'Admin'),
(2, 'faisal', '1234', 'User'),
(3, 'yasir', '1234', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_code` varchar(20) NOT NULL,
  `vehicle_name` varchar(30) NOT NULL,
  `vehicle_user` varchar(50) NOT NULL,
  `entry_user` varchar(30) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_code`, `vehicle_name`, `vehicle_user`, `entry_user`, `entry_date`) VALUES
('1', '70', 'FAISAL PUNNJABI 1', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `zone_code` varchar(4) NOT NULL,
  `zone_name` varchar(30) DEFAULT NULL,
  `entry_user` varchar(30) DEFAULT NULL,
  `entry_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`zone_code`, `zone_name`, `entry_user`, `entry_date`) VALUES
('1', 'ZONE ONE', NULL, NULL),
('2', 'ZONE 2', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acttran_mst`
--
ALTER TABLE `acttran_mst`
  ADD UNIQUE KEY `co_code` (`co_code`,`voucher_type`,`voucher_no`,`doc_year`) USING BTREE;

--
-- Indexes for table `act_chart`
--
ALTER TABLE `act_chart`
  ADD UNIQUE KEY `co_code` (`co_code`,`control_code`,`sub_level1`,`sub_level2`) USING BTREE;

--
-- Indexes for table `bill_dtl_um`
--
ALTER TABLE `bill_dtl_um`
  ADD PRIMARY KEY (`SNO`);

--
-- Indexes for table `bill_mst_um`
--
ALTER TABLE `bill_mst_um`
  ADD PRIMARY KEY (`SNO`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_code`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`co_code`),
  ADD KEY `company_indexes` (`co_code`) USING BTREE;

--
-- Indexes for table `dc_mst`
--
ALTER TABLE `dc_mst`
  ADD UNIQUE KEY `co_code` (`co_code`,`doc_no`,`po_catg`,`div_code`,`doc_type`) USING BTREE;

--
-- Indexes for table `dept_store`
--
ALTER TABLE `dept_store`
  ADD PRIMARY KEY (`dept_code`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`div_code`),
  ADD KEY `div_indexes` (`div_code`) USING BTREE;

--
-- Indexes for table `div_allow`
--
ALTER TABLE `div_allow`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `gen_name`
--
ALTER TABLE `gen_name`
  ADD PRIMARY KEY (`gen_code`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD UNIQUE KEY `co_code` (`co_code`,`div_code`,`item_code`) USING BTREE;

--
-- Indexes for table `item_batch_no`
--
ALTER TABLE `item_batch_no`
  ADD UNIQUE KEY `CO_CODE` (`CO_CODE`,`ITEM_CODE`,`LOC_CODE`,`BATCH_NO`,`EXPIRY_DATE`) USING BTREE,
  ADD KEY `batch_indexes` (`CO_CODE`,`ITEM_CODE`,`LOC_CODE`,`BATCH_NO`,`EXPIRY_DATE`) USING BTREE;

--
-- Indexes for table `item_wh_um`
--
ALTER TABLE `item_wh_um`
  ADD UNIQUE KEY `co_code` (`co_code`,`item_code`,`loc_code`) USING BTREE;

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`loc_code`),
  ADD KEY `loc_indexes` (`loc_code`) USING BTREE;

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD UNIQUE KEY `co_code` (`co_code`,`div_code`,`party_code`,`party_control`) USING BTREE,
  ADD KEY `party_indexes` (`co_code`,`div_code`,`party_code`,`party_control`) USING BTREE;

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_code`);

--
-- Indexes for table `rq_dtl_um`
--
ALTER TABLE `rq_dtl_um`
  ADD PRIMARY KEY (`SNO`);

--
-- Indexes for table `rq_mst_um`
--
ALTER TABLE `rq_mst_um`
  ADD PRIMARY KEY (`SNO`);

--
-- Indexes for table `rt_mst`
--
ALTER TABLE `rt_mst`
  ADD UNIQUE KEY `co_code` (`co_code`,`doc_no`,`doc_year`,`div_code`,`po_catg`) USING BTREE;

--
-- Indexes for table `salesman`
--
ALTER TABLE `salesman`
  ADD PRIMARY KEY (`sman_code`);

--
-- Indexes for table `stktran_mst`
--
ALTER TABLE `stktran_mst`
  ADD UNIQUE KEY `co_code` (`co_code`,`doc_no`,`po_catg`,`div_code`) USING BTREE;

--
-- Indexes for table `strtran_dtl`
--
ALTER TABLE `strtran_dtl`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `str_dtl_indexes` (`CO_CODE`,`DOC_TYPE`,`DOC_NO`,`DOC_YEAR`,`PO_CATG`,`DIV_CODE`) USING BTREE;

--
-- Indexes for table `strtran_mst`
--
ALTER TABLE `strtran_mst`
  ADD UNIQUE KEY `CO_CODE` (`CO_CODE`,`DOC_NO`,`DOC_YEAR`,`DIV_CODE`,`PO_CATG`,`DOC_TYPE`) USING BTREE,
  ADD KEY `str_mst_indexes` (`CO_CODE`,`DOC_TYPE`,`DOC_NO`,`DOC_YEAR`,`PO_CATG`,`DIV_CODE`) USING BTREE;

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD UNIQUE KEY `vehicle_code` (`vehicle_code`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`zone_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_dtl_um`
--
ALTER TABLE `bill_dtl_um`
  MODIFY `SNO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill_mst_um`
--
ALTER TABLE `bill_mst_um`
  MODIFY `SNO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `div_allow`
--
ALTER TABLE `div_allow`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rq_dtl_um`
--
ALTER TABLE `rq_dtl_um`
  MODIFY `SNO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rq_mst_um`
--
ALTER TABLE `rq_mst_um`
  MODIFY `SNO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `strtran_dtl`
--
ALTER TABLE `strtran_dtl`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
