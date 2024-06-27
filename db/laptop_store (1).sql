-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 27 Jun 2024 pada 17.35
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptop_store`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `stock` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `created_at`, `image_url`) VALUES
-- (1, 'Lenovo ThinkPad X1 Carbon', 'A lightweight and durable 14-inch laptop with a long battery life.', 1499.99, 10, '2024-06-14 10:09:46', 'https://images.tokopedia.net/img/cache/900/VqbcmM/2024/5/28/33f7b10d-41bc-44a9-899e-1f87d66c5469.jpg'),
-- (2, 'ASUS ZenBook 13 OLED', 'A sleek and stylish 13.3-inch laptop with a stunning OLED display.', 1199.99, 15, '2024-06-14 10:09:47', 'https://dlcdnwebimgs.asus.com/gain/1b7d52dd-1049-4de8-856c-abbf914dc051/w800'),
-- (3, 'Apple MacBook Air M1', 'A powerful and portable 13.3-inch laptop with Apple\'s M1 chip and beatifull display.', 999.99, 8, '2024-06-14 10:09:47', 'https://cdn.eraspace.com/media/catalog/product/m/a/macbook_air_m1_space_gray_1.jpg'),
-- (4, 'Dell XPS 13', 'A premium 13.4-inch laptop with a beautiful InfinityEdge display.', 1299.99, 12, '2024-06-14 10:09:47', 'https://images-cdn.ubuy.co.id/633ab3a9d9b0dc2d607686fc-dell-xps-13-9310-touchscreen-13-4-inch.jpg'),
-- (5, 'HP Spectre x360', 'A versatile 13.5-inch convertible laptop that can be used as a laptop, tablet, or tent.', 1399.99, 7, '2024-06-14 10:09:47', 'https://images-cdn.ubuy.co.id/6351fe1d682e574f8b33166e-hp-spectre-x360-13-home.jpg'),
-- (6, 'Microsoft Surface Laptop Studio', 'A powerful and versatile 14.4-inch laptop with a detachable keyboard.', 1699.99, 5, '2024-06-14 10:09:47', 'https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RW16lMK?ver=94db&q=90&m=6&h=705&w=1253&b=%23FFFFFFFF&f=jpg&o=f&p=140&aim=true'),
-- (19, 'Acer Swift 5', 'A lightweight and portable 14-inch laptop with a long battery life.', 899.99, 20, '2024-06-24 12:23:11', 'https://static-ecapac.acer.com/media/catalog/product/s/w/swift-5-aerospace-intel-evo-core-i5.png?optimize=high&bg-color=255,255,255&fit=bounds&height=500&width=500&canvas=500:500&format=jpeg'),
-- (20, 'MSI GS66 Stealth', 'A powerful gaming laptop with a high-refresh-rate display and NVIDIA GeForce RTX graphics.', 1799.99, 15, '2024-06-24 12:23:11', 'https://asset.msi.com/resize/image/global/product/product_164730247617039c3f1bd7445f8f53e96cd736bf7d.png62405b38c58fe0f07fcef2367d8a9ba1/380.png'),
-- (21, 'Razer Blade 15', 'A sleek and stylish gaming laptop with a powerful Intel Core i7 processor and NVIDIA GeForce RTX graphics.', 2299.99, 10, '2024-06-24 12:23:11', 'https://assets2.razerzone.com/images/pnx.assets/177e287d6654f70ef3ddf52cf2ddb66d/thumbnail-blade-15-2023.webp'),
-- (22, 'Samsung Galaxy Book Pro', 'A versatile 13.3-inch laptop with a long battery life and S Pen support.', 1199.99, 18, '2024-06-24 12:23:11', 'https://images.samsung.com/is/image/samsung/p6pim/in/np754xed-kc1in/gallery/in-galaxy-book2-np750xeda-447655-np754xed-kc1in-534939795?$650_519_PNG$'),
-- (23, 'Chromebook Spin 713', 'A convertible Chromebook with a long battery life and a touchscreen display.', 399.99, 25, '2024-06-24 12:23:11', 'https://static-ecpa.acer.com/media/catalog/product/a/c/acer-chromebook-spin-713_cp713-2w_modelmain.png?optimize=high&bg-color=255,255,255&fit=bounds&height=500&width=500&canvas=500:500&format=jpeg'),
-- (24, 'Alienware m15 R7', 'A powerful gaming laptop with a high-refresh-rate display, NVIDIA GeForce RTX graphics, and an Intel Core i9 processor.', 2499.99, 7, '2024-06-27 15:45:24', 'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//catalog-image/89/MTA-140412606/no-brand_no-brand_full01.jpg');



--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `comment` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'a', '123', 'a@gmail.com', '2024-06-22 13:59:50'),
(2, 'b', '123', 'b@gmail.com', '2024-06-22 14:02:29'),
(3, 'b', '123', 'b@gmail.com', '2024-06-22 14:11:29'),
(4, 'c', '123', 'c@gmail.com', '2024-06-22 14:26:39'),
(5, 'z', '123', 'z@gmail.com', '2024-06-25 04:49:44'),
(6, 'a', '123', 'a@gmail.com', '2024-06-27 16:26:09'),
(7, 't', '123', 't@gmail.com', '2024-06-27 16:48:10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ketidakleluasaan untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
