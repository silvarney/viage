-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 13-Fev-2021 às 07:11
-- Versão do servidor: 8.0.23-0ubuntu0.20.04.1
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `viage`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `cidade_id` int NOT NULL,
  `cidade_nome` varchar(45) DEFAULT NULL,
  `cidade_uf` varchar(45) DEFAULT NULL,
  `cidade_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `empresa_id` int NOT NULL,
  `empresa_nome` varchar(45) DEFAULT NULL,
  `empresa_responsavel` varchar(45) DEFAULT NULL,
  `empresa_fone` varchar(45) DEFAULT NULL,
  `empresa_tipo` varchar(45) DEFAULT NULL,
  `empresa_modelo` varchar(45) DEFAULT NULL,
  `empresa_lugar` varchar(45) DEFAULT NULL,
  `empresa_placa` varchar(45) DEFAULT NULL,
  `empresa_cor` varchar(45) DEFAULT NULL,
  `empresa_cidade` varchar(45) DEFAULT NULL,
  `empresa_bairro` varchar(45) DEFAULT NULL,
  `empresa_endereco` varchar(45) DEFAULT NULL,
  `empresa_capa` varchar(500) DEFAULT NULL,
  `empresa_perfil` varchar(500) DEFAULT NULL,
  `empresa_status` varchar(45) DEFAULT NULL,
  `usuario_id` int NOT NULL,
  `empresa_created` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`empresa_id`, `empresa_nome`, `empresa_responsavel`, `empresa_fone`, `empresa_tipo`, `empresa_modelo`, `empresa_lugar`, `empresa_placa`, `empresa_cor`, `empresa_cidade`, `empresa_bairro`, `empresa_endereco`, `empresa_capa`, `empresa_perfil`, `empresa_status`, `usuario_id`, `empresa_created`) VALUES
(1, 'Transporte Ligeirinho', 'Silvarney Henrique', '91992462035', 'Passeio', 'Honda Civic', '4', 'JHS-0938', 'azul', 'Tomé-Açu', 'Kanebo', 'Av. Primeiro de Setembro', 'xxx', 'xxx', 'ativo', 2, '2021-01-31'),
(2, 'SH TRANSPORTE', 'Eu internet', '91992462035', 'Micro', 'Vollare', '25', 'JQT-0972', 'cinza', 'Tomé-Açu', 'Novo Horizonte', 'Rua Principal', 'capanet', 'perfilnet', 'ativo', 2, '2021-01-31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomendas`
--

