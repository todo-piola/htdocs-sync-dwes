<?php
session_start();

$pelicula = $_SESSION['pelicula'] ?? 'Desconocida';
$butaca = $_POST['butaca'] ?? 'No seleccionada';

// Recuperamos las butacas ocupadas actuales
if (!isset($_SESSION['butacas_ocupadas'])) {
    $_SESSION['butacas_ocupadas'] = [];
}

// Inicializamos el array de esa película si no existe
if (!isset($_SESSION['butacas_ocupadas'][$pelicula])) {
    $_SESSION['butacas_ocupadas'][$pelicula] = [];
}

// Comprobamos si la butaca ya está ocupada (por seguridad)
if (in_array($butaca, $_SESSION['butacas_ocupadas'][$pelicula])) {
    $mensaje = "Butaca ya está ocupada.";
} else {
    // Marcamos la butaca como ocupada
    $_SESSION['butacas_ocupadas'][$pelicula][] = $butaca;

    // Llevamos la cuenta total de butacas vendidas (todas las películas)
    $_SESSION['butacas_vendidas'] = ($_SESSION['butacas_vendidas'] ?? 0) + 1;

    $mensaje = " Butaca confirmada correctamente.";
}

$butacas_vendidas = $_SESSION['butacas_vendidas'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación</title>
</head>
<body>
    <h1><?= $mensaje ?></h1>
    <p><strong>Película:</strong> <?= htmlspecialchars($pelicula) ?></p>
    <p><strong>Butaca:</strong> <?= htmlspecialchars($butaca) ?></p>
    <p><strong>Total de butacas vendidas:</strong> <?= htmlspecialchars($butacas_vendidas) ?></p>
    <br>
    <a href="peliculas.php">Volver al inicio</a>
    <br><br>
    <a href="reiniciar.php" style="color:red;"> Reiniciar sesión</a>
</body>
</html>