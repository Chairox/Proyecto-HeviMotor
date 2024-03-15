<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Repuestos</title>
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
$sql_repuesto = "SELECT r.id_repuesto, p.cedula, p.nombres, p.apellidos, r.nombre_repuesto, r.marca, r.modelo from repuestos r, usuarios p where r.proveedor = p.cedula";
$result_repuesto= $conn->query($sql_repuesto);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_to_delete = $_POST["id_to_delete"];

    $sql_delete = "DELETE FROM repuestos WHERE id_repuesto = '$id_to_delete'";

    if ($conn->query($sql_delete) === TRUE) {
        echo '<div class="success-message">Repuesto eliminado con éxito</div>';
    } else {
        echo "Error: " . $sql_delete . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<h2>Eliminar Repuestos</h2>
    <label for="id_to_delete">Repuesto a Eliminar:</label>
    <select name="id_to_delete" required>
        <option value="" disabled selected>Seleccionar...</option>
        <?php
        while ($row_repuesto = $result_repuesto->fetch_assoc()) {
            echo "<option value='" . $row_repuesto['id_repuesto'] . "'>",$row_repuesto['id_repuesto'] . " -Proveedor: " . $row_repuesto['cedula']. $row_repuesto['nombres'] . " " . $row_repuesto['apellidos'] . ", Repuesto: " . $row_repuesto['nombre_repuesto']." ". $row_repuesto['marca']. " ". $row_repuesto['modelo'] ."</option>";
        }
        ?>
    </select>
    <input type="submit" value="Eliminar Repuesto">
</form>
<div class="container2">
        <button onclick="location.href='selectrepuestos.php'">Volver</button>
    </div>

        </div>
</body>
</html>