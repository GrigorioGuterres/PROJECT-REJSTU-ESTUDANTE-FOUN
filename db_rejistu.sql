-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 06:36 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rejistu`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `realdeia`
-- (See below for the actual view)
--
CREATE TABLE `realdeia` (
`id` int(11)
,`naran_aldeia` varchar(255)
,`id_municipio` varchar(255)
,`id_posto` varchar(255)
,`id_suko` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `reesudan`
-- (See below for the actual view)
--
CREATE TABLE `reesudan` (
`id` int(11)
,`n_emis` int(11)
,`naran_estudante` varchar(255)
,`sexo` varchar(255)
,`data_moris` date
,`f_moris` varchar(255)
,`img_estudante` varchar(255)
,`eskola_anterior` varchar(255)
,`pai` varchar(255)
,`mae` varchar(255)
,`id_municipiu` varchar(255)
,`id_postu` varchar(255)
,`id_suco` varchar(255)
,`id_aldeia` varchar(255)
,`n_kontaktu` varchar(255)
,`data_rejistu` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `remunicp`
-- (See below for the actual view)
--
CREATE TABLE `remunicp` (
`id` int(11)
,`naran` varchar(255)
,`obs` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `repost`
-- (See below for the actual view)
--
CREATE TABLE `repost` (
`id` int(11)
,`naran_postu` varchar(255)
,`id_municipiu` varchar(255)
,`obs_postu` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `resuko`
-- (See below for the actual view)
--
CREATE TABLE `resuko` (
`id` int(11)
,`naran_suku` varchar(255)
,`id_posto` varchar(255)
,`id_municipiu` varchar(255)
,`obs` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `suko`
--

CREATE TABLE `suko` (
  `id` int(11) NOT NULL,
  `naran_suku` varchar(255) NOT NULL,
  `id_posto` varchar(255) NOT NULL,
  `id_municipiu` varchar(255) NOT NULL,
  `obs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suko`
--

INSERT INTO `suko` (`id`, `naran_suku`, `id_posto`, `id_municipiu`, `obs`) VALUES
(3, 'mmm', 'COMORO', 'DILI', 'DIAK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_aldeia`
--

