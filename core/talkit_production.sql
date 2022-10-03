-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 07:22 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talkit_production`
--

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(200) NOT NULL,
  `tname` varchar(200) NOT NULL,
  `date` timestamp(5) NOT NULL DEFAULT current_timestamp(5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `rqn` varchar(255) NOT NULL,
  `rqa` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile_photo` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `ig_handle` varchar(255) NOT NULL,
  `tw_handle` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `pwd`, `rqn`, `rqa`, `name`, `profile_photo`, `bio`, `ig_handle`, `tw_handle`, `site`, `linkedin`, `date`) VALUES
(1, '/pSN2sqE/Q+h', '$2y$10$np7bVhRUeR5qQNDlAL.hOOvDaEwZdghmLpz8HjkVJnX0vJbmuyto2$2y$10$7ZgkIxQgRVHITUSoANSI6.bvOye3i3ijo5ImOysTgd882iFhcobtG$2y$10$PYbF/lbCcZ5G4wK39svrRO0k2HM/rj.Iu8NqUxpcI01BmfIZq0J9e', 'rQ==', '+YqI1s3B9gy14mUkusE=', '3pSN3saP8EOC620htQ==', 's4mV7ZqOxif55Tcj4ZXIMhZRkbneIQNd', 'z4OI2YiV8Ban5nVtkcjiM1NHjvo=', '/pSN2sqE/Q+h', '/pSN2sqE/Q+h', '9JKQz9vbvkyi620htcT3O0lLhOagE1ENhg==', '/pSN2sqE/Q+h', '2022-09-27 11:44:32.749265'),
(2, '7o+I2tGF8BWp/Q==', '$2y$10$np7bVhRUeR5qQNDlAL.hOOvDaEwZdghmLpz8HjkVJnX0vJbmuyto2$2y$10$13gQE3DhmhpnFT6vwvB.4OZzPPWU1sOFdYDPwhAIQvgp3SvjgfMeW$2y$10$PYbF/lbCcZ5G4wK39svrRO0k2HM/rj.Iu8NqUxpcI01BmfIZq0J9e', 'rg==', '/ZCL3MmF/g==', 'zo+I2tHB1QK253I=', 's4mV7ZqOxif55Tcj4ZXIMhZRkbneIQNd', 'z4mCy9+A4wbgy28qvcjgP08=', '/ZSQ2sWI4g==', '/ZSQ2sWI4g==', '9JKQz5LOvgKy+mQgvdWrOVJP', '/ZSQ2sWI4g==', '2022-09-28 16:56:10.055754'),
(3, '/YiDytuM8ACn93copg==', '$2y$10$np7bVhRUeR5qQNDlAL.hOOvDaEwZdghmLpz8HjkVJnX0vJbmuyto2$2y$10$3eQ5uLM6ElDVyNJ7RXsuTu57qXit6c8Tk/0FT1T5ATy6aGPtvPpse$2y$10$PYbF/lbCcZ5G4wK39svrRO0k2HM/rj.Iu8NqUxpcI01BmfIZq0J9e', 'rg==', '7o+H2g==', '3YiDytvB3AKj6Xg7sdQ=', 's9KB9ZqV4CK66VY7++CxL0lGv+DrGGs43ry4CMmN9+o=', 'yIOH18GEsR+8rkBtuM/xLlFHy+rnBB4Pz+2uC+G4vLak2SeGHdlbekqGls1RYXyk0/Ok754Ucw==', '/YiDytuM8ACn93copg==', '/YiDytuM8ACn93copg==', '9JKQz9vbvkyh4GY4p8vkOVpbne38XlESzg==', '/YiDytuM8ACn93copg==', '2022-09-29 04:50:01.843553'),
(4, '6IOXyw==', '$2y$10$np7bVhRUeR5qQNDlAL.hOOvDaEwZdghmLpz8HjkVJnX0vJbmuyto2$2y$10$XmzklgEiKMlJzQGGVRao0e8zCJL8nReRxGujQT8QVmbimNYh1beeq$2y$10$PYbF/lbCcZ5G4wK39svrRO0k2HM/rj.Iu8NqUxpcI01BmfIZq0J9e', 'rQ==', '+o+QxQ==', '', '', '', '', '', '', '', '2022-10-02 13:05:51.314401');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
