<?php
session_start(); // Siempre lo primero

// Guardamos variables y un array
$_SESSION['usuario'] = "Franco";
$_SESSION['edad'] = 30;
$_SESSION['aficion'] = "futbol";

// Guardamos el momento en que empieza la sesión
$_SESSION['inicio'] = time();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sesión creada</title>
</head>
<body>
    <h2> Sesión creada correctamente</h2>
    <p>Usuario: <?= $_SESSION['usuario'] ?></p>
    <p>Edad: <?= $_SESSION['edad'] ?></p>
    <p>Afición 1: <?= $_SESSION['aficion'] ?></p>
    <a href="ver.php">Ver datos de sesión</a>
</body>
</html>
