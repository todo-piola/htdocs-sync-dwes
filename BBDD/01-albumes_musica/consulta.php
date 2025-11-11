<?php include 'conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Consultar álbumes</title>
</head>
<body>
  <h2>🔍 Consulta de álbumes de Chinese Man</h2>

  <?php
  $resultado = $conn->query("SELECT * FROM albumes ORDER BY anio ASC");

  if ($resultado->num_rows > 0) {
      echo "<table border='1' cellpadding='6'>";
      echo "<tr><th>ID</th><th>Título</th><th>Año</th><th>Sello</th><th>País</th></tr>";
      while ($fila = $resultado->fetch_assoc()) {
          echo "<tr>";
          echo "<td>{$fila['id']}</td>";
          echo "<td>{$fila['titulo']}</td>";
          echo "<td>{$fila['anio']}</td>";
          echo "<td>{$fila['sello']}</td>";
          echo "<td>{$fila['pais']}</td>";
          echo "</tr>";
      }
      echo "</table>";
  } else {
      echo "<p>No hay álbumes registrados todavía.</p>";
  }
  ?>

  <p><a href="index.php">⬅ Volver al menú</a></p>
</body>
</html>
