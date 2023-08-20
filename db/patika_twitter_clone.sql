-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 20 Ağu 2023, 02:00:08
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `patika_twitter_clone`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `friendships`
--

CREATE TABLE `friendships` (
  `id` int(11) NOT NULL,
  `sender_user_id` int(11) NOT NULL,
  `receiver_user_id` int(11) NOT NULL,
  `status` enum('pending','accepted','rejected') COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT 'pending',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `friendships`
--

INSERT INTO `friendships` (`id`, `sender_user_id`, `receiver_user_id`, `status`, `created_date`, `updated_date`) VALUES
(89, 30, 32, 'accepted', '2023-08-19 22:49:34', '2023-08-19 22:49:46'),
(92, 30, 33, 'accepted', '2023-08-19 23:18:45', '2023-08-19 23:18:54'),
(93, 49, 30, 'accepted', '2023-08-19 23:22:49', '2023-08-19 23:23:28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `tweets`
--

INSERT INTO `tweets` (`id`, `user_id`, `content`, `created_at`) VALUES
(2, 30, 'just setting up my twttr', '2023-08-11 23:09:51'),
(4, 33, 'Just started using the new Tweet App, and I\'m already hooked! It\'s like a time machine for social media. 🚀🕰️', '2023-08-11 23:57:17'),
(5, 32, 'hello world!', '2023-08-12 07:36:20'),
(26, 34, 'Just binge-watched an entire TV series in one weekend. Procrastination level: expert. 📺🍕', '2023-08-12 22:23:45'),
(97, 39, 'Just discovered a quaint little café tucked away in the heart of the city. Their pastries are pure bliss! ☕🥐', '2023-08-19 12:23:14'),
(102, 41, 'They say laughter is the best medicine, so I\'m overdosing on comedy shows tonight. 😂📺', '2023-08-19 21:19:31'),
(103, 42, 'Sipping iced tea on this balmy August night, stars above and a gentle breeze – summer\'s magic in full swing.', '2023-08-19 22:44:30'),
(107, 49, 'I need coffee.', '2023-08-19 23:22:40');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `photo_url` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `about` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `photo_url`, `about`, `created_date`, `updated_date`) VALUES
(30, 'jack', 'jack', '$2y$10$LL2w1kG0AsPbkVVNxkQ7TuHDhYe5nNDdde9Bvugjjtxvur2Wt387K', NULL, '', '2023-08-07 21:52:43', '2023-08-19 20:27:57'),
(31, 'will_barrow', 'Will Barrow', '$2y$10$tHZeLEQqrLveOVwi5Qqbu.uycFOXGNT78ceoyvzkKUYy.C3aIuvVG', NULL, '', '2023-08-09 21:39:52', '2023-08-14 09:52:31'),
(32, 'nigel', 'Nigel', '$2y$10$iSear4Jt6pQ52o/PIGiEXOIXWgjPCSeLyrM4hXzESitK9gHOs5TbW', NULL, '', '2023-08-09 21:41:05', '2023-08-14 09:52:33'),
(33, 'miles', 'Miles Tone', '$2y$10$7XgHygiNzuvK0YqfPEY1fePvbOT42rNMOhiaz2sAvfSXO62lqvwAa', NULL, '', '2023-08-09 23:37:44', '2023-08-14 09:52:34'),
(34, 'penny', 'Penny Tool', '$2y$10$Q3XeGK3jGkKgd8J.MmOUyORgf5thjNgjiwrz0fnrIkcPvLlvZPRvm', NULL, '', '2023-08-11 23:05:03', '2023-08-14 09:52:36'),
(38, 'hilary', 'Hilary Ouse', '$2y$10$NFBQW2.VJimEpkKiNspMheigLsLTC64pSkMwq6OC.x5h7JoUWQHyK', NULL, '', '2023-08-15 22:58:58', '2023-08-15 22:58:58'),
(39, 'eric', 'Eric Widget', '$2y$10$b1nksOHQJ7eB2i8kv7UEZe9sBwIgMKOuBTXV4FNFrY.pwfM0nFtPG', NULL, '', '2023-08-19 12:04:37', '2023-08-19 12:04:37'),
(40, 'barry', 'Barry Tone', '$2y$10$KEtlG5GDhq6vlkmRRJNguefxs4eHFJwMfeQMG7YzWxz8LY0QqSxEO', NULL, '', '2023-08-19 21:09:32', '2023-08-19 21:09:32'),
(41, 'fresco', 'Alan Fresco', '$2y$10$yTfJvx//jecrYgdvFUP2G.dHVnA0dZXHuMrKeYnYdFS3jfrx7/CKO', NULL, '', '2023-08-19 21:17:22', '2023-08-19 21:17:22'),
(42, 'jake', 'Jake Weary', '$2y$10$5BRh0yRYv2VJhtOeofx9QuMVxHL/bCw2iyp5CRtpVLri44/TYBzp.', NULL, '', '2023-08-19 22:44:19', '2023-08-19 22:45:14'),
(43, 'justin', 'justin case', '$2y$10$arM3TLAGuwmU3IfPIgug8.Y0S2PwtU7kzsQbwNBsA0XSYQ1fCPczC', NULL, '', '2023-08-19 23:02:38', '2023-08-19 23:02:38'),
(47, 'robert', 'robert gill', '$2y$10$jdY3jw2n64wmJVFF4FvJYevwgck3pW4xOtHGi7/JRnHsbz26J/Tzm', NULL, '', '2023-08-19 23:19:33', '2023-08-19 23:20:22'),
(49, 'robert1', 'Robert Pot', '$2y$10$9rBezZ9S6YK.alcM1RbX5uYvQZ.CPTLA2Mi.jnALfzLLVH68AJQHy', NULL, '', '2023-08-19 23:22:29', '2023-08-19 23:23:01');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `friendships`
--
ALTER TABLE `friendships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reciever_user_id` (`receiver_user_id`),
  ADD KEY `sender_user_id` (`sender_user_id`);

--
-- Tablo için indeksler `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `friendships`
--
ALTER TABLE `friendships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Tablo için AUTO_INCREMENT değeri `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `friendships`
--
ALTER TABLE `friendships`
  ADD CONSTRAINT `friendships_ibfk_1` FOREIGN KEY (`receiver_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `friendships_ibfk_2` FOREIGN KEY (`sender_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `tweets`
--
ALTER TABLE `tweets`
  ADD CONSTRAINT `tweets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
