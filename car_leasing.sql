-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Maio-2023 às 05:32
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `car_leasing`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alugueis`
--

CREATE TABLE `alugueis` (
  `id` int NOT NULL,
  `id_usuario` int DEFAULT NULL,
  `carro_id` int NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `valor_total` decimal(10,2) DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `alugueis`
--

INSERT INTO `alugueis` (`id`, `id_usuario`, `carro_id`, `data_inicio`, `data_fim`, `valor_total`, `excluido`) VALUES
(1, 16, 2, '2023-04-20', '2023-04-22', '320.00', 0),
(2, 7, 3, '2023-04-21', '2023-04-25', '640.00', 0),
(3, 18, 4, '2023-04-22', '2023-04-23', '100.00', 0),
(4, 8, 5, '2023-04-23', '2023-04-26', '270.00', 0),
(5, 9, 6, '2023-04-24', '2023-04-27', '210.00', 0),
(6, 17, 7, '2023-04-25', '2023-04-28', '285.00', 0),
(7, 7, 8, '2023-04-26', '2023-04-30', '440.00', 0),
(8, 9, 9, '2023-04-27', '2023-04-28', '110.00', 0),
(9, 9, 10, '2023-04-28', '2023-04-29', '70.00', 0),
(10, 7, 1, '2023-04-29', '2023-04-30', '150.00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

CREATE TABLE `carros` (
  `id` int NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `id_tipo_carro` int DEFAULT NULL,
  `ano` int DEFAULT NULL,
  `cor` varchar(50) DEFAULT NULL,
  `placa` varchar(20) DEFAULT NULL,
  `status` enum('disponivel','alugado') DEFAULT 'disponivel',
  `preco_dia` decimal(10,2) DEFAULT NULL,
  `revisao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `km_rodados` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'https://manuluize.com/wp-content/uploads/2016/11/Audi-R8.jpg',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `carros`
--

