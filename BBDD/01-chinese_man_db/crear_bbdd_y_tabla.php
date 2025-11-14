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
  <p><a href="index.php">⬅ Volver</a></p>
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
    $conexion->exec("DROP DATABASE IF EXISTS chinese_man_db");
    echo " Base de datos anterior eliminada correctamente.<br>";

    // Crear base de datos nueva
    $conexion->exec("CREATE DATABASE IF NOT EXISTS chinese_man_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
    echo " Base de datos 'chinese_man_db' creada correctamente.<br>";

    // Conectar ahora a la base de datos recién creada
    $conexion = new PDO("mysql:host=$server;dbname=chinese_man_db;charset=utf8", $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crear tabla albumes
    $sql = "CREATE TABLE albumes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(100) NOT NULL,
        anio INT NOT NULL,
        sello VARCHAR(100),
        pais VARCHAR(50) DEFAULT 'Francia'
    )";

    $conexion->exec($sql);
    echo " Tabla 'albumes' creada correctamente.<br>";

} catch (PDOException $e) {
    die(" Error: " . $e->getMessage());
}
?>