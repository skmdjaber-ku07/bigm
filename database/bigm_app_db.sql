-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2022 at 06:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bigm_app_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upazila` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `division`, `district`, `upazila`, `address_details`, `language`, `photo`, `cv`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '{\"id\":3,\"name\":\"Dhaka\"}', '{\"id\":6,\"name\":\"Kishoreganj\"}', '{\"id\":185,\"name\":\"Kishoreganj Sadar\"}', 'Roshidabad', '[\"bangla\",\"english\",\"french\"]', NULL, NULL, 2, '2022-09-26 22:38:06', '2022-09-26 22:38:06'),
(2, '{\"id\":8,\"name\":\"Mymensingh\"}', '{\"id\":10,\"name\":\"Mymensingh\"}', '{\"id\":217,\"name\":\"Mymensingh Sadar\"}', 'Vabkhali', '[\"bangla\",\"english\"]', NULL, NULL, 3, '2022-09-26 22:38:06', '2022-09-26 22:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_exam`
--

CREATE TABLE `applicant_exam` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicant_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `institute_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute_id` bigint(20) UNSIGNED NOT NULL,
  `result` double(8,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_exam`
--

INSERT INTO `applicant_exam` (`id`, `applicant_id`, `exam_id`, `institute_type`, `institute_id`, `result`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'board', 3, 4.50, '2022-09-26 22:38:06', '2022-09-26 22:38:06'),
(2, 1, 2, 'board', 3, 4.70, '2022-09-26 22:38:06', '2022-09-26 22:38:06'),
(3, 1, 3, 'university', 13, 3.50, '2022-09-26 22:38:06', '2022-09-26 22:38:06'),
(4, 1, 4, 'university', 3, 3.70, '2022-09-26 22:38:06', '2022-09-26 22:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Barisal', '2022-09-26 22:38:08', '2022-09-26 22:38:08'),
(2, 'Chittagong', '2022-09-26 22:38:08', '2022-09-26 22:38:08'),
(3, 'Comilla', '2022-09-26 22:38:08', '2022-09-26 22:38:08'),
(4, 'Dhaka', '2022-09-26 22:38:08', '2022-09-26 22:38:08'),
(5, 'Dinajpur', '2022-09-26 22:38:08', '2022-09-26 22:38:08'),
(6, 'Jessore', '2022-09-26 22:38:08', '2022-09-26 22:38:08'),
(7, 'Mymensingh', '2022-09-26 22:38:08', '2022-09-26 22:38:08'),
(8, 'Rajshahi', '2022-09-26 22:38:08', '2022-09-26 22:38:08'),
(9, 'Sylhet', '2022-09-26 22:38:08', '2022-09-26 22:38:08'),
(10, 'Madrasah', '2022-09-26 22:38:08', '2022-09-26 22:38:08'),
(11, 'Technical', '2022-09-26 22:38:08', '2022-09-26 22:38:08'),
(12, 'DIBS(Dhaka)', '2022-09-26 22:38:08', '2022-09-26 22:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('board','university') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `level`, `created_at`, `updated_at`) VALUES
(1, 'SSC/Equivalent', 'board', '2022-09-26 22:38:09', '2022-09-26 22:38:09'),
(2, 'HSC/Equivalent', 'board', '2022-09-26 22:38:09', '2022-09-26 22:38:09'),
(3, 'Graduation/Equivalent', 'university', '2022-09-26 22:38:09', '2022-09-26 22:38:09'),
(4, 'Masters/Equivalent', 'university', '2022-09-26 22:38:09', '2022-09-26 22:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(14, '2022_09_21_053103_create_exams_table', 1),
(15, '2022_09_21_053150_create_applicants_table', 1),
(16, '2022_09_21_053418_create_boards_table', 1),
(17, '2022_09_21_053645_create_universities_table', 1),
(18, '2022_09_22_145799_create_trainings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `name`, `details`, `applicant_id`, `created_at`, `updated_at`) VALUES
(1, 'PGD', 'Post Graduation Diploma', 1, '2022-09-26 22:38:10', '2022-09-26 22:38:10'),
(2, 'CCNA', 'CCNA exam covers networking fundamentals, IP services, security fundamentals, automation and programmability. Designed for agility and versatility', 1, '2022-09-26 22:38:10', '2022-09-26 22:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'University of Dhaka', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(2, 'University of Rajshahi', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(3, 'Bangladesh Agricultural University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(4, 'Bangladesh University of Engineering & Technology', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(5, 'University of Chittagong', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(6, 'Jahangirnagar University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(7, 'Islamic University, Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(8, 'Shahjalal University of Science and Technology', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(9, 'Khulna University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(10, 'Bangabandhu Sheikh Mujib Medical University ', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(11, 'Bangabandhu Sheikh Mujibur Rahman Agricultural University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(12, 'Hajee Mohammad Danesh Science & Technology University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(13, 'Mawlana Bhashani Science and Technology University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(14, 'Patuakhali Science and Technology University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(15, 'Sher-e-Bangla Agricultural University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(16, 'Dhaka University of Engineering & Technology', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(17, 'Rajshahi University of Engineering & Technology', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(18, 'Chittagong University of Engineering & Technology', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(19, 'Khulna University of Engineering & Technology', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(20, 'Jagannath University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(21, 'Jatiya Kabi Kazi Nazrul Islam University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(22, 'Chittagong Veterinary and Animal Sciences University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(23, 'Sylhet Agricultural University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(24, 'Comilla University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(25, 'Noakhali Science and Technology University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(26, 'Jessore University of Science & Technology', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(27, 'Pabna University of Science and Technology', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(28, 'Bangladesh University of Professionals', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(29, 'Begum Rokeya University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(30, 'Bangladesh University of Textiles', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(31, 'University of Barisal', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(32, 'Bangabandhu Sheikh Mujibur Rahman Science and Technology University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(33, 'Islamic Arabic University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(34, 'Bangabandhu Sheikh Mujibur Rahman Maritime University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(35, 'Rangamati Science and Technology University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(36, 'Dhaka International University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(37, 'Ahsanullah University of Science and Technology', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(38, 'BRAC University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(39, 'East West University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(40, 'North South University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(41, 'American International University-Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(42, 'Independent University, Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(43, 'Bangladesh University of Business and Technology', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(44, 'Gono Bishwabidyalay', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(45, 'Hamdard University Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(46, 'International Islamic University, Chittagong', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(47, 'Chittagong Independent University (CIU)', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(48, 'University of Science & Technology Chittagong', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(49, 'Begum Gulchemonara Trust University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(50, 'East Delta University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(51, 'Bangladesh Army University of Science and Technology', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(52, 'Bangladesh Army International University of Science & Technology', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(53, 'Britannia University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(54, 'Feni University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(55, 'Bangladesh Army University of Engineering & Technology', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(56, 'Premier University, Chittagong', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(57, 'Exim Bank Agricultural University Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(58, 'Southern University, Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(59, 'Port City International University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(60, 'Coxs Bazar International University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(61, 'Notre Dame University Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(62, 'Asian University of Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(63, 'Asa University Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(64, 'Atish Dipankar University of Science and Technology', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(65, 'Bangladesh Islami University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(66, 'Bangladesh University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(67, 'Central Women\'s University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(68, 'City University, Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(69, 'Daffodil International University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(70, 'Eastern University, Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(71, 'Green University of Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(72, 'IBAIS University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(73, 'Sonargaon University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(74, 'International University of Business Agriculture and Technology', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(75, 'Manarat International University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(76, 'Millennium University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(77, 'Northern University, Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(78, 'North Western University, Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(79, 'People\'s University of Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(80, 'Presidency University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(81, 'Pundra University of Science and Technology', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(82, 'Prime University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(83, 'European University of Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(84, 'Primeasia University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(85, 'Queens University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(86, 'Rajshahi Science & Technology University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(87, 'Royal University of Dhaka', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(88, 'Shanto-Mariam University of Creative Technology', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(89, 'Southeast University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(90, 'Stamford University Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(91, 'State University of Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(92, 'United International University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(93, 'University of Asia Pacific (Bangladesh)', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(94, 'University of Development Alternative', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(95, 'University of Information Technology and Sciences', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(96, 'University of Liberal Arts Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(97, 'Fareast International University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(98, 'University of South Asia, Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(99, 'Uttara University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(100, 'Victoria University of Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(101, 'Varendra University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(102, 'World University of Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(103, 'Leading University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(104, 'Metropolitan University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(105, 'North East University Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(106, 'Sylhet International University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(107, 'Khwaja Yunus Ali University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(108, 'Global University Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(109, 'University of Creative Technology Chittagong', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(110, 'Z H Sikder University of Science & Technology', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(111, 'Central University of Science and Technology', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(112, 'Canadian University of Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(113, 'First Capital University of Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(114, 'Ishaka International University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(115, 'Northern University of Business & Technology, Khulna', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(116, 'North Bengal International University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(117, 'Ranada Prasad Shaha University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(118, 'Islamic University of Technology', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(119, 'Asian University for Women', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(120, 'Bangladesh Open University', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(121, 'National University of Bangladesh', '2022-09-26 22:38:07', '2022-09-26 22:38:07'),
(122, 'Islamic Arabic University', '2022-09-26 22:38:07', '2022-09-26 22:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('admin','applicant') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'applicant',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `type`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin', 'admin@gmail.com', '2022-09-26 22:38:05', '$2y$10$BVedMf4hHCW0EvVW6CzQ2.TgyBvkQCjLHyAnG4CJ3q7XD2qzhFu..', '9j4mqBlGfO', '2022-09-26 22:38:05', '2022-09-26 22:38:05'),
(2, 'Mamun', 'applicant', 'bdabdulla@gmail.com', '2022-09-26 22:38:05', '$2y$10$YD2nXV7l4z0DRw3G.BCcqeXlx2bE4Blg7GbHBeqxtuMsFYb/aal/6', 'amoRGW04tt', '2022-09-26 22:38:05', '2022-09-26 22:38:05'),
(3, 'Mhabub', 'applicant', 'mhabub@gmail.com', '2022-09-26 22:38:05', '$2y$10$iSW5VAiGfkWmKEmu4pL9m.o.i94sH9llpuX5bnK5iof3oWiEIjiyW', 'XflqZbQkDw', '2022-09-26 22:38:05', '2022-09-26 22:38:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicants_user_id_foreign` (`user_id`);

--
-- Indexes for table `applicant_exam`
--
ALTER TABLE `applicant_exam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_exam_institute_type_institute_id_index` (`institute_type`,`institute_id`);

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainings_applicant_id_foreign` (`applicant_id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applicant_exam`
--
ALTER TABLE `applicant_exam`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `trainings_applicant_id_foreign` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
