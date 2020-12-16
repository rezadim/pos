-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2020 pada 03.34
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_workshop_pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(167, '2020-11-25-021322', 'App\\Database\\Migrations\\Categories', 'default', 'App', 1606532500, 1),
(168, '2020-11-25-021741', 'App\\Database\\Migrations\\Products', 'default', 'App', 1606532500, 1),
(169, '2020-11-25-023526', 'App\\Database\\Migrations\\Users', 'default', 'App', 1606532500, 1),
(170, '2020-11-25-024217', 'App\\Database\\Migrations\\TrxSales', 'default', 'App', 1606532501, 1),
(171, '2020-11-25-025249', 'App\\Database\\Migrations\\TrxSaleDetails', 'default', 'App', 1606532501, 1),
(172, '2020-11-25-030158', 'App\\Database\\Migrations\\Suppliers', 'default', 'App', 1606532502, 1),
(173, '2020-11-25-030603', 'App\\Database\\Migrations\\TrxPurchases', 'default', 'App', 1606532502, 1),
(174, '2020-11-25-031354', 'App\\Database\\Migrations\\TrxPurchaseDetails', 'default', 'App', 1606532503, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `product_id` bigint(100) UNSIGNED NOT NULL,
  `product_code` varchar(100) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `purchase_price` bigint(100) NOT NULL DEFAULT 0,
  `sale_price` bigint(100) NOT NULL DEFAULT 0,
  `stock` bigint(100) NOT NULL DEFAULT 0,
  `product_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `purchase_price`, `sale_price`, `stock`, `product_description`) VALUES
(1, '1q2w3e', 'T-Shirt', 20000, 0, 10, 'All Size'),
(2, '4e5r6t', 'Hoodie', 30000, 0, 31, 'All Size'),
(3, '4r5t6y', 'Celana Panjang', 10000, 0, 0, 'plplpl');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` bigint(100) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_phone_number` varchar(100) DEFAULT NULL,
  `supplier_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `supplier_phone_number`, `supplier_address`) VALUES
