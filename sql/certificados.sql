# Host: localhost  (Version 5.5.5-10.1.30-MariaDB)
# Date: 2018-04-10 09:27:00
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "c_administrador"
#

DROP TABLE IF EXISTS `c_administrador`;
CREATE TABLE `c_administrador` (
  `cod_administrador` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `ultimo_acesso` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_administrador`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

#
# Structure for table "c_endereco"
#

DROP TABLE IF EXISTS `c_endereco`;
CREATE TABLE `c_endereco` (
  `cod_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cod_endereco`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "c_evento"
#

DROP TABLE IF EXISTS `c_evento`;
CREATE TABLE `c_evento` (
  `cod_evento` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_evento` varchar(70) DEFAULT NULL,
  `data_realizacao` date DEFAULT NULL,
  `cod_administrador` int(11) DEFAULT NULL,
  `cod_endereco` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_evento`),
  KEY `fk_cevento_cadministrador` (`cod_administrador`),
  KEY `fk_cevento_cendereco` (`cod_endereco`),
  CONSTRAINT `fk_cevento_cadministrador` FOREIGN KEY (`cod_administrador`) REFERENCES `c_administrador` (`cod_administrador`),
  CONSTRAINT `fk_cevento_cendereco` FOREIGN KEY (`cod_endereco`) REFERENCES `c_endereco` (`cod_endereco`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "c_livro"
#

DROP TABLE IF EXISTS `c_livro`;
CREATE TABLE `c_livro` (
  `cod_livro` int(11) NOT NULL AUTO_INCREMENT,
  `numero_folha` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_livro`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Structure for table "c_folha"
#

DROP TABLE IF EXISTS `c_folha`;
CREATE TABLE `c_folha` (
  `cod_folha` int(11) NOT NULL AUTO_INCREMENT,
  `numero_folha_livro` int(11) DEFAULT NULL,
  `cod_livro` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_folha`),
  KEY `fk_cfolha_clivro` (`cod_livro`),
  CONSTRAINT `fk_cfolha_clivro` FOREIGN KEY (`cod_livro`) REFERENCES `c_livro` (`cod_livro`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for table "c_participante"
#

DROP TABLE IF EXISTS `c_participante`;
CREATE TABLE `c_participante` (
  `cod_participante` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cod_participante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "c_liberacao_certificado"
#

DROP TABLE IF EXISTS `c_liberacao_certificado`;
CREATE TABLE `c_liberacao_certificado` (
  `cod_liberacao_certificado` int(11) NOT NULL AUTO_INCREMENT,
  `numero_registro` int(11) DEFAULT NULL,
  `numero_folha` int(11) DEFAULT NULL,
  `numero_livro` int(11) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `descricao_evento` varchar(70) DEFAULT NULL,
  `data_realizacao` date DEFAULT NULL,
  `data_liberacao` date DEFAULT NULL,
  `cod_participante` int(11) DEFAULT NULL,
  `cod_evento` int(11) DEFAULT NULL,
  `cod_administrador` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_liberacao_certificado`),
  KEY `fk_cliberacao_cparticipante` (`cod_participante`),
  KEY `fk_cliberacao_cevento` (`cod_evento`),
  KEY `fk_cliberacao_cadministrador` (`cod_administrador`),
  CONSTRAINT `fk_cliberacao_cadministrador` FOREIGN KEY (`cod_administrador`) REFERENCES `c_administrador` (`cod_administrador`),
  CONSTRAINT `fk_cliberacao_cevento` FOREIGN KEY (`cod_evento`) REFERENCES `c_evento` (`cod_evento`),
  CONSTRAINT `fk_cliberacao_cparticipante` FOREIGN KEY (`cod_participante`) REFERENCES `c_participante` (`cod_participante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "c_registro"
#

DROP TABLE IF EXISTS `c_registro`;
CREATE TABLE `c_registro` (
  `cod_registro` int(11) NOT NULL AUTO_INCREMENT,
  `numero_registro_livro` int(11) DEFAULT NULL,
  `cod_evento` int(11) DEFAULT NULL,
  `cod_participante` int(11) DEFAULT NULL,
  `cod_folha` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_registro`),
  KEY `fk_cregistro_cevento` (`cod_evento`),
  KEY `fk_cregistro_cfolha` (`cod_folha`),
  KEY `fk_cregistro_cparticipante` (`cod_participante`),
  CONSTRAINT `fk_cregistro_cevento` FOREIGN KEY (`cod_evento`) REFERENCES `c_evento` (`cod_evento`),
  CONSTRAINT `fk_cregistro_cfolha` FOREIGN KEY (`cod_folha`) REFERENCES `c_folha` (`cod_folha`),
  CONSTRAINT `fk_cregistro_cparticipante` FOREIGN KEY (`cod_participante`) REFERENCES `c_participante` (`cod_participante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "eventos1"
#

DROP TABLE IF EXISTS `eventos1`;
CREATE TABLE `eventos1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Livro` varchar(11) DEFAULT NULL,
  `Folha` varchar(11) DEFAULT NULL,
  `Registro` varchar(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `evento` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Structure for table "mostratec"
#

DROP TABLE IF EXISTS `mostratec`;
CREATE TABLE `mostratec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Folha` varchar(11) DEFAULT NULL,
  `Registro` varchar(11) DEFAULT NULL,
  `idProjeto` varchar(11) DEFAULT NULL,
  `estande` varchar(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pais.nome` varchar(255) DEFAULT NULL,
  `uf` varchar(100) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
