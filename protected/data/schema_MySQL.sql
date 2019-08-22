-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.40-0ubuntu0.12.04.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for promedca_site
CREATE DATABASE IF NOT EXISTS `promedca_site` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `promedca_site`;


-- Dumping structure for table promedca_site.contacto
CREATE TABLE IF NOT EXISTS `contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `empresa_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Empresa',
  `nombre` varchar(140) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre',
  `valor` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Valor',
  `estatus` tinyint(4) DEFAULT '1' COMMENT 'Estatus',
  PRIMARY KEY (`id`),
  KEY `empresa_id` (`empresa_id`),
  CONSTRAINT `FK__empresa_` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table promedca_site.contacto: ~2 rows (approximately)
/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
INSERT INTO `contacto` (`id`, `empresa_id`, `nombre`, `valor`, `estatus`) VALUES
	(1, 0, 'Teléfono', '+58 2617989602', 1),
	(2, 0, 'Twitter', 'PROMEDCAmg', 1);
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;


-- Dumping structure for table promedca_site.empresa
CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre de la empresa',
  `nombre_legal` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre legal',
  `rif` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'RIF',
  `impuesto` decimal(10,3) NOT NULL COMMENT 'Impuesto (%)',
  `direccion` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Dirección',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table promedca_site.empresa: ~1 rows (approximately)
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` (`id`, `nombre`, `nombre_legal`, `rif`, `impuesto`, `direccion`) VALUES
	(0, 'Productos Médicos, C. A.', 'Promedca', 'J-29711842-0', 12.000, 'Av. 11 con calle 67B, Casa 10A-87 Sector Tierra Negra. Maracaibo Edo Zulia.');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;


-- Dumping structure for table promedca_site.filosofia
CREATE TABLE IF NOT EXISTS `filosofia` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `empresa_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Empresa',
  `titulo` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Título',
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Descripción',
  `estatus` tinyint(4) DEFAULT '1' COMMENT 'Estatus',
  PRIMARY KEY (`id`),
  KEY `empresa_id` (`empresa_id`),
  CONSTRAINT `FK__empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table promedca_site.filosofia: ~5 rows (approximately)
/*!40000 ALTER TABLE `filosofia` DISABLE KEYS */;
INSERT INTO `filosofia` (`id`, `empresa_id`, `titulo`, `descripcion`, `estatus`) VALUES
	(1, 0, 'NATURALEZA', 'Somos una compañía dedicada a la comercialización de productos y equipos médicos. Promedca es empresa líder en distribución gracias a sus invaluables alianzas para la distribución de dichos productos.', 1),
	(2, 0, 'MERCADO', 'Promedca esta posicionada entre las diez (10) primeras compañías líderes en distribución al mayor de material médico-quirúrgico descartable. Durante el plan de gestión empresarial enmarcado en la planificación para el año 2012, nuestra organización proyecta un crecimiento en la participación del mercado no menor a un 15%.', 1),
	(3, 0, 'MISION', 'Somos una empresa orientada al éxito. Creemos en la invaluable relación, entre el logro de nuestras metas y la calidad de nuestro capital humano. Como organización seguimos trabajando en la ampliación de nuestro grupo de proveedores, siempre manteniendo la calidad de nuestros productos como premisa de trabajo.', 1),
	(4, 0, 'VISION', 'Ser empresa líder en el mercado de distribución en el rubro: productos  médico-quirúrgico  y equipos en la zona occidental del país. Mantendremos de manera responsable nuestro propósito de trabajar oportunamente en el alcance de nuestras metas corporativas.\r\n\r\nTrabajaremos para proporcionar a nuestros aliados comerciales, capital humano, comunidad y accionistas, un crecimiento sostenido que nos permita incrementar nuestra participación y ampliación de nuestras líneas de productos en el nacional en un periodo de 5 años.\r\n', 1),
	(5, 0, 'VALORES', 'Somos una compañía abocada al desarrollo de su personal, ya que creemos en el potencial interno de nuestros empleados, incentivándolos a mejorar progresivamente, creemos en:\r\n\r\nLealtad: Contamos con un staff profesional y calificado cuya premisa es la atención individualizada para/con nuestros clientes. Siempre teniendo en cuenta el bienestar ajeno antes del propio, para garantizar el respeto en las relaciones laborales.\r\n\r\nVerdad: Nuestra filosofía se apoya en la transparencia con nuestros clientes y nuestros staff. Contando con procesos debidamente formulados para el buen desempeño y satisfacción del cliente y todas las partes involucradas, creando así un beneficio mutuo.\r\n\r\nCompetitividad: Manejamos procesos corporativos y comerciales en constante evolución, siempre en la búsqueda de una vía mayormente eficiente que permita el crecimiento de nuestra empresa a los ojos del mercado y nuestros clientes.\r\n', 1);
/*!40000 ALTER TABLE `filosofia` ENABLE KEYS */;


-- Dumping structure for table promedca_site.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `padre` int(11) NOT NULL,
  `estatus` tinyint(1) DEFAULT '1',
  `operation` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `active` text COLLATE utf8_unicode_ci,
  `pic` varchar(25) COLLATE utf8_unicode_ci DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table promedca_site.menu: ~12 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `label`, `padre`, `estatus`, `operation`, `url`, `active`, `pic`, `sort`) VALUES
	(1, 'INICIO', 0, 1, '', '/index', 'site/index', '', 0),
	(2, 'EMPRESA', 0, 1, '', '/empresa', 'site/empresa', '', 0),
	(3, 'SERVICIOS', 0, 1, '', '/servicios', 'site/servicios', '', 0),
	(4, 'PRODUCTOS', 0, 1, NULL, '', 'site/productos', '', 0),
	(5, 'CONTACTO', 0, 1, NULL, '/contacto', 'site/contacto', '', 0),
	(6, 'AMPOLLAS CON GAS ESTERILIZANTE', 4, 1, NULL, '/productos?pd=1', '', '', 0),
	(7, 'ESTERILIZADOR POR OXIDO DE ETILENO, BIO - GAS BM1', 4, 1, NULL, '/productos?pd=2', '', '', 0),
	(8, 'ESTERILIZADOR POR OXIDO DE ETILENO, BIO - GAS BM2 & BM4', 4, 1, NULL, '/productos?pd=3', '', '', 0),
	(9, 'ESTERILIZADOR POR OXIDO DE ETILENO, BIO - GAS BM3', 4, 1, NULL, '/productos?pd=4', '', '', 0),
	(10, 'CARTUCHO CON OXIDO DE ETILENO', 4, 1, NULL, '/productos?pd=5', '', '', 0),
	(11, 'CARTUCHO BIOGas 100% OXIDO DE ETILENO', 4, 1, NULL, '/productos?pd=6', '', '', 0),
	(12, 'EMPAQUE', 4, 1, NULL, '/productos?pd=7', '', '', 0);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


-- Dumping structure for table promedca_site.metadata
CREATE TABLE IF NOT EXISTS `metadata` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `menu_id` int(11) DEFAULT NULL,
  `tipo_id` int(11) NOT NULL,
  `prop_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prop_name_value` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Twt',
  `content` varchar(400) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Web (155),Twt (200), FB, Pin, G+',
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`),
  KEY `meta_data_tipo` (`tipo_id`),
  CONSTRAINT `FK_meta_data_meta_data_tipo` FOREIGN KEY (`tipo_id`) REFERENCES `metadata_tipo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_social_meta_menu` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table promedca_site.metadata: ~65 rows (approximately)
