<?php include 'conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Borrar álbum</title>
</head>
<body>
  <h2>❌ Borrar un álbum</h2>

  <form action="" method="post">
    <label>ID del álbum a borrar:</label><br>
    <input type="number" name="id" required><br><br>
    <button type="submit" name="borrar">Borrar</button>
  </form>

  <p><a href="index.php">⬅ Volver al menú</a></p>

  <?php
  if (isset($_POST['borrar'])) {
      $id = $_POST['id'];
      $sql = "DELETE FROM albumes WHERE id=$id";

      if ($conn->query($sql)) {
          echo "<p style='color:green;'>Álbum borrado correctamente ✅</p>";
      } else {
          echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
      }
  }
  ?>
</body>
</html>
