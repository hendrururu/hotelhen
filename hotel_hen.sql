-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2022 at 05:27 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_hen`
--

-- --------------------------------------------------------

--
-- Table structure for table `f_hotel`
--

CREATE TABLE `f_hotel` (
  `id` int(11) NOT NULL,
  `nama_fasilitas` text NOT NULL,
  `img` text NOT NULL,
  `deks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `f_hotel`
--

INSERT INTO `f_hotel` (`id`, `nama_fasilitas`, `img`, `deks`) VALUES
(1, 'F1', 'http://localhost/phpmyadmin/themes/pmahomme/img/logo_left.png', 'tes'),
(2, 'Asidaraji', 'https://atpetsi.or.id/uploads/article/view/210507061237200228114324hotel.jpg', 'Nandeyo deyo');

-- --------------------------------------------------------

--
-- Table structure for table `f_kamar`
--

CREATE TABLE `f_kamar` (
  `id` int(11) NOT NULL,
  `id_tipekamar` int(3) NOT NULL,
  `nama_fasilitas` text DEFAULT NULL,
  `kategory` varchar(255) DEFAULT NULL,
  `img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `f_kamar`
--

INSERT INTO `f_kamar` (`id`, `id_tipekamar`, `nama_fasilitas`, `kategory`, `img`) VALUES
(1, 1, 'TV LED 360inc', 'Electronic', 'http://img.global.news.samsung.com/global/wp-content/uploads/2015/04/TV_SUHD_Main_1.jpg'),
(2, 1, 'Sofa Biru', 'Aksesoris', 'https://cf.shopee.co.id/file/2a42be431db7b8262da1f1bbcf44e815'),
(3, 1, 'Meja meeting', 'Aksesoris', 'https://images.tokopedia.net/img/cache/500-square/product-1/2018/11/4/160040/160040_017a91fd-9b71-476f-a4ea-6a611c761be1_2048_2048.jpg'),
(4, 1, 'Kasur Twince', 'Aksesoris', 'https://asset.kompas.com/crop/407x139:1811x1076/750x500/data/photo/2019/03/28/2463628903.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesanan` int(11) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `email` varchar(35) NOT NULL,
  `no_hp` varchar(35) NOT NULL,
  `nama_tamu` varchar(50) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `tgl_cekin` date NOT NULL,
  `tgl_cekout` date NOT NULL,
  `jml_kamar` int(11) NOT NULL,
  `Harga` int(11) NOT NULL,
  `PayBay` varchar(244) NOT NULL,
  `PayEND` int(1) NOT NULL,
  `Status_Kamar` varchar(255) NOT NULL,
  `RefPB` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pesanan`, `nama_pemesan`, `email`, `no_hp`, `nama_tamu`, `id_kamar`, `tgl_cekin`, `tgl_cekout`, `jml_kamar`, `Harga`, `PayBay`, `PayEND`, `Status_Kamar`, `RefPB`) VALUES
(31, 'Merlina Adriana', 'druru@gmail.com', '121343', 'Zara viana', 3, '2022-04-09', '2022-04-07', 2, 2000000, 'Transfer Bank', 0, '0', '040922004644'),
(41, 'Kezara Dalviana', 'rahmawatinovia61@gmail.com', '1124124', 'hayo', 1, '2022-04-12', '2022-04-13', 1, 30000, 'Bayar Di Tempat', 0, '0', '041122040929'),
(42, 'Kezara Dalviana', 'rahmawatinovia61@gmail.com', '0283492', 'hayo', 2, '2022-04-12', '2022-04-13', 1, 20000, 'Bayar Di Tempat', 0, '0', '041122045538');

--
-- Triggers `pemesanan`
--
DELIMITER $$
CREATE TRIGGER `booking` AFTER INSERT ON `pemesanan` FOR EACH ROW BEGIN
UPDATE tipe_room set Stok
= Stok-NEW.jml_kamar
WHERE id=NEW.id_kamar;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_room`
--

CREATE TABLE `tipe_room` (
  `id` int(11) NOT NULL,
  `Nama_room` varchar(244) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `Stok` int(11) NOT NULL,
  `onuse` int(11) NOT NULL,
  `onbook` int(11) NOT NULL,
  `img_room` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_room`
--

INSERT INTO `tipe_room` (`id`, `Nama_room`, `harga`, `Stok`, `onuse`, `onbook`, `img_room`) VALUES
(1, 'VIP23', 30000, 12, 0, 0, 'https://asset.kompas.com/crops/33vZ6Rt128kzOfcC_aU3fy7oo0I=/0x36:640x463/750x500/data/photo/2020/07/10/5f081b41cc76c.jpeg'),
(2, 'Deluxkeren', 20000, 9, 0, 0, 'https://arsitagx-master.s3.ap-southeast-1.amazonaws.com/img_large/1889/988/6193/photo-hotel-room-1-sultan-hotel-at-senayan-desain-arsitek-oleh-yaph-studio.jpeg'),
(3, 'Unisharp', 1000000, 30, 0, 0, 'https://codebeautify.org/img/slogo.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_login` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nohp` varchar(14) NOT NULL,
  `level` enum('admin','resepsionis','tamu') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_login`, `username`, `password`, `nama`, `nohp`, `level`) VALUES
(7, 'admin', '123', 'admin', '081221823861', 'admin'),
(8, 'Kez', 'kezara', 'Kezara Dalviana', '+6281988776251', 'tamu'),
(9, 'merlin', '123', 'Merlina Adriana', '087752634788', 'tamu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `f_hotel`
--
ALTER TABLE `f_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_kamar`
--
ALTER TABLE `f_kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indexes for table `tipe_room`
--
ALTER TABLE `tipe_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `f_hotel`
--
ALTER TABLE `f_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `f_kamar`
--
ALTER TABLE `f_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tipe_room`
--
ALTER TABLE `tipe_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `tipe_room` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
