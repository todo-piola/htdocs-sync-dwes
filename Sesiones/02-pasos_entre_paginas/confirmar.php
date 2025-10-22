<?php
session_start();

$pelicula = $_SESSION['pelicula'] ?? 'Desconocida';
$butaca = $_POST['butaca'] ?? 'No seleccionada';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><strong>Película:</strong> <?= htmlspecialchars($pelicula) ?></p>
    <p><strong>Butaca:</strong> <?= htmlspecialchars($butaca) ?></p>

    <a href="peliculas.php">Volver al inicio</a>
</body>
</html>