/*!40000 ALTER TABLE `metadata` DISABLE KEYS */;
INSERT INTO `metadata` (`id`, `menu_id`, `tipo_id`, `prop_name`, `prop_name_value`, `content`) VALUES
	(1, 1, 1, 'name', 'Keywords', 'comercio,producto,médico,descartable,quirúrgico,distribuidor,bobina,ampolla,esterilizador,biogas,oxido,etileno'),
	(2, 1, 2, 'name', 'Description', 'Con PROMEDCA haces tu pedido, verificas el presupuesto y una vez procesado el pago se envían los productos. Tan fácil como 1, 2, 3.'),
	(3, 1, 2, 'name', 'twitter:card', 'summary'),
	(4, 1, 2, 'name', 'twitter:site', '@PROMEDCAmg'),
	(5, 1, 2, 'name', 'twitter:title', 'Productos Médicos, C.A.'),
	(6, 1, 2, 'name', 'twitter:description', 'Con PROMEDCA haces tu pedido, verificas el presupuesto y una vez procesado el pago se envían los productos. Tan fácil como 1, 2, 3.'),
	(7, 1, 2, 'name', 'twitter:image', 'http://promedca.com/images/socialNetworkCover.jpg'),
	(8, 1, 3, 'property', 'og:card', 'summary'),
	(9, 1, 3, 'property', 'og:type', 'article'),
	(10, 1, 3, 'property', 'og:url', 'http://promedca.com/index/'),
	(11, 1, 3, 'property', 'og:image', 'http://promedca.com/images/socialNetworkCover.jpg'),
	(12, 1, 3, 'property', 'og:description', 'Con PROMEDCA haces tu pedido, verificas el presupuesto y una vez procesado el pago se envían los productos. Tan fácil como 1, 2, 3.'),
	(13, 1, 3, 'property', 'og:site_name', 'Productos Médicos C.A.'),
	(14, 2, 1, 'name', 'Keywords', 'comercio,producto,médico,descartable,quirúrgico,distribuidor,bobina,ampolla,esterilizador,biogas,oxido,etileno'),
	(15, 2, 2, 'name', 'Description', 'Somos una empresa dedicada a la comercialización de productos médicos descartables, posicionada entre las compañías líderes en distribución al mayor de material médico-quirúrgico.'),
	(16, 2, 2, 'name', 'twitter:card', 'summary'),
	(17, 2, 2, 'name', 'twitter:site', '@PROMEDCAmg'),
	(18, 2, 2, 'name', 'twitter:title', 'Productos Médicos, C.A.'),
	(19, 2, 2, 'name', 'twitter:description', 'Somos una empresa dedicada a la comercialización de productos médicos descartables, posicionada entre las compañías líderes en distribución al mayor de material médico-quirúrgico.'),
	(20, 2, 2, 'name', 'twitter:image', 'http://promedca.com/images/socialNetworkCover.jpg'),
	(21, 2, 3, 'property', 'og:card', 'summary'),
	(22, 2, 3, 'property', 'og:type', 'article'),
	(23, 2, 3, 'property', 'og:url', 'http://promedca.com/empresa/'),
	(24, 2, 3, 'property', 'og:image', 'http://promedca.com/images/socialNetworkCover.jpg'),
	(25, 2, 3, 'property', 'og:description', 'Somos una empresa dedicada a la comercialización de productos médicos descartables, posicionada entre las compañías líderes en distribución al mayor de material médico-quirúrgico.'),
	(26, 2, 3, 'property', 'og:site_name', 'Productos Médicos, C.A.'),
	(27, 3, 1, 'name', 'Keywords', 'comercio,producto,médico,descartable,quirúrgico,distribuidor,bobina,ampolla,esterilizador,biogas,oxido,etileno'),
	(28, 3, 2, 'name', 'Description', 'Déjanos ayudarte, contamos con una red de profesionales y técnicos certificados que nos proporcionan servicio de reparaciones y construcción de alta calidad.'),
	(29, 3, 2, 'name', 'twitter:card', 'summary'),
	(30, 3, 2, 'name', 'twitter:site', '@PROMEDCAmg'),
	(31, 3, 2, 'name', 'twitter:title', 'Productos Médicos, C.A.'),
	(32, 3, 2, 'name', 'twitter:description', 'Déjanos ayudarte, contamos con una red de profesionales y técnicos certificados que nos proporcionan servicio de reparaciones y construcción de alta calidad.'),
	(33, 3, 2, 'name', 'twitter:image', 'http://promedca.com/images/socialNetworkCover.jpg'),
	(34, 3, 3, 'property', 'og:card', 'summary'),
	(35, 3, 3, 'property', 'og:type', 'article'),
	(36, 3, 3, 'property', 'og:url', 'http://promedca.com/servicios/'),
	(37, 3, 3, 'property', 'og:image', 'http://promedca.com/images/socialNetworkCover.jpg'),
	(38, 3, 3, 'property', 'og:description', 'Déjanos ayudarte, contamos con una red de profesionales y técnicos certificados que nos proporcionan servicio de reparaciones y construcción de alta calidad.'),
	(39, 3, 3, 'property', 'og:site_name', 'Productos Médicos C.A.'),
	(40, 5, 1, 'name', 'Keywords', 'comercio,producto,médico,descartable,quirúrgico,distribuidor,bobina,ampolla,esterilizador,biogas,oxido,etileno'),
	(41, 5, 2, 'name', 'Description', 'Para nosotros es un placer atenderte. Por eso, te ofrecemos estos medios para responder a cada una de tus solicitudes de la manera que más rápida y eficaz.'),
	(42, 5, 2, 'name', 'twitter:card', 'summary'),
	(43, 5, 2, 'name', 'twitter:site', '@PROMEDCAmg'),
	(44, 5, 2, 'name', 'twitter:title', 'Productos Médicos, C.A.'),
	(45, 5, 2, 'name', 'twitter:description', 'Para nosotros es un placer atenderte. Por eso, te ofrecemos estos medios para responder a cada una de tus solicitudes de la manera que más rápida y eficaz.'),
	(46, 5, 2, 'name', 'twitter:image', 'http://promedca.com/images/socialNetworkCover.jpg'),
	(47, 5, 3, 'property', 'og:card', 'summary'),
	(48, 5, 3, 'property', 'og:type', 'article'),
	(49, 5, 3, 'property', 'og:url', 'http://promedca.com/contacto/'),
	(50, 5, 3, 'property', 'og:image', 'http://promedca.com/images/socialNetworkCover.jpg'),
	(51, 5, 3, 'property', 'og:description', 'Para nosotros es un placer atenderte. Por eso, te ofrecemos estos medios para responder a cada una de tus solicitudes de la manera que más rápida y eficaz.'),
	(52, 5, 3, 'property', 'og:site_name', 'Productos Médicos C.A.'),
	(53, 4, 1, 'name', 'Keywords', 'comercio,producto,médico,descartable,quirúrgico,distribuidor,bobina,ampolla,esterilizador,biogas,oxido,etileno'),
	(54, 4, 2, 'name', 'Description', 'Disponemos de una ampla colcción de partes y accesorios para equipos médicos e industriales.'),
	(55, 4, 2, 'name', 'twitter:card', 'summary'),
	(56, 4, 2, 'name', 'twitter:site', '@PROMEDCAmg'),
	(57, 4, 2, 'name', 'twitter:title', 'Productos Médicos, C.A.'),
	(58, 4, 2, 'name', 'twitter:description', 'Disponemos de una ampla colcción de partes y accesorios para equipos médicos e industriales.'),
	(59, 4, 2, 'name', 'twitter:image', 'http://promedca.com/images/socialNetworkCover.jpg'),
	(60, 4, 3, 'property', 'og:card', 'summary'),
	(61, 4, 3, 'property', 'og:type', 'article'),
	(62, 4, 3, 'property', 'og:url', 'http://promedca.com/productos?pd=2'),
	(63, 4, 3, 'property', 'og:image', 'http://promedca.com/images/socialNetworkCover.jpg'),
	(64, 4, 3, 'property', 'og:description', 'Disponemos de una ampla colcción de partes y accesorios para equipos médicos e industriales.'),
	(65, 4, 3, 'property', 'og:site_name', 'Productos Médicos C.A.');
