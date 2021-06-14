-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2021 at 04:00 PM
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
(23, 'Klær og sko'),
(25, 'Hodeplagg og accessories'),
(26, 'Trykkeri'),
(27, 'Russekort'),
(28, 'Musikk og DJ'),
(29, 'Dugnad'),
(30, 'Profileringsartikler'),
(31, 'Russebuss/bil'),
(32, 'Grafisk'),
(33, 'Markedsføring'),
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
(1, 'Usama\'s Club', 'Usama Shahid', '03104115426', 'mughalusama1133@gmail.com', 'Shad bagh', '54000', 'Lahore', 'aaaaaaaa', 0),
(5, 'Real Madrid', 'aaaaa', 'llll44', 'aaaa@ssss.cpm', 'wswwwwwwwww', 'wwwww', 'wwww', 'aaaaaaaa', 0),
(6, 'mu', 'aaaaa', 'llll44', 'waleedshahid@rocketmails.com', 'wswwwwwwwww', 'wwwww', 'wwww', 'aaaaaaaaaaa', 0),
(7, 'Real Madrid', 'aaaaa', 'llll44', '03244014942@d.com', 'wswwwwwwwww', 'wwwww', 'wwww', 'zzzzzzzzzzzzz', 0),
(8, 'Real Madrid', 'aaaaa', 'llll44', 'bsef17m035@pucit.edu.pk', 'wswwwwwwwww', 'wwwww', 'Lahore', 'usamashahid', 0),
(9, 'abc12345', 'Usama Shahid', '0300000000', 'usama@d.com', 'aaaaaaaaa aaa a', '54000', 'Lahore', 'aaaaaaaa', 0),
(11, 'Administrator', 'N/A', 'N/A', 'admin@russekjop.com', 'N/A', 'N/A', 'N/A', 'admin@sportsreg123', 1),
(12, 'New club', 'abc', '0310101010', 'musama@gmail.com', 'Lahore', '54000', 'Lahore', 'aaaaaaaa', 0);

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
  `created_on` date NOT NULL DEFAULT current_timestamp(),
  `accepted_on` datetime DEFAULT NULL,
  `filename` varchar(30) DEFAULT NULL,
  `table_name` varchar(40) DEFAULT NULL
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
(168, 'Vi er sikre på at vår tjeneste vil bidra til å redusere verdifull tid for deres klubb eller lag, samtidig som den gir flere bedrifter mulighet til å kjempe om deres bestilling. På denne måte', 'Vi er sikre på at vår tjeneste vil bidra til å redusere verdifull tid for deres klubb eller lag, samtidig som den gir flere bedrifter mulighet til å kjempe om deres bestilling. På denne måten vil den endelige tilbudsprisen skvises til det ytterste, og deres klubb eller lag vil oppleve å spare penger på et planlagt kjøp. \r\n\r\nMen for å gjøre bruken enda mer spennende vil vi hvert kvartal belønne en klubb eller lag som har benyttet vår tjeneste. Den heldige vinneren vil motta produkter eller tjenester plukket ut fra våre partner-bedrifter. \r\n\r\nVinneren vil bli annonsert via våre kanaler, samt kontaktet direkte. \r\n', '60213f677a1be.png', 1, '2021-02-08 18:15:49'),
(171, 'Gode grunner til å bli leverandør', 'Vurderer din bedrift å registrere seg som leverandør hos SportsReg? Da er det ikke mer å vurdere – bare gjør det. Og her skal vi gi deg noen gode grunner til å gjøre akkurat det.\r\n\r\n<b>1. Få tilgang til flere kunder</b>\r\nUndersøkelser viser at 80% av klubber og lag kun innhenter tilbud fra 1-3 tilbydere. Det betyr at det er mange bedrifter og leverandører som ikke får være med på leken. Ved hjelp av SportsReg vil derfor din bedrift få tilgang til flere kunder rett i innboksen.\r\n\r\n<b>2. Kunder i kjøpsmodus</b>\r\nKlubber og lag som benytter SportsReg er ikke bare nysgjerrige, men de er også i kjøpsmodus og har planer om å gjennomføre et kjøp i nær fremtid. Ved å være en del av SportsReg vil din bedrift møte kunder som gis mulighet til å øke deres inntjening.\r\n\r\n<b>3. Økt omsetning og inntjening</b>\r\nVia SportsReg vil din bedrift kunne øke sin omsetning og inntjening ved at dere får direkte tilgang til nye klubb-bestillinger. Bestillinger dere ellers ville gått glipp av. \r\n\r\n<b>4. Kostnadseffektivt</b>\r\nDet finnes utallige markedsmuligheter - noen mer kostnadskrevende enn andre. Å registrere seg for å benytte SportsReg er en utrolig billig investering, og en kostnadseffektiv måte for å tilnærme seg nye kunder og nye salg. \r\n', '602140d335fae.png', 0, '2021-02-08 18:46:59'),
(172, 'Velkommen til SportsReg', 'Velkommen til SportsReg og vår nye tjeneste for klubber, lag og enkeltpersoner. En tjeneste som har som formål å redusere både tid og kostnad knyttet til kjøp i idretten. \r\n\r\nI stedet for å søke opp, undersøke, kontakte og diskutere kjøp med flere leverandører kan du ved hjelp av SportsReg registrere ditt kjøpsønske, og få tilbud fra én eller flere leverandører. På denne måten vil de ulike leverandørene kjempe om nettopp deres bestilling, ved å gi et konkurransedyktig tilbud slik at de vinner salget. Dette kommer ditt lag eller klubb til gode, da leverandørene blir nødt til å skvise sine marginer, og du vil dermed oppleve å spare penger på et planlagt kjøp. \r\n\r\nÅ benytte SportsReg er helt gratis, og det er ingen krav til å gjennomføre et kjøp etter at din forespørsel er registrert. \r\nLes mer om vår tjeneste her:\r\n<a href=\"./FAQ.php\">FAQs</a>\r\n<a href=\"./howitworks.php\">How it works</a>\r\n<a href=\"./terms.php\">Conditions and terms</a>\r\n', '6021416d8a2c6.png', 0, '2021-02-08 18:49:33');

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
  `form_name` varchar(40) NOT NULL DEFAULT 'genericform2.php'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `form_name`) VALUES