(1, 'Dimas', '0987654321', 'Sukoharjo, Jawa Tengah'),
(2, 'Putra', '09876654323', 'Sukoharjo, Jawa Tengah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_purchases`
--

CREATE TABLE `trx_purchases` (
  `trx_purchase_id` bigint(100) NOT NULL,
  `supplier_id` bigint(100) DEFAULT NULL,
  `total_purchase` bigint(100) NOT NULL DEFAULT 0,
  `purchase_created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `trx_purchases`
--

INSERT INTO `trx_purchases` (`trx_purchase_id`, `supplier_id`, `total_purchase`, `purchase_created_at`) VALUES
(1, 1, 0, '2020-11-27 10:27:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_purchase_details`
--

CREATE TABLE `trx_purchase_details` (
  `purchase_detail_id` bigint(100) NOT NULL,
  `trx_purchase_id` bigint(100) DEFAULT NULL,
  `product_id` bigint(100) UNSIGNED DEFAULT NULL,
  `purchase_quantity` bigint(100) NOT NULL DEFAULT 0,
  `purchase_price` bigint(100) NOT NULL DEFAULT 0,
  `purchase_subtotal` bigint(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `trx_purchase_details`
--

INSERT INTO `trx_purchase_details` (`purchase_detail_id`, `trx_purchase_id`, `product_id`, `purchase_quantity`, `purchase_price`, `purchase_subtotal`) VALUES
(7, 1, 1, 15, 20000, 0),
(8, 1, 2, 40, 30000, 0);

--
-- Trigger `trx_purchase_details`
--
DELIMITER $$
CREATE TRIGGER `deletePurchase` AFTER DELETE ON `trx_purchase_details` FOR EACH ROW UPDATE products SET stock = stock-OLD.purchase_quantity WHERE product_id = OLD.product_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `purchasePrice` AFTER INSERT ON `trx_purchase_details` FOR EACH ROW UPDATE products SET purchase_price = NEW.purchase_price WHERE product_id = NEW.product_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stockProducts` AFTER INSERT ON `trx_purchase_details` FOR EACH ROW UPDATE products SET stock = stock+NEW.purchase_quantity WHERE product_id = NEW.product_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `totalPurchase_afterDelete` AFTER DELETE ON `trx_purchase_details` FOR EACH ROW UPDATE trx_purchases SET total_purchase = total_purchase-OLD.purchase_subtotal WHERE trx_purchase_id = OLD.trx_purchase_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `totalPurchases` AFTER INSERT ON `trx_purchase_details` FOR EACH ROW UPDATE trx_purchases SET total_purchase = total_purchase+NEW.purchase_subtotal WHERE trx_purchase_id = NEW.trx_purchase_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_sales`
--

CREATE TABLE `trx_sales` (
  `trx_sale_id` bigint(100) UNSIGNED NOT NULL,
  `total_sale` bigint(100) NOT NULL DEFAULT 0,
  `sale_created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `trx_sales`
--

INSERT INTO `trx_sales` (`trx_sale_id`, `total_sale`, `sale_created_at`) VALUES
(3, 0, '2020-12-25 16:06:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_sale_details`
--

CREATE TABLE `trx_sale_details` (
  `sale_detail_id` bigint(100) NOT NULL,
  `trx_sale_id` bigint(100) UNSIGNED DEFAULT NULL,
  `product_id` bigint(100) UNSIGNED DEFAULT NULL,
  `sale_quantity` bigint(100) NOT NULL DEFAULT 0,
  `sale_subtotal` bigint(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `trx_sale_details`
--

INSERT INTO `trx_sale_details` (`sale_detail_id`, `trx_sale_id`, `product_id`, `sale_quantity`, `sale_subtotal`) VALUES
(4, 3, 1, 5, 0),
(5, 3, 2, 9, 0);

--
-- Trigger `trx_sale_details`
--
DELIMITER $$
CREATE TRIGGER `deleteSale` AFTER DELETE ON `trx_sale_details` FOR EACH ROW UPDATE products SET stock = stock+OLD.sale_quantity WHERE product_id = OLD.product_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stockAfterSale` AFTER INSERT ON `trx_sale_details` FOR EACH ROW UPDATE products SET stock = stock-NEW.sale_quantity WHERE product_id = NEW.product_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `totalSale_afterDelete` AFTER DELETE ON `trx_sale_details` FOR EACH ROW UPDATE trx_sales SET total_sale = total_sale+OLD.sale_subtotal WHERE trx_sale_id = OLD.trx_sale_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `totalSales` BEFORE INSERT ON `trx_sale_details` FOR EACH ROW UPDATE trx_sales SET total_sale = total_sale+NEW.sale_subtotal WHERE trx_sale_id = NEW.trx_sale_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` bigint(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_created_at`) VALUES
(1, 'admin', '123', '2020-11-27 21:02:24'),
(2, 'user', '123', '2020-11-27 21:02:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indeks untuk tabel `trx_purchases`
--
ALTER TABLE `trx_purchases`
  ADD PRIMARY KEY (`trx_purchase_id`),
  ADD KEY `trx_purchases_supplier_id_foreign` (`supplier_id`);

--
-- Indeks untuk tabel `trx_purchase_details`
--
ALTER TABLE `trx_purchase_details`
  ADD PRIMARY KEY (`purchase_detail_id`),
  ADD KEY `trx_purchase_details_trx_purchase_id_foreign` (`trx_purchase_id`),
  ADD KEY `trx_purchase_details_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `trx_sales`
--
ALTER TABLE `trx_sales`
  ADD PRIMARY KEY (`trx_sale_id`);

--
-- Indeks untuk tabel `trx_sale_details`
--
ALTER TABLE `trx_sale_details`
  ADD PRIMARY KEY (`sale_detail_id`),
  ADD KEY `trx_sale_details_trx_sale_id_foreign` (`trx_sale_id`),
  ADD KEY `trx_sale_details_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `trx_purchases`
--
ALTER TABLE `trx_purchases`
  MODIFY `trx_purchase_id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `trx_purchase_details`
--
ALTER TABLE `trx_purchase_details`
  MODIFY `purchase_detail_id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `trx_sales`
--
ALTER TABLE `trx_sales`
  MODIFY `trx_sale_id` bigint(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `trx_sale_details`
--
ALTER TABLE `trx_sale_details`
  MODIFY `sale_detail_id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `trx_purchases`
--
ALTER TABLE `trx_purchases`
  ADD CONSTRAINT `trx_purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `trx_purchase_details`
--
ALTER TABLE `trx_purchase_details`
  ADD CONSTRAINT `trx_purchase_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_purchase_details_trx_purchase_id_foreign` FOREIGN KEY (`trx_purchase_id`) REFERENCES `trx_purchases` (`trx_purchase_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `trx_sale_details`
--
ALTER TABLE `trx_sale_details`
  ADD CONSTRAINT `trx_sale_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_sale_details_trx_sale_id_foreign` FOREIGN KEY (`trx_sale_id`) REFERENCES `trx_sales` (`trx_sale_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
