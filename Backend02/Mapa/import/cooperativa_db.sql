SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `cooperativa_db`
--

CREATE TABLE `protocolo` (
  `numero` int(11) NOT NULL,
  `solicitante` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `ano` year(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `datacadastro` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `protocolo`
  ADD PRIMARY KEY (`numero`);

ALTER TABLE `protocolo`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;