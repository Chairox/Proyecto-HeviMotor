<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Repuestos</title>
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
            width: 80%;
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
        .content {
            flex: 1;
            padding: 20px;
            margin-left: 250px;
            background-color: #f4f4f4;
        }

        .content h2 {
            color: #333;
        }

        .content p {
            color: #555;
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
    <h2>Repuestos Registrados</h2>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hevimotormysql";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Fetch all vehicles
    $sql_select = "SELECT r.id_repuesto, p.cedula, p.nombres, p.apellidos, r.nombre_repuesto, r.marca, r.modelo, r.categoria, r.numero_parte_fabricante, r.precio, r.cantidad_stock, r.fecha_ingreso, r.descripcion from repuestos r, usuarios p where r.proveedor = p.cedula";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Cedula Proveedor</th><th>Nombres</th><th>Apellidos</th><th>Marca</th><th>Modelo</th><th>Categoria</th><th>Numero Fabricante</th><th>Precio</th><th>Stock Disponible</th><th>Fecha Ingreso</th><th>Descripcion</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id_repuesto"] . "</td>";
            echo "<td>" . $row["cedula"] . "</td>";
            echo "<td>" . $row["nombres"] . "</td>";
            echo "<td>" . $row["apellidos"] . "</td>";
            echo "<td>" . $row["marca"] . "</td>";
            echo "<td>" . $row["modelo"] . "</td>";
            echo "<td>" . $row["categoria"] . "</td>";
            echo "<td>" . $row["numero_parte_fabricante"] . "</td>";
            echo "<td>" . $row["precio"] . "</td>";
            echo "<td>" . $row["cantidad_stock"] . "</td>";
            echo "<td>" . $row["fecha_ingreso"] . "</td>";
            echo "<td>" . $row["descripcion"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No hay repuestos registrados.</p>";
    }

    $conn->close();
    ?>
    <div class="container3">
        <button onclick="location.href='addrepuestos.php'">Agregar</button>
    </div>
    <div class="container4">
        <button onclick="location.href='deleterepuestos.php'">Eliminar</button>
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
