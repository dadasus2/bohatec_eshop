-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Stř 01. čen 2022, 18:41
-- Verze serveru: 10.4.22-MariaDB
-- Verze PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `bohatec_obchod`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `kosik`
--

CREATE TABLE `kosik` (
  `id` int(11) NOT NULL,
  `idUzivatele` int(11) NOT NULL,
  `idZbozi` int(11) NOT NULL,
  `ks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatele`
--

CREATE TABLE `uzivatele` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `uzivatele`
--

INSERT INTO `uzivatele` (`id`, `username`, `email`, `password`, `role`) VALUES
(3, 'admin', '', '$2y$10$tCtccEoY1fdIEBHB7J.ocefc.7zlSdThvb6HZhZWzY8SuIRIwqFuO', 'admin'),
(4, 'Daniel', 'bohatec87@gmail.com', '$2y$10$i7bTjGXhCK8wtlpNtH9UNuh0TKfDkV2DUP.VP89XcQa/dHRQ2k3RO', 'user');

-- --------------------------------------------------------

--
-- Struktura tabulky `zbozi`
--

CREATE TABLE `zbozi` (
  `id` int(11) NOT NULL,
  `nazev` varchar(50) DEFAULT NULL,
  `cena` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `zbozi`
--

INSERT INTO `zbozi` (`id`, `nazev`, `cena`) VALUES
(1, 'CBD konopí - Lemon Haze', 139),
(2, 'CBD konopí - Blackberry Kush', 139),
(3, 'CBD konopí - Skywalker', 139),
(4, 'CBD konopí - White Widow', 139),
(5, 'OCB papírky', 99),
(6, 'Bong skleněný - 16cm', 999);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `kosik`
--
ALTER TABLE `kosik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUzivatele` (`idUzivatele`,`idZbozi`),
  ADD KEY `idZbozi` (`idZbozi`);

--
-- Indexy pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `zbozi`
--
ALTER TABLE `zbozi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `kosik`
--
ALTER TABLE `kosik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `kosik`
--
ALTER TABLE `kosik`
  ADD CONSTRAINT `kosik_ibfk_1` FOREIGN KEY (`idUzivatele`) REFERENCES `uzivatele` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kosik_ibfk_2` FOREIGN KEY (`idZbozi`) REFERENCES `zbozi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
