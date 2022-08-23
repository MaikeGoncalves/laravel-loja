-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Ago-2022 às 21:25
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lojal9tw`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `cep` varchar(50) DEFAULT '0',
  `rua` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `addresses`
--

INSERT INTO `addresses` (`id`, `id_client`, `cep`, `rua`, `numero`, `complemento`) VALUES
(1, 3, '29830-000', 0, 906, 'Academia Apolo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `addresses_delivery`
--

CREATE TABLE `addresses_delivery` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_sale` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `cep` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `bairro` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `rua` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `numero` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `complemento` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date_cad` datetime NOT NULL,
  `password` varchar(200) NOT NULL,
  `avatar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `date_cad`, `password`, `avatar`) VALUES
(17, 'Maike', 'maike@hotmail.com', '2022-08-22 16:54:53', '$2y$10$8bT2puo3Eibtq2VICmsLsueBDn2G/mk1zlE1z0Oq0txB/UzD9EGqW', NULL),
(18, 'Maike 88', 'admin88@hotmail.com', '2022-08-23 08:30:43', '$2y$10$3bMBxwl0e1BPOE66PNdkYed4tI3W7AIm5ymzKDSCkaoE3osktLozK', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `items_sales`
--

CREATE TABLE `items_sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_sale` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `data_item` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `price` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `min_stock` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `cover` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `stock`, `min_stock`, `description`, `cover`) VALUES
(20, 'Brasil', NULL, '500.50', 20, 3, NULL, 'b3cfd610590d47680acc34db44b20f14.jpg'),
(22, 'Coturno', NULL, '158.58', 5, 2, NULL, 'fdaa799cd6eb828d1d0702a5f5213d4e.jpg'),
(24, 'Camisa Militar', NULL, '240.60', 5, 3, 'Camisa militar impermeável e flexível.', '536e3b498e34f170274ca65fe34c2b22.jpg'),
(25, 'Casaco Militar', NULL, '255.90', 6, 2, 'Casaco militar de guerra', '9bb6caa171f4fe55ecf72bf54cee36ca.jpg'),
(26, 'Mochila Nike', NULL, '189.60', 0, 2, 'Mochila Nike original e para carregar chuteira', '1f0545e635600f7c65dc8737ac552fa1.jpg'),
(27, 'Mochila Nike Version', NULL, '129.60', 0, 9, 'Mochila Nike version 2023', '30efaedd420c175629482d4af1a63776.jpg'),
(28, 'Tênis Nike Verde Mercurial', NULL, '206.90', 50, 5, 'Tênis Nike 2019', '8e797e9c3e74dee89eb4dc510b09a02a.jpg'),
(29, 'Chuteira Nike Mercurial 2022', NULL, '560.95', 5, 2, 'Chuteira Nike Lançamento', '5f95b8becdf83f57c81e2e697bdbe33a.jpg'),
(31, 'Chuteira Nike Virtey Verde', NULL, '956.80', 6, 5, 'Chuteira CR7 Virtey Lançamento 2023', '3498bf3b5c036f5ad720445069e28b24.jpg'),
(33, 'casaco Militar', NULL, '44.60', 50, 5, 'Casaco militar 2022', 'e2a0ab68e45a4aa8c47e1f1e9dc9b001.jpg'),
(34, 'mochila Tática', NULL, '209.90', 10, 5, 'Mochila Tática para o CFSD', '1602849b2c6f57c5887a44357b49ed5e.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_views`
--

CREATE TABLE `product_views` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `date_access` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `product_views`
--

INSERT INTO `product_views` (`id`, `id_product`, `date_access`) VALUES
(6, 27, '2022-08-22 16:50:17'),
(7, 26, '2022-08-22 16:50:25'),
(8, 34, '2022-08-22 16:50:33'),
(9, 29, '2022-08-22 16:51:25'),
(10, 22, '2022-08-23 08:51:16'),
(11, 33, '2022-08-23 08:57:53'),
(12, 33, '2022-08-23 08:59:34'),
(13, 33, '2022-08-23 08:59:36'),
(14, 33, '2022-08-23 09:02:26'),
(15, 33, '2022-08-23 09:02:28'),
(16, 33, '2022-08-23 09:03:08'),
(17, 33, '2022-08-23 09:03:14'),
(18, 31, '2022-08-23 09:18:42'),
(19, 31, '2022-08-23 09:22:13'),
(20, 31, '2022-08-23 09:22:16'),
(21, 29, '2022-08-23 09:23:19'),
(22, 29, '2022-08-23 09:24:58'),
(23, 29, '2022-08-23 09:25:25'),
(24, 29, '2022-08-23 09:25:26'),
(25, 29, '2022-08-23 09:26:16'),
(26, 29, '2022-08-23 09:26:19'),
(27, 29, '2022-08-23 09:26:19'),
(28, 31, '2022-08-23 09:27:13'),
(29, 31, '2022-08-23 09:27:49'),
(30, 31, '2022-08-23 09:27:50'),
(31, 31, '2022-08-23 09:30:25'),
(32, 31, '2022-08-23 09:35:58'),
(33, 31, '2022-08-23 09:36:00'),
(34, 31, '2022-08-23 09:36:01'),
(35, 29, '2022-08-23 09:38:28'),
(36, 29, '2022-08-23 09:39:16'),
(37, 29, '2022-08-23 09:39:20'),
(38, 29, '2022-08-23 10:06:59'),
(39, 29, '2022-08-23 10:07:07'),
(40, 34, '2022-08-23 10:08:13'),
(41, 34, '2022-08-23 10:08:32'),
(42, 20, '2022-08-23 10:09:24'),
(43, 33, '2022-08-23 10:31:43'),
(44, 28, '2022-08-23 10:46:24'),
(45, 24, '2022-08-23 10:49:29'),
(46, 24, '2022-08-23 10:50:28'),
(47, 24, '2022-08-23 10:50:30'),
(48, 24, '2022-08-23 10:50:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sales`
--

CREATE TABLE `sales` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `email`, `password`) VALUES
(13, 'Maike Gonçalves', '30b5b1b16beef39ad97a47ddf48cda8f.jpg', 'admin@hotmail.com', '$2y$10$8GuL0R80qsYk73/t12WesePJ2Pzx7DZreKtzMq0cHVL4vLIMFlDDC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `views`
--

CREATE TABLE `views` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(200) NOT NULL,
  `date_access` datetime NOT NULL,
  `page` varchar(50) NOT NULL DEFAULT '/home'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `views`
--

INSERT INTO `views` (`id`, `ip`, `date_access`, `page`) VALUES
(1, '192.168.55.67', '2022-08-22 10:02:39', '/home'),
(2, '192.168.55.98', '2022-08-22 14:34:38', '/home'),
(3, '192.168.55.68', '2022-08-22 14:36:27', '/home'),
(4, '127.0.0.1', '2022-08-22 15:07:01', '/home'),
(5, '127.0.0.1', '2022-08-22 15:07:29', '/home'),
(6, '127.0.0.1', '2022-08-22 15:07:34', '/home'),
(7, '127.0.0.1', '2022-08-22 15:08:39', '/home'),
(8, '127.0.0.1', '2022-08-22 15:08:54', '/home'),
(9, '127.0.0.1', '2022-08-22 15:08:59', '/home'),
(10, '127.0.0.1', '2022-08-22 15:14:29', '/home'),
(11, '127.0.0.1', '2022-08-22 15:14:32', '/home'),
(12, '127.0.0.1', '2022-08-22 15:24:01', '/home'),
(13, '127.0.0.1', '2022-08-22 15:24:31', '/home'),
(14, '127.0.0.1', '2022-08-22 15:27:00', '/home'),
(15, '127.0.0.1', '2022-08-22 15:28:36', '/home'),
(16, '127.0.0.1', '2022-08-22 15:28:47', '/home'),
(17, '127.0.0.1', '2022-08-22 15:43:28', '/home'),
(18, '127.0.0.1', '2022-08-22 15:48:05', '/home'),
(19, '127.0.0.1', '2022-08-22 15:48:52', '/home'),
(20, '127.0.0.1', '2022-08-22 15:49:27', '/home'),
(21, '127.0.0.1', '2022-08-22 16:04:02', '/home'),
(22, '127.0.0.1', '2022-08-22 16:04:57', '/home'),
(23, '127.0.0.1', '2022-08-22 16:05:14', '/home'),
(24, '127.0.0.1', '2022-08-22 16:23:35', '/home'),
(25, '127.0.0.1', '2022-08-22 16:23:44', '/home'),
(26, '127.0.0.1', '2022-08-22 16:24:41', '/home'),
(27, '127.0.0.1', '2022-08-22 16:26:08', '/home'),
(28, '127.0.0.1', '2022-08-22 16:27:41', '/home'),
(29, '127.0.0.1', '2022-08-22 16:27:45', '/home'),
(30, '127.0.0.1', '2022-08-22 16:42:25', '/home'),
(31, '127.0.0.1', '2022-08-22 16:42:45', '/home'),
(32, '127.0.0.1', '2022-08-22 16:45:25', '/home'),
(33, '127.0.0.1', '2022-08-22 16:49:07', '/home'),
(34, '127.0.0.1', '2022-08-22 16:49:13', '/home'),
(35, '127.0.0.1', '2022-08-22 16:49:32', '/home'),
(36, '127.0.0.1', '2022-08-22 16:49:45', '/home'),
(37, '127.0.0.1', '2022-08-22 16:49:53', '/home'),
(38, '127.0.0.1', '2022-08-22 16:50:21', '/home'),
(39, '127.0.0.1', '2022-08-22 16:50:29', '/home'),
(40, '127.0.0.1', '2022-08-22 16:50:43', '/home'),
(41, '127.0.0.1', '2022-08-22 16:51:19', '/home'),
(42, '127.0.0.1', '2022-08-22 16:51:47', '/home'),
(43, '127.0.0.1', '2022-08-22 16:53:18', '/home'),
(44, '127.0.0.1', '2022-08-22 16:55:32', '/home'),
(45, '127.0.0.1', '2022-08-23 08:22:22', '/home'),
(46, '127.0.0.1', '2022-08-23 08:23:10', '/home'),
(47, '127.0.0.1', '2022-08-23 08:25:48', '/home'),
(48, '127.0.0.1', '2022-08-23 08:31:53', '/home'),
(49, '127.0.0.1', '2022-08-23 08:34:23', '/home'),
(50, '127.0.0.1', '2022-08-23 08:34:25', '/home'),
(51, '127.0.0.1', '2022-08-23 08:51:09', '/home'),
(52, '127.0.0.1', '2022-08-23 08:51:54', '/home'),
(53, '127.0.0.1', '2022-08-23 08:57:48', '/home'),
(54, '127.0.0.1', '2022-08-23 09:18:36', '/home'),
(55, '127.0.0.1', '2022-08-23 09:23:15', '/home'),
(56, '127.0.0.1', '2022-08-23 09:24:54', '/home'),
(57, '127.0.0.1', '2022-08-23 09:27:09', '/home'),
(58, '127.0.0.1', '2022-08-23 09:30:21', '/home'),
(59, '127.0.0.1', '2022-08-23 09:38:25', '/home'),
(60, '127.0.0.1', '2022-08-23 10:06:54', '/home'),
(61, '127.0.0.1', '2022-08-23 10:08:06', '/home'),
(62, '127.0.0.1', '2022-08-23 10:09:18', '/home'),
(63, '127.0.0.1', '2022-08-23 10:11:33', '/home'),
(64, '127.0.0.1', '2022-08-23 10:17:02', '/home'),
(65, '127.0.0.1', '2022-08-23 10:17:05', '/home'),
(66, '127.0.0.1', '2022-08-23 10:17:28', '/home'),
(67, '127.0.0.1', '2022-08-23 10:17:30', '/home'),
(68, '127.0.0.1', '2022-08-23 10:18:03', '/home'),
(69, '127.0.0.1', '2022-08-23 10:18:07', '/home'),
(70, '127.0.0.1', '2022-08-23 10:18:08', '/home'),
(71, '127.0.0.1', '2022-08-23 10:18:09', '/home'),
(72, '127.0.0.1', '2022-08-23 10:23:15', '/home'),
(73, '127.0.0.1', '2022-08-23 10:23:17', '/home'),
(74, '127.0.0.1', '2022-08-23 10:23:25', '/home'),
(75, '127.0.0.1', '2022-08-23 10:24:31', '/home'),
(76, '127.0.0.1', '2022-08-23 10:24:33', '/home'),
(77, '127.0.0.1', '2022-08-23 10:24:34', '/home'),
(78, '127.0.0.1', '2022-08-23 10:24:35', '/home'),
(79, '127.0.0.1', '2022-08-23 10:31:38', '/home'),
(80, '127.0.0.1', '2022-08-23 10:32:24', '/home'),
(81, '127.0.0.1', '2022-08-23 10:45:24', '/home'),
(82, '127.0.0.1', '2022-08-23 10:45:27', '/home'),
(83, '127.0.0.1', '2022-08-23 10:46:02', '/home'),
(84, '127.0.0.1', '2022-08-23 10:47:13', '/home');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `addresses_delivery`
--
ALTER TABLE `addresses_delivery`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `items_sales`
--
ALTER TABLE `items_sales`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `product_views`
--
ALTER TABLE `product_views`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `addresses_delivery`
--
ALTER TABLE `addresses_delivery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `items_sales`
--
ALTER TABLE `items_sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `product_views`
--
ALTER TABLE `product_views`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `views`
--
ALTER TABLE `views`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
