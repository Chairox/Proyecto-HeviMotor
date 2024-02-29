<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo con Menú Lateral</title>
    <!-- Estilos CSS -->
    <style>
        /* Estilos del menú lateral */
        .sidebar {
            background-color: rgb(40, 55, 71);
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

        /* Estilos del contenido del módulo */
        body {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
            background color: white;
            color: black;
            background-repeat: no-repeat;
            min-height: 100vh;
            margin-left: 250px; /* Ajuste para dejar espacio para el menú lateral */
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
            color: black;
        }

        .header {
            background-color: rgb(40, 55, 71);
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 40px;
        }

        p {
            background-color: rgb(40, 55, 71);
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 25px;
        }

        .menu {
            background-color: rgb(40, 55, 71);
            padding: 15px;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            color: white;
        }

        .menu ul {
            list-style-type: none;
            padding: 0;
        }

        .menu ul li {
            display: inline;
            margin-right: 10px;
        }

        .menu ul li a {
            text-decoration: none;
            color: white;
        }

        .menu ul li a:hover {
            color: rgb(0, 183, 255);
        }

        .tarjeta {
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 20px;
            background-color: #82e9ec;
        }

        .puesto-imagen {
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-left: 20px; /* Ajuste para dejar espacio para el menú lateral */
        }

        .opcion {
            text-align: center;
            text-decoration: none;
            color: black;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 150px;
        }

        .opcion img {
            width: 100px;
            height: 100px;
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
    <!-- Menú lateral -->
    <div class="sidebar">
        <h2>Menú</h2>
        <ul>
            <?php
            $menuItems = array(
                "Inicio" => "pantallaprincipal.php",
                "Usuarios" => "../usuarios/selectusuarios.php",
                "Reparaciones" => "../reparaciones/selectreparacion.php",
                "Vehículos" => "../vehiculos/selectvehicle.php",
                "Ventas" => "../ventas/selectventas.php",
                "Repuestos" => "../repuestos/selectrepuestos.php"
            );

            foreach ($menuItems as $itemName => $itemLink) {
                echo "<li><a href=\"$itemLink\">$itemName</a></li>";
            }
            ?>
        </ul>
    </div>

    <!-- Contenido del módulo -->
    <div class="container">
        <div class="header">
            <h1>HeviMotor</h1>
        </div>
        <br>
        <?php

?>
        
        <div class="content">
            <a href="../usuarios/selectusuarios.php" class="opcion">
                <img src="../img/persona.png" alt="Usuarios">
                <p>Modulo de Usuarios</p>
            </a>

            <a href="../vehiculos/selectvehicle.php" class="opcion">
                <img src="../img/carro.png" alt="Vehículos">
                <p>Modulo de Vehículos</p>
            </a>

            <a href="../repuestos/selectrepuestos.php" class="opcion">
                <img src="../img/motor.png" alt="Repuestos">
                <p>Modulo de Repuestos</p>
            </a>

            <a href="../reparaciones/selectreparacion.php" class="opcion">
                <img src="../img/service.png" alt="Reparaciones">
                <p>Modulo de Reparaciones</p>
            </a>

            <a href="../ventas/selectventas.php" class="opcion">
                <img src="../img/tool.png" alt="Ventas">
                <p>Modulo de Ventas</p>
            </a>
            <div class="container2">
                <button onclick="location.href='login.php'">Cerrar Sesión</button>
            </div>
        </div>
    </div>
</body>
</html>