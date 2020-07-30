-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 30/07/2020 às 19:08
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
(1, 'BANCO DO BRASIL 73.373-3', '2020-07-24 15:49:24', '2020-07-27 16:23:19');

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
(1, 'GABRIEL FERNANDES LIMA', '2020-07-24 15:59:17', '2020-07-24 15:59:17'),
(2, 'EDUARDO HENRIQUE RODRIGUES DE LIMA', '2020-07-28 13:32:50', '2020-07-30 12:30:28'),
(3, 'GEAN RICARDO A. ESTRELA', '2020-07-30 12:50:12', '2020-07-30 12:50:12'),
(4, 'MARLA MACIEL DO VALE', '2020-07-30 13:01:08', '2020-07-30 13:01:08'),
(5, 'LIDNA LIMA DE SOUZA', '2020-07-30 13:02:30', '2020-07-30 13:02:30'),
(6, 'JARDEL CORREA DE SOUZA', '2020-07-30 13:37:16', '2020-07-30 13:37:16'),
(7, 'SAID TAVARES LIBORIO', '2020-07-30 13:38:56', '2020-07-30 13:38:56'),
(8, 'ABNER VARELA MORAES', '2020-07-30 13:44:50', '2020-07-30 13:44:50'),
(9, 'RAUL FERNANDES CARNEIRO', '2020-07-30 13:45:36', '2020-07-30 13:45:36'),
(10, 'ERNANDES HERCULANO SARAIVA', '2020-07-30 13:46:37', '2020-07-30 13:46:37'),
(11, 'ROSENILDA BATISTA LIMA', '2020-07-30 14:29:38', '2020-07-30 14:29:38'),
(12, 'TARCISO MEYRA GALVÃO DA COSTA', '2020-07-30 14:51:42', '2020-07-30 14:51:42'),
(13, 'BRASIL VEÍCULOS - CIA DE SEGUROS LTDA', '2020-07-30 15:00:16', '2020-07-30 15:00:16'),
(14, 'SECRETARIA DA RECEITA F. DO BRASIL', '2020-07-30 15:01:09', '2020-07-30 15:29:57'),
(15, 'CAIXA ECONÔMICA FEDERAL', '2020-07-30 15:01:50', '2020-07-30 15:01:50'),
(16, 'B C TELÉGRAFOS - ETC', '2020-07-30 16:16:38', '2020-07-30 16:16:38'),
(17, 'THOMSON REUTERS BRAS', '2020-07-30 16:17:12', '2020-07-30 16:17:12'),
(18, 'BYTE SERVIÇOS DE INFOR LTDA', '2020-07-30 16:18:11', '2020-07-30 16:18:11');

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
(29, 29, '2020-01-31', '2020', 2100, '013103', '0029 - Assessoria Contábil JAN|2020 - 31-01-2020', ' JAN/2020', '0029/2020', 1, 2, 2, 2, '2020-07-30 13:20:04', '2020-07-30 13:20:04'),
(30, 30, '2020-02-06', '2020', 255, '552.905.000.077.380', '0030 - Auxílio Alimentação FEV|2020 - 06-02-2020', ' FEV/2020', '0030/2002', 1, 1, 1, 1, '2020-07-30 13:20:04', '2020-07-30 13:20:04'),
(31, 31, '2020-02-06', '2020', 2800, '552.905.000.029.105', '0031 - Jetons a diretoriados dias XX, XX, XX, XX, XX, XX, XX, XX, XX, de  JAN|2020 - 06-02-2020', 'dos dias XX, XX, XX, XX, XX, XX, XX, XX, XX, de  JAN/2020', '0031/2020', 1, 3, 3, 3, '2020-07-30 13:20:04', '2020-07-30 13:20:04'),
(32, 32, '2020-02-07', '2020', 2288.26, '552.905.000.077.380', '0032 - Pagamento de Salário JAN|2020 - 07-02-2020', ' JAN/2020', '0032/2020', 1, 1, 4, 4, '2020-07-30 13:20:04', '2020-07-30 13:20:04'),
(33, 33, '2020-02-07', '2020', 1161.46, '555.786.000.007.602', '0033 - Pagamento de Salário JAN|2020 - 07-02-2020', ' JAN/2020', '0033/2020', 1, 4, 4, 4, '2020-07-30 13:20:04', '2020-07-30 13:20:04'),
(34, 34, '2020-02-07', '2020', 1161.46, '554.218.000.032.915', '0034 - Pagamento de Salário JAN|2020 - 07-02-2020', ' JAN/2020', '0034/2020', 1, 5, 4, 4, '2020-07-30 13:20:04', '2020-07-30 13:20:04'),
(35, 35, '2020-02-07', '2020', 255, '555.786.000.007.602', '0035 - Auxílio Alimentação FEV|2020 - 07-02-2020', ' FEV/2020', '0035/2020', 1, 4, 1, 1, '2020-07-30 13:34:30', '2020-07-30 13:34:30'),
(36, 36, '2020-02-07', '2020', 255, '554.219.000.051.102', '0036 - Auxílio Alimentação FEV|2020 - 07-02-2020', ' FEV/2020', '0036/2020', 1, 6, 1, 1, '2020-07-30 13:38:32', '2020-07-30 13:38:32'),
(37, 37, '2020-02-10', '2020', 9051.11, '021001', '0037 - Rescisão do Contrato de Trabalho - 10-02-2020', '', '0037/2020', 1, 7, 5, 4, '2020-07-30 13:42:23', '2020-07-30 13:42:23'),
(38, 38, '2020-02-10', '2020', 2800, '021002', '0038 - Jetons a diretoria JAN|2020 - 10-02-2020', ' JAN/2020', '0038/2020', 1, 8, 3, 3, '2020-07-30 13:53:34', '2020-07-30 13:53:34'),
(39, 39, '2020-02-10', '2020', 1022.08, '021003', '0039 - Pagamento de Salário JAN|2020 - 10-02-2020', ' JAN/2020', '0039/2020', 1, 9, 4, 4, '2020-07-30 13:54:48', '2020-07-30 13:54:48'),
(40, 40, '2020-02-10', '2020', 2517.67, '021004', '0040 - Pagamento de Salário JAN|2020 - 10-02-2020', ' JAN/2020', '0040/2020', 1, 10, 4, 4, '2020-07-30 13:56:07', '2020-07-30 13:56:07'),
(41, 41, '2020-02-10', '2020', 255, '021005', '0041 - Auxílio Alimentação FEV|2020 - 10-02-2020', ' FEV/2020', '0041/2020', 1, 9, 1, 1, '2020-07-30 14:23:34', '2020-07-30 14:23:34'),
(42, 42, '2020-02-10', '2020', 500, '554.219.000.051.102', '0042 - Suprimento de Fundos FEV|2020 - 10-02-2020', ' FEV/2020', '0042/2020', 1, 6, 6, 5, '2020-07-30 14:24:55', '2020-07-30 14:25:26'),
(43, 43, '2020-02-10', '2020', 2507.18, '554.219.000.051.102', '0043 - Pagamento de Salário JAN|2020 - 10-02-2020', ' JAN/2020', '0043/2020', 1, 6, 4, 4, '2020-07-30 14:26:57', '2020-07-30 14:26:57'),
(44, 44, '2020-02-10', '2020', 255, '554.218.000.032.915', '0044 - Auxílio Alimentação FEV|2020 - 10-02-2020', ' FEV/2020', '0044/2020', 1, 5, 1, 1, '2020-07-30 14:28:53', '2020-07-30 14:28:53'),
(45, 45, '2020-02-12', '2020', 1482.62, '021201', '0045 - Pagamento de Salário JAN|2020 - 12-02-2020', ' JAN/2020', '0045/2020', 1, 11, 4, 4, '2020-07-30 14:30:55', '2020-07-30 14:30:55'),
(46, 46, '2020-02-12', '2020', 255, '021202', '0046 - Auxílio Alimentação FEV|2020 - 12-02-2020', ' FEV/2020', '0046/2020', 1, 11, 1, 1, '2020-07-30 14:33:39', '2020-07-30 14:33:39'),
(47, 47, '2020-02-14', '2020', 5000, '555.780.000.115.308', '0047 - Diárias a diretoria dos períodos 06|01 a 10|01 (4 diárias); 14|01 a 17|01 (3 diárias); 28|01 a 31|01 (3 diárias) - 14-02-2020', ' dos períodos 06/01 a 10/01 (4 diárias); 14/01 a 17/01 (3 diárias); 28/01 a 31/01 (3 diárias)', '0047/2020', 1, 12, 7, 7, '2020-07-30 15:16:14', '2020-07-30 15:20:28'),
(48, 48, '2020-02-15', '2020', 332.11, 'PROD6238001PROP007685455', '0048 - Seguro FEV|2020 - 15-02-2020', ' FEV/2020', '0048/2020', 1, 13, 8, 6, '2020-07-30 15:23:19', '2020-07-30 15:23:46'),
(49, 49, '2020-02-20', '2020', 4944.69, '022001', '0049 - Pagamento de DARF (0561) IRF - 20-02-2020', '', '0049/2020', 1, 14, 9, 8, '2020-07-30 15:26:16', '2020-07-30 15:26:16'),
(50, 50, '2020-02-20', '2020', 1165.09, '022002', '0050 - Pagamento de guia FGTS JAN|2020 - 20-02-2020', ' JAN/2020', '0050/2020', 1, 15, 10, 9, '2020-07-30 15:27:33', '2020-07-30 15:28:01'),
(51, 51, '2020-02-20', '2020', 121.4, '022003', '0051 - Pagamento de DARF (0561) IRF JAN|2020 - 20-02-2020', ' JAN/2020', '0051/2020', 1, 14, 9, 8, '2020-07-30 15:29:21', '2020-07-30 15:29:21'),
(52, 52, '2020-07-30', '2020', 166.75, '022004', '0052 - DARF (8301) PIS folha de pagamento  JAN|2020 - 30-07-2020', ' JAN/2020', '0052/2020', 1, 14, 11, 8, '2020-07-30 15:33:43', '2020-07-30 16:22:05'),
(53, 53, '2020-02-21', '2020', 585.41, '22.005', '0053 - Fatura Correios  FEV|2020 - 21-02-2020', ' FEV/2020', '0053/2020', 1, 8, 12, 10, '2020-07-30 16:31:36', '2020-07-30 16:31:36'),
(54, 54, '2020-02-20', '2020', 199.82, '22.006', '0054 - Sistema Folha Pagamento FEV|2020 - 20-02-2020', ' FEV/2020', '0054/2020', 1, 17, 13, 11, '2020-07-30 16:32:46', '2020-07-30 16:32:46'),
(55, 55, '2020-02-20', '2020', 370.59, '22.007', '0055 - Sistema Byte FEV|2020 - 20-02-2020', ' FEV/2020', '0055/2020', 1, 18, 14, 12, '2020-07-30 16:33:40', '2020-07-30 16:33:40'),
(56, 56, '2020-02-20', '2020', 20.51, '022008', '0056 - DARF (6190) Retenção Pag. Órgão PúblicoThomson FEV|2020 - 20-02-2020', 'Thomson FEV/2020', '0056/2020', 1, 14, 15, 8, '2020-07-30 16:34:44', '2020-07-30 16:44:09'),
(57, 57, '2020-02-20', '2020', 61.09, '022009', '0057 - DARF (6190) Retenção Pag. Órgão PúblicoEBCT FEV|2020 - 20-02-2020', 'EBCT FEV/2020', '0057/2020', 1, 14, 15, 8, '2020-07-30 16:36:51', '2020-07-30 16:44:59'),
(58, 58, '2020-02-20', '2020', 37.8, '022010', '0058 - DARF (6190) Retenção Pag. Órgão PúblicoBYTE FEV|2020 - 20-02-2020', 'BYTE FEV/2020', '0058/2020', 1, 14, 15, 8, '2020-07-30 16:38:08', '2020-07-30 16:45:16');

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
(1, 'Auxílio Alimentação', '2020-07-24 15:49:53', '2020-07-24 15:49:53'),
(2, 'Assessoria Contábil', '2020-07-30 12:31:12', '2020-07-30 12:31:12'),
(3, 'Jetons a diretoria', '2020-07-30 12:52:28', '2020-07-30 12:52:28'),
(4, 'Pagamento de Salário', '2020-07-30 12:54:44', '2020-07-30 12:55:13'),
(5, 'Rescisão do Contrato de Trabalho', '2020-07-30 13:40:31', '2020-07-30 13:41:05'),
(6, 'Suprimento de Fundos', '2020-07-30 14:25:16', '2020-07-30 14:25:16'),
(7, 'Diárias a diretoria', '2020-07-30 15:16:43', '2020-07-30 15:18:04'),
(8, 'Seguro', '2020-07-30 15:23:36', '2020-07-30 15:23:36'),
(9, 'DARF (0561) IRF', '2020-07-30 15:24:49', '2020-07-30 15:35:59'),
(10, 'Pagamento de guia FGTS', '2020-07-30 15:27:50', '2020-07-30 15:27:50'),
(11, 'DARF (8301) PIS folha de pagamento ', '2020-07-30 15:32:33', '2020-07-30 15:35:27'),
(12, 'Fatura Correios ', '2020-07-30 16:20:26', '2020-07-30 16:20:26'),
(13, 'Sistema Folha Pagamento', '2020-07-30 16:20:55', '2020-07-30 16:20:55'),
(14, 'Sistema Byte', '2020-07-30 16:21:20', '2020-07-30 16:22:26'),
(15, 'DARF (6190) Retenção em Pag. Órgão Público', '2020-07-30 16:24:38', '2020-07-30 16:47:05');

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
(1, '6.2.2.1.1.33.90.49.001 - Auxílio Alimentação', '2020-07-24 15:59:00', '2020-07-24 15:59:00'),
(2, '6.2.2.1.1.33.90.35.001 - Assessoria e consultoria técnica ou jurídica', '2020-07-30 12:32:23', '2020-07-30 12:32:23'),
(3, '6.2.2.1.1.33.90.93.011 - Jetons a diretoria', '2020-07-30 12:49:45', '2020-07-30 12:49:45'),
(4, '6.2.2.1.1.31.90.11.001 - Vencimento e salários', '2020-07-30 12:54:32', '2020-07-30 12:54:32'),
(5, '6.2.2.1.1.33.90.39.096 - Despesas miúdas de pronto pagamento', '2020-07-30 14:22:15', '2020-07-30 14:22:15'),
(6, '6.2.2.1.1.33.90.39.033 - Seguro em geral', '2020-07-30 14:56:12', '2020-07-30 14:56:12'),
(7, '6.2.2.1.1.33.90.36.022 - Diária a Conselheiros/Delegados no país', '2020-07-30 15:03:05', '2020-07-30 15:03:50'),
(8, '2.1.4.1.1.01.01.01.002 - Tributo/Contrib:IRPJ/CSLL/PIS/COFINS À recolher (COSIRF)', '2020-07-30 15:06:23', '2020-07-30 15:06:23'),
(9, '2.1.1.4.1.01.01.01.02 - FGTS à recolher', '2020-07-30 15:08:02', '2020-07-30 15:08:02'),
(10, '6.2.2.1.1.33.90.39.024 - Serviços de Correios e Telégrafos', '2020-07-30 16:12:00', '2020-07-30 16:12:00'),
(11, '6.2.2.1.1.33.90.39.045 - Aquisição de sistemas/programas software de informática', '2020-07-30 16:13:03', '2020-07-30 16:13:03'),
(12, '6.2.2.1.1.33.90.39.010 - Manutenção de Sistema de informática', '2020-07-30 16:14:15', '2020-07-30 16:14:15');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `memorando`
--
ALTER TABLE `memorando`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `referente`
--
ALTER TABLE `referente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `subelemento`
--
ALTER TABLE `subelemento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
