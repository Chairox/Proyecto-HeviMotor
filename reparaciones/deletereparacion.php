<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Eliminación de Reparaciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        form {
            width: 50%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

<h2>Eliminar Reparación</h2>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hevimotormysql";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos para mostrar en el menú desplegable
$sql_reparaciones = "SELECT r.ID_Reparacion, r.cedula_cliente, r.placa_vehiculo, r.descripcion, u.nombres, u.apellidos FROM reparaciones r INNER JOIN usuarios u ON r.cedula_cliente = u.cedula";
$result_reparaciones = $conn->query($sql_reparaciones);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_reparacion_a_eliminar = $_POST["id_reparacion_a_eliminar"];

    // Eliminar la reparación de la base de datos
    $sql = "DELETE FROM reparaciones WHERE ID_Reparacion = '$id_reparacion_a_eliminar'";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="success-message">Reparación eliminada con éxito.</div>';
    } else {
        echo "Error al eliminar la reparación: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="id_reparacion_a_eliminar">ID Reparación a Eliminar:</label>
    <select name="id_reparacion_a_eliminar" required>
        <option value="" disabled selected>Seleccionar...</option>
        <?php
        while ($row_reparacion = $result_reparaciones->fetch_assoc()) {
            echo "<option value='" . $row_reparacion['ID_Reparacion'] . "'>" . $row_reparacion['ID_Reparacion'] . " - Cliente: " . $row_reparacion['nombres'] . " " . $row_reparacion['apellidos'] . ", Placa: " . $row_reparacion['placa_vehiculo'] . ", Descripción: " . $row_reparacion['descripcion'] . "</option>";
        }
        ?>
    </select>

    <input type="submit" value="Eliminar Reparación">
</form>
<div class="container2">
        <button onclick="location.href='selectreparacion.php'">Volver</button>
    </div>

        </div>
</body>
</html>