-- AU SRMS Database Schema & Initial Seed
-- Clean template for development and production migrations

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE IF NOT EXISTS `activity_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `action` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE IF NOT EXISTS `announcements` (
  `announcement_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `announcement` varchar(255) NOT NULL,
  PRIMARY KEY (`announcement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `announcements` (`announcement_id`, `announcement`) VALUES
(1, 'Welcome to the Student Result Management System'),
(2, 'Midterm examination schedule announced');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(255) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `subjects` (`subject_id`, `subject_name`) VALUES
(1, 'Computer Programming'),
(2, 'Research'),
(3, 'Animation'),
(4, 'General Mathematics'),
(5, 'Application Development');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `score` int(11) NOT NULL,
  `estimated_score` int(11) NOT NULL,
  `overall_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `account_id` int(11) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `stdnt_strand` varchar(255) NOT NULL,
  `stdnt_section` varchar(255) NOT NULL,
  `stdnt_lrn` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `bday` date NOT NULL,
  `stdnt_email` varchar(255) NOT NULL,
  `stdnt_contactNum` varchar(255) NOT NULL,
  `stdnt_motherName` varchar(255) NOT NULL,
  `stdnt_momNum` varchar(255) NOT NULL,
  `stdnt_fatherName` varchar(255) NOT NULL,
  `stdnt_fatherNum` varchar(255) NOT NULL,
  `access_level` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_systemStatus` varchar(255) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Demo student record (Password: student123)
--
INSERT INTO `students` (`account_id`, `lastName`, `firstName`, `middleName`, `stdnt_strand`, `stdnt_section`, `stdnt_lrn`, `sex`, `bday`, `stdnt_email`, `stdnt_contactNum`, `stdnt_motherName`, `stdnt_momNum`, `stdnt_fatherName`, `stdnt_fatherNum`, `access_level`, `username`, `password`, `user_systemStatus`) VALUES
(10001, 'Doe', 'John', 'M', 'ICT', '1A', '100000000001', 'Male', '2004-01-01', 'johndoe@example.com', '09123456789', 'Jane Doe', '09123456780', 'Bob Doe', '09123456781', '0', 'student', '$2y$10$KwQIi5Jsd3pd2LWbs40oC.29HZTN39MUcPEMjBY/T8XZ3uBzgyGIC', 'Offline');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_id` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `bday` date NOT NULL,
  `motherName` varchar(255) NOT NULL,
  `motherContactNum` varchar(255) NOT NULL,
  `fatherName` varchar(255) NOT NULL,
  `fatherContactNum` varchar(255) NOT NULL,
  `strand` varchar(255) NOT NULL,
  `advisory_class` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `stdnt_strand` varchar(255) NOT NULL,
  `subjectsTaken` varchar(255) NOT NULL,
  `stdnt_section` varchar(255) NOT NULL,
  `stdnt_lrn` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_systemStatus` varchar(255) NOT NULL,
  `access_level` int(11) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Demo Accounts:
-- 1. Admin   (Username: admin,   Password: admin123)
-- 2. Faculty (Username: faculty, Password: faculty123)
-- 3. Student (Username: student, Password: student123)
--
INSERT INTO `users` (`user_id`, `account_id`, `lastName`, `firstName`, `middleName`, `sex`, `bday`, `motherName`, `motherContactNum`, `fatherName`, `fatherContactNum`, `strand`, `advisory_class`, `subject_id`, `email`, `contact_num`, `stdnt_strand`, `subjectsTaken`, `stdnt_section`, `stdnt_lrn`, `username`, `password`, `user_systemStatus`, `access_level`, `date_registered`) VALUES
(1, 'ADMIN01', 'System', 'Administrator', '', 'Male', '1990-01-01', 'N/A', 'N/A', 'N/A', 'N/A', 'ADMIN', 'ADMIN', '', 'admin@example.com', '09123456789', 'ADMIN', '', 'ADMIN', 'ADMIN', 'admin', '$2y$10$RuWldxP8Ht6qtAOoZ6Wy3OeWQvDSYXCTDQf.P.8/S8JaCtyiNJWeS', 'Offline', 1, current_timestamp()),
(2, 'FACULTY01', 'Teacher', 'Jane', '', 'Female', '1985-05-15', 'N/A', 'N/A', 'N/A', 'N/A', 'ICT', '1A', '1', 'faculty@example.com', '09123456788', 'FACULTY', '', 'FACULTY', 'FACULTY', 'faculty', '$2y$10$Q04GWAl2uQCT1YFvBsOy/uc0NHhzUDQxz32xmq.bSxW2Q9Jgs8mbG', 'Offline', 2, current_timestamp()),
(3, '10001', 'Doe', 'John', 'M', 'Male', '2004-01-01', 'Jane Doe', '09123456780', 'Bob Doe', '09123456781', 'STUDENT', 'STUDENT', 'STUDENT', 'johndoe@example.com', '09123456789', 'ICT', '1', '1A', '100000000001', 'student', '$2y$10$KwQIi5Jsd3pd2LWbs40oC.29HZTN39MUcPEMjBY/T8XZ3uBzgyGIC', 'Offline', 0, current_timestamp());

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
