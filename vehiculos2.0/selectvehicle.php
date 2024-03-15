<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Vehículos</title>
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
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #333;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #333;
            color: #fff;
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
    <h2>Vehículos Registrados</h2>

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
    $sql_select = "SELECT v.placa, v.cedula_usu, u.nombres, u.apellidos, v.marca, v.modelo, v.año, v.color FROM vehiculos v, usuarios u where v.cedula_usu = u.cedula";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Placa</th><th>Cliente</th><th>Nombres</th><th>Apellidos</th><th>Marca</th><th>Modelo</th><th>Año</th><th>Color</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["placa"] . "</td>";
            echo "<td>" . $row["cedula_usu"] . "</td>";
            echo "<td>" . $row["nombres"] . "</td>";
            echo "<td>" . $row["apellidos"] . "</td>";
            echo "<td>" . $row["marca"] . "</td>";
            echo "<td>" . $row["modelo"] . "</td>";
            echo "<td>" . $row["año"] . "</td>";
            echo "<td>" . $row["color"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No hay vehículos registrados.</p>";
    }

    $conn->close();
    ?>
    </div>

<div class="container3">
    <button onclick="location.href='addvehicle.php'">Agregar</button>
</div>
<div class="container4">
    <button onclick="location.href='deletevehicle.php'">Eliminar</button>
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

</body>
</html>
