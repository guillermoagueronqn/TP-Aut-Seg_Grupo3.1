-- 
-- Base de datos: `bdautenticacion`
-- 

-- --------------------------------------------------------

-- 
-- Estructura para la tabla `reclamo`
--
CREATE TABLE usuario (
    idusuario bigint(20) AUTO_INCREMENT,
    usnombre varchar(50),
    uspass int(11),
    usmail varchar(50),
    usdeshabilitado timestamp NULL DEFAULT NULL,
    PRIMARY KEY (idusuario)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 AUTO_INCREMENT = 1;

CREATE TABLE rol (
    idrol bigint(20) AUTO_INCREMENT,
    rodescripcion varchar(50),
    PRIMARY KEY (idrol)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 AUTO_INCREMENT = 1;

CREATE TABLE usuariorol (
    idusuario bigint(20),
    idrol bigint(20),
    PRIMARY KEY (idusuario, idrol),
    FOREIGN KEY (idusuario) REFERENCES usuario (idusuario),
    FOREIGN KEY (idrol) REFERENCES rol (idrol)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