/*!40000 ALTER TABLE `metadata` ENABLE KEYS */;


-- Dumping structure for table promedca_site.metadata_tipo
CREATE TABLE IF NOT EXISTS `metadata_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(140) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table promedca_site.metadata_tipo: ~4 rows (approximately)
/*!40000 ALTER TABLE `metadata_tipo` DISABLE KEYS */;
INSERT INTO `metadata_tipo` (`id`, `nombre`, `descripcion`) VALUES
	(1, 'Web', 'De uso básico en el documento HTML'),
	(2, 'Twitter', 'Red social'),
	(3, 'Open Graph', 'Open Graph data'),
	(4, 'Google', 'Red social G+');
/*!40000 ALTER TABLE `metadata_tipo` ENABLE KEYS */;


-- Dumping structure for table promedca_site.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `titulo` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Título',
  `nombre` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nombre',
  `estatus` tinyint(4) DEFAULT '1' COMMENT 'Estatus',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table promedca_site.productos: ~8 rows (approximately)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`, `titulo`, `nombre`, `estatus`) VALUES
	(1, 'AMPOLLAS CON GAS ESTERILIZANTE', NULL, 1),
	(2, 'ESTERILIZADOR POR OXIDO DE ETILENO', 'BIO - GAS BM1', 1),
	(3, 'ESTERILIZADOR POR OXIDO DE ETILENO', 'BIO - GAS BM2 & BM4', 1),
	(4, 'ESTERILIZADOR POR OXIDO DE ETILENO', 'BIO - GAS BM3', 1),
	(5, 'CARTUCHO CON OXIDO DE ETILENO', NULL, 1),
	(6, 'CARTUCHO BIOGas 100% OXIDO DE ETILENO', NULL, 1),
	(7, 'EMPAQUE', NULL, 1),
	(10, '111-2', '111-2', 0);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;


