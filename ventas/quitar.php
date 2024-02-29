<?php
function quitarProductoDelCarrito($idProducto)
{
    $bd = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    $idSesion = session_id();
    $sentencia = $bd->prepare("DELETE FROM carrito_venta WHERE id_sesion = ? AND id_repuesto = ?");
    return $sentencia->execute([$idSesion, $idProducto]);
}