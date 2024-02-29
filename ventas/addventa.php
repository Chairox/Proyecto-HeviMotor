<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Venta</title>
</head>
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
<body>
    <div style="text-align: center;">
        <h2>Formulario de Venta</h2>
    </div>
    <?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hevimotormysql";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    // Consulta para obtener los repuestos disponibles
    $sql_repuestos = "SELECT Id_Repuesto, Nombre_Repuesto, Precio, Cantidad_Stock FROM Repuestos";
    $result_repuestos = $conn->query($sql_repuestos);
    ?>  
        <form action="procesar_venta.php" method="post">
            <label for="id_venta">ID Venta:</label>
            <input type="text" name="id_venta" required>

            <label for="repuesto">Seleccione el Repuesto:</label>
            <select name="repuesto" id="repuesto" onchange="actualizarPrecio()">
                <option value="">Seleccione...</option>
                <?php
                if ($result_repuestos->num_rows > 0) {
                    while ($row_repuesto = $result_repuestos->fetch_assoc()) {
                        echo "<option value='" . $row_repuesto["Id_Repuesto"] . "' data-precio='" . $row_repuesto["Precio"] . "' data-stock='" . $row_repuesto["Cantidad_Stock"] . "'>" . $row_repuesto["Nombre_Repuesto"] . " ------------ Stock Disponible: " . $row_repuesto["Cantidad_Stock"] . "</option>";
                    }
                }
                ?>
            </select>

            <label for="precio">Precio Unitario:</label>
            <input type="text" id="precio" name="precio" readonly>

            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" min="1" onchange="actualizarPrecio()">

            <label for="total">Total:</label>
            <input type="text" id="total" name="total" readonly>

            <label for="descripcion">Descripción de venta:</label>
            <textarea name="descripcion" required></textarea>

            <label for="metodo_pago">Metodo de Pago</label>
            <select name="metodo_pago" id="metodo_pago" required>
                <option value="">Seleccione el método de pago</option>
                <option value="Efectivo">Efectivo</option>
                <option value="Nequi">Nequi</option>
                <option value="Daviplata">Daviplata</option>
                <option value="Tarjeta">Tarjeta</option>
                <option value="Cheque">Cheque</option>
            </select>

            <label for="fecha">Fecha de venta:</label>
            <input type="date" id="fecha" name="fecha">

            <label for="hora">Hora de venta:</label>
            <input type="time" id="hora" name="hora">



            <script>
                // Obtener la fecha actual y establecerla en el campo de fecha
                var fechaActual = new Date().toISOString().slice(0, 10);
                document.getElementById("fecha").value = fechaActual;

                // Obtener la hora actual y establecerla en el campo de hora
                var horaActual = new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
                document.getElementById("hora").value = horaActual;
            </script>

            <input type="submit" value="Confirmar Venta">
        </form>


    <script>
        function actualizarPrecio() {
            var precioUnitario = document.getElementById("repuesto").options[document.getElementById("repuesto").selectedIndex].getAttribute("data-precio");
            var cantidad = document.getElementById("cantidad").value;
            var total = precioUnitario * cantidad;
            document.getElementById("precio").value = precioUnitario;
            document.getElementById("total").value = total;
        }
    </script>
    <div class="container2">
        <button onclick="location.href='ventasmenu.php'">Volver</button>
    </div>
</body>
</html>

