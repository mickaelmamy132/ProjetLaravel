-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 18 déc. 2023 à 14:21
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestiondetenus`
--

-- --------------------------------------------------------

--
-- Structure de la table `condamners`
--

CREATE TABLE `condamners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ecrou_prevenus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `naissance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cartier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commune` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_delivrance` date DEFAULT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalité` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marié` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enfant` int(11) DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cartier1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commune1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacte` int(11) DEFAULT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_status` date NOT NULL,
  `situation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_situation` date DEFAULT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ageDate` int(50) NOT NULL,
  `date_ecrou` date NOT NULL,
  `inculpation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unite_peine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mandataire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_observation` date DEFAULT NULL,
  `date_fin_peine` date DEFAULT NULL,
  `remise_peine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unite_remise_peine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_fin_remise_peine` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `condamners`
--

INSERT INTO `condamners` (`id`, `ecrou_prevenus`, `numero`, `type`, `nom`, `prenom`, `naissance`, `cartier`, `commune`, `district`, `region`, `cin`, `date_delivrance`, `lieu`, `nationalité`, `profession`, `pere`, `mere`, `marié`, `enfant`, `adresse`, `cartier1`, `district1`, `region1`, `commune1`, `contacte`, `categorie`, `status`, `date_status`, `situation`, `date_situation`, `sexe`, `age`, `ageDate`, `date_ecrou`, `inculpation`, `classification`, `photo`, `peine`, `unite_peine`, `mandataire`, `observation`, `date_observation`, `date_fin_peine`, `remise_peine`, `unite_remise_peine`, `date_fin_remise_peine`, `created_at`, `updated_at`) VALUES
(9, '13', '32', 'co/23/je', 'tahina', 'jimmy', '2004-12-13 08:15:39', 'andaboly', 'urbaine', 'antsimo andrefana', 'antsimo andrefana', NULL, NULL, 'tulear', 'malagasy', 'vendeur', 'radida', 'françine', 'célibataire', NULL, 'andavale', 'ambaipaiso', 'fianarantsoa', 'fianarantsoa', 'urbaine', 347859875, 'condamner', 'Emprisonnement', '2023-12-07', 'en detention(e)', '2023-12-15', 'Femme', 'majeur', 18, '2023-12-15', 'vole a main armeé', NULL, '1702369308.jpg', '05', 'mois', 'malala', NULL, NULL, '2024-05-20', NULL, NULL, NULL, '2023-12-12 05:21:48', '2023-12-12 05:21:48'),
(11, '154', '025', 'RP/23/je', 'yelle', 'randra', '2005-12-13 10:49:57', 'antsora', 'urbaine', 'antsimo andrefana', 'anda', NULL, NULL, 'maninday', 'malagasy', 'etudant', 'rakoto', 'françine', 'célibataire', NULL, 'andavale', 'ambaipaiso', 'fianarantsoa', 'andavale3', 'jhkh', 329509687, 'condamner', 'Travaux Force', '2023-10-14', 'en detention(e)', '2023-10-14', 'Femme', 'majeur', 18, '2023-10-14', 'vole,trouble', 'DPAC', '1702464597.jpg', '05,09', 'mois,mois', 'le juge lalaina', NULL, NULL, '2024-12-14', NULL, NULL, NULL, '2023-12-13 07:49:57', '2023-12-13 07:49:57'),
(12, '156', '027', 'cr/23/je', 'tax', 'jimmy', '2003', 'antsora', 'urbaine', 'antsimo andrefana', 'anda', NULL, NULL, 'maninday', 'malagasy', 'etudant', 'rakoto', 'françine', 'célibataire', NULL, 'andavale', 'ambaipaiso', 'fianarantsoa', 'andavale3', 'jhkh', 329509687, 'condamner', 'Travaux Force', '2023-10-14', 'en detention(e)', '2023-10-14', 'Femme', 'majeur', 20, '2023-10-14', 'viole', NULL, '1702464698.jpg', '06', 'mois', 'le juge lalaina', NULL, NULL, '2024-04-14', NULL, NULL, NULL, '2023-12-13 07:51:38', '2023-12-13 07:51:38');

-- --------------------------------------------------------

--
-- Structure de la table `condamner_histories`
--

CREATE TABLE `condamner_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `condamner_id` int(11) NOT NULL,
  `situation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_situation` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_status` date DEFAULT NULL,
  `observation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_observation` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `condamner_histories`
--

INSERT INTO `condamner_histories` (`id`, `condamner_id`, `situation`, `date_situation`, `status`, `date_status`, `observation`, `date_observation`, `created_at`, `updated_at`) VALUES
(9, 5, 'en detention(e)', '2023-11-22', 'Travaux Force', '2023-11-22', NULL, NULL, '2023-12-08 02:48:49', '2023-12-08 02:48:49'),
(10, 6, 'transfere(e)', '2023-12-09', 'Travaux Force', '2023-12-09', NULL, NULL, '2023-12-09 17:42:04', '2023-12-09 17:42:04'),
(11, 7, 'en detention(e)', '2023-11-21', 'Travaux Force', '2023-11-21', NULL, NULL, '2023-12-11 03:21:33', '2023-12-11 03:21:33'),
(12, 8, 'en detention(e)', '2023-12-07', 'Detention préventive', '2023-12-07', NULL, NULL, '2023-12-11 05:12:37', '2023-12-11 05:12:37'),
(13, 5, NULL, NULL, 'Libérè', '2023-12-11', NULL, NULL, '2023-12-11 05:36:35', '2023-12-11 05:36:35'),
(14, 8, NULL, NULL, 'Libérè', '2023-12-12', NULL, NULL, '2023-12-12 04:53:00', '2023-12-12 04:53:00'),
(15, 9, 'en detention(e)', '2023-12-15', 'Emprisonnement', '2023-12-15', NULL, NULL, '2023-12-12 05:21:48', '2023-12-12 05:21:48'),
(16, 10, 'en detention(e)', '2023-12-30', 'Detention préventive', '2023-12-07', NULL, NULL, '2023-12-12 05:39:01', '2023-12-12 05:39:01'),
(17, 10, 'en detention(e)', '2023-12-31', 'Detention préventive', '2023-12-07', NULL, NULL, '2023-12-12 05:50:43', '2023-12-12 05:50:43'),
(18, 11, 'en detention(e)', '2023-10-14', 'Travaux Force', '2023-10-14', NULL, NULL, '2023-12-13 07:49:57', '2023-12-13 07:49:57'),
(19, 12, 'en detention(e)', '2023-10-14', 'Travaux Force', '2023-10-14', NULL, NULL, '2023-12-13 07:51:39', '2023-12-13 07:51:39');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `liberers`
--

CREATE TABLE `liberers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numero` int(255) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ecrou_prevenus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `naissance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cartier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commune` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalité` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_delivrance` date DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marié` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enfant` int(11) DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cartier1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commune1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacte` int(11) DEFAULT NULL,
  `categorie` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ageDate` int(25) NOT NULL,
  `date_liberation` date NOT NULL,
  `date_ecrou` date DEFAULT NULL,
  `date_condamnation` date DEFAULT NULL,
  `inculpation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mandataire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `liberers`
