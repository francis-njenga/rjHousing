-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2023 at 07:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rjhousing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pass` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `admin_phone` varchar(15) NOT NULL,
  `admin_image` varchar(200) NOT NULL,
  `utype` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `date`, `admin_phone`, `admin_image`, `utype`) VALUES
(9, 'admin', 'admin@gmail.com', '4c9dce00f5c0fdc17e0d49ed3643347bcfd55b36', '1994-12-06', '0794349788', '0', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `aid` int(50) NOT NULL,
  `aname` varchar(100) NOT NULL,
  `aemail` varchar(100) NOT NULL,
  `aphone` varchar(20) NOT NULL,
  `apass` varchar(50) NOT NULL,
  `utype` varchar(50) NOT NULL,
  `aimage` varchar(300) NOT NULL,
  `agent_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`aid`, `aname`, `aemail`, `aphone`, `apass`, `utype`, `aimage`, `agent_date`) VALUES
(1, 'Kimotho_', 'kimotho@gmail.com', '0794349788', '84ce5a03cf720d78c38bb8030a2bbb478c9f3ac7', 'agent', 'IMG_20230225_132633.jpg', '2023-02-02'),
(2, 'Wambui', 'wambui@gmail.com', '0743466878', '4c9dce00f5c0fdc17e0d49ed3643347bcfd55b36', 'agent', 'faith.jpg', '2023-02-16'),
(3, 'lucky', 'lucky@gmail.com', '0745493943', '2320ca4d57f7df6a1a026c397d059a784f6b2e94', 'agent', 'lucky.jpg', '2023-01-08'),
(4, 'Njenga_k', 'njenga@gmail.com', '0743466878', '6d0731f888dcb4c45ebea6f2ff8f999cb79b75e0', 'agent', 'IMG_20230225_132644.jpg', '2023-03-31'),
(5, 'Ngatia', 'ngatia@gmail.com', '0794349666', 'b76e097b66d430eb61e415bce46329e5395588cd', 'agent', 'ngatia.jpg', '2023-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `contact_admin`
--

CREATE TABLE `contact_admin` (
  `contact_admin_id` int(15) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Message` varchar(256) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_admin`
--

INSERT INTO `contact_admin` (`contact_admin_id`, `first_name`, `last_name`, `email`, `Message`, `date`) VALUES
(2, 'josphat ', 'kimani ', 'rajeynjenga@gmail.com', 'i love doing all this ', '2023-04-01'),
(3, 'mark ', 'lila', 'mark@gmail.com', 'am unable to create account ', '2023-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `contact_agent`
--

CREATE TABLE `contact_agent` (
  `bookingID` int(50) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `userEmail` varchar(200) NOT NULL,
  `userPhone` varchar(200) NOT NULL,
  `propertyName` varchar(200) NOT NULL,
  `propertyLocation` varchar(200) NOT NULL,
  `visitDate` date NOT NULL,
  `bookingDate` date NOT NULL DEFAULT current_timestamp(),
  `userImage` varchar(200) NOT NULL,
  `message` varchar(250) NOT NULL,
  `agentID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_agent`
--

INSERT INTO `contact_agent` (`bookingID`, `userName`, `userEmail`, `userPhone`, `propertyName`, `propertyLocation`, `visitDate`, `bookingDate`, `userImage`, `message`, `agentID`) VALUES
(1, 'rajey', 'rajey@gmail.com', '0724808316', 'Spacious Family Home', 'Laikipia,Nyahururu ', '2023-04-01', '2023-04-01', 'property 5.1.jpg', '', 0),
(2, 'rajey', 'rajey@gmail.com', '0724808316', 'Spacious Family Home', 'Laikipia,Nyahururu ', '2023-04-01', '2023-04-01', 'property 5.1.jpg', '', 0),
(3, 'rajey', 'rajey@gmail.com', '0724808316', 'latest ', 'Laikipia,Karen ', '2023-04-01', '2023-04-01', 'about-banner-2.jpg', '', 0),
(4, 'rajey', 'rajey@gmail.com', '0724808316', 'Spacious Family Home', 'Laikipia,Nyahururu ', '2023-04-01', '2023-04-01', 'property 5.1.jpg', '', 0),
(5, 'rajey', 'rajey@gmail.com', '0724808316', 'Spacious Family Home', 'Laikipia,Nyahururu ', '2023-04-01', '2023-04-01', 'property 5.1.jpg', '', 0),
(6, 'rajey', 'rajey@gmail.com', '0724808316', 'Oceanfront Paradise', 'Kiambu,Thika ', '2023-04-01', '2023-04-01', 'property 2.1.jpg', '', 0),
(7, 'rajey', 'rajey@gmail.com', '0724808316', 'Oceanfront Paradise', 'Kiambu,Thika ', '2023-04-01', '2023-04-01', 'property 2.1.jpg', 'chelsea football club', 0),
(8, 'rajey', 'rajey@gmail.com', '0724808316', '', '', '0000-00-00', '2023-04-01', '', '', 0),
(9, 'rajey', 'rajey@gmail.com', '0724808316', 'Oceanfront Paradise', 'Kiambu,Thika ', '2023-04-01', '2023-04-01', 'property 2.1.jpg', 'chelsea football club', 0),
(10, 'rajey', 'rajey@gmail.com', '0724808316', 'Spacious Family Home', 'Laikipia,Nyahururu ', '2023-04-01', '2023-04-01', 'property 5.1.jpg', '', 0),
(11, 'rajey', 'rajey@gmail.com', '0724808316', 'Oceanfront Paradise', 'Kiambu,Thika ', '2023-04-01', '2023-04-01', 'property 2.1.jpg', '', 0),
(12, 'rajey', 'rajey@gmail.com', '0724808316', 'Grand Country Estate', 'Nyeri,Nyeri town ', '2023-04-01', '2023-04-01', 'property 4.1.jpg', 'lets try it ', 0),
(13, 'rajey', 'rajey@gmail.com', '0724808316', 'Grand Country Estate', 'Nyeri,Nyeri town ', '2023-04-01', '2023-04-01', 'property 4.1.jpg', '', 0),
(14, 'rajey', 'rajey@gmail.com', '0724808316', 'Grand Country Estate', 'Nyeri,Nyeri town ', '2023-04-01', '2023-04-01', 'property 4.1.jpg', '', 0),
(15, 'rajey', 'rajey@gmail.com', '0724808316', 'Grand Country Estate', 'Nyeri,Nyeri town ', '2023-04-01', '2023-04-01', 'property 4.1.jpg', '', 0),
(16, 'rajey', 'rajey@gmail.com', '0724808316', 'Grand Country Estate', 'Nyeri,Nyeri town ', '2023-04-01', '2023-04-01', 'property 4.1.jpg', 'lets see all about this ', 0),
(17, 'rajey', 'rajey@gmail.com', '0724808316', 'Grand Country Estate', 'Nyeri,Nyeri town ', '2023-04-01', '2023-04-01', 'property 4.1.jpg', 'this one has agent id ', 0),
(18, 'rajey', 'rajey@gmail.com', '0724808316', 'Grand Country Estate', 'Nyeri,Nyeri town ', '2023-04-01', '2023-04-01', 'property 4.1.jpg', 'this one has agent id ', 0),
(19, 'rajey', 'rajey@gmail.com', '0724808316', 'Grand Country Estate', 'Nyeri,Nyeri town ', '2023-04-01', '2023-04-01', 'property 4.1.jpg', 'lets see all about this ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `pid` int(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `propertyType` varchar(100) NOT NULL,
  `submitType` varchar(100) NOT NULL,
  `bathroom` int(50) NOT NULL,
  `bedroom` int(50) NOT NULL,
  `kitchen` int(50) NOT NULL,
  `areaSize` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `location` varchar(200) NOT NULL,
  `county` varchar(100) NOT NULL,
  `constituency` varchar(100) NOT NULL,
  `image` varchar(300) NOT NULL,
  `image1` varchar(300) NOT NULL,
  `aid` int(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `currentStatus` varchar(100) DEFAULT 'available',
  `isFeatured` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`pid`, `title`, `description`, `propertyType`, `submitType`, `bathroom`, `bedroom`, `kitchen`, `areaSize`, `price`, `location`, `county`, `constituency`, `image`, `image1`, `aid`, `date`, `currentStatus`, `isFeatured`) VALUES
(4, 'Spacious Family Home', 'This lovely family home offers plenty of space for everyone, with multiple living areas, a large backyard, and a convenient location near schools, parks, and shopping.', 'building', 'sale', 4, 4, 2, 10000, 5300000, 'Nyahururu town near, Jamaa supermarket.', 'Laikipia', 'Nyahururu', 'property 5.1.jpg', 'property 5.2.jpg', 3, '2023-03-09 22:33:56', NULL, 1),
(5, 'Grand Country Estate', 'Step into a world of luxury with this magnificent country estate, featuring a grand entrance, stunning architectural details, and expansive grounds with manicured gardens and a swimming pool.', 'apartment', 'sale', 3, 3, 1, 23000, 3500000, 'nyeri town 1km from nyeri supermarket', 'Nyeri', 'Nyeri town', 'property 4.1.jpg', 'property 4.2.jpg', 3, '2023-03-09 22:10:54', NULL, 1),
(6, 'Oceanfront Paradise', 'Stunning 2-Bedroom Condo with Breathtaking Views Wake up to the sound of crashing waves in this luxurious oceanfront condo. With two bedrooms and a spacious balcony, you will have plenty of room to relax and take in the stunning scenery.', 'building', 'sale', 2, 2, 1, 25000, 1500000, 'thika town opposite to the thika mall', 'Kiambu', 'Thika', 'property 2.1.jpg', 'property 2.2.jpg', 4, '2023-03-09 22:22:17', NULL, 1),
(7, 'charming historic home', 'Step back in time and experience the charm of this beautifully restored historic home. With three bedrooms, a spacious yard, and easy access to all the best local attractions, you will feel right at home in this vibrant neighborhood.', 'building', 'sale', 3, 3, 1, 33000, 94000, 'near chuka university.', 'Meru', 'Maua', 'property 3.1.jpg', 'property 3.2.jpg', 5, '2023-03-09 21:59:17', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(50) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `uphone` varchar(20) NOT NULL,
  `upass` varchar(50) NOT NULL,
  `utype` varchar(50) NOT NULL,
  `uimage` varchar(300) NOT NULL,
  `user_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `uemail`, `uphone`, `upass`, `utype`, `uimage`, `user_date`) VALUES
(1, 'francis', 'maina@gmail.com', '123456', '635013b806d3a96297f77a78eea174d88ff2c162', 'user', 'IMG_20230219_132328.jpg', '2023-03-20'),
(2, 'rajey', 'rajey@gmail.com', '0724808316', '44684958cbd0a6c4a2e358e07f5d1388b1a35c9c', 'user', 'IMG_20230219_084320.jpg', '2023-03-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `contact_admin`
--
ALTER TABLE `contact_admin`
  ADD PRIMARY KEY (`contact_admin_id`);

--
-- Indexes for table `contact_agent`
--
ALTER TABLE `contact_agent`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `aid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_admin`
--
ALTER TABLE `contact_admin`
  MODIFY `contact_admin_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_agent`
--
ALTER TABLE `contact_agent`
  MODIFY `bookingID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
