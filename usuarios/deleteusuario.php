<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Eliminación de Usuarios</title>
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

<h2>Eliminar Usuario</h2>

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
$sql_usuarios = "SELECT u.nombres, u.apellidos, u.cedula, r.nombre_rol from usuarios u, rol r where u.rol = r.id_rol";
$result_usuarios = $conn->query($sql_usuarios);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario_a_eliminar = $_POST["id_usuario_a_eliminar"];

    // Eliminar la reparación de la base de datos
    $sql = "DELETE FROM usuarios WHERE cedula = '$id_usuario_a_eliminar'";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="success-message">Usuario eliminado con éxito.</div>';
    } else {
        echo "Error al eliminar el usuario: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="id_usuario_a_eliminar">Cedula de usuario a Eliminar:</label>
    <select name="id_usuario_a_eliminar" required>
        <option value="" disabled selected>Seleccionar...</option>
        <?php
        while ($row_usuario = $result_usuarios->fetch_assoc()) {
            echo "<option value='" . $row_usuario['cedula'] . "'>", "Cedula: " . $row_usuario['cedula']. " - ", "Nombre: " . $row_usuario['nombres'] . " " . $row_usuario['apellidos']." - ", "Rol: ".$row_usuario['nombre_rol']. "</option>";
        }
        ?>
    </select>

    <input type="submit" value="Eliminar Usuario">
</form>
<div class="container2">
        <button onclick="location.href='selectusuarios.php'">Volver</button>
    </div>

        </div>
</body>
</html>