--
-- Table structure for table `aes_logs`
--

CREATE TABLE `aes_user_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` text NOT NULL,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `login` BOOLEAN NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Table structure for table `aes_estudiantes`
--

CREATE TABLE `aes_estudiantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration` datetime DEFAULT CURRENT_TIMESTAMP,
  `matricula` text DEFAULT NULL,
  `nombre` text DEFAULT NULL,
  `paterno` text DEFAULT NULL,
  `materno` text DEFAULT NULL,
  `carrera` text DEFAULT NULL,
  `correo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Table structure for table `aes_evaluadores`
--

CREATE TABLE `aes_evaluadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration` datetime DEFAULT CURRENT_TIMESTAMP,
  `nomina` text DEFAULT NULL,
  `nombre` text DEFAULT NULL,
  `paterno` text DEFAULT NULL,
  `materno` text DEFAULT NULL,
  `correo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Table structure for table `aes_actividades`
--

CREATE TABLE `aes_actividades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration` datetime DEFAULT CURRENT_TIMESTAMP,
  `titulo` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `area` text DEFAULT NULL,
  `registrante` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Table structure for table `aes_dimensiones`
--

CREATE TABLE `aes_dimensiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration` datetime DEFAULT CURRENT_TIMESTAMP,
  `titulo` text DEFAULT NULL,
  `enunciado` text DEFAULT NULL,
  `nivel_c` text DEFAULT NULL,
  `nivel_b` text DEFAULT NULL,
  `nivel_a` text DEFAULT NULL,
  `nivel_0` text DEFAULT NULL,
  `area` text DEFAULT NULL,
  `registrante` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Table structure for table `aes_plan_descripcion`
--

CREATE TABLE `aes_plan_descripcion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration` datetime DEFAULT CURRENT_TIMESTAMP,
  `titulo` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `area` text DEFAULT NULL,
  `registrante` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Table structure for table `aes_plan_detalle`
--

CREATE TABLE `aes_plan_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration` datetime DEFAULT CURRENT_TIMESTAMP,
  `plan_id` int(11) DEFAULT NULL,
  `actividad_id` int(11) DEFAULT NULL,
  `dimension_id` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `registrante` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Table structure for table `aes_assessment_evento`
--

CREATE TABLE `aes_assessment_evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration` datetime DEFAULT CURRENT_TIMESTAMP,
  `titulo` text DEFAULT NULL,
  `inicio` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `lugar` text DEFAULT NULL,
  `registrante` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Table structure for table `aes_assessment_asignacion`
--

CREATE TABLE `aes_assessment_asignacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration` datetime DEFAULT CURRENT_TIMESTAMP,
  `estudiante` text DEFAULT NULL,
  `evento_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `evaluador` text DEFAULT NULL,
  `registrante` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Table structure for table `aes_resultados`
--

CREATE TABLE `aes_resultados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration` datetime DEFAULT CURRENT_TIMESTAMP,
  `plan_id` int(11) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `editar` BOOLEAN NOT NULL DEFAULT TRUE;
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