(120, 23, 'Russedress', 'filepath.php'),
(121, 23, 'Sko', 'genericform2.php'),
(122, 23, 'Gensere/hettejakker', 'genericform2.php'),
(123, 23, 'Jakker', 'genericform2.php'),
(124, 23, 'T-skjorte', 'genericform2.php'),
(125, 23, 'Singlet', 'genericform2.php'),
(126, 25, 'Ørepropper', 'genericform2.php'),
(127, 25, 'Caps/Bøttehatt', 'genericform2.php'),
(128, 25, 'Russelue', 'genericform2.php'),
(129, 25, 'Hårbånd', 'genericform2.php'),
(130, 26, 'Strykemerker', 'genericform2.php'),
(131, 26, 'Trykk av klær og utstyr', 'genericform2.php'),
(132, 27, 'Russekort', 'genericform2.php'),
(133, 28, 'DJ', 'genericform2.php'),
(134, 28, 'Video', 'genericform2.php'),
(135, 28, 'Russesang', 'genericform2.php'),
(136, 29, 'Salgsdugnad', 'genericform2.php'),
(137, 30, 'Profileringsartikler', 'genericform2.php'),
(138, 31, 'Garasje/Oppbevaring', 'genericform2.php'),
(139, 31, 'Bussbygging', 'genericform2.php'),
(140, 31, 'Bussjåfør', 'genericform2.php'),
(141, 31, 'Graffiti', 'genericform2.php'),
(142, 31, 'Foliering', 'genericform2.php'),
(143, 32, 'Russelogo', 'genericform2.php'),
(144, 32, 'Design', 'genericform2.php'),
(145, 32, 'Banner', 'genericform2.php'),
(146, 32, 'Buss-/bilfoliering', 'genericform2.php'),
(147, 32, 'Graffiti', 'genericform2.php'),
(148, 33, 'Banners', 'genericform2.php'),
(149, 33, 'Klistremerker og stickers', 'genericform2.php'),
(150, 34, 'Aggregat', 'genericform2.php'),
(151, 34, 'Lys', 'genericform2.php'),
(152, 34, 'Musikkanlegg', 'genericform2.php'),
(153, 34, 'Høyttalere og forsterkere', 'genericform2.php');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_categories`
--
ALTER TABLE `business_categories`
  MODIFY `business_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `business_counties`
--
ALTER TABLE `business_counties`
  MODIFY `business_counties_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `business_info`
--
ALTER TABLE `business_info`
  MODIFY `business_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `business_products`
--
ALTER TABLE `business_products`
  MODIFY `business_products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `club_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `club_requests`
--
ALTER TABLE `club_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `offer_messages`
--
ALTER TABLE `offer_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

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
-- Constraints for table `club_requests`
--
ALTER TABLE `club_requests`
  ADD CONSTRAINT `club_id` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`club_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `req_cat` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `req_pro` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offer_messages`
--
ALTER TABLE `offer_messages`
  ADD CONSTRAINT `req_id_fkey` FOREIGN KEY (`request_id`) REFERENCES `club_requests` (`request_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_key` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
