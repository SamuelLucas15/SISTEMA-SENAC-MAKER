CREATE TABLE `categoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descr` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `tipo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descr` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `uni_med` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descr` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cpf` char(11) NOT NULL,
  `senha` varchar(120) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `stts` tinyint(1) NOT NULL,
  `data_nasc` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_tipo` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_tipo` (`id_tipo`),
  CONSTRAINT `fk_id_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id`)
);

CREATE TABLE `material` (
  `id` int NOT NULL AUTO_INCREMENT,
  `qtd` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `stts` tinyint(1) NOT NULL,
  `id_cat` int DEFAULT NULL,
  `id_uni_med` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_uni_med` (`id_uni_med`),
  KEY `fk_id_cat` (`id_cat`),
  CONSTRAINT `fk_id_cat` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id`),
  CONSTRAINT `fk_id_uni_med` FOREIGN KEY (`id_uni_med`) REFERENCES `uni_med` (`id`)
);

CREATE TABLE `reserva` (
  `id` int NOT NULL AUTO_INCREMENT,
  `stts` enum('Pendente','Em andamento','Concluído') NOT NULL,
  `solicitante` varchar(255) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `dt` date NOT NULL,
  `hr_i` time NOT NULL,
  `hr_f` time NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_us` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_us` (`id_us`),
  CONSTRAINT `fk_id_us` FOREIGN KEY (`id_us`) REFERENCES `usuario` (`id`)
);

CREATE TABLE `resmat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `qtd_uti` int NOT NULL,
  `id_res` int DEFAULT NULL,
  `id_mat` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_res` (`id_res`),
  KEY `fk_id_mat` (`id_mat`),
  CONSTRAINT `fk_id_mat` FOREIGN KEY (`id_mat`) REFERENCES `material` (`id`),
  CONSTRAINT `fk_id_res` FOREIGN KEY (`id_res`) REFERENCES `reserva` (`id`)
);