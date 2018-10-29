-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2018 at 12:13 PM
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
-- Database: `user_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotel_search`
--

CREATE TABLE `hotel_search` (
  `hotelname` char(30) NOT NULL,
  `detail` text NOT NULL,
  `parking` char(10) NOT NULL,
  `pic_link` char(100) NOT NULL,
  `breakfast` char(10) NOT NULL,
  `location` char(100) NOT NULL,
  `price` float(6,2) DEFAULT NULL,
  `star_ratings` int(11) DEFAULT NULL,
  `rooms_available` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_search`
--

INSERT INTO `hotel_search` (`hotelname`, `detail`, `parking`, `pic_link`, `breakfast`, `location`, `price`, `star_ratings`, `rooms_available`) VALUES
('Bencoolen Hotel', 'The Bencoolen Street Hotel is a 3-star boutique hotel in the center of Singapore which boasts a fantastic location near the Central Business District, the MRT train network, and the shopping and entertainment facilities in Orchard Road and Prinsep Place.', 'Yes', 'bencoolen.jpg', 'Yes', 'Orchard', 115.00, 3, 100),
('HolidayInn', 'Situated in the heart of Orchard Road , Singapore’s premier business and shopping district. The Holiday Inn® Singapore Orchard City Centre is only minutes away from Somerset and Dhoby Ghaut MRT (subway) station, with easy access to entertainment and dining spots as well as renowned medical...', 'Yes', 'HolidayInn.jpg', 'Yes', 'Orchard', 233.00, 4, 100),
('Marina Bay', 'Imagine yourself at the floor-to-ceiling windows of your 5-star hotel room, drinking in magnificent views of Singapore’s glittering city district or picture-perfect Gardens by the Bay.Or swimming in the world’s highest and longest infinity pool with its unrivalled panoramic views – a once-in-a-lifetime experience available exclusively to guests of Marina Bay Sands hotel.', 'Yes', 'MarinaBay.jpg', 'Yes', 'Marina', 585.00, 5, 100),
('PanPacific', 'Our hotels and resorts exist to provide you with trusted places to live, work and play around the world. Places with less to worry about because when you stay with us, rest assured that all will be taken care of.', 'Yes', 'PanPacific.jpg', 'Yes', 'Marina', 486.00, 5, 100),
('Ritz Carlton', 'Welcome to a world of unique opportunities and refined tastes. Now everything you have come to appreciate about The Ritz-Carlton will be raised to new heights of increasingly remarkable experiences. Book, earn and redeem across 6,700 hotels. New benefits, one combined program.', 'Yes', 'RitzCarlton.jpg', 'Yes', 'Raffles', 795.00, 5, 100),
('Hotel Jen', 'Welcoming guests with a beautiful outdoor swimming pool and elegantly furnished rooms, Hotel Jen Orchardgateway Singapore offers direct access to Somerset MRT Station. Guests also enjoy free WiFi access throughout the hotel.Housed in contemporary glass building, the hotel is only 1 km away from the popular ION Orchard Shopping Mall. Singapore’s Changi International Airport is 17 km away.', 'Yes', 'HotelJen.jpg', 'Yes', 'Orchard', 336.00, 4, 100),
('Carlton Hotel', 'A 7-minute walk from the Suntec Convention and Exhibition Centre, this sleek, upscale hotel is a 5-minute walk from Bras Basah metro station, and 13 minutes\' walk from the restaurants and nightlife at Clarke Quay.', 'Yes', 'HotelCarlton.jpg', 'Yes', 'Bras Basah', 310.00, 5, 100),
('Mandarin Oriental', 'Shaped like our iconic fan, Mandarin Oriental, Singapore is a five-star luxury hotel in Marina Bay. Only minutes from the central business district and with a choice of fabulous restaurants and fantastic rooms, we are the ultimate urban retreat.', 'Yes', 'MandarinOriental.jpg', 'Yes', 'Marina', 609.00, 4, 100),
('Swissotel Merchant Hotel', 'Swissotel Merchant Court, Singapore is a luxury hotel ideally located by Clarke Quay, within walking distance of the financial hub of Raffles Place, and close to major places of interest including Chinatown, and the numerous bars and restaurants on the famous Clarke Quay and Boat Quay.', 'Yes', 'SwissotelMerchantHotel.jpg', 'Yes', 'Clarke Quay', 239.00, 4, 100);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
