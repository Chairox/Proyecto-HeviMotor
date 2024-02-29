<?php include_once "encabezado.php" ?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
<?php include_once "pie.php" ?>