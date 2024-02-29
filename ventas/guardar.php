<?php
if (!isset($_POST["id_repuesto"]) || !isset($_POST["nombre_repuesto"]) || !isset($_POST["marca_repuesto"]) || !isset($_POST["modelo_repuesto"]) 
|| !isset($_POST["categoria_repuesto"]) || !isset($_POST["parte_fabricante"]) || !isset($_POST["precio_repuesto"]) || !isset($_POST["stock"]) 
|| !isset($_POST["fecha_ingreso"]) || !isset($_POST["descripcion"])) {
    exit("Faltan datos");
}
include_once "funciones.php";
guardarProducto($_POST["id_repuesto"], $_POST["nombre_repuesto"], $_POST["marca_repuesto"], $_POST["modelo_repuesto"], $_POST["categoria_repuesto"], 
$_POST["parte_fabricante"], $_POST["precio_repuesto"], $_POST["stock"], $_POST["fecha_ingreso"], $_POST["descripcion"], );
header("Location: productos.php");