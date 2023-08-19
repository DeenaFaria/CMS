-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 08:31 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conference`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(10) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `detail`) VALUES
(4, '<p><span style=\"font-size: 14pt;\">This is about cyber security and information security.</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `accpaper`
--

CREATE TABLE `accpaper` (
  `auto` int(10) NOT NULL,
  `slno` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accpaper`
--

INSERT INTO `accpaper` (`auto`, `slno`, `pid`, `title`, `id`) VALUES
(5, 1, 108, 'Detection of Objects from Noisy Images', 1),
(6, 3, 223, 'Reconstruction of Compressed Sensing MRI', 2),
(7, 2, 122, 'Hand Gesture Recognition', 1);

-- --------------------------------------------------------

--
-- Table structure for table `addreview`
--

CREATE TABLE `addreview` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `paperno` int(10) NOT NULL,
  `novelty` varchar(255) NOT NULL,
  `pres` varchar(255) NOT NULL,
  `res` varchar(255) NOT NULL,
  `eval` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `conf` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `reviewfile` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `datetime` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addreview`
--

INSERT INTO `addreview` (`id`, `name`, `paperno`, `novelty`, `pres`, `res`, `eval`, `review`, `conf`, `remark`, `reviewfile`, `size`, `datetime`) VALUES
(1, 'Deena Faria', 1, '3: fair', '2: poor', '2: poor', '0: borderline paper', 'In this paper, the author recommend a blockchain framework that secures the online examination system. The proposed framework has been used to secure a data management system that will connect to existing educational data.', '4: (high)', 'This paper is a borderline paper, I think. It should be broadly revised before acceptance.', '8Control-and-DSP-lab_.pdf', '3859139', '2021-12-24 04:47:28.000000'),
(2, 'Dipankar Das', 1, '4: good', '3: fair', '3: fair', '2: accept', 'In this paper, the author recommend a blockchain framework that secures the online examination system. The proposed framework has been used to secure a data management system that will connect to existing educational data.', '4: (high)', 'I think, this paper should be accepted.', 'dsp_lab__EEC-652__VISem_18012013(1).pdf', '391847', '2022-01-03 02:52:20.000000');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(10) NOT NULL,
  `fname1` varchar(255) NOT NULL,
  `lname1` varchar(255) NOT NULL,
  `email1` varchar(255) NOT NULL,
  `org1` varchar(255) NOT NULL,
  `corr1` varchar(255) NOT NULL,
  `fname2` varchar(255) NOT NULL,
  `lname2` varchar(255) NOT NULL,
  `email2` varchar(255) NOT NULL,
  `org2` varchar(255) NOT NULL,
  `corr2` varchar(255) NOT NULL,
  `fname3` varchar(255) NOT NULL,
  `lname3` varchar(255) NOT NULL,
  `email3` varchar(255) NOT NULL,
  `org3` varchar(255) NOT NULL,
  `corr3` varchar(255) NOT NULL,
  `fname4` varchar(255) NOT NULL,
  `lname4` varchar(255) NOT NULL,
  `email4` varchar(255) NOT NULL,
  `org4` varchar(255) NOT NULL,
  `corr4` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `abstract` text NOT NULL,
  `keywords` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `datetime` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `fname1`, `lname1`, `email1`, `org1`, `corr1`, `fname2`, `lname2`, `email2`, `org2`, `corr2`, `fname3`, `lname3`, `email3`, `org3`, `corr3`, `fname4`, `lname4`, `email4`, `org4`, `corr4`, `title`, `abstract`, `keywords`, `file`, `datetime`) VALUES
(1, 'Deena', 'Faria', 'deenafaria@gmail.com', 'JKKNIU', 'yes', 'Mahmuda', 'Akhter', 'mahmudaakhter483@gmail.com', 'JKKNIU', '', '', '', '', '', '', '', '', '', '', '', 'Artificial intelligence based cyber security', 'Cyber security and artificial intelligence (AI) are two emerging technologies in the modern day world. Machine learning(ML) models are the building block of AI. Access control, user authentication and behavior analysis, spam, malware, and botnet detection everywhere AI plays a prudent role.', 'Artificial Intelligence (AI),cyber security, Machine Learning (ML)', 'Paper.pdf', '2021-12-03 09:35:04.000000'),
(2, 'Deena', 'Faria', 'deenafaria@gmail.com', 'JKKNIU', 'yes', 'Mahmuda', 'Akhter', 'mahmuda483@gmail.com', 'JKKNIU', '', '', '', '', '', '', '', '', '', '', '', 'Advancing and teaching cybersecurity skills for policing', 'The digital society poses different types of challenges to the police force.', 'cybersecurity, police', 'VLSI_Report(17102005).pdf', '2021-12-09 04:03:49.000000'),
(3, 'Mahfuja', 'Yeasmin', 'sumaiyasumu.cse@gmail.com', 'JKKNIU', 'yes', 'Zannatul', 'Ferdaush', 'Zannatul@gmail.com', 'JKKNIU', '', '', '', '', '', '', '', '', '', '', '', 'Gamified Virtual Training Environment for Attacker-centric Cyber-security Skills Development', 'The findings of the latest cyber security status report by ISACA indicates the shortage of cyber-security professionals is universal and ongoing. A further study conducted by the Ministry of Universities and Science has identified a skills gap that exists amongst the fresh cyber-security graduates, who often do not possess the ability to apply their skills to real word scenarios as employees demand.', 'Cyber security, Virtual training', 'VLSI_ASSIGNMENT(Roll_17102005).pdf', '2022-01-04 05:49:51.000000');

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `id` int(10) NOT NULL,
  `con` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`id`, `con`, `name`, `desi`) VALUES
(2, 'Patron', 'Dr. AHM Mustafizur Rahman', 'VC, JKKNIU'),
(3, 'Chief Patron', 'Mohammed Abdullah Al-Mamun', 'Chairman, BoT, JKKNIU'),
(4, 'General Chair', 'Mst. Jannatul Ferdous', 'Professor, Dept. of CSE, JKKNIU');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `contact`) VALUES
(1, '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style=\"text-decoration: underline;\">Address&nbsp;</span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style=\"text-decoration: underline;\">Mobile</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style=\"text-decoration: underline;\">Email</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Jatiya Kabi Kazi Nazrul Islam,&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; +8801784563350&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; deenafaria@gmail.com&nbsp;</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Trishal, Mymensingh&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; +8801850941116&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;mahmodaakter44@gmail.com&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `deadline`
--

CREATE TABLE `deadline` (
  `id` int(10) NOT NULL,
  `paperno` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deadline`
