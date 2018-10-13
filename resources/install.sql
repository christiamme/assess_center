--
-- Table structure for table `vts_users`
--

CREATE TABLE `vts_users` (
  `id` int(11) NOT NULL,
  `username` text COLLATE latin1_spanish_ci NOT NULL,
  `password` text COLLATE latin1_spanish_ci NOT NULL,
  `usertype` varchar(4) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Table structure for table `vts_cliente`
--

CREATE TABLE `vts_clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` text DEFAULT NULL,
  `nomcomercial` text DEFAULT NULL,
  `razon_social` text DEFAULT NULL,
  `rfc` varchar(13) DEFAULT NULL,
  `nomrep` text DEFAULT NULL,
  `tel1` varchar(13) DEFAULT NULL,
  `tel2` varchar(13) DEFAULT NULL,
  `correo1` text DEFAULT NULL,
  `correo2` text DEFAULT NULL,
  `fisc_calle` text DEFAULT NULL,
  `fisc_numext` varchar(6) DEFAULT NULL,
  `fisc_numint` varchar(6) DEFAULT NULL,
  `fisc_colonia` text DEFAULT NULL,
  `fisc_cp` int(11) NOT NULL,
  `fisc_localidad` text DEFAULT NULL,
  `fisc_municipio` text DEFAULT NULL,
  `fisc_estado` text DEFAULT NULL,
  `fisc_pais` text DEFAULT NULL,
  `fisc_gmaps` text DEFAULT NULL,
  `fisc_acta` boolean DEFAULT 0,
  `fisc_fotos` boolean DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


--
-- Table structure for table `vts_sucursales`
--

CREATE TABLE `vts_sucursales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` text DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `nomcomercial` text DEFAULT NULL,
  `nomrep` text DEFAULT NULL,
  `tel1` varchar(13) DEFAULT NULL,
  `tel2` varchar(13) DEFAULT NULL,
  `correo1` text DEFAULT NULL,
  `correo2` text DEFAULT NULL,
  `suc_calle` text DEFAULT NULL,
  `suc_numext` varchar(6) DEFAULT NULL,
  `suc_numint` varchar(6) DEFAULT NULL,
  `suc_colonia` text DEFAULT NULL,
  `suc_localidad` text DEFAULT NULL,
  `suc_municipio` text DEFAULT NULL,
  `suc_estado` text DEFAULT NULL,
  `suc_pais` text DEFAULT NULL,
  `suc_gmaps` text DEFAULT NULL,
  `refrigerador` text DEFAULT NULL,
  `suc_fotos` boolean DEFAULT 0,
  `ref_fotos` boolean DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


--
-- Table structure for table `vts_precios`
--

CREATE TABLE `vts_precios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` text DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `vts_precios` VALUES (1, '2017-23-18T11:30:00-06:00', 0, 1, 35);
INSERT INTO `vts_precios` VALUES (2, '2017-23-18T11:30:00-06:00', 0, 2, 15);
INSERT INTO `vts_precios` VALUES (3, '2017-23-18T11:30:00-06:00', 0, 3, 10);
INSERT INTO `vts_precios` VALUES (4, '2017-23-18T11:30:00-06:00', 0, 4, 120);
INSERT INTO `vts_precios` VALUES (5, '2017-23-18T11:30:00-06:00', 0, 5, 25);
INSERT INTO `vts_precios` VALUES (6, '2017-23-18T11:30:00-06:00', 0, 6, 20);
INSERT INTO `vts_precios` VALUES (7, '2017-12-20T15:32:13-05:00', 2, 1, 21);
INSERT INTO `vts_precios` VALUES (8, '2018-01-03T18:12:34-05:00', 67, 1, 25);
INSERT INTO `vts_precios` VALUES (9, '2018-01-03T18:12:34-05:00', 67, 4, 100);
INSERT INTO `vts_precios` VALUES (10, '2018-01-03T18:12:34-05:00', 67, 5, 30);
INSERT INTO `vts_precios` VALUES (11, '2018-01-03T18:12:34-05:00', 67, 6, 11);
INSERT INTO `vts_precios` VALUES (12, '2018-01-03T18:33:36-05:00', 54, 3, 9);
INSERT INTO `vts_precios` VALUES (13, '2018-01-03T18:33:36-05:00', 54, 2, 11);
INSERT INTO `vts_precios` VALUES (14, '2018-01-03T18:33:36-05:00', 54, 4, 100);
INSERT INTO `vts_precios` VALUES (15, '2018-01-03T18:33:36-05:00', 54, 5, 30);

--
-- Table structure for table `vts_productos`
--

CREATE TABLE `vts_productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` text DEFAULT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `vts_productos` VALUES (1, 'bs15k', 'Bolsa 15 kg', 'Bolsa con 15 kilogramos de hielo');
INSERT INTO `vts_productos` VALUES (2, 'bs5k', 'Bolsa 5 kg', 'Bolsa con 5 kilogramos de hielo');
INSERT INTO `vts_productos` VALUES (3, 'bs3k', 'Bolsa 3 kg', 'Bolsa con 3 kilogramos de hielo');
INSERT INTO `vts_productos` VALUES (4, 'br75k', 'Barra 75 kg', 'Barra de hielo de 75 kg');
INSERT INTO `vts_productos` VALUES (5, 'br1-4', '1/4 de Barra', '1/4 de barra de hielo');
INSERT INTO `vts_productos` VALUES (6, 'gr20l', 'Garrafón', 'Garrafón de 20 l con agua');

--
-- Table structure for table `vts_vendedores`
--

CREATE TABLE `vts_vendedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` text DEFAULT NULL,
  `alias` text DEFAULT NULL,
  `nombre` text DEFAULT NULL,
  `apellidos` text DEFAULT NULL,
  `curp` text DEFAULT NULL,
  `licencia` varchar(13) DEFAULT NULL,
  `venc_lic` text DEFAULT NULL,
  `tel1` varchar(13) DEFAULT NULL,
  `tel2` varchar(13) DEFAULT NULL,
  `tel3` varchar(13) DEFAULT NULL,
  `correo1` text DEFAULT NULL,
  `vend_calle` text DEFAULT NULL,
  `vend_numext` varchar(6) DEFAULT NULL,
  `vend_numint` varchar(6) DEFAULT NULL,
  `vend_colonia` text DEFAULT NULL,
  `vend_localidad` text DEFAULT NULL,
  `vend_municipio` text DEFAULT NULL,
  `vend_cp` varchar(5) DEFAULT NULL,
  `vend_estado` text DEFAULT NULL,
  `vend_pais` text DEFAULT NULL,
  `vend_gmaps` text DEFAULT NULL,
  `vend_resp` boolean DEFAULT 0,
  `vend_copias` boolean DEFAULT 0,
  `emer_nom` text DEFAULT NULL,
  `emer_par` text DEFAULT NULL,
  `emer_tel1` varchar(13) DEFAULT NULL,
  `emer_tel2` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `vts_ruta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` text DEFAULT NULL,
  `vendedor` int(11) DEFAULT NULL,
  `cliente` int(11) DEFAULT NULL,
  `sucursal` int(11) DEFAULT NULL,
  `dia` varchar(2) DEFAULT NULL,
  `activo` boolean DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `vts_folios` (
  `id` int(11) NOT NULL,
  `timestamp` text,
  `id_folio` varchar(13) NOT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `asigno` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `vts_folios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_folio` (`id_folio`);

ALTER TABLE `vts_folios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT; COMMIT;

CREATE TABLE `vts_venta_productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_folio` text DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `asigno` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `vts_venta_clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` text DEFAULT CURRENT_TIMESTAMP,
  `id_folio` int(11) DEFAULT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  `forma_pago` text DEFAULT NULL,
  `valido` boolean DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `vts_inventario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_folio` text DEFAULT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `asigno` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
