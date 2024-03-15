-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-03-2024 a las 17:15:49
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hevimotormysql`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

CREATE TABLE `detallefactura` (
  `id_Detalle` int(11) NOT NULL,
  `id_factura` int(5) NOT NULL,
  `id_Repuesto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detallefactura`
--

INSERT INTO `detallefactura` (`id_Detalle`, `id_factura`, `id_Repuesto`, `cantidad`) VALUES
(9, 3, 130, 2),
(10, 4, 130, 2),
(11, 5, 130, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `Num_Factura` int(5) NOT NULL,
  `Total` int(15) NOT NULL,
  `Metodo_Pago` varchar(20) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`Num_Factura`, `Total`, `Metodo_Pago`, `Fecha`, `Hora`) VALUES
(3, 3000000, 'Daviplata', '2024-03-15', '11:04:00'),
(4, 3000000, 'Tarjeta', '2024-03-15', '11:08:00'),
(5, 7500000, 'Cheque', '2024-03-15', '11:13:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparaciones`
--

CREATE TABLE `reparaciones` (
  `ID_Reparacion` int(11) NOT NULL,
  `Cedula_Cliente` int(12) NOT NULL,
  `Placa_Vehiculo` varchar(7) NOT NULL,
  `Fecha_Reparacion` date NOT NULL,
  `Descripcion` text NOT NULL,
  `Costo_Total` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reparaciones`
--

INSERT INTO `reparaciones` (`ID_Reparacion`, `Cedula_Cliente`, `Placa_Vehiculo`, `Fecha_Reparacion`, `Descripcion`, `Costo_Total`) VALUES
(234, 1034776545, 'UOU-123', '2023-11-16', 'Cambio de aceite W45', '200000'),
(555, 1034779256, 'FFJ-001', '2023-11-30', 'Cambio de Frenos BORCH', '2300000'),
(569, 1034779256, 'FFJ-001', '2024-03-13', 'ngbvhv', '1900000'),
(671, 1025778298, 'HJK-129', '2023-11-08', 'Cambio de discos de freno 5p a 6p', '2500000'),
(780, 1025778298, 'HJK-129', '2023-11-24', 'Lavado externo e interno', '100000'),
(784, 1025778298, 'HJK-129', '2023-09-01', 'Instalacion rines DELUXE blancos', '7000000'),
(789, 1034779256, 'CCA-910', '2023-08-02', 'Instalacion turbo 6psi', '970000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestos`
--

CREATE TABLE `repuestos` (
  `Id_Repuesto` int(11) NOT NULL,
  `Proveedor` int(11) NOT NULL,
  `Nombre_Repuesto` varchar(50) NOT NULL,
  `Marca` varchar(50) NOT NULL,
  `Modelo` varchar(50) NOT NULL,
  `Categoria` varchar(50) NOT NULL,
  `Numero_Parte_Fabricante` varchar(50) NOT NULL,
  `Precio` int(12) NOT NULL,
  `Cantidad_Stock` int(5) NOT NULL,
  `Fecha_Ingreso` date NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `repuestos`
--

INSERT INTO `repuestos` (`Id_Repuesto`, `Proveedor`, `Nombre_Repuesto`, `Marca`, `Modelo`, `Categoria`, `Numero_Parte_Fabricante`, `Precio`, `Cantidad_Stock`, `Fecha_Ingreso`, `Descripcion`) VALUES
(120, 1193778259, 'Turbo 6 psi', 'FENNEC', 'TRB124-CC019', 'Deportivo', 'TRB124-CC019-123', 670000, 10, '2023-08-06', 'Turbo de 6 psi para autos deportivos'),
(130, 1193778259, 'Rin 19p Negro ', 'DELUXE', 'RNA124-HOA1', 'Coupe', 'RNA124-HOA1-001', 1500000, 15, '2023-09-04', 'Rin de 19 pulgadas blanco ideal para autos coupe'),
(140, 1193778259, 'Llanta 20p', 'BRIDGESTONE', '20p-119r-00', 'Deportivo', '20p-119r-00-123', 110000, 10, '2023-09-06', 'Llanta de 20 pulgadas ideal para autos deportivos'),
(150, 1193778259, 'Bujia Set x4', 'Bosch', 'FR87', 'Sedan 1.5L - 2.0L', 'FR87-123', 114000, 10, '2023-05-04', 'Bujias ideales para sedanes Chevrolet, Renault y Fiat');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ID_Rol` int(11) NOT NULL,
  `Nombre_Rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_Rol`, `Nombre_Rol`) VALUES
(1, 'Cliente'),
(2, 'Proveedor'),
(3, 'Empleado'),
(4, 'Administrador'),
(5, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL,
  `nombre_servicio` varchar(40) NOT NULL,
  `costo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `nombre_servicio`, `costo`) VALUES
(1, 'Cambio de aceite y filtro', 100000),
(2, 'Reemplazo de pastillas de freno', 300000),
(3, 'Cambio de discos de freno', 100000),
(4, 'Alineación y balanceo', 50000),
(5, 'Cambio de correa de distribución', 30000),
(6, 'Reparación de motor', 500000),
(7, 'Reparación de transmisión', 500000),
(8, 'Cambio de bujías y cables', 100000),
(9, 'Diagnóstico de fallas eléctricas', 50000),
(10, 'Reparación de sistema de escape', 200000),
(11, 'Recarga de aire acondicionado', 60000),
(12, 'Reemplazo de amortiguadores', 200000),
(13, 'Cambio de batería', 50000),
(14, 'Reparación de sistema de dirección', 200000),
(15, 'Cambio de neumáticos', 100000),
(16, 'Limpieza de inyectores', 100000),
(17, 'Reparación de sistema de suspensión', 700000),
(18, 'Reemplazo de filtro de aire', 50000),
(19, 'Cambio de líquido de frenos', 50000),
(20, 'Cambio de líquido de dirección asistida', 50000),
(21, 'Cambio de rines', 400000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Nombres` varchar(40) NOT NULL,
  `Apellidos` varchar(40) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Cedula` int(12) NOT NULL,
  `Ciudad` varchar(30) NOT NULL,
  `Direccion` text NOT NULL,
  `Celular` varchar(40) NOT NULL,
  `Nickname` varchar(40) DEFAULT NULL,
  `Contraseña` varchar(25) DEFAULT NULL,
  `Rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Nombres`, `Apellidos`, `Correo`, `Cedula`, `Ciudad`, `Direccion`, `Celular`, `Nickname`, `Contraseña`, `Rol`) VALUES
('Luis Hernando', 'Prieto Olivares', 'lhpo12@gmail.com', 522120347, 'Bogota', 'Cra 57a #67m - 32', '3145678901', 'LHPO', 'hola1234', 3),
('Mario David', 'Lara Perez', 'mariolara@gmail.com', 522127772, 'Bogota', 'Cra 91c #12m-11', '3145600012', 'LARA', 'efecty12', 3),
('Jonathan David', 'Huertas Chaparro', 'dvdhuertas@gmail.com', 1025778298, 'Medellin', 'Cra 68 #14b-56', '3257841102', NULL, NULL, 1),
('Luisa Fernanda', 'Guarnizo Cabezas', 'lufer@gmail.com', 1034775141, 'Cali', 'Cl 5 #34c-12', '3004800369', 'lufer1', 'hola123', 3),
('Hector Uriel', 'Henao Contreras', 'hector@gmail.com', 1034776545, 'Cali', 'Av 72 #66d-10', '3146789090', '', '', 1),
('Rodrigo', 'Lara', 'lara@gmail.com', 1034778951, 'Medellin', 'Cra 45b #34-27', '3224236290', '', '', 1),
('Alvaro Hernan', 'Goez Sanchez', 'goezalvaro237@gmail.com', 1034779256, 'Bogota', 'Cra 58b #89c-01', '3224567894', NULL, NULL, 1),
('Jhonatan David', 'Pedraza Carrasco', 'jhpedraza@gmail.com', 1193778259, 'Bogota', 'Av 26 #18f-91', '3224560041', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `Placa` varchar(7) NOT NULL,
  `Cedula_Usu` int(12) NOT NULL,
  `Marca` varchar(25) NOT NULL,
  `Modelo` varchar(50) NOT NULL,
  `Año` varchar(5) NOT NULL,
  `Color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`Placa`, `Cedula_Usu`, `Marca`, `Modelo`, `Año`, `Color`) VALUES
('CCA-910', 1034779256, 'Porsche', '992 GTS', '2021', 'Negro'),
('FFJ-001', 1034779256, 'Porsche', 'Panamera GTS Hybrid', '2023', 'Gris'),
('HJK-129', 1025778298, 'Mazda', 'RX-7', '2002', 'Negro'),
('JDP-007', 1034776545, 'Nissan', 'skyline r34', '2002', 'Azul'),
('JXQ-011', 1025778298, 'Nissan', '370z NISMO', '2022', 'Amarillo'),
('UOU-123', 1034776545, 'Cupra', 'Formentor', '2023', 'Verde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `Id_Venta` int(11) NOT NULL,
  `desc_Venta` text NOT NULL,
  `fecha` date NOT NULL,
  `Numero_Factura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`Id_Venta`, `desc_Venta`, `fecha`, `Numero_Factura`) VALUES
(8, 'Holanda', '2024-03-15', 3),
(9, 'Pruebas', '2024-03-15', 4),
(10, 'Holandalabanda', '2024-03-15', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD PRIMARY KEY (`id_Detalle`),
  ADD KEY `id_Factura` (`id_factura`),
  ADD KEY `id_repuesto` (`id_Repuesto`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`Num_Factura`);

--
-- Indices de la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  ADD PRIMARY KEY (`ID_Reparacion`),
  ADD KEY `Cedula_Cliente` (`Cedula_Cliente`),
  ADD KEY `Placa_Vehiculo` (`Placa_Vehiculo`);

--
-- Indices de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD PRIMARY KEY (`Id_Repuesto`),
  ADD KEY `Proveedor` (`Proveedor`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID_Rol`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Cedula`),
  ADD KEY `Rol` (`Rol`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`Placa`),
  ADD KEY `Cedula_Usu` (`Cedula_Usu`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`Id_Venta`),
  ADD KEY `Num_Factura` (`Numero_Factura`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  MODIFY `id_Detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `Num_Factura` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `Id_Venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD CONSTRAINT `id_factura` FOREIGN KEY (`id_factura`) REFERENCES `facturas` (`Num_Factura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_repuesto` FOREIGN KEY (`id_Repuesto`) REFERENCES `repuestos` (`Id_Repuesto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  ADD CONSTRAINT `Cedula_Cliente` FOREIGN KEY (`Cedula_Cliente`) REFERENCES `usuarios` (`Cedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Placa_Vehiculo` FOREIGN KEY (`Placa_Vehiculo`) REFERENCES `vehiculos` (`Placa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD CONSTRAINT `Proveedor` FOREIGN KEY (`Proveedor`) REFERENCES `usuarios` (`Cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `Rol` FOREIGN KEY (`Rol`) REFERENCES `rol` (`ID_Rol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `Cedula_Usu` FOREIGN KEY (`Cedula_Usu`) REFERENCES `usuarios` (`Cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `Num_Factura` FOREIGN KEY (`Numero_Factura`) REFERENCES `facturas` (`Num_Factura`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
