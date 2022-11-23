-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Nov-2022 às 12:08
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
-- Banco de dados: `sistao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `linkHome` varchar(255) DEFAULT NULL,
  `loading` int(11) DEFAULT 0,
  `special` int(11) DEFAULT NULL,
  `inputUser` varchar(255) DEFAULT NULL,
  `inputPass` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `applications`
--

INSERT INTO `applications` (`id`, `name`, `fullName`, `link`, `linkHome`, `loading`, `special`, `inputUser`, `inputPass`, `created_at`, `updated_at`) VALUES
(2, 'SISBOL', 'Sisma de Boletins', 'https://sisbol.3bsup.eb.mil.br/sisbol.php?login=true', 'https://sisbol.3bsup.eb.mil.br/menuboletim.php', 0, 3, 'nomeUsuario', 'senha', '2021-07-28 17:26:36', '2022-07-28 16:33:31'),
(6, 'SisTAO', 'Sistema de Tático de Apoio Operacional ', 'http://sistao.3bsup.eb.mil.br/', NULL, 0, 1, NULL, NULL, '2021-07-28 17:26:36', '2021-07-28 17:26:36'),
(9, 'SPED', 'Sistema Protocolo Eletronico do Exército', 'https://sped.3bsup.eb.mil.br/sped/administracao/sessao/eb/j_security_check', 'https://sped.3bsup.eb.mil.br/sped/', 0, 3, 'j_username', 'j_password', '2021-07-28 20:41:12', '2022-07-28 14:55:33'),
(30, 'Drive - 3º B Sup', 'Pasta Nuvem 3º B Sup', 'http://', 'http://cloud.3bsup.eb.mil.br', 0, 2, NULL, NULL, '2021-08-23 15:03:25', '2022-07-12 17:52:08'),
(32, '1º CTA -  S/ internet', 'Link para alterar senha proxy', '', 'http://imc.1cta.eb.mil.br/PWD/', 0, 2, NULL, NULL, '2021-08-23 15:13:19', '2022-08-08 19:15:08'),
(33, 'OpLog', 'Operador Logístico & Gestão Militar ( SEF / CGCFEx )', 'http://oplog.sef.eb.mil.br/sila7/login.php', 'http://oplog.sef.eb.mil.br/sila7/login.php', 0, 3, 'fcpf', 'fsnh', '2021-08-24 20:34:06', '2022-07-12 17:24:50'),
(34, 'Mapa Armt', 'Mapa Diário de Armamento', 'https://mapadiario.3bsup.eb.mil.br/sisbol.php?login=true', 'https://mapadiario.3bsup.eb.mil.br/menuboletim.php', 0, 3, 'nomeUsuario', 'senha', '2021-08-24 20:39:02', '2022-07-28 16:45:32'),
(37, 'SCLE', 'Sistema de Controle de Licitações e Empenhos', 'http://', 'http://scle.3bsup.eb.mil.br/index.php/login_mail', 0, 1, 'email', 'txtSenha', '2021-08-24 20:50:25', '2022-07-13 17:16:39'),
(38, 'SAG 2022', 'Sistema de Acompanhamento da Gestão', 'http://10.12.4.42/sag2022/login.php', 'http://10.12.4.42/sag2022/php/', 1, 3, 'cpf', 'senha', '2021-08-25 00:14:57', '2022-07-12 17:45:45'),
(39, 'Zimbra', 'Zimbra Mail', 'https://webmail.3bsup.eb.mil.br/', 'https://webmail.3bsup.eb.mil.br/', 0, 2, 'username', 'password', '2021-08-25 18:58:23', '2022-07-21 22:21:41'),
(40, 'SCC', 'Sistema para Controle de Abastecimentos', 'http://10.25.108.121/scc/index.php?nomeArquivo=principal.php', 'http://10.25.108.121/scc/index.php', 0, 3, 'idt', 'senha', '2021-08-25 20:04:00', '2022-07-12 17:53:51'),
(42, 'S.O.S  - 1° CTA', 'Sistema de Ordem de Serviço - 1º CTA', 'http://suporte.1cta.eb.mil.br/otrs/customer.pl?Action=Login', 'http://suporte.1cta.eb.mil.br/otrs/', 0, 3, 'User', 'Password', '2021-08-30 09:48:05', '2022-07-12 17:54:33'),
(43, 'CPEX', 'Centro de Pagamento do Exército', 'https://sistao.3bsup.eb.mil.br/modules/cpex/login.php', 'https://contrachequecpex.eb.mil.br/area_individual/Default.asp?Pagina=4', 0, 3, 'usuario', 'senha', '2021-09-08 14:08:25', '2022-07-28 17:06:18'),
(46, 'CPEX - UA', 'Centro de Pagamento do Exército - SPP', 'http://cpex-intranet.eb.mil.br/conf_pass_nova.asp', 'http://cpex-intranet.eb.mil.br/', 0, 3, 'User', 'Pass', '2021-09-14 09:46:18', '2022-07-12 17:55:26'),
(47, 'SIPPES', 'Sistema de Pagamento Pessoal', 'https://www.sippes.eb.mil.br/j_security_check?tipoUsuario=C&desafio&envelope', 'https://www.sippes.eb.mil.br/index.jsp', 0, 3, 'j_username', 'j_password', '2021-09-14 10:03:59', '2022-09-27 15:32:55'),
(48, 'SInfoPPes', 'SISTEMA DE INFORMAÇÕES DE PAGAMENTO DE PESSOAL', 'http://sippes.cpex.eb.mil.br/cadastro/logar.php', 'http://sippes.cpex.eb.mil.br/', 0, 3, 'login', 'senha', '2021-09-14 10:08:00', '2022-07-12 17:56:02'),
(49, 'Escalas', 'Escalas', 'http://', 'http://cloud.3bsup.eb.mil.br/pydio/public/escalas', 0, 2, NULL, NULL, '2021-09-14 10:48:08', '2022-07-12 17:56:12'),
(50, 'GLPI', 'Central de Serviços SIPPES', 'http://suportesippes.cpex.eb.mil.br', 'http://suportesippes.cpex.eb.mil.br', 0, 2, 'login_name', 'login_password', '2021-09-14 10:58:04', '2022-07-12 17:56:59'),
(52, 'PARPS', 'Sistema de Registro de Visitantes', 'https://parps.3bsup.eb.mil.br', 'https://parps.3bsup.eb.mil.br', 0, 1, NULL, NULL, '2021-12-08 17:05:24', '2022-07-27 21:05:55'),
(53, 'Arranchamento', 'Sistema de Arranchamento Eletronico', 'http://arranchamento.3bsup.eb.mil.br', 'http://arranchamento.3bsup.eb.mil.br', 0, 1, NULL, NULL, '2022-04-12 22:40:16', '2022-07-12 17:51:31'),
(54, 'CoMiLMed', 'Controle de Militares com Licença Médica', 'http://', 'http://comilmed.3bsup.eb.mil.br', 0, NULL, NULL, NULL, '2022-06-10 12:56:56', '2022-07-12 17:57:48'),
(55, 'Suporte 3º B Sup', 'Sitema de Suporte ao Usuário', 'http://suporte.3bsup.eb.mil.br/front/login.php', 'http://suporte.3bsup.eb.mil.br', 0, 3, NULL, NULL, '2022-06-20 13:21:09', '2022-07-12 17:59:20'),
(56, 'Intranet - ADM', 'Intranet - ADM', 'http://intranet.3bsup.eb.mil.br/administrator/index.php?option=com_login&task=login&return=aW5kZXgucGhw&96fab2b787a8e5256947b44e4861ab3a=1', 'http://intranet.3bsup.eb.mil.br/administrator/', 0, 2, 'username', 'passwd', '2022-06-27 16:58:14', '2022-07-12 17:59:48'),
(57, 'Site OM - ADM', 'Site externo OM', 'http://www.3bsup.eb.mil.br/administrator/index.php?option=com_login&task=login&return=aW5kZXgucGhw&fdb6d6fa0d6732378088ab37157fd8b0=1', 'http://www.3bsup.eb.mil.br/administrator/', 0, 2, 'username', 'passwd', '2022-06-28 12:05:09', '2022-07-12 18:00:04'),
(58, 'SiCaPEx', 'SISTEMA DE CADASTRAMENTO DE PESSOAL DO EXÉRCITO', 'http://sistao.3bsup.eb.mil.br/modules/sicapex/login.php', 'https://sicapex.eb.mil.br/', 0, 3, 'usuario', 'senha', '2022-07-21 14:11:10', '2022-07-21 21:07:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cities`
--

