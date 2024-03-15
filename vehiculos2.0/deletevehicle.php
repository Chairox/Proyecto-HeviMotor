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
            background-color: rgb(40, 55, 71);
            margin: 0;
            padding: 0;
        }

        form {
            width: 50%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
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
    </style>
</head>
<body>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hevimotormysql";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$sql_vehicle = "SELECT v.placa, v.marca, v.modelo, v.año, v.color, u.nombres, u.apellidos from vehiculos v, usuarios u where v.cedula_usu= u.cedula";
$result_vehicle = $conn->query($sql_vehicle);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_to_delete = $_POST["id_to_delete"];

    $sql_delete = "DELETE FROM vehiculos WHERE placa = '$id_to_delete'";

    if ($conn->query($sql_delete) === TRUE) {
        echo'<div class="success-message">vehiculo eliminado con éxito.</div>';;
    } else {
        echo "Error: " . $sql_delete . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<h2>Eliminar Vehículo</h2>
    <label for="id_to_delete">Vehiculo a Eliminar:</label>
    <select name="id_to_delete" required>
        <option value="" disabled selected>Seleccionar...</option>
        <?php
        while ($row_vehiculo = $result_vehicle->fetch_assoc()) {
            echo "<option value='" . $row_vehiculo['placa'] . "'>" . "Placa: ". $row_vehiculo['placa'] . " - Cliente: " . $row_vehiculo['nombres'] . " " . $row_vehiculo['apellidos'] . ", Auto: " . $row_vehiculo['marca']. " ". $row_vehiculo['modelo'] ." ".$row_vehiculo['año']." " .$row_vehiculo['color'] . "</option>";
        }
        ?>
    </select>
    <input type="submit" value="Eliminar Vehículo">
</form>
<div class="container2">
        <button onclick="location.href='selectvehicle.php'">Volver</button>
    </div>

        </div>
</body>
</html>