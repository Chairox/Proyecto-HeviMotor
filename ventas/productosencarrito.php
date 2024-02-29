<?php
function obtenerProductosEnCarrito()
{
    $bd = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    $sentencia = $bd->prepare("SELECT repuestos.id_repuesto, repuestos.nombre_repuesto, repuestos.descripcion, repuestos.precio
     FROM repuestos
     INNER JOIN carrito_venta
     ON repuestos.id_repuesto = carrito_venta.id_repuesto
     WHERE carrito_venta.id_sesion = ?");
    $idSesion = session_id();
    $sentencia->execute([$idSesion]);
    return $sentencia->fetchAll();
}