-- Dumping structure for table promedca_site.productos_atributos
CREATE TABLE IF NOT EXISTS `productos_atributos` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `producto_id` int(11) NOT NULL COMMENT 'Producto',
  `tipo_id` tinyint(4) NOT NULL COMMENT 'Tipo',
  `posicion_id` tinyint(4) NOT NULL COMMENT 'Pocisión',
  `titulo` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-' COMMENT 'Título',
  `texto` text COLLATE utf8_unicode_ci COMMENT 'Texto',
  `lista` tinyint(4) DEFAULT '0' COMMENT 'Crear lista',
  `pic` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Imagen',
  `sortOrder` smallint(6) NOT NULL DEFAULT '1' COMMENT 'Orden',
  `estatus` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'Estatus',
  PRIMARY KEY (`id`),
  KEY `producto_id` (`producto_id`),
  KEY `tipo` (`tipo_id`),
  KEY `FK_productos_atributos_p_atributos_posicion` (`posicion_id`),
  CONSTRAINT `FK_productos_atributos_productos` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_productos_atributos_p_atributos_posicion` FOREIGN KEY (`posicion_id`) REFERENCES `p_atributos_posicion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_productos_atributos_p_atributos_tipos` FOREIGN KEY (`tipo_id`) REFERENCES `p_atributos_tipos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table promedca_site.productos_atributos: ~42 rows (approximately)
