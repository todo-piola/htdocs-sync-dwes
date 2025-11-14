<?php include 'conexion.php'; ?>

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

<p><a href="index.php">⬅ Volver</a></p>

<?php

try{
  if (isset($_POST['borrar'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM albumes WHERE id=$id";
    $conexion->exec($sql);
    echo "<p style='color:green;'>Álbum borrado ✅</p>";
  }
} catch (PDOException $e) {
  die("Conexión fallida: " . $e->getMessage());
}

?>
</body>
</html>
