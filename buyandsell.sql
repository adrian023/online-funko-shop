-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2020 at 11:58 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buyandsell`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `id` int(11) NOT NULL,
  `adminname` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`id`, `adminname`, `password`) VALUES
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `category` varchar(50) NOT NULL,
  `ReleaseYear` int(4) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` double(9,2) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `ReleaseYear`, `description`, `price`, `image`) VALUES
(1, 'Deku', 'MY HERO ACADEMIA', 2019, 'This pop is the first MHA pop to be ever released. It is exclusively released in the Philippines and Canada on January 2019.', 500.00, 'product-images/MHA-deku1.jpg'),
(2, 'Aizawa (hero costume)', 'MY HERO ACADEMIA', 2019, 'This pop is included to the second batch of MHA pop ever released.', 505.00, 'product-images/MHA-aizawa1.jpg'),
(3, 'Ochako', 'MY HERO ACADEMIA', 2019, 'Exclusively for sale only in this shop.', 490.00, 'product-images/MHA-uraraka1.jpg'),
(4, 'All Might (Hero Costume)', 'MY HERO ACADEMIA', 2020, 'The best selling MHA pop', 700.00, 'product-images/MHA-allmight1.jpg'),
(5, 'Bakugo', 'MY HERO ACADEMIA', 2020, 'Exclusively for sale only in this shop.', 530.00, 'product-images/MHA-bakugo1.jpg'),
(6, 'Kirishima', 'MY HERO ACADEMIA', 2019, 'This pop belongs to the second batch of MHA pops ever released.', 639.00, 'product-images/MHA-kirishima1.jpg'),
(7, 'Tokoyami', 'MY HERO ACADEMIA', 2020, 'This has been changed.', 750.00, 'product-images/MHA-tokoyami1.jpg'),
(8, 'Boruto Uzumaki', 'BORUTO', 2020, 'The best selling Boruto pop', 540.00, 'product-images/BORUTO-Boruto1.jpg'),
(9, 'Goku', 'DRAGON BALL', 2020, 'The most famous and best selling DBZ Funko', 459.00, 'product-images/DBZ-goku1.jpg'),
(10, 'She Hulk', 'MARVEL', 2020, 'No Description', 550.00, 'product-images/MCU-Shehulk.jpg'),
(11, 'Deadpool', 'MARVEL', 2019, 'Best Selling MCU pop of 2019', 700.00, 'product-images/MCU-Deadpool.jpg'),
(12, 'Doctor Strange', 'MARVEL', 2020, 'Co-designed by the company with the rights to Doctor Strange.', 780.00, 'product-images/MCU-Strange.jpg'),
(13, 'She Hulk', 'MARVEL', 2020, 'First MARVEL pop released in 2020', 605.00, 'product-images/MCU-Shehulk.jpg'),
(14, 'Whis', 'DRAGON BALL', 2019, 'No Description', 500.00, 'product-images/DBZ-Whis.jpg'),
(15, 'Majin Buu', 'DRAGON BALL', 2020, 'No Description', 506.00, 'product-images/DBZ-Majin_Buu1.jpg'),
(16, 'Spongebob Rainbow', 'SPONGEBOB SQUAREPANTS', 2019, 'No Description', 565.00, 'product-images/SB-SPONGEBOBRAINBOW.jpg'),
(17, 'Squidward Bellerina', 'SPONGEBOB SQUAREPANTS', 2019, 'No Description', 565.00, 'product-images/SB-SQUIDWARD1.jpg'),
(18, 'Genos', 'ONE PUNCH MAN', 2019, 'No Description', 600.00, 'product-images/OPM-Genos.jpg'),
(19, 'Saitama', 'ONE PUNCH MAN', 2019, 'First One Punch Man pop', 700.00, 'product-images/OPM-SAITAMA.jpg'),
(20, 'Dr. Octopus', 'MARVEL', 2020, 'No Description', 506.00, 'product-images/MCU-DrOcto.jpg'),
(21, 'Falcon', 'MARVEL', 2020, 'Exclusive pop sold in this store.', 800.00, 'product-images/MCU-Falcon.jpg'),
(22, 'Mitsuki', 'BORUTO', 2020, 'No Description', 504.00, 'product-images/BORUTO-Mitsuki.jpg'),
(23, 'Kurama 6-Inch', 'NARUTO', 2019, 'Exclusively sold in this shop.', 790.00, 'product-images/NARUTO-Kurama1.jpg'),
(24, 'Tobi', 'NARUTO', 2020, 'No Description', 580.00, 'product-images/NARUTO-Tobi.jpg'),
(25, 'Sakura', 'NARUTO', 2020, 'No Description', 560.00, 'product-images/NARUTO-Sakura.jpg'),
(26, 'Kakashi', 'NARUTO', 2019, 'No Description', 560.00, 'product-images/NARUTO-Kakashi.jpg'),
(27, 'Sasuke', 'NARUTO', 2019, 'No Description', 504.00, 'product-images/NARUTO-Sasuke.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `ID` int(10) UNSIGNED NOT NULL,
  `amount` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `info` varchar(200) NOT NULL,
  `dateofpurchase` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`ID`, `amount`, `userid`, `info`, `dateofpurchase`) VALUES