/*!40000 ALTER TABLE `productos_atributos` DISABLE KEYS */;
INSERT INTO `productos_atributos` (`id`, `producto_id`, `tipo_id`, `posicion_id`, `titulo`, `texto`, `lista`, `pic`, `sortOrder`, `estatus`) VALUES
	(1, 1, 1, 1, '-', '\r\nLa practicidad y sencillez de este sistema de esterilización permite su uso en cualquier lugar. Y en especial, en áreas bajo condiciones de emergencia, ya que no necesita de conexiones de gas, de aire, de electricidad, ni de recintos especiales.\r\n\r\nEl kit de esterilización BIOLENE está compuesto por una ampolla de gas esterilizante (óxido de etileno + gases inerte) envasada dentro de una membrana difusora, una bolsa de contención y un broche para cerrar la bolsa.\r\n\r\nCon un kit de esterilización  BIOLENE se puede esterilizar de manera efectiva todo tipo de material, previamente envasado, sin que se deteriore debido a que este sistema de esterilización no requiere de calor y/o presión.', 0, NULL, 1, 1),
	(2, 1, 2, 3, '-', NULL, 0, 'jpg', 1, 1),
	(3, 1, 2, 2, '-', NULL, 0, 'png', 1, 1),
	(5, 2, 1, 1, 'CARACTERISTICAS ESPECIALES:', 'Equipo de mesa de funcionamiento automático por medio de controlador lógico programable.\r\nUtiliza cartucho descartable de óxido de etileno puro tipo BIOLENE de 15 gramos.\r\nLa temperatura de la cámara se mantiene controlada automáticamente y es programable de 37°C a 60°C mediante termocontrolador de última generación.\r\nFunciona con técnica de vacio, posee neutralizador de gas por burbuja de agua, termostato de seguridad y sistema de humidificacion.\r\nEl tiempo de estirilización se programa entre 3 y 8 horas.\r\nEl tiempo de ventilación se programa entre 4 y 16 horas.\r\nPosee un sistema de ventilación que permite esterilizar y ventilar dentro de la mista cámara sin necesidad de retirar el material para ventilar en cámaras auxiliares.\r\nEl equipo no necesita instalaciones especiales.\r\nAdemás todos los equipos son sometidos a verificaciones de rigidez dieléctrica y resistencia de puesta a tierra.', 1, NULL, 1, 1),
	(7, 2, 2, 2, 'BIO - GAS BM1', NULL, 0, 'jpg', 1, 1),
	(8, 2, 1, 2, 'DATOS TÉCNICOS', 'Cámara y gabinete construidos en acero totalmene inoxidable.\r\r\nConsumo máximo 400 w.\r\r\nAlimentación: 110v-220v (según pedido del cliente.\r\r\nEsterilizador de funcionamientos automático.', 1, NULL, 2, 1),
	(9, 2, 2, 3, '-', NULL, 0, 'jpg', 1, 1),
	(10, 3, 1, 1, 'CARACTERISTICAS GENERALES', 'Equipo de pie de funcionamiento totalmente automático por medio de un controlador lógico programable (PLC) y pantalla de mano y visualización.', 0, NULL, 1, 1),
	(11, 3, 1, 1, 'EL EQUIPO EFECTÚA LA SECUENCIA DE', 'Calefacción\r\nVacio inicial\r\nHumidificación\r\nInyección de gas\r\nEsterilización\r\nDescarga de gas mediante 12 ciclos alternados de vacio e ingreso de aire (pasivado de gas mediante bomba de anillo líquido)\r\nVentilación\r\nAviso de fin de ciclo\r\nImpresión del reporte de ciclo', 1, NULL, 2, 1),
	(12, 3, 1, 1, 'MAYORES VENTAJAS', 'Elimina al máximo los riesgos del personal que opera el equipo.\r\nElimina los residuos de gas por medio de vacio de anillo líquido.\r\nCartucho de oxido de etileno ubicado dentro de la cámara.\r\nSistema de humidificación por medio de ingreso de vapor generado en una caldera propia.\r\nUn tamaño acorde a sus necesidades.\r\nSus anchos minimizados y sus trenes rodantes permiten su facil traslación hasta el lugar de ubicación.\r\nRecuperación del ciclo luego de un corte de energía.\r\nDetección automatica de fallas.\r\nNo necesita instalaciones especiales.', 1, NULL, 3, 1),
	(13, 3, 1, 1, 'DATOS TÉCNICOS', 'Cámara y gabinete construidos en acero totalmene inoxidable.\r\nConsumo máximo BIO-GAS BM2 1.200 w.\r\nConsumo máximo BIO-GAS BM4 1.500 w.\r\nFuente de alimentación 110v-220v(segun pedido del cliente).\r\nSistema automático doble-cartucho.', 1, NULL, 4, 1),
	(14, 3, 2, 2, 'BIO - GAS BM2', NULL, 0, 'jpg', 1, 1),
	(15, 3, 2, 3, '-', NULL, 0, 'png', 1, 1),
	(16, 3, 2, 2, 'BIO - GAS BM4', NULL, 0, 'jpg', 3, 1),
	(17, 3, 2, 1, '-', NULL, 0, 'jpg', 5, 0),
	(18, 4, 1, 1, 'CARACTERISTICAS GENERALES', 'Equipo de mesa  totalmente automático por medio de un controlador lógico programable (PLC) que efectua las secuencias de: calefacción, vacio inicial, humidificación, inyección del gas, esterilización, descarga de gas, ventilación, detección de fallas, aviso de fin de ciclo e impresion del reporte del ciclo', 0, NULL, 1, 1),
	(19, 4, 1, 1, 'MAYORES VENTAJAS', 'Pantalla programación de tipo de ciclo 37°/8h ó 55°/4h y tiempo de ventilación 2 a 24 horas con visualización de la etapa en proceso e indicación del tiempo restante.\r\r\nElimina al máximo los riesgos del personal que opera el equipo.\r\r\nElimina los residuos de gas.\r\r\nSistema automático rompe-cartucho en el interior de la cámara\r\r\nFunciona con cartuchos metálicos descartables de óxido de etileno puro tipo BIOLENE de 50 gr.\r\r\nRecuperación del  luego de un corte de energía.\r\r\nNo necesita instalaciones especiales.\r\r\nCiclo de humidificación mediante inyección pulsante de vapor de agua generado por caldera propia.\r\r\nSu diseño compacto  y facilmente portable permiten instalarlo sobre un mesa o mesada.\r\r\nDetección automatica de fallas.', 1, NULL, 2, 1),
	(20, 4, 2, 2, 'BIO - GAS BM3', NULL, 0, 'png', 1, 1),
	(21, 4, 1, 2, 'DATOS TÉCNICOS', 'Cámara y gabinete construidos en acero totalmene inoxidable.\r\r\nConsumo máximo 700 w\r\r\nAlimentación: 110v-220v (según pedido del cliente)\r\r\nSistema automatico rompe cartucho', 1, NULL, 2, 1),
	(22, 4, 2, 2, '-', NULL, 0, 'jpg', 3, 1),
	(23, 5, 1, 1, '-', 'BIOLENE ha registrado su planta de producción y Cartuchos metálicos ante la Agencia de Proteccion Ambiental de los Estados Unidos (EPA).', 0, NULL, 1, 1),
	(24, 5, 1, 1, '-', 'Cartuchos con Óxido de Etileno.\r\nÓxido de etileno de máxima pureza.\r\nCartuchos de un solo uso: se descartan una vez terminado el ciclo de esterilización y de aireación.\r\nGarantizada acciones de bactericida, fungicida y virucida.\r\nCompatibilidad con diversos esterilizadores existentes en el mercado.', 1, NULL, 2, 1),
	(25, 5, 2, 2, '-', NULL, 0, 'png', 1, 1),
	(26, 5, 2, 3, '-', NULL, 0, 'png', 1, 1),
	(27, 6, 1, 1, '-', 'El método mas seguro para esterilización por oxido de etileno.\r\r\nEste nuevo método para esterilización con cámara difusa, provee extra protección al operador en caso de activación accidental.\r\r\nEl Cartuchos BIOgas, por su cuerpo de poliuretano y su doble   protección mediante traba de seguridad de gatillo y cinta protectora, evita su percusión accidental. ', 0, NULL, 1, 1),
	(28, 6, 2, 2, '-', NULL, 0, 'jpg', 1, 1),
	(29, 6, 2, 3, '-', NULL, 0, 'png', 1, 1),
	(30, 7, 1, 1, 'FILM DE POLIETILENO CON TESTIGO QUIMICO', 'El film de polietileno BIOLENE viene impreso a lo largo del rollo, con un indicador químico para óxido de etileno que vira del calor amarillo al calor celeste ante la presencia de gas. ', 0, NULL, 1, 1),
	(31, 7, 1, 1, '-', 'Practico ajuste del tamaño del sellado. \r\nProlongado periodo de conservación del material esterilizado. \r\nEconómico respecto a otros materiales. \r\nPresentación: rollos de 70 micrones de  espesor, en anchos desde 4 a 50 cm.', 1, NULL, 2, 1),
	(35, 7, 1, 1, 'POUCH', 'Confeccionado con papel grado médico y film transparente.\r\nTestigo químico impreso para esterilización por óxido de etileno y vapor.\r\nPresentación rollos de 5 a 30 cm de ancho x 200 m largo.', 1, NULL, 3, 1),
	(36, 7, 1, 1, 'GUANTES PARA ESTERILIZACIÓN POR OXIDO DE ETILENO', 'Guantes de nitrilo para protección.', 1, NULL, 4, 1),
	(37, 7, 2, 2, 'FILM DE POLIETILENO CON TESTIGO QUIMICO', NULL, 0, 'jpg', 1, 1),
	(38, 7, 2, 2, 'POUCH', NULL, 0, 'jpg', 2, 1),
	(39, 7, 2, 2, 'GUANTES PARA ESTERILIZACIÓN POR OXIDO DE ETILENO', NULL, 0, 'jpg', 3, 1),
	(41, 10, 2, 2, 'Nyamo', '', 0, 'png', 4, 1),
	(44, 10, 1, 3, '123', '123', 0, NULL, 7, 1),
	(45, 10, 2, 1, '-', '', 0, 'png', 3, 1),
	(46, 10, 1, 3, '444-', '555', 0, NULL, 8, 1),
	(47, 10, 1, 1, 'nuevo atributo ', 'partial test', 0, NULL, 1, 1),
	(48, 10, 2, 2, 'Tanuki', '', 0, 'png', 5, 1),
	(49, 10, 1, 2, '-9999', '69999', 0, NULL, 2, 1),
	(50, 10, 1, 2, 'ññññ', 'ñññññ', 1, NULL, 3, 1);
