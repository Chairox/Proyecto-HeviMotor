<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Vehículos</title>
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


<h2>Registrar Vehículo</h2>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hevimotormysql";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
    // Obtener valores de la tabla vehiculos para el menú desplegable
    $sql_cliente = "SELECT nombres, apellidos, cedula FROM usuarios where rol = 1";
    $result_cliente = $conn->query($sql_cliente);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $placa = $_POST["placa"];
    $id_cliente = $_POST["cedula_usu"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $año = $_POST["año"];
    $color = $_POST["color"];
    

    $sql = "INSERT INTO vehiculos (placa, cedula_usu, marca, modelo, año, color) 
            VALUES ('$placa', '$id_cliente', '$marca', '$modelo', '$año', '$color')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="success-message">Vehículo registrado con éxito.</div>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <label for="placa">Placa:</label>
    <input type="text" name="placa" required>

    <label for="cedula_usu">Cliente:</label>
        <select name="cedula_usu" required>
        <option value="" disabled selected>Seleccionar...</option>
        <?php
        // Mostrar las opciones para cedula_cliente
        while ($row_cliente = $result_cliente->fetch_assoc()) {
            echo "<option value='" . $row_cliente['cedula'] . "'>" . $row_cliente['cedula'] . " - " . $row_cliente['nombres'] . " - " . $row_cliente['apellidos'] ."</option>";
        }
        ?>
        </select>

    <label for="marca">Marca:</label>
    <input type="text" name="marca" required>

    <label for="modelo">Modelo:</label>
    <input type="text" name="modelo" required>

    <label for="año">Año:</label>
    <input type="text" name="año" required>

    <label for="color">Color:</label>
    <input type="text" name="color" required>



    <input type="submit" value="Registrar Vehículo">
</form>
<div class="container2">
        <button onclick="location.href='selectvehicle.php'">Volver</button>
    </div>

        </div>

</body>
</html>