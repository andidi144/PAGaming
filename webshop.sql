-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Mrz 2018 um 17:47
-- Server-Version: 5.6.24
-- PHP-Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `webshop`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE IF NOT EXISTS `benutzer` (
  `BenutzerID` int(10) unsigned NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Passwort` text NOT NULL,
  `Anrede` text NOT NULL,
  `Name` text NOT NULL,
  `Vorname` text NOT NULL,
  `Email` text NOT NULL,
  `Adresse` text NOT NULL,
  `PLZ` int(11) NOT NULL,
  `Ort` text NOT NULL,
  `BenutzerrechtID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`BenutzerID`, `Username`, `Passwort`, `Anrede`, `Name`, `Vorname`, `Email`, `Adresse`, `PLZ`, `Ort`, `BenutzerrechtID`) VALUES
(24, 'Patrick', '$2y$10$dPVi4eBz/Ga78kMLjI9UJOWg22ZtQTBQH8tgFPFi224.d/O2FdlgK', 'Herr', 'SchÃ¶pfer', 'Patrick', '', 'Wylen-Bantlipark 11', 6440, 'Brunnen', 1),
(26, '', '$2y$10$dPVi4eBz/Ga78kMLjI9UJOWg22ZtQTBQH8tgFPFi224.d/O2FdlgK', '', '', '', '', '', 0, '', 0),
(44, 'Hans', '$2y$10$rDcjgEn22k95FZt945SqaeRXGt4REb3XyB6iQ6t07UhiDtDEquFum', 'Herr', 'Claude', 'Jean-Pierre', '123.123@gmail.com', 'Bhfstrasse 1337', 6440, 'Brunnen', 0),
(45, 'andidi144', '$2y$10$prJvMuP.GLpI.d1w7Tjxx.HaoqItkta.5kEF1jzOqrnPH1sl.xPwK', 'Herr', 'Betschart', 'Adrian', 'adrianbetschart@hotmail.ch', 'Chaletweg 1', 6403, 'Küssnacht', 1),
(48, 'fdsafdsafdsaf', '$2y$10$.sjq0re5C3L4qMuPVRC/FeBtBwF2CCVZZ11XfNhXHvkN0yRt4ErFi', 'afsd', 'dsafdsa', 'fdsa', 'fdsa@fdsaf.cx', 'fdsafsa', 2313, 'fdafdsaf', 0),
(49, 'fdsafdsa', '$2y$10$51Uk2UluERq5IMf7jzVBieC9NGQmBu7LNkT14Bb2vyT5fuZ.lvGi2', 'fdsafdsa', 'dfsaf', 'dsafdsa', 'fdsa@fdsaf.cx', 'fdsafds', 0, 'fdsaf', 0),
(59, 'hallo', '$2y$10$pQE53cyPXdQob5.GCPDzq.dpDuj/zIu.08aqbSkUr7jDL/NiQLY6G', '1231', '1321', '123', '123@123.cg', '123', 123, '123', 0),
(63, 'Siegfried', '$2y$10$mlE972ZQv7AO6c5jIgjvkuKjxJAk8rBXRpNPrKu/Jh5m5EPiw4HaS', 'Herr', 'Sieg', 'Fried', 'sieg.fried@gmail.com', 'Langstrasse 1', 6666, 'Züri', 0),
(70, 'andidi1444', '$2y$10$EHtgxD6iW9wJGs.5xkqZ5uX5qxg8oXTRiFe7nedjpk.b5kKJstpS.', '1231', '123', '123', '123@123.123', '1231', 312312, '123', 0),
(74, 'Patricke', '$2y$10$DNVLErAdZvp8tGQ9bEdWquMKePzDjI1XThN99xbRqKA9AHRl7RBvy', 'Herr', '', '', '', '', 0, '', 0),
(75, 'oberfürscht', '$2y$10$dkXmzKSXA823kTAOrh9aneE7j2ay0TmEZUT64OTLhfYbHoZnII4na', 'lord', 'zucjkerwasser', 'tomati', 'toma@it.ch', 'fürschtschtrasse 3', 76345, 'tomatihausen', 0),
(76, 'seegurke', '$2y$10$VPwgg43lqAnKrrxlbydb8uWOOxsPw8F7TTefdP7RzGqIHQsZlbJKK', 'Frau', 'Betschart', 'Sonja', 'sonjabetschart@bluewin.ch', 'Chaletweg 1', 6403, 'KÃ¼ssnacht', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzerrechte`
--

CREATE TABLE IF NOT EXISTS `benutzerrechte` (
  `BenutzerrechtID` int(10) unsigned NOT NULL,
  `Levelname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `benutzerrechte`
--

INSERT INTO `benutzerrechte` (`BenutzerrechtID`, `Levelname`) VALUES
(0, 'Benutzer'),
(1, 'Admin');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bewertung`
--

CREATE TABLE IF NOT EXISTS `bewertung` (
  `BewertungsID` int(10) unsigned NOT NULL,
  `BenutzerID` int(11) NOT NULL,
  `ProduktID` int(11) NOT NULL,
  `Bewertung` int(11) NOT NULL,
  `Kommentar` text NOT NULL,
  `Datum` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `bewertung`
--

INSERT INTO `bewertung` (`BewertungsID`, `BenutzerID`, `ProduktID`, `Bewertung`, `Kommentar`, `Datum`) VALUES
(1, 24, 49, 4, 'halloooo', '0000-00-00 00:00:00'),
(2, 24, 43, 0, 'hallo', '0000-00-00 00:00:00'),
(3, 24, 43, 0, 'hallo', '0000-00-00 00:00:00'),
(4, 24, 42, 4, 'lelelele', '0000-00-00 00:00:00'),
(5, 24, 82, 5, 'lolololololo', '0000-00-00 00:00:00'),
(6, 24, 82, 5, 'klausklausklaus', '0000-00-00 00:00:00'),
(7, 24, 116, 3, 'jklöadjksdföajksdfö', '0000-00-00 00:00:00'),
(8, 24, 82, 2, 'hi', '0000-00-00 00:00:00'),
(9, 24, 49, 3, 'jklsfklöasdfafdas', '0000-00-00 00:00:00'),
(10, 24, 82, 3, 'Hallo also balablabla', '2015-08-25 08:50:44'),
(11, 45, 82, 5, 'fjdkalösfjdksalöfjdksalöjfkdlasöjdfkslaöjdfkslaö', '2015-08-25 09:22:44'),
(12, 45, 82, 0, 'Lorem ipsum dolor amet Lorem ipsum dolor amet Lorem ipsum dolor ametLorem ipsum dolor ametLorem ipsum dolor ametLorem ipsum dolor ametLorem ipsum dolor ametLorem ipsum dolor ametLorem ipsum dolor ametLorem ipsum dolor ametLorem ipsum dolor ametLorem ipsum dolor ametLorem ipsum dolor ametLorem ipsum dolor ametLorem ipsum dolor ametLorem ipsum dolor ametLorem ipsum dolor ametLorem ipsum dolor ametLorem ipsum dolor ametLorem ipsum dolor ametLorem ipsum dolor ametLorem ipsum dolor ametLorem ipsum dolor ametLorem ipsum dolor ametLorem ipsum dolor amet', '2015-08-25 09:23:12'),
(13, 45, 82, 0, 'lelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllelllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllellllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll', '2015-08-25 09:25:08'),
(14, 45, 82, 0, 'hi', '2015-08-25 11:26:38'),
(15, 24, 69, 5, 'lel', '2015-08-31 07:50:55'),
(16, 24, 39, 3, 'rofl', '2015-08-31 07:52:04'),
(17, 24, 49, 5, 'dsafds', '2015-08-31 07:55:43'),
(18, 24, 82, 5, '123455', '2015-08-31 07:56:37'),
(19, 24, 82, 5, 'helelo', '2015-08-31 13:43:18'),
(20, 24, 49, 4, 'dsafdsafdsadsafdsafsdafsdf', '2015-08-31 13:43:35'),
(21, 24, 43, 4, 'Hallo12345', '2015-09-01 10:45:44'),
(22, 24, 82, 4, 'hallo12345', '2015-09-01 10:46:12'),
(23, 75, 82, 5, 'ICH HASSE DIESE PRODUKT', '2015-09-08 14:21:03'),
(24, 75, 81, 5, 'SO EN SCHEISS', '2015-09-08 14:21:48'),
(25, 75, 111, 1, 'BEST DAY EVER', '2015-09-08 14:22:04'),
(26, 76, 82, 5, 'Dieses Produkt kommt mit einer sehr schÃ¶nen Verpackung. Tull!', '2015-09-09 19:19:24');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hersteller`
--

CREATE TABLE IF NOT EXISTS `hersteller` (
  `HerstellerID` int(11) NOT NULL,
  `Hersteller` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `hersteller`
--

INSERT INTO `hersteller` (`HerstellerID`, `Hersteller`) VALUES
(1, 'Roccat'),
(2, 'Logitech'),
(3, 'Razer'),
(4, 'Sennheiser'),
(13, 'EinHersteller');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorie`
--

CREATE TABLE IF NOT EXISTS `kategorie` (
  `KategorieID` int(10) unsigned NOT NULL,
  `Kategorie` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kategorie`
--

INSERT INTO `kategorie` (`KategorieID`, `Kategorie`) VALUES
(1, 'Maus'),
(2, 'Tastatur'),
(3, 'Mousepad'),
(4, 'Headset'),
(5, 'Controller'),
(6, 'Accesoires');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `produkt`
--

CREATE TABLE IF NOT EXISTS `produkt` (
  `ProduktID` int(10) unsigned NOT NULL,
  `KategorieID` int(11) NOT NULL,
  `Produktname` text NOT NULL,
  `Preis` float NOT NULL,
  `HerstellerID` int(11) NOT NULL,
  `Beschreibung` text NOT NULL,
  `Lager` int(11) DEFAULT NULL,
  `Bild` varchar(255) NOT NULL,
  `Einkaeufe` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `produkt`
--

INSERT INTO `produkt` (`ProduktID`, `KategorieID`, `Produktname`, `Preis`, `HerstellerID`, `Beschreibung`, `Lager`, `Bild`, `Einkaeufe`) VALUES
(1, 1, 'Tyon', 110, 1, 'Spiele sind im Wandel. Moderne Schlachtfelder sind grausame Orte voller Gefahren an Land, zu Wasser und in der Luft. Mit der ROCCAT Tyon kannst Du diesen Bedrohungen nun entgegentreten! Diese Multi-Button Gaming Maus ist das Resultat unzähliger Stunden des Feinschliffs durch die ROCCAT Ingenieure. Speziell entworfen für die perfekte Steuerung von unterschiedlichsten Vehikeln!', NULL, 'Tyon.jpg', 12),
(2, 1, 'Kone XTD', 100, 1, 'Wie verbessert man einen Klassiker? Wie feilt man an etwas, das schon an der Spitze der Gaming-Peripherie steht? ROCCATs Designer stellten sich diese Frage gar nicht erst. Sie nahmen einfach die Kone[+], bohrten sie auf und versahen sie mit noch mehr Power und Technik!  ', NULL, 'Kone XTD.jpg', 2),
(3, 1, 'Kone XTD Optical', 100, 1, 'Bei uns bekommst Du, was Du willst! Auf der Basis des außergewöhnlichen Designs der Kone XTD entwickelte ROCCAT die Kone XTD Optical. Mit ihrem starken Pro-Optic R5 6400 dpi Optical Sensor ist diese Maus eine Offenbarung. Wenn Du Wert auf einen Sensor mit direktestem Feedback legst, kommst Du an der Kone XTD Optical nicht vorbei!', NULL, 'Kone XTD Optical.jpg', 0),
(4, 1, 'Kone Pure', 90, 1, 'Genau wie der große Bruder, weiß auch die Kone Pure durch fantastische Technik zu überzeugen. Mit nur 91% der Größe der Kone XTD ist die Kone Pure allerdings auch für kleinere Hände bestens geeignet. Die Kombination aus ergonomischem Design und hervorragender Performance macht aus der Kone Pure sprichwörtlich den puren Gaming-Genuss!  ', NULL, 'Kone Pure.jpg', 0),
(32, 1, 'Kone Pure Color', 0, 1, 'Genau wie der große Bruder, weiß auch die Kone Pure durch fantastische Technik zu überzeugen. Mit nur 91% der Größe der Kone XTD ist die Kone Pure allerdings auch für kleinere Hände bestens geeignet. Die Kombination aus ergonomischem Design und hervorragender Performance macht aus der Kone Pure sprichwörtlich den puren Gaming-Genuss!  ', NULL, 'Kone Pure Color.jpg', 2),
(33, 1, 'Kone Pure Optical', 0, 1, 'Ihr wollt es, Ihr bekommt es! Jetzt gibt es die fantastische Steuerung der ROCCAT™ Kone Pure auch mit dem präzisen 4000 dpi Pro-Optic R3 Optical Sensor. Anlässlich des fünften Jahrestages der preisgekrönten Kone-Reihe, ist die Kone Pure Optical ein Dankeschön für das Feedback der Community, durch die erst diese Erfolgsgeschichte geschrieben werden konnte!', NULL, 'Kone Pure Optical.jpg', 0),
(34, 1, 'Kone Pure Military', 80, 1, 'Willst Du allen Dein Können zeigen? Dann bietet Dir ROCCAT das perfekte Werkzeug! Erhältlich in den Farben Camo Charge, Naval Storm und Desert Strike, verleiht Dir die Kone Pure Military den einzigartigen Look eines wahren Veteranen. Mit der fehlerfreien Steuerung und dem führenden Pro-Optic R4 5000 dpi Optical Sensor bist Du auf der Seite der Sieger! ', NULL, 'Kone Pure Military.jpg', 0),
(35, 1, 'Lua', 40, 1, 'Wenn die klassische Drei-Tasten-Maus auf ROCCATs hochentwickelte Technik trifft, entsteht daraus die Lua – Tri-Button Gaming Mouse. Durch das komfortable V-Shape Design ist sie sowohl für Links- als auch Rechtshänder geeignet und mit ihrem einstellbaren 2000 dpi Pro-Optic R2 Sensor und der No-Sweat Beschichtung steht einer langen Gaming-Session nichts mehr im Wege!', NULL, 'lua.jpg', 0),
(36, 3, 'Siru', 15, 1, '', NULL, 'siru.jpg', 0),
(37, 3, 'Raivo', 0, 1, '', NULL, 'raivo.jpg', 2),
(38, 3, 'Hiro', 40, 1, '', NULL, 'hiro.jpg', 4),
(39, 3, 'Alumic', 50, 1, '', NULL, 'Alumic.jpg', 4),
(40, 3, 'Sense Series', 25, 1, '', NULL, 'Sense Series.jpg', 0),
(41, 3, 'Taito Series', 20, 1, '', NULL, 'Taito Series.jpg', 0),
(42, 2, 'Ryos TKL Pro', 150, 1, '', NULL, 'Ryos TKL Pro.jpg', 21),
(43, 2, 'Ryos MK Pro', 200, 1, '', NULL, 'Ryos MK Pro.jpg', 7),
(44, 2, 'Ryos MK Glow', 150, 1, '', NULL, 'Ryos MK Glow.jpg', 0),
(45, 2, 'Ryos MK', 120, 1, '', NULL, 'Ryos MK.jpg', 0),
(46, 2, 'Isku FX', 110, 1, '', NULL, 'Isku FX.jpg', 0),
(47, 2, 'Isku', 90, 1, '', NULL, 'Isku.jpg', 0),
(48, 2, 'Arvo', 60, 1, '', NULL, 'Arvo.jpg', 0),
(49, 4, 'Kave XTD 5.1 Digital', 200, 1, '', NULL, 'Kave XTD 5.1 Digital.jpg', 12),
(50, 4, 'Kave XTD 5.1 Analog', 130, 1, '', NULL, 'Kave XTD 5.1 Analog.jpg', 0),
(51, 4, 'Kave XTD Stereo', 100, 1, '', NULL, 'Kave XTD Stereo.jpg', 0),
(52, 4, 'Kave XTD Military', 80, 1, '', NULL, 'Kave XTD Military.jpg', 0),
(53, 4, 'Kulo 7.1 USB', 80, 1, '', NULL, 'Kulo 7.1 USB.jpg', 0),
(54, 4, 'Kulo Stereo', 50, 1, '', NULL, ' 	Kulo Stereo.jpg', 0),
(55, 4, 'Syva', 30, 1, '', NULL, 'Syva.jpg', 0),
(56, 4, 'Juke', 20, 1, '', NULL, 'Juke.jpg', 0),
(57, 6, 'Into', 70, 1, '', NULL, 'Into.jpg', 2),
(58, 6, 'Tusko', 60, 1, '', NULL, 'Tusko.jpg', 1),
(59, 6, 'Apuri', 40, 1, '', NULL, 'Apuri.jpg', 0),
(60, 1, 'G303', 97.9, 2, '', NULL, 'g303.jpg', 0),
(61, 1, 'G602', 110, 2, '', NULL, 'g602.jpg', 0),
(62, 1, 'G502', 110, 2, '', NULL, 'g502.jpg', 1),
(63, 1, 'G402', 79.9, 2, '', NULL, 'G402.jpg', 0),
(64, 1, 'G302', 60, 2, '', NULL, 'g302.jpg', 0),
(65, 1, 'G300 S', 60, 2, '', NULL, 'g300s.png', 0),
(66, 1, 'G600', 100, 2, '', NULL, 'g600mmo.jpg', 0),
(67, 3, 'G440', 40, 2, '', NULL, 'G440.jpg', 0),
(68, 3, 'G240', 30, 2, '', NULL, 'G240.jpg', 1),
(69, 2, 'G910', 210, 2, '', NULL, 'G910.jpg', 1),
(70, 2, 'G19 S', 250, 2, '', NULL, 'G19S.jpg', 0),
(71, 2, 'G13', 120, 2, '', NULL, 'logitechg13.jpg', 0),
(72, 4, 'G930', 230, 2, '', NULL, 'G930.jpg', 0),
(73, 4, 'G35', 170, 2, '', NULL, 'G35.jpg', 0),
(74, 4, 'G430', 110, 2, '', NULL, 'G430.jpg', 0),
(75, 4, 'G230', 90, 2, '', NULL, 'G230.jpg', 0),
(76, 5, 'G920', 430, 2, '', NULL, 'G920.jpg', 8),
(77, 5, 'G27', 400, 2, '', NULL, 'G27.jpg', 0),
(78, 5, 'F710', 80, 2, '', NULL, 'F710.jpg', 0),
(79, 5, 'F310', 40, 2, '', NULL, 'F310.jpg', 0),
(80, 5, 'Extreme 3D Pro Joystick', 70, 2, '', NULL, 'Joystick.jpg', 1),
(81, 5, 'Powershell Controller', 20, 2, '', NULL, 'Powershell.jpg', 8),
(82, 1, 'Testprodukt', 12000, 1, 'Des Isch Ain Teschtprodukt', NULL, 'Kartoffel.jpg', 58),
(84, 1, 'Death Adder', 80, 3, '', NULL, 'deathadder.jpg', 1),
(85, 1, 'Naga Classic', 100, 3, '', NULL, 'nagaclassic.jpg', 0),
(86, 1, 'Naga Epic Chroma', 150, 3, '', NULL, 'nagaepicchroma.jpg', 0),
(87, 1, 'Ouroboros', 150, 3, '', NULL, 'razerouroboros.jpg', 0),
(88, 1, 'Naga', 100, 3, '', NULL, 'naga.jpg', 0),
(89, 1, 'Taipan', 100, 3, '', NULL, 'taipan.jpg', 0),
(90, 1, 'Mamba 2012', 130, 3, '', NULL, 'mamba.jpg', 0),
(91, 1, 'Naga Hex', 100, 3, '', NULL, 'nagahex.jpg', 0),
(92, 1, 'Abyssus', 50, 3, '', NULL, 'abyssus.jpg', 0),
(93, 1, 'Orochi', 70, 3, '', NULL, 'orochi.jpg', 4),
(94, 1, 'Imperator', 70, 3, '', NULL, 'imperator.jpg', 0),
(95, 1, 'Death Adder left', 75, 3, '', NULL, 'deathadderleft.jpg', 0),
(108, 2, 'Tartarus Chrom', 100, 3, '', NULL, 'razertartarus.jpg', 0),
(109, 2, 'Blackwidow Ultimate Classic', 160, 3, '', NULL, 'RazerBlackwidowUltimateClassic.jpg', 1),
(110, 2, 'Tartarus Classic', 80, 3, '', NULL, 'razertartarusclassic.jpg', 0),
(111, 2, 'Blackwidow Chroma', 200, 3, '', NULL, 'blackwidow.jpg', 6),
(112, 2, 'Anansi', 110, 3, '', NULL, 'anansi.jpg', 0),
(113, 2, 'Blackwidow Ultimate', 160, 3, '', NULL, 'blackwidowultimate.jpg', 0),
(114, 2, 'Deathstalker Ultimate', 300, 3, '', NULL, 'deathstalkerultimate.jpg', 0),
(115, 2, 'Deathstalker Essential', 60, 3, '', NULL, 'deathstalkeressentail.jpg', 0),
(116, 2, 'Deathstalker', 100, 3, '', NULL, 'dstalk.jpg', 0),
(117, 2, 'Blackwidow', 120, 3, '', NULL, 'blackwidow.jpg', 0),
(118, 2, 'Blackwidow Tournament', 100, 3, '', NULL, 'blackwidowtournament.jpg', 0),
(119, 2, 'Tartarus', 80, 3, '', NULL, 'tartarus.jpg', 0),
(120, 2, 'Orbweaver', 130, 3, '', NULL, 'orbweaver.jpg', 1),
(121, 4, 'Kraken Pro', 100, 3, '', NULL, 'razerkrakenpro.jpg', 0),
(122, 4, '7.1 Classic', 110, 3, '', NULL, 'razerkraken7.1classic.jpg', 0),
(123, 4, 'Leviathan', 250, 3, '', NULL, 'RazerLeviathan.jpg', 0),
(124, 4, 'Kraken', 75, 3, '', NULL, 'razerkraken.jpg', 0),
(125, 4, 'Tiamat 7.1', 220, 3, '', NULL, 'razertiamat7.1.jpg', 0),
(126, 4, 'Seirén Pro', 300, 3, '', NULL, 'RazerSeirenPro.jpg', 3),
(127, 6, 'Into', 70, 1, '', NULL, 'Into.jpg', 0),
(129, 4, 'Game one', 200, 4, 'Dieses Headset ist toll', NULL, 'Game one.jpg', 0),
(130, 4, 'anothertest', 1234, 2, 'Das sicht ein Zahl', NULL, 'anothertest.jpg', 0),
(131, 3, 'Ich teste das nun mal', 0.5, 2, 'Mega cool', NULL, 'Ich teste das nun mal.jpg', 0),
(132, 8, 'Hallo', 123, 14, 'LELELELEL', NULL, 'Hallo.jpg', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `warenkorb`
--

CREATE TABLE IF NOT EXISTS `warenkorb` (
  `WarenkorbID` int(10) unsigned NOT NULL,
  `Status` int(11) NOT NULL,
  `BenutzerID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `warenkorb`
--

INSERT INTO `warenkorb` (`WarenkorbID`, `Status`, `BenutzerID`) VALUES
(8, 1, 76);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `warenkorbprodukte`
--

CREATE TABLE IF NOT EXISTS `warenkorbprodukte` (
  `ProduktID` int(11) NOT NULL,
  `WarenkorbID` int(11) NOT NULL,
  `Anzahl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `warenkorbprodukte`
--

INSERT INTO `warenkorbprodukte` (`ProduktID`, `WarenkorbID`, `Anzahl`) VALUES
(42, 8, 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`BenutzerID`), ADD UNIQUE KEY `Username` (`Username`);

--
-- Indizes für die Tabelle `benutzerrechte`
--
ALTER TABLE `benutzerrechte`
  ADD PRIMARY KEY (`BenutzerrechtID`);

--
-- Indizes für die Tabelle `bewertung`
--
ALTER TABLE `bewertung`
  ADD PRIMARY KEY (`BewertungsID`);

--
-- Indizes für die Tabelle `hersteller`
--
ALTER TABLE `hersteller`
  ADD PRIMARY KEY (`HerstellerID`);

--
-- Indizes für die Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`KategorieID`);

--
-- Indizes für die Tabelle `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`ProduktID`);

--
-- Indizes für die Tabelle `warenkorb`
--
ALTER TABLE `warenkorb`
  ADD PRIMARY KEY (`WarenkorbID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `BenutzerID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT für Tabelle `bewertung`
--
ALTER TABLE `bewertung`
  MODIFY `BewertungsID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT für Tabelle `hersteller`
--
ALTER TABLE `hersteller`
  MODIFY `HerstellerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT für Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `KategorieID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT für Tabelle `produkt`
--
ALTER TABLE `produkt`
  MODIFY `ProduktID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT für Tabelle `warenkorb`
--
ALTER TABLE `warenkorb`
  MODIFY `WarenkorbID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
