-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Tempo de geração: 30-Jun-2022 às 13:56
-- Versão do servidor: 8.0.19
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistimob`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

CREATE TABLE `imoveis` (
  `imo_id` int NOT NULL,
  `imo_titulo` varchar(150) NOT NULL,
  `imo_desc` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `imo_preco` int NOT NULL,
  `imo_img_local` varchar(200) NOT NULL,
  `imo_data_up` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imoveis`
--

INSERT INTO `imoveis` (`imo_id`, `imo_titulo`, `imo_desc`, `imo_preco`, `imo_img_local`, `imo_data_up`) VALUES
(23, 'Edifício Florence 2 quartos', 'Apartamentos de dois dormitórios, sendo uma suíte, varanda integrada nos quartos e sala, banheiro, área de serviço e uma vaga de garagem. Possui unidades semi-mobiliadas e preços variados entre as torres 1 e 2 dependendo da posição e andar da unidade. Localizado em área de grande movimentação de carros e pedestres, com diversos comércios de segmentos variados nas proximidades, shopping e hospital além de acesso fácil ao centro comercial de São Bernardo e de Santo André por veículo particular ou transporte coletivo.', 294900, 'img/f6b5ecc7cf255557f59363d1291cb838.jpg', '2022-06-30'),
(24, 'Terreno à venda', 'Centro, Pirapora do Bom Jesus - SP', 40000, 'img/9045e671b4e06fa3398920a9ae89f42a.jpeg', '2022-06-30'),
(22, 'Casa em Condomínio - Cidade Jardim, São Paulo', 'Casa em localização privilegiada, próxima a várias saídas do bairro, do Clube Paineiras do Morumbi e ao meio de muito verde e praças arborizadas. A área externa é composta por churrasqueira, piscina e jardim. A área social é composta por living com lareira, sala de jantar separada e cozinha. Na área íntima, existem três dormitórios, sendo uma suite. Todos com armários embutidos.', 2900000, 'img/4a300841ab04f76454080e1472c6cc6a.jpg', '2022-06-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `midias`
--

CREATE TABLE `midias` (
  `mid_id` int NOT NULL,
  `imo_id` int NOT NULL,
  `mid_tipo` varchar(200) NOT NULL,
  `mid_titulo` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `mid_caminho` varchar(120) NOT NULL,
  `mid_data_up` date NOT NULL,
  `mid_email_user` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `midias`
--

INSERT INTO `midias` (`mid_id`, `imo_id`, `mid_tipo`, `mid_titulo`, `mid_caminho`, `mid_data_up`, `mid_email_user`) VALUES
(7, 7, 'Escritura', 'escritura-mansao', '../documentos/escrituras/escritura-mansao.jpg', '2022-06-07', 'yan.pablo205@gmail.com'),
(26, 7, 'Planta-Baixa', 'planta-mansao', '../documentos/planta-baixa/planta-mansao.webp', '2022-06-08', 'yan.dasilva@hotmail.com'),
(31, 7, 'Comprovante de LocaÃ§Ã£o', 'comploc-mansao', '../documentos/comprovante/comploc-mansao.jpg', '2022-06-08', 'yan.pablo205@gmail.com'),
(32, 22, 'Planta-Baixa', 'teste-1', 'documentos/planta-baixa/teste1.jpg', '2022-06-29', 'teste@teste.com'),
(33, 22, 'Escritura-2', 'escritura-1', 'documentos/escrituras/escritura1.jpg', '2022-06-29', 'teste@teste.com'),
(34, 24, 'Planta-Baixa2', 'planta terreno 40k', 'documentos/planta-baixa/planta terreno 40k.jpg', '2022-06-30', 'celostad.dev@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`imo_id`);

--
-- Índices para tabela `midias`
--
ALTER TABLE `midias`
  ADD PRIMARY KEY (`mid_id`),
  ADD KEY `imo_id` (`imo_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `imo_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `midias`
--
ALTER TABLE `midias`
  MODIFY `mid_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
