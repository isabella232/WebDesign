-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 05, 2018 at 07:05 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_search_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotel_search`
--

CREATE TABLE `hotel_search` (
  `hotelname` char(30) NOT NULL,
  `detail` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `parking` char(10) NOT NULL,
  `pic_link` char(100) NOT NULL,
  `breakfast` char(10) NOT NULL,
  `location` char(100) NOT NULL,
  `price` float(6,2) DEFAULT NULL,
  `star_ratings` int(11) DEFAULT NULL,
  `address` char(50) NOT NULL,
  `number_of_review` int(11) NOT NULL,
  `review_score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_search`
--

INSERT INTO `hotel_search` (`hotelname`, `detail`, `parking`, `pic_link`, `breakfast`, `location`, `price`, `star_ratings`, `address`, `number_of_review`, `review_score`) VALUES
('Bencoolen Hotel', 'The Bencoolen Street Hotel is a 3-star boutique hotel in the center of Singapore which boasts a fantastic location near the Central Business District, the MRT train network, and the shopping and entertainment facilities in Orchard Road and Prinsep Place.', 'Yes', 'bencoolen.jpg', 'Yes', 'Orchard', 115.00, 3, '50 Nanyang Ave, 639798', 0, 0),
('HolidayInn', 'Situated in the heart of Orchard Road , Singapore\'s premier business and shopping district. The Holiday Inn Singapore Orchard City Centre is only minutes away from Somerset and Dhoby Ghaut MRT (subway) station, with easy access to entertainment and dining spots as well as renowned medical...', 'Yes', 'HolidayInn.jpg', 'Yes', 'Orchard', 233.00, 4, '50 Nanyang Ave, 639798', 0, 0),
('Marina Bay', 'Imagine yourself at the floor-to-ceiling windows of your 5-star hotel room, drinking in magnificent views of Singapore\'s glittering city district or picture-perfect Gardens by the Bay.Or swimming in the world\'s highest and longest infinity pool with its unrivalled panoramic views, a once-in-a-lifetime experience available exclusively to guests of Marina Bay Sands hotel.', 'Yes', 'MarinaBay.jpg', 'Yes', 'Marina', 585.00, 5, '50 Nanyang Ave, 639798', 17, 4.54903),
('PanPacific', 'Our hotels and resorts exist to provide you with trusted places to live, work and play around the world. Places with less to worry about because when you stay with us, rest assured that all will be taken care of.', 'Yes', 'PanPacific.jpg', 'Yes', 'Marina', 486.00, 5, '50 Nanyang Ave, 639798', 0, 0),
('Ritz Carlton', '\0Welcome to a world of unique opportunities and refined tastes. Now everything you have come to appreciate about The Ritz-Carlton will be raised to new heights of increasingly remarkable experiences. Book, earn and redeem across 6,700 hotels. New benefits, one combined program.', 'Yes', 'RitzCarlton.jpg', 'Yes', 'Raffles', 795.00, 5, '50 Nanyang Ave, 639798', 0, 0),
('Hotel Jen', 'Welcoming guests with a beautiful outdoor swimming pool and elegantly furnished rooms, Hotel Jen Orchardgateway Singapore offers direct access to Somerset MRT Station. Guests also enjoy free WiFi access throughout the hotel.Housed in contemporary glass building, the hotel is only 1 km away from the popular ION Orchard Shopping Mall. Singapore\'s Changi International Airport is 17 km away.', 'Yes', 'HotelJen.jpg', 'Yes', 'Orchard', 336.00, 4, '50 Nanyang Ave, 639798', 0, 0),
('Carlton Hotel', '\0A 7-minute walk from the Suntec Convention and Exhibition Centre, this sleek, upscale hotel is a 5-minute walk from Bras Basah metro station, and 13 minutes\' walk from the restaurants and nightlife at Clarke Quay.', 'Yes', 'HotelCarlton.jpg', 'Yes', 'Bras Basah', 310.00, 5, '50 Nanyang Ave, 639798', 0, 0),
('Mandarin Oriental', '\0Shaped like our iconic fan, Mandarin Oriental, Singapore is a five-star luxury hotel in Marina Bay. Only minutes from the central business district and with a choice of fabulous restaurants and fantastic rooms, we are the ultimate urban retreat.', 'Yes', 'MandarinOriental.jpg', 'Yes', 'Marina', 609.00, 4, '50 Nanyang Ave, 639798', 0, 0),
('Swissotel Merchant Hotel', 'Swissotel Merchant Court, Singapore is a luxury hotel ideally located by Clarke Quay, within walking distance of the financial hub of Raffles Place, and close to major places of interest including Chinatown, and the numerous bars and restaurants on the famous Clarke Quay and Boat Quay.', 'Yes', 'SwissotelMerchantHotel.jpg', 'Yes', 'Clarke Quay', 239.00, 4, '50 Nanyang Ave, 639798', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review` text NOT NULL,
  `cleanliness` int(11) NOT NULL,
  `comfort` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `overall` float NOT NULL,
  `booking_id` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review`, `cleanliness`, `comfort`, `location`, `overall`, `booking_id`) VALUES
('23r', 5, 4, 5, 4.66667, ''),
('23r', 5, 4, 5, 4.66667, 'f0e66e'),
('', 5, 5, 5, 5, 'f0e66e'),
('', 5, 5, 5, 5, 'f0e66e'),
('', 5, 5, 5, 5, 'f0e66e'),
('3r23r', 5, 4, 5, 4.66667, 'f0e66e'),
('uhuu', 5, 5, 4, 4.66667, 'f0e66e'),
('nice hotel', 4, 5, 4, 4.33333, '69983b'),
(' very old', 4, 5, 5, 4.66667, '157cac'),
('eqwfef', 5, 5, 4, 4.66667, '69983b'),
('eqwfef', 5, 5, 4, 4.66667, '69983b'),
('eqwfef', 5, 5, 4, 4.66667, '69983b'),
('eqwfef', 5, 5, 4, 4.66667, '69983b'),
('ewfefw', 5, 5, 4, 4.66667, '69983b'),
('ewfefw', 5, 5, 4, 4.66667, '69983b'),
('ewfefw', 5, 5, 4, 4.66667, '69983b'),
('2df2', 4, 5, 4, 4.33333, '69983b'),
('2f4f2f', 3, 5, 4, 4, '69983b'),
('trtwr', 4, 4, 5, 4.33333, '59d085'),
('3wff', 5, 4, 5, 4.66667, '9a0c98'),
('fewfeef', 5, 4, 5, 4.66667, '492083'),
('Very good', 4, 5, 4, 4.33333, '65c420'),
('good', 4, 5, 5, 4.66667, '5efb08');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `hotel` char(30) NOT NULL,
  `room_type` char(10) NOT NULL,
  `price` int(11) NOT NULL,
  `availability` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`hotel`, `room_type`, `price`, `availability`) VALUES
('Marina Bay', 'Single', 585, 5),
('Marina Bay', 'Double', 1098, 5),
('Bencoolen Hotel', 'Single', 115, 5),
('Bencoolen Hotel', 'Double', 200, 5),
('HolidayInn', 'Single', 233, 5),
('HolidayInn', 'Double', 400, 5),
('PanPacific', 'Single', 486, 5),
('PanPacific', 'Double', 950, 5),
('Ritz Carlton', 'Single', 795, 5),
('Ritz Carlton', 'Double', 1430, 5),
('Hotel Jen', 'Single', 336, 5),
('Hotel Jen', 'Double', 647, 5),
('Carlton Hotel', 'Single', 310, 5),
('Carlton Hotel', 'Double', 576, 5),
('Mandarin Oriental', 'Single', 609, 5),
('Mandarin Oriental', 'Double', 1189, 5),
('Swissotel Merchant Hotel', 'Single', 239, 5),
('Swissotel Merchant Hotel', 'Double', 451, 5);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `username` char(30) NOT NULL,
  `hotel` char(30) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `people` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `id` char(50) NOT NULL,
  `single_price` int(11) NOT NULL,
  `double_price` int(11) NOT NULL,
  `single_cnt` int(11) NOT NULL,
  `double_cnt` int(11) NOT NULL,
  `reviewed` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`username`, `hotel`, `check_in`, `check_out`, `people`, `total_price`, `id`, `single_price`, `double_price`, `single_cnt`, `double_cnt`, `reviewed`) VALUES
('user 1', 'Marina Bay', '2018-10-12', '2018-11-02', 2, 1000, '59d085', 115, 200, 0, 1, 1),
('user 1', 'Marina Bay', '2018-10-12', '2018-11-02', 2, 1000, '9a0c98', 115, 200, 0, 1, 1),
('user 1', 'Marina Bay', '2018-10-24', '2018-11-14', 2, 1000, '492083', 115, 200, 0, 1, 1),
('user 1', 'Marina Bay', '2018-11-04', '2018-11-05', 2, 200, '65c420', 115, 200, 0, 1, 1),
('user 1', 'Marina Bay', '2018-11-04', '2018-11-05', 2, 200, '5efb08', 115, 115, 0, 1, 1),
('user 1', 'Marina Bay', '2018-11-04', '2018-11-06', 2, 400, '6d28dd', 115, 200, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` char(20) NOT NULL,
  `email` char(30) NOT NULL,
  `password` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`) VALUES
('user 1', '1@a.com', '0cc175b9c0f1b6a831c399e269772661'),
('user 2', '1@a.com', '92eb5ffee6ae2fec3ad71c777531578f'),
('user 2', '2@a.com', '0cc175b9c0f1b6a831c399e269772661'),
('user 3', '3@a.com', '0cc175b9c0f1b6a831c399e269772661'),
('user 4', '4@a.com', 'c4ca4238a0b923820dcc509a6f75849b');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
