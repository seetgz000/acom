-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2017 at 10:30 AM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tod`
--

-- --------------------------------------------------------

--
-- Table structure for table `age_group`
--

CREATE TABLE `age_group` (
  `id` int(11) NOT NULL,
  `group` varchar(32) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `age_group`
--

INSERT INTO `age_group` (`id`, `group`) VALUES
(1, '13-19'),
(2, '20-29'),
(3, '30-39'),
(4, '40-49'),
(5, '50-59'),
(6, '60-Older');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_status`
--

CREATE TABLE `feedback_status` (
  `id` int(11) NOT NULL,
  `status` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `feedback_status`
--

INSERT INTO `feedback_status` (`id`, `status`) VALUES
(1, 'Pending'),
(2, 'Accepted'),
(3, 'Declined\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `parameter` varchar(256) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` int(1) DEFAULT '0',
  `log_action_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `user_id`, `description`, `parameter`, `created_date`, `deleted`, `log_action_id`) VALUES
(275, 2, 'Log In', '', '2017-05-11 01:23:46', 0, 1),
(276, 2, 'Create User : admin', '34', '2017-05-11 01:24:24', 0, 2),
(277, 2, 'Create visitor chong yew yang ', '55', '2017-05-11 01:26:46', 0, 4),
(278, 2, 'Created follow up for visitor : chong yew yang ', '93', '2017-05-11 01:26:46', 0, 8),
(279, 2, 'Added remarks to visitor', '{"feedback_id":18,"visitor":"55"}', '2017-05-11 01:27:35', 0, 7),
(280, 2, 'Changes to follow up #93', '93', '2017-05-11 01:27:46', 0, 12),
(281, 2, 'Edit visitor information :chong yew yang ', '55', '2017-05-11 01:28:45', 0, 6),
(282, 2, 'Respond to follow up #93', '18', '2017-05-11 01:33:20', 0, 9),
(283, 2, 'Respond to follow up #93', '19', '2017-05-11 01:33:25', 0, 9),
(284, 2, 'Edit visitor information :Chong Yew Yang', '55', '2017-05-11 01:35:27', 0, 6),
(285, 34, 'Log In', '', '2017-05-11 01:36:46', 0, 1),
(286, 2, 'Log In', '', '2017-05-11 01:39:23', 0, 1),
(288, 2, 'Log In', '', '2017-05-11 01:51:42', 0, 1),
(289, 34, 'Log In', '', '2017-05-11 02:08:02', 0, 1),
(290, 34, 'Log In', '', '2017-05-11 02:16:01', 0, 1),
(291, 34, 'Edit visitor information :Chong Yew Yang', '55', '2017-05-11 02:18:28', 0, 6),
(292, 34, 'Changed to follow up #93 status to : PAUSE', '93', '2017-05-11 02:19:18', 0, 13),
(293, 34, 'Changed to follow up #93 status to : ACTIVE', '93', '2017-05-11 02:19:21', 0, 13),
(294, 34, 'Changed to follow up #93 status to : PAUSE', '93', '2017-05-11 02:19:24', 0, 13),
(295, 34, 'Changed to follow up #93 status to : ACTIVE', '93', '2017-05-11 02:19:30', 0, 13),
(296, 34, 'Changes to follow up #93', '93', '2017-05-11 02:20:19', 0, 12),
(297, 34, 'Log In', '', '2017-05-11 12:55:47', 0, 1),
(298, 34, 'Create visitor Jason Khaw', '56', '2017-05-11 13:00:18', 0, 4),
(299, 34, 'Created follow up for visitor : Jason Khaw', '94', '2017-05-11 13:00:18', 0, 8),
(300, 34, 'Edit visitor information :Jason Khaw', '56', '2017-05-11 13:00:51', 0, 6),
(301, 34, 'Added remarks to visitor', '{"feedback_id":19,"visitor":"56"}', '2017-05-11 13:01:12', 0, 7),
(302, 34, 'Edit visitor information :Chong Yew Yang', '55', '2017-05-11 13:02:56', 0, 6),
(303, 34, 'Deleted visitor Jason Khaw', '56', '2017-05-11 13:05:18', 0, 16),
(304, 2, 'Log In', '', '2017-05-11 13:41:10', 0, 1),
(305, 2, 'Created follow up for visitor : Chong Yew Yang', '95', '2017-05-11 13:44:25', 0, 8),
(306, 2, 'Log In', '', '2017-05-11 16:20:08', 0, 1),
(307, 2, 'Log In', '', '2017-05-12 13:19:22', 0, 1),
(308, 2, 'Changed to follow up #93 status to : PAUSE', '93', '2017-05-12 13:21:40', 0, 13),
(309, 2, 'Edit visitor information :Chong Yew Yang', '55', '2017-05-12 13:29:07', 0, 6),
(310, 34, 'Log In', '', '2017-05-12 13:31:40', 0, 1),
(311, 1, 'Log In', '', '2017-05-12 17:15:28', 0, 1),
(312, 2, 'Log In', '', '2017-05-12 17:17:41', 0, 1),
(313, 1, 'Log In', '', '2017-05-12 17:36:24', 0, 1),
(314, 1, 'Changed to follow up #95 status to : PAUSED', '95', '2017-05-12 17:36:42', 0, 13),
(315, 1, 'Created follow up for visitor : Chong Yew Yang', '96', '2017-05-12 17:53:01', 0, 8),
(316, 1, 'Changed to follow up #96 status to : PAUSED', '96', '2017-05-12 17:53:27', 0, 13),
(317, 1, 'Edit visitor information :Chong Yew Yang', '55', '2017-05-12 18:03:10', 0, 6),
(318, 1, 'Edit visitor information :Chong Yew Yang', '55', '2017-05-12 18:03:21', 0, 6),
(319, 34, 'Log In', '', '2017-05-13 01:26:38', 0, 1),
(320, 34, 'Create User : Connector1', '35', '2017-05-13 01:29:31', 0, 2),
(321, 34, 'Created follow up for visitor : Chong Yew Yang', '97', '2017-05-13 01:32:02', 0, 8),
(322, 2, 'Log In', '', '2017-05-13 02:17:11', 0, 1),
(323, 2, 'Create visitor visitor 2', '57', '2017-05-13 02:18:43', 0, 4),
(324, 2, 'Created follow up for visitor : visitor 2', '98', '2017-05-13 02:18:43', 0, 8),
(325, 2, 'Edit visitor information :Chong Yew Yang', '55', '2017-05-13 02:22:31', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `log_id` int(11) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `ip_address` varchar(64) COLLATE utf8_bin NOT NULL,
  `browser_type` varchar(128) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`id`, `user_id`, `timestamp`, `log_id`, `deleted`, `ip_address`, `browser_type`) VALUES
(1, 2, '2017-05-11 01:23:46', 275, 0, '61.6.30.198', 'Chrome 57.0.2987.133'),
(3, 2, '2017-05-11 01:39:23', 286, 0, '61.6.30.198', 'Chrome 57.0.2987.133'),
(4, 2, '2017-05-11 01:51:42', 288, 0, '61.6.30.198', 'Chrome 57.0.2987.132'),
(5, 34, '2017-05-11 02:08:02', 289, 0, '61.6.30.198', 'Chrome 57.0.2987.133'),
(6, 34, '2017-05-11 02:16:01', 290, 0, '115.132.115.144', 'Firefox 53.0'),
(7, 34, '2017-05-11 12:55:47', 297, 0, '14.192.213.23', 'Chrome 57.0.2987.133'),
(8, 2, '2017-05-11 13:41:10', 304, 0, '61.6.30.198', 'Chrome 57.0.2987.133'),
(9, 2, '2017-05-11 16:20:08', 306, 0, '61.6.30.198', 'Chrome 57.0.2987.133'),
(10, 2, '2017-05-12 13:19:22', 307, 0, '61.6.30.198', 'Chrome 57.0.2987.133'),
(11, 34, '2017-05-12 13:31:40', 310, 0, '115.132.115.144', 'Firefox 53.0'),
(12, 1, '2017-05-12 17:15:28', 311, 0, '115.132.132.135', 'Chrome 57.0.2987.133'),
(13, 2, '2017-05-12 17:17:41', 312, 0, '61.6.30.198', 'Chrome 57.0.2987.133'),
(14, 1, '2017-05-12 17:36:24', 313, 0, '115.132.132.135', 'Chrome 57.0.2987.133'),
(15, 34, '2017-05-13 01:26:38', 319, 0, '115.132.115.144', 'Firefox 53.0'),
(16, 2, '2017-05-13 02:17:11', 322, 0, '115.164.51.129', 'Chrome 57.0.2987.133');

-- --------------------------------------------------------

--
-- Table structure for table `log_action`
--

CREATE TABLE `log_action` (
  `id` int(11) NOT NULL,
  `module` varchar(32) COLLATE utf8_bin NOT NULL,
  `function` varchar(32) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `log_action`
--

INSERT INTO `log_action` (`id`, `module`, `function`) VALUES
(1, 'access', 'login'),
(2, 'user', 'add'),
(3, 'user', 'edit'),
(4, 'visitor', 'add'),
(5, 'visitor', 'assign'),
(6, 'visitor', 'edit'),
(7, 'visitor', 'feedback'),
(8, 'visitor', 'add_follow_up'),
(9, 'visitor', 'add_follow_up_notes'),
(10, 'user', 'delete'),
(11, 'user', 'edit'),
(12, 'visitor', 'edit_follow_up'),
(13, 'visitor', 'follow_up_status'),
(14, 'role', 'add'),
(15, 'role', 'edit'),
(16, 'visitor', 'delete');

-- --------------------------------------------------------

--
-- Table structure for table `report_period`
--

CREATE TABLE `report_period` (
  `id` int(11) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `report_period`
--

INSERT INTO `report_period` (`id`, `from`, `to`) VALUES
(1, '2017-05-07', '2017-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `visitor_view` tinyint(4) NOT NULL DEFAULT '0',
  `visitor_edit` tinyint(4) NOT NULL DEFAULT '0',
  `visitor_add` tinyint(4) NOT NULL DEFAULT '0',
  `visitor_delete` tinyint(4) NOT NULL DEFAULT '0',
  `user_view` tinyint(4) NOT NULL DEFAULT '0',
  `user_add` tinyint(4) NOT NULL DEFAULT '0',
  `user_delete` tinyint(4) NOT NULL DEFAULT '0',
  `report_view` tinyint(4) NOT NULL DEFAULT '0',
  `log` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `name`, `deleted`, `visitor_view`, `visitor_edit`, `visitor_add`, `visitor_delete`, `user_view`, `user_add`, `user_delete`, `report_view`, `log`) VALUES
(1, 'System Admin', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'G1', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 'G2', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(4, 'G3', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(5, 'G4', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(7, 'dead role', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `selection_on_card`
--

CREATE TABLE `selection_on_card` (
  `selection_on_card_id` int(11) NOT NULL,
  `title` varchar(256) CHARACTER SET utf8 NOT NULL,
  `type` varchar(256) CHARACTER SET utf8 NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `selection_on_card`
--

INSERT INTO `selection_on_card` (`selection_on_card_id`, `title`, `type`, `deleted`) VALUES
(1, 'Worship Ministry', 'interest', 0),
(2, 'Care Group', 'interest', 0),
(3, 'Children Ministry', 'interest', 0),
(4, 'Youth Ministy', 'interest', 0),
(5, 'Young Adult Ministry', 'interest', 0),
(6, 'First-Time Visitor', 'options', 1),
(7, 'Returning Visitor', 'options', 1),
(8, 'Would like a visit', 'options', 0),
(9, 'Would like to know more about being a Christian', 'options', 0),
(10, 'Would like to be baptized in the Holy Spirit', 'options', 0),
(11, 'Would like to be a church member', 'options', 0),
(12, 'WAKAKAKAKA', 'options', 1),
(13, 'WAKAKAKAKA', 'options', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(256) CHARACTER SET utf8 NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 NOT NULL,
  `position` varchar(256) CHARACTER SET utf8 NOT NULL,
  `contact` varchar(256) CHARACTER SET utf8 NOT NULL,
  `email` varchar(256) CHARACTER SET utf8 NOT NULL,
  `salt` int(8) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `first_name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(256) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `role_id`, `username`, `password`, `position`, `contact`, `email`, `salt`, `created_date`, `created_by`, `deleted`, `first_name`, `last_name`) VALUES
(0, 1, 'unassigned', 'no password', 'unassigned', '1234567890', 'unassigned@gmail.com', 1234567890, '2017-05-07 14:44:53', 0, 0, 'unassigned', 'unassigned'),
(1, 1, 'emmwee', 'ed260090514ffaf54bcf1d03db1f54b6ab96fcd908f41ba31488300762554b0c1b670835e35a8c3b38ddb1c4e2d7ba95dae171fa3561e1e2b9edb417687bc412', 'tester', '0149151084', 'emmwee96@gmail.com', 99376710, '2017-03-23 16:05:36', 1, 0, 'Emmanual', 'Wee'),
(2, 1, 'cyyang', '85959dad2482d62c16d3492def5614dac79ef768596c48132fcd17a8dd8c6e6ff7f78411d79d14f16fa9ffca0cca3f215394dd0adbaee278e0f52cb8151bb40e', 'tester', '+60167780275', 'cyyang94@hotmail.com', 85732379, '2017-03-23 16:05:36', 1, 0, 'yew yang', 'Chong'),
(34, 2, 'admin', 'ad511f2882609549c2ee24fc548c06ac773627e5de38b44962915a3fbc64bb3eb6fd02bbc57bab695e41b4639ce58eb38e3d391841613da6556ed114c5a029a2', 'tester', '123123', 'admin@hotmail.com', 74445936, '2017-05-11 01:24:24', 2, 0, 'tester', 'tester'),
(35, 5, 'Connector1', 'a1fd27ec42b07bfc036b6f7de8c6213d90be7005a1c17ccb4050ab687c27a6c572c7a152de948d04e7f8dcf3fac023a231095bed21053a9eaa59b5c98826e931', 'asd', 'asd', 'xephnc@gmail.com', 67096313, '2017-05-13 01:29:31', 34, 0, 'Vincent', 'One');

-- --------------------------------------------------------

--
-- Table structure for table `user_history`
--

CREATE TABLE `user_history` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(256) CHARACTER SET utf8 NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 NOT NULL,
  `position` varchar(256) CHARACTER SET utf8 NOT NULL,
  `contact` varchar(256) CHARACTER SET utf8 NOT NULL,
  `email` varchar(256) CHARACTER SET utf8 NOT NULL,
  `salt` int(8) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `first_name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_history`
--

INSERT INTO `user_history` (`user_id`, `role_id`, `username`, `password`, `position`, `contact`, `email`, `salt`, `created_date`, `created_by`, `log_id`, `deleted`, `first_name`, `last_name`, `id`) VALUES
(34, 2, 'admin', 'ad511f2882609549c2ee24fc548c06ac773627e5de38b44962915a3fbc64bb3eb6fd02bbc57bab695e41b4639ce58eb38e3d391841613da6556ed114c5a029a2', 'tester', '123123', 'admin@hotmail.com', 74445936, '2017-05-11 01:24:24', 2, 276, 0, 'tester', 'tester', 11),
(35, 5, 'Connector1', 'a1fd27ec42b07bfc036b6f7de8c6213d90be7005a1c17ccb4050ab687c27a6c572c7a152de948d04e7f8dcf3fac023a231095bed21053a9eaa59b5c98826e931', 'asd', 'asd', 'xephnc@gmail.com', 67096313, '2017-05-13 01:29:31', 34, 320, 0, 'Vincent', 'One', 12);

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `visitor_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `address` varchar(256) CHARACTER SET utf8 NOT NULL,
  `post_code` varchar(256) CHARACTER SET utf8 NOT NULL,
  `nationality` varchar(256) CHARACTER SET utf8 NOT NULL,
  `contact` varchar(256) CHARACTER SET utf8 NOT NULL,
  `email` varchar(256) CHARACTER SET utf8 NOT NULL,
  `age_group` varchar(256) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(256) CHARACTER SET utf8 NOT NULL,
  `marital_status` varchar(256) CHARACTER SET utf8 NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `first_time` tinyint(1) NOT NULL,
  `christian` tinyint(1) NOT NULL DEFAULT '0',
  `church` varchar(256) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `invited_by` varchar(256) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `prayer_for` varchar(256) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `notes` longtext COLLATE utf8_bin NOT NULL,
  `thumbnail` varchar(128) COLLATE utf8_bin NOT NULL,
  `not_welcomed` tinyint(4) NOT NULL DEFAULT '0',
  `reason_not_welcomed` longtext COLLATE utf8_bin NOT NULL,
  `visit_date` date NOT NULL,
  `added_date` date NOT NULL,
  `feedback_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`visitor_id`, `created_by`, `assigned_to`, `name`, `address`, `post_code`, `nationality`, `contact`, `email`, `age_group`, `gender`, `marital_status`, `created_date`, `first_time`, `christian`, `church`, `invited_by`, `prayer_for`, `deleted`, `notes`, `thumbnail`, `not_welcomed`, `reason_not_welcomed`, `visit_date`, `added_date`, `feedback_status`) VALUES
