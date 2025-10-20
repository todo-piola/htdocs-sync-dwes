<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: sesiones1_login.php?redirigido=true");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página principal</title>
</head>
<body>
    <h1>Bienvenido <?php echo $_SESSION['usuario']; ?></h1>
    <a href="sesiones1_logout.php">Salir</a>
</body>
</html>
