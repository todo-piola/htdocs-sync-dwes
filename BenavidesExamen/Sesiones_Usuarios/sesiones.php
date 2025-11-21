<?php
session_start();

// Inicializar el contador de sesiones si no existe
if (!isset($_SESSION['contador_sesiones'])) {
    $_SESSION['contador_sesiones'] = 0;
}
$_SESSION['contador_sesiones'] += 1;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sesiones y Usuarios</title>
</head>
<body>
    <h2>Sesiones iniciadas en esta sesión: <?php echo $_SESSION['contador_sesiones']; ?></h2>
    <a href="reservar.php">Ir a Reservar Película</a><br>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>