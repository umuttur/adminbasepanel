-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 Eyl 2023, 16:13:23
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
-- Tablo için tablo yapısı `qp_color`
--

CREATE TABLE `qp_color` (
  `color_code` int(11) NOT NULL,
  `color_desc` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `statu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `qp_color`
--

INSERT INTO `qp_color` (`color_code`, `color_desc`, `user_id`, `create_date`, `statu`) VALUES
(1, 'BEYAZ', 1, '2023-09-11 14:01:05', 1),
(2, 'SİYAH', 1, '2023-09-11 14:01:08', 1),
(3, 'SARI', 1, '2023-09-11 14:01:10', 1),
(4, 'KIRMIZI', 1, '2023-09-11 14:01:13', 1),
(5, 'MAVİ', 1, '2023-09-11 14:01:15', 1),
(7, 'Haki', 1, '2023-09-11 15:53:20', 1),
(8, 'MOR', 1, '2023-09-11 15:53:51', 1),
(9, 'Blue', 1, '2023-09-12 08:14:53', 1),
(10, 'kıraç', 1, '2023-09-12 09:45:51', 1),
(11, 'Kahvebeyaz', 1, '2023-09-14 10:39:04', 1),
(12, 'Haki Beyaz', 1, '2023-09-14 14:00:11', 1);

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

--
-- Tablo döküm verisi `qp_ecommerce`
--

INSERT INTO `qp_ecommerce` (`id`, `tittle`, `description`, `image`, `price`, `adddate`, `statu`, `user_id`) VALUES
(4, 'TEST REFERANS', 'REFANS', 'images/logo_sm.jpg', 100.00, '2023-09-12 10:07:28', 1, 1);

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
-- Tablo için tablo yapısı `qp_product`
--

CREATE TABLE `qp_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `color_code` int(11) NOT NULL,
  `size_code` int(11) NOT NULL,
  `product_miktar` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `statu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `qp_product`
--

INSERT INTO `qp_product` (`product_id`, `product_name`, `product_desc`, `color_code`, `size_code`, `product_miktar`, `images`, `user_id`, `create_date`, `statu`) VALUES
(10, 'Kazak', 'Yün Kazak', 2, 4, 100, '2023-09-12-370-bim_logo.png', 1, '2023-09-12 09:25:41', 1),
(11, 'TEST ÜRÜN', 'sss', 1, 1, 22, '2023-09-12-805-bim_logo.png', 1, '2023-09-12 09:47:09', 1),
(12, 'GÖZLÜK', 'GÖZLÜK', 8, 3, 77, '2023-09-12-385-logo-sd.png', 1, '2023-09-12 09:48:57', 1),
(14, 'İş', 'Şirket', 1, 1, 23, '2023-09-14-441-girisimcilik.png', 1, '2023-09-14 08:45:28', 1);

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
-- Tablo için tablo yapısı `qp_size`
--

CREATE TABLE `qp_size` (
  `size_id` int(11) NOT NULL,
  `size_desc` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `statu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `qp_size`
--

INSERT INTO `qp_size` (`size_id`, `size_desc`, `user_id`, `create_date`, `statu`) VALUES
(1, '40', 1, '2023-09-11 14:01:20', 1),
(2, '41', 1, '2023-09-11 14:01:21', 1),
(3, '42', 1, '2023-09-11 14:01:23', 1),
(4, '43', 1, '2023-09-11 14:01:25', 1),
(5, '44', 1, '2023-09-11 14:01:32', 1),
(6, 'S', 1, '2023-09-12 09:51:06', 1),
(7, 'XS', 1, '2023-09-12 09:53:11', 1),
(8, 'XL', 1, '2023-09-12 09:53:19', 1),
(9, 'L', 1, '2023-09-14 08:50:21', 1),
(10, 'XXL', 1, '2023-09-14 08:50:29', 1),
(11, 'XXXL', 1, '2023-09-14 10:44:54', 1),
(12, 'XXS', 1, '2023-09-14 10:50:02', 1),
(13, '37', 1, '2023-09-14 14:00:01', 1);

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
-- Tablo için indeksler `qp_color`
--
ALTER TABLE `qp_color`
  ADD PRIMARY KEY (`color_code`);

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
-- Tablo için indeksler `qp_product`
--
ALTER TABLE `qp_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Tablo için indeksler `qp_referanslar`
--
ALTER TABLE `qp_referanslar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `qp_size`
--
ALTER TABLE `qp_size`
  ADD PRIMARY KEY (`size_id`);

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
-- Tablo için AUTO_INCREMENT değeri `qp_color`
--
ALTER TABLE `qp_color`
  MODIFY `color_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `qp_ecommerce`
--
ALTER TABLE `qp_ecommerce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Tablo için AUTO_INCREMENT değeri `qp_product`
--
ALTER TABLE `qp_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `qp_referanslar`
--
ALTER TABLE `qp_referanslar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `qp_size`
--
ALTER TABLE `qp_size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