--

INSERT INTO `liberers` (`id`, `numero`, `type`, `ecrou_prevenus`, `nom`, `prenom`, `naissance`, `lieu`, `cartier`, `commune`, `district`, `region`, `nationalité`, `cin`, `date_delivrance`, `profession`, `pere`, `mere`, `marié`, `enfant`, `adresse`, `cartier1`, `commune1`, `region1`, `district1`, `contacte`, `categorie`, `status`, `sexe`, `age`, `ageDate`, `date_liberation`, `date_ecrou`, `date_condamnation`, `inculpation`, `mandataire`, `observation`, `photo`, `created_at`, `updated_at`) VALUES
(19, 1, 'cr/23/je', '5', 'mamy', 'mickael', '2000-12-08 05:46:48', 'tuleat', NULL, NULL, NULL, 'antsimo', 'malagasy', '2545454545', '2019-12-08', 'etudant', 'rakoto', 'rasoa', 'célibataire', NULL, 'andavale', NULL, NULL, NULL, NULL, 32695657, 'Accuses', 'Libérè', 'Homme', 'majeur', 23, '2023-12-23', '2023-10-08', NULL, 'trouble', 'malala', NULL, '1702063785.jpg', '2023-12-08 16:29:45', '2023-12-08 16:29:45'),
(21, 32, 'co/23/je', '12', 'tahina', 'jimmy', '2002-12-12 06:32:37', 'tulear', 'andaboly', 'urbaine', 'antsimo andrefana', 'antsimo andrefana', 'malagasy', NULL, NULL, 'vendeur', 'radida', 'françine', 'veuf(ve)', NULL, 'andavale', 'ambaipaiso', 'urbaine', 'fianarantsoa', 'fianarantsoa', 347859875, 'Prevenus', 'Libérè', 'Femme', 'majeur', 21, '2023-12-12', '2023-07-13', NULL, 'vole a main armeé', 'malala', NULL, '1702366613.jpg', '2023-12-12 04:36:53', '2023-12-12 04:36:53'),
(22, 32, 'co/23/je', '11', 'tahina', 'jimmy', '2004', 'tulear', 'andaboly', 'urbaine', 'antsimo andrefana', 'antsimo andrefana', 'malagasy', NULL, NULL, 'vendeur', 'radida', 'françine', 'célibataire', NULL, 'andavale', 'ambaipaiso', 'urbaine', 'fianarantsoa', 'fianarantsoa', 347859875, 'Accuses', 'Libérè', 'Homme', 'majeur', 19, '2023-12-14', '2023-10-08', NULL, 'vole a main armeé', 'malala', NULL, '1702367453.jpg', '2023-12-12 04:50:53', '2023-12-12 04:50:53');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_10_08_172005_create_utilisateurs_table', 2),
(5, '2023_10_10_084556_create_condamners_table', 3),
(6, '2023_10_12_063115_create_prevenuses_table', 4),
(7, '2023_10_16_105242_create_liberers_table', 5),
(8, '2023_10_31_112631_create_condamner_histories_table', 6),
(9, '2023_10_31_115324_create_prevenus_histories_table', 7),
(10, '2023_11_05_073218_create_condamner_histories_table', 8),
(11, '2023_11_05_073405_create_prevenus_histories_table', 8),
(12, '2023_11_07_115036_create_condamners_table', 9),
(13, '2023_11_07_115203_create_prevenuses_table', 9),
(14, '2023_11_29_191552_create_prevenuses_table', 10),
(15, '2023_11_29_192244_create_condamners_table', 11),
(16, '2023_11_29_192556_create_prevenus_histories_table', 12),
(17, '2023_11_29_193111_create_condamner_histories_table', 13);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prevenuses`
--

CREATE TABLE `prevenuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numero` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `naissance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cartier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commune` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_delivrance` date DEFAULT NULL,
  `nationalité` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marié` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enfant` int(11) DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cartier1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commune1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacte` int(11) DEFAULT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_status` date DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_etat` date DEFAULT NULL,
  `situation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_situation` date DEFAULT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ageDate` int(11) NOT NULL,
  `date_ecrou` date NOT NULL,
  `inculpation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unite_peine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mandataire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_observation` date DEFAULT NULL,
  `date_fin_peine` date DEFAULT NULL,
  `remise_peine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unite_remise_peine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_fin_remise_peine` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `prevenuses`
