-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 06, 2020 at 02:38 AM
-- Server version: 5.7.29
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cassicom_cassixcom_leads`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `site_logo` varchar(222) NOT NULL,
  `site_color` varchar(222) NOT NULL,
  `site_color_2` varchar(222) NOT NULL,
  `key_code` varchar(222) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `password`, `email`, `site_logo`, `site_color`, `site_color_2`, `key_code`, `status`) VALUES
(1, '', '', '', 'Cassixcom_trademark_logo.png', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `lead_id` int(11) NOT NULL,
  `unique_id` varchar(222) NOT NULL,
  `lead_source` varchar(222) NOT NULL,
  `referral` varchar(222) NOT NULL,
  `lead_type` varchar(222) NOT NULL,
  `customer_type` varchar(222) NOT NULL,
  `position` varchar(222) NOT NULL,
  `firstname` varchar(222) NOT NULL,
  `lastname` varchar(222) NOT NULL,
  `customer_name` varchar(222) NOT NULL,
  `company_name` varchar(222) NOT NULL,
  `company_type` varchar(222) NOT NULL,
  `country_code_1` varchar(222) NOT NULL,
  `contact_1` varchar(2222) NOT NULL,
  `country_code_2` varchar(222) NOT NULL,
  `contact_2` varchar(2222) NOT NULL,
  `landline_code` varchar(222) NOT NULL,
  `landline` varchar(222) NOT NULL,
  `address_1` varchar(222) NOT NULL,
  `address_2` varchar(222) NOT NULL,
  `city` varchar(222) NOT NULL,
  `zip` varchar(222) NOT NULL,
  `country` varchar(222) NOT NULL,
  `state` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `website` varchar(222) NOT NULL,
  `assign_to` varchar(222) NOT NULL,
  `warm_follow_up_date` varchar(222) NOT NULL,
  `warm_comments` longtext NOT NULL,
  `hot_follow_up_date` varchar(222) NOT NULL,
  `hot_comments` longtext NOT NULL,
  `finish_follow_up_date` varchar(222) NOT NULL,
  `follow_up_time` varchar(222) NOT NULL,
  `proposal_value` varchar(222) NOT NULL,
  `finish_comments` longtext NOT NULL,
  `leads_status` varchar(222) NOT NULL,
  `next_action` varchar(222) NOT NULL,
  `filter_date` varchar(222) NOT NULL,
  `status` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`lead_id`, `unique_id`, `lead_source`, `referral`, `lead_type`, `customer_type`, `position`, `firstname`, `lastname`, `customer_name`, `company_name`, `company_type`, `country_code_1`, `contact_1`, `country_code_2`, `contact_2`, `landline_code`, `landline`, `address_1`, `address_2`, `city`, `zip`, `country`, `state`, `phone`, `email`, `website`, `assign_to`, `warm_follow_up_date`, `warm_comments`, `hot_follow_up_date`, `hot_comments`, `finish_follow_up_date`, `follow_up_time`, `proposal_value`, `finish_comments`, `leads_status`, `next_action`, `filter_date`, `status`, `date_time`, `created`) VALUES
(1, 'dqjcfhpbaeilkongmr', 'Direct Marketing', '\r\n&lt;div style=', 'Prospect', 'Company', 'Finish', 'Reshmi', 'Desai', '', 'Suta', 'Worldwide web', '+91', '9987044653', '+91', '75064 65081', '040', '', 'Bombay', 'XXX', 'Mumbai', '00000000', 'India', 'Maharashtra', '', 'marketing@suta.in', 'www.suta.in', '16', '2020-04-30', 'Hired an Internal team member for SEO', '', '', '', '', '', '', 'Lost', '', '2020-04-30', 0, '2020-01-29 23:36:16', '30-01-2020'),
(2, 'fjnlkapghrqcidebmo', 'Direct Marketing', 'Select', 'Prospect', 'Company', 'Finish', 'Ankur', 'Soni', '', 'EnKash', 'Worldwide web', '+91', '9899124326', '+91', '', '040', '', 'XXXX', 'XXX', 'Gurugram', '00000000', 'India', 'Haryana', '', 'ankur.soni@enkash.com', 'enkash.com', '16', '2020-04-30', 'Hired another Agency', '', '', '', '', '', '', 'Lost', '', '2020-04-30', 0, '2020-01-29 23:38:51', '30-01-2020'),
(3, 'ldqjiabphknoercmgf', 'Direct Marketing', 'Select', 'Prospect', 'Company', 'Cool', 'Venkatesh', 'Ravulapati', '', 'Abhyaas', 'Education', '+91', '9849733780', '+91', '', '040', '', 'XXXX', 'Near JNTU', 'Hyderabad', '500042', 'India', 'Telangana', '', 'venkatesh@abhyaas.in', 'abhyaas.in', '16', '', '', '', '', '', '', '', '', '', '', '', 0, '2020-01-29 23:41:43', '30-01-2020'),
(4, 'glambfrnqijpodchke', 'Events / Shows', '\r\n&lt;div style=', 'Prospect', 'Company', 'Warm', 'M Yella', 'Reddy', '', 'Advisor 2 Wealth', 'Worldwide web', '+91', '9346412447', '+91', '', '040', '', 'Adarsh nagar, Near Libert', 'Baseerbaagh', 'Hyderabad', '500029', 'India', 'Telangana', '', 'yellareddy@yahoo.com', 'advisor2wealth.com', '16', '', '', '', '', '', '', '', '', '', '', '', 0, '2020-01-29 23:43:46', '30-01-2020'),
(5, 'hpongjcqmibfkdlear', 'Events / Shows', '\r\n&lt;div style=', 'Prospect', 'Company', 'Hot', 'Y.S.R.K.', 'Prasad', '', 'Bonelli\'s Pvt Ltd.', 'Construction', '+91', '7207358186', '+91', '', '040', '', 'Near JNTU', 'Nizampet', 'Hyderabad', '500042', 'India', 'Telangana', '', 'prasad@bonellis.in', 'bonellis.in', '16', '', '', '', '', '', '', '', '', '', '', '', 0, '2020-01-29 23:51:12', '30-01-2020'),
(6, 'jhrqnpfielakmbogcd', 'Direct Marketing', 'Select', 'Prospect', 'Company', 'Warm', 'Neha', 'Sharma', '', 'Million Dreams', 'Entertainment', '+91', '8722153826', '+91', '', '040', '', 'XXXX', 'XXXX', 'Bangalore', '00000000', 'India', 'Karnataka', '', 'neha@milliondreams.co.in', 'milliondreams.co.in', '16', '', '', '', '', '', '', '', '', '', '', '', 0, '2020-01-29 23:56:20', '30-01-2020'),
(7, 'goadbkniqmrpjchelf', 'Events / Shows', '\r\n&lt;div style=', 'Prospect', 'Company', 'Cool', 'Srikar Alapati', '', '', 'Global Tree Consultancy', 'Education', '+91', '9885228854', '+91', '', '040', '', 'D.NO 6-3-879/B/2 3rd Floor, G.Pulla Reddy Sweets Building, Beside CM Camp Office ', 'Begumpet', 'Hyderabad', '500016', 'India', 'Telangana', '', 'srikar@globaltree.in', 'globaltree.in', '16', '', '', '', '', '', '', '', '', '', '', '', 0, '2020-01-30 00:00:29', '30-01-2020'),
(8, 'akolbdhgenqmpjcirf', 'Direct Marketing', 'Select', 'Prospect', 'Company', 'Cool', 'Papiya', 'Banrjee', '', 'Euro Kids', 'Education', '+91', '9830706077', '+91', '097485 60885', '040', '', 'XXXXX', 'Purbachal', 'Kolkata', '0000000', 'India', 'West Bengal', '', 'eurokids.purbachal@gmail.com', 'https://www.facebook.com/Eurokids-Purbachal-312365406305268/', '16', '', '', '', '', '', '', '', '', '', '', '', 0, '2020-01-30 00:04:28', '30-01-2020'),
(9, 'gmqhnaljbckidopefr', 'Digital Advertising', 'Select', 'Prospect', 'Individual', 'Warm', 'Dianna', 'Gram', '', 'Indian Restaurant', 'Food', '+91', '00000000', '+91', '', '040', '', 'XXXX', 'XXXX', 'XXXXX', '0000000', 'United States', 'XXXX', '', 'diannagram088@gmail.com', 'xxxxx', '16', '', '', '', '', '', '', '', '', '', '', '', 0, '2020-01-30 00:07:48', '30-01-2020'),
(10, 'bekqmphgianjcrfold', 'Direct Marketing', 'Select', 'Prospect', 'Company', 'Warm', 'Parikshit', '', '', 'KIng Kisan', 'Agriculture', '+91', '9810567477', '+91', '', '040', '', 'XXXX', 'XXXX', 'Gurugram', '0000000', 'India', 'Haryana', '', 'pranamkisan@gmail.com', 'XXXXX', '16', '', '', '', '', '', '', '', '', '', '', '', 0, '2020-01-30 00:10:58', '30-01-2020'),
(11, 'haibcpjlokgmrqnefd', 'Digital Advertising', '\r\n&lt;div style=', 'Prospect', 'Company', 'Warm', 'Adil', 'Saghir', '', 'Med Travo', 'Health care', '+91', '9886593268', '+91', '', '040', '', 'Hemkunt Chambers-89, 310, 3rd Floor', 'Nehru Place', 'New Delhi', '110019', 'India', 'Delhi', '', 'adil.saghir2@gmail.com', 'medtravo.com', '16', '', '', '', '', '', '', '', '', '', '', '', 0, '2020-01-30 00:15:22', '30-01-2020'),
(12, 'facnjihmopqgeklbrd', 'Social Media', '\r\n&lt;div style=', 'Prospect', 'Company', 'Warm', 'Kiran', 'Kumar Siddoju', '', 'Cosmo 9 Solutions', 'Worldwide web', '+91', '8897344500', '+91', '', '040', '', 'IInd Floor, Khamadenu Complex, Beside Eenadu Office, pp: RTA, Somajiguda(Panjagutta - Khairtabad Route).', 'Somajiguda', 'Hyderabad', '500081', 'India', 'Telangana', '', 'kiran@cosmo9.net', 'cosmo9.net', '16', '', '', '', '', '', '', '', '', '', '', '', 0, '2020-01-30 00:16:45', '30-01-2020'),
(13, 'rnjpcokfhdliqgmaeb', 'Direct Marketing', 'Select', 'Prospect', 'Company', 'Warm', 'Mithun', '', '', 'Maitri Manthan Sansthan (NGO)', 'Health care', '+91', '8875678600', '+91', '', '040', '', '5th Floor, Pacific Tower,', 'Madhuban', 'Udaipur', '313001', 'India', 'Rajasthan', '', 'maitrimanthanngo@gmail.com', 'http://maitrimannthan.org/', '16', '', '', '', '', '', '', '', '', '', '', '', 0, '2020-01-30 00:24:43', '30-01-2020'),
(14, 'dqkmbrnlcaopfhjeig', 'Digital Advertising', 'Select', 'Prospect', 'Company', 'Select', 'Dr Balaraju', 'Naidu', '', 'Onus Hospitals', 'Health care', '+91', '9502792322', '+91', '', '040', '', 'Beside Lucky Bawarchi Hotel, Opposite SBI Bank Main Road', 'Champapet', 'Hyderabad', '500079', 'India', 'Telangana ', '', 'balu2k4@gmail.com', 'onushospitals.com', '16', '', '', '', '', '', '', '', '', '', '', '', 0, '2020-01-30 02:02:19', '30-01-2020'),
(15, 'ijqldcoprkngmbfhae', 'Website', 'Select', 'Prospect', 'Company', 'Cool', 'Shatrughan ', 'Mahto', '', 'Simrann Leather Impex Pvt Ltd', 'Manufacturing', '+91', '9810523166', '+91', '', '040', '', 'XXXX', 'XXXX', 'New Delhi', '0000000', 'India', 'Delhi', '', 'leathersimran@gmail.com', 'xxxxx', '16', '', '', '', '', '', '', '', '', '', '', '', 0, '2020-01-30 02:04:39', '30-01-2020'),
(16, 'fdpmrcqablkjihegno', 'Direct Marketing', '', 'Prospect', 'Company', 'Cool', 'Nagaraju', '', '', 'IMCI Lean Consultant', 'Worldwide web', '+91', '9121329990', '+91', '', '040', '', 'XXXX\r\nMadhapur', 'Madhapur', 'Hyderabad', '500081', 'India', 'Telangana', '', 'gvrnagaraju@gmail.com', 'www.analytiksoncloud.com', '16', '', '', '', '', '', '', '', '', '', '', '', 0, '2020-01-30 02:07:39', '30-01-2020'),
(17, 'ikgcjlmhrodenqfpba', 'Email Marketing', '\r\n&lt;div style=', 'Prospect', 'Company', 'Warm', 'Farah', 'Khan', '', 'Kantha by Farah Khan', 'Manufacturing', '+91', '9674600400', '+91', '', '040', '', 'Kalyani Arcade,', 'Fort William', 'Kolkata', '700021', 'India', 'West Bengal', '', 'farah@farahkhan.co.in', 'www.farahkhankantha.com', '16', '', '', '', '', '', '', '', '', '', '', '', 0, '2020-01-30 02:09:41', '30-01-2020'),
(18, 'kclqrgjnafphbeimod', 'Direct Marketing', '', 'Prospect', 'Company', 'Hot', ' Karl', 'Robinson', '', 'Fable Gifts Limited', 'Worldwide web', '+91', '', '+91', '', '040', '', 'XXX', 'XXX', 'XXX', 'XXXX', 'United Kingdom', 'XXXX', '', 'sales@fablegifts.com', 'fablegifts.com', '16', '', '', '2020-02-12', '', '', '', '', '', 'Ongoing', '', '2020-02-12', 0, '2020-01-31 23:03:35', '01-02-2020'),
(19, 'qfkmcoidljghbanerp', 'Blogging', 'Select', 'Prospect', 'Individual', 'Cool', 'testing', 'testing second', '', 'Cassixcom Enterprise', 'Hospitality', '+91', '1111111111', '+91', '2222222222', '040', '', 'test', 'hyd', 'Secundrabad', '500001', 'India', 'Telangana', '', 'test@test.com', 'test.com', '', '2020-02-26', 'test', '2020-02-27', 'test four', '2020-02-27', '15:33', '23000', 'test hot', 'Ongoing', 'Meeting', '2020-02-27', 0, '2020-02-03 06:22:49', '03-02-2020'),
(20, 'qforeampicbndhjlgk', 'Email Marketing', 'Select', 'Prospect', 'Company', 'Warm', 'Lokesh', '', '', 'Tikotra', 'Health care', '+91', '9841736928', '+91', '', '040', '', 'No.4, 7th Avenue, Harrington Road,', 'Chetpet', 'Chennai', '600031', 'India', 'Tamil Nadu', '', 'manager@dtl.onedeccan.com', 'https://tikotra.com/', '16', '', '', '', '', '', '', '', '', '', '', '', 0, '2020-02-05 04:32:35', '05-02-2020');

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE `referral` (
  `referral_id` int(11) NOT NULL,
  `referral_name` varchar(222) NOT NULL,
  `created` varchar(222) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` varchar(222) NOT NULL,
  `user_type` varchar(222) NOT NULL,
  `firstname` varchar(222) NOT NULL,
  `lastname` varchar(222) NOT NULL,
  `company` varchar(222) NOT NULL,
  `country` varchar(222) NOT NULL,
  `state` varchar(222) NOT NULL,
  `street_address` varchar(222) NOT NULL,
  `street_address_2` varchar(222) NOT NULL,
  `city` varchar(222) NOT NULL,
  `zip` varchar(222) NOT NULL,
  `country_code` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `landline_code` varchar(222) NOT NULL,
  `landline` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `password` varchar(2222) NOT NULL,
  `profile_picture` varchar(222) NOT NULL,
  `status` int(11) NOT NULL,
  `created` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `user_type`, `firstname`, `lastname`, `company`, `country`, `state`, `street_address`, `street_address_2`, `city`, `zip`, `country_code`, `phone`, `landline_code`, `landline`, `email`, `password`, `profile_picture`, `status`, `created`) VALUES
