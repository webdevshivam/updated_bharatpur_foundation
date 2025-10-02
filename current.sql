-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2025 at 06:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@nayantar.org', '$2y$10$W8jrpaMc5vBifnf9sWaUyeqLeitJqiPH7K56VcZlhByYS8qur9VR6', '2025-07-30 15:13:45', '2025-07-30 15:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiaries`
--

CREATE TABLE `beneficiaries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `education_level` varchar(100) NOT NULL,
  `course` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(500) DEFAULT NULL,
  `company_link` varchar(500) DEFAULT NULL,
  `family_background` text DEFAULT NULL,
  `academic_achievements` text DEFAULT NULL,
  `career_goals` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beneficiaries`
--

INSERT INTO `beneficiaries` (`id`, `name`, `age`, `education_level`, `course`, `institution`, `city`, `state`, `phone`, `email`, `linkedin_url`, `company_link`, `family_background`, `academic_achievements`, `career_goals`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rahul Kumar Sharma', 22, 'Undergraduate', 'Computer Science Engineering', 'Rajasthan Technical University', 'Jaipur', 'Rajasthan', '+91 9876543210', 'rahul.sharma@email.com', 'https://linkedin.com/in/rahulkumar', 'https://rtu.ac.in', 'From a farming family in rural Rajasthan. Father is a small-scale farmer and mother is a homemaker. Family income is very limited, making higher education challenging.', 'Scored 85% in 12th standard, Won district-level science fair in 2020, Received merit scholarship in first year', 'Aspiring to become a software engineer at a leading tech company. Wants to develop applications that can help rural communities. Plans to pursue higher studies in AI/ML.', NULL, 'active', '2025-07-30 15:57:47', '2025-07-30 15:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `public_forms`
--

CREATE TABLE `public_forms` (
  `id` int(11) NOT NULL,
  `form_name` varchar(255) NOT NULL,
  `form_type` enum('beneficiary','success_story') NOT NULL,
  `public_url_token` varchar(100) NOT NULL,
  `valid_until` datetime NOT NULL,
  `max_submissions` int(11) DEFAULT 100,
  `current_submissions` int(11) DEFAULT 0,
  `status` enum('active','expired','disabled') DEFAULT 'active',
  `description` text DEFAULT NULL,
  `created_by_admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `public_forms`
--

INSERT INTO `public_forms` (`id`, `form_name`, `form_type`, `public_url_token`, `valid_until`, `max_submissions`, `current_submissions`, `status`, `description`, `created_by_admin_id`, `created_at`, `updated_at`) VALUES
(1, 'Beneficiary Registration 2025', 'beneficiary', '0', '2025-08-29 15:57:47', 100, 0, 'active', 'Public form for new beneficiary applications for the year 2025', 1, '2025-07-30 15:57:47', '2025-07-30 15:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `public_submissions`
--

CREATE TABLE `public_submissions` (
  `id` int(11) NOT NULL,
  `public_form_id` int(11) NOT NULL,
  `form_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`form_data`)),
  `image` varchar(255) DEFAULT NULL,
  `submitted_at` timestamp NULL DEFAULT current_timestamp(),
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `success_stories`
--

CREATE TABLE `success_stories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `education` varchar(255) NOT NULL,
  `current_position` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `linkedin_url` varchar(500) DEFAULT NULL,
  `company_link` varchar(500) DEFAULT NULL,
  `story` text NOT NULL,
  `achievements` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `success_stories`
--

INSERT INTO `success_stories` (`id`, `name`, `age`, `education`, `current_position`, `company`, `city`, `state`, `linkedin_url`, `company_link`, `story`, `achievements`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Priya Kumari', 25, 'B.Tech in Computer Science from Delhi University', 'Senior Software Developer', 'TechCorp Solutions', 'Bangalore', 'Karnataka', 'https://linkedin.com/in/priyakumari', 'https://techcorp.com', 'Priya came from a humble background in rural Bihar. With the support of Nayantar Memorial Trust, she completed her engineering degree and is now working as a Senior Software Developer at a leading tech company in Bangalore. Her journey from a small village to becoming a successful engineer is truly inspiring.', 'Developed 3 major software applications, Led a team of 5 developers, Received Employee of the Year award in 2023, Published 2 research papers in international conferences', NULL, 'active', '2025-07-30 15:57:47', '2025-07-30 15:57:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_forms`
--
ALTER TABLE `public_forms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `public_url_token` (`public_url_token`),
  ADD KEY `created_by_admin_id` (`created_by_admin_id`);

--
-- Indexes for table `public_submissions`
--
ALTER TABLE `public_submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `public_form_id` (`public_form_id`);

--
-- Indexes for table `success_stories`
--
ALTER TABLE `success_stories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `public_forms`
--
ALTER TABLE `public_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `public_submissions`
--
ALTER TABLE `public_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `success_stories`
--
ALTER TABLE `success_stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `public_forms`
--
ALTER TABLE `public_forms`
  ADD CONSTRAINT `public_forms_ibfk_1` FOREIGN KEY (`created_by_admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `public_submissions`
--
ALTER TABLE `public_submissions`
  ADD CONSTRAINT `public_submissions_ibfk_1` FOREIGN KEY (`public_form_id`) REFERENCES `public_forms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
