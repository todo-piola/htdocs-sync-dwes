<?php
session_start();

// Guardamos el contador antes de limpiar
$contador = $_SESSION['contador_sesiones'] ?? 0;

// Borramos todo menos el contador
$_SESSION = [];
$_SESSION['contador_sesiones'] = $contador;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sesión reiniciada</title>
</head>
<body>
    <h2>Sesión eliminada correctamente</h2>
    <a href="login.php">Volver al inicio</a>
</body>
</html>
