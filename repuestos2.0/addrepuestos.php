<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Registro Repuestos</title>
</head>
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
    </style>
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
    $sql_proveedores = "SELECT cedula, nombres, apellidos FROM usuarios where rol = 2";
    $result_proveedores = $conn->query($sql_proveedores);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id_repuesto"];
    $proveedor = $_POST["proveedor"];
    $nombre_repuesto = $_POST["nombre_repuesto"];
    $marca_repuesto = $_POST["marca_repuesto"];
    $modelo_repuesto = $_POST["modelo_repuesto"];
    $categoria_repuesto = $_POST["categoria_repuesto"];
    $parte_fabricante = $_POST["parte_fabricante"];
    $precio_repuesto = $_POST["precio_repuesto"];
    $stock = $_POST["stock"];
    $fecha_ingreso = $_POST["fecha_ingreso"];
    $descripcion_repuesto = $_POST["descripcion"];

 
    $sql = "INSERT INTO repuestos (id_repuesto, proveedor, nombre_repuesto, marca, modelo, categoria, numero_parte_fabricante, precio, cantidad_stock, fecha_ingreso, descripcion) VALUES ('$id', '$proveedor', '$nombre_repuesto', '$marca_repuesto', '$modelo_repuesto', '$categoria_repuesto', '$parte_fabricante', '$precio_repuesto', '$stock', '$fecha_ingreso', '$descripcion_repuesto')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="success-message">Repuesto registrado con éxito.</div>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div style="text-align: center;">
        <h2>Repuestos</h2>
    </div>
    <label for="id_repuesto">ID Repuesto:</label>
    <input type="text" name="id_repuesto" required>

    <label for="proveedor">Proveedor:</label>
        <select name="proveedor" required>
            <option value="" disabled selected>Seleccionar...</option>
                <?php
                // Mostrar las opciones para cedula_cliente
                while ($row_proveedor = $result_proveedores->fetch_assoc()) {
                    echo "<option value='" . $row_proveedor['cedula'] . "'>" . $row_proveedor['cedula'] . " - " . $row_proveedor['nombres'] . " - " . $row_proveedor['apellidos'] ."</option>";
                }
                ?>
            </select>

    <label for="nombre_repuesto">Nombre Repuesto:</label>
    <input type="text" name="nombre_repuesto" required>

    <label for="marca_repuesto">Marca del repuesto:</label>
    <input type="text" name="marca_repuesto" required>

    <label for="modelo_repuesto">Modelo del repuesto:</label>
    <input type="text" name="modelo_repuesto" required>

    <label for="categoria_repuesto">Categoría del repuesto:</label>
    <input type="text" name="categoria_repuesto" required>

    <label for="parte_fabricante">Parte Fabricante:</label>
    <input type="text" name="parte_fabricante" required>

    <label for="precio_repuesto">Precio del repuesto:</label>
    <input type="number" step=".01" min="0.00" max="999999999
    " name="precio_repuesto" required>

    <label for="stock">Stock del repuesto:</label>
    <input type="number" step=".01" min="0.00" max="999999999
    " name="stock" required>

    <label for="fecha_ingreso">Fecha de Ingreso:</label>
    <input type="date" name="fecha_ingreso" required>

    <label for="descripcion">Descripción del repuesto:</label>
    <textarea name="descripcion" required></textarea>

    <input type="submit" value="Registrar Repuesto">
</form>
<div class="container2">
        <button onclick="location.href='selectrepuestos.php'">Volver</button>
    </div>
    
</body>
</html>
