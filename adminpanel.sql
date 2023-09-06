-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Eyl 2023, 22:25:03
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `adminpanel`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `qp_about`
--

CREATE TABLE `qp_about` (
  `id` int(11) NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `adddate` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `statu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `qp_about`
--

INSERT INTO `qp_about` (`id`, `tittle`, `description`, `adddate`, `user_id`, `statu`) VALUES
(8, 'TEST GÜNCELLENDİ', 'GÜNCELLENDİ', '2023-09-02 11:16:03', 1, 2),
(9, 'CENGIZHAN KIRAÇ', 'CENGO_KIRAC@UMUTTUR.COM', '2023-09-02 11:16:58', 1, 1),
(11, 'ELÇİ ATEŞ VS CENGO', 'ELÇİ ATEŞ CENGOYLA TEKE TEK ÇIKIYOR', '2023-09-02 11:18:34', 1, 2),
(12, 'SEMRA', 'SEMRA', '2023-09-02 14:49:42', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `qp_mission`
--

CREATE TABLE `qp_mission` (
  `id` int(11) NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `adddate` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `statu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `qp_mission`
--

INSERT INTO `qp_mission` (`id`, `tittle`, `description`, `adddate`, `user_id`, `statu`) VALUES
(2, 'MISSION TAMAMLANDI', 'MISYON AKTIFTIR', '2023-09-02 13:31:14', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `qp_referanslar`
--

CREATE TABLE `qp_referanslar` (
  `id` int(11) NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `adddate` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `statu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `qp_referanslar`
--

INSERT INTO `qp_referanslar` (`id`, `tittle`, `description`, `image`, `adddate`, `user_id`, `statu`) VALUES
(22, 'İZMO 1002', 'sss', 'images/iz2.jpg', '2023-09-03 21:33:49', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `qp_vision`
--

CREATE TABLE `qp_vision` (
  `id` int(11) NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `adddate` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `statu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `qp_vision`
--

INSERT INTO `qp_vision` (`id`, `tittle`, `description`, `adddate`, `user_id`, `statu`) VALUES
(4, 'AÇIKLAMALI VIZYONAA', 'VİZYONLU ACIKLAMA', '2023-09-02 13:43:22', 1, 1),
(5, 'ekledim bir vizyon', 'ekledim iki vizyon', '2023-09-02 14:09:13', 1, 2);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `qp_about`
--
ALTER TABLE `qp_about`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `qp_mission`
--
ALTER TABLE `qp_mission`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `qp_referanslar`
--
ALTER TABLE `qp_referanslar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `qp_vision`
--
ALTER TABLE `qp_vision`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `qp_about`
--
ALTER TABLE `qp_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `qp_mission`
--
ALTER TABLE `qp_mission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `qp_referanslar`
--
ALTER TABLE `qp_referanslar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `qp_vision`
--
ALTER TABLE `qp_vision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
