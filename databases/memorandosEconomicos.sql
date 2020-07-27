-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 27/07/2020 às 18:09
-- Versão do servidor: 10.4.11-MariaDB
-- Versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `memorandosEconomicos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `conta`
--

CREATE TABLE `conta` (
  `id` int(11) NOT NULL,
  `conta` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `conta`
--

INSERT INTO `conta` (`id`, `conta`, `created_at`, `updated_at`) VALUES
(1, 'BANCO DO BRASIL S/A - C/C 73.373-3', '2020-07-24 15:49:24', '2020-07-24 15:49:24');

-- --------------------------------------------------------

--
-- Estrutura para tabela `favorecido`
--

CREATE TABLE `favorecido` (
  `id` int(11) NOT NULL,
  `favorecido` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `favorecido`
--

INSERT INTO `favorecido` (`id`, `favorecido`, `created_at`, `updated_at`) VALUES
(1, 'GABRIEL FERNANDES LIMA', '2020-07-24 15:59:17', '2020-07-24 15:59:17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `memorando`
--

CREATE TABLE `memorando` (
  `id` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `dataMemorando` date DEFAULT NULL,
  `anoMemorando` varchar(4) NOT NULL,
  `valor` float DEFAULT NULL,
  `nDoc` varchar(255) DEFAULT NULL,
  `nomeArquivo` varchar(255) DEFAULT NULL,
  `referenteComplemento` varchar(255) NOT NULL,
  `numeroProcesso` varchar(255) DEFAULT NULL,
  `id_conta` int(11) DEFAULT NULL,
  `id_favorecido` int(11) DEFAULT NULL,
  `id_referente` int(11) DEFAULT NULL,
  `id_subelemento` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `memorando`
--

INSERT INTO `memorando` (`id`, `numero`, `dataMemorando`, `anoMemorando`, `valor`, `nDoc`, `nomeArquivo`, `referenteComplemento`, `numeroProcesso`, `id_conta`, `id_favorecido`, `id_referente`, `id_subelemento`, `created_at`, `updated_at`) VALUES
(1, 30, '2020-02-06', '2020', 2555.78, '552.905.000.007.380', '0030 - Auxílio Alimentação FEV|2020 - 06-02-2020', ' FEV/2020', '007/2020', 1, 1, 1, 1, '2020-07-27 16:08:55', '2020-07-27 16:08:55');

-- --------------------------------------------------------

--
-- Estrutura para tabela `referente`
--

CREATE TABLE `referente` (
  `id` int(11) NOT NULL,
  `referente` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `referente`
--

INSERT INTO `referente` (`id`, `referente`, `created_at`, `updated_at`) VALUES
(1, 'Auxílio Alimentação', '2020-07-24 15:49:53', '2020-07-24 15:49:53');

-- --------------------------------------------------------

--
-- Estrutura para tabela `subelemento`
--

CREATE TABLE `subelemento` (
  `id` int(11) NOT NULL,
  `subelemento` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `subelemento`
--

INSERT INTO `subelemento` (`id`, `subelemento`, `created_at`, `updated_at`) VALUES
(1, '6.2.2.1.1.33.90.49.001 - Auxílio Alimentação', '2020-07-24 15:59:00', '2020-07-24 15:59:00');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `favorecido`
--
ALTER TABLE `favorecido`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `memorando`
--
ALTER TABLE `memorando`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `referente`
--
ALTER TABLE `referente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `subelemento`
--
ALTER TABLE `subelemento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `conta`
--
ALTER TABLE `conta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `favorecido`
--
ALTER TABLE `favorecido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `memorando`
--
ALTER TABLE `memorando`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `referente`
--
ALTER TABLE `referente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `subelemento`
--
ALTER TABLE `subelemento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