CREATE TABLE `tb_aldeia` (
  `id` int(11) NOT NULL,
  `naran_aldeia` varchar(255) NOT NULL,
  `id_municipio` varchar(255) NOT NULL,
  `id_posto` varchar(255) NOT NULL,
  `id_suko` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_aldeia`
--

INSERT INTO `tb_aldeia` (`id`, `naran_aldeia`, `id_municipio`, `id_posto`, `id_suko`) VALUES
(1, 'BEDOIS', 'DILI', 'COMORO', 'mmm');

-- --------------------------------------------------------

--
-- Table structure for table `tb_estudante`
--

CREATE TABLE `tb_estudante` (
  `id` int(11) NOT NULL,
  `n_emis` int(11) NOT NULL,
  `naran_estudante` varchar(255) NOT NULL,
  `sexo` varchar(255) NOT NULL,
  `data_moris` date NOT NULL,
  `f_moris` varchar(255) NOT NULL,
  `img_estudante` varchar(255) NOT NULL,
  `eskola_anterior` varchar(255) NOT NULL,
  `pai` varchar(255) NOT NULL,
  `mae` varchar(255) NOT NULL,
  `id_municipiu` varchar(255) NOT NULL,
  `id_postu` varchar(255) NOT NULL,
  `id_suco` varchar(255) NOT NULL,
  `id_aldeia` varchar(255) NOT NULL,
  `n_kontaktu` varchar(255) NOT NULL,
  `data_rejistu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_estudante`
--

INSERT INTO `tb_estudante` (`id`, `n_emis`, `naran_estudante`, `sexo`, `data_moris`, `f_moris`, `img_estudante`, `eskola_anterior`, `pai`, `mae`, `id_municipiu`, `id_postu`, `id_suco`, `id_aldeia`, `n_kontaktu`, `data_rejistu`) VALUES
(1, 87878, 'NIHUHIUH', 'Male', '2023-12-06', 'MKMLKM', 'http://localhost/mmm/uploads/files/x0rj4gmwof71ktl.jpg', 'KMLKMLK', 'KLMKLMLM', 'KLMLKMKL', 'DILI', 'COMORO', 'mmm', 'BEDOIS', '786868', '2023-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_municipiu`
--

CREATE TABLE `tb_municipiu` (
  `id` int(11) NOT NULL,
  `naran` varchar(255) NOT NULL,
  `obs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_municipiu`
--

INSERT INTO `tb_municipiu` (`id`, `naran`, `obs`) VALUES
(1, 'baucau', 'siak'),
(2, 'DILI', 'DIAK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_postu`
--

CREATE TABLE `tb_postu` (
  `id` int(11) NOT NULL,
  `naran_postu` varchar(255) NOT NULL,
  `id_municipiu` varchar(255) NOT NULL,
  `obs_postu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_postu`
--

INSERT INTO `tb_postu` (`id`, `naran_postu`, `id_municipiu`, `obs_postu`) VALUES
(1, 'BAGIA', 'baucau', 'DIAK'),
(2, 'COMORO', 'DILI', 'DIAK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `naran_kompletu` varchar(255) NOT NULL,
  `login_session_key` varchar(255) DEFAULT NULL,
  `email_status` varchar(255) DEFAULT NULL,
  `password_expire_date` datetime DEFAULT '2024-03-19 00:00:00',
  `password_reset_key` varchar(255) DEFAULT NULL,
  `account_status` varchar(255) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `email`, `foto`, `no_hp`, `naran_kompletu`, `login_session_key`, `email_status`, `password_expire_date`, `password_reset_key`, `account_status`) VALUES
(1, 'admin', '$2y$10$axPLroYZ4xo21gtwabmOOu20FQ6BxND1IF558LkBd4aNnYp8QVfoq', 'admin@gmail.com', 'http://localhost/mmm/uploads/files/xlsyp6wijbn9ctz.jpg', '75454656', 'Mario Ximenes', NULL, NULL, '2024-03-19 00:00:00', NULL, 'Active'),
(2, 'user', '$2y$10$/ta6UvYOmVVZbzP4LqWmou2H8SJ6dJInXJXEmIJCxEHCPYv4he1Tu', 'user@gmail.com', 'http://localhost/mmm/uploads/files/_2vr5zexty7q84d.jpg', '75454656', 'Mario Ximenes', NULL, NULL, '2024-03-19 00:00:00', NULL, 'Pending');

-- --------------------------------------------------------

--
-- Structure for view `realdeia`
--
DROP TABLE IF EXISTS `realdeia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `realdeia`  AS  select `ta`.`id` AS `id`,`ta`.`naran_aldeia` AS `naran_aldeia`,`ta`.`id_municipio` AS `id_municipio`,`ta`.`id_posto` AS `id_posto`,`ta`.`id_suko` AS `id_suko` from `tb_aldeia` `ta` ;

-- --------------------------------------------------------

--
-- Structure for view `reesudan`
--
DROP TABLE IF EXISTS `reesudan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reesudan`  AS  select `te`.`id` AS `id`,`te`.`n_emis` AS `n_emis`,`te`.`naran_estudante` AS `naran_estudante`,`te`.`sexo` AS `sexo`,`te`.`data_moris` AS `data_moris`,`te`.`f_moris` AS `f_moris`,`te`.`img_estudante` AS `img_estudante`,`te`.`eskola_anterior` AS `eskola_anterior`,`te`.`pai` AS `pai`,`te`.`mae` AS `mae`,`te`.`id_municipiu` AS `id_municipiu`,`te`.`id_postu` AS `id_postu`,`te`.`id_suco` AS `id_suco`,`te`.`id_aldeia` AS `id_aldeia`,`te`.`n_kontaktu` AS `n_kontaktu`,`te`.`data_rejistu` AS `data_rejistu` from `tb_estudante` `te` ;

-- --------------------------------------------------------

--
-- Structure for view `remunicp`
--
DROP TABLE IF EXISTS `remunicp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `remunicp`  AS  select `tm`.`id` AS `id`,`tm`.`naran` AS `naran`,`tm`.`obs` AS `obs` from `tb_municipiu` `tm` ;

-- --------------------------------------------------------

--
-- Structure for view `repost`
--
DROP TABLE IF EXISTS `repost`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `repost`  AS  select `tp`.`id` AS `id`,`tp`.`naran_postu` AS `naran_postu`,`tp`.`id_municipiu` AS `id_municipiu`,`tp`.`obs_postu` AS `obs_postu` from `tb_postu` `tp` ;

-- --------------------------------------------------------

--
-- Structure for view `resuko`
--
DROP TABLE IF EXISTS `resuko`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `resuko`  AS  select `s`.`id` AS `id`,`s`.`naran_suku` AS `naran_suku`,`s`.`id_posto` AS `id_posto`,`s`.`id_municipiu` AS `id_municipiu`,`s`.`obs` AS `obs` from `suko` `s` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `suko`
--
ALTER TABLE `suko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_aldeia`
--
ALTER TABLE `tb_aldeia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_estudante`
--
ALTER TABLE `tb_estudante`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_municipiu`
--
ALTER TABLE `tb_municipiu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_postu`
--
ALTER TABLE `tb_postu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `suko`
--
ALTER TABLE `suko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_aldeia`
--
ALTER TABLE `tb_aldeia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_estudante`
--
ALTER TABLE `tb_estudante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_municipiu`
--
ALTER TABLE `tb_municipiu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_postu`
--
ALTER TABLE `tb_postu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
