<?php include 'conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar álbum</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<h2>➕ Insertar nuevo álbum</h2>

<form action="" method="post">
  Título:<br><input type="text" name="titulo" required><br><br>
  Año:<br><input type="number" name="anio" required><br><br>
  Sello:<br><input type="text" name="sello"><br><br>
  País:<br><input type="text" name="pais" value="Francia"><br><br>
  <button type="submit" name="insertar">Insertar</button>
</form>

<p><a href="index.php">⬅ Volver</a></p>

<?php
if (isset($_POST['insertar'])) {
    $titulo = $_POST['titulo'];
    $anio   = $_POST['anio'];
    $sello  = $_POST['sello'];
    $pais   = $_POST['pais'];

    $sql = "INSERT INTO albumes (titulo, anio, sello, pais) 
            VALUES ('$titulo', $anio, '$sello', '$pais')";
    $conexion->exec($sql);
    echo "<p style='color:green;'>Álbum insertado correctamente ✅</p>";
}
?>
</body>
</html>
