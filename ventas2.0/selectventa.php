<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Ventas</title>
    <link rel="website icon" type="png" href="../img/22.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 65%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #333;
        }
        th {
            background-color: #333;
            color: #fff;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        .container3 {
            position: fixed;
            bottom: 20px;
            right: 250px;
            background-color: black;
            padding: 10px 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .container4 {
            position: fixed;
            bottom: 20px;
            right: 20px;
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

        .sidebar {
            background-color: rgb(40,55,71);
            color: #fff;
            width: 250px;
            padding: 20px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
        }

        .sidebar h2 {
            margin-bottom: 20px;
            color: #fff;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease; 
        }

        .sidebar ul li a:hover {
            background-color: whitesmoke;
            color: #000; 
        }
    </style>
</head>
<body>

<div class="content">
    <h2>Ventas Registradas</h2>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hevimotormysql";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Fetch all sales
    $sql_ventas = "SELECT v.id_Venta, v.Numero_Factura, v.desc_Venta, f.Total, f.Metodo_Pago, f.Fecha, f.hora, d.id_Repuesto, r.Nombre_Repuesto, d.cantidad
                  FROM ventas v
                  INNER JOIN facturas f ON v.Numero_Factura = f.Num_Factura
                  INNER JOIN detallefactura d ON v.Numero_Factura = d.Id_Factura
                  INNER JOIN repuestos r ON d.id_repuesto = r.Id_Repuesto";

    $result_ventas = $conn->query($sql_ventas);

    if ($result_ventas->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID Venta</th><th>Número de Factura</th><th>Descripción</th><th>Total</th><th>Método de Pago</th><th>Fecha</th><th>Hora</th><th>ID Repuesto</th><th>Nombre Repuesto</th><th>Cantidad</th></tr>";

        while ($row_venta = $result_ventas->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row_venta["id_Venta"] . "</td>";
            echo "<td>" . $row_venta["Numero_Factura"] . "</td>";
            echo "<td>" . $row_venta["desc_Venta"] . "</td>";
            echo "<td>" . $row_venta["Total"] . "</td>";
            echo "<td>" . $row_venta["Metodo_Pago"] . "</td>";
            echo "<td>" . $row_venta["Fecha"] . "</td>";
            echo "<td>" . $row_venta["hora"] . "</td>";
            echo "<td>" . $row_venta["id_Repuesto"] . "</td>";
            echo "<td>" . $row_venta["Nombre_Repuesto"] . "</td>";
            echo "<td>" . $row_venta["cantidad"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No hay ventas registradas.</p>";
    }

    $conn->close();
    ?>

    <div class="container3">
        <button onclick="location.href='addventa.php'">Agregar Venta</button>
    </div>

    <div class="sidebar">
        <h2>HeviMotor</h2>
        <ul>
            <?php
            $menuItems = array(
                "Inicio" => "../pantallas/pantallaprincipal.php",
                "Usuarios" => "../usuarios/selectusuarios.php",
                "Reparaciones" => "../reparaciones/selectreparacion.php",
                "Vehículos" => "../vehiculos/selectvehicle.php",
                "Ventas" => "../ventas/selectventa.php",
                "Repuestos" => "../repuestos/selectrepuestos.php"
            );

            foreach ($menuItems as $itemName => $itemLink) {
                echo "<li><a href=\"$itemLink\">$itemName</a></li>";
            }
            ?>
        </ul>
    </div>
</div>

</body>
</html>
