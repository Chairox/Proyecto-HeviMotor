<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Reparaciones</title>
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
</head>
<body>
<center>
<h2 style="color: white" >Registrar Reparación</h2></center>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hevimotormysql";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
    $sql_clientes = "SELECT cedula, nombres, apellidos FROM usuarios where rol = 1";
    $result_clientes = $conn->query($sql_clientes);

    // Obtener valores de la tabla vehiculos para el menú desplegable
    $sql_vehiculos = "SELECT placa, modelo, año FROM vehiculos";
    $result_vehiculos = $conn->query($sql_vehiculos);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id_reparacion"];
    $id_cliente = $_POST["cedula_cliente"];
    $id_vehiculo = $_POST["placa_vehiculo"];
    $fecha_reparacion = $_POST["fecha_reparacion"];
    $descripcion = $_POST["descripcion"];
    $costo_total = $_POST["costo_total"];

 
    $sql = "INSERT INTO reparaciones (id_reparacion, cedula_cliente, placa_vehiculo, fecha_reparacion, descripcion, costo_total) VALUES ('$id', '$id_cliente', '$id_vehiculo', '$fecha_reparacion', '$descripcion', '$costo_total')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="success-message">Reparación registrada con éxito.</div>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="id">ID Reparacion:</label>
    <input type="text" name="id_reparacion" required>

    <label for="id_cliente">Cliente:</label>
        <select name="cedula_cliente" required>
        <option value="" disabled selected>Seleccionar...</option>
            <?php
            // Mostrar las opciones para cedula_cliente
            while ($row_cliente = $result_clientes->fetch_assoc()) {
                echo "<option value='" . $row_cliente['cedula'] . "'>" . $row_cliente['cedula'] . " - " . $row_cliente['nombres'] . " - " . $row_cliente['apellidos'] ."</option>";
            }
            ?>
        </select>

    <label for="id_vehiculo">Vehículo:</label>
        <select name="placa_vehiculo" required>
        <option value="" disabled selected>Seleccionar...</option>
            <?php
            // Mostrar las opciones para placa_vehiculo
            while ($row_vehiculo = $result_vehiculos->fetch_assoc()) {
                echo "<option value='" . $row_vehiculo['placa'] . "'>" . $row_vehiculo['placa'] . " - " . $row_vehiculo['modelo'] ." - " . $row_vehiculo['año'] . "</option>";
            }
            ?>
        </select>

    <label for="fecha_reparacion">Fecha de Reparación:</label>
    <input type="date" name="fecha_reparacion" required>

    <label for="descripcion">Descripción de la Reparación:</label>
    <textarea name="descripcion" required></textarea>

    <label for="costo_total">Costo Total:</label>
    <input type="text" name="costo_total" required>

    <input type="submit" value="Registrar Reparación">
</form>
<div class="container2">
        <button onclick="location.href='selectreparacion.php'">Volver</button>
    </div>

</body>
</html>