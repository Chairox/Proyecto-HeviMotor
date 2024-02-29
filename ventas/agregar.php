<?php
function agregarProductoAlCarrito($id)
{
    // Ligar el id del producto con el usuario a través de la sesión
    $bd = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    $idSesion = session_id();
    $sentencia = $bd->prepare("INSERT INTO carrito_venta(id_sesion, id_repuesto) VALUES (?, ?)");
    return $sentencia->execute([$idSesion, $id]);
}