--

INSERT INTO `prevenuses` (`id`, `numero`, `type`, `nom`, `prenom`, `naissance`, `lieu`, `cartier`, `region`, `district`, `commune`, `cin`, `date_delivrance`, `nationalité`, `profession`, `pere`, `mere`, `marié`, `enfant`, `adresse`, `cartier1`, `district1`, `region1`, `commune1`, `contacte`, `categorie`, `status`, `date_status`, `etat`, `date_etat`, `situation`, `date_situation`, `sexe`, `age`, `ageDate`, `date_ecrou`, `inculpation`, `classification`, `photo`, `peine`, `unite_peine`, `mandataire`, `observation`, `date_observation`, `date_fin_peine`, `remise_peine`, `unite_remise_peine`, `date_fin_remise_peine`, `created_at`, `updated_at`) VALUES
(16, 12, 'co/23/je', 'tahina', 'jimmy', '2000-12-13 11:09:41', 'tulear', 'andaboly', 'antsimo andrefana', 'antsimo andrefana', 'urbaine', NULL, NULL, 'malagasy', 'vendeur', 'radida', 'françine', 'célibataire', NULL, 'andavale', 'ambaipaiso', 'fianarantsoa', 'fianarantsoa', 'urbaine', 347859875, 'Accuses', 'non jugé', '2023-12-13', NULL, NULL, 'en detention(e)', '2023-12-13', 'Homme', 'majeur', 23, '2023-09-13', 'vole a main armeé', NULL, '/img/image_default_1.jpg', NULL, NULL, 'malala', NULL, NULL, '2024-06-13', NULL, NULL, NULL, '2023-12-13 08:09:41', '2023-12-13 08:09:41');

-- --------------------------------------------------------

--
-- Structure de la table `prevenus_histories`
--

CREATE TABLE `prevenus_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prevenus_id` int(11) NOT NULL,
  `situation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_situation` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_status` date DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_etat` date DEFAULT NULL,
  `observation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_observation` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `prevenus_histories`
--

