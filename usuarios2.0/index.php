<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hevimotormysql";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $cedula = $_POST["cedula"];
    $ciudad = $_POST["ciudad"];
    $direccion = $_POST["direccion"];
    $celular = $_POST["celular"];
    $rol = $_POST["rol"];
    $nickname = $_POST["nickname"];
    $contraseña = $_POST["contraseña"];
    

    // Consulta para insertar los datos en la tabla
    $sql = "INSERT INTO usuarios (Nombres, Apellidos, Correo, Cedula, Ciudad, Direccion, Celular, Nickname, Contraseña, Rol) VALUES ('$nombres', '$apellidos', '$correo', '$cedula', '$ciudad', '$direccion', '$celular', '$nickname', '$contraseña', '$rol')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="success-message">Usuario registrado con éxito.</div>';
    } else {
        echo "Error al registrar el usuario: " . $sql . "<br>" . $conn->error;
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
    <link rel="stylesheet" href="style.css">
    <link rel="website icon" type="png" href="../img/22.png">
</head>
<body>
    <form method="post">
    <H2>Hevi Motor</H2>
    <p>Inicia tu registro de usuario</p>

    <div class="input-wrapper">
        <input type="text" name="nombres" placeholder="Nombres">
        <img class="input.icon" src="images/" alt="">

    </div>

    <div class="input-wrapper">
        <input type="text" name="apellidos" placeholder="Apellidos">
        <img class="input.icon" src="images/" alt="">

    </div>

    <div class="input-wrapper">
        <input type="email" name="correo" placeholder="Correo">
        <img class="input.icon" src="images/" alt="">

    </div>
    <div class="input-wrapper">
        <input type="text" name="cedula" placeholder="Cedula">
        <img class="input.icon" src="images/" alt="">

    </div>
    <div class="input-wrapper">
        <input type="text" name="ciudad" placeholder="Ciudad">
        <img class="input.icon" src="images/name.svg" alt="">

    </div>
    <div class="input-wrapper">
        <input type="text" name="direccion" placeholder="Direccion">
        <img class="input.icon" src="images/name.svg" alt="">

    </div>
    <div class="input-wrapper">
        <input type="text" name="celular" placeholder="Celular">
        <img class="input.icon" src="images/name.svg" alt="">

    </div>
    <?php 
    $query = "SELECT ID_Rol, Nombre_Rol FROM rol";
    $result = $conn->query($query);
    ?>
    <div class="input-wrapper">
    <select name="rol" required class="input" onchange="desbloquear(this)">
        <option value="" disabled selected>Seleccionar Rol...</option>
        <?php
        // Mostrar las opciones para placa_vehiculo
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["ID_Rol"] . '">' .$row["ID_Rol"]." - ". $row["Nombre_Rol"]. '</option>';
        }
        ?>
    </select>
    </div>
    <div class="input-wrapper">
        <input type="text" name="nickname" id="nickname" placeholder="Nickname" disabled>
        <img class="input.icon" src="images/" alt="">
    </div>
    <div class="input-wrapper">
        <input type="text" name="contraseña" id="contraseña" placeholder="Contraseña" disabled>
        <img class="input.icon" src="images/" alt="">
    </div>
        
        <input class="btn" type="submit" name="register" value="Enviar">

</form>   
<div class="container2">
        <button onclick="location.href='selectusuarios.php'">Volver</button>
    </div>
    <script>
function desbloquear(elemento) {
    var valorSeleccionado = elemento.value;

    
    if (valorSeleccionado == "3" || valorSeleccionado == "4") {
        document.getElementById("nickname").disabled = false;
        document.getElementById("contraseña").disabled = false;
    } else {
        document.getElementById("nickname").disabled = true;
        document.getElementById("contraseña").disabled = true;
    }
}
</script>
</body>
</html>