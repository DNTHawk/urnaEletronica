-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 21-Set-2018 às 00:40
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urnaEletronica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidato`
--

CREATE TABLE `candidato` (
  `idCandidato` int(11) NOT NULL,
  `numero` varchar(11) NOT NULL,
  `nomeCandidato` varchar(250) NOT NULL,
  `partido` int(11) NOT NULL,
  `nomeVice` varchar(250) NOT NULL,
  `fotoCandidato` varchar(250) NOT NULL,
  `fotoVice` varchar(250) NOT NULL,
  `tipoCandidato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `candidato`
--

INSERT INTO `candidato` (`idCandidato`, `numero`, `nomeCandidato`, `partido`, `nomeVice`, `fotoCandidato`, `fotoVice`, `tipoCandidato`) VALUES
(19, 'BRANCO', 'BRANCO', 3, 'BRANCO', 'NULL', 'NULL', 1),
(20, 'BRANCO', 'BRANCO', 3, 'BRANCO', 'NULL', 'NULL', 2),
(21, 'BRANCO', 'BRANCO', 3, 'BRANCO', 'NULL', 'NULL', 3),
(22, 'BRANCO', 'BRANCO', 3, 'BRANCO', 'NULL', 'NULL', 4),
(23, 'BRANCO', 'BRANCO', 3, 'BRANCO', 'NULL', 'NULL', 5),
(24, '99', 'Homem de Ferro', 1, 'Maquina de Combate', '../system/fotos/5bc12c71a60d58a21dff2d1a0bb6cd31.png', '../system/fotos/8c5b9dc9f0ee117673347cb2662885e0.png', 5),
(25, '98', 'Batman', 2, 'Super Man', '../system/fotos/bd9037faf7ce3c83b508fa943cb12c22.png', '../system/fotos/5b81f8cc9becca633a72c3dea5fba66f.png', 5),
(26, '97', 'Professor X', 4, 'Logan', '../system/fotos/62fdc025cd75e98a4b8ea6d70ec07d3b.png', '../system/fotos/79e4d565a0ad66e8410f97143cab84ae.png', 5),
(27, '96', 'Optimus Prime', 5, 'Bumblebee', '../system/fotos/a23c812d54a495264c890def777be447.png', '../system/fotos/f9bde7ca3077831f9fad044fb43d4288.png', 5),
(28, '95', 'Gandalf', 6, 'Aragorn', '../system/fotos/c6d3b3c10255b582ef6d210a11c091fe.png', '../system/fotos/37f6e8fb96bced03eda2e58fbc7c16a5.png', 5),
(29, '99', 'Capitão America', 1, 'Falcão', '../system/fotos/7d394a0481d4b946e07e4be88f1433eb.png', '../system/fotos/6b56a7548c97d8c0e3c1fb6884a88019.png', 4),
(30, '98', 'Mulher Maravilha', 2, 'Aquaman', '../system/fotos/38cae32a3c2320477e0c42ef3e6234bb.png', '../system/fotos/5247527a9aa45304205221a51f57aff1.png', 4),
(31, '97', 'Magneto', 4, 'Mística', '../system/fotos/10f723ea002cfb8ad578437cf16822d8.png', '../system/fotos/f39008618f21382e8707d96393574955.png', 4),
(32, '96', 'Drift', 5, 'Crosshairs', '../system/fotos/81fb0acd79b7cdfd94c0941c9ea7d9a1.png', '../system/fotos/87b7a325972516744d6b540fd31e2b3b.png', 4),
(33, '95', 'Legolas', 6, 'Gimli', '../system/fotos/07177fa9e2512db20442c59d88e88a92.png', '../system/fotos/afcce0e16cb6af4810a6816e7cc4f885.png', 4),
(34, '991', 'Thor', 1, 'NULL', '../system/fotos/6a5e9b9c55878bc8eecd03b5a6c8b5c9.png', 'NULL', 3),
(35, '982', 'Cyborg', 2, 'NULL', '../system/fotos/d96ea8832e5c04d1a832ced28ecfaaf1.png', 'NULL', 3),
(36, '973', 'Tempestade', 4, 'NULL', '../system/fotos/b159473c9bc4632339c3c5e488168875.png', 'NULL', 3),
(37, '964', 'Megatron', 5, 'NULL', '../system/fotos/bf2382642061d3122348ef9e8a36ef5e.png', 'NULL', 1),
(38, '955', 'Saruman', 6, 'NULL', '../system/fotos/d49c933ecc902aa54ecb27f4471956ac.png', 'NULL', 3),
(39, '9911', 'Pantera Negra', 1, 'NULL', '../system/fotos/58cfc59e0089b2a54cbb55bf3947b389.png', 'NULL', 2),
(40, '9822', 'Flash', 2, 'NULL', '../system/fotos/a84802bf1024e30b9449ec6b10aa604f.png', 'NULL', 2),
(41, '9733', 'Fera', 4, 'NULL', '../system/fotos/3b0b3f5bebe9846efedc9ceb5a1b7ce0.png', 'NULL', 2),
(42, '9644', 'Starscream', 5, 'NULL', '../system/fotos/fffee75004a93c00292cca1cc0473f0c.png', 'NULL', 2),
(43, '9555', 'Bilbo Baggins', 6, 'NULL', '../system/fotos/cf3318918edeeff8f4924cda47a4d831.png', 'NULL', 2),
(44, '9912', 'Rocket Raccoon', 1, 'NULL', '../system/fotos/2934cefa0b6523e03efdb32dd12cc483.png', 'NULL', 2),
(45, '9823', 'Lex Luthor', 2, 'NULL', '../system/fotos/5081a7b2a66d2c3757fe8d693ef59eb2.png', 'NULL', 2),
(46, '9734', 'Jean Grey', 4, 'NULL', '../system/fotos/0313118055386d940dddda2949410f58.png', 'NULL', 2),
(47, '9645', 'Ratchet', 5, 'NULL', '../system/fotos/e5b1dbf32e3688ac23508736870932c7.png', 'NULL', 2),
(48, '9556', 'Galadriel', 6, 'NULL', '../system/fotos/6b0247449d8fb29695ed357c6859e4b1.png', 'NULL', 2),
(49, '99110', 'Drax', 1, 'NULL', '../system/fotos/883ed60cdca1145ebfc0356dfff6fb7e.png', 'NULL', 1),
(50, '98220', 'Coringa', 2, 'NULL', '../system/fotos/be54ea1aa918241d43b9b73e92862b1d.png', 'NULL', 1),
(51, '97330', 'Vampira', 4, 'NULL', '../system/fotos/bf506105fb94f827f925a485ecb3c9f2.png', 'NULL', 1),
(52, '96440', 'Wheelie', 5, 'NULL', '../system/fotos/db8f0d410edddbac07390b8903bc4076.png', 'NULL', 1),
(53, '95550', 'Arwen Undómiel', 6, 'NULL', '../system/fotos/e72504a5136dae6252dc6e03bd87d7bc.png', 'NULL', 1),
(54, '99120', 'Senhor das Estrelas', 1, 'NULL', '../system/fotos/71231e79b4ec670493466afcba7ca182.png', 'NULL', 1),
(55, '98230', 'Arlequina', 2, 'NULL', '../system/fotos/0534304396b8982e2c1e0804b62dde87.png', 'NULL', 1),
(56, '97340', 'Lince Negra', 4, 'NULL', '../system/fotos/297cb63ec49e306d62dbff93955c2124.png', 'NULL', 1),
(57, '96450', 'Lockdown', 5, 'NULL', '../system/fotos/6b5bc94372b1018fd7e9d7eddb233cda.png', 'NULL', 1),
(58, '95560', 'Elrond', 6, 'NULL', '../system/fotos/0104141819aa468403cccfc9c2943efb.png', 'NULL', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `partido`
--

CREATE TABLE `partido` (
  `idPartido` int(11) NOT NULL,
  `partido` varchar(250) NOT NULL,
  `descricao` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `partido`
--

INSERT INTO `partido` (`idPartido`, `partido`, `descricao`) VALUES
(1, 'PV', 'Partido dos Vingadores'),
(2, 'PLJ', 'Partido Liga da Justiça'),
(3, 'BRANCO', 'BRANCO'),
(4, 'PXM', 'Partido XMan'),
(5, 'PTFM', 'Partido Transformers'),
(6, 'PSN', 'Partido Senhor dos Anêis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoCandidato`
--

CREATE TABLE `tipoCandidato` (
  `idTipoCandidato` int(11) NOT NULL,
  `tipoCandidato` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipoCandidato`
--

INSERT INTO `tipoCandidato` (`idTipoCandidato`, `tipoCandidato`) VALUES
(1, 'Depultado Estadual'),
(2, 'Depultado Federal'),
(3, 'Senador'),
(4, 'Governador'),
(5, 'Presidente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `votos`
--

CREATE TABLE `votos` (
  `idVoto` int(11) NOT NULL,
  `idCandidatoVoto` int(11) NOT NULL,
  `numero` varchar(11) NOT NULL,
  `tipoCandidato` int(11) NOT NULL,
  `qtdVotos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `votos`
--

INSERT INTO `votos` (`idVoto`, `idCandidatoVoto`, `numero`, `tipoCandidato`, `qtdVotos`) VALUES
(61, 49, '99110', 1, 6),
(62, 39, '9911', 2, 6),
(63, 34, '991', 3, 6),
(64, 29, '99', 4, 6),
(65, 24, '99', 5, 3),
(66, 19, 'BRANCO', 1, 1),
(67, 20, 'BRANCO', 2, 1),
(68, 21, 'BRANCO', 3, 1),
(69, 22, 'BRANCO', 4, 1),
(70, 23, 'BRANCO', 5, 1),
(71, 25, '98', 5, 1),
(72, 26, '97', 5, 1),
(73, 27, '96', 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidato`
--
ALTER TABLE `candidato`
  ADD PRIMARY KEY (`idCandidato`);

--
-- Indexes for table `partido`
--
ALTER TABLE `partido`
  ADD PRIMARY KEY (`idPartido`);

--
-- Indexes for table `tipoCandidato`
--
ALTER TABLE `tipoCandidato`
  ADD PRIMARY KEY (`idTipoCandidato`);

--
-- Indexes for table `votos`
--
ALTER TABLE `votos`
  ADD PRIMARY KEY (`idVoto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidato`
--
ALTER TABLE `candidato`
  MODIFY `idCandidato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `partido`
--
ALTER TABLE `partido`
  MODIFY `idPartido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tipoCandidato`
--
ALTER TABLE `tipoCandidato`
  MODIFY `idTipoCandidato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `votos`
--
ALTER TABLE `votos`
  MODIFY `idVoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
