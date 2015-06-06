create database proyecto default
character set utf8 collate utf8_unicode_ci;

grant all on proyecto.* to
root@localhost identified by '';

flush privileges;

CREATE TABLE `producto` (
`idProducto` int(11) NOT NULL primary key auto_increment,
`nombre` varchar(30) NOT NULL,
`tipo` varchar(30) NOT NULL,
`precioAlcampo` decimal(5,2) NOT NULL,
`precioCarrefour` decimal(5,2) NOT NULL,
`precioCoviran` decimal(5,2) NOT NULL,
`precioDia` decimal(5,2) NOT NULL,
`foto` varchar(200) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `usuario` (
`login` varchar(30) NOT NULL primary key,
`clave` varchar(40) NOT NULL,
`nombre` varchar(30) NOT NULL,
`apellidos` varchar(60) NOT NULL,
`email` varchar(40) NOT NULL,
`fechaalta` date NOT NULL,
`isactivo` tinyint(1) NOT NULL,
`isroot` tinyint(1) NOT NULL DEFAULT 0,
`rol` enum('administrador', 'usuario') NOT NULL DEFAULT 'usuario',
`fechalogin` datetime
) ENGINE=InnoDB;

CREATE TABLE `categoria` (
`nombre` varchar(30) NOT NULL primary key
) ENGINE=InnoDB;