INSERT INTO `cities` (`id`, `name`, `state`, `updated_at`, `created_at`) VALUES
(1, 'Canoas', 'RS', NULL, NULL),
(2, 'Montenegro', 'RS', NULL, NULL),
(4, 'Aceguá', 'RS', '2021-05-25 01:45:39', NULL),
(5, 'Água Santa', 'RS', '2021-05-25 01:45:39', NULL),
(6, 'Agudo', 'RS', '2021-05-25 01:45:39', NULL),
(7, 'Ajuricaba', 'RS', '2021-05-25 01:45:39', NULL),
(8, 'Alecrim', 'RS', '2021-05-25 01:45:39', NULL),
(9, 'Alegrete', 'RS', '2021-05-25 01:45:39', NULL),
(10, 'Alegria', 'RS', '2021-05-25 01:45:39', NULL),
(11, 'Almirante Tamandaré do Sul', 'RS', '2021-05-25 01:45:39', NULL),
(12, 'Alpestre', 'RS', '2021-05-25 01:45:39', NULL),
(13, 'Alto Alegre', 'RS', '2021-05-25 01:45:39', NULL),
(14, 'Alto Feliz', 'RS', '2021-05-25 01:45:39', NULL),
(15, 'Alvorada', 'RS', '2021-05-25 01:45:39', NULL),
(16, 'Amaral Ferrador', 'RS', '2021-05-25 01:45:39', NULL),
(17, 'Ametista do Sul', 'RS', '2021-05-25 01:45:39', NULL),
(18, 'André da Rocha', 'RS', '2021-05-25 01:45:39', NULL),
(19, 'Anta Gorda', 'RS', '2021-05-25 01:45:39', NULL),
(20, 'Antônio Prado', 'RS', '2021-05-25 01:45:39', NULL),
(21, 'Arambaré', 'RS', '2021-05-25 01:45:39', NULL),
(22, 'Araricá', 'RS', '2021-05-25 01:45:39', NULL),
(23, 'Aratiba', 'RS', '2021-05-25 01:45:39', NULL),
(24, 'Arroio do Meio', 'RS', '2021-05-25 01:45:39', NULL),
(25, 'Arroio do Padre', 'RS', '2021-05-25 01:45:39', NULL),
(26, 'Arroio do Sal', 'RS', '2021-05-25 01:45:39', NULL),
(27, 'Arroio do Tigre', 'RS', '2021-05-25 01:45:39', NULL),
(28, 'Arroio dos Ratos', 'RS', '2021-05-25 01:45:39', NULL),
(29, 'Arroio Grande', 'RS', '2021-05-25 01:45:39', NULL),
(30, 'Arvorezinha', 'RS', '2021-05-25 01:45:39', NULL),
(31, 'Augusto Pestana', 'RS', '2021-05-25 01:45:39', NULL),
(32, 'Áurea', 'RS', '2021-05-25 01:45:39', NULL),
(33, 'Bagé', 'RS', '2021-05-25 01:45:39', NULL),
(34, 'Balneário Pinhal', 'RS', '2021-05-25 01:45:39', NULL),
(35, 'Barão', 'RS', '2021-05-25 01:45:39', NULL),
(36, 'Barão de Cotegipe', 'RS', '2021-05-25 01:45:39', NULL),
(37, 'Barão do Triunfo', 'RS', '2021-05-25 01:45:39', NULL),
(38, 'Barra do Guarita', 'RS', '2021-05-25 01:45:39', NULL),
(39, 'Barra do Quaraí', 'RS', '2021-05-25 01:45:39', NULL),
(40, 'Barra do Ribeiro', 'RS', '2021-05-25 01:45:39', NULL),
(41, 'Barra do Rio Azul', 'RS', '2021-05-25 01:45:39', NULL),
(42, 'Barra Funda', 'RS', '2021-05-25 01:45:39', NULL),
(43, 'Barracão Barros Cassal', 'RS', '2021-05-25 01:45:39', NULL),
(44, 'Benjamin Constant do Sul', 'RS', '2021-05-25 01:45:39', NULL),
(45, 'Bento Gonçalves', 'RS', '2021-05-25 01:45:39', NULL),
(46, 'Boa Vista das Missões', 'RS', '2021-05-25 01:45:39', NULL),
(47, 'Boa Vista do Buricá', 'RS', '2021-05-25 01:45:39', NULL),
(48, 'Boa Vista do Cadeado', 'RS', '2021-05-25 01:45:39', NULL),
(49, 'Boa Vista do Incra', 'RS', '2021-05-25 01:45:39', NULL),
(50, 'Boa Vista do Sul', 'RS', '2021-05-25 01:45:39', NULL),
(51, 'Bom Jesus', 'RS', '2021-05-25 01:45:39', NULL),
(52, 'Bom Princípio', 'RS', '2021-05-25 01:45:39', NULL),
(53, 'Bom Progresso', 'RS', '2021-05-25 01:45:39', NULL),
(54, 'Bom Retiro do Sul', 'RS', '2021-05-25 01:45:39', NULL),
(55, 'Boqueirão do Leão', 'RS', '2021-05-25 01:45:39', NULL),
(56, 'Bossoroca', 'RS', '2021-05-25 01:45:39', NULL),
(57, 'Bozano', 'RS', '2021-05-25 01:45:39', NULL),
(58, 'Braga', 'RS', '2021-05-25 01:45:39', NULL),
(59, 'Brochier', 'RS', '2021-05-25 01:45:39', NULL),
(60, 'Butiá\r\n', 'RS', '2021-05-25 01:45:39', NULL),
(61, 'Caçapava do Sul', 'RS', '2021-05-25 01:45:39', NULL),
(62, 'Cacequi', 'RS', '2021-05-25 01:45:39', NULL),
(63, 'Cachoeira do Sul', 'RS', '2021-05-25 01:45:39', NULL),
(64, 'Cachoeirinha', 'RS', '2021-05-25 01:45:39', NULL),
(65, 'Cacique Doble', 'RS', '2021-05-25 01:45:39', NULL),
(66, 'Caibaté', 'RS', '2021-05-25 01:45:39', NULL),
(67, 'Caiçara', 'RS', '2021-05-25 01:45:39', NULL),
(68, 'Camaquã', 'RS', '2021-05-25 01:45:39', NULL),
(69, 'Camargo', 'RS', '2021-05-25 01:45:39', NULL),
(70, 'Cambará do Sul', 'RS', '2021-05-25 01:45:39', NULL),
(71, 'Campestre da Serra', 'RS', '2021-05-25 01:45:39', NULL),
(72, 'Campina das Missões', 'RS', '2021-05-25 01:45:39', NULL),
(73, 'Campinas do Sul', 'RS', '2021-05-25 01:45:39', NULL),
(74, 'Campo Bom', 'RS', '2021-05-25 01:45:39', NULL),
(75, 'Campo Novo', 'RS', '2021-05-25 01:45:39', NULL),
(76, 'Campos Borges', 'RS', '2021-05-25 01:45:39', NULL),
(77, 'Candelária', 'RS', '2021-05-25 01:45:39', NULL),
(78, 'Cândido Godói', 'RS', '2021-05-25 01:45:39', NULL),
(79, 'Candiota', 'RS', '2021-05-25 01:45:39', NULL),
(80, 'Canela', 'RS', '2021-05-25 01:45:39', NULL),
(81, 'Canguçu', 'RS', '2021-05-25 01:45:39', NULL),
(82, 'Canoas', 'RS', '2021-05-25 01:45:39', NULL),
(83, 'Canudos do Vale', 'RS', '2021-05-25 01:45:39', NULL),
(84, 'Capão Bonito do Sul', 'RS', '2021-05-25 01:45:39', NULL),
(85, 'Capão da Canoa', 'RS', '2021-05-25 01:45:39', NULL),
(86, 'Capão do Cipó', 'RS', '2021-05-25 01:45:39', NULL),
(87, 'Capão do Leão', 'RS', '2021-05-25 01:45:39', NULL),
(88, 'Capela de Santana', 'RS', '2021-05-25 01:45:39', NULL),
(89, 'Capitão', 'RS', '2021-05-25 01:45:39', NULL),
(90, 'Capivari do Sul', 'RS', '2021-05-25 01:45:39', NULL),
(91, 'Caraá', 'RS', '2021-05-25 01:45:39', NULL),
(92, 'Carazinho', 'RS', '2021-05-25 01:45:40', NULL),
(93, 'Carlos Barbosa', 'RS', '2021-05-25 01:45:40', NULL),
(94, 'Carlos Gomes', 'RS', '2021-05-25 01:45:40', NULL),
(95, 'Casca', 'RS', '2021-05-25 01:45:40', NULL),
(96, 'Caseiros', 'RS', '2021-05-25 01:45:40', NULL),
(97, 'Catuípe', 'RS', '2021-05-25 01:45:40', NULL),
(98, 'Caxias do Sul', 'RS', '2021-05-25 01:45:40', NULL),
(99, 'Centenário', 'RS', '2021-05-25 01:45:40', NULL),
(100, 'Cerrito', 'RS', '2021-05-25 01:45:40', NULL),
(101, 'Cerro Branco', 'RS', '2021-05-25 01:45:40', NULL),
(102, 'Cerro Grande', 'RS', '2021-05-25 01:45:40', NULL),
(103, 'Cerro Grande do Sul', 'RS', '2021-05-25 01:45:40', NULL),
(104, 'Cerro Largo', 'RS', '2021-05-25 01:45:40', NULL),
(105, 'Chapada', 'RS', '2021-05-25 01:45:40', NULL),
(106, 'Charqueadas', 'RS', '2021-05-25 01:45:40', NULL),
(107, 'Charrua', 'RS', '2021-05-25 01:45:40', NULL),
(108, 'Chiapetta', 'RS', '2021-05-25 01:45:40', NULL),
(109, 'Chuí', 'RS', '2021-05-25 01:45:40', NULL),
(110, 'Chuvisca', 'RS', '2021-05-25 01:45:40', NULL),
(111, 'Cidreira', 'RS', '2021-05-25 01:45:40', NULL),
(112, 'Ciríaco', 'RS', '2021-05-25 01:45:40', NULL),
(113, 'Colinas', 'RS', '2021-05-25 01:45:40', NULL),
(114, 'Colorado', 'RS', '2021-05-25 01:45:40', NULL),
(115, 'Condor', 'RS', '2021-05-25 01:45:40', NULL),
(116, 'Constantina', 'RS', '2021-05-25 01:45:40', NULL),
(117, 'Coqueiro Baixo', 'RS', '2021-05-25 01:45:40', NULL),
(118, 'Coqueiros do Sul', 'RS', '2021-05-25 01:45:40', NULL),
(119, 'Coronel Barros', 'RS', '2021-05-25 01:45:40', NULL),
(120, 'Coronel Bicaco', 'RS', '2021-05-25 01:45:40', NULL),
(121, 'Coronel Pilar', 'RS', '2021-05-25 01:45:40', NULL),
(122, 'Cotiporã', 'RS', '2021-05-25 01:45:40', NULL),
(123, 'Coxilha', 'RS', '2021-05-25 01:45:40', NULL),
(124, 'Crissiumal', 'RS', '2021-05-25 01:45:40', NULL),
(125, 'Cristal', 'RS', '2021-05-25 01:45:40', NULL),
(126, 'Cristal do Sul', 'RS', '2021-05-25 01:45:40', NULL),
(127, 'Cruz Alta', 'RS', '2021-05-25 01:45:40', NULL),
(128, 'Cruzaltense', 'RS', '2021-05-25 01:45:40', NULL),
(129, 'Cruzeiro do Sul', 'RS', '2021-05-25 01:45:40', NULL),
(130, 'David Canabarro', 'RS', '2021-05-25 01:45:40', NULL),
(131, 'Derrubadas', 'RS', '2021-05-25 01:45:40', NULL),
(132, 'Dezesseis de Novembro', 'RS', '2021-05-25 01:45:40', NULL),
(133, 'Dilermando de Aguiar', 'RS', '2021-05-25 01:45:40', NULL),
(134, 'Dois Irmãos', 'RS', '2021-05-25 01:45:40', NULL),
(135, 'Dois Irmãos das Missões', 'RS', '2021-05-25 01:45:40', NULL),
(136, 'Dois Lajeados', 'RS', '2021-05-25 01:45:40', NULL),
(137, 'Dom Feliciano', 'RS', '2021-05-25 01:45:40', NULL),
(138, 'Dom Pedrito', 'RS', '2021-05-25 01:45:40', NULL),
(139, 'Dom Pedro de Alcântara', 'RS', '2021-05-25 01:45:40', NULL),
(140, 'Dona Francisca', 'RS', '2021-05-25 01:45:40', NULL),
(141, 'Doutor Maurício Cardoso', 'RS', '2021-05-25 01:45:40', NULL),
(142, 'Doutor Ricardo', 'RS', '2021-05-25 01:45:40', NULL),
(143, ' Eldorado do Sul', 'RS', '2021-05-25 01:45:40', NULL),
(144, 'Encantado', 'RS', '2021-05-25 01:45:40', NULL),
(145, 'Encruzilhada do Sul', 'RS', '2021-05-25 01:45:40', NULL),
(146, 'Engenho Velho', 'RS', '2021-05-25 01:45:40', NULL),
(147, 'Entre-Ijuís', 'RS', '2021-05-25 01:45:40', NULL),
(148, 'Entre Rios do Sul', 'RS', '2021-05-25 01:45:40', NULL),
(149, 'Erebango', 'RS', '2021-05-25 01:45:40', NULL),
(150, 'Erechim', 'RS', '2021-05-25 01:45:40', NULL),
(151, 'Ernestina', 'RS', '2021-05-25 01:45:40', NULL),
(152, 'Erval Grande', 'RS', '2021-05-25 01:45:40', NULL),
(153, 'Erval Seco', 'RS', '2021-05-25 01:45:40', NULL),
(154, 'Esmeralda', 'RS', '2021-05-25 01:45:40', NULL),
(155, 'Esperança do Sul', 'RS', '2021-05-25 01:45:40', NULL),
(156, 'Espumoso', 'RS', '2021-05-25 01:45:40', NULL),
(157, 'Estação', 'RS', '2021-05-25 01:45:40', NULL),
(158, 'Estância Velha', 'RS', '2021-05-25 01:45:40', NULL),
(159, 'Esteio', 'RS', '2021-05-25 01:45:40', NULL),
(160, 'Estrela', 'RS', '2021-05-25 01:45:40', NULL),
(161, 'Estrela Velha', 'RS', '2021-05-25 01:45:40', NULL),
(162, 'Eugênio de Castro', 'RS', '2021-05-25 01:45:40', NULL),
(163, 'Fagundes Varela', 'RS', '2021-05-25 01:45:40', NULL),
(164, 'Farroupilha', 'RS', '2021-05-25 01:45:40', NULL),
(165, 'Faxinal do Soturno', 'RS', '2021-05-25 01:45:40', NULL),
(166, 'Faxinalzinho', 'RS', '2021-05-25 01:45:40', NULL),
(167, 'Fazenda Vilanova', 'RS', '2021-05-25 01:45:40', NULL),
(168, 'Feliz', 'RS', '2021-05-25 01:45:40', NULL),
(169, 'Flores da Cunha', 'RS', '2021-05-25 01:45:40', NULL),
(170, 'Floriano Peixoto', 'RS', '2021-05-25 01:45:40', NULL),
(171, 'Fontoura Xavier', 'RS', '2021-05-25 01:45:40', NULL),
(172, 'Formigueiro', 'RS', '2021-05-25 01:45:40', NULL),
(173, 'Forquetinha', 'RS', '2021-05-25 01:45:40', NULL),
(174, 'Fortaleza dos Valos', 'RS', '2021-05-25 01:45:40', NULL),
(175, 'Frederico Westphalen', 'RS', '2021-05-25 01:45:40', NULL),
(176, 'Garibaldi', 'RS', '2021-05-25 01:45:40', NULL),
(177, 'Garruchos', 'RS', '2021-05-25 01:45:40', NULL),
(178, 'Gaurama', 'RS', '2021-05-25 01:45:40', NULL),
(179, 'General Câmara', 'RS', '2021-05-25 01:45:40', NULL),
(180, 'Gentil', 'RS', '2021-05-25 01:45:40', NULL),
(181, 'Getúlio Vargas', 'RS', '2021-05-25 01:45:40', NULL),
(182, 'Giruá', 'RS', '2021-05-25 01:45:40', NULL),
(183, 'Glorinha', 'RS', '2021-05-25 01:45:40', NULL),
(184, 'Gramado', 'RS', '2021-05-25 01:45:40', NULL),
(185, 'Gramado dos Loureiros', 'RS', '2021-05-25 01:45:40', NULL),
(186, 'Gramado Xavier', 'RS', '2021-05-25 01:45:40', NULL),
(187, 'Gravataí', 'RS', '2021-05-25 01:45:40', NULL),
(188, 'Guabiju', 'RS', '2021-05-25 01:45:40', NULL),
(189, 'Guaíba', 'RS', '2021-05-25 01:45:40', NULL),
(190, 'Guaporé', 'RS', '2021-05-25 01:45:40', NULL),
(191, 'Guarani das Missões', 'RS', '2021-05-25 01:45:40', NULL),
(192, 'Harmonia', 'RS', '2021-05-25 01:45:40', NULL),
(193, 'Herveiras', 'RS', '2021-05-25 01:45:40', NULL),
(194, 'Nova Santa Rita', 'RS', NULL, NULL),
(195, 'Maratá', 'RS', NULL, NULL),
(196, 'Nova Hartz', 'RS', '2022-08-24 17:12:50', '2022-08-24 17:12:50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `company`
--

INSERT INTO `company` (`id`, `name`) VALUES
(1, 'EM'),
(2, 'CCSv'),
(3, '1ª Cia'),
(4, '2ª Cia'),
(5, '3º Cia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `departament`
--

CREATE TABLE `departament` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `departament`
--

INSERT INTO `departament` (`id`, `name`) VALUES
(4, 'COMANDANTE'),
(5, 'Cmt Cia - 1ª Cia'),
(6, 'Arrecadação - 1ª Cia'),
(7, 'Sargenteação - 1ª Cia'),
(8, 'Cmt Cia - 2ª Cia'),
(9, 'Arrecadação - 2ª Cia'),
(10, 'Sargenteação - 2ª Cia'),
(11, 'LQR/3'),
(12, 'Cmt Cia - 3ª Cia'),
(13, 'Arrecadação - 3ª Cia '),
(14, 'Sargenteação - 3ª Cia'),
(15, 'Almoxarifado'),
(16, 'Aprovisionamento'),
(17, 'Seção Cães de Guerra'),
(18, 'Cmt Cia - CCSv'),
(19, 'Arrecadação - CCSv'),
(20, 'Sargenteação da CCSv'),
(21, 'Seção de Saúde'),
(22, 'Classe I'),
(23, 'Classe II'),
(24, 'Classe III-IX'),
(25, 'Classe VIII'),
(26, 'COST'),
(27, 'Classe V'),
(28, 'Pelotão de Armamento'),
(29, 'Pelotão de Munição'),
(30, 'Escritório de Projetos e Gestão '),
(31, 'Fiscalização Administrativa'),
(32, 'LIAB'),
(33, 'Patrimônio'),
(34, 'Pelotão de Comunicações'),
(35, 'Pelotão de Obras'),
(36, 'Pelotão de Segurança'),
(37, 'Pelotão de Transporte'),
(38, 'Comunicação Social'),
(39, '1ª Seção'),
(40, '2ª Seção'),
(41, '3ª Seção'),
(42, '4ª Seção'),
(43, 'SALC'),
(44, 'Seção Mobilizadora'),
(45, 'Secretaria'),
(46, 'Setor Financeiro'),
(47, 'Setor Pagamento'),
(48, 'SFPC'),
(49, 'Subcomandante'),
(50, 'Suporte Documental'),
(51, 'Ordenança'),
(52, 'Adj de Comando');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `theme` int(11) DEFAULT 0,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `login`, `password`, `created_at`, `updated_at`, `deleted_at`, `status`, `theme`, `users_id`) VALUES
(3, 'eduardo', '$2y$10$8T7sbq/4E7yne2KTLKWOROazuyGCOvi6bl4K8G/NmW0VsKVcyTPw2', '2022-11-10 10:58:22', '2022-11-10 13:58:22', NULL, 1, 1, 1),
(365, 'eduard1', '$2y$10$8T7sbq/4E7yne2KTLKWOROazuyGCOvi6bl4K8G/NmW0VsKVcyTPw2', '2022-11-23 03:16:11', '2022-11-10 13:58:22', NULL, 1, 1, 53),
(366, 'eduard2', '$2y$10$8T7sbq/4E7yne2KTLKWOROazuyGCOvi6bl4K8G/NmW0VsKVcyTPw2', '2022-11-23 03:16:17', '2022-11-10 13:58:22', NULL, 1, 1, 54),
(367, 'eduard3', '$2y$10$8T7sbq/4E7yne2KTLKWOROazuyGCOvi6bl4K8G/NmW0VsKVcyTPw2', '2022-11-23 03:16:23', '2022-11-10 13:58:22', NULL, 1, 1, 55),
(368, 'eduard4', '$2y$10$8T7sbq/4E7yne2KTLKWOROazuyGCOvi6bl4K8G/NmW0VsKVcyTPw2', '2022-11-23 03:16:26', '2022-11-10 13:58:22', NULL, 1, 1, 56),
(369, 'eduard5', '$2y$10$8T7sbq/4E7yne2KTLKWOROazuyGCOvi6bl4K8G/NmW0VsKVcyTPw2', '2022-11-23 03:16:34', '2022-11-10 13:58:22', NULL, 1, 1, 57);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_application`
--

CREATE TABLE `login_application` (
  `id` int(11) NOT NULL,
  `id_ext` varchar(255) DEFAULT NULL,
  `applications_id` int(11) NOT NULL,
  `profileType` int(2) DEFAULT 0,
  `notification` int(2) DEFAULT 0,
  `login_id` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login_application`
--

INSERT INTO `login_application` (`id`, `id_ext`, `applications_id`, `profileType`, `notification`, `login_id`, `user`, `password`, `updated_at`, `created_at`) VALUES
(2488, 'CESV', 100, 0, 1, 1, NULL, NULL, '2022-07-13 17:17:45.000000', '2022-07-13 17:17:45.000000'),
(2937, 'CESV', 100, 1, 1, 53, NULL, NULL, '2022-07-13 17:17:45.000000', '2022-07-13 17:17:45.000000'),
(2938, 'CESV', 100, 0, 1, 54, NULL, NULL, '2022-07-13 17:17:45.000000', '2022-07-13 17:17:45.000000'),
(2939, 'CESV', 100, 0, 1, 55, NULL, NULL, '2022-07-13 17:17:45.000000', '2022-07-13 17:17:45.000000'),
(2940, 'CESV', 100, 2, 1, 56, NULL, NULL, '2022-07-13 17:17:45.000000', '2022-07-13 17:17:45.000000'),
(2941, 'CESV', 100, 2, 1, 57, NULL, NULL, '2022-07-13 17:17:45.000000', '2022-07-13 17:17:45.000000'),
(2942, 'CESV', 6, 0, 1, 1, NULL, NULL, '2022-07-13 17:17:45.000000', '2022-07-13 17:17:45.000000'),
(2943, 'CESV', 6, 0, 1, 53, NULL, NULL, '2022-07-13 17:17:45.000000', '2022-07-13 17:17:45.000000'),
(2944, 'CESV', 6, 0, 1, 54, NULL, NULL, '2022-07-13 17:17:45.000000', '2022-07-13 17:17:45.000000'),
(2945, 'CESV', 6, 0, 1, 55, NULL, NULL, '2022-07-13 17:17:45.000000', '2022-07-13 17:17:45.000000'),
(2946, 'CESV', 6, 0, 1, 56, NULL, NULL, '2022-07-13 17:17:45.000000', '2022-07-13 17:17:45.000000'),
(2947, 'CESV', 6, 0, 1, 57, NULL, NULL, '2022-07-13 17:17:45.000000', '2022-07-13 17:17:45.000000');

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
(1, '2021_05_01_185548_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `read` tinyint(4) DEFAULT NULL,
  `write` tinyint(4) DEFAULT NULL,
  `edit` tinyint(4) DEFAULT NULL,
  `update` tinyint(4) DEFAULT NULL,
  `login_id` int(11) NOT NULL,
  `login_users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissions`
--

INSERT INTO `permissions` (`id`, `read`, `write`, `edit`, `update`, `login_id`, `login_users_id`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 0, 1, 1, 0, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ranks`
--

CREATE TABLE `ranks` (
  `id` int(11) NOT NULL,
  `rank` varchar(45) NOT NULL DEFAULT 'POSTO OU GRADUAÇÃO POR EXTENSO',
  `rankAbbreviation` varchar(45) NOT NULL DEFAULT 'ABREVIAÇÃO DO POSTO OU GRADUAÇÃO',
  `rank_groups_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ranks`
--

INSERT INTO `ranks` (`id`, `rank`, `rankAbbreviation`, `rank_groups_id`) VALUES
(1, 'General', 'Gen', 1),
(2, 'Coronel', 'Cel', 1),
(3, 'Tenente Coronel', 'TC', 1),
(4, 'Major', 'Maj', 1),
(5, 'Capitão', 'Cap', 1),
(6, '1º Tenente', '1º Ten', 1),
(7, '2º Tenente', '2º Ten', 1),
(8, 'Aspirante', 'Asp', 2),
(9, 'Sub Tenente', 'ST', 2),
(10, '1º Sargento', '1º Sgt', 2),
(11, '2º Sargento', '2º Sgt', 2),
(12, '3º Sargento', '3º Sgt', 2),
(13, 'Cabo', 'Cb', 2),
(14, 'Soldado', 'Sd', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rank_groups`
--

CREATE TABLE `rank_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `rank_groups`
--

INSERT INTO `rank_groups` (`id`, `name`) VALUES
(1, 'Oficial'),
(2, 'Praça');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cF05b1gzNllzJxCtUkCFn4GTWAt8pGpQHdBJ1ZjH', NULL, '10.26.197.177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:107.0) Gecko/20100101 Firefox/107.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoicUVReXNGa0h5VHBCWldybEh1WWdlYVRJazNlYVFpWUtuUjU2QmljSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHBzOi8vcGFycHMuM2JzdXAuZWIubWlsLmJyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJTaXNUQU8iO2E6Mzp7czoxMToicHJvZmlsZVR5cGUiO2k6MDtzOjEyOiJub3RpZmljYXRpb24iO2k6MTtzOjc6ImxvZ2luSUQiO2k6ODM7fXM6NDoidXNlciI7YTo4OntzOjI6ImlkIjtpOjgzO3M6NDoibmFtZSI7czoyNToiSGVybWVydG9uIEJhbGRpbm8gZGUgTGltYSI7czoxNDoiZGVwYXJ0YW1lbnRfaWQiO2k6Mzg7czo1OiJwaG90byI7czozOToiaW1nL2ltZ19wcm9maWxlcy9pbWdfcHJvZmlsZV9wYWRyYW8ucG5nIjtzOjE2OiJwcm9mZXNzaW9uYWxOYW1lIjtzOjc6IkJhbGRpbm8iO3M6NToiZW1haWwiO047czo0OiJyYW5rIjtzOjI6IlNkIjtzOjc6ImNvbXBhbnkiO2E6Mjp7czoyOiJpZCI7aToyO3M6NDoibmFtZSI7czo0OiJDQ1N2Ijt9fXM6NToidGhlbWUiO2k6MDtzOjU6IlBBUlBTIjthOjM6e3M6MTE6InByb2ZpbGVUeXBlIjtpOjE7czoxMjoibm90aWZpY2F0aW9uIjtpOjE7czo3OiJsb2dpbklEIjtpOjgzO319', 1669159101);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `professionalName` varchar(45) DEFAULT NULL,
  `motherName` varchar(255) DEFAULT NULL,
  `fatherName` varchar(255) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone1` bigint(13) DEFAULT NULL,
  `phone2` bigint(13) DEFAULT NULL,
  `born_at` date DEFAULT NULL,
  `militaryId` varchar(12) DEFAULT NULL,
  `idt_mil` varchar(14) DEFAULT NULL,
  `photoUrl` varchar(255) DEFAULT NULL,
  `backgroundUrl` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `house_number` bigint(6) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `cep` int(9) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `departament_id` int(11) NOT NULL,
  `rank_id` int(11) NOT NULL,
  `rank_group_id` int(11) DEFAULT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `professionalName`, `motherName`, `fatherName`, `email`, `phone1`, `phone2`, `born_at`, `militaryId`, `idt_mil`, `photoUrl`, `backgroundUrl`, `street`, `house_number`, `district`, `city_id`, `cep`, `created_at`, `updated_at`, `deleted_at`, `departament_id`, `rank_id`, `rank_group_id`, `company_id`) VALUES
(1, 'Eduardo Martins', 'Eduardo', 'Raquel Ávila Rodrigues', 'Ricardo Martins', 'dudu.martins373@gmail.com', 51980204586, 51980204586, '1998-07-13', '94', '0315085274', 'img/img_profiles/1/img_profile_user_1-27-07-2022-19-07-35.png', 'img/img_background/bg3.jpg', 'Av. Santa Rita', 1835, 'Centro', 194, 92480000, '2022-09-30 13:34:59', '2022-09-30 16:34:59', NULL, 34, 13, 1, 2),
(53, 'Max da Silva Demetrio', 'Demetrio', NULL, NULL, 'max_demetrio@hotmail.com', NULL, NULL, NULL, NULL, '0315080176', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-16 20:00:52', '2022-05-16 23:00:52', '2022-05-16', 34, 13, NULL, 2),
(54, 'William Evangelista Cardoso', 'Evangelista', 'Lisiane Evangelista Cardoso', 'Márcio Cristiano Cardoso', 'williamecardoso@hotmail.com', 51993420461, 5193361726, '1998-10-25', '235', '0315093872', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Soledade', 651, 'Mathias Velho', 1, 92330360, '2021-10-05 08:21:26', '2021-10-05 08:21:26', NULL, 51, 14, NULL, 2),
(55, 'Carlos Giovani da Silva', 'Carlos', 'Neimar Aparecida Antunes', 'Gilberto da Silva', 'carlos@3bsup.eb.mil.br', 51997051098, 51999987217, '1998-10-05', '67', '0315091876', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Capão da União', 132, 'Sanga Funda', 194, 92480000, '2021-08-23 14:20:50', '2021-08-23 14:09:53', NULL, 43, 12, NULL, 2),
(57, 'Kleiton Reidel', 'Reidel', 'Claudete Maria Reidel', 'Nilson Reidel', 'kleitonreidel@gmail.com', 51998991382, 51996653598, '2000-12-13', NULL, '0319468377', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Miguel Schneider', 1417, 'VL V Rural', 195, 95793000, '2022-11-08 18:33:12', '2022-11-08 21:33:12', NULL, 16, 12, NULL, 2),
(58, 'Victor Pohl Rampinini', 'Pohl', NULL, NULL, 'victorpora@live.com', NULL, NULL, NULL, NULL, '0317443570', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-08-23 14:22:56', '2021-08-23 14:22:56', NULL, 45, 13, NULL, 2),
(60, 'igor santos de abreu', 'Abreu', NULL, NULL, 'igorsantosdeabreu@yahoo.com.br', NULL, NULL, NULL, NULL, '1002992772', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-10-31 11:35:19', '2022-10-31 14:35:19', '2022-10-31', 47, 12, NULL, 2),
(63, 'THOMAS ELIANDRO MARIA AMADEU', 'AMADEU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0315079475', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-08-26 08:56:01', '2021-08-26 08:56:01', NULL, 42, 12, NULL, 2),
(64, 'Juan Gabriel Ribeiro Aires da Silva', 'Aires', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0317457877', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg5.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-11 13:13:53', '2022-07-11 13:13:53', NULL, 46, 12, NULL, 2),
(65, 'Luis Eduardo Rosa da Cruz', 'LUIS EDUARDO', NULL, NULL, 'luis2013@msn.com', NULL, NULL, NULL, NULL, '0315094573', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-08-26 09:12:03', '2021-08-26 09:12:03', NULL, 43, 14, NULL, 2),
(66, 'Leonardo Tostes Batista', 'Tostes', NULL, NULL, 'central@3bsup.eb.mil.br', NULL, NULL, NULL, NULL, '9999999999', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-08-26 09:22:01', '2021-08-26 09:22:01', NULL, 34, 13, NULL, 2),
(67, 'Rafael de Oliveira Melo', 'Rafael', NULL, NULL, 'rafaelmelo.log@gmail.com', NULL, NULL, NULL, NULL, '0117343558', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-08-26 10:26:13', '2021-08-26 10:26:13', NULL, 43, 11, NULL, 2),
(68, 'Moacir Sassaro Veiga', 'Sassaro', 'Ivani de Fátima Sassaro Veiga', 'Aristides Pereira Veiga', 'sassaro@3bsup.eb.mil.br', 51996727352, 51996727352, '1970-01-01', NULL, '0319058244', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Estrada Maria da Conceição Fraga', 1230, 'Centro', 194, 92480000, '2022-06-22 17:52:49', '2022-06-22 17:52:49', NULL, 45, 9, NULL, 3),
(69, 'Luan de Souza Nunes', 'Souza Nunes', NULL, NULL, 'luan.nsr.1996@hotmail.com', NULL, NULL, NULL, NULL, '0310727573', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-08-26 13:36:11', '2021-08-26 13:36:11', NULL, 31, 12, NULL, 2),
(70, 'FABIO ELIAS SCHROER', 'Elias', NULL, NULL, 'elias@3bsup.eb.mil.br', NULL, NULL, NULL, NULL, '0332517044', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-10-05 08:23:44', '2021-08-26 13:38:37', NULL, 52, 10, NULL, 1),
(71, 'Émerson dos Santos', 'Émerson', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0315085076', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-08-26 13:44:14', '2021-08-26 13:44:14', NULL, 42, 13, NULL, 2),
(72, 'wesley rodrigues de souza', 'w rodrigues', NULL, NULL, 'sgtwrodrigues@hotmail.com', NULL, NULL, NULL, NULL, '0205361777', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-08-26 13:46:28', '2021-08-26 13:46:28', NULL, 33, 12, NULL, 3),
(73, 'victor hugo rolin da silva', 'victor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6085730783', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-08-26 15:25:15', '2021-08-26 15:25:15', '2021-08-26', 34, 12, NULL, 2),
(74, 'Vinícius Rafael Prass', 'Prass', 'Alessandro Adilson Prass', 'Gabriela Cristina Prass', '3bsup.prass@gmail.com', 51995246994, 51998880946, '1999-03-15', NULL, '0317461879', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Orlando Silva', 84, 'Centro', 196, 93890000, '2022-08-24 17:29:15', '2022-08-24 20:29:15', NULL, 38, 12, NULL, 5),
(75, 'Tales Leite Kaiser', 'Kaiser', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0315079574', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-08-27 11:21:18', '2021-08-27 11:21:18', NULL, 44, 13, NULL, 2),
(76, 'MATEUS CORDEIRO PINHO DE OLIVEIRA', 'MATEUS', NULL, NULL, 'mateuscordeiro@live.com', NULL, NULL, NULL, NULL, '0206337974', 'img/img_profiles/76/img_profile_user_76-27-09-2021-13-09-57.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-09-27 13:39:57', '2021-09-27 13:39:57', NULL, 47, 12, NULL, 3),
(77, 'Felipe minossi Dorneles', 'Minossi', NULL, NULL, 'dorneles3@gmail.com', NULL, NULL, NULL, NULL, '0317750479', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:22:18', '2022-06-21 17:22:18', '2022-06-21', 29, 12, NULL, 4),
(78, 'MARCIO MARQUES DA SILVA JUNIOR', 'SILVA JUNIOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0312848476', 'img/img_profiles/78/img_profile_user_78-08-12-2021-12-12-06.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-12-08 12:55:06', '2021-12-08 15:55:06', NULL, 47, 12, NULL, 2),
(79, 'LUCAS GOMES MOCELIN', 'MOCELIN', NULL, NULL, 'lucasgmocelin@gmail.com', NULL, NULL, NULL, NULL, '0314033978', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-09-14 10:26:38', '2021-09-14 10:26:38', NULL, 47, 6, NULL, 2),
(80, 'Luis Paulo Carvalho Lisboa', 'Lisboa', NULL, NULL, NULL, NULL, NULL, '1991-02-23', '36', '0334372349', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-27 17:02:40', '2022-06-27 17:02:40', '2022-06-27', 42, 12, NULL, 2),
(81, 'Luciano Tallowitz Barros', 'Tallowitz', NULL, NULL, NULL, NULL, NULL, '1983-03-27', NULL, '0101045755', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-11-10 11:03:49', '2021-11-10 11:03:49', NULL, 20, 11, NULL, 2),
(82, 'victor hugo rolin da silva', 'victor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '323508473_', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 12:30:30', '2022-06-21 12:30:30', '2022-06-21', 34, 12, NULL, 2),
(83, 'Hermerton Baldino de Lima', 'Baldino', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0319337242', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-12-08 11:54:15', '2021-12-08 14:54:15', NULL, 38, 14, NULL, 2),
(84, 'Giancarlo Pagliarini Alves', 'Pagliarini', NULL, NULL, 'giancarlopalvess@outlook.com', NULL, NULL, NULL, NULL, '0493995706', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-12-08 12:38:58', '2021-12-08 15:38:58', NULL, 38, 14, NULL, 2),
(85, 'DANIEL DE OLIVEIRA MAIDANA', 'MAIDANA', NULL, NULL, 'daniel.maidana.2002@gmail.com', NULL, NULL, NULL, NULL, '0265779308', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-27 17:03:14', '2022-06-27 17:03:14', '2022-06-27', 38, 14, NULL, 2),
(86, 'Thomas Enrique Peres de Freitas', 'Thomas', 'Luciane Rodrigues Peres Duarte', NULL, NULL, NULL, NULL, '1998-02-16', '204', '0315102970', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-12-09 17:51:57', '2021-12-09 17:51:57', NULL, 7, 14, NULL, 3),
(87, 'LUCAS DE SOUZA SILVA LIMA', 'SOUZA LIMA', NULL, NULL, 'lucas.lima.rk@gmail.com', NULL, NULL, NULL, NULL, '0901829770', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-12-10 13:31:52', '2021-12-10 16:31:52', NULL, 38, 12, NULL, 5),
(88, 'NICOLAS NOGUEIRA GONCALVES', 'NICOLAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8792106501', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-27 17:02:57', '2022-06-27 17:02:57', '2022-06-27', 21, 14, NULL, 2),
(89, 'Pedro Henrique Fries', 'FRIES', NULL, NULL, 'pedrofriesee@gmail.com', NULL, NULL, NULL, NULL, '0323789172', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-12-10 13:32:05', '2021-12-10 16:32:05', NULL, 22, 14, NULL, 5),
(90, 'Eduardo Rodrigues da Silva', 'Eduardo', NULL, NULL, 'eduardorsilva@gmail.com', NULL, NULL, NULL, NULL, '0111543948', 'img/img_profiles/90/img_profile_user_90-15-12-2021-11-12-15.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-12-15 11:10:15', '2021-12-15 14:10:15', NULL, 4, 2, NULL, 1),
(91, 'wagner ryan bueno aldana', 'aldana', NULL, NULL, 'wagnerbueno005@gmail.com', NULL, NULL, NULL, NULL, '6003042001', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-12-14 16:32:49', '2021-12-14 19:32:49', NULL, 19, 14, NULL, 2),
(92, 'Gabriel Azambuja da Silva', 'Azambuja', NULL, NULL, 'gabrielazambuja633@gmail.com', NULL, NULL, NULL, NULL, '0323797670', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-12-14 17:30:29', '2021-12-14 20:30:29', NULL, 6, 14, NULL, 3),
(93, 'Gabriel Bohn Keiber', 'Keiber', NULL, NULL, 'gabriel.keiber2016@gmail.com', NULL, NULL, NULL, NULL, '0319452975', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-12-16 11:26:30', '2021-12-16 14:26:30', NULL, 38, 14, NULL, 2),
(94, 'FELIPE VILLANOVA MELO', 'VILLANOVA', NULL, NULL, 'LYPEMELO0@GMAIL.COM', NULL, NULL, NULL, NULL, '0520320204', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-12-16 11:26:37', '2021-12-16 14:26:37', NULL, 6, 14, NULL, 3),
(95, 'GABRIEL MICHEL PINTO', 'MICHEL', NULL, NULL, 'GABRIELMICHEL3011@GMAIL.COM', NULL, NULL, NULL, NULL, '0323777078', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-27 17:03:43', '2022-06-27 17:03:43', '2022-06-27', 39, 14, NULL, 2),
(96, 'PEDRO REINALDO DOS SANTOS', 'REINALDO', NULL, NULL, 'PEDROREINALDOSANTOS17@GMAIL.COM', NULL, NULL, NULL, NULL, '0323789271', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-12-16 11:26:51', '2021-12-16 14:26:51', NULL, 23, 14, NULL, 5),
(97, 'Anderson Matheus Pereira de Barros', 'Anderson Barros', NULL, NULL, 'andersonbarrospe@hotmail.com', NULL, NULL, NULL, NULL, '0204018378', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:22:04', '2022-06-21 17:22:04', '2022-06-21', 27, 6, NULL, 4),
(98, 'GUILHERME DE LIMA COMPARSI', 'COMPARSI', NULL, NULL, 'GUILHERMECOMPARSI@GMAIL.COM', NULL, NULL, NULL, NULL, '0484707400', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-12-23 11:17:31', '2021-12-23 14:17:31', NULL, 38, 14, NULL, 5),
(99, 'LUIS HENRIQUE SCHWAMBACH DOS SANTOS', 'SCHWAMBACH', NULL, NULL, 'HENRIQUESCHWAMBACH22@GMAIL.COM', NULL, NULL, NULL, NULL, '6003983205', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-12-23 11:17:36', '2021-12-23 14:17:36', NULL, 6, 14, NULL, 3),
(100, 'THIAGO MARCELO SANTOS ARAUJO', 'MARCELO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8777146204', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-12-23 11:17:41', '2021-12-23 14:17:41', NULL, 32, 14, NULL, 5),
(101, 'Moises Silva da Costa', 'Yrruan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323782375', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-12-23 11:17:47', '2021-12-23 14:17:47', NULL, 25, 14, NULL, 3),
(102, 'Guilherme Moreira Pagano', 'Pagano', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323777979', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-27 17:03:57', '2022-06-27 17:03:57', '2022-06-27', 45, 14, NULL, 2),
(103, 'João Riquelmy Loreiro Rosa', 'Riquelmy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323786673', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-12-23 11:17:54', '2021-12-23 14:17:54', NULL, 14, 14, NULL, 5),
(104, 'WESLEI LUIS SANTOS FAGUNDES', 'WESLEI', NULL, NULL, 'WESLEIFAGUNDES16@GMAIL.COM', NULL, NULL, NULL, NULL, '0325186200', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-12-29 13:31:47', '2021-12-29 16:31:47', NULL, 23, 14, NULL, 5),
(105, 'BRUNO EDUARDO AMARAL DA ROSA', 'AMARAL', NULL, NULL, 'CONTATAR.AMARAL@GMAIL.COM', NULL, NULL, NULL, NULL, '0326577203', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-12-29 13:31:51', '2021-12-29 16:31:51', NULL, 6, 14, NULL, 3),
(106, 'ESTEVAN SANTOS SCHULZ', 'ESTEVAN', NULL, NULL, 'ESTEVANSANTOSSCHULZ@GMAIL.COM', NULL, NULL, NULL, NULL, '0573833508', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2021-12-29 13:31:56', '2021-12-29 16:31:56', NULL, 19, 14, NULL, 2),
(107, 'THOMAS JHULIAN CASTRO DA LUZ', 'JHULIAN', NULL, NULL, 'THOMASCASTRO746@GMAIL.COM', NULL, NULL, NULL, NULL, '0504864009', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-01-05 11:54:56', '2022-01-05 14:54:56', NULL, 13, 14, NULL, 5),
(108, 'LUKA GABRIEL ANDRADE DO SANTOS', 'LUKA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0557807107', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-01-05 11:55:00', '2022-01-05 14:55:00', NULL, 19, 14, NULL, 2),
(109, 'GABRIEL DURZYNSKI DO SANTOS', 'DURZYNSKI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0443409404', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-01-28 12:43:56', '2022-01-28 15:43:56', NULL, 21, 14, NULL, 2),
(110, 'AXEL DA SILVA ANTUNES', 'AXEL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0439039908', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-01-28 12:44:00', '2022-01-28 15:44:00', NULL, 25, 14, NULL, 3),
(111, 'MARCELO UBIRAJARA TORRES FERRAZ', 'FERRAZ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6007852202', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-01-28 12:50:56', '2022-01-28 15:50:56', NULL, 22, 14, NULL, 5),
(112, 'KEVIN WILLIAN ZANOVELLO DE LIMA', 'ZANOVELLO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0513688706', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-02-03 12:22:57', '2022-02-03 15:22:57', NULL, 23, 14, NULL, 5),
(113, 'ALEXANDRE CAMARGO DA SILVA', 'ALEXANDRE', NULL, NULL, 'camargoo.alexandre007@gmail.com', NULL, NULL, NULL, NULL, '0570702208', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-02-03 12:24:32', '2022-02-03 15:24:32', NULL, 37, 14, NULL, 3),
(114, 'THIAGO KROLIKOWSKI GOMES', 'GOMES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0374023204', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-02-22 12:48:12', '2022-02-22 15:48:12', NULL, 23, 14, NULL, 5),
(115, 'BRUNO CARPES ONANTSCHENKO', 'CARPES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0382191501', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-02-22 12:48:16', '2022-02-22 15:48:16', NULL, 24, 14, NULL, 3),
(116, 'ALAIR JUNIOR DICKEL', 'ALAIR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0446204803', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-27 17:03:28', '2022-06-27 17:03:28', '2022-06-27', 42, 14, NULL, 2),
(117, 'DIEGO OLIVEIRA DA FONTOURA', 'FONTOURA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0295712007', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-02-26 08:36:08', '2022-02-26 11:36:08', NULL, 23, 14, NULL, 5),
(118, 'Arthur Miguel Rodrigues Dos Santos', 'Arthur', 'Maria Inês Alves Rodrigues dos Santos', 'Mario César Amaral dos Santos', NULL, NULL, NULL, '1997-11-02', '127', '0312862378', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-02-26 11:43:56', '2022-02-26 11:43:56', NULL, 22, 13, NULL, 5),
(119, 'DIOGO ALVES CAETANO', 'ALVES', NULL, NULL, 'diogoalvescaetano@gmail.com', NULL, NULL, NULL, NULL, '0524878307', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-02 20:38:19', '2022-03-02 23:38:19', NULL, 23, 14, NULL, 5),
(120, 'henrique lira sotolani', 'sotolani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0941145344', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-07 15:18:56', '2022-03-07 18:18:56', NULL, 16, 7, NULL, 2),
(121, 'Letícia Carvalho', 'Letícia', 'TEREZA OSVALDINA RAMOS', 'JOSE LUIZ CARVALHO', 'leyro.melo@gmail.com', 51999257037, 51999257037, '1993-07-19', '61', '0321646473', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'RUA RIO PARANAÍBA', 172, 'ARROIO DA MANTEIGA - SL', 1, 93145530, '2022-11-09 18:23:01', '2022-11-09 21:23:01', NULL, 22, 12, NULL, 2),
(122, 'Daiane Lima Buiz', 'Buiz', NULL, NULL, 's4@3bsup.eb.mil.br', NULL, NULL, NULL, NULL, '0321647570', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-07 15:19:04', '2022-03-07 18:19:04', NULL, 31, 12, NULL, 2),
(123, 'Andrew Rafael de Quadros', 'Andrew', 'Sindionara', 'Andrigo', 'quadrosandrew.ar@gmail.com', 51997502385, 51997502385, '1996-01-27', '105', '0310745674', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Edegar Lopes de Almeida', 401, 'SENAI', 2, 92518526, '2022-05-25 18:01:53', '2022-05-25 21:01:53', NULL, 34, 13, NULL, 2),
(124, 'Silvio Luiz Souza Junior', 'Silvio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0318801842', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-07 15:19:12', '2022-03-07 18:19:12', NULL, 25, 11, NULL, 3),
(125, 'João Victor Azevedo Lima', 'Azevedo', 'Margarete Azevedo', 'João Laerte', 'joaovictor.lima24@hotmail.com', 51995875128, 51995875128, '2001-02-24', '126', '0321388274', 'img/img_profiles/125/img_profile_user_125-16-11-2022-11-11-31.png', 'img/img_background/bg3.jpg', 'Vinte de Março', 290, 'Berto Cirio', 194, 92480000, '2022-11-16 11:38:55', '2022-11-16 14:38:55', NULL, 23, 13, NULL, 5),
(126, 'WESLEI MACHADO DE CARVALHO', 'DE CARVALHO', NULL, NULL, 'decarvalho3bsup@gmail.com', NULL, NULL, NULL, NULL, '0317445773', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-07 15:19:20', '2022-03-07 18:19:20', NULL, 37, 14, NULL, 3),
(127, 'Julio Cezar De Moura', 'Moura', 'Solange De Moura', '*****************', 'juliomoura2406@gmail.com', 51984928221, 51997206775, '2000-06-24', '301', '0321403677', 'img/img_profiles/127/img_profile_user_127-22-06-2022-17-06-28.png', 'img/img_background/bg3.jpg', 'Rua Barbosa Lima Sobrinho', 285, 'Guajuviras', 1, 92441112, '2022-06-22 17:17:28', '2022-06-22 17:17:28', NULL, 29, 14, NULL, 4),
(128, 'Eduardo Junior Signori da Silva', 'Signori', NULL, NULL, 'juniorsig2009@hotmail.com', NULL, NULL, NULL, NULL, '0315092973', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-07 18:22:22', '2022-03-07 21:22:22', NULL, 37, 12, NULL, 3),
(129, 'Nícolas Arthur Carvalho de Oliveira', 'Arthur Oliveira', NULL, NULL, 'nacojf@gmail.com', NULL, NULL, NULL, NULL, '0400002762', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-07 18:22:51', '2022-03-07 21:22:51', NULL, 43, 12, NULL, 5),
(130, 'Bruno Pereira Valente', 'Bruno Pereira', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0312875479', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-08 14:22:37', '2022-03-08 17:22:37', NULL, 48, 12, NULL, 4),
(131, 'Jorge Luís de Vargas Ramos', 'Vargas', NULL, NULL, 'vargas@3bsup.eb.mil.br', NULL, NULL, NULL, NULL, '0131947145', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-08 14:22:44', '2022-03-08 17:22:44', NULL, 43, 10, NULL, 2),
(132, 'Anderson Aparecido de Souza Matusyama', 'Matusyama', NULL, NULL, 'asmatusyama@gmail.com', NULL, NULL, NULL, NULL, '0303229876', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-08 17:36:38', '2022-03-08 20:36:38', NULL, 22, 12, NULL, 5),
(133, 'Paulo André Bicca de Oliveira Filho', 'Paulo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321417479', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-10 14:48:12', '2022-03-10 17:48:12', NULL, 15, 14, NULL, 2),
(134, 'CLEITON FIUZA CARLOS', 'FIUZA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321413973', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-10 14:48:16', '2022-03-10 17:48:16', NULL, 25, 14, NULL, 3),
(135, 'andreu castro dos santos', 'Castro', 'deise ingrid vasconcellos castro', 'maicon rodrigues dos santos', 'andreu.santos1157@gmail.com', 51999146870, 51999098878, '1999-12-21', '75', '0317463776', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Roberto Francisco Behrens', 303, 'Mato Grande', 1, 92320060, '2022-06-09 13:30:06', '2022-06-09 13:30:06', NULL, 23, 12, NULL, 5),
(137, 'Leonardo de Oliveira Ribeiro', 'Oliveira', NULL, NULL, 'leonardo.oliveira.ribeiro@hotmail.com', NULL, NULL, NULL, NULL, '0591708809', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-14 12:48:39', '2022-03-14 15:48:39', NULL, 37, 14, NULL, 3),
(138, 'Matheus da Silva Santos', 'Silva Santos', NULL, NULL, 'suehtamm21@gmail.com', NULL, NULL, NULL, NULL, '0606013008', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-14 12:48:28', '2022-03-14 15:48:28', NULL, 19, 14, NULL, 2),
(139, 'Ederson Rafael Flores dos Santos', 'Flores', NULL, NULL, 'santosederson529@gmail.com', NULL, NULL, NULL, NULL, '0323784272', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-14 12:48:20', '2022-03-14 15:48:20', NULL, 22, 14, NULL, 5),
(140, 'Leo Nunes da Silva', 'Leo', NULL, NULL, 'leonunesdadilva7@gmail.com', NULL, NULL, NULL, NULL, '0529347300', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-15 14:19:46', '2022-03-15 17:19:46', NULL, 37, 14, NULL, 3),
(141, 'GUSTAVO DE OLIVEIRA VIEIRA', 'VIEIRA', NULL, NULL, 'gustavovieiraa2002@gmail.com', NULL, NULL, NULL, NULL, '0323778175', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-15 17:33:21', '2022-03-15 20:33:21', NULL, 19, 14, NULL, 2),
(142, 'Émerson Bagert Viero', 'Émerson', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0333151041', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-17 12:41:21', '2022-03-17 15:41:21', NULL, 39, 10, NULL, 2),
(143, 'Brendon Helliel dos Santos da Costa', 'Helliel', NULL, NULL, 'Brehelliel@gmail.com', NULL, NULL, NULL, NULL, '0506079503', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-28 11:32:21', '2022-03-28 14:32:21', NULL, 38, 14, NULL, 2),
(144, 'joão vitor oliveira da silva', 'João Vitor', NULL, NULL, 'joaovitor444@gmail.com', NULL, NULL, NULL, NULL, '0323799171', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-28 11:34:10', '2022-03-28 14:34:10', NULL, 6, 14, NULL, 3),
(145, 'LUIZ MIGUEL RAMON NETO', 'RAMON', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6005412809', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-28 11:34:06', '2022-03-28 14:34:06', NULL, 23, 14, NULL, 5),
(146, 'Renato Moura Gonçalves', 'Moura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0116280959', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-28 11:33:58', '2022-03-28 14:33:58', NULL, 12, 5, NULL, 5),
(147, 'Ismael Breyer Lopes', 'Ismael Lopes', NULL, NULL, 'ismaelbreyerlopes@gmail.com', NULL, NULL, NULL, NULL, '0318722378', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-13 12:07:04', '2022-07-13 12:07:04', '2022-07-13', 22, 7, NULL, 5),
(148, 'Eliseu Lemes Trindade', 'Eliseu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323831271', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-28 11:33:31', '2022-03-28 14:33:31', NULL, 23, 14, NULL, 5),
(149, 'CARLOS HENRIQUE DA CUNHA DIAS', 'CUNHA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8603597502', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-27 17:04:11', '2022-06-27 17:04:11', '2022-06-27', 15, 14, NULL, 2),
(150, 'DAVID WILLIAM DA ROSA ZAN', 'DAVID', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0176751602', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-30 16:50:05', '2022-03-30 19:50:05', NULL, 22, 14, NULL, 5),
(151, 'GUILHERME FERNANDO DOS SANTOS FREITAS DA SILVA', 'FERNANDO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0526214600', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-03-30 16:50:09', '2022-03-30 19:50:09', NULL, 37, 14, NULL, 3),
(152, 'Natan Fernando Moccelin Lopes', 'Moccelin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323780973', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-04-28 14:23:30', '2022-04-28 17:23:30', NULL, 41, 14, NULL, 2),
(153, 'JOÃO VITOR POUEY SOUZA LEAL', 'POUEY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0487486706', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-04-28 14:23:45', '2022-04-28 17:23:45', NULL, 38, 14, NULL, 2),
(154, 'MARCO DE ANDRADE DE MATTOS', 'MARCO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0381346706', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-13 11:57:21', '2022-07-13 11:57:21', '2022-07-13', 34, 14, NULL, 2),
(155, 'LUIS EDUARDO ODRZYWOLEK DA SILVA', 'ODRZYWOLEK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0425944301', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-04-28 14:24:02', '2022-04-28 17:24:02', NULL, 23, 14, NULL, 5),
(156, 'BRYAN LUCAS SANTOS DE OLIVEIRA', 'BRYAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0510408303', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-11 14:09:25', '2022-05-11 17:09:25', NULL, 6, 14, NULL, 3),
(157, 'ALISSON DIAS CARVALHO', 'ALISSON', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0541483307', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-11 14:09:31', '2022-05-11 17:09:31', NULL, 37, 14, NULL, 3),
(158, 'ALISSON DIAS CARVALHO', 'ALISSON', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0541483307', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-13 12:30:41', '2022-07-13 12:30:41', '2022-07-13', 37, 14, NULL, 3),
(159, 'ALISSON DIAS CARVALHO', 'ALISSON', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0541483307', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-13 12:30:32', '2022-07-13 12:30:32', '2022-07-13', 37, 14, NULL, 3),
(160, 'JOÃO MATHEUS MARTINEZ DOS SANTOS', 'MARTINEZ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0544470001', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-11 14:09:38', '2022-05-11 17:09:38', NULL, 22, 14, NULL, 5),
(161, 'RICARDO VALENTIM LOPES AGAPITTO NETO', 'NETO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0513563105', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-27 17:04:23', '2022-06-27 17:04:23', '2022-06-27', 19, 14, NULL, 2),
(162, 'ELMAR RAMOS JÚNIOR', 'ELMAR', 'Arlete Machado Ramos', 'Elmar Ramos', 'elmar.ramos.jr@gmail.com', 51989268017, 51992510187, '1970-01-01', '1019', '0402663802', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Clóvis Beviláqua', 317, 'Harmonia', 82, 92320620, '2022-06-27 17:04:36', '2022-06-27 17:04:36', '2022-06-27', 19, 14, NULL, 2),
(163, 'LEONARDO SOARES BRANCO', 'BRANCO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0540486809', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-11 14:09:48', '2022-05-11 17:09:48', NULL, 25, 14, NULL, 3),
(164, 'Gian Lucas Castelo de Oliveira', 'Castelo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0548535108', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-11 14:32:58', '2022-05-11 17:32:58', NULL, 19, 14, NULL, 2),
(165, 'Maria Eduarda Rodrigues Da Costa De Almeida', 'Maria', 'Nair Rodrigues da Costa Cruz', 'Carlos José Pinto de Almeida', 'MARIAARODRIGUESS@HOTMAIL.COM', 21999527394, 51986550000, '1998-03-09', '70', '0116700071', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Buenos Aires', 143, 'Niterói', 1, 92130710, '2022-07-11 13:30:08', '2022-07-11 13:30:08', NULL, 28, 12, NULL, 4),
(166, 'NATHAN DA SILVA BERNARDI', 'BERNARDI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8662828302', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-11 17:27:58', '2022-05-11 20:27:58', NULL, 25, 14, NULL, 3),
(167, 'Wagno Barbosa Plaster', 'Wagno', NULL, NULL, NULL, NULL, NULL, '1981-05-27', '10', '0400306957', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-11 20:30:45', '2022-05-11 20:30:45', NULL, 20, 10, NULL, 2),
(168, 'JOÃO VITOR ANTUNES LIMA', 'ANTUNES', NULL, NULL, 'antunes1040@gmail.com', NULL, NULL, NULL, NULL, '0319463170', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-16 16:55:38', '2022-05-16 19:55:38', NULL, 16, 12, NULL, 2),
(169, 'MARCELO RAMOS BITELO', 'BITELO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323780270', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-16 19:48:53', '2022-05-16 22:48:53', NULL, 19, 14, NULL, 2),
(170, 'Erick Ribeiro da Rosa', 'Erick', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0319506374', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-17 14:38:00', '2022-05-17 17:38:00', NULL, 16, 13, NULL, 2),
(171, 'Bernardo Toledo Belmonte', 'Belmonte', 'Deise Machado Toledo', 'Valmor Belmonte', 'betoledo018@gmail.com', 51983222987, 51034283027, '2002-05-04', '302', '0323795971', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Turim', 355, 'São José', 1, 92425614, '2022-08-19 11:41:10', '2022-08-19 14:41:10', NULL, 38, 14, NULL, 2),
(172, 'GABRIEL DOS SANTOS AIRES', 'AIRES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0437422402', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-19 12:56:23', '2022-05-19 15:56:23', NULL, 6, 14, NULL, 3),
(173, 'Pablo Dutra Dos Santos', 'Dutra', 'Inara Conceição Dutra Dos Santos', 'Walmor dos Santos', 'pablods2002@hotmail.com', 51996061161, 51984068704, '2002-05-30', '1161', '0323801571', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Hugo Cardoso', 387, 'Fortuna', 1, 93212156, '2022-06-21 16:46:35', '2022-06-21 16:46:35', NULL, 34, 14, NULL, 2),
(174, 'Vinicius da Silva dos Santos', 'Vinicius', NULL, NULL, 'furriel3ciabsup@gmail.com', NULL, NULL, NULL, NULL, '0321379877', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-24 15:27:15', '2022-05-24 18:27:15', NULL, 13, 13, NULL, 5),
(175, 'TAIKER ADRIEL ROSA MELLO', 'TAIKER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321382772', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-25 13:57:05', '2022-05-25 16:57:05', NULL, 23, 14, NULL, 5),
(176, 'guilherme Giembra Siqueira', 'Giembra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323850479', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-25 13:57:30', '2022-05-25 16:57:30', NULL, 23, 14, NULL, 5),
(177, 'Usuaio teste andrew', 'Usuario teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0350394709', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-25 13:19:22', '2022-05-25 16:19:22', NULL, 34, 14, NULL, 2),
(178, 'Michel Luis Da Silva', 'Michel Luiz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0308428879', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-25 13:57:51', '2022-05-25 16:57:51', NULL, 23, 13, NULL, 5),
(179, 'Luis Eduardo Odrzywolek Da Silva', 'Odrzywolek', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323850172', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-25 13:58:16', '2022-05-25 16:58:16', NULL, 23, 14, NULL, 5),
(180, 'Guilherme Pimentel Machado', 'Pimentel', 'beatriz de souza pimentel', 'juarez pires machado', 'guilhermepimentel.m97@gmail.com', 51999049678, 519, '1997-08-03', '134', '0312860174', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Avaí', 421, 'Rio Branco', 82, 92200070, '2022-06-14 14:17:16', '2022-06-14 14:17:16', NULL, 14, 13, NULL, 5),
(181, 'Mateus de Bem Brugnarotto', 'Brugnarotto', NULL, NULL, 'mateusbrugnarotto@yahoo.com.br', NULL, NULL, NULL, NULL, '0312858574', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-25 13:58:47', '2022-05-25 16:58:47', NULL, 14, 13, NULL, 5),
(182, 'Ian Bernardes da Silva', 'Ian', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0312859879', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-25 14:16:53', '2022-05-25 17:16:53', NULL, 22, 13, NULL, 5),
(183, 'RODRIGO OLIVEIRA BUENO DA SILVA', 'BUENO', NULL, NULL, 'rodrigosilvabueno@msn,com', NULL, NULL, NULL, NULL, '0420433849', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-25 14:17:08', '2022-05-25 17:17:08', NULL, 13, 9, NULL, 5),
(184, 'Paulo Vinicius Trein Mainardi', 'Mainardi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0308427673', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-10-06 14:44:12', '2022-10-06 17:44:12', '2022-10-06', 22, 12, NULL, 5),
(185, 'Michel Gonçalves de Souza', 'Michel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0315078071', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-25 14:17:31', '2022-05-25 17:17:31', NULL, 22, 14, NULL, 5),
(186, 'Alisson dos santos muniz', 'Muniz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0312875271', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-25 14:17:45', '2022-05-25 17:17:45', NULL, 23, 12, NULL, 5),
(187, 'Arthur Serafim Lima', 'Serafim', 'Adriana Serafim Lima', 'Leandro dos Santos Lima', 'arthur_s_l@hotmail.com', 51986488320, 51986488320, '2002-07-02', '1305', '0323783076', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg4.jpg', 'Rua Canudos', 172, 'Estância Velha', 1, 92030050, '2022-06-28 11:51:41', '2022-06-28 11:51:41', NULL, 22, 14, NULL, 5),
(188, 'Gabriel Azevedo da Silva', 'Gabriel Silva', 'Roselaine Alvarenga de Azevedo', 'Fabiano Carvalho da Silva', 'azevedogabriel00@gmail.com', 51995141997, 51995141997, '1997-03-06', NULL, '0312860976', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Guarujá', 200, 'São José', 1, 92420230, '2022-05-27 15:22:10', '2022-05-27 18:22:10', NULL, 23, 12, NULL, 5),
(189, 'Otávio da Silva Lopes', 'OTÁVIO', NULL, NULL, 'otaviodslopes@gmail.com', NULL, NULL, NULL, NULL, '0312858178', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-25 19:01:55', '2022-05-25 22:01:55', NULL, 50, 12, NULL, 5),
(190, 'Giovane da silva oliveira', 'Giovane', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321389173', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-26 13:33:56', '2022-05-26 16:33:56', NULL, 22, 13, NULL, 5),
(191, 'cael borchardt', 'borchardt', NULL, NULL, 'borchardtcael@bol.com.br', NULL, NULL, NULL, NULL, '3123491908', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-26 13:34:23', '2022-05-26 16:34:23', NULL, 22, 13, NULL, 5),
(192, 'Rafael Vieira dos Santos', 'VIEIRA', NULL, NULL, 'rvieiraeb52@gmail.com', NULL, NULL, NULL, NULL, '0310741772', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-10-06 14:45:37', '2022-10-06 17:45:37', '2022-10-06', 15, 12, NULL, 5),
(193, 'Giovanne Portella Marinho', 'Portella', 'Maria de Carvalho Portella', 'Agomar Borges', 'giovannepb@hotmail.com', 51995904227, 51982283424, '1997-11-22', '131', '0312860273', 'img/img_profiles/193/img_profile_user_193-09-06-2022-16-06-31.png', 'img/img_background/bg3.jpg', 'Rua Luiz Carlos Schneider', 286, 'Timbauva', 2, 92524765, '2022-06-09 16:33:31', '2022-06-09 16:33:31', NULL, 23, 13, NULL, 5),
(194, 'João Eduardo Amorim Jardim', 'Amorim', NULL, NULL, 'joaoeduaj@gmail.com', NULL, NULL, NULL, NULL, '0319509576', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg1.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-27 15:24:21', '2022-05-27 18:24:21', NULL, 23, 14, NULL, 5),
(195, 'Robert Da Silva Dos Santos', 'Robert', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0315074773', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-27 12:52:48', '2022-05-27 15:52:48', NULL, 22, 13, NULL, 5),
(196, 'Gustavo Souza De Mello', 'De Mello', 'Marcia Rosieli Barbosa De Souza', 'Rafael Toledo De Mello', 'gustavomello.gm16@gmail.com', 51995791805, 51999987381, '2001-02-18', '311', '0321388779', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg1.jpg', 'Avenida Central Sul', 97, 'Berto Cirio', 194, 92480000, '2022-05-30 17:54:56', '2022-05-30 20:54:56', NULL, 22, 14, NULL, 5),
(197, 'Weslei Ribeiro Cunha', 'Cunha', 'Clarice Odila Ribeiro Cunha', 'Gilmar Sarmento Cunha', 'wesleircunha@gmail.com', 51995598434, 51996368434, '2022-07-22', NULL, '0317466373', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Alcides Amorim', 910, 'Sanga Funda', 194, 92480000, '2022-10-03 17:02:44', '2022-10-03 20:02:44', NULL, 23, 12, NULL, 5),
(198, 'Guilherme Nogueira Reis', 'Nogueira', 'Adriene Nogueira Reis', 'Roberto Alves Reis', 'guilherme.nogueirareis@gmail.com', 51985019714, 51985554194, '2001-12-20', '273', '0321411670', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua dos Guamirins', 303, 'Igara', 1, 92412520, '2022-11-03 12:29:10', '2022-11-03 15:29:10', NULL, 20, 14, NULL, 2),
(199, 'Felipe Pinto Banda', 'Banda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0319509378', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-05-31 13:54:01', '2022-05-31 16:54:01', NULL, 23, 14, NULL, 5),
(200, 'Diego André Mello da Rosa', 'André Mello', 'Valdirene dos Santos Mello', 'Rubinei André da Rosa', 'diegomellorosa@gmail.com', 51993251804, 51993251804, '2002-11-28', '338', '0323775775', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Gaspar Lemos', 127, 'Nossa Senhora das Graças', 82, 92025500, '2022-11-14 12:59:49', '2022-11-14 15:59:49', NULL, 42, 14, NULL, 2),
(201, 'Victor Ferreira de Souza', 'SOUZA', 'Raquel Ferreira de Souza', 'Jackson Apolinário Ben Hur José de Souza', 'vc11souza@gmail.com', 51998422178, 51998422178, '2001-11-12', '141', '0321416372', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua dos Ferreiros', 42, 'Harmonia', 1, 92325100, '2022-11-09 12:57:06', '2022-11-09 15:57:06', NULL, 39, 13, NULL, 2),
(202, 'BRUNO WESLEY DA SILVA OLIVEIRA', 'Wesley', 'GILBERTO REIS DE OLIVEIRA', 'ELIZETE RODRIGUES DA SILVA', 'brunowwes@gmail.com', 51995463950, 51934668970, '1999-11-11', NULL, '0317463677', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg1.jpg', 'Rua Campinas', 4670, 'Mathias Velho', 1, 92330390, '2022-11-01 14:47:18', '2022-11-01 17:47:18', NULL, 21, 13, NULL, 2),
(203, 'Sabrina Brendler', 'Brendler', NULL, NULL, 'sabrinabrendler@hotmail.com', NULL, NULL, NULL, NULL, '0325425775', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:44:18', '2022-06-21 17:44:18', '2022-06-21', 32, 8, NULL, 5),
(204, 'Felipe Andrade De Castro', 'F.andrade', 'Marcia Rejane Andrade de Castro', 'Glberto Gunther de Castro', 'felipe.andrade9814@gmail.com', 51989315505, 51989862746, '1998-09-09', '84', '0315092676', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Benjamin Franklin', 123, 'Harmonia', 1, 92310380, '2022-06-29 14:15:35', '2022-06-29 14:15:35', NULL, 48, 12, NULL, 4),
(205, 'Henrique Real de Freitas', 'Real', 'Elaini Silva Real', 'Jorge Ivan Vieira de Freitas', 'henriquereal1@hotmail.com', 51986862534, 51986862534, '2000-07-21', '285', '0319453379', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Quatro', 105, 'Olaria', 1, 92035014, '2022-06-09 16:27:09', '2022-06-09 16:27:09', NULL, 39, 14, NULL, 2),
(206, 'Luís Felipe Farencena Kraemer', 'Kraemer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0334337748', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-09 13:24:53', '2022-06-09 13:24:53', NULL, 39, 10, NULL, 3),
(207, 'ROBSON LUCIANO ALVES CORREIA', 'LUCIANO ALVES', NULL, NULL, 'rlucianobr@gmail.com', NULL, NULL, NULL, NULL, '0130098544', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-09 13:29:34', '2022-06-09 13:29:34', NULL, 19, 9, NULL, 2),
(208, 'SÉRGIO LUIS DA SILVA MARTINS', 'MARTINS', NULL, NULL, 'slsmartins200@gmail.com', NULL, NULL, NULL, NULL, '0331509141', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-09 16:57:35', '2022-06-09 16:57:35', NULL, 39, 9, NULL, 2),
(209, 'Fabricio Guimarães dos Santos', 'Guimarães', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0435354147', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-09 14:34:13', '2022-06-09 14:34:13', NULL, 39, 10, NULL, 2),
(210, 'Luis Gustavo Maria da Rocha', 'da rocha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0310734173', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-09 16:57:39', '2022-06-09 16:57:39', NULL, 22, 14, NULL, 5),
(211, 'Mario Schievelbein', 'Mario', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0333292845', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-09 14:33:53', '2022-06-09 14:33:53', NULL, 22, 10, NULL, 5),
(212, 'William Poncio Berte', 'Poncio', NULL, NULL, 'williamponcio13@gmail.com', NULL, NULL, NULL, NULL, '0312851470', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-09 16:57:41', '2022-06-09 16:57:41', NULL, 32, 13, NULL, 5),
(213, 'Lucas Barcelos Correa', 'L.Barcelos', 'Eleane Pereira Barcelos', 'João Melo Correa', 'barceloslukas04@gmail.com', 51997314207, 51998027132, '1996-04-02', '140', '0310746979', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Santa Catarina', 3690, 'Mathias Velho', 1, 92330170, '2022-06-27 18:51:01', '2022-06-27 18:51:01', NULL, 6, 13, NULL, 3),
(214, 'Igor Maier Lopes', 'Maier', NULL, NULL, 'igormaier27@gmail.com', NULL, NULL, NULL, NULL, '0310747338', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-09 16:57:48', '2022-06-09 16:57:48', NULL, 23, 13, NULL, 5),
(215, 'Vittor Eduardo de Oliveira Trein', 'Trein', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321416075', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-10 12:09:47', '2022-06-10 12:09:47', NULL, 15, 13, NULL, 2),
(216, 'Vittor Eduardo de Oliveira Trein', 'Trein', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321416075', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-10 12:09:51', '2022-06-10 12:09:51', NULL, 15, 13, NULL, 2),
(217, 'joao victor laurindo', 'Laurindo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0208994376', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-10 12:09:57', '2022-06-10 12:09:57', NULL, 15, 12, NULL, 2),
(219, 'William Dias da Silva', 'William Dias', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0312868870', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-13 12:04:44', '2022-06-13 12:04:44', NULL, 39, 13, NULL, 2),
(220, 'DAVID EDUARDO DA COSTA ZARPELON', 'ZARPELON', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0319466579', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg4.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-14 14:28:02', '2022-07-14 14:28:02', NULL, 47, 14, NULL, 2),
(221, 'jonnathan silva barbosa', 'jonnathan', NULL, NULL, 'jonnathanbarbosa19@gmail.com', NULL, NULL, NULL, NULL, '031059576_', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-13 12:05:37', '2022-06-13 12:05:37', NULL, 44, 13, NULL, 2);
INSERT INTO `users` (`id`, `name`, `professionalName`, `motherName`, `fatherName`, `email`, `phone1`, `phone2`, `born_at`, `militaryId`, `idt_mil`, `photoUrl`, `backgroundUrl`, `street`, `house_number`, `district`, `city_id`, `cep`, `created_at`, `updated_at`, `deleted_at`, `departament_id`, `rank_id`, `rank_group_id`, `company_id`) VALUES
(222, 'MURILO RIBEIRO PARMEJANI', 'Parmejani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0116303355', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-13 11:56:09', '2022-06-13 11:56:09', NULL, 8, 5, NULL, 4),
(223, 'MARCELLO HENRIQUE FREITAS AMARAL', 'Marcelo Amaral', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2234232353', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-13 12:36:04', '2022-07-13 12:36:04', '2022-07-13', 29, 6, NULL, 4),
(224, 'JULIANA PELISOLI HOLZ', 'Holz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321633778', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-13 11:59:07', '2022-06-13 11:59:07', NULL, 11, 7, NULL, 4),
(225, 'ANTONIO CARLOS DE ARAUJO CUNHA', 'Antonio Carlos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0112023445', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:21:49', '2022-06-21 17:21:49', '2022-06-21', 48, 8, NULL, 4),
(226, 'PAULO ROBERTO LAGO DE ASSIS', 'Paulo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1028701744', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-13 12:08:55', '2022-06-13 12:08:55', NULL, 9, 9, NULL, 4),
(227, 'OLMIRO RICARDO ELESBÃO DA CRUZ', 'Olmiro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0332306448', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-13 12:11:23', '2022-06-13 12:11:23', NULL, 35, 10, NULL, 4),
(228, 'DILAMAR ANDRÉ HANAUER', 'HANAUER', NULL, NULL, 'dilamarhanauer@bol.com.br', NULL, NULL, NULL, NULL, '0520783440', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-13 13:25:41', '2022-06-13 13:25:41', NULL, 44, 6, NULL, 1),
(229, 'Giovane Machado da Silva', 'Giovane', 'Vileica Martins Machado', 'Gilson da Silva', 'giovanyx1998@gmail.com', 51991160591, 51994221598, '1998-12-04', '43', '0315087171', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Avenida Dezessete de Abril', 301, 'Guajuviras', 1, 92415000, '2022-10-06 18:10:02', '2022-10-06 21:10:02', NULL, 22, 12, NULL, 5),
(230, 'Moisés Silva da Costa', 'Moisés', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0308287440', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-13 14:05:12', '2022-06-13 14:05:12', NULL, 39, 5, NULL, 1),
(231, 'priscila kanopf oliveira', 'kanopf', NULL, NULL, 'prika_383@hotmail.com', NULL, NULL, NULL, NULL, '0101300572', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-13 14:21:23', '2022-06-13 14:21:23', NULL, 21, 11, NULL, 2),
(232, 'DIEGO JESUS DOS SANTOS DA SILVA', 'JESUS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0312876378', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-13 14:30:47', '2022-06-13 14:30:47', NULL, 21, 13, NULL, 2),
(233, 'WILLIAN DA SILVA GUIMARAES', 'GUIMARAES', 'MARCIA', 'MARCOS', 'willianguimaraes98@gmail.com', 51997697701, 51999070750, '1970-01-01', '125', '0315078675', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'erechim', 278, '278', 13, 95630000, '2022-06-13 14:40:52', '2022-06-13 14:40:52', NULL, 21, 13, NULL, 2),
(234, 'RAFAEL DE SOUZA PETRY', 'Petry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0308427376', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:35:28', '2022-08-24 19:35:28', '2022-08-24', 9, 13, NULL, 4),
(235, 'JEAN CARLO ZARDINELLO CERINO', 'Zardinello', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0308376771', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:36:01', '2022-08-24 19:36:01', '2022-08-24', 29, 13, NULL, 4),
(236, 'CLEBER MACHADO PORDELLO', 'Pordello', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0310739776', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:36:16', '2022-08-24 19:36:16', '2022-08-24', 9, 13, NULL, 4),
(237, 'MATHEUS LEINDEKER', 'Leindecker', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0310433175', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:36:36', '2022-08-24 19:36:36', '2022-08-24', 9, 13, NULL, 4),
(238, 'SANDRO JOSÉ DE BARBARA', 'Sandro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0308446871', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:36:44', '2022-08-24 19:36:44', '2022-08-24', 35, 13, NULL, 4),
(239, 'RAFAEL GONÇALVES NOGUEIRA', 'R Gonçalves', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0310735774', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:36:56', '2022-08-24 19:36:56', '2022-08-24', 9, 13, NULL, 4),
(240, 'LUCAS LIMA DA SILVA', 'Lima', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0310759477', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:37:04', '2022-08-24 19:37:04', '2022-08-24', 17, 13, NULL, 4),
(241, 'VINICIUS FREITAS', 'Freitas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0315073577', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 12:14:07', '2022-06-14 12:14:07', NULL, 16, 13, NULL, 4),
(242, 'DAVI LIMA DA SILVA', 'Davi Silva', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0315103671', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 12:14:37', '2022-06-14 12:14:37', NULL, 35, 13, NULL, 4),
(243, 'Jean Carlos Das Chagas Dos Santos', 'Chagas', 'Roseli Da Conceição Das Chagas Dos Santos', 'Antônio Carlos Soares Dos Santos', 'jean.chagasjc21@gmail.com', 51997196370, 51999450120, '1999-07-10', '101', '0317439578', 'img/img_profiles/243/img_profile_user_243-24-08-2022-13-08-57.png', 'img/img_background/bg3.jpg', 'Estrada Lorenz', 631, 'Costa da Serra', 2, 92534000, '2022-08-24 13:36:57', '2022-08-24 16:36:57', NULL, 27, 13, NULL, 4),
(244, 'CRISTIANO RODRIGUES DA TRINDADE', 'Trindade', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0312874274', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 12:15:41', '2022-06-14 12:15:41', NULL, 9, 13, NULL, 4),
(245, 'RICHARD ALDERETTE BORGES', 'Alderette', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0312852270', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 12:16:41', '2022-06-14 12:16:41', NULL, 29, 13, NULL, 4),
(246, 'LEONARDO JESUS DA SILVA AMADOR', 'Jesus Silva', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0315078477', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 12:18:33', '2022-06-14 12:18:33', NULL, 17, 13, NULL, 4),
(247, 'Claudio Andre Alves Henzel', 'Henzel', 'Fabiana Borges Alves', 'Daniel Bonn Henzel', 'claudioandre377@gmail.com', 51989539223, 51991821982, '1998-07-07', '148', '0315095273', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Caetano Jose Munhoz', 268, 'Vicentina', 2, 95025210, '2022-07-04 11:44:34', '2022-07-04 11:44:34', NULL, 35, 13, NULL, 4),
(248, 'FABRICIO PACHECO LEMOS', 'F lemos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0315094674', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:37:56', '2022-08-24 19:37:56', '2022-08-24', 9, 13, NULL, 4),
(250, 'MURILO CHAPUIS', 'Murilo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0317440011', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:38:05', '2022-08-24 19:38:05', '2022-08-24', 35, 13, NULL, 4),
(251, 'LUIS CAUÊ FISCHER NUNES', 'LUIS CAUÊ FISCHER NUNES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0317442176', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 12:50:44', '2022-06-14 12:50:44', NULL, 29, 13, NULL, 4),
(252, 'JOEL RICARDO VITT', 'Joel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0308375674', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:38:43', '2022-08-24 19:38:43', '2022-08-24', 35, 14, NULL, 4),
(253, 'NEEMIAS THOMÉ PINHEIRO DA SILVA', 'Neemias', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0308428473', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:38:52', '2022-08-24 19:38:52', '2022-08-24', 35, 14, NULL, 4),
(254, 'IGOR DINARTE BUSI', 'Dinarte', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0310738372', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 12:52:48', '2022-06-14 12:52:48', NULL, 29, 14, NULL, 4),
(255, 'MATHEUS DOS SANTOS MELO', 'DOS Santos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0310736475', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 12:54:16', '2022-06-14 12:54:16', NULL, 29, 14, NULL, 4),
(256, 'HEBERT RODRIGUES MARIA', 'Hebert', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0310747779', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 12:54:48', '2022-06-14 12:54:48', NULL, 17, 14, NULL, 4),
(257, 'GABRIEL HENRIQUE MARTINY SOARES', 'Martiny', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0310732474', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 12:55:29', '2022-06-14 12:55:29', NULL, 35, 14, NULL, 4),
(258, 'WESLEY GABRIEL ARAUJO DA SILVA CUNHA', 'Gabriel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0310735378', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 12:56:46', '2022-06-14 12:56:46', NULL, 35, 14, NULL, 4),
(259, 'WAGNER RODRIGUES DOS SANTOS', 'WAGNER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0312862972', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:39:04', '2022-08-24 19:39:04', '2022-08-24', 35, 14, NULL, 4),
(260, 'ADROALDO CASTILHOS ASSUMPÇÃO', 'Assumpção', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0312878847', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 13:11:01', '2022-06-14 13:11:01', NULL, 16, 14, NULL, 4),
(261, 'KEVYN PIEGAS FORTES', 'Fortes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0312847270', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 13:25:05', '2022-06-14 13:25:05', NULL, 35, 14, NULL, 4),
(262, 'HENRIQUE ROCHA DE SÁ BRITTO', 'Henrique Britto', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0312865470', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 13:26:07', '2022-06-14 13:26:07', NULL, 9, 14, NULL, 4),
(263, 'GUILHERME SILVEIRA MILITÃO', 'Militao', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0312865678', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 13:27:02', '2022-06-14 13:27:02', NULL, 29, 14, NULL, 4),
(264, 'ANATALIEL MACHADO DOS SANTOS', 'Anataliel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0312850373', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 13:27:33', '2022-06-14 13:27:33', NULL, 35, 14, NULL, 4),
(265, 'IAGO JEAN DA SILVA', 'Jean', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0312854735', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 13:28:10', '2022-06-14 13:28:10', NULL, 35, 14, NULL, 4),
(266, 'LEANDRO FERREIRA', 'Leandro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0312853476', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 13:28:50', '2022-06-14 13:28:50', NULL, 35, 14, NULL, 4),
(267, 'MAURICIO CARBOLIM', 'Carbolim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0315080275', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 13:29:15', '2022-06-14 13:29:15', NULL, 16, 14, NULL, 4),
(268, 'ALEXANDRE CALDEIRA CORREA', 'Caldeira', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0315092478', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 13:29:42', '2022-06-14 13:29:42', NULL, 9, 14, NULL, 4),
(269, 'JACKSON NECKEL BATISTINI', 'Batistini', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0315089870', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 13:30:10', '2022-06-14 13:30:10', NULL, 17, 14, NULL, 4),
(270, 'LUCAS DE OLIVEIRA MACHADO', 'Lucas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0315071670', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 13:31:59', '2022-06-14 13:31:59', NULL, 16, 14, NULL, 4),
(271, 'ALEXANDRE JOVELINO DOS SANTOS MEDEIROS', 'Jovelino', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0315092379', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 13:32:45', '2022-06-14 13:32:45', NULL, 35, 14, NULL, 4),
(272, 'ROBSON FONTANA DE MELO', 'Fontana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0315074674', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:39:22', '2022-08-24 19:39:22', '2022-08-24', 9, 14, NULL, 4),
(273, 'GABRIEL DE CAMPOS RIBEIRO', 'Ribeiro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0317463172', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:39:29', '2022-08-24 19:39:29', '2022-08-24', 11, 14, NULL, 4),
(274, 'NATHAN ALEXSANDER RIBEIRO HUFF', 'HUFF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323788877', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-20 02:47:55', '2022-06-20 02:47:55', NULL, 22, 14, NULL, 5),
(275, 'MAYCK SANDRO MARINS DE ABREU', 'Mayck', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0317438372', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 13:45:35', '2022-06-14 13:45:35', NULL, 17, 14, NULL, 4),
(276, 'IGOR RODRIGUES DA SILVA', 'Silva', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0317438075', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 12:18:32', '2022-11-16 15:18:32', '2022-11-16', 16, 14, NULL, 4),
(277, 'MARLON LARROSSA KARR', 'Karr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0317442275', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 13:46:46', '2022-06-14 13:46:46', NULL, 11, 14, NULL, 4),
(278, 'FELIPE SANTANA DAMBROWSKI', 'Dambrowski', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0317447373', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-29 14:27:32', '2022-09-29 17:27:32', '2022-09-29', 17, 14, NULL, 4),
(279, 'CARLOS EDUARDO PRASS COLPES CARVALHO', 'Colpes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0317441475', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 13:48:05', '2022-06-14 13:48:05', NULL, 35, 14, NULL, 4),
(280, 'MARCIO DOS SANTOS RODRIGUES', 'Marcio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0317439271', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 13:48:31', '2022-06-14 13:48:31', NULL, 35, 14, NULL, 4),
(281, 'MARCELO JUNIOR CORREA DA SILVA', 'Marcelo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0317942671', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:39:44', '2022-08-24 19:39:44', '2022-08-24', 35, 14, NULL, 4),
(282, 'EMERSON FELIPE MILK LUIZ', 'Milk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0319466173', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 13:50:42', '2022-06-14 13:50:42', NULL, 35, 14, NULL, 4),
(283, 'DAVID RODRIGUES CABREIRA', 'Cabreira', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0319501979', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 13:51:15', '2022-06-14 13:51:15', NULL, 9, 14, NULL, 4),
(284, 'GUILHERME FERNANDES DA ROCHA', 'Rocha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0319502779', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 13:51:48', '2022-06-14 13:51:48', NULL, 16, 14, NULL, 4),
(285, 'LEONARDO GALSKI SKIERESZ', 'Skieresz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0319470571', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 13:52:20', '2022-06-14 13:52:20', NULL, 28, 14, NULL, 4),
(286, 'EWERTHON ALECSANDER ALVES DA SILVA', 'ALECSANDER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0508025001', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-20 02:48:24', '2022-06-20 02:48:24', NULL, 21, 14, NULL, 2),
(287, 'JEAN DOS SANTOS', 'JEAN SANTOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0319502472', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 13:53:15', '2022-06-14 13:53:15', NULL, 9, 14, NULL, 4),
(288, 'MARVIN BEHRENS DA SILVA', 'Marvin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0319471579', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:39:57', '2022-08-24 19:39:57', '2022-08-24', 16, 14, NULL, 4),
(289, 'DENER DENILSON DOS SANTOS ALMEIDA', 'Denilson', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0319501870', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 16:10:11', '2022-06-14 16:10:11', NULL, 35, 14, NULL, 4),
(290, 'DAVI SALGADO DAS CHAGAS', 'Salgado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0319468476', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 16:10:48', '2022-06-14 16:10:48', NULL, 28, 14, NULL, 4),
(291, 'Kauan lopes zanchi', 'Kauan', NULL, NULL, 'kauanzanchi@hotmail.com', NULL, NULL, NULL, NULL, '0312864374', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-20 02:49:37', '2022-06-20 02:49:37', NULL, 22, 13, NULL, 5),
(292, 'JARDEL FELIPE XAVIER', 'Jardel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321403499', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 16:12:16', '2022-06-14 16:12:16', NULL, 16, 14, NULL, 4),
(293, 'PAULO CESAR DE ANDRADE DA SILVEIRA', 'Andrade', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321383879', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 16:12:53', '2022-06-14 16:12:53', NULL, 29, 14, NULL, 4),
(294, 'Lucas Polga da Silva', 'Polga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321385171', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-20 02:52:44', '2022-06-20 02:52:44', NULL, 22, 14, NULL, 5),
(295, 'LUCCA BIANCHIN DE OLIVEIRA', 'Bianchin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321402372', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 16:13:28', '2022-06-14 16:13:28', NULL, 28, 14, NULL, 4),
(296, 'LUCAS FEISTLER', 'Feistler', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321418279', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 16:14:00', '2022-06-14 16:14:00', NULL, 10, 14, NULL, 4),
(297, 'RALF RODRIGUES AMORIM', 'RALF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '040073054_', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-13 12:27:54', '2022-07-13 12:27:54', '2022-07-13', 43, 11, NULL, 2),
(298, 'JOSÉ EDUARDO GONÇALVES CARDOZO', 'Cardozo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321402976', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 16:14:31', '2022-06-14 16:14:31', NULL, 9, 14, NULL, 4),
(299, 'TALISSON ASSIS SANTOS', 'Talisson', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321399974', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 16:15:03', '2022-06-14 16:15:03', NULL, 9, 14, NULL, 4),
(300, 'Paulo Alexandre da Rosa Borges', 'Borges', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323789073', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-20 02:53:33', '2022-06-20 02:53:33', NULL, 23, 14, NULL, 5),
(301, 'MATHEUS SEIDEL DE OLIVEIRA', 'Seidel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321401770', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 16:15:28', '2022-06-14 16:15:28', NULL, 9, 14, NULL, 4),
(302, 'KEVIN DA SILVA PACHECO', 'Pacheco', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321402778', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 16:15:56', '2022-06-14 16:15:56', NULL, 9, 14, NULL, 4),
(303, 'André de Lima Braga', 'André Lima', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0317457075', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-20 02:50:01', '2022-06-20 02:50:01', NULL, 43, 12, NULL, 2),
(304, 'MARCOS AUGUSTO KAYSER', 'Marcos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321401978', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 16:16:33', '2022-06-14 16:16:33', NULL, 17, 14, NULL, 4),
(305, 'WELINTON MATEUS NUNES DA ROSA', 'Nunes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321391979', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 16:16:57', '2022-06-14 16:16:57', NULL, 29, 14, NULL, 4),
(306, 'RAFAEL DUARTE FERNANDES', 'Rafael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321417073', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:40:10', '2022-08-24 19:40:10', '2022-08-24', 35, 14, NULL, 4),
(307, 'ANDREI FREITAG DOS SANTOS', 'Freitag', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321406175', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 16:17:58', '2022-06-14 16:17:58', NULL, 9, 14, NULL, 4),
(308, 'EDUARDO SILVA BORGES', 'Silva Borges', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321405078', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 16:18:29', '2022-06-14 16:18:29', NULL, 17, 14, NULL, 4),
(309, 'FELIPE RODRIGUES DE LIMA', 'Rodrigues', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321404576', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:40:17', '2022-08-24 19:40:17', '2022-08-24', 29, 14, NULL, 4),
(310, 'RUDIMAR DA CRUZ FREITAS', 'Rudimar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0131960643', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 17:02:12', '2022-06-14 17:02:12', NULL, 10, 10, NULL, 4),
(311, 'LUIS RICARDO DOLIJAL', 'Dolijal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0318497443', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 17:02:55', '2022-06-14 17:02:55', NULL, 28, 11, NULL, 4),
(312, 'MARIO SERGIO ANTUNES VIEIRA', 'Antunes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0318589546', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 17:08:50', '2022-06-14 17:08:50', NULL, 9, 11, NULL, 4),
(313, 'LAÉRCIO DE JESUS NAGEL', 'Laércio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0308434877', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:33:36', '2022-08-24 19:33:36', '2022-08-24', 29, 12, NULL, 4),
(314, 'MAGNUS DA SILVA SARMENTO', 'Magnus Silva', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0308430578', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:34:00', '2022-08-24 19:34:00', '2022-08-24', 29, 12, NULL, 4),
(315, 'LEONARDO LIMA DA SILVA', 'LEONARDO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0623388048', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-20 02:54:12', '2022-06-20 02:54:12', NULL, 21, 9, NULL, 2),
(316, 'Eduardo Rafael dos Santos de Oliveira', 'de Oliveira', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321421174', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-20 02:54:41', '2022-06-20 02:54:41', NULL, 45, 13, NULL, 2),
(317, 'CARLOS HENRIQUE CANUTO GOMES DA SILVA', 'Canuto', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0104518675', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 12:17:38', '2022-11-16 15:17:38', '2022-11-16', 29, 12, NULL, 4),
(318, 'LEANDRO DOS SANTOS FERREIRA', 'Santos Ferreira', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1110986377', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 17:55:44', '2022-06-14 17:55:44', NULL, 48, 12, NULL, 4),
(319, 'BRUNO SOARES BARRETO', 'Barreto', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0310740477', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 17:58:06', '2022-06-14 17:58:06', NULL, 16, 12, NULL, 4),
(320, 'ROGÉRIO VILIANO DA SILVA', 'Viliano', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0315094177', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 18:01:08', '2022-06-14 18:01:08', NULL, 27, 12, NULL, 4),
(321, 'JULIENE SOUSA FERREIRA', 'Juliene', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '403942774_', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 18:02:47', '2022-06-14 18:02:47', NULL, 27, 12, NULL, 4),
(322, 'GUILHERME DA ROZA FERREIRA', 'Roza Ferreira', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0312874373', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 18:03:44', '2022-06-14 18:03:44', NULL, 17, 12, NULL, 4),
(323, 'GABRIEL RODRIGUES LESSA DA SILVA', 'Lessa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0208970178', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-03 13:13:01', '2022-11-03 16:13:01', NULL, 29, 12, NULL, 4),
(324, 'Daniel Maximiano De Santana', 'Maximiano', 'Meroaite Maria de Santana', 'Não Declarado', 'danielmaximiano60@gmail.com', 51998390489, 21985295635, '1998-06-12', '63', '0708177076', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Antônio Lourenço Rosa', 180, 'Mato Grande', 1, 92320050, '2022-09-28 17:57:03', '2022-09-28 20:57:03', NULL, 28, 12, NULL, 4),
(325, 'JONATHAN TEIXEIRA FERREIRA', 'Jonathan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0801071473', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 12:17:58', '2022-11-16 15:17:58', '2022-11-16', 29, 12, NULL, 4),
(326, 'MAGNO LEANDRO SANTAREM WOLFF', 'Wolff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0317439073', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-14 18:09:19', '2022-06-14 18:09:19', NULL, 27, 12, NULL, 4),
(327, 'THUANE CRISTINA RODRIGUES LIMA', 'THUANE LIMA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0316895176', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-20 02:47:27', '2022-06-20 02:47:27', NULL, 21, 12, NULL, 2),
(328, 'LUÍS ROGÉRIO DE OLIVEIRA', 'OLIVEIRA', NULL, NULL, 'lsrdliveira@gmail.com', NULL, NULL, NULL, NULL, '0623439544', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-20 02:55:26', '2022-06-20 02:55:26', NULL, 15, 7, NULL, 2),
(329, 'Marcos Luan Dal Moro Bonacina', 'Moro', 'Dircéia Andrade Dal Moro', 'Luciano Bonacina', 'luandalmorobonacina@gmail.com', 51995765847, 0, '2001-08-31', '135', '0321417974', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Estrada do Picadão', 44, 'Caju', 194, 92480000, '2022-09-02 10:54:18', '2022-09-02 13:54:18', NULL, 21, 13, NULL, 2),
(330, 'Aruam', 'Aruam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323783075', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-27 11:25:25', '2022-09-27 14:25:25', '2022-09-27', 21, 14, NULL, 2),
(331, 'Rodrigo Leal da Silva Marquet', 'Da Silva', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0101918456', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-20 02:52:27', '2022-06-20 02:52:27', NULL, 7, 10, NULL, 3),
(332, 'victor hugo rolin da silva', 'victor', NULL, NULL, 'viti.hugo_7@hotmail.com', NULL, NULL, NULL, NULL, '0323508473', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-20 02:51:46', '2022-06-20 02:51:46', NULL, 34, 12, NULL, 2),
(333, 'VAGNER DORNELLES RIBEIRO', 'DORNELLES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323790279', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-20 12:51:44', '2022-06-20 12:51:44', NULL, 22, 14, NULL, 5),
(334, 'Giovani Ferreira de Moraes', 'De Moraes', 'Maria Ester Penteado Ferreira de Moraes', 'Everson Lopes de Moraes', 'gigio.fm2010@gmail.com', 51992329314, 51993194949, '2001-01-17', NULL, '0321419871', 'img/img_profiles/334/img_profile_user_334-15-08-2022-18-08-05.png', 'img/img_background/bg3.jpg', 'Rua José Goulart', 762, 'Morada do Bosque', 64, 94960868, '2022-08-15 18:02:05', '2022-08-15 21:02:05', NULL, 43, 13, NULL, 2),
(335, 'Rafael Da Silva Martini', 'Rafael Martini', 'maria', 'adair', 'rafaeldasilvamartini@hotmail.com', 51992250410, 51934346145, '1970-01-01', NULL, '0319461679', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'casa', 232, 'rio branco', 1, 92200255, '2022-10-31 13:25:55', '2022-10-31 16:25:55', NULL, 34, 14, NULL, 2),
(336, 'Lucas Fumaco Prates', 'Prates', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321676470', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 11:28:54', '2022-06-21 11:28:54', NULL, 28, 8, NULL, 4),
(337, 'Maicon Lopes Oliveira', 'Maicon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0311677408', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 11:48:42', '2022-06-21 11:48:42', NULL, 37, 8, NULL, 3),
(338, 'Joao Gabriel Hilgert', 'Hilgert', 'Lucia de Fatima Veloso Linhares', 'Joao Carlos Hilgert', 'joaogabrielhilgert@hotmail.com', 51995842912, 51995367081, '1999-06-27', '247', '0317455079', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Estrada Mauricio Cardoso', 5880, 'Cinco de Maio', 2, 95780000, '2022-06-22 17:53:32', '2022-06-22 17:53:32', NULL, 22, 14, NULL, 5),
(339, 'Rafael dos Santos da Rosa', 'DA ROSA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323789479', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 16:45:50', '2022-06-21 16:45:50', NULL, 14, 14, NULL, 5),
(340, 'Abimael De Souza Florêncio', 'Florêncio', NULL, NULL, NULL, NULL, NULL, NULL, '1001', '0323771873', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 16:55:26', '2022-06-21 16:55:26', NULL, 34, 14, NULL, 2),
(341, 'Adryan Silveira Andrade', 'Adryan', NULL, NULL, NULL, NULL, NULL, NULL, '1002', '1643459066', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 16:56:55', '2022-06-21 16:56:55', NULL, 19, 14, NULL, 2),
(342, 'Charles Antonio Henriques Ragagnin', 'Charles Antonio Henriques Ragagnin', NULL, NULL, NULL, NULL, NULL, NULL, '1010', '0323775577', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:05:28', '2022-06-21 17:05:28', '2022-06-21', 19, 14, NULL, 2),
(343, 'Dalvan Rosa da Silva', 'Dalvan', NULL, NULL, NULL, NULL, NULL, NULL, '1011', '0323775676', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:03:30', '2022-06-21 17:03:30', NULL, 19, 14, NULL, 2),
(344, 'Charles Antonio Henriques Ragagnin', 'Charles', NULL, NULL, NULL, NULL, NULL, NULL, '1010', '0323775577', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:06:10', '2022-06-21 17:06:10', NULL, 19, 14, NULL, 2),
(345, 'Diogo Alexandre Rodrigues da Silva', 'Diogo Silva', NULL, NULL, NULL, NULL, NULL, NULL, '1013', '0323774976', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:07:32', '2022-06-21 17:07:32', NULL, 16, 14, NULL, 2),
(346, 'Dion Vitor Pereira Carlson', 'Dion', NULL, NULL, NULL, NULL, NULL, NULL, '1014', '0323775874', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:10:44', '2022-06-21 17:10:44', NULL, 19, 14, NULL, 2),
(347, 'Douglas Wolff de Sa', 'Wolff', NULL, NULL, NULL, NULL, NULL, NULL, '1015', '0323775973', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:11:28', '2022-06-21 17:11:28', NULL, 16, 14, NULL, 2),
(348, 'Ederson Machado da Silva', 'Ederson', NULL, NULL, NULL, NULL, NULL, NULL, '1016', '0323776070', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:12:26', '2022-06-21 17:12:26', NULL, 15, 14, NULL, 2),
(349, 'Eduardo Ribeiro Piquelet', 'Piquelet', NULL, NULL, NULL, NULL, NULL, NULL, '1018', '0323776278', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:13:07', '2022-06-21 17:13:07', NULL, 45, 14, NULL, 2),
(350, 'Estevan Santos Schulz', 'Estevan', NULL, NULL, NULL, NULL, NULL, NULL, '1020', '0323776476', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:13:58', '2022-06-21 17:13:58', NULL, 19, 14, NULL, 2),
(351, 'Ewerthon Alecsander Alves da Silva', 'Alecsander', NULL, NULL, NULL, NULL, NULL, NULL, '1021', '0323776575', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:14:42', '2022-06-21 17:14:42', NULL, 21, 14, NULL, 2),
(352, 'Gabriel Dos Santos Luz', 'Luz', NULL, NULL, NULL, NULL, NULL, NULL, '1023', '0323776773', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:15:28', '2022-06-21 17:15:28', NULL, 16, 14, NULL, 2),
(353, 'Gabriel Durzynski Dos Santos', 'Durzynski', NULL, NULL, NULL, NULL, NULL, NULL, '1024', '0323776872', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:16:21', '2022-06-21 17:16:21', NULL, 21, 14, NULL, 2),
(354, 'Gabriel Milk Luiz', 'Milk', NULL, NULL, NULL, NULL, NULL, NULL, '1027', '0323777177', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:16:57', '2022-06-21 17:16:57', NULL, 16, 14, NULL, 2),
(355, 'Gian Lucas Castelo de Oliveira', 'Castelo', NULL, NULL, NULL, NULL, NULL, NULL, '1029', '0323777375', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:17:42', '2022-06-21 17:17:42', NULL, 19, 14, NULL, 2),
(356, 'Giancarlo Pagliarini Alves', 'Pagliarini', NULL, NULL, NULL, NULL, NULL, NULL, '1030', '0323777474', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:19:28', '2022-06-21 17:19:28', NULL, 38, 14, NULL, 2),
(357, 'Diego Andre Mello da Rosa', 'Andre', NULL, NULL, NULL, NULL, NULL, NULL, '1012', '0323775775', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:25:26', '2022-06-21 17:25:26', NULL, 31, 14, NULL, 2),
(358, 'Gianluca Matte Silveira', 'Gianluca', 'Adriana Oliveira Matte', 'Evair da Silva Silveira', 'silveiragianluca@gmail.com', 51993726842, 51992523538, '2002-03-13', '1031', '0323777573', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Liberdade', 1746, 'Marechal Rondon', 1, 92020240, '2022-08-15 17:56:54', '2022-08-15 20:56:54', NULL, 19, 14, NULL, 2),
(359, 'Gideao Ricardo Kaupe Fonseca', 'Kaupe', NULL, NULL, NULL, NULL, NULL, NULL, '1032', '0323777672', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:27:32', '2022-06-21 17:27:32', NULL, 44, 14, NULL, 2),
(360, 'Guilherme Ferreira de Ferreira', 'Guilherme', NULL, NULL, NULL, NULL, NULL, NULL, '1034', '0323777870', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:28:18', '2022-06-21 17:28:18', NULL, 19, 14, NULL, 2),
(361, 'Ildelfonso Somoskoves Scheffer', 'Scheffer', NULL, NULL, NULL, NULL, NULL, NULL, '1040', '0323778472', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:31:21', '2022-06-21 17:31:21', NULL, 19, 14, NULL, 2),
(362, 'Jhonatan Teixeira Brito', 'Brito', NULL, NULL, NULL, NULL, NULL, NULL, '1042', '0323778670', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:32:08', '2022-06-21 17:32:08', NULL, 21, 14, NULL, 2),
(363, 'Jordan Pacini Castilhos', 'Castilhos', NULL, NULL, NULL, NULL, NULL, NULL, '1044', '0323778878', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:32:59', '2022-06-21 17:32:59', NULL, 16, 14, NULL, 2),
(364, 'Kaliandro Candido Dia', 'Kaliandro', NULL, NULL, NULL, NULL, NULL, NULL, '1046', '0323779074', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:33:44', '2022-06-21 17:33:44', NULL, 19, 14, NULL, 2),
(365, 'Lucas Eduardo Sant Anna Da Silva', 'Sant Anna', NULL, NULL, NULL, NULL, NULL, NULL, '1051', '0323779678', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:34:28', '2022-06-21 17:34:28', NULL, 19, 14, NULL, 2),
(366, 'Lucas Kasper Drum', 'Kasper', NULL, NULL, NULL, NULL, NULL, NULL, '1052', '0323779777', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:35:10', '2022-06-21 17:35:10', NULL, 47, 14, NULL, 2),
(367, 'Luiz Daniel Correira Argenta', 'Argenta', NULL, NULL, NULL, NULL, NULL, NULL, '1054', '0323779975', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:35:55', '2022-06-21 17:35:55', NULL, 19, 14, NULL, 2),
(368, 'Luiz Gustavo Campos Ribeiro', 'Campos', NULL, NULL, NULL, NULL, NULL, NULL, '1055', '0323780072', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:36:32', '2022-06-21 17:36:32', NULL, 19, 14, NULL, 2),
(369, 'Luka Gabriel Andrade Dos Santos', 'Luka', NULL, NULL, NULL, NULL, NULL, NULL, '1056', '0323780171', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:37:11', '2022-06-21 17:37:11', NULL, 19, 14, NULL, 2),
(370, 'Matheus Correa Caldeira', 'Caldeira', NULL, NULL, NULL, NULL, NULL, NULL, '1059', '0323780478', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:38:23', '2022-06-21 17:38:23', NULL, 16, 14, NULL, 2),
(371, 'Matheus da Silva Santos', 'Silva Santos', NULL, NULL, NULL, NULL, NULL, NULL, '1062', '0323780577', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:38:57', '2022-06-21 17:38:57', NULL, 19, 14, NULL, 2),
(372, 'ANTONIO CARLOS DE ARAUJO CUNHA', 'Antonio Carlos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0112023445', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-29 14:23:05', '2022-09-29 17:23:05', '2022-09-29', 48, 7, NULL, 4),
(373, 'Matheus de Carvalho de Vargas', 'Carvalho', NULL, NULL, NULL, NULL, NULL, NULL, '1061', '0323780676', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:40:10', '2022-06-21 17:40:10', NULL, 19, 14, NULL, 2),
(374, 'Matheus Pereira Machado', 'Machado', NULL, NULL, NULL, NULL, NULL, NULL, '1062', '0323780775', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:40:52', '2022-06-21 17:40:52', NULL, 15, 14, NULL, 2),
(375, 'Nicolas Soares Alves', 'Soares', NULL, NULL, NULL, NULL, NULL, NULL, '1067', '0323781278', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:41:28', '2022-06-21 17:41:28', NULL, 19, 14, NULL, 2),
(376, 'Nicolas Tavares Monteiro', 'Tavares', NULL, NULL, NULL, NULL, NULL, NULL, '1068', '0323781377', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:42:16', '2022-06-21 17:42:16', NULL, 20, 14, NULL, 2),
(377, 'Norton Gabriel Sarmento', 'Norton', NULL, NULL, NULL, NULL, NULL, NULL, '1069', '0323781476', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:42:54', '2022-06-21 17:42:54', NULL, 19, 14, NULL, 2),
(378, 'Osias Ferreira Dos Santos Junior', 'Osias', NULL, NULL, NULL, NULL, NULL, NULL, '1070', '0323781575', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:43:39', '2022-06-21 17:43:39', NULL, 16, 14, NULL, 2),
(379, 'Pedro Henrique de Castro Baptista', 'Baptista', NULL, NULL, NULL, NULL, NULL, NULL, '1072', '0323781773', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:44:18', '2022-06-21 17:44:18', NULL, 16, 14, NULL, 2),
(380, 'Roberth Teles Forigo', 'Forigo', NULL, NULL, NULL, NULL, NULL, NULL, '1073', '0323781872', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:45:33', '2022-06-21 17:45:33', NULL, 19, 14, NULL, 2),
(381, 'Sabrina Brendler', 'Brendler', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0325425775', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:46:14', '2022-06-21 17:46:14', NULL, 11, 8, NULL, 4),
(382, 'Ryan Alisson Soares Rocha', 'Rocha', NULL, NULL, NULL, NULL, NULL, NULL, '1074', '0323781971', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:46:17', '2022-06-21 17:46:17', NULL, 19, 14, NULL, 2),
(383, 'Ryan Alves da Silva', 'Ryan', NULL, NULL, NULL, NULL, NULL, NULL, '1075', '0323782078', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:47:14', '2022-06-21 17:47:14', '2022-06-21', 19, 14, NULL, 2),
(384, 'Ryan Alves da Silva', 'Ryan', NULL, NULL, NULL, NULL, NULL, NULL, '1075', '0323782078', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:48:02', '2022-06-21 17:48:02', NULL, 19, 14, NULL, 2),
(385, 'Brendon Helliel Dos Santos da Costa', 'Helliel', NULL, NULL, NULL, NULL, NULL, NULL, '1106', '0323796078', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:51:06', '2022-06-21 17:51:06', NULL, 38, 14, NULL, 2),
(386, 'Fabiano Gonçalves Filho', 'Fabiano', NULL, NULL, NULL, NULL, NULL, NULL, '1118', '0323797373', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:52:17', '2022-06-21 17:52:17', NULL, 16, 14, NULL, 2),
(387, 'Lucas de Souza Ribeiro', 'Lucas', NULL, NULL, NULL, NULL, NULL, NULL, '1143', '0323799874', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:52:56', '2022-06-21 17:52:56', NULL, 16, 14, NULL, 2),
(388, 'Lucas Rufino Flores', 'Rufino', NULL, NULL, NULL, NULL, NULL, NULL, '1146', '0323800177', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:53:36', '2022-06-21 17:53:36', NULL, 19, 14, NULL, 2),
(389, 'Marco de Andrade de Mattos', 'Marco', NULL, NULL, NULL, NULL, NULL, NULL, '1151', '0323800573', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:54:18', '2022-06-21 17:54:18', NULL, 34, 14, NULL, 2),
(390, 'Robson Silva de Brito', 'Robson', NULL, NULL, NULL, NULL, NULL, NULL, '1167', '0323802173', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:55:58', '2022-06-21 17:55:58', NULL, 16, 14, NULL, 2),
(391, 'Wesley Amaral Schneider Alves', 'Schneider', NULL, NULL, NULL, NULL, NULL, NULL, '1169', '0323802371', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:56:52', '2022-06-21 17:56:52', NULL, 16, 14, NULL, 2),
(392, 'Jonatan Misael Rosa Dos Santos', 'Misael', NULL, NULL, NULL, NULL, NULL, NULL, '1248', '0323833871', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:57:40', '2022-06-21 17:57:40', NULL, 16, 14, NULL, 2),
(393, 'João Vitor Pouey Souza Leal', 'Pouey', NULL, NULL, NULL, NULL, NULL, NULL, '1239', '0323850677', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 17:59:54', '2022-06-21 17:59:54', NULL, 34, 14, NULL, 2),
(394, 'Aruam Centeleghe Marques', 'Aruam', 'Jurema Heloisa Rodrigues Centeleghe', 'Jorge Nicolau Ramos Marques', 'aruamcm4@gmail.com', 51989062959, 51989060404, '2002-08-17', '322', '0323783175', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Boa Saúde', 1141, 'Rio Branco', 1, 92200001, '2022-09-27 11:39:58', '2022-09-27 14:39:58', NULL, 21, 14, NULL, 2),
(395, 'Diego Oliveira da Fontoura', 'Fontoura', NULL, NULL, NULL, NULL, NULL, NULL, '1312', '0323783670', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 18:01:31', '2022-06-21 18:01:31', NULL, 34, 14, NULL, 2),
(396, 'Gustavo de Oliveira Eckardt', 'Eckardt', NULL, NULL, NULL, NULL, NULL, NULL, '1336', '0323785972', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 18:02:52', '2022-06-21 18:02:52', NULL, 34, 14, NULL, 2),
(397, 'Leonardo Quevedo de Oliveira', 'Quevedo', NULL, NULL, NULL, NULL, NULL, NULL, '1349', '0323850271', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 18:03:44', '2022-06-21 18:03:44', NULL, 16, 14, NULL, 2);
INSERT INTO `users` (`id`, `name`, `professionalName`, `motherName`, `fatherName`, `email`, `phone1`, `phone2`, `born_at`, `militaryId`, `idt_mil`, `photoUrl`, `backgroundUrl`, `street`, `house_number`, `district`, `city_id`, `cep`, `created_at`, `updated_at`, `deleted_at`, `departament_id`, `rank_id`, `rank_group_id`, `company_id`) VALUES
(398, 'IGOR MARQUES MACIEL', 'Marques', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0317462273', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:40:25', '2022-08-24 19:40:25', '2022-08-24', 10, 14, NULL, 4),
(399, 'PETTERSON MIKAEL DA SILVA ASSUNCAO', 'Petterson', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '031949890_', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-21 18:07:54', '2022-06-21 18:07:54', NULL, 35, 14, NULL, 4),
(400, 'HIGOR HENRIQUE CORRÊA DE LIMA', 'CORRÊA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0540265004', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-22 13:31:59', '2022-06-22 13:31:59', NULL, 25, 14, NULL, 3),
(401, 'LUCIANO CARVALHO MOREIRA', 'L.MOREIRA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0130706344', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-22 17:04:11', '2022-06-22 17:04:11', NULL, 39, 9, NULL, 2),
(402, 'Gilson Henrique Farias de Farias', 'Farias', NULL, NULL, 'henriquefarias16@outlook.com', NULL, NULL, NULL, NULL, '0315084475', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-22 17:04:58', '2022-06-22 17:04:58', NULL, 22, 12, NULL, 5),
(403, 'EDUARDO MARTINS', 'EDUARDO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8888888888', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-22 17:21:49', '2022-06-22 17:21:49', '2022-06-22', 34, 13, NULL, 2),
(404, 'Nathan Eduardo da Silva', 'Nathan', NULL, NULL, 'nathanedu45@gmail.com', NULL, NULL, NULL, NULL, '0319470977', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-22 17:49:09', '2022-06-22 17:49:09', NULL, 19, 13, NULL, 2),
(405, 'Carlos Eduardo Brito', 'Carlos Brito', NULL, NULL, 'carloseduardobrito51@gmail.om', NULL, NULL, NULL, NULL, '0317463578', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-22 18:09:34', '2022-06-22 18:09:34', NULL, 19, 14, NULL, 2),
(406, 'João Gabriel Soares Rodrigues', 'Soares', 'Fabiane da Costa Soares', 'Marcos Tornquist Rodrigues', 'joaogabriel.canoas@hotmail.com', 51995988898, 5134635979, '2001-06-06', '134', '0321403370', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Monza', 275, 'São José', 1, 92425630, '2022-10-17 17:14:39', '2022-10-17 20:14:39', NULL, 6, 13, NULL, 3),
(407, 'LUIS CARLOS DE MELO DELGADO NETO', 'Delgado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323797076', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:41:52', '2022-08-24 19:41:52', '2022-08-24', 29, 14, NULL, 4),
(408, 'THYERRY RODRIGUES COSTA', 'Thyerry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323782177', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:42:05', '2022-08-24 19:42:05', '2022-08-24', 9, 14, NULL, 4),
(409, 'CARLOS EDUARDO RAMOS DA SILVEIRA', 'Carlos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323796474', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:42:26', '2022-08-24 19:42:26', '2022-08-24', 35, 14, NULL, 4),
(410, 'EDUARDO MARQUES DOS REIS', 'Reis', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323797274', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:42:36', '2022-08-24 19:42:36', '2022-08-24', 35, 14, NULL, 4),
(411, 'Nicolas Deivison Mello Mendes', 'Deivison', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0317465672', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-23 12:57:56', '2022-06-23 12:57:56', NULL, 13, 14, NULL, 5),
(412, 'MATHEUS BEHM BONAZZA', 'Bonazza', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323800672', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:42:43', '2022-08-24 19:42:43', '2022-08-24', 29, 14, NULL, 4),
(413, 'PAULO RICARDO DIAS LACERDA', 'Lacerda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323801779', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:42:51', '2022-08-24 19:42:51', '2022-08-24', 29, 14, NULL, 4),
(414, 'PEDRO AUGUSTO DO AMARAL', 'Augusto', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323801878', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:43:00', '2022-08-24 19:43:00', '2022-08-24', 16, 14, NULL, 4),
(415, 'ALEXANDRE BOHRER SOARES DA ROSA', 'Bohrer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323829374', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:43:06', '2022-08-24 19:43:06', '2022-08-24', 16, 14, NULL, 4),
(416, 'ANDRE GABRIEL EGGERS GERVAZONI', 'Gervazoni', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323829474', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:43:14', '2022-08-24 19:43:14', '2022-08-24', 35, 14, NULL, 4),
(417, 'ANDRIUS LORSCHEITER BAIRROS DA SILVA', 'Andrius', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '323829572_', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:43:21', '2022-08-24 19:43:21', '2022-08-24', 35, 14, NULL, 4),
(418, 'ANTONY ALESSANDRO MACIEL BORGES', 'Antony', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323829879', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:43:44', '2022-08-24 19:43:44', '2022-08-24', 17, 14, NULL, 4),
(419, 'CHRISTIAN RAMOS', 'Ramos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323830273', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:43:52', '2022-08-24 19:43:52', '2022-08-24', 16, 14, NULL, 4),
(420, 'CRISTIAN RIAN DA SILVA', 'Cristian', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323830471', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:43:59', '2022-08-24 19:43:59', '2022-08-24', 29, 14, NULL, 4),
(421, 'CRISTIAN RIBEIRO MOTA', 'Mota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323830570', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-23 11:36:25', '2022-06-23 11:36:25', NULL, 35, 14, NULL, 4),
(422, 'DANIEL GUILHERME MATTEI', 'Mattei', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323830679', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-23 11:37:30', '2022-06-23 11:37:30', NULL, 9, 14, NULL, 4),
(423, 'DEIVIS DA SILVA DOS SANTOS', 'Deivis', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323830976', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:44:08', '2022-08-24 19:44:08', '2022-08-24', 35, 14, NULL, 4),
(424, 'DOUGLAS GRAEFF GONCALVES', 'Graeff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323831073', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:44:15', '2022-08-24 19:44:15', '2022-08-24', 29, 14, NULL, 4),
(425, 'EDUARDO LISSARAS DA SILVA', 'Lissaras', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3200047453', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:44:21', '2022-08-24 19:44:21', '2022-08-24', 29, 14, NULL, 4),
(426, 'ENZO GABRIEL COSTA PINTO', 'Enzo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323831370', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:44:27', '2022-08-24 19:44:27', '2022-08-24', 16, 14, NULL, 4),
(427, 'ERICK JOSUE DE OLIVEIRA', 'Josue', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323831479', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:44:33', '2022-08-24 19:44:33', '2022-08-24', 9, 14, NULL, 4),
(428, 'EULLER DUTRA DORNELES', 'Euller', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323831677', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:48:51', '2022-08-24 19:48:51', '2022-08-24', 29, 14, NULL, 4),
(429, 'FILIPE MOREIRA MACHADO', 'Moreira', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323831974', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:45:06', '2022-08-24 19:45:06', '2022-08-24', 16, 14, NULL, 4),
(430, 'GABRIEL CARDOSO KUNRATH', 'Kunrath', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323832071', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-23 12:03:39', '2022-06-23 12:03:39', NULL, 9, 14, NULL, 4),
(431, 'GABRIEL LIMA DE ANDRADE', 'Andrade', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323832279', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:45:18', '2022-08-24 19:45:18', '2022-08-24', 29, 14, NULL, 4),
(432, 'GUILHERME FLORES PEREIRA', 'Pereira', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323832477', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-23 12:11:13', '2022-06-23 12:11:13', NULL, 9, 14, NULL, 4),
(433, 'GUILHERME GARCIA DUARTE', 'Duarte', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323832576', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-23 12:13:10', '2022-06-23 12:13:10', NULL, 10, 14, NULL, 4),
(434, 'GUSTAVO MULLER MEDEIROS', 'Gustavo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323832774', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-23 12:16:58', '2022-06-23 12:16:58', NULL, 17, 14, NULL, 4),
(435, 'HENRIQUE DADALT GONÇALVES', 'Dadalt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323832873', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-23 12:17:34', '2022-06-23 12:17:34', NULL, 17, 14, NULL, 4),
(436, 'IGOR RIBEIRO', 'Igor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323833079', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:45:38', '2022-08-24 19:45:38', '2022-08-24', 29, 14, NULL, 4),
(437, 'IURY GABIATI DO AMARAL', 'Gabiati', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323833277', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:45:44', '2022-08-24 19:45:44', '2022-08-24', 16, 14, NULL, 4),
(438, 'JOÃO PEDRO AVILA DE SOUZA', 'Pedro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323833673', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:45:56', '2022-08-24 19:45:56', '2022-08-24', 16, 14, NULL, 4),
(439, 'JONATHAN BATISTA PEREIRA PAREDES', 'Jonathan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323834077', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:46:03', '2022-08-24 19:46:03', '2022-08-24', 17, 14, NULL, 4),
(440, 'KEVIN OLIVEIRA SCHNEIDER', 'Kevin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '323834374_', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:49:04', '2022-08-24 19:49:04', '2022-08-24', 10, 14, NULL, 4),
(441, 'LEONARDO RAMOS FIALHO', 'Fialho', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323834671', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-23 12:22:24', '2022-06-23 12:22:24', NULL, 16, 14, NULL, 4),
(442, 'LEONARDO VIEGAS DALLA NORA', 'Dalla Nora', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323834770', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:46:20', '2022-08-24 19:46:20', '2022-08-24', 35, 14, NULL, 4),
(443, 'LUCAS CRUZ ANTUNES', 'Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323834879', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:46:26', '2022-08-24 19:46:26', '2022-08-24', 29, 14, NULL, 4),
(444, 'LUIS EDUARDO RODRIGUES', 'Luis Eduardo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323834978', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:46:34', '2022-08-24 19:46:34', '2022-08-24', 16, 14, NULL, 4),
(445, 'MAICON AUGUSTO CRIXEL QUEIROZ', 'Queiroz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323835272', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:46:42', '2022-08-24 19:46:42', '2022-08-24', 35, 14, NULL, 4),
(446, 'MATEUS ZANATTA MACIEL', 'Zanatta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323835470', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-23 14:03:39', '2022-06-23 14:03:39', NULL, 29, 14, NULL, 4),
(447, 'MATHEUS CARVALHO CANTINI RIBEIRO', 'Cantini', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0538227745', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:46:48', '2022-08-24 19:46:48', '2022-08-24', 17, 14, NULL, 4),
(448, 'NATANAEL CHAVES ABADI DINIZ', 'Diniz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323835777', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-23 14:04:54', '2022-06-23 14:04:54', NULL, 29, 14, NULL, 4),
(449, 'NIKOLAS DE OLIVEIRA MACHADO', 'De Oliveira', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323835876', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-23 14:05:23', '2022-06-23 14:05:23', NULL, 9, 14, NULL, 4),
(450, 'PABLO EDUARDO DOS SANTOS DOUGLAS', 'Pablo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323835975', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:47:05', '2022-08-24 19:47:05', '2022-08-24', 35, 14, NULL, 4),
(451, 'PEDRO AUGUSTO WOLLMANN', 'Wollman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323836072', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:47:12', '2022-08-24 19:47:12', '2022-08-24', 35, 14, NULL, 4),
(452, 'PEDRO HENRIQUE SOUZA DE CASTRO', 'Henrique', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323832972', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:47:22', '2022-08-24 19:47:22', '2022-08-24', 9, 14, NULL, 4),
(453, 'PEDRO LEONARDO PIRES DE SOUZA', 'Pires', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323836270', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-23 14:07:18', '2022-06-23 14:07:18', NULL, 29, 14, NULL, 4),
(454, 'THIAGO CRUZ LEAL', 'Thiago', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323836577', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:47:32', '2022-08-24 19:47:32', '2022-08-24', 9, 14, NULL, 4),
(455, 'THIAGO VIANNA DE OLIVEIRA', 'Vianna', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323836775', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:47:38', '2022-08-24 19:47:38', '2022-08-24', 29, 14, NULL, 4),
(456, 'WESLLEY LUCIANO PIRES DA SILVA', 'Luciano', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323836973', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:47:48', '2022-08-24 19:47:48', '2022-08-24', 16, 14, NULL, 4),
(457, 'YURI NATAN DA SILVA SIQUEIRA', 'Natan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323837070', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:47:56', '2022-08-24 19:47:56', '2022-08-24', 29, 14, NULL, 4),
(458, 'EDUARDO GABRIEL DE VARGAS', 'Vargas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323784777', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-23 14:09:51', '2022-06-23 14:09:51', NULL, 35, 14, NULL, 4),
(459, 'FAGNER MATHEUS RODRIGUES BUENO', 'Fagner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323784975', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:48:10', '2022-08-24 19:48:10', '2022-08-24', 35, 14, NULL, 4),
(460, 'GUILHERME DE JESUS CARDOZO', 'Cardozo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323785576', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-23 14:10:48', '2022-06-23 14:10:48', NULL, 35, 14, NULL, 4),
(461, 'JONATA RODRIGUES PEREIRA BALOC', 'Baloc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323786871', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-23 14:12:06', '2022-06-23 14:12:06', NULL, 35, 14, NULL, 4),
(462, 'YURI MACHADO DE OLIVEIRA', 'Yuri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323790675', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 16:48:23', '2022-08-24 19:48:23', '2022-08-24', 16, 14, NULL, 4),
(463, 'HUGO WESLEI ZANOVELLO DE LIMA', 'ZANOVELLO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0319458576', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-23 14:50:50', '2022-06-23 14:50:50', NULL, 33, 12, NULL, 2),
(464, 'eduarda cabral dos santos', 'Eduarda', NULL, NULL, 'eduarda_cabral@hotmail.com', NULL, NULL, NULL, NULL, '0319727970', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-23 17:49:52', '2022-06-23 17:49:52', NULL, 32, 12, NULL, 5),
(465, 'ADRIANO FRANCISCO DE SOUZA', 'FRANCISCO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321423576', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-23 18:47:21', '2022-06-23 18:47:21', NULL, 21, 14, NULL, 2),
(466, 'denilson dos anjos junioe', 'dos anjos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0403510076', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-27 12:49:20', '2022-06-27 12:49:20', NULL, 42, 12, NULL, 3),
(467, 'Juliano Pereira Martins', 'J. Pereira', NULL, NULL, 'julianopereiramartins@hotmail.com', NULL, NULL, NULL, NULL, '0310747175', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-27 14:16:25', '2022-06-27 14:16:25', NULL, 25, 13, NULL, 3),
(468, 'Hilderim Rodrigues da Silva', 'Hilderim', NULL, NULL, NULL, NULL, NULL, '1970-08-21', NULL, '0623311842', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-27 14:21:36', '2022-06-27 14:21:36', NULL, 33, 9, NULL, 5),
(469, 'José Ivo Velozo de Menezes', 'Ivo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1010256640', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-27 17:27:23', '2022-06-27 17:27:23', NULL, 49, 3, NULL, 1),
(470, 'Abel da Silva Lara', 'silva lara', NULL, NULL, 'abelslara@hotmail.com', NULL, NULL, NULL, NULL, '0435392345', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-28 13:14:38', '2022-06-28 13:14:38', NULL, 18, 5, NULL, 2),
(471, 'Claudemir Chaves de Souza Júnior', 'Claudemir', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321397978', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-28 14:35:29', '2022-06-28 14:35:29', NULL, 14, 14, NULL, 5),
(472, 'William Andriel Erdmann', 'Erdmann', NULL, NULL, 'cberdmann21@gmail.com', NULL, NULL, NULL, NULL, '0310746276', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-29 17:11:30', '2022-06-29 17:11:30', NULL, 25, 13, NULL, 3),
(473, 'Kevin Oliveira Schneider', 'Kevin', NULL, NULL, 'kevinschneider962@gmail.com', NULL, NULL, NULL, NULL, '0323834374', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-29 17:12:06', '2022-06-29 17:12:06', NULL, 10, 14, NULL, 4),
(474, 'CLAUDIONEI PAULON DOS PASSOS', 'PAULON', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0317450773', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-29 17:12:39', '2022-06-29 17:12:39', NULL, 41, 13, NULL, 2),
(475, 'EDSON RAFAEL SANTOS DA SILVA', 'EDSON', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6002299602', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-29 17:12:44', '2022-06-29 17:12:44', NULL, 22, 14, NULL, 5),
(476, 'JOÃO GABRIEL SOBRINHO FLORES', 'SOBRINHO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0530340500', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-29 17:12:54', '2022-06-29 17:12:54', NULL, 6, 14, NULL, 3),
(477, 'André Pinheiro Salbego', 'SALBEGO', NULL, NULL, 'andrepinheiro307@gmail.com', NULL, NULL, NULL, NULL, '0321414872', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-30 11:19:41', '2022-06-30 11:19:41', NULL, 25, 14, NULL, 3),
(478, 'RALF RODRIGUES AMORIM', 'RALF', NULL, NULL, 'ralf@3bsup.eb.mil.br', NULL, NULL, NULL, NULL, '0400473054', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-06-30 11:19:16', '2022-06-30 11:19:16', NULL, 43, 11, NULL, 2),
(479, 'André Luiz Santos de Mello', 'De Mello', NULL, NULL, 'andrededis165@gmail.com', NULL, NULL, NULL, NULL, '0322363979', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-01 12:30:29', '2022-07-01 12:30:29', NULL, 23, 8, NULL, 5),
(480, 'ELIANDRO FERREIRA GOMES', 'ELIANDRO', NULL, NULL, 'eliandro.br58@hotmail.com', NULL, NULL, NULL, NULL, '0304288657', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-01 12:30:42', '2022-07-01 12:30:42', NULL, 37, 12, NULL, 3),
(481, 'cael borchardt', 'borchardt', NULL, NULL, 'borchardtcael@bol.com.br', NULL, NULL, NULL, NULL, '0319509972', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-01 12:31:19', '2022-07-01 12:31:19', NULL, 22, 13, NULL, 5),
(482, 'Carlos Felisberto Garcia Martins Júnior', 'Felisberto', NULL, NULL, 'felisberto.3bsup@gmail.com', NULL, NULL, NULL, NULL, '0318844776', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-04 11:20:16', '2022-07-04 11:20:16', NULL, 23, 7, NULL, 5),
(483, 'PEDRO VESOLOSKI DA SILVA', 'VESOLOSKI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321383671', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-04 13:10:56', '2022-07-04 13:10:56', NULL, 21, 14, NULL, 2),
(484, 'Rodrigo Martins Dorneles', 'Martins', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321676371', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-04 13:11:18', '2022-07-04 13:11:18', NULL, 34, 8, NULL, 3),
(485, 'ruan silveira rodrigues', 'ruan', NULL, NULL, 'ruansilveirarodrigues@gmail.com', NULL, NULL, NULL, NULL, '0317449478', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-10-06 14:45:10', '2022-10-06 17:45:10', '2022-10-06', 37, 12, NULL, 3),
(486, 'Jonas Nunes de Moura', 'Moura', 'Maria lucia da silva nunes', 'sidnei laerte de moura', 'jhonasmoura077@gmail.com', 51999438880, 51990419990, '1999-01-11', '66', '0317458073', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Tenente Ary Tarrago', 1680, 'Jardim Itu', 187, 91225001, '2022-10-05 14:19:47', '2022-10-05 17:19:47', NULL, 22, 12, NULL, 5),
(487, 'Douglas Ubirajara Soares de Paula', 'de Paula', NULL, NULL, 'douglasubirajara4@gmail.com', NULL, NULL, NULL, NULL, '0323784074', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-06 13:55:21', '2022-07-06 13:55:21', NULL, 22, 14, NULL, 5),
(488, 'Alisson Soquetta Miranda', 'Soquetta', NULL, NULL, 'soquetta@3bsup.eb.mil.br', NULL, NULL, NULL, NULL, '0302066857', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-06 18:07:21', '2022-07-06 18:07:21', NULL, 45, 6, NULL, 3),
(489, 'JULIENE SOUSA FERREIRA', 'JULIENE', NULL, NULL, 'JULIENESOUSAF@GMAIL.COM', NULL, NULL, NULL, NULL, '0403942774', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-07 13:27:23', '2022-07-07 13:27:23', NULL, 27, 12, NULL, 4),
(490, 'Emilyano Fagundes Vettorazzi', 'Vettorazzi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0317461176', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-11 11:23:35', '2022-07-11 11:23:35', NULL, 37, 14, NULL, 3),
(491, 'Vinicius Nascimento Fernandes', 'Fernandes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0116068156', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-11 11:24:29', '2022-07-11 11:24:29', NULL, 22, 5, NULL, 1),
(492, 'Douglas Silva da Silva', 'Douglas Silva', NULL, NULL, 'douglass02102000@gmail.com', NULL, NULL, NULL, NULL, '0319466470', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-11 13:33:43', '2022-07-11 13:33:43', NULL, 43, 13, NULL, 2),
(493, 'Marcello Henrique Freitas Amaral', 'Marcello Amaral', NULL, NULL, 'marcello945143@gmail.com', NULL, NULL, NULL, NULL, '0400239455', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-13 12:35:24', '2022-07-13 12:35:24', NULL, 29, 6, NULL, 4),
(494, 'josé willian lopes da silva', 'willian', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323786970', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-13 16:53:45', '2022-07-13 16:53:45', NULL, 26, 14, NULL, 5),
(495, 'Euller Dutra Dorneles', 'EULLER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323831767', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-13 16:53:57', '2022-07-13 16:53:57', NULL, 27, 14, NULL, 4),
(496, 'Josué Vergilio Ribeiro da Silva', 'Vergilio', 'Marli Cunha Ribeiro Da Silva', 'Lair Ribeiro Da Silva', 'vergilio835@gmail.com', 51996712741, 51995225270, '1996-12-22', '83', '0315072777', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Avenida Boqueirão', 3521, 'Estância Velha', 1, 92032023, '2022-07-19 13:58:09', '2022-07-19 13:58:09', NULL, 26, 12, NULL, 3),
(497, 'Arthur Gabriel Ferreira Barbosa', 'Barbosa', NULL, NULL, 'artxboxo@gmail.com', NULL, NULL, NULL, NULL, '0321422776', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-18 11:49:17', '2022-07-18 11:49:17', NULL, 15, 14, NULL, 2),
(498, 'NASHARA MALDONADO VIEIRA', 'NASHARA', NULL, NULL, 'nasharamaldonado@hotmail.com', NULL, NULL, NULL, NULL, '0938371242', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-18 18:01:13', '2022-07-18 18:01:13', NULL, 25, 8, NULL, 3),
(499, 'Henrique Forte', 'Forte', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0322354275', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-21 14:01:04', '2022-07-21 14:01:04', NULL, 22, 8, NULL, 5),
(500, 'Douglas Soares Nunes', 'Douglas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0317443778', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-07-25 18:28:26', '2022-07-25 21:28:26', NULL, 45, 14, NULL, 2),
(501, 'Leonardo Campos Pereira', 'L.Pereira', 'dwa', 'wda', 'e@e.com', 55, 55, '1970-01-01', NULL, '0317454072', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'e', 265, 'e', 1, 65666666, '2022-11-09 12:29:16', '2022-11-09 15:29:16', NULL, 26, 13, NULL, 5),
(502, 'CRISTIANE VANIN', 'CRISTIANE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0401580758', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-06 03:25:45', '2022-08-06 06:25:45', NULL, 25, 11, NULL, 3),
(503, 'anthony gabriel lopes zanchi', 'zanchi', NULL, NULL, 'anthonyzanchi16@gmail.com', NULL, NULL, NULL, NULL, '0323795872', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-11 11:33:24', '2022-08-11 14:33:24', NULL, 6, 14, NULL, 3),
(504, 'William Andriel Erdmann', 'Erdmann', NULL, NULL, 'cberdmann21@gmail.com', NULL, NULL, NULL, NULL, '0310746277', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-15 13:18:12', '2022-08-15 16:18:12', NULL, 25, 13, NULL, 3),
(505, 'Eduardo Rodrigues Bastos', 'Bastos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321421075', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-15 13:18:26', '2022-08-15 16:18:26', NULL, 34, 14, NULL, 2),
(506, 'GUILHERME DIAS MARQUES', 'DIAS', NULL, NULL, 'guilherquii@gmail.com', NULL, NULL, NULL, NULL, '0323798074', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-15 13:18:37', '2022-08-15 16:18:37', NULL, 7, 14, NULL, 3),
(507, 'GUILHERME CRUZ', 'GUILHERME', NULL, NULL, 'guilherme.cruz189@gmail.com', NULL, NULL, NULL, NULL, '0317447175', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-16 11:16:16', '2022-08-16 14:16:16', NULL, 25, 14, NULL, 3),
(508, 'Arthur Mattos da Silva', 'Arthur', NULL, NULL, 'ibfarthur1@gmail.com', NULL, NULL, NULL, NULL, '0323782979', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-16 18:42:05', '2022-08-16 21:42:05', NULL, 22, 14, NULL, 5),
(509, 'guilherme fernando dos santos freitas da silva', 'fernado', NULL, NULL, 'xguilherme0103@gmail.com', NULL, NULL, NULL, NULL, '0323777771', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-17 13:10:44', '2022-08-17 16:10:44', NULL, 37, 14, NULL, 3),
(510, 'Dalton Felipe Pinto da Silva', 'Dalton', NULL, NULL, 'daltonfelipe.s@gmail.com', NULL, NULL, NULL, NULL, '0321397879', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-17 13:10:54', '2022-08-17 16:10:54', NULL, 23, 14, NULL, 5),
(511, 'LUCAS DA SILVA BRAGAMONTE', 'BRAGAMONTE', 'ÂNGELA BEATRIZ DA SILVA', 'CIRO MOREIRA BRAGAMONTE', 'lbragamonte@gmail.com', 51996865020, 51999510029, '2001-08-10', '151', '0321385379', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Doutor Sálvio Antônio Rosa', 146, 'AEROCLUBE', 2, 92527334, '2022-09-13 12:20:27', '2022-09-13 15:20:27', NULL, 22, 13, NULL, 5),
(512, 'Maickel de Freitas Nunes', 'Maickel', 'Andreia Cristina Maron de Freitas Nunes', 'Lindomar Peixoto Nunes', 'maickelfreitasnunes@gmail.com', 51998066196, 51998066196, '2001-01-19', '145', '0321418071', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Manoel de Souza', 217, 'Parque Granja Esperança', 64, 94960810, '2022-11-10 13:01:03', '2022-11-10 16:01:03', NULL, 42, 13, NULL, 2),
(513, 'João Vitor Romano da Silva', 'Romano', NULL, NULL, 'joaovitorromano0@gmail.com', NULL, NULL, NULL, NULL, '0321388076', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-22 13:10:57', '2022-08-22 16:10:57', NULL, 23, 14, NULL, 5),
(514, 'Henrique Duarte Afonso', 'Afonso', NULL, NULL, 'henriqueduarte305@gmail.com', NULL, NULL, NULL, NULL, '0323798272', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-22 13:11:02', '2022-08-22 16:11:02', NULL, 7, 14, NULL, 3),
(515, 'Alisson Dias Carvalho', 'Alisson', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323795674', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-24 12:17:34', '2022-08-24 15:17:34', NULL, 26, 14, NULL, 3),
(516, 'João Gabriel Pereira Setim', 'Setim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323786277', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-29 16:10:29', '2022-08-29 19:10:29', NULL, 23, 14, NULL, 5),
(517, 'Léo Nunes da Silva', 'Leo', NULL, NULL, 'leonunesdadilva7@gmail.com', NULL, NULL, NULL, NULL, '0323799270', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-29 16:10:35', '2022-08-29 19:10:35', NULL, 24, 14, NULL, 3),
(518, 'João Victor Neves Teixeira', 'NEVES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323799072', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-30 14:51:00', '2022-08-30 17:51:00', NULL, 6, 14, NULL, 3),
(519, 'Alan Alves dos Santos', 'Alan Alves', NULL, NULL, 'alan90alves@gmail.com', NULL, NULL, NULL, NULL, '0310748579', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-08-31 03:10:22', '2022-08-31 06:10:22', NULL, 7, 13, NULL, 3),
(520, 'Guilherme de Oliveira de Vargas', 'Guilherme Oliveira', NULL, NULL, 'gui27oliveiraa@gmail.com', NULL, NULL, NULL, NULL, '0319465472', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-01 13:30:02', '2022-09-01 16:30:02', NULL, 19, 14, NULL, 2),
(521, 'Miguel Ferreira Severo', 'Severo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0323801076', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-09 11:24:09', '2022-09-09 14:24:09', NULL, 37, 14, NULL, 3),
(522, 'vinícius Hoisler valença', 'Hoisler', NULL, NULL, 'vhoisler13@hotmail.com', NULL, NULL, NULL, NULL, '0323790378', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-13 16:55:52', '2022-09-13 19:55:52', NULL, 37, 14, NULL, 3),
(523, 'Dionatan Volmir Trein Necher', 'Volmir', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0321397374', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-13 16:55:58', '2022-09-13 19:55:58', NULL, 32, 14, NULL, 5),
(524, 'Lucas Rufino Flores', 'Rufino', NULL, NULL, 'lucasflores987542@gmail.com', NULL, NULL, NULL, NULL, '0552746100', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-15 17:17:45', '2022-09-15 20:17:45', NULL, 44, 14, NULL, 2),
(525, 'ARUAM CENTELEGHE MARQUES', 'ARUAM', NULL, NULL, 'aruamcm@gmail.com', NULL, NULL, NULL, NULL, '3203783175', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-09-27 11:25:07', '2022-09-27 14:25:07', '2022-09-27', 21, 14, NULL, 2),
(526, 'GABRIEL XAVIER SANTOS', 'Xavier', 'Tais Rodrigues Xavier', 'Sérgio Renato Rodrigues', 'xgabriel482@gmail.com', 51998474776, 51989122701, '1970-01-01', '73', '0317456176', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Tubarão', 19, 'Olaria', 1, 92035536, '2022-11-11 13:37:54', '2022-11-11 16:37:19', NULL, 29, 12, NULL, 4),
(527, 'Patrick Gonçalves da Costa', 'Gonçalves', NULL, NULL, 'goncalvespatrick293@gmail.com', NULL, NULL, NULL, NULL, '0403026776', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-10-03 19:14:44', '2022-10-03 22:14:44', NULL, 23, 12, NULL, 5),
(528, 'Fabiano Felin Weber', 'Weber', NULL, NULL, 'fabianofelinweber@gmail.com', NULL, NULL, NULL, NULL, '0130055247', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-10-07 11:38:16', '2022-10-07 14:38:16', NULL, 6, 9, NULL, 3),
(529, 'MÁRIO DA SILVA LOPES JÚNIOR', 'LOPES JÚNIOR', NULL, NULL, 'logistica.eb.junior@gmail.com', NULL, NULL, NULL, NULL, '0310319726', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-10-07 13:03:25', '2022-10-07 16:03:25', NULL, 23, 12, NULL, 5),
(530, 'Marcio Rodrigues Dornelles Filho', 'Filho', 'Darlene Dutra Dornelles', 'Marcio Rodrigues Dornelles', 'marciordornelles@hotmail.com', 51996138803, 51980437915, '1997-05-21', '49', '0312869670', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', 'Rua Doutor Bruno de Andrade', 836, 'Bela Vista', 2, 92523290, '2022-10-19 14:39:35', '2022-10-19 17:39:35', NULL, 37, 12, NULL, 3),
(532, 'Luis Rodolfo Cardoso da Silva', 'Cardoso', NULL, NULL, 'rodolfo.cs@hotmail.com', NULL, NULL, NULL, NULL, '0208259770', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-10-07 13:22:02', '2022-10-07 16:22:02', NULL, 16, 12, NULL, 2),
(533, 'ALESSANDRO DE SÁ DA SILVA', 'ALESSANDRO', NULL, NULL, 'silva60alessandro03@gmail.com', NULL, NULL, NULL, NULL, '6137717697', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-10-18 12:36:07', '2022-10-18 15:36:07', NULL, 21, 14, NULL, 2),
(534, 'Carolina Schneider Cordeiro Ramos', 'Carolina', NULL, NULL, 'carolina@3bsup.eb.mil.br', NULL, NULL, NULL, NULL, '0300619756', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-10-18 13:32:07', '2022-10-18 16:32:07', NULL, 46, 12, NULL, 2),
(535, 'Luis Gustavo Ferreira Freire', 'Freire', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1111111111', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-10-19 14:26:18', '2022-10-19 17:26:18', NULL, 34, 14, NULL, 2),
(537, 'Nigor de Oliveira Wovst', 'Wovst', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0449949800', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-10-19 14:25:49', '2022-10-19 17:25:49', NULL, 34, 14, NULL, 2),
(538, 'Luan Lamb Correa', 'Luan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7777777777', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-10-19 14:28:52', '2022-10-19 17:28:52', NULL, 34, 14, NULL, 2),
(539, 'FULANO DA SILVA SANTOS', 'FULANO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4544354454', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-10-26 19:01:28', '2022-10-26 22:01:28', '2022-10-26', 27, 14, NULL, 4),
(540, 'DANIEL DA SILVA COSTA', 'DANIEL', NULL, NULL, NULL, NULL, NULL, NULL, '519', '1_________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:20:22', '2022-11-16 15:20:22', NULL, 17, 14, NULL, 4),
(541, 'DIEMISON FRANCISCO DA SILVA AGUIRRE', 'DIEMISON', NULL, NULL, NULL, NULL, NULL, NULL, '520', '2_________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:21:43', '2022-11-16 15:21:43', NULL, 9, 14, NULL, 4),
(542, 'EMERSON CONCEIÇÃO DOS SANTOS', 'EMERSON', NULL, NULL, NULL, NULL, NULL, NULL, '521', '3_________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:22:55', '2022-11-16 15:22:55', NULL, 29, 14, NULL, 4),
(543, 'EMERSON LEANDRO MATTOS DA SILVA', 'MATTOS', NULL, NULL, NULL, NULL, NULL, NULL, '522', '4_________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:24:29', '2022-11-16 15:24:29', NULL, 6, 14, NULL, 4),
(544, 'ERICK RIAN DOS SANTOS RIVA', 'RIVA', NULL, NULL, NULL, NULL, NULL, NULL, '524', '5_________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:25:51', '2022-11-16 15:25:51', NULL, 29, 14, NULL, 4),
(545, 'ERICK RODRIGO DOS SANTOS EIDELWEIN', 'EIDELWEIN', NULL, NULL, NULL, NULL, NULL, NULL, '525', '6_________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:29:14', '2022-11-16 15:29:14', NULL, 35, 14, NULL, 4),
(546, 'ESTEVAN MACHADO ROCHA', 'ESTEVAN', NULL, NULL, NULL, NULL, NULL, NULL, '526', '7_________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:30:02', '2022-11-16 15:30:02', NULL, 29, 14, NULL, 4),
(547, 'EVERTON PEDROSO DOS SANTOS', 'PEDROSO', NULL, NULL, NULL, NULL, NULL, NULL, '527', '8_________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:32:21', '2022-11-16 15:32:21', NULL, 17, 14, NULL, 4),
(548, 'FELIPE LIMA DE CAMILLIS', 'CAMILLIS', NULL, NULL, NULL, NULL, NULL, NULL, '529', '9_________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:33:43', '2022-11-16 15:33:43', NULL, 16, 14, NULL, 4),
(549, 'GABRIEL PASTORINI', 'PASTORINI', NULL, NULL, NULL, NULL, NULL, NULL, '530', '10________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:36:05', '2022-11-16 15:36:05', NULL, 29, 14, NULL, 4),
(550, 'GREGORY GABRIEL MAIA DE FRAGA', 'GREGORY', NULL, NULL, NULL, NULL, NULL, NULL, '531', '11________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:37:09', '2022-11-16 15:37:09', NULL, 29, 14, NULL, 4),
(551, 'HENRIQUE BRUM GOMES', 'BRUM', NULL, NULL, NULL, NULL, NULL, NULL, '532', '12________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:38:00', '2022-11-16 15:38:00', NULL, 29, 14, NULL, 4),
(552, 'ISAQUE MONTEAVARO LINHAR', 'ISAQUE', NULL, NULL, NULL, NULL, NULL, NULL, '534', '13________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:38:59', '2022-11-16 15:38:59', NULL, 9, 14, NULL, 4),
(553, 'JOSUÉ ALVES DE ASSIS', 'JOSUÉ', NULL, NULL, NULL, NULL, NULL, NULL, '636', '14________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:39:56', '2022-11-16 15:39:56', NULL, 29, 14, NULL, 4),
(554, 'KAIAN JULIANO AFFONSO', 'JULIANO', NULL, NULL, NULL, NULL, NULL, NULL, '637', '15________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:45:33', '2022-11-16 15:45:33', NULL, 17, 14, NULL, 4),
(555, 'KAUANN BRAGA NUNES', 'BRAGA', NULL, NULL, NULL, NULL, NULL, NULL, '638', '16________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:46:35', '2022-11-16 15:46:35', NULL, 29, 14, NULL, 4),
(556, 'KAUAN TIAGO DE PAULA BERTHOLD', 'BERTHOLD', NULL, NULL, NULL, NULL, NULL, NULL, '639', '17________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:47:52', '2022-11-16 15:47:52', NULL, 29, 14, NULL, 4),
(557, 'KENNEDY ARENA GOMES FILHO', 'KENNEDY', NULL, NULL, NULL, NULL, NULL, NULL, '640', '18________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:48:48', '2022-11-16 15:48:48', NULL, 10, 14, NULL, 4),
(558, 'LEONARDO PAULO DE NOVAES', 'NOVAES', NULL, NULL, NULL, NULL, NULL, NULL, '641', '19________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:49:50', '2022-11-16 15:49:50', NULL, 17, 14, NULL, 4),
(559, 'LUAN SANTOS DE PAULA', 'LUAN SANTOS', NULL, NULL, NULL, NULL, NULL, NULL, '643', '20________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:50:37', '2022-11-16 15:50:37', NULL, 9, 14, NULL, 4),
(560, 'AMIEL DEMETRIUS NUNES DOS SANTOS', 'AMIEL', NULL, NULL, NULL, NULL, NULL, NULL, '703', '21________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:51:49', '2022-11-16 15:51:49', NULL, 29, 14, NULL, 4),
(561, 'ANDREW PATRICK SAWICKI BLANCO', 'BLANCO', NULL, NULL, NULL, NULL, NULL, NULL, '705', '22________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:53:20', '2022-11-16 15:53:20', NULL, 35, 14, NULL, 4),
(562, 'ANTONY KAUAN OLIVEIRA DA SILVA', 'ANTON Y', NULL, NULL, NULL, NULL, NULL, NULL, '706', '23________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 13:42:54', '2022-11-16 16:42:54', '2022-11-16', 9, 14, NULL, 4),
(563, 'BRIAN RICHARD DOS SANTOS DE ABREU', 'RICHARD', NULL, NULL, NULL, NULL, NULL, NULL, '707', '24________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:55:32', '2022-11-16 15:55:32', NULL, 35, 14, NULL, 4),
(564, 'BRUNO DE MELO RODRIGUES', 'DE MELO', NULL, NULL, NULL, NULL, NULL, NULL, '708', '25________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:56:25', '2022-11-16 15:56:25', NULL, 17, 14, NULL, 4),
(565, 'BRUNO GARCIA BARRETO', 'GARCIA', NULL, NULL, NULL, NULL, NULL, NULL, '709', '26________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:57:33', '2022-11-16 15:57:33', NULL, 29, 14, NULL, 4),
(566, 'CARLOS FREDERICO HOMEM DE OLIVEIRA MARTINS', 'FREDERICO', NULL, NULL, NULL, NULL, NULL, NULL, '711', '27________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:59:33', '2022-11-16 15:59:33', NULL, 29, 14, NULL, 4),
(567, 'CAUE GALLAS DE SOUZA', 'GALLAS', NULL, NULL, NULL, NULL, NULL, NULL, '713', '28________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:00:20', '2022-11-16 16:00:20', NULL, 29, 14, NULL, 4),
(568, 'CRISTIAN KAUE DOS SANTOS DIETRICH', 'DIETRICH', NULL, NULL, NULL, NULL, NULL, NULL, '715', '29________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:01:13', '2022-11-16 16:01:13', NULL, 35, 14, NULL, 4),
(569, 'CRISTIAN WILLIAN DOS SANTOS', 'CRISTIAN', NULL, NULL, NULL, NULL, NULL, NULL, '716', '30________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:02:10', '2022-11-16 16:02:10', NULL, 9, 14, NULL, 4),
(570, 'DANIEL WERNER PUCHALESKI ARBO', 'WERNER', NULL, NULL, NULL, NULL, NULL, NULL, '719', '31________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:03:10', '2022-11-16 16:03:10', NULL, 35, 14, NULL, 4),
(571, 'DAVID CAUA ALLEBRANDT', 'ALLEBRANDT', NULL, NULL, NULL, NULL, NULL, NULL, '721', '32________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:04:09', '2022-11-16 16:04:09', NULL, 16, 14, NULL, 4),
(572, 'DOUGLAS RAFAEL BROCHIER AGOSTINO', 'BROCHIER', NULL, NULL, NULL, NULL, NULL, NULL, '726', '33________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:05:05', '2022-11-16 16:05:05', NULL, 17, 14, NULL, 4);
INSERT INTO `users` (`id`, `name`, `professionalName`, `motherName`, `fatherName`, `email`, `phone1`, `phone2`, `born_at`, `militaryId`, `idt_mil`, `photoUrl`, `backgroundUrl`, `street`, `house_number`, `district`, `city_id`, `cep`, `created_at`, `updated_at`, `deleted_at`, `departament_id`, `rank_id`, `rank_group_id`, `company_id`) VALUES
(573, 'EDUARDO CASTRO MARQUES', 'EDUARDO', NULL, NULL, NULL, NULL, NULL, NULL, '727', '34________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:05:53', '2022-11-16 16:05:53', NULL, 29, 14, NULL, 4),
(574, 'EDUARDO DE MORAES SANTOS', 'DE MORAES', NULL, NULL, NULL, NULL, NULL, NULL, '728', '35________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:06:41', '2022-11-16 16:06:41', NULL, 29, 14, NULL, 4),
(575, 'ERICK KAIAN ELIAS DE SOUZA', 'ERICK', NULL, NULL, NULL, NULL, NULL, NULL, '730', '37________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:08:26', '2022-11-16 16:08:26', NULL, 9, 14, NULL, 4),
(576, 'ERICK YURI DE SOUZA', 'YURI', NULL, NULL, NULL, NULL, NULL, NULL, '731', '38________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:09:22', '2022-11-16 16:09:22', NULL, 10, 14, NULL, 4),
(577, 'ERICK CARDOSO PAIM', 'PAIM', NULL, NULL, NULL, NULL, NULL, NULL, '732', '39________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:10:09', '2022-11-16 16:10:09', NULL, 9, 14, NULL, 4),
(578, 'EVARISTO DIOGO BRAGA PEDROSA', 'EVARISTO', NULL, NULL, NULL, NULL, NULL, NULL, '733', '40________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:11:25', '2022-11-16 16:11:25', NULL, 29, 14, NULL, 4),
(579, 'FERNANDO JUNIOR DONELLES CASAGRANDE', 'CASAGRANDE', NULL, NULL, NULL, NULL, NULL, NULL, '734', '41________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:12:27', '2022-11-16 16:12:27', NULL, 9, 14, NULL, 4),
(580, 'FLAVIO MIGUEL DE ARAUJO', 'FLAVIO', NULL, NULL, NULL, NULL, NULL, NULL, '735', '42________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:13:39', '2022-11-16 16:13:39', NULL, 9, 14, NULL, 4),
(581, 'GABRIEL DA SILVA DIAS', 'DIAS', NULL, NULL, NULL, NULL, NULL, NULL, '736', '43________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:15:43', '2022-11-16 16:15:43', NULL, 16, 14, NULL, 4),
(582, 'GABRIEL MACHADO DA SILVA', 'MACHADO', NULL, NULL, NULL, NULL, NULL, NULL, '737', '44________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:16:37', '2022-11-16 16:16:37', NULL, 29, 14, NULL, 4),
(583, 'GUSTAVO MACHADO ANDRIOTTI', 'ANDRIOTI', NULL, NULL, NULL, NULL, NULL, NULL, '738', '45________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:17:31', '2022-11-16 16:17:31', NULL, 9, 14, NULL, 4),
(584, 'HENRI OLIVEIRA FRANCISCO', 'HENRI', NULL, NULL, NULL, NULL, NULL, NULL, '739', '46________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:18:19', '2022-11-16 16:18:19', NULL, 9, 14, NULL, 4),
(585, 'HENRIQUE PEREIRA DA SILVA', 'HENRIQUE', NULL, NULL, NULL, NULL, NULL, NULL, '740', '47________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:19:23', '2022-11-16 16:19:23', NULL, 9, 14, NULL, 4),
(586, 'HENRIQUE FERREIRA DE MORAES', 'HENRIQUE MORAES', NULL, NULL, NULL, NULL, NULL, NULL, '741', '48________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 13:33:52', '2022-11-16 16:33:52', '2022-11-16', 9, 14, NULL, 4),
(587, 'HENRIQUE FERREIRA DE MORAES', 'HENRIQUE MORAES', NULL, NULL, NULL, NULL, NULL, NULL, '741', '48________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:34:49', '2022-11-16 16:34:49', NULL, 16, 14, NULL, 4),
(588, 'IGOR OLIVEIRA RODRIGUES', 'IGOR', NULL, NULL, NULL, NULL, NULL, NULL, '742', '49________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:35:23', '2022-11-16 16:35:23', NULL, 9, 14, NULL, 4),
(589, 'JOÃO LEONARDO DE BORBA SILVA', 'JOÃO', NULL, NULL, NULL, NULL, NULL, NULL, '743', '50________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:36:19', '2022-11-16 16:36:19', NULL, 35, 14, NULL, 4),
(590, 'JOÃO PAULO FARIAS BRANDÃO', 'BRANDÃO', NULL, NULL, NULL, NULL, NULL, NULL, '744', '51________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:37:13', '2022-11-16 16:37:13', NULL, 35, 14, NULL, 4),
(591, 'JOÃO PEDRO DA SILVA', 'JOÃO PEDRO', NULL, NULL, NULL, NULL, NULL, NULL, '745', '52________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:38:02', '2022-11-16 16:38:02', NULL, 17, 14, NULL, 4),
(592, 'JOAO PEDRO MELLO WOHLERT', 'WOEHLERT', NULL, NULL, NULL, NULL, NULL, NULL, '746', '53________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:39:19', '2022-11-16 16:39:19', NULL, 35, 14, NULL, 4),
(593, 'JOÃO VITOR NOVELLO PADILHA', 'NOVELLO', NULL, NULL, NULL, NULL, NULL, NULL, '747', '54________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:41:33', '2022-11-16 16:41:33', NULL, 9, 14, NULL, 4),
(594, 'ANTONY KAUAN OLIVEIRA DA SILVA', 'ANTONY', NULL, NULL, NULL, NULL, NULL, NULL, '706', '23________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:43:51', '2022-11-16 16:43:51', NULL, 9, 14, NULL, 4),
(595, 'JOÃO VITOR PINHEIRO PEREIRA', 'PINHEIRO', NULL, NULL, NULL, NULL, NULL, NULL, '748', '55________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:44:42', '2022-11-16 16:44:42', NULL, 16, 14, NULL, 4),
(596, 'JOÃO VITOR SALES DOS SANTOS', 'SALES', NULL, NULL, NULL, NULL, NULL, NULL, '749', '56________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:47:33', '2022-11-16 16:47:33', NULL, 29, 14, NULL, 4),
(597, 'JOÃO VITOR VIERIA SANTANA', 'SANTANA', NULL, NULL, NULL, NULL, NULL, NULL, '750', '57________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:49:26', '2022-11-16 16:49:26', NULL, 9, 14, NULL, 4),
(598, 'JOSUE DA SILVA ARRUDA', 'ARRUDA', NULL, NULL, NULL, NULL, NULL, NULL, '751', '58________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:51:11', '2022-11-16 16:51:11', NULL, 35, 14, NULL, 4),
(599, 'JULIO KEVILIM PEQUERINO', 'PEQUERINO', NULL, NULL, NULL, NULL, NULL, NULL, '752', '59________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:53:01', '2022-11-16 16:53:01', NULL, 35, 14, NULL, 4),
(600, 'JULIO RICARDO MILCHERK CAVALHEIRO', 'CAVALHEIRO', NULL, NULL, NULL, NULL, NULL, NULL, '753', '60________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:53:59', '2022-11-16 16:53:59', NULL, 29, 14, NULL, 4),
(601, 'KAUE DA SILVA MARINS', 'KAUE MARINS', NULL, NULL, NULL, NULL, NULL, NULL, '755', '61________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:54:44', '2022-11-16 16:54:44', NULL, 35, 14, NULL, 4),
(602, 'KAUE MARTINS BITELO E SILVA', 'BITELO', NULL, NULL, NULL, NULL, NULL, NULL, '756', '62________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:55:35', '2022-11-16 16:55:35', NULL, 16, 14, NULL, 4),
(603, 'KEVIN GONÇANVES DO NASCIMENTO', 'NASCIMENTO', NULL, NULL, NULL, NULL, NULL, NULL, '757', '63________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:57:05', '2022-11-16 16:57:05', NULL, 16, 14, NULL, 4),
(604, 'LEONARDO MINKS PINHEIRO', 'MINKS', NULL, NULL, NULL, NULL, NULL, NULL, '758', '64________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:57:46', '2022-11-16 16:57:46', NULL, 29, 14, NULL, 4),
(605, 'LUCAS CASSIANO DA SILVA', 'CASSIANO', NULL, NULL, NULL, NULL, NULL, NULL, '759', '65________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 16:58:50', '2022-11-16 16:58:50', NULL, 10, 14, NULL, 4),
(606, 'LUCAS GABRIEL DE CASTILHOS', 'CASTILHOS', NULL, NULL, NULL, NULL, NULL, NULL, '760', '66________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 17:01:00', '2022-11-16 17:01:00', NULL, 16, 14, NULL, 4),
(607, 'LUIZ FELIPE DA SILVA TOMAZ', 'TOMAZ', NULL, NULL, NULL, NULL, NULL, NULL, '761', '67________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 17:02:15', '2022-11-16 17:02:15', NULL, 29, 14, NULL, 4),
(608, 'LUIZ MARIO COUTO DA ROCHA', 'COUTO', NULL, NULL, NULL, NULL, NULL, NULL, '762', '68________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 20:05:29', '2022-11-16 20:05:29', NULL, 16, 14, NULL, 4),
(609, 'MAICON MARTINELLI RODRIOGUES', 'MARTINELLI', NULL, NULL, NULL, NULL, NULL, NULL, '763', '69________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 20:06:31', '2022-11-16 20:06:31', NULL, 16, 14, NULL, 4),
(610, 'MARCOS GABRIEL LEMKE DA SILVA TAVARES', 'LEMKE', NULL, NULL, NULL, NULL, NULL, NULL, '764', '70________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 20:07:43', '2022-11-16 20:07:43', NULL, 35, 14, NULL, 4),
(611, 'MATHUES PETERS SILVA', 'PETERS', NULL, NULL, NULL, NULL, NULL, NULL, '765', '71________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 20:08:32', '2022-11-16 20:08:32', NULL, 9, 14, NULL, 4),
(612, 'NATHAN MACEDO DA SILVA', 'NATHAN', NULL, NULL, NULL, NULL, NULL, NULL, '766', '72________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 20:09:39', '2022-11-16 20:09:39', NULL, 10, 14, NULL, 4),
(613, 'NICOLLAS ENDERSON FERREIRA DA ROSA', 'ENDERSON', NULL, NULL, NULL, NULL, NULL, NULL, '767', '73________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 20:12:29', '2022-11-16 20:12:29', NULL, 35, 14, NULL, 4),
(614, 'NIKOLAS LOPES DA SILVA', 'LOPES', NULL, NULL, NULL, NULL, NULL, NULL, '768', '74________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 20:13:11', '2022-11-16 20:13:11', NULL, 9, 14, NULL, 4),
(615, 'PABLO WILLIAM ALVEZ DE MORAES', 'WILLIAM', NULL, NULL, NULL, NULL, NULL, NULL, '769', '75________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 20:13:56', '2022-11-16 20:13:56', NULL, 29, 14, NULL, 4),
(616, 'PABLO SAMUEL FIUZA TAVARES', 'FIUZA', NULL, NULL, NULL, NULL, NULL, NULL, '770', '76________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 20:15:01', '2022-11-16 20:15:01', NULL, 9, 14, NULL, 4),
(617, 'PEDRO HENRIQUE SANTOS DE MOURA', 'PEDRO MOURA', NULL, NULL, NULL, NULL, NULL, NULL, '771', '77________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 20:16:04', '2022-11-16 20:16:04', NULL, 35, 14, NULL, 4),
(618, 'RICARDO PROENÇA AGUIRRE DA ROSA', 'PROENÇA', NULL, NULL, NULL, NULL, NULL, NULL, '772', '78________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 20:16:51', '2022-11-16 20:16:51', NULL, 16, 14, NULL, 4),
(619, 'RICARDO SANTOS DA SILVA', 'RICARDO', NULL, NULL, NULL, NULL, NULL, NULL, '773', '79________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 20:17:36', '2022-11-16 20:17:36', NULL, 17, 14, NULL, 4),
(620, 'RICHARD FRANCISCO SOUSA DA SILVA', 'SOUSA', NULL, NULL, NULL, NULL, NULL, NULL, '774', '80________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 20:18:31', '2022-11-16 20:18:31', NULL, 29, 14, NULL, 4),
(621, 'ROBSON CAMPOS BERTOTI', 'BERTOTI', NULL, NULL, NULL, NULL, NULL, NULL, '775', '81________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 20:19:14', '2022-11-16 20:19:14', NULL, 9, 14, NULL, 4),
(622, 'RYAN WAGNER DA SILVA', 'WAGNER', NULL, NULL, NULL, NULL, NULL, NULL, '776', '82________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 20:19:59', '2022-11-16 20:19:59', NULL, 9, 14, NULL, 4),
(623, 'SAMUEL DA VEIGA SANTOS', 'VEIGA', NULL, NULL, NULL, NULL, NULL, NULL, '777', '83________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 20:20:38', '2022-11-16 20:20:38', NULL, 16, 14, NULL, 4),
(624, 'SAMUEL JONATAN DE OLIVEIRA DE SOUZA', 'OLIVEIRA SOUZA', NULL, NULL, NULL, NULL, NULL, NULL, '778', '84________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 20:21:35', '2022-11-16 20:21:35', NULL, 35, 14, NULL, 4),
(625, 'SAMUEL SOUZA DE MORAES', 'SAMUEL', NULL, NULL, NULL, NULL, NULL, NULL, '779', '85________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 20:22:16', '2022-11-16 20:22:16', NULL, 16, 14, NULL, 4),
(626, 'THIAGO DOS SANTOS DORGAN', 'DORGAN', NULL, NULL, NULL, NULL, NULL, NULL, '780', '86________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 20:23:13', '2022-11-16 20:23:13', NULL, 35, 14, NULL, 4),
(627, 'WESLLEY RONALD MEDONÇA PEROSA', 'PEROSA', NULL, NULL, NULL, NULL, NULL, NULL, '87', '87________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 20:24:34', '2022-11-16 20:24:34', NULL, 29, 14, NULL, 4),
(628, 'YURI VIEGAS DEBON', 'VIEGAS', NULL, NULL, NULL, NULL, NULL, NULL, '782', '88________', 'img/img_profiles/img_profile_padrao.png', 'img/img_background/bg3.jpg', NULL, NULL, NULL, NULL, NULL, '2022-11-16 20:25:21', '2022-11-16 20:25:21', NULL, 16, 14, NULL, 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `departament`
--
ALTER TABLE `departament`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `login_application`
--
ALTER TABLE `login_application`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `rank_groups`
--
ALTER TABLE `rank_groups`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT de tabela `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `departament`
--
ALTER TABLE `departament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=370;

--
-- AUTO_INCREMENT de tabela `login_application`
--
ALTER TABLE `login_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2948;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `ranks`
--
ALTER TABLE `ranks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `rank_groups`
--
ALTER TABLE `rank_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=629;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
