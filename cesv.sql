-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Nov-2022 às 05:13
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
-- Estrutura da tabela `ficha`
--

CREATE TABLE `ficha` (
  `id` bigint(20) NOT NULL,
  `nr_ficha` varchar(30) NOT NULL,
  `nome_mot` varchar(255) NOT NULL,
  `vtr_id` int(11) NOT NULL,
  `pg_mot` varchar(255) NOT NULL,
  `pg_seg` varchar(6) DEFAULT NULL,
  `name_seg` varchar(255) DEFAULT NULL,
  `por_ord` varchar(255) NOT NULL,
  `id_mission` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ficha`
--

INSERT INTO `ficha` (`id`, `nr_ficha`, `nome_mot`, `vtr_id`, `pg_mot`, `pg_seg`, `name_seg`, `por_ord`, `id_mission`) VALUES
(1, '1227/2022', 'Baldino', 1, 'Sd', NULL, NULL, 'Cap Joarez', 0),
(2, '1228/2022', 'Bald', 1, 'Sd', NULL, NULL, 'Cap Joarez', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `missions`
--

CREATE TABLE `missions` (
  `id` bigint(11) NOT NULL,
  `type_mission` varchar(2) NOT NULL,
  `status` int(11) NOT NULL,
  `mission_name` varchar(255) NOT NULL,
  `destiny` varchar(255) NOT NULL,
  `class` varchar(5) NOT NULL,
  `vtr` int(11) NOT NULL,
  `doc` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `pg_mot` varchar(6) NOT NULL,
  `name_mot` varchar(255) NOT NULL,
  `pg_seg` varchar(6) NOT NULL,
  `name_seg` varchar(255) NOT NULL,
  `prev_date_part` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `prev_date_chgd` timestamp NULL DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `obs` mediumtext NOT NULL,
  `finish_mission` datetime DEFAULT NULL,
  `od_ini` int(30) DEFAULT NULL,
  `od_fin` int(30) DEFAULT NULL,
  `cons_gas` int(20) DEFAULT NULL,
  `cons_diesel` int(20) DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `vol` int(11) DEFAULT NULL,
  `alteration` int(11) DEFAULT NULL,
  `obs_alteration` text DEFAULT NULL,
  `email_relat` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `missions`
--

INSERT INTO `missions` (`id`, `type_mission`, `status`, `mission_name`, `destiny`, `class`, `vtr`, `doc`, `origin`, `pg_mot`, `name_mot`, `pg_seg`, `name_seg`, `prev_date_part`, `prev_date_chgd`, `contact`, `obs`, `finish_mission`, `od_ini`, `od_fin`, `cons_gas`, `cons_diesel`, `peso`, `vol`, `alteration`, `obs_alteration`, `email_relat`, `updated_at`, `created_at`, `deleted_at`) VALUES
(5, 'OP', 0, 'Feno', '3º B Com', 'X', 1, 'DOC/2022', '3º B Sup', 'Cb', 'Joemlo', '3º Sgt', 'Cadin', '2022-11-03 01:14:18', '2022-11-17 13:14:00', '5551980204586', '<p>erewropwet~bm<br></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-02 01:15:48', '2022-11-02 01:15:48', NULL),
(6, 'OP', 0, 'Carne', '3º B Log', 'V-arm', 4, 'DOC-21/2022', 'OM', '3º Sgt', 'Teste', 'Cap', 'Testa', '2022-11-03 03:54:38', '2022-11-30 13:20:00', '5551980204586', '<p>mfvçelvmev<br></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-03 03:54:20', '2022-11-02 01:20:16', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rel_gda`
--

CREATE TABLE `rel_gda` (
  `id` bigint(11) NOT NULL,
  `type_veicle` varchar(5) NOT NULL,
  `pg_mot` varchar(10) NOT NULL,
  `nome_mot` varchar(255) NOT NULL,
  `pg_seg` varchar(5) NOT NULL,
  `nome_seg` int(11) NOT NULL,
  `idt` varchar(255) NOT NULL,
  `mod_veicle` varchar(255) NOT NULL,
  `placaeb` varchar(30) NOT NULL,
  `passengers` int(11) NOT NULL,
  `destiny` varchar(255) NOT NULL,
  `obs` mediumtext NOT NULL,
  `OM` varchar(255) NOT NULL,
  `od_ent` int(11) NOT NULL,
  `od_sai` int(11) NOT NULL,
  `hora_ent` datetime NOT NULL,
  `hora_sai` datetime NOT NULL,
  `nr_ficha` int(11) NOT NULL,
  `id_veicle` int(11) NOT NULL,
  `id_mission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `viatura`
--

CREATE TABLE `viatura` (
  `id` bigint(11) NOT NULL,
  `nr_vtr` int(11) NOT NULL,
  `mod_vtr` varchar(255) NOT NULL,
  `type_vtr` varchar(15) NOT NULL,
  `ebplaca` varchar(255) NOT NULL,
  `ton` int(11) NOT NULL,
  `vol` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `obs` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `viatura`
--

INSERT INTO `viatura` (`id`, `nr_vtr`, `mod_vtr`, `type_vtr`, `ebplaca`, `ton`, `vol`, `status`, `obs`) VALUES
(1, 5, 'AGR MARRUA /Diesel', 'OP', '16949', 3, 50, 1, 'ta bonbando'),
(3, 6, 'AGR MARRUA /Diesel', 'OP', '58245', 3, 50, 1, 'ta bonbando'),
(4, 3, 'AGR MARRUA /Diesel', 'OP', '25789', 3, 50, 1, 'ta bonbando');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `missions`
--
ALTER TABLE `missions`
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
-- AUTO_INCREMENT de tabela `ficha`
--
ALTER TABLE `ficha`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `missions`
--
ALTER TABLE `missions`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `rel_gda`
--
ALTER TABLE `rel_gda`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `viatura`
--
ALTER TABLE `viatura`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
