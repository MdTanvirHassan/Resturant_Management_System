-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2021 at 11:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_cat`
--

CREATE TABLE `food_cat` (
  `catagory` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_cat`
--

INSERT INTO `food_cat` (`catagory`, `start_time`, `end_time`) VALUES
('Breakfast', '07:00:00', '12:01:00'),
('Lunch', '12:01:00', '19:00:00'),
('Dinner', '19:01:00', '11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `food_item`
--

CREATE TABLE `food_item` (
  `food_id` int(10) UNSIGNED NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `catagory` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image_path` varchar(100) NOT NULL,
  `rating` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_item`
--

INSERT INTO `food_item` (`food_id`, `food_name`, `description`, `catagory`, `price`, `image_path`, `rating`) VALUES
(1, 'Poached egg', 'A poached egg is an egg that has been cooked, outside the shell, by poaching, as opposed to simmering or boiling. This method of preparation can yield more delicately cooked eggs than cooking at higher temperatures such as with boiling water.', 'Breakfast', '15.00', 'uploads/IMG-6188332de51cb3.69612997.jpg', NULL),
(2, 'Cappuccino', 'A cappuccino is an espresso-based coffee drink that originated in Austria with later development taking place in Italy, and is prepared with steamed milk foam. Variations of the drink involve the use of cream instead of milk, using non-dairy milk substitutes and flavoring with cinnamon or chocolate powder.', 'Breakfast', '190.00', 'uploads/IMG-6188f1765b4a07.66499614.jpg', NULL),
(3, 'Fruit Salad', 'Fruit salad is a dish consisting of various kinds of fruit, sometimes served in a liquid, either their own juices or a syrup. In different forms, fruit salad can be served as an appetizer, a side salad, or a dessert.', 'Breakfast', '70.00', 'uploads/IMG-6188d00962ce21.53850761.jpg', NULL),
(6, 'Black Chocolate Pastry', 'Beat the eggs and sugar in a large bowl with a mixer on medium speed until combined. Increase the speed to medium high and beat until light and fluffy, 4 to 5 minutes. Reduce the mixer speed to low and slowly add the coffee-chocolate mixture; beat until combined. Beat in the flour mixture in three batches, alternating with the sour cream mixture in two batches, until just incorporated. ', 'Breakfast', '140.00', 'uploads/IMG-6188f3a9c10778.46920543.jpg', NULL),
(7, 'French Toast', 'French toast is a dish made of sliced bread soaked in beaten eggs and typically milk, then pan fried. Alternative names and variants include \"eggy bread\", \"Bombay toast\", \"gypsy toast\", and \"poor knights\".', 'Breakfast', '150.00', 'uploads/IMG-6188f0f8d91e16.06781648.jpg', NULL);


-- --------------------------------------------------------

--
-- Table structure for table `persons_cust`
--

CREATE TABLE `persons_cust` (
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `login_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persons_cust`
--

INSERT INTO `persons_cust` (`username`, `fullname`, `email`, `phonenumber`, `pass`, `gender`, `reg_date`, `login_status`) VALUES
('aongshu', 'Ishmam Ahmed Ongshu', 'aongshu@gmail.com', '01779609078', 'Axpxs5996', 'MALE', '2021-11-10 10:17:35', 0),
('Dipta', 'Debabrata Dash  Dipta', 'debabratadash35@gmail.com', '01768318530', '12345678', 'MALE', '2021-11-07 06:08:14', 0),
('Emad', 'MD Emad Uddin Aksir', '2018-1-60-170@std.ewubd.edu', '01521580585', '12345678', 'MALE', '2021-11-07 17:34:33', 0),
('ISHMAM', 'Ishmam Ahmed Ongshu', '2018-1-68-024@std.ewubd.edu', '01611609063', '12345678', 'MALE', '2021-11-10 10:38:35', 1),
('MHDip', 'Md. Mahfuzul Haq', 'mahfuzulhaqdip@gmail.com', '01783751007', '12345678', 'MALE', '2021-11-05 17:59:20', 0),
('tasiful6251', 'Muhammod Tasiful Alam', 'tasifulalam.9846@gmail.com', '01812980436', '2018160170', 'MALE', '2021-11-05 19:49:56', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_cat`
--
ALTER TABLE `food_cat`
  ADD PRIMARY KEY (`catagory`),
  ADD UNIQUE KEY `start_time` (`start_time`,`end_time`);

--
-- Indexes for table `food_item`
--
ALTER TABLE `food_item`
  ADD PRIMARY KEY (`food_id`),
  ADD UNIQUE KEY `image_path` (`image_path`,`food_name`),
  ADD KEY `catagory` (`catagory`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persons_cust`
--
ALTER TABLE `persons_cust`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `phonenumber` (`phonenumber`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_item`
--
ALTER TABLE `food_item`
  MODIFY `food_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food_item`
--
ALTER TABLE `food_item`
  ADD CONSTRAINT `food_item_ibfk_1` FOREIGN KEY (`catagory`) REFERENCES `food_cat` (`catagory`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE admin ADD login_status tinyint(1);

UPDATE admin SET login_status = '1' WHERE username = 'I006';

CREATE TABLE `persons_stuff` (
  'id' INT NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `position` varchar(15) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)

CREATE TABLE `persons_stuff`(
  `position` varchar(15) NOT NULL,
  'salary' numeric(10, 2),
  'increment' int
)