-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 08 Eyl 2023, 16:10:54
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
-- Tablo için tablo yapısı `qp_categories`
--

CREATE TABLE `qp_categories` (
  `id` int(11) NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `statu` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `adddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `qp_categories`
--

INSERT INTO `qp_categories` (`id`, `tittle`, `parent_id`, `statu`, `user_id`, `adddate`) VALUES
(2, 'Çanta', 0, 1, 1, '2023-09-08 10:53:12'),
(3, 'Mobilya', 0, 1, 1, '2023-09-08 10:54:00'),
(4, 'Ayakkabı', 0, 1, 1, '2023-09-08 10:57:35'),
(5, 'Teknoloji', 0, 1, 1, '2023-09-08 10:58:32'),
(6, 'Kitap', 0, 1, 1, '2023-09-08 10:59:39'),
(7, 'Erkek Ayakkabı', 4, 1, 1, '2023-09-08 11:15:37'),
(8, 'Kadın Ayakkabı', 4, 1, 1, '2023-09-08 11:16:53'),
(11, 'Kadın Ayakkabı(SMALL)', 8, 1, 1, '2023-09-08 13:18:41'),
(12, 'KULAKLIKLAR', 0, 1, 1, '2023-09-08 15:07:34'),
(13, 'APPLE KULAKLIK', 12, 1, 1, '2023-09-08 15:07:44');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `qp_ecommerce`
--

CREATE TABLE `qp_ecommerce` (
  `id` int(11) NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(19,2) NOT NULL,
  `adddate` datetime NOT NULL,
  `statu` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

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
-- Tablo için tablo yapısı `qp_mobileapp`
--

CREATE TABLE `qp_mobileapp` (
  `id` int(11) NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(19,2) NOT NULL,
  `newprice` decimal(19,2) NOT NULL,
  `adddate` datetime NOT NULL,
  `statu` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `qp_mobileapp`
--

INSERT INTO `qp_mobileapp` (`id`, `tittle`, `description`, `image`, `price`, `newprice`, `adddate`, `statu`, `user_id`) VALUES
(4, 'Android Uygulama - IOS', 'Mobil uygulama-IOS', 'images/vizyon.webp', 9000.00, 8500.00, '2023-09-07 19:38:06', 1, 1);

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
(22, 'İZMO 1002', 'sss', 'images/izmir.jpg', '2023-09-04 08:16:14', 1, 1),
(23, 'TEST REFERANSss', 'ssss', 'images/iz2.jpg', '2023-09-04 09:23:43', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `qp_users`
--

CREATE TABLE `qp_users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `statu` int(11) NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `qp_users`
--

INSERT INTO `qp_users` (`user_id`, `firstname`, `lastname`, `mail`, `password`, `role`, `statu`, `createdate`) VALUES
(1, 'Umut', 'Tur', 'admin@admin.com', '$2y$10$FgbkMwnP8Vz0QmTbhHgfmuZaO2g./Y4jZS.ZRO/YRYBJksYOjLNGO', 1, 1, '2023-09-04 08:31:28');

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

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `qp_webdesign`
--

CREATE TABLE `qp_webdesign` (
  `id` int(11) NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(19,2) NOT NULL,
  `adddate` datetime NOT NULL,
  `statu` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `qp_webdesign`
--

INSERT INTO `qp_webdesign` (`id`, `tittle`, `description`, `image`, `price`, `adddate`, `statu`, `user_id`) VALUES
(1, 'TASARIM TEST V1KIRAÇ', 'TASARIM TEST V1KIRAÇ', 'images/v1.jpg', 2000.00, '2023-09-05 13:44:28', 1, 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `qp_about`
--
ALTER TABLE `qp_about`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `qp_categories`
--
ALTER TABLE `qp_categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `qp_ecommerce`
--
ALTER TABLE `qp_ecommerce`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `qp_mission`
--
ALTER TABLE `qp_mission`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `qp_mobileapp`
--
ALTER TABLE `qp_mobileapp`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `qp_referanslar`
--
ALTER TABLE `qp_referanslar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `qp_users`
--
ALTER TABLE `qp_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Tablo için indeksler `qp_vision`
--
ALTER TABLE `qp_vision`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `qp_webdesign`
--
ALTER TABLE `qp_webdesign`
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
-- Tablo için AUTO_INCREMENT değeri `qp_categories`
--
ALTER TABLE `qp_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `qp_ecommerce`
--
ALTER TABLE `qp_ecommerce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `qp_mission`
--
ALTER TABLE `qp_mission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `qp_mobileapp`
--
ALTER TABLE `qp_mobileapp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `qp_referanslar`
--
ALTER TABLE `qp_referanslar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `qp_users`
--
ALTER TABLE `qp_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `qp_vision`
--
ALTER TABLE `qp_vision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `qp_webdesign`
--
ALTER TABLE `qp_webdesign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
