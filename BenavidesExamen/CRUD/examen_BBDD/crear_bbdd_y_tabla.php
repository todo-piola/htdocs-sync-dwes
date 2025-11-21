<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      background-color: black;
      color:white;
    }
  </style>
</head>
<body>
  <p><a href="index.php"> << Volver</a></p>
</body>
</html>

<?php
$server = "localhost";
$user = "root";
$password = "";

try {
    // Conexión al servidor (sin base de datos)
    $conexion = new PDO("mysql:host=$server;charset=utf8", $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Borrar base de datos si existe
    $conexion->exec("DROP DATABASE IF EXISTS examen");
    echo " Base de datos anterior eliminada correctamente.<br>";

    // Crear base de datos nueva
    $conexion->exec("CREATE DATABASE IF NOT EXISTS examen CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
    echo " Base de datos 'examen' creada correctamente.<br>";

    // Conectar ahora a la base de datos recién creada
    $conexion = new PDO("mysql:host=$server;dbname=examen;charset=utf8", $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crear tabla producto
    $sql = "CREATE TABLE producto(
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100),
        precio DECIMAL(6,2),
        cantidad INT
    )";

    $conexion->exec($sql);
    echo " Tabla 'producto' creada correctamente.<br>";

} catch (PDOException $e) {
    die(" Error: " . $e->getMessage());
}
?>