<?php
function eliminarProducto($id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM repuestos WHERE id = ?");
    return $sentencia->execute([$id]);
}

function guardarProducto($id, $proveedor, $nombre_repuesto, $marca_repuesto, $modelo_repuesto, 
$categoria_repuesto, $parte_fabricante, $precio_repuesto, $stock, $fecha_ingreso, $descripcion_repuesto)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO repuestos (id_repuesto, proveedor, nombre_repuesto, marca, modelo, categoria, 
    numero_parte_fabricante, precio, cantidad_stock, fecha_ingreso, descripcion) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    return $sentencia->execute([$id, $proveedor, $nombre_repuesto, $marca_repuesto, $modelo_repuesto, 
    $categoria_repuesto, $parte_fabricante, $precio_repuesto, $stock, $fecha_ingreso, $descripcion_repuesto]);
}