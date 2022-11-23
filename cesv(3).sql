-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Nov-2022 às 12:09
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cesv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `pg` varchar(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cat` varchar(5) NOT NULL,
  `cnh` varchar(255) NOT NULL,
  `idt_mil` varchar(255) NOT NULL,
  `val_cnh` date NOT NULL,
  `contact` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `driver`
--

INSERT INTO `driver` (`id`, `pg`, `name`, `cat`, `cnh`, `idt_mil`, `val_cnh`, `contact`, `full_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Sd', 'Teste', 'B', '58948847474', '888.888.888-8', '2022-11-24', '51980204586', 'Teste Teste Teste', '2022-11-15 06:42:28', '2022-11-16 02:29:17', NULL),
(3, 'Cb', 'Dallaxa', 'E', '85855848888', '884.565.254-5', '2022-11-16', '51997466715', 'Dallas Derby Calton', '2022-11-15 11:55:56', '2022-11-16 03:03:46', '2022-11-16 03:03:46'),
(4, 'Cb', 'Teste 4', 'E', '77568383838', '032.567.866-5', '2022-11-30', '51980204587', 'Teste teste teste', '2022-11-16 00:22:50', '2022-11-16 02:29:07', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fichas`
--

CREATE TABLE `fichas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nr_ficha` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mot` bigint(20) NOT NULL,
  `pg_seg` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_seg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nat_of_serv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `od_total` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `id_vtr` int(11) NOT NULL,
  `id_mission` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `fichas`
--

INSERT INTO `fichas` (`id`, `nr_ficha`, `id_mot`, `pg_seg`, `name_seg`, `nat_of_serv`, `in_order`, `od_total`, `status`, `id_vtr`, `id_mission`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2525', 2, 'Sd', 'EDINILSON', 'SERVIÇO', 'Fisc Adm', 21, 2, 1, 0, '2022-11-10 18:55:37', '2022-11-15 02:01:54', NULL),
(3, '2020', 3, NULL, NULL, 'gmbepn', 'Fisc Adm', 20, 2, 1, 0, '2022-11-15 16:08:08', '2022-11-16 00:31:50', NULL),
(4, '1012', 4, 'Cb', 'Celso', 'Serviço', 'Fisc Adm', NULL, 1, 1, 0, '2022-11-16 03:27:59', '2022-11-16 03:27:59', NULL),
(5, '7667', 2, NULL, NULL, 'Jzjsdj', 'Fisc Adm', NULL, 1, 3, 0, '2022-11-16 03:53:47', '2022-11-16 03:53:47', NULL),
(6, '8383', 4, NULL, NULL, 'Ududjd', 'COST', NULL, 1, 4, 0, '2022-11-16 03:54:06', '2022-11-16 03:54:06', NULL),
(7, '8983', 4, NULL, NULL, 'Jdndjd', 'Fisc Adm', NULL, 1, 5, 0, '2022-11-16 03:54:26', '2022-11-16 03:54:26', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_11_03_083330_missions', 1),
(3, '2022_11_03_090710_rel_gda', 1),
(4, '2022_11_03_105439_viatura', 1),
(5, '2022_11_03_225145_fichas', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `missions`
--

CREATE TABLE `missions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_mission` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mission_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destiny` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vtr` int(11) NOT NULL,
  `doc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `pg_mot` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_mot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pg_seg` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_seg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prev_date_part` datetime NOT NULL,
  `prev_date_chgd` datetime NOT NULL,
  `contact` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finish_mission` datetime DEFAULT NULL,
  `cons_gas` int(11) DEFAULT NULL,
  `cons_diesel` int(11) DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `vol` int(11) DEFAULT NULL,
  `alteration` int(11) DEFAULT NULL,
  `obs_alteration` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_relat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `missions`
--

INSERT INTO `missions` (`id`, `type_mission`, `mission_name`, `destiny`, `class`, `vtr`, `doc`, `origin`, `status`, `pg_mot`, `name_mot`, `pg_seg`, `name_seg`, `prev_date_part`, `prev_date_chgd`, `contact`, `obs`, `finish_mission`, `cons_gas`, `cons_diesel`, `peso`, `vol`, `alteration`, `obs_alteration`, `email_relat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'OP', 'Feno', '3º RCG', 'I', 0, 'dec 888', 'OM', 3, '', '', '1º Sgt', 'Teste', '2022-11-14 02:10:00', '2022-11-14 02:10:00', '5551982805511', '<p>Teste<br></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-14 17:11:05', '2022-11-15 00:29:17', NULL),
(2, 'OP', 'Teste op', 'TesteDEst', 'IV', 0, 'TesteTesteTesteTeste', 'TesteTeste', 3, '', '', 'Gen', 'Teste', '2022-10-18 01:52:00', '2022-11-18 01:52:00', '5555626515631', '<p>TesteTesteTesteTesteTesteTeste<br></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-18 16:52:27', '2022-11-19 01:44:14', NULL),
(3, 'OP', 'Teste OM', 'Om', 'IV', 0, 'Teste', 'OM', 3, '', '', 'TC', 'wrtçwrtgb', '2022-11-11 10:28:00', '2022-11-09 10:28:00', '5555524656482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-19 01:28:21', '2022-11-19 02:02:34', NULL),
(4, 'OP', 'Teste OM', 'Om', 'X', 0, 'Teste', 'OM', 3, '', '', 'TC', 'wrtçwrtgb', '2022-10-11 10:28:00', '2022-11-09 10:28:00', '5555524656482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-19 01:28:21', '2022-11-19 02:02:34', NULL),
(5, 'OP', 'Teste OM', 'Om', 'IV', 0, 'Teste', 'OM', 3, '', '', 'TC', 'wrtçwrtgb', '2022-11-11 10:28:00', '2022-11-09 10:28:00', '5555524656482', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-19 01:28:21', '2022-11-19 02:02:34', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `profile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `profiles`
--

INSERT INTO `profiles` (`id`, `id_user`, `profile`) VALUES
(1, 1, 0),
(2, 53, 1),
(3, 54, 2),
(4, 55, 3),
(5, 56, 4),
(6, 57, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rel_gda`
--

CREATE TABLE `rel_gda` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_veicle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pg_mot` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_mot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pg_seg` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_seg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idt` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mod_veicle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placaeb` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passengers` int(11) DEFAULT NULL,
  `destiny` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `obs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `om` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `od_ent` int(11) DEFAULT NULL,
  `od_sai` int(11) DEFAULT NULL,
  `total_od` int(11) DEFAULT NULL,
  `hour_ent` datetime DEFAULT NULL,
  `hour_sai` datetime DEFAULT NULL,
  `id_ficha` int(11) DEFAULT NULL,
  `id_mot` bigint(20) NOT NULL,
  `status` int(11) NOT NULL,
  `user_rel_ent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_rel_sai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `rel_gda`
--

INSERT INTO `rel_gda` (`id`, `type_veicle`, `pg_mot`, `name_mot`, `pg_seg`, `name_seg`, `idt`, `mod_veicle`, `placaeb`, `passengers`, `destiny`, `obs`, `om`, `od_ent`, `od_sai`, `total_od`, `hour_ent`, `hour_sai`, `id_ficha`, `id_mot`, `status`, `user_rel_ent`, `user_rel_sai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(42, 'op', 'Cb', 'Dallas', 'Cb', 'Eduardo', NULL, 'VTE MARRUA TESTE', '8695742685', NULL, 'Viatura de serviço', NULL, NULL, 580, 560, 20, '2022-11-15 18:43:00', '2022-11-15 18:42:00', 3, 0, 2, 'Cb Eduardo', 'Cb Eduardo', '2022-11-15 21:42:24', '2022-11-15 21:43:21', NULL),
(43, 'op', 'Cb', 'Dallas', 'Cb', 'ervevr', NULL, 'VTE MARRUA TESTE', '8695742685', NULL, 'Viatura de serviço', NULL, NULL, 999, 580, 419, '2022-11-16 01:02:00', '2022-11-15 18:46:00', 3, 0, 2, 'Cb Eduardo', 'Cb Eduardo', '2022-11-15 21:47:43', '2022-11-16 04:02:56', NULL),
(44, 'op', 'Cb', 'Teste 4', 'Cb', 'Celso', NULL, 'VTE MARRUA TESTE', '8695742685', NULL, 'Viatura de serviço', NULL, NULL, 670, 560, 110, '2022-11-16 01:02:00', '2022-11-16 01:01:00', 4, 0, 2, 'Cb Eduardo', 'Cb Eduardo', '2022-11-16 04:01:19', '2022-11-16 04:02:35', NULL),
(45, 'adm', 'Cb', 'Teste 4', '2º Ten', 'Jdjd', NULL, 'FRONTIER', 'GHU8389', NULL, 'Viatura de serviço', NULL, NULL, NULL, 9898, NULL, NULL, '2022-11-16 01:03:00', 6, 4, 1, NULL, 'Cb Eduardo', '2022-11-16 04:03:36', '2022-11-18 03:54:54', '2022-11-18 03:54:54'),
(46, 'op', 'Sd', 'Teste', '1º Ten', 'Jssjd', NULL, '5TON T', '8374728284', NULL, 'Viatura de serviço', NULL, NULL, 9899, 9898, 1, '2022-11-16 01:06:00', '2022-11-16 01:05:00', 5, 0, 2, 'Cb Eduardo', 'Cb Eduardo', '2022-11-16 04:05:44', '2022-11-16 04:06:37', NULL),
(47, 'civil', NULL, 'civiviv', NULL, NULL, '322232123123', 'ffwefwef', '12312312312', 1, 'asafa', NULL, 'Civil', NULL, NULL, NULL, '2022-11-18 00:54:00', '2022-11-18 00:55:00', NULL, 0, 2, 'Cb Eduardo', NULL, '2022-11-18 03:55:29', '2022-11-18 03:55:41', NULL),
(48, 'oom', 'Maj', 'csdcasdcsd', 'Maj', 'dcsdcasdcdc', '341.341.234-1', 'casdcasd', 'asdcasdc', NULL, 'adcasdas', NULL, 'abcde', NULL, NULL, NULL, '2022-11-18 00:56:00', '2022-11-18 00:56:00', NULL, 0, 2, 'Cb Eduardo', NULL, '2022-11-18 03:56:44', '2022-11-18 03:56:51', NULL),
(49, 'op', 'Cb', 'Teste 4', 'Cb', 'Celso', NULL, 'VTE MARRUA TESTE', '8695742685', NULL, 'Viatura de serviço', NULL, '3º B Sup', 76, 51, 25, '2022-11-23 00:23:00', '2022-11-23 00:13:00', 4, 4, 2, 'Cb Eduardo', 'Cb Eduardo', '2022-11-23 03:13:55', '2022-11-23 03:23:13', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `viatura`
--

CREATE TABLE `viatura` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nr_vtr` int(11) NOT NULL,
  `mod_vtr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_vtr` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ebplaca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ton` int(11) NOT NULL,
  `vol` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `obs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `viatura`
--

INSERT INTO `viatura` (`id`, `nr_vtr`, `mod_vtr`, `type_vtr`, `ebplaca`, `ton`, `vol`, `status`, `obs`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 'VTE MARRUA TESTE', 'op', '8695742685', 54, 20, 1, NULL, '2022-11-10 18:54:30', '2022-11-16 03:32:41', NULL),
(2, 7, '5TON', 'op', '1038476294', 5, 20, 1, '<p>Viatura Ok</p>', '2022-11-16 00:13:23', '2022-11-16 03:09:02', '2022-11-16 03:09:02'),
(3, 58, '5TON T', 'op', '8374728284', 5, 20, 1, NULL, '2022-11-16 03:49:31', '2022-11-16 03:49:31', NULL),
(4, 8, 'FRONTIER', 'adm', 'GHU8389', 1, 2, 1, NULL, '2022-11-16 03:50:10', '2022-11-16 03:50:10', NULL),
(5, 9, 'FIURINO', 'adm', 'Jhd9987', 2, 40, 1, NULL, '2022-11-16 03:52:26', '2022-11-16 03:54:51', '2022-11-16 03:54:51');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fichas`
--
ALTER TABLE `fichas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `rel_gda`
--
ALTER TABLE `rel_gda`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `viatura`
--
ALTER TABLE `viatura`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `fichas`
--
ALTER TABLE `fichas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `missions`
--
ALTER TABLE `missions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `rel_gda`
--
ALTER TABLE `rel_gda`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `viatura`
--
ALTER TABLE `viatura`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
