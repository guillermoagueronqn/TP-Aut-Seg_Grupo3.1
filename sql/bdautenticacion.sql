-- Active: 1685158897739@@127.0.0.1@3306@bdautenticacion
-- 
-- Base de datos: `bdautenticacion`
-- 

-- --------------------------------------------------------

-- 
-- Estructura para la tabla `usuario`
--

CREATE TABLE usuario (
    idusuario bigint(20) AUTO_INCREMENT,
    usnombre varchar(50),
    uspass varchar(50),
    usmail varchar(50),
    usdeshabilitado timestamp DEFAULT '0000-00-00 00:00:00',
    PRIMARY KEY (idusuario)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 AUTO_INCREMENT = 1;

-- 
-- Estructura para la tabla `rol`
--

CREATE TABLE rol (
    idrol bigint(20) AUTO_INCREMENT,
    rodescripcion varchar(50),
    PRIMARY KEY (idrol)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 AUTO_INCREMENT = 1;

-- 
-- Estructura para la tabla `usuariorol`
--

CREATE TABLE usuariorol (
    idusuario bigint(20),
    idrol bigint(20),
    PRIMARY KEY (idusuario, idrol),
    FOREIGN KEY (idusuario) REFERENCES usuario (idusuario),
    FOREIGN KEY (idrol) REFERENCES rol (idrol)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

-- 
-- Volcar la base de datos para la tabla `usuario`
-- 

INSERT INTO usuario(usnombre, uspass, usmail) VALUES
('usuario1', '144cce165e9b405a014d015e9059a7fd', 'us1@abc.com');

INSERT INTO usuario(usnombre, uspass, usmail, usdeshabilitado) VALUES
('usuario2', 'dddc3c797b55e57459abadac14706030', 'us2@abc.com', '2023-10-28 02:19:35');

INSERT INTO usuario(usnombre, uspass, usmail) VALUES
('usuario3', '4f92b80c0fca1a495ad8ff524c630a8d', 'us3@abc.com');

INSERT INTO usuario(usnombre, uspass, usmail, usdeshabilitado) VALUES
('usuario4', '2890348f6452c179527139b77e81da3b', 'us4@abc.com', '2023-10-28 18:04:00');