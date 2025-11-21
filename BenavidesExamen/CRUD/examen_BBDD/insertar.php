<!-- Incluimos el archivo con la conexión a la base de datos -->
<?php include 'conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar producto</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<h2>+ Insertar nuevo producto</h2>


<form action="" method="post">
  Nombre:<br><input type="text" name="nombre" required><br><br>
  Precio:<br><input type="number" name="precio" ><br><br>
  Cantidad:<br><input type="text" name="cantidad"><br><br>
  <button type="submit" name="insertar">Insertar</button>
</form>

<p><a href="index.php"> << Volver</a></p>

<?php

try {
  // Comprobamos si el usuario ha pulsado el botón "Insertar".
  // Si existe $_POST['insertar'], significa que el formulario se ha enviado.
  if (isset($_POST['insertar'])) {

    // Recuperamos los valores enviados desde el formulario.
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    // Consulta SQL que inserta los datos en la tabla 'producto'.
    // Se insertan los valores recogidos del formulario.
    $sql = "INSERT INTO producto (nombre, precio, cantidad) 
            VALUES ('$nombre', '$precio', '$cantidad')";

    // Ejecutamos la sentencia INSERT en la base de datos.
    $conexion->exec($sql);

    // Mensaje de confirmación al usuario.
    echo "<p style='color:green;'>Producto insertado correctamente </p>";
  }

} catch (PDOException $e) {
  // Si ocurre algún error (de conexión o SQL), se detiene el script y se muestra el mensaje del error.
  die("Conexión fallida: " . $e->getMessage());
}

?>
</body>
</html>
