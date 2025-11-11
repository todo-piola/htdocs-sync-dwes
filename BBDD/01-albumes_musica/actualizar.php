<?php include 'conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Actualizar álbum</title>
</head>
<body>
  <h2>✏️ Actualizar álbum existente</h2>

  <form action="" method="post">
    <label>ID del álbum a actualizar:</label><br>
    <input type="number" name="id" required><br><br>

    <label>Nuevo título:</label><br>
    <input type="text" name="titulo"><br><br>

    <label>Nuevo año:</label><br>
    <input type="number" name="anio"><br><br>

    <label>Nuevo sello:</label><br>
    <input type="text" name="sello"><br><br>

    <button type="submit" name="actualizar">Actualizar</button>
  </form>

  <p><a href="index.php">⬅ Volver al menú</a></p>

  <?php
  if (isset($_POST['actualizar'])) {
      $id = $_POST['id'];
      $titulo = $_POST['titulo'];
      $anio = $_POST['anio'];
      $sello = $_POST['sello'];

      $sql = "UPDATE albumes SET 
              titulo='$titulo', anio='$anio', sello='$sello'
              WHERE id=$id";

      if ($conn->query($sql)) {
          echo "<p style='color:green;'>Álbum actualizado correctamente ✅</p>";
      } else {
          echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
      }
  }
  ?>
</body>
</html>