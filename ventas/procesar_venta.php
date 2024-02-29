<style>
        body {
            font-family: Arial, sans-serif;
            background-color: gray;
            margin: 0;
            padding: 0;
        }

        form {
            width: 50%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgb(0, 183, 255);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, textarea, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            cursor: pointer;
        }
        .success-message {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: black;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            z-index: 9999; /* Asegura que esté por encima de otros elementos */
        }
        .container2 {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background-color: black;
            padding: 10px 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        button {
            color: white;
            background-color: transparent;
            border: none;
            outline: none;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
<?php
// Verificar si se han enviado datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario de venta
    $id_venta = $_POST["id_venta"];
    $id_repuesto = $_POST["repuesto"];
    $cantidad = $_POST["cantidad"];
    $total = $_POST["total"];
    $metodopago = $_POST["metodo_pago"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $descripcionventa = $_POST["descripcion"];


    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hevimotormysql";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    
    // Consulta para actualizar el stock del repuesto
    $sql_update_stock = "UPDATE Repuestos SET Cantidad_Stock = Cantidad_Stock - $cantidad WHERE id_repuesto = $id_repuesto";
    $sql_ventas = "INSERT INTO ventas (id_Venta, total, metodo_pago, fecha, hora, descripcion) values ('$id_venta', '$total','$metodopago','$fecha','$hora','$descripcionventa')";
    $result_ventas = $conn->query($sql_ventas);
    $sql_detalle = "INSERT INTO detallefactura (id_repuesto, id_venta, cantidad) values ('$id_repuesto', '$id_venta','$cantidad')";
    $result_detalle = $conn->query($sql_detalle);

    if ($conn->query($sql_update_stock) === TRUE) {
        echo "<p class='success-message'>Venta procesada correctamente. Stock actualizado.</p>";
    } else {
        echo "<p class='error-message'>Error al procesar la venta: " . $conn->error . "</p>";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Redireccionar si se intenta acceder al archivo directamente
    header("Location: addventa.php");
    exit();
}
?>
<div class="container2">
        <button onclick="location.href='addventa.php'">Volver</button>
    </div>
