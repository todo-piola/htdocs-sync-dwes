<?php
session_start();
// Destruir todas las variables de sesión
session_unset();
// Destruir la sesión
session_destroy();
// Redirigir al login
echo "Su sesión ha sido cerrada correctamente. Redirigiendo a login";
header("refresh:3;url=login.php");
exit;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
</head>
<body>
    <h2>Has cerrado sesión correctamente.</h2>
    <a href="login.php">Volver al login</a>
</body>
</html>