/*!40000 ALTER TABLE `productos_atributos` ENABLE KEYS */;


-- Dumping structure for table promedca_site.p_atributos_posicion
CREATE TABLE IF NOT EXISTS `p_atributos_posicion` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `descripcion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Descripción',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table promedca_site.p_atributos_posicion: ~3 rows (approximately)
/*!40000 ALTER TABLE `p_atributos_posicion` DISABLE KEYS */;
INSERT INTO `p_atributos_posicion` (`id`, `descripcion`) VALUES
	(1, 'Izquierda'),
	(2, 'Derecha'),
	(3, 'Centro');
/*!40000 ALTER TABLE `p_atributos_posicion` ENABLE KEYS */;


-- Dumping structure for table promedca_site.p_atributos_tipos
CREATE TABLE IF NOT EXISTS `p_atributos_tipos` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `descripcion` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Descripción',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table promedca_site.p_atributos_tipos: ~2 rows (approximately)
/*!40000 ALTER TABLE `p_atributos_tipos` DISABLE KEYS */;
INSERT INTO `p_atributos_tipos` (`id`, `descripcion`) VALUES
	(1, 'Texto'),
	(2, 'Imagen');
/*!40000 ALTER TABLE `p_atributos_tipos` ENABLE KEYS */;


-- Dumping structure for table promedca_site.servicios
CREATE TABLE IF NOT EXISTS `servicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `titulo` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Título',
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Descripción',
  `estatus` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'Estatus',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table promedca_site.servicios: ~2 rows (approximately)
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` (`id`, `titulo`, `descripcion`, `estatus`) VALUES
	(1, '¿Que hacemos?', 'En Promedca queremos generar ganancias, para conseguir esto necesitamos que TU generes  ganancias, entonces, tu nos ayudas a ayudarte!\r\n\r\nPartes y accesorios para equipos médicos e industriales se pueden conseguir en cualquier parte de la web, eso no es complicado!\r\n\r\n¿Pero, y si nosotros lo buscamos por ti? ¿Y si nos encargamos de filtrar toda la información? ¿Reducir costos? ¿Logística? Y selección de proveedor?\r\n\r\n¿Por qué pensamos que es mejor? Por Los últimos 10 Años hemos hecho esto nuestro objetivo para nuestras empresas y concluimos que no es tan fácil como se ve, Ahora podemos hacerlo para ti y seguir aumentado tu ganancia.', 1),
	(2, '¿Necesitas algo?', 'Alguna bobina no funciona correctamente? El costo de adquisición generaría incremento en costos? Déjanos ayudarte, contamos con una red de profesionales y técnicos certificados que nos proporcionan servicio de reparaciones y construcción de alta calidad.', 1);
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;


-- Dumping structure for table promedca_site.servicios_galeria
CREATE TABLE IF NOT EXISTS `servicios_galeria` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `titulo` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Título',
  `pic1` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Imagen activa',
  `pic0` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Image inactiva',
  `estatus` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'Estatus',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table promedca_site.servicios_galeria: ~12 rows (approximately)
/*!40000 ALTER TABLE `servicios_galeria` DISABLE KEYS */;
INSERT INTO `servicios_galeria` (`id`, `titulo`, `pic1`, `pic0`, `estatus`) VALUES
	(1, 'Datex Ohmeda', 'pic1-1.jpg', 'pic0-1.jpg', 1),
	(2, 'Zoll', 'pic1-2.jpg', 'pic0-2.jpg', 1),
	(3, 'Dräger', 'pic1-3.jpg', 'pic0-3.jpg', 1),
	(4, 'Olympus', 'pic1-4.jpg', 'pic0-4.jpg', 1),
	(5, 'Hill-Rom', 'pic1-5.jpg', 'pic0-5.jpg', 1),
	(6, 'Stryker', 'pic1-6.jpg', 'pic0-6.jpg', 1),
	(7, 'Phillips', 'pic1-7.jpg', 'pic0-7.jpg', 1),
	(8, 'Siemens', 'pic1-8.jpg', 'pic0-8.jpg', 1),
	(9, 'Midmark', 'pic1-9.jpg', 'pic0-9.jpg', 1),
	(10, 'Toshiba', 'pic1-10.jpg', 'pic0-10.jpg', 1),
	(11, 'General Electric', 'pic1-11.jpg', 'pic0-11.jpg', 1),
	(13, '999', 'pic1-13.gif', 'pic0-13.png', 0);
/*!40000 ALTER TABLE `servicios_galeria` ENABLE KEYS */;


-- Dumping structure for table promedca_site.visitas
CREATE TABLE IF NOT EXISTS `visitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `timeStamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha y hora',
  `ipAddress` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Dirección IP',
  `status` int(11) DEFAULT NULL COMMENT 'Estatus',
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Ciudad',
  `region` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Estado/Región',
  `countryName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'País',
  `countryCode` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Código país',
  `latitude` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Latitud',
  `longitude` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Longitud',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table promedca_site.visitas: ~43 rows (approximately)
