<?php
include_once "funciones.php";
if (!isset($_POST["id_repuesto"])) {
    exit("No hay id_repuesto");
}
agregarProductoAlCarrito($_POST["id_repuesto"]);
header("Location: tienda.php");