-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 03/03/2020 às 22:00
-- Versão do servidor: 10.1.40-MariaDB
-- Versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `memos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `conta`
--

CREATE TABLE `conta` (
  `id` int(11) NOT NULL,
  `conta` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `conta`
--

INSERT INTO `conta` (`id`, `conta`, `created_at`, `updated_at`) VALUES
(2, 'bb', '2020-03-03 20:46:01', '2020-03-03 20:46:01'),
(4, 'santander', '2020-03-03 20:52:55', '2020-03-03 20:52:55');

-- --------------------------------------------------------

--
-- Estrutura para tabela `favorecido`
--

CREATE TABLE `favorecido` (
  `id` int(11) NOT NULL,
  `favorecido` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `favorecido`
--

INSERT INTO `favorecido` (`id`, `favorecido`, `created_at`, `updated_at`) VALUES
(6, 'gabriel f lima', '2020-03-03 20:45:37', '2020-03-03 20:46:12');

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
  `id_conta` int(11) DEFAULT NULL,
  `id_favorecido` int(11) DEFAULT NULL,
  `id_referente` int(11) DEFAULT NULL,
  `id_subelemento` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `memorando`
--

INSERT INTO `memorando` (`id`, `numero`, `dataMemorando`, `anoMemorando`, `valor`, `nDoc`, `nomeArquivo`, `id_conta`, `id_favorecido`, `id_referente`, `id_subelemento`, `created_at`, `updated_at`) VALUES
(6, 1, '2020-03-03', '2020', 123, '123', '0001 - pagamento de salario', 1, 2, 1, 1, '2020-03-03 20:15:21', '2020-03-03 20:16:50');

-- --------------------------------------------------------

--
-- Estrutura para tabela `referente`
--

CREATE TABLE `referente` (
  `id` int(11) NOT NULL,
  `referente` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `referente`
--

INSERT INTO `referente` (`id`, `referente`, `created_at`, `updated_at`) VALUES
(3, 'Luz março', '2020-03-03 20:53:11', '2020-03-03 20:53:11');

-- --------------------------------------------------------

--
-- Estrutura para tabela `subelemento`
--

CREATE TABLE `subelemento` (
  `id` int(11) NOT NULL,
  `subelemento` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `subelemento`
--

INSERT INTO `subelemento` (`id`, `subelemento`, `created_at`, `updated_at`) VALUES
(2, '123 salario 2020', '2020-03-03 20:57:47', '2020-03-03 20:57:47'),
(3, '12389 - Pagamento Darf', '2020-03-03 20:57:59', '2020-03-03 20:57:59');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `favorecido`
--
ALTER TABLE `favorecido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `memorando`
--
ALTER TABLE `memorando`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `referente`
--
ALTER TABLE `referente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `subelemento`
--
ALTER TABLE `subelemento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
