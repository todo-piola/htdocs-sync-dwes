<?php
session_start();
session_unset();   // Borra todas las variables de sesión
session_destroy(); // Destruye la sesión por completo
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sesión reiniciada</title>
</head>
<body>
    <h1> Sesión reiniciada correctamente</h1>
    <p>Todos los datos (butacas, películas y contador) se han borrado.</p>
    <a href="peliculas.php">Volver a la página principal</a>
</body>
</html>