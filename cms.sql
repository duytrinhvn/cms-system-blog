-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2019 at 04:09 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Electronic'),
(2, 'Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 1, 'Jeffrey Duy Trinh', 'kibin.kid@gmail.com', 'Bose is the best', 'approved', '2018-08-01'),
(2, 1, 'Jeffrey Duy Trinh', 'kibin.kid@gmail.com', 'Bose is the best', 'unapproved', '2018-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_cat` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` varchar(255) NOT NULL,
  `post_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_cat`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 1, 'Top 10 best headphone 2018', 'Duy Trinh', '', '2018-06-12', 'headphone.jpg', '   This is content of the blogggggggggggggggggggggg   ', 'headphone, electronic', '2', ''),
(4, 1, 'Iphone X released', 'Duy Trinh', '', '2018-07-11', 'iphonex.jpg', '                    This is new contentttttt                   ', 'electronic, iphonex, released', '0', 'public'),
(7, 2, 'Top 10 Office Desks', 'Jeffrey ', '', '2018-07-16', 'desk.jpg', '  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tincidunt mattis neque, quis condimentum quam ullamcorper sit amet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et tortor in erat congue auctor ut rhoncus enim. Morbi sodales, odio sit amet rutrum dictum, mauris augue lobortis ligula, sed efficitur tellus justo nec nisl. Nam quis ante ultricies, tempus elit eu, hendrerit dolor. Curabitur tempor arcu ut odio volutpat, vitae ullamcorper ipsum dignissim. Aenean nec mauris libero. Morbi porttitor volutpat massa.\r\n&lt;br&gt;\r\nUt purus neque, suscipit vel cursus at, mollis eget turpis. Maecenas interdum, lectus sit amet cursus tempus, lorem justo cursus ligula, eget faucibus felis nisl a velit. Vestibulum cursus molestie sapien et viverra. Proin at vestibulum velit, eu tempor augue. Curabitur sed cursus elit. Vestibulum non malesuada leo. Nunc consectetur condimentum placerat.\r\n\r\nNam nulla velit, ornare ac urna at, consectetur rutrum libero. Nunc sit amet ante ex. Nunc et metus sit amet elit mattis euismod laoreet nec dolor. Phasellus congue eget neque vitae vestibulum. Morbi mi metus, bibendum ut sagittis id, viverra et lacus. Proin et vehicula mauris. Aliquam nibh tellus, laoreet sed ante vitae, lobortis interdum neque. Pellentesque mollis, lectus at rutrum porta, sem neque mollis massa, ultricies maximus neque neque id quam. Etiam fringilla pulvinar felis, vel gravida massa. Mauris rhoncus tellus non justo eleifend, vel cursus dui consequat. Phasellus pharetra ante ut enim aliquet vehicula. Suspendisse luctus luctus sem, in consectetur ligula. In nec diam commodo, eleifend lorem ac, lobortis nibh. Pellentesque efficitur augue nec quam pharetra mollis.\r\n\r\nNullam fringilla sem mauris, ac lacinia lorem sagittis nec. Fusce finibus aliquet tortor, eu mattis quam lobortis et. Praesent lobortis mi dolor. Donec tincidunt justo et lacinia condimentum. Nulla facilisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In orci libero, viverra ut nulla a, ornare posuere sem. Sed porttitor rutrum nulla, dapibus ultricies erat tempor elementum. Nulla consequat at mi ac euismod. Praesent elementum nibh eget metus pellentesque commodo. Aliquam ut eros sit amet ligula facilisis volutpat. Nunc accumsan enim vehicula mi malesuada faucibus.\r\n\r\nPraesent libero nisl, pellentesque quis risus et, facilisis vulputate mauris. Integer quis venenatis lectus, vel semper justo. Nam molestie fringilla sagittis. Sed nec purus sed ante luctus faucibus. Nullam luctus a nibh eu dapibus. Sed mollis, ex nec bibendum dapibus, turpis dolor egestas velit, in eleifend neque diam non lorem. Vivamus tincidunt, lorem quis auctor feugiat, mi elit elementum lorem, in posuere ipsum quam sit amet lorem. Fusce rhoncus lacus eget lorem vulputate, sit amet rutrum dui varius. Quisque odio odio, viverra ut lacus non, ullamcorper accumsan odio.     ', 'desk, furniture, office, top 10', '0', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `randSalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `user_date`, `randSalt`) VALUES
(1, 'khacduy97', 'duyduyy', 'Trinh', 'Duy', 'khacduy97@gmail.com', '', 'admin', '2018-08-05 20:36:14', ''),
(2, 'dudu123', '123456', 'Jeffrey ', 'Trinh', 'kibin.kid@gmail.com', '', 'user', '2018-08-09 04:08:56', ''),
(4, 'khacduy', '123455', 'Khac', 'Duy', 'kibin.kid@gmail.comm', '', 'admin', '2018-08-09 04:10:51', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
