-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 14, 2024 at 09:05 PM
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
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `year_id` int(11) NOT NULL,
  `academic_year` varchar(9) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`year_id`, `academic_year`, `student_id`) VALUES
(1, '2024', 7),
(2, '2024', 8),
(3, '2021-2022', 1),
(5, '2022-2023', 9);

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
(8, 4, '2024-2025', 'a501', '6', 25, 65, 94, 65, 32, 85, 95, 65, 45, 56),
(9, 1, '2026-2027', 'a601', '6', 95, 65, 97, 45, 85, 69, 85, 45, 75, 95),
(11, 6, '2024-2025', 'D708', '7', 95, 65, 65, 65, 45, 0, 0, 0, 0, 0),
(12, 7, '2024', 'B416', '4', 65, 65, 75, 85, 85, 0, 0, 0, 0, 0),
(13, 8, '2024', 'D543', '5th', 65, 85, 75, 95, 85, 0, 0, 0, 0, 0),
(14, 1, '2021-2022', 'C509', '5th', 95, 65, 85, 96, 85, 96, 85, 74, 75, 95),
(15, 9, '2022-2023', 'A504', '5th', 95, 85, 74, 84, 94, 85, 84, 95, 86, 76);

--
-- Triggers `marks`
--
DELIMITER $$
CREATE TRIGGER `after_marks_delete` AFTER DELETE ON `marks` FOR EACH ROW BEGIN
    DELETE FROM results
    WHERE student_id = OLD.student_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_marks_delete_trigger` AFTER DELETE ON `marks` FOR EACH ROW BEGIN
    -- Handle NULL values with proper operators
    IF OLD.student_id IS NOT NULL AND OLD.academic_year IS NOT NULL THEN
        -- Delete the academic year record associated with the deleted mark entry
        DELETE FROM academic_years 
        WHERE student_id = OLD.student_id 
        AND academic_year = OLD.academic_year;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_marks_insert` AFTER INSERT ON `marks` FOR EACH ROW BEGIN
    DECLARE term1_percent DECIMAL(5, 2);
    DECLARE term2_percent DECIMAL(5, 2);
    DECLARE cumulative_percent DECIMAL(5, 2);
    DECLARE term1_grade CHAR(2);
    DECLARE term2_grade CHAR(2);
    DECLARE cumulative_grade CHAR(2);

    SET term1_percent = (NEW.term1_total_marks / 500) * 100;
    SET term2_percent = (NEW.term2_total_marks / 500) * 100;
    SET cumulative_percent = (NEW.cumulative_total_marks / 1000) * 100;

    -- Determine grades based on percentages
    SET term1_grade = CASE
        WHEN term1_percent >= 90 THEN 'A'
        WHEN term1_percent >= 80 THEN 'B'
        WHEN term1_percent >= 70 THEN 'C'
        WHEN term1_percent >= 60 THEN 'D'
        ELSE 'F'
    END;

    SET term2_grade = CASE
        WHEN term2_percent >= 90 THEN 'A'
        WHEN term2_percent >= 80 THEN 'B'
        WHEN term2_percent >= 70 THEN 'C'
        WHEN term2_percent >= 60 THEN 'D'
        ELSE 'F'
    END;

    SET cumulative_grade = CASE
        WHEN cumulative_percent >= 90 THEN 'A'
        WHEN cumulative_percent >= 80 THEN 'B'
        WHEN cumulative_percent >= 70 THEN 'C'
        WHEN cumulative_percent >= 60 THEN 'D'
        ELSE 'F'
    END;

    INSERT INTO results (student_id, academic_year, term1_total_marks, term1_percentage, term1_grade, term2_total_marks, term2_percentage, term2_grade, cumulative_total_marks, cumulative_percentage, cumulative_grade)
    VALUES (NEW.student_id, NEW.academic_year, NEW.term1_total_marks, term1_percent, term1_grade, NEW.term2_total_marks, term2_percent, term2_grade, NEW.cumulative_total_marks, cumulative_percent, cumulative_grade);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_marks_insert_trigger` AFTER INSERT ON `marks` FOR EACH ROW BEGIN
    -- Handle NULL values with proper operators
    IF NEW.student_id IS NOT NULL AND NEW.academic_year IS NOT NULL THEN
        -- Check if the academic year for the student already exists
        IF NOT EXISTS (
            SELECT 1 FROM academic_years
            WHERE student_id = NEW.student_id
            AND academic_year = NEW.academic_year
        ) THEN
            -- If not, insert the academic year into the academic_years table
            INSERT INTO academic_years (academic_year, student_id)
            VALUES (NEW.academic_year, NEW.student_id);
        END IF;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_marks_update` AFTER UPDATE ON `marks` FOR EACH ROW BEGIN
    DECLARE term1_percent DECIMAL(5, 2);
    DECLARE term2_percent DECIMAL(5, 2);
    DECLARE cumulative_percent DECIMAL(5, 2);
    DECLARE term1_grade CHAR(2);
    DECLARE term2_grade CHAR(2);
    DECLARE cumulative_grade CHAR(2);

    SET term1_percent = (NEW.term1_total_marks / 500) * 100;
    SET term2_percent = (NEW.term2_total_marks / 500) * 100;
    SET cumulative_percent = (NEW.cumulative_total_marks / 1000) * 100;

    -- Determine grades based on percentages
    SET term1_grade = CASE
        WHEN term1_percent >= 90 THEN 'A'
        WHEN term1_percent >= 80 THEN 'B'
        WHEN term1_percent >= 70 THEN 'C'
        WHEN term1_percent >= 60 THEN 'D'
        ELSE 'F'
    END;

    SET term2_grade = CASE
        WHEN term2_percent >= 90 THEN 'A'
        WHEN term2_percent >= 80 THEN 'B'
        WHEN term2_percent >= 70 THEN 'C'
        WHEN term2_percent >= 60 THEN 'D'
        ELSE 'F'
    END;

    SET cumulative_grade = CASE
        WHEN cumulative_percent >= 90 THEN 'A'
        WHEN cumulative_percent >= 80 THEN 'B'
        WHEN cumulative_percent >= 70 THEN 'C'
        WHEN cumulative_percent >= 60 THEN 'D'
        ELSE 'F'
    END;

    UPDATE results
    SET academic_year = NEW.academic_year,
        term1_total_marks = NEW.term1_total_marks,
        term1_percentage = term1_percent,
        term1_grade = term1_grade,
        term2_total_marks = NEW.term2_total_marks,
        term2_percentage = term2_percent,
        term2_grade = term2_grade,
        cumulative_total_marks = NEW.cumulative_total_marks,
        cumulative_percentage = cumulative_percent,
        cumulative_grade = cumulative_grade
    WHERE student_id = NEW.student_id AND academic_year = NEW.academic_year;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_marks_update_trigger` AFTER UPDATE ON `marks` FOR EACH ROW BEGIN
    -- Handle NULL values with proper operators
    IF OLD.student_id IS NOT NULL AND OLD.academic_year IS NOT NULL THEN
        -- Delete the old academic year record if it exists
        DELETE FROM academic_years 
        WHERE student_id = OLD.student_id 
        AND academic_year = OLD.academic_year;
    END IF;

    IF NEW.student_id IS NOT NULL AND NEW.academic_year IS NOT NULL THEN
        -- Insert the new academic year record if it doesn't exist
        IF NOT EXISTS (
            SELECT 1 FROM academic_years
            WHERE student_id = NEW.student_id
            AND academic_year = NEW.academic_year
        ) THEN
            INSERT INTO academic_years (academic_year, student_id)
            VALUES (NEW.academic_year, NEW.student_id);
        END IF;
    END IF;
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
(2, 2, '2024', 329, 65.80, NULL, 274, 54.80, NULL, 603, 60.30, NULL),
(9, 1, '2026-2027', 387, 77.40, 'C', 369, 73.80, 'C', 756, 75.60, 'C'),
(10, 6, '2024-2025', 335, 67.00, 'D', 0, 0.00, 'F', 335, 33.50, 'F'),
(11, 7, '2024', 375, 75.00, 'C', 0, 0.00, 'F', 375, 37.50, 'F'),
(12, 8, '2024', 405, 81.00, 'B', 0, 0.00, 'F', 405, 40.50, 'F'),
(13, 1, '2021-2022', 426, 85.20, 'B', 425, 85.00, 'B', 851, 85.10, 'B'),
(14, 9, '2022-2023', 432, 86.40, 'B', 426, 85.20, 'B', 858, 85.80, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `section` varchar(50) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `admission_year` datetime DEFAULT current_timestamp(),
  `pass_year` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `name`, `section`, `mother_name`, `admission_year`, `pass_year`) VALUES
(1, 'riya', 'a', 'k', '0000-00-00 00:00:00', '0000'),
(2, 'asim', 'a', 'dilfiroz', '0000-00-00 00:00:00', '0000'),
(3, 'Muzammil Khan', 'B', 'N', '0000-00-00 00:00:00', '0000'),
(4, 'harsh', 'a', 'v', '0000-00-00 00:00:00', '0000'),
(5, 'atharv', 'c', 'o', '0000-00-00 00:00:00', '0000'),
(6, 'Rukshar Khan', 'D', 'K', '0000-00-00 00:00:00', '0000'),
(7, 'RK', 'B', 'KK', '0000-00-00 00:00:00', '0000'),
(8, 'Zeeshan', 'D', 'D', '0000-00-00 00:00:00', '0000'),
(9, 'Avesh Khan', 'A', 'N', '0000-00-00 00:00:00', '0000'),
(10, 'abc', 'a', 'xyz', '2024-08-14 18:52:45', '2025');

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
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`year_id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

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
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD CONSTRAINT `academic_years_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

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