CREATE TABLE `encomendas` (
  `encomenda_id` int NOT NULL,
  `encomenda_data` date DEFAULT NULL,
  `encomenda_hora` varchar(45) DEFAULT NULL,
  `encomenda_origem` varchar(45) DEFAULT NULL,
  `encomenda_destino` varchar(45) DEFAULT NULL,
  `encomenda_valor` decimal(5,2) DEFAULT NULL,
  `encomenda_status` varchar(45) DEFAULT NULL,
  `encomenda_descricao` varchar(100) DEFAULT NULL,
  `empresa_id` int NOT NULL,
  `encomenda_created` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `encomendas`
--

INSERT INTO `encomendas` (`encomenda_id`, `encomenda_data`, `encomenda_hora`, `encomenda_origem`, `encomenda_destino`, `encomenda_valor`, `encomenda_status`, `encomenda_descricao`, `empresa_id`, `encomenda_created`) VALUES
(1, '2021-01-31', '02:00', 'Tomé-Açu', 'Belém', '60.00', 'ativo', 'cobramos por peso', 1, '2021-01-31'),
(2, '2021-02-28', '06:40', 'Tomé-Açu', 'Belém', '40.50', 'ativo', 'coletamos na porta', 1, '2021-01-31'),
(3, '2021-01-31', '02:00', 'Belém', 'Tomé-Açu', '60.00', 'ativo', 'cobramos por peso', 1, '2021-01-31'),
(4, '2021-01-31', '02:00', 'Castanhal', 'Belém', '60.00', 'ativo', 'cobramos por peso', 1, '2021-01-31'),
(5, '2021-01-31', '02:00', 'Belém', 'Castanhal', '60.00', 'ativo', 'cobramos por peso', 1, '2021-01-31'),
(6, '2021-02-28', '06:40', 'Tomé-Açu', 'Acará', '40.50', 'ativo', 'coletamos na porta', 1, '2021-01-31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `financeiros`
--

CREATE TABLE `financeiros` (
  `financeiro_id` int NOT NULL,
  `financeiro_data` date DEFAULT NULL,
  `financeiro_valor` decimal(5,2) DEFAULT NULL,
  `financeiro_vencimento` varchar(45) DEFAULT NULL,
  `financeiro_status` varchar(45) DEFAULT NULL,
  `empresa_id` int NOT NULL,
  `financeiro_created` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `mensagem_id` int NOT NULL,
  `mensagem_remetene` varchar(45) DEFAULT NULL,
  `mensagem_destinatario` varchar(45) DEFAULT NULL,
  `mensagem_texto` varchar(500) DEFAULT NULL,
  `mensagem_data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `passagens`
--

CREATE TABLE `passagens` (
  `passagem_id` int NOT NULL,
  `passagem_data` date DEFAULT NULL,
  `passagem_hora` varchar(45) DEFAULT NULL,
  `passagem_origem` varchar(45) DEFAULT NULL,
  `passagem_destino` varchar(45) DEFAULT NULL,
  `passagem_valor` decimal(5,2) DEFAULT NULL,
  `passagem_status` varchar(45) DEFAULT NULL,
  `empresa_id` int NOT NULL,
  `passagem_created` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `passagens`
--

INSERT INTO `passagens` (`passagem_id`, `passagem_data`, `passagem_hora`, `passagem_origem`, `passagem_destino`, `passagem_valor`, `passagem_status`, `empresa_id`, `passagem_created`) VALUES
(1, '2021-01-31', '02:00', 'Tomé-Açu', 'Belém', '60.00', 'ativo', 1, '2021-01-31'),
(2, '2021-02-01', '04:30', 'Tomé-Açu', 'Belém', '50.00', 'ativo', 1, '2021-01-31'),
(3, '2021-02-28', '06:40', 'Tomé-Açu', 'Belém', '40.50', 'ativo', 1, '2021-01-31'),
(4, '2021-01-31', '02:00', 'Belém', 'Tomé-Açu', '60.00', 'ativo', 1, '2021-01-31'),
(5, '2021-02-28', '06:40', 'Tomé-Açu', 'Mãe do Rio', '40.50', 'ativo', 1, '2021-01-31'),
(6, '2021-02-28', '06:40', 'Mãe do Rio', 'Tomé-Açu', '40.50', 'ativo', 1, '2021-01-31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int NOT NULL,
  `usuario_nome` varchar(45) DEFAULT NULL,
  `usuario_fone` varchar(45) DEFAULT NULL,
  `usuario_senha` varchar(45) DEFAULT NULL,
  `usuario_cidade` varchar(45) DEFAULT NULL,
  `usuario_status` varchar(45) DEFAULT NULL,
  `usuario_created` varchar(45) DEFAULT NULL,
  `usuario_dispositivo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_nome`, `usuario_fone`, `usuario_senha`, `usuario_cidade`, `usuario_status`, `usuario_created`, `usuario_dispositivo`) VALUES
(1, 'Lucas Oliveira', '91992482731', 'l123', 'Tomé-Açu', 'ativo', '2021-01-31', NULL),
(2, 'Silvarney Henrique', '91992462035', '123', 'Tomé-Açu', 'ativo', '2021-01-31', NULL),
(3, 'RAFAEL FAVACHO', '91882828282', 'r123', 'Belém', 'ativo', '2021-01-31', NULL),
(4, 'Fulano Cilcano 1', '91888888888', '123', 'Tomé-Açu', 'ativo', '2021-01-31', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda_passagem`
--

CREATE TABLE `venda_passagem` (
  `venda_passagem_id` int NOT NULL,
  `venda_passagem_fone` varchar(45) NOT NULL,
  `venda_passagem_data` date NOT NULL,
  `venda_passagem_hora` varchar(45) NOT NULL,
  `passagem_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`cidade_id`);

--
-- Índices para tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`empresa_id`,`usuario_id`),
  ADD KEY `fk_empresa_usuario_idx` (`usuario_id`);

--
-- Índices para tabela `encomendas`
--
ALTER TABLE `encomendas`
  ADD PRIMARY KEY (`encomenda_id`,`empresa_id`),
  ADD KEY `fk_encomenda_empresa1_idx` (`empresa_id`);

--
-- Índices para tabela `financeiros`
--
ALTER TABLE `financeiros`
  ADD PRIMARY KEY (`financeiro_id`,`empresa_id`),
  ADD KEY `fk_financeiro_empresa1_idx` (`empresa_id`);

--
-- Índices para tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`mensagem_id`);

--
-- Índices para tabela `passagens`
--
ALTER TABLE `passagens`
  ADD PRIMARY KEY (`passagem_id`,`empresa_id`),
  ADD KEY `fk_passagem_empresa1_idx` (`empresa_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Índices para tabela `venda_passagem`
--
ALTER TABLE `venda_passagem`
  ADD PRIMARY KEY (`venda_passagem_id`,`passagem_id`) USING BTREE,
  ADD KEY `fk_financeiro_passagem1_idx` (`passagem_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `cidade_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `empresa_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `encomendas`
--
ALTER TABLE `encomendas`
  MODIFY `encomenda_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `financeiros`
--
ALTER TABLE `financeiros`
  MODIFY `financeiro_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `mensagem_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `passagens`
--
ALTER TABLE `passagens`
  MODIFY `passagem_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `venda_passagem`
--
ALTER TABLE `venda_passagem`
  MODIFY `venda_passagem_id` int NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `fk_empresa_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`);

--
-- Limitadores para a tabela `encomendas`
--
ALTER TABLE `encomendas`
  ADD CONSTRAINT `fk_encomenda_empresa1` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`empresa_id`);

--
-- Limitadores para a tabela `financeiros`
--
ALTER TABLE `financeiros`
  ADD CONSTRAINT `fk_financeiro_empresa1` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`empresa_id`);

--
-- Limitadores para a tabela `passagens`
--
ALTER TABLE `passagens`
  ADD CONSTRAINT `fk_passagem_empresa1` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`empresa_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
