<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Lateral con PHP</title>
    <style>
        .container {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
        }

        .sidebar {
            background-color: rgb(40,55,71);
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

        .content {
            flex: 1;
            padding: 20px;
            margin-left: 250px;
            background-color: #f4f4f4;
        }

        .content h2 {
            color: #333;
        }

        .content p {
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>HeviMotor</h2>
            <ul>
                <?php
                $menuItems = array(
                    "Inicio" => "pantallaprincipal.php",
                    "Usuarios" => "selectusuarios.php",
                    "Reparaciones" => "selectreparacion.php",
                    "Vehículos" => "selectvehicle.php",
                    "Ventas" => "selectventa.php",
                    "Repuestos" => "selectrepuestos.php"
                );

                foreach ($menuItems as $itemName => $itemLink) {
                    echo "<li><a href=\"$itemLink\">$itemName</a></li>";
                }
                ?>
            </ul>
        </div>

        </div>
    </div>
</body>
</html>