INSERT INTO `carros` (`id`, `modelo`, `id_tipo_carro`, `ano`, `cor`, `placa`, `status`, `preco_dia`, `revisao`, `km_rodados`, `img`, `excluido`) VALUES
(1, 'Honda Civic', 2, 2022, 'Branco', 'ABC-1234', 'disponivel', '150.00', '2022-01-01', '15000', 'https://manuluize.com/wp-content/uploads/2016/11/Audi-R8.jpg', 1),
(2, 'Toyota Corolla', 9, 2021, 'Prata', 'DEF-5678', 'disponivel', '160.00', '2022-02-05', '25000', 'https://manuluize.com/wp-content/uploads/2016/11/Audi-R8.jpg', 0),
(3, 'Volkswagen Golf', 4, 2020, 'Preto', 'GHI-9012', 'disponivel', '130.00', '2022-03-10', '30000', 'https://manuluize.com/wp-content/uploads/2016/11/Audi-R8.jpg', 0),
(4, 'Chevrolet Onix', 6, 2022, 'Vermelho', 'JKL-3456', 'disponivel', '100.00', '2022-04-15', '35000', 'https://manuluize.com/wp-content/uploads/2016/11/Audi-R8.jpg', 0),
(5, 'Fiat Argo', 4, 2021, 'Azul', 'MNO-7890', 'disponivel', '90.00', '2022-05-20', '40000', 'https://manuluize.com/wp-content/uploads/2016/11/Audi-R8.jpg', 0),
(6, 'Renault Kwid', 2, 2020, 'Branco', 'PQR-1234', 'disponivel', '80.00', '2022-06-25', '45000', 'https://manuluize.com/wp-content/uploads/2016/11/Audi-R8.jpg', 0),
(7, 'Ford Ka', 3, 2022, 'Cinza', 'STU-5678', 'disponivel', '95.00', '2022-07-30', '50000', 'https://manuluize.com/wp-content/uploads/2016/11/Audi-R8.jpg', 0),
(8, 'Hyundai HB20', 1, 2021, 'Prata', 'VWX-9012', 'disponivel', '110.00', '2022-08-30', '55000', 'https://manuluize.com/wp-content/uploads/2016/11/Audi-R8.jpg', 0),
(9, 'Nissan March', 2, 2020, 'Preto', 'YZA-3456', 'disponivel', '70.00', '2022-09-30', '60000', 'https://manuluize.com/wp-content/uploads/2016/11/Audi-R8.jpg', 0),
(10, 'Peugeot 208', 6, 2022, 'Vermelho', 'BCD-6789', 'disponivel', '120.00', '2022-10-30', '65000', 'https://manuluize.com/wp-content/uploads/2016/11/Audi-R8.jpg', 0),
(11, 'civic', 5, 2015, 'preto', '1456', 'disponivel', '100.00', '2023-05-01', '10000', 'https://manuluize.com/wp-content/uploads/2016/11/Audi-R8.jpg', 0),
(14, 'argo', 3, 2015, 'preto', '4646', 'disponivel', '100.00', '2023-05-02', '10000', 'https://manuluize.com/wp-content/uploads/2016/11/Audi-R8.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id` int NOT NULL,
  `aluguel_id` int NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `pagamentos`
--

INSERT INTO `pagamentos` (`id`, `aluguel_id`, `valor`, `data`) VALUES
(1, 1, '400.00', '2023-04-24'),
(2, 2, '300.00', '2023-04-25'),
(3, 3, '360.00', '2023-04-26'),
(4, 4, '270.00', '2023-04-23'),
(5, 5, '300.00', '2023-04-24'),
(6, 6, '420.00', '2023-04-26'),
(7, 7, '300.00', '2023-04-29'),
(8, 8, '450.00', '2023-05-02'),
(9, 9, '270.00', '2023-05-03'),
(10, 10, '400.00', '2023-05-05'),
(11, 3, '20200.00', '2023-05-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `id` int NOT NULL,
  `id_usuario` int DEFAULT NULL,
  `carro_id` int NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`id`, `id_usuario`, `carro_id`, `data_inicio`, `data_fim`, `excluido`) VALUES
(1, 8, 2, '2023-04-26', '2023-05-02', 0),
(2, 17, 5, '2023-05-01', '2023-05-03', 0),
(3, 10, 1, '2023-05-05', '2023-05-08', 0),
(4, 7, 3, '2023-05-10', '2023-05-15', 0),
(5, 9, 4, '2023-05-12', '2023-05-14', 0),
(6, 8, 1, '2023-05-15', '2023-05-20', 0),
(7, 7, 2, '2023-05-17', '2023-05-23', 0),
(8, 10, 4, '2023-05-20', '2023-05-25', 0),
(9, 18, 1, '2023-05-25', '2023-05-28', 0),
(10, 8, 3, '2023-05-30', '2023-06-05', 0),
(11, 10, 5, '2023-05-17', '2023-05-21', 0),
(12, 14, 14, '2023-05-02', '2023-06-02', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_carro`
--

CREATE TABLE `tipo_carro` (
  `id` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `faixa_valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tipo_carro`
--

INSERT INTO `tipo_carro` (`id`, `nome`, `faixa_valor`) VALUES
(1, 'Sedan', 60),
(2, 'Hatch', 50),
(3, 'SUV', 100),
(4, 'Picape', 40),
(5, 'Esportivo', 150),
(6, 'Compacto', 30),
(7, 'Luxo', 100),
(8, 'Utilitário', 70),
(9, 'Van', 60),
(10, 'Conversível', 180);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` enum('admin','cliente') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `endereco`, `telefone`, `email`, `data_nascimento`, `senha`, `tipo`, `excluido`) VALUES
(7, 'Carla Souza', 'Avenida F, 321', '(11) 4444-4444', 'carla.souza@gmail.com', '1982-12-05', '123456', 'cliente', 0),
(8, 'Carla', 'Rua G, 456', '(11) 3333-3333', 'felipe.silva@gmail.com', '1998-09-15', '123456', 'cliente', 0),
(9, 'Luciana Oliveira', 'Avenida H, 123', '(11) 2222-2222', 'luciana.oliveira@gmail.com', '1992-04-25', '123456', 'cliente', 0),
(10, 'Rafael Santos', 'Rua I, 987', '(11) 1111-1111', 'rafael.santos@gmail.com', '1980-07-12', '123456', 'cliente', 0),
(14, 'kailene', 'graciosa', '(41) 9999-9999', 'teste3@gmail.com', '2003-09-11', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 0),
(16, 'carlos', 'graciosa', '(41) 9999-9999', 'diego@gmail.com', '1996-10-24', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 0),
(17, 'kevin', 'graciosa', '(41) 9999-9999', 'kevin@gmail.com', '2023-05-16', '81dc9bdb52d04dc20036dbd8313ed055', 'cliente', 1),
(18, 'leonardo', 'graciosa', '(41) 9999-9999', 'leo@gmail.com', '2023-05-01', '81dc9bdb52d04dc20036dbd8313ed055', 'cliente', 1),
(24, 'teste222', 'graciosa', '(41) 9999-9999', 'teste@gmail.com', '2023-05-01', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 1),
(28, 'leo', 'graciosa', '(41) 9999-9999', 'leo2@gmail.com', '2023-05-02', '81dc9bdb52d04dc20036dbd8313ed055', 'cliente', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alugueis`
--
ALTER TABLE `alugueis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carro_id` (`carro_id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `carros`
--
ALTER TABLE `carros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `placa` (`placa`),
  ADD KEY `id_tipo_carro` (`id_tipo_carro`);

--
-- Índices para tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aluguel_id` (`aluguel_id`);

--
-- Índices para tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carro_id` (`carro_id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `tipo_carro`
--
ALTER TABLE `tipo_carro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alugueis`
--
ALTER TABLE `alugueis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `carros`
--
ALTER TABLE `carros`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tipo_carro`
--
ALTER TABLE `tipo_carro`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alugueis`
--
ALTER TABLE `alugueis`
  ADD CONSTRAINT `alugueis_ibfk_2` FOREIGN KEY (`carro_id`) REFERENCES `carros` (`id`),
  ADD CONSTRAINT `alugueis_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `carros`
--
ALTER TABLE `carros`
  ADD CONSTRAINT `carros_ibfk_1` FOREIGN KEY (`id_tipo_carro`) REFERENCES `tipo_carro` (`id`);

--
-- Limitadores para a tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD CONSTRAINT `pagamentos_ibfk_1` FOREIGN KEY (`aluguel_id`) REFERENCES `alugueis` (`id`);

--
-- Limitadores para a tabela `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`carro_id`) REFERENCES `carros` (`id`),
  ADD CONSTRAINT `reservas_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
