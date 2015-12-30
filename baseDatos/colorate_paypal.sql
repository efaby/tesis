-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 07-10-2011 a las 10:18:50
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `colorate_paypal`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `clientes`
-- 

CREATE TABLE `clientes` (
  `id_cliente` int(5) NOT NULL auto_increment,
  `nombre` varchar(80) NOT NULL,
  `e-mail` varchar(100) NOT NULL,
  `telefono` varchar(50) default NULL,
  `direccion` varchar(50) default NULL,
  `fec_alta` date NOT NULL,
  PRIMARY KEY  (`id_cliente`),
  UNIQUE KEY `e-mail` (`e-mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `clientes`
-- 

INSERT INTO `clientes` VALUES (1, 'Paco Porras', 'pacoporras@gmail.com', '555555551', 'Valladolid 174, Bajos Barcelona', '2011-09-19');
INSERT INTO `clientes` VALUES (2, 'Sergio Facus', 'sergio.facus@gmail.com', '555555555', 'Armados 45, 1º 2º Algeciras (Cádiz)', '2011-09-19');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `det_pedidos`
-- 

CREATE TABLE `det_pedidos` (
  `id_detpedido` int(5) NOT NULL auto_increment,
  `id_pedido` int(5) NOT NULL,
  `id_producto` int(5) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio` int(5) NOT NULL,
  PRIMARY KEY  (`id_detpedido`),
  KEY `id_pedido` (`id_pedido`,`id_producto`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `det_pedidos`
-- 

INSERT INTO `det_pedidos` VALUES (1, 1, 1, 1, 850);
INSERT INTO `det_pedidos` VALUES (2, 1, 1, 3, 210);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pedidos`
-- 

CREATE TABLE `pedidos` (
  `id_pedido` int(5) NOT NULL auto_increment,
  `id_cliente` int(5) NOT NULL,
  `fec_alta` date NOT NULL,
  PRIMARY KEY  (`id_pedido`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `pedidos`
-- 

INSERT INTO `pedidos` VALUES (1, 1, '2011-09-19');
INSERT INTO `pedidos` VALUES (2, 2, '2011-09-19');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `productos`
-- 

CREATE TABLE `productos` (
  `id` int(11) NOT NULL auto_increment,
  `producto` varchar(100) default NULL,
  `precio` decimal(9,2) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- 
-- Volcar la base de datos para la tabla `productos`
-- 

INSERT INTO `productos` VALUES (1, 'Diseño Web Estática', 850.00);
INSERT INTO `productos` VALUES (2, 'Desarrollo CMS PHP y MySql', 2150.00);
INSERT INTO `productos` VALUES (3, 'Diseño Logo', 210.00);
INSERT INTO `productos` VALUES (4, 'Diseño Web (PSD)', 540.00);
INSERT INTO `productos` VALUES (5, 'Formulario de Contacto', 52.00);
INSERT INTO `productos` VALUES (6, 'Registro de Usuarios', 42.00);
INSERT INTO `productos` VALUES (7, 'Animación Flash', 120.00);
INSERT INTO `productos` VALUES (8, 'Carrito de Compra', 590.00);
INSERT INTO `productos` VALUES (9, 'Alojamiento Web', 34.00);
INSERT INTO `productos` VALUES (10, 'Dominio', 9.00);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios`
-- 

CREATE TABLE `usuarios` (
  `id` smallint(4) NOT NULL auto_increment,
  `email` varchar(150) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `usuarios`
-- 

INSERT INTO `usuarios` VALUES (1, 'demo@demo.com', 'c514c91e4ed341f263e458d44b3bb0a7');
INSERT INTO `usuarios` VALUES (2, 'demo2@demo2.com', '958909680371f1a0c4d326b4b0c7ef80');
