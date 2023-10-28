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
('usuario1', '144cce165e9b405a014d015e9059a7fd', 'us1@abc.com'),
('usuario2', '5d48bf211b23274f83e25904b927582e', 'us2@abc.com'),
('usuario3', '9fcdf17787254cbe6bf9bad6932952af', 'us3@abc.com');

INSERT INTO usuario(usnombre, uspass, usmail, usdeshabilitado) VALUES
('usuario4', 'b1a33ba027ca1962d3630f07d82416a3', 'us4@abc.com', '2023-10-28 18:04:00');