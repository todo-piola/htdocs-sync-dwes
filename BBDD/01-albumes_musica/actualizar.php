<?php include 'conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar álbum</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<h2>✏️ Actualizar álbum</h2>

<form action="" method="post">
  ID (a actualizar):<br><input type="number" name="id" required><br><br>
  Nuevo título:<br><input type="text" name="titulo"><br><br>
  Nuevo año:<br><input type="number" name="anio"><br><br>
  Nuevo sello:<br><input type="text" name="sello"><br><br>
  Nuevo país:<br><input type="text" name="pais"><br><br>
  <button type="submit" name="actualizar">Actualizar</button>
</form>

<p><a href="index.php">⬅ Volver</a></p>

<?php
if (isset($_POST['actualizar'])) {
    $id     = $_POST['id'];
    $titulo = $_POST['titulo'];
    $anio   = $_POST['anio'];
    $sello  = $_POST['sello'];
    $pais   = $_POST['pais'];

    $sql = "UPDATE albumes SET
              titulo='$titulo',
              anio=$anio,
              sello='$sello',
              pais='$pais'
            WHERE id=$id";
    $conexion->exec($sql);
    echo "<p style='color:green;'>Álbum actualizado ✅</p>";
}
?>
</body>
</html>
