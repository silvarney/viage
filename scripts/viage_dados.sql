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

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`empresa_id`, `empresa_nome`, `empresa_responsavel`, `empresa_fone`, `empresa_tipo`, `empresa_modelo`, `empresa_lugar`, `empresa_placa`, `empresa_cor`, `empresa_cidade`, `empresa_bairro`, `empresa_endereco`, `empresa_capa`, `empresa_perfil`, `empresa_status`, `usuario_id`, `empresa_created`) VALUES
(1, 'Transporte Ligeirinho', 'Silvarney Henrique', '91992462035', 'Passeio', 'Honda Civic', '4', 'JHS-0938', 'azul', 'Tomé-Açu', 'Kanebo', 'Av. Primeiro de Setembro', 'xxx', 'xxx', 'ativo', 2, '2021-01-31'),
(2, 'SH TRANSPORTE', 'Eu internet', '91992462035', 'Micro', 'Vollare', '25', 'JQT-0972', 'cinza', 'Tomé-Açu', 'Novo Horizonte', 'Rua Principal', 'capanet', 'perfilnet', 'ativo', 2, '2021-01-31');

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

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_nome`, `usuario_fone`, `usuario_senha`, `usuario_cidade`, `usuario_status`, `usuario_created`, `usuario_dispositivo`) VALUES
(1, 'Lucas Oliveira', '91992482731', 'l123', 'Tomé-Açu', 'ativo', '2021-01-31', NULL),
(2, 'Silvarney Henrique', '91992462035', '123', 'Tomé-Açu', 'ativo', '2021-01-31', NULL),
(3, 'RAFAEL FAVACHO', '91882828282', 'r123', 'Belém', 'ativo', '2021-01-31', NULL),
(4, 'Fulano Cilcano 1', '91888888888', '123', 'Tomé-Açu', 'ativo', '2021-01-31', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
