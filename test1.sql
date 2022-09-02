-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 05:52 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL,
  `login_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `login_status`) VALUES
('I006', 'Axpxs5996', 1);

-- --------------------------------------------------------

--
-- Table structure for table `confirm_order`
--

CREATE TABLE `confirm_order` (
  `username` varchar(255) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` float NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `address` varchar(10000) DEFAULT 'NO',
  `Delivery_boy` varchar(100) DEFAULT 'NOT YET',
  `Delivery_Number` varchar(100) DEFAULT 'NOT YET',
  `Payment` tinyint(1) DEFAULT 0,
  `Payment_option` varchar(255) DEFAULT 'NONE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('Dinner', '00:01:00', '03:59:00'),
('Lunch', '12:01:00', '19:00:00'),
('Breakfast', '19:01:00', '23:00:00');

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
(7, 'French Toast', 'French toast is a dish made of sliced bread soaked in beaten eggs and typically milk, then pan fried. Alternative names and variants include \"eggy bread\", \"Bombay toast\", \"gypsy toast\", and \"poor knights\".', 'Breakfast', '150.00', 'uploads/IMG-6188f0f8d91e16.06781648.jpg', NULL),
(8, 'juicy chicken with crispy skin', 'Crispy Oven Baked Chicken with juicy meat and crisp, flavorful skin can be on your dinner table with about 5 minutes’ worth of effort! This crispy chicken is made in the oven without any breading at all; the only ingredients you need are the chicken, a drizzle of oil, salt, and pepper.', 'Dinner', '350.00', 'uploads/IMG-61aa5da6538e41.26073271.jpg', NULL),
(13, 'Grilled Fish With Cooked Vegetables', 'Fish steaks, cut 1 1/2 to 2 inches thick—halibut, swordfish, and tuna are all good choices—are really best for grilling. Fillets are usually too delicate, and large whole fish are tricky—too often the outside is charred before the inside is cooked. ', 'Dinner', '400.00', 'uploads/IMG-61aa612ea0a3e3.09861726.jpg', NULL),
(14, 'Cooked Rice With Egg Potato', 'The complete makeover of some leftover rice...Potatoes and eggs make it a yummy meal perfect for lunchbox too...', 'Lunch', '300.00', 'uploads/IMG-61aa79de545422.35545391.jpg', NULL),
(15, 'Soup With Creamy ', 'This comforting, creamy tomato soup relies on pantry staples, such as canned whole tomatoes, garlic, onion, and extra-virgin olive oil. Freshly made brown butter croutons add contrasting crunch and a touch of richness. Best of all, you can enjoy a bowl of this soup in just 30 minutes. ', 'Lunch', '250.00', 'uploads/IMG-61aa85c041bc81.88216317.jpg', NULL),
(16, 'Dal Vhat', 'asdfghjkl;qwertyuiop[sdfghjkl;dfghjk', 'Lunch', '50.00', 'uploads/IMG-61acad89a79fd7.49823336.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paypal`
--

CREATE TABLE `paypal` (
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `pass` varchar(255) DEFAULT '12345678'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paypal`
--

INSERT INTO `paypal` (`fname`, `lname`, `username`, `email`, `phone`, `address`, `amount`, `pass`) VALUES
('Ishmam Ahmed', 'Ongshu', 'aongshu', 'aongshu@gmail.com', '01779609078', 'Motijhil, Dhaka-1100', 1004850, 'Axpxs5996'),
('Ishmam Ahmed', 'Ongshu', 'Ishmam', '2018-1-68-024@std.ewubd.edu', '01518907724', 'Habiganj', 995150, '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `pending_food_item`
--

CREATE TABLE `pending_food_item` (
  `food_id` int(10) UNSIGNED NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `catagory` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image_path` varchar(100) NOT NULL,
  `rating` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pending_order`
--

CREATE TABLE `pending_order` (
  `username` varchar(255) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `persons_cust`
--

CREATE TABLE `persons_cust` (
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL DEFAULT '123456',
  `gender` varchar(15) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `login_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persons_cust`
--

INSERT INTO `persons_cust` (`username`, `fullname`, `email`, `phonenumber`, `pass`, `gender`, `reg_date`, `login_status`) VALUES
('aongshu', 'Ishmam Ahmed Ongshu', 'aongshu@gmail.com', '01611609063', '12345678', 'MALE', '2021-12-05 12:50:24', 0),
('Emad', 'MD Emad Uddin Aksir', '2018-1-60-170@std.ewubd.edu', '01521580585', '12345678', 'MALE', '2021-11-07 17:34:33', 0),
('MHDip', 'Md. Mahfuzul Haq', 'mahfuzulhaqdip@gmail.com', '01783751007', '12345678', 'MALE', '2021-12-01 12:32:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `persons_stuff`
--

CREATE TABLE `persons_stuff` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL DEFAULT '123456',
  `gender` varchar(15) NOT NULL,
  `position` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `login_status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persons_stuff`
--

INSERT INTO `persons_stuff` (`id`, `username`, `fullname`, `email`, `phonenumber`, `pass`, `gender`, `position`, `reg_date`, `login_status`) VALUES
(7, 'Tasif', 'Mohammed Tasiful Alam', 'tasifulalam.9846@gmail.com', '01819960987', '123456', 'Male', 'Manager', '2021-12-03 11:45:39', 0),
(8, 'Dip', 'Md. Mahfuzul Haq', 'mahfuzulhaqdip@gmail.com', '01521517617', '123456', 'Male', 'Associate Manager', '2021-12-03 11:45:34', 0),
(11, 'Ishmam005', 'Ishmam Ahmed Ongshu', '2018-1-68-024@std.ewubd.edu', '01618908953', '123456', 'Male', 'Delivery Boy', '2021-12-05 12:47:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position` varchar(200) NOT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `increment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position`, `salary`, `increment`) VALUES
('Associate Manager', '40000.00', 25),
('Chief Chef', '35000.00', 20),
('Delivery Boy', '25000.00', 15),
('Intern Chef', '10000.00', 20),
('Junior Chef', '30000.00', 20),
('Manager', '50000.00', 25),
('Senior Chef', '32000.00', 20);

-- --------------------------------------------------------

--
-- Table structure for table `request_customer`
--

CREATE TABLE `request_customer` (
  `req_id` int(100) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_customer`
--

INSERT INTO `request_customer` (`req_id`, `username`, `message`, `date_time`) VALUES
(4, 'aongshu', 'Please change my username =aongshu011', '2021-11-28 08:47:05'),
(5, 'ISHMAM', 'Please update my Full Name = Ishmam Ahmed', '2021-11-28 08:47:05'),
(6, 'ISHMAM', 'Please change Name=aongshu0001', '2021-11-28 12:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `re_order`
--

CREATE TABLE `re_order` (
  `username` varchar(255) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` float NOT NULL,
  `date_done` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `re_order`
--

INSERT INTO `re_order` (`username`, `food_name`, `quantity`, `price`, `date_done`) VALUES
('aongshu', 'Soup With Creamy ', 2, 500, '2021-12-05 10:39:45'),
('aongshu', 'Cooked Rice With Egg Potato', 2, 600, '2021-12-05 10:39:45'),
('aongshu', 'Soup With Creamy ', 2, 500, '2021-12-05 10:44:29'),
('aongshu', 'Cooked Rice With Egg Potato', 2, 600, '2021-12-05 10:44:29'),
('aongshu', 'Soup With Creamy ', 1, 250, '2021-12-05 11:15:09'),
('aongshu', 'Cooked Rice With Egg Potato', 1, 300, '2021-12-05 11:15:09'),
('aongshu', 'Soup With Creamy ', 2, 500, '2021-12-05 12:13:45'),
('aongshu', 'Cooked Rice With Egg Potato', 2, 600, '2021-12-05 12:13:45'),
('aongshu', 'Soup With Creamy ', 2, 500, '2021-12-05 12:13:47'),
('aongshu', 'Cooked Rice With Egg Potato', 2, 600, '2021-12-05 12:13:47'),
('aongshu', 'Soup With Creamy ', 2, 500, '2021-12-05 12:13:49'),
('aongshu', 'Cooked Rice With Egg Potato', 1, 300, '2021-12-05 12:13:49'),
('aongshu', 'Soup With Creamy ', 1, 250, '2021-12-05 12:48:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`);

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
-- Indexes for table `paypal`
--
ALTER TABLE `paypal`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`,`phone`,`address`) USING HASH;

--
-- Indexes for table `pending_food_item`
--
ALTER TABLE `pending_food_item`
  ADD PRIMARY KEY (`food_id`),
  ADD UNIQUE KEY `food_name` (`food_name`),
  ADD UNIQUE KEY `image_path` (`image_path`);

--
-- Indexes for table `pending_order`
--
ALTER TABLE `pending_order`
  ADD KEY `username` (`username`) USING BTREE,
  ADD KEY `food_name` (`food_name`) USING BTREE;

--
-- Indexes for table `persons_cust`
--
ALTER TABLE `persons_cust`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`,`phonenumber`);

--
-- Indexes for table `persons_stuff`
--
ALTER TABLE `persons_stuff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`,`phonenumber`),
  ADD KEY `position` (`position`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position`);

--
-- Indexes for table `request_customer`
--
ALTER TABLE `request_customer`
  ADD PRIMARY KEY (`req_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_item`
--
ALTER TABLE `food_item`
  MODIFY `food_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pending_food_item`
--
ALTER TABLE `pending_food_item`
  MODIFY `food_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `persons_stuff`
--
ALTER TABLE `persons_stuff`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `request_customer`
--
ALTER TABLE `request_customer`
  MODIFY `req_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
