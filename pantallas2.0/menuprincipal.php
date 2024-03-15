<link rel="website icon" type="png" href="../img/22.png">
<style>
    body{
        background: linear-gradient(
                180deg,
                rgb(37, 34, 63, 1) 0%,
                rgb(255, 255, 255, 1) 50%,
                rgb(37, 34, 63, 1) 100%
                );
            color: whitesmoke;
            background-repeat: no-repeat;
            min-height: 100vh;
    }
    .error-message {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: black;
    color: red;
    padding: 20px;
    border-radius: 5px;
    z-index: 9999;
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
<?php
session_start(); // Iniciar la sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "hevimotormysql";

    // Establecer la conexión con la base de datos
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($conn->connect_error) {
        die("Error en la conexión: " . $conn->connect_error);
    }

    // Obtener el usuario y la contraseña del formulario
    $nombre = $_POST["txtusuario"];
    $pass = $_POST["txtpassword"];

    // Consulta para verificar las credenciales del usuario
    $query = "SELECT Nickname FROM usuarios WHERE Nickname = '$nombre' AND Contraseña = '$pass'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Las credenciales son correctas, obtén el nombre del usuario
        $row = $result->fetch_assoc();
        $nombreUsuario = $row['Nickname'];

        // Guardar el nombre del usuario en una variable de sesión
        $_SESSION['nombreUsuario'] = $nombreUsuario;
        global $nombreUsuario;

        // Redireccionar a la página principal después del inicio de sesión exitoso
        header("Location: pantallaprincipal.php");

        exit();
    } else {
        echo '<div class="error-message">Usuario o contraseña incorrectos</div>';
    }
}
?>
<div class="container2">
        <button onclick="location.href='login.php'">Volver a intentar</button>
    </div>

