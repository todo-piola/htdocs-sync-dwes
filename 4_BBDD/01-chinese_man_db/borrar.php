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


  if (isset($_POST['borrar'])) {
    $id = $_POST['id']; // Recuperamos el ID del registro que se desea borrar, registro que proviene del formulario.

    // Consulta SQL que elimina el álbum cuyo ID coincide con el indicado.
    $stmt = $sqli->prepare("DELETE FROM albumes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Mensaje informativo para el usuario.
    echo "<p style='color:green;'>Álbum borrado </p>";
  }

?>

</body>
</html>
