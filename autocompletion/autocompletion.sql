-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2024 at 12:47 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autocompletion`
--

-- --------------------------------------------------------

--
-- Table structure for table `foodtruck`
--

CREATE TABLE `foodtruck` (
  `id` int NOT NULL,
  `nom` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pays` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `foodtruck`
--

INSERT INTO `foodtruck` (`id`, `nom`, `pays`, `type`, `description`) VALUES
(1, 'Sushi', 'Japon', 'plat', 'Délicieux riz en petites bouchées avec diverses garnitures.'),
(2, 'Pizza', 'Italie', 'plat', 'Pâte à pizza garnie de sauce tomate, fromage et divers ingrédients.'),
(3, 'Tacos', 'Mexique', 'plat', 'Tortillas pliées ou roulées, garnies de divers ingrédients.'),
(4, 'Pad Thai', 'Thaïlande', 'plat', 'Nouilles de riz sautées avec de la pâte de tamarin, des légumes et de la protéine.'),
(5, 'Croissant', 'France', 'plat', 'Pâtisserie feuilletée au beurre originaire de France.'),
(6, 'Curry', 'Inde', 'plat', 'Variété de plats avec une sauce contenant un mélange d\'épices et d\'herbes.'),
(7, 'Paella', 'Espagne', 'plat', 'Plat espagnol de riz avec diverses combinaisons de fruits de mer, viande et légumes.'),
(8, 'Kimchi', 'Corée', 'plat', 'Légumes fermentés, généralement du chou, avec du piment et de l\'ail.'),
(9, 'Goulash', 'Hongrie', 'plat', 'Ragoût de viande et de légumes assaisonné de paprika et d\'autres épices.'),
(10, 'Pho', 'Vietnam', 'plat', 'Soupe vietnamienne composée de bouillon de nouilles de riz et d\'herbes.'),
(11, 'Pasta Carbonara', 'Italie', 'plat', 'Pâtes aux œufs, fromage, pancetta et poivre noir.'),
(12, 'Hamburger', 'États-Unis', 'plat', 'Pain fourré avec un steak haché, souvent garni de laitue, de tomate et de fromage.'),
(13, 'Dim Sum', 'Chine', 'plat', 'Variété de petits plats traditionnellement servis dans des paniers vapeur.'),
(14, 'Ceviche', 'Pérou', 'plat', 'Poisson cru mariné dans du jus d\'agrumes, généralement avec oignons, poivrons et coriandre.'),
(15, 'Moussaka', 'Grèce', 'plat', 'Casserole en couches avec aubergine, viande hachée et sauce béchamel.'),
(16, 'Churrasco', 'Brésil', 'plat', 'Viande grillée, généralement du bœuf, souvent servie avec une sauce chimichurri.'),
(17, 'Poutine', 'Canada', 'plat', 'Frites recouvertes de fromage en grains et nappées de sauce au jus de viande.'),
(18, 'Tandoori Chicken', 'Inde', 'plat', 'Poulet mariné dans du yaourt et des épices, cuit dans un tandoor (four en argile).'),
(19, 'Peking Duck', 'Chine', 'plat', 'Plat de canard rôti avec une peau croustillante, souvent servi avec de la sauce hoisin et des crêpes.'),
(20, 'Gyros', 'Grèce', 'plat', 'Viande, généralement d\'agneau ou de poulet, cuite sur une broche verticale, servie dans un pain plat.'),
(21, 'Ramen', 'Japon', 'plat', 'Plat japonais de soupe de nouilles avec des nouilles de blé et du bouillon.'),
(22, 'Couscous', 'Maroc', 'plat', 'Boulettes de semoule de blé écrasée, généralement servies avec un ragoût par-dessus.'),
(23, 'Sashimi', 'Japon', 'plat', 'Tranches fines de poisson cru, souvent servies avec de la sauce soja et du wasabi.'),
(24, 'Kebab', 'Moyen-Orient', 'plat', 'Brochettes de viande grillée, généralement servies avec des légumes et du riz ou du pain.'),
(25, 'Mole Poblano', 'Mexique', 'plat', 'Sauce riche à base de piments, de chocolat et d\'autres ingrédients souvent servie avec de la viande.'),
(26, 'Wiener Schnitzel', 'Autriche', 'plat', 'Escalope de veau ou de porc, panée et frite, généralement servie avec du citron.'),
(27, 'Tom Yum Goong', 'Thaïlande', 'plat', 'Soupe épicée et aigre aux crevettes avec des herbes et des épices.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foodtruck`
--
ALTER TABLE `foodtruck`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foodtruck`
--
ALTER TABLE `foodtruck`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
