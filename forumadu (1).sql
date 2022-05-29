-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 29 May 2022, 22:16:39
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `forumadu`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_kadi` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `admin_sifre` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_kadi`, `admin_sifre`) VALUES
(5, 'admin', '123456');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL,
  `announcement_title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `announcement_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `announcement_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `announcement_title`, `announcement_content`, `announcement_date`) VALUES
(1, 'Adüde havuz partisi var.', 'Havuzda cihatla su savaşı yapıyoruz.', '2022-05-27 21:39:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `site_id` int(11) NOT NULL,
  `site_url` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `site_title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `site_desc` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `site_keyw` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`site_id`, `site_url`, `site_title`, `site_desc`, `site_keyw`) VALUES
(1, 'forumadu.com', 'Forum Adü', 'Adülülerin buluşma adresi', 'adü,cagri');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `kategori_id` int(11) NOT NULL,
  `kategori_title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `kategori_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`kategori_id`, `kategori_title`, `kategori_tarih`) VALUES
(1, 'Kulüpler', '2022-05-28 18:23:09'),
(2, 'Etkinlikler', '2022-05-28 18:23:09'),
(4, 'Spor', '2022-05-29 15:21:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `newslettersubs`
--

CREATE TABLE `newslettersubs` (
  `newsletter_email_id` int(11) NOT NULL,
  `newslatter_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `newslatter_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `newslettersubs`
--

INSERT INTO `newslettersubs` (`newsletter_email_id`, `newslatter_email`, `newslatter_date`) VALUES
(6, 'chtcbn0916@gmail.com', '2022-05-29 15:59:44'),
(7, 'mustafa31manav58@gmail.com', '2022-05-29 16:12:14'),
(8, 'tuncer.fm@gmail.com', '2022-05-29 16:12:53'),
(9, 'asd', '2022-05-29 16:13:32'),
(10, 'asdc', '2022-05-29 16:20:57'),
(14, 'fatih@gmail.com', '2022-05-29 16:27:40');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `site_id` int(11) NOT NULL,
  `site_url` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `site_title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `site_description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `site_keyword` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`site_id`, `site_url`, `site_title`, `site_description`, `site_keyword`) VALUES
(1, 'forumadu.com', 'Aydın Adnan Menderes Üniversitesi Öğrencilerinin buluşma adresi.', 'süper bir site', 'adü,forum,öğrenci');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazilar`
--

CREATE TABLE `yazilar` (
  `yazi_id` int(11) NOT NULL,
  `yazi_foto` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `yazi_title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `yazi_icerik` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `yazi_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `yazi_kategori_id` int(11) NOT NULL,
  `yazi_durum` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `yazilar`
--

INSERT INTO `yazilar` (`yazi_id`, `yazi_foto`, `yazi_title`, `yazi_icerik`, `yazi_tarih`, `yazi_kategori_id`, `yazi_durum`) VALUES
(4, '214426680_Forum_Adu.png', 'Forum adü açılıyorasd', 'Forum adü açıldı hepinizi bekliyoruz', '2022-05-29 14:38:36', 1, ''),
(5, '2094436827_qrcode.png', 'KURUMSAL KİMLİKLE KÜTÜPHANE VERİ TABANLARINA ERİŞİM', 'Recep Tayyip Erdoğan Engelli Dostu Kütüphanemizin erişim sağladığı aşağıdaki veri tabanları (YETKİM) kapsamında kurumsal kimlikle erişime açılmıştır. ', '2022-05-29 15:20:27', 1, '1'),
(6, '1515593175_b60c549e-a5af-455b-8d0e-1c87c1dd911c.jpg', 'Kurucularımızın yakışıklı üyesi Çağrı Manav sizi partiye davet ediyor.', '10 Haziranda Natt\'ta parti var.', '2022-05-29 15:29:23', 2, ''),
(7, '1331618257_2dd052be-d0ea-4193-8501-8ec0bad8b522.jpg', 'Kurucularımızın sert bakışlı üyesi Cihat Çoban sizi tekne turuna davet ediyor', '15 Haziranda kuşadasında', '2022-05-29 15:30:53', 2, '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Tablo için indeksler `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`site_id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `newslettersubs`
--
ALTER TABLE `newslettersubs`
  ADD PRIMARY KEY (`newsletter_email_id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`site_id`);

--
-- Tablo için indeksler `yazilar`
--
ALTER TABLE `yazilar`
  ADD PRIMARY KEY (`yazi_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `newslettersubs`
--
ALTER TABLE `newslettersubs`
  MODIFY `newsletter_email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `yazilar`
--
ALTER TABLE `yazilar`
  MODIFY `yazi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
