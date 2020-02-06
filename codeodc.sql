-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2020 at 11:10 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeodc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `company_id` int(11) NOT NULL,
  `company_unique_id` varchar(222) NOT NULL,
  `company_name` varchar(2222) NOT NULL,
  `address_1` varchar(2222) NOT NULL,
  `address_2` varchar(2222) NOT NULL,
  `city` varchar(222) NOT NULL,
  `zip` varchar(222) NOT NULL,
  `state` varchar(222) NOT NULL,
  `country` varchar(222) NOT NULL,
  `firstname` varchar(222) NOT NULL,
  `lastname` varchar(222) NOT NULL,
  `phone_ext` text NOT NULL,
  `phone_number` varchar(222) NOT NULL,
  `landline_ext` varchar(222) NOT NULL,
  `landline_number` varchar(222) NOT NULL,
  `company_email` varchar(222) NOT NULL,
  `login_email` varchar(222) NOT NULL,
  `site_logo` varchar(222) NOT NULL,
  `site_color` varchar(222) NOT NULL,
  `site_color_2` varchar(222) NOT NULL,
  `key_code` varchar(222) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`company_id`, `company_unique_id`, `company_name`, `address_1`, `address_2`, `city`, `zip`, `state`, `country`, `firstname`, `lastname`, `phone_ext`, `phone_number`, `landline_ext`, `landline_number`, `company_email`, `login_email`, `site_logo`, `site_color`, `site_color_2`, `key_code`, `status`) VALUES
(5, 'dbgamiclnfojhek', 'Company One_1', 'address 1', 'address 2', 'hyderabad', '500001', 'Telangana', 'India', 'rehaan ', 'khan', '+91', '8686433748', '040', '', 'info@brande.me', 'rehan.khan@cassixcom.com', '', '', '', 'bifhrytnacpjmgoelxvuwksqd', 1),
(6, 'cahdbemjfiklgno', 'Company One_2', 'adre', 'addre 2', 'Secundrabad', '500001', 'Telangana', 'India', 'Charles', 'Emanuel', '+91', '9885004910', '040', '', 'ce@hureces.in', 'charles@cassixcom.com', '', '', '', 'fwogmpadcvksrjnbhltyeuxiq', 1);

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
  `lead_company_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `created` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`lead_id`, `unique_id`, `lead_source`, `referral`, `lead_type`, `customer_type`, `position`, `firstname`, `lastname`, `customer_name`, `company_name`, `company_type`, `country_code_1`, `contact_1`, `country_code_2`, `contact_2`, `landline_code`, `landline`, `address_1`, `address_2`, `city`, `zip`, `country`, `state`, `phone`, `email`, `website`, `assign_to`, `warm_follow_up_date`, `warm_comments`, `hot_follow_up_date`, `hot_comments`, `finish_follow_up_date`, `follow_up_time`, `proposal_value`, `finish_comments`, `leads_status`, `next_action`, `filter_date`, `lead_company_id`, `status`, `date_time`, `created`) VALUES
(1, 'kbderfpgjlcmqhinoa', 'Organic Search', 'Select', 'Prospect', 'Individual', 'Warm', 'Charles', 'Emanuel', '', 'Hureces', 'Electronics', '+91', '868643374', '+91', '', '040', '', 'address', 'hyd', 'Hyderabad', '500001', 'India', 'Telangana', '', 'ce@hureces.in', 'hureces.in', '', '2020-02-12', 'trstsd', '', '', '', '02:33', '', '', 'Ongoing', 'Phone Call', '2020-02-12', 5, 0, '2020-02-06 14:10:36', '06-02-2020'),
(2, 'eaocrghpiqnkjdfmlb', 'Email Marketing', 'Select', 'Prospect', 'Company', 'Finish', 'Ananda Rao', 'Padigala', '', 'ODC', 'Education', '+91', '8686433748', '+91', '', '040', '', 'address 1', 'hyd', 'Hyderabad', '500001', 'India', 'Telangana', '', 'chanandarao@odchyd.com', 'info@odccert.com', '', '2020-02-18', 'tstasdf', '2020-02-20', 'comsdf', '2020-02-25', '14:23', '20000', 'lead d;', 'Won', 'Proposal', '2020-02-25', 6, 0, '2020-02-06 14:21:16', '06-02-2020');

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE `referral` (
  `referral_id` int(11) NOT NULL,
  `referral_name` varchar(222) NOT NULL,
  `referral_company_id` int(11) NOT NULL,
  `created` varchar(222) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral`
--

INSERT INTO `referral` (`referral_id`, `referral_name`, `referral_company_id`, `created`) VALUES
(1, 'Arjun', 5, '06-02-2020');

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
  `created` varchar(222) NOT NULL,
  `user_is` int(11) NOT NULL,
  `user_company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `user_type`, `firstname`, `lastname`, `company`, `country`, `state`, `street_address`, `street_address_2`, `city`, `zip`, `country_code`, `phone`, `landline_code`, `landline`, `email`, `password`, `profile_picture`, `status`, `created`, `user_is`, `user_company_id`) VALUES
(1, 'fcmolbkephirjqndtags', 'Admin', 'Cassixcom', 'Enterprise', 'Cassixcom', 'India', 'Telangana', 'karkhana', '', 'Hyderabad', '500001', '', '0000000000', '', '', 'info@cassixcom.com', 'XT4KNghkATdWYg==', '', 0, '14-01-2020', 0, 0),
(15, 'obcmartqnkfiljdpeghs', 'Admin', 'Sean', 'Comello', 'Cassixcom Enterprise', 'India', 'Telangana', 'above icici bank', 'karkhana', 'Secundrabad', '500001', '+91', '9515788239', '', '', 'sean.comello@cassixcom.com', 'tK/Bqvk5P8Uu1ef7Fv54ceQeyXiKIrZh1kZwoG/O5MCg1zTX90y6P22Ue7CyP/ZwOxs6WzxnmphkoNsFjZkTjA==', '', 0, '29-01-2020', 0, 0),
(19, 'pdrstjcklnahoifbqmge', 'Admin', 'rehaan ', 'khan', 'Company One', 'India', 'Telangana', 'address 1', 'address 2', 'hyderabad', '500001', '+91', '8686433748', '040', '', 'rehan.khan@cassixcom.com', 'UTJZZQpmU2UPOw==', '', 0, '05-02-2020', 1, 5),
(20, 'lpersfdianhctombkjgq', 'Admin', 'Charles', 'Emanuel', 'Company One_2', 'India', 'Telangana', 'adre', 'addre 2', 'Secundrabad', '500001', '+91', '9885004910', '040', '', 'charles@cassixcom.com', 'UzAINAhkU2VRZQ==', '', 0, '06-02-2020', 1, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`company_id`);

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
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `lead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `referral_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