(1, 'fcmolbkephirjqndtags', 'Admin', 'Cassixcom', 'Enterprise', 'Cassixcom', 'India', 'Telangana', 'karkhana', '', 'Hyderabad', '500001', '', '0000000000', '', '', 'info@cassixcom.com', 'jO1BrkBp27Nxewtea3e8JH8VttGtrns3US8klZtHZ5nMh/bA1SyxQR0gyVlUWT6OvBLbzFMVkKh2mJPBZOYzIg==', '', 0, '14-01-2020'),
(15, 'obcmartqnkfiljdpeghs', 'Admin', 'Sean', 'Comello', 'Cassixcom Enterprise', 'India', 'Telangana', 'above icici bank', 'karkhana', 'Secundrabad', '500001', '+91', '9515788239', '', '', 'sean.comello@cassixcom.com', 'tK/Bqvk5P8Uu1ef7Fv54ceQeyXiKIrZh1kZwoG/O5MCg1zTX90y6P22Ue7CyP/ZwOxs6WzxnmphkoNsFjZkTjA==', '', 0, '29-01-2020'),
(16, 'frsepnoaltkbgqcjdmih', 'User', 'Sachin', 'Sharma', 'Cassixcom', 'India', 'Telangana', 'Above ICICI Bank, Karkhana Rd', '', 'Secunderabad', '500009', '91', '7075683331', '', '', 'bdm@cassixcom.com', '6MmNCG6dYS5Ty7cFJrhsxjsvhTXIbuzbxXSr8o3iXKq+B6B1aH+yf8tvjLTY4T5LFF8yIAERdQCHqP9OR5bjyQ==', '', 0, '30-01-2020'),
(17, 'manjseocqfhdbipgktrl', 'Admin', 'Sharon', 'Emanuel-Comello', 'Cassixcom', 'India', 'Telangana', 'Above ICICI Bank, Karkhana Rd', '', 'Secunderabad', '500009', '91', '9701991259', '', '', 'sharon.emanuel-comello@cassixcom.com', 'I9qvrPBqws2o/wOOkdtTMoPADuI9DWDFsUve8NuOSyfNSlvGr3EAp3qyWfUdZvbyZqRAs6O/AxeqAKKSGMQTjw==', '', 0, '30-01-2020'),
(18, 'fkdhtalregsniqjbcmpo', 'User', 'Pramod', 'Addu', 'Cassixcom', 'India', 'Telangana', 'Above ICICI Bank, Karkhana', '', 'Secunderabad', '500009', '91', '9985928650', '', '', 'pramodrao.addu@cassixcom.com', 'dP4XONaV6Dj+ik/tyyxeZPMFMiQmVlKD4cgffw65NlaoHJmjttORBxp1JTAF8Wn5NRNkY2ikDDxleToQ4zdJaA==', '', 0, '30-01-2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`lead_id`);

--
-- Indexes for table `referral`
--
ALTER TABLE `referral`
  ADD PRIMARY KEY (`referral_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `lead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `referral_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
