
<?php 
// Incluimos el archivo que contiene la conexión a la base de datos.
include 'conexion.php'; 
?>

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

  if (isset($_POST['insertar'])) { 
    // Recuperamos los valores enviados desde el formulario.
    $titulo = $_POST['titulo'];
    $anio = $_POST["anio"];
    $anio = $anio === "" ? "NULL" : intval($anio);
    $sello  = $_POST['sello'];
    $pais   = $_POST['pais'];

    // Consulta SQL que inserta los datos en la tabla 'albumes'.
    // Se insertan los valores recogidos del formulario.
    $stmt = $sqli->prepare("INSERT INTO albumes (titulo, anio, sello, pais) 
            VALUES ('$titulo', $anio, '$sello', '$pais')");
    $stmt->bind_param("siss", $titulo, $anio, $sello, $pais);
    $stmt->execute();

    // Mensaje de confirmación al usuario.
    echo "<p style='color:green;'>Álbum insertado correctamente </p>";
}

?>
</body>
</html>
