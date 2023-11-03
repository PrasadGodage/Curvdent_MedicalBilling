-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 23, 2023 at 04:35 AM
-- Server version: 10.6.15-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u311423116_curvdent`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_access_controls`
--

CREATE TABLE `activity_access_controls` (
  `id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `control_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `activity_access_controls`
--

INSERT INTO `activity_access_controls` (`id`, `activity_id`, `control_name`) VALUES
(1, 1, 'abcz'),
(2, 5, 'Edit');

-- --------------------------------------------------------

--
-- Table structure for table `activity_master`
--

CREATE TABLE `activity_master` (
  `id` int(11) NOT NULL,
  `tab_id` int(11) NOT NULL,
  `activity_title` varchar(150) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon_id` int(11) NOT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `activity_master`
--

INSERT INTO `activity_master` (`id`, `tab_id`, `activity_title`, `url`, `icon_id`, `is_active`) VALUES
(1, 1, 'Cake', 'cake', 7, 1),
(2, 1, 'Flavour', 'flavour', 2, 1),
(3, 1, 'Unit', 'unit', 8, 1),
(4, 1, 'Cake Details', 'cakedetail', 7, 1),
(5, 2, 'Location', 'employeeCountry', 3, 1),
(6, 3, 'Sells Item', 'sellItem', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `office_branch_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile_image` varchar(225) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `aadhar_no` varchar(255) NOT NULL,
  `pancard` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `password` varchar(8) NOT NULL,
  `contact_number1` varchar(20) NOT NULL,
  `contact_number2` varchar(20) DEFAULT NULL,
  `email_id` varchar(150) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  `pincode` varchar(10) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`id`, `role_id`, `profile_id`, `office_branch_id`, `name`, `profile_image`, `dob`, `age`, `gender`, `aadhar_no`, `pancard`, `userid`, `password`, `contact_number1`, `contact_number2`, `email_id`, `address`, `country_id`, `state_id`, `city_id`, `area_id`, `pincode`, `is_active`, `is_verified`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 1, 1, 1, 'Lalit Meshram', 'resource/img/employee/photo2022_01_23_012159000000.jpg', '1989-12-02', 23, 'Male', 'a12345', 'a12345', 'HI5595', '12345', '08007015819', '', 'lalitrmeshram@gmail.com', 'nagpur', 1, 1, 1, NULL, '440034', 1, 0, '2022-01-23 13:21:59', 1, '2023-07-20 15:36:50', 1),
(2, 3, 2, 2, 'Kedar ', NULL, '2014-02-04', 24, 'Male', 'dfdfdg2345', 'fdfe333', 'GV6930', '12345', '08007015819', '', 'lalitrmeshram@gmail.com', 'nandanvan nagpur', 1, 1, 1, NULL, '440009', 1, 1, '2023-07-20 15:39:15', 1, '2023-07-20 15:39:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_master`
--

CREATE TABLE `appointment_master` (
  `id` int(20) NOT NULL,
  `fullName` varchar(300) NOT NULL,
  `contactNo` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_master`
--

INSERT INTO `appointment_master` (`id`, `fullName`, `contactNo`, `email`, `date`, `time`, `address`) VALUES
(45, 'Urmila Minde', 2147483647, 'fnldxntbvl@jggghj', '2023-10-11', '10:01:00', 'sdfghj'),
(47, 'Dipali', 2147483647, 'dipalirahane93@gmail.com', '2023-10-30', '16:15:00', 'chandanapuri'),
(48, 'gaurav', 1254658956, 'prasad.godage@gmail.com', '2023-10-30', '17:20:00', 'chandanapuri'),
(49, 'Krushna', 2147483647, 'deep@gmail.com', '2023-10-30', '11:20:00', 'sangamner'),
(50, 'Nitesh', 2147483647, 'dipalirahane93@gmail.com', '2023-10-30', '16:15:00', 'chandanapuri');

-- --------------------------------------------------------

--
-- Table structure for table `area_master`
--

CREATE TABLE `area_master` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `is_active` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `slug`, `is_active`) VALUES
(1, 'Laser Hair Removal', 'laser', 'Y'),
(2, 'Pimple/Acne Scar', 'Acne Scar', 'Y'),
(3, 'Pimple Treatment', 'pimple treatement', 'Y'),
(4, 'Removal', 'removal', 'Y'),
(5, 'Hair Fall Treatment', 'hair fall treatment', 'Y'),
(6, 'Brand Master', 'brand master', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `city_master`
--

CREATE TABLE `city_master` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `city_master`
--

INSERT INTO `city_master` (`id`, `state_id`, `country_id`, `city`) VALUES
(1, 1, 1, 'Nagpur'),
(2, 1, 1, 'Chandrapur'),
(3, 2, 2, 'NY'),
(4, 1, 1, 'Mumbai'),
(5, 3, 1, 'Bhopal');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_master`
--

CREATE TABLE `client_master` (
  `id` int(11) NOT NULL,
  `firstName` text NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `lastName` text NOT NULL,
  `pass` text NOT NULL,
  `address1` text DEFAULT NULL,
  `address2` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `postcode` text DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `orderNote` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `client_master`
--

INSERT INTO `client_master` (`id`, `firstName`, `emailid`, `lastName`, `pass`, `address1`, `address2`, `city`, `state`, `country`, `postcode`, `phone`, `orderNote`) VALUES
(1, 'lalit', 'lal@gmail.com', 'meshram', '12345', 'New Om Nagar1', 'Nagpur', 'Nagpur', 'Maharashtra', 'India', '789654', '7412589632', 'ssfs'),
(2, 'anvi', 'anvi@gmail.com', 'meshram', '12345`', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(3, 'Anvi', 'anv@gmail.com', 'meshram', '12345', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(4, 'Priyanka', 'priyanka@gmail.com', 'Meshram', '12345', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(5, 'amol', 'amol@gmail.com', 'kohle', '12345', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(6, 'test1', 'test1@gmail.com', 'testsur', '12345', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(7, 'test2', 'test2@gmail.com', 'testsur', '12345', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(8, 'test3', 'test3@gmail.com', 'testsur', '12345', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(9, 'test4', 'test4@gmail.com', 'testsur', '12345', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(10, 'test5', 'test5@gmail.com', 'sdsf', '12345', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(11, 'dfsd', 'sds@gmail.com', 'fdgd', '123', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(12, 'abc', 'test6@gmail.com', 'dsd', '12345', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(13, 'xcgdf', 'test7@gmail.com', 'dfcxv', '12345', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(14, 'sfd', 'test8@gmail.com', 'dsf', '12345', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(15, 'asfsa', 'test9@gmail.com', 'fdsf', '12345', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(16, 'zsfsd', 'test10@gmail.com', 'DSFS', '12345', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(17, 'test11', 'test11@gmail.com', 'ssd', '12345', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(18, 'xdfgdf', 'test12@gmail.com', 'csxcd', '12345', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(19, 'sdsgfs', 'test13@gmail.com', 'dffd', '12345', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(20, 'dfdf', 'test16@gmail.com', 'vdv', '12345', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(21, 'Anvi', 'anv12@gmail.com', 'meshram', '12345', 'New om nagar', 'dcsfcs', 'Nagpur', 'Maharashtra', 'India', '440009', '8007015819', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `contact_name`, `description`) VALUES
(1, 'About Me', 'xyz');

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE `country_master` (
  `id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `country_master`
--

INSERT INTO `country_master` (`id`, `country`) VALUES
(1, 'India'),
(2, 'America');

-- --------------------------------------------------------

--
-- Table structure for table `flavour_master`
--

CREATE TABLE `flavour_master` (
  `id` int(11) NOT NULL,
  `flavour` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `flavour_master`
--

INSERT INTO `flavour_master` (`id`, `flavour`) VALUES
(1, 'dark chocolate'),
(2, 'strawberry1'),
(3, 'strawberry'),
(4, 'chocochips'),
(5, 'abc'),
(6, 'rasmalai'),
(7, 'vanilla');

-- --------------------------------------------------------

--
-- Table structure for table `icon_master`
--

CREATE TABLE `icon_master` (
  `id` int(11) NOT NULL,
  `icon_title` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `icon_master`
--

INSERT INTO `icon_master` (`id`, `icon_title`, `icon`) VALUES
(1, 'Dashboard', 'fa fa-dashboard'),
(2, 'Spinner', 'fa fa-fw fa-spinner'),
(3, 'Briefcase', 'glyphicon glyphicon-briefcase'),
(4, 'Location marker', 'fa fa-map-marker'),
(5, 'Bank', 'fa fa-bank'),
(6, 'Car', 'fa fa-automobile'),
(7, 'Cake', 'fa fa-birthday-cake'),
(8, 'Astrik', 'fa fa-asterisk'),
(9, 'Edit', 'fa fa-edit'),
(10, 'Bell', 'fa fa-bell-o'),
(11, 'Bookmark', 'fa fa-bookmark');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_master`
--

CREATE TABLE `newsletter_master` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `is_newsletter` int(11) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter_master`
--

INSERT INTO `newsletter_master` (`id`, `email`, `name`, `subject`, `number`, `message`, `is_newsletter`, `is_active`) VALUES
(1, 'soulsoft.urmila@gmail.com', 'Urmilla', 'wfw', NULL, NULL, 1, 1),
(2, 'soulsoft.gauravvanam@gmail.com', NULL, NULL, NULL, NULL, 0, 1),
(3, 'soulsoft.krishna@gmail.com', NULL, NULL, NULL, NULL, 1, 1),
(4, 'pradyumnb.297@gmail.com', NULL, NULL, NULL, NULL, 1, 1),
(5, 'soulsoft.soul120@gmail.com', NULL, NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `office_branch_master`
--

CREATE TABLE `office_branch_master` (
  `id` int(11) NOT NULL,
  `office_type_id` int(11) NOT NULL,
  `office_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  `pincode` int(11) NOT NULL,
  `hod_id` int(11) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `contact_number1` varchar(20) DEFAULT NULL,
  `contact_number2` varchar(20) DEFAULT NULL,
  `email_id` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `office_branch_master`
--

INSERT INTO `office_branch_master` (`id`, `office_type_id`, `office_name`, `address`, `country_id`, `state_id`, `city_id`, `area_id`, `pincode`, `hod_id`, `created_by`, `created_at`, `modified_by`, `modified_at`, `contact_number1`, `contact_number2`, `email_id`) VALUES
(1, 1, 'Guddu Cake Shop', '34,rameshwarinagpur', 1, 1, 1, NULL, 440009, 0, NULL, '2022-01-23 12:04:27', NULL, '2022-01-23 12:04:42', '8741258963', '', 'lalit@gmail.com'),
(2, 3, 'Krishna Enterprises', 'kudkeshwar road nagpur', 1, 1, 1, NULL, 440034, 1, NULL, '2023-07-20 15:33:27', NULL, '2023-07-20 15:34:30', '08007015819', '', 'lalitrmeshram@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `office_type_master`
--

CREATE TABLE `office_type_master` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `office_type_master`
--

INSERT INTO `office_type_master` (`id`, `type`) VALUES
(1, 'Main Branch'),
(2, 'Sub-Branch'),
(3, 'shop');

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE `posting` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `featured` char(1) NOT NULL,
  `choice` char(1) NOT NULL,
  `thread` char(1) NOT NULL,
  `id_category` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `is_active` char(1) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `posting`
--

INSERT INTO `posting` (`id`, `title`, `seo_title`, `content`, `featured`, `choice`, `thread`, `id_category`, `photo`, `is_active`, `date`) VALUES
(1, 'Laser Hair Removal', NULL, 'Laser Hair Removal', 'Y', 'Y', 'Y', 1, 'resource/img/blog/photo2023_09_23_102709000000.jfif', 'Y', '2023-09-23'),
(2, 'Pimple/Acne Scar', NULL, 'Pimple/Acne Scar', 'Y', 'Y', 'Y', 2, 'resource/img/blog/photo2023_09_23_103000000000.png', 'Y', '2023-09-23'),
(3, 'Pimple Treatment', NULL, 'Pimple Treatment', 'Y', 'Y', 'Y', 3, 'resource/img/blog/photo2023_09_27_044808000000.png', 'Y', '2023-09-27'),
(4, 'Hair Fall Treatment', NULL, 'Hair Fall Treatment', 'Y', 'Y', 'Y', 1, 'resource/img/blog/photo2023_09_25_092020000000.png', 'Y', '2023-09-25'),
(5, 'Removal', NULL, 'Welcome to Curvdent Hair & Face Clinic, the premier destination near Sangamner exclusively dedicated to providing top-notch hair and face treatments. Our clinic is committed to enhancing your natural beauty and boosting your confidence through specialized services tailored to your individual needs. Whether you seek hair restoration solutions or facial treatments, our experienced team of experts is here to deliver exceptional results. Discover the path to a more radiant you at Curvdent Hair & Face Clinic.', 'Y', 'Y', 'Y', 4, 'resource/img/blog/photo2023_09_26_063818000000.png', 'Y', '2023-09-26'),
(7, 'भरपूर हसा पण रोज दात घासा !', NULL, 'Smile is the universal language.\r\n Smile is the best curve on human body.\r\n\r\nSmile is the best make up , wear it everyday.\r\n\r\nSmile is the happiness that is very near to you.<br>\r\n\r\n      अशा अनेक सुंदर विचारांच्या पोस्ट आपण रोज सोशल मिडियावर इकडून तिकडे फिरवत  असतो पण एकदा आपल्या सहज काढलेल्या  फोटोकडे पहा , मग लक्षात येईल की , आपण सहजासहजी हसत नाही अन मनमोकळं हसणं तर सध्या दुर्मिळ झालं आहे.\r\n\r\n    यामागे काही वेळा मूड तर काही वेळा \'हसताना आपण चांगले दिसू का\' ?हा विचार असतो.\r\n\r\nम्हणूनच मनमोकळं हसण्यासाठी सर्वात महत्वाचं काय असेल तर आपले दात !\r\n\r\n\" जान है तो जहान है और\r\n\r\n    दात है तो मुस्कान है |\"\r\n\r\n   म्हणूनच या  पुस्तकाची सुरुवात आपण या प्रकरणापासून केली आहे , थोडक्यात काय तर सतत हसरा चेहरा ठेवण्यासाठी दातांची काळजी घेणं महत्वाचं आहे , त्याविषयी आपण या पुस्तकात सविस्तर चर्चा करणार आहोतच. म्हणूनच  ,\r\n\r\n\" भरपूर हसा पण रोज दात घासा !\"', 'Y', 'Y', 'Y', 6, 'resource/img/blog/photo2023_09_27_093446000000.jpg', 'Y', '2023-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `PostNewsletter`
--

CREATE TABLE `PostNewsletter` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `PDF` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `PostNewsletter`
--

INSERT INTO `PostNewsletter` (`id`, `title`, `content`, `PDF`, `date`) VALUES
(24, 'test subject', 'test message', 'uploads/Newsletter-March-2023.pdf', '2023-10-18'),
(29, 'test1', 'test1', 'uploads/Experiment_No__12.pdf', '2023-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'product01', 500, '2023-07-19 03:36:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile_access_control_permission`
--

CREATE TABLE `profile_access_control_permission` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `aac_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `permission` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `profile_access_control_permission`
--

INSERT INTO `profile_access_control_permission` (`id`, `profile_id`, `aac_id`, `activity_id`, `permission`) VALUES
(2, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `profile_activity_permission`
--

CREATE TABLE `profile_activity_permission` (
  `id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `profile_activity_permission`
--

INSERT INTO `profile_activity_permission` (`id`, `activity_id`, `profile_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(6, 2, 2),
(3, 3, 1),
(4, 4, 1),
(5, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `profile_master`
--

CREATE TABLE `profile_master` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `profile_master`
--

INSERT INTO `profile_master` (`id`, `role_id`, `profile`, `is_active`) VALUES
(1, 1, 'Admin-License', 1),
(2, 3, 'Sells Manager', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile_role_permission`
--

CREATE TABLE `profile_role_permission` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `profile_role_permission`
--

INSERT INTO `profile_role_permission` (`id`, `role_id`, `profile_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `profile_tab_permission`
--

CREATE TABLE `profile_tab_permission` (
  `id` int(11) NOT NULL,
  `tab_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `profile_tab_permission`
--

INSERT INTO `profile_tab_permission` (`id`, `tab_id`, `profile_id`) VALUES
(1, 1, 1),
(3, 1, 2),
(2, 2, 1),
(4, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `role_master`
--

CREATE TABLE `role_master` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `role_master`
--

INSERT INTO `role_master` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Employee'),
(3, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE `state_master` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`id`, `country_id`, `state`, `is_active`) VALUES
(1, 1, 'Maharashtra', 1),
(2, 2, 'Californiaaa', 1),
(3, 1, 'madya pradesh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `super_master`
--

CREATE TABLE `super_master` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `super_master`
--

INSERT INTO `super_master` (`id`, `uname`, `password`, `created_at`) VALUES
(1, 'lalit@gmail.com', '12345', '2023-07-19 10:16:22'),
(4, 'anvi@gmail.com', '$2y$10$PvC9fLa9Td0XwKNj9LVOu.99hQEPX9LidCzdVFTDn2FvM/nqi6mwa', '2023-07-20 05:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `tab_master`
--

CREATE TABLE `tab_master` (
  `id` int(11) NOT NULL,
  `tab_name` varchar(100) NOT NULL,
  `is_subtab` tinyint(1) NOT NULL DEFAULT 0,
  `icon_id` int(11) NOT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tab_master`
--

INSERT INTO `tab_master` (`id`, `tab_name`, `is_subtab`, `icon_id`, `is_active`) VALUES
(1, 'Cake Details', 1, 8, 1),
(2, 'Location', 0, 4, 1),
(3, 'Sell', 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit_master`
--

CREATE TABLE `unit_master` (
  `id` int(11) NOT NULL,
  `unit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `unit_master`
--

INSERT INTO `unit_master` (`id`, `unit`) VALUES
(1, '1kg'),
(2, '100gm'),
(3, 'm1213'),
(4, '10kg'),
(5, '11kg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) DEFAULT 'default.jpg',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_admin` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `is_confirmed` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `created_at`, `updated_at`, `is_admin`, `is_confirmed`, `is_deleted`) VALUES
(1, 'lalit12', 'lalit@gmail.com', '$2y$10$wgbSrz3zwn4pv992JwinyeDoIR8H7UIq4gA2M3ZyXHEdFV79oyQLm', 'default.jpg', '2023-07-19 04:46:13', NULL, 0, 0, 0),
(2, 'lalit13', 'lalit1@gmail.com', '$2y$10$smPqtmBnJsEqQTJJ99Ddh.3nf..76Ty4vukzulLsyAHV8HVuXwkDW', 'default.jpg', '2023-07-19 07:50:05', NULL, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_access_controls`
--
ALTER TABLE `activity_access_controls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `for activity tbl` (`activity_id`);

--
-- Indexes for table `activity_master`
--
ALTER TABLE `activity_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`),
  ADD KEY `tab master tbl id` (`tab_id`),
  ADD KEY `icon_master tbl id` (`icon_id`);

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user id` (`userid`),
  ADD KEY `role id` (`role_id`),
  ADD KEY `profile id` (`profile_id`),
  ADD KEY `office_branch id` (`office_branch_id`),
  ADD KEY `country id` (`country_id`),
  ADD KEY `state id` (`state_id`),
  ADD KEY `city id` (`city_id`),
  ADD KEY `area id` (`area_id`),
  ADD KEY `admin id` (`created_by`),
  ADD KEY `modified user id` (`modified_by`),
  ADD KEY `aadhar_no` (`aadhar_no`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `appointment_master`
--
ALTER TABLE `appointment_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area_master`
--
ALTER TABLE `area_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_master tbl id` (`city_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_master`
--
ALTER TABLE `city_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_master id` (`state_id`),
  ADD KEY `country_master tbl id` (`country_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `client_master`
--
ALTER TABLE `client_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailid` (`emailid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_master`
--
ALTER TABLE `country_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flavour_master`
--
ALTER TABLE `flavour_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icon_master`
--
ALTER TABLE `icon_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_master`
--
ALTER TABLE `newsletter_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_branch_master`
--
ALTER TABLE `office_branch_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `office_type_master tbl id` (`office_type_id`),
  ADD KEY `country_master tbl id` (`country_id`),
  ADD KEY `state_master tbl id` (`state_id`),
  ADD KEY `city_master tbl id` (`city_id`),
  ADD KEY `area_master tbl id` (`area_id`);

--
-- Indexes for table `office_type_master`
--
ALTER TABLE `office_type_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `PostNewsletter`
--
ALTER TABLE `PostNewsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_access_control_permission`
--
ALTER TABLE `profile_access_control_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_master and activity_access_control tbl id` (`profile_id`,`aac_id`),
  ADD KEY `aac_id` (`aac_id`);

--
-- Indexes for table `profile_activity_permission`
--
ALTER TABLE `profile_activity_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity tbl id with prfile id unique` (`activity_id`,`profile_id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `profile_master`
--
ALTER TABLE `profile_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_master table id` (`role_id`);

--
-- Indexes for table `profile_role_permission`
--
ALTER TABLE `profile_role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role master with profile master` (`role_id`,`profile_id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `profile_tab_permission`
--
ALTER TABLE `profile_tab_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tab and profile unique` (`tab_id`,`profile_id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `role_master`
--
ALTER TABLE `role_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Indexes for table `state_master`
--
ALTER TABLE `state_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_master id` (`country_id`);

--
-- Indexes for table `super_master`
--
ALTER TABLE `super_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user id should be unique` (`uname`);

--
-- Indexes for table `tab_master`
--
ALTER TABLE `tab_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `icon_mster tbl id` (`icon_id`);

--
-- Indexes for table `unit_master`
--
ALTER TABLE `unit_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_access_controls`
--
ALTER TABLE `activity_access_controls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `activity_master`
--
ALTER TABLE `activity_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_master`
--
ALTER TABLE `admin_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment_master`
--
ALTER TABLE `appointment_master`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `area_master`
--
ALTER TABLE `area_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `city_master`
--
ALTER TABLE `city_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client_master`
--
ALTER TABLE `client_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country_master`
--
ALTER TABLE `country_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `flavour_master`
--
ALTER TABLE `flavour_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `icon_master`
--
ALTER TABLE `icon_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `newsletter_master`
--
ALTER TABLE `newsletter_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `office_branch_master`
--
ALTER TABLE `office_branch_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `office_type_master`
--
ALTER TABLE `office_type_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posting`
--
ALTER TABLE `posting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `PostNewsletter`
--
ALTER TABLE `PostNewsletter`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile_access_control_permission`
--
ALTER TABLE `profile_access_control_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profile_activity_permission`
--
ALTER TABLE `profile_activity_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profile_master`
--
ALTER TABLE `profile_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profile_role_permission`
--
ALTER TABLE `profile_role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profile_tab_permission`
--
ALTER TABLE `profile_tab_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_master`
--
ALTER TABLE `role_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `state_master`
--
ALTER TABLE `state_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `super_master`
--
ALTER TABLE `super_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tab_master`
--
ALTER TABLE `tab_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unit_master`
--
ALTER TABLE `unit_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_access_controls`
--
ALTER TABLE `activity_access_controls`
  ADD CONSTRAINT `activity_access_controls_ibfk_1` FOREIGN KEY (`activity_id`) REFERENCES `activity_master` (`id`);

--
-- Constraints for table `activity_master`
--
ALTER TABLE `activity_master`
  ADD CONSTRAINT `activity_master_ibfk_1` FOREIGN KEY (`tab_id`) REFERENCES `tab_master` (`id`);

--
-- Constraints for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD CONSTRAINT `admin_master_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role_master` (`id`),
  ADD CONSTRAINT `admin_master_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `profile_master` (`id`),
  ADD CONSTRAINT `admin_master_ibfk_3` FOREIGN KEY (`office_branch_id`) REFERENCES `office_branch_master` (`id`),
  ADD CONSTRAINT `admin_master_ibfk_4` FOREIGN KEY (`country_id`) REFERENCES `country_master` (`id`),
  ADD CONSTRAINT `admin_master_ibfk_5` FOREIGN KEY (`state_id`) REFERENCES `state_master` (`id`),
  ADD CONSTRAINT `admin_master_ibfk_6` FOREIGN KEY (`city_id`) REFERENCES `city_master` (`id`);

--
-- Constraints for table `area_master`
--
ALTER TABLE `area_master`
  ADD CONSTRAINT `area_master_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city_master` (`id`);

--
-- Constraints for table `city_master`
--
ALTER TABLE `city_master`
  ADD CONSTRAINT `city_master_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state_master` (`id`);

--
-- Constraints for table `profile_access_control_permission`
--
ALTER TABLE `profile_access_control_permission`
  ADD CONSTRAINT `profile_access_control_permission_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profile_master` (`id`),
  ADD CONSTRAINT `profile_access_control_permission_ibfk_2` FOREIGN KEY (`aac_id`) REFERENCES `activity_access_controls` (`id`);

--
-- Constraints for table `profile_activity_permission`
--
ALTER TABLE `profile_activity_permission`
  ADD CONSTRAINT `profile_activity_permission_ibfk_1` FOREIGN KEY (`activity_id`) REFERENCES `activity_master` (`id`),
  ADD CONSTRAINT `profile_activity_permission_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `profile_master` (`id`);

--
-- Constraints for table `profile_master`
--
ALTER TABLE `profile_master`
  ADD CONSTRAINT `profile_master_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role_master` (`id`);

--
-- Constraints for table `profile_role_permission`
--
ALTER TABLE `profile_role_permission`
  ADD CONSTRAINT `profile_role_permission_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role_master` (`id`),
  ADD CONSTRAINT `profile_role_permission_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `profile_master` (`id`);

--
-- Constraints for table `profile_tab_permission`
--
ALTER TABLE `profile_tab_permission`
  ADD CONSTRAINT `profile_tab_permission_ibfk_1` FOREIGN KEY (`tab_id`) REFERENCES `tab_master` (`id`),
  ADD CONSTRAINT `profile_tab_permission_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `profile_master` (`id`);

--
-- Constraints for table `state_master`
--
ALTER TABLE `state_master`
  ADD CONSTRAINT `state_master_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country_master` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
