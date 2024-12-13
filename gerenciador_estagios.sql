-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/12/2024 às 02:39
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gerenciador_estagios`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `num_convenio` varchar(255) DEFAULT NULL,
  `nome_empresa` varchar(255) NOT NULL,
  `cidade_empresa` varchar(255) NOT NULL,
  `endereco_empresa` varchar(255) NOT NULL,
  `telefone_empresa` varchar(255) NOT NULL,
  `email_empresa` varchar(255) NOT NULL,
  `cnpj_empresa` char(14) NOT NULL,
  `nome_representante` varchar(255) NOT NULL,
  `funcao_representante` varchar(255) DEFAULT NULL,
  `cpf_representante` char(11) NOT NULL,
  `rg_representante` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `estagios`
--

CREATE TABLE `estagios` (
  `id` int(11) NOT NULL,
  `id_estudante` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_professor_orientador` int(11) NOT NULL,
  `id_professor_coorientador` int(11) DEFAULT NULL,
  `nome_supervisor` varchar(255) NOT NULL,
  `cargo_supervisor` varchar(255) DEFAULT NULL,
  `telefone_supervisor` varchar(255) NOT NULL,
  `email_supervisor` varchar(255) NOT NULL,
  `tipo_processo` enum('Digital','Físico') DEFAULT 'Digital',
  `area_estagio` varchar(255) NOT NULL,
  `carga_horaria` int(11) NOT NULL,
  `encaminhamentos` text DEFAULT NULL,
  `termo_compromisso` varchar(255) DEFAULT NULL,
  `plano_estagio` varchar(255) DEFAULT NULL,
  `auto_avaliacao` varchar(255) DEFAULT NULL,
  `empresa_avaliacao` varchar(255) DEFAULT NULL,
  `relatorio_final` varchar(255) DEFAULT NULL,
  `inicio_estagio` date NOT NULL,
  `fim_estagio` date DEFAULT NULL,
  `media_final` decimal(10,2) DEFAULT NULL,
  `status` enum('Não iniciado','Em andamento','Finalizado') DEFAULT 'Não iniciado',
  `declara_banca` enum('Não','Sim') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `estudantes`
--

CREATE TABLE `estudantes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `matricula` char(12) NOT NULL,
  `cpf` char(11) NOT NULL,
  `rg` varchar(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `dataNasc` date DEFAULT NULL,
  `endereco` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `curso` enum('Administração','Agropecuária','Informatica','Meio Ambiente','Viticultura e Enologia') NOT NULL,
  `ano_letivo` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `professores`
--

CREATE TABLE `professores` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `siap` varchar(8) NOT NULL,
  `cpf` char(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` enum('1','2') NOT NULL,
  `tipo_entidade` enum('Administrador','Professor','Empresa','Estudante') DEFAULT 'Estudante',
  `id_entidade` int(11) DEFAULT NULL,
  `nome_entidade` varchar(255) NOT NULL,
  `email_entidade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `nivel`, `tipo_entidade`, `id_entidade`, `nome_entidade`, `email_entidade`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2', 'Administrador', NULL, 'Erica', 'secao.estagios@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cnpj_empresa` (`cnpj_empresa`),
  ADD UNIQUE KEY `cpf_representante` (`cpf_representante`);

--
-- Índices de tabela `estagios`
--
ALTER TABLE `estagios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estagios_estudante` (`id_estudante`),
  ADD KEY `fk_estagios_empresa` (`id_empresa`),
  ADD KEY `fk_estagios_professor_orientador` (`id_professor_orientador`);

--
-- Índices de tabela `estudantes`
--
ALTER TABLE `estudantes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricula` (`matricula`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices de tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siape` (`siap`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `estagios`
--
ALTER TABLE `estagios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `estudantes`
--
ALTER TABLE `estudantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `estagios`
--
ALTER TABLE `estagios`
  ADD CONSTRAINT `fk_estagios_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`),
  ADD CONSTRAINT `fk_estagios_estudante` FOREIGN KEY (`id_estudante`) REFERENCES `estudantes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
