-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 20. Apr 2023 um 12:46
-- Server-Version: 10.4.24-MariaDB
-- PHP-Version: 8.1.6

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
-- Tabellenstruktur für Tabelle `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tasks`
--

INSERT INTO `tasks` (`task_id`, `user_id`, `task`) VALUES
(1, 1, 'test'),
(2, 13, 'Testsdf'),
(3, 13, 'Testdskjd');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` varchar(30) NOT NULL,
  `emailUsers` varchar(80) NOT NULL,
  `pwdUsers` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`) VALUES
(2, 'test', 'test@test.com', '$2y$10$jkcLYm.jD5bYBIrrf/yFn.xygjNq4MsTL'),
(4, 'JokerBoyCP', 'claudio.pacheco98@hotmail.com', '$2y$10$yMAB1SyB3FfdEA6.a.3JtutYQ1BQ6zL6a'),
(5, 'Jannick', 'Jannick@gmail.com', '$2y$10$KV3RnE0GVBcxvdL5g7AAnOa4mNL0TK2OZ'),
(6, 'daniel', 'd@b.ch', '$2y$10$8fzJ93znJpYjWVarEFUP1Ourd6/zxma49'),
(12, 'g', 'g@g.ch', '$2y$10$wdBh1E6RWB2r8MrHxtR1yOQoWw6//Xesz'),
(13, 'Test1', 'test@t.ch', '$2y$10$7XwJLCFA8JUD8i/VW6qSYuSiYYscoJHumq3x3lxoYdp5wIQYjAPjW');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
