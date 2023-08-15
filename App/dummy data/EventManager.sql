-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2018 at 02:50 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Event_Manager`
--
CREATE DATABASE IF NOT EXISTS `EventManager` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Event_Manager`;

-- --------------------------------------------------------

--
-- Table structure for table `Announcements`
--

CREATE TABLE `Announcements` (
  `ID` bigint(20) NOT NULL COMMENT 'Announcement ID',
  `Title` text NOT NULL COMMENT 'Announcement Title',
  `Content` text NOT NULL COMMENT 'Announcement Content',
  `Posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'When the announcement was posted',
  `Expires` date NOT NULL COMMENT 'When the Announcement should be removed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains all the announcements that will be displayed';

--
-- Dumping data for table `Announcements`
--

INSERT INTO `Announcements` (`ID`, `Title`, `Content`, `Posted`, `Expires`) VALUES
(1, 'Platform Development', 'We are currently working on the development of this platform.  We hope that you will find it useful!', '2018-04-14 16:45:59', '2020-12-31'),
(9, '24 hour outage', 'Since we are testing changes in the platform new events will not be posted during the next 24 hours.<br /><br />Please dont attempt to create new events.<br /><br />If you dont see it you know why now.', '2018-04-14 21:45:59', '2018-04-15'),
(10, '', '', '2018-08-07 20:34:58', '0000-00-00'),
(11, '', '', '2018-08-07 20:38:10', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `Attendance`
--

CREATE TABLE `Attendance` (
  `ID` bigint(20) NOT NULL COMMENT 'Unique id for entry',
  `EventID` bigint(20) NOT NULL COMMENT 'Event ID',
  `EnterpriseID` text NOT NULL COMMENT 'Enterprise ID',
  `Type` tinyint(1) NOT NULL COMMENT 'Type of Attendee',
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Time attendance was taken'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains all event attendance history';

--
-- Dumping data for table `Attendance`
--

INSERT INTO `Attendance` (`ID`, `EventID`, `EnterpriseID`, `Type`, `Timestamp`) VALUES
(401, 1, 'jorge.e.barreto', 1, '2017-03-18 11:00:00'),
(402, 1, 'gerardo.guizado', 0, '2017-03-18 11:00:01'),
(403, 1, 'joshua.d.aurand', 1, '2017-03-18 11:00:02'),
(404, 1, 'maura.p.riley', 1, '2017-03-18 11:00:03'),
(405, 1, 'steven.r.jarboe', 0, '2017-03-18 11:00:04'),
(406, 1, 'steven.w.rockwood', 0, '2017-03-18 11:00:05'),
(407, 1, 'luis.font', 0, '2017-03-18 11:00:06'),
(408, 1, 'salomon.s.salinas', 1, '2017-03-18 11:00:07'),
(409, 1, 'roberto.a.rando', 0, '2017-03-18 11:00:08'),
(410, 1, 'g.a.rodriguez.garcia', 0, '2017-03-18 11:00:09'),
(411, 1, 'kiu.kianpour', 1, '2017-03-18 11:00:10'),
(412, 1, 'gerardo.guizado', 1, '2017-03-18 11:00:11'),
(413, 1, 'gerardo.guizado', 0, '2017-03-18 11:00:12'),
(414, 1, 'f.a.fernandez', 1, '2017-03-18 11:00:13'),
(415, 2, 'roman.torres', 0, '2017-10-28 11:00:00'),
(416, 2, 'carlo.j.burgos', 0, '2017-10-28 11:00:01'),
(417, 2, 'kiu.kianpour', 1, '2017-10-28 11:00:02'),
(418, 2, 'jaime.e.rivera.velez', 0, '2017-10-28 11:00:03'),
(419, 2, 'mohammed.giwa', 0, '2017-10-28 11:00:04'),
(420, 2, 'mitchell.a.zink', 1, '2017-10-28 11:00:05'),
(421, 2, 'breon.ranson', 0, '2017-10-28 11:00:06'),
(422, 2, 'gerardo.guizado', 0, '2017-10-28 11:00:07'),
(423, 2, 'sarah.c.tostanoski', 1, '2017-10-28 11:00:08'),
(424, 2, 'devon.johnson', 1, '2017-10-28 11:00:09'),
(425, 2, 'piti.sinkantarakorn', 1, '2017-10-28 11:00:10'),
(426, 2, 'fiona.enderby', 0, '2017-10-28 11:00:11'),
(427, 2, 'william.siemer', 0, '2017-10-28 11:00:12'),
(428, 2, 'bakhtawar.chaudhary', 0, '2017-10-28 11:00:13'),
(429, 2, 'nguyen.le', 1, '2017-10-28 11:00:14'),
(430, 3, 'manda.g.suchman', 0, '2016-11-16 15:00:00'),
(431, 3, 'devon.johnson', 1, '2016-11-16 15:00:01'),
(432, 3, 'roberto.a.rando', 0, '2016-11-16 15:00:02'),
(433, 3, 'oswaldo.reyes-chica', 0, '2016-11-16 15:00:03'),
(434, 3, 'max.han', 1, '2016-11-16 15:00:04'),
(435, 3, 'sara.e.mayner', 0, '2016-11-16 15:00:05'),
(436, 3, 'steven.w.rockwood', 0, '2016-11-16 15:00:06'),
(437, 3, 'linda.bromfield', 1, '2016-11-16 15:00:07'),
(438, 3, 'jennifer.lyons', 1, '2016-11-16 15:00:08'),
(439, 3, 'roman.torres', 0, '2016-11-16 15:00:09'),
(440, 3, 'william.siemer', 0, '2016-11-16 15:00:10'),
(441, 3, 'fiona.enderby', 0, '2016-11-16 15:00:11'),
(442, 3, 'juliana.molano', 0, '2016-11-16 15:00:12'),
(443, 3, 'manda.g.suchman', 1, '2016-11-16 15:00:13'),
(444, 3, 'deepak.jacob', 0, '2016-11-16 15:00:14'),
(445, 3, 'deepak.jacob', 0, '2016-11-16 15:00:15'),
(446, 3, 'mohammed.giwa', 0, '2016-11-16 15:00:16'),
(447, 4, 'steven.rockwood', 0, '2018-08-07 19:51:37'),
(448, 4, 'christine.n.wilkes', 0, '2016-09-07 18:00:01'),
(449, 4, 'linda.bromfield', 0, '2016-09-07 18:00:02'),
(450, 4, 'michelle.zeng', 0, '2016-09-07 18:00:03'),
(451, 4, 'manda.g.suchman', 1, '2016-09-07 18:00:04'),
(452, 4, 'luis.font', 1, '2016-09-07 18:00:05'),
(453, 4, 'jessica.l.magdaleno', 1, '2016-09-07 18:00:06'),
(454, 4, 'heidi.rees', 0, '2016-09-07 18:00:07'),
(455, 4, 'jorge.e.barreto', 0, '2016-09-07 18:00:08'),
(456, 4, 'ayana.greer-buck', 0, '2016-09-07 18:00:09'),
(457, 4, 'katharyn.mountain', 1, '2016-09-07 18:00:10'),
(458, 4, 'deepak.jacob', 1, '2016-09-07 18:00:11'),
(459, 4, 'ricardo.winterstein', 1, '2016-09-07 18:00:12'),
(460, 4, 'jessi.prizinsky', 1, '2016-09-07 18:00:13'),
(461, 4, 'khyrsys.d.castillo', 0, '2016-09-07 18:00:14'),
(462, 4, 'sean.stallings', 0, '2016-09-07 18:00:15'),
(463, 4, 'luis.font', 0, '2016-09-07 18:00:16'),
(464, 4, 'santiago.diaz', 0, '2016-09-07 18:00:17'),
(465, 4, 'bofan.zhang', 1, '2016-09-07 18:00:18'),
(466, 4, 'steven.w.rockwood', 1, '2016-09-07 18:00:19'),
(467, 4, 'shouka.darvishi.jazi', 0, '2016-09-07 18:00:20'),
(468, 5, 'michael.adams', 0, '2017-11-15 19:00:00'),
(469, 5, 'f.a.fernandez', 0, '2017-11-15 19:00:01'),
(470, 5, 'mohammed.giwa', 0, '2017-11-15 19:00:02'),
(471, 5, 'j.martinez.feliciano', 0, '2017-11-15 19:00:03'),
(472, 5, 'manda.g.suchman', 1, '2017-11-15 19:00:04'),
(473, 5, 'amy.garofalo', 0, '2017-11-15 19:00:05'),
(474, 5, 'jaime.e.rivera.velez', 0, '2017-11-15 19:00:06'),
(475, 5, 'jennifer.b.heflin', 0, '2017-11-15 19:00:07'),
(476, 5, 'jennifer.lyons', 1, '2017-11-15 19:00:08'),
(477, 5, 'amy.garofalo', 1, '2017-11-15 19:00:09'),
(478, 5, 'maureen.m.roche', 1, '2017-11-15 19:00:10'),
(479, 5, 'jennifer.lyons', 1, '2017-11-15 19:00:11'),
(480, 5, 'william.siemer', 1, '2017-11-15 19:00:12'),
(481, 5, 'akhira.muhammad', 0, '2017-11-15 19:00:13'),
(482, 6, 'jorge.e.barreto', 0, '2016-11-14 23:00:00'),
(483, 6, 'max.han', 0, '2016-11-14 23:00:01'),
(484, 6, 'felipe.chaquea', 1, '2016-11-14 23:00:02'),
(485, 6, 'niya.d.lester', 0, '2016-11-14 23:00:03'),
(486, 6, 'daniel.t.choquette', 0, '2016-11-14 23:00:04'),
(487, 6, 'nathalie.s.flores', 0, '2016-11-14 23:00:05'),
(488, 6, 'jessi.prizinsky', 1, '2016-11-14 23:00:06'),
(489, 6, 'gerardo.guizado', 0, '2016-11-14 23:00:07'),
(490, 6, 'shouka.darvishi.jazi', 0, '2016-11-14 23:00:08'),
(491, 6, 'jennifer.lyons', 0, '2016-11-14 23:00:09'),
(492, 6, 'michelle.zeng', 0, '2016-11-14 23:00:10'),
(493, 6, 'j.martinez.feliciano', 1, '2016-11-14 23:00:11'),
(494, 6, 'g.a.rodriguez.garcia', 1, '2016-11-14 23:00:12'),
(495, 6, 'veronica.gutierrez', 1, '2016-11-14 23:00:13'),
(496, 6, 'christine.n.wilkes', 0, '2016-11-14 23:00:14'),
(497, 6, 'veronica.gutierrez', 0, '2016-11-14 23:00:15'),
(498, 7, 'santiago.diaz', 0, '2017-11-15 19:00:00'),
(499, 7, 'j.martinez.feliciano', 0, '2017-11-15 19:00:01'),
(500, 7, 'niya.d.lester', 0, '2017-11-15 19:00:02'),
(501, 7, 'jorge.e.barreto', 1, '2017-11-15 19:00:03'),
(502, 7, 'jennifer.lyons', 1, '2017-11-15 19:00:04'),
(503, 7, 'eric.steinmetz', 1, '2017-11-15 19:00:05'),
(504, 7, 'kiu.kianpour', 0, '2017-11-15 19:00:06'),
(505, 7, 'chandler.l.perry', 0, '2017-11-15 19:00:07'),
(506, 7, 'joshua.d.aurand', 0, '2017-11-15 19:00:08'),
(507, 7, 'juliana.molano', 0, '2017-11-15 19:00:09'),
(508, 7, 'felipe.chaquea', 1, '2017-11-15 19:00:10'),
(509, 7, 'mitchell.a.zink', 1, '2017-11-15 19:00:11'),
(510, 7, 'g.a.rodriguez.garcia', 1, '2017-11-15 19:00:12'),
(511, 8, 'jose.hernandez', 0, '2017-09-30 12:00:00'),
(512, 8, 'johnmael.vazquez', 0, '2017-09-30 12:00:01'),
(513, 8, 'manda.g.suchman', 0, '2017-09-30 12:00:02'),
(514, 8, 'sean.stalling', 0, '2017-09-30 12:00:03'),
(515, 8, 'f.almonte.caminero', 1, '2017-09-30 12:00:04'),
(516, 8, 'sean.stalling', 1, '2017-09-30 12:00:05'),
(517, 8, 'amy.garofalo', 0, '2017-09-30 12:00:06'),
(518, 8, 'niya.d.lester', 0, '2017-09-30 12:00:07'),
(519, 8, 'gerardo.guizado', 0, '2017-09-30 12:00:08'),
(520, 8, 'salomon.s.salinas', 0, '2017-09-30 12:00:09'),
(521, 8, 'jose.o.rivera', 1, '2017-09-30 12:00:10'),
(522, 8, 'shouka.darvishi.jazi', 1, '2017-09-30 12:00:11'),
(523, 8, 'max.han', 1, '2017-09-30 12:00:12'),
(524, 8, 'jennifer.b.heflin', 0, '2017-09-30 12:00:13'),
(525, 8, 'jennifer.lyons', 0, '2017-09-30 12:00:14'),
(526, 8, 'adam.a.lopez', 0, '2017-09-30 12:00:15'),
(527, 8, 'john.s.johnson', 0, '2017-09-30 12:00:16'),
(528, 8, 'j.martinez.feliciano', 1, '2017-09-30 12:00:17'),
(529, 8, 'jorge.e.barreto', 1, '2017-09-30 12:00:18'),
(530, 9, 'f.a.fernandez', 0, '2016-10-28 16:00:00'),
(531, 9, 'carlo.j.burgos', 1, '2016-10-28 16:00:01'),
(532, 9, 'daniel.t.choquette', 1, '2016-10-28 16:00:02'),
(533, 9, 'santiago.diaz', 0, '2016-10-28 16:00:03'),
(534, 9, 'j.martinez.feliciano', 0, '2016-10-28 16:00:04'),
(535, 9, 'adi.radhakrishnan', 0, '2016-10-28 16:00:05'),
(536, 9, 'steven.w.rockwood', 0, '2016-10-28 16:00:06'),
(537, 9, 'jose.o.rivera', 0, '2016-10-28 16:00:07'),
(538, 9, 'sarah.c.tostanoski', 1, '2016-10-28 16:00:08'),
(539, 9, 'gerardo.guizado', 1, '2016-10-28 16:00:09'),
(540, 9, 'chandler.l.perry', 1, '2016-10-28 16:00:10'),
(541, 9, 'santiago.diaz', 0, '2016-10-28 16:00:11'),
(542, 9, 'fiona.enderby', 0, '2016-10-28 16:00:12'),
(543, 10, 'jose.hernandez', 0, '2017-03-23 12:00:00'),
(544, 10, 'ayana.greer-buck', 1, '2017-03-23 12:00:01'),
(545, 10, 'khyrsys.d.castillo', 1, '2017-03-23 12:00:02'),
(546, 10, 'jose.o.rivera', 1, '2017-03-23 12:00:03'),
(547, 10, 'eric.steinmetz', 0, '2017-03-23 12:00:04'),
(548, 10, 'khyrsys.d.castillo', 0, '2017-03-23 12:00:05'),
(549, 10, 'fiona.enderby', 0, '2017-03-23 12:00:06'),
(550, 10, 'garrett.d.kessler', 0, '2017-03-23 12:00:07'),
(551, 10, 'katharyn.mountain', 0, '2017-03-23 12:00:08'),
(552, 10, 'roop.mehdi', 0, '2017-03-23 12:00:09'),
(553, 10, 'j.martinez.feliciano', 1, '2017-03-23 12:00:10'),
(554, 10, 'karen.qi', 1, '2017-03-23 12:00:11'),
(555, 10, 'roberto.a.rando', 1, '2017-03-23 12:00:12'),
(556, 10, 'roberto.a.rando', 0, '2017-03-23 12:00:13'),
(557, 11, 'shouka.darvishi.jazi', 0, '2017-10-27 22:00:00'),
(558, 11, 'kadriene.n.sylvain', 0, '2017-10-27 22:00:01'),
(559, 11, 'jessica.l.magdaleno', 0, '2017-10-27 22:00:02'),
(560, 11, 'steven.r.jarboe', 0, '2017-10-27 22:00:03'),
(561, 11, 'j.amezquita.ibarra', 1, '2017-10-27 22:00:04'),
(562, 11, 'adi.radhakrishnan', 1, '2017-10-27 22:00:05'),
(563, 11, 'ikhide.akhigbe', 0, '2017-10-27 22:00:06'),
(564, 11, 'kadriene.n.sylvain', 0, '2017-10-27 22:00:07'),
(565, 11, 'william.siemer', 1, '2017-10-27 22:00:08'),
(566, 11, 'jose.hernandez', 0, '2017-10-27 22:00:09'),
(567, 11, 'sara.e.mayner', 0, '2017-10-27 22:00:10'),
(568, 11, 'fiona.enderby', 0, '2017-10-27 22:00:11'),
(569, 11, 'jimi.ige', 0, '2017-10-27 22:00:12'),
(570, 11, 'breon.ranson', 1, '2017-10-27 22:00:13'),
(571, 11, 'chandler.l.perry', 1, '2017-10-27 22:00:14'),
(572, 11, 'mitchell.a.zink', 1, '2017-10-27 22:00:15'),
(573, 11, 'radha.arghal', 0, '2017-10-27 22:00:16'),
(574, 11, 'devon.johnson', 0, '2017-10-27 22:00:17'),
(575, 12, 'toya.skeete', 0, '2017-09-30 12:00:00'),
(576, 12, 'yasmin.serrato-munoz', 1, '2017-09-30 12:00:01'),
(577, 12, 'roberto.a.rando', 1, '2017-09-30 12:00:02'),
(578, 12, 'michael.adams', 0, '2017-09-30 12:00:03'),
(579, 12, 'f.a.fernandez', 0, '2017-09-30 12:00:04'),
(580, 12, 'yamil.borges', 0, '2017-09-30 12:00:05'),
(581, 12, 'maureen.m.roche', 1, '2017-09-30 12:00:06'),
(582, 12, 'g.a.rodriguez.garcia', 1, '2017-09-30 12:00:07'),
(583, 12, 'kiu.kianpour', 1, '2017-09-30 12:00:08'),
(584, 12, 'sara.e.mayner', 1, '2017-09-30 12:00:09'),
(585, 12, 'brian.r.quick', 1, '2017-09-30 12:00:10'),
(586, 12, 'sean.stallings', 0, '2017-09-30 12:00:11'),
(587, 12, 'roman.torres', 0, '2017-09-30 12:00:12'),
(588, 12, 'manda.g.suchman', 0, '2017-09-30 12:00:13'),
(589, 12, 'piti.sinkantarakorn', 0, '2017-09-30 12:00:14'),
(590, 12, 'mitchell.a.zink', 0, '2017-09-30 12:00:15'),
(591, 13, 'nathalie.s.flores', 1, '2017-11-04 22:00:00'),
(592, 13, 'chandler.l.perry', 0, '2017-11-04 22:00:01'),
(593, 13, 'roop.mehdi', 1, '2017-11-04 22:00:02'),
(594, 13, 'brian.r.quick', 0, '2017-11-04 22:00:03'),
(595, 13, 'breon.ranson', 0, '2017-11-04 22:00:04'),
(596, 13, 'adam.a.lopez', 0, '2017-11-04 22:00:05'),
(597, 13, 'yamil.borges', 1, '2017-11-04 22:00:06'),
(598, 13, 'shannon.m.browning ', 1, '2017-11-04 22:00:07'),
(599, 13, 'christopher.r.powis', 1, '2017-11-04 22:00:08'),
(600, 13, 'sarah.c.tostanoski', 0, '2017-11-04 22:00:09'),
(601, 13, 'bakhtawar.chaudhary', 0, '2017-11-04 22:00:10'),
(602, 13, 'jaime.e.rivera.velez', 0, '2017-11-04 22:00:11'),
(603, 13, 'minsuk.kim', 0, '2017-11-04 22:00:12'),
(604, 13, 'roop.mehdi', 1, '2017-11-04 22:00:13'),
(605, 13, 'luis.font', 0, '2017-11-04 22:00:14'),
(606, 13, 'j.amezquita.ibarra', 0, '2017-11-04 22:00:15'),
(607, 14, 'joshua.d.aurand', 1, '2017-03-18 23:00:00'),
(608, 14, 'nathalie.s.flores', 1, '2017-03-18 23:00:01'),
(609, 14, 'adam.a.lopez', 0, '2017-03-18 23:00:02'),
(610, 14, 'john.s.johnson', 0, '2017-03-18 23:00:03'),
(611, 14, 'j.martinez.feliciano', 0, '2017-03-18 23:00:04'),
(612, 14, 't.a.rodriguez-carpio', 0, '2017-03-18 23:00:05'),
(613, 14, 'linda.bromfield', 0, '2017-03-18 23:00:06'),
(614, 14, 'jay.l.blanco', 0, '2017-03-18 23:00:07'),
(615, 14, 'f.almonte.caminero', 0, '2017-03-18 23:00:08'),
(616, 14, 'f.almonte.caminero', 1, '2017-03-18 23:00:09'),
(617, 14, 'luis.font', 1, '2017-03-18 23:00:10'),
(618, 14, 'william.siemer', 1, '2017-03-18 23:00:11'),
(619, 14, 'jennifer.lyons', 0, '2017-03-18 23:00:12'),
(620, 14, 'j.amezquita.ibarra', 0, '2017-03-18 23:00:13'),
(621, 14, 'nathalie.s.flores', 0, '2017-03-18 23:00:14'),
(622, 14, 'max.han', 0, '2017-03-18 23:00:15'),
(623, 14, 'breon.ranson', 0, '2017-03-18 23:00:16'),
(624, 14, 'matthew.bass', 0, '2017-03-18 23:00:17'),
(625, 14, 'piti.sinkantarakorn', 1, '2017-03-18 23:00:18'),
(626, 14, 'hilda.garza', 0, '2017-03-18 23:00:19'),
(627, 14, 'daniel.t.choquette', 0, '2017-03-18 23:00:20'),
(628, 14, 'g.a.rodriguez.garcia', 1, '2017-03-18 23:00:21'),
(629, 14, 'nguyen.le', 0, '2017-03-18 23:00:22'),
(630, 14, 'adam.a.lopez', 0, '2017-03-18 23:00:23'),
(631, 15, 'johnmael.vazquez', 0, '2016-11-15 15:00:00'),
(632, 15, 'f.a.fernandez', 0, '2016-11-15 15:00:01'),
(633, 15, 'toya.skeete', 0, '2016-11-15 15:00:02'),
(634, 15, 'kiu.kianpour', 0, '2016-11-15 15:00:03'),
(635, 15, 'eric.steinmetz', 1, '2016-11-15 15:00:04'),
(636, 15, 'amy.garofalo', 0, '2016-11-15 15:00:05'),
(637, 15, 'yamil.borges', 0, '2016-11-15 15:00:06'),
(638, 15, 'khyrsys.d.castillo', 1, '2016-11-15 15:00:07'),
(639, 15, 't.a.rodriguez-carpio', 0, '2016-11-15 15:00:08'),
(640, 15, 'nicholas.bennett', 0, '2016-11-15 15:00:09'),
(641, 15, 'juliana.molano', 0, '2016-11-15 15:00:10'),
(642, 15, 'garrett.d.kessler', 1, '2016-11-15 15:00:11'),
(643, 15, 'roop.mehdi', 0, '2016-11-15 15:00:12'),
(644, 15, 'steven.w.rockwood', 0, '2016-11-15 15:00:13'),
(645, 15, 'linda.bromfield', 1, '2016-11-15 15:00:14'),
(646, 15, 'daniel.t.choquette', 0, '2016-11-15 15:00:15'),
(647, 15, 'salomon.s.salinas', 0, '2016-11-15 15:00:16'),
(648, 15, 'mabel.saez', 1, '2016-11-15 15:00:17'),
(649, 16, 'yasmin.serrato-munoz', 0, '2017-09-09 20:00:00'),
(650, 16, 'kiu.kianpour', 0, '2017-09-09 20:00:01'),
(651, 16, 'sylvester.fejokwu', 0, '2017-09-09 20:00:02'),
(652, 16, 'chandler.l.perry', 0, '2017-09-09 20:00:03'),
(653, 16, 'christopher.r.powis', 0, '2017-09-09 20:00:04'),
(654, 16, 'eric.steinmetz', 1, '2017-09-09 20:00:05'),
(655, 16, 't.a.rodriguez-carpio', 1, '2017-09-09 20:00:06'),
(656, 16, 'daniel.t.choquette', 1, '2017-09-09 20:00:07'),
(657, 16, 'jorge.e.barreto', 0, '2017-09-09 20:00:08'),
(658, 16, 'g.a.rodriguez.garcia', 0, '2017-09-09 20:00:09'),
(659, 16, 'devon.johnson', 0, '2017-09-09 20:00:10'),
(660, 16, 'jimi.ige', 0, '2017-09-09 20:00:11'),
(661, 16, 'oswaldo.reyes-chica', 1, '2017-09-09 20:00:12'),
(662, 16, 'steven.r.jarboe', 1, '2017-09-09 20:00:13'),
(663, 17, 'eric.steinmetz', 0, '2017-01-17 22:00:00'),
(664, 17, 'jennifer.b.heflin', 0, '2017-01-17 22:00:01'),
(665, 17, 'steven.r.jarboe', 0, '2017-01-17 22:00:02'),
(666, 17, 'maureen.m.roche', 0, '2017-01-17 22:00:03'),
(667, 17, 'mabel.saez', 1, '2017-01-17 22:00:04'),
(668, 17, 'jessica.l.magdaleno', 0, '2017-01-17 22:00:05'),
(669, 17, 'jessi.prizinsky', 0, '2017-01-17 22:00:06'),
(670, 17, 'jessica.l.magdaleno', 1, '2017-01-17 22:00:07'),
(671, 17, 'sarah.c.tostanoski', 0, '2017-01-17 22:00:08'),
(672, 17, 'steven.r.jarboe', 0, '2017-01-17 22:00:09'),
(673, 17, 'yamil.borges', 1, '2017-01-17 22:00:10'),
(674, 17, 'jose.hernandez', 0, '2017-01-17 22:00:11'),
(675, 17, 'deepak.jacob', 0, '2017-01-17 22:00:12'),
(676, 17, 'maura.p.riley', 0, '2017-01-17 22:00:13'),
(677, 17, 'veronica.gutierrez', 0, '2017-01-17 22:00:14'),
(678, 18, 'john.s.johnson', 0, '2016-09-07 18:00:00'),
(679, 18, 'nathalie.s.flores', 0, '2016-09-07 18:00:01'),
(680, 18, 'jose.o.rivera', 1, '2016-09-07 18:00:02'),
(681, 18, 'salomon.s.salinas', 0, '2016-09-07 18:00:03'),
(682, 18, 'sarah.c.tostanoski', 0, '2016-09-07 18:00:04'),
(683, 18, 'roop.mehdi', 1, '2016-09-07 18:00:05'),
(684, 18, 'f.a.fernandez', 0, '2016-09-07 18:00:06'),
(685, 18, 'garrett.d.kessler', 1, '2016-09-07 18:00:07'),
(686, 18, 'christopher.r.powis', 0, '2016-09-07 18:00:08'),
(687, 18, 'christine.n.wilkes', 1, '2016-09-07 18:00:09'),
(688, 18, 'santiago.diaz', 0, '2016-09-07 18:00:10'),
(689, 18, 'oswaldo.reyes-chica', 0, '2016-09-07 18:00:11'),
(690, 18, 'felipe.chaquea', 1, '2016-09-07 18:00:12'),
(691, 18, 'j.martinez.feliciano', 0, '2016-09-07 18:00:13'),
(692, 18, 'shouka.darvishi.jazi', 0, '2016-09-07 18:00:14'),
(693, 18, 'ivan.l.nazario', 0, '2016-09-07 18:00:15'),
(694, 19, 'kadriene.n.sylvain', 0, '2017-05-20 17:00:00'),
(695, 19, 'minsuk.kim', 0, '2017-05-20 17:00:01'),
(696, 19, 'juliana.molano', 1, '2017-05-20 17:00:02'),
(697, 19, 'matthew.bass', 1, '2017-05-20 17:00:03'),
(698, 19, 'luis.font', 0, '2017-05-20 17:00:04'),
(699, 19, 'gerardo.guizado', 0, '2017-05-20 17:00:05'),
(700, 19, 'mohammed.giwa', 1, '2017-05-20 17:00:06'),
(701, 19, 'kiu.kianpour', 1, '2017-05-20 17:00:07'),
(702, 19, 'adi.radhakrishnan', 0, '2017-05-20 17:00:08'),
(703, 19, 'matthew.bass', 0, '2017-05-20 17:00:09'),
(704, 19, 'jimi.ige', 0, '2017-05-20 17:00:10'),
(705, 19, 'fiona.enderby', 1, '2017-05-20 17:00:11'),
(706, 20, 'adam.a.lopez', 1, '2017-08-24 11:00:00'),
(707, 20, 'juliana.molano', 0, '2017-08-24 11:00:01'),
(708, 20, 'roberto.a.rando', 0, '2017-08-24 11:00:02'),
(709, 20, 'brian.r.quick', 0, '2017-08-24 11:00:03'),
(710, 20, 'jessica.l.magdaleno', 0, '2017-08-24 11:00:04'),
(711, 20, 'jorge.e.barreto', 1, '2017-08-24 11:00:05'),
(712, 20, 'jose.hernandez', 1, '2017-08-24 11:00:06'),
(713, 20, 'eric.steinmetz', 0, '2017-08-24 11:00:07'),
(714, 20, 'maureen.m.roche', 0, '2017-08-24 11:00:08'),
(715, 20, 'jessica.l.magdaleno', 0, '2017-08-24 11:00:09'),
(716, 20, 'maura.p.riley', 0, '2017-08-24 11:00:10'),
(717, 20, 'linda.bromfield', 0, '2017-08-24 11:00:11'),
(718, 20, 'sara.e.mayner', 1, '2017-08-24 11:00:12'),
(719, 20, 'ayana.greer-buck', 1, '2017-08-24 11:00:13'),
(720, 20, 'f.almonte.caminero', 0, '2017-08-24 11:00:14'),
(721, 20, 'kiu.kianpour', 0, '2017-08-24 11:00:15'),
(722, 20, 'piti.sinkantarakorn', 1, '2017-08-24 11:00:16'),
(723, 21, 'jay.l.blanco', 0, '2016-10-14 13:00:00'),
(724, 21, 'sylvester.fejokwu', 0, '2016-10-14 13:00:01'),
(725, 21, 'sean.stalling', 0, '2016-10-14 13:00:02'),
(726, 21, 'radha.arghal', 1, '2016-10-14 13:00:03'),
(727, 21, 'nicholas.bennett', 0, '2016-10-14 13:00:04'),
(728, 21, 'michael.adams', 0, '2016-10-14 13:00:05'),
(729, 21, 'piti.sinkantarakorn', 1, '2016-10-14 13:00:06'),
(730, 21, 'jessica.l.magdaleno', 0, '2016-10-14 13:00:07'),
(731, 21, 'khyrsys.d.castillo', 0, '2016-10-14 13:00:08'),
(732, 21, 'christopher.r.powis', 1, '2016-10-14 13:00:09'),
(733, 21, 'nicholas.bennett', 0, '2016-10-14 13:00:10'),
(734, 21, 'william.siemer', 1, '2016-10-14 13:00:11'),
(735, 21, 'toya.skeete', 0, '2016-10-14 13:00:12'),
(736, 21, 'ricardo.g.ballet', 1, '2016-10-14 13:00:13'),
(737, 22, 'joshua.d.aurand', 0, '2017-01-27 16:00:00'),
(738, 22, 'jimi.ige', 0, '2017-01-27 16:00:01'),
(739, 22, 'sylvester.fejokwu', 1, '2017-01-27 16:00:02'),
(740, 22, 'roberto.a.rando', 0, '2017-01-27 16:00:03'),
(741, 22, 'maureen.m.roche', 0, '2017-01-27 16:00:04'),
(742, 22, 'mabel.saez', 0, '2017-01-27 16:00:05'),
(743, 22, 'oswaldo.reyes-chica', 1, '2017-01-27 16:00:06'),
(744, 22, 'chandler.l.perry', 1, '2017-01-27 16:00:07'),
(745, 22, 'ricardo.g.ballet', 0, '2017-01-27 16:00:08'),
(746, 22, 'amy.garofalo', 0, '2017-01-27 16:00:09'),
(747, 22, 'michael.adams', 0, '2017-01-27 16:00:10'),
(748, 22, 'rasheid.j.boykin', 0, '2017-01-27 16:00:11'),
(749, 22, 'sylvester.fejokwu', 1, '2017-01-27 16:00:12'),
(750, 22, 'sean.stallings', 0, '2017-01-27 16:00:13'),
(751, 22, 'b.feliciano-rivera', 1, '2017-01-27 16:00:14'),
(752, 22, 'sean.stalling', 0, '2017-01-27 16:00:15'),
(753, 22, 'steven.w.rockwood', 0, '2017-01-27 16:00:16'),
(754, 23, 'fiona.enderby', 0, '2017-07-07 16:00:00'),
(755, 23, 'gerardo.guizado', 0, '2017-07-07 16:00:01'),
(756, 23, 'veronica.gutierrez', 0, '2017-07-07 16:00:02'),
(757, 23, 'oswaldo.reyes-chica', 0, '2017-07-07 16:00:03'),
(758, 23, 'b.feliciano-rivera', 1, '2017-07-07 16:00:04'),
(759, 23, 'eric.steinmetz', 1, '2017-07-07 16:00:05'),
(760, 23, 'mitchell.a.zink', 1, '2017-07-07 16:00:06'),
(761, 23, 'roberto.a.rando', 0, '2017-07-07 16:00:07'),
(762, 23, 'shouka.darvishi.jazi', 0, '2017-07-07 16:00:08'),
(763, 23, 'felipe.chaquea', 0, '2017-07-07 16:00:09'),
(764, 23, 'breon.ranson', 0, '2017-07-07 16:00:10'),
(765, 23, 'ricardo.winterstein', 1, '2017-07-07 16:00:11'),
(766, 23, 't.a.rodriguez-carpio', 0, '2017-07-07 16:00:12'),
(767, 23, 'bofan.zhang', 0, '2017-07-07 16:00:13'),
(768, 24, 'william.siemer', 0, '2017-08-24 11:00:00'),
(769, 24, 'mohammed.giwa', 0, '2017-08-24 11:00:01'),
(770, 24, 'breon.ranson', 1, '2017-08-24 11:00:02'),
(771, 24, 'daniel.t.choquette', 1, '2017-08-24 11:00:03'),
(772, 24, 'sara.e.mayner', 0, '2017-08-24 11:00:04'),
(773, 24, 'ricardo.winterstein', 0, '2017-08-24 11:00:05'),
(774, 24, 'mohammed.giwa', 0, '2017-08-24 11:00:06'),
(775, 24, 'sarah.c.tostanoski', 0, '2017-08-24 11:00:07'),
(776, 24, 'adam.a.lopez', 1, '2017-08-24 11:00:08'),
(777, 24, 'sean.stallings', 0, '2017-08-24 11:00:09'),
(778, 24, 'mitchell.a.zink', 0, '2017-08-24 11:00:10'),
(779, 24, 'adi.radhakrishnan', 0, '2017-08-24 11:00:11'),
(780, 25, 'gerardo.guizado', 1, '2018-02-01 20:00:00'),
(781, 25, 'maureen.m.roche', 1, '2018-02-01 20:00:01'),
(782, 25, 'heidi.rees', 0, '2018-02-01 20:00:02'),
(783, 25, 'michelle.zeng', 0, '2018-02-01 20:00:03'),
(784, 25, 'piti.sinkantarakorn', 0, '2018-02-01 20:00:04'),
(785, 25, 'jaime.e.rivera.velez', 1, '2018-02-01 20:00:05'),
(786, 25, 'nicholas.bennett', 1, '2018-02-01 20:00:06'),
(787, 25, 'ikhide.akhigbe', 0, '2018-02-01 20:00:07'),
(788, 25, 'roop.mehdi', 0, '2018-02-01 20:00:08'),
(789, 25, 'christine.n.wilkes', 0, '2018-02-01 20:00:09'),
(790, 25, 'luis.font', 0, '2018-02-01 20:00:10'),
(791, 25, 'adam.a.lopez', 1, '2018-02-01 20:00:11'),
(792, 25, 'sean.stalling', 0, '2018-02-01 20:00:12'),
(793, 25, 'john.s.johnson', 0, '2018-02-01 20:00:13'),
(794, 25, 'jose.o.rivera', 1, '2018-02-01 20:00:14'),
(795, 25, 'linda.bromfield', 0, '2018-02-01 20:00:15'),
(796, 25, 'jennifer.b.heflin', 1, '2018-02-01 20:00:16'),
(797, 25, 'roop.mehdi', 1, '2018-02-01 20:00:17'),
(798, 25, 'g.a.rodriguez.garcia', 0, '2018-02-01 20:00:18'),
(799, 25, 'jennifer.b.heflin', 0, '2018-02-01 20:00:19'),
(800, 25, 'salomon.s.salinas', 0, '2018-02-01 20:00:20'),
(801, 26, 'jorge.l.pabon.cruz', 1, '2018-09-12 13:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `DIM Committee`
--

CREATE TABLE `DIM Committee` (
  `Committee_ID` varchar(255) NOT NULL COMMENT 'Committee ID',
  `Committee_Name` text NOT NULL COMMENT 'Committe Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains all the committee information';

--
-- Dumping data for table `DIM Committee`
--

INSERT INTO `DIM Committee` (`Committee_ID`, `Committee_Name`) VALUES
('C1', 'Recruiting'),
('C2', 'Local Marketing'),
('C3', 'Membership Engagement'),
('C4', 'Professional Development'),
('C5', 'Community Outreach'),
('C6', 'Communication'),
('CA', 'Advisory Board'),
('CA-Sponsor', 'HAERG Lead Sponsor'),
('CL', 'DC HAERG Co-Leads'),
('CS', 'Support - Metrics & Compliance');

-- --------------------------------------------------------

--
-- Table structure for table `DIM Event Objective`
--

CREATE TABLE `DIM Event Objective` (
  `ID` bigint(20) NOT NULL COMMENT 'Type ID',
  `Name` text NOT NULL COMMENT 'Objective Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains all the Event Objectives';

--
-- Dumping data for table `DIM Event Objective`
--

INSERT INTO `DIM Event Objective` (`ID`, `Name`) VALUES
(1, 'Networking'),
(2, 'Mentorship'),
(2, 'Skills to Succeed'),
(2, 'Leading in the New'),
(2, 'Community of Practice'),
(3, 'Networking'),
(3, 'Networking (Happy Hour)'),
(4, 'Corporate Citizenship'),
(5, 'Philantropy'),
(5, 'Fundraiser'),
(6, 'I&D Recruiting'),
(7, 'Sponsorship'),
(8, 'Prospective Clients'),
(8, 'Client Connection'),
(9, 'Sponsorship'),
(9, 'Networking'),
(9, 'Networking (Happy Hour)'),
(10, 'Relationship I&D'),
(10, 'Cross ERG');

-- --------------------------------------------------------

--
-- Table structure for table `DIM Event Type`
--

CREATE TABLE `DIM Event Type` (
  `ID` bigint(20) NOT NULL COMMENT 'Type ID',
  `Name` text NOT NULL COMMENT 'Type Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains all the Event Types';

--
-- Dumping data for table `DIM Event Type`
--

INSERT INTO `DIM Event Type` (`ID`, `Name`) VALUES
(1, 'People -> Attract'),
(2, 'People -> Development'),
(3, 'People -> Retain'),
(4, 'People -> Vigilance & Visibility'),
(5, 'Community -> Service'),
(6, 'Community -> Attract'),
(7, 'Community -> Vigilance & Visibility'),
(8, 'Market -> Attract'),
(9, 'Market -> Develop'),
(10, 'Market -> Vigilance & Visibility');

-- --------------------------------------------------------

--
-- Table structure for table `Event Change Log`
--

CREATE TABLE `Event Change Log` (
  `ID` bigint(20) NOT NULL COMMENT 'Entry ID',
  `EventID` bigint(20) NOT NULL COMMENT 'Event ID',
  `Type` text NOT NULL COMMENT 'Action type',
  `Reason` text NOT NULL COMMENT 'Reason for the change',
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Time the person made the change'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains all event change history';

--
-- Dumping data for table `Event Change Log`
--

INSERT INTO `Event Change Log` (`ID`, `EventID`, `Type`, `Reason`, `Timestamp`) VALUES
(1, 26, 'Create', 'New Event Creation Form', '2018-04-14 06:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE `Events` (
  `ID` bigint(20) NOT NULL COMMENT 'Event ID',
  `Name` text NOT NULL COMMENT 'Event name',
  `Date` date NOT NULL COMMENT 'Event date',
  `Start` time NOT NULL COMMENT 'Event start time',
  `End` time NOT NULL COMMENT 'Event end time',
  `Estimated_Budget` double NOT NULL COMMENT 'Event estimated eudget',
  `Actual_Budget` double NOT NULL DEFAULT '0' COMMENT 'Event actual budget',
  `Location` text NOT NULL COMMENT 'Event location',
  `Committee_ID` text NOT NULL COMMENT 'Committee in charge of the event',
  `Type` text NOT NULL COMMENT 'Event Type',
  `Objective` text NOT NULL COMMENT 'Event objective',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Creation timestamp',
  `Creator` text NOT NULL COMMENT 'Event Creator',
  `Person_Code` text NOT NULL COMMENT 'Code to give people that attend in person',
  `Remote_Code` text NOT NULL COMMENT 'Code to give people that attend remotely',
  `Approved` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'If the Event was approved',
  `Deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'If the Event was marked for deletion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains all the event information';

--
-- Dumping data for table `Events`
--

INSERT INTO `Events` (`ID`, `Name`, `Date`, `Start`, `End`, `Estimated_Budget`, `Actual_Budget`, `Location`, `Committee_ID`, `Type`, `Objective`, `Created`, `Creator`, `Person_Code`, `Remote_Code`, `Approved`, `Deleted`) VALUES
(1, 'Tutoring with LSF', '2017-03-18', '07:00:00', '08:00:00', 0, 0, 'Glebe Office', 'Community Outreach', 'People -> Retain', 'Networking', '0000-00-00 00:00:00', 'poc', 'AAI90A9J', '900A9JD0', 1, 0),
(2, 'Arlington Free Clinic Gala: Havana Nights', '2017-10-28', '07:00:00', '08:00:00', 0, 0, 'External Location', 'Community Outreach', 'People -> Retain', 'Networking', '2011-07-17 04:00:00', 'poc', 'D09AJ0D9', '0AS9JA0S', 1, 0),
(3, 'ALPFA - UMD Professional Development Workshop', '2016-11-15', '10:00:00', '11:00:00', 100, 100, 'University of Maryland - Campus', 'Recruiting', 'Market -> Vigilance & Visibility', 'Relationship I&D', '0000-00-00 00:00:00', 'poc', 'KJD0U9AS', 'AIJS90QJ', 1, 0),
(4, 'UMD Accenture Information Session', '2016-09-07', '14:00:00', '15:00:00', 0, 0, 'University of Maryland - Campus', 'Recruiting', 'Market -> Vigilance & Visibility', 'Relationship I&D', '0000-00-00 00:00:00', 'poc', 'SADKASJD', 'LLJJLASI', 1, 0),
(5, 'SOTAM Study-Bol', '2017-11-15', '14:00:00', '15:00:00', 0, 0, 'External Location', 'Community Outreach', 'People -> Retain', 'Networking', '0000-00-00 00:00:00', 'poc', 'DASD93NO', 'LLDSA09J', 1, 0),
(6, 'SHPE Post-Conference Professional Development Workshop', '2016-11-14', '18:00:00', '19:00:00', 100, 78, 'Glebe Office', 'Recruiting', 'People -> Vigilance & Visibility', 'Relationship I&D', '0000-00-00 00:00:00', 'poc', 'SDE283UD', 'MKFH301N', 1, 0),
(7, 'SOTAM Study-Bol', '2017-11-15', '14:00:00', '15:00:00', 0, 0, 'External Location', 'Community Outreach', 'People -> Retain', 'Networking', '0000-00-00 00:00:00', 'poc', 'DL1KJ94H', 'BBAK2EMP', 1, 0),
(8, 'Tutoring with LSF', '2017-09-30', '08:00:00', '09:00:00', 0, 0, 'External Location', 'Community Outreach', 'People -> Retain', 'Networking', '2010-10-17 04:00:00', 'poc', 'AAI90A9J', '900A9JD0', 1, 0),
(9, 'Performance Achievement (MERG & HAERG)', '2016-10-28', '12:00:00', '13:00:00', 100, 0, 'Glebe Office', 'Professional Development', 'Community -> Vigilance & Visibility', 'Sponsorship', '2011-07-16 04:00:00', 'poc', 'D09AJ0D9', '0AS9JA0S', 1, 0),
(10, 'Prospanica', '2017-03-23', '08:00:00', '09:00:00', 100, 679, 'Glebe Office', 'Local Marketing', 'Market -> Vigilance & Visibility', 'Sponsorship', '0000-00-00 00:00:00', 'poc', 'KJD0U9AS', 'AIJS90QJ', 1, 0),
(11, 'PR Fundrising - Staples Boxes', '2017-10-27', '18:00:00', '19:00:00', 100, 16.64, 'External Location', 'DC HAERG Co-Leads', 'People -> Retain', 'Networking', '2011-06-17 04:00:00', 'poc', 'SADKASJD', 'LLJJLASI', 1, 0),
(12, 'Tutoring with LSF', '2017-09-30', '08:00:00', '09:00:00', 0, 0, 'External Location', 'Community Outreach', 'People -> Retain', 'Networking', '2010-10-17 04:00:00', 'poc', 'DASD93NO', 'LLDSA09J', 1, 0),
(13, 'Tutoring with LSF', '2017-11-04', '18:00:00', '19:00:00', 0, 0, 'External Location', 'Community Outreach', 'People -> Retain', 'Networking', '0000-00-00 00:00:00', 'poc', 'SDE283UD', 'MKFH301L', 1, 0),
(14, 'Tutoring with LSF', '2017-03-18', '19:00:00', '20:00:00', 0, 0, 'Glebe Office', 'DC HAERG Co-Leads', 'People -> Retain', 'Networking', '0000-00-00 00:00:00', 'poc', 'DL1KJ94H', 'BBAK2EMS', 1, 0),
(15, 'ALPFA - UMD Professional Development Workshop', '2016-11-15', '10:00:00', '11:00:00', 100, 100, 'University of Maryland - Campus', 'Recruiting', 'Market -> Vigilance & Visibility', 'Relationship I&D', '0000-00-00 00:00:00', 'poc', 'AAI90A9J', '900A9JD0', 1, 0),
(16, 'Tutoring with LSF', '2017-09-09', '16:00:00', '17:00:00', 0, 0, 'External Location', 'Community Outreach', 'People -> Retain', 'Networking', '0000-00-00 00:00:00', 'poc', 'D09AJ0D9', '0AS9JA0S', 1, 0),
(17, 'HAERG Holiday Party', '2017-01-13', '17:00:00', '18:00:00', 500, 579, 'External Location', 'Membership Engagement', 'Community -> Attract', 'I&D Recruiting', '0000-00-00 00:00:00', 'poc', 'KJD0U9AS', 'AIJS90QJ', 1, 0),
(18, 'UMD Accenture Information Session', '2016-09-07', '14:00:00', '15:00:00', 0, 0, 'University of Maryland - Campus', 'Recruiting', 'Market -> Vigilance & Visibility', 'Relationship I&D', '0000-00-00 00:00:00', 'poc', 'SADKASJD', 'LLJJLASI', 1, 0),
(19, 'APAERG Dragonboat', '2017-05-20', '13:00:00', '14:00:00', 0, 100, 'Glebe Office', 'DC HAERG Co-Leads', 'Community -> Attract', 'I&D Recruiting', '0000-00-00 00:00:00', 'poc', 'DASD93NO', 'LLDSA09J', 1, 0),
(20, 'Leading in the New: Artificial Intelligence', '2017-08-24', '07:00:00', '08:00:00', 500, 800, 'Glebe Office', 'Professional Development', 'Community -> Vigilance & Visibility', 'Sponsorship', '0000-00-00 00:00:00', 'poc', 'SDE283UD', 'MKFH301S', 1, 0),
(21, 'Leading in the New: Fjord Workshop', '2016-10-14', '09:00:00', '10:00:00', 200, 116, 'Digital Studio - DC', 'Professional Development', 'Community -> Vigilance & Visibility', 'Sponsorship', '0000-00-00 00:00:00', 'poc', 'DYGASG32', 'DAD31ADA', 1, 0),
(22, 'Leading in the New-Cloud Event', '2017-01-27', '11:00:00', '12:00:00', 750, 498, 'Digital Studio - DC', 'Professional Development', 'Community -> Vigilance & Visibility', 'Sponsorship', '0000-00-00 00:00:00', 'poc', '2312NEQJ', '28E918HW', 1, 0),
(23, 'Leading in the New: Blockchain', '2017-07-07', '12:00:00', '13:00:00', 0, 16, 'Digital Studio - DC', 'Professional Development', 'Community -> Vigilance & Visibility', 'Sponsorship', '0000-00-00 00:00:00', 'poc', '83HD29HW', 'E38DH3DJ', 1, 0),
(24, 'Leading in the New: Artificial Intelligence', '2017-08-24', '07:00:00', '08:00:00', 900, 800, 'Glebe Office', 'Professional Development', 'Community -> Vigilance & Visibility', 'Sponsorship', '0000-00-00 00:00:00', 'poc', 'D38H3AL2', 'O8HD3OJD', 1, 0),
(25, 'Leading in the New: Automation & AI', '2018-08-08', '00:00:00', '23:00:00', 750, 700, 'Glebe Office', 'Professional Development', 'Community -> Vigilance & Visibility', 'Sponsorship', '0000-00-00 00:00:00', 'poc', '3OIDIJO3', 'DOID39JD', 1, 0),
(26, 'Disrupt the Now', '2025-04-16', '00:00:00', '23:30:00', 250, 0, 'Glebe Office', 'Professional Development', 'People -> Attract', 'Networking', '2018-04-14 06:52:47', 'poc', '6c38a1', '8a57eb', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Leads`
--

CREATE TABLE `Leads` (
  `ID` bigint(20) NOT NULL COMMENT 'Enterprise ID',
  `Committee_ID` text NOT NULL COMMENT 'Committee ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains all the committee leads';

-- --------------------------------------------------------

--
-- Table structure for table `Members`
--

CREATE TABLE `Members` (
  `ID` bigint(20) NOT NULL COMMENT 'Unique value for each entry',
  `EID` text NOT NULL COMMENT 'Member enterprise ID',
  `FName` text NOT NULL COMMENT 'Member first name',
  `Initials` text COMMENT 'Member initials',
  `LName` text NOT NULL COMMENT 'Member last name',
  `Level` int(11) NOT NULL COMMENT 'Member level',
  `Title` text COMMENT 'Member title',
  `Segment` text NOT NULL COMMENT 'Company Segment (Commercial, Federal)',
  `Email` text NOT NULL COMMENT 'Member e-mail',
  `Newsletter` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Wants to receive newsletter',
  `Volunteer` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Wants to be a volunteer',
  `Active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Is an active member',
  `Lead` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Is a lead',
  `Role` int(11) NOT NULL DEFAULT '0' COMMENT 'Member role in the portal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains all the member information';

--
-- Dumping data for table `Members`
--

INSERT INTO `Members` (`ID`, `EID`, `FName`, `Initials`, `LName`, `Level`, `Title`, `Segment`, `Email`, `Newsletter`, `Volunteer`, `Active`, `Lead`, `Role`) VALUES
(1, 'felipe.chaquea', 'Felipe', '', 'Chaquea', 10, '', 'LLP', 'felipe.chaquea@mycompany.com', 1, 0, 0, 0, 0),
(2, 'yasmin.serrato-munoz', 'Yasmin', '', 'Serrato-Munoz', 7, '', 'Federal', 'yasmin.serrato-munoz@mycompany.com', 1, 0, 0, 0, 0),
(3, 'niya.d.lester', 'niya', '', 'lester', 7, '', 'Federal', 'niya.d.lester@mycompany.com', 1, 1, 1, 1, 0),
(4, 'f.a.fernandez', 'Fernando', '', 'Fernandez', 8, '', 'Federal', 'f.a.fernandez@mycompany.com', 1, 0, 0, 0, 0),
(5, 'sylvester.fejokwu', 'Sylvester', '', 'Fejokwu', 7, '', 'Federal', 'sylvester.fejokwu@mycompany.com', 1, 0, 0, 0, 0),
(6, 'yamil.borges', 'Yamil', '', 'Borges', 9, '', 'Federal', 'yamil.borges@mycompany.com', 1, 1, 1, 1, 0),
(7, 'bofan.zhang', 'bofan', '', 'zhang', 8, '', 'Federal', 'bofan.zhang@mycompany.com', 1, 1, 1, 1, 0),
(8, 'jennifer.b.heflin', 'Jennifer', '', 'Heflin', 10, '', 'LLP', 'jennifer.b.heflin@mycompany.com', 1, 1, 1, 1, 0),
(9, 'breon.ranson', 'Breon', '', 'Ranson', 11, '', 'Federal', 'breon.ranson@mycompany.com', 1, 1, 1, 1, 0),
(10, 'jorge.e.barreto', 'Jorge', '', 'Barreto', 11, '', 'Federal', 'jorge.e.barreto@mycompany.com', 1, 0, 0, 0, 0),
(11, 'ediberto.m.kadowaki', 'Edilberto', '', 'Kadowaki', 11, '', 'Federal', 'ediberto.m.kadowaki@mycompany.com', 1, 0, 0, 0, 0),
(12, 'jay.l.blanco', 'Jay', '', 'Blanco', 9, '', 'Federal', 'jay.l.blanco@mycompany.com', 1, 0, 0, 0, 0),
(13, 'sara.e.mayner', 'sara', '', 'mayner', 8, '', 'Federal', 'sara.e.mayner@mycompany.com', 1, 1, 1, 1, 0),
(14, 'eric.steinmetz', 'eric', '', 'steinmetz', 11, '', 'Federal', 'eric.steinmetz@mycompany.com', 1, 1, 1, 1, 0),
(15, 'radha.arghal', 'radha', '', 'arghal', 7, '', 'Federal', 'radha.arghal@mycompany.com', 1, 0, 0, 0, 0),
(16, 'adam.a.lopez', 'Adam', '', 'Lopez', 7, '', 'Federal', 'adam.a.lopez@mycompany.com', 1, 1, 1, 1, 0),
(17, 'jonas.j.tizabi', 'Jonas', '', 'Tizabi', 7, '', 'Federal', 'jonas.j.tizabi@mycompany.com', 1, 1, 1, 1, 0),
(18, 'jose.o.rivera', 'Jose', '', 'Rivera', 8, '', 'Federal', 'jose.o.rivera@mycompany.com', 1, 1, 1, 1, 0),
(19, 'roman.torres', 'Roman', '', 'Torres', 8, '', 'Federal', 'roman.torres@mycompany.com', 1, 1, 1, 1, 0),
(20, 'carlo.j.burgos', 'Carlo', '', 'Burgos', 11, '', 'Federal', 'carlo.j.burgos@mycompany.com', 1, 1, 1, 1, 0),
(21, 'roop.mehdi', 'roop', '', 'mehdi', 7, '', 'Federal', 'roop.mehdi@mycompany.com', 1, 0, 0, 0, 0),
(22, 'veronica.gutierrez', 'Veronica', '', 'Rodriguez', 10, '', 'Federal', 'veronica.gutierrez@mycompany.com', 1, 1, 1, 1, 0),
(23, 'devon.johnson', 'devon', '', 'johnson', 9, '', 'Federal', 'devon.johnson@mycompany.com', 1, 1, 1, 1, 0),
(24, 'matthew.bass', 'matthew', '', 'bass', 9, '', 'Federal', 'matthew.bass@mycompany.com', 1, 0, 0, 0, 0),
(25, 'b.feliciano-rivera', 'Bethzaely', '', 'Feliciano-rivera', 9, '', 'Federal', 'b.feliciano-rivera@mycompany.com', 1, 1, 1, 1, 0),
(26, 'nicholas.bennett', 'nicholas', '', 'bennett', 9, '', 'Federal', 'nicholas.bennett@mycompany.com', 1, 1, 1, 1, 0),
(27, 'fiona.enderby', 'Fiona', '', 'Enderby', 11, '', 'LLP', 'fiona.enderby@mycompany.com', 1, 0, 0, 0, 0),
(28, 'juliana.molano', 'Juliana', '', 'Molano', 11, '', 'Federal', 'juliana.molano@mycompany.com', 1, 1, 1, 1, 0),
(29, 'roberto.a.rando', 'roberto', '', 'rando', 9, '', 'Federal', 'roberto.a.rando@mycompany.com', 1, 0, 0, 0, 0),
(30, 'rasheid.j.boykin', 'rasheid', '', 'boykin', 11, '', 'Federal', 'rasheid.j.boykin@mycompany.com', 1, 0, 0, 0, 0),
(31, 'maura.p.riley', 'Maura', '', 'Riley', 7, '', 'Federal', 'maura.p.riley@mycompany.com', 1, 0, 0, 0, 0),
(32, 'linda.bromfield', 'linda', '', 'bromfield', 10, '', 'Federal', 'linda.bromfield@mycompany.com', 1, 1, 1, 1, 0),
(33, 'mabel.saez', 'Mabel', '', 'Saez', 7, '', 'Federal', 'mabel.saez@mycompany.com', 1, 1, 1, 1, 0),
(34, 'shouka.darvishi.jazi', 'shouka', '', 'jazi', 10, '', 'Federal', 'shouka.darvishi.jazi@mycompany.com', 1, 0, 0, 0, 0),
(35, 'toya.skeete', 'Toya', '', 'Skeete', 11, '', 'Federal', 'toya.skeete@mycompany.com', 1, 1, 1, 1, 0),
(36, 'minsuk.kim', 'Minsuk', '', 'Kim', 8, '', 'Federal', 'minsuk.kim@mycompany.com', 1, 1, 1, 0, 0),
(37, 'christine.n.wilkes', 'Christine', '', 'Wilkes', 9, '', 'Federal', 'christine.n.wilkes@mycompany.com', 1, 0, 0, 0, 0),
(38, 'michelle.zeng', 'michelle', '', 'zeng', 7, '', 'Federal', 'michelle.zeng@mycompany.com', 1, 1, 1, 0, 0),
(39, 'max.han', 'Max', '', 'Han', 9, '', 'Federal', 'max.han@mycompany.com', 1, 1, 1, 0, 0),
(40, 'nathalie.s.flores', 'Nathalie', '', 'Flores', 8, '', 'Federal', 'nathalie.s.flores@mycompany.com', 1, 1, 1, 0, 0),
(41, 'gerardo.guizado', 'Gerardo', '', 'Guizado', 10, '', 'Federal', 'gerardo.guizado@mycompany.com', 1, 0, 0, 0, 0),
(42, 'ivan.l.nazario', 'Ivan', '', 'Nazario', 10, '', 'Federal', 'ivan.l.nazario@mycompany.com', 1, 1, 1, 0, 0),
(43, 'brian.r.quick', 'brian', '', 'quick', 9, '', 'Federal', 'brian.r.quick@mycompany.com', 1, 0, 0, 0, 0),
(44, 'john.s.johnson', 'john', '', 'johnson', 10, '', 'Federal', 'john.s.johnson@mycompany.com', 1, 0, 0, 0, 0),
(45, 'amy.garofalo', 'amy', '', 'garofalo', 10, '', 'Federal', 'amy.garofalo@mycompany.com', 1, 1, 1, 0, 0),
(46, 'jessi.prizinsky', 'Jessi', '', 'Prizinsky', 9, '', 'Federal', 'jessi.prizinsky@mycompany.com', 1, 1, 1, 0, 0),
(47, 'katharyn.mountain', 'katharyn', '', 'mountain', 11, '', 'Federal', 'katharyn.mountain@mycompany.com', 1, 1, 1, 0, 0),
(48, 'steven.w.rockwood', 'steven', '', 'rockwood', 9, '', 'Federal', 'steven.w.rockwood@mycompany.com', 1, 1, 1, 0, 0),
(49, 'ricardo.g.ballet', 'Ricardo', '', 'Ballet', 11, '', 'Federal', 'ricardo.g.ballet@mycompany.com', 1, 1, 1, 0, 0),
(50, 'ayana.greer-buck', 'ayana', '', 'greer-buck', 10, '', 'Federal', 'ayana.greer-buck@mycompany.com', 1, 1, 1, 0, 0),
(51, 'salomon.s.salinas', 'Salomon', '', 'Salinas', 11, '', 'LLP', 'salomon.s.salinas@mycompany.com', 1, 0, 0, 0, 0),
(52, 'christopher.r.powis', 'christopher', '', 'powis', 10, '', 'Federal', 'christopher.r.powis@mycompany.com', 1, 1, 1, 0, 0),
(53, 'ricardo.winterstein', 'Ricardo', '', 'Winterstein', 8, '', 'Federal', 'ricardo.winterstein@mycompany.com', 1, 0, 0, 0, 0),
(54, 'chandler.l.perry', 'chandler', '', 'perry', 10, '', 'Federal', 'chandler.l.perry@mycompany.com', 1, 1, 1, 0, 0),
(55, 'bakhtawar.chaudhary', 'bakhtawar', '', 'chaudhary', 9, '', 'Federal', 'bakhtawar.chaudhary@mycompany.com', 1, 0, 0, 0, 0),
(56, 'sean.stalling', 'sean', '', 'stalling', 9, '', 'Federal', 'sean.stalling@mycompany.com', 1, 1, 1, 0, 0),
(57, 'adam.a.lopez', 'Adam', '', 'Lopez', 8, '', 'Federal', 'adam.a.lopez@mycompany.com', 1, 1, 1, 0, 0),
(58, 'jaime.e.rivera.velez', 'jaime', '', 'rivera', 9, '', 'Federal', 'jaime.e.rivera.velez@mycompany.com', 1, 0, 0, 0, 0),
(59, 'adi.radhakrishnan', 'Adi', '', 'Radhakrishnan', 8, '', 'Federal', 'adi.radhakrishnan@mycompany.com', 1, 1, 1, 0, 0),
(60, 'steven.r.jarboe', 'Steven', '', 'Jarboe', 8, '', 'Federal', 'steven.r.jarboe@mycompany.com', 1, 1, 1, 0, 0),
(61, 'shannon.m.browning ', 'Shannon', '', 'Browning ', 10, '', 'Federal', 'shannon.m.browning@mycompany.com', 1, 1, 1, 0, 0),
(62, 'piti.sinkantarakorn', 'piti', '', 'sinkantarakorn', 11, '', 'Federal', 'piti.sinkantarakorn@mycompany.com', 1, 0, 0, 0, 0),
(63, 'michael.adams', 'michael', '', 'adams', 7, '', 'Federal', 'michael.adams@mycompany.com', 1, 1, 1, 0, 0),
(64, 'mitchell.a.zink', 'mitchell', '', 'zink', 10, '', 'Federal', 'mitchell.a.zink@mycompany.com', 1, 0, 0, 0, 0),
(65, 'jimi.ige', 'Jimi', '', 'Ige', 7, '', 'LLP', 'jimi.ige@mycompany.com', 1, 0, 0, 0, 0),
(66, 'daniel.t.choquette', 'Daniel', '', 'Choquette', 7, '', 'Federal', 'daniel.t.choquette@mycompany.com', 1, 0, 0, 0, 0),
(67, 'akhira.muhammad', 'Akhira', '', 'Muhammad', 9, '', 'Federal', 'akhira.muhammad@mycompany.com', 1, 0, 0, 0, 0),
(68, 'luis.font', 'Luis', '', 'Font', 10, '', 'Federal', 'luis.font@mycompany.com', 1, 0, 0, 0, 0),
(69, 'jessica.l.magdaleno', 'jessica', '', 'magdaleno', 10, '', 'Federal', 'jessica.l.magdaleno@mycompany.com', 1, 1, 1, 0, 0),
(70, 'j.martinez.feliciano', 'Jomar', '', 'Martinez', 8, '', 'Federal', 'j.martinez.feliciano@mycompany.com', 1, 1, 1, 0, 0),
(71, 'g.a.rodriguez.garcia', 'Gabriel', '', 'Rodriguez', 11, '', 'Federal', 'g.a.rodriguez.garcia@mycompany.com', 1, 0, 0, 0, 0),
(72, 'j.amezquita.ibarra', 'jesus', '', 'amezquita', 8, '', 'Federal', 'j.amezquita.ibarra@mycompany.com', 1, 0, 0, 0, 0),
(73, 'sarah.c.tostanoski', 'sarah', '', 'tostanoski', 9, '', 'Federal', 'sarah.c.tostanoski@mycompany.com', 1, 0, 0, 0, 0),
(74, 'william.siemer', 'William', '', 'Siemer', 7, '', 'Federal', 'william.siemer@mycompany.com', 1, 0, 0, 0, 0),
(75, 'ikhide.akhigbe', 'Ikhide', '', 'Akhigbe', 8, '', 'Federal', 'ikhide.akhigbe@mycompany.com', 1, 0, 0, 0, 0),
(76, 'jennifer.lyons', 'jennifer', '', 'lyons', 10, '', 'Federal', 'jennifer.lyons@mycompany.com', 1, 0, 0, 0, 0),
(77, 'f.almonte.caminero', 'Franciel', '', 'Almonte', 11, '', 'Federal', 'f.almonte.caminero@mycompany.com', 1, 1, 1, 0, 0),
(78, 'deepak.jacob', 'deepak', '', 'jacob', 11, '', 'Federal', 'deepak.jacob@mycompany.com', 1, 0, 0, 0, 0),
(79, 'garrett.d.kessler', 'garrett', '', 'kessler', 7, '', 'Federal', 'garrett.d.kessler@mycompany.com', 1, 1, 1, 0, 0),
(80, 'heidi.rees', 'Heidi', '', 'Rees', 11, '', 'Federal', 'heidi.rees@mycompany.com', 1, 0, 0, 0, 0),
(81, 'nguyen.le', 'nguyen', '', 'le', 9, '', 'Federal', 'nguyen.le@mycompany.com', 1, 0, 0, 0, 0),
(82, 'joshua.d.aurand', 'joshua', '', 'aurand', 8, '', 'Federal', 'joshua.d.aurand@mycompany.com', 1, 1, 1, 0, 0),
(83, 'kadriene.n.sylvain', 'Kadriene', '', 'Sylvain', 7, '', 'Federal', 'kadriene.n.sylvain@mycompany.com', 1, 0, 0, 0, 0),
(84, 'khyrsys.d.castillo', 'Khyrsys', '', 'Castillo', 7, '', 'LLP', 'khyrsys.d.castillo@mycompany.com', 1, 0, 0, 0, 0),
(85, 'kiu.kianpour', 'kiu', '', 'kianpour', 8, '', 'Federal', 'kiu.kianpour@mycompany.com', 1, 1, 1, 0, 0),
(86, 'johnmael.vazquez', 'Johnmael', '', 'Vazquez', 7, '', 'LLP', 'johnmael.vazquez@mycompany.com', 1, 0, 0, 0, 0),
(87, 'roop.mehdi', 'roop', '', 'mehdi', 11, '', 'Federal', 'roop.mehdi@mycompany.com', 1, 0, 0, 0, 0),
(88, 'hilda.garza', 'Hilda', '', 'Garza', 7, '', 'Federal', 'hilda.garza@mycompany.com', 1, 0, 0, 0, 0),
(89, 'salomon.s.salinas', 'Salomon', '', 'Salinas', 8, '', 'LLP', 'salomon.s.salinas@mycompany.com', 1, 0, 0, 0, 0),
(90, 'william.siemer', 'William', '', 'Siemer', 11, '', 'Federal', 'william.siemer@mycompany.com', 1, 0, 0, 0, 0),
(91, 'jose.hernandez', 'Jose', '', 'Hernandez', 8, '', 'Federal', 'jose.hernandez@mycompany.com', 1, 0, 0, 0, 0),
(92, 'manda.g.suchman', 'Manda', '', 'Suchman', 9, '', 'Federal', 'manda.g.suchman@mycompany.com', 1, 1, 1, 0, 0),
(93, 'maureen.m.roche', 'Maureen', '', 'Roche', 11, '', 'Federal', 'maureen.m.roche@mycompany.com', 1, 1, 1, 0, 0),
(94, 'gerardo.guizado', 'Gerardo', '', 'Guizado', 7, '', 'Federal', 'gerardo.guizado@mycompany.com', 1, 0, 0, 0, 0),
(95, 'mohammed.giwa', 'mohammed', '', 'giwa', 9, '', 'Federal', 'mohammed.giwa@mycompany.com', 1, 1, 1, 0, 0),
(96, 't.a.rodriguez-carpio', 'Tania', '', 'Rodriguez-carpio', 8, '', 'Federal', 't.a.rodriguez-carpio@mycompany.com', 1, 1, 1, 0, 0),
(97, 'santiago.diaz', 'Santiago', '', 'Diaz', 7, '', 'Federal', 'santiago.diaz@mycompany.com', 1, 0, 0, 0, 0),
(98, 'karen.qi', 'Karen', '', 'Qi', 7, '', 'Federal', 'karen.qi@mycompany.com', 1, 0, 0, 0, 0),
(99, 'oswaldo.reyes-chica', 'Oswaldo', '', 'Reyes-Chica', 9, '', 'LLP', 'oswaldo.reyes-chica@mycompany.com', 1, 1, 1, 0, 0),
(100, 'sean.stallings', 'Sean', '', 'Stallings', 8, '', 'Federal', 'sean.stallings@mycompany.com', 1, 0, 0, 0, 0),
(101, 'jorge.l.pabon.cruz', 'Jorge', 'L', 'Pabon Cruz', 10, 'Soft. Eng. Sr. Analyst', 'Federal', 'jorge.l.pabon.cruz@mycompany.com', 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `RSVP`
--

CREATE TABLE `RSVP` (
  `ID` bigint(20) NOT NULL COMMENT 'Entry ID',
  `EventID` bigint(20) NOT NULL COMMENT 'Event ID',
  `EnterpriseID` text NOT NULL COMMENT 'Enterprise ID',
  `Cancel` tinyint(1) NOT NULL COMMENT 'Was it cancelled',
  `CancelReason` text COMMENT 'Reason it was cancelled',
  `CancelTimestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Time the person cancelled',
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Time the person registered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains all event registration history';

--
-- Dumping data for table `RSVP`
--

INSERT INTO `RSVP` (`ID`, `EventID`, `EnterpriseID`, `Cancel`, `CancelReason`, `CancelTimestamp`, `Timestamp`) VALUES
(0, 26, 'ivan.l.nazario', 0, NULL, '0000-00-00 00:00:00', '2018-09-11 20:22:43'),
(1, 26, 'jorge.l.pabon.cruz', 1, 'Personal circumstances', '2018-09-12 14:09:29', '2018-09-11 20:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `Username` varchar(200) NOT NULL COMMENT 'Username',
  `Password` text NOT NULL COMMENT 'Password',
  `Role` bigint(20) NOT NULL COMMENT 'User Role'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains all accounts';

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Username`, `Password`, `Role`) VALUES
('administrator', 'b739d195ad7192bbd6a223a67645e3a766c239073667821cec0e07257f74410f', 3),
('approver', 'b739d195ad7192bbd6a223a67645e3a766c239073667821cec0e07257f74410f', 1),
('poc', 'b739d195ad7192bbd6a223a67645e3a766c239073667821cec0e07257f74410f', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Announcements`
--
ALTER TABLE `Announcements`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Attendance`
--
ALTER TABLE `Attendance`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `DIM Committee`
--
ALTER TABLE `DIM Committee`
  ADD PRIMARY KEY (`Committee_ID`);

--
-- Indexes for table `DIM Event Type`
--
ALTER TABLE `DIM Event Type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Event Change Log`
--
ALTER TABLE `Event Change Log`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Leads`
--
ALTER TABLE `Leads`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Members`
--
ALTER TABLE `Members`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `RSVP`
--
ALTER TABLE `RSVP`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Announcements`
--
ALTER TABLE `Announcements`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Announcement ID', AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `Attendance`
--
ALTER TABLE `Attendance`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Unique id for entry', AUTO_INCREMENT=812;
--
-- AUTO_INCREMENT for table `Event Change Log`
--
ALTER TABLE `Event Change Log`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Entry ID', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Events`
--
ALTER TABLE `Events`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Event ID', AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `Members`
--
ALTER TABLE `Members`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Unique value for each entry', AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `RSVP`
--
ALTER TABLE `RSVP`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Entry ID', AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
