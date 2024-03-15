<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Venta</title>
    <link rel="website icon" type="png" href="../img/22.png">
</head>
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
    <div style="text-align: center;">
       
    </div>
    <?php
// Verificar si se han enviado datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario de venta
    $id_repuesto = $_POST["repuesto"];
    $cantidad = $_POST["cantidad"];
    $total = $_POST["total"];
    $metodopago = $_POST["metodo_pago"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $descripcionventa = $_POST["descripcion"];

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hevimotormysql";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para agregar la factura a la base de datos
    $sql_agregar_factura = "INSERT INTO Facturas (Total, Metodo_Pago, Fecha, Hora) VALUES ('$total', '$metodopago', '$fecha', '$hora')";

    // Ejecutar consulta para agregar la factura
    if ($conn->query($sql_agregar_factura) === TRUE) {
        // Obtener el ID de la factura generada
        $id_factura = $conn->insert_id;

        // Consulta para agregar la venta a la base de datos
        $sql_agregar_venta = "INSERT INTO Ventas (Numero_Factura, desc_Venta, fecha) VALUES ('$id_factura', '$descripcionventa', '$fecha')";

// Ejecutar consulta para agregar la venta
        if ($conn->query($sql_agregar_venta) === TRUE) {
            // Obtener el ID de la venta generada
            $id_venta = $conn->insert_id;

            // Consulta para agregar el detalle de la factura a la base de datos
            $sql_agregar_detalle = "INSERT INTO DetalleFactura (id_Factura, id_Repuesto, cantidad) VALUES ('$id_factura', '$id_repuesto', '$cantidad')";

            // Ejecutar consulta para agregar el detalle de la factura
            if ($conn->query($sql_agregar_detalle) === TRUE) {
                // Actualizar la cantidad disponible del repuesto vendido
                $sql_actualizar_stock = "UPDATE Repuestos SET Cantidad_Stock = Cantidad_Stock - '$cantidad' WHERE Id_Repuesto = '$id_repuesto'";

                // Ejecutar consulta para actualizar el stock del repuesto
                if ($conn->query($sql_actualizar_stock) === TRUE) {
                    echo '<div class="success-message">Repuesto registrado con éxito.</div>';
                } else {
                    echo "Error al actualizar el stock del repuesto: " . $conn->error;
                }
            } else {
                echo "Error al agregar el detalle de la factura: " . $conn->error;
            }
        } else {
            echo "Error al agregar la venta: " . $conn->error;
        }
    } else {
        echo "Error al agregar la factura: " . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
}
?>
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h2>Formulario de Venta</h2>

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


        <div class="container2">
    <button onclick="location.href='addventa.php'">Volver</button>
</div>
<script>

var fechaActual = new Date().toISOString().slice(0, 10);
            document.getElementById("fecha").value = fechaActual;

            // Obtener la hora actual y establecerla en el campo de hora

            function generarSelects() {
            var cantidadRepuestos = document.getElementById("cantidad_repuestos").value;
            var selectsHTML = "";

            for (var i = 1; i <= cantidadRepuestos; i++) {
                selectsHTML += `
                    <label for="repuesto${i}">Seleccione el Repuesto ${i}:</label>
                    <select name="repuesto[]" id="repuesto${i}" onchange="actualizarPrecio()">
                        <option value="">Seleccione...</option>
                        <?php
                        if ($result_repuestos->num_rows > 0) {
                            while ($row_repuesto = $result_repuestos->fetch_assoc()) {
                                echo "<option value='" . $row_repuesto["Id_Repuesto"] . "' data-precio='" . $row_repuesto["Precio"] . "' data-stock='" . $row_repuesto["Cantidad_Stock"] . "'>" . $row_repuesto["Nombre_Repuesto"] . " ------------ Stock Disponible: " . $row_repuesto["Cantidad_Stock"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                    <br>`;
            }

            document.getElementById("selects_repuestos").innerHTML = selectsHTML;
        }

        function actualizarPrecio() {
            var precioUnitario = document.getElementById("repuesto").options[document.getElementById("repuesto").selectedIndex].getAttribute("data-precio");
            var cantidad = document.getElementById("cantidad").value;
            var total = precioUnitario * cantidad;
            document.getElementById("precio").value = precioUnitario;
            document.getElementById("total").value = total;
        }
        </script>
    <div class="container2">
        <button onclick="location.href='../pantallas/pantallaprincipal.php'">Volver</button>
    </div>
</body>
</html>

