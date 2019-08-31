-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-01-2019 a las 14:44:56
-- Versión del servidor: 5.6.41
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `montecar_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adm`
--

CREATE TABLE `adm` (
  `idAdm` varchar(20) NOT NULL,
  `numeroAdm` varchar(20) NOT NULL,
  `nombreAdm` varchar(30) NOT NULL,
  `apellidoPaternoAdm` varchar(40) NOT NULL,
  `apellidoMaternoAdm` varchar(40) NOT NULL,
  `alias` varchar(20) NOT NULL,
  `rfc` varchar(20) NOT NULL,
  `curp` varchar(20) NOT NULL,
  `observaciones` varchar(100) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adm_correo`
--

CREATE TABLE `adm_correo` (
  `idAdmCorreo` int(11) NOT NULL,
  `idAdm` varchar(20) NOT NULL,
  `tipoCorreo` varchar(30) NOT NULL,
  `correoElectronico` varchar(50) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adm_direccion`
--

CREATE TABLE `adm_direccion` (
  `idAdmDireccion` int(11) NOT NULL,
  `idAdm` varchar(20) NOT NULL,
  `calle` varchar(40) NOT NULL,
  `numeroInterior` varchar(5) NOT NULL,
  `numeroExterior` varchar(5) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `delegacion` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adm_telefono`
--

CREATE TABLE `adm_telefono` (
  `idAdmTelefono` int(11) NOT NULL,
  `idAdm` varchar(20) NOT NULL,
  `ubicacion` varchar(25) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anio`
--

CREATE TABLE `anio` (
  `idAnio` varchar(20) NOT NULL,
  `anio` varchar(30) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `armadora`
--

CREATE TABLE `armadora` (
  `idArmadora` varchar(20) NOT NULL,
  `Armadora` varchar(30) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `idArticulo` varchar(20) NOT NULL,
  `codigoArticulo` varchar(20) NOT NULL,
  `codigoAlterno` varchar(20) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `descripcionArticulo` varchar(150) NOT NULL,
  `unidadDeCompra` int(11) NOT NULL,
  `unidadDeVenta` int(11) NOT NULL,
  `factor` int(11) NOT NULL,
  `inventarioMinimo` int(11) NOT NULL,
  `inventarioMaximo` int(11) NOT NULL,
  `unidadesExistentes` int(11) NOT NULL,
  `unidadesVendidas` int(11) NOT NULL,
  `localizacion` varchar(20) NOT NULL,
  `idCategoria` varchar(20) NOT NULL,
  `idDepartamento` varchar(20) NOT NULL,
  `idProveedor` varchar(20) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `buzon_cliente`
--

CREATE TABLE `buzon_cliente` (
  `idBuzonCliente` int(11) NOT NULL,
  `idCliente` varchar(20) NOT NULL,
  `operador` varchar(20) NOT NULL,
  `mensaje` varchar(250) NOT NULL,
  `estado` int(11) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `buzon_operador`
--

CREATE TABLE `buzon_operador` (
  `idBuzonOperador` int(11) NOT NULL,
  `idCliente` varchar(20) NOT NULL,
  `operador` varchar(20) NOT NULL,
  `mensaje` varchar(250) NOT NULL,
  `estado` int(11) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idCarrito` varchar(20) NOT NULL,
  `idCliente` varchar(20) NOT NULL,
  `idSesion` varchar(64) NOT NULL,
  `fechaHora` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` varchar(20) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chofer`
--

CREATE TABLE `chofer` (
  `idChofer` varchar(20) NOT NULL,
  `claveChofer` varchar(20) NOT NULL,
  `nombreChofer` varchar(25) NOT NULL,
  `apellidoPaternoChofer` varchar(30) NOT NULL,
  `apellidoMaternoChofer` varchar(30) NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chofer_correo`
--

CREATE TABLE `chofer_correo` (
  `idChoferCorreo` int(11) NOT NULL,
  `idChofer` varchar(20) NOT NULL,
  `tipoCorreo` varchar(30) NOT NULL,
  `correoElectronico` varchar(50) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chofer_telefono`
--

CREATE TABLE `chofer_telefono` (
  `idChoferTelefono` int(11) NOT NULL,
  `idChofer` varchar(20) NOT NULL,
  `ubicacion` varchar(25) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chofer_unidad`
--

CREATE TABLE `chofer_unidad` (
  `idChoferUnidad` int(11) NOT NULL,
  `idChofer` varchar(20) NOT NULL,
  `idUnidadMovil` varchar(20) NOT NULL,
  `idAdm` varchar(20) NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cilindro`
--

CREATE TABLE `cilindro` (
  `idCilindro` varchar(20) NOT NULL,
  `cilindro` varchar(30) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `idClase` int(11) NOT NULL,
  `idArticulo` varchar(20) NOT NULL,
  `idRegion` varchar(20) NOT NULL,
  `idAnio` varchar(20) NOT NULL,
  `idArmadora` varchar(20) NOT NULL,
  `idModelo` varchar(20) NOT NULL,
  `idCilindro` varchar(20) NOT NULL,
  `idLitro` varchar(20) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` varchar(20) NOT NULL,
  `claveCliente` varchar(20) NOT NULL,
  `denominacion` varchar(30) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellidoPaterno` varchar(30) NOT NULL,
  `apellidoMaterno` varchar(30) NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `rfc` varchar(20) DEFAULT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_correo`
--

CREATE TABLE `cliente_correo` (
  `idClienteCorreo` int(11) NOT NULL,
  `idCliente` varchar(20) NOT NULL,
  `tipoCorreo` varchar(30) NOT NULL,
  `correoElectronico` varchar(50) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_direccion`
--

CREATE TABLE `cliente_direccion` (
  `idClienteDireccion` int(11) NOT NULL,
  `idCliente` varchar(20) NOT NULL,
  `calle` varchar(40) NOT NULL,
  `numeroInterior` varchar(5) NOT NULL,
  `numeroExterior` varchar(5) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `delegacion` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `codigoPostal` varchar(6) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_telefono`
--

CREATE TABLE `cliente_telefono` (
  `idClienteTelefono` int(11) NOT NULL,
  `idCliente` varchar(20) NOT NULL,
  `ubicacion` varchar(25) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto`
--

CREATE TABLE `concepto` (
  `idConcepto` int(11) NOT NULL,
  `idNotaServicio` varchar(20) NOT NULL,
  `idServicio` varchar(20) NOT NULL,
  `folio` varchar(20) NOT NULL,
  `unidad` int(11) NOT NULL,
  `codigoUnidad` varchar(40) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precioUnitario` decimal(10,2) NOT NULL,
  `subTotal` decimal(10,2) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido_carrito`
--

CREATE TABLE `contenido_carrito` (
  `idContenidoCarrito` int(11) NOT NULL,
  `idCarrito` varchar(20) NOT NULL,
  `idCliente` varchar(20) NOT NULL,
  `idSesion` varchar(64) NOT NULL,
  `idArticulo` varchar(20) NOT NULL,
  `codigoArticulo` varchar(20) NOT NULL,
  `codigoAlterno` varchar(20) NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `unidades` int(11) NOT NULL,
  `subTotal` decimal(10,2) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dat_adm`
--

CREATE TABLE `dat_adm` (
  `idDatAdm` int(11) NOT NULL,
  `idAdm` varchar(20) NOT NULL,
  `user` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firma` varchar(45) NOT NULL,
  `certificado` varchar(45) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dat_cliente`
--

CREATE TABLE `dat_cliente` (
  `idDatCliente` int(11) NOT NULL,
  `idCliente` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `firma` varchar(64) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dat_socio`
--

CREATE TABLE `dat_socio` (
  `idDatSocio` int(11) NOT NULL,
  `idSocio` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firma` varchar(255) NOT NULL,
  `sello` varchar(255) NOT NULL,
  `certificado` varchar(255) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `idDepartamnto` varchar(20) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `idDetalleVenta` int(11) NOT NULL,
  `idVenta` varchar(20) NOT NULL,
  `idArticulo` varchar(20) NOT NULL,
  `codigoArticulo` varchar(20) NOT NULL,
  `codigoAlterno` varchar(20) NOT NULL,
  `unidades` int(11) NOT NULL,
  `precioDeVenta` decimal(10,2) NOT NULL,
  `subTotal` decimal(10,2) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `codigoVenta` varchar(25) NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Disparadores `detalle_venta`
--
DELIMITER $$
CREATE TRIGGER `restarStock` AFTER INSERT ON `detalle_venta` FOR EACH ROW Update articulo
set articulo.unidadesExistentes = articulo.unidadesExistentes - NEW.unidades
where articulo.idArticulo = NEW.idArticulo
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleadosocio`
--

CREATE TABLE `empleadosocio` (
  `idSocioEmpleado` int(11) NOT NULL,
  `idSocio` varchar(20) NOT NULL,
  `nombreEmpleado` varchar(25) NOT NULL,
  `apellidoPaternoEmpleado` varchar(30) NOT NULL,
  `apellidoMaternoEmpleado` varchar(30) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` varchar(20) NOT NULL,
  `claveEmpresa` varchar(20) NOT NULL,
  `denominacion` varchar(50) NOT NULL,
  `responsable` varchar(50) NOT NULL,
  `rfc` varchar(20) NOT NULL,
  `giro` varchar(20) NOT NULL,
  `observaciones` varchar(100) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_correo`
--

CREATE TABLE `empresa_correo` (
  `idEmpresaCorreo` int(11) NOT NULL,
  `idEmpresa` varchar(20) NOT NULL,
  `tipoCorreo` varchar(30) NOT NULL,
  `correoElectronico` varchar(50) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_direccion`
--

CREATE TABLE `empresa_direccion` (
  `idEmpresaDireccion` int(11) NOT NULL,
  `idEmpresa` varchar(20) NOT NULL,
  `calle` varchar(40) NOT NULL,
  `numeroInterior` varchar(5) NOT NULL,
  `numeroExterior` varchar(5) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `delegacion` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_telefono`
--

CREATE TABLE `empresa_telefono` (
  `idEmpresaTelefono` int(11) NOT NULL,
  `idEmpresa` varchar(20) NOT NULL,
  `ubicacion` varchar(25) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evidencia`
--

CREATE TABLE `evidencia` (
  `idEvidencia` int(11) NOT NULL,
  `idNotaServicio` varchar(20) NOT NULL,
  `folio` varchar(20) NOT NULL,
  `contador` int(11) NOT NULL DEFAULT '0',
  `urlImagen` varchar(50) NOT NULL,
  `nombreImagen` varchar(50) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `idImagen` int(11) NOT NULL,
  `idArticulo` varchar(20) NOT NULL,
  `urlImagen` varchar(300) NOT NULL,
  `nombreImagen` varchar(150) NOT NULL,
  `orden` int(11) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `litro`
--

CREATE TABLE `litro` (
  `idLitro` varchar(20) NOT NULL,
  `litro` varchar(30) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `idModelo` varchar(20) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_servicio`
--

CREATE TABLE `nota_servicio` (
  `idNotaServicio` varchar(20) NOT NULL,
  `folio` varchar(20) NOT NULL,
  `totalNota` decimal(10,2) NOT NULL,
  `observacionesInterna` varchar(100) NOT NULL,
  `observacionesExterna` varchar(100) NOT NULL,
  `observacionesMaletera` varchar(100) NOT NULL,
  `firma` varchar(60) NOT NULL,
  `certificado` varchar(60) NOT NULL,
  `claveOperacion` varchar(60) NOT NULL,
  `fechaRegistro` varchar(10) NOT NULL,
  `fechaFinal` varchar(10) NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_servicio_unidad`
--

CREATE TABLE `nota_servicio_unidad` (
  `idNotaServicioUnidad` int(11) NOT NULL,
  `idNotaServicio` varchar(20) NOT NULL,
  `folio` varchar(20) NOT NULL,
  `idEmpresa` varchar(20) NOT NULL,
  `idUnidadMovil` int(11) NOT NULL,
  `idChofer` varchar(20) NOT NULL,
  `firma` varchar(80) NOT NULL,
  `fechaDeRegistro` varchar(10) NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenpedido`
--

CREATE TABLE `ordenpedido` (
  `idPedido` int(11) NOT NULL,
  `idCliente` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `estatus` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidox`
--

CREATE TABLE `pedidox` (
  `idPedidox` int(11) NOT NULL,
  `idCliente` varchar(20) NOT NULL,
  `idVenta` varchar(20) DEFAULT NULL,
  `idArticulo` varchar(20) NOT NULL,
  `codigoArticulo` varchar(20) NOT NULL,
  `codigoAlterno` varchar(20) NOT NULL,
  `precioDeVenta` decimal(10,2) NOT NULL,
  `unidades` int(11) NOT NULL,
  `subTotal` decimal(10,2) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocionsocio`
--

CREATE TABLE `promocionsocio` (
  `idPromocion` int(11) NOT NULL,
  `urlImagen` varchar(50) NOT NULL,
  `nombreImagen` varchar(50) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` varchar(20) NOT NULL,
  `claveProveedor` varchar(20) NOT NULL,
  `denominacion` varchar(30) NOT NULL,
  `nombreProveedor` varchar(25) NOT NULL,
  `apellidoPaternoProveedor` varchar(30) NOT NULL,
  `apellidoMaternoProveedor` varchar(30) NOT NULL,
  `alias` varchar(20) NOT NULL,
  `rfc` varchar(20) NOT NULL,
  `observaciones` varchar(100) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_correo`
--

CREATE TABLE `proveedor_correo` (
  `idProveedorCorreo` int(11) NOT NULL,
  `idProveedor` varchar(20) NOT NULL,
  `tipoCorreo` varchar(30) NOT NULL,
  `correoElectronico` varchar(50) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_credito`
--

CREATE TABLE `proveedor_credito` (
  `idProveedorCredito` int(11) NOT NULL,
  `idProveedor` varchar(20) NOT NULL,
  `limiteDeCredito` decimal(10,2) NOT NULL,
  `diasDeCredito` int(11) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_direccion`
--

CREATE TABLE `proveedor_direccion` (
  `idProveedorDireccion` int(11) NOT NULL,
  `idProveedor` varchar(20) NOT NULL,
  `calle` varchar(40) NOT NULL,
  `numeroInterior` varchar(5) NOT NULL,
  `numeroExterior` varchar(5) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `delegacion` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_telefono`
--

CREATE TABLE `proveedor_telefono` (
  `idProveedorTelefono` int(11) NOT NULL,
  `idProveedor` varchar(20) NOT NULL,
  `ubicacion` varchar(25) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE `region` (
  `idRegion` varchar(20) NOT NULL,
  `region` varchar(30) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restablecerpass`
--

CREATE TABLE `restablecerpass` (
  `idRestablecer` int(11) NOT NULL,
  `idSocio` varchar(20) NOT NULL,
  `token` varchar(60) NOT NULL,
  `fechaRecuperacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `idServicio` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `unidad` varchar(20) NOT NULL,
  `codigoUnidad` varchar(20) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `precio` varchar(20) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `idSes` int(11) NOT NULL,
  `idCliente` varchar(20) DEFAULT NULL,
  `fechaHoraInicio` datetime DEFAULT NULL,
  `fechaHoraSalida` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesionsocio`
--

CREATE TABLE `sesionsocio` (
  `idSocioSesion` int(11) NOT NULL,
  `idSesion` varchar(20) NOT NULL,
  `idSocio` varchar(20) NOT NULL,
  `fechaDeEntrada` datetime NOT NULL,
  `fechaDeSalida` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE `socio` (
  `idSocio` varchar(20) NOT NULL,
  `claveSocio` varchar(20) NOT NULL,
  `denominacion` varchar(30) NOT NULL,
  `nombreSocio` varchar(25) NOT NULL,
  `apellidoPaternoSocio` varchar(30) NOT NULL,
  `apellidoMaternoSocio` varchar(30) NOT NULL,
  `alias` varchar(20) NOT NULL,
  `rfc` varchar(20) NOT NULL,
  `observaciones` varchar(100) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio_correo`
--

CREATE TABLE `socio_correo` (
  `idSocioCorreo` int(11) NOT NULL,
  `idSocio` varchar(20) NOT NULL,
  `tipoCorreo` varchar(30) NOT NULL,
  `correoElectronico` varchar(50) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio_credito`
--

CREATE TABLE `socio_credito` (
  `idSocioCredito` int(11) NOT NULL,
  `idSocio` varchar(20) NOT NULL,
  `limiteDeCredito` decimal(10,2) NOT NULL,
  `diasDeCredito` int(11) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio_direccion`
--

CREATE TABLE `socio_direccion` (
  `idSocioDireccion` int(11) NOT NULL,
  `idSocio` varchar(20) NOT NULL,
  `calle` varchar(40) NOT NULL,
  `numeroInterior` varchar(5) NOT NULL,
  `numeroExterior` varchar(5) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `delegacion` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio_servicio`
--

CREATE TABLE `socio_servicio` (
  `idSocioServicio` int(11) NOT NULL,
  `idNotaServicio` varchar(20) NOT NULL,
  `folio` varchar(20) NOT NULL,
  `claveOperacion` varchar(60) NOT NULL,
  `idSocio` varchar(20) NOT NULL,
  `idServicio` int(11) DEFAULT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio_telefono`
--

CREATE TABLE `socio_telefono` (
  `idSocioTelefono` int(11) NOT NULL,
  `idSocio` varchar(20) NOT NULL,
  `ubicacion` varchar(25) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_movil`
--

CREATE TABLE `unidad_movil` (
  `idUnidadMovil` int(11) NOT NULL,
  `idEmpresa` varchar(20) NOT NULL,
  `numeroDeIdentificacion` varchar(20) NOT NULL,
  `placa` varchar(20) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `anio` varchar(10) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `numeroMotor` varchar(40) DEFAULT NULL,
  `numeroSerie` varchar(40) DEFAULT NULL,
  `km` varchar(20) DEFAULT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idVenta` varchar(20) NOT NULL,
  `idCliente` varchar(20) NOT NULL,
  `idSesion` varchar(64) NOT NULL,
  `totalArticulos` int(11) NOT NULL,
  `totalVenta` decimal(10,2) NOT NULL,
  `observaciones` varchar(100) NOT NULL,
  `fechaDeRegistro` datetime NOT NULL,
  `codigoVenta` varchar(25) NOT NULL,
  `aux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`idAdm`);

--
-- Indices de la tabla `adm_correo`
--
ALTER TABLE `adm_correo`
  ADD PRIMARY KEY (`idAdmCorreo`),
  ADD KEY `idAdm` (`idAdm`);

--
-- Indices de la tabla `adm_direccion`
--
ALTER TABLE `adm_direccion`
  ADD PRIMARY KEY (`idAdmDireccion`),
  ADD KEY `idAdm` (`idAdm`);

--
-- Indices de la tabla `adm_telefono`
--
ALTER TABLE `adm_telefono`
  ADD PRIMARY KEY (`idAdmTelefono`),
  ADD KEY `idAdm` (`idAdm`);

--
-- Indices de la tabla `anio`
--
ALTER TABLE `anio`
  ADD PRIMARY KEY (`idAnio`);

--
-- Indices de la tabla `armadora`
--
ALTER TABLE `armadora`
  ADD PRIMARY KEY (`idArmadora`);

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`idArticulo`);

--
-- Indices de la tabla `buzon_cliente`
--
ALTER TABLE `buzon_cliente`
  ADD PRIMARY KEY (`idBuzonCliente`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `buzon_operador`
--
ALTER TABLE `buzon_operador`
  ADD PRIMARY KEY (`idBuzonOperador`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idCarrito`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `chofer`
--
ALTER TABLE `chofer`
  ADD PRIMARY KEY (`idChofer`);

--
-- Indices de la tabla `chofer_correo`
--
ALTER TABLE `chofer_correo`
  ADD PRIMARY KEY (`idChoferCorreo`),
  ADD KEY `idChofer` (`idChofer`);

--
-- Indices de la tabla `chofer_telefono`
--
ALTER TABLE `chofer_telefono`
  ADD PRIMARY KEY (`idChoferTelefono`),
  ADD KEY `idChofer` (`idChofer`);

--
-- Indices de la tabla `chofer_unidad`
--
ALTER TABLE `chofer_unidad`
  ADD PRIMARY KEY (`idChoferUnidad`),
  ADD KEY `idChofer` (`idChofer`);

--
-- Indices de la tabla `cilindro`
--
ALTER TABLE `cilindro`
  ADD PRIMARY KEY (`idCilindro`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`idClase`),
  ADD KEY `idAnio` (`idAnio`),
  ADD KEY `idArmadora` (`idArmadora`),
  ADD KEY `idArticulo` (`idArticulo`),
  ADD KEY `idCilindro` (`idCilindro`),
  ADD KEY `idLitro` (`idLitro`),
  ADD KEY `idModelo` (`idModelo`),
  ADD KEY `idRegion` (`idRegion`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `cliente_correo`
--
ALTER TABLE `cliente_correo`
  ADD PRIMARY KEY (`idClienteCorreo`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `cliente_direccion`
--
ALTER TABLE `cliente_direccion`
  ADD PRIMARY KEY (`idClienteDireccion`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `cliente_telefono`
--
ALTER TABLE `cliente_telefono`
  ADD PRIMARY KEY (`idClienteTelefono`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `concepto`
--
ALTER TABLE `concepto`
  ADD PRIMARY KEY (`idConcepto`);

--
-- Indices de la tabla `contenido_carrito`
--
ALTER TABLE `contenido_carrito`
  ADD PRIMARY KEY (`idContenidoCarrito`),
  ADD KEY `idArticulo` (`idArticulo`),
  ADD KEY `idCarrito` (`idCarrito`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `dat_adm`
--
ALTER TABLE `dat_adm`
  ADD PRIMARY KEY (`idDatAdm`),
  ADD KEY `idAdm` (`idAdm`);

--
-- Indices de la tabla `dat_cliente`
--
ALTER TABLE `dat_cliente`
  ADD PRIMARY KEY (`idDatCliente`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `dat_socio`
--
ALTER TABLE `dat_socio`
  ADD PRIMARY KEY (`idDatSocio`),
  ADD KEY `idSocio` (`idSocio`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`idDepartamnto`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`idDetalleVenta`),
  ADD KEY `idVenta` (`idVenta`),
  ADD KEY `idArticulo` (`idArticulo`);

--
-- Indices de la tabla `empleadosocio`
--
ALTER TABLE `empleadosocio`
  ADD PRIMARY KEY (`idSocioEmpleado`),
  ADD KEY `idSocio` (`idSocio`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Indices de la tabla `empresa_correo`
--
ALTER TABLE `empresa_correo`
  ADD PRIMARY KEY (`idEmpresaCorreo`),
  ADD KEY `idEmpresa` (`idEmpresa`);

--
-- Indices de la tabla `empresa_direccion`
--
ALTER TABLE `empresa_direccion`
  ADD PRIMARY KEY (`idEmpresaDireccion`),
  ADD KEY `idEmpresa` (`idEmpresa`);

--
-- Indices de la tabla `empresa_telefono`
--
ALTER TABLE `empresa_telefono`
  ADD PRIMARY KEY (`idEmpresaTelefono`),
  ADD KEY `idEmpresa` (`idEmpresa`);

--
-- Indices de la tabla `evidencia`
--
ALTER TABLE `evidencia`
  ADD PRIMARY KEY (`idEvidencia`),
  ADD KEY `idNotaServicio` (`idNotaServicio`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`idImagen`),
  ADD KEY `idArticulo` (`idArticulo`);

--
-- Indices de la tabla `litro`
--
ALTER TABLE `litro`
  ADD PRIMARY KEY (`idLitro`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`idModelo`);

--
-- Indices de la tabla `nota_servicio`
--
ALTER TABLE `nota_servicio`
  ADD PRIMARY KEY (`idNotaServicio`);

--
-- Indices de la tabla `nota_servicio_unidad`
--
ALTER TABLE `nota_servicio_unidad`
  ADD PRIMARY KEY (`idNotaServicioUnidad`),
  ADD KEY `idNotaServicio` (`idNotaServicio`);

--
-- Indices de la tabla `ordenpedido`
--
ALTER TABLE `ordenpedido`
  ADD PRIMARY KEY (`idPedido`);

--
-- Indices de la tabla `pedidox`
--
ALTER TABLE `pedidox`
  ADD PRIMARY KEY (`idPedidox`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idVenta` (`idVenta`),
  ADD KEY `idArticulo` (`idArticulo`);

--
-- Indices de la tabla `promocionsocio`
--
ALTER TABLE `promocionsocio`
  ADD PRIMARY KEY (`idPromocion`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `proveedor_correo`
--
ALTER TABLE `proveedor_correo`
  ADD PRIMARY KEY (`idProveedorCorreo`),
  ADD KEY `idProveedor` (`idProveedor`);

--
-- Indices de la tabla `proveedor_credito`
--
ALTER TABLE `proveedor_credito`
  ADD PRIMARY KEY (`idProveedorCredito`),
  ADD KEY `idProveedor` (`idProveedor`);

--
-- Indices de la tabla `proveedor_direccion`
--
ALTER TABLE `proveedor_direccion`
  ADD PRIMARY KEY (`idProveedorDireccion`),
  ADD KEY `idProveedor` (`idProveedor`);

--
-- Indices de la tabla `proveedor_telefono`
--
ALTER TABLE `proveedor_telefono`
  ADD PRIMARY KEY (`idProveedorTelefono`),
  ADD KEY `idProveedor` (`idProveedor`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`idRegion`);

--
-- Indices de la tabla `restablecerpass`
--
ALTER TABLE `restablecerpass`
  ADD PRIMARY KEY (`idRestablecer`),
  ADD KEY `idSocio` (`idSocio`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`idServicio`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`idSes`);

--
-- Indices de la tabla `sesionsocio`
--
ALTER TABLE `sesionsocio`
  ADD PRIMARY KEY (`idSocioSesion`),
  ADD KEY `idSocio` (`idSocio`);

--
-- Indices de la tabla `socio`
--
ALTER TABLE `socio`
  ADD PRIMARY KEY (`idSocio`);

--
-- Indices de la tabla `socio_correo`
--
ALTER TABLE `socio_correo`
  ADD PRIMARY KEY (`idSocioCorreo`),
  ADD KEY `idSocio` (`idSocio`);

--
-- Indices de la tabla `socio_credito`
--
ALTER TABLE `socio_credito`
  ADD PRIMARY KEY (`idSocioCredito`),
  ADD KEY `idSocio` (`idSocio`);

--
-- Indices de la tabla `socio_direccion`
--
ALTER TABLE `socio_direccion`
  ADD PRIMARY KEY (`idSocioDireccion`),
  ADD KEY `idSocio` (`idSocio`);

--
-- Indices de la tabla `socio_servicio`
--
ALTER TABLE `socio_servicio`
  ADD PRIMARY KEY (`idSocioServicio`),
  ADD KEY `idNotaServicio` (`idNotaServicio`),
  ADD KEY `idServicio` (`idServicio`),
  ADD KEY `idSocio` (`idSocio`);

--
-- Indices de la tabla `socio_telefono`
--
ALTER TABLE `socio_telefono`
  ADD PRIMARY KEY (`idSocioTelefono`),
  ADD KEY `idSocio` (`idSocio`);

--
-- Indices de la tabla `unidad_movil`
--
ALTER TABLE `unidad_movil`
  ADD PRIMARY KEY (`idUnidadMovil`),
  ADD KEY `idEmpresa` (`idEmpresa`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `idCliente` (`idCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adm_correo`
--
ALTER TABLE `adm_correo`
  MODIFY `idAdmCorreo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `adm_direccion`
--
ALTER TABLE `adm_direccion`
  MODIFY `idAdmDireccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `adm_telefono`
--
ALTER TABLE `adm_telefono`
  MODIFY `idAdmTelefono` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `buzon_cliente`
--
ALTER TABLE `buzon_cliente`
  MODIFY `idBuzonCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `buzon_operador`
--
ALTER TABLE `buzon_operador`
  MODIFY `idBuzonOperador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `chofer_correo`
--
ALTER TABLE `chofer_correo`
  MODIFY `idChoferCorreo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `chofer_telefono`
--
ALTER TABLE `chofer_telefono`
  MODIFY `idChoferTelefono` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `chofer_unidad`
--
ALTER TABLE `chofer_unidad`
  MODIFY `idChoferUnidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `idClase` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente_correo`
--
ALTER TABLE `cliente_correo`
  MODIFY `idClienteCorreo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente_direccion`
--
ALTER TABLE `cliente_direccion`
  MODIFY `idClienteDireccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente_telefono`
--
ALTER TABLE `cliente_telefono`
  MODIFY `idClienteTelefono` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `concepto`
--
ALTER TABLE `concepto`
  MODIFY `idConcepto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contenido_carrito`
--
ALTER TABLE `contenido_carrito`
  MODIFY `idContenidoCarrito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dat_adm`
--
ALTER TABLE `dat_adm`
  MODIFY `idDatAdm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dat_cliente`
--
ALTER TABLE `dat_cliente`
  MODIFY `idDatCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dat_socio`
--
ALTER TABLE `dat_socio`
  MODIFY `idDatSocio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `idDetalleVenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleadosocio`
--
ALTER TABLE `empleadosocio`
  MODIFY `idSocioEmpleado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa_correo`
--
ALTER TABLE `empresa_correo`
  MODIFY `idEmpresaCorreo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa_direccion`
--
ALTER TABLE `empresa_direccion`
  MODIFY `idEmpresaDireccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa_telefono`
--
ALTER TABLE `empresa_telefono`
  MODIFY `idEmpresaTelefono` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evidencia`
--
ALTER TABLE `evidencia`
  MODIFY `idEvidencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `idImagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nota_servicio_unidad`
--
ALTER TABLE `nota_servicio_unidad`
  MODIFY `idNotaServicioUnidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ordenpedido`
--
ALTER TABLE `ordenpedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidox`
--
ALTER TABLE `pedidox`
  MODIFY `idPedidox` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `promocionsocio`
--
ALTER TABLE `promocionsocio`
  MODIFY `idPromocion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor_correo`
--
ALTER TABLE `proveedor_correo`
  MODIFY `idProveedorCorreo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor_credito`
--
ALTER TABLE `proveedor_credito`
  MODIFY `idProveedorCredito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor_direccion`
--
ALTER TABLE `proveedor_direccion`
  MODIFY `idProveedorDireccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor_telefono`
--
ALTER TABLE `proveedor_telefono`
  MODIFY `idProveedorTelefono` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `restablecerpass`
--
ALTER TABLE `restablecerpass`
  MODIFY `idRestablecer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `idServicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `idSes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sesionsocio`
--
ALTER TABLE `sesionsocio`
  MODIFY `idSocioSesion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `socio_correo`
--
ALTER TABLE `socio_correo`
  MODIFY `idSocioCorreo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `socio_credito`
--
ALTER TABLE `socio_credito`
  MODIFY `idSocioCredito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `socio_direccion`
--
ALTER TABLE `socio_direccion`
  MODIFY `idSocioDireccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `socio_servicio`
--
ALTER TABLE `socio_servicio`
  MODIFY `idSocioServicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `socio_telefono`
--
ALTER TABLE `socio_telefono`
  MODIFY `idSocioTelefono` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidad_movil`
--
ALTER TABLE `unidad_movil`
  MODIFY `idUnidadMovil` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adm_correo`
--
ALTER TABLE `adm_correo`
  ADD CONSTRAINT `adm_correo_ibfk_1` FOREIGN KEY (`idAdm`) REFERENCES `adm` (`idAdm`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `adm_direccion`
--
ALTER TABLE `adm_direccion`
  ADD CONSTRAINT `adm_direccion_ibfk_1` FOREIGN KEY (`idAdm`) REFERENCES `adm` (`idAdm`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `adm_telefono`
--
ALTER TABLE `adm_telefono`
  ADD CONSTRAINT `adm_telefono_ibfk_1` FOREIGN KEY (`idAdm`) REFERENCES `adm` (`idAdm`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `buzon_cliente`
--
ALTER TABLE `buzon_cliente`
  ADD CONSTRAINT `buzon_cliente_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `buzon_operador`
--
ALTER TABLE `buzon_operador`
  ADD CONSTRAINT `buzon_operador_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `chofer_correo`
--
ALTER TABLE `chofer_correo`
  ADD CONSTRAINT `chofer_correo_ibfk_1` FOREIGN KEY (`idChofer`) REFERENCES `chofer` (`idChofer`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `chofer_telefono`
--
ALTER TABLE `chofer_telefono`
  ADD CONSTRAINT `chofer_telefono_ibfk_1` FOREIGN KEY (`idChofer`) REFERENCES `chofer` (`idChofer`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `chofer_unidad`
--
ALTER TABLE `chofer_unidad`
  ADD CONSTRAINT `chofer_unidad_ibfk_1` FOREIGN KEY (`idChofer`) REFERENCES `chofer` (`idChofer`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `clase`
--
ALTER TABLE `clase`
  ADD CONSTRAINT `clase_ibfk_1` FOREIGN KEY (`idAnio`) REFERENCES `anio` (`idAnio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `clase_ibfk_2` FOREIGN KEY (`idArmadora`) REFERENCES `armadora` (`idArmadora`) ON UPDATE CASCADE,
  ADD CONSTRAINT `clase_ibfk_3` FOREIGN KEY (`idArticulo`) REFERENCES `articulo` (`idArticulo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `clase_ibfk_4` FOREIGN KEY (`idCilindro`) REFERENCES `cilindro` (`idCilindro`) ON UPDATE CASCADE,
  ADD CONSTRAINT `clase_ibfk_5` FOREIGN KEY (`idLitro`) REFERENCES `litro` (`idLitro`) ON UPDATE CASCADE,
  ADD CONSTRAINT `clase_ibfk_6` FOREIGN KEY (`idModelo`) REFERENCES `modelo` (`idModelo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `clase_ibfk_7` FOREIGN KEY (`idRegion`) REFERENCES `region` (`idRegion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente_correo`
--
ALTER TABLE `cliente_correo`
  ADD CONSTRAINT `cliente_correo_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente_direccion`
--
ALTER TABLE `cliente_direccion`
  ADD CONSTRAINT `cliente_direccion_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente_telefono`
--
ALTER TABLE `cliente_telefono`
  ADD CONSTRAINT `cliente_telefono_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `contenido_carrito`
--
ALTER TABLE `contenido_carrito`
  ADD CONSTRAINT `contenido_carrito_ibfk_1` FOREIGN KEY (`idArticulo`) REFERENCES `articulo` (`idArticulo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `contenido_carrito_ibfk_2` FOREIGN KEY (`idCarrito`) REFERENCES `carrito` (`idCarrito`) ON UPDATE CASCADE,
  ADD CONSTRAINT `contenido_carrito_ibfk_3` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `dat_adm`
--
ALTER TABLE `dat_adm`
  ADD CONSTRAINT `dat_adm_ibfk_1` FOREIGN KEY (`idAdm`) REFERENCES `adm` (`idAdm`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `dat_cliente`
--
ALTER TABLE `dat_cliente`
  ADD CONSTRAINT `dat_cliente_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `dat_socio`
--
ALTER TABLE `dat_socio`
  ADD CONSTRAINT `dat_socio_ibfk_1` FOREIGN KEY (`idSocio`) REFERENCES `socio` (`idSocio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`idVenta`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`idArticulo`) REFERENCES `articulo` (`idArticulo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleadosocio`
--
ALTER TABLE `empleadosocio`
  ADD CONSTRAINT `empleadosocio_ibfk_1` FOREIGN KEY (`idSocio`) REFERENCES `socio` (`idSocio`);

--
-- Filtros para la tabla `empresa_correo`
--
ALTER TABLE `empresa_correo`
  ADD CONSTRAINT `empresa_correo_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresa_direccion`
--
ALTER TABLE `empresa_direccion`
  ADD CONSTRAINT `empresa_direccion_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresa_telefono`
--
ALTER TABLE `empresa_telefono`
  ADD CONSTRAINT `empresa_telefono_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `evidencia`
--
ALTER TABLE `evidencia`
  ADD CONSTRAINT `evidencia_ibfk_1` FOREIGN KEY (`idNotaServicio`) REFERENCES `nota_servicio` (`idNotaServicio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`idArticulo`) REFERENCES `articulo` (`idArticulo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `nota_servicio_unidad`
--
ALTER TABLE `nota_servicio_unidad`
  ADD CONSTRAINT `nota_servicio_unidad_ibfk_1` FOREIGN KEY (`idNotaServicio`) REFERENCES `nota_servicio` (`idNotaServicio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidox`
--
ALTER TABLE `pedidox`
  ADD CONSTRAINT `pedidox_ibfk_1` FOREIGN KEY (`idArticulo`) REFERENCES `articulo` (`idArticulo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidox_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidox_ibfk_3` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`idVenta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor_correo`
--
ALTER TABLE `proveedor_correo`
  ADD CONSTRAINT `proveedor_correo_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor_credito`
--
ALTER TABLE `proveedor_credito`
  ADD CONSTRAINT `proveedor_credito_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor_direccion`
--
ALTER TABLE `proveedor_direccion`
  ADD CONSTRAINT `proveedor_direccion_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor_telefono`
--
ALTER TABLE `proveedor_telefono`
  ADD CONSTRAINT `proveedor_telefono_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `restablecerpass`
--
ALTER TABLE `restablecerpass`
  ADD CONSTRAINT `restablecerpass_ibfk_1` FOREIGN KEY (`idSocio`) REFERENCES `socio` (`idSocio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesionsocio`
--
ALTER TABLE `sesionsocio`
  ADD CONSTRAINT `sesionsocio_ibfk_1` FOREIGN KEY (`idSocio`) REFERENCES `socio` (`idSocio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `socio_correo`
--
ALTER TABLE `socio_correo`
  ADD CONSTRAINT `socio_correo_ibfk_1` FOREIGN KEY (`idSocio`) REFERENCES `socio` (`idSocio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `socio_credito`
--
ALTER TABLE `socio_credito`
  ADD CONSTRAINT `socio_credito_ibfk_1` FOREIGN KEY (`idSocio`) REFERENCES `socio` (`idSocio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `socio_direccion`
--
ALTER TABLE `socio_direccion`
  ADD CONSTRAINT `socio_direccion_ibfk_1` FOREIGN KEY (`idSocio`) REFERENCES `socio` (`idSocio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `socio_servicio`
--
ALTER TABLE `socio_servicio`
  ADD CONSTRAINT `socio_servicio_ibfk_1` FOREIGN KEY (`idNotaServicio`) REFERENCES `nota_servicio` (`idNotaServicio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `socio_servicio_ibfk_2` FOREIGN KEY (`idServicio`) REFERENCES `servicio` (`idServicio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `socio_servicio_ibfk_3` FOREIGN KEY (`idSocio`) REFERENCES `socio` (`idSocio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `socio_telefono`
--
ALTER TABLE `socio_telefono`
  ADD CONSTRAINT `socio_telefono_ibfk_1` FOREIGN KEY (`idSocio`) REFERENCES `socio` (`idSocio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `unidad_movil`
--
ALTER TABLE `unidad_movil`
  ADD CONSTRAINT `unidad_movil_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