--

INSERT INTO `deadline` (`id`, `paperno`, `date`, `time`) VALUES
(1, 1, '2022-01-05', '23:59:00.000000'),
(2, 2, '2022-01-06', '23:59:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(10) NOT NULL,
  `day` int(10) NOT NULL,
  `event` varchar(255) NOT NULL,
  `start` time(6) NOT NULL,
  `end` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `day`, `event`, `start`, `end`) VALUES
(3, 1, 'Inaugural Session', '09:30:00.000000', '10:30:00.000000'),
(8, 1, 'Keynote 02: Vincent Wong, IEEE Fellow, University of British Columbia', '11:45:00.000000', '12:30:00.000000'),
(17, 1, 'Break', '11:30:00.000000', '11:45:00.000000'),
(18, 1, 'Keynote 01: Claudio A. Canizares, IEEE Fellow, University of Waterloo', '10:30:00.000000', '11:30:00.000000'),
(19, 2, 'Conference Highlights and Greeting Exchanges.', '09:00:00.000000', '10:00:00.000000'),
(20, 0, 'Presentation-2', '10:00:00.000000', '11:00:00.000000'),
(21, 0, 'Presentation-2', '10:00:00.000000', '11:00:00.000000'),
(22, 2, 'Keynote 3: M. Tariqul Islam, Universiti Kebangsaan Malaysia.', '10:00:00.000000', '11:00:00.000000'),
(24, 2, 'Break', '11:00:00.000000', '11:15:00.000000'),
(25, 2, 'Keynote 05: Sushmita Mitra, IEEE Fellow, Indian Statistical Institute', '11:15:00.000000', '12:00:00.000000'),
(26, 1, 'Parallel Technical Sessions (T1)', '12:30:00.000000', '13:30:00.000000'),
(27, 2, 'Parallel Technical Sessions (T2)', '12:00:00.000000', '13:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `date` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `idnum` varchar(10) NOT NULL,
  `title` text NOT NULL,
  `abs` text NOT NULL,
  `keyword` text NOT NULL,
  `certi` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `downloads` varchar(255) NOT NULL,
  `datetime` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `fname`, `lname`, `date`, `email`, `idnum`, `title`, `abs`, `keyword`, `certi`, `name`, `size`, `downloads`, `datetime`) VALUES
