<?php
// Incluimos el archivo que contiene la conexión a la base de datos.
include 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar producto</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h2> Actualizar producto</h2>
    <form action="" method="post">
        ID (a actualizar):<br><input type="number" name="id" required><br><br>
        Nuevo nombre:<br><input type="text" name="nombre"><br><br>
        Nuevo precio:<br><input type="number" step="0.01" name="precio"><br><br>
        Nueva cantidad:<br><input type="number" name="cantidad"><br><br>
        <button type="submit" name="actualizar">Actualizar</button>
    </form>
    <p><a href="index.php"> << Volver</a></p>

    <?php
    try {
        // Recojo los datos del formulario al pulsar el botón 'actualizar'
        if (isset($_POST['actualizar'])) {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];

            // Actualizo la tabla usando prepared statement para evitar errores de sintaxis e inyección SQL
            $sql = "UPDATE producto SET 
                    nombre = :nombre, 
                    precio = :precio, 
                    cantidad = :cantidad 
                    WHERE id = :id";

            $stmt = $conexion->prepare($sql);
            $stmt->execute([
                ':nombre' => $nombre,
                ':precio' => $precio,
                ':cantidad' => $cantidad,
                ':id' => $id
            ]);

            echo "<p style='color:green;'>Producto actualizado </p>";
        }
    } catch (PDOException $e) {
        die("Conexión fallida: " . $e->getMessage());
    }
    ?>

</body>
</html>
