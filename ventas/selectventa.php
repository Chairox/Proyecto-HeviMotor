<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Ventas</title>
</head>
<style>
    body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
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
<body>
    <div style="text-align: center;">
        <h2>Consulta de Ventas</h2>
    </div>
    <?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hevimotormysql";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para obtener los datos de ventas
    $sql_ventas = "SELECT v.id_Venta, v.Numero_Factura, v.desc_Venta, f.IVA, f.Subtotal, f.Total, f.Metodo_Pago, f.Fecha AS Fecha_Factura, f.Hora, d.id_Repuesto, d.cantidad
                    FROM Ventas v
                    INNER JOIN Facturas f ON v.Numero_Factura = f.Num_Factura
                    INNER JOIN DetalleFactura d ON v.Numero_Factura = d.id_Factura";
    $result_ventas = $conn->query($sql_ventas);

    if ($result_ventas->num_rows > 0) {
        // Mostrar los datos de ventas en una tabla HTML
        echo "<table>";
        echo "<tr><th>ID Venta</th><th>Número de Factura</th><th>Descripción</th><th>IVA</th><th>Subtotal</th><th>Total</th><th>Método de Pago</th><th>Fecha de Factura</th><th>Hora</th><th>ID Repuesto</th><th>Cantidad</th></tr>";
        while ($row_venta = $result_ventas->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row_venta["id_Venta"] . "</td>";
            echo "<td>" . $row_venta["Numero_Factura"] . "</td>";
            echo "<td>" . $row_venta["desc_Venta"] . "</td>";
            echo "<td>" . $row_venta["IVA"] . "</td>";
            echo "<td>" . $row_venta["Subtotal"] . "</td>";
            echo "<td>" . $row_venta["Total"] . "</td>";
            echo "<td>" . $row_venta["Metodo_Pago"] . "</td>";
            echo "<td>" . $row_venta["Fecha_Factura"] . "</td>";
            echo "<td>" . $row_venta["Hora"] . "</td>";
            echo "<td>" . $row_venta["id_Repuesto"] . "</td>";
            echo "<td>" . $row_venta["cantidad"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron ventas.";
    }

    $conn->close();
    ?>
    <div class="container2">
        <button onclick="location.href='pantallaprincipal.php'">Volver</button>
    </div>
</body>
</html>