(1, 90, 6, 'Cash on Delivery (345678iouyt)', '2020-02-27 13:20:24'),
(2, 50, 6, 'Cash on Delivery (asfghji86543)', '2020-02-28 13:00:22'),
(3, 75, 6, 'Cash on Delivery (r6tyuiojkljg)', '2020-02-28 13:08:41'),
(4, 204, 6, 'Cash on Delivery (eghi)', '2020-02-28 13:09:46'),
(5, 490, 3, 'Cash on Delivery (zyvhl)', '2020-02-28 21:19:47'),
(6, 639, 3, 'Credit Card (123435)', '2020-02-28 21:20:54');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `ID` int(10) UNSIGNED NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `cart` varchar(1000) NOT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`ID`, `FullName`, `EmailId`, `Password`, `ContactNo`, `cart`, `RegDate`) VALUES
(1, 'AK', 'anuj@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '8285703354', '', '2017-06-17 20:00:49'),
(2, 'php', 'php@gmail.com', '202cb962ac59075b964b07152d234b70', '9015501898', '', '2017-07-05 11:06:55'),
(3, 'Adrian Z. Fabonan', 'fabonanadr@gmail.com', 'f4e85b6e6f4d0a6cf22dc4aabcd42ee6', '0905181927', 'a:2:{s:4:\"Deku\";a:5:{s:4:\"name\";s:4:\"Deku\";s:2:\"id\";s:1:\"1\";s:5:\"price\";s:5:\"20.00\";s:8:\"quantity\";i:1;s:5:\"image\";s:28:\"product-images/MHA-deku1.jpg\";}s:21:\"Aizawa (hero costume)\";a:5:{s:4:\"name\";s:21:\"Aizawa (hero costume)\";s:2:\"id\";s:1:\"2\";s:5:\"price\";s:5:\"50.00\";s:8:\"quantity\";i:1;s:5:\"image\";s:30:\"product-images/MHA-aizawa1.jpg\";}}', '2020-01-17 21:30:15'),
(4, 'Sarry Manok', 'helloworld@gmail.com', '8c4205ec33d8f6caeaaaa0c10a14138c', '23423423', '', '2020-01-24 22:25:23'),
(5, 'Sarry Manok', 'asdf@gmail.com', 'f4e85b6e6f4d0a6cf22dc4aabcd42ee6', '23232323232', '', '2020-01-28 11:22:50'),
(6, 'Maria Juana', 'zxcv@yahoo.com', '21232f297a57a5a743894a0e4a801fc3', '01231263512', '', '2020-01-30 13:13:55'),
(7, 'Adrian Z. Fabonan', 'fabonanadr@gmail.co', '8c4205ec33d8f6caeaaaa0c10a14138c', '12345678909', '', '2020-02-07 21:02:20'),
(8, 'Elaine Suganob', 'eosuganob@gmail.com', '7b6ba124358cb1040122bda018feae8b', '09465958890', '', '2020-02-11 05:51:06'),
(9, 'Isaac Billones ', 'isaacnewton@yahoo.com', 'e807f1fcf82d132f9bb018ca6738a19f', '12345678909', '', '2020-02-28 01:28:04'),
(10, 'asfa', 'qwertty@gmail.com', '8c4205ec33d8f6caeaaaa0c10a14138c', '12345678990', '', '2020-02-28 01:41:07'),
(11, 'asfa', 'qwertty@gmail.co', '8c4205ec33d8f6caeaaaa0c10a14138c', '12345678990', '', '2020-02-28 01:41:51'),
(12, 'kim crisologo', 'kim@gmail.com', 'fb1eaf2bd9f2a7013602be235c305e7a', '12345678901', '', '2020-02-28 02:20:58'),
(13, 'Suganob', 'elaine@yahoo.com', '903ce9225fca3e988c2af215d4e544d3', '12345678902', '', '2020-02-28 02:40:08'),
(14, 'Fabs', 'fab@gmail.com', '8c4205ec33d8f6caeaaaa0c10a14138c', '12345678901', '', '2020-02-28 12:11:42'),
(15, 'Adrian Z. Fabonan', 'helloworld@gmail.co', '912ec803b2ce49e4a541068d495ab570', '09051819270', '', '2020-02-28 13:23:56'),
(16, 'Adrian Z. Fabonan', 'helloworld@gmail.co', '912ec803b2ce49e4a541068d495ab570', '09051819270', '', '2020-02-28 13:25:27'),
(17, 'Patrick Sudaria', 'system@gmail.com', '8c4205ec33d8f6caeaaaa0c10a14138c', '12345678909', '', '2020-02-28 13:26:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
