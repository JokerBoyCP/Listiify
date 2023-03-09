-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Mrz 2023 um 16:55
-- Server-Version: 10.4.27-MariaDB
-- PHP-Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `listiify_db`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lists`
--

CREATE TABLE `lists` (
  `list_id` int(11) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `list_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL,
  `task` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`) VALUES
(2, 'test', 'test@test.com', '$2y$10$jkcLYm.jD5bYBIrrf/yFn.xygjNq4MsTLdvoGwceq78tLiuA7xwli'),
(4, 'JokerBoyCP', 'claudio.pacheco98@hotmail.com', '$2y$10$yMAB1SyB3FfdEA6.a.3JtutYQ1BQ6zL6anAbnsbN4hld4ub60Nxie');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `idUsers` (`idUsers`);

--
-- Indizes für die Tabelle `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `list_id` (`list_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `lists`
--
ALTER TABLE `lists`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `lists`
--
ALTER TABLE `lists`
  ADD CONSTRAINT `lists_ibfk_1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`);

--
-- Constraints der Tabelle `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`list_id`) REFERENCES `lists` (`list_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