/*!40000 ALTER TABLE `visitas` DISABLE KEYS */;
INSERT INTO `visitas` (`id`, `timeStamp`, `ipAddress`, `status`, `city`, `region`, `countryName`, `countryCode`, `latitude`, `longitude`) VALUES
	(1, '2014-10-31 17:40:56', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(2, '2014-10-31 17:40:49', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(3, '2014-10-31 17:40:18', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(4, '2014-10-31 17:40:14', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(5, '2014-11-01 00:40:13', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(6, '2014-11-01 22:41:39', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(7, '2014-11-08 14:41:24', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(8, '2015-01-12 23:31:27', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(9, '2015-01-14 20:31:49', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(10, '2015-01-14 23:31:54', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(11, '2015-01-15 23:31:01', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(12, '2015-01-16 11:31:42', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(13, '2015-01-16 12:31:07', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(14, '2015-01-16 14:31:12', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(15, '2015-01-16 18:31:10', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(16, '2015-01-16 23:31:17', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(17, '2015-01-17 00:31:09', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(18, '2015-01-17 02:31:58', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(19, '2015-01-17 12:31:27', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(20, '2015-01-17 05:31:05', '173.252.88.87', 200, 'Menlo Park', 'CA', 'United States', 'US', '37.459', '-122.178101'),
	(21, '2015-01-17 05:31:06', '173.252.88.87', 200, 'Menlo Park', 'CA', 'United States', 'US', '37.459', '-122.178101'),
	(22, '2015-01-17 05:31:47', '173.252.88.84', 200, 'Menlo Park', 'CA', 'United States', 'US', '37.459', '-122.178101'),
	(23, '2015-01-17 05:31:48', '173.252.88.86', 200, 'Menlo Park', 'CA', 'United States', 'US', '37.459', '-122.178101'),
	(24, '2015-01-17 09:31:49', '184.168.224.190', 200, 'Scottsdale', 'AZ', 'United States', 'US', '33.6119', '-111.890602'),
	(25, '2015-01-17 11:31:24', '207.46.13.54', 200, 'Redmond', 'WA', 'United States', 'US', '47.680099', '-122.120598'),
	(26, '2015-01-17 12:31:53', '200.82.185.169', 200, 'Maracaibo', 'Zulia', 'Venezuela', 'VE', '10.6317', '-71.640602'),
	(27, '2015-01-17 13:31:45', '146.148.93.161', 200, 'Mountain View', 'CA', 'United States', 'US', '37.419201', '-122.057404'),
	(28, '2015-01-17 13:31:12', '186.94.185.193', 206, '', '', 'Venezuela', 'VE', '8', '-66'),
	(29, '2015-01-17 14:31:34', '73.1.31.244', 206, '', '', 'United States', 'US', '38', '-97'),
	(30, '2015-01-17 14:31:14', '200.82.185.169', 200, 'Maracaibo', 'Zulia', 'Venezuela', 'VE', '10.6317', '-71.640602'),
	(31, '2015-01-17 14:31:23', '190.198.102.53', 206, '', '', 'Venezuela', 'VE', '8', '-66'),
	(32, '2015-01-17 14:31:22', '200.82.182.24', 200, 'Maracaibo', 'Zulia', 'Venezuela', 'VE', '10.6317', '-71.640602'),
	(33, '2015-01-17 14:31:04', '181.186.19.17', 200, 'Caracas', 'Distrito Federal', 'Venezuela', 'VE', '10.5', '-66.916702'),
	(34, '2015-01-17 21:01:18', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(35, '2015-01-18 12:01:45', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(36, '2015-01-19 19:01:46', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(37, '2015-01-19 20:01:36', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(38, '2015-01-19 20:01:37', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(39, '2015-01-19 20:01:43', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(40, '2015-01-19 20:01:11', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(41, '2015-01-19 20:01:19', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(42, '2015-01-21 22:01:55', '127.0.0.1', 404, '', '', '', '', '0', '0'),
	(43, '2015-01-25 10:01:18', '127.0.0.1', 404, '', '', '', '', '0', '0');
/*!40000 ALTER TABLE `visitas` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
