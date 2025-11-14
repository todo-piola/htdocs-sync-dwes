<?php 
  // Incluimos el archivo que contiene la conexión a la base de datos.
  include 'conexion.php'; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar álbum</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<h2> Actualizar álbum</h2>

<form action="" method="post">
  ID (a actualizar):<br><input type="number" name="id" required><br><br>
  Nuevo título:<br><input type="text" name="titulo"><br><br>
  Nuevo año:<br><input type="number" name="anio"><br><br>
  Nuevo sello:<br><input type="text" name="sello"><br><br>
  Nuevo país:<br><input type="text" name="pais"><br><br>
  <button type="submit" name="actualizar">Actualizar</button>
</form>

<p><a href="index.php"> << Volver</a></p>

<?php
try {

  // Comprobamos si el formulario ha enviado el botón 'actualizar'.
  // Esto indica que el usuario quiere modificar una fila existente.
  if (isset($_POST['actualizar'])) {

    // Recuperamos los datos enviados desde el formulario.
    // Cada uno corresponde a un campo de la tabla que se va a actualizar.
    $id     = $_POST['id'];
    $titulo = $_POST['titulo'];
    $anio   = $_POST['anio'];
    $sello  = $_POST['sello'];
    $pais   = $_POST['pais'];

    // Consulta SQL para actualizar los datos de la tabla
    // Se establecen los nuevos valores en cada columna.
    $sql = "UPDATE albumes SET
              titulo='$titulo',
              anio=$anio,
              sello='$sello',
              pais='$pais'
            WHERE id=$id";

    // Ejecutamos la consulta en la base de datos.
    $conexion->exec($sql);

    // Mensaje de confirmación mostrado al usuario.
    echo "<p style='color:green;'>Álbum actualizado </p>";
  }

} catch (PDOException $e) {

  // Si ocurre un error (de conexión, SQL o similar),
  // el script se detiene y mostramos el mensaje del error.
  die("Conexión fallida: " . $e->getMessage());
}

?>

</body>
</html>
