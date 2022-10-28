-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Out-2022 às 05:20
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
-- Estrutura da tabela `missions`
--

CREATE TABLE `missions` (
  `id` int(11) NOT NULL,
  `type_mission` varchar(3) NOT NULL,
  `mission_name` varchar(255) NOT NULL,
  `destiny` varchar(255) NOT NULL,
  `class` varchar(3) NOT NULL,
  `vtr` int(11) NOT NULL,
  `doc` varchar(255) NOT NULL,
  `origin` int(11) NOT NULL,
  `pg_mot` varchar(6) NOT NULL,
  `name_mot` varchar(255) NOT NULL,
  `pg_seg` varchar(6) NOT NULL,
  `name_seg` varchar(255) NOT NULL,
  `prev_date_part` datetime NOT NULL,
  `prev_date_chgd` datetime NOT NULL,
  `contact` varchar(255) NOT NULL,
  `obs` mediumtext NOT NULL,
  `finish_mission` datetime NOT NULL,
  `od_ini` int(30) NOT NULL,
  `od_fin` int(30) NOT NULL,
  `cons_gas` int(20) NOT NULL,
  `cons_diesel` int(20) NOT NULL,
  `peso` int(11) NOT NULL,
  `vol` int(11) NOT NULL,
  `alteration` int(11) NOT NULL,
  `obs_alteration` text NOT NULL,
  `email_relat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rel_gda`
--

CREATE TABLE `rel_gda` (
  `id` int(11) NOT NULL,
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
  `id` int(11) NOT NULL,
  `nr_vtr` int(11) NOT NULL,
  `mod_vtr` varchar(255) NOT NULL,
  `ebplaca` varchar(255) NOT NULL,
  `ton` int(11) NOT NULL,
  `vol` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `obs` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `rel_gda`
--
ALTER TABLE `rel_gda`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `rel_gda`
--
ALTER TABLE `rel_gda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
