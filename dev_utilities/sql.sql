-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 02, 2020 at 06:39 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `nss`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(12) NOT NULL,
  `rollno` varchar(8) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `phone`, `rollno`, `unit`, `password`, `active`, `id`) VALUES
('Harshvardhan singh', 'harshvardhan_1901mm14@iitp.ac.in', '7759038483', '1901mm14', 'Adhyayan', 'e2bb06cd2157e182220281fe634f399dd2f2e1ad', 1, 5),
('SAHIL MASOOM', 'sahil_1901mm28@iitp.ac.in', '8229025562', '1901MM28', 'Adhyayan', '0d58c70e5329c3c948dbea2d0bab5287d14de095', 1, 6),
('Amartya MOndal', '1801me07@iitp.ac.in', '8967570983', '1801me07', 'BTech18', 'f181c50384d8adc56a0ff990d33568f686059c87', 1, 157);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rollno` (`rollno`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
