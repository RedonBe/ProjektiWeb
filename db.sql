-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2020 at 11:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` longtext NOT NULL,
  `Image` varchar(100) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Titulli2` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`ID`, `Name`, `Description`, `Image`, `User_id`, `Titulli2`) VALUES
(1, 'Spain', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum accusantium modi aperiam! Repellendus nesciunt blanditiis dolorem? Architecto libero sit, voluptatibus quod, commodi totam iste cumque, quaerat exercitationem ullam ipsam. Maxime.', 'imgs/Spain-1000x400.jpg', 1, 'Spain');

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--

CREATE TABLE `contactform` (
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactform`
--

INSERT INTO `contactform` (`Name`, `Email`, `Message`) VALUES
('Redon', 'Redonbegu1@gmail.com', 'Contact form test');


-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `ID` int(20) NOT NULL,
  `course_name` varchar(55) NOT NULL,
  `course_description` varchar(255) NOT NULL,
  `course_img` varchar(100) NOT NULL,
  `course_price` float DEFAULT NULL,
  `course_learners` varchar(10) DEFAULT NULL,
  `course_lessons` int(20) DEFAULT NULL,
  `course_quizzes` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`ID`, `course_name`, `course_description`, `course_img`, `course_price`, `course_learners`, `course_lessons`, `course_quizzes`) VALUES
(1, 'Python 3 Course', 'Learn Python for free with this interactive course, and get a handle on the most popular programming language in the entire world', 'imgs/1073.png', 99, '6,564,733', 92, 275),
(2, 'C++ Course', 'Learn C++ in a greatly improved learning environment with more lessons, real practice opportunity, and community support all the time', 'imgs/1051.png', 63, '5,783,518', 80, 324),
(3, 'Java Course', 'Utilize our Java Course to learn the basics of the popular language, including Java objects, in this introductory course with comprehensive teaching', 'imgs/1068.png', 78, '4,485,536', 65, 140),
(4, 'JavaScript Course', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, ex fuga nobis nihil iure necessitatibus iusto sunt accus', 'imgs/1024.png', 55, '2,933,732', 61, 177),
(5, 'C# Course', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit dolorum fugit esse aspernatur similique dolore amet ni', 'imgs/1080.png', 74, '1,993,739', 72, 211),
(6, 'C Course', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur reprehenderit consectetur eius sunt minus ab tempori', 'imgs/1089.png', 86, '615,952', 46, 150),
(7, 'SQL Fundamentals', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim facilis suscipit inventore culpa libero explicabo neque od', 'imgs/1060.png', 88, '2,105,232', 37, 104),
(8, 'HTML Fundamentals', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam dolor corrupti eligendi soluta natus! Sunt esse offic', 'imgs/1014.png', 91, '6,934,161', 44, 125),
(9, 'PHP Course', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nisi fugit magnam nesciunt beatae similique velit quide', 'imgs/1059.png', 75, '1,644,520', 51, 117),
(10, 'CSS Fundamentals', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure maiores molestias nisi quam numquam repudiandae, consecte', 'imgs/1023.png', 99, '1,558,332', 76, 193),
(11, 'Ruby Course', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime quod magnam saepe exercitationem aliquid blanditiis prae', 'imgs/1081.png', 67, '516,632', 57, 172),
(12, 'jQuery Course', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta omnis neque expedita fugit minima libero, natus nam enim', 'imgs/1082.png', 70, '510,051', 26, 75),
(13, 'Swift 4 Fundamentals', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus iusto officiis perferendis temporibus corporis,', 'imgs/1075.png', 83, '542,117', 53, 165);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Name`, `Email`, `Password`, `isAdmin`) VALUES
(1, 'Redon', 'Redonbegu1@gmail.com', 'Test123#@!', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `index` (`User_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=463;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
