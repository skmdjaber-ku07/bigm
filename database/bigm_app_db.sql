-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2022 at 07:51 PM
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
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upazila` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `user_id`, `language`, `division`, `district`, `upazila`, `address_details`, `photo`, `cv`, `created_at`, `updated_at`) VALUES
(1, 2, '[\"bangla\",\"english\",\"french\"]', '{\"id\":3,\"name\":\"Dhaka\"}', '{\"id\":6,\"name\":\"Kishoreganj\"}', '{\"id\":185,\"name\":\"Kishoreganj Sadar\"}', 'Roshidabad', NULL, NULL, '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(2, 3, '[\"bangla\",\"english\"]', '{\"id\":8,\"name\":\"Mymensingh\"}', '{\"id\":10,\"name\":\"Mymensingh\"}', '{\"id\":217,\"name\":\"Mymensingh Sadar\"}', 'Vabkhali', NULL, NULL, '2022-09-24 11:51:43', '2022-09-24 11:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_exam`
--

CREATE TABLE `applicant_exam` (
  `applicant_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `institute_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute_id` bigint(20) UNSIGNED NOT NULL,
  `result` double(8,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Barisal', '2022-09-24 11:51:44', '2022-09-24 11:51:44'),
(2, 'Chittagong', '2022-09-24 11:51:44', '2022-09-24 11:51:44'),
(3, 'Comilla', '2022-09-24 11:51:44', '2022-09-24 11:51:44'),
(4, 'Dhaka', '2022-09-24 11:51:44', '2022-09-24 11:51:44'),
(5, 'Dinajpur', '2022-09-24 11:51:44', '2022-09-24 11:51:44'),
(6, 'Jessore', '2022-09-24 11:51:44', '2022-09-24 11:51:44'),
(7, 'Mymensingh', '2022-09-24 11:51:44', '2022-09-24 11:51:44'),
(8, 'Rajshahi', '2022-09-24 11:51:44', '2022-09-24 11:51:44'),
(9, 'Sylhet', '2022-09-24 11:51:44', '2022-09-24 11:51:44'),
(10, 'Madrasah', '2022-09-24 11:51:44', '2022-09-24 11:51:44'),
(11, 'Technical', '2022-09-24 11:51:44', '2022-09-24 11:51:44'),
(12, 'DIBS(Dhaka)', '2022-09-24 11:51:44', '2022-09-24 11:51:44');

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
(1, 'SSC/Equivalent', 'board', '2022-09-24 11:51:44', '2022-09-24 11:51:44'),
(2, 'HSC/Equivalent', 'board', '2022-09-24 11:51:44', '2022-09-24 11:51:44'),
(3, 'Graduation/Equivalent', 'university', '2022-09-24 11:51:44', '2022-09-24 11:51:44'),
(4, 'Masters/Equivalent', 'university', '2022-09-24 11:51:44', '2022-09-24 11:51:44');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_21_053103_create_exams_table', 1),
(6, '2022_09_21_053418_create_boards_table', 1),
(7, '2022_09_21_053645_create_universities_table', 1),
(8, '2022_09_22_145755_create_applicants_table', 1),
(9, '2022_09_22_145799_create_trainings_table', 1);

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
  `applicant_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'University of Dhaka', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(2, 'University of Rajshahi', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(3, 'Bangladesh Agricultural University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(4, 'Bangladesh University of Engineering & Technology', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(5, 'University of Chittagong', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(6, 'Jahangirnagar University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(7, 'Islamic University, Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(8, 'Shahjalal University of Science and Technology', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(9, 'Khulna University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(10, 'Bangabandhu Sheikh Mujib Medical University ', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(11, 'Bangabandhu Sheikh Mujibur Rahman Agricultural University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(12, 'Hajee Mohammad Danesh Science & Technology University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(13, 'Mawlana Bhashani Science and Technology University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(14, 'Patuakhali Science and Technology University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(15, 'Sher-e-Bangla Agricultural University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(16, 'Dhaka University of Engineering & Technology', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(17, 'Rajshahi University of Engineering & Technology', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(18, 'Chittagong University of Engineering & Technology', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(19, 'Khulna University of Engineering & Technology', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(20, 'Jagannath University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(21, 'Jatiya Kabi Kazi Nazrul Islam University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(22, 'Chittagong Veterinary and Animal Sciences University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(23, 'Sylhet Agricultural University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(24, 'Comilla University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(25, 'Noakhali Science and Technology University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(26, 'Jessore University of Science & Technology', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(27, 'Pabna University of Science and Technology', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(28, 'Bangladesh University of Professionals', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(29, 'Begum Rokeya University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(30, 'Bangladesh University of Textiles', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(31, 'University of Barisal', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(32, 'Bangabandhu Sheikh Mujibur Rahman Science and Technology University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(33, 'Islamic Arabic University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(34, 'Bangabandhu Sheikh Mujibur Rahman Maritime University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(35, 'Rangamati Science and Technology University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(36, 'Dhaka International University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(37, 'Ahsanullah University of Science and Technology', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(38, 'BRAC University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(39, 'East West University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(40, 'North South University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(41, 'American International University-Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(42, 'Independent University, Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(43, 'Bangladesh University of Business and Technology', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(44, 'Gono Bishwabidyalay', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(45, 'Hamdard University Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(46, 'International Islamic University, Chittagong', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(47, 'Chittagong Independent University (CIU)', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(48, 'University of Science & Technology Chittagong', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(49, 'Begum Gulchemonara Trust University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(50, 'East Delta University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(51, 'Bangladesh Army University of Science and Technology', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(52, 'Bangladesh Army International University of Science & Technology', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(53, 'Britannia University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(54, 'Feni University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(55, 'Bangladesh Army University of Engineering & Technology', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(56, 'Premier University, Chittagong', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(57, 'Exim Bank Agricultural University Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(58, 'Southern University, Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(59, 'Port City International University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(60, 'Coxs Bazar International University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(61, 'Notre Dame University Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(62, 'Asian University of Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(63, 'Asa University Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(64, 'Atish Dipankar University of Science and Technology', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(65, 'Bangladesh Islami University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(66, 'Bangladesh University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(67, 'Central Women\'s University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(68, 'City University, Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(69, 'Daffodil International University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(70, 'Eastern University, Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(71, 'Green University of Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(72, 'IBAIS University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(73, 'Sonargaon University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(74, 'International University of Business Agriculture and Technology', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(75, 'Manarat International University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(76, 'Millennium University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(77, 'Northern University, Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(78, 'North Western University, Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(79, 'People\'s University of Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(80, 'Presidency University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(81, 'Pundra University of Science and Technology', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(82, 'Prime University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(83, 'European University of Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(84, 'Primeasia University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(85, 'Queens University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(86, 'Rajshahi Science & Technology University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(87, 'Royal University of Dhaka', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(88, 'Shanto-Mariam University of Creative Technology', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(89, 'Southeast University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(90, 'Stamford University Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(91, 'State University of Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(92, 'United International University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(93, 'University of Asia Pacific (Bangladesh)', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(94, 'University of Development Alternative', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(95, 'University of Information Technology and Sciences', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(96, 'University of Liberal Arts Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(97, 'Fareast International University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(98, 'University of South Asia, Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(99, 'Uttara University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(100, 'Victoria University of Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(101, 'Varendra University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(102, 'World University of Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(103, 'Leading University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(104, 'Metropolitan University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(105, 'North East University Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(106, 'Sylhet International University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(107, 'Khwaja Yunus Ali University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(108, 'Global University Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(109, 'University of Creative Technology Chittagong', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(110, 'Z H Sikder University of Science & Technology', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(111, 'Central University of Science and Technology', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(112, 'Canadian University of Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(113, 'First Capital University of Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(114, 'Ishaka International University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(115, 'Northern University of Business & Technology, Khulna', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(116, 'North Bengal International University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(117, 'Ranada Prasad Shaha University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(118, 'Islamic University of Technology', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(119, 'Asian University for Women', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(120, 'Bangladesh Open University', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(121, 'National University of Bangladesh', '2022-09-24 11:51:43', '2022-09-24 11:51:43'),
(122, 'Islamic Arabic University', '2022-09-24 11:51:43', '2022-09-24 11:51:43');

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
(1, 'Super Admin', 'admin', 'admin@gmail.com', '2022-09-24 11:51:42', '$2y$10$Bvz.r16PDnHnHcKN34UnEumUutCQaSY1t0rmet0csXgq5eG4v4EvO', '7u5YWyLIBq', '2022-09-24 11:51:42', '2022-09-24 11:51:42'),
(2, 'Mamun', 'applicant', 'bdabdulla@gmail.com', '2022-09-24 11:51:42', '$2y$10$ATHcSSPRIzzbqmmbEY06E.AL8YbSlZKDbv1rX0jbBBvE7oiodjpdG', 'JeMPBYFqv8', '2022-09-24 11:51:42', '2022-09-24 11:51:42'),
(3, 'Mhabub', 'applicant', 'mhabub@gmail.com', '2022-09-24 11:51:42', '$2y$10$EORcKyOIfHOQGPTFomQQOu37BEvT8DETkAPExCSAvynowN78eTh7O', 'm2jjS0xrD0', '2022-09-24 11:51:42', '2022-09-24 11:51:42');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
