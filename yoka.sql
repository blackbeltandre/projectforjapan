-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2018 at 11:19 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yoka`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(4) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level_login` int(2) NOT NULL,
  `status` int(2) NOT NULL,
  `foto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `nama`, `username`, `password`, `level_login`, `status`, `foto`) VALUES
(1, 'Andre', 'andre', 'andre', 1, 1, 0x616e6472652e6a7067),
(2, 'Admin', 'admin', 'admin', 1, 1, 0x7475785f696e5f616e64726f69645f726f626f745f636f7374756d655f325f62795f7768696464656e2d64336171396b302e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id_article` int(4) NOT NULL,
  `id_category` int(4) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` longtext NOT NULL,
  `foto` varchar(225) NOT NULL,
  `author` varchar(225) NOT NULL,
  `date_post` date NOT NULL,
  `status` int(2) NOT NULL,
  `counter` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id_article`, `id_category`, `title`, `description`, `foto`, `author`, `date_post`, `status`, `counter`) VALUES
(4, 7, 'ADVERTISER', '<p>Anda pemilik produk yang tertarik untuk berpromosi secara optimal dengan biaya yang efisien, silahkan klik disini.</p>\r\n', 'adver-image1.jpg', 'Admin', '2018-01-03', 1, 1),
(5, 6, 'PUBLISHER', '<p>Anda yang memiliki blog/website dan tertarik memasang iklan untuk mendapatkan penghasilan, silahkan klik disini.</p>\r\n', 'publish-image1.jpg', 'Admin', '2018-01-03', 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(4) NOT NULL,
  `category` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category`) VALUES
(6, 'PUBLISHER'),
(7, 'ADVERTISER');

-- --------------------------------------------------------

--
-- Table structure for table `category_gallery`
--

CREATE TABLE `category_gallery` (
  `id_category_gallery` int(4) NOT NULL,
  `category` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_gallery`
--

INSERT INTO `category_gallery` (`id_category_gallery`, `category`) VALUES
(4, 'Video');

-- --------------------------------------------------------

--
-- Table structure for table `category_portfolio`
--

CREATE TABLE `category_portfolio` (
  `id_category_portfolio` int(4) NOT NULL,
  `category` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_portfolio`
--

INSERT INTO `category_portfolio` (`id_category_portfolio`, `category`) VALUES
(6, 'PARTNER KAMI');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id_faq` int(4) NOT NULL,
  `id_article` int(4) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `message` longtext NOT NULL,
  `date_sent` date NOT NULL,
  `author` varchar(225) NOT NULL,
  `message_replay` longtext NOT NULL,
  `status` int(2) NOT NULL,
  `date_replay` date NOT NULL,
  `id` int(4) NOT NULL,
  `id_gallery` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id_faq`, `id_article`, `name`, `email`, `message`, `date_sent`, `author`, `message_replay`, `status`, `date_replay`, `id`, `id_gallery`) VALUES
(4, 0, 'Andre', 'developerpdak@yahoo.com', 'I just wanna test this page ,my script is ready right now.\r\nOk ,enjoy it your website yustin.', '2015-11-13', 'Yustin Arlette', '<p>Thankyou andre.<br />\r\nGod bless you.</p>\r\n', 1, '2015-11-13', 0, 5),
(5, 18, 'Andre', 'admin@gmail.com', 'Yustin semoga kamu berhasil yaa amin :)', '2015-11-14', 'Yustin Arlette', '<p>Amin ,terimakasi ya andre. :)</p>\r\n', 1, '2015-11-14', 0, 0),
(6, 0, 'Altrusia', 'al@gmail.com', 'hy', '2018-01-03', '', '', 1, '2018-01-03', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(4) NOT NULL,
  `id_category_gallery` int(4) NOT NULL,
  `title` varchar(225) NOT NULL,
  `date_post` date NOT NULL,
  `status` int(2) NOT NULL,
  `counter` int(4) NOT NULL,
  `author` varchar(225) NOT NULL,
  `description` longtext NOT NULL,
  `file` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `id_category_gallery`, `title`, `date_post`, `status`, `counter`, `author`, `description`, `file`) VALUES
(4, 4, 'APA ITU ACCESSTRADE ?', '2003-01-18', 1, 0, 'Andre', '<h2>&nbsp;</h2>\r\n\r\n<p class="medium wow animated fadeInRight animated" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInRight;">ACCESSTRADE adalah platform afiliasi asal Jepang yang sudah hadir di Indonesia sejak tahun 2013.<br />\r\nFungsinya ACCESSTRADE adalah sebagai penghubung antara pemasang iklan dengan pemilik website yang ingin memasang iklan di web/blog nya.</p>\r\n\r\n<p class="medium wow animated fadeInLeft animated" data-wow-delay="0.9s" style="visibility: visible; animation-delay: 0.9s; animation-name: fadeInLeft;">ACCESSTRADE memberikan komisi kepada pemilik website dari setiap transaksi yang terjadi.</p>\r\n', 'ACCESS_TRADE_Introduction.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(8) NOT NULL,
  `browser` varchar(225) NOT NULL,
  `platform` varchar(225) NOT NULL,
  `ip` varchar(225) NOT NULL,
  `get_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `browser`, `platform`, `ip`, `get_date`, `count`) VALUES
(3, 'Firefox 57.0', 'Windows 10', '::1', '2018-01-07 06:48:10', 1),
(4, 'Firefox 57.0', 'Windows 10', '::1', '2018-01-07 06:50:10', 1),
(5, 'Firefox 57.0', 'Windows 10', '::1', '2018-01-07 06:51:36', 1),
(6, 'Chrome 63.0.3239.132', 'Windows 10', '::1', '2018-01-07 07:02:32', 1),
(7, 'Opera 49.0.2725.64', 'Windows 10', '::1', '2018-01-07 07:02:39', 1),
(8, 'Chrome 63.0.3239.132', 'Windows 10', '::1', '2018-01-07 07:02:48', 1),
(9, 'Opera 49.0.2725.64', 'Windows 10', '::1', '2018-01-07 07:03:14', 1),
(10, 'Opera 49.0.2725.64', 'Windows 10', '::1', '2018-01-07 07:03:16', 1),
(11, 'Firefox 57.0', 'Windows 10', '::1', '2018-01-07 07:14:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id_page` int(4) NOT NULL,
  `page` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id_page`, `page`) VALUES
(14, 'AKURAT'),
(15, 'INOVATIF'),
(16, 'EFISIEN');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(4) NOT NULL,
  `id_page` int(4) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` longtext NOT NULL,
  `date_post` date NOT NULL,
  `foto` varchar(225) NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `id_page`, `title`, `description`, `date_post`, `foto`, `counter`) VALUES
(25, 14, 'AKURAT', '<p>Sistem ACCESSTRADE memberikan pencatatan yang detail dan akurat dari setiap jumlah kunjungan, jumlah klik sampai jumlah transaksi yang terjadi. Catatan ini bisa di dilihat perbulan atau perhari.</p>\r\n', '2018-01-03', '', 0),
(26, 15, 'INOVATIF', '<p>ACCESSTRADE menawarkan fitur unik yang tidak dimiliki oleh platform lain, yaitu custom link. Dimana publisher bisa memilih gambar sendiri untuk bannernya atau memilih landing page tertentu pada link afiliasinya.</p>\r\n', '2018-01-03', '', 0),
(27, 16, 'EFISIEN', '<p>Dengan memasang iklan melalui afiliasi ACCESSTRADE, advertiser hanya membayar komisi hanya ketika terjadi transaksi. Dengan demikian biaya yang dikeluarkan menjadi lebih efisien.</p>\r\n', '2018-01-03', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id_portfolio` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `foto` blob NOT NULL,
  `description` longtext NOT NULL,
  `counter` int(2) NOT NULL,
  `id_category_portfolio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id_portfolio`, `title`, `foto`, `description`, `counter`, `id_category_portfolio`) VALUES
(14, 'SPONSOR ONE', 0x73706f6e736f722d696d67312e6a7067, '<p>SPONSOR ONE</p>\r\n', 0, 6),
(15, 'SPONSOR TWO', 0x73706f6e736f722d696d67322e6a7067, '<p>SPONSOR TWO</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, 6),
(16, 'SPONSOR THREE', 0x73706f6e736f722d696d67332e6a7067, '<p>SPONSOR THREE</p>\r\n', 0, 6),
(17, 'SPONSOR FOUR', 0x73706f6e736f722d696d67342e6a7067, '<p>SPONSOR FOUR</p>\r\n', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(4) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` longtext NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `title`, `description`, `foto`) VALUES
(34, 'Selamat datang ', '<h1>di platform afiliasi terbaik indonesia.</h1>\r\n', 'Social-Media-Accesstrade.png'),
(35, 'Selamat datang', '<h1>di platform afiliasi terbaik indonesia.</h1>\r\n', 'venue-bg.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `category_gallery`
--
ALTER TABLE `category_gallery`
  ADD PRIMARY KEY (`id_category_gallery`);

--
-- Indexes for table `category_portfolio`
--
ALTER TABLE `category_portfolio`
  ADD PRIMARY KEY (`id_category_portfolio`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id_page`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id_portfolio`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `category_gallery`
--
ALTER TABLE `category_gallery`
  MODIFY `id_category_gallery` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `category_portfolio`
--
ALTER TABLE `category_portfolio`
  MODIFY `id_category_portfolio` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id_page` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id_portfolio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
