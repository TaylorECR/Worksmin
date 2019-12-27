-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 22, 2019 at 02:32 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda-minera`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `icon`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Ingeniería', 'fa-briefcase', 'Ingeniería', '2019-12-19 04:47:56', '2019-12-19 04:47:56'),
(2, 'Mantenimiento/Mecánico', 'fa-pencil-square-o', 'Mantenimiento/Mecánico', '2019-12-19 04:47:56', '2019-12-19 04:47:56'),
(3, 'Producción Mina', 'fa-cutlery', 'Producción-Mina', '2019-12-19 04:47:57', '2019-12-19 04:47:57'),
(4, 'Operadores de maquinaria', 'fa-code', 'Operadores-de-maquinaria', '2019-12-19 04:47:57', '2019-12-19 04:47:57'),
(5, 'Supervisores', 'fa-bar-chart', 'Supervisores', '2019-12-19 04:47:57', '2019-12-19 04:47:57'),
(6, 'Geología y Geociencias', 'fa-pencil', 'Geología-y-Geociencias', '2019-12-19 04:47:57', '2019-12-19 04:47:57'),
(7, 'Ingeniería Ambiental', 'fa-graduation-cap', 'Ingeniería-Ambiental', '2019-12-19 04:47:57', '2019-12-19 04:47:57'),
(8, 'Gestión y Administración', 'fa-bullhorn', 'Gestión-y-Administración', '2019-12-19 04:47:57', '2019-12-19 04:47:57'),
(9, 'Salud y Seguridad', 'fa-briefcase', 'Salud-y-Seguridad', '2019-12-19 04:47:57', '2019-12-19 04:47:57'),
(10, 'Topografía', 'fa-pencil-square-o', 'Topografía', '2019-12-19 04:47:57', '2019-12-19 04:47:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
