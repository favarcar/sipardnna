-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: sipardnna_new2
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `actuacion`
--

DROP TABLE IF EXISTS `actuacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actuacion` (
  `id_actuacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_expediente` int(11) NOT NULL,
  `fecha_actuacion` date NOT NULL,
  `funcionario_actuacion` varchar(100) NOT NULL,
  `descripcion_actuacion` varchar(500) NOT NULL,
  `compromisos` varchar(500) NOT NULL,
  PRIMARY KEY (`id_actuacion`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actuacion`
--

LOCK TABLES `actuacion` WRITE;
/*!40000 ALTER TABLE `actuacion` DISABLE KEYS */;
INSERT INTO `actuacion` VALUES (20,33,'2022-08-10','Psicologo','Requiere ayuda psicologica','Actuación urgente'),(21,0,'2022-08-10','Psicologo','Maltrato verbal','Requiere antencion urgente'),(22,0,'2022-08-10','Psicologo','Maltrato verbal','Ayuda psicologica'),(23,39,'2022-08-10','Psicologo','Maltrato verbal','Ayuda psicologica'),(24,40,'2022-06-10','Comisario','Violencia económica','Ayuda psicologica');
/*!40000 ALTER TABLE `actuacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuidadores`
--

DROP TABLE IF EXISTS `cuidadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuidadores` (
  `id_cuidadores` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_documento` varchar(4) DEFAULT NULL,
  `No_Cedula` int(11) NOT NULL,
  `Nombres_cuidadores` varchar(50) DEFAULT NULL,
  `Apellidos_cuidadores` varchar(50) DEFAULT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `Edad` int(3) DEFAULT NULL,
  `Direccion` varchar(30) DEFAULT NULL,
  `telefono_movil` varchar(30) DEFAULT NULL,
  `correo_electronico` varchar(100) DEFAULT NULL,
  `id_parentesco` int(3) DEFAULT NULL,
  `id_estado` int(3) DEFAULT NULL,
  `id_estrato` int(3) DEFAULT NULL,
  `id_etnia` int(3) DEFAULT NULL,
  `id_genero` varchar(1) DEFAULT NULL,
  `id_niveleducativo` int(3) DEFAULT NULL,
  `id_regimen` int(5) DEFAULT NULL,
  `id_eps` varchar(10) DEFAULT NULL,
  `id_departamento` varchar(255) DEFAULT NULL,
  `id_municipio` varchar(50) DEFAULT NULL,
  `id_provincia` int(5) DEFAULT NULL,
  `id_zona` varchar(3) DEFAULT NULL,
  `Puntaje_Sisben` varchar(255) DEFAULT NULL,
  `fecha_cuida` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_ninos` int(11) NOT NULL,
  `id_pais` varchar(255) DEFAULT NULL,
  UNIQUE KEY `id_cuidadores` (`id_cuidadores`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuidadores`
--

LOCK TABLES `cuidadores` WRITE;
/*!40000 ALTER TABLE `cuidadores` DISABLE KEYS */;
INSERT INTO `cuidadores` VALUES (26,'CC',1050559940,'CARLOS','PARRADO','1983-05-14',39,'carrera 12 n 20-79','3205679423','carlosprrr@gmail.com',1,3,2,1,'M',4,2,'EPSS16','15','15759',11,'U','C5','2022-06-23',42101110,26,'42'),(27,'CC',1057595048,'MARTHA','RIOS','1990-06-05',32,'carrera 12 n 20-30','3205688423','martaha7887@gmail.com',2,4,2,1,'F',3,2,'CCF007','15','15104',4,'R','C5','2022-06-28',42101110,27,'42'),(28,'CC',1151672567,'ANA','RIOS','1987-07-15',34,'carrera 12 n 20-30','3205679423','martaha7887@gmail.com',2,4,2,1,'F',5,2,'CCF007','15','15090',5,'R','A3','2022-06-29',42101110,28,'42'),(29,'CC',1057595959,'ROCIO','PEREZ','1985-07-10',36,'carrera 12 n 20-30','3205679423','rocio7887@gmail.com',2,1,3,1,'F',5,2,'CCF007','15','15131',8,'U','C5','2022-06-30',42101110,29,'42'),(30,'CC',490988967,'ELIANA','BARRERA ','1982-01-31',40,'CALLE 20 n 30 - 40','3205679423','eliana7887@gmail.com',2,1,2,1,'F',5,3,'CCFC07 ','15','15114',12,'U','C7','2022-06-30',42101110,30,'42'),(31,'CE',1151672,'CARLOS','MARTINEZ','1979-06-06',43,'carrera 12 n 20-30','3205679423','carlos@gmail.com',1,1,4,1,'M',5,3,'CCFC07 ','15','15180',7,'U','C30','2022-06-30',42101110,31,'42'),(32,'CC',46789987,'ROSDALBA','VELANDIA','1979-10-16',42,'carrera 12 n 20-30','3205679411','rosalba7@gmail.com',2,2,1,1,'F',3,2,'CCF007','15','15022',9,'R','A3','2022-07-01',42101110,32,'42');
/*!40000 ALTER TABLE `cuidadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamentos` (
  `id` varchar(7) NOT NULL DEFAULT '',
  `descripcion` varchar(50) DEFAULT NULL,
  `id_pais` int(3) DEFAULT NULL,
  UNIQUE KEY `id_provincia` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES ('5','ANTIOQUIA',42),('8','ATLANTICO',42),('11','BOGOTA',42),('13','BOLIVAR',42),('15','BOYACA',42),('17','CALDAS',42),('18','CAQUETA',42),('19','CAUCA',42),('20','CESAR',42),('23','CORDOBA',42),('25','CUNDINAMARCA',42),('27','CHOCO',42),('41','HUILA',42),('44','GUAJIRA',42),('47','MAGDALENA',42),('50','META',42),('52','NARIÑO',42),('54','NORTE SANTANDER',42),('63','QUINDIO',42),('66','RISARALDA',42),('68','SANTANDER',42),('70','SUCRE',42),('73','TOLIMA',42),('76','VALLE',42),('81','ARAUCA',42),('85','CASANARE',42),('86','PUTUMAYO',42),('88','SAN ANDRES',42),('91','AMAZONAS',42),('94','GUAINIA',42),('95','GUAVIARE',42),('97','VAUPES',42),('99','VICHADA',42),('0','N/A',0);
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `derechos`
--

DROP TABLE IF EXISTS `derechos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `derechos` (
  `id_derecho` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_derechos` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_derecho`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `derechos`
--

LOCK TABLES `derechos` WRITE;
/*!40000 ALTER TABLE `derechos` DISABLE KEYS */;
INSERT INTO `derechos` VALUES (1,'DERECHO A LA IDENTIDAD'),(2,'DERECHO A LA EDUCACIÓN'),(3,'DERECHO A LA INTEGRIDAD'),(4,'DERECHO A LA SALUD'),(5,'DERECHOS SEXUALES Y REPRODUCTIVOS'),(6,'DERECHO A LA IGUALDAD'),(7,'DERECHO A LA RECREACIÓN, PARTICIPACIÓN EN LA VIDA CULTURAL Y LAS ARTES'),(8,'DERECHO A LA PROTECCIÓN INTEGRAL (SRPA)'),(9,'DERECHO A LA PARTICIPACIÓN DE LOS NIÑOS, NIÑAS Y ADOLESCENTES'),(10,'DERECHO A LA VIDA Y A LA CALIDAD DE VIDA Y A UN AMBIENTE SANO'),(15,'DERECHO A LA REHABILITACIÓN Y LA RESOCIALIZACIÓN'),(16,'DERECHO A LA PROTECCIÓN'),(17,'DERECHO A LA LIBERTAD Y SEGURIDAD PERSONAL'),(18,'DERECHO A TENER UNA FAMILIA Y NO SER SEPARADO DE ELLA'),(19,'DERECHO A LA VIDA'),(20,'DERECHO A LA CUSTODIA Y CUIDADO PERSONAL'),(21,'DERECHO A LOS ALIMENTOS'),(22,'DERECHO A LA IDENTIDAD'),(23,'DERECHO AL DEBIDO PROCESO'),(24,'DERECHO AL DESARROLLO INTEGRAL EN LA PRIMERA INFANCIA'),(25,'DERECHO DE ASOCIACIÓN Y REUNIÓN'),(26,'DERECHO A LA INTIMIDAD'),(27,'DERECHO A LA INFORMACIÓN'),(28,'DERECHO A LA EDAD MÍNIMA DE ADMISIÓN AL TRABAJO Y DERECHO A LA PROTECCIÓN LABORAL DE LOS ADOLESCENTES AUTORIZADOS PARA TRABAJAR'),(29,'DERECHOS DE LOS NIÑOS, NIÑAS Y ADOLESCENTES CON DISCAPACIDAD'),(30,'DERECHO A LAS LIBERTADES FUNDAMENTALES'),(31,'DERECHO A LA NACIONALIDAD'),(32,'DERECHO A LA RECREACIÓN Y AL DEPORTE'),(33,'DERECHOS DE LA JUVENTUD'),(34,'DERECHO A UN AMBIENTE SANO'),(35,'DERECHO A VER TV'),(36,'DERECHO A LEER'),(37,'DERECHO A LEER'),(38,'DERECHO A LEER'),(39,'DERECHO A LEER'),(40,'DERECHO A LEER'),(41,'DERECHO A HACER MANUALIDADES');
/*!40000 ALTER TABLE `derechos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discapacidades`
--

DROP TABLE IF EXISTS `discapacidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discapacidades` (
  `id_discapacidad` int(11) NOT NULL DEFAULT 0,
  `descripcion_discapacidades` varchar(40) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discapacidades`
--

LOCK TABLES `discapacidades` WRITE;
/*!40000 ALTER TABLE `discapacidades` DISABLE KEYS */;
INSERT INTO `discapacidades` VALUES (1,'DISCAPACIDAD FÍSICA'),(2,'DISCAPACIDAD AUDITIVA'),(3,'DISCAPACIDAD VISUAL'),(4,'DISCAPACIDAD INTELECTUAL'),(5,'DISCAPACIDAD PSICOSOCIAL(MENTAL)'),(6,'DISCAPACIDAD MÚLTIPLE'),(7,'DISCAPACIDAD VISCERAL'),(8,'SORDOCEGUERA'),(9,'NINGUNA');
/*!40000 ALTER TABLE `discapacidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entidades`
--

DROP TABLE IF EXISTS `entidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entidades` (
  `id_entidad` int(11) NOT NULL,
  `descripcion_entidades` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entidades`
--

LOCK TABLES `entidades` WRITE;
/*!40000 ALTER TABLE `entidades` DISABLE KEYS */;
INSERT INTO `entidades` VALUES (1,'PRIMERA INFANCIA'),(2,'GOBERNACION DE BOYACA'),(3,'INDEPORTES'),(4,'SENA'),(5,'ADMINISTRACION MUNICIPAL'),(6,'COMISARIA DE FAMILLIA'),(7,'ESE MUNICIPAL'),(8,'ICBF'),(9,'PROCURADURIA');
/*!40000 ALTER TABLE `entidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eps`
--

DROP TABLE IF EXISTS `eps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eps` (
  `id_eps` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `descripcion` varchar(150) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `id_regimen` int(11) DEFAULT NULL,
  `regimen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_eps`),
  UNIQUE KEY `codigo` (`id_eps`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eps`
--

LOCK TABLES `eps` WRITE;
/*!40000 ALTER TABLE `eps` DISABLE KEYS */;
INSERT INTO `eps` VALUES ('CCF007','CAJA DE COMPENSACIÓN FAMILIAR DE CARTAGENA Y BOLÍVAR COMFAMILIAR',2,'SUBSIDIADO'),('CCF023','CAJA DE COMPENSACIÓN FAMILIAR DE LA GUAJIRA \"COMFAGUAJIRA\"',2,'SUBSIDIADO'),('CCF024','CAJA DE COMPENSACIÓN FAMILIAR DEL HUILA \"COMFAMILIAR\"',2,'SUBSIDIADO'),('CCF027','CAJA DE COMPENSACIÓN FAMILIAR DE NARIÑO',2,'SUBSIDIADO'),('CCF033','CAJA DE COMPENSACIÓN FAMILIAR DE SUCRE',2,'SUBSIDIADO'),('CCF050','CAJA DE COMPENSACIÓN FAMILIAR DEL ORIENTE COLOMBIANO \"COMFAORIENTE\"',2,'SUBSIDIADO'),('CCF053','CAJA DE COMPENSACIÓN FAMILIAR DE CUNDINAMARCA \"COMFACUNDI\"',2,'SUBSIDIADO'),('CCF055','CAJA DE COMPENSACIÓN FAMILIAR CAJACOPI ATLÁNTICO',2,'SUBSIDIADO'),('CCF102','CAJA DE COMPENSACIÓN FAMILIAR DEL CHOCÓ',2,'SUBSIDIADO'),('CCFC07 ','CAJA DE COMPENSACIÓN FAMILIAR DE CARTAGENA Y BOLÍVAR COMFAMILIAR -CM',3,'CONTRIBUTIVO'),('CCFC20','CAJA DE COMPENSACIÓN FAMILIAR DEL CHOCÓ -CM',3,'CONTRIBUTIVO'),('CCFC23','CAJA DE COMPENSACIÓN FAMILIAR DE LA GUAJIRA \"COMFAGUAJIRA\" -CM',3,'CONTRIBUTIVO'),('CCFC24','CAJA DE COMPENSACIÓN FAMILIAR DEL HUILA \"COMFAMILIAR\" -CM',3,'CONTRIBUTIVO'),('CCFC27','CAJA DE COMPENSACIÓN FAMILIAR DE NARIÑO -CM',3,'CONTRIBUTIVO'),('CCFC33','CAJA DE COMPENSACIÓN FAMILIAR DE SUCRE -CM',3,'CONTRIBUTIVO'),('CCFC50 ','CAJA DE COMPENSACIÓN FAMILIAR DEL ORIENTE COLOMBIANO \"COMFAORIENTE\" -CM',3,'CONTRIBUTIVO'),('CCFC53','CAJA DE COMPENSACIÓN FAMILIAR DE CUNDINAMARCA \"COMFACUNDI\" -CM',3,'CONTRIBUTIVO'),('CCFC55','CAJA DE COMPENSACIÓN FAMILIAR CAJACOPI ATLÁNTICO -CM',3,'CONTRIBUTIVO'),('EAS016','EMPRESAS PUBLICAS DE MEDELLIN - DEPARTAMENTO MEDICO',3,'CONTRIBUTIVO'),('EAS027','FONDO PASIVO SOCIAL DE LOS FERROCARRILES NACIONALES',3,'CONTRIBUTIVO'),('EMP002','MEDPLUS MEDICINA PREPAGADA S.A.',5,'COMPLEMENTARIO'),('EMP012','HUMANA GOLDEN CROSS S.A. MEDICINA PREPAGADA',5,'COMPLEMENTARIO'),('EMP014','MEDISALUD - COMPAÑÍA COLOMBIANA DE MEDICINA PREPAGADA S.A. (en liquidación)',5,'COMPLEMENTARIO'),('EMP015','MEDISANITAS S A COMPAÑIA DE MEDICINA PREPAGADA',5,'COMPLEMENTARIO'),('EMP017','COLMEDICA MEDICINA PREPAGADA',5,'COMPLEMENTARIO'),('EMP021','EPS Y MEDICINA PREPAGADA SURAMERICANA S.A.',5,'COMPLEMENTARIO'),('EMP022','VIVIR S.A.',5,'COMPLEMENTARIO'),('EMP023','COMPAÑIA DE MEDICINA PREPAGADA COLSANITAS S.A.',5,'COMPLEMENTARIO'),('EMP024','SERVICIO DE SALUD INMEDIATO MEDICINA PREPAGADA S.A.',5,'COMPLEMENTARIO'),('EMP025','PLAN U.H.C.M. MEDICINA PREPAGADA COMFENALCO VALLE',5,'COMPLEMENTARIO'),('EMP028','COOMEVA MEDICINA PREPAGADA S.A.',5,'COMPLEMENTARIO'),('EMP029','COLPATRIA MEDICINA PREPAGADA S.A.',5,'COMPLEMENTARIO'),('EPS001','ALIANSALUD EPS S.A.',3,'CONTRIBUTIVO'),('EPS002 ','SALUD TOTAL ENTIDAD PROMOTORA DE SALUD DEL REGIMEN CONTRIBUTIVO Y DEL REGIMEN SUBSIDIADO S.A.',3,'CONTRIBUTIVO'),('EPS005 ','ENTIDAD PROMOTORA DE SALUD SANITAS S.A.S.',3,'CONTRIBUTIVO'),('EPS008','CAJA DE COMPENSACIÓN FAMILIAR COMPENSAR',3,'CONTRIBUTIVO'),('EPS010','EPS SURAMERICANA S.A.',3,'CONTRIBUTIVO'),('EPS012 ','CAJA DE COMPENSACION FAMILIAR DEL VALLE DEL CAUCA \"COMFENALCO VALLE DE LA GENTE\"',3,'CONTRIBUTIVO'),('EPS016','COOMEVA ENTIDAD PROMOTORA DE SALUD S.A. \"COOMEVA E.P.S. S.A.\"',3,'CONTRIBUTIVO'),('EPS017','EPS FAMISANAR S.A.S.',3,'CONTRIBUTIVO'),('EPS018 ','ENTIDAD PROMOTORA DE SALUD SERVICIO OCCIDENTAL DE SALUD S.A. S.O.S.',3,'CONTRIBUTIVO'),('EPS022','ENTIDAD PROMOTORA DE SALUD DEL REGIMEN SUBSIDIADO EPS CONVIDA',2,'SUBSIDIADO'),('EPS023','CRUZ BLANCA EPS',5,'COMPLEMENTARIO'),('EPS025','CAPRESOCA E.P.S.',2,'SUBSIDIADO'),('EPS037','NUEVA EPS S.A.',3,'CONTRIBUTIVO'),('EPS040','ALIANZA MEDELLIN ANTIOQUIA EPS S.A.S. \"SAVIA SALUD EPS\" -CM',3,'CONTRIBUTIVO'),('EPS041','NUEVA EPS S.A. -CM',3,'CONTRIBUTIVO'),('EPS042','COOSALUD EPS S.A.',3,'CONTRIBUTIVO'),('EPS044','MEDIMAS EPS S.A.S.',3,'CONTRIBUTIVO'),('EPS045','MEDIMAS EPS S.A.S. -CM',3,'CONTRIBUTIVO'),('EPS046','FUDACIÓN SALUD MIA',3,'CONTRIBUTIVO'),('EPS048 ','ASOCIACION MUTUAL SER EMPRESA SOLIDARIA DE SALUD ENTIDAD PROMOTORA DE SALUD - MUTUAL SER EPS',3,'CONTRIBUTIVO'),('EPSC22 ','ENTIDAD PROMOTORA DE SALUD DEL REGIMEN SUBSIDIADO EPS CONVIDA -CM',3,'CONTRIBUTIVO'),('EPSC25','CAPRESOCA E.P.S. -CM',3,'CONTRIBUTIVO'),('EPSC34 ','CAPITAL SALUD ENTIDAD PROMOTORA DE SALUD DEL RÉGIMEN SUBSIDIADO SAS \"CAPITAL SALUD EPS-S S.A.S.\" -CM',3,'CONTRIBUTIVO'),('EPSI01','ASOCIACIÓN DE CABILDOS INDÍGENAS DEL CESAR Y GUAJIRA \"DUSAKAWI A.R.S.I.\"',2,'SUBSIDIADO'),('EPSI03','ASOCIACIÓN INDÍGENA DEL CAUCA A.I.C. EPSI',2,'SUBSIDIADO'),('EPSI04','EMPRESA PROMOTORA DE SALUD INDÍGENA ANAS WAYUU EPSI',2,'SUBSIDIADO'),('EPSI05','ENTIDAD PROMOTORA DE SALUD MALLAMAS EPSI',2,'SUBSIDIADO'),('EPSI06','PIJAOS SALUD EPSI',2,'SUBSIDIADO'),('EPSIC1 ','ASOCIACIÓN DE CABILDOS INDÍGENAS DEL CESAR Y GUAJIRA \"DUSAKAWI A.R.S.I.\" -CM',3,'CONTRIBUTIVO'),('EPSIC3','ASOCIACIÓN INDÍGENA DEL CAUCA A.I.C. EPSI -CM',3,'CONTRIBUTIVO'),('EPSIC4','EMPRESA PROMOTORA DE SALUD INDÍGENA ANAS WAYUU EPSI -CM',3,'CONTRIBUTIVO'),('EPSIC5','ENTIDAD PROMOTORA DE SALUD MALLAMAS EPSI -CM',3,'CONTRIBUTIVO'),('EPSIC6','PIJAOS SALUD EPSI -CM',3,'CONTRIBUTIVO'),('EPSS01','ALIANSALUD EPS S.A. -CM',2,'SUBSIDIADO'),('EPSS02','SALUD TOTAL ENTIDAD PROMOTORA DE SALUD DEL REGIMEN CONTRIBUTIVO Y DEL REGIMEN SUBSIDIADO S.A. -CM',2,'SUBSIDIADO'),('EPSS05','ENTIDAD PROMOTORA DE SALUD SANITAS S.A.S. -CM',2,'SUBSIDIADO'),('EPSS08','CAJA DE COMPENSACIÓN FAMILIAR COMPENSAR -CM',2,'SUBSIDIADO'),('EPSS10','EPS SURAMERICANA S.A. -CM',2,'SUBSIDIADO'),('EPSS12','CAJA DE COMPENSACION FAMILIAR DEL VALLE DEL CAUCA \"COMFENALCO VALLE DE LA GENTE\" -CM',2,'SUBSIDIADO'),('EPSS16','COOMEVA ENTIDAD PROMOTORA DE SALUD S.A. \"COOMEVA E.P.S. S.A.\" -CM',2,'SUBSIDIADO'),('EPSS17','EPS FAMISANAR S.A.S. -CM',2,'SUBSIDIADO'),('EPSS18','ENTIDAD PROMOTORA DE SALUD SERVICIO OCCIDENTAL DE SALUD S.A. S.O.S. -CM',2,'SUBSIDIADO'),('EPSS34','CAPITAL SALUD ENTIDAD PROMOTORA DE SALUD DEL RÉGIMEN SUBSIDIADO SAS \"CAPITAL SALUD EPS-S S.A.S.\"',2,'SUBSIDIADO'),('EPSS37','NUEVA EPS S.A. -CM',2,'SUBSIDIADO'),('EPSS40','ALIANZA MEDELLIN ANTIOQUIA EPS S.A.S. \"SAVIA SALUD EPS\"',2,'SUBSIDIADO'),('EPSS41','NUEVA EPS S.A.',2,'SUBSIDIADO'),('EPSS42','COOSALUD EPS S.A. -CM',2,'SUBSIDIADO'),('EPSS44','MEDIMAS EPS S.A.S. -CM',2,'SUBSIDIADO'),('EPSS45','MEDIMAS EPS S.A.S.',2,'SUBSIDIADO'),('EPSS46','FUDACIÓN SALUD MIA -CM',2,'SUBSIDIADO'),('EPSS48','ASOCIACION MUTUAL SER EMPRESA SOLIDARIA DE SALUD ENTIDAD PROMOTORA DE SALUD - MUTUAL SER EPS -CM',2,'SUBSIDIADO'),('ESS024','COOSALUD EPS S.A.',2,'SUBSIDIADO'),('ESS062','ASMET SALUD EPS S.A.S.',2,'SUBSIDIADO'),('ESS076','ASOCIACIÓN MUTUAL BARRIOS UNIDOS DE QUIBDO AMBUQ EPS - S - ESS',2,'SUBSIDIADO'),('ESS091','ECOOPSOS EPS SAS',2,'SUBSIDIADO'),('ESS118','EMSSANAR S.A.S.',2,'SUBSIDIADO'),('ESS133','COOPERATIVA DE SALUD COMUNITARIA EMPRESA PROMOTORA SUBSIDIADA COMPARTA EPS-S',2,'SUBSIDIADO'),('ESS207 ','ASOCIACION MUTUAL SER EMPRESA SOLIDARIA DE SALUD ENTIDAD PROMOTORA DE SALUD - MUTUAL SER EPS',2,'SUBSIDIADO'),('ESSC07 ','ASOCIACION MUTUAL SER EMPRESA SOLIDARIA DE SALUD ENTIDAD PROMOTORA DE SALUD - MUTUAL SER EPS -CM',3,'CONTRIBUTIVO'),('ESSC18','EMSSANAR S.A.S. -CM',3,'CONTRIBUTIVO'),('ESSC24','COOSALUD EPS S.A. -CM',3,'CONTRIBUTIVO'),('ESSC33 ','COOPERATIVA DE SALUD COMUNITARIA EMPRESA PROMOTORA SUBSIDIADA \"COMPARTA EPS-S\" -CM',3,'CONTRIBUTIVO'),('ESSC62','ASMET  SALUD EPS S.A.S. -CM',3,'CONTRIBUTIVO'),('ESSC76 ','ASOCIACIÓN MUTUAL BARRIOS UNIDOS DE QUIBDO AMBUQ EPS - S - ESS CM',3,'CONTRIBUTIVO'),('ESSC91','ECOOPSOS EPS SAS -CM',3,'CONTRIBUTIVO'),('FMS001','FUERZAS MILITARES',4,'ESPECIAL'),('NOAF','NO AFILIADO/ASEGURADO',1,'NO AFILIADO/ASEGURADO'),('POL001','POLICIA NACIONAL',4,'ESPECIAL'),('RES002','ECOPETROL',4,'ESPECIAL'),('RES004','MAGISTERIO',4,'ESPECIAL'),('RES005','UNIVERSIDAD DEL ATLANTICO',4,'ESPECIAL'),('RES006','UNIVERSIDAD INDUSTRIAL DE SANTANDER',4,'ESPECIAL'),('RES007','UNIVERSIDAD DEL VALLE',4,'ESPECIAL'),('RES008','UNIVERSIDAD NACIONAL DE COLOMBIA',4,'ESPECIAL'),('RES009','UNIVERSIDAD DEL CAUCA',4,'ESPECIAL'),('RES010','UNIVERSIDAD DE CARTAGENA',4,'ESPECIAL'),('RES011','UNIVERSIDAD DE ANTIOQUIA',4,'ESPECIAL'),('RES012','UNIVERSIDAD DE CORDOBA',4,'ESPECIAL'),('RES013','UNIVERSIDAD DE NARIÑO',4,'ESPECIAL'),('RES014','UNIVERSIDAD PEDAGOGICA Y TECNOLOGICA DE COLOMBIA - UPTC',4,'ESPECIAL'),('SAP008','EMERGENCIA MEDICA INTEGRAL COLOMBIA S.A.',5,'COMPLEMENTARIO'),('SAP026','EMERMEDICA S.A. SERVICIOS DE AMBULANCIA PREPAGADOS',5,'COMPLEMENTARIO'),('SAP030','EMPRESA DE MEDICINA INTEGRAL EMI SA SERVICIO DE AMBULANCIA PREPAGADA',5,'COMPLEMENTARIO'),('SAP031','ASISTENCIA MEDICA INMEDIATA-SERVICIO DE AMBULANCIA PREPAGADA S.A.',5,'COMPLEMENTARIO'),('SAP032','SERVICIO DE EMERGENCIAS REGIONAL (SERVICIO DE AMBULANCIA PREPAGADO) S.A.',5,'COMPLEMENTARIO'),('SAP033','COOMEVA EMERGENCIAS MÉDICAS',5,'COMPLEMENTARIO'),('SAP034','ASISTENCIA MEDICA SAS SERVICIO DE AMBULANCIA PREPAGADO',5,'COMPLEMENTARIO'),('SAP035','SERVICIO DE ASISTENCIA MEDICA INMEDIATA S.A. - SERVICIO DE AMBULANCIA PREPAGADO',5,'COMPLEMENTARIO'),('SAP036','SISTEMA DE TRASLADO APOYO DIAGNOSTICO Y TERAPEUTICO EN SALUD TRASMEDICA S.A. S.A.P. EN LIQUIDACION',5,'COMPLEMENTARIO'),('SAP037','SERVICIOS MEDICOS INTEGRALES DE COLOMBIA SERVICIO DE\nAMBULANCIAS PREPAGADO S.A.S “SEMI SAP S.A.S.”',5,'COMPLEMENTARIO'),('SAP038','RED MEDICA MÉDICA VITAL S.A.S. SERVICIO DE AMBULANCIA PREPAGADO (SAP)',5,'COMPLEMENTARIO');
/*!40000 ALTER TABLE `eps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_caso`
--

DROP TABLE IF EXISTS `estado_caso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_caso` (
  `id_estadocaso` int(1) NOT NULL AUTO_INCREMENT,
  `descripcion_estado_caso` varchar(12) NOT NULL,
  PRIMARY KEY (`id_estadocaso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_caso`
--

LOCK TABLES `estado_caso` WRITE;
/*!40000 ALTER TABLE `estado_caso` DISABLE KEYS */;
INSERT INTO `estado_caso` VALUES (1,'Pendiente'),(2,'Resuelto'),(3,'Activo');
/*!40000 ALTER TABLE `estado_caso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados_civiles`
--

DROP TABLE IF EXISTS `estados_civiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados_civiles` (
  `id_estado` int(11) NOT NULL,
  `descripcion` varchar(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados_civiles`
--

LOCK TABLES `estados_civiles` WRITE;
/*!40000 ALTER TABLE `estados_civiles` DISABLE KEYS */;
INSERT INTO `estados_civiles` VALUES (1,'SOLTERO(A)'),(2,'CASADO(A)'),(3,'UNION LIBRE'),(4,'SEPARADO(A)'),(5,'VIUDO(A)');
/*!40000 ALTER TABLE `estados_civiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estratos`
--

DROP TABLE IF EXISTS `estratos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estratos` (
  `id_estrato` int(11) NOT NULL,
  `descripcion` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estratos`
--

LOCK TABLES `estratos` WRITE;
/*!40000 ALTER TABLE `estratos` DISABLE KEYS */;
INSERT INTO `estratos` VALUES (1,'ESTRATO 1'),(2,'ESTRATO 2'),(3,'ESTRATO 3'),(4,'ESTRATO 4'),(5,'ESTRATO 5'),(6,'ESTRATO 6');
/*!40000 ALTER TABLE `estratos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etnias`
--

DROP TABLE IF EXISTS `etnias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etnias` (
  `id_etnia` int(11) NOT NULL,
  `descripcion` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etnias`
--

LOCK TABLES `etnias` WRITE;
/*!40000 ALTER TABLE `etnias` DISABLE KEYS */;
INSERT INTO `etnias` VALUES (1,'NINGUNA'),(2,'AFROCOLOMBIANO'),(3,'COMUNIDAD INDÍGENA U\'WA'),(4,'COMUNIDAD INDÍGENA EMBERA CHAMI'),(5,'COMUNIDAD INDÍGENA EMBERA KATIO'),(6,'COMUNIDAD MUSICAL CHIBCHA'),(7,'INDÍGENA OTRA COMUNIDAD'),(8,'RAIZAL'),(9,'PALENQUERO'),(10,'RROM'),(11,'NEGRO'),(12,'OTRA');
/*!40000 ALTER TABLE `etnias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expediente`
--

DROP TABLE IF EXISTS `expediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expediente` (
  `codigo_expediente` int(11) NOT NULL AUTO_INCREMENT,
  `NUMERO_PROCESO` varchar(50) NOT NULL,
  `Fecha_inicio_expediente` date DEFAULT NULL,
  `id_ninnos` int(11) NOT NULL,
  `id_cuidadores` int(11) NOT NULL,
  `id_discapacidad` int(3) DEFAULT NULL,
  `id_indicador` int(3) DEFAULT NULL,
  `id_maltrato` int(3) DEFAULT NULL,
  `id_victima` int(3) DEFAULT NULL,
  `Descripcion_expediente` varchar(500) DEFAULT NULL,
  `id_derecho` varchar(7) DEFAULT NULL,
  `Observacion` varchar(200) DEFAULT NULL,
  `Veredicto_Caso` varchar(200) DEFAULT NULL,
  `Fecha_finalizacion_expediente` date DEFAULT NULL,
  `id_entidad` varchar(7) DEFAULT NULL,
  `id_usuario_exp` int(11) NOT NULL,
  `id_estadocaso` int(1) NOT NULL,
  `fecha_limite` date NOT NULL,
  UNIQUE KEY `codigo_expediente` (`codigo_expediente`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expediente`
--

LOCK TABLES `expediente` WRITE;
/*!40000 ALTER TABLE `expediente` DISABLE KEYS */;
INSERT INTO `expediente` VALUES (31,'567','2022-06-28',27,27,9,0,1,2,'Maltrato','10','SEMAFORO VERDE','Requiere PARD','2022-08-10','1',42101110,1,'2022-12-25'),(32,'','2022-06-28',26,26,9,1,1,1,'Violencia intrafamiliar','1','Violencia intrafamiliar','Violencia intrafamiliar','2022-06-21','1',42101110,1,'2022-10-26'),(33,'345678','2022-06-30',29,29,9,1,2,1,'Vive sola en un apartamento sin cuidador','8','Necesita terapia psicologica','Requiere PARD','2022-12-20','8',42101110,1,'2022-12-27'),(34,'','0000-00-00',0,0,0,0,0,0,'','','','','0000-00-00','',42101110,0,'2022-12-27'),(35,'','0000-00-00',0,0,0,0,0,0,'','','','','0000-00-00','',42101110,0,'2022-12-27'),(36,'','0000-00-00',0,0,0,0,0,0,'','','','','0000-00-00','',42101110,0,'2022-12-27'),(37,'','0000-00-00',0,0,0,0,0,0,'','','','','0000-00-00','',42101110,0,'2022-12-27'),(38,'','0000-00-00',0,0,0,0,0,0,'','','','','0000-00-00','',42101110,0,'2022-12-27'),(39,'456789','2022-06-30',31,31,9,0,2,1,'Maltrato verbal','2','Maltrato verbal','Requiere PARD','2022-06-09','8',42101110,1,'2022-12-27'),(40,'3456789','2022-06-30',30,30,9,0,2,1,'Violencia económica','19','Violencia económica','Requiere PARD','2022-12-20','8',42101110,1,'2022-12-27');
/*!40000 ALTER TABLE `expediente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generos`
--

DROP TABLE IF EXISTS `generos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `generos` (
  `id_genero` varchar(1) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generos`
--

LOCK TABLES `generos` WRITE;
/*!40000 ALTER TABLE `generos` DISABLE KEYS */;
INSERT INTO `generos` VALUES ('F','FEMENINO'),('M','MASCULINO'),('L','INTERSEXADO(A)');
/*!40000 ALTER TABLE `generos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gestacion`
--

DROP TABLE IF EXISTS `gestacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gestacion` (
  `id_gestacion` int(11) NOT NULL AUTO_INCREMENT,
  `Nombres de la Madre` varchar(50) DEFAULT NULL,
  `Apellidos de la Madre` varchar(50) DEFAULT NULL,
  `Â¿Asiste a Controles Prenatales Si/No?` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_gestacion`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gestacion`
--

LOCK TABLES `gestacion` WRITE;
/*!40000 ALTER TABLE `gestacion` DISABLE KEYS */;
INSERT INTO `gestacion` VALUES (1,'MARIA CAMILA','TORRES GIL','Si'),(2,'SANDRA MILENA','VARGAS ROA','Si'),(3,'ANGELA NATALIA','PORRAS MORA','Si'),(4,'MONICA ANDREA','VALENCIA','Si');
/*!40000 ALTER TABLE `gestacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicadores`
--

DROP TABLE IF EXISTS `indicadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicadores` (
  `id_indicador` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_indicadores` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_indicador`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicadores`
--

LOCK TABLES `indicadores` WRITE;
/*!40000 ALTER TABLE `indicadores` DISABLE KEYS */;
INSERT INTO `indicadores` VALUES (1,'El niño, niña o adolescente inicia el proceso de restablecimiento de derechos'),(2,'El niño, niña o adolescente fue victima del conflicto armado'),(3,'El niño, niña o adolescente fue victima de violencia intrafamiliar'),(4,'El niño, niña o adolescente tiene alguna discapacidad'),(5,'El niño, niña o adolescente es huérfano'),(6,'El niño, niña o adolescente se encuentra en estado de desnutrición severa'),(7,'El niño, niña o adolescente en este momento está desaparecido'),(8,'La custodia del niño la tienen los cuidadores que figuran como adultos responsables'),(9,'Ninguno');
/*!40000 ALTER TABLE `indicadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicadores_expedientes`
--

DROP TABLE IF EXISTS `indicadores_expedientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicadores_expedientes` (
  `id_indi_exp` int(11) NOT NULL AUTO_INCREMENT,
  `id_indicador` int(11) NOT NULL,
  `id_exp` int(11) NOT NULL,
  PRIMARY KEY (`id_indi_exp`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicadores_expedientes`
--

LOCK TABLES `indicadores_expedientes` WRITE;
/*!40000 ALTER TABLE `indicadores_expedientes` DISABLE KEYS */;
INSERT INTO `indicadores_expedientes` VALUES (13,4,7),(14,1,7),(15,5,7),(16,6,8),(17,4,8),(18,3,9),(19,5,9),(26,4,13),(27,3,14),(28,7,15),(29,2,15),(30,3,16),(31,5,17),(32,1,18),(33,3,18),(34,6,19),(35,8,20),(36,2,21),(37,8,22),(38,2,23),(39,5,24),(40,8,27),(41,1,28),(42,3,29),(43,7,30),(44,3,31),(45,8,33),(46,4,0),(47,5,0),(48,3,0),(49,1,39),(50,9,40);
/*!40000 ALTER TABLE `indicadores_expedientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logins`
--

DROP TABLE IF EXISTS `logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logins` (
  `consecutivo` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`consecutivo`)
) ENGINE=MyISAM AUTO_INCREMENT=546 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logins`
--

LOCK TABLES `logins` WRITE;
/*!40000 ALTER TABLE `logins` DISABLE KEYS */;
INSERT INTO `logins` VALUES (451,12,'2021-09-13 05:00:00','22:09:09'),(452,168,'2021-09-13 05:00:00','22:09:09'),(453,1,'2022-06-22 05:00:00','16:06:06'),(454,2,'2022-06-22 05:00:00','16:06:06'),(455,137,'2022-06-22 05:00:00','16:06:06'),(456,6,'2022-06-22 05:00:00','17:06:06'),(457,2,'2022-06-22 05:00:00','17:06:06'),(458,171,'2022-06-22 05:00:00','17:06:06'),(459,2,'2022-06-22 05:00:00','17:06:06'),(460,171,'2022-06-22 05:00:00','17:06:06'),(461,2,'2022-06-22 05:00:00','17:06:06'),(462,4,'2022-06-22 05:00:00','17:06:06'),(463,5,'2022-06-22 05:00:00','17:06:06'),(464,1,'2022-06-22 05:00:00','17:06:06'),(465,6,'2022-06-22 05:00:00','17:06:06'),(466,172,'2022-06-22 05:00:00','17:06:06'),(467,132,'2022-06-22 05:00:00','17:06:06'),(468,133,'2022-06-22 05:00:00','17:06:06'),(469,6,'2022-06-22 05:00:00','17:06:06'),(470,137,'2022-06-23 05:00:00','09:06:06'),(471,133,'2022-06-23 05:00:00','10:06:06'),(472,6,'2022-06-23 05:00:00','14:06:06'),(473,171,'2022-06-23 05:00:00','14:06:06'),(474,1,'2022-06-23 05:00:00','14:06:06'),(475,6,'2022-06-23 05:00:00','14:06:06'),(476,2,'2022-06-23 05:00:00','14:06:06'),(477,2,'2022-06-23 05:00:00','14:06:06'),(478,171,'2022-06-23 05:00:00','14:06:06'),(479,171,'2022-06-23 05:00:00','14:06:06'),(480,171,'2022-06-23 05:00:00','14:06:06'),(481,2,'2022-06-23 05:00:00','15:06:06'),(482,1,'2022-06-23 05:00:00','15:06:06'),(483,1,'2022-06-23 05:00:00','15:06:06'),(484,2,'2022-06-23 05:00:00','15:06:06'),(485,2,'2022-06-23 05:00:00','15:06:06'),(486,1,'2022-06-23 05:00:00','15:06:06'),(487,171,'2022-06-23 05:00:00','15:06:06'),(488,171,'2022-06-23 05:00:00','15:06:06'),(489,1,'2022-06-23 05:00:00','15:06:06'),(490,132,'2022-06-23 05:00:00','15:06:06'),(491,133,'2022-06-23 05:00:00','15:06:06'),(492,172,'2022-06-23 05:00:00','15:06:06'),(493,5,'2022-06-23 05:00:00','15:06:06'),(494,6,'2022-06-23 05:00:00','15:06:06'),(495,6,'2022-06-23 05:00:00','15:06:06'),(496,2,'2022-06-23 05:00:00','15:06:06'),(497,171,'2022-06-23 05:00:00','15:06:06'),(498,1,'2022-06-23 05:00:00','15:06:06'),(499,2,'2022-06-23 05:00:00','15:06:06'),(500,2,'2022-06-23 05:00:00','15:06:06'),(501,171,'2022-06-23 05:00:00','15:06:06'),(502,171,'2022-06-23 05:00:00','16:06:06'),(503,1,'2022-06-23 05:00:00','16:06:06'),(504,171,'2022-06-23 05:00:00','17:06:06'),(505,1,'2022-06-23 05:00:00','17:06:06'),(506,171,'2022-06-23 05:00:00','17:06:06'),(507,1,'2022-06-23 05:00:00','17:06:06'),(508,1,'2022-06-23 05:00:00','17:06:06'),(509,1,'2022-06-24 05:00:00','08:06:06'),(510,2,'2022-06-25 05:00:00','11:06:06'),(511,6,'2022-06-25 05:00:00','11:06:06'),(512,137,'2022-06-25 05:00:00','11:06:06'),(513,6,'2022-06-25 05:00:00','11:06:06'),(514,2,'2022-06-25 05:00:00','11:06:06'),(515,137,'2022-06-25 05:00:00','11:06:06'),(516,6,'2022-06-25 05:00:00','12:06:06'),(517,6,'2022-06-25 05:00:00','12:06:06'),(518,6,'2022-06-28 05:00:00','08:06:06'),(519,132,'2022-06-28 05:00:00','09:06:06'),(520,133,'2022-06-28 05:00:00','09:06:06'),(521,4,'2022-06-28 05:00:00','09:06:06'),(522,133,'2022-06-28 05:00:00','10:06:06'),(523,5,'2022-06-28 05:00:00','10:06:06'),(524,5,'2022-06-28 05:00:00','10:06:06'),(525,6,'2022-06-28 05:00:00','10:06:06'),(526,6,'2022-06-28 05:00:00','11:06:06'),(527,6,'2022-06-29 05:00:00','08:06:06'),(528,1,'2022-06-29 05:00:00','14:06:06'),(529,6,'2022-06-29 05:00:00','14:06:06'),(530,171,'2022-06-29 05:00:00','17:06:06'),(531,6,'2022-06-29 05:00:00','17:06:06'),(532,6,'2022-06-29 05:00:00','18:06:06'),(533,6,'2022-06-30 05:00:00','08:06:06'),(534,6,'2022-06-30 05:00:00','15:06:06'),(535,6,'2022-06-30 05:00:00','15:06:06'),(536,6,'2022-07-01 05:00:00','08:07:07'),(537,171,'2022-07-01 05:00:00','08:07:07'),(538,6,'2022-07-01 05:00:00','09:07:07'),(539,6,'2022-07-01 05:00:00','11:07:07'),(540,6,'2022-07-01 05:00:00','12:07:07'),(541,171,'2022-07-01 05:00:00','12:07:07'),(542,6,'2022-07-01 05:00:00','12:07:07'),(543,6,'2022-07-02 05:00:00','08:07:07'),(544,6,'2022-07-02 05:00:00','08:07:07'),(545,6,'2022-07-02 05:00:00','12:07:07');
/*!40000 ALTER TABLE `logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lugar_hechos`
--

DROP TABLE IF EXISTS `lugar_hechos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lugar_hechos` (
  `ID_LUGAR` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_lugar` varchar(6) NOT NULL,
  `desc_lugar` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_LUGAR`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lugar_hechos`
--

LOCK TABLES `lugar_hechos` WRITE;
/*!40000 ALTER TABLE `lugar_hechos` DISABLE KEYS */;
INSERT INTO `lugar_hechos` VALUES (3,'VIAPUB','VIA PÚBLICA'),(4,'CASUHO','CASA U HOGAR'),(5,'OTRO','OTRO');
/*!40000 ALTER TABLE `lugar_hechos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maltratos`
--

DROP TABLE IF EXISTS `maltratos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maltratos` (
  `id_maltrato` int(11) NOT NULL,
  `descripcion_maltratos` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maltratos`
--

LOCK TABLES `maltratos` WRITE;
/*!40000 ALTER TABLE `maltratos` DISABLE KEYS */;
INSERT INTO `maltratos` VALUES (1,'MALTRATO FISICO'),(2,'MALTRATO EMOCIONAL'),(3,'MALTRATO PSICOLOGICO'),(4,'NIÃ‘O(A) ENFLAQUECIDO'),(5,'NIÃ‘O(A) MUY ENFLAQUECIDO'),(6,'NEGLIGENCIA'),(7,'MALTRATO SOCIAL'),(8,'MALTRATO INSTITUCIONAL'),(9,'ABUSO SEXUAL'),(10,'OTRO TIPO DE MALTRATO');
/*!40000 ALTER TABLE `maltratos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `motivoingreso`
--

DROP TABLE IF EXISTS `motivoingreso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `motivoingreso` (
  `id_motivo_ingreso` varchar(6) NOT NULL,
  `desc_motivo_ingreso` varchar(100) NOT NULL,
  PRIMARY KEY (`id_motivo_ingreso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motivoingreso`
--

LOCK TABLES `motivoingreso` WRITE;
/*!40000 ALTER TABLE `motivoingreso` DISABLE KEYS */;
INSERT INTO `motivoingreso` VALUES ('MI-01','Abandono con o sin situacion de discapacidad'),('MI-05','Situación de amenaza de integridad'),('MI-10','Competencia declaratoria adoptabilidad'),('MI-11','Consentimiento para adopción'),('MI-12','Consentimiento para adopción del hijo por cónyuge o compañero '),('MI-13','Consentimiento para adopción por consanguíneo'),('MI-15','Desnutrición'),('MI-16','Desplazamiento forzado'),('MI-18','Explotación laboral'),('MI-19','Expósito'),('MI-20','Extraviado'),('MI-23','Imigrante'),('MI-26','Maltrato'),('MI-27','Menor de 14 años en comisión de un delito'),('MI-28','Menor de 18 años en situación de discapacidad em comisión de un delito'),('MI-29','Mujer en gestación o lactancia en riesgo'),('MI-31','No reclamado en tiempo razonable'),('MI-35','Por condiciones especiales de cuidadores'),('MI-36','Problemas de consumo de sustancias psicoactivas'),('MI-41','Retención arbitraria'),('MI-43','Seguimiento del trabajo adolecente'),('MI-44','Situacion de calle'),('MI-45','Situación de emergencia'),('MI-47','Trabajo infantil'),('MI-50','Victima de minas antipersonal, municiones sin explotar o artefacto explosivo improvisado'),('MI-51','Victima de violencia sexual'),('MI-53','Victima de otros delitos'),('MI-54','Violencia intrafamiliar'),('MI-56','Vulneración de la intimidad'),('MI-57','Victima de ola invernal'),('MI-58','Huérfanos a causa de la violencia armada, hijos de padres desaparecidos o secuestrados por acción de'),('MI-61','Conductas sexuales entre menores de 14 años'),('MI-62','Niños, niñas, adolecentes nacidos como consecuencia del abuso sexual en el marco del conflicto armad'),('MI-63','Amenazados de reclutamiento inminente por parte de los grupos armados organizados al margen de la le'),('MI-64','Amenazados contra de su vida por acción de los grupos armados organizados al margen de la ley'),('MI-65','Hijos de padres desaparecidos y/o secuestrados por acción de los grupos armados organizados al marge'),('MI-66','Hijos de padres que se encuentran privados de la libertad pro orden judicial'),('MI-68','Menor de 14 años gestante'),('MI-69','Menor de 14 años lactante'),('MI-70','Acoso escolar'),('MI-71','Victimas de acto terrorista, atentados, combates, enfrentamientos, hostigamientos'),('MI-72','Victimas de ciolencia sexual en el marco de conflicto armado');
/*!40000 ALTER TABLE `motivoingreso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipios`
--

DROP TABLE IF EXISTS `municipios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipios` (
  `id_municipio` varchar(50) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `id_provincia` varchar(50) DEFAULT NULL,
  `descripcion_prov` varchar(255) DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  `id_pais` int(3) NOT NULL,
  UNIQUE KEY `id_municipio` (`id_municipio`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipios`
--

LOCK TABLES `municipios` WRITE;
/*!40000 ALTER TABLE `municipios` DISABLE KEYS */;
INSERT INTO `municipios` VALUES ('05002','ABEJORRAL','0','N/A',5,42),('54003','ABREGO','0','N/A',54,42),('05004','ABRIAQUI','0','N/A',5,42),('50006','ACACIAS','0','N/A',50,42),('27006','ACANDI','0','N/A',27,42),('41006','ACEVEDO','0','N/A',41,42),('13006','ACHI','0','N/A',13,42),('41013','AGRADO','0','N/A',41,42),('25001','AGUA DE DIOS','0','N/A',25,42),('20011','AGUACHICA','0','N/A',20,42),('68013','AGUADA','0','N/A',68,42),('17013','AGUADAS','0','N/A',17,42),('85010','AGUAZUL','0','N/A',85,42),('20013','AGUSTIN CODAZZI','0','N/A',20,42),('41016','AIPE','0','N/A',41,42),('25019','ALBAN','0','N/A',25,42),('52019','ALBAN (SAN JOSE)','0','N/A',52,42),('18029','ALBANIA','0','N/A',18,42),('44035','ALBANIA','0','N/A',44,42),('68020','ALBANIA','0','N/A',68,42),('76020','ALCALA','0','N/A',76,42),('52022','ALDANA','0','N/A',52,42),('05021','ALEJANDRIA','0','N/A',5,42),('47030','ALGARROBO','0','N/A',47,42),('41020','ALGECIRAS','0','N/A',41,42),('19022','ALMAGUER','0','N/A',19,42),('15022','ALMEIDA','9','ORIENTE',15,42),('73024','ALPUJARRA','0','N/A',73,42),('41026','ALTAMIRA','0','N/A',41,42),('27025','ALTO BAUDO (PIE DE PATO)','0','N/A',27,42),('13030','ALTOS DEL ROSARIO','0','N/A',13,42),('73026','ALVARADO','0','N/A',73,42),('05030','AMAGA','0','N/A',5,42),('05031','AMALFI','0','N/A',5,42),('73030','AMBALEMA','0','N/A',73,42),('25035','ANAPOIMA','0','N/A',25,42),('52036','ANCUYA','0','N/A',52,42),('76036','ANDALUCIA','0','N/A',76,42),('05034','ANDES','0','N/A',5,42),('05036','ANGELOPOLIS','0','N/A',5,42),('05038','ANGOSTURA','0','N/A',5,42),('25040','ANOLAIMA','0','N/A',25,42),('05040','ANORI','0','N/A',5,42),('17042','ANSERMA','0','N/A',17,42),('76041','ANSERMANUEVO','0','N/A',76,42),('05042','ANTIOQUIA','0','N/A',5,42),('05044','ANZA','0','N/A',5,42),('73043','ANZOATEGUI','0','N/A',73,42),('05045','APARTADO','0','N/A',5,42),('66045','APIA','0','N/A',66,42),('15047','AQUITANIA','11','SUGAMUXI',15,42),('47053','ARACATACA','0','N/A',47,42),('17050','ARANZAZU','0','N/A',17,42),('68051','ARATOCA','0','N/A',68,42),('81001','ARAUCA','0','N/A',81,42),('81065','ARAUQUITA','0','N/A',81,42),('25053','ARBELAEZ','0','N/A',25,42),('52051','ARBOLEDA (BERRUECOS)','0','N/A',52,42),('54051','ARBOLEDAS','0','N/A',54,42),('05051','ARBOLETES','0','N/A',5,42),('15051','ARCABUCO','10','RICAURTE',15,42),('13042','ARENAL','0','N/A',13,42),('05055','ARGELIA','0','N/A',5,42),('19050','ARGELIA','0','N/A',19,42),('76054','ARGELIA','0','N/A',76,42),('47058','ARIGUANI (EL DIFICIL)','0','N/A',47,42),('13052','ARJONA','0','N/A',13,42),('05059','ARMENIA','0','N/A',5,42),('63001','ARMENIA','0','N/A',63,42),('73055','ARMERO (GUAYABAL)','0','N/A',73,42),('13062','ARROYOHONDO','0','N/A',13,42),('20032','ASTREA','0','N/A',20,42),('73067','ATACO','0','N/A',73,42),('27050','ATRATO','0','N/A',27,42),('23068','AYAPEL','0','N/A',23,42),('27073','BAGADO','0','N/A',27,42),('27075','BAHIA SOLANO (MUTIS)','0','N/A',27,42),('27077','BAJO BAUDO (PIZARRO)','0','N/A',27,42),('19075','BALBOA','0','N/A',19,42),('66075','BALBOA','0','N/A',66,42),('08078','BARANOA','0','N/A',8,42),('41078','BARAYA','0','N/A',41,42),('52079','BARBACOAS','0','N/A',52,42),('05079','BARBOSA','0','N/A',5,42),('68077','BARBOSA','0','N/A',68,42),('68079','BARICHARA','0','N/A',68,42),('50110','BARRANCA DE UPIA','0','N/A',50,42),('68081','BARRANCABERMEJA','0','N/A',68,42),('44078','BARRANCAS','0','N/A',44,42),('13074','BARRANCO DE LOBA','0','N/A',13,42),('94343','BARRANCO MINAS (CD)','0','N/A',94,42),('09001','BARRANQUILLA','0','N/A',9,42),('20045','BECERRIL','0','N/A',20,42),('17088','BELALCAZAR','0','N/A',17,42),('15087','BELEN','12','TUNDAMA',15,42),('52083','BELEN','0','N/A',52,42),('27086','BELEN DE BAJIRA','0','N/A',27,42),('18094','BELEN DE LOS ANDAQUIES','0','N/A',18,42),('66088','BELEN DE UMBRIA','0','N/A',66,42),('05088','BELLO','0','N/A',5,42),('05086','BELMIRA','0','N/A',5,42),('25086','BELTRAN','0','N/A',25,42),('15090','BERBEO','5','LENGUPA',15,42),('05091','BETANIA','0','N/A',5,42),('15092','BETEITIVA','13','VALDERRAMA',15,42),('05093','BETULIA','0','N/A',5,42),('68092','BETULIA','0','N/A',68,42),('25095','BITUIMA','0','N/A',25,42),('15097','BOAVITA','2','NORTE',15,42),('54099','BOCHALEMA','0','N/A',54,42),('11001','BOGOTA','0','N/A',11,42),('25099','BOJACA','0','N/A',25,42),('27099','BOJAYA (BELLAVISTA)','0','N/A',27,42),('05101','BOLIVAR','0','N/A',5,42),('19100','BOLIVAR','0','N/A',19,42),('68101','BOLIVAR','0','N/A',68,42),('76100','BOLIVAR','0','N/A',76,42),('20060','BOSCONIA','0','N/A',20,42),('15104','BOYACA','4','MARQUEZ',15,42),('05107','BRICENO','0','N/A',5,42),('15106','BRICENO','8','OCCIDENTE',15,42),('68001','BUCARAMANGA','0','N/A',68,42),('54109','BUCARASICA','0','N/A',54,42),('76109','BUENAVENTURA','0','N/A',76,42),('15109','BUENAVISTA','8','OCCIDENTE',15,42),('23079','BUENAVISTA','0','N/A',23,42),('63111','BUENAVISTA','0','N/A',63,42),('70110','BUENAVISTA','0','N/A',70,42),('19110','BUENOS AIRES','0','N/A',19,42),('52110','BUESACO','0','N/A',52,42),('76111','BUGA','0','N/A',76,42),('76113','BUGALAGRANDE','0','N/A',76,42),('05113','BURITICA','0','N/A',5,42),('15114','BUSBANZA','12','TUNDAMA',15,42),('25120','CABRERA','0','N/A',25,42),('68121','CABRERA','0','N/A',68,42),('50124','CABUYARO','0','N/A',50,42),('94886','CACAHUAL (CD)','0','N/A',94,42),('05120','CACERES','0','N/A',5,42),('25123','CACHIPAY','0','N/A',25,42),('54128','CACHIRA','0','N/A',54,42),('54125','CACOTA','0','N/A',54,42),('05125','CAICEDO','0','N/A',5,42),('76122','CAICEDONIA','0','N/A',76,42),('70124','CAIMITO','0','N/A',70,42),('73124','CAJAMARCA','0','N/A',73,42),('19130','CAJIBIO','0','N/A',19,42),('25126','CAJICA','0','N/A',25,42),('13140','CALAMAR','0','N/A',13,42),('95015','CALAMAR','0','N/A',95,42),('63130','CALARCA','0','N/A',63,42),('05129','CALDAS','0','N/A',5,42),('15131','CALDAS','8','OCCIDENTE',15,42),('19137','CALDONO','0','N/A',19,42),('76001','CALI','0','N/A',76,42),('68132','CALIFORNIA','0','N/A',68,42),('19142','CALOTO','0','N/A',19,42),('05134','CAMPAMENTO','0','N/A',5,42),('08137','CAMPO DE LA CRUZ','0','N/A',8,42),('41132','CAMPOALEGRE','0','N/A',41,42),('15135','CAMPOHERMOSO','5','LENGUPA',15,42),('23090','CANALETE','0','N/A',23,42),('08141','CANDELARIA','0','N/A',8,42),('76130','CANDELARIA','0','N/A',76,42),('13160','CANTAGALLO','0','N/A',13,42),('27135','CANTON DE SAN PABLO (MANAGRU)','0','N/A',27,42),('05138','CAÑASGORDAS','0','N/A',5,42),('25148','CAPARRAPI','0','N/A',25,42),('68147','CAPITANEJO','0','N/A',68,42),('25151','CAQUEZA','0','N/A',25,42),('05142','CARACOLI','0','N/A',5,42),('05145','CARAMANTA','0','N/A',5,42),('68152','CARCASI','0','N/A',68,42),('05147','CAREPA','0','N/A',5,42),('73148','CARMEN DE APICALA','0','N/A',73,42),('25154','CARMEN DE CARUPA','0','N/A',25,42),('05148','CARMEN DE VIBORAL','0','N/A',5,42),('27150','CARMEN DEL DARIEN','0','N/A',27,42),('05150','CAROLINA','0','N/A',5,42),('14001','CARTAGENA','0','N/A',14,42),('18150','CARTAGENA DEL CHAIRA','0','N/A',18,42),('76147','CARTAGO','0','N/A',76,42),('97161','CARURU','0','N/A',97,42),('73152','CASABIANCA','0','N/A',73,42),('50150','CASTILLA LA NUEVA','0','N/A',50,42),('05154','CAUCASIA','0','N/A',5,42),('68160','CEPITA','0','N/A',68,42),('23162','CERETE','0','N/A',23,42),('15162','CERINZA','12','TUNDAMA',15,42),('68162','CERRITO','0','N/A',68,42),('47161','CERRO SAN ANTONIO','0','N/A',47,42),('27160','CERTEGUI','0','N/A',27,42),('52240','CHACHAGUI','0','N/A',52,42),('25168','CHAGUANI','0','N/A',25,42),('70230','CHALAN','0','N/A',70,42),('85015','CHAMEZA','0','N/A',85,42),('73168','CHAPARRAL','0','N/A',73,42),('68167','CHARALA','0','N/A',68,42),('68169','CHARTA','0','N/A',68,42),('25175','CHIA','0','N/A',25,42),('05172','CHIGORODO','0','N/A',5,42),('23168','CHIMA','0','N/A',23,42),('68176','CHIMA','0','N/A',68,42),('20175','CHIMICHAGUA','0','N/A',20,42),('54172','CHINACOTA','0','N/A',54,42),('15172','CHINAVITA','3','NEIRA',15,42),('17174','CHINCHINA','0','N/A',17,42),('23182','CHINU','0','N/A',23,42),('25178','CHIPAQUE','0','N/A',25,42),('68179','CHIPATA','0','N/A',68,42),('15176','CHIQUINQUIRA','8','OCCIDENTE',15,42),('15232','CHIQUIZA','1','CENTRO',15,42),('20178','CHIRIGUANA','0','N/A',20,42),('15180','CHISCAS','7','GUTIERREZ',15,42),('15183','CHITA','13','VALDERRAMA',15,42),('54174','CHITAGA','0','N/A',54,42),('15185','CHITARAQUE','10','RICAURTE',15,42),('15187','CHIVATA','1','CENTRO',15,42),('47170','CHIVOLO','0','N/A',47,42),('15236','CHIVOR','9','ORIENTE',15,42),('25181','CHOACHI','0','N/A',25,42),('25183','CHOCONTA','0','N/A',25,42),('13188','CICUCO','0','N/A',13,42),('47189','CIENAGA','0','N/A',47,42),('23189','CIENAGA DE ORO','0','N/A',23,42),('15189','CIENEGA','4','MARQUEZ',15,42),('68190','CIMITARRA','0','N/A',68,42),('63190','CIRCASIA','0','N/A',63,42),('05190','CISNEROS','0','N/A',5,42),('13222','CLEMENCIA','0','N/A',13,42),('05197','COCORNA','0','N/A',5,42),('73200','COELLO','0','N/A',73,42),('25200','COGUA','0','N/A',25,42),('41206','COLOMBIA','0','N/A',41,42),('86219','COLON','0','N/A',86,42),('52203','COLON (GENOVA)','0','N/A',52,42),('70204','COLOSO (RICAURTE)','0','N/A',70,42),('15204','COMBITA','1','CENTRO',15,42),('05206','CONCEPCION','0','N/A',5,42),('68207','CONCEPCION','0','N/A',68,42),('05209','CONCORDIA','0','N/A',5,42),('47205','CONCORDIA','0','N/A',47,42),('27205','CONDOTO','0','N/A',27,42),('68209','CONFINES','0','N/A',68,42),('52207','CONSACA','0','N/A',52,42),('52210','CONTADERO','0','N/A',52,42),('68211','CONTRATACION','0','N/A',68,42),('54206','CONVENCION','0','N/A',54,42),('05212','COPACABANA','0','N/A',5,42),('15212','COPER','8','OCCIDENTE',15,42),('13212','CORDOBA','0','N/A',13,42),('52215','CORDOBA','0','N/A',52,42),('63212','CORDOBA','0','N/A',63,42),('19212','CORINTO','0','N/A',19,42),('68217','COROMORO','0','N/A',68,42),('70215','COROZAL','0','N/A',70,42),('15215','CORRALES','12','TUNDAMA',15,42),('25214','COTA','0','N/A',25,42),('23300','COTORRA','0','N/A',23,42),('15218','COVARACHIA','2','NORTE',15,42),('70221','COVEÑAS','0','N/A',70,42),('73217','COYAIMA','0','N/A',73,42),('81220','CRAVO NORTE','0','N/A',81,42),('52224','CUASPUD (CARLOSAMA)','0','N/A',52,42),('15223','CUBARA','7','GUTIERREZ',15,42),('50223','CUBARRAL','0','N/A',50,42),('15224','CUCAITA','1','CENTRO',15,42),('25224','CUCUNUBA','0','N/A',25,42),('54001','CUCUTA','0','N/A',54,42),('54223','CUCUTILLA','0','N/A',54,42),('15226','CUITIVA','11','SUGAMUXI',15,42),('50226','CUMARAL','0','N/A',50,42),('99773','CUMARIBO','0','N/A',99,42),('52227','CUMBAL','0','N/A',52,42),('52233','CUMBITARA','0','N/A',52,42),('73226','CUNDAY','0','N/A',73,42),('18205','CURILLO','0','N/A',18,42),('68229','CURITI','0','N/A',68,42),('20228','CURUMANI','0','N/A',20,42),('05234','DABEIBA','0','N/A',5,42),('76233','DAGUA','0','N/A',76,42),('76126','DARIEN','0','N/A',76,42),('44090','DIBULLA','0','N/A',44,42),('44098','DISTRACCION','0','N/A',44,42),('73236','DOLORES','0','N/A',73,42),('05237','DON MATIAS','0','N/A',5,42),('66170','DOSQUEBRADAS','0','N/A',66,42),('15238','DUITAMA','12','TUNDAMA',15,42),('54239','DURANIA','0','N/A',54,42),('05240','EBEJICO','0','N/A',5,42),('76243','EL AGUILA','0','N/A',76,42),('05250','EL BAGRE','0','N/A',5,42),('47245','EL BANCO','0','N/A',47,42),('76246','EL CAIRO','0','N/A',76,42),('50245','EL CALVARIO','0','N/A',50,42),('54245','EL CARMEN','0','N/A',54,42),('27245','EL CARMEN DE ATRATO','0','N/A',27,42),('13244','EL CARMEN DE BOLIVAR','0','N/A',13,42),('68235','EL CARMEN DE CHUCURI','0','N/A',68,42),('50251','EL CASTILLO','0','N/A',50,42),('76248','EL CERRITO','0','N/A',76,42),('52250','EL CHARCO','0','N/A',52,42),('15244','EL COCUY','7','GUTIERREZ',15,42),('25245','EL COLEGIO','0','N/A',25,42),('20238','EL COPEY','0','N/A',20,42),('18247','EL DONCELLO','0','N/A',18,42),('50270','EL DORADO','0','N/A',50,42),('76250','EL DOVIO','0','N/A',76,42),('91263','EL ENCANTO (CD)','0','N/A',91,42),('15248','EL ESPINO','7','GUTIERREZ',15,42),('68245','EL GUACAMAYO','0','N/A',68,42),('13248','EL GUAMO','0','N/A',13,42),('44110','EL MOLINO','0','N/A',44,42),('20250','EL PASO','0','N/A',20,42),('18256','EL PAUJIL','0','N/A',18,42),('52254','EL PEÑOL','0','N/A',52,42),('13268','EL PEÑON','0','N/A',13,42),('25258','EL PEÑON','0','N/A',25,42),('68250','EL PEÑON','0','N/A',68,42),('47258','EL PIÑON','0','N/A',47,42),('68255','EL PLAYON','0','N/A',68,42),('47268','EL RETEN','0','N/A',47,42),('95025','EL RETORNO','0','N/A',95,42),('70233','EL ROBLE','0','N/A',70,42),('25260','EL ROSAL','0','N/A',25,42),('52256','EL ROSARIO','0','N/A',52,42),('52258','EL TABLON','0','N/A',52,42),('19256','EL TAMBO','0','N/A',19,42),('52260','EL TAMBO','0','N/A',52,42),('54250','EL TARRA','0','N/A',54,42),('54261','EL ZULIA','0','N/A',54,42),('41244','ELIAS','0','N/A',41,42),('68264','ENCINO','0','N/A',68,42),('68266','ENCISO','0','N/A',68,42),('05264','ENTRERRIOS','0','N/A',5,42),('05266','ENVIGADO','0','N/A',5,42),('73268','ESPINAL','0','N/A',73,42),('25269','FACATATIVA','0','N/A',25,42),('73270','FALAN','0','N/A',73,42),('17272','FILADELFIA','0','N/A',17,42),('63272','FILANDIA','0','N/A',63,42),('15272','FIRAVITOBA','11','SUGAMUXI',15,42),('73275','FLANDES','0','N/A',73,42),('18001','FLORENCIA','0','N/A',18,42),('19290','FLORENCIA','0','N/A',19,42),('15276','FLORESTA','12','TUNDAMA',15,42),('68271','FLORIAN','0','N/A',68,42),('76275','FLORIDA','0','N/A',76,42),('68276','FLORIDABLANCA','0','N/A',68,42),('25279','FOMEQUE','0','N/A',25,42),('44279','FONSECA','0','N/A',44,42),('81300','FORTUL','0','N/A',81,42),('25281','FOSCA','0','N/A',25,42),('52520','FRANCISCO PIZARRO (SALAHONDA)','0','N/A',52,42),('05282','FREDONIA','0','N/A',5,42),('73283','FRESNO','0','N/A',73,42),('05284','FRONTINO','0','N/A',5,42),('50287','FUENTE DE ORO','0','N/A',50,42),('47288','FUNDACION','0','N/A',47,42),('52287','FUNES','0','N/A',52,42),('25286','FUNZA','0','N/A',25,42),('25288','FUQUENE','0','N/A',25,42),('25290','FUSAGASUGA','0','N/A',25,42),('25293','GACHALA','0','N/A',25,42),('25295','GACHANCIPA','0','N/A',25,42),('15293','GACHANTIVA','10','RICAURTE',15,42),('25297','GACHETA','0','N/A',25,42),('68296','GALAN','0','N/A',68,42),('08296','GALAPA','0','N/A',8,42),('70235','GALERAS (NUEVA GRANADA)','0','N/A',70,42),('25299','GAMA','0','N/A',25,42),('20295','GAMARRA','0','N/A',20,42),('68298','GAMBITA','0','N/A',68,42),('15296','GAMEZA','11','SUGAMUXI',15,42),('15299','GARAGOA','3','NEIRA',15,42),('41298','GARZON','0','N/A',41,42),('63302','GENOVA','0','N/A',63,42),('41306','GIGANTE','0','N/A',41,42),('76306','GINEBRA','0','N/A',76,42),('05306','GIRALDO','0','N/A',5,42),('25307','GIRARDOT','0','N/A',25,42),('05308','GIRARDOTA','0','N/A',5,42),('68307','GIRON','0','N/A',68,42),('05310','GOMEZ PLATA','0','N/A',5,42),('20310','GONZALEZ','0','N/A',20,42),('54313','GRAMALOTE','0','N/A',54,42),('05313','GRANADA','0','N/A',5,42),('25312','GRANADA','0','N/A',25,42),('50313','GRANADA','0','N/A',50,42),('68318','GUACA','0','N/A',68,42),('15317','GUACAMAYAS','7','GUTIERREZ',15,42),('76318','GUACARI','0','N/A',76,42),('19300','GUACHENÉ','0','N/A',19,42),('25317','GUACHETA','0','N/A',25,42),('52317','GUACHUCAL','0','N/A',52,42),('05315','GUADALUPE','0','N/A',5,42),('41319','GUADALUPE','0','N/A',41,42),('68320','GUADALUPE','0','N/A',68,42),('25320','GUADUAS','0','N/A',25,42),('52320','GUAITARILLA','0','N/A',52,42),('52323','GUALMATAN','0','N/A',52,42),('47318','GUAMAL','0','N/A',47,42),('50318','GUAMAL','0','N/A',50,42),('73319','GUAMO','0','N/A',73,42),('19318','GUAPI','0','N/A',19,42),('68322','GUAPOTA','0','N/A',68,42),('70265','GUARANDA','0','N/A',70,42),('05318','GUARNE','0','N/A',5,42),('25322','GUASCA','0','N/A',25,42),('05321','GUATAPE','0','N/A',5,42),('25324','GUATAQUI','0','N/A',25,42),('25326','GUATAVITA','0','N/A',25,42),('15322','GUATEQUE','9','ORIENTE',15,42),('66318','GUATICA','0','N/A',66,42),('68324','GUAVATA','0','N/A',68,42),('25328','GUAYABAL DE SIQUIMA','0','N/A',25,42),('25335','GUAYABETAL','0','N/A',25,42),('15325','GUAYATA','9','ORIENTE',15,42),('68327','GUEPSA','0','N/A',68,42),('15332','GUICAN','7','GUTIERREZ',15,42),('25339','GUTIERREZ','0','N/A',25,42),('54344','HACARI','0','N/A',54,42),('13300','HATILLO DE LOBA','0','N/A',13,42),('68344','HATO','0','N/A',68,42),('85125','HATO COROZAL','0','N/A',85,42),('44378','HATONUEVO','0','N/A',44,42),('05347','HELICONIA','0','N/A',5,42),('54347','HERRAN','0','N/A',54,42),('73347','HERVEO','0','N/A',73,42),('05353','HISPANIA','0','N/A',5,42),('41349','HOBO','0','N/A',41,42),('73349','HONDA','0','N/A',73,42),('73001','IBAGUE','0','N/A',73,42),('73352','ICONONZO','0','N/A',73,42),('52352','ILES','0','N/A',52,42),('52354','IMUES','0','N/A',52,42),('19355','INZA','0','N/A',19,42),('52356','IPIALES','0','N/A',52,42),('41357','IQUIRA','0','N/A',41,42),('41359','ISNOS (SAN JOSE DE ISNOS)','0','N/A',41,42),('05360','ITAGUI','0','N/A',5,42),('27361','ITSMINA','0','N/A',27,42),('05361','ITUANGO','0','N/A',5,42),('15362','IZA','11','SUGAMUXI',15,42),('19364','JAMBALO','0','N/A',19,42),('76364','JAMUNDI','0','N/A',76,42),('05364','JARDIN','0','N/A',5,42),('15367','JENESANO','4','MARQUEZ',15,42),('05368','JERICO','0','N/A',5,42),('15368','JERICO','13','VALDERRAMA',15,42),('25368','JERUSALEN','0','N/A',25,42),('68368','JESUS MARIA','0','N/A',68,42),('68370','JORDAN','0','N/A',68,42),('08372','JUAN DE ACOSTA','0','N/A',8,42),('25372','JUNIN','0','N/A',25,42),('27372','JURADO','0','N/A',27,42),('23350','LA APARTADA','0','N/A',23,42),('41378','LA ARGENTINA','0','N/A',41,42),('68377','LA BELLEZA','0','N/A',68,42),('25377','LA CALERA','0','N/A',25,42),('15380','LA CAPILLA','9','ORIENTE',15,42),('05376','LA CEJA','0','N/A',5,42),('66383','LA CELIA','0','N/A',66,42),('91405','LA CHORRERA (CD)','0','N/A',91,42),('52378','LA CRUZ','0','N/A',52,42),('76377','LA CUMBRE','0','N/A',76,42),('17380','LA DORADA','0','N/A',17,42),('54385','LA ESPERANZA','0','N/A',54,42),('05380','LA ESTRELLA','0','N/A',5,42),('52381','LA FLORIDA','0','N/A',52,42),('20383','LA GLORIA','0','N/A',20,42),('94885','LA GUADALUPE (CD)','0','N/A',94,42),('20400','LA JAGUA DE IBIRICO','0','N/A',20,42),('44420','LA JAGUA DEL PILAR','0','N/A',44,42),('52385','LA LLANADA','0','N/A',52,42),('50350','LA MACARENA','0','N/A',50,42),('17388','LA MERCED','0','N/A',17,42),('25386','LA MESA','0','N/A',25,42),('18410','LA MONTANITA','0','N/A',18,42),('25394','LA PALMA','0','N/A',25,42),('68397','LA PAZ','0','N/A',68,42),('91407','LA PEDRERA (CD)','0','N/A',91,42),('25398','LA PEÑA','0','N/A',25,42),('05390','LA PINTADA','0','N/A',5,42),('41396','LA PLATA','0','N/A',41,42),('54398','LA PLAYA','0','N/A',54,42),('99524','LA PRIMAVERA','0','N/A',99,42),('85136','LA SALINA','0','N/A',85,42),('19392','LA SIERRA','0','N/A',19,42),('63401','LA TEBAIDA','0','N/A',63,42),('52390','LA TOLA','0','N/A',52,42),('05400','LA UNION','0','N/A',5,42),('52399','LA UNION','0','N/A',52,42),('70400','LA UNION','0','N/A',70,42),('76400','LA UNION','0','N/A',76,42),('50370','LA URIBE','0','N/A',50,42),('15403','LA UVITA','2','NORTE',15,42),('19397','LA VEGA','0','N/A',19,42),('25402','LA VEGA','0','N/A',25,42),('15401','LA VICTORIA','8','OCCIDENTE',15,42),('76403','LA VICTORIA','0','N/A',76,42),('91430','LA VICTORIA (CD)','0','N/A',91,42),('66400','LA VIRGINIA','0','N/A',66,42),('54377','LABATECA','0','N/A',54,42),('15377','LABRANZAGRANDE','6','LA LIBERTAD',15,42),('68385','LANDAZURI','0','N/A',68,42),('68406','LEBRIJA','0','N/A',68,42),('52405','LEIVA','0','N/A',52,42),('50400','LEJANIAS','0','N/A',50,42),('25407','LENGUAZAQUE','0','N/A',25,42),('73408','LERIDA','0','N/A',73,42),('91001','LETICIA','0','N/A',91,42),('73411','LIBANO','0','N/A',73,42),('05411','LIBORINA','0','N/A',5,42),('52411','LINARES','0','N/A',52,42),('27250','LITORAL DEL BAJO SAN JUAN','0','N/A',27,42),('27413','LLORO','0','N/A',27,42),('19418','LOPEZ (MICAY)','0','N/A',19,42),('23417','LORICA','0','N/A',23,42),('52418','LOS ANDES (SOTOMAYOR)','0','N/A',52,42),('23419','LOS CORDOBAS','0','N/A',23,42),('70418','LOS PALMITOS','0','N/A',70,42),('54405','LOS PATIOS','0','N/A',54,42),('68418','LOS SANTOS','0','N/A',68,42),('54418','LOURDES','0','N/A',54,42),('08421','LURUACO','0','N/A',8,42),('15425','MACANAL','3','NEIRA',15,42),('68425','MACARAVITA','0','N/A',68,42),('05425','MACEO','0','N/A',5,42),('25426','MACHETA','0','N/A',25,42),('25430','MADRID','0','N/A',25,42),('13430','MAGANGUE','0','N/A',13,42),('52427','MAGUI (PAYAN)','0','N/A',52,42),('13433','MAHATES','0','N/A',13,42),('44430','MAICAO','0','N/A',44,42),('70429','MAJAGUAL','0','N/A',70,42),('68432','MALAGA','0','N/A',68,42),('08433','MALAMBO','0','N/A',8,42),('52435','MALLAMA (PIEDRANCHA)','0','N/A',52,42),('08436','MANATI','0','N/A',8,42),('44560','MANAURE','0','N/A',44,42),('20443','MANAURE BALCON DEL CESAR','0','N/A',20,42),('85139','MANI','0','N/A',85,42),('17001','MANIZALES','0','N/A',17,42),('25436','MANTA','0','N/A',25,42),('17433','MANZANARES','0','N/A',17,42),('50325','MAPIRIPAN','0','N/A',50,42),('94663','MAPIRIPANA (CD)','0','N/A',94,42),('13440','MARGARITA','0','N/A',13,42),('13442','MARIA LA BAJA','0','N/A',13,42),('05440','MARINILLA','0','N/A',5,42),('15442','MARIPI','8','OCCIDENTE',15,42),('73443','MARIQUITA','0','N/A',73,42),('17442','MARMATO','0','N/A',17,42),('17444','MARQUETALIA','0','N/A',17,42),('66440','MARSELLA','0','N/A',66,42),('17446','MARULANDA','0','N/A',17,42),('68444','MATANZA','0','N/A',68,42),('05001','MEDELLIN','0','N/A',5,42),('25438','MEDINA','0','N/A',25,42),('27425','MEDIO ATRATO','0','N/A',27,42),('27430','MEDIO BAUDO (BOCA DE PEPE)','0','N/A',27,42),('27450','MEDIO SAN JUAN','0','N/A',27,42),('73449','MELGAR','0','N/A',73,42),('19450','MERCADERES','0','N/A',19,42),('50330','MESETAS','0','N/A',50,42),('18460','MILAN','0','N/A',18,42),('15455','MIRAFLORES','5','LENGUPA',15,42),('95200','MIRAFLORES','0','N/A',95,42),('19455','MIRANDA','0','N/A',19,42),('91460','MIRITI PARANA (CD)','0','N/A',91,42),('66456','MISTRATO','0','N/A',66,42),('97001','MITU','0','N/A',97,42),('86001','MOCOA','0','N/A',86,42),('68464','MOGOTES','0','N/A',68,42),('68468','MOLAGAVITA','0','N/A',68,42),('23464','MOMIL','0','N/A',23,42),('13468','MOMPOS','0','N/A',13,42),('15464','MONGUA','11','SUGAMUXI',15,42),('15466','MONGUI','11','SUGAMUXI',15,42),('15469','MONIQUIRA','10','RICAURTE',15,42),('05467','MONTEBELLO','0','N/A',5,42),('13458','MONTECRISTO','0','N/A',13,42),('23466','MONTELIBANO','0','N/A',23,42),('63470','MONTENEGRO','0','N/A',63,42),('23001','MONTERIA','0','N/A',23,42),('85162','MONTERREY','0','N/A',85,42),('23500','MOÑITOS','0','N/A',23,42),('13473','MORALES','0','N/A',13,42),('19473','MORALES','0','N/A',19,42),('18479','MORELIA','0','N/A',18,42),('94888','MORICHAL (MORICHAL NUEVO) (CD)','0','N/A',94,42),('70473','MORROA','0','N/A',70,42),('25473','MOSQUERA','0','N/A',25,42),('52473','MOSQUERA','0','N/A',52,42),('15476','MOTAVITA','1','CENTRO',15,42),('73461','MURILLO','0','N/A',73,42),('05475','MURINDO','0','N/A',5,42),('05480','MUTATA','0','N/A',5,42),('54480','MUTISCUA','0','N/A',54,42),('15480','MUZO','8','OCCIDENTE',15,42),('05483','NARIÑO','0','N/A',5,42),('25483','NARIÑO','0','N/A',25,42),('52480','NARIÑO','0','N/A',52,42),('41483','NATAGA','0','N/A',41,42),('73483','NATAGAIMA','0','N/A',73,42),('05495','NECHI','0','N/A',5,42),('05490','NECOCLI','0','N/A',5,42),('17486','NEIRA','0','N/A',17,42),('41001','NEIVA','0','N/A',41,42),('25486','NEMOCON','0','N/A',25,42),('25488','NILO','0','N/A',25,42),('25489','NIMAIMA','0','N/A',25,42),('15491','NOBSA','11','SUGAMUXI',15,42),('25491','NOCAIMA','0','N/A',25,42),('17495','NORCASIA','0','N/A',17,42),('13490','NOROSÌ','0','N/A',13,42),('27491','NOVITA','0','N/A',27,42),('47460','NUEVA GRANADA','0','N/A',47,42),('15494','NUEVO COLON','4','MARQUEZ',15,42),('85225','NUNCHIA','0','N/A',85,42),('27495','NUQUI','0','N/A',27,42),('76497','OBANDO','0','N/A',76,42),('68498','OCAMONTE','0','N/A',68,42),('54498','OCAÑA','0','N/A',54,42),('68500','OIBA','0','N/A',68,42),('15500','OICATA','1','CENTRO',15,42),('05501','OLAYA','0','N/A',5,42),('52490','OLAYA HERRERA(BOCAS DE SATINGA','0','N/A',52,42),('68502','ONZAGA','0','N/A',68,42),('41503','OPORAPA','0','N/A',41,42),('86320','ORITO','0','N/A',86,42),('85230','OROCUE','0','N/A',85,42),('73504','ORTEGA','0','N/A',73,42),('52506','OSPINA','0','N/A',52,42),('25506','OSPINA PEREZ (VENECIA)','0','N/A',25,42),('15507','OTANCHE','8','OCCIDENTE',15,42),('70508','OVEJAS','0','N/A',70,42),('15511','PACHAVITA','3','NEIRA',15,42),('25513','PACHO','0','N/A',25,42),('97511','PACOA (CD)','0','N/A',97,42),('17513','PACORA','0','N/A',17,42),('19513','PADILLA','0','N/A',19,42),('15514','PAEZ','5','LENGUPA',15,42),('19517','PAEZ','0','N/A',19,42),('41518','PAICOL','0','N/A',41,42),('20517','PAILITAS','0','N/A',20,42),('25518','PAIME','0','N/A',25,42),('15516','PAIPA','12','TUNDAMA',15,42),('15518','PAJARITO','6','LA LIBERTAD',15,42),('41524','PALERMO','0','N/A',41,42),('17524','PALESTINA','0','N/A',17,42),('41530','PALESTINA','0','N/A',41,42),('68522','PALMAR','0','N/A',68,42),('08520','PALMAR DE VARELA','0','N/A',8,42),('68524','PALMAS SOCORRO','0','N/A',68,42),('76520','PALMIRA','0','N/A',76,42),('70523','PALMITO','0','N/A',70,42),('73520','PALOCABILDO','0','N/A',73,42),('54518','PAMPLONA','0','N/A',54,42),('54520','PAMPLONITA','0','N/A',54,42),('94887','PANA PANA (CAMPO ALEGRE) (CD)','0','N/A',94,42),('25524','PANDI','0','N/A',25,42),('15522','PANQUEBA','7','GUTIERREZ',15,42),('97777','PAPUNAUA (MORICHAL) (CD)','0','N/A',97,42),('68533','PARAMO','0','N/A',68,42),('25530','PARATEBUENO','0','N/A',25,42),('25535','PASCA','0','N/A',25,42),('52001','PASTO','0','N/A',52,42),('19532','PATIA (EL BORDO)','0','N/A',19,42),('15531','PAUNA','8','OCCIDENTE',15,42),('15533','PAYA','6','LA LIBERTAD',15,42),('85250','PAZ DE ARIPORO','0','N/A',85,42),('15537','PAZ DE RIO','13','VALDERRAMA',15,42),('47541','PEDRAZA','0','N/A',47,42),('20550','PELAYA','0','N/A',20,42),('17541','PENSILVANIA','0','N/A',17,42),('05541','PEÑOL','0','N/A',5,42),('05543','PEQUE','0','N/A',5,42),('66001','PEREIRA','0','N/A',66,42),('15542','PESCA','11','SUGAMUXI',15,42),('19533','PIAMONTE','0','N/A',19,42),('68547','PIEDECUESTA','0','N/A',68,42),('73547','PIEDRAS','0','N/A',73,42),('19548','PIENDAMO','0','N/A',19,42),('63548','PIJAO','0','N/A',63,42),('47545','PIJIÑO DEL CARMEN (PIJIÑO)','0','N/A',47,42),('68549','PINCHOTE','0','N/A',68,42),('13549','PINILLOS','0','N/A',13,42),('08549','PIOJO','0','N/A',8,42),('15550','PISBA','6','LA LIBERTAD',15,42),('41548','PITAL','0','N/A',41,42),('41551','PITALITO','0','N/A',41,42),('47551','PIVIJAY','0','N/A',47,42),('73555','PLANADAS','0','N/A',73,42),('23555','PLANETA RICA','0','N/A',23,42),('47555','PLATO','0','N/A',47,42),('52540','POLICARPA','0','N/A',52,42),('08558','POLO NUEVO','0','N/A',8,42),('08560','PONEDERA','0','N/A',8,42),('19001','POPAYAN','0','N/A',19,42),('85263','PORE','0','N/A',85,42),('52560','POTOSI','0','N/A',52,42),('76563','PRADERA','0','N/A',76,42),('73563','PRADO','0','N/A',73,42),('52565','PROVIDENCIA','0','N/A',52,42),('88564','PROVIDENCIA (SAN ANDRES)','0','N/A',88,42),('20570','PUEBLO BELLO','0','N/A',20,42),('23570','PUEBLO NUEVO','0','N/A',23,42),('66572','PUEBLO RICO','0','N/A',66,42),('05576','PUEBLORRICO','0','N/A',5,42),('47570','PUEBLOVIEJO','0','N/A',47,42),('68572','PUENTE NACIONAL','0','N/A',68,42),('52573','PUERRES','0','N/A',52,42),('91530','PUERTO ALEGRIA (CD)','0','N/A',91,42),('91536','PUERTO ARICA (CD)','0','N/A',91,42),('86568','PUERTO ASIS','0','N/A',86,42),('05579','PUERTO BERRIO','0','N/A',5,42),('15572','PUERTO BOYACA','8','OCCIDENTE',15,42),('86569','PUERTO CAICEDO','0','N/A',86,42),('99001','PUERTO CARREÑO','0','N/A',99,42),('08573','PUERTO COLOMBIA','0','N/A',8,42),('94884','PUERTO COLOMBIA (CD)','0','N/A',94,42),('50450','PUERTO CONCORDIA','0','N/A',50,42),('23574','PUERTO ESCONDIDO','0','N/A',23,42),('50568','PUERTO GAITAN','0','N/A',50,42),('86571','PUERTO GUZMAN','0','N/A',86,42),('94001','PUERTO INIRIDA','0','N/A',94,42),('86573','PUERTO LEGUIZAMO','0','N/A',86,42),('23580','PUERTO LIBERTADOR','0','N/A',23,42),('50577','PUERTO LLERAS','0','N/A',50,42),('50573','PUERTO LOPEZ','0','N/A',50,42),('05585','PUERTO NARE (LA MAGDALENA )','0','N/A',5,42),('91540','PUERTO NARIÑO','0','N/A',91,42),('68573','PUERTO PARRA','0','N/A',68,42),('18592','PUERTO RICO','0','N/A',18,42),('50590','PUERTO RICO','0','N/A',50,42),('81591','PUERTO RONDON','0','N/A',81,42),('25572','PUERTO SALGAR','0','N/A',25,42),('54553','PUERTO SANTANDER','0','N/A',54,42),('91669','PUERTO SANTANDER (CD)','0','N/A',91,42),('19573','PUERTO TEJADA','0','N/A',19,42),('05591','PUERTO TRIUNFO','0','N/A',5,42),('68575','PUERTO WILCHES','0','N/A',68,42),('25580','PULI','0','N/A',25,42),('52585','PUPIALES','0','N/A',52,42),('19585','PURACE','0','N/A',19,42),('73585','PURIFICACION','0','N/A',73,42),('23586','PURISIMA','0','N/A',23,42),('25592','QUEBRADANEGRA','0','N/A',25,42),('25594','QUETAME','0','N/A',25,42),('27001','QUIBDO','0','N/A',27,42),('63594','QUIMBAYA','0','N/A',63,42),('66594','QUINCHIA','0','N/A',66,42),('15580','QUIPAMA','8','OCCIDENTE',15,42),('25596','QUIPILE','0','N/A',25,42),('25599','RAFAEL REYES (APULO)','0','N/A',25,42),('54599','RAGONVALIA','0','N/A',54,42),('15599','RAMIRIQUI','4','MARQUEZ',15,42),('15600','RAQUIRA','10','RICAURTE',15,42),('85279','RECETOR','0','N/A',85,42),('13580','REGIDOR','0','N/A',13,42),('05604','REMEDIOS','0','N/A',5,42),('47605','REMOLINO','0','N/A',47,42),('08606','REPELON','0','N/A',8,42),('50606','RESTREPO','0','N/A',50,42),('76606','RESTREPO','0','N/A',76,42),('05607','RETIRO','0','N/A',5,42),('25612','RICAURTE','0','N/A',25,42),('52612','RICAURTE','0','N/A',52,42),('20614','RIO DE ORO','0','N/A',20,42),('27580','RIO IRO','0','N/A',27,42),('13600','RIO VIEJO','0','N/A',13,42),('73616','RIOBLANCO','0','N/A',73,42),('76616','RIOFRIO','0','N/A',76,42),('44001','RIOHACHA','0','N/A',44,42),('05615','RIONEGRO','0','N/A',5,42),('68615','RIONEGRO','0','N/A',68,42),('27600','RIOQUITO','0','N/A',27,42),('17614','RIOSUCIO','0','N/A',17,42),('27615','RIOSUCIO','0','N/A',27,42),('17616','RISARALDA','0','N/A',17,42),('41615','RIVERA','0','N/A',41,42),('52621','ROBERTO PAYAN (SAN JOSE)','0','N/A',52,42),('20621','ROBLES (LA PAZ)','0','N/A',20,42),('76622','ROLDANILLO','0','N/A',76,42),('73622','RONCESVALLES','0','N/A',73,42),('15621','RONDON','4','MARQUEZ',15,42),('19622','ROSAS','0','N/A',19,42),('73624','ROVIRA','0','N/A',73,42),('68655','SABANA DE TORRES','0','N/A',68,42),('08634','SABANAGRANDE','0','N/A',8,42),('05628','SABANALARGA','0','N/A',5,42),('08638','SABANALARGA','0','N/A',8,42),('85300','SABANALARGA','0','N/A',85,42),('47660','SABANAS DE SAN ANGEL','0','N/A',47,42),('05631','SABANETA','0','N/A',5,42),('15632','SABOYA','8','OCCIDENTE',15,42),('85315','SACAMA','0','N/A',85,42),('15638','SACHICA','10','RICAURTE',15,42),('23660','SAHAGUN','0','N/A',23,42),('41660','SALADOBLANCO','0','N/A',41,42),('17653','SALAMINA','0','N/A',17,42),('47675','SALAMINA','0','N/A',47,42),('54660','SALAZAR','0','N/A',54,42),('73671','SALDAÑA','0','N/A',73,42),('63690','SALENTO','0','N/A',63,42),('05642','SALGAR','0','N/A',5,42),('15646','SAMACA','1','CENTRO',15,42),('17662','SAMANA','0','N/A',17,42),('52678','SAMANIEGO','0','N/A',52,42),('70670','SAMPUES','0','N/A',70,42),('41668','SAN AGUSTIN','0','N/A',41,42),('20710','SAN ALBERTO','0','N/A',20,42),('05647','SAN ANDRES','0','N/A',5,42),('68669','SAN ANDRES','0','N/A',68,42),('88001','SAN ANDRES','0','N/A',88,42),('23670','SAN ANDRES SOTAVENTO','0','N/A',23,42),('23672','SAN ANTERO','0','N/A',23,42),('73675','SAN ANTONIO','0','N/A',73,42),('25645','SAN ANTONIO DE TEQUENDAMA','0','N/A',25,42),('68673','SAN BENITO','0','N/A',68,42),('70678','SAN BENITO ABAD','0','N/A',70,42),('25649','SAN BERNARDO','0','N/A',25,42),('52685','SAN BERNARDO','0','N/A',52,42),('23675','SAN BERNARDO DEL VIENTO','0','N/A',23,42),('54670','SAN CALIXTO','0','N/A',54,42),('05649','SAN CARLOS','0','N/A',5,42),('23678','SAN CARLOS','0','N/A',23,42),('50680','SAN CARLOS DE GUAROA','0','N/A',50,42),('25653','SAN CAYETANO','0','N/A',25,42),('54673','SAN CAYETANO','0','N/A',54,42),('13620','SAN CRISTOBAL','0','N/A',13,42),('20750','SAN DIEGO','0','N/A',20,42),('15660','SAN EDUARDO','5','LENGUPA',15,42),('13647','SAN ESTANISLAO','0','N/A',13,42),('94883','SAN FELIPE (CD)','0','N/A',94,42),('13650','SAN FERNANDO','0','N/A',13,42),('05652','SAN FRANCISCO','0','N/A',5,42),('25658','SAN FRANCISCO','0','N/A',25,42),('86755','SAN FRANCISCO','0','N/A',86,42),('68679','SAN GIL','0','N/A',68,42),('13654','SAN JACINTO','0','N/A',13,42),('13655','SAN JACINTO DEL CAUCA','0','N/A',13,42),('05656','SAN JERONIMO','0','N/A',5,42),('68682','SAN JOAQUIN','0','N/A',68,42),('17665','SAN JOSE','0','N/A',17,42),('05658','SAN JOSE DE LA MONTANA','0','N/A',5,42),('68684','SAN JOSE DE MIRANDA','0','N/A',68,42),('15664','SAN JOSE DE PARE','10','RICAURTE',15,42),('23682','SAN JOSE DE URE','0','N/A',23,42),('18610','SAN JOSE DEL FRAGUA','0','N/A',18,42),('95001','SAN JOSE DEL GUAVIARE','0','N/A',95,42),('27660','SAN JOSE DEL PALMAR','0','N/A',27,42),('50683','SAN JUAN DE ARAMA','0','N/A',50,42),('70702','SAN JUAN DE BETULIA','0','N/A',70,42),('25662','SAN JUAN DE RIO SECO','0','N/A',25,42),('05659','SAN JUAN DE URABA','0','N/A',5,42),('44650','SAN JUAN DEL CESAR','0','N/A',44,42),('13657','SAN JUAN NEPOMUCENO','0','N/A',13,42),('50686','SAN JUANITO','0','N/A',50,42),('52687','SAN LORENZO','0','N/A',52,42),('05660','SAN LUIS','0','N/A',5,42),('73678','SAN LUIS','0','N/A',73,42),('15667','SAN LUIS DE GACENO','3','NEIRA',15,42),('85325','SAN LUIS DE PALENQUE','0','N/A',85,42),('70708','SAN MARCOS','0','N/A',70,42),('20770','SAN MARTIN','0','N/A',20,42),('50689','SAN MARTIN','0','N/A',50,42),('13667','SAN MARTIN DE LOBA','0','N/A',13,42),('15673','SAN MATEO','2','NORTE',15,42),('68686','SAN MIGUEL','0','N/A',68,42),('86757','SAN MIGUEL (LA DORADA)','0','N/A',86,42),('15676','SAN MIGUEL DE SEMA','8','OCCIDENTE',15,42),('70713','SAN ONOFRE','0','N/A',70,42),('13670','SAN PABLO','0','N/A',13,42),('52693','SAN PABLO','0','N/A',52,42),('15681','SAN PABLO DE BORBUR','8','OCCIDENTE',15,42),('05664','SAN PEDRO','0','N/A',5,42),('70717','SAN PEDRO','0','N/A',70,42),('76670','SAN PEDRO','0','N/A',76,42),('52694','SAN PEDRO DE CARTAGO','0','N/A',52,42),('05665','SAN PEDRO DE URABA','0','N/A',5,42),('23686','SAN PELAYO','0','N/A',23,42),('05667','SAN RAFAEL','0','N/A',5,42),('05670','SAN ROQUE','0','N/A',5,42),('19693','SAN SEBASTIAN','0','N/A',19,42),('47692','SAN SEBASTIAN DE BUENAVISTA','0','N/A',47,42),('05674','SAN VICENTE','0','N/A',5,42),('68689','SAN VICENTE DE CHUCURI','0','N/A',68,42),('18753','SAN VICENTE DEL CAGUAN','0','N/A',18,42),('47703','SAN ZENON','0','N/A',47,42),('52683','SANDONA','0','N/A',52,42),('47707','SANTA ANA','0','N/A',47,42),('05679','SANTA BARBARA','0','N/A',5,42),('68705','SANTA BARBARA','0','N/A',68,42),('52696','SANTA BARBARA (ISCUANDE)','0','N/A',52,42),('47720','SANTA BARBARA DE PINTO','0','N/A',47,42),('13673','SANTA CATALINA','0','N/A',13,42),('52699','SANTA CRUZ (GUACHAVES)','0','N/A',52,42),('68720','SANTA HELENA DEL OPON','0','N/A',68,42),('73686','SANTA ISABEL','0','N/A',73,42),('08675','SANTA LUCIA','0','N/A',8,42),('15690','SANTA MARIA','3','NEIRA',15,42),('41676','SANTA MARIA','0','N/A',41,42),('47001','SANTA MARTA','0','N/A',48,42),('13683','SANTA ROSA','0','N/A',13,42),('19701','SANTA ROSA','0','N/A',19,42),('66682','SANTA ROSA DE CABAL','0','N/A',66,42),('05686','SANTA ROSA DE OSOS','0','N/A',5,42),('15693','SANTA ROSA DE VITERBO','12','TUNDAMA',15,42),('13688','SANTA ROSA DEL SUR','0','N/A',13,42),('99624','SANTA ROSALIA','0','N/A',99,42),('15696','SANTA SOFIA','10','RICAURTE',15,42),('15686','SANTANA','10','RICAURTE',15,42),('19698','SANTANDER DE QUILICHAO','0','N/A',19,42),('54680','SANTIAGO','0','N/A',54,42),('86760','SANTIAGO','0','N/A',86,42),('05690','SANTO DOMINGO','0','N/A',5,42),('08685','SANTO TOMAS','0','N/A',8,42),('05697','SANTUARIO','0','N/A',5,42),('66687','SANTUARIO','0','N/A',66,42),('52720','SAPUYES','0','N/A',52,42),('81736','SARAVENA','0','N/A',81,42),('54720','SARDINATA','0','N/A',54,42),('25718','SASAIMA','0','N/A',25,42),('15720','SATIVANORTE','2','NORTE',15,42),('15723','SATIVASUR','2','NORTE',15,42),('05736','SEGOVIA','0','N/A',5,42),('25736','SESQUILE','0','N/A',25,42),('76736','SEVILLA','0','N/A',76,42),('15740','SIACHOQUE','1','CENTRO',15,42),('25740','SIBATE','0','N/A',25,42),('86749','SIBUNDOY','0','N/A',86,42),('54743','SILOS','0','N/A',54,42),('25743','SILVANIA','0','N/A',25,42),('19743','SILVIA','0','N/A',19,42),('68745','SIMACOTA','0','N/A',68,42),('25745','SIMIJACA','0','N/A',25,42),('13744','SIMITI','0','N/A',13,42),('70742','SINCE','0','N/A',70,42),('70001','SINCELEJO','0','N/A',70,42),('27745','SIPI','0','N/A',27,42),('47745','SITIO NUEVO','0','N/A',47,42),('25754','SOACHA','0','N/A',25,42),('15753','SOATA','2','NORTE',15,42),('15757','SOCHA','13','VALDERRAMA',15,42),('68755','SOCORRO','0','N/A',68,42),('15755','SOCOTA','13','VALDERRAMA',15,42),('15759','SOGAMOSO','11','SUGAMUXI',15,42),('18756','SOLANO','0','N/A',18,42),('08758','SOLEDAD','0','N/A',8,42),('18785','SOLITA','0','N/A',18,42),('15761','SOMONDOCO','9','ORIENTE',15,42),('05756','SONSON','0','N/A',5,42),('05761','SOPETRAN','0','N/A',5,42),('13760','SOPLAVIENTO','0','N/A',13,42),('25758','SOPO','0','N/A',25,42),('15762','SORA','1','CENTRO',15,42),('15764','SORACA','1','CENTRO',15,42),('15763','SOTAQUIRA','1','CENTRO',15,42),('19760','SOTARA','0','N/A',19,42),('68770','SUAITA','0','N/A',68,42),('08770','SUAN','0','N/A',8,42),('19780','SUAREZ','0','N/A',19,42),('73770','SUAREZ','0','N/A',73,42),('41770','SUAZA','0','N/A',41,42),('25769','SUBACHOQUE','0','N/A',25,42),('19785','SUCRE','0','N/A',19,42),('68773','SUCRE','0','N/A',68,42),('70771','SUCRE','0','N/A',70,42),('25772','SUESCA','0','N/A',25,42),('25777','SUPATA','0','N/A',25,42),('17777','SUPIA','0','N/A',17,42),('68780','SURATA','0','N/A',68,42),('25779','SUSA','0','N/A',25,42),('15774','SUSACON','2','NORTE',15,42),('15776','SUTAMARCHAN','10','RICAURTE',15,42),('25781','SUTATAUSA','0','N/A',25,42),('15778','SUTATENZA','9','ORIENTE',15,42),('25785','TABIO','0','N/A',25,42),('27787','TADO','0','N/A',27,42),('13780','TALAIGUA NUEVO','0','N/A',13,42),('20787','TAMALAMEQUE','0','N/A',20,42),('85400','TAMARA','0','N/A',85,42),('81794','TAME','0','N/A',81,42),('05789','TAMESIS','0','N/A',5,42),('52786','TAMINANGO','0','N/A',52,42),('52788','TANGUA','0','N/A',52,42),('97666','TARAIRA','0','N/A',97,42),('91798','TARAPACA (CD)','0','N/A',91,42),('05790','TARAZA','0','N/A',5,42),('41791','TARQUI','0','N/A',41,42),('05792','TARSO','0','N/A',5,42),('15790','TASCO','13','VALDERRAMA',15,42),('85410','TAURAMENA','0','N/A',85,42),('25793','TAUSA','0','N/A',25,42),('41799','TELLO','0','N/A',41,42),('25797','TENA','0','N/A',25,42),('47798','TENERIFE','0','N/A',47,42),('25799','TENJO','0','N/A',25,42),('15798','TENZA','9','ORIENTE',15,42),('54800','TEORAMA','0','N/A',54,42),('41801','TERUEL','0','N/A',41,42),('41797','TESALIA','0','N/A',41,42),('25805','TIBACUY','0','N/A',25,42),('15804','TIBANA','4','MARQUEZ',15,42),('15806','TIBASOSA','11','SUGAMUXI',15,42),('25807','TIBIRITA','0','N/A',25,42),('54810','TIBU','0','N/A',54,42),('23807','TIERRALTA','0','N/A',23,42),('41807','TIMANA','0','N/A',41,42),('19807','TIMBIO','0','N/A',19,42),('19809','TIMBIQUI','0','N/A',19,42),('15808','TINJACA','10','RICAURTE',15,42),('15810','TIPACOQUE','2','NORTE',15,42),('13810','TIQUISIO (PUERTO RICO)','0','N/A',13,42),('05809','TITIRIBI','0','N/A',5,42),('15814','TOCA','1','CENTRO',15,42),('25815','TOCAIMA','0','N/A',25,42),('25817','TOCANCIPA','0','N/A',25,42),('15816','TOGUI','10','RICAURTE',15,42),('05819','TOLEDO','0','N/A',5,42),('54820','TOLEDO','0','N/A',54,42),('70820','TOLU','0','N/A',70,42),('70823','TOLUVIEJO','0','N/A',70,42),('68820','TONA','0','N/A',68,42),('15820','TOPAGA','11','SUGAMUXI',15,42),('25823','TOPAIPI','0','N/A',25,42),('19821','TORIBIO','0','N/A',19,42),('76823','TORO','0','N/A',76,42),('15822','TOTA','11','SUGAMUXI',15,42),('19824','TOTORO','0','N/A',19,42),('85430','TRINIDAD','0','N/A',85,42),('76828','TRUJILLO','0','N/A',76,42),('08832','TUBARA','0','N/A',8,42),('23815','TUCHIN','0','N/A',23,42),('76834','TULUA','0','N/A',76,42),('52835','TUMACO','0','N/A',52,42),('15001','TUNJA','1','CENTRO',15,42),('15832','TUNUNGUA','8','OCCIDENTE',15,42),('52838','TUQUERRES','0','N/A',52,42),('13836','TURBACO','0','N/A',13,42),('13838','TURBANA','0','N/A',13,42),('05837','TURBO','0','N/A',5,42),('15835','TURMEQUE','4','MARQUEZ',15,42),('15837','TUTA','1','CENTRO',15,42),('15839','TUTAZA','12','TUNDAMA',15,42),('25839','UBALA','0','N/A',25,42),('25841','UBAQUE','0','N/A',25,42),('25843','UBATE','0','N/A',25,42),('76845','ULLOA','0','N/A',76,42),('15842','UMBITA','4','MARQUEZ',15,42),('25845','UNE','0','N/A',25,42),('27800','UNGUIA','0','N/A',27,42),('27810','UNION PANAMERICANA','0','N/A',27,42),('05842','URAMITA','0','N/A',5,42),('44847','URIBIA','0','N/A',44,42),('05847','URRAO','0','N/A',5,42),('44855','URUMITA','0','N/A',44,42),('08849','USIACURI','0','N/A',8,42),('25851','UTICA','0','N/A',25,42),('05854','VALDIVIA','0','N/A',5,42),('23855','VALENCIA','0','N/A',23,42),('68855','VALLE DE SAN JOSE','0','N/A',68,42),('73854','VALLE DE SAN JUAN','0','N/A',73,42),('86865','VALLE DEL GUAMUEZ','0','N/A',86,42),('20001','VALLEDUPAR','0','N/A',20,42),('05856','VALPARAISO','0','N/A',5,42),('18860','VALPARAISO','0','N/A',18,42),('05858','VEGACHI','0','N/A',5,42),('68861','VELEZ','0','N/A',68,42),('73861','VENADILLO','0','N/A',73,42),('05861','VENECIA','0','N/A',5,42),('15861','VENTAQUEMADA','1','CENTRO',15,42),('25862','VERGARA','0','N/A',25,42),('76863','VERSALLES','0','N/A',76,42),('68867','VETAS','0','N/A',68,42),('25867','VIANI','0','N/A',25,42),('17867','VICTORIA','0','N/A',17,42),('05873','VIGIA DEL FUERTE','0','N/A',5,42),('76869','VIJES','0','N/A',76,42),('54871','VILLA CARO','0','N/A',54,42),('15407','VILLA DE LEYVA','10','RICAURTE',15,42),('54874','VILLA DEL ROSARIO','0','N/A',54,42),('86885','VILLAGARZON','0','N/A',86,42),('25871','VILLAGOMEZ','0','N/A',25,42),('73870','VILLAHERMOSA','0','N/A',73,42),('17873','VILLAMARIA','0','N/A',17,42),('13873','VILLANUEVA','0','N/A',13,42),('44874','VILLANUEVA','0','N/A',44,42),('68872','VILLANUEVA','0','N/A',68,42),('85440','VILLANUEVA','0','N/A',85,42),('25873','VILLAPINZON','0','N/A',25,42),('19845','VILLARICA','0','N/A',19,42),('73873','VILLARICA','0','N/A',73,42),('50001','VILLAVICENCIO','0','N/A',50,42),('41872','VILLAVIEJA','0','N/A',41,42),('25875','VILLETA','0','N/A',25,42),('25878','VIOTA','0','N/A',25,42),('15879','VIRACACHA','4','MARQUEZ',15,42),('50711','VISTAHERMOSA','0','N/A',50,42),('17877','VITERBO','0','N/A',17,42),('25885','YACOPI','0','N/A',25,42),('52885','YACUANQUER','0','N/A',52,42),('41885','YAGUARA','0','N/A',41,42),('05885','YALI','0','N/A',5,42),('05887','YARUMAL','0','N/A',5,42),('97889','YAVARATE (CD)','0','N/A',97,42),('05890','YOLOMBO','0','N/A',5,42),('05893','YONDO (CASABE)','0','N/A',5,42),('85001','YOPAL','0','N/A',85,42),('76890','YOTOCO','0','N/A',76,42),('76892','YUMBO','0','N/A',76,42),('13894','ZAMBRANO','0','N/A',13,42),('68895','ZAPATOCA','0','N/A',68,42),('47960','ZAPAYAN','0','N/A',47,42),('05895','ZARAGOZA','0','N/A',5,42),('76895','ZARZAL','0','N/A',76,42),('15897','ZETAQUIRA','5','LENGUPA',15,42),('25898','ZIPACON','0','N/A',25,42),('25899','ZIPAQUIRA','0','N/A',25,42),('47980','ZONA BANANERA','0','N/A',47,42),('08001','BARRANQUILLA','0','N/A',0,42),('13001','CARTAGENA','0','N/A',0,42),('0000','N/A','0',NULL,NULL,0);
/*!40000 ALTER TABLE `municipios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ninnosnna`
--

DROP TABLE IF EXISTS `ninnosnna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ninnosnna` (
  `id_ninnos` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_documento` varchar(4) DEFAULT NULL,
  `No_identificacion` int(11) NOT NULL,
  `Nombres` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `Edad` varchar(15) DEFAULT NULL,
  `Direccion` varchar(30) DEFAULT NULL,
  `telefono_movil` varchar(255) DEFAULT NULL,
  `correo_electronico` varchar(255) DEFAULT NULL,
  `id_genero` varchar(1) DEFAULT NULL,
  `id_estrato` int(3) DEFAULT NULL,
  `id_niveleducativo` int(3) DEFAULT NULL,
  `id_cuidadores` int(11) DEFAULT NULL,
  `id_departamento` varchar(5) DEFAULT NULL,
  `id_municipio` varchar(50) DEFAULT NULL,
  `id_provincia` varchar(5) DEFAULT NULL,
  `id_regimen` int(3) DEFAULT NULL,
  `id_eps` varchar(100) DEFAULT NULL,
  `id_etnia` varchar(2) DEFAULT NULL,
  `Puntaje_Sisben` varchar(255) DEFAULT NULL,
  `id_zona` varchar(3) DEFAULT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) NOT NULL,
  `id_motivo_ingreso` varchar(6) NOT NULL,
  `fecha_hechos` date NOT NULL,
  `id_municipio_hechos` varchar(10) NOT NULL,
  `id_lugar_hechos` varchar(10) NOT NULL,
  `vinculo_agresor` varchar(10) NOT NULL,
  `edad_agresor` varchar(10) NOT NULL,
  `nivel_escolaridad` varchar(10) NOT NULL,
  `id_pais` varchar(11) DEFAULT NULL,
  UNIQUE KEY `id_ninnos` (`id_ninnos`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ninnosnna`
--

LOCK TABLES `ninnosnna` WRITE;
/*!40000 ALTER TABLE `ninnosnna` DISABLE KEYS */;
INSERT INTO `ninnosnna` VALUES (28,'TI',1151672567,'VALENTINA','VARGAS','2011-03-23','11','carrera 12 n 20-30',NULL,NULL,'F',2,2,0,'0','0','0',2,'EPS001','1','C5','R','0000-00-00 00:00:00',42101110,'MI-01','2022-06-15','15022','CASUHO','MADRE','30','MEDIA','42'),(29,'TI',1057585858,'MARCELA','PAEZ','2010-01-19','12','carrera 12 n 20-30',NULL,NULL,'F',2,2,0,'15','15047','11',2,'CCF007','1','C5','U','0000-00-00 00:00:00',42101110,'MI-01','2022-06-16','15047','CASUHO','CUIDADOR','40','PREGRADO','42'),(30,'TI',1057575757,'SOFIA','CERON','2007-05-08','15','CALLE 21 N 30 -49',NULL,NULL,'F',2,4,0,'15','15114','12',3,'CCFC07 ','1','C7','U','0000-00-00 00:00:00',42101110,'MI-01','2022-06-03','15114','CASUHO','MADRE','40','MEDIA','42'),(31,'TI',1057585858,'ANA','MARTINEZ','2008-06-11','14','CALLE 21 N 30 -49',NULL,NULL,'F',4,3,0,'15','15097','2',3,'CCFC07 ','1','C30','U','0000-00-00 00:00:00',42101110,'MI-05','2022-06-09','15185','VIAPUB','CUIDADOR','50','BASICA_SEC','42'),(32,'TI',1151672888,'CATALINA','MEDINA','0000-00-00','8','CALLE 21 N 30 -49','3205679555','rosalba7@gmail.com','F',1,2,0,'15','15022','9',2,'CCF007','1','A3','R','0000-00-00 00:00:00',42101110,'MI-26','2022-06-15','15022','VIAPUB','CUIDADOR','45','MEDIA','42'),(33,'TI',1151672500,'IVA','RIOS','2007-05-07','15','carrera 5 n 10-30',NULL,NULL,'M',3,3,0,'15','15022','9',3,'EPS017','1','A3','U','0000-00-00 00:00:00',42101110,'MI-05','2022-05-19','15022','VIAPUB','CONOCIDO','67','BASICA_PRI','42'),(34,'TI',1151672000,'IVAN','RIOS','2007-01-19','15','CALLE 20 n 30 - 40',NULL,NULL,'M',2,2,0,'15','15051','10',2,'CCF007','1','C5','U','0000-00-00 00:00:00',42101110,'MI-01','2022-06-16','15051','CASUHO','CUIDADOR','30','PREGRADO','42'),(35,'TI',1057585000,'FERNANDO','RIOS','2014-06-10','8','carrera 12 n 20-79','3208889911','ferl@gmail.com','M',2,2,0,'15','15114','12',1,'NOAF','5','A3','R','2022-07-02 17:05:34',42101110,'MI-12','2022-06-15','15092','VIAPUB','MADRE','45','MEDIA','42');
/*!40000 ALTER TABLE `ninnosnna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nivel_educativo`
--

DROP TABLE IF EXISTS `nivel_educativo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nivel_educativo` (
  `id_niveleducativo` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivel_educativo`
--

LOCK TABLES `nivel_educativo` WRITE;
/*!40000 ALTER TABLE `nivel_educativo` DISABLE KEYS */;
INSERT INTO `nivel_educativo` VALUES (1,'SIN ESCOLARIDAD'),(2,'BASICA PRIMARIA'),(3,'BASICA SECUNDARIA'),(4,'MEDIA ACADEMICA/TECNICA'),(5,'PREGRADO'),(6,'POSTGRADO');
/*!40000 ALTER TABLE `nivel_educativo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nivel_escolaridad`
--

DROP TABLE IF EXISTS `nivel_escolaridad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nivel_escolaridad` (
  `ID_ESCOLARIDAD` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_escolaridad` varchar(100) NOT NULL,
  `desc_escolaridad` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_ESCOLARIDAD`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivel_escolaridad`
--

LOCK TABLES `nivel_escolaridad` WRITE;
/*!40000 ALTER TABLE `nivel_escolaridad` DISABLE KEYS */;
INSERT INTO `nivel_escolaridad` VALUES (1,'SIN','SIN ESCOLARIDAD'),(2,'BASICA_PRI','BASICA PRIMARIA'),(3,'BASICA_SECU','BASICA SECUNDARIA'),(4,'MEDIA','MEDIA ACADEMICA/TECNICA'),(5,'PREGRADO','PREGRADO'),(6,'POSTGRADO','POSTGRADO');
/*!40000 ALTER TABLE `nivel_escolaridad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paises`
--

DROP TABLE IF EXISTS `paises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paises` (
  `Id_Pais` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Pais`)
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paises`
--

LOCK TABLES `paises` WRITE;
/*!40000 ALTER TABLE `paises` DISABLE KEYS */;
INSERT INTO `paises` VALUES (23,'BOLIVIA'),(38,'CHILE'),(42,'COLOMBIA'),(52,'ECUADOR'),(140,'PERU'),(179,'TRINIDAD Y TOBAGO'),(186,'URUGUAY'),(189,'VENEZUELA');
/*!40000 ALTER TABLE `paises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parentescos`
--

DROP TABLE IF EXISTS `parentescos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parentescos` (
  `id_parentesco` int(3) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_parentesco`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parentescos`
--

LOCK TABLES `parentescos` WRITE;
/*!40000 ALTER TABLE `parentescos` DISABLE KEYS */;
INSERT INTO `parentescos` VALUES (1,'PAPÁ'),(2,'MAMÁ'),(3,'HERMANO (A)'),(4,'TIO (A)'),(5,'ABUELO (A)'),(6,'PRIMO (A)'),(7,'PADRINO/MADRINA'),(8,'FAMILIAR CERCANO'),(9,'AMIGO (A)'),(10,'VECINO (A)'),(11,'OTRO');
/*!40000 ALTER TABLE `parentescos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfiles`
--

LOCK TABLES `perfiles` WRITE;
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
INSERT INTO `perfiles` VALUES (1,'ADMINISTRADOR'),(2,'DIRECTOR'),(3,'SUPERVISOR'),(4,'ENLACE MUNICIPAL'),(5,'INVITADO'),(6,'COMISARIA DE FAMILIA'),(7,'PERSONERIA'),(8,'PROCURADURIA'),(9,'JUEZ DE FAMILIA'),(10,'SUPERADMINISTRADOR');
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincias`
--

DROP TABLE IF EXISTS `provincias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincias` (
  `id_provincia` varchar(7) NOT NULL,
  `descripcion_prov` varchar(50) DEFAULT NULL,
  UNIQUE KEY `id_provincia` (`id_provincia`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincias`
--

LOCK TABLES `provincias` WRITE;
/*!40000 ALTER TABLE `provincias` DISABLE KEYS */;
INSERT INTO `provincias` VALUES ('1','CENTRO'),('2','NORTE'),('3','NEIRA'),('4','MARQUEZ'),('5','LENGUPA'),('6','LA LIBERTAD'),('7','GUTIERREZ'),('8','OCCIDENTE'),('9','ORIENTE'),('10','RICAURTE'),('11','SUGAMUXI'),('12','TUNDAMA'),('13','VALDERRAMA'),('0','N/A');
/*!40000 ALTER TABLE `provincias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regimenes`
--

DROP TABLE IF EXISTS `regimenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regimenes` (
  `id_regimen` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_regimen`),
  UNIQUE KEY `id_afiliacion` (`id_regimen`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regimenes`
--

LOCK TABLES `regimenes` WRITE;
/*!40000 ALTER TABLE `regimenes` DISABLE KEYS */;
INSERT INTO `regimenes` VALUES (1,'NO AFILIADO/ASEGURADO'),(2,'SUBSIDIADO'),(3,'CONTRIBUTIVO'),(4,'ESPECIAL'),(5,'COMPLEMENTARIO');
/*!40000 ALTER TABLE `regimenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remite`
--

DROP TABLE IF EXISTS `remite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `remite` (
  `id_remite` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_expediente` int(11) NOT NULL,
  `id_ninnos` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `usuario_que_remite` int(11) NOT NULL,
  PRIMARY KEY (`id_remite`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remite`
--

LOCK TABLES `remite` WRITE;
/*!40000 ALTER TABLE `remite` DISABLE KEYS */;
/*!40000 ALTER TABLE `remite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `si_no`
--

DROP TABLE IF EXISTS `si_no`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `si_no` (
  `id_sino` int(2) NOT NULL AUTO_INCREMENT,
  `nom_sino` varchar(3) NOT NULL,
  PRIMARY KEY (`id_sino`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `si_no`
--

LOCK TABLES `si_no` WRITE;
/*!40000 ALTER TABLE `si_no` DISABLE KEYS */;
INSERT INTO `si_no` VALUES (1,'SI'),(2,'NO');
/*!40000 ALTER TABLE `si_no` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_documentos`
--

DROP TABLE IF EXISTS `tipos_documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipos_documentos` (
  `id_tipo_documento` varchar(4) NOT NULL,
  `descripcion` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_documentos`
--

LOCK TABLES `tipos_documentos` WRITE;
/*!40000 ALTER TABLE `tipos_documentos` DISABLE KEYS */;
INSERT INTO `tipos_documentos` VALUES ('RC','REGISTRO CIVIL'),('TI','TARJETA DE IDENTIDAD'),('CC','CEDULA DE CIUDADANÍA'),('CE','CEDULA DE EXTRANJERÍA'),('NUIP','NÚMERO ÚNICO DE IDENTIFICACIÓN'),('PEP','PERMISO ESPECIAL PERMANENCIA'),('PA','PASAPORTE'),('TE','TARJETA DE EXTRANJERÍA');
/*!40000 ALTER TABLE `tipos_documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `apellidos` varchar(50) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `id_tipo_documento` varchar(2) DEFAULT NULL,
  `numero_documento` varchar(20) DEFAULT NULL,
  `id_genero` varchar(1) DEFAULT NULL,
  `id_municipio` varchar(5) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `Nivel` varchar(2) NOT NULL,
  `id_entidad` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  UNIQUE KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=178 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (140,'LOPEZ VARGAS','JUAN FERNANDO','CC','1059233331','M','15001','3102411770','ELE_CHITA','4800a60d048c013082c216abff367479','juanlvargas77@gmail.com',4,'3',0,1,'2017-10-20 05:00:00'),(2,'LIZARAZO VARGAS','JUAN JOSE','CC','7179749','M','15001','3123177311','ing.juan.jose','4800a60d048c013082c216abff367479','juanitoenter@gmail.com',1,'3',2,1,'0000-00-00 00:00:00'),(3,'CHIQUILLO ORTIZ','LINA CECILIA','CC','23456777','F','15001','7420150','lina.chiquillo','4800a60d048c013082c216abff367479','secretario.integracionsocial@boyaca.gov.co',1,'3',2,1,'0000-00-00 00:00:00'),(4,'INFANCIA','PRIMERA','CC','40001123','F','15001','74202223','PRIMERA_INFANCIA','4800a60d048c013082c216abff367479','Primerainfancia@boyaca.gov.co',2,'3',1,1,'0000-00-00 00:00:00'),(5,'BARAJAS CARO','LUZ MARINA','CC','41001100','F','15879','3138040230','CDF_VIRACACHA','4800a60d048c013082c216abff367479','comisaria@viracacha-boyaca.gov.co',3,'2',6,1,'0000-00-00 00:00:00'),(6,'REYES MENDOZA','LEIDY YOBANA','CC','42101110','F','15001','3118852131','CDF_ZETAQUIRA','4800a60d048c013082c216abff367479','comisaria@zetaquira-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(7,'AVILA BONILLA ','MALLERSSY ENESVEY ','CC','42301447','F','15022','3213154824','CDF_ALMEIDA','4800a60d048c013082c216abff367479','comisaria@almeida-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(8,'AGUILERA','JENNY KATERINE','CC','43200987','F','15047','31250037373 - 3142247311','CDF_AQUITANIA','4800a60d048c013082c216abff367479','comisaria@aquitania-boyaca.gov.co jennykaterine.aguilera@ulagrancolombia.edu.co',6,'2',6,1,'0000-00-00 00:00:00'),(9,'GALLARDO AMAYA','IVON GISSELLA ','CC','44567777','F','15051','3214105638','CDF_ARCABUCO','4800a60d048c013082c216abff367479','alcaldia@arcabuco-boyaca.gov.co  draivongallardo@hotmail.com',6,'2',6,1,'0000-00-00 00:00:00'),(10,'PEREZ DE LOS RIOS','PATRICIA','CC','45767909','F','15087','3002851577','CDF_BELEN','4800a60d048c013082c216abff367479','perezdelosrios-abogada@hotmail.com comisaria@belen-boyaca.gov.co\n\n',6,'2',6,1,'0000-00-00 00:00:00'),(11,'DAZA BARAHONA','MILTON JOSE','CC','40987654','M','15090','31034655798','CDF_BERBEO','4800a60d048c013082c216abff367479','\ncomisaria@berbeo-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(12,'GALINDO SANCHEZ','ANGELA ROCIO','CC','41090977','F','15092','3125301543','CDF_BETEITIVA','4800a60d048c013082c216abff367479','comisariadefamilia@beteitiva-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(13,'MOJICA MOJICA','CAROLINA DEL PILAR','CC','52711097','F','15097','3134728554','CDF_BOAVITA','4800a60d048c013082c216abff367479','comisariadefamilia@boavita-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(14,'FONSECA CARO','VANESA ALEJANDRA','CC','40020997','F','15104','3102410225','CDF_BOYACA','4800a60d048c013082c216abff367479','comisaria@boyaca-boyaca.gov.co ',6,'2',6,1,'0000-00-00 00:00:00'),(15,'PERALTA MONROY','GERMAN ZAMIR','CC','7654332','M','15106','3208504489','CDF_BRICE?O','4800a60d048c013082c216abff367479','comisaria@briceno-boyaca.gov.co alcaldia@briceno-boyaca.gov.co\r\npgermanzamir@yahoo.es \r\n',6,'2',6,1,'0000-00-00 00:00:00'),(16,'BOCACHICA DELGADILLO','DAYANNI KATERINNE','CC','44707201','F','15109','3104967547','CDF_BUENAVISTA','4800a60d048c013082c216abff367479','katerinnebocachica@gmail.com  \nfamilia@buenavista-boyaca.gov.co  \n',6,'2',6,1,'0000-00-00 00:00:00'),(17,'ADAME NI?O','SANDRA MAYERLY','CC','40021337','F','15114','3114925723','CDF_BUSBANZA','4800a60d048c013082c216abff367479','comisariabusbanza@gmail.com \ncomisariadefamilia@busbanza-boyaca.gov.co  \n',6,'2',6,1,'0000-00-00 00:00:00'),(18,'GONZ??LEZ CASTRO','HECTOR MANUEL','CC','7771230','M','15131','3204994583','CDF_CALDAS','4800a60d048c013082c216abff367479','comisariadefamilia@caldas-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(19,'AMEZQUITA GUAR?N','DIEGO IV?N','CC','74130244','M','15135','3102197576 - 3115419662','CDF_CAMPOHERMOSO','4800a60d048c013082c216abff367479','comisaria@campohermoso-boyaca.gov.co\n\n',6,'2',6,1,'0000-00-00 00:00:00'),(20,'MORALES MARTINEZ','NIDIA IBETH','CC','74090371','F','15162','3197056096','CDF_CERINZA','4800a60d048c013082c216abff367479','comisariafamilia@cerinza-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(21,'REYES REYES','JOSE GONZALO','CC','40017742','M','15172','3115807822','CDF_CHINAVITA','4800a60d048c013082c216abff367479','comisariadefamilia@chinavita-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(22,'CUELLAR JIMENEZ','MILTON EDILBERTO','CC','40044572','M','15176','3115296783','CDF_CHIQUINQUIRA','4800a60d048c013082c216abff367479','comisariadefamilia@chiquinquira-boyaca.gov.co   \r\nelizabethcomisaria@hotmail.com \r\n',6,'2',6,1,'0000-00-00 00:00:00'),(23,'TARAZONA RIVERO','YENNY ALEXANDRA','CC','23999427','F','15232','3103880621','CDF_CHIQUIZA','4800a60d048c013082c216abff367479','comisariadefamilia@chiquiza-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(24,'SUAREZ MENDEZ','JUAN MANUEL','CC','23777201','M','15180','3133501938','CDF_CHISCAS','4800a60d048c013082c216abff367479','comisariadefamilia@chiscas-boyaca.gov.co   ',6,'2',6,1,'0000-00-00 00:00:00'),(25,'GOMEZ PEREZ','YENNY PAOLA','CC','40772247','F','15183','3112714394','CDF_CHITA','4800a60d048c013082c216abff367479','comisaria@chita-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(26,'CELY TORRES','LIDA ESPERANZA','CC','21808300','F','15185','3103006447 -3132430448','CDF_CHITARAQUE','4800a60d048c013082c216abff367479','comisaria@chitaraque-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(27,'QUINTANA P?EZ','NIGUHIER FRANCISCO','CC','74740047','M','15187','3123824931','CDF_CHIVATA','4800a60d048c013082c216abff367479','comisariadefamilia@chivata-boyaca.gov.co \r\nfranciscoqp7@yahoo.es\r\n',6,'2',6,1,'0000-00-00 00:00:00'),(28,'SILVA RANGEL','MARITZA','CC','40711112','F','15236','3138857870','CDF_CHIVOR','4800a60d048c013082c216abff367479','\ncomisariadefamilia@chivor-boyaca.gov.co ',6,'2',6,1,'0000-00-00 00:00:00'),(29,'LEMUS ARIAS','JENNY PAOLA','CC','7181427','F','15189','3102887563','CDF_CIENEGA','4800a60d048c013082c216abff367479','comisariadefamilia@cienega-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(30,'SU??REZ SU??REZ','LINA MARCELA','CC','20007479','F','15204','3115243513','CDF_COMBITA','4800a60d048c013082c216abff367479','comisariadefamilia@combita-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(31,'SANTAMARIA VALBUENA','VLADIMER','CC','7184323','M','15212','3102458982','CDF_COPER','4800a60d048c013082c216abff367479','comisariadefamilia@coper-boyaca.gov.co \r\nvladimersantamaria@hotmail.com \r\n',6,'2',6,1,'0000-00-00 00:00:00'),(32,'NU?EZ PRECIADO','DIANA CAROLINA','CC','23007784','F','15215','3114510108','CDF_CORRALES','4800a60d048c013082c216abff367479','comisaria@corrales-boyaca.gov.co \r\nkarolpre@hotmail.com\r\n',6,'2',6,1,'0000-00-00 00:00:00'),(33,'JAIMES BERMUDEZ','JOHANNA','CC','6761009','F','15218','3138709295','CDF_COVARACHIA','4800a60d048c013082c216abff367479','comisariadefamilia@covarachia-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(34,'TEGRIA UNCARA','EVARISTO','CC','7199240','M','15223','3204499951','CDF_CUBARA','4800a60d048c013082c216abff367479','comisaria@cubara-boyaca.gov.co \r\nastridcaroj@hotmail.com',6,'2',6,1,'0000-00-00 00:00:00'),(35,'OT??LORA MOZO','ANA YOLIMA','CC','23566900','F','15224','3123185036','CDF_CUCAITA','4800a60d048c013082c216abff367479','comisaria@cucaita-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(36,'TALERO PULIDO','MARIA LORENZA','CC','7179403','F','15226','3006249502','CDF_CUITIVA','4800a60d048c013082c216abff367479','comisariadefamilia@cuitiva-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(37,'PITA LAVERDE','LINA ROCIO','CC','24777997','F','15238','3138363756','CDF_DUITAMA','4800a60d048c013082c216abff367479','comisaria2@duitama-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(38,'OROZCO MARTINEZ','AURA LUCILA','CC','41222771','F','15244','3202673276','CDF_ELCOCUY','4800a60d048c013082c216abff367479','comisariadefamilia@elcocuy-boyaca.gov.co \naura.orozco.m@hotmail.com\n',6,'2',6,1,'0000-00-00 00:00:00'),(39,'ESCAMILLA CORREA','LILIANA SOFIA','CC','23080772','F','15248','3212101858','CDF_ELESPINO','4800a60d048c013082c216abff367479','comisariadefamilia@elespino-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(40,'CAMARGO BARRERA','AURA MILENA','CC','40010107','F','15272','3144455127','CDF_FIRAVITOBA','4800a60d048c013082c216abff367479','comisaria@firavitoba-boyaca.goc.co',6,'2',6,1,'0000-00-00 00:00:00'),(41,'CRUZ PAREDES','LUISA FERNANDA','CC','40765533','F','15276','3115091345','CDF_FLORESTA','4800a60d048c013082c216abff367479','comisaria@floresta-boyaca.gov.co ',6,'2',6,1,'0000-00-00 00:00:00'),(42,'TORRES GAONA','ANA OFELIA','CC','1049234707','F','15293','3133358511','CDF_GACHANTIVA','4800a60d048c013082c216abff367479','Comisariadefamilia@gachantiva-boyaca.gov.co ',6,'2',6,1,'0000-00-00 00:00:00'),(43,'CRISTANCHO CUTA','DIANA YAQUELINE','CC','40027120','F','15296','3212329886','CDF_GAMEZA','4800a60d048c013082c216abff367479','comisariadefamiliagameza@hotmail.com\ndianacr17@hotmail.com \n',6,'2',6,1,'0000-00-00 00:00:00'),(44,'ORTEGA GARZ?N','PAULA LISSETTE','CC','40024721','F','15299','3134813190','CDF_GARAGOA','4800a60d048c013082c216abff367479','comisariadefamilia@garagoa-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(45,'CUY CHAPARRO','CLAUDIA LILIANA','CC','23909333','F','15317','3209161173 extensi?n: 107','CDF_GUACAMAYAS','4800a60d048c013082c216abff367479','comisaria@guacamayas-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(46,'AVILA RODRIGUEZ','CINDY ROCIO','CC','23544472','F','15322','3132441848','CDF_GUATEQUE','4800a60d048c013082c216abff367479','comisariaguateque2016@gmail.com comisariadefamilia@guateque-boyaca.gov.co ',6,'2',6,1,'0000-00-00 00:00:00'),(47,'PINTO SALAMANCA','ANDRES ALBERTO','CC','7167720','M','15325','3184827010','CDF_GUAYATA','4800a60d048c013082c216abff367479','comisaria-familia@guayata-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(48,'MENDIVELSO TORRES','JULIO ROBERTO','CC','6742210','M','15332','3155541448 - 3103227544','CDF_GUICAN','4800a60d048c013082c216abff367479','juliomendivelso64@hotmail.es \ncomisaria.guican@gmail.com   comisaria@guican-boyaca.gov.co ',6,'2',6,1,'0000-00-00 00:00:00'),(49,'GRANADOS TALERO','CLAUDIA LUCIA','CC','34243970','F','15362','320 2276328','CDF_IZA','4800a60d048c013082c216abff367479','Comisariadefamilia@iza-boyaca.gov.co \r\nclaudiagyt@hotmail.com\r\n',6,'2',6,1,'0000-00-00 00:00:00'),(50,'ROJAS RODRIGUEZ','AURA LILIANA','CC','1049297555','F','15367','3155583752','CDF_JENESANO','4800a60d048c013082c216abff367479','dra_lilo@hotmail.com    \r\ncomisariadefamilia@jenesano-boyaca.gov.co \r\n',6,'2',6,1,'0000-00-00 00:00:00'),(51,'MU?OZ MANRIQUE','ASTRID LILIANA','CC','24977399','F','15368','3102692570','CDF_JERICO','4800a60d048c013082c216abff367479','comisaria@jerico-boyaca.gov.co \r\nsecretariadegobierno@jerico-boyaca.gov.co \r\n',6,'2',6,1,'0000-00-00 00:00:00'),(52,'PEREZ FERNANDEZ','ANGEL MARIA','CC','7180244','M','15377','3124580004','CDF_LABRANZAGRANDE','4800a60d048c013082c216abff367479','comisaria@labranzagrande-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(53,'RODRIGUEZ GONZALEZ','ANA YALILE','CC','40090971','F','15380','3208494825','CDF_LACAPILLA','4800a60d048c013082c216abff367479','comdefamilia@lacapilla-boyaca.gov.co \r\nanayalilerodriguez@gmail.com',6,'2',6,1,'0000-00-00 00:00:00'),(54,'BERNAL DIAZ','YEISON','CC','74555699','M','15403','3125593370','CDF_LAUVITA','4800a60d048c013082c216abff367479','alcaldia@lauvita-boyaca.gov.co \ncomisaria@lauvita-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(55,'FIERRO VARGAS','YENYFER ALEXANDRA','CC','47927324','F','','3168268600','CDF_LAVICTORIA','4800a60d048c013082c216abff367479','comisariadefamilia@lavictoria-boyaca.gov.co comisaria@lavictoria-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(56,'AGUILLON ALFONSO','JENNITH ROCIO','CC','40012277','F','15425','3214467384','CDF_MACANAL','4800a60d048c013082c216abff367479','comisariadefamilia@macanal-boyaca.gov.co \r\njenithaguillon@hotmail.com \r\n',6,'2',6,1,'0000-00-00 00:00:00'),(57,'CASTELLANOS PINILLA','ALBA YANETH','CC','23997773','F','15442','3138221243','CDF_MARIPI','4800a60d048c013082c216abff367479','comisariafamilia@maripi-boyaca.gov.co ',6,'2',6,1,'0000-00-00 00:00:00'),(58,'ZUBIETA POCHES','DERLY YULIETH','CC','40179942','F','15455','3203453562','CDF_MIRAFLORES','4800a60d048c013082c216abff367479','comisaria_miraflores@hotmail.com comisariadefamiliamiraflores@gmail.com  ',6,'2',6,1,'0000-00-00 00:00:00'),(59,'PUERTO GOMEZ','EDGAR ALBERTO','CC','7181474','M','15464','3204195065','CDF_MONGUA','4800a60d048c013082c216abff367479','comisaria@mongua-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(60,'RINCON BARRERA','YENNY CAROLINA','CC','40029433','F','15466','3178950997','CDF_MONGUI','4800a60d048c013082c216abff367479','comisariadefamilia@mongui-boyaca.gov.co \r\nyennycarolina.rincon@gmail.com',6,'2',6,1,'0000-00-00 00:00:00'),(61,'GAMBA COY','JOSE PASTOR','CC','7172209','M','15469','3124306452/7282413','CDF_MONIQUIRA','4800a60d048c013082c216abff367479','comisaria@moniquira-boyaca.gov.co josepastorgc@yahoo.es',6,'2',6,1,'0000-00-00 00:00:00'),(62,'QUITO ROBERTO','YINA TINETH','CC','40101707','F','15476','3107553306','CDF_MOTAVITA','4800a60d048c013082c216abff367479','comisariadefamilia@motavita-boyaca.gov.co  ',6,'2',6,1,'0000-00-00 00:00:00'),(63,'MARTINEZ TRIANA','EDGAR ANDRES','CC','7184555','M','15480','3105522712','CDF_MUZO','4800a60d048c013082c216abff367479','comisaria@muzo-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(64,'BARRERA ACEVEDO','ANGELA PAOLA','CC','40017747','F','15491','3102607846','CDF_NOBSA','4800a60d048c013082c216abff367479','comisariadefamilianobsa@hotmail.com \nangelapaolabarrera@gmail.com \n',6,'2',6,1,'0000-00-00 00:00:00'),(65,'SANCHEZ SANCHEZ','JUAN CARLOS','CC','7183456','M','15494','3115231750 - 3208346953','CDF_NUEVOCOLON','4800a60d048c013082c216abff367479','comisaria@nuevocolon-boyaca.gov.co ',6,'2',6,1,'0000-00-00 00:00:00'),(66,'GOMEZ CANARIA','ERIKA XIMENA','CC','23771900','F','15500','3144138761/7401818','CDF_OICATA','4800a60d048c013082c216abff367479','comisaria@oicata-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(67,'DIAZ CASTRO','CLARA ELISA','CC','40900231','F','15507','3103358313','CDF_OTANCHE','4800a60d048c013082c216abff367479','comisaria@otanche-boyaca.gov.co \nklarizad@gmail.com\n',6,'2',6,1,'0000-00-00 00:00:00'),(68,'RODRIGUEZ URREGO','LEIDY JOHANNA','CC','40107700','F','15511','3202530413','CDF_PACHAVITA','4800a60d048c013082c216abff367479','comisariadefamilia@pachavita-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(69,'MARTINEZ BARRETO','SANDRA MILENA','CC','40999211','F','15514','3133674733','CDF_PAEZ','4800a60d048c013082c216abff367479','comisaria@paez-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(70,'NI?O PAIPILLA','ANA VELICE','CC','40011227','F','15516','3188016910','CDF1_PAIPA','4800a60d048c013082c216abff367479','comisaria@paipa-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(71,'ROJAS BARRERA','SANDRA MARCELA','CC','','F','','3229089318 - 3209775363','CDF2_PAIPA','4800a60d048c013082c216abff367479','comisaria2familiapaipa@gmail.com marceredsz@hotmail.com ',0,'',0,0,'0000-00-00 00:00:00'),(72,'MOLINA ROA','CARMENZA','CC','42000339','F','15518','3208560662','CDF_PAJARITO','4800a60d048c013082c216abff367479','comisariadefamilia@pajarito-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(73,'COCUNUBO CARRE?O','JENNY PAOLA','CC','40077207','F','15522','3138325951','CDF_PANQUEBA','4800a60d048c013082c216abff367479','comisariadefamilia@panqueba-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(74,'SU?REZ GONZ?LEZ','ELIANA','CC','6755307','F','15531','3214923342 - 7253571','CDF_PAUNA','4800a60d048c013082c216abff367479','comisariadefamiliapaunaboyaca@gmail.com',6,'2',6,1,'0000-00-00 00:00:00'),(75,'GONZALEZ GONZALEZ','PAOLA ANDREA','CC','7182247','F','15533','3202837198 - 3133301057','CDF_PAYA','4800a60d048c013082c216abff367479','comisariafamilia@paya-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(76,'GAVIRIA CUEVAS','LUCIA JHOVANNNA','CC','40090997','F','15537','3108024151 - 3114640492','CDF_PAZDELRIO','4800a60d048c013082c216abff367479','comisariadefamilia.pazderio@gmail.com',6,'2',6,1,'0000-00-00 00:00:00'),(77,'?VILA SOLANO','MANUEL FERNANDO','CC','40044277','M','15542','3144854126','CDF_PESCA','4800a60d048c013082c216abff367479','comisariadefamilia@pesca-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(78,'HUERFANO GUANUMEN','MARY','CC','40088777','F','15550','3133515970','CDF_PISBA','4800a60d048c013082c216abff367479','comisariafamilia@pisba-boyaca.gov.co ',6,'2',6,1,'0000-00-00 00:00:00'),(79,'RUBIANO GUTIERREZ','ANGELICA ALEXANDRA','CC','40114477','F','15572','3105728492','CDF_PUERTOBOYACA','4800a60d048c013082c216abff367479','comisariadefamilia@puertoboyaca-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(80,'SILVA GARCIA','JENNY TATHIANA','CC','40020111','F','15580','3134467720','CDF_QUIPAMA','4800a60d048c013082c216abff367479','comisariadefamilia@quipama-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(81,'MORENO MORENO','ALICIA','CC','40999900','F','15599','3124575298','CDF_RAMIRIQUI','4800a60d048c013082c216abff367479','comisaria@ramiriqui-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(82,'ANTONIO CASTELLANOS','JULIETH ','CC','6780321','F','15600','3004651470','CDF_RAQUIRA','4800a60d048c013082c216abff367479','comisariadefamilia@raquira-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(83,'CARDENAS SOLER','AURA ELVIRA','CC','41202797','F','15621','3125292748','CDF_RONDON','4800a60d048c013082c216abff367479','comisaria@rondon-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(84,'MANCO CALDERON','YORLY KATTERINE','CC','40717007','F','15632','3209636620','CDF_SABOYA','4800a60d048c013082c216abff367479','comisaria@saboya-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(85,'PAEZ PAEZ','MARTHA LUCERO','CC','40551090','F','15638','3209042590','CDF_SACHICA','4800a60d048c013082c216abff367479','luceropaez23@hotmail.com   \r\ncomisaria@sachica-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(86,'RAMIREZ CELULAR','SANDRA RIVERA','CC','40027333','F','15646','3202717067','CDF_SAMACA','4800a60d048c013082c216abff367479','comisariadefamilia@samaca-boyaca.gov.co    ',6,'2',6,1,'0000-00-00 00:00:00'),(87,'BUITRAGO CAMPOS ','ISRAEL FERNANDO','CC','7784377','M','15660','3112457185','CDF_SANEDUARDO','4800a60d048c013082c216abff367479','comisaria-familia@saneduardo-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(88,'MARTINEZ','MARIA JULIETH','CC','74241070','F','15664','3219656926','CDF_SANJOSEDEPARE','4800a60d048c013082c216abff367479','comisaria@sanjosedepare-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(89,'BARRERA REYES','GLORIA ESPERANZA','CC','3104779620','F','15667','3103353457','CDF_SANLUISDEGACENO','4800a60d048c013082c216abff367479','comisaria@sanluisdegaceno-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(90,'GARCIA MILLAN','YANIRY ALICIA','CC','6771959','F','15673','3102576075','CDF_SANMATEO','4800a60d048c013082c216abff367479','comisaria@sanmateo-Boyac?.gov.co ',6,'2',6,1,'0000-00-00 00:00:00'),(91,'COCA RUIZ','FREDY GIOVANNY','CC','74227774','M','15676','3112808426','CDF_SANMIGUELDESEMA','4800a60d048c013082c216abff367479','comisaria@sanmigueldesema-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(92,'RINCON GOMEZ','WILSON ORLANDO','CC','7187347','F','15681','3105578264','CDF_SANPABLODEBORBUR','4800a60d048c013082c216abff367479','comisaria@sanpablodeborbur-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(93,'MORENO RESTREPO','SARA','CC','23777401','F','15690','3212092213','CDF_SANTAMARIA','4800a60d048c013082c216abff367479','comisaria@santamaria-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(94,'REYES GALVIS','GUILLERMO ALFREDO','CC','7184327','M','15693','3133720352','CDF_SANTAROSADEVITERBO','4800a60d048c013082c216abff367479','comisariadefamilia@santarosadeviterbo-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(95,'RODRIGUEZ ROBLES','ANDREA CAROLINA','CC','7177001','F','15696','3107815090','CDF_SANTASOFIA','4800a60d048c013082c216abff367479','comisariadefamilia@santasofia-boyaca.gov.co ',6,'2',6,1,'0000-00-00 00:00:00'),(96,'NU?EZ NU?EZ','MARIA JIMENA','CC','40027973','F','15686','3143000679','CDF_SANTANA','4800a60d048c013082c216abff367479','comisaria@santana-boyaca.gov.co  \nmaria.jimena.nunez@hormail.com',6,'2',6,1,'0000-00-00 00:00:00'),(97,'CORTES CELY','LIDYA ESPERANZA','CC','24557788','F','15720','3212464182','CDF_SATIVANORTE','4800a60d048c013082c216abff367479','comfamilia@sativanorte-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(98,'CABRA VELOZA','LAURA CAROLINA','CC','23927721','F','15723','3133722270','CDF_SATIVASUR','4800a60d048c013082c216abff367479','comisariadefamilia@sativasur-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(99,'PAREDES FORERO','CARLOS RAFAEL','CC','7178821','M','15740','3152820650','CDF_SIACHOQUE','4800a60d048c013082c216abff367479','comisaria@siachoque-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(100,'PE?A HERRE?O','BLANCA ORFILIA','CC','23990077','F','15753','3123508455','CDF_SOATA','4800a60d048c013082c216abff367479','blanca7004@hotmail.com \r\ncomisaria@soata-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(101,'ALVARADO DIAZ','HUMBERTO ARMANDO','CC','74333777','M','15757','3132337105','CDF_SOCHA','4800a60d048c013082c216abff367479','humbertoalvarado04@gmail.com \ncomisariadefamilia@socha-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(102,'CAMARGO JIMENEZ','AMANDA LUCIA','CC','40728844','F','15755','3112539920','CDF_SOCOTA','4800a60d048c013082c216abff367479','comisariafamilia@socota-boyaca.gov.co ',6,'2',6,1,'0000-00-00 00:00:00'),(103,'BASTOS LEON','MILENA','CC','24007112','F','15759','3186908860','CDF1_SOGAMOSO','4800a60d048c013082c216abff367479','comisaria1@sogamoso-boyaca.gov.co ',6,'2',6,1,'0000-00-00 00:00:00'),(104,'BARRERA GUATAQUI','MARIA LUMEI','CC','40701107','F','15759','3138300293','CDF2_SOGAMOSO','4800a60d048c013082c216abff367479','comisaria2@sogamoso-boyaca.gov.co  ',6,'2',6,1,'0000-00-00 00:00:00'),(105,'CHAPARRO ALVARADO','YENCI','CC','24244901','F','15759','3138300293','CDF3_SOGAMOSO','4800a60d048c013082c216abff367479','comisaria3@sogamoso-boyaca.gov.co ',6,'2',6,1,'0000-00-00 00:00:00'),(106,'REYES REYES','CARLOS JULIO','CC','40177911','M','15761','3115922342','CDF_SOMONDOCO','4800a60d048c013082c216abff367479','comisaridefamilia@somondoco-boyaca.gov.co ',6,'2',6,1,'0000-00-00 00:00:00'),(107,'SABALLETH CAJIGAS','WENDY','CC','23749477','F','15762','3202637034','CDF_SORA','4800a60d048c013082c216abff367479','comisariafamilia@sora-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(108,'PITA GUAYACAN','IVETH XIMENA','CC','42997790','F','15764','3102486479','CDF_SORACA','4800a60d048c013082c216abff367479','comisariadefamilia@soraca-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(109,'LACHE SANDOVAL','LUZ MERY','CC','44800977','F','15763','3106805444','CDF_SOTAQUIRA','4800a60d048c013082c216abff367479','comisaria@sotaquira-boyaca.gov.co \r\nlumelasan19@hotmail.com',6,'2',6,1,'0000-00-00 00:00:00'),(110,'MENDOZA PE?A','MYRIAM JANNETH','CC','24778880','F','15774','3193534477','CDF_SUSACON','4800a60d048c013082c216abff367479','comfamilia@susacon-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(111,'RIOS ACOSTA','ADRIANA DEL PILAR','CC','24997730','F','15776','3112346309','CDF_SUTAMARCHAN','4800a60d048c013082c216abff367479','comisariasutamarchan@gmail.com \r\ncomisaria@sutamarchan-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(112,'MOLINA GUTIERREZ','ANDREA','CC','40901201','F','15778','3176610112','CDF_SUTATENZA','4800a60d048c013082c216abff367479','comisariadefamilia@sutatenza-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(113,'MURILLO MURILLO','NORMAN ARMANDO','CC','74707301','M','15790','3106961041','CDF_TASCO','4800a60d048c013082c216abff367479','camil12@ymail.com',6,'2',6,1,'0000-00-00 00:00:00'),(114,'PINZON JIMENEZ','LAURA JULIETH','CC','23444911','F','15798','3204026224','CDF_TENZA','4800a60d048c013082c216abff367479','comisariadefamilia@tenza-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(115,'MALDONADO CABALLERO','DIANA MARIA','CC','40933470','F','15804','3143394353','CDF_TIBANA','4800a60d048c013082c216abff367479','comisaria@tibana-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(116,'BECERRA CARDOZO','MONICA JOHANA','CC','23997400','F','15806','3004973976','CDF_TIBASOSA','4800a60d048c013082c216abff367479','comisariadefamilia@tibasosa-boyaca.gov.co ',6,'2',6,1,'0000-00-00 00:00:00'),(117,'SANCHEZ MENDIETA','YICED PATRICIA','CC','40277499','F','15808','3132112030','CDF_TINJACA','4800a60d048c013082c216abff367479','comisariadefamilia@tinjaca-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(118,'PEREZ VELANDIA','DANIELA','CC','7227107','F','15810','3012390145','CDF_TIPACOQUE','4800a60d048c013082c216abff367479','comisariadefamilia@tipacoque-boyaca.gov.co ',6,'2',6,1,'0000-00-00 00:00:00'),(119,'OCHOA HERNANDEZ','YOLANDA','CC','40701177','F','15814','3203057405','CDF_TOCA','4800a60d048c013082c216abff367479','comisaria@toca-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(120,'GARCES SANCHEZ','NICOLAZ','CC','23900777','M','15816','3124347677','CDF_TOGUI','4800a60d048c013082c216abff367479','comisaria@togui-boyaca.gov.co ',6,'2',6,1,'0000-00-00 00:00:00'),(121,'TORRES CIENDUA','MARIAN ALEXANDRA','CC','40737557','F','15820','3124354039','CDF_TOPAGA','4800a60d048c013082c216abff367479','comisariadefamilia@topaga-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(122,'GOMEZ HERNANDEZ','JAZMIN','CC','40555121','F','15822','3108763959','CDF_TOTA','4800a60d048c013082c216abff367479','comisariadefamiliia@topaga-boyaca.gov.co ',6,'2',6,1,'0000-00-00 00:00:00'),(123,'PEDRAZA CANARIA','PILAR VERONICA','CC','23990214','F','15001','7453321','CDF1_TUNJA','4800a60d048c013082c216abff367479','comisaria.tercera@tunja.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(124,'ORTIZ QUINTERO','SOLEY DE LOS ANGELES','CC','20121907','F','15001','3134926358','CDF2_TUNJA','4800a60d048c013082c216abff367479','comisaria.sexta@tunja.gov',6,'2',6,1,'0000-00-00 00:00:00'),(125,'CUBIDES PINEDA','DIANA CAMILA','CC','40777191','F','15832','3204036882','CDF_TUNUNGUA','4800a60d048c013082c216abff367479','comisariadefamilia@tunungua-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(126,'RINCON SAMACA','BRIGITH ELIANA','CC','42900344','F','15835','3114981425','CDF_TURMEQUE','4800a60d048c013082c216abff367479','comisaria@turmeque-boyaca.gov.co ',6,'2',6,1,'0000-00-00 00:00:00'),(127,'VARGAS CIFUENTES','YENNY EDITH','CC','42777504','F','15837','3132421406','CDF_TUTA','4800a60d048c013082c216abff367479','comisariadefamilias@tuta-boyaca.gov.co ',6,'2',6,1,'0000-00-00 00:00:00'),(128,'BALLESTEROS TORRES','YESID','CC','7179740','M','15839','3124581389','CDF_TUTAZA','4800a60d048c013082c216abff367479','comisariafamiliatutaza@gmail.com ',6,'2',6,1,'0000-00-00 00:00:00'),(129,'BERNAL CRUZ','ANA STELLA','CC','3142200971','F','15842','3142200971','CDF_UMBITA','4800a60d048c013082c216abff367479','comisariadefamilia@umbita-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(130,'MORENO ROJAS','LEIDY DADIANA','CC','23249877','F','15861','3133488606','CDF_VENTAQUEMADA','4800a60d048c013082c216abff367479','comisaria@ventaquemada-boyaca.gov.co ',6,'2',6,1,'0000-00-00 00:00:00'),(131,'GUTIERREZ ALARCON','ANDREA','CC','7507002','F','15407','3187952424 - 3202042448','CDF_VILLADELEYVA','4800a60d048c013082c216abff367479','comisariafamilia@villadeleyva-boyaca.gov.co',6,'2',6,1,'0000-00-00 00:00:00'),(132,'PROCURADURIA','GENERAL DE LA NACION','CC','90021344','M','15001','7440090','PROCURADURIA','4800a60d048c013082c216abff367479','Procuraduria@general.gov.co',8,'3',9,1,'0000-00-00 00:00:00'),(133,'ENLACE','MUNICIPAL','CC','900400321','M','15001','7455577','JUEZ','4800a60d048c013082c216abff367479','Enlace_Mpal@gmail.com',9,'2',5,1,'0000-00-00 00:00:00'),(134,'INVITADO','MUNICIPAL','CC','900333743','M','15001','7443388','COMISARIO','4800a60d048c013082c216abff367479','Invitado@gmail.com',6,'2',5,1,'0000-00-00 00:00:00'),(135,'ICBF','ICBF','CC','123456789','F','15001','7447777','ICDF','4800a60d048c013082c216abff367479','Contacto@icbf.gov.co',9,'2',8,1,'0000-00-00 00:00:00'),(136,'SUPERVISOR','GOBERNACION','CC','900211911','M','15001','7441010','ADMIN','4800a60d048c013082c216abff367479','Supervisorgob@boyaca.gov.co',1,'3',2,1,'0000-00-00 00:00:00'),(137,'CASTELLANOS SUAREZ','DAVID ALEJANDRO','CC','1057578145','M','15176','3208355369','ADM','4800a60d048c013082c216abff367479','dacastellanos88@gmail.com',10,'1',0,1,'0000-00-00 00:00:00'),(138,'PEREZ PRECIADO','LUCILA ESPERANZA','CC','30303843','F','','3134841836','LUCIPERE','4800a60d048c013082c216abff367479','director.grupospoblacionales@boyaca.gov.co',6,'2',0,1,'0000-00-00 00:00:00'),(166,'VARGAS','CARLOS','RC','8744547','M','15001','12121','carlosvargas','4800a60d048c013082c216abff367479','dddr@gmail.com',1,'3',0,1,'2021-05-06 17:01:53'),(168,'CHIQUILLO','LINA CECILIA','CC','1111111111111','F','15001','1222','DocLina','4800a60d048c013082c216abff367479','ABC@GMAIL.COM',2,'3',0,1,'2021-07-28 19:55:00'),(169,'ANDRADE','MARLEN','CC','22222222','F','15001','1222','DocMarlen','4800a60d048c013082c216abff367479','ABC@GMAIL.COM',8,'3',0,1,'2021-07-29 00:12:12'),(170,'MATEUS','SONIA','CC','33333333','F','15114','1222','DocSonia','4800a60d048c013082c216abff367479','ABC@GMAIL.COM',9,'2',0,1,'2021-07-29 01:19:41'),(171,'INVITADO','INVITADO','CC','77777777777','M','0000','1222','invitado','4800a60d048c013082c216abff367479','ABC@GMAIL.COM',5,'3',0,1,'2021-07-29 20:06:39'),(172,'SANCHEZ','MATIAS','CC','0999999','M','0000','1222','matias','4800a60d048c013082c216abff367479','ABC@GMAIL.COM',7,'3',0,1,'2021-08-01 04:01:01'),(1,'LOPEZ VARGAS','JUAN FERNANDO','CC','1059233331','M','15001','3102411770','ELE_CHITA','4800a60d048c013082c216abff367479','juanlvargas77@gmail.com',4,'3',0,1,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `victimas`
--

DROP TABLE IF EXISTS `victimas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `victimas` (
  `id_victima` int(11) NOT NULL,
  `descripcion_victimas` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `victimas`
--

LOCK TABLES `victimas` WRITE;
/*!40000 ALTER TABLE `victimas` DISABLE KEYS */;
INSERT INTO `victimas` VALUES (1,'NO ES VICTIMA CONFLICTO ARMADO'),(2,'EN SITUACION DE DESPLAZAMIENTO'),(3,'DESVINCULADO DE GRUPOS ARMADOS'),(4,'HIJO DE ADULTO DESMOVILIZADO'),(5,'OTRO');
/*!40000 ALTER TABLE `victimas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zonas`
--

DROP TABLE IF EXISTS `zonas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zonas` (
  `id_zona` varchar(1) NOT NULL,
  `descripcion` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zonas`
--

LOCK TABLES `zonas` WRITE;
/*!40000 ALTER TABLE `zonas` DISABLE KEYS */;
INSERT INTO `zonas` VALUES ('R','RURAL'),('U','URBANA');
/*!40000 ALTER TABLE `zonas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sipardnna_new2'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-02 12:53:33
