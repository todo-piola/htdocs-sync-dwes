<?php include 'conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consultar álbumes</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<h2>🔍 Lista de álbumes</h2>

<p><a href="index.php">⬅ Volver</a></p>

<?php
$stmt = $conexion->query("SELECT * FROM albumes ORDER BY id DESC");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($rows) {
    echo "<table border='1' cellpadding='6' style='margin:auto;'>
            <tr><th>ID</th><th>Título</th><th>Año</th><th>Sello</th><th>País</th></tr>";
    foreach ($rows as $r) {
        echo "<tr>
                <td>{$r['id']}</td>
                <td>{$r['titulo']}</td>
                <td>{$r['anio']}</td>
                <td>{$r['sello']}</td>
                <td>{$r['pais']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No hay álbumes registrados.</p>";
}
?>
</body>
</html>
