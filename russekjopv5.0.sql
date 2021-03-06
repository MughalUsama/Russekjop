-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2021 at 03:52 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `russekjop`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_categories`
--

CREATE TABLE `business_categories` (
  `business_category_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `business_counties`
--

CREATE TABLE `business_counties` (
  `business_counties_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `county_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `business_info`
--

CREATE TABLE `business_info` (
  `business_id` int(11) NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `vat` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `business_email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `logo_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `business_products`
--

CREATE TABLE `business_products` (
  `business_products_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `business_subproducts`
--

CREATE TABLE `business_subproducts` (
  `business_subproducts_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `subproduct_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(23, 'Kl??r og sko'),
(25, 'Hodeplagg og accessories'),
(26, 'Trykkeri'),
(27, 'Russekort'),
(28, 'Musikk og DJ'),
(29, 'Dugnad'),
(30, 'Profileringsartikler'),
(31, 'Russebuss/bil'),
(32, 'Grafisk'),
(33, 'Markedsf??ring'),
(34, 'Lyd & lys');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `club_id` int(11) NOT NULL,
  `club_name` varchar(50) NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL COMMENT 'username',
  `address` varchar(50) NOT NULL,
  `post_code` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `isadmin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`club_id`, `club_name`, `contact_person`, `telephone`, `email`, `address`, `post_code`, `city`, `password`, `isadmin`) VALUES
(18, 'Admin', 'Admin', '', 'admin@russekjop.com', '', '', '', 'admin@russekjop123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `club_requests`
--

CREATE TABLE `club_requests` (
  `request_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `size` varchar(30) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `accepted_by` int(11) DEFAULT NULL COMMENT 'business_id',
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `accepted_on` datetime DEFAULT NULL,
  `filename` varchar(30) DEFAULT NULL,
  `table_name` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contactus_id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Email` text NOT NULL,
  `Telefon` text NOT NULL,
  `Message` text DEFAULT NULL,
  `sent` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contactus_id`, `Name`, `Email`, `Telephone`, `Message`, `sent`) VALUES
(2, 'Usama', 'mughalusama1133@gmail.com', '2392198', 'testing', 1),
(3, 'Usama', 'mughalusama1133@gmail.com', '2392198', 'kfnkln', 1),
(4, 'Usama', 'mughalusama1133@gmail.com', '2392198', 'kfnkln', 1),
(5, 'Usama', 'mughalusama1133@gmail.com', '2392198', 'djabkab', 1),
(6, 'Usama', 'mughalusama1133@gmail.com', '2392198', 'djabkab', 1),
(7, 'Usama', 'mughalusama1133@gmail.com', '2392198', 'jbkewbf', 1),
(8, 'Usama', 'mughalusama1133@gmail.com', '2392198', 'jbkewbf', 1),
(9, 'Usama', 'mughalusama1133@gmail.com', '2392198', 'jbkewbf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail1`
--

CREATE TABLE `detail1` (
  `request_id` int(20) NOT NULL,
  `Print` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail1`
--

INSERT INTO `detail1` (`request_id`, `Print`) VALUES
(124, 'No'),
(126, 'Yes'),
(129, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `detail3`
--

CREATE TABLE `detail3` (
  `request_id` int(20) NOT NULL,
  `Number_of_People` int(20) NOT NULL,
  `Number_of_Products_per_Person` int(20) NOT NULL,
  `Number_of_Sales_Round` int(20) NOT NULL,
  `Toilet_Paper` text NOT NULL,
  `Paper_Towels` text NOT NULL,
  `Socks` text NOT NULL,
  `Lighter_Briquettes` text NOT NULL,
  `Cleaning_Products` text NOT NULL,
  `Cookies_and_Goodies` text NOT NULL,
  `Greeting_Card_Or_Christmas_Card` text NOT NULL,
  `Cured_Meat_and_Meat_Products` text NOT NULL,
  `Other` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail4`
--

CREATE TABLE `detail4` (
  `request_id` int(20) NOT NULL,
  `Number_of_Total_Russekort` int(20) NOT NULL,
  `Number_of_Different_Russekort` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail6`
--

CREATE TABLE `detail6` (
  `request_id` int(20) NOT NULL,
  `From_Date` text NOT NULL,
  `To_Date` text NOT NULL,
  `Price_For_Assignment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_headline` varchar(200) DEFAULT NULL,
  `news_description` text NOT NULL,
  `image_name` varchar(90) DEFAULT NULL,
  `top_news` int(11) NOT NULL DEFAULT 0 COMMENT '1 for yes',
  `posted_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_headline`, `news_description`, `image_name`, `top_news`, `posted_on`) VALUES
(3, 'First news', 'Testing', '60ce18aa81a34.jpeg', 0, '2021-06-19 09:17:46'),
(4, 'Vinn premier', 'Alle som benytter v??r tjeneste er med i trekningen av en premie fra en av v??re leverand??rer. ', '60d6220db1972.jpg', 1, '2021-06-25 11:35:57'),
(5, 'Festaften', 'Det er en fin dag for betaling av skatt. ', '60d6223a1327e.jpg', 0, '2021-06-25 11:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `offer_messages`
--

CREATE TABLE `offer_messages` (
  `message_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `request_id` int(11) NOT NULL,
  `sentby` int(11) NOT NULL COMMENT '0 for club, 1 for business',
  `status` int(11) NOT NULL DEFAULT 0,
  `is_seen` int(11) NOT NULL DEFAULT 0 COMMENT 'O for unseen,1 for seen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `form_name` varchar(40) NOT NULL DEFAULT './forms/genericform.php',
  `has_subproduct` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `form_name`, `has_subproduct`) VALUES
(120, 23, 'Russedress', './forms/clothes_and_shoes/russedress.php', 0),
(121, 23, 'Sko', './forms/clothes_and_shoes/shoes.php', 0),
(122, 23, 'Gensere/hettejakker', './forms/clothes_and_shoes/sweater.php', 0),
(123, 23, 'Jakker', './forms/clothes_and_shoes/jacket.php', 0),
(124, 23, 'T-skjorte', './forms/clothes_and_shoes/t_shirt.php', 0),
(125, 23, 'Singlet', './forms/clothes_and_shoes/singlet.php', 0),
(126, 25, '??repropper', './forms/hodeplagg_og/Orepropper.php', 0),
(127, 25, 'Caps/B??ttehatt', './forms/hodeplagg_og/caps.php', 0),
(128, 25, 'Russelue', './forms/hodeplagg_og/Russelue.php', 0),
(129, 25, 'H??rb??nd', './forms/hodeplagg_og/Harband.php', 0),
(130, 26, 'Strykemerker', './forms/Trykkeri/strykemerker.php', 0),
(131, 26, 'Trykk av kl??r og utstyr', './forms/Trykkeri/trykk_pa_klaer.php', 0),
(132, 27, 'Russekort', './forms/russekort/Russekort.php', 0),
(133, 28, 'DJ', './forms/musikk_og _video/DJ.php', 0),
(134, 28, 'Video', './forms/musikk_og _video/video.php', 0),
(135, 28, 'Russesang', './forms/musikk_og _video/russesang.php', 0),
(136, 29, 'Salgsdugnad', './forms/Dugnad/Salgsdugnad.php', 1),
(137, 30, 'Profileringsartikler', './forms/profilering/profileringsart.php', 0),
(138, 31, 'Garasje/Oppbevaring', './forms/Russebuss_bil/garasje_oppbev.php', 0),
(139, 31, 'Bussbygging', './forms/Russebuss_bil/bussbygging.php', 0),
(140, 31, 'Bussj??f??r', './forms/Russebuss_bil/bussjafor.php', 0),
(141, 31, 'Graffiti', './forms/Russebuss_bil/graffiti.php', 0),
(142, 31, 'Foliering', './forms/Russebuss_bil/foliering.php', 0),
(143, 32, 'Russelogo', './forms/Grafisk/logo.php', 0),
(144, 32, 'Design', './forms/Grafisk/design.php', 0),
(145, 32, 'Banner', './forms/Grafisk/Banner.php', 0),
(146, 32, 'Buss-/bilfoliering', './forms/Grafisk/Buss_bilfoliering.php', 0),
(147, 32, 'Graffiti', './forms/Grafisk/graffiti.php', 0),
(148, 33, 'Banners', './forms/markedsforing/Banners.php', 0),
(149, 33, 'Klistremerker og stickers', './forms/markedsforing/Klistremerker.php', 0),
(150, 34, 'Aggregat', './forms/lyd_og_lys/Aggregat.php', 0),
(151, 34, 'Lys', './forms/lyd_og_lys/Lys.php', 0),
(152, 34, 'Musikkanlegg', './forms/lyd_og_lys/musikkanlegg.php', 0),
(153, 34, 'H??yttalere og forsterkere', './forms/lyd_og_lys/hoyttalere_og.php', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subproducts`
--

CREATE TABLE `subproducts` (
  `subproduct_id` int(11) NOT NULL,
  `subproduct_name` text NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT 136
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subproducts`
--

INSERT INTO `subproducts` (`subproduct_id`, `subproduct_name`, `product_id`) VALUES
(1, 'Toiletpaper', 136),
(2, 'Paper towels', 136),
(3, 'Socks', 136),
(4, 'Lighter briquettes', 136),
(5, 'Cleaning products', 136),
(6, 'Cookies and Goodies', 136),
(7, 'Greeting card/Christmas card', 136),
(8, 'Cured meat & meat products', 136);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_categories`
--
ALTER TABLE `business_categories`
  ADD PRIMARY KEY (`business_category_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `c_id` (`business_id`);

--
-- Indexes for table `business_counties`
--
ALTER TABLE `business_counties`
  ADD PRIMARY KEY (`business_counties_id`),
  ADD KEY `b_id1` (`business_id`);

--
-- Indexes for table `business_info`
--
ALTER TABLE `business_info`
  ADD PRIMARY KEY (`business_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `business_products`
--
ALTER TABLE `business_products`
  ADD PRIMARY KEY (`business_products_id`),
  ADD KEY `b_id2` (`business_id`),
  ADD KEY `bp_id0` (`product_id`),
  ADD KEY `bc_id` (`category_id`);

--
-- Indexes for table `business_subproducts`
--
ALTER TABLE `business_subproducts`
  ADD PRIMARY KEY (`business_subproducts_id`),
  ADD KEY `abc1s` (`business_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`club_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `club_requests`
--
ALTER TABLE `club_requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `req_cat` (`category_id`),
  ADD KEY `req_pro` (`product_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contactus_id`);

--
-- Indexes for table `detail1`
--
ALTER TABLE `detail1`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `detail3`
--
ALTER TABLE `detail3`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `detail4`
--
ALTER TABLE `detail4`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `detail6`
--
ALTER TABLE `detail6`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `offer_messages`
--
ALTER TABLE `offer_messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `req_id_fkey` (`request_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `category_id` (`category_id`,`product_name`);

--
-- Indexes for table `subproducts`
--
ALTER TABLE `subproducts`
  ADD PRIMARY KEY (`subproduct_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_categories`
--
ALTER TABLE `business_categories`
  MODIFY `business_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `business_counties`
--
ALTER TABLE `business_counties`
  MODIFY `business_counties_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `business_info`
--
ALTER TABLE `business_info`
  MODIFY `business_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `business_products`
--
ALTER TABLE `business_products`
  MODIFY `business_products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- AUTO_INCREMENT for table `business_subproducts`
--
ALTER TABLE `business_subproducts`
  MODIFY `business_subproducts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `club_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `club_requests`
--
ALTER TABLE `club_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contactus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `offer_messages`
--
ALTER TABLE `offer_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `subproducts`
--
ALTER TABLE `subproducts`
  MODIFY `subproduct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business_categories`
--
ALTER TABLE `business_categories`
  ADD CONSTRAINT `b_cat` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `b_id` FOREIGN KEY (`business_id`) REFERENCES `business_info` (`business_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c_id` FOREIGN KEY (`business_id`) REFERENCES `business_info` (`business_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `business_counties`
--
ALTER TABLE `business_counties`
  ADD CONSTRAINT `b_id1` FOREIGN KEY (`business_id`) REFERENCES `business_info` (`business_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `business_products`
--
ALTER TABLE `business_products`
  ADD CONSTRAINT `b_id2` FOREIGN KEY (`business_id`) REFERENCES `business_info` (`business_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bc_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bp_id0` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `business_subproducts`
--
ALTER TABLE `business_subproducts`
  ADD CONSTRAINT `abc1s` FOREIGN KEY (`business_id`) REFERENCES `business_info` (`business_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `club_requests`
--
ALTER TABLE `club_requests`
  ADD CONSTRAINT `club_id` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`club_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `req_cat` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `req_pro` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
