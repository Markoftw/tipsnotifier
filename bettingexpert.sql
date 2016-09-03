SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bettingexpert`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `TipId` int(30) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL,
  `strUsername` varchar(35) DEFAULT NULL,
  `MatchTitle` varchar(255) DEFAULT NULL,
  `BetType` varchar(20) DEFAULT NULL,
  `SelectionType` varchar(20) DEFAULT NULL,
  `Stake` decimal(10,2) DEFAULT NULL,
  `Odds` decimal(10,2) DEFAULT NULL,
  `CountryName` varchar(50) DEFAULT NULL,
  `LeagueName` varchar(50) DEFAULT NULL,
  `Link` varchar(255) DEFAULT NULL,
  `strName` varchar(50) DEFAULT NULL,
  `MatchTime` int(20) DEFAULT NULL,
  `CreatedTime` int(20) DEFAULT NULL,
  `Added` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
