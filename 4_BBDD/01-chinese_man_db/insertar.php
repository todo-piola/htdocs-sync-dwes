<!-- Incluimos el archivo con la conexión a la base de datos -->
<?php include 'conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar álbum</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<h2>+ Insertar nuevo álbum</h2>


<form action="" method="post">
  Título:<br><input type="text" name="titulo" required><br><br>
  Año:<br><input type="number" name="anio" ><br><br>
  Sello:<br><input type="text" name="sello"><br><br>
  País:<br><input type="text" name="pais"><br><br>
  <button type="submit" name="insertar">Insertar</button>
</form>

<p><a href="index.php"> << Volver</a></p>

<?php

try {
  // Comprobamos si el usuario ha pulsado el botón "Insertar".
  // Si existe $_POST['insertar'], significa que el formulario se ha enviado.
  if (isset($_POST['insertar'])) {

    // Recuperamos los valores enviados desde el formulario.
    $titulo = $_POST['titulo'];
    $anio = $_POST["anio"];
    $anio = $anio === "" ? "NULL" : intval($anio);
    $sello  = $_POST['sello'];
    $pais   = $_POST['pais'];

    // Consulta SQL que inserta los datos en la tabla 'albumes'.
    // Se insertan los valores recogidos del formulario.
    $sql = "INSERT INTO albumes (titulo, anio, sello, pais) 
            VALUES ('$titulo', $anio, '$sello', '$pais')";

    // Ejecutamos la sentencia INSERT en la base de datos.
    $conexion->exec($sql);

    // Mensaje de confirmación al usuario.
    echo "<p style='color:green;'>Álbum insertado correctamente </p>";
  }

} catch (PDOException $e) {
  // Si ocurre algún error (de conexión o SQL), se detiene el script y se muestra el mensaje del error.
  die("Conexión fallida: " . $e->getMessage());
}

?>
</body>
</html>
