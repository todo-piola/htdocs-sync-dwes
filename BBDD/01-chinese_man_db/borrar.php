<?php 
  // Incluimos el archivo que contiene la conexión a la base de datos.
  include 'conexion.php'; 
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Borrar álbum</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<h2> Borrar álbum</h2>

<form action="" method="post">
  ID a borrar:<br><input type="number" name="id" required><br><br>
  <button type="submit" name="borrar">Borrar</button>
</form>

<p><a href="index.php"> << Volver</a></p>

<?php

try {

  // Comprobamos si el formulario ha enviado el botón 'borrar'.
  // Esto significa que el usuario ha solicitado eliminar un registro
  if (isset($_POST['borrar'])) {

    // Recuperamos el ID del registro que se desea borrar.
    // Este valor proviene del formulario (input name="id").
    $id = $_POST['id'];

    // Consulta SQL que elimina el álbum cuyo ID coincide con el indicado.
    // DELETE elimina la fila completa de la tabla .
    $sql = "DELETE FROM albumes WHERE id=$id";

    // Ejecutamos la consulta en la base de datos.
    $conexion->exec($sql);

    // Mensaje informativo para el usuario.
    echo "<p style='color:green;'>Álbum borrado </p>";
  }

} catch (PDOException $e) {

  // Si ocurre un error con la base de datos (por ejemplo, conexión fallida),
  // el script se detiene y muestra el mensaje del error.
  die("Conexión fallida: " . $e->getMessage());
}

?>

</body>
</html>
