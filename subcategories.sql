-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 22, 2019 at 02:33 PM
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
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `subcategory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory`, `slug`, `created_at`, `updated_at`) VALUES
(1, 3, 'Supervisor Mina', 'dolorum', '2019-12-19 04:48:08', '2019-12-19 04:48:08'),
(2, 2, 'Superintendente de Mantenimiento', 'Superintendente-de-Mantenimiento', '2019-12-19 04:48:08', '2019-12-19 04:48:08'),
(3, 6, 'Geólogo Senior', 'Geólogo-Senior', '2019-12-19 04:48:08', '2019-12-19 04:48:08'),
(4, 7, 'Ingeniero de medio ambiente', 'Ingeniero-de-medio-ambiente', '2019-12-19 04:48:08', '2019-12-19 04:48:08'),
(5, 9, 'Ingeniero de seguridad', 'Ingeniero-de-seguridad', '2019-12-19 04:48:08', '2019-12-19 04:48:08'),
(6, 8, 'Administrador mina', 'Administrador-mina', '2019-12-19 04:48:08', '2019-12-19 04:48:08'),
(7, 8, 'Jefe de logística', 'Jefe-de-logística', '2019-12-19 04:48:08', '2019-12-19 04:48:08'),
(8, 7, 'Auxiliar de medio ambiente', 'Auxiliar-de-medio-ambiente', '2019-12-19 04:48:08', '2019-12-19 04:48:08'),
(9, 7, 'Superintendente de Ambiente', 'Superintendente-de-Ambiente', '2019-12-19 04:48:09', '2019-12-19 04:48:09'),
(10, 8, 'Almacén', 'Almacén', '2019-12-19 04:48:09', '2019-12-19 04:48:09'),
(11, 5, 'Supervisor de Operaciones', 'Supervisor-de-Operaciones', '2019-12-19 04:48:09', '2019-12-19 04:48:09'),
(12, 2, 'Jefe de Mantenimiento', 'Jefe-de-Mantenimiento', '2019-12-19 04:48:09', '2019-12-19 04:48:09'),
(13, 4, 'Operadores equipos de producción', 'Operadores-equipos-de-producción', '2019-12-19 04:48:09', '2019-12-19 04:48:09'),
(14, 5, 'Supervisor de planta', 'Supervisor-de-planta', '2019-12-19 04:48:09', '2019-12-19 04:48:09'),
(15, 10, 'Topógrafos', 'Topógrafos', '2019-12-19 04:48:09', '2019-12-19 04:48:09'),
(16, 6, 'Geólogo de exploraciones', 'Geólogo-de-exploraciones', '2019-12-19 04:48:09', '2019-12-19 04:48:09'),
(17, 4, 'Operadores-equipos-auxiliares', 'Operadores-equipos-auxiliares', '2019-12-19 04:48:09', '2019-12-19 04:48:09'),
(18, 10, 'Ingeniero Geodésico', 'Ingeniero-Geodésico', '2019-12-19 04:48:09', '2019-12-19 04:48:09'),
(19, 6, 'Geólogo Ore Control', 'Geólogo-Ore-Control', '2019-12-19 04:48:09', '2019-12-19 04:48:09'),
(20, 7, 'Gerente ambiental', 'Gerente-ambiental', '2019-12-19 04:48:09', '2019-12-19 04:48:09'),
(21, 4, 'Operadores múltiples', 'Operadores-múltiples', '2019-12-19 04:48:09', '2019-12-19 04:48:09'),
(22, 2, 'Mecánicos', 'Mecánicos', '2019-12-19 04:48:10', '2019-12-19 04:48:10'),
(23, 2, 'Soldadores', 'Soldadores', '2019-12-19 04:48:10', '2019-12-19 04:48:10'),
(24, 2, 'Electricistas', 'Electricistas', '2019-12-19 04:48:10', '2019-12-19 04:48:10'),
(25, 1, 'Ingeniero senior de minería', 'Ingeniero-senior-de-minería', '2019-12-19 04:48:10', '2019-12-19 04:48:10'),
(26, 3, 'Maestros Perforistas', 'Maestros-Perforistas', '2019-12-19 04:48:10', '2019-12-19 04:48:10'),
(27, 5, 'Supervisor de servicios auxiliares', 'Supervisor-de-servicios-auxiliares', '2019-12-19 04:48:10', '2019-12-19 04:48:10'),
(28, 3, 'Ayudantes Perforistas', 'Ayudantes-Perforistas', '2019-12-19 04:48:10', '2019-12-19 04:48:10'),
(29, 2, 'Ayudantes Mecánicos', 'Ayudantes-Mecánicos', '2019-12-19 04:48:10', '2019-12-19 04:48:10'),
(30, 1, 'Superintendente de Operaciones', 'Superintendente-de-Operaciones', '2019-12-19 04:48:10', '2019-12-19 04:48:10'),
--
-- Indexes for dumped tables
--

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
