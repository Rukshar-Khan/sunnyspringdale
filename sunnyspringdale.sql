-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2024 at 01:26 PM
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
-- Database: `sunnyspringdale`
--

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `mark_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `academic_year` varchar(9) NOT NULL,
  `rollno` varchar(20) NOT NULL,
  `class` varchar(50) NOT NULL,
  `term1_subject_1` int(11) DEFAULT 0,
  `term1_subject_2` int(11) DEFAULT 0,
  `term1_subject_3` int(11) DEFAULT 0,
  `term1_subject_4` int(11) DEFAULT 0,
  `term1_subject_5` int(11) DEFAULT 0,
  `term1_total_marks` int(11) GENERATED ALWAYS AS (`term1_subject_1` + `term1_subject_2` + `term1_subject_3` + `term1_subject_4` + `term1_subject_5`) STORED,
  `term2_subject_1` int(11) DEFAULT 0,
  `term2_subject_2` int(11) DEFAULT 0,
  `term2_subject_3` int(11) DEFAULT 0,
  `term2_subject_4` int(11) DEFAULT 0,
  `term2_subject_5` int(11) DEFAULT 0,
  `term2_total_marks` int(11) GENERATED ALWAYS AS (`term2_subject_1` + `term2_subject_2` + `term2_subject_3` + `term2_subject_4` + `term2_subject_5`) STORED,
  `cumulative_total_marks` int(11) GENERATED ALWAYS AS (`term1_total_marks` + `term2_total_marks`) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`mark_id`, `student_id`, `academic_year`, `rollno`, `class`, `term1_subject_1`, `term1_subject_2`, `term1_subject_3`, `term1_subject_4`, `term1_subject_5`, `term2_subject_1`, `term2_subject_2`, `term2_subject_3`, `term2_subject_4`, `term2_subject_5`) VALUES
(1, 1, '2024', '101', '4', 95, 69, 58, 65, 65, 85, 55, 55, 26, 96),
(2, 2, '2024', '11', '2', 65, 45, 76, 76, 67, 65, 87, 34, 43, 45);

--
-- Triggers `marks`
--
DELIMITER $$
CREATE TRIGGER `after_marks_insert` AFTER INSERT ON `marks` FOR EACH ROW BEGIN
    DECLARE term1_percent DECIMAL(5, 2);
    DECLARE term2_percent DECIMAL(5, 2);
    DECLARE cumulative_percent DECIMAL(5, 2);

    SET term1_percent = (NEW.term1_total_marks / 500) * 100;
    SET term2_percent = (NEW.term2_total_marks / 500) * 100;
    SET cumulative_percent = (NEW.cumulative_total_marks / 1000) * 100;

    INSERT INTO results (student_id, academic_year, term1_total_marks, term1_percentage, term2_total_marks, term2_percentage, cumulative_total_marks, cumulative_percentage)
    VALUES (NEW.student_id, NEW.academic_year, NEW.term1_total_marks, term1_percent, NEW.term2_total_marks, term2_percent, NEW.cumulative_total_marks, cumulative_percent);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_marks_update` AFTER UPDATE ON `marks` FOR EACH ROW BEGIN
    DECLARE term1_percent DECIMAL(5, 2);
    DECLARE term2_percent DECIMAL(5, 2);
    DECLARE cumulative_percent DECIMAL(5, 2);

    SET term1_percent = (NEW.term1_total_marks / 500) * 100;
    SET term2_percent = (NEW.term2_total_marks / 500) * 100;
    SET cumulative_percent = (NEW.cumulative_total_marks / 1000) * 100;

    UPDATE results
    SET academic_year = NEW.academic_year,
        term1_total_marks = NEW.term1_total_marks,
        term1_percentage = term1_percent,
        term2_total_marks = NEW.term2_total_marks,
        term2_percentage = term2_percent,
        cumulative_total_marks = NEW.cumulative_total_marks,
        cumulative_percentage = cumulative_percent
    WHERE student_id = NEW.student_id AND academic_year = NEW.academic_year;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_marks_delete` BEFORE DELETE ON `marks` FOR EACH ROW BEGIN
    DELETE FROM results WHERE mark_id = OLD.mark_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `academic_year` varchar(9) DEFAULT NULL,
  `term1_total_marks` int(11) DEFAULT NULL,
  `term1_percentage` decimal(5,2) DEFAULT NULL,
  `term1_grade` varchar(2) DEFAULT NULL,
  `term2_total_marks` int(11) DEFAULT NULL,
  `term2_percentage` decimal(5,2) DEFAULT NULL,
  `term2_grade` varchar(2) DEFAULT NULL,
  `cumulative_total_marks` int(11) DEFAULT NULL,
  `cumulative_percentage` decimal(5,2) DEFAULT NULL,
  `cumulative_grade` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `student_id`, `academic_year`, `term1_total_marks`, `term1_percentage`, `term1_grade`, `term2_total_marks`, `term2_percentage`, `term2_grade`, `cumulative_total_marks`, `cumulative_percentage`, `cumulative_grade`) VALUES
(1, 1, '2024', 352, 70.40, NULL, 317, 63.40, NULL, 669, 66.90, NULL),
(2, 2, '2024', 329, 65.80, NULL, 274, 54.80, NULL, 603, 60.30, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `section` varchar(50) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `admission_year` year(4) NOT NULL,
  `pass_year` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `name`, `section`, `mother_name`, `admission_year`, `pass_year`) VALUES
(1, 'riya', 'a', 'k', '2020', '0000'),
(2, 'asim', 'a', 'dilfiroz', '2002', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `name`, `created`) VALUES
(1, 'rk@gmail.com', '$2y$10$xleNV9/6D3XVBtSucu8uluepw0DXNF3Zp3EPxc0vwiSnsUOeFjG7q', 'rk', '2024-08-12 10:30:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`mark_id`),
  ADD UNIQUE KEY `unique_student_year_class_rollno` (`student_id`,`academic_year`,`class`,`rollno`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
