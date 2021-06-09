-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 09, 2020 at 09:41 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Miyazaki`
--

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `film_id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `annee` int(4) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `trailers` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`film_id`, `nom`, `annee`, `note`, `image`, `trailers`) VALUES
(1, 'Le chateau ambulant', 2004, 'inspiré de l\'ésthétique steampunk', 'https://upload.wikimedia.org/wikipedia/en/a/a0/Howls-moving-castleposter.jpg', 'https://www.youtube.com/watch?v=hhdopPrI68Q'),
(2, 'Mon voisin totoro', 1988, 'Ode à la découverte de la nature par de jeunes filles', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6e/My_Neighbor_Totoro_Logo_fr.svg/981px-My_Neighbor_Totoro_Logo_fr.svg.png', 'https://www.youtube.com/watch?v=jD-6_0h4KwM&amp;t=0s'),
(3, 'LE VOYAGE DE CHIHIRO', 2002, 'L\'héroisme d\'une fille perdu au milieu d\'un monde imaginaire', 'https://upload.wikimedia.org/wikipedia/en/d/db/Spirited_Away_Japanese_poster.png', 'https://www.youtube.com/watch?v=bWrPauTUHd4'),
(4, 'Princesse Mononoke', 1997, 'Voyage au sein d\'un pays qui place l\'industrie avant le respect de la nature', 'https://upload.wikimedia.org/wikipedia/en/8/8c/Princess_Mononoke_Japanese_poster.png', 'https://www.youtube.com/watch?v=3JG6JDuZUoc'),
(5, 'Porco Rosso', 1992, 'Histoire du porc vaillant surnomé le porc rouge dans l\'époque des hydravions', 'https://upload.wikimedia.org/wikipedia/en/f/fc/Porco_Rosso_%28Movie_Poster%29.jpg', 'https://www.youtube.com/watch?v=ZKWQiT1O0zg&amp;t=0s');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genre_id` int(11) NOT NULL,
  `genre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `genre`) VALUES
(3, 'aventure'),
(11, 'aviation'),
(1, 'drame'),
(2, 'fantasy'),
(9, 'heroisme'),
(12, 'pirate');

-- --------------------------------------------------------

--
-- Table structure for table `genres_films`
--

CREATE TABLE `genres_films` (
  `id` int(11) NOT NULL,
  `id_films` int(255) NOT NULL,
  `genres_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genres_films`
--

INSERT INTO `genres_films` (`id`, `id_films`, `genres_id`) VALUES
(2, 1, 1),
(3, 1, 2),
(4, 1, 3),
(5, 2, 3),
(6, 3, 3),
(7, 3, 2),
(8, 4, 3),
(9, 4, 2),
(10, 4, 9),
(11, 5, 3),
(12, 5, 11),
(13, 5, 12);

-- --------------------------------------------------------

--
-- Table structure for table `heros`
--

CREATE TABLE `heros` (
  `id` int(11) NOT NULL,
  `noms` varchar(100) DEFAULT NULL,
  `film` int(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `heros`
--

INSERT INTO `heros` (`id`, `noms`, `film`, `description`, `role`) VALUES
(1, 'Jenkins Pendragon', 1, 'Possède le chateau ambulant', 'sorcier'),
(2, 'Sophie Hatter', 1, 'Innocente jeune fille qui se fait transformer par la sorcière', 'héroine'),
(3, 'Totoro', 2, 'Esprit légendaire de la forêt.', 'emblème du studio Ghibli'),
(4, 'Catbus', 2, 'Un grand chat à douze pates qui sert de transport en commun', 'Bus'),
(5, 'Satsuki Kusakabe', 2, 'La fille ainée de la famille Kusakabe.', 'Héroine'),
(6, 'Madame Gina', 5, 'Chante admirablement bien. Est veuve 3 fois.', 'Chanteuse d\'opéra'),
(7, 'Marco Pagot', 5, 'Un humain qui a été transformé en cochon. Est un chasseur de prime connu sous le nom Porco Rosso', 'Hero'),
(8, 'Mononoke', 4, 'Princesse élevée par les loups. Se destine a protéger la foret de la menace humaine', 'Heroine'),
(9, 'Calcifer', 1, 'Feu vivant qui permet au chateaud de se déplacer', 'feu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`film_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`),
  ADD UNIQUE KEY `genre` (`genre`);

--
-- Indexes for table `genres_films`
--
ALTER TABLE `genres_films`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_films` (`id_films`),
  ADD KEY `genres_id` (`genres_id`);

--
-- Indexes for table `heros`
--
ALTER TABLE `heros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film` (`film`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `genres_films`
--
ALTER TABLE `genres_films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `heros`
--
ALTER TABLE `heros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `genres_films`
--
ALTER TABLE `genres_films`
  ADD CONSTRAINT `genres_films_ibfk_1` FOREIGN KEY (`id_films`) REFERENCES `films` (`film_id`),
  ADD CONSTRAINT `genres_films_ibfk_2` FOREIGN KEY (`genres_id`) REFERENCES `genres` (`genre_id`);

--
-- Constraints for table `heros`
--
ALTER TABLE `heros`
  ADD CONSTRAINT `heros_ibfk_1` FOREIGN KEY (`film`) REFERENCES `films` (`film_id`);