(55, 34, 34, 'Chong Yew Yang', '2, Lorong 3,\r\nJalan Sri Pelangi 1, Taman Pelangi', 'Johor', 'Malaysia', '+6016778027511', 'cyyang94@hotmail.com', '2', 'Male', 'Single', '2017-05-11 01:26:46', 0, 0, '', 'jason', '', 0, '', '/images/Profile/11421617_10152926085907997_1330952461_n_(1)_copy.jpg', 0, '', '2017-04-30', '2017-05-11', 3),
(56, 34, 34, 'Jason Khaw', 'Pearl Suria', '58200', 'Malaysian', '0163777267', 'jasonkhaw@usa.com', '4', 'Male', 'Single', '2017-05-11 13:00:18', 0, 0, '', '', '', 1, '', '/images/default_avatar.jpg', 0, '', '2017-05-11', '2017-05-11', 2),
(57, 2, 2, 'visitor 2', '2, Lorong 3,\r\nJalan Sri Pelangi 1, Taman Pelangi', '80400', 'Malaysia', '+60143170275', 'centauryy@gmail.com', '1', 'Male', 'Single', '2017-05-13 02:18:43', 1, 1, 'another church', 'test', '', 0, '', '/images/default_avatar.jpg', 0, '', '2017-05-13', '2017-05-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_feedback`
--

CREATE TABLE `visitor_feedback` (
  `visitor_feedback_id` int(11) NOT NULL,
  `visitor_id` int(11) NOT NULL,
  `feedback` text CHARACTER SET utf8 NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `visitor_feedback`
--

INSERT INTO `visitor_feedback` (`visitor_feedback_id`, `visitor_id`, `feedback`, `deleted`, `created_on`, `created_by`) VALUES
(18, 55, '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."\n\n', 0, '2017-05-11 01:27:35', 2),
(19, 56, 'feedback here', 0, '2017-05-11 13:01:12', 34);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_follow_up`
--

CREATE TABLE `visitor_follow_up` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `visitor_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8_bin NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `follow_up_date` date NOT NULL,
  `update_follow_up_id` int(11) DEFAULT NULL,
  `subject` varchar(256) COLLATE utf8_bin NOT NULL,
  `follow_up_time` time NOT NULL,
  `notify_appoint_to_by_date` date NOT NULL,
  `appoint_to` int(11) NOT NULL,
  `follow_up_status` enum('ACTIVE','PAUSED') COLLATE utf8_bin NOT NULL DEFAULT 'ACTIVE',
  `stop_reason` longtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `visitor_follow_up`
--

INSERT INTO `visitor_follow_up` (`id`, `user_id`, `visitor_id`, `description`, `timestamp`, `follow_up_date`, `update_follow_up_id`, `subject`, `follow_up_time`, `notify_appoint_to_by_date`, `appoint_to`, `follow_up_status`, `stop_reason`) VALUES
(93, 2, 55, 'Please contact Chong on this date to see when will he be coming', '2017-05-11 01:26:46', '2017-05-13', NULL, '1st follow up', '00:00:00', '2017-05-12', 2, '', ''),
(94, 34, 56, '', '2017-05-11 13:00:18', '2017-05-11', NULL, '', '09:00:00', '2017-05-11', 34, 'ACTIVE', ''),
(95, 2, 55, 'Testing for bug', '2017-05-11 13:44:25', '2017-05-11', NULL, 'bug test ', '09:00:00', '2017-05-11', 2, 'PAUSED', ''),
(96, 1, 55, 'What is lorem ipsum?\r\nLorem Ipsum is unadulterated drivel. It means nothing whatsoever, but it\'s surprisingly useful. The main idea behind lorem ipsum is to have \'convincing\' text, separated into words, paragraphs and with punctuation etc. This \'text\' is then used by DTP bureaux and web designers for roughing out document designs, illustrating text flow and run arounds before the final text arrives. It allows designers to show their proposals without having clients distracted by meaningful text. It also avoids fine publications like N.T.K. detecting irony which may become apparent in old web page drafts loitering around dusty servers which had English-language garbage text used as filler. A FOLDOC definition of lorem ipsum is here.\r\nThis page will generate random lorem ipsum with convincing sentence and paragraphing constructs. Just fill in the fields below to suit your needs and a customised random load of pseudo-latin guff will be sent back to you. There is an 100K limit, to stunt the ambitions of l33t haX0rz with novelty DOS attack plans.\r\n\r\nHTMLisms\r\n\r\nThe tab option in HTML will insert 4 non breaking spaces rather than a tab, as there\'s no legitimate way of achieving the same effect as a traditional tab character without resorting to stupid HTML indent tricks. Spaces for paragraph leads equate to non breaking spaces in HTML mode too.', '2017-05-12 17:53:01', '2017-05-13', NULL, 'Follow up this guy', '09:00:00', '2017-05-13', 1, 'PAUSED', 'Notes too long'),
(97, 34, 55, 'Testing', '2017-05-13 01:32:02', '2017-05-13', NULL, 'Test Follow Up', '09:00:00', '2017-05-13', 35, 'ACTIVE', ''),
(98, 2, 57, 'Please contact this person as soon as possible', '2017-05-13 02:18:43', '2017-05-15', NULL, '1st follow up', '09:00:00', '2017-05-14', 2, 'ACTIVE', '');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_follow_up_history`
--

CREATE TABLE `visitor_follow_up_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `visitor_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8_bin NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `follow_up_date` date NOT NULL,
  `update_follow_up_id` int(11) DEFAULT NULL,
  `subject` varchar(256) COLLATE utf8_bin NOT NULL,
  `follow_up_time` time NOT NULL,
  `notify_appoint_to_by_date` date NOT NULL,
  `appoint_to` int(11) NOT NULL,
  `follow_up_status` enum('ACTIVE','PAUSED') COLLATE utf8_bin NOT NULL DEFAULT 'ACTIVE',
  `log_id` int(11) NOT NULL,
  `changes` varchar(128) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `visitor_follow_up_history`
--

INSERT INTO `visitor_follow_up_history` (`id`, `user_id`, `visitor_id`, `description`, `timestamp`, `follow_up_date`, `update_follow_up_id`, `subject`, `follow_up_time`, `notify_appoint_to_by_date`, `appoint_to`, `follow_up_status`, `log_id`, `changes`) VALUES
(93, 2, 55, 'Please contact Chong on this date to see when will he be coming', '2017-05-11 01:26:46', '2017-05-12', NULL, '1st follow up', '14:00:00', '2017-05-11', 2, 'ACTIVE', 280, '["follow_up_date"]'),
(93, 2, 55, 'Please contact Chong on this date to see when will he be coming', '2017-05-11 01:26:46', '2017-05-13', NULL, '1st follow up', '14:00:00', '2017-05-11', 2, 'ACTIVE', 296, '["follow_up_time"]');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_follow_up_notes`
--

CREATE TABLE `visitor_follow_up_notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notes` longtext COLLATE utf8_bin NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `follow_up_id` int(11) NOT NULL,
  `feedback_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `visitor_follow_up_notes`
--

INSERT INTO `visitor_follow_up_notes` (`id`, `user_id`, `notes`, `created_on`, `follow_up_id`, `feedback_status`) VALUES
(18, 2, 'I have contacted this person and he was a little interested. Will provide more information on another follow up', '2017-05-11 01:33:20', 93, 1),
(19, 2, 'This person said he will be coming this week along with his family', '2017-05-11 01:33:25', 93, 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_history`
--

CREATE TABLE `visitor_history` (
  `visitor_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `address` varchar(256) CHARACTER SET utf8 NOT NULL,
  `post_code` varchar(256) CHARACTER SET utf8 NOT NULL,
  `nationality` varchar(256) CHARACTER SET utf8 NOT NULL,
  `contact` varchar(256) CHARACTER SET utf8 NOT NULL,
  `email` varchar(256) CHARACTER SET utf8 NOT NULL,
  `age_group` varchar(256) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(256) CHARACTER SET utf8 NOT NULL,
  `marital_status` varchar(256) CHARACTER SET utf8 NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `first_time` tinyint(1) NOT NULL,
  `christian` tinyint(1) NOT NULL DEFAULT '0',
  `church` varchar(256) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `invited_by` varchar(256) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `prayer_for` varchar(256) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `notes` longtext COLLATE utf8_bin NOT NULL,
  `thumbnail` varchar(128) COLLATE utf8_bin NOT NULL,
  `not_welcomed` tinyint(4) NOT NULL DEFAULT '0',
  `reason_not_welcomed` longtext COLLATE utf8_bin NOT NULL,
  `visit_date` date NOT NULL,
  `added_date` date NOT NULL,
  `log_id` int(11) NOT NULL,
  `changes` longtext COLLATE utf8_bin NOT NULL,
  `id` int(11) NOT NULL,
  `feedback_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `visitor_history`
--

INSERT INTO `visitor_history` (`visitor_id`, `created_by`, `assigned_to`, `name`, `address`, `post_code`, `nationality`, `contact`, `email`, `age_group`, `gender`, `marital_status`, `created_date`, `first_time`, `christian`, `church`, `invited_by`, `prayer_for`, `deleted`, `notes`, `thumbnail`, `not_welcomed`, `reason_not_welcomed`, `visit_date`, `added_date`, `log_id`, `changes`, `id`, `feedback_status`) VALUES
(55, 2, 2, 'chong yew yang ', '2, Lorong 3,\r\nJalan Sri Pelangi 1, Taman Pelangi', 'Johor', 'Malaysia', '+60167780275', 'cyyang94@hotmail.com', '2', 'Male', 'Single', '2017-05-11 01:26:46', 1, 0, '', 'jason', '', 0, '', '/images/Profile/11421617_10152926085907997_1330952461_n_(1)_copy.jpg', 0, '', '2017-04-30', '2017-05-11', 281, '["name","contact","first_time","Removed Would like to know more about being a Christian","Removed Would like to be baptized in the Holy Spirit"]', 17, 1),
(55, 2, 2, 'Chong Yew Yang', '2, Lorong 3,\r\nJalan Sri Pelangi 1, Taman Pelangi', 'Johor', 'Malaysia', '+6016778027511', 'cyyang94@hotmail.com', '2', 'Male', 'Single', '2017-05-11 01:26:46', 0, 0, '', 'jason', '', 0, '', '/images/Profile/11421617_10152926085907997_1330952461_n_(1)_copy.jpg', 0, '', '2017-04-30', '2017-05-11', 284, '["feedback_status","Removed Worship Ministry","Removed Children Ministry","Removed Would like a visit","Removed Would like to know more about being a Christian","Removed Would like to be baptized in the Holy Spirit"]', 18, 1),
(55, 2, 2, 'Chong Yew Yang', '2, Lorong 3,\r\nJalan Sri Pelangi 1, Taman Pelangi', 'Johor', 'Malaysia', '+6016778027511', 'cyyang94@hotmail.com', '2', 'Male', 'Single', '2017-05-11 01:26:46', 0, 0, '', 'jason', '', 0, '', '/images/Profile/11421617_10152926085907997_1330952461_n_(1)_copy.jpg', 0, '', '2017-04-30', '2017-05-11', 291, '["created_by","assigned_to","Removed Would like a visit","Removed Would like to know more about being a Christian","Removed Would like to be baptized in the Holy Spirit"]', 19, 2),
(56, 34, 34, 'Jason Khaw', 'Pearl Suria', '58200', 'Malaysian', '0163777267', 'jasonkhaw@usa.com', '4', 'Male', 'Single', '2017-05-11 13:00:18', 0, 0, '', '', '', 0, '', '/images/default_avatar.jpg', 0, '', '2017-05-11', '2017-05-11', 300, '["feedback_status"]', 20, 1),
(55, 34, 34, 'Chong Yew Yang', '2, Lorong 3,\r\nJalan Sri Pelangi 1, Taman Pelangi', 'Johor', 'Malaysia', '+6016778027511', 'cyyang94@hotmail.com', '2', 'Male', 'Single', '2017-05-11 01:26:46', 0, 0, '', 'jason', '', 0, '', '/images/Profile/11421617_10152926085907997_1330952461_n_(1)_copy.jpg', 0, '', '2017-04-30', '2017-05-11', 302, '["feedback_status"]', 21, 2),
(55, 34, 34, 'Chong Yew Yang', '2, Lorong 3,\r\nJalan Sri Pelangi 1, Taman Pelangi', 'Johor', 'Malaysia', '+6016778027511', 'cyyang94@hotmail.com', '2', 'Male', 'Single', '2017-05-11 01:26:46', 0, 0, '', 'jason', '', 0, '', '/images/Profile/11421617_10152926085907997_1330952461_n_(1)_copy.jpg', 0, '', '2017-04-30', '2017-05-11', 309, '["feedback_status"]', 22, 1),
(55, 34, 34, 'Chong Yew Yang', '2, Lorong 3,\r\nJalan Sri Pelangi 1, Taman Pelangi', 'Johor', 'Malaysia', '+6016778027511', 'cyyang94@hotmail.com', '2', 'Male', 'Single', '2017-05-11 01:26:46', 0, 0, '', 'jason', '', 0, '', '/images/Profile/11421617_10152926085907997_1330952461_n_(1)_copy.jpg', 0, '', '2017-04-30', '2017-05-11', 317, '["feedback_status","Removed Worship Ministry","Removed Children Ministry","Removed Would like a visit","Removed Would like to know more about being a Christian"]', 23, 2),
(55, 34, 34, 'Chong Yew Yang', '2, Lorong 3,\r\nJalan Sri Pelangi 1, Taman Pelangi', 'Johor', 'Malaysia', '+6016778027511', 'cyyang94@hotmail.com', '2', 'Male', 'Single', '2017-05-11 01:26:46', 0, 0, '', 'jason', '', 0, '', '/images/Profile/11421617_10152926085907997_1330952461_n_(1)_copy.jpg', 0, '', '2017-04-30', '2017-05-11', 318, '["feedback_status","Removed Worship Ministry","Removed Children Ministry","Removed Would like a visit","Removed Would like to know more about being a Christian"]', 24, 1),
(55, 34, 34, 'Chong Yew Yang', '2, Lorong 3,\r\nJalan Sri Pelangi 1, Taman Pelangi', 'Johor', 'Malaysia', '+6016778027511', 'cyyang94@hotmail.com', '2', 'Male', 'Single', '2017-05-11 01:26:46', 0, 0, '', 'jason', '', 0, '', '/images/Profile/11421617_10152926085907997_1330952461_n_(1)_copy.jpg', 0, '', '2017-04-30', '2017-05-11', 325, '["feedback_status"]', 25, 2);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_selection_on_card`
--

CREATE TABLE `visitor_selection_on_card` (
  `id` int(11) NOT NULL,
  `visitor_id` int(11) NOT NULL,
  `selection_on_card_id` int(11) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `visitor_selection_on_card`
--

INSERT INTO `visitor_selection_on_card` (`id`, `visitor_id`, `selection_on_card_id`, `deleted`) VALUES
(233, 55, 1, 0),
(234, 55, 3, 0),
(235, 55, 8, 0),
(236, 55, 9, 0),
(237, 56, 5, 0),
(238, 57, 1, 0),
(239, 57, 10, 0),
(240, 57, 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_selection_on_card_history`
--

CREATE TABLE `visitor_selection_on_card_history` (
  `id` int(11) NOT NULL,
  `visitor_id` int(11) NOT NULL,
  `selection_on_card_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `history_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `visitor_selection_on_card_history`
--

INSERT INTO `visitor_selection_on_card_history` (`id`, `visitor_id`, `selection_on_card_id`, `log_id`, `deleted`, `history_id`) VALUES
(224, 55, 1, 281, 0, 37),
(225, 55, 3, 281, 0, 38),
(226, 55, 9, 281, 0, 39),
(227, 55, 10, 281, 0, 40),
(228, 55, 1, 284, 0, 41),
(229, 55, 3, 284, 0, 42),
(230, 55, 8, 284, 0, 43),
(231, 55, 9, 284, 0, 44),
(232, 55, 10, 284, 0, 45),
(228, 55, 1, 291, 0, 46),
(229, 55, 3, 291, 0, 47),
(230, 55, 8, 291, 0, 48),
(231, 55, 9, 291, 0, 49),
(232, 55, 10, 291, 0, 50),
(237, 56, 5, 300, 0, 51),
(233, 55, 1, 302, 0, 52),
(234, 55, 3, 302, 0, 53),
(235, 55, 8, 302, 0, 54),
(236, 55, 9, 302, 0, 55),
(233, 55, 1, 309, 0, 56),
(234, 55, 3, 309, 0, 57),
(235, 55, 8, 309, 0, 58),
(236, 55, 9, 309, 0, 59),
(233, 55, 1, 317, 0, 60),
(234, 55, 3, 317, 0, 61),
(235, 55, 8, 317, 0, 62),
(236, 55, 9, 317, 0, 63),
(233, 55, 1, 318, 0, 64),
(234, 55, 3, 318, 0, 65),
(235, 55, 8, 318, 0, 66),
(236, 55, 9, 318, 0, 67),
(233, 55, 1, 325, 0, 68),
(234, 55, 3, 325, 0, 69),
(235, 55, 8, 325, 0, 70),
(236, 55, 9, 325, 0, 71);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `age_group`
--
ALTER TABLE `age_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_status`
--
ALTER TABLE `feedback_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `log_action_id` (`log_action_id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `log_id` (`log_id`);

--
-- Indexes for table `log_action`
--
ALTER TABLE `log_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_period`
--
ALTER TABLE `report_period`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `selection_on_card`
--
ALTER TABLE `selection_on_card`
  ADD PRIMARY KEY (`selection_on_card_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `user_history`
--
ALTER TABLE `user_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `log_id` (`log_id`),
  ADD KEY `create_by` (`created_by`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`visitor_id`),
  ADD KEY `user_id` (`created_by`),
  ADD KEY `assigned_to` (`assigned_to`);

--
-- Indexes for table `visitor_feedback`
--
ALTER TABLE `visitor_feedback`
  ADD PRIMARY KEY (`visitor_feedback_id`),
  ADD KEY `visitor_id` (`visitor_id`);

--
-- Indexes for table `visitor_follow_up`
--
ALTER TABLE `visitor_follow_up`
  ADD PRIMARY KEY (`id`),
  ADD KEY `update_follow_up_id` (`update_follow_up_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `visitor_id` (`visitor_id`);

--
-- Indexes for table `visitor_follow_up_history`
--
ALTER TABLE `visitor_follow_up_history`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `update_follow_up_id` (`update_follow_up_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `visitor_id` (`visitor_id`);

--
-- Indexes for table `visitor_follow_up_notes`
--
ALTER TABLE `visitor_follow_up_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `follow_up_id` (`follow_up_id`);

--
-- Indexes for table `visitor_history`
--
ALTER TABLE `visitor_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`created_by`),
  ADD KEY `assigned_to` (`assigned_to`);

--
-- Indexes for table `visitor_selection_on_card`
--
ALTER TABLE `visitor_selection_on_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitor_id` (`visitor_id`),
  ADD KEY `selection_on_card_id` (`selection_on_card_id`);

--
-- Indexes for table `visitor_selection_on_card_history`
--
ALTER TABLE `visitor_selection_on_card_history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `visitor_id` (`visitor_id`),
  ADD KEY `selection_on_card_id` (`selection_on_card_id`),
  ADD KEY `log_id` (`log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `age_group`
--
ALTER TABLE `age_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `feedback_status`
--
ALTER TABLE `feedback_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;
--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `log_action`
--
ALTER TABLE `log_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `report_period`
--
ALTER TABLE `report_period`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `selection_on_card`
--
ALTER TABLE `selection_on_card`
  MODIFY `selection_on_card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `visitor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `visitor_feedback`
--
ALTER TABLE `visitor_feedback`
  MODIFY `visitor_feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `visitor_follow_up`
--
ALTER TABLE `visitor_follow_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `visitor_follow_up_notes`
--
ALTER TABLE `visitor_follow_up_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `visitor_history`
--
ALTER TABLE `visitor_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `visitor_selection_on_card`
--
ALTER TABLE `visitor_selection_on_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;
--
-- AUTO_INCREMENT for table `visitor_selection_on_card_history`
--
ALTER TABLE `visitor_selection_on_card_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `log_ibfk_2` FOREIGN KEY (`log_action_id`) REFERENCES `log_action` (`id`);

--
-- Constraints for table `login_history`
--
ALTER TABLE `login_history`
  ADD CONSTRAINT `login_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `log` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `login_history_ibfk_2` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_history`
--
ALTER TABLE `user_history`
  ADD CONSTRAINT `user_history_ibfk_1` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_history_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visitor_feedback`
--
ALTER TABLE `visitor_feedback`
  ADD CONSTRAINT `visitor_feedback_ibfk_1` FOREIGN KEY (`visitor_id`) REFERENCES `visitor` (`visitor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visitor_follow_up`
--
ALTER TABLE `visitor_follow_up`
  ADD CONSTRAINT `visitor_follow_up_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `log` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visitor_follow_up_ibfk_2` FOREIGN KEY (`visitor_id`) REFERENCES `visitor` (`visitor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visitor_follow_up_notes`
--
ALTER TABLE `visitor_follow_up_notes`
  ADD CONSTRAINT `visitor_follow_up_notes_ibfk_1` FOREIGN KEY (`follow_up_id`) REFERENCES `visitor_follow_up` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visitor_selection_on_card`
--
ALTER TABLE `visitor_selection_on_card`
  ADD CONSTRAINT `visitor_selection_on_card_ibfk_1` FOREIGN KEY (`visitor_id`) REFERENCES `visitor` (`visitor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visitor_selection_on_card_ibfk_2` FOREIGN KEY (`selection_on_card_id`) REFERENCES `selection_on_card` (`selection_on_card_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visitor_selection_on_card_history`
--
ALTER TABLE `visitor_selection_on_card_history`
  ADD CONSTRAINT `visitor_selection_on_card_history_ibfk_1` FOREIGN KEY (`visitor_id`) REFERENCES `visitor` (`visitor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visitor_selection_on_card_history_ibfk_2` FOREIGN KEY (`selection_on_card_id`) REFERENCES `selection_on_card` (`selection_on_card_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visitor_selection_on_card_history_ibfk_3` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
