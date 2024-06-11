-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 09:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ncms`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2024_06_10_000257_add_reason_to_patients_table', 2),
(11, '2024_06_10_113849_create_patient_visits_table', 2),
(12, '2024_06_08_235103_create_patients_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `registration_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `last_name`, `date_of_birth`, `gender`, `contact_number`, `email`, `address`, `registration_date`, `created_at`, `updated_at`) VALUES
(1, 'new', 'syent', '2003-11-12', 'Female', '234542122', 'asdfasdfa@adf', 'asdfasdf', '2024-06-11', '2024-06-10 22:43:06', '2024-06-10 22:43:06'),
(2, 'John', 'Doe', '1990-05-25', 'Male', '123456789', 'johndoe@email.com', '123 Main St', '2024-06-11', '2024-06-10 22:43:06', '2024-06-10 22:43:06'),
(3, 'Jane', 'Smith', '1985-12-10', 'Female', '987654321', 'janesmith@email.com', '456 Elm St', '2024-06-11', '2024-06-10 22:43:06', '2024-06-10 22:43:06'),
(4, 'Michael', 'Johnson', '1978-08-15', 'Male', '555888777', 'michaeljohnson@email.com', '789 Oak St', '2024-06-11', '2024-06-10 22:43:06', '2024-06-10 22:43:06'),
(5, 'Emily', 'Brown', '1995-03-20', 'Female', '444333222', 'emilybrown@email.com', '101 Pine St', '2024-06-11', '2024-06-10 22:43:06', '2024-06-10 22:43:06'),
(6, 'Christopher', 'Lee', '1982-11-30', 'Male', '111222333', 'christopherlee@email.com', '222 Maple St', '2024-06-11', '2024-06-10 22:43:06', '2024-06-10 22:43:06'),
(7, 'Jessica', 'Wang', '1998-07-05', 'Female', '999000111', 'jessicawang@email.com', '333 Cedar St', '2024-06-11', '2024-06-10 22:43:06', '2024-06-10 22:43:06'),
(8, 'David', 'Garcia', '1976-02-18', 'Male', '666555444', 'davidgarcia@email.com', '444 Walnut St', '2024-06-11', '2024-06-10 22:43:06', '2024-06-10 22:43:06'),
(9, 'Sarah', 'Martinez', '1989-09-10', 'Female', '333222111', 'sarahmartinez@email.com', '555 Birch St', '2024-06-11', '2024-06-10 22:43:06', '2024-06-10 22:43:06'),
(10, 'Matthew', 'Rodriguez', '1992-12-28', 'Male', '777888999', 'matthewrodriguez@email.com', '666 Oak St', '2024-06-11', '2024-06-10 22:43:06', '2024-06-10 22:43:06'),
(11, 'Lauren', 'Lopez', '1987-04-14', 'Female', '111222333', 'laurenlopez@email.com', '777 Pine St', '2024-06-11', '2024-06-10 22:43:06', '2024-06-10 22:43:06'),
(12, 'Kevin', 'Hernandez', '1983-10-08', 'Male', '555666777', 'kevinhernandez@email.com', '888 Maple St', '2024-06-11', '2024-06-10 22:43:06', '2024-06-10 22:43:06'),
(13, 'Ashley', 'Gonzalez', '1991-05-02', 'Female', '999888777', 'ashleygonzalez@email.com', '999 Cedar St', '2024-06-11', '2024-06-10 22:43:06', '2024-06-10 22:43:06'),
(14, 'Daniel', 'Perez', '1979-08-24', 'Male', '666555444', 'danielperez@email.com', '111 Walnut St', '2024-06-11', '2024-06-10 22:43:06', '2024-06-10 22:43:06'),
(15, 'Megan', 'Sanchez', '1996-03-12', 'Female', '333222111', 'megansanchez@email.com', '222 Birch St', '2024-06-11', '2024-06-10 22:43:06', '2024-06-10 22:43:06'),
(16, 'Christopher', 'Ramirez', '1986-12-04', 'Male', '777888999', 'christopherramirez@email.com', '333 Oak St', '2024-06-11', '2024-06-10 22:43:06', '2024-06-10 22:43:06'),
(17, 'Amanda', 'Torres', '1981-07-20', 'Female', '111222333', 'amandatorres@email.com', '444 Pine St', '2024-06-11', '2024-06-10 22:43:06', '2024-06-10 22:43:06'),
(18, 'James', 'Nguyen', '1990-01-15', 'Male', '555666777', 'jamesnguyen@email.com', '555 Maple St', '2024-06-11', '2024-06-10 22:43:06', '2024-06-10 22:43:06'),
(19, 'Stephanie', 'Kim', '1984-04-30', 'Female', '999888777', 'stephaniekim@email.com', '666 Cedar St', '2024-06-11', '2024-06-10 22:43:06', '2024-06-10 22:43:06'),
(111, 'new', 'syent', '2003-11-12', 'Female', '234542122', 'asdfasdfa@adf', 'asdfasdf', '2024-06-11', '2024-06-10 22:43:06', '2024-06-10 22:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `patient_visits`
--

CREATE TABLE `patient_visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `visit_date` date NOT NULL,
  `purpose` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_visits`
--

INSERT INTO `patient_visits` (`id`, `patient_id`, `visit_date`, `purpose`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-06-11', 'tumakki', '2024-06-10 22:38:06', '2024-06-10 22:38:06'),
(2, 1, '2024-06-11', 'Cleaning', '2024-06-10 22:40:16', '2024-06-10 22:40:16'),
(3, 1, '2024-06-11', 'asdfasdf', '2024-06-10 22:43:32', '2024-06-10 22:43:32'),
(4, 2, '2024-06-11', 'Checkup', '2024-06-10 22:45:10', '2024-06-10 22:45:10'),
(5, 2, '2024-06-11', 'X-Ray', '2024-06-10 22:46:24', '2024-06-10 22:46:24'),
(6, 3, '2024-06-11', 'Consultation', '2024-06-10 22:48:50', '2024-06-10 22:48:50'),
(7, 3, '2024-06-11', 'Prescription Refill', '2024-06-10 22:50:12', '2024-06-10 22:50:12'),
(8, 4, '2024-06-11', 'Dental Checkup', '2024-06-10 22:52:39', '2024-06-10 22:52:39'),
(9, 4, '2024-06-11', 'Teeth Cleaning', '2024-06-10 22:54:03', '2024-06-10 22:54:03'),
(10, 5, '2024-06-11', 'Eye Exam', '2024-06-10 22:56:22', '2024-06-10 22:56:22'),
(11, 5, '2024-06-11', 'Vision Correction', '2024-06-10 22:57:45', '2024-06-10 22:57:45'),
(12, 6, '2024-06-11', 'Physical Examination', '2024-06-10 22:59:58', '2024-06-10 22:59:58'),
(13, 6, '2024-06-11', 'Blood Test', '2024-06-10 23:01:21', '2024-06-10 23:01:21'),
(14, 7, '2024-06-11', 'Flu Shot', '2024-06-10 23:03:45', '2024-06-10 23:03:45'),
(15, 7, '2024-06-11', 'Vaccination', '2024-06-10 23:05:09', '2024-06-10 23:05:09'),
(16, 8, '2024-06-11', 'Allergy Test', '2024-06-10 23:07:31', '2024-06-10 23:07:31'),
(17, 8, '2024-06-11', 'Medication Review', '2024-06-10 23:08:54', '2024-06-10 23:08:54'),
(18, 9, '2024-06-11', 'Ultrasound', '2024-06-10 23:11:17', '2024-06-10 23:11:17'),
(19, 9, '2024-06-11', 'Prenatal Checkup', '2024-06-10 23:12:41', '2024-06-10 23:12:41'),
(20, 10, '2024-06-11', 'Dietary Consultation', '2024-06-10 23:15:03', '2024-06-10 23:15:03'),
(21, 10, '2024-06-11', 'Nutritional Assessment', '2024-06-10 23:16:27', '2024-06-10 23:16:27'),
(22, 11, '2024-06-11', 'Counseling Session', '2024-06-10 23:18:51', '2024-06-10 23:18:51'),
(23, 11, '2024-06-11', 'Therapy Session', '2024-06-10 23:20:14', '2024-06-10 23:20:14'),
(24, 12, '2024-06-11', 'MRI Scan', '2024-06-10 23:22:36', '2024-06-10 23:22:36'),
(25, 12, '2024-06-11', 'CT Scan', '2024-06-10 23:24:00', '2024-06-10 23:24:00'),
(26, 13, '2024-06-11', 'Physical Therapy', '2024-06-10 23:26:23', '2024-06-10 23:26:23'),
(27, 13, '2024-06-11', 'Occupational Therapy', '2024-06-10 23:27:47', '2024-06-10 23:27:47'),
(28, 14, '2024-06-11', 'Cardiac Stress Test', '2024-06-10 23:30:09', '2024-06-10 23:30:09'),
(29, 14, '2024-06-11', 'Electrocardiogram', '2024-06-10 23:31:33', '2024-06-10 23:31:33'),
(30, 15, '2024-06-11', 'Colonoscopy', '2024-06-10 23:33:55', '2024-06-10 23:33:55'),
(111, 1, '2024-06-11', 'tumakki', '2024-06-10 22:38:06', '2024-06-10 22:38:06'),
(222, 1, '2024-06-11', 'Cleaning', '2024-06-10 22:40:16', '2024-06-10 22:40:16'),
(322, 1, '2024-06-11', 'asdfasdf', '2024-06-10 22:43:32', '2024-06-10 22:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'foo', 'foo@mail.com', NULL, '$2y$10$dE4NsnUQi/PIcR0/xrukUOV4CNdHTOgK1DJB4CoLGLhYZXXHT.ejC', NULL, '2024-06-09 06:16:44', '2024-06-09 06:17:19'),
(2, 'antonette', 'antonette@gmail.com', NULL, '$2y$10$hFcc2PVYlidVbwwat3kukO4OLOfalCIvysnoScUqLAd08MvbMsSdi', NULL, '2024-06-10 21:49:10', '2024-06-10 21:49:10'),
(3, 'admin', 'admin@gmail.com', NULL, '$2y$10$9SVT3DKfvMl6.JBMrKOfiuHNVy4/KnNzAAFO/XJHVkGOVHZXa3wzm', NULL, '2024-06-10 22:13:01', '2024-06-10 22:13:01');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_visits`
--
ALTER TABLE `patient_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_visits_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `patient_visits`
--
ALTER TABLE `patient_visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient_visits`
--
ALTER TABLE `patient_visits`
  ADD CONSTRAINT `patient_visits_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
