<?php
// Verificar si se han enviado datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario de venta
    $id_venta = $_POST["id_venta"];
    $cantidad_repuestos = $_POST["cantidad_repuestos"];
    $descripcionventa = $_POST["descripcion"];
    $metodopago = $_POST["metodo_pago"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];

    // Obtener los repuestos seleccionados y sus cantidades
    $repuestos = $_POST["repuesto"];
    $cantidades = $_POST["cantidad"];

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hevimotormysql";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Insertar la venta en la tabla de ventas
    $sql_ventas = "INSERT INTO ventas (id_Venta, total, metodo_pago, fecha, hora, descripcion) VALUES ('$id_venta', $total, '$metodopago', '$fecha', '$hora', '$descripcionventa')";
    if ($conn->query($sql_ventas) === TRUE) {
        $total_venta = 0;

        // Iterar sobre los repuestos seleccionados
        foreach ($repuestos as $key => $id_repuesto) {
            $cantidad = $cantidades[$key];

            // Consultar el precio del repuesto
            $sql_precio = "SELECT Precio FROM Repuestos WHERE Id_Repuesto = $id_repuesto";
            $result_precio = $conn->query($sql_precio);
            if ($result_precio->num_rows > 0) {
                $row_precio = $result_precio->fetch_assoc();
                $precio_unitario = $row_precio["Precio"];

                // Calcular el subtotal para este repuesto
                $subtotal = $precio_unitario * $cantidad;
                $total_venta += $subtotal;

                // Insertar el detalle de la venta en la tabla detalleventa
                $sql_detalle = "INSERT INTO detalleventa (id_repuesto, id_venta, cantidad, subtotal) VALUES ($id_repuesto, '$id_venta', $cantidad, $subtotal)";
                $conn->query($sql_detalle);
            }
        }

        // Actualizar el total en la tabla de ventas
        $sql_actualizar_total = "UPDATE ventas SET total = $total_venta WHERE id_Venta = '$id_venta'";
        $conn->query($sql_actualizar_total);

        echo "<p class='success-message'>Venta procesada correctamente. Total: $total_venta</p>";
    } else {
        echo "<p class='error-message'>Error al procesar la venta: " . $conn->error . "</p>";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Redireccionar si se intenta acceder al archivo directamente
    header("Location: addventa2.php");
    exit();
}
?>
<div class="container2">
    <button onclick="location.href='addventa2.php'">Volver</button>
</div>