(3, 'Deena', 'Faria', '2021-11-17', 'deenafaria@gmail.com', '17102005', 'Artificial intelligence based cyber security', 'Cyber security and artificial intelligence (AI) are two emerging technologies in the modern day world.', 'Artificial Intelligence (AI),cyber security', 'certified', 'Progress_Report(17102005).docx', '4352080', '8', '2021-11-27 20:00:07.174477'),
(4, 'Mahmuda', 'Akhter', '2021-11-26', 'mahmodaakter44@gmail.com', '17102027', 'IoT based smart and secured mobile charging station in public place', 'IoT based smart mobile charging system is an emerging technologies in the modern day world.', 'IoT,AI', 'certified', 'VLSI_Report(17102005).pdf', '166452', '2', '2021-11-27 19:57:39.841319');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(10) NOT NULL,
  `conference` text NOT NULL,
  `shortname` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `date1` date NOT NULL,
  `date2` date NOT NULL,
  `date3` date NOT NULL,
  `date4` date NOT NULL,
  `date5` date NOT NULL,
  `date6` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `conference`, `shortname`, `date`, `location`, `date1`, `date2`, `date3`, `date4`, `date5`, `date6`) VALUES
(1, 'International Conference on Cyber Security and Information System', 'CSIS-2021', '2022-01-31', 'JKKNIU, Trishal, Mymensingh', '2022-01-23', '2022-01-24', '2022-01-25', '2022-01-26', '2022-01-27', '2022-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `guideline`
--

CREATE TABLE `guideline` (
  `id` int(10) NOT NULL,
  `guide` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guideline`
--

INSERT INTO `guideline` (`id`, `guide`) VALUES
(1, '<ol>\r\n<li>\r\n<p><span style=\"font-family: \'times new roman\', times, serif;\">Prospective authors are invited to submit manuscripts reporting&nbsp; original unpublished research and recent developments in the&nbsp; topics related to the conference. It is required that the manuscript follows the standard IEEE format (IEEE standard&nbsp; double column, 10-point font). Follow that link to download template <a href=\"admin/Conference-template-A4.doc\">Conference-template</a></span></p>\r\n</li>\r\n<li>\r\n<p><span style=\"font-family: \'times new roman\', times, serif;\">Submitted paper should be in PDF format and should be of 4-6 pages.</span></p>\r\n</li>\r\n<li>\r\n<p><span style=\"font-family: \'times new roman\', times, serif;\">Authors are advised to upload full papers using this <a href=\"sp/\">link</a> .</span></p>\r\n</li>\r\n</ol>');

-- --------------------------------------------------------

--
-- Table structure for table `keynote`
--

CREATE TABLE `keynote` (
  `id` int(10) NOT NULL,
  `sessno` int(10) NOT NULL,
  `roomno` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `day` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keynote`
--

INSERT INTO `keynote` (`id`, `sessno`, `roomno`, `topic`, `day`) VALUES
(1, 1, 'Seminar Hall-1', 'Recent Data Mining Techniques', 1),
(2, 3, 'Seminar Hall-2', 'Topic-4', 2);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(10) NOT NULL,
  `file` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `file`, `size`) VALUES
(1, 'logo.png', '6776');

-- --------------------------------------------------------

--
-- Table structure for table `paperfile`
--

CREATE TABLE `paperfile` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `downloads` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paperfile`
--

INSERT INTO `paperfile` (`id`, `name`, `size`, `downloads`) VALUES
(4, 'paper.png', '205817', '3');

-- --------------------------------------------------------

--
-- Table structure for table `paper_status`
--

CREATE TABLE `paper_status` (
  `id` int(10) NOT NULL,
  `paperno` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper_status`
--

INSERT INTO `paper_status` (`id`, `paperno`, `title`, `status`, `comment`) VALUES
(1, 1, 'Artificial intelligence based cyber security', 'accepted', 'Paper accepted');

-- --------------------------------------------------------

--
-- Table structure for table `pcregister`
--

CREATE TABLE `pcregister` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pcregister`
--

INSERT INTO `pcregister` (`id`, `name`, `email`, `password`) VALUES
(1, 'A. B. M. Alim Al Islam', 'aa@gmail.com', '7ba917e4e5158c8a9ed6eda08a6ec572');

-- --------------------------------------------------------

--
-- Table structure for table `pub`
--

CREATE TABLE `pub` (
  `id` int(10) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pub`
--

INSERT INTO `pub` (`id`, `text`) VALUES
(1, '<p><span style=\"font-size: 14pt;\">All accepted and registered full papers will be published in the&nbsp;<strong>conference proceedings and submitted to IEEE Xplore Digital Library, and among them, selected extended papers will be submitted to the scopus indexed journals.</strong></span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `address`, `phone`, `username`, `password`) VALUES
(1, 'Deena Faria', 'Muktagacha', 123456789, 'deena', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Mahmuda Akhter', 'Gazipur', 1878123456, 'mahmuda', 'c84258e9c39059a89ab77d846ddab909');

-- --------------------------------------------------------

--
-- Table structure for table `review_req`
--

CREATE TABLE `review_req` (
  `id` int(10) NOT NULL,
  `paperno` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rev_req_stat` varchar(255) NOT NULL,
  `rev_stat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_req`
--

INSERT INTO `review_req` (`id`, `paperno`, `email`, `rev_req_stat`, `rev_stat`) VALUES
(1, 1, 'deenafaria@gmail.com', 'Accepted', 'Reviewed'),
(2, 2, 'deenafaria@gmail.com', '', 'Not reviewed'),
(3, 1, 'dipankar11@gmail.com', 'Accepted', 'Reviewed'),
(4, 2, 'dipankar11@gmail.com', 'Accepted', 'Not reviewed');

-- --------------------------------------------------------

--
-- Table structure for table `speaker`
--

CREATE TABLE `speaker` (
  `id` int(10) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `speaker`
--

INSERT INTO `speaker` (`id`, `topic`, `name`, `designation`) VALUES
(2, 'Recent Data Mining Techniques', 'Claudio A. Canizares', 'IEEE Fellow University of Waterloo, Canada'),
(3, 'Topic-3', 'Vincent Wong', 'IEEE Fellow University of British Columbia, Canada'),
(4, 'Topic-4', 'M. Tariqul Islam', 'Universiti Kebangsaan Malaysia'),
(5, 'Topic-5', 'Sushmita Mitra', 'IEEE Fellow Indian Statistical Institute, Kolkata');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `id` int(10) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`id`, `type`, `name`, `filename`, `size`) VALUES
(1, 'Technical Sponsor', 'IEEE Computer Society', 'IEEE-CS_LogoTM-orange_jpeg.jpg', '38317');

-- --------------------------------------------------------

--
-- Table structure for table `technical`
--

CREATE TABLE `technical` (
  `id` int(10) NOT NULL,
  `tsession` int(10) NOT NULL,
  `psession` int(10) NOT NULL,
  `room` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `day` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technical`
--

INSERT INTO `technical` (`id`, `tsession`, `psession`, `room`, `topic`, `day`) VALUES
(1, 1, 1, 'Seminar Hall-2', 'Computer Vision and Pattern Recognition', 1),
(2, 2, 1, 'Seminar Hall-3', 'Machine Learning Application', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tpc`
--

CREATE TABLE `tpc` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `org` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tpc`
--

INSERT INTO `tpc` (`id`, `name`, `org`, `keywords`, `email`, `phone`) VALUES
(1, 'Deena Faria', 'JKKNIU, Bangladesh', 'Cyber Security', 'deenafaria@gmail.com', '01712344578'),
(2, 'Abu Raihan Mostofa Kamal', 'IUT, Bangladesh', 'Homomorphic Encryption', 'fg@yahoo.com', '01712344578'),
(3, 'Ahmedul Kabir', 'University of Dhaka, Bangladesh', 'Machine Learning', 'xx@gmail.com', '01722346789'),
(4, 'Dipankar Das', 'Rajshahi University, Bangladesh', 'Data Mining', 'dipankar11@gmail.com', '01311234567');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `username`, `password`) VALUES
(1, 'Deena', 'Faria', 'deenafaria@gmail.com', 'deena', 'd781eaae8248db6ce1a7b82e58e60435'),
(2, 'Mahmuda ', 'Akhter', 'mahmodaakter44@gmail.com', 'mahmuda', '078d079e6146dec4dbf2135a8e513e2e'),
(3, 'Mahfuja', 'Yeasmin', 'sumu@gmail.com', 'sumu', '0f8f84c18bfd5244ed976f63924a8a0e'),
(4, 'Dipankar', 'Das', 'dipankar11@gmail.com', 'dipankar', '9ece8c4020f8aed10676cd1c56a41889');

-- --------------------------------------------------------

--
-- Table structure for table `videofiles`
--

CREATE TABLE `videofiles` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videofiles`
--

INSERT INTO `videofiles` (`id`, `name`, `size`) VALUES
(2, 'The Five Laws of Cybersecurity - Nick Espinosa - TEDxFondduLac.mp4', '21112231'),
(5, '10 Second Countdown - After Effects.mp4', '554446');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accpaper`
--
ALTER TABLE `accpaper`
  ADD PRIMARY KEY (`auto`);

--
-- Indexes for table `addreview`
--
ALTER TABLE `addreview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deadline`
--
ALTER TABLE `deadline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guideline`
--
ALTER TABLE `guideline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keynote`
--
ALTER TABLE `keynote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paperfile`
--
ALTER TABLE `paperfile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paper_status`
--
ALTER TABLE `paper_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pcregister`
--
ALTER TABLE `pcregister`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pub`
--
ALTER TABLE `pub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_req`
--
ALTER TABLE `review_req`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speaker`
--
ALTER TABLE `speaker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technical`
--
ALTER TABLE `technical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tpc`
--
ALTER TABLE `tpc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videofiles`
--
ALTER TABLE `videofiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `accpaper`
--
ALTER TABLE `accpaper`
  MODIFY `auto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `addreview`
--
ALTER TABLE `addreview`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `committee`
--
ALTER TABLE `committee`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `deadline`
--
ALTER TABLE `deadline`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `guideline`
--
ALTER TABLE `guideline`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `keynote`
--
ALTER TABLE `keynote`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `paperfile`
--
ALTER TABLE `paperfile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `paper_status`
--
ALTER TABLE `paper_status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pcregister`
--
ALTER TABLE `pcregister`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pub`
--
ALTER TABLE `pub`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `review_req`
--
ALTER TABLE `review_req`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `speaker`
--
ALTER TABLE `speaker`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `technical`
--
ALTER TABLE `technical`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tpc`
--
ALTER TABLE `tpc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