INSERT INTO `prevenus_histories` (`id`, `prevenus_id`, `situation`, `date_situation`, `status`, `date_status`, `etat`, `date_etat`, `observation`, `date_observation`, `created_at`, `updated_at`) VALUES
(30, 10, 'en detention(e)', '2023-10-05', 'non jugé', '2023-10-05', NULL, NULL, NULL, NULL, '2023-12-11 04:52:13', '2023-12-11 04:52:13'),
(31, 10, 'en detention(e)', '2023-10-05', 'non jugé', '2023-10-05', NULL, NULL, 'prolonge de 02', '2023-12-11', '2023-12-11 04:54:15', '2023-12-11 04:54:15'),
(32, 10, 'en detention(e)', '2023-12-07', 'Detention préventive', '2023-12-07', NULL, NULL, 'prolonge de 02 mois', '2023-12-11', '2023-12-11 04:57:16', '2023-12-11 04:57:16'),
(33, 10, 'en detention(e)', '2023-12-07', 'Detention préventive', '2023-12-07', NULL, NULL, 'prolonge de 02 mois', '2023-12-11', '2023-12-11 04:58:24', '2023-12-11 04:58:24'),
(34, 10, 'en detention(e)', '2023-11-09', 'Detention préventive', '2023-12-09', NULL, NULL, 'prolonge de 02 mois', '2023-12-11', '2023-12-11 04:59:51', '2023-12-11 04:59:51'),
(35, 11, 'en detention(e)', '2023-12-12', 'non jugé', '2023-12-12', NULL, NULL, NULL, NULL, '2023-12-12 02:59:27', '2023-12-12 02:59:27'),
(36, 12, 'en detention(e)', '2023-12-13', 'non jugé', '2023-12-13', NULL, NULL, NULL, NULL, '2023-12-12 03:32:37', '2023-12-12 03:32:37'),
(37, 12, NULL, NULL, 'Libérè', '2023-12-12', NULL, NULL, NULL, NULL, '2023-12-12 04:36:53', '2023-12-12 04:36:53'),
(38, 11, NULL, NULL, 'Libérè', '2023-12-14', NULL, NULL, NULL, NULL, '2023-12-12 04:50:53', '2023-12-12 04:50:53'),
(39, 13, 'en detention(e)', '2023-12-15', 'non jugé', '2023-12-15', NULL, NULL, NULL, NULL, '2023-12-12 05:15:40', '2023-12-12 05:15:40'),
(40, 13, 'en detention( e )', '2023-12-20', 'Emprisonnement', '2023-12-20', NULL, NULL, NULL, NULL, '2023-12-12 05:16:18', '2023-12-12 05:16:18'),
(41, 14, 'en detention(e)', '2023-12-15', 'non jugé', '2023-12-15', NULL, NULL, NULL, NULL, '2023-12-12 05:25:49', '2023-12-12 05:25:49'),
(42, 14, 'en detention(e)', '2023-12-30', 'Detention préventive', '2023-12-30', NULL, NULL, NULL, NULL, '2023-12-12 05:26:44', '2023-12-12 05:26:44'),
(43, 15, 'en detention(e)', '2023-12-15', 'non jugé', '2023-12-15', NULL, NULL, NULL, NULL, '2023-12-12 05:30:26', '2023-12-12 05:30:26'),
(44, 15, 'en detention(e)', '2023-12-30', 'Detention préventive', '2023-12-30', NULL, NULL, NULL, NULL, '2023-12-12 05:32:13', '2023-12-12 05:32:13'),
(45, 16, 'en detention(e)', '2023-12-13', 'non jugé', '2023-12-13', NULL, NULL, NULL, NULL, '2023-12-13 08:09:41', '2023-12-13 08:09:41');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mickael', 'mickael@gmail.com', NULL, '$2y$10$DTEjKQiHW7W6H8zoVUoV9OZ96RMK.grmql2pOq5WL2Vt0.m1uFaUe', NULL, '2023-11-03 15:33:35', '2023-11-03 15:33:35');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `photo`, `password`, `created_at`, `updated_at`) VALUES
(17, 'mickael', '1702903562.jpg', '$2y$10$1aBJlIBvYJG8DXWudXjI3uSM6dSjqwiQLxyMcBKki6jxwoD7Q/7SC', '2023-12-08 02:10:40', '2023-12-18 09:46:02'),
(18, 'yelle', '1702888982.jpg', '$2y$10$CHVyq2BsM5haP60AS7fFVuIGM3LQ8kfhlNJYprTwiykxTdg4rb5D2', '2023-12-11 06:06:31', '2023-12-18 05:43:19');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `condamners`
--
ALTER TABLE `condamners`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `condamner_histories`
--
ALTER TABLE `condamner_histories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `liberers`
--
ALTER TABLE `liberers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `prevenuses`
--
ALTER TABLE `prevenuses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prevenus_histories`
--
ALTER TABLE `prevenus_histories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `condamners`
--
ALTER TABLE `condamners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `condamner_histories`
--
ALTER TABLE `condamner_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `liberers`
--
ALTER TABLE `liberers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prevenuses`
--
ALTER TABLE `prevenuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `prevenus_histories`
--
ALTER TABLE `prevenus_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
