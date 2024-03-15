<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Reparaciones</title>
    <link rel="website icon" type="png" href="../img/22.png">
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

        .container {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>HeviMotor</h2>
            <ul>
                <?php
                $menuItems = array(
                    "Inicio" => "../pantallas/pantallaprincipal.php",
                    "Usuarios" => "../usuarios/selectusuarios.php",
                    "Reparaciones" => "selectreparacion.php",
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

        <div class="content">
            <h2>Consulta de Reparaciones</h2>

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "hevimotormysql";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Realizar la consulta para obtener todas las reparaciones
            $sql = "SELECT r.id_reparacion, r.cedula_cliente, u.nombres, u.apellidos, u.celular, r.placa_vehiculo, v.marca, v.modelo, r.fecha_reparacion, r.descripcion, r.costo_total FROM reparaciones r, vehiculos v, usuarios u WHERE r.cedula_cliente = u.cedula and r.placa_vehiculo = v.placa";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>ID Reparacion</th><th>Cedula Cliente</th><th>Nombres</th><th>Apellidos</th><th>Celular</th><th>Placa Vehiculo</th><th>Marca</th><th>Modelo</th><th>Fecha Reparacion</th><th>Descripcion</th><th>Costo Total</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id_reparacion"] . "</td>";
                    echo "<td>" . $row["cedula_cliente"] . "</td>";
                    echo "<td>" . $row["nombres"] . "</td>";
                    echo "<td>" . $row["apellidos"] . "</td>";
                    echo "<td>" . $row["celular"] . "</td>";
                    echo "<td>" . $row["placa_vehiculo"] . "</td>";
                    echo "<td>" . $row["marca"] . "</td>";
                    echo "<td>" . $row["modelo"] . "</td>";
                    echo "<td>" . $row["fecha_reparacion"] . "</td>";
                    echo "<td>" . $row["descripcion"] . "</td>";
                    echo "<td>" . $row["costo_total"] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No hay reparaciones registradas.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>
    <div class="container3">
        <button onclick="location.href='addreparacion.php'">Agregar</button>
    </div>
    <div class="container4">
        <button onclick="location.href='deletereparacion.php'">Eliminar</button>
    </div>
</body>
</html>
